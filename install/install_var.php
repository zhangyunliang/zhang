<?php
//define('KEKE_OFF', FALSE );
define('ENV_ERROR', 2);
define('CONFIG', '/config/config.inc.php');
$func_items = array('mysql_connect', 'fsockopen', 'file_get_contents','json_encode');

//�����������
$env_items = array(
	'os' => array('c' => 'PHP_OS', 'r' => 'noset', 'b' => 'unix'),// c��ʾ����??�� required�� best
	'php' => array('c' => 'PHP_VERSION', 'r' => '5.0', 'b' => '5.0'),
	'attachmentupload' => array('r' => 'noset', 'b' => '2M'),
	'gdversion' => array('r' => '1.0', 'b' => '2.0'),
	'diskspace' => array('r' => '10M', 'b' => 'noset'),
);
//�ļ�Ȩ��
$dirfile_items = array(
	'config' => array('type' => 'file', 'path' => CONFIG),
	'data' => array('type' => 'dir', 'path' => 'data'),
	'avatar' => array('type' => 'dir', 'path' => 'data/avatar'),
	'backup' => array('type' => 'dir', 'path' => 'data/backup'),
	'data_cache' => array('type' => 'dir', 'path' => 'data/data_cache'),
	'session' => array('type' => 'dir', 'path' => 'data/session'),
	'tmp' => array('type' => 'dir', 'path' => 'data/tmp'),
	'tpl_c' => array('type' => 'dir', 'path' => 'data/tpl_c'),
	'uploads' => array('type' => 'dir', 'path' => 'data/uploads'),
	//'uploads_member' => array('type' => 'dir', 'path' => 'data/uploads/member'),
	
);