<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:06
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_qq_config.htm" */ ?>
<?php /*%%SmartyHeaderCode:18313086875afd454a2298e5-20725216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b193beb546772c679f2cb5352774ae14e8bbbcd1' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_qq_config.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18313086875afd454a2298e5-20725216',
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
  'unifunc' => 'content_5afd454a272197_72022167',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd454a272197_72022167')) {function content_5afd454a272197_72022167($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<div class="admin_Prompt">
<div class="admin_Prompt_span">
    温馨提示：
    请先申请对应的接口再开启&nbsp;(<a href="http://connect.qq.com/" target="_blank">QQ开放平台</a> &nbsp;&nbsp; <a href="http://open.weibo.com" target="_blank">新浪开放平台</a> &nbsp;&nbsp; <a href="http://open.weixin.qq.com" target="_blank">微信开放平台</a>)
</div><div class="admin_Prompt_close"></div></div>
<div id="subboxdiv" style="width:100%;height:100%;display:none;position:absolute;"></div>
<div class="infoboxp_top"><h6>快捷登录设置</h6></div>
<div class="clear"></div>
<div class="main_tag">
  <div class="admin_table_border">
    <div>
        <table width="100%" class="table_form">
            <tr class="admin_table_trbg">
                <th width="140">QQ登录：</th>
                <td>
                 <div class="iradio_flat_height">
                  <input type="radio" name="sy_qqlogin" value="1" id="sy_qqlogin_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']=="1") {?>checked<?php }?>>
                  <span class="iradio_flat_left"><label for="sy_qqlogin_0">开启</label>&nbsp;&nbsp;</span>
                  <input type="radio" name="sy_qqlogin" value="0" id="sy_qqlogin_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']!="1") {?>checked<?php }?>>
                  <span class="iradio_flat_left"><label for="sy_qqlogin_1">关闭</label>&nbsp;&nbsp;</span>
                  </div>
                 </td>
            </tr>
            <tr class="admin_table_trbg">
                <th width="140">appid：</th>
                <td><input class="input-text" type="text" name="sy_qqappid" id="sy_qqappid" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_qqappid'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">如：1002478xx</span></td>
            </tr>
            <tr class="admin_table_trbg">
                <th width="140">appkey：</th>
                <td><input class="input-text" type="text" name="sy_qqappkey" id="sy_qqappkey" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_qqappkey'];?>
" size="40" maxlength="255"/><span class="admin_web_tip">如：4dd1c30d472676914f2fbfbnjt33</span></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input class="admin_submit4" id="qqconfig" type="button" name="qqconfig" value="提交" />&nbsp;&nbsp;<input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
        </table>
            
        <table width="100%" class="table_form">
            <tr>
                <th width="140">新浪微博登录：</th>
                <td>
                 <div class="iradio_flat_height">
                  <input type="radio" name="sy_sinalogin" value="1" id="sy_sinalogin_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']=="1") {?>checked<?php }?>>
                  <span class="iradio_flat_left"><label for="sy_sinalogin_0">开启</label>&nbsp;&nbsp;</span>
                  <input type="radio" name="sy_sinalogin" value="0" id="sy_sinalogin_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']!="1") {?>checked<?php }?>>
                  <span class="iradio_flat_left"><label for="sy_sinalogin_1">关闭</label>&nbsp;&nbsp;</span>
                  </div>
                 </td>
            </tr>
            <tr >
                <th width="140">App Key：</th>
                <td><input class="input-text" type="text" name="sy_sinaappid" id="sy_sinaappid" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_sinaappid'];?>
" size="30" maxlength="255"/></td>
            </tr>
            <tr>
                <th width="140">App Secret：</th>
                <td><input class="input-text" type="text" name="sy_sinaappkey" id="sy_sinaappkey" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_sinaappkey'];?>
" size="40" maxlength="255"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input class="admin_submit4" id="sinaconfig" type="button" name="msgconfig" value="提交" />&nbsp;&nbsp;<input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
        </table>
        
		<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
    </div>
</div>
</div>
</div>

<?php echo '<script'; ?>
>
$(function(){
	$("#qqconfig").click(function(){
		$.post("index.php?m=qqconfig&c=save",{
			config : $("#qqconfig").val(),
			sy_qqlogin : $("input[name=sy_qqlogin]:checked").val(),
			sy_qqappkey : $("#sy_qqappkey").val(),
			sy_qqappid : $("#sy_qqappid").val(),
			pytoken : $("#pytoken").val()
		},function(data,textStatus){
			config_msg(data);
		});
	});
	$("#sinaconfig").click(function(){
		$.post("index.php?m=qqconfig&c=save",{
			config : $("#sinaconfig").val(),
			sy_sinalogin : $("input[name=sy_sinalogin]:checked").val(),
			sy_sinaappkey : $("#sy_sinaappkey").val(),
			sy_sinaappid : $("#sy_sinaappid").val(),
			pytoken : $("#pytoken").val()
		},function(data,textStatus){
			config_msg(data);
		});
	});
	
})
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
