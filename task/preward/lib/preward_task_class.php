<?php
keke_lang_class::load_lang_class ( 'preward_task_class' );
class preward_task_class extends keke_task_class {
	public $_task_status_arr; 
	public $_work_status_arr; 
	public $_delay_rule; 
	public $_union_obj; 
	protected $_inited = false;
	public static function get_instance($task_info) {
		static $obj = null;
		if ($obj == null) {
			$obj = new preward_task_class ( $task_info );
		}
		return $obj;
	}
	public function __construct($task_info) {
		parent::__construct ( $task_info );
		$this->init ();
	}
	public function init() {
		if (! $this->_inited) {
			$this->status_init ();
			$this->task_requirement_init ();
			$this->delay_rule_init ();
			$this->wiki_priv_init ();
			$this->init_union ();
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
	function init_union() {
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
		$arr = preward_priv_class::get_priv ( $this->_task_id, $this->_model_id, $this->_userinfo );
		$this->_priv = $this->user_priv_format ( $arr );
	}
	public function task_requirement_init() {
	}
	public function get_task_timedesc() {
		global $_lang;
		$status_arr = $this->_task_status_arr;
		$task_status = $this->_task_status;
		$task_info = $this->_task_info;
		$time_desc = array ();
		switch ($task_status) {
			case '2' : 
				$time_desc ['time_desc'] = $_lang['from_hand_work_deadline']; 
				$time_desc ['time'] = $task_info ['sub_time']; 
				$time_desc ['ext_desc'] = $_lang['task_working_and_can_hand_work'];
				if ($this->_task_config ['open_select'] == 'open') {
					$time_desc ['g_action'] = $_lang['present_state_employer_can_choose'];
				}
				break;
			case '3' : 
				$time_desc ['time_desc'] = $_lang['from_choose_deadline']; 
				$time_desc ['time'] = $task_info ['end_time'];
				$time_desc ['ext_desc'] = $_lang['task_choosing_and_wait_employer_choose'];
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
		$where .= " order by (CASE WHEN  a.work_status!=0 THEN 100 ELSE 0 END) desc,";
		if (! empty ( $order )) {
			$where .= $order;
		} else {
			$where .= ",work_time asc ";
		}
		if (! empty ( $p )) {
			$page_obj = $kekezu->_page_obj;
			$page_obj->setAjax ( 1 );
			$page_obj->setAjaxDom ( "gj_summery" );
			$count = intval ( db_factory::get_count ( $count_sql . $where ) );
			$pages = $page_obj->getPages ( $count, $p ['page_size'], $p ['page'], $p ['url'], $p ['anchor'] );
			$pages ['count'] = $count;
			$where .= $pages ['where'];
		}
		$work_info = db_factory::query ( $sql . $where );
		$work_info = kekezu::get_arr_by_key($work_info,'work_id');
		$work_arr ['work_info'] = $work_info;
		$work_arr ['pages'] = $pages;
		$work_arr ['mark']  = $this->has_mark(implode(',',array_keys($work_info)));
		return $work_arr;
	}
	public function get_work_count($where) {
		if ($where == 'max') {
			$work_count = intval ( $this->_task_info ['work_count'] );
			$count = $work_count * (1 + intval ( $this->_task_config ['work_percent'] ) / 100);
		} else {
			$count = db_factory::get_count ( sprintf ( "select count(work_id) from %switkey_task_work where %s and task_id='%d'", TABLEPRE, $where, $this->_task_id ) );
		}
		return intval ( $count );
	}
	public function check_work_if_standard($type) {
		$work_count = intval ( $this->_task_info ['work_count'] ); 
		if ($type == 'hand') {
			$totle_count = $this->get_work_count ( "max" );
			$hand_count = $this->get_work_count ( "work_status in(0,6)" );
			if ($hand_count < $totle_count) {
				return true; 
			} else {
				return false;
			}
		} elseif ($type == 'hege') {
			$hege_count = $this->get_work_count ( "work_status=6" );
			if ($work_count > $hege_count) {
				return true;
			} else {
				return false;
			}
		}
	}
	public function work_hand($work_desc, $file_ids, $hidework = '2', $url = '', $output = 'normal') {
		global $_lang;
		global $_K;
		if ($this->check_if_can_hand ( $url, $output )) {
			if ($this->check_work_if_standard ( 'hand' )) {
				$work_obj = new Keke_witkey_task_work_class ();
				$work_obj->setHide_work ( $hidework );
				$work_obj->setTask_id ( $this->_task_id );
				$work_obj->setUid ( $this->_uid );
				$work_obj->setUsername ( $this->_username );
				CHARSET == 'gbk' and $work_desc = kekezu::utftogbk ( $work_desc );
				$work_obj->setWork_desc ( $work_desc );
				$work_obj->setWork_status ( 0 );
				$work_obj->setWork_title ( $this->_task_title );
				$work_obj->setWork_time ( time () );
				if ($file_ids) {
					$file_arr = array_unique ( array_filter ( explode ( ',', $file_ids ) ) );
					$f_ids = implode ( ',', $file_arr );
					$work_obj->setWork_file ( $f_ids );
				}
				$work_id = $work_obj->create_keke_witkey_task_work ();
				if ($work_id) {
					$f_ids and db_factory::execute ( sprintf ( "update %switkey_file set work_id='%d',task_title='%s',obj_id='%d' where file_id in ('%s')", TABLEPRE, $work_id, $this->_task_title, $work_id, $f_ids ) );
					$this->plus_work_num ();
					$this->plus_take_num ();
					$notice_url = "<a href=\"$_K[siteurl]/index.php?do=task&task_id={$this->_task_id}\">$this->_task_title</a>";
					$g_notice = array ($_lang['user'] => $this->_username, $_lang['call'] => $_lang['you'], $_lang['task_title'] => $notice_url ); 
					$this->notify_user ( 'task_hand', $_lang['task_hand'], $g_notice, '2', $this->_gusername );
					$this->_task_info['task_union'] > 0 and $res = $this->_union_obj->work_hand ( $work_id ); 
					kekezu::keke_show_msg ( $url, $_lang['congratulate_you_hand_work_success'], '', $output );
				} else {
					kekezu::keke_show_msg ( $url, $_lang['hand_work_fail_and_operate_agian'], 'error', $output );
				}
			} else {
				kekezu::keke_show_msg ( $url, $_lang['hand_work_fail_for_the_work_full'], 'error', $output );
			}
		}
	}
	public function work_choose($work_id, $to_status, $url = '', $output = 'normal', $trust_response = false) {
		global $_K, $kekezu;
		global $_lang;
		kekezu::check_login ( $_K ['siteurl'] . '/index.php?do=login', $output );
		$this->check_if_operated ( $work_id, $to_status, $url, $output );
		$work_status_arr = $this->_work_status_arr;
		if ($this->set_work_status ( $work_id, $to_status )) {
			$title_url = "<a href =" . $_K['siteurl'] . "/index.php?do=task&task_id=" . $this->_task_id . " target=\"_blank\">" . $this->_task_title . "</a>";
			$work_info = $this->get_task_work ( $work_id );
			if ($to_status == 6) {
				$this->work_choosed ( $work_info, $title_url );
				$this->_task_info['task_union'] > 0 and $this->_union_obj->work_choose ( $work_id, $to_status );
				if (! $this->check_work_if_standard ( 'hege' )) {
					if ($this->set_task_status ( 8 )) {
						$this->_task_info['task_union'] > 0 and $this->_union_obj->change_status (); 
						$kekezu->init_prom ();
						$kekezu->_prom_obj->dispose_prom_event ( "pub_task", $this->_guid, $this->_task_id );
						kekezu::notify_user ( $_lang['task_over_notice'], $_lang['you_pub_task'] . $title_url . $_lang['haved_pefect_over'], $this->_guid, $this->_gusername );
					}
				}
			} elseif ($to_status == 7) {
				kekezu::notify_user ( $_lang['work_no_recept'], $_lang['you_submit_to'] . $title_url . $_lang['task_work_no_recept_to_employer'], $work_info ['uid'], $work_info ['username'] );
			}
			kekezu::keke_show_msg ( $url, $_lang['work'] . $work_status_arr [$to_status] . $_lang['set_success'], '', $output );
		} else {
			kekezu::keke_show_msg ( $url, $_lang['work'] . $work_status_arr [$to_status] . $_lang['set_fail'], 'error', $output );
		}
	}
	public function work_choosed($work_info, $title_url) {
		global $_K, $kekezu;
		global $_lang;
		$kekezu->init_prom ();
		$single_cash = floatval ( $this->_task_info ['single_cash'] );
		$profit_cash = $single_cash * intval ($this->_task_info ['profit_rate']) / 100;
		$real_cash = $single_cash * (1 - intval ( $this->_task_info ['profit_rate'] ) / 100);
		keke_finance_class::cash_in ( $work_info ['uid'], $real_cash, 0, 'task_bid', '', '', '', $profit_cash );
		$url = '<a href ="' . $_K['siteurl'] . '/index.php?do=task&task_id=' . $this->_task_id . '">' . $this->_task_title . '</a>';
		$v = array ($_lang['username'] => $work_info ['username'], $_lang['website_name'] => $kekezu->_sys_config['website_name'], $_lang['task_id'] => "#" . $this->_task_id, $_lang['task_title'] => $url );
		$this->notify_user ( "task_bid", $_lang['work_bid'], $v, '1', $work_info ['uid'] );
		kekezu::notify_user ( $_lang['work_bid'], $_lang['you_submit_to'] . $title_url . $_lang['task_work_bid_and_get_cash'] . $real_cash . $_lang['yuan'], $work_info ['uid'] );
		$feed_arr = array ("feed_username" => array ("content" => $work_info ['username'], "url" => "index.php?do=space&member_id=$work_info[uid]" ), "action" => array ("content" => $_lang['success_bid_haved'], "url" => "" ), "event" => array ("content" => "$this->_task_title", "url" => "index.php?do=task&task_id=$this->_task_id",'cash'=>$real_cash) );
		kekezu::save_feed ( $feed_arr, $work_info ['uid'], $work_info ['username'], 'work_accept', $this->_task_id );
		$this->plus_accepted_num ( $work_info ['uid'] );
		$this->plus_mark_num (); 
		if ($kekezu->_prom_obj->is_meet_requirement ( "bid_task", $this->_task_id )) {
			$kekezu->_prom_obj->create_prom_event ( "bid_task", $work_info ['uid'], $this->_task_id, $single_cash );
			$kekezu->_prom_obj->dispose_prom_event ( "bid_task", $work_info ['uid'], $work_info ['work_id'] );
		}
		keke_user_mark_class::create_mark_log ( $this->_model_code, '1', $work_info ['uid'], $this->_guid, $work_info ['work_id'], $this->_task_info ['single_cash'], $this->_task_id, $work_info ['username'], $this->_gusername );
		keke_user_mark_class::create_mark_log ( $this->_model_code, '2', $this->_guid, $work_info ['uid'], $work_info ['work_id'], $real_cash, $this->_task_id, $this->_gusername, $work_info ['username'] );
	}
	public function work_cancel($work_id, $url, $output) {
		global $_K;
		global $_lang;
		$this->_task_status == '8' and kekezu::keke_show_msg ( $url, $_lang['present_task_status_not_cancel_bid'], 'error', $output );
		$work_info = $this->get_task_work ( $work_id );
		$work_info['work_status'] != '6' and kekezu::keke_show_msg ( $url, $_lang['present_work_not_bid_and_not_cancel_bid'], 'error', $output );
		$this->_userinfo ['group_id'] != 7 and kekezu::keke_show_msg ( $url, $_lang['you_not_rights_operate_to_the_work'], 'error', $output );
		if ($this->set_work_status ( $work_id, 0 )) {
			$cash = floatval ( $this->_task_info['single_cash'] ) * floatval ( $this->_task_info ['profit_rate'] );
			keke_finance_class::cash_out ( $work_info ['uid'], $cash, 0, 'sdfsd' );
			$task_url = "<a href=\"{$_K[siteurl]}/index.php?do=task&task_id=$this->_task_id\">$this->_task_title</a>";
			kekezu::notify_user ( $_lang['cancel_bid_notice'], $_lang['you_in_task'] . $task_url . $_lang['de_hand_work_jh'] . $work_id . $_lang['by_site_kf_cancel_bid'], $work_info['uid'] );
			kekezu::keke_show_msg ( $url, $_lang['work_cancel_bid_set_success'], '', $output );
		} else {
			kekezu::keke_show_msg ( $url, $_lang['work_cancel_bid_set_fail'], 'error', $output );
		}
	}
	public function check_if_operated($work_id, $to_status, $url = '', $output = 'normal') {
		global $_lang;
		if ($this->check_if_can_choose ( $url, $output )) {
			$work_status = db_factory::get_count ( sprintf ( "select work_status from %switkey_task_work where work_id='%d'", TABLEPRE, $work_id ) );
			switch (intval ( $work_status )) {
				case 0 :
					if ($to_status == 6) {
						if ($this->check_work_if_standard ( 'hege' )) {
							return true;
						} else {
							kekezu::keke_show_msg ( $url, $_lang['task_hg_work_full_and_not_operate_bid_work'], 'error', $output );
						}
					} else {
						return true;
					}
					break;
				case 6 :
					kekezu::keke_show_msg ( $url, $_lang['task_bid_work_full_and_not_operate_choose_work'], 'error', $output );
					break;
				case 7 :
					kekezu::keke_show_msg ( $url, $_lang['task_not_recept_work_full_and_not_operate_choose_work'], 'error', $output );
					break;
				case 8 :
					kekezu::keke_show_msg ( $url, $_lang['task_not_operate_work_and_not_operate_choose_work'], 'error', $output );
					break;
			}
		} else {
			kekezu::keke_show_msg ( $url, $_lang['now_status_can_not_choose'], "error", $output );
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
		switch ($status) {
			case '2' : 
				if ($uid == $g_uid) {
					$process_arr ['reqedit'] = true; 
					sizeof ( $this->_delay_rule ) > 0 and $process_arr ['delay'] = true; 
					if ($config ['open_select'] == 'open' && $this->check_work_if_standard ( 'hege' )) {
						$process_arr ['work_choose'] = true; 
					}
					$process_arr ['work_comment'] = true; 
				} else {
					$process_arr ['work_hand'] = true; 
					$process_arr ['task_comment'] = true; 
					$process_arr ['task_report'] = true; 
				}
				$process_arr ['work_report'] = true; 
				$process_arr ['work_cancel'] = true; 
				break;
			case '3' : 
				if ($uid == $g_uid) {
					if ($this->check_work_if_standard ( 'hege' )) {
						$process_arr ['work_choose'] = true;
					}
					$process_arr ['work_comment'] = true; 
				} else {
					$process_arr ['task_comment'] = true;
					$process_arr ['task_report'] = true;
				}
				$process_arr ['work_report'] = true;
				$process_arr ['work_cancel'] = true; 
				break;
			case '8' : 
				if ($uid == $g_uid) {
					$process_arr ['work_comment'] = true; 
				} else {
					$process_arr ['task_comment'] = true;
				}
				break;
		}
		$process_arr ['work_mark'] = true; 
		$process_arr ['task_mark'] = true; 
		$uid != $g_uid and $process_arr ['task_complaint'] = true; 
		$process_arr ['work_complaint'] = true; 
		$this->_process_can = $process_arr;
		return $process_arr;
	}
	public function dispose_task_return($action) {
		$uid = $this->_uid;
		$prom_obj = $kekezu->_prom_obj;
		$refund_type = $this->_task_config ['defeated']; 
		$task_cash = floatval ( $this->_task_info ['task_cash'] ); 
		$refund_rate = floatval ( $this->_task_info ['task_fail_rate'] ) / 100; 
		$hege_count = $this->get_work_count ( "work_status=6" );
		$hege_count and $use_cash = floatval ( $this->_task_info['single_cash'] ) * $hege_count;
		$work_count = intval ( $this->_task_info ['work_count'] ); 
		switch ($refund_type) {
			case '1' : 
				$credit = floatval ( $this->_task_info ['credit_cost'] ); 
				$cash = floatval ( $this->_task_info ['cash_cost'] ); 
				if ($hege_count > 0) { 
					$sy = $credit - $use_cash;
					if ($sy >= 0) {
						$refund_credit = $sy;
						$refund_cash = $cash;
					} else {
						$refund_credit = $credit;
						$refund_cash = $cash - abs ( $sy );
					}
				} else { 
					$refund_cash = $cash;
					$refund_credit = $credit;
				}
				break;
			case '2' : 
				$refund_cash = 0;
				if ($hege_count) {
					$refund_credit = $task_cash - $use_cash;
				} else {
					$refund_credit = $task_cash;
				}
				break;
		}
		$ref_cash = $refund_cash * (1 - $refund_rate);
		$ref_credit = $refund_credit * (1 - $refund_rate);
		keke_finance_class::cash_in ( $this->_guid, $ref_cash, $ref_credit, $action, '', '', '', ($refund_cash + $refund_credit) * $refund_rate );
		return array ('refund_cash' => $refund_cash, 'refund_credit' => $refund_credit );
	}
	public function task_jg_timeout() {
		global $_K, $kekezu;
		global $_lang;
		$prom_obj = $this->_prom_obj;
		if ($this->_task_status == '2') {
			if (time () > intval ( $this->_task_info ['sub_time'] )) {
				$task_url = "<a href=\"$_K[siteurl]/index.php?do=task&task_id=$this->_task_id\">$this->_task_title</a>";
				if (intval ( $this->_task_info ['work_num'] ) > 0) { 
					if ($this->set_task_status ( 3 )) {
						kekezu::notify_user ( $_lang['task_timeout_notice'], $_lang['you_pub_task'] . $task_url . $_lang['hand_work_timeout_and_choose'], $this->_guid, $this->_gusername );
					}
				} else {
					if ($this->set_task_status ( 9 )) { 
						$this->_task_info['task_union'] > 0 and $this->_union_obj->change_status ( 'failure' );
						$refund = $this->dispose_task_return ( 'task_fail' );
						$kekezu->init_prom ();
						$p_event = $kekezu->_prom_obj->get_prom_event ( $this->_task_id, $this->_guid, "pub_task" );
						$kekezu->_prom_obj->set_prom_event_status ( $p_event ['parent_uid'], $this->_gusername, $p_event ['event_id'], '3' );
						$refund ['refund_cash'] || $refund ['refund_credit'] and $send_str = $_lang['sys_haved_return'];
						$refund ['refund_cash'] and $send_str .= $_lang['task_cach_'] . $refund ['refund_cash'] . $_lang['yuan'];
						$refund ['refund_credit'] and $send_str .= $_lang['task_credit_'] . $refund ['refund_credit'];
						kekezu::notify_user ( $_lang['task_fail_notice'], $_lang['you_pub_task'] . $task_url . $_lang['hand_work_timeout_no_works_and_task_fail'] . $send_str, $this->_guid, $this->_gusername );
					}
				}
			}
		}
	}
	public function task_xg_timeout() {
		global $_K, $kekezu;
		global $_lang;
		if ($this->_task_status == '3' && time () > intval ( $this->_task_info ['end_time'] )) {
			if ($this->set_task_status ( 8 )) { 
				$kekezu->init_prom ();
				$this->_task_info['task_union'] > 0 and $this->_union_obj->change_status ();
				$hege_count = $this->get_work_count ( "work_status=6" );
				if (intval ( $hege_count ) == 0) {
					if (intval ( $this->_task_config ['is_auto_adjourn'] ) == 1) {
						$auto_num = intval ( $this->_task_config ['adjourn_num'] ); 
						$auto_num > intval ( $this->_task_info ['work_num'] ) and $auto_num = intval ( $this->_task_info ['work_num'] );
						$auto_num > intval ( $this->_task_info ['work_count'] ) and $auto_num = intval ( $this->_task_info ['work_count'] );
						$work_list = db_factory::query ( sprintf ( "select * from %switkey_task_work where task_id='%d' and work_status=0 order by work_time asc limit 0,%d", TABLEPRE, $this->_task_id, $auto_num ) );
						if ($work_list) {
							foreach ( $work_list as $v ) {
								$this->_task_info['task_union'] > 0 and $this->_union_obj->work_choose ( $v ['work_id'] );
								$this->set_work_status ( $v ['work_id'], 6 );
								$title_url = "<a href=\"$_K[siteurl]/index.php?do=task&task_id=$this->_task_id\">$this->_task_title</a>";
								$this->work_choosed ( $v, $title_url );
							}
						}
					}
				}
				$refund = $this->dispose_task_return ( 'task_fail' );
				$refund ['refund_cash'] || $refund ['refund_credit'] and $send_str = $_lang['sys_haved_return'];
				$refund ['refund_cash'] and $send_str .= $_lang['task_cach_'] . $refund ['refund_cash'] . $_lang['yuan'];
				$refund ['refund_credit'] and $send_str .= $_lang['task_credit_'] . $refund ['refund_credit'];
				kekezu::notify_user ( $_lang['task_over_notice'], $_lang['you_pub_task'] . "<a href=\"$_K[siteurl]/index.php?do=task&task_id=$this->_task_id \">$this->_task_title</a>" . $_lang['choose_timeout_and_task_fail'] . $send_str, $this->_guid );
				$kekezu->_prom_obj->dispose_prom_event ( "pub_task", $this->_guid, $this->_task_id );
			}
		}
	}
	public static function get_task_status() {
		global $_lang;
		return array ("0" => $_lang['task_no_pay'], "1" => $_lang['task_wait_audit'], "2" => $_lang['task_vote_choose'], "3" => $_lang['task_choose_work'], "7" => $_lang['freeze'], "8" => $_lang['task_over'], "9" => $_lang['fail'], "10" => $_lang['task_audit_fail'], "11" => $_lang['arbitrate'] );
	}
	public static function get_work_status() {
		global $_lang;
		return array ('6' => $_lang['hg'], '7' => $_lang['not_recept'], '8' => $_lang['task_can_not_choose_bid'] );
	}
	public function set_work_status($work_id, $to_status) {
		return db_factory::execute ( sprintf ( "update %switkey_task_work set work_status='%d' where work_id='%d'", TABLEPRE, $to_status, $work_id ) );
	}
	public static function get_task_union_status() {
		return array ('0' => "wait", '1' => "audit", '2' => "sub", '3' => "choose", '4' => "vote", '5' => "notice", '6' => 'deliver', '7' => "freeze", '8' => "end", '9' => "failure", '10' => "audit_fail", '11' => "arbitrate" );
	}
	public static function get_work_union_status() {
		return array ('0' => 'wait', '6' => 'qualified', '7' => 'not_adopted', '8' => 'no_optional' );
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
			$res = keke_finance_class::cash_out ( $this->_task_info['uid'], $order_amount, 'pub_task' ); 
			if ($res) { 
				$kekezu->init_prom ();
				if ($kekezu->_prom_obj->is_meet_requirement ( "pub_task", $this->_task_id )) {
					$kekezu->_prom_obj->create_prom_event ( "pub_task", $this->_guid, $this->_task_id, $this->_task_info ['task_cash'] );
				}
					$feed_arr = array ("feed_username" => array ("content" =>$task_info['username'], "url" => "index.php?do=space&member_id={$task_info['uid']}" ), "action" => array ("content" => $_lang['pub_task'], "url" => "" ), "event" => array ("content" => "{$task_info['task_title']}", "url" => "index.php?do=task&task_id={$task_info['task_id']}" ) );
					kekezu::save_feed ( $feed_arr,$task_info['uid'],$task_info['username'], 'pub_task',$task_info['task_id']);
					$consume = kekezu::get_cash_consume($task_info['task_cash']);
					db_factory::execute(sprintf(" update %switkey_task set cash_cost='%s',credit_cost='%s' where task_id='%d'",TABLEPRE,$consume['cash'],$consume['credit'],$this->_task_id));
				db_factory::updatetable ( TABLEPRE . "witkey_order", array ("order_status" => "ok" ), array ("order_id" => "$order_id" ) );
				if ($order_amount < $task_config['audit_cash']) { 
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