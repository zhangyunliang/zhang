<?php
class TopClient {
	public $appkey;
	
	public $secretKey;
	
	public $gatewayUrl = "http://gw.api.taobao.com/router/rest";
	
	public $format = "json";
	public $_user_get_request_obj;
	
	public $_error;
	protected $signMethod = "md5";
	
	protected $apiVersion = "2.0";
	
	protected $sdkVersion = "top-sdk-php-20110701";
	function __construct() {
		require_once 'request/UserGetRequest.php';
		require_once 'logger/logger.php';
		$this->_user_get_request_obj = new UserGetRequest ();
	}
	protected function generateSign($params) {
		ksort ( $params );
		
		$stringToBeSigned = $this->secretKey;
		foreach ( $params as $k => $v ) {
			if ("@" != substr ( $v, 0, 1 )) {
				$stringToBeSigned .= "$k$v";
			}
		}
		unset ( $k, $v );
		$stringToBeSigned .= $this->secretKey;
		
		return strtoupper ( md5 ( $stringToBeSigned ) );
	}
	
	public function curl($url, $postFields = null) {
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_FAILONERROR, false );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		
		if (is_array ( $postFields ) && 0 < count ( $postFields )) {
			$postBodyString = "";
			$postMultipart = false;
			foreach ( $postFields as $k => $v ) {
				if ("@" != substr ( $v, 0, 1 )) //�ж��ǲ����ļ��ϴ�
{
					$postBodyString .= "$k=" . urlencode ( $v ) . "&";
				} else //�ļ��ϴ���multipart/form-data��������www-form-urlencoded
{
					$postMultipart = true;
				}
			}
			unset ( $k, $v );
			curl_setopt ( $ch, CURLOPT_POST, true );
			if ($postMultipart) {
				curl_setopt ( $ch, CURLOPT_POSTFIELDS, $postFields );
			} else {
				curl_setopt ( $ch, CURLOPT_POSTFIELDS, substr ( $postBodyString, 0, - 1 ) );
			}
		}
		$reponse = curl_exec ( $ch );
		
		if (curl_errno ( $ch )) {
			throw new Exception ( curl_error ( $ch ), 0 );
		} else {
			$httpStatusCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );
			if (200 !== $httpStatusCode) {
				throw new Exception ( $reponse, $httpStatusCode );
			}
		}
		curl_close ( $ch );
		return $reponse;
	}
	/**
	 * �����û���Ϣ������ת
	 */
	function process_user_oauth($top_sign, $top_appkey, $top_parameters, $top_session, $call_back = null) {
		global $kekezu, $_K;
		$format_simple_data = $this->format_parameters ( $top_parameters );
		//	  	 var_dump($format_simple_data);
		if ($format_simple_data ['vistor_role']) { //�û�û�е�¼
			$this->_error = $this->error_handle ( 3 );
		} else if ($format_simple_data ['ts'] + 300 < time ()) {
			$this->_error = $this->error_handle ( 2 );
		} else { //��ȡ�û���Ϣ.������
			$req = $this->_user_get_request_obj;
			$req->setFields ( "user_id,uid,nick,sex,buyer_credit,seller_credit,location,created,last_visit,birthday,type,status,alipay_no,alipay_account,alipay_account,email,consumer_protection,alipay_bind" );
			//$req->setFields("user_id,uid,nick,email");
			$req->setNick ( $format_simple_data ['vistor_nick'] );
			$this->appkey = $top_appkey;
			// var_dump($this);
			$resp = $this->execute ( $req, $top_session );
			
			if (! empty ( $resp )) {
				$user_data = $this->format_user_info ( $resp );
				return $_SESSION ['taobao_login_info'] = $user_data;
			
			} else {
				$this->_error = $this->error_handle ( 4 );
			}
		}
	
	}
	/**
	 * ��ʽ���ص��������Ĳ���
	 * Enter description here ...
	 * @param unknown_type $parameters
	 */
	public function format_parameters($top_parameters) {
		$simple_data = explode ( "&", base64_decode ( $top_parameters ) );
		foreach ( $simple_data as $v ) {
			$v2 = explode ( "=", $v );
			$format_simple_data [$v2 [0]] = $v2 [1];
		}
		return $format_simple_data;
	
	}
	/**
	 * 
	 * ��ʽ���û���Ϣ
	 */
	public function format_user_info($user_obj) {
		
		$user_data ['account'] = $user_obj->user->nick;
		$user_data ['uid'] = $user_obj->user->user_id;
		$user_data ['location'] = $user_obj->user->location->state . ',' . $user_obj->user->location->city;
		$user_data ['email'] = $user_obj->user->email;
		return $user_data;
	}
	protected function logCommunicationError($apiName, $requestUrl, $errorCode, $responseTxt) {
		$localIp = isset ( $_SERVER ["SERVER_ADDR"] ) ? $_SERVER ["SERVER_ADDR"] : "CLI";
		$logger = new LtLogger ();
		$logger->conf ["log_file"] = rtrim ( TOP_SDK_WORK_DIR, '\\/' ) . '/' . "logs/top_comm_err_" . $this->appkey . "_" . date ( "Y-m-d" ) . ".log";
		$logger->conf ["separator"] = "^_^";
		$logData = array (date ( "Y-m-d H:i:s" ), $apiName, $this->appkey, $localIp, PHP_OS, $this->sdkVersion, $requestUrl, $errorCode, str_replace ( "\n", "", $responseTxt ) );
		$logger->log ( $logData );
	}
	
	public function execute($request, $session = null) {
		//��װϵͳ����
		$sysParams ["app_key"] = $this->appkey;
		$sysParams ["v"] = $this->apiVersion;
		$sysParams ["format"] = $this->format;
		$sysParams ["sign_method"] = $this->signMethod;
		$sysParams ["method"] = $request->getApiMethodName ();
		$sysParams ["timestamp"] = date ( "Y-m-d H:i:s" );
		$sysParams ["partner_id"] = $this->sdkVersion;
		
		if (null != $session) {
			$sysParams ["session"] = $session;
		}
		
		//��ȡҵ�����
		$apiParams = $request->getApiParas ();
		
		//ǩ��
		$sysParams ["sign"] = $this->generateSign ( array_merge ( $apiParams, $sysParams ) );
		//var_dump($sysParams);die();
		//ϵͳ��������GET����
		$requestUrl = $this->gatewayUrl . "?";
		foreach ( $sysParams as $sysParamKey => $sysParamValue ) {
			$requestUrl .= "$sysParamKey=" . urlencode ( $sysParamValue ) . "&";
		}
		$requestUrl = substr ( $requestUrl, 0, - 1 );
		
		//����HTTP����
		try {
			$resp = $this->curl ( $requestUrl, $apiParams );
		} catch ( Exception $e ) {
			$this->logCommunicationError ( $sysParams ["method"], $requestUrl, "HTTP_ERROR_" . $e->getCode (), $e->getMessage () );
			return false;
		}
		
		//����TOP���ؽ��
		$respWellFormed = false;
		if ("json" == $this->format) {
			$respObject = json_decode ( $resp );
			if (null !== $respObject) {
				$respWellFormed = true;
				foreach ( $respObject as $propKey => $propValue ) {
					$respObject = $propValue;
				}
			}
		} else if ("xml" == $this->format) {
			$respObject = @simplexml_load_string ( $resp );
			if (false !== $respObject) {
				$respWellFormed = true;
			}
		}
		
		//���ص�HTTP�ı����Ǳ�׼JSON����XML�����´�����־
		if (false === $respWellFormed) {
			$this->logCommunicationError ( $sysParams ["method"], $requestUrl, "HTTP_RESPONSE_NOT_WELL_FORMED", $resp );
			return false;
		}
		
		return $respObject;
	}
	public function error_handle($err_id) {
		$error = array ("1" => "��ȡ��Ȩʧ��!", "2" => "��¼��ʱ!", "3" => "����Ա���¼ʧ��!", "4" => "��������!�û���Ϣ��ȡʧ��" );
		return $error [$err_id];
	}
}