<?php
/*
	*���ܣ�֧��������֪ͨ���õ�ҳ�棨֪ͨҳ��
	*�汾��3.0
	*���ڣ�2010-05-21
	'˵����
	'���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
	'�ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���

*/
///////////ҳ�湦��˵��///////////////
//������ҳ���ļ�ʱ�������ĸ�ҳ���ļ������κ�HTML���뼰�ո�
//��ҳ�治���ڱ������Բ��ԣ��뵽�������������ԡ���ȷ���ⲿ���Է��ʸ�ҳ�档
//��ҳ����Թ�����ʹ��д�ı�����log_result���ú����ѱ�Ĭ�Ͽ�������alipay_notify.php�еĺ���notify_verify
//TRADE_FINISHED(��ʾ�����Ѿ��ɹ�������ͨ�ü�ʱ���ʷ����Ľ���״̬�ɹ���־);
//TRADE_SUCCESS(��ʾ�����Ѿ��ɹ��������߼���ʱ���ʷ����Ľ���״̬�ɹ���־);
//��֪ͨҳ����Ҫ�����ǣ����ڷ���ҳ�棨return_url.php���������������û���յ���ҳ�淵�ص� success ��Ϣ��֧��������24Сʱ�ڰ�һ����ʱ������ط�֪ͨ
/////////////////////////////////////


define ( "IN_KEKE", true );
require_once (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
require_once ("alipay_notify.php");

$_input_charset = strtoupper ( CHARSET );
$payment_config = kekezu::get_payment_config ( 'alipayjs' );
$payment_config or die ( "֧�����ô���֧���޷���ɣ�����ϵ����Ա��" );

$seller_id = $payment_config ['seller_id'];
$security_code = $payment_config ['safekey'];
$seller_email = $payment_config ['account']; //ǩԼ֧�����˺Ż�����֧�����ʻ�
$sign_type = "MD5";
$transport = "http";

//����֪ͨ������Ϣ
$alipay = new alipay_notify ( $seller_id, $security_code, $sign_type, $_input_charset, $transport );
//����ó�֪ͨ��֤���
$verify_result = $alipay->notify_verify ();
$out_trade_no = $_POST ['out_trade_no']; //��ȡ������
$total_fee = $_POST ['total_fee']; //��ȡ�ܼ۸� 

$notify_type = $_POST ['notify_type']; //��Ϣ��ʾ���� trade_status_sync��ʱ��batch_trans_notify ����
chmod('log.txt',777);
KEKE_DEBUG and $fp = file_put_contents ( 'log.txt', var_export ( $_POST, 1 ), FILE_APPEND );

if ($verify_result) {
	echo "success";
	if ($notify_type == 'trade_status_sync') {
		if ($_POST ['trade_status'] == 'TRADE_FINISHED' || $_POST ['trade_status'] == 'TRADE_SUCCESS') { //���׳ɹ����� 
			list ( $_, $charge_type, $uid, $obj_id, $order_id, $model_id ) = explode ( '-', $out_trade_no, 6 );
			$fac_obj = new pay_return_fac_class ( $charge_type, $model_id, $uid, $obj_id, $order_id, $total_fee, 'alipayjs' );
			$fac_obj->load ();
		}
	}
} else {
	echo "error";
}