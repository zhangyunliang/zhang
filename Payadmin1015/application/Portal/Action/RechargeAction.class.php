<?php

/**
 * 充值订单
 * @author yunliang
 *
 */
class RechargeAction extends AdminbaseAction
{
	protected $order_obj;
	protected $buyers_obj;
	
	function _initialize(){
		parent::_initialize();
		$this->order_obj=D('TempCashOrder');
		$this->buyers_obj=D('TempBuyers');
	}
	
	//搜索+列表
	function index(){
		
		$where=array(array('order_status'=>1));
		//订单状态
		$val=array(
				// array('sid'=>'-1','name'=>'取消'),
				// array('sid'=>'0','name'=>'待付款'),
				array('sid'=>'1','name'=>'已付款'),
				array('sid'=>'200','name'=>'已发红包'),
				);
		$this->assign('val',$val);
		if(IS_POST){
			
			if(isset($_POST['order_status'])&& ($_POST['order_status'])!='10'){
				$status=trim($_POST['order_status']);
   $where = array();
				$where['order_status']=$status;
				$_GET['order_status']=$_POST['order_status'];
			}
		}else{

			if(isset($_GET['order_status'])&& ($_GET['order_status'])!='10'){
				$status=trim($_GET['order_status']);
$where = array();
				$where['order_status']=$status;
				$_GET['order_status']=$_GET['order_status'];
			}
		}

		$this->assign('status_id',$status);
		

			if(isset($_REQUEST['order_status'])&& ($_REQUEST['order_status'])!='10'){
				$status=trim($_REQUEST['order_status']);
				$where['order_status']=$status;
				$_GET['order_status']=$_REQUEST['order_status'];
			}
			
			//时间
			if(isset($_REQUEST['start_time'])&& !empty($_REQUEST['start_time'])){
				
				if(strpos ($_REQUEST['start_time'],'-') !== false){//转为时间戳
					$_REQUEST['start_time'] = $_REQUEST['start_time'].' 0:0:0';
					$_REQUEST['start_time'] = strtotime($_REQUEST['start_time']);
					$where['ecs_temp_cash_order.add_time']=array('gt',$_REQUEST['start_time']);
				
				}else{
					$_REQUEST['start_time'] = $_REQUEST['start_time'];
					$where['ecs_temp_cash_order.add_time']=array('gt',$_REQUEST['start_time']);
				}
				
				$_GET['start_time'] = date('Y-m-d', $_REQUEST['start_time']); 
			}
			if(isset($_REQUEST['end_time'])&& !empty($_REQUEST['end_time'])){
				
				if(strpos ($_REQUEST['end_time'],'-') !== false){//转为时间戳
					$_REQUEST['end_time'] = $_REQUEST['end_time'].' 23:59:59';
					$_REQUEST['end_time'] = strtotime($_REQUEST['end_time']);
					$where['ecs_temp_cash_order.add_time']=array('lt',$_REQUEST['end_time']);
				
				}else{
					$_REQUEST['end_time'] = $_REQUEST['end_time'];
					$where['ecs_temp_cash_order.add_time']=array('lt',$_REQUEST['end_time']);
				}
				
				$_GET['end_time']= date('Y-m-d', $_REQUEST['end_time']); 
			}
			
			
			if(isset($_REQUEST['start_time']) && isset($_REQUEST['end_time'])
					&& !empty($_REQUEST['start_time'])
					&& !empty($_REQUEST['end_time'])){
				
				if(strpos($_REQUEST['start_time'],'-') !== false && strpos($_REQUEST['end_time'],'-') !== false){
					$_REQUEST['start_time'] = $_REQUEST['start_time'].' 0:0:0';
					$_REQUEST['start_time'] = strtotime($_REQUEST['start_time']);
					
					$_REQUEST['end_time'] = $_REQUEST['end_time'].' 23:59:59';
					$_REQUEST['end_time'] = strtotime($_REQUEST['end_time']);
					
					
// 					$where['ecs_temp_cash_order.add_time']=array(
// 						array('gt',$_REQUEST['start_time']),
// 						array('lt',$_REQUEST['end_time']),
// 						);

					$where['ecs_temp_cash_order.add_time']=array('between',
					array($_REQUEST['start_time'],$_REQUEST['end_time']),
					);
					$_GET['start_time'] = date('Y-m-d', $_REQUEST['start_time']);
					$_GET['end_time']= date('Y-m-d', $_REQUEST['end_time']);
			}else{
				$_REQUEST['start_time'] = $_REQUEST['start_time'];
				$_REQUEST['end_time'] = $_REQUEST['end_time'];
				
				$where['ecs_temp_cash_order.add_time']=array('between',
						array($_REQUEST['start_time'],$_REQUEST['end_time']),
				);
					$_GET['start_time'] = date('Y-m-d', $_REQUEST['start_time']);
					$_GET['end_time']= date('Y-m-d', $_REQUEST['end_time']);
			}
		}
		$count=$this->order_obj->where($where)->count();
		$page=$this->page($count,10);

		
				if($status=='200'){
					$where['order_status']='1';
					$where['ecs_temp_cash_order.bonus_money']=array('gt','0');
				
				}
	//	dump($where);
		$res=$this->order_obj->order(array("order_id"=>"asc"))
		->join("ecs_temp_buyers ON ecs_temp_cash_order.user_id = ecs_temp_buyers.temp_buyers_id")
		->join("ecs_temp_bonus ON ecs_temp_cash_order.bonus_id =ecs_temp_bonus.bonus_id")
		->field("ecs_temp_buyers.nick,ecs_temp_cash_order.order_id,ecs_temp_cash_order.order_sn,
				ecs_temp_cash_order.order_status,ecs_temp_cash_order.pay_method,ecs_temp_cash_order.order_amount,
				ecs_temp_cash_order.bonus_name,ecs_temp_cash_order.add_time,ecs_temp_cash_order.bonus_money")
		->where($where)
		->limit($page->firstRow.','.$page->listRows)
		->select();
		//dump($res);

		
		$this->assign('list',$res);
		$this->assign('page',$page->show("Admin"));
		$this->assign('formget',$_GET);
		//dump($_GET);
		$this->display();
	}
	
	
}