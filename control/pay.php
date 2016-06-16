<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
kekezu::check_login ();
$page_title=$_lang['order_pay'].'- '.$_K['html_title'];
$payment_list = kekezu::get_payment_config ();
$obj_type&&$obj_id and $order_id = keke_order_class::get_order_id($obj_type,$obj_id);
$order_id = intval ( $order_id );
$order_id and $order_info = keke_order_class::get_order_info ( $order_id );
$order_amount = number_format ( $order_info ['order_amount'], 2 );
function get_href($order_info) {
	switch ($order_info ['obj_type']) {
		case 'task' :
			$a = "index.php?do=task&task_id={$order_info['obj_id']}";
			break;
		case 'service' :
			$a = "index.php?do=service&sid={$order_info['obj_id']}";
			break;
	}
	return $a;
}
$href = get_href ( $order_info );
$kekezu->_sys_config ['credit_is_allow'] == 1 and $user_balance = $user_info ['credit'] + $user_info ['balance'] or $user_balance = $user_info ['balance'];
$pay_amount = (float)$order_info ['order_amount'] - (float)$user_balance;
$pay_amount < 0 and kekezu::show_msg ( $_lang['operate_notice'], "index.php?do=user&view=finance&op=order", 2, $_lang['this_order_need_pay'] );
if (isset($pay_mode)) {
	$payment_config = kekezu::get_payment_config($pay_mode);
	require S_ROOT . "/payment/" . $pay_mode . "/order.php";
	$from = get_pay_url('order_charge',$pay_amount, $payment_config, $order_info['order_name'], $order_id,$model_id,$order_info['obj_id']);
	$title=$_lang['confirm_pay'];
	require keke_tpl_class::template ( "pay_cash");die();
}
require $kekezu->_tpl_obj->template ( $do );