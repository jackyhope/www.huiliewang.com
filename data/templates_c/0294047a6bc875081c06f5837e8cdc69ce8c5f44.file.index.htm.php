<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-18 22:28:58
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/subscribe/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:2151618025ba10baa279045-25897035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0294047a6bc875081c06f5837e8cdc69ce8c5f44' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/subscribe/index.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2151618025ba10baa279045-25897035',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'config' => 0,
    'uid' => 0,
    'usertype' => 0,
    'info' => 0,
    'job_name' => 0,
    'job_index' => 0,
    'v' => 0,
    'job_type' => 0,
    'city_name' => 0,
    'city_index' => 0,
    'city_type' => 0,
    'cycle_time' => 0,
    'key' => 0,
    'clist' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ba10baa394666_00821269',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ba10baa394666_00821269')) {function content_5ba10baa394666_00821269($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name=keywords content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"/>
<meta name=description content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"/>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css"/>
</head>
<body style="background:#f8f8f8">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
<div class="current_Location com_current_Location png">
      <div class="fl">����ǰ��λ�ã�<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
">��ҳ</a> &gt; <span>����</span> </div>
    </div>
    <div class="subscribe_cont">
    <div class="subscribe_cont_h1">
    <span class="subscribe_cont_h1_p yun_text_color">ɸѡ����Ķ���������ʵ�־�׼ƥ��ĸ��Ի�����</span>���ǰ��������������˲ţ�
    </div>
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" class="none"></iframe>
<form name="myform" id="myform" method="post" target="supportiframe"  action="" onsubmit="return checksub();">
<?php if ($_smarty_tpl->tpl_vars['uid']->value) {?>
<input name='type' value="<?php if ($_smarty_tpl->tpl_vars['usertype']->value=='1') {?>1<?php } else { ?>2<?php }?>" type="hidden"/> 
<?php } else { ?>
<div class="subscribe_cont_list">.
<span class="subscribe_cont_list_name">�������ͣ�</span>
<span class="post_read_chose post_read_chose_w70"><input type="radio" value="1" name="type" checked="checked" class="post_read_radio" id="subjob"><label for="subjob">����ְλ</lable></span> 
<span class="post_read_chose  post_read_chose_w70"><input type="radio" value="2" name="type" class="post_read_radio"id="subresume"><label for="subresume">���ļ���</lable></span> 
</div>
<?php }?>
<div class="subscribe_cont_list"><span class="subscribe_cont_list_name">ְλ���</span>
<div class="post_read_text post_read_text_re10">
<input type="button" value="<?php if ($_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['info']->value['job1']]) {
echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['info']->value['job1']];
} else { ?>��ѡ��<?php }?>" class="post_read_button" id="button_job1" onclick="check_class('job1');"/>
<input type="hidden" name="job1" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['job1'];?>
" />
<div class="post_read_text_box none" id="job1">
<ul class="post_read_text_box_list">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<li><a href="javascript:check_input('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','job1');"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
<?php } ?>
</ul>
</div>
</div>
<div class="post_read_text post_read_text_re10" id="job1_son_list">
<input type="button" value="<?php if ($_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['info']->value['job1_son']]) {
echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['info']->value['job1_son']];
} else { ?>��ѡ��<?php }?>" class="post_read_button" id="button_job1_son" onclick="check_class('job1_son');"/>
<input type="hidden" name="job1_son" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['job1_son'];?>
" />
<div class="post_read_text_box post_read_text_box_198 none" id="job1_son">
<ul class="post_read_text_box_list">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['info']->value['job1']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<li><a href="javascript:check_input('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','job1_son');"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
<?php } ?>
</ul>
</div>
</div>
<div class="post_read_text post_read_text_re10" id="job_post_list">
<input type="button" value="<?php if ($_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['info']->value['job_post']]) {
echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['info']->value['job_post']];
} else { ?>��ѡ��<?php }?>" class="post_read_button" id="button_job_post" onclick="check_class('job_post');"/>
<input type="hidden" name="job_post" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['job_post'];?>
" />
<div class="post_read_text_box post_read_text_box_395 none" id="job_post">
<ul class="post_read_text_box_list">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['info']->value['job1_son']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<li><a href="javascript:check_input('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','job_post');"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
<?php } ?>
</ul>
</div>
</div>

</div>
<div class="subscribe_cont_list"><span class="subscribe_cont_list_name">���ڳ��У�</span>
<div class="post_read_text post_read_text_re9">
<input type="button" value="<?php if ($_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['info']->value['provinceid']]) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['info']->value['provinceid']];
} else { ?>��ѡ��<?php }?>" class="post_read_button" id="button_provinceid" onclick="check_class('provinceid');"/>
<input type="hidden" name="provinceid" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['provinceid'];?>
" />
<div class="post_read_text_box none" id="provinceid">
<ul class="post_read_text_box_list">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<li><a href="javascript:check_input('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','provinceid');"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
<?php } ?>
</ul>
</div>
</div>
<div class="post_read_text post_read_text_re9" id="cityid_list">
<input type="button" value="<?php if ($_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['info']->value['cityid']]) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['info']->value['cityid']];
} else { ?>��ѡ��<?php }?>" class="post_read_button" id="button_cityid" onclick="check_class('cityid');"/>
<input type="hidden" name="cityid" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['cityid'];?>
" />
<div class="post_read_text_box post_read_text_box_198 none" id="cityid">
<ul class="post_read_text_box_list">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['info']->value['provinceid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
<li><a href="javascript:check_input('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','cityid');"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
<?php } ?>
</ul>
</div>
</div>
<div class="post_read_text post_read_text_re9 <?php if ($_smarty_tpl->tpl_vars['info']->value['three_cityid']<1) {?>none<?php }?>" id="three_cityid_list">
<input type="button" value="<?php if ($_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['info']->value['three_cityid']]) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['info']->value['three_cityid']];
} else { ?>��ѡ��<?php }?>" class="post_read_button" id="button_three_cityid" onclick="check_class('three_cityid');"/>
<input type="hidden" name="three_cityid" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['three_cityid'];?>
" />
<div class="post_read_text_box post_read_text_box_395 none" id="three_cityid">
<ul class="post_read_text_box_list">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['info']->value['cityid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
<li><a href="javascript:check_input('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','three_cityid');"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
<?php } ?>
</ul>
</div>
</div>
</div>
<div class="subscribe_cont_list"><span class="subscribe_cont_list_name">��н��Χ��</span>
	<div>
		<input type="text" id="minsalary" name="minsalary" size="5" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['minsalary'];?>
" class="sub_xz_text" />
		<span class="sub_xz_text_line">-</span>
		<input type="text" id="maxsalary" name="maxsalary" size="5" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['maxsalary'];?>
"class="sub_xz_text" />
	</div>
</div>
<div class="subscribe_cont_list"><span class="subscribe_cont_list_name">����ʱ�䣺</span>
<div class="post_read_text_big post_read_text_re3">
<input type="button" value="<?php if ($_smarty_tpl->tpl_vars['cycle_time']->value[$_smarty_tpl->tpl_vars['info']->value['cycle_time']]) {
echo $_smarty_tpl->tpl_vars['cycle_time']->value[$_smarty_tpl->tpl_vars['info']->value['cycle_time']];
} else { ?>��ѡ��<?php }?>" class="post_read_button_big" id="button_cycle_time" onclick="check_class('cycle_time');"/>
<input type="hidden" name="cycle_time" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['cycle_time'];?>
" />
<div class="post_read_text_box none" id="cycle_time">
<ul class="post_read_text_box_list">
<?php  $_smarty_tpl->tpl_vars['clist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['clist']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cycle_time']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['clist']->key => $_smarty_tpl->tpl_vars['clist']->value) {
$_smarty_tpl->tpl_vars['clist']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['clist']->key;
?>
<li><a href="javascript:check_input('<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['clist']->value;?>
','cycle_time');"><?php echo $_smarty_tpl->tpl_vars['clist']->value;?>
</a></li>
<?php } ?> 
</ul>
</div>
</div>

</div>
<?php if ($_smarty_tpl->tpl_vars['email']->value['email_status']=='0'||!$_smarty_tpl->tpl_vars['email']->value['email']) {?>
<div class="subscribe_cont_list"><span class="subscribe_cont_list_name">�������䣺</span>
<input  class="post_read_valid" type="text" value="<?php if ($_smarty_tpl->tpl_vars['info']->value['email']) {
echo $_smarty_tpl->tpl_vars['info']->value['email'];
} elseif ($_smarty_tpl->tpl_vars['email']->value['email']) {
echo $_smarty_tpl->tpl_vars['email']->value['email'];
} else { ?>�������������<?php }?>" name="email" onblur="if(this.value==''){this.value='�������������'}" onclick="if(this.value=='�������������'){this.value=''}"/>
<div class="subscribe_cont_tips">
���ǻ��ϸ��������ĵ��������������ʼ����������ĸ�����Ϣ���Ա��ܡ�</div></div>
<?php } else { ?>
<div class="subscribe_cont_list"><span class="subscribe_cont_list_name">�������䣺</span>
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['email']->value['email'];?>
" name="email"/> 
<span class="info_email_ok" style="float:left;line-height:38px"><?php echo $_smarty_tpl->tpl_vars['email']->value['email'];?>
</span>
<a style="color:#1178c3;line-height:38px;margin-left:10px" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=binding">������֤</a>
</div>
<?php }?>
<div class="subscribe_cont_list"><span class="subscribe_cont_list_name">�������ڣ�</span>
<input type="hidden" id="timeid" name="time" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['time'];?>
" />
<span class="m_name_tag <?php if ($_smarty_tpl->tpl_vars['info']->value['time']==1) {?>m_name_tag01<?php }?> time" onclick="ck_box('1','time')" id="time1">ÿ�� </span> 
<span class="m_name_tag <?php if ($_smarty_tpl->tpl_vars['info']->value['time']==3) {?>m_name_tag01<?php }?> time" onclick="ck_box('3','time')" id="time3">3�� </span> 
<span class="m_name_tag <?php if ($_smarty_tpl->tpl_vars['info']->value['time']==7) {?>m_name_tag01<?php }?> time" onclick="ck_box('7','time')" id="time7">7��</span> 
</div>
<div class="subscribe_cont_bth">
<div class="subscribe_cont_list"><span class="subscribe_cont_list_name">&nbsp;</span>
<input name='sid' type='hidden' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
'/>
<input type="submit" name="submit" value="����"  class="post_read_bth1"/>
<input type="button" value="����" onclick="clear_form();" class="post_read_bth2"/></div>
</div>
</form>
</div>
</div>    
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/subscribe.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/member_public.js"><?php echo '</script'; ?>
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
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php }} ?>
