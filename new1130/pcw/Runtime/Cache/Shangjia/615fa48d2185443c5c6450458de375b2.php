<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link href="__TMPL__statics/css/newstyle.css" rel="stylesheet" type="text/css">
<script> var BAO_PUBLIC = '__PUBLIC__'; var BAO_ROOT = '__ROOT__';
</script>
<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/web.js"></script>
<script src="__PUBLIC__/js/layer/layer.js"></script>
<script>
function psw(el) {
        if (el.value == '密码') {
            el.value = '';
            el.type = 'password';
        }
    }
function txt(el) {
	if (!el.value) {
		el.type = 'text';
		el.value = '密码';
	}
}
</script>
</head>

<body>
<iframe id="baocms_frm" name="baocms_frm" style="display:none;"></iframe>
<div class="login_top">
    <div class="login_topnr">
        <div class="left login_topt">BAOCMS商户管理中心</div>
        <div class="right">
            <ul>
                <li class="left login_topli"><a href="<?php echo U('pchome/index/index');?>">回到首页</a></li>

            </ul>
        </div>
    </div>
</div>
<div class="login_nr">
    <div class="left login_nr_l"><img src="__TMPL__statics/images/loginimg_03.png" /></div>
    <div class="left login_nr_r">
        <div class="radius3 login_intnr">
            <div class="login_t">商家登录</div>
            <div class="login_intBox">
                <form method="post" action="<?php echo U('login/index');?>" target="baocms_frm" >
                <div class="login_intyz">
                    <input type="text" value="支持QQ号/邮箱/手机号登录" onblur="if (!value) { value = defaultValue; this.style.color = '#999' }" onclick="if (value == defaultValue) { value = ''; this.style.color = '#000' }" class="radius3 tuanfabu_int loginintw" name="account" />
                </div>
                <div class="login_intyz">
                    <input type="text" value="密码" name="password" onfocus="psw(this)" onblur="txt(this)" class="radius3 tuanfabu_int loginintw" />
                </div>
                <div class="login_intyz"><input type="text" name="yzm" value="验证码" onblur="if (!value) { value = defaultValue; this.style.color = '#999' }" onclick="if (value == defaultValue) { value = ''; this.style.color = '#000' }" class="radius3 tuanfabu_int loginintw loginintw2" /><span class="login_yzm">
                <a href="#"><img id="bao_img_code" src="__ROOT__/index.php?g=app&m=verify&a=index&mt=<?php echo time();?>" width="75" height="36" /></a>
                </span></div>
                <div class="login_intyz">
                    <input class="radius3 mask_an mask_qd login_dl" type="submit" value="商家登录" />
                </div>
                </form> 
            </div>
        </div>
    </div>
</div>
</body>
</html>