

/**
 * 网络请求对象ApiRequest
 */

var ApiRequest = function(opt) {
	this.defaults = {
		globalUrl: _GS_apiPath,
		model: ''
	}
	this.sets = deepAssign({},this.defaults, opt);

}
ApiRequest.prototype = {
	getJSON: function(callback) { //jqueryGET
		var _this = this;
		$.get(_this.sets.globalUrl + _this.sets.model, function(ret) {
			callback(ret);
		});
	},
	postJSON: function(postData, callback) { //jqueryPOST
		var _this = this;
		$.post(_this.sets.globalUrl + _this.sets.model, postData, function(ret) {

				callback(ret);

			},
			'json')
	},
	postText: function(postData, callback) { //jqueryPOST
		var _this = this;
		$.post(_this.sets.globalUrl + _this.sets.model, postData, function(ret) {
			callback(ret);
		}, 'text');
	},
	apiGet: function(callback) { //apicloud跨域请求get方式
		var _this = this;
		api.ajax({
			url: _this.sets.globalUrl + _this.sets.model,
			method: 'get'
		}, function(ret) {

			callback(ret);

		});
	},
	apiPost: function(postData, callback) { //apicloud跨域请求post方式
		var _this = this;
		api.ajax({
			url: _this.sets.globalUrl + _this.sets.model,
			method: 'post',
			data: postData
		}, function(ret) {
			callback(ret);
		});
	}
}
window.ApiRequest = ApiRequest;

function _api_setHeaderH() {
	if(api.systemType == 'ios') {
		$('#header').css('padding-top', '20px');

	} else {
		$('#header').css('padding-top', '25px');

	}
}

//打开Win
function _api_OpenWin(opt, pageP, jsP) {
	var _opt = {
		isHeader: true, //是否有头部
		isBack: true, //是否有返回按钮
		isBtn: false, //是否右右侧按钮
		btnText: '提交', //右侧按钮文字
		isShare: false, //右侧按钮是否有分享
		top: 0,
		bottom: 0
	}

	var openOpt = deepAssign({},_opt, opt);
	if(openOpt.isHeader) {
		openOpt.top = _api_sysIsAd ? 65 : 70;
		openOpt.pageHeight = api.winHeight - openOpt.bottom - openOpt.top;
		api.openWin({
			name: getPageName(openOpt.wPath), //winName
			url: _GS_pagePath + 'public/header.html', //win的地址
			hScrollBarEnabled: false,
			pageParam: deepAssign({},pageP, openOpt, jsP)
		});
	} else {
		api.openWin({
			name: getPageName(openOpt.wPath), //winName
			url: _GS_pagePath + openOpt.wPath, //win的地址
			pageParam: deepAssign({},pageP, openOpt, jsP)
		});

	}

}
//打开Frame
function _api_OpenFrame(opt) {
	api.openFrame({
		name: getPageName(opt.wPath),
		url: _GS_pagePath + opt.wPath,
		rect: {
			x: 0,
			y: opt.top,
			w: 'auto',
			h: opt.pageHeight,
		},
		allowEdit: true,
		pageParam: opt
	});
}

//setStorage
function _api_SetStorage(n, m) {
	$api.setStorage(n, m);
}
//getStorage
function _api_GetStorage(n) {
	return $api.getStorage(n);
}
//removeStorage
function _api_RemoveStorage(n) {
	$api.rmStorage(n);
}

//getAppVeision		获取app版本
function _api_GetAppV() {
	return api.appVersion;
}

//getSystemType		获取系统类型
function _api_GetSytType() {
	return api.systemType;
}

//showTask	显示提示框
function _api_ShowToast(n) {
	api.toast({
		msg: n,
		location: 'middle'
	});
}

function _api_sysIsAd() {
	if(_api_GetSytType() == "android") {
		return true;
	} else {
		return false;
	}
}

//显示进度提示框
function _api_ShowProgress(_n, _x) {
	api.showProgress({
		title: _n, //标题
		text: '正在处理中，请稍后', //显示文本
		modal: _x //是否模态（模态时整个页面将不可交互）
	});
}

//隐藏进度提示框
function _api_HideProgress() {
	api.hideProgress();
}

//复制文字
function _api_CopyText(_str) {
	var clipBoard = api.require('clipBoard'); //剪贴板
	clipBoard.set({
		value: _str
	}, function(ret, err) {
		if(ret) {
			_api_ShowToast('复制成功');
		}
	});
}

//粘贴剪贴板里文字
function _api_pastText(callback) {
	var clipBoard = api.require('clipBoard'); //剪贴板
	clipBoard.get(function(ret, err) {
		if(ret) {
			callback(ret.value);
		} else {
			_api_ShowToast('粘贴失败，请重新复制后尝试');
		}
	});
}

//下载文件
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

//缓存图片
function _api_imgCache(_imgUrl, callback) {
	api.imageCache({
		url: _imgUrl
	}, function(ret, err) {
		callback(ret.url);
	});
}

//跨页面运行JS
/*
 * opt={
 * 	wName：windowName
 * 	fName：frameName
 * 	jsName：'hello()'
 * }
 */

function _api_RunJS(opt, callback) {
	if((!opt.wName) && (!opt.fName)) { //在当前win运行
		api.execScript({
			name: api.winName,
			script: opt.JSName
		});
		callback();
	}
	if((!opt.wName) && (opt.fName)) { //在当前win下的某个Frame运行
		api.execScript({
			name: api.winName,
			frameName: opt.fName,
			script: opt.JSName
		});
		callback();

	}
	if((opt.wName) && (!opt.fName)) { //在某个win下的当前Frame运行
		api.execScript({
			name: opt.wName,
			frameName: api.frameName,
			script: opt.JSName
		});
		callback();

	}
	if((opt.wName) && (opt.fName)) { //在某个win下的某个Frame运行
		api.execScript({
			name: opt.wName,
			frameName: opt.fName,
			script: opt.JSName
		});
		callback();
	}
	if(opt.ctWin) {
		api.closeToWin({
			name: opt.ctWin
		})
	}

}
//图片选择方法
function _api_selectImg(callback) {
	api.getPicture({
		sourceType: 'library',
		encodingType: 'jpg,png',
		mediaValue: 'pic',
		destinationType: 'url',
		allowEdit: true,
		quality: 80,
		saveToPhotoAlbum: false
	}, function(ret, err) {
		if(ret) {
			if(ret.data) {
				callback(ret.data);
			}
		} else {
			_api_ShowToast('未选择图片');
		}
	});
}

//检查APP更新
function _api_checkUpdate() {
	var mam = api.require('mam'); //版本更新
	mam.checkUpdate(function(ret, err) {
		if(ret) {
			var result = ret.result;
			if(result.update == true && result.closed == false) {
				var str = '新版本型号:' + result.version + ';\n更新提示语:\n' + result.updateTip + ';\n发布时间:' + result.time;
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
									_api_ShowProgress("正在下载应用" + ret.percent + "%", true);
								}
								if(ret && 1 == ret.state) { /* 下载完成 */
									_api_HideProgress();
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
				_api_ShowToast('已经是最新版本了');
			}
		} else {
			api.alert({
				msg: '更新模块加载失败' + err.msg
			});
		}
	});
}

;
/**
 * 又拍云图片上传模块
 * 
 * */
(function() {
	var UPaiYun = function() {}
	UPaiYun.prototype = {
		uploadImg: function(_imgPath, imgName, callback) {
			var upy = api.require('upyunUpfile'); //又拍云
			upy.upfile({
				file: _imgPath, //图片地址
				name: imgName
			}, function(ret, err) {
				if(ret.status) {
					if(ret.oper == "complete") {
						_api_HideProgress();
						//ret.info.url  上传成功后的url地址
						if(callback) {
							callback(ret);
						}
					} else if(ret.oper == "progress") {
						//上传过程中获取进度数据
						_api_ShowProgress('图片上传中，上传进度：' + ret.percent + '%');

					}
				} else {
					alert('图片上传失败：' + JSON.stringify(err));
				}
			})
		}
	}
	window.UPaiYun = UPaiYun;
})();

/**
 * QQPlus QQ第三方登录与分享
 * */

(function() {
	var QQPlus = function() {};
	QQPlus.prototype = {
		//用户是否安装了QQ
		isInstalled: function(callback) {
			var qq = api.require('QQPlus');
			qq.installed(function(ret, err) {
				callback(ret);
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
					_api_ShowToast(err.msg);
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
					_api_ShowToast('获取QQ第三方登录信息失败：' + err.msg);
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
					_api_ShowToast('分享成功！');
				} else {
					_api_ShowToast('分享失败！');
				}
			});
		},
		//分享图片
		shareText: function(_imgUrl) {
			var qq = api.require('QQPlus');
			_api_imgCache(_imgUrl, function(res) {
				qq.shareImage({
					type: 'QFriend',
					imgPath: res
				}, function(ret, err) {
					if(ret.status) {
						_api_ShowToast('分享成功！');
					} else {
						_api_ShowToast('分享失败！');
					}
				});
			});
		},
		//分享图文链接消息
		shareNews: function(_text, _desp, _imgUrl, _link, callback) {
			var qq = api.require('QQPlus');
			qq.shareNews({
				url: _link,
				title: _desp,
				description: _text,
				imgUrl: _imgUrl,
				type: 'QFriend'
			}, function(ret, err) {
				if(ret.status) {
					_api_ShowToast('分享成功！');
					callback();
				} else {
					_api_ShowToast("分享失败请稍后再试");
				}
			});
		}
	}
	window.QQPlus = QQPlus;

})();
/**
 * WX 微信第三方登录与分享
 * */
(function() {
	var WX = function() {};
	WX.prototype = {
		//用户是否安装了微信
		isInstalled: function(callback) {
			var wx = api.require('wx');
			wx.isInstalled(function(ret, err) {
				callback(ret);
			});
		},
		shareFriend: function(_text, _desp, _imgUrl, _link, callback) {
			_api_imgCache(_imgUrl, function(ret) {
				var wx = api.require('wx');
				wx.shareWebpage({
					scene: 'session',
					title: _text,
					description: _desp,
					thumb: ret,
					contentUrl: _link
				}, function(ret, err) {
					if(ret.status) {
						_api_ShowToast("分享成功");
						callback();
					} else {
						_api_ShowToast("分享失败请稍后再试");
					}
				});
			});

		},
		share: function(_text, _desp, _imgUrl, _link, callback) {
			_api_imgCache(_imgUrl, function(ret) {
				var wx = api.require('wx');
				wx.shareWebpage({
					scene: 'timeline',
					title: _text,
					description: _desp,
					thumb: ret,
					contentUrl: _link
				}, function(ret, err) {
					if(ret.status) {
						_api_ShowToast("分享成功");
						callback();
					} else {
						_api_ShowToast("分享失败请稍后再试");
					}
				});
			});

		}

	}
	window.WX = WX;

})()

;

function setUpLoadImgName(n) {
	var d = new Date();
	var curr_date = d.getDate();
	var curr_month = d.getMonth() + 1;
	var curr_year = d.getFullYear();
	String(curr_month).length < 2 ? (curr_month = "0" + curr_month) : curr_month;
	String(curr_date).length < 2 ? (curr_date = "0" + curr_date) : curr_date;
	var yyyyMMdd = curr_year + "" + curr_month + "" + curr_date;
	if(n == 0) {
		return 'userHp/' + yyyyMMdd + '/' + Date.parse(new Date()) + '.jpg';
	} else {
		return 'upload/' + yyyyMMdd + '/' + Date.parse(new Date()) + '.jpg';
	}

}

//对象合并用于替换Object.assign 方法


function isObj(x) {
	var type = typeof x;
	return x !== null && (type === 'object' || type === 'function');
}

var hasOwnProperty = Object.prototype.hasOwnProperty;
var propIsEnumerable = Object.prototype.propertyIsEnumerable;

function toObject(val) {
	if(val === null || val === undefined) {
		throw new TypeError('Cannot convert undefined or null to object');
	}

	return Object(val);
}

function assignKey(to, from, key) {
	var val = from[key];

	if(val === undefined || val === null) {
		return;
	}

	if(hasOwnProperty.call(to, key)) {
		if(to[key] === undefined || to[key] === null) {
			throw new TypeError('Cannot convert undefined or null to object (' + key + ')');
		}
	}

	if(!hasOwnProperty.call(to, key) || !isObj(val)) {
		to[key] = val;
	} else {
		to[key] = assign(Object(to[key]), from[key]);
	}
}

function assign(to, from) {
	if(to === from) {
		return to;
	}

	from = Object(from);

	for(var key in from) {
		if(hasOwnProperty.call(from, key)) {
			assignKey(to, from, key);
		}
	}

	if(Object.getOwnPropertySymbols) {
		var symbols = Object.getOwnPropertySymbols(from);

		for(var i = 0; i < symbols.length; i++) {
			if(propIsEnumerable.call(from, symbols[i])) {
				assignKey(to, from, symbols[i]);
			}
		}
	}

	return to;
}

function deepAssign(target) {
	target = toObject(target);

	for(var s = 1; s < arguments.length; s++) {
		assign(target, arguments[s]);
	}

	return target;
};

	
