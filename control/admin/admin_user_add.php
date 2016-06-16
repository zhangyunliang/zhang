<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 11 );
$basic_config = $kekezu->_sys_config;
$reg_obj = new keke_register_class ();
$member_class = new keke_table_class ( 'witkey_member' );
$space_class = new keke_table_class ( 'witkey_space' );
$edituid and $member_arr = kekezu::get_user_info ( $edituid );
$member_group_arr = db_factory::query ( sprintf ( "select group_id,groupname from %switkey_member_group", TABLEPRE ) );
if ($is_submit == 1) {
	if (! $edituid) {
		$reg_uid = $reg_obj->user_register ( $fds [username], md5 ( $fds [password] ), $fds ['email'], null, false,$fds [password] );
		unset ( $fds [repassword] );
		is_null ( $fds ['group_id'] ) or db_factory::execute ( sprintf ( "update %switkey_space set group_id={$fds['group_id']} where uid=$reg_uid", TABLEPRE ) );
		kekezu::admin_system_log ( $_lang['add_member'] . $fds ['username'] );
		kekezu::admin_show_msg ( $_lang['operate_notice'], "index.php?do=user&view=add", 3, $_lang['user_creat_success'] ,'success');
	} else { 
		$uinfo = kekezu::get_user_info($edituid);
		if ($fds ['password']) {
			$slt = db_factory::get_count ( sprintf ( "select rand_code from %switkey_member where uid = '%d'", TABLEPRE, $edituid ) );
			$sec_code = keke_user_class::get_password ( $fds ['password'], $slt );
			$fds ['sec_code'] = $sec_code;
			$newpwd  = $fds ['password'];
			$pwd = md5 ( $fds ['password'] );
			$fds [password] = $pwd;
			db_factory::execute ( sprintf ( "update %switkey_member set password ='%s' where uid=%d", TABLEPRE, $pwd, $edituid ) );
		}else{
	 		unset($fds['password']);
	 	}
	 	keke_user_class::user_edit ( $uinfo['username'], '', $newpwd,$email,1,0);
		$space_class->save ( $fds, array ("uid" => "$edituid" ) ); 
		kekezu::admin_system_log ( $_lang['edit_member'] . $member_arr [username] );
		kekezu::admin_show_msg ( $_lang['edit_success'], $_SERVER ['HTTP_REFERER'],3,'','success' );
	}
}
require $template_obj->template ( 'control/admin/tpl/admin_user_add' );