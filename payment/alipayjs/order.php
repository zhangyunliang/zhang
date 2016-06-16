<?php
/**
 * ֧������URL����
 */

defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

//require_once (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
require 'alipay_function.php';
require 'alipay_service.php';

/**
 * ������������URL
 * @param array $payment_config �̼Һ�������Ϣ���� (����)
 * @param string $detail_data �����ϸ����
 * @param string $service  ��������(�ɿգ�
 * @param string $sign_type ǩ������(�ɿգ�
 * @param $method ������Ӧ��ʽ form�����ر���url����������
 * @return string url 
 * 
 */
function get_batch_url($payment_config, $detail_data, $method = 'form', $service = "batch_trans_notify", $sign_type = 'MD5') {
	global $_K;
	$body = $subject = "�����������";
	$pay_date = date ( Ymd );
	$batch_no = $pay_date . date ( hms );
	$detail_data = array_filter ( $detail_data );
	$batch_obj  = pay_batch_fac_class::get_instance('alipayjs');
	$detail_data = $batch_obj->stack_batch($detail_data);
	$parameter = array (
			 "service" => $service,
			 "partner" => $payment_config ['seller_id'],
			 "email" => $payment_config ['account'],
			 "account_name" => $payment_config ['account_name'],
			 "notify_url" => $_K ['siteurl'] ."/payment/alipayjs/batch_notify.php",
			 "_input_charset" => strtoupper(CHARSET),
			 "pay_date" => $pay_date,
			 "batch_no" => $batch_no,
			 "batch_num" => $detail_data['batch_num'],
			 "batch_fee"=>$detail_data['batch_fee'],
			 "detail_data"=>$detail_data['detail_data']
	);
	$alipay = new alipay_service ( $parameter, $payment_config ['safekey'], $sign_type,'batch');
	if ($method == 'form') {
		return $alipay->build_postform ('get');
	} else {
		return $alipay->create_url ();
	}
}

/**
 * �û���ֵ���ɸ���url 
 * @param string $charge_type  ��ֵ���ͣ�order_charge������ֵ��user_charge����ֵ��
 * @param float $pay_amount ��� (����)
 * @param array $payment_config �̼Һ�������Ϣ���� (����)
 * @param string $subject �������� (����)
 * @param int $order_id ����ID������)
 * @param int $model_id ģ��ID����ֵ��ʾ����ֵ���޸����)
 * @param int $obj_id   ����ID�� �ɿ�)
 * @param string $service  ��������(�ɿգ�
 * @param string $sign_type ǩ������(�ɿգ�
 * @param $method ������Ӧ��ʽ form�����ر���url����������
 * @return string url 
 */
function get_pay_url($charge_type, $pay_amount, $payment_config, $subject, $order_id, $model_id = null, $obj_id = null, $service = "create_direct_pay_by_user", $sign_type = 'MD5', $method = 'form') {
	global $_K, $uid, $username;
	$charge_type == 'order_charge' and $t = "������ֵ" or $t = "����ֵ";
	$body = $t . "(from:" . $username . ")";
	$parameter = array ("service" => $service, "partner" => $payment_config ['seller_id'], "return_url" => $_K ['siteurl'] . '/payment/alipayjs/return.php', "notify_url" => $_K ['siteurl'] . '/payment/alipayjs/notify.php', "_input_charset" => CHARSET, "subject" => $subject, "body" => $body, "out_trade_no" => "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}", "total_fee" => $pay_amount, "payment_type" => "1", "show_url" => $_K ['siteurl'] . "/index.php?do=user&view=finance", "seller_email" => $payment_config ['account'],"extend_param"=>"isv^kk11");
	$alipay = new alipay_service ( $parameter, $payment_config ['safekey'], $sign_type );
	if ($method == 'form') {
		return $alipay->build_postform ();
	} else {
		return $alipay->create_url ();
	}
}