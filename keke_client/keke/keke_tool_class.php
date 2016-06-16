<?php
/**
 * 
 * �Ϳ��ƹ����ˣ�����������
 * @author Administrator
 *
 */
class keke_tool_class {
	
	/**
	 * �Ϳ�����ͨѶ���ӿ��칹��
	 * [����ҵ��ĳ�ʼ�����𶼿��ɴ˺������]
	 * @param array $param_data �ⲿ���ݵ�ҵ���������
	 * @param string $return_type ϣ���ķ�������  [url=>��������,form=>�����]
	 * @param string $method ��ѡ�����ύ��ʽ post/get
	 * @return url/html_form �������ӻ��
	 */
	public static function union_build($config, $service, $param_data = array(), $return_type = 'url', $method = 'post', $sign_type = 'MD5', $_input_charset = 'GBK') {
		$union_obj = new keke_service_class ( $config, $service, $sign_type, $_input_charset );
		$params = $union_obj->_params;
		$service = $union_obj->_service;
		$format_data = self::$service ($param_data,false); //��������
		$format_data and $params = array_merge ( $params, $format_data );
		$func_name = "build_" . $return_type;
		$url = $union_obj->$func_name ($params,$method);
		return $url;
	}
	/**
	 * �ӿ���������
	 * @param string $service �ӿڼ�д
	 */
	public static function keke_interface() {
		return $param_arr = array (
					"create_task" =>"keke.task.create",
					"hand_work" => "keke.task.work.hand",
					"query_fina" => "keke.task.query.fina",
					"save_relation" =>"keke.task.relation.save",
					"change_status" => "keke.task.change.status",
					"get_task" => "keke.task.get",
					'verify'=>'keke.notify.verify'
		);
	}
	/**
	 * ���񴴽�
	 * @param array $data
	 * @return array $param_data
	 */
	public static function create_task($data = array()) {
		return $param_data = array (
					'outer_task_id'=>$data['outer_task_id'],
					'task_amount'=>$data['task_amount'],
					'task_title'=>$data['task_title'],
					'task_status'=>$data['task_status'],
					'task_owner'=>$data['task_owner'],
 					'cash_coveage'=>$data['cash_coveage'],
					'start_time'=>$data['start_time'],
					'end_time'=>$data['end_time']
		);
		
	}
	
	/**
	 * �������
	 * @param array $data
	 * @return array $param_data
	 */
	public static function hand_work($data = array()) {
		return $param_data = array (
					'outer_task_id'=>"{$data['model_code']}-{$data['task_id']}",
					'r_task_id'=>$data['r_task_id'],
					'work_id'=>$data['work_id'],
			 		'source_app_id' => $data['source_app_id'],
					'keke_work_status'=>$data['keke_work_status'],
					'work_status'=>$data[work_status]
					
		);
	}
	/**
	 * ���񣨸����״̬���
		[���񡢸��״̬��ΪӢ�ġ�����Ӣ�Ķ������ϸ���սӿ��ĵ�]
	 * @param array $data
	 * @return array $param_data
	 */
	public static function change_status($data = array()) {
		return $param_data = array (
					'outer_task_id'=>"{$data['model_code']}-{$data['task_id']}",
					'r_task_id'=>$data['r_task_id'],
					'work_id'=>$data['work_id'],
					'work_status'=>$data['work_status'],
					'task_status'=>$data['task_status']
		);
	}
	/**
	 * ��ȡ����
		[�û��ڱ���¼���ȡ����ʱ֪ͨ����]
	 * @param array $data
	 * @param $is_return �Ƿ�ص�
	 * @return array $param_data
	 */
	public static function get_task($data = array(),$is_return=false) {
		switch ($is_return){
			case false:
				return $param_data = array (
						'log_details'=>$data['log_details']
				);
				break;
			case true://�ص�����
// 				file_put_contents('hello.txt', $data);
				break;
		}

		
	}
	/**
	 * �����ѯ
	 * @param array $data
	 * @param $is_return �Ƿ�ص�
	 * @return array $param_data
	 */
	public static function query_fina($data = array(),$is_return=false) {
		switch ($is_return){
			case false:
				return $param_data = array (
							'fina_type'=>$data['fina_type'],
							'fina_action'=>$data['fina_action'],
							'period'=>$data['fina_period']
				);
				break;
			case true://�ص�����
				break;
		}
		
	}
	/**
	 * �����ϵ
	 * @param array $data
	 * @param $is_return �Ƿ�ص�
	 * @return array $param_data
	 */
	public static function save_relation($data = array(),$is_return=false) {
		switch ($is_return){
			case false:
				return $param_data = array('r_task_id'=>$data['r_task_id']);
				break;
			case true://�ص�����
				break;
		}
		
	}/**
	 * ��Ӧ����
	 * @param unknown_type $url
	 * @param unknown_type $content
	 * @param unknown_type $type success /fail
	 */
	public static function notify($url,$content,$type='success'){
		global $_lang;
		switch($type){
			case "success":
				kekezu::show_msg($_lang['operate_notice'],$url,3,$content,'success');
				break;
			case "error":
				kekezu::show_msg($_lang['operate_notice'],$url,3,$content,'warning');
				break;
		}
	}
	/**
	 * �����ͳ�
	 */
	public static function output_error($error){
		global $_lang;
		$error_arr = array(
			'WITKEY_TASK_EXIST_ERROR'=>$_lang['witkey_task_exist_error'],
			'WITKEY_RECHARGE_EXIST_ERROR'=>$_lang['witkey_recharge_exist_error'],
			'RECHARGE_INFO_MODIFIED'=>$_lang['recharge_info_modified'],
			'PLATFORM_AUTHORITY_ILLEGAL'=>$_lang['platform_authority_illegal'],
			'WITKEY_RECHARGE_ID_EMPTY'=>$_lang['witkey_recharge_id_empty'],
			'WITKEY_RECHARGE_EMPTY'=>$_lang['witkey_recharge_empty'],
			'WITKEY_TASK_NOT_EXIST'=>$_lang['witkey_task_not_exist'],
			'WITKEY_TRANSFER_NOT_EXIST'=>$_lang['witkey_transfer_not_exist'],
			'WITKEY_TRANSFER_ALREADY_EXIST'=>$_lang['witkey_transfer_already_exist'],
			'WITKEY_AMOUNT_NOT_MATCH'=>$_lang['witkey_amount_not_match'],
			'WITKEY_TASK_LEF_AMOUNT_NOT_ENOUGH'=>$_lang['task_lef_amount_not_enough'],
			'WITKEY_COUNT_NOT_MATCH'=>$_lang['witkey_count_not_match'],
			'WITKEY_NOT_ALLOW'=>$_lang['witkey_not_allow'],
			'WITKEY_OUTER_TRANSFER_ALREADY_PAID'=>$_lang['witkey_outer_transfer_already_paid'],
			'WITKEY_OUTER_TRANSFER_REPEAT'=>$_lang['witkey_outer_transfer_repeat'],
			'WITKEY_DATA_NOT_MATCH'=>$_lang['witkey_data_not_match'],
			'WITKEY_DATA_VALIDATE_FAILURE'=>$_lang['witkey_data_validate_failure'],
			'BIDDER_EQUALS_TASK_CREATOR_ERROR'=>$_lang['bidder_equals_task_creator_error'],
			'ACCOUNT_QUERY_ERROR'=>$_lang['account_query_error'],
			'ACCOUNT_NOT_EXIST'=>$_lang['account_not_exist'],
			'ILLEGAL_ARGUMENT'=>$_lang['parameter_is_incorrect'],
			'ILLEGAL_SIGN'=>$_lang['digital_inspection_signed_fail'],
			'SYSTEM_ERROR'=>$_lang['system_error'],
			'SESSION_TIMEOUT'=>$_lang['connection_timed_out_error'],
			'ILLEGAL_PARTNER'=>$_lang['partner_error'],
			'HAS_NO_PRIVILEGE'=>$_lang['no_rights_access_interface'],
			'ILLEGAL_SERIVCE'=>$_lang['interface_info_not_exist']
		);
	}
}