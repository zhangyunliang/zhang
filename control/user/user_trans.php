<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$sub_nav=array(
	array(
	   "rights"=>array($_lang['rights_manage'],"key"),
	   "report"=>array($_lang['report_manage'],"shield"),
	   "complaint"=>array($_lang['complain_manage'],"openid")))
	;
$ops = array('rights',"report","complaint");
in_array ( $op, $ops ) or $op = 'rights';
$ac_url = $origin_url . "&op=$op";
$role or $role = '1'; 
intval ( $status ) or $status = ''; 
strval ( $obj ) or $obj = "task"; 
$report_obj = new Keke_witkey_report_class (); 
$where = " 1 = 1 ";
intval ( $page ) or $page = "1";
intval ( $page_size ) or $page_size = "10";
$url = $ac_url . "&role=$role&status=$status&obj=$obj&ord=$ord&page_size=$page_size&page=$page";
if ($ac) {
	switch ($ac) {
		case "download" :
			keke_file_class::file_down ( $filename, $filepath );
			break;
		case "del" :
			if ($report_id) {
				$res = db_factory::execute (sprintf(" delete from %switkey_report where report_id='%d'",TABLEPRE,$report_id));
				$filepath and keke_file_class::del_file($filepath);
				$res and kekezu::show_msg ( $_lang['operate_notice'], $url."#userCenter", "3", $_lang['delete'] . $action_arr [$op] . $_lang['record_success'],'success' ) or kekezu::show_msg ( $_lang['operate_notice'], $url."#userCenter", "3", $_lang['delete'] . $action_arr [$op] . $_lang['record_fail'],"warning" );
			} else
				kekezu::show_msg ( $_lang['operate_notice'], $url."#userCenter", "3", $_lang['please_select_delete'] . $action_arr [$op] . $_lang['record'], "warning" );
			break;
	}
} else {
	$transrights_status = keke_report_class::get_transrights_status (); 
	$transrights_object = keke_report_class::get_transrights_obj(); 
	$transrights_type   = keke_report_class::get_transrights_type();
	$third_title = kekezu::lang($op.'_manage');
	$third_nav = array (
	  "launched" => array ($_lang['launch'].$_lang['de'].$transrights_type[$op]['1'],"",1),
	  "received" => array ($_lang['receive'].$_lang['de'].$transrights_type[$op]['1'],"",2)
	);
	$ord_arr = array (" report_id desc " => $action_arr[$op] . $_lang['num_desc'], " report_id asc " => $action_arr[$op] . $_lang['num_asc'], " on_time desc " => $_lang['submit_time_desc'], " on_time asc " => $_lang['submit_time_asc'] );
	$page_obj = $kekezu->_page_obj; 
	$role == 1 and $where .= " and uid='$uid' " or $where .= " and to_uid='$uid' ";
	$status and $where .= " and report_status='$status'";
	$obj and $where .= " and obj='$obj'";
	$op and $where .= " and report_type = '".$transrights_type[$op]['0']."'";
	$ord and $where .= " order by $ord " or $where .= " order by on_time desc ";
	$report_obj->setWhere ( $where );
	$count = intval ( $report_obj->count_keke_witkey_report () ); 
	$pages = $page_obj->getPages ( $count, $page_size, $page, $url, "#userCenter" );
	$report_obj->setWhere ( $where . $pages ['where'] );
	$report_list = $report_obj->query_keke_witkey_report ();
}
require keke_tpl_class::template ( "user/" . $do . "_" . $view);