<?php
 /**
 * @copyright keke-tech
 * @author Monkey
 * @version v 2.0
 * 2010-9-8����04:28:19
 */

defined('IN_KEKE') or exit('Access Denied');

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
function get_pay_url($charge_type,$pay_amount,$payment_config,$subject,$order_id,$model_id=null,$obj_id=null, $service ="_xclick", $sign_type = 'MD5'){
	global $_K,$uid;
	//CHARSET=='gbk' and $subject=kekezu::gbktoutf($subject);
	$subject = 'paypal online pay(UID='.$uid.')';
	$seller_account = $payment_config['account'];
	$return_url = $_K ['siteurl'] . '/payment/paypal/return.php';
	$notify_url = $_K ['siteurl'] . '/payment/paypal/notify.php';
	$show_url = $_K ['siteurl'] . "/index.php?do=user&view=finance&op=order";
	$out_trade_no = "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}";
	$total_money =$pay_amount ;
    $p = array("business"=>$seller_account,
    			"cmd"=>$service,
    			"custom"=>$out_trade_no,
    			"amount"=>$pay_amount,
    			"v_moneytype"=>"CNY",
    			"notify_url"=>$notify_url,
    			"return"=>$return_url,
    			"cancel_return"=>$show_url,
    		 	"currency_code"=>"HKD",
    		 	"item_name"=>$subject,);
	return  build_postform($p);
}
function build_postform($p) {
	//���Ե�ַ��https://sandbox.paypal.com/cgi-bin/webscr
	//��ʽ��ַ:https://www.paypal.com/cgi-bin/webscr 
	$sHtml = "<form id='frm_paypal' name='frm_paypal' target='_blank' action='https://www.paypal.com/cgi-bin/webscr' enctype=\"application/x-www-form-urlencoded\" method='post'>";
	while (list ($key, $val) = each ($p)) {
		$sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
	}
	$sHtml = $sHtml."<button type='button' name='v_action' value='Paypalȷ�ϸ���' onClick='document.forms[\"frm_paypal\"].submit();'>Paypalȷ�ϸ���</button>";
	return $sHtml;
}



