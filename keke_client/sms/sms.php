<?php
/**
 * ���ŷ��ͽӿ�V2.0
 * @author Chen tao
 *
 */
class sms {
	static $gateway="http://59.42.249.36/sms/http/Sms3.aspx?";
	static $charset = "utf-8";
	protected $_method;
	private $_action;
	private $_params;
	public $_error;
	
	public function __construct($mobiles,$content,$action='sendsms',$method="post"){
		$this->_action = $action;
		$this->_method = strtolower($method);
		$this->init_params($mobiles,$content);
	}
	private function init_params($mobiles,$content){
		global $kekezu;
		strtolower(CHARSET)==self::$charset or $content = kekezu::gbktoutf($content);
		$this->_params = array(
				'action'=>$this->_action,
				'username'=>$kekezu->_sys_config['mobile_username'],
				'userpwd'=>$kekezu->_sys_config['mobile_password'],
				'timing'=>'',
				'mobiles'=>$mobiles,
				'content'=>$content
		);
	}
	public function send(){
		$url = self::$gateway;
		$q   = http_build_query($this->_params);
		if(function_exists("curl_init")){
			$this->_method=='get' and $url.=$q;
			$m	 = kekezu::curl_request($url,false,$this->_method,$this->_params);
		}elseif(function_exists('fsockopen')){
			$url.=$q;
			$m   = kekezu::socket_request($url,false);
		}else{
			$url.=$q;
			$m 	 = file_get_contents($url);
		}
		return $this->error($m);
	}
	private function error($e){
		if($e<0){
			$err = array(
				'-1'=>'�û������������',
				'-2'=>'����',
				'-3'=>'����̫�������ܳ���1000��һ���ύ',
				'-4'=>'�޺Ϸ�����',
				'-5'=>'���ݰ������Ϸ�����',
				'-6'=>'����̫��',
				'-7'=>'����Ϊ��',
				'-8'=>'��ʱʱ���ʽ����',
				'-9'=>'�޸�����ʧ��',
				'-10'=>'�û���ǰ���ܷ��Ͷ���',
				'-11'=>'Action��������ȷ',
				'-100'=>'ϵͳ����'
			);
			chdir(dirname(__FILE__));
			KEKE_DEBUG or @file_put_contents('log.txt',var_export(array(
					'ʱ��'=>date('Y-m-d H:i:s',time()),
					'������'=>$e,
					'��ϸ'=>$err[$e]
				),1),FILE_APPEND);
		}
		return $e;
	}
}