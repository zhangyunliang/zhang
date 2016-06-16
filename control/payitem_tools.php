<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$uid!=$task_info['uid'] and kekezu::show_msg($_lang['friendly_notice'],'index.php?do=index',3,$_lang['cannot_access_page']); 
$payitem_arr = keke_payitem_class::get_payitem_info('employer',$model_list[$task_info['model_id']]['model_code']); 
$exist_payitem_arr = keke_payitem_class::payitem_exists($uid,false ,'',$payitem_arr);
$payitem_arr_desc = unserialize($task_info['payitem_time']);
$payitem_standard = keke_payitem_class::payitem_standard (); 
 foreach ($payitem_arr_desc as $k=>$v) { 
 	if($v>time()){
 		$sy_time_str = $v-time();
 		$sy_time_desc[$k] = kekezu::time2Units($sy_time_str);
 	}else{
 		$sy_time_desc[$k] = '0'.$_lang['day'];
 	} 
 }
 if(kekezu::submitcheck($formhash)){ 
 	$payitem_num = (array)$payitem_num;
 	if(!array_filter($payitem_num)){
 		kekezu::show_msg($_lang['friendly_notice'],'index.php?do=task&task_id='.$task_id.'&view=tools',3,$_lang['no_choose_any_tools']);
 	} 	
 	$keys_arr = array_keys($payitem_arr_desc); 
 	$pay_item = $task_info['pay_item'];
 	foreach (array_filter($payitem_num) as $k=>$v) {  			
 			if(intval($v)>0&&!stristr($pay_item, "$k")){  							
 				$pay_item = $pay_item.",$k"; 				
 			}			
			if(in_array($payitem_arr[$k]['item_code'], $keys_arr)){
				$payitem_arr_desc[$payitem_arr[$k]['item_code']]>time() and $payitem_arr_desc[$payitem_arr[$k]['item_code']] = 3600*24*$v+$payitem_arr_desc[$payitem_arr[$k]['item_code']] or $payitem_arr_desc[$payitem_arr[$k]['item_code']]=time()+3600*24*$v; 
			} else{
				db_factory::execute(sprintf("update %switkey_task set point='%s',city='%s' where task_id=%d",TABLEPRE,$_POST['point'],$province,$task_id));
		  	} 
			$cost_res = keke_payitem_class::payitem_cost ( $payitem_arr[$k]['item_code'], $v, 'task', 'spend', $task_id, $task_id );
 	}   	
 	$pay_item = ltrim($pay_item,",");
 	if(strlen($pay_item)){
 		db_factory::execute(sprintf("update %switkey_task set pay_item='%s' where task_id=%d",TABLEPRE,$pay_item,$task_id));
 	}
	$res = keke_payitem_class::set_payitem_time($payitem_arr_desc, $task_id, 'task'); 
 	$res||$cost_res and kekezu::show_msg($_lang['operate_notice'],"index.php?do=task&task_id=$task_id&view=tools",'3',$_lang['operate_success'],'success'); 
 }
require keke_tpl_class::template ( "payitem_tools" );
