<?php
/**
 * ����ƽ̨������
 * @param 
 * @return
 * @author tuguska
 */
require_once 'opent.php';

class MBApiClient
{
    /** 
     * ���캯�� 
     *  
     * @access public 
     * @param mixed $wbakey Ӧ��APP KEY 
     * @param mixed $wbskey Ӧ��APP SECRET 
     * @param mixed $accecss_token OAuth��֤���ص�token 
     * @param mixed $accecss_token_secret OAuth��֤���ص�token secret 
     * @return void 
	 */
	public $host = 'open.t.qq.com';
    function __construct( $wbakey , $wbskey , $accecss_token , $accecss_token_secret ) 
	{
        $this->oauth = new MBOpenTOAuth( $wbakey , $wbskey , $accecss_token , $accecss_token_secret ); 
	}

	/******************
	 * ��ȡ�û���Ϣ
     * @access public 
	*@f ��ҳ��ʶ��0����һҳ��1�����·�ҳ��2���Ϸ�ҳ��
	*@t: ��ҳ��ʼʱ�䣨��һҳ 0�����������ݷ��ؼ�¼ʱ�������
	*@n: ÿ�������¼��������1-20����
	*@name: �û��� �ձ�ʾ����
	 * *********************/
	public function getTimeline($p){
		if(!isset($p['name'])){
			$url = 'http://open.t.qq.com/api/statuses/home_timeline?f=1';
			$params = array(
				'format' => MB_RETURN_FORMAT,
				'pageflag' => $p['f'],
				'reqnum' => $p['n'],
				'pagetime' =>  $p['t']
			);					
		}else{
			$url = 'http://open.t.qq.com/api/statuses/user_timeline?f=1';
			$params = array(
				'format' => MB_RETURN_FORMAT,
				'pageflag' => $p['f'],
				'reqnum' => $p['n'],
				'pagetime' =>  $p['t'],
				'name' => $p['name']
			);					
		}
	 	return $this->oauth->get($url,$params); 
	}

	/******************
	 * �㲥������Ϣ
	*@p: ��¼����ʼλ�ã���һ����������0��������������ϴη��ص�Pos��
	*@n: ÿ�������¼��������1-20����
	 * *********************/
	public function getPublic($p){
		$url = 'http://open.t.qq.com/api/statuses/public_timeline?f=1';
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'pos' => $p['p'],
			'reqnum' => $p['n']	
		);
	 	return $this->oauth->get($url,$params); 
	}

	/******************
	*��ȡ�����ҵ���Ϣ 
	*@f ��ҳ��ʶ��0����һҳ��1�����·�ҳ��2���Ϸ�ҳ��
	*@t: ��ҳ��ʼʱ�䣨��һҳ 0�����������ݷ��ؼ�¼ʱ�������
	*@n: ÿ�������¼��������1-20����
	*@l: ��ǰҳ���һ����¼�����þ�ȷ��ҳ��
	*@type : 0 �ἰ�ҵ�, other �ҷ����
	**********************/
	public function getMyTweet($p){
		$p['type']==0?$url = 'http://open.t.qq.com/api/statuses/mentions_timeline?f=1':$url = 'http://open.t.qq.com/api/statuses/broadcast_timeline?f=1';
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'pageflag' => $p['f'],
			'reqnum' => $p['n'],
			'pagetime' => $p['t'],
			'lastid' => $p['l']	
		);
	 	return $this->oauth->get($url,$params); 
	}

	/******************
	*��ȡ�����µ���Ϣ
	*@t: ��������
	*@f ��ҳ��ʶ��PageFlag = 1��ʾ�����һҳ�����ң�PageFlag = 2��ʾ��ǰ����һҳ�����ң�PageFlag = 3��ʾ�������һҳ  PageFlag = 4��ʾ������ǰһҳ��
	*@p: ��ҳ��ʶ����һҳ ��գ�������ҳ�����ݷ��ص� pageinfo������
	*@n: ÿ�������¼��������1-20����
	**********************/
	public function getTopic($p){
		$url = 'http://open.t.qq.com/api/statuses/ht_timeline?f=1';
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'pageflag' => $p['f'],
			'reqnum' => $p['n'],
			'httext' => $p['t'],
			'pageinfo' => $p['p']
		);
	 	return $this->oauth->get($url,$params); 
	}

	/******************
	*��ȡһ����Ϣ
	*@id: ΢��ID
	**********************/
	public function getOne($p){
		$url = 'http://open.t.qq.com/api/t/show?f=1';
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'id' => $p['id']
		);
	 	return $this->oauth->get($url,$params); 
	}

	/******************
	*����һ����Ϣ
	*@c: ΢������
	*@ip: �û�IP(�Է����û����ڵ�)
	*@j: ���ȣ�������գ�
	*@w: γ�ȣ�������գ�
	*@p: ͼƬ
	*@r: ��id
	*@type: 1 ���� 2 ת�� 3 �ظ� 4 ����
	**********************/
	public function postOne($p){
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'content' => $p['c'],
			'clientip' => $p['ip'],
			'jing' => $p['j'],
			'wei' => $p['w']
		);
		switch($p['type']){
			case 2:
				$url = 'http://open.t.qq.com/api/t/re_add?f=1';
				$params['reid'] = $p['r'];
				return $this->oauth->post($url,$params); 
				break;
			case 3:
				$url = 'http://open.t.qq.com/api/t/reply?f=1';
				$params['reid'] = $p['r'];
				return $this->oauth->post($url,$params); 
				break;
			case 4:
				$url = 'http://open.t.qq.com/api/t/comment?f=1';
				$params['reid'] = $p['r'];
				return $this->oauth->post($url,$params); 
				break;
			default:
				if(!empty($p['p'])){
					$url = 'http://open.t.qq.com/api/t/add_pic?f=1';
					$params['pic'] = $p['p'];
					return $this->oauth->post($url,$params,true); 
				}else{
					$url = 'http://open.t.qq.com/api/t/add?f=1';
					return $this->oauth->post($url,$params); 
				}	
			break;			
		}	

	}

	/******************
	*ɾ��һ����Ϣ
	*@id: ΢��ID
	**********************/
	public function delOne($p){
		$url = 'http://open.t.qq.com/api/t/del?f=1';
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'id' => $p['id']
		);
	 	return $this->oauth->post($url,$params); 
	}	

	/******************
	*��ȡת���͵�����Ϣ�б�
	*@reid��ת�����߻ظ������ID��
	*@f��������dwTime����0����һҳ��1�����·�ҳ��2���Ϸ�ҳ��
	*@t����ʼʱ��������·�ҳʱ�����ã�ȡ��һҳʱ���ԣ�
	*@tid����ʼid�����ڽ����ѯ�еĶ�λ�����·�ҳʱ�����ã�
	*@n��Ҫ���صļ�¼������(1-20)��
	*@Flag:��ʶ0 ת���б�1�����б� 2 ������ת���б�
	**********************/
	public function getReplay($p){
		$url = 'http://open.t.qq.com/api/t/re_list?f=1';
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'rootid' => $p['reid'],
			'pageflag' => $p['f'],
			'reqnum' => $p['n'],
			'flag' => $p['flag']
		);
		if(isset($p['t'])){
			$params['pagetime'] = $p['t'];	
		}
		if(isset($p['tid'])){
			$params['twitterid'] = $p['tid'];	
		}
	 	return $this->oauth->get($url,$params); 	
	}

	/******************
	*��ȡ��ǰ�û�����Ϣ
	*@n:�û��� �ձ�ʾ����
	**********************/
	public function getUserInfo($p=false){
		if(!$p || !$p['n']){
			$url = 'http://open.t.qq.com/api/user/info?f=1';
			$params = array(
				'format' => MB_RETURN_FORMAT
			);
		}else{
			$url = 'http://open.t.qq.com/api/user/other_info?f=1';
			$params = array(
				'format' => MB_RETURN_FORMAT,
				'name' => $p['n']
			);
		}
	 	return $this->oauth->get($url,$params); 	
	}

	/******************
	*�����û�����
	*@p ����,��������:
	*@nick: �ǳ�
	*@sex: �Ա� 0 ��1����2��Ů
	*@year:������ 1900-2010
	*@month:������ 1-12
	*@day:������ 1-31
	*@countrycode:������
	*@provincecode:������
	*@citycode:���� ��
	*@introduction: ���˽���
	**********************/
	public function updateMyinfo($p){
		$url = 'http://open.t.qq.com/api/user/update?f=1';
		$p['format'] = MB_RETURN_FORMAT;
	 	return $this->oauth->post($url,$p); 	
	}	

	/******************
	*�����û�ͷ��
	*@Pic:�ļ������ ���ֶβ��ܷ��뵽ǩ������
	******************/
	public function updateUserHead($p){
		$url = 'http://open.t.qq.com/api/user/update_head?f=1';
		$p['format'] = MB_RETURN_FORMAT;
		return $this->oauth->post($url, $p, true); 	
	}	

	/******************
	*��ȡ�����б�/ż���б�
	*@num: �������(1-30)
	*@start: ��ʼλ��
	*@n:�û��� �ձ�ʾ����
	*@type: 0 ���� 1 ż��
	**********************/
	public function getMyfans($p){
		try{
			if($p['n']  == ''){
				$p['type']?$url = 'http://open.t.qq.com/api/friends/idollist':$url = 'http://open.t.qq.com/api/friends/fanslist';
			}else{
				$p['type']?$url = 'http://open.t.qq.com/api/friends/user_idollist':$url = 'http://open.t.qq.com/api/friends/user_fanslist';
			}
			$params = array(
				'format' => MB_RETURN_FORMAT,
				'name' => $p['n'],
				'reqnum' => $p['num'],
				'startindex' => $p['start']
			);
		 	return $this->oauth->get($url,$params);
		} catch(MBException $e) {
			$ret = array("ret"=>0, "msg"=>"ok"
					, "data"=>array("timestamp"=>0, "hasnext"=>1, "info"=>array()));
			return $ret;
		}
	}

	/******************
	*����/ȡ������ĳ��
	*@n: �û���
	*@type: 0 ȡ������,1 ���� ,2 �ر�����
	**********************/	
	public function setMyidol($p){
		switch($p['type']){
			case 0:
				$url = 'http://open.t.qq.com/api/friends/del?f=1';
				break;
			case 1:
				$url = 'http://open.t.qq.com/api/friends/add?f=1';
				break;
			case 2:
				$url = 'http://open.t.qq.com/api/friends/addspecail?f=1';
				break;
		}
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'name' => $p['n']
		);
	 	return $this->oauth->post($url,$params);		
	}
	
	/******************
	*����Ƿ��ҷ�˿��ż��
	*@n: �����˵��ʻ����б����30��,���ŷָ���
	*@flag: 0 ����˿��1���ż��
	**********************/	
	public function checkFriend($p){
		$url = 'http://open.t.qq.com/api/friends/check?f=1';
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'names' => $p['n'],
			'flag' => $p['type']
		);
		return $this->oauth->get($url,$params);
	}

	/******************
	*��˽��
	*@c: ΢������
	*@ip: �û�IP(�Է����û����ڵ�)
	*@j: ���ȣ�������գ�
	*@w: γ�ȣ�������գ�
	*@n: ���շ�΢���ʺ�
	**********************/
	public function postOneMail($p){
		$url = 'http://open.t.qq.com/api/private/add?f=1';
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'content' => $p['c'],
			'clientip' => $p['ip'],
			'jing' => $p['j'],
			'wei' => $p['w'],
			'name' => $p['n']
			);
		return $this->oauth->post($url,$params); 
	}
	
	/******************
	*ɾ��һ��˽��
	*@id: ΢��ID
	**********************/
	public function delOneMail($p){
		$url = 'http://open.t.qq.com/api/private/del?f=1';
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'id' => $p['id']
		);
	 	return $this->oauth->post($url,$params); 
	}
	
	/******************
	*˽���ռ���ͷ�����
	*@f ��ҳ��ʶ��0����һҳ��1�����·�ҳ��2���Ϸ�ҳ��
	*@t: ��ҳ��ʼʱ�䣨��һҳ 0�����������ݷ��ؼ�¼ʱ�������
	*@n: ÿ�������¼��������1-20����
	*@type : 0 ������ 1 �ռ���
	**********************/	
	public function getMailBox($p){
		if($p['type']){
			$url = 'http://open.t.qq.com/api/private/recv?f=1';
		}else{
			$url = 'http://open.t.qq.com/api/private/send?f=1';
		}
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'pageflag' => $p['f'],
			'pagetime' => $p['t'],
			'reqnum' => $p['n']
		);
	 	return $this->oauth->get($url,$params);		
	}	

	/******************
	*����
	*@k:�����ؼ���
	*@n: ÿҳ��С
	*@p: ҳ��
	*@type : 0 �û� 1 ��Ϣ 2 ���� 
	**********************/	
	public function getSearch($p){
		switch($p['type']){
			case 0:
				$url = 'http://open.t.qq.com/api/search/user?f=1';
				break;
			case 1:
				$url = 'http://open.t.qq.com/api/search/t?f=1';
				break;
			case 2:
				$url = 'http://open.t.qq.com/api/search/ht?f=1';
				break;
			default:
				$url = 'http://open.t.qq.com/api/search/t?f=1';
				break;
		}		

		$params = array(
			'format' => MB_RETURN_FORMAT,
			'keyword' => $p['k'],
			'pagesize' => $p['n'],
			'page' => $p['p']
		);
	 	return $this->oauth->get($url,$params);		
	}	

	/******************
	*���Ż���
	*@type: �������� 1 ��������2 �����ؼ��� 3 �������Ͷ���
	*@n: ������������20��
	*@Pos :����λ�ã���һ������ʱ��0���������ϴη��ص�POS
	**********************/	
	public function getHotTopic($p){
		$url = 'http://open.t.qq.com/api/trends/ht?f=1';
		if($p['type']<1 || $p['type']>3){
			$p['type'] = 1;
		}
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'type' => $p['type'],
			'reqnum' => $p['n'],
			'pos' => $p['pos']
		);
	 	return $this->oauth->get($url,$params);		
	}			

	/******************
	*�鿴���ݸ�������
	*@op :�������� 0��ֻ������������������������1����������������Ը���������
	*@type��5 ��ҳδ����Ϣ������6 @ҳ��Ϣ���� 7 ˽��ҳ��Ϣ���� 8 ������˿�� 9 ��ҳ�㲥����ԭ���ģ�
	**********************/	
	public function getUpdate($p){
		$url = 'http://open.t.qq.com/api/info/update?f=1';
		if(isset($p['type'])){
			if($p['op']){
				$params = array(
					'format' => MB_RETURN_FORMAT,
					'op' => $p['op'],
					'type' => $p['type']
				);			
			}else{
				$params = array(
					'format' => MB_RETURN_FORMAT,
					'op' => $p['op']
				);			
			}
		}else{
			$params = array(
				'format' => MB_RETURN_FORMAT,
				'op' => $p['op']
			);
		}
	 	return $this->oauth->get($url,$params);		
	}	

	/******************
	*���/ɾ�� �ղص�΢��
	*@id : ΢��id
	*@type��1 ��� 0 ɾ��
	**********************/	
	public function postFavMsg($p){
		if($p['type']){
			$url = 'http://open.t.qq.com/api/fav/addt?f=1';
		}else{
			$url = 'http://open.t.qq.com/api/fav/delt?f=1';
		}
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'id' => $p['id']
		);
	 	return $this->oauth->post($url,$params);		
	}

	/******************
	*���/ɾ�� �ղصĻ���
	*@id : ΢��id
	*@type��1 ��� 0 ɾ��
	**********************/	
	public function postFavTopic($p){
		if($p['type']){
			$url = 'http://open.t.qq.com/api/fav/addht?f=1';
		}else{
			$url = 'http://open.t.qq.com/api/fav/delht?f=1';
		}
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'id' => $p['id']
		);
	 	return $this->oauth->post($url,$params);		
	}	

	/******************
	*��ȡ�ղص�����
	*******����
	n:�����������15
	f:��ҳ��ʶ  0����ҳ   1�����·�ҳ 2�����Ϸ�ҳ
	t:��ҳʱ���0
	lid:��ҳ����ID���ڴ�����ʱΪ0
	*******��Ϣ
	f ��ҳ��ʶ��0����һҳ��1�����·�ҳ��2���Ϸ�ҳ��
	t: ��ҳ��ʼʱ�䣨��һҳ 0�����������ݷ��ؼ�¼ʱ�������
	n: ÿ�������¼��������1-20����
	*@type 0 �ղص���Ϣ  1 �ղصĻ���
	**********************/	
	public function getFav($p){
		if($p['type']){
			$url = 'http://open.t.qq.com/api/fav/list_ht?f=1';
			$params = array(
				'format' => MB_RETURN_FORMAT,
				'reqnum' => $p['n'],		
				'pageflag' => $p['f'],		
				'pagetime' => $p['t'],		
				'lastid' => $p['lid']		
				);
		}else{
			$url = 'http://open.t.qq.com/api/fav/list_t?f=1';	
			$params = array(
				'format' => MB_RETURN_FORMAT,
				'reqnum' => $p['n'],		
				'pageflag' => $p['f'],		
				'pagetime' => $p['t']		
				);
		}
	 	return $this->oauth->get($url,$params);		
	}

	/******************
	*��ȡ����id
	*@list: ���������б�abc,efg,��
	**********************/	
	public function getTopicId($p){
			$url = 'http://open.t.qq.com/api/ht/ids?f=1';
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'httexts' => $p['list']
		);
	 	return $this->oauth->get($url,$params);		
	}	

	/******************
	*��ȡ��������
	*@list: ����id�б�abc,efg,��
	**********************/	
	public function getTopicList($p){
			$url = 'http://open.t.qq.com/api/ht/info?f=1';
		$params = array(
			'format' => MB_RETURN_FORMAT,
			'ids' => $p['list']
		);
	 	return $this->oauth->get($url,$params);		
	}		
}
?>
