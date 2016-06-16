<?php
keke_lang_class::load_lang_class ( 'mreward_task_class' );
class mreward_task_class extends keke_task_class {
	public $_task_status_arr; 
	public $_work_status_arr; 
	public $_delay_rule; 
	public $_union_obj;
	public static function get_instance($task_info) {
		static $obj = null;
		if ($obj == null) {
			$obj = new mreward_task_class ( $task_info );
		}
		return $obj;
	}
	public function __construct($task_info) {
		parent::__construct ( $task_info );
		$this->init ();
	}
	public function init() {
		$this->status_init ();
		$this->task_requirement_init ();
		$this->delay_rule_init ();
		$this->wiki_priv_init ();
		$this->union_obj ();
		$this->mark_init();
	}
	public function mark_init(){
		$m = $this->get_mark_count_ext();
		$t = $this->_task_info;
		$t['mark']['all'] = intval($m[1]['c']+$m[2]['c']);
		$t['mark']['master'] = intval($m[2]['c']);
		$t['mark']['wiki'] = intval($m[1]['c']);
		$this->_task_info  = $t;
	}
	public function union_obj() {
		$this->_union_obj = new keke_union_class ( $this->_task_id );
	}
	public function status_init() {
		$this->_task_status_arr = $this->get_task_status ();
		$this->_work_status_arr = $this->get_work_status ();
	}
	public function delay_rule_init() {
		$this->_delay_rule = keke_task_config::get_delay_rule ( $this->_model_id, '3600' );
	}
	public function wiki_priv_init() {
		$arr = mreward_priv_class::get_priv ( $this->_task_id, $this->_model_id, $this->_userinfo );
		$this->_priv = $this->user_priv_format ( $arr );
	}
	public function task_requirement_init() {
		global $_lang;
		$require_arr = array (); 
		$require_arr [$_lang['haved_work']] = $this->_task_info ['work_num'];
		$require_arr [$_lang['haved_bid_work']] = $bid_num = intval ( db_factory::get_count ( sprintf ( " select count(work_id) count from %switkey_task_work where
		 work_status = '4' and task_id = '%d'", TABLEPRE, $this->_task_id ) ) );
	}
	public function get_task_timedesc() {
		global $_lang;
		$status_arr = $this->_task_status_arr;
		$task_status = $this->_task_status;
		$task_info = $this->_task_info;
		$time_desc = array ();
		switch ($task_status) {
			case "2" : 
				$time_desc ['time_desc'] = $_lang['from_hand_work_deadline']; 
				$time_desc ['time'] = $task_info ['sub_time']; 
				$time_desc ['ext_desc'] = $_lang['task_working_can_hand_work']; 
				if ($this->_task_config ['open_select'] == 'open') { 
					$time_desc ['g_action'] = $_lang['now_employer_can_choose_work']; 
				}
				break;
			case "3" : 
				$time_desc ['time_desc'] = $_lang['from_choose_deadline']; 
				$time_desc ['time'] = $task_info ['end_time']; 
				$time_desc ['ext_desc'] = $_lang['task_choosing_wait_employer_choose']; 
				break;
			case "4" : 
				$time_desc ['time_desc'] = $_lang['from_vote_deadline']; 
				$time_desc ['time'] = $task_info ['sp_end_time']; 
				$time_desc ['ext_desc'] = $_lang['task_voting_can_vote']; 
				break;
			case "5" : 
				$time_desc ['time_desc'] = $_lang['from_gs_deadline']; 
				$time_desc ['time'] = $task_info ['sp_end_time']; 
				$time_desc ['ext_desc'] = $_lang['task_haved_choose_bid_and_user_look']; 
				break;
			case "6" : 
				$time_desc ['ext_desc'] = $_lang['task_in_jf_rate']; 
				break;
			case "7" : 
				$time_desc ['ext_desc'] = $_lang['task_diffrent_opnion_and_web_in']; 
				break;
			case "8" : 
				$time_desc ['ext_desc'] = $_lang['task_haved_complete']; 
				break;
			case "9" : 
				$time_desc ['ext_desc'] = $_lang['task_timeout_and_no_works_fail']; 
				break;
			case "11" : 
				$time_desc ['ext_desc'] = $_lang['task_arbitrating']; 
				break;
		}
		return $time_desc;
	}
	public function get_work_info($w = array(), $order = null, $p = array()) {
		global $kekezu, $_K;
		$work_arr = array ();
		$sql = " select a.*,b.seller_credit,b.seller_good_num,b.seller_total_num,b.seller_level from " . TABLEPRE . "witkey_task_work a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$count_sql = " select count(a.work_id) from " . TABLEPRE . "witkey_task_work a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$where = " where a.task_id = '$this->_task_id' ";
		if (! empty ( $w )) {
			$w['work_id'] and $where.=" and a.work_id='".$w['work_id']."'";
			$w ['user_type'] == 'my' and $where .= " and a.uid = '$this->_uid'";
			isset ( $w ['work_status'] ) and $where .= " and a.work_status = '" . intval ( $w ['work_status'] ) . "'";
		}
		$where .= "  order by (CASE WHEN  a.work_status!=0 THEN 100 ELSE 0 END) desc,work_time asc ";
		if (! empty ( $p )) {
			$page_obj = $kekezu->_page_obj;
			$page_obj->setAjax ( 1 );
			$page_obj->setAjaxDom ( "gj_summery" );
			$count = intval ( db_factory::get_count ( $count_sql . $where ) );
			$pages = $page_obj->getPages ( $count, $p ['page_size'], $p ['page'], $p ['url'], $p ['anchor'] );
			$where .= $pages ['where'];
		}
		$work_info = db_factory::query ( $sql . $where );
		$work_info = kekezu::get_arr_by_key($work_info,'work_id');
		$work_arr ['work_info'] = $work_info;
		$work_arr ['pages'] = $pages;
		$work_info_arr = array_keys($work_info);
		if(!empty($work_info_arr)){
			$work_arr ['mark']  = $this->has_mark(implode(',',$work_info_arr));
		}
		return $work_arr;
	}
	public function work_hand($work_desc, $file_ids, $hidework = '2', $qq = '', $mobile = '', $url = '', $output = 'normal') {
		global $_K;
		global $_lang;
		if ($this->check_if_can_hand ( $url, $output )) {
			$work_obj = new Keke_witkey_task_work_class ();
			$work_obj->_work_id = null;
			$work_obj->setTask_id ( $this->_task_id );
			$work_obj->setUid ( $this->_uid );
			$work_obj->setUsername ( $this->_username );
			$work_obj->setVote_num ( 0 );
			$work_obj->setWork_status ( 0 );
			$work_obj->setWork_title ( $this->_task_title );
			$work_obj->setHide_work ( intval ( $hidework ) );
			CHARSET == 'gbk' and $work_desc = kekezu::utftogbk ( $work_desc );
			$work_obj->setWork_desc ( kekezu::escape ( kekezu::str_filter ( $work_desc ) ) );
			$work_obj->setWork_time ( time () );
			if ($file_ids) { 
				$file_arr = array_unique ( array_filter ( explode ( ',', $file_ids ) ) );
				$f_ids = implode ( ',', $file_arr ); 
				$work_obj->setWork_file ( implode ( ',', $file_arr ) );
			}
			$work_id = $work_obj->create_keke_witkey_task_work ();
			if ($work_id) {
				$file_ids and db_factory::execute ( sprintf ( " update %switkey_file set work_id='%d',task_title='%s',obj_id='%d' where file_id in ('%s')", TABLEPRE, $work_id, $this->_task_title, $work_id, $f_ids ) );
				$this->plus_work_num (); 
				$this->plus_take_num (); 
				$notice_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=task&task_id=" . $this->_task_id . "\">" . $this->_task_title . "</a>";
				$g_notice = array ($_lang['user'] => $this->_username, $_lang['call'] => $_lang['you'], $_lang['task_title'] => $notice_url );
				$this->notify_user ( "task_hand", $_lang['task_hand'], $g_notice ); 
				if ($this->_task_info ['task_union'] == 1) {
					$this->_union_obj->work_hand ( $work_id );
				}
				kekezu::keke_show_msg ( $url, $_lang['congratulate_you_hand_work_success'], "", $output );
			} else
				kekezu::keke_show_msg ( $url, $_lang['pity_hand_work_fail'], "error", $output );
		}
	}
	public function work_choose($work_id, $to_status, $url = '', $output = 'normal', $trust_response = false) {
		global $_K, $kekezu;
		global $_lang;
		$kekezu->init_prom ();
		kekezu::check_login ( $url, $output ); 
		$this->check_if_operated ( $work_id, $to_status, $url, $output ); 
		$status_arr = $this->get_work_status ();
		if ($this->set_work_status ( $work_id, $to_status )) {
			$status_desc_arr = array ("1" => $_lang['work_get_prize1'], "2" => $_lang['work_get_prize2'], "3" => $_lang['work_get_prize3'] );
			$work_info = $this->get_task_work ( $work_id ); 
			$url = '<a href ="' . $_K ['siteurl'] . '/index.php?do=task&task_id=' . $this->_task_id . '" target="_blank" >' . $this->_task_title . '</a>';
			$v = array ($_lang['task_id'] => $this->_task_id, $_lang['task_title'] => $url );
			$this->notify_user ( "task_bid", $status_desc_arr [$to_status], $v, '1', $work_info ['uid'] ); 
			$prize_date = $this->get_prize_date (); 
			$prize_cash = $prize_date ['cash'] [$to_status];
			$feed_arr = array ("feed_username" => array ("content" => $work_info ['username'], "url" => "index.php?do=space&member_id={$work_info['uid']}" ), "action" => array ("content" => $_lang['success_bid_haved'], "url" => "" ), "event" => array ("content" => "$this->_task_title ", "url" => "index.php?do=task&task_id=$this->_task_id",'cash'=>$prize_cash) );
			kekezu::save_feed ( $feed_arr, $work_info ['uid'], $work_info ['username'], 'work_accept', $this->_task_id );
			if ($kekezu->_prom_obj->is_meet_requirement ( "bid_task", $this->_task_id )) {
				$kekezu->_prom_obj->create_prom_event ( "bid_task", $work_info ['uid'], $this->_task_id, $prize_cash );
			}
			if (in_array ( $to_status, array (1, 2, 3 ) )) {
				if ($this->_task_info ['task_union'] == 1) {
					$this->_union_obj->work_choose ( $work_id, $to_status );
				}
			}
			$this->plus_accepted_num ( $work_info ['uid'] );
			kekezu::echojson ( $_lang['choose_operate'], 1, $_lang['work_set_success'] );
			$this->check_if_gs (); 
			kekezu::keke_show_msg ( $url, $_lang['work'] . $status_arr [$to_status] . $_lang['set_success'], '', $output );
		} else {
			kekezu::keke_show_msg ( $url, $_lang['work'] . $status_arr [$to_status] . $_lang['set_fail'], "error", $output );
		}
	}
	public function process_can() {
		$wiki_priv = $this->_priv; 
		$process_arr = array ();
		$status = intval ( $this->_task_status );
		$task_info = $this->_task_info;
		$config = $this->_task_config;
		$g_uid = $this->_guid;
		$uid = $this->_uid;
		$user_info = $this->_userinfo;
		switch ($status) {
			case "2" : 
				switch ($g_uid == $uid) { 
					case "1" :
						$process_arr ['reqedit'] = true; 
						sizeof ( $this->_delay_rule ) > 0 and $process_arr ['delay'] = true; 
						if ($config ['open_select'] == 'open') {
							$process_arr ['work_choose'] = true; 
						}
						$process_arr ['work_comment'] = true; 
						break;
					case "0" : 
						$process_arr ['work_hand'] = true; 
						$process_arr ['task_comment'] = true; 
						$process_arr ['task_report'] = true; 
						break;
				}
				$process_arr ['work_report'] = true; 
				break;
			case "3" : 
				switch ($g_uid == $uid) { 
					case "1" :
						$process_arr ['work_choose'] = true; 
						$process_arr ['work_comment'] = true; 
						sizeof ( $this->get_task_work ( '', '5' ) ) > 1 and $process_arr ['task_vote'] = true; 
						break;
					case "0" : 
						$process_arr ['task_comment'] = true; 
						$process_arr ['task_report'] = true; 
						break;
				}
				$process_arr ['work_report'] = true; 
				break;
			case "5" : 
				switch ($g_uid == $uid) { 
					case "1" :
						$process_arr ['work_comment'] = true; 
						break;
					case "0" :
						$process_arr ['task_comment'] = true; 
						$process_arr ['task_report'] = true; 
						break;
				}
				$process_arr ['work_report'] = true; 
				break;
			case "8" : 
				switch ($g_uid == $uid) { 
					case "1" :
						$process_arr ['work_comment'] = true; 
						$process_arr ['work_mark'] = true; 
						break;
					case "0" :
						$process_arr ['task_comment'] = true; 
						$process_arr ['task_mark'] = true; 
						break;
				}
				break;
		}
		$uid != $g_uid and $process_arr ['task_complaint'] = true; 
		$process_arr ['work_complaint'] = true; 
		$this->_process_can = $process_arr;
		return $process_arr;
	}
	public function set_work_status($work_id, $to_status) {
		return db_factory::execute ( sprintf ( " update %switkey_task_work set work_status='%d' where work_id='%d'", TABLEPRE, $to_status, $work_id ) );
	}
	public function set_task_sp_end_time($time_type = 'notice_period') {
		global $_lang;
		$sp_end_time = time () + $this->_task_config [$time_type] * 24 * 3600;
		return db_factory::execute ( sprintf ( " update %switkey_task set sp_end_time = '%d' where task_id='%d' ", TABLEPRE, $sp_end_time,$this->_task_id) );
	}
	public static function task_delay($task_id,$task_cash,$delay_cash) {
		$prize_data  = db_factory::query(sprintf(" select * from %switkey_task_prize where task_id='%d'",TABLEPRE,$task_id));
		foreach($prize_data as $v){
			$rate = $v['prize_cash']/$task_cash;
			$new_cash = $v['prize_cash']+$delay_cash*$rate;
			db_factory::execute(sprintf(" update %switkey_task_prize set prize_cash='%.2f' where prize_id='%d'",TABLEPRE,$new_cash,$v['prize_id']));
		}
	}
	public function dispose_task_return() {
		global $kekezu;
		$config = $this->_task_config;
		$task_info = $this->_task_info;
		$task_cash = $task_info ['task_cash']; 
		switch ($config ['defeated']) {
			case "1" : 
				$return_cash = $task_cash * (1 - $config ['task_fail_rate'] / 100);
				$return_credit = '0';
				$res = keke_finance_class::cash_in ( $this->_guid, floatval ( $return_cash ), 0, 'task_fail', '', '', '', $task_cash - $return_cash ); 
				break;
			case "2" : 
				$return_credit = $task_cash * (1 - $config ['task_fail_rate'] / 100);
				$return_cash = '0';
				$res = keke_finance_class::cash_in ( $this->_guid, 0, floatval ( $return_credit ), 'task_fail', '', '', '', $task_cash - $return_credit );
				break;
		}
		if ($res) {
			$kekezu->init_prom ();
			$p_event = $kekezu->_prom_obj->get_prom_event ( $this->_task_id, $this->_guid, "pub_task" );
			$kekezu->_prom_obj->set_prom_event_status ( $p_event ['parent_uid'], $this->_gusername, $p_event ['event_id'], '3' );
			$this->set_task_status ( 9 ); 
			$this->_union_obj->change_status ( 'failure' );
		}
	}
	public function task_tg_timeout() {
		global $_lang;
		if (time () > $this->_task_info ['sub_time'] && $this->_task_info ['task_status'] == 2) {
			$work_num = $this->_task_info ['work_num'];
			if ($work_num == 0) {
				$this->dispose_task_return ();
				kekezu::notify_user ( $_lang['task_fail'], $_lang['your_task'] . '<a href="index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>' . $_lang['haved_fail_for_task_not_work'], $this->_guid, $this->_gusername );
			}
			if ($work_num > 0) {
				$this->set_task_status ( 3 ); 
				kekezu::notify_user ( $_lang['choose_work_timeout'], $_lang['your_task'] . '<a href="index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>' . $_lang['contribute_timeout_in_choose'], $this->_guid, $this->_gusername );
			}
		}
	}
	public function task_xg_timeout() {
		global $_lang;
		if (time () > $this->_task_info ['end_time'] && $this->_task_info ['task_status'] == 3) {
			$mxs_config = kekezu::get_task_config ( 2 );
			$prize_date = $this->get_prize_date (); 
			$total_prize_count = $prize_date ['count'] ['prize_1'] + $prize_date ['count'] ['prize_2'] + $prize_date ['count'] ['prize_3']; 
			$work_num = $this->_task_info ['work_num'];
			$work_count = db_factory::get_count ( sprintf ( "select count(work_id) as work_count from %switkey_task_work where task_id='%d' and work_status='%d' ", TABLEPRE, $this->_task_id, 0 ) );
			if ($work_num ['work_num'] == $work_count) {
				$this->auto_choose ( $prize_date ['count'] ['prize_1'], $prize_date ['count'] ['prize_2'], $total_prize_count ); 
			} else { 
				$this->set_task_status ( 5 ); 
				$this->set_task_sp_end_time ();
				kekezu::notify_user ( $_lang['task_gs'], $_lang['your_task'] . '<a href="index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>' . $_lang['choose_timeout_in_gs'], $this->_guid, $this->_gusername );
			}
		}
	}
	public function task_gs_timeout() {
		global $kekezu;
		global $_lang;
		$kekezu->init_prom ();
		$prom_obj = $kekezu->_prom_obj;
		if (time () > $this->_task_info ['sp_end_time'] && $this->_task_info ['task_status'] == 5) {
			$prize_work_arr = db_factory::query ( sprintf ( "select * from %switkey_task_work where task_id='%d' and work_status in(1,2,3) ", TABLEPRE, $this->_task_id ) );
			$prize_date = $this->get_prize_date (); 
			foreach ( $prize_work_arr as $k => $v ) {
				$prize = "prize_" . $v ['work_status'];
				$prize_cash = $prize_date ['cash'] [$prize];
				$prize_real_cash = $prize_cash * (1 - $this->_task_config ['task_rate'] / 100);
				keke_finance_class::cash_in ( $v ['uid'], $prize_real_cash, 0, 'task_bid', '', '', '', $prize_cash - $prize_real_cash ); 
				$prize_total_cash += $prize_cash; 
				kekezu::notify_user ( $_lang['task_js'], $_lang['your_work'] . '<a href="index.php?do=user&view=witkey">' . $this->_task_title . '</a>' . $_lang['get_prize1_and_cash_in_your_account'], $v ['uid'], $v ['username'] );
				$prom_obj->dispose_prom_event ( "bid_task", $v ['uid'], $v ['work_id'] );
				keke_user_mark_class::create_mark_log ( $this->_model_code, 1, $v ['uid'], $this->_guid, $v ['work_id'], $prize_cash, $this->_task_id, $v ['username'], $this->_gusername );
				keke_user_mark_class::create_mark_log ( $this->_model_code, 2, $this->_guid, $v ['uid'], $v ['work_id'], $prize_cash * (1 - $this->_task_config ['task_rate'] / 100), $this->_task_id, $this->_gusername, $v ['username'] );
				$this->plus_mark_num ();
			}
			$this->set_task_status ( 8 ); 
			$this->_union_obj->change_status ( 'end' ); 
			$prom_obj->dispose_prom_event ( "pub_task", $this->_guid, $this->_task_id );
			$if_sy = $this->_task_info ['task_cash'] - $prize_total_cash; 
			if (intval ( $if_sy ) > 0) {
				$return_g_cash = $if_sy * (1 - $this->_task_config ['task_fail_rate'] / 100);
				if ($this->_task_config ['defeated'] == 1) { 
					keke_finance_class::cash_in ( $this->_guid, floatval ( $return_g_cash ), 0, 'task_fail', '', '', '', $if_sy - $return_g_cash ); 
				} else { 
					keke_finance_class::cash_in ( $this->_guid, 0, floatval ( $return_g_cash ), 'task_fail', '', '', '', $if_sy - $return_g_cash ); 
				}
				kekezu::notify_user ( $_lang['task_complete'], $_lang['your_task'] . '<a href="index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>' . $_lang['gs_timeout_and_task_over_and_return_your_remain_cash'], $this->_guid, $this->_gusername );
			} else {
				kekezu::notify_user ( $_lang['task_complete'], $_lang['your_task'] . '<a href="index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>' . $_lang['gs_timeout_and_task_complete'], $this->_guid, $this->_gusername );
			}
		}
	}
	public function auto_choose($prize1_num, $prize2_num, $prize_all) {
		global $kekezu;
		global $_lang;
		$kekezu->init_prom ();
		$prom_obj = $kekezu->_prom_obj;
		switch ($this->_task_config ['end_action']) {
			case "split" :
				$prize_date = $this->get_prize_date (); 
				$work_bid_arr = db_factory::query ( sprintf ( "select work_id ,uid,username from %switkey_task_work where task_id=%d order by work_time asc limit  %d", TABLEPRE, $this->_task_id, $prize_all ) );
				foreach ( $work_bid_arr as $k => $v ) {
					if ($k < $prize1_num) {
						$this->set_work_status ( $v ['work_id'], 1 ); 
						$prize_cash = $prize_date ['cash'] ['1'];
					} elseif ($k < $prize1_num + $prize2_num) {
						$this->set_work_status ( $v ['work_id'], 2 ); 
						$prize_cash = $prize_date ['cash'] ['2'];
					} elseif ($k < $prize_all) {
						$this->set_work_status ( $v ['work_id'], 3 ); 
						$prize_cash = $prize_date ['cash'] ['3'];
					}
					if ($prom_obj->is_meet_requirement ( "bid_task", $this->_task_id )) {
						$prom_obj->create_prom_event ( "bid_task", $v ['uid'], $this->_task_id, $prize_cash );
					}
					kekezu::notify_user ( $_lang['work_get_prize'], $_lang['your_work'] . '<a href="index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>' . $_lang['task_get'] . ($k + 1) . $_lang['prize_and_look'], $v ['uid'], $v ['username'] );
				}
				$this->set_task_status ( 5 ); 
				$this->set_task_sp_end_time ();
				kekezu::notify_user ( $_lang['auto_choose_work'], $_lang['your_task'] . '<a href="index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>' . $_lang['choose_timeout_and_not_work_and_auto_choose_work'], $this->_guid, $this->_gusername );
				break;
			case "refund" : 
				$this->dispose_task_return ();
				kekezu::notify_user ( $_lang['task_fail'], $_lang['your_task'] . '<a href="index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>' . $_lang['for_no_operate_and_task_fail'], $this->_guid, $this->_gusername );
				break;
		}
	}
	public function check_if_operated($work_id, $to_status, $url = '', $output = 'normal') {
		global $_lang;
		$can_select = false; 
		if ($this->check_if_can_choose ( $url, $output )) { 
			$work_status = db_factory::get_count ( sprintf ( " select work_status from %switkey_task_work where work_id='%d'
					 and uid='%d'", TABLEPRE, $work_id, $this->_uid ) );
			if ($work_status == '8') { 
				kekezu::keke_show_msg ( $url, $_lang['the_work_is_not_choose_and_not_choose_the_work'], "error", $output );
			} else {
				$prize_date = $this->get_prize_date ();
				$prize_work_date = $this->get_prize_work_count ();
				$work_count = $prize_work_date ["prize_" . $to_status];
				$prize_count = $prize_date ['count'] ["prize_" . $to_status];
				if ($work_count == $prize_count) {
					kekezu::keke_show_msg ( $url, $_lang['now_task'] . "$to_status" . $_lang['prize_have_full'] . "$to_status" . $_lang['prize_th'], "error", $output );
				} else {
					return true;
				}
			}
		} else { 
			kekezu::keke_show_msg ( $url, $_lang['now_status_can_not_choose'], "error", $output );
		}
	}
	public static function get_task_status() {
		global $_lang;
		return array ("0" => $_lang['task_no_pay'], "1" => $_lang['task_wait_audit'], "2" => $_lang['task_vote_choose'], "3" => $_lang['task_choose_work'], "5" => $_lang['task_gs'], "7" => $_lang['freeze'], "8" => $_lang['task_over'], "9" => $_lang['fail'], "10" => $_lang['task_audit_fail'], "11" => $_lang['arbitrate'] );
	}
	public static function get_work_status() {
		global $_lang;
		return array ('1' => $_lang['prize_1'], '2' => $_lang['prize_2'], "3" => $_lang['prize_3'], '8' => $_lang['task_can_not_choose_bid'] );
	}
	public static function get_task_union_status() {
		return array ('0' => "wait", '1' => "audit", '2' => "sub", '3' => "choose", '4' => "vote", '5' => "notice", '6' => 'deliver', '7' => "freeze", '8' => "end", '9' => "failure", '10' => "audit_fail", '11' => "arbitrate" );
	}
	public static function get_work_union_status() {
		return array ('0' => 'wait', '1' => 'first_prize', '2' => 'second_prize', '3' => 'third_prize', '8' => 'no_optional' );
	}
	public function get_work_prize() {
		global $_lang;
		$prize_arr = $this->get_task_prize ();
		switch (count ( $prize_arr )) {
			case 1 :
				return array ('1' => $_lang['prize_1'] );
				break;
			case 2 :
				return array ('1' => $_lang['prize_1'], '2' => $_lang['prize_2'] );
				break;
			case 3 :
				return array ('1' => $_lang['prize_1'], '2' => $_lang['prize_2'], "3" => $_lang['prize_3'] );
				break;
		}
	}
	public function get_task_prize() {
		$task_prize_arr = kekezu::get_table_data ( "*", "witkey_task_prize", "task_id={$this->_task_id}", "", "", "", "prize", 0 ); 
		return $task_prize_arr;
	}
	public function check_if_gs() {
		$prize_date = $this->get_prize_date (); 
		$work_count = $this->get_prize_work_count (); 
		if ($prize_date ['count'] ['prize_1'] == $work_count ['prize_1'] && $prize_date ['count'] ['prize_2'] == $work_count ['prize_2'] && $prize_date ['count'] ['prize_3'] == $work_count ['prize_3']) {
			$this->set_task_status ( '5' );
			$this->set_task_sp_end_time ();
		}
	}
	public function get_prize_date() {
		$all_prize_data = array ();
		$count = array (); 
		$cash = array (); 
		$prize_arr = db_factory::query ( sprintf ( "select * from %switkey_task_prize where task_id='%d' ", TABLEPRE, $this->_task_id ) );
		$i = 1;
		foreach ( $prize_arr as $k => $v ) {
			$count ["prize_" . $i] = $v ['prize_count'];
			$cash ["prize_" . $i] = $v ['prize_cash'] / $v ['prize_count'];
			$i ++;
		}
		$all_prize_data ['count'] = $count;
		$all_prize_data ['cash'] = $cash;
		return $all_prize_data; 
	}
	public function get_prize_work_count() {
		$prize_work_date = array ();
		$work_count_arr = db_factory::query ( sprintf ( "select work_status,count(work_id)  as work_count from %switkey_task_work where task_id='%d' and work_status in(1,2,3) GROUP BY work_status ", TABLEPRE, $this->_task_id ) );
		foreach ( $work_count_arr as $v ) {
			$prize = "prize_" . $v ['work_status'];
			$prize_work_count [$prize] = $v ['work_count'];
		}
		return $prize_work_count; 
	}
	public function dispose_order($order_id) {
		global $kekezu, $_K;
		global $_lang;
		$task_config = $this->_task_config;
		$task_info = $this->_task_info; 
		$url = $_K ['siteurl'] . '/index.php?do=task&task_id=' . $this->_task_id;
		$task_status = $this->_task_status;
		$order_info = db_factory::get_one ( sprintf ( "select order_amount,order_status from %switkey_order where order_id='%d'", TABLEPRE, intval ( $order_id ) ) );
		$order_amount = $order_info ['order_amount'];
		if ($order_info ['order_status'] == 'ok') {
			$task_status == 1 && $notice = $_lang['task_pay_success_and_wait_admin_audit'];
			$task_status == 2 && $notice = $_lang['task_pay_success_and_task_pub_success'];
			return pay_return_fac_class::struct_response ( $_lang['operate_notice'], $notice, $url, 'success' );
		} else {
			$res = keke_finance_class::cash_out ( $this->_task_info ['uid'], $order_amount, 'pub_task' ); 
			if ($res) { 
				$kekezu->init_prom ();
				if ($kekezu->_prom_obj->is_meet_requirement ( "pub_task", $this->_task_id )) {
					$kekezu->_prom_obj->create_prom_event ( "pub_task", $this->_guid, $this->_task_id, $this->_task_info ['task_cash'] );
				}
					$consume = kekezu::get_cash_consume($task_info['task_cash']);
					db_factory::execute(sprintf(" update %switkey_task set cash_cost='%s',credit_cost='%s' where task_id='%d'",TABLEPRE,$consume['cash'],$consume['credit'],$this->_task_id));
					$feed_arr = array ("feed_username" => array ("content" =>$task_info['username'], "url" => "index.php?do=space&member_id={$task_info['uid']}" ), "action" => array ("content" => $_lang['pub_task'], "url" => "" ), "event" => array ("content" => "{$task_info['task_title']}", "url" => "index.php?do=task&task_id={$task_info['task_id']}" ) );
					kekezu::save_feed ( $feed_arr,$task_info['uid'],$task_info['username'], 'pub_task',$task_info['task_id']);
				db_factory::updatetable ( TABLEPRE . "witkey_order", array ("order_status" => "ok" ), array ("order_id" => "$order_id" ) );
				if ($order_amount < $task_config ['audit_cash']) { 
					$this->set_task_status ( 1 ); 
					return pay_return_fac_class::struct_response ( $_lang['operate_notice'], $_lang['task_pay_success_and_wait_admin_audit'], $url, 'success' );
				} else {
					$this->set_task_status ( 2 ); 
					return pay_return_fac_class::struct_response ( $_lang['operate_notice'], $_lang['task_pay_success_and_task_pub_success'], $url, 'success' );
				}
			} else { 
				$pay_url = $_K ['siteurl'] . "/index.php?do=pay&order_id=$order_id"; 
				return pay_return_fac_class::struct_response ( $_lang['operate_notice'], $_lang['task_pay_error_and_please_repay'], $pay_url, 'warning' );
			}
		}
	}
}