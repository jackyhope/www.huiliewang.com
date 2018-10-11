<?php
/* *
 * $Author ：PHPYUN开发团队
 *
 * 官网: http://www.phpyun.com
 *
 * 版权所有 2009-2017 宿迁鑫潮信息技术有限公司，并保留所有权利。
 *
 * 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
 */
class apply_controller extends lietou{

    function index_action(){
        $this->resume_total();
        $fake_ids = $this->obj->DB_select_all("fake_company","uid=".$this->uid,"id,companyname");
        $this->yunset("fake_company",$fake_ids);
        $com_id = "";
        foreach ($fake_ids as $list){
            $com_id[] = $list['id'];
        }
//         $where = "com_id in(".implode(",",$com_id).")";
        $where="`com_id`='".$this->uid."' and display=1";

        if($_GET['id']){
            $where .=" and job_id=".$_GET['id'];
        }

        if($_GET['comname']){
            $where .=" and com_name='".trim($_GET['comname'])."'";
        }

        if($_GET['jobname']){
            $where .=" and job_name='".trim($_GET['jobname'])."'";
        }


        if($_GET['identity']){
            $where .=" and 	identity=".intval($_GET['identity']);
        }

        if($_GET['is_browse']){
            if($_GET['is_browse']==-1){
                $where .=" and 	is_browse=0";
            }else{
                $where .=" and 	is_browse=".intval($_GET['is_browse']);
            }

        }
//         if(trim($_GET['keyword'])){
//             $resume=$this->obj->DB_select_all("resume","`r_status`<>'2' and `name` like '%".trim($_GET['keyword'])."%'","`name`,`edu`,`uid`,`exp`");
//             if(is_array($resume) && !empty($resume)){
//                 foreach($resume as $v){
//                     $uid[]=$v['uid'];
//                 }
//             }
//             $urlarr['keyword']=trim($_GET['keyword']);
//             $where.=" and uid in (".pylode(',',$uid).")  ";
//         }
//         if($_GET['jobid']){
//             $jobid=@explode('-', $_GET['jobid']);
//             if (!array_key_exists('1', $jobid)) $jobid['1'] = 1;
//             $where .=" and `job_id`=" . $jobid['0'] . " and `type`=" . $jobid['1'] . " ";
//             $urlarr['jobid']=$_GET['jobid'];
//         }
//         if($_GET['state']){
//             $where.=" and `is_browse`=".intval($_GET['state'])."  ";
//             $urlarr['state']=$_GET['state'];
//         }
        $this->public_action();
        $urlarr['c']="hr";
        $urlarr['page']="{{page}}";
        $pageurl=Url('member',$urlarr);

        $rows=$this->get_page("userid_job",$where."  ORDER BY is_browse asc,datetime desc",$pageurl,"10");

        $jobs2=$this->obj->DB_select_all('company_job','`uid`='.$this->uid,"`id`,`name`");
        $this->yunset("job",$jobs2);
        foreach ($jobs2 as $key=>$val){
            $jobs2[$key]['type']=1;
        }
        $JobList=$jobs2;
        if(is_array($rows) && !empty($rows)){

            $uid=$eid=array();
            foreach($rows as $val){
                $eid[]=$val['eid'];
                $uid[]=$val['uid'];
                $resume_id[]=$val['resume_id'];
            }


            if(empty($resume)){
                $resume=$this->obj->DB_select_all("resume","`r_status`<>'2'  and `uid` in (".pylode(",",$uid).")","`id`,`name`,`edu`,`uid`,`exp`,`sex`,`birthday`,`living`");

                $resume1=$this->obj->DB_select_all("resume","`r_status`<>'2'  and `id` in (".pylode(",",$resume_id).")","`id`,`name`,`edu`,`uid`,`exp`,`sex`,`birthday`,`living`");
            }

            $expect=$this->obj->DB_select_all("resume_expect","`id` in (".pylode(",",$eid).")","`id`,`job_classid`,`salary`,`height_status`");
            $userid_msg=$this->obj->DB_select_all("userid_msg","`fid`='".$this->uid."' and `uid` in (".pylode(",",$uid).")","uid,jobid");
            if(is_array($resume) || is_array($resume1)){
                $resume = $resume?$resume:$resume1;
                include(PLUS_PATH."user.cache.php");
                include(PLUS_PATH."job.cache.php");
                $expectinfo=array();
                foreach($expect as $key=>$val){
                    $jobids=@explode(',',$val['job_classid']);
                    $jobname=array();
                    foreach($jobids as $k=>$v){
                        if($k<5){
                            $jobname[]=$job_name[$v];
                        }
                    }


                    $expectinfo[$val['id']]['jobname']=@implode('、',$jobname);
                    $expectinfo[$val['id']]['salary']=$userclass_name[$val['salary']];
                    $expectinfo[$val['id']]['height_status']=$val['height_status'];
                    $expectinfo[$val['id']]['work_exp'] = $this->obj->DB_select_all("resume_work","eid=".$val['id']." limit 0,3");
                    $expectinfo[$val['id']]['edu_exp'] = $this->obj->DB_select_once("resume_edu","eid=".$val['id']." order by sdate desc");
                }
                foreach($rows as $k=>$v){
                    $rows[$k]['jobname']=$expectinfo[$v['eid']]['jobname'];
                    $rows[$k]['salary']=$expectinfo[$v['eid']]['salary'];
                    $rows[$k]['height_status']=$expectinfo[$v['eid']]['height_status'];
                    $rows[$k]['work_exp']=$expectinfo[$v['eid']]['work_exp'];
                    $rows[$k]['edu_exp']=$expectinfo[$v['eid']]['edu_exp'];
                    $down_resume = $this->obj->DB_select_once("down_resume","comid=".$this->uid." and eid=".$v['eid']);
                    foreach($resume as $val){
                        $rows[$k]['sex']=$val['sex'];
                        $rows[$k]['living']=$val['living'];
                        if($v['identity']==3){
                            if($v['resume_id']==$val['id']){
                                if($down_resume){
                                    $rows[$k]['name']=$val['name'];
                                }else{
                                    $rows[$k]['name']=substr($val['name'],0,2)."***";
                                }

                                $rows[$k]['edu']=$userclass_name[$val['edu']];
                                $rows[$k]['exp']=$userclass_name[$val['exp']];
                            }
                        }else{
                            if($v['uid']==$val['uid']){
                                if($down_resume){
                                    $rows[$k]['name']=$val['name'];
                                }else{
                                    $rows[$k]['name']=substr($val['name'],0,2)."***";
                                }

                                $rows[$k]['edu']=$userclass_name[$val['edu']];
                                $rows[$k]['exp']=$userclass_name[$val['exp']];
                            }
                        }

                    }


                    foreach($userid_msg as $val){
                        if($v['uid']==$val['uid'] && $val['jobid']==$v['job_id']){
                            $rows[$k]['userid_msg']=1;
                        }
                    }
                }
            }
            $jobnum=$this->obj->DB_select_num("userid_job"," `com_id`='".$this->uid."'");
        }
        if($JobList&&is_array($JobList)&&$jobid['0']){
            foreach($JobList as $val){
                if($jobid['0']==$val['id']){
                    $current=$val;
                }
            }
        }

        $JobM=$this->MODEL("job");
        $company_job=$JobM->GetComjobList(array("uid"=>$this->uid,"state"=>1,"`edate`>'".time()."' and `r_status`<>'2' and `status`<>'1'"),array("field"=>"`name`,`id`"));
        $this->yunset("company_job",$company_job);
        $this->yunset(array('current'=>$current,'rows'=>$rows,'JobList'=>$JobList,'StateList'=>array(array('id'=>1,'name'=>'未查看'),array('id'=>2,'name'=>'已查看'),array('id'=>3,'name'=>'等待通知'),array('id'=>4,'name'=>'条件不符'),array('id'=>5,'name'=>'无法联系'))));
        $this->yunset("rows",$rows);
        if($_GET['w']==1){
            if(empty($_GET['id'])){
                $this->ACT_msg("index.php","该页面不存在");
            }
            $cache_array = $this->obj->cacheget();
            $job_id = $_GET['id'];
            $jobs = $this->obj->DB_select_once("company_job","id=".$job_id);
            $jobs = $this->db->array_action($jobs,$cache_array);
            if($jobs['fake_id']){
                $fake_company = $this->obj->DB_select_once("fake_company","id=".$jobs['fake_id']);
                $jobs['hy_n'] = $fake_company['hy'];
                $jobs['pr_n'] = $fake_company['nature'];
                $jobs['num_n'] = $fake_company['scale'];
            }

            if($jobs['minsalary'] && $jobs['maxsalary']){
                $jobs['job_salary'] = "￥".$jobs['minsalary']."-".$jobs['maxsalary'];
            }elseif ($jobs['minsalary'] && empty($jobs['maxsalary'])){
                $jobs['job_salary'] = "￥".$jobs['minsalary']."以上";
            }else{
                $jobs['job_salary'] = "面议";
            }
            $this->yunset("js_def",3);
            $this->yunset("jobs",$jobs);
            $this->yunset("resume_kind","myself");
            $this->lt_tpl('onejob_receivelist');
        }else{
            $this->yunset("js_def",5);
            $this->yunset("jobnum",$jobnum);

            $this->lt_tpl('command');
        }

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
                $this->layer_msg('删除成功！',9,$layer_type,"index.php?c=apply");
            }else{
                $this->layer_msg('删除失败！',8,$layer_type,"index.php?c=apply");
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
        }else if($_GET['refid']){

            $nid=$this->obj->DB_update_all("userid_job","is_browse=4","`id` in (".$_GET['refid'].") and `com_id`='".$this->uid."'");
            $layer_type='0';
            if($nid){
                $this->obj->member_log("拒绝申请职位的人才",6,3);
                $this->layer_msg('已拒绝！',9,$layer_type,"index.php?c=apply");
            }else{
                $this->layer_msg('拒绝失败！',8,$layer_type,"index.php?c=apply");
            }

        }
    }



}