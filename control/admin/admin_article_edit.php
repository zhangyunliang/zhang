<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$art_obj = keke_table_class::get_instance ( "witkey_article" );
$types = array ('help', 'art', 'single' );
(! empty ( $type ) && in_array ( $type, $types )) or $type = 'art';
switch ($type) {
	case 'art' :
		kekezu::admin_check_role ( 15);
		$art_cat_arr = kekezu::get_table_data ( '*', "witkey_article_category", "art_index like '%{1}%'", " art_cat_id desc", '', '', 'art_cat_id', null );
		break;
		;
	case 'help' :
		kekezu::admin_check_role (43);
		$art_cat_arr = kekezu::get_table_data ( '*', "witkey_article_category", "art_index like '%{100}%'", "art_cat_id desc", '', '', 'art_cat_id', null );
		break;
		;
	case 'single' :
		kekezu::admin_check_role (54);
		$art_cat_arr = kekezu::get_table_data ( '*', "witkey_article_category", "art_index like '%{200}%'", " art_cat_id desc", '', '', 'art_cat_id', null );
		break;
		;
}
(isset ( $art_id ) and intval ( $art_id ) > 0) and $art_info = $art_obj->get_table_info ( 'art_id', $art_id );
empty ( $art_info ) or extract ( $art_info );
if ($sbt_edit) { 
	$fields ['pub_time'] = time ();
	isset($fields['is_recommend']) or $fields['is_recommend']=0;
	$url = "index.php?do=$do&view=list&type=$type";
	$fields=kekezu::escape($fields);
	$res = $art_obj->save ( $fields, $pk );
	$log_ac = array('edit'=>$_lang['edit_art'],'add'=>$_lang['add_art']);
	if($pk['art_id']){
		kekezu::admin_system_log($log_ac['edit'].":".$fields['art_title']) ;
	}else{
		kekezu::admin_system_log($log_ac['add'].":".$fields['art_title']) ;
	} 
	if($res){
		kekezu::admin_show_msg($_lang['operate_success'],$url,3,'','success');
	}else{
		kekezu::admin_show_msg($_lang['operate_fail'],$url,3,'','warning');
	}
}
$cat_arr = array ();
kekezu::get_tree ( $art_cat_arr, $cat_arr, 'option', $art_id, 'art_cat_id', 'art_cat_pid', 'cat_name' );
require $template_obj->template ( 'control/admin/tpl/admin_' . $do . "_" . $view );
function get_fid($path){
	if(!path){
		return false;
	}
	$querystring = substr(strstr($path, '?'), 1);
	parse_str($querystring, $query);
	return $query['fid'];
}