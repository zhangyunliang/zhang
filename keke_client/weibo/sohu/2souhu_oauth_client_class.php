<?php 
require_once('weibooauth.php');

class souhu_oauth_client_class extends base_client_class{
	public $_souhu_weibo_oauth;
	public $_souhu_weibo_client;
	
	function __construct($app_key,$app_secret){
		$this->_app_key = $app_key;
		$this->_app_secret = $app_secret;
		parent::__construct($app_key,$app_secret);
		$this->_souhu_weibo_oauth = new WeiboOAuth($app_key, $app_secret);
	}
	
	
	//�����Ȩ���ӵ�
	function get_auth_url($callback){
		$this->_error_info = null;
		$o = $this->_souhu_weibo_oauth;
		$request_token = $o->getRequestToken();
		$_SESSION['auth_souhu']['oauth_token'] = $token = $request_token['oauth_token'];
		$_SESSION['auth_souhu']['oauth_token_secret'] = $request_token['oauth_token_secret'];
		
		switch ($o->http_code) {
		  case 200:
		    /* ��ȡ�û���֤��ַ�������ض���SOHU */
		    $url = $o->getAuthorizeUrl($token,false, $callback);
		    break;
		  default:
		    /* Show notification if something went wrong. */
		    $this->_error_info = "oauthͨѶʧ��";
		    break;
		}
		
		return $url;
	}
	
	//��֤�Ƿ�����Ȩ
	function get_access_token(){
		return $_SESSION['auth_souhu']['last_key'];
	}
	
	//������Ȩ
	function clear_access_token(){
		$this->init_client();
		$c = $this->_souhu_weibo_client;
		$r = $c->oauth->get('http://api.t.souhu.com.cn/account/end_session.json',null);
		
		
		
		unset($_SESSION['auth_souhu']);
		
	}
	
	//ͨ����Ȩ
	function create_access_token($oauth_verifier=false){
		$this->_error_info = null;
		$o = $this->_souhu_weibo_oauth;
		
		if (isset($_REQUEST['oauth_token']) && $_SESSION['auth_souhu']['oauth_token'] !== $_REQUEST['oauth_token']) 
		{
			$this->set_error('access_token�����ڻ����ѹ���');
			return false;
		}
		$o->__construct($this->_app_key,$this->_app_secret,$_SESSION['auth_souhu']['oauth_token'] ,$_SESSION['auth_souhu']['oauth_token_secret'] );
		$access_token = $o->getAccessToken($oauth_verifier);
		$_SESSION['auth_souhu']['last_key'] = $access_token;
		
		unset($_SESSION['auth_souhu']['oauth_token']);
		unset($_SESSION['auth_souhu']['oauth_token_secret']);
		
		if (200 == $o->http_code) {
		  /* The user has been verified and the access tokens can be saved for future use */
		  $_SESSION['auth_souhu']['status'] = 'verified';
		  return true;
		} else {
		  return false;
		}
		
		
	}
	
	private function init_client(){
		if (!$this->_souhu_weibo_client){
		$this->_souhu_weibo_client = new WeiboClient($this->_app_key,$this->_app_secret, $_SESSION['auth_souhu']['oauth_token'] ,$_SESSION['auth_souhu']['oauth_token_secret']);
		}
		
	}
	//��õ�ǰ��¼�û�
	function get_login_info(){
		global $_K;
		$this->init_client();
		$c = $this->get_client();
		$auth_user_info  = $c->getUserInfo();
		
		
		if (strtolower($_K['charset'])=='gbk'){
			$auth_user_info = kekezu::utftogbk($auth_user_info);
		}
		
		if ($auth_user_info['error']){
			unset($_SESSION['auth_souhu']);
			$this->set_error('�û����ݻ�ȡʧ�ܣ��������:'.$auth_user_info['error']);
			return false;
		}
		
		return $auth_user_info;
	}
	
	//΢������
	function post_wb($msg,$img){
		$this->_error_info = null;
		$this->init_client();
		$c = $this->get_client();
		
		global $_K;
		
		if (strtolower($_K['charset'])=='gbk'){
			$msg = kekezu::gbktoutf($msg);
		}
		$c->postOne($msg, $img);
		
		
		if (strtolower($_K['charset'])=='gbk'){
			$r = kekezu::utftogbk($r);
		}
		
		if ($r['error']){
			unset($_SESSION['auth_souhu']);
			$this->set_error('����ʧ��:'.$r['error']);
			return false;
		}
		
		return $r['id'];
		
	}
	
	//ʱ����
	function get_wb_list($page=0,$page_size=0){
		$this->_error_info = null;
		$this->init_client();
		$c = $this->get_client();	
	
		$page = $page?$page:1;
		$page_size = $page_size?$page_size:20;
		$r = $c->user_timeline($page,$page_size);
		
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
			unset ( $_SESSION ['auth_souhu'] );
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
			//unset ( $_SESSION ['auth_souhu'] );
			$this->set_error (  $r ['error'] );
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
		$r = $c->repost($sid,$text);
		
		
		if (strtolower($_K['charset'])=='gbk'){
			$r = kekezu::utftogbk($r);
		}
		
		
		if ($r['error']) {
			//unset ( $_SESSION ['auth_souhu'] );
			$this->set_error ( $r ['error'] );
			return false;
		}
		return $r['id'];
		
	}
	
	//����SID����һ����΢��
	function send_comment($sid,$text=null){
		global $_K;
		$this->_error_info = null;
		$this->init_client();
		$c = $this->get_client();
		
		if(strtolower($_K['charset'])=='gbk'){
			$text = kekezu::gbktoutf($text);
		}
		
		$r = $c->send_comment($sid,$text);
		
		if (strtolower($_K['charset'])=='gbk'){
			$r = kekezu::utftogbk($r);
		}
		if ($r ['error']) {
			unset ( $_SESSION ['auth_souhu'] );
			$this->set_error (  $r ['error'] );
			return false;
		}
		return $r;
	}
	
	
	//�û����ݸ�ʽ��
	function user_data_format($data){
		$r = array();
		$r['account'] = $data['id'];
		$r["name"]=$data['screen_name'];
		$r["location"]=$data['location'];
		$r['img']=$data['profile_image_url'];
		$r['url']=$data['url']?$data['url']:"http://t.sohu.com/u/{$data['id']}/";
		$r['fans_count']=$data['followers_count']; 
		$r['gz_count']=$data['friends_count'];
		$r['wb_count']=$data['statuses_count'];
		$r['sex'] = '����';
		return $r;
	}
	
	//΢�����ݸ�ʽ��
	function wb_data_format($data){
		$r = array();
		$r['id']=$data['id'];
		$r['text']=$data['text'];
		$r['uid']=$data['user']['id'];
		$r['username']=$data['user']['name'];
		$r['img'] = $data['bmiddle_pic'];
		$r['url']="http://api.t.sohu.com.cn/{$r['uid']}/statuses/{$r['id']}";
		return $r;
	}
	
	function get_operate(){
		return $this->_souhu_weibo_oauth;
	}
	
	function get_client(){
		return $this->_souhu_weibo_client;
	}
}

