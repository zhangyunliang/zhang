<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
keke_lang_class::package_init("shop");
keke_lang_class::loadlang("info");
$nav_active_index = "shop"; 
$sid=intval($_GET['sid']); 
if ($sid) { 
	$service_info = keke_shop_class::get_service_info ( $sid );
	$mc = keke_shop_class::get_mark_count_ext($model_code,$sid);
	$mc['all'] = intval($mc[1]['c']+$mc[2]['c']);
	$mc['buyer'] = intval($mc[2]['c']);
	$mc['seller'] = intval($mc[1]['c']);
	if ($service_info ['point']) {
		$point = explode (',', $service_info['point'] );
		$px = $point ['0'];
		$py = $point ['1'];
	} 
	if ($uid != $service_info ['uid']&&$service_info ['service_status']!=2) {
		$uid == ADMIN_UID or kekezu::show_msg ( $_lang['operate_notice'], "index.php?do=shop", '1', $_lang['goods_not_exist'], 'error' );
	}
	$indus_p_arr = kekezu::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 ", "listorder asc ", '', '', 'indus_id', NULL );
	$indus_arr   = kekezu::get_table_data ( '*', 'witkey_industry', '', 'listorder', '', '', 'indus_id', NULL );
	$model_id    = $service_info ['model_id'];
	$model_info  = $model_list [$model_id];
	$model_code  = $model_info['model_code'];
	$owner_info  = kekezu::get_user_info($service_info['uid']);
	$user_level  = unserialize($owner_info['seller_level']);
	$auth_info  = keke_auth_fac_class::get_submit_auth_record($owner_info['uid'],1);
	$more_list = keke_shop_class::get_more_service($service_info['uid'], $sid);
	$related_list = keke_shop_class::get_related_service($model_id, $sid, $service_info['indus_id']);
	$hot_list = keke_shop_class::get_hot_service($model_id, $sid, $service_info['indus_pid']);
	$task_list = keke_shop_class::get_task_info($service_info['indus_id']);
	keke_lang_class::package_init("shop");
	keke_lang_class::loadlang($model_info ['model_dir']);
	keke_lang_class::loadlang("service_info");
} else {
	kekezu::show_msg ( $_lang['operate_notice'], "index.php?do=index", '1', $_lang['param_error'], 'error' );
}
$model_info and ( require S_ROOT . "/shop/" . $model_info ['model_dir'] . "/control/service_info.php") or kekezu::show_msg ( $_lang['error'], "index.php?do=index", 3, $_lang['goods_not_exist'], 'error' );
