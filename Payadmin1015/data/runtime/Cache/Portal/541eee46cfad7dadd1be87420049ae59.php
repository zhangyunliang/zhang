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
     <li class="active"><a href="<?php echo U('Customer/index');?>">无邀请人</a></li>
  </ul>

    <div class="table_list">
      <table width="100%" class="table table-hover">
        <thead>
	          <tr>
	            <th>ID</th>
                <th>下单单数</th>
                <th>操作</th>
                <th>下单总金额</th>
	            <th>客户</th>
	            <th>昵称</th>
                <th>注册时间</th>
	          </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                    <td><?php echo ($vo["temp_buyers_id"]); ?></td>
                    <td style="color: #FF0000"><?php echo ($vo["orders"]); ?></td>
                    <td><a href="<?php echo U('Purchaselist/index',array('id'=>$vo['temp_buyers_id']));?>">查看详情</a></td>
                    <?php if($vo["moneys"] != null): ?><td style="color: #FF0000"><strong>￥</strong><?php echo ($vo["moneys"]); ?></td>
                        <?php else: ?>
                        <td>暂无金额</td><?php endif; ?>

                    <td><?php echo ($vo["temp_buyers_mobile"]); ?></td>
                    <td><?php echo ($vo["nick"]); ?></td>
                    <td><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
                </tr><?php endforeach; endif; ?>
        </tbody>
          </table>
          <div class="pagination"><?php echo ($page); ?></div>
    </div>

</div>
<script src="__ROOT__/statics/js/common.js"></script>
</body>
</html>