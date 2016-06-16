<?php keke_tpl_class::checkrefresh('control/admin/tpl/admin_index', '1465984232' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_K['charset'];?>">
<title><?php echo P_NAME;?> <?php echo KEKE_VERSION;?>--<?php echo $_lang['admin_keke_sys'];?></title>
<link rel="shortcut icon" href="../../resource/img/system/logo.ico" />
<link rel="apple-touch-icon" href="../../resource/img/system/logo.ico"/>
<link href="tpl/css/admin_management.css" rel="stylesheet" type="text/css" />
<link href="../../resource/css/button/stylesheets/css3buttons.css" rel="stylesheet" type="text/css" />
<link title="style1" href="tpl/skin/default/style.css" rel="stylesheet" type="text/css" />
<!--<link title="style2" href="tpl/skin/light/style.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript" src="../../resource/js/jquery.js"></script>
</head>

<body class="skin" scroll="no">
<!--[if IE 6]><div id="ie6"><![endif]-->
<!--[if IE 7]><div id="ie7"><![endif]-->
<!--[if IE 8]><div id="ie8"><![endif]-->
<div id="append_parent"></div>
<div id="ajaxwaitid" style="display:none">
<div>
        	<img src="../../resource/img/system/loading.gif" alt="loading"/>
<?php echo $_lang['request_processing'];?>
</div>
</div>
<div class="login_box">
<div class="header">
<div class="logo">
<h1><img src="tpl/img/logo.png" alt="<?php echo $_lang['admin_keke_sys'];?>" title="<?php echo $_lang['admin_keke_sys'];?>"/></h1>
    </div>

    <div class="nav" id="nav_div">
    	<ul>
    		<!--����һ���˵� start-->
<li><a href="#" rel="shortcuts"class="select"><?php echo $_lang['faster_operate'];?></a></li>
    		<?php if(is_array($menu_arr)) { foreach($menu_arr as $k => $v) { ?>
<li><a href="#" rel="<?php echo $k;?>"><?php echo $v;?></a></li>
<?php } } ?>    		
<!--����һ���˵� end-->
        </ul>
    </div> 
<div class="arrow" id="show_much">
<a href="#" id="a_show_more" class="show_hide" style="display:none">��</a>
<div class="hide_nav">
<ul>
<?php if(is_array($menu_arr)) { foreach($menu_arr as $k => $v) { ?>
<li><a href="index.php?do=<?php echo $k?>" rel="<?php echo $k;?>"><?php echo $v;?></a></li>
<?php } } ?>
</ul> 
</div>
</div>
   <script type="text/javascript">
    	$(function (){
show_a();
$("body,iframe").click(function(){
$(".hide_nav").hide();
});

  $(window).resize(function() { 
  				show_a();
});

$('#show_much').click(function(e){
   			$('.hide_nav').toggle();
e.stopPropagation();
return false;
         });


})
 
  function show_a(){
  	
var nav_width = $("#nav_div").width();

if(nav_width<558){ 
$("#a_show_more").show();
$("#show_much").show();

}else{

$("#a_show_more").hide();
$("#show_much").hide(); 
}		 
  }
 
    </script>

    
    <div class="user_box">
    	<div class="avatar">
        	<a href="#" title="admin"><?php echo  keke_user_class::get_user_pic($admin_info['uid'],'small') ?></a> </div>
        <div class="name"><?php echo $_lang['hello'];?>��<?php if($admin_info['uid']==ADMIN_UID) { ?><?php echo $_lang['public_admin_uid'];?><?php } else { ?><?php echo $grouplist_arr[$admin_info['group_id']]['groupname']?><?php } ?><b><?php echo $admin_info['username']?></b></div>
        <div class="link_bar">
        	<a href="javascript:;" class="lock" onclick="fresh();" title="<?php echo $_lang['lock'];?>">ˢ��</a> 
         	<a href="javascript:;" class="lock" onclick="del_cache();" title="<?php echo $_lang['lock'];?>">�������</a> 
<a href="javascript:;" class="lock" onclick="lock();" title="<?php echo $_lang['lock'];?>"><?php echo $_lang['lock'];?></a>
            <a href="../../index.php" target="_blank" class="sitehome"><?php echo $_lang['website_home'];?></a>
            <a href="index.php?do=logout" class="exit"><?php echo $_lang['safe_exit'];?></a>        
        </div>
   </div>
</div>

<script>
function del_cache(){
var src = $("#display_frame").attr("src");
$.post('index.php?do=tool&view=cache&sbt_edit=1&ckb_obj_cache=1&ckb_tpl_cache=1&ajax=1',function (json){
if(json.status==1){

artDialog.tips('����ɹ�','1.5');
}


},'json');

 
//$("#display_frame").attr("src","src""&index.php?do=tool&view=cache&sbt_edit=1&ckb_obj_cache=1&ckb_tpl_cache=1");

}
function fresh(){
document.getElementById("display_frame").contentDocument.location.reload(true); 
 
}
window.onload = function(){ 
   
 $("body").ajaxStart(function(){
   $("#ajaxwaitid").fadeIn();
   }).ajaxComplete(function(){
   
   $("#ajaxwaitid").fadeOut();
   })	
 
}
</script>
<div  class="side_bar"> 		
        <div class="side_con">
        <div id="shortcuts" class="menu_bar">
   		<dl>
                  	<dt><i class="arrow_r">&nbsp;</i><?php echo $_lang['faster_operate'];?></dt>
                  <dd>
                        <ul id="ul_kjcz">
                        	
                        	<?php if(is_array($fast_menu_arr)) { foreach($fast_menu_arr as $k => $v) { ?>
                        		<li><a href="<?php echo $v['resource_url'];?>" target="display_frame" <?php if($k==0) { ?>class="select"<?php } ?> r_id="<?php echo $v['resource_id'];?>"><?php echo $v['resource_name'];?></a></li>
<?php } } ?>
</ul>
                  </dd>
                </dl>
       </div>
   
   <?php if(is_array($menu_arr)) { foreach($menu_arr as $k => $v) { ?>
        <div id="<?php echo $k?>" class="menu_bar">
       	   <?php if(is_array($sub_menu_arr[$k])) { foreach($sub_menu_arr[$k] as $kk => $vv) { ?>
   		<dl>
                  	<dt><i class="arrow_r">&nbsp;</i><?php echo $vv['name']?></dt>
                  <dd>
                        <ul >
                        	<?php if(is_array($vv['items'])) { foreach($vv['items'] as $kkk => $vvv) { ?>
<li><a href="<?php echo $vvv['resource_url']?>" target="display_frame" r_id="<?php echo $vvv['resource_id'];?>"><?php echo $vvv['resource_name']?></a></li>
<?php } } ?>
 		                        </ul>
                  </dd>
                </dl>
   <?php } } ?>
       </div>
   <?php } } ?>
             
        </div>

</div>



<div class="tool_box">
<div class="bread">
    <a href="index.php?do=main" target="display_frame"><?php echo $_lang['manage_home'];?></a>
    <span class="font_st">&gt;</span>
    <a href="javascript:void(0)" id="href_title"><?php echo $_lang['faster_operate'];?></a>
    <a href="#" onclick="shortcuts(this);" id="add_shortcuts" ac='add_shortcuts' title="<?php echo $_lang['add_faster_operate'];?>"><span class="font_st">[+]</span></a>
    </div>
    <div class="other">
    		<input type="text" class="txt" name="fds[resource_name]" id="recource"/>
        	<button type="button" class="button ml_mr_5"  onclick="find_nav()"><span class="magnifier icon"></span><?php echo $_lang['search'];?></button>
<button id="map" type="button" class="button" onclick="nav();"><?php echo $_lang['nav_map'];?></button>
    </div>
</div>

<div class="frame_box po_re">	
<iframe id="display_frame" name="display_frame"  scrolling="auto"  src="index.php?do=main" frameborder="0" ></iframe>
</div>
<script type="text/javascript">
/*add shortcuts*/  
function shortcuts(obj){
var fastObj    =$('#shortcuts ul');//��ݵ�������
var sub        =$(".menu_bar a[class='select']:visible");//�˵�����
var r_id       =$(sub).attr('r_id');/*��ȡ�˵����*/
var sub_name   =$(sub).text();//�˵�����
var sub_h      =$(sub).attr('href');//�˵�����
var ac         =$(obj).attr('ac');//����
if(sub.length>0){
$.post("index.php?do=index",
{ac:ac,r_id:r_id},function(json){
if(json.status==4){//�ɹ�
if(ac=='add_shortcuts'){//��ӳɹ�
var li="<li><a href="+sub_h+" target='display_frame' r_id="+r_id+">"+sub_name+"</a>"
+"<span class='arrow_l' style='display:none;'></span></li>";
fastObj.append(li);	
}else if(ac='rm_shortcuts'){//ɾ���ɹ�
if($(".side_bar .side_con #shortcuts").css('display')=='none'){
fastObj.find("a[r_id='"+r_id+"']").parent().remove();//������ҳ��
}else{
sub.removeClass('select').parent().slideUp('1000').remove();//�ڿ���б�ҳ�滬��
}								
}
reset_shortcuts(sub);
artDialog.tips(json.msg,'1.5');//��Ϣ��ʾ
;return false;
}else{
art.dialog.alert(json.msg);return false;
}
},'json')
}else{
art.dialog.alert("<?php echo $_lang['please_choose_add_faster_operate'];?>");return false;
}
}
/*�˵����[+-]����*/
$(".menu_bar a").click(function(){
    var href_title = $(this).html();
$("#href_title").html(href_title);
reset_shortcuts(this);
})
function reset_shortcuts(obj){
var in_short_list='0';//�������ڿ�ݵ�����
var r_id=$(obj).attr('r_id');
var s_cus=$("#shortcuts a[r_id='"+r_id+"']");//��ȡָ����ݶ���
if(s_cus.length>0)	in_short_list='1';//�����Ƿ���ڿ�� 
if(in_short_list=='1'){
$('#add_shortcuts').attr('ac','rm_shortcuts').attr('title',"<?php echo $_lang['delete_faster_operate'];?>").find(".font_st").text('[-]');
}else if(in_short_list=='0'){
$('#add_shortcuts').attr('ac','add_shortcuts').attr('title',"<?php echo $_lang['add_faster_operate'];?>").find(".font_st").text('[+]');
}
}
/*show_map_nav*/
function nav(){
art.dialog.open('index.php?do=nav',{title:"<?php echo $_lang['admin_nav_map'];?>",height:400,width:700});
}	
/**
 * search nav 
 */
function find_nav(){
var keyword=$("#recource").val();
if(keyword){
art.dialog.open('index.php?do=index&ac=nav_search&keyword='+keyword,{title:"<?php echo $_lang['nav_search'];?>",height:'auto',width:'auto'});
}
}
/**lock screen**/
function lock(){
$.post("index.php?do=index&ac=lock");
hidepanel();
showlogin();
}

/**show screen lock**/
$(function(){
var ifLock=parseInt(<?php echo $check_screen_lock?>)+0;
if(ifLock==1){
hidepanel();
showlogin();
}
})
/*show_control_panel*/	
function showpanel(){
var m=$('.side_bar').width();
var f=$('.frame_box').width();
var h=$('.nav').height();
$('.side_bar').animate({left: 0}).show();
$('.frame_box,.tool_box').animate({left: m}).show();
$('.header,.logo,.nav,.user_box').animate({top: 0}).show();
};
/*hide_control_panel*/	
function hidepanel(){
var m=$('.side_bar').width();
var f=$('.frame_box').width();
var h=$('.nav').height();
$('.side_bar').animate({left: -m}).fadeOut();
$('.frame_box,.tool_box').animate({left: f + m}).fadeOut();
$('.header,.logo,.nav,.user_box').animate({top: -h}).fadeOut();
};
/*show_login*/
function showlogin(){
var lock_window=art.dialog.open('index.php?do=index&ac=unlock',
{title:"<?php echo $_lang['lock_status'];?>",
width:320,
height:130,
content: "<?php echo $_lang['enter_lock_status'];?>"
});
}		
$(function() {
var m=$('.side_bar').width();
var f=$('.frame_box').width();
var h=$('.nav').height();

$('.side_bar').css("left",-m);
$('.frame_box,.tool_box').css("left",f + m);
$('.header,.logo,.nav,.user_box').css("top",-h);
 

showpanel();

$('.side_con').width( $('.menu_bar').length * $('.side_bar').width());
$('.side_con').find('.menu_bar').hide().end();
$('.side_con .menu_bar:first-child').show();

$('.menu_bar dl').find('dd').hide().end().find('dt').click(function() {
var answer = $(this).next();
var arrow = $(this).children('i');
if (answer.is(':visible')) {
answer.slideUp();
arrow.removeClass().addClass('arrow_r');
} 
else {
answer.slideDown();
arrow.removeClass().addClass('arrow_b');
}
});

$('.menu_bar dl:first-child').find('dd').slideDown().end().find('dt').children('i').removeClass().addClass('arrow_b').end();

reset_shortcuts($(".menu_bar a[class='select']"));/*�󵼺��˵����[+-]��ʾ��ʽ��ʼ��*/
/*�˵����[+-]��ʾ��ʽ*/
/*+++++��ߵ������+++++*/
$('.menu_bar dl dt').click(function(){

$(this).parent().siblings().find('a').removeClass().children('.arrow_l').remove();
$(this).parent().find('a').removeClass().children('.arrow_l').remove();
//	$(this).siblings().find("a:first").addClass('select').prepend("<span class='arrow_l'><\/span>").end().slideDown();

reset_shortcuts($(this).siblings().find('a:eq(0)'));
})
/*---��ߵ������ end---*/
/*-----�˵����[+-]��ʾ��ʽ end----*/
$('.menu_bar dl dd ul li ').find('a').live("click",function(){

$('.menu_bar dl dd ul li a').removeClass().children('.arrow_l').remove();
$(this).addClass("select").prepend("<span class='arrow_l'><\/span>");
reset_shortcuts(this);
});


$('.nav,.hide_nav').find('a').click(function(){ 
 
var navid = '#'+$(this).attr('rel');
if($(navid).find("li").length==0){
$("#display_frame").attr('src',"index.php?do=main");
return false;
}

$(navid).fadeIn();
$(navid).siblings().hide();
$(this).addClass("select").parent().siblings().children('a').removeClass("select");
var first_sub_menu = $(navid+" dl:first-child  dd  ul:first-child").find('a:eq(0)');
/*++++����������󵼺�����ѡ��++++++*/
$(".side_bar .side_con").find("a").removeClass().children('.arrow_1').remove(); 
 
var length = $(first_sub_menu).find("span").length;
 if(length<1){
 		$(first_sub_menu).addClass('select').prepend("<span class='arrow_l'><\/span>");
 }
$(first_sub_menu).addClass('select');
reset_shortcuts(first_sub_menu);//�󵼺���ǰѡ������[+-]��ʾ��ʽ����
/*---����������󵼺�����ѡ��---*/
    h =$(first_sub_menu).attr('href');
$("#display_frame").attr('src',h+'&tt='+Math.random());
});
$('.side_bar').hover(function(){
  $(this).css('overflow-y','auto'); 
},
function(){
 $(this).css('overflow-y','hidden'); 
});

 

}); 

</script>
</div>
<!--[if IE 6]></div><![endif]-->
<!--[if IE 7]></div><![endif]-->
<!--[if IE 8]></div><![endif]-->
<script type="text/javascript" src="../../resource/js/artdialog/artDialog.js"></script>
<script type="text/javascript" src="../../resource/js/artdialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="../../resource/js/artdialog/artDialog.iframeTools.source.js"></script>
<script type="text/javascript" src="tpl/js/jquery.mousewheel.min.js"></script>
 
</body>
</html>

<?php keke_tpl_class::ob_out();?>