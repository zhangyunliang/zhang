<?php
class Keke_witkey_link_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_link_id;	public $_link_type;	public $_link_name;	public $_link_url;	public $_link_pic;	public $_listorder;	public $_link_status;	public $_on_time;	public $_obj_type;	public $_obj_id;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_link_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_link";	}	 
	public function getLink_id(){		return $this->_link_id ;	}	public function getLink_type(){		return $this->_link_type ;	}	public function getLink_name(){		return $this->_link_name ;	}	public function getLink_url(){		return $this->_link_url ;	}	public function getLink_pic(){		return $this->_link_pic ;	}	public function getListorder(){		return $this->_listorder ;	}	public function getLink_status(){		return $this->_link_status ;	}	public function getOn_time(){		return $this->_on_time ;	}	public function getObj_type(){		return $this->_obj_type ;	}	public function getObj_id(){		return $this->_obj_id ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setLink_id($value){		$this->_link_id = $value;	}	public function setLink_type($value){		$this->_link_type = $value;	}	public function setLink_name($value){		$this->_link_name = $value;	}	public function setLink_url($value){		$this->_link_url = $value;	}	public function setLink_pic($value){		$this->_link_pic = $value;	}	public function setListorder($value){		$this->_listorder = $value;	}	public function setLink_status($value){		$this->_link_status = $value;	}	public function setOn_time($value){		$this->_on_time = $value;	}	public function setObj_type($value){		$this->_obj_type = $value;	}	public function setObj_id($value){		$this->_obj_id = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
	 
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
	 
	/**	 * insert into  keke_witkey_link  ,or add new record	 * @return int last_insert_id	 */	function create_keke_witkey_link(){		$data =  array();		if(!is_null($this->_link_id)){			$data['link_id']=$this->_link_id;		}		if(!is_null($this->_link_type)){			$data['link_type']=$this->_link_type;		}		if(!is_null($this->_link_name)){			$data['link_name']=$this->_link_name;		}		if(!is_null($this->_link_url)){			$data['link_url']=$this->_link_url;		}		if(!is_null($this->_link_pic)){			$data['link_pic']=$this->_link_pic;		}		if(!is_null($this->_listorder)){			$data['listorder']=$this->_listorder;		}		if(!is_null($this->_link_status)){			$data['link_status']=$this->_link_status;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if(!is_null($this->_obj_type)){			$data['obj_type']=$this->_obj_type;		}		if(!is_null($this->_obj_id)){			$data['obj_id']=$this->_obj_id;		}		return $this->_link_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
	/**	 * edit table keke_witkey_link	 * @return int affected_rows	 */	function edit_keke_witkey_link(){		$data =  array();		if(!is_null($this->_link_id)){			$data['link_id']=$this->_link_id;		}		if(!is_null($this->_link_type)){			$data['link_type']=$this->_link_type;		}		if(!is_null($this->_link_name)){			$data['link_name']=$this->_link_name;		}		if(!is_null($this->_link_url)){			$data['link_url']=$this->_link_url;		}		if(!is_null($this->_link_pic)){			$data['link_pic']=$this->_link_pic;		}		if(!is_null($this->_listorder)){			$data['listorder']=$this->_listorder;		}		if(!is_null($this->_link_status)){			$data['link_status']=$this->_link_status;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if(!is_null($this->_obj_type)){			$data['obj_type']=$this->_obj_type;		}		if(!is_null($this->_obj_id)){			$data['obj_id']=$this->_obj_id;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('link_id' => $this->_link_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
	/**	 * query table: keke_witkey_link,if isset where return where record,else return all record	 * @return array	 */	function query_keke_witkey_link($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
	/**	 * query count keke_witkey_link records,if iset where query by where	 * @return int count records	 */	function count_keke_witkey_link(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
	/**	 * delete table keke_witkey_link, if isset where delete by where	 * @return int deleted affected_rows	 */	function del_keke_witkey_link(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where link_id = $this->_link_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}

	 
	 
}
?>