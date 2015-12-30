<?php

class ecs_GoodsCategoryModel extends CommonModel {

    protected $pk = 'goods_category_id';
    protected $trueTableName = 'ecs_goods_category'; 
    protected $token = 'ecs_goods_category';
    protected $orderby = array('sort_order' => 'asc');
    protected $dbName = 'ecshop';
	
    public function getParentsId($id) {
        $data = $this->fetchAll();
        $parent_id = $data[$id]['parent_id'];
        return $parent_id;
    }

    public function getChildren($id) {
        $local = array();
        //暂时 只支持 2级分类
        $data = $this->fetchAll();
        $local[] = $id;
        foreach ($data as $val) {
            if ($val['parent_id'] == $id) {
                $local[] = $val['goods_category_id'];
            }
        }
        return $local;
    }

}
