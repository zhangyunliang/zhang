<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$report_info = keke_report_class::get_report_info ( $report_id );
$report_info or kekezu::admin_show_msg ( $_lang['parameters_error_not_exist'] . $action_arr [$type] [1] . $_lang['record'], "index.php?do=trans&view=$type",3,'','warning' );
$user_info = kekezu::get_user_info ( $report_info ['uid'] ); 
$to_userinfo = kekezu::get_user_info ( $report_info ['to_uid'] ); 
$obj_info = keke_report_class::obj_info_init ( $report_info,$user_info);
$ac == 'download' and keke_file_class::file_down ( $filename, $filepath ); 
if ($type == 'complaint') { 
	$obj_info or kekezu::admin_show_msg($_lang['friendly_notice'],'index.php?do=trans&view=complaint',3,$_lang['deal_object_del'],'warning');
	if ($sbt_op) {
		$op_result[action]=='pass' and $report_status = 4 or $report_status=3;		
		$url = "index.php?do=$do&view=$type&report_status=$report_status";		
		$res = keke_report_class::sub_process_ts ($report_info,$user_info,$to_userinfo,$op_result );
		$res and kekezu::admin_show_msg ($_lang['operate_notice'], $url, "2", $_lang['process_success'],'success') or kekezu::admin_show_msg ( $_lang['operate_notice'], $url, "2",$_lang['operate_over'], 'warning' );
	} else {
		$report_info = keke_report_class::get_report_info ( $report_id );
	}
	require keke_tpl_class::template ( 'control/admin/tpl/admin_trans_process' );
} else {
	 $obj_info or kekezu::admin_show_msg($_lang['friendly_notice'],'index.php?do=trans&view=report',3,$_lang['deal_object_del'],'warning');
	$report_info = keke_report_class::get_report_info ( $report_id );
	$model_info = $kekezu->_model_list [$obj_info ['model_id']];
	$path =  S_ROOT .$model_info ['model_type'] . "/" . $model_info ['model_dir'] . "/control/admin/admin_route.php";
	require $path;
}