<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-09 14:55:03
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/recommend.htm" */ ?>
<?php /*%%SmartyHeaderCode:10136212425b4306c768b9a9-16077765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'feb52493869545d778c04cdc8ee02b67262a10d4' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/recommend.htm',
      1 => 1520910572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10136212425b4306c768b9a9-16077765',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'jobs' => 0,
    'comclass_name' => 0,
    'city_name' => 0,
    'com' => 0,
    'industry_name' => 0,
    'job_num' => 0,
    'login_date' => 0,
    'total' => 0,
    'search' => 0,
    'user' => 0,
    'lt_style' => 0,
    'li' => 0,
    'list' => 0,
    'pagenav' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b4306c7861bf4_69587874',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b4306c7861bf4_69587874')) {function content_5b4306c7861bf4_69587874($_smarty_tpl) {?><?php if (!is_callable('smarty_function_parse_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.parse_url.php';
?><?php $user=array();global $db,$db_config,$db_config1,$config;
        
        $db1 = new mysql($db_config1['dbhost'], $db_config1['dbuser'], $db_config1['dbpass'], $db_config1['dbname'], ALL_PS, $db_config1['charset'],$db_config1['def']);

		if(is_array($_GET)){
			foreach($_GET as $key=>$value){
				if($value=='0'){
					unset($_GET[$key]);
				}
			}
		}
		eval('$paramer=array("ispage"=>"1","limit"=>"5","minage"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'minage\']","maxage"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'maxage\']","sex"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'sex\']","edu"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'edu\']","order"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'order\']","exp"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'exp\']","keyword"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'keyword\']","hy"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'hy\']","location"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'location\']","jobs_id"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'jobs_id\']","minsalary"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'minsalary\']","status"=>"\'auto.status\'","maxsalary"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'maxsalary\']","resume_kind"=>"\"auto.resume_kind\"","item"=>"\'user\'","name"=>"\'resumelist2\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
        
		$Purl =  $ParamerArr[purl];
        global $ModuleName;

        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }

		$cache_array = $db1->cacheget();
		$userclass_name = $cache_array["user_classname"];
		$city_name      = $cache_array["city_name"];
		$job_name		= $cache_array["job_name"];
		$job_type		= $cache_array["job_type"];
		$industry_name	= $cache_array["industry_name"];
		$where = "1 ";
		
		if($paramer[edu]){
		    $where .=" and edu=".$paramer[edu];
		}
		if($paramer[exp]){
		    $where .=" and exp=".$paramer[exp];
		}
		if($paramer[hy]){
		    $where .=" and hy=".$paramer[hy];
		}
		if($paramer[location]){
		    $where .=" and living=".$paramer[location];
		}
		if($paramer[sex]){
		    $where .=" and sex=".$paramer[sex];
		}
		if($paramer[status]){
		    $where .=" and jobstatus=".$paramer[status];
		}
		if($paramer[jobs_id]){
		    $where .=" and (jobs_id=".$paramer[jobs_id]." or jobs_id1=".$paramer[jobs_id]." or jobs_id2=".$paramer[jobs_id].")";
		}
		
		if($paramer[hope_city]){
		    $where .=" and (city=".$paramer[hope_city]." or city1=".$paramer[hope_city]." or city2=".$paramer[hope_city].")";
		}
		
		if($paramer[minsalary] && $paramer[maxsalary]){
		    $where .=" and (salary*salary_month>".$paramer[minsalary]." and salary*salary_month<".$paramer[maxsalary].")";
		}elseif($paramer[minsalary] && empty($paramer[maxsalary])){
		    $where .=" and salary*salary_month>".$paramer[minsalary];
		}elseif(empty($paramer[minsalary]) && $paramer[maxsalary]){
		    $where .=" and salary*salary_month<".$paramer[maxsalary];
		}

        if($paramer[minage] && $paramer[maxage]){
            $minage = strtotime($paramer[minage].".1.1");
            $maxage = strtotime($paramer[maxage].".1.1");
            $where .=" and (birthday>".$minage." and birthday<".$maxage.")";
        }elseif($paramer[minage] && empty($paramer[maxage])){
            $minage = strtotime($paramer[minage].".1.1");
            $where .=" and birthday>".$minage;
        }elseif(empty($paramer[minage]) && $paramer[maxage]){
            $maxage = strtotime($paramer[maxage].".1.1");
            $where .=" and birthday<".$maxage;
        }
		
		
		
		if($paramer[resume_kind]=="collect"){
			$collect = $db->select_all("fav_resume","uid=".$_COOKIE['uid'],"eid");
			$ids = array();
			foreach($collect as $key=>$li){
			    $ids[$key] = $li[eid];
			}
			$ids = implode(",",$ids);
			if($ids){
			    $where .= " and id in(".$ids.")";
			}else{
			    $where .= " and id in(0)";
			}
			
		}elseif($paramer[resume_kind]=="myself"){
			$where .= " and uid=".$_COOKIE['uid'];
			
		}elseif($paramer[resume_kind]=="recommend"){
		    $recommend = $db->select_all("userid_job","identity=3 and uid=".$_COOKIE['uid'],"eid");
		   
			$ids = array();
			foreach($recommend as $key=>$li){
			    $ids[$key] = $li[eid];
			}
			$ids = implode(",",$ids);
			if($ids){
			    $where .= " and id in(".$ids.")";
			}else{
			    $where .= " and id in(0)";
			}
		}
		
		$where .=" order by lastupdate desc";
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}
		
		if($paramer[ispage]){
		    $limit = PageNavResume($paramer,$_GET,"resume_index",$where,$Purl,"",'0',$_smarty_tpl);
		}


		$user=$db1->select_all("resume_index",$where.$limit,"*");
		
        include(CONFIG_PATH."db.data.php");		
		if($user && is_array($user)){
			foreach($user as $k=>$v){
			    $v=$db1->DB_select_once($db1->get_hash_table("resume",$v[id]),"id=".$v['id']);
			    $edu = unserialize($v['edu_content']);
			   
			    $user[$k] = $v;
			    $user[$k][name] = iconv("UTF-8","gbk",$v[name]);
			    $user[$k][current_company] = iconv("UTF-8","gbk",$v[current_company]);
			    $user[$k][current_job] = iconv("UTF-8","gbk",$v[current_job]);
			    $user[$k]['eid'] = $v[id];
			    $user[$k]['age'] = date("Y")-date("Y",$v['birthday']);
			    $user[$k]['edu_n']=$userclass_name[$v['edu']];
                $user[$k]['exp_n']=$userclass_name[$v['exp']];
                $user[$k]['living']=$city_name[$v['living']];
                if($v['hope_salary']){
                  $user[$k]['salary_n']=$v['hope_salary']."万以上";
                }else{
                    $user[$k]['salary_n']="薪资面议";
                }
               
               
                if($v['citys_id']){
                    $v['citys_id'] = explode(",",$v['citys_id']);
                    $citys_id = "";
                    foreach($v['citys_id'] as $li){
                        $citys_id[] = $city_name[$li];                    
                    }
                    $user[$k]['hope_city'] = implode(",",$citys_id);
                }
                
                if($v['jobs_classid']){
                    $v['jobs_classid'] = explode(",",$v['jobs_classid']);
                    $job_classname = "";
                    foreach($v['jobs_classid'] as $li){
                        $job_classname[] = $job_name[$li];                    
                    }
                    $user[$k]['job_classname'] = $job_classname;
                }
                
			    $user[$k]['project_content'] = array_iconv(array_slice(unserialize($v['project_content']),0,3),"UTF-8","gbk");
                $user[$k]['resume_work'] = array_iconv(array_slice(unserialize($v['work_content']),0,3),"UTF-8","gbk");
              
                 $resume_edu= array_iconv(array_slice(unserialize($v['edu_content']),0,1),"UTF-8","gbk");
                
			    $user[$k]['resume_edu'] = $resume_edu[0];
			    
			      if($v){
			     $user[$k]['apply_jobs'] = $db->select_all("userid_job","eid=".$v['id']." order by datetime desc limit 0,3","job_name,datetime,job_id");
			    $user[$k]['lietou_num']=$db->select_num("userid_job","eid=".$v['id']." and identity=3 group by uid");
			     $user[$k]['fav_resume']=$db->select_num("fav_resume","eid=".$v['id']." and uid=".$_COOKIE['uid']);
			    $user[$k]['job_num']=$db->select_num("userid_job","eid=".$v['id']." and identity=3 group by job_id");
			    $user[$k]['download_num']=$db->select_num("userid_job","eid=".$v['id']." and identity=3 and is_browse=6");
                
        
                
                
                $recommend=$db->DB_select_once("userid_job","eid=".$v['id']." order by datetime desc","datetime");
                if($recommend['datetime']){
                    $user[$k]['datetime']=_format_date($recommend['datetime']);
                }else{
                    $user[$k]['datetime']="暂无推荐";
                }
				$user[$k]['user_jobstatus_n']=$userclass_name[$v['jobstatus']];
								
				$job_classid = explode(",",$v['job_classid']);
				$user[$k]['lastupdate']=date("Y-m-d",$v['lastupdate']);
					
				$user[$k]['user_url']=Url("resume",array("c"=>"show","id"=>$v['id']),"1");

				
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
			    }
			}  
			 $user = array_filter($user);
		}
         ?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/index_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 src="/data/plus/job.cache.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/data/plus/industry.cache.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/class.public.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/comapply.css" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/pinfen.css" type=text/css rel=stylesheet>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/ltqy_detail.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
<div class="top_nav_list" style="display: none;">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div class="w1000">
    <div class="alert alert-success" role="alert" style="width:1100px;margin: 0 auto;color: #3c763d;background-color: #fff;">
        <div class="post-info" style="margin-top: 20px;height: 210px;">
            <div class="info-gs-logo fl" style="float:right;"><img src="<?php if ($_smarty_tpl->tpl_vars['jobs']->value['logo']) {?>.<?php echo $_smarty_tpl->tpl_vars['jobs']->value['logo'];
} else {
echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/nopicqy.png<?php }?>" width="142" height="58"></div>
            <ul class="info-zw" style="list-style: none;float: left;width: 850px;margin-top: 40px;">
                <li class="row-office" style="width: 380px;border-left: none;text-align: left;margin-left: 24px;">
                    <a id="recPosName" style="font-size: 24px;display: inherit;color: #5f75a3;font-weight: inherit;width: 380px;" class="nowrap" href="/job/index.php?c=comapply&id=<?php echo $_smarty_tpl->tpl_vars['jobs']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['jobs']->value['name'];?>
</a>
                    <div class="contentq" style="margin-top: 20px">
                        <label style="color: #ff6600;font-size: 16px;margin-right: 10px;"><?php if ($_smarty_tpl->tpl_vars['jobs']->value['minsalary']) {
echo $_smarty_tpl->tpl_vars['jobs']->value['minsalary'];?>
-<?php echo $_smarty_tpl->tpl_vars['jobs']->value['maxsalary'];?>
元<?php } else { ?>薪资面议<?php }?></label>
                        <label><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['jobs']->value['exp']];?>
工作经验</label>|
                        <label><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['jobs']->value['edu']];?>
学历</label>|
                        <label><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['jobs']->value['provinceid']];?>
-<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['jobs']->value['cityid']];?>
</label>
                    </div>
                    <div class="contentq" style="color: #999999;margin-top: 20px;">更新时间：<?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['jobs']->value['lastupdate']);?>
</div>
                </li>
                <li class="citywidth" style="border-left: none;width: 400px;float: left;margin-left: 30px;">
                    <h5 id="recComName" style="font-size: 16px;display: inherit;color: #333;margin-top: 5px;font-weight: inherit;" class="nowrap"><?php echo $_smarty_tpl->tpl_vars['jobs']->value['com_name'];?>
</h5>
                    <?php if ($_smarty_tpl->tpl_vars['jobs']->value['identity']==3) {?>
                    <div class="titleq">
                        <div class="Compply_right_js">
                            <ul>
                                <li style="width: inherit;"><span style="display: inherit;" class="Compply_right_span_c"><i class="Compply_right_icon Compply_right_icon_hy"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['hy'];?>
</span></li>
                                <li style="width: inherit;"><span style="display: inherit;" class="Compply_right_span_c"><i class="Compply_right_icon Compply_right_icon_xz"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['nature'];?>
</span> </li>
                                <li style="width: inherit;"><span style="display: inherit;" class="Compply_right_span_c"><i class="Compply_right_icon Compply_right_icon_rs"></i><?php echo $_smarty_tpl->tpl_vars['com']->value['scale'];?>
</span></li>

                            </ul>
                        </div></div>
                    <?php } else { ?>
                    <div class="titleq">
                        <div class="Compply_right_js">
                        <ul>
                            <li style="width: inherit;"><span style="display: inherit;" class="Compply_right_span_c"><i class="Compply_right_icon Compply_right_icon_hy"></i><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['com']->value['hy']];?>
</span></li>
                            <li style="width: inherit;"><span style="display: inherit;" class="Compply_right_span_c"><i class="Compply_right_icon Compply_right_icon_xz"></i>合资企业</span> </li>
                            <li style="width: inherit;"><span style="display: inherit;" class="Compply_right_span_c"><i class="Compply_right_icon Compply_right_icon_rs"></i><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['com']->value['mun']];?>
</span></li>

                        </ul>
                    </div></div>
                    <div class="Compply_right_js comppnum" style="padding-top: 0">
                        <ul class="comul">
                            <li style="width: 70px;"><a class="nubers" href="#"><?php echo $_smarty_tpl->tpl_vars['job_num']->value;?>
</a><br>招聘职位</li>
                            <li style="width: 140px;"><label class="nubers">100%</label><br>简历及时处理率</li>
                            <li style=""><label class="nubers"><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['login_date']->value);?>
</label><br>企业最近登录</li>
                        </ul>
                    </div>
                    <?php }?>
                </li>
            </ul>
            <div style="clear:both"></div>
        </div>
    </div>
<div class="admin_mainbody" style="margin-top: 10px;">
  <div class=down_box style="margin-top: 0;">
    <div class=admincont_box>

        <div class="tishilt">
            <label class="xztitle" style="float:left;">选择候选人</label>
            <span class="mal_20">
                <a class="bagn_item <?php if (empty($_GET['resume_kind'])) {?>cur_select<?php }?>" href="/member/index.php?c=recommend&id=<?php echo $_GET['id'];?>
">平台简历库</a>
                <a class="bagn_item <?php if ($_GET['resume_kind']=='collect') {?>cur_select<?php }?>" href="/member/index.php?c=recommend&resume_kind=collect&id=<?php echo $_GET['id'];?>
">收藏的简历</a>
                <a class="bagn_item <?php if ($_GET['resume_kind']=='myself') {?>cur_select<?php }?>" href="/member/index.php?c=recommend&resume_kind=myself&id=<?php echo $_GET['id'];?>
">我入库的简历</a>
                <a class="bagn_item " href="index.php?c=resume&act=input" target="_blank">创建新候选人</a>
            </span>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/searchtop.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <div class="left_job_all fl">
            <div class="tongji">
                <label class="tj_style">共有<span class="numtj"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>位人选</label>
                <div class="paixu_btn">
                    <a class="pxbtn" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'recommend','order'=>'salary'),$_smarty_tpl);?>
">年薪从高到低</a>
                    <a class="pxbtn pxcur" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'recommend','order'=>'time'),$_smarty_tpl);?>
">更新时间从新到旧</a>
                </div>
            </div>
            <div class="job_left_sidebar" style="width: 1040px;margin-left: 30px;">

                <div class="job_news_list" style="background: #f1f8ff">
                    <span class="job_news_list_span job_w430" style="text-align:left;padding-left: 10px;">简历基本信息</span>
                    <span class="job_news_list_span job_w420" style="margin-left: 20px;">工作信息</span>
                    <span class="job_news_list_span job_w140 text_cen">操作</span>
                </div>
                <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
$user = $user; if (!is_array($user) && !is_object($user)) { settype($user, 'array');}
foreach ($user as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>

                <div class="job_news_list  job_hr_list_box" style="width: 1030px;">
                    <div class="job_hr_resume_user" style="margin-top: 10px;width: 1040px;">
                        <div style="width: 100%;">
                            <a class="job_namer" style="font-size: 18px;" href="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</a>
                            <label class="tel_num mal_10"><img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/sj_ico.png"><?php echo $_smarty_tpl->tpl_vars['user']->value['telphone'];?>
</label>
                            <label class="tj_time mal_20"><?php if ($_smarty_tpl->tpl_vars['user']->value['sex']==1) {?>男<?php } else { ?>女<?php }?></label><span class="xianshu">|</span>
                            <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['age'];?>
岁</label><span class="xianshu">|</span>
                            <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['edu_n'];?>
</label><span class="xianshu">|</span>
                            <label class="tj_time"><?php if ($_smarty_tpl->tpl_vars['user']->value['exp_n']) {
echo $_smarty_tpl->tpl_vars['user']->value['exp_n'];
} else { ?>暂无<?php }?>工作经验</label>
                            <label class="btns_ji" style="float: right;margin-right: 50px;">
                                <?php if ($_smarty_tpl->tpl_vars['user']->value['recom_job']==1) {?>
                                <a class="btn_hxr w70b yituijian" data-id="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" data-eid="<?php echo $_smarty_tpl->tpl_vars['user']->value['eid'];?>
">已推荐</a>
                                <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['recom_job']==2) {?>
                                <a class="btn_hxr w70b yituijian" data-id="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" data-eid="<?php echo $_smarty_tpl->tpl_vars['user']->value['eid'];?>
">某猎头已推荐</a>
                                <?php } else { ?>
                                <a class="btn_hxr w70b tuijan" id="t_tj_<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"  data-id="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" data-eid="<?php echo $_smarty_tpl->tpl_vars['user']->value['eid'];?>
">推荐该候选人</a>
                                <?php }?>
                            </label>
                        </div>
                        <div class="fl" style="width: 40%;padding-right: 10px;margin-top: 20px;">
                            <div class="job_hr_resume_user_name">
                                <div class="mat_10">
                                    <label class="tj_time"><?php echo date("Y/m",$_smarty_tpl->tpl_vars['user']->value['resume_edu']['startDateStr']);?>
-<?php echo date("Y/m",$_smarty_tpl->tpl_vars['user']->value['resume_edu']['endDateStr']);?>
：</label>
                                    <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['resume_edu']['schoolName'];?>
</label>
                                    <?php if ($_smarty_tpl->tpl_vars['user']->value['resume_edu']['majorName']) {?>
                                    <span class="xianshu">|</span>
                                    <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['resume_edu']['majorName'];?>
</label>
                                    <?php }?>
                                </div>
                                <div class="mat_10">
                                    <label class="tj_time">期望年薪：</label>
                                    <label class="salery_s"><?php echo $_smarty_tpl->tpl_vars['user']->value['salary_n'];?>
</label>
                                    <label class="tj_time mal_20">期望工作地：</label>
                                    <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['hope_city'];?>
</label>
                                </div>
                                <div class="mat_10">
                                    <label class="tj_time">期望职位：</label>
                                    <?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['li']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['job_classname']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['li']->key => $_smarty_tpl->tpl_vars['li']->value) {
$_smarty_tpl->tpl_vars['li']->_loop = true;
?>
                                    <label class="yixijob"><?php echo $_smarty_tpl->tpl_vars['li']->value;?>
</label>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="fl" style="padding-left: 20px;border-left: 1px solid #eeeeee;min-height: 60px;margin-top: 20px;">
                            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['resume_work']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                            <div class="job_hr_resume_user_yx">
                                <label><?php echo date('Y/m',$_smarty_tpl->tpl_vars['list']->value['startDateStr']);?>
-<?php echo date('Y/m',$_smarty_tpl->tpl_vars['list']->value['endDateStr']);?>
</label>
                                <span class="shustyle">|</span>
                                <label class="zi3314 nowrapp" style="max-width: 210px;"><?php echo $_smarty_tpl->tpl_vars['list']->value['companyName'];?>
</label>
                                <?php if ($_smarty_tpl->tpl_vars['list']->value['posName']) {?>
                                <span class="shustyle">|</span>
                                <label class="zi0014 nowrapp" style="max-width: 100px;"><?php echo $_smarty_tpl->tpl_vars['list']->value['posName'];?>
</label>
                                <?php }?>
                            </div>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="fl" style="margin-top: 20px;width: 100%;">
                        <label class="tj_time">简历编号：<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</label>
                        <label class="tj_time col999 mal_200">服务猎头数：<span class="tj_time"><?php if ($_smarty_tpl->tpl_vars['user']->value['lietou_num']) {
echo $_smarty_tpl->tpl_vars['user']->value['lietou_num'];
} else { ?>0<?php }?></span></label>
                        <label class="tj_time col999 mal_40">推荐过的职位数：<span class="tj_time"><?php if ($_smarty_tpl->tpl_vars['user']->value['job_num']) {
echo $_smarty_tpl->tpl_vars['user']->value['job_num'];
} else { ?>0<?php }?></span></label>
                        <label class="tj_time col999 mal_40">HR下载：<span class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['download_num'];?>
</span></label>
                        <label class="tj_time col999" style="float: right;margin-right: 10px;">最新推荐时间：<span class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['datetime'];?>
</span></label>
                    </div>
                </div>
                <?php } ?>


                <div class="clear"></div>
                <?php if ($_smarty_tpl->tpl_vars['total']->value!=0) {?>
                <div class="search_pages">
                    <div class="pages"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
                </div>
                <?php } else { ?>
                <div class="seachno">
                    <div class="seachno_left"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" width="144" height="102"/></div>
                    <div class="listno-content"> <strong>很抱歉，没有找到满足条件的人才</strong><br>
                        <span> 建议您：<br>
        1、适当减少已选择的条件<br>
        2、适当删减或更改搜索关键字<br>
        </span>  </div>
                </div>
                <?php }?> </div>
        </div>
      </div>

      </div>
    </div>
  </div>

<div  class="infoboxp22"  id="tuijianbox" style="display:none; ">
    <div>
            <input name="resume_id" id="resume_id" value="0" type="hidden">
            <input name="eid" id="eid" value="0" type="hidden">
            <input name="job_id" id="job_id" value="0" type="hidden">
            <input name="pingfen" class="pingfen" value="0" type="hidden">
            <div class="pjnr">推荐备注：</div>
            <div class="jb_infobox" style="width: 100%;margin-top: 20px;">
                <textarea id="tjcontent" placeholder="请输入推荐备注，让企业更精准的了解候选人信息。" name="r_reason" cols="30" rows="9" class="hr_textarea tj_textarea" maxlength="100"></textarea>
                <div class="numts position">还可输入<label class="xznum">100</label>字</div>
            </div>
            <div class="jb_infobox" style="width: 100%;">
                <button type="submit"   name='submit' value='1' class="submit_btn tuijianbtn" style="margin-left: 160px;">确定推荐</button>
                <button type="button" class="submit_btn quxiao" style="margin-left: 20px;background: #ddd;">取消</button>
            </div>
    </div>
</div>
<?php echo '<script'; ?>
>
function gotime(id,edate,i){
	$("#gotimeid").val(id);
	if(i){
		$("#gotime_edate").html("本次共延期<font color='red'>"+i+"</font>个职位！");
	}else{
		$("#gotime_edate").html('当前职位到期时间：<font color="red">'+edate+'</font>');
	}
	$.layer({
		type : 1,
		title : '延期天数',
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['340px','210px'],
		page : {dom : '#gotime'}
	});
}
function allgotime(){//批量延期
	var allid =[];
	var i=0;
	$('input[name="checkboxid[]"]:checked').each(function(){
		allid.push($(this).val());
		i++;
	});
	if(allid.length==0){
		layer.msg("请选择要延期的职位！",2,8);return false;
	}else{
		gotime(allid,'',i);
	}
}
function allonstatus(){//批量延期
	var allid =[];
	var i=0;
	$('input[name="checkboxid[]"]:checked').each(function(){
		allid.push($(this).val());
		i++;
	});
	if(allid.length==0){
		layer.msg("请选择要下架的职位！",2,8);return false;
	}else{
		onstatus(allid,1);
	}
}
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

    $('#zxxCancelBtn,.quxiao').click(function(){
        layer.closeAll();
    });
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

//	推荐简历
	$(".yun_user_lok_bth").click(function () {
	    var resume_id = $(this).attr("data-id");
	    var eid = $(this).attr("data-eid");
        $.ajax({
            type:"post",
            url:"/member/index.php?c=recommend&act=report",
            data:{
                job_id:"<?php echo $_GET['id'];?>
",
                resume_id:resume_id,
                eid:eid
            },
            success:function (data) {
                var data =JSON.parse(data);

            }
        })
    })
	$(document).bind("click",function(e){
		if(e.target.className != 'job_box_in'){
			$(".job_tck_box_pot").hide();
		}
	});
});
<?php echo '</script'; ?>
>
<!--延期天数弹出框-->
<div id="gotime"  style="display:none; width:230px; ">
  <div class="job_box_div"   style="width:300px; ">
    <div class="job_box_msg" style="margin-left:10px;_margin-left:5px;padding:5px;">
      <p id="gotime_edate"></p>
    </div>
    <form action='index.php?c=job&act=opera' target="supportiframe" method="post" id='gotimef'>
      <input type="hidden" name="gotimeid" id="gotimeid" value=""/>
      <div class="job_box_inp"  style="padding:10px 5px 5px 20px"> <span style="float:left; margin-right:0px;">延期天数：</span>
        <input name="day" value="" class="com_info_text placeholder" type="text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" style="width:100px;"/>
        <span class="fltL box_infobox_span" style="padding-left:10px;">天</span> </div>
      <span class="job_box_botton" style="width:100%;"> <a class="job_box_yes job_box_botton2" href="javascript:void(0);" onclick="setTimeout(function(){$('#gotimef').submit()},0);">确定</a> </span>
    </form>
  </div>
</div>
<!--延期天数弹出框end-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/com_index.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/search.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/class.public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/js/commend.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/jobserver.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
