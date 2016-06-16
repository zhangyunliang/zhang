<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
 $p_url =$_K['siteurl']."/index.php?do=space&member_id=$member_id";
$credit_level = unserialize($member_info['seller_level']);
$indus_arr = $kekezu->_indus_arr;
 $service_obj = new Keke_witkey_service_class();
 $service_obj->setWhere("uid = ".intval($member_id)." order by on_time desc limit 0,9 ");
 $service_arr = $service_obj->query_keke_witkey_service();
$range = range(1,8);
 $skill_obj = new Keke_witkey_member_ext_class();
 $skill_obj->setWhere(" uid = ".intval($member_id)." and type='cert' order by ext_id desc ");
 $skill_arr = $skill_obj->query_keke_witkey_member_ext();
  foreach ($skill_arr as $k=>$v) {
	$v['v1'] = preg_replace("/\..*/", "",  $v['v1']);
 	$skill_desc_arr[$k] = $v; 
 }
 $mark_obj  = new Keke_witkey_mark_class();
 $page_obj  = $kekezu->_page_obj;
 $page_obj->setAjax('1');
 $page_obj->setAjaxDom('mark_content');
 $page_size = intval ( $page_size ) ? intval ( $page_size ) : 5; 
 $page      = $page ? $page : 1; 
 $url       = "index.php?do=space&member_id=$member_id";
 $where		= "uid =$member_id and mark_type=1 and mark_status>0";
 $mark_obj->setWhere($where);
 $count = intval($mark_obj->count_keke_witkey_mark());
 $pages = $page_obj->getPages($count,$page_size,$page,$url);
 $mark_obj->setWhere($where.$pages['where']);
 $mark_list = $mark_obj->query_keke_witkey_mark();
require keke_tpl_class::template(SKIN_PATH."/space/{$type}_{$view}");
