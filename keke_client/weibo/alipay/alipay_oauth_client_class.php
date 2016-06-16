<?php 
require_once('lib/alipay_core.function.php');
require_once('lib/alipay_notify.class.php');
require_once('lib/alipay_service.class.php');
require_once('lib/alipay_submit.class.php');

class alipay_oauth_client_class extends base_client_class{
	public $_alipay_weibo_oauth;
	public $_alipay_weibo_client;
    public $_config;
	
	function __construct($app_key,$app_secret){
		global $_K;
		$this->_app_key = $app_key;
		$this->_app_secret = $app_secret;
		parent::__construct($app_key,$app_secret);
		$this->_config = array(
		  'partner'			=>	$this->_app_key,
		  'key'				=>	$this->_app_secret,
		  'return_url'		=>	$_K['siteurl']."/keke_client/weibo/alipay/return_url.php",
		  'sign_type'		=>	'MD5',
		  'input_charset'	=>	strtoupper(CHARSET),
		  'transport'		=>	'http',
		);
		$this->_alipay_weibo_oauth = new AlipayService($this->_config);
	}
	
	
	
	//�����Ȩ���ӵ�
	function get_auth_url($callback){
		
		//������ʱ���
		
	$anti_phishing_key  = '';
	$exter_invoke_ip = '';
	 //����Ҫ����Ĳ�������
	$parameter = array(
			"service"			=> "alipay.auth.authorize",
			"target_service"	=> 'user.auth.quick.login',
			"partner"			=> trim($this->_config['partner']),
			"_input_charset"	=> trim($this->_config['input_charset']),
	        "return_url"		=> trim($this->_config['return_url']),
	        //"anti_phishing_key"	=> $anti_phishing_key,
			//"exter_invoke_ip"	=> $exter_invoke_ip
	);
	$_SESSION['alipay_callback_url'] = $callback;
  // var_dump($parameter);die();
	//�����ݵ�¼�ӿ�
	//$alipayService = new AlipayService($this->_config);
	return   $this->_alipay_weibo_oauth->alipay_auth_authorize($parameter);
	
	}
	
	//��֤�Ƿ�����Ȩ
	function get_access_token(){
		return $_SESSION['auth_alipay']['last_key'];
	}
	
	//������Ȩ
	function clear_access_token(){
		unset($_SESSION['auth_alipay']);
	}
	
	/**
	 * 
	 * alipay ����Ȩ��reutrn_url ������session��
	 * @see base_client_class::create_access_token()
	 */
	function create_access_token($oauth_verifier=false){
	 
		$alipayNotify = new AlipayNotify($this->_config);
		$verify_result = $alipayNotify->verifyReturn();
		if($verify_result) {//��֤�ɹ�
			 
			$user_id	= $_GET['user_id'];	//֧�����û�id
			$token		= $_GET['token'];	//��Ȩ����
			//file_put_contents('log.txt', var_export($_GET,1),FILE_APPEND);
			//last_key ����
			$_SESSION['auth_alipay']['last_key'] = $_GET;
		}
		
		
		//$this->init_client();
		return false;//$last_key['name'];
	}
	
	private function init_client(){
		 
		
	}
	
	function get_login_info(){
		global $_K;
		$p= $_SESSION['auth_alipay']['last_key'];
		return $p;
		 
	}
	
	//΢������
	function post_wb($msg,$img){
		 
		
	}
	
	//ʱ����
	function get_wb_list($page=0,$page_size=0){
		 
	}
	
	function get_wb_info($sid){
		 
	}
	
	
	
	//����UID�ӹ�ע
	function follow_wb_user($u_name){
		 
	}
	
	//����SIDת��һ��΢��
	function repost_wb($sid,$text=null){
		 
		
	}
	
	//����SID����һ����΢��
	function send_comment($sid,$text=null){
		
		 
	}
	
	//�û����ݸ�ʽ��
	function user_data_format($data){
		$r = array();
		 
		if(!$data){
		 	return false;
		}
		 
		$r['account'] = $data['user_id'];
		$r["name"]=$data['real_name'];
		$r["location"]="";//$data['location'];
		$r['img']=$data['figureurl'];
		$r['url']=$data['token'];
	 	$r['wb_count']="";
		$r['sex'] = $data['gender'];
		 
		return $r;
	}
	
	//΢�����ݸ�ʽ��
	function wb_data_format($data){
		$r = array();
	 
		return $r;
	}
	
	
	
	function get_operate(){
		return $this->_alipay_weibo_oauth;
	}
	
	function get_client(){
		return $this->_alipay_weibo_client;
	}
}

