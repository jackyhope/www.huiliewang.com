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
<title>后台管理</title>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div id="subboxdiv" style="width:100%;height:100%;display:none;position:absolute;"></div>
<div class="infoboxp_top infoboxp_topIjf">
    <span class="infoboxp_top_span">页面设置</span>
</div>
<div class="main_tag">
<div class="clear"></div>
<div class="tag_box">
<div>
<form method="post">
<table width="100%" class="table_form">
  <tr>
           <th width="220" bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
          <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
    </tr>
  <tr class="admin_table_trbg">
    	<th width="220">伪静态设置：</th>
		<td>
            <div class="iradio_flat_height">
             <input type="radio" name="sy_seo_rewrite" value="0" id="RadioGroup2_12" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_seo_rewrite']=="0") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="RadioGroup2_12">原链接</label>&nbsp;&nbsp;</span>
          <input type="radio" name="sy_seo_rewrite" value="1" id="RadioGroup2_13" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_seo_rewrite']=="1") {?>checked<?php }?>>
         <span class="iradio_flat_left"> <label for="RadioGroup2_13">伪静态</label></span>
          <span class="radio_admin_web_tip">修改伪静态之前要先根据服务器添加伪静态规则</span>
          </div>
        </td>
    </tr> 
	<tr>
    	<th width="220">头部浮动导航：</th>
		<td>
             <div class="iradio_flat_height">
             <input type="radio" name="sy_header_fix" value="0" id="sy_header_fix_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_header_fix']=="0") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_header_fix_0">关闭</label>&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_header_fix" value="1" id="sy_header_fix_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_header_fix']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_header_fix_1">开启</label></span>
          </div>
        </td>
    </tr>       
	 <tr class="admin_table_trbg">
    	<th width="220">新闻显示形式：</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="sy_news_rewrite" value="1" id="sy_news_rewrite_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_news_rewrite']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_news_rewrite_1">动态</label>&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_news_rewrite" value="2" id="sy_news_rewrite_2" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_news_rewrite']=="2") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_news_rewrite_2">静态</label></span>
          <span class="radio_admin_web_tip">修改为静态，访问时显示静态页内容，提升效率</span>
          </div>
        </td>
    </tr> 	
	<tr >
    	<th width="220">友情链接申请：</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="sy_linksq" value="0" id="sy_linksq_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_linksq']=="0") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_linksq_0">开启</label>&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_linksq" value="1" id="sy_linksq_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_linksq']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_linksq_1">关闭</label></span>
          </div>
        </td>
    </tr>
	
	<tr class="admin_table_trbg">
    	<th width="220">手机端自动跳转到wap：</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="sy_wap_jump" value="1" id="sy_wap_jump_4" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wap_jump']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_linksq_4">开启</label>&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_wap_jump" value="0" id="sy_wap_jump_5" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wap_jump']=="0") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="sy_linksq_5">关闭</label></span>
          </div>
        </td>
    </tr>
	<tr >
    	<th width="220"><font color="red">找人才页面默认显示类别</font>：</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="sy_default_userclass" value="1" id="RadioGroup10_16" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_default_userclass']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="RadioGroup10_16">是</label>&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_default_userclass" value="2" id="RadioGroup10_17" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_default_userclass']=="2") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="RadioGroup10_17">否</label></span>
         <span class="radio_admin_web_tip">若选择"否"，则直接显示简历列表</span>
         </div>
        </td>
    </tr>
	<tr class="admin_table_trbg">
    	<th width="220"><font color="red">找工作页面默认显示类别</font>：</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="sy_default_comclass" value="1" id="RadioGroup10_14" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_default_comclass']=="1") {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="RadioGroup10_14">是</label>&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="sy_default_comclass" value="2" id="RadioGroup10_15" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_default_comclass']=="2") {?>checked<?php }?>>
         <span class="iradio_flat_left"> <label for="RadioGroup10_15">否</label></span>
         <span class="radio_admin_web_tip">若选择"否"，则直接显示职位列表</span>
         </div>
        </td>
    </tr> 
	<tr class="admin_table_trbg">
		<th width="220">前台列表最大展示数量：</th>
		<td><input class="input_text_w150" type="text" name="sy_indexpage" id="sy_indexpage" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_indexpage'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/>  <span class="admin_web_tip">提示：0为不限</span></td>
	</tr>
	<tr>
		<th width="220">未登录用户可访问简历数量：</th>
		<td><input class="input_text_w150" type="text" name="sy_resume_visitors" id="sy_resume_visitors" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_resume_visitors'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/>   <span class="admin_web_tip">提示：0为不限</span></td>
	</tr> 
	<tr class="admin_table_trbg">
		<th width="220">前台店铺招聘发布次数：</th>
		<td><input class="input_text_w150" type="text" name="sy_once" id="sy_once" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_once'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> 次/天&nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">提示：0为不限</span></td>
	</tr>
	<tr>
		<th width="220">同一IP点击广告记录间隔：</th>
		<td><input class="input_text_w150" type="text" name="sy_adclick" id="sy_adclick" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_adclick'];?>
" size="10" maxlength="255"  onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> 小时 &nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">提示：0为不限，其他数字为期限内只记录一次</span></td>
	</tr>
	<tr class="admin_table_trbg">
		<th width="220">前台普工简历发布次数：</th>
		<td><input class="input_text_w150" type="text" name="sy_tiny" id="sy_tiny" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_tiny'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> 次/天&nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">提示：0为不限</span></td>
	</tr>
	<tr class="admin_table_trbg">
		<th width="220">前台问答发布次数：</th>
		<td><input class="input_text_w150" type="text" name="sy_day_ask_num" id="sy_day_ask_num" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_day_ask_num'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> 次/天&nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">提示：0为不限</span></td>
	</tr>

	<tr class="admin_table_trbg">
    	<th width="220">问答审核：</th>
		<td>
           <div class="iradio_flat_height">
          <input type="radio" name="ask_check" value="1" id="ask_check_1" <?php if ($_smarty_tpl->tpl_vars['config']->value['ask_check']==1) {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="ask_check_1">开启</label>&nbsp;&nbsp;&nbsp;</span>
          <input type="radio" name="ask_check" value="0" id="ask_check_0" <?php if ($_smarty_tpl->tpl_vars['config']->value['ask_check']!=1) {?>checked<?php }?>>
          <span class="iradio_flat_left"><label for="ask_check_0">关闭</label></span>
          <span class="radio_admin_web_tip">开启后，发布的问题默认未审核。关闭审核则发布的问题默认审核通过。</span>
          </div>
        </td>
    </tr>

  <tr class="admin_table_trbg">
    <th width="220">每天推荐职位/简历最大次数：</th>
    <td><input class="input_text_w150" type="text" name="sy_recommend_day_num" id="sy_recommend_day_num" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_recommend_day_num'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> 次/天&nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">提示：0为不限</span></td>
  </tr>

  <tr class="admin_table_trbg">
    <th width="220">推荐职位/简历最小时间间隔(单位：秒)：</th>
    <td><input class="input_text_w150" type="text" name="sy_recommend_interval" id="sy_recommend_interval" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_recommend_interval'];?>
" size="10" maxlength="255" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> 秒&nbsp;&nbsp;&nbsp;  <span class="admin_web_tip">提示：0为不限</span></td>
  </tr>

	<tr class="admin_table_trbg">
		<th width="220">职位自动刷新触发时间：</th>
		<td><input class="input_text_w150" type="text" name="sy_autoref" id="sy_autoref" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_autoref'];?>
" size="10" maxlength="2" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/> 时/每天&nbsp;&nbsp;  <span class="admin_web_tip">提示：填写如 8 时/每天（24小时格式）该设置确保自动刷新会在设定时间后才被触发，避免刷新时间出现 00：00等情况</span></td>
	</tr>
	<tr>
		<th width="220">职位自动刷新时间随机：</th>
		<td> 
          <div class="iradio_flat_height">
          <input type="radio" name="sy_autorefrand" value="1" id="sy_autorefrand_14" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_autorefrand']=="1") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_autorefrand_14"> <label for="sy_autorefrand_14">是</label>&nbsp;&nbsp;</span>
          <input type="radio" name="sy_autorefrand" value="2" id="sy_autorefrand_15" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_autorefrand']=="2") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_autorefrand_14"> <label for="sy_autorefrand_15">否</label></span>
		   <span class="radio_admin_web_tip">提示：该设置可让每个自动刷新的职位刷新时间随机错开，不再统一为相同时间，更加真实，如数量较大则可能影响首次访问效率</span>
           </div>
        </td>
	</tr>
    <tr>
		<th width="220"><font color="red">百度自动推送功能</font>：</th>
		<td> 
          <div class="iradio_flat_height">
          <input type="radio" name="sy_zhanzhang_baidu" value="1" id="sy_zhanzhang_baidu_14" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_zhanzhang_baidu']=="1") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_outlinks_14"> <label for="sy_zhanzhang_baidu_14">是</label>&nbsp;&nbsp;</span>
          <input type="radio" name="sy_zhanzhang_baidu" value="2" id="sy_zhanzhang_baidu_15" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_zhanzhang_baidu']=="2") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_outlinks_14"> <label for="sy_zhanzhang_baidu_15">否</label></span>
           </div>
        </td>
	</tr>
    <tr class="admin_table_trbg">
		<th width="220">外部链接：</th>
		<td> 
           <div class="iradio_flat_height">
           <input type="radio" name="sy_outlinks" value="1" id="sy_outlinks_14" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_outlinks']=="1") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_outlinks_14">是</label>&nbsp;&nbsp;</span>
          <input type="radio" name="sy_outlinks" value="2" id="sy_outlinks_15" <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_outlinks']=="2") {?>checked<?php }?>>
           <span class="iradio_flat_left"><label for="sy_outlinks_15">否</label></span>
          </div>
        </td>
	</tr>
    <tr>
		<th width="220">特别申明：</th>
		<td><textarea type="radio" name="sy_shenming" id="sy_shenming" class="web_text_textarea" ><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_shenming'];?>
 </textarea><span class="admin_web_tip">如：用人单位不得以任何名义收取求职者任何形式的费用</span>
        </td>
	</tr>
  	<tr class="admin_table_trbg">
		<th width="220">职位简历点击器：</th>
		<td>1-<input class="input-text tips_class input_text_rp" type="text" name="sy_job_hits" id="sy_job_hits" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_job_hits'];?>
" size="10" /><span class="admin_web_tip">最小为1，最大为100，每次在1-X范围随机增加</span></td>
	</tr>
    <tr>
		<td colspan="2" align="center">
        <input class="admin_submit4" id="config" type="button" name="config" value="提交" />&nbsp;&nbsp;
        <input class="admin_submit4" type="reset" value="重置" /></td>
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
