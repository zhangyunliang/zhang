<?php
error_reporting(0);
require (dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . 'lib/inc/keke_base_class.php'); 
require (dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . 'lib/inc/keke_core_class.php'); 
$basic_config  = $kekezu->_sys_config;
$model_list = $kekezu->_model_list;
$nav_list = $kekezu->_nav_list;
$exec_time_traver = kekezu::exec_js('get');
(!isset($exec_time_traver)||$exec_time_traver<time()) and $exec_time_traver = true or $exec_time_traver = false;
$_R = $_REQUEST;
$_R = kekezu::k_input($_R);  
$_R and extract ($_R,EXTR_SKIP);
isset($inajax) and $_K['inajax']= $inajax; 
unset ( $uid, $username);
