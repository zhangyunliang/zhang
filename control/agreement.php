<?php
defined ( 'IN_KEKE' ) or exit('Access Denied');
kekezu::check_login();
$agree_info = db_factory::get_one(sprintf("select model_id,buyer_uid,seller_uid from %switkey_agreement where agree_id='%d'",TABLEPRE,$agree_id));
$agree_info or kekezu::keke_show_msg("index.php",$_lang['illegal_in_no_exits'],'error');
$agree_info['buyer_uid']!=$uid&&$agree_info['seller_uid']!=$uid and kekezu::keke_show_msg("index.php",$_lang['wain_you_no_double']);
$model_info = $kekezu->_model_list[$agree_info['model_id']];
$model_info or kekezu::keke_show_msg("index.php",$_lang['now_model_no_exits_no_in'],'error');
keke_lang_class::package_init("task_".$model_info['model_dir']);
keke_lang_class::loadlang("task_agreement");
require "task/".$model_info['model_dir']."/control/task_agreement.php";
