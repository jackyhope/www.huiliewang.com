<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:00
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_domain_config.htm" */ ?>
<?php /*%%SmartyHeaderCode:18415146745afd45445ddaa2-91013853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e52a4d685ce552e29afa31f6833765396e55b89' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_domain_config.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18415146745afd45445ddaa2-91013853',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd454461e492_43434776',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd454461e492_43434776')) {function content_5afd454461e492_43434776($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />  
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="../js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/admin_public.js" type="text/javascript"><?php echo '</script'; ?>
>
<link href="images/blue.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="js/icheck.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
	$(document).ready(function(){
	  $('input').iCheck({
		checkboxClass: 'icheckbox_flat-blue',
		radioClass: 'iradio_flat-blue'
	  });
	});
<?php echo '</script'; ?>
> 
<title>��̨����</title>
</head>
<body class="body_ifm">
<div class="infoboxp" style="position:relative;">
<div class="infoboxp_top_bg"></div>
  <div class="infoboxp_top" style="z-index:600;position:relative;">	
	<div class="report_uaer_list"><span class="infoboxp_top_span">��վ����</span>
	 <a href="index.php?m=admin_domain" class="report_uaer_list_on">��վ����</a>
	 <a href="index.php?m=admin_domain&c=alllist">��վ��¼</a> 
     <a href="index.php?m=admin_domain&c=AddDomain">��ӷ�վ</a> 
	  </div> 
  </div> 
<div class="main_tag" >
 
<div class="admin_table_border">
<div> 
<table width="100%" class="table_form">
<tr class="admin_table_trbg">
   <th width="160" bgcolor="#f0f6fb"><span class="admin_bold">����˵��</span></th>
          <td bgcolor="#f0f6fb"><span class="admin_bold">����ֵ</span></td>
   
</tr>
   
    <tr class="admin_table_trbg">
    	<th width="160">������վ��</th>
		<td>
          <div class="iradio_flat_height">
          <input type="radio" name="sy_web_site" value="1" id="RadioGroup3_12" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_web_site']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="RadioGroup3_12">����</label>&nbsp;&nbsp;</span>
          <input type="radio" name="sy_web_site" value="0" id="RadioGroup3_13" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_web_site']=="0") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="RadioGroup3_13">�ر�</label>&nbsp;&nbsp;</span>
          <span class="admin_web_tip">��ʾ����������в��Ұ�������֧��2��Ŀ¼�����ز����� http://localhost/phpyun �������������</span>
          </div></td>
       
    </tr>
    <tr class="admin_table_trbg">
    	<th width="220">��վ����IP�Զ���ת��</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="sy_gotocity" value="1" id="sy_gotocity_2" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_gotocity']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_linksq_2">����</label>&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_gotocity" value="0" id="sy_gotocity_3" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_gotocity']=="0") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_linksq_3">�ر�</label></span>
          </div>
        </td>
    </tr>
    <tr>
		<th width="160">�趨Ĭ�ϳ��У�</th>
		<td><input class="input-text" type="text" name="sy_indexcity" id="sy_indexcity" size="40" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_indexcity'];?>
"/><span class="admin_web_tip">��ʾ��������վ��Ĭ�ϳ��� �磺ȫ������վ</span></td>
       
	</tr>
    <tr class="admin_table_trbg">
		<th width="160">һ��������</th>
		<td><input class="input-text" type="text" name="sy_onedomain" id="sy_onedomain" size="40" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_onedomain'];?>
"/><span class="admin_web_tip">��ʾ�����Ĭ������Ϊ����������������дһ������</span></td>
     
	</tr> 
         
    <tr>
		<th width="160">Ĭ��������</th>
		<td><input class="input-text" type="text" name="sy_indexdomain" id="sy_indexdomain" size="40" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_indexdomain'];?>
"/><span class="admin_web_tip">��ʾ��Ĭ�ϳ��ж�Ӧ������ ��ȫվ��Ӧ���� http://www.hr135.com ������ beijing.hr135.com</span></td>
       
	</tr>
<tr>
		<td colspan="3" align="center">
		<input class="admin_submit4" id="config" type="button" name="config" value="�ύ">&nbsp;&nbsp;<input class="admin_submit4" type="reset" value="����"/>
		<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"></td>
	</tr>
</table>  
</div>   
  
</div>
</div>
<?php echo '<script'; ?>
>  
$(function(){   
	$("#config").click(function(){ 
		loadlayer();
		$.post("index.php?m=admin_domain&c=savecf",{
			config : $("#config").val(), 
			sy_indexcity: $("#sy_indexcity").val(),
			sy_onedomain: $("#sy_onedomain").val(), 
			sy_gotocity : $("input[name=sy_gotocity]:checked").val(),
			sy_indexdomain: $("#sy_indexdomain").val(),	
			pytoken : $("#pytoken").val(),
			sy_web_site: $("input[name=sy_web_site]:checked").val()
		},function(data,textStatus){ 
			config_msg(data); 
		});
	});
});
<?php echo '</script'; ?>
>
</div>
</body>
</html><?php }} ?>
