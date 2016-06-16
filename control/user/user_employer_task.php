<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$task_count = kekezu::get_table_data ( "model_id,count(task_id) as count", "witkey_task", " uid = '$uid' ", '', 'model_id', '', 'model_id' );
$cove_arr = kekezu::get_table_data("*","witkey_task_cash_cove","","","","","cash_rule_id");
$model_id and $model_id = intval ( $model_id );
$where = " model_id = '$model_id' and uid='$uid' ";
intval ( $page_size ) or $page_size = '10';
intval ( $page ) or $page = '1';
$url = $origin_url . "&op=$op&model_id=$model_id&page_size=$page_size&status=$status&page=$page";
$third_nav = array ();
foreach ( $model_list as $v ) {
	$third_nav [] = array ("1" => $v ['model_id'], "2" => $_lang ['release'] . $v ['model_name'], "3" => intval ( $task_count [$v ['model_id']] ['count'] ) );
}
$ord_arr = array (' task_id desc ' => $_lang ['task_id_desc'], " task_id asc " => $_lang ['task_id_asc'], " start_time desc " => $_lang ['start_time_desc'], " start_time asc " => $_lang ['start_time_asc'], " end_time desc " => $_lang ['end_time_desc'], " end_time asc " => $_lang ['end_time_asc'] );
if (isset ( $ac )) {
	$task_id = intval ( $task_id );
	if ($task_id) {
		switch ($ac) {
			case "del" :
				$res = db_factory::execute ( sprintf ( " delete from %switkey_task where task_id='%d' and task_status=0 ", TABLEPRE, $task_id ) );
				$res and kekezu::show_msg ( $_lang ['operate_notice'], $url, 3, $_lang ['t_delete_success'], 'success' ) or kekezu::show_msg ( $_lang ['operate_notice'], $url, 3, $_lang ['t_delete_fail'], 'warning' );
				break;
		}
	} else {
		kekezu::show_msg ( $_lang ['operate_notice'], $url, 3, $_lang ['please_choose_delete_task'], "warning" );
	}
}
if ($model_id) {
	$task_obj = new Keke_witkey_task_class ();
	$page_obj = $kekezu->_page_obj;
	$cls = $model_list [$model_id] ['model_code'] . "_task_class";
	$status_arr = call_user_func ( array ($cls, "get_task_status" ) );
	$pub_count = intval ( db_factory::get_count ( sprintf ( "select count(task_id) pub_count from %switkey_task
 		where YEARWEEK(FROM_UNIXTIME(start_time)) = YEARWEEK('%s') and model_id='%d' and uid='%d'", TABLEPRE, date ( 'Y-m-d H:i:s', time () ), $model_id, $uid ) ) );
	$sql = sprintf ( "select *,substring(
		payitem_time,
		instr(payitem_time,'top')+4+LENGTH('top'),10) as top_time, 
		substring(
		payitem_time,
		instr(payitem_time,'urgent')+4+LENGTH('urgent'),10)  as urgent_time  from %switkey_task where ", TABLEPRE );
	($status === '0') and $where .= " and task_status='$status'" or ($status and $where .= " and task_status = '$status' ");
	$task_id && $task_id != $_lang ['input_task_id'] and $where .= " and task_id = '$task_id' ";
	$task_title && $task_title != $_lang ['input_task_name'] and $where .= " and INSTR(task_title,'$task_title')>0 ";
	$ord and $where .= " order by $ord " or $where .= " order by task_id desc ";
	$count = db_factory::get_count ( sprintf ( "select count(task_id) from %switkey_task where %s", TABLEPRE, $where ) );
	$pages = $page_obj->getPages ( $count, $page_size, $page, $url, '#userCenter' );
	$task_info = db_factory::query ( $sql . $where . $pages ['where'] );
}
if ($ac == 'pay' && $task_id && $model_id) {
	$model_info = $kekezu->_model_list [$model_id];
	if ($model_info ['model_type'] == "task") {
		$class_name = $model_info ['model_code'] . "_task_class";
		$order_id = db_factory::get_count ( sprintf ( " select order_id from %switkey_order_detail where obj_id='%d'", TABLEPRE, $task_id ) );
		$task_info = db_factory::get_one ( sprintf ( "select * from %switkey_task where task_id='%d'", TABLEPRE, $task_id ) );
		$obj = new $class_name ( $task_info );
		$res = $obj->dispose_order ( $order_id, $ac );
		kekezu::show_msg($res['title'],$res['url'],3,$res['content'],$res['type']);
	}
}
$payitem_list = keke_payitem_class::get_payitem_config ();
require keke_tpl_class::template ( "user/" . $do . "_" . $view . "_" . $op );
