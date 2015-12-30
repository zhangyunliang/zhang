<?php
class MallAction extends CommonAction {


    protected $category;
    public function _initialize() {
        parent::_initialize();

        /**
         * 这里直接获取对应的分类表
         */
        $search_area_id=1;
        if($search_area_id){
            switch($search_area_id){
                case '1':
                    switch(session('area_id')){
                        case '1':
                            $this->category=M('ecshop.Goods_category','ecs_');
                            break;
                        case '2':
                            $this->category=M('ecshop.Goods_category_nj','ecs_');
                            break;
                    }
                    break;
                case '2':
                    $this->category=M('ecshop.Goods_category_wh','ecs_');
                    break;
            }
        }
        $cate=$this->category->where("pc_is_show")->select();
        foreach($cate as $val){
            $cate2[$val['goods_category_id']]=$val;
        }
        $this->assign('goodscate',$cate2);
    }



    public function index() {

        //模式切换
        $fid=$_REQUEST['fid']?$_REQUEST['fid']:1;
        $this->assign('fid',$fid);

        import('ORG.Util.Page'); // 导入分页类
        $map = array('is_pass' => 1, 'is_delete' => 0);// 'area_id' => $this->city_id
        //路由去查哪个区域商品
        switch (session('area_id')) {
            case '1':
                $Goods = D('ecs_GoodsSh');
                break;
            case '2':
                $Goods = D('ecs_GoodsNj');
                break;
        }
        $cat = (int) $this->_param('cat');//获取一级菜单id
        $cate_id = (int) $this->_param('cate_id');//获取二级菜单id

        if ($cat) {
            if (!empty($cate_id)) {//二级
                $map['goods_cat_id'] = $cate_id;
                $linkArr['goods_category_id'] = $cat;
                $linkArr['parent_id'] = $cate_id;
            } else {
                $res=$this->category->select();
                $catids = self::fen($res,$cat);
                if (!empty($catids)) {
                    $map['goods_cat_id'] = array('IN', $catids);
                }
                $linkArr['goods_category_id'] = $cat;
            }
        }
        $this->assign('cat', $cat);
        $this->assign('cate_id', $cate_id);


        //获取搜索项
        $version=trim(htmlspecialchars($this->_param('version')));
        $brand=trim(htmlspecialchars($this->_param('brand')));
        $color=trim(htmlspecialchars($this->_param('color')));
        $goods_name=trim(htmlspecialchars($this->_param('goods_name')));

        $map['goods_version']=array('LIKE','%'.$version.'%');
        $map['brand_name']=array('LIKE','%'.$brand.'%');
        $map['goods_color']=array('LIKE','%'.$color.'%');
        $map['goods_name']=array('LIKE','%'.$goods_name.'%');
        $this->assign('formget',$_GET);

        $count= $Goods->where($map)->select();
        $count=count($count);

        $Page = new Page($count, 20);
        $show = $Page->show();

        if(isset($_GET['price_order'])){
            $list_1=$Goods->where($map)->limit($Page->firstRow . ',' . $Page->listRows)->order('shop_price')->select();
        }else{
            if(isset($_GET['brand_order'])){
                $list_1=$Goods->where($map)->limit($Page->firstRow . ',' . $Page->listRows)->order('brand_name')->select();
            }else{
                $list_1=$Goods->where($map)->limit($Page->firstRow . ',' . $Page->listRows)->order('goods_name_id,public_price')->select();
            }
        }

        foreach ($list_1 as $k => $v) {
            $list_1[$k] = $Goods->_format($v);
        }
        $selArr = $linkArr;
        foreach ($selArr as $k => $val) {
            if ($k == 'order') {
                unset($selArr[$k]);
            }
        }

        if(isset($_SESSION['temp_buyers_id'])){
            foreach($list_1 as $key=>$val){
                $list_1[$key]['price']=$val['private_price'];
            }
        }else{
            foreach($list_1 as $key=>$val){
                $list_1[$key]['price']=$val['shop_price'];
            }
        }

        $this->assign('list', $list_1); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出
        $this->assign('selArr', $selArr);
        $this->assign('linkArr', $linkArr);
        $this->display();

    }

    public function fen($arr,$parent_id){
        static $list=array();
        foreach($arr as $vo){
            if($vo['parent_id']==$parent_id){
                $list[]=$vo['goods_category_id'];
            }
        }
        return $list;
    }


}
