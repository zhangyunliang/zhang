<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
($uid && !isset($_SESSION['auid'])) and kekezu::show_msg ( $_lang['friendly_notice'], 'index.php', 3, $_lang['you_has_login'],'warning');
$page_title=$_lang['register'].'-'.$_K['html_title'];
$reg_obj = new keke_register_class();
$api_name = keke_glob_class::get_open_api();
if (isset($formhash)&&kekezu::submitcheck($formhash)){ 
	$reg_uid = $reg_obj->user_register($txt_account, md5($pwd_password), $txt_email,$txt_code,1,$pwd_password);
	$user_info = keke_user_class::get_user_info($reg_uid); 
	if(isset($unit)&&$unit){
		$unit_obj = new kk_client($app_key, $app_secret);
		$task_url = $unit_obj->clientlogin($user_info['uid']);
		keke_function_class::curl_request($task_url,"get",null);
	}
	$reg_obj->register_login($user_info);
}
if (isset ( $check_email ) && ! empty ( $check_email )) {
	$res = keke_user_class::check_email ( $check_email );  
	echo  $res;
	die ();
}
if (isset ( $check_username ) && ! empty ( $check_username )) {
	 $res =  keke_user_class::check_username ( $check_username );
	 echo  $res;
	 die ();
}
require keke_tpl_class::template ( $do );