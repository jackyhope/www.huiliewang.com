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
class resume_controller extends lietou{


    function index_action(){
        $this->check_lietou();
        $this->public_action();
        $this->resume_total();
        $this->industry_cache();
        $this->user_cache();
        $this->job_cache();
        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
        $searcher = $this->obj->DB_select_all("resume_searcher","uid=".$this->uid,"id,name");
        if($_POST['searcher_id']){
            $search = $this->obj->DB_select_once("resume_searcher","id=".$_POST['searcher_id']);
        }else{
            $search = $_POST;
        }

        $this->subject_cache();
        $this->yunset("js_def",8);
        $this->yunset("searcher",$searcher);
        $this->yunset("search",$search);
        $this->lt_tpl('search_list');
    }

//    function index_action(){
//        $this->public_action();
//        $this->resume_total();
//        $this->industry_cache();
//        $this->user_cache();
//        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
//        $this->subject_cache();
//        $this->yunset("js_def",5);
//        $this->lt_tpl('resumelist');
//    }

    function input_action(){
        $this->check_lietou();
        $this->public_action();
        $this->resume_total();
        $this->user_cache();
        $this->industry_cache();
        $member=$this->obj->DB_select_once("member","`uid`='".$this->uid."'","`uid`,`status`");
        $this->yunset("member",$member);
        $this->lt_tpl('input_resume');
    }


    function addsearch_action(){
        $_POST = $this->array_iconv("utf-8","gbk",$_POST);
        $data['name'] = $_POST['name']?$_POST['name']:$this->error_msg("请输入搜索器名称");
        $data['keyword'] = $_POST['keyword'];
        $data['job_name'] = $_POST['jobname'];
        $data['com_name'] = $_POST['comname'];
        $data['hy'] = $_POST['hy'];
        $data['jobs_id'] = $_POST['jobs_id'];
        $data['hope_city'] = $_POST['hope_city'];
        $data['location'] = $_POST['location'];
        $data['sex'] = $_POST['sex'];
        $data['minage'] = $_POST['minage'];
        $data['maxage'] = $_POST['maxage'];
        $data['exp'] = $_POST['exp'];
        $data['maxsalary'] = $_POST['maxsalary'];
        $data['minsalary'] = $_POST['minsalary'];
        $data['status'] = $_POST['status'];
        $data['uid'] = $this->uid;
        $num = $this->obj->DB_select_num("resume_searcher","uid=".$this->uid);
        if(($num+1)>4){
            $this->error_msg("您最多只能添加4个搜索器");
        }else{
            $r = $this->obj->insert_into("resume_searcher",$data);
            if($r){
                echo 1;exit();
            }
        }
    }

    function delsearch_action(){
        $id = $_POST['id']?$_POST['id']:$this->error_msg("参数错误");
        $r = $this->obj->DB_delete_all("resume_searcher","id=".$id." and uid=".$this->uid);
        if($r){
            echo 1;exit();
        }
    }

    function edit_action(){
        $this->public_action();
        $this->resume_total();
        $this->user_cache();
        $this->industry_cache();
        $this->job_cache();
        $this->city_cache();
        include(PLUS_PATH."job.cache.php");
        include(PLUS_PATH."city.cache.php");
        if($_GET['id']){
            $resume = $this->obr->DB_select_once("resume","id=".$_GET['id']);

            $work = unserialize($resume['work_content']);
            $work = $this->array_iconv("utf-8","gbk",$work);
            $project = unserialize($resume['project_content']);
            $project = $this->array_iconv("utf-8","gbk",$project);
            $edu = unserialize($resume['edu_content']);
            $edu = $this->array_iconv("utf-8","gbk",$edu);
            $resume = $this->array_iconv("utf-8","gbk",$resume);

            $job_classids = explode(",",$resume['jobs_classid']);
            $name_n = "";

            foreach ($job_classids as $list){
                $name_n[] = $job_name[$list];
            }
            $resume['job_classids'] = implode(",",$name_n);


            $citys_id = explode(",",$resume['citys_id']);
            $name_n = "";

            foreach ($citys_id as $list){
                $name_n[] = $city_name[$list];
            }
            $resume['city_ids'] = implode(",",$name_n);

            $resume['work_n'] = $work;
            $resume['project_n'] = $project;
            $resume['edu_n'] = $edu;
            $this->yunset("resume",$resume);
        }
        $member=$this->obj->DB_select_once("member","`uid`='".$this->uid."'","`uid`,`status`");
        $this->yunset("member",$member);
        $this->lt_tpl('edit_resume');
    }

    function resumefav_action(){
        $this->public_action();
        $this->resume_total();
        $this->industry_cache();
        $this->user_cache();
        $collect_ids = $this->obj->DB_select_all("");
        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
        $this->subject_cache();
        if($_POST){
            $this->yunset("search",$_POST);
        }
        $resume = $this->obj->get_page();
        $this->yunset("js_def",5);
        $this->yunset("resume_kind","collect");
        $this->lt_tpl('resumelist');
    }
    //简历搜索
    function searchbox_action(){
            $this->public_action();
            $this->resume_total();
            $this->industry_cache();
            $this->user_cache();
            $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
            $this->subject_cache();

            $searcher = $this->obj->DB_select_all("resume_searcher","uid=".$this->uid);
            $this->yunset("searcher",$searcher);
            $this->yunset("js_def",8);
            $this->yunset("resume_kind","collect");
            $this->lt_tpl('searchbox');
        }

    //简历搜索结果
//    function searchlist_action(){
//        $this->public_action();
//        $this->resume_total();
//        $this->industry_cache();
//        $this->user_cache();
//        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
//        $this->subject_cache();
//         $this->yunset("js_def",8);
//        $this->lt_tpl('search_list');
//    }

    function recommend_action(){
        $this->public_action();
        $this->resume_total();
        $this->industry_cache();
        $this->user_cache();
        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
        $this->subject_cache();
        $this->yunset("js_def",5);
        if($_POST){
            $this->yunset("search",$_POST);
        }
        $this->yunset("resume_kind","recommend");
        $this->lt_tpl('resumelist');
    }

    function down_action(){
        $this->public_action();
        $this->resume_total();
        $this->industry_cache();
        $this->user_cache();
        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
        $this->subject_cache();
        $this->yunset("js_def",5);
        if($_POST){
            $this->yunset("search",$_POST);
        }
        $this->yunset("resume_kind","down");
        $this->lt_tpl('resumelist');
    }


    function jobrecommend_action(){

            if(empty($_GET['eid'])){
            $this->ACT_msg("index.php","该页面不存在");
        }
            $this->public_action();
            $this->resume_total();
            $this->industry_cache();
            $this->user_cache();
            $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
            $uptime=array('1'=>'今天','3'=>'最近3天','7'=>'最近7天','30'=>'最近一个月','90'=>'最近三个月');
            $this->yunset("uptime",$uptime);
            $this->subject_cache();
            $this->yunset("js_def",5);
            $this->yunset("resume_kind","recommend");
//        $this->lt_tpl('resumelist');
            $this->lt_tpl('jobrecommend');
    }

    function myself_action(){
        $this->public_action();
        $this->resume_total();
        $this->industry_cache();
        $this->user_cache();
        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
        $this->subject_cache();
        if($_POST){
            $this->yunset("search",$_POST);
        }
        $this->yunset("js_def",5);
        $this->yunset("resume_kind","myself");
        $this->lt_tpl('resumelist');
    }
     function command_action(){
         $this->resume_total();
         $fake_ids = $this->obj->DB_select_all("fake_company","uid=".$this->uid,"id");
         $com_id = "";
         foreach ($fake_ids as $list){
             $com_id[] = $list['id'];
         }
//         $where = "com_id in(".implode(",",$com_id).")";
         $where="`com_id`='".$this->uid."'";

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

            $this->yunset("js_def",5);
         $this->yunset("jobnum",$jobnum);
         $this->yunset("rows",$rows);
            $this->lt_tpl('command');
        }

    function onejob_receivelist_action(){
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
                 $this->resume_total();
                 $this->industry_cache();
                 $this->user_cache();
                 $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
                 $this->subject_cache();
                 $this->yunset("js_def",3);
                 $this->yunset("jobs",$jobs);
                 $this->yunset("resume_kind","myself");
                 $this->lt_tpl('onejob_receivelist');
             }


    function add_action(){
        global $db_config1;
        $this->public_action();
        include(PLUS_PATH."job.cache.php");
        include(PLUS_PATH."city.cache.php");
        $job_name_n = array_flip($job_name);
        $city_name = array_flip($city_name);
//        var_dump($_POST);exit();
//        $hopeCallings = mb_convert_encoding($_POST['intent']['hopeCallingsText'], "gbk", "utf-8");
//        $hopeCallings = str_replace("?","",$hopeCallings);
//
//        unset($_POST['intent']['hopeCallingsText']);
//
//
//        $_POST = $this->array_iconv("utf-8","gbk",$_POST);
//        $_POST = $this->filter_post($_POST);

        $_POST['birthDayStr'] = str_replace(".","-",$_POST['birthDayStr']);
        $data['name'] = $_POST['name']?$_POST['name']:$this->error_msg("请输入姓名");
        $data['sex'] = intval($_POST['sex']);
        $data['email'] = $_POST['email'];
        $data['birthday'] = strtotime($_POST['birthDayStr']);
        $data['living'] =  $_POST['cityId'];
        $data['edu'] = $_POST['degree'];
        $data['exp'] = $_POST['workYear'];
        $data['description'] = $_POST['extra']['selfEvaluation'];
        $data['attach_info'] = $_POST['extra']['extraInfo'];
        $data['telphone'] = $_POST['mobile']?$_POST['mobile']:$this->error_msg("请输入手机号");
        $data['uid'] = $this->uid;
        $data['jobs_classid'] = $_POST['intent']['jobs_classid'];
        $data['citys_id'] = $_POST['intent']['citys_id'];
        $data['hope_salary'] = $_POST['intent']['hopeMoney'];
        $data['current_salary'] = $_POST['intent']['curMoney'];
        $data['r_status'] = 1;
        $data['addtime'] = time();
        $data['lastupdate'] = time();

        if($_POST['workExp']){
            foreach ($_POST['workExp'] as $k=>$list){
                $_POST['workExp'][$k]['startDateStr'] = strtotime(str_replace(".","-",$list['startDateStr']));
                $_POST['workExp'][$k]['endDateStr'] = strtotime(str_replace(".","-",$list['endDateStr']));

                $endtime = date("Y-m",$_POST['workExp'][$k]['endDateStr']);
                $nowtime = date("Y-m");
                if($endtime==$nowtime){
                    $data['current_company'] = $list['companyName'];
                    $data['current_job'] = $list['posName'];
                }
            }
        }

        if($_POST['eduExps']){
            foreach ($_POST['eduExps'] as $k=>$list){
                $_POST['eduExps'][$k]['startDateStr'] = strtotime(str_replace(".","-",$list['startDateStr']));
                $_POST['eduExps'][$k]['endDateStr'] = strtotime(str_replace(".","-",$list['endDateStr']));
            }
        }

        if($_POST['proExp']){
            foreach ($_POST['proExp'] as $k=>$list){
                $_POST['proExp'][$k]['startDateStr'] = strtotime(str_replace(".","-",$list['startDateStr']));
                $_POST['proExp'][$k]['endDateStr'] = strtotime(str_replace(".","-",$list['endDateStr']));
            }
        }

        $data['work_content'] = serialize($_POST['workExp']);
        $data['edu_content'] = serialize($_POST['eduExps']);
        $data['project_content'] = serialize($_POST['proExp']);
        $resume = $this->obr->DB_select_once("resume","telphone=".$data['telphone'],"id");

        $index['sex'] = intval($_POST['sex']);
        $index['edu'] = $_POST['degree'];
        $index['addtime'] = time();
        $index['lastupdate'] = time();
        $index['uid'] = $this->uid;
        $index['exp'] = $_POST['workYear'];
        $index['birthday'] = strtotime($_POST['birthDayStr']);
        $index['hy'] = $_POST['intent']['hopeIndustry'];
        $index['jobstatus'] = $_POST['jobState'];
        $index['hope_salary'] = intval($_POST['intent']['hopeMoney']);
        $jobs_id = array_filter(explode(",",$_POST['intent']['hopeCallings']));
        if($jobs_id){
            $index['jobs_id'] = $jobs_id[0];
            $index['jobs_id1'] = $jobs_id[1];
            $index['jobs_id2'] = $jobs_id[2];
        }
        $hopeCitys = explode(",",$_POST['intent']['hopeCitys']);
        if($hopeCitys){
            $index['city'] = $city_name[$hopeCitys[0]];
            $index['city1'] = $city_name[$hopeCitys[1]];
            $index['city2'] = $city_name[$hopeCitys[2]];
        }

        if($resume && $resume['id']<>$_POST['resume_id']){
            echo 2;exit();
            $this->error_msg("此手机号已存在!");
        }else{
            if($_POST['resume_id']){
               $this->obj->update_once("resume_index",$index,"id=".$_POST['resume_id']);
                $index_id =$_POST['resume_id'];
            }else{
                $index_id = $this->obr->insert_into("resume_index",$index);
            }

            if(empty($index_id)){
                $this->error_msg("参数错误");
            }

            if($_POST['resume_id']){
                $index_id = $_POST['resume_id'];
            }
            $data['id'] = $index_id;
            $data['tag'] = $_POST['tag'];

            if($_POST['resume_id']){
                 $this->obr->update_once($this->get_hash_table("resume",$index_id),$data,"id=".$index_id);       //id 作为后面附表的uid
                $resume_id =$index_id;
            }else{
                $resume_id = $this->obr->insert_into($this->get_hash_table("resume",$index_id),$data);       //id 作为后面附表的uid
            }
            echo 1;exit();
        }


    }

    /*
     * 过滤数据提交()导致转换编码失效
     */
    function filter_post($post){
        $post['name'] = $this->filter_str($post['name']);
        $post['sex'] = $this->filter_str($post['sex']);
        $post['email'] = $this->filter_str($post['email']);
        $post['birthday'] = $this->filter_str($post['birthDayStr']);
        $post['mobile'] = $this->filter_str($post['mobile']);
        $post['email'] = $this->filter_str($post['email']);
        $post['cityId'] = $this->filter_str($post['cityId']);
        $post['jobState'] = $this->filter_str($post['jobState']);
        $post['workYear'] = $this->filter_str($post['workYear']);
        $post['tag'] = $this->filter_str($post['tag']);

        $post['intent']['hopeCallings'] = $this->filter_str($post['intent']['hopeCallings']);
        $post['intent']['hopeCallingsText'] = $this->filter_str($post['intent']['hopeCallingsText']);
        $post['intent']['hopeIndustry'] = $this->filter_str($post['intent']['hopeIndustry']);
        $post['intent']['hopeCitys'] = $this->filter_str($post['intent']['hopeCitys']);
        $post['intent']['curMoney'] = $this->filter_str($post['intent']['curMoney']);
        $post['intent']['moneyMonthes'] = $this->filter_str($post['intent']['moneyMonthes']);
        $post['intent']['hopeMoney'] = $this->filter_str($post['intent']['hopeMoney']);
        $post['extra']['selfEvaluation'] = $this->filter_str($post['extra']['selfEvaluation']);
        $post['extra']['extraInfo'] = $this->filter_str($post['extra']['extraInfo']);

//        foreach ($post['workExp'] as $key=>$li){
//            $post['workExp'][$key]['startDateStr'] = $this->filter_str($li['startDateStr']);
//            $post['workExp'][$key]['endDateStr'] = $this->filter_str($li['endDateStr']);
//            $post['workExp'][$key]['companyName'] = $this->filter_str($li['companyName']);
//            $post['workExp'][$key]['posName'] = $this->filter_str($li['posName']);
//            $post['workExp'][$key]['workDes'] = $this->filter_str($li['workDes']);
//        }

//        foreach ($post['proExp'] as $key=>$li){
//            $post['proExp'][$key]['startDateStr'] = $this->filter_str($li['startDateStr']);
//            $post['proExp'][$key]['endDateStr'] = $this->filter_str($li['endDateStr']);
//            $post['proExp'][$key]['projectOffice'] = $this->filter_str($li['projectOffice']);
//            $post['proExp'][$key]['subCompany'] = $this->filter_str($li['subCompany']);
//            $post['proExp'][$key]['projectRole'] = $this->filter_str($li['projectRole']);
//            $post['proExp'][$key]['projectPerfromnance'] = $this->filter_str($li['projectPerfromnance']);
//            $post['proExp'][$key]['proName'] = $this->filter_str($li['proName']);
//            $post['proExp'][$key]['proDes'] = $this->filter_str($li['proDes']);
//
//        }

//        foreach ($post['eduExps'] as $key=>$li){
//            $post['eduExps'][$key]['startDateStr'] = $this->filter_str($li['startDateStr']);
//            $post['eduExps'][$key]['endDateStr'] = $this->filter_str($li['endDateStr']);
//            $post['eduExps'][$key]['schoolName'] = $this->filter_str($li['schoolName']);
//            $post['eduExps'][$key]['majorName'] = $this->filter_str($li['majorName']);
//            $post['eduExps'][$key]['degree'] = $this->filter_str($li['degree']);
//        }

        return $post;
    }

    function filter_str($post){
//        echo $post;exit();
//        $post = str_replace("(","",$post);
//        $post = str_replace(")","",$post);
        $post = mb_convert_encoding($post, "gbk", "utf-8");
        $post = str_replace("?","",$post);
        return $post;
    }




    function collect_action(){
        $resume_id = $_POST['resume_id'];
        $eid = $_POST['eid'];
        $fav = $this->obj->DB_select_once("fav_resume","resume_id=".$resume_id." and eid=".$eid." and uid=".$this->uid);
        if($fav){
            $this->error_msg("已收藏");
        }else{
            $data['resume_id'] = $resume_id;
            $data['eid'] = $eid;
            $data['uid'] = $this->uid;
            $data['datetime'] = time();
            $data['type'] = 3;
            $this->obj->insert_into("fav_resume",$data);
            echo 1;exit();
        }
    }

    function remove_collect_action(){
        if($_POST['id']){
            $eid = $_POST['id'];
            $this->obj->DB_delete_all("fav_resume","uid=".$this->uid." and eid=".$eid);
//            $this->success_msg('取消收藏成功');
echo 1;exit();
        }else{
            $this->error_msg("参数错误");
        }

    }
}