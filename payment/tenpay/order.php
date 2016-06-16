<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
require 'PayRequestHandler.php';

/**
 * ���ɸ���url
 * @param string $charge_type  ��ֵ���ͣ�order_charge������ֵ��user_charge����ֵ��
 * @param float $pay_amount ��� (����)
 * @param array $payment_config �̼Һ�������Ϣ���� (����)
 * @param string $subject �������� (����)
 * @param int $order_id ����ID������)
 * @param int $model_id ģ��ID����ֵ��ʾ����ֵ���޸����)
 * @param int $obj_id   ����ID�� �ɿ�)
 * @param string $service  ��������(�ɿգ�
 * @param string $sign_type ǩ������(�ɿգ�
 * @return string url
 */
function get_pay_url($charge_type,$pay_amount, $payment_config, $subject, $order_id, $model_id = null, $obj_id = null, $service = "create_direct_pay_by_user", $sign_type = 'MD5') {
	global $_K, $uid;
	$tenpayid = $payment_config[seller_id];
	$tenpaykey = $payment_config[safekey];
 	$tenpay_return_url = $_K ['siteurl'] . '/payment/tenpay/return.php';  //�ص���ַ
	$order_no = $order_id;
	$product_name = $subject;
	$order_price = $pay_amount;
	$out_trade_no = "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}";
	$remarkexplain = $out_trade_no;
	/* �̻��� */
	$bargainor_id = $tenpayid;
	
	/* ��Կ */
	$key = $tenpaykey;
	
	/* ���ش����ַ */
	$return_url = $tenpay_return_url;
	
	//date_default_timezone_set(PRC);
	$strDate = date("Ymd");
	$strTime = date("His");
	
	//4λ�����
	$randNum = rand(1000, 9999);
	
	//10λ���к�,�������е�����
	$strReq = $strTime . $randNum;
	
	/* �̼Ҷ�����,����������32λ��ȡǰ32λ���Ƹ�ֻͨ��¼�̼Ҷ����ţ�����֤Ψһ�� */
	$sp_billno = $order_no;
	
	/* �Ƹ�ͨ���׵��ţ�����Ϊ��10λ�̻���+8λʱ�䣨YYYYmmdd)+10λ��ˮ�� */
	$transaction_id = $bargainor_id . $strDate . $strReq;
	
	/* ��Ʒ�۸񣨰����˷ѣ����Է�Ϊ��λ */
	$total_fee = $order_price*100;
	
	/* ��Ʒ���� */
	$desc = $product_name;
	
	/* ����֧��������� */
	$reqHandler = new PayRequestHandler();
	$reqHandler->init();
	$reqHandler->setKey($key);
	
	//----------------------------------------
	//����֧������
	//----------------------------------------
	$reqHandler->setParameter("bargainor_id", $bargainor_id);			//�̻���
	$reqHandler->setParameter("sp_billno", $sp_billno);					//�̻�������
	$reqHandler->setParameter("transaction_id", $transaction_id);		//�Ƹ�ͨ���׵���
	$reqHandler->setParameter("total_fee", $total_fee);					//��Ʒ�ܽ��,�Է�Ϊ��λ
	$reqHandler->setParameter("return_url", $return_url);				//���ش����ַ
	$reqHandler->setParameter("desc", $desc);	//��Ʒ����  remarkexplain
	$reqHandler->setParameter("attach", $remarkexplain);
	
	//�û�ip,���Ի���ʱ��Ҫ�����ip��������ʽ�����ټӴ˲���
	$reqHandler->setParameter("spbill_create_ip", kekezu::get_ip());
	
	//�����URL
	$reqUrl = $reqHandler->getRequestURL();
	
	return build_postform ( $reqUrl );
}
function build_postform($p) {
	$sHtml = "<form id='E_FORM' name='E_FORM' target='_blank' action='$p' method='post'>";
	$sHtml = $sHtml."<button type='button' name='v_action' value='�Ƹ�ͨȷ�ϸ���' onClick='document.forms[\"E_FORM\"].submit();'>�Ƹ�ͨȷ�ϸ���</button>";
	return $sHtml;
}