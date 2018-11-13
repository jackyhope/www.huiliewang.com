<?php
include(dirname(dirname(__FILE__))."/global.php");
include(dirname(dirname(__FILE__))."/include/apiClient.php");
//$DirNameList=explode('\\',dirname(__FILE__));
$Dir = str_replace("/","\\",dirname(__FILE__));
$DirNameList=explode('\\',$Dir);
$ModuleName=end($DirNameList);

if($_GET['c'] && !preg_match("/^[0-9a-zA-Z\_]*$/",$_GET['c'])){
	$_GET['c'] = 'index';
}
$model = $_GET['c'];
$action = $_GET['act'];
if($model=="")	$model="index";
if($action=="")	$action = "index"; 

$usertype=$_COOKIE['usertype'];

if($usertype==1){
	$type="user";
}else if($usertype==2){
	$type="com";
}else if($usertype==3){
    $type="lietou";
}else{
	header('Location: '.Url('login'));die;
}

require(APP_PATH.'app/public/common.php');
if($_GET['m']=='ajax'){
    require('ajax.class.php');
    $model=$_GET['m'];
    $action=$_GET['c'];
}else{
//    echo $type."/".$type.'.class.php';echo "<br/>";
//    echo $type."/model/".$model.'.class.php';exit();
    require($type."/".$type.'.class.php');
    require($type."/model/".$model.'.class.php');
}

$conclass=$model.'_controller';
$actfunc=$action.'_action';

$views=new $conclass($phpyun,$db,$db_config["def"],"member");

if(!method_exists($views,$actfunc)){
	$views->DoException();
}

$views->obj=$views->MODEL('userinfo');
$views->$actfunc();
?>