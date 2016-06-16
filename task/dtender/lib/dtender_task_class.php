<?php
keke_lang_class::load_lang_class ( 'dtender_task_class' );
class dtender_task_class extends keke_task_class {
	public $_task_status_arr; 
	public $_work_status_arr; 
	public $_task_url; 
	public $_bid_info; 
	protected $_inited = false;
	public static function get_instance($task_info) {
		static $obj = null;
		if ($obj == null) {
			$obj = new dtender_task_class ( $task_info );
		}
		return $obj;
	}
	public function __construct($task_info) {
		global $_K;
		parent::__construct ( $task_info );
		$this->_task_url = "<a href=\"$_K[siteurl]/index.php?do=task&task_id=$this->_task_id\">$this->_task_title</a>";
		$this->init ();
	}
	public function init() {
		if (! $this->_inited) {
			$this->status_init ();
			$this->bid_init ();
			$this->wiki_priv_init ();
			$this->mark_init ();
		}
		$this->_inited = true;
	}
	public function mark_init() {
		$m = $this->get_mark_count_ext ();
		$t = $this->_task_info;
		$t ['mark'] ['all'] = intval ( $m [1] ['c'] + $m [2] ['c'] );
		$t ['mark'] ['master'] = intval ( $m [2] ['c'] );
		$t ['mark'] ['wiki'] = intval ( $m [1] ['c'] );
		$this->_task_info = $t;
	}
	public function status_init() {
		$this->_task_status_arr = $this->get_task_status ();
		$this->_work_status_arr = $this->get_work_status ();
	}
	public function bid_init() {
		if ($this->_task_status >= 4) {
			$this->_bid_info = db_factory::get_one ( sprintf ( " select *  from %switkey_task_bid where
			 bid_status = '4' and task_id = '%d'", TABLEPRE, $this->_task_id ) );
		} else {
			$this->_bid_info = null;
		}
	}
	public function wiki_priv_init() {
		$arr = dtender_priv_class::get_priv ( $this->_task_id, $this->_model_id, $this->_userinfo );
		$this->_priv = $this->user_priv_format ( $arr );
	}
	public function get_task_timedesc() {
		global $_lang;
		$status_arr = $this->_task_status_arr;
		$task_status = $this->_task_status;
		$task_info = $this->_task_info;
		$time_desc = array ();
		switch ($task_status) {
			case "1" : 
				$time_desc ['ext_desc'] = $_lang ['task_auditing'];
			case "2" : 
				$time_desc ['time_desc'] = $_lang ['from_hand_work_deadline']; 
				$time_desc ['time'] = $task_info ['sub_time']; 
				$time_desc ['ext_desc'] = $_lang ['task_tender_welcome_tender']; 
				if ($this->_task_config ['open_select'] == 'open') { 
					$time_desc ['g_action'] = $_lang ['now_employer_can_choose_work']; 
				}
				break;
			case "3" : 
				$time_desc ['time_desc'] = $_lang ['from_choose_work_deadline']; 
				$time_desc ['time'] = $task_info ['end_time']; 
				$time_desc ['ext_desc'] = $_lang ['task_choose_and_wait_employer_choose']; 
				break;
			case "4" : 
				$time_desc ['time'] = $task_info ['sp_end_time']; 
				$time_desc ['ext_desc'] = $_lang ['task_in_cash_trust_and_wait_employer_trust']; 
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
				$time_desc ['ext_desc'] = $_lang ['task_arbitrating']; 
				break;
		}
		return $time_desc;
	}
	public function bid_hand($quote, $cycle, $area, $work_desc, $plan_amount, $start_time, $end_time, $plan_title, $is_hide = 2, $url = '', $output = 'normal') {
		global $_K;
		global $_lang;
		if ($this->check_bid ()) {
			if ($this->check_if_can_hand ( $url, $output )) {
				$bid_obj = new Keke_witkey_task_bid_class ();
				$bid_obj->_bid_id = null;
				$bid_obj->setTask_id ( $this->_task_id );
				$bid_obj->setUid ( $this->_uid );
				$bid_obj->setUsername ( $this->_username );
				$bid_obj->setBid_status ( 0 );
				$bid_obj->setArea ( $area );
				$bid_obj->setQuote ( $quote );
				$bid_obj->setCycle ( $cycle );
				$bid_obj->setHidden_status ( $is_hide );
				CHARSET == 'gbk' and $work_desc = kekezu::utftogbk ( $work_desc );
				$bid_obj->setMessage ( $work_desc );
				$bid_obj->setBid_time ( time () );
				$bid_id = $bid_obj->create_keke_witkey_task_bid ();
				if ($bid_id) {
					if ($this->_task_info ['task_union'] == '1') {
						$union_obj = new keke_union_class ( $this->_task_id );
						$union_obj->work_hand ( $bid_id );
					}
					$size = sizeof ( $plan_amount );
					for($i = 0; $i < $size; $i ++) {
						$plan_info = array ('plan_amount' => $plan_amount [$i], 'plan_desc' => '', 'plan_step' => $i + 1, 'plan_title' => $plan_title [$i], 'start_time' => strtotime ( $start_time [$i] ), 'end_time' => strtotime ( $end_time [$i] ) );
						$this->plan_add ( $bid_id, $plan_info );
					}
					$this->plus_work_num (); 
					$this->plus_take_num (); 
					$notice_url = $this->_task_url;
					$g_notice = array ($_lang ['user'] => $this->_username, $_lang ['call'] => $_lang ['you'], $_lang ['task_title'] => $notice_url );
					$this->notify_user ( "task_hand", $_lang ['task_tender'], $g_notice ); 
					kekezu::keke_show_msg ( $url, $_lang ['congratulate_you_tender_success'], "", $output );
				} else
					kekezu::keke_show_msg ( $url, $_lang ['sorry_tender_fail'], "error", $output );
			}
		} else {
			kekezu::keke_show_msg ( $url, $_lang ['sorry_you_have_hand_work'], 'error', $output );
		}
	}
	public function check_bid() {
		$count = db_factory::get_count ( sprintf ( "select count(*) from %switkey_task_bid where task_id='%d' and uid='%d'", TABLEPRE, $this->_task_id, $this->_uid ) );
		if (intval ( $count ) == 0) {
			return true;
		} else {
			return false;
		}
	}
	public function bid_edit($bid_id, $quote, $cycle, $area, $work_desc, $plan_amount, $start_time, $end_time, $plan_title, $url = '', $output = 'normal') {
		global $_K;
		global $_lang;
		$bid_id or kekezu::keke_show_msg ( $url, $_lang ['choose_edit_work'], 'error', $output );
		if ($this->_process_can ['work_edit']) {
			$bid_obj = new Keke_witkey_task_bid_class ();
			$bid_obj->setWhere ( 'bid_id=' . $bid_id );
			$bid_obj->setQuote ( $quote );
			$bid_obj->setArea ( $area );
			CHARSET == 'gbk' and $work_desc = kekezu::utftogbk ( $work_desc );
			$bid_obj->setMessage ( $work_desc );
			$bid_obj->setCycle ( $cycle );
			$res = $bid_obj->edit_keke_witkey_task_bid ();
			db_factory::execute ( sprintf ( "delete from %switkey_task_plan where bid_id='%d'", TABLEPRE, $bid_id ) );
			$size = sizeof ( $plan_amount );
			for($i = 0; $i < $size; $i ++) {
				$plan_info = array ('plan_amount' => $plan_amount [$i], 'plan_desc' => '', 'plan_step' => $i + 1, 'plan_title' => $plan_title [$i], 'start_time' => strtotime ( $start_time [$i] ), 'end_time' => strtotime ( $end_time [$i] ) );
				$this->plan_add ( $bid_id, $plan_info );
			}
			kekezu::keke_show_msg ( $url, $_lang ['congratulate_you_edit_success'], "", $output );
		} else {
			kekezu::keke_show_msg ( $url, $_lang ['sorry_now_task_not_allow_edit_work'], 'error', $output );
		}
	}
	public function plan_add($bid_id, $plan_info) {
		$plan_obj = new Keke_witkey_task_plan_class ();
		$plan_obj->setPlan_amount ( $plan_info ['plan_amount'] );
		CHARSET == 'gbk' and $plan_info ['plan_desc'] = kekezu::utftogbk ( $plan_info ['plan_desc'] );
		$plan_obj->setPlan_desc ( $plan_info ['plan_desc'] );
		$plan_obj->setPlan_step ( $plan_info ['plan_step'] );
		CHARSET == 'gbk' and $plan_info ['plan_title'] = kekezu::utftogbk ( $plan_info ['plan_title'] );
		$plan_obj->setPlan_title ( $plan_info ['plan_title'] );
		$plan_obj->setStart_time ( $plan_info ['start_time'] );
		$plan_obj->setEnd_time ( $plan_info ['end_time'] );
		$plan_obj->setBid_id ( $bid_id );
		$plan_obj->setTask_id ( $this->_task_id );
		$plan_obj->setPlan_status ( 0 );
		$plan_obj->_plan_id = null;
		$plan_id = $plan_obj->create_keke_witkey_task_plan ();
		$plan_id and $return = $plan_id or $return = false;
		return $return;
	}
	public function work_choose($bid_id, $to_status, $url = '', $output = 'normal', $trust_response = false) {
		global $kekezu, $_K;
		global $_lang;
		kekezu::check_login ( $url, $output ); 
		$this->check_if_operated ( $bid_id, $to_status, $url, $output ); 
		$status_arr = $this->get_work_status ();
		if ($this->set_bid_status ( $bid_id, $to_status )) {
			if ($to_status == 4) { 
				$this->set_task_status ( 4 ); 
				$this->set_task_sp_end_time ();
				if ($this->_task_info ['task_union'] == '1') {
					$union_obj = new keke_union_class ( $this->_task_id );
					$union_obj->work_choose ( $bid_id );
				}
				$bid_info = $this->get_task_work ( $bid_id ); 
				$url = '<a href ="' . $_K ['siteurl'] . '/index.php?do=task&task_id=' . $this->_task_id . '" target="_blank" >' . $this->_task_title . '</a>';
				$v = array ($_lang ['task_id'] => $this->_task_id, $_lang ['task_title'] => $url );
				$this->notify_user ( "task_bid", $_lang ['tender_bid'], $v, '1', $bid_info ['uid'] ); 
				$kekezu->init_prom ();
				if ($kekezu->_prom_obj->is_meet_requirement ( "bid_task", $this->_task_id )) {
					$kekezu->_prom_obj->create_prom_event ( "bid_task", $bid_info ['uid'], $this->_task_id, $this->_task_info ['real_cash'] );
				}
				$this->plus_accepted_num ( $bid_info ['uid'] );
			}
			kekezu::keke_show_msg ( $url, $_lang ['dtender_tender'] . $status_arr [$to_status] . $_lang ['set_success'], "", $output );
		} else
			kekezu::keke_show_msg ( $url, $_lang ['dtender_tender'] . $status_arr [$to_status] . $_lang ['set_fail'], "error", $output );
	}
	public function check_if_operated($work_id, $to_status, $url = '', $output = 'normal') {
		global $_lang;
		$can_select = false; 
		if ($this->check_if_can_choose ( $url, $output )) { 
			$work_status = db_factory::get_count ( sprintf ( " select bid_status from %switkey_task_bid where bid_id='%d' and uid='%d'", TABLEPRE, $work_id, $this->_uid ) );
			if ($work_status == '8') { 
				kekezu::keke_show_msg ( $url, $_lang ['the_work_is_not_choose_and_not_choose_the_work'], "error", $output );
			} else {
				switch ($to_status) {
					case "4" : 
						$has_bidwork = db_factory::get_count ( sprintf ( " select count(bid_id) from %switkey_task_bid where bid_status='4' and task_id='%d' ", TABLEPRE, $this->_task_id ) );
						if ($has_bidwork) {
							kekezu::keke_show_msg ( $url, $_lang ['task_have_bid_work_and_not_choose_the_work'], "error", $output );
						} else {
							if ($work_status == '7') { 
								kekezu::keke_show_msg ( $url, $_lang ['the_work_is_out_and_not_choose_the_work'], "error", $output );
							} else
								return true;
						}
						break;
					case "7" : 
						switch ($work_status) {
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
	public function hosted_amount($url = '', $output = 'normal') {
		global $_K, $_lang, $kekezu;
		if ($this->_bid_info) {
			$real_cash = floatval ( $this->_task_info ['real_cash'] );
			$quote = floatval ( $this->_bid_info ['quote'] );
			$amount = $real_cash - $quote;
			$exist_id = db_factory::get_count ( sprintf ( "select b.order_id from %switkey_order_detail a left join %switkey_order b on a.order_id=b.order_id left join %switkey_task c on a.obj_id=c.task_id where b.order_status='wait' and a.obj_type='hosted' and c.task_id='%d'", TABLEPRE, TABLEPRE, TABLEPRE, $this->_task_id ) );
			if ($amount >= 0) { 
				$amount > 0 and $res = keke_finance_class::cash_in ( $this->_uid, $amount, '0', 'hosted_return', 0, 'task', $this->_task_id ) or $res = 1;
				$yb_sy = floatval ( $this->_task_info ['credit_cost'] ) - $amount;
				if ($yb_sy >= 0) {
					$credit_cost = floatval ( $this->_task_info ['credit_cost'] ) - $amount; 
					$cash_cost = floatval ( $this->_task_info ['cash_cost'] ); 
				} else {
					$credit_cost = floatval ( $this->_task_info ['credit_cost'] );
					$cash_cost = floatval ( $this->_task_info ['cash_cost'] ) - abs ( $yb_sy );
				}
			} else { 
				$amount = abs ( $amount );
				$balance = floatval ( $this->_g_userinfo ['balance'] );
				$credit = $kekezu->_sys_config ['credit_is_allow'] ? floatval ( $this->_g_userinfo ['credit'] ) : 0;
				if ($balance + $credit - $amount >= 0) { 
					$res = keke_finance_class::cash_out ( $this->_uid, $amount, 'hosted_reward', 0, 'task', $this->_task_id );
					if ($kekezu->_sys_config ['credit_is_allow']) {
						$cash_cost = floatval ( $this->_task_info ['cash_cost'] ) + $amount;
						$credit_cost = floatval ( $this->_task_info ['credit_cost'] );
					} else {
						$g_info = db_factory::get_one ( sprintf ( "select balance,credit from %switkey_space where uid='&d'", TABLEPRE, $this->_guid ) );
						$u_balance = floatval ( $g_info ['balance'] );
						$u_credit = floatval ( $g_info ['credit'] );
						if ($u_credit - $amount >= 0) {
							$credit_cost = floatval ( $this->_task_info ['credit_cost'] ) + $amount;
							$cash_cost = floatval ( $this->_task_info ['cash_cost'] );
						} else {
							$amount_sy = $amount - $u_credit;
							$credit_cost = floatval ( $this->_task_info ['credit_cost'] ) + $u_credit;
							$cash_cost = floatval ( $this->_task_info ['cash_cost'] ) + $amount_sy;
						}
					}
					$order_status = 'ok';
				} else { 
					$order_status = 'wait';
					kekezu::keke_show_msg ( 'index.php?do=user&view=finance&op=recharge&type=hosted&obj_id=' . $this->_task_id . '&cash=' . $pay_cash, sprintf ( $_lang ['online_recharge_notice'], $pay_cash ), '', $output );
				}
				if ($exist_id) {
					$order_status == 'ok' and db_factory::execute ( sprintf ( "update %switkey_order set order_status='ok' where order_id='%d'", TABLEPRE, $exist_id ) );
				} else {
					$order_id = keke_order_class::create_order ( $this->_model_id, '', '', $this->_task_title . $_lang ['jh_task'], $amount, $_lang ['task'] . "$this->_task_url" . $_lang ['reward_cash_trust'], 'ok' );
					$order_id and keke_order_class::create_order_detail ( $order_id, $this->_task_title, 'hosted', $this->_task_id, $amount );
				}
			}
			if ($res || $amount == 0) {
				$this->set_task_status ( 6 );
				db_factory::execute ( sprintf ( "update %switkey_task set task_cash='%d',credit_cost = credit_cost+'%d',cash_cost = cash_cost+'%d' where task_id='%d'", TABLEPRE, floatval ( $this->_bid_info ['quote'] ), $credit_cost, $cash_cost, $this->_task_id ) );
				kekezu::notify_user ( $_lang ['reward_cash_trust_notice'], $_lang ['you_pub_task'] . $notice_url . $_lang ['reward_cash_trust_success'], $this->_guid );
				kekezu::keke_show_msg ( $url, $_lang ['reward_cash_trust_success'], '', $output );
			} else {
				kekezu::keke_show_msg ( $url, $_lang ['reward_cash_trust_fail'], 'error', $output );
			}
		} else {
			kekezu::keke_show_msg ( $url, $_lang ['you_not_choose_and_not_bid_work'], 'error', $output );
		}
	}
	public function plan_complete($plan_id, $plan_step, $url, $output) {
		global $_K;
		global $_lang;
		$plan_ids = $this->get_plan_ids ();
		if (is_array ( $plan_ids ) && in_array ( $plan_id, $plan_ids )) {
			if ($this->set_plan_status ( 1, $plan_id )) {
				$notice_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=task&task_id=" . $this->_task_id . "\">" . $this->_task_title . "</a>";
				kekezu::notify_user ( $_lang ['plan_confirm_pay_notice'], $_lang ['your_task'] . $notice_url . $_lang ['bider_haved_complete'] . $_lang ['state_plan_please_pay_on_time'], $this->_guid, $this->_gusername );
				kekezu::keke_show_msg ( $url, $_lang ['operate_success'], '', $output );
			} else {
				kekezu::keke_show_msg ( $url, $_lang ['operate_fail'], '', $output );
			}
		} else {
			kekezu::keke_show_msg ( $url, $_lang ['the_plan_not_exist'], 'error', $output );
		}
	}
	public function plan_confirm($plan_id, $plan_step, $url, $output) {
		global $_K, $kekezu;
		global $_lang;
		$plan_ids = $this->get_plan_ids ();
		if (is_array ( $plan_ids ) && in_array ( $plan_id, $plan_ids )) {
			$title_url = "<a href=\"" . $_K ['siteurl'] . "/index.php?do=task&task_id=" . $this->_task_id . "\">" . $this->_task_title . "</a>";
			$size = sizeof ( $plan_ids );
			if ($this->plan_cash ( $plan_id, $title_url )) {
				if (intval ( $plan_step ) == $size) {
					$kekezu->init_prom ();
					$kekezu->_prom_obj->dispose_prom_event ( "pub_task", $this->_guid, $this->_task_id );
					$this->set_task_status ( 8 );
					$this->plus_mark_num ();
					if ($this->_task_info ['task_union'] == '1') { 
						$union_obj = new keke_union_class ( $this->_task_id );
						$union_obj->change_status ( 'end' );
					}
					kekezu::notify_user ( $_lang ['task_over_notice'], $_lang ['you_pub_task'] . $title_url . $_lang ['perfect_complete'], $this->_guid );
					keke_user_mark_class::create_mark_log ( $this->_model_code, '1', $this->_bid_info ['uid'], $this->_guid, $this->_bid_info ['bid_id'], $this->_task_info ['task_cash'], $this->_task_id, $this->_bid_info ['username'], $this->_gusername );
					$cash = floatval ( $this->_task_info ['task_cash'] ) * (100 - intval ( $this->_task_info ['profit_rate'] )) / 100;
					keke_user_mark_class::create_mark_log ( $this->_model_code, '2', $this->_guid, $this->_bid_info ['uid'], $this->_bid_info ['bid_id'], $cash, $this->_task_id, $this->_gusername, $this->_bid_info ['username'] );
				}
				kekezu::keke_show_msg ( $url, $_lang ['operate_success'], '', $output );
			} else {
				kekezu::keke_show_msg ( $url, $_lang ['operate_success'], '', $output );
			}
		} else {
			kekezu::keke_show_msg ( $url, $_lang ['the_plan_not_exist'], 'error', $output );
		}
	}
	public function plan_cash($plan_id, $title_url) {
		global $_K, $kekezu;
		global $_lang;
		$plan_info = db_factory::get_one ( sprintf ( "select * from %switkey_task_plan where plan_id='%d'", TABLEPRE, $plan_id ) );
		if ($plan_info && $this->set_plan_status ( 2, $plan_id )) {
			$kekezu->init_prom ();
			$cash = floatval ( $plan_info ['plan_amount'] );
			$profit_cash = $cash * intval ( $this->_task_info ['profit_rate'] ) / 100;
			$real_cash = $cash - $profit_cash;
			$kekezu->_prom_obj->dispose_prom_event ( "bid_task", $plan_info ['uid'], $plan_info ['plan_id'] );
			$bid_info = $this->_bid_info;
			keke_finance_class::cash_in ( $bid_info ['uid'], $real_cash, 0, 'task_bid', '', '', '', $profit_cash );
			kekezu::notify_user ( $_lang ['plan_haved_pay_notice'], $_lang ['on'] . $title_url . $_lang ['tasking_your_di'] . $plan_info ['plan_step'] . $_lang ['plan_get_confirm_and_each_pay'] . $real_cash . $_lang ['yuan'], $this->_bid_info ['uid'], $this->_bid_info ['username'] );
			$feed_arr = array ("feed_username" => array ("content" => $bid_info ['username'], "url" => "index.php?do=space&member_id=" . $bid_info ['uid'] ), "action" => array ("content" => $_lang ['success_bid_haved'], "url" => "" ), "event" => array ("content" => "$this->_task_title", "url" => "index.php?do=task&task_id=" . $this->_task_info ['task_id'], 'cash' => $real_cash ) );
			kekezu::save_feed ( $feed_arr, $bid_info ['uid'], $bid_info ['username'], 'work_accept', $this->_task_info ['task_id'] );
			return true;
		} else {
			return false;
		}
	}
	public function get_plan_ids() {
		$this->_bid_info and $plan_ids = db_factory::query ( sprintf ( "select plan_id from %switkey_task_plan where bid_id='%d'", TABLEPRE, $this->_bid_info ['bid_id'] ) );
		if ($plan_ids) {
			foreach ( $plan_ids as $v ) {
				$return_arr [] = $v ['plan_id'];
			}
			return $return_arr;
		} else {
			return false;
		}
	}
	public function set_plan_status($to_status, $plan_id) {
		return db_factory::execute ( sprintf ( "update %switkey_task_plan set plan_status='%d' where plan_id='%d'", TABLEPRE, $to_status, $plan_id ) );
	}
	public function task_tb_timeout() {
		global $_K;
		global $_lang;
		if ($this->_task_status == 2 && $this->_task_info ['sub_time'] < time ()) { 
			$work_info = $this->get_task_work ();
			if ($work_info) {
				$this->set_task_status ( '3' );
				kekezu::notify_user ( $_lang ['task_bid_timeout_notice'], $_lang ['you_pub_task'] . $this->_task_url . $_lang ['tender_timeout_and_task_in_choose'], $this->_guid, $this->_gusername );
			} else {
				$res = $this->dispose_task_return ();
				$this->set_task_status ( '9' );
				if ($this->_task_info ['task_union'] == '1') { 
					$union_obj = new keke_union_class ( $this->_task_id );
					$union_obj->change_status ( 'failure' );
				}
				kekezu::notify_user ( $_lang ['task_fail_notice'], $_lang ['you_pub_task'] . $this->_task_url . $_lang ['tender_timeout_and_no_people_and_return_cash'] . $res ['return_cash'] . $_lang ['yuan'] . CREDIT_NAME . ":" . $res ['return_credit'], $this->_guid, $this->_gusername );
			}
		}
	}
	public function task_xb_timeout() {
		global $_K;
		global $_lang;
		if ($this->_task_status == 3 && $this->_task_info ['end_time'] < time ()) { 
			$work_info = $this->get_task_work ( '', '4' );
			if ($work_info) {
				$this->set_task_status ( '4' );
				kekezu::notify_user ( $_lang ['task_choose_timeout_notice'], $_lang ['you_pub_task'] . $this->_task_url . $_lang ['choose_timeout_and_task_in_choose'], $this->_guid, $this->_gusername );
			} else {
				$res = $this->dispose_task_return ();
				$this->set_task_status ( '9' );
				if ($this->_task_info ['task_union'] == '1') { 
					$union_obj = new keke_union_class ( $this->_task_id );
					$union_obj->change_status ( 'failure' );
				}
				kekezu::notify_user ( $_lang ['task_fail_notice'], $_lang ['you_pub_task'] . $this->_task_url . $_lang ['bid_timeout_and_you_not_choose_and_return'] . $res ['return_cash'] . $_lang ['yuan'] . CREDIT_NAME . ":" . $res ['return_credit'], $this->_guid, $this->_gusername );
			}
		}
	}
	public function task_tg_timeout() {
		global $_K;
		global $_lang;
		if ($this->_task_status == 4 && ! intval ( $this->_task_info ['task_cash'] ) && $this->_task_info ['sp_end_time'] < time ()) { 
			$res = $this->dispose_task_return ();
			$this->set_task_status ( '9' );
			if ($this->_task_info ['task_union'] == '1') { 
				$union_obj = new keke_union_class ( $this->_task_id );
				$union_obj->change_status ( 'failure' );
			}
			kekezu::notify_user ( $_lang ['task_fail_notice'], $_lang ['you_pub_task'] . $this->_task_url . $_lang ['trust_cash_timeout_and_return'] . $res ['return_cash'] . $_lang ['yuan'] . CREDIT_NAME . ":" . $res ['return_credit'], $this->_guid, $this->_gusername );
		}
	}
	public function dispose_task_return() {
		global $kekezu;
		$config = $this->_task_config;
		$task_info = $this->_task_info;
		$task_cash = $task_info ['real_cash']; 
		$real_cash = $task_info ['real_cash']; 
		$task_info ['task_cash'] and $totle_cash = floatval ( $task_info ['task_cash'] ) or $totle_cash = floatval ( $task_info ['real_cash'] );
		$fail_rate = floatval ( $task_info ['task_fail_rate'] ) / 100;
		$profit = $totle_cash * $fail_rate;
		switch ($config ['defeated']) {
			case '1' : 
				$return_credit = floatval ( $task_info ['credit_cost'] ) * (1 - $fail_rate);
				$return_cash = ($totle_cash - floatval ( $task_info ['credit_cost'] )) * (1 - $fail_rate);
				break;
			case '2' : 
				$return_cash = 0;
				$return_credit = $totle_cash * (1 - $fail_rate);
				break;
		}
		$res = keke_finance_class::cash_in ( $this->_guid, $return_cash, $return_credit, 'task_fail', '', '', '', $profit );
		if ($res) {
			$kekezu->init_prom ();
			$p_event = $kekezu->_prom_obj->get_prom_event ( $this->_task_id, $this->_guid, "pub_task" );
			$kekezu->_prom_obj->set_prom_event_status ( $p_event ['parent_uid'], $this->_gusername, $p_event ['event_id'], '3' );
		}
		return array ('return_credit' => $return_credit, 'return_cash' => $return_cash );
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
						if ($config ['open_select'] == 'open') {
							$process_arr ['work_choose'] = true; 
						}
						$process_arr ['work_comment'] = true; 
						break;
					case "0" : 
						$process_arr ['work_hand'] = true; 
						$process_arr ['work_edit'] = true; 
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
						$process_arr ['task_pay'] = true; 
						break;
					case "0" :
						$process_arr ['task_comment'] = true; 
						$process_arr ['task_report'] = true; 
						break;
				}
				$process_arr ['work_report'] = true; 
				break;
			case "6" : 
				if ($uid == $g_uid) {
					$process_arr ['task_rights'] = true; 
					$process_arr ['plan_confirm'] = true; 
				}
				if ($uid == $this->_bid_info ['uid']) {
					$process_arr ['plan_complete'] = true; 
					$process_arr ['task_rights'] = true; 
				}
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
	public function get_work_info($w = array(), $order = null, $p = array()) {
		global $kekezu, $_K;
		$work_arr = array ();
		$sql = " select * from " . TABLEPRE . "witkey_task_bid a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$count_sql = " select count(a.bid_id) from " . TABLEPRE . "witkey_task_bid a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid";
		$where = " where a.task_id = '$this->_task_id' ";
		if (! empty ( $w )) {
			$w ['bid_id'] and $where .= " and a.bid_id='" . $w ['bid_id'] . "'";
			$w ['user_type'] == 'my' and $where .= " and a.uid = '$this->_uid'";
			isset ( $w ['work_status'] ) and $where .= " and a.bid_status = '" . intval ( $w ['bid_status'] ) . "'";
		}
		$where .= "  order by (CASE WHEN  a.bid_status!=0 THEN 100 ELSE 0 END) desc,bid_time asc ";
		if (! empty ( $p )) {
			$page_obj = $kekezu->_page_obj;
			$page_obj->setAjax ( 1 );
			$page_obj->setAjaxDom ( "gj_summery" );
			$count = intval ( db_factory::get_count ( $count_sql . $where ) );
			$pages = $page_obj->getPages ( $count, $p ['page_size'], $p ['page'], $p ['url'], $p ['anchor'] );
			$where .= $pages ['where'];
		}
		$work_info = db_factory::query ( $sql . $where );
		foreach ( $work_info as $v ) {
			$bid_id_arr [] = $v ['bid_id'];
		}
		is_array ( $bid_id_arr ) and $bid_id_str = implode ( ',', $bid_id_arr );
		$bid_id_str or $bid_id_str = 0;
		$plan_sql = " select * from " . TABLEPRE . "witkey_task_plan where task_id = '$this->_task_id' and bid_id in($bid_id_str) order by plan_step asc  ";
		$plan_info = db_factory::query ( $plan_sql );
		$work_arr ['work_info'] = $work_info;
		$work_arr ['mark'] = $this->has_mark ( $bid_id_str );
		$work_arr ['plan_info'] = $plan_info;
		$work_arr ['pages'] = $pages;
		return $work_arr;
	}
	public function get_single_bid($bid_id) {
		$bid_info = db_factory::get_one ( sprintf ( "select * from %switkey_task_bid where bid_id='%d'", TABLEPRE, $bid_id ) );
		if ($bid_info) {
			$plan_info = db_factory::query ( sprintf ( "select * from %switkey_task_plan where bid_id='%d'", TABLEPRE, $bid_id ) );
			$plan_info or $plan_info = array ();
			return array ('bid_info' => $bid_info, 'plan_info' => $plan_info );
		} else {
			return false;
		}
	}
	public function set_bid_status($bid_id, $to_status) {
		return db_factory::execute ( sprintf ( " update %switkey_task_bid set bid_status='%d' where bid_id='%d'", TABLEPRE, $to_status, $bid_id ) );
	}
	public function set_task_sp_end_time() {
		$sp_end_time = time () + $this->_task_config ['pay_limit_time'] * 24 * 3600;
		return db_factory::execute ( sprintf ( " update %switkey_task set sp_end_time = '%d'", TABLEPRE, $sp_end_time ) );
	}
	public static function get_task_status() {
		global $_lang;
		return array ("0" => $_lang ['task_no_pay'], "1" => $_lang ['task_wait_audit'], "2" => $_lang ['tendering'], "3" => $_lang ['choosing_tender'], "4" => $_lang ['wait_trust'], "6" => $_lang ['jfing'], "7" => $_lang ['freezing'], "8" => $_lang ['task_over'], "9" => $_lang ['haved_fail'], "10" => $_lang ['task_audit_fail'], "11" => $_lang ['arbitrating'] );
	}
	public static function get_work_status() {
		global $_lang;
		return array ('4' => $_lang ['task_bid'], '7' => $_lang ['not_eligibility'], '8' => $_lang ['task_can_not_choose_bid'] );
	}
	public static function get_task_union_status() {
		return array ('0' => "wait", '1' => "audit", '2' => "sub", '3' => "choose", '4' => "vote", '5' => "notice", '6' => 'deliver', '7' => "freeze", '8' => "end", '9' => "failure", '10' => "audit_fail", '11' => "arbitrate" );
	}
	public static function get_work_union_status() {
		return array ('0' => 'wait', '4' => 'bid', '8' => 'no_optional' );
	}
	public static function get_plan_status() {
		global $_lang;
		return array ('0' => $_lang ['wait_complete'], '1' => $_lang ['wait_pay'], '2' => $_lang ['plan_complete'] );
	}
	public function work_hand($work_desc, $file_ids, $hidework = '2', $url = '', $output = 'normal') {
	}
	public function dispose_order($order_id) {
		global $kekezu, $_K;
		global $_lang;
		$task_info = $this->_task_info; 
		$task_status = $this->_task_status;
		$url = $_K ['siteurl'] . '/index.php?do=task&task_id=' . $this->_task_id;
		$order_info = db_factory::get_one ( sprintf ( "select * from %switkey_order where order_id='%d'", TABLEPRE, $order_id ) );
		$order_amount = $order_info ['order_amount'];
		if ($order_info ['order_status'] == 'ok') {
			$task_status == 1 && $notice = $_lang ['task_pay_success_and_wait_admin_audit'];
			$task_status == 2 && $notice = $_lang ['task_pay_success_and_task_pub_success'];
			return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $notice, $url, 'success' );
		} else {
			$balance = floatval ( $this->_g_userinfo ['balance'] );
			$credit = floatval ( $this->_g_userinfo ['credit'] );
			$order_amount = floatval ( $order_info ['order_amount'] );
			$leave_cash = $balance + $credit - $order_amount;
			if ($leave_cash >= 0) {
				$order_type = db_factory::get_count ( sprintf ( "select obj_type from %switkey_order_detail where order_id='%d' and obj_type in('hosted','task') ", TABLEPRE, $order_id ) );
				if ($order_type == 'hosted') {
					$action = 'hosted_margin';
					$to_status = 6;
					$msg = $_lang ['order_pay_success_and_task_cash_trust_succss'];
					kekezu::notify_user ( $_lang ['task_jf_notice'], $_lang ['you_join_task'] . $this->_task_url . $_lang ['employer_trust_cash_success_and_complete_task'], $this->_bid_info ['uid'] );
				} else {
					$action = 'pub_task';
					if ($this->_task_config ['open_select'] == 'close') {
						$to_status = 2;
						$msg = $_lang ['order_pay_success_and_your_task_success'];
					} else {
						$to_status = 1;
						$msg = $_lang ['order_pay_success_and_wait_amin_audit'];
					}
				}
				$res = keke_finance_class::cash_out ( $this->_guid, $order_amount, $action, 0, 'order', order_id );
				if ($res) {
					$kekezu->init_prom ();
					if ($kekezu->_prom_obj->is_meet_requirement ( "pub_task", $this->_task_id )) {
						$kekezu->_prom_obj->create_prom_event ( "pub_task", $this->_guid, $this->_task_id, $this->_task_info ['real_cash'] );
					}
					if ($action == 'pub_task') { 
						$feed_arr = array ("feed_username" => array ("content" => $task_info ['username'], "url" => "index.php?do=space&member_id={$task_info['uid']}" ), "action" => array ("content" => $_lang ['pub_task'], "url" => "" ), "event" => array ("content" => "{$task_info['task_title']}", "url" => "index.php?do=task&task_id={$task_info['task_id']}" ) );
						kekezu::save_feed ( $feed_arr, $task_info ['uid'], $task_info ['username'], 'pub_task', $task_info ['task_id'] );
						$consume = kekezu::get_cash_consume ( $task_info ['task_cash'] );
						db_factory::execute ( sprintf ( " update %switkey_task set cash_cost='%s',credit_cost='%s' where task_id='%d'", TABLEPRE, $consume ['cash'], $consume ['credit'], $this->_task_id ) );
					}
					$this->set_task_status ( $to_status );
					keke_order_class::set_order_status ( $order_id, 'ok' );
					return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['order_pay_success'], $url, 'success' );
				} else { 
					$pay_url = $_K ['siteurl'] . "/index.php?do=pay&order_id=$order_id"; 
					return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_error_and_please_repay'], $url, 'warning' );
				}
			} else { 
				$pay_url = $_K ['siteurl'] . "/index.php?do=pay&order_id=$order_id"; 
				return pay_return_fac_class::struct_response ( $_lang ['operate_notice'], $_lang ['task_pay_error_and_please_repay'], $pay_url, 'warning' );
			}
		}
	}
}