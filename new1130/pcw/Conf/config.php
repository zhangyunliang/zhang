<?php

 $dbconfigs = require  BASE_PATH.'/'.APP_NAME.'/Conf/db.php';

$configs =  array(
    //'配置项'=>'配置值'
    'APP_GROUP_LIST' => 'Admin,Shangjia,Mobile,Store,App,Wuye,Mcenter,Member,Pchome', // 项目分组设定,多个组之间用逗号分隔
    'DEFAULT_GROUP'  => 'Pchome', //默认分组
    //SESSION 的设置
    'SESSION_AUTO_START'    => true,
    'SESSION_TYPE'          => 'DB',   
    'DEFAULT_APP'           => 'pcw',//// 默认项目名称，@表示当前项目
    
    //URL设置
    'URL_MODEL'            => 2,//2 (REWRITE  模式);
    'URL_HTML_SUFFIX'      => '.html',//// URL伪静态后缀设置
    'URL_ROUTER_ON'        => true,//开启路由
    'URL_CASE_INSENSITIVE' => true, // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_ROUTE_RULES'      => array(

    ), //路由规则
    'APP_SUB_DOMAIN_DEPLOY' => false,// 是否开启子域名部署

    //默认系统变量
    'VAR_GROUP'            => 'g',
    'VAR_MODULE'           => 'm',
    'VAR_ACTION'           => 'a',
    'VAR_TEMPLATE'         => 'theme',// 默认模板切换变量
    
    //模版设置相关
    'DEFAULT_THEME'         => 'default',// 默认模板主题名称
    'TMPL_L_DELIM'          => '<{', //模板引擎普通标签开始标记
    'TMPL_R_DELIM'          => '}>', //模板引擎普通标签结束标记
    'TMPL_ACTION_SUCCESS'   => 'public/dispatch_jump',// 默认成功跳转对应的模板文件
    'TMPL_ACTION_ERROR'     => 'public/dispatch_jump',// 默认错误跳转对应的模板文件
     
    'TAGLIB_LOAD'           => true,
    'APP_AUTOLOAD_PATH'     => '@.TagLib',// 自动加载机制的自动搜索路径,注意搜索顺序
    'TAGLIB_BUILD_IN'       => 'Cx,Calldata',//把标签库作为内置标签库引入
    //开启调试
    'SHOW_PAGE_TRACE'      =>1,
);
return array_merge($configs,$dbconfigs);
?>