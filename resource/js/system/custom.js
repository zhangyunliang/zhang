$(function(){$(".togg").focus(function(){$(this).removeClass("c999");if(this.value==L.input_task_service){this.value=""}}).blur(function(){$(this).addClass("c999");this.value==""?this.value=$(this).attr(this.title?"title":"original-title"):""});$(".operate a,a.prev,a.next,a.small_nav,.border_n a ").not(".nav .operate a").hover(function(){$(this).children(".icon16").not(".deep_style .icon16,.deep_style .icon32").addClass("reverse")},function(){$(this).children(".icon16").not(".deep_style .icon16,.deep_style .icon32").removeClass("reverse")});$(".top1,.comment_item").hover(function(){$(this).children(".operate").removeClass("hidden")},function(){$(this).children(".operate").addClass("hidden")});$("table tbody tr:odd").not("table.jqTransformTextarea tr").addClass("odd");$(".list dd:odd").not("dd.tags").addClass("odd");$(".list dd").children(".operate").addClass("hidden");$("table tbody tr,.list dd,.category_list .item,.case_con").not(".list dd.tags,table.jqTransformTextarea tr").hover(function(){$(this).addClass("hover").children(".operate").removeClass("hidden")},function(){$(this).removeClass("hover").children(".operate").addClass("hidden")});$(".tar_comment").click(function(e){c($(this),e);e.stopPropagation()});$(".tar_comment").blur(function(e){d($(this),e);e.stopPropagation()});$(".tar_comment").live("click",function(e){c($(this),e);e.stopPropagation()});$(".tar_comment").live("blur",function(e){d($(this),e);e.stopPropagation()});var c=function(f,e){if($(f).val()==L.i_want_say){$(f).val("").css({height:"50px"}).next().show()}e.stopPropagation()};var d=function(f,e){$("html,body").click(function(g){if(!$(g.target).hasClass("answer-zone")){$(f).val(L.i_want_say).css({height:"23px"}).next().hide().find(".answer_word").text(L.input_100_words)}})};var b=$(".messages");$(".messages .close").click(function(){var e=$(this).parent(".messages");a(e)});function a(e){e.animate({opacity:0.01},200,function(){e.slideUp(200,function(){e.remove()})})}$(function(){$("input[type=text],input[type=password").addClass("txt_input"),$("this").removeClass("search_input")});$(".deep_style .icon16,.deep_style .icon32").addClass("reverse");$(".top").addClass("hidden");$.waypoints.settings.scrollThrottle=30;$("#wrapper").waypoint(function(e,f){$(".top").toggleClass("hidden",f==="up")},{offset:"-1%"});$(".box.model .shop .box_detail .small_list li.item,.case_con,.example .text_ov,.goods_words,.goods").hover(function(){$(this).css("z-index","2")},function(){$(this).css("z-index","1")})});if($.browser.msie&&($.browser.version=="6.0")&&!$.support.style&&location.href.indexOf("do=browser")<0){}else{if($(".second_menu").length>0){$(".section").waypoint(function(a,b){$(this).children(".second_menu").toggleClass("fixed-top",b==="down");a.stopPropagation()})}}var checkall=function(){if($("#checkbox").attr("value")==0){$("#checkbox").attr("value",1);$("input[type=checkbox]").attr("checked",true)}else{$("#checkbox").attr("value",0);$("input[type=checkbox]").attr("checked",false)}};function jq_select(){$("#reload_indus div.jqTransformSelectWrapper ul li a").click(function(){$("#indus_id").removeClass("jqTransformHidden").css("display:none");$("select").jqTransSelect().addClass("jqTransformHidden")})}function showIndus(a){if(a){$.post("index.php?do=ajax&view=indus",{indus_pid:a},function(c){var b=c;if(trim(b)==""){$("#indus_id").html('<option value="-1"> '+L.select_a_subsector+" </option>")}else{$("#indus_id").html(b);$("#reload_indus div.jqTransformSelectWrapper ul li a").triggerHandler("click")}},"text")}}function checkInner(d,b,c){var a=d.value.length;c.keyCode==8?a-=1:a+=1;a<0?a=0:"";var f=Math.abs(b-a);if(b>=a){$("#length_show").text(L.has_input_length+a+","+L.can_also_input+f+L.word)}else{$("#length_show").text(L.can_input+b+L.word+","+L.has_exceeded_length+f+L.word)}};