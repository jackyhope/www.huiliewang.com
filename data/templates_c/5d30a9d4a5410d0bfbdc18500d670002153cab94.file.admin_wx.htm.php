<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:02:59
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_wx.htm" */ ?>
<?php /*%%SmartyHeaderCode:12674926805afd45432064c1-51994289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d30a9d4a5410d0bfbdc18500d670002153cab94' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_wx.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12674926805afd45432064c1-51994289',
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
  'unifunc' => 'content_5afd454327d108_80551107',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd454327d108_80551107')) {function content_5afd454327d108_80551107($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<div class="infoboxp"><div class="infoboxp_top_bg"></div>
<div id="subboxdiv" style="width:100%;height:100%;display:none;position:absolute;"></div>
<div class="infoboxp_top">
	<span class="admin_title_span">微信公众号设置</span>
        <a href="index.php?m=wx&c=wxnav" class="admin_infoboxp_nav admin_infoboxp_gl">自定义菜单</a>
        <em class="admin-tit_line"></em>
        <a href="index.php?m=wx&c=wxqrcodelog" class="admin_infoboxp_nav admin_infoboxp_rz">微信登录日志</a>
       
		 <em class="admin-tit_line"></em>
        <a href="index.php?m=wx&c=binduser" class="admin_infoboxp_nav admin_infoboxp_lb">用户绑定列表</a>
        <em class="admin-tit_line"></em>
        <a href="index.php?m=wx&c=keyword" class="admin_infoboxp_nav admin_infoboxp_tag">搜索关键字</a>
        <em class="admin-tit_line"></em>
        <a href="index.php?m=wx&c=zdkeyword" class="admin_infoboxp_nav admin_infoboxp_tag">关键字自动回复</a>
</div>
<div class="main_tag">
<div class="admin_table_border">
    <div>
	<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
	<form name="myform" target="supportiframe" action="index.php?m=wx&c=save" method="post" enctype="multipart/form-data">
         <table width="100%" class="table_form">
            <tr class="admin_table_trbg">
        	<th colspan="2" bgcolor="#f0f6fb"><span class="admin_bold">微信公众号设置</span></th>
            </tr>
			 <tr>
                <th width="160">公众号：</th>
                <td><input class="input-text" type="text" name="wx_name" id="wx_name" size="30" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_name'];?>
" maxlength="255" ><font color="gray" style="display:none"></font></td>
            </tr>
             <tr>
                <th width="160">URL：</th>
                <td><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/weixin/index.php<font color="gray" style="display:none"></font></td>
            </tr>
          <tr>
                <th width="160">Token</th>
                <td><input class="input-text" type="text" name="wx_token" id="wx_token" size="30" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_token'];?>
" maxlength="255" ><font color="gray" style="display:none"></font></td>
            </tr>
              <tr class="admin_table_trbg">
                <td colspan="2" align="center">
                <input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"/>	
                <input class="admin_submit4" id="wxconfig" type="submit" name="msgconfig" value="提交" />&nbsp;&nbsp;<input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
        </table>
		</form>
             
             <form name="myform" target="supportiframe" action="index.php?m=wx&c=save" method="post" enctype="multipart/form-data">
             <table width="100%" class="table_form">
            <tr >
                <th colspan="2" bgcolor="#f0f6fb"><span class="admin_bold">开发者凭据</span></th>
            </tr>
          <tr>
                <th width="160">AppId：</th>
                <td><input class="input-text" type="text" name="wx_appid" id="wx_appid" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_appid'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">如：1002478xx</span></td>
            </tr>
            <tr>
                <th width="160">AppSecret：</th>
                <td><input class="input-text" type="text" name="wx_appsecret" id="wx_appsecret" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_appsecret'];?>
" size="30" maxlength="255"/><span class="admin_web_tip">如：4dd1c30d472676914f2fbfbnjt33</span></td>
            </tr>
            
          <tr class="admin_table_trbg">
                <td colspan="2" align="center">
                <input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"/>	
                <input class="admin_submit4" id="wxconfig" type="submit" name="msgconfig" value="提交" />&nbsp;&nbsp;<input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
        </table>
		</form>
             
             <form name="myform" target="supportiframe" action="index.php?m=wx&c=save" method="post" enctype="multipart/form-data">
             <table width="100%" class="table_form">
			
		<tr>
                <th colspan="2" bgcolor="#f0f6fb"><span class="admin_bold">体验设置</span></th>
            </tr>

			 <tr>
                <th width="160">关注欢迎语：</th>
                <td><textarea  name="wx_welcom"  rows="10" cols='40' maxlength="255" class="wx_search_textarea"><?php echo $_smarty_tpl->tpl_vars['config']->value['wx_welcom'];?>
</textarea></td>
            </tr>
			<tr>
                <th width="160">搜索提示：</th>
                <td><textarea  name="wx_search"  rows="10" cols='40'  maxlength="255" class="wx_search_textarea"><?php echo $_smarty_tpl->tpl_vars['config']->value['wx_search'];?>
</textarea></td>
            </tr>
			<tr>	
			<th width="160">公众号二维码：</th>
			<td><input  type="file" size="45" name="sy_wx_qcode" class="input-text input_text_bg">
				<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wx_qcode']) {?>
			<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wx_qcode'];?>
" style="max-width:200px">
			<?php }?>
			  </td>
			</tr>
			 <tr>	
			<th width="160">微信封面：<br>(360px X 100px)</th>
			<td><input  type="file" size="45" name="sy_wx_logo" class="input-text input_text_bg">
				<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wx_logo']) {?>
			<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wx_logo'];?>
" style="max-width:150px">
			<?php }?>
			  </td>
			</tr>
			<tr>       
                        <th width="160">微信分享图片：<br>(300px X 300px)</th>
                        <td><input  type="file" size="45" name="sy_wx_sharelogo" class="input-text input_text_bg">
                                <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wx_sharelogo']) {?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wx_sharelogo'];?>
" style="max-width:100px">
                        <?php }?>
                          </td>
                        </tr>
			<tr>
                <th width="160">微信手机登录：</th>
                <td>
                <div class="iradio_flat_height">
                <input type="radio" name="wx_rz" checked value='0' id="wx_rz_11">
                <span class="iradio_flat_left"><label for="wx_rz_11">否 </label>&nbsp;</span>
                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['wx_rz']=='1') {?>checked<?php }?> name="wx_rz" value='1' id="wx_rz_12">
                <span class="iradio_flat_left"><label for="wx_rz_12">是</label>&nbsp;</span>
				&nbsp;&nbsp;&nbsp;&nbsp;<span class="admin_web_tip">说明：必须为已认证的服务号</span>
                </div>
                </td>
            </tr>
			<tr>
                <th width="160">微信PC扫码登录：</th>
                <td>
                <div class="iradio_flat_height">
                <input type="radio" name="wx_author" <?php if ($_smarty_tpl->tpl_vars['config']->value['wx_author']!='1') {?>checked<?php }?> value='0' id="RadioGroup1_11">
                <span class="iradio_flat_left"><label for="RadioGroup1_11">否</label>&nbsp;</span>
                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['wx_author']=='1') {?>checked<?php }?> name="wx_author" value='1' id="RadioGroup1_12">
                <span class="iradio_flat_left"><label for="RadioGroup1_12">是</label>&nbsp;</span>
				&nbsp;&nbsp;&nbsp;&nbsp;<span class="admin_web_tip">说明：必须为已认证的服务号</span>
                </div>
				</td>
            </tr>
            
            <tr class="admin_table_trbg">
                <td colspan="2" align="center">
                <input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"/>	
                <input class="admin_submit4" id="wxconfig" type="submit" name="msgconfig" value="提交" />&nbsp;&nbsp;<input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
        </table>
		</form>
             
             <form name="myform" target="supportiframe" action="index.php?m=wx&c=save" method="post" enctype="multipart/form-data">
             <table width="100%" class="table_form">
			
		<tr>
                <th colspan="2" bgcolor="#f0f6fb"><span class="admin_bold">消息设置</span></th>
            </tr>
			<tr>
                <th width="160">微信消息通知：</th>
                <td>
                <div class="iradio_flat_height">
                <input type="radio" name="wx_xxtz" <?php if ($_smarty_tpl->tpl_vars['config']->value['wx_xxtz']!='1') {?>checked<?php }?> value='0' id="wx_xxtz_11">
                <span class="iradio_flat_left"><label for="wx_xxtz_11">不通知</label>&nbsp;</span>
                 <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['wx_xxtz']=='1') {?>checked<?php }?> name="wx_xxtz" value='1' id="wx_xxtz_12">
                 <span class="iradio_flat_left"><label for="wx_xxtz_12">通知</label>&nbsp;</span>
				<span class="admin_web_tip"><a href="http://www.phpyun.com/bbs/thread-10851-1-1.html" target="_blank">微信消息通知设置教程</a></span>
                </div>
				</td>
				
            </tr>

			
			 <tr  class="admin_table_trbg">
                <th width="160">职位申请模板：</th>
                <td><input class="input-text" type="text" name="wx_mbsqzw" id="wx_mbsqzw" size="90" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_mbsqzw'];?>
" maxlength="255" ><font color="gray" style="display:none"></font></td>
            </tr>
			<tr  class="admin_table_trbg">
                <th width="160">职位审核模板：</th>
                <td><input class="input-text" type="text" name="wx_mbzwsh" id="wx_mbzwsh" size="90" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_mbzwsh'];?>
" maxlength="255" ><font color="gray" style="display:none"></font></td>
            </tr>
			<tr  class="admin_table_trbg">
                <th width="160">邀请面试模板：</th>
                <td><input class="input-text" type="text" name="wx_mbyqms" id="wx_mbyqms" size="90" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_mbyqms'];?>
" maxlength="255" ><font color="gray" style="display:none"></font></td>
            </tr>
			<tr  class="admin_table_trbg">
                <th width="160">兼职报名模板：</th>
                <td><input class="input-text" type="text" name="wx_mbjzbm" id="wx_mbjzbm" size="90" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_mbjzbm'];?>
" maxlength="255" ><font color="gray" style="display:none"></font></td>
            </tr>
			<tr  class="admin_table_trbg">
                <th width="160">兼职审核模板：</th>
                <td><input class="input-text" type="text" name="wx_mbjzsh" id="wx_mbjzsh" size="90" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_mbjzsh'];?>
" maxlength="255" ><font color="gray" style="display:none"></font></td>
            </tr>
			<tr  class="admin_table_trbg">
                <th width="160">充值提醒模板：</th>
                <td><input class="input-text" type="text" name="wx_mbcztx" id="wx_mbcztx" size="90" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_mbcztx'];?>
" maxlength="255" ><font color="gray" style="display:none"></font></td>
            </tr>
			
            <tr class="admin_table_trbg">
                <td colspan="2" align="center">
                <input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"/>	
                <input class="admin_submit4" id="wxconfig" type="submit" name="msgconfig" value="提交" />&nbsp;&nbsp;<input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
        </table>
		</form>
		
    </div>
</div>
</div>
</div>
</body>
</html><?php }} ?>
