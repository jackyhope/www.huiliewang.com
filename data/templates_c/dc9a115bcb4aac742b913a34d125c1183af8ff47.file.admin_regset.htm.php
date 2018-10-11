<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:03
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_regset.htm" */ ?>
<?php /*%%SmartyHeaderCode:17374540565afd454799d268-84206766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc9a115bcb4aac742b913a34d125c1183af8ff47' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_regset.htm',
      1 => 1517974490,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17374540565afd454799d268-84206766',
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
  'unifunc' => 'content_5afd4547a51a04_46926980',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd4547a51a04_46926980')) {function content_5afd4547a51a04_46926980($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />  
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="../js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/admin_public.js" type="text/javascript"><?php echo '</script'; ?>
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
<div class="infoboxp" style="position:relative;">
<div class="infoboxp_top_bg"></div>
<div id="subboxdiv" style="width:100%;height:100%;display:none;position:absolute; z-index:10000"></div>
<div class="main_tag" >
<div class="admin_h1_bg"> 
<span class="infoboxp_top_span infoboxp_top_wz">注册设置</span>
</div>
<div class="tag_box">

<div class=""> 
    <table width="100%" class="table_form">
     <tr>
              <th width="160" bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
          <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
    </tr>
		<!--<tr>
		<th width="160">快速注册：</th>
		<td>
        <div class="iradio_flat_height">
        
		    <input type="radio" name="reg_fast" value="0" id="reg_fast_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_fast']=="0") {?>checked<?php }?>>
		    <span class="iradio_flat_left"><label for="reg_fast_0">关闭</label>&nbsp;&nbsp;</span>
            
            
		    <input type="radio" name="reg_fast" value="1" id="reg_fast_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_fast']=="1") {?>checked<?php }?>>
		    <span class="iradio_flat_left"><label for="reg_fast_1">开启</label>&nbsp;&nbsp;</span>
            </div>
		  </td>
		</tr>-->
		<tr class="admin_table_trbg">
		<th width="160">手机注册：</th>
		<td>
        <div class="iradio_flat_height">
		    <input type="radio" name="reg_moblie" value="0" id="reg_moblie_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_moblie']=="0") {?>checked<?php }?>>
		    <span class="iradio_flat_left"><label for="reg_moblie_0">关闭</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_moblie" value="1" id="reg_moblie_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_moblie']=="1") {?>checked<?php }?>>
		    <span class="iradio_flat_left"><label for="reg_moblie_1">开启</label>&nbsp;&nbsp;</span>
            </div>
		  </td>
		</tr>
		<tr>
		<th width="160">邮箱注册：</th>
		<td>
        <div class="iradio_flat_height">
		    <input type="radio" name="reg_email" value="0" id="reg_email_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_email']=="0") {?>checked<?php }?>>
		    <span class="iradio_flat_left"><label for="reg_email_0">关闭</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_email" value="1" id="reg_email_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_email']=="1") {?>checked<?php }?>>
		    <span class="iradio_flat_left"><label for="reg_email_1">开启</label>&nbsp;&nbsp;</span>
            </div>
		  </td>
		</tr>
		<tr  class="admin_table_trbg">
		<th width="160">密码确认：</th>
		<td>
           <div class="iradio_flat_height">
		    <input type="radio" name="reg_passconfirm" value="0" id="reg_passconfirm_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_passconfirm']=="0") {?>checked<?php }?>>
		    <span class="iradio_flat_left"><label for="reg_passconfirm_0">关闭</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_passconfirm" value="1" id="reg_passconfirm_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_passconfirm']=="1") {?>checked<?php }?>>
		    <span class="iradio_flat_left"><label for="reg_passconfirm_1">开启</label>&nbsp;&nbsp;</span>
            </div>
		  </td>
		</tr>
		<tr>
		<th width="160">个人姓名：</th>
		<td>
           <div class="iradio_flat_height">
		    <input type="radio" name="reg_username" value="0" id="reg_username_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_username']=="0") {?>checked<?php }?>>
		     <span class="iradio_flat_left"><label for="reg_username_0">关闭</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_username" value="1" id="reg_username_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_username']=="1") {?>checked<?php }?>>
		    <span class="iradio_flat_left"> <label for="reg_username_1">开启</label>&nbsp;&nbsp;</span>
            </div>
		  </td>
		</tr>
		<tr  class="admin_table_trbg">
		<th width="160">个人邮箱：</th>
		<td>
           <div class="iradio_flat_height">
		    <input type="radio" name="reg_useremail" value="0" id="reg_useremail_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_useremail']=="0") {?>checked<?php }?>>
		   <span class="iradio_flat_left"> <label for="reg_useremail_0">关闭</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_useremail" value="1" id="reg_useremail_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_useremail']=="1") {?>checked<?php }?>>
		     <span class="iradio_flat_left"><label for="reg_useremail_1">开启</label>&nbsp;&nbsp;</span>
             </div>
		  </td>
		</tr>

		<tr>
		<th width="160">个人手机：</th>
		<td>
           <div class="iradio_flat_height">
		    <input type="radio" name="reg_usertel" value="0" id="reg_usertel_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_usertel']=="0") {?>checked<?php }?>>
		    <span class="iradio_flat_left"><label for="reg_usertel_0">关闭</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_usertel" value="1" id="reg_usertel_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_usertel']=="1") {?>checked<?php }?>>
		   <span class="iradio_flat_left"> <label for="reg_usertel_1">开启</label>&nbsp;&nbsp;</span>
           </div>
		  </td>
		</tr>
		<tr class="admin_table_trbg">
		<th width="160">企业邮箱：</th>
		<td>
           <div class="iradio_flat_height">
		    <input type="radio" name="reg_comemail" value="0" id="reg_comemail_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comemail']=="0") {?>checked<?php }?>>
		   <span class="iradio_flat_left"> <label for="reg_comemail_0">关闭</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_comemail" value="1" id="reg_comemail_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comemail']=="1") {?>checked<?php }?>>
		   <span class="iradio_flat_left"> <label for="reg_comemail_1">开启</label>&nbsp;&nbsp;</span>
           </div>
		  </td>
		</tr>

		<tr>
		<th width="160">企业联系人：</th>
		<td>
           <div class="iradio_flat_height">
		    <input type="radio" name="reg_comlink" value="0" id="reg_comlink_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comlink']=="0") {?>checked<?php }?>>
		    <span class="iradio_flat_left"><label for="reg_comlink_0">关闭</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_comlink" value="1" id="reg_comlink_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comlink']=="1") {?>checked<?php }?>>
		    <span class="iradio_flat_left"><label for="reg_comlink_1">开启</label>&nbsp;&nbsp;</span>
            </div>
		  </td>
		</tr>
		<tr  class="admin_table_trbg">
		<th width="160">企业联系人手机：</th>
		<td>
           <div class="iradio_flat_height">
		    <input type="radio" name="reg_comtel" value="0" id="reg_comtel_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comtel']=="0") {?>checked<?php }?>>
		   <span class="iradio_flat_left"> <label for="reg_comtel_0">关闭</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_comtel" value="1" id="reg_comtel_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comtel']=="1") {?>checked<?php }?>>
		   <span class="iradio_flat_left"> <label for="reg_comtel_1">开启</label>&nbsp;&nbsp;</span>
           </div>
		  </td>
		</tr>
		<tr>
		<th width="160">企业名称：</th>
		<td>
           <div class="iradio_flat_height">
		    <input type="radio" name="reg_comname" value="0" id="reg_comname_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comname']=="0") {?>checked<?php }?>>
		   <span class="iradio_flat_left"> <label for="reg_comname_0">关闭</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_comname" value="1" id="reg_comname_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comname']=="1") {?>checked<?php }?>>
		   <span class="iradio_flat_left"> <label for="reg_comname_1">开启</label>&nbsp;&nbsp;</span>
           </div>
		  </td>
		</tr>
		<tr class="admin_table_trbg">
		<th width="160">企业地址：</th>
		<td>
           <div class="iradio_flat_height">
		    <input type="radio" name="reg_comaddress" value="0" id="reg_comaddress_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comaddress']=="0") {?>checked<?php }?>>
		   <span class="iradio_flat_left"> <label for="reg_comaddress_0">关闭</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_comaddress" value="1" id="reg_comaddress_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comaddress']=="1") {?>checked<?php }?>>
		  <span class="iradio_flat_left">  <label for="reg_comaddress_1">开启</label>&nbsp;&nbsp;</span>
          </div>
		  </td>
		</tr>
        <tr>
		<th width="160"><font color="red">网站注册状态</font>：</th>
		<td>
           <div class="iradio_flat_height">
		    <input type="radio" name="reg_user_stop" value="0" id="reg_user_stop_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_user_stop']=="0") {?>checked<?php }?>>
		   <span class="iradio_flat_left"> <label for="reg_user_stop_0">关闭注册</label>&nbsp;&nbsp;</span>
		    <input type="radio" name="reg_user_stop" value="1" id="reg_user_stop_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_user_stop']=="1") {?>checked<?php }?>>
		   <span class="iradio_flat_left"> <label for="reg_user_stop_1">开启注册</label>&nbsp;&nbsp;</span>
           </div>
		  </td>
		</tr>
		<tr>
			<th width="160">实名认证：</th>
			<td>
	           <div class="iradio_flat_height">
				    <input type="radio" name="reg_real_name_check" value="0" id="reg_real_name_check_0" 
				    <?php if (empty($_smarty_tpl->tpl_vars['config']->value['reg_real_name_check'])||$_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=="0") {?>checked<?php }?>>
				   <span class="iradio_flat_left"> <label for="reg_real_name_check_0">关闭</label>&nbsp;&nbsp;</span>
				    <input type="radio" name="reg_real_name_check" value="1" id="reg_real_name_check_1" <?php if (!empty($_smarty_tpl->tpl_vars['config']->value['reg_real_name_check'])&&$_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=="1") {?>checked<?php }?>>
				   <span class="iradio_flat_left"> 
				   	<label for="reg_real_name_check_1">开启</label>&nbsp;&nbsp;</span>
           		</div>
		  	</td>
		</tr>
       
		<tr>
            <th width="160">限制注册用户名：</th>
            <td><textarea name="sy_regname" id="sy_regname" rows="3" cols="50" class="admin_comdit_textarea"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_regname'];?>
</textarea>
            <span class="admin_web_tip">多个请用,(半角逗号)隔开。</span></td>
        </tr>
        	<tr class="admin_table_trbg">
		<th width="220">同一IP注册间隔：</th>
		<td><input class="input_text_w150" type="text" name="sy_reg_interval" id="sy_reg_interval" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_reg_interval'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> 小时&nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">提示：0为不限，其他数字为间隔时间。</span></td>
	</tr>
	<tr>
		<th width="160" class="admin_table_trbg">邮件默认后缀：</th>
        <td><textarea name="sy_def_email" id="sy_def_email" rows="3" cols="50" class="admin_comdit_textarea"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_def_email'];?>
</textarea>
        <span class="admin_web_tip">多个用|(竖线)隔开,例：@qq.com|@163.com</span>
        </td>
	</tr>
      <tr>
		<th width="160" class="admin_table_trbg">限制会员手机号：</th>
        <td><textarea name="sy_web_mobile" id="sy_web_mobile" rows="3" cols="50" class="admin_comdit_textarea"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_web_mobile'];?>
</textarea>
        <span class="admin_web_tip">会员手机号(恶意攻击)用分号隔开,例:13141589203;18261151514</span>
        </td>
	</tr>
        <tr>
            <td colspan="2" align="center">
            <input class="admin_submit4" id="regconfig" type="button" name="mapconfig" value="提交" />&nbsp;&nbsp;
            <input class="admin_submit4" type="reset" value="重置" /></td>
        </tr>
    </table>  
		<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</div>
</div>
</div>
<?php echo '<script'; ?>
>  
$(function(){   
	var sy_email_set='<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_email_set'];?>
';
	$("#regconfig").click(function(){
//		if($("input[name=reg_moblie]:checked").val()=='1'){
//			if(!"<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_msguser'];?>
"||!"<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_msgpw'];?>
"||!"<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_msgkey'];?>
"||"<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_msg_isopen'];?>
"!='1'){
//				layer.msg("还没有配置短信，请先配置！",2,8,function(){location.reload();});return false;
//			}
//		}
		if($("input[name=reg_email]:checked").val()=='1'){
			if(sy_email_set!='1'){
				layer.msg("还没有配置邮箱，请先配置！",2,8,function(){location.reload();});return false;
			}
		}
		loadlayer();
		$.post("index.php?m=config&c=save",{
			config : $("#regconfig").val(),
			sy_regname : $("#sy_regname").val(),
			sy_def_email : $("#sy_def_email").val(),
			sy_web_mobile:$("#sy_web_mobile").val(),
			reg_moblie : $("input[name=reg_moblie]:checked").val(),
			reg_email : $("input[name=reg_email]:checked").val(),
			reg_passconfirm : $("input[name=reg_passconfirm]:checked").val(),
			reg_username : $("input[name=reg_username]:checked").val(),
			reg_useremail : $("input[name=reg_useremail]:checked").val(),
			reg_usertel : $("input[name=reg_usertel]:checked").val(),
			reg_comemail : $("input[name=reg_comemail]:checked").val(),
			sy_reg_interval : $("#sy_reg_interval").val(),
			reg_comlink : $("input[name=reg_comlink]:checked").val(),
			reg_comtel : $("input[name=reg_comtel]:checked").val(),
			reg_comname : $("input[name=reg_comname]:checked").val(),
			reg_comaddress : $("input[name=reg_comaddress]:checked").val(),
			reg_user_stop : $("input[name=reg_user_stop]:checked").val(),
			reg_real_name_check : $("input[name=reg_real_name_check]:checked").val(),
			pytoken : $("#pytoken").val()
		},function(data,textStatus){ 
			config_msg(data); 
		});
	});
	
});
<?php echo '</script'; ?>
>
</div>
</body>
</html><?php }} ?>
