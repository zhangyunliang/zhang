<?php

define ( "IN_KEKE", true );
require_once (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
require_once ('alipay_notify.php');

//$pay_arr = kekezu::get_config('paypal');
//@extract($pay_arr);


$_input_charset = strtoupper(CHARSET);
$payment_config = kekezu::get_payment_config ( 'alipayjs' );
$payment_config or die ( "֧�����ô���֧���޷���ɣ�����ϵ����Ա��" );

$seller_id = $payment_config ['seller_id'];
$security_code = $payment_config ['safekey'];
$sign_type = 'MD5';
$transport = 'http';

//����֪ͨ������Ϣ
$alipay = new alipay_notify ( $seller_id, $security_code, $sign_type, $_input_charset, $transport );
//����ó�֪ͨ��֤���
$verify_result = $alipay->return_verify ();

$out_trade_no = $_GET ['out_trade_no']; //��ȡ������
$total_fee = $_GET ['total_fee']; //��ȡ�ܼ۸�  
list ( $_, $charge_type, $uid, $obj_id, $order_id, $model_id ) = explode ( '-', $out_trade_no, 6 );

$fac_obj = new pay_return_fac_class ( $charge_type, $model_id, $uid, $obj_id, $order_id, $total_fee,'alipayjs');
if ($verify_result) {
	if ($_GET ['trade_status'] == 'TRADE_FINISHED' || $_GET ['trade_status'] == 'TRADE_SUCCESS') {
		$response = $fac_obj->load ( );
		$fac_obj->return_notify ('alipayjs',$response);
	} else {
		$fac_obj->return_notify ( 'alipayjs');
	}
} else {
	$fac_obj->return_notify ( 'alipayjs');
}
