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
<style type='text/css'>
	td{
		border: 1px solid #ddd;
	}
	.font14{
		font-size: 14px;
	}
</style>
<body class="J_scroll_fixed" style="min-width:800px;">
<div class="J_check_wrap">
  <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('commentadmin/index');?>">订单统计信息</a></li>
  </ul>
<form class="well form-search" method="post" action="<?php echo u('commentadmin/index');?>">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="<?php echo ($formget["start_time"]); ?>" style="width:90px;" autocomplete="off">-<input autocomplete="off" type="text" class="input length_2 J_date" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width:90px;">
        <button class="btn  btn-success">筛选</button>
        </span>
      </div>
    </div>
  </form>
       <input type='hidden' value='<?php echo ($T); ?>'/>
							<table  cellspacing="1" cellpadding="3" width="100%" class="table table-hover" style='border: 1px solid #ddd;width: 100%;'>
							<thead>
							</tr>
								<td width="33%" ><strong class='font14'>订单分类</strong></td>
						  <td width="33%"><strong class='font14'>订单数</strong></td>
							 <td width="33%"><strong class='font14'>总金额</strong></td>
							</tr>
						
							</thead>
							<tbody>
<?php if(isset($_GET['start_time'])){ $start_time = strtotime($_GET['start_time'].' 0:0:0'); } if(isset($_GET['end_time'])){ $end_time = strtotime($_GET['end_time'].' 23:59:59'); } ?>
							<tr >
							<td >
							<a href="javascript:open_iframe_dialog('<?php echo U('Portal/AdminPage/index',array('state'=>208,'start_time'=>$start_time,'end_time'=>$end_time));?>','白条收货未结算')">白条收货未结算:</a>
							</td>
							<td >
							<strong><?php echo (($btw_number)?($btw_number):'0'); ?></strong>
							</td>
							<td >
							<strong>￥<?php echo (($btw)?($btw):'0.00'); ?>元</strong>
							</td>
						 </tr>
						 <tr>
							<td>
							<a href="javascript:open_iframe_dialog('<?php echo U('Portal/AdminPage/index',array('state'=>209,'start_time'=>$start_time,'end_time'=>$end_time));?>','白条收货已结算')">白条收货已结算:</a>
							</td>
							<td >
							<strong><?php echo (($bty_number)?($bty_number):'0'); ?></strong>
							</td>
							<td>
							<strong>￥<?php echo (($bty)?($bty):'0.00'); ?>元</strong>
							</td>
						</tr>
						 <tr>
							<td >
							<a href="javascript:open_iframe_dialog('<?php echo U('Portal/AdminPage/index',array('all'=>1,'state'=>200,'start_time'=>$start_time,'end_time'=>$end_time));?>','在线支付已入账')">在线支付已入账:</a>
							</td>
							<td >
							<strong><?php echo (($online_pay_number)?($online_pay_number):'0'); ?></strong>
							</td>
							<td >
							<strong>￥<?php echo (($online_pay)?($online_pay):'0.00'); ?>元</strong>
							</td>
							</tr>
							<tr>
							<td >
							<a href="javascript:open_iframe_dialog('<?php echo U('Portal/AdminPage/index',array('state'=>211,'start_time'=>$start_time,'end_time'=>$end_time));?>','余额支付')">余额支付:</a>
							</td>
							<td >
							<strong><?php echo (($balance_cash_number)?($balance_cash_number):'0'); ?></strong>
							</td>
							<td >
							<strong>￥<?php echo (($balance_cash)?($balance_cash):'0.00'); ?>元</strong>
							</td>
							</tr>
						<tr>
							<td>
							<a href="javascript:open_iframe_dialog('<?php echo U('Portal/AdminPage/index',array('state'=>206,'start_time'=>$start_time,'end_time'=>$end_time));?>','货到付款已完成')">货到付款已完成:</a>
							</td>
							<td >
							<strong><?php echo (($huofu_number)?($huofu_number):'0'); ?></strong>
							</td>
							<td>
							<strong>￥<?php echo (($huofu)?($huofu):'0.00'); ?>元</strong>
							</td>
							</tr>
							<tr>
							<td>
							<a href="javascript:open_iframe_dialog('<?php echo U('Portal/AdminPage/index',array('state'=>202,'start_time'=>$start_time,'end_time'=>$end_time));?>','提现已完成')">提现已完成:</a>
							</td>
							<td >
							<strong><?php echo (($tixian_number)?($tixian_number):'0'); ?></strong>
							</td>
							<td>
							<strong>￥<?php echo (($tixian)?($tixian):'0.00'); ?>元</strong>
							</td>
						</tr>
						<tr>
							<td>
							<a href="javascript:open_iframe_dialog('<?php echo U('Portal/AdminPage/index',array('state'=>204,'start_time'=>$start_time,'end_time'=>$end_time));?>','退款已完成')">退款已完成:</a>
							</td>
														<td >
							<strong><?php echo (($tukuan_number)?($tukuan_number):'0'); ?></strong>
							</td>
							<td>
							<strong>￥<?php echo (($tukuan)?($tukuan):'0.00'); ?>元</strong>
							</td>
							</tr>
							<tr>
							<td>
							<a href="javascript:open_iframe_dialog('<?php echo U('Portal/Recharge/index',array('order_status'=>1,'start_time'=>$start_time,'end_time'=>$end_time));?>','已充值订单')">已充值:</a>
							</td>
														<td >
							<strong><?php echo (($in_cash_number)?($in_cash_number):'0'); ?></strong>
							</td>
							<td>
							<strong>￥<?php echo (($in_cash)?($in_cash):'0.00'); ?>元</strong>
							</td>
							</tr>
							<tr>
							<td>
							<a href="javascript:open_iframe_dialog('<?php echo U('Portal/Recharge/index',array('order_status'=>200,'start_time'=>$start_time,'end_time'=>$end_time));?>','充值红包订单')">充值红包:</a>
							</td>
							<td >
							<strong><?php echo (($in_bonus_number)?($in_bonus_number):'0'); ?></strong>
							</td>
							<td>
							<strong>￥<?php echo (($in_bonus)?($in_bonus):'0.00'); ?>元</strong>
							</td>
							</tr>
							<tr>
							<td>
							<a href="javascript:open_iframe_dialog('<?php echo U('Portal/AdminPage/commission',array('start_time'=>$start_time,'end_time'=>$end_time));?>','邀请人佣金')">邀请人佣金:</a>
							</td>
														<td >
							<strong><?php echo (($commission_number)?($commission_number):'0'); ?></strong>
							</td>
							<td>
							<strong>￥<?php echo (($commission)?($commission):'0.00'); ?>元</strong>
							</td>
							</tr>
							<tr>
							<td>
							<a href="javascript:open_iframe_dialog('<?php echo U('Portal/AdminPage/index',array('start_time'=>$start_time,'end_time'=>$end_time));?>','所有订单')">商品订单:</a>
							</td>
								<td colspan=2>
							<strong><?php echo (($order_number)?($order_number):'0'); ?></strong>
							</td>

							</tr>
							</tbody>
							</table>
    </div>
    <div style="margin-bottom: 5px" >
													<table width="100%" cellspacing="1" cellpadding="3" width="100%" class="table table-hover" align="right">
													<tbody>
													<td>
													<div align="right">
													在线支付总金额：
													<strong>￥<?php echo (($online_pay)?($online_pay):'0.00'); ?>元</strong>
													+ 货到付款金额:：
													<strong>￥<?php echo (($huofu)?($huofu):'0.00'); ?>元</strong>
													+ 白条收货已结算金额：
													<strong>￥<?php echo (($bty)?($bty):'0.00'); ?>元</strong>
													+ 余额支付总金额：
													<strong>￥<?php echo (($balance_cash)?($balance_cash):'0.00'); ?>元</strong>
													</div>
													</td>
													</tr>
													<tr>
													<td>
													<div align="right">
													= 交易总金额：
													<strong>￥<?php echo (($online_pay+$huofu+$bty+$balance_cash)?($online_pay+$huofu+$bty+$balance_cash):'0.00'); ?>元</strong>
													</div>
													</td>
													</tr>
													<tr>
													<td>
													<div align="right">
													- 已提现金额：
													<strong>￥<?php echo (($tixian)?($tixian):'0.00'); ?>元</strong>
													- 已退款金额：
													<strong>￥<?php echo (($tukuan)?($tukuan):'0.00'); ?>元</strong>
													- 已返现充值红包金额：
													<strong>￥<?php echo (($in_bonus)?($in_bonus):'0.00'); ?>元</strong>
													- 邀请人佣金总金额：
													<strong>￥<?php echo (($commission)?($commission):'0.00'); ?>元</strong>
													- 余额支出总金额：
													<strong>￥<?php echo (($balance_cash)?($balance_cash):'0.00'); ?>元</strong>
													</div>
													</td>
													</tr>
													<tr>
													<td>
													<div align="right">
													=总收入金额：
													<strong>￥<?php echo (($online_pay+$huofu+$bty-$tixian-$tukuan-$in_bonus-$commission)?($online_pay+$huofu+$bty-$tixian-$tukuan-$in_bonus-$commission):'0.00'); ?>元</strong>
													</div>
													</td>
													</tr>
													</tbody>
													</table>
  </form>
</div>
<script src="__ROOT__/statics/js/common.js"></script>
</body>
</html>