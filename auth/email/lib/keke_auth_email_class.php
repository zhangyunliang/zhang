<?php
keke_lang_class::load_lang_class('keke_auth_email_class');
class keke_auth_email_class extends keke_auth_base_class{
public static function get_instance($auth_code='email') {
		static $obj = null;
		if ($obj == null) {
			$obj = new keke_auth_email_class($auth_code);
		}
		return $obj;
	}
	public function __construct($auth_code='email') {
		parent::__construct($auth_code);
		$this->_primary_key     ='email_a_id';
		$this->_tab_obj         =keke_table_class::get_instance($this->_auth_table_name);
	}
	public static function get_auth_step($auth_step=null,$auth_info=array()){
		$step='step1';
		if($auth_step){
			$step=$auth_step;
		}
		elseif($auth_info){
			$auth_info['auth_status'] and $step="step3" or $step="step2";
		}
		return $step;
	}
	public function add_auth($email,$file_name = ''){
		global $_K,$user_info,$_lang;
		$data['email']=$email;
		$data=$this->format_auth_apply($data);
		$data ['email'] or kekezu::show_msg ( $this->auth_lang().$_lang['apply_submit_fail'],$_SERVER['HTTP_REFERER'], 3, $this->auth_lang().$_lang['apply_fail_and_info_fail'], 'warning' );
		$data['auth_time'] = time();
		$auth_info=$this->get_user_auth_info($user_info[uid]);
		if($auth_info){
			$success=$this->_tab_obj->save($data,array($this->_primary_key=>$auth_info[$this->_primary_key]));
			$success and $success=$auth_info[$this->_primary_key];
				$this->set_auth_record_status($user_info['uid'], '0');
		}else{
			$success=$this->_tab_obj->save($data);
		}
		if ($success) {
			if($this->send_mail($success,$data)){
				$data['cash'] > 0 and keke_finance_class::cash_out ($data['uid'],$data ['cash'],$this->_auth_name, $data ['cash'], $this->_auth_name, $success );
				$data['start_time']==$data['end_time'] and $end_time=$data['end_time'] or $end_time=0;
				db_factory::execute(" update ".TABLEPRE."witkey_space set email = '$data[email]' where uid = '$data[uid]'");
				return $this->add_auth_record($data['uid'], $data['username'], $this->_auth_code,$end_time,$data);
			}
		}
	}
	public function audit_auth($active_code,$email_a_id){
		global $kekezu,$_lang;
		$user_info=$kekezu->_userinfo;
		if(md5($user_info['uid'].$user_info['username'].$user_info['email'])==$active_code){
			$auth_info=$this->get_auth_info($email_a_id);
			$auth_info or kekezu::show_msg($_lang['operate_notice'],'index.php?do=user&view=payitem&op=auth&auth_code=email&ver=1','3',$this->auth_lang().$_lang['apply_not_exist_nopass'],'warning');
			$this->set_auth_status($auth_info[0][$this->_primary_key],'1');
			$this->set_auth_record_status($auth_info[0]['uid'], '1');
			$kekezu->init_prom();
			$kekezu->_prom_obj->dispose_prom_event($this->_auth_name,$user_info['uid'],$user_info['uid']);
			$feed_arr = array(	
			 		"feed_username"=>array("content"=>$user_info[username],"url"=>"index.php?do=space&member_id=$user_info[uid]"),
					"action"=>array("content"=>$_lang['have_passed'],"url"=>""),
					"event"=>array("content"=>$this->auth_lang(),"url"=>"")
			 	);
			kekezu::save_feed($feed_arr, $user_info['uid'],$user_info['username'],'email_auth' ); 
			kekezu::notify_user ( $this->auth_lang().$_lang['through'], $_lang['your'].$this->auth_lang().$_lang['have_passed_and_to']."<a href=\"index.php?do=user&view=payitem&op=auth&auth_code=email&ver=1#userCenter\">".$_lang['auth_center']."</a>".$_lang['look_detail'], $user_info['uid'] , $user_info['username']);
			kekezu::show_msg($_lang['news_notice'],'index.php?do=user&view=payitem&op=auth&auth_code=email&ver=1#userCenter',3,$this->auth_lang().$_lang['success'],'success');
			}
	}
	public function send_mail($email_a_id,$data){
		global $_K,$_lang;
		$md5_code = md5($data['uid'].$data['username'].$data['email']);
		$title = $_K['html_title'].'--'.$_lang['email_auth'];
		$body = '<font color="red">'.$_K['html_title'].$_lang['__email_auth'].'</font><br><br>&nbsp;&nbsp;&nbsp;'.$_lang['please_click_email_auth_url'].'<a href="'
			.$_K[siteurl].'/index.php?do=user&view=payitem&op=auth&auth_code=email&email_a_id='.$email_a_id.'&ac=check_email&auth_step=step3&ver=1&active_code='.$md5_code.'">'
			.$_K[siteurl].'/index.php?do=user&view=payitem&op=auth&auth_code=email&email_a_id='
			.$email_a_id.'&ac=check_email&auth_step=step3&ver=1&active_code='.$md5_code.'</a>';
		return kekezu::send_mail($data['email'],$title,$body);
	}
}
?>