<?php
/*
 * 软件为上海晓材科技有限公司出品，未经授权许可不得使用！
 * 作者：网站组
 * 官网：www.pcw365.com
 */
//当前目录 非THINKPHP框架需要的路径
//获取到根目录
define('BASE_PATH', getcwd());
/* 对于PHP magic_quotes_gpc=on的情况， 我们可以不对输入和输出数据库的字符串数据作addslashes()和stripslashes()的操作,
数据也会正常显示。
如果此时你对输入的数据作了addslashes()处理，那么在输出的时候就必须使用stripslashes()去掉多余的反斜杠。
2. 对于PHP magic_quotes_gpc=off 的情况
必须使用addslashes()对输入数据进行处理，但并不需要使用stripslashes()格式化输出，因为addslashes()并未将反斜杠一起写入数据库，
只是帮助mysql完成了sql语句的执行。
补充：
PHP magic_quotes_gpc作用范围是：WEB客户服务端；作用时间：请求开始时，例如当脚本运行时．
magic_quotes_runtime 作用范围：从文件中读取的数据或执行exec()的结果或是从SQL查询中得到的；作用时间：
每次当脚本访问运行状态中产生的数据
 * */

if (ini_get('magic_quotes_gpc')) {

    function stripslashesRecursive(array $array) {
        foreach ($array as $k => $v) {
            if (is_string($v)) {
                $array[$k] = stripslashes($v);
            } else if (is_array($v)) {
                $array[$k] = stripslashesRecursive($v);
            }
        }
        return $array;
    }

    $_GET = stripslashesRecursive($_GET);
    $_POST = stripslashesRecursive($_POST);
}
if (!file_exists(BASE_PATH . '/attachs/install.lock')) {
    header("Location: install/index.php");
    die;
}
//调试模式
ini_set('display_errors','On');//显示所有错误信息
define('APP_DEBUG', true);
//定义项目名称
define('APP_NAME', 'pcw');
ini_set('date.timezone', 'Asia/Shanghai');
define('TODAY', date('Y-m-d', $_SERVER['REQUEST_TIME']));
//定义项目路径
define('APP_PATH', BASE_PATH . '/pcw/');
header("Power by: pcw;");
header("Content-type: text/html; charset=utf-8");
//var_dump(ini_get_all());
//加载框架入文件
require './ThinkPHP/ThinkPHP.php';