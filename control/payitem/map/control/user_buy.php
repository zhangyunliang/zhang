<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
if($sbt_buy){
	$res=keke_payitem_class::payitem_cost($item_code,$buy_num);
	$res and kekezu::show_msg($item_info['item_name'].$_lang['buy_success'],"index.php?do=$do&view=$view&op=$op&show=my#userCenter","3",'','success') or kekezu::show_msg($item_info['item_name'].$_lang['buy_fail'],$_SERVER['HTTP_REFERER'],"3","","warning");
}
$remain= keke_payitem_class::payitem_exists($uid,$item_code);
require keke_tpl_class::template("control/payitem/$item_code/tpl/user_buy");