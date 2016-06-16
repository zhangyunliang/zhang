/**
 * �����¼�����

 */

$(function(){
	var loading = parseInt($(".process li.selected").index()) + 1;
	$(".progress_bar").css("width", loading * 20 + "%");
	if(task_status==9){
		$(".progress_bar").css({width:"100%",background:"grey"}); 
	}

})

/**������ͶƱ*/
function taskVote(){
	if(check_user_login()){
		var url = basic_url+'&op=start_vote';
		$.getJSON(basic_url+'&op=start_vote',function(json){
			if(json.status==1){
				showDialog(json.data,'notice',json.msg,"location.href='"+basic_url+"&view=work'");return false;
			}else{
				showDialog(json.data,'alert',json.msg);return false;
			}
		})
	}
}

/** ����ύ */
function workHand(url) {
	if (check_user_login()) {
		if (uid == guid) {
			showDialog(L.t_hand_forbidden, 'alert',L.operate_notice, '', 0);
			return false;
		} else {
			showWindow("work_hand",url,"get",'0');return false;
		}
	}
}
/**
 * �������ͶƱ
 * @param int work_id ������
 * @param int vote_uid ��ͶƱ��
 */
function workVote(work_id,vote_uid){
	if(check_user_login()){
		 if(vote_uid==uid){
			 showDialog(L.t_vote_forbidden,'alert',L.operate_notice);return false;}
		var url = basic_url+'&op=work_vote';
		$.post(url,{work_id:work_id},function(json){
			if(json.status==1){
				$("#work_vote_"+work_id).remove();
				var vote_num = $("#vote_num_"+work_id).html();
				num = parseInt(vote_num)+1;
				$("#vote_num_"+work_id).html(num);
				showDialog(json.data,'notice',json.msg);return false;
			}else
				showDialog(json.data,'alert',json.msg);return false;
		},'json')
	}
}





//�깤
function work_over(op){
	var task_status = task_status;
	var op = op;
	var url = basic_url+'&op='+op;
	if (check_user_login()) { 
			showWindow("work_hand",url,"get",'0');
			return false; 
	}
	
}







/**
 * ѡ����
 * @param work_id ������
 * @param to_status ���״̬
 * @returns {Boolean}
 */
function workBid(work_id,to_status){
	if(guid!=uid){
		showDialog(L.t_master_can_operate_work,"alert",L.operate_notice);return false;
	}else{
		var url=basic_url+'&op=work_choose&work_id='+work_id;
			$.post(url,{to_status:to_status},function(json){
				if(json.status==1){ 
					$("#work_4_"+work_id).remove();
					$("#work_7_"+work_id).remove(); 
					$("#show_status_"+work_id).attr("class","work_status_big work_"+to_status+"_big qualified_big1 po_ab"); 
					showDialog(json.data,"right",json.msg);
					return false;
				}else{
					showDialog(json.data,"alert",json.msg);
					return false;
				}
			},'json')
	}
}



