<?php 
class ecs_TempBuyersModel extends RelationModel {
	
	protected $dbName = 'ecshop';
	protected $trueTableName = 'ecs_temp_buyers'; 
	//自动完成
	protected $_auto = array ( 
		
	);
	
	protected $_scope = array(
	'readAll' => array(
	'alias' => 'a',
    'field' => 'a.*',
	 ),
	'latest'=>array(
     'limit'=>"0,1",
     'order'=>''
     ),
     'Join'=>array(
	 'alias' => 'a',
	 'field' => 'a.*',
	 'join' => array(),
	 )
		);
	
	
	//自动验证
	protected $_validate=array(
		
		
	);

	//关联
	 protected $_link = array(
            'ecs_Purchase'=>array(
            'mapping_type'=>HAS_MANY,
                 'class_name' =>'ecs_Purchase',
                 // 定义更多的关联属性
                 'mapping_name'=>'ecs_Purchase',
                 'foreign_key'=>'buyers_id',
                 'mapping_fields'=>'temp_purchase_sn',
                 'condition' => 'state IN (1,2,3,4)'
             ),
            
            
			 'ecs_RealSupplier'=>array(
            'mapping_type'=>HAS_ONE,
                 'class_name' =>'ecs_RealSupplier',
                 // 定义更多的关联属性
                 'mapping_name'=>'ecs_RealSupplier',
                 'foreign_key'=>'temp_buyers_id',
                 'mapping_fields'=>'suppliers_id,suppliers_name,suppliers_mobile',   
             ),
         );
		 
    // 获取所有用户信息
	public function getAll($where = '', $order = 'temp_buyers_id  DESC', $limit='',$join=array(),$field="a.*",$count=false) {
		
	  $obj = $this->relation(TRUE)->scope('Join',array(
	 'alias' => 'a',
	 'field' => $field,
	 'join' =>  $join
	 ))->where($where)->scope('latest',array('limit'=>$limit,'order'=>$order));
		
		if($count){
			return $obj->count();
		}else{
			return $obj->select();		
		}
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
	public function check_unique($temp_buyers_mobile=''){
       	
       $condition['temp_buyers_mobile'] = trim($temp_buyers_mobile);
	  
       return $this->where($condition)->find();
	}
	
///////////////////////////////////////////////////////////////////////////////////////////
   
   
	

}