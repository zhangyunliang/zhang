<?php
/**
 * Created by PhpStorm.
 * User: yunliang
 * Date: 2015/11/11
 * Time: 12:50
 */
class AdminPostwpAction extends AdminbaseAction
{
    protected $category;
    protected $brand;
    protected $version;
    protected $color;
    protected $goods_wh;
    protected $users;
    protected $suppliers;
    protected $goods_name;

    function _initialize(){
        parent::_initialize();
        $this->category=M('goods_category_wh','ecs_');
        $this->brand=M('temp_brand_wh','ecs_');
        $this->version=M('temp_version_wh','ecs_');
        $this->color=M('temp_color_wh','ecs_');
        $this->goods_wh=M('goods_wh','ecs_');
        $this->users=M('cmf_users','ecs_');
        $this->suppliers=M('suppliers','cms_');
        $this->goods_name=M('goods_name_wh','ecs_');
    }

    function index(){

        //搜索条件
        $where='';
        //select类型
        $category=$this->category->select();
        $this->assign('type',self::fen($category));
        //select品牌
        $brand=$this->brand->select();
        $this->assign('brands',$brand);
        //select型号
        $version=$this->version->select();
        $this->assign('versions',$version);
        //select颜色
        $color=$this->color->select();
        $this->assign('colors',$color);
        if(is_post){
            if(isset($_REQUEST['goods_cat_id'])&& $_REQUEST['goods_cat_id']!='0'){
                $where['a.goods_cat_id']=$_REQUEST['goods_cat_id'];
                $fenlei=$_REQUEST['goods_cat_id'];
                $_GET['goods_cat_id']=$_REQUEST['goods_cat_id'];
            }
            if(isset($_REQUEST['brand_id'])&& $_REQUEST['brand_id']!='0'){
                $where['a.brand_id']=$_REQUEST['brand_id'];
                $pinpai=$_REQUEST['brand_id'];
                $_GET['brand_id']=$_REQUEST['brand_id'];
            }
            if(isset($_REQUEST['version_id'])&& $_REQUEST['version_id']!='0'){
                $where['version_id']=$_REQUEST['version_id'];
                $xinhao=$_REQUEST['version_id'];
                $_GET['version_id']=$_REQUEST['version_id'];
            }
            if(isset($_REQUEST['color_id'])&& $_REQUEST['color_id']!='0'){
                $where['color_id']=$_REQUEST['color_id'];
                $yanse=$_REQUEST['color_id'];
                $_GET['color_id']=$_REQUEST['color_id'];
            }
            if(isset($_REQUEST['keyword'])&& !empty($_REQUEST['keyword'])){
                $where['goods_name']=array('like','%'.trim($_REQUEST['keyword'].'%'));
                $goodsname=$_REQUEST['keyword'];
                $_GET['keyword']=trim($_REQUEST['keyword']);
            }
        }

        //将自定义变量通过GET传给页面
        $this->assign('cat',$fenlei);
        $this->assign('pinpai',$pinpai);
        $this->assign('vs',$xinhao);
        $this->assign('yanse',$yanse);

        //商品展示
        $count=$this->goods_wh->where($where)->count();
        $page=$this->page($count,20);
        $goods=$this->goods_wh->alias('a')
            ->join('ecs_goods_category_wh b ON a.goods_cat_id=b.goods_category_id')
            ->join('cms_suppliers c ON a.cms_suppliers_id=c.suppliers_id')
            ->field('a.goods_id,a.cat_id,a.goods_version,a.goods_name,a.brand_name,a.is_delete,a.is_pass,
			a.is_delete,a.admin_id,a.goods_cat_id,a.color_id,a.version_id,a.brand_id,a.goods_color,a.goods_name_id,
			a.cms_suppliers_id,c.suppliers_name,c.suppliers_id,b.goods_category_name')
            ->order('goods_id')
            ->limit($page->firstRow.','.$page->listRows)
            ->where($where)
            ->select();
        //获取当前操作管理员
        foreach($goods as $key=>$val){
            $name=$this->users->where(array('id'=>$val['admin_id']))->find();
            $goods[$key]['user_nicename']=$name['user_nicename'];
        }

        //dump(end($goods));
        $this->assign('lists',$goods);
        $this->assign('formget',$_GET);
        $this->assign('page',$page->show('Admin'));
        $this->display();
    }

    function fen($arr,$parent_id=0,$lev=0){
        static $list=array();

        foreach($arr as $k){
            if($k['parent_id']==$parent_id){
                $list[]=array(
                    'goods_category_name'=>str_repeat('&nbsp;&nbsp;',$lev).'|--'.$k['goods_category_name'],
                    'goods_category_id'=>$k['goods_category_id'],
                    'cat_id'=>$k['cat_id'],
                    'grade'=>$k['grade'],
                );
                self::fen($arr,$k['goods_category_id'],$lev+1);
            }
        }
        return $list;
    }


    function choose(){
        $cat_id=$_REQUEST['cat_id'];
        //选取分类获取品牌和型号
        $list[0]=$this->brand->where(array('goods_category_id'=>$cat_id))->select();//品牌
        $list[1]=$this->version->where(array('goods_category_id'=>$cat_id))->select();//型号
        echo json_encode($list);
    }

    //商品审核
    function check(){
        $admin_id=intval(get_current_admin_id());

        if(isset($_REQUEST['ids'])&& isset($_REQUEST['check'])){
            $data['is_pass']=1;
            $data['admin_time']=time();
            $data['admin_id']=$admin_id;
            $ids=join(',',$_REQUEST['ids']);
            if($this->goods_wh->where("goods_id in ($ids)")->save($data)!==false){
                $this->success("审核成功",U('AdminPostwp/index'));
            }else{
                $this->error("审核失败");
            }
        }
        if(isset($_REQUEST['ids'])&& isset($_REQUEST['uncheck'])){
            $data['is_pass']=0;
            $data['admin_time']=time();
            $data['admin_id']=$admin_id;
            $ids=join(',',$_REQUEST['ids']);
            if($this->goods_wh->where("goods_id in ($ids)")->save($data)!==false){
                $this->success("取消审核成功",U('AdminPostwp/index'));
            }else{
                $this->error("取消审核失败");
            }
        }
        if(isset($_REQUEST['id'])&& isset($_REQUEST['check'])){
            $data['is_pass']=1;
            $data['admin_time']=time();
            $data['admin_id']=$admin_id;
            $id=$_REQUEST['id'];
            if($this->goods_wh->where("goods_id= ($id)")->save($data)!==false){
                $this->success("审核成功",U('AdminPostwp/index'));
            }else{
                $this->error("审核失败");
            }
        }
        if(isset($_REQUEST['id'])&& isset($_REQUEST['uncheck'])){
            $data['is_pass']=0;
            $data['admin_id']=$admin_id;
            $data['admin_time']=time();
            $id=$_REQUEST['id'];
            if($this->goods_wh->where("goods_id= ($id)")->save($data)!==false){
                $this->success("取消审核成功",U('AdminPost/index'));
            }else{
                $this->error("取消审核失败");
            }
        }
    }

    //查看商品详情
    function look(){
        $id=intval(I('get.id'));
        $_SESSION['area_id']=1;
        redirect("http://".$_SERVER['HTTP_HOST']."/ecshop2/display/goods.php?goods_id=$id");
    }


    function edit(){
        //商品分类
        $category=$this->category->select();
        $this->assign('list1',self::fen($category));
        //商品品牌
        $brands=$this->brand->select();
        $this->assign('list2',$brands);
        //颜色
        $colors=$this->color->select();
        $this->assign('list3',$colors);
        //供应商
        $suppliers=$this->suppliers->select();
        $this->assign('list4',$suppliers);

        //将选项指定
        $id=$_REQUEST['id'];
        $goods=$this->goods_wh->where("goods_id= ($id)")->find();
        $goods['public_price']=strval($goods['public_price']);
        $goods['shop_price']=strval($goods['shop_price']);
        $goods['private_price']=strval($goods['private_price']);
        $this->assign('goods',$goods);
        //var_dump($goods);
        $this->display();
    }

    function edit_post(){
        //商品编辑
        $id = $_REQUEST['goods_id'];
        $data['last_update'] = time();
        $data['admin_id'] = intval(get_current_admin_id());
        //判断选项是否已经选择和填写
        if (isset($_REQUEST['goods_cat_id']) && ($_REQUEST['goods_cat_id'] != '-1')) {
            $data['goods_cat_id'] = $_REQUEST['goods_cat_id'];
            //修改cat_id
            $gid=$_REQUEST['goods_cat_id'];
            $cate=$this->category->where("goods_category_id= ($gid)")->find();
            $pid=$cate['parent_id'];
            $cate1=$this->category->where("goods_category_id= ($pid)")->find();
            $data['cat_id']=$cate1['cat_id'];

            //获取需要的goods_category_id
            $res['goods_category_id']=$_REQUEST['goods_cat_id'];
            $res2['goods_category_id']=$_REQUEST['goods_cat_id'];
        } else {
            $this->error("请选择商品分类！");
        }
        //==========================
        if (isset($_REQUEST['brand_id']) && ($_REQUEST['brand_id'] != '-1')) {
            $data['brand_id'] = $_REQUEST['brand_id'];
        } else {
            $this->error("请选择品牌！");
        }
        //==========================
        if (isset($_REQUEST['color_id']) && ($_REQUEST['color_id'] != '-1')) {
            $data['color_id'] = $_REQUEST['color_id'];
        } else {
            $this->error("请选择商品颜色！");
        }
        //==========================
        if (isset($_REQUEST['cms_suppliers_id']) && ($_REQUEST['cms_suppliers_id'] != '-1')) {
            $data['cms_suppliers_id'] = $_REQUEST['cms_suppliers_id'];
        } else {
            $this->error("请选择供应商！");
        }
        //==========================
        if (isset($_REQUEST['goods_name']) && !empty($_REQUEST['goods_name'])) {
            if (!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u', $_REQUEST['goods_name'])) {
                $this->error('请填写正确的商品名');
            }else{
                $data['goods_name'] = $_REQUEST['goods_name'];
                $res['goods_name']=$_REQUEST['goods_name'];
            }
        } else {
            $this->error("请输入商品名称！");
        }
        //==========================

        if (isset($_REQUEST['goods_unit']) && !empty($_REQUEST['goods_unit'])) {
            if (!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u', $_REQUEST['goods_unit'])) {
                $this->error('请填写正确的商品单位');
            }else{
                $data['goods_unit'] = $_REQUEST['goods_unit'];
            }
        } else {
            $this->error("请输入商品单位！");
        }
        //==========================

        if (isset($_REQUEST['goods_version']) && !empty($_REQUEST['goods_version'])) {
            if (!preg_match('/[\x{4e00}-\x{9fa5}]|[A-Za-z0-9]+/u', $_REQUEST['goods_version'])) {
                $this->error('请填写正确的商品型号');
            }else{
                $data['goods_version'] = $_REQUEST['goods_version'];
                $res2['version']=$_REQUEST['goods_version'];
            }
        } else {
            $this->error("请输入商品型号！");
        }

        //==========================
        if (isset($_REQUEST['public_price'])) {
            if (!is_numeric($_REQUEST['public_price'])) {
                $this->error("请输入正确的公开价");
            }else{
                $data['public_price'] = $_REQUEST['public_price'];
            }
        } else {
            $this->error("请输入商品公开价！");
        }
        if (isset($_REQUEST['shop_price'])) {
            if (!is_numeric($_REQUEST['shop_price'])) {
                $this->error("请输入正确的会员价");
            }else{
                $data['shop_price'] = $_REQUEST['shop_price'];
            }
        } else {
            $this->error("请输入商品会员价！");
        }
        if (isset($_REQUEST['private_price'])) {
            if (!is_numeric($_REQUEST['private_price'])) {
                $this->error("请输入正确的内部价");
            }else{
                $data['private_price'] = $_REQUEST['private_price'];
            }
        } else {
            $this->error("请输入商品内部价！");
        }

        if(isset($_REQUEST['stock'])){
            if(!is_numeric($_REQUEST['stock'])){
                $this->error("请输入正确的库存");
            }else{
                $data['stock']=$_REQUEST['stock'];
            }
        }else{
            $this->error("请输入库存");
        }


        $model=new Model();
        $model->startTrans();
        if(!empty($_REQUEST['goodsnames'])&& $_REQUEST['goodsnames']='1'){
            $data['goods_name_id']=$this->goods_name->add($res);
        }
        if(!empty($_REQUEST['getversions'])&& $_REQUEST['getversions']='1'){
            $data['version_id']=$this->version->add($res2);
        }

        if($this->goods_wh->where(array('goods_id' => $id))->save($data)!==false){
            $model->commit();
            $this->success("修改成功", U('AdminPostwp/index'));
        }else{
            $model->rollback();
            $this->error("修改失败", U('AdminPostwp/index'));
        }


    }

    function getbrand(){
        $id=$_REQUEST['goods_category_id'];
        $res=$this->brand->where("goods_category_id= ($id)")->select();
        echo json_encode($res);
    }

    function delete(){
        $id=$_REQUEST['gid'];
        $data['is_pass']=0;
        $data['is_delete']=1;
        if($this->goods_wh->where("goods_id= ($id)")->save($data)!==false){
            $this->success("已删除");
        }else{
            $this->error("删除失败");
        }
    }

    function back(){
        $id=$_REQUEST['bid'];
        $data['is_pass']=1;
        $data['is_delete']=0;
        if($this->goods_wh->where("goods_id= ($id)")->save($data)!==false){
            $this->success("恢复成功");
        }else{
            $this->error("恢复失败");
        }
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
        $res=$this->goods_name->where(array('goods_category_id'=>$id,'goods_name'=>$name))->find();
        if($res){
            echo json_encode($res);
        }else{
            echo 0;
        }
    }

}