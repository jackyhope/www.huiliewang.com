<?php
/* *
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2016 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ���������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
*/
class info_controller extends user{
	function index_action(){
		include(CONFIG_PATH."db.data.php");
		unset($arr_data['sex'][3]);
		$this->yunset("arr_data",$arr_data);
		$row=$this->obj->DB_select_once("resume","`uid`='".$this->uid."'");
		 
		$save=$this->obj->DB_select_once("lssave","`uid`='".$this->uid."'and `savetype`='1'");
		$save=unserialize($save['save']);
		if($save['lastupdate']){
			$save['time']=date('H:i',ceil(($save['lastupdate'])));
		} 
		$row['wxewm']=str_replace("./",$this->config['sy_weburl']."/",$row['wxewm']);
		$nametype=array('1'=>'��ȫ����','2'=>'��ʾ���','3'=>'��������');
		$this->yunset("nametype",$nametype);
		$this->yunset("save",$save);
		$this->yunset("row",$row);
		$this->public_action();
		$this->city_cache();
		$this->user_cache();
		$this->user_tpl('info');
	}
	function save_action(){

		if($_POST['submitBtn']){
			$row=$this->obj->DB_select_once("resume","`uid`='".$this->uid."'");
			unset($_POST['submitBtn']);
			delfiledir("../data/upload/tel/".$this->uid);
			$_POST['lastupdate']=time();
			$where['uid']=$this->uid;

            unset($_POST['save']);
            $data['sex'] = $_POST['sex'];
            $data['birthday'] = $_POST['birthday'];
            $data['edu'] = $_POST['edu'];
            $data['exp'] = $_POST['exp'];
            $data['living'] = $_POST['living'];
			$this->obj->update_once('resume_index',$_POST,$where);
			$nid=$this->obj->update_once('resume',$_POST,$where);
			$resume_num=$this->obj->DB_select_num("resume_index","`uid`='".$this->uid."'");

			if($resume_num<1){
				$url="index.php?c=expect";
			}else{
				$url=$_SERVER['HTTP_REFERER'];
			}
			if ($nid){
				if(!empty($mvalue)){
					$this->obj->update_once('member',$mvalue,$where);
				}
				$this->obj->DB_delete_all("lssave","`uid`='".$this->uid."'and `savetype`='1'");
				$this->obj->member_log("�޸Ļ�����Ϣ",7);
				if($row['name']==""||$row['living']==""){ 
					$this->company_invtal($this->uid,$this->config['integral_userinfo'],true,"�״���д��������",true,2,'integral',25);
				}
				$this->ACT_layer_msg("��Ϣ���³ɹ���",9,$url);
			}else{
				$this->ACT_layer_msg("��Ϣ����ʧ�ܣ�",8,$url);
			}
		}
	}
	function phototype_action(){
		$this->obj->DB_update_all("resume","`phototype`='".intval($_POST['phototype'])."'","uid='".$this->uid."'");
		$this->obj->DB_update_all("resume_expect","`phototype`='".intval($_POST['phototype'])."'","uid='".$this->uid."'");
		echo $_POST['phototype'];die();
	}
	function upewm_action(){
	    if ($_POST['uppic']){
	        $resume=$this->obj->DB_select_once("resume","`uid`='".$this->uid."'","wxewm");
	        if(is_uploaded_file($_FILES['wxewm']['tmp_name'])){
	            $upload=$this->upload_pic("../data/upload/user/",false);
	            $pictures=$upload->picture($_FILES['wxewm']);
	            $this->picmsg($pictures,$_SERVER['HTTP_REFERER']);
	            $wxewm = str_replace("../data","./data",$pictures);
	            if($resume['wxewm']){
	                unlink_pic(".".$resume['wxewm']);
	            }
	            $id=$this->obj->DB_update_all('resume',"`wxewm`='".$wxewm."'","`uid`='".$this->uid."'");
	
	            if($id){
	                unlink_pic(".".$resume['wxewm']);
	                $data['url']=$pictures;
	            }else{
	                $data['msg']=iconv('gbk','utf-8','�ϴ�ʧ��');
	            }
	        }else{
	            $data['msg']=iconv('gbk','utf-8','���ϴ���ά��');
	        }
	        echo json_encode($data);
	    }
	}
}
?>