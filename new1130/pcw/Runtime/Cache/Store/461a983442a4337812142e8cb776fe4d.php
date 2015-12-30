<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<title>商户中心首页</title>
<link href="__TMPL__statics/css/style.css" rel="stylesheet" type="text/css">
<link href="__TMPL__statics/css/reset.css" rel="stylesheet" type="text/css">

<script src="__TMPL__statics/js/jquery.js"></script>
<script src="__TMPL__statics/js/zepto.js"></script>
<script src="__TMPL__statics/js/js.js"></script>
<script src="__TMPL__statics/js/public.js?v=20150610"></script>
<script src="__PUBLIC__/js/web.js?v=20150610"></script>
<script src="__PUBLIC__/js/my97/WdatePicker.js?v=20150625"></script>
<script src="__TMPL__statics/js/layer/layer.js"></script>
<script> var BAO_PUBLIC = '__PUBLIC__';
            var BAO_ROOT = '__ROOT__';</script>
<script>
$(function(){
	$(".sygg_closs").click(function(){
		$(this).parent(".sygg").hide();
	});
});
</script>
</head>

<body>
    <iframe id="baocms_frm" name="baocms_frm" style="display:none;"></iframe>

<script>
	var BAO_PUBLIC = '__PUBLIC__';
	var BAO_ROOT = '__ROOT__';
</script>
<div style="padding-bottom:0.6rem;">

    <div class="sh_login_title">商户中心</div>
    <div class="sh_login_nr">
        <div class="sh_login_int_box i_1 mb15"><span>用户名</span><input class="account" type="text" value="" name="account"></div>
        <div class="sh_login_int_box i_2 mb15"><span>密码</span><input class="password" type="password" value="" name="password"></div>
        <div class="sh_login_yam_box">
            <div class="sh_login_int_box fl"><span>验证码</span><input class="yzm" type="text" value="" name="yzm"></div>
            <div class="fr"><a rel="bao_img_code" class="yzm_code" href="javascript:void(0);"><img id="bao_img_code" src="__ROOT__/index.php?g=app&m=verify&a=index&mt=<?php echo time();?>" width="75" height="36" /></a><em><a rel="bao_img_code" class="yzm_code" href="javascript:void(0);">换一张</a></em></div>
            <div class="clear"></div>
        </div>
        <input class="btn mt30" type="button" value="登录">
    </div>

</div>
<p class="foot_copy">Copyright 2015 Baocms.com</p>
<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		var time = "<?php echo time(); ?>";
		$('.yzm_code').click(function(){
			var l = "__ROOT__/index.php?g=app&m=verify&a=index&mt=";
			time = time + 1;
			$('#bao_img_code').attr('src',l+time);
		})
		
		
		$('.btn').click(function(){
		
			var account = $('.account').val();
			var password = $('.password').val();
			var yzm = $('.yzm').val();
			
			$.post('<?php echo U("passport/login");?>',{account:account,password:password,yzm:yzm},function(result){
				if(result.status == 'success'){
					layer.msg(result.message);
					setTimeout(function(){
						window.location.href=result.backurl;
					},2000);
				}else{
					layer.msg(result.message);
					if(result.backurl){
						setTimeout(function(){
							location.reload();
						},2000);
					}
				}
				
			},'json');
		
		})
		
		
		
	})
</script>
</body>
</html>