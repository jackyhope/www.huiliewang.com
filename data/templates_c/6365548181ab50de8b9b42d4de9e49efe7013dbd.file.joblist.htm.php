<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 09:41:50
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/joblist.htm" */ ?>
<?php /*%%SmartyHeaderCode:9157867185bbab5de0abab4-96781715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6365548181ab50de8b9b42d4de9e49efe7013dbd' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/joblist.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9157867185bbab5de0abab4-96781715',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'industry_name' => 0,
    'city_name' => 0,
    'uptime' => 0,
    'industry_index' => 0,
    'v' => 0,
    'city_index' => 0,
    'key' => 0,
    'lt_style' => 0,
    'job_list' => 0,
    'total' => 0,
    'zd_list' => 0,
    'pagenav' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbab5de21ac38_51501302',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbab5de21ac38_51501302')) {function content_5bbab5de21ac38_51501302($_smarty_tpl) {?><?php if (!is_callable('smarty_function_parse_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.parse_url.php';
?><?php global $db,$db_config,$config;
		$time = time();
		
	
	
        eval('$paramer=array("ispage"=>"1","limit"=>"12","item"=>"\'job_list\'","w"=>"\"auto.w\"","identity"=>"\"auto.identity\"","hy"=>"\"auto.hy\"","provinceid"=>"\"auto.provinceid\"","minsalary"=>"\"auto.minsalary\"","maxsalary"=>"\"auto.maxsalary\"","uptime"=>"\"auto.uptime\"","job_id"=>"\"auto.job_id\"","job_name"=>"\"auto.job_name\"","com_name"=>"\"auto.com_name\"","keyword"=>"\"auto.keyword\"","orderby"=>"\"auto.orderby\"","nocache"=>"")
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
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
<div class="top_nav_list">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<div class="w1000">
<div class="admin_mainbody" style="margin-top: 20px;">
  <div class=down_box style="margin-top: 0px;">
    <div class=admincont_box>
        <div class="search_content">
            <div class="Search_jobs_form_list" style="margin-top: 20px;padding-bottom: 20px;">

                <div class="shaixuan" style="font-weight: inherit;height: 32px;line-height: 32px;float: left;">职位编号：</div>
                <div class="Search_jobs_sub" style="float: left;width: 140px;">
                    <input type="text" class="Search_jobs_more_chlose job_id" value="<?php echo $_GET['job_id'];?>
"  name="job_id" style="padding-left: 10px;cursor: inherit;width: 140px;">
                </div>
                <div class="shaixuan" style="font-weight: inherit;height: 32px;line-height: 32px;float: left;margin-left: 20px;">职位名称：</div>
                <div class="Search_jobs_sub" style="float: left;width: 140px;">
                    <input type="text" class="Search_jobs_more_chlose job_name" value="<?php echo $_GET['job_name'];?>
"   name="job_name" style="padding-left: 10px;cursor: inherit;width: 140px;">
                </div>
                <div class="shaixuan" style="font-weight: inherit;height: 32px;line-height: 32px;float: left;margin-left: 20px;">公司名称：</div>
                <div class="Search_jobs_sub" style="float: left;width: 140px;">
                    <input type="text" class="Search_jobs_more_chlose com_name" value="<?php echo $_GET['com_name'];?>
"   name="com_name" style="padding-left: 10px;cursor: inherit;width: 140px;">
                </div>
                <div class="shaixuan" style="font-weight: inherit;height: 32px;line-height: 32px;float: left;margin-left: 20px;">关键词：</div>
                <div class="Search_jobs_sub" style="float: left;width: 140px;">
                    <input type="text" class="Search_jobs_more_chlose keyword" name="keyword" style="padding-left: 10px;cursor: inherit;width: 140px;">
                </div>
                <input type="submit" class="sousuo_btns" style="height: 30px;margin-left: 20px;line-height: 30px;" value="搜索"/>
            </div>

        <div class="Search_jobs_form_list search_more">
            <div class="shaixuan">
                <label class="sxtitle">筛选条件：</label>
                <?php if ($_GET['identity']) {?>
                <label class="select_hy">
                    <a class="Search_jobs_c_a disc_fac mtop0" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'identity'=>''),$_smarty_tpl);?>
">职位来源：<?php if ($_GET['identity']==1) {?>企业发布<?php } elseif ($_GET['identity']==3) {?>猎头发布<?php }?></a>
                </label>
                <?php }?>

                <?php if ($_GET['hy']) {?>
                <label class="select_hy">
                    <a class="Search_jobs_c_a disc_fac mtop0" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'hy'=>''),$_smarty_tpl);?>
">行业：<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];?>
</a>
                </label>
                <?php }?>
                <?php if ($_GET['provinceid']) {?>
                <label class="select_city"><a class="Search_jobs_c_a disc_fac mtop0" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'provinceid'=>''),$_smarty_tpl);?>
">工作地点：<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']];?>
</a></label>
                <?php }?>
                <?php if ($_GET['minsalary']||$_GET['maxsalary']) {?>
                <label class="select_salery">
                    <a class="Search_jobs_c_a disc_fac mtop0" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'minsalary'=>'','maxsalary'=>''),$_smarty_tpl);?>
">年薪范围：
                        <?php if ($_GET['minsalary']&&$_GET['maxsalary']) {?>
                            <?php echo $_GET['minsalary'];?>
-<?php echo $_GET['maxsalary'];?>
万以内
                        <?php } elseif ($_GET['minsalary']&&empty($_GET['maxsalary'])) {?>
                            <?php echo $_GET['minsalary'];?>
万以上
                        <?php } elseif (empty($_GET['minsalary'])&&$_GET['maxsalary']) {?>
                            <?php echo $_GET['maxsalary'];?>
万以内
                        <?php }?>
                    </a></label>
                <?php }?>
                <?php if ($_GET['uptime']) {?>
                <label class="select_time"><a class="Search_jobs_c_a disc_fac mtop0" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'uptime'=>''),$_smarty_tpl);?>
">更新时间：<?php echo $_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']];?>
</a></label>
                <?php }?>
            </div>
            <div class="Search_jobs_sub" style="margin-left: 20px;margin-top: 14px;">
                <div class="Search_jobs_more_chlose">
                    <span class="Search_jobs_more_chlose_s"><?php if ($_GET['identity']==1) {?>企业发布<?php } elseif ($_GET['identity']==3) {?>猎头发布<?php } else { ?>职位来源<?php }?></span><i class=""></i>
                    <div class="Search_jobs_more_chlose_list none">
                        <ul class="select_hyitem">
                            <li><a class="Search_jobs_cxz width110" href="#">全部</a> </li>
                            <li><a class="Search_jobs_cxz width110" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','identity'=>1),$_smarty_tpl);?>
">企业发布</a> </li>
                            <li><a class="Search_jobs_cxz width110" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','identity'=>3),$_smarty_tpl);?>
">猎头发布</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="Search_jobs_more_chlose">
                    <span class="Search_jobs_more_chlose_s"><?php if ($_GET['hy']) {
echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];
} else { ?>行业类别<?php }?></span><i class=""></i>
                    <div class="Search_jobs_more_chlose_hylist none">
                        <ul class="select_hyitem">
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <li><a class="Search_jobs_cxz" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'hy'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="Search_jobs_more_chlose">
          <span class="Search_jobs_more_chlose_s">工作地点</span><i class=""></i>
                    <div class="Search_jobs_more_chlose_list none" style="width: 415px;">
                        <ul class="select_cityitem">
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <li style="width: inherit;"><a class="Search_jobs_cxz" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'provinceid'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <div class="Search_jobs_more_chlose">
                    <span class="Search_jobs_more_chlose_s">
                        <?php if ($_GET['minsalary']&&$_GET['maxsalary']) {?>
                            <?php echo $_GET['minsalary'];?>
-<?php echo $_GET['maxsalary'];?>
万以内
                        <?php } elseif ($_GET['minsalary']&&empty($_GET['maxsalary'])) {?>
                            <?php echo $_GET['minsalary'];?>
万以上
                        <?php } elseif (empty($_GET['minsalary'])&&$_GET['maxsalary']) {?>
                            <?php echo $_GET['maxsalary'];?>
万以内
                        <?php } else { ?>
                        年薪范围
                        <?php }?>
                        </span>
                    <i class=""></i>
                    <div class="Search_jobs_more_chlose_list none" style="width: 415px;height: 80px;">
                        <ul class="select_hyitem">
                            <li style="width: inherit;"> <a class="Search_jobs_cxz" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','maxsalary'=>10),$_smarty_tpl);?>
">10万以内</a></li>
                            <li style="width: inherit;"> <a class="Search_jobs_cxz" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','minsalary'=>10,'maxsalary'=>20),$_smarty_tpl);?>
">10-20万以内</a></li>
                            <li style="width: inherit;"> <a class="Search_jobs_cxz" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','minsalary'=>20,'maxsalary'=>30),$_smarty_tpl);?>
">20-30万以内</a></li>
                            <li style="width: inherit;"> <a class="Search_jobs_cxz" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','minsalary'=>30,'maxsalary'=>50),$_smarty_tpl);?>
">30-50万以内</a></li>
                            <li style="width: inherit;"> <a class="Search_jobs_cxz" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','minsalary'=>50),$_smarty_tpl);?>
">50万以上</a></li>
                        </ul>
                        <input type="text" id="minsalary" class="saleryinput" style="margin-left: 10px;margin-top: 8px;">-<input id="maxsalary" type="text" class="saleryinput">万
                        <input type="button" value="确定" class="salery_btn">
                    </div>
                </div>
                <div class="Search_jobs_more_chlose">
                    <span class="Search_jobs_more_chlose_s"><?php if ($_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']]) {
echo $_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']];
} else { ?>更新时间<?php }?></span><i class=""></i>
                    <div class="Search_jobs_more_chlose_list none">
                        <ul class="select_hyitem">
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['uptime']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <li><a class="Search_jobs_cxz width110" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'uptime'=>$_smarty_tpl->tpl_vars['key']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a> </li><?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="paixu_btn">
                    <a class="pxbtn <?php if ($_GET['orderby']=='salary') {?>pxcur<?php }?>" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'orderby'=>'salary'),$_smarty_tpl);?>
">年薪从高到低</a>
                    <a class="pxbtn <?php if ($_GET['orderby']=='time') {?>pxcur<?php }?>" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'orderby'=>'time'),$_smarty_tpl);?>
">更新时间从新到旧</a>
                </div>
            </div>
        </div>
    </div>

        <div class="left_job_all fl">
            <div class="job_left_sidebar" style="width: 1040px;margin-left: 30px;">
                <div class="job_news_list" style="background: #f1f8ff">
                    <span class="job_news_list_span job_w90" style="padding-left: 10px;">职位编号</span>
                    <span class="job_news_list_span job_w430" style="text-align:left;">职位信息</span>
                    <!--<span class="job_news_list_span job_w110">工作地点</span>-->
                    <!--<span class="job_news_list_span job_w110">年薪</span>-->
                    <!--<span class="job_news_list_span job_w110">更新时间</span>-->
                    <span class="job_news_list_span job_w300">
                        <label class="num_tj">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/icol0.png">
                            <label class="jieshiico">服务猎头</label>
                        </label>
                        <label class="num_tj w45">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/icol1.png">
                            <label class="jieshiico">推荐候选人</label>
                        </label>
                        <label class="num_tj w45">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/icol2.png">
                            <label class="jieshiico">HR已查看</label>
                        </label>
                        <label class="num_tj w50">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/icol3.png">
                            <label class="jieshiico">HR已下载</label>
                        </label>
                        <label class="num_tj w50">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/icol4.png">
                            <label class="jieshiico">HR已拒绝</label>
                        </label>
                    </span>
                    <span class="job_news_list_span job_w180 text_cen">操作</span>
                </div>

                <?php  $_smarty_tpl->tpl_vars['job_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job_list']->_loop = false;
$job_list = $job_list; if (!is_array($job_list) && !is_object($job_list)) { settype($job_list, 'array');}
foreach ($job_list as $_smarty_tpl->tpl_vars['job_list']->key => $_smarty_tpl->tpl_vars['job_list']->value) {
$_smarty_tpl->tpl_vars['job_list']->_loop = true;
?>

                <div class="job_news_list line_heigh45" pid="<?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
">
                    <span class="job_news_list_span job_w90" style="padding-left: 10px;"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
</span>
                    <span class="job_news_list_span  job_w430 line_heigh23 posirel" style="text-align:left;">
                        <!--判断职位发布者-->
                        <?php if ($_smarty_tpl->tpl_vars['job_list']->value['identity']==3) {?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_lie.png" class="ico_flag"/>
                        <?php } else { ?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_qi.png" class="ico_flag"/>
                        <?php }?>
                        <div>
                            <a class="job_namer nowrap" href="<?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_url'];?>
" target="_blank" style="font-size: 18px;"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['name'];?>
</a>
                             <label class="lastupdate"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['lastupdate'];?>
更新</label>
                        </div>
                        <div class="mat_10">
                             <label class="salery_s" href="#"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_salary'];?>
</label><span class="xianshu">|</span>
                            <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_city_two'];?>
</label><span class="xianshu">|</span>
                            <label class="tj_time">学历:<?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_edu'];?>
</label><span class="xianshu">|</span>
                            <label class="tj_time">工作经验:<?php echo $_smarty_tpl->tpl_vars['job_list']->value['job_exp'];?>
</label>
                        </div>
                        <div class="mat_10">
                            <?php if ($_smarty_tpl->tpl_vars['job_list']->value['identity']==3) {?>
                            <label class="com_style"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['com_name'];?>
</label>
                            <?php } else { ?>
                            <a class="com_style" href="<?php echo $_smarty_tpl->tpl_vars['job_list']->value['com_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['com_name'];?>
</a>
                            <?php }?>
                            </div>
                    </span>
                    <span class="job_news_list_span job_w300 line_heigh23 mat_10">
                        <label class="num_tj"><span class="color_333"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['lietou_num'];?>
</span><br><span class="color_999">猎头</span></label>
                        <label class="num_tj"><span class="color_333"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['resume_num'];?>
</span><br><span class="color_999">候选人</span></label>
                        <label class="num_tj"><span class="color_333"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['view_num'];?>
</span><br><span class="color_999">HR查看</span></label>
                        <label class="num_tj"><span class="color_333"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['download_num'];?>
</span><br><span class="color_999">HR下载</span></label>
                        <label class="num_tj"><span class="color_333"><?php echo $_smarty_tpl->tpl_vars['job_list']->value['refuse_num'];?>
</span><br><span class="color_999">HR拒绝</span></label>
                    </span>
                    <span class="job_news_list_span job_w180">
                        <a href="index.php?c=recommend&id=<?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
" target="_blank" class="btn_hxr w90blue tuijan">推荐候选人</a>
                        <?php if ($_smarty_tpl->tpl_vars['job_list']->value['fav_job']) {?>
                        <label class="btn_hxr w65b yiguanzhu" data-id="<?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
">取消关注</label>
                        <?php } else { ?>
                        <label class="btn_hxr w65b guanzhu" data-id="<?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
">+关注</label>
                        <?php }?>
                    </span>
                </div>

                <?php } ?>

                <?php if ($_smarty_tpl->tpl_vars['total']->value!=0||is_array($_smarty_tpl->tpl_vars['zd_list']->value)) {?>

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
                    <div class="listno-content" style="line-height: 24px;"> <strong>暂无相关职位</strong><br><br>
                        <span>立即前往<a href="/member/index.php?c=job" class="linkds">平台职位库</a>浏览职位，添加关注。
                        </span>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
      </div>
      </div>
    </div>
  </div>
<?php echo '<script'; ?>
>


function onstatus(id,status){//修改招聘状态
	$.post("index.php?c=job&act=opera",{id:id,status:status},function(data){
		if(data==1){
			layer.msg('设置成功！', 2, 9,function(){window.location.reload();});return false;
		}else{
			layer.msg('设置失败！', 2, 8);
		}
	})
}
function Refresh(name){
	var chk_value =[];
	var i=0;
	$('input[name="'+name+'"]:checked').each(function(){
		chk_value.push($(this).val());
		i++;
	});
	if(chk_value.length==0){
		layer.msg("请选择要刷新的职位！",2,8);return false;
	}else{

			var num="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_jobefresh'];?>
";
			var breakmsg = '本次共刷新'+i+'个职位,需扣除'+i+'个刷新数量,或消耗'+(num*i)+'<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
！';
			layer.confirm(breakmsg,function(){
				$.post("<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?m=ajax&c=Refresh_job",{ids:chk_value},function(data){
					if(data==1){
						layer.msg("刷新成功！",2,9,function(){window.location.reload();});
					}else{
						layer.msg(data,2,8);
					}
				})
			});


	}
}
$(document).ready(function(){
	$(".job_share").hover(function(){

		var html=$(this).find('.job_share_img').html();
		layer.tips(html, this, {
			guide: 1,
			style: ['background-color:#5EA7DC;', '#5EA7DC']
		});
		$(".xubox_layer").addClass("xubox_tips_border");
	},function(){layer.closeTips();});

	$(".job_list_extension_box").hover(function(){
		$(this).find('.job_list_extension_box_list').show();
	},function(){
		$(this).find('.job_list_extension_box_list').hide();
	})
	$(".job_tck_list").click(function(){
		var cron = $(this).attr('data-cron');
		var name = $(this).attr('data-name');
		$("#autotype").val(cron);
		$(".job_box_in").html(name);
		$(".job_tck_box_pot").hide();
	});
	$(".job_box_in").click(function(e){
		$(".job_tck_box_pot").toggle();
	});
	$(document).bind("click",function(e){
		if(e.target.className != 'job_box_in'){
			$(".job_tck_box_pot").hide();
		}
	});



	$("body").on("click",".guanzhu",function () {
        var num=parseInt($(".guanzhunum").html());
	    var _this = $(this);
	    var job_id = $(this).attr("data-id");
        $.post("/index.php?m=ajax&c=favjobuser",{id:job_id},function(data){

            if(data==1){
                parent.layer.msg('关注成功！', 2, 9);
                $(".guanzhunum").html(num+1);
                _this.html("取消关注");
                _this.removeClass("guanzhu").addClass("yiguanzhu");
            }
        })

    })

    $("body").on("click",".yiguanzhu",function () {
        var num=parseInt($(".guanzhunum").html());
        var _this = $(this);
        var job_id = $(this).attr("data-id");
        layer.confirm("您确定要取消关注该职位吗？",function() {
            $.post("/member/index.php?c=job&act=del_fav",{id:job_id},function(data){
                if(data==1){
                    layer.msg('取消关注成功！', 2, 9);
                    _this.html("+关注");
                    $(".guanzhunum").html(num-1);
                    _this.removeClass("yiguanzhu").addClass("guanzhu");
                }
            })
        });


    })

    $(".Search_jobs_submit").click(function () {
        var keyword = $(".Search_jobs_text").val();
        if(keyword){
            window.location.href = location+"&keyword="+keyword;
        }
    })

    $(".salery_btn").click(function () {
        var minsalary = $("#minsalary").val();
        var maxsalary = $("#maxsalary").val();
        var url=changeUrlArg(window.location.href,"minsalary",minsalary);
        var url=changeUrlArg(url,"maxsalary",maxsalary);
       location = url;

    })

    function changeUrlArg(url, arg, val){
        var pattern = arg+'=([^&]*)';
        var replaceText = arg+'='+val;
        return url.match(pattern) ? url.replace(eval('/('+ arg+'=)([^&]*)/gi'), replaceText) : (url.match('[\?]') ? url+'&'+replaceText : url+'?'+replaceText);
    }


    $(".sousuo_btns").click(function () {
        var job_id = $(".job_id").val();
        var job_name = $(".job_name").val();
        var com_name = $(".com_name").val();
        var keyword = $(".keyword").val();

        var url=changeUrlArg(window.location.href,"job_id",job_id);
        var url=changeUrlArg(url,"job_name",job_name);
        var url=changeUrlArg(url,"com_name",com_name);
        var url=changeUrlArg(url,"keyword",keyword);
        location = url;
    })

});
<?php echo '</script'; ?>
>

<!--延期天数弹出框end-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/com_index.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/search.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/jobserver.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
