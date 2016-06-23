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
    <div class="topTwo">
        <div class="left">
            <?php if(!empty($CONFIG['site']['logo'])): ?><h1><a href="<?php echo U('index/index');?>"><img width="153" height="63" src="__ROOT__/attachs/<?php echo ($CONFIG["site"]["logo"]); ?>" /></a></h1>
                <?php else: ?>
                <h1><a href="<?php echo U('index/index');?>"><img width="153" height="63" src="__PUBLIC__/img/logo_03.png" /></a></h1><?php endif; ?>
            <div class="changeCity"><?php echo ($city_name); ?><a href="<?php echo U('city/index');?>" class="change">[切换城市]</a></div>
        </div>
        <div class="left center">
            <div class="searchBox">
                <script>
//                    $(document).ready(function () {
//                        $(".selectList li a").click(function () {
//                            $("#search_form").prop('action', $(this).attr('rel'));
//                            $("#selectBoxInput").html($(this).html());
//                            $('.selectList').hide();
//                        });
//                    });
                </script>

                <form id="search_form" method="get" onsubmit='var submit_url=$("#search_form").attr("action").replace(".html","/search_key/"+$("#search_key").val()+".html");location.href=submit_url;return false;'  action="<?php echo U('search/index');?>">
                    <!--<div style="display:none;" class="selectBox">-->
                    <div class="selectBox">
                        <span class="select"  id="selectBoxInput">尾货</span>
                        <div   class="selectList">
                            <ul>
                                <li><a href="javascript:void(0);" rel="<?php echo U('search/index');?>">尾货</a></li>
                                <li><a href="javascript:void(0);" rel="<?php echo U('search/index');?>">辅材</a></li>
                            </ul>
                        </div>
                    </div>
                    <input id="search_key" type="text" class="text"  placeholder="商品/品牌/颜色/型号" value="<?php echo ($formget["search_key"]); ?>"/>
                    <!--<input type="hidden" name="search_area_id" value=""/>&lt;!&ndash;辅材1 KO 2尾货&ndash;&gt;-->
                    <input type="submit" class="submit" value="搜索" />
                </form>

            </div>

            <!--widget扩展-->
            <!--<div><?php echo W('Show');?></div>-->
        </div>
        <div class="rightss right">
            <a class="radius20" href="<?php echo U('search/cart');?>">购物车<span id="num" class="radius100"><?php echo (($cartnum)?($cartnum):'0'); ?></span></a>
        </div>
    </div>


<div class="nav">
        <div class="navList">

            <ul>
                <li class="navListAll zy_navListAll"><!-- <img src="__TMPL__statics/images/ico_1.png" class="left"/> --><i class="nav-bz left"></i><span class="navListAllt left">全部抢购分类</span>
                    <!--<div class="shadowy navAll">此处显示  class "navAll" 的内容</div>-->
                </li>
                <li class="navLi"><a <?php if($ctl == 'index'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="首页" href="<?php echo U('pchome/index/index');?>" >首页</a></li>
                <!-- <li class="navLi"><a <?php if($ctl == 'tuan'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="身边抢购" href="<?php echo U('pchome/tuan/nearby');?>" >身边抢购</a></li>
                <li class="navLi"><a <?php if($ctl == 'huodong'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="活动" href="<?php echo U('pchome/huodong/index');?>" >活动</a></li>
                <li class="navLi"><a <?php if($ctl == 'lifeservice'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="上门服务" href="<?php echo U('pchome/lifeservice/index');?>" >上门服务</a></li> -->
                <li class="navLi"><a <?php if($ctl == 'mall'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="同城优购" href="<?php echo U('pchome/mall/main');?>" >辅材商城</a></li>
                <!-- <li class="navLi"><a <?php if($ctl == 'ele'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="外卖" href="<?php echo U('pchome/ele/index');?>" >外卖</a></li>
                <li class="navLi"><a <?php if($ctl == 'ding'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="订座" href="<?php echo U('pchome/ding/index');?>" >订座</a></li>
                <li class="navLi"><a <?php if($ctl == 'life'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="同城信息" href="<?php echo U('pchome/life/main');?>" >同城信息</a></li>
                <li class="navLi"><a <?php if($ctl == 'coupon'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="优惠券" href="<?php echo U('pchome/coupon/index');?>" >优惠券</a></li> -->
                
            </ul>
        </div>
</div>
<div class="clear"></div>


<div class="content zy_content" id="pcw-list">
    <div style="height:30px;">
        <ul style="clear: both">
                <li class="goods_flLi"><a href="<?php echo U('search/index',array('search_key'=>$search_key,'fid'=>$fid));?>">所有类目</a></li>
			<?php if(!empty($cat)): ?><li class="goods_flLi goods_flLix">&gt;</li>
                <script>
                    $(function () {
                        $('.goods_flLiLf .goods_flLiA').hover(function () {
                            $(this).parent().find('.goods_flLiLfk').show();
                            $(this).addClass("on");//加上父类的css
                        });
                        $('.goods_flLiLf').hover(function () {
                        }, function () {
                            $(this).find('.goods_flLiLfk').hide();
                            $(this).children(".goods_flLiA").removeClass("on");
                        });
                        $('.goods_flLiFl').hover(function () {
                            $(this).parent().find('.goods_flLiLfk').hide();
                            $(this).parent().find(".goods_flLiA").removeClass("on");
                        });
                    });
                </script>
                <?php if(!empty($cat)): ?><li class="goods_flLi goods_flLiLf goods_flLiLf1"><a class="goods_flLiA first" href="<?php echo U('search/index',array('cat'=>$cat,'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($goodscate[$cat]['goods_category_name']); ?><em></em></a><a href="<?php echo U('search/index',array('search_key'=>$search_key,'fid'=>$fid));?>" class="goods_flLiFl">ｘ</a>
                        <div class="goods_flLiLfk"><a href="<?php echo U('search/index',array('search_key'=>$search_key,'fid'=>$fid));?>">全部</a>
                            <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == $cat): ?>|<a <?php if(($item["goods_category_id"]) == $cate_id): ?>class="on"<?php endif; ?>  href="<?php echo U('search/index',array('cat'=>$item['parent_id'],'cate_id'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($goodscate[$item['goods_category_id']]['goods_category_name']); ?></a><?php endif; endforeach; endif; ?>
                        </div>
                    </li><?php endif; ?>

                <!--二级平级-->
                <?php if(!empty($cate_id)): ?><li class="goods_flLi goods_flLix">&gt;</li>
                    <li class="goods_flLi goods_flLiLf goods_flLiLf2"><a class="goods_flLiA second" href="<?php echo U('search/index',array('cat'=>$cat,'cate_id'=>$cate_id,'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($goodscate[$cate_id]['goods_category_name']); ?></a><a href="<?php echo U('search/index',array('cat'=>$cat,'search_key'=>$search_key,'fid'=>$fid));?>" class="goods_flLiFl">ｘ</a>
                    </li>
                    <li class="goods_flLi goods_flLix"></li><?php endif; ?>
        </ul><?php endif; ?>
    </div>

    <!--模式切换代码段-->
    <?php if(!empty($fid) and $fid == 1): ?><!--<?php R('Pchome/List1/getli'); ?>-->
        <div class="left zy_content_l" id="rowshow">
            <!--start-->
            <form name="my-form" method="get" action="<?php echo U('search/index',array('cat'=>$cat,'cate_id'=>$cate_id,'search_key'=>$search_key));?>">

                <div class="goods_flBox" id="shopping">
                    <ul>
                        <!--页面显示一级菜单-->
                        <?php if(!empty($cat)): ?><li class="goods_flList">
                                <div class="left goods_flList_l"> 一级分类：</div>
                                <div class="left goods_flList_r">
                                    <a class="goods_flListA" href="<?php echo U('search/index',array('search_key'=>$search_key,'fid'=>$fid));?>">全部</a>
                                    <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["cat_id"]) != "0"): ?><!--第一级条件可以更改-->
                                            <?php if($item["goods_category_id"] == $cat): ?><a class="goods_flListA on" href="<?php echo U('search/index',array('cat'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a>
                                                <?php else: ?>
                                                <a class="goods_flListA" href="<?php echo U('search/index',array('cat'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a><?php endif; endif; endforeach; endif; ?>
                                </div>
                            </li><?php endif; ?>
                        <!--页面显示一级菜单-->
                        <?php if(empty($cat)): ?><li class="goods_flList">
                                <div class="left goods_flList_l">一级分类：</div>
                                <div class="left goods_flList_r">
                                    <a class="goods_flListA on" href="<?php echo U('search/index',array('search_key'=>$search_key,'fid'=>$fid));?>">全部</a>
                                    <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["cat_id"]) != "0"): ?><!--第一级条件可以更改-->
                                            <a class="goods_flListA" href="<?php echo U('search/index',array('cat'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a><?php endif; endforeach; endif; ?>
                                </div>
                            </li>
                            <li>
                                <div class="left goods_flList_l">二级分类：</div>
                                <div class="left goods_flList_r">
                                    <a class="goods_flListA on" href="<?php echo U('search/index',array('search_key'=>$search_key,'fid'=>$fid));?>">全部</a>
                                </div>
                            </li><?php endif; ?>
                        <!--页面显示二级菜单-->
                        <?php if(!empty($cat) and empty($cate_id)): ?><li class="goods_flList">
                                <div class="left goods_flList_l">二级分类：</div>
                                <div class="left goods_flList_r">
                                    <a class="goods_flListA on" href="<?php echo U('search/index',array('cat'=>$cat,'search_key'=>$search_key,'fid'=>$fid));?>">全部</a>
                                    <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == $cat): ?><a class="goods_flListA" href="<?php echo U('search/index',array('cat'=>$cat,'cate_id'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a><?php endif; endforeach; endif; ?>
                                </div>
                            </li><?php endif; ?>
                        <!--页面显示二级菜单-->
                        <?php if(!empty($cat) and !empty($cate_id)): ?><li class="goods_flList">
                                <div class="left goods_flList_l">二级分类：</div>
                                <div class="left goods_flList_r">
                                    <a class="goods_flListA " href="<?php echo U('search/index',array('cat'=>$cat,'search_key'=>$search_key,'fid'=>$fid));?>">全部</a>
                                    <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == $cat): if($item["goods_category_id"] == $cate_id): ?><a class="goods_flListA on" href="<?php echo U('search/index',array('cat'=>$cat,'cate_id'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a>
                                                <?php else: ?>
                                                <a class="goods_flListA" href="<?php echo U('search/index',array('cat'=>$cat,'cate_id'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a><?php endif; endif; endforeach; endif; ?>
                                </div>
                            </li><?php endif; ?>
                    </ul>
                </div>
                <!--搜索-->
                 <div class="filter_wrap">
                    <label>商品名：</label><input type="text" name="goods_name" value="<?php echo ($formget['goods_name']); ?>"/>
                    <label>型号：</label><input type="text" name="version" value="<?php echo ($formget['version']); ?>"/>
                    <label>品牌：</label><input type="text" name="brand" value="<?php echo ($formget['brand']); ?>"/>
                    <label> 颜色：</label><input type="text" name="color"  value="<?php echo ($formget['color']); ?>" />
                    <input type="submit" class="filter_submit"  value="搜  索">
                </div>
            </form>
            <!--商品展示开始-->
            <div class="sort_wrap">
                <ul class="left type">
                    <?php if($price_order == 1): ?><li class="on"><a>综合</a></li>
                        <li ><a href="<?php echo U('search/index',array('price_order'=>2,'search_key'=>$search_key,'fid'=>$fid));?>">价格<span class="icon_sort">↑</span></a></li>
                        <li ><a href="<?php echo U('search/index',array('brand_order'=>1,'search_key'=>$search_key,'fid'=>$fid));?>">品牌</a></li>
                        <li ><a href="<?php echo U('search/index',array('account'=>1,'search_key'=>$search_key,'fid'=>$fid));?>">销量</a></li>
                        <?php else: ?>
                        <li class="on"><a>综合</a></li>
                        <li ><a href="<?php echo U('search/index',array('price_order'=>1,'search_key'=>$search_key,'fid'=>$fid));?>">价格<span class="icon_sort">↓</span></a></li>
                        <li ><a href="<?php echo U('search/index',array('brand_order'=>1,'search_key'=>$search_key,'fid'=>$fid));?>">品牌</a></li>
                        <li ><a href="<?php echo U('search/index',array('account'=>1,'search_key'=>$search_key,'fid'=>$fid));?>">销量</a></li>
                        <!--<?php A('Search')->getli(); ?>--><?php endif; ?>
                </ul>
                <ul class="right style">
                    <li class="on grid"><a><i class="pic"></i></a></li>
                    <li class="list"><a><i class="text"></i></a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="qg-sp-listBox">
                <div class="qg-sp-list">
                    <ul >
                        <?php if(is_array($list)): foreach($list as $key=>$item): if($key % 5 == 0): ?><li class="margin_sp">
                                    <?php else: ?>
                                <li><?php endif; ?>
                            <div class="qg-sp-liBox">
                                <div class="infobox">
									<div class="img">
										<a target="_blank" href="<?php echo U('search/detail',array('goods_name_id'=>$item['goods_name_id'],'brand_name'=>$item['brand_name'],'goods_version'=>$item['goods_version']));?>">
											<img src="__ROOT__/../customer/<?php echo ($item["goods_thumb"]); ?>" />
										</a>
									</div>

									<p class="rap">
										<a target="_blank" href="<?php echo U('search/detail',array('goods_name_id'=>$item['goods_name_id'],'brand_name'=>$item['brand_name'],'goods_version'=>$item['goods_version']));?>"><?php echo ($item['goods_name']); ?></a>
									</p>
									<p class="version"><span class="title">品牌:</span><?php echo ($item["brand_name"]); ?></p>
									<p class="version"><span class="title">型号:</span><?php echo ($item["goods_version"]); ?></p>
									<p class="version"><span class="title">颜色:</span>默认</p>
									<p class="version"><span class="title">单位:</span>3米每卷</p>
								</div>
								<div class="operationbox">
									<div class="sc_cpList_gj">
										<span class="left">
											<span class="sc_cpList_gjj">
												<span class="money">￥<?php echo ($item["price"]); ?></span>
											</span>
										</span>
										<span class="right">
											<a class="addcart">加入购物车</a>
										</span>
									</div>
								</div>
                            </div>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
            <div class="x">
                <?php echo ($page); ?>
            </div>

            <?php else: ?>

            <!--列表形态展示-->
            <div class="left zy_content_l" id="listshow">
                <!--start-->
                <form name="my-form" method="get" action="<?php echo U('search/index',array('cat'=>$cat,'cate_id'=>$cate_id,'search_key'=>$search_key));?>">

                    <div class="goods_flBox" id="shopping">
                        <ul>
                            <!--页面显示一级菜单-->
                            <?php if(!empty($cat)): ?><li class="goods_flList">
                                    <div class="left goods_flList_l"> 一级分类：</div>
                                    <div class="left goods_flList_r">
                                        <a class="goods_flListA" href="<?php echo U('search/index',array('search_key'=>$search_key,'fid'=>$fid));?>">全部</a>
                                        <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["cat_id"]) != "0"): ?><!--第一级条件可以更改-->
                                                <?php if($item["goods_category_id"] == $cat): ?><a class="goods_flListA on" href="<?php echo U('search/index',array('cat'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a>
                                                    <?php else: ?>
                                                    <a class="goods_flListA" href="<?php echo U('search/index',array('cat'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a><?php endif; endif; endforeach; endif; ?>
                                    </div>
                                </li><?php endif; ?>
                            <!--页面显示一级菜单-->
                            <?php if(empty($cat)): ?><li class="goods_flList">
                                    <div class="left goods_flList_l">一级分类：</div>
                                    <div class="left goods_flList_r">
                                        <a class="goods_flListA on" href="<?php echo U('search/index',array('search_key'=>$search_key,'fid'=>$fid));?>">全部</a>
                                        <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["cat_id"]) != "0"): ?><!--第一级条件可以更改-->
                                                <a class="goods_flListA" href="<?php echo U('search/index',array('cat'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a><?php endif; endforeach; endif; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="left goods_flList_l">二级分类：</div>
                                    <div class="left goods_flList_r">
                                        <a class="goods_flListA on" href="<?php echo U('search/index',array('search_key'=>$search_key,'fid'=>$fid));?>">全部</a>
                                    </div>
                                </li><?php endif; ?>
                            <!--页面显示二级菜单-->
                            <?php if(!empty($cat) and empty($cate_id)): ?><li class="goods_flList">
                                    <div class="left goods_flList_l">二级分类：</div>
                                    <div class="left goods_flList_r">
                                        <a class="goods_flListA on" href="<?php echo U('search/index',array('cat'=>$cat,'search_key'=>$search_key,'fid'=>$fid));?>">全部</a>
                                        <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == $cat): ?><a class="goods_flListA" href="<?php echo U('search/index',array('cat'=>$cat,'cate_id'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a><?php endif; endforeach; endif; ?>
                                    </div>
                                </li><?php endif; ?>
                            <!--页面显示二级菜单-->
                            <?php if(!empty($cat) and !empty($cate_id)): ?><li class="goods_flList">
                                    <div class="left goods_flList_l">二级分类：</div>
                                    <div class="left goods_flList_r">
                                        <a class="goods_flListA " href="<?php echo U('search/index',array('cat'=>$cat,'search_key'=>$search_key,'fid'=>$fid));?>">全部</a>
                                        <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == $cat): if($item["goods_category_id"] == $cate_id): ?><a class="goods_flListA on" href="<?php echo U('search/index',array('cat'=>$cat,'cate_id'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a>
                                                    <?php else: ?>
                                                    <a class="goods_flListA" href="<?php echo U('search/index',array('cat'=>$cat,'cate_id'=>$item['goods_category_id'],'search_key'=>$search_key,'fid'=>$fid));?>"><?php echo ($item['goods_category_name']); ?></a><?php endif; endif; endforeach; endif; ?>
                                    </div>
                                </li><?php endif; ?>
                        </ul>
                    </div>
                    <!--搜索-->
                    <div class="filter_wrap">
						<label>商品名：</label><input type="text" name="goods_name" value="<?php echo ($formget['goods_name']); ?>"/>
						<label>型号：</label><input type="text" name="version" value="<?php echo ($formget['version']); ?>"/>
						<label>品牌：</label><input type="text" name="brand" value="<?php echo ($formget['brand']); ?>"/>
						<label> 颜色：</label><input type="text" name="color"  value="<?php echo ($formget['color']); ?>" />
						<input type="submit" class="filter_submit"  value="搜  索">
					</div>
                    <div class="sort_wrap">
                        <ul class="left type">
                            <?php if($price_order == 1): ?><li class="on"><a>综合</a></li>
                                <li ><a href="<?php echo U('search/index',array('price_order'=>2,'search_key'=>$search_key,'fid'=>$fid));?>">价格<span class="icon_sort">↑</span></a></li>
                                <li ><a href="<?php echo U('search/index',array('brand_order'=>1,'search_key'=>$search_key,'fid'=>$fid));?>">品牌</a></li>
                                <li ><a href="<?php echo U('search/index',array('account'=>1,'search_key'=>$search_key,'fid'=>$fid));?>">销量</a></li>
                                <?php else: ?>
                                <li class="on"><a>综合</a></li>
                                <li ><a href="<?php echo U('search/index',array('price_order'=>1,'search_key'=>$search_key,'fid'=>$fid));?>">价格<span class="icon_sort">↓</span></a></li>
                                <li ><a href="<?php echo U('search/index',array('brand_order'=>1,'search_key'=>$search_key,'fid'=>$fid));?>">品牌</a></li>
                                <li ><a href="<?php echo U('search/index',array('account'=>1,'search_key'=>$search_key,'fid'=>$fid));?>">销量</a></li>
                                <!--<?php A('Search')->getli(); ?>--><?php endif; ?>
                        </ul>
                        <ul class="right style">
                            <li class="grid"><a><i class="pic"></i></a></li>
                            <li class="on list"><a><i class="text"></i></a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>

                </form>
                <!--商品展示开始-->
				<div class="list_table">
				<table>
					<tr class="toptr">
						<th class="top1">图片</th>
						<th class="top2">品名</th>
						<th class="top3">品牌</th>
						<th class="top4">型号</th>
						<th class="top5">颜色</th>
						<th class="top6">单位</th>
						<th class="top7">价格</th>
						<th class="top8">操作</th>
					</tr>
					<?php if(is_array($list)): foreach($list as $key=>$item): ?><tr>
							<td class="img">
								<a target="_blank" href="<?php echo U('search/detail',array('goods_name_id'=>$item['goods_name_id'],'brand_name'=>$item['brand_name'],'goods_version'=>$item['goods_version']));?>">
									<img src="__ROOT__/../customer/<?php echo ($item["goods_thumb"]); ?>" />
								</a>
							</td>
							<td class="name">
								<a target="_blank" href="<?php echo U('search/detail',array('goods_name_id'=>$item['goods_name_id'],'brand_name'=>$item['brand_name'],'goods_version'=>$item['goods_version']));?>"><?php echo ($item['goods_name']); ?></a>
							</td>
							<td class="bonus"><?php echo ($item["brand_name"]); ?></td>
							<td class="version"><?php echo ($item["goods_version"]); ?></td>
							<td class="color">默认</td>
							<td class="unit">3米/卷</td>
							<td class="price"><?php echo ($item["price"]); ?></td>
							<td class="operation"><a href="#" class="addcart">加入购物车</a></td>
						</tr><?php endforeach; endif; ?>
				</table>
			</div>
                <!-- <div class="qg-sp-listBox">
                    <div class="qg-sp-list">
                        <ul >
                            <?php if(is_array($list)): foreach($list as $key=>$item): if($key % 5 == 0): ?><li class="margin_sp">
                                        <?php else: ?>
                                    <li><?php endif; ?>
                                <div class="qg-sp-liBox">
                                    <div class="img"><a target="_blank" href="<?php echo U('search/detail',array('goods_name_id'=>$item['goods_name_id'],'brand_name'=>$item['brand_name'],'goods_version'=>$item['goods_version']));?>"><img src="__ROOT__/../customer/<?php echo ($item["goods_thumb"]); ?>" /></a></div>
                                    <div class="sc_cpList_gj">
										<span class="left">
											<span class="sc_cpList_gjj">
												<span class="money">￥<?php echo ($item["price"]); ?></span>
												<i class="right sell">成交量<span class="weight">200</span>个</i>
											</span>
										</span>
										<span class="right pcw_danbao">
											<i class="icon_danbao"></i>担保交易
										</span>
                                    </div>
                                    <p class="rap">
                                        <a target="_blank" href="<?php echo U('search/detail',array('goods_name_id'=>$item['goods_name_id'],'brand_name'=>$item['brand_name'],'goods_version'=>$item['goods_version']));?>"><?php echo ($item['goods_name']); ?></a>
                                        <span class="version text">品牌：<?php echo ($item["brand_name"]); ?>&nbsp;&nbsp;型号：<?php echo ($item["goods_version"]); ?></span>
                                        <span class="seller"><span class="name">上海晓材科技有限公司</span><a class="call"><i class="icon_call"></i>和我联系</a></span>
                                    </p>
                                </div>
                                </li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div> -->
                <div class="x">
                    <?php echo ($page); ?>
                </div>
            </div><?php endif; ?>
            <!--商品展示结束-->


    <script>
        $(function () {
            $(".qg-sp-tab span").each(function (e) {
                $(this).click(function () {
                    $(this).parent().find("span").removeClass("on");
                    $(this).addClass("on");
                    $(".qg-sp-tab-nr .qg-sp-tab-nrList").each(function (i) {
                        if (e == i) {
                            //$(this).parent().find(".qg-sp-tab-nrList").hide();
                            $(this).show();
                        }
                        else {
                            //$(this).hide();
                        }
                    });
                });
                $(".qg-sp-tab span").eq(0).click();
            });

        });

    </script>
</div>

</div>
</div>
<?php $get_url=I('get.'); $list_url=$get_url; $list_url['fid']=2; $list_url['search_key']=$search_key; $grid_url=$get_url; $grid_url['fid']=1; $grid_url['search_key']=$search_key; ?>
<script type="text/javascript">
    $(".grid").click(function(){
        location.href = "<?php echo U('',$grid_url);?>";
    });
    $(".list").click(function(){
        location.href = "<?php echo U('',$list_url);?>";
    });
</script>
<script type="text/javascript">
    $(function(){
            $(".sort_wrap  ul li a").click(function(){
                $(".sort_wrap .type li").removeClass("on");
                $(this).parent().addClass("on");
            })
    })
</script>
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