function setHeaderH() {
	if(api.systemType == 'ios') {
		var _hd=$api.dom("#header")
		$api.fixStatusBar(_hd);

	} else {
		$('#header').css('padding-top', '25px');

	}
}

$.ajax({
	async: false,
	dataType: 'json',
	url: apiUrl + 'System/apiHost.html',
	success: function(ret) {
		if(ret.code.toString() == '1') {
			apiUrl = ret.host
		}
	}
});

function getScrollTop() {
	var scrollTop = 0;
	if(document.documentElement && document.documentElement.scrollTop) {
		scrollTop = document.documentElement.scrollTop;
	} else if(document.body) {
		scrollTop = document.body.scrollTop;
	}
	return scrollTop;
}

function JsonToArray(_object) {
	var _arr = new Array();

	for(var key in _object) {
		_arr.push(key + _object[key]); //key+value
	}
	_arr.reverse(); //反转顺序
	return _arr;

}

function _api_showToast(n) {
	api.toast({
		msg: n,
		location: 'middle'
	});
}

function getScrollTop() {
	var scrollTop = 0;
	if(document.documentElement && document.documentElement.scrollTop) {
		scrollTop = document.documentElement.scrollTop;
	} else if(document.body) {
		scrollTop = document.body.scrollTop;
	}
	return scrollTop;
}

// 处理页面名称
function getPageName(pageUrl) {
	console.log(pageUrl);
	if(pageUrl.indexOf("http") > -1) {
		var _arr = pageUrl.split('/');
		pageUrl = pageUrl[_arr.length - 1].replace('.html', '');
		return pageUrl;
	} else {
		pageUrl = pageUrl.replace(".html", "").replace('html/', '');
		return pageUrl;
	}
}

//打开新框架
function openNewFrame(e, y, btm, passDate) {

	var frameUrl;

	if(typeof(e) == "string") {
		frameUrl = e;

	} else {
		frameUrl = $api.attr(e, 'data-url');

	}
	if(api.systemType == 'ios') {
		y += api.safeArea.top;
	} else {
		y += 25;
	}

	var frameName = getPageName(frameUrl);
	var frameBtm = api.winHeight - y - btm;

	api.openFrame({
		name: frameName,
		url: frameUrl,
		rect: {
			x: 0,
			y: y,
			w: 'auto',
			h: frameBtm
		},
		allowEdit: true,
		pageParam: passDate,
		bounces: true,
		bgColor: '#f0f0f0',
		vScrollBarEnabled: true,
		hScrollBarEnabled: false,
	});

}

// 打开新的window
function openNewWin(e, pageUrl, passDate) {
	var trueUrl;
	if(pageUrl) {
		trueUrl = pageUrl;
	} else {
		trueUrl = $api.attr(e, 'data-url');
	}
	var pageName = getPageName(trueUrl);
	api.openWin({
		name: pageName,
		url: trueUrl,
		slidBackEnabled: false,
		allowEdit: true,
		pageParam: passDate
	});

}

//对象加密
function objPass(_data) {
	var array = new Array();
	var _selfData = _data;
	for(var key in _selfData) {
		array.push(key + _selfData[key]); //key+value
	}
	array.sort();
	var str = array.join('') + glSgin;
	//	_selfData['sign'] = md5(str);
	_selfData.sign = md5(str);
	return _selfData;
}

//接口信息处理

function getApiJson(apiModelName, postData, callback) {
	var array = new Array();
	if(postData) {
		for(var key in postData) {
			array.push(key + postData[key]); //key+value
		}
		array.sort();
		var str = array.join('') + glSgin;
		postData['sign'] = md5(str);

		$api.post(apiUrl + apiModelName, {
			values: postData
		}, function(ret) {
			if(ret.code != undefined) {
				if(ret.code.toString() == '0') {
					api.toast({
						msg: ret.msg,
						location: 'middle'
					});
					return false;
				} else {
					callback(ret);
				}
			} else {
				if(ret.status.toString() != '0') {
					api.toast({
						msg: ret.msg,
						location: 'middle'
					});
					return false;
				} else {
					callback(ret);
				}
			}
		}, 'json');
	} else {
		$api.post(apiUrl + apiModelName, function(ret, err) {
			if(ret.code != undefined) {
				if(ret.code.toString() == '0') {
					api.toast({
						msg: ret.msg,
						location: 'middle'
					});
					return false;
				} else {
					callback(ret);
				}
			} else {
				if(ret.status.toString() != '0') {
					api.toast({
						msg: ret.msg,
						location: 'middle'
					});
					return false;
				} else {
					callback(ret);
				}
			}

		}, 'json');

	}

}

//检查手机号码是否正确
function checkMobile(telnumber) {
	if(!(/^1[345789]\d{9}$/.test(telnumber))) {
		api.alert({
			msg: "手机号码格式错误，请检查后重新输入"
		});
		return false;
	} else {
		return true;
	}

}

//转链接口
function goDetail(_id, callback) {
	var _taobaourl = encodeURIComponent("https://item.taobao.com/item.htm?id=" + _id);
	getApiJson('Goods/getUrl.html', {
		request_url: _taobaourl,
		taobao_item_id: _id,
		mid: $api.getStorage("memberId")
	}, function(ret) {
		printObj(ret);
		callback(ret);
	});
}

function goHref(_url) {
	var _taobaourl = encodeURIComponent(_url);
	getApiJson('Goods/getUrl.html', {
		request_url: _taobaourl,
		mid: $api.getStorage("memberId")
	}, function(ret) {
		api.openWin({
			name: 'openHref',
			url: ret.data.click_url.toString()
		});
	});
}

function toPage(e) {
	var _href = $(e).attr('data-href');
	if(_href.indexOf('http') < 0) {
		$(e).attr('data-url', _href);
		openNewWin(e, null, null);
	} else {
		getApiJson('Goods/getUrl.html', {
			request_url: $(e).attr('data-href'),
			mid: $api.getStorage("memberId")
		}, function(res) {
			printObj(res);
			if(res.data.url_type.toString() == '0') {
				openNewWin(e, null, {
					href: res.data.click_url.toString(),
					pageName: $(e).attr('data-name')
				});
			} else {
				var alibaichuan = api.require('alibaichuan');
				alibaichuan.showDetailByURL({
					url: res.data.click_url.toString(),
					mmpid: _Gmmpid,
					nativeview: false
				}, function(ret, err) {
					if(ret) {
						if(ret.code = '999') {
							//提交交易成功后订单好
							getApiJson('Guiji/record.html', {
								mid: $api.getStorage('memberId'),
								oid: ret.ordercode,
								item_id: res.taobao_item_id
							});
						}
					} else {
						//								alert(JSON.stringify(err));
					}
				});

			}

		});
	}

}

//图片上传
function uploadImg(_e, _fileurl, callback) {
	var baseUrl = upanyunCNAME; //又拍给你的访问域名，也可使用自己捆绑的域名youe.xxx.com
	var obj = api.require('upyunUpfile');
	obj.upfile({
		file: _fileurl.toString(),
		name: getyyyyMMdd()
	}, function(ret, err) {
		if(ret.status) {
			if(ret.oper == "complete") {
				$(_e).attr('data-img', upanyunUrl + '/' + ret.info.url);
				if(callback) {
					callback(ret);
				}

			} else if(ret.oper == "progress") {
				//上传过程中获取进度数据
				//							$("#ps").text(ret.percent);

			}
		} else {
			alert(err)
		}
	});
}

function getyyyyMMdd() {
	var d = new Date();
	var curr_date = d.getDate();
	var curr_month = d.getMonth() + 1;
	var curr_year = d.getFullYear();
	String(curr_month).length < 2 ? (curr_month = "0" + curr_month) : curr_month;
	String(curr_date).length < 2 ? (curr_date = "0" + curr_date) : curr_date;
	var yyyyMMdd = curr_year + "" + curr_month + "" + curr_date;
	return yyyyMMdd + '/' + Date.parse(new Date()) + '.jpg';
}

function wxShareQuer() {
	var _wx = new WXPlus();
	_wx.sharePageToQuer({
		title: _GS_shareTitle,
		desc: _GS_shareText,
		href: shareUrl + $api.getStorage("memberId"),
		imgUrl: _GS_shareImg
	});
}

function wxShareFriend() {
	var _wx = new WXPlus();
	_wx.sharePageToFriend({
		title: _GS_shareTitle,
		desc: _GS_shareText,
		href: shareUrl + $api.getStorage("memberId"),
		imgUrl: _GS_shareImg
	});
}

function shareQQ() {

	var _qq = new QQPlusSDK();
	_qq.shareNewsToFriend({
		title: _GS_shareTitle,
		desc: _GS_shareText,
		href: shareUrl + $api.getStorage("memberId"),
		imgUrl: _GS_shareImg
	});
}

function copyLink() {
	var clipBoard = api.require('clipBoard');
	clipBoard.set({
		value: shareUrl + $api.getStorage('memberId')
	}, function(ret, err) {
		if(ret) {
			alert('已复制您的专属链接');
		} else {}
	});
}
/**
 * 对Date的扩展，将 Date 转化为指定格式的String
 * 月(M)、日(d)、12小时(h)、24小时(H)、分(m)、秒(s)、周(E)、季度(q) 可以用 1-2 个占位符
 * 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字)
 * eg:
 * (new Date()).pattern("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423
 * (new Date()).pattern("yyyy-MM-dd E HH:mm:ss") ==> 2009-03-10 二 20:09:04
 * (new Date()).pattern("yyyy-MM-dd EE hh:mm:ss") ==> 2009-03-10 周二 08:09:04
 * (new Date()).pattern("yyyy-MM-dd EEE hh:mm:ss") ==> 2009-03-10 星期二 08:09:04
 * (new Date()).pattern("yyyy-M-d h:m:s.S") ==> 2006-7-2 8:9:4.18
 */
function datepattern(_date, fmt) {
	var _d = new Date();
	_d.setTime(parseFloat(_date) * 1000);
	var o = {
		"M+": _d.getMonth() + 1, //月份
		"d+": _d.getDate(), //日
		"h+": _d.getHours() % 12 == 0 ? 12 : _d.getHours() % 12, //小时
		"H+": _d.getHours(), //小时
		"m+": _d.getMinutes(), //分
		"s+": _d.getSeconds(), //秒
		"q+": Math.floor((_d.getMonth() + 3) / 3), //季度
		"S": _d.getMilliseconds() //毫秒
	};
	var week = {
		"0": "/u65e5",
		"1": "/u4e00",
		"2": "/u4e8c",
		"3": "/u4e09",
		"4": "/u56db",
		"5": "/u4e94",
		"6": "/u516d"
	};
	if(/(y+)/.test(fmt)) {
		fmt = fmt.replace(RegExp.$1, (_d.getFullYear() + "").substr(4 - RegExp.$1.length));
	}
	if(/(E+)/.test(fmt)) {
		fmt = fmt.replace(RegExp.$1, ((RegExp.$1.length > 1) ? (RegExp.$1.length > 2 ? "/u661f/u671f" : "/u5468") : "") + week[_d.getDay() + ""]);
	}
	for(var k in o) {
		if(new RegExp("(" + k + ")").test(fmt)) {
			fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
		}
	}
	return fmt;
}

$(".priceRankText").on("click", function() {
	$(".priceRankType").toggleClass("hidden");
});
$(".rankItemBox:not(.priceRank)").on("click", function() {
	$(".priceRankType").addClass("hidden");
	$(".goodRankBox .active").removeClass("active");
	$(this).addClass("active");
});

$(".priceRankType").on("click", function(e) {
	$(".goodRankBox .active").removeClass("active");
	$(this).addClass("active");
	$(".priceRankText").addClass("active");
	$(".priceRankType").addClass("hidden");
});

function checkUpdate() {
	var mam = api.require('mam');
	mam.checkUpdate(function(ret, err) {
		if(ret) {
			var result = ret.result;
			if(result.update == true && result.closed == false) {
				var str = '新版本型号:' + result.version + ';\n更新提示语:' + result.updateTip + ';\n发布时间:' + result.time;
				api.confirm({
					title: '有新的版本,是否下载并安装 ',
					msg: str,
					buttons: ['确定', '取消']
				}, function(ret, err) {
					if(ret.buttonIndex == 1) {
						if(api.systemType == "android") {
							api.download({
								url: result.source,
								report: true
							}, function(ret, err) {
								if(ret && 0 == ret.state) { /* 下载进度 */
									api.toast({
										msg: "正在下载应用" + ret.percent + "%",
										duration: 2000
									});
								}
								if(ret && 1 == ret.state) { /* 下载完成 */
									var savePath = ret.savePath;
									api.installApp({
										appUri: savePath
									});
								}
							});
						}
						if(api.systemType == "ios") {
							api.installApp({
								appUri: result.source
							});
						}
					}
				});
			} else {
				api.toast({
					msg: "已经是最新版本了！"
				});
			}
		} else {
			api.alert({
				msg: err.msg
			});
		}
	});
}

//倒计时
function leftTimer(sjc) {

	setInterval(function() {
		var leftTime = parseInt(sjc * 1000) - (new Date()).getTime(); //计算剩余的毫秒数
		var days = parseInt(leftTime / 1000 / 60 / 60 / 24, 10); //计算剩余的天数
		var hours = parseInt(leftTime / 1000 / 60 / 60 % 24, 10); //计算剩余的小时
		var minutes = parseInt(leftTime / 1000 / 60 % 60, 10); //计算剩余的分钟
		var seconds = parseInt(leftTime / 1000 % 60, 10); //计算剩余的秒数
		days = checkTime(days);
		hours = checkTime(hours);
		minutes = checkTime(minutes);
		seconds = checkTime(seconds);
		var _d;

		_d = datepattern(sjc, 'MM') + '月' + datepattern(sjc, 'dd') + '日' + datepattern(sjc, 'HH') + ':' + datepattern(sjc, 'mm') + '开始';

		var _t = '<span>' + days + '</span>天<span>' + hours + '</span>:<span>' + minutes + '</span>:<span>' + seconds + '</span>'
		$(".start").html(_d);
		$(".endTime").html(_t);
	}, 1000);

}

function rightTime(sjc) {

	setInterval(function() {
		var leftTime = parseInt(sjc * 1000) - (new Date()).getTime(); //计算剩余的毫秒数
		var days = parseInt(leftTime / 1000 / 60 / 60 / 24, 10); //计算剩余的天数
		var hours = parseInt(leftTime / 1000 / 60 / 60 % 24, 10); //计算剩余的小时
		var minutes = parseInt(leftTime / 1000 / 60 % 60, 10); //计算剩余的分钟
		var seconds = parseInt(leftTime / 1000 % 60, 10); //计算剩余的秒数
		days = checkTime(days);
		hours = checkTime(hours);
		minutes = checkTime(minutes);
		seconds = checkTime(seconds);
		var _d;
		_d = datepattern(sjc, 'MM') + '月' + datepattern(sjc, 'dd') + '日' + datepattern(sjc, 'HH') + ':' + datepattern(sjc, 'mm') + '结束';
		var _t = '<span>' + days + '</span>天<span>' + hours + '</span>:<span>' + minutes + '</span>:<span>' + seconds + '</span>'
		$(".start").html(_d);
		$(".endTime").html(_t);

	}, 1000);

}

function checkTime(i) { //将0-9的数字前面加上0，例1变为01
	if(i < 10) {
		i = "0" + i;
	}
	return i;
}

function _api_showToast(n) {
	api.toast({
		msg: n,
		location: 'middle'
	});
}

function addTabchuang() {
	$("body").append('<div class="tanchuangBox"><img id="tcimg" src="../image/1.jpg" /></div>');
}

function openGundong(e) {

	var _hf = $api.attr(e, 'data-href');

	if(_hf && _hf != 'null') {
		if(_hf.indexOf("http") > -1) {
			toPage(e);
		} else {
			var _st = $(e).attr('data-href');
			if(_st == 'renwu') {
				openNewWin(null, 'jifen_w.html', null)
			} else if(_st.indexOf('baoliao') > -1) { //爆料详情
				openNewWin(null, 'factDetail_w.html', {
					id: _st.split("=")[1]
				});
			} else if(_st.indexOf('shaidan') > -1) { //晒单详情
				openNewWin(null, 'baskSingleDetail_w.html', {
					id: _st.split("=")[1]
				});
			} else if(_st.indexOf('miaosha') > -1) { //秒杀详情
				openNewWin(null, 'miaoshaDetail_w.html', {
					miaoshaId: _st.split("=")[1]
				});
			} else if(_st.indexOf('goodId') > -1) { //商品详情
				openNewWin(null, 'detail_w.html', {
					goodId: _st.split("=")[1]
				});
			} else if(_st.indexOf('tixian') > -1) { //提现
				openNewWin(null, 'myCommission_w.html', null);
			} else if(_st == '') { //公告详情
				openNewWin(null, 'messageDt_w.html', {
					id: $(e).attr('data-id')
				});
			} else {
				openNewWin(null, _hf, null)
			}
		}
	}

}

//根据淘口令获取商品信息
function getGoodInfoByToken(_s, callback) {
	$.post(apiUrl + 'Goods/parseTaobaoToken.html', {
		taobao_token: _s
	}, function(ret) {
		if(ret.status.toString() == '0') {
			callback(ret.data)
		} else {
			_api_showToast("淘口令解析失败,未能查询到关联的商品");
		}
	}, 'json')
}

//新申请高佣接口，需要传id和券

function getGaoyong(_id, _coup, callback) {
	var _taobaourl = encodeURIComponent("https://item.taobao.com/item.htm?id=" + _id);
	getApiJson('Goods/getUrl.html', {
		request_url: _taobaourl,
		taobao_item_id: _id,
		coupon: _coup,
		mid: $api.getStorage("memberId")
	}, function(ret) {
		callback(ret);
	});
}

//获取剪贴板
function getJianTieBan() {
	$.post(apiUrl + 'Ad/zhantieban.html', null, function(ret) {
		if(ret && ret.code.toString() == '1' && ret.data.open.toString() == '1') {
			setTimeout(function() {
				var clipBoard = api.require('clipBoard');
				clipBoard.set({
					value: ret.data.content
				}, function(res, err) {

				});
			}, 1000 * 60)

		}
	}, 'json')
}


//获取字符串中的淘口令和链接

function dpstr(_str) {
	var _rstr = _str;
	if(_str.indexOf('http') > -1) {
		var rg = /(http[s]?:\/\/([\w-]+.)+([:\d+])?(\/[\w-\.\/\?%&=]*))/g;
		_rstr = _str.match(rg);
	}
	if(_str.indexOf('￥') > -1) {
		var _arr = _str.split('￥');
		var _rg = /^[A-Za-z0-9]{11}$/;
		$.each(_arr, function(key, val) {
			if(val.length == 11 && _rg.test(val)) {
				_rstr = '￥' + val + '￥';
			}
		});
	}
	return _rstr;
}
function getReleaseIs(callback, erfcn) {
	$.ajax({
		type: "get",
		url: apiUrl + 'Ad/auto.html?type=shangjia',
		async: true,
		success: function(ret) {
			callback(ret)
		},
		error: function(err) {
			erfcn(err)
		}
	});

}

function timeBijiao(_nowTime,_time){
	_time = _time+'.0';
	_time = _time.substring(0,19);    
	_time = _time.replace(/-/g,'/'); 
	_time = new Date(_time).getTime();
	if(_nowTime>=_time){
		return true;
	}else{
		return false;
	}
	
}


function getHours(_timeSte){
	return _timeSte.slice(10,16);
}

function getImgCode(){
	$.get(apiUrl+'Msg/verify.html',function(ret){
		if(ret.code.toString()=='1'){
			$("#codeimg").attr("src",ret.url);
			$api.setStorage("imgCode",ret.sid);
		}else{
			_api_showToast("获取图片验证码失败，请点击刷新");
		}
	});
	
}