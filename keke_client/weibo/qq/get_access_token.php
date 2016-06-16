<?php
/**
 * PHP SDK for QQ��¼ OpenAPI
 *
 * @version 1.3
 * @author connect@qq.com
 * @copyright ? 2011, Tencent Corporation. All rights reserved.
 */
//require_once '../comm_config.php';
require_once("utils.php");
/**
 * @brief ��ȡaccess_token�������辭��URL���룬����ʱ����ѭ RFC 1738
 *
 * @param $appid
 * @param $appkey
 * @param $request_token
 * @param $request_token_secret
 * @param $vericode
 *
 * @return �����ַ�����ʽΪ��oauth_token=xxx&oauth_token_secret=xxx&openid=xxx&oauth_signature=xxx&oauth_vericode=xxx&timestamp=xxx
 */

function get_access_token($appid, $appkey, $request_token, $request_token_secret, $vericode)
{
    //�������Qzone����Ȩ�޵�access_token�Ľӿڵ�ַ, ��Ҫ����!!
    $url    = "http://openapi.qzone.qq.com/oauth/qzoneoauth_access_token?";
   
    //����oauth_signatureǩ��ֵ��ǩ��ֵ���ɷ��������http://wiki.opensns.qq.com/wiki/��QQ��¼��ǩ������oauth_signature��˵����
    //��1�� ��������ǩ��ֵ��Դ����HTTP����ʽ & urlencode(uri) & urlencode(a=x&b=y&...)��
	$sigstr = "GET"."&".rawurlencode("http://openapi.qzone.qq.com/oauth/qzoneoauth_access_token")."&";

    //��Ҫ��������Ҫ������!!
    $params = array();
    $params["oauth_version"]          = "1.0";
    $params["oauth_signature_method"] = "HMAC-SHA1";
    $params["oauth_timestamp"]        = time();
    $params["oauth_nonce"]            = mt_rand();
    $params["oauth_consumer_key"]     = $appid;
    $params["oauth_token"]            = $request_token;
    $params["oauth_vericode"]         = $vericode;

    //�Բ���������ĸ���������л�
    $normalized_str = get_normalized_string($params);
    $sigstr        .= rawurlencode($normalized_str);

    //echo "sigstr = $sigstr";

	//��2��������Կ
    $key = $appkey."&".$request_token_secret;

	//��3������oauth_signatureǩ��ֵ��������Ҫȷ��PHP�汾֧��hash_hmac����
    $signature = get_signature($sigstr, $key);
    
	
	//��������url
    $url      .= $normalized_str."&"."oauth_signature=".rawurlencode($signature);

    return file_get_contents($url);
}


/**
 * Tips��
 * QQ������¼����Ȩ�ɹ����ص�ע���callback��ַ
 * ����Ҫ����Ȩ��request token��ȡaccess token
 * ����QQ�������κ���Դ����Ҫaccess token
 * Ŀǰaccess token�ǳ�����Ч�ģ������û�������������
 * �������������access tokenʧЧ���������û����µ�¼QQ��������Ȩ����ȡaccess token
 */
//print_r($_REQUEST);

//�û�ʹ��QQ��¼������Ȩ�ɹ��󣬻᷵���û���openid����ʱ��Ҫ��鷵�ص�openid�Ƿ��ǺϷ�id
//���ǲ����鿪����ʹ�ø�openid������ʹ�û�ȡaccess token֮�󷵻ص�openid��
/*if (!is_valid_openid($_REQUEST["openid"], $_REQUEST["timestamp"], $_REQUEST["oauth_signature"]))
{
    //demo�Դ���򵥴���
    echo "###invalid openid\n";
    echo "sig:".$_REQUEST["oauth_signature"]."\n";
    exit;
}*/

//tips
//�����Ѿ���ȡ����openid�����Դ���������˻���openid�İ��߼���
//�������ǽ���������ȵ���ȡaccess token֮���������߼�

//����Ȩ��request token��ȡaccess token
/*$access_str = get_access_token($_SESSION["appid"], $_SESSION["appkey"], $_REQUEST["oauth_token"], $_SESSION["secret"], $_REQUEST["oauth_vericode"]);
//echo "access_str:$access_str\n";
$result = array();
parse_str($access_str, $result);
//print_r($result);

//������
if (isset($result["error_code"]))
{
    echo "get access token error<br>";
    echo "error msg: $request_token<br>";
    echo "���<a href=\"http://wiki.opensns.qq.com/wiki/%E3%80%90QQ%E7%99%BB%E5%BD%95%E3%80%91%E5%85%AC%E5%85%B1%E8%BF%94%E5%9B%9E%E7%A0%81%E8%AF%B4%E6%98%8E\" target=_blank>�鿴������</a>";
    exit;
}*/


//��access token��openid��������������
//��demo��ʾ�У�ֱ�ӱ�����ȫ�ֱ�����.
//Ϊ������վ���ڶ����������ͬһ����������ͬ��������ɵ�session�޷���������
//�뿪���߰��ձ�SDK��comm/session.php�е�ע�Ͷ�session.php���б�Ҫ���޸ģ��Խ������2�����⣬
/*$_SESSION["token"]   = $result["oauth_token"];
$_SESSION["secret"]  = $result["oauth_token_secret"]; 
$_SESSION["openid"]  = $result["openid"];

include 'get_user_info.php';
$arr = get_user_info($_SESSION["appid"], $_SESSION["appkey"], $_SESSION["token"], $_SESSION["secret"], $_SESSION["openid"]);
if($arr){
	$arr['name']=$arr['nickname'];
	$arr['account']=$arr['nickname'];
	unset($arr['nickname']);
	unset($arr['ret']);
	unset($arr['msg']);
	$_SESSION['qq_login_info']=$arr;
	header("Location:".$_K['site_url']."/oauth_login.php?wb_type=qq");
}*/
//var_dump($arr);
/*echo "<p>�������Ѿ���ȡ�����û��Ĺؼ�����</p>";
echo "<p>openid:".$result['openid']."�û�Ψһ��ʶ</p>";
echo "<p>token:".$result['oauth_token']."���з���Ȩ�޵�token</p>";
echo "<p>secret:".$result['oauth_token_secret']."��Կ</p>";
echo "<p>��������������Ӧ�ñ������������ڷ���QQ�����������ӿ�,����:</p>";
echo "<p>���<a href=\"get_user_info.php\"    target=\"_blank\">��ȡ�û���Ϣ</a></p>";
echo "<p>����������Ҫ�����Լ���վ�ĵ�¼�߼���ף��ʹ��QQ��¼���</p>";
*/
//�����������û����߼�
//��openid����������ʺ�������
//bind_to_openid();
?>
