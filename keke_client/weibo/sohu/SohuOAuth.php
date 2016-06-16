<?php

/*
 * Abraham Williams (abraham@abrah.am) http://abrah.am
 *
 * The first PHP Library to support OAuth for Twitter's REST API.
 */

/* Load OAuth lib. You can find it at http://oauth.net */

/**
 * �Ѻ�(SOHU)��phpʾ�������� ����Abraham Williams�����Ŀ�Դtwitteroauth��ġ�
 * https://github.com/abraham/twitteroauth
 */
require_once('OAuth.php');

/**
 * �Ѻ�OAuth��֤php��
 */
class SohuOAuth {
	/* Contains the last HTTP status code returned. */
	public $http_code;
	/* Contains the last API call. */
	public $url;
	/* Set up the API root URL. */
	public $host = "http://api.t.sohu.com/";
	/* Set timeout default. */
	public $timeout = 30;
	/* Set connect timeout. */
	public $connecttimeout = 30;
	/* Verify SSL Cert. */
	public $ssl_verifypeer = FALSE;
	/* Respons format. */
	public $format = 'json';
	/* Decode returned json data. */
	public $decode_json = TRUE;
	/* Contains the last HTTP headers returned. */
	public $http_info;
	/* Set the useragnet. */
	public $useragent = 'SohuOAuth v0.0.1';

	/**
	 * ����OAuth��֤��Ҫ��Urls
	 */
	function accessTokenURL()  { return 'http://api.t.sohu.com/oauth/access_token'; }
	function authenticateURL() { return 'http://api.t.sohu.com/oauth/authorize'; }
	function authorizeURL()    { return 'http://api.t.sohu.com/oauth/authorize'; }
	function requestTokenURL() { return 'http://api.t.sohu.com/oauth/request_token'; }

	function lastStatusCode() { return $this->http_status; }
	function lastAPICall() { return $this->last_api_call; }

	/**
	 *
	 * ����SohuOAuth����ʵ��
	 * @param String $consumer_key
	 * @param String $consumer_secret
	 * @param String $oauth_token ����access key��û�����뵽��ʱ�����ʡ��
	 * @param String $oauth_token_secret  ����access key��Ӧ����Կ��û�����뵽��ʱ�����ʡ��
	 */
	function __construct($consumer_key, $consumer_secret, $oauth_token = NULL, $oauth_token_secret = NULL) {
		$this->sha1_method = new OAuthSignatureMethod_HMAC_SHA1();
		$this->consumer = new OAuthConsumer($consumer_key, $consumer_secret);
		if (!empty($oauth_token) && !empty($oauth_token_secret)) {
			$this->token = new OAuthConsumer($oauth_token, $oauth_token_secret);
		} else {
			$this->token = NULL;
		}
	}


	/**
	 * ��ȡrequest_token
	 * @param $oauth_callback
	 * @return a key/value array containing oauth_token and oauth_token_secret
	 */
	function getRequestToken($oauth_callback = NULL) {
		$parameters = array();
		if (!empty($oauth_callback)) {
			$parameters['oauth_callback'] = $oauth_callback;
		}
		$request = $this->oAuthRequest($this->requestTokenURL(), 'GET', $parameters);
		$token = OAuthUtil::parse_parameters($request);
		$this->token = new OAuthConsumer($token['oauth_token'], $token['oauth_token_secret']);
		return $token;
	}

	/**
	 * ��ȡ�û���֤��ַ��authorize url�����˹����û�����App�ķ��ʽ�����Ȩ��
	 * @param string $token ����֮ǰ��ȡ��request_token
	 * @param $sign_in_with_sohu
	 */
	function getAuthorizeURL($token, $sign_in_with_sohu = TRUE) {
		if (is_array($token)) {
			$token = $token['oauth_token'];
		}
		if (empty($sign_in_with_sohu)) {
			return $this->authorizeURL() . "?oauth_token={$token}";
		} else {
			return $this->authenticateURL() . "?oauth_token={$token}";
		}
	}
	/**
     * get authorize url for oauth version 1.0
     * @param $token request token
     * @param $oauth_callback oauth callback url
     */
    function getAuthorizeUrl1($token, $oauth_callback) {
        if (is_array($token)) {
            $token = $token['oauth_token'];
        }
        return $this->authorizeURL() . "?oauth_token={$token}"."&oauth_callback=".urlencode($oauth_callback);
    }

	/**
	 *
	 * �û���֤��Ϻ��ȡaccess token
	 * @param string $oauth_verifier �û���Ȩ���������֤��
	 * @returns array("oauth_token" => "the-access-token",
	 *                "oauth_token_secret" => "the-access-secret",
	 *                "user_id" => "9436992",
	 *                "screen_name" => "abraham")
	 */
	function getAccessToken($oauth_verifier = FALSE) {
		$parameters = array();
		if (!empty($oauth_verifier)) {
			$parameters['oauth_verifier'] = $oauth_verifier;
		}
		$request = $this->oAuthRequest($this->accessTokenURL(), 'GET', $parameters);
		$token = OAuthUtil::parse_parameters($request);
		$this->token = new OAuthConsumer($token['oauth_token'], $token['oauth_token_secret']);
		return $token;
	}

	/**
	 * XAuth�Ļ�ȡaccess token��������Ҫ��Ӧ����Ȩ���û����û��������롣
	 *
	 * @param string $username �û���
	 * @param string $password �û�������
	 * @returns array("oauth_token" => "the-access-token",
	 *                "oauth_token_secret" => "the-access-secret",
	 *                "user_id" => "9436992",
	 *                "screen_name" => "abraham",
	 *                "x_auth_expires" => "0")
	 */
	function getXAuthToken($username, $password) {
		$parameters = array();
		$parameters['x_auth_username'] = $username;
		$parameters['x_auth_password'] = $password;
		$parameters['x_auth_mode'] = 'client_auth';
		$request = $this->oAuthRequest($this->accessTokenURL(), 'POST', $parameters);
		$token = OAuthUtil::parse_parameters($request);
		$this->token = new OAuthConsumer($token['oauth_token'], $token['oauth_token_secret']);
		return $token;
	}

	/**
	 * OAuthRequest GET����İ�װ��
	 */
	function get($url, $parameters = array()) {
		$response = $this->oAuthRequest($url, 'GET', $parameters);
		if ($this->format === 'json' && $this->decode_json) {
			return json_decode($response,true);
		}
		return $response;
	}

	/**
	 * OAuthRequest POST����İ�װ��
	 */
	function post($url, $parameters = array(),$multi = false) {
		$response = $this->oAuthRequest($url, 'POST', $parameters,$multi);
		if ($this->format === 'json' && $this->decode_json) {
			return json_decode($response,true);
		}
		return $response;
	}

	/**
	 * OAuthRequest DELETE����İ�װ��
	 */
	function delete($url, $parameters = array()) {
		$response = $this->oAuthRequest($url, 'DELETE', $parameters);
		if ($this->format === 'json' && $this->decode_json) {
			return json_decode($response);
		}
		return $response;
	}

	/**
	 * ǩ������������http����
	 * @param string $url api ��ַ
	 * @param string $method http���󷽷������� GET,POST,DELETE,TRACE,HEAD,OPTIONS,PUT
	 * @param $parameters �������
	 */
	function oAuthRequest($url, $method, $parameters,$multi=false) {
		if (strrpos($url, 'https://') !== 0 && strrpos($url, 'http://') !== 0) {
			$url = "{$this->host}{$url}.{$this->format}";
		}
		$request = OAuthRequest::from_consumer_and_token($this->consumer, $this->token, $method, $url, $parameters);
		$request->sign_request($this->sha1_method, $this->consumer, $this->token);
		switch ($method) {
			case 'GET':
				return $this->http($request->to_url(), 'GET');
			default:
				return $this->http($request->get_normalized_http_url(), $method, $request ->to_postdata($multi));
		}
	}

	/**
	 * ����HTTP����
	 *
	 * @return API���ؽ��
	 */
	function http($url, $method, $postfields = NULL , $multi = false) {
		$this->http_info = array();
		$ci = curl_init();
		/* Curl settings */
		curl_setopt($ci, CURLOPT_USERAGENT, $this->useragent);
		curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, $this->connecttimeout);
		curl_setopt($ci, CURLOPT_TIMEOUT, $this->timeout);
		curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ci, CURLOPT_HTTPHEADER, array('Expect:'));
		curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, $this->ssl_verifypeer);
		curl_setopt($ci, CURLOPT_HEADERFUNCTION, array($this, 'getHeader'));
		curl_setopt($ci, CURLOPT_HEADER, FALSE);

		switch ($method) {
			case 'POST':
				curl_setopt($ci, CURLOPT_POST, TRUE);
				if (!empty($postfields)) {
					curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
				}
				break;
			case 'DELETE':
				curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
				if (!empty($postfields)) {
					$url = "{$url}?{$postfields}";
				}
		}
		
		$header_array = array(); 
        $header_array2=array(); 
        if( $multi ) 
        	$header_array2 = array("Content-Type: multipart/form-data; boundary=" . OAuthUtil::$boundary , "Expect: ");
        foreach($header_array as $k => $v) 
            array_push($header_array2,$k.': '.$v); 

        curl_setopt($ci, CURLOPT_HTTPHEADER, $header_array2 ); 
        curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE ); 

		curl_setopt($ci, CURLOPT_URL, $url);
		$response = curl_exec($ci);
		$this->http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
		$this->http_info = array_merge($this->http_info, curl_getinfo($ci));
		$this->url = $url;
		curl_close ($ci);
		return $response;
	}

	/**
	 * Get the header info to store.
	 */
	function getHeader($ch, $header) {
		$i = strpos($header, ':');
		if (!empty($i)) {
			
			$key = str_replace('-', '_', strtolower(substr($header, 0, $i)));
			$value = trim(substr($header, $i + 2));
			$this->http_header[$key] = $value;
		}
		return strlen($header);
	}
}









