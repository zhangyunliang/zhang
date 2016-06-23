<?php
/**
 * 参    数：
 * 作    者：lht
 * 功    能：OAth2.0协议下第三方登录数据报表
 * 修改日期：2013-12-13
 */
class OauthadminAction extends AdminbaseAction {

	//用户列表
	function index(){
		$oauth_user_model=M('suppliers','ecs_');
		$count=$oauth_user_model->count();
		$page = $this->page($count, 2);
		$join = C('DB_PREFIX').'users as b on a.admin_id =b.id';
		$lists = $oauth_user_model->alias("a")->join($join)
		->order("add_time ASC")
		->limit($page->firstRow . ',' . $page->listRows)
		->select();
		$this->assign("page", $page->show('Admin'));
		$this->assign('lists', $lists);
		$this->display();
	}

	//删除用户
	function delete(){
		$id=intval($_GET['id']);
		if(empty($id)){
			$this->error('非法数据！');
		}
		$rst = M("OauthUser")->where(array("id"=>$id))->delete();
		if ($rst!==false) {
			$this->success("删除成功！", U("oauthadmin/index"));
		} else {
			$this->error('删除失败！');
		}
	}
	//查看供应商详情
	    public function suppliersinfo(){
    	$id=intval($_GET['id']);
    	if(empty($id)){
						$this->error('非法数据！');
				}
    	$list = M("suppliers",'ecs_')->where(array("suppliers_id"=>$id))->find();
    	//dump($list);
    	$this->assign("list",$list);
    	$this->display();

    }
    //拒绝
	    public function nopass(){
    	$id=intval($_GET['id']);
    	$reason = trim($_POST['reason']);
        $p = trim($_POST['p'])+0;
    	if ($id) {
    		$data = array('is_check'=>2,'user_time'=>time(),'reason'=>$reason,'admin_id'=>$_SESSION["ADMIN_ID"]);
    		$rst = M("suppliers",'ecs_')->where(array("suppliers_id"=>$id))->data($data)->save();
    		if ($rst) {


    			$this->success("供应商拒绝成功！", U("Oauthadmin/index",array('p'=>$p)));

    		} else {
    			$this->error('供应商拒绝失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
    //拒绝理由
    public function refuse(){
    		$id=intval($_GET['id']);
            $p = $_GET['p']+0;
            $this->assign('p',$p);
    		$this->assign('id',$id);
    	 $this->display();
    }
    //通过
    Public function pass(){
    	$id=intval($_GET['id']);
        $p = $_GET['p']+0;
    	if ($id) {
    		$data = array('is_check'=>1,'user_time'=>time(),'reason'=>'','admin_id'=>$_SESSION["ADMIN_ID"]);
    		$rst = M("suppliers",'ecs_')->where(array("suppliers_id"=>$id))->data($data)->save();
    		if ($rst) {
    			$this->success("供应商启用成功！", U("Oauthadmin/index",array('p'=>$p)));
    		} else {
    			$this->error('供应商启用失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }


}
