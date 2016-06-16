<?php
/**
 * taoapi��ȡ�ӿڲ�����
 * @author Administrator
 *
 */
include_once 'taoapi.php';
class taoapi_get {
	private $_apiconfig; //taoapi config�����
	private $_taoapi; //taoapi �����
	private $_interface; //���ýӿ����ƣ���д
	private $_post_mode; //�ύģʽ  get��post��postimg
	private $_charset; //���뷽ʽ��
	private $_format_mode; //���������ʽ.json,xml
	public $_get_data; //��ȡ��������
	private $_params; //�����������
	
	public static function get_instance($interface, $params = array(), $post_mode = 'get', $format_mode = 'xml') {
		static $obj = null;
		if ($obj == null) {
			$obj = new taoapi_get ( $interface, $params, $post_mode, $format_mode);
		}
		return $obj;
	}
	public function __construct($interface, $params = array(), $post_mode = 'get', $format_mode = 'xml') {
		$this->_interface  = $interface;
		$this->_post_mode = $post_mode;
		$this->_format_mode = $format_mode;
		$this->_charset = strtoupper(CHARSET);
		$this->_params = array_filter ( $params );
	}
	/**
	 * �ύ��ѯ��ȡ����
	 * Enter description here ...
	 */
	public function send() {
		$taoapi_config = Taoapi_Config::Init ();
		$taoapi_config->setCharset ( $this->_charset );
		$inter  = $this->_interface;
		$taoapi = $this->_taoapi = new taoapi ();
		$params = $this->$inter();
		$params ['method'] = $this->get_interface ($inter);
		$this->taoapi_params ($params); //����taoapi�������
		$this->_get_data = $data = $taoapi->Send ( $this->_post_mode, $this->_format_mode )->getArrayData ();
		$taoapi->getErrorInfo (); //���API�Ƿ���������
		return $this->_get_data;
	}
	public function taoapi_params($params) {
		if (is_array ( $params )) {
			foreach ( $params as $k => $v ) {
				$this->_taoapi->$k = $v;
			}
		}
	}
	/**
	 * ��ѯ��ַ����(taobao.areas.get)
	 */
	private function areas() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] = 'area_id,area_type,area_name,name,parent_id,zip';
		return array ('fields' => $params ['fields'] );
	}
	/**
	 * �õ�������Ʒ��Ϣ(taobao.item.get)
	 */
	private function item() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] = 'detail_url,num_iid,title, nick, type,desc, skus, props_name, created, promoted_service,is_lightning_consignment, is_fenxiao, auction_point, property_alias, volume, template_id, after_sale_id, is_xinpin, sub_stock, cid, seller_cids, props, input_pids, input_str, pic_url, num, valid_thru, list_time, delist_time, stuff_status, location, price, post_fee, express_fee, ems_fee, has_discount, freight_payer, has_invoice, has_warranty, has_showcase, modified, increment, approve_status,postage_id, product_id, m_imgs, outer_id, is_virtual, is_taobao, is_ex, is_timing, videos, is_3D, score, one_station, second_kill, auto_fill, violation, is_prepay, ww_status, wap_desc, wap_detail_url, cod_postage_id, sell_promise';
		return array ('fields' => $params ['fields'], 'num_iid' => $params ['num_iid'] );
	}
	/**
	 *������Ʒ��Ϣ(taobao.items.get)
	 */
	private function items() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='iid,detail_url,num_iid,title,nick,type,cid,seller_cids,props,input_pids,input_str,desc,pic_url,num,valid_thru,list_time,delist_time,stuff_status,location,price,post_fee,express_fee,ems_fee,has_discount,freight_payer,has_invoice,has_warranty,has_showcase,modified,increment,auto_repost,approve_status,postage_id,product_id,auction_point,property_alias,itemimg,propimg,sku,outer_id,is_virtural,is_taobao,is_ex,video';
		return array ('fields' => $params ['fields'],
					 'q' => $params ['q'],
					 'cid' => $params ['cid'],
					 'nicks'=>$params['nicks'],
					 'props' => $params ['props'],
					 'product_id' => $params ['product_id'],
					 'page_no'=>$params ['page_no'],
					 'page_size'=>$params ['page_size']
		);
	}
	/**
	 *���������ǳƺ���ƷID�б��ȡSKU��Ϣ(taobao.item.skus.get)
	 */
	private function item_skus() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='iid,detail_url,num_iid,title,nick,type,cid,seller_cids,props,input_pids,input_str,desc,pic_path,num,valid_thru,list_time,delist_time,stuff_status,location,price,post_fee,express_fee,ems_fee,has_discount,freight_payer,has_invoice,has_warranty,has_showcase,modified,increment,auto_repost,approve_status,postage_id,product_id,auction_point,property_alias,itemimg,propimg,sku,outer_id,is_virtural,is_taobao,is_ex,video';
		$params ['iids']   or $params ['iids']   = 'cadb024945eb330d11d8d5d558ac4e4a';
		return array ('fields' => $params ['fields'],
					 'iids' => $params ['iids'],
					 'nick' => trim($params ['nick'])
		);
	}
	/**
	 * ��ȡ��̨�����ҷ�����Ʒ�ı�׼��Ʒ��Ŀ(taobao.itemcats.get)
	 */
	private function itemcats() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='cid,parent_cid,name,is_parent,status,sort_order';
		return array ('fields' => $params ['fields'],
					 'parent_cid' => $params ['parent_cid']
		);
	}
	/**
	 * ��ȡ��̨�����ҷ�����Ʒ�ı�׼��Ʒ��Ŀ(taobao.itemcats.get.v2)
	 */
	private function itemcats_v2() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='cid,parent_cid,name,is_parent,status,sort_order';
		return array ('fields' => $params ['fields'],
					 'parent_cid' => $params ['parent_cid']
		);
	}
	/**
	 * ��ȡ��׼��Ʒ��Ŀ����(taobao.itemprops.get)
	 */
	private function itemprops() {	
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='pid,name,is_key_prop,is_sale_prop,is_color_prop,is_enum_prop,is_input_prop,is_item_prop,child_template,must,multi,parent_pid,parent_vid,prop_values,status,sort_order';
		return array ('fields' => $params ['fields'],
					 'cid' => $params ['cid']
		);
	}
	/**
	 * ��ȡ��׼��Ŀ����ֵ(taobao.itempropvalues.get)
	 */
	private function itempropvalues() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='cid,pid,prop_name,vid,name,name_alias,status,sort_order';
		return array ('fields' => $params ['fields'],
					 'cid' => $params ['cid'],
					 'datetime'=>date('Y-m-d H:i:s',time())
		);
	}
	/**
	 * ������Ʒ��Ϣ(taobao.items.search)
	 */
	private function items_search() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='iid,detail_url,num_iid,title,nick,type,cid,seller_cids,props,input_pids,input_str,desc,pic_path,num,valid_thru,list_time,delist_time,stuff_status,location,price,post_fee,express_fee,ems_fee,has_discount,freight_payer,has_invoice,has_warranty,has_showcase,modified,increment,auto_repost,approve_status,postage_id,product_id,auction_point,property_alias,itemimg,propimg,sku,outer_id,is_virtural,is_taobao,is_ex,video,itemList,categoryList';
		$params ['order_by'] or $params ['order_by'] ='seller_credit';
		return array ('fields' => $params ['fields'],
					 'cid' => $params ['cid'],
					 'q'=>$params ['q'],
					 'order_by'=>$params ['order_by'],
					 'is_mall'=>$params ['is_mall']
		);
	}
	/**
	 * ��ѯ������˾��Ϣ(taobao.logistics.companies.get)
	 */
	private function logistics() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='company_id,company_code,company_name';
		return array ('fields' => $params ['fields']);
	}
	/**
	 * �������׹�����Ϣ(taobao.orders.get)
	 */
	private function orders() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='seller_nick, buyer_nick, title, type, created, iid, price, pic_path, num';
		$params ['iid']    or $params ['iid'] ='cadb024945eb330d11d8d5d558ac4e4a';
		return array ('fields' => $params ['fields'],
					 'iid' => $params ['iid'],
					 'seller_nick' => $params ['seller_nick']
		);
	}
	/**
	 * ��ȡһ����Ʒ����Ϣ(taobao.product.get)
	 */
	private function product() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='product_id,outer_id,tsc,cid,cat_name,props,props_str,name,binds,binds_str,sale_props,sale_props_str,price,desc,pic_url,productImg,productPropImg,created,modified';
		return array ('fields' => $params ['fields'],
					 'product_id' => $params ['product_id']
		);
	}
	/**
	 * ��ȡ��Ʒ�б�(taobao.products.get)
	 */
	private function products() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='product_id,num_iid,outer_id,tsc,cid,cat_name,props,props_str,name,binds,binds_str,sale_props,sale_props_str,price,desc,pic_path,pic_url,productImg,productPropImg,created,modified';
		return array ('fields' => $params ['fields'],
					 'nick' => trim($params ['nick'])
		);
	}
	/**
	 * ������Ʒ��Ϣ(taobao.products.search)
	 */
	private function products_search() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='product_id,outer_id,tsc,cid,cat_name,props,props_str,name,binds,binds_str,sale_props,sale_props_str,price,desc,pic_path,productImg,productPropImg,created,modified';
		return array ('fields' => $params ['fields'],
					 'q' => $params ['q']
		);
	}
	/**
	 * ��ȡǰ̨չʾ�ĵ����������Զ�����Ʒ��Ŀ(taobao.sellercats.list.get)
	 */
	private function cats_list() {
		$params = $this->_params;
		return array ('nick' => trim($params ['nick'])
		);
	}
	/**
	 * ��ȡ���ҵ��̵Ļ�����Ϣ(taobao.shop.get)
	 */
	private function shop() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='sid,cid,nick,title,desc,bulletin,pic_path,created,modified';
		return array ('fields' => $params ['fields'],
					 'nick' =>trim($params ['nick'])
		);
	}
	/**
	 * ��ȡǰ̨չʾ�ĵ�����Ŀ(taobao.shopcats.list.get)
	 */
	private function shopcats() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='cid,parent_cid,name,is_parent';
		return array ('fields' => $params ['fields']
		);
	}
	/**
	 * ȡ�������û�������Ϣ(taobao.sns.user.get)
	 */
	private function sns_user() {
		$params = $this->_params;
		return array ('uid' => $params ['uid']
		);
	}
	/**
	 * �������׹�����Ϣ(taobao.trades.get)
	 */
	private function trades() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='seller_nick,buyer_nick,title,type,refund_status,created,iid,price,pic_path,num,tid,buyer_message,sid,shipping_type,alipay_no,payment,discount_fee,adjust_fee,snapshot_url,status,seller_rate,buyer_rate,buyer_memo,seller_memo,pay_time,end_time,modified,buyer_obtain_point_fee,point_fee,real_point_fee,total_fee,post_fee,buyer_alipay_no,receiver_name,receiver_state,receiver_city,receiver_district,receiver_address,receiver_zip,receiver_mobile,receiver_phone,consign_time,buyer_email,commission_fee,seller_alipay_no,seller_mobile,seller_phone,seller_name,seller_email,available_confirm_fee,has_postFee,received_payment,cod_fee,timeout_action_time,orders,sku_id,sku_properties_name,item_meal_name,outer_iid,outer_sku_id';
		$params ['iid'] or $params ['fields'] ='cadb024945eb330d11d8d5d558ac4e4a';
		return array ('fields' => $params ['fields'],
					 'iid' => $params ['iid'],
					 'seller_nick' => $params ['seller_nick']
		);
	}
	/**
	 * �õ������û���Ϣ(taobao.user.get)
	 */
	private function user() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='user_id,nick,sex,buyer_credit,seller_credit,location.country,created,last_visit,location.zip,birthday,type,has_more_pic,item_img_num,item_img_size,prop_img_num,prop_img_size,auto_repost,promoted_type,status,alipay_bind,consumer_protection';
		return array ('fields' => $params ['fields'],
					 'nick' => trim($params ['nick'])
		);
	}
	/**
	 * ��ȡ����û���Ϣ(taobao.users.get)
	 */
	private function users() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='user_id,nick,sex,buyer_credit,seller_credit,location.country,created,last_visit,location.zip,birthday,type,has_more_pic,item_img_num,item_img_size,prop_img_num,prop_img_size,auto_repost,promoted_type,status,alipay_bind,consumer_protection';
		return array ('fields' => $params ['fields'],
					 'nicks' =>trim($params ['nicks'])
		);
	}
	/**
	 * �Ա�����Ŀ�ƹ�URL(taobao.taobaoke.caturl.get)
	 */
	private function taobaoke_caturl() {
		$params = $this->_params;
		return array ('cid' => $params ['cid'],
					 'nick' => trim($params ['nick']),
					 'q' => $params ['q']
		);
	}
	/**
	 * �Կ���Ʒת��(taobao.taobaoke.items.convert)
	 */
	private function taobaoke_items_convert() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='iid,title,nick,pic_url,price,click_url,commission,commission_rate,commission_num,commission_volume';
		$params['outer_code'] or $params['outer_code'] = 'bbc';
		$params['iids'] or $params['iids'] = 'bb95f3df9234fcf1dc4b718930e5d190';
		return array ('fields' => $params ['fields'],
					 'iids' => $params ['iids'],
					 'nick' => trim($params ['nick']),
					 'outer_code' => $params ['outer_code']
		);
	}
	/**
	 * ��ѯ�Ա����ƹ���Ʒ��ϸ��Ϣ (taobao.taobaoke.items.detail.get)
	 */
	private function taobaoke_items_detail() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='iid,detail_url,num_iid,title,nick,type,cid,seller_cids,props,input_pids,input_str,desc,pic_path,num,valid_thru,list_time,delist_time,stuff_status,location,price,post_fee,express_fee,ems_fee,has_discount,freight_payer,has_invoice,has_warranty,has_showcase,modified,increment,auto_repost,approve_status,postage_id,product_id,auction_point,property_alias,itemimg,propimg,sku,outer_id,is_virtural,is_taobao,is_ex,video,click_url,shop_click_url,seller_credit_score';
		return array ('fields' => $params ['fields'],
					 'nick' => trim($params ['nick'])
		);
	}
	/**
	 * ��ѯ�Ա����ƹ���Ʒ(taobao.taobaoke.items.get)
	 */
	private function taobaoke_items() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='num_iid,iid,title,nick,pic_url,price,click_url,commission,commission_rate,commission_num,commission_volume,seller_credit_score,item_location,shop_click_url';
		$params ['sort'] or $params ['sort'] ='commissionNum_desc';
		return array ('fields' => $params ['fields'],
					 'nick' => trim($params ['nick']),
					 'keyword' => $params ['keyword'],
					 'cid' => $params ['cid'],
					 'start_credit' => $params ['start_credit'],
					 'end_credit' => $params ['end_credit'],
					 'sort' => $params ['sort']
		);
	}
	/**
	 * �Ա��͹ؼ�������URL(taobao.taobaoke.listurl.get)
	 */
	private function taobaoke_listurl() {
		$params = $this->_params;
		return array ('q' => $params ['q'],
					 'nick' => trim($params ['nick']),
					 'outer_code' => $params ['outer_code']
		);
	}
	/**
	 * �Ա��ͱ����ѯ(taobao.taobaoke.report.get)
	 */
	private function taobaoke_report() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='app_key,outer_code,trade_id,pay_time,pay_price,num_iid,item_title,item_num,category_id,category_name,shop_title,commission_rate,commission,iid,seller_nick';
		return array ('fields' => $params ['fields'],
					 'date' => $params ['date']
		);
	}
	/**
	 * �Կ͵���ת��(taobao.taobaoke.shops.convert)
	 */
	private function taobaoke_shops_convert() {
		$params = $this->_params;
		$params ['fields'] or $params ['fields'] ='user_id,shop_title,click_url,shop_commission.rate';
		return array ('fields' => $params ['fields'],
					 'sids' => $params ['sids'],
					 'nick' =>trim($params ['nick']),
					 'outer_code' => $params ['outer_code']
		);
	}
	/**
	 * �ӿ���������
	 */
	public static function get_interface($inter) {
		$inters = array ('areas' => 'taobao.areas.get', 'item' => 'taobao.item.get', 'item_skus' => 'taobao.item.skus.get', 'itemcats' => 'taobao.itemcats.get', 'itemcats_v2' => 'taobao.itemcats.get.v2', 'itemprops' => 'taobao.itemprops.get', 'itempropvalues' => 'taobao.itempropvalues.get', 'items' => 'taobao.items.get', 'items_search' => 'taobao.items.search', 'logistics' => 'taobao.logistics.companies.get', 'orders' => 'taobao.orders.get', 'product' => 'taobao.product.get', 'products' => 'taobao.products.get', 'products_search' => 'taobao.products.search', 'cats_list' => 'taobao.sellercats.list.get', 'shop' => 'taobao.shop.get', 'shopcats' => 'taobao.shopcats.list.get', 'sns_user' => 'taobao.sns.user.get', 'trades' => 'taobao.trades.get', 'user' => 'taobao.user.get', 'users' => 'taobao.users.get', 'taobaoke_caturl' => 'taobao.taobaoke.caturl.get', 'taobaoke_items_convert' => 'taobao.taobaoke.items.convert', 'taobaoke_items_detail' => 'taobao.taobaoke.items.detail.get', 'taobaoke_items' => 'taobao.taobaoke.items.get', 'taobaoke_listurl' => 'taobao.taobaoke.listurl.get', 'taobaoke_report' => 'taobao.taobaoke.report.get', 'taobaoke_shops_convert' => 'taobao.taobaoke.shops.convert' );
		return $inters [$inter];
	}

}