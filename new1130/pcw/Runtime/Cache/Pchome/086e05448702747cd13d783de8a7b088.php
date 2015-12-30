<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo ($CONFIG['site']['headinfo']); ?>
        <title><?php if($config['title'])echo $config['title'];else echo $seo_title; ?></title>
        <meta name="keywords" content="<?php echo ($seo_keywords); ?>" />
        <meta name="description" content="<?php echo ($seo_description); ?>" />
        <link href="__TMPL__statics/css/style.css?v=20150718" rel="stylesheet" type="text/css">

        <script> var BAO_PUBLIC = '__PUBLIC__'; var BAO_ROOT = '__ROOT__';</script>
        <script src="__TMPL__statics/js/jquery-1.11.1.js?v=20150718"></script>
        <script src="__PUBLIC__/js/layer/layer.js?v=20150718"></script>
        <script src="__TMPL__statics/js/jquery.flexslider-min.js?v=20150718"></script>
        <script src="__TMPL__statics/js/js.js?v=20150718"></script>
        <script src="__PUBLIC__/js/web.js?v=20150718"></script>
        <script src="__TMPL__statics/js/baocms.js?v=20150718"></script>
     </head>
     <body>
       <iframe id="baocms_frm" name="baocms_frm" style="display:none;"></iframe>  
<div class="topOne">
    <div class="nr">
        <?php if(empty($MEMBER)): ?><div class="left"><span class="welcome">您好，欢迎访问<?php echo ($CONFIG["site"]["sitename"]); ?></span><a href="<?php echo U('pchome/passport/login');?>">登录</a>|<a href="<?php echo U('passport/register');?>">注册</a>
                <?php else: ?>
            <div class="left">欢迎 <b style="color: red;font-size:14px;"><?php echo ($MEMBER["nick"]); ?></b> 来到<?php echo ($CONFIG["site"]["sitename"]); ?>&nbsp;&nbsp; <a href="<?php echo U('member/index/index');?>" >个人中心</a>|<a href="<?php echo U('pchome/passport/logout');?>" >退出登录</a><?php endif; ?>
                    <!--
                    <div class="topSm"> <span class="topSmt"><em>&nbsp;</em>手机CMS</span>
                        <div class="topSmnr"><img src="__PUBLIC__/img/wx.png" width="100" height="100" />
                            <p>扫描下载客户端</p>
                        </div>
                    </div>
                    -->
                </div>
                <div class="right">                    
                    <ul>
                        <li class="liOne"><a class="liOneB" href="<?php echo U('member/order/index');?>" >我的订单</a><em>&nbsp;</em></li>
                        <!--
                        <li class="liOne"><a class="liOneA" href="javascript:void(0);">我的服务<em>&nbsp;</em></a>
                            <div class="list">
                                <ul>
                                    <li><a href="<?php echo U('member/order/index');?>">我的订单</a></li>
                                    <li><a href="<?php echo U('member/ele/index');?>">我的外卖</a></li>
                                    <li><a href="<?php echo U('member/yuyue/index');?>">我的预约</a></li>
                                    <li><a href="<?php echo U('member/dianping/index');?>">我的评价</a></li>
                                    <li><a href="<?php echo U('member/favorites/index');?>">我的收藏</a></li>                                    
                                    <li><a href="<?php echo U('member/myactivity/index');?>">我的活动</a></li>
                                    <li><a href="<?php echo U('member/life/index');?>">会员服务</a></li>
                                    <li><a href="<?php echo U('member/set/nickname');?>">帐号设置</a></li>
                                </ul>
                            </div>
                        </li>
                        <span>|</span>
                        <li class="liOne liOne_visit"><a class="liOneA" href="javascript:void(0);">最近浏览<em>&nbsp;</em></a>
                            <div class="list liOne_visit_pull">
                                <ul>
                                    <?php
 $views = unserialize(cookie('views')); $views = array_reverse($views, TRUE); if($views){ foreach($views as $v){ ?>
                                    <li class="liOne_visit_pull_li">
                                        <a href="<?php echo U('tuan/detail',array('tuan_id'=>$v['tuan_id']));?>"><img src="__ROOT__/attachs/<?php echo ($v["photo"]); ?>" width="80" height="50" /></a>
                                        <h5><a href="<?php echo U('tuan/detail',array('tuan_id'=>$v['tuan_id']));?>"><?php echo ($v["title"]); ?></a></h5>
                                        <div class="price_box"><a href="<?php echo U('tuan/detail',array('tuan_id'=>$v['tuan_id']));?>"><em class="price">￥<?php echo ($v["tuan_price"]); ?></em><span class="old_price">￥<?php echo ($v["price"]); ?></span></a></div>
                                    </li>
                                    <?php }?>
                                </ul>
                                <p class="empty"><a href="javascript:;" id="emptyhistory">清空最近浏览记录</a></p>
                                <?php }else{?>
                                <p class="empty">您还没有浏览记录</p>
                                <?php } ?>
                            </div>
                        </li>
                        <span>|</span>
                        <li class="liOne"> <a class="liOneA" href="javascript:void(0);">我是商家<em>&nbsp;</em></a>
                            <div class="list">
                                <ul>
                                    <li><a href="<?php echo U('shangjia/login/index');?>">商家登陆</a></li>
                                    <li><a href="<?php echo U('shangjia/index/index');?>">微信营销</a></li>
                                </ul>
                            </div>
                        </li>
                        <span>|</span>
                        <li class="liOne"> <a class="liOneA" href="javascript:void(0);">快捷导航<em>&nbsp;</em></a>
                            <div class="list">
                                <ul>
                                    <li><a href="<?php echo U('pchome/shop/index');?>">商家列表</a></li>
                                    <li><a href="<?php echo U('pchome/jifen/index');?>">积分商城</a></li>
                                    <li><a href="<?php echo U('pchome/billboard/index');?>">商家榜单</a></li>
                                </ul>
                            </div>
                        </li>
                        -->
                    </ul>
                </div>
            </div>
    </div>
<script>
//    $(document).ready(function(){
//        $("#emptyhistory").click(function(){
//            $.get("<?php echo U('tuan/emptyviews');?>",function(data){
//                if(data.status == 'success'){
//                    $(".liOne_visit_pull ul li").remove();
//                    $(".liOne_visit_pull p.empty").html("您还没有浏览记录");
//                }else{
//                    layer.msg(data.msg,{icon:2});
//                }
//            },'json')
//
//            //$.cookie('views', '', { expires: -1 });
//            //$(".liOne_visit_pull ul li").remove();
//            //$(".liOne_visit_pull p.empty").html("您还没有浏览记录");
//        })
//    });
</script>    
	<div class="main">
		<div class="loginBox">
			<form id="login_frm"  action="<?php echo U('passport/login');?>" method="post" target="baocms_frm">
				<div class="loginMid">
				<h1>
					<?php if(!empty($CONFIG['site']['logo'])): ?><a href="<?php echo U('index/index');?>"><img src="__ROOT__/attachs/<?php echo ($CONFIG["site"]["logo"]); ?>" /></a>
						<?php else: ?>
						<a href="<?php echo U('index/index');?>"><img src="__PUBLIC__/img/logo.png" /></a><?php endif; ?>
				</h1>
				<div class="loginMidNr">
				<p class="loginMidP">欢迎登录<?php echo ($CONFIG['site']['sitename']); ?>！</p>
				<table cellpadding="0" cellspacing="0" width="100%" class="loginTable">
					<tr>
						<td>
							<input type="text" name="account" placeholder="手机号"    class="loginInput" value="" />
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="password"  class="loginInput2" placeholder="密码" value="" />
						</td>
					</tr>
					<tr>
						<td>
							<input  class="loginInput2 loginInput4" name="yzm"  type="text"  value="" placeholder="验证码" />
							<img id="bao_img_code" src="__ROOT__/index.php?g=app&m=verify&a=index&mt=<?php echo time();?>" /><em><a rel="bao_img_code" class="yzm_code" href="javascript:void(0);">换一张</a></em></td>
					</tr>
					<tr>
						<td class="agreen"><a href="<?php echo U('passport/forget');?>">忘记密码</a></td>
					</tr>
					<tr>
						<input type="hidden" name="backurl" value="<?php echo ($backurl); ?>" />
						<td>
							<input type="submit" class="loginBtn" value="登 陆" />
						</td>
					</tr>
					<tr>
						<td><a href="<?php echo U('passport/register');?>" class="loginBtn loginBtnA">注 册</a></td>
					</tr>
				</table>
			</form>
			<ul style="display:none;" class="qqlink">
				<li class="qqlink_wz">其他账号登录：</li>
				<li><a href="<?php echo U('passport/qqlogin');?>"></a></li>
				<li class="li2"><a href="<?php echo U('passport/wxlogin');?>"></a></li>
				<li class="li3"><a href="<?php echo U('passport/wblogin');?>"></a></li>
			</ul>
		</div>
	</div>
	<div class="loginR"> <img src="__PUBLIC__/img/r_03.png" />
		<div class="login_wx">
			<ul>
				<li class="login_wxLi"> <img src="__PUBLIC__/img/bwx_03.png" />
					<p>扫描下载客户端</p>
				</li>
				<li class="login_wxLi"> <img src="__PUBLIC__/img/bwx_03.png" />
					<p>关注baocms微信</p>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
<div class="footerOut">
    <!--
    <?php if($ctl == index): ?><div class="foot_yqlj">
            友情链接：
            <?php  $cache = cache(array('type'=>'File','expire'=> 21600)); $token = md5("Links,,0,10,21600,orderby asc,,"); if(!$items= $cache->get($token)){ $items = D("Links")->where("")->order("orderby asc")->limit("0,10")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ?><a target="_blank" href="<?php echo ($item["link_url"]); ?>"><?php echo ($item["link_name"]); ?></a> <?php endforeach; ?>
        </div><?php endif; ?>
    -->
    <div class="footer">
        <div class="footNav">
            <div class="left topTwo_b">
                <div class="tel"><?php echo ($CONFIG["site"]["tel"]); ?><p>周一至周日 9:00-22:00</p><p>客服电话 免长途费</p></div>
                <div class="protect">
                    <ul>
                        <li><em>&nbsp;</em><a href="javascript:void(0);">随时退</a></li>
                        <li class="protectLi2"><em>&nbsp;</em><a href="javascript:void(0);">不满意免单</a></li>
                        <li class="protectLi3"><em>&nbsp;</em><a href="javascript:void(0);">过期退款</a></li>
                    </ul>
                </div>
            </div>
            <div class="center" >
                <div class="footNavLi">
                    <ul>
                        <li class="footerLi">
                            <h3>公司信息</h3>
                            <ul>
                                <li><a target="_blank" title="关于我们" href="<?php echo U('article/system',array('content_id'=>1));?>">关于我们</a></li>
                                <li><a target="_blank" title="联系我们" href="<?php echo U('article/system',array('content_id'=>3));?>">联系我们</a></li>
                                <li><a target="_blank" title="人才招聘" href="<?php echo U('article/system',array('content_id'=>2));?>">人才招聘</a></li>
                                <li><a target="_blank" title="免责声明" href="<?php echo U('article/system',array('content_id'=>6));?>">免责声明</a></li>
                            </ul>
                        </li>
                        <li class="footerLi">
                            <h3>商户合作</h3>
                            <ul>
                                <li><a href="<?php echo U('shop/apply');?>">商家入驻</a></li>
                                <li><a target="_blank" title="广告合作" href="<?php echo U('article/system',array('content_id'=>5));?>">广告合作</a></li>
                                <li><a href="<?php echo U('shop/news');?>">商家新闻</a></li>
                            </ul>
                        </li>
                        <li class="footerLi">
                            <h3>用户帮助</h3>
                            <ul>
                                <li><a target="_blank" title="服务协议" href="<?php echo U('article/system',array('content_id'=>7));?>">服务协议</a></li>
                                <li><a target="_blank" title="退款承诺" href="<?php echo U('article/refund');?>">退款承诺</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <!--<div class="right"><img src="__PUBLIC__/img/wx.png" width="149" height="149" /><p>扫一扫关注BAOCMS</p></div>-->
        </div>
    </div>
	<div class="footerCopy">copyright 2013-2113 <?php echo ($_SERVER['HTTP_HOST']); ?> All Rights Reserved <?php echo ($CONFIG["site"]["sitename"]); ?> 版权所有<br/>
      <!--<?php echo ($CONFIG["site"]["icp"]); ?> <?php echo ($CONFIG["site"]["tongji"]); ?> <a href="http://www.urkeji.com" id="qq853616368" target="_blank">技术支持：友软科技</a>-->
    </div>

</div>
<!--
<div class="topUp">
    <ul>
        <li class="topBack"><div class="topBackOn">回到<br />顶部</div></li>
        <li class="topUpWx"><div class="topUpWxk"><img src="__PUBLIC__/img/wx.png" width="149" height="149" /><p>扫描二维码关注微信</p></div></li>
    </ul>
</div>
-->

<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $(".topUp").show();
                $(".indexpop").show();
            } else {
                $(".topUp").hide();
                $(".indexpop").hide();
            }


            var ctl = "<?php echo ($ctl); ?>";
            if(ctl == 'coupon'){
                if ($(window).scrollTop() > 665) {
                    $(".spxq_xqT2").show();
                } else {
                    $(".spxq_xqT2").hide();
                }
            }else{
                if ($(window).scrollTop() > '<?php echo ($height_num); ?>') {
                    $(".spxq_xqT2").show();
                } else {
                    $(".spxq_xqT2").hide();
                }
            }
        });
        $(".topBack").click(function () {
            $("html,body").animate({scrollTop: 0}, 200);
        });
		
		
		$(window).scroll(function(){
			var top = $(document).scrollTop();          //定义变量，获取滚动条的高度
			var menu = $(".topUp");                      //定义变量，抓取topUp
			var items = $(".footerOut");    //定义变量，查找footerOut 
	
			items.each(function(){
				var m=$(this);
				var itemsTop = m.offset().top;      //定义变量，获取当前类的top偏移量
				if(itemsTop-360 <= top-360){
					menu.css('bottom','360px');
					menu.css('top','auto');
				}else{
					menu.css('bottom','0px');
					menu.css('top','auto');
				}
			});
		});

    });
</script>
</body>
</html>