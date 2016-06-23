<?php

/*
上海商品添加
*/
class AdshspAction extends AdminbaseAction
{
  protected $category;//商品分类
  protected $brand;//商品品牌
  protected $color;//颜色
  protected $suppliers;//供应商
  protected $version;
  protected $goods;//商品
  protected $goodsname;


  function _initialize(){
		parent::_initialize();
    $this->category=M('goods_category','ecs_');
    $this->brand=M('temp_brand','ecs_');
    $this->color=M('temp_color','ecs_');
    $this->suppliers=M('suppliers','cms_');
    $this->goods=M('goods','ecs_');
    $this->version=M('temp_version','ecs_');
    $this->goodsname=M('goods_name','ecs_');
  }



   function index(){
    //查询商品分类(分级)
    $cg=$this->category->select();
    $this->assign('list1',self::fen($cg));
    //var_dump(self::fen($cg));
    //查询品牌
    $brand=$this->brand->select();
    $this->assign('list2',$brand);

    //查询颜色
    $color=$this->color->select();
    $this->assign('list3',$color);

    //查询供应商
    $suppliers=$this->suppliers->select();
    $this->assign('list4',$suppliers);
    //var_dump($this->goods->where(array('goods_id'=>6847))->find());
    $this->display();
  }

  //递归分类
  function fen($arr,$parent_id=0,$lev=0){
    static $list=array();

    foreach($arr as $val){
      if($val['parent_id']==$parent_id){
        $list[]=array(
          'goods_category_name'=>str_repeat('&nbsp;&nbsp;',$lev).'|--'.$val['goods_category_name'],
          'goods_category_id'=>$val['goods_category_id'],
          'cat_id'=>$val['cat_id'],
          'grade'=>$val['grade'],
        );
        $this->fen($arr,$val['goods_category_id'],$lev+1);
      }

    }
    return $list;
  }



  function add_post(){
    //当前操作管理员
    $data['admin_id']=intval(get_current_admin_id());
    $data['suppliers_id']=16;//暂时定为固定
    $data['add_time']=time();
    $data['is_delete']=0;
    $data['is_pass']=1;

    //判断所以的选项是否已经选择和填写
    if(isset($_REQUEST['goods_cat_id'])&&($_REQUEST['goods_cat_id']!='-1')){
      $data['goods_cat_id']=$_REQUEST['goods_cat_id'];
      $result['goods_category_id']=$_REQUEST['goods_cat_id'];
      $result2['goods_category_id']=$_REQUEST['goods_cat_id'];
    }else{
      $this->error("请选择商品分类！");
    }
    //==========================
    if(isset($_REQUEST['brand_id'])&&($_REQUEST['brand_id']!='-1')){
      $data['brand_id']=$_REQUEST['brand_id'];
    }else{
      $this->error("请选择品牌！");
    }
    //==========================
    if(isset($_REQUEST['color_id'])&&($_REQUEST['color_id']!='-1')){
      $data['color_id']=$_REQUEST['color_id'];
    }else{
      $this->error("请选择商品颜色！");
    }
    //==========================
    if(isset($_REQUEST['cms_suppliers_id'])&&($_REQUEST['cms_suppliers_id']!='-1')){
      $data['cms_suppliers_id']=$_REQUEST['cms_suppliers_id'];
    }else{
      $this->error("请选择供应商！");
    }
    //==========================
    if(isset($_REQUEST['goods_name'])&& !empty($_REQUEST['goods_name'])){
      if(!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u',$_REQUEST['goods_name'])){
        $this->error('请填写正确的商品名');
      }else{
        $data['goods_name']=$_REQUEST['goods_name'];
        $result['goods_name']=$_REQUEST['goods_name'];
      }

    }else{
      $this->error("请输入商品名称！");
    }
    //==========================

    if(isset($_REQUEST['goods_unit'])&& !empty($_REQUEST['goods_unit'])){
      if(!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u',$_REQUEST['goods_unit'])){
        $this->error('请填写正确的单位');
      }else{
        $data['goods_unit']=$_REQUEST['goods_unit'];
      }

    }else{
      $this->error("请输入商品单位！");
    }
    //==========================

    if(isset($_REQUEST['goods_version'])&& !empty($_REQUEST['goods_version'])){
      if(!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u',$_REQUEST['goods_version'])){
        $this->error('请填写正确的商品型号');
      }else{
        $data['goods_version']=$_REQUEST['goods_version'];
        $result2['version']=$_REQUEST['goods_version'];
      }

    }else{
      $this->error("请输入商品型号！");
    }

    //==========================
    if(isset($_REQUEST['public_price'])&& !empty($_REQUEST['public_price'])){
      if(!is_numeric($_REQUEST['public_price'])){
        $this->error("请输入正确的公开价");
      }else{
        $data['public_price']=$_REQUEST['public_price'];
      }

    }else{
      $this->error("请输入商品公开价！");
    }
    if(isset($_REQUEST['shop_price'])&& !empty($_REQUEST['shop_price'])){
      if(!is_numeric($_REQUEST['shop_price'])){
        $this->error("请输入正确的会员价");
      }else{
        $data['shop_price']=$_REQUEST['shop_price'];
      }

    }else{
      $this->error("请输入商品会员价！");
    }
    if(isset($_REQUEST['private_price'])&& !empty($_REQUEST['private_price'])){
      if(!is_numeric($_REQUEST['private_price'])){
        $this->error("请输入正确的内部价");
      }else{
        $data['private_price']=$_REQUEST['private_price'];
      }

    }else{
      $this->error("请输入商品内部价！");
    }
      //开启事务
      $model=new Model();
      $model->startTrans();
      //在goods_name和temp_version 中添加新纪录
      if(empty($_REQUEST['goodsnames'])){
        $data['goods_name_id']=$this->goodsname->add($result);
      }else{
        $data['goods_name_id']=$_REQUEST['goodsnames'];
      }
      if(empty($_REQUEST['getversions'])){
        $data['version_id']=$this->version->add($result2);
      }else{
        $data['version_id']=$_REQUEST['getversions'];
      }

      //创建数据对象。录入数据
      if($lastid=$this->goods->add($data)){
        $model->commit();
        //更改一级分类id
        //最后一条记录
        $res=$this->goods->where(array('goods_id'=>$lastid))->find();
        //分类id
        $gid=$res['goods_cat_id'];
        $cate1=$this->category->where(array('goods_category_id'=>$gid))->find();
        $pid=$cate1['parent_id'];
        $cate2=$this->category->where(array('goods_category_id'=>$pid))->find();
        $cat_id=$cate2['cat_id'];
        $data['cat_id']=$cat_id;
        //品牌
        $bid=$res['brand_id'];
        $cate3=$this->brand->where(array('brand_id'=>$bid))->find();
        $data['brand_name']=$cate3['brand_name'];
        //颜色
        $color_id=$res['color_id'];
        $cate5=$this->color->where(array('color_id'=>$color_id))->find();
        $data['goods_color']=$cate5['color'];

        //生成8位数，不足前面补0
        $data['goods_sn']=sprintf("%08d",$lastid);
        if($this->goods->where(array('goods_id'=>$lastid))->save($data)!==false){
          $this->success("录入成功！");
        }

      }else{
        $model->rollback();
        $this->error("录入失败！");
      }

  }
  //ajax获取品牌
  function getbrand(){
    $goods_category_id=$_REQUEST['goods_category_id'];
    $data=$this->brand->where(array('goods_category_id'=>$goods_category_id))->select();
    echo json_encode($data);
  }

  //ajax获取型号
  function pdversion(){
    //获取查询相同分类下是否有相同的型号
    $id=$_REQUEST['goodsid'];
    $version=$_REQUEST['vs'];
    $res=$this->version->where(array('goods_category_id'=>$id,'version'=>$version))->find();
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
    $res=$this->goodsname->where(array('goods_category_id'=>$id,'goods_name'=>$name))->find();
    if($res){
      echo json_encode($res);
    }else{
      echo 0;
    }
  }


}





























 ?>
