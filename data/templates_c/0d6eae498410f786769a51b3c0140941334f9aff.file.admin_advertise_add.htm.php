<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-25 17:53:32
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_advertise_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:18367745545b07dd1ca06165-42876030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d6eae498410f786769a51b3c0140941334f9aff' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_advertise_add.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18367745545b07dd1ca06165-42876030',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'info' => 0,
    'Dname' => 0,
    'class' => 0,
    'list' => 0,
    'lasturl' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b07dd1cac2674_23966970',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b07dd1cac2674_23966970')) {function content_5b07dd1cac2674_23966970($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<?php echo '<script'; ?>
>
function checkform(){
	if($("#ad_name").val()==""){ 
		parent.layer.msg('广告名称不能为空！', 2,8);
		return false;
	}
	if($("#ad_start").val()==""){ 
		parent.layer.msg('请填写开始时间！', 2,8);
		return false;
	}
	if($("#ad_end").val()==""){ 
		parent.layer.msg('请填写结束时间！', 2,8);
		return false;
	}
	if($("#ad_start").val()!="" && $("#ad_end").val()!="" ){
		 var time1 = $("#ad_start").val() ;
		 var time2 = $("#ad_end").val();
		 time1arr = time1.split("-");
		 time2arr = time2.split("-");
		 date1 = new Date(time1arr[0],time1arr[1],time1arr[2]);
		 date2 = new Date(time2arr[0],time2arr[1],time2arr[2]);
		 if(date1>date2){ 
			 parent.layer.msg('结束时间不得低于开始时间，请重新设定！', 2,8);
			 return false;
		}
	} 
	var item = $('input[name="ad_type"]:checked').val();
	
	if(!item){
		 parent.layer.msg('请选择一种广告类型！', 2,8); return false;
	}else{ 
		if(item=="word"&&$("input[name=word_info]").val()==""){
			parent.layer.msg('请填写文字信息！', 2,8); return false;
		}
	}
}
function replace_type(type){
	if(type=="word"){
		$("#word").attr("style","display:");
		$("#pic").attr("style","display:none");
		$("#flash").attr("style","display:none");
		$("#lianmeng").attr("style","display:none");
	}else if(type=="pic"){
		$("#word").attr("style","display:none");
		$("#pic").attr("style","display:");
		$("#flash").attr("style","display:none");
		$("#lianmeng").attr("style","display:none");
	}else if(type=="flash"){
		$("#word").attr("style","display:none");
		$("#pic").attr("style","display:none");
		$("#flash").attr("style","display:");
		$("#lianmeng").attr("style","display:none");
	}else if(type=="lianmeng"){
		$("#word").attr("style","display:none");
		$("#pic").attr("style","display:none");
		$("#flash").attr("style","display:none");
		$("#lianmeng").attr("style","display:");
	}
}
function adpic_url(){
	$("#typeid").html("<input  type='file' id='pic_url' name='ad_url' value='' class=\"input-text\"><label><input id='upload' type='radio' name='upload'  onclick='adpic_src();'>远程地址</label><label><input id='upload_pic' type='radio' checked name='upload' onclick='adpic_url();'>本地上传</label>");
}
function adpic_src(){
	$("#typeid").html("<input class='input-text'  type='text' id='pic_url' name='ad_url' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['pic_url'];?>
'><label><input id='upload' checked type='radio' name='upload'>远程地址</label><label><input id='upload_pic' type='radio' name='upload' onclick='adpic_url();'>本地上传</label>");
} 
function adflash_url(){
	$("#flashid").html("<input  type='file'  name='ad_url' value='' class=\"input-text\"><label><input id='flash'  type='radio' name='flash'  onclick='adflash_src();' >远程地址</label><label><input id='upload_flash' type='radio' checked name='upload_flash' onclick='adflash_url();'>本地上传</label>");
}
function adflash_src(){
	$("#flashid").html("<input class='input-text'  type='text'  name='ad_url' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['flash_url'];?>
'><label><input id='upload' checked type='radio' name='upload' >远程地址</label><label><input id='upload_pic' type='radio' name='upload' onclick='adflash_url();'>本地上传</label>");
}
<?php echo '</script'; ?>
>
<style>
* {margin: 0 ;padding: 0;}
body,div{ margin: 0 ;padding: 0;}
</style>
<title>后台管理</title>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="admin_Prompt">
<div class="admin_Prompt_span">
    注意事项：添加广告时，请正确选择分类和类型。
</div><div class="admin_Prompt_close"></div></div>
  <div class="infoboxp_top">
      <span class="admin_title_span"><?php if (is_array($_smarty_tpl->tpl_vars['info']->value)) {?>更新广告<?php } else { ?>添加广告<?php }?></span>
      </div>
   <div class="clear"></div>
  <div class="admin_table_border">
  <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
  <form name="myform" target="supportiframe" action="<?php if (is_array($_smarty_tpl->tpl_vars['info']->value)) {?>index.php?m=advertise&c=modify_save<?php } else { ?>index.php?m=advertise&c=ad_saveadd<?php }?>" method="post" encType="multipart/form-data" onsubmit="return checkform();">
    <table width="100%" class="table_form" style="background:#fff">
      <tr >
        <th width="200">广告名称：</th>
        <td>
        <input class="input-text" id="ad_name" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['ad_name'];?>
" name="ad_name" size="30">
        <label><input type="checkbox" name="target" value="2" <?php if ($_smarty_tpl->tpl_vars['info']->value['target']!=1) {?>checked<?php }?>>新窗口打开</label>
        </td>
      </tr>
     <tr class="admin_table_trbg">
        <th width="200">使用范围：</th>
        <td><input type="button" value="<?php if ($_smarty_tpl->tpl_vars['info']->value['did']) {
echo $_smarty_tpl->tpl_vars['Dname']->value[$_smarty_tpl->tpl_vars['info']->value['did']];
} else { ?>总站<?php }?>" class="city_news_but" onClick="add_site('<?php echo $_smarty_tpl->tpl_vars['info']->value['did'];?>
','<?php echo $_smarty_tpl->tpl_vars['Dname']->value[$_smarty_tpl->tpl_vars['info']->value['did']];?>
');">
        <input type="hidden" id="did" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['did'];?>
" name="did"></td>
      </tr> 
     	<tr>
        <th width="200">广告所属分类：</th>
        <td>
         <div class="yun_admin_select_box  yun_admin_select_boxw250 zindex100">
            <?php if ($_smarty_tpl->tpl_vars['info']->value['class_id']) {?>
        		<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['class']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['info']->value['class_id']==$_smarty_tpl->tpl_vars['list']->value['id']) {?>
                    <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['class_name'];?>
" class="yun_admin_select_box_text" id="adclass_name" onClick="select_click('adclass');">
                    <input name="class_id" type="hidden" id="adclass_val" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
                    <?php }?>
                <?php } ?>
            <?php } else { ?>
                <input type="button" value="请选择" class="yun_admin_select_box_text" id="adclass_name" onClick="select_click('adclass');">
                <input name="class_id" type="hidden" id="adclass_val" value="">
            <?php }?>
            
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw250 dn" id="adclass_select">     
        		<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['class']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                <div class="yun_admin_select_box_list">
                    <a href="javascript:;" onClick="select_new('adclass','<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['list']->value['class_name'];?>
')"><?php echo $_smarty_tpl->tpl_vars['list']->value['class_name'];?>
</a>
                </div>                    
                <?php } ?>
            </div>
        </div>
        </td>
      </tr> 
	  <tr class="admin_table_trbg">
        <th width="200">广告是否启用：</th>
        <td>
		<label class="admin_radio_box"><input name='is_open' value='1' type='radio' checked class="admin_radio_box_r">启用</label>
		<label class="admin_radio_box"><input name='is_open' value='0' <?php if ('0'==$_smarty_tpl->tpl_vars['info']->value['is_open']) {?>checked<?php }?> type='radio' class="admin_radio_box_r">关闭</label>
		</td>
      </tr>
	  <tr>
        <th width="200">排序：</th>
        <td><input id="sort" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['sort'];?>
" name="sort" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"><span class="admin_web_tip">越大越在前</span></td>
      </tr>
      <tr class="admin_table_trbg">
        <th width="200">广告有效期：</th>
        <td>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/css/font-awesome.min.css" type="text/css">  
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/foundation-datepicker.min.js"><?php echo '</script'; ?>
>
       <div class="admin_zph_date">
        开始时间：
        <input id="ad_start" class="zph_text" type="text" readonly size="20" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['time_start'];?>
" name="time_start"> 
        </div>
       <div class="admin_zph_date">
       结束时间：
        <input id="ad_end" class="zph_text" type="text" readonly size="20" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['time_end'];?>
" name="time_end">
        </div>
        <?php echo '<script'; ?>
 type="text/javascript"> 
		var checkin = $('#ad_start').fdatepicker({
			format: 'yyyy-mm-dd',startView:4,minView:2
		}).on('changeDate', function (ev) {
			if (ev.date.valueOf() > checkout.date.valueOf()) {
				var newDate = new Date(ev.date)
				newDate.setDate(newDate.getDate() + 1);
				checkout.update(newDate);
			}
			checkin.hide();
			$('#ad_end')[0].focus();
		}).data('datepicker');
		var checkout = $('#ad_end').fdatepicker({
			format: 'yyyy-mm-dd',startView:4,minView:2,
			onRender: function (date) {
				return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function (ev) {
			checkout.hide();
		}).data('datepicker'); 
        <?php echo '</script'; ?>
>
          </td>
      </tr>
		<tr>
			<th width="200">备注：</th>
			<td><textarea cols="50" rows="3" name="remark"  class="admin_comdit_textarea"><?php echo $_smarty_tpl->tpl_vars['info']->value['remark'];?>
</textarea></td>
		</tr>
     	<tr>
        <th width="200">广告类型：</th>
        <td colspan="2">
        <label class="admin_radio_box"><input type="radio" id="word_ad" name="ad_type" value="word" onClick="replace_type('word');" <?php if ($_smarty_tpl->tpl_vars['info']->value['ad_type']=="word") {?>checked<?php }?> class="admin_radio_box_r">文字广告</label>
          <label class="admin_radio_box"><input value="pic" type="radio" id="pic_ad" name="ad_type" onClick="replace_type('pic');" <?php if ($_smarty_tpl->tpl_vars['info']->value['ad_type']=="pic") {?>checked<?php }?> class="admin_radio_box_r">图片广告</label>
         <label class="admin_radio_box"><input type="radio" value="flash" id="flash_ad" name="ad_type" onClick="replace_type('flash');"<?php if ($_smarty_tpl->tpl_vars['info']->value['ad_type']=="flash") {?>checked<?php }?> class="admin_radio_box_r">FLASH广告</label>         
         <label class="admin_radio_box"><input type="radio" value="lianmeng" id="lianmeng_ad" name="ad_type" onClick="replace_type('lianmeng');"<?php if ($_smarty_tpl->tpl_vars['info']->value['ad_type']=="lianmeng") {?>checked<?php }?> class="admin_radio_box_r">联盟广告</label>
          </td>
      </tr>
      <tr> 
      <td class="admin_table_trbg" colspan="2" style="padding:0; background:none">
      <table width="100%" id="word" style="display:none">
    	<tr class="admin_table_trbg">
           <th width="200" >文字信息：</th>
        <td ><input class='input-text' id="word_info" name='word_info' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['word_info'];?>
'></td>
      </tr>
      <tr>
        <th>文字链接：</th>
        <td><input class='input-text' id="word_url" name='word_url' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['word_url'];?>
'><span class="admin_web_tip">外部链接请加上“http://”</span></td>
      </tr>
      </table>
	   </td>
      </tr>
	  <tr>
      <td colspan="2" style="padding:0; background:none">
      <table id="pic" style="display:none;" width="100%">
      <tr class="admin_table_trbg">
        <th width="200" >图片地址：</th>
        <td  id='typeid'><input class='input-text' type='text' id='pic_url' name='pic_url' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['pic_url'];?>
'  >
          <label><input id='upload' checked type='radio' name='upload'>远程地址</label>
          <label><input id='upload_pic' type='radio' name='upload' onclick='adpic_url();'>本地上传</label>
          </td>
      </tr>
      <tr>
        <th width="200">图片链接：</th>
        <td><input class='input-text' id="pic_src" name='pic_src' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['pic_src'];?>
' ><span class="admin_web_tip">外部链接请加上“http://”</span></td>
      </tr>
      <tr class="admin_table_trbg">
        <th width="200">图片描述：</th>
        <td><input class='input-text' id="pic_content" name='pic_content' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['pic_content'];?>
' ><span class="admin_web_tip">例如：公司名称或图片介绍，可留空</span></td>
      </tr>
      <tr>
        <th width="200">图片宽度：</th>
        <td><input class='input-text' id="pic_width" size='8'onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" name='pic_width' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['pic_width'];?>
' style="width:90px;"> px(像素) &nbsp;&nbsp;图片高度：<input class='input-text' id="pic_height" size='8' onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" name='pic_height' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['pic_height'];?>
' style="width:90px;"> px(像素)</td>
      </tr>
       </table>
	   <table id="flash" style="display:none;" width="100%">
		   <tr class="admin_table_trbg">
			<th width="200">FLASH地址：</th>
			<td id='flashid'><input class='input-text' id="flash_url"  name='flash_url' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['flash_url'];?>
'   >
			  <label><input type='radio' id='flash' checked name='flash'>远程地址</label>
			 <label> <input type='radio' id='upload_flash' name='upload_flash'  onclick='adflash_url();'>本地上传</label>
             </td>
		  </tr>
		  <tr>
			  <th >FLASH宽度：</th>
			<td><input class='input-text' id="flash_width" name='flash_width' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['flash_width'];?>
'>
            <span class="fl" style="line-height:38px;padding-left:10px;">FLASH高度：</span><input class='input-text' id="flash_height" name='flash_height' value='<?php echo $_smarty_tpl->tpl_vars['info']->value['flash_height'];?>
'></td>
      </tr>
      </table>
      <table id="lianmeng" style="display:none;" width="100%">
		   <tr class="admin_table_trbg">
			<th width="200">联盟广告代码：</th>
			<td id='lianmengid'>
            <textarea class="admin_comdit_textarea" cols="50" rows="3" id="lianmeng_url"  name='lianmeng_url'><?php echo $_smarty_tpl->tpl_vars['info']->value['lianmeng_url'];?>
</textarea>
             </td>
		  </tr>
      </table>
      </td>
      </tr>
      <?php if (is_array($_smarty_tpl->tpl_vars['info']->value)) {?>
      <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
">
      <input type="hidden" name="lasturl" value="<?php echo $_smarty_tpl->tpl_vars['lasturl']->value;?>
">
      <?php }?>
      <tr class="admin_table_trbg">
        <td align="center" colspan="2">
        <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input class="admin_submit4" type="submit" name="submit" value="&nbsp;提  交&nbsp;" />
        <input class="admin_submit4" type="reset" name="reset" value="&nbsp;重 置 &nbsp;" /></td>
      </tr>
    </table>
  </form>
</div></div>
<?php echo '<script'; ?>
>
replace_type("<?php echo $_smarty_tpl->tpl_vars['info']->value['ad_type'];?>
");
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['adminstyle']->value)."/checkdomain.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>
