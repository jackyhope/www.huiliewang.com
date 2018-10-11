<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:10
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_navigation_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:7313435215afd454eedd243-32038807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '718f13c0793e7de9cc4e6665085afd6edf945f34' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_navigation_list.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7313435215afd454eedd243-32038807',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'nclass' => 0,
    'k' => 0,
    'v' => 0,
    'nav' => 0,
    'key' => 0,
    'pagenav' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd454f01d7a5_01985561',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd454f01d7a5_01985561')) {function content_5afd454f01d7a5_01985561($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<title>后台管理</title>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
   <div class="admin_Filter">
		<span class="complay_top_span fl">导航设置</span> 
            <form action="index.php" name="myform" method="get">
			  <input name="m" value="navigation" type="hidden"/>
			  <div class="admin_Filter_span">搜索类型：</div>
			  <div class="admin_Filter_text formselect"  did='dtype'>
			  <input type="button" value="<?php if ($_GET['nid']) {
echo $_smarty_tpl->tpl_vars['nclass']->value[$_GET['nid']];
} else { ?>请选择<?php }?>" class="admin_Filter_but"  id="btype"> 
			  <input type="hidden" id='type' value="<?php echo $_GET['nid'];?>
" name='nid'>
			  <div class="admin_Filter_text_box" style="display:none" id='dtype'>
				  <ul>
				  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['nclass']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				  <li><a href="javascript:void(0)" onClick="formselect('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
','type','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a></li>
				  <?php } ?>
				  </ul>  
			  </div>
			  </div>
				<input class="admin_Filter_search"  type="text" name="keyword"  size="25" style="float:left"> 
				<input  class="admin_Filter_bth" type="submit" name="news_search" value="检索"/>
				<span class='admin_search_div'>
				<div class="admin_adv_search">
				  <div class="admin_adv_search_bth">高级搜索</div>
				</div> 
				</span>            
			</form> 
	<a href="index.php?m=navigation&c=add" class="admin_infoboxp_tj">添加导航</a>
 	<a href="index.php?m=navigation&c=group" class="admin_infoboxp_tj admin_infoboxp_lb">添加分类</a>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
<div class="table-list">
<div class="admin_table_border">
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
<form action="index.php" name="myform" id='myform' method="get" target="supportiframe">
<input name="m" value="navigation" type="hidden"/>
<input name="c" value="del" type="hidden"/>
<table width="100%">
	<thead>
		<tr class="admin_table_top">
		    <th><label for="chkall"><input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/></label></th>
			<th>导航编号</th>
            <th align="left">导航名称</th>
			<th align="left">导航类别</th>
			<th align="left">连接地址</th>
            <th>导航类型</th>
			<th><?php if ($_GET['t']=="sort"&&$_GET['order']=="desc") {?> <a href="index.php?m=navigation&order=asc&t=sort">排序<img src="images/sanj2.jpg"/></a> <?php } else { ?> <a href="index.php?m=navigation&order=desc&t=sort">排序<img src="images/sanj.jpg"/></a> <?php }?></th>
            <th>弹出窗口</th>
            <th>显示</th>
			<th class="admin_table_th_bg">操作</th>
		</tr>
	</thead>
	<tbody>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <tr align="center"<?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
	    <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
    	<td align="left" class="td1" style="text-align:center;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span></td>
        <td class="od" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
    	<td class="ud" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
</td>
		<td class="gd" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
</td>
        <td class="td"><?php if ($_smarty_tpl->tpl_vars['v']->value['type']=='1') {?>站内链接<?php } else { ?>原链接<?php }?></td>
		<td class="td"><?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
</td>
        <td class="td" id="eject<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
		<?php if ($_smarty_tpl->tpl_vars['v']->value['eject']=='1') {?>
		<a href="javascript:void(0);" onClick="tanchu('index.php?m=navigation&c=nav_xianshi','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','0','eject');">新窗口</a>
		<?php } else { ?>
		<a href="javascript:void(0);" onClick="tanchu('index.php?m=navigation&c=nav_xianshi','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','1','eject');">原窗口</a>
		<?php }?>
		</td>
    	<td class="td" id="display<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
		  <?php if ($_smarty_tpl->tpl_vars['v']->value['display']=='1') {?>
			<a href="javascript:void(0);" onClick="rec_up('index.php?m=navigation&c=nav_xianshi','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','0','display');"><img src="../config/ajax_img/doneico.gif"></a>
		  <?php } else { ?>
			<a href="javascript:void(0);" onClick="rec_up('index.php?m=navigation&c=nav_xianshi','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','1','display');"><img src="../config/ajax_img/errorico.gif"></a>
          <?php }?>
		</td>
    	<td><a href="index.php?m=navigation&c=add&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="admin_cz_bj">修改</a> | <a href="javascript:void(0)" onClick="layer_del('确定要删除？', 'index.php?m=navigation&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');"class="admin_cz_sc">删除</a></td>
  </tr>
  <?php } ?>
  <tr style="background:#f1f1f1;">
    <td align="center"><label for="chkall2"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></label></td>
    <td colspan="2" ><label for="chkAll2">全选</label>
    <input class="admin_submit4"  type="button" name="delsub" value="删除所选"  onclick="return really('del[]')"/></td>
    <td colspan="7" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
  </tr>
  </tbody>
  </table>
  <input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</form>
</div>
</div>
</div>
<?php echo '<script'; ?>
>
function tanchu(url,id,rec,type){
	var pytoken=$("#pytoken").val();
	$.get(url+"&id="+id+"&rec="+rec+"&type="+type+"&pytoken="+pytoken,function(data){
		if(data==1){
			if(rec=="1"){
				$("#"+type+id).html("<a href=\"javascript:void(0);\" onClick=\"tanchu('"+url+"','"+id+"','0','"+type+"');\">新窗口</a>");
			}else{
				$("#"+type+id).html("<a href=\"javascript:void(0);\" onClick=\"tanchu('"+url+"','"+id+"','1','"+type+"');\">原窗口</a>");
			}
		}
	});
}
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
