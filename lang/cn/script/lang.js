/**
 * js���԰�
 */
var L = {
		    /**ȫ�ֱ���**/
			at:'��',
			day:'��',
			hour:'Сʱ',
			minutes:'��',
			seconds:'��',
			file:'�ļ�',
			point:'��',
			a:'��',
			d:'��',
			word:'��',
			has_left:'��ʣ��',
			del:'ɾ��',
			
			close:'�ر�',
			cancel:'ȡ��',
			submit:'ȷ��',
			
			share:'����',
			
			operate_notice:'������ʾ',
			operate_warning:'��������',
			upload_file:'�ϴ��ļ�',
			can_input:'�㻹������',
			select_sub_industry:'��ѡ������ҵ',
			
			/** release.js Chen**/
			t_require:'��������',
			t_allow_min_day:' Ԥ�Ƶ������������,��ǰԤ��������С����Ϊ:',
			t_allow_max_day:'��,����ֹʱ�䣺',
			t_amount_allowable_period:'��ǰ�����������������Ϊ:',
			t_publishing_agreement:'����ͬ�����񷢲�Э��',
			
			/** service.js Chen**/
			s_can_not_buy_your_own:'���޷������Լ���',
			s_confirm_to_buy:'��ȷ���µ�������?',
			
			/** shelves.js Chen**/
			s_publishing_agreement:'����ͬ����Ʒ����Э��',
			s_description:'��������',
			
			/** task.js Chen**/
			t_delay_time_over:'���ڴ�������',
			t_delay_forbidden:'��,�޷���������',
			t_only_master_can_comment_work:'ֻ�й����������۸��',
			t_reply_over_word_limit:'���Ļظ�������������',
			t_100_word_allow:'�㻹������100����!',
			t_say_something:'��Ҫ˵����...',
			t_comments:'����:',
			t_confirm_delete_this_work:'ȷ��ɾ���˸����?',
			t_do_not_duplicate_submissions:'����������',
			/** uploadify.js Chen**/
			u_file_has_not_added_into_quene:'�ļ�δ�������ϴ�����:',
			u_cancel:' - ��ȡ��',
			u_file:'�ļ� "',
			u_replace_this_file:'"���ļ������ϴ�������.��ϣ���滻��?',
			u_files_over_allowed_num:'ѡ���ļ�����,�����ϴ�',
			u_files:'���ļ�.',
			u_select_num_over_allowed:'ѡ���ļ����������ϴ��ļ�����(',
			u_over_size_limit:'"������С����(',
			u_r_backets:')."',
			u_is_null:'"Ϊ��.',
			u_not_allowed_file_ext:'"�������ļ���ʽ(',
			u_lack_upload_path:'ȱ���ϴ�·��',
			u_io_warning:'IO����',
			u_security_error:'��ȫ�Դ���',
			u_failed:'��ʧ��',
			u_sign_error:'��֤����',
			u_canceled:'��ȡ��',
			u_stoped:'����ֹ',
			u_success:' - �����',
			u_method:'����',
			u_not_exists_in_control:' �ڿؼ��в�����',
			
			/** preward_task.js/ mreward_task.js Chen**/
			t_master_can_operate_work:'ֻ�й������ܲ������',
			t_work_num_than_expected:'������Ч����������Ѵﵽ���������������������ٽ�����',
			t_hand_forbidden:'������Ч���û��޷����Լ����������񽻸�!',
			
			/** dtender_task.js**/
			t_have_handed:'���Ѿ�������Ͷ������',
			t_only_master_can_host_amount:'ֻ�й������ܽ����ͽ��й�',
			t_wait_pay:'������',
			t_work_over:'���',
			t_work_plan_stage_limit:'�����ƻ���಻�ó���5��',
			t_plan_amount:'�ƻ����',
			t_plan_amount_fill_error:'�ƻ������д����',
			t_fill_in_plan_amount:'��д�ƻ����',
			t_start_time:'��ʼʱ��',
			t_start_time_fill_error:'��ʼʱ����д����',
			t_fill_in_start_time:'��д��ʼʱ��',
			t_end_time:'����ʱ��',
			t_end_time_fill_error:'����ʱ����д����',
			t_fill_in_end_time:'��д����ʱ��',
			t_work_target:'����Ŀ��',
			t_target_fill_error:'����Ŀ����д����',
			t_fill_in_target:'��д����Ŀ��',
			t_reset_plan_amount:'����ƻ��ܽ���뱨�۲���������������',
			
			
			/** tender_task.js**/
			t_vote_forbidden:'�޷����Լ�����ͶƱ',
		
			/** system/custom.js zc**/
			input_task_service:'��������/��Ʒ',
			i_want_say:'��Ҫ˵����...',
			input_100_words:'�㻹������100����!',
			select_a_subsector:'��ѡ������ҵ',
			has_input_length:'�����볤��',
			can_also_input:'����������',
			can_input:'������',
			has_exceeded_length:'�ѳ�������',
			
			/** system/script_calendar.js zc**/
			pre_month:'��һ��',
			next_month:'��һ��',
			c_choice_year:'���ѡ�����',
			c_choice_month:'���ѡ���·�',
			today:'����',
			mon:'��',

			/** tpl/default/js/help.js**/
			want_to_know:'���˽�ʲô?',	
			
			/** tpl/default/js/skill.js**/
			no_project:'û����Ŀ',
			you_have_selected:'����ѡ����',

			ability_label:'������ǩ',
			you_can_choose:'���п���ѡ��',
			all_clear:'ȫ�����',
		
			/** task/sreward/tpl/default/sreward_task.js**/
			operation_invalid:'������Ч',
			released_task_turnaround:'�û����Լ����������񽻸�!',
			operation_failed_tips:'����ʧ����ʾ',
			
			/** task/sreward/tpl/default/sreward_agreement.js**/
			you_upload:'���ϴ���',
			other_upload:'�Է��ϴ���',
			source_file_confirm_delivery:'��Դ�ļ���ȷ�Ͻ�����?',
			not_initiated_arbitration:'�޷����Լ������ٲ�',
			not_upload_is_or_not_receive:'�Է�û���ϴ�Դ�ļ�,ȷ�Ͻ�����?',
			not_upload_is_or_not_deliver:'��û���ϴ�Դ�ļ�,ȷ�Ͻ�����?',
			
			/** control/admin/tpl/js/table.js**/	
			double_click:'˫��',
			
			/** �ļ�����control/admin/tpl/js/table.js**/	
			t_hand_forbidden:'������Ч���û��޷����Լ����������񽻸�!',
			
			/** �ļ�����system/keke.js  xj * */
			you_not_login_now_login:'�㻹û�е�½���Ƿ����ڵ�½��',
			login_tips:'��½��Ϣ��ʾ',
			content_is_empty:'���ݲ���Ϊ�գ�',
			content_not_more_than:'���ݲ��ö���',
			content_not_less_than:'���ݲ�������',
			words:'����',
			file_upload_exceeds_limit_the_maximum:'�ļ��ϴ�������������,���',
			error_tips:'������ʾ',
			rights:'άȨ',
			report:'�ٱ�',
			complaints:'Ͷ��',
			can_not_be_initiated:'�޷����Լ�����',
			can_not_give_yourself_send_message:'�޷����Լ�����վ�ڶ���',
			xml_parsing_error:'XML��������',
			loading:'���Ժ�...',
			oneday:'һ��',
			sevendays:'7 ��',
			fourteendays:'14 ��',
			month:'һ����',
			three_month:'������',
			custom:'�Զ���',
			six_month:'����',
			year:'һ��',
			lasting:'����',
			this_content_requires_the_adobe_flash_player_9_or_later:'��������Ҫ Adobe Flash Player 9.0.124 ����߰汾',
			click_copy:'��˸��Ƶ�������',
			/**resource/js/system/form_and_validation.js xj**/
			ele:'Ԫ��',
			error_config_val:'ֵ������������',
			file_format_error:'���ļ���ʽ����ȷ',
			/**task/match/tpl/default/match_task.js**/
			non_employers_not_view_contact:'�ǹ�Ӷ˫���޷��鿴��ϵ��ʽ',
			operation_invalid_the_high_bids_released_task:'������Ч���û����Լ������������������!',
			non_tender_witkey_not_los_bid:'��Ͷ�������޷�����Ͷ��',
			sure_give_up_tender:'ȷ������Ͷ����?',
			non_employment_can_not_send_message:'�ǹ�Ӷ˫���޷�������Ϣ����',
			only_employers_can_out_work:'ֻ�й����ſ���̭���',
			sure_out_user:'ȷ����̭���û���?',
			only_employers_host:'ֻ�й����ſ��й��ͽ�',
			only_tender_work_confirm:'ֻ��Ͷ�����Ͳſɽ��й���ȷ��',
			start_work:'ȷ����ʼ������?',
			only_tender_confirm_completion:'ֻ��Ͷ�����Ͳſ�ȷ���깤',
			only_employer_acceptance:'ֻ�й����ſ����չ���',
			confirm_acceptance_work:'ȷ�����չ�����?'
		   /*resource/js/system/script_calendar.js*/		
			
};