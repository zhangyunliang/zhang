<?php keke_tpl_class::checkrefresh('shop/goods/control/admin/tpl/goods_list', '1465984249' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    	<h1><?php echo $_lang['witkey_goods'];?></h1>
        <div class="tool">              
           <a href="index.php?do=<?php echo $do;?>&model_id=<?php echo $model_id;?>&view=order"><?php echo $_lang['order_manage'];?></a>
   <a href="index.php?do=<?php echo $do;?>&model_id=<?php echo $model_id;?>&view=list" class="here" ><?php echo $_lang['goods_list'];?></a>  
        </div>
</div>
<!--页头结束-->

<!--提示结束-->

<div class="box search p_relative">
    	<div class="title"><h2><?php echo $_lang['search'];?></h2></div>
    	<div class="detail" id="detail"> 
<form method="post" action="index.php?do=<?php echo $do;?>&model_id=<?php echo $model_id;?>&view=<?php echo $view;?>" id="frm_art_search">
<input type="hidden" name="page" value="<?php echo $page;?>">
    		<table cellspacing="0" cellpadding="0">    		
<tbody>
<tr>
<th><?php echo $_lang['goods_id'];?></th>
                <td><input type="text" class="txt" name="w['service_id']" id="service_id" value="<?php echo $w['service_id']?>" onkeyup="clearstr(this);"  ></td>
                <th><?php echo $_lang['goods_name'];?></th>
                <td>
                <input type="text" class="txt" name='w['title']' id="title" value="<?php echo $w['title']?>">
</td>
<th><?php echo $_lang['shopkeeper'];?></th>
<td>
<input type="text" class="txt" name="w['username']" id="username" value="<?php echo $w['username']?>" tips="">
</td>
</tr>
<tr>
<th><?php echo $_lang['goods_status'];?></th>
<td>
 <select name="w['service_status']">
 	<option value=""><?php echo $_lang['goods_status'];?></option>
<?php if(is_array($status_arr)) { foreach($status_arr as $k => $v) { ?>
<option <?php if($w['service_status']==$k) { ?>selected="selected" <?php } ?>  value="<?php echo $k;?>"><?php echo $v;?></option>
<?php } } ?>
             			 </select>
 </td>
<th><?php echo $_lang['result_order'];?></th>
<td>							
 <select name="ord">
                     		 	 <option <?php if($ord=='service_id desc' or !isset($ord['1'])) { ?>selected="selected" <?php } ?>  value="service_id desc">ID<?php echo $_lang['desc'];?></option>
                     		 	 <option <?php if($ord=='service_id asc') { ?> selected="selected" <?php } ?>  value="service_id asc">ID<?php echo $_lang['asc'];?></option>
                     		 </select>	           				
</td>
<th><?php echo $_lang['result_show'];?></th>
<td colspan="3">
<select name="w['page_size']">
                			<option value="10" <?php if($w['page_size']=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
                			<option value="20" <?php if($w['page_size']=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
                			<option value="30" <?php if($w['page_size']=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
            			</select>
<button class="pill" type="submit" value="<?php echo $_lang['search'];?>" name="sbt_search"><span class="icon magnifier">&nbsp;</span><?php echo $_lang['search'];?></button>
</td>
</tr>          			
           		</tbody>
</table>
</form>
    	</div>
    </div>
<!--搜索结束-->

<div class="box list">	
    <div class="title"><h2><?php echo $_lang['goods_list'];?></h2></div>
    <div class="detail"> 
<form action="" method="post" id="frm_list">
<input type="hidden" name="w[page_size]" value="<?php echo $page_size;?>">
<div id="ajax_dom">
<input type="hidden" name="page" value="<?php echo $page;?>">
    	<table cellpadding="0" cellspacing="0">
    		<tbody>
        	<tr>
        		<th width="8%">ID</th>
           		<th width="25%"><?php echo $_lang['goods_name'];?></th>
           		<th width="10%"><?php echo $_lang['quotation_yuan_unit'];?></th>
<th width="8%"><?php echo $_lang['shopkeeper'];?></th>
                <th width="8%"><?php echo $_lang['location'];?></th>                
<th width="10%"><?php echo $_lang['goods_status'];?></th>				
                <th width="17%"><?php echo $_lang['operate'];?></th>
            </tr>

            <?php if(is_array($goods_arr)) { foreach($goods_arr as $k => $v) { ?>
            <tr class="item">
            	<td><input type="checkbox" name="ckb[]" value="<?php echo $v['service_id'];?>"><?php echo $v['service_id'];?></td>
                <td><a target="_blank" href="<?php echo $_K['siteurl'];?>/index.php?do=service&sid=<?php echo $v['service_id'];?>">
                	<?php echo kekezu::cutstr($v['title'],44) ?></a></td>
                <td><?php if($v['price']) { ?><?php echo $v['price'];?> / <?php echo $v['unite_price']?><?php } else { ?><?php echo $_lang['no_quotation'];?><?php } ?></td>
<td><?php echo $v['username'];?></td>                 
                <td><?php echo $v['area_range'];?></td>
                <td><?php echo $goods_status_arr[$v['service_status']];?></td>				
                <td>
<a href="index.php?do=<?php echo $do?>&model_id=<?php echo $model_id?>&view=edit&service_id=<?php echo $v['service_id']?>&page=<?php echo $page;?>" class="button dbl_target"><span class="pen icon"></span><?php echo $_lang['edit'];?></a>
<a href="<?php echo $url_str;?>&ac=del&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>"  onclick="return cdel(this);" class="button"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
<?php if($v['service_status']==1) { ?>
<a href="<?php echo $url_str;?>&ac=pass&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>" onclick="return  cdel(this,'<?php echo $_lang['confirm_pass_audit'];?>');" class="button"><span class="check icon"></span><?php echo $_lang['audit'];?></a>
<?php } ?>
<?php if($v['service_status']!=4) { ?>
<a href="<?php echo $url_str;?>&ac=disable&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>" onclick="return cdel(this,'<?php echo $_lang['confirm_disable'];?>');" class="button"><span class="lock icon"></span><?php echo $_lang['disable'];?></a>
<?php } ?>
<?php if($v['service_status']==4) { ?>
<a href="<?php echo $url_str;?>&ac=use&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>"  onclick="return cdel(this,'<?php echo $_lang['confirm_open'];?>');" class="button"><span class="check icon"></span><?php echo $_lang['use'];?></a>
<?php } ?>
</td>
            </tr>
            <?php } } ?> 
          
          	<tr>
            	<td colspan="10">
                    <div class="page fl_right"><?php echo $pages['page'];?></div>
                    <div class="clearfix">
                  		<input type="checkbox" class="checkbox" id="checkbox" onclick="checkall();"/>
                        <label for="checkbox"><?php echo $_lang['select_all'];?></label>
                        <input type="hidden" name="sbt_action" class="sbt_action" />
<button class="pill negative" type="submit" value="<?php echo $_lang['mulit_delete'];?>" onclick="return batch_act(this,'frm_list');"><span class="icon trash">&nbsp;</span><?php echo $_lang['mulit_delete'];?></button>                        
                        <button class="pill negative" type="submit" value="<?php echo $_lang['mulit_pass'];?>" onclick="return batch_act(this,'frm_list');" ><span class="icon check">&nbsp;</span><?php echo $_lang['mulit_pass'];?></button>
<button class="pill negative" type="submit" value="<?php echo $_lang['mulit_disable'];?>" onclick="return batch_act(this,'frm_list');"><span class="icon lock">&nbsp;</span><?php echo $_lang['mulit_disable'];?></button>
<button class="pill negative" type="submit" value="<?php echo $_lang['mulit_use'];?>" onclick="return batch_act(this,'frm_list');" ><span class="icon unlock">&nbsp;</span><?php echo $_lang['mulit_use'];?></button>
</div>
                 </td>
        	</tr>
 </tbody>
        </table></div>
     </form>   
    </div> 
</div> 
<!--主体结束-->

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