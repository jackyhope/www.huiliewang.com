<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-05 18:04:26
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_cron_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:13039854895b3ded2a319aa5-96843749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8c4cdc5e26638a4e088083353f03ea0a160f6b5' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_cron_list.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13039854895b3ded2a319aa5-96843749',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'rows' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b3ded2a375425_55628673',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3ded2a375425_55628673')) {function content_5b3ded2a375425_55628673($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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

<title>��̨����</title>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="infoboxp_top">
   <span class="admin_title_span">�ƻ�����</span>
  <a href="index.php?m=cron&c=add"  class="admin_infoboxp_tj">���Ӽƻ�����</a>
</div>
<div class="table-list">
  <div class="admin_table_border">
    <form action="" name="myform" method="get">
    <input type="hidden" name="pytoken" id='pytoken'  value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      <table width="100%">
        <thead>
          <tr class="admin_table_top">
            <th align="left">��������</th>
            <th align="left">ִ���ļ�</th>
            <th align="left">ִ������</th>
            <th align="left">�Ƿ�ִ��</th>
            <th align="left">�ϴ�ִ��ʱ��</th>
            <th align="left">�´�ִ��ʱ��</th>
            <th>����</th>
          </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <tr align="left">
              <td align="left" class="td1"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span></td>
              <td  align="left" class="ud"><?php echo $_smarty_tpl->tpl_vars['v']->value['dir'];?>
</td>
              <td class="ud" align="left">
                <?php if ($_smarty_tpl->tpl_vars['v']->value['type']==1) {?>ÿ��<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['type']==2) {?>ÿ��<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['type']==3) {?>ÿ��<?php }?>
               </td>
              <td class="od" align="left"> 
                <?php if ($_smarty_tpl->tpl_vars['v']->value['display']==1) {?>��<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['display']==2) {?>��<?php }?>
              </td>
              <td  align="left" class="ud"><?php if ($_smarty_tpl->tpl_vars['v']->value['nowtime']) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['nowtime'],"%Y-%m-%d %H:%M");
} else { ?>- -<?php }?></td>
              <td  align="left" class="ud"><?php if ($_smarty_tpl->tpl_vars['v']->value['nexttime']) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['nexttime'],"%Y-%m-%d %H:%M");
} else { ?>- -<?php }?></td>
              <td align="center"> 
        <a href="javascript:void(0)" onclick="layer_del('ȷ������ִ�и�����', 'index.php?m=cron&c=run&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_cz_sc">ִ��</a> | 
		<a href="index.php?m=cron&c=add&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"class="admin_cz_bj">�޸�</a> |
		<a href="javascript:void(0)" onclick="layer_del('ȷ��Ҫɾ����', 'index.php?m=cron&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_cz_sc">ɾ��</a>
        </td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
    </form>
  </div>
</div>
</body>
</html><?php }} ?>