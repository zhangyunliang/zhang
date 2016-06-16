<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(135);
include S_ROOT.'/keke_client/keke/config.php';
$task_data_dir = S_ROOT.'keke_client/keke/task_list.txt';
$task_list = file_get_contents( $task_data_dir );
$task_list = unserialize($task_list);
if ($ajax && $pid) {
	$option_str = get_indus( intval($pid) );
	$options = kekezu::echojson('',$option_str ? '1' : '0',$option_str);
	die();
}
if ($ajax && $ajax=='modify_title'){
	if(!isset($t_key) || !isset($t_index) || !isset($t_value)){die();}
	if ($task_list[$t_index]['keke_task_id']==$t_key){
		if (strtolower(CHARSET)!='utf-8'){
			$t_value = kekezu::utftogbk($t_value);
		}
		$task_list[$t_index]['task_title']=$t_value;
		file_put_contents($task_data_dir, serialize($task_list));
	}
	die();
}
if (isset($sbt_action) || isset($add,$add_index,$add_id)) {
	if ($task_list[intval($add_index)] && $task_list[intval($add_index)]['keke_task_id']==intval($add_id)){
		$task_list_remain = $task_list;
		unset($task_list_remain[intval($add_index)]);
		$task_add = $task_list[intval($add_index)];
		unset($task_list); $task_list[]=$task_add;
	}
	$sql = "insert into %switkey_task (`r_task_id`,`task_union`,`task_title`,`task_desc`,`task_cash`,`task_status`,`start_time`,`end_time`,`indus_id`,`indus_pid`,`task_cash_coverage`) values ";
	$indus_pid = intval($p_indus_select);
	$indus_id = intval($s_indus_select);
	while (list($key,$value)=each($task_list)){
		$sql .= '('.intval($value['keke_task_id']);
		$sql .= ',2,"'.$value['task_title'].'","'.$value['task_desc'].'",'.floatval($value['task_cash']).',2,'.intval($value['start_time']).','.intval($value['end_time']).','.$indus_id.','.$indus_pid;
		$sql .= $task_list['cash_cove'] ? ','.get_cover_id($task_list['cash_cove']) : ',null),';
		$log_ids.=$value['keke_task_id'].',';
	}
	$sql = rtrim($sql,',');
	$result = db_factory::execute( sprintf($sql,TABLEPRE));
	kekezu::admin_system_log('[����]�����������'.$result);
	if ($result){
		$data = array(
					'log_details'=>rtrim($log_ids,',')
			);
		keke_union_class::union_request('get_task',$data);
		chmod($task_data_dir, 0777);
		!empty($task_list_remain) ? file_put_contents($task_data_dir, serialize($task_list_remain)) : unlink($task_data_dir);
		kekezu::admin_show_msg('��ʾ','?do=keke&view=gettask',2,'����������ӳɹ�','success');
	}
	kekezu::admin_show_msg('��ʾ','?do=keke&view=gettask',2,'�������ʧ��','warning');
}
if (isset($ac)) {
	if (isset($reget) && $reget=='reget'){
		unlink($task_data_dir);
		keke_union_class::get_task_list();
	} else if (isset($index,$del_id)){
		if ($task_list[intval($index)] && $task_list[intval($index)]['keke_task_id']==intval($del_id)){
			unset($task_list[intval($index)]);
			file_put_contents($task_data_dir, serialize($task_list));
			kekezu::admin_show_msg('��ʾ','?do=keke&view=gettask',2,'����ɾ���ɹ�','success');
		}else{
			kekezu::admin_show_msg('��ʾ','?do=keke&view=gettask',2,'����ɾ��ʧ��','warning');
		}
	} else if (isset($add,$add_index,$add_id)){
		if ($task_list[intval($add_index)] && $task_list[intval($add_index)]['keke_task_id']==intval($add_id)){
			$sql = "insert into %switkey_task (`r_task_id`,`task_union`,`task_title`,`task_desc`,`task_cash`,`task_status`,`start_time`,`end_time`,`indus_id`,`indus_pid`) values ";
		}
	}
}
$indus_p_arr = get_indus();
function get_indus($pid='0'){
	global $kekezu;
	!$pid && $pid=strval(0);
	$indus_arr = kekezu::get_indus_by_index ('1',$pid);
	$str = '';
	while (list($key,$value)=each($indus_arr[$pid])){
		$str .= '<option value="'.$value['indus_id'].'">'.$value['indus_name'].'</option>';
	}
	return $str;
}
function get_cover_id( $price_range ){
	$cover_arr = explode('-', $price_range);
	if ( sizeof($cover_arr)<2 ){return false;}
	$start_cover = floor($cover_arr[0]);
	$end_cover = floor($cover_arr[1]);
	$sql = "select cash_rule_id from %switkey_task_cash_cove where `start_cove`<=%d and `end_cove`>=%d and `start_cove`+`end_cove`>=%d";
	$cove_id = db_factory::get_count(sprintf($sql,TABLEPRE,$start_cover,$end_cover,$start_cover+$end_cover));
	return $cove_id;
}
require $template_obj->template ( "control/admin/tpl/admin_{$do}_{$view}" );