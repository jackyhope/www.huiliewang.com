<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-25 17:53:41
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_ad_preview.htm" */ ?>
<?php /*%%SmartyHeaderCode:7213494495b07dd25ed2366-73770470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6821bcb502f241f3e4b3eb221b87ccc25e447e4b' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_ad_preview.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7213494495b07dd25ed2366-73770470',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'ad' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b07dd25f143f0_98596163',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b07dd25f143f0_98596163')) {function content_5b07dd25f143f0_98596163($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
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
<div id="wname"  style="display:none; width: 350px; ">
  <div style="height: 160px;" class="job_box_div">
    <div class="job_box_inp">
      <table class="table_form "style="width:100%">
        <tr >
          <td  class='ui_content_wrap'>����(CTRL+C)�����ݲ���ӵ�ģ����</td>
        </tr>
        <tr>
          <td><input type="text" name="position" id='copy_url' class="input-text" size='45' style="width:310px;"/></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="infoboxp_top">
  <h6>���Ԥ��</h6>
</div>
<div class="admin_table_border">
<table width="100%" class="table_form">
<tbody>
  <tr>
    <th align="right"  width="230">�����ô��룺</th>
    <td><div class="yun_admin_divh"><?php if ($_smarty_tpl->tpl_vars['ad']->value['is_end']=='1') {?>
      ����ѹ��ڣ����ɵ��á�
      <?php } elseif ($_smarty_tpl->tpl_vars['ad']->value['is_open']=='0') {?>
      ���ͣ�ã����ɵ���
      <?php } else { ?> <a href="javascript:void(0);" onclick="copy_url('�ڲ�����','{yun\:}ad cid=<?php echo $_smarty_tpl->tpl_vars['ad']->value['class_id'];?>
 id=<?php echo $_smarty_tpl->tpl_vars['ad']->value['id'];?>
{\/yun}')">�ڲ�����</a> | <a href="javascript:void(0);" onclick="copy_url('�ⲿ����','&lt;script src=\'<?php echo $_smarty_tpl->tpl_vars['ad']->value['src'];?>
\' language=\'javascript\'&gt;&lt;/script&gt;')">�ⲿ����</a> <?php }?></div></td>
  </tr>
  <tr>
    <th align="right"  width="230">�����÷�ʽ��</th>
    <td><div class="yun_admin_divh">��JS���븴�� ճ������ҪͶ�Ÿù���ҳ�棨������<a href="index.php?m=admin_tpl&c=template"><font color="#FF0000">��̨ģ�������</font></a>�޸ģ�</div></td>
  </tr>
  <tr>
    <th align="right"  width="230">���Ԥ����</th>
    <td><div style="padding:10px 0;"><?php echo $_smarty_tpl->tpl_vars['ad']->value['html'];?>
</div></td>
  </tr>
</tbody>
<table>
</div>
</div>
</body>
</html><?php }} ?>
