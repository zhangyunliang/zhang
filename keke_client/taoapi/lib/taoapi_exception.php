<?php
/**
 * �Ա���������
 *
 * @category Taoapi
 * @package Taoapi_Exception
 * @copyright Copyright (c) 2008-2009 PHPDIY (http://www.taoapi.com)
 * @license    http://www.taoapi.com
 * @version    Id: Taoapi  2009-12-22  12:30:51 ����:����Arvin QQ:8769852
 */
class taoapi_exception
{
    private $_ErrorInfo;

    public function __construct ($error, $paramArr = null, $closeerror = false,$Errorlog = false)
    {
        return $this->ViewError($error, $paramArr, $closeerror,$Errorlog);
    }

    public function getErrorInfo()
    {
        return $this->_ErrorInfo;
    }

    private function ErrorInfo ($errorcode)
    {
 		$errorinfo[3]=array('en'=>'Upload Fail','cn'=>'ͼƬ�ϴ�ʧ��');
		$errorinfo[4]=array('en'=>'User Call Limited','cn'=>'�û����ô�������');
		$errorinfo[5]=array('en'=>'Session Call Limited','cn'=>'�Ự���ô�������');
		$errorinfo[6]=array('en'=>'Partner Call Limited','cn'=>'���������ô�������');
		$errorinfo[7]=array('en'=>'App Call Limited','cn'=>'Ӧ�õ��ô�������');
		$errorinfo[8]=array('en'=>'App Call Exceeds Limited Frequency','cn'=>'Ӧ�õ���Ƶ�ʳ���');
		$errorinfo[9]=array('en'=>'Http Action Not Allowed','cn'=>'HTTP��������ֹ�����ô�д��POST��GET��');
		$errorinfo[10]=array('en'=>'Service Currently Unavailable','cn'=>'���񲻿���');
		$errorinfo[11]=array('en'=>'Insufficient ISV Permissions','cn'=>'������Ȩ�޲���');
		$errorinfo[12]=array('en'=>'Insufficient User Permissions','cn'=>'�û�Ȩ�޲���');
		$errorinfo[13]=array('en'=>'Insufficient Partner Permissions','cn'=>'�������Ȩ�޲���');
		$errorinfo[15]=array('en'=>'Remote Service Error','cn'=>'Զ�̷������');
		$errorinfo[21]=array('en'=>'Missing Method','cn'=>'ȱ�ٷ���������');
		$errorinfo[22]=array('en'=>'Invalid Method','cn'=>'�����ڵķ�����');
		$errorinfo[23]=array('en'=>'Invalid Format','cn'=>'�Ƿ����ݸ�ʽ');
		$errorinfo[24]=array('en'=>'Missing Signature','cn'=>'ȱ��ǩ������');
		$errorinfo[25]=array('en'=>'Invalid Signature','cn'=>'�Ƿ�ǩ��');
		$errorinfo[26]=array('en'=>'Missing Session','cn'=>'ȱ��SessionKey����');
		$errorinfo[27]=array('en'=>'Invalid Session','cn'=>'��Ч��SessionKey����');
		$errorinfo[28]=array('en'=>'Missing App Key','cn'=>'ȱ��AppKey����');
		$errorinfo[29]=array('en'=>'Invalid App Key','cn'=>'�Ƿ���AppKe����');
		$errorinfo[30]=array('en'=>'Missing Timestamp','cn'=>'ȱ��ʱ�������');
		$errorinfo[31]=array('en'=>'Invalid Timestamp','cn'=>'�Ƿ���ʱ�������');
		$errorinfo[32]=array('en'=>'Missing Version','cn'=>'ȱ�ٰ汾����');
		$errorinfo[33]=array('en'=>'Invalid Version','cn'=>'�Ƿ��İ汾����');
		$errorinfo[34]=array('en'=>'Unsupported Version','cn'=>'��֧�ֵİ汾��');
		$errorinfo[40]=array('en'=>'Missing Required Arguments','cn'=>'ȱ�ٱ�ѡ����');
		$errorinfo[41]=array('en'=>'Invalid Arguments','cn'=>'�Ƿ��Ĳ���');
		$errorinfo[42]=array('en'=>'Forbidden Request','cn'=>'���󱻽�ֹ');
		$errorinfo[43]=array('en'=>'Parameter Error','cn'=>'��������');

		$errorinfo[501]=array('en'=>'Your Statement is Not Indexable','cn'=>'��䲻������');
		$errorinfo[502]=array('en'=>'Data Service Unavailable','cn'=>'���ݷ��񲻿���');
		$errorinfo[503]=array('en'=>'Error While Parsing TBQL Statement','cn'=>'�޷�����TBQL���');
		$errorinfo[504]=array('en'=>'Need Binding User','cn'=>'��Ҫ���û��ǳ�');
		$errorinfo[505]=array('en'=>'Missing Parameters','cn'=>'ȱ�ٲ���');
		$errorinfo[506]=array('en'=>'Parameters Error','cn'=>'��������');
		$errorinfo[507]=array('en'=>'Parameters Format Error','cn'=>'������ʽ����');
		$errorinfo[508]=array('en'=>'No Permission Get Information','cn'=>'��ȡ��ϢȨ�޲���');
		$errorinfo[550]=array('en'=>'User Service Unavailable','cn'=>'�û����񲻿���');
		$errorinfo[551]=array('en'=>'Item Service Unavailable','cn'=>'��Ʒ���񲻿���');
		$errorinfo[552]=array('en'=>'Item Image Service Unavailable','cn'=>'��ƷͼƬ���񲻿���');
		$errorinfo[553]=array('en'=>'Item Simple Update Service Unavailable','cn'=>'��Ʒ���·��񲻿���');
		$errorinfo[554]=array('en'=>'Item Delete Failure','cn'=>'��Ʒɾ��ʧ��');
		$errorinfo[555]=array('en'=>'No Picture Service for User','cn'=>'�û�û�ж���ͼƬ����');
		$errorinfo[556]=array('en'=>'Picture URL is Error','cn'=>'ͼƬURL����');
		$errorinfo[557]=array('en'=>'Item Media Service Unavailable','cn'=>'��Ʒ��Ƶ���񲻿���');
		$errorinfo[560]=array('en'=>'Trade Service Unavailable','cn'=>'���׷��񲻿���');
		$errorinfo[561]=array('en'=>'Trade TC Service Unavailable','cn'=>'���׷��񲻿���');
		$errorinfo[562]=array('en'=>'Trade not Exists','cn'=>'���ײ�����');
		$errorinfo[563]=array('en'=>'Trade is Invalid','cn'=>'�Ƿ�����');
		$errorinfo[564]=array('en'=>'No Permission Add or Update Trade Memo','cn'=>'û��Ȩ����ӻ���½��ױ�ע');
		$errorinfo[565]=array('en'=>'Trade Memo Too Long','cn'=>'���ױ�ע������������');
		$errorinfo[566]=array('en'=>'Trade Memo Already Exists','cn'=>'���ױ�ע�Ѿ�����');
		$errorinfo[567]=array('en'=>'No Permission Add or Update Trade','cn'=>'û��Ȩ����ӻ���½�����Ϣ');
		$errorinfo[568]=array('en'=>'No Detail Order','cn'=>'����û���Ӷ���');
		$errorinfo[569]=array('en'=>'Close Trade Error','cn'=>'���׹رմ���');
		$errorinfo[570]=array('en'=>'Shipping Service Unavailable','cn'=>'�������񲻿���');
		$errorinfo[571]=array('en'=>'Invalid Post Fee','cn'=>'�Ƿ����ʷ�');
		$errorinfo[572]=array('en'=>'Invalid Division Code','cn'=>'�Ƿ���������˾���');
		$errorinfo[580]=array('en'=>'Rate Service Unavailable','cn'=>'���۷��񲻿���');
		$errorinfo[581]=array('en'=>'Rate Service Add Error','cn'=>'������۷������');
		$errorinfo[582]=array('en'=>'Rate Service List Error','cn'=>'��ȡ���۷������');
		$errorinfo[590]=array('en'=>'Shop Service Unavailable','cn'=>'���̷��񲻿���');
		$errorinfo[591]=array('en'=>'Shop Showcase Remain Count Unavailable','cn'=>'����ʣ������Ƽ����񲻿���');
		$errorinfo[592]=array('en'=>'Shop Seller Category Service Unavailable','cn'=>'�����Զ�����Ŀ���񲻿���');
		$errorinfo[594]=array('en'=>'Shop Seller Category Insert Error','cn'=>'�����Զ�����Ŀ��Ӵ���');
		$errorinfo[595]=array('en'=>'Shop Seller Category Update Error','cn'=>'�����Զ�����Ŀ���´���');
		$errorinfo[596]=array('en'=>'No Shop for This User','cn'=>'�û�û�е���');
		$errorinfo[597]=array('en'=>'Shop Seller Parent Category Error','cn'=>'�����Զ��常��Ŀ����');
		$errorinfo[540]=array('en'=>'Trade Stat Service Unavailable','cn'=>'����ͳ�Ʒ��񲻿���');
		$errorinfo[541]=array('en'=>'Category Stat Service Unavailable','cn'=>'��Ŀͳ�Ʒ��񲻿���');
		$errorinfo[542]=array('en'=>'Item Stat Service Unavailable','cn'=>'��Ʒͳ�Ʒ��񲻿���');
		$errorinfo[601]=array('en'=>'User not Exists','cn'=>'�û�������');
		$errorinfo[610]=array('en'=>'Product Service Unavailable','cn'=>'��Ʒ���񲻿���');
		$errorinfo[710]=array('en'=>'Taobaoke Service Unavailable','cn'=>'�Ա��ͷ��񲻿���');
		$errorinfo[611]=array('en'=>'Product Number Format Exception','cn'=>'��Ʒ���ݸ�ʽ����');
		$errorinfo[612]=array('en'=>'Product ID Incorrect','cn'=>'��ƷID����');
		$errorinfo[613]=array('en'=>'Product Image Delete Error','cn'=>'ɾ����ƷͼƬ����');
		$errorinfo[614]=array('en'=>'No Permission to Add Product','cn'=>'û��Ȩ����Ӳ�Ʒ');
		$errorinfo[615]=array('en'=>'Delivery Address Service Unavailable','cn'=>'�ջ���ַ���񲻿���');
		$errorinfo[620]=array('en'=>'Postage Service Unavailable','cn'=>'�ʷѷ��񲻿���');
		$errorinfo[621]=array('en'=>'Postage Mode Type Error','cn'=>'�ʷ�ģ�����ʹ���');
		$errorinfo[622]=array('en'=>'Missing Parameter: post, express or ems','cn'=>'ȱ�ٲ�����post, express��ems');
		$errorinfo[623]=array('en'=>'Postage Mode Parameter Error','cn'=>'�ʷ�ģ���������');
		$errorinfo[630]=array('en'=>'Combo Service Unavailable','cn'=>'�շѷ��񲻿���');
		$errorinfo[650]=array('en'=>'Refund Service Unavailable','cn'=>'�˿���񲻿���');
		$errorinfo[651]=array('en'=>'Refund ID Invalid','cn'=>'�Ƿ����˿���');
		$errorinfo[652]=array('en'=>'Refund Service Unavailable','cn'=>'�˿���񲻿���');
		$errorinfo[653]=array('en'=>'Refund not Exists','cn'=>'�˿����');
		$errorinfo[654]=array('en'=>'No Permission to Get Refund','cn'=>'û��Ȩ�޻�ȡ�˿���Ϣ');
		$errorinfo[655]=array('en'=>'No Permission to Add Refund Message','cn'=>'û��Ȩ������˿�����');
		$errorinfo[656]=array('en'=>'Cannot add Refund Message for STATUS_CLOSED(4) or STATUS_SUCCESS(5)','cn'=>'�޷�����˿�����');
		$errorinfo[657]=array('en'=>'Refund Message Content Too Long','cn'=>'�˿���������̫��');
		$errorinfo[658]=array('en'=>'Refund Message Content Cannot be NULL','cn'=>'�˿��������ݲ���Ϊ��');
		$errorinfo[659]=array('en'=>'Biz Order ID is Invalid','cn'=>'�Ƿ��Ľ��׶��������Ӷ�����ID');
		$errorinfo[660]=array('en'=>'Item Extra Service Unavailable','cn'=>'��Ʒ��չ���񲻿���');
		$errorinfo[661]=array('en'=>'Item Extra not Exists','cn'=>'��Ʒ��չ��Ϣ������');
		$errorinfo[662]=array('en'=>'No Permission Update Item Extra','cn'=>'û��Ȩ�޸�����Ʒ��չ��Ϣ');
		$errorinfo[663]=array('en'=>'Shipping Parameter Missing','cn'=>'ȱ����������');
		$errorinfo[664]=array('en'=>'Shipping Parameter Error','cn'=>'������������');
		$errorinfo[670]=array('en'=>'Commission Service Unavailable','cn'=>'Ӷ����񲻿���');
		$errorinfo[671]=array('en'=>'Commission Trade not Exists','cn'=>'Ӷ���ײ�����');
		$errorinfo[672]=array('en'=>'Payment Service Unavailable','cn'=>'�Ա��ͱ�����񲻿���');
		$errorinfo[673]=array('en'=>'ICP Service Unavailable','cn'=>'�������񲻿���');
		$errorinfo[674]=array('en'=>'App Service Unavailable','cn'=>'Ӧ�÷��񲻿���');
		$errorinfo[900]=array('en'=>'Remote Connection Error','cn'=>'Զ�����Ӵ���');
		$errorinfo[901]=array('en'=>'Remote Service Timeout','cn'=>'Զ�̷���ʱ');
		$errorinfo[902]=array('en'=>'Remote Service Error','cn'=>'Զ�̷������');
		$errorinfo[100]=array('en'=>'��Ȩ���Ѿ�����','cn'=>'��Ȩ���Ѿ�����');
		$errorinfo[101]=array('en'=>'��Ȩ���ڻ����ﲻ���ڣ�һ������ͬ����authcode���λ�ȡsessionkey','cn'=>'��Ȩ���ڻ����ﲻ���ڣ�һ������ͬ����authcode���λ�ȡsessionkey');
		$errorinfo[103]=array('en'=>'appkey����tid�����ID�������������ٴ���һ��','cn'=>'appkey����tid�����ID�������������ٴ���һ��');
		$errorinfo[104]=array('en'=>'appkey����tid��Ӧ�Ĳ��������','cn'=>'appkey����tid��Ӧ�Ĳ��������');
		$errorinfo[105]=array('en'=>'�����״̬���ԣ���������״̬������ʽ�����²���״̬','cn'=>'�����״̬���ԣ���������״̬������ʽ�����²���״̬');
		$errorinfo[106]=array('en'=>'ûȨ�޵��ô�app�����ڲ�����������û���Ĭ�ϰ�װ��������Ҫ�û��Ͳ������һ��������ϵ��','cn'=>'ûȨ�޵��ô�app�����ڲ�����������û���Ĭ�ϰ�װ��������Ҫ�û��Ͳ������һ��������ϵ��');
		$errorinfo[108]=array('en'=>'����app�а��ǳƣ�����½���ǳƲ��ǰ��ǳƣ�����ûȨ�޷��ʡ�','cn'=>'����app�а��ǳƣ�����½���ǳƲ��ǰ��ǳƣ�����ûȨ�޷��ʡ�');
		$errorinfo[109]=array('en'=>'����������ɲ�����ʱ��������⣨һ����tair�����⣩','cn'=>'����������ɲ�����ʱ��������⣨һ����tair�����⣩');
		$errorinfo[110]=array('en'=>'�������д��������ʱ���������','cn'=>'�������д��������ʱ���������');
		$errorinfo[111]=array('en'=>'����������ɲ�����ʱ��������⣨һ����tair�����⣩','cn'=>'����������ɲ�����ʱ��������⣨һ����tair�����⣩');

        if (! array_key_exists($errorcode, $errorinfo)) {
            $errorcode = 0;
        }
        return $errorinfo[$errorcode];
    }

    public function WriteError ($error, $paramArr)
    {
    	if(!KEKE_DEBUG){
	        $errorpath = dirname(dirname(__FILE__)). '/api_error_log';
	        if (! is_dir($errorpath)) {
	            @mkdir($errorpath);
	        }
	        if ($fp = @fopen($errorpath . '/' . date('Y-m-d') . '.log', 'a')) {
	            $errorinfotext[] = date('Y-m-d H:i:s');
	            $errorinfotext[] = "Error:" . $error['msg'];
	            foreach ($paramArr as $key => $value) {
	                $errorinfotext[] = $key . " : " . $value;
	            }
	            $errorinfotext = implode("\t", $errorinfotext) . "\r\n";
	            @fwrite($fp, $errorinfotext);
	            fclose($fp);
	        }
    	}
    }

    public function ViewError ($error, $paramArr = null, $closeerror = false,$Errorlog = false)
    {
        $debug = debug_backtrace(false);
        rsort($debug);
        if (is_array($error)) {
            if ($error['code'] < 100) {
                $errorlevel = 'ϵͳ������ ';
            } else {
                $errorlevel = 'ҵ�񼶴���';
            }
			$errortitle = $this->ErrorInfo($error['code']);

            $errortitle = $errortitle ? $errortitle : array('en'=>$error['sub_code'],'cn'=>$error['sub_msg']);
            $this->_ErrorInfo = @implode("\n",$errortitle);
			$errortitle = (object)$errortitle;
			if($Errorlog)
			{
				$this->WriteError($error, $paramArr);
			}
            if($closeerror) {
                return false;
            }
            $errortitlediy = $errorlevel . ": " . $errortitle->en . " (" . $errortitle->cn . ")";
        } else {
            $errortitlediy = $error;
        }

        $view[] = "<br /><font size='1'><table dir='ltr' border='1' cellspacing='0' cellpadding='1' width=\"100%\">";

        $view[] = "<tr><th align='left' bgcolor='#f57900' colspan=\"3\"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> " . $errortitlediy . " in " . $debug[count($debug) - 2]['file'] . " on line <i>" . $debug[count($debug) - 2]['line'] . "</i></th></tr>";

        $view[] = "<tr><th align='left' bgcolor='#e9b96e' colspan='3'>���ú���</th></tr>";
        $view[] = "<tr><th align='center' bgcolor='#eeeeec' width='30'>#</th><th align='left' bgcolor='#eeeeec'>������</th><th align='left' bgcolor='#eeeeec'>�����ļ�</th></tr>";
        $mainfile = basename($debug[0]['file']);

        $view[] = "<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec'>{main}(  )</td><td bgcolor='#eeeeec'>../{$mainfile}<b>:</b>0</td></tr>";

        foreach ($debug as $key => $value) {
            $value['file'] = basename($value['file']);
            $key = $key + 2;
            $view[] = "<tr><td bgcolor='#eeeeec' align='center'>$key</td><td bgcolor='#eeeeec'>{$value['class']}{$value['type']}{$value['function']}(  )</td><td title='{$value['file']}' bgcolor='#eeeeec'>../{$value['file']}<b>:</b>{$value['line']}</td></tr>";
        }

        $view[] = '</table></font>';
        if ($paramArr) {
            $view[] = "<br /><font size='1'><table dir='ltr' border='1' cellspacing='0' cellpadding='1' width=\"100%\">";
            $view[] = "<tr><th align='left' bgcolor='#e9b96e' colspan='4' height='25px'>�Ա�API ���ò����б�</th></tr>";
            $view[] = "<tr><th align='center' bgcolor='#eeeeec' width='30px'>#</th><th width='120' align='left' bgcolor='#eeeeec'>��������</th><th align='left' bgcolor='#eeeeec'>����</th><th align='left' bgcolor='#eeeeec' width='50px'>����</th></tr>";
            $i = 1;
            foreach ($paramArr as $key => $value) {
                $view[] = "<tr><td bgcolor='#eeeeec' align='center'>$i</td><td bgcolor='#eeeeec'>{$key}</td><td bgcolor='#eeeeec'>" . implode(', ', explode(',', $value)) . "</td><td bgcolor='#eeeeec'><b>" . strlen($value) . "</b></td></tr>";
                $i ++;
            }
            $view[] = "<tr><th align='left' bgcolor='#eeeeec' colspan='4' height='25px'>���κ��������¼��<a href='http://www.taoapi.com' target='_blank'>�Ա�TOP�ⲿ����ƽ̨(Taoapi.com)</a> ������ѯ! ��ǰSDK�汾��V2.3</th></tr>";
            $view[] = '</table></font>';
        }

        $this->_ErrorInfo =  implode("\n", $view);
    }
}