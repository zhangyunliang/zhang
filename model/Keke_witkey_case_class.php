<?php
class Keke_witkey_case_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_case_id;	public $_obj_id;	public $_obj_type;	public $_case_img;	public $_case_title;	public $_case_desc;	public $_case_price;	public $_case_auther;	public $_on_time;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_case_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_case";	}	 
	public function getCase_id(){		return $this->_case_id ;	}	public function getObj_id(){		return $this->_obj_id ;	}	public function getObj_type(){		return $this->_obj_type ;	}	public function getCase_img(){		return $this->_case_img ;	}	public function getCase_title(){		return $this->_case_title ;	}	public function getCase_desc(){		return $this->_case_desc ;	}	public function getCase_price(){		return $this->_case_price ;	}	public function getCase_auther(){		return $this->_case_auther ;	}	public function getOn_time(){		return $this->_on_time ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setCase_id($value){		$this->_case_id = $value;	}	public function setObj_id($value){		$this->_obj_id = $value;	}	public function setObj_type($value){		$this->_obj_type = $value;	}	public function setCase_img($value){		$this->_case_img = $value;	}	public function setCase_title($value){		$this->_case_title = $value;	}	public function setCase_desc($value){		$this->_case_desc = $value;	}	public function setCase_price($value){		$this->_case_price = $value;	}	public function setCase_auther($value){		$this->_case_auther = $value;	}	public function setOn_time($value){		$this->_on_time = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
	 
	public  function __set($property_name, $value) {
		$this->$property_name = $value;
	}
	public function __get($property_name) {
		if (isset ( $this->$property_name )) {
			return $this->$property_name;
		} else {
			return null;
		}
	}
	 
	/**	 * insert into  keke_witkey_case  ,or add new record	 * @return int last_insert_id	 */	function create_keke_witkey_case(){		$data =  array();		if(!is_null($this->_case_id)){			$data['case_id']=$this->_case_id;		}		if(!is_null($this->_obj_id)){			$data['obj_id']=$this->_obj_id;		}		if(!is_null($this->_obj_type)){			$data['obj_type']=$this->_obj_type;		}		if(!is_null($this->_case_img)){			$data['case_img']=$this->_case_img;		}		if(!is_null($this->_case_title)){			$data['case_title']=$this->_case_title;		}		if(!is_null($this->_case_desc)){			$data['case_desc']=$this->_case_desc;		}		if(!is_null($this->_case_price)){			$data['case_price']=$this->_case_price;		}		if(!is_null($this->_case_auther)){			$data['case_auther']=$this->_case_auther;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		return $this->_case_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
	/**	 * edit table keke_witkey_case	 * @return int affected_rows	 */	function edit_keke_witkey_case(){		$data =  array();		if(!is_null($this->_case_id)){			$data['case_id']=$this->_case_id;		}		if(!is_null($this->_obj_id)){			$data['obj_id']=$this->_obj_id;		}		if(!is_null($this->_obj_type)){			$data['obj_type']=$this->_obj_type;		}		if(!is_null($this->_case_img)){			$data['case_img']=$this->_case_img;		}		if(!is_null($this->_case_title)){			$data['case_title']=$this->_case_title;		}		if(!is_null($this->_case_desc)){			$data['case_desc']=$this->_case_desc;		}		if(!is_null($this->_case_price)){			$data['case_price']=$this->_case_price;		}		if(!is_null($this->_case_auther)){			$data['case_auther']=$this->_case_auther;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('case_id' => $this->_case_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
	/**	 * query table: keke_witkey_case,if isset where return where record,else return all record	 * @return array	 */	function query_keke_witkey_case($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
	/**	 * query count keke_witkey_case records,if iset where query by where	 * @return int count records	 */	function count_keke_witkey_case(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
	/**	 * delete table keke_witkey_case, if isset where delete by where	 * @return int deleted affected_rows	 */	function del_keke_witkey_case(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where case_id = $this->_case_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}

	 
	 
}
?>