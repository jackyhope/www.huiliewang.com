<?php
include(dirname(dirname(__FILE__))."/global.php");
include(dirname(dirname(__FILE__))."/include/apiClient.php");
include(dirname(dirname(__FILE__))."/include/baseUtils.php");
if($_GET['m'] && !preg_match("/^[0-9a-zA-Z\_]*$/",$_GET['m'])){
	$_GET['m'] = 'index';
}
global $config;

if(is_numeric($config['did'])){
    header('Location:/siteadmin/');die;
}
$model = $_GET['m'];
$action = $_GET['c'];
if($model=="")	$model="index";
if($action=="")	$action = "index";
require(APP_PATH.'app/public/common.php');

require("model/".$model.'.class.php');
$Module = explode("\\",str_replace("/","\\",getcwd()));
if(end($Module)){$ModuleName=end($Module);}else{$ModuleName='admin';}
$adminDir = $ModuleName;
$conclass=$model.'_controller';
$actfunc=$action.'_action';
session_start();

$views=new $conclass($phpyun,$db,$db_config["def"],"admin");
if(!method_exists($views,$actfunc)){
	$views->DoException();
}

$views->$actfunc();
?>