<?php
class Keke_witkey_auth_realname_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_realname_a_id;	public $_uid;	public $_username;	public $_realname;	public $_id_card;	public $_id_pic;	public $_cash;	public $_start_time;	public $_end_time;	public $_auth_status;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_auth_realname_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_auth_realname";	}	 
	public function getRealname_a_id(){		return $this->_realname_a_id ;	}	public function getUid(){		return $this->_uid ;	}	public function getUsername(){		return $this->_username ;	}	public function getRealname(){		return $this->_realname ;	}	public function getId_card(){		return $this->_id_card ;	}	public function getId_pic(){		return $this->_id_pic ;	}	public function getCash(){		return $this->_cash ;	}	public function getStart_time(){		return $this->_start_time ;	}	public function getEnd_time(){		return $this->_end_time ;	}	public function getAuth_status(){		return $this->_auth_status ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setRealname_a_id($value){		$this->_realname_a_id = $value;	}	public function setUid($value){		$this->_uid = $value;	}	public function setUsername($value){		$this->_username = $value;	}	public function setRealname($value){		$this->_realname = $value;	}	public function setId_card($value){		$this->_id_card = $value;	}	public function setId_pic($value){		$this->_id_pic = $value;	}	public function setCash($value){		$this->_cash = $value;	}	public function setStart_time($value){		$this->_start_time = $value;	}	public function setEnd_time($value){		$this->_end_time = $value;	}	public function setAuth_status($value){		$this->_auth_status = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
	 
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
	 
	/**	 * insert into  keke_witkey_auth_realname  ,or add new record	 * @return int last_insert_id	 */	function create_keke_witkey_auth_realname(){		$data =  array();		if(!is_null($this->_realname_a_id)){			$data['realname_a_id']=$this->_realname_a_id;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_realname)){			$data['realname']=$this->_realname;		}		if(!is_null($this->_id_card)){			$data['id_card']=$this->_id_card;		}		if(!is_null($this->_id_pic)){			$data['id_pic']=$this->_id_pic;		}		if(!is_null($this->_cash)){			$data['cash']=$this->_cash;		}		if(!is_null($this->_start_time)){			$data['start_time']=$this->_start_time;		}		if(!is_null($this->_end_time)){			$data['end_time']=$this->_end_time;		}		if(!is_null($this->_auth_status)){			$data['auth_status']=$this->_auth_status;		}		return $this->_realname_a_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
	/**	 * edit table keke_witkey_auth_realname	 * @return int affected_rows	 */	function edit_keke_witkey_auth_realname(){		$data =  array();		if(!is_null($this->_realname_a_id)){			$data['realname_a_id']=$this->_realname_a_id;		}		if(!is_null($this->_uid)){			$data['uid']=$this->_uid;		}		if(!is_null($this->_username)){			$data['username']=$this->_username;		}		if(!is_null($this->_realname)){			$data['realname']=$this->_realname;		}		if(!is_null($this->_id_card)){			$data['id_card']=$this->_id_card;		}		if(!is_null($this->_id_pic)){			$data['id_pic']=$this->_id_pic;		}		if(!is_null($this->_cash)){			$data['cash']=$this->_cash;		}		if(!is_null($this->_start_time)){			$data['start_time']=$this->_start_time;		}		if(!is_null($this->_end_time)){			$data['end_time']=$this->_end_time;		}		if(!is_null($this->_auth_status)){			$data['auth_status']=$this->_auth_status;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('realname_a_id' => $this->_realname_a_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
	/**	 * query table: keke_witkey_auth_realname,if isset where return where record,else return all record	 * @return array	 */	function query_keke_witkey_auth_realname($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
	/**	 * query count keke_witkey_auth_realname records,if iset where query by where	 * @return int count records	 */	function count_keke_witkey_auth_realname(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
	/**	 * delete table keke_witkey_auth_realname, if isset where delete by where	 * @return int deleted affected_rows	 */	function del_keke_witkey_auth_realname(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where realname_a_id = $this->_realname_a_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}

	 
	 
}
?>