<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-05 18:04:33
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_user_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:9577312835b3ded3183f126-77798242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '707b0ed734d9d4295d1fbdd15df66cd76d864a2e' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_user_list.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9577312835b3ded3183f126-77798242',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'rows' => 0,
    'v' => 0,
    'pagenav' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b3ded31881d32_79791565',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3ded31881d32_79791565')) {function content_5b3ded31881d32_79791565($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<body class="body_ifm">
<div class="infoboxp"><div class="infoboxp_top_bg"></div>
<div class="admin_h1_bg infoboxp_topIjf">
<span class="infoboxp_top_span" style="float:left">管理员列表</span>
<a href="index.php?m=admin_user&c=add"  class="admin_infoboxp_tj">添加管理员</a>
</div>
<div class="clear"></div>
<div class="table-list">
  <div class="admin_table_border">
    <table width="100%">
      <thead>
        <tr class="admin_table_top">
          <th width="7%">编号</th>
          <th width="12%" align="left">登录名</th>
          <th width="12%" align="left">权限</th>
          <th width="12%" align="left">真实姓名</th>
          <th width="12%" class="admin_table_th_bg" align="left">操作</th>
        </tr>
      </thead>
      <tbody>
      
      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
      <tr>
        <td height="17" align="center" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
</td>
        <td align="left" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</td>
        <td align="left" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['v']->value['group_name'];?>
</td>
        <td align="left" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
        <td  align="left">
		
        <?php if ($_smarty_tpl->tpl_vars['v']->value['did']) {?><a href="index.php?m=admin_siteadmin&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"  class="admin_cz_bj">修改分站</a><?php } else { ?><a href="index.php?m=admin_user&c=add&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"  class="admin_cz_bj">修改</a><?php }?>

		| 
		<a href="javascript:;" onClick="layer_del('确定要删除？','index.php?m=admin_user&c=deluser&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">删除</a>
        </td>
      </tr>
      <?php } ?>
	  <tr>
	  <td colspan="5" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
          </tr>
        </tbody>
      
    </table>
  </div>
</div>
</div>
	<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</body>
</html><?php }} ?>
