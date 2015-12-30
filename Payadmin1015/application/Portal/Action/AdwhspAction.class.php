<?php
/**
 * Created by PhpStorm.
 * User: yunliang
 * Date: 2015/11/10
 * Time: 9:32
 */
/*尾货商品管理*/
class AdwhspAction extends AdminbaseAction
{
    protected $wh_category;//商品分类
    protected $wh_goods_name;//商品名称
    protected $wh_brand;//商品品牌
    protected $wh_version;//商品型号
    protected $wh_goods;//商品
    protected $wh_color;//颜色
    protected $wh_suppliers;//供应商


     function _initialize()
     {
        parent::_initialize();
        $this->wh_category=M('goods_category_wh','ecs_');
        $this->wh_goods_name=M('goods_name_wh','ecs_');
        $this->wh_brand=M('temp_brand_wh','ecs_');
        $this->wh_version=M('temp_version_wh','ecs_');
        $this->wh_goods=M('goods_wh','ecs_');
        $this->wh_color=M('temp_color_wh','ecs_');
        $this->wh_suppliers=M('suppliers','cms_');
    }




    function index()
    {

        //商品分类
        $category=$this->wh_category->select();
        $this->assign('list1',self::fen($category));
        //商品品牌
        $brand=$this->wh_brand->select();
        $this->assign('list2',$brand);
        //商品颜色
        $color=$this->wh_color->select();
        $this->assign('list3',$color);
        //供应商
        $suppliers=$this->wh_suppliers->select();
        $this->assign('list4',$suppliers);
        $this->display();
    }

    //递归分类
    function fen($arr,$parent_id=0,$lev=0)
    {
        static $list=array();

        foreach($arr as $v)
        {
            if($v['parent_id']==$parent_id)
            {
                $list[]=array(
                    'goods_category_name'=>str_repeat('&nbsp;&nbsp;',$lev).'|--'.$v['goods_category_name'],
                    'goods_category_id'=>$v['goods_category_id'],
                    'cat_id'=>$v['cat_id'],
                    'grade'=>$v['grade'],
                );
                $this->fen($arr,$v['goods_category_id'],$lev+1);
            }
        }
        return $list;
    }


    function add_post()
    {

        $data['admin_id']=intval(get_current_admin_id());
        $data['suppliers_id']=18;//固定
        $data['add_time']=time();
        $data['is_delete']=0;
        $data['is_pass']=1;
        //判断用户的选择项
        if(isset($_REQUEST['goods_cat_id'])&&($_REQUEST['goods_cat_id']!='-1')){
            $data['goods_cat_id']=$_REQUEST['goods_cat_id'];
            $result['goods_category_id']=$_REQUEST['goods_cat_id'];
            $result2['goods_category_id']=$_REQUEST['goods_cat_id'];
        }else{
            $this->error('请填写商品分类');
        }

        if(isset($_REQUEST['brand_id'])&& ($_REQUEST['brand_id']!='-1')){
            $data['brand_id']=$_REQUEST['brand_id'];
        }else{
            $this->error("请选择商品品牌");
        }

        if(isset($_REQUEST['color_id'])&& ($_REQUEST['color_id']!='-1')){
            $data['color_id']=$_REQUEST['color_id'];
        }else{
            $this->error("请选择商品颜色");
        }

        if(isset($_REQUEST['cms_suppliers_id']) && ($_REQUEST['cms_suppliers_id']!='-1')){
            $data['cms_suppliers_id']=$_REQUEST['cms_suppliers_id'];
        }else{
            $this->error("请选择供应商");
        }

        if(isset($_REQUEST['goods_name'])&& !empty($_REQUEST['goods_name'])){
            if(!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u',$_REQUEST['goods_name'])){
                $this->error('请填写正确的商品名');
            }else{
                $data['goods_name']=$_REQUEST['goods_name'];
                $result['goods_name']=$_REQUEST['goods_name'];
            }
        }else{
            $this->error("请填写商品名称");
        }

        if(isset($_REQUEST['goods_unit']) && !empty($_REQUEST['goods_unit'])){
            if(!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u',$_REQUEST['goods_unit'])){
                $this->error('请填写正确的商品单位');
            }else{
                $data['goods_unit']=$_REQUEST['goods_unit'];
            }
        }else{
            $this->error("请填写商品单位");
        }

        if(isset($_REQUEST['goods_version'])&& !empty($_REQUEST['goods_version'])){
            if(!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u',$_REQUEST['goods_version'])){
                $this->error('请填写正确的商品型号');
            }else{
                $data['goods_version']=$_REQUEST['goods_version'];
                $result2['version']=$_REQUEST['goods_version'];
            }
        }else{
            $this->error("请填写商品型号");
        }

        if(isset($_REQUEST['public_price'])){
            if(!is_numeric($_REQUEST['public_price'])){
                $this->error("请输入正确的公开价");
            }else{
                $data['public_price']=$_REQUEST['public_price'];
            }
        }else{
            $this->error("请填写公开价");
        }

        if(isset($_REQUEST['shop_price'])){
            if(!is_numeric($_REQUEST['shop_price'])){
                $this->error("请输入正确的会员价");
            }else{
                $data['shop_price']=$_REQUEST['shop_price'];
            }
        }else{
            $this->error("请填写会员价");
        }

        if(isset($_REQUEST['private_price'])){
            if(!is_numeric($_REQUEST['private_price'])){
                $this->error("请输入正确的内部价");
            }else{
                $data['private_price']=$_REQUEST['private_price'];
            }
        }else{
            $this->error("请填写内部价");
        }
        if(isset($_REQUEST['stock'])&& !empty($_REQUEST['stock'])){
            if(!is_numeric($_REQUEST['stock'])){
                $this->error("请输入正确的库存");
            }else{
                $data['stock']=$_REQUEST['stock'];
            }
        }else{
            $this->error("请填写库存");
        }

        $model=new Model();
        $model->startTrans();
        //商品名
        if(empty($_REQUEST['goodsnames'])){
            $data['goods_name_id']=$this->wh_goods_name->add($result);
        }else{
            $data['goods_name_id']=$_REQUEST['goodsnames'];
        }
        //型号
        if(empty($_REQUEST['getversions'])){
            $data['version_id']=$this->wh_version->add($result2);
        }else{
            $data['version_id']=$_REQUEST['getversions'];
        }

        //获取表单insert
        if($lastid=$this->wh_goods->add($data)){
            $model->commit();
            //找到最新的一条记录
            $endinfo=$this->wh_goods->where(array('goods_id'=>$lastid))->find();
            //通过记录补全所有内容
            //cat_id
            $gid=$endinfo['goods_cat_id'];
            $res=$this->wh_category->where(array('goods_category_id'=>$gid))->find();
            $pid=$res['parent_id'];
            $res2=$this->wh_category->where(array('goods_category_id'=>$pid))->find();
            $catid=$res2['cat_id'];
            $data['cat_id']=$catid;

            //品牌
            $bid=$endinfo['brand_id'];
            $bd=$this->wh_brand->where(array('brand_id'=>$bid))->find();
            $data['brand_name']=$bd['brand_name'];

            //颜色
            $cid=$endinfo['color_id'];
            $colors=$this->wh_color->where(array('color_id'=>$cid))->find();
            $data['goods_color']=$colors['color'];

            //goods_sn
            $data['goods_sn']=sprintf("%08d",$lastid);

            if($this->wh_goods->where(array('goods_id'=>$lastid))->save($data)!==false){
                $this->success("添加成功");
            }

        }else{
                $model->rollback();
                $this->error("添加失败");
        }

    }
    //获取品牌
    function getbrand()
    {
        $catid=$_REQUEST['goods_category_id'];
        $brand=$this->wh_brand->where(array('goods_category_id'=>$catid))->select();
        echo json_encode($brand);
    }




    //ajax获取型号
    function pdversion(){
        //获取查询相同分类下是否有相同的型号
        $id=$_REQUEST['goodsid'];
        $version=$_REQUEST['vs'];
        $res=$this->wh_version->where(array('goods_category_id'=>$id,'version'=>$version))->find();
        if($res){
            echo json_encode($res);
        }else{
            echo 0;
        }

    }

    //ajax判断商品名称
    function pdname(){
        $name=$_REQUEST['spname'];
        $id=$_REQUEST['goodsid'];
        $res=$this->wh_goods_name->where(array('goods_category_id'=>$id,'goods_name'=>$name))->find();
        if($res){
            echo json_encode($res);
        }else{
            echo 0;
        }
    }



}