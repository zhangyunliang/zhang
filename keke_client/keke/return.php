<?php
/*
	*���ܣ���������֪ͨ���õ�ҳ��
	*�汾��1.1
	*���ڣ�2012-02-28
	'˵����
	'���´���ֻ��Ϊ�˷����û����Զ��ṩ���������룬�û����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣

*/
///////////ҳ�湦��˵��///////////////
//������ҳ���ļ�ʱ�������ĸ�ҳ���ļ������κ�HTML���뼰�ո�
//��ҳ�治���ڱ������Բ��ԣ��뵽�������������ԡ���ȷ���ⲿ���Է��ʸ�ҳ�档
//��֪ͨҳ����Ҫ�����ǣ��������˵Ĵ�������������վ��ҵ���߼�����

define ( "IN_KEKE", true );
require_once (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
require_once 'keke_service_class.php';
require_once 'keke_tool_class.php';
require_once ('config.php');
$keke_interface = keke_tool_class::keke_interface();//�ӿ�����
$keke_interface = array_flip($keke_interface);//
//��������ҵҵ����
$union_obj = new keke_service_class($config,$keke_interface[$_GET['service']]);
//�ͻ���֪ͨ��֤���
$_GET and $verify_result = $union_obj->return_verify() or $verify_result = $union_obj->notify_verify ();
$_GET = keke_service_class::data_merge($config['_input_charset']);//�ص����ݻ�ȡ
//KEKE_DEBUG and $fp = file_put_contents ( 'log.txt', var_export ( $_GET, 1 ), FILE_APPEND );
list($model_code,$task_id) = explode("-",$_GET['outer_task_id'],2);
if ($verify_result) {
	$response = $union_obj->union_task_response($model_code, $task_id, $_GET);//����ҵ����
	keke_tool_class::notify($response['url'],$response['notice'],$response['type']);
} else {
	keke_tool_class::notify($_K['siteurl'].'/index.php', '��֤ʧ��','error');
}