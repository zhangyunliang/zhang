<?php keke_tpl_class::checkrefresh('tpl/default/index', '1465984319' );?><?php if($_K['inajax']) { ?>
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
 <?php keke_loaddata_class::ad_show('GLOBAL_TOP_BANNER','index','') ?>
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
<!--首页样式--> 
<link href="<?php echo SKIN_PATH;?>/css/index.css" rel="stylesheet"/>
<link href="<?php echo SKIN_PATH;?>/theme/<?php echo $_K['theme'];?>/css/index.css" rel="stylesheet"/> 
 <!--内容区 satrt-->
  <div class="wrapper clearfix">
    <div class="container_24 clearfix"> 
     <div class="pb_10"></div>
       <div class="grid_5 mb_10">
       	<div class="orange_box">
       	<div class="box default  m_h">
       		<div class="inner">
       		<div class="category">
       				
<!--分类 start-->
            <div id="category_box" class="category po_re">
              <!--分类切换 start-->
               <ul class="tab block" id="indus">
                  <li><a href="javascript:indusLinkInit('task_list');" class="selected" rel="task_list"><span><?php echo $_lang['task_classify'];?></span></a></li>
                  <li><a href="javascript:indusLinkInit('shop_list');" class="purple" rel="shop_list"><span><?php echo $_lang['shop_classify'];?></span></a></li>
               </ul>
             <!--分类切换 end-->
 
                   <ul class="indus_list">
                 	<?php $is=0;$s=sizeof($indus_list);$load=array(); ?>
                 <?php if(is_array($indus_list)) { foreach($indus_list as $k => $v) { ?>
                    	<?php if($is<17||($is==17&&$s==18)) { ?>
                       <li>
                         <a href="index.php?do=task_list&path=A<?php echo $v['indus_id']?>" target="_blank" ><?php echo $v['indus_name']?></a>
 							   <ul class="s_nav hidden">  
 								 <?php if(is_array($indus_c_arr)) { foreach($indus_c_arr as $k1 => $v1) { ?>
<?php if($v['indus_id']==$v1['indus_pid']) { ?>
<li>
<a href="index.php?do=task_list&path=A<?php echo $v['indus_id']?>&indus_id=<?php echo $v1['indus_id']?>i"><?php echo $v1['indus_name']?></a>
</li> 
 <?php } ?>
 <?php } } ?> 
   </ul> 
                      </li>
<?php $is++;$load[$v['indus_id']]=1; ?>
<?php } else { ?>
                       <li id="s_all_li">
                          <a href="javascript:void(0);">全部行业&gt;&gt;</a>
  <ul class="s_all hidden">  
 								<?php if(is_array($indus_c_arr)) { foreach($indus_c_arr as $k1 => $v1) { ?>
  <?php if($load[$v1['indus_pid']]!=1) { ?>
<li class="s_all_li">
<a href="index.php?do=task_list&path=A<?php echo $v1['indus_pid']?>&indus_id=<?php echo $v1['indus_id']?>i"><?php echo $v1['indus_name']?></a>
</li>
  <?php } ?>
<?php } } ?> 
  </ul>
                       </li>
   <?php break; ?>
   <?php } ?> 
<?php } } ?> 
                   </ul>
 
   <script type="text/javascript">
   	$(function(){
$(".indus_list>li").each(function(){
$(this).hover(function(){
$(this).css("z-index",2);
$(this).children().eq(0).addClass('selected');
$(this).find('ul').removeClass('hidden');
},function(){
$(this).css("z-index",1);
$(this).children().eq(0).removeClass('selected');
$(this).find('ul').addClass('hidden');
})
})
})

   </script> 
       			</div>


       		</div>
       	</div>
</div>
</div>
        <div class="box default m_h hidden">
         <div class="inner">
           <!--分类 start-->
            <div id="category_box" class="category po_re">
              <!--分类切换 start-->
               <ul class="tab block" id="indus">
                  <li><a href="javascript:void(0);" class="selected" rel="task_list"><?php echo $_lang['task_classify'];?></a></li>
                  <li><a href="javascript:void(0);" class="purple" rel="shop_list"><?php echo $_lang['shop_classify'];?></a></li>
               </ul>
             <!--分类切换 end-->
                            
            <!--分类内容 start-->
            <ul id="indus_list">
            <?php $i=0; ?>
            <?php if(is_array($indus_list)) { foreach($indus_list as $k => $v) { ?>
<?php $i++; ?>
<?php if($i<17) { ?>
               		<li><a href="#" rel="path=A<?php echo $k;?>" target="_blank"><?php echo $v['indus_name'];?></a></li>
<?php if($i>0&&$i%2==0) { ?>
              	<li class="line"></li>
    <?php } ?>
<?php } ?>
<?php } } ?>
  
           </ul>
           <!--分类内容 end-->
          <div class="clear"></div>
        </div>
      <!--分类 end-->
     </div>
    </div>
  </div>      
<div class="grid_14 mb_10">
   <div class="box default">
     <div class="inner">
      <!--切换广告 start-->
       <div class="banner po_re">
         <div id="slides">
          <!--图片内容区域 start-->
              <div class="slides_container">
                   <?php keke_loaddata_class::ad_show('HOME_TOP_SLIDE','index','首页_顶部幻灯片') ?>
              </div>
          <!--图片内容区域 end-->
          <!--左右翻页箭头 start-->
             <a href="#" class="prev cfff po_ab t_c block"><span class="icon16 br-prev">&lt;</span></a>
             <a href="#" class="next cfff po_ab t_c block"><span class="icon16 br-next">&gt;</span></a>
           <!--左右翻页箭头 end-->
         </div>
       </div>
      <!--切换广告 end-->
     </div>
    </div>
   <div class="clear"></div>
</div>
  <div class="grid_5 mb_10 m_h">
   <div class="box default mb_10">
    <div class="inner">
      <!--公告 start-->
        <div class="notice">
         <!--公告头部 start-->
         <header class="box_header clearfix">
          	<nav class="box_nav">
               <ul class="ov_hide block clearfix">
                  <li id="ul_plac_1" onclick="swaptab('plac','backLava','',4,1)"><a href="javascript:void(0);" title="<?php echo $_lang['announcement'];?>"><?php echo $_lang['announcement'];?></a></li>
                  <li id="ul_plac_2" onclick="swaptab('plac','backLava','',4,2,{ajax:1,url:'index.php?ajax=rules'})"><a href="javascript:void(0);" title="<?php echo $_lang['rules'];?>"><?php echo $_lang['rules'];?></a></li>
                  <li id="ul_plac_3" onclick="swaptab('plac','backLava','',4,3,{ajax:1,url:'index.php?ajax=withdraw'})"><a href="javascript:void(0);" title="<?php echo $_lang['withdraw'];?>"><?php echo $_lang['withdraw'];?></a></li>
                  <li id="ul_plac_4" onclick="swaptab('plac','backLava','',4,4,{ajax:1,url:'index.php?ajax=safe'})"><a href="javascript:void(0);" title="<?php echo $_lang['safe'];?>"><?php echo $_lang['safe'];?></a></li>
               </ul>
            </nav>
            <div class="clear"></div>
         </header>
        <!--公告头部 end-->
        <!--公告detail内容 start-->
         <article class="box_detail" id="div_plac_1">
           <ul>
              <?php if(is_array($art_notice_arr)) { foreach($art_notice_arr as $v) { ?>
<li><a href="index.php?do=article&view=article_info&art_id=<?php echo $v['art_id'];?>"><?php echo $v['art_title'];?></a></li>
 <?php } } ?>
           </ul>
         </article>
        <article class="box_detail hidden" id="div_plac_2">
          
        </article>
        <article class="box_detail hidden" id="div_plac_3">
          
        </article>
       <article class="box_detail hidden" id="div_plac_4">
          
       </article>
       <!--公告detail内容 end-->                    
        
      </div>
    </div>
  </div>
                
  <div class="clear"></div>
                
  <div class="box default m_h">
    <div class="inner">
     <!--网站统计 start-->
      <div class="site_stats po_re">
      	<header class="box_header clearfix">
                      <h2 class="title fl_l"><?php echo $_lang['website_statistics'];?></h2>

                       <div class="clear"></div>
       </header>
   <div id="slider" class="box_detail">
        <!--注册用户 start-->
         <ul>
            <li><p><?php echo $_lang['register_user_number'];?></p><p><strong class="num goup" ><?php echo $register;?></strong></p></li>
 
        <!--任务统计 end-->
       <!--认证统计 start-->

             <li><p><?php echo $_lang['auth_statistics_number'];?></p><p><strong class="num goup" ><?php echo $all_auth;?></strong></p></li>

        <!--认证统计 end-->
        <!--任务统计 start-->

            <li><p><?php echo $_lang['task_order_money'];?></p><p><strong class="num godown" ><?php echo $task_in;?></strong></p></li>
            <li><p><?php echo $_lang['task_number'];?></p><p><strong class="num goup" ><?php echo $task_count;?></strong></p></li>

        <!--任务统计 end-->
       <!--商城统计 start-->
  
             <li><p><?php echo $_lang['shop_order_money'];?> </p><p><strong class="num  godown " ><?php echo $service_in;?></strong></p></li>
             <li><p><?php echo $_lang['goods_number'];?> </p><p><strong class="num godown " ><?php echo $service_count;?></strong></p></li>
          </ul>
        <!--商城统计 end-->
      </div>
      <!--网站统计 end-->
  </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
            
  <div class="clear"></div>
            
   <div class="grid_5 mb_10">
    <div class="box default">
      <div class="inner">
         <!--网站向导连接 start-->
          <div class="guide">
            <ul>
               <li class="guide_earn border_b_c ov_hide">
                 <a href="index.php?do=task_list"><p class="title"><?php echo $_lang['i_want_to_make_money'];?></p><p><?php echo $_lang['join_task_now_make_money'];?></p></a>
   </li>
   <li class="guide_file border_b_c ov_hide">
                  <a href="index.php?do=shop_release&model_id=6"><p class="title"><?php echo $_lang['i_have_file_to_sell'];?></p><p><?php echo $_lang['files_more_here_sell'];?></p></a>
   </li>
   <li class="guide_share border_b_c ov_hide">
                  <a href="index.php?do=user&view=payitem&op=promotion"><p class="title"><?php echo $_lang['i_want_prom_make_money'];?></p><p><?php echo $_lang['no_skill_can_make_money'];?></p></a>
   </li>
               <li class="guide_tool  ov_hide ">
                  <a href="index.php?do=user&view=payitem&op=toolbox"><p class="title"><?php echo $_lang['i_want_more_tool'];?></p><p><?php echo $_lang['more_tool_help_you_success'];?></p></a>
   </li>
               <li class="guide_find hidden border_b_c ov_hide" style="display:none;">
                  <a href="index.php?do=talent"><p class="title"><?php echo $_lang['i_need_some_talents'];?></p><p><?php echo $_lang['many_talents_here'];?></p></a>
   </li>
               <li class="guide_part hidden ov_hide">
                  <a href="index.php?do=shop_release&model_id=7"><p class="title"><?php echo $_lang['i_have_time_work'];?></p><p><?php echo $_lang['find_some_easy_work'];?></p></a>
   </li>
            </ul>
          </div>
          <!--网站向导连接 end-->
        </div>
       </div>
     </div>
     <div class="grid_14 mb_10 m_h">
        <div class="box default">
           <div class="inner">
              <!--网站动态 start-->
                <div class="moving">
                   <!--网站动态头部 start-->
                     <header class="box_header clearfix">
                      <h2 class="title grid_4 alpha"><?php echo $_lang['look_you_doing'];?></h2>
                         <nav class="box_nav grid_9 omega">
                            <ul>
                               <li><a href="javascript:void(0);" id="li_map_1" title="<?php echo $_lang['feed'];?>" onclick="swaptab('map','','',2,1);"><?php echo $_lang['feed'];?></a></li>
                               <li><a href="javascript:void(0);" id="li_map_2" title="<?php echo $_lang['map_feed'];?>" onclick="swaptab('map','','',2,2);load_map();"><?php echo $_lang['map_feed'];?></a></li>
<script type="text/javascript">
function load_map(){
if(!document.getElementById('map_iframe')){
$("#div_map_2")['0'].innerHTML ='<iframe class="show_area" width="516" name="map_iframe" id="map_iframe" src="index.php?do=index_map"></iframe>';	
if(BROWSER.ie=='6.0'){ 
document.getElementById("map_iframe").src='index.php?do=index_map';
}
}
}
</script>
                            </ul>
                         </nav>
                       <div class="clear"></div>
                      </header>
                      <!--网站动态头部 end-->
  
                       <!--detail内容 start-->
                       <article class="box_detail">
                         <div class="show_area clearfix ov_hide" >
                          <!--文字链接动态 start-->
                            <div class="txt_list clearfix" id="div_map_1">
                             <ul>
                                <?php if(is_array($feed_list)) { foreach($feed_list as $v) { ?>
<?php $info = unserialize($v['title']); ?>
                                    <li class="item clearfix">
                                      <div class="avatar fl_l">
                                         <a href="<?php echo $info['feed_username']['url'];?>" ><?php echo  keke_user_class::get_user_pic($v['uid'],'small') ?></a>
  </div>
                                      <div class="item_info">
                                         <p><a href="<?php echo $info['feed_username']['url'];?>"><strong><?php echo $v['username'];?></strong></a>
<?php echo $info['action']['content'];?>
 <a href="<?php echo $info['event']['url'];?>"><?php echo $info['event']['content'];?></a>
<?php if($info['event']['cash']) { ?>
<?php echo $_lang['get_task_reward'];?><font color="red"><?php echo $info['event']['cash'];?></font><?php echo $_lang['yuan'];?>
<?php } ?>
</p>
                                         <p><?php echo kekezu::feed_time ($v['feed_time']); ?> </p>
                                       </div>
                                     </li>
<?php } } ?>
                              </ul>
                             </div>
                            <!--文字链接动态 end-->
                                    
                            <!--地图动态 start-->
                              <div class="map_list"  id="div_map_2" style="display:none;"></div>
                             <!--地图动态 end-->
                          </div>
                    </article>
               <!--detail内容 end-->
              </div>
            <!--网站动态 end-->
          </div>
        </div>
       <div class="clear"></div>
     </div>
            
     <div class="grid_5 mb_10">
  <!--首页_动态右侧广告 start-->
 		 
  <!--首页_动态右侧广告 end-->
  
  	<div class="box default m_h">
  		<div class="inner">
  			<div class="activity">
  			<header class="box_header clearfix">
  				<h2 class="title"><?php echo $_lang['hot_activity'];?></h2>
  			</header>
  			<article class="box_detail clearfix">
  				 <?php keke_loaddata_class::readtag('热门活动') ?>
</article>
</div>
  		</div>
  	</div>

        
     </div>
     
     <div class="clear"></div>

  <!--首页_中上部通栏广告 start-->
 		 <?php keke_loaddata_class::ad_show('HOME_UPPER_BANNER','index','') ?>
  <!--首页_中上部通栏广告 end-->

      <div class="grid_24 mb_10">
        <div class="box model blue">
          <!--任务列表 start-->
           <div class="task">
            <!--头部 start-->
             <header class="box_header clearfix">
               <div class="grid_4 alpha">
                 <!--标题 start-->
                  <h1 class="box_title"><span><?php echo $_lang['task'];?></span>Task</h1>
                 <!--标题 end-->
               </div>
               <div class="grid_13 omega">
               <!--导航区域 start-->
                 <nav class="box_nav clearfix">
                   <ul class="clearfix">
                      <li id="ul_task_1" onclick="swaptab('task','selectedLava','',2,1);"><a href="javascript:void(0);" title="<?php echo $_lang['recommend_task'];?>"><?php echo $_lang['recommend'];?></a></li>
                      <li id="ul_task_2" onclick="swaptab('task','selectedLava','',2,2,{ajax:1,url:'index.php?ajax=task'});"><a href="javascript:void(0);" title="<?php echo $_lang['newest_task'];?>"><?php echo $_lang['newest'];?></a></li>
                   </ul>
                 </nav>
                 <!--导航区域 end-->
               </div>
               <div class="grid_7 omega">
                 <!--按钮区域 start-->
                   <div class="btns">
                      <a href="index.php?do=release" class="button left primary"><span class="plus icon"></span><?php echo $_lang['pub_task'];?></a><a href="index.php?do=task_list" class="button right"><span class="rightarrow icon"></span><?php echo $_lang['into_task_hall'];?></a>
                   </div>
                 <!--按钮区域 end-->
               </div>
              <div class="clear"></div>
            </header>
          <!--头部 end-->
          <!--任务推荐-->
<div id="div_task_1">
           <!--顶部推荐3条任务内容 start-->
           <article class="box_detail clearfix">
             <!--列表 start-->
               <ul class="tops clearfix">
                 <?php if(is_array($task_recomm_3)) { foreach($task_recomm_3 as $v) { ?>
<li class="grid_8 alpha omega">
                      <!--单条内容 start-->
                       <div class="item">
                         <!--任务金额 start-->
                           <strong class="font14 money cc00">
                            	<?php echo $_lang['currency'];?><?php if(!$v['task_cash_coverage']) { ?>
<?php echo $v['task_cash'];?>
<?php } else { ?>
<?php echo $cash_coverage[$v['task_cash_coverage']]['start_cove'];?>-<?php echo $cash_coverage[$v['task_cash_coverage']]['end_cove'];?>
<?php } ?>
  </strong>
                         <!--任务金额 end-->
                         <!--任务标题 start-->
                         <h2 class="task_title"><a href="index.php?do=task&task_id=<?php echo $v['task_id'];?>" title="<?php echo $v['task_title'];?>" target="_blank"><?php echo $v['task_title'];?></a></h2>
                         <!--任务标题 end-->
                         <!--任务发布者 start-->
                         <div class="publisher"><a href="index.php?do=space&member_id=<?php echo $v['uid'];?>" title="<?php echo $v['username'];?>" target="_blank"><?php echo $v['username'];?></a></div>
                         <!--任务发布者 end-->
                         <!--任务模型 start-->
                         <div class="task_mode"><?php echo $mode_list[$v['model_id']]['model_name'];?></div>
                         <!--任务模型 end-->
                         <!--任务统计 start-->
                         <div class="task_status"> 
                           <ul>
                              <li title="<?php echo $_lang['view'];?><?php echo $v['view_num'];?>"><a href="index.php?do=task&task_id=<?php echo $v['task_id'];?>"><div class="icon16 cursor-arrow"><?php echo $_lang['view'];?></div><?php echo $v['view_num'];?></a></li>
                              <li title="<?php echo $_lang['favorit'];?> <?php echo $v['focus_num'];?>"><a href="index.php?do=task&task_id=<?php echo $v['task_id'];?>"><div class="icon16 star-fav"><?php echo $_lang['favorit'];?></div><?php echo $v['focus_num'];?></a></li>
                              <li title="<?php echo $_lang['submit_work'];?><?php echo $v['work_num'];?>"><a href="index.php?do=task&task_id=<?php echo $v['task_id'];?>"><div class="icon16 spechbubble-2"><?php echo $_lang['submit_work'];?></div><?php echo $v['work_num'];?></a></li>
                           </ul>
                        </div>
                        <!--任务统计 end-->
                      </div>
                    <!--单条内容 end-->
                   </li>
                   <li class="line"></li>
<?php } } ?>
               </ul>
               <!--列表 end-->
           <div class="clear"></div>
         </article>
        <!--顶部推荐3条任务内容 end-->
                        
      <!--detail内容 start-->
       <article class="box_detail no_bottom clearfix">
         <!--列表内容 33条 start-->
           <ul class="small_list clearfix">
             <?php if(is_array($recomm_task)) { foreach($recomm_task as $v) { ?>
             <li class="grid_8 omega clearfix">
             <!--单条内容 start-->
                <div class="item clearfix">
                	<a href="index.php?do=task&task_id=<?php echo $v['task_id'];?>" title="<?php echo $v['task_title'];?>" target="_blank">&nbsp;
                   
   <!--任务标题 start-->
                   <strong class="cc00 money">
                  	<?php echo $_lang['currency'];?>
<?php if(!$v['task_cash_coverage']) { ?>
<?php echo $v['task_cash'];?>
<?php } else { ?>
<?php echo $cash_coverage[$v['task_cash_coverage']]['start_cove'];?>-<?php echo $cash_coverage[$v['task_cash_coverage']]['end_cove'];?>
<?php } ?>
                  </strong>
  <!--任务金额 start-->
                  <?php echo $v['task_title'];?>
                  <!--任务金额 end-->
  
                   <!--任务标题 end-->
   </a>
                   <!--任务统计 start-->
                   <span class="task_status" title="<?php echo $_lang['view'];?> <?php echo $v['view_num'];?> | <?php echo $_lang['favorit'];?>  <?php echo $v['focus_num'];?> | <?php echo $_lang['submit_work'];?> <?php echo $v['work_num'];?> ">( <?php echo $v['view_num'];?> | <?php echo $v['focus_num'];?>|  <?php echo $v['work_num'];?> )</span>
                   <!--任务统计 start-->
                 </div>
            <!--单条内容 end-->
            </li>
<?php } } ?>
        </ul>
       <!--列表内容 33条 end-->
      <div class="clear"></div>
    </article>
</div>
<!--任务推荐 end-->

<!--任务最新-->
<div id="div_task_2" class="hidden"></div>
   <!--任务列表 end-->
   </div>
  </div>
 </div>

  
  <!--首页_中部三栏广告 start-->
 		 <?php keke_loaddata_class::ad_show('HOME_CENTAL_THREE','index','') ?>
  <!--首页_中部三栏广告 end-->
  
  	<div class="grid_24 mb_10">
       <div class="box model purple orange_shop">
       <!--商城内容 start-->
         <div class="shop">
           <!--头部 satrt-->
             <header class="box_header clearfix">
               <div class="grid_4 alpha">
                 <!--商城标题 start-->
                  <h1 class="box_title"><span><?php echo $_lang['shop'];?></span>Shop</h1>
                 <!--商城标题 end-->
               </div>
               <div class="grid_13 omega">
                  <!--商城导航 start-->
                    <nav class="box_nav clearfix">
                       <ul>
                           <li id="ul_service_1" onclick="swaptab('service','backLava','',2,1);"><a href="javascript:void(0);" title="<?php echo $_lang['recommend'];?>"><?php echo $_lang['recommend'];?></a></li>
                           <li id="ul_service_2" onclick="swaptab('service','backLava','',2,2,{ajax:1,url:'index.php?ajax=shop'});"><a href="javascript:void(0);" title="<?php echo $_lang['newest'];?>"><?php echo $_lang['newest'];?></a></li>
                       </ul>
                     </nav>
                  <!--商城导航 end-->
                </div>
                <div class="grid_7 omega">
                <!--商城按钮 start-->
                    <div class="btns">
                      <a href="index.php?do=shop_release" class="button left primary"><span class="plus icon"></span><?php echo $_lang['pub_goods'];?></a><a href="index.php?do=shop" class="button right"><span class="rightarrow icon"></span><?php echo $_lang['enter_shop'];?></a>
                    </div>
                <!--商城按钮 end-->
                </div>
               <div class="clear"></div>
          </header>
          <!--头部 end-->
                          
         <!--detail内容 start-->
           <article class="box_detail no_bottom clearfix" id="div_service_1">
              <!--商城列表 26条 start-->
                 <ul class="small_list clearfix">
                    <!--第一条商品 start-->
                      <li class="first clearfix">
                      <?php if($recomm_service['0']) { ?>
                      <a href="index.php?do=service&sid=<?php echo $recomm_service['0']['service_id'];?>" title="<?php echo $recomm_service['0']['title'];?>">
                      	 	<?php if($recomm_service['0']['pic']) { ?>
 		<?php $tmp=explode('/',$recomm_service['0']['pic']);$size=sizeof($tmp); ?>
<?php $tmp[$size-1]='210_'.$tmp[$size-1];$src=implode('/',$tmp); ?>
<?php } else { ?>
<?php $src=$style_path.'/img/shop/shop_default_big.jpg'; ?>
<?php } ?>
<img name="lazyImg" lazy_src="<?php echo $src;?>" alt="<?php echo $recomm_service['0']['title'];?>" title="<?php echo $recomm_service['0']['title'];?>">

                      </a>
 <?php } else { ?>
                    <a href="javascript:void(0);" title="<?php echo $_lang['now_no_goods'];?>">
                        <img name="lazyImg" lazy_src="<?php echo $style_path;?>/img/shop/shop_default_big.jpg" alt="<?php echo $_lang['now_no_goods'];?>" title="<?php echo $_lang['now_no_goods'];?>">
                    </a>
 <?php } ?>
 </li>
                    <!--第一条商品 end-->
<?php if(is_array($range)) { foreach($range as $v) { ?>
                       <li class="item clearfix">
                          <?php if($recomm_service[$v]) { ?>
                             <a href="index.php?do=service&sid=<?php echo $recomm_service[$v]['service_id'];?>" title="<?php echo $recomm_service[$v]['title'];?>">
                             	<?php if($recomm_service[$v]['pic']) { ?>
 	<?php $tmp=$tmp1=explode('/',$recomm_service[$v]['pic']);$size=sizeof($tmp); ?>
<?php $tmp[$size-1]='100_'.$tmp[$size-1];$small=implode('/',$tmp); ?>
<?php $tmp1[$size-1]='210_'.$tmp1[$size-1];$big=implode('/',$tmp1); ?>
<?php } else { ?>
<?php $src=$small=$style_path.'/img/shop/shop_default.gif'; ?>
<?php $big=$style_path.'/img/shop/shop_default_big.jpg'; ?>
<?php } ?>
<img name="lazyImg" lazy_src="<?php echo $small;?>" alt="<?php echo $recomm_service[$v]['title'];?>" title="<?php echo $recomm_service[$v]['title'];?>"
small="<?php echo $small;?>" big='<?php echo $big;?>'>

                             </a>
 <?php } else { ?>
                        	 <a href="javascript:void(0);" title="<?php echo $_lang['now_no_goods'];?>">
                               <img name="lazyImg" lazy_src="<?php echo $style_path;?>/img/shop/shop_default.gif" alt="<?php echo $_lang['now_no_goods'];?>" title="<?php echo $_lang['now_no_goods'];?>"
small="<?php echo $style_path;?>/img/shop/shop_default.gif" big="<?php echo $style_path;?>/img/shop/shop_default_big.jpg">
                               </a>
     <?php } ?>
<?php if($v==18) { ?>
<li class="pad"></li>
<?php } ?>
</li>
<?php } } ?>
                    <li class="last clearfix">
                      	<?php if($recomm_service['25']) { ?>
                           <a href="index.php?do=service&sid=<?php echo $recomm_service['25']['service_id'];?>" title="<?php echo $recomm_service['25']['title'];?>">
                           	<?php if($recomm_service['25']['pic']) { ?>
    <?php $tmp=explode('/',$recomm_service['25']['pic']);$size=sizeof($tmp); ?>
<?php $tmp[$size-1]='210_'.$tmp[$size-1];$src=implode('/',$tmp); ?>
                            <?php } else { ?>
<?php $src=$style_path.'/img/shop/shop_default_big.jpg'; ?>
<?php } ?>
<img name="lazyImg" lazy_src="<?php echo $src;?>" alt="<?php echo $recomm_service['25']['title'];?>" title="<?php echo $recomm_service['25']['title'];?>">

                           </a>
<?php } else { ?>
                        <a href="javascript:void(0);" title="<?php echo $_lang['now_no_goods'];?>">
                           <img name="lazyImg" lazy_src="<?php echo $style_path;?>/img/shop/shop_default_big.jpg" alt="<?php echo $_lang['now_no_goods'];?>" title="<?php echo $_lang['now_no_goods'];?>">
                        </a>
<?php } ?>
</li>
                   </ul>
                 <div class="clear"></div>
                <!--商城列表 26条 end-->
               <div class="clear"></div>
             </article>
 
<article class="box_detail clearfix hidden" id="div_service_2"></article>
           <!--detail内容 end-->
          </div>
        <!--商城内容 end-->
     </div>
    <div class="clear"></div>
  </div>

  <!--首页_中下部二栏广告 start-->
  	<?php keke_loaddata_class::ad_show('HOME_LOWER_SECOND','index','') ?>
  <!--首页_中下部二栏广告 end-->
  
  
   <div class="grid_8 mb_10">
    <div class="box model rose orange">
      <div class="inner">
        <!--新闻资讯 start-->
          <div class="news">
           <header class="box_header clearfix">
             <div class="grid_5 alpha omega">
               <!--标题 start-->
                <h1 class="box_title"><span><?php echo $_lang['information'];?></span>News</h1>
               <!--标题 end-->
             </div>
           
               <div class="clear"></div>
             </header>
                          
             <!--detail内容 start-->
            <article class="box_detail no_bottom clearfix" id="div_news_1">
               <!--列表内容 start-->
                <ul class="small_list clearfix">
                  <?php if(is_array($news_list)) { foreach($news_list as $k => $v) { ?>
<?php if($k==0) { ?>
              <li>
                <!--头条图片 start-->
                   <div class="main_img">
                      <a href="index.php?do=article&view=article_info&art_id=<?php echo $v['art_id'];?>" title="<?php echo $v['art_title'];?>">
                      	<img name="lazyImg" lazy_src="<?php if(file_exists($v['art_pic'])) { ?><?php echo $v['art_pic']?><?php } else { ?><?php echo $style_path?>/img/style/new_default.gif<?php } ?>" alt="<?php echo $v['art_title'];?>" title="<?php echo $v['art_title'];?>"/>
</a>
                   </div>
                <!--头条图片 end-->
                <!--头条标题 start-->
                 <div class="main_title clearfix">
                   <a href="index.php?do=article&view=article_info&art_id=<?php echo $v['art_id'];?>" title="<?php echo $v['art_title'];?>"><?php echo $v['art_title'];?></a>
                  <span class="date"><?php if($v['pub_time']){echo date('Y-m-d',$v['pub_time']); } ?></span>
                 </div>
                  <!--头条描述 start-->
                     <div class="sort_info">
                         <span><?php echo kekezu::cutstr(htmlspecialchars_decode($v['content']),80) ?>.....</span>
                     </div>
                 <!--头条描述 end-->
                 <div class="clear"></div>
              </li>
<?php } else { ?>
             <li>
                 <div class="item">
                     <a href="index.php?do=article&view=article_info&art_id=<?php echo $v['art_id'];?>" title="<?php echo $v['art_title'];?>"><?php echo $v['art_title'];?></a>
                        <span class="date"><?php if($v['pub_time']){echo date('Y-m-d',$v['pub_time']); } ?></span>
                 </div>
                 <div class="clear"></div>
             </li>
 <?php } ?>
 <?php } } ?>
                 
                </ul>
<!--更多信息链接 start-->
                    <div class="all_list">
                      <div class=" t_c">
                        <a href="index.php?do=article" class="button" title="<?php echo $_lang['more_information'];?>"><?php echo $_lang['more_information'];?>&raquo;</a>
                      </div>
                    </div>
                 <!--更多信息链接 end-->
               <!--列表内容 end-->
               <div class="clear"></div>
            </article>
           <!--detail内容 end-->
         </div>
       <!--新闻资讯 end-->
      </div>
      </div>
     </div>
            
     <div class="grid_8 mb_10">
      <div class="box model yellow orange">
       <div class="inner">
        <!--案例  start-->
          <div class="case">
            <!--头部 start-->
           <header class="box_header clearfix">
             <div class="grid_5 alpha omega">
               <h1 class="box_title"><span><?php echo $_lang['success_case'];?></span>Case</h1>
             </div>
            <div class="clear"></div>
           </header>
         <!--头部 end-->
         <!--detail内容 start-->
         <article class="box_detail no_bottom clearfix">
            <!--列表内容 start-->
              <ul class="small_list clearfix">
                 <!--头条 start-->
  <?php if(is_array($case_list)) { foreach($case_list as $k => $v) { ?>
   <?php if($k==0) { ?>
                    <li class="first">
                       <div class="main_img">
                       		<a <?php if($v['obj_type']=='task') { ?>href="index.php?do=task&task_id=<?php echo $v['obj_id']?>" <?php } else { ?> href="index.php?do=service&sid=<?php echo $v['obj_id']?>"<?php } ?> title="<?php echo $v['case_title'];?>">
                       			<?php if(file_exists($v['case_img'])) { ?>
                      				<img name="lazyImg" lazy_src="<?php echo $v['case_img'];?>" alt="<?php echo $v['case_title'];?>">
<?php } ?>
                       		</a>
</div>
                        <div class="main_title clearfix">
                        	<a class="fl_l" <?php if($v['obj_type']=='task') { ?>href="index.php?do=task&task_id=<?php echo $v['obj_id']?>" <?php } else { ?> href="index.php?do=service&sid=<?php echo $v['obj_id']?>"<?php } ?>>
                        		<span class="cc00 mr_10"><?php echo $_lang['currency'];?><?php echo $v['case_price'];?></span><?php echo $v['case_title'];?>
</a>
</div>
                    </li>
<?php } else { ?>
                      <li class="item">
                      	<a <?php if($v['obj_type']=='task') { ?>href="index.php?do=task&task_id=<?php echo $v['obj_id']?>" <?php } else { ?> href="index.php?do=service&sid=<?php echo $v['obj_id']?>"<?php } ?> title="<?php echo $v['case_title'];?>">
                      		<?php if(file_exists($v['case_img'])) { ?>
                      		<img name="lazyImg" lazy_src="<?php echo $v['case_img'];?>" alt="<?php echo $v['case_title'];?>">
<?php } ?>

                      	</a>
  </li>
<?php } ?>
 <?php } } ?>
                 
            </ul>
<!--更多信息链接 start-->
                 <div class="all_list">
                    <div class="t_c">
                     <a href="index.php?do=case" class="button" title="<?php echo $_lang['more_information'];?>"><?php echo $_lang['more_information'];?>&raquo;</a>
                    </div>
                 </div>
              <!--更多信息链接 end-->
           <!--列表内容 end-->
         <div class="clear"></div>
       </article>
      <!--detail内容 end-->
   </div>
   <!--案例 end-->
  </div>
 </div>
</div>
            
            
    <div class="grid_8 mb_10 m_h">
     <div class="box model green orange">
      <div class="inner">
     <!--人才 start-->
       <div class="talent">
        <header class="box_header clearfix">
          <div class="grid_5 alpha omega">
              <h1 class="box_title"><span><?php echo $_lang['talents'];?></span>Talent</h1>
          </div>
          <div class="clear"></div>
       </header>
       <!--detail内容 start-->
        <article class="box_detail no_bottom clearfix">
         <!--最新人才头像 16条 start -->
           <dl>
              <dt class="title clearfix">
              	<div>
              		<h2><?php echo $_lang['newest_join'];?></h2>
              	</div>
              </dt>
              <dd>
                <ul class="small_list">
                  <?php if(is_array($talent_list)) { foreach($talent_list as $v) { ?>
                      <li class="item">
                      	<a href="index.php?do=space&member_id=<?php echo $v['uid'];?>" title="<?php echo $v['username'];?>">
                      		<?php echo  keke_user_class::get_user_pic($v['uid'],'small') ?>
                      	</a>
  </li>
                  <?php } } ?>
 </ul>
              </dd>
           </dl>
           <!--最新人才头像 16条 end -->
           <div class="clear"></div>
             <!--收入排行 前5名 start -->
                <dl>
                  <dt class="title clearfix">
                  	<div>
                  		<h2><?php echo $_lang['income_ranking'];?></h2>
                  	</div>
                  </dt>
                  <dd>
                      <ul class="ranking_list">
                      	<?php if(is_array($income_rank)) { foreach($income_rank as $k => $v) { ?>
                          <li <?php if($k==0) { ?>class="first"<?php } elseif($k==4) { ?>class="last"<?php } ?>>
                             <div class="item">
                                <span class="rank_no"><?php echo ++$k; ?></span>
                                <a href="index.php?do=space&member_id=<?php echo $v['uid'];?>"><?php echo $v['username'];?></a>
                                <span class="cc00 money"><?php echo $_lang['currency'];?><?php echo number_format($v['cash'],'2'); ?></span>
                             </div>
                          </li>
 <?php } } ?>
                       </ul>
                   </dd>
                </dl>
              <!--收入排行 前5名 end-->
          <div class="clear"></div>
        </article>
       <!--detail内容 end-->
     </div>
    <!--人才 end-->
   </div>
  </div>
 </div>
  
  <!--首页_中下部二栏广告 start-->
 		 <?php keke_loaddata_class::ad_show('HOME_BOTTOM_SECOND','index','') ?>
  <!--首页_中下部二栏广告 end-->
  <div class="clear"></div>
   </div>
 </div>
<!--内容区 end-->
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
<script type="text/javascript" >
In.add('easySlider',{path:"resource/js/jqplugins/easySlider1.5.js",type:'js'});
In.add('index',{path:"<?php echo $style_path?>/js/index.js",type:'js',rely:['easySlider']});

 	In.add('lazy',{path:"resource/js/system/lazy.js",type:'js'});
 
In('easySlider','index','lazy',function(){
loadPics();
});

$(".box.model .task .box_detail .small_list li").hover(
    function(){$(this).addClass('hover')},
function(){$(this).removeCss('hover')}
);
</script>

<?php keke_tpl_class::ob_out();?>