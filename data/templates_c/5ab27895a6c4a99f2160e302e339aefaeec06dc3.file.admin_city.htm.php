<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-12 17:41:31
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_city.htm" */ ?>
<?php /*%%SmartyHeaderCode:15412623215b1f954bb87282-19244040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ab27895a6c4a99f2160e302e339aefaeec06dc3' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_city.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15412623215b1f954bb87282-19244040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'city' => 0,
    'letter' => 0,
    'letter4' => 0,
    'pytoken' => 0,
    'city_row' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b1f954bc57d60_34306339',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1f954bc57d60_34306339')) {function content_5b1f954bc57d60_34306339($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<?php echo '<script'; ?>
>
function replace_type(id){
	$.post("index.php?m=admin_city&c=ajax",{id:id,pytoken:$('#pytoken').val()},function(data){
		$("#threeid").html(data);
	});

}
function delsingle(id,type){
	layer.confirm('删除该城市会导致有关数据无法使用，确认删除？', function(){
		$.post("index.php?m=admin_city&c=del",{delid:id,type:type,pytoken:$('#pytoken').val()},function(data){
			if(data=="1"){
				parent.layer.msg("删除成功！",2, 9,function(){location.reload();});return false;
			}else{
				parent.layer.msg("删除失败！",2, 8,function(){location.reload();});return false;
			}
		});
		return true;
	});
}
function addcity(id,type,level){
	if($(".parent"+id).attr("style")=="display:none"){
		$(".parent"+id).attr("style","display:");
		$("#img"+id).html("<a href=\"javascript:;\" onClick=\"displaycity('"+id+"','"+type+"','"+level+"');\"><img src=\"images/iconv/jian.png\" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"addson('"+id+"','"+level+"');\"class=\"admin_tj_zl\">+ 添加子类</a>");
	}else{
		$.post("index.php?m=admin_city&c=AddCity",{kid:id,type:type,pytoken:$('#pytoken').val()},function(data){
			if(data!=""){
				$("#"+id).after(data);
				$("#img"+id).html("<a href=\"javascript:;\" onClick=\"displaycity('"+id+"','"+type+"','"+level+"');\"><img src=\"images/iconv/jian.png\" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"addson('"+id+"','"+level+"');\"class=\"admin_tj_zl\">+ 添加子类</a>");
			}else{
				$("#img"+id).html("<a href=\"javascript:;\" onClick=\"displaycity('"+id+"','"+type+"','"+level+"');\"><img src=\"images/iconv/jian.png\" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"addson('"+id+"','"+level+"');\"class=\"admin_tj_zl\">+ 添加子类</a>");
			}
		});
	}
}
function displaycity(id,type,level)
{
	if(level=="parent"){
		$(".parent"+id).each(function(){
			var sonid = $(this).attr("id");
			$(".parent"+sonid).attr("style","display:none");
		});
	}
	$(".parent"+id).attr("style","display:none");
	$("#img"+id).html("<a href=\"javascript:;\" onClick=\"addcity('"+id+"','"+type+"','"+level+"');\"><img src=\"images/iconv/jia.png\" /></a>");
}
function addson(id,level){
	var html="";
	var sel="";
	if(level=="top"){
		var style="";
	}else if(level=="parent")
	{
		var style="|--------";
	}else{
		var style="|----------------";
	}
	html+='<tr align="left" id="<?php echo $_smarty_tpl->tpl_vars['city']->value['id'];?>
" style="display:" class="parent'+id+'">';
	html+='<td class="ud"> </td>';
	html+='<td class="ud"><a href="javascript:;" onclick="javascript:this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);"><img src="images/iconv/del_icon2.gif" alt="删除当前"></a></td>';
	html+='<td class="ud">'+style+'<input class="input-text" type="text" name="addcityname_'+id+'[]" value="" /></td>';
	'<?php  $_smarty_tpl->tpl_vars['letter4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['letter4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['letter']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['letter4']->key => $_smarty_tpl->tpl_vars['letter4']->value) {
$_smarty_tpl->tpl_vars['letter4']->_loop = true;
?>'
	sel+='<option value="<?php echo $_smarty_tpl->tpl_vars['letter4']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['letter4']->value;?>
</option>';
	'<?php } ?>'
	html+='<td><select name="addletter_'+id+'[]">'+sel+'</select> </td>';
	html+='<td class="ud"><select name="adddisplay_'+id+'[]"><option value="1">是</option><option value="0">否</option></select></td> ';
	if(level=="parent"){
		html+='<td class="ud"><select name="addsitetype_'+id+'[]"><option value="0">否</option><option value="1">是</option></select></td> ';
	}
	html+='<td class="ud"></td>';
	html+='<td class="ud"></td></tr>';

	$("#"+id).after(html);
	$("#"+id).find("input[type='checkbox']").attr("checked", true);
	get_comindes_jobid();
}
function checkedtr(id){
	var name = $("#cityname_"+id).val();
	var c_sort = $("#citysort_"+id).val();
	var letter = $("#letter_"+id).val();
	var display = $("#display_"+id).val();
	var sitetype = $("#sitetype_"+id).val();
	if(name == "")
	{
		parent.layer.msg("城市名称不能为空！",2, 8);
		return false;
	}else{
		if(sitetype!="1")
		{
			sitetype="0";
		}
		$.post("index.php?m=admin_city&c=Single",{id:id,name:name,c_sort:c_sort,letter:letter,display:display,sitetype:sitetype,pytoken:$('#pytoken').val()},function(data){
			if(data=="2")
			{
				parent.layer.msg("城市名称不能为空！",2, 8);
			}else{
				parent.layer.msg("更新成功！",2, 9);
			}
		});
	}
}
<?php echo '</script'; ?>
>
<title>后台管理</title>
</head>
<body class="body_ifm">
<span id="temp"></span>
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
  <div class="infoboxp_top">
<span class="admin_title_span">地区设置</span>
    <div class="infoboxp_right" style="float:right; line-height:38px;"><em>提示：多城市显示只支持二级城市，增加子类需勾选父级城市！</em></div>
  </div>
  <div class="table-list">
    <div class="admin_table_border">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php?m=admin_city&c=upp" method="post" target="supportiframe" id='myform'>
      <input type="hidden" id="pytoken" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th width="60" align="left">选择</th>
              <th width="160" align="left">城市排序</th>
              <th align="left">城市名称</th>
              <th align="left">关联字母</th>
              <th align="left">前台显示</th>
              <th align="left">多城市显示</th>
              <th width="180" align="left" class="admin_table_th_bg">操作</th>
            </tr>
          </thead>
          <tbody>
          <?php  $_smarty_tpl->tpl_vars['city_row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city_row']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city_row']->key => $_smarty_tpl->tpl_vars['city_row']->value) {
$_smarty_tpl->tpl_vars['city_row']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['city_row']->key;
?>
          <tr align="left" id="<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
" style="display:" <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?>>
            <td class="ud"><input type="checkbox" class="checkbox_all" name="checkbox_all" value="<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
"></td>
            <td class="ud"><input type="text" name="citysort_<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
" id="citysort_<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['city_row']->value['sort'];?>
" class="input-text  citysort"></td>
            <td class="ud"><input class="input-text" type="text" id="cityname_<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
" name="cityname_<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['city_row']->value['name'];?>
" />
              <b  id="img<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
"><a href="javascript:;" onClick="addcity('<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
','2','parent');"><img src="images/iconv/jia.png" /></a></b></td>
            <td class="ud">
            <select id="letter_<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
" name="letter_<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
">
                <?php  $_smarty_tpl->tpl_vars['letter4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['letter4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['letter']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['letter4']->key => $_smarty_tpl->tpl_vars['letter4']->value) {
$_smarty_tpl->tpl_vars['letter4']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['letter4']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['letter4']->value==$_smarty_tpl->tpl_vars['city_row']->value['letter']) {?> selected=selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['letter4']->value;?>
</option>
                <?php } ?>
            </select>
            </td>
            <td class="ud"><select id="display_<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
" name="display_<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
">
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['city_row']->value['display']=='1') {?>selected=selected<?php }?>>是</option>
                <option value="0" <?php if ($_smarty_tpl->tpl_vars['city_row']->value['display']=='0') {?>selected=selected<?php }?>>否</option>
              </select>
            </td>
            <td class="ud"><font color="#FF0000"></font> </td>
            <td class="ud">
            <input class="admin_submit4" type="button" name="update" value="更新" onClick="checkedtr('<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
');"/>
              | <a href="javascript:;" onClick="delsingle('<?php echo $_smarty_tpl->tpl_vars['city_row']->value['id'];?>
','1')" class="admin_cz_sc">删除</a></td>
          </tr>
          <?php } ?>
          <tr align="left" id="0">
            <td colspan="7"><a href="javascript:;" onClick="addson('0','top');"><img src="images/iconv/jia.png" />添加顶级分类</a></td>
          </tr>
          <thead>
            <tr>
              <td width="70" colspan="1"><input type="checkbox" id="checkbox_all" name="checkbox_all" value="">
              <label for="checkbox_all">全选</label>&nbsp;
                <input type="hidden" name="id" id="hiddid_id" value="">
              </td>
              <td width="60" colspan="1"><input class="admin_submit4"  type="button" name="delall" onClick="return really('checkbox_all')"  value="删除选中" />
              </td>
              <td width="60" colspan="5"><input class="admin_submit4"  type="submit" name="updateall"   value="保存操作" />
              </td>
            </tr>
          </thead>
        </table>
      </form>
    </div>
  </div>
</div>
<div id="trid" style="display:none">
  <select name="letter">
    <?php  $_smarty_tpl->tpl_vars['letter4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['letter4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['letter']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['letter4']->key => $_smarty_tpl->tpl_vars['letter4']->value) {
$_smarty_tpl->tpl_vars['letter4']->_loop = true;
?>
    	<option value="<?php echo $_smarty_tpl->tpl_vars['letter4']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['letter4']->value;?>
</option>
    <?php } ?>
  </select>
</div>
<?php echo '<script'; ?>
>
$(document).ready(function(){
	$(".checkbox_all").click(function(){
		get_comindes_jobid();
	})
	$("#checkbox_all").click(function(){
		var checka=$("#checkbox_all").attr("checked");
		if(checka!="checked"){
			checka=false;
		}
		$(".checkbox_all").attr("checked",checka);
		get_comindes_jobid();
	})
})
function get_comindes_jobid(){
		var codewebarr="";
		$(".checkbox_all:checked").each(function(){
			if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
		});
		$("#hiddid_id").val(codewebarr);
}
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
