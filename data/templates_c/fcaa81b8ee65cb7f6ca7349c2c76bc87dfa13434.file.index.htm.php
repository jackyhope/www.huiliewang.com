<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-27 11:37:43
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:4688795475bac5087e35d01-64332756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcaa81b8ee65cb7f6ca7349c2c76bc87dfa13434' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/index.htm',
      1 => 1517986132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4688795475bac5087e35d01-64332756',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'company' => 0,
    'username' => 0,
    'member' => 0,
    'guweninfo' => 0,
    'style' => 0,
    'atn' => 0,
    'report' => 0,
    'kfqq' => 0,
    'des_resume' => 0,
    'de_resume' => 0,
    'down_resume' => 0,
    'normal_job_num' => 0,
    'addjobnum' => 0,
    'statis' => 0,
    'days' => 0,
    'jobsbid' => 0,
    'shuaxuanjobs' => 0,
    'des_shuaxuanjobs' => 0,
    'ulist' => 0,
    'jobs' => 0,
    'time' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bac50881adc34_93075464',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bac50881adc34_93075464')) {function content_5bac50881adc34_93075464($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_sign')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.sign.php';
?><?php $ulist=array();global $db,$db_config,$config;
		if(is_array($_GET)){
			foreach($_GET as $key=>$value){
				if($value=='0'){
					unset($_GET[$key]);
				}
			}
		}
		eval('$paramer=array("where"=>"\'auto.userwhere\'","limit"=>"12","item"=>"\'ulist\'","nocache"=>"")
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
		$ulist=$db->select_all("resume_index",$where.$limit,"*");
		
        include(CONFIG_PATH."db.data.php");		
		if($ulist && is_array($ulist)){
			if($paramer['top']){
				$uids=$m_name=array();
				foreach($ulist as $k=>$v){
					$uids[]=$v[uid];
				}
				$member=$db->select_all($db_config[def]."member","`uid` in(".@implode(',',$uids).")","uid,username");
				foreach($member as $val){
					$m_name[$val[uid]]=$val['username'];
				}
			}
			foreach($ulist as $key=>$value){
				$uid[] = $value['uid'];
				$eid[] = $value['id'];
			}
			$eids = @implode(',',$eid);
			$uids = @implode(',',$uid);
            $resume=$db->select_all("resume","`id` in(".$eids.")","id,name,nametype,tag,sex,edu,exp,photo,phototype,birthday");
           
             $resume_expect=$db->select_all("resume_expect","`id` in(".$eids.")","*");
             
			foreach($ulist as $k=>$v){
			   
			    foreach($resume_expect as $val){
			        if($v['id']==$val['id']){
			           $ulist[$k]['uname'] =  $val[uname];
			          
			            $hope_city[0] = $city_name[$v[city]];
                        $hope_city[1] = $city_name[$v[city1]];
                        $hope_city[2] = $city_name[$v[city2]];
                        $hope_city = array_filter($hope_city);
                       $ulist[$k]['hope_city'] = implode(",",$hope_city);
                       
                       $salary = $v[minsalary]*$v[salary_month];
                       $ulist[$k]['salary_n'] = "��".$salary."����";
                       
                        $hope_job[0] = $job_name[$v[jobs_id]];
                        $hope_job[1] = $job_name[$v[jobs_id1]];
                        $hope_job[2] = $job_name[$v[jobs_id2]];
                        $hope_job = array_filter($hope_job);
                       $ulist[$k]['hope_job'] = $hope_job;
			        }
                }
			    foreach($resume as $val){
			        if($v['id']==$val['id']){
			    		$ulist[$k]['edu_n']=$userclass_name[$val['edu']];
				        $ulist[$k]['exp_n']=$userclass_name[$val['exp']];
			            if($val['birthday']){
							$year = date("Y",strtotime($val['birthday']));
							$ulist[$k]['age'] =date("Y")-$year;
							
						}
		                
		                $ulist[$k]['sex'] =$val['sex'];  
		                $ulist[$k]['phototype']=$val[phototype];
		                if($val['photo'] && $val['phototype']!=1&&(file_exists(str_replace($config['sy_weburl'],APP_PATH,'.'.$val['photo']))||file_exists(str_replace($config['sy_weburl'],APP_PATH,$val['photo'])))){
            				$ulist[$k]['photo']=str_replace("./",$config['sy_weburl']."/",$val['photo']);
            			}else{
            				if($val['sex']==1||$val['sex']==153){
            					$ulist[$k]['photo']=$config['sy_weburl']."/".$config['sy_member_icon'];
            				}else{
            					$ulist[$k]['photo']=$config['sy_weburl']."/".$config['sy_member_iconv'];
            				}
            			}
						if($val['tag']){
                            $ulist[$k]['tag']=explode(',',$val['tag']);
	                    }
                        $ulist[$k]['nametype']=$val[nametype];
                        //������ʾ����
						if($config['user_name']==1 || !$config['user_name']){
						if($val['nametype']==3){
						    if($val['sex']==1){
						        $ulist[$k]['username_n'] = mb_substr($val['name'],0,1,'gbk')."����";
						    }else{
						        $ulist[$k]['username_n'] = mb_substr($val['name'],0,1,'gbk')."Ůʿ";
						    }
						}elseif($val['nametype']==2){
						    $ulist[$k]['username_n'] = "NO.".$v['id'];
						}else{
							$ulist[$k]['username_n'] = $val['name'];
						}
						}elseif($config['user_name']==3){
							if($val['sex']==1){
								$ulist[$k]['username_n'] = mb_substr($val['name'],0,1,'gbk')."����";
							}else{
								$ulist[$k]['username_n'] = mb_substr($val['name'],0,1,'gbk')."Ůʿ";
							}
						}elseif($config['user_name']==2){
							$ulist[$k]['username_n'] = "NO.".$v['id'];
						}elseif($config['user_name']==4){
							$ulist[$k]['username_n'] = $val['name'];
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
					$ulist[$k]['time'] = "һ����";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$ulist[$k]['time'] = "����";
				}elseif($time>$beginToday){
					$ulist[$k]['time'] = date("H:i",$v['lastupdate']);
					$ulist[$k]['redtime'] =1;
				}else{
					$ulist[$k]['time'] = date("Y-m-d",$v['lastupdate']);
				} 
				
				
				$ulist[$k]['user_jobstatus_n']=$userclass_name[$v['jobstatus']];
				$ulist[$k]['job_city_one']=$city_name[$v['provinceid']];
				$ulist[$k]['job_city_two']=$city_name[$v['cityid']];
				$ulist[$k]['job_city_three']=$city_name[$v['three_cityid']];
				
				$ulist[$k]['report_n']=$userclass_name[$v['report']];
				$ulist[$k]['type_n']=$userclass_name[$v['type']];
				$ulist[$k]['lastupdate']=date("Y-m-d",$v['lastupdate']);
					
				$ulist[$k]['user_url']=Url("resume",array("c"=>"show","id"=>$v['id']),"1");
				$ulist[$k]["hy_info"]=$industry_name[$v['hy']];
				if($paramer['top']){
					$ulist[$k]['m_name']=$m_name[$v['uid']];
					$ulist[$k]['user_url']=Url("ask",array("c"=>"friend","a"=>"myquestion","uid"=>$v['uid']));
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
				$ulist[$k]['job_post']=@implode(",",$jobname);
				$ulist[$k]['expectjob']=$jobname;
				
				if($paramer['post_len']){
					$postname[$k]=@implode(",",$jobname);
					$ulist[$k]['job_post_n']=mb_substr($postname[$k],0,$paramer[post_len],"GBK");
				}
			}
			foreach($ulist as $k=>$v){
               if($paramer['keyword']){
					$ulist[$k]['username_n']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$v['username_n']);
					$ulist[$k]['job_post']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$ulist[$k]['job_post']);
					$ulist[$k]['job_post_n']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$ulist[$k]['job_post_n']);
					$ulist[$k]['job_city_one']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['provinceid']]);
					$ulist[$k]['job_city_two']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['cityid']]);
				}
            }
			if($paramer['keyword']!=""&&!empty($ulist)){
				addkeywords('5',$paramer['keyword']);
			}
		} ?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<style>
    .com_index_sign{
        display: none;
    }
</style>
<?php echo '<script'; ?>
>
function Close(id){
	$("#"+id).hide();
	$("#bg").hide();
}
function Next(){
	$("#one_tip").hide();
	$("#two_tip").show();
}
function Close_yds() {       
	 $("#shuaxin").hide();
	 $("#bg").hide();
}
function break_job(num){
	if(num=='0'){ 
		layer.confirm('ÿ������ְλ���۳�<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_jobefresh'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
��ȷ��Ҫˢ�£�',function(){
			layer.load('ִ���У����Ժ�...',0);
			$.post("<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?m=ajax&c=Refresh_job",{},function(data){
				layer.closeAll();
				if(data==1){
					layer.msg("ְλˢ�³ɹ���",2,9,function(){location.reload();});
				}else{
					layer.msg(data,2,8);
				}
			})
		}); 
	}else{
		layer.load('ִ���У����Ժ�...',0);
		$.post("<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?m=ajax&c=Refresh_job",{},function(data){
			layer.closeAll();
			if(data==1){
				layer.msg("ְλˢ�³ɹ���",2,9,function(){location.reload();});
			}else{
				layer.msg(data,2,8);
			}
		})
	}
}
<?php echo '</script'; ?>
>
<div class="w1000"> 
<div style="position:relative; z-index:1005">
  <div class="Description_Layer">
    <div class="Tip_Information" id="one_tip" <?php if ($_smarty_tpl->tpl_vars['company']->value['hy']!='') {?>style="display:none"<?php }?>>
      <div class="Tip_Information_cont">
        <div class="re">
          <div class="Tip_Information_close" onclick="Close('one_tip');"></div>
        </div>
        <div class="Tip_Information_p">
          <p><?php if ($_smarty_tpl->tpl_vars['company']->value['name']) {?>
       <?php echo $_smarty_tpl->tpl_vars['company']->value['name'];
} else {
echo $_smarty_tpl->tpl_vars['username']->value;
}?>�����ѳɹ�ע����ҵ�˺ţ�
   </p>
   <p><span class="tip_wt">������ɲ���ͷ��绰��<em><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</em> </span><a class="tip_fk" href="<?php echo smarty_function_url(array('m'=>'advice'),$_smarty_tpl);?>
" target="_blank">����������߷���</a>
   </p>

        </div>
        <div class="Tip_Information_bot"><a class="tip_ws" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/?c=info" >������ҵ����</a> </div>
      </div>
    </div> 
    <div class="Recruitment_Layer" id="two_tip"  style="display:none">
      <div class="Tip_Information">
        <div>
          <div class="Tip_Information_gl"></div>
          <div class="Tip_Information_jt2"></div>
          <div class="Recruitment_fb"></div>
        </div>
        <div class="Tip_Information_cont">
          <div class="re">
            <div class="Tip_Information_close" onclick="Close('two_tip');"></div>
          </div>
          <div class="Tip_Information_p">��ȷ��Ƹ����ϸ����Ƹ��������׼�����˲ţ� </div>
          <div class="Tip_Information_bot"><a href="javascript:Close('two_tip');" class="Tip-next">֪����</a> </div>
        </div>
      </div>
    </div>
  </div>    </div> 
  
<!--  ��ҳ-->
<div class="com_m_index_left">
<div class="com_m_index_info">
<div class="com_m_index_logo">  <a href="index.php?c=uppic"><img src=".<?php echo $_smarty_tpl->tpl_vars['company']->value['logo'];?>
" width="185" height="75" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_icon'];?>
','2')"/>
<i class="com_m_index_logo_xg"></i></a></div>
<div class="com_m_index_comname"><?php if ($_smarty_tpl->tpl_vars['company']->value['name']) {?>
       <?php echo $_smarty_tpl->tpl_vars['company']->value['name'];
} else { ?>
        <a href="index.php?c=info" style="color:#f60; text-decoration:underline">����δ������ҵ��Ϣ��������ƣ�</a>
        <?php }?></div> 
        <div class="clear"></div>
<div class="com_m_index_rz_box">
<?php if ($_smarty_tpl->tpl_vars['company']->value['email_status']=="1") {?> 
	   <a title="�ʼ�����֤" href="index.php?c=binding" class="com_m_index_rz_box_a">
       <div class="com_m_index_rz_p"><i class="rz_icon rz_yx2"></i>����֤</div></a>
		<?php } else { ?>  
		<a title="�ʼ�δ��֤" href="index.php?c=binding" class="com_m_index_rz_box_a">
         <div class="com_m_index_rz_p"><i class="rz_icon rz_yx"></i>δ��֤</div></a>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['company']->value['moblie_status']=="1") {?> 
		<a title="�ֻ�����֤" href="index.php?c=binding" class="com_m_index_rz_box_a">
        <div class="com_m_index_rz_p"><i class="rz_icon rz_sj2"></i>����֤</div></a>
		<?php } else { ?> 
		<a title="�ֻ�δ��֤" href="index.php?c=binding" class="com_m_index_rz_box_a">
        <div class="com_m_index_rz_p"><i class="rz_icon rz_sj"></i>δ��֤</div></a>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['company']->value['yyzz_status']=="1") {?> 
		<a title="Ӫҵִ������֤" href="index.php?c=binding" id="biza" class="com_m_index_rz_box_a">
        <div class="com_m_index_rz_p"><i class="rz_icon rz_zz2"></i>����֤</div></a> <?php } else { ?> 
		<a title="Ӫҵִ��δ��֤" href="index.php?c=binding" id="biza" class="com_m_index_rz_box_a">
        <div class="com_m_index_rz_p"><i class="rz_icon rz_zz"></i>δ��֤</div></a> <?php }?> 
</div>
<div class="clear"></div>
  <div class="com_m_index_logintime">�ϴε�¼ʱ�䣺<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['member']->value['login_date'],'%Y-%m-%d %H:%M');?>
 </div>      
    <div class="com_m_index_eye"><span class="com_m_index_eye_s"><?php echo $_smarty_tpl->tpl_vars['company']->value['hits'];?>
 �����</span><span class="com_m_index_gz"><?php echo $_smarty_tpl->tpl_vars['company']->value['ant_num'];?>
 �ι�ע</span> </div>   
       <div class="clear"></div> 
    <div class="com_index_bj_box">
  <div class="com_index_bj"><a href="index.php?c=info"><i class="com_index_bjicon com_index_bjiconbj"></i>�༭����</a></div>
  <div class="com_index_bj"><a href="<?php echo smarty_function_url(array('m'=>'company','c'=>'show','id'=>'`$uid`'),$_smarty_tpl);?>
" target="_blank"> <i class="com_index_bjicon com_index_bjiconyl"></i>Ԥ����ҳ</a></div>
  <div class="com_index_bj com_index_bjend"><a href="index.php?c=pay&type=integral"><i class="com_index_bjicon com_index_bjiconsz"></i>���ֳ�ֵ</a></div>

    </div>    
</div>
<div class="com_index_sign"><?php echo smarty_function_sign(array(),$_smarty_tpl);?>
</div>



<?php if ($_smarty_tpl->tpl_vars['guweninfo']->value['id']) {?>
<div class="com_index_kf">
<div class="com_m_index_h1"><span class="com_m_index_h1_s">��ϵ�ͷ�</span></div>
<div class="com_index_kf_box">
<div class="com_index_kf_box_user">
<div class="com_index_kf_box_user_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/kefu.png" style="width:55px;height:64px;border-radius: 0"></div>
<div class="com_index_kf_box_username"><?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['username'];?>
</div>
<div class="">
<?php if ($_smarty_tpl->tpl_vars['guweninfo']->value['qq']) {?>
<a target="_blank" href="tencent://message/?uin=<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['qq'];?>
&Site=<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
&Menu=yes"><img border="0" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/qqkefu.png" alt="���������ҷ���Ϣ"></a>
<?php }?></div>
</div>
<div class="com_index_kf_p">�绰��<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['mobile'];?>
</div>
<div class="com_index_kf_p">΢�ţ�<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['weixin'];?>
</div>
<div class="com_index_kf_p">Q Q��<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['qq'];?>
</div>
<div class="com_index_kf_p">
	<?php if ($_smarty_tpl->tpl_vars['atn']->value['uid']) {?>
	<a href="javascript:void(0)" class="com_index_kf_dz">�ѵ���</a>
	<?php } else { ?>
	<a href="javascript:void(0)" onclick="zan('<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
');" class="com_index_kf_dz">����</a>
	<?php }?>
    <?php if (is_array($_smarty_tpl->tpl_vars['report']->value)&&!$_smarty_tpl->tpl_vars['report']->value['result']) {?>
    <a href="index.php?c=report&act=show"  class="com_index_kf_ts">��Ͷ��</a>
    <?php } else { ?>
	<a href="javascript:void(0)" onclick="reportgw('<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
','Ͷ�߹���');"  class="com_index_kf_ts">Ͷ��</a>
    <?php }?></div>
</div>
</div>

<?php } else { ?>
<div class="com_index_kf">
<div class="com_m_index_h1"><span class="com_m_index_h1_s">��ϵ�ͷ�</span></div>
<div class="com_index_kf_box">
<div class="com_index_kf_box_user">
<div class="com_index_kf_box_user_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/kefu.png" style="width:55px;height:64px;border-radius: 0"></div>
<div class="com_index_kf_box_username">��ϵ�ͷ�</div>
<div class="">
<?php if ($_smarty_tpl->tpl_vars['kfqq']->value) {?>
<a target="_blank" href="tencent://message/?uin=<?php echo $_smarty_tpl->tpl_vars['kfqq']->value;?>
&Site=<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
&Menu=yes"><img border="0" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/qqkefu.png" alt="���������ҷ���Ϣ"></a>
<?php }?>
</div>
</div>
<div class="com_index_kf_p">�绰��<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</div>
<div class="com_index_kf_p">�ֻ���<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webmoblie'];?>
</div>
<div class="com_index_kf_p">Q  Q��<?php echo $_smarty_tpl->tpl_vars['kfqq']->value;?>
</div>
<?php if ($_smarty_tpl->tpl_vars['config']->value['wx_name']) {?><div class="com_index_kf_p">΢�Ź��ںţ�<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_name'];?>
</div><?php }?>
</div>
</div>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wx_qcode']!='') {?>
<div class="left_index_wx" style="display: none;">
<div class="left_index_wx_img"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wx_qcode'];?>
" width="140" height="140"></div>
<div class="left_index_wx_p1">�ֻ����˲�!</div>
<div class="left_index_wx_p">΢��ɨһɨ,��Ƹ����</div>
</div>
<?php }?>


</div>
<div class="com_m_index_right">
    <?php if ($_smarty_tpl->tpl_vars['member']->value['status']!=1) {?>
   	<div class="com_index_wsh fltL">
   		
   		<div class="com_index_wsh_box">
        <div class="com_index_wsh_box_p">�����ʺ���δͨ����ˣ�������ְλ��Ϣ�������ͨ����չʾ��</div>
   		δ��˵���ҵ�û��޷��鿴�˲ż�������ϵ��ʽ��<br/>
   		������ϵ�ͷ��绰��<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
�������Ǿ�����ˡ�
 	</div>
   		
   	</div>
    <?php }?>
    
  	<?php if (!$_smarty_tpl->tpl_vars['company']->value['name']) {?>        
  	<div class="com_index_Prompt fltL">
  		<span class="com_index_Prompt_tip fltL">����˾�����ϻ�δ��д��������ʱ�������Է�ְλŶ</span>
		<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/?c=info" class="com_index_Prompt_ws cblue fltR">��������>></a>
	</div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['company']->value['yyzz_status']!="1") {?>
   	<div class="com_index_Prompt fltL">
   		<span class="com_index_Prompt_tip fltL">����˾��û����Ӫҵִ����֤�����ܻ�Ӱ��������ƸЧ��Ŷ</span>
        <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/?c=binding" class="com_index_Prompt_ws cblue fltR">������֤>></a>
   	</div>
    <?php }?>



<div class="com_m_index_data">
<ul>

<li>
<a href="index.php?c=hr" class="com_m_index_data_box">
<div class="com_m_index_data_iconbg com_m_index_data_iconbg1"><i class="com_m_index_data_icon"></i></div>
<div class="com_m_index_data_name">�յ�����</div>
<div class="com_m_index_data_n"><?php echo $_smarty_tpl->tpl_vars['des_resume']->value;?>
</div>
<div class="com_m_index_data_bth">δ�鿴 <span class="f60"><?php echo $_smarty_tpl->tpl_vars['de_resume']->value;?>
</span></div>
</a></li>
<li><a href="index.php?c=down"  class="com_m_index_data_box"><div class="com_m_index_data_iconbg com_m_index_data_iconbg2"><i class="com_m_index_data_icon"></i></div>
<div class="com_m_index_data_name">�����ؼ���</div>
<div class="com_m_index_data_n"><?php echo $_smarty_tpl->tpl_vars['down_resume']->value;?>
</div>
<div class="com_m_index_data_bth" onclick="javascript:location='index.php?c=down';" style="text-align: center;width: 105px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    display: block;
    background: #7cbb40;
    color: #fff;
    border: 0;
">�鿴  </div>
</a></li>
<li class="com_m_index_data_end">
<div class="com_m_index_data_end_job">
<a href="index.php?c=job&w=1">
<div class="com_m_index_data_iconbg com_m_index_data_iconbg3"><i class="com_m_index_data_icon"></i></div>
<div class="com_m_index_data_name">ְλ����</div>
<div class="com_m_index_data_n"><?php echo $_smarty_tpl->tpl_vars['normal_job_num']->value;?>
</div>
</a>
<div class="com_m_index_data_fbbth">	
<a href="javascript:void(0);" onclick="jobadd_url('<?php echo $_smarty_tpl->tpl_vars['addjobnum']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_job'];?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
');return false;">����ְλ</a></div>
</div>
</li>
</ul>
</div>


<div class="com_m_index_vip">
<div class="com_m_index_h1"><span class="com_m_index_h1_s">�ҵķ���</span></div>
<div class="com_m_index_vip_box">
 ��ǰ�ǣ�<span class="f60"><?php echo $_smarty_tpl->tpl_vars['statis']->value['rating_name'];?>
</span>
   <!--<?php if ($_smarty_tpl->tpl_vars['statis']->value['rating']!='3'&&$_smarty_tpl->tpl_vars['days']->value) {?> &nbsp;&nbsp;&nbsp;-->
 		<!--��Ա����ʱ�䣺<span class="f60"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['statis']->value['vip_stime'],'%Y-%m-%d');?>
 &#45;&#45; <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['statis']->value['vip_etime'],'%Y-%m-%d');?>
 </span>-->
	<!--<?php }?>-->
   <!--<a href="index.php?c=right" class="com_m_index_vip_a">����</a> -->
   <!--<a href="index.php?c=paylogtc" class="com_m_index_vip_a">�ײ�����</a> -->
   <!--<a href="index.php?c=right&act=added" target="_blank" class="com_m_index_vip_a">��ֵ��</a>-->
   <div style="padding-top:10px">
   <span >�ҵ�<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
��</span>
	<span class="f60 bold" id="integral"><?php echo $_smarty_tpl->tpl_vars['statis']->value['integral'];?>
</span> 
	<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
  
	<a href='index.php?c=pay&type=integral' class="com_m_index_vip_a" target="_blank">��ֵ</a>
	<a href="index.php?c=paylog&consume=ok" class="com_m_index_vip_a">��ϸ</a>
	<!--<a href="index.php?c=integral" class="com_m_index_vip_a"> ��λ�ȡ<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
��</a> -->
        </div>
        </div>
<div class="com_m_index_vip_fw" style="display: none">
 <a href="index.php?c=right"><dl><dt><i class="com_m_index_vip_fw_icon"></i></dt><dd class="com_m_index_vip_tfw_t">��Ƹ�ײͷ���</dd><dd>����vip����ռ��Ƹ�Ȼ�</dd></dl></a>
 <!--<a href="index.php?c=job&w=1"> <dl><dt class="com_m_index_vip_zd"><i class="com_m_index_vip_zd_icon"></i></dt><dd class="com_m_index_vip_tfw_t">��Ƹ�ö�����</dd><dd>���˲Ÿ����׷��������Ƹ</dd></dl></a>-->
   <!--<a href="#"  onclick="return jobshuaxin('<?php echo $_smarty_tpl->tpl_vars['jobsbid']->value;?>
');"><dl><dt class="com_m_index_vip_g"><i class="com_m_index_vip_g_icon"></i></dt><dd class="com_m_index_vip_tfw_t">��Ƹְλˢ�·���</dd><dd>����ְλ�����������ƸЧ��</dd></dl></a>-->

   </div> 
</div> 

<?php echo '<script'; ?>
 type="text/javascript">
function jobshuaxin(id){
	<?php if ($_smarty_tpl->tpl_vars['shuaxuanjobs']->value) {?>
	var i=<?php echo $_smarty_tpl->tpl_vars['des_shuaxuanjobs']->value;?>
;
			var num="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_jobefresh'];?>
";
			var breakmsg = '���ι�ˢ��'+i+'��ְλ,��۳�'+i+'��ˢ������,������'+(num*i)+'<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
��';
			layer.confirm(breakmsg,function(){
				$.post("<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?m=ajax&c=Position_job",{idk:i,ids:id},function(data){
					if(data==1){
						layer.msg("ˢ�³ɹ���",2,9,function(){window.location.reload();});
					}else{
						layer.msg(data,2,8);
					}
				})
	});
	<?php } else { ?>
		layer.msg('�����޷�����ְλ��', 2, 8);
	<?php }?>
}


<?php echo '</script'; ?>
>    
        
<div class="com_m_index_resume">
<div class="com_m_index_h1"><span class="com_m_index_h1_s">��������</span>
    <!--<a href="index.php?c=attention_me" class="com_m_index_h1_s_a" target="_blank">�鿴��ע�ҹ�˾���˲�>></a>-->
</div>
 <?php  $_smarty_tpl->tpl_vars['ulist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ulist']->_loop = false;
$ulist = $ulist; if (!is_array($ulist) && !is_object($ulist)) { settype($ulist, 'array');}
foreach ($ulist as $_smarty_tpl->tpl_vars['ulist']->key => $_smarty_tpl->tpl_vars['ulist']->value) {
$_smarty_tpl->tpl_vars['ulist']->_loop = true;
?>
		 <div class="com_index_rue_list fltL mt10">
			<dl>
			<dt>             
           <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>'`$ulist.id`'),$_smarty_tpl);?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['ulist']->value['username_n'];?>
"> <img src="<?php echo $_smarty_tpl->tpl_vars['ulist']->value['photo'];?>
" width="50" height="62px" />  <i class="pic_icombg"></i>    </a>     
			</dt>
			 <dd>
			 <strong><a class=" blod" href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>'`$ulist.id`'),$_smarty_tpl);?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['ulist']->value['username_n'];?>
"><?php echo $_smarty_tpl->tpl_vars['ulist']->value['username_n'];?>
</a></strong>
			 <div class="com_index_rue_list_js"><?php echo $_smarty_tpl->tpl_vars['ulist']->value['edu_n'];?>
ѧ��<i class="com_index_rue_listline">|</i><?php echo $_smarty_tpl->tpl_vars['ulist']->value['exp_n'];?>
����</div>
               <div class="com_index_rue_list_city"><em class="com_index_rue_list_xz "><?php echo $_smarty_tpl->tpl_vars['ulist']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['ulist']->value['job_city_two'];?>
</em>   </div>
			 </dd>
			 </dl>
			 <div class="com_index_rue_list_yx"><span class="com_index_rue_list_yx_s">����ְλ��</span><span class="comn_index_user"><?php echo mb_substr($_smarty_tpl->tpl_vars['ulist']->value['job_post'],0,14,'gbk');?>
</span></div>
		</div> 
		   <?php } ?>
		   <?php if (empty($_smarty_tpl->tpl_vars['ulist']->value)) {?>
			 <div class="msg_no">��ʱδƥ�䵽���ʵļ��� </div> 
		   <?php }?> 
</div>

</div></div>
</div>
 <!----end--->
  <!--ˢ��ְλ��ʾ������-->

<div id="shuaxin" style="display:none;">
<div class="sx_pd">
<div class="sx_top">
<dl>
   <dt></dt>
   <dd>
       <div>���컹ûˢ�£�ˢ��ְλ��<em class="sx_bot_or">ְλ������ǰ</em><br/>���˲Ÿ����׿����㣬<em class="sx_bot_or">���ְλ�����ʣ�</em></div>
       <div class="sx_top_t">
            <em class="sx_top_t_tt">ˢ��ǰ��ȷ��������Ϣ׼ȷ������</em>           
            <p>��ϵ�绰��<?php echo $_smarty_tpl->tpl_vars['company']->value['linktel'];?>
</p>
            <p>�ϴ�ˢ��ʱ�䣺<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['jobs']->value['lastupdate'],"%Y-%m-%d %H:%M:%S");?>
</p>
            <p>��Ƹְλ��<?php echo $_smarty_tpl->tpl_vars['jobs']->value['name'];?>
 </p>
       </div>
    </dd>
</dl>
</div>
</div>
<div class="sx_bot">
     <a class="sx_bot_sx" href="javascript:void(0)" onclick="jobrefresh(<?php echo $_smarty_tpl->tpl_vars['jobs']->value['id'];?>
);">ˢ��</a>
     <a class="sx_bot_qx" href="javascript:layer.closeAll();">ȡ��</a>
</div>

</div>
<!--��ʾ������ end-->  
<!--Ͷ�߹��ʵ�����-->
<div id="<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
" style="display:none;">
  <div class="Binding_pop_box" style="padding:10px;width:330px;height:200px; background:#fff;">
    <div class="Binding_pop_box_msg">��ҪͶ�ߵĹ����ǣ�<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['username'];?>
</div>
    <div class="popjb_tip">Ϊ���ܹ������ṩ�������ķ��񣬷���������������ǻ��һʱ������𸴣�</div>
      
      <div class="">
     	 <textarea id="reason" name="reason" class="popjb_text"></textarea>
      </div>
      <div class="Binding_pop_sub" style="margin-top:15px;"> <span class="Binding_pop_box_list_left">&nbsp;</span>
        <input class="com_pop_bth_qd" onclick="reportSub('index.php?c=report')" type="button" value="ȷ��">
		<input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
" id='eid' name='eid'> 
        <input class="com_pop_bth_qx" type="button" value="ȡ��" onclick="layer.closeAll();">
      </div>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
<?php if ($_smarty_tpl->tpl_vars['company']->value['hy']!=''&&$_smarty_tpl->tpl_vars['jobs']->value['name']!=''&&$_smarty_tpl->tpl_vars['jobs']->value['lastupdate']<$_smarty_tpl->tpl_vars['time']->value&&$_COOKIE['jobrefresh']!='1') {?>
	$.layer({
		type : 1,
		title : 'ˢ��ְλ',
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['500px','320px'],
		page : {dom :"#shuaxin"}
	});
	
<?php }?>

function reportgw(eid,title){
	$.layer({
		type : 1,
		title :title,
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['350px','auto'],
		page : {dom :"#"+eid}
	});
}
function reportSub(url){
	var reason=$("#reason").val();
	var eid=$("#eid").val();
	if(reason==''){
		layer.msg('����дͶ�����ݣ�', 2, 8);return false;
	}
	$.post(url,{reason:reason,eid:eid},function(data){ 
		layer.closeAll();
		if(data=='0'){
			layer.msg('Ͷ��ʧ�ܣ�', 2, 8);
		}else if(data=='1'){
			layer.msg('Ͷ�߳ɹ���', 2, 9,function(){window.location.reload();});
		}else if(data=='2'){			
			layer.msg('��Ͷ�߳ɹ����ȴ�����Ա�ظ���', 2, 8);
		}
	});
}
function zan(id){
	$.post("index.php?m=ajax&c=guwenZan",{id:id},function(data){ 
		if(data=='2'){
			layer.msg('�벻Ҫ�ظ����ޣ�', 2, 8);
		}else if(data=='1'){
			layer.msg('���޳ɹ���',2,9,function(){window.location.reload();});
			//layer.msg("ˢ�³ɹ���",2,9,function(){window.location.reload();});
		}
	});
}
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
