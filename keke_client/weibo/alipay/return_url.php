<?php
define('IN_KEKE', 1);
include ("../../../app_comm.php");
include_once '../client.php';

$_app_id  = $kekezu->_sys_config["alipay_app_id"];
$_app_secret = $kekezu->_sys_config["alipay_app_secret"];

$alipay_obj= oauth_api_factory::get_o("alipay", $_app_id, $_app_secret);
$alipay_config = $alipay_obj->_config;

 
?>
<!DOCTYPE HTML>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
//����ó�֪ͨ��֤���
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {//��֤�ɹ�
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//������������̻���ҵ���߼��������
	
	//�������������ҵ���߼�����д�������´�������ο�������
    //��ȡ֧������֪ͨ���ز������ɲο������ĵ���ҳ����תͬ��֪ͨ�����б�
    $user_id	= $_GET['user_id'];	//֧�����û�id
    $token		= $_GET['token'];	//��Ȩ����
    KEKE_DEBUG AND file_put_contents('log.txt', var_export($_GET,1),FILE_APPEND);
	//ִ���̻���ҵ�����
	
	echo "��֤�ɹ�<br />";
	echo "token:".$token;
	$_SESSION['auth_alipay']['last_key'] = array('user_id'=>$_GET['user_id'],'token'=>$_GET['token'],'real_name'=>$_GET['real_name']);
	if($url = $_SESSION['alipay_callback_url']){
		header("Location:".$url);
	}
    
	//etaoר��
	if($_GET['target_url'] != "") {
		//�����Զ���ת��target_url����ָ����urlȥ
	}

	//�������������ҵ���߼�����д�������ϴ�������ο�������
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //��֤ʧ��
    //��Ҫ���ԣ��뿴alipay_notify.phpҳ���verifyReturn�������ȶ�sign��mysign��ֵ�Ƿ���ȣ����߼��$responseTxt��û�з���true
    echo "��֤ʧ��";
}
?>
        <title>֧������ݵ�¼�ӿ�</title>
	</head>
    <body>
    </body>
</html>