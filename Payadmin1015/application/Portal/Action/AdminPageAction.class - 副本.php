<?php
class AdminPageAction extends AdminbaseAction {
	protected $posts_obj;
	function _initialize() {
		parent::_initialize();
		$this->posts_obj =D("TempPurchase");
	}
	function index(){
 // dump($_REQUEST);
		if (isset($_REQUEST['start_time']) && !empty($_REQUEST['start_time'])) {

			     if(strpos ($_REQUEST['start_time'],'-') !== false){//转为时间戳
         $_REQUEST['start_time'] = $_REQUEST['start_time'].' 0:0:0';
			     	$_REQUEST['start_time'] = strtotime($_REQUEST['start_time']);

			     }else{
			     	$_REQUEST['start_time'] = $_REQUEST['start_time'];

			     }

								
		   }
		if (isset($_REQUEST['end_time']) && !empty($_REQUEST['end_time'])) {
			if(strpos ($_REQUEST['end_time'],'-') !== false){//转为时间戳
         $_REQUEST['end_time'] = $_REQUEST['end_time'].' 23:59:59';
			     	$_REQUEST['end_time'] = strtotime($_REQUEST['end_time']);

			     }else{
			     	$_REQUEST['end_time'] = $_REQUEST['end_time'];
			     }

		}
		if (isset($_GET['state']) && !empty($_POST['state'])) {
								$_REQUEST['state'] = $_GET['state']+0;
		}
		$where_ands=array();
 	if(($_REQUEST['state'] ==201)||($_REQUEST['state'] ==202)){
				$fields=array(
				'start_time'=> array("field"=>"time","operator"=>">"),
				'end_time'  => array("field"=>"time","operator"=>"<"),
				'state'					=> array("field"=>"state","operator"=>"=")
				);
	 }else if($_REQUEST['state'] >199){

				$fields=array(
				'start_time'=> array("field"=>"a.time","operator"=>">"),
				'end_time'  => array("field"=>"a.time","operator"=>"<"),
				'method'				=> array("field"=>"b.method","operator"=>"="),
				'state'					=> array("field"=>"state","operator"=>"="),
				'address'  	=> array("field"=>"b.address","operator"=>"like"),
				'temp_purchase_sn'  	=> array("field"=>"b.temp_purchase_sn","operator"=>"like"),
				'name'  	=> array("field"=>"b.name","operator"=>"like"),
				'mobile'  	=> array("field"=>"b.mobile","operator"=>"like")
				);
	 }else{
	 
	 			$fields=array(
				'start_time'=> array("field"=>"a.time","operator"=>">"),
				'end_time'  => array("field"=>"a.time","operator"=>"<"),
				'method'				=> array("field"=>"a.method","operator"=>"="),
				'state'					=> array("field"=>"a.state","operator"=>"="),
				'address'  	=> array("field"=>"a.address","operator"=>"like"),
				'temp_purchase_sn'  	=> array("field"=>"a.temp_purchase_sn","operator"=>"like"),
				'name'  	=> array("field"=>"a.name","operator"=>"like"),
				'mobile'  	=> array("field"=>"a.mobile","operator"=>"like")
					);
	}	

 $post_info = $_REQUEST;
	foreach ($fields as $param => $val){
				if (isset($_REQUEST[$param]) && !empty($_REQUEST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];

					$_GET[$param]=$_REQUEST[$param];

					if($_REQUEST[$param]==100){
          $_REQUEST[$param]=0;
					}
					if( $param == 'state'&& $_REQUEST[$param] >199 ){
         $_REQUEST[$param] = $_REQUEST[$param]-200;

         $field = 'a.type';
					}

				 $get=$_REQUEST[$param];

					// $_GET[$param]=$get;

   if($operator=="like" && $param == 'temp_purchase_sn'){

						$get="%$get";
					}else if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}

	
		

		$where = join(" and ", $where_ands);
		//dump($where);
  if(($post_info['state'] ==201)||($post_info['state'] ==202)){
			$count = M('temp_payment','ecs_')
			->alias("a")
			->join('ecs_temp_buyers_account c ON a.user_id = c.temp_buyers_id' )
			->where($where)
			->count();
			$page = $this->page($count, 10);
			
			$posts = M('temp_payment','ecs_')
			->alias("a")
			->join('ecs_temp_buyers_account c ON a.user_id = c.temp_buyers_id' )
			->field("a.temp_payment_id,a.time,a.money,a.type as state,c.person,c.alipay")
			->where($where)
			->order('a.time DESC')
			->limit($page->firstRow . ',' . $page->listRows)
			->select();
			if(!empty($posts)){
					$posts[0]['p0'] = 1;
			}
			
  }else if($post_info['state'] > 199){
   //dump($where);

   if(isset($_GET['all'])){
  
   	 $count = M('temp_payment','ecs_')
			->alias("a")
			->join("ecs_temp_purchase b ON a.temp_purchase_sn = b.temp_purchase_sn")
			->join('ecs_temp_buyers_account c ON a.user_id = c.temp_buyers_id' )
			->join('ecs_temp_cash_order d ON a.temp_purchase_sn = d.order_sn' )
			->where($where)
			->count();
			$page = $this->page($count, 10);
				
			$posts = M('temp_payment','ecs_')
			->alias("a")
			->join("ecs_temp_purchase b ON a.temp_purchase_sn = b.temp_purchase_sn")
			->join('ecs_temp_buyers_account c ON a.user_id = c.temp_buyers_id' )
		 ->join('ecs_temp_cash_order d ON a.temp_purchase_sn = d.order_sn' )
			->field("b.purchase_title,a.temp_payment_id,c.person,c.alipay,a.temp_purchase_sn,a.time,b.name,b.mobile,b.address,a.money,b.transportation,b.method,a.type as state,b.temp_purchase_id,d.order_id,d.order_sn,d.order_status,d.add_time")
			->where($where)
			->limit($page->firstRow . ',' . $page->listRows)
			->order("a.time DESC ")->select();
   }else{
   $where .=" and a.temp_purchase_sn not like 'C%'";

			$sql = "select count(*) as c from (select count(*) from ecs_temp_payment as a left join ecs_temp_purchase b on a.temp_purchase_sn = b.temp_purchase_sn where ".$where." group by a.temp_purchase_sn,a.type) as temp ";
   $count = M()->query($sql);
   $page = $this->page($count[0]['c'], 10);


			$posts = M('temp_payment','ecs_')
			->alias("a")
			->join("ecs_temp_purchase b ON a.temp_purchase_sn = b.temp_purchase_sn")
			->join('ecs_temp_buyers_account c ON a.user_id = c.temp_buyers_id' )
			->field("b.purchase_title,a.temp_payment_id,c.person,c.alipay,a.temp_purchase_sn,a.time,b.name,b.mobile,b.address,b.money,a.money as yue,b.account_money,b.transportation,b.method,a.type as state,b.temp_purchase_id")
			->group('a.temp_purchase_sn,a.type')
			->where($where)
			->limit($page->firstRow . ',' . $page->listRows)
			->order("a.time DESC ")->select();
   }
	  if(!empty($posts)){
					$posts[0]['p1'] = 1;
			};
  }else{

   if($where != '' &&  strpos($where,'state') === false ){//有其他的条件+state选择全部
  
					$where .=' and (a.state in (2,3,4,5,6,7) or (a.state = 1 && a.account_money>0))';
					
   }else if(strpos($where,'state') === false){//全部
   	 
 				$where .='(a.state in (2,3,4,5,6,7) or (a.state = 1 && a.account_money>0))';
     //dump($where);
   }else if($_REQUEST['state'] == 1 ){//有其他条件+state为1
   		$where .=' and a.account_money>0';
   }
  //dump($where);
			$sql = "select count(*) as c from (SELECT COUNT( * ) FROM ecs_temp_purchase a LEFT JOIN ecs_temp_payment b ON a.temp_purchase_sn = b.temp_purchase_sn WHERE ".$where." GROUP BY a.temp_purchase_sn, b.type) as temp ";
			$count = M()->query($sql);
		//	dump($count[0]['c']);
			$page = $this->page($count[0]['c'], 10);

			$posts=$this->posts_obj
			->alias('a')
			->join("ecs_temp_payment b ON a.temp_purchase_sn = b.temp_purchase_sn")
			->field("a.purchase_title,a.temp_purchase_id,a.temp_purchase_sn,a.time,a.name,a.mobile,a.address,a.money,a.account_money,a.transportation,a.method,a.state,b.type,b.temp_payment_id")
			->where($where)
			->group('a.temp_purchase_sn,b.type')
			->order('a.time DESC')
			->limit($page->firstRow . ',' . $page->listRows)
			->select();
  }
		
		$this->assign("Page", $page->show('Admin'));
		if (isset($_GET['start_time']) && !empty($_GET['start_time'])) {
								$_GET['start_time'] = date('Y-m-d', $_GET['start_time']); 
		}
		if (isset($_GET['end_time']) && !empty($_GET['end_time'])) {
								$_GET['end_time'] = date('Y-m-d', $_GET['end_time']); 
		}
  $page_money = 0;
  foreach($posts as $k=>$v){
        $page_money += $v['money'];
  }
		$this->assign("formget",$_GET);
  //dump($posts);
		$this->assign("posts",$posts);
		$this->assign("page_money",$page_money);
		$this->display();
	}
	
	function recyclebin(){
		$where_ands=array("post_type=2 and post_status=0");
		$fields=array(
				'start_time'=> array("field"=>"post_date","operator"=>">"),
				'end_time'  => array("field"=>"post_date","operator"=>"<"),
				'keyword'  => array("field"=>"post_title","operator"=>"like"),
		);
		if(IS_POST){
		
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_POST[$param];
					$_GET[$param]=$get;
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}else{
			foreach ($fields as $param =>$val){
				if (isset($_GET[$param]) && !empty($_GET[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_GET[$param];
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}
		
		$where= join(" and ", $where_ands);
		
		$count=$this->posts_obj->where($where)->count();
		$page = $this->page($count, 20);
		
		$posts=$this->posts_obj->where($where)->limit($page->firstRow . ',' . $page->listRows)->select();
		
		$users_obj=D("Users");
		$users_data=$users_obj->field("id,user_login")->where("user_status=1")->select();
		$users=array();
		foreach ($users_data as $u){
			$users[$u['id']]=$u;
		}
		$this->assign("users",$users);
		
		$this->assign("Page", $page->show('Admin'));
					if (isset($_GET['start_time']) && !empty($_GET['start_time'])) {
								$_GET['start_time'] = date('Y-m-d', $_GET['start_time']); 
		}
		if (isset($_GET['end_time']) && !empty($_GET['end_time'])) {
								$_GET['end_time'] = date('Y-m-d', $_GET['end_time']); 
		}
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
		$this->display();
	}
	
	function add(){
         $this->display();
	}
	
	function add_post(){
		if (IS_POST) {
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			$_POST['post']['post_date']=date("Y-m-d H:i:s",time());
			$_POST['post']['smeta']=json_encode($_POST['smeta']);
			$_POST['post']['post_author']=get_current_admin_id();
			$result=$this->posts_obj->add($_POST['post']);
			if ($result) {
				$this->success("添加成功！");
			} else {
				$this->error("添加失败！");
			}
		}
	}
	
	public function edit(){
		$terms_obj = D("Terms");
		$term_id = intval(I("get.term")); 
		$id= intval(I("get.id"));
		$term=$terms_obj->where("term_id=$term_id")->find();
		$post=$this->posts_obj->where("id=$id")->find();
		$this->assign("post",$post);
		$this->assign("smeta",(array)json_decode($post['smeta']));
			
		$this->assign("author","1");
		$this->assign("term",$term);
		$this->display();
	}
	
	public function edit_post(){
		$terms_obj = D("Terms");
	
		if (IS_POST) {
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			
			$_POST['post']['smeta']=json_encode($_POST['smeta']);
			unset($_POST['post']['post_author']);
			$result=$this->posts_obj->save($_POST['post']);
			if ($result !== false) {
				//
				$this->success("保存成功！");
				//$this->success(json_encode($_POST['meta']));
			} else {
				$this->error("保存失败！");
			}
		}
	}
	
	//排序
	public function listorders() {
		$status = parent::_listorders($this->terms_relationship);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}
	
	
	function delete(){
		
		
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$data=array("post_status"=>"0");
			if ($this->posts_obj->where("id in ($ids)")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$data=array("id"=>$id,"post_status"=>"0");
				if ($this->posts_obj->save($data)) {
					$this->success("删除成功！");
				} else {
					$this->error("删除失败！");
				}
			}
		}
	}
	
	function restore(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data=array("id"=>$id,"post_status"=>"1");
			if ($this->posts_obj->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	
	function clean(){
		
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			if ($this->posts_obj->where("id in ($ids)")->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if ($this->posts_obj->delete($id)!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
//审核
 Public function order_check(){
    	$id=intval($_GET['id']);
    	//$p = isset($_GET['p'])?intval($_GET['p']):1;
    	$dump_url = session('dump_url');

    	
	if ($id) {
         if(isset($_GET['ps']) && $_GET['ps'] == 1){
         	  //根据ID查payment表的信息
    								$state = M('temp_payment','ecs_')->where(array("temp_payment_id"=>$id))->getField('type');
    								  if($state == 1){//申请提现
							    			$data = array('type'=>2);
							    			$str = '申请提现审核成功';
							    			$dump = 11;
							      }else if($state == 2){//取消申请提现审核
							      	$data = array('type'=>1);
							    			$str = '取消申请提现审核成功';
							    			$dump = 12;
							      }
											$rst = M("temp_payment",'ecs_')->where(array("temp_payment_id"=>$id))->data($data)->save();
											if ($rst) {
									    			$this->success($str, U("AdminPage/index",$dump_url));
									    		} else {
									    			$this->error('审核失败！');
									    		}
									    

         }else if(isset($_GET['pid'])){

												$pid=intval($_GET['pid']);
												
												$payment_state = M('temp_payment','ecs_')->where(array("temp_payment_id"=>$id))->getField('type');
												$order_state = M('temp_purchase','ecs_')->where(array("temp_purchase_id"=>$pid))->getField('state');

												if($payment_state == 3 && $order_state == 6 ){//卖家已同意退款
								    			$data = array('state'=>7);
								    			$rst1 = M("temp_purchase",'ecs_')->where(array("temp_purchase_id"=>$pid))->data($data)->save();
								    			$data = array('type'=>4);
								    			$rst2 = M("temp_payment",'ecs_')->where(array("temp_payment_id"=>$id))->data($data)->save();
								    			$str = '退款审核成功';
								    			$dump = 13;
									    		if ($rst1 && $rst2) {
													    			$this->success($str, U("AdminPage/index",$dump_url));
													    		} else {
													    			$this->error('审核失败！');
												   }
			    		   }else if($payment_state == 4 && $order_state == 7){//管理员处理退款
														  $data = array('state'=>6);
									    			$rst1 = M("temp_purchase",'ecs_')->where(array("temp_purchase_id"=>$pid))->data($data)->save();
									    			$data = array('type'=>3);
						         	$rst2 = M("temp_payment",'ecs_')->where(array("temp_payment_id"=>$id))->data($data)->save();
																$str = '退款处理回退成功';
																$dump = 14;
																if ($rst1 && $rst2) {
													    			$this->success($str, U("AdminPage/index",$dump_url));
													   } else {
													    			$this->error('审核失败！');
												   }
			    		  }else if($payment_state == 8){
			    		  	
					    			$data = array('type'=> 9);
					    			$str = '白条已收货，审核成功';
					    			$dump = 18;
					    			$rst = M("temp_payment",'ecs_')->where(array("temp_payment_id"=>$id))->data($data)->save();
											if ($rst) {

									    			$this->success($str, U("AdminPage/index",$dump_url));
									    		} else {
									    			$this->error('审核失败！');
									    		}
					    		}else if($payment_state == 9){
												$data = array('type'=> 8);
												$str = '白条已收货，取消审核成功';
												$dump = 19;
												$rst = M("temp_payment",'ecs_')->where(array("temp_payment_id"=>$id))->data($data)->save();
											if ($rst) {
												   
									    			$this->success($str, U("AdminPage/index",$dump_url));
									    		} else {
									    			$this->error('审核失败！');
									    		}
					    		}


  
         }else if(isset($_GET['ps']) && $_GET['ps'] == 2){

    						//根据ID去查订单信息
    						$states = M('temp_purchase','ecs_')
    						->alias("a")
    						->join('ecs_temp_payment b ON a.temp_purchase_sn = b.temp_purchase_sn')
    						->field("a.temp_payment_id,a.state,b.type")
    						->where(array("a.temp_purchase_id"=>$id))
    						->find();
    					
          $payment_state = $states['type'];
          $order_state = $states['state'];
          
          if($payment_state == 3 && $order_state == 6 ){//卖家已同意退款

					    			$data = array('state'=>7);
					    			$rst1 = M("temp_purchase",'ecs_')->where(array("temp_purchase_id"=>$id))->data($data)->save();
					    			$data = array('type'=>4);
					    			$rst2 = M("temp_payment",'ecs_')->where(array("temp_payment_id"=>$states['temp_payment_id']))->data($data)->save();
					    			$str = '退款审核成功';
					    			$dump = 13;
			    		 }else if($payment_state == 4 && $order_state == 7){//管理员处理退款
										  $data = array('state'=>6);
					    			$rst1 = M("temp_purchase",'ecs_')->where(array("temp_purchase_id"=>$id))->data($data)->save();
					    			$data = array('type'=>3);
		         	$rst2 = M("temp_payment",'ecs_')->where(array("temp_payment_id"=>$states['temp_payment_id']))->data($data)->save();
												$str = '退款处理回退成功';
												$dump = 14;

			    		}
									if ($rst1 && $rst2) {
									    			$this->success($str, U("AdminPage/index",$dump_url));
									    		} else {
									    			$this->error('审核失败！');
									}


    }
    	} else {
    		$this->error('数据传入失败！');
    	}
    }	

	 Public function order_info(){
	 	//根据订单ID查订单详情
	 	$order_id = I('get.id',0,'intval');

	 	if($order_id){
     $orderinfos = M('temp_purchase','ecs_')
     ->alias('a')
     ->join("ecs_temp_buyers b ON a.buyers_id = b.temp_buyers_id")
     ->field("a.*,b.nick,b.temp_buyers_mobile")
     ->where(array("temp_purchase_id"=>$order_id))
     ->find();
  //dump($orderinfos);
     $this->assign('orderinfos',$orderinfos);
     
     //商品信息
     if($orderinfos['temp_inquiry_id']){
     	$goodsinfo = M('temp_purchase_goods','ecs_')
     	->where(array("temp_purchase_id"=>$order_id))
      ->select();

     }else{
     $goodsinfo = M('temp_purchase_goods','ecs_')
     ->alias("a")
     ->join("ecs_goods b ON a.goods_id = b.goods_id")
     ->join("ecs_temp_color c ON b.color_id = c.color_id")
     ->join("ecs_goods_category d ON a.goods_cat_id = d.goods_category_id")
    	->field("a.version,a.amount,a.unit,a.price,a.description,a.name,a.brand_name,b.goods_img,c.color,d.goods_category_name")
     ->where(array("temp_purchase_id"=>$order_id))
     ->select();
     }
   

				$this->assign('goodsinfo',$goodsinfo);
				//

	 	}else{
	 		$this->error('数据传入失败！');
	 	}

		$this->display();
	 }
	 //邀请人佣金
Public function commission(){
$gets = $_GET;
  if (isset($_GET['start_time']) && !empty($_GET['start_time'])) {
                $_GET['start_time'] = strtotime($_GET['start_time'].'0:0:0');
    }
    if (isset($_GET['end_time']) && !empty($_GET['end_time'])) {
                $_GET['end_time'] = strtotime($_GET['end_time'].'23:59:59');
                
    }
  $where_ands=array('purchase_id>0');
  $fields=array(
        'start_time'=> array("field"=>"time","operator"=>">"),
        'end_time'  => array("field"=>"time","operator"=>"<")
          );
  foreach ($fields as $param => $val){
        if (isset($_GET[$param]) && !empty($_GET[$param])) {
          $operator=$val['operator'];
          $field   =$val['field'];

          array_push($where_ands, "$field $operator '$get'");
        }
      }
      $where = join(" and ", $where_ands);

      $count =  M('temp_cash','ecs_')
      ->alias("a")
      ->join('ecs_temp_purchase  b ON b.temp_purchase_id = a.purchase_id')
      ->join('ecs_temp_buyers c ON a.user_id = c.temp_buyers_id')
      ->where($where)
      ->count();
      $page = $this->page($count, 20);
      
      $posts = M('temp_cash','ecs_')
      ->alias("a")
      ->join('ecs_temp_purchase  b ON b.temp_purchase_id = a.purchase_id')
      ->join('ecs_temp_buyers c ON a.user_id = c.temp_buyers_id')
      ->field("b.temp_purchase_id,b.temp_purchase_sn,b.purchase_title,b.time,b.name,b.mobile,b.address,b.money,b.transportation,b.method,c.temp_buyers_mobile,c.nick,a.cash_money")
      ->where($where)
      ->order('b.time DESC')
      ->limit($page->firstRow . ',' . $page->listRows)
      ->select();

    
    $this->assign("Page", $page->show('Admin'));
    $_GET = $gets;
    $this->assign("formget",$_GET);
    $this->assign("posts",$posts);
    $this->display( );

}
public function cash_order_info(){
		//根据订单ID查充值订单详情
	 	$order_id = I('get.id',0,'intval');
	 	if($order_id){
     $orderinfos = M('temp_cash_order','ecs_')
     ->alias('a')
     ->join('ecs_temp_buyers b on b.temp_buyers_id = a.user_id')
     ->field("a.*,b.nick,b.invitation,b.invitation_person")
     ->where(array("order_id"=>$order_id))
     ->find();
    // dump($orderinfos);
     $this->assign('vo',$orderinfos);
     $this->display();

	 	}else{
	 		$this->error('数据传入失败！');
	 	}

}
/*确认收货，填写实收金额表单页*/
function confirmation_goods(){
	$id = I('get.id');
	$sn = I('get.sn');
	$invitation_id = I('get.invitation_id');
	if(isset($_GET['edit'])){
		    $this->assign('edit',1);
	}
	$this->assign('id',$id);
	$this->assign('sn',$sn);
	$this->assign('invitation_id',$invitation_id);
	$this->display();

}
function received_cash(){

	    $id = I('post.purchase_id');
	    $sn = I('post.purchase_sn');
	    $actually_money = $_POST['actually_money']+0;
     
     if ($id && $sn) {
     	   if(isset($_POST['edit'])){//只是编辑实收金额
     	   				$data = array('actually_money'=>$actually_money);
			    						$rst = M("temp_purchase",'ecs_')->where(array("temp_purchase_id"=>$id))->data($data)->save();
			    						if($rst){
			    							$url = "javascript:";
			    							echo "<script language=\"javascript\">alert('编辑实收金额成功');location.href=\"".$url."\"</script>";
														//	$this->success('编辑实收金额成功',U('AdminPage/order_info',array('id'=>$id)));
															
			    						}else{
																	$this->error('编辑实收金额失败！');
			    						}
     	   }else{
			    		/*事务操作
			    		1，订单表修改状态由3->4，填上actually_money
			    		2，payment表type5->6
			    		3,邀请红包
			    		*/

			    		$model = new Model();
									$model->startTrans();
			    		$data = array('actually_money'=>$actually_money,'state'=>4,'finish_time'=>time());
			    		$rst = M("temp_purchase",'ecs_')->where(array("temp_purchase_id"=>$id))->data($data)->save();
			      $data1 = array('type'=>6);
									$rst1 = M("temp_payment",'ecs_')->where(array("type"=>5,'temp_purchase_sn'=>$sn))->data($data1)->save();


									
									$invitation_id = I('post.invitation_id');
									//有邀请人
			    		if($invitation_id){
							       $goods_area_id = M('temp_purchase_goods','ecs_')->where(array('temp_purchase_id'=>$id))->getField('area_id');
							       $order_money = M('temp_purchase','ecs_')->where(array('temp_purchase_id'=>$id))->getField('money');
							       $bonus_info = M('temp_bonus','ecs_')->where(array('goods_area_id'=>$goods_area_id,'bonus_status'=>0,'send_type'=>3))->find();
      								if($bonus_info){//有没有可加的红包

                    if($order_money >= $bonus_info['min_amount']){//有红包
                        $hongbao = $bonus_info['bonus_money'] != 0 ? $bonus_info['bonus_money'] : $bonus_info['cash_back']*$order_money;

                    }else{
                        $hongbao = 0;
                    }

       							}
     								 if($hongbao){//有红包
			     									//查出邀请人信息
											    		$invitations = M('temp_buyers','ecs_')->where(array('temp_buyers_id'=>$invitation_id))->find();
											      //查有没有给邀请人加过红包，在payment表查下订单
                 $invitation_send_bonus = M('temp_payment','ecs_')->where(array('temp_purchase_sn'=>$sn,'type'=>10,'user_id'=>$invitation_id,'money'=>$hongbao))->count();
                 if(!$invitation_send_bonus){//没有加过红包
																    		//判断邀请人是否有账户在acount
    
																    		$invitation_acount = M('temp_account','ecs_')->where(array('temp_buyers_id'=>$invitation_id))->count();

													     				if(!$invitation_acount){//创建账户

																	    			$data['temp_buyers_id'] = $invitation_id;
																	    			$action = M('temp_account','ecs_')->add($data);
																	    			if(!$action){
																	    				 $model->rollback();
																	         $this->error('创建邀请人账户失败！');
																	        
																	    			}
													 				    }
                    //在payment 给此订单，邀请人加上type=10红包亏损纪录
                     $sql2 = 'insert into ecs_temp_payment (temp_purchase_sn,time,from_user,to_user,to_account,type,user_id,money,client_from) values (\''.$sn.'\',\''.time().'\',\''.$invitations['temp_buyers_mobile'].'\',\'品材网支付\',\'hbz@pcw268.com\',10,\''.$invitation_id.'\',\''.$hongbao.'\',99)';
              
                    //给邀请人在用户红包表加一条红包记录
                     $sql3 = 'insert into ecs_temp_cash (cash_bonus_id,cash_sn,user_id,state,cash_time,purchase_id,cash_money) values ('.$bonus_info['bonus_id'].',\'99\','.$invitation_id.',0,'.time().',\''.$id.'\','.$hongbao.')';
                   
                    //在邀请人账户TOTAL加上红包，红包记录字段累加红包
                     $sql4 = 'update ecs_temp_account set total = total + '.$hongbao.', bonus_money = bonus_money+'.$hongbao.' where temp_buyers_id ='.$invitation_id;
																
													
																					$rs2 = $model->execute($sql2);
																					$rs3 = $model->execute($sql3);
																					$rs4 = $model->execute($sql4);

																					if($rst && $rst1 && $rs2 && $rs3 && $rs4){
                        $model->commit();
                        
			    						          	echo "<script language=\"javascript\">alert('编辑实收金额成功');window.open('".$url."')</script>";
																								$this->success("确认收货成功！");
																					}else{
																						  $model->rollback();
			
																						  $this->error('确认收货失败！');
																					}
																	}else{//已经加过红包
																					 if($rst && $rst1){
																	    			 $model->commit();
																	    			 echo "<script language=\"javascript\">alert('编辑实收金额成功');window.open('".$url."')</script>";
																	    				$this->success("确认收货成功！");
														    	 			}else{
																	        $model->rollback(); 
																    
																	 						 $this->error('确认收货失败！');
														    					} 

																	}
              }else{//没有红包
              				  if($rst && $rst1){
												    			 $model->commit();
												    			 echo "<script language=\"javascript\">alert('编辑实收金额成功');window.open('".$url."')</script>";
												    				$this->success("确认收货成功！");
												    	 	}else{
												        $model->rollback();  
												         
												 							$this->error('确认收货失败！');
												    		} 

              }
       
        }else{//没有邀请人
			    		 if($rst && $rst1){
			    			 $model->commit();
			    			 echo "<script language=\"javascript\">alert('编辑实收金额成功');window.open('".$url."')</script>";
			    				$this->success("确认收货成功！");
			    	 	}else{
			        $model->rollback();  
			       
			 							$this->error('确认收货失败！');
			    		} 
       }
      }
   		} else {
    		$this->error('数据传入失败！');
     }
  
    // echo "<script>$('.aui_close).trigger('click')</script>";
   //$this->display('AdminPage/index');
}













}