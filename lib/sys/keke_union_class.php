<?php
require_once S_ROOT . '/keke_client/keke/keke_tool_class.php';
require_once S_ROOT . '/keke_client/keke/keke_service_class.php';
require_once S_ROOT . '/keke_client/keke/config.php';
class keke_union_class {
	private $_task_id; 
	private $_model_id; 
	private $_r_task_id; 
	private $_model_code; 
	private $_config; 
	private  $_data; 
	function __construct($task_id, $data = array()) {
		global $config;
		if (! empty ( $task_id )) {
			$this->_config = $config;
			$this->_task_id = intval ( $task_id );
			$this->init_task ( $task_id ); 
		}
		$this->_data = $data;
	}
	private function init_task($task_id = '') {
		if (! $this->_task_id && $task_id) {
			$this->_task_id = $task_id;
		}
		$sql = "select `task_id`,`model_id`,`task_union`,`r_task_id` from `%switkey_task` where task_id=%d";
		$result = db_factory::get_one ( sprintf ( $sql, TABLEPRE, $this->_task_id ) );
		if (! $result || ! $result ['task_union']) { 
			return false;
		}
		$this->_model_id = $result ['model_id'];
		$this->_r_task_id = $result ['r_task_id'];
		$this->_model_code = $this->get_model_code ();
	}
	public static function union_request($service,$comm_data= array(),$return_type = 'url', $method = 'post',$sign_type = 'MD5',$_input_charset = 'GBK'){
		global $config;
		$request = keke_tool_class::union_build($config, $service,$comm_data,$return_type,$method,$sign_type,$_input_charset);
		kekezu::socket_request ( $request );
	}
	static function create_task($task_id, $is_return = false) {
		global $_K;
		switch ($is_return) {
			case false :
				global $config, $kekezu, $_K;
				$sql = "select `task_id`,`model_id`,`task_cash_coverage`,`task_cash`,`task_title`,`task_status`,`username`,`start_time`,`end_time` from %switkey_task where task_id=%d and task_union=0";
				$task_info = db_factory::get_one ( sprintf ( $sql, TABLEPRE, intval ( $task_id ) ) );
				if (! $task_info) {
					return false;
				}
				$model_code = $kekezu->_model_list [$task_info ['model_id']] ['model_code'];
				$task_info ['task_cash_coverage'] and $task_info ['cash_coveage'] = self::get_cash_cove ( $task_info ['task_cash_coverage'] );
				$class_name = $model_code. '_task_class'; 
				$task_status_arr = call_user_func ( array ($class_name, 'get_task_union_status' ) ); 
				$task_info ['task_status'] = $task_status_arr [$task_info ['task_status']];
				$task_info ['task_owner']  = $task_info['username'];
				$task_info ['outer_task_id']= "{$model_code}-{$task_id}";
				$task_info ['task_amount']  = $task_info['task_cash'];
				$inter = 'create_task'; 
				$request = keke_tool_class::union_build ( $config, $inter, $task_info );
				return $request;
				break;
			case true:
				$data  = $this->_data;
				$response = array ();
				$url = $_K ['siteurl'] . "/index.php?do=task&task_id=" . $data['task_id'];
				$response ['url'] = $url;
				switch ($data['is_success']) {
					case "T" : 
						$sql = sprintf ( " update %switkey_task set r_task_id ='%d',task_union='1' where task_id='%d'", TABLEPRE, $data['r_task_id'], $data['task_id']);
						$res = db_factory::execute ( $sql );
						$response ['type'] = "success";
						$response ['notice'] = "联盟任务发布成功";
						break;
					case "F" :
						$response ['type'] = "error";
						$response ['notice'] = "联盟任务发布失败";
						break;
				}
				return $response;
				break;
		}
	}
	public function work_hand($work_id, $is_return = false) {
		global $uid;
		switch ($is_return) {
			case false :
				if (! $work_id || ! $uid) {
					return false;
				}
				$sql = "select * from %switkey_task_relation where task_id=%d and uid=%d";
				$relation_arr = db_factory::get_one ( sprintf ( $sql, TABLEPRE, $this->_task_id, $uid ) );
				if (! $relation_arr) {
					return false;
				}
				$inter = 'hand_work'; 
				$comm_data = array ('model_code' => $this->_model_code, 'task_id' => $this->_task_id, 'r_task_id' => $this->_r_task_id, 'source_app_id' => $relation_arr ['app_id'], 'work_id' => intval ( $work_id ) );
				$url = keke_tool_class::union_build ( $this->_config, $inter, $comm_data );
				kekezu::socket_request ( $url, $this->_config ['_input_charset'] );
				break;
			case true :
				$response = array ();
				$url = '';
				$response ['url'] = $url;
				switch ($this->_data ['is_success']) {
					case "T" : 
						$response ['type'] = "success";
						$response ['notice'] = "成功";
						break;
					case "F" :
						$response ['type'] = "error";
						$response ['notice'] = "失败";
						break;
				}
				return $response;
				break;
		}
	}
	public function work_choose($work_id, $to_status = '4') {
		if (! $work_id) {
			return false;
		}
		$status_arr = call_user_func ( array ($this->_model_code . '_task_class', 'get_work_union_status'));
		$inter = 'change_status'; 
		$comm_data = array ('model_code' => $this->_model_code, 'task_id' => $this->_task_id, 'r_task_id' => $this->_r_task_id, 'work_id' => intval ( $work_id ), 'work_status' => $status_arr [$to_status] );
		$url = keke_tool_class::union_build ( $this->_config, $inter, $comm_data );
		kekezu::socket_request ( $url, $this->_config ['_input_charset'] ); 
	}
	public function change_status($status = 'end', $is_return = false) {
		switch ($is_return) {
			case false :
				if (! in_array ( $status, array ('end', 'failure' ) )) {
					return false;
				}
				$inter = 'change_status'; 
				$comm_data = array ('model_code' => $this->_model_code, 'task_id' => $this->_task_id, 'r_task_id' => $this->_r_task_id, 'task_status' => $status );
				$url = keke_tool_class::union_build ( $this->_config, $inter, $comm_data );
				kekezu::socket_request ( $url, $this->_config ['_input_charset'] ); 
				break;
			case true :
				$data = $this->_data;
				$response = array ();
				$url = '';
				$response ['url'] = $url;
				switch ($data['is_success']) {
					case "T" : 
						if ($data['task_status']) {
							$status_arr = call_user_func ( array ($data['model_code'] . '_task_class', 'get_task_union_status'));
							$status_arr = array_flip ( $status_arr );
							$task_status = $status_arr [$data['task_status']];
							$res = db_factory::execute ( sprintf ( " update %switkey_task set task_status='%d' where r_task_id ='%d'", TABLEPRE, $task_status, $data['r_task_id']) );
						}
						$response ['type'] = "success";
						$response ['notice'] = "状态修改成功";
						break;
					case "F" :
						$response ['type'] = "error";
						$response ['notice'] = "失败";
						break;
				}
				return $response;
				break;
		}
	}
	public function view_task() {
		$r_task_id = $this->_r_task_id;
		if (! $r_task_id) {
			return false;
		}
		$inter = 'save_relation';
		$comm_data = array ('r_task_id' => intval ( $r_task_id ) );
		$jump_url = keke_tool_class::union_build ( $this->_config, $inter, $comm_data );
		self::jump ( $jump_url );
	}
	static function get_cash_cove($rule_id) {
		global $kekezu;
		$cove_arr = $kekezu->get_cash_cove();
		$cove = $cove_arr[$rule_id];
		return $cove ['start_cove'] . '-' . $cove ['end_cove'];
	}
	static function get_task_list() {
		global $config;
		$inter = 'get_task'; 
		$config ['return_url'] = str_replace ( '&', '|', 'http://' . $_SERVER [SERVER_NAME] . $_SERVER [REQUEST_URI] );
		$request = keke_tool_class::union_build ( $config, $inter );
		self::jump ( $request );
	}
	private function get_model_code() {
		global $kekezu;
		$model_arr = $kekezu->_model_list;
		return $model_arr [$this->_model_id] ['model_code'];
	}
	static function jump($url) {
		header ( 'Location:' . $url );
	}
}