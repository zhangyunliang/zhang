<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$config_rate = unserialize($model_list[$model_id]['config']);
if($view=='witkey'){
	$role_id = intval(seller_uid);
	$u = intval(order_uid);
	$role_id='seller_uid';$u="order_uid";$n="order_username";$s=$_lang['sell_out'];$t=$_lang['buyer'];$w= " seller_uid='$uid' and order_status='confirm'";
} else{
	$role_id = intval(order_uid);
	$u = intval(seller_uid);
	$role_id='order_uid';$u="seller_uid";$n="seller_username";$s=$_lang['buy_in'];$t=$_lang['seller'];$w= " order_uid='$uid' and order_status='confirm'";
}
$order_count = kekezu::get_table_data("model_id,count(order_id) count","witkey_order",$w." and model_id IN(6,7)","","model_id=6,model_id=7","","model_id",3600);
$third_nav = array ();
foreach ( $model_list as $v ) {
	$third_nav [] = array ("1" => $v ['model_id'], "2" => $s. $v ['model_name'], "3" => $order_count [$v['model_id']] ['count'] );
}
if ($model_id) {
	$model_id = intval($model_id);
	$ord_arr = array (" order_id desc " => $_lang['order_id_desc'], " order_id asc " => $_lang['order_id_asc'], " order_time desc " => $_lang['buy_time_desc'], " order_time asc " => $_lang['buy_time_asc'] );
	$page_obj = $kekezu->_page_obj; 
	$order_obj = new Keke_witkey_order_class();
	$model_code = $kekezu->_model_list[$model_id]['model_code'];
	$status_arr = call_user_func(array($model_code."_shop_class","get_order_status")); 
	$where = " model_id = '$model_id' and $role_id= '$uid' and order_status='confirm'";
	intval ( $page_size ) or $page_size = '10';
	intval ( $page ) or $page = '1';
	$url = $origin_url . "&op=$op&model_id=$model_id&page_size=$page_size&status=$status&page=$page";
	($order_status === '0') and $where .= " and order_status='$order_status'" or ($order_status and $where .= " and order_status = '$order_status' ");
	$order_id && $order_id != $_lang['input_order_num'] and $where .= " and order_id = '$order_id' ";
	$ord and $where .= " order by $ord " or $where .= " order by order_id desc ";
	$order_obj->setWhere ( $where );
	$count = intval ( $order_obj->count_keke_witkey_order());
	$pages = $page_obj->getPages ( $count, $page_size, $page, $url, '#userCenter' );
	$order_obj->setWhere ( $where . $pages ['where'] );
	$order_info = $order_obj->query_keke_witkey_order();
}
require keke_tpl_class::template ( "user/" . $do . "_" . $op );