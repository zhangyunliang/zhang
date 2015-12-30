<?php

/**
 * 品牌管理
 * @author yunliang
 *
 */
class BrandAction extends AdminbaseAction
{
	protected $brand_obj;
	protected $goods_obj;
	protected $goods;
	function _initialize(){
		parent::_initialize();
		$this->brand_obj=M('temp_brand','ecs_');
		$this->goods_obj=M('goods_category','ecs_');
		$this->goods=M('goods','ecs_');
	}

	
	function index(){
		$result=$this->brand_obj;

		//获取数据总量
		$count=$result->count();
		//每页10条
		$page=$this->page($count,10);
		$show=$page->show("Admin");
		$list=$result->join('ecs_goods_category ON ecs_temp_brand.goods_category_id=ecs_goods_category.goods_category_id')
		->order("brand_id")
		->limit($page->firstRow .','. $page->listRows)
		->select();
		
		$this->assign("list",$list);//赋值数据
		$this->assign("page",$show);//分页显示输出
		$this->display();
	}
	
	

	function add(){
		
		$res=$this->goods_obj->select();
		$this->assign('list',$this->fen($res));
		//dump($this->fen($res));
		
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
	
	
	function edit(){
		
		$id=intval(I('get.id'));
		//dump($id);
		$data=$this->brand_obj->where(array("brand_id"=>$id))
		->join('ecs_goods_category ON ecs_temp_brand.goods_category_id=ecs_goods_category.goods_category_id')
		->find();
		// dump($data);
		
		$res=$this->goods_obj->select();
		$this->assign('list',$this->fen($res));
		//dump($this->fen($res));
		$this->assign('data',$data);
		$this->display();
		
	}
	//添加提交
	function add_post(){
		//dump($_POST);
		if(IS_POST){
			$rules=array(
					//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
					array('brand_name','require','品牌名称不能为空',1,'regex',3),
					
			);
			if($this->brand_obj->validate($rules)->create()){
				if(isset($_REQUEST['goods_category_id'])&& $_REQUEST['goods_category_id']!='0'){
					
					if($this->brand_obj->add()!==false){
						$this->success("添加成功！",U("Brand/index"));
					}else{
						$this->error("添加失败！");
					}
				}else{
					$this->error("品牌类型不能为空！");
				}
			}else{
				$this->error($this->brand_obj->getError());
			}
		}
	}
	
	//修改提交
	function edit_post(){
		//dump($_POST);
		$bid=$_REQUEST['brand_id'];
		$data['brand_name']=$_REQUEST['brand_name'];
		if(IS_POST){
			$rules=array(
					//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
					array('brand_name','require','品牌名称不能为空',1,'regex',3),
			);
			if($this->brand_obj->validate($rules)->create()){
				if(isset($_REQUEST['goods_category_id'])&& $_REQUEST['goods_category_id']!='0'){

					if($this->brand_obj->save()!==false){
						//先修改品牌表再修改所有goods表对应的名称
						if($this->goods->where(array('brand_id'=>$bid))->save($data)!==false){
							$this->success("修改成功！",U("Brand/index"));
						}
					}else{
						$this->error("修改失败！");
					}
				}else{
					$this->error("品牌类型不能为空！");
				}	
				
			}else{
				$this->error($this->brand_obj->getError());
			}
		}
	}
	
	
	//删除品牌 
	public function delete(){
		$id=intval(I('get.id'));
		
		if($this->brand_obj->delete($id)!==false){
			$this->success("删除成功！");
		}
		else{
			$this->error("删除失败！");
		}
	}

}