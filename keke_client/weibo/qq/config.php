<?php
/**
 * PHP SDK for QQ��¼ OpenAPI
 *
 * @version 1.3
 * @author connect@qq.com
 * @copyright ? 2011, Tencent Corporation. All rights reserved.
 */

/**
 * @brief ���ļ���Ϊdemo�������ļ���
 */
//require_once '../comm_config.php';
/**
 * ��ʽ��Ӫ������رմ�����Ϣ
 * ini_set("error_reporting", E_ALL);
 * ini_set("display_errors", TRUE);
 * QQDEBUG = true  ����������ʾ
 * QQDEBUG = false ��ֹ������ʾ
 * Ĭ�Ͻ�ֹ������Ϣ
 */
define("QQDEBUG", false);
if (defined("QQDEBUG") && QQDEBUG)
{
    @ini_set("error_reporting", E_ALL);
    @ini_set("display_errors", TRUE);
}

/**
 * session
 */
//include_once("session.php");


/**
 * �������б�demo֮ǰ�뵽 http://connect.opensns.qq.com/����appid, appkey, ��ע��callback��ַ
 */
//���뵽��appid
//$_SESSION["appid"]    = yourappid; 
$_SESSION["appid"]    = $basic_config['qq_appid'];

//���뵽��appkey
//$_SESSION["appkey"]   = "yourappkey"; 
$_SESSION["appkey"]   = $basic_config['qq_appsecret']; 

//QQ��¼�ɹ�����ת�ĵ�ַ,��ȷ����ַ��ʵ���ã�����ᵼ�µ�¼ʧ�ܡ�
//$_SESSION["callback"] = "http://your domain/oauth/get_access_token.php"; 
$_SESSION["callback"] = $_K['siteurl']."/keke_client/weibo/qq/get_access_token.php";

//print_r ($_SESSION);
?>
