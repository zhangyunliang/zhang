<?php

/**
 * 上海商品列表
 * @author yunliang
 *
 */
class AdminPostbAction extends AdminbaseAction
{
	protected $goods_obj;
	protected $category;
	protected $brand;
	protected $version;
	protected $color_obj;
	protected $users;
	protected $suppliers;
	protected $goods_name;
	function _initialize(){
		parent::_initialize();
		$this->goods_obj=M('goods','ecs_');
		$this->category=M('goods_category','ecs_');
		$this->brand=M('temp_brand','ecs_');
		$this->version=M('temp_version','ecs_');
		$this->color_obj=M('temp_color_sh','ecs_');
		$this->users=M('cmf_users','ecs_');
		$this->suppliers=M('suppliers','cms_');
		$this->goods_name=M('goods_name','ecs_');
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
		->join("ecs_goods_category b ON a.goods_cat_id=b.goods_category_id")
		->join("cms_suppliers c ON a.cms_suppliers_id=c.suppliers_id")
			->field('a.goods_id,a.cat_id,a.goods_version,a.goods_name,a.brand_name,a.is_delete,a.is_pass,
			a.is_delete,a.admin_id,a.goods_cat_id,a.color_id,a.version_id,a.brand_id,a.goods_color,a.goods_name_id,
			a.cms_suppliers_id,c.suppliers_name,c.suppliers_id,b.goods_category_name')
		->where($where)->order('goods_id')
		->limit($page->firstRow.','.$page->listRows)
		->select();
		//将昵称加入数组
		foreach ($res as $key=>$val){

				$str=$this->users->where(array('id'=>$val['admin_id']))->find();

				$res[$key]['user_nicename']=$str['user_nicename'];

		}


		//dump(end($res));
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


		//获取当前的管理员
		$admin_id=intval(get_current_admin_id());

    	$p=isset($_REQUEST['p'])?$_REQUEST['p']+0:1;
        //array('cat_id'=>$cat_id,'brand_id'=>$brand_id,'version_id'=>$version_id,'color_id'=>$color_id )
		if(isset($_POST['ids'])&& $_GET['check'] ){
			$data['is_pass']=1;
			$data['admin_time']=time();
			$data['admin_id']=$admin_id;
			$ids=join(',', $_POST['ids']);
			if($this->goods_obj->where("goods_id in ($ids)")->save($data)!==false){

				$this->success("审核成功！",U('AdminPostb/index',array('p'=>$p)));
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

          $this->success("审核成功！",U('AdminPostb/index',array('p'=>$p)));
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

          $this->success("审核成功！",U('AdminPostb/index',array('p'=>$p)));
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

        $this->success("审核成功！",U('AdminPostb/index',array('p'=>$p)));
			}else{
				$this->error("取消审核失败！");
			}
		}

	}


	function choose(){

		$catid=$_POST['cat_id'];
		$list[0]=$this->brand->where(array('goods_category_id'=>$catid))->select();
		$list[1]=$this->version->where(array('goods_category_id'=>$catid))->select();
		//$list[2]=$this->color_obj->where(array('goods_category_id'=>$catid))->select();
		echo json_encode($list);
	}
	//商品查看
	function look(){
		//http://www.pcw365.com/ecshop2/display/goods.php?goods_id=1175
			$id=intval(I("get.id"));
			$_SESSION['area_id']=1;//上海

				// echo '<script>
				// var GV = {
				//     DIMAUB: "Payadmin1015/",
				//     JS_ROOT: "statics/js/",
				//     TOKEN: ""
				// };</script>';
				// echo "<script src=\"statics/js/jquery.js\"></script>";
				// echo "<script src=\"statics/js/wind.js\"></script>";
				// echo "<script src=\"statics/simpleboot/bootstrap/js/bootstrap.min.js\"></script>";
				// echo "<script src=\"statics/js/common.js\"></script>";
      			// echo "<script src=\"statics/js/ajaxForm.js\"></script>";
				// echo "<script src=\"statics/js/artDialog/artDialog.js\"></script>";
				// echo "<script src=\"statics/js/artDialog/iframeTools.js\"></script>";
				//	 echo "<script>location.href=\"javascript:open_iframe_dialog()\"</script>";


				//echo "<script>window.open('www.baidu.com');</script>";
				//redirect("http://".$_SERVER['HTTP_HOST']."/PCMall/display/goods.php?goods_id=$id");
				redirect("http://".$_SERVER['HTTP_HOST']."/ecshop2/display/goods.php?goods_id=$id");
	}


	function edit(){

		$gid=$_REQUEST['id'];
		$goods=$this->goods_obj->where("goods_id= ($gid)")->find();
		$this->assign('goods',$goods);
		//var_dump($goods);
		//将对应的参数返回页面
		$category=$this->category->select();
		$this->assign('list1',self::gettype($category));
		$brand=$this->brand->select();
		$this->assign('list2',$brand);
		$color=$this->color_obj->select();
		$this->assign('list3',$color);
		$suppliers=$this->suppliers->select();
		$this->assign('list4',$suppliers);
		$this->display();
	}

	function edit_post()
	{
		//商品编辑
		$id = $_REQUEST['goods_id'];
		$data['last_update'] = time();
		$data['admin_id'] = intval(get_current_admin_id());
		//判断选项是否已经选择和填写
		if (isset($_REQUEST['goods_cat_id']) && ($_REQUEST['goods_cat_id'] != '-1')) {
			$data['goods_cat_id'] = $_REQUEST['goods_cat_id'];
			//修改cat_id
			$gid=$_REQUEST['goods_cat_id'];
			$cate=$this->category->where("goods_category_id= ($gid)")->find();
			$pid=$cate['parent_id'];
			$cate1=$this->category->where("goods_category_id= ($pid)")->find();
			$data['cat_id']=$cate1['cat_id'];

			//获取需要的goods_category_id
			$res['goods_category_id']=$_REQUEST['goods_cat_id'];
			$res2['goods_category_id']=$_REQUEST['goods_cat_id'];
		} else {
			$this->error("请选择商品分类！");
		}
		//==========================
		if (isset($_REQUEST['brand_id']) && ($_REQUEST['brand_id'] != '-1')) {
			$data['brand_id'] = $_REQUEST['brand_id'];
		} else {
			$this->error("请选择品牌！");
		}
		//==========================
		if (isset($_REQUEST['color_id']) && ($_REQUEST['color_id'] != '-1')) {
			$data['color_id'] = $_REQUEST['color_id'];
		} else {
			$this->error("请选择商品颜色！");
		}
		//==========================
		if (isset($_REQUEST['cms_suppliers_id']) && ($_REQUEST['cms_suppliers_id'] != '-1')) {
			$data['cms_suppliers_id'] = $_REQUEST['cms_suppliers_id'];
		} else {
			$this->error("请选择供应商！");
		}
		//==========================
		if (isset($_REQUEST['goods_name']) && !empty($_REQUEST['goods_name'])) {
			if (!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u', $_REQUEST['goods_name'])) {
				$this->error('请填写正确的商品名');
			}else{
				$data['goods_name'] = $_REQUEST['goods_name'];
				$res['goods_name']=$_REQUEST['goods_name'];
			}
		} else {
			$this->error("请输入商品名称！");
		}
		//==========================

		if (isset($_REQUEST['goods_unit']) && !empty($_REQUEST['goods_unit'])) {
			if (!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u', $_REQUEST['goods_unit'])) {
				$this->error('请填写正确的商品单位');
			}else{
				$data['goods_unit'] = $_REQUEST['goods_unit'];
			}
		} else {
			$this->error("请输入商品单位！");
		}
		//==========================

		if (isset($_REQUEST['goods_version']) && !empty($_REQUEST['goods_version'])) {
			if (!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u', $_REQUEST['goods_version'])) {
				$this->error('请填写正确的商品型号');
			}else{
				$data['goods_version'] = $_REQUEST['goods_version'];
				$res2['version']=$_REQUEST['goods_version'];
			}
		} else {
			$this->error("请输入商品型号！");
		}

		//==========================
		if (isset($_REQUEST['public_price'])) {
			if (!is_numeric($_REQUEST['public_price'])) {
				$this->error("请输入正确的公开价");
			}else{
				$data['public_price'] = $_REQUEST['public_price'];
			}
		} else {
			$this->error("请输入商品公开价！");
		}
		if (isset($_REQUEST['shop_price'])) {
			if (!is_numeric($_REQUEST['shop_price'])) {
				$this->error("请输入正确的会员价");
			}else{
				$data['shop_price'] = $_REQUEST['shop_price'];
			}
		} else {
			$this->error("请输入商品会员价！");
		}
		if (isset($_REQUEST['private_price'])) {
			if (!is_numeric($_REQUEST['private_price'])) {
				$this->error("请输入正确的内部价");
			}else{
				$data['private_price'] = $_REQUEST['private_price'];
			}
		} else {
			$this->error("请输入商品内部价！");
		}


			$model=new Model();
			$model->startTrans();
			if(!empty($_REQUEST['goodsnames'])&& $_REQUEST['goodsnames']='1'){
				$data['goods_name_id']=$this->goods_name->add($res);
			}
			if(!empty($_REQUEST['getversions'])&& $_REQUEST['getversions']='1'){
				$data['version_id']=$this->version->add($res2);
			}

		if($this->goods_obj->where(array('goods_id' => $id))->save($data)!==false){
			$model->commit();
			$this->success("修改成功", U('AdminPostb/index'));
		}else{
			$model->rollback();
			$this->error("修改失败", U('AdminPostb/index'));
		}

	}

	function getbrand(){
		$id=$_REQUEST['goods_category_id'];
		$res=$this->brand->where("goods_category_id= ($id)")->select();
		echo json_encode($res);
	}

	function delete(){
		$id=$_REQUEST['gid'];
		$data['is_pass']=0;
		$data['is_delete']=1;
		if($this->goods_obj->where("goods_id= ($id)")->save($data)!==false){
			$this->success('已删除');
		}else{
			$this->error('删除失败');
		}
	}

	function back(){
		$id=$_REQUEST['bid'];
		$data['is_pass']=1;
		$data['is_delete']=0;
		if($this->goods_obj->where("goods_id= ($id)")->save($data)!==false){
			$this->success('已恢复');
		}else{
			$this->error('回复失败');
		}
	}

	//ajax获取型号
	function pdversion(){
		//获取查询相同分类下是否有相同的型号
		$id=$_REQUEST['goodsid'];
		$version=$_REQUEST['vs'];
		$res=$this->version->where(array('goods_category_id'=>$id,'version'=>$version))->find();
		if($res){
			echo json_encode($res);
		}else{
			echo 0;
		}

	}

	//ajax判断商品名称
	function pdname(){
		$name=$_REQUEST['spname'];
		$id=$_REQUEST['goodsid'];
		$res=$this->goods_name->where(array('goods_category_id'=>$id,'goods_name'=>$name))->find();
		if($res){
			echo json_encode($res);
		}else{
			echo 0;
		}
	}


}
