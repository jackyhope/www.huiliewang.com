<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 09:41:46
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/searchbox.htm" */ ?>
<?php /*%%SmartyHeaderCode:21131121205bbab5daa21ed3-73721652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c2165dc4417f42a504e887ddb515ed4dfac20f4' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/searchbox.htm',
      1 => 1519796518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21131121205bbab5daa21ed3-73721652',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'com_style' => 0,
    'finder' => 0,
    'key' => 0,
    'v' => 0,
    'searcher' => 0,
    'list' => 0,
    'industry_name' => 0,
    'job_name' => 0,
    'city_name' => 0,
    'userclass_name' => 0,
    'config' => 0,
    'industry_index' => 0,
    'row' => 0,
    'city_index' => 0,
    'userdata' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbab5dab77351_66570461',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbab5dab77351_66570461')) {function content_5bbab5dab77351_66570461($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/index_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 src="/data/plus/job.cache.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/data/plus/industry.cache.js"><?php echo '</script'; ?>
>

<div class="w1000">
  <div class="admin_mainbody">
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/class.public.css" type="text/css">
      <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
/images/index_style.css" type=text/css rel=stylesheet>
    <link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/search.css" type=text/css rel=stylesheet>
    <div class=down_box>
      <div class=admincont_box>
          <div class="Search_jobs_box search_content" style="width: 1040px;border: none;">
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

                                  <div class="sousuobtn">
                                      <label class="btnr curre">����������</label>
                                      <label class="btnr">���������</label>
                                      <label class="btnr">����ѡ������</label>
                                  </div>
                                <form action="/member/index.php?c=resume"  method="post">
                                  <div class="tiaojianitem">
                                      <div class="youtj">
                                          <div id="youtitle">�ұ���Ŀ������</div>

                                          <div id="tjitemlist">
                                              <?php if ($_smarty_tpl->tpl_vars['searcher']->value) {?>
                                              <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['searcher']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                              <div class="tjitem" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
                                                  <div class="closebtn" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
                                                      <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/closeb.png" class="block">
                                                      <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/closeb1.png" class="none">
                                                  </div>
                                                  <div class="tjname" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</div>
                                                  <div class="item tjname" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['keyword']) {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['list']->value['keyword'];?>
 |
                                                      <?php }?>
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['com_name']) {?>
                                                      <?php echo $_smarty_tpl->tpl_vars['list']->value['com_name'];?>
 |
                                                      <?php }?>
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['job_name']) {?>
                                                      <?php echo $_smarty_tpl->tpl_vars['list']->value['job_name'];?>
 |
                                                      <?php }?>
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['hy']) {?>
                                                      <?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['list']->value['hy']];?>
 |
                                                      <?php }?>
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['jobs_id']) {?>
                                                      <?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['list']->value['jobs_id']];?>
 |
                                                      <?php }?>
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['hope_city']) {?>
                                                      <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['list']->value['hope_city']];?>
 |
                                                      <?php }?>
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['location']) {?>
                                                      <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['list']->value['location']];?>
 |
                                                      <?php }?>
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['minsalary']&&$_smarty_tpl->tpl_vars['list']->value['maxsalary']) {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['list']->value['minsalary'];?>
-<?php echo $_smarty_tpl->tpl_vars['list']->value['maxsalary'];?>
��
                                                      <?php } elseif ($_smarty_tpl->tpl_vars['list']->value['minsalary']&&empty($_smarty_tpl->tpl_vars['list']->value['maxsalary'])) {?>
                                                        {yun:$listt.minsalary{/yun}������
                                                      <?php } elseif ($_smarty_tpl->tpl_vars['list']->value['maxsalary']&&empty($_smarty_tpl->tpl_vars['list']->value['minsalary'])) {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['list']->value['minsalary'];?>
������
                                                      <?php }?>
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['edu']) {?>
                                                      <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value['edu']];?>
 |
                                                      <?php }?>
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['exp']) {?>
                                                      <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value['exp']];?>
 |
                                                      <?php }?>
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['minage']&&$_smarty_tpl->tpl_vars['list']->value['maxage']) {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['list']->value['minage'];?>
-<?php echo $_smarty_tpl->tpl_vars['list']->value['maxage'];?>
��
                                                      <?php } elseif ($_smarty_tpl->tpl_vars['list']->value['minage']&&empty($_smarty_tpl->tpl_vars['list']->value['maxage'])) {?>
                                                        {yun:$listt.minage{/yun}������
                                                      <?php } elseif ($_smarty_tpl->tpl_vars['list']->value['maxage']&&empty($_smarty_tpl->tpl_vars['list']->value['minage'])) {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['list']->value['maxage'];?>
������
                                                      <?php }?>
                                                      <?php if ($_smarty_tpl->tpl_vars['list']->value['sex']==1) {?>
                                                      ��
                                                      <?php } elseif ($_smarty_tpl->tpl_vars['list']->value['sex']==2) {?>
                                                      Ů
                                                      <?php }?>
                                                  </div>
                                              </div>
                                              <?php } ?>
                                              <?php } else { ?>
                                              <div class="nomsg">��δ�����κο������������</div>
                                              <?php }?>
                                          </div>
                                      </div>
                                      <div class="hangtt" style="margin-top: 30px;">
                                          <div class="shaixuan zuostyle">�ؼ��ʣ�</div>
                                          <div class="Search_jobs_sub" style="float: left;width: 400px;">
                                            <input type="text" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 390px;" name="keyword" id="keyword" placeholder="����ؼ���ֱ��ʹ�ÿո����">
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">ְλ���ƣ�</div>
                                          <div class="Search_jobs_sub" style="float: left;width: 400px;">
                                              <input type="text" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 390px;" name="job_name"  id="jobname" value="<?php echo $_POST['id'];?>
" placeholder="��������3��ְλ���ƹؼ��ʽ����������Կո����">
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">��˾���ƣ�</div>
                                          <div class="Search_jobs_sub" style="float: left;width: 400px;">
                                              <input type="text" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 390px;" name="com_name" id="comname" value="<?php echo $_POST['id'];?>
" placeholder="�����빫˾����">
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">������ҵ��</div>
                                          <div class="Search_jobs_more_chlose">
                                              <span class="Search_jobs_more_chlose_s">
                                                  <?php if ($_GET['hy']) {?>
                                                    <?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];?>

                                                  <?php } else { ?>
                                                    ��ѡ��������ҵ
                                                  <?php }?>
                                              </span>
                                              <input type="hidden" class="inputre" name="hy" id="qwhy">
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
                                                          <li><a class="Search_jobs_sub_a" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                                                          <?php } ?>
                                                      </div>
                                                      <?php }?>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">ְ�����</div>
                                          <div class="Search_jobs_more_chlose">
                                              <input type="hidden" name="jobs_id" id="job_post">
                                              <input class="Search_jobs_more_chlose_s" placeholder="��ѡְ�����" readonly="readonly" style="border: none;outline: none;height: 30px;" name="qwznlb" id="qwznlb"   onclick="index_job(1,'#qwznlb','#job_post','left:100px;top:100px; position:absolute;','<?php echo $_smarty_tpl->tpl_vars['row']->value['job_post'];?>
');"/>
                                              <i class=""></i>
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">���������أ�</div>
                                          <div class="Search_jobs_more_chlose">
                                          <span class="Search_jobs_more_chlose_s">
                                              <?php if ($_GET['provinceid']) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']];?>

                                              <?php } else { ?>
                                                ��ѡ�����
                                              <?php }?>
                                          </span>
                                              <input type="hidden" class="inputre" name="hope_city" id="qwaddress">
                                              <i class=""></i>
                                              <div class="Search_jobs_more_chlose_hylist none">
                                                  <ul>
                                                      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                                      <li style="width: inherit;"><a class="Search_jobs_sub_a" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                                                      <?php } ?>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">�־�ס�أ�</div>
                                          <div class="Search_jobs_more_chlose">
                                          <span class="Search_jobs_more_chlose_s">
                                              <?php if ($_GET['provinceid']) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']];?>

                                              <?php } else { ?>
                                                ��ѡ��ǰ���ڵ���
                                              <?php }?>
                                          </span>
                                              <input type="hidden" class="inputre" name="location" id="qwcity">
                                              <i class=""></i>
                                              <div class="Search_jobs_more_chlose_hylist none">
                                                  <ul>
                                                      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                                      <li style="width: inherit;"><a class="Search_jobs_sub_a" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                                      <?php } ?>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">������н��</div>
                                          <div class="Search_jobs_sub" style="float: left;width: 130px;">
                                              <input type="text" class="Search_jobs_more_chlose inputkk" name="minsalary" id="salary_low" value="" placeholder="��" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                                          </div>
                                          <label class="heng" style="margin-left: 20px;"></label>
                                          <div class="Search_jobs_sub" style="float: left;width: 130px;">
                                              <input type="text" class="Search_jobs_more_chlose inputkk"  name="maxsalary" id="salary_up" value="" placeholder="��" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                                          </div>
                                          <span class="tips"></span>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">ѧ����</div>
                                          <div class="Search_jobs_more_chlose" style="width: 150px;">
                                          <span class="Search_jobs_more_chlose_s">
                                              <?php if ($_GET['edu']) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['edu']];?>

                                              <?php } else { ?>
                                                ����
                                              <?php }?>
                                          </span><i class=""></i>
                                              <input type="hidden" class="inputre" name="edu" id="edu">
                                              <div class="Search_jobs_more_chlose_list none"  style="width: 150px;">
                                                  <ul>
                                                      <li><a class="Search_jobs_sub_a " style="width: 130px;">����</a></li>
                                                      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                                      <li><a class="Search_jobs_cxz " style="width: 130px;" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</a></li>
                                                      <?php } ?>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">�������ޣ�</div>
                                          <div class="Search_jobs_more_chlose" style="width: 150px;">
                                          <span class="Search_jobs_more_chlose_s">
                                              <?php if ($_GET['edu']) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['edu']];?>

                                              <?php } else { ?>
                                                ����
                                              <?php }?>
                                          </span><i class=""></i>
                                              <input type="hidden" class="inputre" name="exp" id="exp_year">
                                              <div class="Search_jobs_more_chlose_list none" style="width: 150px;">
                                                  <ul>
                                                      <li><a class="Search_jobs_sub_a " style="width: 130px;">ȫ��</a></li>
                                                      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_work']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                                      <li><a class="Search_jobs_cxz " style="width: 130px;" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</a></li>
                                                      <?php } ?>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">���䣺</div>
                                          <div class="Search_jobs_sub" style="float: left;width: 130px;">
                                              <input type="text" class="Search_jobs_more_chlose inputkk" name="minage" id="age_low" value="" placeholder="��" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                                          </div>
                                          <label class="heng" style="margin-left: 20px;"></label>
                                          <div class="Search_jobs_sub" style="float: left;width: 130px;">
                                              <input type="text" class="Search_jobs_more_chlose inputkk"  name="maxage" id="age_up" value="" placeholder="��" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                                          </div>
                                          <span class="tips"></span>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">�Ա�</div>
                                          <div class="Search_jobs_more_chlose" style="width: 150px;">
                                          <span class="Search_jobs_more_chlose_s">
                                              <?php if ($_GET['edu']) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['edu']];?>

                                              <?php } else { ?>
                                                ����
                                              <?php }?>
                                          </span><i class=""></i>
                                              <input type="hidden" class="inputre" name="sex" id="sex">
                                              <div class="Search_jobs_more_chlose_list none" style="width: 150px;">
                                                  <ul>
                                                      <li><a class="Search_jobs_sub_a " style="width: 130px;">ȫ��</a></li>
                                                      <li><a class="Search_jobs_cxz " style="width: 130px;"  data-id="1">��</a></li>
                                                      <li><a class="Search_jobs_cxz " style="width: 130px;"  data-id="2">Ů</a></li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">��ְ״̬��</div>
                                          <div class="Search_jobs_more_chlose" style="width: 150px;">
                                          <span class="Search_jobs_more_chlose_s">
                                              <?php if ($_GET['edu']) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['edu']];?>

                                              <?php } else { ?>
                                                ��ְ״̬����
                                              <?php }?>
                                          </span><i class=""></i>
                                              <input type="hidden" class="inputre" name="status" id="qzzt">
                                              <div class="Search_jobs_more_chlose_list none" style="width: 150px;">
                                                  <ul>
                                                      <li><a class="Search_jobs_sub_a " style="width: 130px;">ȫ��</a></li>
                                                      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_jobstatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                                      <li><a class="Search_jobs_cxz " style="width: 130px;" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</a></li>
                                                      <?php } ?>
                                                      <!--<li><a class="Search_jobs_cxz " style="width: 130px;">��ְ����Ѱ�¹���</a></li>-->
                                                      <!--<li><a class="Search_jobs_cxz " style="width: 130px;">��ְ���������۴���</a></li>-->
                                                      <!--<li><a class="Search_jobs_cxz " style="width: 130px;">��ְ�������ҹ���</a></li>-->
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle"></div>
                                          <input type="submit" value="�����˲�" class="soubtn"  data-type="condition">
                                          <div class="baocundao">
                                              <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/daochu.png" style="vertical-align: middle;"/>
                                              ����Ϊ��������
                                          </div>
                                      </div>
                                  </div>
                                </form>
                                <form action="/member/index.php?c=resume" method="post">
                                  <div class="tiaojianitem" style="display: none;">
                                      <div class="hangtt" style="margin-top: 30px;">
                                          <div class="shaixuan zuostyle">������ţ�</div>
                                          <div class="Search_jobs_sub" style="float: left;width: 400px;">
                                              <input type="text" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 390px;" name="ids[]" value="<?php echo $_POST['id'];?>
" placeholder="������������" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">������ţ�</div>
                                          <div class="Search_jobs_sub" style="float: left;width: 400px;">
                                              <input type="text" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 390px;" name="ids[]" value="<?php echo $_POST['id'];?>
" placeholder="������������" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">������ţ�</div>
                                          <div class="Search_jobs_sub" style="float: left;width: 400px;">
                                              <input type="text" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 390px;" name="ids[]" value="<?php echo $_POST['id'];?>
" placeholder="������������" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">������ţ�</div>
                                          <div class="Search_jobs_sub" style="float: left;width: 400px;">
                                              <input type="text" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 390px;" name="ids[]" value="<?php echo $_POST['id'];?>
" placeholder="������������" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle">������ţ�</div>
                                          <div class="Search_jobs_sub" style="float: left;width: 400px;">
                                              <input type="text" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 390px;" name="ids[]" value="<?php echo $_POST['id'];?>
" placeholder="������������" onkeyup="value=value.replace(/[^\d]/g,'') " ng-pattern="/[^a-zA-Z]/">
                                          </div>
                                      </div>
                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle"></div>
                                          <input type="submit" value="�����˲�" class="soubtn"  data-type="id">
                                      </div>
                                  </div>
                                </form>

                                <form action="/member/index.php?c=resume" method="post">
                                  <div class="tiaojianitem" style="display: none;">
                                      <div class="hangtt" style="margin-top: 30px;">
                                          <div class="shaixuan zuostyle">��ѡ��������</div>
                                          <div class="Search_jobs_sub" style="float: left;width: 400px;">
                                              <input type="text" class="Search_jobs_more_chlose" style="padding-left: 10px;cursor: inherit;width: 390px;" name="uname" value="<?php echo $_POST['id'];?>
" placeholder="�������ѡ������">
                                          </div>
                                      </div>

                                      <div class="hangtt">
                                          <div class="shaixuan zuostyle"></div>
                                          <input type="submit" value="�����˲�" class="soubtn"  data-type="name">
                                      </div>
                                  </div>
                                </form>
                  </div>
          </div>

          </div>
    </div>
  </div>
</div>
</div>
<div  class="infoboxp22"  id="infobox2" style="display:none;">
    <div>
        <form action="" method="post" id="formstatus" target="supportiframe">
            <div class="jb_infobox" style="width: 100%;margin-top: 40px;margin-left: 36px;">
                <label class="pjnr">��������������</label>
                <input class="mingming" id="mingming" placeholder="��Ϊ��������������18�����ڣ�" maxlength="18"/>
            </div>
            <div class="jb_infobox" style="width: 100%;margin-top: 20px;">
                <button type="button"  value='1' class="submit_btn" id="mmbtn" style="margin-left: 170px;">ȷ��</button>
                <button type="button"  value='1' class="submit_btn cancel_btn" style="margin-left: 15px;">ȡ��</button>
            </div>
        </form>
    </div>
</div>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/searchbox.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/search.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/class.public.js"><?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
