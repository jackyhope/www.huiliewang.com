<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:10
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_msg_config.htm" */ ?>
<?php /*%%SmartyHeaderCode:20320132525afd454e282cf7-76577524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45b7715ba64ee3a749c3e7e25c430cb766c8c797' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_msg_config.htm',
      1 => 1517974072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20320132525afd454e282cf7-76577524',
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
  'unifunc' => 'content_5afd454e2cdd07_29493468',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd454e2cdd07_29493468')) {function content_5afd454e2cdd07_29493468($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/admin_public.js" language="javascript"><?php echo '</script'; ?>
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
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>


<div class="admin_Prompt">
<div class="admin_Prompt_span"> ��ʾ������ע���ʻ� ��������֧�ֳ����ţ����500���֣�65���ְ�һ�����żƷѡ� </div>
<div class="admin_Prompt_close"></div>
</div> 
<div id="subboxdiv" style="width:100%;height:100%;display:none;position:absolute;"></div>
<div class="main_tag">
<div class="infoboxp_top" style="z-index:600;position:relative;">	
	<div class="report_uaer_list"><span class="infoboxp_top_span">��������</span>
	 <a href="index.php?m=msgconfig" class="report_uaer_list_on">��������</a>
	 <a href="index.php?m=msgconfig&c=tpl">ģ������</a>
	<a href="index.php?m=msgconfig&c=alllist">���ż�¼</a>
	  </div> 
  </div> 

 
<div class="tag_box">
 <div>
    <form action="" method="post">
    <table width="100%" class="table_form">
         <tr>
                 <th width="200" bgcolor="#f0f6fb"><span class="admin_bold">����˵��</span></th>
          <td bgcolor="#f0f6fb"><span class="admin_bold">����ֵ</span></td>
         </tr>
		<tr class="admin_table_trbg">
            <th width="200">�Ƿ�����</th>
            <td><div class="iradio_flat_height">
				<input id="sy_msg_isopen_1" type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_msg_isopen']=='1') {?>checked=""<?php }?> value="1" name="sy_msg_isopen">
				<span class="iradio_flat_left"><label for="sy_msg_isopen_1">����</label>&nbsp;&nbsp;</span>
				<input id="sy_msg_isopen_2" type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_msg_isopen']!='1') {?>checked=""<?php }?> value="2" name="sy_msg_isopen">
				<span class="iradio_flat_left"><label for="sy_msg_isopen_2">�ر�</label></span>
                </div>
			</td>
        </tr>
        <tr class="admin_table_trbg">
            <th width="200">�ʻ���</th>
            <td><input class="input-text tips_class" type="text" name="sy_msguser" id="sy_msguser" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_msguser'];?>
" size="30" maxlength="255" />  </td>
        </tr>
 		<tr>
            <th width="200">���룺</th>
            <td><input class="input-text tips_class" type="password" name="sy_msgpw" id="sy_msgpw" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_msgpw'];?>
" size="30" maxlength="255"/>  
        </tr>
        <tr class="admin_table_trbg">
            <th width="200">KEY��</th>
            <td><input class="input-text tips_class" type="text" name="sy_msgkey" id="sy_msgkey" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_msgkey'];?>
" size="50" maxlength="255"/>    
        </tr>
        <tr>
            <th width="200">���κ�������</th>
            <td><input class="input-text input_text_rp" type="text" name="sy_msgsendnum" id="sy_msgsendnum" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_msgsendnum'];?>
" size="30" maxlength="255"/>��    <span class="admin_web_tip">��С��Ϊ1��</span></td>
        </tr> 
 		<tr  class="admin_table_trbg">
            <th width="200">ͬһIPһ�췢�Ͷ��ţ�</th>
            <td><input class="input-text  input_text_rp" type="text" name="ip_msgnum" id="ip_msgnum" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['ip_msgnum'];?>
" size="30" maxlength="255"/>��</td>
        </tr>
 		<tr>
            <th width="160">ͬһ�ֻ���һ�췢�Ͷ��ţ�</th>
            <td><input class="input-text input_text_rp" type="text" name="moblie_msgnum" id="moblie_msgnum" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['moblie_msgnum'];?>
" size="30" maxlength="255"/>��</td>
        </tr>
        <tr  class="admin_table_trbg">
            <th width="200">������ţ�</th>
            <td><div class="yun_admin_divh"><a href="http://msg.phpyun.com/" target="_blank" style=" color:#CC3300; text-decoration:underline; "> ������ŵ�ַ</a></div></td>
         </tr>
		 <tr>
            <th width="160">ʣ�����������</th>
            <td><input class="input-text input_text_rp" type="text" name="rest_msgnum" id="rest_msgnum" value="0" disabled="disabled"/>��</td>
        </tr>
  		 <tr>
            <td colspan="2" align="center"><input class="admin_submit4" id="config" type="button" name="msgconfig" value="�ύ" />&nbsp;&nbsp;<input class="admin_submit4" type="reset" value="����" /></td>
        </tr>
    </table>
    <input type="hidden" id="pytoken" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
    </form>

</div>

</div>
</div>
<?php echo '<script'; ?>
>
$(function(){
	$("#config").click(function(){
		$.post("index.php?m=msgconfig&c=save",{
			config : $("#config").val(),
			sy_msguser : $("#sy_msguser").val(),
			sy_msg_isopen : $("input[name=sy_msg_isopen]:checked").val(),
			sy_msgkey :$("#sy_msgkey").val(),
			pytoken : $("#pytoken").val(),
			sy_msgpw : $("#sy_msgpw").val(),
			sy_msgsendnum : $("#sy_msgsendnum").val(),
			ip_msgnum : $("#ip_msgnum").val(),
			moblie_msgnum : $("#moblie_msgnum").val(),
			integral_msg_proportion : $("#integral_msg_proportion").val()
		},function(data,textStatus){
			config_msg(data);
		});
	});
	$.post("index.php?m=msgconfig&c=get_restnum",{pytoken : $("#pytoken").val(),msguser : $("#sy_msguser").val()},function(data){
	    if(data){
	        $("#rest_msgnum").val(data);
	    }
	});
})
<?php echo '</script'; ?>
>
</div>
</body>
</html><?php }} ?>
