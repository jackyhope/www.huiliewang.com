<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-18 15:39:16
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/web_config.htm" */ ?>
<?php /*%%SmartyHeaderCode:19360323335afe8324da8230-33835591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '744c7e154d099fcc68cb7dd6202d7d48c0149432' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/web_config.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19360323335afe8324da8230-33835591',
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
  'unifunc' => 'content_5afe8324e455b2_92070363',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afe8324e455b2_92070363')) {function content_5afe8324e455b2_92070363($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<title>��̨����</title>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div id="subboxdiv" style="width:100%;height:100%;display:none;position:absolute;"></div>
<div class="infoboxp_top infoboxp_topIjf">
    <span class="infoboxp_top_span">ҳ������</span>
</div>
<div class="main_tag">
<div class="clear"></div>
<div class="tag_box">
<div>
<form method="post">
<table width="100%" class="table_form">
  <tr>
           <th width="220" bgcolor="#f0f6fb"><span class="admin_bold">����˵��</span></th>
          <td bgcolor="#f0f6fb"><span class="admin_bold">����ֵ</span></td>
    </tr>
  <tr class="admin_table_trbg">
    	<th width="220">α��̬���ã�</th>
		<td>
            <div class="iradio_flat_height">
             <input type="radio" name="sy_seo_rewrite" value="0" id="RadioGroup2_12" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_seo_rewrite']=="0") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="RadioGroup2_12">ԭ����</label>&nbsp;&nbsp;</span>
          <input type="radio" name="sy_seo_rewrite" value="1" id="RadioGroup2_13" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_seo_rewrite']=="1") {?>checked<?php }?>>
         <span class="iradio_flat_left"> <label for="RadioGroup2_13">α��̬</label></span>
          <span class="radio_admin_web_tip">�޸�α��̬֮ǰҪ�ȸ��ݷ��������α��̬����</span>
          </div>
        </td>
    </tr> 
	<tr>
    	<th width="220">ͷ������������</th>
		<td>
             <div class="iradio_flat_height">
             <input type="radio" name="sy_header_fix" value="0" id="sy_header_fix_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_header_fix']=="0") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_header_fix_0">�ر�</label>&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_header_fix" value="1" id="sy_header_fix_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_header_fix']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_header_fix_1">����</label></span>
          </div>
        </td>
    </tr>       
	 <tr class="admin_table_trbg">
    	<th width="220">������ʾ��ʽ��</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="sy_news_rewrite" value="1" id="sy_news_rewrite_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_news_rewrite']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_news_rewrite_1">��̬</label>&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_news_rewrite" value="2" id="sy_news_rewrite_2" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_news_rewrite']=="2") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_news_rewrite_2">��̬</label></span>
          <span class="radio_admin_web_tip">�޸�Ϊ��̬������ʱ��ʾ��̬ҳ���ݣ�����Ч��</span>
          </div>
        </td>
    </tr> 	
	<tr >
    	<th width="220">�����������룺</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="sy_linksq" value="0" id="sy_linksq_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_linksq']=="0") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_linksq_0">����</label>&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_linksq" value="1" id="sy_linksq_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_linksq']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_linksq_1">�ر�</label></span>
          </div>
        </td>
    </tr>
	
	<tr class="admin_table_trbg">
    	<th width="220">�ֻ����Զ���ת��wap��</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="sy_wap_jump" value="1" id="sy_wap_jump_4" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wap_jump']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_linksq_4">����</label>&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_wap_jump" value="0" id="sy_wap_jump_5" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wap_jump']=="0") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_linksq_5">�ر�</label></span>
          </div>
        </td>
    </tr>
	<tr >
    	<th width="220"><font color="red">���˲�ҳ��Ĭ����ʾ���</font>��</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="sy_default_userclass" value="1" id="RadioGroup10_16" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_default_userclass']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="RadioGroup10_16">��</label>&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_default_userclass" value="2" id="RadioGroup10_17" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_default_userclass']=="2") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="RadioGroup10_17">��</label></span>
         <span class="radio_admin_web_tip">��ѡ��"��"����ֱ����ʾ�����б�</span>
         </div>
        </td>
    </tr>
	<tr class="admin_table_trbg">
    	<th width="220"><font color="red">�ҹ���ҳ��Ĭ����ʾ���</font>��</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="sy_default_comclass" value="1" id="RadioGroup10_14" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_default_comclass']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="RadioGroup10_14">��</label>&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_default_comclass" value="2" id="RadioGroup10_15" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_default_comclass']=="2") {?>checked<?php }?>>
         <span class="iradio_flat_left"> <label for="RadioGroup10_15">��</label></span>
         <span class="radio_admin_web_tip">��ѡ��"��"����ֱ����ʾְλ�б�</span>
         </div>
        </td>
    </tr> 
	<tr class="admin_table_trbg">
		<th width="220">ǰ̨�б����չʾ������</th>
		<td><input class="input_text_w150" type="text" name="sy_indexpage" id="sy_indexpage" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_indexpage'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/>  <span class="admin_web_tip">��ʾ��0Ϊ����</span></td>
	</tr>
	<tr>
		<th width="220">δ��¼�û��ɷ��ʼ���������</th>
		<td><input class="input_text_w150" type="text" name="sy_resume_visitors" id="sy_resume_visitors" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_resume_visitors'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/>   <span class="admin_web_tip">��ʾ��0Ϊ����</span></td>
	</tr> 
	<tr class="admin_table_trbg">
		<th width="220">ǰ̨������Ƹ����������</th>
		<td><input class="input_text_w150" type="text" name="sy_once" id="sy_once" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_once'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> ��/��&nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">��ʾ��0Ϊ����</span></td>
	</tr>
	<tr>
		<th width="220">ͬһIP�������¼�����</th>
		<td><input class="input_text_w150" type="text" name="sy_adclick" id="sy_adclick" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_adclick'];?>
" size="10" maxlength="255"  onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> Сʱ &nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">��ʾ��0Ϊ���ޣ���������Ϊ������ֻ��¼һ��</span></td>
	</tr>
	<tr class="admin_table_trbg">
		<th width="220">ǰ̨�չ���������������</th>
		<td><input class="input_text_w150" type="text" name="sy_tiny" id="sy_tiny" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_tiny'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> ��/��&nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">��ʾ��0Ϊ����</span></td>
	</tr>
	<tr class="admin_table_trbg">
		<th width="220">ǰ̨�ʴ𷢲�������</th>
		<td><input class="input_text_w150" type="text" name="sy_day_ask_num" id="sy_day_ask_num" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_day_ask_num'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> ��/��&nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">��ʾ��0Ϊ����</span></td>
	</tr>

	<tr class="admin_table_trbg">
    	<th width="220">�ʴ���ˣ�</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="ask_check" value="1" id="ask_check_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['ask_check']==1) {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="ask_check_1">����</label>&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="ask_check" value="0" id="ask_check_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['ask_check']!=1) {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="ask_check_0">�ر�</label></span>
          <span class="radio_admin_web_tip">�����󣬷���������Ĭ��δ��ˡ��ر�����򷢲�������Ĭ�����ͨ����</span>
          </div>
        </td>
    </tr>

  <tr class="admin_table_trbg">
    <th width="220">ÿ���Ƽ�ְλ/������������</th>
    <td><input class="input_text_w150" type="text" name="sy_recommend_day_num" id="sy_recommend_day_num" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_recommend_day_num'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> ��/��&nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">��ʾ��0Ϊ����</span></td>
  </tr>

  <tr class="admin_table_trbg">
    <th width="220">�Ƽ�ְλ/������Сʱ����(��λ����)��</th>
    <td><input class="input_text_w150" type="text" name="sy_recommend_interval" id="sy_recommend_interval" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_recommend_interval'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> ��&nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">��ʾ��0Ϊ����</span></td>
  </tr>

	<tr class="admin_table_trbg">
		<th width="220">ְλ�Զ�ˢ�´���ʱ�䣺</th>
		<td><input class="input_text_w150" type="text" name="sy_autoref" id="sy_autoref" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_autoref'];?>
" size="10" maxlength="2" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> ʱ/ÿ��&nbsp;&nbsp;  <span class="admin_web_tip">��ʾ����д�� 8 ʱ/ÿ�죨24Сʱ��ʽ��������ȷ���Զ�ˢ�»����趨ʱ���ű�����������ˢ��ʱ����� 00��00�����</span></td>
	</tr>
	<tr>
		<th width="220">ְλ�Զ�ˢ��ʱ�������</th>
		<td> 
          <div class="iradio_flat_height">
          <input type="radio" name="sy_autorefrand" value="1" id="sy_autorefrand_14" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_autorefrand']=="1") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_autorefrand_14"> <label for="sy_autorefrand_14">��</label>&nbsp;&nbsp;</span>
          <input type="radio" name="sy_autorefrand" value="2" id="sy_autorefrand_15" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_autorefrand']=="2") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_autorefrand_14"> <label for="sy_autorefrand_15">��</label></span>
		   <span class="radio_admin_web_tip">��ʾ�������ÿ���ÿ���Զ�ˢ�µ�ְλˢ��ʱ�������������ͳһΪ��ͬʱ�䣬������ʵ���������ϴ������Ӱ���״η���Ч��</span>
           </div>
        </td>
	</tr>
    <tr>
		<th width="220"><font color="red">�ٶ��Զ����͹���</font>��</th>
		<td> 
          <div class="iradio_flat_height">
          <input type="radio" name="sy_zhanzhang_baidu" value="1" id="sy_zhanzhang_baidu_14" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_zhanzhang_baidu']=="1") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_outlinks_14"> <label for="sy_zhanzhang_baidu_14">��</label>&nbsp;&nbsp;</span>
          <input type="radio" name="sy_zhanzhang_baidu" value="2" id="sy_zhanzhang_baidu_15" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_zhanzhang_baidu']=="2") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_outlinks_14"> <label for="sy_zhanzhang_baidu_15">��</label></span>
           </div>
        </td>
	</tr>
    <tr class="admin_table_trbg">
		<th width="220">�ⲿ���ӣ�</th>
		<td> 
           <div class="iradio_flat_height">
           <input type="radio" name="sy_outlinks" value="1" id="sy_outlinks_14" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_outlinks']=="1") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_outlinks_14">��</label>&nbsp;&nbsp;</span>
          <input type="radio" name="sy_outlinks" value="2" id="sy_outlinks_15" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_outlinks']=="2") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_outlinks_15">��</label></span>
          </div>
        </td>
	</tr>
    <tr>
		<th width="220">�ر�������</th>
		<td><textarea type="radio" name="sy_shenming" id="sy_shenming" class="web_text_textarea" ><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_shenming'];?>
 </textarea><span class="admin_web_tip">�磺���˵�λ�������κ�������ȡ��ְ���κ���ʽ�ķ���</span>
        </td>
	</tr>
  	<tr class="admin_table_trbg">
		<th width="220">ְλ�����������</th>
		<td>1-<input class="input-text tips_class input_text_rp" type="text" name="sy_job_hits" id="sy_job_hits" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_job_hits'];?>
" size="10" /><span class="admin_web_tip">��СΪ1�����Ϊ100��ÿ����1-X��Χ�������</span></td>
	</tr>
    <tr>
		<td colspan="2" align="center">
        <input class="admin_submit4" id="config" type="button" name="config" value="�ύ" />&nbsp;&nbsp;
        <input class="admin_submit4" type="reset" value="����" /></td>
	</tr>
</table>
</form>
</div>

</div>
</div>
</div>
<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
<?php echo '<script'; ?>
>
$(function(){
	$(".tips_class").hover(function(){ 
		var msg_id=$(this).attr('id'); 
		var msg=$('#'+msg_id+' + font').html();
		if($.trim(msg)!=''){
			layer.tips(msg, this, {
			guide: 1, 
			style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC']
			}); 
			$(".xubox_layer").addClass("xubox_tips_border");
		} 
	},function(){
		var msg_id=$(this).attr('id');
		var msg=$('#'+msg_id+' + font').html();
		if($.trim(msg)!=''){
			layer.closeTips();
		} 
	});
	$("#config").click(function(){
		$.post("index.php?m=web_config&c=save",{
			config : $("#config").val(),
			sy_seo_rewrite : $("input[name=sy_seo_rewrite]:checked").val(), 
			sy_header_fix : $("input[name=sy_header_fix]:checked").val(), 
			sy_news_rewrite : $("input[name=sy_news_rewrite]:checked").val(), 
			sy_linksq : $("input[name=sy_linksq]:checked").val(),
			sy_wap_jump : $("input[name=sy_wap_jump]:checked").val(),
			ask_check : $("input[name=ask_check]:checked").val(),
			sy_default_comclass : $("input[name=sy_default_comclass]:checked").val(),
			sy_zhanzhang_baidu : $("input[name=sy_zhanzhang_baidu]:checked").val(),
			sy_default_userclass : $("input[name=sy_default_userclass]:checked").val(), 
			sy_once : $("#sy_once").val(),
			sy_job_hits : $("input[name=sy_job_hits]").val(),
			sy_indexpage : $("#sy_indexpage").val(),
			sy_resume_visitors : $("#sy_resume_visitors").val(), 
			sy_tiny : $("#sy_tiny").val(),
			sy_day_ask_num : $("#sy_day_ask_num").val(),
			sy_adclick : $("#sy_adclick").val(),
			sy_outlinks : $("input[name=sy_outlinks]:checked").val(),
			sy_shenming : $("#sy_shenming").val(),
			sy_autoref : $("#sy_autoref").val(),
			sy_autorefrand : $("input[name=sy_autorefrand]:checked").val(),
      sy_recommend_day_num : $("#sy_recommend_day_num").val(),
      sy_recommend_interval : $("#sy_recommend_interval").val(),

			pytoken : $("#pytoken").val()
		},function(data,textStatus){
			config_msg(data);
		});
	});
})
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
