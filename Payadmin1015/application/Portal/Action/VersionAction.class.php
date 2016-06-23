<?php

/**
 * 型号管理
 * @author yunliang
 *
 */
class VersionAction extends AdminbaseAction
{
	protected $temp_version;
	protected $goods_obj;
	function _initialize(){
		parent::_initialize();
		$this->temp_version=M('temp_version','ecs_');
		$this->goods_obj=M('goods_category','ecs_');
	}
	
	function index(){
		//分页显示列表
		$result=$this->temp_version;
		$count=$result->count();
		
		//指定分页
		$page=$this->page($count,10);
		$show=$page->show("Admin");
		
		$list=$result->join('ecs_goods_category ON ecs_temp_version.goods_category_id=ecs_goods_category.goods_category_id')
		->order('version_id')
		->limit($page->firstRow.','.$page->listRows)
		->select();
		//dump($list);
		$this->assign("list",$list);//页面数据
		$this->assign("page",$show);//分页
		$this->display();
	}
	
	function add(){
		//拿到数组数据
		$res=$this->goods_obj->select();
		$this->assign('list',$this->fen($res));
		
		//dump($this->fen($res));
		$this->display();
	}
	
	/*
	 * $arr 要分的数据
	 * $lev 深度变量
	 * $parent_id 一级id
	 */
	function fen($arr,$parent_id=0,$lev=0){
		//$lev=$lev+2;
		static $list=array();
		
		foreach ($arr as $v){
			if($v['parent_id']==$parent_id){
				//将需要的数组拿出
				$list[]=array(
						'goods_category_name'=>str_repeat('&nbsp;&nbsp;', $lev).'|--'.$v['goods_category_name'],
						'goods_category_id'=>$v['goods_category_id'],
						'grade'=>$v['grade'],
						'cat_id'=>$v['cat_id'],
						);
				//最重要的一步（递归）$lev也可以写成：$lev+1
				$this->fen($arr,$v['goods_category_id'],$lev+1);
			}
		}
		return $list;
	}
	
	function add_post(){
		if(IS_POST){
			//创建对象
			$rules=array(
					//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
					array('version','require','型号名称不能为空',1,'regex',3),
			);
			if($this->temp_version->validate($rules)->create()){
				if(isset($_REQUEST['goods_category_id'])&& ($_REQUEST['goods_category_id']!='0')){
					if($this->temp_version->add()){
						$this->success("添加成功！",U('Version/index'));
					}else{
						$this->error("添加失败！");
					}
				}else{
					$this->error("品牌类型不能为空！");
				}
			}else{
				$this->error($this->temp_version->getError());
			}
		}
	}
	
	function edit(){
		//取得型号的数据
		$id=intval(I('get.id'));
		$data=$this->temp_version->where(array('version_id'=>$id))
		->join('ecs_goods_category ON ecs_temp_version.goods_category_id=ecs_goods_category.goods_category_id')
		->find();
		$this->assign('data',$data);
		
		//取得类型的数据
		$res=$this->goods_obj->select();
		$this->assign('list',$this->fen($res));
		$this->display();
	}
	
	function edit_post(){
		if(IS_POST){
			$rules=array(
					//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
					array('version','require','型号名称不能为空',1,'regex',3),
			);
			if($this->temp_version->validate($rules)->create()){
				if(isset($_REQUEST['goods_category_id'])&& ($_REQUEST['goods_category_id']!='0')){
					if($this->temp_version->save()!==false){
						$this->success("修改成功！",U("Version/index"));
					}else{
						$this->error("修改失败！");
					}
				}else{
					$this->error("品牌类型不能为空！");
				}
			
			}else{
                $this->error("请正确填写!");
            }
		}else{
			$this->error($this->temp_version->getError());
		}
	}
	
	function delete(){
		$id=intval(I('get.id'));
		if($this->temp_version->delete($id)!==false){
			$this->success('删除成功!');
		}else{
			$this->delete('删除失败！');
		}
	}
	
	function listorders(){
		$status=parent::_listorders($this->temp_version);
		
		if($status){
			$this->success("排序成功！");
		}else{
			$this->error("排序失败！");
		}
	}
}