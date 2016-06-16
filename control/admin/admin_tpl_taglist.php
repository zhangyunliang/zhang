<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (29);
$tag_list = kekezu::get_tag ();
$tag_obj = new Keke_witkey_tag_class ();
$template_arr = db_factory::query ( " select tpl_title from " . TABLEPRE . "witkey_template" );
$tag_type_arr = keke_glob_class::get_tag_type ();
$slt_page_size and $slt_page_size=intval ( $slt_page_size ) or $slt_page_size = 10;
$page and $page=intval ( $page ) or $page = 1; 
$url = "index.php?do=$do&view=$view&slt_page_size=$slt_page_size&page=$page&ord=$ord&tag_type=$tag_type&tpl_type=$tpl_type&txt_title=$txt_title";
if ($op == 'del') {
	$delid = $delid ? $delid : kekezu::admin_show_msg ($_lang['wrong_parameters'], $url,3,'','warning' );	
	$tag_obj->setWhere ( "tag_id='{$delid}'" );
	$tag_obj->del_keke_witkey_tag ();
	$kekezu->_cache_obj->del ( 'tag_list_cache' );
	kekezu::admin_system_log ( $_lang['delete_tag']."$delid" );
	kekezu::admin_show_msg ($_lang['operate_success'], $url,3,'','success' );
} elseif (isset ( $sbt_action )) { 
	if (is_array ( $ckb )) {
		$ids = implode ( ',', array_filter ( $ckb ) );
	}
	if (count ( $ids )) {
		$tag_obj->setWhere ( ' tag_id in (' . $ids . ') ' );
		$tag_obj->del_keke_witkey_tag ();
		$kekezu->_cache_obj->del ( 'tag_list_cache' );
		kekezu::admin_system_log ($_lang['delete_tag']. "$ids" );
		kekezu::admin_show_msg ($_lang['mulit_operate_success'], $url,3,'','success' );
	} else {
		kekezu::admin_show_msg ( $_lang['choose_operate_item'], $url,3,'','warning' );
	}
} else {
	$where = " tag_type<8  ";
	$tag_type or $tag_type = 1;
	strval ( $tpl_type ) or $tpl_type = $_K ['template'];
	strval ( $txt_title ) and $where .= " and tagname like '%$txt_title%' ";
	$where .= " and tag_type=$tag_type ";
	$tpl_type==1 or $where .= ' and tpl_type like ' . '"%' . $tpl_type . '%" ';
	$ord ['1'] and $where .= " order by". $ord['0']. $ord['1'];	
	$t_obj = keke_table_class::get_instance ( "witkey_tag" );
	$d = $t_obj->get_grid ( $where, $url, $page, $slt_page_size );
	$tag_arr = $d ['data'];	
	$pages = $d ['pages'];
}
require $template_obj->template ( 'control/admin/tpl/admin_tpl_' . $view );