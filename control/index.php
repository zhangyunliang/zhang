<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$nav_active_index = "index";
$indus_list = $kekezu->_indus_p_arr;
$indus_c_arr = $kekezu->_indus_c_arr;
$task_in = db_factory::get_one( sprintf ( " select sum(fina_cash) cash from %switkey_finance where fina_action='task_bid' and fina_type='in' ", TABLEPRE ), 1, 600 ); 
$task_in = str_pad (number_format($task_in['cash'], 2, ".", "," ), 10, 0, STR_PAD_LEFT );
$task_count = db_factory::get_one( sprintf ( " select count(task_id) count from %switkey_task", TABLEPRE ), 1, 600 ); 
$task_count = str_pad ( intval ($task_count['count']), 10, 0, STR_PAD_LEFT );
$service_in = db_factory::get_one ( sprintf ( " select sum(fina_cash) cash from %switkey_finance where fina_action='sale_service' and fina_type='in'", TABLEPRE ), 1, 600 ); 
$service_in = str_pad ( number_format ($service_in['cash'], 2, ".", "," ), 10, 0, STR_PAD_LEFT );
$service_count = db_factory::get_one ( sprintf ( " select count(service_id) count from %switkey_service where service_status='2'", TABLEPRE ), 1, 600 ); 
$service_count = str_pad (  intval ($service_count['count']), 10, 0, STR_PAD_LEFT );
$register = db_factory::get_one ( sprintf ( " select count(uid) count from %switkey_member ", TABLEPRE ), 1, 600  ); 
 $register = str_pad ( intval ($register['count']), 10, 0, STR_PAD_LEFT );
$all_auth = db_factory::get_one ( sprintf ( " select count(record_id) count from %switkey_auth_record where auth_status='1'", TABLEPRE ), 1, 600 ); 
$all_auth = str_pad (  intval ($all_auth['count']), 10, 0, STR_PAD_LEFT );
$feed_list = db_factory::query ( "select uid,username,title,feed_time from " . TABLEPRE . "witkey_feed order by feed_time desc limit 0,4", 1, 3600 );
$mode_list = $kekezu->_model_list;
$cash_coverage = kekezu::get_table_data ( "cash_rule_id,start_cove,end_cove", "witkey_task_cash_cove", "", "", "", "", "cash_rule_id", 3600 );
$task_recomm_3 = db_factory::query ( sprintf ( " select task_id,uid,username,task_title,task_cash,model_id,view_num,focus_num,work_num,task_cash_coverage from %switkey_task where is_top='1' and task_status='2' order by start_time desc limit 0,3", TABLEPRE ), 1, 600 );
$sql = " select task_id,task_title,task_cash,view_num,focus_num,work_num,task_cash_coverage
		 from %switkey_task  where is_top='1' and (task_status='2' or task_status ='3' or task_status ='4' or task_status ='5' or task_status ='6')
		  order by start_time desc limit 3,33";
$recomm_task = db_factory::query ( sprintf ( $sql, TABLEPRE ), true, 3600 );
$range = range ( 1, 24 );
$recomm_service = db_factory::query ( sprintf ( "select service_id,pic,ad_pic,title from %switkey_service where is_top='1' and service_status='2' order by on_time desc limit 0,26", TABLEPRE ), 1, 600 );
$news_list = kekezu::get_table_data ( "art_id,art_title,art_pic,content,pub_time", "witkey_article", "(art_cat_id='5' or art_cat_id='6' or art_cat_id='17' or art_cat_id='365')", " pub_time desc", "", "10", "", 3600 );
$case_list = kekezu::get_table_data ( "case_id,obj_id,obj_type,case_img,case_title,case_price", "witkey_case", "", "", "", "7", "", 3600 );
$talent_list = db_factory::query ( sprintf ( " select uid,username from %switkey_space where status!=2 order by reg_time desc limit 0,16", TABLEPRE ), 1, 600 );
$income_rank = db_factory::query ( sprintf ( " select sum(a.fina_cash) as cash,a.uid,a.username from %switkey_finance a left join %switkey_space b on a.uid=b.uid where a.fina_type='in' and ( a.fina_action in('task_bid','sale_service') or INSTR(a.fina_action,'prom_')>0) and b.status!=2 group by a.uid order by cash desc limit 0,5 ", TABLEPRE,TABLEPRE), 1, 600 ); 
if (isset ( $ajax )) {
	switch ($ajax) {
		case "task" :
			$sql2 = " select task_id,task_title,task_cash,view_num,focus_num,work_num,task_cash_coverage
		 from %switkey_task  where  (task_status='2' or task_status ='3' ) 
		  order by start_time desc limit 0,42";
			$task_lastest = db_factory::query ( sprintf ( $sql2, TABLEPRE ), true, 3600 );
			require keke_tpl_class::template ( "ajax/index" );
			die ();
			break;
		case "shop" :
			$service_lastes = db_factory::query ( sprintf ( "select service_id,pic,ad_pic,title from %switkey_service where   service_status='2' order by on_time desc limit 0,26", TABLEPRE ), 1, 600 );
			require keke_tpl_class::template ( "ajax/index" );
			die ();
			break;
	}
	if (in_array ( $ajax, array (
			'rules',
			'withdraw',
			'safe' 
	) )) {
		$cat_arr = array (
				'rules' => 100,
				'withdraw' => 297,
				'safe' => 203 
		);
		$art_arr = get_art ( $cat_arr [$ajax] );
		require keke_tpl_class::template ( "ajax/index" );
		die ();
	}
}
$art_notice_arr = get_art ( 17 );
$page_title = $_K ['html_title'];
function get_art($cat_id) {
	$sql = "select a.art_id,a.art_title from " . TABLEPRE . "witkey_article a left join " . TABLEPRE . "witkey_article_category b  on a.art_cat_id = b.art_cat_id
 					where a.art_cat_id = $cat_id  or b.art_cat_pid like '%{ $cat_id }%' order by a.pub_time desc limit 4";
	return db_factory::query ( $sql, 0, 600 );
}
require keke_tpl_class::template ( $do );