<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-09 10:20:32
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/company/default/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:5482852685bbc1070b37d95-40464915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca0498c57f226f822428b022d2a3bce8ce995b08' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/company/default/index.htm',
      1 => 1517912114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5482852685bbc1070b37d95-40464915',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'com_style' => 0,
    'usertype' => 0,
    'config' => 0,
    'com' => 0,
    'isatn' => 0,
    'ComMember' => 0,
    'num' => 0,
    'pre' => 0,
    'invite_resume' => 0,
    'member' => 0,
    'show' => 0,
    'row' => 0,
    'ProductList' => 0,
    'score' => 0,
    'mlist' => 0,
    'v' => 0,
    'urlmsg' => 0,
    'jlist' => 0,
    'pagenav' => 0,
    'city' => 0,
    'city_type' => 0,
    'city_name' => 0,
    'city_index' => 0,
    'industry_index' => 0,
    'industry_name' => 0,
    'keylist' => 0,
    'looktype' => 0,
    'look_msg' => 0,
    'NewsList' => 0,
    'lookcom' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbc10710ff871_23920164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbc10710ff871_23920164')) {function content_5bbc10710ff871_23920164($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_show')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.show.php';
if (!is_callable('smarty_function_score')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.score.php';
if (!is_callable('smarty_function_listurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.listurl.php';
if (!is_callable('smarty_function_image')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.image.php';
?><?php global $db,$db_config,$config;
		$time = time();
		
	
	
        eval('$paramer=array("ispage"=>"1","limit"=>"10","item"=>"\'jlist\'","uid"=>"\'auto.id\'","nocache"=>"")
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

		$jlist = $db->select_all("company_job",$where.$limit);

		if(is_array($jlist)){
			
			$cache_array = $db->cacheget();
			$comuid=$jobid=array();
			foreach($jlist as $key=>$value){
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
			foreach($jlist as $key=>$value){
				if($paramer[bid]){
					$noids[] = $value[id];
				}
				
				
				$jlist[$key] = $db->array_action($value,$cache_array);
				$jlist[$key][stime] = date("Y-m-d",$value[sdate]);
				$jlist[$key][etime] = date("Y-m-d",$value[edate]);
				
				 $login = $db->DB_select_once("member","uid=".$value[uid],"login_date");
               
                $jlist[$key][login_date] = $login[login_date];
				
				
				if($arr_data['sex'][$value['sex']]){
    				$jlist[$key][sex_n]=$arr_data['sex'][$value['sex']];
    			}
				$jlist[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);
				if($value[minsalary]&&$value[maxsalary]){
					$jlist[$key][job_salary] =$value[minsalary]."-".$value[maxsalary];
				}elseif($value[minsalary]){
					$jlist[$key][job_salary] =$value[minsalary]."����";
				}else{
                    $jlist[$key][job_salary] ="����";
                }
				
				if($value[identity]==3){
				 $fake_company=$db->DB_select_once("fake_company","id=".$value['fake_id']);
                    $jlist[$key][pr_n] =$fake_company[nature];
                    $jlist[$key][hy_n] =$fake_company[hy];
                    $jlist[$key][mun_n] =$fake_company[scale];
				}else{
                    $jlist[$key][yyzz_status] =$r_uid[$value['uid']][yyzz_status];
                    $jlist[$key][logo] =$r_uid[$value['uid']][logo];
                   
                    $jlist[$key][pr_n] =$r_uid[$value['uid']][pr_n];
                    $jlist[$key][hy_n] =$r_uid[$value['uid']][hy_n];
                    $jlist[$key][mun_n] =$r_uid[$value['uid']][mun_n];
                    
				}
				
				$time=$value['lastupdate'];
				
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
			
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$jlist[$key]['time'] ="һ����";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$jlist[$key]['time'] ="����";
				}elseif($time>$beginToday){	
					$jlist[$key]['time'] = date("H:i",$value['lastupdate']);
					$jlist[$key]['redtime'] =1;
				}else{
					$jlist[$key]['time'] = date("Y-m-d",$value['lastupdate']);
				}
				
				if(is_array($jlist[$key]['welfare'])&&$jlist[$key]['welfare']){
					foreach($jlist[$key]['welfare'] as $val){
						$jlist[$key]['welfarename'][]=$cache_array['comclass_name'][$val];
					}

				}
			
				if($paramer[comlen]){
					$jlist[$key][com_n] = mb_substr($value['com_name'],0,$paramer[comlen],"GBK");
				}
			    $jlist[$key][lietou_num] = $db->select_num("userid_job","identity=3 and job_id=".$value['id']." group by uid");
			    $jlist[$key][lietou_num] = $jlist[$key][lietou_num]?$jlist[$key][lietou_num]:0;
                $jlist[$key][resume_num] = $db->select_num("userid_job","identity=3 and job_id=".$value['id']);
                $jlist[$key][resume_num] = $jlist[$key][resume_num]?$jlist[$key][resume_num]:0;
                $jlist[$key][view_num] = $db->select_num("userid_job","identity=3 and is_browse=2 and job_id=".$value['id']);
                $jlist[$key][download_num] = $db->select_num("userid_job","identity=3 and is_browse=6 and job_id=".$value['id']);
                $jlist[$key][refuse_num] = $db->select_num("userid_job","identity=3 and is_browse=4 and job_id=".$value['id']);
                
                
                  $jlist[$key][fav_job]= $db->select_num("fav_job","uid=".$_COOKIE['uid']." and job_id=".$value['id']);
               
               
                $jlist[$key][myresume_num] = $db->select_num("userid_job","identity=3 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $jlist[$key][myresume_num] = $jlist[$key][myresume_num]?$jlist[$key][myresume_num]:0;
                $jlist[$key][myview_num] = $db->select_num("userid_job","identity=3 and is_browse=2 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $jlist[$key][mydownload_num] = $db->select_num("userid_job","identity=3 and is_browse=6 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                $jlist[$key][myrefuse_num] = $db->select_num("userid_job","identity=3 and is_browse=4 and uid=".$_COOKIE['uid']." and job_id=".$value['id']);
                
                if($paramer[eid]){
				    $recommend = $db->select_num("userid_job","job_id=".$value['id']." and eid=".$paramer[eid]);
				   
				    if($recommend){
				    
				        $recommend1 = $db->select_num("userid_job","job_id=".$value['id']." and eid=".$paramer[eid]." and uid=".$_COOKIE['uid']);
				        if($recommend1){
				            $jlist[$key][recommend] = 1;
				        }else{
				            $jlist[$key][recommend] = 2;
				        }
				    }else{
                        $jlist[$key][recommend] = 0;
				    }
				  
				}
                
				if($paramer[namelen]){
					if($value['rec_time']>time()){
						$jlist[$key][name_n] = "<font color='red'>".mb_substr($value['name'],0,$paramer[namelen],"GBK")."</font>";
					}else{
						$jlist[$key][name_n] = mb_substr($value['name'],0,$paramer[namelen],"GBK");
					}
				}else{
					if($value['rec_time']>time()){
						$jlist[$key]['name_n'] = "<font color='red'>".$value['name']."</font>";
					}
				}
				
				$jlist[$key][job_url] = Url("job",array("c"=>"comapply","id"=>$value[id]),"1");
				
				$jlist[$key][com_url] = Url("company",array("c"=>"show","id"=>$value[uid]));
				foreach($comrat as $k=>$v){
					if($value[rating]==$v[id]){
						$jlist[$key][color] = str_replace("#","",$v[com_color]);
						$jlist[$key][ratlogo] = $v[com_pic];
						$jlist[$key][ratname] = $v[name];
					}
				}
				if($paramer[keyword]){
					$jlist[$key][name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[name]);
					$jlist[$key][com_name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[com_name]);
					$jlist[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$jlist[$key][name_n]);
					$jlist[$key][com_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$jlist[$key][com_n]);
					$jlist[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
					$jlist[$key][job_city_two]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[cityid]]);
    			}
			}

			if(is_array($jlist)){
				if($paramer[keyword]!=""&&!empty($jlist)){
					addkeywords('3',$paramer[keyword]);
				}
			}
		} ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
/images/comapply.css" type="text/css" />
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['usertype']->value==3) {?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<div class="yun_content">
    <?php if ($_smarty_tpl->tpl_vars['usertype']->value==3) {?>
    <div class="current_Location png"> </div>
    <?php } else { ?>
    <div class="current_Location png"> ����ǰ��λ�ã�<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
">��ҳ</a> > <a href="<?php echo smarty_function_url(array('m'=>'company'),$_smarty_tpl);?>
">��ҵ�б�</a> > <span>��ҵ���� </span></div>
    <?php }?>

<div class="com_show_topbox">
<div class="com_show_topleft">
<div class="com_show_toplogo">
<img src="<?php echo $_smarty_tpl->tpl_vars['com']->value['logo'];?>
"  width="185" height="75" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_icon'];?>
',2);" alt="<?php echo $_smarty_tpl->tpl_vars['com']->value['name'];?>
"/>
</div>
</div>
<div class="com_show_topcont">
<div class="com_show_comname"><h1 class="com_show_comname_n"><?php echo mb_substr($_smarty_tpl->tpl_vars['com']->value['name'],0,20,'gbk');?>
   </h1>
    <?php if ($_smarty_tpl->tpl_vars['usertype']->value!=3) {?>
 <?php if ($_smarty_tpl->tpl_vars['usertype']->value=='1') {?>
	<?php if ($_smarty_tpl->tpl_vars['isatn']->value['id']) {?> 
	<a href="javascript:void(0)" onclick="atn('<?php echo $_smarty_tpl->tpl_vars['com']->value['uid'];?>
','<?php echo smarty_function_url(array('m'=>'ajax','c'=>'atn_company'),$_smarty_tpl);?>
')" id='atn_<?php echo $_smarty_tpl->tpl_vars['com']->value['uid'];?>
' class="com_show_comgzqx">ȡ����ע</a>
	<?php } else { ?>
	<a href="javascript:void(0)" onclick="atn('<?php echo $_smarty_tpl->tpl_vars['com']->value['uid'];?>
','<?php echo smarty_function_url(array('m'=>'ajax','c'=>'atn_company'),$_smarty_tpl);?>
')" id='atn_<?php echo $_smarty_tpl->tpl_vars['com']->value['uid'];?>
' class="com_show_comgz">��ע</a> 
	<?php }?>
<?php }?>
    <?php }?>
<?php if ($_smarty_tpl->tpl_vars['ComMember']->value['source']==6&&$_smarty_tpl->tpl_vars['ComMember']->value['claim']==0&&$_smarty_tpl->tpl_vars['ComMember']->value['email']!='') {?>
<a href="javascript:claim('<?php echo smarty_function_url(array('m'=>'ajax','c'=>'claim','uid'=>$_smarty_tpl->tpl_vars['com']->value['uid']),$_smarty_tpl);?>
');"  class="com_show_comgz">����</a>
<?php }?>
<div id="status_div"  style="display:none; width: 350px; ">
<div id="claimmsg"></div>
<div class="admin_qx_bth" style="text-align:center;padding:10px;border-radius:20px;">
<input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" style="width:70px;height:29px;color:#fff;border:none;font-size:14px;border-radius:3px;background:#f60;" value='�ر�'>
</div>
</div>
 </div>
<div class="com_show_cominfo">
<?php if ($_smarty_tpl->tpl_vars['com']->value['hy_info']) {?><span class="com_show_cominfo_s"><i class="com_show_cominfo_icon  com_show_cominfo_icon_hy"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['hy_info'];?>
</span><?php }?>
<?php if ($_smarty_tpl->tpl_vars['com']->value['provinceid']) {?><span class="com_show_cominfo_s"><i class="com_show_cominfo_icon  com_show_cominfo_icon_city"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['provinceid'];?>
 </span>   <?php }?>     
<?php if ($_smarty_tpl->tpl_vars['com']->value['pr_info']) {?><span class="com_show_cominfo_s"><i class="com_show_cominfo_icon  com_show_cominfo_icon_xz"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['pr_info'];?>
 </span><?php }?>          
<?php if ($_smarty_tpl->tpl_vars['com']->value['mun_info']) {?><span class="com_show_cominfo_s "><i class="com_show_cominfo_icon  com_show_cominfo_icon_rs"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['mun_info'];?>
 </span> <?php }?>         
<?php if ($_smarty_tpl->tpl_vars['com']->value['money']) {?><span class="com_show_cominfo_s"><i class="com_show_cominfo_icon  com_show_cominfo_icon_zj"></i>ע��<?php echo $_smarty_tpl->tpl_vars['com']->value['money'];?>
�� </span><?php }?>
<?php if ($_smarty_tpl->tpl_vars['com']->value['sdate']) {?><span class="com_show_cominfo_s"><i class="com_show_cominfo_icon  com_show_cominfo_icon_time"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['sdate'];?>
����</span><?php }?>
</div>
<div class="com_show_info_sj_box">
<div class="com_show_info_sj">
<div class="com_show_info_sj_list com_show_info_sj_list_frist"><span class="com_show_info_sj_list_n"><?php echo $_smarty_tpl->tpl_vars['num']->value;?>
</span>��Ƹְλ </div>         
<div class="com_show_info_sj_list"><span class="com_show_info_sj_list_n"><?php echo $_smarty_tpl->tpl_vars['pre']->value;?>
%</span>������ʱ������</div>          
<!--<div class="com_show_info_sj_list"><span class="com_show_info_sj_list_n"><?php echo $_smarty_tpl->tpl_vars['invite_resume']->value;?>
</span>��������</div>-->
<div class="com_show_info_sj_list com_show_info_sj_list_end"><span class="com_show_info_sj_list_n"><?php if ($_smarty_tpl->tpl_vars['member']->value['login_date']) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['member']->value['login_date'],"%Y-%m-%d");
} else { ?>δ��¼ <?php }?></span>��ҵ�����¼</div>         
</div>
</div>
</div>
<div class="com_show_topright">
<img src="<?php echo smarty_function_url(array('m'=>'ajax','c'=>'pubqrcode','toc'=>'company','toa'=>'show','toid'=>$_smarty_tpl->tpl_vars['com']->value['uid']),$_smarty_tpl);?>
" width="120" height="120">
<div class="com_show_topright_fx">��������Ȧ</div>
</div>
</div>

<div class="con_show_left">
<div class="con_show_left_box">
<div class="Company_post_msg" id="company" data-slide='1'>
    <i class="Company_h1_line yun_bg_color"></i>
    <i class="Company_h1_line_bor"></i>
    <span class="Company_co">��˾���</span>
</div>
<div class="con_show_introduction">  
<?php if ($_smarty_tpl->tpl_vars['com']->value['content']) {?>
<div style="width:100%;height:auto; overflow:hidden" id="com_content">
<?php echo $_smarty_tpl->tpl_vars['com']->value['content'];?>

</div>
<div class="company_show_more none"><a href="javascript:;" onclick="showcc()">�鿴����</a></div>
<?php } else { ?> 
<div class="firm_ment">       
<div class="firm_tips_no"> ����ҵ��û����д��˾���! </div>
</div>
<?php }?> 
</div>
<div class="clear"></div>
  <div class="complay_h1_share"> 
  <span class="Company_post_s_fl">������</span> 
  <span>
			<!-------�������----------->
		
			<div class="pyshare bdsharebuttonbox bdshare-button-style0-16" data-tag="share_1">
				<!--<a class="li s1 bds_tsina" data-cmd="tsina" title="��������΢��"></a>-->
				<!--<a class="li s2 bds_renren" data-cmd="renren" title="����������"></a>-->
				<a class="li s3 bds_qzone" data-cmd="qzone" title="����QQ�ռ�"></a>
				<!--<a class="li s4 bds_tqq" data-cmd="tqq" title="������Ѷ΢��"></a>-->
				<a class="li s5 bds_sqq" data-cmd="sqq" title="����QQ����"></a>
				<a class="li s6 bds_weixin" data-cmd="weixin" title="����΢��"></a>
				<div class="clear"></div>
			</div>
		
		  <!-------�������END----------->
		  </span> 
          
          </div> <?php echo smarty_function_show(array(),$_smarty_tpl);
if (!empty($_smarty_tpl->tpl_vars['show']->value)) {?>
          <div class="Company_post_msg"><i class="Company_h1_line yun_bg_color"></i><i class="Company_h1_line_bor"></i><span class="Company_co">��˾����</span></div>
          <div class="com_show_l_box">
       
        <div class="com_show_image_box"> 
        <div class="com_show_image"> 
        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['show']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?> 
        <div class="com_show_image_list">
        <a class="image_gall" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['picurl'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['picurl'];?>
" width="210" height="160" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" /> </a> </div>
        <?php } ?></div>
        </div>
        
        </div><?php }?> 
           <?php if (!empty($_smarty_tpl->tpl_vars['ProductList']->value)) {?>
            <div class="Company_post_msg"><i class="Company_h1_line yun_bg_color"></i><i class="Company_h1_line_bor"></i><span class="Company_co">��˾��Ʒ</span></div>
               <div class="com_show_l_box">
            
             <div class="com_show_cp_box">
          <ul class="com_show_cp">
            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ProductList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
            <li> <a href="<?php echo smarty_function_url(array('m'=>'company','c'=>'productshow','id'=>$_smarty_tpl->tpl_vars['com']->value['uid'],'pid'=>$_smarty_tpl->tpl_vars['row']->value['id']),$_smarty_tpl);?>
" target="_blank"> <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['pic'];?>
" width="208" height="145" />
              <div class="com_show_cp_name"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</div>
              </a> </li>
            <?php } ?>
          </ul>
          </div>
                  </div> <?php }?>
		
		<?php echo smarty_function_score(array('uid'=>$_smarty_tpl->tpl_vars['com']->value['uid'],'item'=>'score'),$_smarty_tpl);?>


		<?php if ($_smarty_tpl->tpl_vars['score']->value['num']) {?>
        <div class="Company_post_msg"><i class="Company_h1_line yun_bg_color"></i><i class="Company_h1_line_bor"></i><span class="Company_co">��������</span></div>
        <div class="evaluate">
        <div class="evaluate_pf_otherbox evaluate_pf_otherbox_bor">
           <div class="evaluate_pf_left">
           <div class="evaluate_pf_left_tit">�ۺ�����<span class="evaluate_pf_left_tit_n">( ����<?php echo $_smarty_tpl->tpl_vars['score']->value['num'];?>
������ )</span></div>
          <div class="evaluate_pf_other">
         <div class="evaluate_pf_other_name">���������</div>
        <div class="evaluate_pf_other_start"><i class="evaluate_pf_other_start_p" style="width:<?php echo $_smarty_tpl->tpl_vars['score']->value['desscore']/5*100;?>
%"></i></div>
        <div class="evaluate_pf_other_fs"><?php echo $_smarty_tpl->tpl_vars['score']->value['desscore'];?>
</div>
          </div>
           <div class="evaluate_pf_other">
         <div class="evaluate_pf_other_name">���Թ٣�</div>
        <div class="evaluate_pf_other_start"><i class="evaluate_pf_other_start_p" style="width:<?php echo $_smarty_tpl->tpl_vars['score']->value['hrscore']/5*100;?>
%"></i></div>
          <div class="evaluate_pf_other_fs"><?php echo $_smarty_tpl->tpl_vars['score']->value['hrscore'];?>
</div>
          </div>
                <div class="evaluate_pf_other">
        <div class="evaluate_pf_other_name"> ��˾������</div>
        <div class="evaluate_pf_other_start"><i class="evaluate_pf_other_start_p" style="width:<?php echo $_smarty_tpl->tpl_vars['score']->value['comscore']/5*100;?>
%"></i></div>
          <div class="evaluate_pf_other_fs"><?php echo $_smarty_tpl->tpl_vars['score']->value['comscore'];?>
</div>
          </div>
          </div>
          
            <div class="evaluate_pf_right">
            �ۺϣ�<span class="evaluate_pf_right_fs"><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</span>
            ��
            </div>
            
            </div>
        
        <!-- ѭ��star-->
		<?php  $_smarty_tpl->tpl_vars['mlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mlist']->_loop = false;
global $db,$db_config,$config;eval('$paramer=array("limit"=>"5","id"=>"\'auto.id\'","item"=>"\'mlist\'","nocache"=>"")
;');$List=array();
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
		$where = "`status`='1'";
		global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		if($paramer['id']){
			$where.=" and `cuid`='".$paramer['id']."'";
		}
		if($paramer['jobid']){
			$where.=" and `jobid`='".$paramer['jobid']."'";
		}
		
		if($paramer['limit']){
			$limit=" LIMIT ".$paramer['limit'];
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"company_msg",$where,$Purl,'','0',$_smarty_tpl);
		}
		if($paramer[order]){
			$where.="  ORDER BY `".$paramer['order']."`";
		}else{
			$where.="  ORDER BY `id`";
		}
		if($paramer['sort']){
			$where.=" ".$paramer['sort'];
		}else{
			$where.=" DESC";
		}

		$mlist=$db->select_all("company_msg",$where.$limit);
		
		if(is_array($mlist)){
			include  PLUS_PATH."/com.cache.php";
			foreach($mlist as $key=>$value){
				
				$UIDList[]=$value['uid'];
				$Jobid[] = $value['jobid'];
			
			}
			$userlist=$db->select_all("resume","`uid` IN (".@implode(',',$UIDList).")","`uid`,`name`,`photo`");

			$jobList=$db->select_all("company_job","`id` IN (".@implode(',',$Jobid).")","`id`,`name`");
			
			if(is_array($userlist)){
				foreach($userlist as $v){
							
					$msgUser[$v['uid']]= $v['name'];
					$msgPhoto[$v['uid']]= $v['photo'];
				}
			}
			
			if(is_array($jobList)){
				foreach($jobList as $vv){
							
					$msgJob[$vv['id']]= $vv['name'];
						
				}
				$_smarty_tpl->tpl_vars['msgjob']=new Smarty_Variable;
				$_smarty_tpl->tpl_vars['msgjob']->value = $jobList;
			}
			
            foreach($mlist as $k=>$v){
				if($v['isnm']=='1'){
					$mlist[$k]['name']= '����';
					$mlist[$k]['photo']= $config['sy_weburl']."/".$config['sy_member_icon'];
				}else{
					if($msgPhoto[$v['uid']] &&file_exists(str_replace($config['sy_weburl'],APP_PATH,'.'.$msgPhoto[$v['uid']]))){
						$mlist[$k]['photo']= ".".$msgPhoto[$v['uid']];
					}else{
						$mlist[$k]['photo']= $config['sy_weburl']."/".$config['sy_member_icon'];
					}
					$mlist[$k]['name']= $msgUser[$v['uid']];
				}
				$mlist[$k]['comscore']= sprintf("%.1f", $v[comscore]);
				$mlist[$k]['hrscore']= sprintf("%.1f", $v[hrscore]);
				$mlist[$k]['desscore']= sprintf("%.1f", $v[desscore]);
			
				$mlist[$k]['scorepf']= round( $v[score]/5 * 100,2);
				$mlist[$k]['comscorepf']= round( $v[comscore]/5 * 100,2);
				$mlist[$k]['hrscorepf']= round( $v[hrscore]/5 * 100,2);
				$mlist[$k]['desscorepf']= round( $v[desscore]/5 * 100,2);
				if($v[tag]){
					$tags = explode(',',$v[tag]);
					$newtags = array();
					foreach($tags as $tv){
						$newtags[] = $comclass_name[$tv];
					}
					
					$mlist[$k]['tags']= $newtags;
				}
				$mlist[$k]['jobname']= $msgJob[$v['jobid']];
            }
		}
		$mlist = $mlist; if (!is_array($mlist) && !is_object($mlist)) { settype($mlist, 'array');}
foreach ($mlist as $_smarty_tpl->tpl_vars['mlist']->key => $_smarty_tpl->tpl_vars['mlist']->value) {
$_smarty_tpl->tpl_vars['mlist']->_loop = true;
?>
         <div class="evaluate_userlist">
         <div class="evaluate_username">
         <div class="evaluate_userphoto"><img src="<?php echo $_smarty_tpl->tpl_vars['mlist']->value['photo'];?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);" width="80" height="100"><div class="evaluate_photouser_bg"></div></div>
         <div class="evaluate_username_u"><?php echo $_smarty_tpl->tpl_vars['mlist']->value['name'];?>
</div></div>
         <div class="evaluate_user_pf">
         <div class="evaluate_ms_box">
         <div class="evaluate_pf_userzh">
         <div class="evaluate_pf_userzh_l">�ۺ����֣�</div>
        <div class="evaluate_pf_other_start"><i class="evaluate_pf_other_start_p" style="width:<?php echo $_smarty_tpl->tpl_vars['mlist']->value['score']*20;?>
%"></i></div>
          <div class="evaluate_pf_other_fs"><?php echo $_smarty_tpl->tpl_vars['mlist']->value['score'];?>
</div>
          </div>
          <div class="evaluate_pf_job">����ְλ��<?php if ($_smarty_tpl->tpl_vars['mlist']->value['jobname']) {?><a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>$_smarty_tpl->tpl_vars['mlist']->value['jobid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['mlist']->value['jobname'];?>
</a><?php } else { ?>ְλ���¼�<?php }?></div>
       <div class="evaluate_date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mlist']->value['ctime'],"%Y-%m-%d");?>
</div>
        </div>
        <div class="evaluate_tag">
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mlist']->value['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <span class="evaluate_tag_s"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</span>
		<?php } ?>
        </div>
        <div class="evaluate_pj_box">
        <div class="evaluate_pj">[���Թ���] <?php echo $_smarty_tpl->tpl_vars['mlist']->value['content'];?>
</div>
        <div class="evaluate_pj">[��������] <?php echo $_smarty_tpl->tpl_vars['mlist']->value['othercontent'];?>
</div>
        </div>
          </div>
        </div> 
		
		<?php } ?>
         <!-- ѭ��end-->
         <?php if ($_smarty_tpl->tpl_vars['mlist']->value) {?>
             <div class="evaluate_look_compj"><a href="<?php echo $_smarty_tpl->tpl_vars['urlmsg']->value;?>
">�鿴��˾ȫ������>></a></div>
	    <?php }?>
              
       </div>
         <?php }?>  <div class="Company_post_msg"><i class="Company_h1_line yun_bg_color"></i><i class="Company_h1_line_bor"></i><span class="Company_co">��Ƹְλ</span></div>
           <div class="comshow_job">
            <?php if ($_smarty_tpl->tpl_vars['num']->value=='0') {?>
        <div class="firm_tips_no"> ����ҵ��û�з���ְλ��Ϣ!</div>
        <?php } else { ?> 
			<?php  $_smarty_tpl->tpl_vars['jlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['jlist']->_loop = false;
$jlist = $jlist; if (!is_array($jlist) && !is_object($jlist)) { settype($jlist, 'array');}
foreach ($jlist as $_smarty_tpl->tpl_vars['jlist']->key => $_smarty_tpl->tpl_vars['jlist']->value) {
$_smarty_tpl->tpl_vars['jlist']->_loop = true;
?>
			<div class="firm_post">
			  
				  <div class="fpc_name"> <a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>$_smarty_tpl->tpl_vars['jlist']->value['id']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['jlist']->value['name'];?>
</a></div>
                  <div class="firm_post_joblist">
                  <?php if ($_smarty_tpl->tpl_vars['jlist']->value['job_salary']) {?>
                   <span class="comshow_job_xz">
                   <i><?php echo $_smarty_tpl->tpl_vars['jlist']->value['job_salary'];?>
</i></span>
                
                   <?php }?> 
                   <?php if ($_smarty_tpl->tpl_vars['jlist']->value['job_city_two']) {?>
                   <span  class="comshow_job_city">
                   <?php echo $_smarty_tpl->tpl_vars['jlist']->value['job_city_two'];?>
</span>
                  
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['jlist']->value['job_exp']) {?> <span  class="comshow_job_jy"><?php echo $_smarty_tpl->tpl_vars['jlist']->value['job_exp'];?>
����</span>
                  
                    <?php }?>
                   <?php if ($_smarty_tpl->tpl_vars['jlist']->value['job_edu']) {?> <span class="comshow_job_xl"><?php echo $_smarty_tpl->tpl_vars['jlist']->value['job_edu'];?>
ѧ��</span> <?php }?>
                  </div>
                       <?php if ($_smarty_tpl->tpl_vars['jlist']->value['lastupdate']) {?>
                  <div class="firm_post_jobtime">����ʱ�䣺<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['jlist']->value['lastupdate'],"%Y-%m-%d");?>
</div>
                  <?php }?>
				 <a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>$_smarty_tpl->tpl_vars['jlist']->value['id']),$_smarty_tpl);?>
" class="firm_post_jobbth">�����鿴</a> 
			</div>
			<?php } ?>  
			<?php if ($_smarty_tpl->tpl_vars['pagenav']->value) {?>
         <div class="pages"> <a href="javascript:void(0);" onclick="page('<?php echo $_GET['id'];?>
','<?php if ($_GET['page']) {
echo $_GET['page'];
} else { ?>1<?php }?>','10','1');">��һҳ</a> <a href="javascript:void(0);" onclick="page('<?php echo $_GET['id'];?>
','<?php if ($_GET['page']) {
echo $_GET['page'];
} else { ?>1<?php }?>','10','2');">��һҳ</a></div>
            <?php }?>
        <?php }?> 
           </div>

	<?php if ($_smarty_tpl->tpl_vars['usertype']->value!=3) {?>
    <div class="maincenters" style="display: none;">
      <div id="sortBoxs">
        <div class="search_menuBoxs">
          <ul>
            <li class="search_curs" id="typezb" onmousemove="searchtype('zb');">�ܱ���Ƹ</li>
            <li id="typezp" onmousemove="searchtype('zp');">��ƸƵ��</li>
            <li id="typerm" onmousemove="searchtype('rm');">��������</li>
          </ul>
        </div>
        <div class="contentBoxs">
          <!-- �ܱ���Ƹ start-->
        <div class="contentBox_conts " id="type_zb">
        <div class="Industry_lists">
			<?php if ($_smarty_tpl->tpl_vars['city']->value['three_cityid']) {?>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['city']->value['cityid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
				<a href="<?php echo smarty_function_listurl(array('provinceid'=>$_smarty_tpl->tpl_vars['city']->value['provinceid'],'cityid'=>$_smarty_tpl->tpl_vars['city']->value['cityid'],'type'=>'three_cityid','v'=>$_smarty_tpl->tpl_vars['v']->value,'page'=>1),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
��Ƹ</a>
				<?php } ?>
			<?php } elseif ($_smarty_tpl->tpl_vars['city']->value['cityid']) {?>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['city']->value['provinceid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
				<a href="<?php echo smarty_function_listurl(array('provinceid'=>$_smarty_tpl->tpl_vars['city']->value['provinceid'],'type'=>'cityid','v'=>$_smarty_tpl->tpl_vars['v']->value,'page'=>1),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
��Ƹ</a>
				<?php } ?>
			<?php } else { ?>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
				<a href="<?php echo smarty_function_listurl(array('type'=>'provinceid','v'=>$_smarty_tpl->tpl_vars['v']->value,'page'=>1),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
��Ƹ</a>
				<?php } ?>
			<?php }?>
        </div>
        </div>
          <!-- �ܱ���Ƹ end-->
          <!-- ��ƸƵ�� start-->
           <div class="contentBox_conts none" id="type_zp" >
           <div class="Industry_lists">
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
		<a href="<?php echo smarty_function_listurl(array('type'=>'hy','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
��Ƹ</a>
		<?php } ?>
              
          </div> </div>
          <!--  ��ƸƵ�� end-->
          <!-- �������� start-->
          <div class="contentBox_conts none" id="type_rm">
            <div class="Industry_lists">
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
						$v[type_name]='������Ƹ';
					}elseif($v['type']=="13"){
						$v['url'] = Url("wap",array("c"=>"tiny","keyword"=>$v['key_name']));
						$v['type_name']='�չ�����';
					}elseif($v[type]=="3"){
						$v[url] = Url("wap",array("c"=>"job","keyword"=>$v['key_name']));
						$v[type_name]='ְλ';
					}elseif($v['type']=="4"){
						$v['url'] = Url("wap",array("c"=>"company","keyword"=>$v['key_name']));
						$v['type_name']='��˾';
					}elseif($v['type']=="5"){
						$v['url'] = Url("wap",array("c"=>"resume","keyword"=>$v['key_name']));
						$v['type_name']='�˲�';
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
						$v['type_name']='������Ƹ';
					}elseif($v['type']=="2"){
						$v['url'] = Url("part",array("keyword"=>$v['key_name']));
						$v['type_name']='��ְ';
					}elseif($v['type']=="13"){
						$v['url'] = Url("tiny",array("keyword"=>$v['key_name']));
						$v['type_name']='�չ�����';
					}elseif($v['type']=="3"){
						$v['url'] = Url("job",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='ְλ';
					}elseif($v['type']=="4"){
						$v['url'] = Url("company",array("keyword"=>$v['key_name']));
						$v['type_name']='��˾';
					}elseif($v['type']=="5"){
						$v['url'] = Url("resume",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='�˲�';
					}else if($v['type']=="12"){
						$v['url'] = Url("ask",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='�ʴ�';
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
          </div> </div>
          <!--   �������� end-->
        </div>
      </div>
    </div>
    <?php }?>
 </div>
</div>
<div class="con_show_right">
<div class="con_show_right_box">



<div class="com_aut">
  <?php if ($_smarty_tpl->tpl_vars['com']->value['email_status']=="1") {?> 
 <dl class="com_aut_list"><dt> <img src="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
images/rz_yx2.png" alt="����δ��֤" title="��������֤" class="png" />  </dt><dd>��������֤</dd></dl>
      <?php } else { ?> 
<dl class="com_aut_list"><dt><img src="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
images/rz_yx.png" alt="����δ��֤" title="����δ��֤" class="png" />  </dt><dd>����δ��֤</dd></dl>  <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['com']->value['moblie_status']=="1") {?> 
<dl class="com_aut_list"><dt><img src="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
images/rz_sj2.png" alt="�ֻ�δ��֤" title="�ֻ�����֤" class="png" />  </dt><dd>�ֻ�����֤</dd></dl>
        <?php } else { ?> 
<dl class="com_aut_list"><dt><img src="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
images/rz_sj.png" alt="�ֻ�δ��֤" title="�ֻ�δ��֤" class="png" />  </dt><dd>�ֻ�δ��֤</dd></dl><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['com']->value['yyzz_status']=="1") {?> 
<dl class="com_aut_list"><dt> <img src="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
images/rz_zz2.png" alt="ִ��δ��֤" title="ִ������֤" class="png" /> </dt><dd>ִ������֤</dd></dl> <?php } else { ?> 
<dl class="com_aut_list"><dt><img src="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
images/rz_zz.png" alt="ִ��δ��֤" title="ִ��δ��֤" class="png" />  </dt><dd>ִ��δ��֤</dd></dl>
        <?php }?>
        </div>
</div>
<div class="con_show_right_box">
<div class="Company_post_msg"><i class="Company_h1_line yun_bg_color"></i><i class="Company_h1_line_bor"></i><span class="Company_co">������Ϣ</span></div>
<div class="com_show_touch">
 <?php if ($_smarty_tpl->tpl_vars['looktype']->value=="1") {?>
  <div class="com_show_touch_list"> 
          <?php if ($_smarty_tpl->tpl_vars['com']->value['linkman']) {?><div class="com_show_touch_p"><i class="com_show_touch_p_icon com_show_touch_user"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['linkman'];?>
</div><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['com']->value['linkjob']) {?><div class="com_show_touch_p"><i class="com_show_touch_p_icon com_show_touch_zw"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['linkjob'];?>
</div><?php }?>
          <!--<?php if ($_smarty_tpl->tpl_vars['com']->value['linkphone']) {?><div class="com_show_touch_p"><i class="com_show_touch_p_icon com_show_touch_dh"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['linkphone'];?>
</div><?php }?>-->
          <!--<?php if ($_smarty_tpl->tpl_vars['com']->value['linktel']) {?><div class="com_show_touch_p"><i class="com_show_touch_p_icon com_show_touch_sj"></i><?php echo smarty_function_image(array('number'=>$_smarty_tpl->tpl_vars['com']->value['linktel'],'uid'=>$_smarty_tpl->tpl_vars['com']->value['uid'],'action'=>'linktel'),$_smarty_tpl);?>
</div><?php }?>-->
          <!--<?php if ($_smarty_tpl->tpl_vars['com']->value['linkmail']) {?><div class="com_show_touch_p"><i class="com_show_touch_p_icon com_show_touch_yx"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['linkmail'];?>
</div> <?php }?>-->
          <!--<?php if ($_smarty_tpl->tpl_vars['com']->value['linkqq']) {?><div class="com_show_touch_p"><i class="com_show_touch_p_icon com_show_touch_qq"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['linkqq'];?>
</div><?php }?>-->
          <?php if ($_smarty_tpl->tpl_vars['com']->value['zip']) {?><div class="com_show_touch_p"><i class="com_show_touch_p_icon com_show_touch_yb"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['zip'];?>
</div><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['com']->value['website']) {?><div class="com_show_touch_p"><i class="com_show_touch_p_icon com_show_touch_web"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['website'];?>
</div><?php }?> 
          <?php if ($_smarty_tpl->tpl_vars['com']->value['busstops']) {?><div class="com_show_touch_p"><i class="com_show_touch_p_icon com_show_touch_bus"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['busstops'];?>
</div><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['com']->value['address']) {?> <div class="com_show_touch_p"><i class="com_show_touch_p_icon com_show_touch_add"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['address'];?>
</div> <?php }?>
           <?php if ($_smarty_tpl->tpl_vars['com']->value['comqcode']) {?> <div class="com_show_touch_p"><img src="<?php echo $_smarty_tpl->tpl_vars['com']->value['comqcode'];?>
" width="120" height="120"></div> <?php }?>
           </div>
 <?php } else { ?>
 	<?php if ($_smarty_tpl->tpl_vars['looktype']->value=="3"||$_smarty_tpl->tpl_vars['looktype']->value=="2"||$_smarty_tpl->tpl_vars['looktype']->value=="5") {?> 
      <div class="com_show_touch_login_box">
        <div class="com_show_touch_login"> 
        <div class="com_show_touch_login_p"><?php echo $_smarty_tpl->tpl_vars['look_msg']->value;?>
</div>
        </div>
      </div>
       <?php } elseif ($_smarty_tpl->tpl_vars['looktype']->value=="6") {?> 
       <div class="com_show_touch_login_box">
        <div class="com_show_touch_login"> 
        <div class="com_show_touch_login_p"><?php echo $_smarty_tpl->tpl_vars['look_msg']->value;?>
</div>
        <div class="com_show_touch_login_bth">
         <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=expect" class="com_show_touch_dl">��������</a> </div> </div>
      </div>
       <?php } elseif ($_smarty_tpl->tpl_vars['looktype']->value=="4") {?> 
        <div class="com_show_touch_login_box">
        <div class="com_show_touch_login"> 
        <div class="com_show_touch_login_p"><?php echo $_smarty_tpl->tpl_vars['look_msg']->value;?>
</div>
        <div class="com_show_touch_login_bth">
       <a class="com_show_touch_dl" href="javascript:void(0);" onclick="showlogin('1');">������¼</a> 
       <a class="com_show_touch_reg" href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>1,'type'=>1),$_smarty_tpl);?>
">����ע��</a> </div> </div>
      </div>
	  <?php }?> 
   <?php }?>
   
         </div>
         </div><?php if ($_smarty_tpl->tpl_vars['com']->value['y']!=''&&$_smarty_tpl->tpl_vars['com']->value['x']!='') {?>
   <div class="con_show_right_box">
   <div class="Company_post_msg"><i class="Company_h1_line yun_bg_color"></i><i class="Company_h1_line_bor"></i><span class="Company_co">��ҵ��ͼ</span></div>
      <div class="com_show_lmap">
        
        <div class="frc_map" id="company_baidu_map">
          <div id="maps_container" style="width:218px;height:155px;"></div>
		  <input type="hodden" id="map_x" value="<?php echo $_smarty_tpl->tpl_vars['com']->value['x'];?>
"/>
		  <input type="hodden" id="map_y" value="<?php echo $_smarty_tpl->tpl_vars['com']->value['y'];?>
"/>
        </div>
        <div class="frc_map_look"> <a href="javascript:showmap('map_show');">�鿴������ͼ</a></div>
       
</div>
</div><?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['NewsList']->value)) {?>
<div class="con_show_right_box">
<div class="Company_post_msg"><i class="Company_h1_line yun_bg_color"></i><i class="Company_h1_line_bor"></i><span class="Company_co">��ҵ����</span></div>
 
          <ul class="com_show_news">
            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['NewsList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
            <li>
              <p><a href="<?php echo smarty_function_url(array('m'=>'company','c'=>'newsshow','id'=>$_smarty_tpl->tpl_vars['com']->value['uid'],'nid'=>$_smarty_tpl->tpl_vars['row']->value['id']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></p>
            </li>
            <?php } ?>
          </ul>
</div> <?php }?> 

 <?php if ($_smarty_tpl->tpl_vars['lookcom']->value) {?>
<div class="con_show_right_box" style="display: none;">
<div class="Company_post_msg"><i class="Company_h1_line yun_bg_color"></i><i class="Company_h1_line_bor"></i><span class="Company_co">�����˹�˾���˻�����</span></div>
<ul class="com_show_other_box">
 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lookcom']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
<li><div class="com_show_other"><a href="<?php echo smarty_function_url(array('m'=>'company','c'=>'show','id'=>$_smarty_tpl->tpl_vars['v']->value['com_id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['comname'];?>
 </a> </div><a href="<?php echo smarty_function_url(array('m'=>'company','c'=>'show','id'=>$_smarty_tpl->tpl_vars['v']->value['com_id']),$_smarty_tpl);?>
" class=""><span class="com_show_other_cor"><?php echo $_smarty_tpl->tpl_vars['v']->value['jobnum'];?>
������ְλ</span></a></li>
<?php } ?>
</ul>
</div>
 <?php }?>
</div>

</div>
<div class="clear"></div>
<div class="commpay_Comment">
  <div id="huifu<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="none">
    <form action="index.php" method="post" onsubmit="return check_huifu('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');">
      <div class="Comment_w608">
        <textarea class="Comment_textarea_hf" tip-text="˵�����```" id="reply<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="content"></textarea>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" />
      </div>
      <div class="Comment_w608">
        <input class="program_reply" type="submit" name="submit2" value="�ظ�" />
      </div>
    </form>
  </div>
  <div class="clear"></div>
  <div id="map_show" class="none">
    <div id="map_container" style="width:580px;height:350px;"></div>
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
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery.json.js" language="javascript"><?php echo '</script'; ?>
>
<!--[if IE 6]>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
    DD_belatedPNG.fix('.png');
    <?php echo '</script'; ?>
>
    <![endif]-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['mapurl'];?>
" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/map.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/popImage/jquery.popImage.mini.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$(function () {
	$("a.image_gall").popImage();
})

var f1 = $('#company').offset().top;
var fs = $('.broadside_con').children().size();
var fss = new Array();
$(function () {
	<?php if ($_smarty_tpl->tpl_vars['com']->value['y']!=''&&$_smarty_tpl->tpl_vars['com']->value['x']!='') {?>
	getmapnoshowcont_diffDomains('maps_container', "<?php echo $_smarty_tpl->tpl_vars['com']->value['x'];?>
", "<?php echo $_smarty_tpl->tpl_vars['com']->value['y'];?>
", "map_x", "map_y",'company_baidu_map');
	<?php }?>
	$(".firm_post").hover(function () {
		$(this).css("background","#f4f4f4");
		$(this).find(".firm_post_right").show();
	}, function () {;
		$(this).css("background","");
		$(this).find(".firm_post_right").hide();
	});
	$(".broadside_con>a").click(function () {
		$(".broadside_con>a").removeClass('bro_con_cur');
		$(this).addClass('bro_con_cur');
	});   
	
	for (i = 0; i < fs; i++) {
		j = i + 1;
		fss[i] = $('div[data-slide="' + j + '"]').offset().top;
	} 
	
	$(window).scroll(function(){
		var currentTOP = $(window).scrollTop();
		currentTOP=parseInt(currentTOP)+parseInt(20); 
		if(currentTOP <= f1) {
			$('.broadside_con a').removeClass('bro_con_cur');
			$('.broadside_con a:eq(0)').addClass('bro_con_cur');
			return;
		}else{
			changefl(getFloor(currentTOP));
		}
	}); 
	var cheight=$("#com_content").height();
	if(parseInt(cheight)>270){
	    $("#com_content").attr('style','width:100%;height:270px; overflow:hidden');
		$(".company_show_more").show();
	}
}); 
function showcc(){
    $("#com_content").attr('style','width:100%;height:auto; overflow:hidden');
	$(".company_show_more").find('a').html('����');
	$(".company_show_more").find('a').attr('onclick','hidecc()');
}
function hidecc(){
    $("#com_content").attr('style','width:100%;height:270px; overflow:hidden');
	$(".company_show_more").find('a').html('�鿴����');
	$(".company_show_more").find('a').attr('onclick','showcc()');
}
function getFloor(fh){
	if(fs==0||fh<=f1){
		return 1;
	}
	if(fh>=fss[fs-1]){
		return fs;
	}
	for (k=0; k<fs;k++) {
		if(fh>fss[k]&&fh<fss[k+1]){
			return k+1;
		}
	}
} 
function changefl(fno){ 
	fno=parseInt(fno)-parseInt(1);
	$('.broadside_con a').removeClass('bro_con_cur');
	$('.broadside_con a:eq('+fno+')').addClass('bro_con_cur');
}
function showmap(id) {
	$.layer({
		type: 1,
		title: '��ͼչʾ',
		closeBtn: [0, true],
		offset: ['100px', ''],
		border: [10, 0.3, '#000', true],
		area: ['580px', 'auto'],
		page: { dom: "#" + id }
	});
	getmapshowcont('map_container', "<?php echo $_smarty_tpl->tpl_vars['com']->value['x'];?>
", "<?php echo $_smarty_tpl->tpl_vars['com']->value['y'];?>
", "<?php echo $_smarty_tpl->tpl_vars['com']->value['name'];?>
", "<?php echo $_smarty_tpl->tpl_vars['com']->value['address'];?>
");
}

function page(id,page,limit,updown){
   	if(page<1){
   		page==1;
   	}
	$.ajax({
		type: "POST",
        global: false,
        url :"<?php echo smarty_function_url(array('m'=>'company','c'=>'prestr'),$_smarty_tpl);?>
",
		data:{id:id,page:page,limit:limit,updown:updown},
		success :function(data){
			var data=eval("("+data+")");			
			window.location.href=data.url;
		}
	});
}
function searchtype(id){
	$(".search_curs").removeClass("search_curs");
	$("#type"+id).addClass("search_curs");
	$(".contentBox_conts").hide();
	$("#type_"+id).show();
}
<?php echo '</script'; ?>
> 
<!--------shareJS--------->
<?php echo '<script'; ?>
>
	window._bd_share_config = {
		common : {
			bdText : '<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
',
			bdDesc : '<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
',	
			bdUrl : '<?php echo smarty_function_url(array('m'=>'company','c'=>'show','id'=>$_smarty_tpl->tpl_vars['id']->value),$_smarty_tpl);?>
',
			bdPic : '<?php if ($_smarty_tpl->tpl_vars['com']->value['logo']) {?> <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['com']->value['logo'];
} else {
echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_logo'];
}?>'
		},
		share : [{
			"tag" : "share_1",
			"bdSize" : 24,
			"bdCustomStyle":'<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/share.css'
		}]
	}
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
<?php echo '</script'; ?>
>
<!--------shareJS END--------->
<iframe id="supportiframe" name="supportiframe" onload="returnmessage('supportiframe');" class="none"></iframe>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/login.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
