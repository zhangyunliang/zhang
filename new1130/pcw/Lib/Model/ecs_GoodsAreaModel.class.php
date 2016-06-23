<?php 
class ecs_GoodsAreaModel extends RelationModel {
	
	protected $dbName = 'ecshop';
	protected $trueTableName = 'ecs_goods_area'; 
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
          
         );
		 
    // 获取所有用户信息
	public function getAll($where = '', $order = 'goods_area_id  DESC', $limit='',$join=array(),$field="a.*",$count=false) {
		
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
	public function check_unique($goods_area=''){
       	
       $condition['goods_area'] = trim($goods_area);
	  
       return $this->where($condition)->find();
	}
	
///////////////////////////////////////////////////////////////////////////////////////////
   
   
	

}