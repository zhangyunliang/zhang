<?php
require_once '../comm_config.php';
require_once 'top/TopClient.php';
global $kekezu;
$c = new TopClient ();
$c->appkey = '12299577';
$c->secretKey = '9dd83e72678e558ee463e07f5769b59f';
/**
 * ��������
 * top_appkey;��Կ
 * top_session�����û�session
 * sign��ǩ�� ǩ������Ϊbase64(md5(top_appkey+top_parameters+top_session+app_secret))
 * top_parameters�����Ĳ���  base64(key1=value1&key2=value2����);
 * =>�û���¼������ visitor_id��visitor_nick;
 * =>δ��¼������  visitor_role;
 */
$c->process_user_oauth($top_sign, $top_appkey, $top_parameters, $top_session);
if($c->_error){
	$kekezu->show_msg('������ʾ',$_K['site_url'],3,$c->_error);
}

