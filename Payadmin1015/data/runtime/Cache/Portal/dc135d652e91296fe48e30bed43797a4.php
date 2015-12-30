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
     <li class="active"><a href="<?php echo U('AdminPage/index');?>">商品订单列表</a></li>
  </ul>
  <?php if($_GET['all']): else: ?>
  <form class="well form-search" method="post" action="<?php echo u('AdminPage/index');?>">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        &nbsp;&nbsp;订单号：
        <input type="text" class="input length_2" name="temp_purchase_sn" style="width:200px;" value="<?php echo ($formget["temp_purchase_sn"]); ?>" placeholder="请输入订单号">
         &nbsp;&nbsp;收货人：
        <input type="text" class="input length_2" name="name" style="width:200px;" value="<?php echo ($formget["name"]); ?>" placeholder="请输入收货联系人姓名">

         &nbsp;&nbsp;收货地址：
        <input type="text" class="input length_2" name="address" style="width:200px;" value="<?php echo ($formget["address"]); ?>" placeholder="请输入地址">

         &nbsp;&nbsp;收货人手机号：
        <input type="text" class="input length_2" name="mobile" style="width:200px;" value="<?php echo ($formget["mobile"]); ?>" placeholder="请输入收货人手机号">
        <br /><br />
        <span class="mr20">&nbsp;&nbsp;下单时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="<?php echo ($formget["start_time"]); ?>" style="width:90px;" autocomplete="off">-<input autocomplete="off" type="text" class="input length_2 J_date" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width:90px;">
        
        <span class="mr20">&nbsp;&nbsp;支付类型：
        <select class="select_2" name="method" id="method" style="width:120px;">

           <option value='0' >全部</option>

            <option value='100'>支付宝</option>
            <option value='1'>货到付款</option>
            <option value='2'>支付宝网银</option>
            <option value='3'>白条支付</option>
            <option value='4'>通联支付</option>
            <option value='5'>余额支付</option>   

             
      
        </select>
        <span class="mr20">&nbsp;&nbsp;订单状态：
        <select class="select_2" name="state" id="state" style="width:220px;">
            <option value='0'>全部</option>
 
            <option value='1'>订单部分付款</option>
            <option value='2'>已付款，待发货</option>
            <option value='3'>已付款，已发货</option>
            <option value='4'>买家确认收货，订单完成</option>
            <option value='5'>买家申请退款,卖家未确认</option>
            <option value='200'>订单已入账</option>
            <option value='201'>买家申请提现</option>
            <option value='202'>申请提现已处理</option>
            <option value='203'>卖家已同意买家退款</option>
            <option value='204'>管理员已确认，退款已处理</option>
            <option value='205'>货到付款进行中</option>
            <option value='206'>货到付款已完成</option>
            <option value='207'>白条支付进行中</option>
            <option value='208'>白条已收货，管理员未结算</option>
            <option value='209'>白条已收货，管理员已结算</option>
            <option value='210'>已发送红包</option>
  
   

        </select>
        <br /><br />
        <div style="padding-left:45%;"><button class="btn  btn-success">搜索</button>&nbsp;<input class='btn btn-success' type="reset" value="重置"></div>

        </span>
      </div>
    </div>
  </form><?php endif; ?>
  
  <?php $statuses = array( '0'=>'已取消', '1'=>'订单部分付款', '2'=>'已付款，待发货', '3'=>'已付款，已发货', '4'=>'买家确认收货，订单完成', '5'=>'买家申请退款,卖家未确认', '6'=>'卖家已同意买家退款', '7'=>'管理员已确认，退款已处理', '8'=>'', '9'=>'', '200'=>'订单已入账', '201'=>'买家申请提现', '202'=>'申请提现已处理', '203'=>'卖家已同意买家退款', '204'=>'管理员已确认，退款已处理', '205'=>'货到付款进行中', '206'=>'货到付款已完成', '207'=>'白条支付进行中', '208'=>'白条已收货，管理员未结算', '209'=>'白条已收货，管理员已结算', '210'=>'已发送红包', '211'=>'余额支付成功', '212'=>'余额支付取消' ); $method_array = array( '0'=>'支付宝', '1'=>'货到付款', '2'=>'支付宝网银', '3'=>'白条支付', '4'=>'通联支付', '5'=>'余额支付'); ?>
  <?php session('dump_url',$_GET); ?>
  <form class="J_ajaxForm" action="" method="post">
    <div class="table_list">
      <table width="100%" class="table table-hover">
        <thead>
          <?php if($posts[0]['p0'] == 1 ): ?><tr>
              <th >ID</th>
              <th>时间</th>
              <th>提现金额</th>
              <th>开户名</th>
              <th>账号</th>  
              <th>订单状态</th>
              <th>操作</th>
            </tr>
       </thead>
        
          <?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><tr>

                <td><?php echo ($vo["temp_payment_id"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></td>
                <td>￥<?php echo ($vo["money"]); ?>元</td>
                <td><?php echo ($vo["person"]); ?></td>
                <td><?php echo ($vo["alipay"]); ?></td>

                <td><?php echo ($statuses[$vo['state']+200]); ?></td>


                <td>
                    <?php if($vo['state'] == 2): ?><font color="#cccccc">审核</font> |
                    <a href="<?php echo U('AdminPage/order_check',array('id'=>$vo['temp_payment_id'],'ps'=>1));?>" class="J_ajax_dialog_btn" data-msg="您确定要取消审核吗？" >取消审核</a> 
                    <?php elseif($vo['state'] == 1): ?>
                    <a href="<?php echo U('AdminPage/order_check',array('id'=>$vo['temp_payment_id'],'ps'=>1));?>" class="J_ajax_dialog_btn" data-msg="您确定要处理此订单吗？" >审核</a> |
                    <font color="#cccccc">取消审核</font><?php endif; ?>
          </td>
              </tr><?php endforeach; endif; ?>
            <?php elseif($posts[0]['p1'] == 1): ?>
            <tr>
              <th >ID</th>
              <th >订单号</th>
              <th>时间</th>
              <th>收货信息</th>
              <th>总金额</th>
              <th>物流费</th>
              <th>支付方式</th>
              <th >开户名</th>
              <th >账号</th>      
              <th>订单状态</th>
              <th>操作</th>
            </tr>
      </thead>

          <?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><tr>
                <?php if($vo['order_id'] > 0): ?><td><?php echo ($vo["temp_payment_id"]); ?></td>
                  <td><?php echo ($vo["temp_purchase_sn"]); ?></td>
                  <td><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></td>
                  <td>——</td>
                  <td>￥<?php echo ($vo["money"]); ?>元</td>
                  <td>——</td>
                  <td><?php echo ($method_array[$vo['pay_method']]); ?></td>
                  <td ><?php echo ($vo["person"]); ?></td>
                  <td ><?php echo ($vo["alipay"]); ?></td>
                  <td><?php echo ($statuses[$vo['state']+200]); ?></td>
                <?php else: ?>
                  <td><?php echo ($vo["temp_payment_id"]); ?></td>
                  <td><?php echo ($vo["temp_purchase_sn"]); ?><br/><?php echo ($vo["purchase_title"]); ?></td>

                <td><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></td>
                <td><?php echo ($vo["name"]); ?>[手机号:<?php echo ($vo["mobile"]); ?>]<br/><?php echo ($vo["address"]); ?></td>
                <td>￥<?php echo ($vo["money"]); ?>元</td>
                <td>￥<?php echo ($vo["transportation"]); ?>元</td>
                <td><?php echo ($method_array[$vo['method']]); ?></td>
                <td ><?php echo ($vo["person"]); ?></td>
                <td ><?php echo ($vo["alipay"]); ?></td>
                    <?php if(($vo['method'] != 5 ) and ($vo['state'] == 11) ): ?><td> 余额已支付￥<?php echo ($vo["account_money"]); ?>元<br/>还需支付￥<?php echo ($vo["money"]); ?>-￥<?php echo ($vo["account_money"]); ?>元=￥<?php echo round($vo['money']-$vo['account_money'],2); ?>元</td>
                     <else if>
                     <?php else: ?>
                     <td><?php echo ($statuses[$vo['state']+200]); ?></td><?php endif; endif; ?>
                
                

                <td>
                  <?php if($vo['order_id'] > 0): ?><a href="javascript:open_iframe_dialog('<?php echo U('AdminPage/cash_order_info',array('id'=>$vo['order_id']));?>','查看订单详情');">查看</a>
                  <?php else: ?>
                                 <a href="javascript:open_iframe_dialog('<?php echo U('AdminPage/order_info',array('id'=>$vo['temp_purchase_id']));?>','查看订单详情');">查看</a><?php endif; ?>

                    <?php if(($vo['state'] == 4) or ($vo['state'] == 9)): ?>| <font color="#cccccc">审核</font> |
                    <a href="<?php echo U('AdminPage/order_check',array('pid'=>$vo['temp_purchase_id'],'id'=>$vo['temp_payment_id']));?>" class="J_ajax_dialog_btn" data-msg="您确定要取消审核吗？" >取消审核</a> 
                    <?php elseif(($vo['state'] == 3) or ($vo['state'] == 8)): ?>
                    | <a href="<?php echo U('AdminPage/order_check',array('pid'=>$vo['temp_purchase_id'],'id'=>$vo['temp_payment_id']));?>" class="J_ajax_dialog_btn" data-msg="您确定要处理此订单吗？" >审核</a> |
                    <font color="#cccccc">取消审核</font><?php endif; ?>
          </td>
              </tr><?php endforeach; endif; ?>
          <?php else: ?>
             <tr>
              <th>ID</th>
              <th>订单号</th>
              <th>时间</th>
              <th>收货信息</th>
              <th>总金额</th>
              <th>物流费</th>
              <th>支付方式</th>
              <th>订单状态</th>
              <th>操作</th>
            </tr>
       </thead>

          <?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><tr>

                <td><?php echo ($vo["temp_purchase_id"]); ?></td>
                <td><?php echo ($vo["temp_purchase_sn"]); ?><br/><?php echo ($vo["purchase_title"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$vo["time"])); ?></td>
                <td><?php echo ($vo["name"]); ?>[手机号:<?php echo ($vo["mobile"]); ?>]<br/><?php echo ($vo["address"]); ?></td>
                <td>￥<?php echo ($vo["money"]); ?>元</td>
                <td>￥<?php echo ($vo["transportation"]); ?>元</td>
                <?php if(($vo['state'] == 1) or(($vo['type']+200 == '211') and ($vo['money'] != $vo['account_money']))): ?><td>余额支付</td>
                <?php else: ?>
                <td><?php echo ($method_array[$vo['method']]); ?></td><?php endif; ?>             
                <td>
                  <?php if(is_null($vo['type'])): if($vo['state'] == 1): ?>余额已支付￥<?php echo ($vo["account_money"]); ?>元<br/>还需支付￥<?php echo ($vo["money"]); ?>-￥<?php echo ($vo["account_money"]); ?>元=￥<?php echo round($vo['money']-$vo['account_money'],2); ?>元
                      <?php else: ?>
                      <?php echo ($statuses[$vo['state']]); endif; ?>
                  
                  <?php else: ?>
                    <?php if($vo['type']+200 == '211'): ?>待付款<br />余额已支付￥<?php echo ($vo["account_money"]); ?>元<br/>还需支付￥<?php echo ($vo["money"]); ?>-￥<?php echo ($vo["account_money"]); ?>元=￥<?php echo round($vo['money']-$vo['account_money'],2); ?>元
                      <?php else: ?>
                      <?php echo ($statuses[$vo['type']+200]); endif; endif; ?>
                </td>
                <td>

                     <a href="javascript:open_iframe_dialog('<?php echo U('AdminPage/order_info',array('id'=>$vo['temp_purchase_id']));?>','查看订单详情');">查看</a>
                    <?php if(($vo['state'] == 7) or ($vo['type'] == 2) or ($vo['type'] == 4) or ($vo['type'] == 9) ): ?>| <font color="#cccccc">审核</font> |
                          <?php if(($vo['type'] == 2)): ?><a href="<?php echo U('AdminPage/order_check',array('id'=>$vo['temp_payment_id'],'ps'=>1));?>" class="J_ajax_dialog_btn" data-msg="您确定要取消审核吗？" >取消审核</a> 
        
                          <?php elseif(($vo['type'] == 4) or ($vo['type'] == 9)): ?>
                            <a href="<?php echo U('AdminPage/order_check',array('pid'=>$vo['temp_purchase_id'],'id'=>$vo['temp_payment_id']));?>" class="J_ajax_dialog_btn" data-msg="您确定要取消审核吗？" >取消审核</a>                                 
                          <?php else: ?> 
                             <a href="<?php echo U('AdminPage/order_check',array('id'=>$vo['temp_purchase_id'],'ps'=>2));?>" class="J_ajax_dialog_btn" data-msg="您确定要取消审核吗？" >取消审核</a><?php endif; ?>
                    <?php elseif(($vo['state'] == 6) or ($vo['type'] == 1) or ($vo['type'] == 3) or ($vo['type'] == 8)): ?>
                    | 
                        <?php if(($vo['type'] == 1)): ?><a href="<?php echo U('AdminPage/order_check',array('id'=>$vo['temp_payment_id'],'ps'=>1));?>" class="J_ajax_dialog_btn" data-msg="您确定要处理此订单吗？" >审核</a>
                        <?php elseif(($vo['type'] == 3) or ($vo['type'] == 8)): ?>
                        <a href="<?php echo U('AdminPage/order_check',array('pid'=>$vo['temp_purchase_id'],'id'=>$vo['temp_payment_id']));?>" class="J_ajax_dialog_btn" data-msg="您确定要处理此订单吗？" >审核</a>
                        <?php else: ?>
                            <a href="<?php echo U('AdminPage/order_check',array('id'=>$vo['temp_purchase_id'],'ps'=>2));?>" class="J_ajax_dialog_btn" data-msg="您确定要处理此订单吗？" >审核</a><?php endif; ?>
                     |
                    <font color="#cccccc">取消审核</font><?php endif; ?>
          </td>
              </tr><?php endforeach; endif; endif; ?>
        
          </table>
           <div style="margin-bottom: 5px" >
                          <table width="90%" cellspacing="1" cellpadding="3" width="100%" class="table table-hover" align="right">
                          <td>
                          <div align="right" style="margin-right:100px">
                          本页订单总金额：
                          <strong>￥<?php echo (($page_money)?($page_money):'0.00'); ?>元</strong>
                          </div>
                          </td>
                          </tr>
                          </table>
            </div>
      		<div class="pagination"><?php echo ($Page); ?></div>
     
    </div>

  </form>
</div>
<script src="__ROOT__/statics/js/common.js"></script>
<script>
setCookie('refersh_time', 0);
function refersh_window() {
    var refersh_time = getCookie('refersh_time');
    if (refersh_time == 1) {
        window.location.reload();
    }
}
setInterval(function(){
	refersh_window()
}, 2000);
$(function(){
  var methodId = "<?php echo ($formget["method"]); ?>"; 
  $('#method').children().each(function(){

        if($(this).val() == methodId){

          $(this).attr('selected','selected');
        }
  });
  var stateId = "<?php echo ($formget["state"]); ?>"; 
  $('#state').children().each(function(){

        if($(this).val() == stateId){

          $(this).attr('selected','selected');
        }
  });
});
</script>
</body>
</html>