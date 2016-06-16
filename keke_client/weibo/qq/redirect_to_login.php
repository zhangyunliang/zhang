<?php
/**
 * PHP SDK for QQ��¼ OpenAPI
 *
 * @version 1.3
 * @author connect@qq.com
 * @copyright ? 2011, Tencent Corporation. All rights reserved.
 */
//require_once '../comm_config.php';
require_once("get_request_token.php");
/**
 * @brief ��ת��QQ��¼ҳ��.�����辭��URL���룬����ʱ����ѭ RFC 1738
 *
 * @param $appid
 * @param $appkey
 * @param $callback
 *
 * @return �����ַ�����ʽΪ��oauth_token=xxx&openid=xxx&oauth_signature=xxx&timestamp=xxx&oauth_vericode=xxx
 */
function redirect_to_login($appid, $appkey, $callback)
{
    //��ת��QQ��¼ҳ�Ľӿڵ�ַ, ��Ҫ����!!
    $redirect = "http://openapi.qzone.qq.com/oauth/qzoneoauth_authorize?oauth_consumer_key=$appid&";

    //����get_request_token�ӿڻ�ȡδ��Ȩ����ʱtoken
    $result = array();
    $request_token = get_request_token($appid, $appkey);
    parse_str($request_token, $result);

    //request token, request token secret ��Ҫ��������
    //��demo��ʾ�У�ֱ�ӱ�����ȫ�ֱ�����.
    //Ϊ������վ���ڶ����������ͬһ����������ͬ��������ɵ�session�޷���������
    //�뿪���߰��ձ�SDK��comm/session.php�е�ע�Ͷ�session.php���б�Ҫ���޸ģ��Խ������2�����⣬
    $_SESSION["qq_token"]        = $result["oauth_token"];
    $_SESSION["qq_secret"]       = $result["oauth_token_secret"];
//    var_dump($result);DIE;
    setcookie('secret',$result["oauth_token_secret"]);
    if ($result["oauth_token"] == "")
    {
        //ʾ��������û�жԴ���������д�����ʵ�������վ��Ҫ�Լ�����������
        return false;
        exit;
    }

    ////��������URL
    return $redirect .= "oauth_token=".$result["oauth_token"]."&oauth_callback=".rawurlencode($callback);
    //header("Location:$redirect");
}

//redirect_to_login�ӿڵ���ʾ��(���û����QQ��¼��ťʱ��Ӧ�õ��øýӿ��������û���QQ��¼ҳ��)
//redirect_to_login($_SESSION["appid"], $_SESSION["appkey"], $_SESSION["callback"]);
?>
