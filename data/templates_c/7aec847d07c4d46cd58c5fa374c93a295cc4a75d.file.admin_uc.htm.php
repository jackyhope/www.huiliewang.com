<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:43
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_uc.htm" */ ?>
<?php /*%%SmartyHeaderCode:4120826065afd456ff02c90-48579054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7aec847d07c4d46cd58c5fa374c93a295cc4a75d' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_uc.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4120826065afd456ff02c90-48579054',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'ucinfo' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd45700126b2_85628736',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd45700126b2_85628736')) {function content_5afd45700126b2_85628736($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<link href="images/blue.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="js/icheck.js"><?php echo '</script'; ?>
>
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
<div class="admin_Prompt_span">
    <b>��ʾ��</b>�������ʧ�ܵ��º�̨�޷�������߳���ǰ̨�û����ң��뽫��Ŀ¼��/data/plus/config.php ���ҵ� sy_uc_type  ��ucenter�ÿ�,�ٵ�¼��̨�ر�UC����ؽ̳� ��<a href='http://www.phpyun.com/bbs/thread-4209-1-1.html' target="_blank">����鿴</a>��

</div><div class="admin_Prompt_close"></div></div>

<div class="infoboxp_top">
 <span class="admin_title_span">����UCenter</span>
<a href="index.php?m=admin_uc&c=pw" class="admin_infoboxp_tj">����PHPWIND</a>
</div>
<?php echo '<script'; ?>
>
function checkucform(){
	if(myform.UC_CONNECT.value=='' || myform.UC_DBHOST.value=='' || myform.UC_DBUSER.value==''|| myform.UC_DBNAME.value==''|| myform.UC_DBCHARSET.value==''|| myform.UC_DBTABLEPRE.value==''|| myform.UC_KEY.value==''|| myform.UC_API.value==''|| myform.UC_APPID.value==''|| myform.UC_APP.value=='')
	{
		layer.msg('��ȷ����Ϣ��д���ƣ�', 2, 8);
		return false;
	}
}
<?php echo '</script'; ?>
>
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
<div class="admin_table_border">
<form method="post" action="index.php?m=admin_uc&c=save" name="myform" target="supportiframe" onsubmit="return checkucform();">
	<table width="100%" class="table_form">
         <tr>
            <th width="220">������</th>
            <td  >
            <div class="iradio_flat_height">
              <input type="radio" name="sy_uc_type" value="uc_center" id="RadioGroup1_12" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_uc_type']=="uc_center") {?>checked<?php }?>>
              <span class="iradio_flat_left"><label for="RadioGroup1_12">����</label>&nbsp;</span>
              <input type="radio" name="sy_uc_type" value="" id="RadioGroup1_13" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_uc_type']!="uc_center") {?>checked<?php }?>>
              <span class="iradio_flat_left"><label for="RadioGroup1_13">�ر�</label></span>
              </div>
            </td>
        </tr>
            <tr>
            <th width="220">���ݿ��ַ UC_DBHOST��</th>
            <td style="background:#fff;"><input type="text" name="UC_DBHOST" class="input-text" size="40" value="<?php echo $_smarty_tpl->tpl_vars['ucinfo']->value['UC_DBHOST'];?>
"> 
            <span class="admin_web_tip">�磺localhost</span></td>
            </tr>
            <tr>
            <th>���ݿ��û��� UC_DBUSER��</th>
             <td style=" background:#fff;"><input type="text"  name="UC_DBUSER" class="input-text" size="40" value="<?php echo $_smarty_tpl->tpl_vars['ucinfo']->value['UC_DBUSER'];?>
"> <span class="admin_web_tip">ucenter���ݿ��û���</span></td>
            </tr>
            <tr>
           <th>���ݿ����� UC_DBPW��</th>
            <td style=" background:#fff;"><input type="text" name="UC_DBPW" class="input-text" size="40" value="<?php echo $_smarty_tpl->tpl_vars['ucinfo']->value['UC_DBPW'];?>
"> 
            <span class="admin_web_tip">ucenter���ݿ�����</span></td>
            </tr>
            <tr>
           <th>���ݿ����� UC_DBNAME��</th>
             <td style=" background:#fff;"><input type="text" name="UC_DBNAME" class="input-text" size="40" value="<?php echo $_smarty_tpl->tpl_vars['ucinfo']->value['UC_DBNAME'];?>
"> 
             <span class="admin_web_tip">�磺ucenter</span></td>
            </tr>
            <tr>
         <th>���ݱ�ǰ׺ UC_DBTABLEPRE��</th>
            <td style=" background:#fff;"><input type="text" name="UC_DBTABLEPRE_NEW" class="input-text" size="40" value="<?php echo $_smarty_tpl->tpl_vars['ucinfo']->value['UC_DBTABLEPRE_NEW'];?>
"> <span class="admin_web_tip">�磺pre_ucenter_</span></td>
            </tr>
            <tr>
           <th>ͨ����Կ UC_KEY��</th>
             <td style=" background:#fff;"><input type="text" name="UC_KEY" class="input-text" size="40" value="<?php echo $_smarty_tpl->tpl_vars['ucinfo']->value['UC_KEY'];?>
"> <span class="admin_web_tip">�磺phpyun123456</span></td>
            </tr>
            <tr>
           <th>Ucenter��ַ UC_API��</th>
            <td style=" background:#fff;"><input type="text" name="UC_API" class="input-text" size="60" value="<?php echo $_smarty_tpl->tpl_vars['ucinfo']->value['UC_API'];?>
"> <span class="admin_web_tip">�磺http://localhost/ucenter</span></td>
            </tr>
            <tr>
         <th>Ucenter���룺</th>
             <td style="background:#fff;">
            <div class="iradio_flat_height">
              <input type="radio" name="UC_CHARSET" value="utf8" id="UC_CHARSET_1" <?php if ($_smarty_tpl->tpl_vars['ucinfo']->value['UC_CHARSET']=="utf8") {?>checked<?php }?>>
              <span class="iradio_flat_left"><label for="UC_CHARSET_1">utf8</label>&nbsp;</span>
              <input type="radio" name="UC_CHARSET" value="gbk" id="UC_CHARSET_2" <?php if ($_smarty_tpl->tpl_vars['ucinfo']->value['UC_CHARSET']=="gbk") {?>checked<?php }?>>
              <span class="iradio_flat_left"><label for="UC_CHARSET_2">gbk</label></span>
              </div>
            </td>
        </tr>
            <tr>
            <th>Ӧ��ID UC_APPID��</th>
             <td style=" background:#fff;"><input type="text" name="UC_APPID" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['ucinfo']->value['UC_APPID'];?>
"> <span class="admin_web_tip">�磺7</span></td>
            </tr>
            <tr>
          <th>UC APP UC_APP��</th>
             <td style=" background:#fff;"><input type="text" name="UC_APP" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['ucinfo']->value['UC_APP'];?>
"> <span class="admin_web_tip">�磺20</span></td>
            </tr>
            <tr>
                <td align="center" colspan="2" style=" background:#fff;">
                 <input class="admin_submit4" type="submit" name="submit" value="&nbsp;����&nbsp;"  />  
                </td>
            </tr>
	</table> 
	<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</form>
</div> 
</div> 
</body>
</html><?php }} ?>
