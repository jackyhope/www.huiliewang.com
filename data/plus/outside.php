<?php
/*
* 
*
* 
*
* 版权所有 2009-2016 宿迁鑫潮信息技术有限公司，并保留所有权利。
*
* 
 */

if($_GET['id']){
	
	$id = intval($_GET['id']);
	include_once("../outside/".$id.".php");
	$list = $content;
	echo "document.write('$list');";
}
?>