<?php
class Keke_witkey_industry_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_indus_id;	public $_indus_pid;	public $_indus_name;	public $_is_recommend;	public $_indus_type;	public $_listorder;	public $_on_time;	public $_list_type;	public $_list_tpl;	public $_indus_intro;	public $_list_desc;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_industry_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_industry";	}	 
	public function getIndus_id(){		return $this->_indus_id ;	}	public function getIndus_pid(){		return $this->_indus_pid ;	}	public function getIndus_name(){		return $this->_indus_name ;	}	public function getIs_recommend(){		return $this->_is_recommend ;	}	public function getIndus_type(){		return $this->_indus_type ;	}	public function getListorder(){		return $this->_listorder ;	}	public function getOn_time(){		return $this->_on_time ;	}	public function getList_type(){		return $this->_list_type ;	}	public function getList_tpl(){		return $this->_list_tpl ;	}	public function getIndus_intro(){		return $this->_indus_intro ;	}	public function getList_desc(){		return $this->_list_desc ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setIndus_id($value){		$this->_indus_id = $value;	}	public function setIndus_pid($value){		$this->_indus_pid = $value;	}	public function setIndus_name($value){		$this->_indus_name = $value;	}	public function setIs_recommend($value){		$this->_is_recommend = $value;	}	public function setIndus_type($value){		$this->_indus_type = $value;	}	public function setListorder($value){		$this->_listorder = $value;	}	public function setOn_time($value){		$this->_on_time = $value;	}	public function setList_type($value){		$this->_list_type = $value;	}	public function setList_tpl($value){		$this->_list_tpl = $value;	}	public function setIndus_intro($value){		$this->_indus_intro = $value;	}	public function setList_desc($value){		$this->_list_desc = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
	 
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
	 
	/**	 * insert into  keke_witkey_industry  ,or add new record	 * @return int last_insert_id	 */	function create_keke_witkey_industry(){		$data =  array();		if(!is_null($this->_indus_id)){			$data['indus_id']=$this->_indus_id;		}		if(!is_null($this->_indus_pid)){			$data['indus_pid']=$this->_indus_pid;		}		if(!is_null($this->_indus_name)){			$data['indus_name']=$this->_indus_name;		}		if(!is_null($this->_is_recommend)){			$data['is_recommend']=$this->_is_recommend;		}		if(!is_null($this->_indus_type)){			$data['indus_type']=$this->_indus_type;		}		if(!is_null($this->_listorder)){			$data['listorder']=$this->_listorder;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if(!is_null($this->_list_type)){			$data['list_type']=$this->_list_type;		}		if(!is_null($this->_list_tpl)){			$data['list_tpl']=$this->_list_tpl;		}		if(!is_null($this->_indus_intro)){			$data['indus_intro']=$this->_indus_intro;		}		if(!is_null($this->_list_desc)){			$data['list_desc']=$this->_list_desc;		}		return $this->_indus_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
	/**	 * edit table keke_witkey_industry	 * @return int affected_rows	 */	function edit_keke_witkey_industry(){		$data =  array();		if(!is_null($this->_indus_id)){			$data['indus_id']=$this->_indus_id;		}		if(!is_null($this->_indus_pid)){			$data['indus_pid']=$this->_indus_pid;		}		if(!is_null($this->_indus_name)){			$data['indus_name']=$this->_indus_name;		}		if(!is_null($this->_is_recommend)){			$data['is_recommend']=$this->_is_recommend;		}		if(!is_null($this->_indus_type)){			$data['indus_type']=$this->_indus_type;		}		if(!is_null($this->_listorder)){			$data['listorder']=$this->_listorder;		}		if(!is_null($this->_on_time)){			$data['on_time']=$this->_on_time;		}		if(!is_null($this->_list_type)){			$data['list_type']=$this->_list_type;		}		if(!is_null($this->_list_tpl)){			$data['list_tpl']=$this->_list_tpl;		}		if(!is_null($this->_indus_intro)){			$data['indus_intro']=$this->_indus_intro;		}		if(!is_null($this->_list_desc)){			$data['list_desc']=$this->_list_desc;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('indus_id' => $this->_indus_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
	/**	 * query table: keke_witkey_industry,if isset where return where record,else return all record	 * @return array	 */	function query_keke_witkey_industry($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
	/**	 * query count keke_witkey_industry records,if iset where query by where	 * @return int count records	 */	function count_keke_witkey_industry(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
	/**	 * delete table keke_witkey_industry, if isset where delete by where	 * @return int deleted affected_rows	 */	function del_keke_witkey_industry(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where indus_id = $this->_indus_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}

	 
	 
}
?>