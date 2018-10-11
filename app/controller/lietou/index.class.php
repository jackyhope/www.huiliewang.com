<?php
/*
* $Author ：PHPYUN开发团队
*
* 官网: http://www.phpyun.com
*
* 版权所有 2009-2016 宿迁鑫潮信息技术有限公司，并保留所有权利。
*
* 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
 */

class index_controller extends common {


	function index_action(){
	    if($_GET['uid']){
            $lietou = $this->obj->DB_select_once("lietou","uid=".$_GET['uid']);
            $job = $this->obj->DB_select_all("company_job","uid=".$_GET['uid']." order by edate desc limit 0,3");
            $this->yunset("lietou",$lietou);
            $this->yunset("job",$job);
//            var_dump($lietou);exit();
        }

        $this->yun_tpl(array('liepage'));
	}



}
?>