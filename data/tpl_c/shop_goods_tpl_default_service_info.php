<?php keke_tpl_class::checkrefresh('shop/goods/tpl/default/service_info', '1465984345' );?><?php $page_title=$service_info['title'].'--'.$_K['html_title'] ?><?php if($_K['inajax']) { ?>
     <?php if(!isset($ajaxmenu)) { ?>
<h3 class="flb"><em><?php echo $title;?></em><span><a href="javascript:;" class="flbc" onClick="hideWindow('<?php echo $handlekey?>');" title="close"><?php echo $_lang['close'];?></a></span></h3>
<?php } ?>
<?php } else { ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php echo $_K['charset'];?>">
<title><?php echo $page_title;?></title>
<meta name="keywords" content="<?php echo $page_keyword;?>">
<meta name="description" content="<?php echo $page_description;?>">
<meta name="generator" content="<?php echo $_lang['keke_pub'];?> <?php echo KEKE_VERSION;?>" />
<!-- 手版专用代码 -->
<meta name="viewport" content="width=320,initial-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style” content=black" /> 
<!-- 手版专用代码  end 授权用户专用   -->
<meta name="author" content="kekezu" />
<meta name="copyright" content="<?php echo $basic_config['copyright'];?>" />
<link rel="shortcut icon" href="resource/img/system/logo.ico" />
<link rel="apple-touch-icon" href="resource/img/system/logo.ico"/>
<script type="text/javascript">
var SITEURL= "<?php echo $_K['siteurl'];?>";
var SKIN_PATH = '<?php echo SKIN_PATH;?>';
var LANG       = '<?php echo $language;?>';
var INDEX      = '<?php echo $do;?>';
var CHARSET    = "<?php echo $_K['charset'];?>";
</script>
<link href="resource/css/reset.css" rel="stylesheet">
<!--公用样式-->
<link href="resource/css/base.css" rel="stylesheet">
<!--box样式-->
<link href="resource/css/box.css" rel="stylesheet">
<!--布局样式-->
<link href="resource/css/layout/layout.css" rel="stylesheet">
<link href="<?php echo SKIN_PATH;?>/css/common.css" rel="stylesheet">
<link href="<?php echo SKIN_PATH;?>/theme/<?php echo $_K['theme'];?>/css/<?php echo $_K['theme'];?>_style.css" rel="stylesheet">

 
<!--[if lte IE 8]>
<link href="resource/css/layout/960.min.css" rel="stylesheet">
<![endif]-->
<!--[if lt IE 9]>
<script src="resource/js/system/html5.js" type="text/javascript"></script>
<![endif]-->
<!--jQuery1.4.4库-->
<script src="resource/js/jquery.js" type="text/javascript"></script>
<script src="lang/<?php echo $language;?>/script/lang.js" type="text/javascript"></script>
<script src="resource/js/system/keke.js" type="text/javascript"></script>
<script src="resource/js/in.js" type="text/javascript"></script>
<script type="text/javascript">
 //js异步加载预定义
 	In.add('mouseDelay',{path:"resource/js/jqplugins/jQuery.mouseDelay.js",type:'js'});
In.add('waypoints',{path:"resource/js/jqplugins/waypoints/waypoints.min.js",type:'js'});
In.add('custom',{path:"resource/js/system/custom.js",type:'js',rely:['waypoints']});
 	In.add('form',{path:"resource/js/system/form_and_validation.js",type:'js'});
In.add('print',{path:"resource/js/jqplugins/jquery.print.js",type:'js'});
In.add('task',{path:"resource/js/system/task.js",type:'js'});
 	In.add('calendar',{path:"resource/js/system/script_calendar.js",type:'js'}); 
In.add('xheditor',{path:"resource/js/xheditor/xheditor.js",type:'js'});  
 	In.add('script_city',{path:"resource/js/system/script_city.js",type:'js'}); 
In.add('rating',{path:"resource/js/jqplugins/starrating/jquery.rating.js",type:'js'}); 
In.add('metaData',{path:"resource/js/jqplugins/starrating/jquery.MetaData.js",type:'js'}); 
In.add('lavalamp',{path:"resource/js/jqplugins/lavalamp/jquery.lavalamp-1.3.5.min.js",type:'js'});
In.add('tipsy',{path:"resource/js/jqplugins/tipsy/jquery.tipsy.js",type:'js'});
In.add('autoIMG',{path:"resource/js/jqplugins/autoimg/jQuery.autoIMG.min.js",type:'js'});
 	In.add('slides',{path:"resource/js/jqplugins/slides.min.jquery.js",type:'js'});
In.add('ajaxfileupload',{path:"resource/js/system/ajaxfileupload.js",type:'js'});
In.add('header_top',{path:"resource/js/system/header_top.js",type:'js',rely:['mouseDelay']}); 
In.add('lazy',{path:"resource/js/system/lazy.js",type:'js'});
//css异步加载预定义
In.add('css_tipsy',{path:"resource/js/jqplugins/tipsy/tipsy.css",type:'css'});
In.add('css3buttons',{path:"<?php echo SKIN_PATH;?>/theme/<?php echo $_K['theme'];?>/css/button/stylesheets/css3buttons.css",type:'css'}); 
In.add('css_theme_task',{path:"<?php echo SKIN_PATH;?>/theme/<?php echo $_K['theme'];?>/css/task.css",type:'css'});
In.add('css_task',{path:"<?php echo SKIN_PATH;?>/css/task.css",type:'css'});
 
    In.add('css_rating',{path:"resource/js/jqplugins/starrating/jquery.rating.css",type:'css'});
In.add('pcas',{path:"resource/js/system/PCASClass.js",type:'js'});
  		
//css异步加载
 
In('css_tipsy','css3buttons');
</script>

</head>
    <body>
    <!--[if IE 8]><div id="ie8"><![endif]-->
    <!--[if IE 7]><div id="ie7"><![endif]-->
    <!--[if IE 6]><div id="ie6"><![endif]-->
<div class="<?php echo $_K['theme'];?>_style" id="wrapper">

        <div id="append_parent">
        </div>
        <div id="ajaxwaitid">
        	<div>
        	<img src="<?php echo SKIN_PATH;?>/theme/<?php echo $_K['theme'];?>/img/system/loading.gif" alt="loading"/>
<?php echo $_lang['request_processing'];?>
</div>
</div>
 
<!--无刷新临时替换层-->
        <div id="noflushwarper">
        	<div id="noflushwarper_sub"></div>
        </div>
 	
<!--body start-->



<div class="t_c site_messages">
 <?php keke_loaddata_class::ad_show('GLOBAL_TOP_BANNER','service','') ?>
</div>
    <!--头部 start-->
    <header class="header">
        <div class="container_24 clearfix">
        	<!--logo start-->
            <hgroup class="grid_5 logo">
             	 <h1><a href="index.php">
             	 	<?php if(isset($custom_logo)) { ?>
<img src="<?php echo $basic_config['web_logo'];?>"
<?php } else { ?>
<img src="<?php echo SKIN_PATH;?>/theme/<?php echo $_K['theme'];?>/img/style/<?php echo $basic_config['web_logo'];?>"
<?php } ?>
 title="<?php echo $_K['html_title'];?>" alt="<?php echo $_K['html_title'];?>"></a></h1>
            </hgroup>
            <!--logo end-->
            
            <div class="grid_12">
            	<!--主搜索 start-->
                <div class="search clearfix po_re">
                    <!--搜索框和选项 start-->
                    <form action="" method="post" id="frm_search" class="clearfix fl_l">
                    <div class="search_box">
                        <div class="fl_l search_selcecter">
                        	<div id="search_select" class="search_options">
                            <a href="javascript:void(0);" class="selected" rel="task_list"><span><?php echo $_lang['task'];?></span>▼</a>
                            <a href="javascript:void(0);" class="hidden"   rel="task_list"><?php echo $_lang['task'];?></a>
                            <a href="javascript:void(0);" class="hidden"   rel="shop_list"><?php echo $_lang['goods'];?></a>
                            </div>
                        </div>
<input type="text" name="search_key" onkeydown="search_keydown(event);" id="search_key" class="fl_l search_input txt_input togg c999" value="<?php echo $_lang['input'];?><?php echo $_lang['task'];?>/<?php echo $_lang['goods'];?>" title="<?php echo $_lang['input'];?><?php echo $_lang['task'];?>/<?php echo $_lang['goods'];?>"  x-webkit-speech x-webkit-grammar="bUIltin:search" lang="zh-CN">
                    </div>
</form>
                    <!--搜索框和选项 end-->
                    <!--搜索提交 start-->
                    <div class="fl_l">
                    	<button class="search_btn" id="search_btn" type="button" onclick="topSearch();"><span class="icon magnifier"></span><?php echo $_lang['search'];?></button>
                    </div>
                    <!--搜索提交 end-->
                </div>
                <!--主搜索 end-->
            </div>
            
            <div class="grid_5">
            	<!--用户登录注册 start-->
            	<div class="user_box clearfix">
                	<!--注册登录按钮 start-->
                  	<ul id="login_sub" class="user_login <?php if($uid) { ?>hidden<?php } ?>">
                        <li><a href="index.php?do=register" ><?php echo $_lang['free_register'];?></a></li>
                        <li><a id="login" href="index.php?do=login"><?php echo $_lang['login'];?> ▼</a></li>
                    </ul>
                    <!--注册登录按钮 end--> 
<div class="clear"></div>
            <!--登录弹出框 start-->
            <!--注<?php echo $_lang['zh_mh'];?>验证信息请跳转到登录页面去显示-->
            <div id="login_box" class="login_pop box hidden">
            	<div id="login_form">
            		<div class="t_c hidden pad10" id="loading">
<img src="<?php echo SKIN_PATH;?>/theme/<?php echo $_K['theme'];?>/img/system/loading.gif">
</div>
            		<div class="t_c hidden pad10" id="loading_error">
</div>
<div id="load">
<form action="index.php?do=login&login_type=3" method="post">
<p class="textbox">
<label for="log_name"><?php echo $_lang['user_email_tel'];?></label>
<input type="text" spellcheck="false" autocomplete="off" id="log_name" class="txt_input" value="<?php echo $log_account?>" size="18" name="log_name" tabindex="1">
</p>
<div class="textbox">
<div class="clearfix">
<span class="fl_r"><a href="index.php?do=get_password" class=" minor"><?php echo $_lang['forget_pwd'];?></a></span>
<label for="pwd_password"><?php echo $_lang['pwd'];?></label>
</div>
<input type="password" maxlength="16" autocomplete="off" id="log_password" onkeydown="login_keydown(event);" class="txt_input" size="18" name="log_password" tabindex="2">
</div>
<p class="remember clearfix">
<button type="button" name="login_submit" id="login_submit" tabindex="4" class="fl_r" onclick="ajaxLogin('')"><?php echo $_lang['login'];?></button>
<input type="checkbox" id="log_remember" name="autologin" value="1" tabindex="3">
<label for="log_remember" class="minor"><?php echo $_lang['remember_me'];?></label>
</p>
</form>
                    <div class="login_other clearfix">
                    	<span class="fl_l"><?php echo $_lang['other_account_login'];?></span>
<?php if(is_array($api_open)) { foreach($api_open as $k => $v) { ?>
<?php if($weibo_list[$k.'_app_id']) { ?>
<a href="index.php?do=oauth_login&type=<?php echo $k;?>">
<img src="resource/img/ico/<?php echo $k;?>_t.gif">
</a>
                   <?php } ?>			
<?php } } ?>
                    </div>
                    </div>
</div>
            </div>
            <!--登录弹出框 end-->




                    <!--登录成功 start-->
                    <div id="logined" class="<?php if(!$uid) { ?>hidden<?php } ?>">
                    	<!--用户登录后内容 start-->
                        <ul class="user_logined clearfix">
                            <li id="avatar">
                            	<a href="index.php?do=user&view=index" title="<?php echo $username;?>">
                            		<?php echo  keke_user_class::get_user_pic($uid,'small') ?>
                                    <span class="user_named"><?php echo $username;?></span>
                            	</a>
<!--用户登录后导航菜单 start-->
                    <div id="user_menu" class="user_nav_pop grid_5 alpha omega hidden">
                        <ul class="nav_list clearfix">
                                    	<li class="clearfix"><a href="index.php?do=user&view=finance&op=detail" title="<?php echo $_lang['money'];?> | <?php echo CREDIT_NAME;?>" id="money"> <div class="icon16 cur-yen reverse"></div><?php echo number_format($user_info['balance'],2,'.','') ?> RMB | <?php echo number_format($user_info['credit'],2,'.','') ?></a></li>
                                        <li class="clearfix"><a href="index.php?do=release" title="<?php echo $_lang['pub_task'];?>" class="selected" ><div class="icon16 doc-new reverse"></div><?php echo $_lang['pub_task'];?></a></li>
<li class="clearfix"><a href="index.php?do=shop_release" title="<?php echo $_lang['pub_goods'];?>" class="selected"><div class="icon16 doc-new reverse"></div><?php echo $_lang['pub_goods'];?></a></li>
 <li class="clearfix <?php if($uid ==ADMIN_UID || $user_info['group_id']>0) { ?><?php } else { ?>hidden<?php } ?>" id="manage_center"><a href="control/admin/index.php" title="<?php echo $_lang['manage_center'];?>" ><div class="icon16 key reverse"></div><?php echo $_lang['manage_center'];?></a></li>
<li class="clearfix"><a href="index.php?do=user&view=index" title="<?php echo $_lang['user_center'];?>"><div class="icon16 cog reverse"></div><?php echo $_lang['user_center'];?></a></li>
<li class="clearfix"><a href="index.php?do=space&member_id=<?php echo $uid;?>" title="<?php echo $_lang['my_space'];?>" id="space"><div class="icon16 compass reverse"></div><?php echo $_lang['my_space'];?></a></li>
<li class="clearfix"><a href="index.php?do=user&view=message" title="<?php echo $_lang['website_msg'];?>"><div class="icon16 mail reverse"></div><?php echo $_lang['website_msg'];?></a></li>
                         </ul>
                    </div>
                    <!--用户登录后导航菜单 end-->
</li>
                            <li class="line"></li>
                            <li class="logout"><a onclick="showWindow('out','index.php?do=logout');return false;" title="<?php echo $_lang['logout'];?>" href="index.php?do=logout"><?php echo $_lang['logout'];?></a></li>
                            <li class="clear"></li>
                        </ul>
                        <!--用户登录后内容 end-->


                    </div>
                    <!--登录成功 end-->
                    
                    
                    <div class="clear"></div>
                </div>
                <!--用户登录注册 end-->
            </div>
            
            <div class="grid_2">
            	<!--语言栏 start-->
            	<div class="language">
            		<div class="lan_selcecter">
                      <div id="lan_menu" class="lan_options">
                      <a href="javascript:void(0);" rel="<?php echo $language;?>" class="selected"><?php echo $lang_list[$language];?>▼</a>
  <?php if(is_array($lang_list)) { foreach($lang_list as $k => $v) { ?>
                     	 <a href="javascript:void(0);" rel="<?php echo $k;?>" class="hidden"><?php echo $v;?></a>
  <?php } } ?>
                      </div>
                 	</div>
                </div>
                <!--语言栏 end-->
            </div>
            
            
            
            <div class="clear"></div>
        </div>
    </header>
    <!--头部 end-->
        <!--tool_E-->
 <nav class="nav">
        <div class="container_24" id="pageTop">
        	<div class="menu grid_24 alpha omega clearfix">
                <ul class="clearfix">
                	<?php if(is_array($nav_arr)) { foreach($nav_arr as $k => $v) { ?>
                   		<li>
                   			<?php if(isset($static)&&$v['nav_style']=='article') { ?>
<a href="/html/article/index/1.htm" <?php if(isset($nav_active_index) && $v['nav_style']==$nav_active_index) { ?>class="selected"<?php } ?> <?php if($v['newwindow']) { ?>target="_blank"<?php } ?>>
                   			<?php } else { ?>
                   			<a href="<?php echo $v['nav_url'];?>" <?php if(isset($nav_active_index) && $v['nav_style']==$nav_active_index) { ?>class="selected"<?php } ?> <?php if($v['newwindow']) { ?>target="_blank"<?php } ?>>
                   			<?php } ?><span><?php echo $v['nav_title'];?></span></a>
</li>
<li class="line"></li>
<?php } } ?>
                </ul>
                <!---->
                  <div class="operate po_ab">
                    	<a href="index.php?do=help" target="_blank" title="<?php echo $_lang['help_center'];?>">
                        	<div class="icon16 help reverse"><?php echo $_lang['help_center'];?></div>
                        </a>
                   </div>
                <!---->
</div>
                <div class="clear"></div>
        </div>
    </nav>
    <div class="clear"></div>
<?php } ?>
<link href="<?php echo SKIN_PATH;?>/css/shop.css" rel="stylesheet" type="text/css">
<link href="<?php echo SKIN_PATH;?>/theme/<?php echo $_K['theme'];?>/css/shop.css" rel="stylesheet" type="text/css">
 <!--页面内容区-->
<div class="wrapper">
<!--页面头部-->
<header class=" page_header clearfix ">
    <div class="container_24 po_re">
    <!--面包屑-->
    <div class="breadcrumbs clearfix">
          <a href="index.php"><?php echo $_lang['home'];?></a> \
  <a href="index.php?do=shop_list&path=C<?php echo $model_id;?>"><?php echo $_lang['witkey_shop'];?></a> \
  <a href="index.php?do=shop_list&path=C<?php echo $model_id;?>A<?php echo $service_info['indus_pid'];?>"><?php echo $indus_p_arr[$service_info['indus_pid']]['indus_name'];?></a> \
          <a href="index.php?do=shop_list&path=C<?php echo $model_id;?>A<?php echo $service_info['indus_id'];?>"><?php echo $indus_arr[$service_info['indus_id']]['indus_name'];?></a>
    </div>
<!--end 面包屑-->
<!--页面标题布局-->
<div class="grid_20">
<!--页面标题-->
    	<div class="page_title clearfix">
    		<!--页面标题头像-->
            <div class="fl_l pt_10 mr_5">
                <a href="index.php?do=space&member_id=<?php echo $owner_info['uid'];?>" title="<?php echo $owner_info['username'];?>"><?php echo  keke_user_class::get_user_pic($owner_info['uid'],'small') ?></a>
            </div>
<!--页面标题头像 end-->

            <div class=" page_title">
                <h2 class="title"><a href="javascript:void(0);"><?php echo $service_info['title'];?></a></h2>
                <div class="clearfix page_sub_title c666">
                    <span><?php echo $_lang['type'];?><?php echo $_lang['zh_mh'];?><?php echo $model_info['model_name'];?> </span>
                    <span class="border_l_c mar10"></span>
                    <span><?php echo $_lang['id'];?><?php echo $_lang['zh_mh'];?>#<?php echo $sid;?> </span>
                    <span class="border_l_c mar10"></span>
                    <span><?php echo $_lang['pub_time'];?><?php echo $_lang['zh_mh'];?><?php if($service_info['on_time']){echo date('Y-m-d H:i:s',$service_info['on_time']); } ?></span>
                    <span class="border_l_c mar10"></span>
                    <span><?php echo $_lang['pub_people'];?><?php echo $_lang['zh_mh'];?><a href="index.php?do=space&member_id=<?php echo $owner_info['uid'];?>" target="_blank"><?php echo $owner_info['username'];?></a></span>
                    <span class="font_simsun">·</span>
                    <a href="javascript:void(0)" onclick="sendMessage(<?php echo $owner_info['uid']?>,'<?php echo $owner_info['username']?>')"><?php echo $_lang['send_web_msg'];?></a>
            		<?php $time = time(); ?>
<?php if($payitem_arr['top']>$time&&$item_config['2']['small_pic']) { ?>
<img src="<?php echo $_K['siteurl'];?>/<?php echo $item_config['2']['small_pic']?>" alt="<?php echo $_lang['top'];?>" title="<?php echo $_lang['top'];?>">
<?php } ?>
<?php $is_map =  stristr($service_info['pay_item'], '4'); ?>
 	<?php if($is_map&&$item_config['4']['small_pic']) { ?><img src="<?php echo $_K['siteurl'];?>/<?php echo $item_config['4']['small_pic']?>" alt="<?php echo $_lang['map'];?>" title="<?php echo $_lang['map'];?>"><?php } ?>
 
  </div>
            </div>
</div>
<!--页面标题 end-->
</div>
<!--页面标题布局 end-->
<!--操作区-->
<div id="taskScroll" class="grid_4">
     <div class="control clearfix">
             
<?php if($uid!=$owner_info['uid']) { ?>
                     <a href="index.php?do=shop_order&sid=<?php echo $sid?>" class="submit block"><?php echo $_lang['now_buy'];?></a>
                <?php } ?>
            </div>
</div>
<!--操作区 end-->
<div class="clear"></div>
        <!--页面子导航-->
<div class="page_nav_box">
        <nav class="clearfix page_nav po_re" id="top_nav">
            <ul>
                <li <?php if(!$view||$view=='base') { ?>class="selected"<?php } ?>>
                    <a href="<?php echo $basic_url;?>" title="<?php echo $_lang['goods_recommend'];?>"><span class="icon16 box mr_5">icon</span><?php echo $_lang['goods_recommend'];?></a>
                </li>
                <li <?php if($view=='sale') { ?>class="selected"<?php } ?>>
                    <a href="<?php echo $basic_url;?>&view=sale" title="<?php echo $_lang['buy_record'];?>"><span class="icon16 doc-lines-stright mr_5">icon</span><?php echo $_lang['buy_record'];?> <span class="c999">[<?php echo $service_info['sale_num'];?>]</span></a>
                </li>
                <li <?php if($view=='comment') { ?>class="selected"<?php } ?>>
                    <a href="<?php echo $basic_url;?>&view=comment" title="<?php echo $_lang['leave_word'];?>"><span class="icon16 spechbubble-2 mr_5">icon</span><?php echo $_lang['leave_word'];?> <span class="c999">[<?php echo $service_info['leave_num'];?>]</span></a>
                </li>
                <li <?php if($view=='mark') { ?>class="selected"<?php } ?>>
                    <a href="<?php echo $basic_url;?>&view=mark" title="<?php echo $_lang['evaluation'];?>"><span class="icon16 cert mr_5">icon</span><?php echo $_lang['evaluation'];?><span class="c999">[<?php echo $service_info['mark_num'];?>]</span></a>
                </li>
<?php if($uid==$service_info['uid']) { ?>
 <li <?php if($view=='tools') { ?> class="selected" <?php } ?>>
            <a href="<?php echo $basic_url;?>&view=tools" title="<?php echo $_lang['evaluation'];?>"><span class="icon16 cert mr_5" >icon</span><?php echo $_lang['tool'];?><span class="c999"></span></a>
         </li>
<?php } ?>
                <li class="border_n">
                    <a href="javascript:void(0);" title="<?php echo $_lang['stop_in_left'];?>"><span class="icon16 arrow-bottom-left" style="display:block;" id="arrow-bottom-left"><?php echo $_lang['stop_in_left'];?></span></a>
                </li>
            </ul>
            
        </nav>
        <!--end 页面子导航-->

<!--工具栏-->
            <div class="operate po_ab" >
                <a href="index.php?do=help&fpid=291" title="<?php echo $_lang['help_center'];?>" target="_blank"><span class="icon16 help"><?php echo $_lang['help_center'];?></span></a>
                <a href="javascript:void(0);" onclick="favor('service_id','service','<?php echo $model_code;?>','<?php echo $owner_info['uid'];?>','<?php echo $sid;?>','<?php echo $service_info['title'];?>','<?php echo $sid;?>')" title="<?php echo $_lang['favorit'];?>"><span class="icon16 star-fav-empty"><?php echo $_lang['favorit'];?></span></a>
                <?php if($uid&&$uid!=$owner_info['uid']) { ?>
                	<!--start 作品举报-->
                    <a href="javascript:void(0)" onclick="report('product','2','<?php echo $sid;?>','<?php echo $owner_info['uid'];?>','<?php echo $owner_info['username'];?>');" title="<?php echo $_lang['works_report'];?>"><span class="icon16 hand-1"><?php echo $_lang['works_report'];?></span></a>
<!--end 作品举报-->
<!--start 作品投诉-->
                    <a href="javascript:void(0)" onclick="report('product','3','<?php echo $sid;?>','<?php echo $owner_info['uid'];?>','<?php echo $owner_info['username'];?>');" title="<?php echo $_lang['works_complaints'];?>"><span class="icon16 bell"><?php echo $_lang['works_complaints'];?></span></a>
<!--end 作品投诉-->
<?php } ?>
<a class="" href="index.php?do=ajax&view=share&oid=1&title=<?php echo $service_info['title'];?>" id="share1" onmouseover="share(this)" title="<?php echo $_lang['share'];?>"><span class="icon16 share"><?php echo $_lang['share'];?></span></a>
                <a href="index.php?do=service&sid=<?php echo $sid;?>" class="" title="<?php echo $_lang['return_home'];?>"><span class="icon16 home"><?php echo $_lang['return_home'];?></span></a>
            </div>
            <!--end 工具栏-->
<div class="clear"></div>
    	</div>
</div>
</header>
<!--end 页面头部-->
<!--主内容-->
<section class="clearfix content">
    <div class="container_24">
<!--左边导航 start-->

<section class="clearfix section">
        	<div class="second_menu container_24 po_ab hidden" id="left_nav">
        <div class="suffix_23 pull_1 clearfix">
            <nav class="minor_nav box clearfix">
                <ul class="nav_group clearfix">
                    <li><a href="<?php echo $basic_url;?>" <?php if(!$view||$view=='base') { ?>class="selected"<?php } ?> title="<?php echo $_lang['goods_recommend'];?>"><span class="icon16 box block ">商</span></a></li>
                <li>
                    <a href="<?php echo $basic_url;?>&view=sale" <?php if($view=='sale') { ?>class="selected"<?php } ?> title="<?php echo $_lang['buy_record'];?> [<?php echo $service_info['sale_num'];?>]"><span class="icon16 doc-lines-stright block">购</span></a>
                </li>
                <li>
                    <a href="<?php echo $basic_url;?>&view=comment" <?php if($view=='comment') { ?>class="selected"<?php } ?> title="<?php echo $_lang['leave_word'];?> [<?php echo $service_info['leave_num'];?>]"><span class="icon16 spechbubble-2 block">留</span></a>
                </li>
                <li >
                    <a href="<?php echo $basic_url;?>&view=mark" <?php if($view=='mark') { ?>class="selected"<?php } ?> title="<?php echo $_lang['evaluation'];?> [{<?php echo $mc['all'];?>]"><span class="icon16 cert block">评</span></a>
                </li>
        
                </ul>
                <ul class="nav_group clearfix">
<li>
         	<a href="javascript:void(0);" class="" title="<?php echo $_lang['stop_in_top'];?>">
            	<div class="icon16 arrow-top-right block" id="arrow-top-right">停</div>
            </a>
         </li>
                </ul>
            </nav>
        </div>
    </div>
<!--左边导航 end-->	
            <div class="show_panel container_24 po_re">
                <div class="po_re clearfix box">
                    <div class="panel clearfix box">
                    <?php if(!$view||$view=='base') { ?>
                        <!--left-->
                        <div class="grid_16 omega  pt_10">
                            <div class="prefix_1 suffix_1">
                                <div class="product_desc t_c pad10">
                                    <img  alt="<?php echo $service_info['title'];?>" onerror="this.src='resource/img/style/shop_default_big.jpg'" name="lazyImg" lazy_src="<?php if($service_info['pic']) { ?><?php echo $service_info['pic']?><?php } else { ?>resource/img/system/shop_default_big.jpg<?php } ?>">
                                    <p class="mt_10">
                                        <a href="javascript:void(0);" class="button" onclick="zoom(this,'<?php echo $service_info['pic'];?>')"><span class="icon16 eye mr_5"></span><?php echo $_lang['preview'];?></a>
                                        <a href="javascript:void(0);" class="button ml_10" onclick="favor('service_id','service','<?php echo $model_code;?>','<?php echo $owner_info['uid'];?>','<?php echo $sid;?>','<?php echo $service_info['title'];?>','<?php echo $sid;?>')"><span class="icon16 star-fav-empty mr_5"></span><?php echo $_lang['favorit'];?></a>
                                    </p>
                                </div>
                                <div class="describe mt_20 ws_prewrap ws_break">
                                    <h2 class="border_b_c mb_10"><span class="font16"><?php echo $_lang['recommend'];?></span></h2>
                                    <?php echo $service_info['content']?>
                                </div>
<!--任务地图-->
<?php if($service_info['point']) { ?>
<details open  class="mb_20">       
        <summary class="pad5 fontb"><?php echo $_lang['shop_map'];?><em class="c999 font_normal"></em></summary> 
<?php if($_K['map_api']=='baidu') { ?>
<?php if($_K['map_api']=='baidu') { ?>
<script type="text/javascript" src="<?php echo $_K['baidu_api'];?>"></script>
<?php } else { ?>
<script type="text/javascript" src="<?php echo $_K['google_api'];?>"></script>
<?php } ?>
<div id="div_map"  >
<script type="text/javascript">
$(function(){	
var px = parseFloat("<?php echo $px;?>");
var py = parseFloat("<?php echo $py;?>");												
init(px,py,8);
})
function init(px,py,zo){							
map = new BMap.Map("container"); // 创建地图实例
var point = new BMap.Point(py,px); // 创建点坐标												
map.centerAndZoom(point, zo); // 初始化地图，设置中心点坐标和地图级别
map.enableScrollWheelZoom(); //鼠标滑动设置地图级别
var opts = {type: BMAP_NAVIGATION_CONTROL_SMALL};
map.addControl(new BMap.NavigationControl(opts)); //添加平移缩放控件	
var marker = new BMap.Marker(point);
map.addOverlay(marker);	
}						
</script>
<input type="hidden" name="px" id="px" value="<?php echo $px;?>"/>
<input type="hidden" name="py" id="py" value="<?php echo $py;?>"/> 

<div id="container" style="width:500px;height:200px"></div>

</div>
<?php } else { ?>
<?php if($_K['map_api']=='baidu') { ?>
<script type="text/javascript" src="<?php echo $_K['baidu_api'];?>"></script>
<?php } else { ?>
<script type="text/javascript" src="<?php echo $_K['google_api'];?>"></script>
<?php } ?>
<div id="div_map"  >
<script type="text/javascript">
$(function(){	
var px = parseFloat("<?php echo $px;?>");
var py = parseFloat("<?php echo $py;?>");												
init(px,py,8);
})
function init(px,py,zo){
var myLatlng = new google.maps.LatLng(px,py);
var myOptions = {center: myLatlng,	zoom: 6,mapTypeId: google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById('container'),myOptions); 
   var marker = new google.maps.Marker({map: map,position:myLatlng	})

}	

</script>
<input type="hidden" name="px" id="px" value="<?php echo $px;?>"/>
<input type="hidden" name="py" id="py" value="<?php echo py;?>"/> 		
<div id="container" style="width:500px;height:200px"></div>

</div>
<?php } ?>     
    </details>	
<?php } ?>
<!--end任务地图-->
                            </div>
                            <div class="prefix_1 suffix_1">
                                <!--免责声明&提醒-->
                                <div class="notice pad10 mt_20">
                                    <p class="clearfix">
                                        <span class="grid_2 t_r omega alpha"><?php echo $_lang['disclaimer'];?><?php echo $_lang['zh_mh'];?></span>
                                        <span class="grid_11 alpha omega"><?php echo $_lang['law_notice'];?></span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="grid_2 t_r omega alpha"><?php echo $_lang['friendly_notice'];?><?php echo $_lang['zh_mh'];?></span>
                                        <span class="grid_11 alpha omega"><?php echo $_lang['alipay_order_notice'];?></span>
                                    </p>
                                </div>
                                <!--end 免责声明&提醒-->
                                <div class="clear">
                                </div>
                                <!--其他作品-->
                                <div class="mt_30 other_product pt_20">
                                    <div class="clearfix">
                                       <?php if($more_list) { ?>
                                        <?php if(is_array($more_list)) { foreach($more_list as $v) { ?>
<a class="grid_3 alpha" href="index.php?do=service&sid=<?php echo $v['service_id'];?>" title="<?php echo $v['title'];?>" target="_blank">
<?php if(file_exists($v['pic'])) { ?>
 <?php $tmp=explode('/',$v['pic']);$size=sizeof($tmp); ?>
<?php $tmp[$size-1]='100_'.$tmp[$size-1];$small=implode('/',$tmp); ?>
                             			<img src="<?php echo $small;?>" alt="<?php echo $v['title'];?>">
<?php } else { ?>
<img src="<?php echo $style_path;?>/img/shop/shop_default.gif" alt="<?php echo $v['title'];?>">
<?php } ?>
</a>
<?php } } ?>
                                        <?php } ?>
                                    </div><a class="block" href="index.php?do=space&member_id=<?php echo $service_info['uid'];?>&view=goods" target="_blank"><?php echo $_lang['more'];?><span class="fontb"><?php echo $owner_info['username'];?></span><?php echo $_lang['de_works'];?>&gt;&gt;</a>
                                </div>
                                <!--end 其他作品-->
                            </div>
                        </div>
                        <!--end left--><!--right-->
                        <div class="grid_8 alpha omega pt_10">
                            <!--人数统计-->
                            <div class="statistics mt_10 mb_10 clearfix ">
                            	<ul>
                                <li>
                                    
                                        <strong class="digital t_c"><?php echo $service_info['sale_num'];?></strong>
                                        <span><?php echo $_lang['buy_people'];?></span>
                                   
                                </li>
                                <li class="border_l_c">
                                    
                                        <strong class="digital t_c"><?php echo $service_info['focus_num'];?></strong>
                                        <span><?php echo $_lang['collection_people'];?></span>
                                    
                                </li>
                                <li class="border_l_c">
                                    
                                        <strong class="digital t_c"><?php echo $service_info['views'];?></strong>
                                        <span><?php echo $_lang['browse_people'];?></span>
                                    
                                </li>
                                <li class="border_l_c">
                                    
                                        <strong class="digital t_c"><?php echo $service_info['leave_num'];?></strong>
                                        <span><?php echo $_lang['leave_word'];?></span>
                                    
                                </li>
</ul>
                            </div>
                            <!--end 人数统计--><!--现在购买-->
                            <div class="buyNow mt_10 clearfix po_re">
                                <span class="po_ab shop_arrow"></span>
                                <span class="fontb c900 fl_l ml_10"><?php echo $_lang['currency'];?><?php echo $service_info['price'];?></span>
</div>
                            <!--end 现在购买--><!--附加信息-->
                            <div class="shop_otherInfo bord_c mt_10">
                                <ul>
                                    <li>
                                        <span><?php echo $_lang['company'];?></span><?php echo $service_info['unite_price'];?>
                                    </li>
                                    <li>
                                        <span><?php echo $_lang['type'];?></span><?php echo $model_info['model_name'];?>
                                    </li>
                                    <li>
                                        <span><?php echo $_lang['class'];?></span><?php echo $indus_p_arr[$service_info['indus_pid']]['indus_name'];?>/
                                        <?php echo $indus_arr[$service_info['indus_id']]['indus_name'];?>
                                    </li>
                                    <li>
                                        <span><?php echo $_lang['pay_money'];?></span><?php if($service_info['submit_method']=='inside') { ?><?php echo $_lang['website_in_download'];?><?php } else { ?><?php echo $_lang['website_out_pay'];?><?php } ?>
                                    </li>
                                </ul>
                            </div>
                            <!--end 附加信息--><!--作者信息-->
                            <div class="shop_author bord_c mt_10 pad10 clearfix">
                                <div class="t_c fl_l portrait mr_10">
                                    <div style="height:118;width:120">
                                        <?php echo  keke_user_class::get_user_pic($owner_info['uid'],'middle') ?>
                                    </div>
                                    <a href="index.php?do=space&member_id=<?php echo $owner_info['uid'];?>" class="button mt_10"><b class="fl_l"><?php echo $_lang['into_space'];?></b><span class="icon16 top-right-expand fl_r"></span></a>
                                </div>
                                <div class="fl_l ml_10">
                                    <p class="shop_sign">
                                        <b><a href="index.php?do=space&member_id=<?php echo $owner_info['uid'];?>" class="pt_10 font14b" target="_blank"><?php echo $owner_info['username'];?></a> <?php echo $user_level['pic']?></b>
                                        <div class="clear">
                                        </div>
                                        <span><?php if($owner_info['residency']) { ?><?php echo $owner_info['residency']?><?php } else { ?><?php echo $_lang['now_no'];?><?php } ?></span>
                                    </p>
                                    <p>
                                    	<!--卖家的认证信息-->
                                        <?php if(is_array($auth_info)) { foreach($auth_info as $k => $v) { ?>
<a href="javascript:void(0)" title="<?php echo $v['auth_title'];?>" class="mr_5">
<img src="<?php echo $_K['siteurl'];?>/<?php echo $v['auth_small_ico'];?>" alt=''>
</a>
<?php } } ?>
                                    </p>
                                    <div class="shop_sum1 clearfix">
                                        <ul>
                                            <li class="border_r_c fl_l">
                                                <a href="javascript:void(0);" class="font14b block"><?php if($owner_info['seller_total_num']) { ?><?php echo number_format($owner_info['seller_good_num']/$owner_info['seller_total_num'],4)*100 ?><?php } else { ?>0<?php } ?>%</a>
                                                <span><?php echo $_lang['good_evaluation_rate'];?></span>
                                            </li>
                                            <li class="border_r_c fl_l">
                                                <a href="javascript:void(0);" class="font14b block"><?php echo intval($owner_info['accepted_num']) ?></a>
                                                <span><?php echo $_lang['win_bid'];?></span>
                                            </li>
                                            <li class="fl_l">
                                                <a href="javascript:void(0);" class="font14b block"><?php echo intval($service_info['sale_num']) ?></a>
                                                <span><?php echo $_lang['sell'];?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--loading 加载 start-->
                                    <div class="loading_bar">
                                        <div class="progress_bar" grade="<?php echo $user_level['grade_rate'];?>">
                                            <?php echo $user_level['grade_rate'];?>%
                                        </div>
                                    </div>
                                    <!--loading 加载 end-->
                                </div>
                            </div>
                            <!--end 作者信息-->
                            
                            <div class="shop_intrest mt_20 pt_10 m_h">
                                <h3><span class="font14 pl_10"><?php echo $_lang['you_may_interested_goods'];?></span></h3>
                                <?php if($related_list) { ?>
                                <?php if(is_array($related_list)) { foreach($related_list as $v) { ?>
<a href="index.php?do=service&sid=<?php echo $v['service_id'];?>" target="_blank" title="<?php echo $v['title'];?>">
<?php if(file_exists($v['pic'])) { ?>
<?php $tmp=explode('/',$v['pic']);$size=sizeof($tmp); ?>
<?php $tmp[$size-1]='100_'.$tmp[$size-1];$small=implode('/',$tmp); ?>
                             		<img src="<?php echo $small;?>" alt="<?php echo $v['title'];?>">
<?php } else { ?>
<img src="<?php echo $style_path;?>/img/shop/shop_default.gif" alt="<?php echo $v['title'];?>">
<?php } ?>
</a>
<?php } } ?>
                                <?php } else { ?>
<div class="t_c">
                      <?php echo $_lang['now_no'];?>
</div>
                                <?php } ?>
                            </div>
                        </div><!--right-->
                        <div class="clear"></div>

  <?php } elseif($view=='sale') { ?><div class="grid_24">
  <header class="clearfix box_header">
    <div class="fl_l pl_10 pr_20">
      <h3 class="font16b lineh_32"><span class="font16b"><?php echo $_lang['buy_record'];?>[ <?php echo $service_info['sale_num'];?> ]</span></h3>
    </div>
    <div class="grid_18 alpha">
      <nav class="box_nav">
        <ul class="clearfix">
          <li <?php if(!$w) { ?> class="selectedLava" <?php } ?>>
          	<a href="<?php echo $basic_url;?>&view=<?php echo $view;?>#pageTop"><?php echo $_lang['all'];?>[ <?php echo $service_info['sale_num'];?> ]</a>
          </li>
          <li <?php if($t=='today') { ?> class="selectedLava" <?php } ?>>
          	<a href="<?php echo $basic_url;?>&view=<?php echo $view;?>&t=today#pageTop" ><?php echo $_lang['newest'];?>[ <?php echo $today_sale;?> ]</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <div class="prefix_1 suffix_1 clearfix">
  <div class="list mt_10">
    <dl>
      <dd class="tags clearfix">
        <ul>
          <li class="w2"> <?php echo $_lang['buyer'];?><?php if(!$uid) { ?><?php echo $_lang['after_login_view'];?><?php } ?></li>
          <li class="w2"> <?php echo $_lang['give_price'];?> </li>
          <li class="w4"> <?php echo $_lang['success_deal_time'];?> </li>
          <li class="w2"> <?php echo $_lang['status'];?> </li>
        </ul>
      </dd>
      <?php if($sale_list) { ?>
      <?php if(is_array($sale_list)) { foreach($sale_list as $v) { ?>
      <dd>
        <ul style="height:25px;">
          <li class="w2"> <?php if($uid) { ?> <a href="index.php?do=space&member_id=<?php echo $v['order_uid'];?>" target="_blank"><?php echo $v['order_username'];?></a> <?php } else { ?>
            <?php echo $_lang['not_can_view'];?>
            <?php } ?> </li>
          <li class="w2 red"> <?php echo $_lang['currency'];?><?php echo $v['order_amount'];?> </li>
          <li class="w4"> 
            <?php if($v['order_time']){echo date('Y-m-d H:i:s',$v['order_time']); } ?> 
          </li>
          <li class="w2"> <?php echo $status_arr[$v['order_status']];?> </li>
        </ul>
      </dd>
      <?php } } ?>
      <?php } else { ?>
      <dd class="bf7 clearfix t_c font14b"> <?php echo $_lang['now_no_deal_record'];?> </dd>
      <?php } ?>
    </dl>
  </div>
  <!--page 翻页 start-->
  <div class="page fl_r">
    <p class="clearfix"><?php echo $pages['page'];?></p>
    <div class="clear"></div>
  </div>
  <!--page 翻页 end--> 
  </div>
</div>
                          <?php } elseif($view=='comment') { ?><div class="grid_24 po_re">
                <header class="clearfix box_header">
                	<div class="fl_l pl_10 pr_20">	
                    	<h3 class="font16b"><?php echo $_lang['leave_word'];?>[<?php echo $service_info['leave_num'];?>]</h3>
</div>
                </header>
                <div class="grid_22 prefix_1">
                	<div id="comment_page">
                    
                    <!--留言-->
<?php if(is_array($comment_data)) { foreach($comment_data as $k => $v) { ?>
                    <div class="ly1 mt_20 mb_10" id="p_<?php echo $v['comment_id']?>">
                        <div class="top1 clearfix mt_10 po_re" style="vertical-align:middle;">
                            <a href="#" class="fl_l block">
                            	<?php echo  keke_user_class::get_user_pic($v['uid'],'small') ?>
</a>
<a href="#" class="ml_10 mt_5 mr_20 fl_l block pt_10 fl_l"><?php echo $v['username'];?></a>
                            <span class="pt_10 mt_5 block"><?php if($v['on_time']){echo date('Y-m-d H:i:s',$v['on_time']); } ?></span>
                            <?php if($uid ==ADMIN_UID||$user_info['group_id']==7) { ?>
<div class="operate po_ab hidden"> 
<a href="javascript:;" title="<?php echo $_lang['delete'];?>" onclick="comment_del('p_<?php echo $v['comment_id'];?>','<?php echo $v['comment_id']?>');return false;"><span class="icon16 trash"><?php echo $_lang['delete'];?></span></a>
                            </div>
<?php } ?>
                        </div>
                        <div class="pad10">
                             <p class="font14 pl_40 ml_10 ws_prewrap ws_break"><?php echo $v['content'];?></p> 
                        </div>
<!--留言回复开始-->
<div class="cc pl_30 mt_10" id="p_reply_<?php echo $v['comment_id'];?>">
<?php if(is_array($reply_arr)) { foreach($reply_arr as $k1 => $v1) { ?>
    <?php if($v1['p_id']==$v['comment_id']) { ?>
 <div id="div_reply_<?php echo $v1['comment_id']?>" class="comment_item po_re clearfix">

<div class="fl_l mr_10">
    	<a href="index.php?do=space&member_id=<?php echo $v1['uid']?>" title="<?php echo $v1['username'];?>"><?php echo  keke_user_class::get_user_pic($v1['uid'],'small') ?></a>
</div>
<div class="grid_19 alpha">
<a href="index.php?do=space&member_id=<?php echo $v1['uid']?>"><?php echo $v1['username'];?></a><?php echo $_lang['yu'];?><?php if($v1['on_time']){echo date('Y-m-d H:i:s',$v1['on_time']); } ?><?php echo $_lang['comment'];?>:
<p class="db ws_prewrap ws_break"><?php echo $v1['content'];?></p>
</div>
<div class="operate po_ab hidden">
<?php if($uid == $v1['uid'] || $uid ==ADMIN_UID||$user_info['group_id']==7) { ?>
 	<a href="javascript:;" title="<?php echo $_lang['delete'];?>" onclick="comment_del('div_reply_<?php echo $v1['comment_id']?>','<?php echo $v1['comment_id']?>');return false;"><span class="icon16 trash"><?php echo $_lang['delete'];?></span></a>
                                	<?php } ?>
</div>
<div class="clear"></div>

 </div>
<?php } ?>
 		<?php } } ?>
</div>
<!--留言回复结束-->
                    </div>

 <!--有留言才有回复-->
 <?php if($uid==$owner_info['uid']) { ?>
<div class="work_answer pl_30 pt_10 pb_10 clearfix" id="answers_<?php echo $v['comment_id']?>">
<div class="answer-form ">
                    	<div class="grid_10 alpha">
<textarea class=" txt_input reply_comment" onkeydown="checkCommentInner(this,event)" cols="70" id="txt_reply_<?php echo $v['comment_id'];?>" style="height:15px;"><?php echo $_lang['reply'];?></textarea>
                       	   <div class="answer-textarea  answer-zone pt_10 hidden" >
                                <button type="button" class="button answer-zone" value="<?php echo $_lang['confirm'];?>" onclick="comment_reply('<?php echo $v['comment_id']?>')"><span class="check icon"></span><?php echo $_lang['reply'];?></button>
                                <span class="answer_word"><?php echo $_lang['you_can_input'];?></span>
                            </div>
                        </div>
</div>
  	</div>
<?php } ?>
<?php } } ?>

<!--end留言-->
                <!--page 翻页 start-->
                <?php if($comment_page['page']) { ?>
<div class="page">
                    <p class="clearfix" >                       
                         <?php echo $comment_page['page'];?>
                    </p>
<div class="clear">
                    </div>
                </div>
<?php } ?>
                <!--page 翻页 end-->
                <div class="clear"></div>
</div></div>
                <div class="clear"></div>
<header class="clearfix box_header">
                	<div class="fl_l pl_10 pr_20">	
                    	<h3 class="font16b" id="h3_pub_comment"><?php echo $_lang['pub_new_msg'];?></h3>
</div>
                </header>
                <!--留言部分-->
                <div class="lyk prefix_1 mt_10 mb_10 clearfix">
                    <div class="grid_14">
                    	
 <div class="work_answer">
<div class="answer-form">
                       <textarea class="font14 txt_input"  id="tar_comment"  cols="100" onkeydown="checkCommentInner(this,event)"><?php echo $_lang['pub_new_comment'];?></textarea>
<div class=" ">
<button type="button" class="button block fl_l" value="<?php echo $_lang['send_comment'];?>" onclick="comment_add()"><span class="check icon"></span><?php echo $_lang['public'];?></button>
<span class="answer_word"><?php echo $_lang['you_can_input'];?></span>
</div>
</div>
</div>

                    </div>
                    <div class="grid_8">
                        <p class="ly_notice">
                            	<?php echo $_lang['to_people_notice'];?>
                        </p>
                    </div>
                </div>
                <!--end 留言部分-->
            </div>
<script  type="text/javascript" >
$(function (){ 
notice_comment();
$(".reply_comment").live('click',function(){
notice_comment();
})
$("#tar_comment").focus(function(){
this.value='';
}).blur(function(){
this.value==''?this.value="<?php echo $_lang['pub_new_comment'];?>":'';
})
})
//增加评论
function comment_add()
{
var uid = '<?php echo $uid?>';
if(check_user_login())
{
var t = $("#tar_comment").val().toString().substr(0,100);
if(t=="<?php echo $_lang['pub_new_comment'];?>"||t==''){
showDialog("<?php echo $_lang['say_little'];?>",'alert',"<?php echo $_lang['msg_fail'];?>","",1);return false;
}else{
$.post(basic_url+"&view=comment&op=add",{content:t},function(text){ 
if(text=='2'){
showDialog("<?php echo $_lang['donot_submit_again'];?>",'alert',"<?php echo $_lang['operate_fail'];?>","",1);

}else if(text=='3'){
showDialog("<?php echo $_lang['sensitive_word'];?>",'alert',"<?php echo $_lang['deal_fail'];?>","",1); 
}else{
var text_val = $(text);
$("#comment_page").after(text_val); 
comment();
notice_comment();
}

 },'text'); 
}
}
}
//删除评论
function comment_del(obj,comment_id){ 
var obj = obj ;
var comment_id = comment_id;
$.post(basic_url+"&view=comment&op=del",{comment_id:comment_id},function(json){
if(json.status!=0){ 
$("#"+obj).slideUp(600);  
$("#answers_"+comment_id).slideUp(600); 
}else{ 
     showDialog(json.data,"alert",json.msg);	
} 
},'json');  
}
//回复
function comment_reply(comment_id){ 
var comment_id = comment_id;
var t = $("#txt_reply_"+comment_id).val().toString().substr(0,100);
$.post(basic_url+"&view=comment&op=reply",{content:t,pid:comment_id},function(text){
if(text=='2'){
showDialog("<?php echo $_lang['you_haved_replied'];?>",'alert',"<?php echo $_lang['operate_fail'];?>","",1); 
}else if(text=='3'){
showDialog("<?php echo $_lang['sensitive_word'];?>",'alert',"<?php echo $_lang['deal_fail'];?>","",1); 
}else{ 
var text_val = $(text);
$(text_val).appendTo($("#p_reply_"+comment_id)); 
text_val.hide(); 
text_val.slideDown(500); 
comment();
}
},'text'); 
} 
function comment(){
$('.operate a').tipsy({gravity:$.fn.tipsy.autoNS}).hover(function(){
$(this).children('.icon16').addClass("reverse");
}, function(){
$(this).children('.icon16').removeClass("reverse");
});
//评论鼠标移动事件显示工具栏
$(".top1,.comment_item").hover(function(){
$(this).children('.operate').removeClass('hidden');

},function(){
$(this).children('.operate').addClass('hidden');
}); 
};

function notice_comment(){

$(".reply_comment").focus(function(){ 
    var content = $(this).val(); 
    if (content == "<?php echo $_lang['reply'];?>") {

        $(this).val("");
$(this).siblings('.answer-zone').removeClass('hidden');
    }
    }); 
    $(".reply_comment").blur(function(){
        var content = $(this).val();
        if (!content) {
            $(this).val("<?php echo $_lang['reply'];?>");
$(this).siblings('.answer-zone').addClass('hidden');
        }
    });
}




</script>
                          <?php } elseif($view=='mark') { ?><!--星级评定样式-->
<link href="resource/js/jqplugins/starrating/jquery.rating.css" rel="stylesheet" type="text/css">
<!--星级评定-->
<script src="resource/js/jqplugins/starrating/jquery.MetaData.js" type="text/javascript"></script>
<script src="resource/js/jqplugins/starrating/jquery.rating.js" type="text/javascript"></script>

            <div class="grid_24 po_re">
                <header class="clearfix box_header">
                	<div class="fl_l pl_10 pr_20">
                   
</div>
   <div class="grid_18 alpha">
                      	<nav class="box_nav">
                        	<ul class="clearfix">
  	<li><a href="<?php echo $basic_url;?>&view=mark"><?php echo $_lang['all_evaluation'];?>[<?php echo $service_info['mark_num'];?> ]</a></li>
  	<li <?php if($st ==1) { ?>class="selectedLava"<?php } ?> ><a href="<?php echo $basic_url;?>&view=mark&st=1"><?php echo $_lang['good_value'];?>[ <?php echo intval($mark_count['1']['count']) ?> ]</a></li>
<li <?php if($st ==2) { ?>class="selectedLava"<?php } ?>><a href="<?php echo $basic_url;?>&view=mark&st=2"><?php echo $_lang['mid_evaluation'];?>[ <?php echo intval($mark_count['2']['count']) ?> ]</a></li>
<li <?php if($st ==3) { ?>class="selectedLava"<?php } ?>><a href="<?php echo $basic_url;?>&view=mark&st=3"><?php echo $_lang['bad_value'];?>[ <?php echo intval($mark_count['3']['count']) ?> ]</a></li>

      		</ul>
                         </nav>
     </div>
                </header>
            
<?php if($mark_info) { ?> <!--评价-->
<?php if(is_array($mark_info)) { foreach($mark_info as $k => $v) { ?>
                     <div class="ly1 pb_20 pl_40 pr_40 clearfix">
                        <div class="top1 clearfix mt_10">
                            <div class="fl_l mr_10">
                            	<a class="fl_l" href="index.php?do=space&member_id=<?php echo $v['by_uid'];?>" title="<?php echo $v['by_username'];?>">
                            		<?php echo  keke_user_class::get_user_pic($v['by_uid'],'small') ?></a>
<div class="fl_l pt_15 ml_10"><?php echo $v['by_username'];?><?php echo $_lang['to'];?>
<a href="index.php?do=space&member_id=<?php echo $v['uid'];?>" class="ml_10 mr_10"><?php echo $v['username'];?></a><?php echo $_lang['de'];?>
 <?php if($v['mark_status']==1) { ?><?php echo $_lang['good_value'];?><?php } elseif($v['mark_status']==2) { ?>
 <?php echo $_lang['mid_evaluation'];?><?php } elseif($v['mark_status']=='3') { ?>
 <?php echo $_lang['bad_value'];?>
 <?php } else { ?>
 <?php echo $_lang['no_reply_evaluation'];?>
 <?php } ?>
 <img src="resource/img/ico/ico_mark_<?php echo $v['mark_status'];?>.gif">
</div>
                            </div>
                        </div>
                        <div class="pl_10">
                            <p class="mt_10 font14 ws_prewrap ws_break"><?php echo $v['mark_content'];?>
                            </p>
                        </div>
  <?php $aid_info=keke_user_mark_class::get_user_aid($v[by_uid],$v[mark_type],$v[mark_status],2,$v['model_code'],$v['obj_id']); ?>
<div class="fl_r">
<?php if(is_array($aid_info)) { foreach($aid_info as $k2 => $v2) { ?>
<div class="grid_3 omega">
        	 <b><?php echo $v2['aid_name'];?></b>&nbsp;&nbsp;&nbsp;&nbsp;<font color="red"><?php echo $v2['avg'];?></font><?php echo $_lang['fen'];?>
          </div>
       <div class="grid_2 alpha">
        <div class="stars">
             <?php echo keke_user_mark_class::gen_star($v2['avg'],$k.$k2); ?>
 </div>
         </div>
<div class="clear"></div>
<?php } } ?>
</div>
                    </div>
<?php } } ?><!--end评价-->
<?php } else { ?>
<div class="t_c"><span class="c999"><?php echo $_lang['now_no_record'];?></span></div>
<?php } ?>  
       

 <!--page 翻页 start-->
                <div class="page">
                    <p class="clearfix"><?php echo $pages['page'];?> </p>
                    <div class="clear">
                    </div>
                </div>
                <!--page 翻页 end-->
                
                <div class="clear">
                </div>
            </div>
  <?php } elseif($view=='tools'&&$uid==$service_info['uid']) { ?>
 								<?php require S_ROOT.'/control/shop_payitem_tools.php' ?>
                          <?php } ?>	
                          <!--右下角的返回顶部-->
                          <div class="operate fl_r mt_10">
                              <a href="index.php?do=service&sid=<?php echo $sid;?>" title="<?php echo $_lang['return_home'];?>"><span class="icon16 home"><?php echo $_lang['return_home'];?></span></a>
                              <a href="javascript:void(0)" title="<?php echo $_lang['return_top'];?>"><span class="icon16 arrow-top"><?php echo $_lang['return_top'];?></span></a>
                          </div>
                          <!--end右下角的返回顶部-->
                        
                    </div>
</div>
                </div>

              
</section>


<aside class="clearfix">	
                    <div class="clearfix mt_20">
                        <div class="grid_12">
                            <div class="bord_c example clearfix pb_10">
                                <h3 class="mb_10 mt_10"><span class="font14 ml_10"><?php echo $_lang['same_hot_case'];?></span></h3>
                                <?php if($hot_list) { ?>
<?php $i=0 ?>
                                <?php if(is_array($hot_list)) { foreach($hot_list as $v) { ?>
<?php $i++ ?>
                                <div class="grid_4 t_c alpha">
                                    <div <?php if($i%3!==0) { ?> class="border_r_c" <?php } ?>>
                                        <a href="index.php?do=service&sid=<?php echo $v['service_id'];?>" target="_blank">
                                        <?php if(file_exists($v['pic'])) { ?>
<?php $tmp=explode('/',$v['pic']);$size=sizeof($tmp); ?>
<?php $tmp[$size-1]='100_'.$tmp[$size-1];$small=implode('/',$tmp); ?>
                             			<img src="<?php echo $small;?>" alt="<?php echo $v['title'];?>">
<?php } else { ?>
<img src="<?php echo $style_path;?>/img/shop/shop_default.gif" alt="<?php echo $v['title'];?>">
<?php } ?>
</a>
                                        <p>
                                            <span class="c900 font14"><?php echo $_lang['currency'];?><?php echo $v['price'];?><?php echo $_lang['yuan'];?></span>
                                        </p>
<div class="po_re text_ov ">
                                        <a href="index.php?do=service&sid=<?php echo $v['service_id'];?>" target="_blank" title="<?php echo $v['title'];?>"><?php echo kekezu::cutstr($v['title'],24) ?></a>
</div>
  						          </div>
                                </div>
                                <?php } } ?>
                                <?php } else { ?>
<div class="t_c">
                      <?php echo $_lang['now_no'];?>
</div>
                                <?php } ?>
                                <div class="clear">
                                </div>
                                <a class="block t_r mr_20 mt_20" href="index.php?do=shop_list&path=C<?php echo $model_id;?>" target="_blank"><?php echo $_lang['view_more_case'];?>&gt;&gt;</a>
                            </div>
                        </div>
                        <div class="grid_12 alpha omega">
                            <div class="bord_c example clearfix pb_10 shop_list">
                                <h3 class="mb_10 mt_10"><span class="font14 ml_10"><?php echo $_lang['relevant_class_task_list'];?></span></h3>
                                <?php if($task_list) { ?><?php $i=0; ?>
                                <div class="grid_6 alpha omega">
                                    <ul class="border_r_c task_list">
                                        <?php if(is_array($task_list)) { foreach($task_list as $k => $v) { ?>
                                        <?php if($k<7) { ?><?php $i++; ?>
                                        <li>
                                            <a href="index.php?do=task&task_id=<?php echo $v['task_id'];?>" title="<?php echo kekezu::cutstr($v['task_title'],28) ?>"><span class="c900"><?php echo $_lang['currency'];?><?php echo $v['task_cash'];?></span> <?php echo kekezu::cutstr($v['task_title'],28) ?></a>
</li>
                                        <?php } ?>
                                        <?php } } ?>
                                    </ul>
                                </div>
                                <?php if($i==7) { ?>
                                <div class="grid_6 alpha omega">
                                    <ul class="border_r_c task_list">
                                        <?php if(is_array($task_list)) { foreach($task_list as $j => $v) { ?>
                                        <?php if($j>6) { ?>
                                        <li>
                                            <a href="index.php?do=task&task_id=<?php echo $v['task_id'];?>" title="<?php echo kekezu::cutstr($v['task_title'],28) ?>"><span class="c900"><?php echo $_lang['currency'];?><?php echo $v['task_cash'];?></span><span class="bk_color"> <?php echo kekezu::cutstr($v['task_title'],28) ?></span></a>
                                        </li>
                                        <?php } ?>
                                        <?php } } ?>
                                    </ul>
                                </div>
                                <?php } ?>
                                <?php } ?><a class="block t_r mr_20 mt_20" href="index.php?do=task_list" target="_blank"><?php echo $_lang['view_more_task'];?>&gt;&gt;</a>
                            </div>
                        </div>
</div>
             </aside>      
            
        
    </div>
</section>
<!--end 主内容-->
</div>
 <!--end 页面内容区-->
 

<script type="text/javascript">
    var uid = parseInt('<?php echo $uid;?>') + 0;
    var sid= parseInt('<?php echo $sid;?>') + 0;
    var basic_url = "index.php?do=service&sid=" + sid;
</script>

<script type="text/javascript" >
In.add('service',{path:"resource/js/system/service.js",type:'js'});
In('service'); 
In('lazy',function(){
loadPics();
})
</script>
<?php if(!isset($inajax)) { ?>

<!--页脚 satrt-->
<footer class="footer clearfix">
<!--网站链接以及语言栏 关注我们 搜索 start-->
<section class="site_bottom">
</section>
 <?php if(!isset($footer_load) ) { ?>
<section class="site_links clearfix">
 <div class="container_24 ">
  <!--网站地图 start-->
  <?php if($do!='user' ) { ?>
    <div class="sitemap clearfix mb_10">
    
<div class="grid_5">
                <dl>
                    <dt><?php echo $_lang['recommend_cate'];?></dt>
                      <dd>
                           <ul>
                            <?php if(is_array($indus_p_arr)) { foreach($indus_p_arr as $k => $v) { ?>
<?php if($v['is_recommend']==1) { ?>
            	<li><a href="index.php?do=task_list&path=A<?php echo $k;?>"  target="_blank"><?php echo $v['indus_name'];?></a></li>
<?php } ?>
<?php } } ?>
                           </ul>
                      </dd>
                </dl>
      </div>

     <div class="grid_3">
       <dl>
         <dt><?php echo $_lang['task_hall'];?></dt>
            <dd>
             <ul>
                <li><a href="index.php?do=release" target="_blank"><?php echo $_lang['pub_task'];?></a></li>
 <?php if(is_array($link_task)) { foreach($link_task as $v) { ?>
<?php if($v['model_type']=='task'&&$v['model_status']=='1') { ?>
                      <li><a href="index.php?do=task_list&path=B<?php echo $v['model_id'];?>" target="_blank"><?php echo $v['model_name'];?></a></li>
<?php } ?>
 <?php } } ?>
              </ul>
             </dd>
        </dl>
      </div>
  
      <div class="grid_3">
         <dl>
            <dt><?php echo $_lang['witkey_shop'];?></dt>
              <dd>
                 <ul>
    <?php if(is_array($link_task)) { foreach($link_task as $v) { ?>
<?php if($v['model_type']=='shop'&&$v['model_status']=='1') { ?>
                      <li><a href="index.php?do=shop_list&path=B<?php echo $v['model_id'];?>" target="_blank"><?php echo $v['model_name'];?></a></li>
<?php } ?>
 <?php } } ?>
                 </ul>
                </dd>
         </dl>
     </div>
            <div class="grid_3">
                <dl>
                   <dt><?php echo $_lang['news_center'];?></dt>
                      <dd>
                          <ul>
                          	<?php if(is_array($link_news)) { foreach($link_news as $v) { ?>
                          	  <li><a href="index.php?do=article&view=article_list&art_cat_id=<?php echo $v['art_cat_id'];?>" target="_blank"><?php echo $v['cat_name'];?></a></li>
<?php } } ?>
                          </ul>
                      </dd>
                </dl>
            </div>
            
            <div class="grid_3">
                <dl>
                    <dt><?php echo $_lang['case_display'];?></dt>
                      <dd>
                     	  <ul>
                            <li><a href="index.php?do=case" target="_blank"><?php echo $_lang['success_case'];?></a></li>

                          </ul>
                       </dd>
                 </dl>
            </div>
            <div class="grid_3" style="display:none;">
              <dl>
                 <dt><?php echo $_lang['talent_resource'];?></dt>
                      <dd>
                          <ul>
                              <li><a href="index.php?do=talent" target="_blank"><?php echo $_lang['talent_recommend'];?></a></li>
                              <li><a href="index.php?do=talent" target="_blank"><?php echo $_lang['talent_list'];?></a></li>
                          </ul>
                      </dd>
               </dl>
            </div>
                    <div class="grid_3">
                    	<dl>
                        	<dt><?php echo $_lang['about_website'];?></dt>
                            <dd>
                            	<ul>
                                	<li><a href="index.php?do=article&view=article_list&art_cat_id=202" target="_blank"><?php echo $_lang['about_us'];?></a></li>
<li><a href="index.php?do=link" target="_blank"><?php echo $_lang['friend_link'];?></a></li>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                    <div class="grid_3">
                    	<dl>
                        	<dt><?php echo $_lang['help_center'];?></dt>
                            <dd>
                            	<ul>
                            		
    	<?php if(is_array($link_help)) { foreach($link_help as $k => $v) { ?>
       		 <li><a href="index.php?do=help&fpid=<?php echo $k;?>" target="_blank"><span><?php echo $v['cat_name'];?></span></a></li>
<?php } } ?>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                    </div>
                    <!--网站地图 end-->
                    <div class="line"></div>
<?php } ?>
                    <!--语言栏 关注我们 搜索 start-->
                    <div class="site_attach clearfix">
                        <div class="grid_5">
                            <form action="" method="post" id="lan_bottom">
                                <div class="clearfix">
                                     <label class="fl_l t_r"><?php echo $_lang['language'];?></label>
                                     <select id="lan" name="lan" style="width:100px" onchange="setLang(this.value)">
  <?php if(is_array($lang_list)) { foreach($lang_list as $k => $v) { ?>
    <option value="<?php echo $k;?>" <?php if($k==$language) { ?>selected<?php } ?>><?php echo $v;?></option>
  <?php } } ?>
                                     </select>
                                 </div>
                            </form>

                        </div>
<div class="grid_7 lineh_32">
<a href="index.php?do=mobile"><?php echo $_lang['wap'];?></a>
</div>
<?php if($attent_api_open) { ?>
                        <div class="grid_6 t_r">
                        	<dl class="social">
                            	<dt><?php echo $_lang['about_us_'];?></dt>
                            	<dd>
                                	<ul>
                                <?php if(is_array($attent_api_open)) { foreach($attent_api_open as $k => $v) { ?>
<?php if($attent_list[$k]['v']) { ?>
<li>
<?php $i = explode("_", $k);$i = $i['0'];$j=($attent_list[$k]); ?> 
<a href="index.php?do=wb&focus=<?php echo $j?>&wb_type=<?php echo $i?>"><img src="resource/img/ico/<?php echo $i;?>_t.gif" title="<?php echo $attent_list[$k]?>"></a> 
</li>
<?php } ?>
<?php } } ?>
</ul>
                                </dd>
                            </dl>
                        </div>
<?php } ?>
                    </div>
                    <!--语言栏 关注我们 搜索 end-->
                    <div class="clear"></div>
                </div>
</section>
 <!--网站链接以及语言栏 关注我们 搜索 end-->
<?php } ?>
            <!--网站版权声明 start-->
            <section class="site_copyright clearfix">
            	<div class="container_24 clearfix ">
                    	 	<dl>
<dt>
                    	 		<?php echo $_lang['company'];?><?php echo $basic_config['company'];?><span class="pad10"><?php echo $_lang['address'];?><?php echo $basic_config['address'];?></span><?php echo $_lang['contact_phone'];?><?php echo $basic_config['phone'];?>
</dt>
<dd>
                    	 	<?php echo P_NAME;?><?php echo KEKE_VERSION;?> Copyright &copy; 2009 -2011 kekezu. All rights reserved <a href="http://icp.valu.cn/" target="_blank"><?php echo $basic_config['filing'];?></a>
<?php if(KEKE_DEBUG) { ?>
<span>
Querys: <?php echo db_factory::create()->get_query_num() ?>
 &nbsp;
Times:<?php echo kekezu::execute_time() ?>
</span>			
<?php } ?>
</dd>  
                    	 	</dl>
 <div class="clear"></div>
 <div class="clearfix"><?php echo $basic_config['stats_code']?></div>
                </div>
            </section>
            <!--网站版权声明 end-->
            
            <!--返回顶部 start-->

        	<a class="top" href="#pageTop" title="Back to top"><em>&diams;</em>Top</a></li>
              
            <!--返回顶部 end-->
    </footer>
    <!--页脚 end-->
</div>
<?php if($uid) { ?>
<?php kekezu::update_oltime($uid,$username) ?>
<?php } ?>
<script type="text/javascript">
var xyq = "<?php echo $xyq = session_id(); ?>";
<?php if($exec_time_traver) { ?>
$(function(){
   $.get('js.php?op=time&r='+Math.random());	
})
<?php } ?>
 //js异步加载
In('header_top','custom','lavalamp','tipsy','autoIMG','slides');




</script>
<script src="resource/js/uploadify/jquery.uploadify-3.1.min.js" type="text/javascript"></script>
<link href="resource/js/uploadify/uploadify.css" rel="stylesheet">
<!--[if IE 6]></div><![endif]-->
<!--[if IE 7]></div><![endif]-->
<!--[if IE 8]></div><![endif]-->
</body>
</html>
<?php } ?>
<?php keke_tpl_class::ob_out();?>