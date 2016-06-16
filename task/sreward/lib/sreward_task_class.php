<?php
keke_lang_class::load_lang_class ( 'sreward_task_class' );
class sreward_task_class extends keke_task_class {
	public $_task_status_arr; 
	public $_work_status_arr; 
	public $_delay_rule; 
	public $_agree_id; 
	protected $_inited = false;
	public static function get_instance($task_info) {
		static $obj = null;
		if ($obj == null) {
			$obj = new sreward_task_class ( $task_info );
		}
		return $obj;
	}
	public function __construct($task_info) {
		parent::__construct ( $task_info );
		$this->_task_status == '6' and $this->_agree_id = db_factory::get_count ( sprintf ( " select agree_id from %switkey_agreement where task_id='%d'", TABLEPRE, $this->_task_id ) );
		$this->init ();
	}
	public function init() {
		if (! $this->_inited) {
			$this->status_init ();
			$this->delay_rule_init ();
			$this->wiki_priv_init ();
			$this->mark_init();
		}
		$this->_inited = true;
	}
	public function mark_init(){
		$m = $this->get_mark_count_ext();
		$t = $this->_task_info;
		$t['mark']['all'] = intval($m[1]['c']+$m[2]['c']);
		$t['mark']['master'] = intval($m[2]['c']);
		$t['mark']['wiki'] = intval($m[1]['c']);
		$this->_task_info  = $t;
	}
	public function status_init() {
		$this->_task_status_arr = $this->get_task_status ();
		$this->_work_status_arr = $this->get_work_status ();
	}
	public function delay_rule_init() {
		$this->_delay_rule = keke_task_config::get_delay_rule ( $this->_model_id, '3600' );
	}
	public function wiki_priv_init() {
		$arr = sreward_priv_class::get_priv ( $this->_task_id, $this->_model_id, $this->_userinfo );
		$this->_priv = $this->user_priv_format ( $arr );
	}
	public function get_task_timedesc() {
		global $_lang;
		$status_arr = $this->_task_status_arr;
		$task_status = $this->_task_status;
		$task_info = $this->_task_info;
		$time_desc = array ();
		switch ($task_status) {
			case "2" : 
				$time_desc ['time_desc'] = $_lang ['from_hand_work_deadline']; 
				$time_desc ['time'] = $task_info ['sub_time']; 
				$time_desc ['ext_desc'] = $_lang ['task_working_can_hand_work']; 
				if ($this->_task_config ['open_select'] == 'open') { 
					$time_desc ['g_action'] = $_lang ['now_employer_can_choose_work']; 
				}
				break;
			case "3" : 
				$time_desc ['time_desc'] = $_lang ['from_choose_deadline']; 
				$time_desc ['time'] = $task_info ['end_time']; 
				$time_desc ['ext_desc'] = $_lang ['task_choosing_wait_employer_choose']; 
				break;
			case "4" : 
				$time_desc ['time_desc'] = $_lang ['from_vote_deadline']; 
				$time_desc ['time'] = $task_info ['sp_end_time']; 
				$time_desc ['ext_desc'] = $_lang ['task_voting_can_vote']; 
				break;
			case "5" : 
				$time_desc ['time_desc'] = $_lang ['from_gs_deadline']; 
				$time_desc ['time'] = $task_info ['sp_end_time']; 
				$time_desc ['ext_desc'] = $_lang ['task_haved_choose_bid_and_user_look']; 
				break;
			case "6" : 
				$time_desc ['ext_desc'] = $_lang ['task_in_jf_rate']; 
				break;
			case "7" : 
				$time_desc ['ext_desc'] = $_lang ['task_diffrent_opnion_and_web_in']; 
				break;
			case "8" : 
				$time_desc ['ext_desc'] = $_lang ['task_haved_complete']; 
				break;
			case "9" : 
				$time_desc ['ext_desc'] = $_lang ['task_timeout_and_no_works_fail']; 
				break;
			case "11" : 
				$time_desc ['ext_desc'] = $_lang ['task_diffrent_opnion_and_web_in']; 
				break;
		}
		return $time_desc;
	}
	public function get_work_info($w = array(), $order = null, $p = array()) {
		global $kekezu, $_K;
		$work_arr = array ();
		$sql = " select a.*,b.seller_credit,b.seller_good_num,b.residency,b.seller_total_num,b.seller_level from " . TABLEPRE . "witkey_task_work a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$count_sql = " select count(a.work_id) from " . TABLEPRE . "witkey_task_work a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$where = " where a.task_id = '$this->_task_id' ";
		if (! empty ( $w )) {
			$w ['work_id'] and $where .= " and a.work_id='" . $w ['work_id'] . "'";
			$w ['user_type'] == 'my' and $where .= " and a.uid = '$this->_uid'";
			isset ( $w ['work_status'] ) and $where .= " and a.work_status = '" . intval ( $w ['work_status'] ) . "'";
		}
		$where .= "   order by (CASE WHEN  a.work_status!=0 THEN work_id ELSE 0 END) desc,work_id asc ";
		if (! empty ( $p )) {
			$page_obj = $kekezu->_page_obj;
			$page_obj->setAjax ( 1 );
			$page_obj->setAjaxDom ( "gj_summery" );
			$count = intval ( db_factory::get_count ( $count_sql . $where ) );
			$pages = $page_obj->getPages ( $count, $p ['page_size'], $p ['page'], $p ['url'], $p ['anchor'] );
			$where .= $pages ['where'];
			$pages ['count'] = $count;
		}
		$work_info = db_factory::query ( $sql . $where );
		$work_info = kekezu::get_arr_by_key ( $work_info, 'work_id' );
		$work_arr ['work_info'] = $work_info;
		$work_arr ['pages'] = $pages;
		$work_arr ['mark'] = $this->has_mark ( implode ( ',', array_keys ( $work_info ) ) );
		return $work_arr;
	}
	public function work_hand($work_desc, $file_ids, $hidework = '2', $url = '', $output = 'normal') {
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
			$work_obj->setWork_title ( $this->_task_title . $_lang ['de_work'] );
			$work_obj->setHide_work ( intval ( $hidework ) );
			CHARSET == 'gbk' and $work_desc = kekezu::utftogbk ( $work_desc );
			$work_obj->setWork_desc ( $work_desc );
			$work_obj->setWork_time ( time () );
			if ($file_ids) { 
				$file_arr = array_unique ( array_filter ( explode ( ',', $file_ids ) ) );
				$f_ids = implode ( ',', $file_arr ); 
				$work_obj->setWork_file ( implode ( ',', $file_arr ) );
			}
			$work_id = $work_obj->create_keke_witkey_task_work ();
			$hidework == '1' and keke_payitem_class::payitem_cost ( "workhide", '1', 'work', 'spend', $work_id, $this->_task_id );
			if ($work_id) {
				if ($this->_task_info ['task_union'] == '1') {
					$union_obj = new keke_union_class ( $this->_task_id );
					$union_obj->work_hand ( $work_id );
				}
				$file_ids and db_factory::execute ( sprintf ( " update %switkey_file set work_id='%d',task_title='%s',obj_id='%d' where file_id in ('%s')", TABLEPRE, $work_id, $this->_task_title, $work_id, $f_ids ) );
				$this->plus_work_num (); 
				$this->plus_take_num (); 
				$notice_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=task&task_id=" . $this->_task_id . "\">" . $this->_task_title . "</a>";
				$g_notice = array ($_lang ['user'] => $this->_username, $_lang ['call'] => $_lang ['you'], $_lang ['task_title'] => $notice_url );
				$this->notify_user ( "task_hand", $_lang ['task_hand'], $g_notice ); 
				kekezu::keke_show_msg ( $url, $_lang ['congratulate_you_hand_work_success'], "", $output );
			} else {
				kekezu::keke_show_msg ( $url, $_lang ['pity_hand_work_fail'], "error", $output );
			}
		}
	}
	public function work_choose($work_id, $to_status, $url = '', $output = 'normal', $trust_response = false) {
		global $kekezu, $_K;
		global $_lang;
		kekezu::check_login ( $url, $output ); 
		$this->check_if_operated ( $work_id, $to_status, $url, $output ); 
		$status_arr = $this->get_work_status ();
		$task_info = $this->_task_info;
		$work_info = $this->get_task_work ( $work_id ); 
		if ($to_status == 4) { 
			if ($this->_task_info ['task_union'] == '1') {
				$union_obj = new keke_union_class ( $this->_task_id );
				$union_obj->work_choose ( $work_id );
			}
			$this->set_task_status ( '5' ); 
			$this->set_task_sp_end_time ();
			$this->plus_accepted_num ( $work_info ['uid'] );
			$kekezu->init_prom ();
			if ($kekezu->_prom_obj->is_meet_requirement ( "bid_task", $this->_task_id )) {
				$kekezu->_prom_obj->create_prom_event ( "bid_task", $work_info ['uid'], $this->_task_id, $this->_task_info ['task_cash'] );
			}
		}
		$res = $this->set_work_status ( $work_id, $to_status );
		$notify_url = '<a href ="' . $_K ['siteurl'] . '/index.php?do=task&task_id=' . $this->_task_id . '" target="_blank" >' . $this->_task_title . '</a>';
		$v = array ($_lang ['action'] => $status_arr [$to_status], $_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $notify_url );
		$this->notify_user ( "task_bid", $_lang ['work'] . $status_arr [$to_status], $v, 1, $work_info ['uid'] ); 
		if ($res) {
			kekezu::keke_show_msg ( $url, $_lang ['work'] . $status_arr [$to_status] . $_lang ['set_success'], "", $output );
		} else {
			kekezu::keke_show_msg ( $url, $_lang ['work'] . $status_arr [$to_status] . $_lang ['set_fail'], "error", $output );
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
						break;
					case "0" : 
						$process_arr ['task_comment'] = true; 
						$process_arr ['task_report'] = true; 
						break;
				}
				$process_arr ['work_report'] = true; 
				break;
			case "4" : 
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
				$uid and $process_arr ['work_vote'] = true; 
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
			case "6" : 
				$process_arr ['task_rights'] = true; 
				if ($uid == $g_uid) {
					$process_arr ['work_rights'] = true; 
				}
				$process_arr ['task_agree'] = true; 
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
		$sp_end_time = time () + $this->_task_config [$time_type] * 24 * 3600;
		return db_factory::execute ( sprintf ( " update %switkey_task set sp_end_time = '%d' where task_id='%d'", TABLEPRE, $sp_end_time, $this->_task_id ) );
	}
	public function set_task_vote($work_id, $url = '', $output = 'normal') {
		global $_lang;
		if ($this->check_if_voted ( $work_id, $url, $output )) {
			$vote_obj = new Keke_witkey_vote_class ();
			$vote_obj->setTask_id ( $this->_task_id );
			$vote_obj->setWork_id ( $work_id );
			$vote_obj->setUid ( $this->_uid );
			$vote_obj->setUsername ( $this->_username );
			$vote_obj->setVote_ip ( kekezu::get_ip () );
			$vote_obj->setVote_time ( time () );
			$vote_id = $vote_obj->create_keke_witkey_vote ();
			if ($vote_id) {
				db_factory::execute ( sprintf ( " update %switkey_task_work set vote_num=vote_num+1 where work_id ='%d'", TABLEPRE, $work_id ) );
				kekezu::keke_show_msg ( $url, $_lang ['vote_success'], "", $output );
			} else {
				kekezu::keke_show_msg ( $url, $_lang ['vote_fail'], "error", $output );
			}
		}
	}
	public function dispose_task_return($trust_response = false) {
		global $kekezu;
		global $_lang;
		$config = $this->_task_config;
		$task_info = $this->_task_info;
		$task_cash = $task_info ['task_cash']; 
		$fail_rate = $this->_fail_rate; 
		$site_profit = $task_cash * $fail_rate / 100; 
		switch ($config ['defeated']) {
			case "2" : 
				$return_cash = '0';
				$return_credit = $task_cash - $site_profit; 
				break;
			case "1" : 
				$cash_cost = $task_info ['cash_cost']; 
				$credit_cost = $task_info ['credit_cost']; 
				if ($cash_cost == $task_cash) { 
					$return_cash = $task_cash - $site_profit;
					$return_credit = '0';
				} elseif ($credit_cost == $task_cash) { 
					$return_cash = '0';
					$return_credit = $task_cash - $site_profit;
				} else {
					$return_cash = $cash_cost * (1 - $fail_rate / 100); 
					$return_credit = $credit_cost * (1 - $fail_rate / 100);
				}
				break;
		}
		$res = keke_finance_class::cash_in ( $this->_guid, $return_cash, floatval ( $return_credit ) + 0, 'task_fail', '', 'task', $this->_task_id, $site_profit );
		if ($res && $this->set_task_status ( 9 )) { 
			$kekezu->init_prom ();
			if ($kekezu->_prom_obj->is_meet_requirement ( "pub_task", $this->_task_id )) {
				$p_event = $kekezu->_prom_obj->get_prom_event ( $this->_task_id, $this->_guid, "pub_task" );
				$kekezu->_prom_obj->set_prom_event_status ( $p_event ['parent_uid'], $this->_gusername, $p_event ['event_id'], '3' );
			}
			if ($this->_task_info ['task_union'] == '1') { 
				$union_obj = new keke_union_class ( $this->_task_id );
				$union_obj->change_status ( 'failure' );
			}
		}
		return $res;
	}
	public function time_hand_end() {
		global $_lang;
		if ($this->_task_status == 2 && $this->_task_info ['sub_time'] < time ()) { 
			if ($this->_task_info ['work_num']) {
				$this->set_task_status ( '3' );
			} else {
				$this->dispose_task_return ();
			}
		}
	}
	public function time_vote_end() {
		global $_K, $kekezu;
		global $_lang;
		if ($this->_task_status == 4 && $this->_task_info ['sp_end_time'] < time ()) { 
			$bid_work = db_factory::get_one ( sprintf ( " select * from %switkey_task_work where work_status=5 and task_id ='%d' order by vote_num desc,work_time desc limit 0,1", TABLEPRE, $this->_task_id ) );
			if ($bid_work ['vote_num'] > 0) { 
				$this->set_task_status ( 5 ); 
				$this->set_work_status ( $bid_work ['work_id'], 4 ); 
				db_factory::execute ( sprintf ( " update %switkey_task set is_auto_bid='1' where task_id='%d'", TABLEPRE, $this->_task_id ) );
				db_factory::execute ( sprintf ( "update %switkey_task_work set work_status = 0 where work_status=5 and task_id='%d'", TABLEPRE, $this->_task_id ) );
				$this->set_task_sp_end_time ( "notice_period" ); 
				$this->plus_accepted_num ( $bid_work ['uid'] ); 
				$kekezu->init_prom ();
				if ($kekezu->_prom_obj->is_meet_requirement ( "bid_task", $this->_task_id )) {
					$kekezu->_prom_obj->create_prom_event ( "bid_task", $bid_work ['uid'], $this->_task_id, $this->_task_info ['task_cash'] );
				}
				$url = '<a href =\"' . $_K ['siteurl'] . '/index.php?do=task&task_id=' . $this->_task_id . '\" target=\"_blank\" >' . $this->_task_title . '</a>';
				$v = array ($_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $url );
				$this->notify_user ( "task_bid", $_lang ['work_vote_bid'], $v, 1, $bid_work ['uid'] ); 
				$feed_arr = array ("feed_username" => array ("content" => $bid_work ['username'], "url" => "index.php?do=space&member_id={$bid_work['uid']}" ), "action" => array ("content" => "成功中标了", "url" => "" ), "event" => array ("content" => "$this->_task_title ", "url" => "index.php?do=task&task_id=$this->_task_id" ) );
				kekezu::save_feed ( $feed_arr, $bid_work ['uid'], $bid_work ['username'], 'work_accept', $this->_task_id );
			} else {
				db_factory::execute ( sprintf ( " update %switkey_task_work set work_status='7' where work_status = '5' and task_id = '%d'", TABLEPRE, $this->_task_id ) );
				switch ($this->_trust_mode) { 
					case "0" : 
						$this->dispose_task_return ();
						break;
					case "1" : 
						$this->set_task_status ( 9 );
						kekezu::notify_user ( $_lang ['task_fail_notice'], $_lang ['your_r'] . $this->_task_id . "投票期无人进行投票、任务已失败、由于是担保任务，请等待管理员解冻任务款项。", $this->_guid );
						break;
				}
			}
		}
	}
	public function time_choose_end() {
		global $kekezu;
		global $_lang;
		if ($this->_task_status == 3 && $this->_task_info ['end_time'] < time ()) { 
			if ($this->_task_info ['work_num'] > 0) { 
				$rw_work = $this->get_task_work ( '', '5' ); 
				$rw_count = intval ( count ( $rw_work ) ); 
				if ($rw_count == '1') { 
					$this->set_work_status ( $rw_work ['0'] ['work_id'], 4 ); 
					$this->plus_accepted_num ( $rw_work ['0'] ['uid'] ); 
					$kekezu->init_prom ();
					if ($kekezu->_prom_obj->is_meet_requirement ( "bid_task", $this->_task_id )) {
						$kekezu->_prom_obj->create_prom_event ( "bid_task", $rw_work ['uid'], $this->_task_id, $this->_task_info ['task_cash'] );
					}
					$this->set_task_status ( 5 ); 
					$this->set_task_sp_end_time ( "notice_period" ); 
					db_factory::execute ( sprintf ( " update %switkey_task set is_auto_bid='1' where task_id='%d'", TABLEPRE, $this->_task_id ) );
					kekezu::notify_user ( $_lang ['task_timeout'], $_lang ['your_task'] . '<a href="index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>' . $_lang ['timeout_sys_default_in_and_bid'], $this->_guid, $this->_gusername );
				} elseif ($rw_count > 1) { 
					$this->set_task_status ( 4 ); 
					$this->set_task_sp_end_time ( "vote_period" ); 
					kekezu::notify_user ( $_lang ['task_timeout'], $_lang ['your_task'] . '<a href="index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>' . $_lang ['timeout_sys_default_vote_status'], $this->_guid, $this->_gusername );
				} else { 
					$this->auto_choose (); 
				}
			} else { 
				$this->dispose_task_return ();
			}
		}
	}
	public function time_notice_end() {
		global $_K;
		global $_lang;
		$work_info = $this->get_task_work ( '', '4' ); 
		$work_info = $work_info ['0'];
		if ($this->_task_status == 5 && time () > $this->_task_info ['sp_end_time']) { 
			if ($this->set_task_status ( 6 )) { 
				if ($this->_task_info ['task_union'] == '1') { 
					$union_obj = new keke_union_class ( $this->_task_id );
					$union_obj->change_status ( 'end' );
				}
				$agree_title = $_lang ['task_jh'] . $this->_task_id . $_lang ['de_jh'] . $work_info ['work_id'] . $_lang ['num_work_jf'];
				$agree_id = keke_task_agreement::create_agreement ( $agree_title, $this->_model_id, $this->_task_id, $work_info ['work_id'], $this->_guid, $work_info ['uid'] );
				$a_url = '<a href="' . $_K ['siteurl'] . '/index.php?do=agreement&agree_id=' . $agree_id . '">' . $agree_title . '</a>';
				$notice = $_lang ['task_in_jf_stage'];
				$s_arr = array ($_lang ['agreement_link'] => $a_url, $_lang ['agreement_status'] => $notice );
				$b_arr = array ($_lang ['agreement_link'] => $a_url, $_lang ['agreement_status'] => $notice );
				$this->notify_user ( "agreement", $_lang ['task_in_jf_stage'], $s_arr, 1, $work_info ['uid'] ); 
				$this->notify_user ( "agreement", $_lang ['task_in_jf_stage'], $b_arr, 2, $this->_guid ); 
			}
		}
	}
	public function auto_choose() {
		global $_K, $kekezu;
		global $_lang;
		$has_operated = db_factory::get_count ( sprintf ( " select count(work_id) from %switkey_task_work where work_status>0 and task_id ='%d'", TABLEPRE, $this->_task_id ) );
		if ($has_operated) {
			$this->dispose_task_return (); 
		} else {
			switch ($this->_task_config ['end_action']) { 
				case "refund" : 
					$this->dispose_task_return ();
					break;
				case "split" : 
					$task_info = $this->_task_info;
					$split_num = intval ( $this->_task_config ['witkey_num'] ); 
					$single_cash = number_format ( $task_info ['task_cash'] / $split_num, 2 ); 
					if ($split_num) {
						$kekezu->init_prom ();
						$prom_obj = $kekezu->_prom_obj;
						$site_profit = $single_cash * $this->_profit_rate / 100; 
						$cash = $single_cash - $site_profit; 
						$sql = "select a.*,b.oauth_id from %switkey_task_work a left join %switkey_member_oauth b on a.uid=b.uid
								where a.task_id='%d' and a.work_status='0' order by a.work_time desc limit 0,%d";
						$work_list = db_factory::query ( sprintf ( $sql, TABLEPRE, TABLEPRE, $this->_task_id, $split_num ) );
						$key = array_keys ( $work_list );
						$count = sizeof ( $key );
						for($i = 0; $i < $count; $i ++) {
							keke_finance_class::cash_in ( $work_list [$i] ['uid'], $cash, 0, 'task_bid', '', 'task', $work_list [$i] ['work_id'], $site_profit );
							$this->set_work_status ( $work_list [$i] ['work_id'], 4 );
							if ($prom_obj->is_meet_requirement ( "bid_task", $this->_task_id )) {
								$prom_obj->create_prom_event ( "bid_task", $work_list [$i] ['uid'], $this->_task_id, $single_cash );
								$prom_obj->dispose_prom_event ( "bid_task", $work_list [$i] ['uid'], $work_list [$i] ['work_id'] );
							}
							$url = '<a href ="' . $_K ['siteurl'] . '/index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>';
							$v = array ($_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $url );
							$this->notify_user ( "auto_choose", $_lang ['task_auto_choose_bid'], $v, 1, $work_list [$i] ['uid'] ); 
							keke_user_mark_class::create_mark_log ( $this->_model_code, '1', $work_list [$i] ['uid'], $this->_guid, $work_list [$i] ['work_id'], $single_cash, $this->_task_id, $work_list [$i] ['username'], $this->_gusername );
							keke_user_mark_class::create_mark_log ( $this->_model_code, '2', $this->_guid, $work_list [$i] ['uid'], $work_list [$i] ['work_id'], $cash, $this->_task_id, $this->_gusername, $work_list [$i] ['username'] );
							$this->plus_mark_num ();
						}
						if ($split_num > $count) { 
							$remain_cash = $task_info ['task_cash'] - $count * $single_cash; 
							$res = $this->dispose_auto_return ( $remain_cash );
							if ($res) {
								$v = array ($_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $url );
								$this->notify_user ( "auto_choose", $_lang ['task_auto_choose_work_and_return'], $v, 2, $this->_guid ); 
							}
						}
						$prom_obj->dispose_prom_event ( "pub_task", $this->_guid, $this->_task_id );
					} else {
						$this->dispose_task_return (); 
					}
					break;
			}
		}
		$this->set_task_status ( 8 );
		if ($this->_task_info ['task_union'] == '1') { 
			$union_obj = new keke_union_class ( $this->_task_id );
			$union_obj->change_status ( 'end' );
		}
		kekezu::notify_user ( $_lang ['aito_choose_work_notice'], $_lang ['your_r'] . $this->_task_id . $_lang ['task_timeout_and_sys_auto_choose_work'], $this->_guid );
	}
	public function dispose_auto_return($remain_cash) {
		global $kekezu;
		$config = $this->_task_config;
		$task_info = $this->_task_info;
		$fail_rate = $this->_fail_rate; 
		$site_profit = $remain_cash * $fail_rate / 100; 
		switch ($config ['defeated']) {
			case "2" : 
				$return_cash = '0';
				$return_credit = $remain_cash - $site_profit; 
				break;
			case "1" : 
				$return_credit = '0';
				$return_cash = $remain_cash - $site_profit; 
				break;
		}
		return keke_finance_class::cash_in ( $this->_guid, $return_cash, floatval ( $return_credit ) + 0, 'task_auto_return', '', 'task', $this->_task_id, $site_profit );
	}
	public function check_if_operated($work_id, $to_status, $url = '', $output = 'normal') {
		global $_lang;
		$can_select = false; 
		if ($this->check_if_can_choose ( $url, $output )) { 
			$work_status = db_factory::get_count ( sprintf ( " select work_status from %switkey_task_work where work_id='%d'
					 and uid='%d'", TABLEPRE, $work_id, $this->_uid ) );
			if ($work_status == '8') { 
				kekezu::keke_show_msg ( $url, $_lang ['the_work_is_not_choose_and_not_choose_the_work'], "error", $output );
			} else {
				switch ($to_status) {
					case "4" : 
						$has_bidwork = db_factory::get_count ( sprintf ( " select count(work_id) from %switkey_task_work where work_status='4' and task_id = '%d' ", TABLEPRE, $this->_task_id ) );
						if ($has_bidwork) {
							kekezu::keke_show_msg ( $url, $_lang ['task_have_bid_work_and_not_choose_the_work'], "error", $output );
						} else {
							if ($work_status == '7') { 
								kekezu::keke_show_msg ( $url, $_lang ['the_work_is_out_and_not_choose_the_work'], "error", $output );
							} else {
								return true;
							}
						}
						break;
					case "5" : 
						switch ($work_status) {
							case "4" :
								kekezu::keke_show_msg ( $url, $_lang ['the_work_haved_bid_and_not_change_stutus_to_in'], "error", $output );
								break;
							case "5" :
								kekezu::keke_show_msg ( $url, $_lang ['the_work_haved_in_and_not_repeat'], "error", $output );
								break;
							case "7" :
								kekezu::keke_show_msg ( $url, $_lang ['the_work_is_bid_and_not_change_status_to_in'], "error", $output );
								break;
						}
						return true;
						break;
					case "7" : 
						switch ($work_status) {
							case "4" :
								kekezu::keke_show_msg ( $url, $_lang ['the_work_is_bid_and_not_change_status'], "error", $output );
								break;
							case "7" :
								kekezu::keke_show_msg ( $url, $_lang ['the_work_is_out_and_not_repeat'], "error", $output );
								break;
						}
						return true;
						break;
				}
			}
		} else { 
			kekezu::keke_show_msg ( $url, $_lang ['now_status_can_not_choose'], "error", $output );
		}
	}
	public function check_start_vote($url = '', $output = 'normal') {
		global $_lang;
		if ($this->_uid != $this->_guid) { 
			kekezu::keke_show_msg ( $url, $_lang ['start_vote_fail_and_employer_can_vote'], "error", $output );
		} else {
			if (! $this->_process_can ['task_vote']) {
				kekezu::keke_show_msg ( $url, $_lang ['work_num_limit_notice'], "error", $output );
			} else {
				return true;
			}
		}
	}
	public function check_if_voted($work_id, $url = '', $output = 'normal') {
		global $_lang;
		$vote_count = db_factory::get_count ( sprintf ( " select count(vote_id) from %switkey_vote where
		 work_id='%d' and uid='%d' and vote_ip='%s'", TABLEPRE, $work_id, $this->_uid, kekezu::get_ip () ) );
		if ($vote_count > 0) {
			kekezu::keke_show_msg ( $url, $_lang ['you_have_vote'], "error", $output );
		} else {
			return true;
		}
	}
	public static function get_task_status() {
		global $_lang;
		return array ("0" => $_lang ['task_no_pay'], "1" => $_lang ['task_wait_audit'], "2" => $_lang ['task_vote_choose'], "3" => $_lang ['task_choose_work'], "4" => $_lang ['task_vote'], "5" => $_lang ['task_gs'], "6" => "交付", "7" => $_lang ['freeze'], "8" => $_lang ['task_over'], "9" => $_lang ['fail'], "10" => $_lang ['task_audit_fail'], "11" => $_lang ['arbitrate'], '12' => $_lang ['assure_return_cash'], '13' => $_lang ['agreement_frozen'] );
	}
	public static function get_work_status() {
		global $_lang;
		return array ('4' => $_lang ['task_bid'], '5' => $_lang ['task_in'], '7' => $_lang ['task_out'], '8' => $_lang ['task_can_not_choose_bid'] );
	}
	public static function get_task_union_status() {
		return array ('0' => "wait", '1' => "audit", '2' => "sub", '3' => "choose", '4' => "vote", '5' => "notice", '6' => 'deliver', '7' => "freeze", '8' => "end", '9' => "failure", '10' => "audit_fail", '11' => "arbitrate" );
	}
	public static function get_work_union_status() {
		return array ('0' => 'wait', '4' => 'bid', '5' => 'finalist', '7' => 'not_adopted', '8' => 'no_optional' );
	}
	public function dispose_order($order_id) {
		global $kekezu, $_K;
		global $_lang;
		$response = array ();
		$task_config = $this->_task_config;
		$task_info = $this->_task_info; 
		$url = $_K ['siteurl'] . '/index.php?do=task&task_id=' . $this->_task_id;
		$task_status = $this->_task_status;
		$order_info = db_factory::get_one ( sprintf ( "select order_amount,order_status from %switkey_order where order_id='%d'", TABLEPRE, intval ( $order_id ) ) );
		$order_amount = $order_info ['order_amount'];
		if ($order_info ['order_status'] == 'ok') {
			$task_status == 1 && $notice = $_lang ['task_pay_success_and_wait_admin_audit'];
			$task_status == 2 && $notice = $_lang ['task_pay_success_and_task_pub_success'];
			return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $notice, $url, 'success' );
		} else {
			$res = keke_finance_class::cash_out ( $task_info ['uid'], $order_amount, 'pub_task' ); 
			switch ($res == true) {
				case "1" : 
					$kekezu->init_prom ();
					if ($kekezu->_prom_obj->is_meet_requirement ( "pub_task", $this->_task_id )) {
						$kekezu->_prom_obj->create_prom_event ( "pub_task", $this->_guid, $task_info ['task_id'], $task_info ['task_cash'] );
					} 
					db_factory::updatetable ( TABLEPRE . "witkey_order", array ("order_status" => "ok" ), array ("order_id" => "$order_id" ) );
					$consume = kekezu::get_cash_consume($task_info['task_cash']);
					db_factory::execute(sprintf(" update %switkey_task set cash_cost='%s',credit_cost='%s' where task_id='%d'",TABLEPRE,$consume['cash'],$consume['credit'],$this->_task_id));
					$feed_arr = array ("feed_username" => array ("content" => $task_info ['username'], "url" => "index.php?do=space&member_id={$task_info['uid']}" ), "action" => array ("content" => $_lang ['pub_task'], "url" => "" ), "event" => array ("content" => "{$task_info['task_title']}", "url" => "index.php?do=task&task_id={$task_info['task_id']}" ) );
					kekezu::save_feed ( $feed_arr, $task_info ['uid'], $task_info ['username'], 'pub_task', $task_info ['task_id'] );
					if ($order_amount < $task_config ['audit_cash'] && ! $this->_trust_mode) { 
						$this->set_task_status ( 1 ); 
						return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_success_and_wait_admin_audit'], $url, 'success' );
					} else {
						$this->set_task_status ( 2 ); 
						return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_success_and_task_pub_success'], $url, 'success' );
					}
					break;
				case "0" : 
					$pay_url = $_K ['siteurl'] . "/index.php?do=pay&order_id=$order_id"; 
					return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_error_and_please_repay'], $pay_url, 'warning' );
					break;
			}
		}
	}
}