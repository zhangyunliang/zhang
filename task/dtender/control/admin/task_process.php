<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
if($report_info ['obj']=='task'){
	$task_cash = db_factory::get_one(sprintf("select task_cash,profit_rate from %switkey_task where task_id='%d'",TABLEPRE,$report_info ['origin_id'] ));
	$obj_info['cash'] = floatval($task_cash['task_cash'])*(1 - floatval($task_cash['profit_rate'])/100);
}
$process_obj=dtender_report_class::get_instance($report_id,$report_info,$obj_info,$user_info,$to_userinfo);
if($op_result){
	switch ($type){
		case "rights":
			$res=$process_obj->process_rights($op_result,$type);
			break;
		case "report":
			$res=$process_obj->process_report($op_result,$type);
			break;
		case "complaint":
			break;
	}
}else{
	$gz_info  =$process_obj->user_role('gz');
	$wk_info  =$process_obj->user_role('wk');
	$credit_info=$process_obj->_credit_info;
	$process_can=$process_obj->_process_can;
}
require keke_tpl_class::template ( 'task/' . $model_info ['model_dir'] . '/control/admin/tpl/task_' . $view );