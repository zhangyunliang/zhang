<?php
keke_lang_class::load_lang_class('keke_auth_realname_class');
class keke_auth_realname_class extends keke_auth_base_class{
	public static function get_instance($auth_code='realname') {
		static $obj = null;
		if ($obj == null) {
			$obj = new keke_auth_realname_class($auth_code);
		}
		return $obj;
	}
	public function __construct($auth_code='realname') {
		parent::__construct($auth_code);
		$this->_primary_key     ='realname_a_id';
		$this->_tab_obj         =keke_table_class::get_instance($this->_auth_table_name);
	}
	public static function get_auth_step($auth_step=null,$auth_info=array()){
		$step='step1';
		if($auth_step){
			$step=$auth_step;	
		}
		elseif($auth_info){
			$auth_info['auth_status'] and $step="step4" or $step="step3";
		}
		return $step;
	}
	public function add_auth($data,$file_name = '',$is_jump=true) {
		global $kekezu,$user_info,$_lang;
		$data=$this->format_auth_apply($data);
		$file_name and $id_pic = keke_file_class::upload_file($file_name);
		if (! $id_pic || ! $data ['id_card'] || ! $data ['realname']) {
			kekezu::show_msg ( $this->auth_lang().$_lang['apply_submit_fail'],$_SERVER['HTTP_REFERER'], 3, $this->auth_lang().$_lang['apply_submit_fail_for_info_little'], 'warning' );
		} 
		else {
			$id_pic and $data[$file_name]=$id_pic;
			$auth_info=$this->get_user_auth_info($user_info[uid]);
			if($auth_info){
				$success=$this->_tab_obj->save($data,array($this->_primary_key=>$auth_info[$this->_primary_key]));
				$this->set_auth_record_status($user_info['uid'], '0');
			}else{
				$success=$this->_tab_obj->save($data);
			}
		}
		if ($success) {
			db_factory::execute(sprintf(" update %switkey_space set truename='%s',idcard='%s' where uid ='%d'",TABLEPRE,$data[realname],$data[id_card],$data[uid]));
			$data['cash'] > 0 and keke_finance_class::cash_out ($data['uid'],$data ['cash'],$this->_auth_name, $data ['cash'], $this->_auth_name, $success );
			$data['start_time']==$data['end_time'] and $end_time=$data['end_time'] or $end_time=0;
			$this->add_auth_record($data['uid'], $data['username'], $this->_auth_code,$end_time);
			if($is_jump){
				kekezu::show_msg ( $this->auth_lang().$_lang['apply_submit_success'], "index.php?do=user&view=payitem&op=auth&auth_code=realname&&auth_step=step3&ver=1#userCenter", 3, $this->auth_lang().$_lang['apply_success_and_wait_audit'],'success' );
			}else{
				return true;
			}
		}
	}
}
?>