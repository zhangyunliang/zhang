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
     <li class="active"><a href="<?php echo U('Invitation/index');?>"><?php echo ($name); ?>的订单详情</a></li>
  </ul>

    <div class="table_list">
        <?php $status=array( '1'=>'待支付', '2'=>'已付款，待发货', '3'=>'已付款，已发货', '4'=>'买家确认收货，订单完成', ); $payInfo=array( '0'=>'支付宝', '1'=>'货到付款', '2'=>'支付宝网银', '3'=>'白条支付', '4'=>'通联支付', '5'=>'余额支付', '6'=>'微信支付', ); ?>
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="head">
                <span style="font-size: 10px;color: #1abc9c;">订单号：<?php echo ($vo["temp_purchase_sn"]); ?></span>&nbsp;&nbsp;<br/>
                <span style="font-size: 10px;color: #1abc9c;">买家信息：<?php echo ($vo["name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;联系方式：<?php echo ($vo["mobile"]); ?></span>
                <span style="font-size: 10px;color: #1abc9c;">收货地址：<?php echo ($vo["address"]); ?></span><br/>
                <span style="font-size: 10px;color: #1abc9c;">供应商：<?php echo ($vo["suppliers_name"]); ?></span>&nbsp;&nbsp;&nbsp;
                <span style="font-size: 10px;color: #1abc9c;">总金额：<?php echo ($vo["money"]); ?></span>
                <span style="font-size: 10px;color: #1abc9c;">下单时间：<?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></span>&nbsp;&nbsp;&nbsp;
                <span style="font-size: 10px;color: #1abc9c;">订单完成时间：<?php echo (date('Y-m-d H:i:s',$vo["finish_time"])); ?></span><br/>
                <span style="font-size: 10px;color: #1abc9c;">订单状态：<?php echo ($status[$vo['state']]); ?></span>
                <span style="font-size: 10px;color: #1abc9c;">支付方式：<?php echo ($payInfo[$vo['method']]); ?></span>
            </div>
            <table width="100%" class="table table-hover table-bordered table-list" border="1px">
                <thead>
                <tr style="background: #ecf0f1 none repeat scroll 0 0;">
                    <th>商品编号</th>
                    <th>商品型号</th>
                    <th>商品单位</th>
                    <th>商品小计</th>
                    <th>商品品牌</th>
                    <th>买家备注</th>
                    <th>卖家备注</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($vo['goods'])): foreach($vo['goods'] as $key=>$v): ?><tr>
                        <td><?php echo ($v["goods_sn"]); ?></td>
                        <td><?php echo ($v["version"]); ?></td>
                        <td><?php echo ($v["unit"]); ?></td>
                        <td><?php echo (round($v["xiaoji"],2)); ?></td>
                        <td><?php echo ($v["brand_name"]); ?></td>
                        <td><?php echo ($v["description"]); ?></td>
                        <td><?php echo ($v["suppliers_remarks"]); ?></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
          </table><?php endforeach; endif; ?>
          <div class="pagination"><?php echo ($page); ?></div>
    </div>

</div>
<script src="__ROOT__/statics/js/common.js"></script>
</body>
</html>