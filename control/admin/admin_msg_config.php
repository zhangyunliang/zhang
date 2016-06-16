<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(66);
require '../../keke_client/sms/sms.php';
$account_info = $kekezu->_sys_config; 
$mobile_u = $account_info ['mobile_username'];
$mobile_p = $account_info ['mobile_password'];
$op and $op = $op or $op = 'config';
$url = "index.php?do=$do&view=$view&op=$op";
switch ($op) {
	case "config" :
		if (! isset ( $sbt_edit )) {
			$bind_info = check_bind ( 'mobile_username' );
		} else { 
			foreach ( $conf as $k => $v ) {
				if (check_bind ( $k )) {
					$res .= db_factory::execute ( " update " . TABLEPRE . "witkey_basic_config set v='$v' where k='$k'" );
				} else {
					$res .= db_factory::execute ( " insert into " . TABLEPRE . "witkey_basic_config values('','$k','$v','mobile','','')" );
				}
			}
			$kekezu->_cache_obj->gc();
			kekezu::admin_system_log($_lang['edit_mobile_log']);
			if ($res)
				kekezu::admin_show_msg ( $_lang['binding_cellphone_account_successfully'], "index.php?do=$do&view=$view&op=config",3,'','success' );
			else
				kekezu::admin_show_msg ( $_lang['binding_cellphone_account_fail'], "index.php?do=$do&view=$view&op=config",3,'','warning' );
		}
		break;
	case "manage" :
		if ($remain_fee) {
			if ($mobile_p && $mobile_u) {
				$sms = new sms('','','getbalance');
				$m   = $sms->send();
				if (! $m) {
					kekezu::echojson ( $_lang['get_user_info_fail'], "2" );
					die ();
				} else {
					kekezu::echojson ($m, "1" );
					die ();
				}
			} else {
				kekezu::admin_show_msg ( $_lang['not_bind_cellphone_account'], "index.php?do=$do&view=$view&op=config",3,'','warning' );
			}
		}
		break;
}
function check_bind($k) {
	return db_factory::get_count ( " select k from " . TABLEPRE . "witkey_basic_config where k='$k'" );
}
require $template_obj->template ( 'control/admin/tpl/admin_' . $do . '_' . $view );