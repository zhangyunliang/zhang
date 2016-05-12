<?php
/**
 * 颜色管理
 * @author yunliang
 *
 */
class ColorAction extends AdminbaseAction
{
	protected $temp_color;
	protected $goods;
	function _initialize(){
		parent::_initialize();
		$this->temp_color=D('TempColor');
		$this->goods=M('goods','ecs_');
	}

	function index(){
		$result=$this->temp_color;

		$count=$result->count();
		$page=$this->page($count,10);
		$show=$page->show("Admin");
		$list=$this->temp_color
		->order('color_id')
		->limit($page->firstRow.','.$page->listRows)
		->select();
		$this->assign('list',$list);
		$this->assign('page',$show);


		$model=M('goods','ecs_');
		$model->goods_id=1911;
		$model->shop_price=array('exp',array($model->private_price-$model->public_price));
		$model->save();

		$this->display();
	}

	function add(){

		$this->display();
	}

	function add_post(){
		if(IS_POST){

			if($this->temp_color->create()){
				if(!empty($_REQUEST['color'])){
					if($this->temp_color->add()!==false){
						$this->success("添加成功！",U("Color/index"));
					}else{
						$this->error("添加失败！");
					}
				}else{
					$this->error("请填写正确颜色名称！");
				}
			}
		}else{
			$this->error($this->temp_color->getError());
		}
	}

	function edit(){
		//获取颜色的数据
		$id=intval(I('get.id'));
		$data=$this->temp_color->where(array('color_id'=>$id))
		->find();
		$this->assign('data',$data);
		$this->display();
	}

	function edit_post(){
		if(IS_POST){
			$data['goods_color']=$_REQUEST['color'];
			$colorid=$_REQUEST['color_id'];
			$rules=array(
					//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
					array('color','require','不能为空',1,'regex',3),
			);
			if($this->temp_color->validate($rules)->create()){
				if($this->temp_color->save()!==false){
					if($this->goods->where(array('color_id'=>$colorid))->save($data)!==false){
						$this->success("修改成功！",U("Color/index"));
					}
				}else{
					$this->error("修改失败！");
				}
			}else{
                $this->error("请正确填写!");
            }
		}else{
			$this->error($this->temp_color->getError());
		}
	}

	function delete(){
		$id=intval(I('get.id'));
		if($this->temp_color->delete($id)!==false){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}



}
