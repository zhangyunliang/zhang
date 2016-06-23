<?php
class AdminTermNjAction extends AdminbaseAction
{

    protected $goods_category;
	function _initialize(){
		parent::_initialize();
        $this->goods_category=M('goods_category_nj','ecs_');
	}

	function index(){

        $res=$this->goods_category->select();
        $tree=new Tree();
        $tree->icon=array('&nbsp;&nbsp;&nbsp; |','&nbsp;&nbsp;&nbsp;|--','&nbsp;&nbsp;&nbsp; └─');
        $tree->nbsp='&nbsp;&nbsp;&nbsp;';

        foreach($res as $v){
            $v['menu']='<a href="' .U("AdminTermNj/edit",array("id"=>$v['goods_category_id'])). '">修改</a> | <a class="J_ajax_del" href="' .U("AdminTermNj/delete",array("id"=>$v['goods_category_id'])). '">删除</a>';
            $v['id']=$v['goods_category_id'];
            $v['parentid']=$v['parent_id'];
            $array[]=$v;
        }
        $tree->init($array);
        $str="<tr>
            <td>\$id</td>
            <td>\$spacer<a>\$goods_category_name</a></td>
            <td>\$menu</td>
            </tr>";
        $list=$tree->get_tree(0,$str);
        $this->assign('tree',$list);
		$this->display();
	}


    function add(){

        $res=$this->goods_category->select();
        $this->assign('list',$this->fen($res));
        //dump(end($this->fen($res)));
        $this->display();
    }

    function add_post(){
        if(is_post){
            $rules=array(
                array('goods_category_name','require','类型名称不能为空!',1,'regex',3),
                array('grade','require','类型级别必填',1,'regex',3),
            );


                if($this->goods_category->validate($rules)->create()){
                  if(!is_numeric($_REQUEST['grade'])){
                      $this->error("亲，您输的是数字吗？");
                    }
                    if(isset($_REQUEST['parent_id'])){
                        if($this->goods_category->add()!==false){
                            $this->success("添加成功!",U("AdminTermNj/index"));
                        }else{
                            $this->error("添加失败!");
                        }
                    }else{
                        $this->error("必须选择准确的上级");
                    }
                }else{
                    $this->error($this->goods_category->getError());
                }
        }
    }

    function fen($arr,$parent_id=0,$lev=0){
        static $list=array();

        foreach($arr as $v){
            if($v['parent_id']==$parent_id){
                $list[]=array(
                    'goods_category_name'=>str_repeat('&nbsp;&nbsp;&nbsp;',$lev).'|--'.$v['goods_category_name'],
                    'goods_category_id'=>$v['goods_category_id'],
                    'cat_id'=>$v['cat_id'],
                    'grade'=>$v['grade'],
                );
                $this->fen($arr,$v['goods_category_id'],$lev+1);
            }

        }
        return $list;
    }

    function edit(){
        $id=intval(I("get.id"));
        $count=$this->goods_category->where(array('parent_id'=>$id))->count();
        if ($count > 0) {
          $this->error("该菜单下还有子类，无法修改！");
        }

        $data=$this->goods_category->where(array('goods_category_id'=>$id))->find();
        $this->assign('data',$data);

        $res=$this->goods_category->select();
        $this->assign('list',$this->fen($res));
        $this->display();
    }

    function edit_post(){
        if(is_post){

            if($this->goods_category->create()){
              if(!is_numeric($_REQUEST['grade'])){
                  $this->error("亲，您输的是数字吗？");
                }
                if($this->goods_category->save()!==false){
                    $this->success("修改成功!",U("AdminTermNj/index"));
                }else{
                    $this->error("修改失败!");
                }
            }else{
                $this->error($this->goods_category->getError());
            }
        }
    }

    function delete(){
        $id=intval(I("get.id"));
        $count=$this->goods_category->where(array('parent_id'=>$id))->count();
        if($count>0){
            $this->error("该菜单下还有子类，无法删除！");
        }
        if($this->goods_category->delete($id)!==false){
            $this->success("删除成功!");
        }else{
            $this->error("删除失败!");
        }
    }
}
