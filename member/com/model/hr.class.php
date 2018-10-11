<?php
/* *
* $Author ：PHPYUN开发团队
*
* 官网: http://www.phpyun.com
*
* 版权所有 2009-2016 宿迁鑫潮信息技术有限公司，并保留所有权利。
*
* 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
*/
class hr_controller extends company{
	function index_action(){
		$where="`com_id`='".$this->uid."' and display=1";
		if($_GET['jobid']){
			$jobid=@explode('-', $_GET['jobid']);
            $where .=" and `job_id`=" . $jobid['0'];
			$urlarr['jobid']=$_GET['jobid'];
		}
        if($_GET['state']){
			$where.=" and `is_browse`=".intval($_GET['state'])."  ";
			$urlarr['state']=$_GET['state'];
		}
		$this->public_action();
		$urlarr['c']="hr";
		$urlarr['page']="{{page}}";
		$pageurl=Url('member',$urlarr);
		$rows=$this->get_page("userid_job",$where."  ORDER BY is_browse asc,datetime desc",$pageurl,"10");
        $JobList=$this->obj->DB_select_all('company_job','`uid`='.$this->uid,"`id`,`name`");
		if(is_array($rows) && !empty($rows)){
		    $M = $this->MODEL("resume");
            foreach ($rows as $k=>$list){
                $resume = $this->obr->DB_select_once("resume","id=".$list['eid']);
                $resume = $M->resume_select($resume);
                $rows[$k]['resume'] = $resume;
                $lietou = $this->obj->DB_select_once("lietou","uid=".$list['uid'],"name");
                $rows[$k]['lietou_name'] = $lietou['name'];
            }
		}


		$JobM=$this->MODEL("job");
		$company_job=$JobM->GetComjobList(array("uid"=>$this->uid,"state"=>1,"`edate`>'".time()."' and `r_status`<>'2' and `status`<>'1'"),array("field"=>"`name`,`id`"));
		$this->yunset("company_job",$company_job);
		$this->yunset(array('rows'=>$rows,'JobList'=>$JobList,'StateList'=>array(array('id'=>1,'name'=>'未查看'),array('id'=>2,'name'=>'已查看'),array('id'=>3,'name'=>'待定'),array('id'=>4,'name'=>'不合适'),array('id'=>5,'name'=>'无法联系'))));
		$this->company_satic();

		$this->yunset("js_def",5);
		$this->com_tpl('hr');
	} 
	function hrset_action(){

		if($_POST['ajax']==1 && $_POST['ids']){
			$rows=$this->obj->DB_select_all("userid_job","`id` in (".pylode(",",$_POST['ids']).") and `com_id`='".$this->uid."'","`job_id`,`type`");
			$jobid=array();
			if($rows&&is_array($rows)){
				foreach($rows as $val){
					if($val['type']==1){
						$jobid[]=$val['job_id'];
					}elseif($val['type']==2){
						$ltjobid[]=$val['job_id'];
					}
				}
				$this->obj->DB_update_all("company_job","`operatime`='".time()."'","`id` in (".pylode(",",$jobid).") and `uid`='".$this->uid."'");
			}
			$userid=$this->obj->DB_select_all("userid_job","`com_id`='".$this->uid."' and `is_browse`<>'1'","`id`");
			if($userid&&is_array($userid)){
				foreach($userid as $v){
					$userids[]=$v['id'];
				}
			}
			$this->obj->DB_update_all("userid_job","`is_browse`='2'","`id` in (".pylode(",",$_POST['ids']).") and `id` not in (".pylode(",",$userids).") and `com_id`='".$this->uid."' ");
			$this->obj->member_log("批量阅读申请职位的人才");
			$this->layer_msg('操作成功！',9,0,"index.php?c=hr");
		}else if($_POST['delid']||$_GET['delid']){
			if(is_array($_POST['delid'])){
				$id=pylode(",",$_POST['delid']);
				$layer_type='1';
			}else{
				$id=(int)$_GET['delid'];
				$layer_type='0';
			}
			$sq_num = $this->obj->DB_select_all("userid_job","`id` in (".$id.") and `com_id`='".$this->uid."'","`uid`,`job_id`,`type`");
			if(is_array($sq_num)){
				$jobid=array();
				$uid=array();
				foreach($sq_num as $v){
					if($v['type']==1){
						$jobid[]=$v['job_id'];
					}elseif($v['type']==2){
						$ltjobid[]=$v['job_id'];
					}
					$uid[]=$v['uid']; 
		    	}
				$this->obj->DB_update_all("company_job","`operatime`='".time()."'","`id` in (".pylode(",",$jobid).") and `uid`='".$this->uid."'");
				$this->obj->DB_update_all("member_statis","`sq_jobnum`=`sq_jobnum`-1","`uid`  in(".pylode(",",$uid).")");
			}
			$num=count($sq_num);
			$this->obj->DB_update_all("company_statis","`sq_job`=`sq_job`-$num","`uid`='".$this->uid."'");
			
				
//			$nid=$this->obj->DB_delete_all("userid_job","`id` in (".$id.") and `com_id`='".$this->uid."'"," ");
            $nid=$this->obj->DB_update_all("userid_job","display=0","`id` in (".$id.") and `com_id`='".$this->uid."'");
			if($nid){
				$this->obj->member_log("删除申请职位的人才",6,3);
				$this->layer_msg('删除成功！',9,$layer_type,"index.php?c=hr");
			}else{
				$this->layer_msg('删除失败！',8,$layer_type,"index.php?c=hr");
			}
		}else if($_POST['browse']){
			$browse=(int)$_POST['browse'];
			$id=(int)$_POST['id'];
			$row = $this->obj->DB_select_once("userid_job","`id`='".$id."' and `com_id`='".$this->uid."'","`uid`,`job_id`,`type`");
			if($row['type']==1){
				$this->obj->DB_update_all("company_job","`operatime`='".time()."'","`id`='".$row['job_id']."' and `uid`='".$this->uid."'");
			}
			$this->obj->DB_update_all("userid_job"," `is_browse`='".$browse."'","`id`='".$id."' and `com_id`='".$this->uid."'");
			if($browse==4){ 
				$resumeuid=$this->obj->DB_select_once("userid_job"," `id`='".$id."'",'eid,job_id');
				$resumeexp=$this->obj->DB_select_once("resume_expect","`id`='".$resumeuid['eid']."' and `r_status`<>'2' and `status`='1'",'uid,uname');
				$uid=$this->obj->DB_select_once("resume","`uid`='".$resumeexp['uid']."'","telphone,email");
				if($row['type']==1){
					$comjob=$this->obj->DB_select_once("company_job","`uid`='".$this->uid."' and `id`='".$resumeuid['job_id']."'","name,com_name");
				}
				$data['uid']=$resumeexp['uid'];
				$data['cname']=$this->username;
				$data['name']=$resumeexp['uname'];
				$data['type']="sqzwhf";
				$data['cuid']=$this->uid;
				$data['company']=$comjob['com_name'];
				$data['jobname']=$comjob['name'];
				if($this->config['sy_msg_sqzwhf']=='1'&&$uid["telphone"]&&$this->config["sy_msguser"]&&$this->config["sy_msgpw"]&&$this->config["sy_msgkey"]&&$this->config['sy_msg_isopen']=='1'){$data["moblie"]=$uid["telphone"]; }
				if($this->config['sy_email_sqzwhf']=='1' && $uid["email"] && $this->config['sy_email_set']=="1"){$data["email"]=$uid["email"]; }
				if($data["email"]||$data['moblie']){
					$this->send_msg_email($data);
				}
			}
			echo '1';die;
		}
	}
}
?>