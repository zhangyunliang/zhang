<?php
/**
 * Created by PhpStorm.
 * User: yunliang
 * Date: 2015/11/19
 * Time: 14:39
 */
class ColorshAction extends AdminbaseAction
{
    protected $color_sh;
    protected $category;
    protected $goods;

    function _initialize(){
        parent::_initialize();
        $this->color_sh=M('temp_color_sh','ecs_');
        $this->category=M('goods_category','ecs_');
        $this->goods=M('goods','ecs_');
    }

    function index(){
        $count=$this->color_sh->count();
        $page=$this->page($count,20);
        $cli=$this->color_sh->alias('a')
            ->join('ecs_goods_category b ON a.goods_category_id=b.goods_category_id')
            ->order('color_id')
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        $this->assign('list',$cli);
        $this->assign('page',$page->show("Admin"));
        $this->display();
    }

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
        $res=$this->category->select();
        $this->assign('list',self::fen($res));
        $this->display();
    }

    function add_post(){
        if(is_post){
            $rules=array(
                array('color','require','颜色必须填写',1,'regex',3),
                array('goods_category_id','/^[1-9]\d*$/','请选择类型'),
            );

            if($this->color_sh->validate($rules)->create()){
                if($this->color_sh->add()!==false){
                    $this->success('添加成功',U('Colorsh/index'));
                }else{
                    $this->error('添加失败');
                }
            }else{
                $this->error($this->color_sh->getError());
            }
        }
    }

    function edit(){
        $cid=intval(I("get.id"));
        $res=$this->color_sh->alias('a')
            ->join('ecs_goods_category b ON a.goods_category_id=b.goods_category_id')
            ->where("color_id= ($cid)")
            ->find();
        $this->assign('data',$res);
        $this->display();
    }

    function edit_post(){
        //更改颜色时商品表也要改
        $id=$_REQUEST['color_id'];
        $data['goods_color']=$_REQUEST['color'];
        $rules=array(
            array('color','require','请填写正确的颜色',1,'regex',3),
        );
        if($this->color_sh->validate($rules)->create()){
            $model=new Model();
            $model->startTrans();

            $this->goods->where("color_id= ($id)")->save($data);
            if($this->color_sh->where("color_id= ($id)")->save()!==false){
                $model->commit();
                $this->success('修改成功',U('Colorsh/index'));
            }else{
                $model->rollback();
                $this->error('编辑失败');
            }
        }else{
            $this->error($this->color_sh->getError());
        }

    }

    function delete(){
        $id=intval(I("get.id"));
        if($this->color_sh->where("color_id= ($id)")->delete()!==false){
            $this->success('删除成功',U('Colorsh/index'));
        }else{
            $this->error('删除失败');
        }

    }

}