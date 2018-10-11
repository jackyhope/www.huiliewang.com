<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:02:57
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_integral_config.htm" */ ?>
<?php /*%%SmartyHeaderCode:9836543855afd45411abfd3-23554395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd08fb327f212f2e49e083b73400a0f558234176a' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_integral_config.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9836543855afd45411abfd3-23554395',
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
  'unifunc' => 'content_5afd45412f35e7_48274974',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd45412f35e7_48274974')) {function content_5afd45412f35e7_48274974($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<div id="subboxdiv" style="width:100%;height:100%;display:none;position:absolute;"></div>
<div class="admin_h1_bg infoboxp_topIjf">
    <span class="infoboxp_top_span"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
设置</span>
	<span class="infoboxp_top_span_sz infoboxp_top_span_sz_in "><a href="index.php?m=integral"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
设置</a></span>
	<span class="infoboxp_top_span_sz"><a href="index.php?m=integral&c=spend">消费设置</a></span>
    <span class="infoboxp_top_span_sz"><a href="index.php?m=integral&c=user">个人<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</a></span>
	<span class="infoboxp_top_span_sz"><a href="index.php?m=integral&c=com">企业<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</a></span>
</div>
<div class="main_tag">
<div class="tag_box">
<div>
<table width="100%" class="table_form">
  <tr class="admin_table_trbg">
         <th width="220" bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
          <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
    </tr>
	<tr class="admin_table_trbg">
		<th width="220"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
代替词：</th>
		<td><input class="input-text tips_class" type="text" name="integral_pricename" id="integral_pricename" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
" size="20" maxlength="255"/> <span class="admin_web_tip">默认为<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
，例：金币</span></td>
	</tr>
	    <tr>
		<th width="220"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
最低充值限制：</th>
		<td><input class="input-text tips_class" type="text" name="integral_min_recharge" id="integral_min_recharge" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_min_recharge'];?>
" size="20" maxlength="255"/> <span class="admin_web_tip">0 表示不限</span></td>
	</tr>
	 <tr>
		<th width="220">金额最低充值限制：</th>
		<td><input class="input-text tips_class" type="text" name="money_min_recharge" id="money_min_recharge" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['money_min_recharge'];?>
" size="20" maxlength="255"/> <span class="admin_web_tip">0 表示不限</span></td>
	</tr>
    <tr class="admin_table_trbg">
		<th width="220"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
单位：</th>
		<td><input class="input-text tips_class" type="text" name="integral_priceunit" id="integral_priceunit" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];?>
" size="20" maxlength="255"/> <span class="admin_web_tip">默认为点，例：个，位</span></td>
	</tr>
    <tr>
		<th width="220"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
兑换比例：</th>
		<td><input class="input-text tips_class" type="text" name="integral_proportion" id="integral_proportion" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_proportion'];?>
" size="20" maxlength="255"/> 点 <span class="admin_web_tip">例：1元=30点<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</span></td>
	</tr>
	<tr>
		<th width="220">每日签到送<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
：</th>
		<td><input class="input-text tips_class" type="text" name="integral_signin" id="integral_signin" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_signin'];?>
" size="20" maxlength="255"  onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
  <font color="gray">第六日起，获得<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
将翻倍。</font></td>
	</tr>
    <tr class="admin_com_td_bg">
	<th width="220">会员注册：</th>
		<td>
        <!--
        <select id="integral_reg_type">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_reg_type']=="1") {?>selected<?php }?>>加</option>
        </select>
        --> 
      <div class="yun_admin_select_box  yun_admin_select_boxw70  z_index13">  
      <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_reg_type']) {?> 
      <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_reg_type']==1) {?>
      <input type="button" value="加" class="yun_admin_select_box_text" id="integral_reg_type_name" onClick="select_click('integral_reg_type');">
      <input name="integral_reg_type" type="hidden" id="integral_reg_type_val" value="1">
      <!--这块后加--> 
      <?php }?>     
      <?php } else { ?>
     <input type="button" value="请选择" class="yun_admin_select_box_text" id="integral_reg_type_name" onClick="select_click('integral_reg_type');">
      <input name="integral_reg_type" type="hidden" id="integral_reg_type_val" value="" >
      <!--这块后加-->   
      <?php }?>                                                                          
      <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw70 dn" id="integral_reg_type_select"> 
      <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_reg_type','1','加')">加</a> </div>            
      </div>
      </div>     
         <input class="input-text" type="text" name="integral_reg" id="integral_reg" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_reg'];?>
" size="13" maxlength="255" onKeyUp="this.value=this.value.replace(/[^0-9.]/g,'')"/> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </td>
	</tr>
    <tr>
	<th width="220">每天第一次登录：</th>
		<td>
        
        <!--
        <select id="integral_login_type">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_login_type']=="1") {?>selected<?php }?>>加</option>
        <option value="2" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_login_type']=="2") {?>selected<?php }?>>减</option>
        </select>
        -->
        <div class="yun_admin_select_box  yun_admin_select_boxw70  z_index12">   
        
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_login_type']) {?> 
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_login_type']==1) {?>
          <input type="button" value="加" class="yun_admin_select_box_text" id="integral_login_type_name" onClick="select_click('integral_login_type');">
          <input name="integral_login_type" type="hidden" id="integral_login_type_val" value="1">
          <!--这块后加--> 
          <?php }?>     
         
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_login_type']==2) {?>
          <input type="button" value="减" class="yun_admin_select_box_text" id="integral_login_type_name" onClick="select_click('integral_login_type');">
          <input name="integral_login_type" type="hidden" id="integral_login_type_val" value="2">
          <!--这块后加--> 
          <?php }?>
          
          <?php } else { ?>
          <input type="button" value="请选择" class="yun_admin_select_box_text" id="integral_login_type_name" onClick="select_click('integral_login_type');">
          <input name="integral_login_type" type="hidden" id="integral_login_type_val" value="" >
          <!--这块后加-->                  
          <?php }?>                                          
          <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw70 dn" id="integral_login_type_select"> 
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_login_type','1','加')">加</a> </div>
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_login_type','2','减')">减</a> </div>
            </div>
           </div> 
         <input class="input-text" type="text" name="integral_login" id="integral_login" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_login'];?>
" size="13" maxlength="255" onKeyUp="this.value=this.value.replace(/[^0-9.]/g,'')"/> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </td>
	</tr>
    <tr class="admin_com_td_bg">
	<th width="220">完善基本资料：</th>
		<td>
        <!--
        <select id="integral_userinfo_type">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_userinfo_type']=="1") {?>selected<?php }?>>加</option>
        <option value="2" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_userinfo_type']=="2") {?>selected<?php }?>>减</option>
        </select>
        -->
        <div class="yun_admin_select_box  yun_admin_select_boxw70  z_index11">          
        
        <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_userinfo_type']) {?> 
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_userinfo_type']==1) {?>
          <input type="button" value="加" class="yun_admin_select_box_text" id="integral_userinfo_type_name" onClick="select_click('integral_userinfo_type');">
          <input name="integral_userinfo_type" type="hidden" id="integral_userinfo_type_val" value="1">
          <!--这块后加--> 
          <?php }?>     
         
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_login_type']==2) {?>
          <input type="button" value="减" class="yun_admin_select_box_text" id="integral_userinfo_type_name" onClick="select_click('integral_userinfo_type');">
          <input name="integral_userinfo_type" type="hidden" id="integral_userinfo_type_val" value="2">
          <!--这块后加--> 
          <?php }?>
          
          <?php } else { ?>
          <input type="button" value="请选择" class="yun_admin_select_box_text" id="integral_userinfo_type_name" onClick="select_click('integral_userinfo_type');">
          <input name="integral_userinfo_type" type="hidden" id="integral_userinfo_type_val" value="" >
          <!--这块后加-->                 
          <?php }?>     
                                                 
          <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw70 dn" id="integral_userinfo_type_select"> 
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_userinfo_type','1','加')">加</a> </div>
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_userinfo_type','2','减')">减</a> </div>
            </div>
           </div> 
        
         <input class="input-text" type="text" name="integral_userinfo" id="integral_userinfo" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_userinfo'];?>
" size="13" maxlength="255" onKeyUp="this.value=this.value.replace(/[^0-9.]/g,'')"/> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </td>
	</tr>  
    <tr>
	<th width="220">邮箱认证：</th>
		<td>
        
        <!--
        <select id="integral_emailcert_type">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_emailcert_type']=="1") {?>selected<?php }?>>加</option>
        <option value="2" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_emailcert_type']=="2") {?>selected<?php }?>>减</option>
        </select>
        -->
        <div class="yun_admin_select_box  yun_admin_select_boxw70  z_index10"> 
        
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_emailcert_type']) {?> 
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_emailcert_type']==1) {?>
          <input type="button" value="加" class="yun_admin_select_box_text" id="integral_emailcert_type_name" onClick="select_click('integral_emailcert_type');">
          <input name="integral_emailcert_type" type="hidden" id="integral_userinfo_type_val" value="1">
          <!--这块后加--> 
          <?php }?>     
         
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_emailcert_type']==2) {?>
          <input type="button" value="减" class="yun_admin_select_box_text" id="integral_emailcert_type_name" onClick="select_click('integral_emailcert_type');">
          <input name="integral_emailcert_type" type="hidden" id="integral_emailcert_type_val" value="2">
          <!--这块后加--> 
          <?php }?>
          
          <?php } else { ?>
           <input type="button" value="请选择" class="yun_admin_select_box_text" id="integral_emailcert_type_name" onClick="select_click('integral_emailcert_type');">
          <input name="integral_emailcert_type" type="hidden" id="integral_emailcert_type_val" value="" >
          <!--这块后加-->                   
          <?php }?>                                                     
          <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw70 dn" id="integral_emailcert_type_select"> 
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_emailcert_type','1','加')">加</a> </div>
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_emailcert_type','2','减')">减</a> </div>
            </div>
           </div> 
         <input class="input-text" type="text" name="integral_emailcert" id="integral_emailcert" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_emailcert'];?>
" size="13" maxlength="255" onKeyUp="this.value=this.value.replace(/[^0-9.]/g,'')"/> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </td>
	</tr>
    <tr class="admin_com_td_bg">
	<th width="220">手机认证：</th>
		<td>
        <!--
        <select id="integral_mobliecert_type">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_mobliecert_type']=="1") {?>selected<?php }?>>加</option>
        <option value="2" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_mobliecert_type']=="2") {?>selected<?php }?>>减</option>
        </select>
        -->
        
          <div class="yun_admin_select_box  yun_admin_select_boxw70  z_index9">    

           <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_mobliecert_type']) {?> 
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_mobliecert_type']==1) {?>
          <input type="button" value="加" class="yun_admin_select_box_text" id="integral_mobliecert_type_name" onClick="select_click('integral_mobliecert_type');">
          <input name="integral_mobliecert_type" type="hidden" id="integral_userinfo_type_val" value="1">
          <!--这块后加--> 
          <?php }?>     
         
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_mobliecert_type']==2) {?>
          <input type="button" value="减" class="yun_admin_select_box_text" id="integral_mobliecert_type_name" onClick="select_click('integral_mobliecert_type');">
          <input name="integral_mobliecert_type" type="hidden" id="integral_mobliecert_type_val" value="2">
          <!--这块后加--> 
          <?php }?>
          
          <?php } else { ?>
          <input type="button" value="请选择" class="yun_admin_select_box_text" id="integral_mobliecert_type_name" onClick="select_click('integral_mobliecert_type');">
          <input name="integral_mobliecert_type" type="hidden" id="integral_mobliecert_type_val" value="" >
          <!--这块后加-->                
          <?php }?>  
                                                  
          <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw70 dn" id="integral_mobliecert_type_select"> 
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_mobliecert_type','1','加')">加</a> </div>
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_mobliecert_type','2','减')">减</a> </div>
            </div>
           </div> 
         <input class="input-text" type="text" name="integral_mobliecert" id="integral_mobliecert" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_mobliecert'];?>
" size="13" maxlength="255" onKeyUp="this.value=this.value.replace(/[^0-9.]/g,'')"/> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </td>
	</tr>
    <tr>
	<th width="220">上传头像：</th>
		<td>
        <!--
        <select id="integral_avatar_type">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_avatar_type']=="1") {?>selected<?php }?>>加</option>
        <option value="2" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_avatar_type']=="2") {?>selected<?php }?>>减</option>
        </select>
        -->
        <div class="yun_admin_select_box  yun_admin_select_boxw70  z_index8">              
           <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_avatar_type']) {?> 
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_avatar_type']==1) {?>
          <input type="button" value="加" class="yun_admin_select_box_text" id="integral_avatar_type_name" onClick="select_click('integral_avatar_type');">
          <input name="integral_avatar_type" type="hidden" id="integral_avatar_type_val" value="1">
          <!--这块后加--> 
          <?php }?>     
         
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_avatar_type']==2) {?>
          <input type="button" value="减" class="yun_admin_select_box_text" id="integral_avatar_type_name" onClick="select_click('integral_avatar_type');">
          <input name="integral_avatar_type" type="hidden" id="integral_avatar_type_val" value="2">
          <!--这块后加--> 
          <?php }?>
          
          <?php } else { ?>
          <input type="button" value="请选择" class="yun_admin_select_box_text" id="integral_avatar_type_name" onClick="select_click('integral_avatar_type');">
          <input name="integral_avatar_type" type="hidden" id="integral_avatar_type_val" value="" >
          <!--这块后加-->                
          <?php }?>  
                                                  
          <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw70 dn" id="integral_avatar_type_select"> 
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_avatar_type','1','加')">加</a> </div>
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_avatar_type','2','减')">减</a> </div>
            </div>
           </div> 
         <input class="input-text" type="text" name="integral_avatar" id="integral_avatar" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_avatar'];?>
" size="13" maxlength="255" onKeyUp="this.value=this.value.replace(/[^0-9.]/g,'')"/> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </td>
	</tr>
    <tr class="admin_com_td_bg">
	<th width="220">发布问题：</th>
		<td>
        
        <!--
        <select id="integral_question_type">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_question_type']=="1") {?>selected<?php }?>>加</option>
        <option value="2" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_question_type']=="2") {?>selected<?php }?>>减</option>
        </select>
        -->
        
        <div class="yun_admin_select_box  yun_admin_select_boxw70  z_index7">              
           <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_question_type']) {?> 
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_question_type']==1) {?>
          <input type="button" value="加" class="yun_admin_select_box_text" id="integral_question_type_name" onClick="select_click('integral_question_type');">
          <input name="integral_question_type" type="hidden" id="integral_question_type_val" value="1">
          <!--这块后加--> 
          <?php }?>     
         
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_question_type']==2) {?>
          <input type="button" value="减" class="yun_admin_select_box_text" id="integral_question_type_name" onClick="select_click('integral_question_type');">
          <input name="integral_question_type" type="hidden" id="integral_question_type_val" value="2">
          <!--这块后加--> 
          <?php }?>
          
          <?php } else { ?>
          <input type="button" value="请选择" class="yun_admin_select_box_text" id="integral_question_type_name" onClick="select_click('integral_question_type');">
          <input name="integral_question_type" type="hidden" id="integral_question_type_val" value="" >
          <!--这块后加-->                
          <?php }?>  
                                                  
          <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw70 dn" id="integral_question_type_select"> 
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_question_type','1','加')">加</a> </div>
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_question_type','2','减')">减</a> </div>
            </div>
           </div> 
        
        
        
         <input class="input-text" type="text" name="integral_question" id="integral_question" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_question'];?>
" size="13" maxlength="255" onKeyUp="this.value=this.value.replace(/[^0-9.]/g,'')"/> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </td>
	</tr>
    <tr>
	<th width="220">回答问题：</th>
		<td>
        <!--
        <select id="integral_answer_type">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answer_type']=="1") {?>selected<?php }?>>加</option>
        <option value="2" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answer_type']=="2") {?>selected<?php }?>>减</option>
        </select>
        -->
        
        
        <div class="yun_admin_select_box  yun_admin_select_boxw70  z_index6">              
           <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answer_type']) {?> 
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answer_type']==1) {?>
          <input type="button" value="加" class="yun_admin_select_box_text" id="integral_answer_type_name" onClick="select_click('integral_answer_type');">
          <input name="integral_answer_type" type="hidden" id="integral_answer_type_val" value="1">
          <!--这块后加--> 
          <?php }?>     
         
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answer_type']==2) {?>
          <input type="button" value="减" class="yun_admin_select_box_text" id="integral_answer_type_name" onClick="select_click('integral_answer_type');">
          <input name="integral_answer_type" type="hidden" id="integral_answer_type_val" value="2">
          <!--这块后加--> 
          <?php }?>
          
          <?php } else { ?>
          <input type="button" value="请选择" class="yun_admin_select_box_text" id="integral_answer_type_name" onClick="select_click('integral_answer_type');">
          <input name="integral_answer_type" type="hidden" id="integral_answer_type_val" value="" >
          <!--这块后加-->                
          <?php }?>  
                                                  
          <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw70 dn" id="integral_answer_type_select"> 
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_answer_type','1','加')">加</a> </div>
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_answer_type','2','减')">减</a> </div>
            </div>
           </div> 
        
        
        
        
         <input class="input-text" type="text" name="integral_answer" id="integral_answer" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_answer'];?>
" size="13" maxlength="255" onKeyUp="this.value=this.value.replace(/[^0-9.]/g,'')"/> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </td>
	</tr>
    <tr class="admin_com_td_bg">
	<th width="220">评论回答：</th>
		<td>
        <!--
        <select id="integral_answerpl_type">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answerpl_type']=="1") {?>selected<?php }?>>加</option>
        <option value="2" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answerpl_type']=="2") {?>selected<?php }?>>减</option>
        </select>
        -->
        
        <div class="yun_admin_select_box  yun_admin_select_boxw70  z_index5">              
           <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answerpl_type']) {?> 
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answerpl_type']==1) {?>
          <input type="button" value="加" class="yun_admin_select_box_text" id="integral_answerpl_type_name" onClick="select_click('integral_answerpl_type');">
          <input name="integral_answerpl_type" type="hidden" id="integral_answerpl_type_val" value="1">
          <!--这块后加--> 
          <?php }?>     
         
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answerpl_type']==2) {?>
          <input type="button" value="减" class="yun_admin_select_box_text" id="integral_answerpl_type_name" onClick="select_click('integral_answerpl_type');">
          <input name="integral_answerpl_type" type="hidden" id="integral_answerpl_type_val" value="2">
          <!--这块后加--> 
          <?php }?>
          
          <?php } else { ?>
          <input type="button" value="请选择" class="yun_admin_select_box_text" id="integral_answerpl_type_name" onClick="select_click('integral_answerpl_type');">
          <input name="integral_answerpl_type" type="hidden" id="integral_answerpl_type_val" value="" >
          <!--这块后加-->                
          <?php }?>  
                                                  
          <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw70 dn" id="integral_answerpl_type_select"> 
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_answerpl_type','1','加')">加</a> </div>
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_answerpl_type','2','减')">减</a> </div>
            </div>
           </div> 
        
        
        
         <input class="input-text" type="text" name="integral_answerpl" id="integral_answerpl" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_answerpl'];?>
" size="13" maxlength="255" onKeyUp="this.value=this.value.replace(/[^0-9.]/g,'')"/> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </td>
	</tr>
    <tr>
	<th width="220">邀请注册：</th>
		<td>
        
        
        <!--
        <select id="integral_invite_reg_type">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_invite_reg_type']=="1") {?>selected<?php }?>>加</option>
        <option value="2" <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_invite_reg_type']=="2") {?>selected<?php }?>>减</option>
        </select>
        -->
        
        
        <div class="yun_admin_select_box  yun_admin_select_boxw70  z_index2">              
           <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_invite_reg_type']) {?> 
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_invite_reg_type']==1) {?>
          <input type="button" value="加" class="yun_admin_select_box_text" id="integral_invite_reg_type_name" onClick="select_click('integral_invite_reg_type');">
          <input name="integral_invite_reg_type" type="hidden" id="integral_invite_reg_type_val" value="1">
          <!--这块后加--> 
          <?php }?>     
         
          <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_invite_reg_type']==2) {?>
          <input type="button" value="减" class="yun_admin_select_box_text" id="integral_invite_reg_type_name" onClick="select_click('integral_invite_reg_type');">
          <input name="integral_invite_reg_type" type="hidden" id="integral_invite_reg_type_val" value="2">
          <!--这块后加--> 
          <?php }?>
          
          <?php } else { ?>
          <input type="button" value="请选择" class="yun_admin_select_box_text" id="integral_invite_reg_type_name" onClick="select_click('integral_invite_reg_type');">
          <input name="integral_invite_reg_type" type="hidden" id="integral_invite_reg_type_val" value="" >
          <!--这块后加-->                
          <?php }?>  
                                                  
          <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw70 dn" id="integral_invite_reg_type_select"> 
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_invite_reg_type','1','加')">加</a> </div>
            <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('integral_invite_reg_type','2','减')">减</a> </div>
            </div>
           </div> 
        
        
        
        
        
         <input class="input-text" type="text" name="integral_invite_reg" id="integral_invite_reg" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_invite_reg'];?>
" size="13" maxlength="255" onKeyUp="this.value=this.value.replace(/[^0-9.]/g,'')"/> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </td>
	</tr>
    <tr class="admin_table_trbg">
		<td colspan="2" align="center">
        <input class="admin_submit4" id="integral" type="button" name="config" value="提交" />&nbsp;&nbsp;
        <input class="admin_submit4" type="reset" value="重置" /></td>
	</tr>
</table>
</div>

</div>
</div>
</div>
<input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
<?php echo '<script'; ?>
>
$(function(){
	$("#integral").click(function(){
		$.post("index.php?m=integral&c=save",{
			config : $("#integral").val(),
			integral_pricename : $("#integral_pricename").val(),
			integral_priceunit : $("#integral_priceunit").val(),
			integral_min_recharge : $("#integral_min_recharge").val(),
			money_min_recharge : $("#money_min_recharge").val(),
			integral_proportion : $("#integral_proportion").val(),
			integral_signin : $("#integral_signin").val(),
			integral_reg_type : $("#integral_reg_type_val").val(),
			integral_reg : $("#integral_reg").val(),
			integral_login_type : $("#integral_login_type_val").val(),
			integral_login : $("#integral_login").val(),
			integral_userinfo_type : $("#integral_userinfo_type_val").val(),
			integral_userinfo : $("#integral_userinfo").val(),
			integral_emailcert_type : $("#integral_emailcert_type_val").val(),
			integral_emailcert : $("#integral_emailcert").val(),
			integral_mobliecert_type : $("#integral_mobliecert_type_val").val(),
			integral_mobliecert : $("#integral_mobliecert").val(),
			integral_avatar_type : $("#integral_avatar_type_val").val(),
			integral_avatar : $("#integral_avatar").val(),
			integral_question_type : $("#integral_question_type_val").val(),
			integral_question : $("#integral_question").val(),
			integral_answer_type : $("#integral_answer_type_val").val(),
			integral_answer : $("#integral_answer").val(),
			integral_answerpl_type : $("#integral_answerpl_type_val").val(),
			integral_answerpl : $("#integral_answerpl").val(),
			integral_invite_reg_type : $("#integral_invite_reg_type_val").val(),
			integral_invite_reg : $("#integral_invite_reg").val(),
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
