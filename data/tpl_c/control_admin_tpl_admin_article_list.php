<?php keke_tpl_class::checkrefresh('control/admin/tpl/admin_article_list', '1465984240' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    	<h1><?php if($type=='art') { ?><?php echo $_lang['article'];?><?php } elseif($type=='help') { ?><?php echo $_lang['help'];?><?php } else { ?><?php echo $_lang['single_page'];?><?php } ?><?php echo $_lang['manage'];?></h1>
         <div class="tool">
            <a href="index.php?do=<?php echo $do?>&view=list&type=<?php echo $type?>" <?php if($view=='list') { ?>class="here" <?php } ?>><?php if($type=='art') { ?><?php echo $_lang['article'];?><?php } elseif($type=='help') { ?><?php echo $_lang['help'];?><?php } else { ?><?php echo $_lang['single_page'];?><?php } ?><?php echo $_lang['list'];?></a>
            <a href="index.php?do=<?php echo $do?>&view=edit&type=<?php echo $type?>" <?php if($view=='edit') { ?>class="here" <?php } ?>><?php if($type=='art') { ?><?php echo $_lang['article'];?><?php } elseif($type=='help') { ?><?php echo $_lang['help'];?><?php } else { ?><?php echo $_lang['single_page'];?><?php } ?><?php echo $_lang['add'];?></a>
    	</div>
</div>
    <!--页头结束-->

    <!--提示结束-->
     
        <div class="box search p_relative">
    	<div class="title"><h2><?php echo $_lang['search'];?></h2></div>
        <div class="detail" id="detail">
           
    <form action="#" method="get" name="s" id="sl">
            	<input type="hidden" name="do" value="<?php echo $do?>">
<input type="hidden" name="view" value="<?php echo $view?>">
<input type="hidden" name="type" value="<?php echo $type?>">
<input type="hidden" name="page" value="<?php echo $page?>">
 
 
                <table cellspacing="0" cellpadding="0">
<tbody>
                        <tr>
                            <th><?php echo $_lang['author'];?></th>
                            <td><input type="text" value="<?php echo $w['username']?>" name="w[username]" class="txt"/></td>
                            <th><?php echo $_lang['article_title'];?></th>
                            <td colspan="3"><input type="text" value="<?php echo $w['art_title']?>" name="w[art_title]" class="txt"/>*<?php echo $_lang['search_by_like'];?></td>
                            
</tr>
    
                        
                        <tr> 
                            <th><?php echo $_lang['section'];?></th>
                            <td>
                            	<select class="ps vm" name="w[art_cat_id]" id="catid">
                            	<?php if(is_array($cat_arr_list)) { foreach($cat_arr_list as $v) { ?>
<?php echo $v?>
<?php } } ?>

</select>
</td>
<th><?php echo $_lang['order'];?></th>
<td>
                                <select name="ord[]">
                                	<option value="art_id" <?php if($ord['0']=='art_id' or !isset($ord['0'])) { ?> selected="selected"<?php } ?>><?php echo $_lang['default'];?><?php echo $_lang['order'];?></option>
                                	<option value="pub_time" <?php if($ord['0']=='pub_time' ) { ?> selected="selected"<?php } ?>><?php echo $_lang['pub_time'];?></option>
                                </select>
                                <select name="ord[]">
                               		 <option <?php if($ord['1']=='desc' or !isset($ord['1'])) { ?>selected="selected" <?php } ?> value="desc"><?php echo $_lang['desc'];?></option>
                                	<option <?php if($ord['1']=='asc') { ?>selected="selected" <?php } ?> value="asc"><?php echo $_lang['asc'];?></option>
                                </select>
</td> 
                            <th><?php echo $_lang['list_result'];?></th>
                            <td><select name="page_size">
<option value="10" <?php if($page_size=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
<option value="20" <?php if($page_size=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
<option value="30" <?php if($page_size=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
</select>
                              	<button class="pill" type="submit" value="<?php echo $_lang['search'];?>" name="sbt_search">
                            		<span class="icon magnifier"></span><?php echo $_lang['search'];?>
</button>
</td>
                        </tr>
                         
                        
                    </tbody>
                </table>
            </form>

        </div>
    </div>
    <!--搜索结束-->
    
    <div class="box list">
    	<div class="title"><h2><?php if($type=='art') { ?><?php echo $_lang['article'];?><?php } elseif($type=='help') { ?><?php echo $_lang['help'];?><?php } else { ?><?php echo $_lang['single_page'];?><?php } ?><?php echo $_lang['list'];?></h2></div>
        <div class="detail">
        	<form action="" id='frm_list' method="post">
        		<div id="ajax_dom">
        		<input type="hidden" name="page" value="<?php echo $page;?>">
              <table cellpadding="0" cellspacing="0">
                <thead>
                  <tr>
                    <th width="20">ID
</th>
                    <th width="60"><?php echo $_lang['category'];?></th>
                    <th width="25%" ><?php if($type=='art') { ?><?php echo $_lang['article'];?><?php } elseif($type=='help') { ?><?php echo $_lang['help'];?><?php } else { ?><?php echo $_lang['single_page'];?><?php } ?><?php echo $_lang['title'];?></th>
                    <th width="60"><?php echo $_lang['status'];?></th>
                    <th width="60"><?php echo $_lang['pub_name'];?></th>
                    <th width="60"><?php echo $_lang['pub_time'];?></th>
                    <th width="25%"><?php echo $_lang['operate'];?></th>
                  </tr>
  </thead>
                  <tbody>
                  <?php if(is_array($art_arr)) { foreach($art_arr as $key => $value) { ?>
                  <tr class="item">
                  	<td><input type="checkbox" name="ckb[]" value="<?php echo $value['art_id'];?>" class="checkbox"><?php echo $value['art_id'];?></td>
                    <td class="td28 wraphide"><?php echo $art_cat_arr[$value['art_cat_id']]['cat_name'];?></td>
                    <td>
                    	<a href="index.php?do=<?php echo $do;?>&view=edit&art_id=<?php echo $value['art_id'];?>&type=<?php echo $type;?>&page=<?php echo $page;?>" >
<?php echo(kekezu::cutstr($value['art_title'],50)); ?>
<?php if($value['is_recommend']==1) { ?> [<?php echo $_lang['recommend'];?>]<?php } ?>
<?php if($value['art_pic']) { ?> [<?php echo $_lang['img'];?>]<?php } ?>
</a>
</td>
                    <td class="wraphide"><?php if($value['is_show']==1) { ?><?php echo $_lang['default_display'];?><?php } else { ?><font color="red"><?php echo $_lang['recycle'];?></font><?php } ?></td>
                    <td class="wraphide"><?php if($value['username']) { ?><?php echo $value['username'];?><?php } else { ?><?php echo $_lang['anonymous'];?><?php } ?></td>
                    <td class="ws_break"><?php if($value['pub_time']){echo date('Y-m-d',$value['pub_time']); } ?></td>
                    <td>
                    	 
<a href="<?php if($type=='single') { ?>../../index.php?do=single&art_id=<?php echo $value['art_id'];?><?php } elseif($type=='help') { ?>../../index.php?do=help&spid=<?php echo $value['art_cat_id'];?>&page=<?php echo $page;?><?php } else { ?>../../index.php?do=article&view=article_info&art_id=<?php echo $value['art_id'];?>&page=<?php echo $page;?><?php } ?>" target="_blank" class="button"><span class="book icon"></span><?php echo $_lang['view'];?></a> 
<a href="index.php?do=<?php echo $do;?>&view=edit&art_id=<?php echo $value['art_id'];?>&type=<?php echo $type?>&page=<?php echo $page;?>" class="button dbl_target"><span class="pen icon"></span><?php echo $_lang['edit'];?></a>
<a href="<?php echo $url?>&art_id=<?php echo $value['art_id']?>&ac=del&page=<?php echo $page;?>"  onclick="return cdel(this);" class="button"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
</td>
                  </tr>
                  <?php } } ?>
                  </tbody>
  <tfoot>
                  <tr>
                    <td colspan="7">
                    <div class="clearfix">
                  		<input type="checkbox" onclick="checkall(event);" id="checkbox" name="checkbox"/>
                        <label for="checkbox"><?php echo $_lang['select_all'];?></label><!-- 全选 -->
                        <input type="hidden" name="sbt_action" class="sbt_action"/>
<button name="sbt_action" type="submit" value="<?php echo $_lang['mulit_delete'];?>" onclick="return batch_act(this,'frm_list');" class="pill negative"><span class="icon trash"></span><?php echo $_lang['mulit_delete'];?></button>
                        <button  name="sbt_action" type="submit" value="<?php echo $_lang['recycle'];?>" onclick="return batch_act(this,'frm_list');"  class="pill negative"><span class="icon trash"></span><?php echo $_lang['recycle'];?></button>
                    	<button  name="sbt_action" type="submit" value="<?php echo $_lang['recovery_articles'];?> " onclick="return batch_act(this,'frm_list');"  class="positive pill negative"><span class="reload icon"></span><?php echo $_lang['recovery_articles'];?></button>
                    </div>
                    </td>
                  </tr>
                </tfoot>
              </table>
  <div class="page"><?php echo $pages['page'];?></div>
  </div>
        	</form>
        </div>       
    </div>
<!--主体结束-->
<script type="text/javascript">
function createHtml(writedir,filename){
var url = "index.php?do=static&view=update&sbt_edit=1&write_dir="+writedir+"&file_name="+filename;
ajaxDialog(url);
}
 function ajaxDialog(url){
 	 art.dialog({
title: "<?php echo $_lang['static_file_update'];?>",
content: "<?php echo $_lang['start_update_static_file'];?>",
yesFn: function(){
var dia = this;
dia.content("<?php echo $_lang['static_file_update_not_operation'];?>").lock();
$.getJSON(url,function(json){
if(json.status==1){dia.close();
art.dialog({icon: 'succeed',content: json.msg,time:3});
}else{art.dialog.alert(json.msg);}
return false;
})
 return false;
},
noFn :function(){this.close();return false;}
})
 }
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