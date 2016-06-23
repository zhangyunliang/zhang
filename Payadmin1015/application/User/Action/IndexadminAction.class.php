<?php

/**
 * 会员
 */
class IndexadminAction extends AdminbaseAction {
    function index(){
    	/*$users_model=M("Users");
    	$count=$users_model->where(array("user_type"=>2))->count();
    	$page = $this->page($count, 20);
    	$lists = $users_model
    	->where(array("user_type"=>2))
    	->order("create_time DESC")
    	->limit($page->firstRow . ',' . $page->listRows)
    	->select();
    	$this->assign('lists', $lists);
    	$this->assign("page", $page->show('Admin'));
    	
    	$this->display(":index");*/
        $users_model= M('temp_buyers','ecs_');
        $count=$users_model->count();
        $page = $this->page($count, 20);
        $lists = $users_model
        ->order("add_time ASC")
        ->limit($page->firstRow . ',' . $page->listRows)
        ->select();
       // dump($lists);
        $this->assign('lists', $lists);
        $this->assign("page", $page->show('Admin'));
        
        $this->display(":index");

    }
    
    function ban(){
    	$id=intval($_GET['id']);
        $p = $_GET['p']+0;
    	if ($id) {
    		$rst = M("temp_buyers",'ecs_')->where(array("temp_buyers_id"=>$id))->setField('is_check','0');
    		if ($rst) {
    			$this->success("用户冻结成功！", U("indexadmin/index",array('p'=>$p)));
    		} else {
    			$this->error('用户冻结失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
    
    function cancelban(){
    	$id=intval($_GET['id']);
        $p = $_GET['p']+0;
    	if ($id) {
    		$rst = M("temp_buyers",'ecs_')->where(array("temp_buyers_id"=>$id))->setField('is_check','1');
    		if ($rst) {
    			$this->success("会员启用成功！", U("indexadmin/index",array('p'=>$p)));
    		} else {
    			$this->error('会员启用失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
}
?>
