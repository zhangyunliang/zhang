<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$p_url =$_K['siteurl']."/index.php?do=space&member_id=$member_id";
$credit_level = unserialize ( $member_info ['seller_level'] );
$seller_aid = keke_user_mark_class::get_user_aid ( $member_id, '2', null, '1' );
$sale_num = intval(db_factory::get_count(sprintf(" select count(order_id) count from %switkey_order where seller_uid='%d' and model_id in (6,7)",TABLEPRE,$member_id)));
$buy_num = intval(db_factory::get_count(sprintf(" select count(order_id) count from %switkey_order where order_uid='%d' and model_id in (6,7)",TABLEPRE,$member_id)));
$model_list = $kekezu->_model_list;
$sql =" select a.order_uid,a.order_name,a.order_username,b.obj_id,a.model_id from "
	  .TABLEPRE."witkey_order a left join ".TABLEPRE
	  ."witkey_order_detail b on a.order_id = b.order_id where 
	  	a.seller_uid='$member_id' and a.order_status='confirm'";
intval($page) or $page=1;
intval($page_size) or $page_size=10;
$url = "index.php?do=space&member_id=$member_id&view=statistic&page=$page";
$count = intval(db_factory::execute($sql));
$pages = $kekezu->_page_obj->getPages($count, $page_size, $page, $url);
$sale_list = db_factory::query($sql.$pages['where']);
$mark_list = kekezu::get_table_data("mark_content,mark_value,by_uid","witkey_mark"," uid='$member_id' and model_code in ('goods','service') and mark_status>0","","","","by_uid",3600);
require keke_tpl_class::template ( SKIN_PATH . "/space/{$type}_{$view}" );
