<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$service_obj = new service_shop_class();
$service_info = db_factory::get_one(sprintf("select * from %switkey_service where service_id='%d'",TABLEPRE,$service_id));
$ac_url="index.php?do=model&model_id=7&view=edit&service_id=".$service_id;
$status_arr = $service_obj->get_service_status();
if($sbt_edit){
	kekezu::admin_system_log($_lang['to_witkey_service_name_is'].$service_info[title].$_lang['in_edit_operate']);
	$service_obj = keke_table_class::get_instance('witkey_service');	
    $c = $service['content'];
    $fds=kekezu::escape($service);
    $service['content'] = $c;
    isset($service['is_top']) or $service['is_top'] = 0;
	$res = $service_obj->save($service,array("service_id"=>$service_id));
	kekezu::admin_show_msg($_lang['service_edit_success'],'index.php?do=model&model_id=7&view=list',2,$_lang['service_edit_success'],'success');
}
require keke_tpl_class::template ( 'shop/'.$model_info['model_dir'].'/control/admin/tpl/service_' . $view );