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
<div class="wrap jj">
  <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('Brand/index');?>">上海品牌列表</a></li>
      <li><a href="<?php echo U('Brand/add');?>">添加品牌</a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="J_ajaxForm" action="">
      <div class="table_list">
	    <table width="100%" class="table table-hover">
	        <thead>
	          <tr>
	            <th width="100">ID</th>
	            <th>品牌名称</th>
				<th>品牌类型</th>
	            <th>操作</th>
	          </tr>
	        </thead>
	        <tbody>
			<!-- 循环展示品牌 -->
			 
  			<?php if(is_array($list)): foreach($list as $key=>$li): ?><tr>
				<td align="center"><?php echo ($li["brand_id"]); ?></td>
				<td><?php echo ($li["brand_name"]); ?></td>
				<td><?php echo ($li["goods_category_name"]); ?></td>
				<td align="center">
					<!--  <a href="<?php echo U('Brand/add',array('id'=>$li['brand_id']));?>">添加</a>|-->
					<a href="<?php echo U('Brand/edit',array('id'=>$li['brand_id']));?>">编辑</a>|
					<a class="J_ajax_del" href="<?php echo U('Brand/delete',array('id'=>$li['brand_id']));?>">删除</a>
				</td>
				</tr><?php endforeach; endif; ?>
			
				<!--  <?php echo ($brand); ?>-->
			</tbody>
	      </table>
	     <div class="pagination"><?php echo ($page); ?></div>   
  		</div>
    </form>
  </div>
</div>
<script src="__ROOT__/statics/js/common.js?"></script>
</body>
</html>