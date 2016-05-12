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
<body class="J_scroll_fixed" style="min-width:600px;">
<div class="wrap jj">
  <div class="common-form">
    <form method="post" class="J_ajaxForm" action="#">
      <div class="table_list">
	    <table width="100%" class="table table-hover">
	        <thead>
	          <tr>
	            <th align='center'>ID</th>
	            <th>用户名</th>
	            <th>昵称</th>
	           <!--  <th>E-mail</th> -->
	            <th>角色名称</th>
	            <th align='center'>操作</th>
	          </tr>
	        </thead>
	        <tbody>
	        	<?php if(is_array($lists)): foreach($lists as $key=>$vo): ?><tr>
	            <td align='center'><?php echo ($vo["id"]); ?></td>
	            <td><?php echo ($vo["user_login"]); ?></td>
	            <td><?php echo ($vo["user_nicename"]); ?></td>
	            <!-- <td><?php echo ($vo["user_email"]); ?></td> -->
	            <!-- <td><?php echo date('Y-m-d H:i:s', $vo['create_time']);?></td> -->
	            <td><?php echo ($vo["name"]); ?></td>
	            <td align='center'>
		            <a href="<?php echo U('user/delete',array('id'=>$vo['id']));?>" class="J_ajax_del" >删除</a>
		        </td>
	          	</tr><?php endforeach; endif; ?>
			</tbody>
	      </table>
	      <div class="p10"><div class="pages">  </div> </div>
  </div>
    </form>
  </div>
</div>
<script src="__ROOT__/statics/js/common.js"></script>
</body>
</html>