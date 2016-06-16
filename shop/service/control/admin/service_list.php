<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$table_obj = keke_table_class::get_instance('witkey_service');
$service_obj = new service_shop_class();
$service_obj = new service_shop_class();
$status_arr = $service_obj->get_service_status();
$wh = "1=1";
$w[service_id] and $wh .= " and service_id= ".$w[service_id];
$w[title] and $wh.=" and title like '%$w[title]%'";
$w[username] and $wh.=" and username like '%$w[username]%' ";
$w['indus_id'] and $wh .= " and indus_id =" . $w['indus_id'];
$w['service_status'] and $wh .= " and service_status=" . $w['service_status'];
$wh.=" and model_id = 7";
intval ( $page ) or $page = 1;
intval ( $w[page_size] ) and $page_size = intval ( $w[page_size] ) or $page_size = '10';
$w[order_status] and $wh.=" and order_status like '%$w[order_status]%' ";
$w['ord'] and $wh.=" order by ".$w['ord'] or $wh.=" order by service_id desc ";
$url_str = "index.php?do=model&model_id=7&view=list&service_id=$w[service_id]&service_status=$w[service_status]&service_type=$w[service_type]&username=$w[username]&page=$page&page_size=$page_size";
$table_arr = $table_obj->get_grid ( $wh, $url_str, $page, $page_size, null, 1, 'ajax_dom');
$service_arr = $table_arr['data'];
$pages = $table_arr['pages'];
if($service_id){
	$service_arr = db_factory::get_one(sprintf("select * from %switkey_service where service_id='%d' ",TABLEPRE,$service_id));
	$log_ac_arr = array("del"=>$_lang['delete'],"use"=>$_lang['use'],"pass"=>$_lang['audit'],"disable"=>$_lang['disable']);
	$log_msg = $_lang['to_witkey_service_name_to'].$service_arr[title].$_lang['in'].$log_ac_arr[$ac].$_lang['operate'];
	kekezu::admin_system_log($log_msg);
	switch ($ac) {
		case 'del':
			$res = $table_obj->del('service_id', $service_id,$url_str);
			$res and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['delete_success'],'success') or kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['delete_fail'],"warning");
		break;
		case 'disable':
			$service_obj->service_disable($service_id) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['service_disable_success'],'success') or kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['service_disable_fail'],"warning");
		break;
		case 'pass':
			$time = time()-$service_arr[on_time]; 
		 	keke_payitem_class::update_service_payitem_time($service_arr[payitem_time], $time, $service_id); 
			$service_obj->service_pass($service_id) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['service_audit_success'],'success') or kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['service_audit_fail'],"warning");
		break;
		case 'use':
			$service_obj->service_use($service_id) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['service_use_success'],'success') or kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['service_use_fail'],"warning");
		break;
	}
}
if($sbt_action){
	$keyids = $ckb;
	if(is_array($keyids)){
		$log_mac_arr = array("more_del"=>$_lang['mulit_delete'],"more_use"=>$_lang['mulit_use'],"more_pass"=>$_lang['mulit_pass'],"disable"=>$_lang['mulit_disable']);
		$log_msg = $_lang['to_witkey_service_has_in'].$log_mac_arr[$sbt_action].$_lang['operate'];
		kekezu::admin_system_log($log_msg);
		switch ($sbt_action) {
				case $_lang['mulit_delete']:
					$service_obj->service_del($keyids) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_delete_success'],'success') or kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_delete_fail'],"warning");
				break;
				case $_lang['mulit_pass']:
					foreach ($keyids as $v) {
						$service_info = kekezu::get_table_data("*","witkey_service","service_id = $v");
						$service_info = $service_info[0];
						$add_time = time()-$service_info[on_time];
						keke_payitem_class::update_service_payitem_time($service_info[payitem_time], $add_time, $v); 
					}
					$service_obj->service_pass($keyids) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_pass_success'],'success') or kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_pass_fail'],"warning");
				break;
				case $_lang['mulit_use']:
					$service_obj->service_pass($keyids) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_use_success'],'success') or kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_use_fail'],"warnibg");
				break;
				case $_lang['mulit_disable']:
					$service_obj->service_disable($keyids) and kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_disable_success'],'success') or kekezu::admin_show_msg($_lang['operate_notice'],$url_str,2,$_lang['mulit_disable_fail'],"warning");
				break;
		}
	}
}
require keke_tpl_class::template ( 'shop/' . $model_info ['model_dir'] . '/control/admin/tpl/service_' . $view );