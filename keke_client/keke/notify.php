<?php
/*
	*���ܣ������첽֪ͨ���õ�ҳ��
	*�汾��1.1
	*���ڣ�2012-02-28
	'˵����
	'���´���ֻ��Ϊ�˷����û����Զ��ṩ���������룬�û����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣

*/
///////////ҳ�湦��˵��///////////////
//������ҳ���ļ�ʱ�������ĸ�ҳ���ļ������κ�HTML���뼰�ո�
//��ҳ�治���ڱ������Բ��ԣ��뵽�������������ԡ���ȷ���ⲿ���Է��ʸ�ҳ�档
//��֪ͨҳ����Ҫ�����ǣ��������˵Ĵ�������������վ��ҵ���߼�����
//���ݱ�����֤���������������Ӧsuccess��error��ʶ
//�豣֤��ҳ�����κ���ת
define ( "IN_KEKE", true );
require_once (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
require_once 'keke_service_class.php';
require_once 'keke_tool_class.php';
require_once ("config.php");
//��������ҵҵ����
$keke_interface = keke_tool_class::keke_interface();//�ӿ�����
$keke_interface = array_flip($keke_interface);//

$union_obj = new keke_service_class($config,$keke_interface[$_POST['service']]);
$verify_result = $union_obj->notify_verify();//�ͻ���֪ͨ��֤���

$_POST = keke_service_class::data_merge($config['_input_charset']);//�ص����ݻ�ȡ
//д��־
//KEKE_DEBUG and $fp = file_put_contents ( 'log.txt', var_export ( $_POST, 1 ), FILE_APPEND );
list($model_code,$task_id) = explode("-",$_POST['outer_task_id'],2);
if ($verify_result) {
 	echo "success";
	$union_obj->union_task_response($model_code, $task_id, $_POST);//����ҵ����
} else {
	echo "error";
}