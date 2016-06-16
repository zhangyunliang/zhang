<?php
keke_lang_class::load_lang_class('keke_prom_class');
class keke_prom_class {
	public $_prom_open;
	public $_prom_period;
	public $_auth_step;
	public static function get_instance() {
		static $obj = null;
		if ($obj == null) {
			$obj = new keke_prom_class ();
		}
		return $obj;
	}
	public function __construct() {
		global $kekezu;
		$this->_prom_open = intval ( $kekezu->_sys_config ['prom_open'] );
		$this->_prom_period = intval ( $kekezu->_sys_config ['prom_period'] );
		$this->auth_step_init();
	}
	public function auth_step_init(){
		$reg_config = $this->get_prom_rule("reg");
		$this->_auth_step = $reg_config['auth_step'];
	}
	public static function get_prom_rule($prom_code) {
		$p_config = db_factory::get_one(sprintf(" select * from %switkey_prom_rule where prom_code='%s'",TABLEPRE,$prom_code));
		$p_config ['config'] and $config = unserialize ( $p_config ['config'] ) or $config = array ();
		return array_merge ( $p_config, $config );
	}
	public function url_data_format($query_string) {
		$format_data = array ();
		parse_str ( $query_string, $format_data );
		$format_data ['p'] and $format_data ['p'] = $format_data ['p'] or $format_data ['p'] = 'reg';
		$format_data ['l'] and $format_data ['l'] = $format_data ['l'] or $format_data ['l'] = 'register';
		return $format_data;
	}
	public function get_prom_relation($uid, $prom_type) {
		$sql = " select * from %switkey_prom_relation where uid='%d' and prom_type='%s'";
		$p_relation = db_factory::get_one ( sprintf ( $sql, TABLEPRE, $uid, $prom_type ) );
		if(!$p_relation){
			$p_relation or $p_relation = db_factory::get_one ( sprintf ( $sql, TABLEPRE, $uid, 'reg' ) );
			$reg_event = $this->get_prom_event($uid, $uid,$this->_auth_step);
			$reg_event and $p_relation['relation_status']=4;
		}
		if ($this->_prom_period&&$p_relation) { 
			$valid_time = time () - $p_relation ['on_time'] - $this->_prom_period * 24 * 3600;
			$valid_time >0 and $this->set_relation_status ( $p_relation ['relation_id'], 3 ); 
		}
		return $p_relation;
	}
	function get_prom_event($obj_id, $uid, $action, $event_status = '1') {
		$sql = " select a.*,b.relation_id from %switkey_prom_event a 
				left join %switkey_prom_relation b on a.uid=b.uid where a.obj_id='%d'
				and a.action='%s'  and a.uid='%d' and a.event_status='%d'";
		return db_factory::get_one ( sprintf ( $sql, TABLEPRE,TABLEPRE, $obj_id, $action, $uid, $event_status ) );
	}
	public function get_income_rule($prom_type, $obj_id, $cash = 0, $credit = 0) {
		$income_rule = array ();
		$p_config = $this->get_prom_rule ( $prom_type); 
		switch ($prom_type) {
			case "reg" : 
				$auth_type = $p_config ['auth_step'];
				$auth_p_config = $this->get_prom_rule ( $auth_type ); 
				$rake_cash = $auth_p_config ['cash'];
				$rake_credit = $auth_p_config ['credit'];
				$event_desc = $p_config['prom_item']."+".$auth_p_config['prom_item'];
				$action     = $auth_p_config['prom_code'];
				break;
			case "pub_task" : 
			case "bid_task" : 
			case "service" : 
				$obj_info = $this->get_prom_obj_info ( $prom_type, $obj_id ); 
				$cash or $cash = $obj_info['cash'];
				$rate = $p_config ['rate'] * $obj_info ['profit_rate'] / 10000;
				$rake_cash   = $cash * $rate;
				$rake_credit = $credit * $rate;
				if ($prom_type == 'pub_task') {
					if ($p_config ['pub_task_rake_type'] == 1) { 
						$rake_cash = $p_config ['cash']; 
						$rake_credit = $p_config ['credit']; 
					}else{
						$rake_cash = $cash*$p_config['rate']/100; 
						$rake_credit = 0;
					}
				}
				$event_desc = $p_config['prom_item'];
				$action     = $p_config['prom_code'];
				break;
		}
		$income_rule ['rake_cash'] = floatval ( $rake_cash );
		$income_rule ['rake_credit'] = floatval ( $rake_credit );
		$income_rule ['event_desc'] = $event_desc;
		$income_rule ['action'] = $action;
		return $income_rule;
	}
	function create_prom_relation($uid, $username, $url_data, $relation_status = 1) {
		global $_lang;
		$relate_obj =  new Keke_witkey_prom_relation_class ();
		if ($this->_prom_open) {
			if ($url_data ['uid'] == $uid) { 
				kekezu::notify_user ( $_lang['prom_fail'], $_lang['you_can_not_prom_self'], $url_data ['u'] );
				return false;
			} else {
				$prom_relation = $this->get_prom_relation ( $uid, $url_data ['p'] ); 
				$r_status      = intval($prom_relation['relation_status']);
				$r_status==3||$r_status==0 and $p_status =1 or $p_status=2;
				if ($p_status==2) { 
					kekezu::notify_user ( $_lang['prom_fail'], $_lang['your_prom_user_has_promer'], $url_data ['u'] );
				} else {
					$p_info = kekezu::get_user_info ( $url_data ['u'] ); 
					$relate_obj->setUid ( $uid );
					$relate_obj->setUsername ( $username );
					$relate_obj->setProm_uid ( $p_info ['uid'] );
					$relate_obj->setProm_username ( $p_info ['username'] );
					$relate_obj->setProm_type ( $url_data ['p'] );
					$relate_obj->setRelation_status ( intval ( $relation_status ) );
					$relate_obj->setOn_time ( time () );
					return $relate_obj->create_keke_witkey_prom_relation ();
				}
			}
		} else {
			kekezu::notify_user ( $_lang['prom_fail'], $_lang['prom_system_closed'], $url_data ['u'] );
			return false;
		}
	}
	function create_prom_event($action, $uid, $obj_id, $cash = 0, $credit = 0, $event_status = '1') {
		$result = FALSE;
		if ($this->_prom_open) {
			$prom_relation = $this->get_prom_relation ( $uid, $action ); 
			$r_status      = intval($prom_relation['relation_status']);
			if ($prom_relation&&$r_status!=3&&$r_status!=4 && $prom_relation ['prom_uid'] != $uid) { 
				if (! $this->get_prom_event ( $obj_id, $uid, $action, $event_status )) {
					$income_rule = $this->get_income_rule ( $action, $obj_id, $cash, $credit );
					$event_obj = new Keke_witkey_prom_event_class ();
					$event_obj->setEvent_desc ( $income_rule ['event_desc'] );
					$event_obj->setUid ( $uid );
					$event_obj->setUsername ( $prom_relation ['username'] );
					$event_obj->setParent_uid ( $prom_relation ['prom_uid'] );
					$event_obj->setParent_username ( $prom_relation ['prom_username'] );
					$event_obj->setObj_id ( $obj_id );
					$event_obj->setAction($income_rule ['action']);
					$event_obj->setRake_cash ( $income_rule ['rake_cash'] );
					$event_obj->setRake_credit ( $income_rule ['rake_credit'] );
					$event_obj->setEvent_time ( time () );
					$event_obj->setEvent_status ( intval ( $event_status ) );
					$result = $event_obj->create_keke_witkey_prom_event ();
					$this->clear_prom_cookie ();
				}
			}
		}
		return $result;
	}
	function dispose_prom_event($action, $uid, $obj_id) {
		$p_relation = $this->get_prom_relation ( $uid, $action );
		if ($p_relation&&$p_relation ['realtion_status'] !=3) { 
			$prom_event = $this->get_prom_event ( $obj_id, $uid, $action ); 
		}
		if ($prom_event) {
			keke_finance_class::cash_in ( $prom_event ['parent_uid'], $prom_event ['rake_cash'], $prom_event ['rake_credit'], "prom_" .$action);
			$p_relation ['relation_status'] == '1' and $this->set_relation_status ( $p_relation ['relation_id'], '2' ); 
			return $this->set_prom_event_status ( $prom_event ['parent_uid'], $prom_event ['username'], $prom_event ['event_id'], 2 );
		}
	}
	function set_relation_status($relation_id, $status) {
		return db_factory::execute ( " update " . TABLEPRE . "witkey_prom_relation set relation_status ='$status' where relation_id ='$relation_id'" );
	}
	function set_prom_event_status($p_uid, $username, $event_id, $status) {
		global $_lang;
		$res = db_factory::execute ( " update " . TABLEPRE . "witkey_prom_event set event_status = '$status' where event_id= '$event_id'" );
		if ($res) {
			if ($status == 2) {
				$title = $_lang['prom_msg_notice'];
				$content = $_lang['you_prom_offline'] . $username . $_lang['complete_event_get_money_notice'];
			} elseif ($status == 3) {
				$title = $_lang['prom_msg_notice'];
				$content = $_lang['you_prom_offline'] . $username . $_lang['event_fail_notice'];
			}
			$title && $content and kekezu::notify_user ( $title, $content, $p_uid );
		}
	}
	function prom_income_rank() {
		return kekezu::get_table_data ( " uid,username,sum(fina_cash) cash,sum(fina_credit) credit", "witkey_finance", " INSTR(fina_action,'prom_')", "", "uid", "", "uid", 3600 );
	}
	function create_prom_cookie($query_string) {
		global $uid, $username;
		global $_lang;
		$url_data = $this->url_data_format ( $query_string ); 
		if ($uid) { 
			if ($url_data ['u'] != $uid && $url_data ['p']) {
				if ($this->get_prom_relation ( $uid, $url_data ['p'] )) { 
					kekezu::notify_user ( $_lang['prom_fail'], $_lang['from_you_prom_website_user'] . "��".$username."��" . $_lang['already_exist_prom_promotion_fail'], $url_data ['u'] );
				} else {
					$this->create_prom_relation ( $uid, $username, $url_data,2 );
				}
			}
		} else { 
			setcookie ( "user_prom_event", serialize ( $url_data ), time () + 24 * 3600, COOKIE_PATH, COOKIE_DOMAIN );
		}
		$this->prom_jump ( $url_data ); 
	}
	public function is_meet_requirement($prom_code, $obj_id) {
		$result = TRUE;
		$obj_info = self::get_prom_obj_info ($prom_code,$obj_id ); 
		if ($obj_info) {
			$prom_config = db_factory::get_one ( sprintf ( " select * from %switkey_prom_rule where prom_code='%s'", TABLEPRE, $prom_code ) );
			$prom_config = unserialize ( $prom_config ['config'] );
			if ($prom_config ['indus_string']&&FALSE === strpos ( $prom_config ['indus_string'], $obj_info ['indus_id'] )) {
				$result = FALSE;
			}
			if ($prom_config ['model'] && FALSE === strpos ( $prom_config ['model'], $obj_info ['model_id'] )) {
				$result = FALSE;
			}
		}
		return $result;
	}
	public static function get_prom_obj_info($prom_type, $obj_id) {
		if ($prom_type == 'pub_task' || $prom_type == 'bid_task') {
			$obj_info = db_factory::get_one ( sprintf ( " select model_id,indus_id,profit_rate,task_cash cash from %switkey_task where task_id='%d'", TABLEPRE, $obj_id ) );
		} elseif ($prom_type == 'service') {
			$obj_info = db_factory::get_one ( sprintf ( " select model_id,indus_id,profit_rate,price cash from %switkey_service where service_id='%d'", TABLEPRE, $obj_id ) );
		}
		return $obj_info;
	}
	function extract_prom_cookie() {
		isset ( $_COOKIE ['user_prom_event'] ) and $url_data = unserialize ( stripslashes ( $_COOKIE ['user_prom_event'] ) );
		return $url_data;
	}
	static function clear_prom_cookie() {
		if (isset ( $_COOKIE ['user_prom_event'] )) {
			setcookie ( 'user_prom_event', '', - 9999 );
			unset ( $_COOKIE ['user_prom_event'] );
		}
	}
	function prom_jump($url_data) {
		global $_K;
		if (isset ( $url_data ['u'] ) && $url_data ['l']) {
			if ($url_data ['o']) {
				$url_data ['l']=='service' and $j = "&sid=" or $j = "&task_id=";
				header ( "Location:" . $_K ['siteurl'] . "/index.php?do=" . $url_data ['l'] .$j. $url_data ['o'] );
			} else {
				header ( "Location:" . $_K ['siteurl'] . "/index.php?do=" . $url_data ['l'] );
			}
		}
	}
	public static function get_prelation_status(){
		global $_lang;
		return array("1"=>$_lang['not_take_effect'],"2"=>$_lang['has_task_effect'],"3"=>$_lang['has_over_time']);
	}
	public static function get_pevent_status(){
		global $_lang;
		return array("1"=>$_lang['not_settlement'],"2"=>$_lang['has_settlement'],"3"=>$_lang['has_fail']);
	}
	public static function get_prom_type(){
		return kekezu::get_table_data("prom_code,prom_item,type","witkey_prom_rule","","","","","prom_code",3600);
	}
}