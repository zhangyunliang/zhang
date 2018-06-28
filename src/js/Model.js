//提交对象加密
function objEncrypt(_obj) {
	var array = new Array();
	for(var key in _obj) {
		array.push(key + _obj[key]); //key+value
	}
	array.sort();
	var str = array.join('') + glSgin;
	_obj.sign = md5(str);
	return _obj;
}

//用户Member对象
;
(function() {
	var Member = function() {}

	Member.prototype = {
		//注册
		registered: function() {

		},
		//登录
		login: function(_tel, _pass, callback) {
			var _postData = {
				mobile: _tel,
				password: _pass
			}
			$.post(apiUrl + 'member/login.html', objEncrypt(_postData), function(ret) {
				if(ret.code.toString() == '1') {
					this.atrb = Object.assign({}, this.atrb, ret.info);
					this.atrb.avatar = this.atrb.avatar ? this.atrb.avatar : '../image/hp.jpg';
					this.atrb.nickname = this.atrb.nickname ? this.atrb.nickname : this.atrb.mobile;
					callback(this.atrb);
				} else {
					alert('登录错误：' + ret.msg);
				}
			}, 'json');

		},
		//检查用户是否已注册
		isReg: function(_tel, callback) {
			$.post(apiUrl + 'Member/checkMobile.html', objPass({
				mobile: _tel
			}), function(ret) {
				callback(ret);
			}, 'json');
		},
		//退出
		exit: function() {
			$api.rmStorage('memberId');
		},
		//编辑信息
		edit: function(_editData, callback) {
			$.post(apiUrl + 'member/setUser.html', objEncrypt(_editData), function(ret) {
				if(ret.code.toString() == '1') {
					alert('修改成功');
				} else {
					alert('修改信息错误：' + ret.msg);
				}
			});
		},
		//获取用户信息
		get: function(_id, callback) {
			_id = _id ? _id : this.atrb.id;
			if(!_id) {
				console.log('您还未登录');
			}
			var _postData = {
				mid: _id
			}
			var returnAjax;
			$.post(apiUrl + 'member/get.html', objEncrypt(_postData), function(ret) {
				if(ret.code.toString() == '1') {
					this.atrb = Object.assign({}, this.atrb, ret.data);
					this.atrb.avatar = this.atrb.avatar ? this.atrb.avatar : '../image/hp.jpg';
					this.atrb.nickname = this.atrb.nickname ? this.atrb.nickname : this.atrb.mobile;
					callback(this.atrb);
				} else {
					alert('获取用户信息失败');
					return false;
				}
			}, 'json');

		},
		//获取集分宝
		getJiFenBao: function(callback) {
			$.post(apiUrl + 'Member/shouru.html', objPass({
				mid: $api.getStorage("memberId"),
				type: 'shouru'
			}), function(ret) {
				callback(ret);
			}, 'json')
		}

	}
	window.Member = Member;
})()

//百川BaiChuan对象
;
(function() {
	var BaiChuan = function() {
		//		init();
	};

	function init() {
		var param = {
			isvcode: "feelinglife"
		};

		var alibaichuan = api.require('alibaichuan');
		alibaichuan.initTaeSDK(param, function(ret, err) {
			if(ret) {
				//					alert(JSON.stringify(ret));
			} else {
				alert(JSON.stringify(err));
			}
		});
	}
	BaiChuan.prototype = {
		login: function(callback) {
			var alibaichuan = api.require('alibaichuan');
			alibaichuan.showLogin(function(ret, err) {
				callback(ret);
			});
		},
		openUrl: function(_id, _url) {
			var param = {
				url: _url + '&nowake=1',
				mmpid: _Gmmpid,
				nativeview: false
			};
			console.log(_Gmmpid);
			var alibaichuan = api.require('alibaichuan');
			alibaichuan.showDetailByURL(param, function(ret, err) {
				if(ret) {
					if(ret.code = '999') {
						//提交交易成功后订单好
						var _postOrder = {
							mid: $api.getStorage('memberId'),
							oid: ret.ordercode,
							item_id: _id
						}
						$.post(apiUrl + 'Guiji/record.html', objPass(_postOrder), function() {

						}, 'json');
					}
				} else {
					//								alert(JSON.stringify(err));
				}
			});
		},
		openId: function(_id) {
			var alibaichuan = api.require('alibaichuan');
			var _taobaourl = "https://item.taobao.com/item.htm?id=" + _id;
			var _urldata = {
				request_url: _taobaourl,
				mid: $api.getStorage("memberId")

			};
			$.post(apiUrl + 'Goods/getUrl.html', _urldata, function(res) {
				if(res.data.url_type.toString() == '1') {
					var param = {
						url: res.data.click_url + '&nowake=1',
						mmpid: _Gmmpid,
						nativeview: false

					};
					alibaichuan.showDetailByURL(param, function(ret, err) {
						if(ret) {
							if(ret.code = '999') {
								//提交交易成功后订单好
								var _postOrder = {
									mid: $api.getStorage('memberId'),
									oid: ret.ordercode,
									item_id: _id
								}
								//								alert(ret.ordercode);
								$.post(apiUrl + 'Guiji/record.html', objPass(_postOrder), function() {

								}, 'json');
							}
						} else {
							//								alert(JSON.stringify(err));
						}
					});
				} else {
					//					alert(JSON.stringify(_urldata));
					//					alert(JSON.stringify(ret));

				}

			}, 'json');
		},
		//打开原商品不转高佣
		openOldId: function(_id) {
			var param = {
				url: 'https://item.taobao.com/item.htm?id=' + _id + '&nowake=1',
				mmpid: _Gmmpid,
				nativeview: false
			};
			var alibaichuan = api.require('alibaichuan');
			alibaichuan.showDetailByURL(param, function(ret, err) {
				if(ret) {
					if(ret.code = '999') {
						//提交交易成功后订单好
						var _postOrder = {
							mid: $api.getStorage('memberId'),
							oid: ret.ordercode,
							item_id: _id
						}
						//								alert(ret.ordercode);
						$.post(apiUrl + 'Guiji/record.html', objPass(_postOrder), function() {

						}, 'json');
					}
				} else {
					//								alert(JSON.stringify(err));
				}
			});

		}
	}
	window.BaiChuan = BaiChuan;
})()

//轮播图 Swiper
;
(function() {
	var MySwiper = function() {
		this.model = '<div class="swiper-slide" data-url="_link" data-href="" onclick="openNewWin(this)" tapmode>' +
			'<img src="_image" />' +
			'</div>';
	};
	MySwiper.prototype = {
		loding: function() {
			$.post(apiUrl + 'Ad/slide.html', {}, function(ret) {
				var _html = '';
				if(ret.code.toString() == '1') {
					$.each(ret.data, function(key, val) {
						_html += '<div class="swiper-slide" data-name="' + val.name + '" data-url="page_w.html" data-href="' + val.link + '" onclick="openGundong(this)" tapmode>' +
							'<img src="' + val.image + '" />' +
							'</div>';
					});
					$('#swiper .swiper-wrapper').html(_html);
					var mySwiper = new Swiper('#swiper', {
						direction: 'horizontal',
						loop: true,
						autoplay: 3000,
						// 如果需要分页器
						pagination: '.swiper-pagination'
					});
				} else {
					alert("轮播图加载失败");
				}
			}, 'json');
			return this;
		}
	}
	window.MySwiper = MySwiper;

})()

//推荐位Recommend
;
(function() {
	var Recommend = function() {

	}
	Recommend.prototype = {
		loding: function() {
			$.post(apiUrl + 'Ad/tuijianwei.html', {}, function(ret) {
				var _html = '';
				for(var i = 1; i < 5; i++) {
					if(ret.data['ad' + i].state == 'yes') {

						if(ret.data['ad' + i].description) {
							_html += '<li data-url="page_w.html" data-href="' + ret.data['ad' + i].link + '" data-name="' + ret.data['ad' + i].name + '"  onclick="toPage(this)" tapmode>' +
								'<h3>' + ret.data['ad' + i].name + '</h3>' +
								'<p>' + ret.data['ad' + i].description + '</p>' +
								'<img src="' + ret.data['ad' + i].image + '" />' +
								'</li>';
						} else {
							_html += '<li class="only" data-url="page_w.html" data-href="' + ret.data['ad' + i].link + '" data-name="' + ret.data['ad' + i].name + '"  onclick="toPage(this)" tapmode style=" background-image: url(' + ret.data['ad' + i].image + ');"></li>';

						}

					} else {
						_html += '<li data-url="page_w.html" data-href="' + ret.data['ad' + i].page + '" data-name="' + ret.data['ad' + i].name + '"  onclick="toPage(this)" tapmode>' +
							'<h3>' + ret.data['ad' + i].title + '</h3>' +
							'<p>' + ret.data['ad' + i].describe + '</p>' +
							'<img src="' + ret.data['ad' + i].icon + '" />' +
							'</li>';
					}

				}
				$('.recommendBox').html(_html);
			}, 'json');
			return this;
		}
	}
	window.Recommend = Recommend;
})()

//商品Good
;
(function() {
	var Good = function() {

	}
	Good.prototype = {
		getJXList: function(_data, callback) { //获取精选商品列表
			$.post(apiUrl + 'goods/jingxuan.html', objEncrypt(_data), function(ret) {
				if(ret.status.toString() == '0') {
					callback(ret.data.list);
				} else {
					console.log('未获取到任何列表');
				}
			}, 'json');
		},
		addDom: function(e, goodList, callback) {
			var _html = '';
			var imgH = (api.winWidth - 20) * 0.485;
			var shopType = new Array(); //商品来源店铺类型
			shopType['B'] = 'icon-tianmao5';
			shopType['C'] = 'icon-taobao1';
			for(var i = 0; i < goodList.length; i++) {
				_html += '<div class="goodsRow">' +
					'<a href="javascript:;" data-id="' + goodList[i].taobao_item_id + '" tapmode onclick="toDetail(this)">' +
					'<div class="goodsImgBox" style="height:' + imgH + 'px;background-image: url(' + goodList[i].taobao_item_image_url + ');">' +
					'</div>' +
					'<p>' + goodList[i].title_short + '</p>' +
					'<div class="goodfljg"><span>券后</span><label>￥' + goodList[i].price_final + '</label></div>';
				_html += '<div class="goodTagBox">' +
					'<div class="goodsSource">' +
					'<label>领券</label>' +
					'<span>减' + parseInt(goodList[i].coupon_value) + '</span>' +
					'</div>' +
					'<div class="goodsSales">' +
					'<span>' + goodList[i].sales_num + '人已买</span>' +
					'<i class="iconfont ' + shopType[goodList[i].shop_type] + '"></i>' +
					'</div></div>';

				if($api.getStorage("peizhi") == 'fanli') {
					_html += '<div class="priceBox">' +
						'<div class="ddt">' +
						'<label>返集分宝</label>' +
						'<span>' + parseInt(goodList[i].ticheng * 100) + '</span>' +
						'</div>' +
						'<div class="ddt">' +
						'<label>VIP返集分宝</label>' +
						'<span>' + parseInt(goodList[i].vip_ticheng * 100) + '</span>' +
						'</div>' +
						'</div>';
				}
				_html += '</a></div>';

			}
			e.append(_html);
			callback();

		},
		addSelectDom: function(e, goodList, callback) {
			var _html = '';
			var imgH = (api.winWidth - 20) * 0.485;
			var shopType = new Array(); //商品来源店铺类型
			shopType['B'] = 'icon-tianmao5';
			shopType['C'] = 'icon-taobao1';
			for(var i = 0; i < goodList.length; i++) {
				_html += '<div class="goodsRow" data-shop="' + goodList[i].shop_type + '" data-id="' + goodList[i].taobao_item_id + '" data-img="' + goodList[i].taobao_item_image_url + '">' +
					'<i class="iconfont icon-roundcheckfill"></i>' +
					'<a href="javascript:;" data-id="' + goodList[i].taobao_item_id + '" tapmode ">' +
					'<div class="goodsImgBox" style="height:' + imgH + 'px;background-image: url(' + goodList[i].taobao_item_image_url + ');">' +
					'</div>' +
					'<p class="ttl">' + goodList[i].title + '</p>' +
					'<div class="goodfljg"><span>券后</span><label class="qhj">￥' + goodList[i].price_final + '</label></div>';
				_html += '<div class="goodTagBox">' +
					'<div class="goodsSource">' +
					'<label>领券</label>' +
					'<span class="quan">减' + parseInt(goodList[i].coupon_value) + '</span>' +
					'</div>' +
					'<div class="goodsSales">' +
					'<span>' + goodList[i].sales_num + '人已买</span>' +
					'<i class="iconfont ' + shopType[goodList[i].shop_type] + '"></i>' +
					'</div></div>';

				_html += '<div class="priceBox">' +
					'<div class="ddt">' +
					'<label>佣金率</label>' +
					'<span>' + parseFloat(parseFloat(parseFloat(goodList[i].vip_ticheng) / parseFloat(goodList[i].price_final)).toFixed(4) * 100).toFixed(2) + '%</span>' +
					'</div>' +
					'<div class="ddt">' +
					'<label>预估</label>' +
					'<span>' + parseInt(goodList[i].vip_ticheng * 100) + '集分宝</span>' +
					'</div>' +
					'</div>';

				_html += '</a></div>';

			}
			e.append(_html);
			callback();

		},
		addJRDom: function(e, _list, callback) {
			var _html = '';
			var imgH = (api.winWidth - 20) * 0.485;
			var shopType = new Array(); //商品来源店铺类型
			shopType['B'] = 'icon-tianmao5';
			shopType['C'] = 'icon-taobao1';
			$.each(_list, function(key, goodList) {
				for(var i = 0; i < goodList.length; i++) {
					_html += '<div class="goodsRow" data-id="' + goodList[i].item_id + '" data-img="' + goodList[i].image_url_local + '">' +
						'<i class="iconfont icon-roundcheckfill"></i>' +
						'<a href="javascript:;" data-id="' + goodList[i].item_id + '" tapmode ">' +
						'<div class="goodsImgBox" style="height:' + imgH + 'px;background-image: url(' + goodList[i].image_url_local + ');">' +
						'</div>' +
						'<p class="ttl">' + goodList[i].title + '</p>' +
						'<div class="goodfljg"><span>券后</span><label class="qhj">￥' + goodList[i].price_final + '</label></div>';
					_html += '<div class="goodTagBox">' +
						'<div class="goodsSource">' +
						'<label>领券</label>' +
						'<span class="quan">减' + parseFloat(parseFloat(goodList[i].price_original) - parseFloat(goodList[i].price_final)).toFixed(2) + '</span>' +
						'</div>' +
						'<div class="goodsSales">' +
						'<span>' + goodList[i].sales_num + '人已买</span>' +
						'<i class="iconfont ' + shopType[goodList[i].shop_type] + '"></i>' +
						'</div></div>';

					_html += '<div class="priceBox">' +
						'<div class="ddt">' +
						'<label>佣金率</label>' +
						'<span>' + parseFloat(parseFloat(parseFloat(goodList[i].vip_ticheng) / parseFloat(goodList[i].price_final)).toFixed(4) * 100).toFixed(2) + '%</span>' +
						'</div>' +
						'<div class="ddt">' +
						'<label>预估</label>' +
						'<span>' + parseInt(goodList[i].vip_ticheng * 100) + '集分宝</span>' +
						'</div>' +
						'</div>';

					_html += '</a></div>';

				}
			})

			e.append(_html);
			callback();

		},
		addLongSarchDom: function(e, goodList, red, callback) {
			var _html = '';
			var imgH = (api.winWidth - 20) * 0.485;
			var shopType = new Array(); //商品来源店铺类型
			shopType['B'] = 'icon-tianmao5';
			shopType['C'] = 'icon-taobao1';
			for(var i = 0; i < goodList.length; i++) {
				_html += '<div class="goodsRow" data-shop="' + goodList[i].userType + '" data-id="' + goodList[i].auctionId + '" data-img="http:' + goodList[i].pictUrl + '">' +
					'<i class="iconfont icon-roundcheckfill"></i>' +
					'<a href="javascript:;" data-id="' + goodList[i].auctionId + '" tapmode ">' +
					'<div class="goodsImgBox" style="height:' + imgH + 'px;background-image: url(http:' + goodList[i].pictUrl + ');">' +
					'</div>' +
					'<p class="ttl">' + goodList[i].title + '</p>' +
					'<div class="goodfljg"><span>券后</span><label class="qhj">￥' + parseFloat((parseFloat(goodList[i].zkPrice) - parseFloat(goodList[i].couponAmount))).toFixed(2) + '</label></div>';
				_html += '<div class="goodTagBox">';
				if(parseInt(goodList[i].couponAmount) != 0) {
					_html += '<div class="goodsSource">' +
						'<label>领券</label>' +
						'<span class="quan">减' + parseInt(goodList[i].couponAmount) + '</span>' +
						'</div>';
				}

				_html += '<div class="goodsSales">' +
					'<span>' + goodList[i].biz30day + '人已买</span>' +
					'<i class="iconfont ' + shopType[goodList[i].userType] + '"></i>' +
					'</div></div>';

				_html += '<div class="priceBox">' +
					'<div class="ddt">' +
					'<label>佣金率</label>' +
					'<span>' + parseFloat(parseFloat(parseFloat(red.vip_money) / parseFloat(goodList[i].zkPrice)).toFixed(4) * 100).toFixed(2) + '%</span>' +
					'</div>' +
					'<div class="ddt">' +
					'<label>预估</label>' +
					'<span>' + parseInt(red.vip_money * 100) + '集分宝</span>' +
					'</div>' +
					'</div>';
				_html += '</a></div>';

			}
			e.append(_html);
			callback();
		},
		getById: function() {

		},
		getList: function(_data, callback) { //获取商品列表
			$.post(apiUrl + 'goods/taobao.html', objEncrypt(_data), function(ret) {
				if(ret.status.toString() == '0') {
					callback(ret.data.list);
				} else {
					console.log('未获取到任何列表');
				}
			}, 'json');
		},
		getListByKind: function(_data, callback) { //通过分类ID获取商品列表
			$.post(apiUrl + 'goods/taobao.html', objEncrypt(_data), function(ret) {
				if(ret.status.toString() == '0') {
					callback(ret.data.list);
				} else {
					console.log('未获取到任何列表');
				}
			}, 'json');
		}
	}
	window.Good = Good;
})()

//爆料
;
(function() {
	var Fact = function() {

	}
	Fact.prototype = {
		addDom: function() {

		},
		getList: function() {
			$.post(apiUrl + 'Baoliao/tuijian.html', {}, function(ret) {

			}, 'json');
		},
		getDetail: function() {

		}
	}
	window.Fact = Fact;
})()

//秒杀
;
(function(window) {

	var MiaoSha = function() {};

	MiaoSha.prototype = {
		//获取列表
		getList: function(callback) {
			$.post(apiUrl + 'Miaoshavtwo/shoplist.html', null, function(ret) {
				if(ret.code.toString() == "1") {
					callback(ret.data);
				} else {
					api.toast({
						msg: '获取秒杀列表数据失败'
					});
				}
			}, 'json');
		},
		//添加列表
		addDom: function(_e, _jsonList) {
			var _html = '';
			var msState = [{}, {
				labelText: '秒杀中',
				classText: 'msz'
			}, {
				labelText: '未开始',
				classText: 'wks'
			}, {
				labelText: '已结束',
				classText: 'yjs'
			}, {
				labelText: '已抢完',
				classText: 'yqw'
			}];
			$.each(_jsonList, function(key, val) {
				_html += '<div class="row" data-index="' + key + '" data-id="' + val.id + '">' +
					'<div class="miaoshaImg">' +
					'<img src="' + val.thumb + '" />' +
					'</div>' +
					'<div class="miaoshaInfo">' +
					'<p class="title">' + val.title + '</p>';
				if(val.type == 3) {
					_html += '<div class="priceBox">' +
						'<p>' +
						'<span>到手价:</span>' +
						'<label>￥' + val.price + '</label>' +
						'</p>' +
						'<p class="jfb">返' + parseInt(val.pebate_price_vip) + '集分宝</p>' +
						'</div>';
				} else {
					_html += '<div class="priceBox">' +
						'<p>' +
						'<span>秒杀价:</span>' +
						'<label class="msjjfb">' + val.money + '集分宝</label>' +
						'</p>' +

						'</div>';
				}
				_html += '<div class="shuliangBox">' +
					'<p>' +
					'<span>' + val.shop_number_wfc + '</span>' +
					'<label>/' + val.shop_number + '份</label>' +
					'</p>' +
					'<a href="javascript:;" class="' + msState[val.shop_state].classText + '">' + msState[val.shop_state].labelText + '</a>' +
					'</div></div></div>';

			});
			_e.html(_html);

		},
		//通过ID获取详情
		getDetailById: function(_id, callback) {
			$.post(apiUrl + 'Miaosha/shopShow.html', objPass({
				id: _id
			}), function(ret) {
				if(ret.code.toString() == "1") {
					printObj(ret);
					callback(ret.data);
				} else {
					api.toast({
						msg: '获取秒杀详情失败'
					});
				}
			}, 'json');
		},
		//秒杀
		miaosha: function(_id, callback) {
			$.post(apiUrl + 'Miaosha/submitOrder.html', objPass({
				mid: $api.getStorage('memberId'),
				shopid: _id
			}), function(ret) {
				if(ret.code.toString() == "1") {
					callback(ret);
				} else {
					_api_showToast(ret.msg);
				}

			}, 'json');
		}
	}

	window.MiaoSha = MiaoSha;

})(window)

//秒杀订单
;
(function(window) {

	var MSOrder = function() {};

	MSOrder.prototype = {
		//获取列表
		getList: function(_mid, callback) {
			$.post(apiUrl + 'Miaosha/orderList.html', objPass({
				mid: _mid
			}), function(ret) {
				printObj(ret);
				if(ret.code.toString() == "1") {
					callback(ret.data);
				} else {
					api.toast({
						msg: '获取秒杀订单列表失败'
					});
				}
			}, 'json');
		},
		//通过状态获取列表
		getListByStateId: function(_id, callback) {
			$.post(apiUrl + 'Miaosha/orderList.html', objPass({
				mid: $api.getStorage("memberId"),
				state: _id
			}), function(ret) {
				if(ret.code.toString() == "1") {
					callback(ret.data);
				} else {
					api.toast({
						msg: '获取秒杀订单列表失败'
					});
				}
			}, 'json');
		},
		//addDom
		addDom: function(_e, _jsonList) {
			var orderState = [{},
				{
					labelText: '待处理',
					classText: ''
				},
				{
					labelText: '待填单',
					classText: ''
				}, {
					labelText: '待确认',
					classText: ''
				}, {
					labelText: '待传图',
					classText: ''
				}, {
					labelText: '已完成',
					classText: ''
				}
			]
			var _html = "";
			$.each(_jsonList, function(key, val) {
				_html += '<div class="factRow" data-id="' + val.ordersn + '"  tapmode>' +
					'<div class="factHead">' +
					'<i class="iconfont icon-wenzhang"></i>' +
					'<span>秒杀编号：' + val.ordersn + '</span>' +
					'<span>' + orderState[val.state].labelText + '</span>' +
					'</div>' +
					'<div class="factDtBox">' +
					'<div class="factImgBox">' +
					'<img src="' + val.thumb + '" />' +
					'</div>' +
					'<div class="factDt">' +
					'<h2>' + val.title + '</h2>';
				if(val.type.toString() == '3') {
					_html += '<div class="orderMoneyBox">' +
						'<div class="orderMoneyItem">' +
						'<label>成交金额：</label>' +
						'<span>￥' + val.shop_price + '</span>' +
						'</div>' +
						'<div class="orderMoneyItem">' +
						'<label>预估收益：</label>' +
						'<span>' + (parseFloat(val.pebate_price) * 100).toFixed(0) + '集分宝</span>' +
						'</div></div>'
				}
				_html += '</div></div>' +
					'<div class="orderOpt">';
				if(val.state.toString() == '1' && val.type.toString() == '1') {
					_html += '<span class="btn selectAdd" >选择地址</span>';
				}
				if(val.state.toString() == '1' && val.type.toString() == '3') {
					_html += '<span class="btn byGood" data-goodId="' + val.item_id + '" data-isgy="' + val.is_gaoyong + '">去购买</span>';

				}
				if(val.type.toString() == "3" && val.photo == null) {
					_html += '<span  class="btn postImg" >上传图片</span>';

				}
				if(val.type.toString() == "3" && val.ordersn_taobao == null) {
					_html += '<span  class="btn inputTbOrder" >填写单号</span>';

				}
				if(val.state.toString() == '1' && val.type.toString() == '2') {
					_html += '<span class="btn inputMember" >填写信息</span>';
				}
				if(val.state.toString() == '1' && val.type.toString() == '3') {

				}
				if(val.state.toString() == '3' && val.type.toString() == '3') {
					_html += '<span class="btn shureGood">确认收货</span>';
				}
				_html += '</div></div>';

			});
			_e.html(_html);
		},
		//根据ID获取详情
		getDetailById: function(_id, callback) {
			$.post(apiUrl + 'Miaosha/orderInfo.html', objPass({
				mid: $api.getStorage("memberId"),
				ordersn: _id
			}), function(ret) {
				if(ret.code.toString() == "1") {
					callback(ret);
				} else {
					api.toast({
						msg: '获取秒杀订单详情失败'
					});
				}
			}, 'json')
		},
		//填写淘宝单号
		addTaobaoId: function(_msoid, _tboid, callback) {
			$.post(apiUrl + 'Miaosha/addOrderSn.html', objPass({
				mid: $api.getStorage("memberId"),
				ordersn: _msoid,
				ordersn_taobao: _tboid
			}), function(ret) {
				if(ret.code.toString() == '1') {
					callback();
				} else {
					api.toast({
						msg: ret.msg
					})
				}
				callback();
			}, 'json');
		},
		//提交个人信息
		postPersonInfo: function(_data, callback) {
			$.post(apiUrl + 'Miaosha/addOrderUserInfo.html', objPass(_data), function(ret) {
				console.log(JSON.stringify(ret));
				if(ret.code.toString() == '1') {
					callback();
				} else {
					api.toast({
						msg: ret.msg
					});
				}
			}, 'json')
		},
		//提交图片
		postImg: function(_data, callback) {
			$.post(apiUrl + 'Miaosha/addOrderPhoto.html', objPass(_data), function(ret) {
				console.log(JSON.stringify(ret));
				if(ret.code.toString() == '1') {
					callback();
				} else {
					api.toast({
						msg: ret.msg
					});
				}
			}, 'json')
		},
	}

	window.MSOrder = MSOrder;
})(window)

//地址管理
;
(function(window) {
	var Address = function() {};

	Address.prototype = {
		getList: function(callback) {
			$.post(apiUrl + 'Address/lists.html', objPass({
				mid: $api.getStorage('memberId')
			}), function(ret) {
				if(ret.code.toString() == "1") {
					callback(ret.data);
				} else {
					api.toast({
						msg: '获取地址列表失败'
					});
				}
			}, 'json');
		},

		//addListDom
		addListDom: function(_e, _jsonList) {
			var _html = '';
			$.each(_jsonList, function(key, val) {
				_html += '<div class="row" data-id="' + val.id + '">' +
					'<p class="nameAdTel">' +
					'<span >' + val.realname + '</span>' +
					'<span >' + val.mobile + '</span>' +
					'</p>' +
					'<p class="addressInfo">' + val.province + val.city + val.area + val.address + '</p>' +
					'<div class="addressOpt">' +
					'<div class="defaultBox">';

				if(val.isdefault.toString() == '1') {
					_html += '<i class="iconfont icon-squarecheckfill fc-m"></i>' +
						'<span class="fc-m">默认地址</span>';
				} else {
					_html += '<i class="iconfont icon-square" ></i>' +
						'<span class="setdf">设为默认</span>';
				}

				_html += '</div>' +
					'<div class="optBox">' +
					'<i class="iconfont icon-edit" ></i>' +
					'<label class="editadd">编辑</label>' +
					'<i class="iconfont icon-delete" ></i>' +
					'<label class="deladd" >删除</label>' +
					'</div></div></div>';
			});
			_e.html(_html);

		},
		//addListDom
		addSelectListDom: function(_e, _jsonList, _selectId) {
			var _html = '';
			$.each(_jsonList, function(key, val) {
				_html += '<div class="row" data-id="' + val.id + '">' +
					'<p class="nameAdTel">' +
					'<span >' + val.realname + '</span>' +
					'<span >' + val.mobile + '</span>' +
					'</p>' +
					'<p class="addressInfo">' + val.province + val.city + val.area + val.address + '</p>' +
					'<div class="addressOpt">' +
					'<div class="defaultBox">';

				if(val.id == _selectId) {
					_html += '<i class="iconfont  icon-squarecheckfill fc-m"></i>' +
						'<span class="yixuanze">已选择</span>';
				} else {
					_html += '<i class="iconfont icon-square fc-b" "></i>' +
						'<span class="weixuanze">未选择</span>';
				}

				_html += '</div>' +
					'<div class="optBox">' +
					'<i class="iconfont icon-edit" ></i>' +
					'<label class="editadd">编辑</label>' +
					'<i class="iconfont icon-delete"></i>' +
					'<label class="deladd" >删除</label>' +
					'</div></div></div>';
			});
			_e.html(_html);

		},
		//添加/编辑地址
		eidtAddress: function(_data, callback) {
			$.post(apiUrl + 'Address/update.html', objPass(_data), function(ret) {
				if(ret.code.toString() == "1") {
					console.log(JSON.stringify(ret));
					callback();
				} else {
					api.toast({
						msg: '保存地址失败'
					});
				}
			}, 'json');
		},
		//删除地址
		delAddress: function(_id, callback) {
			$.post(apiUrl + 'Address/del.html', objPass({
				mid: $api.getStorage("memberId"),
				id: _id
			}), function(ret) {
				if(ret.code.toString() == "1") {
					callback(ret);
				} else {
					api.toast({
						msg: "删除失败，请稍后尝试"
					})
				}
			}, 'json');
		},
		//通过ID获取详情
		getDetailById: function(_id, callback) {
			$.post(apiUrl + 'Address/getOne.html', objPass({
				mid: $api.getStorage("memberId"),
				id: _id
			}), function(ret) {
				if(ret.code.toString() == "1") {
					callback(ret.data);
				} else {
					api.toast({
						msg: "使用ID获取地址详情失败"
					})
				}
			}, 'json');
		}
	}

	window.Address = Address;
})(window)

//积分与签到
;
(function(window) {
	var JiFen = function() {};

	JiFen.prototype = {
		//获取连续签到天数
		getLXDays: function(callback) {
			$.post(apiUrl + 'Qiandao/sendDay.html', objPass({
				mid: $api.getStorage("memberId")
			}), function(ret) {
				if(ret.code.toString() == "1") {
					callback(ret.data);
				} else {
					api.toast({
						msg: "获取连续签到天数失败"
					})
				}
			}, 'json');
		},
		//获取任务列表
		getRWList: function(callback) {
			$.post(apiUrl + 'Qiandao/renwuList.html', objPass({
				mid: $api.getStorage("memberId")
			}), function(ret) {
				if(ret.code.toString() == "1") {
					callback(ret);
				} else {
					api.toast({
						msg: "获取任务列表失败"
					})
				}
			}, 'json');
		},
		//添加任务列表dom
		addRWListDom: function(_e, _jsonList) {
			var _html = "";
			$.each(_jsonList, function(key, val) {
				_html += '<div class="row"  data-key="' + key + '">' +
					'<img  src="' + val.icon + '" />' +
					'<span>' + val.title + '</span>';
				if(val.state.toString() == 'no') {
					_html += '<label class="wwc">未完成</label>';
				} else {
					if(key == 'qiandao') {
						_html += '<label >查看签到明细</label>';
					} else {
						_html += '<label >已完成</label>';
					}

				}
				_html += '</div>';
			});
			_e.html(_html);
		},
		//签到
		qiandao: function(callback) {
			$.post(apiUrl + 'Qiandao/send.html', objPass({
				mid: $api.getStorage("memberId")
			}), function(ret) {

				callback(ret);

			}, 'json');
		}
	}

	window.JiFen = JiFen;

})(window)

function jiguang() {
	var ajpush = api.require('ajpush');
	if(api.systemType != 'ios') {
		ajpush.init(function(ret, err) {
			if(ret && ret.status) {
				ajpush.getRegistrationId(function(retd) {
					var registrationId = retd.id;
				});
				ajpush.setListener(
					function(rets) {
						var id = rets.id;
						var title = rets.title;
						var content = rets.content;
						var extra = rets.extra;
						console.log("861Line:" + JSON.stringify(extra));
						chuliTongzhi(extra);

					}
				);
			}
		});
		api.addEventListener({
			name: 'appintent'
		}, function(ret, err) {
			if(ret && ret.appParam.ajpush) {
				var xiaoxiBody = ret.appParam.ajpush;
				var jsonStr = xiaoxiBody.extra;
				console.log("872Line:" + JSON.stringify(jsonStr));
				chuliTongzhi(jsonStr);

			}
		});
	} else {
		ajpush.getRegistrationId(function(retd, err) {
			var registrationId = retd.id;
		});
		api.addEventListener({
			name: 'noticeclicked'
		}, function(ret, err) {

			if(ret && ret.value) {
				var ajpush = ret.value;
				var content = ajpush.content;
				var extra = ajpush.extra;
				console.log("887Line:" + JSON.stringify(extra));
				chuliTongzhi(extra);

			}
		})
	}
	//两个监听事件
	api.addEventListener({
		name: 'pause'
	}, function(ret, err) {
		ajpush.onPause();
		//监听应用进入后台，通知jpush暂停事件
	})
	api.addEventListener({
		name: 'resume'
	}, function(ret, err) {
		ajpush.onResume();
		//监听应用恢复到前台，通知jpush恢复事件
	});
}

function chuliTongzhi(_data) {

	if(_data.type == '内页') {
		if(_data.data) {
			_data.data = JSON.parse(_data.data)
		} else {
			_data.data = null;
		}
		openNewWin(null, 'html/' + _data.url, _data.data);
	}
	if(_data.type == '外链') {

		openNewWin(null, 'html/page_w.html', {
			href: _data.href
		});
	}
	if(_data.type == '商品') {
		openNewWin(null, 'html/detail_w.html', {
			goodId: _data.goodId
		});
	}
}
//加载个人中心banner
function getMyBanner(callback) {
	$.get(apiUrl + 'Ad/auto.html?type=guanggao', function(ret) {
		callback(ret);

	}, 'json');
}
/**
 * QQPlus QQ第三方登录与分享
 * */

(function() {
	var QQPlusSDK = function() {};

	QQPlusSDK.prototype = {
		//用户是否安装了QQ
		isInstalled: function(callback) {
			var qq = api.require('QQPlus');
			qq.installed(function(ret, err) {
				if(ret.status) {
					callback();
				} else {
					_api_showToast("您还没有安装手机QQ，请安装后再分享");
				}
			});
		},
		//使用QQ登录
		login: function(callback) {
			var qq = api.require('QQPlus');
			qq.login(function(ret, err) {
				if(ret) {
					//msg: ret.openId + ret.accessToken
					callback(ret);
				} else {
					_api_showToast(err.msg);
				}
			});
		},
		//获取用户QQ信息
		getInfo: function(callback) {
			var qq = api.require('QQPlus');
			qq.getUserInfo(function(ret, err) {
				if(ret.status) {
					callback(ret);
				} else {
					_api_showToast('获取QQ第三方登录信息失败：' + err.msg);
				}
			});
		},
		//分享纯文本
		shareText: function(_text) {
			var qq = api.require('QQPlus');
			qq.shareText({
				text: _text
			}, function(ret, err) {
				if(ret.status) {
					_api_showToast('分享成功！');
				} else {
					_api_showToast('分享失败！');
				}
			});
		},
		//分享图片
		shareImg: function(_imgUrl) {
			var qq = api.require('QQPlus');
			qq.shareImage({
				type: 'QFriend',
				imgPath: _imgUrl
			}, function(ret, err) {
				if(ret.status) {
					_api_showToast('分享成功！');
				} else {
					_api_showToast('分享失败！');
				}
			});
		},
		//分享图文链接消息
		shareNewsToFriend: function(_shareData) {
			var qq = api.require('QQPlus');
			qq.shareNews({
				type: 'QFriend',
				url: _shareData.href,
				title: _shareData.title,
				description: _shareData.desc,
				imgUrl: _shareData.imgUrl //网络路径
			}, function(ret, err) {
				if(ret.status) {
					_api_showToast('分享成功！');
				} else {
					_api_showToast('分享失败！');
				}
			});
		}
	}
	window.QQPlusSDK = QQPlusSDK;
})();
/**
 * WX 微信第三方登录与分享
 * */
(function() {
	var WXPlus = function() {};
	WXPlus.prototype = {
		//用户是否安装了微信
		isInstalled: function(callback) {
			var wx = api.require('wx');
			wx.isInstalled(function(ret, err) {
				if(ret.installed) {
					callback();
				} else {
					_api_showToast("您还没有安装微信，请安装后再分享");
				}
			});
		},
		//微信登录
		login: function() {

		},
		//分享给好友
		sharePageToFriend: function(_shareData) {
			var wx = api.require('wx');
			if(_shareData.imgUrl.indexOf("http") > -1) {
				_api_DownFile(_shareData.imgUrl, function(res) {
					wx.shareWebpage({
						scene: 'session',
						title: _shareData.title,
						description: _shareData.desc,
						contentUrl: _shareData.href,
						thumb: res
					}, function(ret, err) {
						if(ret.status) {
							_api_showToast('分享成功！');
						} else {}
					});
				});
			} else {
				wx.shareWebpage({
					scene: 'session',
					title: _shareData.title,
					description: _shareData.desc,
					contentUrl: _shareData.href,
					thumb: _shareData.imgUrl
				}, function(ret, err) {
					if(ret.status) {
						_api_showToast('分享成功！');
					} else {}
				});
			}

		},
		//分享到朋友圈
		sharePageToQuer: function(_shareData) {
			var wx = api.require('wx');
			if(_shareData.imgUrl.indexOf("http") > -1) {
				_api_DownFile(_shareData.imgUrl, function(res) {
					wx.shareWebpage({
						scene: 'timeline',
						title: _shareData.title,
						description: _shareData.desc,
						contentUrl: _shareData.href,
						thumb: res
					}, function(ret, err) {
						if(ret.status) {
							_api_showToast('分享成功！');
						} else {}
					});
				});
			} else {
				wx.shareWebpage({
					scene: 'timeline',
					title: _shareData.title,
					description: _shareData.desc,
					contentUrl: _shareData.href,
					thumb: _shareData.imgUrl
				}, function(ret, err) {
					if(ret.status) {
						_api_showToast('分享成功！');
					} else {}
				});
			}

		},
		//分享图片
		shareImg: function(_imgUrl, _n) {
			var _type = _n ? 'session' : 'timeline';
			var wx = api.require('wx');
			wx.shareImage({
				scene: _type,
				thumb: _imgUrl,
				contentUrl: _imgUrl
			}, function(ret, err) {
				if(ret.status) {
					_api_showToast('分享成功');
				} else {
					//					_api_showToast("分享失败");
				}
			});
		}

	}
	window.WXPlus = WXPlus;
})()

;

function _api_DownFile(_url, callback) {
	api.download({
		url: _url,
		report: true,
		cache: true,
		allowResume: true
	}, function(ret, err) {
		if(ret.state == 1) {
			//下载成功  ret.savePath
			callback(ret.savePath);
		}
	});
}

;
(function(window) {
	var Order = function() {};
	Order.prototype = {
		//获取预估收益列表
		getYuguList: function(_postData, callback) {
			$.post(apiUrl + 'Member/yuguList.html', objPass(_postData), function(ret) {
				if(ret.code.toString() == '1') {
					callback(ret.data);
				} else {
					_api_showToast("获取预估收益列表失败" + ret.msg);
				}
			}, 'json');
		},
		//加载我的预估收益
		addMyYuguDom: function(_e, _jsonList) {
			var _html = '';
			$.each(_jsonList, function(key, val) {
				_html += '<li class="row _type" >' +
					'<span>' + datepattern(val.addtime, 'yyyy-MM-dd hh:mm:ss') + '</span>' +
					'<span>' + parseFloat(val.money_yugu * 100).toFixed(0) + '集分宝</span>' +
					'<span>' + val.oid + '</span>' +
					'</li>'
			});
			$(_e).html(_html);
		},
		//加载下级的预估收益
		addXiajiYuguDom: function(_e, _jsonList) {
			var _html = '';
			$.each(_jsonList, function(key, val) {
				_html += '<li class="row _type" >' +
					'<span>' + val.mobile + '</span>' +
					'<span>' + parseFloat(val.yugu * 100).toFixed(0) + '集分宝</span>' +
					'<span>' + val.cengji + '</span>' +
					'</li>';
			});
			$(_e).html(_html);
		}
	}
	window.Order = Order;
})(window)

function printObj(_n) {
	console.log(JSON.stringify(_n));
}
//显示进度提示框
function _api_ShowProgress(_n, _x) {
	api.showProgress({
		title: '正在处理中', //标题
		text: _n, //显示文本
		modal: _x //是否模态（模态时整个页面将不可交互）
	});
}

//隐藏进度提示框
function _api_HideProgress() {
	api.hideProgress();
}

;
(function(window) {
	var Coupons = function() {};

	Coupons.prototype = {
		getCouponsList: function(callback) {
			$.post(apiUrl + 'Qiandao/couponList_v2.html', objPass({
				mid: $api.getStorage("memberId"),
			}), function(ret) {
				printObj(ret);
				if(ret.code.toString() == '1') {
					callback(ret.data);
				} else {
					_api_showToast("获取集分宝券失败");
				}
			}, 'json')
		},
		getListOld: function(s, callback) {
			$.post(apiUrl + 'Qiandao/couponList.html', objPass({
				mid: $api.getStorage("memberId"),
				status: s
			}), function(ret) {
				printObj(ret);
				if(ret.code.toString() == '1') {
					callback(ret.data);
				} else {
					_api_showToast("获取集分宝券失败");
				}
			}, 'json')
		},
		addDom: function(_e, _jsonList) {
			var _html = '';
			//status 0 可使用 1已使用 2已过期
			$.each(_jsonList, function(key, val) {
				_html += '<div class="row" data-id="' + val.id + '" data-success="' + val.success + '" data-status="' + val.status + '">' +
					'<div class="cpInfo">' +
					'<div class="jfb">' +
					'<span>' + val.jifenbao + '</span>' +
					'<label>集分宝</label>' +
					'</div>' +
					'<div class="tiaojian">累计提现满' + val.tixian + '元赠送</div>' +
					'<div class="guoqi">过期时间：' + val.over_time + '</div>' +
					'</div>';
				if(val.success.toString() == '1') {
					if(val.status.toString() == '0') {
						_html += '<div class="cpOp">' +
							'<i class="iconfont icon-redpacket_fill"></i>' +
							'<span>点击打开</span>';
					} else if(val.status.toString() == '2') {
						_html += '<div class="cpOp active">' +
							'<i class="iconfont icon-redpacket_fill"></i>' +
							'<span>已过期</span>';
					} else {
						_html += '<div class="cpOp active">' +
							'<i class="iconfont icon-redpacket"></i>' +
							'<span>已使用</span>';
					}
				} else {
					_html += '<div class="cpOp active">' +
						'<i class="iconfont icon-redpacket"></i>' +
						'<span>未完成</span>';
				}

				_html += '</div>' +
					'</div>';

			});
			$(_e).html(_html);
		},
		addOldDom: function(_e, _jsonList) {
			var _html = '';
			$.each(_jsonList, function(key, val) {
				_html += '<div class="row" >' +
					'<div class="cpInfo" style="padding-top:10px;">' +
					'<div class="jfb">' +
					'<span>' + val.jifenbao + '</span>' +
					'<label>集分宝</label>' +
					'</div>' +
					'<div class="tiaojian">累计提现满' + val.remark + '元赠送</div>' +
					'</div>' +
					'<div class="cpOp active">' +
					'<i class="iconfont icon-redpacket_fill"></i>' +
					'<span>已使用</span>' +
					'</div>' +
					'</div>';

			});
			$(_e).html(_html);
		},
		//根据ID核销券
		hexiaoById: function(_id, callback) {
			$.post(apiUrl + 'Qiandao/couponHexiao.html', objPass({
				mid: $api.getStorage("memberId"),
				couponid: _id
			}), function(ret) {
				if(ret.code.toString() == '1') {
					callback();
				} else {
					_api_showToast("打开失败," + ret.msg);
				}
			}, 'json')
		}

	}

	window.Coupons = Coupons;
})(window)

;

/**
 * 滚动字幕
 * */

(function(window) {
	var GunDong = function() {};

	GunDong.prototype = {
		//获取接口数据
		getList: function(callback) {
			$.get(apiUrl + 'Ad/gongao.html', function(ret) {
				if(ret.code.toString() == '1') {
					callback(ret.data);
				} else {
					_api_showToast("获取滚动公告失败！");
				}
			}, 'json')
		},
		//addDom
		addDom: function(_e, _jsonList) {
			var _html = "";
			$.each(_jsonList, function(key, val) {
				_html += '<div class="swiper-slide gundongzimu" data-url="page_w.html" data-name="' + val.title + '" data-href="' + val.url + '" onclick="openGundong(this)">' +
					'<span>HOT</span>' +
					'<p>' + val.title + '</p>' +
					'</div>';
			});
			_e.html(_html);
			var mySwiper = new Swiper('.gunDongCnt', {
				direction: 'vertical',
				loop: true,
				autoplay: 3000,
				autoplayDisableOnInteraction: false,
			});
		}
	}

	window.GunDong = GunDong;
})(window);;

/**
 * 首页滚动组
 * */

(function(window) {

	var IndexSwiper = function() {};

	IndexSwiper.prototype = {
		getList: function(callback) {
			$.get(apiUrl + 'Goods/get_share_daylist.html', function(ret) {
				
					callback(ret);
				
			}, 'json')
		},
		addDom: function(_e, _jsonList) {
			var _html = "";
			$.each(_jsonList, function(key, val) {
				if(key<1){
				_html += '<div class="swiper-slide goodsGroupBox">';
				$.each(val, function(idx, itm) {
					_html += '<div class="goodsGroupItem" data-id="' + itm.item_id + '">' +
						'<img src="' + itm.item_image_url + '" />' +
						'<p class="goodsGroupGoodTitle">' + itm.title + '</p>' +
						'<div class="goodsGroupGoodPrice">' +
						'<span>￥' + parseFloat(itm.price_original).toFixed(1) + '</span>' +
						'<label>券后￥' + parseFloat(itm.price_final).toFixed(1) + '</label>' +
						'</div></div>';

				});
				_html += '</div>';	
				}
				
			});
			_e.html(_html);
			var mySwiper2 = new Swiper('.GoodsGroup', {
				direction: 'horizontal',
				
			});
		}
	}

	window.IndexSwiper = IndexSwiper;

})(window);

//获取弹窗广告
function getDialogAd() {
	$.get(apiUrl + 'Ad/auto.html?type=tanchuang', function(ret) {
		console.log(JSON.stringify(ret));

		if(ret.data.tanchuang && ret.data.tanchuang.open.toString() == '1') {
			$("#tcimg").attr("src", ret.data.tanchuang.photo);
			$("#tcimg").attr("data-href", ret.data.tanchuang.link);
			//图片地址或链接地址更换的时候清空缓存

			if(ret.data.tanchuang.status.toString() == '0') {
				$(".tanchuangBox").removeClass("hidden");
			} else {
				var _tan;

				if(ret.data.tanchuang.photo != $api.getStorage("tanImg") || ret.data.tanchuang.link != $api.getStorage("tanLink")) {
					console.log("new");
					$api.setStorage("tan", 0);
				}
				if($api.getStorage("tan")) {
					console.log("已打开次数" + $api.getStorage("tan"));
					_tan = parseInt($api.getStorage("tan"));
				} else {
					_tan = 0;
				}
				if(_tan != parseInt(ret.data.tanchuang.status)) {
					$(".tanchuangBox").removeClass("hidden");
					$api.setStorage("tan", _tan + 1);
					$api.setStorage('tanImg', ret.data.tanchuang.photo);
					$api.setStorage('tanLink', ret.data.tanchuang.link);
				}
			}
		}

	});
}
//检查新消息
function checkNewMsg() {
	if($api.getStorage("memberId")) {
		$.post(apiUrl + 'Ad/xiaoxi.html', {
			mid: $api.getStorage("memberId")
		}, function(ret) {
			console.log(ret.data.length);
			if(ret.data.length != $api.getStorage("msgCount")) {
				var jsfun = 'showNewMsg();';
				api.execScript({
					name: 'root',
					frameName: 'home_fr',
					script: jsfun
				});
				api.execScript({
					name: 'root',
					frameName: 'my_fr',
					script: jsfun
				});
			}
		}, 'json');
	}
}

/**
 * 收益
 * */
(function() {
	var ShouYi = function() {};

	ShouYi.prototype = {
		getList: function(_postData, callback) {
			$.post(apiUrl + 'Member/shoujiList.html', objPass(_postData), function(ret) {
				if(ret.code.toString() == '1') {
					printObj(ret);
					callback(ret.data);
				} else {
					_api_showToast("获取收益列表失败" + ret.msg);
				}
			}, 'json');
		},
	}

	window.ShouYi = ShouYi;
})(window)

;

//分享合集页获取地址

function getJiHePgae(_arrStr, callback) {
	$.post(apiUrl + 'Goods/generate_share_list.html', {
		mid: $api.getStorage("memberId"),
		item_id_list: _arrStr
	}, function(ret) {
		if(ret.status.toString() == '0') {
			callback(ret.data);
		} else {
			_api_showToast("获取集合页面地址失败");
		}
	}, 'json')
}

//单品分享
;
(function() {
	var SingleShare = function() {};
	SingleShare.prototype = {
		getList:function(callback){
			$.get(apiUrl+"Goods/get_share_items.html",function(ret){
					callback(ret);
			},'json');
			
		},
		addTimeDom: function(_jsonList, callback) {
			var _timeBarHtml = ''; //时间轴
			
			var nowTime=Date.parse(new Date());
			var _nowSwiper=0;
			$.each(_jsonList, function(key, val) {
				_timeBarHtml += '<div class="swiper-slide">' +
					'<div class="timeItem">' +
					'<span>'+getHours(val.time)+'</span>'+
					'<label>';
					if(timeBijiao(nowTime,val.time)){
						_timeBarHtml+='已开始'
					}else{
						if(_nowSwiper==0){
							_nowSwiper=key-1;
						}
						_timeBarHtml+='未开始'
					}
					_timeBarHtml+='</label>' +
					'</div>' +
					'</div>';

				
				
			});
			$("#timeSwiper .swiper-wrapper").html(_timeBarHtml);
			
			callback(_nowSwiper);
		},
		addGoodDom:function(_jsonList, callback){
			var _listHtml = '';
			var nowTime=Date.parse(new Date());
			var _nowSwiper=0;
			
			$.each(_jsonList, function(key, val) {
				if(timeBijiao(nowTime,val.time)){
						
				}else{
					if(_nowSwiper==0){
						_nowSwiper=key-1;
					}
					
				}
				_listHtml += '<div class="swiper-slide">' +
					'<div class="singleShareList">';
				if(val.item_list.length>0){
					$.each(val.item_list, function(idx, itm) {
						_listHtml += '<div class="row" data-gid="'+itm.item_id+'" data-cid="'+itm.coupon_id+'">' +
						'<div class="appLog">' +
						'<img src="../image/loog.png" />' +
						'</div>' +
						'<div class="goodCnt">' +
						'<p class="title">'+itm.title+'</p>' +
						'<div class="goodWenan">'+itm.copywriter.replace('\r\n','<br/>')+'</div>' +
						'<div class="jiagge">'+
						'<p class="yuanjia" data-yuanjia="'+itm.price_original+'">原价:￥'+itm.price_original+'</p>'+
						'<p class="quanhou" data-quanhou="'+itm.price_final+'">券后:￥<span>'+itm.price_final+'</span></p>'+
						'<p class="quanBox"><label>领券</label><span>减'+ parseInt(itm.coupon_value)+'</span></p>'+
						'</div>'+
						'<div class="goodImgBox">' ;
						if(itm.is_outdated.toString()=='1'){
							_listHtml+='<img src="../image/sellout.png" class="sellout" />'
						}
						$.each(itm.item_images, function(_index,_val) {
							_listHtml+='<img src="../image/logindimg.jpg" data-src="'+_val+'" class="swiper-lazy" />';
						});
						_listHtml+='</div>' ;
						if(itm.comment){
							_listHtml+='<div class="goodComment">' +
							'<div class="commemtDt">'+itm.comment+'</div>' +
							'<div class="copyBorder">' +
							'<div class="copyComment">' +
							'<span>复制</span>' +
							'<span>评论</span>' +
							'</div>' +
							'</div>' +
							'</div>';
						}
						
						_listHtml+='<div class="goodOpBox" >' +
						'<div class="btn goumai" data-statut="'+itm.is_outdated+'" data-gid="'+itm.item_id+'" data-cid="'+itm.coupon_id+'">' +
						'<i class="iconfont icon-ticket"></i>' +
						'<span>领券购买</span>' +
						'</div>' +
						'<div class="btn fenxiang" data-statut="'+itm.is_outdated+'">' +
						'<i class="iconfont icon-share"></i>' +
						'<span>一键分享</span>' +
						'</div>' +
						'</div>' +
						'</div>' +
						'</div>';
					});
				}else{
					_listHtml+='<div class="wushuju">'+
							'<i class="iconfont icon-time"></i>'+
							'<span>商品正在上架中...</span>'+
						'</div>';
				}
				_listHtml += '</div>' +
				'</div>';
				
				
			});
			$("#cntSwiper .swiper-wrapper").html(_listHtml);
			callback(_nowSwiper);
		},
		appendGood:function(_pageIndex,_jsonList,callback){
			var _listHtml = '';
			$.each(_jsonList, function(idx,itm) {
				if(idx>=(_pageIndex*5) && idx<(_pageIndex+1)*5){
						_listHtml += '<div class="row" data-gid="'+itm.item_id+'" data-cid="'+itm.coupon_id+'">' +
						'<div class="appLog">' +
						'<img src="../image/loog.png" />' +
						'</div>' +
						'<div class="goodCnt">' +
						'<p class="title">'+itm.title+'</p>' +
						'<div class="goodWenan">'+itm.copywriter.replace('\r\n','<br/>')+'</div>' +
						'<div class="jiagge">'+
						'<p class="yuanjia" data-yuanjia="'+itm.price_original+'">原价:￥'+itm.price_original+'</p>'+
						'<p class="quanhou" data-quanhou="'+itm.price_final+'">券后:￥<span>'+itm.price_final+'</span></p>'+
						'<p class="quanBox"><label>领券</label><span>减'+ parseInt(itm.coupon_value)+'</span></p>'+
						'</div>'+
						'<div class="goodImgBox">' ;
						if(itm.is_outdated.toString()=='1'){
							_listHtml+='<img src="../image/sellout.png" class="sellout" />'
						}
						$.each(itm.item_images, function(_index,_val) {
							_listHtml+='<img src="../image/logindimg.jpg" data-src="'+_val+'" class="swiper-lazy" />';
						});
						_listHtml+='</div>' ;
						if(itm.comment){
							_listHtml+='<div class="goodComment">' +
							'<div class="commemtDt">'+itm.comment+'</div>' +
							'<div class="copyBorder">' +
							'<div class="copyComment">' +
							'<span>复制</span>' +
							'<span>评论</span>' +
							'</div>' +
							'</div>' +
							'</div>';
						}
						
						_listHtml+='<div class="goodOpBox">' +
						'<div class="btn goumai" data-statut="'+itm.is_outdated+'" data-gid="'+itm.item_id+'" data-cid="'+itm.coupon_id+'">' +
						'<i class="iconfont icon-ticket"></i>' +
						'<span>领券购买</span>' +
						'</div>' +
						'<div class="btn fenxiang" data-statut="'+itm.is_outdated+'">' +
						'<i class="iconfont icon-share"></i>' +
						'<span>一键分享</span>' +
						'</div>' +
						'</div>' +
						'</div>' +
						'</div>';
					}
			});
			
			callback(_listHtml);
				
		},
		
	},
	
	window.SingleShare = SingleShare;

})(window)

;