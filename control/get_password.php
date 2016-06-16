<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$uid and header ( "location:index.php" );
$page_title=$_lang['find_back_password'].'- '.$_K['html_title'];
$api_name = keke_glob_class::get_open_api();
$j = $_K['siteurl'].'/index.php?do=get_password';
if (kekezu::submitcheck($formhash)) {
		$user_info = kekezu::get_user_info($txt_account,true);
		$img = new Secode_class ();
		$check_code = $img->check ( $txt_code, 1 );
		$check_code or kekezu::show_msg($_lang['friendly_notice'],"",3,$_lang['you_input_auth_code_error']);
		switch ($accout_type){
			case "email":
					$sql = "select * from %switkey_auth_email where uid=%d and auth_status=1 and email='%s'";
					$sql = sprintf($sql,TABLEPRE,$user_info['uid'],$email);
					$email_auth = db_factory::query($sql);
					if($email_auth){
						$pass_info = reset_set_password($user_info);
						$v_arr = array($_lang['username']=>$user_info['username'],$_lang['website_name']=>$kekezu->_sys_config['website_name'],$_lang['password']=>$pass_info['code'],$_lang['safe_code']=>$pass_info['sec_code'] ); 
						keke_shop_class::notify_user($user_info['uid'], $user_info['username'], 'get_password', $_lang['find_back_password'],$v_arr);
						kekezu::show_msg($_lang['friendly_notice'],$j,3,$_lang['your_new_password_in_email']);
					}else{
						kekezu::show_msg($_lang['friendly_notice'],$j,3,$_lang['no_email_auth_no_back']);
					}
				break;
			case "mobile":
					$sql = "select count(mobile_a_id) from %switkey_auth_mobile where uid=%d and auth_status=1 and mobile='%s'";
					$mobile_auth = db_factory::get_count(sprintf($sql,TABLEPRE,$user_info['uid'],$mobile));
					if($mobile_auth){
						$pass_info = reset_set_password($user_info);
						$msg = new keke_msg_class();
						$msg_str = $_lang['password_is'] .$pass_info['code']."£¬". $_lang['your_safe_code_is'] .$pass_info['sec_code'];
						$mobile_auth and $msg->send_phone_sms($user_info['mobile'],$msg_str);
						kekezu::show_msg($_lang['friendly_notice'],$j,3,$_lang['password_has_send_to_phone']);
					}else{
						kekezu::show_msg($_lang['friendly_notice'],$j,3,$_lang['no_phone_auth_no_back']);
					}
				break;
		}
}
function reset_set_password($user_info){
	$code = kekezu::randomkeys(6);
	$user_code = md5($code);
	$slt = kekezu::randomkeys(6);
	$user_seccode = keke_user_class::get_password($code, $slt);
	$sql = "update %switkey_member set password = '%s' , rand_code = '%s' where uid=%d";
	$sql = sprintf($sql,TABLEPRE,$user_code,$slt,$user_info['uid']); 
	$res = db_factory::execute($sql);
	$sql = "update %switkey_space set  password = '%s' , sec_code = '%s' where uid=%d";
	$sql = sprintf($sql,TABLEPRE,$user_code,$user_seccode,$user_info['uid']);
	db_factory::execute($sql);
	$pass_info ['code'] = $code;
	$pass_info ['sec_code'] = $slt;
	return $pass_info; 
}
require keke_tpl_class::template ( $do );