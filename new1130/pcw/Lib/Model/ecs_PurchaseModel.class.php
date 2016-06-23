<?php 
class ecs_PurchaseModel extends RelationModel {
	
	protected $dbName = 'ecshop';
	protected $trueTableName = 'ecs_temp_purchase'; 
	
	//自动完成
	protected $_auto = array ( 
		
		
		
	);
	
	protected $_scope = array(
	'readAll' => array(
	'alias' => 'a',
    'field' => 'a.*',),
    'hasOut' => array(
	'alias' => 'a',
    'field' => 'a.*',
    'where'=>  array('a.wm_state'=>array('eq',1)),
	 ),
	 
	);
	
	//自动验证
	protected $_validate=array(
		
	);

	//关联
	 protected $_link = array(
           'ecs_PurchaseGoods'=>array(
            'mapping_type'=>HAS_MANY,
                 'class_name' =>'ecs_PurchaseGoods',
                 // 定义更多的关联属性
                 'mapping_name'=>'ecs_PurchaseGoods',
                 'foreign_key'=>'temp_purchase_id',
                 'mapping_fields'=>'*',
			 ),  
			
         );
		 
	// 获取所有用户信息
	public function getAll($where = '' , $order = 'temp_purchase_id  DESC', $limit='') {
	
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
	public function check_unique($temp_purchase_sn=''){
       	
       $condition['temp_purchase_sn'] = $temp_purchase_sn;
	  
       
       return $this->where($condition)->find();
	}
	
	

}