<?php
/**
 * PHP SDK for QQ��¼ OpenAPI
 *
 * @version 1.3
 * @author connect@qq.com
 * @copyright ? 2011, Tencent Corporation. All rights reserved.
 */

require_once("utils.php");

 /*
 * @brief ��ȡ�û���Ϣ.�����辭��URL���룬����ʱ����ѭ RFC 1738
 * 
 * @param $appid
 * @param $appkey
 * @param $access_token
 * @param $access_token_secret
 * @param $openid
 *
 */
function get_user_info($appid, $appkey, $access_token, $access_token_secret, $openid)
{
	//��ȡ�û���Ϣ�Ľӿڵ�ַ, ��Ҫ����!!
    $url    = "http://openapi.qzone.qq.com/user/get_user_info";
    $info   = do_get($url, $appid, $appkey, $access_token, $access_token_secret, $openid);
    $arr = array();
    $arr = json_decode($info, true);

    return $arr;
}

//�ӿڵ���ʾ����
//$arr = get_user_info($_SESSION["appid"], $_SESSION["appkey"], $_SESSION["token"], $_SESSION["secret"], $_SESSION["openid"]);
//var_dump($arr);
?>
