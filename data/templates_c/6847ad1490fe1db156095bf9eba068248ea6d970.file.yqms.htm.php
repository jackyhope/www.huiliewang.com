<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 09:41:18
         compiled from "/home/wwwroot/www.huiliewang.com//app/template/member/lietou/yqms.htm" */ ?>
<?php /*%%SmartyHeaderCode:14118777105bbab5be797a36-20348851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6847ad1490fe1db156095bf9eba068248ea6d970' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com//app/template/member/lietou/yqms.htm',
      1 => 1519796680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14118777105bbab5be797a36-20348851',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company_job' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbab5be7aa806_32968463',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbab5be7aa806_32968463')) {function content_5bbab5be7aa806_32968463($_smarty_tpl) {?><div id='job_box' style="display:none;float:left">
  <div class="resume_yqbox">
    <dl><dt>面试职位：</dt><dd><div class="Interview_text_box">
<input type="button" value="请选择" class="Interview_text_box_t" id="name" onclick="search_show('job_name');">
<input type="hidden" id="nameid" name="name" value="">
<div class="Interview_text_box_list none" id="job_name" style="display: none;">
<ul>
    
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['company_job']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>  
<li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
', 'name', '<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
');"><?php echo mb_substr($_smarty_tpl->tpl_vars['v']->value['name'],0,12,'gbk');?>
</a></li>    
<?php } ?> 
 
</ul>
</div>
</div></dd></dl>
    <dl><dt>联系人：</dt><dd><input size='20'  id='linkman' value='' class="resume_yqbox_text"></dd></dl>
    <dl><dt>联系电话：</dt><dd><input size='20'  id='linktel' value='' class="resume_yqbox_text"></dd></dl>
    <dl><dt>面试时间：</dt><dd><input size='34' id='intertime' value='' class="resume_yqbox_text"></dd></dl>
    <dl><dt>面试地址：</dt><dd><input size='34' id='address' value='' class="resume_yqbox_text"></dd></dl>
    <dl><dt>面试备注：</dt><dd> <textarea id="content" cols="40" rows="5" class="resume_yqbox_textarea"></textarea></dd></dl>
    <dl  id="resume_job" style="height:40px;"><dt>&nbsp;</dt><dd> <input type="hidden" id="uid" value="">
        <input type="hidden" id="username" value="">
        <input class="resume_sub_yq" id="click_invite" type="button" value="邀请面试"  >
    </dd></dl>
    
  </div>
</div><?php }} ?>
