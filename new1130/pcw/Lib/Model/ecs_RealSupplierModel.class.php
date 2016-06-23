<?php 
class ecs_RealSupplierModel extends RelationModel {
	
	protected $dbName = 'ecshop';
	protected $trueTableName = 'ecs_suppliers'; 
	//自动完成
	protected $_auto = array ( 
		
		
		
	);

	//自动验证
	protected $_validate=array(
		
	);

	//关联
	protected $_link = array(
	 		
           
			 
    );
		 
	// 获取所有用户信息
	public function getAll($where = '' , $order = 'suppliers_id  DESC', $limit='') {
	
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
	public function check_unique($suppliers_name=''){
       	
      
	   $map['suppliers_name']  = array('eq',$suppliers_name);
       
       return $this->where($map)->find();
	}
	
	

}