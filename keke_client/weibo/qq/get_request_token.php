<?php
/**
 * PHP SDK for QQ��¼ OpenAPI
 *
 * @version 1.3
 * @author connect@qq.com
 * @copyright ? 2011, Tencent Corporation. All rights reserved.
 */


require_once("utils.php");

 /**
 * @brief ������ʱtoken.�����辭��URL���룬����ʱ����ѭ RFC 1738
 *  
 * @param $appid
 * @param $appkey
 *
 * @return �����ַ�����ʽΪ��oauth_token=xxx&oauth_token_secret=xxx
 */
function get_request_token($appid, $appkey)
{
    //������ʱtoken�Ľӿڵ�ַ, ��Ҫ����!!
    $url    = "http://openapi.qzone.qq.com/oauth/qzoneoauth_request_token?";


    //����oauth_signatureǩ��ֵ��ǩ��ֵ���ɷ��������http://wiki.opensns.qq.com/wiki/��QQ��¼��ǩ������oauth_signature��˵����
    //��1�� ��������ǩ��ֵ��Դ����HTTP����ʽ & urlencode(uri) & urlencode(a=x&b=y&...)��
	$sigstr = "GET"."&".rawurlencode("http://openapi.qzone.qq.com/oauth/qzoneoauth_request_token")."&";

	//��Ҫ����
    $params = array();
    $params["oauth_version"]          = "1.0";
    $params["oauth_signature_method"] = "HMAC-SHA1";
    $params["oauth_timestamp"]        = time();
    $params["oauth_nonce"]            = mt_rand();
    $params["oauth_consumer_key"]     = $appid;

    //�Բ���������ĸ���������л�
    $normalized_str = get_normalized_string($params);
    $sigstr        .= rawurlencode($normalized_str);
   
	
	//��2��������Կ
    $key = $appkey."&";


 	//��3������oauth_signatureǩ��ֵ��������Ҫȷ��PHP�汾֧��hash_hmac����
    $signature = get_signature($sigstr, $key);
    
		
	//��������url
    $url      .= $normalized_str."&"."oauth_signature=".rawurlencode($signature);

    //echo "$sigstr\n";
    //echo "$url\n";

    return file_get_contents($url);
}

//get_request_token�ӿڵ���ʾ����
//echo get_request_token($_SESSION["appid"], $_SESSION["appkey"]);
?>
