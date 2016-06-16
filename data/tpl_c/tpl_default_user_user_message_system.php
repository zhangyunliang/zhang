<?php keke_tpl_class::checkrefresh('tpl/default/user/user_message_system', '1465984394' );?><?php if($_K['inajax']) { ?>
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
 <?php keke_loaddata_class::ad_show('GLOBAL_TOP_BANNER','user','') ?>
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
<!--contain start-->
<div class="wrapper">
    <div class="container_24">
        <header class="page_title clearfix  Anchor">
    <div class="grid_17">
        <h2 class="title"><?php echo $_lang['user_center'];?></h2>
    </div>
    <div class="grid_7 hidden">
        <div class="user_info">
            <div class="fl_l mr_10">
                <p>
                    <?php echo  keke_user_class::get_user_pic($uid,small) ?>
                </p>
            </div>
            <ul class="intor">
                <li>
                    <?php echo $_lang['welcome'];?><?php echo $username;?>
                </li>
                <li>
                    <strong class="cf60"><?php echo $_lang['currency'];?><?php echo $user_info['balance'];?></strong>
                  <?php echo $_lang['cash'];?> | <strong><a href="index.php?do=user&view=message"><?php echo $messagecount;?> <?php echo $_lang['tiao_news'];?></a></strong>
                </li>
            </ul>
        </div>
    </div>
</header>
<div class="grid_24">
<nav class="primary_nav box clearfix">

    <a name="userCenter"></a>
    <ul>
        <?php if(is_array($nav)) { foreach($nav as $k => $v) { ?>
        <li>
            <a href="index.php?do=user&view=<?php echo $k;?>" <?php if($view==$k) { ?>class="selected"<?php } ?>><span class="icon32 <?php echo $v['1'];?>"><?php echo $v['0'];?></span><em><?php echo $v['0'];?></em><?php if($k=='message' && $messagecount) { ?><strong class="badge"><?php echo $messagecount;?></strong><?php } ?></a>
        </li>
        <?php } } ?>
    </ul>
    
    
</nav>

</div>
<div class="clear"></div>
<!--main start-->
        <section class="clearfix section">
            <!--用户中心样式-->
<div class="second_menu container_24 po_ab clearfix">
    <div class="suffix_21">
        <nav class="minor_nav box clearfix">
           <!--子导航开始-->
<?php if(is_array($sub_nav)) { foreach($sub_nav as $val) { ?>
       <ul class="nav_group clearfix">
<?php if(is_array($val)) { foreach($val as $k => $v) { ?>
<?php if($k!='auth'||($k=='auth'&&$auth_item_list)) { ?>
             <li>
                 <a href="index.php?do=user&view=<?php echo $view;?>&op=<?php echo $k;?>" title="<?php echo $_lang['enter'];?><?php echo $v['0'];?>" <?php if($k==$op) { ?>class="selected"<?php } ?>>
                   <div class="icon16 <?php echo $v['1'];?>">icon</div><strong><?php echo $v['0'];?></strong>
     </a>
             </li>
 <?php } ?>
<?php } } ?>
       </ul>
<?php } } ?>
<!--子导航结束-->
        </nav>
    </div>
</div>
            <div class="show_panel container_24 po_re">
                <div class="prefix_3">
                    <div class="panel clearfix box">
                        <!--main content-->
                        <div class="grid_21">
                            <!--header内容头部 start-->
                            <header class="clearfix box_header">
                                <h2 class="grid_4 alpha box_title t_c"><?php if($op=='inbox') { ?><?php echo $_lang['inbox'];?><?php } else { ?><?php echo $_lang['outbox'];?><?php } ?></h2>
                                <div class="grid_17 omega">
                                    <nav class="box_nav">
                                        <ul>
                                            <li <?php if($msg_type =='system') { ?>  class="selectedLava" <?php } ?>>
                                                <a href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&msg_type=system" original-title="<?php echo $_lang['system_msg'];?>"><?php echo $_lang['system_msg'];?></a>
                                            </li>
                                            <li <?php if($msg_type=='accept') { ?>  class="selectedLava" <?php } ?>>
                                                <a href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&msg_type=accept" original-title="<?php echo $_lang['private_message'];?>"><?php echo $_lang['private_message'];?></a>
                                            </li>
                                            <li <?php if($msg_type=='output') { ?>  class="selectedLava" <?php } ?>>
                                                <a href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&msg_type=output" original-title="<?php echo $_lang['private_message'];?>"><?php echo $_lang['sms_has_been_sent'];?></a>
                                            </li>
                                            <li <?php if($msg_type=='write') { ?>  class="selectedLava" <?php } ?>>
                                                <a href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&msg_type=write" original-title="<?php echo $_lang['private_message'];?>"><?php echo $_lang['write_message'];?></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="clear">
                                </div>
                            </header>
                            <!--header内容头部 end-->
                            <div class="data_list">
                                <form method="post" id="frm_msg" action="#">
                                	<input type="hidden" name="pl_del" value="pl_del">
<input type="hidden" name="op" value="del">
                                    <table class="data_table">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                  <?php echo $_lang['status'];?>
                                                </th>
                                                <th scope="col" colspan="3" width="250">
                                                    <?php echo $_lang['title'];?>
                                                </th>
                                                <th scope="col">
                                                    <?php if($op=='outbox') { ?><?php echo $_lang['send'];?><?php } else { ?><?php echo $_lang['from'];?><?php } ?>
                                                </th>
                                                <th scope="col">
                                                    <?php echo $_lang['time'];?>
                                                </th>
                                                <th scope="col" colspan="1" width="120">
                                                    <?php echo $_lang['operate'];?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php if($data) { ?>
                                            <?php if(is_array($data)) { foreach($data as $k => $v) { ?>

                                            <tr class="odd">
                                                <td>
                                                    <input type="checkbox" value="<?php echo $v['msg_id']?>" id="cbk_selected" name="ckb[]"><?php if($op!='outbox') { ?>
                                                    <?php if($uid==$v['to_uid']&&!$v['view_status']) { ?><?php echo $_lang['unread'];?><?php } else { ?><?php echo $_lang['already_read'];?><?php } ?>
                                                    <?php } ?>
                                                </td>
                                                <td colspan="3">
                                                	<?php if($v['uid']){$type='inbox';}else{$type="system";} ?>
                                                    <a <?php if(!$v['view_status']) { ?>style="font-weight: bold"<?php } ?> title="<?php echo $v['title']?>"
 href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&op=views&ac=view&msg_id=<?php echo $v['msg_id']?>&msg_type=<?php echo $msg_type?>">
<?php echo $v['title']?> </a>
                                                </td>
                                                <td>
                                                	<?php if(!$v['username']) { ?><?php echo $_lang['system_msg'];?><?php } else { ?><?php echo $v['username'];?><?php } ?>
                                                </td>
                                                <td>
                                                    <?php if($v['on_time']){echo date('Y-m-d',$v['on_time']); } ?>
                                                </td>
                                                <td colspan="1">
                                                    <a class="button" href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&op=views&ac=view&msg_id=<?php echo $v['msg_id']?>&msg_type=<?php echo $msg_type?>"><span class="book icon"></span><?php echo $_lang['view'];?></a>
<a class="button" href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&op=del&msg_id=<?php echo $v['msg_id']?>&page=<?php echo $page?>&msg_type=<?php echo $msg_type?>"
 onclick="return del(this);"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
                                                </td>
                                            </tr>
                                            <?php } } ?>

                                        </tbody>
                                    <tfoot>
                                      <tr>
                                         <td colspan="7">
                                       	<div class="clearfix pad10">   
    <!--<input type="checkbox" id="checkbox" onclick="checkall()" style="display:none;cursor:pointer;">-->
<a href="javascript:;" value="0" id="checkbox" onclick="checkall(this.id)"><?php echo $_lang['select_all'];?></a>
                                      	 	<button class="pill negative" onclick="return mulit_del();" value="<?php echo $_lang['delete_selected'];?>" type="button">
<span class="icon trash"></span><?php echo $_lang['delete_selected'];?></button>
</div>
                                        </td>
                                  </tr> 
                               </tfoot>
   	<?php } else { ?>
<tr>	
<td colspan="8" class="t_c">
<?php echo $_lang['norecord'];?>
</td> 
</tr>
<?php } ?>
                           </table>
                         </form>
                       </div>
                     <div class="page"><?php echo $pages['page'];?><div class="clear"></div></div>
                   </div>
                 <!--main content end -->
              <div class="clear"></div>
           </div>
         </div>
       </section>
      <!--main end-->
    </div>
  </div>
  <!--contain end-->
  <script type="text/javascript">
function del(obj){
var url = obj.href;
 
showDialog("<?php echo $_lang['confirm_delete'];?>",'confirm',"<?php echo $_lang['operate_notice'];?>",function(){location.href=url;});return false;
}
function mulit_del(){
showDialog("<?php echo $_lang['confirm_delete'];?>",'confirm',"<?php echo $_lang['operate_notice'];?>",function(){$("#frm_msg").submit();});return false;
}
   </script>
   <!--jQuery调用--> 
<script type="text/javascript">
$(function(){
var Is = location.href.search('&op=');
if(Is>-1){
$("html,body").animate({scrollTop:$(".Anchor").offset().top});
}
})
function check(obj){
return checkForm(document.getElementById(obj));
}
In.add('jscolor',{path:"resource/js/others/jscolor.js",type:'js'});
//In.add('user_center',{path:"<?php echo SKIN_PATH;?>/theme/<?php echo $_K['theme'];?>/css/user_center.css",type:'css'}); 
In.add('css_user_center',{path:"<?php echo SKIN_PATH;?>/css/user_center.css",type:'css'}); 
In('calendar','css_user_center'); 

$(function(){
$(".togg_u").focus(function(){
        	 this.value = '';
        }).blur(function(){
                this.value == '' ? this.value = $(this).attr(this.title ? 'title' : 'original-title') : '';
        })
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
<?php } ?><?php keke_tpl_class::ob_out();?>