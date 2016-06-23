<?php 
class ecs_PurchaseGoodsModel extends RelationModel {
	
	protected $dbName = 'ecshop';
	protected $trueTableName = 'ecs_temp_purchase_goods'; 
	
	//自动完成
	protected $_auto = array ( 
		
	);
	
	
	protected $_scope = array(
	'readAll' => array(
	'alias' => 'a',
    'field' => 'a.*',),
		);
	
	//自动验证
	protected $_validate=array(
		
	);

	//关联
	protected $_link = array(
          
    );
		 
	// 获取所有用户信息
	public function getAll($where = '' , $order = 'temp_purchase_goods_id  DESC', $limit='') {
	
		return $this->relation(TRUE)->where($where)->order($order)->limit($limit)->select();
	}

	// 获取单个用户信息
	public function get($where = '',$field = '*') {
		return $this->relation(TRUE)->field($field)->where($where)->find();
	}

	// 删除用户
	public function del($where) {
		if($where){
			return $this->where($where)->delete();
		}else{
			return false;
		}
	}
	
	// 更新用户
	public function up($data) {
		if($data){
			return $this->save($data);
		}else{
			return false;
		}
	}
	
	// 更新用户
	public function check_unique($goods_sn=''){
       	
       $condition['goods_sn'] = $goods_sn;
	  
       return $this->where($condition)->find();
	}
	
	

}