<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$e_desc = preg_replace("/\<img(.*)\/>/U", " ", $e_shop_info[shop_desc]);
preg_match_all("/\<img(.*)\/>/U", $e_shop_info[shop_desc], $matches);
$img = $matches[0][0];
$sect_info = kekezu::get_table_data ( "*", "witkey_member_ext", " type='sect' and uid='$member_id' ", "", "", "", "k" );
require keke_tpl_class::template(SKIN_PATH."/space/{$type}_{$view}");
