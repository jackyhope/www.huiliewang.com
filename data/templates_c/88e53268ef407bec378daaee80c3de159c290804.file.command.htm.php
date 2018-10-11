<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-25 11:34:15
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/command.htm" */ ?>
<?php /*%%SmartyHeaderCode:943316295b3062b71938c9-33981224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88e53268ef407bec378daaee80c3de159c290804' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/command.htm',
      1 => 1517370550,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '943316295b3062b71938c9-33981224',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'com_style' => 0,
    'fake_company' => 0,
    'list' => 0,
    'job' => 0,
    'rows' => 0,
    'user' => 0,
    'li' => 0,
    'total' => 0,
    'pagenav' => 0,
    'klist' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b3062b72aa005_68894230',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3062b72aa005_68894230')) {function content_5b3062b72aa005_68894230($_smarty_tpl) {?><?php if (!is_callable('smarty_function_parse_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.parse_url.php';
if (!is_callable('smarty_function_listurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.listurl.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="top_nav_list">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div class="w1000">
  <div class="admin_mainbody">
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
/images/index_style.css" type=text/css rel=stylesheet>
    <div class=down_box>
      <div class=admincont_box>
          <div class="search_content" style="border: none;">
              <form  method="post">

                  <div class="Search_jobs_sub" style="float: left;width: 930px;margin-bottom: 15px;">
                      <div class="" style="height: 32px;line-height: 32px;float: left;">招聘职位：</div>
                      <div class="Search_jobs_more_chlose" style="width: 150px;margin-left: 20px;">
                          <span class="Search_jobs_more_chlose_s">
                              <?php if ($_GET['comname']) {
echo $_GET['comname'];
} else { ?>选择招聘企业<?php }?></span><i class=""></i>
                          <div class="Search_jobs_more_chlose_list none" style="width: 150px;">
                              <ul class="select_hyitem">
                                  <li><a class="Search_jobs_cxz width180" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','comname'=>''),$_smarty_tpl);?>
">全部</a></li>
                                  <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fake_company']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                  <li><a class="Search_jobs_cxz width150" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','comname'=>$_smarty_tpl->tpl_vars['list']->value['companyname']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['companyname'];?>
</a></li>
                                  <?php } ?>
                              </ul>
                          </div>
                      </div>
                      <div class="Search_jobs_more_chlose" style="width: 180px;">
                          <span class="Search_jobs_more_chlose_s"><?php if ($_GET['jobname']) {
echo $_GET['jobname'];
} else { ?>选择招聘的职位<?php }?></span><i class=""></i>
                          <div class="Search_jobs_more_chlose_list none" style="width: 180px;">
                              <ul class="select_hyitem">
                                  <li><a class="Search_jobs_cxz width180" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','jobname'=>''),$_smarty_tpl);?>
">全部</a></li>
                                    <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                  <li><a class="Search_jobs_cxz width180" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','jobname'=>$_smarty_tpl->tpl_vars['list']->value['name']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</a></li>
                                    <?php } ?>
                              </ul>
                          </div>
                      </div>
                      <input value="搜索" type="submit" class="sousuo_btns" style="display: none;"/>
                  </div>

                  <div class="Search_jobs_form_list" style="padding-bottom: 20px;">
                      <div class="" style="font-weight: inherit;height: 26px;line-height: 26px;float: left;">简历来源：</div>
                      <a class="Search_jobs_sub alcent <?php if (empty($_GET['identity'])) {?>hoverss<?php }?>" style="width: 40px;margin-left: 20px;"  href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','identity'=>''),$_smarty_tpl);?>
">不限</a>
                      <a class="Search_jobs_sub alcent <?php if ($_GET['identity']==3) {?>hoverss<?php }?>" style="float: left;width: 80px;" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','identity'=>3),$_smarty_tpl);?>
">猎头推荐</a>
                      <a class="Search_jobs_sub alcent <?php if ($_GET['identity']==1) {?>hoverss<?php }?>" style="float: left;width: 90px;" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','identity'=>1),$_smarty_tpl);?>
">候选人自荐</a>
                  </div>

                  <div class="Search_jobs_form_list" style="padding-bottom: 20px;">
                      <div class="" style="font-weight: inherit;height: 26px;line-height: 26px;float: left;">简历状态：</div>
                      <a class="Search_jobs_sub alcent  <?php if (empty($_GET['is_browse'])) {?>hoverss<?php }?>" style="width: 40px;margin-left: 20px;" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','is_browse'=>0),$_smarty_tpl);?>
">不限</a>
                      <a class="Search_jobs_sub alcent <?php if ($_GET['is_browse']==-1) {?>hoverss<?php }?>" style="float: left;width: 60px;" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','is_browse'=>-1),$_smarty_tpl);?>
">未查看</a>
                      <a class="Search_jobs_sub alcent <?php if ($_GET['is_browse']==1) {?>hoverss<?php }?>" style="float: left;width: 60px;" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','is_browse'=>1),$_smarty_tpl);?>
">已查看</a>
                      <a class="Search_jobs_sub alcent <?php if ($_GET['is_browse']==6) {?>hoverss<?php }?>" style="float: left;width: 60px;" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','is_browse'=>6),$_smarty_tpl);?>
">已下载</a>
                      <a class="Search_jobs_sub alcent <?php if ($_GET['is_browse']==1) {?>hoverss<?php }?>" style="float: left;width: 40px;" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','is_browse'=>1),$_smarty_tpl);?>
">待定</a>
                      <a class="Search_jobs_sub alcent <?php if ($_GET['is_browse']==4) {?>hoverss<?php }?>" style="float: left;width: 60px;" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'apply','is_browse'=>4),$_smarty_tpl);?>
">不合适</a>
                  </div>
              </form>
          </div>


                  <div class="left_job_all fl">
                      <div class="job_left_sidebar" style="width: 1040px;margin-left: 30px;">
                         <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                          <div class="job_hr_list_box" style="width: 1040px;">
                              <div class="job_hr_list_l" style="background: #f4f7fb;color: #000;width: 1040px;margin-left: -10px;">
                                  <div class="com_mem_hr_list_b_b fl" style="width: 410px;">
                                      <span class="com_mem_hr_list_bzt fontw_b">投递职位：</span>
                                      <a href="/job/index.php?c=comapply&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['job_id'];?>
" class="" style="color:#f60; font-weight:bold" target="_blank"><?php echo $_smarty_tpl->tpl_vars['list']->value['job_name'];?>
</a>
                                      <a  class="" style=" margin-left: 10px;">(<?php echo $_smarty_tpl->tpl_vars['list']->value['com_name'];?>
)</a>
                                  </div>
                                  <div class="com_mem_hr_list_b_b fl" style="width:  400px;padding-left: 20px;">

                                  </div>
                                  <div class="com_mem_hr_list_b_b fl" style="width: 160px;">
                                      <span class="com_mem_hr_list_bzt ">投递时间：<?php echo date("Y-m-d",$_smarty_tpl->tpl_vars['list']->value['datetime']);?>
</span>
                                  </div>
                              </div>

                              <div class="job_hr_resume_user" style="margin-top: 10px;margin-left: 10px;width: 1000px;">
                                  <div class="fl" style="width: 40%;padding-right: 10px;">
                                      <div class="job_hr_resume_user_name">
                                          <a href="/resume/index.php?c=show&reid=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" target="_blank" style="color: purple;">
                                              <label href="" target="_blank" class="com_Release_name"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</label>
                                              <label href="" target="_blank" class="pal_20"><?php if ($_smarty_tpl->tpl_vars['list']->value['sex']==1) {?>男<?php } else { ?>女<?php }?></label>
                                              <label href="" target="_blank" class="pal_20"><?php echo $_smarty_tpl->tpl_vars['list']->value['age'];?>
岁</label>
                                              <label href="" target="_blank" class="pal_20"><?php echo $_smarty_tpl->tpl_vars['list']->value['living'];?>
</label>
                                              <label href="" target="_blank" class="pal_20"><?php echo $_smarty_tpl->tpl_vars['list']->value['edu'];?>
</label>
                                              <label href="" target="_blank" class="pal_20"><?php echo $_smarty_tpl->tpl_vars['list']->value['exp'];?>
</label>
                                              <?php if ($_smarty_tpl->tpl_vars['list']->value['identity']==3) {?>
                                              <img src="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
/images/lttuijian.png" class="ltpic"/>
                                              <?php }?>
                                          </a>
                                      </div>
                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['edu_exp']) {?>
                                      <div class="job_hr_resume_user_yx">
                                          <label><?php echo date('Y/m',$_smarty_tpl->tpl_vars['list']->value['edu_exp']['sdate']);?>
-<?php echo date('Y/m',$_smarty_tpl->tpl_vars['list']->value['edu_exp']['edate']);?>
：</label>
                                          <label class="zi0014 nowrapp" style="max-width: 100px;"><?php echo $_smarty_tpl->tpl_vars['list']->value['edu_exp']['name'];?>
</label>
                                          <?php if ($_smarty_tpl->tpl_vars['list']->value['edu_exp']['specialty']) {?>
                                          <span class="shustyle">|</span>
                                          <label class="zi3314 nowrapp" style="max-width: 180px;"><?php echo $_smarty_tpl->tpl_vars['list']->value['edu_exp']['specialty'];?>
</label>
                                          <?php }?>

                                          <?php if ($_smarty_tpl->tpl_vars['list']->value['edu_exp']['education']) {?>
                                          <span class="shustyle">|</span>
                                          <label class="zi3314 nowrapp"><?php echo $_smarty_tpl->tpl_vars['list']->value['edu_exp']['education'];?>
</label>
                                          <?php }?>
                                      </div>
                                      <?php }?>
                                      <div class="mat_10">
                                          <label class="tj_time">期望年薪：</label>
                                          <label class="salery_s">11-12万</label>
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
                                  <div class="fl" style="padding-left: 20px;border-left: 1px solid #eeeeee;min-height: 60px;">
                                      <?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['li']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['work_exp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['li']->key => $_smarty_tpl->tpl_vars['li']->value) {
$_smarty_tpl->tpl_vars['li']->_loop = true;
?>
                                      <div class="job_hr_resume_user_yx">
                                          <label><?php echo date('Y/m',$_smarty_tpl->tpl_vars['li']->value['sdate']);?>
-<?php echo date('Y/m',$_smarty_tpl->tpl_vars['li']->value['edate']);?>
</label><span class="shustyle">|</span>
                                          <label class="zi3314 nowrapp" style="max-width: 220px;"><?php echo $_smarty_tpl->tpl_vars['li']->value['name'];?>
</label><span class="shustyle">|</span>
                                          <label class="zi0014 nowrapp" style="max-width: 200px;"><?php echo $_smarty_tpl->tpl_vars['li']->value['title'];?>
</label>
                                      </div>
                                      <?php } ?>
                                  </div>
                              </div>
                              <div class="job_hr_list_l">
                                  <div class="com_mem_hr_list_b_b">
                                      <span class="com_mem_hr_list_bzt" style="padding-left: 10px;">标记状态：</span>
                                      <span class="com_mem_hr_list_bj <?php if (empty($_smarty_tpl->tpl_vars['list']->value['is_browse'])) {?>com_mem_hr_list_bj_cur<?php }?>" name="28" browse="2"> 未查看</span>
                                      <span class="com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['list']->value['is_browse']==1) {?>com_mem_hr_list_bj_cur<?php }?>" name="28" browse="2"> 已查看</span>
                                      <span class="com_mem_hr_list_bj " name="28" browse="3" style="width: 45px;"> 待定 </span>
                                      <span class="com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['list']->value['is_browse']==4) {?>com_mem_hr_list_bj_cur<?php }?>" onclick="layer_del('确定不合适简历吗？', 'index.php?c=apply&act=hrset&refid=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
');" name="28" browse="4"> 不合适</span>
                                      <span class="com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['list']->value['is_browse']==6) {?>com_mem_hr_list_bj_cur<?php }?>" name="28" browse="5"> 已下载 </span>
                                  </div>
                                  <div class="job_hr_list_r">
                                      <span class="job_hr_job_cz_a"> <a href="/resume/index.php?c=show&reid=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"  class="uesr_name_a" target="_blank">查看简历</a></span>
                                      <!--<i class="job_hr_job_cz_line">|</i> <span class="job_hr_job_cz_a"><a href="javascript:void(0)" name="37" browse="4" class="browsebj uesr_name_a">不合适</a> </span>-->
                                      <i class="job_hr_job_cz_line">|</i><span class="job_hr_job_cz_a"> <a href="javascript:void(0)" onclick="layer_del('确定要删除该条职位申请吗？', 'index.php?c=apply&act=hrset&delid=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
');" class="uesr_name_a">删除</a> </span>
                                  </div>
                              </div>
                          </div>
                          <?php } ?>

                          <div class="clear"></div>
                          <?php if ($_smarty_tpl->tpl_vars['total']->value!=0||is_array($_smarty_tpl->tpl_vars['user']->value)) {?>
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
                                    </span> <span> 热门关键字：<br>
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
?><a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'keyword','v'=>$_smarty_tpl->tpl_vars['klist']->value['key_title']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['klist']->value['key_title'];?>
"><?php echo $_smarty_tpl->tpl_vars['klist']->value['key_name'];?>
</a> <?php } ?>
                                  </span>
                              </div>
                          </div>
                          <?php }?> </div>
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
        layer.confirm("确定设为不合适简历吗？",function() {
            $.post("index.php?c=hr&act=hrset", {id:id,browse:browse}, function (data) {
                if (data == 1) {
                    layer.msg("设置成功！", 2, 9, function () {
                        window.location.reload();
                    });
                } else {
                    layer.msg(data, 2, 8);
                }
            });
        });
    });

	$("body").on("click",".shoucang",function () {
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
                    _this.removeClass("shoucang").unbind();
                    var src=_this.find("img").attr("src");
                    var newsrc=src.replace("shoucang","yishoucang");
                    _this.find("img").attr("src",newsrc);
                    _this.find(".jieshiico").html("取消收藏");
                }
            }
        })
    })
    
});

$(function () {

    //收藏简历
    $(".shoucang").click(function () {
        layer.msg('收藏成功！', 2, 9);
       var src=$(this).find("img").attr("src");
        var newsrc=src.replace("shoucang","yishoucang");
        $(this).find("img").attr("src",newsrc);
    })
})
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/search.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/yqms.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
