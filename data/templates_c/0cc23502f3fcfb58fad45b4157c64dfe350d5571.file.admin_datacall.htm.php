<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:49
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_datacall.htm" */ ?>
<?php /*%%SmartyHeaderCode:4811874355afd4575ba09a3-86537634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cc23502f3fcfb58fad45b4157c64dfe350d5571' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_datacall.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4811874355afd4575ba09a3-86537634',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'datacall' => 0,
    'k' => 0,
    'data' => 0,
    'pytoken' => 0,
    'rows' => 0,
    'v' => 0,
    'type' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd4575bfcbd8_84147490',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd4575bfcbd8_84147490')) {function content_5afd4575bfcbd8_84147490($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.searchurl.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
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
<?php echo '<script'; ?>
>  
function fortype(){
	$.layer({
		type : 1,
		title : '选择调用类型', 
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['350px','150px'],
		page : {dom:"#fortype"}
	});
} 
<?php echo '</script'; ?>
>
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" /> 
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<title>后台管理</title>
</head>
<body class="body_ifm">
<div id="fortype"  style="display:none; width:350px;padding:10px 20px;">
  <div class="">
    <div id="infobox"> 
		<div class="admin_Operating_sh" style="float:left">
			<ul class="datacall">
				<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['datacall']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
				<li><a href="<?php echo smarty_function_searchurl(array('type'=>$_smarty_tpl->tpl_vars['k']->value,'m'=>'datacall','c'=>'add'),$_smarty_tpl);?>
" class="admin_cz_yl"><?php echo $_smarty_tpl->tpl_vars['data']->value[0];?>
</a></li>
				<?php } ?>
			</ul> 
		</div> 
    </div>
  </div>
</div>
<div id="wname" style="display:none;width:350px; "> 
	<div style="height:150px;" class="job_box_div">  
	   <div class="job_box_inp">
		<table class="table_form "style="width:100%">
			<tr><td class='ui_content_wrap'><div style="width:300px;">复制（CTRL+C）以下内容并添加到模板中</div></td></tr> 
			<tr><td><div style="text-align:center"><input type="text" name="position" id='copy_url' class="input-text" size='45'/></div></td></tr> 
		</table> 
	   </div>
	</div>
</div> 
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="infoboxp_top">
<span class="admin_title_span">数据调用管理</span>
   <a href="javascript:void(0);" class="admin_infoboxp_nav admin_infoboxp_tj" onclick="fortype()">添加调用</a>
</div>
<div class="table-list">
    <div class="admin_table_border">
	<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
        <form action="" name="myform" method="get"target="supportiframe">
        <input type="hidden" name="pytoken"  id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <table width="100%">
            <thead>
                <tr class="admin_table_top">
                    <th align="left" width="400">调用名称</th>
                    <th align="left">调用类别</th>
                    <th align="left">调用条数</th>
                    <th align="left">上次更新时间</th>
                    <th align="left">代码调用</th>
                    <th class="admin_table_th_bg">操作</th>
                </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <?php $_smarty_tpl->tpl_vars["type"] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['type'], null, 0);?>
                <tr align="left">
                    <td align="left" class="td1"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span></td> 
                    <td align="left" class="ud"><?php echo $_smarty_tpl->tpl_vars['datacall']->value[$_smarty_tpl->tpl_vars['type']->value][0];?>
</td>
                    <td align="left" class="ud"><?php echo $_smarty_tpl->tpl_vars['v']->value['num'];?>
</td>
                    <td align="left" class="ud"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['lasttime'],"%Y-%m-%d");?>
</td>
                    <td class="ud" align="left">
                    <a href="javascript:void(0);" onClick="copy_url('内部调用','{yun\:}call id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
{\/yun}')" class="admin_cz_bj">内部调用</a> | 
                    <a href="javascript:void(0);" onClick="copy_url('外部调用','&lt;script src=\'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/index.php?m=call&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
\' language=\'javascript\'&gt;&lt;/script&gt;')" class="admin_cz_bj">外部调用</a>
                    </td>
                    <td align="center"> 
                    <a href="index.php?m=datacall&c=preview&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"class="admin_cz_yl">预览</a>&nbsp;&nbsp;
                     <a href="javascript:void(0)" onClick="layer_del('确定要更新数据？','index.php?m=datacall&c=make&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')"class="admin_cz_gx">更新</a>
                     <a href="index.php?m=datacall&c=add&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
" class="admin_cz_bj">修改</a>
                     <a href="javascript:void(0)" onClick="layer_del('确定要删除？', 'index.php?m=datacall&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_cz_sc">删除</a></div></div></td> 
              </tr>
          <?php } ?>
          <tr><td colspan="7" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td></tr>
          </tbody>
          </table>
        </form>
    </div>
</div>
</div>
</body>
</html><?php }} ?>
