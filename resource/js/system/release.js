$(function(){$("#qq").click(function(){$("#ct_qq").toggle()});$("#msn").click(function(){$("#ct_msn").toggle()});contact();$(":radio[name='contact_type']").click(function(){$(this).attr("checked","checked");contact()});$("#tar_content").blur(function(){contentCheck("tar_content",L.t_require,50,1000)})});function contact(){var a=parseInt($(":radio[name='contact_type']:checked").val())+0;if(a=="1"){$(".lit_form input:[type='text']").removeAttr("ignore").removeAttr("disabled").val("")}else{$(".lit_form input:[type='text']").each(function(){$(this).attr("disabled","disabled").attr("ignore","true").val($(this).attr("ext"))})}}function getMaxDday(a){if(a){$.getJSON(basic_url,{ajax:"getmaxday",task_cash:a},function(b){$(".lit_form .pad10 span:last-child").removeClass().text("");if(b.status==1){$("#txt_task_day").attr("limit","required:true;type:date;than:min;less:"+b.msg).val(b.msg);$("#max").val(b.msg);var c=$("#txt_task_day").attr("min_day");title=L.t_allow_min_day+c+L.t_allow_max_day+b.data;$("#txt_task_day").attr("title",title);$("#txt_task_day").attr("max",b.msg);$("#txt_task_day").attr("msg",title)}else{return false}})}}function show_payitem_num(c,a){var a=a;var b=$(c).attr("checked");if(b==true){if(a=="map"){$("#set_map").show();add_payitem($("#item_map"),"add",1)}else{$("#span_"+a).show()}}else{if(a=="map"){add_payitem($("#item_map"),"del",1);$("#set_map").hide()}else{del_payitem(a);$("#span_"+a).hide();$("#payitem_"+a).val("")}}}function edit_payitem(a){var a=a;var b=parseInt($("#payitem_"+a).val());var c=parseInt($("#checkbox_"+a).attr("item_cash"));var d=parseInt($("#ago_total").val());add_payitem($("#checkbox_"+a),"add",b)}function del_payitem(a){var a=a;var b=parseInt($("#payitem_"+a).val());add_payitem($("#checkbox_"+a),"del",b)}function checkDay(){var a=parseInt($("#txt_task_day").attr("max"))+0;var b=parseInt($("#txt_task_day").val())+0;if(b>a){$("#span_task_day").html("<span>"+L.t_amount_allowable_period+a+L.day+"</span>");return false}else{return true}}function checkAgreement(){if($("#agreement").attr("checked")==false){showDialog(L.t_publishing_agreement,"alert",L.operate_notice);return false}else{return true}}function stepCheck(c){var a=checkForm(document.getElementById("frm_"+r_step));var b=false;switch(r_step){case"step1":if(checkDay()){if(a){b=true}}break;case"step2":if(a){if(contentCheck("tar_content",L.t_require,50,1000,0,"",editor)&&checkAgreement()){b=true}if(c==8&&checkAgreement()){b=true}}break;case"step3":if($("#item_map").attr("checked")==true&&$.trim($("#point").val())==""){set_map();return false}else{if(a){$("#frm_"+r_step).submit();$("button[name='is_submit']").unbind("click").addClass("disabled")}}break;case"step4":break}if(b==true){check_pub_priv()}}function check_pub_priv(){$.getJSON(basic_url,{ajax:"check_priv"},function(a){if(a.status=="1"){$("#frm_"+r_step).submit()}else{showDialog(a.data,"alert",a.msg);return false}})}function add_payitem(f,d,a){var c=parseInt($(f).attr("item_id"))+0;var e=parseFloat($(f).attr("item_cash")*a);var h=$.trim($(f).val());var b=$.trim($(f).attr("item_code"));var g=parseFloat($("#total").text().toString());switch(d){case"add":$.post(basic_url,{ajax:"save_payitem",item_id:c,item_name:h,item_cash:e,item_code:b,item_num:a},function(i){$("#total").text(i.msg)},"json");break;case"del":$.post(basic_url,{ajax:"rm_payitem",item_id:c},function(i){$("#total").text(i.msg)},"json");break}}function uploadResponse(a){if($("#"+a.fid).length<1){var b=$("#file_ids").val();if(b){$("#file_ids").val(b+","+a.fid)}else{$("#file_ids").val(a.fid)}}};