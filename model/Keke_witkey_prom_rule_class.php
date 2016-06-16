<?php
class Keke_witkey_prom_rule_class{
	public $_db;
	public $_tablename;
	public $_dbop;
	public $_prom_id;	public $_prom_item;	public $_prom_code;	public $_month;	public $_cash;	public $_credit;	public $_rate;	public $_config;	public $_is_open;	public $_type;
	public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	public $_replace=0;
	public $_where;
	function  keke_witkey_prom_rule_class(){		$this->_db = new db_factory ( );		$this->_dbop = $this->_db->create(DBTYPE);		$this->_tablename = TABLEPRE."witkey_prom_rule";	}	 
	public function getProm_id(){		return $this->_prom_id ;	}	public function getProm_item(){		return $this->_prom_item ;	}	public function getProm_code(){		return $this->_prom_code ;	}	public function getMonth(){		return $this->_month ;	}	public function getCash(){		return $this->_cash ;	}	public function getCredit(){		return $this->_credit ;	}	public function getRate(){		return $this->_rate ;	}	public function getConfig(){		return $this->_config ;	}	public function getIs_open(){		return $this->_is_open ;	}	public function getType(){		return $this->_type ;	}	public function getWhere(){		return $this->_where ;	}	public function getCache_config() {		return $this->_cache_config;	}
	public function setProm_id($value){		$this->_prom_id = $value;	}	public function setProm_item($value){		$this->_prom_item = $value;	}	public function setProm_code($value){		$this->_prom_code = $value;	}	public function setMonth($value){		$this->_month = $value;	}	public function setCash($value){		$this->_cash = $value;	}	public function setCredit($value){		$this->_credit = $value;	}	public function setRate($value){		$this->_rate = $value;	}	public function setConfig($value){		$this->_config = $value;	}	public function setIs_open($value){		$this->_is_open = $value;	}	public function setType($value){		$this->_type = $value;	}	public function setWhere($value){		$this->_where = $value;	}	public function setCache_config($_cache_config) {		$this->_cache_config = $_cache_config;	}
	 
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
	 
	/**	 * insert into  keke_witkey_prom_rule  ,or add new record	 * @return int last_insert_id	 */	function create_keke_witkey_prom_rule(){		$data =  array();		if(!is_null($this->_prom_id)){			$data['prom_id']=$this->_prom_id;		}		if(!is_null($this->_prom_item)){			$data['prom_item']=$this->_prom_item;		}		if(!is_null($this->_prom_code)){			$data['prom_code']=$this->_prom_code;		}		if(!is_null($this->_month)){			$data['month']=$this->_month;		}		if(!is_null($this->_cash)){			$data['cash']=$this->_cash;		}		if(!is_null($this->_credit)){			$data['credit']=$this->_credit;		}		if(!is_null($this->_rate)){			$data['rate']=$this->_rate;		}		if(!is_null($this->_config)){			$data['config']=$this->_config;		}		if(!is_null($this->_is_open)){			$data['is_open']=$this->_is_open;		}		if(!is_null($this->_type)){			$data['type']=$this->_type;		}		return $this->_prom_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace);	}
	/**	 * edit table keke_witkey_prom_rule	 * @return int affected_rows	 */	function edit_keke_witkey_prom_rule(){		$data =  array();		if(!is_null($this->_prom_id)){			$data['prom_id']=$this->_prom_id;		}		if(!is_null($this->_prom_item)){			$data['prom_item']=$this->_prom_item;		}		if(!is_null($this->_prom_code)){			$data['prom_code']=$this->_prom_code;		}		if(!is_null($this->_month)){			$data['month']=$this->_month;		}		if(!is_null($this->_cash)){			$data['cash']=$this->_cash;		}		if(!is_null($this->_credit)){			$data['credit']=$this->_credit;		}		if(!is_null($this->_rate)){			$data['rate']=$this->_rate;		}		if(!is_null($this->_config)){			$data['config']=$this->_config;		}		if(!is_null($this->_is_open)){			$data['is_open']=$this->_is_open;		}		if(!is_null($this->_type)){			$data['type']=$this->_type;		}		if($this->_where){			return $this->_db->updatetable($this->_tablename,$data,$this->getWhere());		}		else{			$where = array('prom_id' => $this->_prom_id);			return $this->_db->updatetable($this->_tablename,$data,$where);		}	}
	/**	 * query table: keke_witkey_prom_rule,if isset where return where record,else return all record	 * @return array	 */	function query_keke_witkey_prom_rule($is_cache=0, $cache_time=0){		if($this->_where){			$sql = "select * from $this->_tablename where ".$this->_where;		}		else{			$sql = "select * from $this->_tablename";		}		if ($is_cache) {			$this->_cache_config ['is_cache'] = $is_cache;		}		if ($cache_time) {			$this->_cache_config ['time'] = $cache_time;		}		if ($this->_cache_config ['is_cache']) {			if (CACHE_TYPE) {				$keke_cache = new keke_cache_class ( CACHE_TYPE );				$id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');				$data = $keke_cache->get ( $id );				if ($data) {					return $data;				} else {					$res = $this->_dbop->query ( $sql );					$keke_cache->set ( $id, $res,$this->_cache_config['time'] );					$this->_where = "";					return $res;				}			}		}else{			$this->_where = "";			return  $this->_dbop->query ( $sql );		}	}
	/**	 * query count keke_witkey_prom_rule records,if iset where query by where	 * @return int count records	 */	function count_keke_witkey_prom_rule(){		if($this->_where){			$sql = "select count(*) as count from $this->_tablename where ".$this->_where;		}		else{			$sql = "select count(*) as count from $this->_tablename";		}		$this->_where = "";		return $this->_dbop->getCount($sql);	}
	/**	 * delete table keke_witkey_prom_rule, if isset where delete by where	 * @return int deleted affected_rows	 */	function del_keke_witkey_prom_rule(){		if($this->_where){			$sql = "delete from $this->_tablename where ".$this->_where;		}		else{			$sql = "delete from $this->_tablename where prom_id = $this->_prom_id ";		}		$this->_where = "";		return $this->_dbop->execute($sql);	}

	 
	 
}
?>