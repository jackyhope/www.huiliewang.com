<?php
/* *
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2017 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ����������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
*/
class paymanage_controller extends lietou
{

	function index_action()
	{
		include(CONFIG_PATH."db.data.php");
		$this->yunset("arr_data",$arr_data);
		$this->public_action();
		$urlarr=array("c"=>"paymanage","page"=>"{{page}}");
		$pageurl=Url('member',$urlarr);
		$where="`uid`='".$this->uid."' and `order_state`='2' order by order_time desc";
		$this->get_page("company_order",$where,$pageurl,"10");
		$this->yunset("js_def",4);
		$this->lt_tpl('paymanage');
	}
}
?>