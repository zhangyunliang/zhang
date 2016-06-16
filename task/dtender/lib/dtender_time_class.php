<?php
final class dtender_time_class extends time_base_class {
	function __construct() {
		parent::__construct ();
	}
	function validtaskstatus() {
		$this->task_hand_end();
		$this->task_choose_end();
		$this->task_tg_end();	
	}
	public function task_hand_end() {		
		$task_list = db_factory::query(sprintf("select * from %switkey_task where task_status=2 and sub_time<'%s' and model_id=5",TABLEPRE,time()));
		if(is_array($task_list)){
			foreach($task_list as $v){
				$task_obj = new dtender_task_class($v);
				$task_obj->task_tb_timeout();
			}
		}		
	}
	public  function task_tg_end(){
		$task_list = db_factory::query(sprintf("select * from %switkey_task where task_status=4 and sub_time<'%s' and model_id=5",TABLEPRE,time()));
		if(is_array($task_list)){
			foreach($task_list as $v){
				$task_obj = new dtender_task_class($v);
				$task_obj->task_tg_timeout();
			}
		}
	}
	function task_choose_end() {
		$task_list = db_factory::query(sprintf("select * from %switkey_task where task_status=3 and end_time<'%s' and model_id=5",TABLEPRE,time()));
		if(is_array($task_list)){
			foreach($task_list as $v){
				$task_obj = new dtender_task_class($v);
				$task_obj->task_xb_timeout();
			}
		}
	}
}
?>