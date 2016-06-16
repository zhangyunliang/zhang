<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$member_id = intval ( $member_id );
keke_lang_class::package_init($do);
$member_info = kekezu::get_user_info($member_id);
$e_route_arr = array ("index", "statistic", "goods","member","intr","case","task" );
$e_banner_keys = array('index'=>'sy','intr'=>'gsjs','member'=>'qycy','task'=>'xgrw','goods'=>'spzs','case'=>'cgal','statistic'=>'gstj');
$p_route_arr = array ("index", "info", "goods","statistic"); 
 $shop_obj = new Keke_witkey_shop_class();
 $shop_obj->setWhere("uid = ".intval($member_id));
 $p_shop_info = $shop_obj->query_keke_witkey_shop();
 if (!$p_shop_info){
 	$jump_url = $member_id == $uid ? 'index.php?do=user&view=setting&op=space' : 'index.php';
 	kekezu::show_msg($_lang['this_user_no_open_space'], $jump_url);
 }
 $p_shop_info = $p_shop_info['0'];
 $e_shop_info = $p_shop_info;
 $banner_column = 'banner';
 if (!$view || $view=='index'){
 	$banner_column = 'homebanner';
 	$e_route_arr = array_slice($e_route_arr, 0, 5);
 }
if($e_shop_info[$banner_column]){
	$banner_arr = unserialize($p_shop_info[$banner_column]);
}else{
	$banner_arr = array(
			'sy'=>'tpl/default/img/enterprise/banner_img.jpg',
			'gsjs'=>'tpl/default/img/enterprise/banner_img.jpg',
			'qycy'=>'tpl/default/img/enterprise/qycy_banner.jpg',
			'xgrw'=>'tpl/default/img/enterprise/rw_banner.jpg',
			'spzs'=>'tpl/default/img/enterprise/sp_banner.jpg',
			'cgal'=>'tpl/default/img/enterprise/suc_banner.jpg',
			'gstj'=>'tpl/default/img/enterprise/gstj_banner.jpg');
}
if ($ac=='up_pic'){
	$banner_keys = $e_banner_keys;
	$img_type = $banner_keys[$view] ? $banner_keys[$view] : 'sy';
	$ext = '.jpg,.jpeg,.png,.gif';
	if ($sbt){
		if ($p_shop_info['shop_type'] != 2 || $member_id!=$uid){
			kekezu::echojson($_lang['insufficient_permissions'],'0',array('type'=>$img_type,'file'=>$file_name));die();
		}
		if ($view=='index' || !$view){
			$banner_arr[$slide_index] = $file_name;
		}else{
			$banner_arr[$img_type] = $file_name;
		}
		$banner = serialize($banner_arr);
		$sql = sprintf("update %switkey_shop set %s='%s' where shop_id=%d",TABLEPRE,$banner_column,$banner,$e_shop_info['shop_id']);
		$result = db_factory::execute($sql);
		kekezu::echojson('',$result ? '1' : '0',array('type'=>$img_type,'file'=>$file_name));
		die();
	}else{
		$title=$_lang['change_the_slide'];
		require keke_tpl_class::template(SKIN_PATH."/space/e_uppic");
		die();
	}
}
$pub_num = intval(db_factory::get_count(sprintf(" select count(service_id) count from %switkey_service where uid='%d' and service_status='2'",TABLEPRE,$member_id),0,null,3600));
 $p_shop_info['shop_type'] == 2 and $type = "e" or $type="p"; 
in_array( $view, $p_shop_info['shop_type'] == 2 ? $e_route_arr : $p_route_arr) or $view = "index";
if ($p_shop_info['shop_backstyle'] ){
	$shop_backstyle = unserialize($p_shop_info['shop_backstyle']);
	$shop_backstyle = implode(' ', array_values($shop_backstyle));
}
 $ip = kekezu::get_ip();
 if($_COOKIE['ip']!=1){
  	db_factory::execute ( sprintf ( " update %switkey_shop set views=views+1 where uid=%d",TABLEPRE, $member_id));
	$_COOKIE['ip']='1';
  setcookie("ip",1,time()+3600*24,COOKIE_PATH);
 }
keke_lang_class::package_init("space");
keke_lang_class::loadlang("{$type}_{$view}");
 $p_shop_nav = array(
 		"index"=>$_lang['home'],
 		"info"=>$_lang['person_info'],
 		"goods"=>$_lang['my_goods']."[$pub_num]",
 		"statistic"=>$_lang['user_total']);
 $e_shop_nav = array(
 		"index"=>$_lang['home'],
 		"intr"=>$_lang['company_info'],
 		"member"=>$_lang['e_member'],
 		"task"=>$_lang['relation_task'],
 		"goods"=>$_lang['goods_display'],
 		"case"=>$_lang['success_case'],
 		"statistic"=>$_lang['company_total']);
$footer_load = false;
require S_ROOT . "control/space/{$type}_{$view}.php";
