<?php
/* *
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2017 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ���������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
*/
class index_controller extends user{
	function index_action(){
        global $db_config1;
        $this->obj->route_dblink($db_config1);
		$this->public_action();
		$this->member_satic();
        $this->com_cache(); 
		$this->user_cache(); 
		include_once PLUS_PATH."/job.cache.php";
		$yqnum=$this->obj->DB_select_num("userid_msg","`uid`='".$this->uid."'");
		$msgnum=$this->obj->DB_select_num("userid_msg","`uid`='".$this->uid."'  and `is_browse`='1'");
		$msg_count=$this->obj->DB_select_num("message","`fa_uid`='".$this->uid."' and `username`='����Ա'");
		$lookNum=$this->obj->DB_select_num("look_resume","`uid`='".$this->uid."' and `status`<>'1'");
		$downNum=$this->obj->DB_select_num("down_resume","`uid`='".$this->uid."'");

		$finder=$this->finder();
		$this->config['user_finder']<count($finder)?$findernum=0:$findernum=$this->config['user_finder']-count($finder);
		$this->yunset("yqnum",$yqnum);
		$this->yunset("finder", $finder);
		$this->yunset("findernum", $findernum); 
		$this->yunset("msgnum", $msgnum);
		$this->yunset("msg_count",$msg_count);
		$this->yunset("lookNum",$lookNum);
		$this->yunset("downNum",$downNum);
		$time=strtotime(date("Y-m-d 00:00:00"));
		$index = $this->obj->DB_select_once("resume_index","`uid`='".$this->uid."'");
		$resume = $this->obj->DB_select_once("resume","`uid`='".$this->uid."'");
		$resume = array_merge($index,$resume);


		if($resume['name']){
			
			foreach($resume as $k=>$v){
				$rlist[$k]['name']=mb_substr($v['name'],0,10,'gbk');
				$eid[]=$v['id'];
				if($v['job_classid']){
					$jobname = array();
					$jobclassid = explode(',',$v['job_classid']);
					foreach($jobclassid as $val){
						if($job_name[$val]){
							$jobname[]=$job_name[$val];
						}
					}
					$jobname = $jobname[0];
					$rlist[$k]['jobname']=$jobname;
				}
				if($v['minsalary'] && $v['maxsalary']){
					$rlist[$k]['user_salary'] =$v['minsalary']."-".$v['maxsalary'];
				}elseif($v['minsalary']){
					$rlist[$k]['user_salary'] =$v['minsalary']."����";
				}else{
                    $rlist[$k]['user_salary'] ="����";
                }
			}
			$user_resume=$this->obj->DB_select_all("user_resume","`eid` in (".@implode(",",$eid).")");
            $this->yunset("resume",$resume);
		}else{
			$_GET['jobwhere']="1=2";
		}
		$atnM=$this->MODEL('ask');
		$auids=$atnM->GetAtnList(array('uid'=>$this->uid),array('field'=>'uid,sc_uid'));
		if($auids&is_array($auids)){
		    foreach($auids as $v){
		        $jobs=$this->MODEL('job')->GetComjobOne(array('uid'=>$v['sc_uid'],'state'=>1,'`edate`>\''.time().'\' order by lastupdate desc'),array('field'=>'uid,id,com_name,name'));
		        if($jobs){
		            $ainfo[]=$jobs;
		        }
		    }
		}
		if($this->config['sy_onedomain']!=""){
			$weburl=get_domain($this->config['sy_onedomain']);
		}else{
			$weburl=get_domain($this->config['sy_weburl']);
		}
		SetCookie("jobrefresh",'1',time() + 86400, "/",$weburl);
		$this->yunset('ainfo',$ainfo);
		$this->yunset("rlist",$rlist);

		$this->yunset("time",$time);
		$this->user_tpl('index');
	}
}
?>