<?php
/**
 * Created by PhpStorm.
 * User: yunliang
 * Date: 2015/11/11
 * Time: 12:52
 */
//唯品分类管理
class AdminTermwpAction extends AdminbaseAction
{
    protected $category;
    function _initialize(){
        parent::_initialize();
        $this->category=M('goods_category_wh','ecs_');
    }

    function index(){
        $res=$this->category->select();

        $tree=new Tree();
        $tree->nbsp="&nbsp;&nbsp;&nbsp;";
        $tree->icon=array('&nbsp;&nbsp;&nbsp; |','&nbsp;&nbsp;&nbsp;|--','&nbsp;&nbsp;&nbsp; └─');
        //$tree->icon="<img src=\"__ROOT__\statics\images\.zhi.jpg\">";
        foreach($res as $vo){
            $vo['str_manage']='<a href="'.U('AdminTermwp/edit',array('id'=>$vo['goods_category_id'])).'">修改</a>|<a class="J_ajax_del" href="'.U('AdminTermwp/delete',array('id'=>$vo['goods_category_id'])).'">删除</a>';
            $vo['id']=$vo['goods_category_id'];
            $vo['parentid']=$vo['parent_id'];
            $array[]=$vo;
        }
        $tree->init($array);
        $str="<tr>
            <td>\$id</td>
            <td>\$spacer<a href='# target='_blank'>\$goods_category_name</a></td>
            <td>\$str_manage</td>
        </tr>";
        $text=$tree->get_tree(0,$str);
        $this->assign('text',$text);
        $this->display();
    }

    function fen($arr,$parent_id=0,$lev=0){
        static $list=array();
        foreach($arr as $vo){
            if($vo['parent_id']==$parent_id){
                $list[]=array(
                    'goods_category_name'=>str_repeat("&nbsp;&nbsp;",$lev).'|--'.$vo['goods_category_name'],
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
                array('goods_category_name','require','分类名称必填',1,'regex',3),
                array('grade','/^[1-9]\d*$/','请填写级别(数字)'),
            );

            if($this->category->validate($rules)->create()){
                if($this->category->add()!==false){
                    $this->success("添加成功",U('AdminTermwp/index'));
                }else{
                    $this->error("添加失败");
                }
            }else{
                $this->error($this->category->getError());
            }
        }
    }


    function edit(){
        $id=I('get.id');

        //做子级判断
        $count=$this->category->where(array('parent_id'=>$id))->select();
        if($count>0){
            $this->error("该分类下有子级无法修改");
        }

        $res=$this->category->where(array('goods_category_id'=>$id))->find();
        $res2=$this->category->select();
        $this->assign('list',self::fen($res2));
        $this->assign('data',$res);
        $this->display();
    }

    function edit_post(){
        //分类修改只是修改本表
        if(is_post){

            $rules=array(
                array('goods_category_name','require','分类名称必须填写',1,'regex',3),
                array('grade','/^[1-9]\d*$/','请填写级别(数字)'),
            );

            if($this->category->validate($rules)->create()){
                if($this->category->save()!==fasle){
                    $this->success("修改成功",U('AdminTermwp/index'));
                }else{
                    $this->error("修改失败");
                }
            }else{
                $this->error($this->category->getError());
            }
        }



    }

    function delete(){
        $id=I('get.id');

        //做子级判断
        $count=$this->category->where(array('parent_id'=>$id))->select();
        if($count>0){
            $this->error("该分类下有子级无法删除");
        }

        if($this->category->where(array('goods_category_id'=>$id))->delete()!==false){
            $this->success('删除成功',U('AdminTermwp/index'));
        }else{
            $this->error("删除失败");
        }

    }
}