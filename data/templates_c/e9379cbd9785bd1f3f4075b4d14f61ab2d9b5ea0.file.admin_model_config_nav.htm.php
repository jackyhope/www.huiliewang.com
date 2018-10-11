<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:32
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_model_config_nav.htm" */ ?>
<?php /*%%SmartyHeaderCode:11177576445afd4564c15827-48565359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9379cbd9785bd1f3f4075b4d14f61ab2d9b5ea0' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_model_config_nav.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11177576445afd4564c15827-48565359',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'types' => 0,
    'type' => 0,
    'v' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd4564c84d76_17342221',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd4564c84d76_17342221')) {function content_5afd4564c84d76_17342221($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jscolor/jscolor.js"><?php echo '</script'; ?>
>
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
 charset="utf-8" src="../js/kindeditor/kindeditor-min.js"><?php echo '</script'; ?>
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
function setsave(id,pytoken,config){
	
	var nid = $('#nid_val').val();
	var name = $('#name').val();
	var sort = $('#sort').val();
	var eject =	$("input[name='eject']:checked").val();
	var model = $("input[name='model']:checked").val();
	var bold = $("input[name='bold']:checked").val();
	var display = $("input[name='display']:checked").val();
	 if (name=="") {
		 layer.msg('请填写导航名称！', 2,8); 
		 return false;
	 }

	 $.post('index.php?m=model_config&c=setnav',{nid:nid,name:name,sort:sort,eject:eject,model:model,bold:bold,display:display,id:id,config:config,pytoken:pytoken},function(data){
		
		var data=eval('('+data+')');
		
		parent.layer.msg(data.msg, Number(data.tm), Number(data.st),function(){parent.layer.closeAll();});
		return false;
	
	 
	 });
}
<?php echo '</script'; ?>
>
<title>后台管理</title>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
  <div class="admin_table_border">
      <table width="100%" class="table_form" style="background:#fff;">
        <tr >
          <th width="120">导航类别：</th>
          <td>
            <div class="yun_admin_select_box zindex100">
            <?php if ($_smarty_tpl->tpl_vars['types']->value['nid']) {?>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                   <?php if ($_smarty_tpl->tpl_vars['v']->value['id']==$_smarty_tpl->tpl_vars['types']->value['nid']) {?>
                    <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
" class="yun_admin_select_box_text" id="nid_name" onClick="select_click('nid');">
                    <input name="nid" type="hidden" id="nid_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
                    <?php }?>
                <?php } ?>
            <?php } else { ?>
                <input type="button" value="请选择" class="yun_admin_select_box_text" id="nid_name" onClick="select_click('nid');">
                <input name="nid" type="hidden" id="nid_val" value="">
            <?php }?>
            
            <div class="yun_admin_select_box_list_box dn" id="nid_select">     
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <div class="yun_admin_select_box_list">
                    <a href="javascript:;" onClick="select_new('nid','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
</a>
                </div>                    
                <?php } ?>
            </div>
        </div>
          </td>
        </tr>
        <tr class="admin_table_trbg" >
          <th>导航名称：</th>
          <td><input class="input-text" type="text" name="name" id="name" size="40" value="<?php echo $_smarty_tpl->tpl_vars['types']->value['name'];?>
"/>
         </td>
        </tr>
        <tr >
          <th>排　　序：</th>
          <td><input class="input-text" type="text" name="sort" size="5" id="sort" value="<?php echo $_smarty_tpl->tpl_vars['types']->value['sort'];?>
"/></td>
        </tr>
        <tr class="admin_table_trbg" >
          <th>弹出窗口：</th>
          <td>
          <div class="iradio_flat_height">
            <input type="radio" name="eject" value="1" id="eject_1" <?php if ($_smarty_tpl->tpl_vars['types']->value['eject']=='1') {?>checked=checked <?php }?>>
           <span class="iradio_flat_left"><label for="eject_1">新窗口</label>&nbsp;&nbsp;</span>
            <input type="radio" name="eject" value="0"  id="eject_2" <?php if ($_smarty_tpl->tpl_vars['types']->value['eject']!='1') {?>checked=checked<?php }?>>
            <span class="iradio_flat_left"><label for="eject_2">原窗口 </label></span>
            </div></td>
        </tr>
        <tr >
          <th>状　　态：</th>
          <td>
          <div class="iradio_flat_height">
            <input type="radio" name="model" value="hot" id="model_hot" <?php if ($_smarty_tpl->tpl_vars['types']->value['model']=='hot') {?>checked=checked <?php }?>> 
            <span class="iradio_flat_left"><label for="model_hot">热</label>&nbsp;&nbsp;</span>
            <input type="radio" name="model" value="new" id="model_new" <?php if ($_smarty_tpl->tpl_vars['types']->value['model']=='new') {?>checked=checked<?php }?>> 
            <span class="iradio_flat_left"><label for="model_new">新</label>&nbsp;&nbsp;</span>
            <input type="radio" name="model" value="" id="model_n" <?php if ($_smarty_tpl->tpl_vars['types']->value['model']=='') {?>checked=checked<?php }?>> 
            <span class="iradio_flat_left"><label for="model_n">无</label>&nbsp;&nbsp;</span>
            </div>
            </td>
        </tr>
        <tr >
          <th>加　　粗：</th>
          <td>
          <div class="iradio_flat_height">
          <input type="radio" name="bold" value="1" id="bold_y" <?php if ($_smarty_tpl->tpl_vars['types']->value['bold']=='1') {?>checked=checked<?php }?>>
            <span class="iradio_flat_left"><label for="bold_y">是</label>&nbsp;&nbsp;</span>
            <input type="radio" name="bold" value="0" id="bold_n" <?php if ($_smarty_tpl->tpl_vars['types']->value['bold']!='1') {?>checked=checked<?php }?>>
            <span class="iradio_flat_left"><label for="bold_n">否</label>&nbsp;&nbsp;</span>
            </div>
            </td>
        </tr>
        <tr >
          <th>显　　示：</th>
          <td>
          <div class="iradio_flat_height">
          <input type="radio" name="display" value="1" id="display_y" <?php if ($_smarty_tpl->tpl_vars['types']->value['display']=='1') {?>checked=checked <?php }?>>
            <span class="iradio_flat_left"><label for="display_y">是</label>&nbsp;&nbsp;</span>
            <input type="radio" name="display" value="0" id="display_n" <?php if ($_smarty_tpl->tpl_vars['types']->value['display']!='1') {?>checked=checked<?php }?>>
           <span class="iradio_flat_left"><label for="display_n"> 否</label>&nbsp;&nbsp;</span>
            
             </div></td>
        </tr>
        <tr class="admin_table_trbg" >
          <td align="center" colspan="2"> 
            <input class="admin_submit4" type="button" onclick="setsave('<?php echo $_smarty_tpl->tpl_vars['types']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['types']->value['config'];?>
');" name="update" value="&nbsp;保存&nbsp;"  />
            </td>
        </tr>
      </table>
  </div>
</div>
</body>
</html><?php }} ?>
