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