<?php
/*
 * 订单列表
 */

class OrderlistAction extends AdminbaseAction
{
	protected $purchase_obj;

	function _initialize(){
		parent::_initialize();
		$this->purchase_obj=D('TempPurchase');
	}
	
	function index(){
		$where=array();
		
		//订单状态
		$status=array(
					  array("tid"=>"0","name"=>"取消"),
					  array("tid"=>"1","name"=>"待付款"),
					  array("tid"=>"2","name"=>"待发货"),
				      array("tid"=>"3","name"=>"已发货"),
				      array("tid"=>"4","name"=>"已完成"),
				      array("tid"=>"5","name"=>"待确认"),
					  array("tid"=>"6","name"=>"待退款"),
				      array("tid"=>"7","name"=>"无效"),
				);
		$method=0;
		if(isset($_POST['state'])&& $_POST['state']!=''){
			$method=$_POST['state'];
			$where_ands="method=$method";
		}
		$this->assign('state',$status);
		$this->assign('method',$method);
				
				if(IS_POST){
					if(isset($_POST['state'])){
						$where=array(
								'state'=>intval($_POST['state']),
						);
					}
					if(!empty($_POST['temp_purchase_sn'])){
						$where=array(
								'temp_purchase_sn'=>trim($_POST['temp_purchase_sn']),
						);
					}
					if(!empty($_POST['name'])){
						$where=array(
								'name'=>array('like',trim($_POST['name']),'%'),
						);
					}
					$_GET=$where;
				}
				else{
					if(isset($_GET['state'])){
						$where=array(
								'state'=>intval($_GET['state']),
						);
					}
					if(!empty($_GET['temp_purchase_sn'])){
						$where=array(
								'temp_purchase_sn'=>trim($_GET['temp_purchase_sn']),
						);
					}
					if(!empty($_GET['name'])){
						$where=array(
								'name'=>array('like',trim($_GET['name']),'%'),
						);
					}
					$_GET=$where;
				}
				
				$count=$this->purchase_obj->where($where)
				->count();
				
				$page=$this->page($count,10);
				$this->assign('page',$page->show("Admin"));
				
				$list=$this->purchase_obj->order('temp_purchase_id')
				->limit($page->firstRow.','.$page->listRows)
				->where($where)
				->select();
				
				$this->assign('list',$list);
				$this->assign('formget',$_GET);
				//dump($_GET['name'][1]);
				$this->display();
	}
	
	/*
	 * 删除订单
	 */
	function delete(){
		$id=intval(I('get.id'));
		dump($id);

		if($this->purchase_obj->delete($id)!==false){
				$this->success('删除成功！');
		}else{
				$this->error('删除失败！');
		}
	}
	
	/*
	 * 查看订单详情
	 */
	function look(){
		$this->display();
	}
	
	/*
	 * 撤销订单
	 */
	function listback(){
		$this->display();
	}
}