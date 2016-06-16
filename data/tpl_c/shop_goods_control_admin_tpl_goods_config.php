<?php keke_tpl_class::checkrefresh('shop/goods/control/admin/tpl/goods_config', '1465984248' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_K['charset'];?>">
<title>keke admin</title>
</head>

<link href="tpl/css/admin_management.css" rel="stylesheet" type="text/css" />
<link href="../../resource/css/buttons.css" rel="stylesheet" type="text/css" />
<link title="style1" href="tpl/skin/default/style.css" rel="stylesheet" type="text/css" />
<!--<link title="style2" href="tpl/skin/light/style.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript" src="../../resource/js/jquery.js"></script>
<script type="text/javascript" src="../../resource/js/system/keke.js"></script>
<script type="text/javascript" src="../../resource/js/in.js"></script>
</head>
<body class="frame_body">
<div class="frame_content">
<div id="append_parent"></div> 
<div class="page_title">
    	<h1><?php echo $_lang['witkey_goods_config'];?></h1>
        <div class="tool">
            <a href="index.php?do=model&model_id=<?php echo $model_id;?>&view=config&op=config" <?php if($op=="config"||!$op) { ?>class="here"<?php } ?> id="tab_cont_1"><?php echo $_lang['basic_config'];?></a>
            <a href="index.php?do=model&model_id=<?php echo $model_id;?>&view=config&op=control" <?php if($op=="control") { ?>class="here"<?php } ?> id="tab_cont_2"><?php echo $_lang['control_config'];?></a>
          <!--  <a href="index.php?do=model&model_id=<?php echo $model_id;?>&view=config&op=rule" <?php if($op=="rule") { ?>class="here"<?php } ?> id="tab_cont_3"><?php echo $_lang['private_config'];?></a>-->
    	</div>
</div>
<div class="box post" id="div_cont_1" style="display:<?php if($op=='config'||!$op) { ?>block<?php } else { ?>none<?php } ?>">
<div class="tabcon">
    	<div class="title"><h2><?php echo $_lang['task_config'];?></h2></div>
        <div class="detail">
        	<form name="frm_config_employ" action="index.php?do=model&model_id=<?php echo $model_id;?>&view=config" method="post">
        	<input type="hidden" name="pk[model_id]" value="<?php echo $model_id;?>">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                      	 <th scope="row" width="130"><?php echo $_lang['model_name'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
                        <input type="text" value="<?php echo $model_info['model_name']?>" name="fds[model_name]" class="txt" style=" width:260px;"/>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><?php echo $_lang['is_open'];?><?php echo $_lang['zh_mh'];?></th>
                        <td> 
<label><input type="radio" name="fds[model_status]" <?php if($model_info['model_status']) { ?>checked<?php } ?> value="1" id="model_status_0" /> <?php echo $_lang['yes'];?></label>
                            <label><input name="fds[model_status]" type="radio" <?php if(!$model_info['model_status']) { ?>checked<?php } ?> value="0"id="model_status_1" /><?php echo $_lang['no'];?></label>
                        </td>
                      </tr>
                      <tr>
                      
                      </tr>
  <tr>
    <th scope="row" width="200"><?php echo $_lang['model_about'];?><?php echo $_lang['zh_mh'];?></th>
      <td>
         <textarea cols=80 rows=8 name="fds[model_intro]"><?php echo $model_info['model_intro']?></textarea><br>(<?php echo $_lang['limit_50_bytes'];?>)
  </td>
         </tr>
 <tr>
    <th scope="row" width="200"><?php echo $_lang['model_description'];?><?php echo $_lang['zh_mh'];?></th>
      <td>
        <textarea cols=110 rows=12 name="fds[model_desc]"  style="width:75%;" id="tar_content"  class="xheditor {urlBase:'<?php echo $_K['siteurl']?>/',tools:'simple',skin:'nostyle',admin:'../../',html5Upload:false,upImgUrl:'../../index.php?do=ajax&view=upload&file_type=att'}" cols="70"><?php echo $model_info['model_desc']?></textarea>
  </td>
         </tr>
 <?php if($on_time) { ?>
    <tr>
      <th scope="row" width="200"><?php echo $_lang['last_modify'];?><?php echo $_lang['zh_mh'];?></th>
        <td><?php echo date('Y-m-d H:i:s',$on_time) ?></td>
    </tr>
         <?php } ?>					 
                      <tr>
                        <th scope="row"></th>
                        <td>
                            <div class="clearfix padt10">
                                <button class="positive primary pill button" type="submit" name="sbt_edit" value="<?php echo $_lang['submit'];?>"><span class="pen icon"></span><?php echo $_lang['submit'];?></button>
                                <button class="pill button" type="reset" name="rst_edit" value="<?php echo $_lang['return'];?>" onclick="window.history.go(-1)"><span class="uparrow icon"></span><?php echo $_lang['return'];?></button>
                             </div>
                        </td>
                      </tr>
                    </table>
        	</form>
        </div>
   </div>
</div>
<div class="box post" id="div_cont_2" style="display:<?php if($op!='control') { ?>none<?php } else { ?>block<?php } ?>">
<div class="tabcon">
    	<div class="title"><h2><?php echo $_lang['control_config'];?></h2></div>
        <div class="detail">
        	<form name="frm_config_pay" action="index.php?do=model&model_id=<?php echo $model_id;?>&view=config&op=control" method="post" id="frm_config_pay">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
               	  <tr>
                        <th scope="row"><?php echo $_lang['audit_money'];?><?php echo $_lang['zh_mh'];?></th>
                        <td> 
<input type="text" value="<?php echo $audit_cash?>" name="cont[audit_cash]" id="audit_cash" class="txt" style=" width:260px;" maxlength="100" limit="type:int;required:true;len:1-6" msg="<?php echo $_lang['goods_audit_money'];?>" tips="<?php echo $_lang['please_input_goods_aduita_money'];?>" msgArea="audit_cash_msg" class="txt"/><?php echo $_lang['yuan'];?><b style="color:red">*</b>
                    <span id="audit_cash_msg"></span>
 <div class="padt10 direct">
                        <p>
                        	(<?php echo $_lang['money_less_this_need_audit'];?>)
                        </p>
                     </div>
                            
    </td>
                      </tr>
  <tr>
                      	 <th scope="row" width="150"><?php echo $_lang['goods_min_deal_total_money'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
                        <input type="text" value="<?php echo $min_cash?>" name="cont[min_cash]" id="min_account" class="txt" style=" width:260px;" maxlength="100" limit="type:int;required:true;len:1-6" msg="<?php echo $_lang['goods_min_deal_money'];?>" tips="<?php echo $_lang['please_input_min_deal_money'];?>" msgArea="min_account_msg" class="txt"/><?php echo $_lang['yuan'];?><b style="color:red">*</b>
                         <span id="min_account_msg"></span>
  <div class="padt10 direct">
                            <p>
                            	(<?php echo $_lang['zero_is_no_limit'];?>)
                            </p>
                        </div>
    </td>
                  	  </tr>
  <tr>
                        <th scope="row"><?php echo $_lang['goods_royalty_rate'];?><?php echo $_lang['zh_mh'];?></th>
                        <td> 
<input type="text" size="10" name="cont[service_profit]" value="<?php echo $service_profit;?>" limit="type:int;len:1-2;between:1-100" msg="<?php echo $_lang['goods_royalty_rate_msg'];?><?php echo $_lang['zh_mh'];?>1-2" title="<?php echo $_lang['goods_royalty_rate_positive_integer'];?>,1-100" msgArea="goods_rate_msg" class="txt"/>%<span id="goods_rate_msg"></span>
    </td>
                      </tr>
   <tr>
                      	 <th scope="row" width="150"><?php echo $_lang['service_attachment_number_limit'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
                        <input type="text" value="<?php echo $max_filecount;?>" name="cont[max_filecount]" id="max_filecount" size="10" limit="required:true;type:int;between:1-20" msg="<?php echo $_lang['service_attachment_number_can_not_null'];?>" title="<?php echo $_lang['please_input_allow_attachment_number'];?>" msgArea="max_filecount_msg" class="txt"/><?php echo $_lang['counts'];?>
                         <span id="max_filecount_msg"></span>
    </td>
                  </tr>
 
                      <tr>
                        <th scope="row">&nbsp;</th>
                        <td>
                            <div class="clearfix padt10">
                                <button class="positive primary pill button" type="submit" name="sbt_edit" value="<?php echo $_lang['submit'];?>" onclick="return checkForm(document.getElementById('frm_config_pay'))"><span class="pen icon"></span><?php echo $_lang['submit'];?></button>
                          		<button type="reset" name="rst_edit"  class="positive primary pill button"  value="<?php echo $_lang['reset'];?>"/><span class="reload icon"></span><?php echo $_lang['reset'];?></button>
   </div>
                        </td>
                      </tr>
                </table>
        	</form>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../resource/js/artdialog/artDialog.js"></script>
<script type="text/javascript" src="../../resource/js/artdialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="../../resource/js/artdialog/artDialog.iframeTools.source.js"></script>
<script type="text/javascript" src="../../lang/<?php echo $language?>/script/lang.js"></script>
<script type="text/javascript">

In.add('form_and_validation',{path:"../../resource/js/system/form_and_validation.js",type:'js'});
In.add('xheditor',{path:"../../resource/js/xheditor/xheditor.js",type:'js'});
In.add('mousewheel',{path:"tpl/js/jquery.mousewheel.min.js",type:'js'}); 
//In.add('styleswitch',{path:"tpl/js/styleswitch.js",type:'js'});
In.add('table',{path:"tpl/js/table.js",type:'js'});
In.add('calendar',{path:"../../resource/js/system/script_calendar.js"});
In('form_and_validation','xheditor','mousewheel','table','calendar');
 
</script>
 
<script type="text/javascript">
function cdel(o,s){
d = art.dialog;
var c = "<?php echo $_lang['you_comfirm_delete_operate'];?>";
if(s){
c=s;
}
d.confirm(c, function(){
window.location.href = o.href;
});
return false;	
}

function pdel(frm){ 
d = art.dialog;
var frm = frm; 
var c = "<?php echo $_lang['you_comfirm_delete_operate'];?>";  
d.confirm(c, function(){
 	$("#"+frm).submit();
}); 
return false;  
}
function batch_act(obj,frm){ 
d = art.dialog;
var frm = frm; 
var c = $(obj).val(); 
var conf = $(":checkbox[name='ckb[]']:checked").length;
if (conf > 0) {
d.confirm("<?php echo $_lang['confirm'];?>" + c + '?', function(){
$(".sbt_action").val(c);
$("#" + frm).submit();
});
}else{
d.alert("<?php echo $_lang['has_none_being_choose'];?>");
}
return false;  
}
</script> 
<?php if(KEKE_DEBUG) { ?>
<div style="background-color:red;color:#fff;width:400px;text-align:center;">
querys: <?php echo db_factory::create()->get_query_num() ?>
 &nbsp;
times:<?php echo kekezu::execute_time() ?>
</div>

<?php } ?>
</body>
</html><?php keke_tpl_class::ob_out();?>