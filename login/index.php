<?php
include(dirname(dirname(__FILE__)).'/global.php');
include(dirname(dirname(__FILE__))."/include/apiClient.php");
include(dirname(dirname(__FILE__))."/include/baseUtils.php");
define('ENV','online');
define('APPID','');
define('SECRET','');
$Dir = str_replace("/","\\",dirname(__FILE__));
$DirNameList=explode('\\',$Dir);
$ModuleName=end($DirNameList);
$DirName   = end($DirNameList);
include(LIB_PATH.'init.php');
?>