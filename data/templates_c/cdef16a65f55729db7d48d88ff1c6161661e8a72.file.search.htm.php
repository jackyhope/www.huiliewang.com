<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-09 10:59:30
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/resume/search.htm" */ ?>
<?php /*%%SmartyHeaderCode:18651629785bbc1992ce06e4-22120300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdef16a65f55729db7d48d88ff1c6161661e8a72' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/resume/search.htm',
      1 => 1518248664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18651629785bbc1992ce06e4-22120300',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'usertype' => 0,
    'config' => 0,
    'finder' => 0,
    'key' => 0,
    'v' => 0,
    'uid' => 0,
    'paras' => 0,
    'finders' => 0,
    'li' => 0,
    'userdata' => 0,
    'userclass_name' => 0,
    'industry_index' => 0,
    'industry_name' => 0,
    'search' => 0,
    'job_index' => 0,
    'job_name' => 0,
    'job_type' => 0,
    'city_name' => 0,
    'city_type' => 0,
    'tid' => 0,
    'city_index' => 0,
    'pid' => 0,
    'cid' => 0,
    'arr_data1' => 0,
    'arr_data' => 0,
    'j' => 0,
    'uptime' => 0,
    'adtime' => 0,
    'resumekeyword' => 0,
    'keylist' => 0,
    'total' => 0,
    'pagenum' => 0,
    'user2' => 0,
    'eid' => 0,
    'lookresume' => 0,
    'talentpool' => 0,
    'useridmsg' => 0,
    'job_list' => 0,
    'pagenav' => 0,
    'klist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbc19932db708_80400654',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbc19932db708_80400654')) {function content_5bbc19932db708_80400654($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_function_listurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.listurl.php';
?><?php $user2=array();global $db,$db_config,$config;
		if(is_array($_GET)){
			foreach($_GET as $key=>$value){
				if($value=='0'){
					unset($_GET[$key]);
				}
			}
		}
		eval('$paramer=array("limit"=>"5","topdate"=>"1","minsalary"=>"\'auto.minsalary\'","maxsalary"=>"\'auto.maxsalary\'","idcard"=>"\'auto.idcard\'","edu"=>"\'auto.edu\'","order"=>"\'auto.order\'","work"=>"\'auto.work\'","exp"=>"\'auto.exp\'","tag"=>"\'auto.tag\'","sex"=>"\'auto.sex\'","keyword"=>"\'auto.keyword\'","hy"=>"\'auto.hy\'","provinceid"=>"\'auto.provinceid\'","report"=>"\'auto.report\'","cityid"=>"\'auto.cityid\'","three_cityid"=>"\'auto.three_cityid\'","adtime"=>"\'auto.adtime\'","jobids"=>"\'auto.jobids\'","pic"=>"\'auto.pic\'","typeids"=>"\'auto.typeids\'","type"=>"\'auto.type\'","job1"=>"\'auto.job1\'","job1_son"=>"\'auto.job1_son\'","job_post"=>"\'auto.job_post\'","uptime"=>"\'auto.uptime\'","jobs_id1"=>"\'auto.jobs_id1\'","jobs_id2"=>"\'auto.jobs_id2\'","jobs_id"=>"\'auto.jobs_id\'","post_len"=>"14","minage"=>"\'auto.minage\'","maxage"=>"\'auto.maxage\'","item"=>"\'user2\'","name"=>"\'userlist2\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }

		$cache_array = $db->cacheget();
		$userclass_name = $cache_array["user_classname"];
		$city_name      = $cache_array["city_name"];
		$job_name		= $cache_array["job_name"];
		$job_type		= $cache_array["job_type"];
		$industry_name	= $cache_array["industry_name"];
		$where = "1";
		
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
	
		if($paramer[where_uid]){
			$where .=" AND `uid` in (".$paramer['where_uid'].")";
		}
		
		if($_COOKIE['uid']&&$_COOKIE['usertype']=="2"){
			$blacklist=$db->select_all("blacklist","`p_uid`='".$_COOKIE['uid']."'","c_uid");
			if(is_array($blacklist)&&$blacklist){
				foreach($blacklist as $v){
					$buid[]=$v['c_uid'];
				}
			$where .=" AND `uid` NOT IN (".@implode(",",$buid).")";
			}
		}
		

		
		if($paramer[noid]==1 && !empty($noids)){
			$where.=" AND `id` NOT IN (".@implode(',',$noids).")";
		}
		
//		if($paramer[idcard]){
//			$where .=" AND `idcard_status`='1'";
//		}
	

		

		
		if($paramer[work]){
			$show=$db->select_all("resume_show","1 group by eid","`eid`");
			if(is_array($show)){
				foreach($show as $v){
					$eid[]=$v['eid'];
				}
			}
			$where .=" AND id in (".@implode(",",$eid).")";
		}
		
		
//		if($paramer[cid]){
//			$where .= " AND (cityid=$paramer[cid] or three_cityid=$paramer[cid])";
//		}
		
//		if($paramer[keyword]){
//
//			$jobid = array();
//
//			$where1[]="`uname` LIKE '%$paramer[keyword]%'";
//			foreach($job_name as $k=>$v){
//				if(strpos($v,$paramer[keyword])!==false){
//					$jobid[]=$k;
//				}
//			}
//			if(is_array($jobid)){
//				foreach($jobid as $value){
//					$class[]="FIND_IN_SET('".$value."',job_classid)";
//				}
//				$where1[]=@implode(" or ",$class);
//			}
//			include_once  PLUS_PATH."/city.cache.php";
//		    $cityid=array();
//			foreach($city_name as $k=>$v){
//				if(strpos($v,$paramer[keyword])!==false){
//					$cityid[]=$k;
//				}
//			}
//			if(is_array($cityid)){
//				foreach($cityid as $value){
//					$class[]= "(provinceid = '".$value."' or cityid = '".$value."')";
//				}
//				$where1[]=@implode(" or ",$class);
//			}
//			$where.=" AND (".@implode(" or ",$where1).")";
//		}
		
		
		
		
		if($paramer[hy]=="0"){
			$where .=" AND hy<>''";
		}elseif($paramer[hy]!=""){
			$where .= " AND (`hy` IN (".$paramer['hy']."))";
		}
	
//		$job_classid="";
//		$joball=array();
//		if($paramer[jobids]){
//			$joball=explode(",",$paramer[jobids]);
//			foreach(explode(",",$paramer[jobids]) as $v){
//				if($job_type[$v]){
//					$joball[]=@implode(",",$job_type[$v]);
//				}
//			}
//			$job_classid=implode(",",$joball);
//		}
//		if($paramer[jobin]){
//			$joball=explode(",",$paramer[jobin]);
//			foreach(explode(",",$paramer[jobin]) as $v){
//				if($job_type[$v]){
//					$joball[]=@implode(",",$job_type[$v]);
//				}
//			}
//			$job_classid=implode(",",$joball);
//		}
		
	
//		if($paramer[provinceid]){
//			$where .= " AND provinceid = $paramer[provinceid]";
//		}
//		
//		if($paramer[cityid]){
//			$where .= " AND (`cityid` IN ($paramer[cityid]))";
//		}
//	
//		if($paramer[three_cityid]){
//			$where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
//		}
//		
//		if($paramer[cityin]){
//			$where .= " AND(provinceid IN ($paramer[cityin]) OR cityid IN ($paramer[cityin]) OR three_cityid IN ($paramer[cityin]))";
//		}
		
		if($paramer[exp]){
			$where .=" AND exp=$paramer[exp]";
		}else{
			$where .=" AND exp>0";
		}
	
		if($paramer[edu]){
			$where .=" AND edu=$paramer[edu]";
		}else{
			$where .=" AND edu>0";
		}
	
		if($paramer[sex]){
			$where .=" AND sex=$paramer[sex]";
		}
		
		if($paramer[provinceid]){
			$where .=" AND (city=$paramer[provinceid] or city1=$paramer[provinceid] or city2=$paramer[provinceid])";
		}
		
        if($paramer[jobs_id]){
			$where .=" AND (jobs_id=$paramer[jobs_id] or jobs_id1=$paramer[jobs_id] or jobs_id2=$paramer[jobs_id])";
		}
		
		if($paramer[jobs_id1]){
			$where .=" AND (jobs_id=$paramer[jobs_id1] or jobs_id1=$paramer[jobs_id1] or jobs_id2=$paramer[jobs_id1])";
		}
		
		if($paramer[jobs_id2]){
			$where .=" AND (jobs_id=$paramer[jobs_id2] or jobs_id1=$paramer[jobs_id2] or jobs_id2=$paramer[jobs_id2])";
		}
		
		if($paramer[minsalary]&&$paramer[maxsalary]){
			$where .=" and minsalary*salary_month>=".$paramer[minsalary]." and  minsalary*salary_month<=".$paramer[maxsalary];
		}elseif($paramer[minsalary]&&!$paramer[maxsalary]){
			$where .=" and minsalary*salary_month>=".$paramer[minsalary];
		}elseif(!$paramer[minsalary]&&$paramer[maxsalary]){
			$where .=" and minsalary*salary_month<=".$paramer[maxsalary];
		}
		
		if($paramer[minage]&&$paramer[maxage]){
			$where .=" and birthdate >=".$paramer[minage]." and  birthdate <=".$paramer[maxage];
		}elseif($paramer[minage]&&!$paramer[maxage]){
			$where .=" and birthdate >=".$paramer[minage];
		}elseif(!$paramer[minage]&&$paramer[maxage]){
			$where .=" and birthdate <=".$paramer[maxage];
		}
		
	
//		if($paramer[type]){
//			$where .= " AND type=$paramer[type]";
//		}
		
		
		
        
		
//		if($paramer[order] && $paramer[order]!="lastdate"){
//			if($paramer[order]=='ant_num'){
//				$order = " ORDER BY `ant_num`";
//			}elseif($paramer[order]=='topdate'){
//				$nowtime=time();
//				$order = " ORDER BY if(topdate>$nowtime,topdate,lastupdate)";
//			}else{
//				$order = " ORDER BY `".str_replace("'","",$paramer[order])."`";
//			}
//		}else{
			$order = " ORDER BY lastupdate ";
//		}
		
		
		$sort = $paramer[sort]?$paramer[sort]:'DESC';
	
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}
        
		if($paramer[where]){
			$where = $paramer[where];
		}
		if($paramer[ispage]){
			if($paramer["height_status"]){
				$limit = PageNav($paramer,$_GET,"resume_index",$where,$Purl,"",$paramer[islt]?$paramer[islt]:"3",$_smarty_tpl);
			}else{
				
				$limit = PageNav($paramer,$_GET,"resume_index",$where,$Purl,"",'0',$_smarty_tpl);
			}
		}
		$where.=$order.$sort;
//        echo $where;exit();
		$user2=$db->select_all("resume_index",$where.$limit,"*");
		
        include(CONFIG_PATH."db.data.php");		
		if($user2 && is_array($user2)){
			if($paramer['top']){
				$uids=$m_name=array();
				foreach($user2 as $k=>$v){
					$uids[]=$v[uid];
				}
				$member=$db->select_all($db_config[def]."member","`uid` in(".@implode(',',$uids).")","uid,username");
				foreach($member as $val){
					$m_name[$val[uid]]=$val['username'];
				}
			}
			foreach($user2 as $key=>$value){
				$uid[] = $value['uid'];
				$eid[] = $value['id'];
			}
			$eids = @implode(',',$eid);
			$uids = @implode(',',$uid);
            $resume=$db->select_all("resume","`id` in(".$eids.")","id,name,nametype,tag,sex,edu,exp,photo,phototype,birthday");
           
             $resume_expect=$db->select_all("resume_expect","`id` in(".$eids.")","*");
             
			foreach($user2 as $k=>$v){
			   
			    foreach($resume_expect as $val){
			        if($v['id']==$val['id']){
			           $user2[$k]['uname'] =  $val[uname];
			          
			            $hope_city[0] = $city_name[$v[city]];
                        $hope_city[1] = $city_name[$v[city1]];
                        $hope_city[2] = $city_name[$v[city2]];
                        $hope_city = array_filter($hope_city);
                       $user2[$k]['hope_city'] = implode(",",$hope_city);
                       
                       $salary = $v[minsalary]*$v[salary_month];
                       $user2[$k]['salary_n'] = "��".$salary."����";
                       
                        $hope_job[0] = $job_name[$v[jobs_id]];
                        $hope_job[1] = $job_name[$v[jobs_id1]];
                        $hope_job[2] = $job_name[$v[jobs_id2]];
                        $hope_job = array_filter($hope_job);
                       $user2[$k]['hope_job'] = $hope_job;
			        }
                }
			    foreach($resume as $val){
			        if($v['id']==$val['id']){
			    		$user2[$k]['edu_n']=$userclass_name[$val['edu']];
				        $user2[$k]['exp_n']=$userclass_name[$val['exp']];
			            if($val['birthday']){
							$year = date("Y",strtotime($val['birthday']));
							$user2[$k]['age'] =date("Y")-$year;
							
						}
		                
		                $user2[$k]['sex'] =$val['sex'];  
		                $user2[$k]['phototype']=$val[phototype];
		                if($val['photo'] && $val['phototype']!=1&&(file_exists(str_replace($config['sy_weburl'],APP_PATH,'.'.$val['photo']))||file_exists(str_replace($config['sy_weburl'],APP_PATH,$val['photo'])))){
            				$user2[$k]['photo']=str_replace("./",$config['sy_weburl']."/",$val['photo']);
            			}else{
            				if($val['sex']==1||$val['sex']==153){
            					$user2[$k]['photo']=$config['sy_weburl']."/".$config['sy_member_icon'];
            				}else{
            					$user2[$k]['photo']=$config['sy_weburl']."/".$config['sy_member_iconv'];
            				}
            			}
						if($val['tag']){
                            $user2[$k]['tag']=explode(',',$val['tag']);
	                    }
                        $user2[$k]['nametype']=$val[nametype];
                        //������ʾ����
						if($config['user_name']==1 || !$config['user_name']){
						if($val['nametype']==3){
						    if($val['sex']==1){
						        $user2[$k]['username_n'] = mb_substr($val['name'],0,1,'gbk')."����";
						    }else{
						        $user2[$k]['username_n'] = mb_substr($val['name'],0,1,'gbk')."Ůʿ";
						    }
						}elseif($val['nametype']==2){
						    $user2[$k]['username_n'] = "NO.".$v['id'];
						}else{
							$user2[$k]['username_n'] = $val['name'];
						}
						}elseif($config['user_name']==3){
							if($val['sex']==1){
								$user2[$k]['username_n'] = mb_substr($val['name'],0,1,'gbk')."����";
							}else{
								$user2[$k]['username_n'] = mb_substr($val['name'],0,1,'gbk')."Ůʿ";
							}
						}elseif($config['user_name']==2){
							$user2[$k]['username_n'] = "NO.".$v['id'];
						}elseif($config['user_name']==4){
							$user2[$k]['username_n'] = $val['name'];
						}
                    }
                }
				if($paramer[topdate]){
					$noids[] = $v[id];
				}
				
				$time=$v['lastupdate'];
				
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
				
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$user2[$k]['time'] = "һ����";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$user2[$k]['time'] = "����";
				}elseif($time>$beginToday){
					$user2[$k]['time'] = date("H:i",$v['lastupdate']);
					$user2[$k]['redtime'] =1;
				}else{
					$user2[$k]['time'] = date("Y-m-d",$v['lastupdate']);
				} 
				
				
				$user2[$k]['user_jobstatus_n']=$userclass_name[$v['jobstatus']];
				$user2[$k]['job_city_one']=$city_name[$v['provinceid']];
				$user2[$k]['job_city_two']=$city_name[$v['cityid']];
				$user2[$k]['job_city_three']=$city_name[$v['three_cityid']];
				
				$user2[$k]['report_n']=$userclass_name[$v['report']];
				$user2[$k]['type_n']=$userclass_name[$v['type']];
				$user2[$k]['lastupdate']=date("Y-m-d",$v['lastupdate']);
					
				$user2[$k]['user_url']=Url("resume",array("c"=>"show","id"=>$v['id']),"1");
				$user2[$k]["hy_info"]=$industry_name[$v['hy']];
				if($paramer['top']){
					$user2[$k]['m_name']=$m_name[$v['uid']];
					$user2[$k]['user_url']=Url("ask",array("c"=>"friend","a"=>"myquestion","uid"=>$v['uid']));
				}
				$kjob_classid=@explode(",",$v['job_classid']);
				$kjob_classid=array_unique($kjob_classid);	
				$jobname=array();
				if(is_array($kjob_classid)){
					foreach($kjob_classid as $val){
					    if($val!=''){
					        if($paramer['keyword']){
                               $jobname[]=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$job_name[$val]);
                            }else{
                               $jobname[]=$job_name[$val];
                            }
                        }
					}
				}
				$user2[$k]['job_post']=@implode(",",$jobname);
				$user2[$k]['expectjob']=$jobname;
				
				if($paramer['post_len']){
					$postname[$k]=@implode(",",$jobname);
					$user2[$k]['job_post_n']=mb_substr($postname[$k],0,$paramer[post_len],"GBK");
				}
			}
			foreach($user2 as $k=>$v){
               if($paramer['keyword']){
					$user2[$k]['username_n']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$v['username_n']);
					$user2[$k]['job_post']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$user2[$k]['job_post']);
					$user2[$k]['job_post_n']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$user2[$k]['job_post_n']);
					$user2[$k]['job_city_one']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['provinceid']]);
					$user2[$k]['job_city_two']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['cityid']]);
				}
            }
			if($paramer['keyword']!=""&&!empty($user2)){
				addkeywords('5',$paramer['keyword']);
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
/style/class.public.css" type="text/css"/>
    <style type="text/css">
        .job_xz_bth{background: #4b6e88 !important;}

    </style>
</head>
<body class="body_bg" style="background: #ecf0f1;">
<?php if ($_smarty_tpl->tpl_vars['usertype']->value==2) {?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/index_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 src="/data/plus/job.cache.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
<div class="yun_body" style="margin-top: 16px;">
    <div class="yun_content">

        <div class="clear"></div>
        <div class="Search_jobs_box">
            <form method="get" id="form" action="<?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_resumedir']) {?>index.php<?php } else {
echo smarty_function_url(array('m'=>'resume'),$_smarty_tpl);
}?>" onsubmit="return search_keyword(this,'������ؼ���');">

                <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_resumedir']) {?>
                <input type="hidden" name="m" value="resume" />
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
                            <div class="Search_jobs_more_chlose" style="width: 100px;height: 40px;margin-right: 0;border-right: 0;">
                                <span class="Search_jobs_more_chlose_s keyword_turn" style="width: 100px;height: 40px;line-height: 40px;color: #726e6e;margin-left: 10px;">����</span>
                                <i class="" style="height: 40px;"></i>

                                <div class="Search_jobs_more_chlose_list none" style="width: 100px;top: 40px;">
                                    <ul class="select_hyitem">
                                        <li><a class="Search_jobs_cxz widtha" onclick="change_keyword('companyname',this)">��˾</a> </li>
                                        <li><a class="Search_jobs_cxz widtha" onclick="change_keyword('jobname',this)">ְλ</a> </li>
                                    </ul>
                                </div>
                            </div>


                            <input type="text" name="keyword" value="<?php if ($_GET['keyword']!='') {
echo $_GET['keyword'];
} else { ?>������ؼ���<?php }?>" onclick="if(this.value=='������ؼ���'){this.value=''}" onblur="if(this.value==''){this.value='������ؼ���'}" class="Search_jobs_text searchjob_txt"  style="width: 670px;"/>
                            <input type="submit" value="����" class="Search_jobs_submit yun_bg_color" style="height: 42px;"/>
                            <div class="Search_jobs_sub_text_bc" style="float: right;">
                                <?php if ($_smarty_tpl->tpl_vars['uid']->value&&$_smarty_tpl->tpl_vars['usertype']->value=='2') {?>
                                <a href="javascript:void(0)"  class="Search_jobs_scq"  onclick="addfinder('<?php echo $_smarty_tpl->tpl_vars['paras']->value;?>
','2','0')">+ ����Ϊ����������</a>
                                <?php }?>
                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['uid']->value&&$_smarty_tpl->tpl_vars['usertype']->value=='2') {?>
                        <div style="float: left">
                            <div class="Search_jobs_more_chlose" style="width: 200px;margin-left: 30px;">
                                <span class="Search_jobs_more_chlose_s" style="width: 165px;">��ѡ���˲���������</span><i class=""></i>
                                <div class="Search_jobs_more_chlose_list none" style="width: 200px;">
                                    <ul class="select_hyitem">
                                        <li><a class="Search_jobs_cxz widtha" href="/resume/index.php">ȫ��</a> </li>
                                        <?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['li']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['finders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['li']->key => $_smarty_tpl->tpl_vars['li']->value) {
$_smarty_tpl->tpl_vars['li']->_loop = true;
?>
                                        <li><a class="Search_jobs_cxz widtha" href="/resume/index.php?job=1&all=0_0_0_0_0_0_0_0_0&tp=0&page=1&<?php echo $_smarty_tpl->tpl_vars['li']->value['para'];?>
"><?php if ($_smarty_tpl->tpl_vars['li']->value['name']) {
echo $_smarty_tpl->tpl_vars['li']->value['name'];
} else { ?>δ����<?php }?></a> </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <div class="Search_jobs_form_list">
                    <div class="Search_jobs_name"> ѧ����</div>
                    <div class="Search_jobs_sub ">
                        <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1','v'=>0),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['edu']=='') {?>Search_jobs_sub_cur<?php }?>">ȫ��</a>
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'edu','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['edu']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?> <?php if ($_smarty_tpl->tpl_vars['key']->value>6) {?>hy<?php }?> <?php if ($_smarty_tpl->tpl_vars['key']->value>6) {?>none<?php }?>"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
                        <?php } ?>
                    </div>

                </div>
                <div class="Search_jobs_form_list">
                    <div class="Search_jobs_name"> ��ҵ��</div>
                    <div class="Search_jobs_sub ">
                        <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1','v'=>0),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['hy']=='') {?>Search_jobs_sub_cur<?php }?>">ȫ��</a>

                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'hy','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['hy']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?> <?php if ($_smarty_tpl->tpl_vars['key']->value>6) {?>hy<?php }?> <?php if ($_smarty_tpl->tpl_vars['key']->value>6) {?>none<?php }?>"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
                        <?php } ?>
                    </div>
                    <div class="zh_more"> <a href="javascript:checkmore('hy');" id="hy" rel="nofollow">����</a> </div>
                </div>

                <?php if (!$_GET['job1']) {?>
                <div class="Search_jobs_form_list">
                    <div class="Search_jobs_name"> ְ�ܣ�</div>
                    <div class="Search_jobs_sub ">
                        <input type="hidden" name="job_post" id="job_post" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['jobs_id'];?>
">
                        <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1','v'=>0),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1']=='') {?>Search_jobs_sub_cur<?php }?>">ȫ��</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?> <?php if ($_smarty_tpl->tpl_vars['key']->value>6) {?>job1list<?php }?> <?php if ($_smarty_tpl->tpl_vars['key']->value>6) {?>none<?php }?>"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
                    <div class="zh_more"> <a onclick="index_job(3,'#job_post','#job_post','left:100px;top:100px; position:absolute;','');" id="job1list" rel="nofollow">����</a> </div>
                </div>
                <?php }?>
                <?php if ($_GET['job1']&&!$_GET['job1_son']) {?>
                <div class="Search_jobs_form_list">
                    <div class="Search_jobs_name"> ���ࣺ</div>
                    <div class="Search_jobs_sub ">
                        <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1_son'),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1_son']=='') {?>Search_jobs_sub_cur<?php }?>">ȫ��</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_GET['job1']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1_son','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1_son']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
                </div>
                <?php }?>

                <?php if ($_GET['job1_son']) {?>
                <div class="Search_jobs_form_list">
                    <div class="Search_jobs_name"> ���</div>
                    <div class="Search_jobs_sub ">
                        <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1_son','v'=>$_GET['job1_son']),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job_post']=='') {?>Search_jobs_sub_cur<?php }?>">ȫ��</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_GET['job1_son']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job_post','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job_post']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
                </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_web_site']==1&&$_smarty_tpl->tpl_vars['config']->value['cityname']&&$_smarty_tpl->tpl_vars['config']->value['cityname']!=$_smarty_tpl->tpl_vars['config']->value['sy_indexcity']) {?>
                <div class="Search_citybox">
                    <div class="Search_cityboxname"> �ص㣺</div>
                    <div class="Search_citybox_right">
                        <div class="Search_cityboxright">
                            <div class="search_city_list search_city_listw1100">
                                <?php if (!$_GET['cityid']&&$_GET['three_cityid']) {?>
                                <a class="city_name city_name_active" style="text-decoration:none;cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['three_cityid']];?>
</a>
                                <?php } else { ?>

                                <?php if ($_GET['cityid']) {?>
                                <?php if (is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']])) {?>
                                <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'three_cityid'),$_smarty_tpl);?>
" class="city_name <?php if (!$_GET['three_cityid']) {?>city_name_active<?php }?>">����</a>
                                <?php  $_smarty_tpl->tpl_vars['tid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tid']->key => $_smarty_tpl->tpl_vars['tid']->value) {
$_smarty_tpl->tpl_vars['tid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['tid']->key;
?>
                                <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'three_cityid','v'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['three_cityid']==$_smarty_tpl->tpl_vars['tid']->value) {?>city_name_active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['tid']->value];?>
</a>
                                <?php } ?>
                                <?php } else { ?>
                                <a class="city_name city_name_active" style="text-decoration:none;cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];?>
</a>
                                <?php }?>


                                <?php } else { ?>

                                <?php if (is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['provinceid']])) {?>
                                <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'cityid'),$_smarty_tpl);?>
" class="city_name <?php if (!$_GET['cityid']) {?>city_name_active<?php }?>">����</a>
                                <?php  $_smarty_tpl->tpl_vars['tid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_GET['provinceid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tid']->key => $_smarty_tpl->tpl_vars['tid']->value) {
$_smarty_tpl->tpl_vars['tid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['tid']->key;
?>
                                <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'cityid','v'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
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
                    <div class="Search_cityboxname"> �ص㣺</div>
                    <div class="Search_citybox_right">
                        <div class="Search_cityall none">
                            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'provinceid','v'=>0),$_smarty_tpl);?>
" class="Search_jobs_sub_a city_name">ȫ��</a>
                            <?php  $_smarty_tpl->tpl_vars['pid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pid']->key => $_smarty_tpl->tpl_vars['pid']->value) {
$_smarty_tpl->tpl_vars['pid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['pid']->key;
?>
                            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'provinceid','v'=>$_smarty_tpl->tpl_vars['pid']->value),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['provinceid']==$_smarty_tpl->tpl_vars['pid']->value) {?>city_name_active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['pid']->value];?>
</a>
                            <?php } ?>
                        </div>
                        <div class="Search_cityboxright">
                            <a href="javascript:;" onclick="acityshow('1')" class="search_city_list_cur <?php if ($_GET['provinceid']&&!$_GET['cityid']||!is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']])) {?>search_city_active<?php }?> <?php if (!$_GET['provinceid']) {?>none<?php }?> acity_two" style="text-decoration:none;cursor:pointer;"><span class="search_city_p"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']];?>
</span><i class="search_city_p_jt"></i><i class="search_city_list_line"></i></a>
                            <a href="javascript:;" <?php if ($_GET['cityid']) {?>onclick="acityshow('2')"<?php }?> class="search_city_list_cur <?php if ($_GET['cityid']&&is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']])) {?>search_city_active<?php }?> <?php if (!$_GET['provinceid']||!$_GET['cityid']||!is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']])) {?>none<?php }?> acity_three" style="text-decoration:none;cursor:pointer;"><span class="search_city_p"><?php if (!$_GET['cityid']) {?>����<?php } else {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];
}?></span><i class="search_city_list_line"></i></a>
                            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'provinceid','v'=>0),$_smarty_tpl);?>
" class="search_city_list_all <?php if (!$_GET['provinceid']) {?>Search_jobs_sub_cur<?php }?>">ȫ��</a>
                            <div class="search_city_list">
                                <?php  $_smarty_tpl->tpl_vars['pid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pid']->key => $_smarty_tpl->tpl_vars['pid']->value) {
$_smarty_tpl->tpl_vars['pid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['pid']->key;
?>
                                <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'provinceid','v'=>$_smarty_tpl->tpl_vars['pid']->value),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['provinceid']&&!$_GET['cityid']) {
if ($_smarty_tpl->tpl_vars['key']->value>13) {?>none<?php }
} elseif ($_GET['cityid']) {
if ($_smarty_tpl->tpl_vars['key']->value>12) {?>none<?php }
} else {
if ($_smarty_tpl->tpl_vars['key']->value>14) {?>none<?php }
}?> <?php if ($_GET['provinceid']==$_smarty_tpl->tpl_vars['pid']->value) {?>Search_jobs_sub_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['pid']->value];?>
</a>
                                <?php } ?>
                            </div>
                            <a href="javascript:;" class="search_city_list_more" id="acity">����</a>
                        </div>
                        <div class="Search_cityboxclose <?php if (!$_GET['provinceid']||($_GET['provinceid']&&$_GET['cityid']&&is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']]))) {?>none<?php }?>" id="acity_two">
                            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'cityid'),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['provinceid']&&!$_GET['cityid']&&!$_GET['three_cityid']) {?>Search_jobs_sub_cur<?php }?>">����</a>
                            <?php  $_smarty_tpl->tpl_vars['cid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_GET['provinceid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cid']->key => $_smarty_tpl->tpl_vars['cid']->value) {
$_smarty_tpl->tpl_vars['cid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['cid']->key;
?>
                            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'cityid','v'=>$_smarty_tpl->tpl_vars['cid']->value),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['cityid']==$_smarty_tpl->tpl_vars['cid']->value) {?>city_name_active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['cid']->value];?>
</a>
                            <?php } ?>
                        </div>
                        <div class="Search_cityboxclose <?php if (!$_GET['cityid']||!is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']])) {?>none<?php }?>" id="acity_three">
                            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'three_cityid'),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['provinceid']&&$_GET['cityid']&&!$_GET['three_cityid']) {?>Search_jobs_sub_cur<?php }?>">����</a>
                            <?php  $_smarty_tpl->tpl_vars['tid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tid']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tid']->key => $_smarty_tpl->tpl_vars['tid']->value) {
$_smarty_tpl->tpl_vars['tid']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['tid']->key;
?>
                            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'three_cityid','v'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
" class="city_name <?php if ($_GET['three_cityid']==$_smarty_tpl->tpl_vars['tid']->value) {?>Search_jobs_sub_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['tid']->value];?>
</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php }?>



                <div class="Search_jobs_form_list search_more">
                    <div class="Search_jobs_name"> ��н��</div>
                    <div>
                        <input type="text" name="minsalary" id="min" value="<?php if ($_GET['minsalary']) {
echo $_GET['minsalary'];
}?>" placeholder="" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="job_xz_text"/>
                        <span class="job_xz_line">-</span>
                        <input type="text" name="maxsalary" id="max" value="<?php if ($_GET['maxsalary']) {
echo $_GET['maxsalary'];
}?>" placeholder="" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="job_xz_text"/>
                        <input type="submit" value="ȷ��" class="job_xz_bth salary_btn"/>
                    </div>
                    <div class="Search_jobs_name"> ���䣺</div>
                    <div>
                        <input type="text" name="minage" id="minage" value="<?php if ($_GET['minage']) {
echo $_GET['minage'];
}?>" placeholder="" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="job_xz_text"/>
                        <span class="job_xz_line">-</span>
                        <input type="text" name="maxage" id="maxage" value="<?php if ($_GET['maxage']) {
echo $_GET['maxage'];
}?>" placeholder="" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="job_xz_text"/>
                        <input type="submit" value="ȷ��" class="job_xz_bth age_btn"/>
                    </div>
                </div>

                <div class="Search_jobs_form_list search_more">
                    <div class="Search_jobs_name"> ���ࣺ</div>


                    <div class="Search_jobs_sub" style="width:1090px;">


                        <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_GET['edu']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['edu']];
} else { ?>����Ҫ��<?php }?></span><i class=""></i>
                            <div class="Search_jobs_more_chlose_list none">
                                <ul>
                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_word']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                    <li><a class="Search_jobs_cxz width110" href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'edu','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>



                        <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_GET['sex']) {
echo $_smarty_tpl->tpl_vars['arr_data1']->value;
} else { ?>�Ա�Ҫ��<?php }?></span><i class=""></i>
                            <div class="Search_jobs_more_chlose_list none">
                                <ul>
                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_data']->value['sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                    <li><a class="Search_jobs_cxz width110" href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'sex','v'=>$_smarty_tpl->tpl_vars['j']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>

                        <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']]) {
echo $_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']];
} else { ?>����ʱ��<?php }?></span><i class=""></i>
                            <div class="Search_jobs_more_chlose_list none">
                                <ul>
                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['uptime']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                    <li><a class="Search_jobs_cxz width110" href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'uptime','v'=>$_smarty_tpl->tpl_vars['key']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="Search_jobs_more_chlose" style="width: 150px;"><span class="Search_jobs_more_chlose_s"><?php if ($_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']]) {
echo $_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']];
} else { ?>��ְ״̬<?php }?></span><i class=""></i>
                            <div class="Search_jobs_more_chlose_list none" style="width: 150px;">
                                <ul>
                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_jobstatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                    <li><a class="Search_jobs_cxz width110" href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'uptime','v'=>$_smarty_tpl->tpl_vars['key']->value),$_smarty_tpl);?>
')" style="width: 150px;"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($_GET['job1']||$_GET['job1_son']||$_GET['job_post']||$_GET['provinceid']||$_GET['cityid']||$_GET['three_cityid']||$_GET['hy']||$_GET['minsalary']||$_GET['maxsalary']||$_GET['edu']||$_GET['exp']||$_GET['tag']||$_GET['sex']||$_GET['type']||$_GET['report']||$_GET['uptime']||$_GET['keyword']||$_GET['idcard']||$_GET['work']||$_GET['jobs_id1']||$_GET['jobs_id2']||$_GET['jobs_id']||$_GET['minage']||$_GET['maxage']) {?>
                <div class="Search_close_box">
                    <div>
                        <div class="Search_clear"> <a href="<?php echo smarty_function_url(array('m'=>'resume'),$_smarty_tpl);?>
"> �����ѡ</a></div>
                        <span class="Search_close_box_s">��ѡ������</span>
                    </div>
                    <?php if ($_GET['jobs_id1']) {?>
                    <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'jobs_id1'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">ְλ���ࣺ
                    <?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['jobs_id1']];?>

                    </a>
                    <?php }?>

                    <?php if ($_GET['jobs_id2']) {?>
                    <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'jobs_id2'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">ְλ���ࣺ
                        <?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['jobs_id2']];?>

                    </a>
                    <?php }?>

                    <?php if ($_GET['jobs_id']) {?>
                    <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'jobs_id'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">ְλ���ࣺ
                        <?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['jobs_id']];?>

                    </a>
                    <?php }?>

                    <?php if ($_GET['job1']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'job1'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">ְλ���ࣺ<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['job1']];?>
</a> <?php }?>
                    <?php if ($_GET['job1_son']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'job1_son'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['job1_son']];?>
</a> <?php }?>
                    <?php if ($_GET['job_post']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'job_post'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['job_post']];?>
</a> <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['config']->value['cityid']==''&&$_smarty_tpl->tpl_vars['config']->value['three_cityid']=='') {?>
                    <?php if ($_GET['provinceid']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'provinceid'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">�����ص㣺<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']];?>
</a> <?php }?>
                    <?php if ($_GET['cityid']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'cityid'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];?>
</a> <?php }?>
                    <?php if ($_GET['three_cityid']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'three_cityid'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['three_cityid']];?>
</a> <?php }?>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']]) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'hy'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">��ҵ��<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];?>
</a> <?php }?>
                    <?php if ($_GET['minsalary']&&$_GET['maxsalary']) {?>
                    <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'salary'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">н�ʣ�<?php echo $_GET['minsalary'];?>
-<?php echo $_GET['maxsalary'];?>
</a>
                    <?php } elseif ($_GET['minsalary']&&!$_GET['maxsalary']) {?>
                    <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'salary'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">н�ʣ�<?php echo $_GET['minsalary'];?>
������</a>
                    <?php } elseif (!$_GET['minsalary']&&$_GET['maxsalary']) {?>
                    <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'salary'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">н�ʣ�<?php echo $_GET['maxsalary'];?>
������</a>
                    <?php }?>

                    <?php if ($_GET['minage']&&$_GET['maxage']) {?>
                    <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'age'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">���䣺<?php echo $_GET['minage'];?>
-<?php echo $_GET['maxage'];?>
��</a>
                    <?php } elseif ($_GET['minage']&&!$_GET['maxage']) {?>
                    <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'age'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">���䣺<?php echo $_GET['minage'];?>
������</a>
                    <?php } elseif (!$_GET['minage']&&$_GET['maxage']) {?>
                    <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'age'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">���䣺<?php echo $_GET['maxage'];?>
������</a>
                    <?php }?>
                    <?php if ($_GET['edu']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'edu'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">ѧ����<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['edu']];?>
</a> <?php }?>
                    <?php if ($_GET['exp']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'exp'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">�������飺<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['exp']];?>
</a> <?php }?>
                    <?php if ($_GET['tag']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'tag'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">���˱�ǩ��<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['tag']];?>
</a> <?php }?>
                    <?php if ($_GET['sex']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'sex'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">�Ա�<?php echo $_smarty_tpl->tpl_vars['arr_data1']->value;?>
</a> <?php }?>
                    <?php if ($_GET['type']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'type'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">�������ͣ�<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['type']];?>
</a> <?php }?>
                    <?php if ($_GET['report']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'report'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">����ʱ�䣺<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['report']];?>
</a> <?php }?>
                    <?php if ($_GET['adtime']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'adtime'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">����ʱ�䣺<?php echo $_smarty_tpl->tpl_vars['adtime']->value[$_GET['adtime']];?>
</a> <?php }?>
                    <?php if ($_GET['uptime']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'uptime'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">����ʱ�䣺<?php echo $_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']];?>
</a> <?php }?>

                    <?php if ($_GET['keyword']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'keyword'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_GET['keyword'];?>
</a> <?php }?>
                    <?php if ($_GET['idcard']) {?><a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'idcard'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">�������֤</a><?php }?>
                    <?php if ($_GET['work']) {?><a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'work'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">����Ʒ</a><?php }?>
                    &nbsp; </div>

                <?php }?>
            </form>
            <div class="clear"></div>
        </div>





        <div class="search_h1_box">
            <div class="search_h1_box_title">
                <ul class="search_h1_box_list">
                    <li <?php if ($_GET['pic']=='') {?>class="search_h1_box_cur "<?php }?> class=" "><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'search'),$_smarty_tpl);?>
">�����˲�</a><i class="search_h1_box_list_icon"></i></li>
                    <li <?php if ($_GET['pic']) {?>class="search_h1_box_cur "<?php }?> class="list_rem  "><a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'tp','v'=>1),$_smarty_tpl);?>
" style="padding-left:10px;">��Ƭ�˲�</a><i class="search_h1_box_list_icon search_h1_box_list_icon_zp png"></i></li>
                </ul>
                <?php if ($_smarty_tpl->tpl_vars['resumekeyword']->value) {?>
                <div class="jobs_tag">���ǲ������ң�<?php  $_smarty_tpl->tpl_vars['keylist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keylist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"10","recom"=>"1","type"=>"5","item"=>"\'keylist\'","nocache"=>"")
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
?><a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'keyword','v'=>$_smarty_tpl->tpl_vars['keylist']->value['key_title']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['keylist']->value['key_title'];?>
" class="jos_tag_a"><?php echo $_smarty_tpl->tpl_vars['keylist']->value['key_name'];?>
</a> <?php } ?> </div>
                <?php } else { ?>
                <div class="jobs_tag">&nbsp;</div>
                <?php }?>
                <div class="search_h1_box_line yun_bg_color"></div>
            </div>
            <div class="search_user_list_tit search_user_list_tit_bg">
                <div class="search_Filter"> <span class="Search_jobs_c_a_ln"> �ҵ� <span class="blod org"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span> λ�˲��������� </span> <span class="yun_search_tit">����ʽ��</span>
                    <ul class="search_Filter_list">
                        <li <?php if ($_GET['order']=='lastdate') {?>class="search_Filter_current"<?php }?>>
                            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'order','v'=>'lastdate'),$_smarty_tpl);?>
"><span>����ʱ��</span><i class="search_Filter_icon"></i></a>
                        </li>
                        <li <?php if ($_GET['order']=='ctime') {?>class="search_Filter_current"<?php }?>>
                            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'order','v'=>'ctime'),$_smarty_tpl);?>
"><span>����ʱ��</span><i class="search_Filter_icon"></i></a>
                        </li>
                    </ul>
                    <div class="search_Filter_Authenticate ">
                        <a href="<?php if ($_GET['idcard']) {
echo smarty_function_listurl(array('m'=>'resume','type'=>'idcard','v'=>0),$_smarty_tpl);
} else {
echo smarty_function_listurl(array('m'=>'resume','type'=>'idcard','v'=>1),$_smarty_tpl);
}?>">
                            <div class="checkbox_job search_Filter_Authenticate_mt8 <?php if ($_GET['idcard']) {?>iselect<?php }?>"><i></i></div>
                            �������֤</a></div>
                    <div class="search_Filter_Authenticate ">
                        <a href="<?php if ($_GET['work']) {
echo smarty_function_listurl(array('m'=>'resume','type'=>'work','v'=>0),$_smarty_tpl);
} else {
echo smarty_function_listurl(array('m'=>'resume','type'=>'work','v'=>1),$_smarty_tpl);
}?>">
                            <div class="checkbox_job search_Filter_Authenticate_mt8 <?php if ($_GET['work']) {?>iselect<?php }?>"><i></i></div>
                            ����Ʒ</a></div>
                </div>
            </div>
        </div>
        <div class="job_left_sidebar"> <?php if ($_smarty_tpl->tpl_vars['pagenum']->value<2) {?>
            <?php  $_smarty_tpl->tpl_vars['user2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user2']->_loop = false;
$user2 = $user2; if (!is_array($user2) && !is_object($user2)) { settype($user2, 'array');}
foreach ($user2 as $_smarty_tpl->tpl_vars['user2']->key => $_smarty_tpl->tpl_vars['user2']->value) {
$_smarty_tpl->tpl_vars['user2']->_loop = true;
?>
            <?php if ($_GET['pic']) {?>
            <div class="resume_list" >
                <dl class="resume_list_dl">
                    <dt><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user2']->value['id']),$_smarty_tpl);?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['user2']->value['photo'];?>
" width="80" height="100" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);"/><i class="user_photo_bg"></i></a></dt>
                    <dd>
                        <div class="resume_list_p2_l fl">
                            <div class="resume_list_p1"><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user2']->value['id']),$_smarty_tpl);?>
" class="resume_list_name yun_text_color" target="_blank"><?php if (in_array($_smarty_tpl->tpl_vars['user2']->value['id'],$_smarty_tpl->tpl_vars['eid']->value)) {
echo $_smarty_tpl->tpl_vars['user2']->value['uname'];
} else {
echo $_smarty_tpl->tpl_vars['user2']->value['username_n'];
}?></a> </div>

                            <div class="company_det">
                                <span class="search_job_list_box_s"><em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['arr_data']->value['sex'][$_smarty_tpl->tpl_vars['user2']->value['sex']];?>
</em></span><span class="search_job_list_box_line">|</span> <span class="search_job_list_box_s"><em class="com_search_job_em"><?php if ($_smarty_tpl->tpl_vars['user2']->value['age']==0) {?>����<?php } else {
echo $_smarty_tpl->tpl_vars['user2']->value['age'];?>
��<?php }?></em></span><span class="search_job_list_box_line">|</span>
                                <?php if ($_smarty_tpl->tpl_vars['user2']->value['exp_n']) {?>
                                <span class="search_job_list_box_s"><em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['user2']->value['exp_n'];?>
����</em></span>
                                <span class="search_job_list_box_line">|</span>
                                <?php }?>
                                <span class="search_job_list_box_s"><em class="com_search_job_em"> <?php echo $_smarty_tpl->tpl_vars['user2']->value['edu_n'];?>
ѧ��</em></span></div>
                            <?php if ($_smarty_tpl->tpl_vars['user2']->value['tag']) {?>
                            <div class="job_welfare_tag">
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['user2']->value['tag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                <?php if ($_smarty_tpl->tpl_vars['key']->value<5) {?>
                                <span class="job_welfare_tag_s">
                <i class="job_welfare_tag_s_icon"></i>
				<?php echo $_smarty_tpl->tpl_vars['v']->value;?>

				</span>
                                <?php }?>
                                <?php } ?>
                            </div>
                            <?php } else { ?>
                            <div class="job_describe_p"><?php echo $_smarty_tpl->tpl_vars['user2']->value['user_jobstatus_n'];?>
  </div>
                            <?php }?>
                        </div>
                        <div class="resume_list_p2_r">
                            <?php if ($_smarty_tpl->tpl_vars['user2']->value['expectjob']) {?>
                            <div class="tx_yxjob">����ְλ��
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['user2']->value['expectjob']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                <?php if ($_smarty_tpl->tpl_vars['key']->value<5) {?>
                                <span class="resume_job_tag"><i class="resume_job_tag_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</span>
                                <?php }?>
                                <?php } ?>
                            </div>
                            <?php }?>
                            <div class="">�������11��<?php echo $_smarty_tpl->tpl_vars['user2']->value['hope_city'];?>


                            </div>
                            <div class="resume_list_p2">������н��<span class="resume_list_p2_xz"><?php echo $_smarty_tpl->tpl_vars['user2']->value['salary_n'];?>
</span></div>

                        </div>
                    </dd>
                    <span class="resume_list_jlzd" ><span style="color:red;">�ö�</span></span>
                </dl>
            </div>
            <?php } else { ?>
            <div class="search_user_list <?php if ($_smarty_tpl->tpl_vars['key']->value%2!='0') {
}?>">
                <div class="user_photo_left"><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user2']->value['id']),$_smarty_tpl);?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['user2']->value['photo'];?>
" width="80" height="100" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);"/><i class="user_photo_bg"></i></a></div>
                <div class="usersearch_job_left_siaber"> <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user2']->value['id']),$_smarty_tpl);?>
" target="_blank" class="fl search_job_jobs_name yun_text_color">  <?php echo $_smarty_tpl->tpl_vars['user2']->value['uname'];?>
</a>

                    <?php if ($_smarty_tpl->tpl_vars['user2']->value['idcard_status']=='1') {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/sf.png" title="�������֤"  class="user_rz_img png fl"/><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['user2']->value['ispic']) {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/profile.png" title="��������" class="user_rz_img png fl"/><?php }?>

                    <?php if (in_array($_smarty_tpl->tpl_vars['user2']->value['id'],$_smarty_tpl->tpl_vars['lookresume']->value)) {?><span class="co_fav"><i></i><em>�����</em></span><?php }?>
                    <?php if (in_array($_smarty_tpl->tpl_vars['user2']->value['id'],$_smarty_tpl->tpl_vars['talentpool']->value)) {?><span class="co_fav"><i></i><em>���ղ�</em></span><?php }?>
                    <?php if (in_array($_smarty_tpl->tpl_vars['user2']->value['uid'],$_smarty_tpl->tpl_vars['useridmsg']->value)) {?><span class="co_fav"><i></i><em>������</em></span><?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['job_list']->value['rec_time']>time()) {?><img width="15" height="15" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/tui.png" title="վ���Ƽ�"/><?php }?>
                    <div class="company_det">
                        <span class="search_job_list_box_s"><em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['arr_data']->value['sex'][$_smarty_tpl->tpl_vars['user2']->value['sex']];?>
</em> </span><span class="search_job_list_box_line">|</span>
                        <span class="search_job_list_box_s"><em class="com_search_job_em"> <?php if ($_smarty_tpl->tpl_vars['user2']->value['age']==0) {?>����<?php } else {
echo $_smarty_tpl->tpl_vars['user2']->value['age'];?>
��<?php }?></em> </span><span class="search_job_list_box_line">|</span>
                        <?php if ($_smarty_tpl->tpl_vars['user2']->value['exp_n']) {?>
                        <span class="search_job_list_box_s"><em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['user2']->value['exp_n'];?>
����</em> </span><span class="search_job_list_box_line">|</span>
                        <?php }?>
                        <span class="search_job_list_box_s"><em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['user2']->value['edu_n'];?>
ѧ��</em></span>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['user2']->value['tag']) {?>
                    <div class="company_bq">
                        <div class="job_welfare_tag" >

                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['user2']->value['tag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <?php if ($_smarty_tpl->tpl_vars['key']->value<5) {?>
                            <span class="job_welfare_tag_s"><i class="job_welfare_tag_s_icon"></i>
			<?php echo $_smarty_tpl->tpl_vars['v']->value;?>

			</span>
                            <?php }?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="job_describe_p"><?php echo $_smarty_tpl->tpl_vars['user2']->value['user_jobstatus_n'];?>
  </div>
                    <?php }?>
                </div>
                <div class="user_det_c_name">
	  <span class="search_job_list_box_user">������У�<em class="com_search_job_em">
          <?php echo $_smarty_tpl->tpl_vars['user2']->value['hope_city'];?>


      </em></span>
                    <span class="search_job_list_box_user search_job_list_box_userpd">������н��<em class="com_search_job_em com_search_job_em_pay"><?php echo $_smarty_tpl->tpl_vars['user2']->value['salary_n'];?>
</em> </span>

                    <?php if ($_smarty_tpl->tpl_vars['user2']->value['hope_job']) {?>
                    <div class="resume_yx_job"><span class="resume_yx_job_name">����ְλ��</span>
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['user2']->value['hope_job']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <?php if ($_smarty_tpl->tpl_vars['key']->value<5) {?>
                        <span class="resume_job_tag"><i class="resume_job_tag_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</span>
                        <?php }?>
                        <?php } ?>
                    </div>
                    <?php }?>
                </div>
                <div class="yun_user_operation_l"> <span class="resume_list_jobzd" ><span style="color:red;">�ö�</span></span> </div>
                <div class="yun_user_operation">
                    <div class="user_a_search_time"> <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user2']->value['id']),$_smarty_tpl);?>
" target="_blank" class="yun_user_lok_bth ">�鿴</a> </div>
                </div>
            </div>
            <?php }?>
            <?php } ?>
            <?php }?>

            <div class="clear"></div>
            <?php if ($_smarty_tpl->tpl_vars['total']->value!=0||is_array($_smarty_tpl->tpl_vars['user2']->value)) {?>
            <div class="search_pages">
                <div class="pages"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
            </div>
            <?php } else { ?>
            <div class="seachno">
                <div class="seachno_left"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" width="144" height="102"/></div>
                <div class="listno-content"> <strong>�ܱ�Ǹ��û���ҵ������������˲�</strong><br>
                    <span> ��������<br>
        1���ʵ�������ѡ�������<br>
        2���ʵ�ɾ������������ؼ���<br>
        </span> <span> ���Źؼ��֣�<br>
        <?php  $_smarty_tpl->tpl_vars['klist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['klist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"10","recom"=>"1","type"=>"5","item"=>"\'klist\'","nocache"=>"")
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
foreach ($list as $_smarty_tpl->tpl_vars['klist']->key => $_smarty_tpl->tpl_vars['klist']->value) {
$_smarty_tpl->tpl_vars['klist']->_loop = true;
?><a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'keyword','v'=>$_smarty_tpl->tpl_vars['klist']->value['key_title']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['klist']->value['key_title'];?>
"><?php echo $_smarty_tpl->tpl_vars['klist']->value['key_name'];?>
</a> <?php } ?></span> </div>
            </div>
            <?php }?> </div>

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
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/search.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/class.public.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/index.js" type="text/javascript"><?php echo '</script'; ?>
>
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    DD_belatedPNG.fix('.png,.user_photo_bg');
<?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
>
    $(function(){
//        $("#form").submit(function(e){
//            var min = $("#min").val();
//            var max = $("#max").val();
//            if(min && max && parseInt(max) < parseInt(min)){
//                $("#min").val(max);
//                $("#max").val(min);
//            }
//        });
    });
    $("body").on("click","#btnSubmitJobsort",function () {
        var v = $("#job_post").val();
        $.ajax({
            type:"post",
            url:"/resume/index.php?c=get_url",
            data:{
                m:"resume",
                type:"jobs_id",
                jobs_id:v,
                all:"<?php echo $_GET['all'];?>
"
            },
            success:function (data) {
                window.location.href = data;
            }
        })
    })

    $("body").on("click",".salary_btn",function () {
        var min = $("#min").val();
        var max = $("#max").val();
        $.ajax({
            type:"post",
            url:"/resume/index.php?c=get_url",
            data:{
                m:"resume",
                type:"salary",
                minsalary:min,
                maxsalary:max,
                all:"<?php echo $_GET['all'];?>
"
            },
            success:function (data) {
                window.location.href = data;
            }
        })
    })

    $("body").on("click",".age_btn",function () {
        var minage = $("#minage").val();
        var maxage = $("#maxage").val();
        $.ajax({
            type:"post",
            url:"/resume/index.php?c=get_url",
            data:{
                m:"resume",
                type:"age",
                minage:minage,
                maxage:maxage,
                all:"<?php echo $_GET['all'];?>
"
            },
            success:function (data) {
                window.location.href = data;
            }
        })
    })


    function change_keyword(keyword,e) {
        $(".Search_jobs_text").attr("name",keyword);
        $(".keyword_turn").html($(e).html());
        $(".Search_jobs_more_chlose_list").hide();
    }
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/login.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php }} ?>
