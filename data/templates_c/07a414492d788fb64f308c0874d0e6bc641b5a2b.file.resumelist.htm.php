<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-09 14:56:28
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/resumelist.htm" */ ?>
<?php /*%%SmartyHeaderCode:13274158255b43071c1519a5-39467847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07a414492d788fb64f308c0874d0e6bc641b5a2b' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/resumelist.htm',
      1 => 1519636234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13274158255b43071c1519a5-39467847',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'com_style' => 0,
    'search' => 0,
    'total' => 0,
    'resume_kind' => 0,
    'user' => 0,
    'lt_style' => 0,
    'li' => 0,
    'list' => 0,
    'pagenav' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b43071c39a316_90524414',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b43071c39a316_90524414')) {function content_5b43071c39a316_90524414($_smarty_tpl) {?><?php if (!is_callable('smarty_function_parse_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.parse_url.php';
?><?php $user=array();global $db,$db_config,$db_config1,$config;
        
        $db1 = new mysql($db_config1['dbhost'], $db_config1['dbuser'], $db_config1['dbpass'], $db_config1['dbname'], ALL_PS, $db_config1['charset'],$db_config1['def']);

		if(is_array($_GET)){
			foreach($_GET as $key=>$value){
				if($value=='0'){
					unset($_GET[$key]);
				}
			}
		}
		eval('$paramer=array("ispage"=>"1","limit"=>"30","minage"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'minage\']","maxage"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'maxage\']","sex"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'sex\']","edu"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'edu\']","order"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'order\']","exp"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'exp\']","keyword"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'keyword\']","hy"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'hy\']","location"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'location\']","jobs_id"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'jobs_id\']","minsalary"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'minsalary\']","status"=>"\'auto.status\'","resume_kind"=>"$_smarty_tpl->tpl_vars[\'resume_kind\']->value","ids"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'ids\']","maxsalary"=>"$_smarty_tpl->tpl_vars[\'search\']->value[\'maxsalary\']","item"=>"\'user\'","name"=>"\'resumelist2\'","nocache"=>"")
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
<div class="top_nav_list">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div class="w1000">
  <div class="admin_mainbody">
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/class.public.css" type="text/css">
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
/images/index_style.css" type=text/css rel=stylesheet>
    <div class=down_box>
      <div class=admincont_box>
          <?php if (empty($_smarty_tpl->tpl_vars['search']->value['ids'])&&empty($_smarty_tpl->tpl_vars['search']->value['uname'])) {?>
          <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/searchtop.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

          <?php }?>
                  <div class="left_job_all fl">
                      <div class="tongji">
                          <label class="tj_style">共有<span class="numtj"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>位人选</label>
                          <div class="paixu_btn">
                              <a class="pxbtn <?php if ($_GET['order']=='salary') {?>pxcur<?php }?>" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'resume','act'=>$_GET['act'],'order'=>'salary'),$_smarty_tpl);?>
">年薪从高到低</a>
                              <a class="pxbtn <?php if ($_GET['order']=='time') {?>pxcur<?php }?>" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'resume','act'=>$_GET['act'],'order'=>'time'),$_smarty_tpl);?>
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
                                      <!--<label class="tel_num mal_10" style="display: none;"><img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/sj_ico.png"><?php echo $_smarty_tpl->tpl_vars['user']->value['telphone'];?>
</label>-->
                                      <label class="tj_time mal_20"><?php if ($_smarty_tpl->tpl_vars['user']->value['sex']==1) {?>男<?php } else { ?>女<?php }?></label><span class="xianshu">|</span>
                                      <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['age'];?>
岁</label><span class="xianshu">|</span>
                                      <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['edu_n'];?>
</label>
                                      <span class="xianshu">|</span>
                                      <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['living'];?>
</label>
                                      <?php if ($_smarty_tpl->tpl_vars['user']->value['exp_n']) {?>
                                      <span class="xianshu">|</span>
                                      <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['exp_n'];?>
工作经验</label>
                                      <?php }?>
                                      <label class="btns_ji" style="float: right;margin-right: 20px;">
                                          <a  href="/member/index.php?c=resume&act=jobrecommend&eid=<?php echo $_smarty_tpl->tpl_vars['user']->value['eid'];?>
" target="_blank" class="btn_hxr w90b tuijan" style="width: 100px;float: left;">
                                              <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/tuijian.png" class="ico_dd">
                                              <label class="biaoqian">推荐职位</label>
                                          </a>
                                          <?php if ($_smarty_tpl->tpl_vars['user']->value['fav_resume']) {?>
                                          <label class="btn_hxr yscstyle"  data-id="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" data-eid="<?php echo $_smarty_tpl->tpl_vars['user']->value['eid'];?>
">取消收藏</label>
                                          <?php } else { ?>
                                          <label class="btn_hxr scstyle"  data-id="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" data-eid="<?php echo $_smarty_tpl->tpl_vars['user']->value['eid'];?>
">
                                              <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/shoucang1.png" class="ico_dd">
                                              <label class="biaoqian">收藏</label>
                                          </label>

                                          <?php }?>
                                          <label class="btn_hxr bjstyle"  data-id="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" data-eid="<?php echo $_smarty_tpl->tpl_vars['user']->value['eid'];?>
">
                                              <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/bianji1.png" class="ico_dd">
                                              <a class="biaoqian" href="/member/index.php?c=resume&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" target="_blank">编辑</a>
                                          </label>
                                      </label>
                                  </div>
                                  <div class="fl" style="width: 40%;padding-right: 10px;margin-top: 20px;">
                                      <div class="job_hr_resume_user_name">
                                          <div class="mat_10">
                                              <?php if ($_smarty_tpl->tpl_vars['user']->value['resume_edu'][0]) {?>
                                                  <label class="tj_time"><?php echo date("Y/m",$_smarty_tpl->tpl_vars['user']->value['resume_edu'][0]['startDateStr']);?>
-<?php echo date("Y/m",$_smarty_tpl->tpl_vars['user']->value['resume_edu'][0]['endDateStr']);?>
：</label>
                                                  <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['resume_edu'][0]['schoolName'];?>
</label>
                                                  <?php if ($_smarty_tpl->tpl_vars['user']->value['resume_edu'][0]['majorName']) {?>
                                                  <span class="xianshu">|</span>
                                                  <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['resume_edu'][0]['majorName'];?>
</label>
                                                  <?php }?>
                                              <?php }?>
                                          </div>
                                          <div class="mat_10">
                                              <label class="tj_time">期望年薪：</label>
                                              <label class="salery_s">
                                                  <?php if ($_smarty_tpl->tpl_vars['user']->value['wage_hope']) {?>
                                                  ￥<?php echo $_smarty_tpl->tpl_vars['user']->value['wage_hope'];?>
万以上
                                                  <?php } else { ?>
                                                  <?php echo $_smarty_tpl->tpl_vars['user']->value['salary_n'];?>

                                                  <?php }?>
                                              </label>
                                              <label class="tj_time mal_20">期望工作地：</label>
                                              <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['user']->value['hope_city'];?>
</label>
                                          </div>
                                          <div class="mat_10">
                                              <label class="tj_time">期望职位：</label>
                                              <?php if ($_smarty_tpl->tpl_vars['user']->value['job_classname'][0]) {?>
                                                  <?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['li']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['job_classname']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['li']->key => $_smarty_tpl->tpl_vars['li']->value) {
$_smarty_tpl->tpl_vars['li']->_loop = true;
?>
                                                  <label class="yixijob"><?php echo $_smarty_tpl->tpl_vars['li']->value;?>
</label>
                                                  <?php } ?>
                                              <?php } else { ?>
                                                  <label class="yixijob"><?php echo $_smarty_tpl->tpl_vars['user']->value['hy_name'];?>
</label>
                                              <?php }?>
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
                              <?php if ($_GET['act']=="recommend") {?>
                              <div class="fl" style="margin-top: 20px;width: 100%;">
                                  <label class="tj_time">推荐的职位：
                                      <?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['li']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['apply_jobs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['li']->key => $_smarty_tpl->tpl_vars['li']->value) {
$_smarty_tpl->tpl_vars['li']->_loop = true;
?>
                                      <a style="font-size: 16px;color: #4b6e88;" href="/job/index.php?c=comapply&id=<?php echo $_smarty_tpl->tpl_vars['li']->value['job_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['li']->value['job_name'];?>
</a>
                                      <span class="xianshu color_999">|</span>
                                      <label class="color_999" style="margin-right: 30px;">推荐时间：<?php echo date("Y-m-d",$_smarty_tpl->tpl_vars['li']->value['datetime']);?>
</label>
                                      <?php } ?>
                                  </label>
                              </div>
                              <?php } else { ?>
                              <div class="fl" style="margin-top: 20px;width: 100%;">
                                  <label class="tj_time">简历编号：<label><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</label></label>
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
                              <?php }?>
                          </div>

                          <?php } ?>

                          <div class="clear"></div>
                          <?php if ($_smarty_tpl->tpl_vars['total']->value) {?>
                          <div class="search_pages">
                              <div class="pages"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
                          </div>
                          <?php } else { ?>
                          <div class="seachno">
                              <div class="seachno_left"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" width="144" height="102"/></div>
                              <div class="listno-content" style="line-height: 24px;"> <strong>很抱歉，暂无相关简历信息</strong><br><br>
                                  <span>您可以尝试修改搜索条件或者前往人才搜索添加简历管理</span>
                              </div>
                          </div>
                          <?php }?>
                      </div>
                  </div>
              <div class="clear"></div>
          </div>
    </div>
  </div>
</div>
</div>
<?php echo '<script'; ?>
>
$(document).ready(function(){
	$(".browsebj").click(function(){
		var browse=$(this).attr('browse');
		var id=$(this).attr('name');
		$.post("index.php?c=hr&act=hrset",{id:id,browse:browse},function(data){
			location.reload();
		});
	});
	$("body").on("click",".scstyle",function () {
	    var _this = $(this);
        $.ajax({
            type:"post",
            url:"/member/index.php?c=resume&act=collect",
            data:{
                resume_id:$(this).attr("data-id"),
                eid:$(this).attr("data-eid")
            },
            success:function (data) {
                var data = JSON.parse(data);
                if(data==1){
                    layer.msg('收藏成功！', 2, 9);
                    _this.removeClass("scstyle").unbind();
                    _this.addClass("yscstyle");
                    _this.html("取消收藏");
                }
            }
        })
    })

    $("body").on("click",".yscstyle",function () {
        var _this = $(this);
        var job_id = $(this).attr("data-id");
        layer.confirm("您确定要取消收藏吗？",function() {
            $.post("/member/index.php?c=resume&act=remove_collect",{id:job_id},function(data){
                if(data==1){
                    layer.msg('取消收藏成功！', 2, 9);
                    _this.html(' <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/shoucang1.png" class="ico_dd"><label class="biaoqian">收藏</label>');
                    _this.removeClass("yscstyle").addClass("scstyle");
                }
            })
        });
    })
});

<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/search.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/class.public.js"><?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/yqms.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
