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
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li class="active"><a href="">【<?php echo ($name); ?>】资源单管理</a></li>
  </ul>
    <div class="table_list" style="color: #1abc9c;">
            <table width="100%" class="table table-hover table-bordered table-list" border="1px">
                <thead>
                <tr style="background: #ecf0f1 none repeat scroll 0 0;">
                    <th>管理单编号</th>
                    <th>生成时间</th>
                    <th>下载次数</th>
                    <th>管理单名称</th>
                    <th>管理单详情</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </tbody>
          </table>
          <div class="pagination"><?php echo ($page); ?></div>
    </div>
</div>
<script src="__ROOT__/statics/js/common.js"></script>
</body>
</html>