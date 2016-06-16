<?php
require_once ('weibooauth.php');

class netease_oauth_client_class extends base_client_class {
	public $_netease_weibo_oauth;
	public $_netease_weibo_client;
	
	function __construct($app_key, $app_secret) {
		$this->_app_key = $app_key;
		$this->_app_secret = $app_secret;
		parent::__construct ( $app_key, $app_secret );
		$this->_netease_weibo_oauth = new WeiboOAuth ( $this->_app_key, $this->_app_secret );
	}
	
	//�����Ȩ���ӵ�
	function get_auth_url($callback) {
		$o = $this->_netease_weibo_oauth;
		$keys = $o->getRequestToken ();
		$aurl = $o->getAuthorizeURL ( $keys ['oauth_token'], TRUE, $callback );
		$_SESSION ['auth_netease'] ['keys'] = $keys;
		return $aurl;
	}
	
	//��֤�Ƿ�����Ȩ
	function get_access_token() {
		return $_SESSION ['auth_netease'] ['last_key'];
	}
	
	//������Ȩ
	function clear_access_token() {
		unset ( $_SESSION ['auth_netease'] ); 
	}
	
	//ͨ����Ȩ
	function create_access_token($oauth_verifier = false) {
		$this->_error_info = null;
		$o = $this->_netease_weibo_oauth;
		
		$o->__construct ( $this->_app_key, $this->_app_secret, $_SESSION ['auth_netease'] ['keys'] ['oauth_token'], $_SESSION ['auth_netease'] ['keys'] ['oauth_token_secret'] );
		
		$last_key = $o->getAccessToken ( $oauth_verifier, $_SESSION ['auth_netease'] ['keys'] );
		
	 
		$_SESSION ['auth_netease'] ['last_key'] = $last_key;
		
		//client����  �˺���ʹ��1�ٷ����ص�client
		

		$this->init_client ();
		
		$user_info = self::get_login_info ();
		
		return $last_key ['user_id'];
	}
	
	private function init_client() {
		if (! $this->_netease_weibo_client) {
			$this->_netease_weibo_client = new WeiboClient ( $this->_app_key, $this->_app_secret, $_SESSION ['auth_netease'] ['last_key'] ['oauth_token'], $_SESSION ['auth_netease'] ['last_key'] ['oauth_token_secret'] );
		}
	}
	
	function get_login_info() {
		
		$this->_error_info = null;
		self::init_client ();
		$c = $this->_netease_weibo_client;
		$auth_user_info = $c->verify_credentials ();
		
		global $_K;
		if (strtolower ($_K['charset']) == 'gbk') {
			$auth_user_info = kekezu::utftogbk ( $auth_user_info );
		}
		
		if (! $auth_user_info || $auth_user_info ['error']) {
			unset ( $_SESSION ['auth_netease'] );
			$this->set_error ( '�û����ݻ�ȡʧ�ܣ�:' . $auth_user_info ['error'] );
			return false;
		}
		
		return $auth_user_info;
	}
	
	function post_wb($msg, $img) {
		$this->_error_info = null;
		$this->init_client ();
		$c = $this->get_client ();
		
		global $_K;
		
		if (strtolower ( $_K ['charset'] ) == 'gbk') {
			$msg = kekezu::gbktoutf ( $msg );
		}
		
		if (!$img) {
			$r = $c->update( $msg );
		} else {
			$r = $c->upload( $msg, $img );
		}
		
		if (strtolower($_K['charset'])=='gbk'){
			$r = kekezu::utftogbk($r);
		}
		
		if ($r ['error']) {
			unset ( $_SESSION ['auth_netease'] );
			$this->set_error ( '����ʧ��:' . $r ['error'] );
			return false;
		}
		
		return $r['id'];
	
	}
	
	
	//ʱ����
	function get_wb_list($page=0,$page_size=0){
		$this->_error_info = null;
		$this->init_client();
		$c = $this->get_client();	
		$page_size = $page_size?$page_size:20;
		
		$uinfo = $this->get_login_info();
		$r = $c->user_timeline_uid($uinfo['id'],$page_size);
		global $_K;
		if (strtolower($_K['charset'])=='gbk'){
			$r = kekezu::utftogbk($r);
		}
		return $r;
	}
	
	function get_wb_info($sid){
		$this->_error_info = null;
		$this->init_client();
		$c = $this->get_client();	
		$r = $c->show_status($sid);
		
		global $_K;
		if (strtolower($_K['charset'])=='gbk'){
			$r = kekezu::utftogbk($r);
		}
		
		if ($r ['error']) {
			unset ( $_SESSION ['auth_netease'] );
			$this->set_error ( '΢����Ϣ��ȡʧ��:' . $r ['error'] );
			return false;
		}
		
		return $r;
	}
	
	//����UID�ӹ�ע
	function follow_wb_user($u_id){
		$this->_error_info = null;
		$this->init_client();
		$c = $this->get_client();	
		$r = $c->follow($u_id);
		
		
		global $_K;
		if (strtolower($_K['charset'])=='gbk'){
			$r = kekezu::utftogbk($r);
		}
			if ($r ['error']) {
		 
			$this->set_error ( $r ['error'] );
			return false;
		}
	
		return $r;
	}
	
	//����SIDת��һ��΢��
	function repost_wb($sid,$text=null){
		global $_K;
		$this->_error_info = null;
		$this->init_client();
		if(strtolower($_K['charset'])=='gbk'&&$text){
			$text = kekezu::gbktoutf($text);
		}
		$c = $this->get_client();
		$r = $c->retweet($sid);
		
		if (strtolower($_K['charset'])=='gbk'){
			$r = kekezu::utftogbk($r);
		}

		if ($r ['error']) {
		 
			$this->set_error ( $r ['error'] );
			return false;
		}
		return $r['retweeted_status']['id'];
		
	}
	
	//����SID����һ����΢��
	function send_comment($sid,$text){
		global $_K;
		$this->_error_info = null;
		$this->init_client();
		$c = $this->get_client();
		if (strtolower($_K['charset'])=='gbk'){
			$text = kekezu::gbktoutf($text);
		}
		$r = $c->reply($sid,$text,$cid==false);
		
		
		if (strtolower($_K['charset'])=='gbk'){
			$r = kekezu::utftogbk($r);
		}
		if ($r ['error']) {
			unset ( $_SESSION ['auth_sina'] );
			$this->set_error ( $r ['error'] );
			return false;
		}
		return $r;
	}
	
	//�û����ݸ�ʽ��
	function user_data_format($data){
		$r = array();
		$r['account'] = $data['screen_name'];
		$r["name"]=$data['name'];
		$r["location"]=$data['location'];
		$r['img']=$data['profile_image_url'];
		$r['url']="http://t.163.com/{$data['screen_name']}";
		$r['fans_count']=$data['followers_count']; 
		$r['gz_count']=$data['friends_count'];
		$r['wb_count']=$data['statuses_count'];
		$r['sex'] = $data['gender']=='m'?'��':$data['gender']=='f'?'Ů':'����';
		return $r;
	}
	
	//΢�����ݸ�ʽ��
	function wb_data_format($data){
		$r = array();
		$r['id']=$data['id'];
		$r['text']=$data['text'];
		$r['uid']=$data['user']['id'];
		$r['username']=$data['user']['name'];
		preg_match("#((http\:\/\/126\.fm\/).*)$#i", $data['text'], $find);
		$r['img'] =  $find[1];
		$r['url']="http://t.163.com/{$r['uid']}/status/{$r['id']}";
		return $r;
	}
	
	function get_operate() {
		return $this->_netease_weibo_oauth;
	}
	
	function get_client() {
		return $this->_netease_weibo_client;
	}

}

