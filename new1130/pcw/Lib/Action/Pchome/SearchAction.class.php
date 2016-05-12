<?php
/**
 * Created by PhpStorm.
 * User: yunliang
 * Date: 2015/12/1
 * Time: 16:40
 */
class SearchAction extends CommonAction
{
    protected $category;
    public function _initialize(){
        parent::_initialize();
        /**
         * 这里直接获取对应的分类表
         */
//        if(isset($_COOKIE['search_area_id'])){
//            $search_area_id=$_COOKIE['search_area_id'];
//        }
//        if(isset($_SESSION['search_area_id'])){
//            $search_area_id=$_SESSION['search_area_id'];
//        }

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
        $cate=$this->category->where("pc_is_show=1")->select();
        //将数组内部的id取出作为新数组的索引。赋给一个新的数组
        foreach($cate as $val){
            $cate2[$val['goods_category_id']]=$val;
        }
        $this->assign('goodscate',$cate2);
    }


    public function index() {



        //获取搜索key
        $search_key=trim($_REQUEST['search_key']);//搜索项
        $this->assign('search_key',$search_key);
        $_GET['search_key']=$search_key;

        if($search_key==""){
            $this->error("暂无商品",U('index/index'));
        }

        $fid=$_REQUEST['fid'];
        $this->assign('fid',$fid);

        $search_area_id=1;
        if($search_area_id){
            switch($search_area_id){
                case '1':
                    switch (session('area_id')) {
                        case '1':
                            $Goods = D('ecs_GoodsSh');
                            break;
                        case '2':
                            $Goods = D('ecs_GoodsNj');
                            break;
                    }
                    break;
                case '2':
                    $Goods = D('ecs_GoodsWh');
                    break;
            }

        }

        import('ORG.Util.Page'); // 导入分页类
        $map = array('is_pass' => 1, 'is_delete' => 0, 'area_id' => $this->city_id);
        $cat = (int) $this->_param('cat');//获取一级菜单id
        $cate_id = (int) $this->_param('cate_id');//获取二级菜单id

        if ($cat) {
            if($cat==36) {
                $cate_id = 37;
                $linkArr['goods_category_id'] = 36;
                $linkArr['parent_id'] = 37;
            }
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

        $map2['goods_name']=array('Like','%'.$search_key.'%');
        $map2['goods_version']=array('Like','%'.$search_key.'%');
        $map2['brand_name']=array('Like','%'.$search_key.'%');
        $map2['goods_color']=array('Like','%'.$search_key.'%');
        $map2['_logic']='or';


        $key_search= $Goods->where($map2)
            ->field('goods_id,goods_version,goods_name,brand_name,shop_price,public_price,private_price,goods_thumb,goods_color,is_pass,is_delete,goods_cat_id,goods_name_id')
            ->select(false);
        $this->assign('formget',$_GET);

        $count= $Goods->table($key_search."key_search")->where($map)->select();// ->group('goods_name_id,goods_version,brand_name')->field(array("count()"=> "goods_name", "goods_version","brand_name"))
        $count=count($count);
        $Page = new Page($count, 20);
        $show = $Page->show();
        $list = $Goods->table($key_search."key_search")->where($map)->select(false);

        if(isset($_GET['price_order'])){
            $price_order=$_GET['price_order'];
            if($_GET['price_order']=='1'){
                $list_1=$Goods->table($list."paixu")->order('shop_price')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }else{
                $list_1=$Goods->table($list."paixu")->order('shop_price DESC')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }

        }elseif(isset($_GET['account'])){
            $list_1=$Goods->table($list."paixu")->limit($Page->firstRow.','.$Page->listRows)->select();
        }else{
            if(isset($_GET['brand_order'])){
                $list_1=$Goods->table($list."paixu")->order('CONVERT(brand_name USING gbk)')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            } else{
                $list_1=$Goods->table($list."paixu")->order('goods_name_id,public_price')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
        }
        $this->assign('price_order',$price_order);
        /**
         * 方法一 select * from tablename order by column1 desc,
        　　case column2 when 'AAA' then 0 when 'BBB' then 1 end ,column3 desc;
        　　方法二 select * from tablename order by column1 desc,
        　　CHARINDEX(column2,'AAA,BBB') , column3 desc
         */

        //这段代码可以恢复先orderby再groupby的实现
        //$list_1 = $Goods->table($key_search."key_search")->where($map)->order('public_price')->select(false);
        //$list= $Goods->table($list_1."goods")->limit($Page->firstRow . ',' . $Page->listRows)->select();//->group('goods_version,brand_name,goods_name_id')-

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

    public function getli()
    {
            $price_order=$_REQUEST['price_order'];
            if(empty($price_order) || ($price_order=='1')){
                echo $str="
                        <li class=\"on\"><a>综合</a></li>
                        <li ><a href=\"<{:U('search/index',array('price_order'=>2,'search_key'=>\$search_key,'fid'=>\$fid))}>\">价格<span class=\"icon_sort\">↑</span></a></li>
                        <li ><a href=\"<{:U('search/index',array('brand_order'=>1,'search_key'=>\$search_key,'fid'=>\$fid))}>\">品牌</a></li>
                        <li ><a href=\"<{:U('search/index',array('account'=>1,'search_key'=>\$search_key,'fid'=>\$fid))}>\">销量</a></li>
                 ";
            }else{
                echo $str="
                        <li class=\"on\"><a>综合</a></li>
                        <li ><a href=\"<{:U('search/index',array('price_order'=>1,'search_key'=>\$search_key,'fid'=>\$fid))}>\">价格<span class=\"icon_sort\">↓</span></a></li>
                        <li ><a href=\"<{:U('search/index',array('brand_order'=>1,'search_key'=>\$search_key,'fid'=>\$fid))}>\">品牌</a></li>
                        <li ><a href=\"<{:U('search/index',array('account'=>1,'search_key'=>\$search_key,'fid'=>\$fid))}>\">销量</a></li>
                ";
            }

    }


}