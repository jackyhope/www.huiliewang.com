<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 09:41:18
         compiled from "/home/wwwroot/www.huiliewang.com//app/template/member/lietou/searchtop.htm" */ ?>
<?php /*%%SmartyHeaderCode:16623735125bbab5be632e54-83038033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd50556132959c3eeee4a477c7a236794c5dda018' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com//app/template/member/lietou/searchtop.htm',
      1 => 1519637122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16623735125bbab5be632e54-83038033',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'finder' => 0,
    'key' => 0,
    'v' => 0,
    'js_def' => 0,
    'search' => 0,
    'usertype' => 0,
    'searcher' => 0,
    'list' => 0,
    'userclass_name' => 0,
    'industry_name' => 0,
    'job_name' => 0,
    'city_name' => 0,
    'config' => 0,
    'industry_index' => 0,
    'row' => 0,
    'resume' => 0,
    'userdata' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbab5be787d84_34662888',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbab5be787d84_34662888')) {function content_5bbab5be787d84_34662888($_smarty_tpl) {?><link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/search.css" type=text/css rel=stylesheet>
<link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type=text/css rel=stylesheet>
<style>
    .shaixuan .mtop0{margin-top: 4px;}
    .yun_resume_popup_chose_box_text {
        float: left;
        width: 300px;
        height: 28px;
        line-height: 28px;
        border: none;
        text-align: left;
        text-indent: 10px;
        background: #fff url(/app/template/member/user/images/yun_select.jpg) no-repeat 280px center;
    }
</style>
<div class="Search_jobs_box search_content" style="width: 1040px;margin-top: 20px;">
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
    <div class="Search_jobs_form_list" style="padding-bottom: 0;">
        <div class="yun_job_search" style="background: #edf6fc;margin-bottom: 20px;">
            <div class="Search_jobs_sub">
                <?php if ($_smarty_tpl->tpl_vars['js_def']->value==8) {?>
                    <div class="shaixuan" style="font-weight: inherit;height: 32px;line-height: 32px;float: left;margin-left: 10px;">关键词：</div>
                    <div class="Search_jobs_sub" style="float: left;width: 460px;">
                        <input type="text" name="keyword" id="keyword" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['keyword'];?>
" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 470px;" placeholder="多个关键词直接使用空格隔开">
                    </div>
                    <input type="submit" onclick="post_search(1,'keyword')" class="sousuo_btns" style="height: 30px;margin-left: 20px;line-height: 30px;" value="搜索">
                <?php if ($_smarty_tpl->tpl_vars['usertype']->value==3) {?>
                <div class="Search_jobs_more_chlose" style="float: right;width: 240px;">
                    <span class="Search_jobs_more_chlose_s" style="height: 30px;background: #fff;width: 210px;"><?php if ($_POST['searcher_id']) {
echo $_smarty_tpl->tpl_vars['search']->value['name'];
} else { ?>选择快捷搜索条件<?php }?></span><i class=""></i>
                    <div class="Search_jobs_more_chlose_list none" style="width: 240px;">
                        <ul class="listtj">
                            <li><a href="#" class="Search_jobs_sub_a " style="width: 220px;">全部</a></li>
                            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['searcher']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                            <li><a class="Search_jobs_cxz searcher" style="width: 220px;" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php }?>
                <?php } else { ?>
                    <div class="shaixuan" style="font-weight: inherit;height: 32px;line-height: 32px;float: left;margin-left: 10px;">关键词：</div>
                    <div class="Search_jobs_sub" style="float: left;width: 660px;">
                        <input type="text" name="keyword" id="keyword" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['keyword'];?>
" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 670px;" placeholder="多个关键词直接使用空格隔开">
                    </div>
                    <input type="submit" onclick="post_search(1,'keyword')" class="sousuo_btns" style="height: 30px;margin-left: 20px;line-height: 30px;" value="搜索">
                <a class="rk_resume" href="index.php?c=resume&amp;act=input" target="_blank" style="height: 30px;line-height: 30px;">
                    <img src="/app/template/member/lietou/images/rk_ico.png">
                    <label class="rk_zizi" style="vertical-align: top;">上传简历</label>
                </a>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="shaixuan">
        <?php if ($_smarty_tpl->tpl_vars['search']->value['hy']||$_smarty_tpl->tpl_vars['search']->value['job_name']||$_smarty_tpl->tpl_vars['search']->value['com_name']||$_smarty_tpl->tpl_vars['search']->value['jobs_id']||$_smarty_tpl->tpl_vars['search']->value['hope_city']||$_smarty_tpl->tpl_vars['search']->value['location']||$_smarty_tpl->tpl_vars['search']->value['minage']||$_smarty_tpl->tpl_vars['search']->value['maxage']||$_smarty_tpl->tpl_vars['search']->value['minsalary']||$_smarty_tpl->tpl_vars['search']->value['maxsalary']||$_smarty_tpl->tpl_vars['search']->value['sex']||$_smarty_tpl->tpl_vars['search']->value['exp']||$_smarty_tpl->tpl_vars['search']->value['jobstatus']||$_smarty_tpl->tpl_vars['search']->value['edu']) {?>
        <label class="sxtitle">筛选条件：</label>

        <?php if ($_smarty_tpl->tpl_vars['search']->value['job_name']) {?>
        <label class="select_hy">
            <a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'job_name');">职位名称：<?php echo $_smarty_tpl->tpl_vars['search']->value['job_name'];?>
</a>
        </label>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['search']->value['status']) {?>
        <label class="select_hy">
            <a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'status');">求职状态：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['search']->value['status']];?>
</a>
        </label>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['search']->value['com_name']) {?>
        <label class="select_hy">
            <a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'com_name');">公司名称：<?php echo $_smarty_tpl->tpl_vars['search']->value['com_name'];?>
</a>
        </label>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['search']->value['hy']) {?>
        <label class="select_hy">
            <a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'hy');">行业：<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['search']->value['hy']];?>
</a>
        </label>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['search']->value['jobs_id']) {?>
        <label class="select_hy">
            <a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'jobs_id');">期望职能：<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['search']->value['jobs_id']];?>
</a>
        </label>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['search']->value['hope_city']) {?>
        <label class="select_city"><a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'hope_city');">期望工作地：<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['search']->value['hope_city']];?>
</a></label>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['search']->value['location']) {?>
        <label class="select_city"><a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'location');">现居住地：<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['search']->value['location']];?>
</a></label>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['search']->value['minsalary']||$_smarty_tpl->tpl_vars['search']->value['maxsalary']) {?>
        <label class="select_salary">
            <a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'salary');">
                期望年薪：
                <?php if ($_smarty_tpl->tpl_vars['search']->value['minsalary']&&$_smarty_tpl->tpl_vars['search']->value['maxsalary']) {?>
                    <?php echo $_smarty_tpl->tpl_vars['search']->value['minsalary'];?>
-<?php echo $_smarty_tpl->tpl_vars['search']->value['maxsalary'];?>
万
                <?php } elseif ($_smarty_tpl->tpl_vars['search']->value['minsalary']&&empty($_smarty_tpl->tpl_vars['search']->value['maxsalary'])) {?>
                    <?php echo $_smarty_tpl->tpl_vars['search']->value['minsalary'];?>
万以上
                <?php } elseif ($_smarty_tpl->tpl_vars['search']->value['maxsalary']&&empty($_smarty_tpl->tpl_vars['search']->value['minsalary'])) {?>
                    <?php echo $_smarty_tpl->tpl_vars['search']->value['maxsalary'];?>
万以下
                <?php }?>
            </a>
        </label>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['search']->value['minage']||$_smarty_tpl->tpl_vars['search']->value['maxage']) {?>
        <label class="select_salary">
            <a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'age');">
                年龄：
                <?php if ($_smarty_tpl->tpl_vars['search']->value['minage']&&$_smarty_tpl->tpl_vars['search']->value['maxage']) {?>
                <?php echo $_smarty_tpl->tpl_vars['search']->value['minage'];?>
-<?php echo $_smarty_tpl->tpl_vars['search']->value['maxage'];?>
岁
                <?php } elseif ($_smarty_tpl->tpl_vars['search']->value['minage']&&empty($_smarty_tpl->tpl_vars['search']->value['maxage'])) {?>
                <?php echo $_smarty_tpl->tpl_vars['search']->value['minage'];?>
岁以上
                <?php } elseif ($_smarty_tpl->tpl_vars['search']->value['maxage']&&empty($_smarty_tpl->tpl_vars['search']->value['minage'])) {?>
                <?php echo $_smarty_tpl->tpl_vars['search']->value['maxage'];?>
岁以下
                <?php }?>
            </a>
        </label>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['search']->value['exp']) {?>
        <label class="select_work"><a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'exp');">工作年限：<?php if ($_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['search']->value['exp']]) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['search']->value['exp']];
} else { ?>无<?php }?></a></label>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['search']->value['sex']) {?>
        <label class="select_work"><a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'sex');">性别：<?php if ($_smarty_tpl->tpl_vars['search']->value['sex']==1) {?>男<?php } elseif ($_smarty_tpl->tpl_vars['search']->value['sex']==2) {?>女<?php } else { ?>无限<?php }?></a></label>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['search']->value['edu']) {?>
        <label class="select_work"><a class="Search_jobs_c_a disc_fac mtop0" onclick="post_search(2,'edu');">学历：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['search']->value['edu']];?>
</a></label>
        <?php }?>
        <?php }?>
    </div>

    <div class="zhankai zkbtn" <?php if (empty($_smarty_tpl->tpl_vars['search']->value['open'])) {?>style="display:block;"<?php } else { ?>style="display:none;"<?php }?>>
        <label><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/xiala.png"/></label>
        <span onclick="post_search(1,'open');">展开搜索条件</span>
    </div>

    <div class="Search_jobs_form_list search_more" <?php if ($_POST['open']) {?>style="padding-bottom: 20px;display: block;"<?php } else { ?>style="padding-bottom: 20px;display: none;"<?php }?>>
        <div class="hangseach">
            <label class="cccsss posirel" style="width: 550px;">
                <div class="shaixuan zuostyle">职位名称：</div>
                <div class="Search_jobs_sub" style="float: left;width: 400px;">
                    <input type="text" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 390px;" name="jobname" id="jobname" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['job_name'];?>
" placeholder="最多可输入3个职位名称关键词进行搜索，以空格隔开">
                    <div class="btnhover"  style="width: 550px;right: 0px;left: inherit;top: -10px;">
                        <div class="btnsss" data-type="1" onclick="post_search(1,'job_name');">确定</div>
                    </div>
                    <span class="tipser"></span>
                </div>
            </label>
        </div>
        <div class="hangseach">
            <label class="cccsss posirel" style="width: 550px;">
                <div class="shaixuan zuostyle">公司名称：</div>
                <div class="Search_jobs_sub" style="float: left;width: 400px;">
                    <input type="text" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 390px;" name="com_name" id="com_name" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['com_name'];?>
" placeholder="请输入公司名称">
                    <div class="btnhover" style="width: 550px;right: 0px;left: inherit;top: -10px;">
                        <div class="btnsss" data-type="2" onclick="post_search(1,'com_name');">确定</div>
                    </div>
                    <span class="tipser"></span>
                </div>
            </label>
        </div>
        <div class="hangseach">
            <div class="shaixuan zuostyle">期望行业：</div>
            <div class="Search_jobs_more_chlose" style="width: 300px;">
                              <span class="Search_jobs_more_chlose_s">
                                  <?php if ($_smarty_tpl->tpl_vars['search']->value['hy']) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['search']->value['hy']];?>

                                  <?php } else { ?>
                                    期望行业
                                  <?php }?>
                              </span>
                <input type="hidden" class="inputre" name="qwhy" id="qwhy" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['hy'];?>
">
                <i class=""></i>
                <div class="Search_jobs_more_chlose_hylist none">
                    <ul>
                        <?php if ($_smarty_tpl->tpl_vars['config']->value['fz_type']!='2'&&$_smarty_tpl->tpl_vars['config']->value['hyclass']=='') {?>
                        <div class="Search_jobs_form_list">
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <li><a onclick="post_search(1,'hy',this);" class="Search_jobs_sub_a" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                            <?php } ?>
                        </div>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <div class="shaixuan zuostyle" style="margin-left: 90px;">职能类别：</div>
            <div class="Search_jobs_more_chlose" style="width: 300px;">
                <input type="hidden" name="job_post" id="job_post" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['jobs_id'];?>
">
                <input class="Search_jobs_more_chlose_s" placeholder="请选职能类别" value="<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['search']->value['jobs_id']];?>
" readonly="readonly" style="border: none;outline: none;height: 30px;" name="qwznlb" id="qwznlb"    onclick="index_job(1,'#qwznlb','#job_post','left:100px;top:100px; position:absolute;','<?php echo $_smarty_tpl->tpl_vars['row']->value['job_post'];?>
');"/>
                <i class=""></i>
            </div>
        </div>
        <div class="hangseach">
            <div class="shaixuan zuostyle">期望工作地：</div>
            <div class="Search_jobs_more_chlose" style="width: 300px;">


                <input type="button"  class="yun_resume_popup_chose_box_text" <?php if ($_smarty_tpl->tpl_vars['search']->value['hope_city']) {?>value="<?php echo $_smarty_tpl->tpl_vars['search']->value['hope_cityname'];?>
"<?php } else { ?>value="请选择"<?php }?> style="float:left;" class="news_expect_bth_big" onclick="index_city(3,'#city','#city_class','left:100px;top:100px; position:absolute;');" id="city" >
                <input name='city_class' id='city_class' value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['hope_city'];?>
"  type='hidden' />

            </div>
            <div class="shaixuan zuostyle" style="margin-left: 90px;">现居住地：</div>
            <div class="Search_jobs_more_chlose" style="width: 300px;">
                <input type="button"  <?php if ($_smarty_tpl->tpl_vars['resume']->value['living']) {?>value="<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['resume']->value['living']];?>
"<?php } else { ?>value="请选择"<?php }?> style="float:left;" class="yun_resume_popup_chose_box_text" onclick="index_city(1,'#living','#living_class','left:100px;top:100px; position:absolute;');" id="living" >
                <input name='living' id='living_class' value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['living'];?>
"  type='hidden' />
            </div>
        </div>
        <div class="hangseach">
            <label class="cccsss posirel">
                <div class="shaixuan zuostyle">期望年薪：</div>
                <div class="Search_jobs_sub" style="float: left;width: 130px;">
                    <input type="text" class="Search_jobs_more_chlose inputkk"  id="salery_low" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['minsalary'];?>
" placeholder="万" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                </div>
                <label class="heng" style="margin-left: 20px;"></label>
                <div class="Search_jobs_sub" style="float: left;width: 130px;">
                    <input type="text" class="Search_jobs_more_chlose inputkk"  id="salery_up" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['maxsalary'];?>
" placeholder="万" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                </div>
                <div class="btnhover" style="width: 490px;right: -10px;left: inherit;top: -10px;">
                    <div class="btnsss" data-type="3" onclick="post_search(1,'salary');">确定</div>
                </div>
                <span class="tipser"></span>
            </label>
            <label class="cccsss posirel">
                <div class="shaixuan zuostyle">年龄：</div>
                <div class="Search_jobs_sub" style="float: left;width: 130px;">
                    <input type="text" class="Search_jobs_more_chlose inputkk" name="age_low" id="age_low" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['minage'];?>
" placeholder="岁" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                </div>
                <label class="heng" style="margin-left: 20px;"></label>
                <div class="Search_jobs_sub" style="float: left;width: 130px;">
                    <input type="text" class="Search_jobs_more_chlose inputkk" name="age_up" id="age_up" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['maxage'];?>
" placeholder="岁" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                </div>
                <div class="btnhover" style="width: 470px;right: -10px;left: inherit;top: -10px;">
                    <div class="btnsss" data-type="4" onclick="post_search(1,'age');">确定</div>
                </div>
                <span class="tipser"></span>
            </label>
        </div>
        <div class="hangseach">
            <div class="shaixuan zuostyle">学历：</div>
            <div class="Search_jobs_more_chlose" style="width: 130px;">
                              <span class="Search_jobs_more_chlose_s">
                                  <?php if ($_smarty_tpl->tpl_vars['search']->value['edu']) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['search']->value['edu']];?>

                                  <?php } else { ?>
                                    学历
                                  <?php }?>
                              </span><i class=""></i>
                <input type="hidden" class="inputre" name="edu" id="edu" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['edu'];?>
">
                <div class="Search_jobs_more_chlose_list none">
                    <ul>
                        <li><a onclick="post_search(2,'edu',this);" class="Search_jobs_sub_a " style="width: 110px;">全部</a></li>
                        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <li><a  onclick="post_search(1,'edu',this);" class="Search_jobs_cxz " style="width: 110px;" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="shaixuan zuostyle">工作年限：</div>
            <div class="Search_jobs_more_chlose" style="width: 130px;">
                              <span class="Search_jobs_more_chlose_s">
                                  <?php if ($_smarty_tpl->tpl_vars['search']->value['exp']) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['search']->value['exp']];?>

                                  <?php } else { ?>
                                    工作年限
                                  <?php }?>
                              </span>
                <i class=""></i>
                <input type="hidden" class="inputre" name="exp_year" id="exp_year" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['exp'];?>
">
                <div class="Search_jobs_more_chlose_list none">
                    <ul>
                        <li><a onclick="post_search(2,'exp',this);" class="Search_jobs_sub_a " style="width: 110px;">全部</a></li>
                        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_work']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <li><a  onclick="post_search(1,'exp',this);" class="Search_jobs_cxz " style="width: 110px;" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="shaixuan zuostyle">性别：</div>
            <div class="Search_jobs_more_chlose" style="width: 130px;">
                              <span class="Search_jobs_more_chlose_s">
                                  <?php if ($_smarty_tpl->tpl_vars['search']->value['sex']==1) {?>
                                    男
                                   <?php } elseif ($_smarty_tpl->tpl_vars['search']->value['sex']==2) {?>
                                  女
                                  <?php } else { ?>
                                    不限
                                  <?php }?>
                              </span>
                <i class=""></i>
                <input type="hidden" class="inputre" name="sex" id="sex" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sex'];?>
">
                <div class="Search_jobs_more_chlose_list none">
                    <ul>
                        <li><a  onclick="post_search(2,'sex');" class="Search_jobs_sub_a " style="width: 110px;">不限</a></li>
                        <li><a  onclick="post_search(1,'sex',this);" data-id="1" class="Search_jobs_sub_a " style="width: 110px;">男</a></li>
                        <li><a  onclick="post_search(1,'sex',this);" data-id="2" class="Search_jobs_sub_a " style="width: 110px;">女</a></li>
                    </ul>
                </div>
            </div>
            <div class="shaixuan zuostyle">求职状态：</div>
            <div class="Search_jobs_more_chlose" style="width: 180px;">
                              <span class="Search_jobs_more_chlose_s">
                                  <?php if ($_smarty_tpl->tpl_vars['search']->value['status']) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['search']->value['status']];?>

                                  <?php } else { ?>
                                    求职状态
                                  <?php }?>
                              </span>
                <i class=""></i>
                <input type="hidden" class="inputre" name="qzzt" id="qzzt" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['status'];?>
">
                <div class="Search_jobs_more_chlose_list none" style="width: 180px;">
                    <ul>
                        <li><a class="Search_jobs_sub_a " style="width: 180px;" onclick="post_search(2,'status',this);">全部</a></li>
                        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_jobstatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <li><a  onclick="post_search(1,'status',this);" class="Search_jobs_cxz " style="width: 180px;" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
        <div class="hangseach">
            <?php if ($_smarty_tpl->tpl_vars['js_def']->value==8) {?>
            <div class="baocundao">
                <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/daochu.png" style="vertical-align: middle;">
                保存为搜索条件
            </div>
            <?php }?>
            <div class="zhankai shouqibtn" style="width: 1040px;margin-left: -20px;">
                <label><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/shouqi.png"/></label>
                <span>收起搜索条件</span>
            </div>
        </div>

    </div>
</div>
<div  class="infoboxp22"  id="infobox2" style="display:none; ">
    <div>

            <div class="jb_infobox" style="width: 100%;margin-top: 40px;margin-left: 36px;">
                <label class="pjnr">搜索条件命名：</label>
                <input class="mingming" id="mingming" placeholder="请为搜索条件命名（18字以内）" maxlength="18"/>
            </div>
            <div class="jb_infobox" style="width: 100%;margin-top: 20px;">
                <button type="button"  value='1' class="submit_btn" id="mmbtn" style="margin-left: 170px;">确定</button>
                <button type="button"  value='1' class="submit_btn cancel_btn" style="margin-left: 15px;">取消</button>
            </div>

    </div>
</div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/data/plus/city.cache.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/searchbox.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function post_search(status,name,e) {
        var data = [];
        data['keyword'] = $("#keyword").val();
        data['job_name'] = $("#jobname").val();
        data['com_name'] = $("#com_name").val();
        data['hy'] = $("#qwhy").val();
        data['jobs_id'] = $("#job_post").val();
        data['hope_city'] = $("#qwaddress").val();
        data['location'] = $("#qwcity").val();
        data['minsalary'] = $("#salery_low").val();
        data['maxsalary'] = $("#salery_up").val();
        data['minage'] = $("#age_low").val();
        data['maxage'] = $("#age_up").val();
        data['sex'] = $("#sex").val();
        data['edu'] = $("#edu").val();
        data['status'] = $("#edu").val();
        data['location'] = $("#qwcity").val();
        data['exp'] = $("#exp_year").val();
        var open = $(".search_more").css("display");
       if(open=="none"){
           data['open'] =0;
       }else{
           data['open'] =1;
       }

        data['status'] = $("#qzzt").val();
        if(status==2){
            data[name] = "";
            if(name=="age"){
                data['minage']="";
                data['maxage']="";
            }
            if(name=="salary"){
                data['minsalary']="";
                data['maxsalary']="";
            }
        }else{
            if(name=="keyword" && data['keyword']==""){
                layer.msg("请输入搜索内容",2,8);return;
            }

            if(name=="job_name" && data['job_name']==""){
                return;
            }

            if(name=="com_name" && data['com_name']==""){
                return;
            }

            if(name=="hy"){
                data['hy'] = $(e).attr("data-id");
            }

            if(name=="open"){
                data['open'] = 1;
                return;
            }
            if(name=="status"){
                data['status'] = $(e).attr("data-id");
            }

            if(name=="sex"){
                data['sex'] = $(e).attr("data-id");
            }

            if(name=="exp"){
                data['exp'] = $(e).attr("data-id");
            }

            if(name=="edu"){
                data['edu'] = $(e).attr("data-id");
            }

            if(name=="hope_city"){
                data['hope_city'] = $(e).attr("data-id");
            }

            if(name=="location"){
                data['location'] = $(e).attr("data-id");
            }

            if(name=="jobs_id"){
                data['jobs_id'] = $(e).attr("data-id");
            }
            
        }
        standardPost(location,data);
    }

    $(".searcher").click(function () {
        var data = [];
        data['searcher_id'] = $(this).attr("data-id");
        standardPost("/member/index.php?c=resume",data);
    })

    function standardPost (url,args)
    {
        var form = $("<form method='post'></form>");
        form.attr({"action":url});
        for (arg in args)
        {
            var input = $("<input type='hidden'>");
            input.attr({"name":arg});
            input.val(args[arg]);
            form.append(input);
        }
        $("html").append(form);
        form.submit();
    }

    $("body").on("click","#btnSubmitJobsort",function () {
        var data_id=$("#job_post").val();
        $(this).attr('data-id',data_id);
        post_search(1,'jobs_id',this);
    })
<?php echo '</script'; ?>
><?php }} ?>
