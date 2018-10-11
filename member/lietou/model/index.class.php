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
class index_controller extends lietou{
	function index_action(){

        $this->user_cache();
		include(CONFIG_PATH."db.data.php");
		$this->yunset("arr_data",$arr_data);

        if($_POST['edate']){
            $endtime = strtotime($_POST['edate']);
        }else{
            $endtime = time();
        }

        if($_POST['sdate']){
            $starttime = strtotime($_POST['sdate']);
        }else{
            $starttime = $endtime-60*60*24*30;
        }

        $day = round(($endtime-$starttime)/86400);
        $where ="uid=".$this->uid." and datetime>".$starttime." and datetime<".$endtime;
        if($_POST['keyword']){
            $where .= " and (com_name like '%".$_POST['keyword']."%' or job_name like '%".$_POST['keyword']."%')";
        }


        $service_com_count = $this->obj->DB_select_num("userid_job",$where,"DISTINCT com_id");
        $service_job_count = $this->obj->DB_select_num("userid_job",$where,"DISTINCT job_id");
        $service_resume_count = $this->obj->DB_select_num("userid_job",$where,"resume_id");
        $down_resume_count =$this->obj->DB_select_num("userid_job","is_browse=6 and ".$where,"resume_id");
        if($down_resume_count){
            $down_resume_odds = round($down_resume_count/$service_resume_count*100,2)."%";
        }else{
            $down_resume_odds = "0%";
        }

        $urlarr=array("page"=>"{{page}}");
        $pageurl=Url('member',$urlarr);
        $recommend = $this->recommend_page($where,$pageurl);

        $this->obj->DB_select_all("down_resume","type=2 ");
		$member=$this->obj->DB_select_once("member","`uid`='".$this->uid."'","`login_date`,`status`");

 		$this->yunset("service_com_count",$service_com_count);
 		$this->yunset("recommend",$recommend);
 		$this->yunset("day",$day);
 		$this->yunset("sdate",$starttime);
 		$this->yunset("edate",$endtime);
 		$this->yunset("service_job_count",$service_job_count);
 		$this->yunset("service_resume_count",$service_resume_count);
 		$this->yunset("down_resume_odds",$down_resume_odds);
 		$this->yunset("member",$member);
		$this->yunset("uid",$this->uid);
		$this->public_action();
		$this->lietou_satic();
		$this->yunset("js_def",1);
		$this->lt_tpl('index');
	}

    function ranking_action(){
        include(CONFIG_PATH."db.data.php");
        $this->yunset("arr_data",$arr_data);
        $datekind = $_GET['date']?$_GET['date']:"month";
        $this->lietou_satic();
        if($datekind=="month"){
            $begintime=mktime(0,0,0,date('m'),1,date('Y'));
            $endtime=mktime(23,59,59,date('m'),date('t'),date('Y'));
        }elseif ($datekind=="week"){
            $begintime=mktime(0,0,0,date('m'),date('d')-date('w')+1-7,date('Y'));
            $endtime=mktime(23,59,59,date('m'),date('d')-date('w')+7-7,date('Y'));
        }elseif ($datekind=="day"){
            $begintime=mktime(0,0,0,date('m'),date('d'),date('Y'));
            $endtime=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
        }

        $where = " and datetime<".$endtime." and datetime>".$begintime;

        $rows = $this->obj->DB_query_all("SELECT * FROM (SELECT uid,datetime,count(*) as count FROM `phpyun_userid_job` where is_browse=6 ".$where."  group by uid) as lietou_job order by count desc limit 0,10","all");

        foreach ($rows as $key=>$list){
            $rows[$key]['num'] = $this->obj->DB_select_num("userid_job","uid=".$list['uid'].$where);

            $rows[$key]['odd'] = round($list['count']/$rows[$key]['num']*100,2)."%";
            $lietou = $this->obj->DB_select_once("lietou","uid=".$list['uid'],"name");
            if($lietou['name']){
                $rows[$key]['name'] = $lietou['name'];
            }else{

                $lietou_n = $this->obj->DB_select_once("member","uid=".$list['uid'],"username");

                $rows[$key]['name'] = $lietou_n['username'];
            }

            $rows[$key]['job_count'] = $this->obj->DB_select_num("userid_job","uid=".$list['uid'].$where." group by job_id");
        }
        $recommend = $this->recommend_page("uid=".$this->uid,"www.baidu.com");
        $this->obj->DB_select_all("down_resume","type=2 ");
        $member=$this->obj->DB_select_once("member","`uid`='".$this->uid."'","`login_date`,`status`");

        $this->yunset("rows",$rows);
        $this->yunset("member",$member);
        $this->yunset("uid",$this->uid);
        $this->public_action();
        $this->yunset("js_def",1);
        $this->lt_tpl('ranking');
    }


    function newjobs_action(){
        $this->user_cache();
        $this->lietou_satic();
        include(CONFIG_PATH."db.data.php");
        include(PLUS_PATH."city.cache.php");
        $cache_array = $this->db->cacheget();
        $this->yunset("arr_data",$arr_data);
        $urlarr=array("c"=>"index","act"=>"newjobs","page"=>"{{page}}");
        $pageurl=Url('member',$urlarr);
        $new_jobs = $this->get_page("company_job","1 order by lastupdate desc",$pageurl,10);

        $arr_new_jobs = "";
        foreach ($new_jobs as $list){
            $list = $this->db->array_action($list,$cache_array);
            $list['lastupdate'] = $this->_format_date($list['lastupdate']);
            $list['fav_job'] = $this->obj->DB_select_num("fav_job","uid=".$this->uid." and job_id=".$list['id']);
            if($list['minsalary'] && $list['maxsalary']){
                $list['salary'] = "￥".intval($list['minsalary']*$list['ejob_salary_month']/10000)."-".intval($list['maxsalary']*$list['ejob_salary_month']/10000)."万";
            }else if($list['minsalary']){
                    $list['salary'] = "￥".intval($list['minsalary']*$list['ejob_salary_month']/10000)."以上";
            }else{
    				$list['salary'] = "面议";
            }



            $arr_new_jobs[] = $list;
        }
        $member=$this->obj->DB_select_once("member","`uid`='".$this->uid."'","`login_date`,`status`");
        $this->yunset("new_jobs",$arr_new_jobs);
        $this->yunset("member",$member);
        $this->yunset("uid",$this->uid);
        $this->public_action();
        $this->yunset("js_def",1);
        $this->lt_tpl('newjobs');
    }
}
?>