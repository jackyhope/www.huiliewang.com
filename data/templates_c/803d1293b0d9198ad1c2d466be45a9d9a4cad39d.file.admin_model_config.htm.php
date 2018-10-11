<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-18 15:39:09
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_model_config.htm" */ ?>
<?php /*%%SmartyHeaderCode:2067095595afe831d3efb47-63468228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '803d1293b0d9198ad1c2d466be45a9d9a4cad39d' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_model_config.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2067095595afe831d3efb47-63468228',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'newModel' => 0,
    'mconfig' => 0,
    'key' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afe831d4436b3_44614408',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afe831d4436b3_44614408')) {function content_5afe831d4436b3_44614408($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<?php echo '<script'; ?>
>
function tip(id){
	layer.tips('关闭模块后请在导航设置中对相应导航作隐藏或删除处理！', '#'+id,{time:2,guide: 2,style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC']});
	$(".xubox_layer").addClass("xubox_tips_border");
}
<?php echo '</script'; ?>
>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="admin_Prompt">
        <div class="admin_Prompt_span">
           提示：如果关闭模块，请对系统->导航管理里面删除或取消显示！
        </div>
        <div class="admin_Prompt_close"></div>
    </div>
<div id="subboxdiv" style="width:100%;height:100%;display:none;position:absolute;"></div>
<div class="infoboxp_top infoboxp_topIjf">
    <span class="infoboxp_top_span">模块设置</span>
</div>
<div class="main_tag">
<div class="clear"></div>
<div class="tag_box">
<div>
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
<form name="myform" target="supportiframe" action="index.php?m=model_config&c=save" method="post">
<table width="100%" class="table_form">
  <tr class="admin_table_trbg">
          <th width="220" bgcolor="#f0f6fb"><span class="admin_bold">模块名称</span></th>
          <td width="220" bgcolor="#f0f6fb"><span class="admin_bold">状态</span></td>
		  <td width="280" bgcolor="#f0f6fb"><span class="admin_bold">二级域名<span class="admin_web_tip">（无需http，未绑定则留空）</span></span></td>
		  <td width="280" bgcolor="#f0f6fb"><span class="admin_bold">指向目录<span class="admin_web_tip">（不填写,则使用默认路径）</span></span></td>
		  <td width="280" bgcolor="#f0f6fb"><span class="admin_bold">综合设置</span></td>
    </tr>
	<?php  $_smarty_tpl->tpl_vars['mconfig'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mconfig']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['newModel']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mconfig']->key => $_smarty_tpl->tpl_vars['mconfig']->value) {
$_smarty_tpl->tpl_vars['mconfig']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['mconfig']->key;
?>
	<tr class="admin_com_td_bg">
			<th width="220"><?php echo $_smarty_tpl->tpl_vars['mconfig']->value['value'];?>
：</th>
			<td>
			  <input type="radio" name="sy_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_web" value="1" id="sy_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_web1" <?php if ($_smarty_tpl->tpl_vars['mconfig']->value['web']=="1") {?>checked<?php }?>>
			  <span class="iradio_flat_left"><label for="sy_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_web1">开启</label>&nbsp;&nbsp;</span>
			  <input type="radio" name="sy_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_web" value="2" id="sy_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_web2" <?php if ($_smarty_tpl->tpl_vars['mconfig']->value['web']=="2") {?>checked<?php }?> onclick="tip('sy_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_web2');">
			  <span class="iradio_flat_left"><label for="sy_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_web2">关闭</label></span>
			</td>
			<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['mconfig']->value['domain'];?>
" class="input-text" size="40" name="sy_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
domain"></td>
			<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['mconfig']->value['dir'];?>
" class="input-text" size="20" name="sy_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
dir"></td>
			<td>
			<?php if ($_smarty_tpl->tpl_vars['key']->value!='error') {?>
			  <input type='button' value='导航设置' class='navset admin_submit4' data-config='<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
' data-name='<?php echo $_smarty_tpl->tpl_vars['mconfig']->value['value'];?>
'> 
			 <input type='button' class="seoset admin_submit4" value='SEO设置'  data-config='<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
'>
			  <?php }?>
			</td>
		</tr>
	<?php } ?>
    <input type="hidden" value="company"  name="sy_companydir">
    <tr class="admin_com_td_bg">
		<td colspan="4" align="center">
		<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input class="admin_submit4"  type="submit" name="config" value="保存" />&nbsp;&nbsp;
        <input class="admin_submit4" type="reset" value="重置" /></td>
	</tr>
</table>
</form>
</div>
</div>
</div>
</div>
<?php echo '<script'; ?>
>
$(function(){
	$('.navset').click(function(){
		var config = $(this).attr('data-config');
		var name = $(this).attr('data-name');
		$.layer({
			type : 2,
			fix: false,
			maxmin: false,
			shadeClose: true,
			title :'设置导航', 
			offset: [($(window).height() - 450)/2 + 'px', ''],
			closeBtn : [0 , true], 
			area : ['600px','440px'],
			zIndex: 999,
			iframe: {src:'index.php?m=model_config&c=setnav&config='+config+'&name='+name} 
		})
	});
	$('.seoset').click(function(){
		var config = $(this).attr('data-config');
		$.layer({
			type : 2,
			fix: false,
			maxmin: false,
			shadeClose: true,
			title :'设置SEO', 
			offset: [($(window).height() - 450)/2 + 'px', ''],
			closeBtn : [0 , true], 
			area : ['1000px','440px'],
			zIndex: 999,
			iframe: {src:'index.php?m=model_config&c=setseo&config='+config} 
		})
	});
});
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
