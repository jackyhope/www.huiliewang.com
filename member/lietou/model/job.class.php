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
class job_controller extends lietou{

    function index_action(){

        global $config;
        $this->user_cache();
        $this->industry_cache();

        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
        $this->com_cache();
		$this->public_action();
        $this->project_total();
        $uptime=array('1'=>'今天','3'=>'最近3天','7'=>'最近7天','30'=>'最近一个月','90'=>'最近三个月');
        $this->yunset("uptime",$uptime);
        $this->yunset("js_def",2);
        if($_GET['w']==1){
            $this->lt_tpl('joblist');
        }elseif ($_GET['w']==2){
            $this->lt_tpl('serving_job');
        }else{
            $this->lt_tpl('joblist');
        }

	}


	function job_total(){
        $job_num = $this->obj->DB_select_num("company_job","uid=".$this->uid." and status<>1");
        $joboff_num = $this->obj->DB_select_num("company_job","uid=".$this->uid." and status=1");
        $this->yunset("job_num",$job_num);
        $this->yunset("joboff_num",$joboff_num);
    }

    function mylist_action(){
        $this->job_total();
        global $config;
        $this->public_action();
        $this->user_cache();
        $this->city_cache();
        $this->industry_cache();
        $job_names=$this->obj->DB_select_all("company_job","uid=".$this->uid." group by name","name");

        $this->yunset("job_name",$job_names);


        $fake_company = $this->obj->DB_select_all("fake_company","uid=".$this->uid);
        $urlarr=array("c"=>"job","page"=>"{{page}}");
        $where="`uid`='".$this->uid."' ";
        if($_GET['job_name']){
            $where .= " and `name` like '%".trim($_GET['job_name'])."%'";
            $urlarr['job_name']=$_GET['job_name'];
        }



        if($_GET['jobname']){
            $where .= " and `name` ='".trim($_GET['jobname'])."'";
            $urlarr['jobname']=$_GET['jobname'];
        }

        if($_GET['job_id']){
            $where .= " and `id` =".trim($_GET['job_id']);
            $urlarr['job_id']=$_GET['job_id'];
        }

        if($_GET['city']){
            $where .= " and `provinceid` =".trim($_GET['city']);
            $urlarr['city']=$_GET['city'];
        }

        if($_GET['hy']){
            $where .= " and `hy` =".trim($_GET['hy']);
            $urlarr['hy']=$_GET['hy'];
        }

        if($_GET['companyname']){
            $where .= " and `fake_id` =".trim($_GET['companyname']);
            $urlarr['companyname']=$_GET['companyname'];
            $arr = $this->obj->DB_select_once("fake_company","id=".$_GET['companyname'],"companyname");
            $this->yunset("companyname",$arr['companyname']);
        }

        if($_GET['truename']){
            $where .= " and `fake_id` =".trim($_GET['truename']);
            $urlarr['truename']=$_GET['truename'];
            $arr = $this->obj->DB_select_once("fake_company","id=".$_GET['truename'],"truename");
            $this->yunset("truename",$arr['truename']);
        }

        if($_GET['w']==4){
            $where .= " and `status`='1'";
            $urlarr['w']=$_GET['w'];
        }else{
            $where .= " and `status`<>'1'";
        }
        $pageurl=Url('member',$urlarr);

        $rows=$this->get_page("company_job",$where,$pageurl,'10');
        $cache_array = $this->db->cacheget();

        if(is_array($rows) && !empty($rows)){
            $jobids=array();
            foreach($rows as $v){
                $jobids[]=$v['id'];
            }
            $jobnum=$this->obj->DB_select_all("userid_job","`job_id` in(".pylode(',',$jobids).") and `com_id`='".$this->uid."' and display=1 GROUP BY `job_id`","`job_id`,count(`id`) as `num`");

            $jobnum1=$this->obj->DB_select_all("userid_job","`job_id` in(".pylode(',',$jobids).") and `com_id`='".$this->uid."' and is_browse=6 and display=1 GROUP BY `job_id`","`job_id`,count(`id`) as `num`");
            foreach($rows as $k=>$v){
                $rows[$k] = $this->db->array_action($v,$cache_array);
                if($v['autotime']>time()){
                    $rows[$k]['autodate']=date("Y-m-d",$v['autotime']);
                }
                if($v['xsdate']>time()){
                    $rows[$k]['xs']=1;
                }
                $rows[$k]['jobnum']=0;
                foreach($jobnum as $val){
                    if($v['id']==$val['job_id']){
                        $rows[$k]['jobnum']=$val['num'];
                    }
                }
                $rows[$k]['jobnum1']=0;
                foreach($jobnum1 as $val){
                    if($v['id']==$val['job_id']){
                        $rows[$k]['jobnum1']=$val['num'];
                    }
                }
                $rows[$k]['type']=1;
                $rows[$k]['edate']= str_replace("年","-",$rows[$k]['edate']);
                $rows[$k]['edate']= str_replace("月","-",$rows[$k]['edate']);
                $rows[$k]['edate']= str_replace("日","",$rows[$k]['edate']);
            }
        }

        $audit=$this->obj->DB_select_num("company_job","`uid`='".$this->uid."' and `state`=0");
        $this->yunset("fake_company",$fake_company);
        $this->yunset("audit",$audit);
        $this->yunset("rows",$rows);
        $this->yunset("js_def",3);
        $this->lt_tpl('releasejobs');
    }

	//服务中的职位
        function serving_job_action(){
            global $config;
            $this->public_action();
            $this->user_cache();
            $this->industry_cache();
            $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
            $this->com_cache();
            $uptime=array('1'=>'今天','3'=>'最近3天','7'=>'最近7天','30'=>'最近一个月','90'=>'最近三个月');
            $this->yunset("uptime",$uptime);
            $urlarr=array("c"=>"job","act"=>"serving_job","page"=>"{{page}}");


            $pageurl=Url('member',$urlarr);
            $page=$_GET['page']<1?1:$_GET['page'];
            $ststrsql=($page-1)*10;

            $userid_job=$this->obj->DB_select_all("userid_job","uid=".$this->uid,"job_id");
            foreach ($userid_job as $li){
                $job_ids[] = $li['job_id'];
            }
            $job_ids = implode(",",$job_ids);


            $where="id in(".$job_ids.")";
            if($_GET['hy']){
                $where .= " and hy=".intval($_GET['hy']);
            }elseif ($_GET['city']){
                $where .= " and provinceid=".intval($_GET['city']);
            }elseif ($_GET['salary']){

            }elseif ($_GET['uptime']){

            }elseif ($_GET['keyword']){
                $where .= " and (name like '%".$_GET['keyword']."%' or com_name like '%".$_GET['keyword']."%')";
            }

            $num=$this->obj->DB_select_num("userid_job","identity=3 and uid=".$this->uid." group by job_id");
            $this->yunset("total",$num);
            if($num>10){
                $pages=ceil($num/10);
                $pagenav=Page($page,$num,10,$pageurl,$notpl=false,$this->tpl,"pagenav");
                $this->yunset("pages",$pages);
            }


            $rows=$this->obj->DB_select_all(company_job,"$where limit $ststrsql,10");
            $jobs = $this->jobs_parse($rows);


            $this->yunset("rows",$jobs);
//        return $rows;

            if(is_array($rows) && !empty($rows)){
                $jobids=array();
                foreach($rows as $v){
                    $jobids[]=$v['id'];
                }
                $jobnum=$this->obj->DB_select_all("userid_job","`job_id` in(".pylode(',',$jobids).") and `com_id`='".$this->uid."' GROUP BY `job_id`","`job_id`,count(`id`) as `num`");
                foreach($rows as $k=>$v){
                    if($v['autotime']>time()){
                        $rows[$k]['autodate']=date("Y-m-d",$v['autotime']);
                    }
                    if($v['xsdate']>time()){
                        $rows[$k]['xs']=1;
                    }
                    $rows[$k]['jobnum']=0;
                    foreach($jobnum as $val){
                        if($v['id']==$val['job_id']){
                            $rows[$k]['jobnum']=$val['num'];
                        }
                    }
                    $rows[$k]['type']=1;
                }
            }

            $maxfen=$this->obj->DB_select_once("company_job","`state`='1' and `sdate`<'".mktime()."' and `r_status`<>'2' and `edate`>'".mktime()."' order by `xuanshang` desc",'xuanshang');
            $urgent=$this->config['com_urgent'];

            $audit=$this->obj->DB_select_num("company_job","`uid`='".$this->uid."' and `state`=0");
            $this->yunset("audit",$audit);
            $this->yunset("urgent",$urgent);
            $this->yunset("maxfen",$maxfen);
            $this->yunset("js_def",2);
           
            $this->lt_tpl('serving_job');
        }

        //我发布的职位
            function releasejobs_action(){
                global $config;
                $this->public_action();
                $this->user_cache();
                $this->industry_cache();
                $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
                $this->com_cache();
                $uptime=array('1'=>'今天','3'=>'最近3天','7'=>'最近7天','30'=>'最近一个月','90'=>'最近三个月');
                $this->yunset("uptime",$uptime);
                $urlarr=array("c"=>"job","page"=>"{{page}}");


                $pageurl=Url('member',$urlarr);
                $page=$_GET['page']<1?1:$_GET['page'];
                $ststrsql=($page-1)*10;
                $num=$this->obj->DB_select_num("userid_job","identity=3 and uid=".$this->uid);
                $userid_job=$this->obj->DB_select_all("userid_job","uid=".$this->uid,"job_id");
                foreach ($userid_job as $li){
                    $job_ids[] = $li['job_id'];
                }
                $job_ids = implode(",",$job_ids);
                $this->yunset("total",$num);
                if($num>10){
                    $pages=ceil($num/10);
                    $pagenav=Page($page,$num,10,$pageurl,$notpl=false,$this->tpl,"pagenav");
                    $this->yunset("pages",$pages);
                }

                $where="id in(".$job_ids.")";
                if($_GET['hy']){
                    $where .= " and hy=".intval($_GET['hy']);
                }elseif ($_GET['city']){
                    $where .= " and provinceid=".intval($_GET['city']);
                }elseif ($_GET['salary']){

                }elseif ($_GET['uptime']){

                }elseif ($_GET['keyword']){
                    $where .= " and (name like '%".$_GET['keyword']."%' or com_name like '%".$_GET['keyword']."%')";
                }


                $rows=$this->obj->DB_select_all(company_job,"$where limit $ststrsql,10");
                $jobs = $this->jobs_parse($rows);


                $this->yunset("rows",$jobs);
    //        return $rows;

                if(is_array($rows) && !empty($rows)){
                    $jobids=array();
                    foreach($rows as $v){
                        $jobids[]=$v['id'];
                    }
                    $jobnum=$this->obj->DB_select_all("userid_job","`job_id` in(".pylode(',',$jobids).") and `com_id`='".$this->uid."' GROUP BY `job_id`","`job_id`,count(`id`) as `num`");
                    foreach($rows as $k=>$v){
                        if($v['autotime']>time()){
                            $rows[$k]['autodate']=date("Y-m-d",$v['autotime']);
                        }
                        if($v['xsdate']>time()){
                            $rows[$k]['xs']=1;
                        }
                        $rows[$k]['jobnum']=0;
                        foreach($jobnum as $val){
                            if($v['id']==$val['job_id']){
                                $rows[$k]['jobnum']=$val['num'];
                            }
                        }
                        $rows[$k]['type']=1;
                    }
                }

                $maxfen=$this->obj->DB_select_once("company_job","`state`='1' and `sdate`<'".mktime()."' and `r_status`<>'2' and `edate`>'".mktime()."' order by `xuanshang` desc",'xuanshang');
                $urgent=$this->config['com_urgent'];

                $audit=$this->obj->DB_select_num("company_job","`uid`='".$this->uid."' and `state`=0");
                $this->yunset("audit",$audit);
                $this->yunset("urgent",$urgent);
                $this->yunset("maxfen",$maxfen);
                $this->yunset("js_def",3);
               
                $this->lt_tpl('releasejobs');
            }

    //收藏职位
    function fav_job_action(){

        global $config;

        $this->public_action();
        $this->user_cache();
        $this->industry_cache();
        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
        $this->com_cache();

        $uptime=array('1'=>'今天','3'=>'最近3天','7'=>'最近7天','30'=>'最近一个月','90'=>'最近三个月');
        $this->yunset("uptime",$uptime);
        $urlarr=array("c"=>"job","page"=>"{{page}}","act"=>"fav_job");
        $pageurl=Url('member',$urlarr);
        $page=$_GET['page']<1?1:$_GET['page'];
        $ststrsql=($page-1)*10;
        $num=$this->obj->DB_select_num("fav_job","uid=".$this->uid);
        $fav_job=$this->obj->DB_select_all("fav_job","uid=".$this->uid,"job_id");
        foreach ($fav_job as $li){
            $job_ids[] = $li['job_id'];
        }
        $job_ids = implode(",",$job_ids);
        $this->yunset("total",$num);
        if($num>10){
            $pages=ceil($num/10);
            $pagenav=Page($page,$num,10,$pageurl,$notpl=false,$this->tpl,"pagenav");
            $this->yunset("pages",$pages);
        }
        $where="id in(".$job_ids.")";


//		$rows=$this->get_page("company_job",$where,$pageurl,'10');

        if($_GET['hy']){
            $where .= " and hy=".intval($_GET['hy']);
        }elseif ($_GET['city']){
            $where .= " and provinceid=".intval($_GET['city']);
        }elseif ($_GET['salary']){

        }elseif ($_GET['uptime']){

        }elseif ($_GET['keyword']){
            $where .= " and (name like '%".$_GET['keyword']."%' or com_name like '%".$_GET['keyword']."%')";
        }


        $rows=$this->obj->DB_select_all("company_job","$where limit $ststrsql,10");

        $jobs = $this->jobs_parse($rows);


        $this->yunset("rows",$jobs);
//        return $rows;

        if(is_array($rows) && !empty($rows)){
            $jobids=array();
            foreach($rows as $v){
                $jobids[]=$v['id'];
            }
            $jobnum=$this->obj->DB_select_all("userid_job","`job_id` in(".pylode(',',$jobids).") and `com_id`='".$this->uid."' GROUP BY `job_id`","`job_id`,count(`id`) as `num`");
            foreach($rows as $k=>$v){
                if($v['autotime']>time()){
                    $rows[$k]['autodate']=date("Y-m-d",$v['autotime']);
                }
                if($v['xsdate']>time()){
                    $rows[$k]['xs']=1;
                }
                $rows[$k]['jobnum']=0;
                foreach($jobnum as $val){
                    if($v['id']==$val['job_id']){
                        $rows[$k]['jobnum']=$val['num'];
                    }
                }
                $rows[$k]['type']=1;
            }
        }

        $maxfen=$this->obj->DB_select_once("company_job","`state`='1' and `sdate`<'".mktime()."' and `r_status`<>'2' and `edate`>'".mktime()."' order by `xuanshang` desc",'xuanshang');
        $urgent=$this->config['com_urgent'];

        $audit=$this->obj->DB_select_num("company_job","`uid`='".$this->uid."' and `state`=0");
        $this->yunset("audit",$audit);
        $this->yunset("urgent",$urgent);
        $this->yunset("maxfen",$maxfen);
        $this->yunset("js_def",2);
        $this->yunset("w",1);
       
        $this->lt_tpl('joblist');
    }


    //取消收藏
    function del_fav_action(){
        $job_id = $_POST['id'];
        $fav = $this->obj->DB_select_once("fav_job","uid=".$this->uid." and job_id=".$job_id);
        if($fav){
            $this->obj->DB_delete_all("fav_job","uid=".$this->uid." and job_id=".$job_id);
            echo 1;exit();
        }else{
            $this->error_msg("请先关注该职位");
        }
    }
	function opera_action(){
		$this->job();
	}

	function buyJob_action(){
		if($_POST){
			$M=$this->MODEL('compay');
			if ($_POST['jobautoids']){
				$return = $M->buyAutoJob($_POST);
			}elseif ($_POST['zdjobid']){
				$return = $M->buyZdJob($_POST);
			}elseif ($_POST['recjobid']){
				$return = $M->buyRecJob($_POST);
			}elseif ($_POST['ujobid']){
				$return = $M->buyUrgentJob($_POST);
			}

			if($return['order']['order_id'] && $return['order']['id']){
				echo json_encode(array('error'=>0,'orderid'=>$return['order']['order_id'],'id'=>$return['order']['id']));
			}else{
				echo json_encode(array('error'=>1,'msg'=>iconv('gbk','utf-8',$return['error'])));
			}
		}else{
			echo json_encode(array('error'=>1,'msg'=>iconv('gbk','utf-8','参数错误，请重试！')));
		}
	}

	function bidding_action(){

		$where="`uid`='".$this->uid."' and `xsdate`>'".time()."'";
		$urlarr=array("c"=>"job",'act'=>'bidding',"page"=>"{{page}}");
		if(trim($_GET['keyword'])){
			$where.=" and `name` like '%".trim($_GET['keyword'])."%'";
			$urlarr['keyword']=trim($_GET['keyword']);
		}
		$pageurl=Url('member',$urlarr);
		$rows=$this->get_page("company_job",$where,$pageurl,"10");
		$this->yunset("rows",$rows);
		$this->yunset("js_def",3);
		$this->company_satic();
		$this->lt_tpl('bidding');
	}
	function refresh_action(){
		$nid=$this->obj->DB_update_all("company_job","`lastupdate`='".time()."'","`uid`='".$this->uid."' and `id`='".(int)$_POST['id']."'");
		if($nid){
			$this->obj->DB_update_all("company","`lastupdate`='".time()."'","`uid`='".$this->uid."'");
			echo 1;
		}
	}


	function ajax_refresh_job_action()
	{
		if(!isset($_POST['jobid'])){
			exit;
		}

		$jobid = $_POST['jobid'];
		
		$statis =

		$msg = '';
		
		if( $statis['vip_etime'] >time() || $statis['vip_etime'] ==0 ){
        	if( $statis['rating_type'] == 1 ){
            	if( $statis['breakjob_num'] > 0 ){
            		$msg = '刷新职位数还剩余' . $statis['breakjob_num'] . '个！确认刷新？';
            		$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

            		$data['status'] = 1;
        		}           	
				else{
              		if( $this->config['com_integral_online'] ==1 ){
						if( $this->config['integral_jobefresh'] > 0 ){
							if( $this->config['integral_jobedit'] > $statis['integral'] ){
								$msg = $this->config['integral_pricename'] . '不足，无法刷新！';

								$data['status'] = 2;
							}
							else{
								$msg = '本次刷新需扣除' . $this->config['integral_jobefresh'] 
									. $this->config['integral_priceunit'] . $this->config['integral_pricename']
									. '！确认刷新？';
								$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

								$data['status'] = 1;
							}
						}
						else{
							$msg = '确认要刷新？';
							$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

							$data['status'] = 1;
						}
					}
			  		else{
			   			$msg = '刷新次数已用完，是否先购买特权？';
			   			$data['url'] = 'index.php?c=right';

			   			$data['status'] = 3;
			 	 	}
			 	}
			}
			else{
				$msg = '确定刷新该职位么？';
				$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

				$data['status'] = 1;
		    }
	    }
        else{
            if( $this->config['com_integral_online'] ==1 ){
				if( $this->config['integral_jobefresh'] >0) {
					$msg = '本次刷新需扣除' . $this->config['integral_jobefresh'] 
						. $this->config['integral_priceunit'] . $this->config['integral_pricename']
						. '！确认刷新？';
					$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

					$data['status'] = 1;
				}
				else{
					$msg = '确定刷新该职位么？';
					$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

					$data['status'] = 1;
				}
		    }
		    else{
	   			$msg = '刷新次数已用完，是否先购买特权？';
	   			$data['url'] = 'index.php?c=right';

	   			$data['status'] = 3;
		    }
	    }

		
		$data['msg'] = iconv("gbk", "utf-8", $msg);
		echo json_encode($data);
		exit;
	}
}
?>