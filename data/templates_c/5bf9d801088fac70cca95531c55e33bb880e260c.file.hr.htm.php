<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-27 13:38:28
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/hr.htm" */ ?>
<?php /*%%SmartyHeaderCode:7418316065bac6cd47fbae3-29754124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bf9d801088fac70cca95531c55e33bb880e260c' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/hr.htm',
      1 => 1520923272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7418316065bac6cd47fbae3-29754124',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'com_style' => 0,
    'style' => 0,
    'current' => 0,
    'JobList' => 0,
    'one' => 0,
    'StateList' => 0,
    'now_url' => 0,
    'rows' => 0,
    'v' => 0,
    'userclass_name' => 0,
    'list' => 0,
    'li' => 0,
    'pagenav' => 0,
    'jobnum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bac6cd4a915a6_30958289',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bac6cd4a915a6_30958289')) {function content_5bac6cd4a915a6_30958289($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<style>
    .yixijob {
        display: inline-block;
        padding: 0px 5px;
        background: rgb(229,241,249);
        max-width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        vertical-align: bottom;
        margin-right: 5px;
    }
</style>
<div class="w1000">
  <div class="admin_mainbody"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <link href="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
/images/index_style.css" type=text/css rel=stylesheet>
      <link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/pinfen.css" type=text/css rel=stylesheet>
    <div class=right_box>
      <div class=admincont_box>
     <div class="job_list_tit">
         <ul class="">
         <li <?php if ($_GET['c']=="hr") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=hr"  title="收到简历">收到简历</a></li>
         <li <?php if ($_GET['c']=="down") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=down"  title="您已下载的简历记录">已下载简历</a></li>
         <li <?php if ($_GET['c']=="talent_pool") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=talent_pool"  title="加入人才库的简历">收藏简历</a></li>
         <li <?php if ($_GET['c']=="look_resume") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=look_resume"  title="您浏览简历的记录">看过的简历</a></li>
         <!--<li <?php if ($_GET['c']=="refuse") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=refuse"  title="不合适简历">不合适简历</a></li>-->
         <!--<li <?php if ($_GET['c']=="record") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=record" title="网站为您推荐的简历">网站推荐简历</a></li>-->
             <!--<li <?php if ($_GET['c']=="record") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=lietou" title="猎头推荐简历">猎头推荐简历</a></li>-->
         </ul>
         </div>
        <div class="com_body">
          <div class=admin_textbox_04>
          <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
          <div class="hr_tip_box">
           <div class="hr_subMetx"> <span class="hr_resumesearch_span fltL">人才类型：</span> 
           <a href="index.php?c=hr&jobid=<?php echo $_GET['jobid'];?>
&state=<?php echo $_GET['state'];?>
&keyword=<?php echo $_GET['keyword'];?>
" class="hr_subMetx_a <?php if ($_GET['resumetype']=='') {?>hr_subMetx_cur<?php }?>">不限</a>
           <a href="index.php?c=hr&jobid=<?php echo $_GET['jobid'];?>
&state=<?php echo $_GET['state'];?>
&resumetype=1&keyword=<?php echo $_GET['keyword'];?>
" class="hr_subMetx_a <?php if ($_GET['resumetype']=='1') {?>hr_subMetx_cur<?php }?>">候选人自荐</a>
           <a href="index.php?c=hr&jobid=<?php echo $_GET['jobid'];?>
&state=<?php echo $_GET['state'];?>
&resumetype=3&keyword=<?php echo $_GET['keyword'];?>
" class="hr_subMetx_a <?php if ($_GET['resumetype']=='3') {?>hr_subMetx_cur<?php }?>">猎头推荐</a>
          </div>
           
            <div class="hr_subMetx"> <span class="hr_resumesearch_span fltL">招聘职位：</span>
              <div class="text_seclet text_seclet_cur2 re">
                <input id="qypr" class="SpFormLBut text_seclet_w250" type="button" onclick="search_show('job_qypr');" <?php if ($_smarty_tpl->tpl_vars['current']->value['id']) {?>value="<?php echo $_smarty_tpl->tpl_vars['current']->value['name'];?>
"<?php } else { ?>value="全部职位"<?php }?>>
                <div id="job_qypr" class="cus-sel-opt-panel " style="display: none;">
                  <ul class="Search_Condition_box_list">
                    <li><a href="index.php?c=hr&state=<?php echo $_GET['state'];?>
&resumetype=<?php echo $_GET['resumetype'];?>
&keyword=<?php echo $_GET['keyword'];?>
">全部职位</a></li>
                    <?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['JobList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
                    <li> <a href="index.php?c=hr&jobid=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['one']->value['type'];?>
&state=<?php echo $_GET['state'];?>
&resumetype=<?php echo $_GET['resumetype'];?>
&keyword=<?php echo $_GET['keyword'];?>
"><?php echo $_smarty_tpl->tpl_vars['one']->value['name'];
if ($_smarty_tpl->tpl_vars['one']->value['type']==2) {?>（猎）<?php }?></a> </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
               <form action="index.php" method="get" >
                <span class="hr_resumesearch_span fltL">关 键 字：</span>
                <div class="hr_subMetx_se">
                  <input name="c" type="hidden" value="hr">
                  <input name="resumetype" type="hidden" value="<?php echo $_GET['resumetype'];?>
">
                   <input name="jobid" type="hidden" value="<?php echo $_GET['jobid'];?>
">
                    <input name="state" type="hidden" value="<?php echo $_GET['state'];?>
">
                  <input name="keyword" type="text" class="hr_resumesearch_text" placeholder="请输入姓名查找" value="<?php echo $_GET['keyword'];?>
">
                  <input type="submit"  class="hr_resumesearch_bth" value="搜索">
                </div>
              </form>
            </div>
            <div class="hr_subMetx">
                <span class="hr_resumesearch_span fltL">简历状态：</span>
                <a href="index.php?c=hr&jobid=<?php echo $_GET['jobid'];?>
&resumetype=<?php echo $_GET['resumetype'];?>
&keyword=<?php echo $_GET['keyword'];?>
" class="hr_subMetx_a <?php if ($_GET['state']=='') {?>hr_subMetx_cur<?php }?>">不限</a> <?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['StateList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?> <a <?php if ($_GET['state']==$_smarty_tpl->tpl_vars['one']->value['id']) {?>class="hr_subMetx_cur"<?php }?> href="index.php?c=hr&jobid=<?php echo $_GET['jobid'];?>
&state=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
&resumetype=<?php echo $_GET['resumetype'];?>
&keyword=<?php echo $_GET['keyword'];?>
"><?php echo $_smarty_tpl->tpl_vars['one']->value['name'];?>
</a> <?php } ?> </div>
       
          </div>
          <div class="clear"></div>
          <form action="<?php echo $_smarty_tpl->tpl_vars['now_url']->value;?>
&act=hrset" target="supportiframe" method="post" id='myform'>
            <div class="clear"></div>


            <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>

              <div class="job_hr_list_box">
                  <?php if ($_smarty_tpl->tpl_vars['v']->value['identity']==3) {?>
                  <div class="job_hr_list_l" style="background: #f4f7fb;color: #000;">
                      <div class="com_mem_hr_list_b_b fl" style="width: 30%;">
                          <span class="com_mem_hr_list_bzt ">推荐职位：</span>
                          <a <?php if ($_smarty_tpl->tpl_vars['v']->value['type']=='1') {?>href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$v.job_id`'),$_smarty_tpl);?>
"<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['type']=='2') {?>href="<?php echo smarty_function_url(array('m'=>'lietou','c'=>'jobcomshow','id'=>'`$v.job_id`'),$_smarty_tpl);?>
"<?php }?>  class="" style="color:#f60; font-weight:bold"><?php echo $_smarty_tpl->tpl_vars['v']->value['job_name'];?>
</a>
                      </div>
                      <div class="com_mem_hr_list_b_b fl" style="width: 30%;padding-left: 20px;">
                          <label class="ico_lie">猎头推荐</label>
                          <label class="tuijianxx">推荐猎头：
                              <a class="liename" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['v']->value['lietou_name'];?>

                                  <!--<div class="ltxx">-->
                                     <!--<img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/lttuijian.png" class="lttx">-->
                                      <!--<div class="jslt">-->
                                          <!--<p class="namell">邱在云-->
                                              <!--<label style="margin-left: 20px;color:#666666;font-size: 12px; ">电话：<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']==6) {?>18785852585<?php } else { ?>下载简历后展示<?php }?></label></p>-->
                                          <!--<p class="namehy">擅长行业：计算机/互联网</p>-->
                                          <!--<p class="namegs">所在公司：重庆南方新华咨询管理公司</p>-->
                                      <!--</div>-->
                                  <!--</div>-->
                              </a>
                          </label>

                      </div>
                      <div class="com_mem_hr_list_b_b fl" style="width: 30%;padding-left: 20px;text-align: right;">
                          <span class="com_mem_hr_list_bzt ">推荐时间：</span>
                          <span class=""> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['datetime'],'%Y-%m-%d');?>
 </span>
                      </div>
                  </div>
                  <?php } else { ?>
                  <div class="job_hr_list_l" style="background: #f4f7fb;color: #000;">
                      <div class="com_mem_hr_list_b_b fl" style="width: 30%;">
                          <span class="com_mem_hr_list_bzt ">投递职位：</span>
                          <a <?php if ($_smarty_tpl->tpl_vars['v']->value['type']=='1') {?>href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$v.job_id`'),$_smarty_tpl);?>
"<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['type']=='2') {?>href="<?php echo smarty_function_url(array('m'=>'lietou','c'=>'jobcomshow','id'=>'`$v.job_id`'),$_smarty_tpl);?>
"<?php }?>  class="" style="color:#f60; font-weight:bold"><?php echo $_smarty_tpl->tpl_vars['v']->value['job_name'];?>
</a>
                      </div>
                      <div class="com_mem_hr_list_b_b fl" style="width: 30%;padding-left: 20px;">
                      </div>
                      <div class="com_mem_hr_list_b_b fl" style="width: 30%;padding-left: 20px;text-align: right;">
                          <span class="com_mem_hr_list_bzt ">投递时间：</span>
                          <span class=""> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['datetime'],'%Y-%m-%d');?>
 </span>
                      </div>
                  </div>
                  <?php }?>
                  <div class="job_hr_list_boxcheckbox">
                      <input type="checkbox" name="delid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="job_hr_list_boxcheckbox_c">
                  </div>
                  <div class="job_hr_resume_user" style="margin-top: 10px;">
                      <div class="fl" style="width: 40%;padding-right: 10px;">
                          <div class="job_hr_resume_user_name">
                              <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','reid'=>'`$v.id`'),$_smarty_tpl);?>
" target="_blank" style="color: purple;">
                                  <label href="" target="_blank" class="com_Release_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['resume']['name'];?>
</label>
                                  <label href="" target="_blank" class="pal_20"><?php if ($_smarty_tpl->tpl_vars['v']->value['resume']['sex']==1) {?>男<?php } else { ?>女<?php }?></label>
                                  <label href="" target="_blank" class="pal_20"><?php echo $_smarty_tpl->tpl_vars['v']->value['resume']['age'];?>
岁</label>
                                  <label href="" target="_blank" class="pal_20"><?php echo $_smarty_tpl->tpl_vars['v']->value['resume']['living'];?>
</label>
                                  <label href="" target="_blank" class="pal_20"><?php echo $_smarty_tpl->tpl_vars['v']->value['resume']['useredu'];?>
</label>
                                  <label href="" target="_blank" class="pal_20"><?php echo $_smarty_tpl->tpl_vars['v']->value['resume']['userexp'];?>
</label>
                              </a>
                          </div>
                          <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['resume']['edu_exp']) {?>-->
                          <!--<div class="job_hr_resume_user_yx">-->
                              <!--<label><?php echo date('Y/m',$_smarty_tpl->tpl_vars['v']->value['resume']['edu_exp']['sdate']);?>
-<?php echo date('Y/m',$_smarty_tpl->tpl_vars['v']->value['resume']['edu_exp']['edate']);?>
：</label>-->
                              <!--<label class="zi0014 nowrapp" style="max-width: 80px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['resume']['edu_exp']['name'];?>
</label>-->
                              <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['resume']['edu_exp']['specialty']) {?>-->
                              <!--<span class="shustyle">|</span>-->
                              <!--<label class="zi3314 nowrapp" style="max-width: 95px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['resume']['edu_exp']['specialty'];?>
</label>-->
                              <!--<?php }?>-->

                              <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['resume']['edu_exp']['education']) {?>-->
                              <!--<span class="shustyle">|</span>-->
                              <!--<label class="zi3314 nowrapp"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value['resume']['edu_exp']['education']];?>
</label>-->
                              <!--<?php }?>-->
                          <!--</div>-->
                          <!--<?php }?>-->
                          <!--<div class="job_hr_resume_user_yx">-->
                              <!--<label>期望年薪：</label>-->
                              <!--<label class="" style="max-width: 100px;color: #ff6600;margin-right: 10px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['salary'];?>
</label>-->
                              <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['hope_city']) {?>-->
                              <!--<label>期望工作地：</label>-->
                              <!--<label class="salery_s" style="max-width: 100px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['hope_city'];?>
</label>-->
                              <!--<?php }?>-->
                          <!--</div>-->
                          <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['jobname']) {?>-->
                          <!--<div class="job_hr_resume_user_yx">-->
                              <!--<label>期望职位：</label>-->
                              <!--<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v']->value['jobname']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>-->
                              <!--<label class="yixijob" style="max-width: 100px;"><?php echo $_smarty_tpl->tpl_vars['list']->value;?>
</label>-->
                              <!--<?php } ?>-->
                          <!--</div>-->
                          <!--<?php }?>-->
                      </div>
                      <!--<div class="fl" style="padding-left: 20px;border-left: 1px solid #eeeeee;min-height: 60px;">-->
                          <!--<?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['li']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['v']->value['work_exp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['li']->key => $_smarty_tpl->tpl_vars['li']->value) {
$_smarty_tpl->tpl_vars['li']->_loop = true;
?>-->
                          <!--<div class="job_hr_resume_user_yx">-->
                              <!--<label><?php echo date('Y/m',$_smarty_tpl->tpl_vars['li']->value['sdate']);?>
-<?php echo date('Y/m',$_smarty_tpl->tpl_vars['li']->value['edate']);?>
</label>-->
                              <!--<span class="shustyle">|</span>-->
                              <!--<label class="zi3314 nowrapp" style="max-width: 200px;"><?php echo $_smarty_tpl->tpl_vars['li']->value['name'];?>
</label>-->
                              <!--<span class="shustyle">|</span>-->
                              <!--<label class="zi0014 nowrapp" style="max-width: 100px;"><?php echo $_smarty_tpl->tpl_vars['li']->value['title'];?>
</label>-->
                          <!--</div>-->
                          <!--<?php } ?>-->
                      <!--</div>-->
                  </div>
                  <div class="job_hr_list_l">

                      <?php if ($_smarty_tpl->tpl_vars['v']->value['identity']==1) {?>
                      <div class="com_mem_hr_list_b_b"> <span class="com_mem_hr_list_bzt ">标记状态：</span>
                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']!=4&&$_smarty_tpl->tpl_vars['v']->value['userid_msg']==1&&$_smarty_tpl->tpl_vars['v']->value['is_browse']!='5') {?><span class="com_mem_hr_list_bj com_mem_hr_list_bj_cur" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='5'> 已邀请面试 </span>
                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']!=4) {?><span class="com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='5') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='5'> 无法联系 </span> <?php }?>
                          <?php } else { ?>
                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<2) {?>

                          <span class="com_mem_hr_list_bj  <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='1') {?>com_mem_hr_list_bj_cur com_mem_hr_list_red<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='1'> 未查看<i class="com_mem_hr_no_icon"></i> <em class="job_hr_new_resume"></em></span>
                          <?php }?>

                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<3) {?> <span class="com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='2') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='2'> 已查看</span><?php }?>

                          <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<4) {?><span class="com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='3') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='3'> 等待通知 </span> <?php }?>-->

                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<5) {?><span class="browsebj com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='4') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='4'> 不合适</span><?php }?>

                          <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']!=4) {?><span class="com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='5') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='5'> 无法联系 </span> <?php }
}?>-->
                      </div>
                      <?php } else { ?>
                      <div class="com_mem_hr_list_b_b">
                          <span class="com_mem_hr_list_bzt ">标记状态：</span>
                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<2) {?>
                          <span class="com_mem_hr_list_bj  <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='1') {?>com_mem_hr_list_bj_cur com_mem_hr_list_red<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='1'> 未查看<i class="com_mem_hr_no_icon"></i> <em class="job_hr_new_resume"></em></span>
                          <?php }?>

                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<3) {?> <span class="com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='2') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='2'> 已查看</span><?php }?>

                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<5) {?><span class="browsebj com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='4') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='4'> 不合适</span><?php }?>

                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']==6) {?><span class="com_mem_hr_list_bj com_mem_hr_list_bj_cur"> 已下载 </span> <?php }?>
                      </div>
                      <?php }?>
                      <div class="job_hr_list_r">
                          <?php if ($_smarty_tpl->tpl_vars['v']->value['remark']) {?>
                          <span class="job_hr_job_cz_a">
                              <a href="javascript:void(0)" class="chakantj" class="uesr_name_a">查看推荐备注</a>
                              <input type="hidden" class="remark" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['remark'];?>
">
                          </span>
                          <i class="job_hr_job_cz_line">|</i>
                          <?php }?>
                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']!=4) {?>
                          <?php if ($_smarty_tpl->tpl_vars['v']->value['userid_msg']==1) {?>
                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']==5) {?>
                          <i class="job_hr_job_cz_line">|</i><span class="job_hr_job_cz_a">无法联系</span>
                          <?php } else { ?>
                          <i class="job_hr_job_cz_line">|</i><span class="job_hr_job_cz_a">已邀请面试</span>
                          <?php }?>

                          <?php } else { ?>


                          <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']==6) {?>
                          <span class="job_hr_job_cz_a">已下载</span>
                          <?php } else { ?>
                              <?php if ($_smarty_tpl->tpl_vars['v']->value['identity']==1) {?>
                              <!--<span class="job_hr_job_cz_a"> <a href="javascript:void(0);" uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" username="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" jobid="<?php echo $_smarty_tpl->tpl_vars['v']->value['job_id'];?>
"   class="sq_resume uesr_name_a" jobtype='<?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
'>邀请面试</a></span>-->
                              <?php } else { ?>
                              <!--<span class="job_hr_job_cz_a"> <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','reid'=>'`$v.id`'),$_smarty_tpl);?>
" uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" username="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" jobid="<?php echo $_smarty_tpl->tpl_vars['v']->value['job_id'];?>
"   class="uesr_name_a" target="_blank">查看简历</a></span><i class="job_hr_job_cz_line">|</i>-->
                              <?php }?>
                               <span class="job_hr_job_cz_a"><a href="javascript:void(0)" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='4' class="browsebj uesr_name_a">不合适</a> </span>
                              <?php }?>
                          <?php }?>
                          <?php } else { ?>
                          <span class="job_hr_job_cz_a">已拒绝</span>
                          <?php }?>
                          <i class="job_hr_job_cz_line">|</i><span class="job_hr_job_cz_a"> <a href="javascript:void(0)" onclick="layer_del('确定要删除该条职位申请吗？', 'index.php?c=hr&act=hrset&delid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'); " class="uesr_name_a">删除</a> </span>
                      </div>
                  </div>
              </div>
            <!--<div class="job_hr_list_box">-->
            <!--<div class="job_hr_list_boxcheckbox">-->
            <!--<input type="checkbox" name="delid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="job_hr_list_boxcheckbox_c">-->
            <!--</div>-->
           <!--<div class="job_hr_resume_user">-->
           <!--<div class="job_hr_resume_user_name">-->
           <!--<a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>'`$v.eid`'),$_smarty_tpl);?>
"  target="_blank" class="com_Release_name" style="color:#333"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
&nbsp;-->
            <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']==1) {?>-->
              <!--<span style="color: #666;font-size: 3;">(未查看)</span>-->
            <!--<?php }?>-->
           <!--</a>-->
               <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['identity']==1) {?>-->
               <!--<?php } else { ?>-->
               <!--<img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/lttuijian.png" style="margin-left: 10px;">-->
               <!--<?php }?>-->

           <!--</div>-->
           <!--<div class="">-->
           <!--<span class="hr_s_t_p"><?php echo $_smarty_tpl->tpl_vars['v']->value['exp'];?>
经验 <span style="font-size:12px;color:#999; padding:0px 5px;">|</span> <?php echo $_smarty_tpl->tpl_vars['v']->value['edu'];?>
学历</span>-->
           <!--<span  class="hr_s_t">申请的职位：<a <?php if ($_smarty_tpl->tpl_vars['v']->value['type']=='1') {?>href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$v.job_id`'),$_smarty_tpl);?>
"<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['type']=='2') {?>href="<?php echo smarty_function_url(array('m'=>'lietou','c'=>'jobcomshow','id'=>'`$v.job_id`'),$_smarty_tpl);?>
"<?php }?> target="_blank" class="uesr_name_a"><?php echo $_smarty_tpl->tpl_vars['v']->value['job_name'];?>
</a>-->
           <!--</span>-->
           <!--<span class="hr_s_t"> 申请的时间： <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['datetime'],'%Y-%m-%d');?>
   </span>-->
           <!--</div>-->
             <!--<div class="job_hr_resume_user_yx">-->
             <!--意向职位：<span class="" style="color:#f60; font-weight:bold"><?php echo $_smarty_tpl->tpl_vars['v']->value['jobname'];?>
</span>-->
             <!--</div>-->
           <!--</div>-->

              <!--<div class="clear"></div>-->
              <!--<div class="job_hr_list_l">-->

              <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['identity']==1) {?>-->
              <!--<div class="com_mem_hr_list_b_b"> <span class="com_mem_hr_list_bzt ">标记状态：</span>-->
              <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']!=4&&$_smarty_tpl->tpl_vars['v']->value['userid_msg']==1&&$_smarty_tpl->tpl_vars['v']->value['is_browse']!='5') {?><span class="browsebj com_mem_hr_list_bj com_mem_hr_list_bj_cur" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='5'> 已邀请面试 </span>-->
				<!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']!=4) {?><span class="browsebj com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='5') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='5'> 无法联系 </span> <?php }?>-->
				<!--<?php } else { ?>-->
              <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<2) {?>-->

              <!--<span class="browsebj com_mem_hr_list_bj  <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='1') {?>com_mem_hr_list_bj_cur com_mem_hr_list_red<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='1'> 未查看<i class="com_mem_hr_no_icon"></i> <em class="job_hr_new_resume"></em></span>-->
              <!--<?php }?>-->

                <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<3) {?> <span class="browsebj com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='2') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='2'> 已查看</span><?php }?>-->

                <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<4) {?><span class="browsebj com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='3') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='3'> 等待通知 </span> <?php }?>-->

                <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<5) {?><span class="browsebj com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='4') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='4'> 不合适</span><?php }?>-->

                <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']!=4) {?><span class="browsebj com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='5') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='5'> 无法联系 </span> <?php }
}?>-->
                <!--</div>-->
              <!--<?php } else { ?>-->
              <!--<div class="com_mem_hr_list_b_b">-->
                  <!--<span class="com_mem_hr_list_bzt ">标记状态：</span>-->
                      <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<2) {?>-->
                      <!--<span class="browsebj com_mem_hr_list_bj  <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='1') {?>com_mem_hr_list_bj_cur com_mem_hr_list_red<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='1'> 未查看<i class="com_mem_hr_no_icon"></i> <em class="job_hr_new_resume"></em></span>-->
                      <!--<?php }?>-->

                      <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']<3) {?> <span class="browsebj com_mem_hr_list_bj <?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']=='2') {?>com_mem_hr_list_bj_cur<?php }?>" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='2'> 已查看</span><?php }?>-->
                  <!--</div>-->
              <!--<?php }?>-->
         <!--<div class="job_hr_list_r">-->


              <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']!=4) {?>-->
				  <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['userid_msg']==1) {?>-->
					<!--<?php if ($_smarty_tpl->tpl_vars['v']->value['is_browse']==5) {?>-->
					<!--<i class="job_hr_job_cz_line">|</i><span class="job_hr_job_cz_a">无法联系</span>-->
					<!--<?php } else { ?>-->
					<!--<i class="job_hr_job_cz_line">|</i><span class="job_hr_job_cz_a">已邀请面试</span>-->
					<!--<?php }?>-->
				  <!--<?php } else { ?>-->

                    <!--<?php if ($_smarty_tpl->tpl_vars['v']->value['identity']==1) {?>-->
				   <!--<span class="job_hr_job_cz_a"> <a href="javascript:void(0);" uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" username="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" jobid="<?php echo $_smarty_tpl->tpl_vars['v']->value['job_id'];?>
"   class="sq_resume uesr_name_a" jobtype='<?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
'>邀请面试</a></span>-->
                    <!--<?php } else { ?>-->
                    <!--<span class="job_hr_job_cz_a"> <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','reid'=>'`$v.id`'),$_smarty_tpl);?>
" uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" username="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" jobid="<?php echo $_smarty_tpl->tpl_vars['v']->value['job_id'];?>
"   class="uesr_name_a" target="_blank">查看简历</a></span>-->
                    <!--<?php }?>-->
				   <!--<i class="job_hr_job_cz_line">|</i> <span class="job_hr_job_cz_a"><a href="javascript:void(0)" name='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' browse='4' class="browsebj uesr_name_a">不合适</a> </span>-->
				  <!--<?php }?>-->
              <!--<?php } else { ?>-->
			  <!--<span class="job_hr_job_cz_a">已拒绝</span>-->
              <!--<?php }?>-->
             <!--<i class="job_hr_job_cz_line">|</i><span class="job_hr_job_cz_a"> <a href="javascript:void(0)" onclick="layer_del('确定要删除该条职位申请吗？', 'index.php?c=hr&act=hrset&delid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'); " class="uesr_name_a">删除</a> </span>-->
              <!--</div>-->
              <!--</div>-->
                 <!--</div>-->
            <?php } ?>
            <div class="com_Release_job_bot" style="margin-top:10px;"> <span class="com_Release_job_qx">
              <input id='checkAll'  type="checkbox" onclick='m_checkAll(this.form)' class="com_Release_job_qx_check">
              全选</span>
              <INPUT class="c_btn_02" type="button" name="subdel" value="批量删除" onclick="return really('delid[]');" style="margin-left: 20px;">
              <INPUT class='c_btn_02' type="button" name="subdel" value="批量阅读" onclick="return really_read('delid[]');" style="margin-left:10px;">
            </div>
            <?php } else { ?>
            <div class="msg_no"> 
			 <?php if ($_GET['keyword']!='') {?>
              <p>没有搜索到相关简历记录！</p>
              <?php } else { ?>
              <p> 亲爱的用户，目前您还没有收到申请贵公司职位的人才简历！</p>
              <a href="<?php echo smarty_function_url(array('m'=>'resume'),$_smarty_tpl);?>
" class="com_msg_no_bth com_submit">我要主动找人才</a> 
			 <?php }?> </div>
            <?php }?>
            <div class="diggg mt10 fltR"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
          </form>
          <div  class="clear"></div>
          <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
          
          <?php }?>
          <div  class="clear"></div>
          <div class="wxts_box wxts_box_mt30"  style="display: none;">
            <div class="wxts">温馨提示：</div>
            1. 共有（<span class="f60"><?php if ($_smarty_tpl->tpl_vars['jobnum']->value) {
echo $_smarty_tpl->tpl_vars['jobnum']->value;
} else { ?>0<?php }?></span>）份简历申请贵公司发布的职位 <br>
            2.对于求职者来说即使是被拒绝，也胜过毫无音讯的等待。<br>
            3.请邀约或者设置为不合适给求职者投递的简历，做一个回馈<br>
          </div>
        </div>
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
        <div class="jb_infobox" style="width: 100%;">
            <textarea readonly="readonly" id="tjcontent" placeholder="请输入推荐备注，让企业更精准的了解候选人信息。" name="r_reason" cols="30" rows="9" class="hr_textarea tj_textarea" maxlength="100"></textarea>
        </div>
        <div class="jb_infobox" style="width: 100%;">
            <button type="submit"   name='submit' value='1' class="submit_btn guanbi" style="margin-left: 180px;margin-top: 20px;">关闭</button>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
>
$(document).ready(function(){

    $('#zxxCancelBtn,.guanbi').click(function(){
        layer.closeAll();
    });
	$(".browsebj").click(function(){
		var browse=$(this).attr('browse');
		var id=$(this).attr('name');
        layer.confirm("确定拒绝该简历吗？",function() {
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

	$(".chakantj").click(function () {
	    var remark = $(this).parent().find(".remark").val();
	    $("#tjcontent").val(remark);
        $.layer({
            type : 1,
            title :'查看推荐备注',
            closeBtn : [0 , true],
            border : [10 , 0.3 , '#000', true],
            area : ['500px','300px'],
            page : {dom :"#tuijianbox"}
        });
    })
});
<?php echo '</script'; ?>
> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/yqms.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
