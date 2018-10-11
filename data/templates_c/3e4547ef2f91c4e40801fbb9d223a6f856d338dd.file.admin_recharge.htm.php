<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-25 13:41:18
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_recharge.htm" */ ?>
<?php /*%%SmartyHeaderCode:16680272255b07a1fe00f449-66260170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e4547ef2f91c4e40801fbb9d223a6f856d338dd' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_recharge.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16680272255b07a1fe00f449-66260170',
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
  'unifunc' => 'content_5b07a1fe043694_84783614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b07a1fe043694_84783614')) {function content_5b07a1fe043694_84783614($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />  
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<title>后台管理</title>
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
	$("input[name=type]").click(function(){
		var type = $(this).val();
		if(type=="integral"){
			$("#integral_tr").show();
			$("#price_tr").hide();
		}else{
			$("#integral_tr").hide();
			$("#price_tr").show();
		}
	});
	 $('input').iCheck({
		checkboxClass: 'icheckbox_flat-blue',
		radioClass: 'iradio_flat-blue'
	  });
});
function check(){
	if($("#userarr").val()==''){
		parent.layer.msg('请输入用户名！', 2,8);return false;
	}
	if($("#price_int").val()<1){
		parent.layer.msg('请输入<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
！', 2,8);return false;
	}
}
<?php echo '</script'; ?>
>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="admin_Prompt">
<div class="admin_Prompt_span"> 注意事项： 充值时，请正确填写用户名和要充值的<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
。确认用户名的正确性。 </div>
<div class="admin_Prompt_close"></div>
</div>

<div class="infoboxp_top">
<h6>后台充值</h6>
</div>
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
  <div class="admin_table_border">
<form name="myform" action="index.php?m=recharge" method="post"  target="supportiframe" onSubmit="return check()">
	<table width="100%" class="table_form">
        <tr>
			<th width="140">充值用户名：</th>
			<td><input class="input-text" type="text" name="userarr" id='userarr'size="40" value=""/><span class="admin_web_tip">多个用户名用逗号隔开</span></td>
		</tr> 
        <tr class="admin_table_trbg">
			<th width="140">充值方式：</th>
			<td>
                 <label for="fs_0"><span class="admin_radio_box" style="padding-top:6px;"><input type="radio" name="fs" value="1" id="fs_0" checked class="admin_radio_box_r"> <span class="admin_rec_plus">增加</span></span></label>
			   <label for="fs_1"><span class="admin_radio_box" style="padding-top:6px;"><input type="radio" name="fs" value="2" id="fs_1"  class="admin_radio_box_r"><span class="admin_rec_plus"> 扣除</span></span></label>
			  </td>
		</tr>
        <tr class="int" id="integral_tr">
            <th height="30"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
：</th>
            <td>
            <input type="text" name="price_int" id="price_int" size="20" maxlength="16" value="" onKeyUp="this.value=this.value.replace(/[^0-9.]/g,'')"   class="input-text"> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];?>
</td>
        </tr> 
          <tr class="admin_table_trbg">
            <th height="30" >备　　注：</th>
            <td><textarea name="remark" rows=2 cols=40 wrap="physical" class="admin_comdit_textarea"></textarea></td>
        </tr>
		<tr>
        <th></th>
			<td>
    		<input class="admin_submit4" type="submit" name="insert" value="&nbsp;充　值&nbsp;" />
			</td>
		</tr>
	</table>
	<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</form>
</div>
</div>
</body>
</html><?php }} ?>
