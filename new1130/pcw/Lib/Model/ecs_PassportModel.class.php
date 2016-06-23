<?php

class ecs_PassportModel {

    private $CONFIG = array();
    private $charset = 0;
   
    private $error = null; //如果存在错误的时候返回一下错误
    private $domain = '@qq.com'; //可以修改
    private $token = array();//手机APP 需要的 access_token
    
    
    public function __construct() {

       
    }
    
    public function getToken(){
        return $this->token;
    }
    
    public function getError() {
        return $this->error;
    }

   
    public function logout() {
        clearUid();
       
        return true;
    }

    public function uppwd($account, $oldpwd, $newpwd) {
        if ($this->isuc) {
            if (isMobile($account)) {
                $ucresult = uc_user_edit($account, $oldpwd, $newpwd, '', 1);
            } elseif (isEmail($account)) {
                $local = explode('@', $account);
                $ucresult = uc_user_edit($local[0], $oldpwd, $newpwd, '', 1);
            }
            if ($ucresult == -1) {
                $this->error = '旧密码不正确';
                return false;
            }
        }
        $user = D('Users')->getUserByAccount($account);
        return D('Users')->save(array('user_id' => $user['user_id'], 'password' => md5($newpwd)));
    }

    //UC用邮件登录
    public function login($account, $password) {
        $this->token = array(
            'token' => md5(uniqid())
        );
         {
            $user = D('ecs_TempBuyers')->where(array('temp_buyers_mobile'=>trim($account)))->find();
            if (empty($user)) {
                $this->error = '用户不存在';
                return false;
            }
            if ($user['is_check'] == 0) {
                $this->error = '用户被冻结！';
                return false;
            }
            if ($user['temp_buyers_password'] != md5($password)) {
                $this->error = '账号或密码不正确！';
                return false;
            }
           
            $data = array(
                'lastlogin' => NOW_TIME,
                
                'temp_buyers_id' => $user['temp_buyers_id'],
               
            );
            D('ecs_TempBuyers')->save($data);
            setUid($user['temp_buyers_id']);
        }
        $connect = session('connect');
        if (!empty($connect)) {
            D('Connect')->save(array('connect_id' => $connect, 'uid' => $user['user_id']));
        }
        $this->token['uid'] = $user['user_id'];
        return true;
    }

    public function register($data = array()) {
        $this->token = array(
            'token' => md5(uniqid())
        );
        if (empty($data))
            return false;
        
            $obj = D('ecs_TempBuyers');
            $data['temp_buyers_password'] = md5($data['temp_buyers_password']);
            $user = $obj->check_unique($data['temp_buyers_mobile']);
            if ($user) {
                $this->error = '该账户已经存在';
                return false;
            }

			$data['invitation'] = ecs_random(6,0);
			//邀请人
			if($person = $obj->where(array('invitation'=>$data['frominvitation']))->find()){
			
			$data['invitation_person'] =  $person['temp_buyers_id'];
			}
			unset($data['frominvitation']);
			
            $data['temp_buyers_id'] = $obj->add($data);
       
	   		if(!$data['temp_buyers_id']){
	   	 	$this->error = $obj->getError();
                return false;
	   		}
	   
	   
        $this->token['uid'] = $data['temp_buyers_id'];
        $connect = session('connect');
        if (!empty($connect)) {
            D('Connect')->save(array('connect_id' => $connect, 'uid' => $data['temp_buyers_id']));
        }
        setUid($data['temp_buyers_id']);
        return true;
    }

}