<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:06
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_email_config.htm" */ ?>
<?php /*%%SmartyHeaderCode:9479437235afd454ac65f89-03405227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '338a84b47169d66e00ac7c546b72099be2d65fc9' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_email_config.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9479437235afd454ac65f89-03405227',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'emailconfig' => 0,
    'eclist' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd454acd5417_06003757',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd454acd5417_06003757')) {function content_5afd454acd5417_06003757($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<title>后台管理</title>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div id="subboxdiv" style="width:100%;height:100%;display:none;position:absolute;"></div>
<div class="main_tag">
  <div class="infoboxp_top" style="z-index:600;position:relative;">	
	<div class="report_uaer_list"><span class="infoboxp_top_span">邮件设置</span>
	 <a href="index.php?m=emailconfig" class="report_uaer_list_on">邮件设置</a>
	 <a href="index.php?m=emailconfig&c=tpl">模板设置</a>
	<a href="index.php?m=emailconfig&c=alllist">邮件记录</a>
	  </div> 
  </div> 
   
<div class="tag_box">

<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
<form  target="supportiframe" name="myform" action="index.php?m=emailconfig&c=save" method="post"  onSubmit="return checkform(this);">

<table width="100%" class="table_form">
    <tr class="admin_table_trbg">
          <th width="200" bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
          <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
    </tr>
	<tr>
		<th width="200" style="width:160px;">邮件发送方式：</th>
		<td>
         <div class="iradio_flat_height">
              <input type="radio" name="sy_email_online" value="1" id="sy_email_online_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_email_online']=="1") {?>checked<?php }?>>
              <span class="iradio_flat_left"><label for="sy_email_online_0">SMTP服务器发送邮件</label>&nbsp;&nbsp;</span>
              
            </div>
            </td>
	</tr>
</table> 

<div id="emailtable">
<?php  $_smarty_tpl->tpl_vars['eclist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['eclist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['emailconfig']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['eclist']->key => $_smarty_tpl->tpl_vars['eclist']->value) {
$_smarty_tpl->tpl_vars['eclist']->_loop = true;
?>
<table width="100%" class="table_form">
	<tr class="email admin_table_trbg">
		<th width="200">SMTP服务器：</th>
		<td><input class="input-text tips_class" type="text" name="smtpserver_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['eclist']->value['smtpserver'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">如：smtp.qq.com</span></td>
	</tr>
	<tr class="email">
		<th width="200">SMTP服务器的用户邮箱：</th>
		<td><input class="input-text tips_class" type="text" name="smtpuser_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['eclist']->value['smtpuser'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">如：phpyun@qq.com</span></td>
	</tr>
	<tr class="email">
		<th width="200">邮箱密码：</th>
		<td><input class="input-text tips_class" type="password" name="smtppass_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
"  value="<?php echo $_smarty_tpl->tpl_vars['eclist']->value['smtppass'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">注：此处密码一般为邮箱独立的授权密码而并非原始邮箱密码，具体可查看各邮箱设置详细信息</span></td>
	</tr>
	<tr class="email admin_table_trbg">
		<th width="200">SMTP服务器端口: </th>
		<td><input class="input-text tips_class" type="text" name="smtpport_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['eclist']->value['smtpport'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">注：普通邮箱端口为25 企业邮箱端口为465，如使用465端口 请确保服务器开启SSL服务</span></td>
	</tr>
	<tr>
		<th width="200">发件人昵称: </th>
		<td><input class="input-text tips_class" type="text" name="smtpnick_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['eclist']->value['smtpnick'];?>
" size="30" maxlength="255"/></td>
	</tr>
	
	<tr class="admin_table_trbg">
            <th width="200">启用邮箱：</th>
            <td><div class="iradio_flat_height">
				<input id="default_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
_0" type="radio" <?php if ($_smarty_tpl->tpl_vars['eclist']->value['default']!='1') {?>checked=""<?php }?> value="0" name="default_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
">
				<span class="iradio_flat_left"><label for="default_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
_0">关闭</label>&nbsp;&nbsp;</span>
				<input id="default_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
_1" type="radio" <?php if ($_smarty_tpl->tpl_vars['eclist']->value['default']=='1') {?>checked=""<?php }?> value="1" name="default_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
">
				<span class="iradio_flat_left"><label for="default_<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
_1">开启</label></span>
                </div>
			</td>
        </tr>
	<input type='hidden' name='emailid[]' value='<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
'>
    <tr class="email admin_table_trbg">
      <th width="200">&nbsp;</th>
		<td align="left">
		<input class="admin_submit_bthy deleteconfig" data-id='<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
' type="button" value="删除" >&nbsp;&nbsp;
		<input class="admin_submit_bthy testconfig"  data-id='<?php echo $_smarty_tpl->tpl_vars['eclist']->value['id'];?>
' type="button"  value="测试"></td>
	</tr>
</table>


<?php }
if (!$_smarty_tpl->tpl_vars['eclist']->_loop) {
?>



<?php echo '<script'; ?>
>
$(function(){  
    
	$('#emailtable').append($('#appendconfig').html());

});   
<?php echo '</script'; ?>
>
<?php } ?>
</div>
<table width="100%" class="table_form">
	<tr class="email admin_table_trbg">
	 <th width="200">&nbsp;</th>
		<td align="left"><input class="admin_submit4"  type="submit" name="config" value="保存" />&nbsp;&nbsp;<input class="admin_submit4" type="button" value="新增" onclick="javascript:$('#emailtable').append($('#appendconfig').html());" />&nbsp;&nbsp;</td>
	</tr>
</table>
<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"> 
</form>
</div>
</div>



<div style="display:none;" id="appendconfig">
<table width="100%" class="table_form">

	<tr class="email admin_table_trbg">
		<th width="200">SMTP服务器：</th>
		<td><input class="input-text tips_class" type="text" name="smtpserver[]"  value="" size="30" maxlength="255"/><span class="admin_web_tip">如：smtp.qq.com</span></td>
	</tr>
	<tr class="email">
		<th width="200">SMTP服务器的用户邮箱：</th>
		<td><input class="input-text tips_class" type="text" name="smtpuser[]"  value="" size="30" maxlength="255"/><span class="admin_web_tip">如：phpyun@qq.com</span></td>
	</tr>
	<tr class="email">
		<th width="200">邮箱密码：</th>
		<td><input class="input-text tips_class" type="password" name="smtppass[]"  value="" size="30" maxlength="255"/><span class="admin_web_tip">注：此处密码一般为邮箱独立的授权密码而并非原始邮箱密码，具体可查看各邮箱设置详细信息</span></td>
	</tr>
	<tr class="email admin_table_trbg">
		<th width="200">SMTP服务器端口: </th>
		<td><input class="input-text tips_class" type="text" name="smtpport[]"  value="" size="30" maxlength="255"/><span class="admin_web_tip">注：普通邮箱端口为25 企业邮箱端口为465，如使用465端口 请确保服务器开启SSL服务</span></td>
	</tr>
	<tr>
		<th width="200">发件人昵称: </th>
		<td><input class="input-text tips_class" type="text" name="smtpnick[]"  value="" size="30" maxlength="255"/></td>
	</tr>
	
</table>
</div>

<?php echo '<script'; ?>
>
layer.use('extend/layer.ext.js')


$(function(){  
	$('.testconfig').click(function(){
		var id = $(this).attr('data-id');
		if(!id){
			layer.msg('请选择需要测试的邮件服务器！',2,8);
		}else{
			layer.prompt({height:'20px',title: '填写测试邮箱',top:'50px'}, function(value){ 
				if(value){
					var myreg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/;
					var pytoken=$("#pytoken").val();
					if(!myreg.test(value)){
						parent.layer.msg('邮箱格式不正确，请重新输入！', 2, 8);return false;
					}else{ 
						var ii = parent.layer.load('发送中…',0);
						$.post("index.php?m=emailconfig&c=ceshi",{ceshi_email:value,id:id,pytoken:pytoken},function(data){
							parent.layer.closeAll();
							var data=eval('('+data+')');
							parent.layer.close(ii);
							parent.layer.msg(data.msg, 2, Number(data.type));return false; 
						}); 
					}
				}else{
					parent.layer.msg('请输入邮箱！',2,8);return false; 
				} 
			})
		}
		
	});
	$('.deleteconfig').click(function(){
		var id = $(this).attr('data-id');
		if(!id){
			layer.msg('请选择需要删除的邮件服务器！',2,8);
		}else{
			var pytoken=$("#pytoken").val();
			layer.confirm("确定删除吗？",function(){
				var ii = layer.load('执行中…',0);
				$.post('index.php?m=emailconfig&c=delconfig',{id:id,pytoken:pytoken},function(data){
					layer.close(ii);
					var data=eval('('+data+')');
					layer.msg(data.msg, 2, Number(data.type),function(){location.reload();});
				})
			});
		
		}
	
	});

});   
<?php echo '</script'; ?>
>
</div>
</body>
</html><?php }} ?>
