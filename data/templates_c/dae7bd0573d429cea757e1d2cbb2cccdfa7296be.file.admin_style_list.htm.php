<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:02
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_style_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:18871123025afd4546bc8330-21064894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dae7bd0573d429cea757e1d2cbb2cccdfa7296be' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_style_list.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18871123025afd4546bc8330-21064894',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'list' => 0,
    'v' => 0,
    'sy_style' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd4546c0f3b8_81333467',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd4546c0f3b8_81333467')) {function content_5afd4546c0f3b8_81333467($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<div class="infoboxp_top infoboxp_topIjf">
    <span class="infoboxp_top_span">ģ�����</span>
	<span class="infoboxp_top_span_sz infoboxp_top_span_sz_in"><a href="index.php?m=admin_tpl">�л�ģ��</a></span> 
	<span class="infoboxp_top_span_sz"><a href="index.php?m=admin_tpl&c=comtpl">��ҵģ��</a></span> 
	<span class="infoboxp_top_span_sz "><a href="index.php?m=admin_tpl&c=resumetpl">����ģ��</a></span> 
	<span class="infoboxp_top_span_sz "><a href="index.php?m=admin_tpl&c=template">ģ�����</a></span> 
</div>
<div class="admin_Prompt">
<div class="admin_Prompt_span">
    <b>��ʾ��</b>����ģ�������Ǿ�̬ҳ�����������ɣ� ��<a href='http://www.phpyun.com/tpl.php' target="_blank">��ȡ����ģ��</a>��

</div><div class="admin_Prompt_close"></div></div>
<div class="table-list">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
<div style="float:left;width:240px;text-align:center;padding:15px;line-height:180%;border:1px solid #ddd;background:#fff;margin-right:10px;">
	  <img width="225" height="136" border="1" style="border: #ddd;" alt="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['v']->value['img'];?>
">
	  <br>
	 <strong><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</strong><?php if ($_smarty_tpl->tpl_vars['sy_style']->value==$_smarty_tpl->tpl_vars['v']->value['dir']) {?><font color="#FF0000">����ǰʹ�÷��</font><?php }?>
     <br>
     ������ߣ�<?php echo $_smarty_tpl->tpl_vars['v']->value['author'];?>

	 <br>
	���Ŀ¼���ƣ�<?php echo $_smarty_tpl->tpl_vars['v']->value['dir'];?>

      <br>
      <input name="" value="�����Ϣ�޸�" type="button" class="admin_submit6" onClick="location.href='index.php?m=admin_tpl&c=stylemodify&dir=<?php echo $_smarty_tpl->tpl_vars['v']->value['dir'];?>
'" >
    
        <input name="" value="ʹ�ø÷��" type="button" onClick="layer_del('ȷ������ģ��ָ��𣿸���������������ҳ�档','index.php?m=admin_tpl&c=check_style&dir=<?php echo $_smarty_tpl->tpl_vars['v']->value['dir'];?>
');" class="admin_submit6"/>
    
	 </div>
     <?php } ?> 
</div>
</div>
</body>
</html><?php }} ?>
