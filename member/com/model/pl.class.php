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
class pl_controller extends company{
	function index_action(){
		$urlarr=array("c"=>"pl","page"=>"{{page}}");
		$pageurl=Url('member',$urlarr);
		$rows=$this->get_page("company_msg","`cuid`='".$this->uid."' AND `status`='1'",$pageurl,"10");
		if(is_array($rows)){
			foreach($rows as $k=>$v){
				$uid[]=$v['uid'];
			}
			$uid=pylode(",",$uid);
			$user=$this->obj->DB_select_all("resume","`uid` in ($uid)","`uid`,`name`");
			foreach($rows as $k=>$v){
				foreach($user as $val){
					if($v['uid']==$val['uid']){
						$rows[$k]['name']=$val['name'];
					}
				}
			}
		}
		$this->yunset("rows",$rows);
		
		$com=$this->obj->DB_select_once("company","`uid`='".$this->uid."'");
		$this->obj->update_once("company_msg",array("status"=>(int)$_POST['status']),array("id"=>(int)$_POST['id']));
		$this->yunset("com",$com);
		$this->public_action();
		$this->yunset("js_def",7);
		$this->com_tpl('pl');
	}
	function save_action(){
		if($_POST['submit']){
			$data['reply']=$_POST['reply'];
			$data['reply_time']=time();
			$where['id']=(int)$_POST['id'];
			$where['cuid']=$this->uid;
			$nid=$this->obj->update_once("company_msg",$data,$where);
 			if($nid){
 				$this->obj->member_log("�ظ���ҵ����");
 				$this->ACT_layer_msg("�ظ��ɹ���",9,"index.php?c=".$_GET['c']);
 			}else{
 				$this->ACT_layer_msg("����ʧ�ܣ�",8,"index.php?c=".$_GET['c']);
 			}
		} 
	}
	function plset_action(){
		if($_POST['ajax']=="1" && $_POST['id']){		
			$where['uid']=$this->uid;
			$id=$this->obj->update_once("company",array("pl_status"=>(int)$_POST['id']),"`uid`='".$this->uid."'");
			if($id){
				$this->obj->member_log("������ҵ�������״̬");
				echo 1;die;
			}else{
				echo 2;die;
			}
		}
		if($_POST['status'] && $_POST['id']){
			$where['id']=(int)$_POST['id'];
			$where['cuid']=$this->uid;
			$nid=$this->obj->update_once("company_msg",array("status"=>(int)$_POST['status']),$where);
			if($nid){
				$this->obj->member_log("�����ҵ����");
				echo 1;die;
			}else{
				echo 2;die;
			}
		}
	}
	function del_action(){
		if($_GET['id']){
			$del=(int)$_GET['id'];
			$nid=$this->obj->DB_delete_all("company_msg","`id`='".$del."' and `cuid`='".$this->uid."'");
 			if($nid){
 				$this->obj->member_log("ɾ����ҵ����");
 				$this->layer_msg('ɾ���ɹ���',9,0,"index.php?c=pl");
 			}else{
 				$this->layer_msg('ɾ��ʧ�ܣ�',8,0,"index.php?c=pl");
 			}
		}
	}
}
?>