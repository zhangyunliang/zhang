/**
 * �����¼�����
 * 
 */

$(function() {
	var loading = parseInt($(".process li.selected").index()) + 1;
	$(".progress_bar").css("width", loading * 25 + "%");
	if(task_status==9){
		$(".progress_bar").css({width:"100%",background:"grey"}); 
	}
})


/** ����ύ */
function workHand() {
	if (check_user_login()) {
		if (uid == guid) {
			showDialog(L.t_hand_forbidden, 'alert', L.operate_notice, '', 0);
			return false;
		} else {
			showWindow("work_hand", basic_url + '&op=work_hand', "get", '0');
			return false;
		}
	}
}

/**
 * ѡ����
 * 
 * @param work_id
 *            ������
 * @param to_status
 *            ���״̬
 * @returns {Boolean}
 */
function workBid(work_id, to_status) {
	if (check_user_login()) {
		if (guid != uid) {
			showDialog(L.t_master_can_operate_work, "alert",L.operate_notice);
			return false;
		} else {
			var url = basic_url + '&op=work_choose&work_id=' + work_id;
			$.post(url, {
				to_status : to_status
			}, function(json) {
				if (json.status == 1) {
				
					if (to_status == '7' || to_status == '4') {
						$("#work_4_" + work_id).remove();
						$("#work_7_" + work_id).remove();
						$("#work_5_" + work_id).remove();
					} else {
						$("#work_5_" + work_id).remove();
					} 
				
					var divStatus = $('<div class="work_status_big work_'
					+ to_status + '_big qualified_big1 po_ab"></div>');
					$("#" + work_id).find(".work_status_big").remove();
					divStatus.appendTo($("#" + work_id));
					showDialog(json.data, "right", json.msg);
					return false;
				} else {
					showDialog(json.data, "alert", json.msg);
					return false;
				}
			}, 'json')
		}
	}
}
/**
 * ������ת
 * @param agree_id Э����
 */
function taskAgree(agree_id) {
	if (check_user_login()) {
		location.href="index.php?do=agreement&task_id="+task_id+"&agree_id="+agree_id;
	}
}