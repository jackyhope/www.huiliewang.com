<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-25 13:41:16
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_company_order.htm" */ ?>
<?php /*%%SmartyHeaderCode:3384324045b07a1fc0c4226-25863081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53d15003a2b2d27aad9894bbfaef4d92ea5c7381' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_company_order.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3384324045b07a1fc0c4226-25863081',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'rows' => 0,
    'key' => 0,
    'job' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b07a1fc1951e3_20532563',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b07a1fc1951e3_20532563')) {function content_5b07a1fc1951e3_20532563($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.searchurl.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
 
<title>后台管理</title>
</head>
<body class="body_ifm">
<div class="infoboxp"> 
<div class="infoboxp_top_bg"></div>
    <div class="admin_Filter"> 
		<span class="complay_top_span fl">充值订单</span>
            <form action="index.php" name="myform" method="get">
            <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"> 
            <input name="m" value="company_order" type="hidden"/>   
            <input name="typezf" value="<?php echo $_GET['typezf'];?>
" type="hidden"/>   
            <input name="typedd" value="<?php echo $_GET['typedd'];?>
" type="hidden"/>   
            <input name="order_state" value="<?php echo $_GET['order_state'];?>
" type="hidden"/>
            <input name="fb" value="<?php echo $_GET['fb'];?>
" type="hidden"/>  
			<div class="admin_Filter_text formselect"  did='dtypeca'>
			  <input type="button" value="<?php if ($_GET['typeca']=='') {?>充值单号<?php } else { ?>用户名称<?php }?>" class="admin_Filter_but"  id="btypeca">
			  <input type="hidden" id='typeca' value="<?php if ($_GET['typeca']=='') {?>1<?php } else {
echo $_GET['typeca'];
}?>" name='typeca'>
			  <div class="admin_Filter_text_box" style="display:none" id='dtypeca'>
				  <ul>
				  <li><a href="javascript:void(0)" onClick="formselect('1','typeca','充值单号')">充值单号</a></li>
				  <li><a href="javascript:void(0)" onClick="formselect('2','typeca','用户名称')">用户名称</a></li>                  
				  </ul>  
			  </div>
			</div>
            <input class="admin_Filter_search"  placeholder="输入你要搜索的关键字" type="text" name="keyword"  size="25" style="float:left"> 
            <input class="admin_Filter_bth"  type="submit" name="news_search" value="检索"/>
			 <span class='admin_search_div'>
			  <div class="admin_adv_search"><div class="admin_adv_search_bth">高级搜索</div></div>   
		  	</span> 
		</form> 
    </div>
<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="table-list">
<div class="admin_table_border">
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
<form action="index.php" name="myform" id='myform' method="get" target="supportiframe">
<input type="hidden" name="pytoken" id='pytoken'  value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
<input name="m" value="company_order" type="hidden"/>
<input name="c" value="del" type="hidden"/>
<table width="100%">
	<thead>
		<tr class="admin_table_top">
		   <th style="width:20px;"><label for="chkall"><input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/></label></th>
            
            <th>
			<?php if ($_GET['t']=="id"&&$_GET['order']=="asc") {?>
			<a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'id','m'=>'company_order','untype'=>'order,t'),$_smarty_tpl);?>
">编号<img src="images/sanj.jpg"/></a>
            <?php } else { ?>
            <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'id','m'=>'company_order','untype'=>'order,t'),$_smarty_tpl);?>
">编号<img src="images/sanj2.jpg"/></a>
            <?php }?>
			</th>
			<th align="left">用户名称</th>
            <th align="left">充值单号</th>
			<th align="left">支付类型</th>
            <th align="left">订单类型</th> 
            <th align="left">
			<?php if ($_GET['t']=="order_price"&&$_GET['order']=="asc") {?>
			<a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'order_price','m'=>'company_order','untype'=>'order,t'),$_smarty_tpl);?>
">订单金额<img src="images/sanj.jpg"/></a>
            <?php } else { ?>
            <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'order_price','m'=>'company_order','untype'=>'order,t'),$_smarty_tpl);?>
">订单金额<img src="images/sanj2.jpg"/></a>
            <?php }?>
			</th>
            
            <th>
			<?php if ($_GET['t']=="order_time"&&$_GET['order']=="asc") {?>
			<a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'order_time','m'=>'company_order','untype'=>'order,t'),$_smarty_tpl);?>
">时间<img src="images/sanj.jpg"/></a>
            <?php } else { ?>
            <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'order_time','m'=>'company_order','untype'=>'order,t'),$_smarty_tpl);?>
">时间<img src="images/sanj2.jpg"/></a>
            <?php }?>
			</th>
			<th>状态</th>
			<th class="admin_table_th_bg">操作</th>
		</tr>
	</thead>
	<tbody>
   <?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value) {
$_smarty_tpl->tpl_vars['job']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['job']->key;
?>
    <tr align="center"<?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
">
	    <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
    	<td align="left" class="td1"><span><?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
</span></td> 
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['job']->value['username'];?>
</td>
   	 	<td align="left"><?php echo $_smarty_tpl->tpl_vars['job']->value['order_id'];?>
</td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['job']->value['order_type_n'];?>
</td>
        <td align="left">
        	<?php if ($_smarty_tpl->tpl_vars['job']->value['type']==1) {?>购买会员
        	<?php } elseif ($_smarty_tpl->tpl_vars['job']->value['type']=='2') {
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
充值
        	<?php } elseif ($_smarty_tpl->tpl_vars['job']->value['type']=='3') {?>银行转帐
        	<?php } elseif ($_smarty_tpl->tpl_vars['job']->value['type']=='4') {?>金额充值
        	<?php } elseif ($_smarty_tpl->tpl_vars['job']->value['type']=='5') {?>购买增值包
        	<?php } elseif ($_smarty_tpl->tpl_vars['job']->value['type']=='10') {?>购买职位置顶
        	<?php } elseif ($_smarty_tpl->tpl_vars['job']->value['type']=='11') {?>购买紧急招聘
        	<?php } elseif ($_smarty_tpl->tpl_vars['job']->value['type']=='12') {?>购买职位推荐
        	<?php } elseif ($_smarty_tpl->tpl_vars['job']->value['type']=='13') {?>购买职位自动刷新
        	<?php } elseif ($_smarty_tpl->tpl_vars['job']->value['type']=='14') {?>简历置顶
        	<?php }?></td>
    	<td align="left"><?php echo $_smarty_tpl->tpl_vars['job']->value['order_price'];?>
</td>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['order_time'],"%Y-%m-%d %H:%M");?>
</td>
   	 	<td><?php echo $_smarty_tpl->tpl_vars['job']->value['order_state_n'];?>
</td>
    	<td align="left" style="text-align:center;">
			<a href="index.php?m=company_order&c=edit&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
"  class="admin_cz_sc">查看</a> | 
        	<a href="javascript:void(0)" onClick="layer_del('确定要删除？', 'index.php?m=company_order&c=del&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
');"class="admin_cz_sc">删除</a>
        	<?php if ($_smarty_tpl->tpl_vars['job']->value['order_state']==1||$_smarty_tpl->tpl_vars['job']->value['order_state']==3) {?>
				<br/>
				<a href="javascript:void(0)" onClick="layer_del('确认该订单将充值到用户帐户，是否确定？', 'index.php?m=company_order&c=setpay&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
');" class="admin_cz_sc" style="color:red;">确认</a> | 
				<a href="index.php?m=company_order&c=edit&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
"  class="admin_cz_sc"style="color:red;">修改金额</a> 
			<?php }?>
        </td>
  </tr>
  <?php } ?>
  <tr style="background:#f1f1f1;">
  <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
  <td colspan="3" >
  <label for="chkAll2">全选</label>&nbsp;
    <input class="admin_submit4"  type="button" name="delsub" value="删除所选" onClick="return really('del[]')" /></td>
    <td colspan="6" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
  </tr>
  </tbody>
  </table>
</form>
</div></div>
</div>
</body>
</html><?php }} ?>
