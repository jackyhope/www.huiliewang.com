<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:22
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_navigation_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:1901773125afd455a336da6-33147528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59cca8f23b1f1994c55f1dfef07aa15733b94a4e' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_navigation_add.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1901773125afd455a336da6-33147528',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'types' => 0,
    'type' => 0,
    'v' => 0,
    'lasturl' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd455a3b27f6_45154258',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd455a3b27f6_45154258')) {function content_5afd455a3b27f6_45154258($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript">
KindEditor.ready(function(K) { 
	var colorpicker;
	K('#colorpicker').bind('click', function(e) {
		e.stopPropagation();
		if (colorpicker) {
			colorpicker.remove();
			colorpicker = null;
			return;
		}
		var colorpickerPos = K('#colorpicker').pos();
		colorpicker = K.colorpicker({
			x : colorpickerPos.x,
			y : colorpickerPos.y + K('#colorpicker').height(),
			z : 19811214,
			selectedColor : 'default',
			noColor : '无颜色',
			click : function(color) {
				K('#color').val(color);
				$('#color + font').css('color', color);
				colorpicker.remove();
				colorpicker = null;
			}
		});
	});
	K(document).click(function() {
		if (colorpicker) {
			colorpicker.remove();
			colorpicker = null;
		}
	});
});
<?php echo '</script'; ?>
>
<title>后台管理</title>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
  <div class="infoboxp_top">
      <span class="complay_top_span fl">添加导航</span>
	
	<a href=" javascript:history.back(-1);" class="admin_infoboxp_tj admin_infoboxp_xwlb">导航列表</a> 
	
  </div>
  <div class="admin_table_border">
    <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
    <form name="myform" target="supportiframe" action="index.php?m=navigation&c=save" method="post" encType="multipart/form-data"  onSubmit="return checkform(this);">
      <table width="100%" class="table_form" style="background:#fff;">
        <tr >
          <th width="120">导航类别：</th>
          <td>
            <div class="yun_admin_select_box" style="z-index:110;">
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
           <a href="index.php?m=navigation&c=group" class="admin_nav_fl">添加分类</a></td>
        </tr>
        <tr class="admin_table_trbg" >
          <th>导航名称：</th>
          <td><input class="input-text" type="text" name="name" size="40" value="<?php echo $_smarty_tpl->tpl_vars['types']->value['name'];?>
"/>
          <input type="hidden" name='color' id="color" value="" /></td>
        </tr>
        <tr class="admin_table_trbg" >
          <th>导航链接：</th>
          <td><input class="input-text" type="text" name="url" size="50" value="<?php echo $_smarty_tpl->tpl_vars['types']->value['url'];?>
"/>
            <span class="admin_web_tip"></span></td>
        </tr>
        <tr >
          <th>伪静态链接：</th>
          <td><input class="input-text" type="text" name="furl" size="50" value="<?php echo $_smarty_tpl->tpl_vars['types']->value['furl'];?>
"/>
            <span class="admin_web_tip"></span>
            </td>
        </tr>
        <tr class="admin_table_trbg" >
          <th>导航类型：</th>
          <td>
            <div class="yun_admin_select_box zindex100">
            <?php if ($_smarty_tpl->tpl_vars['types']->value['type']=='2') {?>
                    <input type="button" value="外部链接" class="yun_admin_select_box_text" id="type_name" onClick="select_click('type');">
                    <input name="type" type="hidden" id="type_val" value="2">
            <?php } else { ?>
                <input type="button" value="站内链接" class="yun_admin_select_box_text" id="type_name" onClick="select_click('type');">
                <input name="type" type="hidden" id="type_val" value="1">
            <?php }?>
            
            <div class="yun_admin_select_box_list_box dn" id="type_select">     
                <div class="yun_admin_select_box_list">
                    <a href="javascript:;" onClick="select_new('type','1','站内链接')">站内链接</a>
                </div>      
                <div class="yun_admin_select_box_list">
                    <a href="javascript:;" onClick="select_new('type','2','外部链接')">外部链接</a>
                </div>                   
            </div>
        </div>
            <span class="admin_web_tip" style="float:left; line-height:34px; display:inline-block">站内链接如：job/  外部链接如：http://www.phpyun.com/job/</span></td>
        </tr>
        <tr >
          <th>排　　序：</th>
          <td><input class="input-text" type="text" name="sort" size="5" value="<?php echo $_smarty_tpl->tpl_vars['types']->value['sort'];?>
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
          <td align="center" colspan="2"> <?php if ($_smarty_tpl->tpl_vars['types']->value['id']) {?>
            <input type="hidden" name="id" size="40" value="<?php echo $_smarty_tpl->tpl_vars['types']->value['id'];?>
"/>
            <input type="hidden" name="lasturl" value="<?php echo $_smarty_tpl->tpl_vars['lasturl']->value;?>
">
            <input class="admin_submit4" type="submit" name="update" value="&nbsp;更 新&nbsp;"  />
            <?php } else { ?>
            <input class="admin_submit4" type="submit" name="add" value="&nbsp;添 加&nbsp;"  />
            <?php }?>
            <input class="admin_submit4" type="reset" name="reset" value="&nbsp;重 置 &nbsp;" /></td>
        </tr>
      </table>
	  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
    </form>
  </div>
</div>
</body>
</html><?php }} ?>
