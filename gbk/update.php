<?php
define("IN_KEKE",TRUE);
error_reporting(0);
$i_model = 1;
require_once 'app_comm.php';
db_factory::execute("alter  table ".TABLEPRE."witkey_space  add  client_status char(11) default null");
kekezu::show_msg("操作提示",$_K[siteurl],3,"程序更新成功","success");
