<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="__ROOT__/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="__ROOT__/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="__ROOT__/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="__ROOT__/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="__ROOT__/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "__ROOT__/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="__ROOT__/statics/js/jquery.js"></script>
    <script src="__ROOT__/statics/js/wind.js"></script>
    <script src="__ROOT__/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
<div class="wrap">
  <ul class="nav nav-tabs">
        <li><a href="<?php echo U('User/userinfo');?>">修改信息</a></li>
        <li class="active"><a href="<?php echo U('User/userinfo');?>">修改密码</a></li>
      </ul>
  <div class="common-form">
    <form class="form-horizontal J_ajaxForm" method="post" action="<?php echo U('setting/password_post');?>">
        <fieldset>
          <div class="control-group">
            <label class="control-label" for="input01">原始密码:</label>
            <div class="controls">
              <input type="password" class="input-xlarge" id="input01" name="old_password">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="input01">新密码:</label>
            <div class="controls">
              <input type="password" class="input-xlarge" id="input01" name="password">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="input01">重复新密码:</label>
            <div class="controls">
              <input type="password" class="input-xlarge" id="input01" name="repassword">
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary btn_submit  J_ajax_submit_btn">更新</button>
          </div>
        </fieldset>
      </form>
  </div>
</div>
<script src="__ROOT__/statics/js/common.js"></script>
<script type="text/javascript" src="__ROOT__/statics/js/content_addtop.js"></script>
</body>
</html>