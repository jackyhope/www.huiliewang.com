<?php
include(dirname(dirname(__FILE__)).'/global.php');
include(dirname(dirname(__FILE__))."/include/apiClient.php");
$Dir = str_replace("/","\\",dirname(__FILE__));
$DirNameList=explode('\\',$Dir);
$ModuleName=end($DirNameList);
$DirName   = end($DirNameList);
include(LIB_PATH.'init.php');

?>