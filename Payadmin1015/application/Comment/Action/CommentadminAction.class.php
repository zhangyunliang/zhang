<?php
class CommentadminAction extends AdminbaseAction{
	
	protected $comments_model;
	
	function _initialize(){
		parent::_initialize();
		$this->comments_model=D("TempPurchase");
	}

	function index(){
		if (isset($_POST['start_time']) && !empty($_POST['start_time'])) {
								$_REQUEST['start_time'] = strtotime($_POST['start_time'].'0:0:0');
		}
		if (isset($_POST['end_time']) && !empty($_POST['end_time'])) {
								$_REQUEST['end_time'] = strtotime($_REQUEST['end_time'].'23:59:59');
                               // $_REQUEST['end_time'] = $_REQUEST['end_time']+24*60*60;
		}
	$where_ands=array();
	$fields=array(
				'start_time'=> array("field"=>"time","operator"=>">"),
				'end_time'  => array("field"=>"time","operator"=>"<")
					);
	$post_info = $_REQUEST;
			foreach ($fields as $param => $val){
				if (isset($_REQUEST[$param]) && !empty($_REQUEST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];

					$_GET[$param]=$_REQUEST[$param];

				 $get=$_REQUEST[$param];

					array_push($where_ands, "$field $operator '$get'");
				}
			}
		$join = join(" and ", $where_ands);
		if($join == ''){
    $join = '';
		}else{
    $join = $join.' and ';
		}
	//	dump($join);
//白条收货未结算金额:
 	$payment = M('temp_payment','ecs_');
 	$where =$join.'type = 8';
		$this->btw_number = $payment->where($where)->count();
		$this->btw = $payment->where($where)->sum('money');
//白条收货已结算金额:
	 $where =$join.'type = 9';
		$this->bty_number = $payment->where($where)->count();
		$this->bty = $payment->where($where)->sum('money');
//在线支付已入账金额:
		$where =$join.'type = 0';
		$this->online_pay_number = $payment->where($where)->count();
		$this->online_pay = $payment->where($where)->sum('money');
//货到付款已完成金额:
		$where =$join.'type = 6';
		$this->huofu_number = $payment->where($where)->count();
		$this->huofu = $payment->where($where)->sum('money');
//提现已完成金额:
		$where =$join.'type = 2';
		$this->tixian_number = $payment->where($where)->count();
		$this->tixian = $payment->where($where)->sum('money');
//退款已完成金额:
		$where =$join.'type = 4';
		$this->tukuan_number = $payment->where($where)->count();
  $this->tukuan = $payment->where($where)->sum('money');
  //所有订单
  $where =$join.'(state in (2,3,4,5,6,7) or (state = 1 && account_money>0))';
  $this->order_number = M('temp_purchase','ecs_')->where($where)->count();
 
  	if (isset($_GET['start_time']) && !empty($_GET['start_time'])) {
								$_GET['start_time'] = date('Y-m-d', $_GET['start_time']); 
		}
		if (isset($_GET['end_time']) && !empty($_GET['end_time'])) {
            //$_GET['end_time'] =  $_GET['end_time']-24*60*60;
								$_GET['end_time'] = date('Y-m-d', $_GET['end_time']); 
		}
		//已充值
		$where = $join.'order_status = 1';
		$this->in_cash_number = M('temp_cash_order','ecs_')->where($where)->count();
		$this->in_cash = M('temp_cash_order','ecs_')->where($where)->sum('order_amount');
		//充值红包
		$where = $join.'order_status = 1 and bonus_id > 0 and bonus_money>0';
		$this->in_bonus_number = M('temp_cash_order','ecs_')->where($where)->count();
		$this->in_bonus = M('temp_cash_order','ecs_')->where($where)->sum('bonus_money');
  //邀请人佣金
		$where = $join.'purchase_id > 0';
		$this->commission_number = M('temp_cash','ecs_')->where($where)->count();
		$this->commission = M('temp_cash','ecs_')->where($where)->sum('cash_money');
  //余额支付

		$where = $join.'type = 11 ';
		$sql = 'select count(*) as n from (select * from ecs_temp_payment where '.$where.' group by temp_purchase_sn) as temp';

		$balance_cash_number = M()->query($sql);
		//dump($balance_cash_number);
		$this->assign('balance_cash_number',$balance_cash_number[0]['n']);
		$this->balance_cash = M('temp_payment','ecs_')->where($where)->sum('money');


  $this->assign("formget",$_GET);
		$this->display(":index");
	}
	
	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if ($this->comments_model->where("id=$id")->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if ($this->comments_model->where("id in ($ids)")->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	function check(){
		if(isset($_POST['ids']) && $_GET["check"]){
			$data["status"]=1;
				
			$ids=join(",",$_POST['ids']);
			
			if ( $this->comments_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("审核成功！");
			} else {
				$this->error("审核失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["uncheck"]){
				
			$data["status"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->comments_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("取消审核成功！");
			} else {
				$this->error("取消审核失败！");
			}
		}
	}
	
}