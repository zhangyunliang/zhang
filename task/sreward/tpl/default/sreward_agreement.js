/**
 * �������ͽ���js
 */

/**
 * ǩ��Э��
 * @param user_type �û���ɫ
 */
function taskAgree(user_type){
	$.getJSON(basic_url,{op:'sign',user_type:user_type},function(json){
		if(json.status=='1'){
			showDialog(json.data,'right',json.msg,"document.location.reload()");return false;
		}else{
			showDialog(json.data,'alert',json.msg);return false;
		}
	})
}
/**
 * ȷ���ύ����
 */
function confirmUpload(){
	if($("#file_str").val()){
		var fileNum = $("#file_str").val().split(',').length;	
	}else{
		var fileNum = 0;
	}
	
	if(fileNum){
		showDialog(L.you_upload+fileNum+L.source_file_confirm_delivery,"confirm",L.operate_notice,"confirm()");return false;
	}else{
		showDialog(L.not_upload_is_or_not_deliver,"confirm",L.operate_notice,"confirm()");return false;
	}
}
/**
 * ȷ�Ͻ��ո���
 */
function confirmFile(){
	var fileNum = $("#file li").length;
	if(fileNum){
		showDialog(L.other_upload+fileNum+L.source_file_confirm_delivery,"confirm",L.operate_notice,"Complete()");return false;
	}else{
		showDialog(L.not_upload_is_or_not_receive,"confirm",L.operate_notice,"Complete()");return false;
	}
}
/**
 * ���ύ
 */
function confirm(){
	$("#agree_frm").submit();
}
/**
 * Э�����
 */
function Complete(){
	$.getJSON(basic_url,{op:'accept'},function(json){
		if(json.status==1){
			switch(trust_mode){
				case "0":
					showDialog(json.data,"right",json.msg,"document.location.reload()");return false;
					break;
				case "1":
					location.href=basic_url+'&step=step3';
					break;
			}
		}else{
			showDialog(json.data,"alert",json.msg);return false;
		}
	})
}

/** 
 * �ٲ�
 *@param string type άȨ���� 1=>άȨ,2=>�ٱ�,3=>Ͷ��
 *@param string obj άȨ���� task/work/product/order
 *@param string obj_id ������ 
 *@param int to_uid ���ٱ���
 *@param string to_username ���ٱ�������
 */
function report( obj, type,obj_id,to_uid,to_username) {
	
	if(to_uid==uid){
		showDialog(L.not_initiated_arbitration,"alert",L.operate_notice);return false;
	}else{
			showWindow("report",basic_url+'&op=report&type='+type+'&obj='+obj+'&obj_id='+obj_id+'&to_uid='+to_uid+'&to_username='+to_username,'get','0');return false;
		}
}

function checkInner(obj,event){

	var num = parseInt($(obj).val().length)+0;
		if(num<=100)
			$(obj).next().find(".answer_word").text(L.can_input+(100-num)+L.words);
		else{
			var nt = $(obj).val().toString().substr(0,100);
			$(obj).val(nt);	
		}
}