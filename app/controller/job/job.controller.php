<?php
/*
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2017 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ���������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
 */
class job_controller extends common{
    function lt_tpl($tpl){
        $lietou=$this->obj->DB_select_once("lietou","`uid`='".$this->uid."'");
        $this->yunset("lietou",$lietou);
        $this->yuntpl(array('member/lietou/'.$tpl));

    }
}
?>