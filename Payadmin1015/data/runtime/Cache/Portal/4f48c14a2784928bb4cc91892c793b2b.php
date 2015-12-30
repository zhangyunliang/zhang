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
     <li class="active"><a href="javascript:;">红包类型列表</a></li>
     <li><a href="<?php echo U('AdminBonus/add',array('term'=>empty($term['term_id'])?'':$term['term_id']));?>"  target="_self">添加红包类型</a></li>
  </ul>

    <div class="table_list">
      <table width="100%" class="table table-hover">
        <thead>
	          <tr>
	            <th>ID</th>
	            <th>类型名称</th>
	            <th >发放类型</th>
              <th >促销金额</th>
              <th >促销返现</th>
              <th >状态</th>
              <th >最低使用限额</th>
              <th >最高使用限额</th>
              <th >使用的开始时间</th>
              <th >使用的结束时间</th>
              <th >区域</th>
              <th >备注</th>
              <th >创建时间</th>
	            <th >操作</th>
	          </tr>
        </thead>
        <?php $send_type_array = array('充值发送','按用户发送','按商品发送',' 按订单发送','线下发送','品材网发红包'); $bonus_status_array = array('正常','已取消'); ?>
        	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>

		            <td><?php echo ($vo["bonus_id"]); ?></td>
		            <td><?php echo ($vo["bonus_name"]); ?></td>
		            <td><?php echo ($send_type_array[$vo['send_type']]); ?></td>
                <td>￥<?php echo ($vo["bonus_money"]); ?>元</td>
                <td><?php echo ($vo['cash_back']*100); ?>%</td>
                <td><?php echo ($bonus_status_array[$vo['bonus_status']]); ?></td>
                <td><?php echo ($vo["min_amount"]); ?></td>
                <td><?php echo ($vo["max_amount"]); ?></td>
                <?php if($vo['use_start_date'] != 0): ?><td><?php echo (date('Y-m-d H:i:s',$vo["use_start_date"])); ?></td>
                <?php else: ?>
                  <td>无</td><?php endif; ?>
                
                <?php if($vo['use_end_date'] != 0): ?><td><?php echo (date('Y-m-d H:i:s',$vo["use_end_date"])); ?></td>
                <?php else: ?>
                  <td>无</td><?php endif; ?>
                
                <td><?php echo ($vo['goods_area']); ?></td>
                <td><?php echo ($vo["comment"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
		            <td>
                  <?php if(($vo['send_type'] != 0 ) and ($vo['send_type'] != 3 ) and ($vo['bonus_status'] != 1)): ?><a href="javascript:open_iframe_dialog('<?php echo u('Portal/Sendred/index',array('bonus_id'=>$vo['bonus_id']));?>','发放红包')"> 发放</a> |<?php endif; ?>
		            	<a href="javascript:open_iframe_dialog('<?php echo u('adminBonus/user_bonus',array('bid'=>$vo['bonus_id']));?>','查看用户红包')">查看</a> |
		            	<a href="<?php echo U('AdminBonus/edit',array('bid'=>$vo['bonus_id']));?>" >编辑</a>
		            
					</td>
	          	</tr><?php endforeach; endif; ?>
          </table>
          <div class="pagination"><?php echo ($Page); ?></div>
     
    </div>

</div>
<script src="__ROOT__/statics/js/common.js"></script>
<script>

function refersh_window() {
    var refersh_time = getCookie('refersh_time');
    if (refersh_time == 1) {
        window.location="<?php echo u('AdminPost/index',$formget);?>";
    }
}
setInterval(function(){
	refersh_window();
}, 2000);
$(function () {
	setCookie("refersh_time",0);
    Wind.use('ajaxForm','artDialog','iframeTools', function () {
        //批量移动
        $('#J_Content_remove').click(function (e) {
            var str = 0;
            var id = tag = '';
            $("input[name='ids[]']").each(function () {
                if ($(this).attr('checked')) {
                    str = 1;
                    id += tag + $(this).val();
                    tag = ',';
                }
            });
            if (str == 0) {
				art.dialog.through({
					id:'error',
					icon: 'error',
					content: '您没有勾选信息，无法进行操作！',
					cancelVal: '关闭',
					cancel: true
				});
                return false;
            }
            var $this = $(this);
            art.dialog.open("__ROOT__/index.php?g=portal&m=AdminPost&a=move&ids=" + id, {
                title: "批量移动",
                width:"80%"
            });
        });
    });
});


</script>
</body>
</html>