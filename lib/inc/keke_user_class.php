<?php
keke_lang_class::load_lang_class('keke_user_class');
class keke_user_class {
	static function get_user_info($uid, $isusername = false) {
		$isusername and $where = " a.username = '$uid'" or $where = " a.uid = '$uid'";
		$sql = "select a.*,b.rand_code from " . TABLEPRE . "witkey_space a left join " . TABLEPRE . "witkey_member b on a.uid=b.uid where $where";
		return db_factory::get_one ( $sql );
	}
	static function user_register($username, $password, $email) {
		global $kekezu;
		$member_obj = new Keke_witkey_member_class ();
		$space_obj = new Keke_witkey_space_class ();
		$slt = kekezu::randomkeys ( 6 );
		$pwd = self::get_password ( $password, $slt );
		switch ($kekezu->_sys_config ['user_intergration']) {
			case 2 :
				require_once S_ROOT . './keke_client/ucenter/client.php';
				$reg_uid = uc_user_register ( $username, $password, $email );
				break;
			case 3 :
				require_once (S_ROOT . './keke_client/pw_client/uc_client.php');
				$reg_uid = uc_user_register ( $username, md5 ( $password ), $email );
				break;
		}
		die ();
		if ($reg_uid > 0 || $kekezu->_sys_config ['user_intergration'] == '1') {
			$reg_uid and $member_obj->setUid ( $reg_uid );
			$member_obj->setEmail ( $email );
			$member_obj->setUsername ( $username );
			$member_obj->setPassword ( $pwd );
			$member_obj->setRand_code ( $slt );
			$reg_uid = $member_obj->create_keke_witkey_member ();
			$space_obj->setUid ( $reg_uid );
			$kekezu->_sys_config [allow_reg_action] == 1 and $space_obj->setStatus ( 2 ) or $space_obj->setStatus ( 1 );
			$space_obj->setUsername ( $username );
			$space_obj->setPassword ( $pwd );
			$space_obj->setSec_code ( $pwd );
			$space_obj->setEmail ( $email );
			$space_obj->setReg_time ( time () );
			$space_obj->setReg_ip ( kekezu::get_ip () );
			$space_obj->create_keke_witkey_space ();
			$info = array ('uid' => $reg_uid, 'username' => $username, 'email' => $email );
			$kekezu->_sys_config [allow_reg_action] == 1 and self::send_email_action_user ( $info );
			return $info;
		} else {
			return false;
		}
	}
	static function get_password($pwd, $slt) {
		if ($pwd && $slt) {
			$passwordmd5 = preg_match('/^\w{32}$/', $pwd) ? $pwd : md5($pwd);
			return md5 ( $passwordmd5 . $slt );
		} else {
			return false;
		}
	}
	static function user_login($username, $password) {
		global $kekezu;
		$pwd = md5 ( $password );
		$check_username = db_factory::get_count ( sprintf ( " select username from %switkey_member where username='%s'", TABLEPRE, $username ) );
		if ($check_username) {
			$check_pass = db_factory::get_one ( sprintf ( " select * from %switkey_member where username='%s' and password='%s'", TABLEPRE, $username, $pwd ) );
			if ($check_pass) {
				$u = array ('uid' => $check_pass ['uid'], 'username' => $check_pass ['username'], 'email' => $check_pass ['email'] );
			} else {
				$u = '-2';
			}
		} else {
			$u = '-1';
		}
		return $u;
	}
	static function user_edit($username, $oldpwd, $newpwd, $email, $nocheckold = 1, $uid = '') {
		global $kekezu;
		if ($kekezu->_sys_config ['user_intergration'] == 1) {
			return 1;
		} elseif ($kekezu->_sys_config ['user_intergration'] == 2) {
			require_once S_ROOT . './keke_client/ucenter/client.php';
			return uc_user_edit ( $username, $oldpwd, $newpwd, $email, $nocheckold );
		} elseif ($kekezu->_sys_config ['user_intergration'] == 3) { 
			require_once (S_ROOT . './keke_client/pw_client/uc_client.php');
			return uc_user_edit ( $uid, $username, $newpwd, $email );
		}
	}
	static function user_delete($uid) {
		global $kekezu;
		db_factory::execute ( sprintf ( "delete from %switkey_space where uid='%d' ", TABLEPRE, $uid ) );
		db_factory::execute ( sprintf ( "delete from %switkey_member where uid='%d' ", TABLEPRE, $uid ) );
		db_factory::execute ( sprintf ( "delete from %switkey_member_bank where uid='%d' ", TABLEPRE, $uid ) );
		db_factory::execute ( sprintf ( "delete from %switkey_member_ext where uid='%d' ", TABLEPRE, $uid ) );
		db_factory::execute ( sprintf ( "delete from %switkey_member_black where uid='%d' ", TABLEPRE, $uid ) );
		db_factory::execute ( sprintf ( "delete from %switkey_member_oauth where uid='%d' ", TABLEPRE, $uid ) );
		if ($kekezu->_sys_config ['user_intergration'] == 1) {
			return $uid;
		} elseif ($kekezu->_sys_config ['user_intergration'] == 2) {
			require_once S_ROOT . './keke_client/ucenter/client.php';
			return uc_user_delete ( $uid );
		} elseif ($kekezu->_sys_config ['user_intergration'] == 3) { 
			require_once (S_ROOT . './keke_client/pw_client/uc_client.php');
			return uc_user_delete ( $uid );
		}
	}
	static function user_synlogin($uid, $pwd = null) {
		global $kekezu;
		if ($kekezu->_sys_config ['user_intergration'] == 2) {
			require_once S_ROOT . './keke_client/ucenter/client.php';
			return uc_user_synlogin ( $uid );
		} elseif ($kekezu->_sys_config ['user_intergration'] == 3) { 
			require_once (S_ROOT . './keke_client/pw_client/uc_client.php');
			$syn_arr = uc_user_login ( $uid, $pwd, 1 );
			return $syn_arr ['synlogin'];
		}
	}
	static function user_synlogout() {
		global $kekezu;
		if ($kekezu->_sys_config ['user_intergration'] == 2) {
			require_once S_ROOT . './keke_client/ucenter/client.php';
			return uc_user_synlogout ();
		} elseif ($kekezu->_sys_config ['user_intergration'] == 3) { 
			require_once (S_ROOT . './keke_client/pw_client/uc_client.php');
			return uc_user_synlogout ();
		}
	}
	static function user_checkemail($email) {
		global $kekezu;
		if ($kekezu->_sys_config ['user_intergration'] == 1) {
			$member_obj = new Keke_witkey_member_class ();
			$member_obj->setWhere ( 'email="' . $email . '"' );
			$res = $member_obj->count_keke_witkey_member ();
			$res = $res == 0 ? 1 : - 6;
		} elseif ($kekezu->_sys_config ['user_intergration'] == 2) {
			require_once S_ROOT . './keke_client/ucenter/client.php';
			$res = uc_user_checkemail ( $email );
		} elseif ($kekezu->_sys_config ['user_intergration'] == 3) { 
			require_once (S_ROOT . './keke_client/pw_client/uc_client.php');
			$res = uc_check_email ( $email );
		}
		return $res;
	}
	static function user_checkname($username) {
		global $kekezu;
		if ($kekezu->_sys_config ['user_intergration'] == 1) {
			$member_obj = new Keke_witkey_member_class ();
			$member_obj->setWhere ( 'username="' . $username . '"' );
			$res = $member_obj->count_keke_witkey_member ();
			$res = $res ? 0 : 1;
		} elseif ($kekezu->_sys_config ['user_intergration'] == 2) {
			require_once S_ROOT . './keke_client/ucenter/client.php';
			$res = uc_user_checkname ( $username );
		} elseif ($kekezu->_sys_config ['user_intergration'] == 3) { 
			require_once (S_ROOT . './keke_client/pw_client/uc_client.php');
			$res = uc_check_username ( $username );
		}
		return $res;
	}
	static function user_getprotected() {
		global $kekezu;
		if ($kekezu->_sys_config ['ban_users']) {
			$limit_username = explode ( ',', $kekezu->_sys_config ['ban_users'] );
		}
		if ($kekezu->_sys_config ['user_intergration'] == 1) {
			return $limit_username;
		} elseif ($kekezu->_sys_config ['user_intergration'] == 2) {
			require_once S_ROOT . './keke_client/ucenter/client.php';
			$limit_username = $limit_username ? $limit_username : array ();
			uc_user_getprotected ();
			if(is_array(uc_user_getprotected ())&&is_array($limit_username)){
				$res = array_merge (uc_user_getprotected () , $limit_username );
			}
			return $res;
		}
	}
	static function get_user_pic($uid, $size = 'small') {
		global $kekezu, $_K;
		if (! in_array ( $size, array ('larger', 'middle', 'small' ) )) {
			$size = 'small';
		}
		if ($kekezu->_sys_config ['user_intergration'] == 1 || $kekezu->_sys_config ['user_intergration'] == 3) {
			$dir = keke_user_avatar_class::get_avatar ( $uid, $size );
			return "<img src='$_K[siteurl]/data/avatar/" . $dir . "' uid='$uid' class='pic_" . $size . "'>";
		} elseif ($kekezu->_sys_config ['user_intergration'] == 2) {
			require_once S_ROOT . './keke_client/ucenter/client.php';
			return "<img src=" . UC_API . "/avatar.php?uid=$uid&size=$size uid='$uid' class='pic_" . $size . "'>";
		}
	}
	static function send_email_action_user($info = array()) {
		global $kekezu;
		global $_lang;
		if (! empty ( $info ) && function_exists ( 'fsockopen' )) {
			db_factory::execute(sprintf("update %switkey_space set status='3' where uid='%d'",TABLEPRE,$info['uid']));
			$user_info = implode ( ',', $info );
			$excite_code = md5 ( $user_info );
			$title = $kekezu->_sys_config ['website_name'] . '--' . $_lang['activate_the_account'];
			$body = <<<EOT
			<font color="red">{$kekezu->_sys_config['website_name']}--{$kekezu->lang('activate_the_account')}</font><br><br>
			&nbsp;&nbsp;&nbsp;{$kekezu->lang('welcome_you_register')}{$kekezu->_sys_config['website_name']},{$kekezu->lang('please_onclick_this_address_activate')}
			<a href="{$kekezu->_sys_config[website_url]}/index.php?do=excite_email&excite_code=$excite_code&excite_uid=$info[uid]" traget="_blank">
			{$kekezu->lang('onclick_activate_account')}
			</a>
EOT;
			kekezu::send_mail ( $info [email], $title, $body );
		}
	}
	static function action_user_by_email($uid, $code) {
		$auth_obj = new Keke_witkey_auth_record_class ();
		$auth_obj->setWhere ( " uid = " . $uid . " and auth_code= 'email' and auth_status=0 and ext_data = '$code'" );
		$count = $auth_obj->count_keke_witkey_auth_record ();
		if ($count > 0) {
			$space_obj = new Keke_witkey_space_class ();
			$space_obj->setStatus ( 1 );
			$space_obj->setWhere ( "uid = $uid" );
			$space_obj->edit_keke_witkey_space ();
			$auth_obj->setWhere ( " uid = " . $uid . " and auth_code= 'email' and auth_status=0 and ext_data = '$code'" );
			$auth_obj->del_keke_witkey_auth_record ();
			return true;
		}
		return false;
	}
	static function check_username($check_username) {
		global $basic_config, $_K;
		global $_lang;
		$check_username = trim ( $check_username );
		if (empty ( $check_username )) {
			return $_lang['username_is_empty'];
		}
		if ($basic_config ['user_intergration'] == 1) {
			if (kekezu::k_strpos ( $check_username )) {
				return $_lang['username_illegal'];
			}
			if (kekezu::check_user_by_name ( $check_username, 1 )) {
				return $_lang['user_has_exist'];
			}
		} else if ($basic_config ['user_intergration'] == 2) {
			$result = keke_user_class::user_checkname ( $check_username );
			if ($result == - 1) {
				return $_lang['username_illegal'];
			} else if ($result == - 2) {
				return $_lang['contain_allow_register_words'];
			} else if ($result == - 3) {
				return $_lang['user_has_exist'];
			}
		} else if ($basic_config ['user_intergration'] == 3) {
			$result = keke_user_class::user_checkname ( $check_username );
			if ($result == - 1) {
				return $_lang['username_invalid'];
			} else if ($result == - 2) {
				return $_lang['user_has_exist'];
			}
		}
		$limit_username = keke_user_class::user_getprotected ();
		if ($limit_username && in_array ( $check_username, $limit_username )) {
			return $_lang['register_fail_limit_register'];
		}
		return true;
	}
	static function check_email($check_email) {
		global $_lang;
		$res = keke_user_class::user_checkemail ( $check_email );
		if ($res == 1) {
			return true;
		} else if ($res == - 4) {
			return $_lang['email_format_error'];
		} else if ($res == - 5) {
			return $_lang['email_not_allow_register'];
		} else if ($res == - 6) {
			return $_lang['the_email_has_register'];
		}
	}
	static function set_union_relation($uid){
		isset($_COOKIE['relation_id']) and $relation_id=$_COOKIE['relation_id'];
		if (isset($relation_id)){
			$query_sql = "select count(*) as total from `%switkey_task_relation` where `relation_id`=%d";
			$count = db_factory::get_count(sprintf($query_sql,TABLEPRE,intval($relation_id)),'total');
			if ($count<1) return false;
			db_factory::execute(sprintf("update %switkey_task_relation set uid=%s where relation_id=%d",TABLEPRE,$uid,$relation_id));
			setcookie('relation_id','',-20000);
		}
	}
}