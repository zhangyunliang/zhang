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
<?php $user_statuses=array("0"=>"已冻结","1"=>"正常","2"=>"未验证") ?>
<div class="wrap jj">
  <div class="common-form">
    <form method="post" class="J_ajaxForm" action="#">
      <div class="table_list">
	    <table class="table table-hover">
	        <thead>
	          <tr>
	            <th align='center'>ID</th>
	            <th>用户名</th>
	            <th>昵称</th>
	            <th>头像</th>
	            <!-- <th>E-mail</th> -->
	            <th>注册时间</th>
	            <th>最后登录时间</th>
	            <!-- <th>最后登录IP</th> -->
	            <th>状态</th>
	            <th align='center'>操作</th>
	          </tr>
	        </thead>
	        <tbody>
	        	<?php if(is_array($lists)): foreach($lists as $key=>$vo): ?><tr>
	            <td align='center'><?php echo ($vo["temp_buyers_id"]); ?></td>
	            <td><?php echo ($vo["temp_buyers_mobile"]); ?></td>
	            <td><?php echo (($vo["nick"])?($vo["nick"]):'未填写'); ?></td>
	            <td>
	            	<?php if($vo['photo'] != '' ): ?><img width="25" height="25" src="<?php echo (NROOT); ?>/Guest/<?php echo ($vo["photo"]); ?>" />
	            		<?php else: endif; ?>
	            </td>
	            <!-- <td><?php echo ($vo["user_email"]); ?></td> -->
	            <td><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
	            <td><?php echo (date('Y-m-d H:i:s',$vo["lastlogin"])); ?></td>
	            <!-- <td><?php echo ($vo["last_login_ip"]); ?></td> -->
	            <td><?php echo ($user_statuses[$vo['is_check']]); ?></td>

	            <td align='center'>
              <?php if(($vo['is_check'] == 0)): ?><font color="#cccccc">冻结</font> |
		            <a href="<?php echo U('indexadmin/cancelban',array('id'=>$vo['temp_buyers_id'],'p'=> $_GET['p']));?>" class="J_ajax_dialog_btn" data-msg="您确定要启用此用户吗？">启用</a>
														<?php elseif(($vo['is_check'] == 1)): ?>
		            <a href="<?php echo U('indexadmin/ban',array('id'=>$vo['temp_buyers_id'],'p'=> $_GET['p']));?>" class="J_ajax_dialog_btn" data-msg="您确定要冻结此用户吗？">冻结</a> |
		            <font color="#cccccc">启用</font><?php endif; ?>
		        		</td>
	          	</tr><?php endforeach; endif; ?>
			</tbody>
	      </table>
	      <div class="pagination"><?php echo ($page); ?></div>
  </div>
    </form>
  </div>
</div>
<script src="__ROOT__/statics/js/common.js"></script>
</body>
</html>