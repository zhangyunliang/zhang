<?php
/* *
 * ���ܣ���ݵ�¼�ӿڽ���ҳ
 * �汾��3.2
 * �޸����ڣ�2011-03-25
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 * �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���

 *************************ע��*************************
 * ������ڽӿڼ��ɹ������������⣬���԰��������;�������
 * 1���̻��������ģ�https://b.alipay.com/support/helperApply.htm?action=consultationApply�����ύ���뼯��Э�������ǻ���רҵ�ļ�������ʦ������ϵ��Э�����
 * 2���̻��������ģ�http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9��
 * 3��֧������̳��http://club.alipay.com/read-htm-tid-8681712.html��
 * �������ʹ����չ���������չ���ܲ�������ֵ��
 */

require_once("alipay.config.php");
require_once("lib/alipay_service.class.php");

/**************************�������**************************/

//ѡ�����//

//������ʱ���
$anti_phishing_key  = '';
//��ȡ�ͻ��˵�IP��ַ�����飺��д��ȡ�ͻ���IP��ַ�ĳ���
$exter_invoke_ip = '';
//ע�⣺
//1.������ѡ���Ƿ��������㹦��
//2.exter_invoke_ip��anti_phishing_keyһ����ʹ�ù�����ô���Ǿͻ��Ϊ�������
//3.���������㹦�ܺ󣬷��������������Ա���֧��SSL�������úøû�����
//ʾ����
//$exter_invoke_ip = '202.1.1.1';
//$ali_service_timestamp = new AlipayService($aliapy_config);
//$anti_phishing_key = $ali_service_timestamp->query_timestamp();//��ȡ������ʱ�������

/************************************************************/

//����Ҫ����Ĳ�������
$parameter = array(
		"service"			=> "alipay.auth.authorize",
		"target_service"	=> 'user.auth.quick.login',
		
		"partner"			=> trim($aliapy_config['partner']),
		"_input_charset"	=> trim(strtolower($aliapy_config['input_charset'])),
        "return_url"		=> trim($aliapy_config['return_url']),

        "anti_phishing_key"	=> $anti_phishing_key,
		"exter_invoke_ip"	=> $exter_invoke_ip
);

//�����ݵ�¼�ӿ�
$alipayService = new AlipayService($aliapy_config);
$html_text = $alipayService->alipay_auth_authorize($parameter);
echo $html_text;

?>
