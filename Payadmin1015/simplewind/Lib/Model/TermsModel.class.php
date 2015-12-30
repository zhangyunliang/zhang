<?php
class TermsModel extends CommonModel {
	
	/*
	 * term_id category name description pid path status
	 */
	
	//自动验证
	protected $_validate = array(
			//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
			array('goods_category_name', 'require', '分类名称不能为空！', 1, 'regex', 3),
	);
	// 插入成功后的回调方法
	protected function _after_insert($data,$options){
		parent::_after_insert($data,$options);
		$cat_id=$data['goods_category_id'];
		$parent_id=$data['parent_id'];
		if($parent_id==0){
			$d['grade']="0-$cat_id";
		}else{
			$parent=$this->where("goods_category_id=$parent_id")->find();
			$d['grade']=$parent['grade'].'-'.$cat_id;
		}
		$this->where("goods_category_id=$cat_id")->save($d);
	}
	// 更新成功后的回调方法
	protected function _after_update($data,$options){
		parent::_after_update($data,$options);
		$cat_id=$data['goods_category_id'];
		$parent_id=$data['parent_id'];
		if($parent_id==0){
			$d['grade']="0-$cat_id";
		}else{
			$parent=$this->where("goods_category_id=$parent_id")->find();
			$d['grade']=$parent['grade'].'-'.$cat_id;
		}
		$this->where("goods_category_id=$cat_id")->save($d);
	}
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}
	

}