<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$pk['service_id'] and $service_id=$pk['service_id'];
$service_id or kekezu::admin_show_msg($_lang['please_choose_should_edit_goods'],'index.php?do=model&model_id=6&view=list',3,'','warning');
$indus_p_arr = $kekezu->_indus_p_arr;
$goods_status_arr = goods_shop_class::get_goods_status();
if($ajax=='show_indus'){	
	$indus_ids = kekezu::get_table_data ( '*', "witkey_industry", " indus_pid = $indus_pid", 'listorder desc', '', '', 'indus_id', null );
	$option .= '<option value=""> {lang:please_choose_son_industry} </option>';
	foreach ( $indus_ids as $v ) {
		$option .= '<option value=' . $v['indus_id'] . '>' . $v['indus_name'] . '</option>';
	}
	CHARSET == 'gbk' and $option = kekezu::gbktoutf ( $option );
	echo $option;
	die();	
}
$service_info = db_factory::get_one(sprintf("select * from %switkey_service where service_id='%d'",TABLEPRE,$service_id));
$service_info and extract($service_info) or $service_info=array();
$indus_pid and $indus_arr = kekezu::get_industry($indus_pid,0) or $indus_arr=array();
if($sbt_edit){
	kekezu::admin_system_log($_lang['to_witkey_goods_name_is'].$service_info['title'].$_lang['to_edit_operate']);
	$service_obj = keke_table_class::get_instance('witkey_service');	
	$c = $fds['content'];
	$fds=kekezu::escape($fds);
	$fds['content'] = $c;
	isset($fds['is_top']) or $fds['is_top'] = 0;
	$res = $service_obj->save($fds,$pk);
	kekezu::admin_show_msg($_lang['goods_edit_success'],'index.php?do=model&model_id=6&view=list',2,$_lang['goods_edit_success'],'success');
}
if($file_path){
	$start = strripos($file_path,"/");
	$file_name = substr($file_path, $start+1);
}
require keke_tpl_class::template ( 'shop/' . $model_info ['model_dir'] . '/control/admin/tpl/goods_' . $view );