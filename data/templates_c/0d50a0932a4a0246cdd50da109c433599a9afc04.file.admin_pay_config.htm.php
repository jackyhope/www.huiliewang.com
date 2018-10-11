<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:05
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_pay_config.htm" */ ?>
<?php /*%%SmartyHeaderCode:6389556515afd45495ee7b9-21928785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d50a0932a4a0246cdd50da109c433599a9afc04' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_pay_config.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6389556515afd45495ee7b9-21928785',
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
  'unifunc' => 'content_5afd45496355e4_86450804',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd45496355e4_86450804')) {function content_5afd45496355e4_86450804($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<title>后台管理</title>
</head>
<body class="body_ifm">
<div id="subboxdiv" style="width:100%;height:100%;display:none;position:absolute;"></div>
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="infoboxp_top"><h6>支付设置</h6></div>
<div class="main_tag">
<div class="table-list">
<div class="admin_table_border">
<table width="100%">
	<thead class="admin_table_trbg">
			<tr class="admin_table_top">
			<th width="20%">支付方式</th>
			<th align="left" width="60%">描述</th>
			<th width="20%" class="admin_table_th_bg">操作</th>
		</tr>
	</thead>
	<tbody>
    <tr class="email admin_table_trbg">
    	<td align="center" style="cursor:pointer;">支付宝</td>
    	<td  style="cursor:pointer;">
        支付宝网站(www.alipay.com) 是国内先进的网上支付平台。<br>
		
        <a href="https://b.alipay.com/index.htm" style="color:red;">立即在线申请</a>
		</td>
    	<td align="center">
            <?php if ($_smarty_tpl->tpl_vars['config']->value['alipay']!=1) {?>
            <a href="javascript:change_pay('alipay');" id="alipay_online">安装</a> 
            <?php } else { ?> 
            <a href="javascript:change_pay_un('alipay');" id="alipay_xiezai">卸载</a>  
            <a href="index.php?m=payconfig&c=alipay" id="alipay_config">设置</a>
            <?php }?>
        </td>
    </tr>
	
        <tr class="admin_table_trbg">
    	<td align="center" style="cursor:pointer;">财付通</td>
    	<td align="" style="cursor:pointer;">财付通是腾讯公司创办的中国领先的在线支付平台，致力于为互联网用户和企业提供安全、便捷、专业的在线支付服务。</td>
    	<td align="center">
            <?php if ($_smarty_tpl->tpl_vars['config']->value['tenpay']!=1) {?>
            <a href="javascript:change_pay('tenpay');" id="alipay_online">安装</a> 
            <?php } else { ?> 
            <a href="javascript:change_pay_un('tenpay');" id="alipay_xiezai">卸载</a>  
            <a href="index.php?m=payconfig&c=tenpay" id="alipay_config">设置</a>
            <?php }?>
        </td>
    </tr>

        <tr>
    	<td align="center" style="cursor:pointer;">银行转帐</td>
    	<td align="" style="cursor:pointer;">
        银行名称 收款人信息：全称 ××× ；帐号或地址 ××× ；开户行 ×××。 <br>
        注意事项：办理电汇时，请在电汇单"汇款用途"一栏处注明您的订单号。</td>
    	<td align="center">
        	<?php if ($_smarty_tpl->tpl_vars['config']->value['bank']!=1) {?>
            <a href="javascript:change_pay('bank');" id="alipay_online">安装</a> 
            <?php } else { ?> 
            <a href="javascript:change_pay_un('bank');" id="alipay_xiezai">卸载</a>  
            <a href="index.php?m=payconfig&c=bank" id="alipay_config">设置</a>
            <?php }?></td>
    </tr>
	</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
	<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">

<?php echo '<script'; ?>
>
function change_pay(paytype){
	var paytype;
	var pytoken = $('#pytoken').val();
	if(paytype=="alipay"){
		$.post("index.php?m=payconfig&c=save",{
			config : 'ddd',
			alipay : 1,
			pytoken : pytoken,
			alipaytype:1
		},function(data,textStatus){
			location.href="index.php?m=payconfig";
		});
	}else if(paytype=="wxpay"){
		$.post("index.php?m=config&c=save",{
			config : 'ddd',
			pytoken : pytoken,
			wxpay : 1
		},function(data,textStatus){
			location.href="index.php?m=payconfig";
		});
	}else if(paytype=="tenpay"){
		$.post("index.php?m=config&c=save",{
			config : 'ddd',
			pytoken : pytoken,
			tenpay : 1
		},function(data,textStatus){
			location.href="index.php?m=payconfig";
		});
	}else{
		$.post("index.php?m=payconfig&c=save",{
			config : 'ddd',
			pytoken : pytoken,
			bank : 1
		},function(data,textStatus){
			location.href="index.php?m=payconfig";
		});	
	}
}
function change_pay_un(paytype){
	var paytype;
	var pytoken = $('#pytoken').val();
	if(paytype=="alipay"){
		$.post("index.php?m=payconfig&c=save",{
			config : 'ddd',
			pytoken : pytoken,
			alipay : 0
		},function(data,textStatus){
			location.href="index.php?m=payconfig";
		});
	}else if(paytype=="tenpay"){
		$.post("index.php?m=payconfig&c=save",{
			config : 'ddd',
			pytoken : pytoken,
			tenpay : 0
		},function(data,textStatus){
			location.href="index.php?m=payconfig";
		});
	}else if(paytype=="wxpay"){
		$.post("index.php?m=payconfig&c=save",{
			config : 'ddd',
			pytoken : pytoken,
			wxpay : 0
		},function(data,textStatus){
			location.href="index.php?m=payconfig";
		});
	}else{
		$.post("index.php?m=payconfig&c=save",{
			config : 'ddd',
			pytoken : pytoken,
			bank : 0
		},function(data,textStatus){
			location.href="index.php?m=payconfig";
		});	
	}
}
<?php echo '</script'; ?>
>
</div>
</body>
</html><?php }} ?>
