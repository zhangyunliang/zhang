<?php
class AdminBonusAction extends AdminbaseAction {
	protected $posts_obj;
	protected $terms_relationship;
	protected $terms_obj;
	
	function _initialize() {
		parent::_initialize();
		$this->posts_obj = D("Posts");
		$this->terms_obj = D("Terms");
		$this->terms_relationship = D("TermRelationships");
	}
	function index(){
//展示出促销类型列表
		$bonus_model = M('temp_bonus','ecs_');
		$count = $bonus_model->count();
		$page = $this->page($count, 20);
		$list = $bonus_model
		->alias('a')
		->join('ecs_goods_area b on b.goods_area_id = a.goods_area_id')
		->limit($page->firstRow . ',' . $page->listRows)
		->order("bonus_id ASC")
		->select();
		$this->assign("Page", $page->show('Admin'));
  $this->assign('list',$list);
		$this->display();
	}
	
	function add(){
		$areas = M('goods_area','ecs_')->field('goods_area_id,goods_area')->select();
		$this->assign('areas',$areas);
		//dump($this->$areas);
		$this->display();
	}
	
		function add_post(){
		if (IS_POST) {
			$_POST['bonus_name'] = trim($_POST['bonus_name']);
			$_POST['bonus_money'] = $_POST['bonus_money']+0;
			$_POST['cash_back'] = $_POST['cash_back']+0;
			$_POST['send_type'] = trim($_POST['send_type']);
			//$_POST['send_start_date'] = strtotime($_POST['send_start_date']);
			//$_POST['send_end_date'] = strtotime($_POST['send_end_date']);
			$_POST['use_start_date'] = strtotime( $_POST['use_start_date'].'0:0:0');
			$_POST['use_end_date'] = strtotime($_POST['use_end_date'].'23:59:59');
			$_POST['comment'] = trim($_POST['comment']);
			$_POST['bonus_status'] = trim($_POST['bonus_status'])+0;
			$_POST['add_time'] = time();
			$_POST['min_amount']=$_POST['min_amount'];
			$_POST['max_amount']=$_POST['max_amount'];
			$_POST['goods_area_id']=$_POST['goods_area_id']+0;
			$result=M('temp_bonus','ecs_')->add($_POST);
			if ($result) {
				$this->success("添加成功！");
			} else {
				$this->error("添加失败！");
			}
		}
	}
	
	public function edit(){
		$areas = M('goods_area','ecs_')->field('goods_area_id,goods_area')->select();
		$this->assign('areas',$areas);
		$id=  intval(I("get.bid"));
		$info = M('temp_bonus','ecs_')->where("bonus_id=$id")->find();
		
// 		if($info['send_start_date']!=0){
//      		 $info['send_start_date'] = date('Y-m-d',$info['send_start_date']);
// 		}else{
// 			   unset($info['send_start_date']);
// 		}
// 		if($info['send_end_date']!=0){
//       		$info['send_end_date'] = date('Y-m-d',$info['send_end_date']);
// 		}else{
//    			  unset($info['send_end_date']);
// 		}
		if($info['use_start_date']!=0){
      		$info['use_start_date'] = date('Y-m-d',$info['use_start_date']);
		}else{
    		unset($info['use_start_date']);
		}
		if($info['use_end_date']!=0){
     		 $info['use_end_date'] = date('Y-m-d',$info['use_end_date']);

		}else{
			unset($info['use_end_date']);
		}
		$this->assign('info',$info);
		$this->display();
	}
	
	public function edit_post(){

		if (IS_POST) {
    //dump($_POST);
			$data['bonus_id'] = $_POST['bonus_id']+0;
  	$data['bonus_name'] = trim($_POST['bonus_name']);
			$data['bonus_money'] = $_POST['bonus_money']+0;
			$data['cash_back'] = $_POST['cash_back']+0;
			$data['send_type'] = trim($_POST['send_type']);
			//$data['send_start_date'] = strtotime($_POST['send_start_date']);
			//$data['send_end_date'] = strtotime($_POST['send_end_date']);
			$data['use_start_date'] = strtotime( $_POST['use_start_date'].'0:0:0');
			$data['use_end_date'] = strtotime($_POST['use_end_date'].'23:59:59');
			$data['comment'] = trim($_POST['comment']);
			$data['bonus_status']=$_POST['bonus_status'];
			$data['max_amount']=$_POST['max_amount'];
			$data['min_amount']=$_POST['min_amount'];
			$data['goods_area_id']=$_POST['goods_area_id']+0;

			$result=M('temp_bonus','ecs_')->save($data);
			if ($result!==false) {
				$this->success("保存成功！");
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
	
	private  function _lists($status=1){
		$term_id=0;
		if(!empty($_REQUEST["term"])){
			$term_id=intval($_REQUEST["term"]);
			$term=$this->terms_obj->where("term_id=$term_id")->find();
			$this->assign("term",$term);
			$_GET['term']=$term_id;
		}
		
		$where_ands=empty($term_id)?array("a.status=$status"):array("a.term_id = $term_id and a.status=$status");
		
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
			
			
		$count=$this->terms_relationship
		->alias("a")
		->join(C ( 'DB_PREFIX' )."posts b ON a.object_id = b.id")
		->where($where)
		->count();
			
		$page = $this->page($count, 20);
			
			
		$posts=$this->terms_relationship
		->alias("a")
		->join(C ( 'DB_PREFIX' )."posts b ON a.object_id = b.id")
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("a.listorder ASC,b.post_modified DESC")->select();
		$users_obj = D("Users");
		$users_data=$users_obj->field("id,user_login,role_id")->where("user_status=1")->select();
		$users=array();
		foreach ($users_data as $u){
			$users[$u['id']]=$u;
		}
		$this->assign("users",$users);
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}
	
	private function _getTree(){
		$term_id=empty($_REQUEST['term'])?0:intval($_REQUEST['term']);
		$result = $this->terms_obj->order(array("listorder"=>"asc"))->select();
		
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminTerm/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminTerm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="J_ajax_del" href="' . U("AdminTerm/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=$term_id==$r['term_id']?"selected":"";
			$array[] = $r;
		}
		
		$tree->init($array);
		$str="<option value='\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
	}
	
	function delete(){
		//dump($_REQUEST['bid']);
		//dump($_REQUEST['p']);
		$p = isset($_REQUEST['p'])?$_REQUEST['p']+0:1;
		$bid = isset($_REQUEST['bid'])?$_REQUEST['bid']+0:1;
		
		if(isset($_REQUEST['ids'])){
			$ids = $_REQUEST['ids'];
			//dump($ids);
			if(M('temp_cash','ecs_')->where("cash_id in ($ids) and state = 1")->delete()) {
				$this->success("删除成功！",U('AdminBonus/user_bonus',array('p'=>$p,'bid'=>$bid)));
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_REQUEST['cid'])){
				$cid = intval(I("get.cid"));
				if (M('temp_cash','ecs_')->where("cash_id=$cid and state = 1")->delete()) {
					
					$this->success("删除成功！",U('AdminBonus/user_bonus',array('p'=>$p,'bid'=>$bid)));
				} else {
					$this->error("删除失败！");
				}
			}
		}


	}
	
	function check(){
		if(isset($_POST['ids']) && $_GET["check"]){
			$data["post_status"]=1;
			
			$tids=join(",",$_POST['ids']);
			$objectids=$this->terms_relationship->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_obj->where("id in ($ids)")->save($data)!==false) {
				$this->success("审核成功！");
			} else {
				$this->error("审核失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["uncheck"]){
			
			$data["post_status"]=0;
			$tids=join(",",$_POST['ids']);
			$objectids=$this->terms_relationship->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_obj->where("id in ($ids)")->save($data)) {
				$this->success("取消审核成功！");
			} else {
				$this->error("取消审核失败！");
			}
		}
	}
	
	function top(){
		if(isset($_POST['ids']) && $_GET["top"]){
			$data["istop"]=1;
				
			$tids=join(",",$_POST['ids']);
			$objectids=$this->terms_relationship->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_obj->where("id in ($ids)")->save($data)!==false) {
				$this->success("置顶成功！");
			} else {
				$this->error("置顶失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["untop"]){
				
			$data["istop"]=0;
			$tids=join(",",$_POST['ids']);
			$objectids=$this->terms_relationship->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_obj->where("id in ($ids)")->save($data)) {
				$this->success("取消置顶成功！");
			} else {
				$this->error("取消置顶失败！");
			}
		}
	}
	
	function recommend(){
		if(isset($_POST['ids']) && $_GET["recommend"]){
			$data["recommended"]=1;
	
			$tids=join(",",$_POST['ids']);
			$objectids=$this->terms_relationship->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_obj->where("id in ($ids)")->save($data)!==false) {
				$this->success("推荐成功！");
			} else {
				$this->error("推荐失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["unrecommend"]){
	
			$data["recommended"]=0;
			$tids=join(",",$_POST['ids']);
			$objectids=$this->terms_relationship->field("object_id")->where("tid in ($tids)")->select();
			$ids=array();
			foreach ($objectids as $id){
				$ids[]=$id["object_id"];
			}
			$ids=join(",", $ids);
			if ( $this->posts_obj->where("id in ($ids)")->save($data)) {
				$this->success("取消推荐成功！");
			} else {
				$this->error("取消推荐失败！");
			}
		}
	}
	
	
	
	
	function move(){
		if(IS_POST){
			if(isset($_GET['ids']) && isset($_POST['term_id'])){
				$tids=$_GET['ids'];
				if ( $this->terms_relationship->where("tid in ($tids)")->save($_POST)) {
					$this->success("移动成功！");
				} else {
					$this->error("移动失败！");
				}
			}
		}else{
			$parentid = intval(I("get.parent"));
			$tree = new PathTree();
			$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
			$tree->nbsp = '---';
			$result =$this->terms_obj->order(array("path"=>"asc"))->select();
			$tree->init($result);
			$tree=$tree->get_tree();
			$this->assign("terms",$tree);
			
			$this->display();
		}
	}
	
	function recyclebin(){
		$this->_lists(0);
		$this->_getTree();
		$this->display();
	}
	
	function clean(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$tids= implode(",", array_keys($_POST['ids']));
			$data=array("post_status"=>"0");
			$status=$this->terms_relationship->where("tid in ($tids)")->delete();
			if($status!==false){
				$status=$this->posts_obj->where("id in ($ids)")->delete();
			}
			
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$tid = intval(I("get.tid"));
				$status=$this->terms_relationship->where("tid = $tid")->delete();
				if($status!==false){
					$status=$this->posts_obj->where("id=$id")->delete();
				}
				if ($status!==false) {
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
			$data=array("tid"=>$id,"status"=>"1");
			if ($this->terms_relationship->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	function user_bonus(){
		//dump($_GET);
		if(isset($_GET['bid'])){
		$bid = intval(I("get.bid"));
		$send_type = M('temp_bonus','ecs_')->where(array('bonus_id'=>$bid))->getField('send_type');


  if($send_type == '0'){//充值红包

  		$user_bonus_model = M('temp_cash_order','ecs_');
  		$join = array('ecs_temp_cash as b on a.order_id =b.order_id','ecs_temp_bonus as c on a.bonus_id =c.bonus_id','ecs_temp_buyers as d on d.temp_buyers_id=a.user_id');
   	$field = 'b.cash_money,b.cash_id,b.cash_bonus_id,b.cash_sn,b.user_id,b.cash_time,b.state,a.order_sn,a.order_amount,a.bonus_money ,c.send_type,c.bonus_name ,c.bonus_money as type_bonus_money,c.cash_back,d.temp_buyers_mobile,d.nick,c.bonus_status';
    $where = 'a.bonus_id ='.$bid.' and b.cash_money != 0';

  }else if($send_type == '1' or $send_type == '5'){//用户红包/凭空发红包
  		$user_bonus_model = M('temp_cash','ecs_');
  		$join = array('ecs_temp_bonus as c on a.cash_bonus_id =c.bonus_id','ecs_temp_buyers as d on d.temp_buyers_id=a.user_id');
  		$field = 'a.cash_money,a.cash_id,a.cash_bonus_id,a.cash_sn,a.user_id,a.cash_time,a.state,c.send_type,c.bonus_name,c.bonus_money,c.cash_back,d.temp_buyers_mobile,d.nick,c.bonus_status';
    $where = array('a.cash_bonus_id'=>$bid);
  }else if ($send_type == '3'){//订单红包
  	 $user_bonus_model = M('temp_cash','ecs_');
  	 $join = array('ecs_temp_bonus as c on a.cash_bonus_id =c.bonus_id','ecs_temp_buyers as d on d.temp_buyers_id=a.user_id','ecs_temp_purchase as b on b.temp_purchase_id=a.purchase_id');
  	 $field = 'a.cash_money,a.cash_id,a.cash_bonus_id,a.cash_sn,a.user_id,a.cash_time,a.state,c.send_type,c.bonus_name,c.bonus_money,c.cash_back,d.temp_buyers_mobile,d.nick,c.bonus_status,d.invitation,b.temp_purchase_sn,b.money';
 			$where = array('a.cash_bonus_id'=>$bid);
  }

		$count = $user_bonus_model
		->alias("a")
		->join($join)
		->where($where)
		->count();
		$page = $this->page($count,4);
		$posts = $user_bonus_model
		->alias("a")
		->join($join)
	 ->field($field)
	 ->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->select();
	//dump($posts);

  if(empty($posts)){

    $this->assign('lists', 0);
  }else{
  	$this->assign("page", $page->show('Admin'));
  
			$this->assign('posts', $posts);
	}
	 $this->assign("send_type", $send_type);
		$this->display();
		}else{//全部红包

			$this->error("数据传入有误！");
		}
	
	}

	
}