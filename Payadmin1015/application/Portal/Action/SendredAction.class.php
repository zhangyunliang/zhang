<?php

/**
 * 发红包
 * @author yunliang
 */
class SendredAction extends AdminbaseAction
{
	protected $buyers_obj;
	protected $cashsn_obj;
	protected $bonus_obj;
	protected $account;
	
	function _initialize(){
		parent::_initialize();
		$this->buyers_obj=D('TempBuyers');
		$this->cashsn_obj=D('TempCash');
		$this->bonus_obj=D('TempBonus');
        $this->account=D('TempAccount');
	}
	
	
	function index(){
		
		//获取到奖励类型id
		if(isset($_GET['bonus_id'])&& !empty($_GET['bonus_id'])){
			$bonus_id=I("get.bonus_id");
		}
		if(isset($_POST['bid'])&& !empty($_POST['bid'])){
			$bonus_id=I("post.bid");
		}
		//假设数据
		//$arr1=array('bonus_id'=>$bonus_id);
		//$bonus_id='1';
		$this->assign('bid',$bonus_id);
		
		//dump($_POST);
		//条件搜索
		
		$vv=array(
				array('vip'=>'0','name'=>'普通会员'),
				array('vip'=>'1','name'=>'vip'),
				);
		$this->assign('vv',$vv);

		$where='';

		if(isset($_REQUEST['vip'])&&($_REQUEST['vip']!='-1')){
				$vip=$_REQUEST['vip'];
				$where['vip']=$vip;
				$_GET['vip']=$_REQUEST['vip'];
		}
		if(isset($_REQUEST['temp_buyers_mobile'])&& ($_REQUEST['temp_buyers_mobile'])!=''){
			$where['temp_buyers_mobile']=array('like',"%".$_REQUEST['temp_buyers_mobile']."%");
			$_GET['temp_buyers_mobile']=$_REQUEST['temp_buyers_mobile'];
		}
		$this->assign('vp',$vip);
		

		$count=$this->buyers_obj->where($where)->count();

		$page=$this->page($count,10);

		$res=$this->buyers_obj->order("temp_buyers_id")
		->limit($page->firstRow.','.$page->listRows)
		->where($where)
		->select();
		//将传来的bonus_id放入循环数组中
		foreach ($res as $key=>$v){
			$res[$key]['bonus_id']=$bonus_id;
		}
		
		//dump($res);
		$this->assign('list',$res);
		$this->assign('formget',$_GET);
		$this->assign('page',$page->show("Admin"));
		$this->display();
	}
	
	/**
	 * 发红包
	 */
	function send(){
		// 				dump(I("get.id"));
		// 				dump(I("get.ids"));
		// 				dump(I("get.bid"));
        //dump($_REQUEST);
		if(isset($_GET['id'])&& !empty($_GET['id'])){
			$id=I("get.id");
			$this->assign('id',$id);
		}
		if(isset($_GET['ids'])&& !empty($_GET['ids'])){
			$id=I("get.ids");
			$this->assign("id",$id);
		}

		if(isset($_REQUEST['bid'])&& !empty($_REQUEST['bid'])){
			$bonus_id=$_REQUEST['bid'];
			$str=$this->bonus_obj->where(array("bonus_id"=>$bonus_id))->find();
			$this->assign($str);
		}
		//dump($str);
		$this->display();
}
	
	//生成固定位数的随机数
	function rand_num($num){
		$a = range(0,9);
		for($i=0;$i<$num;$i++){
			$b[] = array_rand($a);
		}
		return(join("",$b));
	}
	
	function send_post(){
// 				$userid=explode(',',$_POST['user_id']);
				//dump(json_encode(explode(',',$_POST['user_id'])));exit();
		//		dump($_REQUEST);
		if(IS_POST){
			if($_POST['send_type']=='5'){
				if(empty($_POST['bonus_money'])){
					$this->error("请确认红包金额！");
				}
				if(!isset($_POST['state'])){
					$this->error("请确认是否领取！");
				}
				foreach ((explode(',',$_POST['user_id']))as $v):
				$_POST['post']['cash_bonus_id']=$_POST['bonus_id'];
				$_POST['post']['cash_time']=time();
				$_POST['post']['cash_sn']=self::rand_num(10);
				$_POST['post']['send_type']=$_POST['send_type'];
				$_POST['post']['state']=$_POST['state'] == 0 ? 0:1;//为1需要领取,0不需要领取
				$_POST['post']['cash_money']=$_POST['bonus_money'];
				$_POST['post']['user_id']=$v;
				$str=$this->cashsn_obj->add($_POST['post']);
				//判断此用户是否已有账号
					$res=$this->account->field("total,bonus_money")->where(array('temp_buyers_id'=>$v))->find();
					if(empty($res)){
					
						$data['temp_buyers_id']=$v;
						$data['total']=0;
						$data['bonus_money']=0;
						$this->account->add($data);

					}
				//	dump($res);
						$data['total']=$res['total']+$_POST['bonus_money'];
						$data['bonus_money']=$res['bonus_money']+$_POST['bonus_money'];
						$where['temp_buyers_id']=$v;
						$this->account->where($where)->data($data)->save();
				endforeach;
					if($str){
						$this->success("发送成功！");
					}
					else{
						$this->error("发送失败！");
					}
			}else{

				if(empty($_POST['num'])){
					$this->error("请确认数量！");
				}
				for($i=0;$i<intval(I("post.num"));$i++){
					foreach (explode(',',$_POST['user_id']) as $v):
					$_POST['post']['cash_bonus_id']=$_POST['bonus_id'];
					$_POST['post']['cash_time']=time();
					$_POST['post']['cash_sn']=self::rand_num(10);
					$_POST['post']['send_type']=$_POST['send_type'];
					$_POST['post']['state']=1;//统一赋值为1，未领取
					$_POST['post']['cash_money']=$_POST['bonus_money'];
					//$_POST['post']['user_id']=json_encode(explode(',',$_POST['user_id']));
					$_POST['post']['user_id']=$v;
					$str=$this->cashsn_obj->add($_POST['post']);
						//判断此用户是否已有账号
// 					$res=$this->account->field("temp_buyers_id,total,bonus_money")->where(array('temp_buyers_id'=>$v))->select();
// 					if(!empty($res)){
// 						$moneys=$this->cashsn_obj->where(array('user_id'=>$v))->sum("cash_money");
// 						//dump($moneys);
// 						$data['total']=$moneys;
// 						$data['bonus_money']=$moneys;
// 						$where['temp_buyers_id']=$v;
// 						$this->account->where($where)->data($data)->save();
// 					}else{
// 							$data['temp_buyers_id']=$v;
// 							$data['total']=$_POST['bonus_money'];
// 							$data['bonus_money']=$_POST['bonus_money'];
// 							$this->account->add($data);
// 					}
					endforeach;
				
				}
				if($str){
					$this->success("发送成功！");
				}
				else{
					$this->error("发送失败！");
				}
			}
			
		}else{
			$this->error($this->cashsn_obj->getError());
		}
	}
	
}