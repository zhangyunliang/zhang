<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$type or exit(kekezu::show_msg($_lang['operate_notice'],"index.php?do=login",2,$_lang['type_no_empty'],"warning"));
$page_title=$_lang['login']."-".$_K['html_title'];
$open_api_arr = keke_glob_class::get_open_api ();
$oauth_type_arr = keke_glob_class::get_oauth_type ();
$oauth_url = $kekezu->_sys_config ['website_url'] . "/index.php?do=$do&type=$type";
$oa = new keke_oauth_login_class ( $type );
if ($type && ! $_SESSION ['auth_' . $type] ['last_key']) {
	$oauth_vericode = $oauth_vericode;
	$oa->login ( $call_back, $oauth_url );
} else { 
	$oauth_user_info = $oa->get_login_user_info ();
}
if ($oauth_user_info && $formhash) {
	if (! $bind_info = keke_register_class::is_oauth_bind ( $type, $oauth_user_info ['account'] )) {
		$reg_obj = new keke_register_class ();
		$reg_uid = $reg_obj->user_register ( $txt_account, md5($pwd_password), $txt_email, $txt_code,1,$pwd_password );
		if ($reg_uid) {
			$user_info = keke_user_class::get_user_info ( $reg_uid );
			$reg_obj->register_binding ( $oauth_user_info, $user_info, $type );
			$reg_obj->register_login ( $user_info );
		} else {
			kekezu::show_msg ( $_lang['operate_notice'], "", '2', $_lang['login_account_fail'] );
		}
	} else {
		kekezu::show_msg ( $_lang['operate_notice'], "", '2', $_lang['now_three_account_bind'] );
	}
}
require keke_tpl_class::template ( $do );