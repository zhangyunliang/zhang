<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$d_url = $kekezu->_sys_config ['website_url'];
$member_id and $member_id = intval ( $member_id );
$sql = "select a.* ,b.* from " . TABLEPRE . "witkey_shop_case as a left join " . TABLEPRE . "witkey_service as b on a.service_id = b.service_id where  a.shop_id = " . $e_shop_info ['shop_id'] . " order by b.service_id desc ";
$url = "index.php?do=space&member_id=$member_id&view=case&page_size=$page_size";
$page_size = 10;
$count = db_factory::execute ( $sql );
$page = $page ? $page : 1;
$pages = $kekezu->_page_obj->getPages ( $count, $page_size, $page, $url );
$where = $pages ['where'];
$shop_arr = db_factory::query ( $sql . $where );
require keke_tpl_class::template ( SKIN_PATH . "/space/{$type}_{$view}" );
