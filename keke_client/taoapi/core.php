<?php
/**
 * taoapi ����ҳ��
 */
define("IN_KEKE",TRUE);
require_once (dirname(dirname (dirname ( __FILE__ ) )) . DIRECTORY_SEPARATOR . 'app_comm.php');
require_once S_ROOT.'/keke_client/taoapi/lib/taoapi_get.php';
$params= array(
		'nicks'=>'�����콢��'
	);
	//100021047
	//50014239
$taoapi = new taoapi_get('items',$params,'get','xml',CHARSET);
$data  = $taoapi->send();
var_dump($data);
