<?php
/*
* $Author ：PHPYUN开发团队
*
* 官网: http://www.phpyun.com
*
* 版权所有 2009-2017 宿迁鑫潮信息技术有限公司，并保留所有权利。
*
* 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
 */
class index_controller extends resume_controller{
	function usersearch(){

		if($_GET[job]){
			$job=explode("_",$_GET[job]);
			$_GET['job1']=$job[0];
			$_GET['job1_son']=$job[1];
			$_GET['job_post']=$job[2];
		}
		if($_GET[city]){
			$city=explode("_",$_GET[city]);
			$_GET['provinceid']=$city[0];
			$_GET['cityid']=$city[1];
			$_GET['three_cityid']=$city[2];
		}
		
		if($_GET[tp]==1){
			$_GET['pic']=1;
		}
		
	if($_GET[all]){//合并参数匹配
			$allurl=explode("_",$_GET[all]);
			$_GET['hy']=$allurl[0];
			$_GET['edu']=$allurl[1];
			$_GET['exp']=$allurl[2];
			$_GET['sex']=$allurl[3];
			$_GET['report']=$allurl[4];
			$_GET['uptime']=$allurl[5];
			$_GET['idcard']=$allurl[6];
			$_GET['work']=$allurl[7];
			$_GET['tag']=$allurl[8];
			$_GET['jobs_id1']=$allurl[9];
			$_GET['jobs_id2']=$allurl[10];
			$_GET['jobs_id']=$allurl[11];
		}
		if ($_GET['salary']){
            $salary=explode('_', $_GET['salary']);
            $_GET['minsalary']=$salary[0];
            $_GET['maxsalary']=$salary[1];
        }
		include(CONFIG_PATH."db.data.php");	
		unset($arr_data['sex'][3]);	
		$this->yunset("arr_data",$arr_data);
		$arr_data1=$arr_data['sex'][$_GET['sex']];
		$this->yunset("arr_data1",$arr_data1);
        
        $uptime=array(1=>'今天',3=>'最近3天',7=>'最近7天',30=>'最近一个月','90'=>'最近三个月');
        $this->yunset("uptime",$uptime);
        
        $FinderParams=array('keyword','hy','job1','job1_son','job_post','provinceid','cityid','three_cityid','minsalary','maxsalary','edu','exp','sex','type','report','adtime','uptime');
        
		$adtime=array('1'=>'一天内',"3"=>'三天内','7'=>'七天内',"15"=>'十五天内','30'=>'一个月内',"60"=>'两个月内');
		$this->yunset("adtime",$adtime);
		if($this->config['province']){
			$_GET['provinceid'] = $this->config['province'];
		}
		if($this->config['cityid']){
			$_GET['cityid'] = $this->config['cityid'];
		}
		if($this->config['three_cityid']){
			$_GET['three_cityid'] = $this->config['three_cityid'];
		}
		$CacheM=$this->MODEL('cache');
        $CacheList=$CacheM->GetCache(array('job','city','user','hy'));
        $this->yunset($CacheList);
		 
		foreach($_GET as $k=>$v){
			if(in_array($k,$FinderParams)&&$v!=""&&$v!="0"){
				if($v!=""){
					$finder[$k]=$v;
				}
			}
		}
		unset($finder['city']);unset($finder['job']);unset($finder['all']);unset($finder['tp']);unset($finder['minsalary']);unset($finder['maxsalary']);
		$this->yunset('finder',$finder);
		if($this->config['cityid']){
			unset($finder['cityid']);
		} 
		if($finder&&is_array($finder)){
			foreach($finder as $key=>$val){
				$para[]=$key."=".$val;
			}
			$paras=@implode('##',$para);
			$this->yunset("paras",$paras);
		}	
		if($this->uid && $this->usertype==2){
			 
			$historyM = $this->MODEL('history'); 
			$lookResume = $historyM->lookResumeHistory($this->uid); 
			$talentpool  = $historyM->talentpoolHistory($this->uid); 
			$useridmsg  = $historyM->useridmsgHistory($this->uid); 
			if($this->config['sy_web_site']=="1"){
				if($this->config['sy_onedomain']!=""){
					$weburl=get_domain($this->config['sy_onedomain']);
				}elseif($this->config['sy_indexdomain']!=""){
					$weburl=get_domain($this->config['sy_indexdomain']);
				}else{
					$weburl=get_domain($this->config['sy_weburl']);
				}
				SetCookie("lookresume",$lookResume,time() + 86400,"/",$weburl);
				SetCookie("talentpool",$talentpool,time() + 86400,"/",$weburl);
				SetCookie("useridmsg",$useridmsg,time() + 86400,"/",$weburl);

			}else{
				SetCookie("lookresume",$lookResume,time() + 86400,"/");
				SetCookie("talentpool",$talentpool,time() + 86400,"/");
				SetCookie("useridmsg",$useridmsg,time() + 86400,"/");
			}
			
			$down=$this->obj->DB_select_all('down_resume','comid='.$this->uid.'','eid');
			foreach ($down as $v){
			    $eid[]=$v['eid'];
			}

			$this->yunset(array('lookresume'=>@explode(',',$lookResume),'talentpool'=>@explode(',',$talentpool),'useridmsg'=>@explode(',',$useridmsg),'eid'=>$eid));
		}
		 
		
		if((int)$_GET['three_cityid']){
			foreach($CacheList['city_type'] as $k=>$v){
				if(in_array((int)$_GET['three_cityid'],$v)){
					$zpthreecityid=$k;
				}
			}
			$this->yunset("zpthreecityid",$zpthreecityid);
		}elseif((int)$_GET['cityid']){
			foreach($CacheList['city_type'] as $k=>$v){
				if(in_array((int)$_GET['cityid'],$v)){
					$zpcityid=$k;
				}
			}
			$this->yunset("zpcityid",$zpcityid);
		}
		if((int)$_GET['job_post']){
			foreach($CacheList['job_type'] as $k=>$v){
				if(in_array((int)$_GET['job_post'],$v)){
					$zpjobpost=$k;
				}
			}
			$this->yunset("zpjobpost",$zpjobpost);
		}elseif((int)$_GET['job1_son']){
			foreach($CacheList['job_type'] as $k=>$v){
				if(in_array((int)$_GET['job1_son'],$v)){
					$zpjob1son=$k;
				}
			}
			$this->yunset("zpjob1son",$zpjob1son);
		}
		
        include PLUS_PATH."keyword.cache.php";
        if(is_array($keyword)){
          foreach($keyword as $k=>$v){
            if($v['type']=='5'&&$v['tuijian']=='1'){
              $resumekeyword[]=$v;
            }
          }
        }
        $this->yunset("resumekeyword",$resumekeyword);
        
		$this->seo("user_search");
		$this->yun_tpl(array('search'));
	}
	function search_action(){
		$this->usersearch();
	}

	function get_url_action(){
        global $config;
        $paramer_n['m'] = $_POST['m'];
        $paramer_n['type'] = $_POST['type'];
        $paramer_n['v'] = $_POST['v'];


        if($_POST['all']){//合并参数匹配
            $allurl=explode("_",$_POST['all']);
            $_GET['hy']=$allurl[0];
            $_GET['edu']=$allurl[1];
            $_GET['exp']=$allurl[2];
            $_GET['sex']=$allurl[3];
            $_GET['report']=$allurl[4];
            $_GET['uptime']=$allurl[5];
            $_GET['idcard']=$allurl[6];
            $_GET['work']=$allurl[7];
            $_GET['tag']=$allurl[8];
            $_GET['jobs_id']=$allurl[9];
        }
        $url = $this->searchListRewrite($paramer_n,$config);
        echo $url;exit();
    }


    function searchListRewrite($paramer,$config){
        $get = $_GET;
        if(is_array($paramer)){
            foreach($paramer as $key=>$value){
                if(!in_array($key,array('type','utype','v'))){
                    $get[$key] = $value;
                }
            }
        }

        if($paramer['type']=="job1"){
            $job=$paramer['v'];
        }elseif($paramer['type']=="job1_son" && $paramer['v']!=0){
            $job=$get['job1']."_".$paramer['v'];
        }elseif($paramer['type']=="job_post" && $paramer['v']!=0){
            $job=$get['job1']."_".$get['job1_son']."_".$paramer['v'];
        }else{
            if($get['job1']&&!$get['job1_son']&&!$get['job_post']){
                $job=$get['job1'];
            }elseif($get['job1_son']&&!$get['job_post']){
                $job=$get['job1']."_".$get['job1_son'];
            }elseif($get['job_post']){
                $job=$get['job1']."_".$get['job1_son']."_".$get['job_post'];
            }else{
                $job=0;
            }
        }

        if($paramer['type']=="jobs_id"){
            $jobs_id=$paramer['v'];
        }

        if($paramer['untype']=="job1"){
            $job=0;
        }elseif($paramer['untype']=="job1_son"){
            $job=$get['job1'];
        }elseif($paramer['untype']=="job_post"){
            $job=$get['job1']."_".$get['job1_son'];
        }

        if($paramer['t']=="index"){
            if($paramer['type']=='job1'){
                $job=$paramer['job1'];
            }elseif($paramer['type']=="job1_son"){
                $job=$paramer['job1']."_".$paramer['job1_son'];
            }elseif($paramer['type']=='job_post'){
                $job=$paramer['job1']."_".$paramer['job1_son']."_".$paramer['job_post'];
            }
        }
        if($paramer['type']=="provinceid"){
            $city=$paramer['v'];
        }elseif($paramer['type']=="cityid" && $paramer['v']!=0){
            if($paramer['searchpid']){
                $city=$paramer['searchpid']."_".$paramer['v'];
            }else{
                $city=$get['provinceid']."_".$paramer['v'];

            }
        }elseif($paramer['type']=="three_cityid" && $paramer['v']!=0){
            $city=$get['provinceid']."_".$get['cityid']."_".$paramer['v'];
        }else{
            if($get['provinceid']&&!$get['cityid']&&!$get['three_cityid']){
                $city=$get['provinceid'];
            }elseif($get['cityid']&&!$get['three_cityid']){
                $city=$get['provinceid']."_".$get['cityid'];
            }elseif($get['three_cityid']){
                $city=$get['provinceid']."_".$get['cityid']."_".$get['three_cityid'];
            }else{
                $city=0;
            }
        }
        if($paramer['untype']=="provinceid"){
            $city=0;
        }elseif($paramer['untype']=="cityid"){
            $city=$get['provinceid'];
        }elseif($paramer['untype']=="three_cityid"){
            $city=$get['provinceid']."_".$get['cityid'];
        }
        if($paramer['type']=="city"){
            $city=$paramer['v'];
        }
        if ($get['minsalary']||$get['minsalary']){
            $min=$get['minsalary']?$get['minsalary']:0;
            $max=$get['maxsalary'];
            $salary=$min.'_'.$max;
            $salary=$paramer['untype']=="salary"?0:$salary;
        }else{
            $salary=$get['salary']?$get['salary']:0;
            $salary=$paramer['untype']=="salary"?0:$salary;
        }
        $salary=$paramer['type']=="salary"?$paramer['v']:$salary;

        $hebing=array();
        $hy=$get['hy']?$get['hy']:0;
        $hy=$paramer['untype']=="hy"?0:$hy;
        $hy=$hebing[]=$paramer['type']=="hy"?$paramer['v']:$hy;

        $edu=$get['edu']?$get['edu']:0;
        $edu=$paramer['untype']=="edu"?0:$edu;
        $hebing[]=$paramer['type']=="edu"?$paramer['v']:$edu;

        $exp=$get['exp']?$get['exp']:0;
        $exp=$paramer['untype']=="exp"?0:$exp;
        $hebing[]=$paramer['type']=="exp"?$paramer['v']:$exp;

        $sex=$get['sex']?$get['sex']:0;
        $sex=$paramer['untype']=="sex"?0:$sex;
        $hebing[]=$paramer['type']=="sex"?$paramer['v']:$sex;

        $report=$get['report']?$get['report']:0;
        $report=$paramer['untype']=="report"?0:$report;
        $hebing[]=$paramer['type']=="report"?$paramer['v']:$report;

        $uptime=$get['uptime']?$get['uptime']:0;
        $uptime=$paramer['untype']=="uptime"?0:$uptime;
        $hebing[]=$paramer['type']=="uptime"?$paramer['v']:$uptime;



        if($paramer['m']=="resume"){
            $idcard=$get['idcard']?$get['idcard']:0;
            $idcard=$paramer['untype']=="idcard"?0:$idcard;
            $hebing[]=$paramer['type']=="idcard"?$paramer['v']:$idcard;
            $work=$get['work']?$get['work']:0;
            $work=$paramer['untype']=="work"?0:$work;
            $hebing[]=$paramer['type']=="work"?$paramer['v']:$work;
            $tag=$get['tag']?$get['tag']:0;
            $tag=$paramer['untype']=="tag"?0:$tag;
            $hebing[]=$paramer['type']=="tag"?$paramer['v']:$tag;

            $jobs_id=$_POST['jobs_id']?$_POST['jobs_id']:0;

            $jobs_id = explode(",",$jobs_id);
            $jobs_id1=$paramer['untype']=="jobs_id1"?0:($jobs_id[0]?$jobs_id[0]:0);
            $jobs_id2=$paramer['untype']=="jobs_id2"?0:($jobs_id[1]?$jobs_id[1]:0);
            $jobs_id3=$paramer['untype']=="jobs_id3"?0:($jobs_id[2]?$jobs_id[2]:0);
            $hebing[]=$jobs_id1;
            $hebing[]=$jobs_id2;
            $hebing[]=$jobs_id3;

        }elseif($paramer['m']=="company"){
            $mun=$get['mun']?$get['mun']:0;
            $mun=$paramer['untype']=="mun"?0:$mun;
            $mun=$paramer['type']=="mun"?$paramer['v']:$mun;

            $pr=$get['pr']?$get['pr']:0;
            $pr=$paramer['untype']=="pr"?0:$pr;
            $pr=$paramer['type']=="pr"?$paramer['v']:$pr;

            $rec=$get['rec']?$get['rec']:0;
            $rec=$paramer['untype']=="rec"?0:$rec;
            $rec=$paramer['type']=="rec"?$paramer['v']:$rec;

            $city=$get['cityid']?$get['cityid']:0;
            $city=$paramer['untype']=="cityid"?0:$city;
            $city=$paramer['type']=="cityid"?$paramer['v']:$city;
        }elseif($paramer['m']=="part"){
            $part_type=$get['part_type']?$get['part_type']:0;
            $part_type=$paramer['untype']=="part_type"?0:$part_type;
            $part_type=$paramer['type']=="part_type"?$paramer['v']:$part_type;

            $cycle=$get['cycle']?$get['cycle']:0;
            $cycle=$paramer['untype']=="cycle"?0:$cycle;
            $cycle=$paramer['type']=="cycle"?$paramer['v']:$cycle;
        }elseif($paramer['m']=="train"){
            $nid=$get['nid']?$get['nid']:0;
            $nid=$paramer['untype']=="nid"?0:$nid;
            $nid=$paramer['type']=="nid"?$paramer['v']:$nid;
            $tnid=$get['tnid']?$get['tnid']:0;
            if($get['tnid']&&$paramer['untype']=="nid"||$paramer['untype']=="tnid"){
                $tnid=0;
            }
            $tnid=$paramer['type']=="tnid"?$paramer['v']:$tnid;
            $type=$get['type']?$get['type']:0;
            $type=$paramer['untype']=="type"?0:$type;
            $type=$paramer['type']=="type"?$paramer['v']:$type;
            $sid=$get['sid']?$get['sid']:0;
            $sid=$paramer['untype']=="sid"?0:$sid;
            $sid=$paramer['type']=="sid"?$paramer['v']:$sid;

            $mun=$get['mun']?$get['mun']:0;
            $mun=$paramer['untype']=="mun"?0:$mun;
            $mun=$paramer['type']=="mun"?$paramer['v']:$mun;

            $pr=$get['pr']?$get['pr']:0;
            $pr=$paramer['untype']=="pr"?0:$pr;
            $pr=$paramer['type']=="pr"?$paramer['v']:$pr;
        }else{
            $cert=$get['cert']?$get['cert']:0;
            $cert=$paramer['untype']=="cert"?0:$cert;
            $cert=$paramer['type']=="cert"?$paramer['v']:$cert;
            if($cert==0){
                $certd='';
                $cert='-0';
            }else{
                $certd="&cert=".$cert;
                $cert="-".$cert;
            }
        }

        $keyword=$get['keyword']?$get['keyword']:0;
        $keyword=$paramer['untype']=="keyword"?0:$keyword;
        $keyword=$paramer['type']=="keyword"?$paramer['v']:$keyword;
        $keyword=urlencode($keyword);

        $hebing=implode("_",$hebing);

        $tp=$get['tp']?$get['tp']:0;
        $tp=$paramer['type']=="tp"?$paramer['v']:$tp;

        $order=$get['order']?$get['order']:0;
        $order=$paramer['type']=="order"?$paramer['v']:$order;

        $page = $get['page']?$get['page']:1;
        $page =$paramer['page']?$paramer['page']:$page;

        if($config['sy_seo_rewrite']==1){
            if ($keyword){
                $url="list/".$job."-".$city."-".$salary."-".$hebing."-".$tp.$cert."-".$order."-".$page.".html?".$keyword;
            }else{
                $url="list/".$job."-".$city."-".$salary."-".$hebing."-".$tp.$cert."-".$order."-".$page.".html";
            }
        }else{
            if($job)
                $url[]='job='.$job;
            if($city)
                $url[]='city='.$city;
            if($salary)
                $url[]='salary='.$salary;
            if($order)
                $url[]='order='.$order;
            if($keyword)
                $url[]='keyword='.$keyword;

            if($config['sy_default_comclass']=='1'&&!$paramer['m']){
                $sdc="c=search&";
            }elseif ($config['sy_default_userclass']=='1'&&$paramer['m']=='resume'){
                $sdc="c=search&";
            }
            if(!empty($url)){
                $url="index.php?".$sdc.implode('&',$url)."&all=".$hebing."&tp=".$tp.$certd;
            }else{
                $url="index.php?".$sdc."all=".$hebing."&tp=".$tp.$certd;
            }
            if($page){
                $url .='&page='.$page;
            }
        }
        if($paramer['m']=="company"){
            if($config['sy_seo_rewrite']==1){
                $url="list/".$city."-".$mun."-".$hy."-".$pr."-".$rec."-".$keyword."-".$page.".html";
            }else{
                if($city)
                    $urln[]='cityid='.$city;

                if($mun)
                    $urln[]='mun='.$mun;

                if($hy)
                    $urln[]='hy='.$hy;

                if($pr)
                    $urln[]='pr='.$pr;

                if($rec)
                    $urln[]='rec='.$rec;

                if($keyword)
                    $urln[]='keyword='.$keyword;

                if($page){
                    $urln[]='page='.$page;
                }
                if(!empty($urln)){
                    $url="index.php?".implode('&',$urln);
                }

            }
        }
        if($paramer['m']=="part"){
            if($config['sy_seo_rewrite']==1){
                if ($keyword){
                    $url="list/".$city."-".$part_type."-".$cycle."-".$order."-".$page.".html?".$keyword;
                }else{
                    $url="list/".$city."-".$part_type."-".$cycle."-".$order."-".$page.".html";
                }
            }else{
                if($city)
                    $urln[]='city='.$city;

                if($part_type)
                    $urln[]='part_type='.$part_type;

                if($cycle)
                    $urln[]='cycle='.$cycle;

                if($order)
                    $urln[]='order='.$order;

                if($keyword)
                    $urln[]='keyword='.$keyword;

                if($page){
                    $urln[]='page='.$page;
                }
                if(!empty($urln)){
                    $url="index.php?".implode('&',$urln);
                }

            }
        }
        if($paramer['m']=="train"){
            if($city)
                $urln[]='city='.$city;
            if($hy)
                $urln[]='hy='.$hy;
            if($mun)
                $urln[]='mun='.$mun;

            if($pr)
                $urln[]='pr='.$pr;
            if($nid)
                $urln[]='nid='.$nid;
            if($tnid)
                $urln[]='tnid='.$tnid;
            if($sid)
                $urln[]='sid='.$sid;

            if($type)
                $urln[]='type='.$type;
            if($order)
                $urln[]='order='.$order;

            if($keyword)
                $urln[]='keyword='.$keyword;

            if($page){
                $urln[]='page='.$page;
            }
            if(!empty($urln)){
                $url="index.php?c=".$paramer['c']."&".implode('&',$urln);
            }
        }
        $m=$paramer['m']?$paramer['m']:"job";
        unset($paramer);
        return $config['sy_weburl'].'/'.$m.'/'.$url;
    }

	function index_action(){
	    if($this->usertype==2){
	        $finder = $this->obj->DB_select_all("finder","uid=".$this->uid);
	       
	        $this->yunset("finders",$finder);
	        $this->yunset("js_def",8);
        }
	    if($this->config['com_search']==1){
            if(($this->uid==''||$this->username=='')&&$this->config['sy_resume_visitors']>0){ 
        		if($_COOKIE['resumevisitors']>=$this->config['sy_resume_visitors']){
        			$this->ACT_msg($this->config['sy_weburl'],"请登录后继续访问！");
        		}else{
        			if ($_COOKIE['resumevisitors']==''){
        				$resumevisitors=1;
        			}else{
        				$resumevisitors=$_COOKIE['resumevisitors']+1;
        			}
        			if($this->config['sy_web_site']=="1"){
        				if($this->config['sy_onedomain']!=""){
        					$weburl=get_domain($this->config['sy_onedomain']);
        				}else{
        					$weburl=get_domain($this->config['sy_weburl']);
        				}
        				SetCookie("resumevisitors",$resumevisitors,time()+86400, "/",$weburl);
        			}else{
        				SetCookie("resumevisitors",$resumevisitors,time()+86400,"/");
        			}
        		}
        	}
	    }
		if($this->config['sy_default_userclass']=='1'){
	        if($this->config['sy_resumedir']!=""){
				$resumeclassurl=$this->config['sy_weburl']."/resume/?c=search&";
			}else{
				$resumeclassurl=$this->config['sy_weburl']."/index.php?m=resume&c=search&";
			}
			$this->yunset("resumeclassurl",$resumeclassurl);
			$CacheM=$this->MODEL('cache');
            $CacheList=$CacheM->GetCache(array('job','city','hy'));
            $this->yunset($CacheList);
			$this->yunset(array('gettype'=>$_SERVER["QUERY_STRING"],'getinfo'=>$_GET));
			$this->seo("user");

			$this->yun_tpl(array('index'));
		}else{
			$this->usersearch();
		}
	}

}
?>