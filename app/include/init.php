<?php
/*
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2016 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ���������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
 */

if($_GET['yunurl']){
    $var=@explode('-',str_replace('/','-',$_GET['yunurl']));
    foreach($var as $p){

        $param=@explode('_',$p);
        $_GET[$param[0]]=$param[1];
    }
    unset($_GET['yunurl']);
}

if($_GET['c'] && !preg_match('/^[a-zA-Z0-9_]+$/',$_GET['c'])){
    $_GET['c'] = 'index';
}
if($_GET['a'] && !preg_match('/^[a-zA-Z0-9_]+$/',$_GET['c'])){
    $_GET['a'] = 'index';
}

global $ModuleName,$DirName;

$Loaction = wapJump($config);

if (!empty($Loaction)){

    header('Location: '.$Loaction);exit;
}

include(PLUS_PATH.'cache.config.php');

if($config['webcache']=='1'){

    if(isMobileUser()){

        if($cache_config['sy_'.$_GET['c'].'_cache']=='1'){
            include_once(LIB_PATH.'web.cache.php');
            $cache=new Phpyun_Cache('./cache',DATA_PATH,$config['webcachetime']);
            $cache->read_cache();
        }

    }else{

        if($cache_config['sy_'.$ModuleName.'_cache']=='1' && $_GET['c']!='clickhits'){
            include_once(LIB_PATH.'web.cache.php');
            $cache=new Phpyun_Cache('./cache',DATA_PATH,$config['webcachetime']);
            $cache->read_cache();
        }
    }

}


$ControllerName = $_GET['c'];
$ActionName = $_GET['a'];
if($ControllerName=='')	$ControllerName='index';
if($ActionName=='')	$ActionName = 'index';

$ControllerName = $_GET['c'];

$ActionName = $_GET['a'];

if($ControllerName=='')	$ControllerName='index';

if($ActionName=='')	$ActionName = 'index';


if($config['sy_'.$ModuleName.'_web']==2){

    header('Location: '.Url("error"));exit;
}


$ControllerPath=APP_PATH.'app/controller/'.$ModuleName.'/';
require(APP_PATH.'app/public/common.php');

if(file_exists($ControllerPath.$ModuleName.'.controller.php')){
    require($ControllerPath.$ModuleName.'.controller.php');
}
if(file_exists($ControllerPath.$ControllerName.'.class.php')){
    require($ControllerPath.$ControllerName.'.class.php');
}else{
    $ActionName=$ControllerName;$ControllerName='index';
    if(!file_exists($ControllerPath.$ControllerName.'.class.php')){
        header('Location: '.Url("error"));exit;
    }else{
        require($ControllerPath.'index.class.php');
    }
}

if($ModuleName=='siteadmin'){$model='admin';}elseif($ModuleName=='wap'){$model='wap';}elseif($ModuleName=='wapadmin'){$model='wapadmin';}else{$model='index';}

$conclass=$ControllerName.'_controller';
$actfunc=$ActionName.'_action';
$views=new $conclass($phpyun,$db,$db_config['def'],$model,$ModuleName);
$views->m=$ModuleName;
if(!method_exists($views,$actfunc)){
    $views->DoException();
}
$views->$actfunc();

if($cache){

    $cache->CacheCreate();
}

?>