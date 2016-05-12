<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head lang="zh-CN">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title><?php if($config['title'])echo $config['title'];else echo $CONFIG['site']['sitename'] ?></title>
        <link rel="stylesheet" href="__TMPL__statics/css/css_1.css?v=<?php echo time(); ?>"/>
        <!--<link rel="stylesheet" href="__TMPL__statics/css/css_2.css?v=<?php echo time(); ?>"/>
        <link rel="stylesheet" href="__TMPL__statics/css/css_wxj.css?v=<?php echo time(); ?>"/>
        <link rel="stylesheet" href="__TMPL__statics/css/wap.css?v=<?php echo time(); ?>"/>-->
        <link rel="stylesheet" href="__TMPL__statics/css/reset.css?v=<?php echo time(); ?>"/>
        <link rel="stylesheet" href="__TMPL__statics/css/style.css?v=<?php echo time(); ?>"/>
        <link rel="stylesheet" href="__TMPL__statics/css/wl_style.css?v=<?php echo time(); ?>"/>
        
        <script> var BAO_PUBLIC = '__PUBLIC__';
            var BAO_ROOT = '__ROOT__';</script>
        
        <script src = "__TMPL__statics/js/jquery-1.7.1.min.js?v=20150801" ></script>
        <script src="__TMPL__statics/js/baocms.js?v=20150801"></script> 
        <script src="__TMPL__statics/js/jscookie.js?v=20150822"></script>
        <script src="__TMPL__statics/js/jquery.event.drag-1.5.min.js?v=20150801"></script>
        <script src="__TMPL__statics/js/jquery.touchSlider.js?v=20150801"></script>

        <script src="__TMPL__statics/js/layer/layer.js?v=20150801"></script>
        <script src="__PUBLIC__/js/web.js?v=20150718"></script>
        <script>
            function bd_encrypt(gg_lat, gg_lon)   // 百度地图测距偏差 问题修复
            {
                var x_pi = 3.14159265358979324 * 3000.0 / 180.0;
                var x = gg_lon;
                var y = gg_lat;
                var z = Math.sqrt(x * x + y * y) + 0.00002 * Math.sin(y * x_pi);
                var theta = Math.atan2(y, x) + 0.000003 * Math.cos(x * x_pi);
                var bd_lon = z * Math.cos(theta) + 0.0065;
                var bd_lat = z * Math.sin(theta) + 0.006;
                dingwei('<?php echo U("mobile/index/dingwei",array("t"=>$nowtime,"lat"=>"llaatt","lng"=>"llnngg"));?>', bd_lat, bd_lon);
            }
            navigator.geolocation.getCurrentPosition(function (position) {
                bd_encrypt(position.coords.latitude, position.coords.longitude);
            });
        </script>
    </head>
   
<body>
    <header>
        <i class="city"><a class="index qiehuan" href="<?php echo U('city/index');?>"><?php echo bao_msubstr($city_name,0,2,false);?></a></i>
        <div class="title">
            <div class="box_search">
                <a href="<?php echo U('index/search');?>"><i></i>输入商户名/搜索词</a>
            </div>
        </div>
		
        <i class="icon-menu" style="margin-right:0.30rem;"><a href="<?php echo U('sign/signed');?>">签到</a></i>
       <a href="<?php echo U('sign/signed');?>"> <i class="icon-menu" id="ico_7"></i></a>
	
    </header>
    <div id="index" class="page-center-box">
        <div id="scroll">
            <!-- 广告 -->
            <div class="ads">
                <script type="text/javascript">
                    $(document).ready(function () {
                        $(".main_image").touchSlider({
                            flexible: true,
                            speed: 200,
                            btn_prev: $("#btn_prev"),
                            btn_next: $("#btn_next"),
                            paging: $(".flicking_con a"),
                            counter: function (e) {
                                $(".flicking_con a").removeClass("on").eq(e.current - 1).addClass("on");
                            }
                        });
                        $(".main_image").bind("mousedown", function () {
                            $dragBln = false;
                        });

                        $(".main_image").bind("dragstart", function () {
                            $dragBln = true;
                        });

                        $(".main_image a").click(function () {
                            if ($dragBln) {
                                return false;
                            }
                        });

                        timer = setInterval(function () {
                            $("#btn_next").click();
                        }, 5000);

                        $(".ele_banner").hover(function () {
                            clearInterval(timer);
                        }, function () {
                            timer = setInterval(function () {
                                $("#btn_next").click();
                            }, 5000);
                        });

                        $(".main_image").bind("touchstart", function () {
                            clearInterval(timer);
                        }).bind("touchend", function () {
                            timer = setInterval(function () {
                                $("#btn_next").click();
                            }, 5000);
                        });

                    });
                </script>
                <div class="ele_banner">
                    <div class="flicking_con">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                    </div>
                    <div class="main_image">
                        <ul>
                            <li>
                                <div class="cate">
                                    <div>
                                        <a href="<?php echo U('tuan/main');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico1.png"></div>
                                            <p>抢购</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('shop/main');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico2.png"></div>
                                            <p>商家</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('mall/main');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico3.png"></div>
                                            <p>同城优购</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('housekeeping/main');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico4.png"></div>
                                            <p>家政</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('ele/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico5.png"></div>
                                            <p>外卖</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('ding/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico6.png"></div>
                                            <p>订座</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('hdmobile/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico7.png"></div>
                                            <p>附近活动</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('coupon/main');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico8.png"></div>
                                            <p>优惠券</p></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    <div>
                                        <a href="<?php echo U('community/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico9.png"></div>
                                            <p>社区</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('market/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico11.png"></div>
                                            <p>同城卖场</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('jifen/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico12.png"></div>
                                            <p>积分商城</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('life/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico13.png"></div>
                                            <p>生活信息</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('extend/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico14.png"></div>
                                            <p>推广员</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('huodong/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico15.png"></div>
                                            <p>活动</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('mart/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico16.png"></div>
                                            <p>微店</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('favorites/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico17.png"></div>
                                            <p>会员卡</p></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="cate">
                                    
                                    <div>
                                        <a href="<?php echo U('billboard/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico18.png"></div>
                                            <p>榜单</p></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo U('nearwork/index');?>"><div class="icon"><img src="__TMPL__statics/img/fl_ico19.png"></div>
                                            <p>附近工作</p></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <a href="javascript:void(0);" id="btn_prev"></a>
                    <a href="javascript:void(0);" id="btn_next"></a>
                </div>
            </div>
            <!-- 分类 -->
            <div class="index-quick-box">
                <div class="fl left">
                    <a href="<?php echo U('tuan/main');?>"><div class="index-quick1">
                        <h3>附近疯抢</h3>
                            <p>优惠活动快去抢</p>
                            <div class="img_1"><img src="__TMPL__statics/img/index_img1.jpg"></div>
                    </div></a>
                </div>
                <div class="fl right">
                    <a href="<?php echo U('ele/index');?>"><div class="index-quick2">
                        <div class="fl content">
                                <h3>快叫外卖</h3>
                                <p>一键下单，随叫随到</p>
                            </div>
                            <div class="fr info-img"><img src="__TMPL__statics/img/index_img2.jpg"></div>
                    </div></a>
                    <a href="<?php echo U('mall/main');?>"><div class="index-quick2 index-quick3">
                        <div class="fl content">
                            <h3>新单速递</h3>
                                <p>最近出来啥了</p>
                        </div>
                        <div class="fr info-img"><img src="__TMPL__statics/img/index_img3.jpg"></div>
                    </div></a>
                </div>
            </div>
            <!-- 列表 -->
            <div class="list-have-pic">
                <div class="title">热门抢购</div>
                <!-- 循环 -->
                <div id="jq_jingxuan">

                </div>
            </div>
            <script>
              		
                    loaddata('<?php echo U("tuan/push",array("t"=>$nowtime));?>', $("#jq_jingxuan"));

					
					
            </script>

            
        </div>
    </div>
<div id="loading">
    <div class="bao_loading">正在加载中....</div>
</div>
<div class="blank">&nbsp;</div>
<footer>
    <div>
        <a href="<?php echo U('mobile/index/index');?>"> 
            <div class="icon i-1"></div>
            <p>首页</p>
        </a>
    </div>
    <div>
        <a href="<?php echo U('mobile/tuan/index');?>"> 
        <div class="icon i-2"></div>
        <p>抢购</p>
        </a>
    </div>
    <div>
        <a href="<?php echo U('mobile/favorites/index');?>"> 
        <div class="icon i-3"></div>
        <p>关注</p>
        </a>
    </div>
    <div class="my_login">
        <!--<a href="<?php echo U('mcenter/member/index');?>"> </a>-->
        <div class="icon i-4"></div>
        <p>我的</p>
        <div class="my_login_pull">
        	<ul>
        	    <li><a href="<?php echo U('store/index/index');?>">商户中心</a></li>
                <li><a href="<?php echo U('mcenter/index/index');?>">会员中心</a></li>
    	    </ul>
        </div>
    </div>
</footer>
<div style="display: none;" class="topUp"></div>
<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $(".topUp").show();
            } else {
                $(".topUp").hide();
            }
        });
        $(".topUp").click(function () {
            $("html,body").animate({scrollTop: 0}, 200);
        });
		$(".my_login").click(function () {
            $(this).find(".my_login_pull").toggle();
        });
    });
</script>
<iframe id="baocms_frm" name="baocms_frm" style="display:none;"></iframe>
<!--定义编辑器里的table属性开始-请勿删除！！！！-->
<style>
.li_table table{ width:100%; text-align:center;}
footer #jq_total{width:auto;}
.my_login{ position:relative; cursor:pointer;}
.my_login_pull{display:none; position:absolute; bottom:0.48rem; right:0; width:100%; min-width:0.9rem; background: rgba(0, 0, 0, 0.7); box-shadow:-1px -1px 2px #666;}
.my_login_pull li{ display:block; padding:0px 0.05rem;}
.my_login_pull li a{ display:block; border-bottom:1px solid #fff; font-size:0.14rem; line-height:0.34rem; color:#fff; text-align:center;}
.my_login_pull li:last-child a{border-bottom:none 0px;}
</style>
<!--定义编辑器里的table属性结束-请勿删除！！！！-->
</body>
</html>