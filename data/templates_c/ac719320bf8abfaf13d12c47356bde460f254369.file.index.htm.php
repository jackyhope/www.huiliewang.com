<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-07 08:52:16
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/error/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:1533375665bb958c0269b62-27198703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac719320bf8abfaf13d12c47356bde460f254369' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/error/index.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1533375665bb958c0269b62-27198703',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb958c054a262_12166477',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb958c054a262_12166477')) {function content_5bb958c054a262_12166477($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"/>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/error.css" type="text/css"/>
</head>
<body onLoad="TimeOut('10')">
<div class="index_w1000 error_box">
  <div class="error_img"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/error_01.png"></div>
  <div class="error_text">
    <h3>�ܱ�Ǹ�������ʵ�ҳ�治���ڡ���</h3>
    <div class="error_h"><span id="times">10</span>����Զ���ת����ҳ����û����ת������������</div>
    <div class="error_h">
      <input class="error_bth" value="������ҳ " type="button" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
'">
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
>
function TimeOut(i){
	if(i>1){
		i=i-1;
		$("#times").html(i);
		setTimeout("TimeOut("+i+");",1000);
	}else{
		window.location.href='<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
';
	}
} 
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>