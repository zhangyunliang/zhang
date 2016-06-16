<?php keke_tpl_class::checkrefresh('tpl/default/task_list', '1465984368' );?><?php if($_K['inajax']) { ?>
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
 <?php keke_loaddata_class::ad_show('GLOBAL_TOP_BANNER','task_list','') ?>
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
<div class="wrapper">
<!--页面头部-->
<header class="clearfix page_header">
    	<div class="container_24">
    	
        <!--页面导航-->
        	<div class="breadcrumbs clearfix">
            	<a href="index.php"><?php echo $_lang['home'];?></a>\
        	</div>
        <!--end 页面导航-->

<!--页面标题(搜索前)-->
        	<div class="page_title clearfix">
            	<div class="grid_20">
                	<h2 class="title"><?php if($search_key) { ?><?php echo $search_key?><?php } else { ?><?php echo $_lang['task_hall'];?><?php } ?></h2>
            	</div>

            	<div class="grid_4 pt_10">
                	<a href="index.php?do=release" class="submit block"> <?php echo $_lang['pub_task'];?> </a>
            	</div>

            	<div class="clear"></div>
             
        	</div>
        <!--end 页面标题--><!--页面标题(搜索后)-->
        	<div class="page_title clearfix" style="display:none;">
            	<div class="grid_20">
                	<h2 class="title"><?php echo $_lang['search_result'];?></h2>
            	</div>
            	<div class="grid_4 pt_10">
                	<a href="#" class="submit block">[ <?php echo $_lang['release'];?> ]</a>
            	</div>
            	<div class="clear"></div>
        	</div>
        <!--end 页面标题--><!--页面子导航-->
        <nav class="clearfix page_nav po_re">
            <ul>
                <li>
                    <a href="index.php?do=task" title="<?php echo $_lang['task_index'];?>"><span><?php echo $_lang['task_index'];?></span></a>
                </li>
 <li class="selected">
                    <a href="index.php?do=task_list"><span><?php echo $_lang['task_list'];?></span></a>
                </li>
<li>
                    <a href="index.php?do=task_map" title="<?php echo $_lang['task_map'];?>"><span><?php echo $_lang['task_map'];?></span></a>
                </li>
            </ul>
        </nav>
        <!--end 页面子导航-->
    	</div>
</header>
<!--end 页面标题--><!--主内容-->
<section class="clearfix content">
<div class="container_24"> 
<div class="clear"></div>
  <!--大厅列表_头部二栏广告 start-->
 		 <?php keke_loaddata_class::ad_show('LIST_HEAD_TWO','task_list','') ?>
  <!--大厅列表_头部二栏广告 end-->
<div class="box mt_10 clearfix">
            <div class="grid_24">
                <!--筛选条件-->
                <div class="filter box normal po_re">
                	<div class="inner">
                    <!--条件列表-->
                    <div class="condition_list pad10">
                        <!--分类-->
                        <dl class="condition clearfix">
                            <dt class="grid_2 omega">
                                <?php echo $_lang['task_classify'];?>
                            </dt>
                            <dd class="grid_21">
                                <?php $exist = stristr($path, "A"); ?>
<a href="<?php echo $check_all['A']?>"  <?php if(!$exist) { ?>  class='selected' <?php } ?>><?php echo $_lang['all'];?> </a>
                                <?php if(is_array($check_url_arr['A'])) { foreach($check_url_arr['A'] as $k => $v) { ?>
<a href="<?php echo $v['url']?>" <?php if(isset($v['selected'])) { ?>  class="selected" <?php } ?>><?php echo $v['indus_name'];?></a>
                                <?php } } ?> 
                            </dd>
                        </dl>
                        
                        <!--end 分类--><!--条件1-->
                        <dl class="condition clearfix">
                            <dt class="grid_2 omega">
                                <?php echo $_lang['task_model'];?>
                            </dt>
                            <dd class="grid_21">
                                <?php $exist = stristr($path, "B"); ?>
<span id="single_choice_span" <?php if($model_ids) { ?>  style="display:none" <?php } ?>>
<a href="<?php echo $check_all['B']?>" <?php if(!$exist) { ?>  class='selected' <?php } ?>><?php echo $_lang['all'];?> </a>

<?php if(is_array($check_url_arr['B'])) { foreach($check_url_arr['B'] as $k => $v) { ?>  
<a href="<?php echo $v['url']?>"  <?php if(isset($v['selected'])) { ?>   class="selected" <?php } ?> ><?php echo $v['model_name']?> </a>
<?php } } ?>
</span>

                                <!--搜索模式切换--><span id="much_choice_span" <?php if(!$model_ids) { ?>  style="display:none" <?php } ?>>
                                <a href="javascript:model_all();" id="model_all"><?php echo $_lang['all'];?></a> 
                                <?php if(is_array($check_url_arr['B'])) { foreach($check_url_arr['B'] as $k => $v) { ?>
                              		<?php $is_true = in_array( "$v[model_id]",array_filter(explode("M", $model_ids))) ?>
<a href="javascript:void(0);"  <?php if($is_true) { ?>   class="selected" <?php } ?>  id="model_a_<?php echo $v['model_id']?>" onclick="select_model_a('<?php echo $v['model_id']?>')">
<input class="model_class" <?php if($is_true) { ?>  checked="checked" <?php } ?>  type="checkbox" id="test_<?php echo $v['model_id'];?>" ext="<?php echo $v['model_id']?>" > <?php echo $v['model_name']?></a>
<?php } } ?>

</span>
<a class="button" id="show_much_choice" onclick="much_choice();" <?php if($model_ids) { ?>  style="display:none" <?php } ?>>
<span class="icon check"></span><?php echo $_lang['more_model'];?></a>
                                <span id="much_choice_sreach" <?php if(!$model_ids) { ?>  style="display:none" <?php } ?>>
                                	<a class="button" onclick="model_search();"><span class="magnifier icon"></span><?php echo $_lang['search'];?></a>
<a class="button" onclick="model_reset();"><span class="icon reload"></span><?php echo $_lang['reset'];?></a>
</span>
                                <!--end -->
</dd>
                          </dl>
                          <!--end 条件1--><!--条件2-->
                          <dl class="condition clearfix">
                          		<dt class="grid_2 omega">
                                   <?php echo $_lang['task_reward_money'];?>
                                </dt>
                                    <dd class="grid_21">
                                        <span id="general_search" <?php if(isset($_COOKIE['keketask_list_search_cash'])) { ?>  style="display:none;" <?php } ?>>
                                        	<?php $exist = stristr($path, "C"); ?>
<a href="<?php echo $check_all['C']?>" <?php if(!$exist) { ?>  class="selected" <?php } ?>><?php echo $_lang['all'];?> </a>
<?php if(is_array($check_url_arr['C'])) { foreach($check_url_arr['C'] as $k => $v) { ?>
 
<a href="<?php echo $v['url']?>" <?php if(isset($v['selected'])) { ?> class="selected" <?php } ?> ><?php echo $v['name']?> </a>
<?php } } ?>

<a class="button" style="" onclick="custom_search_cash('task_list_search_cash')">
                                        	<span class="icon cog"></span><?php echo $_lang['user_defined'];?></a></span>
                                        <div id="cool_search" <?php if(!isset($_COOKIE['keketask_list_search_cash'])) { ?>  style="display:none;" <?php } ?>>
                                            <div class="grid_12">
                                            	<div class="pr_30">
                                                <div id="slider-range" class="mr_5"></div>
<div class="clear"></div>
<ul class="range-num">
<li >0</li>
                                                	<li >1000</li>
<li >2000</li>
<li >3000</li>
<li class="lasts">4000</li>
<li class="last">5000</li>
</ul>
<div class="clear"></div>
</div>
<div class="clear"></div>
<div class="pt_10">
                                                <label for="amount1">
                                                    <?php echo $_lang['price'];?>:
                                                </label>

                                                <input type="text" id="amount1" class="txt_input" size="5"/> -
<input type="text" id="amount2" class="txt_input" size="5"/> <?php echo $_lang['yuan'];?>
<a class="button" style="" onclick="search_task_cash()"><span class="magnifier icon"></span><?php echo $_lang['search'];?>　</a>
                                            		
</div>
</div>
<div class="grid_8"><a class="button" style="" onclick="task_cash_reset('task_list_search_cash')"><span class="icon reload"></span><?php echo $_lang['return'];?>　</a></div>

                                        </div>
                                    </dd>
                                </dl>
                                <form id="cash_frm" name="cash_frm" action="" method="get">
                                    <input type="hidden" name="do" value="task_list">
<input type="hidden" name="path" value="<?php if($path) { ?><?php echo $path?><?php } ?>" id="cash_frm_path">
<input type="hidden" name="min" id="min">
<input type="hidden" name="max" id="max">
<input type="hidden" name="model_ids" id="task_model_ids" value="<?php echo $model_ids?>">
<input type="hidden" name="page_size" id="page_size" value="<?php echo $page_size?>">
                                </form>
                                <form id="cash_frm_fh" name="cash_frm_fh" action="" method="get">
                                    <input type="hidden" name="do" value="task_list"><input type="hidden" name="path" value="<?php if($path) { ?><?php echo $path?><?php } else { ?>;<?php } ?>"><input type="hidden" name="page_size" id="page_size" value="<?php echo $page_size?>">
                                </form><!--end 条件2--><!--隐藏层-->
                                <div id="condition_list" style="display:none">
                                    <!--条件3-->
                                    <dl class="condition clearfix">
                                        <dt class="grid_2 omega">
                                            <?php echo $_lang['reward_trust'];?>
                                        </dt>
                                        <dd class="grid_21">
                                            <?php $exist = stristr($path, "D"); ?>
                                            	<a href="<?php echo $check_all['D']?>" <?php if(!$exist) { ?>  class="selected" <?php } ?>><?php echo $_lang['all'];?> </a>
                                            <?php if(is_array($check_url_arr['D'])) { foreach($check_url_arr['D'] as $k => $v) { ?>
                                             
                                            <a href="<?php echo $v['url']?>" <?php if(isset($v['selected'])) { ?>  class="selected" <?php } ?> ><?php echo $v['name']?> </a>
                                            <?php } } ?>
                                        </dd>
                                    </dl>
                                    <!--end 条件3--><!--条件4-->
                                    <dl class="condition clearfix">
                                        <dt class="grid_2 omega">
                                            <?php echo $_lang['pub_time'];?>
                                        </dt>
                                        <dd class="grid_21">
                                            <?php $exist = stristr($path, "E"); ?><a href="<?php echo $check_all['E']?>" <?php if(!$exist) { ?>  class="selected" <?php } ?>><?php echo $_lang['all'];?> </a>
                                            <?php if(is_array($check_url_arr['E'])) { foreach($check_url_arr['E'] as $k => $v) { ?>
                                             	<a href="<?php echo $v['url']?>" <?php if(isset($v['selected'])) { ?>  class="selected" <?php } ?>><?php echo $v['name']?> </a>
                                            <?php } } ?>
                                        </dd>
                                    </dl>
                                    <!--end 条件4--><!--条件4-->
                                    <dl class="condition clearfix">
                                        <dt class="grid_2 omega">
                                            <?php echo $_lang['task_status'];?>
                                        </dt>
                                        <dd class="grid_21">
                                            <?php $exist = stristr($path, "F"); ?><a href="<?php echo $check_all['F']?>" <?php if(!$exist) { ?>  class="selected" <?php } ?>><?php echo $_lang['all'];?> </a>
                                            <?php if(is_array($check_url_arr['F'])) { foreach($check_url_arr['F'] as $k => $v) { ?>
                                            <a href="<?php echo $v['url']?>" <?php if(isset($v['selected'])) { ?>  class="selected" <?php } ?> ><?php echo $v['name']?> </a>
                                            <?php } } ?> 
                                        </dd>
                                    </dl>
                                    <!--end 条件4--><!--条件5-->
                                    <dl class="condition clearfix border_n">
                                        <dt class="grid_2 omega">
                                            <?php echo $_lang['other'];?>
                                        </dt>
                                        <dd class="grid_21">
                                            <?php $exist = stristr($path, "G"); ?>
<a href="<?php echo $check_all['G']?>" <?php if(!$exist) { ?>  class="selected" <?php } ?>><?php echo $_lang['all'];?> </a>
                                            <?php if(is_array($check_url_arr['G'])) { foreach($check_url_arr['G'] as $k => $v) { ?> 
<a href="<?php echo $v['url']?>" <?php if(isset($v['selected'])) { ?> class="selected" <?php } ?>><?php echo $v['name']?> </a>
                                            <?php } } ?> 
                                        </dd>
                                    </dl>
                                    <!--end 条件5-->
                                </div>
                                <!--end 隐藏层-->


                            </div>
                    <!--end 条件列表-->

<!--已选条件-->
                            <div class="select_condition clearfix pad10">
                            	
                                <div class="grid_2 omega">
                                    <h3 class="title"><?php echo $_lang['selected_terms'];?></h3>
                                </div>
                                <div class="grid_21">
                                    <!--当无选择条件时显示span标记-->
<?php if(is_array($select_arr)) { foreach($select_arr as $k => $v) { ?>
<a href="<?php echo $v['url']?>" class="selected"><?php echo $v['name']?> <span class="close">&times;</span></a>
                                    <?php } } ?>
                                    <?php if($select_arr) { ?><a href="index.php?do=task_list" class="button"><span class="icon reload"></span><?php echo $_lang['reset'];?>　</a>
                                    <a href="javascript:save_cookie()" class="button"><span class="icon check"></span><?php echo $_lang['save_search_terms'];?></a>
                                    <div class="success" style="color:#2f55a0;display:none" id="success">
                                        <?php echo $_lang['save_suc'];?>
                                    </div>
                                    <?php } else { ?><span><?php echo $_lang['no_selected_terms'];?></span>
                                    <?php } ?>
                                </div>
                            
</div> 
<!--end 已选条件--> 
                     </div>
 <!--工具栏-->
                            <div class="operate po_ab">
                                <a href="javascript:show_hide()" id="tool_show" title="<?php echo $_lang['unfold'];?>"><div class="icon16 sq-plus"><?php echo $_lang['unfold'];?></div></a>
                   				<a href="javascript:show_hide()" id="tool_hide" style="display:none" title="<?php echo $_lang['fold'];?>"><div class="icon16 sq-minus"><?php echo $_lang['fold'];?></div></a>
                            </div>
                <!--end 工具栏-->
    </div>
                <!--end 筛选条件-->
            </div>
          </div>
                    
<form action="" method="post" id="frm1">
                        <input type="hidden" name="hid_save_cookie" id="hid_save_cookie"><input type="hidden" name="hid_del_cookie" id="hid_del_cookie">
                    </form>
                    <section class="clearfix section">
                        <div class="second_menu container_24 po_ab">
                            <div class="suffix_23 pull_1" style="margin-right:-5px;">
                                <nav class="minor_nav box">
                                    <ul class="nav_group clearfix">
                                        <li>
                                            <a href="index.php?do=help&fpid=290" title="<?php echo $_lang['help_center'];?>"><div class="icon16 help"><?php echo $_lang['help_center'];?></div><b class="font14 ml_5 po_re" style="top:3px;">？</b></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="show_panel container_24 po_re">
                            <div class="po_re clearfix box">
                                <!--左边内容-->
                                <div class="grid_20 omega">
                                    <div class="box normal clearfix">
                                        <!--左内容头-->
                                        <div class="border_b_c clearfix">
                                            <div class="grid_5 omega">                  
                                                    
                                                        <?php echo $_lang['total_find'];?><span class="cc00"> <?php echo $count?> </span><?php echo $_lang['tiao_result'];?>
                                                                                               
                                            </div>
                                            <div class="grid_15 alpha omega po_re">
                                              
    <!--end 小翻页--><!--列表项数量-->
                                                <div class="page_count fl_r">
                                                    <a href="index.php?do=task_list&path=<?php echo $path?>&min=<?php echo $min?>&max=<?php echo $max?>&page_size=20" <?php if($page_size==20||!$page_size) { ?>  class="selected" <?php } ?>>20 </a>
                                                    <a href="index.php?do=task_list&path=<?php echo $path?>&min=<?php echo $min?>&max=<?php echo $max?>&page_size=40" <?php if($page_size==40) { ?>  class="selected" <?php } ?>>40 </a>
                                                    <a href="index.php?do=task_list&path=<?php echo $path?>&min=<?php echo $min?>&max=<?php echo $max?>&page_size=60" <?php if($page_size==60) { ?>  class="selected" <?php } ?>>60 </a>
                                                    <a href="index.php?do=task_list&path=<?php echo $path?>&min=<?php echo $min?>&max=<?php echo $max?>&page_size=80" <?php if($page_size==80) { ?>  class="selected" <?php } ?>>80 </a>
                                                </div>
                                                <!--end 列表项数量-->
<!--小翻页-->
                                                <div class="min_page  fl_l">
                                                    <p class="clearfix">
                                                        <?php echo $pages['page']?>
                                                    </p>
                                                    <div class="clear">
                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </div>
                                        <!--end 左内容头--><!--列表主内容-->
                                        <div class="list clearfix">
                                            <dl>
                                                <dt>
                                                    <?php echo $_lang['task_reward'];?>
                                                </dt>
                                                <dd class="tags">
                                                    <ul>
                                                        <li class="w4 t_l">
                                                            <?php echo $_lang['task'];?>
                                                        </li>
                                                        <li>
                                                            
<a href="index.php?do=task_list&path=<?php echo $path?>&min=<?php echo $min?>&max=<?php echo $max?>&page_size=<?php echo $page_size?>&ord=1"  <?php if($ord!=2) { ?> class="hidden" <?php } ?>  id="pub_time_1" ord=1><?php echo $_lang['pub_time'];?>▲</a>
<a href="index.php?do=task_list&path=<?php echo $path?>&min=<?php echo $min?>&max=<?php echo $max?>&page_size=<?php echo $page_size?>&ord=2"  <?php if($ord==1||!$ord) { ?> class="" <?php } else { ?> class="hidden"<?php } ?>   ord=2><?php echo $_lang['pub_time'];?>▼</a>
<a <?php if($ord!=3&&$ord!=4||!$ord) { ?>class="hidden" <?php } ?> href="index.php?do=task_list&path=<?php echo $path?>&min=<?php echo $min?>&max=<?php echo $max?>&page_size=<?php echo $page_size?>&ord=2"><?php echo $_lang['pub_time'];?></a>
                                                       
                                                        </li>
                                                        <li class="w2">
                                                            	<a href="index.php?do=task_list&path=<?php echo $path?>&min=<?php echo $min?>&max=<?php echo $max?>&page_size=<?php echo $page_size?>&ord=3" ord=3 <?php if($ord!=4) { ?> class="hidden" <?php } ?> id="pub_time_3" ><?php echo $_lang['task_reward_money'];?>▲</a>
<a href="index.php?do=task_list&path=<?php echo $path?>&min=<?php echo $min?>&max=<?php echo $max?>&page_size=<?php echo $page_size?>&ord=4"  ord=4  <?php if($ord!=3) { ?> class="hidden" <?php } ?> id="pub_time_4" ><?php echo $_lang['task_reward_money'];?>▼</a>
                                                     			<a <?php if($ord==3||$ord==4) { ?> class="hidden" <?php } ?> href="index.php?do=task_list&path=<?php echo $path?>&min=<?php echo $min?>&max=<?php echo $max?>&page_size=<?php echo $page_size?>&ord=4" ><?php echo $_lang['task_reward_money'];?></a>
    </li>

                                                        <li>
                                                            <?php echo $_lang['task_model'];?>
                                                        </li>
                                                        <li>
                                                            <?php echo $_lang['count'];?>
                                                        </li>
                                                        <li>
                                                            <?php echo $_lang['status'];?>
                                                        </li>
                                                    </ul>
                                                </dd>
                                                <?php if(is_array($task_list_arr)) { foreach($task_list_arr as $k => $v) { ?>  
                                                <dd class="po_re clearfix">
                                                    <ul>
                                                        <li class="w4 t_l">
                                                            <a href="index.php?do=task&task_id=<?php echo $v['task_id'];?>" title="<?php echo $v['task_title'];?>" class="font14b"><?php echo $v['task_title'];?></a>
                                                            <span class="block">[#<?php echo $v['task_id'];?>]</span>
<?php $time = time(); ?>
                                                            <?php if($v['top_time']>$time&&$item_config['2']['small_pic']) { ?> <img src="<?php echo $_K['siteurl'];?>/<?php echo $item_config['2']['small_pic'];?>" alt="<?php echo $_lang['top'];?>" title="<?php echo $_lang['top'];?>"><?php } ?>  
                                                           <?php if($v['urgent_time']>$time&&$item_config['3']['small_pic']) { ?><img src="<?php echo $_K['siteurl'];?>/<?php echo $item_config['3']['small_pic'];?>" alt="<?php echo $_lang['hurry_up'];?>" title="<?php echo $_lang['hurry_up'];?>"><?php } ?>
                                                     	   <?php if(stristr($v['pay_item'],'4')&&$item_config['4']['small_pic']) { ?><img src="<?php echo $_K['siteurl'];?>/<?php echo $item_config['4']['small_pic'];?>" alt="<?php echo $_lang['map'];?>" title="<?php echo $_lang['map'];?>"><?php } ?>
                                                       
    </li>
                                                        <li>
                                                            <a href="index.php?do=space&member_id=<?php echo $v['uid']?>"><?php echo $v['username']?></a>
                                                            <span class="block"><?php echo date("Y-m-d",$v['start_time']); ?></span>
                                                        </li>
                                                        <li class="w2 cc00">
                                                         <?php if($v['task_cash_coverage']) { ?> <?php echo $cash_cove_arr[$v['task_cash_coverage']]['cove_desc'];?> <?php } else { ?><?php echo $_lang['currency'];?> <?php echo $v['task_cash'];?> <?php echo $_lang['yuan'];?><?php } ?>
                                                        </li>
                                                        <li> 
                                                            <span class="block"><?php if(isset($where_arr)) { ?><?php echo $where_arr['B'][$v['model_id']]['model_name'];?><?php } ?><br/><?php echo get_wb_platform($v['task_id']) ?></span>
                                                        </li>
                                                        <li class="c999">
                                                            <?php echo $v['view_num']?><?php echo $_lang['view'];?><span class="block"><?php echo $v['work_num']?><?php echo $_lang['work_hand'];?></span>
                                                        </li>
                                                        <li class="c999">
                                                        <?php $b = $v['task_status']; $end_time = $end_time_arr[$b]['time']; ?>
<?php if(isset($end_time)){
															echo keke_search_class::task_time_desc($v['task_status'],$v[$end_time]);
														} ?>
</span>
                                                    </li>
                                                    </ul>
                                                    <div class="clear">
                                                    </div>
                                                    <div class="operate">
                                                  
<a href="index.php?do=release&t_id=<?php echo $v['task_id'];?>&pub_mode=onekey&model_id=<?php echo $v['model_id'];?>" title="<?php echo $_lang['onkey_release'];?>"><div class="icon16 hand-2"><?php echo $_lang['onkey_release'];?></div></a>
                                                    <a href="javascript:favor('task_id','task','<?php echo $model_list[$v['model_id']]['model_code'];?>','<?php echo $v['uid'];?>','<?php echo $v['task_id'];?>','<?php echo $v['task_title'];?>','<?php echo $v['task_id'];?>')" title="<?php echo $_lang['favorit'];?>"><div class="icon16 star-fav-empty"><?php echo $_lang['favorit'];?></div></a>
                                                    <a href="index.php?do=task&task_id=<?php echo $v['task_id']?>" target="_blank" title="<?php echo $_lang['new_window_open'];?>"><div class="icon16 expand"><?php echo $_lang['new_window_open'];?></div></a>
                                                    <a class="" href="index.php?do=ajax&view=share&oid=<?php echo $k?>&title=<?php echo $v['task_title'];?>" id="share<?php echo $k?>" onclick="return false;" onmouseover="share(this);return false;" title="<?php echo $_lang['share'];?>"><div class="icon16 share"><?php echo $_lang['share'];?></div></a>
                                                
                                                </div>
                                            </dd>
                                            <?php } } ?> 
                                            </dl>
                                        </div>
                                        <!--end 列表主内容--><!--右下角的返回顶部-->
                                        <div class="operate mt_10 fl_r">
                                            <a href="index.php" class="" title="<?php echo $_lang['return_home'];?>"><div class="icon16 home"><?php echo $_lang['return_home'];?></div></a>
                                            <a href="#pageTop" class="" title="<?php echo $_lang['return_top'];?>"><div class="icon16 arrow-top"><?php echo $_lang['return_top'];?></div></a>
                                        </div>
                                        <!--end右下角的返回顶部-->
                                    </div>
                                    <!--page 翻页 start-->
                                    <div class="page">
                                        <p class="clearfix">
                                            <span class="stats"><?php echo $_lang['count'];?> <?php echo $count?> <?php echo $_lang['tiao'];?> </span>
                                            <?php echo $pages['page']?>
                                        </p>
                                    </div>
                                    <!--page 翻页 end-->
                                    <div class="clear">
                                    </div>
                                </div>
                                <!--end 左边部分--><!--右边部分-->
                                <div class="grid_4">
                                    <div class="box normal mb_10">
                                    	<div class="inner">
                                        <!--搜索历史-->
                                        <div class="history border_b_c">
                                            <h3 class="title pl_10"><?php echo $_lang['search_history'];?></h3>
                                            <div class=" pl_10">
                                                <p>
                                                    <?php echo $_lang['no_your_history'];?>
                                                </p>
                                                <ul id="history_collect">
                                                    <?php if(is_array($cookie_arr)) { foreach($cookie_arr as $k => $v) { ?>
                                                    <li class="mt_5 mb_5 border_b_c">
                                                        <a href="<?php echo $v['url']?>" title="<?php echo $v['name']?>" ><?php echo $v['name']?></a>
                                                    </li>
                                                    <?php } } ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <!--end搜索历史-->
                                        <div class="operate fl_r">
                                            <a href="javascript:clear_cookie()" title="<?php echo $_lang['empty'];?>"><div class="icon16 trash"><?php echo $_lang['empty'];?></div></a>
                                        
</div>
                                        <div class="clear"></div>
</div>
                                    </div>

                                    <div class="box normal ws_break">
                                        <!--搜索历史-->
                                        <div class="inner">
                                            <h3 class="title pl_10"><?php echo $_lang['task_feed'];?></h3>
                                            <div class=" pl_10 pr_10 pb_10">
                                                <ul id="history_collect">
                                                    <?php if(is_array($dynamic_arr)) { foreach($dynamic_arr as $k => $v) { ?>
                                                    <li class="border_b_c">
                                                        <p><a href="<?php echo $v['feed_username']['url']?>"><?php echo $v['feed_username']['content']?></a> <?php echo $v['action']['content']?></p>
<p><a href="<?php echo $v['event']['url']?>"><?php echo $v['event']['content']?></a></p>
                                                        <p><?php echo kekezu::feed_time ($v['feed_time'] ); ?></p>
                                                    </li>
                                                    <?php } } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--end搜索历史-->
                                    </div>
                                    
                                    <!--大厅列表_右侧上下广告 start-->
<?php keke_loaddata_class::ad_show('LIST_SIDE_RIGHT','task_list','') ?>
<!--大厅列表_右侧上下广告 end-->

                                    
                                </div>
                                <!--end 右边部分-->
                            </div>
                        </div>
                    </section>

<div class="clear"></div>
  <!--大厅列表_底部通栏广告 start-->
 		 <?php keke_loaddata_class::ad_show('LIST_BOTTOM_BANNER','task_list','') ?>
  <!--大厅列表_底部通栏广告 end-->
<div class="clear"></div>
                </div>
                </section>

                <!--end 主内容-->


</div>
                <script type="text/javascript">
                    /** 检查用户是否登陆 */
                    var uid = parseInt('<?php echo $uid;?>') + 0;
                       var is_rewrite = '<?php echo $_K['is_rewrite'];?>';
                    function check_user_login(){
                        if (isNaN(uid) || uid == 0) { 
                            showDialog("<?php echo $_lang['if_now_login'];?>", 'confirm', "<?php echo $_lang['login_notice'];?>", 'user_login()', 0);
                            return false;
                        }
                        else {
                            return true;
                        }
                    }
                    
                    
                    /** 用户登陆 */
                    
                    function user_login(){
                        showWindow('user_login', 'index.php?do=login', 'get');
                        return false;
                    }
                    
                    //页面加载，判断搜索条件是现实还是隐藏
                    $(function(){
                        var show_cookie = getcookie('show_cookie');
                        
                        if (show_cookie == 1) {
                            $("#condition_list").show();
                            $("#tool_hide").show();
                            $("#tool_show").hide();
                        }
                    }); 
                    //搜索条件现实 /隐藏
                    function show_hide(){
                        $("#condition_list").toggle(0, function(){
                            if ($("#tool_show").is(":hidden")) {
                                setcookie('show_cookie', '');
                                $("#tool_show").show();
                                $("#tool_hide").hide();
                            }
                            else {
                                setcookie('show_cookie', 1,3600);
                                $("#tool_hide").show();
                                $("#tool_show").hide();
                            }
                        });
                    }
                    
                    
                    //多选模式切换
                    function much_choice(){
                        $("#single_choice_span").hide();
                        $("#much_choice_span").show();
                        $("#show_much_choice").hide();
                        $("#much_choice_sreach").show();
                    }
                    
                    //重置
                    function model_reset(){
var model_ids = '<?php echo $model_ids;?>';
                        $("#much_choice_span").hide();
                        $("#single_choice_span").show();
                        $("#much_choice_sreach").hide();
                        $("#show_much_choice").show();
                        var url = window.location.href;
                        
                          if(is_rewrite>0){
 var new_url = url.replace('-model_ids-'+model_ids, '');

}else{

   var new_url = url.replace('&model_ids='+model_ids, '');
}
         
                        location.href = new_url;
                        
                    }
                    
          

                    //分享
                    var share = function(obj, title){
var id = obj.id;
CHARSET.toLowerCase()=='utf-8'?obj.href = encodeURI(obj.href):'';
if(id&&obj.tagName=='A'){
if($(obj).find('div').length){
var div = $(obj).find("div:first");
div.attr("href",obj.href);
div.attr("id","div_"+id);
}else{
var div = $("<div id='div_"+id+"' href='"+obj.href+"'></div>");
div.prependTo($(obj));
}
}
obj = $(obj).find("div:first").get(0);
                        ajaxmenu(obj, 250, '1', '2', '43');
                        return false;
                    }
                    //进度条
                    function task_bar(){
                        var min = Number(<?php echo $min?>);
                        var max = Number(<?php echo $max?>);
                        
                        $("#slider-range").slider({
                            range: true,
                            min: 0,
                            max: 5000,
                            values: [min, max],
                            slide: function(event, ui){
                                $("#amount1").val(ui.values['0']);
$("#amount2").val(ui.values['1']);
                            }
                        });
                    
$("#amount1").val($("#slider-range").slider("values", 0));
$("#amount2").val($("#slider-range").slider("values", 1));
                   }
                    
                    
                    //赏金搜索 
                    function search_task_cash(){
                        var url = window.location.href;
                        var min = $("#amount1").val();
                        var max =  $("#amount2").val();
               			var model_ids =  "<?php echo $model_ids;?>"; 
var path="<?php echo $path;?>";
 		path = path.replace(/C\d{0,3}/,""); 
$("#cash_frm_path").val(path);
            $("#min").val(min);
                        $("#max").val(max);
$("#task_model_ids").val(model_ids);
                        $("#cash_frm").submit();
                    }
                    
                
                    
          
                    
                    //多任务模型搜索
                    function model_search(){ 
var model_ids_val = '<?php echo $model_ids;?>';
                        var url = window.location.href;//获取本页面的url连接
                        var model_ids = '';
var new_url = '';
var is_rewrite = '<?php echo $_K['is_rewrite'];?>';
 $(".model_class").each(function(){//生成model_ids数据 
                            if ($(this).is(":checked")) { 
                              model_ids  += 'M'+$(this).attr("ext");
                            }
                        });


if(is_rewrite>0){
//判断是否存在model_ids  
if(url.indexOf('model_ids') ==-1){//不存在拼接
new_url = url; 
}else{//替换 
 new_url = url.replace("-model_ids-"+model_ids_val,"");     
}  

 new_url = new_url.replace(".html","-model_ids-"+model_ids+".html");

}else{
//判断是否存在model_ids  
if(url.indexOf('model_ids') ==-1){//不存在拼接
new_url = url; 
}else{//替换 
 new_url = url.replace("&model_ids="+model_ids_val,"");     
} 
 new_url = new_url+'&model_ids='+model_ids; //新地址

}

location.href=new_url;//跳转 
                    }
                    


                    //任务模型多选						
                    function model_all(){
                    
                        $(".model_class").each(function(){
                            $(this).attr("checked", "checked");
                            $(this).parent().attr("class", "selected");
                        });
                    } 


                    function select_model_a(model_id){
  			var  model_ids = $("#task_model_ids").val(); 
                        var model_id = model_id;
                        var classes = $("#model_a_" + model_id).attr("class"); 
                        if (classes == 'selected') {
                            $("#model_a_" + model_id).attr("class", " ");
                            $("#model_a_" + model_id + " input").attr("checked", ""); 
                        }
                        else {
                            $("#model_a_" + model_id + " input").attr("checked", "checked");
                            $("#model_a_" + model_id).attr("class", "selected");
 
                        } 
                    } 
                </script>

<script type="text/javascript"> 
    In.config('serial',true);
In.add('ui_core',{path:"resource/js/others/ui.core.js",type:'js'});
In.add('ui_slider',{path:"resource/js/others/ui.slider.js",type:'js',rely:['ui_core']});
In.add('search',{path:"<?php echo $style_path;?>/js/search.js",type:'js'});
In.add('css_task',{path:"<?php echo SKIN_PATH;?>/css/task.css",type:'css'});  
 	In.add('css_theme_task',{path:"<?php echo SKIN_PATH;?>/theme/<?php echo $_K['theme'];?>/css/task.css",type:'css'}); 
In('css_task','css_theme_task','search','ui_slider',function(){task_bar()});

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