<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role(136);
include S_ROOT.'/keke_client/keke/config.php';
if (isset($sbt_action) || ($ac=='del' && $del_id)){
	if (!$ckb && !$del_id){
		kekezu::admin_show_msg('��ʾ','?do=keke&view=gettask',2,'����ɾ��ʧ��,����ȱʧ','warning');
	}
	$ckb && array_filter( $ckb, 'str2int');
	$ids = isset($del_id) ? intval($del_id) : implode(',', $ckb);
	$sql = sprintf("delete from %switkey_task where task_union=2 and task_id in (%s)",TABLEPRE,$ids);
	$result = db_factory::execute($sql);
	kekezu::admin_system_log('����ɾ������task'.$ids);
	if ($result){
		kekezu::admin_show_msg('��ʾ','?do=keke&view=getlist',2,'����ɾ���ɹ�!!','success');
	} else {
		kekezu::admin_show_msg('��ʾ','?do=keke&view=getlist',2,'����ɾ��ʧ��!','warning');
	}
	die();
}
$cove_arr = kekezu::get_cash_cove();
$pagesize = isset($page_size) ? intval($page_size) : '10' ;
$page = max(intval($page),1);
$url = 'index.php?do=keke&view=getlist&page='.$page;
$where = '1=1 and task_union=2 order by `task_id` desc';
$table_obj = new keke_table_class( 'witkey_task');
$ad_arr = $table_obj -> get_grid($where, $url, $page, $pagesize, null, 1, 'ajax_dom'); 
$pages = $ad_arr['pages'];
$task_arr = $ad_arr['data'];
require $template_obj->template ( "control/admin/tpl/admin_{$do}_{$view}" );
function str2int($value){
	return intval($value);
}
