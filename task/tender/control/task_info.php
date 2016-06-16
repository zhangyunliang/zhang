<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$nav_active_index = 'task';
$basic_url = "index.php?do=task&task_id=$task_id"; 
$task_obj = tender_task_class::get_instance ( $task_info );
$task_config =$task_obj->_task_config;
$g_uid = $task_obj->_guid;
$model_id = $task_obj->_model_id;
$task_status = $task_obj->_task_status;
$indus_arr = $kekezu->_indus_c_arr; 
$indus_p_arr = $kekezu->_indus_p_arr; 
$cove_arr = kekezu::get_table_data("*","witkey_task_cash_cove","","","","","cash_rule_id");
$trust_mode=$task_obj->_trust_mode;
$status_arr = $task_obj->_task_status_arr; 
$time_desc = $task_obj->get_task_timedesc (); 
$uid !=$g_uid&&task_status==1 and kekezu::show_msg($_lang['friendly_notice'],'index.php?do=index',2,'ÈÎÎñÉóºËÖÐ');
$stage_desc = $task_obj->get_task_stage_desc (); 
$related_task = $task_obj->get_task_related ();
$delay_rule = $task_obj->_delay_rule;
$delay_total = sizeof($delay_rule);
$delay_count=intval($task_info['is_delay']);
$process_can = $task_obj->process_can (); 
$process_desc = $task_obj->process_desc (); 
$cash_arr = $task_obj->_cash_arr;
$task_cash_cove = $task_obj->get_task_coverage(); 
$browing_history = $task_obj->browing_history($task_id,$task_cash_cove,$task_info['task_title']);
$show_payitem = $task_obj->show_payitem();
$task_obj->plus_view_num();
switch ($op) {
	case "pub_agreement":
		$bid_info  = $task_obj->get_bid_info();
		$res = $task_obj->set_agreement_status($bid_info['bid_id'], 1);
		$res  and kekezu::keke_show_msg("index.php?do=task&task_id=$task_id",$_lang['operate_success'],'success') or kekezu::keke_show_msg("index.php?do=task&task_id=$task_id",$_lang['operate_fail'], 'error');
		break;
	case "work_over":
		$bid_info  = $task_obj->get_bid_info();
		$task_obj->set_task_status(8);
		if ($task_info['task_union']=='1'){
			$union_obj = new keke_union_class($task_id);
			$union_obj -> change_status('end');
		}
		$res = $task_obj->set_agreement_status($bid_info['bid_id'], 2);
		$res  and kekezu::keke_show_msg("index.php?do=task&task_id=$task_id",$_lang['operate_success'],'success') or kekezu::keke_show_msg("index.php?do=task&task_id=$task_id",$_lang['operate_fail'], 'error');
		die();
		break;
	case "reqedit" : 
		$title = $_lang['supply_demand'];
		if ($sbt_edit) {
			$task_obj->set_task_reqedit ( $tar_content, '', 'json' );
		} else
			$ext_desc = $task_info ['ext_desc'];
		require keke_tpl_class::template ( 'task/task_reqedit' );
		die ();
		break;
	case "taskdelay" : 
		$title =$_lang['task_delay'];
		if($sbt_edit){
			$task_obj->set_task_delay($delay_day, $delay_cash,'','json');
		}else
			$min_cash = intval($task_config['min_delay_cash']);
			$max_day  = intval($task_config['max_delay']);
			$this_min_cash = intval($delay_rule[$delay_count]['defer_rate']*$task_info['task_cash']/100);
			$min_cash>$this_min_cash and $real_min = $min_cash or $real_min = $this_min_cash;
			$credit_allow =  intval($kekezu->_sys_config ['credit_is_allow']);
			require keke_tpl_class::template("task/task_delay");
		die();
		break;
	case "work_hand" : 
		$title = $_lang['hand_work'];
		if($sbt_edit){
			if(CHARSET=='gbk'){ 
				$work_frm['area'] = kekezu::utftogbk($province.",".$city.','.$area);
				$work_frm['tar_content'] = kekezu::utftogbk($work_frm['tar_content']);
			}
			$task_obj->tender_work_hand ( $work_frm,'','json');
		}else{
			$loca = explode(",",$user_info['residency']);
			$workhide_exists = keke_payitem_class::payitem_exists($uid,'workhide','work');
			require keke_tpl_class::template ( 'task/tender_work' );
		}
		die();
		break;
	case "work_choose" : 
		$task_obj->work_choose ( $work_id, $to_status,'','json');
		break;
	case "start_vote" : 
		$task_obj->start_vote('','json');
		break;
	case "work_vote" : 
		$task_obj->set_task_vote($work_id,'','json');
		break;
	case "report" : 
		$transname = keke_report_class::get_transrights_name($type);
		$title=$transname.$_lang['submit'];
		if($sbt_edit){
			$task_obj->set_report ( $obj, $obj_id, $to_uid,$to_username, $type, $file_url, $tar_content);
		}else{
			require keke_tpl_class::template("report");
		}
			die();
		break;
	case "mark" :
		$title = $_lang['each_mark'];
		$model_code = $task_obj->_mode_code;
		require S_ROOT.'control/mark.php';
		die();
		break;
	case "work_del":
		$task_obj->del_work($work_id,'','json');
		break;
	case "comment" : 
		switch ($obj_type) {
			case "task" :
				break;
			case "work" : 
				$tar_content and $task_obj->set_work_comment ( $obj_type, $obj_id, $tar_content, $p_id, '', 'json' );
				break;
		}
		break;
}
switch ($view) {
	case "work" :
	$search_condit = $task_obj->get_search_condit();
		$date_prv = date("Y-m-d",time());
		$work_status = $task_obj->get_work_status ();
		$sql = sprintf("select a.*,b.* from %switkey_task_bid as a left join %switkey_space as b on a.uid=b.uid where a.task_id=%d",TABLEPRE,TABLEPRE,$task_id) ;
		$st = $st ? $st :"all";
		switch ($st){
			case "all":
					$sql .=" and 1=1";
				break;
				case 4:
					$sql .=" and a.bid_status=4";
				break;
				case 7:
					$sql .=" and a.bid_status=7";
				break;
		} 
		$ut=="my" and $sql .=" and a.uid=".intval($uid);
		$url = "index.php?do=task&task_id=$task_id&view=work&ut=$ut&page_size=$page_size&$page=$page";
		$count = db_factory::execute($sql); 
		$page = $page ? $page : 1;
		$page_size = intval ( $page_size ) ? intval ( $page_size ) : 5;
		$sql .=" order by (CASE WHEN  a.bid_status!=0 THEN 100 ELSE 0 END) desc"; 
		$page_obj->setAjax(1);
		$page_obj->setAjaxDom("gj_summery");
		$pages = $page_obj->getPages ( $count, $page_size, $page, $url ); 
		$sql = $sql.$pages['where'];
		$bid_info = db_factory::query($sql);
		$has_new  = $task_obj->has_new_comment($page,$page_size);
		break;
	case "comment" :
		$comment_obj = keke_comment_class::get_instance('task'); 
		$url = $basic_url."&view=comment";
		intval($page) or $page = 1;
		$comment_arr = $comment_obj->get_comment_list($task_id, $url, $page); 
		$comment_data = $comment_arr['data'];
		$comment_page = $comment_arr['pages'];
		$reply_arr = $comment_obj->get_reply_info($task_id);
	    switch ($op){
	    	case "reply": 
	    		$comment_arr = array("obj_id"=>$task_id,"origin_id"=>$task_id,"obj_type"=>"task","p_id"=>$pid,
	    		 "uid"=>$uid, "username"=>$username,"content"=>$content,"on_time"=>time()); 
	    		$res = $comment_obj->save_comment($comment_arr,$task_id,1); 
	    		if($res!=3&&$res!=2){
	    			$v1 =  $comment_obj->get_comment_info($res);
	    			$tmp ='replay_comment';
	    			require keke_tpl_class::template ( "task/task_comment_reply" );
	    		}else{
	    			echo $res;
	    		}
	    		die();
	    		break;
	    	case "add": 
	    		$comment_arr = array("obj_id"=>$task_id,"origin_id"=>$task_id,"obj_type"=>"task",
	    		"uid"=>$uid, "username"=>$username,"content"=>$content,"on_time"=>time());
	    		$res = $comment_obj->save_comment($comment_arr,$task_id); 
	    		if($res!=3&&$res!=2){
	    			$v = $comment_obj->get_comment_info($res);
	    			$tmp ='pub_comment';
	    			require keke_tpl_class::template ( "task/task_comment_reply" );
	    		}else{
	    			echo $res;
	    		}
	    		die();
	    		break;
	    	case "del": 
	    		$comment_info = $comment_obj->get_comment_info($comment_id);
	    		if( $uid ==ADMIN_UID||$user_info['group_id']==7){
	    			$res = $comment_obj->del_comment($comment_id,$task_id,$comment_info['p_id']);
	    		}else{
	    			kekezu::keke_show_msg("", $_lang['not_priv'],"error","json");
	    		}
	    		$res and kekezu::keke_show_msg("", $_lang['delete_success'],"","json") or kekezu::keke_show_msg("",$_lang['system_is_busy'],"error","json");
	    		break;	
	    } 
		break; 
	case "base" :
	default :
		$task_file = $task_obj->get_task_file (); 
}
require keke_tpl_class::template ( "task/" . $model_info ['model_code'] . "/tpl/" . $_K ['template'] . "/task_info" );