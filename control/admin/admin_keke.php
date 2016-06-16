<?php
defined ( 'ADMIN_KEKE' )or exit ( 'Access Denied' );
keke_lang_class::package_init('admin');
keke_lang_class::loadlang('admin_{$do}_$view');
$views = array ('account','gettask','posttask','getlist','postlist','finance');
$view = (! empty ( $view ) && in_array ( $view, $views )) ? $view : 'account';
if (file_exists ( ADMIN_ROOT . 'admin_'.$do.'_' . $view . '.php' )) {
	require_once ADMIN_ROOT . 'admin_'.$do.'_' . $view . '.php';
} else {
	kekezu::admin_show_msg ($_lang['404_page'],'',3,'','warning');
}