<?php if (!defined('THINK_PATH')) exit();?>
<!-- 
充值列表
 -->
<!doctype html>
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
     <li class="active"><a href="javascript:;">充值订单列表</a></li>
  </ul>
  <form class="well form-search" method="post" action="<?php echo u('Recharge/index');?>">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">订单状态：
        <!-- 删除状态为：-2 -->
        <select class="select_2" name="order_status">
        	<!-- <option value="10">全部</option> -->
          	<?php if(is_array($val)): foreach($val as $key=>$vo): $select=$vo['sid']===$status_id?"selected":""; ?>
          		<option value="<?php echo ($vo["sid"]); ?>" <?php echo ($select); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
        </select>
        &nbsp;&nbsp;时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="<?php echo (($formget["start_time"])?($formget["start_time"]):''); ?>" style="width:200px;" autocomplete="off">-<input type="text" class="input length_2 J_date" name="end_time" value="<?php echo (($formget["end_time"])?($formget["end_time"]):''); ?>" style="width:200px;" autocomplete="off">
        <input type="submit" class="btn  btn-success" value="搜索"/>
        </span>
      </div>
    </div>
  </form>
  <!-- 支付方式 -->
  <?php $pay=array('100'=>'支付宝','1'=>'货到付款','2'=>'支付宝网银','3'=>'白条支付','4'=>'通联支付','5'=>'余额支付'); ?>
  <form class="J_ajaxForm" action="" method="post">
    <div class="table_list">
      <table width="100%" class="table table-hover">
        <thead>
	          <tr>
	            <th >ID</th>
	            <th >订单号</th>
                <th >用户昵称</th>
                <th >订单状态</th>
	            <th >支付方式</th>
	            <th ><span>充值总金额</span></th>
	            <th >下单时间</th>
	            <th >红包类型</th>
	            <th >红包金额</th>
	            <!-- <th width="100">操作</th> -->
	          </tr>
        </thead>

			<!-- 展示 -->
			<?php $status=array('-1'=>'取消','0'=>'待付款','1'=>'已付款','200'=>'已发红包'); ?>
        	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
			            <td><?php echo ($vo["order_id"]); ?></td>
			            <td><?php echo ($vo["order_sn"]); ?></td>
			            <td><?php echo ($vo["nick"]); ?></td>
	                    <td style="font-weight: bolder;"><?php echo ($status[$vo['order_status']]); ?></td>
	                    <?php if($vo["pay_method"] == 0): ?><td style="font-weight: bolder;"><?php echo ($pay[$vo['pay_method']+100]); ?></td><!-- 支付方式 -->
	                    <?php else: ?>
	                    <td style="font-weight: bolder;"><?php echo ($pay[$vo['pay_method']]); ?></td><?php endif; ?>
			            <td style="font-weight: bolder;"><?php echo ($vo["order_amount"]); ?></td>
			            <td><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
			            <td><?php echo ($vo["bonus_name"]); ?></td>
			            <td style="font-weight: bolder;"><?php echo ($vo["bonus_money"]); ?></td>
			            <!-- <td>
			            	<a href="<?php echo U('Recharge/account',array('id'=>$vo['order_id']));?>" target="_blank">查看</a>|
			            	<a href="<?php echo U('Recharge/edit',array('id'=>$vo['order_id']));?>" >编辑</a>|
			            	<a href="<?php echo U('Recharge/delete',array('id'=>$vo['order_id']));?>" class="J_ajax_del" >删除</a>
						</td>-->
		          	</tr><?php endforeach; endif; ?>
          </table>
          <div class="pagination"><?php echo ($page); ?></div>
    </div>
  </form>
</div>
<script src="__ROOT__/statics/js/common.js"></script>
<script>

function refersh_window() {
    var refersh_time = getCookie('refersh_time');
    if (refersh_time == 1) {
        window.location="<?php echo u('Recharge/index',$formget);?>";
    }
}
</script>
</body>
</html>