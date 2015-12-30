<?php
/**
 * Created by PhpStorm.
 * User: yunliang
 * Date: 2015/11/11
 * Time: 12:48
 */
class VersionwpAction extends AdminbaseAction
{
    protected $version;
    protected $category;

    function _initialize(){
        parent::_initialize();
        $this->category=M('goods_category_wh','ecs_');
        $this->version=M('temp_version_wh','ecs_');
    }

    function index(){

        $count=$this->version->count();
        $page=$this->page($count,10);

        $res=$this->version->alias('a')
            ->join('ecs_goods_category_wh b ON a.goods_category_id=b.goods_category_id')
            ->order('version_id')
            ->limit($page->firstRow.','.$page->listRows)
            ->select();

        $this->assign('list',$res);
        $this->assign('page',$page->show('Admin'));
        $this->display();
    }


    function fen($arr,$parent_id=0,$lev=0){
        static $list=array();

        foreach($arr as $v){
            if($v['parent_id']==$parent_id){
                $list[]=array(
                    'goods_category_name'=>str_repeat('&nbsp;&nbsp;',$lev).'|--'.$v['goods_category_name'],
                    'goods_category_id'=>$v['goods_category_id'],
                    'cat_id'=>$v['cat_id'],
                    'grade'=>$v['grade'],
                );
                self::fen($arr,$v['goods_category_id'],$lev+1);
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
                array('version','require','型号必填',1,'regex',3),
                array('goods_category_id','/^[1-9]\d*$/','分类必选'),
            );

            if($this->version->validate($rules)->create()){
                if($this->version->add()!==false){
                    $this->success("添加成功",U('Versionwp/index'));
                }else{
                    $this->error("添加失败");
                }
            }else{
                $this->error($this->version->getError());
            }
        }
    }

    function edit(){
        $id=I('get.id');
        $res=$this->version->alias('a')
            ->join('ecs_goods_category_wh b ON a.goods_category_id=b.goods_category_id')
            ->where(array('version_id'=>$id))
            ->find();
        $this->assign('data',$res);

        $res2=$this->category->select();
        $this->assign('list',self::fen($res2));
        $this->display();
    }

    function edit_post(){
        if(is_post){
            $rules=array(
                array('version','require','型号必填',1,'regex',3),
                array('goods_category_id','/^[1-9]\d*$/','型号必选'),
            );
            if($this->version->validate($rules)->create()){
                if($this->version->save()!==false){
                    $this->success("修改成功",U('Versionwp/index'));
                }else{
                    $this->error('修改失败');
                }
            }else{
                $this->error($this->version->getError());
            }
        }
    }

    function delete(){

        $id=I('get.id');
        if($this->version->where(array('version_id'=>$id))->delete()!==false){
            $this->success('删除成功',U('Versionwp/index'));
        }else{
            $this->error("删除失败");
        }
    }
}