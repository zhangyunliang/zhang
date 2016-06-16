<?php

if (! defined ( 'IN_KEKE' ) && ! defined ( 'ADMIN_KEKE' )) {
	exit ( 'Access Denied' );
}

class oauth_api_factory {
	/**
	 * ��� oauth����<b>����</b>  �����ɴ��ɲ���    �ղ������ȡ�ϴ�ִ��ʱ����Ĳ���
	 * @param $wb_type ΢������
	 * @param $app_key
	 * @param $app_secret
	 * @return object
	 */
	static function get_o($wb_type, $app_key, $app_secret) {
		global $_oauth_api_operate_obj, $_oauth_api_operate_param;
// 		var_dump($wb_type, $app_key, $app_secret);die();
		if ($wb_type) {
			$_oauth_api_operate_param ['wb_type'] = $wb_type;
		} else {
			$wb_type = $_oauth_api_operate_param ['wb_type'];
		}
		if ($app_key) {
			$_oauth_api_operate_param [$wb_type] ['app_key'] = $app_key;
		} else {
			$app_key = $_oauth_api_operate_param [$wb_type] ['app_key'];
		}
		if ($app_secret) {
			$_oauth_api_operate_param [$wb_type] ['app_secret'] = $app_secret;
		} else {
			$app_secret = $_oauth_api_operate_param [$wb_type] ['app_secret'];
		}

		if ($_oauth_api_operate_obj [$wb_type]) {
			return $_oauth_api_operate_obj [$wb_type];
		} else {
			if (! file_exists ( S_ROOT . "./keke_client/weibo/" . $wb_type . "/" . $wb_type . "_oauth_client_class.php" )) {
				return false;
			} else {
				include_once S_ROOT . "./keke_client/weibo/" . $wb_type . "/" . $wb_type . "_oauth_client_class.php";
				$class_name = "{$wb_type}_oauth_client_class";
				$_oauth_api_operate_obj [$wb_type] = new $class_name ( $app_key, $app_secret );
				return $_oauth_api_operate_obj [$wb_type];
			}
		
		}
	
	}
	
	//���ͨѶ����
	static function get_auth_url($callback, $wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->get_auth_url ( $callback );
	}
	
	//�������token
	static function get_access_token($wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->get_access_token ();
	}
	
	//�������״̬
	static function clear_access_token($wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->clear_access_token ();
	}
	
	/**
	 * ��������token
	 * @param $oauth_verifier (��$wb_type��sinaʱ,���ֵ�����˷��ص�$_GET['code]')
	 * @param $wb_type ΢������ sina/ten etc.
	 * @param $app_key
	 * @param $app_secret
	 * @param $more �����
	 */
	static function create_access_token($oauth_verifier = false, $wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->create_access_token ( $oauth_verifier );
	}
	
	//��õ�ǰ��¼�û���Ϣ
	static function get_login_info($wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->get_login_info ();
	}
	
	//���oauth���Ӷ���    �����ɶ�ȡʹ��   ��  $o->get(url);
	static function get_operate($wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->get_operate ();
	}
	
	//���΢���ٷ�api�ṩ��sdk client�ļ�
	static function get_client($wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->get_client ();
	}
	
	//��ô�����Ϣ  ���������쳣ʱ������������ϸ
	static function get_error($wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->get_error ();
	}
	
	//����΢��
	static function post_wb($msg, $img = null, $wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->post_wb ( $msg, $img );
	}
	
	//���΢���б�
	static function get_wb_list($page = 0, $page_size = 0, $wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->get_wb_list ( $page, $page_size );
	}
 	//��ȡ��˿�б�
	static function get_fans_list($uid_or_name=null,$page = 0, $page_size = 0, $wb_type = null, $app_key = null, $app_secret = null){
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->get_followers($uid_or_name, $page_size,$page);
	} 
	
	//����sid��õ���΢������
	static function get_wb_info($sid, $wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->get_wb_info ( $sid );
	}
	
	//����UID��עĳ��
	static function follow_wb_user($u_id, $wb_type = null, $app_key = null, $app_secret = null) {
		if (strtolower(CHARSET)=='gbk'){
			$u_id = kekezu::gbktoutf($u_id);
		}
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->follow_wb_user ( $u_id );
	}
	
	//ת��һ��΢��
	static function repost_wb($sid, $text = null, $wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->repost_wb ( $sid, $text );
	}
	
	//����һ��΢��
	static function send_comment($sid, $text = null, $wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->send_comment ( $sid, $text );
	}
	
	//�û����ݸ�ʽ��  ��api���صĽ��ͳһ��ʽ
	static function user_data_format($data, $wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->user_data_format ( $data );
	}
	
	//΢�����ݸ�ʽ��  ��api���صĽ��ͳһ��ʽ
	static function wb_data_format($data, $wb_type = null, $app_key = null, $app_secret = null) {
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->wb_data_format ( $data );
	}
	
	static function query_sid($mid,$wb_type = null, $app_key = null, $app_secret = null){
		$o = oauth_api_factory::get_o ( $wb_type, $app_key, $app_secret );
		return $o->mid_2_sid($mid);
	}
}

//��Ϊ������  �������ʵ�ֵĶ���
abstract class base_client_class {
	public $_app_key;
	public $_app_secret;
	protected $_error_info;
	
	function __construct($app_key, $app_secret) {
		$this->_app_key = $app_key;
		$this->_app_secret = $app_secret;
	}
	
	//�����Ȩ���ӵ�
	abstract function get_auth_url($callback);
	
	//��֤�Ƿ�����Ȩ
	abstract function get_access_token();
	
	//������Ȩ
	abstract function clear_access_token();
	
	//ͨ����Ȩ
	abstract function create_access_token($oauth_verifier = false);
	
	//��õ�ǰ��Ȩ�û����û���Ϣ
	abstract function get_login_info();
	
	//��ö�Ӧ����֤��  ���ڵ�ȡ����
	abstract function get_operate();
	
	//��ö�Ӧ�Ĺ�����  ���ڵ�ȡ����
	abstract function get_client();
	
	//�û����ݸ�ʽ��  ��api���صĽ��ͳһ��ʽ
	abstract function user_data_format($data);
	
	//΢�����ݸ�ʽ��  ��api���صĽ��ͳһ��ʽ
	abstract  function wb_data_format($data);
	
	//����΢����  �Ǳ�Ҫʵ��  �ɸ���
	abstract function post_wb($msg, $img);
	
	//����format
	

	//����3������Ϊ������Ϣ��ȡ
	/**
	 * ʵ�ָýӿڳ�����ѭ���¹���,��ִ�к������߶�ȡ����ʱ  �����������
	 * ����������false   �ٽ��������ݱ�����  $_error_info��
	 * �������ڿ��Ʋ����falseʱ���о����Ƿ��ô�����Ϣ
	 * 
	 * ����Ϊ�˱��������Ϣ�����ϴβ���������error��Ϣ
	 * �������´���ĺ����ǵ��ں���ͷд��  $this->_error_info = null;����  $this->set_error(null);
	 * 
	 * */
	protected function set_error($error) {
		$this->_error_info = $error;
	}
	
	public function get_error() {
		return $this->_error_info;
	}
}

?>