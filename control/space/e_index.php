<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$end_time_arr = keke_glob_class::get_taskstatus_desc();
$model_list = $kekezu->_model_list; 
$indus_arr_all = $kekezu->_indus_arr;
$sql = sprintf("select * from %switkey_task where uid=%d and task_status!=0 and task_status!=1 order by start_time desc limit 0,5",TABLEPRE,$member_id);
$pub_task_arr = db_factory::query($sql);
$sql = "select a.work_id,b.* from %switkey_task_work as a left join %switkey_task as b on a.task_id = b.task_id where a.uid = %d group by b.task_id order by b.start_time desc  limit 0,5";
$join_task_arr = db_factory::query(sprintf($sql,TABLEPRE,TABLEPRE,$member_id));
$sql = sprintf("select a.* ,b.* from %switkey_shop_case as a left join %switkey_service as b on a.service_id = b.service_id where  a.shop_id = %d order by b.service_id desc limit 0,9 ",TABLEPRE,TABLEPRE,$e_shop_info['shop_id']);
$case_arr = db_factory::query($sql);
$sql = sprintf("select * from %switkey_service where uid = %d order by  service_id desc limit 0,3",TABLEPRE,$member_id);
$shop_arr = db_factory::query($sql);
$sql =sprintf("select * from %switkey_member_ext where uid=%d and type='cert'",TABLEPRE,$member_id);
$cert_count = db_factory::execute($sql);
$indus_arr = explode(",",  $e_shop_info['service_range']);
function task_time_desc($model_id,$status, $end_time) {
	global $end_time_arr;
	$now_time = time ();
	$desc_time = $end_time - $now_time;
	$sy_time = kekezu::time2Units ( $desc_time );
	if(!$end_time){
		return $end_time_arr[$model_id][$status]['desc'];
	}
	if($sy_time){
		return $sy_time."��".$end_time_arr[$model_id][$status]['desc'];
	} 
}
require keke_tpl_class::template(SKIN_PATH."/space/{$type}_{$view}");