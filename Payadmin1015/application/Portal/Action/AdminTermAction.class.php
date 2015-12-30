<?php

/*
 * 分类
 */
class AdminTermAction extends AdminbaseAction {

	protected $terms_obj;

	//protected $taxonomys=array("article"=>"文章","picture"=>"图片");//用不到
	function _initialize() {
		parent::_initialize();
		$this->terms_obj = M('goods_category','ecs_');
		//$this->assign("taxonomys",$this->taxonomys);

	}
	function index(){
		//将结果集从小到大排序
		$result = $this->terms_obj->select();
		//dump($result);
       /*  $tree = new PathTree();
        $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '---';
       	$tree->init($result);
       	$tree=$tree->get_tree();
       	$this->assign("terms",$tree); */
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		//dump($tree->icon);
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			//<a href="' . U("AdminTerm/add", array("parent_id" => $r['goods_category_id'])) . '">添加子类</a> |
			$r['str_manage'] = '<a href="' . U("AdminTerm/edit", array("id" => $r['goods_category_id'])) . '">修改</a> | <a class="J_ajax_del" href="' . U("AdminTerm/delete", array("id" => $r['goods_category_id'])) . '">删除</a> ';
			$url=U('portal/list/index',array('id'=>$r['goods_category_id']));
			$r['url'] = $url;
			//$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];w  f   w
			$r['id']=$r['goods_category_id'];
			$r['parentid']=$r['parent_id'];
			$array[] = $r;
			//dump($r);
		}
// 		<td>\$taxonomys</td>
// 		<td align='center'><a href='\$url' target='_blank'>访问</a></td>
		//					<td><input name='listord ers[\$id]' type='text' size='3' value='\$listorder' class='input input-order'></td>
		$tree->init($array);
		$str = "<tr>
					<td>\$id</td>
					<td>\$spacer <a href='\$url' target='_blank'>\$goods_category_name</a></td>
					<td>\$str_manage</td>
				</tr>";
		$taxonomys = $tree->get_tree(0, $str);
		//dump($taxonomys);
		$this->assign("taxonomys", $taxonomys);
		$this->display();

	}


	function add(){

	 	//dump($parentid);
// 	 	$tree = new PathTree();
// 	 	$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
// 	 	$tree->nbsp = '---';
// 	 	$result = $this->terms_obj->order(array("sort_order"=>"asc"))->select();
// 	 	$tree->init($result);//转为数组
// 	 	$tree=$tree->get_tree();
// 	 	$this->assign("terms",$tree);
// 		$parent_id = intval(I("parent_id"));
// 	 	$data=$this->terms_obj
// 	 	->where(array("goods_category_id"=>$parent_id))
// 	 	->find();
// 	 	$this->assign('data',$data);
	 	$result = $this->terms_obj->select();
	 	$this->assign('list',$this->fen($result));
	 	//$this->assign("parent",$parent_id);
	 	//echo $this->terms_obj->getLastSql();
	 	$this->display();

	}


	//递归实现无线分类
	function fen($arr,$parent_id=0,$lev=0){
		//定义深度变量自增
		//$lev=$lev+2;
		static $list=array();

		foreach($arr as $v){
			if($v['parent_id']==$parent_id){
				//输出测试
				//echo str_repeat(" ",$lev).$v['goods_category_name'].'<br />';
				$list[]=array(
						'goods_category_name'=>str_repeat('&nbsp;&nbsp;',$lev).'|--'.$v['goods_category_name'],
						'goods_category_id'=>$v['goods_category_id'],
						'grade'=>$v['grade'],
						'cat_id'=>$v['cat_id'],
				);
				$this->fen($arr,$v['goods_category_id'],$lev+1);
			}
		}

		return $list;
	}


	function add_post(){

		if (IS_POST) {
			//dump($_POST);
			//file_put_contents('a.txt',$_POST);
			//echo D("Category")->getLastSql();
			//addOperationLog();
			//验证规则
			$rules=array(
					//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
					array('goods_category_name','require','分类名称不能为空',1,'regex',3),
					array('grade','require','级别为必填项',1,'regex',3),
			);


					if ($this->terms_obj->validate($rules)->create()) {
							if(!is_numeric($_REQUEST['grade'])){
									$this->error("亲，您输的是数字吗？");
								}
						if ($this->terms_obj->add()!==false) {
							//$this->success("添加成功！");
							$this->success("添加成功！",U("AdminTerm/index"));
						} else {
							$this->error("添加失败！");
						}
					} else {
						$this->error($this->terms_obj->getError());
					}
		}
	}

	function edit(){
		$id = intval(I("get.id"));
		//goods_category_id
		//判断是否能修改，如果有还有子类就不能再修改
		$count = $this->terms_obj->where(array("parent_id" => $id))->count();
		if ($count > 0) {
			$this->error("该菜单下还有子类，无法修改！");
		}

// 		$tree = new PathTree();
// 		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
// 		$tree->nbsp = '---';
// 		$result = $this->terms_obj->where(array("goods_category_id" => array("NEQ",$id)))->order(array("sort_order"=>"asc"))->select();
// 		$tree->init($result);
// 		$tree=$tree->get_tree();

 		$data=$this->terms_obj->where(array("goods_category_id" => $id))->find();
 		$this->assign("data",$data);

		$result = $this->terms_obj->select();
		$this->assign('list',$this->fen($result));
		$this->display();
	}

	function edit_post(){
		if (IS_POST) {
			$rules=array(
					//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
					array('goods_category_name','require','分类名称不能为空',1,'regex',3),
					array('grade','require','级别为必填项',1,'regex',3),
			);
					if ($this->terms_obj->validate($rules)->create()) {
						if(!is_numeric($_REQUEST['grade'])){
								$this->error("亲，您输的是数字吗？");
							}
						if ($this->terms_obj->save()!==false) {
							$this->success("修改成功！",U("AdminTerm/index"));
						} else {
							$this->error("修改失败！");
						}
					} else {
						$this->error($this->terms_obj->getError());
					}


		}
	}

	//排序
	public function listorders() {
		$status = parent::_listorders($this->terms_obj);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}

	/**
	 *  删除
	 */
	public function delete() {
		$id = intval(I("get.id"));
		$count = $this->terms_obj->where(array("parent_id" => $id))->count();
		if ($count > 0) {
			$this->error("该菜单下还有子类，无法删除！");
		}
		if ($this->terms_obj->delete($id)!==false) {
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}

	/* public function show(){
		$result = $this->terms_obj->order(array("listorder"=>"asc"))->select();
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$name=$r['name'];
			$url=U('post/lists',array('term'=>$r['term_id']));
			$r['name']="<a class='term_link' href='$url' >$name</a>";
			$array[$r['term_id']] = $r;
		}
		$str = "<tr>
				<td >\$spacer\$name</td>
				</tr>";
		$tree->init($array);

		$categorys = $tree->get_tree(0, $str);;

		$this->assign("categorys", $categorys);
		$this->display();
	} */
}
