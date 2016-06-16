<?php
class Keke_witkey_shop_member_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_member_id;	public $_shop_id;	public $_truename;	public $_member_pic;	public $_member_job;	public $_entry_age;	public $_top_eduction;	public $_school;	public $_member_desc;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_shop_member_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_shop_member";	}	 
	public function getMember_id(){		return $this->_member_id ;	}	public function getShop_id(){		return $this->_shop_id ;	}	public function getTruename(){		return $this->_truename ;	}	public function getMember_pic(){		return $this->_member_pic ;	}	public function getMember_job(){		return $this->_member_job ;	}	public function getEntry_age(){		return $this->_entry_age ;	}	public function getTop_eduction(){		return $this->_top_eduction ;	}	public function getSchool(){		return $this->_school ;	}	public function getMember_desc(){		return $this->_member_desc ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setMember_id($value){		$this->_member_id = $value;	}	public function setShop_id($value){		$this->_shop_id = $value;	}	public function setTruename($value){		$this->_truename = $value;	}	public function setMember_pic($value){		$this->_member_pic = $value;	}	public function setMember_job($value){		$this->_member_job = $value;	}	public function setEntry_age($value){		$this->_entry_age = $value;	}	public function setTop_eduction($value){		$this->_top_eduction = $value;	}	public function setSchool($value){		$this->_school = $value;	}	public function setMember_desc($value){		$this->_member_desc = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
	 
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
	 
	/**	 * insert into  keke_witkey_shop_member  ,or add new record	 * @return int last_insert_id	 */	function create_keke_witkey_shop_member(){		$data =  array();		if(!is_null($this->_member_id)){			$data['member_id']=$this->_member_id;		}		if(!is_null($this->_shop_id)){			$data['shop_id']=$this->_shop_id;		}		if(!is_null($this->_truename)){			$data['truename']=$this->_truename;		}		if(!is_null($this->_member_pic)){			$data['member_pic']=$this->_member_pic;		}		if(!is_null($this->_member_job)){			$data['member_job']=$this->_member_job;		}		if(!is_null($this->_entry_age)){			$data['entry_age']=$this->_entry_age;		}		if(!is_null($this->_top_eduction)){			$data['top_eduction']=$this->_top_eduction;		}		if(!is_null($this->_school)){			$data['school']=$this->_school;		}		if(!is_null($this->_member_desc)){			$data['member_desc']=$this->_member_desc;		}		return $this->_member_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
	/**	 * edit table keke_witkey_shop_member	 * @return int affected_rows	 */	function edit_keke_witkey_shop_member(){		$data =  array();		if(!is_null($this->_member_id)){			$data['member_id']=$this->_member_id;		}		if(!is_null($this->_shop_id)){			$data['shop_id']=$this->_shop_id;		}		if(!is_null($this->_truename)){			$data['truename']=$this->_truename;		}		if(!is_null($this->_member_pic)){			$data['member_pic']=$this->_member_pic;		}		if(!is_null($this->_member_job)){			$data['member_job']=$this->_member_job;		}		if(!is_null($this->_entry_age)){			$data['entry_age']=$this->_entry_age;		}		if(!is_null($this->_top_eduction)){			$data['top_eduction']=$this->_top_eduction;		}		if(!is_null($this->_school)){			$data['school']=$this->_school;		}		if(!is_null($this->_member_desc)){			$data['member_desc']=$this->_member_desc;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('member_id' => $this->_member_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
	/**	 * query table: keke_witkey_shop_member,if isset where return where record,else return all record	 * @return array	 */	function query_keke_witkey_shop_member($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
	/**	 * query count keke_witkey_shop_member records,if iset where query by where	 * @return int count records	 */	function count_keke_witkey_shop_member(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
	/**	 * delete table keke_witkey_shop_member, if isset where delete by where	 * @return int deleted affected_rows	 */	function del_keke_witkey_shop_member(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where member_id = $this->_member_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}

	 
	 
}
?>