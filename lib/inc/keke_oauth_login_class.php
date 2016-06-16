<?php
class keke_oauth_login_class extends keke_oauth_base_class {
	public $_url ;
 	function __construct($wb_type) {
 		parent::__construct ( $wb_type );
	}
	function login($call_back,$url) {
		global $oauth_verifier,$code;
		if (isset($code) && $this->_wb_type=='sina'){
			$oauth_verifier = array('code'=>$code,'redirect_uri'=>$url);
		}
		if ($call_back) {
			oauth_api_factory::create_access_token ( $oauth_verifier, $this->_wb_type, $this->_app_id, $this->_app_secret );
			header ( "Location:$url");
			die ();
		}
		$this->_url = $url;
		if (oauth_api_factory::get_access_token ( $this->_wb_type, $this->_app_id, $this->_app_secret )) {
			return true;
		} else {
			$aurl = oauth_api_factory::get_auth_url ("$url&call_back=1", $this->_wb_type, $this->_app_id, $this->_app_secret );
 			header ( 'Location:' . $aurl );
			die ();
		}
	}
	function get_login_user_info(){
		$user_auth_info = oauth_api_factory::get_login_info ( $this->_wb_type, $this->_app_id, $this->_app_secret );
		if($user_auth_info){
			return oauth_api_factory::user_data_format ( $user_auth_info, $this->_wb_type, $this->_app_id, $this->_app_secret );	
		}else{
			return false;
		}
	}
	function logout() {
		oauth_api_factory::clear_access_token($this->_wb_type, $this->_app_id, $this->_app_secret);
	}
	function get_user_info() {
	}
}
?>