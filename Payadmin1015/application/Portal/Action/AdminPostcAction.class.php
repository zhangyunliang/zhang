<?php

/**
 * 南京商品列表
 * @author yunliang
 *
 */
class AdminPostcAction extends AdminbaseAction
{
	protected $goods_obj;
	protected $category;
	protected $brand;
	protected $version;
	protected $color_obj;
	protected $users;

	function _initialize(){
		parent::_initialize();
		$this->goods_obj=M('goods_nj','ecs_');
		$this->category=M('goods_category_nj','ecs_');
		$this->brand=M('temp_brand_nj','ecs_');
		$this->version=M('temp_version_nj','ecs_');
		$this->color_obj=M('temp_color_nj','ecs_');
		$this->users=D('Users');
	}

	function index(){
		//条件
		$where='';
		//类型条件
		$type=$this->category->select();
		$this->assign('type',$this->gettype($type));
		//品牌条件
		$brand=$this->brand->select();
		$this->assign('brands',$brand);
		//型号条件
		$version=$this->version->select();
		$this->assign('versions',$version);
		//颜色条件
		$color=$this->color_obj->select();
		$this->assign('colors',$color);

		//dump($_POST);

		//获取搜索条件栏的条件
		if(is_post){
			if(isset($_REQUEST['goods_cat_id'])&& $_REQUEST['goods_cat_id']!='0'){
				$where['a.goods_cat_id']=$_REQUEST['goods_cat_id'];
				$fenlei=$_REQUEST['goods_cat_id'];
				$_GET['goods_cat_id']=$_REQUEST['goods_cat_id'];
			}
			if(isset($_REQUEST['brand_id'])&& $_REQUEST['brand_id']!='0'){
				$where['a.brand_id']=$_REQUEST['brand_id'];
				$pinpai=$_REQUEST['brand_id'];
				$_GET['brand_id']=$_REQUEST['brand_id'];
			}
			if(isset($_REQUEST['version_id'])&& $_REQUEST['version_id']!='0'){
				$where['version_id']=$_REQUEST['version_id'];
				$xinhao=$_REQUEST['version_id'];
				$_GET['version_id']=$_REQUEST['version_id'];
			}
			if(isset($_REQUEST['color_id'])&& $_REQUEST['color_id']!='0'){
				$where['color_id']=$_REQUEST['color_id'];
				$yanse=$_REQUEST['color_id'];
				$_GET['color_id']=$_REQUEST['color_id'];
			}
			if(isset($_REQUEST['keyword'])&& !empty($_REQUEST['keyword'])){
				$where['goods_name']=array('like','%'.trim($_REQUEST['keyword'].'%'));
				$goodsname=$_REQUEST['keyword'];
				$_GET['keyword']=trim($_REQUEST['keyword']);
			}
		}
		//将选中的值还给页面
		$this->assign('cat',$fenlei);
		$this->assign('pinpai',$pinpai);
		$this->assign('vs',$xinhao);
		$this->assign('yanse',$yanse);


		$count=$this->goods_obj->where($where)->count();
		$page=$this->page($count,20);

		$res=$this->goods_obj->alias('a')
			->join("ecs_goods_category_nj b ON a.goods_cat_id=b.goods_category_id")
			->join("cms_suppliers c ON a.cms_suppliers_id=c.suppliers_id")
			->field('a.goods_id,a.cat_id,a.goods_version,a.goods_name,a.brand_name,a.is_delete,a.is_pass,
			a.is_delete,a.admin_id,a.goods_cat_id,a.color_id,a.version_id,a.brand_id,a.goods_color,a.goods_name_id,
			a.cms_suppliers_id,c.suppliers_name,c.suppliers_id,b.goods_category_name')
		->where($where)
		->limit($page->firstRow.','.$page->listRows)
		->select();
		//将昵称加入数组
			foreach ($res as $key=>$val){

					$str=$this->users->where(array('id'=>$val['admin_id']))->find();

					$res[$key]['user_nicename']=$str['user_nicename'];

			}

		$this->assign('formget',$_GET);
		$this->assign('lists',$res);
		$this->assign('page',$page->show("Admin"));

		$this->display();
	}

	//递归得到分类
	function gettype($arr,$parent_id=0,$lev=0){
		static $list=array();
			foreach ($arr as $v):
				if($v['parent_id']==$parent_id){
				$list[]=array(
						'goods_category_name'=>str_repeat('&nbsp;&nbsp;',$lev).'|--'.$v['goods_category_name'],
						'goods_category_id'=>$v['goods_category_id'],
						'grade'=>$v['grade'],
						'cat_id'=>$v['cat_id'],
						);
				$this->gettype($arr,$v['goods_category_id'],$lev+1);
			}
			endforeach;
		return $list;
	}



	//审核和批量审核
	function check(){
		$admin_id=intval(get_current_admin_id());
        $p=isset($_REQUEST['p'])?$_REQUEST['p']+0:1;
		//批量
		if(isset($_POST['ids'])&& $_GET['check'] ){
			$data['is_pass']=1;
			$data['admin_time']=time();
			$data['admin_id']=$admin_id;
			$ids=join(',', $_POST['ids']);

			if($this->goods_obj->where("goods_id in ($ids)")->save($data)!==false){
				$this->success("审核成功！",U('AdminPostc/index',array('p'=>$p)));
			}else{
				$this->error("审核失败！");
			}
		}
		if(isset($_POST['ids'])&& $_GET['uncheck']){
			$data['is_pass']=0;
			$data['admin_time']=time();
			$data['admin_id']=$admin_id;
			$ids=join(',',$_POST['ids']);
			if($this->goods_obj->where("goods_id in ($ids)")->save($data)!==false){
				$this->success("取消审核成功！",U('AdminPostc/index',array('p'=>$p)));
			}else{
				$this->error("取消审核失败！");
			}
		}
		//单次
		if(isset($_GET['id'])&& $_GET['check']){
			$data['is_pass']=1;
			$data['admin_time']=time();
			$data['admin_id']=$admin_id;
			$id=I("get.id");
			if($this->goods_obj->where(array('goods_id'=>$id))->save($data)!==false){
				$this->success("审核通过！",U('AdminPostc/index',array('p'=>$p)));
			}else{
				$this->error("审核失败！");
			}
		}
		if(isset($_GET['id'])&& $_GET['uncheck']){
			$data['is_pass']=0;
			$data['admin_time']=time();
			$data['admin_id']=$admin_id;
			$id=I("get.id");
			if($this->goods_obj->where(array('goods_id'=>$id))->save($data)!==false){
				$this->success("取消审核成功！",U('AdminPostc/index',array('p'=>$p)));
			}else{
				$this->error("取消审核失败！");
			}
		}

	}


	function choose(){

		$catid=$_POST['cat_id'];
		$list[0]=$this->brand->where(array('goods_category_id'=>$catid))->select();
		$list[1]=$this->version->where(array('goods_category_id'=>$catid))->select();
		echo json_encode($list);
	}

	//商品查看
	function look(){
		//http://www.pcw365.com/ecshop2/display/goods.php?goods_id=1175
		$id=intval(I("get.id"));
		$_SESSION['area_id']=2;//南京
		//redirect("http://".$_SERVER['HTTP_HOST']."/PCMall/display/goods.php?goods_id=$id");
		redirect("http://".$_SERVER['HTTP_HOST']."/ecshop2/display/goods.php?goods_id=$id");

	}



}
