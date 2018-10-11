<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:46
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_database.htm" */ ?>
<?php /*%%SmartyHeaderCode:20265526115afd4572d1c650-90713778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48ceeb2b9375c2381176dc4790be1f4afa5c9ae4' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_database.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20265526115afd4572d1c650-90713778',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'table' => 0,
    'key' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd4572d5f6a5_55079481',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd4572d5f6a5_55079481')) {function content_5afd4572d5f6a5_55079481($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<title>后台管理</title> 
</head>
<?php echo '<script'; ?>
>
function check_backup(){
	var chk_value =[];    
	$('input[name="table[]"]:checked').each(function(){    
		chk_value.push($(this).val());   
	});   
	if(chk_value.length==0){
		parent.layer.msg("请选择要备份的数据！",2,8);return false;
	}else{
		parent.layer.confirm("确定备份吗？",function(){
			parent.layer.closeAll();
			document.getElementById('myform').submit(); 
		});
	} 
}
<?php echo '</script'; ?>
>
<body class="body_ifm">
<div class="infoboxp">
    <div class="infoboxp_top_bg"></div>
    <div class="infoboxp_top infoboxp_topIjf" style="z-index:600;position:relative;">
    <div class="report_uaer_list">
         <span class="infoboxp_top_span">数据库管理</span>
          <a href="index.php?m=database" class="infoboxp_top_span_sz  infoboxp_top_span_sz_in" style="color:#fff">备份数据</a>
          <a href="index.php?m=database&c=backin">恢复数据</a>
          </div> 
    </div>



<div class="table-list">
<div class="admin_table_border">
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
<form action="index.php?m=database&c=backup" name="myform" method="post" target="_self" id='myform'>
<input type="hidden" name="pytoken" id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
<table width="100%">
<thead>
<tr class="admin_table_top">
<th>类型名称</th>
<th align="left">表</th>
<th align="left">数量</th>
<th>操作</th>

</tr>
<tbody>
<tr style="background:#f1f1f1;height:25px">
	<td align="center" width="30"><input type="checkbox" id='chkAll' onclick='CheckAll(this.form)' /></td>
    <td colspan="1" width="40">
    <label for="chkAll">全选</label>&nbsp;
    </td>
    <td >分卷大小(KB)：
	<input name="maxfilesize" value="500" type="text"  class="input-text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" style="width:180px;height:28px; line-height:28px;"><input name="button" value="备份" type="button" class="admin_submit4" onClick="return check_backup()">
    </td>
    <td>
	
    </td>
  </tr>
  
  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['table']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
  <tr align="center" <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
">
<td width="100"><input type="checkbox" name="table[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
"  onclick='unselectall()' style="margin-left:10px;"></td>
<td width="400" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
<td width="400" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['num'];?>
条</td>
<td> 
<a href="javascript:void(0)"class="admin_cz_sh" onClick="layer.confirm('确定要备份该表？',function(){location.href='index.php?m=database&c=sql&name=<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
&type=1'});" style="display:inline-block;width:40px;height:20px; line-height:20px; background:#1178c3; text-align:center;color:#fff">备份</a>  
        <a href="javascript:void(0)"class="admin_cz_bj" onclick="layer_del('',	'index.php?m=database&c=sql&name=<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
&type=2');"style="display:inline-block;width:40px;height:20px; line-height:20px; background:#1178c3; text-align:center;color:#fff; margin-left:5px;">修复</a>
        <a href="javascript:void(0)"class="admin_cz_sh" onclick="layer_del('', 'index.php?m=database&c=sql&name=<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
&type=3');"style="display:inline-block;width:40px;height:20px; line-height:20px; background:#1178c3; text-align:center;color:#fff; margin-left:5px;">优化</a></td>

  </tr>
 <?php } ?> 
 </tbody>
 </thead>
  </table>

</form>
</div>
</div>
</div>
<style>
	.admin_dbbak_tablelist{position:relative;}
	.admin_dbbak_operation{position:absolute; background-color:white; border:1px solid red; width:250px;}
</style>
</body>
</html><?php }} ?>
