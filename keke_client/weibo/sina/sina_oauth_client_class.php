<?php
//die('sina_oauth');
require_once ('saetv2.ex.class.php');

class sina_oauth_client_class extends base_client_class {
	public $_sina_weibo_oauth;
	public $_sina_weibo_client;
	
	function __construct($app_key, $app_secret) {
		// http://open.weibo.com/apps/4229254781 ��Ӳ����û�
// 		$app_key = '4229254781';
// 		$app_secret = 'df8a743fdf1dbe69b76b9038bcb900c4';
		$this->_app_key = $app_key;
		$this->_app_secret = $app_secret;
		parent::__construct ( $app_key, $app_secret );
		$this->_sina_weibo_oauth = new SaeTOAuthV2 ( $app_key, $app_secret );
	}
	/**
	 * �����Ȩ��ת���� step1 (step1�����Ȩҳ������,step2������Ȩҳ���½,������access_token������)
	 * 
	 * @see $this->create_access_token()(step2)
	 * @param $callback �����Ҫ�����ĵ�ַ        	
	 */
	function get_auth_url($callback) {
		$this->_error_info = null;
		$o = $this->_sina_weibo_oauth;
		$aurl = $o->getAuthorizeURL ( $callback );
		return $aurl;
	}
	/**
	 * ������Ȩ step2
	 * 
	 * @param $oauth_verifier ������Ȩ����Ҫ�Ĳ�������
	 *        	array('code'=>'','request_uri'=>'')
	 */
	function create_access_token($oauth_verifier = false) {
		$this->_error_info = null;
		$o = $this->_sina_weibo_oauth;
		$o->__construct ( $this->_app_key, $this->_app_secret );
		$keys = $oauth_verifier;
		$last_key = $o->getAccessToken ( 'code', $keys );
		if (! $last_key ['uid']) {
			kekezu::error_handler( 001, 'access_token�����ڻ����ѹ���' );
			return false;
		}
		$_SESSION ['auth_sina'] ['last_key'] = $last_key; // last_key ����
		$this->init_client (); // client���� �˺���ʹ��sina�ٷ����ص�client
		return $last_key ['uid'];
	}
	// ��֤�Ƿ�����Ȩ
	function get_access_token() {
		return $_SESSION ['auth_sina'] ['last_key'];
	}
	// ������Ȩ
	function clear_access_token() {
		$this->init_client ();
		$c = $this->_sina_weibo_client;
		// $r = $c->oauth->post (
		// "http://api.t.sina.com.cn/account/end_session.json" );
		$r = $c->oauth->get ( 'https://api.weibo.com/2/account/end_session.json', array (
				'access_token' => $_SESSION ['auth_sina'] ['last_key'] ['access_token'] 
		) );
		unset ( $_SESSION ['auth_sina'] );
		return $r;
	}
	/**
	 * ��ʼ���ͻ���(��Ȩ��)
	 */
	private function init_client() {
		if (! $this->_sina_weibo_client) {
			$this->_sina_weibo_client = new SaeTClientV2 ( $this->_app_key, $this->_app_secret, $_SESSION ['auth_sina'] ['last_key'] ['access_token'] );
		}
	
	}
	// ��õ�ǰ��¼�û�
	function get_login_info() {
		global $_K;
		$this->init_client ();
		$c = $this->get_client ();
		$auth_user_info = $c->show_user_by_id ( $_SESSION ['auth_sina'] ['last_key'] ['uid'] );
		if (strtolower ( CHARSET ) == 'gbk') {
			$auth_user_info = kekezu::utftogbk ( $auth_user_info );
		}
		if ($auth_user_info ['error']) {
			unset ( $_SESSION ['auth_sina'] );
			kekezu::error_handler ( 001, '�û����ݻ�ȡʧ�ܣ��������:' . keke_debug::dump ( $auth_user_info ['error'] ) );
			return false;
		}
		return $auth_user_info;
	}
	
	// ΢������
	function post_wb($msg, $img) {
		$this->_error_info = null;
		$this->init_client ();
		$c = $this->get_client ();
		global $_K;
		if (strtolower ( $_K ['charset'] ) == 'gbk') {
			$msg = kekezu::gbktoutf ( $msg );
		}
		if (! $img) {
			$r = $c->update ( $msg );
		} else {
			$r = $c->upload ( $msg, $img );
		}
		if (strtolower ( $_K ['charset'] ) == 'gbk') {
			$r = kekezu::utftogbk ( $r );
		}
		if ($r ['error']) {
			kekezu::error_handler ( 001, '����ʧ��' . keke_debug::dump ( $r ) );
			return false;
		}
		return $r ['idstr'];
	
	}
	
	/**
	 * ��ȡ΢���б�ʱ����
	 */
	function get_wb_list($page = 0, $page_size = 20, $uid_or_name = '') {
		global $_K;
		$this->_error_info = null;
		$this->init_client ();
		$c = $this->get_client ();
		$page = max ( ( int ) $page, 1 );
		$page_size = $page_size ? $page_size : 20;
		if (! $uid_or_name) {
			$uid_or_name = $_SESSION ['auth_sina'] ['last_key'] ['uid'];
		}
		$func = is_numeric ( $uid_or_name ) ? 'user_timeline_by_id' : 'user_timeline_by_name';
		$r = $c->$func ( $page, $page_size );
		if (strtolower ( $_K ['charset'] ) == 'gbk') {
			$r = kekezu::utftogbk ( $r );
		}
		return $r;
	}
	/**
	 */
	function get_wb_info($sid) {
		$this->_error_info = null;
		$this->init_client ();
		$c = $this->get_client ();
		$r = $c->show_status ( $sid );
		if (strtolower ( CHARSET ) == 'gbk') {
			$r = kekezu::utftogbk ( $r );
		}
		if ($r ['error']) {
			kekezu::error_handler ( 001, '΢����Ϣ��ȡʧ��' . keke_debug::dump ( $r ) );
			return false;
		}
		return $r;
	}
	/**
	 * ��ȡ��˿�б�
	 * 
	 * @param
	 *        	uid	false	int64	��Ҫ��ѯ���û�UID��
	 * @param
	 *        	screen_name	false	string	��Ҫ��ѯ���û��ǳơ�
	 * @param
	 *        	count	false	int	��ҳ���صļ�¼������Ĭ��Ϊ50����󲻳���200��
	 * @param
	 *        	cursor
	 *        	false	int	���ؽ�����α꣬��һҳ�÷���ֵ���next_cursor����һҳ��previous_cursor��Ĭ��Ϊ0��
	 */
	function get_followers($uid_or_name = null, $count = false, $cursor = 0) {
		$this->init_client ();
		$c = $this->get_client ();
		if (is_null ( $uid_or_name )) {
			$uid_or_name = $_SESSION ['auth_sina'] ['last_key'] ['uid'];
		}
		$func = is_numeric ( $uid_or_name ) ? 'followers_by_id' : 'followers_by_name';
		! $cursor && $cursor = 0;
		$r = $c->$func ( $uid_or_name, $cursor, $count );
		if (strtolower ( CHARSET ) == 'gbk') {
			$r = kekezu::utftogbk ( $r );
		}
		if ($r ['error']) {
			kekezu::error_handler ( 001, '��ȡ��˿�б�ʧ��' . keke_debug::dump ( $r ) );
			return false;
		}
		return $r ['users'];
	}
	
	/**
	 * ����UID����scree_name�ӹ�עĳ���û�
	 */
	function follow_wb_user($u_id) {
		global $_K;
		$this->_error_info = null;
		$this->init_client ();
		$c = $this->get_client ();
		$func = ctype_digit ( $u_id ) ? follow_by_id : follow_by_name; // ��������ֻ����ַ���
		$r = $c->$func ( $u_id );
		if (strtolower ( $_K ['charset'] ) == 'gbk') {
			$r = kekezu::utftogbk ( $r );
		}
		if ($r ['error']) {
			// error_handler(001,'��ע'.$u_id.'ʧ��'.keke_debug::dump($r));//�ӹ�עʧ�ܵ�ԭ��������Լ���ע�Լ�,��������³��򲻺��ж�,ע�ʹ˴�(�˴������׳�����Ϊ�������)
			return false;
		}
		return $r;
	}
	/**
	 * ͨ��΢�������ۡ�˽�ţ�MID��ȡ��ID
	 * mid to sid
	 */
	function mid_2_sid($mid) {
		$this->_error_info = null;
		$this->init_client ();
		$c = $this->get_client ();
		$r = $c->queryid ( $mid, 1, 0, 0, 1 );
		if ($r ['error']) {
			kekezu::error_handler ( 001, 'MID��ȡ��IDʧ��' . keke_debug::dump ( $r ) );
			return false;
		}
		return $r ['id'];
	}
	
	// ����SIDת��һ��΢��
	function repost_wb($sid, $text = null) {
		global $_K;
		$this->_error_info = null;
		$this->init_client ();
		if (strtolower ( $_K ['charset'] ) == 'gbk' && $text) {
			$text = kekezu::gbktoutf ( $text );
		}
		$c = $this->get_client ();
		$r = $c->repost ( $sid, $text );
		if (strtolower ( $_K ['charset'] ) == 'gbk') {
			$r = kekezu::utftogbk ( $r );
		}
		if ($r ['error']) {
			kekezu::error_handler ( 001, 'ת��һ��΢��ʧ��' . keke_debug::dump ( $r ) );
			return false;
		}
		return $r;
	
	}
	
	// ����SID����һ����΢��
	function send_comment($sid, $text = null) {
		global $_K;
		$this->_error_info = null;
		$this->init_client ();
		$c = $this->get_client ();
		if (strtolower ( $_K ['charset'] ) == 'gbk') {
			$text = kekezu::gbktoutf ( $text );
		}
		$r = $c->send_comment ( $sid, $text );
		if (strtolower ( $_K ['charset'] ) == 'gbk') {
			$r = kekezu::utftogbk ( $r );
		}
		if ($r ['error']) {
			kekezu::error_handler ( 001, '����΢��ʧ��' . keke_debug::dump ( $r ) );
			return false;
		}
		return $r;
	}
	
	// �û����ݸ�ʽ��
	function user_data_format($data) {
		global $k;
		$r = array ();
		$r ['account'] = $data ['id'];
		$r ["name"] = $data ['name'];
		$r ["location"] = $data ['location'];
		$r ['img'] = $data ['profile_image_url'];
		$r ['url'] = "http://t.sina.com.cn/{$data['id']}/";
		$r ['fans_count'] = $data ['followers_count'];
		$r ['gz_count'] = $data ['friends_count'];
		$r ['wb_count'] = $data ['statuses_count'];
		$r ['hf_count'] = $data ['bi_followers_count']; // ������
		$r ['faver_count'] = $data ['favourites_count']; // �ղ���
		$r ['sex'] = $data ['gender'] == 'm' ? '��' : $data ['gender'] == 'f' ? 'Ů' : '����';
		$r ['create_at'] = strtotime ( $data ['created_at'] ); // ����������(ʱ���)
		/*if (strtolower ( CHARSET ) == 'gbk') {
			$r = kekezu::utftogbk ( $r );
		}*/
		return $r;
	}
	
	// ΢�����ݸ�ʽ��
	function wb_data_format($data) {
		$r = array ();
		$r ['id'] = $data ['id'];
		$r ['text'] = $data ['text'];
		$r ['uid'] = $data ['user'] ['id'];
		$r ['username'] = $data ['user'] ['name'];
		$r ['img'] = $data ['bmiddle_pic'];
		$r ['url'] = "http://api.t.sina.com.cn/{$r['uid']}/statuses/{$r['id']}";
		return $r;
	}
	
	function get_operate() {
		return $this->_sina_weibo_oauth;
	}
	
	/**
	 * ����һ��ʵ������object
	 */
	function get_client() {
		return $this->_sina_weibo_client;
	}

}