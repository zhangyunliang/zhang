<?php
defined ( 'IN_KEKE' ) or exit('Access Denied');
$ops = array ('pub', 'task', 'shop' );
in_array($op,$ops) or $op ='task';
$sub_nav = array(
	array ("pub" => array ($_lang['pub_task'], "doc-new" )),
	array ("task" => array ($_lang['task_manage'], "doc-lines-stright" ), 
	 		"shop" => array ($_lang['goods_trans'], "box" ))
		);
$model_list=kekezu::get_table_data ( '*', 'witkey_model', " model_type = '$op'", 'model_id asc ', '', '', 'model_id', 3600 );
$model_fds = array_keys($model_list);
$model_id or $model_id = intval($model_fds['0']);
switch ($op){
	case "pub":
		 header("Location:index.php?do=release");
		break;
	case "task":
		require 'user_'.$view.'_'.$op.'.php';	
		break;
	case "shop": 
		require 'user_'.$op.'.php';	
		break;
}
