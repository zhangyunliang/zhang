<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$bank_obj = new Keke_witkey_auth_bank_class(); 
$pay_tool_arr = array (1 =>$_lang['alipay'], 2 => $_lang['tenpay'], 3 => $_lang['payment_online'] );
$bank_name_arr = keke_glob_class::get_bank();
if ($sbt_pay_to_user) {
	$bank_obj->setWhere ( 'bank_a_id=' . $fds['bank_a_id'] );
	$bank_obj->setPay_to_user_cash ( $fds['pay_to_user_cash'] );
	$bank_obj->setPay_time ( time () );
	$res = $bank_obj->edit_keke_witkey_auth_bank();
	$bank_info = db_factory::get_one(sprintf(" select uid,username from %switkey_auth_bank where bank_a_id = '%d'",TABLEPRE,$fds[bank_a_id]));
	kekezu::notify_user ( $_lang['bank_auth_notice'],$_lang['admin_give_cach_notice'].'<a href="index.php?do=user&view=auth">'.$_lang['admin_give_cach_notice'].'</a>'.$_lang['confirm_gain_cach'], $bank_info [uid], $bank_info [username] );
	$res and kekezu::admin_show_msg ( $_lang['give_cach_success'],$_SERVER['HTTP_REFERER'],'3','','success');
}else{
	$bank_a_id and $bank_info = db_factory::get_one(sprintf(" select * from %switkey_auth_bank where bank_a_id = '%d'",TABLEPRE,$bank_a_id));
}
require $template_obj->template ( 'auth/' . $auth_dir . '/control/admin/tpl/auth_info' );