<?php
defined ( 'IN_KEKE' ) or exit('Access Denied');
$sina_app_id = $kekezu->_sys_config['sina_app_id'];
$sohu_app_id = $kekezu->_sys_config['sohu_app_id'];
$seo_title = $kekezu->_sys_config['seo_title'];
intval($oid) or $oid = null;
strval($title) and $title .= "@".$kekezu->_sys_config['website_name'] or $title = $kekezu->_sys_config['website_name'];
strtolower(CHARSET)=='gbk' and $utitle = urlencode(kekezu::gbktoutf($title)) or $utitle = urlencode($title);
require $kekezu->_tpl_obj->template ( 'ajax/ajax_share' );