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
<?php $user_statuses=array("0"=>"审核中...","1"=>"通过","2"=>"拒绝") ?>
<div class="wrap jj">
  <div class="common-form">
    <form method="post" class="J_ajaxForm" action="#">
      <div class="table_list">
	    <table class="table table-hover">
	        <thead>
	          <tr>
	            <th align='center'>ID</th>
	            <!-- <th>来源</th> -->
	            <th>公司名称</th>
          	 <!--<th>公司介绍</th>
          	 <th>供应商地址</th>
          	 <th>供应商电话</th>
          	 <th>供应商邮件</th> -->
	            <th>供应商手机号</th>
	            <th>供应商联系人</th>
	            <!-- <th>供应商营业执照</th>
	            <th>邮编</th> -->
							<th>品材网负责人</th>
							<th>负责人联系方式</th>
	            <th>状态</th>
	            <th>拒绝理由</th>
	            <th>最后编辑管理员</th>
	            <th>编辑时间</th>
	            <th>添加时间</th>
	            <th align='center'>操作</th>
	          </tr>
	        </thead>
	        <tbody>

            <?php if(is_array($lists)): foreach($lists as $key=>$vo): ?><tr>
              <td align='center'><?php echo ($vo["suppliers_id"]); ?></td>
              <td><?php echo ($vo["suppliers_name"]); ?></td>
              <td><?php echo (($vo["suppliers_mobile"])?($vo["suppliers_mobile"]):'无'); ?></td>
              <td><?php echo (($vo["suppliers_person"])?($vo["suppliers_person"]):'无'); ?></td>

              <td><?php echo ($vo["pcwperson"]); ?></td>
              <td><?php echo ($vo["pcwmobile"]); ?></td>
              <td><?php echo ($user_statuses[$vo['is_check']]); ?></td>
              <td><?php echo (($vo["reason"])?($vo["reason"]):'无'); ?></td>
              <td><?php echo ($vo["user_nicename"]); ?></td>
              <td><?php echo (date('Y-m-d H:i:s',$vo["user_time"])); ?></td>
              <td><?php echo (date('Y-m-d H:i:s',$vo['add_time'])); ?></td>

              <td align='center'>
              <a href="javascript:open_iframe_dialog('<?php echo U('Oauthadmin/suppliersinfo',array('id'=>$vo['suppliers_id']));?>','查看供应商详情');">查看</a> |
                 <?php if($vo['is_check'] == 1): ?><font color="#cccccc">通过</font> |
                  <?php else: ?>
                <a href="<?php echo U('oauthadmin/pass',array('id'=>$vo['suppliers_id'],'p'=> $_GET['p']));?>" class="J_ajax_dialog_btn" data-msg="您确定要通过此供应商吗？" >通过</a> |<?php endif; ?>
                  <?php if($vo['is_check'] == 2): ?><font color="#cccccc">拒绝</font>
                  <?php else: ?>
                <a href="javascript:open_iframe_dialog('<?php echo U('Oauthadmin/refuse',array('id'=>$vo['suppliers_id'],'p'=> $_GET['p']));?>','拒绝理由');">拒绝</a><?php endif; ?>
            </td>
              </tr><?php endforeach; endif; ?>
			</tbody>
	      </table>
	      <div class="pagination"><?php echo ($page); ?></div>
  </div>
    </form>
  </div>
</div>

<!-- <script src="__ROOT__/statics/js/common.js"></script>
<script type='text/javascript'>
$(function(){
	if(window.name != "bencalie"){
				location.reload();
    window.name = "bencalie";

	}else{
				window.name = "";
	}
});


</script> -->
</body>
</html>