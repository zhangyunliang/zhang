<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
in_array($opp, array('grow','mark')) or $opp= 'grow';
$ac_url=$origin_url."&op=credit";
$star_arr=keke_glob_class::get_mark_star();
switch ($opp) {
	case "grow" :
		$credit_level = unserialize($user_info['buyer_level']);
		$able_level =  unserialize($user_info['seller_level']);
		$found_count = kekezu::get_table_data ( " sum(fina_cash) cash,sum(fina_credit) credit,count(fina_id) count,fina_action ", "witkey_finance", " uid='$uid' and fina_action in ('pub_task','task_bid','buy_service','sale_service') ", "", " fina_action ", "", "fina_action" );
		$saler_aid=keke_user_mark_class::get_user_aid($uid,'1',null,'1');
		$buyer_aid=keke_user_mark_class::get_user_aid($uid,'2',null,'1');
		break;
	case "mark" :
		$mark_obj=new Keke_witkey_mark_class();
		$where=" 1 = 1 ";
		intval($page) or $page="1";
		intval($page_size) or $page_size="5";
		!isset($mark_status) and $mark_status='n';
		$role_type      or         $role_type="1";
		$url=$ac_url."&opp=$opp&mark_status=$mark_status&mark_type=$mark_type&role_type=$role_type&page_size=$page_size&page=$page";
		$role_type=='1' and $where.=" and uid='$uid'" or $where.=" and by_uid='$uid' ";
		$mark_count=kekezu::get_table_data(" count(mark_id) count,mark_status","witkey_mark",$where,"","mark_status ","","mark_status");
		$mark_status!='n'&&isset($mark_status) and $where.=" and mark_status='$mark_status' ";
		$mark_obj->setWhere($where);
		$count=intval($mark_obj->count_keke_witkey_mark());
		$pages=$kekezu->_page_obj->getPages($count, $page_size, $page, $url,"#userCenter");
		$mark_obj->setWhere($where.$pages['where']);
		$mark_list=$mark_obj->query_keke_witkey_mark();
		break;
}
function gen_star($num,$name){
	$j = round($num*2);
    $str = "";  
	for($i=1;$i<11;$i++){
     $str .= "<input name=\"star_$name\" type=\"radio\" class=\"star {split:2}\" value=\"$i\" 
     disabled=\"disabled\"";
     if($j==$i) $str .= " checked />";
    }
    return $str;
}
require keke_tpl_class::template ( "user/" . $do . "_" . $op.'_'.$opp );