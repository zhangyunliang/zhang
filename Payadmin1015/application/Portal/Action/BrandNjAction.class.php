<?php

/**
 * Class BrandnjAction
 * 南京品牌管理
 */
class BrandNjAction extends AdminbaseAction
{
	protected $brand;
	protected $goods_category;

	function _initialize(){
		parent::_initialize();
		$this->brand=M('temp_brand_nj','ecs_');
		$this->goods_category=M('goods_category_nj','ecs_');
	}

	function index(){
		$count=$this->brand->count();
		$page=$this->page($count,10);

        $list=$this->brand->join('ecs_goods_category_nj ON ecs_temp_brand_nj.goods_category_id = ecs_goods_category_nj.goods_category_id')
            ->order('brand_id')
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        $this->assign('list',$list);
        $this->assign('page',$page->show("Admin"));
        $this->display();
	}

    function add(){
        $res=$this->goods_category->select();
        $this->assign('list',$this->getfen($res));
        //dump($this->getfen($res));
        $this->display();
    }

    /**
     * 实现无限分类
     */
    function getfen($arr,$parent_id=0,$lev=0){
        static $list=array();
        foreach($arr as $v):
            if($v['parent_id']==$parent_id){
                $list[]=array(
                    'goods_category_name'=>str_repeat('&nbsp;&nbsp;',$lev).'|--'.$v['goods_category_name'],
                    'goods_category_id'=>$v['goods_category_id'],
                    'cat_id'=>$v['cat_id'],
                    'grade'=>$v['grade'],
                );
                $this->getfen($arr,$v['goods_category_id'],$lev+1);
            }
            endforeach;
        return $list;
    }

    function add_post(){
        if(is_post){
            $rules=array(
                array('brand_name','require','品牌名称不能为空',1,'regex',3),
            );

            if($this->brand->validate($rules)->create()){
                if(isset($_REQUEST['goods_category_id'])&& $_REQUEST['goods_category_id']!='0'){
                    if($this->brand->add()!==false){
                        $this->success('添加成功!',U("BrandNj/index"));
                    }else{
                        $this->error("添加失败!");
                    }
                }else{
                    $this->error("品牌类型不能为空!");
                }
            }else{
                $this->error($this->brand->getError());
            }
        }
    }

    function edit(){
        $id=I("get.id");
        $data=$this->brand
        ->join('ecs_goods_category_nj ON ecs_temp_brand_nj.goods_category_id = ecs_goods_category_nj.goods_category_id')
        ->where(array('brand_id'=>$id))->find();
        $this->assign('data',$data);
        $res=$this->goods_category->select();
        $this->assign('list',$this->getfen($res));
        $this->display();
    }

    function edit_post(){
        if(is_post){
            $rules=array(
                array('brand_name','require','品牌名称不能为空!',1,'regex',3),
            );
            if($this->brand->validate($rules)->create()){
                if(isset($_REQUEST['goods_category_id'])&& $_REQUEST['goods_category_id']!='0'){
                    if($this->brand->save()!==false){
                        $this->success("修改成功!",U("BrandNj/index"));
                    }else{
                        $this->error("修改失败!");
                    }
                }else{
                    $this->error("品牌类型不能为空!");
                }
            }else{
                $this->error($this->brand->getError());
            }
        }
    }

    function delete(){
        $id=intval(I("get.id"));
        if($this->brand->delete($id)!==false){
            $this->success("删除成功!");
        }else{
            $this->error("删除失败!");
        }
    }
}
