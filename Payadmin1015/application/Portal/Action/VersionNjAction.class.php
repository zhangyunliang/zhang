<?php
class VersionNjAction extends AdminbaseAction
{
    protected $version;
    protected $category;
	function _initialize(){
		parent::_initialize();
        $this->version=M('temp_version_nj','ecs_');
        $this->category=M('goods_category_nj','ecs_');
	}

	function index(){
		$count=$this->version->count();
        $page=$this->page($count,10);

        $res=$this->version->join('ecs_goods_category_nj ON ecs_temp_version_nj.goods_category_id=ecs_goods_category_nj.goods_category_id')
            ->limit($page->firstRow.','.$page->listRows)
            ->order('version_id')
            ->select();
        $this->assign('list',$res);
        $this->assign('page',$page->show("Admin"));
        $this->display();
	}

    function add(){
        $res=$this->category->select();
        $this->assign('list',$this->fen($res));
        $this->display();
    }
    function fen($arr,$parent_id=0,$lev=0){
        static $list=array();
        foreach($arr as $v){
            if($v['parent_id']==$parent_id){
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
        if(is_post){
            $rules=array(
                array('version','require','品牌为必填项',1,'regex',3),
            );
            if($this->version->validate($rules)->create()){
                if(isset($_REQUEST['goods_category_id'])&& $_REQUEST['goods_category_id']!='0'){
                    if($this->version->add()!==false){
                        $this->success("添加成功!",U("VersionNj/index"));
                    }else{
                        $this->error("添加失败!");
                    }
                }else{
                    $this->error('型号类型为必填项');
                }
            }else{
                $this->error($this->version->getError());
            }
        }
    }

    function edit(){
        $id=intval(I("get.id"));
        $res=$this->version->alias('a')
            ->join('ecs_goods_category_nj b ON a.goods_category_id=b.goods_category_id')
            ->where(array('version_id'=>$id))->find();
        $this->assign('data',$res);

        $list=$this->category->select();
        $this->assign('list',$this->fen($list));
        $this->display();
    }

    function edit_post(){
        if(is_post){
            $rules=array(
                array('version','require','型号为必填项',1,'regex',3),
            );
            if($this->version->validate($rules)->create()){
                if(isset($_REQUEST['goods_category_id'])&& $_REQUEST['goods_category_id']!='0'){
                    if($this->version->save()!==false){
                        $this->success("修改成功!",U("VersionNj/index"));
                    }else{
                        $this->error("修改失败!");
                    }
                }else{
                    $this->error('类型为必填项');
                }
            }else{
                $this->error($this->version->getError());
            }
        }
    }

    function delete(){
        $id=intval(I("get.id"));
        if($this->version->delete($id)){
            $this->success("删除成功!");
        }else{
            $this->error("删除失败!");
        }
    }



}
