<?php
 /**
 * @copyright keke-tech
 * @author Monkey
 * @version v 1.0
 * 2010-9-8����04:28:19
 */

defined('IN_KEKE') or 	exit('Access Denied');

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
function get_pay_url($charge_type,$pay_amount,$payment_config,$subject,$order_id,$model_id=null,$obj_id=null, $service ="create_direct_pay_by_user", $sign_type = 'MD5'){
	global $_K,$uid,$username;
	$partner = $payment_config['seller_id'];;
	$security_code = $payment_config['safekey'];
	//$seller_email = $payment_config['account'];
	$return_url = $_K ['siteurl'] . '/payment/chinabank/return.php';
	$notify_url = $_K ['siteurl'] . '/payment/chinabank/notify.php';
	$show_url = $_K ['siteurl'] . "/index.php?do=user&view=finance";
	$out_trade_no = "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}-".date('His',time());
	$total_money =$pay_amount ;
	$charge_type=='order_charge' and $t = "������ֵ" or $t="����ֵ";
	$body = $t."(from:".$username.")";
	$text = $pay_amount."CNY".$out_trade_no.$partner.$return_url.$security_code;        //md5����ƴ�մ�,ע��˳���ܱ�
	$v_md5info = strtoupper(md5($text));                             //md5�������ܲ�ת���ɴ�д��ĸ
    $p = array("v_mid"=>$partner,
    			"v_oid"=>$out_trade_no,
    			"v_amount"=>$pay_amount,
    			"v_moneytype"=>"CNY",
    			"v_url"=>$return_url,
    		 	"v_md5info"=>$v_md5info);
	return  build_postform($p);
}
function build_postform($p) {
	// echo 1;
	
	$sHtml = "<form id='E_FORM' name='E_FORM' target='_blank' action='https://Pay3.chinabank.com.cn/PayGate' method='post'>";

	while (list ($key, $val) = each ($p)) {
		$sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
	}

	$sHtml = $sHtml."<button type='button' name='v_action' value='����ȷ�ϸ���' onClick='document.forms[\"E_FORM\"].submit();'>����ȷ�ϸ���</button>";
	return $sHtml;
}


