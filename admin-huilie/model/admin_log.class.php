<?php
/*
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2017 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ����������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
 */
class admin_log_controller extends common
{
	function set_search(){
		$ad_time=array('1'=>'����','3'=>'�������','7'=>'�������','15'=>'�������','30'=>'���һ����');
		$search_list[]=array("param"=>"end","name"=>'����ʱ��',"value"=>$ad_time);
		$this->yunset("search_list",$search_list);
	}
	function index_action(){
		$where = "1";
		$this->set_search();
		if($_GET['end']){
			if($_GET['end']=='1'){
				$where.=" and `ctime` >= '".strtotime(date("Y-m-d 00:00:00"))."'";
			}else{
				$where.=" and `ctime` >= '".strtotime('-'.(int)$_GET['end'].'day')."'";
			}
			$urlarr['end']=$_GET['end'];
		}
		if($_GET['stime']){
			$where.=" and `ctime` >='".strtotime($_GET['stime']."00:00:00")."'";
			$urlarr['stime']=$_GET['stime'];
		}
		if($_GET['etime']){
			$where.=" and `ctime` <='".strtotime($_GET['etime']."23:59:59")."'";
			$urlarr['etime']=$_GET['etime'];
		}
		if(trim($_GET['keyword'])!=""){
			$where.=" and (`username`='".$_GET["keyword"]."' or `content` like '%".trim($_GET['keyword'])."%')";
			$urlarr["keyword"]=$_GET["keyword"];
		}
		$urlarr["page"]="{{page}}";
		$pageurl=Url($_GET['m'],$urlarr,'admin');
        $M=$this->MODEL();

		$list=$M->get_page("admin_log",$where." order by `id` desc",$pageurl,$this->config["sy_listnum"]);
		$list['list']=$list['rows'];
		$this->yunset($list);
		$this->yuntpl(array('admin/admin_log'));
	}

	function del_action(){
		$this->check_token();
	    if($_GET["id"]=='all'){
			$this->obj->DB_delete_all("admin_log","1","");
			$this->layer_msg( "����չ���Ա��־��",9,0,$_SERVER['HTTP_REFERER']);
		}elseif($_GET["del"]){
	    	$del=$_GET["del"];
	    	if(is_array($del)){
				$this->obj->DB_delete_all("admin_log","`id` in(".@implode(',',$del).")","");
	    		$this->layer_msg( "��̨��־ɾ��(ID:".@implode(',',$del).")�ɹ���",9,1,$_SERVER['HTTP_REFERER']);
	    	}else{
				$this->layer_msg( "��ѡ����Ҫɾ������Ϣ��",8,1,$_SERVER['HTTP_REFERER']);
	    	}
	    }
	    if(isset($_GET["id"])){
			$result=$this->obj->DB_delete_all("admin_log","`id`='".$_GET["id"]."'" );
 			isset($result)?$this->layer_msg('��̨��־ɾ��(ID:'.$_GET['id'].')�ɹ���',9,0,$_SERVER['HTTP_REFERER']):$this->layer_msg('ɾ��ʧ�ܣ�',8,0,$_SERVER['HTTP_REFERER']);
		}else{
			$this->ACT_layer_msg("�Ƿ�������",8,$_SERVER['HTTP_REFERER']);
		}
	}

}
?>