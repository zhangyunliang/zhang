<?php
/**
 * Created by PhpStorm.
 * User: yunliang
 * Date: 2015/11/11
 * Time: 12:46
 */
class BrandwpAction extends AdminbaseAction
{

    protected $brand_wh;
    protected $category_wh;
    protected $goods;

    function _initialize(){
        parent::_initialize();
        $this->goods=M('goods_wh','ecs_');
        $this->brand_wh=M('temp_brand_wh','ecs_');
        $this->category_wh=M('goods_category_wh','ecs_');
    }

    function index(){
        $res=$this->brand_wh->alias('a')
            ->join('ecs_goods_category_wh b ON a.goods_category_id=b.goods_category_id')
            //->field('')
            ->order('brand_id')->select();

        $count=$this->brand_wh->count();
        $page=$this->page($count,10);
        $res=$this->brand_wh->alias('a')
            ->join('ecs_goods_category_wh b ON a.goods_category_id=b.goods_category_id')
            //->field('')
                ->limit($page->firstRow.','.$page->listRows)
            ->order('brand_id')->select();

        //var_dump($res);
        $this->assign('page',$page->show("Admin"));
        $this->assign('list',$res);
        $this->display();
    }
    //递归分类
    function fen($arr,$parent_id=0,$lev=0){
        static $list=array();

        foreach($arr as $vo){
            if($vo['parent_id']==$parent_id){
                $list[]=array(
                    'goods_category_name'=>str_repeat('&nbsp;&nbsp;',$lev).'|--'.$vo['goods_category_name'],
                    'goods_category_id'=>$vo['goods_category_id'],
                    'cat_id'=>$vo['cat_id'],
                    'grade'=>$vo['grade'],
                );
                self::fen($arr,$vo['goods_category_id'],$lev+1);
            }
        }
        return $list;
    }
    function add(){
        //显示品牌类型
        $res=$this->category_wh->select();
        $this->assign('list',self::fen($res));
        $this->display();
    }

    function add_post(){
        if(is_post){
            $rules=array(
                array('brand_name','require','品牌名称不能为空',1,'regex',3),
                array('goods_category_id','/^[1-9]\d*$/','品牌类型必选'),
            );
            if($this->brand_wh->validate($rules)->create()){
                if($this->brand_wh->add()!==false){
                    $this->success("添加成功！",U('Brandwp/index'));
                }else{
                    $this->error("添加失败!");
                }
            }else{
                $this->error($this->brand_wh->getError());
            }
        }
    }

    function edit(){
        $id=I('get.id');
        $res=$this->brand_wh->alias('a')
            ->join('ecs_goods_category_wh b ON a.goods_category_id=b.goods_category_id')
            ->where(array('brand_id'=>$id))->find();
        $this->assign('data',$res);
        $this->display();
    }

    function edit_post(){
        if(is_post){
            $data['brand_name']=$_REQUEST['brand_name'];
            $bid=$_REQUEST['brand_id'];

            $rules=array(
                array('brand_name','require','品牌名称不能为空',1,'regex',3),
            );

            if($this->brand_wh->validate($rules)->create()){
                if($this->brand_wh->save()!==false){
                    if($this->goods->where(array('brand_id'=>$bid))->save($data)!==false){
                        $this->success('更新成功',U('Brandwp/index'));
                    }else{
                        $this->error("更新失败");
                    }
                }
            }else{
                $this->error($this->brand_wh->getError());
            }

        }
    }

    function delete(){
        $id=I("get.id");
        if($this->brand_wh->delete($id)!==false){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

}