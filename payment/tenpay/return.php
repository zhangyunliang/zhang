<?php
define ( "IN_KEKE", true );
require_once (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_comm.php');

require_once ("PayResponseHandler.php");
$pay_arr = kekezu::get_payment_config ( "tenpay" );
@extract ( $pay_arr );
$key = $safekey;

$resHandler = new PayResponseHandler ();
$resHandler->setKey ( $key );
chmod('log.txt',777);
KEKE_DEBUG and $fp = file_put_contents ( 'log.txt', var_export ( $_GET, 1 ), FILE_APPEND ); //��Ϣ¼��

$v_void = $resHandler->getParameter ( "sp_billno" );//tentpay�ڲ�������
$v_attach = $resHandler->getParameter ( "attach" );//�̼����ݰ�
$v_amount = $resHandler->getParameter ( "total_fee" );
$v_amount = $v_amount * 0.01;

$pay_result = $resHandler->getParameter ( "pay_result" );

list ( $_, $charge_type, $uid, $obj_id, $order_id, $model_id ) = explode ( '-', $v_attach, 6 );
$fac_obj = new pay_return_fac_class ( $charge_type, $model_id, $uid, $obj_id, $order_id, $v_amount, 'tenpay' );
if ($resHandler->isTenpaySign ()) {
	if ("0" == $pay_result && $_ == 'charge') {
		/* charge */
		$response = $fac_obj->load ( );
		$fac_obj->return_notify ( 'tenpay',$response);
	} else {
		$fac_obj->return_notify ( 'tenpay');
	}
} else {
	$fac_obj->return_notify ( 'tenpay');
}
