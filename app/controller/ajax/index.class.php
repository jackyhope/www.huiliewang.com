<?php
/*
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2016 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ���������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����?
 */

class index_controller extends common{
    
    function comindex_favjob_action(){
        if(!$this->uid || !$this->username ){
            echo 4;die;
        }else if($this->usertype!=1){
            echo 0;die;
        }else{
            $JobM=$this->MODEL("job");
            $jobid=@explode(",",$_POST['codewebarr']);
            if(is_array($jobid)){
                foreach($jobid as $val){
                    if(intval($val)>0){
                        $job_ids[] =intval($val);
                    }
                }
                $jobids = pylode(",",$job_ids);
                if(strstr($jobids,',')==false){
                    $rows=$JobM->GetFavJobOne(array("uid"=>$this->uid,"job_id"=>(int)$jobids,"type"=>(int)$_POST['type']),array("field"=>"`id`"));
                }else{
                    $rows=$JobM->GetFavJobOne(array("uid"=>$this->uid,"`job_id` in (".$jobids.")","type"=>(int)$_POST['type']),array("field"=>"`id`"));
                }
                if(is_array($rows)&&!empty($rows)){
                    echo 3;die;
                }
                $M=$this->MODEL("userinfo");
                $historyM = $this->MODEL('history');
                foreach($jobid as $v){
                    $row=$JobM->GetComjobOne(array("id"=>(int)$v,"`r_status`<>'2'"),array("field"=>"name,com_name,uid"));
                    $value['job_id']=$v;
                    $value['com_name']=$row['com_name'];
                    $value['job_name']=$row['name'];
                    $value['com_id']=$row['uid'];
                    $value['uid']=$this->uid;
                    $value['datetime']=mktime();
                    $value['type']=(int)$_POST['type'];
                    $nid=$JobM->AddFavJob($value);
                    $favid[] = $v;

                    if($nid){
                        $M->UpdateUserStatis(array("`fav_jobnum`=`fav_jobnum`+1"),array("uid"=>$this->uid),array("usertype"=>"1"));
                        $state_content = "���ղ���ְλ <a href=\"".Url("job",array('c'=>'comapply','id'=>$v))."\" target=\"_bank\">".$row['name']."</a>";
                        $this->addstate($state_content,2);
                        $this->obj->member_log("���ղ���ְλ��".$row['name'],5);
                    }
                }
                if(!empty($favid)){
                    $historyM->addHistory('favjob',implode(',',$favid));
                    echo 1;die;
                }
            }
        }
    }
    function comindex_sqjob_action(){
        $_POST['eid']=(int)$_POST['eid'];
        if(!$this->uid || !$this->username || $this->usertype!=1){
            echo 0;die;
        }else{
            $jobid=@explode(",",$_POST['codewebarr']);
            if(is_array($jobid)){
                $JobM=$this->MODEL("job");
                $M=$this->MODEL("userinfo");
                $historyM = $this->MODEL('history');
                $jobs=$JobM->GetComjobList(array("`r_status`<>'2' and `id` in(".pylode(',',$jobid).") and `edate`>'".time()."'"),array("field"=>"`uid`,`id`,`name`,`com_name`,`link_type`,`snum`"));
                $ids=$uids=$newlink=array();
                foreach($jobs as $v){
                    if(in_array($v['id'],$ids)==false){
                        $ids[]=$v['id'];
                    }
                    if(in_array($v['uid'],$uids)==false){
                        $uids[]=$v['uid'];
                    }
                    if($v['link_type']!='1'){
                        $newlink[]=$v['id'];
                    }
                }
                if($newlink&&is_array($newlink)){
                    $joblinks=$JobM->GetComjoblinkAll(array("jobid"=>(int)$_POST['jobid'],"is_email"=>"1"),array("field"=>"`email`,`jobid`"));
                    if($joblinks&&is_array($joblinks)){
                        foreach($jobs as $k=>$v){
                            foreach($joblinks as $val){
                                if($val['jobid']==$v['id']&&$val['email']){
                                    $jobs[$k]['email']=$val['email'];
                                }
                            }
                        }
                    }
                }
                $company=$this->MODEL("company")->GetComList(array("`uid` in(".pylode(',',$uids).")"),array('field'=>"linktel,`uid`,`linkmail`"));
                if($company&&is_array($company)){
                    $coms=array();
                    foreach($company as $v){
                        $coms[$v['uid']]=$v;
                    }
                }

                $rows=$JobM->GetUseridJobOne(array("uid"=>$this->uid,"`job_id` in(".pylode(',',$ids).")"),array("field"=>"`id`,`job_id`"));
                foreach($jobs as $k=>$v){
                    foreach($rows as $val){
                        if($val['job_id']==$v['id']){
                            unset($jobs[$k]);
                        }
                    }
                }
                $sendid=array();
                foreach($jobs as $v){
                    $value=array();
                    $value['job_id']=$v['id'];
                    $value['com_name']=$v['com_name'];
                    $value['job_name']=$v['name'];
                    $value['com_id']=$v['uid'];
                    $value['uid']=$this->uid;
                    $value['eid']=(int)$_POST['eid'];
                    $value['datetime']=time();
                    $nid=$JobM->AddUseridJob($value);
                    if($nid){
                        $sendid[] = $v['id'];
                        $this->addstate("��������ְλ <a href=\"".Url("job",array('c'=>'comapply','id'=>$v['id']),"1")."\" target=\"_blank\">".$v['name']."</a>",2);
                        if($v['link_type']=='1'&&$coms[$v['uid']]['linkmail']){$v['email']=$coms[$v['uid']]['linkmail'];}
                        $this->sqjobmsg($v,$coms[$v['uid']]['linktel']);
                        $this->obj->member_log("��������ְλ��".$v['name'],6);
                        $M->UpdateUserStatis(array("`sq_job`=`sq_job`+1"),array("uid"=>$v['uid']),array("usertype"=>"2"));
                    }
                }
                if(!empty($sendid)){
                    if($_COOKIE['useridjob']){
                        $useridjob=$_COOKIE['useridjob'].','.pylode(',',$sendid);
                    }else{
                        $useridjob=pylode(',',$sendid);
                    }
                    if($this->config['sy_web_site']=="1"){
                        if($this->config['sy_onedomain']!=""){
                            $weburl=get_domain($this->config['sy_onedomain']);
                        }elseif($this->config['sy_indexdomain']!=""){
                            $weburl=get_domain($this->config['sy_indexdomain']);
                        }else{
                            $weburl=get_domain($this->config['sy_weburl']);
                        }
                        SetCookie("useridjob",$useridjob,time() + 86400,"/",$weburl);
                    }else{
                        SetCookie("useridjob",$useridjob,time() + 86400,"/");
                    }
                    $M->UpdateUserStatis(array("`sq_jobnum`=`sq_jobnum`+'".count($sendid)."'"),array("uid"=>$this->uid),array("usertype"=>"1"));
                    $JobM->UpdateComjob(array("`snum`=`snum`+1"),array("`id` in(".pylode(',',$sendid).")"));
                    $historyM->addHistory('useridjob',implode(',',$sendid));
                    $Weixin=$this->MODEL('weixin');
                    $Weixin->sendWxJob($this->uid,$sendid);
                }
            }
            echo 1;die;
        }
    }
    function sq_job_action(){
        if(!$this->uid || !$this->username || $this->usertype!=1){
            echo 0;die;
        }
        $JobM=$this->MODEL("job");
        $M=$this->MODEL("userinfo");
        $jobid=(int)$_POST['jobid'];
        $job=$JobM->GetComjobOne(array("id"=>$jobid,"`r_status`<>'2' and `status`<>'1'"),array("field"=>"`name`,`uid`,`edate`,`link_type`"));
        if(is_array($job)&&!empty($job)){
            if($job['edate']<time()){
                echo 5;die;
            }
            $useridmsg=$JobM->GetUseridMsgOne(array("uid"=>$this->uid,"jobid"=>$jobid),array('field'=>'`id`'));
            if(is_array($useridmsg)&&!empty($useridmsg)){
                echo 4;die;
            }
            $rows=$JobM->GetUseridJobOne(array("uid"=>$this->uid,"job_id"=>$jobid));
            if(is_array($rows)&&!empty($rows)){
                echo 3;die;
            }
            $value['job_id']=$jobid;
            $value['com_name']=yun_iconv("utf-8","gbk",$_POST['companyname']);
            $value['job_name']=yun_iconv("utf-8","gbk",$_POST['jobname']);
            $value['com_id']=(int)$_POST['companyuid'];
            $value['uid']=$this->uid;
            $value['eid']=(int)$_POST['eid'];
            $value['datetime']=mktime();
            $nid=$JobM->AddUseridJob($value);
            $historyM = $this->MODEL('history');
            $historyM->addHistory('useridjob',$jobid);
            if($nid){
                $JobM->UpdateComjob(array("`snum`=`snum`+1"),array("id"=>$jobid));
                $M->UpdateUserStatis(array("`sq_job`=`sq_job`+1"),array("uid"=>$value['com_id']),array("usertype"=>"2"));
                $M->UpdateUserStatis(array("`sq_jobnum`=`sq_jobnum`+1"),array("uid"=>$this->uid),array("usertype"=>"1"));

                if($job['link_type']=='1'){
                    $ComM=$this->MODEL("company");
                    $job_link=$ComM->GetCompanyInfo(array("uid"=>$job['uid']),array("field"=>"`linkmail` as email,`linktel` as link_moblie"));
                }else{
                    $job_link=$JobM->GetComjoblinkOne(array("jobid"=>$jobid,"is_email"=>"1"),array("field"=>"`email`,`link_moblie`"));
                }
                if($this->config['sy_email_set']=="1"){
                    if($job_link['email']){
                        $contents=@file_get_contents(Url("resume",array("c"=>"sendresume","job_link"=>'1',"id"=>(int)$_POST['eid'])));
                        $smtp = $this->email_set();
                        $smtpusermail =$this->config['sy_smtpemail'];
                        $sendid = $smtp->sendmail($job_link['email'],"���յ�һ���µ���ְ����������".$this->config['sy_webname'],$contents);
                        if($sendid){
                            $state = '1';
                        }else{
                            $state = '0';
                        }
                        $this->obj->insert_into("email_msg",array('uid'=>$job['uid'],'name'=>$job['com_name'],'cuid'=>'','cname'=>'','email'=>$job_link['email'],'title'=>"���յ�һ���µ���ְ����������".$this->config['sy_webname'],'content'=>'��������','state'=>$state,'ctime'=>time(),'smtpserver'=>$smtp->user));
                    }
                    if($job_link['link_moblie']){
                        $data=array('uid'=>$job['uid'],'name'=>$job['com_name'],'cuid'=>'','cname'=>'','type'=>'sqzw','jobname'=>$job['name'],'date'=>date("Y-m-d"),'moblie'=>$job_link['link_moblie']);
                        $this->send_msg_email($data);
                    }
                }
                $this->obj->member_log("��������ְλ��".$job['name'],6);
                if($jobid){
                    $Weixin=$this->MODEL('weixin');
                    $Weixin->sendWxJob($this->uid,$jobid);
                }
            }
            echo $nid?1:2;die;
        }else{
            echo 6;die;
        }
    }
    function favjobuser_action(){

        if(!$this->uid || !$this->username){
            echo 0;die;
        }
        if($this->usertype==2){
            echo 4;die;
        }
        $JobM=$this->MODEL("job");
        $rows=$JobM->GetFavJobOne(array("uid"=>$this->uid,"job_id"=>(int)$_POST['id']));
        if(!empty($rows)){
            echo 3;die;
        }else{
            $job=$JobM->GetComjobOne(array("id"=>(int)$_POST['id']),array("field"=>"`id`,`com_name`,`name`,`uid`"));
            $data['job_id']=$job['id'];
            $data['com_name']=$job['com_name'];
            $data['job_name']=$job['name'];
            $data['com_id']=$job['uid'];
            $data['uid']=$this->uid;
            $data['type']=$this->usertype;
            $data['datetime']=time();
            $nid=$JobM->AddFavJob($data);
            $historyM = $this->MODEL('history');
            $historyM->addHistory('favjob',$job['id']);
            if($nid){
                $M=$this->MODEL("userinfo");
                $M->UpdateUserStatis(array("`fav_jobnum`=`fav_jobnum`+1"),array("uid"=>$this->uid),array("usertype"=>"1"));
                $this->obj->member_log("�ղ���ְλ��".$job['name'],5);//��Ա��־
            }
            echo $nid?1:2;die;
        }
    }
    function index_ajaxjob_action(){
        $JobM=$this->MODEL("job");
        $jobid=@explode(",",$_POST['jobid']);
        if(empty($jobid)){
            echo 5;die();
        }
        if(is_array($jobid)){
            foreach($jobid as $value){
                if(intval($value)>0){
                    $job_ids[] =intval($value);
                }
            }
            $jobid = pylode(",",$job_ids);
        }
        if(!$this->uid || !$this->username || $this->usertype!=1){
            echo 0;die;
        }else{
            if(strstr($jobid,',')==false){
                $rows=$JobM->GetUseridJob(array("uid"=>$this->uid,"job_id"=>$jobid),array('field'=>'`id`'));
                if(is_array($rows)&&!empty($rows)){
                    echo 3;die;
                }
                $useridmsg=$JobM->GetUseridMsgOne(array("uid"=>$this->uid,"jobid"=>$jobid),array('field'=>'`id`'));
                if(is_array($useridmsg)&&!empty($useridmsg)){
                    echo 4;die;
                }
            }else{
                $rows=$JobM->GetUseridJob(array("uid"=>$this->uid,"`job_id` in (".$jobid.")"),array('field'=>'`id`,`job_id`'));
                if($rows&&is_array($rows)){
                    foreach($rows as $v){
                        foreach($job_ids as $key=>$val){
                            if($v['job_id']==$val){
                                unset($job_ids[$key]);
                            }
                        }
                    }
                    if($job_ids[0]<1){
                        echo 3;die;
                    }
                }
            }

            $ResumeM=$this->MODEL("resume");
            $rows=$ResumeM->GetResumeExpectList(array("uid"=>$this->uid,"r_status"=>'1'),array("field"=>"`id`,`name`"));
            $def_job=$ResumeM->SelectResume(array("uid"=>$this->uid),"def_job");
            if(is_array($rows)&&!empty($rows)){
                foreach($rows as $v){
                    if($def_job['def_job']==$v['id']){
                        $data.='<em><input type="radio" name="resume" value="'.$v['id'].'" id="resume_'.$v['id'].'" checked/><label for="resume_'.$v['id'].'">'.$v['name'].'</label>(Ĭ�ϼ���)</em>';
                    }else{
                        $data.='<em><input type="radio" name="resume" value="'.$v['id'].'" id="resume_'.$v['id'].'"/><label for="resume_'.$v['id'].'">'.$v['name'].'</label></em>';
                    }
                }
                echo $data;
            }else{
                echo 2;die;
            }
        }
    }
    function indexajaxresume_action(){
        if($_POST){
            $M=$this->MODEL('comtc');
            $return=$M->invite_resume($_POST);
            if($return['status']){
                echo json_encode($return);die;
            }
        }
    }
    function sava_ajaxresume_action(){
        if(!$this->uid || !$this->username || $this->usertype!=2){
            $arr['status']=0;
            echo json_encode($arr);die;
        }
        $jobtype= intval($_POST['jobtype']);
        if($jobtype==''||$jobtype<2){
            $jobtype=0;
        }
        $_POST['uid'] = intval($_POST['uid']);
        $data=array();
        $data['uid']=$_POST['uid'];
        $data['type']=$jobtype;
        $data['title']='��������';
        $data['content']=yun_iconv("utf-8","gbk",$_POST['content']);
        $data['fid']=$this->uid;
        $data['datetime']=time();
        $data['address']=yun_iconv("utf-8","gbk",$_POST['address']);
        $data['intertime']=yun_iconv("utf-8","gbk",$_POST['intertime']);
        $data['linkman']=yun_iconv("utf-8","gbk",$_POST['linkman']);
        $data['linktel']=yun_iconv("utf-8","gbk",$_POST['linktel']);
        $data['jobname']=yun_iconv("utf-8","gbk",$_POST['jobname']);
        $data['jobid']	=yun_iconv("utf-8","gbk",intval($_POST['jobid']));
        $info['jobname']=yun_iconv("utf-8","gbk",$_POST['jobname']);
        $info['username']=yun_iconv("utf-8","gbk",$_POST['username']);
        $info['content']=$data['content'];
        $p_uid=$_POST['uid'];

        $JobM=$this->MODEL("job");

        $num=$JobM->GetComjobNum(array("uid"=>$this->uid,"state"=>1,"id"=>$data['jobid'],"`edate`>'".time()."'"));

        if($num<1){
            $arr['status']=4;
            $arr['msg']=yun_iconv("gbk","utf-8",'��ѡ��Ҫ���Ե�ְλ��');
            echo json_encode($arr);die;
        }

        $black=$JobM->GetBlackOne(array("c_uid"=>$p_uid,"p_uid"=>$this->uid));
        if(!empty($black)){
            $arr['status']=9;
            echo json_encode($arr);die;
        }
        $umessage = $JobM->GetUseridMsgOne(array("uid"=>$p_uid,"fid"=>$this->uid,"jobid"=>intval($_POST['jobid']),'type'=>$jobtype));
        if(is_array($umessage)){
            $arr['status']=8;
            $arr['msg']=yun_iconv("gbk","utf-8",'��ְλ��������˲ţ��벻Ҫ�ظ�����?');
            echo json_encode($arr);die;
        }else{
            $com=$this->obj->DB_select_once("company","`uid`='".$this->uid."'","name,did");
            $resume=$this->obj->DB_select_once("resume","`uid`='".$p_uid."'","name,def_job");
            $data['did']=$com['did'];
            $data['fname']=$com['name'];
            if($_POST['update_yq']=='1'){
                $data['default']=1;
            }else{
                $this->obj->DB_update_all("userid_msg","`default`='0'","`fid`='".$this->uid."'");
            }
            $row=$this->obj->DB_select_once("company_statis","`uid`='".$this->uid."'","`rating`,`vip_etime`,`integral`,`invite_resume`,`rating_type`");

            if($row['vip_etime']>time()||$row['vip_etime']=='0'){

                if($row['rating_type']!="2"){

                    if($row['invite_resume']==0){
                        if($this->config['com_integral_online']=="1"){
                            if($row['integral']<$this->config['integral_interview']){
                                $arr['status']=5;
                                $arr['integral']=$row["integral"];
                            }else{
                                $this->obj->insert_into("userid_msg",$data);
                                $historyM = $this->MODEL('history');
                                $historyM->addHistory('userid_msg',$data['uid']);
                                if($this->config['integral_interview_type']=="1"){
                                    $auto=true;
                                }else{
                                    $auto=false;
                                }
                                $this->company_invtal($this->uid,$this->config['integral_interview'],$auto,"�����Ա����?",true,2,'integral',14);
                                $state_content = "�Ҹ��������˲� <a href=\"".Url("resume",array('c'=>'show','id'=>(int)$resume[def_job]))."\" target=\"_blank\">".$resume['name']."</a> ���ԡ�";
                                $this->addstate($state_content,2);
                                $arr['status']=3;
                                $this->obj->member_log("�������˲ţ�".$resume['name'],4);
                                $this->msg_post($_POST['uid'],$this->uid,$info);
                            }
                        }
                    }else{

                        $this->obj->insert_into("userid_msg",$data);
                        $historyM = $this->MODEL('history');
                        $historyM->addHistory('userid_msg',$data['uid']);
                        $this->obj->DB_update_all("company_statis","`invite_resume`=`invite_resume`-1","uid='".$this->uid."'");
                        $state_content = "�Ҹ��������˲� <a href=\"".Url("resume",array('c'=>'show','id'=>(int)$resume[def_job]))."\" target=\"_blank\">".$resume['name']."</a> ���ԡ�";
                        $this->addstate($state_content,2);
                        $arr['status']=3;
                        $this->obj->member_log("�������˲ţ�".$resume['name'],4);
                        $this->msg_post($_POST['uid'],$this->uid,$info);
                    }

                }else{
                    $this->obj->insert_into("userid_msg",$data);
                    $historyM = $this->MODEL('history');
                    $historyM->addHistory('userid_msg',$data['uid']);
                    $state_content = "�Ҹ��������˲� <a href=\"".Url("resume",array('c'=>'show','id'=>(int)$resume[def_job]))."\" target=\"_blank\">".$resume['name']."</a> ���ԡ�";
                    $this->addstate($state_content,2);
                    $arr['status']=3;
                    $this->obj->member_log("�������˲ţ�".$resume['name'],4);
                    $this->msg_post($_POST['uid'],$this->uid,$info);
                }

            }else{

                if($this->config['com_integral_online']=="1"){

                    if($row['integral'] < $this->config['integral_interview']){
                        $arr['status']=5;
                        $arr['integral']=$row['integral'];
                    }else{
                        $this->obj->insert_into("userid_msg",$data);
                        $historyM = $this->MODEL('history');
                        $historyM->addHistory('userid_msg',$data['uid']);
                        if($this->config['integral_interview_type']=="1"){
                            $auto=true;
                        }else{
                            $auto=false;
                        }
                        $this->company_invtal($this->uid,$this->config['integral_interview'],$auto,"�����Ա����?",true,2,'integral',14);
                        $state_content = "�Ҹ��������˲� <a href=\"".Url("resume",array('c'=>'show','id'=>(int)$_POST[eid]))."\" target=\"_blank\">".$resume['name']."</a> ���ԡ�";
                        $this->addstate($state_content,2);
                        $arr['status']=3;
                        $this->obj->member_log("�������˲ţ�".$resume['name'],4);
                        $this->msg_post($_POST['uid'],$this->uid,$info);
                    }
                }

            }

            if($arr['status']=='3') {
                $Weixin=$this->MODEL('weixin');
                $Weixin->sendWxresume($data);


                $jobid = intval($_POST['jobid']);
                $this->obj->DB_update_all("userid_job",'`is_browse` = 2',"`com_id`={$this->uid} and `job_id`={$jobid}");
            }
        }
        echo json_encode($arr);die;
    }
    function msg_post($uid,$comid,$row=''){
        $com=$this->obj->DB_select_once("company","`uid`='".$comid."'","`uid`,`name`,`linkman`,`linktel`,`linkmail`");
        $info=$this->obj->DB_select_once("resume","`uid`='".$uid."'","`email`,`telphone` as `moblie`,`name`");
        $data=array();
        if($this->config["sy_msguser"]&&$this->config["sy_msgpw"]&&$this->config["sy_msgkey"]&&$this->config['sy_msg_isopen']=='1'){
            $data['moblie']=$info['moblie'];
        }
        if($this->config['sy_email_set']=="1"){
            $data['email']=$info['email'];
        }
        $data['uid']=$uid;
        $data['name']=$info['name'];
        $data['cuid']=$com['uid'];
        $data['cname']=$com['name'];
        $data['type']="yqms";
        $data['company']=$com['name'];
        $data['linkman']=$com['linkman'];
        $data['comtel']=$com['linktel'];
        $data['comemail']=$com['linkmail'];
        $data['content']=@str_replace("\n","<br/>",$row['content']);
        $data['jobname']=$row['jobname'];
        $data['username']=$row['username'];
        if($data['email']||$data['moblie']){
            $this->send_msg_email($data);
        }
    }

    function getPack_action(){
        $statis=$this->obj->DB_select_once("company_statis","`uid`='".$this->uid."'");
        if ($statis){
            $rating=$statis['rating'];
            $discount=$this->obj->DB_select_once("company_rating","`id`=$rating");
        }
        if($_POST['id']){
            $packinfo=$this->obj->DB_select_all("company_service_detail","`type` = '".$_POST['id']."' order by `service_price` asc");
        }else{
            $pack=$this->obj->DB_select_once("company_service","`display`='1'","id");
            $packinfo=$this->obj->DB_select_all("company_service_detail","`type` = '".$pack['id']."' order by `service_price` asc");
        }
        if($packinfo && is_array($packinfo)){
            foreach ($packinfo as $key=>$v){
                $list=array();

                if ($discount['service_discount']){
                    $price=$v['service_price']*$discount['service_discount']*0.01;
                }else{
                    $price=$v['service_price'];
                }
                if ($discount['service_discount']){
                    $pricezk="ר��".(0.1 * $discount['service_discount']).'���Ż�';
                }
                if($v['interview']>0){
                    $list[]='<span class="added_cont_s">�������ԣ�<i class="com_dt_rage">'.$v[interview].'</i>,</span>';
                }
                if($v['job_num']>0){
                    $list[]='<span class="added_cont_s">����ְλ��<i class="com_dt_rage">'.$v[job_num].'</i>,</span>';
                }
                if($v['breakjob_num']>0){
                    $list[]='<span class="added_cont_s">ˢ��ְλ��<i class="com_dt_rage">'.$v[breakjob_num].'</i>,</span>';
                }
                if($v['part_num']>0){
                    $list[]='<span class="added_cont_s">������ְ��<i class="com_dt_rage">'.$v[part_num].'</i>,</span>';
                }
                if($v['breakpart_num']>0){
                    $list[]='<span class="added_cont_s">ˢ�¼�ְ��<i class="com_dt_rage">'.$v[breakpart_num].'</i>,</span>';
                }

                if($v['resume']>0){
                    $list[]="<span class=\"added_cont_s\">���ؼ�����<i class=\"com_dt_rage\">".$v[resume]."</i>,</span>";
                }



                if(!empty($list)){
                    $lists=@implode("+",$list);
                    $html.="<tr><td><label><div class=\"added_cont_b\"><input type='radio' name=\"service_package\" value=\"".$v[id]."\" onclick=\"toChange()\" class=\"added_cont_radio\"/>".$lists."</div></label></td><td align=\"center\"><span class=\"\">".$v[service_price]."</span>Ԫ</td><td align=\"center\"><span class=\"added_de_box_table_jg\">".$price."</span>Ԫ <div class=\"added_de_box_table_jgyh\">".$pricezk."</div> </td></tr>";
                }
            }
        }else{
            $html.="<div class='added_de_box_tip'>�ܱ�Ǹ������ֵ����������ֵ����Ϣ</div>";
        }
        echo $html;die;
    }
    function getrating_action(){
        $MemberM=$this->MODEL('userinfo');
        if($this->usertype=="2"){
            $rating_detial=$this->obj->DB_select_once("company_service_detail");

        }else{
            $rating=$MemberM->GetRatinginfoAll(array("category"=>4,"display"=>1));
        }


        if(is_array($rating_detial)){
            foreach($rating_detial as $key=>$v){
                $list=array();
                if($v['job_num']>0){
                    $list[]='<span class="Download_resume_tips_p_span">����ְλ:<em class="Download_resume_tips_c">'.$v[job_num].'</em>��</span>';
                }
                if($v['resume']>0){
                    $list[]='<span class="Download_resume_tips_p_span">���ؼ���:<em class="Download_resume_tips_c">'.$v[resume].'</em>��</span>';
                }
                if($v['interview']>0){
                    $list[]='<span class="Download_resume_tips_p_span">��������:<em class="Download_resume_tips_c">'.$v[interview].'</em>��</span>';
                }
                if($v['editjob_num']>0){
                    $list[]='<span class="Download_resume_tips_p_span">�޸�ְλ:<em class="Download_resume_tips_c">'.$v[editjob_num].'</em>��</span>';
                }
                if($v['breakjob_num']>0){
                    $list[]='<span class="Download_resume_tips_p_span">ˢ��ְλ:<em class="Download_resume_tips_c">'.$v[breakjob_num].'</em>��</span>';
                }



                if(!empty($list)){
                    $lists=@implode("+",$list);



                    $html.='<div class="Download_resume_con_list"><div class="Download_resume_tips_h1"><input type="radio" name="comvip" value="'.$v[id].'" class="Download_resume_tips_rad" onClick="check_comvip(\''.$v[service_price].'\')">'.$v[name].'<span class="Download_resume_tips_h1_s">'.$v[service_price].'Ԫ</span></div><div  class="Download_resume_tips_p">'.$lists.'</div></div>';
                }

            }






        }
        echo $html;die;
    }
    function for_link_action(){
        $eid=(int)$_POST['eid'];
        $dos = $_POST['dos'];
        $reid = (int)$_POST['reid'];
        
        //������
        $job_id=$this->obj->DB_select_once('userid_job','`id`='.$reid.'','job_id');
        $job_info=$this->obj->DB_select_once('company_job','`id`='.$job_id['job_id'].'','maxsalary,ejob_salary_month');
        $bit = 0;
        $year_num = ($job_info['maxsalary']/10000)*$job_info['ejob_salary_month'];
        $code = 0;
        if( $year_num>0 && $year_num <20){
            $code = 40;
        } elseif($year_num >= 20 && $year_num <=30) {
             $code = 50;
        } elseif($year_num >= 30 && $year_num <=40) {
             $code = 60;
        } elseif($year_num >= 40 && $year_num <=50) {
             $code = 70;
        } elseif($year_num >= 50 && $year_num <=80) {
             $code =80;
        }elseif($year_num >= 90) {
             $code =90;
        }
        
        $user=$this->obj->DB_select_once('resume_expect','`id`='.$eid.'','uid');
        if($user['uid']==$this->uid){
            $arr['status']=5;
            echo json_encode($arr);die;
        }

        if($this->usertype == 2){
            $member = $this->obj->DB_select_once("member","`uid`='{$this->uid}'","`status`");
            if($member['status'] != 1){
                $arr['status'] = 6;
                echo json_encode($arr);die;
            }
        }


        if(!$this->uid || !$this->username || $this->usertype==1){
            if(!$this->uid || !$this->username){
                $arr['status']=1;
                $arr['msg']="���ȵ�¼��";
            }else if($this->usertype=='1'){
                $arr['status']=1;
                $arr['msg']="��������ҵ�˻����޷����ؼ�����";
            }
        }else{
            $resume=$this->obj->DB_select_once("down_resume","`eid`='".$eid."' and `comid`='".$this->uid."'");
//            $user=$this->obj->DB_select_alls("resume","resume_expect","a.`r_status`<>'2' and a.`uid`=b.`uid` and b.`id`='".$eid."'","a.name,a.basic_info,a.telphone,a.telhome,a.email,a.uid,b.id,b.`height_status`");
//            $user=$user[0];
            $user = $this->obr->DB_select_once("resume","`id`=$eid");
            $black=$this->obj->DB_select_once("blacklist","`c_uid`='".$user['uid']."' and `p_uid`='".$this->uid."'");
            if(!empty($black)){
                $arr['status']=1;
                $arr['msg']="���ѱ����û������������?";
            }

            if(!empty($resume)&&$arr['status']==''){
                $arr['status']=3;
            }else if($arr['status']==''){
                if($this->usertype=='2'){
                    $row=$this->obj->DB_select_once("company_statis","`uid`='".$this->uid."'","vip_etime,down_resume,rating_type");
                }
                if($this->usertype=='3'){
                    $row=$this->obj->DB_select_once("lietou_statis","`uid`='".$this->uid."'","vip_etime,down_resume,rating_type");
                }
                $data['eid']=$user[''];
                $data['uid']=$user['uid'];
                $data['comid']=$this->uid;
                $data['did']=$this->userdid;
                $data['downtime']=time();
                if($row['vip_etime']>time() || $row['vip_etime']=="0"){

                    if($row['rating_type']!='2'){
                        if($row['down_resume']==0){
                            if($this->config['com_integral_online']=="1"){
                                $arr['status']=2;
                                $arr['uid']=$user['uid'];
                                if($dos){
                                    $word = "�鿴";
//                                    $arr['status']=8;
                                }else{
                                    $word = "����";
                                }
                                if($this->usertype=='2'){

                                    $arr['msg']="�㽫�۳�".$code."���Ƿ�".$word."��";
                                }else{
                                    $arr['msg']="�㽫�۳�".$code."���Ƿ�".$word."��";
                                }
                            }else{
                                $arr['status']=4;
                                $arr['msg']="��Ա���ؼ��������꣡";
                            }
                        }else{
                            $this->obj->insert_into("down_resume",$data);
                            $this->obj->DB_update_all("resume_expect","`dnum`=`dnum`+'1'","`id`='".$eid."'");
                            if($this->usertype=='2'){
                                $this->obj->DB_update_all("company_statis","`down_resume`=`down_resume`-1","uid='".$this->uid."'");
                            }

                            $state_content = "�������˼��� <a href=\"".Url("resume",array('c'=>'show','id'=>(int)$user[id]))."\" target=\"_blank\">".$user['name']."</a> ��";
                            $this->addstate($state_content,2);
                            $arr['status']=3;
                            $this->obj->member_log("�����˼�����".$user['name'],3);
                            $this->warning("2");
                        }
                    }else{

                        $this->obj->insert_into("down_resume",$data);
                        $this->obj->DB_update_all("resume_expect","`dnum`=`dnum`+'1'","`id`='".$eid."'");
                        $state_content = "�������˼��� <a href=\"".Url("resume",array('c'=>'show','id'=>(int)$user[id]))."\" target=\"_blank\">".$user['name']."</a> ��";
                        $this->addstate($state_content,2);
                        $arr['status']=3;
                        $this->obj->member_log("�����˼�����".$user['name'],3);
                        $this->warning("2");
                    }
                }else{

                    if($this->config['com_integral_online']=="1"){
                        $arr['status']=2;
                        $arr['uid']=$user['uid'];
                        if($this->usertype=='2'){
                            $arr['msg']="�㽫�۳�".$code."���Ƿ����أ�";
                        }else{
                            $arr['msg']="�㽫�۳�".$code."���Ƿ����أ�";
                        }
                    }else{
                        $arr['status']=1;
                        $arr['msg']="���ĵȼ���Ȩ�ѵ��ڣ�";
                    }
                }
            }
            if($arr['status']==3){
                $html="<table>";
                $html.="<tr><td align='right' width='90'>".iconv("gbk", "utf-8","�ֻ���")."</td><td>".$user['telphone']."</td></tr>";
                if($user['basic_info']=='1' && $user['telhome']!=""){
                    $html.="<tr><td align='right' width='90'>".iconv("gbk", "utf-8","������")."</td><td>".$user['telhome']."</td></tr>";
                }
                $html.="<tr><td align='right' width='90'>".iconv("gbk", "utf-8","���䣺")."</td><td>".$user['email']."</td></tr>";
                $html.="</table>";
                $arr['html']=$html;
            }
        }
        $arr['msg']=iconv("gbk", "utf-8",$arr['msg']);
        $arr['usertype']=$this->usertype;

        echo json_encode($arr);die;
    }
    function down_resume_action(){

        $eid=(int)$_POST['eid'];
        $uid=(int)$_POST['uid'];
        $reid = ($_POST['reid']);
        $type=$_POST['type'];
        $data['eid']=$eid;
        $data['uid']=$uid;
        $data['comid']=$this->uid;
        $data['did']=$this->userdid;
        $data['downtime']=time();
        
        
        
        //������
        $job_id=$this->obj->DB_select_once('userid_job','`id`='.$reid.'','job_id');
        $job_info=$this->obj->DB_select_once('company_job','`id`='.$job_id['job_id'].'','maxsalary,ejob_salary_month');
        $bit = 0;
        $year_num = ($job_info['maxsalary']/10000)*$job_info['ejob_salary_month'];
        $code = 0;
        if( $year_num>0 && $year_num <20){
            $code = 40;
        } elseif($year_num >= 20 && $year_num <=30) {
             $code = 50;
        } elseif($year_num >= 30 && $year_num <=40) {
             $code = 60;
        } elseif($year_num >= 40 && $year_num <=50) {
             $code = 70;
        } elseif($year_num >= 50 && $year_num <=80) {
             $code =80;
        }elseif($year_num >= 90) {
             $code =90;
        }
        
        if(!$this->uid || !$this->username || $this->usertype!=2){
            $arr['status']=0;
            $arr['msg']='ֻ����ҵ��Ա�ſ����ؼ�����';
        }else{

            $black=$this->obj->DB_select_once("blacklist","`p_uid`='".$uid."' and `c_uid`='".$this->uid."'");
            if(!empty($black)){
                $arr['status']=7;
                $arr['msg']="���û��ѱ��������������?";
                echo json_encode($arr);die;
            }

            $resume=$this->obj->DB_select_once("down_resume","`eid`='$eid' and `comid`='".$this->uid."'");
            if(is_array($resume)){
                $arr['status']=6;
                echo json_encode($arr);die;
            }
            $username=$this->obj->DB_select_once("member","`uid`='".$uid."' and `usertype`='1'",'username');
            $userid_job=$this->obj->DB_select_once("userid_job","`com_id`='".$this->uid."' and `eid`='".$eid."'");

            if(!empty($userid_job)){

//                $this->obj->insert_into("down_resume",$data);
//                if($_POST['reid']){
//                    $this->obj->DB_update_all("userid_job","is_browse=6","id=".$_POST['reid']);
//                }
//                $this->obj->DB_update_all("resume_expect","`dnum`=`dnum`+'1'","`id`='".$eid."'");
//                $state_content = "�������� <a href=\"".Url("resume",array('c'=>'show','id'=>$eid))."\" target=\"_blank\">".$username['username']."</a> �ļ�����";
//                $this->addstate($state_content,2);
//                $this->obj->member_log("������ ".$username['username']." �ļ�����",3);
//                $this->warning("2");
//                $arr['status']=6;
//                echo json_encode($arr);die;
            }
            $row=$this->obj->DB_select_once("company_statis","`uid`='".$this->uid."'","`down_resume`,`integral`,`vip_etime`,`rating`,`rating_type`");

            if($type=="integral"){
                if($row['integral']<$code && $this->config['integral_down_resume_type']=="2"){
                    $arr['status']=5;
                    $arr['integral']=$row['integral'];
                }else{
                    $this->obj->insert_into("down_resume",['eid'=>$eid,'comid'=>$this->uid,'did' => $this->userdid,'downtime'=>time()]);
                    $this->obj->insert_into("down_resume",$data);
                    if($_POST['reid']){
                        $this->obj->DB_update_all("userid_job","is_browse=6","id=".$_POST['reid']);
                    }
                    if($this->config['integral_down_resume_type']=="1"){
                        $auto=true;
                    }else{
                        $auto=false;
                    }
                    $this->obj->DB_update_all("resume_expect","`dnum`=`dnum`+'1'","`id`='".$eid."'");
                    $this->company_invtal($this->uid,$code,$auto,"���ؼ���",true,2,'integral',13);
                    $state_content = "�������� <a href=\"".Url("resume",array("c"=>'show','id'=>$eid))."\" target=\"_blank\">".$username['username']."</a> �ļ�����";
                    $this->addstate($state_content,2);
                    $arr['status']=3;
                    $this->obj->member_log("������ ".$username['username']." �ļ�����",3);
                    $this->warning("2");
                }
            }else{
                $arr['integral']=$code;
                if($row['rating']==0){
                    $arr['status']=1;
                }else{
                    if($row['vip_etime']>time() || $row['vip_etime']=="0"){
                        if($row['rating_type']!="2"){
                            if($row['down_resume']==0){
                                if($this->config['com_integral_online']=="1"){
                                    $arr['status']=2;
                                }else{
                                    $arr['status']=4;
                                }
                            }else{
                                $this->obj->insert_into("down_resume",$data);
                                $this->obj->DB_update_all("resume_expect","`dnum`=`dnum`+'1'","`id`='".$eid."'");
                                $this->obj->DB_update_all("company_statis","`down_resume`=`down_resume`-1","uid='".$this->uid."'");
                                $state_content = "�������� <a href=\"".Url("resume",array("c"=>'show','id'=>(int)$_POST[eid]))."\" target=\"_blank\">".$username['username']."</a> �ļ�����";
                                $this->addstate($state_content,2);
                                $arr['status']=3;
                                $this->obj->member_log("������ ".$username['username']." �ļ�����",3);
                                $this->warning("2");
                            }
                        }else{
                            $this->obj->insert_into("down_resume",$data);
                            $this->obj->DB_update_all("resume_expect","`dnum`=`dnum`+'1'","`id`='".$eid."'");
                            $state_content = "�������� <a href=\"".Url("resume",array('c'=>'show','id'=>(int)$_POST[eid]))."\" target=\"_blank\">".$username['username']."</a> �ļ�����";
                            $this->addstate($state_content,2);
                            $arr['status']=3;
                            $this->obj->member_log("������ ".$username['username']." �ļ�����",3);
                            $this->warning("2");
                        }
                    }else{
                        if($this->config['com_integral_online']=="1"){
                            $arr['status']=2;
                        }else{
                            $arr['status']=4;
                        }
                    }
                }
            }


        }
        if($arr['msg']){
            $arr['msg']=iconv("gbk", "utf-8",$arr['msg']);
        }
        if($arr['status']==3||$arr['status']==6){
//            $user=$this->obj->DB_select_alls("resume","resume_expect","a.`r_status`<>'2' and a.`uid`=b.`uid` and b.`id`='".$eid."'","a.name,a.basic_info,a.telphone,a.telhome,a.email,a.uid,b.id,b.`height_status`");
//            $user=$user[0];
            $user = $this->obr->DB_select_once("resume","`id`=$eid");
            $html="<table>";
            $html.="<tr><td align='right' width='90'>".iconv("gbk", "utf-8","�ֻ���")."</td><td>".$user['telphone']."</td></tr>";
            if($user['basic_info']=='1' && $user['telhome']!=""){
                $html.="<tr><td align='right' width='90'>".iconv("gbk", "utf-8","������")."</td><td>".$user['telhome']."</td></tr>";
            }
            $html.="<tr><td align='right' width='90'>".iconv("gbk", "utf-8","���䣺")."</td><td>".$user['email']."</td></tr>";
            $html.="</table>";
            $arr['html']=$html;
        }
        echo json_encode($arr);die;
    }


    function ajax_action(){
        include(PLUS_PATH."city.cache.php");
        if(is_array($_POST['str'])){
            $cityid=$_POST['str'][0];
        }else{
            $cityid=$_POST['str'];
        }
        $data="<option value=''>--��ѡ��--</option>";
        if(is_array($city_type[$cityid])){
            foreach($city_type[$cityid] as $v){
                $data.="<option value='$v'>".$city_name[$v]."</option>";
            }
        }
        echo $data;
    }

    function ajax_job_action(){
        include(PLUS_PATH."job.cache.php");
        if(is_array($_POST[str])){
            $jobid=$_POST[str][0];
        }else{
            $jobid=$_POST[str];
        }
        $data="<option value=''>--��ѡ��--</option>";
        if(is_array($job_type[$jobid])){
            foreach($job_type[$jobid] as $v){
                $data.="<option value='$v'>".$job_name[$v]."</option>";
            }
        }
        echo $data;
    }

    function ajax_subject_action(){
        include(PLUS_PATH."subject.cache.php");
        $subjectid=$_POST['str'];

        if(is_array($subject_type[$subjectid])){
            foreach($subject_type[$subjectid] as $v){
                $data.="<div class=\"yun_admin_select_box_list\"><a href=\"javascript:;\" onClick=\"select_new('tnid','".$v."','".$subject_name[$v]."')\">".$subject_name[$v]."</a></div>";
            }
        }
        echo $data;
    }

    function ajax_ltjob_action(){
        include(PLUS_PATH."ltjob.cache.php");
        $jobid=$_POST['str'];
        $data="<option value=''>--��ѡ��--</option>";
        if(is_array($ltjob_type[$jobid])){
            foreach($ltjob_type[$jobid] as $v){
                $data.="<option value='$v'>".$ltjob_name[$v]."</option>";
            }
        }
        echo $data;
    }
    function exchange_action(){
        $where=1;
        if($this->config['sy_web_site']=="1"){
            if($this->config['province']>0 && $this->config['province']!=""){
                $where=" and `provinceid`='".$this->config['province']."'";
            }
            if($this->config['cityid']>0 && $this->config['cityid']!=""){
                $where=" and `cityid`='".$this->config['cityid']."'";
            }
            if($this->config['three_cityid']>0 && $this->config['three_cityid']!=""){
                $where=" and `three_cityid`='".$this->config['three_cityid']."'";
            }
            if($this->config['hyclass']>0 && $this->config['hyclass']!=""){
                $where=" and `hy`='".$this->config['hyclass']."'";
            }
        }
        $where.=" and `edate`>'".time()."' and `state`='1' and `r_status`<>'2' and `status`<>'1' AND `rec_time`>'".time()."' ORDER BY `lastupdate`  DESC";
        $num=$this->obj->DB_select_num("company_job",$where);
        $_GET['page']=(int)$_GET['page'];
        if($num<=$_GET['page']*3){
            $page=1;
        }else{
            $page=intval($_GET['page'])+1;
        }
        $pnum=$_GET['page']*3-3;
        $where.=" limit $pnum,3";
        $rows=$this->obj->DB_select_all("company_job",$where,"`id`,`name`,`uid`,`com_name`,`minsalary`,`maxsalary`,`rec_time`,`exp`,`edu`,`cityid`,`three_cityid`");
        if($rows&&is_array($rows)){
            include(PLUS_PATH."com.cache.php");
            include(PLUS_PATH."city.cache.php");
            $html="<input type=\"hidden\" value='".$page."' id='exchangep'/>";
            foreach($rows as $key=>$val){
                $job_url=Url("job",array("c"=>"comapply","id"=>$val[id]),"1");
                $com_url=Url('company',array("c"=>"show","id"=>$val[uid]));
                if($val['rec_time']>time()){$val['name']="<font color='red'>".$val['name']."</font>";}
                if($val['minsalary']&&$val['maxsalary']){
                    $val['job_salary']='��'.$val['minsalary'].'-'.$val['maxsalary'];
                }elseif($val['minsalary']&&!$val['maxsalary']){
                    $val['job_salary']='��'.$val['minsalary'].'����';
                }else{
                    $val['job_salary']='����';
                }
                $html.="<li> <a href=\"".$job_url."\" class=\"job_recommendation_jobname\">".$val['name']."</a>
                        <div  class=\"job_recommendation_msg\"><span class=\"job_recommendation_city\">".$city_name[$val['cityid']]."</span>".$city_name[$val['three_cityid']]."<span class=\"job_recommendation_jy\">".$comclass_name[$val['exp']]."����</span><span class=\"job_recommendation_xl\">".$comclass_name[$val['edu']]."ѧ��</span></div>
                        <a href=\"".$com_url."\" class=\"job_recommendation_Comname\">".$val['com_name']."</a>
                        <span class=\"job_recommendation_xz\"><em class=\"job_right_box_list_c\">".$val['job_salary']."</em></span> </li>";
            }
        }
        echo $html;die;
    }
    function mapconfig_action(){
        $arr=array();
        $arr['map_x']=$this->config['map_x'];
        $arr['map_y']=$this->config['map_y'];
        $arr['map_rating']=$this->config['map_rating'];
        $arr['map_control']=$this->config['map_control'];
        $arr['map_control_anchor']=$this->config['map_control_anchor'];
        $arr['map_control_type']=$this->config['map_control_type'];
        $arr['map_control_xb']=$this->config['map_control_xb'];
        $arr['map_control_scale']=$this->config['map_control_scale'];
        echo json_encode($arr);
    }
    function mapconfigdiffdomains_action(){
        $arr=array();
        $arr['map_x']=$this->config['map_x'];
        $arr['map_y']=$this->config['map_y'];
        $arr['map_rating']=$this->config['map_rating'];
        $arr['map_control']=$this->config['map_control'];
        $arr['map_control_anchor']=$this->config['map_control_anchor'];
        $arr['map_control_type']=$this->config['map_control_type'];
        $arr['map_control_xb']=$this->config['map_control_xb'];
        $arr['map_control_scale']=$this->config['map_control_scale'];
        echo 'diffdomains('.json_encode($arr).')';
    }



    function resume_report_action(){
        include("./resume/PHPWord.php");
        include("./resume/PHPWord/IOFactory.php");

        $PHPWord  = new PHPWord();
        $document = $PHPWord->loadTemplate('./resume/resume.docx');
        $resume=$this->obr->DB_select_once("resume","`id`='".(int)$_GET['id']."'","*");
        $resume['age'] = date("Y")-date("Y",$resume['birthday']);
        $fileName = $resume['id'];
        $filePath= "./data/resumes/";
        if (!is_dir($filePath)){
            mkdir($filePath,0777,true);  // �����ļ���,����777��Ȩ�ޣ�����Ȩ�ޣ�
        }
        $M=$this->MODEL('resume');
        $resume = $M->doc_resume($resume);
        $document->setValue('name',$resume['name']);
        $document->setValue('intention_jobs',$resume['intention_jobs']);
        $document->setValue('gender',$resume['gender']);
        $document->setValue('age',$resume['age']);
        $document->setValue('experience',$resume['user_exp']);
        $document->setValue('merriage',$resume['merriage']);
        $document->setValue('native_place',$resume['native_place']);
        $document->setValue('currentwage',$resume['currentwage']);
        $document->setValue('district',$resume['living']);
        $document->setValue('education',$resume['useredu']);
        $document->setValue('hopewage',$resume['salary']);
        $document->setValue('edutime0',$resume['user_edu'][0]['DateTime']);
        $document->setValue('school0',$resume['user_edu'][0]['schoolName']);
        $document->setValue('speciality0',$resume['user_edu'][0]['majorName']);
        $document->setValue('education_cn0',$resume['user_edu'][0]['degree_n']);
        $document->setValue('edutime1',$resume['user_edu'][1]['DateTime']);
        $document->setValue('school1',$resume['user_edu'][1]['schoolName']);
        $document->setValue('speciality1',$resume['user_edu'][1]['majorName']);
        $document->setValue('education_cn1',$resume['user_edu'][1]['degree_n']);
        $document->setValue('edutime2',$resume['user_edu'][2]['DateTime']);
        $document->setValue('school2',$resume['user_edu'][2]['schoolName']);
        $document->setValue('speciality2',$resume['user_edu'][2]['majorName']);
        $document->setValue('education_cn2',$resume['user_edu'][2]['degree_n']);

        $document->setValue('worktime0',$resume['user_work'][0]['DateTime']);
        $document->setValue('companyname0',$resume['user_work'][0]['companyName']);
        $document->setValue('jobs0',$resume['user_work'][0]['posName']);
        $document->setValue('duty0',$resume['user_work'][0]['workDes']);
        $document->setValue('worktime1',$resume['user_work'][1]['DateTime']);
        $document->setValue('companyname1',$resume['user_work'][1]['companyName']);
        $document->setValue('jobs1',$resume['user_work'][1]['posName']);
        $document->setValue('duty1',$resume['user_work'][1]['workDes']);
        $document->setValue('worktime2',$resume['user_work'][2]['DateTime']);
        $document->setValue('companyname2',$resume['user_work'][2]['companyName']);
        $document->setValue('jobs2',$resume['user_work'][2]['posName']);
        $document->setValue('duty2',$resume['user_work'][2]['workDes']);
        $document->setValue('protime0',$resume['user_project'][0]['proName']);
        $document->setValue('projectname0',$resume['user_project'][0]['DateTime']);
        $document->setValue('projectduty0',$resume['user_project'][0]['projectOffice']);
        $document->setValue('projectdescribe0',$resume['user_project'][0]['proDes']);
        $document->setValue('projectachieve0',$resume['user_project'][0]['projectPerfromnance']);
        $document->save($filePath.$fileName.'.docx');
        $this->downfile($filePath.$fileName.'.docx',$resume['name'].".docx");
        unlink($_SERVER['DOCUMENT_ROOT']."/data/resumes/".$fileName.'.docx');

    }

    //�����ļ�������
    function downfile($file,$files){
        $filename=realpath($file); //�ļ���
//        echo basename($file);exit();

//    echo basename($filename);exit();
        header("Content-Type: application/force-download");
        header("Content-Disposition: attachment; filename=".$files);
        readfile($filename);

    }


    function startword($wordname,$html){
        ob_start();
        header("Content-Type:  application/msword");
        header("Content-Disposition:  attachment;  filename=".$wordname.".doc");
        header("Pragma:  no-cache");
        header("Expires:  0");
        echo $html;
    }



    function show_leftjob_action(){
        $CacheList=$this->MODEL('cache')->GetCache(array('job'));
        $this->yunset($CacheList);extract($CacheList);

        $html.='<ul>';
        if(is_array($job_index)){
            foreach($job_index as $j=>$v){
                $jobclassurl=$this->config['sy_weburl']."/job/?c=search&job1=$v";
                if($j<17){
                    $html.='<li class="lst'.$j.' " onmouseover="show_job(\''.$j.'\',\'0\');" onmouseout="hide_job(\''.$j.'\');"> <b></b> <a class="link" href="'.$jobclassurl.'" title="'.$job_name[$v].'">'.$job_name[$v].'</a> <i></i><div class="lstCon"><div class="lstConClass">';
                    if(is_array($job_type[$v])){
                        foreach($job_type[$v] as $vv){
                            $jobclassurls=$this->config['sy_weburl']."/job/?c=search&job1=$v&job1_son=$vv";
                            $html.=' <dl><dt> <a  href="'.$jobclassurls.'" title="'.$job_name[$vv].'">'.$job_name[$vv].'</a> </dt><dd> ';
                            if(is_array($job_type[$vv])){
                                foreach($job_type[$vv] as $vvv){
                                    $jobclassurlss=$this->config['sy_weburl']."/job/?c=search&job1=$v&job1_son=$vv&job_post=$vvv";
                                    $html.=' <a  href="'.$jobclassurlss.'" title="'.$job_name[$vvv].'">'.$job_name[$vvv].' </a>';
                                }
                            }
                            $html.=' </dd><dd style="display:block;clear:both;float:inherit;width:100%;font-size:0;line-height:0;"></dd></dl>';
                        }
                    }
                    $html.=' </div> </div></li>';
                }
            }
        }
        echo $html.=' </ul>';die;
    }
    function def_email_action(){
        $type=(int)$_POST['type'];
        $_POST['email']=yun_iconv("utf-8","gbk",$_POST['email']);
        $postemail=@explode("@",$_POST['email']);
        $def_email=@explode("|",$this->config['sy_def_email']);
        if($postemail[1]!=""){
            foreach($def_email as $v){
                if(stripos($v,$postemail[1])!==false){
                    $email[]=$v;
                }
            }
        }else{
            $email=$def_email;
        }
        foreach($email as $k=>$v){
            if($k==0){
                $class=" reg_email_box_list_hover";
            }else{
                $class="";
            }
            $html.='<div class="reg_email_box_list'.$class.' email'.$k.'" aid="'.$type.'" onclick="click_email('.$k.','.$type.');" onmousemove="hover_email('.$k.');"><span class="eg_email_box_list_left">'.$postemail[0].'</span>'.$v.'</div>';
        }
        echo count($email)."##".$html;
    }
    function saveresumetemplate_action(){
        $_POST['eid']=intval($_POST['eid']);
        $user_expect=$this->obj->DB_select_once("resume_expect","`id`='".$_POST['eid']."'");
        if($user_expect['uid']==$this->uid&&$this->uid!=''){
            $update=$this->obj->DB_update_all("resume_expect","`tmpid`='".$_POST['tmpid']."'","`id`='".$_POST['eid']."'");
            $arr['url']=Url("resume",array("c"=>"show","id"=>$_POST['eid'],"see"=>"used"));
            $update?$arr['status']='9':$arr['status']='8';
            $update?$arr['msg']='���óɹ���':$arr['msg']='����ʧ�ܣ�';
        }else{
            $arr['status']='8';
            $arr['msg']='�Բ�������Ȩ������';
        }
        $arr['msg']=iconv("gbk","utf-8",$arr['msg']);
        echo json_encode($arr);die;
    }

    function pay_action(){
        $id=intval($_GET['id']);
        $eid=intval($_GET['eid']);
        $expect=$this->obj->DB_select_once("resume_expect","`id`='".$eid."' and `uid`='".$this->uid."'",'id');
        if($expect['id']==''){
            $this->layer_msg('�Ƿ�������',8,0,Url("resume"));
        }
        $statis=$this->obj->DB_select_once("member_statis","`uid`='".$this->uid."'",'`tpl`,`paytpls`,`integral`');
        $info=$this->obj->DB_select_once("resumetpl","`id`='".$id."'");
        $paytpls=array();
        if($statis['paytpls']){
            $paytpls=@explode(',',$statis['paytpls']);
            if(in_array($info['id'],$paytpls)){
                $this->layer_msg('�����ظ�����',8,0,"index.php?c=resumetpl");
            }
        }
        if($info['price']>$statis['integral']){
            $this->layer_msg($this->config['integral_pricename'].'���㣬���ȳ�ֵ����',8,0);
        }else{
            $nid=$this->company_invtal($this->uid,$info['price'],false,"�������ģ��?",true,2,'integral',15);
            if($nid){
                $paytpls[]=$info['id'];
                $this->obj->DB_update_all("member_statis","`tpl`='".$info['id']."',`paytpls`='".@implode(',',$paytpls)."'","`uid`='".$this->uid."'");
                $this->layer_msg('����ɹ���?',9,0,Url("resume",array("c"=>"show","id"=>$expect['id'],"see"=>"used")));
            }else{
                $this->layer_msg('����ʧ�ܣ�',8,0,Url("resume",array("c"=>"show","id"=>$expect['id'],"see"=>"used")));
            }
        }
    }
    function settpl_action(){
        $id=intval($_GET['id']);
        $eid=intval($_GET['eid']);
        $expect=$this->obj->DB_select_once("resume_expect","`id`='".$eid."' and `uid`='".$this->uid."'",'id');
        if($expect['id']==''){
            $this->layer_msg('�Ƿ�������',8,0,Url("resume"));
        }
        $statis=$this->obj->DB_select_once("member_statis","`uid`='".$this->uid."'",'`tpl`,`paytpls`,`integral`');
        $paytpls=array();
        if($statis['paytpls']){
            $paytpls=@explode(',',$statis['paytpls']);
        }
        if(in_array($id,$paytpls)==false&&$id>0){
            $this->layer_msg('���ȹ���',8,0,Url("resume",array("c"=>"show","id"=>$eid,"see"=>"used")));
        }
        $this->obj->DB_update_all("member_statis","`tpl`='".$id."'","`uid`='".$this->uid."'");
        $this->layer_msg('�����ɹ���',9,0,Url("resume",array("c"=>"show","id"=>$eid,"see"=>"used")));
    }

    function get_coupon_action(){
        $arr['coupon']='';
        if($_POST['id']){
            $rating=$this->obj->DB_select_once("company_rating","`id`='".(int)$_POST['id']."'");
            if($rating['coupon']>0){
                $coupon=$this->obj->DB_select_once("coupon","`id`='".$rating['coupon']."'");
            }
            if($rating['time_start']<time() && $rating['time_end']>time()){
                $arr['price']=$rating['yh_price'];
                $price=$arr['price'];
            }else{
                $price=$rating['service_price'];
            }
            $arr['coupon']=iconv("gbk","utf-8",$coupon['name']);
        }
        echo json_encode($arr);die;
    }
    function jobrecord_action(){
        if((int)$_POST['page']==''){$_POST['page']=1;}
        $page=(int)$_POST['page'];
        $id=(int)$_POST['id'];
        $allnum=$this->obj->DB_select_num("userid_job","`job_id`='".$id."'");
        $html=$phtml=$pagehtml='';
        if($allnum>10){
            $pagenum=ceil($allnum/10);
            $start=($page-1)*10;
            $limit=" limit ".$start.",10";
            if($page>1){$phtml.="<a class=\"Company_pages_a\"  onclick=\"forrecord('".$id."','1')\">��ҳ</a><a class=\"Company_pages_a\" onclick=\"forrecord('".$id."','".($page-1)."')\">ǰҳ</a>";}
            if($page%5>0){
                $spage=floor($page/5)*5+1;
                $epage=ceil($page/5)*5;
            }else{
                $spage=$page-4;
                $epage=$page;
            }
            if($epage>$pagenum){$epage=$pagenum;}
            for($i=$spage;$i<=$epage;$i++){
                $page==$i?$phtml.="<span class=\"Company_pages_cur\">".$i."</span>":$phtml.="<a class=\"Company_pages_a\" onclick=\"forrecord('".$id."','".$i."')\">".$i."</a>";
            }
            if($pagenum-$page>0){$phtml.="<a class=\"Company_pages_a\" onclick=\"forrecord('".$id."','".($page+1)."')\">��ҳ</a><a class=\"Company_pages_a\" onclick=\"forrecord('".$id."','".$pagenum."')\"> βҳ</a>";}
            $pagehtml="<div class=\"Company_pages\">".$phtml."</div>";
        }
        $rows=$this->obj->DB_select_all("userid_job","`job_id`='".$id."' order by `datetime` desc ".$limit);
        if($rows&&is_array($rows)){
            $uid=$username=array();
            $is_browse=array('1'=>'������','2'=>'��ҵ�Ѳ鿴');
            foreach($rows as $val){
                $uid[]=$val['uid'];
            }
            $resume=$this->obj->DB_select_all("resume","`uid` in(".pylode(',',$uid).")","`uid`,`name`");
            foreach($resume as $val){
                $username[$val['uid']]=mb_substr($val["name"],0,2)."**";
            }
            foreach($rows as $val){
                $html.="<div class=\"Company_Record_list\">
					 <span class=\"Company_Record_span Company_Record_spanzhe\">".$username[$val['uid']]."</span>
					 <span class=\"Company_Record_span Company_Record_spantime\">".date("Y-m-d H:s",$val['datetime'])."</span>
					 <span class=\"Company_Record_span Company_Record_spanzt Company_Record_span_cor\">".$is_browse[$val['is_browse']]."</span>
				</div>";
            }
            $html.=$pagehtml;
        }else{
            $html="<div class=\"comapply_no_msg\"><div class=\"comapply_no_msg_cont\"><span></span><em>��������</em></div></div>";
        }
        echo $html;die;
    }
    function get_subject_action(){
        include(PLUS_PATH."subject.cache.php");
        if(is_array($subject_type[$_POST['id']])){
            $data.="<ul class=\"Search_Condition_box_list\">";
            foreach($subject_type[$_POST['id']] as $v){
                $data.="<li><a href='javascript:;' onclick=\"selects('".$v."','tnid','".$subject_name[$v]."');\">".$subject_name[$v]."</a></li>";
            }
            $data.="</ul>";
        }
        echo $data;
    }
    function getcity_subscribe_action(){
        include(PLUS_PATH."city.cache.php");
        if(is_array($city_type[$_POST['id']])){
            $data='<ul class="post_read_text_box_list">';
            foreach($city_type[$_POST['id']] as $v){
                $data.="<li><a href=\"javascript:check_input('".$v."','".$city_name[$v]."','".$_POST['type']."');\">".$city_name[$v]."</a></li>";
            }
            $data.='</ul>';
        }
        echo $data;die;
    }
    function getjob_subscribe_action(){
        include(PLUS_PATH."job.cache.php");
        if(is_array($job_type[$_POST['id']])){
            $data='<ul class="post_read_text_box_list">';
            foreach($job_type[$_POST['id']] as $v){
                $data.="<li><a href=\"javascript:check_input('".$v."','".$job_name[$v]."','".$_POST['type']."');\">".$job_name[$v]."</a></li>";
            }
            $data.='</ul>';
        }
        echo $data;die;
    }
    function getsalary_subscribe_action(){
        if($_POST['type']==1){
            include(PLUS_PATH."com.cache.php");
            if(is_array($comdata['job_salary'])){
                $data='<ul class="post_read_text_box_list">';
                foreach($comdata['job_salary'] as $v){
                    $data.="<li><a href=\"javascript:check_input('".$v."','".$comclass_name[$v]."','salary');\">".$comclass_name[$v]."</a></li>";
                }
                $data.='</ul>';
            }
        }else{
            include(PLUS_PATH."user.cache.php");
            if(is_array($userdata['user_salary'])){
                $data='<ul class="post_read_text_box_list">';
                foreach($userdata['user_salary'] as $v){
                    $data.="<li><a href=\"javascript:check_input('".$v."','".$userclass_name[$v]."','salary');\">".$userclass_name[$v]."</a></li>";
                }
                $data.='</ul>';
            }
        }
        echo $data;die;
    }

    function regcode_action(){
        if(strpos($this->config['code_web'],'ע����?')!==false){
            session_start();
            if ($this->config['code_kind']==3){
                if(!gtauthcode($this->config)){
                    echo 6;die;
                }
            }else{
                if(md5(trim($_POST['code']))!=$_SESSION['authcode'] || trim($_POST['code'])==''){
                    echo 5;die;
                }
            }
        }
        if($_POST['moblie']==""){
            echo 0;die;
        }
        $randstr=rand(100000,999999);

        if($this->config['sy_msguser']==""||$this->config['sy_msgpw']==""||$this->config['sy_msgkey']==""||$this->config['sy_msg_isopen']!='1'){
            echo 3;die;
        }else{
            $moblieCode = $this->obj->DB_select_once('company_cert',"`check`='".$_POST['moblie']."'");
            if((time()-$moblieCode['ctime'])<120){
                echo 4;die;
            }
            $num=$this->obj->DB_select_num("moblie_msg","`moblie`='".$_POST['moblie']."' and `ctime`>'".strtotime(date("Y-m-d"))."'");
            if($num>=$this->config['moblie_msgnum']){
                echo 1;die;
            }
            $ip=fun_ip_get();
            $ipnum=$this->obj->DB_select_num("moblie_msg","`ip`='".$ip."' and `ctime`>'".strtotime(date("Y-m-d"))."'");
            if($ipnum>=$this->config['ip_msgnum']){
                echo 2;die;
            }
            $status=$this->send_msg_email(array("moblie"=>$_POST['moblie'],"code"=>$randstr,"type"=>'regcode'));
            if($status=='���ͳɹ�!'){
                $data['did']=$this->config['did'];
                $data['uid']='0';
                $data['type']='2';
                $data['status']='0';
                $data['step']='1';
                $data['check']=$_POST['moblie'];
                $data['check2']=$randstr;
                $data['ctime']=time();
                $data['statusbody']='�ֻ�ע����֤��';
                if(is_array($moblieCode) && !empty($moblieCode)){
                    $this->obj->update_once("company_cert",$data,"`check`='".$_POST['moblie']."'");
                }else{
                    $this->obj->insert_into("company_cert",$data);
                }
            }
            echo $status;die;
        }
    }
    function talent_pool_action(){
        if($this->usertype!="2"){
            echo 0;die;
        }
        $row=$this->obj->DB_select_once("talent_pool","`eid`='".(int)$_POST['eid']."' and `cuid`='".$this->uid."'");
        if(empty($row)){
            $value.="`eid`='".(int)$_POST['eid']."',";
            $value.="`uid`='".(int)$_POST['uid']."',";
            $value.="`remark`='".yun_iconv("utf-8","gbk",$_POST['remark'])."',";
            $value.="`cuid`='".$this->uid."',";
            $value.="`ctime`='".time()."'";
            $this->obj->DB_insert_once("talent_pool",$value);
            $historyM = $this->MODEL('history');
            $historyM->addHistory('talentpool',(int)$_POST['eid']);
            echo 1;die;
        }else{
            echo 2;die;
        }
    }


    function atn_company_action(){
        $id=(int)$_POST['id'];
        $tid=(int)$_POST['tid'];
        if($id>0){
            if($this->uid){
                if($this->usertype=='4'){
                    echo '4';die;
                }

                $atninfo = $this->obj->DB_select_once("atn","`uid`='".$this->uid."' AND `sc_uid`='".$id."'");
                $comurl = $this->config['sy_weburl']."/company/index.php?id=".$id;
                $company=$this->obj->DB_select_once("company","`uid`='".$id."'","`name`");
                $name = $company['name'];

                if(is_array($atninfo)&&$atninfo){
                    if ($tid){
                        $this->obj->DB_delete_all("atn","`uid`='".$this->uid."' AND `sc_uid`='".$tid."' and `tid`='".$id."'");
                        $this->obj->DB_update_all('px_teacher',"`ant_num`=`ant_num`-1","`id`='".$id."'");
                    }else{
                        $this->obj->DB_delete_all("atn","`uid`='".$this->uid."' AND `sc_uid`='".$id."'");
                        $this->obj->DB_update_all('company',"`ant_num`=`ant_num`-1","`uid`='".$id."'");
                        $content="ȡ���˶�<a href=\"".$comurl."\" target=\"_bank\">".$name."</a>��ע";
                        $this->addstate($content,2);
                        $msg_content = "�û� ".$this->username." ȡ���˶���Ĺ�ע��?";
                        $this->automsg($msg_content,$id);
                    }
                    $this->obj->member_log("ȡ���˶�".$name."��ע");
                    echo "2";die;
                }else{
                    if ($tid){
                        $this->obj->DB_insert_once("atn","`uid`='".$this->uid."',`sc_uid`='".$tid."',`usertype`='".(int)$this->usertype."',`sc_usertype`='4',`time`='".time()."',`tid`='".$id."'");
                        $this->obj->DB_update_all('px_teacher',"`ant_num`=`ant_num`+1","`id`='".$id."'");
                    }else{
                        $this->obj->DB_insert_once("atn","`uid`='".$this->uid."',`sc_uid`='".$id."',`usertype`='".(int)$this->usertype."',`sc_usertype`='2',`time`='".time()."'");
                        $this->obj->DB_update_all('company',"`ant_num`=`ant_num`+1","`uid`='".$id."'");
                        $content="��ע��<a href=\"".$comurl."\" target=\"_bank\">".$name."</a>";
                        $this->addstate($content,2);
                        $msg_content = "�û� ".$this->username." ��ע���㣡";
                        $this->automsg($msg_content,$id);
                    }
                    $this->obj->member_log("��ע��".$name);
                    echo "1";die;
                }
            }else{
                echo "3";die;
            }
        }
    }

    function RedLoginHead_action(){
        if($this->uid!=""&&$this->username!=""){
            if($_COOKIE['remind_num']>0){
                $html.='<div class="header_Remind header_Remind_hover"> <em class="header_Remind_em "><i class="header_Remind_msg"></i></em><div class="header_Remind_list" style="display:none;">';
                if($this->usertype==1){
                    $html.='<div class="header_Remind_list_a"><a href="'.$this->config['sy_weburl'].'/member/index.php?c=msg">��������</a><span class="header_Remind_list_r fr">('.$_COOKIE['userid_msg'].')</span></div><div class="header_Remind_list_a"><a href="'.$this->config['sy_weburl'].'/member/index.php?c=sysnews">ϵͳ��Ϣ</a><span class="header_Remind_list_r fr">('.$_COOKIE['sysmsg1'].')</span></div><div class="header_Remind_list_a"><a href="'.$this->config['sy_weburl'].'/member/index.php?c=commsg">��ҵ�ظ���ѯ</a><span class="header_Remind_list_r fr">('.$_COOKIE['usermsg'].')</span></div>';
                }elseif($this->usertype==2){
                    $html.='<div class="header_Remind_list_a"><a href="'.$this->config['sy_weburl'].'/member/index.php?c=hr"class="fl">����ְλ</a><span class="header_Remind_list_r fr">('.$_COOKIE['userid_job'].')</span></div><div class="header_Remind_list_a"><a href="'.$this->config['sy_weburl'].'/member/index.php?c=sysnews" class="fl"> ϵͳ��Ϣ</a><span class="header_Remind_list_r fr">('.$_COOKIE['sysmsg2'].')</span></div><div class="header_Remind_list_a"><a href="'.$this->config['sy_weburl'].'/member/index.php?c=msg"class="fl">��ְ��ѯ</a><span class="header_Remind_list_r fr">('.$_COOKIE['commsg'].')</span></div>';
                }
                $html.='</div> </div>';
            }
            $html2= "<span class=\"sss\">���ã�</span><a href=\"".$this->config['sy_weburl']."/member\" ><font color=\"red\">".mb_substr($this->username,0,6,'GBK')."</font></a>��<a href=\"".$this->config['sy_weburl']."/member\" >�����û�����>></a> <a href=\"javascript:void(0)\" onclick=\"logout(\'".$this->config['sy_weburl']."/index.php?c=logout\');\">[��ȫ�˳�]</a>";

            $html.='<div class="yun_header_af fr">'.$html2.'</div>';

            echo "document.write('".$html."');";
        }else{
            $login_url = Url("login",array(),"1");
            $reg_url = Url("register",array("usertype"=>"1",'type'=>1),"1");
            $reg_com_url = Url("register",array("usertype"=>"2",'type'=>1),"1");
            $reg_lietou_url = Url("register",array("usertype"=>"3",'type'=>1),"1");
            $style = $this->config['sy_weburl']."/app/template/".$this->config['style'];


            $login='<li><a href="'.$login_url.'">��Ա��¼</a></li>';
            $user_reg='<li><a href="'.$reg_url.'">����ע��</a></li>';
            $com_reg='<li><a href="'.$reg_com_url.'">��ҵע��</a></li>';
            $lietou_reg='<li><a href="'.$reg_lietou_url.'">��ͷע��</a></li>';

            if($_GET['f']=='l'){

            }else{
                $kjlogin = '';

                $html='<div class=" fr"><div class="yun_topLogin_cont"><div class="yun_topLogin denglu" style="width:100px;border-right: 1px solid #eee;"><a class="coloess"  href="http://www.zhanjob.com/index.html#/dologin" >�ڲ�ϵͳ���</a></div><div class="yun_topLogin" style="width:126px;padding-left: 5px;border-right: 1px solid #eee;"> <a class="coloess" href="http://27.11.211.54:5678/webapp/#/login">�Ϸ��»�OAϵͳ</a></div><div class="yun_topLogin denglu" style="width:90px;"><a class="coloess" href="http://lt.huiliewang.com">����ϵͳ</a></div></div></div>';

                if($this->config['sy_qqlogin']=='1'||$this->config['sy_sinalogin']=='1'||$this->config['wx_author']=='1'){

                    if($_GET['type']=='index'){

                        if($this->config['sy_qqlogin']=='1'){
                            $kjlogin.='<li><img src="'.$this->config['sy_weburl'].'/app/template/'.$this->config['style'].'/images/yun_qq.png" class="png" ><a href="'.$this->config['sy_weburl'].'/qqlogin.php'.'">QQ��¼</a></li>';
                        }
                        if($this->config['sy_sinalogin']=='1'){
                            $kjlogin.='<li><img src="'.$this->config['sy_weburl'].'/app/template/'.$this->config['style'].'/images/yun_sina.png" class="png" ><a href="'.Url("sinaconnect",array(),"1").'">���˵�¼</a></li>';
                        }
                        if($this->config['wx_author']=='1'){
                            $kjlogin.='<li><img src="'.$this->config['sy_weburl'].'/app/template/'.$this->config['style'].'/images/yun_wx.png" class="png" ><a href="'.Url("wxconnect",array(),"1").'">΢�ŵ�¼</a></li>';
                        }
                    }else{
                        $flogin='<div class="fastlogin fr">';
                        if($this->config['sy_qqlogin']=='1'){
                            $flogin.='<span style="width:80px;"><img src="'.$this->config['sy_weburl'].'/app/template/'.$this->config['style'].'/images/yun_qq.png" class="png" > <a href="'.$this->config['sy_weburl'].'/qqlogin.php'.'">QQ��¼</a></span>';
                        }
                        if($this->config['sy_sinalogin']=='1'){
                            $flogin.='<span><img src="'.$this->config['sy_weburl'].'/app/template/'.$this->config['style'].'/images/yun_sina.png" class="png"> <a href="'.Url("sinaconnect",array(),"1").'">����</a></span>';
                        }
                        if($this->config['wx_author']=='1'){
                            $flogin.='<span><img src="'.$this->config['sy_weburl'].'/app/template/'.$this->config['style'].'/images/yun_wx.png" class="png"> <a href="'.Url("wxconnect",array(),"1").'">΢��</a></span>';
                        }
                        $flogin.='</div>';
                        $html.=$flogin;
                    }
                }

                $html = str_replace("{kjlogin}",$kjlogin,$html);
            }
            echo "document.write('".$html."');"; 
        }
    }
    function Site_action(){
        if($this->config['sy_web_site']=="1"){
            session_start();
            if($this->config['cityname']){
                $cityname = $this->config['cityname'];
            }else{
                $cityname = $this->config['sy_indexcity'];
            }
            $site_url = Url('index',array("c"=>"site"),"1");
            $html = "<span class=\"hp_head_ft_city_x\">".$cityname."վ</span><span class=\"hp_head_ft_city_qh\">��<a href=\"".$site_url."\">�л�����</a>��</span>";
        } echo "document.write('".$html."');";
    }
    function SiteCity_action(){
        unset($_SESSION['province']);unset($_SESSION['cityid']);unset($_SESSION['three_cityid']);unset($_SESSION['cityname']);unset($_SESSION['newsite']);unset($_SESSION['host']);unset($_SESSION['did']);unset($_SESSION['hyclass']);unset($_SESSION['fz_type']);
        if($_POST[cityid]=="nat"){
            if($this->config['sy_indexdomain']){
                $_SESSION['host'] = $this->config['sy_indexdomain'];
            }else{
                $_SESSION['host'] = $this->config['sy_weburl'];
            }
            echo $_SESSION['host'];die;
        }
        if((int)$_POST['cityid']>0){
            if(file_exists(PLUS_PATH."/domain_cache.php")){
                include(PLUS_PATH."/domain_cache.php");
                if(is_array($site_domain)){
                    foreach($site_domain as $key=>$value){
                        if($value['province']==$_POST['cityid'] || $value['cityid']==$_POST['cityid'] || $value['three_cityid']==$_POST['cityid']){
                            $_SESSION['host'] = $value['host'];
                        }
                        if($value['province']==$_POST['cityid']){
                            $_SESSION['province'] = $value['province'];
                        }elseif($value['three_cityid']==$_POST['cityid']){
                            $_SESSION['three_cityid'] = $value['three_cityid'];
                        }else{
                            $_SESSION['cityid'] = $_POST['cityid'];
                        }
                    }
                }
            }

            if($_SESSION['host'] && $this->protocol.$_SESSION['host']==$this->config['sy_weburl'] ){
                $_SESSION[newsite]="new";
            }
            $_SESSION['host'] = $_SESSION['host']!=""?$this->protocol.$_SESSION['host']:$this->config['sy_weburl'];
            $_SESSION['cityname'] = yun_iconv("utf-8","gbk",$_POST['cityname']);
            echo $_SESSION['host'];die;
        }else{
            $this->ACT_layer_msg("�����˷Ƿ�������",8,$_SERVER['HTTP_REFERER']);
        }
    }
    function SiteHy_action(){
        unset($_SESSION['cityid']);unset($_SESSION['three_cityid']);unset($_SESSION['cityname']);unset($_SESSION['hyclass']);unset($_SESSION['fz_type']);
        if($_POST['hyid']=="0"){
            $_SESSION['host'] = $this->config['sy_indexdomain'];
            echo $_SESSION['host'];die;
        }
        unset($_SESSION['newsite']);
        unset($_SESSION['host']);
        unset($_SESSION['did']);
        if((int)$_POST['hyid']>0){
            if(file_exists(PLUS_PATH."/domain_cache.php")){
                include(PLUS_PATH."/domain_cache.php");
                if(is_array($site_domain)){
                    foreach($site_domain as $key=>$value){
                        if($value['hy']==$_POST['hyid']){
                            $_SESSION['host'] = $value['host'];
                        }
                    }
                }
            }
            if($_SESSION['host'] && $this->protocol.$_SESSION['host']==$this->config['sy_weburl'] ){
                $_SESSION['newsite']="new";
            }
            $_SESSION['host'] = $_SESSION['host']!=""?$this->protocol.$_SESSION['host']:$this->config['sy_weburl'];
            $_SESSION['hyclass'] = $_POST['hyid'];
            echo $_SESSION['host'];die;
        }else{
            $this->ACT_layer_msg("�����˷Ƿ�������",8,$_SERVER['HTTP_REFERER']);
        }
    }
    function claim_action(){
        if((int)$_GET['uid']){
            $UserinfoM=$this->MODEL('userinfo');
            $row=$UserinfoM->GetMemberOne(array("uid"=>(int)$_GET['uid']),array("field"=>"`source`,`email`,`claim`"));
            if($row['source']=="6" && $row['email']!=""){
                if($row['claim']=="1"){
                    $this->layer_msg('���û��ѱ����죡',8,0);
                }
                $cert=$UserinfoM->GetCompanyCert(array("uid"=>(int)$_GET['uid'],"type"=>6));
                if(empty($cert)){
                    $salt = substr(uniqid(rand()), -6);
                    $value['check']=$row['email'];
                    $value['check2']=$salt;
                    $value['uid']=(int)$_GET['uid'];
                    $value['type']=6;
                    $value['ctime']=time();
                    $UserinfoM->AddCompanyCert($value);
                }else{
                    $salt = $cert['check2'];
                }
                $info=$this->MODEL('company')->GetCompanyInfo(array("uid"=>(int)$_GET['uid']),array('field'=>'name'));
                $data=array();
                $data['uid']=(int)$_GET['uid'];
                $data['name']=$info['name'];
                $data['email']=$row['email'];
                $data['type']="claim";
                $url=Url("claim",array('uid'=>(int)$_GET['uid'],'code'=>$salt),"1");
                $data['url']="<a href='".$url."'>".$url."</a> �����������������ֱ�Ӵ򿪣��븴�Ƹ����ӵ��������ַ����ֱ�Ӵ򿪣�".$url;
                $this->send_msg_email($data);
                $email=@explode('@',$row['email']);
                $newemail=substr($email[0],0,3).'****@'.end($email);
                $this->layer_msg('<div class="rl_box"><div class="rl_yx_p">�ѷ��͵��������䣺</div><div class="rl_yx">'.$newemail.'��</div><div class="">���¼�������������ʺ�����?</div><div class="">�绻��������ϵ�ͷ��绰��</div><div class="rl_tel">'. $this->config['sy_freewebtel'] .'</div></div>',9,0);
            }else{
                $this->layer_msg('���û�����������������',8,0);
            }
        }
    }
    function ajaxzphjob_action(){
        if($this->usertype!=2){
            $arr['msg']=iconv("gbk","utf-8","ֻ����ҵ�û��ſ���Ԥ��չλ��");
            $arr['status']=1;
        }else{
            $id=intval($_POST['id']);
            $Zph=$this->MODEL("zph");
            $zphcom=$Zph->GetZphComOnce(array("uid"=>$this->uid,"zid"=>(int)$_POST['zid']));
            $statis=$this->obj->DB_select_once("company_statis","`uid`='".$this->uid."'","`vip_etime`,`rating_type`,`job_num`");

            if($statis['vip_etime']>time() || $statis['vip_etime']==0){
                if($statis['rating_type']=="2"||$statis['job_num']>0){
                    $arr['addjobnum']=1;
                }else{
                    if($this->config['com_integral_online']=='1'){
                        $arr['addjobnum']=2;
                    }else{
                        $arr['addjobnum']=0;
                    }
                }
            }else{
                if($this->config['com_integral_online']=='1'){
                    $arr['addjobnum']=2;
                }else{
                    $arr['addjobnum']=0;
                }
            }
            $arr['integral_job']=$this->config['integral_job'];
            $arr['integral_pricename']=iconv("gbk","utf-8",$this->config['integral_pricename']);
            if(!empty($zphcom)){
                $unpass=$Zph->GetZphComOnce(array("uid"=>$this->uid,"zid"=>(int)$_POST['zid'],'status'=>2));
                if(!empty($unpass)){
                    $arr['msg']=iconv("gbk","utf-8","���ı���δͨ����ˣ�����ϵ����Ա��?");
                    $arr['status']=1;
                }else{
                    $arr['msg']=iconv("gbk","utf-8","���ѱ�������Ƹ�ᣡ");
                    $arr['status']=1;
                }
            }else{
                $Job=$this->MODEL("job");
                $UserinfoM=$this->MODEL("userinfo");
                $statis=$this->obj->DB_select_once("company_statis","`uid`='".$this->uid."'","`integral`,`zph_num`,`rating_type`");
                $space=$Zph->GetZphspaceOnce(array("id"=>$id));
                $mtype='';
                if($statis['zph_num']<1){
                    if($this->config['com_integral_online']=='1'){
                        if($statis['integral']<$space['price']&&$statis['rating_type']=='1'){
                            $arr['msg']=iconv("gbk","utf-8",$this->config['integral_pricename']."���㣬�޷�������");
                            $arr['status']=1;
                        }else{
                            $mtype='1';
                        }
                    }else{
                        $arr['msg']=iconv("gbk","utf-8","�������������꣬�޷�������");
                        $arr['status']=1;
                    }
                }
                if($mtype=='1'||$statis['zph_num']>0){
                    $list=$Job->GetComjobList(array("uid"=>$this->uid,"state"=>1,"`edate`>'".time()."' and `r_status`<>'2' and `status`<>'1'"),array("field"=>"`id`,`name`"));
                    if(!empty($list)){
                        $html='';
                        foreach($list as $v){
                            $html.='<input name="checkbox_job" value="'.$v[id].'" id="status_'.$v[id].'" type="checkbox"><label for="status_'.$v[id].'">'.iconv("gbk","utf-8",$v[name]).'</label><br>';
                        }
                        if($statis['zph_num']=='0'&&$statis['integral']>=$space['price']&&$statis['rating_type']=='1'){
                            $arr['msg']=iconv("gbk","utf-8","���ı������������꣬�����������۳���".$space['price'].$this->config['integral_pricename']."���Ƿ������?");
                            $arr['status']=2;
                        }else{
                            $arr['msg']=iconv("gbk","utf-8","ȷ����������Ƹ�᣿");
                            $arr['status']=2;
                        }
                        $arr['html']=$html;
                    }else{
                        $arr['msg']=iconv("gbk","utf-8","���ȷ���ְλ��");
                        $arr['status']=1;
                    }
                }
            }
        }
        echo json_encode($arr);die;
    }
    function zphcom_action(){
        $bid=(int)$_GET['bid'];
        $Zph=$this->MODEL("zph");
        $space=$Zph->GetZphspaceOnce(array("id"=>$bid));
        $sid=$Zph->GetZphspaceOnce(array("id"=>$space['keyid']));
        if(!$this->uid || !$this->username || $this->usertype!=2){
            $arr['status']=0;
            $arr['content']=iconv("gbk","utf-8","����û�е�¼��<a href='javascript:void(0);' onclick=\"showlogin('2');\" style='color:#1d50a1'>���ȵ�¼</a>��");
        }elseif(!$_GET['jobid']){
            $arr['status']=0;
            $arr['content']=iconv("gbk","utf-8","�㻹û��ѡ��ְλ");
        }else{
            $User=$this->MODEL("userinfo");
            $statis=$User->GetUserstatisOne(array("uid"=>$this->uid),array("usertype"=>"2"));
            if($statis['rating_type']!=2){
                if($statis['zph_num']>=1){
                    $bmtype=2;
                }else{
                    if($this->config['com_integral_online']=='1'){
                        $bmtype=1;
                        if($space['price']>$statis['integral']){
                            $arr['status']=0;
                            $arr['content']=iconv("gbk","utf-8","���?".$this->config['integral_pricename']."���㣬���ȳ�ֵ��");
                            echo json_encode($arr);die;
                        }
                    }else{
                        $arr['status']=0;
                        $arr['content']=iconv("gbk","utf-8","�����Ƹ�ᱨ������������?");
                        echo json_encode($arr);die;
                    }
                }
            }
            $zphcom=$Zph->GetZphComOnce(array("uid"=>$this->uid,"zid"=>(int)$_POST['zid']));
            if(!empty($zphcom)){
                $arr['status']=0;
                $arr['content']=iconv("gbk","utf-8","���Ѿ��������Ƹ��?");
            }else{
                $jobidarr=@explode(",",$_GET['jobid']);
                $array=array();
                foreach($jobidarr as $v){
                    if(!in_array($v,$array)){
                        $array[]=$v;
                    }
                }
                $info=$Zph->GetZphOnce(array("id"=>(int)$_GET['zid']),array("field"=>"`sid`,`did`"));
                if($sid['keyid']!=$info['sid']){
                    $arr['status']=0;
                    $arr['content']=iconv("gbk","utf-8","�Ƿ�������");
                }else{
                    $bid=$Zph->GetZphComOnce(array("zid"=>(int)$_GET['zid'],"bid"=>(int)$_GET['bid']));
                    if(!empty($bid)){
                        $arr['status']=0;
                        $arr['content']=iconv("gbk","utf-8","��չλ�ѱ�Ԥ������ѡ������չλ��");
                    }else{
                        $sql['did']=$info['did'];
                        $sql['uid']=$this->uid;
                        $sql['zid']=(int)$_GET['zid'];
                        $sql['bid']=(int)$_GET['bid'];
                        $sql['sid']=$sid['keyid'];
                        $sql['cid']=$space['keyid'];
                        $sql['jobid']=pylode(",",$array);
                        $sql['ctime']=mktime();
                        $sql['status']=0;
                        if($bmtype==1){
                            $sql['price']=$space['price'];
                        }
                        $id=$this->obj->insert_into("zhaopinhui_com",$sql);
                        if($id){
                            if($bmtype==2){
                                $User->UpdateUserStatis(array("`zph_num`=`zph_num`-1"),array("uid"=>$this->uid),array("usertype"=>"2"));
                            }else if($bmtype==1&&$space['price']){
                                $this->company_invtal($this->uid,$space['price'],false,"��Ƹ�ᱨ��",true,2,'integral');
                            }
                            $arr['status']=1;
                            $arr['content']=iconv("gbk","utf-8","�����ɹ�,�ȴ�����Ա���?");
                            $this->obj->member_log("������Ƹ��");
                        }else{
                            $arr['status']=0;
                            $arr['content']=iconv("gbk","utf-8","����ʧ��,���Ժ�����");
                        }
                    }
                }
            }
        }
        echo json_encode($arr);
    }
    function partcollect_action(){
        if($this->usertype!=1){
            echo 1;die;
        }else{
            $M=$this->MODEL("part");
            $row=$M->GetPartCollectOne(array("uid"=>$this->uid,"jobid"=>(int)$_POST['jobid']));
            if(!empty($row)){
                echo 2;die;
            }else{
                $data['uid']=$this->uid;
                $data['jobid']=(int)$_POST['jobid'];
                $data['comid']=(int)$_POST['comid'];
                $data['ctime']=time();
                $M->AddPartCollect($data);
                echo 0;die;
            }
        }
    }
    function partapply_action(){
        if($this->usertype!=1){
            $arr['status']=8;
            $arr['msg']='ֻ�и����û��������뱨����';
        }else{
            $M=$this->MODEL("part");
            $job=$M->GetPartJobOne(array("id"=>(int)$_POST['jobid']));
            if($this->config['com_resume_partapply']==1){
                $Resume=$this->MODEL("resume");
                $num=$Resume->GetResumeExpectNum(array("uid"=>$this->uid));
                if($num<1){
                    $arr['status']=8;
                    $arr['msg']='ӵ�м����ſ��Ա�����ְ��';
                }
            }
            if($job['edate']<time()&&$job['edate']!=0){
                $arr['status']=8;
                $arr['msg']='��ְ�ѹ����޷�������';
            }
            if($arr['msg']==''){
                if($job['edate']&&$job['deadline']<time()){
                    $arr['status']=8;
                    $arr['msg']='�����ѽ�ֹ��';
                }else{
                    $row=$M->GetPartApplyOne(array("uid"=>$this->uid,"jobid"=>(int)$_POST['jobid']));

                    if(!empty($row)){
                        $arr['status']=8;
                        $arr['msg']='���Ѿ��������ü�ְ��';
                    }else{
                        $data['uid']=$this->uid;
                        $data['jobid']=(int)$_POST['jobid'];
                        $data['comid']=(int)$_POST['comid'];
                        $data['ctime']=time();
                        $M->AddPartApply($data);
                        if($this->config['sy_email_set']=="1"){
                            $Member=$this->MODEL("userinfo");
                            $user=$Member->GetUserinfoOne(array("uid"=>(int)$job['uid']),array('usertype'=>2));
                            $fdata=$this->forsend(array("uid"=>(int)$_POST['comid'],"usertype"=>"2"));
                            $data['type']="partapply";
                            $data['name']=$fdata['name'];
                            $data['uid']=$this->uid;
                            $data['username']=$user['username'];
                            $data['email']=$user['linkmail'];
                            $data['moblie']=$user['linktel'];
                            $data['jobname']=yun_iconv("utf-8","gbk",$_POST['jobname']);
                            $this->send_msg_email($data);
                        }
                        $arr['status']=9;
                        $arr['msg']='�����ɹ���';
                    }
                }
            }
        }
        $arr['msg']=yun_iconv("gbk","utf-8",$arr['msg']);
        echo json_encode($arr);die;
    }
    function wap_job_action(){
        include(PLUS_PATH."job.cache.php");
        if($_POST['type']==1){
            $data="<option value=''>--��ѡ��--</option>";
        }
        if(is_array($job_type[$_POST['id']])){
            foreach($job_type[$_POST['id']] as $v){
                $data.="<option value='$v'>".$job_name[$v]."</option>";
            }
        }
        echo $data;
    }
    function wap_city_action(){
        include(PLUS_PATH."city.cache.php");
        if($_POST['type']==1){
            $data="<option value=''>--��ѡ��--</option>";
        }
        if(is_array($city_type[$_POST['id']])){
            foreach($city_type[$_POST['id']] as $v){
                $data.="<option value='$v'>".$city_name[$v]."</option>";
            }
        }
        echo $data;
    }

    function ajax_department_action(){
        include(PLUS_PATH."department.cache.php");
        if(is_array($dpdata[$_POST['id']])){

            $data.="<ul>";
            foreach($dpdata[$_POST['id']] as $v){
                $data.='<li><a href="javascript:;" onclick="select_department(\''.$v.'\',\'department\',\''.$dpclass_name[$v].'\');">'.$dpclass_name[$v].'</a></li>';
            }
            $data.="</ul>";
        }
        echo $data;
    }

    function ajax_city_action(){
        if($_POST['ptype']=='city'){
            include(PLUS_PATH."city.cache.php");
            if(is_array($city_type[$_POST['id']])){
                $data.="<ul>";
                foreach($city_type[$_POST['id']] as $v){
                    if($_POST['gettype']=="citys"){
                        $data.='<li><a href="javascript:;" onclick="select_city(\''.$v.'\',\'citys\',\''.$city_name[$v].'\',\'three_city\',\'city\');">'.$city_name[$v].'</a></li>';
                    }elseif($_POST['gettype']=="comcitys"){
                         $data.='<li><a href="javascript:;" onclick="select_city(\''.$v.'\',\'comcitys\',\''.$city_name[$v].'\',\'comthree_city\',\'city\');">'.$city_name[$v].'</a></li>';
                     }
                    else{
                        $data.='<li><a href="javascript:;" onclick="selects(\''.$v.'\',\'three_city\',\''.$city_name[$v].'\');">'.$city_name[$v].'</a></li>';
                    }
                }
                $data.="</ul>";
            }
        }else{
            include(PLUS_PATH."job.cache.php");
            if(is_array($job_type[$_POST['id']])){
                $data.="<ul>";
                foreach($job_type[$_POST['id']] as $v){
                    if($_POST['gettype']=="job1_son"){
                        $data.='<li><a href="javascript:;" onclick="select_city(\''.$v.'\',\'job1_son\',\''.$job_name[$v].'\',\'job_post\',\'job\');">'.$job_name[$v].'</a></li>';
                    }else{
                        $data.='<li><a href="javascript:;" onclick="selects(\''.$v.'\',\'job_post\',\''.$job_name[$v].'\');">'.$job_name[$v].'</a></li>';
                    }
                }
                $data.="</ul>";
            }
        }
        echo $data;
    }
    function ajax_admincity_action(){
        if($_POST['ptype']=='city'){
            include(PLUS_PATH."city.cache.php");
            if(is_array($city_type[$_POST['id']])){
                foreach($city_type[$_POST['id']] as $v){
                    if($_POST['gettype']=="cityid"){
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'cityid\',\''.$city_name[$v].'\',\'three_city\',\'city\');">'.$city_name[$v].'</a></div>';
                    }elseif($_POST['gettype']=="locoy_job_city"){
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'locoy_job_city\',\''.$city_name[$v].'\',\'three_city\',\'city\');">'.$city_name[$v].'</a></div>';
                    }elseif($_POST['gettype']=="locoy_com_city"){
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'locoy_com_city\',\''.$city_name[$v].'\',\'three_city\',\'city\');">'.$city_name[$v].'</a></div>';
                    }elseif($_POST['gettype']=="locoy_resume_city"){
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'locoy_resume_city\',\''.$city_name[$v].'\',\'three_city\',\'city\');">'.$city_name[$v].'</a></div>';
                    }else{
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="selects(\''.$v.'\',\'three_city\',\''.$city_name[$v].'\');">'.$city_name[$v].'</a></div>';
                    }

                }
            }
        }elseif($_POST['ptype']=='city'){
             include(PLUS_PATH."city.cache.php");
             if(is_array($city_type[$_POST['id']])){
                 foreach($city_type[$_POST['id']] as $v){
                     if($_POST['gettype']=="cityid"){
                         $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'cityid\',\''.$city_name[$v].'\',\'three_city\',\'city\');">'.$city_name[$v].'</a></div>';
                     }elseif($_POST['gettype']=="comcitys"){
                       $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'cityid\',\''.$city_name[$v].'\',\'three_city\',\'city\');">'.$city_name[$v].'</a></div>';
                     }
                     elseif($_POST['gettype']=="locoy_job_city"){
                         $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'locoy_job_city\',\''.$city_name[$v].'\',\'three_city\',\'city\');">'.$city_name[$v].'</a></div>';
                     }elseif($_POST['gettype']=="locoy_com_city"){
                         $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'locoy_com_city\',\''.$city_name[$v].'\',\'three_city\',\'city\');">'.$city_name[$v].'</a></div>';
                     }elseif($_POST['gettype']=="locoy_resume_city"){
                         $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'locoy_resume_city\',\''.$city_name[$v].'\',\'three_city\',\'city\');">'.$city_name[$v].'</a></div>';
                     }else{
                         $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="selects(\''.$v.'\',\'three_city\',\''.$city_name[$v].'\');">'.$city_name[$v].'</a></div>';
                     }

                 }
             }
         }else{
            include(PLUS_PATH."job.cache.php");
            if(is_array($job_type[$_POST['id']])){
                foreach($job_type[$_POST['id']] as $v){
                    if($_POST['gettype']=="job1_son"){
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'job1_son\',\''.$job_name[$v].'\',\'job_post\',\'job\');">'.$job_name[$v].'</a></div>';
                    }elseif($_POST['gettype']=="locoy_job1_son"){
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'locoy_job1_son\',\''.$job_name[$v].'\',\'job_post\',\'job\');">'.$job_name[$v].'</a></div>';
                    }elseif($_POST['gettype']=="locoy_resume_son"){
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city(\''.$v.'\',\'locoy_resume_son\',\''.$job_name[$v].'\',\'job_post\',\'job\');">'.$job_name[$v].'</a></div>';
                    }else{
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="selects(\''.$v.'\',\'job_post\',\''.$job_name[$v].'\');">'.$job_name[$v].'</a></div>';
                    }
                }
            }
        }
        echo $data;
    }

    function ajax_adminresumecity_action(){
        if($_POST['ptype']=='city'){
            include(PLUS_PATH."city.cache.php");
            if(is_array($city_type[$_POST['id']])){
                foreach($city_type[$_POST['id']] as $v){
                    if($_POST['gettype']=="locoy_resume_city"){
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_citys(\''.$v.'\',\'locoy_resume_city\',\''.$city_name[$v].'\',\'three_citys\',\'city\');">'.$city_name[$v].'</a></div>';
                    }else{
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="selects(\''.$v.'\',\'three_citys\',\''.$city_name[$v].'\');">'.$city_name[$v].'</a></div>';
                    }

                }
            }
        }else{
            include(PLUS_PATH."job.cache.php");
            if(is_array($job_type[$_POST['id']])){
                foreach($job_type[$_POST['id']] as $v){
                    if($_POST['gettype']=="locoy_resume_son"){
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_citys(\''.$v.'\',\'locoy_resume_son\',\''.$job_name[$v].'\',\'job_posts\',\'job\');">'.$job_name[$v].'</a></div>';
                    }else{
                        $data.='<div class="yun_admin_select_box_list"><a href="javascript:;" onclick="selects(\''.$v.'\',\'job_posts\',\''.$job_name[$v].'\');">'.$job_name[$v].'</a></div>';
                    }
                }
            }
        }
        echo $data;
    }

    function ajaxcircle_action(){
        $id=intval($_POST['cid']);
        if($id){
            include(PLUS_PATH."circleclass.cache.php");
            $circles=array();
            if(is_array($circle_type[$id])&&$circle_type[$id]){
                foreach($circle_type[$id] as $v){
                    $circles[]=array('id'=>$v,'name'=>yun_iconv("gbk","utf-8",$circle_name[$v]));
                }
                echo json_encode($circles);die;
            }else{
                echo '';die;
            }
        }
    }
    function temporaryresume_action()
    {
        if (!$_POST['name'] || !$_POST['birthday'] || !$_POST['exp'] || !$_POST['edu'] || !$_POST['telphone'])
        {
            echo "����д��Ҫ������Ϣ��";die;
        }
        else {

            $Member=$this->MODEL("userinfo");
            $ismoblie= $Member->GetMemberNum(array("moblie"=>$_POST['telphone']));

            if ($ismoblie>0) {
                echo "�ֻ��Ѵ��ڣ�";die;
            }

            $res = true;
            if ($this->config['sy_msg_isopen']==1 && $this->config['reg_real_name_check']==1) {
                if(!$_POST['authcode']){
                    echo '�����������֤��?';die;
                }

                $cert_validity = 1800;
                $cert_arr = $this->obj->DB_select_once("company_cert","`check`='".$_POST['telphone']."' and type='2' order by id desc");
                if (is_array($cert_arr)) {
                    if ((time()-$cert_arr['ctime']) <= $cert_validity) {
                        $res = $_POST['authcode'] == $cert_arr['check2'];
                    } else {
                        echo "��֤����֤��ʱ�������µ��������֤��?";die;
                    }
                } else {
                    echo "��֤�뷢�Ͳ��ɹ��������µ��������֤��?";die;
                }
            }
            if ($res) {
                $Job=$this->MODEL('job');
                $jobinfo=$Job->GetComjobOne(array('id'=>(int)$_POST['jobid']));
                unset($_POST['jobid']);
                $_POST['name']=yun_iconv("utf-8","gbk",$_POST['name']);
                $_POST['uname']=yun_iconv("utf-8","gbk",$_POST['uname']);
                $_POST['hy']=$jobinfo['hy'];
                if ($jobinfo['job_post']) {
                    $_POST['job_classid']=$jobinfo['job_post'];
                } elseif ($jobinfo['job1_son']) {
                    $_POST['job_classid']=$jobinfo['job1_son'];
                } else {
                    $_POST['job_classid']=$jobinfo['job1'];
                }
                include PLUS_PATH."/user.cache.php";
                $_POST['jobstatus'] = $userdata['user_jobstatus'][0];
                $_POST['minsalary']=$jobinfo['minsalary'];
                $_POST['maxsalary']=$jobinfo['maxsalary'];
                $_POST['provinceid']=$jobinfo['provinceid'];
                $_POST['cityid']=$jobinfo['cityid'];
                $_POST['three_cityid']=$jobinfo['three_cityid'];
                $Resume=$this->MODEL("resume");
                $id=$Resume->TemporaryResume($_POST);
                echo $id;die;
            } else {
                echo "�ֻ���֤�����?";die;
            }
        }
    }

    function sendmsg_action(){
        if(!$this->config['sy_msg_isopen'] || !$this->config['sy_msg_login']){
            $this->layer_msg('��վδ����������֤��¼����!');
        }else{
            $moblie=$_POST['moblie'];

            if(isset($_POST['authcode'])){
                if(gtverify() == false){
                    $this->layer_msg('ͼƬ��֤�����?!');
                }
            }

            $res = $this->send_autocode($moblie, 6, 90, true);
            if($res == 5){
                $this->layer_msg('�ֻ�������!');
            }elseif ($res == 1) {
                $this->layer_msg('���ֻ��ų�����������!');
            }elseif ($res == 2) {
                $this->layer_msg('��IP����һ�췢������!');
            }elseif ($res == 3) {
                $this->layer_msg('�ֻ��û�������!');
            }elseif ($res == 4) {
                $this->layer_msg('δ�������ŷ��͹���!');
            }elseif ($res == 6) {
                $this->layer_msg('��֤���ظ����ͣ����Ժ�!');
            }elseif($res == '���ͳɹ�!'){
                $this->layer_msg('���ͳɹ�!',9,0,'',2,1);
            }else{
                $this->layer_msg($res);
            }
        }
    }

    function checkuser($username,$name=''){
        $user = $this->obj->DB_select_once("member","`username`='".$username."'","`uid`");
        if($user['uid']){
            $name.="_".rand(1000,9999);
            return $this->checkuser($name,$username);
        }else{
            return $username;
        }
    }
    function userreg_action(){
        $Member=$this->MODEL("userinfo");
        $Resume=$this->MODEL("resume");
        $row=$Resume->SelectTemporaryResume(array("id"=>$_POST['resumeid']));
        if(!$row['name'] || !$row['birthday'] || !$row['exp'] || !$row['edu'] || !$row['telphone']){
            echo "����д��Ҫ������Ϣ��";die;
        }else{
            $ismoblie= $Member->GetMemberNum(array("moblie"=>$row['telphone']));
            if($ismoblie>0){
                echo "��ǰ�ֻ����ѱ�ʹ�ã�����������ֻ��ţ�?";die;
            }else{
                session_start();
                if(md5(strtolower($_POST['authcode']))!=$_SESSION['authcode']  || empty($_SESSION['authcode'])){
                    unset($_SESSION['authcode']);
                    echo 3;die;
                }
                $salt = substr(uniqid(rand()), -6);
                $pass = md5(md5($_POST['password']).$salt);
                $ip=fun_ip_get();
                $data=array();
                $data['username']=$this->checkuser($row['telphone']);
                $data['password']=$pass;
                $data['usertype']=1;
                $data['status']=1;
                $data['salt']=$salt;
                $data['reg_date']=time();
                $data['login_date']=time();
                $data['reg_ip']=$ip;
                $data['login_ip']=$ip;
                $data['source']='11';
                $data['mobile']=$row['telphone'];
                $data['did']=$this->config['did'];

                $userid=$Member->AddMember($data);
                if($userid){
                    $Member->InsertReg("member_statis",array("uid"=>$userid,"resume_num"=>"1","did"=>$this->config['did']));
                    $Member->InsertReg("resume",array("uid"=>$userid,'lastupdate'=>time()));
                    $this->add_cookie($userid,$row['telphone'],$salt,"",$pass,1,1,$this->config['did']);
                    $edata['uid']=$userid;
                    $edata['name']=$row['name'];
                    $edata['hy']=$row['hy'];
                    $edata['job_classid']=$row['job_classid'];
                    $edata['provinceid']=$row['provinceid'];
                    $edata['cityid']=$row['cityid'];
                    $edata['three_cityid']=$row['three_cityid'];
                    $edata['minsalary']=$row['minsalary'];
                    $edata['maxsalary']=$row['maxsalary'];
                    $edata['jobstatus']=$row['jobstatus'];
                    $edata['type']=$row['type'];
                    $edata['report']=$row['report'];
                    $edata['defaults']=1;
                    $edata['integrity']=55;
                    $edata['ctime']=time();
                    $edata['lastupdate']=time();
                    $edata['did']=$this->config['did'];
                    $edata['uname']=$rdata['name']=$row['uname'];
                    $edata['edu']=$rdata['edu']=$row['edu'];
                    $edata['exp']=$rdata['exp']=$row['exp'];
                    $edata['sex']=$rdata['sex']=$row['sex'];
                    $edata['source']=11;
                    $edata['birthday']=$rdata['birthday']=$row['birthday'];
                    $edata['r_status']=$this->config['resume_status'];
                    $eid=$Resume->AddResume("resume_expect",$edata);
                    $Resume->AddUserResume(array("uid"=>$userid,"eid"=>$eid,"expect"=>"1"));
                    $Resume->DelTemporaryResume(array("id"=>$_POST['resumeid']));
                    $rdata['def_job']=$eid;
                    $rdata['resumetime']=time();
                    $rdata['lastupdate']=time();
                    $rdata['telphone']=$row['telphone'];
                    $rdata['email']=$row['email'];
                    $rdata['living']=$row['living'];
                    $Member->UpdateUserinfo(array("usertype"=>"1","values"=>$rdata),array("uid"=>$userid));
                    $Member->UpdateMember(array("moblie"=>$row['telphone'],"email"=>$row['email']),array("uid"=>$userid));
                    if($this->config['integral_reg']>0){
                        $Member->company_invtal($userid,$this->config['integral_reg'],true,"ע������",true,2,'integral',23);
                    }
                    $this->get_integral_action($userid,"integral_login","��Ա��¼");
                    if($this->config['integral_userinfo']>0){
                        $this->company_invtal($userid,$this->config['integral_userinfo'],true,"�״���д��������",true,2,'integral',25);
                    }
                    $this->get_integral_action($userid,"integral_add_resume","��������");
                    $jobid=(int)$_POST['jobid'];
                    $Job=$this->MODEL("job");
                    $comjob=$Job->GetComjobOne(array("id"=>$jobid));
                    $value['job_id']=$jobid;
                    $value['com_name']=$comjob['com_name'];
                    $value['job_name']=$comjob['name'];
                    $value['com_id']=$comjob['uid'];
                    $value['uid']=$userid;
                    $value['eid']=$eid;
                    $value['datetime']=mktime();
                    $nid=$Job->AddUseridJob($value);
                    $historyM = $this->MODEL('history');
                    $historyM->addHistory('useridjob',$jobid);
                    if($comjob['link_type']=='1'){
                        $ComM=$this->MODEL("company");
                        $job_link=$ComM->GetCompanyInfo(array("uid"=>$comjob['uid']),array("field"=>"`linkmail` as email,`linktel` as link_moblie"));
                    }else{
                        $JobM=$this->MODEL("job");
                        $job_link=$JobM->GetComjoblinkOne(array("jobid"=>$jobid,"is_email"=>"1"),array("field"=>"`email`,`link_moblie`"));
                    }
                    if($this->config['sy_email_set']=="1"){
                        if($job_link['email']){
                            $contents=@file_get_contents(Url("resume",array("c"=>"sendresume","job_link"=>'1',"id"=>$eid)));
                            $smtp = $this->email_set();
                            $smtpusermail =$this->config['sy_smtpemail'];
                            $sendid = $smtp->sendmail($job_link['email'],"���յ�һ���µ���ְ����������".$this->config['sy_webname'],$contents);
                            if($sendid){
                                $state = '1';
                            }else{
                                $state = '0';
                            }
                            $this->obj->insert_into("email_msg",array('uid'=>$comjob['uid'],'name'=>$comjob['com_name'],'cuid'=>'','cname'=>'','email'=>$job_link['email'],'title'=>"���յ�һ���µ���ְ����������".$this->config['sy_webname'],'content'=>$contents,'state'=>$state,'ctime'=>time(),'smtpserver'=>$smtp->user));
                        }
                    }
                    if($this->config['sy_msg_isopen']=='1'){
                        if($job_link['link_moblie']){
                            $data=array('uid'=>$comjob['uid'],'name'=>$comjob['com_name'],'cuid'=>'','cname'=>'','type'=>'sqzw','jobname'=>$comjob['name'],'date'=>date("Y-m-d"),'moblie'=>$job_link['link_moblie']);
                            $this->send_msg_email($data);
                        }
                    }

                    $this->obj->member_log("��������ְλ��".$comjob['name'],6);
                    echo 1;die;
                }else{
                    echo "����ʧ��!";die;
                }
            }
        }
    }

    function footertj_action(){
        $Company = $this->MODEL("company");
        $comnum = $Company->GetComNum();
        $Job=$this->MODEL("job");
        $jobnum = $Job->GetComjobNum();
        $expect=$this->MODEL("resume");
        $expectnum = $expect->GetResumeExpectNum();
        $html = '<a href="javascript:void(0);" onclick="$(\'.tip_bottom\').hide();"  class="tip_bottom_close"></a>
        <span class="tip_bottom_logo fl">
          <h2>���ָ����µ�ְλ��Ϣ</h2>
        </span>
        <div class="tip_bottom_num fl"><span>'.number_format($comnum).'</span>��˾</div>
        <div class="tip_bottom_num fl"><span>'.number_format($jobnum).'</span>ְλ</div>
        <div class="tip_bottom_num fl"><span>'.number_format($expectnum).'</span>����</div>';
        if(!$this->uid){
            $html.='<a href="'.Url('login').'" class="tip_bottom_login fl">��¼</a>
                    <a href="'.Url('register',array('usertype'=>1,'type'=>2)).'" class="tip_bottom_reg fl" >����ע��<i class="tip_bottom_reg_icon"></i></a>';
        }
        echo $html;
    }
    function DefaultLoginIndex_action(){
        if($this->usertype=='1' && $this->uid){
            $member=$this->obj->DB_select_alls("member_statis","resume","a.`uid`='".$this->uid."' and b.`uid`='".$this->uid."'","a.*,b.`photo`,b.`sex`");
            if($member[0]['photo']==''|| !file_exists(str_replace($this->config['sy_weburl'],APP_PATH,$member[0]['photo']))){
                if($member[0]['sex']=='1'){
                    $member[0]['photo']=$this->config['sy_weburl']."/".$this->config['sy_member_icon'];
                }else{
                    $member[0]['photo']=$this->config['sy_weburl']."/".$this->config['sy_member_iconv'];
                }
            }
            $this->yunset("member",$member[0]);
        }else if($this->usertype=='2' && $this->uid){
            $company=$this->obj->DB_select_once("company","`uid`='".$this->uid."'","logo");
            if($company['logo']==''|| !file_exists(str_replace($this->config['sy_weburl'],APP_PATH,$company['logo']))){
                $company['logo']=$this->config['sy_weburl']."/".$this->config['sy_unit_icon'];
            }
            $sqjob = $this->obj->DB_select_num("userid_job","`com_id`='".$this->uid."'");
            $company['sq_job'] = $sqjob;
            $company['job']=$this->obj->DB_select_num("company_job","`uid`='".$this->uid."' and `status`='0' and `state`='1'");
            $company['status2']=$this->obj->DB_select_num("company_job","`edate`<".time()." and `uid`='".$this->uid."'");
            $company['sq_job']=$this->obj->DB_select_num("userid_job","`com_id`='".$this->uid."'");
            $this->yunset("company",$company);
            $statis=$this->obj->DB_select_once("company_statis","`uid`='".$this->uid."'","`vip_etime`,`rating_type`,`job_num`");
            if($statis['vip_etime']>time() || $statis['vip_etime']==0){
                if($statis['rating_type']=="2"||$statis['job_num']>0){
                    $addjobnum=1;
                }else{
                    if($this->config['com_integral_online']=='1'){
                        $addjobnum=2;
                    }else{
                        $addjobnum=0;
                    }
                }
            }else {
                if($this->config['com_integral_online']=='1'){
                    $addjobnum=2;
                }else{
                    $addjobnum=0;
                }
            }
            $this->yunset("addjobnum",$addjobnum);
        }
        $this->yunset("cookie",$_COOKIE);
        $this->yun_tpl(array('login'));
    }
    function selsite_action(){
        if($_POST['keyword']){
            $siteDomain = $this->MODEL('site');
            $siteHtml   = $siteDomain->GetSiteDomian($_POST['keyword'],(int)$_POST['id']);
            echo $siteHtml;
        }else{
            echo 0;
        }
    }
    function guwen_action(){
        if($_POST['keyword']){
            $Site = $this->obj->DB_select_all("company_consultant","`username` LIKE '%".iconv("utf-8","gbk",$_POST['keyword'])."%'");

            if(is_array($Site) && !empty($Site)){
                foreach($Site as $value){
                    $guwenHtml .='<div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new(\'gw\',\''.$value['id'].'\',\''.$value['username'].'\')">'.$value['username'].'</a> </div>';
                }
                echo $guwenHtml;
            }else{
                echo 1;
            }
        }else{
            echo 0;
        }
    }

    function pubqrcode_action(){
        $wapUrl = Url('wap');
        if( isset($_GET['toid']) && $_GET['toid'] != '')
            $wapUrl = Url('wap',array('c'=>$_GET['toc'],'a'=>$_GET['toa'],'id'=>(int)$_GET['toid']));
        include_once LIB_PATH."yunqrcode.class.php";
        YunQrcode::generatePng2($wapUrl,4);
    }
    function yunimg_action(){
        include_once(dirname(dirname(dirname(dirname(__FILE__))))."/global.php");
        include_once(PLUS_PATH."pimg_cache.php");
        if($_GET['ad_id']&&$_GET['classid']){
            $ad_id = "ad_".$_GET['ad_id'];
            $ad_class_id = intval($_GET['classid']);
            if($ad_label[$ad_class_id][$ad_id]['did']<1|| stripos($ad_label[$ad_class_id][$ad_id]['did'],$_SESSION['did'])!==false){
                $ad_info = $ad_label[$ad_class_id][$ad_id]['html'];
                $ad_info=str_replace("\n","",$ad_info);
                $ad_info=str_replace("\r","",$ad_info);
                $ad_info=str_replace("'","\'",$ad_info);
                echo "document.write('$ad_info');";
            }
        }
    }

    function getcontent_action(){
        $ids=@explode(',',$_POST['ids']);
        $rows=$this->obj->DB_select_all("job_class","`id` in(".pylode(',',$ids).") and `content`<>'' order by `sort` asc");
        if($rows&&is_array($rows)){
            $content=array();
            foreach($rows as $k=>$val){
                $content[]=$val['id']."###".$val['name'];
            }
            echo @implode('@@@@',$content);die;
        }
    }
    function setexample_action(){
        $row=$this->obj->DB_select_once("job_class","`id`='".intval($_POST['id'])."'");
        if($row['content']){
            echo $row['content'];die;
        }
    }
    function wjump_action(){
        if (isMobileUser()){
            echo 'document.write("<script>window.location.href=\''.Url('wap').'\';</script>")';
        }
    }
    function LoginHead_action(){
        if($this->uid!=""&&$this->username!=""){
            $html.='<div class="hp_top_rt_login fl">��ã�?<a class="hp_top_rt_login_g" href="'.$this->config['sy_weburl'].'/member\">'.$this->username.'</a></div><i class="hp_top_line fl"> | </i>';

            echo "document.write('".$html."');";
        }else{
            $log_url=Url("login");
            $reg_url = Url("register",array("usertype"=>"1",'type'=>1),"1");
            $reg_com_url = Url("register",array("usertype"=>"2",'type'=>1),"1");
            $style = $this->config['sy_weburl']."/app/template/".$this->config['style'];
            $html.='<div class="hp_top_rt_login fl">��ã���?<a class="hp_top_rt_login_g" href="'.$log_url.'">��¼</a></div><i class="hp_top_line fl"> | </i><div class="hp_top_rt_regist fl"><a class="hp_top_rt_regist_m" href="javascript:void(0);">���ע��? <i class="hp_top_rg_down"></i></a><div class="hp_top_regist_list" style="display:none;"><ul><li><a href="'.$reg_url.'">����ע��</a></li><li><a href="'.$reg_com_url.'">��ҵע��</a></li><li><a href="'.$reg_lietou_url.'">��ͷע��</a></li></ul></div></div>';
            echo "document.write('".$html."');";
        }
    }
    function unlock_action(){
        session_start();
        $srcstr = "0123456789";
        mt_srand();
        $strs = "";
        for ($i = 0; $i < 4; $i++) {
            $strs .= $srcstr[mt_rand(0, 9)];
        }
        $_SESSION["unlock"] = md5(strtolower($strs));
        echo $strs;
    }
    function reward_city_action(){
        include(PLUS_PATH."city.cache.php");
        if(is_array($city_type[$_POST['id']])){
            foreach($city_type[$_POST['id']] as $v){
                if($_POST['type']=="province"){
                    $data.='<li><a href="javascript:;" onclick="reward_city(\''.$v.'\',\'city\',\''.$city_name[$v].'\',\'three_city\');">'.$city_name[$v].'</a></li>';
                }else{
                    $data.='<li><a href="javascript:;" onclick="rewards(\''.$v.'\',\'three_city\',\''.$city_name[$v].'\');">'.$city_name[$v].'</a></li>';
                }
            }
            echo $data;
        }
    }
    function showrebates_action(){
        if(intval($_POST['id'])){
            include(PLUS_PATH."user.cache.php");
            include PLUS_PATH."/job.cache.php";
            include PLUS_PATH."/industry.cache.php";
            include PLUS_PATH."/city.cache.php";
            include(CONFIG_PATH."db.data.php");
            $resume=$this->obj->DB_select_once("temporary_resume","`rid`='".intval($_POST['id'])."'","uname,sex,edu,exp,birthday,telphone,email,hy,job_classid,provinceid,cityid,three_cityid,minsalary,maxsalary,type,report");
            $rebate=$this->obj->DB_select_once("rebates","`id`='".intval($_POST['id'])."'","content");
            $data['uname']=yun_iconv("gbk","utf-8",$resume['uname']);
            $data['sex']=yun_iconv("gbk","utf-8",$arr_data['sex'][$resume['sex']]);
            $data['birthday']=yun_iconv("gbk","utf-8",$resume['birthday']);
            $data['edu']=yun_iconv("gbk","utf-8",$userclass_name[$resume['edu']]);
            $data['exp']=yun_iconv("gbk","utf-8",$userclass_name[$resume['exp']]);
            $data['telphone']=yun_iconv("gbk","utf-8",$resume['telphone']);
            if ($resume['email']){
                $data['email']=yun_iconv("gbk","utf-8",$resume['email']);
            }else{
                $data['email']=yun_iconv("gbk","utf-8","��");
            }
            $data['hy']=yun_iconv("gbk","utf-8",$industry_name[$resume['hy']]);
            if($resume['job_classid']){
                $jobids=@explode(',',$resume['job_classid']);
                foreach($jobids as $val){
                    $jobname[]=$job_name[$val];
                }
                $jobname=@implode('��',$jobname);
            }
            $data['job_classid']=yun_iconv("gbk","utf-8",$jobname);
            if($resume['provinceid']){
                $city=$city_name[$resume['provinceid']].'-'.$city_name[$resume['cityid']].'-'.$city_name[$resume['three_cityid']];
            }
            $data['city']=yun_iconv("gbk","utf-8",$city);
            if($resume['minsalary']&&$resume['maxsalary']){
                $salary='��'.$resume['minsalary'].'-'.$resume['maxsalary'];
            }else if($resume['minsalary']){
                $salary='��'.$resume['minsalary'].'����';
            }else{
                $salary='����';
            }
            $data['salary']=yun_iconv("gbk","utf-8",$salary);
            $data['type']=yun_iconv("gbk","utf-8",$userclass_name[$resume['type']]);
            $data['report']=yun_iconv("gbk","utf-8",$userclass_name[$resume['report']]);
            $data['content']=yun_iconv("gbk","utf-8",$rebate['content']);
            echo json_encode($data);die;
        }
    }
    function ajax_once_city_action(){
        if($_POST['ptype']=='city'){
            include(PLUS_PATH."city.cache.php");
            if(is_array($city_type[$_POST['id']])){
                $data.='<ul class="once_citylist">';
                foreach($city_type[$_POST['id']] as $v){
                    if($_POST['gettype']=="citys"){
                        $data.='<li><a href="javascript:;" onclick="select_once_city(\''.$v.'\',\'citys\',\''.$city_name[$v].'\',\'three_city\',\'city\');">'.$city_name[$v].'</a></li>';
                    }else{
                        $data.='<li><a href="javascript:;" onclick="selects_once(\''.$v.'\',\'three_city\',\''.$city_name[$v].'\');">'.$city_name[$v].'</a></li>';
                    }
                }
                $data.='</ul>';
            }
            echo $data;die;
        }
    }

    function ajax_recommend_interval_action()
    {
        if($_POST['uid'] && $_POST['uid'] == $this->uid){
            if(isset($this->config['sy_recommend_day_num'])
                && $this->config['sy_recommend_day_num'] > 0){
                $num = $this->obj->DB_select_num('recommend', "`uid`={$this->uid}");
                if($num >= $this->config['sy_recommend_day_num']){
                    $data['msg'] = "ÿ������Ƽ�{$this->config['sy_recommend_day_num']}��ְλ/������";
                    $data['status'] = 1;

                    $data['msg'] = iconv("gbk", "utf-8",$data['msg']);

                    echo json_encode($data);
                    exit;
                }
            }

            if(isset($this->config['sy_recommend_interval'])
                && $this->config['sy_recommend_interval'] > 0){
                $row = $this->obj->DB_select_once('recommend', "`uid`={$this->uid} order by addtime desc");

                if(isset($row['addtime'])
                    && (time() - $row['addtime']) < $this->config['sy_recommend_interval']){
                    $needTime = $this->config['sy_recommend_interval'] - (time() - $row['addtime']);
                    $data['msg'] = "�Ƽ�ְλ/���������������{$this->config['sy_recommend_interval']}�룬��{$needTime}��������";
                    $data['status'] = 2;

                    $data['msg'] = iconv("gbk", "utf-8",$data['msg']);
                    echo json_encode($data);
                    exit;
                }
            }

            echo json_encode( array('status' => 0) );
            exit;
        }
    }
}
?>