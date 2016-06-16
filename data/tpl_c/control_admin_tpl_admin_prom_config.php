<?php keke_tpl_class::checkrefresh('control/admin/tpl/admin_prom_config', '1465984261' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <h1><?php echo $_lang['prom_config_manage'];?></h1>
    <div class="tool">
        <a <?php if($op=="config"||!$op) { ?>class="here"<?php } ?> href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&op=config"><?php echo $_lang['register_prom'];?></a>
        <a <?php if($op=="pub_task") { ?>class="here"<?php } ?> href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&op=pub_task"><?php echo $_lang['task_prom'];?></a>
        <a <?php if($op=="bid_task") { ?>class="here"<?php } ?> href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&op=bid_task"><?php echo $_lang['bid_prom'];?></a>
        <a <?php if($op=="service") { ?>class="here"<?php } ?> href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&op=service"><?php echo $_lang['goods_prom'];?></a>
    </div>
</div> 
<?php if($op=='config'||!$op) { ?>
<div>
    <div class="box tip clearfix p_relative">
        <div class="control">
            <a href="javascript:void(0);" title="<?php echo $_lang['close'];?>"><b>&times;</b></a>
        </div>
        <div class="title">
            <h2><?php echo $_lang['tips'];?></h2>
        </div>
        <div class="detail pad10">
            <ul>
            	<li><?php echo $_lang['prom_config_notice'];?><?php echo $_lang['zh_jh'];?></li>
<li><?php echo $_lang['register_prom_must_one_auth'];?><?php echo $_lang['zh_jh'];?></li>
</ul>
        </div>
    </div>
    <div class="box post">
        <div class="tabcon">
            <div class="title">
                <h2><?php echo $_lang['register_prom'];?></h2>
            </div>
            <div class="detail">
                <form name="frm_config_basic" id="frm_config_basic" action="<?php echo $url;?>" method="post">
                    <input type="hidden" name="op" value="<?php echo $op;?>">
                    <input type="hidden" name="prom_id" value="<?php echo $reg_config['prom_id'];?>">
<input type="hidden" name="open_status" value="<?php echo $reg_config['is_open'];?>"><!-- 开启状态 -->
<div class="gut">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr><th scope="row">
                                    <?php echo $_lang['is_open_global_prom'];?><?php echo $_lang['zh_mh'];?>
                                </th><td>
                                 
                        	       <label for="prom_open"><input type="radio" id="prom_open"  name="prom_reg_is_open" value='1' <?php if($global_config['prom_open']['v']==1) { ?>checked="checked"<?php } ?>><?php echo $_lang['open_prom'];?></label>
                                   <label for="prom_close"><input type="radio" id="prom_close" name="prom_reg_is_open" value='0' <?php if($global_config['prom_open']['v']==0) { ?>checked="checked"<?php } ?>><?php echo $_lang['closed_prom'];?></label>
                                   (<?php echo $_lang['this_set_global_effective'];?>)
                                </td></tr>
                            <tr>
                            	<th scope="row"><?php echo $_lang['prom_period'];?><?php echo $_lang['zh_mh'];?></th>
                            		<td><input type="text" name="prom_period" class="txt" size="5" value="<?php echo $global_config['prom_period']['v'];?>" /><?php echo $_lang['day'];?>  (<?php echo $_lang['prom_upline_proift_notice'];?>)</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                  <?php echo $_lang['prom_reward'];?><?php echo $_lang['zh_mh'];?>
                                </th>
                                <td>
                                	<p id="effect_mode"><!-- 生效模式 -->
                                    <label>
                                    	<?php echo $_lang['register_and_pass'];?>
<select name="allow_prom_reg" id="allow_prom_reg">
<?php if(is_array($auth_info)) { foreach($auth_info as $k => $v) { ?>
<option value='<?php echo $k;?>' <?php if($auth_step==$k) { ?>selected<?php } ?> cash="<?php echo $v['cash'];?>" credit="<?php echo $v['credit'];?>"><?php echo $v['prom_item'];?></option>
<?php } } ?>
</select>
<?php echo $_lang['after_auth_promoter_will_get'];?>
                                    	<input type="text" size=5 name="prom_cash" class="txt" id="prom_cash"><?php echo $_lang['yuan_cash'];?>，
<input type="text" size=5 name="prom_credit" class="txt" id="prom_credit"><?php echo $_lang['yuan_cash_coupon'];?><?php echo $_lang['zh_jh'];?>
</label>
</p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    &nbsp;
                                </th>
                                <td>
                                    <button type="submit" name="sbt_edit" class="positive pill primary  button" value="<?php echo $_lang['submit'];?>"><span class="icon check"></span>
                                        <?php echo $_lang['submit'];?>
                                    </button>
                                    <button type="button" name="sbt_edit" class="primary pill button" value="<?php echo $_lang['return'];?>" onclick="go_back();"><span class="icon uparrow"></span>
                                        <?php echo $_lang['return'];?>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php } else { ?>
    <div>
        <div class="box tip clearfix p_relative">
            <div class="control">
                <a href="javascript:void(0);" title="<?php echo $_lang['close'];?>"><b>&times;</b></a>
            </div>
            <div class="title">
                <h2><?php echo $_lang['tips'];?></h2>
            </div>
            <div class="detail pad10">
                <ul>
                    <li>
                    	<?php if($op=='pub_task') { ?>
                     	   <?php echo $_lang['task_prom_notice'];?><?php echo $_lang['zh_jh'];?>
<?php } elseif($op=='bid_task') { ?>
<?php echo $_lang['bid_prom_notice'];?>
<?php } elseif($op=='service') { ?>
<?php echo $_lang['goods_prom_notice'];?>
<?php } ?>
                    </li>
                </ul>
            </div>
        </div>
  <div class="box post">
    <div class="tabcon">
      <div class="title">
        <h2>
           <?php if($op=='pub_task') { ?>
<?php echo $_lang['task_prom'];?>
   <?php } elseif($op=='bid_task') { ?>
<?php echo $_lang['bid_prom'];?>
  <?php } elseif($op=='service') { ?>
<?php echo $_lang['goods_prom'];?>
  <?php } ?>
</h2>
      </div>
      <div class="detail">
       <form name="frm_config_basic" id="frm_config_basic" action="<?php echo $url;?>" method="post">
         <input type="hidden" name="op" value="<?php echo $op;?>">
            <div class="gut">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                    <th scope="row"><input type="hidden" name="pub_task" value="1"><font style="text-align:right"><?php echo $_lang['binding_specified_industry'];?><?php echo $_lang['zh_mh'];?></font></th>
                      <td>
                         	<?php echo $_lang['default_for_all_industry'];?><br/><!-- 
                               <input type="checkbox" name="ckb_indus" value="1"<?php if($prom_config['indus']==1) { ?>checked="checked"<?php } ?>>绑定行业 -->
                           		<?php $milist=explode(",",$prom_config['indus_string']); ?>
   		<input type="hidden" name="hdn_indus_id" id="hdn_indus_id" value="<?php echo $milist['0'];?>">
    	<select onchange="p_indus_add(this.value)" name="indus_p_id" style="margin-bottom:5px;">
                        			<option value=""><?php echo $_lang['choose_industry'];?></option>
<?php if(is_array($indus_index['0'])) { foreach($indus_index['0'] as $indus) { ?>
<option value="<?php echo $indus['indus_id']?>" <?php if($milist['0']==$indus['indus_id']) { ?>selected="selected"<?php } ?>><?php echo $indus['indus_name']?></option>
<?php } } ?>
</select>
                        	    <br class="clear">
<select name="p_indus_select" id="p_indus_select" multiple="multiple" style="width:160px;float:left;height:200px;overflow-y:scroll;background:white;border:#ccc solid 1px" >
</select>

    <div style="width:80px;float:left;height:160px;overflow:hidden;margin-left:20px; text-align:center;padding-top:40px;">
<button onclick = "moveitems()" type="button" class="input_but"><<</button><br><br>
<button onclick = "additems()" type="button" class="input_but">>></button><br>
</div>
<select name="s_indus_select[]" id="s_indus_select" multiple="multiple" style="width:160px;float:left;height:200px;overflow-y:scroll;background:white;border:#ccc solid 1px;margin-left:20px;">
          <?php if(is_array($milist)) { foreach($milist as $k => $m) { ?>
<?php if($m&&$k>0) { ?><option id="s_indus_select_op_<?php echo $m;?>" value="<?php echo $m?>" selected="selected"><?php echo $indus_arr[$m]['indus_name']?></option><?php } ?>
  <?php } } ?>
</select>
<br class="clear">
<script type="text/javascript">
function p_indus_add(id){
mod = "";
<?php if(is_array($indus_index)) { foreach($indus_index as $k => $si) { ?>
if(id=='<?php echo $k?>'){
<?php if(is_array($si)) { foreach($si as $i) { ?>
if(!$('#s_indus_select_op_<?php echo $i['indus_id'];?>').val()){
mod +="<option id=\"p_indus_select_op_<?php echo $i['indus_id'];?>\" value=\"<?php echo $i['indus_id'];?>\"><?php echo $i['indus_name'];?></option>";
}
<?php } } ?>
}
<?php } } ?>
$('#p_indus_select').html(mod);
}
$(function(){
if($("#hdn_indus_id").val()!=''){
p_indus_add($("#hdn_indus_id").val());
}
$("#effect_mode label :radio").bind("click",function(){
//$(this).parent().css("border","1px solid red").siblings("label").css("border","1px solid white");
$(this).siblings().removeAttr("disabled");
$("#effect_mode label").not($($(this).parent())).children(":text").attr("disabled","disabled");//添加disabled属性
})

})
function moveitems(){
vs = $('#s_indus_select').val()+'';
vs = vs.split(",");
var mod = '';
for(i=0;i<vs.length;i++){
if(String(vs[i]) == "null"){
continue;
}
mod+="<option value="+vs[i]+" id=\"p_indus_select_op_"+vs[i]+"\">"+$('#s_indus_select_op_'+vs[i]).html()+"</option>";
$('#s_indus_select_op_'+vs[i]).remove();
}
if(mod!='')
$('#p_indus_select').append(mod);
}

function additems(){
vs = $('#p_indus_select').val()+'';
    vs = vs.split(",");
var mod = '';
    for(i=0;i<vs.length;i++){
if(String(vs[i]) == "null"){
continue;
}
mod+="<option value="+vs[i]+" id=\"s_indus_select_op_"+vs[i]+"\" selected=\"selected\">"+$('#p_indus_select_op_'+vs[i]).html()+"</option>";

$('#p_indus_select_op_'+vs[i]).remove();
}
if(mod!='')
$('#s_indus_select').append(mod);
}

</script>
                   </td>
                </tr>                           
                 <tr>
                    <th><font style="text-align:right"><?php echo $_lang['specified_task_model'];?></font></th>
                       <td><?php echo $_lang['only_specified_will_be_prom'];?><br/>
                         <?php if(is_array($model_info)) { foreach($model_info as $k => $v) { ?>
<?php if($v['model_type']==$model_type) { ?>
<label for="model_<?php echo $k;?>"><input type="checkbox" id="model_<?php echo $k;?>" name="ckb_model[]" value="<?php echo $v['model_id']?>" <?php if(FALSE!==strpos($prom_config['model'],$v['model_id'])) { ?>checked="checked"<?php } ?>>
                            		<?php echo $_lang['limit'];?><?php echo $v['model_name'];?></label><br>
<?php } ?>
                         <?php } } ?>
                       </td>
</tr>
           <?php if($op=='pub_task') { ?>
<tr>
<th><font><?php echo $_lang['task_release_prommoter_proift'];?></font></th>
<td>
<?php echo $_lang['task_release_prom_profit_model'];?><br/>
<label id="pub_task_rake_type"><input type="radio" id="pub_task_rake_type"  name="pub_task_rake_type" value="1" <?php if($prom_config['pub_task_rake_type']==1) { ?>checked="checked"<?php } ?>><?php echo $_lang['according_to_fixed_money'];?></label><font color="red"><?php echo $_lang['according_to_task_reward_rate_tip'];?></font>
<div id="pub_task_rake_type_child">
<input type="text" size="5" class="txt" name="pub_task_cash" id="pub_task_cash" value="<?php echo $prom_config['cash'];?>" /><?php echo $_lang['cash'];?>
<input type="text" size="5" class="txt" name="pub_task_credit" id="pub_task_credit" value="<?php echo $prom_config['credit'];?>" /><?php echo $_lang['cash_coupon'];?></div>

<label id="rake_type2"><input type="radio" id="rake_type2" name="pub_task_rake_type" value="2" <?php if($prom_config['pub_task_rake_type']==2) { ?>checked="checked"<?php } ?>><?php echo $_lang['according_to_task_reward_rate'];?></label><br/>
<input type="text" size="5" class="txt" name="pub_task_rate" id="pub_task_rate" value="<?php echo $prom_config['rate'];?>">%
   </td>
</tr>
   <?php } elseif($op=='bid_task') { ?>
<tr><th><font><?php echo $_lang['undertake_task_prom_proift'];?></font></th>
<td>
<input type="text" size="5" class="txt" name="bid_task_rake" id="bid_task_rake" value="<?php echo $prom_config['rate'];?>" />%
(<?php echo $_lang['from_withdraw_to_promoter_rate'];?>)
</td>
</tr>
  <?php } elseif($op=='service') { ?>
 <tr>
                    <th scope="row">
                       <?php echo $_lang['goods_prom_proift'];?>
                    </th>
                    <td>
                        <input type="text" size="15" class="txt" name="service_rate" value="<?php echo $prom_config['rate'];?>" maxlength="5" />%
                          (<?php echo $_lang['website_withdraw_to_promoter_notice'];?>)
                    </td>
               </tr>
  <?php } ?>
                <tr>
                   <th scope="row"> &nbsp;</th>
                  <td>
                     <button type="submit" name="sbt_edit" class="positive primary pill button"><span class="icon check"></span>
                        <?php echo $_lang['submit'];?>
                    </button>
                    <button type="button" name="sbt_edit" class="primary pill button" onclick="to_back();"><span class="icon uparrow"></span>
                        <?php echo $_lang['return'];?>
                    </button>
                  </td>
                </tr>
             </table>
           </div>
        </form>
      </div>
   </div>
  </div>
 </div>
<?php } ?>	 
 <script type="text/javascript">
<!--
$(function(){
$(".control").add(".title").click(function(){
$(".tip").children().not($(".control,.title")).slideToggle('200');
});
 	var optif = $("#allow_prom_reg option:selected");
$("#prom_cash").val(optif.attr("cash"));
$("#prom_credit").val(optif.attr("credit"));
})
 $("#allow_prom_reg").change(function(){
 	var opti = $("#allow_prom_reg option:selected");
$("#prom_cash").val(opti.attr("cash"));
$("#prom_credit").val(opti.attr("credit"));
 })
//-->
</script> 
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
</html>
<?php keke_tpl_class::ob_out();?>