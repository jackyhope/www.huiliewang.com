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
class resume_model extends model{

    function AddExpectHits($id){
		if($this->config['sy_job_hits']>100 || !$this->config['sy_job_hits']){
				$this->config['sy_job_hits']=1;
		}
		$hits=rand(1,$this->config['sy_job_hits']);
        $this->DB_update_all("resume_expect","`hits`=`hits`+".$hits,"`id`='".$id."'");
    }
  
    function SaveLookResume($Values=array(),$Where=array()){
        $ValuesStr=$this->FormatValues($Values);

        if($Where){
            $WhereStr=$this->FormatWhere($Where);
            return $this->DB_update_all('look_resume',$ValuesStr,$WhereStr);
        }else{
            $data['resume_id'] = $Values['resume_id'];
            $data['uid'] = $Values['uid'];
            $data['com_id'] = $Values['com_id'];
            $data['resume_id'] = $Values['resume_id'];
            $data['datetime'] = $Values['datetime'];
            $data['did'] = $Values['did'];
            return $this->insert_into('look_resume',$data);
        }
    }
  
    function SelectResume($Where=array(),$field='*'){
    	$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_once('resume',$WhereStr,$field);
    }
    function SelectResumeOne($Where=array(),$field='*'){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_select_once('resume',$WhereStr,$field);
    }

    function SelectExpectOne($Where=array(),$field='*'){ 
    	$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_once('resume',$WhereStr,$field);
    }
	
	function SelectResumeTpl($Where=array(),$field='*'){ 
    	$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_once('resumetpl',$WhereStr,$field);
    }
  
    function SelectLookResumeOne($Where=array(),$field='*'){
    	$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_once('look_resume',$WhereStr,$field);
    }

    function SelectDownResumeOne($Where=array(),$field="*"){
    	$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_once('down_resume',$WhereStr,$field='*');
    }

    function SelectDownResumeNum($Where=array()){
    	$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_num('down_resume',$WhereStr);
    }

    function SelectEntrustNum($Where=array()) {
    	$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_num('entrust',$WhereStr);
    }
 

	function ResumeAll($Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
    	$WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all('resume',$WhereStr.$FormatOptions['order'],$FormatOptions['field'],$Options['special']);
    }

    /*
     * 简历各个经验数据获取
     */
    function ResumeExp(){

    }

	function UpdateResume($Values=array(),$Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        $ValuesStr=$this->FormatValues($Values);
        return $this->DB_update_all('resume',$ValuesStr,$WhereStr);
    }
   
    function GetResumeExpectNum($Where=array()){
    	$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_num('resume_expect',$WhereStr);
    }
  
	function resume_select($user,$reid){

		if($user){
			$thisember=$this->DB_select_once("member","`uid`='".$user['uid']."'");
			if($user['id']){

				include PLUS_PATH."/city.cache.php";
				include PLUS_PATH."/job.cache.php";
				include PLUS_PATH."/user.cache.php";
				include PLUS_PATH."/industry.cache.php";
                $user['username_n'] = $user['name'];
        
				if($user['photo']){
					$user['resume_photo']=str_replace("./",$this->config['sy_weburl']."/",$user['photo']);
				}else{
					if($user['sex']==1||$user['sex']=='153'){
						$user['resume_photo']=$this->config['sy_weburl'].'/'.$this->config['sy_member_icon']; 
					}else{
						$user['resume_photo']=$this->config['sy_weburl'].'/'.$this->config['sy_member_iconv']; 
					}
				}


                $year=date('Y',$user['birthday']);

                $user['age']=date("Y")-$year;




				$user['name']=iconv("UTF-8","gbk",$user['name']);
				$user['living']  =$city_name[$user['living']];
				$user['user_exp']=$userclass_name[$user['exp']];
				$user['user_marriage']=$userclass_name[$user['marriage']];
				$user['useredu']=$userclass_name[$user['edu']];
				$user['jobstatus']=$userclass_name[$user['jobstatus']];
				$user['salary']=$user['salary'];
				$user['report']=$userclass_name[$user['report']];
				$user['hy']=$industry_name[$user['hy']];
				$user['r_name'] = iconv("UTF-8","gbk",$user['name']);
				$user['description'] = iconv("UTF-8","gbk",$user['description']);
				$user['tag'] = iconv("UTF-8","gbk",$user['tag']);
				$user['attach_info'] = iconv("UTF-8","gbk",$user['attach_info']);
                $user['lastupdate'] = date("Y-m-d",$user['lastupdate']);

				if ($user['tag']){
				    $user['arrayTag']=explode(',', $user['tag']);
				}
				
                if($user['salary']){
				    $user['salary_n'] = round($user['salary']*$user['salary_month']/10000,2);
                }


				$jy=@explode(",",$user_jy['jobs_classid']);
				$jy=array_unique($jy);
				if(@is_array($jy)){
					foreach($jy as $v){
						if($job_name[$v]){
							$jobname[]=$job_name[$v];
						}
					}
					$user['jobname']=@implode(",",$jobname);
					$user['expectjob']=$jobname;
				}

                if($user['citys_id']){
                    $cy = explode(",",$user['citys_id']);
                    foreach ($cy as $list){
                        $citys_name[] = $city_name[$list];
                    }
                    $citys_id = array_filter($citys_name);
                    $user['citys_name'] = @implode(",",$citys_name);
                }

			}
			if(is_array($user['training'])){
			    foreach($user['training'] as $k=>$v){
			        $user_training[$k]['content']=str_replace("\r\n", "<br/>", strip_tags($v['content'],"\r\n"));
			    }
			}
			if(is_array($user['other'])){
			    foreach($user['other'] as $k=>$v){
			        $user_other[$k]['content']=str_replace("\r\n", "<br/>", strip_tags($v['content'],"\r\n"));
			    }
			}
			if($user['work_content']){
			    $work_content = array_filter(unserialize($user['work_content']));
			    foreach($work_content as $k=>$v){
                    $work_content[$k]['workDes']=str_replace("\r\n", "<br/>", strip_tags($v['workDes'],"\r\n"));
			    }
			    $user['user_work'] = array_iconv($work_content,"utf-8","gbk");
			}

			if($user['edu_content']){
                $edu_content =  array_iconv(array_filter(unserialize($user['edu_content'])),"utf-8","gbk");
				foreach($edu_content as $k=>$v){
                    $edu_content[$k]['degree_n']=$userclass_name[$v['degree']];
				}
                $user['user_edu'] =$edu_content;
			}

			if($user['project_content']){
                $project_content = array_filter(unserialize($user['project_content']));
                $user['user_project'] = array_iconv($project_content,"utf-8","gbk");
            }


			if($this->usertype=='2'){ 
				$userid_job=$this->DB_select_once("userid_job","`com_id`='".$this->uid."' and `eid`='".$user_jy['id']."'");
				if(!empty($userid_job)){
					$user['m_status']=1;
				}
			}
			if($this->uid==$user['uid'] && $this->username && $this->usertype==1){
				$user['m_status']=1;
			}
			if($this->uid && $this->username && ($this->usertype==2 || $this->usertype==3)){
				$row=$this->DB_select_once("down_resume","`eid`='".$id."' and comid='".$this->uid."'");
				if(is_array($row)){
					$user['downresume']=1;
					$user['m_status']=1;
					$user['username_n'] = $user['name'];
				}else{
					$user['link_msg']="<a href='javascript:void(0)' onclick=\"for_link('{$user['id']}','{$reid}','".Url("ajax",array('c'=>'for_link'))."')\">查看联系方式</a>";
                                        $user['link_wapmsg']="<a href='javascript:void(0)' onclick=\"for_link('{$user['id']}','{$reid}','".Url("ajax",array('c'=>'forlink'))."')\">查看联系方式</a>";

				}
			}
			if ($user['uid']==$this->uid||$user['downresume']==1){
			    $user['username_n']=$user['name']; 
			}
			if($this->uid && $this->username && $this->uid==$user_jy['uid']){
				
				$user['diy_status']=1;
			}else{
				
				$user['diy_status']=2;
			}
			if($this->uid && $this->username){
				if($this->usertype==1){
					$user['link_msg']="您不是企业用户！";
					$user['link_wapmsg']="您不是企业用户！";
				}
			}
			if(!$this->uid && !$this->username){
				if($user_jy['height_status']==2){
					$usertype=3;
				}else{
					$usertype=2;
				}
				$user['link_msg']="您还没有登录，请点击<a href=\"javascript:void(0);\" onclick=\"showlogin('".$usertype."');\">登录</a>！";
				$user['link_wapmsg']='请登录后查看联系方式
              <a href="'.Url('wap',array(c=>login)).'" class="com_s_logoin">登录</a><a href="'.Url('wap',array('c'=>'register','usertype'=>'2')).'" class="com_s_reg">注册</a>';
			}
           
			if($_GET['look']){
				session_start();

				if(!preg_match("/^\d*$/",$_SESSION['auid'])){return false;}

				$row = $this->DB_select_once("admin_user","`uid`='".$_SESSION['auid']."'");

				if(!empty($row) && $_SESSION['ashell'] == md5($row['username'].$row['password'].$this->md)){
					$user['m_status']=1;
				}else{
					echo "您无权查看！";die;
				}
			}
			if($userid_job['is_browse']=='1'){
				$this->DB_update_all("userid_job","`is_browse`='2'","`id`='".$userid_job['id']."'");
			}
			$user['per']=sprintf('%.2f%%',($user_jy['dnum']/$user_jy['hits'])*100);
			$user_jy['annex']=str_replace("./","/",$user_jy['annex']);
			$user['description']=str_replace(array("\r","\n"), array("<br/>","<br/>"), strip_tags($user['description'],"\r,\n"));
			$user['user_jy']=$user_jy;
			$user['user_tra']=$user_training;
			$user['user_other']=$user_other;
		}
//        var_dump($user);exit();
		return $user;
	}

    function doc_resume($user){
        include PLUS_PATH."/city.cache.php";
        include PLUS_PATH."/job.cache.php";
        include PLUS_PATH."/user.cache.php";
        include PLUS_PATH."/industry.cache.php";
        $year=date('Y',$user['birthday']);
        $user['age']=date("Y")-$year;
        $user['sex'] = 1?$user['gender']=iconv("gbk","UTF-8","男"):$user['gender']=iconv("gbk","UTF-8","女");
        $user['living']  =iconv("gbk","UTF-8",$city_name[$user['living']]);
        $user['user_exp']=iconv("gbk","UTF-8",$userclass_name[$user['exp']]);
        $user['user_marriage']=iconv("gbk","UTF-8",$userclass_name[$user['marriage']]);
        $user['useredu']=iconv("gbk","UTF-8",$userclass_name[$user['edu']]);
        $user['jobstatus']=iconv("gbk","UTF-8",$userclass_name[$user['jobstatus']]);
        $user['hope_salary']=$user['hope_salary'];
        $user['report']=iconv("gbk","UTF-8",$userclass_name[$user['report']]);
        $user['hy']=iconv("gbk","UTF-8",$industry_name[$user['hy']]);

        $user['lastupdate']=date("Y-m-d",$user['lastupdate']);

        $jy=@explode(",",$user['jobs_classid']);
        $jy=array_unique($jy);
        if(@is_array($jy)){
            foreach($jy as $v){
                if($job_name[$v]){
                    $jobname[]=$job_name[$v];
                }
            }
            $user['jobname']=@implode(",",$jobname);
            $user['expectjob']=iconv("gbk","UTF-8",$jobname);
        }

        if($user['citys_id']){
            $cy = explode(",",$user['citys_id']);
            foreach ($cy as $list){
                $citys_name[] = $city_name[$list];
            }
            $citys_id = array_filter($citys_name);
            $user['citys_name'] = iconv("gbk","UTF-8",@implode(",",$citys_name));
        }

        if(is_array($user['training'])){
            foreach($user['training'] as $k=>$v){
                $user_training[$k]['content']=str_replace("\r\n", "<br/>", strip_tags($v['content'],"\r\n"));
            }
        }
        if(is_array($user['other'])){
            foreach($user['other'] as $k=>$v){
                $user_other[$k]['content']=str_replace("\r\n", "<br/>", strip_tags($v['content'],"\r\n"));
            }
        }
        if($user['work_content']){
            $work_content = array_filter(unserialize($user['work_content']));
            foreach($work_content as $k=>$v){
                $work_content[$k]['workDes']=str_replace("\r\n", "<br/>", strip_tags($v['workDes'],"\r\n"));
                $work_content[$k]['DateTime']=date("Y.m",$v['startDateStr'])." - ".date("Y.m",$v['endDateStr']);
            }
            $user['user_work'] = $work_content;

        }

        if($user['edu_content']){
            $edu_content =  array_filter(unserialize($user['edu_content']));
            foreach($edu_content as $k=>$v){
                $edu_content[$k]['degree_n']=iconv("gbk","utf-8",$userclass_name[$v['degree']]);
                $edu_content[$k]['DateTime']=date("Y.m",$v['startDateStr'])." - ".date("Y.m",$v['endDateStr']);
            }
            $user['user_edu'] =$edu_content;
        }

        if($user['project_content']){
            $project_content =  array_filter(unserialize($user['project_content']));
            foreach($project_content as $k=>$v){
                $project_content[$k]['DateTime']=date("Y.m",$v['startDateStr'])." - ".date("Y.m",$v['endDateStr']);
            }
            $user['user_project'] =$project_content;
        }
//        $user['user_project']= array_filter(unserialize($user['project_content']));

        return $user;
    }


    function GetFavjobOne($Where=array(),$Options=array('field'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_once('fav_job',$WhereStr,$FormatOptions['field']);
    }
	function GetResumeExpectOne($Where=array(),$Options=array()){
		$WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_once('resume_expect',$WhereStr,$FormatOptions['field']);
    }
    function GetResumeExpectList($Where=array(),$Options=array()){
		$WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
		return $this->DB_select_all('resume_expect',$WhereStr,$FormatOptions['field'],$FormatOptions['special']);
    }
    function UpdateResumeExpect($Values=array(),$Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        $ValuesStr=$this->FormatValues($Values);
        return $this->DB_update_all('resume_expect',$ValuesStr,$WhereStr);
    }
    function DeleteUserEntrust($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('user_entrust',$WhereStr);
    }
    function GetUserEntrustOne($Where=array(),$Options=array()){
		$WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_once('user_entrust',$WhereStr,$FormatOptions['field']);
    }
    function GetUserEntrustList($Where=array(),$Options=array()){
		$WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_once('user_entrust',$WhereStr,$FormatOptions['field']);
    }
    function UpdateUserEntrust($Values=array(),$Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        $ValuesStr=$this->FormatValues($Values);
        return $this->DB_update_all('user_entrust',$ValuesStr,$WhereStr);
    }
    function AddResumeExpect($Values=array()){

        return $this->insert_into('resume_expect',$Values);
    }
    function DeleteResumeExpect($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('resume_expect',$WhereStr);
    }
	function GetUserResumeOne($Where=array(),$Options=array()){
		$WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_once('user_resume',$WhereStr,$FormatOptions['field']);
    }
    function GetUserResumeList($Where=array(),$Options=array()){
		$WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all('user_resume',$WhereStr,$FormatOptions['field']);
    }
    function UpdateUserResume($Values=array(),$Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        $ValuesStr=$this->FormatValues($Values);
        return $this->DB_update_all('user_resume',$ValuesStr,$WhereStr);
    }
    function AddUserResume($Values=array()){
        return $this->insert_into('user_resume',$Values);
    }
    function DeleteUserResume($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('user_resume',$WhereStr);
    }
    function GetResumeShowList($Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all('resume_show',$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
    function GetResumeSkillList($Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all('resume_skill',$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
    function GetResumeEduList($Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all('resume_edu',$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
    function GetResumeProjectList($Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all('resume_project',$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
    function GetResumeCertList($Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all('resume_cert',$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
    function GetResumeWorkList($Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all('resume_work',$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
    function GetResumeTrainingList($Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all('resume_training',$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
    function GetResumeOtherList($Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all('resume_other',$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
    function DeleteResumeSkill($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('resume_skill',$WhereStr);
    }
    function DeleteResumeEdu($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('resume_edu',$WhereStr);
    }
    function DeleteResumeProject($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('resume_project',$WhereStr);
    }
    function DeleteResumeCert($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('resume_cert',$WhereStr);
    }
    function DeleteResumeWork($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('resume_work',$WhereStr);
    }
    function DeleteResumeTraining($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('resume_training',$WhereStr);
    }
    function DeleteResumeOther($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('resume_other',$WhereStr);
    }
    function DeleteLookResume($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('look_resume',$WhereStr);
    }
    function AddEntrustRecord($Values=array()){
        return $this->insert_into('user_entrust_record',$Values);
    }
    function GetEntrustRecordList($Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all('user_entrust_record',$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
    function GetEntrustRecordOne($Where=array(),$Options=array()){
		$WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_once('user_entrust_record',$WhereStr,$FormatOptions['field']);
    }
    function DeleteEntrustRecord($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('user_entrust_record',$WhereStr);
    }
    function DeleteDownResume($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('down_resume',$WhereStr);
    }
	function AddResume($Table,$Values=array(),$Where=array()){
		if($Where){
			$WhereStr=$this->FormatWhere($Where);
			$ValuesStr=$this->FormatValues($Values);
            return $this->DB_update_all($Table,$ValuesStr,$WhereStr);
		}else{
			return $this->insert_into($Table,$Values);
		}
	}
	function GetResumeAbouts($Table,$Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all($Table,$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
	function GetResumeAbout($Table,$Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_once($Table,$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
    function SelectTalentPool($Where=array(),$field="*"){
    	$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_once('talent_pool',$WhereStr,$field='*');
    }
	function GetUserMsgNum($Where=array()){
    	$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_once('userid_msg',$WhereStr,$field='*');
    }
	function GetUserMsgNums($Where=array(),$Options=array('field'=>null,'orderby'=>null,'groupby'=>null,'limit'=>null)){
        $WhereStr=$this->FormatWhere($Where);
        $FormatOptions=$this->FormatOptions($Options);
        return $this->DB_select_all("userid_msg",$WhereStr.$FormatOptions['order'],$FormatOptions['field']);
    }
   
    function TemporaryResume($Values=array()){
        return $this->insert_into('temporary_resume',$Values);
    }

    function SelectTemporaryResume($Where=array()){
    	$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_once('temporary_resume',$WhereStr);
    }
   
    function DelTemporaryResume($Where=array()){
        $WhereStr=$this->FormatWhere($Where);
        return $this->DB_delete_all('temporary_resume',$WhereStr);
    }
	
	function SelectUserIdMsgNum($Where=array()){
		$WhereStr=$this->FormatWhere($Where);
		return $this->DB_select_num('userid_msg',$WhereStr);
	}
	
	function CheckAddExpect($infoDate,$expectDate){
		$infoDate = array(
				"name"		=>	$_POST['uname'],
				"sex"		=>	$_POST['sex'],
				"birthday"	=>	$_POST['birthday'],
				"edu"		=>	$_POST['edu'],
				"exp"		=>	$_POST['exp'],
				"living"	=>	$_POST['living'],
				"lastupdate"=>time()
			);
	}

	function lie_work($id){
	    global $db,$db_config;
	    $this->db = $db;
        $this->def = $db_config['def'];
        $data['lietou_num'] = $this->DB_select_num("userid_job","identity=3 and eid=".$id." group by uid");
        $data['job_num'] = $this->DB_select_num("userid_job","identity=3 and eid=".$id);
        $data['download_num'] = $this->DB_select_num("userid_job","identity=3 and is_browse=6 and eid=".$id);
        $data['last_recommend'] = $this->DB_select_once("userid_job","identity=3 and eid=".$id." order by datetime desc");
        if( $data['last_recommend']){
            $data['last_recommend'] = date("Y-m-d", $data['last_recommend']['datetime']);
        }
        return $data;
    }
}
?>