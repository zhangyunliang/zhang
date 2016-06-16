<?php
define("Msg_WebServerIP", "219.136.240.94");//������Ϣ�ķ�����IP
define("Msg_GatewayServer", "203.88.192.21:18013");//������Ϣ�ķ����������ط�����


/*
 * Web Service �������������ĺ�����ʵ��UNICODE����,����&#x79FB;&#x52A8;
 * ���������,���������������ʾ������Ҳ����ʹ������Ľ��뺯�����ַ���
 * ����ΪGB2312�ַ���
 */

//���ص�����UTF8�ַ��������Ӧ��GB2312�ַ�
function _Msg_DecodeChar($unicodeChar)
{
    $str="";
    if ($unicodeChar < 0x80) {
         $str.=$unicodeChar;
    } else if ($unicodeChar < 0x800) {
         $str.=chr(0xC0 | $unicodeChar>>6);
         $str.=chr(0x80 | $unicodeChar & 0x3F);
    } else if ($unicodeChar < 0x10000) {
         $str.=chr(0xE0 | $unicodeChar>>12);
         $str.=chr(0x80 | $unicodeChar>>6 & 0x3F);
         $str.=chr(0x80 | $unicodeChar & 0x3F);
    } else if ($unicodeChar < 0x200000) {
         $str.=chr(0xF0 | $unicodeChar>>18);
         $str.=chr(0x80 | $unicodeChar>>12 & 0x3F);
         $str.=chr(0x80 | $unicodeChar>>6 & 0x3F);
         $str.=chr(0x80 | $unicodeChar & 0x3F);
    }
    return iconv('UTF-8', 'GB2312', $str);
}


function Msg_ToGb2312($strCoded)
{
	//�ָ��ַ���
	preg_match_all("/&#x.{4};|&.{2,4};|.+/U", $strCoded, $r);

	$unicodeArray = $r[0];
	foreach($unicodeArray as $k=>$v)
	{
		if(strpos($v, "&#x") === 0)
		{
			$unicodeArray[$k] = _Msg_DecodeChar(hexdec(substr($v,3,-1)));
		}
		elseif(strpos($v, "&") === 0)
		{
			if (strpos($v, "lt") === 1)
				$unicodeArray[$k] = "<";
			elseif (strpos($v, "gt") === 1)
				$unicodeArray[$k] = ">";
			elseif (strpos($v, "quot") === 1)
				$unicodeArray[$k] = "\"";
			elseif (strpos($v, "apos") === 1)
				$unicodeArray[$k] = "\'";
			elseif (strpos($v, "amp") === 1)
				$unicodeArray[$k] = "&";
		}
	}
  return join("",$unicodeArray);
}


//����SOAP����

	//HTTP����ͷ�ַ������
define("HTTP_HEADER", "SOAPAction: \"http://%s/services/EsmsService/%s\"\r\n" .
		"User-Agent: SOAP Toolkit 3.0\r\n" . 
		"Host: %s:8080\r\n" .
		"Content-Length: %d\r\n" .
		"Connection: Keep-Alive\r\n" .
		"Pragma: no-cache\r\n\r\n");
	
	//HTTP�������ַ������
define("HTTP_REQUEST_DATA", "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>" .
		"<SOAP-ENV:Envelope SOAP-ENV:encodingStyle=\"\" " . 
		"xmlns:SOAPSDK1=\"http://www.w3.org/2001/XMLSchema\" " .
		"xmlns:SOAPSDK2=\"http://www.w3.org/2001/XMLSchema-instance\" " .
		"xmlns:SOAPSDK3=\"http://schemas.xmlsoap.org/soap/encoding/\" " .
		"xmlns:SOAP-ENV=\"http://schemas.xmlsoap.org/soap/envelope/\">" .
		"<SOAP-ENV:Body SOAP-ENV:encodingStyle=\"\">" .
		"<%s SOAP-ENV:encodingStyle=\"\">" .				//soap������
		"<n1 SOAP-ENV:encodingStyle=\"\">%s</n1>" .		//�û���
		"<n2 SOAP-ENV:encodingStyle=\"\">%s</n2>" .		//����
		"</%s>"	.						//soap������
		"</SOAP-ENV:Body>" .
		"</SOAP-ENV:Envelope>");
function _Msg_SendSoapRequest($userName, $password, $soapAction, $returnTag)
{
	$soapError = "ERROR";

	//HTTP���������
	$requestData = sprintf(HTTP_REQUEST_DATA, $soapAction, $userName, $password, $soapAction);

	//HTTP����ͷ
	$httpHeader = sprintf(HTTP_HEADER, Msg_WebServerIP, $soapAction, Msg_WebServerIP, strlen($requestData));

	$url = "POST /services/EsmsService?wsdl HTTP/1.1\r\n";

	$sock = fsockopen(Msg_WebServerIP, 8080);
	if ($sock == 0)
		return $soapError;
	
	fputs($sock, $url . $httpHeader . $requestData);	//����HTTP���󵽷�����

	//����HTTP���ļ�ͷ
	for ($i = 0; $i < 7; $i++)
		fgets($sock, 100);
	
	$tagBegin = sprintf("<%s", $returnTag); 
	$tagEnd = sprintf("</%s>", $returnTag);

	//��ȡXML�ַ���
	$buffer = "";
	$segGets = fgets($sock, 4096 * 3);
	while (strpos($segGets, $tagEnd) == FALSE)
	{
		$buffer .= $segGets;
		$segGets = fgets($sock, 4096 * 3);
		if ($segGets == FALSE)
			break;
	}
	fclose($sock);
	$buffer .= $segGets;

	$beginPos = strpos($buffer, $tagBegin);
	if ($beginPos == FALSE)
		return "";

	$beginPos = strpos($buffer, ">", $beginPos + strlen($tagBegin)) + 1;
	$endPos = strPos($buffer, $tagEnd, $beginPos);
	if ($endPos == FALSE)
		return "";

	return substr($buffer, $beginPos, $endPos - $beginPos);
}


function Msg_GetRemainFee($userName, $password)
{
	$result = _Msg_SendSoapRequest($userName, $password, "getRemainFee", "getRemainFeeReturn");
	if ($result == "ERROR")
		return -6;	//�û����������
	if ($result == "")
		return -1;

	return intval($result);
}

//��ȡ�ʺ���Ϣ
function Msg_GetConfigInfo($userName, $password)
{
	return  _Msg_SendSoapRequest($userName, $password, "getConfigInfo", "getConfigInfoReturn");
}

//��ȡ�ظ���Ϣ
function Msg_GetMoMessage($userName, $password)
{
	return _Msg_SendSoapRequest($userName, $password, "getMOMessage", "getMOMessageReturn");
}

//��ȡ��ǩ�ڵ�ֵ�����ر�ǩ�����λ��
function Msg_ExtractValue($soapReturn, $tag, $beginPos, &$value)
{
	$beginTag = sprintf("[%s]", $tag);	//��ʼ��ǩ
	$endTag = sprintf("[%s!]", $tag);	//������ǩ

	$posValue = strpos($soapReturn, $beginTag, $beginPos);	
	if ($posValue === false)
		return false;
       	$posValue += strlen($beginTag);	//ֵ�Ŀ�ʼλ��

	$posEnd = strpos($soapReturn, $endTag, $posValue);	//������ǩ��λ��
	if ($posEnd === false)
		return false;

	$lenValue = $posEnd - $posValue;	//ֵ�ĳ���
	if ($lenValue < 0)
		return false;

	$value = substr($soapReturn, $posValue, $lenValue);	//��ȡֵ

	return $posEnd + strlen($endTag);
}

class MOMessage
{
	var $id;
	var $destid;
	var $srcterminalid;
	var $msgcontent;
	var $receivetime;
}

//���ַ���������һ��MOMessage����
function _Msg_Parse_MOMessage($singleMOMessage, $beginPos, &$msg)
{
	$value = "";
	$posValue = Msg_ExtractValue($singleMOMessage, "id", $beginPos, $value);
	if ($posValue === false)
		return false;

	$msg->id = $value;

	$posValue = Msg_ExtractValue($singleMOMessage, "destid", $posValue, $value);
	$msg->destid = $value;

	$posValue = Msg_ExtractValue($singleMOMessage, "srcterminalid", $posValue, $value);
	$msg->srcterminalid = $value;

	$posValue = Msg_ExtractValue($singleMOMessage, "msgcontent", $posValue, $value);
	$msg->msgcontent = $value;

	$posValue = Msg_ExtractValue($singleMOMessage, "receivetime", $posValue, $value);
	$msg->receivetime = $value;

	return $posValue;
}

//���ַ���������һ��MOMessage����
function Msg_Parse_MOMessage($MOMessageArr)
{
	$msg = new MOMessage;
	$posValue = 0;
	$posValue = _Msg_Parse_MOMessage($MOMessageArr, $posValue, $msg);
	if ($posValue === false)
		return null;

	$msgArray = array($msg);

	$msg = new MOMessage;
	$posValue = _Msg_Parse_MOMessage($MOMessageArr, $posValue, $msg);
	while ($posValue !== false)
	{
		array_push($msgArray, $msg);
		$posValue = _Msg_Parse_MOMessage($MOMessageArr, $posValue, $msg);
	}
	return $msgArray;
}


//�����ַ����ĳ���.���ַ�Ϊ��λ
function _Msg_strlen($str)
{
	$count = 0;
	$i = 0;
	$len = strlen($str);
	while ($i < $len)
	{
		if (ord($str[$i]) > 128)
			$i += 2;
		else
			$i += 1;
		$count++;
	}
	return $count;
}
 
 
function _Msg_MobileNumberType($mobileNumber)
{
	if (($mobileNumber[0] == '1') && (strlen($mobileNumber) == 11))
		return 1;	//�ֻ�����
	if (($mobileNumber[0] == '0')
	       	&& ((strlen($mobileNumber) == 10) || (strlen($mobileNumber) == 12)))
		return 0;	//С��ͨ����
	
	return -1;	//��Ч����
}

//���͵�����Ϣ
function Msg_PostSingle($userName, $password, $to, $text, $subId)
{
	$maxMessageTextLen = 0;
	switch(_Msg_MobileNumberType($to))
	{
	case 1:
		$maxMessageTextLen = 900;	//�ֻ���Ϣ��70����(������׺)
		break;
	case 0:
		$maxMessageTextLen = 45;       //С��ͨ��45����(������׺)
		break;
	default:
		return -15;	//�������
	}

	if (_Msg_strlen($text) > $maxMessageTextLen)	//�жϲ�ȷ��,��Ϊʵ�ʵĳ��ȱ����ȥ��׺
		return -5;

	return _Msg_FinalPostMessage($userName, $password, $to, $text, $subId);
}

function Msg_PostBlockNumber($userName, $password, $numberArray, $text, $subId)
{
	$count = count($numberArray);
	if ($count > 100)
		return -5;	//Ⱥ���ĺ�������̫��

	$mobileType =_Msg_MobileNumberType($numberArray[0]);
	$to = $numberArray[0];
	for ($i = 1; $i < $count; $i++)
	{
		if ($mobileType != _Msg_MobileNumberType($numberArray[$i]))
			return -5;	//��ϵĺ���
		$to = $to . "+" . $numberArray[$i];
	}

	$maxMessageTextLen = 0;
	switch($mobileType)
	{
	case 1:
		$maxMessageTextLen = 900;	//�ֻ���Ϣ��70����(������׺)
		break;
	case 0:
		$maxMessageTextLen = 45;       //С��ͨ��45����(������׺)
		break;
	default:
		return -15;	//�������
	}

	return _Msg_FinalPostMessage($userName, $password, $to, $text, $subId);
}

define("POST_STRING", "http://%s/cgi-bin/sendsms?".
		"username=%s&password=%s&to=%s&text=%s&subid=%s&msgtype=4");
function _Msg_FinalPostMessage($userName, $password, $to, $text, $subId)
{
	$textUrl = urlencode($text);  //������URL��

	$httpRequest = sprintf(POST_STRING, Msg_GatewayServer, $userName, $password,
		$to, $textUrl, $subId);
	//print($httpRequest);
	if (file_get_contents($httpRequest) !== "0") //������Ϣ
			return -99;
	else 
		return 0;	//���ͳɹ�
}
function Desc_ReturnInfo($error_no){
	
	switch ($error_no){
		case "0":
			$error=0;
		break;
		case "-14":
			$error="���ͺ���Ϊ��";
		break;
		case "-11":
			$error="Ⱥ�����볬��100��";
		break;
		case "-15":
			$error="��������Ϊ��";
		break;
		case "-5":
			$error="�������ݳ���";
		break;
		case "-99":
			$error="��������";
		break;
		case "-6":
			$error="�û����������";
		break;
	}
	return $error;
}