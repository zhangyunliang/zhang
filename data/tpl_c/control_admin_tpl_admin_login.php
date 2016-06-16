<?php keke_tpl_class::checkrefresh('control/admin/tpl/admin_login', '1465984228' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_K['charset'];?>">
<title><?php echo P_NAME;?> <?php echo KEKE_VERSION;?>--<?php echo $_lang['admin_keke_sys'];?></title>
</head>
<link href="tpl/css/admin_management.css" rel="stylesheet" type="text/css" />
<link href="../../resource/css/button/stylesheets/css3buttons.css" rel="stylesheet" type="text/css" />
<link title="style1" href="tpl/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../resource/js/jquery.js"></script>
</head>
<body class="skin">
<!--[if IE 6]><div id="ie6"><![endif]-->
<!--[if IE 7]><div id="ie7"><![endif]-->
<!--[if IE 8]><div id="ie8"><![endif]-->
<div id="append_parent"></div>
<div class="login_box">
<div class="login_con">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="pl">
        	<div>
                <div>
                  <h1><img src="tpl/img/logo.png" alt="<?php echo $_lang['keke_professional_witkey_system'];?>" title="<?php echo $_lang['keke_professional_witkey_system'];?>"/><?php echo $_lang['system_manage'];?></h1>
                </div>
                <div>
                  <p>Powered by KPPW2.0 &copy;2010 <?php echo $_lang['keke_info_technology_company'];?></p>
                </div>
          	</div>
        </td>
        <td class="pr">
        	<div>
            <form action="index.php?do=<?php echo $do?>" method="post" id="admin_login">
            <input type="hidden" name="token" id="token" value="<?php echo FORMHASH;?>"/>
            <input  type="hidden" name="allow_time" id="allow_num" value="<?php echo $allow_times;?>"/>
            <p>
             	&nbsp;<span id="try_info"></span>
 </p>
              <p class="logintitle"><?php echo $_lang['username'];?>: </p>
              <p class="loginform">
                <input name="username" type="text" id="txt_username" class="txt"  limit="required:true" msg="<?php echo $_lang['username_can_not_null'];?>" title="<?php echo $_lang['please_input_right_login_username'];?>" msgArea="try_info"/>
              </p>
              <p class="logintitle"><?php echo $_lang['password'];?>:</p>
              <p class="loginform">
                <input name="password" type="password" id="pwd_pwd" class="txt"   limit="required:true" msg="<?php echo $_lang['password_can_not_null'];?>" title="<?php echo $_lang['please_input_right_login_password'];?>" msgArea="try_info"/>
              </p>
              <p class="loginbtn">
              	
                <button  type="submit" id="logsubmit" name="login" onclick=" return check_login();"><span class="icon key">&nbsp;</span><?php echo $_lang['submit'];?></button>
                <button id="re" type="reset" name="reset"><span class="icon reload">&nbsp;</span><?php echo $_lang['reset'];?></button>	
              </p>
            </form>
          </div>
          </td>
      </tr>
    </table>
  </div>
</div>
<!--[if IE 6]></div><![endif]-->
<!--[if IE 7]></div><![endif]-->
<!--[if IE 8]></div><![endif]-->
<script type="text/javascript">
var remain_times=parseInt(<?php echo $remain_times?>)+0;
$(function(){
$("#txt_username").focus();
lock_screen(remain_times);

})
function check_login(){
var allow_num=$("#allow_num").val();

var i = checkForm(document.getElementById("admin_login"));

if(i){
if(allow_num>0){
var username=$("#txt_username").val();
var password=$("#pwd_pwd").val();
var token=$("#token").val();
$.post("index.php?do=login&is_submit=1&tt="+new Date().getTime(),
{user_name:username,pass_word:password,allow_num:allow_num,token:token},function(json){
if(json.status==1){
location.href="index.php";
}else{
if (json.data.times > 0) {
$("#allow_num").val(json.data.times);
$("#try_info").html(json.msg + "<?php echo $_lang['you_have'];?>" + json.data.times + "<?php echo $_lang['times_try_chance'];?>");
$("#token").val(json.data.formhash);
}
if (json.data.times == 0) {
location.href='index.php';
}
return false;
}
},'json')
}
 }
return false;

}


function lock_screen(remain_times){
if (remain_times > 0) {
art.dialog({
title: "<?php echo $_lang['screen_lock_status'];?>",
width: 675,
height: 130,
lock: true,
fixed: true,
resize: false,
drag: false,
content: "<?php echo $_lang['login_fail_notice'];?>",
noFn: function(){
return false;
},
noText: ''

});
}
}

</script>
<script type="text/javascript" src="../../resource/js/system/form_and_validation.js"></script>
 
<?php if($remain_times>0) { ?>
<script type="text/javascript" src="tpl/js/artDialog.min.js"></script>
<?php } ?>
 
 
</body>
</html><?php keke_tpl_class::ob_out();?>