<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head lang="zh-CN">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

        <title>宝CMS</title>
        <link rel="stylesheet" href="__TMPL__statics/css/style.css" />
        <link rel="stylesheet" href="__TMPL__statics/LIB/css/style.css"/>
    </head>
    
    <body>
    	<section class="loginbar">
        	<div class="container">
            	<h1>BAOCMS<p>物业管理中心</p></h1>
            	<form action="<?php echo U('passport/login');?>" method="post">
	                <div class="login_user">
	                	<i></i><label>用户名<input type="text" name="account"></label>
	            	</div>
	            	<div class="login_psw">
	            		<i></i><label>密&nbsp;&nbsp;&nbsp;&nbsp;码<input type="password" name="password"></label>
 
	        		</div>
	        		<div class="login_box">
	        			<input type="submit" value="登录">
	        		</div>
        		</form>

	            
	            <div class="copyright">合肥生活宝网络科技有限公司版权所有</div>
            </div>
        </section>
    
    </body>
    </html>