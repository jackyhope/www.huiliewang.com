<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-09 11:02:05
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/job/search.htm" */ ?>
<?php /*%%SmartyHeaderCode:12365512605bbc1a2dd35ff2-01262888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6c2583ef42812bbae5391fc8e5e42ab22bf73cc' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/job/search.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12365512605bbc1a2dd35ff2-01262888',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'config' => 0,
    'finder' => 0,
    'key' => 0,
    'v' => 0,
    'uid' => 0,
    'usertype' => 0,
    'paras' => 0,
    'finders' => 0,
    'li' => 0,
    'job_index' => 0,
    'job_name' => 0,
    'job_type' => 0,
    'city_name' => 0,
    'city_type' => 0,
    'tid' => 0,
    'city_index' => 0,
    'pid' => 0,
    'cid' => 0,
    'industry_name' => 0,
    'industry_index' => 0,
    'comclass_name' => 0,
    'comdata' => 0,
    'arr_data1' => 0,
    'arr_data' => 0,
    'j' => 0,
    'uptime' => 0,
    'sdate' => 0,
    'keylist' => 0,
    'total' => 0,
    'pagenum' => 0,
    'zd_list' => 0,
    'lookjob' => 0,
    'waflist' => 0,
    'useridjob' => 0,
    'favjob' => 0,
    'job_list' => 0,
    'pagenav' => 0,
    'klist' => 0,
    'blist' => 0,
    'com' => 0,
    'zpthreecityid' => 0,
    'zpcityid' => 0,
    'zpjobpost' => 0,
    'zpjob1son' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbc1a2e469439_47894774',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbc1a2e469439_47894774')) {function content_5bbc1a2e469439_47894774($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_function_listurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.listurl.php';
?><?php global $db,$db_config,$config;
		$time = time();
		
	
	
        eval('$paramer=array("namelen"=>"30","comlen"=>"30","report"=>"\'auto.report\'","hy"=>"\'auto.hy\'","job1"=>"\'auto.job1\'","job1_son"=>"\'auto.job1_son\'","job_post"=>"\'auto.job_post\'","jobids"=>"\'auto.jobids\'","pr"=>"\'auto.pr\'","mun"=>"\'auto.mun\'","provinceid"=>"\'auto.provinceid\'","cityid"=>"\'auto.cityid\'","three_cityid"=>"\'auto.three_cityid\'","type"=>"\'auto.type\'","edu"=>"\'auto.edu\'","exp"=>"\'auto.exp\'","sex"=>"\'auto.sex\'","minsalary"=>"\'auto.minsalary\'","maxsalary"=>"\'auto.maxsalary\'","keyword"=>"\'auto.keyword\'","cert"=>"\'auto.cert\'","urgent"=>"\'auto.urgent\'","bid"=>"1","uptime"=>"\'auto.uptime\'","key"=>"\'key\'","limit"=>"5","item"=>"\'zd_list\'","name"=>"\'zdlist1\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
        $Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		include_once  PLUS_PATH."/comrating.cache.php";
		include(CONFIG_PATH."db.data.php"); 
		if($config[sy_web_site]=="1"){
			if($config[province]>0 && $config[province]!=""){
				$paramer[provinceid] = $config[province];
			}
			if($config[cityid]>0 && $config[cityid]!=""){
				$paramer[cityid] = $config[cityid];
			}
			if($config[three_cityid]>0 && $config[three_cityid]!=""){
				$paramer[three_cityid] = $config[three_cityid];
			}
			if($config[hyclass]>0 && $config[hyclass]!=""){
				$paramer[hy]=$config[hyclass];
			}
		}
		if($paramer[sdate]){
			$where = "`sdate`>".strtotime("-".intval($paramer[sdate])." day",time())." and `edate`>'$time' and `state`=1";
		}else{
			$where = "`state`=1 and `edate`>'$time'";
		}
        
		
		if($paramer[uid]){
			$where .= " AND `uid` = '$paramer[uid]'";
		}
		
		
		
		if($paramer[identity]){
			$where .= " AND `identity`=".$paramer[identity];
		}
		

		if($paramer[rec]){
			$recRating = array();
		
			if($comrat){
				foreach($comrat as $value){
					if($value[display]=='1' && $value[category]=='1' && $value[jobrec]=='2'){
						$recRating[] = $value['id'];
					}
				}
			}
			if(!empty($recRating)){
				$recRaringId = implode(',',$recRating);
				
				$where.=" AND (`rating` IN (".$recRaringId.") OR `rec_time`>=".time().")";

			}else{
				$where.=" AND `rec_time`>=".time();
			}
		}
		
		if($paramer['cert']){
			$job_uid=array();
			$company=$db->select_all("company","`yyzz_status`=1","`uid`");
			if(is_array($company)){
				foreach($company as $v){
					$job_uid[]=$v['uid'];
				}
			}
			$where.=" and `uid` in (".@implode(",",$job_uid).")";
		}
		
		if($paramer[noid]){
			$where.= " and `id`<>$paramer[noid]";
		}
		
		if($paramer[r_status]){
			$where.= " and `r_status`=2";
		}else{
			$where.= " and `r_status`<>2";
		}
		
		if($paramer[status]){
			$where.= " and `status`=1";
		}else{
			$where.= " and `status`<>1";
		}
		
		if($paramer[pr]){
			$where .= " AND `pr` =$paramer[pr]";
		}
		
		if($paramer['hy']){
			$where .= " AND `hy` = $paramer[hy]";
		} 
		
		if($paramer[mun]){
			$where .= " AND `mun` = $paramer[mun]";
		}
		
		if($paramer[job1]){
			$where .= " AND `job1` = $paramer[job1]";
		}
		
		if($paramer[job1_son]){
			$where .= " AND `job1_son` = $paramer[job1_son]";
		}
		
		if($paramer[job_post]){
			$where .= " AND (`job_post` IN ($paramer[job_post]))";
		}
		
		if($paramer['jobwhere']){
			$where .=" and ".$paramer['jobwhere'];
		}
		
		if($paramer['jobids']){
			$where.= " AND (`job1` = $paramer[jobids] OR `job1_son`=$paramer[jobids] OR `job_post`=$paramer[jobids])";
		}
		
		if($paramer['jobin']){
			$where .= " AND (`job1` IN ($paramer[jobin]) OR `job1_son` IN ($paramer[jobin]) OR `job_post` IN ($paramer[jobin]))";
		}
		
		if($paramer[provinceid]){
			$where .= " AND `provinceid` = $paramer[provinceid]";
		}
		
		if($paramer['cityid']){
			$where .= " AND (`cityid` IN ($paramer[cityid]))";
		}
		
		if($paramer['three_cityid']){
			$where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
		}
		if($paramer['cityin']){
			$where .= " AND `three_cityid` IN ($paramer[cityin])";
		}
		
		if($paramer[edu]){
			$where .= " AND `edu` = $paramer[edu]";
		}
		
		if($paramer[exp]){
			$where .= " AND `exp` = $paramer[exp]";
		}
		
		if($paramer[report]){
			$where .= " AND `report` = $paramer[report]";
		}
		
		if($paramer[type]){
			$where .= " AND `type` = $paramer[type]";
		}
		
		if($paramer[sex]){
			$where .= " AND `sex` = $paramer[sex]";
		}
		if($paramer[minsalary]&&$paramer[maxsalary]){
			$where.= " AND ((`minsalary`<=".intval($paramer[minsalary]*10000/12)." and `maxsalary`>=".intval($paramer[minsalary]*10000/12).") 
						or (`minsalary`<=".intval($paramer[maxsalary])." and `maxsalary`>=".intval($paramer[maxsalary])."))";
    	}elseif($paramer[minsalary]&&!$paramer[maxsalary]){
			$where.= " AND ((`minsalary`<=".intval($paramer[minsalary]*10000/12)." and `maxsalary`>=".intval($paramer[minsalary]*10000/12).") 
						or (`minsalary`>=".intval($paramer[minsalary]*10000/12)." and `maxsalary`>=".intval($paramer[minsalary]*10000/12).") 
						or (`minsalary`!=0 and  `maxsalary`=0))";
		}elseif(!$paramer[minsalary]&&$paramer[maxsalary]){
			$where.= " AND ((`minsalary`<=".intval($paramer[maxsalary]*10000/12)." and `maxsalary`>=".intval($paramer[maxsalary]*10000/12).") 
						or (`minsalary`<=".intval($paramer[maxsalary]*10000/12)." and `maxsalary`<=".intval($paramer[maxsalary]*10000/12).") 
						or (`minsalary`<=".intval($paramer[maxsalary]*10000/12)." and maxsalary=0) 
						or (`minsalary`=0 and  `maxsalary`!=0)
						)";
			
		}
		
		if($paramer[cityin]){
			$where .= " AND (`provinceid` IN ($paramer[cityin]) OR `cityid` IN ($paramer[cityin]) OR `three_cityid` IN ($paramer[cityin]))";
		}
		
		if($paramer[urgent]){
			$where.=" AND `urgent_time`>".time();
		}
		
		if($paramer[uptime]){
			if($paramer[uptime]==1){
				 $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
                $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==3){
				$beginToday=mktime(0,0,0,date('m'),date('d')-2,date('Y'));
                $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==7){
				 $beginToday=mktime(0,0,0,date('m'),date('d')-6,date('Y'));
                $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==30){
				 $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
                $endToday=mktime(0,0,0,date('m')+1,date('d'),date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==90){
				 $beginToday=mktime(0,0,0,date('m')-2,date('d'),date('Y'));
                $endToday=mktime(0,0,0,date('m')+1,date('d'),date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}
		}
		
		if($paramer[comname]){
			$where.=" AND `com_name` LIKE '%".$paramer[comname]."%'";
		}
		
		if($paramer[com_pro]){
			$where.=" AND `com_provinceid` ='".$paramer[com_pro]."'";
		}
		
		if($paramer[keyword]){
			$where1[]="`name` LIKE '%".$paramer[keyword]."%'";
			$where1[]="`com_name` LIKE '%".$paramer[keyword]."%'";
			include  PLUS_PATH."/city.cache.php";
			foreach($city_name as $k=>$v){
				if(strpos($v,$paramer[keyword])!==false){
					$cityid[]=$k;
				}
			}
			if(is_array($cityid)){
				foreach($cityid as $value){
					$class[]= "(provinceid = '".$value."' or cityid = '".$value."')";
				}
				$where1[]=@implode(" or ",$class);
			}
			$where.=" AND (".@implode(" or ",$where1).")";
		}
		
		if($paramer[job_name]){
		    $where .=" and `name` LIKE '%".$paramer[job_name]."%'";
		}
		
		if($paramer[com_name]){
		    $where .=" and `com_name` LIKE '%".$paramer[com_name]."%'";
		}
		
		
		
		if($paramer["job"]){
			$where.=" AND `job_post` in ($paramer[job])";
		}
		
		if($paramer[bid]){
			$where.="  and `xsdate`>'".time()."'";
		} 
		
		if($paramer[noids]==1 && !empty($noids)){
			$where.=" AND `id` NOT IN (".@implode(',',$noids).")";
		}
		
		if($paramer[job_id]){
		    $where.="  and id=".$paramer[job_id];
		}
		
		
		if($paramer[w]==1){
		    $job_ids = $db->select_all("fav_job","uid=".$_COOKIE['uid'],"job_id");
		    $ids = "";
		    foreach($job_ids as $li){
		        $ids[] = $li[job_id];
		    }
		    $ids = implode(",",$ids);
		    $where.="  and id in(".$ids.")";
		}elseif($paramer[w]==2){
		    $job_ids = $db->select_all("userid_job","identity=3 and uid=".$_COOKIE['uid'],"job_id");
		    $ids = "";
		    foreach($job_ids as $li){
		        $ids[] = $li[job_id];
		    }
		    $ids = implode(",",$ids);
		    $where.="  and id in(".$ids.")";
		   
		}
		
		if($paramer[where]){
			$where = $paramer[where];
		}

	
		if($paramer[limit]){
			$limit = " limit ".$paramer[limit];
		}

		if($paramer[ispage]){
		   
			$limit = PageNav($paramer,$_GET,"company_job",$where,$Purl,"",$paramer[islt]?$paramer[islt]:"6",$_smarty_tpl);
          
		} 
		
		if($paramer[order] && $paramer[order]!="lastdate"){
			$order = " ORDER BY ".str_replace("'","",$paramer[order])."  ";
		}else{
		    if($paramer[orderby]=="salary"){
                $order = " ORDER BY minsalary ";
            }elseif($paramer[orderby]=="time"){
                $order = " ORDER BY `lastupdate` ";
            }else{
			    $order = " ORDER BY `lastupdate` ";            
            }
		}
		
		
		
		
		
		if($paramer[sort]){
			$sort = $paramer[sort];
		}else{
			$sort = " DESC";
		} 
		$where.=$order.$sort;  

		$zd_list = $db->select_all("company_job",$where.$limit);

		if(is_array($zd_list)){
			
			$cache_array = $db->cacheget();
			$comuid=$jobid=array();
			foreach($zd_list as $key=>$value){
				if(in_array($value['uid'],$comuid)==false){$comuid[] = $value['uid'];}
				if(in_array($value['id'],$jobid)==false){$jobid[] = $value['id'];} 
			}
			$comuids = @implode(',',$comuid);
			$jobids = @implode(',',$jobid);
			
			
			if($comuids){
				$r_uids=$db->select_all("company","`uid` IN (".$comuids.")","`uid`,`yyzz_status`,`logo`,`pr`,`hy`,`mun`");
				if(is_array($r_uids)){
					foreach($r_uids as $key=>$value){
						if(!$value['logo'] ){
							$value['logo'] = $config['sy_weburl']."/".$config['sy_unit_icon'];
						}else{
							$value['logo']= $config['sy_weburl']."/".$value['logo'];
						}
						$value['pr_n'] = $cache_array['comclass_name'][$value[pr]];
						$value['hy_n'] = $cache_array['industry_name'][$value[hy]];
						$value['mun_n'] = $cache_array['comclass_name'][$value[mun]];
						$r_uid[$value['uid']] = $value;
					   
					}
				}
			}
			    
			
			$noids=array();
			foreach($zd_list as $key=>$value){
				if($paramer[bid]){
					$noids[] = $value[id];
				}
				
				
				$zd_list[$key] = $db->array_action($value,$cache_array);
				$zd_list[$key][stime] = date("Y-m-d",$value[sdate]);
				$zd_list[$key][etime] = date("Y-m-d",$value[edate]);
				
				 $login = $db->DB_select_once("member","uid=".$value[uid],"login_date");
               
                $zd_list[$key][login_date] = $login[login_date];
				
				
				if($arr_data['sex'][$value['sex']]){
    				$zd_list[$key][sex_n]=$arr_data['sex'][$value['sex']];
    			}
				$zd_list[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);
				if($value[minsalary]&&$value[maxsalary]){
					$zd_list[$key][job_salary] =$value[minsalary]."-".$value[maxsalary];
				}elseif($value[minsalary]){
					$zd_list[$key][job_salary] =$value[minsalary]."以上";
				}else{
                    $zd_list[$key][job_salary] ="面议";
                }
				
				if($value[identity]==3){
				 $fake_company=$db->DB_select_once("fake_company","id=".$value['fake_id']);
                    $zd_list[$key][pr_n] =$fake_company[nature];
                    $zd_list[$key][hy_n] =$fake_company[hy];
                    $zd_list[$key][mun_n] =$fake_company[scale];
				}else{
                    $zd_list[$key][yyzz_status] =$r_uid[$value['uid']][yyzz_status];
                    $zd_list[$key][logo] =$r_uid[$value['uid']][logo];
                   
                    $zd_list[$key][pr_n] =$r_uid[$value['uid']][pr_n];
                    $zd_list[$key][hy_n] =$r_uid[$value['uid']][hy_n];
                    $zd_list[$key][mun_n] =$r_uid[$value['uid']][mun_n];
                    
				}
				
				$time=$value['lastupdate'];
				
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
			
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$zd_list[$key]['time'] ="一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$zd_list[$key]['time'] ="昨天";
				}elseif($time>$beginToday){	
					$zd_list[$key]['time'] = date("H:i",$value['lastupdate']);
					$zd_list[$key]['redtime'] =1;
				}else{
					$zd_list[$key]['time'] = date("Y-m-d",$value['lastupdate']);
				}
				
				if(is_array($zd_list[$key]['welfare'])&&$zd_list[$key]['welfare']){
					foreach($zd_list[$key]['welfare'] as $val){
						$zd_list[$key]['welfarename'][]=$cache_array['comclass_name'][$val];
					}

				}
			
				if($paramer[comlen]){
					$zd_list[$key][com_n] = mb_substr($value['com_name'],0,$paramer[comlen],"GBK");
				}
			    $zd_list[$key][lietou_num] = $db->select_num("userid_job","identity=3 and job_id=".$value['id']." group by uid");
			    $zd_list[$key][lietou_num] = $zd_list[$key][lietou_num]?$zd_list[$key][lietou_num]:0;
                $zd_list[$key][resume_num] = $db->select_num("userid_job","identity=3 and job_id=".$value['id']);
                $zd_list[$key][resume_num] = $zd_list[$key][resume_num]?$zd_list[$key][resume_num]:0;
                $zd_list[$key][view_num] = $db->select_num("userid_job","identity=3 and is_browse=2 and job_id=".$value['id']);
                $zd_list[$key][download_num] = $db->select_num("userid_job","identity=3 and is_browse=6 and job_id=".$value['id']);
                $zd_list[$key][refuse_num] = $db->select_num("userid_job","identity=3 and is_browse=4 and job_id=".$value['id']);
                
                
                  $zd_list[$key][fav_job]= $db->select_num("fav_job","uid=".$_COOKIE['uid']." and job_id=".$value['id']);
               
               
                $zd_list[$key][myresume_num] = $db->select_num("userid_job","identity=3 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $zd_list[$key][myresume_num] = $zd_list[$key][myresume_num]?$zd_list[$key][myresume_num]:0;
                $zd_list[$key][myview_num] = $db->select_num("userid_job","identity=3 and is_browse=2 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $zd_list[$key][mydownload_num] = $db->select_num("userid_job","identity=3 and is_browse=6 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $zd_list[$key][myrefuse_num] = $db->select_num("userid_job","identity=3 and is_browse=4 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                
                if($paramer[eid]){
				    $recommend = $db->select_num("userid_job","job_id=".$value['id']." and eid=".$paramer[eid]);
				   
				    if($recommend){
				    
				        $recommend1 = $db->select_num("userid_job","job_id=".$value['id']." and eid=".$paramer[eid]." and uid=".$_COOKIE['uid']);
				        if($recommend1){
				            $zd_list[$key][recommend] = 1;
				        }else{
				            $zd_list[$key][recommend] = 2;
				        }
				    }else{
                        $zd_list[$key][recommend] = 0;
				    }
				  
				}
                
				if($paramer[namelen]){
					if($value['rec_time']>time()){
						$zd_list[$key][name_n] = "<font color='red'>".mb_substr($value['name'],0,$paramer[namelen],"GBK")."</font>";
					}else{
						$zd_list[$key][name_n] = mb_substr($value['name'],0,$paramer[namelen],"GBK");
					}
				}else{
					if($value['rec_time']>time()){
						$zd_list[$key]['name_n'] = "<font color='red'>".$value['name']."</font>";
					}
				}
				
				$zd_list[$key][job_url] = Url("job",array("c"=>"comapply","id"=>$value[id]),"1");
				
				$zd_list[$key][com_url] = Url("company",array("c"=>"show","id"=>$value[uid]));
				foreach($comrat as $k=>$v){
					if($value[rating]==$v[id]){
						$zd_list[$key][color] = str_replace("#","",$v[com_color]);
						$zd_list[$key][ratlogo] = $v[com_pic];
						$zd_list[$key][ratname] = $v[name];
					}
				}
				if($paramer[keyword]){
					$zd_list[$key][name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[name]);
					$zd_list[$key][com_name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[com_name]);
					$zd_list[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$zd_list[$key][name_n]);
					$zd_list[$key][com_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$zd_list[$key][com_n]);
					$zd_list[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
					$zd_list[$key][job_city_two]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[cityid]]);
    			}
			}

			if(is_array($zd_list)){
				if($paramer[keyword]!=""&&!empty($zd_list)){
					addkeywords('3',$paramer[keyword]);
				}
			}
		} ?>
<?php global $db,$db_config,$config;
		$time = time();
		
	
	
        eval('$paramer=array("noids"=>"1","namelen"=>"30","comlen"=>"30","ispage"=>"1","report"=>"\'auto.report\'","rec"=>"\'auto.rec\'","hy"=>"\'auto.hy\'","job1"=>"\'auto.job1\'","job1_son"=>"\'auto.job1_son\'","job_post"=>"\'auto.job_post\'","jobids"=>"\'auto.jobids\'","pr"=>"\'auto.pr\'","mun"=>"\'auto.mun\'","provinceid"=>"\'auto.provinceid\'","cityid"=>"\'auto.cityid\'","ltype"=>"\'auto.ltype\'","three_cityid"=>"\'auto.three_cityid\'","type"=>"\'auto.type\'","edu"=>"\'auto.edu\'","exp"=>"\'auto.exp\'","sex"=>"\'auto.sex\'","minsalary"=>"\'auto.minsalary\'","maxsalary"=>"\'auto.maxsalary\'","keyword"=>"\'auto.keyword\'","key"=>"\'key\'","sdate"=>"\'auto.sdate\'","cert"=>"\'auto.cert\'","urgent"=>"\'auto.urgent\'","uptime"=>"\'auto.uptime\'","order"=>"\'auto.order\'","limit"=>"20","item"=>"\'job_list\'","name"=>"\'joblist1\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
        $Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		include_once  PLUS_PATH."/comrating.cache.php";
		include(CONFIG_PATH."db.data.php"); 
		if($config[sy_web_site]=="1"){
			if($config[province]>0 && $config[province]!=""){
				$paramer[provinceid] = $config[province];
			}
			if($config[cityid]>0 && $config[cityid]!=""){
				$paramer[cityid] = $config[cityid];
			}
			if($config[three_cityid]>0 && $config[three_cityid]!=""){
				$paramer[three_cityid] = $config[three_cityid];
			}
			if($config[hyclass]>0 && $config[hyclass]!=""){
				$paramer[hy]=$config[hyclass];
			}
		}
		if($paramer[sdate]){
			$where = "`sdate`>".strtotime("-".intval($paramer[sdate])." day",time())." and `edate`>'$time' and `state`=1";
		}else{
			$where = "`state`=1 and `edate`>'$time'";
		}
        
		
		if($paramer[uid]){
			$where .= " AND `uid` = '$paramer[uid]'";
		}
		
		
		
		if($paramer[identity]){
			$where .= " AND `identity`=".$paramer[identity];
		}
		

		if($paramer[rec]){
			$recRating = array();
		
			if($comrat){
				foreach($comrat as $value){
					if($value[display]=='1' && $value[category]=='1' && $value[jobrec]=='2'){
						$recRating[] = $value['id'];
					}
				}
			}
			if(!empty($recRating)){
				$recRaringId = implode(',',$recRating);
				
				$where.=" AND (`rating` IN (".$recRaringId.") OR `rec_time`>=".time().")";

			}else{
				$where.=" AND `rec_time`>=".time();
			}
		}
		
		if($paramer['cert']){
			$job_uid=array();
			$company=$db->select_all("company","`yyzz_status`=1","`uid`");
			if(is_array($company)){
				foreach($company as $v){
					$job_uid[]=$v['uid'];
				}
			}
			$where.=" and `uid` in (".@implode(",",$job_uid).")";
		}
		
		if($paramer[noid]){
			$where.= " and `id`<>$paramer[noid]";
		}
		
		if($paramer[r_status]){
			$where.= " and `r_status`=2";
		}else{
			$where.= " and `r_status`<>2";
		}
		
		if($paramer[status]){
			$where.= " and `status`=1";
		}else{
			$where.= " and `status`<>1";
		}
		
		if($paramer[pr]){
			$where .= " AND `pr` =$paramer[pr]";
		}
		
		if($paramer['hy']){
			$where .= " AND `hy` = $paramer[hy]";
		} 
		
		if($paramer[mun]){
			$where .= " AND `mun` = $paramer[mun]";
		}
		
		if($paramer[job1]){
			$where .= " AND `job1` = $paramer[job1]";
		}
		
		if($paramer[job1_son]){
			$where .= " AND `job1_son` = $paramer[job1_son]";
		}
		
		if($paramer[job_post]){
			$where .= " AND (`job_post` IN ($paramer[job_post]))";
		}
		
		if($paramer['jobwhere']){
			$where .=" and ".$paramer['jobwhere'];
		}
		
		if($paramer['jobids']){
			$where.= " AND (`job1` = $paramer[jobids] OR `job1_son`=$paramer[jobids] OR `job_post`=$paramer[jobids])";
		}
		
		if($paramer['jobin']){
			$where .= " AND (`job1` IN ($paramer[jobin]) OR `job1_son` IN ($paramer[jobin]) OR `job_post` IN ($paramer[jobin]))";
		}
		
		if($paramer[provinceid]){
			$where .= " AND `provinceid` = $paramer[provinceid]";
		}
		
		if($paramer['cityid']){
			$where .= " AND (`cityid` IN ($paramer[cityid]))";
		}
		
		if($paramer['three_cityid']){
			$where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
		}
		if($paramer['cityin']){
			$where .= " AND `three_cityid` IN ($paramer[cityin])";
		}
		
		if($paramer[edu]){
			$where .= " AND `edu` = $paramer[edu]";
		}
		
		if($paramer[exp]){
			$where .= " AND `exp` = $paramer[exp]";
		}
		
		if($paramer[report]){
			$where .= " AND `report` = $paramer[report]";
		}
		
		if($paramer[type]){
			$where .= " AND `type` = $paramer[type]";
		}
		
		if($paramer[sex]){
			$where .= " AND `sex` = $paramer[sex]";
		}
		if($paramer[minsalary]&&$paramer[maxsalary]){
			$where.= " AND ((`minsalary`<=".intval($paramer[minsalary]*10000/12)." and `maxsalary`>=".intval($paramer[minsalary]*10000/12).") 
						or (`minsalary`<=".intval($paramer[maxsalary])." and `maxsalary`>=".intval($paramer[maxsalary])."))";
    	}elseif($paramer[minsalary]&&!$paramer[maxsalary]){
			$where.= " AND ((`minsalary`<=".intval($paramer[minsalary]*10000/12)." and `maxsalary`>=".intval($paramer[minsalary]*10000/12).") 
						or (`minsalary`>=".intval($paramer[minsalary]*10000/12)." and `maxsalary`>=".intval($paramer[minsalary]*10000/12).") 
						or (`minsalary`!=0 and  `maxsalary`=0))";
		}elseif(!$paramer[minsalary]&&$paramer[maxsalary]){
			$where.= " AND ((`minsalary`<=".intval($paramer[maxsalary]*10000/12)." and `maxsalary`>=".intval($paramer[maxsalary]*10000/12).") 
						or (`minsalary`<=".intval($paramer[maxsalary]*10000/12)." and `maxsalary`<=".intval($paramer[maxsalary]*10000/12).") 
						or (`minsalary`<=".intval($paramer[maxsalary]*10000/12)." and maxsalary=0) 
						or (`minsalary`=0 and  `maxsalary`!=0)
						)";
			
		}
		
		if($paramer[cityin]){
			$where .= " AND (`provinceid` IN ($paramer[cityin]) OR `cityid` IN ($paramer[cityin]) OR `three_cityid` IN ($paramer[cityin]))";
		}
		
		if($paramer[urgent]){
			$where.=" AND `urgent_time`>".time();
		}
		
		if($paramer[uptime]){
			if($paramer[uptime]==1){
				 $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
                $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==3){
				$beginToday=mktime(0,0,0,date('m'),date('d')-2,date('Y'));
                $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==7){
				 $beginToday=mktime(0,0,0,date('m'),date('d')-6,date('Y'));
                $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==30){
				 $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
                $endToday=mktime(0,0,0,date('m')+1,date('d'),date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==90){
				 $beginToday=mktime(0,0,0,date('m')-2,date('d'),date('Y'));
                $endToday=mktime(0,0,0,date('m')+1,date('d'),date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}
		}
		
		if($paramer[comname]){
			$where.=" AND `com_name` LIKE '%".$paramer[comname]."%'";
		}
		
		if($paramer[com_pro]){
			$where.=" AND `com_provinceid` ='".$paramer[com_pro]."'";
		}
		
		if($paramer[keyword]){
			$where1[]="`name` LIKE '%".$paramer[keyword]."%'";
			$where1[]="`com_name` LIKE '%".$paramer[keyword]."%'";
			include  PLUS_PATH."/city.cache.php";
			foreach($city_name as $k=>$v){
				if(strpos($v,$paramer[keyword])!==false){
					$cityid[]=$k;
				}
			}
			if(is_array($cityid)){
				foreach($cityid as $value){
					$class[]= "(provinceid = '".$value."' or cityid = '".$value."')";
				}
				$where1[]=@implode(" or ",$class);
			}
			$where.=" AND (".@implode(" or ",$where1).")";
		}
		
		if($paramer[job_name]){
		    $where .=" and `name` LIKE '%".$paramer[job_name]."%'";
		}
		
		if($paramer[com_name]){
		    $where .=" and `com_name` LIKE '%".$paramer[com_name]."%'";
		}
		
		
		
		if($paramer["job"]){
			$where.=" AND `job_post` in ($paramer[job])";
		}
		
		if($paramer[bid]){
			$where.="  and `xsdate`>'".time()."'";
		} 
		
		if($paramer[noids]==1 && !empty($noids)){
			$where.=" AND `id` NOT IN (".@implode(',',$noids).")";
		}
		
		if($paramer[job_id]){
		    $where.="  and id=".$paramer[job_id];
		}
		
		
		if($paramer[w]==1){
		    $job_ids = $db->select_all("fav_job","uid=".$_COOKIE['uid'],"job_id");
		    $ids = "";
		    foreach($job_ids as $li){
		        $ids[] = $li[job_id];
		    }
		    $ids = implode(",",$ids);
		    $where.="  and id in(".$ids.")";
		}elseif($paramer[w]==2){
		    $job_ids = $db->select_all("userid_job","identity=3 and uid=".$_COOKIE['uid'],"job_id");
		    $ids = "";
		    foreach($job_ids as $li){
		        $ids[] = $li[job_id];
		    }
		    $ids = implode(",",$ids);
		    $where.="  and id in(".$ids.")";
		   
		}
		
		if($paramer[where]){
			$where = $paramer[where];
		}

	
		if($paramer[limit]){
			$limit = " limit ".$paramer[limit];
		}

		if($paramer[ispage]){
		   
			$limit = PageNav($paramer,$_GET,"company_job",$where,$Purl,"",$paramer[islt]?$paramer[islt]:"6",$_smarty_tpl);
          
		} 
		
		if($paramer[order] && $paramer[order]!="lastdate"){
			$order = " ORDER BY ".str_replace("'","",$paramer[order])."  ";
		}else{
		    if($paramer[orderby]=="salary"){
                $order = " ORDER BY minsalary ";
            }elseif($paramer[orderby]=="time"){
                $order = " ORDER BY `lastupdate` ";
            }else{
			    $order = " ORDER BY `lastupdate` ";            
            }
		}
		
		
		
		
		
		if($paramer[sort]){
			$sort = $paramer[sort];
		}else{
			$sort = " DESC";
		} 
		$where.=$order.$sort;  

		$job_list = $db->select_all("company_job",$where.$limit);

		if(is_array($job_list)){
			
			$cache_array = $db->cacheget();
			$comuid=$jobid=array();
			foreach($job_list as $key=>$value){
				if(in_array($value['uid'],$comuid)==false){$comuid[] = $value['uid'];}
				if(in_array($value['id'],$jobid)==false){$jobid[] = $value['id'];} 
			}
			$comuids = @implode(',',$comuid);
			$jobids = @implode(',',$jobid);
			
			
			if($comuids){
				$r_uids=$db->select_all("company","`uid` IN (".$comuids.")","`uid`,`yyzz_status`,`logo`,`pr`,`hy`,`mun`");
				if(is_array($r_uids)){
					foreach($r_uids as $key=>$value){
						if(!$value['logo'] ){
							$value['logo'] = $config['sy_weburl']."/".$config['sy_unit_icon'];
						}else{
							$value['logo']= $config['sy_weburl']."/".$value['logo'];
						}
						$value['pr_n'] = $cache_array['comclass_name'][$value[pr]];
						$value['hy_n'] = $cache_array['industry_name'][$value[hy]];
						$value['mun_n'] = $cache_array['comclass_name'][$value[mun]];
						$r_uid[$value['uid']] = $value;
					   
					}
				}
			}
			    
			
			$noids=array();
			foreach($job_list as $key=>$value){
				if($paramer[bid]){
					$noids[] = $value[id];
				}
				
				
				$job_list[$key] = $db->array_action($value,$cache_array);
				$job_list[$key][stime] = date("Y-m-d",$value[sdate]);
				$job_list[$key][etime] = date("Y-m-d",$value[edate]);
				
				 $login = $db->DB_select_once("member","uid=".$value[uid],"login_date");
               
                $job_list[$key][login_date] = $login[login_date];
				
				
				if($arr_data['sex'][$value['sex']]){
    				$job_list[$key][sex_n]=$arr_data['sex'][$value['sex']];
    			}
				$job_list[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);
				if($value[minsalary]&&$value[maxsalary]){
					$job_list[$key][job_salary] =$value[minsalary]."-".$value[maxsalary];
				}elseif($value[minsalary]){
					$job_list[$key][job_salary] =$value[minsalary]."以上";
				}else{
                    $job_list[$key][job_salary] ="面议";
                }
				
				if($value[identity]==3){
				 $fake_company=$db->DB_select_once("fake_company","id=".$value['fake_id']);
                    $job_list[$key][pr_n] =$fake_company[nature];
                    $job_list[$key][hy_n] =$fake_company[hy];
                    $job_list[$key][mun_n] =$fake_company[scale];
				}else{
                    $job_list[$key][yyzz_status] =$r_uid[$value['uid']][yyzz_status];
                    $job_list[$key][logo] =$r_uid[$value['uid']][logo];
                   
                    $job_list[$key][pr_n] =$r_uid[$value['uid']][pr_n];
                    $job_list[$key][hy_n] =$r_uid[$value['uid']][hy_n];
                    $job_list[$key][mun_n] =$r_uid[$value['uid']][mun_n];
                    
				}
				
				$time=$value['lastupdate'];
				
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
			
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$job_list[$key]['time'] ="一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$job_list[$key]['time'] ="昨天";
				}elseif($time>$beginToday){	
					$job_list[$key]['time'] = date("H:i",$value['lastupdate']);
					$job_list[$key]['redtime'] =1;
				}else{
					$job_list[$key]['time'] = date("Y-m-d",$value['lastupdate']);
				}
				
				if(is_array($job_list[$key]['welfare'])&&$job_list[$key]['welfare']){
					foreach($job_list[$key]['welfare'] as $val){
						$job_list[$key]['welfarename'][]=$cache_array['comclass_name'][$val];
					}

				}
			
				if($paramer[comlen]){
					$job_list[$key][com_n] = mb_substr($value['com_name'],0,$paramer[comlen],"GBK");
				}
			    $job_list[$key][lietou_num] = $db->select_num("userid_job","identity=3 and job_id=".$value['id']." group by uid");
			    $job_list[$key][lietou_num] = $job_list[$key][lietou_num]?$job_list[$key][lietou_num]:0;
                $job_list[$key][resume_num] = $db->select_num("userid_job","identity=3 and job_id=".$value['id']);
                $job_list[$key][resume_num] = $job_list[$key][resume_num]?$job_list[$key][resume_num]:0;
                $job_list[$key][view_num] = $db->select_num("userid_job","identity=3 and is_browse=2 and job_id=".$value['id']);
                $job_list[$key][download_num] = $db->select_num("userid_job","identity=3 and is_browse=6 and job_id=".$value['id']);
                $job_list[$key][refuse_num] = $db->select_num("userid_job","identity=3 and is_browse=4 and job_id=".$value['id']);
                
                
                  $job_list[$key][fav_job]= $db->select_num("fav_job","uid=".$_COOKIE['uid']." and job_id=".$value['id']);
               
               
                $job_list[$key][myresume_num] = $db->select_num("userid_job","identity=3 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $job_list[$key][myresume_num] = $job_list[$key][myresume_num]?$job_list[$key][myresume_num]:0;
                $job_list[$key][myview_num] = $db->select_num("userid_job","identity=3 and is_browse=2 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $job_list[$key][mydownload_num] = $db->select_num("userid_job","identity=3 and is_browse=6 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $job_list[$key][myrefuse_num] = $db->select_num("userid_job","identity=3 and is_browse=4 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                
                if($paramer[eid]){
				    $recommend = $db->select_num("userid_job","job_id=".$value['id']." and eid=".$paramer[eid]);
				   
				    if($recommend){
				    
				        $recommend1 = $db->select_num("userid_job","job_id=".$value['id']." and eid=".$paramer[eid]." and uid=".$_COOKIE['uid']);
				        if($recommend1){
				            $job_list[$key][recommend] = 1;
				        }else{
				            $job_list[$key][recommend] = 2;
				        }
				    }else{
                        $job_list[$key][recommend] = 0;
				    }
				  
				}
                
				if($paramer[namelen]){
					if($value['rec_time']>time()){
						$job_list[$key][name_n] = "<font color='red'>".mb_substr($value['name'],0,$paramer[namelen],"GBK")."</font>";
					}else{
						$job_list[$key][name_n] = mb_substr($value['name'],0,$paramer[namelen],"GBK");
					}
				}else{
					if($value['rec_time']>time()){
						$job_list[$key]['name_n'] = "<font color='red'>".$value['name']."</font>";
					}
				}
				
				$job_list[$key][job_url] = Url("job",array("c"=>"comapply","id"=>$value[id]),"1");
				
				$job_list[$key][com_url] = Url("company",array("c"=>"show","id"=>$value[uid]));
				foreach($comrat as $k=>$v){
					if($value[rating]==$v[id]){
						$job_list[$key][color] = str_replace("#","",$v[com_color]);
						$job_list[$key][ratlogo] = $v[com_pic];
						$job_list[$key][ratname] = $v[name];
					}
				}
				if($paramer[keyword]){
					$job_list[$key][name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[name]);
					$job_list[$key][com_name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[com_name]);
					$job_list[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$job_list[$key][name_n]);
					$job_list[$key][com_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$job_list[$key][com_n]);
					$job_list[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
					$job_list[$key][job_city_two]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[cityid]]);
    			}
			}

			if(is_array($job_list)){
				if($paramer[keyword]!=""&&!empty($job_list)){
					addkeywords('3',$paramer[keyword]);
				}
			}
		} ?>
<?php global $db,$db_config,$config;
		$time = time();
		
	
	
        eval('$paramer=array("namelen"=>"15","comlen"=>"19","rec"=>"1","limit"=>"3","item"=>"\'blist\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
        $Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		include_once  PLUS_PATH."/comrating.cache.php";
		include(CONFIG_PATH."db.data.php"); 
		if($config[sy_web_site]=="1"){
			if($config[province]>0 && $config[province]!=""){
				$paramer[provinceid] = $config[province];
			}
			if($config[cityid]>0 && $config[cityid]!=""){
				$paramer[cityid] = $config[cityid];
			}
			if($config[three_cityid]>0 && $config[three_cityid]!=""){
				$paramer[three_cityid] = $config[three_cityid];
			}
			if($config[hyclass]>0 && $config[hyclass]!=""){
				$paramer[hy]=$config[hyclass];
			}
		}
		if($paramer[sdate]){
			$where = "`sdate`>".strtotime("-".intval($paramer[sdate])." day",time())." and `edate`>'$time' and `state`=1";
		}else{
			$where = "`state`=1 and `edate`>'$time'";
		}
        
		
		if($paramer[uid]){
			$where .= " AND `uid` = '$paramer[uid]'";
		}
		
		
		
		if($paramer[identity]){
			$where .= " AND `identity`=".$paramer[identity];
		}
		

		if($paramer[rec]){
			$recRating = array();
		
			if($comrat){
				foreach($comrat as $value){
					if($value[display]=='1' && $value[category]=='1' && $value[jobrec]=='2'){
						$recRating[] = $value['id'];
					}
				}
			}
			if(!empty($recRating)){
				$recRaringId = implode(',',$recRating);
				
				$where.=" AND (`rating` IN (".$recRaringId.") OR `rec_time`>=".time().")";

			}else{
				$where.=" AND `rec_time`>=".time();
			}
		}
		
		if($paramer['cert']){
			$job_uid=array();
			$company=$db->select_all("company","`yyzz_status`=1","`uid`");
			if(is_array($company)){
				foreach($company as $v){
					$job_uid[]=$v['uid'];
				}
			}
			$where.=" and `uid` in (".@implode(",",$job_uid).")";
		}
		
		if($paramer[noid]){
			$where.= " and `id`<>$paramer[noid]";
		}
		
		if($paramer[r_status]){
			$where.= " and `r_status`=2";
		}else{
			$where.= " and `r_status`<>2";
		}
		
		if($paramer[status]){
			$where.= " and `status`=1";
		}else{
			$where.= " and `status`<>1";
		}
		
		if($paramer[pr]){
			$where .= " AND `pr` =$paramer[pr]";
		}
		
		if($paramer['hy']){
			$where .= " AND `hy` = $paramer[hy]";
		} 
		
		if($paramer[mun]){
			$where .= " AND `mun` = $paramer[mun]";
		}
		
		if($paramer[job1]){
			$where .= " AND `job1` = $paramer[job1]";
		}
		
		if($paramer[job1_son]){
			$where .= " AND `job1_son` = $paramer[job1_son]";
		}
		
		if($paramer[job_post]){
			$where .= " AND (`job_post` IN ($paramer[job_post]))";
		}
		
		if($paramer['jobwhere']){
			$where .=" and ".$paramer['jobwhere'];
		}
		
		if($paramer['jobids']){
			$where.= " AND (`job1` = $paramer[jobids] OR `job1_son`=$paramer[jobids] OR `job_post`=$paramer[jobids])";
		}
		
		if($paramer['jobin']){
			$where .= " AND (`job1` IN ($paramer[jobin]) OR `job1_son` IN ($paramer[jobin]) OR `job_post` IN ($paramer[jobin]))";
		}
		
		if($paramer[provinceid]){
			$where .= " AND `provinceid` = $paramer[provinceid]";
		}
		
		if($paramer['cityid']){
			$where .= " AND (`cityid` IN ($paramer[cityid]))";
		}
		
		if($paramer['three_cityid']){
			$where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
		}
		if($paramer['cityin']){
			$where .= " AND `three_cityid` IN ($paramer[cityin])";
		}
		
		if($paramer[edu]){
			$where .= " AND `edu` = $paramer[edu]";
		}
		
		if($paramer[exp]){
			$where .= " AND `exp` = $paramer[exp]";
		}
		
		if($paramer[report]){
			$where .= " AND `report` = $paramer[report]";
		}
		
		if($paramer[type]){
			$where .= " AND `type` = $paramer[type]";
		}
		
		if($paramer[sex]){
			$where .= " AND `sex` = $paramer[sex]";
		}
		if($paramer[minsalary]&&$paramer[maxsalary]){
			$where.= " AND ((`minsalary`<=".intval($paramer[minsalary]*10000/12)." and `maxsalary`>=".intval($paramer[minsalary]*10000/12).") 
						or (`minsalary`<=".intval($paramer[maxsalary])." and `maxsalary`>=".intval($paramer[maxsalary])."))";
    	}elseif($paramer[minsalary]&&!$paramer[maxsalary]){
			$where.= " AND ((`minsalary`<=".intval($paramer[minsalary]*10000/12)." and `maxsalary`>=".intval($paramer[minsalary]*10000/12).") 
						or (`minsalary`>=".intval($paramer[minsalary]*10000/12)." and `maxsalary`>=".intval($paramer[minsalary]*10000/12).") 
						or (`minsalary`!=0 and  `maxsalary`=0))";
		}elseif(!$paramer[minsalary]&&$paramer[maxsalary]){
			$where.= " AND ((`minsalary`<=".intval($paramer[maxsalary]*10000/12)." and `maxsalary`>=".intval($paramer[maxsalary]*10000/12).") 
						or (`minsalary`<=".intval($paramer[maxsalary]*10000/12)." and `maxsalary`<=".intval($paramer[maxsalary]*10000/12).") 
						or (`minsalary`<=".intval($paramer[maxsalary]*10000/12)." and maxsalary=0) 
						or (`minsalary`=0 and  `maxsalary`!=0)
						)";
			
		}
		
		if($paramer[cityin]){
			$where .= " AND (`provinceid` IN ($paramer[cityin]) OR `cityid` IN ($paramer[cityin]) OR `three_cityid` IN ($paramer[cityin]))";
		}
		
		if($paramer[urgent]){
			$where.=" AND `urgent_time`>".time();
		}
		
		if($paramer[uptime]){
			if($paramer[uptime]==1){
				 $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
                $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==3){
				$beginToday=mktime(0,0,0,date('m'),date('d')-2,date('Y'));
                $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==7){
				 $beginToday=mktime(0,0,0,date('m'),date('d')-6,date('Y'));
                $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==30){
				 $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
                $endToday=mktime(0,0,0,date('m')+1,date('d'),date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}elseif($paramer[uptime]==90){
				 $beginToday=mktime(0,0,0,date('m')-2,date('d'),date('Y'));
                $endToday=mktime(0,0,0,date('m')+1,date('d'),date('Y'))-1;
                $where .= " AND lastupdate>".$beginToday." and lastupdate<".$endToday;
    		}
		}
		
		if($paramer[comname]){
			$where.=" AND `com_name` LIKE '%".$paramer[comname]."%'";
		}
		
		if($paramer[com_pro]){
			$where.=" AND `com_provinceid` ='".$paramer[com_pro]."'";
		}
		
		if($paramer[keyword]){
			$where1[]="`name` LIKE '%".$paramer[keyword]."%'";
			$where1[]="`com_name` LIKE '%".$paramer[keyword]."%'";
			include  PLUS_PATH."/city.cache.php";
			foreach($city_name as $k=>$v){
				if(strpos($v,$paramer[keyword])!==false){
					$cityid[]=$k;
				}
			}
			if(is_array($cityid)){
				foreach($cityid as $value){
					$class[]= "(provinceid = '".$value."' or cityid = '".$value."')";
				}
				$where1[]=@implode(" or ",$class);
			}
			$where.=" AND (".@implode(" or ",$where1).")";
		}
		
		if($paramer[job_name]){
		    $where .=" and `name` LIKE '%".$paramer[job_name]."%'";
		}
		
		if($paramer[com_name]){
		    $where .=" and `com_name` LIKE '%".$paramer[com_name]."%'";
		}
		
		
		
		if($paramer["job"]){
			$where.=" AND `job_post` in ($paramer[job])";
		}
		
		if($paramer[bid]){
			$where.="  and `xsdate`>'".time()."'";
		} 
		
		if($paramer[noids]==1 && !empty($noids)){
			$where.=" AND `id` NOT IN (".@implode(',',$noids).")";
		}
		
		if($paramer[job_id]){
		    $where.="  and id=".$paramer[job_id];
		}
		
		
		if($paramer[w]==1){
		    $job_ids = $db->select_all("fav_job","uid=".$_COOKIE['uid'],"job_id");
		    $ids = "";
		    foreach($job_ids as $li){
		        $ids[] = $li[job_id];
		    }
		    $ids = implode(",",$ids);
		    $where.="  and id in(".$ids.")";
		}elseif($paramer[w]==2){
		    $job_ids = $db->select_all("userid_job","identity=3 and uid=".$_COOKIE['uid'],"job_id");
		    $ids = "";
		    foreach($job_ids as $li){
		        $ids[] = $li[job_id];
		    }
		    $ids = implode(",",$ids);
		    $where.="  and id in(".$ids.")";
		   
		}
		
		if($paramer[where]){
			$where = $paramer[where];
		}

	
		if($paramer[limit]){
			$limit = " limit ".$paramer[limit];
		}

		if($paramer[ispage]){
		   
			$limit = PageNav($paramer,$_GET,"company_job",$where,$Purl,"",$paramer[islt]?$paramer[islt]:"6",$_smarty_tpl);
          
		} 
		
		if($paramer[order] && $paramer[order]!="lastdate"){
			$order = " ORDER BY ".str_replace("'","",$paramer[order])."  ";
		}else{
		    if($paramer[orderby]=="salary"){
                $order = " ORDER BY minsalary ";
            }elseif($paramer[orderby]=="time"){
                $order = " ORDER BY `lastupdate` ";
            }else{
			    $order = " ORDER BY `lastupdate` ";            
            }
		}
		
		
		
		
		
		if($paramer[sort]){
			$sort = $paramer[sort];
		}else{
			$sort = " DESC";
		} 
		$where.=$order.$sort;  

		$blist = $db->select_all("company_job",$where.$limit);

		if(is_array($blist)){
			
			$cache_array = $db->cacheget();
			$comuid=$jobid=array();
			foreach($blist as $key=>$value){
				if(in_array($value['uid'],$comuid)==false){$comuid[] = $value['uid'];}
				if(in_array($value['id'],$jobid)==false){$jobid[] = $value['id'];} 
			}
			$comuids = @implode(',',$comuid);
			$jobids = @implode(',',$jobid);
			
			
			if($comuids){
				$r_uids=$db->select_all("company","`uid` IN (".$comuids.")","`uid`,`yyzz_status`,`logo`,`pr`,`hy`,`mun`");
				if(is_array($r_uids)){
					foreach($r_uids as $key=>$value){
						if(!$value['logo'] ){
							$value['logo'] = $config['sy_weburl']."/".$config['sy_unit_icon'];
						}else{
							$value['logo']= $config['sy_weburl']."/".$value['logo'];
						}
						$value['pr_n'] = $cache_array['comclass_name'][$value[pr]];
						$value['hy_n'] = $cache_array['industry_name'][$value[hy]];
						$value['mun_n'] = $cache_array['comclass_name'][$value[mun]];
						$r_uid[$value['uid']] = $value;
					   
					}
				}
			}
			    
			
			$noids=array();
			foreach($blist as $key=>$value){
				if($paramer[bid]){
					$noids[] = $value[id];
				}
				
				
				$blist[$key] = $db->array_action($value,$cache_array);
				$blist[$key][stime] = date("Y-m-d",$value[sdate]);
				$blist[$key][etime] = date("Y-m-d",$value[edate]);
				
				 $login = $db->DB_select_once("member","uid=".$value[uid],"login_date");
               
                $blist[$key][login_date] = $login[login_date];
				
				
				if($arr_data['sex'][$value['sex']]){
    				$blist[$key][sex_n]=$arr_data['sex'][$value['sex']];
    			}
				$blist[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);
				if($value[minsalary]&&$value[maxsalary]){
					$blist[$key][job_salary] =$value[minsalary]."-".$value[maxsalary];
				}elseif($value[minsalary]){
					$blist[$key][job_salary] =$value[minsalary]."以上";
				}else{
                    $blist[$key][job_salary] ="面议";
                }
				
				if($value[identity]==3){
				 $fake_company=$db->DB_select_once("fake_company","id=".$value['fake_id']);
                    $blist[$key][pr_n] =$fake_company[nature];
                    $blist[$key][hy_n] =$fake_company[hy];
                    $blist[$key][mun_n] =$fake_company[scale];
				}else{
                    $blist[$key][yyzz_status] =$r_uid[$value['uid']][yyzz_status];
                    $blist[$key][logo] =$r_uid[$value['uid']][logo];
                   
                    $blist[$key][pr_n] =$r_uid[$value['uid']][pr_n];
                    $blist[$key][hy_n] =$r_uid[$value['uid']][hy_n];
                    $blist[$key][mun_n] =$r_uid[$value['uid']][mun_n];
                    
				}
				
				$time=$value['lastupdate'];
				
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
			
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$blist[$key]['time'] ="一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$blist[$key]['time'] ="昨天";
				}elseif($time>$beginToday){	
					$blist[$key]['time'] = date("H:i",$value['lastupdate']);
					$blist[$key]['redtime'] =1;
				}else{
					$blist[$key]['time'] = date("Y-m-d",$value['lastupdate']);
				}
				
				if(is_array($blist[$key]['welfare'])&&$blist[$key]['welfare']){
					foreach($blist[$key]['welfare'] as $val){
						$blist[$key]['welfarename'][]=$cache_array['comclass_name'][$val];
					}

				}
			
				if($paramer[comlen]){
					$blist[$key][com_n] = mb_substr($value['com_name'],0,$paramer[comlen],"GBK");
				}
			    $blist[$key][lietou_num] = $db->select_num("userid_job","identity=3 and job_id=".$value['id']." group by uid");
			    $blist[$key][lietou_num] = $blist[$key][lietou_num]?$blist[$key][lietou_num]:0;
                $blist[$key][resume_num] = $db->select_num("userid_job","identity=3 and job_id=".$value['id']);
                $blist[$key][resume_num] = $blist[$key][resume_num]?$blist[$key][resume_num]:0;
                $blist[$key][view_num] = $db->select_num("userid_job","identity=3 and is_browse=2 and job_id=".$value['id']);
                $blist[$key][download_num] = $db->select_num("userid_job","identity=3 and is_browse=6 and job_id=".$value['id']);
                $blist[$key][refuse_num] = $db->select_num("userid_job","identity=3 and is_browse=4 and job_id=".$value['id']);
                
                
                  $blist[$key][fav_job]= $db->select_num("fav_job","uid=".$_COOKIE['uid']." and job_id=".$value['id']);
               
               
                $blist[$key][myresume_num] = $db->select_num("userid_job","identity=3 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $blist[$key][myresume_num] = $blist[$key][myresume_num]?$blist[$key][myresume_num]:0;
                $blist[$key][myview_num] = $db->select_num("userid_job","identity=3 and is_browse=2 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $blist[$key][mydownload_num] = $db->select_num("userid_job","identity=3 and is_browse=6 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $blist[$key][myrefuse_num] = $db->select_num("userid_job","identity=3 and is_browse=4 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                
                if($paramer[eid]){
				    $recommend = $db->select_num("userid_job","job_id=".$value['id']." and eid=".$paramer[eid]);
				   
				    if($recommend){
				    
				        $recommend1 = $db->select_num("userid_job","job_id=".$value['id']." and eid=".$paramer[eid]." and uid=".$_COOKIE['uid']);
				        if($recommend1){
				            $blist[$key][recommend] = 1;
				        }else{
				            $blist[$key][recommend] = 2;
				        }
				    }else{
                        $blist[$key][recommend] = 0;
				    }
				  
				}
                
				if($paramer[namelen]){
					if($value['rec_time']>time()){
						$blist[$key][name_n] = "<font color='red'>".mb_substr($value['name'],0,$paramer[namelen],"GBK")."</font>";
					}else{
						$blist[$key][name_n] = mb_substr($value['name'],0,$paramer[namelen],"GBK");
					}
				}else{
					if($value['rec_time']>time()){
						$blist[$key]['name_n'] = "<font color='red'>".$value['name']."</font>";
					}
				}
				
				$blist[$key][job_url] = Url("job",array("c"=>"comapply","id"=>$value[id]),"1");
				
				$blist[$key][com_url] = Url("company",array("c"=>"show","id"=>$value[uid]));
				foreach($comrat as $k=>$v){
					if($value[rating]==$v[id]){
						$blist[$key][color] = str_replace("#","",$v[com_color]);
						$blist[$key][ratlogo] = $v[com_pic];
						$blist[$key][ratname] = $v[name];
					}
				}
				if($paramer[keyword]){
					$blist[$key][name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[name]);
					$blist[$key][com_name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[com_name]);
					$blist[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$blist[$key][name_n]);
					$blist[$key][com_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$blist[$key][com_n]);
					$blist[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
					$blist[$key][job_city_two]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[cityid]]);
    			}
			}

			if(is_array($blist)){
				if($paramer[keyword]!=""&&!empty($blist)){
					addkeywords('3',$paramer[keyword]);
				}
			}
		} ?>
<?php global $db,$db_config,$config;eval('$paramer=array("limit"=>"6","rec"=>"1","logo"=>"1","item"=>"\'com\'","nocache"=>"")
;');$com=array();
		
		$time = time();
		
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr['arr'];
		$Purl =  $ParamerArr['purl'];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
	
		if($config['sy_web_site']=="1"){
			if($config[province]>0 && $config[province]!=""){
				$paramer[provinceid] = $config[province];
			}
			if($config['cityid']>0 && $config['cityid']!=""){
				$paramer['cityid']=$config['cityid'];
			}
			if($config['three_cityid']>0 && $config['three_cityid']!=""){
				$paramer['three_cityid']=$config['three_cityid'];
			}
			if($config['hyclass']>0 && $config['hyclass']!=""){
				$paramer['hy']=$config['hyclass'];
			}
		} 
		$where="`name`<>'' and `hy`<>''"; 
       
		
		
		
		if($paramer['keyword']){
			$where.=" AND `name` LIKE '%".$paramer['keyword']."%'";
		}				
		
		if($paramer['hy']){
			$where .= " AND `hy` = '".$paramer['hy']."'";
		}
	
		if($paramer['pr']){
			$where .= " AND `pr` = '".$paramer['pr']."'";
		}
		
		if($paramer['mun']){
			$where .= " AND `mun` = '".$paramer['mun']."'";
		}
		
		if($paramer['provinceid']){
			$where .= " AND `provinceid` = '".$paramer['provinceid']."'";
		}
		
		if($paramer['cityid']){
			$where .= " AND (`provinceid` = '".$paramer['cityid']."' OR `cityid` = '".$paramer['cityid']."')";
		}
		
		if($paramer['three_cityid']){
			$where .= " AND (`provinceid` = '".$paramer['three_cityid']."' OR `three_cityid` = '".$paramer['three_cityid']."')";
		}
		
		if($paramer['cityin']){
			$where .= " AND (`provinceid` in(".$paramer['cityin'].") OR `cityid` in(".$paramer['cityin'].") or `three_cityid` in(".$paramer['cityin']."))";
		}
		
		if($paramer['linkman']){
			$where .= " AND `linkman`<>''";
		}
		
		if($paramer['linktel']){
			$where .= " AND `linktel`<>''";
		}
		
		if($paramer['linkmail']){
			$where .= " AND `linkmail`<>''";
		}
		
		if($paramer['logo']){
			$where .= " AND `logo`<>''";
		}
		
		if($paramer['r_status']){
			$where .= " AND `r_status`='".$paramer['r_status']."'";
		}else{
			$where .= " AND `r_status`<>'2'";
		}
		
		if($paramer['cert']){
			$where .= " AND `yyzz_status`='1'";
		}
		
		if($paramer['uptime']){
			$uptime = $time-$paramer['uptime']*3600;
			$where.=" AND `lastupdate`>'".$uptime."'";
		}
		if($paramer['jobtime']){
			$where.=" AND `jobtime`<>''";
		}
		
		
		if($paramer['rec']){
			$Purl["rec"]='1';
			$where.=" AND `rec`='1' AND `hottime`>'".time()."'";
		}
		
       
		
		if($paramer['limit']){
			$limit=" limit ".$paramer['limit'];
		}
		
		
		if($paramer['where']){
			$where = $paramer['where'];
		}
		
		$cache_array = $db->cacheget();
		if($paramer['ispage']){ 
			if($paramer['rec']==1&&$Purl["m"]=="lietou"){
				$limit = PageNav($paramer,$_GET,"company",$where,$Purl,"","1",$_smarty_tpl);
			}else{
				$limit = PageNav($paramer,$_GET,"company",$where,$Purl,"","0",$_smarty_tpl);
			}
		}
		
		if($paramer['order']){
			if($paramer['order']=="lastＵpdate"){
				$paramer['order']="lastupdate";
			}
			$order = " ORDER BY `".$paramer['order']."`  ";
		}else{
			$order = " ORDER BY `jobtime` ";
		}
	
		if($paramer['sort']){
			$sort = $paramer['sort'];
		}else{
			$sort = " DESC";
		}
		$where.=$order.$sort;
		
		$Query = $db->query("SELECT * FROM $db_config[def]company where ".$where.$limit);
		$ListId=array();
		$com=array();
		while($rs = $db->fetch_array($Query)){
			$com[] = $db->array_action($rs,$cache_array);
			$ListId[] = $rs['uid'];
		}  
		
		include_once  PLUS_PATH."/comrating.cache.php";
		if(!empty($ListId)){
		$statis = $db->select_all("company_statis","`uid` in (".@implode(",",$ListId).")","`uid`,`rating`");
		foreach($ListId as $key=>$value){
		       foreach($statis as $v){
		               foreach($comrat as $val){
			                if($value==$v['uid'] && $val['id']==$v['rating']){						
							$com[$key]['color'] = $val['com_color'];
							$com[$key]['ratlogo'] = $val['com_pic'];
							$com[$key]['ratname'] = $val['name'];
						    }
					  }
				}
			}
		}
	
		if($paramer['ismsg']){
			$Msgid = @implode(",",$ListId);
			$msglist = $db->select_alls("company_msg","resume","a.`cuid` in ($Msgid) and a.`uid`=b.`uid` order by a.`id` desc","a.cuid,a.content,b.name,b.photo,b.def_job");
			if(is_array($ListId) && is_array($msglist)){
				foreach($com as $key=>$value){
					foreach($msglist as $k=>$v){
						if($value['uid']==$v['cuid']){
							$com[$key]['msg'][$k]['content'] = $v['content'];
							$com[$key]['msg'][$k]['name'] = $v['name'];
							$com[$key]['msg'][$k]['photo'] = $v['photo'];
							$com[$key]['msg'][$k]['eid'] = $v['def_job'];
						}
					}
				}
			}
		}
		
		if($paramer['isjob']){
			
			$JobId = @implode(",",$ListId);
			$JobList=$db->select_all("company_job","`uid` IN ($JobId) and `edate`>'".mktime()."' and r_status<>'2' and status<>'1' and state=1  order by `lastupdate` desc","`id`,`uid`,`status`,`name`");
			if(is_array($ListId) && is_array($JobList)){
				foreach($com as $key=>$value){
					$com[$key]['jobnum'] = 0;
					foreach($JobList as $k=>$v){
						if($value['uid']==$v['uid']){
							$id = $v['id'];
							$com[$key]['newsjob'] = $v['name'];
							$com[$key]['newsjob_status'] = $v['status'];
							$com[$key]['r_status'] = $v['r_status'];

							$v = $db->array_action($value,$cache_array);
							$v['job_url'] = Url("job",array("c"=>"comapply","id"=>$JobList[$k]['id']),"1");
							$v['id']= $id;
							$v['name'] = $com[$key]['newsjob'];
							$com[$key]['joblist'][] = $v;
							$com[$key]['jobnum'] = $com[$key]['jobnum']+1;
						}
					}
					/*
					foreach($comrat as $k=>$v){
						if($value['rating']==$v['id']){
							$com[$key]['color'] = $v['com_color'];
							$com[$key]['ratlogo'] = $v['com_pic'];
						}
					}*/
				}
			}
		}
	
		if($paramer['isnews']){
			
			$JobId = @implode(",",$ListId);
			$NewsList=$db->select_all("company_news","`uid` IN ($JobId) and status=1  order by `id` desc");
			if(is_array($ListId) && is_array($NewsList)){
				foreach($com as $key=>$value){
					$com[$key]['newsnum'] = 0;
					foreach($NewsList as $k=>$v){
						if($value['uid']==$v['uid']){
							$com[$key]['newslist'][] = $v;
							$com[$key]['newsnum'] = $com[$key]['newsnum']+1;
						}
					}
				}
			}
		}
		
		if($paramer['isshow']){
			
			$JobId = @implode(",",$ListId);
			$ShowList=$db->select_all("company_show","`uid` IN ($JobId) order by `id` desc");
			if(is_array($ListId) && is_array($ShowList)){
				foreach($com as $key=>$value){
					$com[$key]['shownum'] = 0;
					foreach($ShowList as $k=>$v){
						if($value['uid']==$v['uid']){
							$com[$key]['showlist'][] = $v;
							$com[$key]['shownum'] = $com[$key]['shownum']+1;
						}
					}
				}
			}
		}
		
		
		if($paramer['firm']){
			if($_COOKIE[uid]){$atnlist = $db->select_all("atn","`uid`='$_COOKIE[uid]'");}
			if(is_array($com)){
				foreach($com as $key=>$value){
					if(!empty($atnlist)){
						foreach($atnlist as $v){
							if($value['uid'] == $v['sc_uid']){
								$com[$key]['atn'] = "取消关注";
                                $com[$key]['atnstatus'] = "1";
								break;
							}else{
								$com[$key]['atn'] = "关注";
							}
						}
					}else{
						$com[$key]['atn'] = "关注";
					}
				}
			}
		}
		if(is_array($com)){
			foreach($com as $key=>$value){
				$com[$key]['com_url'] = Url("company",array("c"=>"show","id"=>$value['uid']));
				$com[$key]['joball_url'] = Url("company",array("c"=>"show","id"=>$value['uid'],"tp"=>"post")); 
				if(!$value['logo'] || !file_exists(str_replace($config['sy_weburl'],APP_PATH,'.'.$value['logo']))){
				    $com[$key]['logo'] = $config['sy_weburl']."/".$config['sy_unit_icon'];
				}else{
					$com[$key]['logo'] = str_replace("./",$config['sy_weburl']."/",$value['logo']);
				} 
				
			}
			if($paramer['keyword']!=""&&!empty($com)){
				addkeywords('4',$paramer['keyword']);
			}
		} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"/>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/class.public.css" type="text/css"/>
</head>
<body class="body_bg">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<style>
    .search_city_list_all{ color: #fff;background: #5f75a3;}

</style>
<div class="yun_body">
  <div class="yun_content">
    <div class="current_Location com_current_Location png">
      <div class="fl" >您当前的位置：<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
">首页</a> > <span>高薪职位</span> </div>
    </div>
    <div class="clear"></div>
    <div class="Search_jobs_box">
      <form action="<?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_jobdir']) {?>index.php<?php } else {
echo smarty_function_url(array('m'=>'job'),$_smarty_tpl);
}?>" method="get" id="form" onsubmit="return search_keyword(this,'请输入职位名称的关键字');">
        <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_jobdir']) {?>
		<input type="hidden" name="m" value="job" id="m" />
		<?php }?>
        <input type="hidden" name="c" value="search" />
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['finder']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" />
        <?php } ?>
		<div class="Search_jobs_form_list" >
          <div class="yun_job_search job_searchzz" style="width: 1150px;">
          <div class="Search_jobs_sub" style="width: 890px;">
            <input type="text" name="keyword" value="<?php if ($_GET['keyword']) {
echo $_GET['keyword'];
} else { ?>请输入职位名称的关键字<?php }?>" onclick="if(this.value=='请输入职位名称的关键字'){this.value=''}" onblur="if(this.value==''){this.value='请输入职位名称的关键字'}" class="Search_jobs_text searchjob_txt" style="width: 778px;"/>
            <input type="submit" value="搜索" class="Search_jobs_submit yun_bg_color"/>
            <div class="Search_jobs_sub_text_bc" style="float: right;">
			<?php if ($_smarty_tpl->tpl_vars['uid']->value&&$_smarty_tpl->tpl_vars['usertype']->value=='1') {?>
			<a href="javascript:void(0)" class="Search_jobs_scq"  onclick="addfinder('<?php echo $_smarty_tpl->tpl_vars['paras']->value;?>
','1','0')">+ 保存为职位搜索器</a>
			 <?php }?>
			</div>
            </div>
              <?php if ($_smarty_tpl->tpl_vars['uid']->value&&$_smarty_tpl->tpl_vars['usertype']->value=='1') {?>
              <div style="float: left">
                  <div class="Search_jobs_more_chlose" style="width: 200px;margin-left: 30px;">
                      <span class="Search_jobs_more_chlose_s" style="width: 165px;">请选择职位搜索条件</span><i class=""></i>
                      <div class="Search_jobs_more_chlose_list none" style="width: 200px;">
                          <ul class="select_hyitem">
                              <li><a class="Search_jobs_cxz widtha" href="/resume/index.php">全部</a> </li>
                              <?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['li']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['finders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['li']->key => $_smarty_tpl->tpl_vars['li']->value) {
$_smarty_tpl->tpl_vars['li']->_loop = true;
?>
                              <li><a class="Search_jobs_cxz widtha" href="/resume/index.php?&all=0_0_0_0_0_0_0_0_0&tp=0&page=1&<?php echo $_smarty_tpl->tpl_vars['li']->value['para'];?>
"><?php if ($_smarty_tpl->tpl_vars['li']->value['name']) {
echo $_smarty_tpl->tpl_vars['li']->value['name'];
} else { ?>未命名<?php }?></a> </li>
                              <?php } ?>
                          </ul>
                      </div>
                  </div>
              </div>
              <?php }?>
            </div>
        </div>

        <?php if (!$_GET['job1']) {?>
        <div class="Search_jobs_form_list">
          <div class="Search_jobs_name"> 职位：</div>
          <div class="Search_jobs_sub ">
             <div class="Search_jobs_sub_Box ">
          <!--点击 更多 增加 Search_jobs_sub_nore -->

            <a href="<?php echo smarty_function_listurl(array('type'=>'job1','v'=>0),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1']=='') {?>Search_jobs_sub_cur<?php }?>">全部</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('type'=>'job1','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php } elseif ($_smarty_tpl->tpl_vars['key']->value>6) {?>job1list none<?php }?>" ><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
            <?php } ?>
            </div>
		 </div>
                <div class="zh_more"> <a href="javascript:checkmore('job1list');" id="job1list" rel="nofollow">更多</a> </div>
        </div>
        <?php }?>

        <?php if ($_GET['job1']&&!$_GET['job1_son']) {?>
        <div class="Search_jobs_form_list">
          <div class="Search_jobs_name"> 子类：</div>
          <div class="Search_jobs_sub ">
            <a href="<?php echo smarty_function_listurl(array('type'=>'job1_son'),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1_son']=='') {?>Search_jobs_sub_cur<?php }?>">全部</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_GET['job1']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('type'=>'job1_son','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1_son']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
        </div>
        <?php }?>


        <?php if ($_GET['job1_son']&&is_array($_smarty_tpl->tpl_vars['job_type']->value[$_GET['job1_son']])) {?>
        <div class="Search_jobs_form_list">
          <div class="Search_jobs_name"> 类别：</div>
          <div class="Search_jobs_sub ">
            <a href="<?php echo smarty_function_listurl(array('type'=>'job1_son','v'=>$_GET['job1_son']),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job_post']=='') {?>Search_jobs_sub_cur<?php }?>">全部</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_GET['job1_son']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('type'=>'job_post','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job_post']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>

		</div>
        <?php }?>
     <!--   city-->
	      <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_web_site']==1&&$_smarty_tpl->tpl_vars['config']->value['cityname']&&$_smarty_tpl->tpl_vars['config']->value['cityname']!=$_smarty_tpl->tpl_vars['config']->value['sy_indexcity']) {?>
		  <div class="Search_citybox">
          <div class="Search_cityboxname"> 地点：</div>
          <div class="Search_citybox_right">
          <div class="Search_cityboxright">
		  <div class="search_city_list search_city_listw1100">
		  <?php if (!$_GET['cityid']&&$_GET['three_cityid']) {?>
		  <a class="city_name city_name_active" style="text-decoration:none;cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['three_cityid']];?>
</a>
		  <?php } else { ?>

			  <?php if ($_GET['cityid']) {?>

				<?php if (is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']])) {?>
				  <a href="<?php echo smarty_function_listurl(array('untype'=>'three_cityid'),$_smarty_tpl);?>
" class="city_name <?php if (!$_GET['three_cityid']) {?>city_name_active<?php }?>">不限</a>
				  <?php  $_smarty_tpl->tpl_vars['tid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tid']->key => $_smarty_tpl->tpl_vars['tid']->value) {
$_smarty_tpl->tpl_vars['tid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['tid']->key;
?>
				  <a href="<?php echo smarty_function_listurl(array('type'=>'three_cityid','v'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['three_cityid']==$_smarty_tpl->tpl_vars['tid']->value) {?>city_name_active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['tid']->value];?>
</a>
				  <?php } ?>
				  <?php } else { ?>
				  <a class="city_name city_name_active" style="text-decoration:none;cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];?>
</a>
				  <?php }?>

			  <?php } else { ?>
				  <?php if (is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['provinceid']])) {?>
					  <a href="<?php echo smarty_function_listurl(array('untype'=>'cityid'),$_smarty_tpl);?>
" class="city_name <?php if (!$_GET['cityid']) {?>city_name_active<?php }?>">不限</a>
					  <?php  $_smarty_tpl->tpl_vars['tid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_GET['provinceid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tid']->key => $_smarty_tpl->tpl_vars['tid']->value) {
$_smarty_tpl->tpl_vars['tid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['tid']->key;
?>
					  <a href="<?php echo smarty_function_listurl(array('type'=>'cityid','v'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['cityid']==$_smarty_tpl->tpl_vars['tid']->value) {?>city_name_active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['tid']->value];?>
</a>
					  <?php } ?>
					  <?php } else { ?>
					  <a class="city_name city_name_active" style="text-decoration:none;cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']];?>
</a>
					  <?php }?>

			  <?php }?>
		   <?php }?>
		  </div>
          </div>
         </div>
         </div>
		  <?php } else { ?>
		  <div class="Search_citybox">
          <div class="Search_cityboxname"> 地点：</div>
          <div class="Search_citybox_right">
		  <div class="Search_cityall none">
		  <a href="<?php echo smarty_function_listurl(array('type'=>'provinceid','v'=>0),$_smarty_tpl);?>
" class="city_name">全部</a>
		  <?php  $_smarty_tpl->tpl_vars['pid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pid']->key => $_smarty_tpl->tpl_vars['pid']->value) {
$_smarty_tpl->tpl_vars['pid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['pid']->key;
?>
          <a href="<?php echo smarty_function_listurl(array('type'=>'provinceid','v'=>$_smarty_tpl->tpl_vars['pid']->value),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['provinceid']==$_smarty_tpl->tpl_vars['pid']->value) {?>city_name_active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['pid']->value];?>
</a>
          <?php } ?>
		  </div>
          <div class="Search_cityboxright">
          <a href="javascript:;" onclick="acityshow('1')" class="search_city_list_cur <?php if ($_GET['provinceid']&&!$_GET['cityid']||!is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']])) {?>search_city_active<?php }?> <?php if (!$_GET['provinceid']) {?>none<?php }?> acity_two" style="text-decoration:none;cursor:pointer;"><span class="search_city_p"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']];?>
</span><i class="search_city_p_jt"></i><i class="search_city_list_line"></i></a>
		  <a href="javascript:;" <?php if ($_GET['cityid']) {?>onclick="acityshow('2')"<?php }?> class="search_city_list_cur <?php if ($_GET['cityid']&&is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']])) {?>search_city_active<?php }?> <?php if (!$_GET['provinceid']||!$_GET['cityid']||!is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']])) {?>none<?php }?> acity_three" style="text-decoration:none;cursor:pointer;"><span class="search_city_p"><?php if (!$_GET['cityid']) {?>不限<?php } else {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];
}?></span><i class="search_city_list_line"></i></a>
		  <a href="<?php echo smarty_function_listurl(array('type'=>'provinceid','v'=>0),$_smarty_tpl);?>
" class="search_city_list_all <?php if (!$_GET['provinceid']) {?>city_name_active<?php }?>">全部</a>
          <div class="search_city_list">
		  <?php  $_smarty_tpl->tpl_vars['pid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pid']->key => $_smarty_tpl->tpl_vars['pid']->value) {
$_smarty_tpl->tpl_vars['pid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['pid']->key;
?>
          <a href="<?php echo smarty_function_listurl(array('type'=>'provinceid','v'=>$_smarty_tpl->tpl_vars['pid']->value),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['provinceid']&&!$_GET['cityid']) {
if ($_smarty_tpl->tpl_vars['key']->value>13) {?>none<?php }
} elseif ($_GET['cityid']) {
if ($_smarty_tpl->tpl_vars['key']->value>12) {?>none<?php }
} else {
if ($_smarty_tpl->tpl_vars['key']->value>14) {?>none<?php }
}?> <?php if ($_GET['provinceid']==$_smarty_tpl->tpl_vars['pid']->value) {?>city_name_active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['pid']->value];?>
</a>
          <?php } ?>
		  </div>
          <a href="javascript:;" class="search_city_list_more" id="acity">更多</a>
          </div>
          <div class="Search_cityboxclose <?php if (!$_GET['provinceid']||($_GET['provinceid']&&$_GET['cityid']&&is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']]))) {?>none<?php }?>" id="acity_two">
		  <a href="<?php echo smarty_function_listurl(array('untype'=>'cityid'),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['provinceid']&&!$_GET['cityid']&&!$_GET['three_cityid']) {?>city_name_active<?php }?>">不限</a>
		  <?php  $_smarty_tpl->tpl_vars['cid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_GET['provinceid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cid']->key => $_smarty_tpl->tpl_vars['cid']->value) {
$_smarty_tpl->tpl_vars['cid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['cid']->key;
?>
		  <a href="<?php echo smarty_function_listurl(array('type'=>'cityid','v'=>$_smarty_tpl->tpl_vars['cid']->value),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['cityid']==$_smarty_tpl->tpl_vars['cid']->value) {?>city_name_active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['cid']->value];?>
</a>
		  <?php } ?>
		  </div>
		  <div class="Search_cityboxclose <?php if (!$_GET['cityid']||!is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']])) {?>none<?php }?>" id="acity_three">
		  <a href="<?php echo smarty_function_listurl(array('untype'=>'three_cityid'),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['provinceid']&&$_GET['cityid']&&!$_GET['three_cityid']) {?>city_name_active<?php }?>">不限</a>
		  <?php  $_smarty_tpl->tpl_vars['tid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tid']->key => $_smarty_tpl->tpl_vars['tid']->value) {
$_smarty_tpl->tpl_vars['tid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['tid']->key;
?>
		  <a href="<?php echo smarty_function_listurl(array('type'=>'three_cityid','v'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['three_cityid']==$_smarty_tpl->tpl_vars['tid']->value) {?>city_name_active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['tid']->value];?>
</a>
		  <?php } ?>
		  </div>
         </div>
         </div>
		  <?php }?>
     <!--   city end-->
   		<div class="Search_jobs_form_list search_more">
   		<div class="Search_jobs_name"> 薪资：</div>
   			<div>
   			    <a href="<?php echo smarty_function_listurl(array('type'=>'salary','v'=>0),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['minsalary']==''&&$_GET['maxsalary']=='') {?>Search_jobs_sub_cur<?php }?>">全部</a>
	   			<a href="<?php echo smarty_function_listurl(array('type'=>'salary','v'=>'0_2000'),$_smarty_tpl);?>
" class="Search_jobs_cxz <?php if ($_GET['maxsalary']==2000) {?>Search_jobs_sub_cur<?php }?>">2000以下</a>
	   			<a href="<?php echo smarty_function_listurl(array('type'=>'salary','v'=>'2000_4000'),$_smarty_tpl);?>
" class="Search_jobs_cxz <?php if ($_GET['minsalary']==2000&&$_GET['maxsalary']==4000) {?>Search_jobs_sub_cur<?php }?>">2000-4000</a>
	   			<a href="<?php echo smarty_function_listurl(array('type'=>'salary','v'=>'4000_6000'),$_smarty_tpl);?>
" class="Search_jobs_cxz <?php if ($_GET['minsalary']==4000&&$_GET['maxsalary']==6000) {?>Search_jobs_sub_cur<?php }?>">4000-6000</a>
	   			<a href="<?php echo smarty_function_listurl(array('type'=>'salary','v'=>'6000_8000'),$_smarty_tpl);?>
" class="Search_jobs_cxz <?php if ($_GET['minsalary']==6000&&$_GET['maxsalary']==8000) {?>Search_jobs_sub_cur<?php }?>">6000-8000</a>
	   			<a href="<?php echo smarty_function_listurl(array('type'=>'salary','v'=>'8000_10000'),$_smarty_tpl);?>
" class="Search_jobs_cxz <?php if ($_GET['minsalary']==8000&&$_GET['maxsalary']==10000) {?>Search_jobs_sub_cur<?php }?>">8000-10000</a>
	   			<a href="<?php echo smarty_function_listurl(array('type'=>'salary','v'=>'10000'),$_smarty_tpl);?>
" class="Search_jobs_cxz <?php if ($_GET['minsalary']==10000) {?>Search_jobs_sub_cur<?php }?>">10000以上</a>
   			</div>
	        <input type="text" name="minsalary" id="min"  value="<?php if ($_GET['minsalary']) {
echo $_GET['minsalary'];
} else {
if ($_GET['maxsalary']) {?>0<?php }
}?>" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="job_xz_text"/>
	        <span class="job_xz_line">-</span>
	        <input type="text" name="maxsalary" id="max"  value="<?php if ($_GET['maxsalary']) {
echo $_GET['maxsalary'];
}?>" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="job_xz_text"/>
	        <input type="submit" value="确定" class="job_xz_bth"/>
        </div>

	   	<div class="Search_jobs_form_list search_more">
          <div class="Search_jobs_name"> 更多：</div>
          <div class="Search_jobs_sub" style="width:1090px;">
              <div class="Search_jobs_more_chlose">
                  <span class="Search_jobs_more_chlose_s"><?php if ($_GET['identity']==1) {?>企业发布<?php } elseif ($_GET['identity']==3) {?>猎头发布<?php } else { ?>职位来源<?php }?></span><i class=""></i>
                  <div class="Search_jobs_more_chlose_list none">
                      <ul class="select_hyitem">
                          <li><a class="Search_jobs_cxz width110" href="#">全部</a> </li>
                          <li><a class="Search_jobs_cxz width110" href="<?php echo smarty_function_listurl(array('identity'=>1),$_smarty_tpl);?>
">企业发布</a> </li>
                          <li><a class="Search_jobs_cxz width110" href="<?php echo smarty_function_listurl(array('identity'=>3),$_smarty_tpl);?>
">猎头发布</a> </li>
                      </ul>
                  </div>
              </div>
          <div class="Search_jobs_more_chlose">
          <span class="Search_jobs_more_chlose_s"><?php if ($_GET['hy']) {
echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];
} else { ?>公司行业<?php }?></span><i class=""></i>
          <div class="Search_jobs_more_chlose_hylist none">
          <ul>
          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
          <li><a class="Search_jobs_cxz" href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('type'=>'hy','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
          <?php } ?>
          </ul>
          </div>
          </div>

          <div class="Search_jobs_more_chlose">
          <span class="Search_jobs_more_chlose_s">
          	<?php if ($_GET['edu']) {
echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['edu']];
} else { ?>学历要求<?php }?>
          </span><i class=""></i>
          <div class="Search_jobs_more_chlose_list none">
          <ul>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <li><a class="Search_jobs_cxz width110" href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('type'=>'edu','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
            <?php } ?>
          </ul>
          </div>
          </div>

          <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_GET['exp']) {
echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['exp']];
} else { ?>工作经验<?php }?></span><i class=""></i>
          <div class="Search_jobs_more_chlose_list none">
          <ul>
          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_exp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
          <li> <a class="Search_jobs_cxz width110" href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('type'=>'exp','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
           <?php } ?>
          </ul>
          </div>
          </div>
          <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_GET['sex']) {
echo $_smarty_tpl->tpl_vars['arr_data1']->value;
} else { ?>性别要求<?php }?></span><i class=""></i>
          <div class="Search_jobs_more_chlose_list none">
          <ul>
          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_data']->value['sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
          <li><a class="Search_jobs_cxz width110" href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('type'=>'sex','v'=>$_smarty_tpl->tpl_vars['j']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a></li>
           <?php } ?>
          </ul>
          </div>
          </div>
          <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_GET['report']) {
echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['report']];
} else { ?>到岗时间<?php }?></span><i class=""></i>
          <div class="Search_jobs_more_chlose_list none">
          <ul>
          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?><li>
          <a class="Search_jobs_cxz width110" href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('type'=>'report','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
          <?php } ?>
          </ul>
          </div>
          </div>

          <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']]) {
echo $_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']];
} else { ?>更新时间<?php }?></span><i class=""></i>
          	<div class="Search_jobs_more_chlose_list none">
          	<ul>
	         <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['uptime']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?><li>
	         <a class="Search_jobs_cxz width110" href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('type'=>'uptime','v'=>$_smarty_tpl->tpl_vars['key']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a> </li><?php } ?>
          	</ul>
         	</div>
          </div>
           </div>
        </div>
        <?php if ($_GET['job1']||$_GET['job1_son']||$_GET['job_post']||$_GET['provinceid']||$_GET['cityid']||$_GET['three_cityid']||$_GET['hy']||$_GET['edu']||$_GET['exp']||$_GET['sex']||$_GET['type']||$_GET['report']||$_GET['uptime']||$_GET['minsalary']||$_GET['maxsalary']||$_GET['keyword']||$_GET['cert']) {?>
         <div class="Search_close_box">
         <div>
          <div class="Search_clear"> <a href="<?php echo smarty_function_url(array('m'=>'job'),$_smarty_tpl);?>
"> 清除所选</a></div>
         <span class="Search_close_box_s">已选条件：</span>
         </div>
            <?php if ($_GET['job1']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'job1'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">职位分类：<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['job1']];?>
</a> <?php }?>
            <?php if ($_GET['job1_son']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'job1_son'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['job1_son']];?>
</a> <?php }?>
            <?php if ($_GET['job_post']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'job_post'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['job_post']];?>
</a> <?php }?>

			<?php if ($_smarty_tpl->tpl_vars['config']->value['cityid']==''&&$_smarty_tpl->tpl_vars['config']->value['three_cityid']=='') {?>
				<?php if ($_GET['provinceid']) {?><a href="<?php echo smarty_function_listurl(array('untype'=>'provinceid'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">工作地点：<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']];?>
</a> <?php }?>
				<?php if ($_GET['cityid']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'cityid'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];?>
</a> <?php }?>
			<?php }?>

            <?php if ($_GET['three_cityid']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'three_cityid'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['three_cityid']];?>
</a> <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']]) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'hy'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">行业：<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];?>
</a> <?php }?>
            <?php if ($_GET['edu']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'edu'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">学历：<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['edu']];?>
</a> <?php }?>
            <?php if ($_GET['exp']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'exp'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">工作经验：<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['exp']];?>
</a> <?php }?>
            <?php if ($_GET['sex']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'sex'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">性别：<?php echo $_smarty_tpl->tpl_vars['arr_data1']->value;?>
</a> <?php }?>
            <?php if ($_GET['type']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'type'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">类型：<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['type']];?>
</a> <?php }?>
            <?php if ($_GET['report']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'report'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">到岗时间：<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['report']];?>
</a> <?php }?>
            <?php if ($_GET['sdate']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'sdate'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">发布时间：<?php echo $_smarty_tpl->tpl_vars['sdate']->value[$_GET['sdate']];?>
</a> <?php }?>
            <?php if ($_GET['uptime']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'uptime'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">更新时间：<?php echo $_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']];?>
</a> <?php }?>
            <?php if ($_GET['minsalary']&&$_GET['maxsalary']) {?>
            <a href="<?php echo smarty_function_listurl(array('untype'=>'salary'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">薪资：<?php echo $_GET['minsalary'];?>
-<?php echo $_GET['maxsalary'];?>
</a>
            <?php } elseif ($_GET['minsalary']&&!$_GET['maxsalary']) {?>
            <a href="<?php echo smarty_function_listurl(array('untype'=>'salary'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">薪资：<?php echo $_GET['minsalary'];?>
及以上</a>
            <?php } elseif (!$_GET['minsalary']&&$_GET['maxsalary']) {?>
            <a href="<?php echo smarty_function_listurl(array('untype'=>'salary'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">薪资：<?php echo $_GET['maxsalary'];?>
及以下</a>
            <?php }?>
            <?php if ($_GET['keyword']) {?> <a href="<?php echo smarty_function_listurl(array('untype'=>'keyword'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_GET['keyword'];?>
</a> <?php }?>
            <?php if ($_GET['cert']) {?><a href="<?php echo smarty_function_listurl(array('untype'=>'cert'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">执照已认证企业</a><?php }?>
        &nbsp; </div>
        <?php }?>
      </form>
      <div class="clear"></div>
    </div>
    <div class="search_h1_box">
      <div class="search_h1_box_title">
        <ul class="search_h1_box_list">
          <li <?php if ($_GET['urgent']==''&&$_GET['rec']=='') {?>class="search_h1_box_cur "<?php }?> class=" png"><a href="<?php echo smarty_function_listurl(array('type'=>'tp','v'=>0),$_smarty_tpl);?>
">所有职位</a><i class="search_h1_box_list_icon"></i></li>
          <li  style="display: none;" <?php if ($_GET['urgent']) {?>class="search_h1_box_cur "<?php }?> class="list_age png">
          <a href="<?php echo smarty_function_listurl(array('type'=>'tp','v'=>1),$_smarty_tpl);?>
">紧急职位</a>
          <i class="search_h1_box_list_icon search_h1_box_list_icon_jj png"></i></li>
          <li <?php if ($_GET['rec']) {?>class="search_h1_box_cur"<?php }?> class="list_rem png">
          <a href="<?php echo smarty_function_listurl(array('type'=>'tp','v'=>2),$_smarty_tpl);?>
">推荐职位</a>
          <i class="search_h1_box_list_icon search_h1_box_list_icon_tj png"></i></li>

        </ul>

        <div class="jobs_tag"> 你是不是想找：<?php  $_smarty_tpl->tpl_vars['keylist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keylist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"7","recom"=>"1","type"=>"3","item"=>"\'keylist\'","nocache"=>"")
;');$list=array();
		if($paramer[recom]){
			$tuijian = 1;
		}
		if($paramer[type]){
			$type = $paramer[type];
		}
		if($paramer[limit]){
			$limit=$paramer[limit];
		}else{
			$limit=5;
		}
		include PLUS_PATH."/keyword.cache.php";
		if($paramer[iswap]){
			$wap = "/wap";
		}else{
			$index =1;
		}
		if(is_array($keyword)){
			if($paramer[iswap]){
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v[tuijian]!=1){
						continue;
					}
					if($type && $v[type]!=$type){
						continue;
					}

					$i++;
					if($v[type]=="1"){
						$v[url] = Url("wap",array("c"=>"once","keyword"=>$v['key_name']));
						$v[type_name]='店铺招聘';
					}elseif($v['type']=="13"){
						$v['url'] = Url("wap",array("c"=>"tiny","keyword"=>$v['key_name']));
						$v['type_name']='普工简历';
					}elseif($v[type]=="3"){
						$v[url] = Url("wap",array("c"=>"job","keyword"=>$v['key_name']));
						$v[type_name]='职位';
					}elseif($v['type']=="4"){
						$v['url'] = Url("wap",array("c"=>"company","keyword"=>$v['key_name']));
						$v['type_name']='公司';
					}elseif($v['type']=="5"){
						$v['url'] = Url("wap",array("c"=>"resume","keyword"=>$v['key_name']));
						$v['type_name']='人才';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}
					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}else{
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v['tuijian']!=1){
						continue;
					}
					if($type && $v['type']!=$type){
						continue;
					}
					$i++;
					if($v['type']=="1"){
						$v['url'] = Url("once",array("keyword"=>$v['key_name']));
						$v['type_name']='店铺招聘';
					}elseif($v['type']=="2"){
						$v['url'] = Url("part",array("keyword"=>$v['key_name']));
						$v['type_name']='兼职';
					}elseif($v['type']=="13"){
						$v['url'] = Url("tiny",array("keyword"=>$v['key_name']));
						$v['type_name']='普工简历';
					}elseif($v['type']=="3"){
						$v['url'] = Url("job",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='职位';
					}elseif($v['type']=="4"){
						$v['url'] = Url("company",array("keyword"=>$v['key_name']));
						$v['type_name']='公司';
					}elseif($v['type']=="5"){
						$v['url'] = Url("resume",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='人才';
					}else if($v['type']=="12"){
						$v['url'] = Url("ask",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='问答';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}

					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}
		}$list = $list; if (!is_array($list) && !is_object($list)) { settype($list, 'array');}
foreach ($list as $_smarty_tpl->tpl_vars['keylist']->key => $_smarty_tpl->tpl_vars['keylist']->value) {
$_smarty_tpl->tpl_vars['keylist']->_loop = true;
?> <a href="<?php echo smarty_function_listurl(array('type'=>'keyword','v'=>$_smarty_tpl->tpl_vars['keylist']->value['key_title']),$_smarty_tpl);?>
" class="jos_tag_a" title="<?php echo $_smarty_tpl->tpl_vars['keylist']->value['key_title'];?>
"><?php echo $_smarty_tpl->tpl_vars['keylist']->value['key_name'];?>
</a> <?php } ?> </div>
       <div class="search_h1_box_line yun_bg_color"></div> </div>
           <div class="search_user_list_tit search_user_list_tit_bg">
          <div class="search_Filter">
           <span class="Search_jobs_c_a_ln">

找到 <span class="blod org"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span> 个职位满足条件
       </span>
           <span class="yun_search_tit">排序方式：</span>
            <ul class="search_Filter_list">
              <li <?php if ($_GET['order']=='lastdate') {?>class="search_Filter_current"<?php }?>>
              	<a href="<?php echo smarty_function_listurl(array('type'=>'order','v'=>'lastdate'),$_smarty_tpl);?>
"><span>更新时间</span><i class="search_Filter_icon"></i></a>
              </li>
              <li <?php if ($_GET['order']=='sdate') {?>class="search_Filter_current"<?php }?>>
              	<a href="<?php echo smarty_function_listurl(array('type'=>'order','v'=>'sdate'),$_smarty_tpl);?>
"><span>发布时间</span><i class="search_Filter_icon"></i></a>
              </li>
            </ul>
            <div class="search_Filter_Authenticate"> <a href="<?php if ($_GET['cert']) {
echo smarty_function_listurl(array('type'=>'cert','v'=>0),$_smarty_tpl);
} else {
echo smarty_function_listurl(array('type'=>'cert','v'=>3),$_smarty_tpl);
}?>">
              <div class="checkbox_job search_Filter_Authenticate_mt8 <?php if ($_GET['cert']) {?>iselect_cert<?php }?>" style="_margin-top:14px;"><b></b></div>
              <em>执照已认证企业</em></a></div>
          </div>
        </div>
    </div>
      <div  class="job_aq_tip" style="display: none;">用人单位不得以任何名义收取求职者任何形式的费用，如您发现类似情况请立即与我们联系下架该企业所有信息并且请举报！<a href="javascript:void(0)" onclick="$('.job_aq_tip').slideToggle()" class="job_aq_tip_icon">关闭</a></div>
    <div class="left_job_all fl">
      <div class="job_left_sidebar">
<!-----竞价置顶---------->

<?php if ($_smarty_tpl->tpl_vars['pagenum']->value<2) {?>

 <?php  $_smarty_tpl->tpl_vars['zd_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['zd_list']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$zd_list = $zd_list; if (!is_array($zd_list) && !is_object($zd_list)) { settype($zd_list, 'array');}
foreach ($zd_list as $_smarty_tpl->tpl_vars['zd_list']->key => $_smarty_tpl->tpl_vars['zd_list']->value) {
$_smarty_tpl->tpl_vars['zd_list']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['zd_list']->key;
?>
	<div class="search_job_list <?php if ($_smarty_tpl->tpl_vars['key']->value%2!='0') {
}?>">
            <div class="checkbox_job" pid="<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['id'];?>
"><i></i>
              <input type="checkbox" name="checkbox_job" class="none" id="checkbox<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['id'];?>
"/>
            </div>
        <div class="search_job_left_siaber">
          <div class="search_user_list_neme search_user_list_w240">
            <a href="<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['job_url'];?>
" class="search_job_jobs_name yun_text_color" target="_blank"><?php echo $_smarty_tpl->tpl_vars['zd_list']->value['name_n'];?>
</a>

			 <?php if ($_smarty_tpl->tpl_vars['zd_list']->value['urgent_time']>time()) {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/jobjp.png" title="紧急招聘" class="co_zzjp png"/><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['zd_list']->value['rec_time']>time()) {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/jobtj.png" title="站长推荐" class="co_zzjp png"/><?php }?>
			<?php if (in_array($_smarty_tpl->tpl_vars['zd_list']->value['id'],$_smarty_tpl->tpl_vars['lookjob']->value)) {?><span class="co_fav"><i></i><em>已浏览</em></span><?php }?>

			</div>
                      <div class="company_det"><span class="job_search_xz"><?php if ($_smarty_tpl->tpl_vars['zd_list']->value['job_salary']!='面议') {?>￥<?php }
echo $_smarty_tpl->tpl_vars['zd_list']->value['job_salary'];?>
</span>
                       <?php if ($_smarty_tpl->tpl_vars['zd_list']->value['job_exp']) {?><span class="search_job_list_box_s"><em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['zd_list']->value['job_exp'];?>
经验</em> </span><?php }?>
                       <span class="search_job_list_box_line">|</span>
                       <span class="search_job_list_box_s"><em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['zd_list']->value['job_edu'];?>
学历 </em></span>
                       <span class="search_job_list_box_line">|</span>
                       <span class="search_job_list_box_s"><em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['zd_list']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['job_city_two'];?>
</em></span></div>
        <?php if ($_smarty_tpl->tpl_vars['zd_list']->value['welfarename']) {?>
       <div class="job_welfare_tag" >
	   <?php  $_smarty_tpl->tpl_vars['waflist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['waflist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['zd_list']->value['welfarename']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['waflist']->key => $_smarty_tpl->tpl_vars['waflist']->value) {
$_smarty_tpl->tpl_vars['waflist']->_loop = true;
?>
	   <span class="job_welfare_tag_s"><i class="job_welfare_tag_s_icon"></i><?php echo $_smarty_tpl->tpl_vars['waflist']->value;?>
</span>
	   <?php } ?>
       </div>
        <?php } else { ?>
        <div class="job_describe_p">
       <?php if ($_smarty_tpl->tpl_vars['zd_list']->value['job_number']) {?><span class="job_describe_p_s">招聘<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['job_number'];?>
</span><?php }?>
      <?php if ($_smarty_tpl->tpl_vars['zd_list']->value['job_age']) {?> <span class="job_describe_p_s">年龄<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['job_age'];?>
</span><?php }?>
       <?php if ($_smarty_tpl->tpl_vars['zd_list']->value['sex_n']) {?><span class="job_describe_p_s">性别<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['sex_n'];?>
</span><?php }?>
        </div>
         <?php }?>

          </div>
           <div class="company_det_c_name">
           <div class="search_job_com_t_name">
           <a href="<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['com_url'];?>
" target="_blank" class="search_job_com_name"><?php echo $_smarty_tpl->tpl_vars['zd_list']->value['com_n'];?>
</a>
          <?php if ($_smarty_tpl->tpl_vars['zd_list']->value['ratlogo']!='') {?><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['ratlogo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['ratname'];?>
"  /><?php }?> <?php if ($_smarty_tpl->tpl_vars['zd_list']->value['yyzz_status']=='1') {?> <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/disc_icon10.png" title="营业执照已审核" class="png"> <?php }?>
          </div>
           <div class="company_det_hy">
            <div class="">行业：<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['hy_n'];?>
 </div>
            <div class="">性质：<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['pr_n'];?>
 | <?php echo $_smarty_tpl->tpl_vars['zd_list']->value['mun_n'];?>
</div>
            </div>
            </div>
           <div class="yun_joblist_time"> <span class="resume_list_jobzd" >置顶</span> </div>
           <div class="yun_joblist_ope">

		   <?php if (in_array($_smarty_tpl->tpl_vars['zd_list']->value['id'],$_smarty_tpl->tpl_vars['useridjob']->value)) {?>
			 <a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$zd_list.id`'),$_smarty_tpl);?>
" target="_blank" class="search_job_Apply_fast_ysq">已申请</a>
		    <?php } else { ?>
		   <a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$zd_list.id`'),$_smarty_tpl);?>
" target="_blank" class="search_job_Apply_fast">查看</a>
		   <?php }?>
           <div class="yun_job_operation_d">

          <?php if ($_smarty_tpl->tpl_vars['usertype']->value==1) {?>
		  <?php if (in_array($_smarty_tpl->tpl_vars['zd_list']->value['id'],$_smarty_tpl->tpl_vars['favjob']->value)) {?>
          <a href="javascript:fav_job('<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['id'];?>
','1');" class="yun_job_operation_ysc" rel="nofollow">已收藏</a>
          <?php } else { ?>
          <a href="javascript:fav_job('<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['id'];?>
','1');" class="yun_job_operation_sc scjobid<?php echo $_smarty_tpl->tpl_vars['zd_list']->value['id'];?>
" rel="nofollow">收藏</a>
          <?php }?>
          <?php } else { ?>
          <?php if ($_smarty_tpl->tpl_vars['uid']->value) {?>
          <a href="javascript:void(0);" onclick="layer.msg('只有个人用户才能收藏',2,8)" class="yun_job_operation_sc" rel="nofollow">收藏</a>
          <?php } else { ?>
          <a href="javascript:void(0);" onclick="showlogin('1');" class="yun_job_operation_sc" rel="nofollow">收藏</a>
          <?php }?>
          <?php }?>
    </div>  </div>
        </div>
  <?php } ?>
<?php }?>

<!-----竞价置顶end---------->

        <?php  $_smarty_tpl->tpl_vars['job_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job_list']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$job_list = $job_list; if (!is_array($job_list) && !is_object($job_list)) { settype($job_list, 'array');}
foreach ($job_list as $_smarty_tpl->tpl_vars['job_list']->key => $_smarty_tpl->tpl_vars['job_list']->value) {
$_smarty_tpl->tpl_vars['job_list']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['job_list']->key;
?>
        <div class="search_job_list <?php if ($_smarty_tpl->tpl_vars['key']->value%2!='0') {
}?>">
			 <div class="checkbox_job" pid="<?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
"><i></i>
              <input type="checkbox" name="checkbox_job" class="none" id="checkbox<?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
"/>
            </div>
        <div class="search_job_left_siaber posirel">
            <!--判断职位发布者-->
            <?php if ($_smarty_tpl->tpl_vars['job_list']->value['identity']==3) {?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_lie.png" class="ico_flag1"/>
            <?php } else { ?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_qi.png" class="ico_flag1"/>
            <?php }?>
          <div class="search_user_list_neme search_user_list_w240">
            <a href="<?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_url'];?>
" class="search_job_jobs_name yun_text_color" target="_blank"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['name_n'];?>
</a>

            <?php if ($_smarty_tpl->tpl_vars['job_list']->value['urgent_time']>time()) {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/jobjp.png" title="紧急招聘" class="co_zzjp png"/><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['job_list']->value['rec_time']>time()) {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/jobtj.png"  title="站长推荐" class="co_zzjp png"/><?php }?>
			<?php if (in_array($_smarty_tpl->tpl_vars['job_list']->value['id'],$_smarty_tpl->tpl_vars['lookjob']->value)) {?><span class="co_fav"><i></i><em>已浏览</em></span><?php }?>
			</div>
                      <div class="company_det"><span class="job_search_xz"><?php if ($_smarty_tpl->tpl_vars['job_list']->value['job_salary']!='面议') {?>￥<?php }
echo $_smarty_tpl->tpl_vars['job_list']->value['job_salary'];?>
</span>
                       <?php if ($_smarty_tpl->tpl_vars['job_list']->value['job_exp']) {?><span class="search_job_list_box_s"><em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_exp'];?>
经验</em> </span><span class="search_job_list_box_line">|</span><?php }?>
                       <span class="search_job_list_box_s"><em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_edu'];?>
学历 </em></span>
                       <span class="search_job_list_box_line">|</span>
                       <span class="search_job_list_box_s"><em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_city_two'];?>
</em></span>
                       </div>
      <?php if ($_smarty_tpl->tpl_vars['job_list']->value['welfarename']) {?>
       <div class="job_welfare_tag" >
	   <?php  $_smarty_tpl->tpl_vars['waflist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['waflist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job_list']->value['welfarename']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['waflist']->key => $_smarty_tpl->tpl_vars['waflist']->value) {
$_smarty_tpl->tpl_vars['waflist']->_loop = true;
?>
	   <span class="job_welfare_tag_s"><i class="job_welfare_tag_s_icon"></i><?php echo $_smarty_tpl->tpl_vars['waflist']->value;?>
</span>
	   <?php } ?>
       </div>
        <?php } else { ?>
        <div class="job_describe_p">
       <?php if ($_smarty_tpl->tpl_vars['job_list']->value['job_number']) {?><span class="job_describe_p_s">招聘<?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_number'];?>
</span><?php }?>
      <?php if ($_smarty_tpl->tpl_vars['job_list']->value['job_age']) {?> <span class="job_describe_p_s">年龄<?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_age'];?>
</span><?php }?>
      <?php if ($_smarty_tpl->tpl_vars['job_list']->value['sex_n']) {?> <span class="job_describe_p_s">性别<?php echo $_smarty_tpl->tpl_vars['job_list']->value['sex_n'];?>
</span><?php }?>
        </div>
         <?php }?>



          </div>
           <div class="company_det_c_name">
           <div class="search_job_com_t_name">
               <?php if ($_smarty_tpl->tpl_vars['job_list']->value['identity']==3) {?>
               <label class="search_job_com_name"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['com_name'];?>
</label>
               <?php } else { ?>
               <a href="<?php echo $_smarty_tpl->tpl_vars['job_list']->value['com_url'];?>
" target="_blank" class="search_job_com_name"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['com_n'];?>
</a>
               <?php }?>

          <?php if ($_smarty_tpl->tpl_vars['job_list']->value['ratlogo']!='') {?><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['job_list']->value['ratlogo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['job_list']->value['ratname'];?>
"  /><?php }?> <?php if ($_smarty_tpl->tpl_vars['job_list']->value['yyzz_status']=='1') {?> <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/disc_icon10.png" title="营业执照已审核" class="png"> <?php }?>
          </div>
           <div class="company_det_hy">
            <div class="">行业：<?php echo $_smarty_tpl->tpl_vars['job_list']->value['hy_n'];?>
 </div>
            <div class="">性质：<?php echo $_smarty_tpl->tpl_vars['job_list']->value['pr_n'];?>
 | <?php echo $_smarty_tpl->tpl_vars['job_list']->value['mun_n'];?>
</div>
            </div>
            </div>
          <div class="yun_joblist_time">  <span class="search_job_data" >

          <?php if ($_smarty_tpl->tpl_vars['job_list']->value['time']=='昨天'||$_smarty_tpl->tpl_vars['job_list']->value['redtime']=='1') {?>
          	<span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['time'];?>
</span>
          <?php } else { ?>
         	<?php echo $_smarty_tpl->tpl_vars['job_list']->value['time'];?>

          <?php }?>

          </span> </div>
           <div class="yun_joblist_ope">
		   <?php if (in_array($_smarty_tpl->tpl_vars['job_list']->value['id'],$_smarty_tpl->tpl_vars['useridjob']->value)) {?>
			 <a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$job_list.id`'),$_smarty_tpl);?>
" target="_blank" class="search_job_Apply_fast_ysq">已申请</a>
		    <?php } else { ?>
		   <a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$job_list.id`'),$_smarty_tpl);?>
" target="_blank" class="search_job_Apply_fast ">查看</a>
		   <?php }?>
            <div class="yun_job_operation_d">

          <?php if ($_smarty_tpl->tpl_vars['usertype']->value==1) {?>
		  <?php if (in_array($_smarty_tpl->tpl_vars['job_list']->value['id'],$_smarty_tpl->tpl_vars['favjob']->value)) {?><a href="javascript:fav_job('<?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
','1');" class="yun_job_operation_ysc">已收藏</a> <?php } else { ?>   <a href="javascript:fav_job('<?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
','1');" class="yun_job_operation_sc scjobid<?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
">收藏</a><?php }?>
          <?php } else { ?>
              <?php if ($_smarty_tpl->tpl_vars['uid']->value) {?>
              <a href="javascript:void(0);" onclick="layer.msg('只有个人用户才能收藏', 2, 8)" class="yun_job_operation_sc" rel="nofollow">收藏</a>
              <?php } else { ?>
              <a href="javascript:void(0);" onclick="showlogin('1');" class="yun_job_operation_sc" rel="nofollow">收藏</a>
              <?php }?>
          <?php }?>
    </div>  </div>
        </div>
        <?php } ?>
        <?php if ($_smarty_tpl->tpl_vars['total']->value!=0||is_array($_smarty_tpl->tpl_vars['zd_list']->value)) {?>
        <div class="All_post_list fl">
          <div class="checkbox_all" onclick="checkAll();"><i></i>全选（当前列表）</div>
          <?php if ($_smarty_tpl->tpl_vars['usertype']->value==1) {?>
          <a id="comindex_sqjob" class="sq_post yun_bg_color" title="申请选中职位" href="javascript:;" rel="nofollow">申请选中职位</a>
          <a id="comindex_favjob" class="sq_post sq_post_sc" title="收藏选中职位" href="javascript:" rel="nofollow">收藏选中职位</a>
          <?php } else { ?>
              <?php if ($_smarty_tpl->tpl_vars['uid']->value) {?>
              <a class="sq_post yun_bg_color" href="javascript:void(0);" onclick="layer.msg('只有个人用户才能申请', 2, 8)" rel="nofollow">申请选中职位</a>
              <a class="sq_post sq_post_sc" href="javascript:void(0);" onclick="layer.msg('只有个人用户才能收藏', 2, 8)" rel="nofollow">收藏选中职位</a>
              <?php } else { ?>
              <a class="sq_post yun_bg_color" href="javascript:void(0);" onclick="showlogin('1');" rel="nofollow">申请选中职位</a>
              <a class="sq_post sq_post_sc" href="javascript:void(0);" onclick="showlogin('1');" rel="nofollow">收藏选中职位</a>
              <?php }?>
          <?php }?>
           </div>
        <div class="clear"></div>
        <div class="search_pages">
          <div class="pages"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
        </div>
        <input value='<?php echo $_GET['ltype'];?>
' type='hidden' id='ltype'/>
        <?php } else { ?>
        <!--没搜索到-->
        <div class="seachno">
          <div class="seachno_left"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" width="144" height="102"></div>
          <div class="listno-content"> <strong>很抱歉，没有找到满足条件的职位</strong><br>
            <span> 建议您：<br>
            1、适当减少已选择的条件<br>
            2、适当删减或更改搜索关键字<br>
            </span> <span> 热门关键字：<br>
            <?php  $_smarty_tpl->tpl_vars['klist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['klist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"7","recom"=>"1","type"=>"3","item"=>"\'klist\'","nocache"=>"")
;');$list=array();
		if($paramer[recom]){
			$tuijian = 1;
		}
		if($paramer[type]){
			$type = $paramer[type];
		}
		if($paramer[limit]){
			$limit=$paramer[limit];
		}else{
			$limit=5;
		}
		include PLUS_PATH."/keyword.cache.php";
		if($paramer[iswap]){
			$wap = "/wap";
		}else{
			$index =1;
		}
		if(is_array($keyword)){
			if($paramer[iswap]){
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v[tuijian]!=1){
						continue;
					}
					if($type && $v[type]!=$type){
						continue;
					}

					$i++;
					if($v[type]=="1"){
						$v[url] = Url("wap",array("c"=>"once","keyword"=>$v['key_name']));
						$v[type_name]='店铺招聘';
					}elseif($v['type']=="13"){
						$v['url'] = Url("wap",array("c"=>"tiny","keyword"=>$v['key_name']));
						$v['type_name']='普工简历';
					}elseif($v[type]=="3"){
						$v[url] = Url("wap",array("c"=>"job","keyword"=>$v['key_name']));
						$v[type_name]='职位';
					}elseif($v['type']=="4"){
						$v['url'] = Url("wap",array("c"=>"company","keyword"=>$v['key_name']));
						$v['type_name']='公司';
					}elseif($v['type']=="5"){
						$v['url'] = Url("wap",array("c"=>"resume","keyword"=>$v['key_name']));
						$v['type_name']='人才';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}
					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}else{
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v['tuijian']!=1){
						continue;
					}
					if($type && $v['type']!=$type){
						continue;
					}
					$i++;
					if($v['type']=="1"){
						$v['url'] = Url("once",array("keyword"=>$v['key_name']));
						$v['type_name']='店铺招聘';
					}elseif($v['type']=="2"){
						$v['url'] = Url("part",array("keyword"=>$v['key_name']));
						$v['type_name']='兼职';
					}elseif($v['type']=="13"){
						$v['url'] = Url("tiny",array("keyword"=>$v['key_name']));
						$v['type_name']='普工简历';
					}elseif($v['type']=="3"){
						$v['url'] = Url("job",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='职位';
					}elseif($v['type']=="4"){
						$v['url'] = Url("company",array("keyword"=>$v['key_name']));
						$v['type_name']='公司';
					}elseif($v['type']=="5"){
						$v['url'] = Url("resume",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='人才';
					}else if($v['type']=="12"){
						$v['url'] = Url("ask",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='问答';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}

					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}
		}$list = $list; if (!is_array($list) && !is_object($list)) { settype($list, 'array');}
foreach ($list as $_smarty_tpl->tpl_vars['klist']->key => $_smarty_tpl->tpl_vars['klist']->value) {
$_smarty_tpl->tpl_vars['klist']->_loop = true;
?> <a href="<?php echo smarty_function_listurl(array('type'=>'keyword','v'=>$_smarty_tpl->tpl_vars['klist']->value['key_title']),$_smarty_tpl);?>
" class="jos_tag_a" title="<?php echo $_smarty_tpl->tpl_vars['klist']->value['key_title'];?>
"><?php echo $_smarty_tpl->tpl_vars['klist']->value['key_name'];?>
</a> <?php } ?></span> </div>
        </div>
        <?php }?> </div>
    </div>
    <div class="job_recommendation">
       <div class="job_recommendation_title"><span class="job_recommendation_span">推荐职位</span><a href="javascript:void(0)" onclick="exchange();" class="job_right_box_more png" rel="nofollow">换一组</a></div>
       <ul class="job_recommendation_list">
          <input type="hidden" value='2' id='exchangep'/>
          <?php  $_smarty_tpl->tpl_vars['blist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blist']->_loop = false;
$blist = $blist; if (!is_array($blist) && !is_object($blist)) { settype($blist, 'array');}
foreach ($blist as $_smarty_tpl->tpl_vars['blist']->key => $_smarty_tpl->tpl_vars['blist']->value) {
$_smarty_tpl->tpl_vars['blist']->_loop = true;
?>
          <li> <a href="<?php echo $_smarty_tpl->tpl_vars['blist']->value['job_url'];?>
" class="job_recommendation_jobname"><?php echo $_smarty_tpl->tpl_vars['blist']->value['name_n'];?>
</a>
          <div  class="job_recommendation_msg"><span class="job_recommendation_city"><?php echo $_smarty_tpl->tpl_vars['blist']->value['job_city_two'];
echo $_smarty_tpl->tpl_vars['blist']->value['job_city_three'];?>
</span><span class="job_recommendation_jy"><?php echo $_smarty_tpl->tpl_vars['blist']->value['job_exp'];?>
经验</span><span class="job_recommendation_xl"><?php echo $_smarty_tpl->tpl_vars['blist']->value['job_edu'];?>
学历</span>  </div>
          <a href="<?php echo $_smarty_tpl->tpl_vars['blist']->value['com_url'];?>
" class="job_recommendation_Comname"><?php echo $_smarty_tpl->tpl_vars['blist']->value['com_n'];?>
</a>
          <span class="job_recommendation_xz"><em class="job_right_box_list_c"><?php if ($_smarty_tpl->tpl_vars['blist']->value['job_salary']!='面议') {?>￥<?php }
echo $_smarty_tpl->tpl_vars['blist']->value['job_salary'];?>
 </em></span> </li>
          <?php } ?>
        </ul>
    </div>
  <div class="yun_content">
    <div class="recomme_det">
      <h3 class=""><span class="recomme_det_hh">推荐企业</span></h3>
      <div class="co_recom">
        <ul>
            <?php  $_smarty_tpl->tpl_vars['com'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['com']->_loop = false;
$com = $com; if (!is_array($com) && !is_object($com)) { settype($com, 'array');}
foreach ($com as $_smarty_tpl->tpl_vars['com']->key => $_smarty_tpl->tpl_vars['com']->value) {
$_smarty_tpl->tpl_vars['com']->_loop = true;
?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['com']->value['com_url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['com']->value['logo'];?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_icon'];?>
',2);" /><p><?php echo mb_substr($_smarty_tpl->tpl_vars['com']->value['name'],0,13,'gbk');?>
</p></a></li>
			<?php } ?>
        </ul>
      </div>
    </div>
    <!--
    <div class="recomme_det">
      <h3 class=""><span class="recomme_det_hh"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
为您提供人才网最新招聘信息</span></h3>
      <div class="co_recom co_recom_link">
			<dl>
				<dt>周边招聘：</dt>
				<dd>
                <?php if ($_smarty_tpl->tpl_vars['zpthreecityid']->value) {?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['zpthreecityid']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'three_cityid','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['zpcityid']->value) {?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['zpcityid']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'cityid','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php } else { ?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'provinceid','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php }?>
				</dd>
			</dl>
			<dl>
				<dt>招聘频道：</dt>
				<dd>
                <?php if ($_smarty_tpl->tpl_vars['zpjobpost']->value) {?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['zpjobpost']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'job_post','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['zpjob1son']->value) {?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['zpjob1son']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'job1_son','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php } else { ?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'job1','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php }?>
				</dd>
			</dl>
			<dl style="border-bottom:0;">
				<dt>热门搜索：</dt>
				<dd>
                <?php  $_smarty_tpl->tpl_vars['keylist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keylist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"20","recom"=>"1","type"=>"3","item"=>"\'keylist\'","nocache"=>"")
;');$list=array();
		if($paramer[recom]){
			$tuijian = 1;
		}
		if($paramer[type]){
			$type = $paramer[type];
		}
		if($paramer[limit]){
			$limit=$paramer[limit];
		}else{
			$limit=5;
		}
		include PLUS_PATH."/keyword.cache.php";
		if($paramer[iswap]){
			$wap = "/wap";
		}else{
			$index =1;
		}
		if(is_array($keyword)){
			if($paramer[iswap]){
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v[tuijian]!=1){
						continue;
					}
					if($type && $v[type]!=$type){
						continue;
					}

					$i++;
					if($v[type]=="1"){
						$v[url] = Url("wap",array("c"=>"once","keyword"=>$v['key_name']));
						$v[type_name]='店铺招聘';
					}elseif($v['type']=="13"){
						$v['url'] = Url("wap",array("c"=>"tiny","keyword"=>$v['key_name']));
						$v['type_name']='普工简历';
					}elseif($v[type]=="3"){
						$v[url] = Url("wap",array("c"=>"job","keyword"=>$v['key_name']));
						$v[type_name]='职位';
					}elseif($v['type']=="4"){
						$v['url'] = Url("wap",array("c"=>"company","keyword"=>$v['key_name']));
						$v['type_name']='公司';
					}elseif($v['type']=="5"){
						$v['url'] = Url("wap",array("c"=>"resume","keyword"=>$v['key_name']));
						$v['type_name']='人才';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}
					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}else{
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v['tuijian']!=1){
						continue;
					}
					if($type && $v['type']!=$type){
						continue;
					}
					$i++;
					if($v['type']=="1"){
						$v['url'] = Url("once",array("keyword"=>$v['key_name']));
						$v['type_name']='店铺招聘';
					}elseif($v['type']=="2"){
						$v['url'] = Url("part",array("keyword"=>$v['key_name']));
						$v['type_name']='兼职';
					}elseif($v['type']=="13"){
						$v['url'] = Url("tiny",array("keyword"=>$v['key_name']));
						$v['type_name']='普工简历';
					}elseif($v['type']=="3"){
						$v['url'] = Url("job",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='职位';
					}elseif($v['type']=="4"){
						$v['url'] = Url("company",array("keyword"=>$v['key_name']));
						$v['type_name']='公司';
					}elseif($v['type']=="5"){
						$v['url'] = Url("resume",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='人才';
					}else if($v['type']=="12"){
						$v['url'] = Url("ask",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='问答';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}

					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}
		}$list = $list; if (!is_array($list) && !is_object($list)) { settype($list, 'array');}
foreach ($list as $_smarty_tpl->tpl_vars['keylist']->key => $_smarty_tpl->tpl_vars['keylist']->value) {
$_smarty_tpl->tpl_vars['keylist']->_loop = true;
?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['keylist']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['keylist']->value['key_name'];?>
</a>
                <?php } ?>
				</dd>
			</dl>
      </div>
    </div>-->
  </div>
</div>
</div>
<div id="sqjob_show" class="none" style="float:left">
  <div class="Pop-up_logoin"  style="width:360px; padding:10px 10px;">
    <div class="Pop-up_logoin_sq" id="resume_job">
     <div class="job_sq_tit">选择简历：</div>
     <div style="clear:both"></div>
      <div class="POp_up_r"></div>
    </div>
    <div style="clear:both"></div>
    <div class="job_sq_tit_sq" style="margin-top:10px;">
      <input id="click_comindex_sqjob" class="login_button2" type="button" value="提交申请" name="Submit"/>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/lazyload.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
",integral_pricename='<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
';
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/data/plus/job.cache.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/data/plus/industry.cache.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/class.public.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/com_index.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/search.js" type="text/javascript"><?php echo '</script'; ?>
>
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
DD_belatedPNG.fix('.png,.search_job_data,.yun_job_operation_sc');
<?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
>
	$(document).ready(function(){
		$("#form").submit(function(e){
			var min = $("#min").val();
			var max = $("#max").val();
			if(min && max && parseInt(max) < parseInt(min)){
				$("#min").val(max);
				$("#max").val(min);
			}
		});
	});
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/login.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/index_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
