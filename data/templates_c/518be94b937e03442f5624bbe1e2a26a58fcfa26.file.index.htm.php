<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-03 03:49:39
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/forgetpw/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:17151057895bb3cbd34a77c8-05835506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '518be94b937e03442f5624bbe1e2a26a58fcfa26' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/forgetpw/index.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17151057895bb3cbd34a77c8-05835506',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb3cbd355a9b1_10961806',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb3cbd355a9b1_10961806')) {function content_5bb3cbd355a9b1_10961806($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"/>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/login.css" type="text/css"/>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<!--内容部分-->
<div class="yun_content">
  <div class="password_content_cont fl m15">
    <div class="password_content_cpd">
      <div class="password_content_h1"><i class="password_content_h1_i"></i><span class="password_content_h1_span">找回密码</span></div>
     
     
     
      <div class="password">
      
        <div class="flowsteps">
        <div class="password_tip">
        <div class="password_tip_t">温馨提示</div>
        <p>如手机号码已丢失且未绑定邮箱</p>
        <p>请联系在线客服</p>
        <p>或拨打全国统一服务热线</p>
       <div class="password_tip_tel"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
 </div>
        </div>
          <ul>
            <li class="flowsfrist"><i class="flowsfrist_icon"></i><span class="flowsfrist_line"></span><em>输入用户名</em></li>
            <li class="" id="nav2"><i class="flowsfrist_icon flowsfrist_icon_sf"></i><span class="flowsfrist_line"></span><em>验证身份</em></li>
            <li class="" id="nav3"><i class="flowsfrist_icon flowsfrist_icon_ps"></i><span class="flowsfrist_line"></span><em>重置密码</em></li>
            <li class="" id="nav4"><i class="flowsfrist_icon flowsfrist_icon_cg"></i><em id="shensu_e">密码修改成功</em></li>
          </ul>
        </div>
        <div class="clear"></div>
        
        
        <!--step1-->
        <div class="password_cont" id="step1">
          <div class="password_list m15">
            <div class="password_list_left">用户名：</div>
            <input type="text" id="username" class="password_list_text"/>
            <div class="password_list_r">若忘记用户名，请填写手机号或邮箱！</div>
          </div>
          <div class="password_list fl m15">
            <div class="password_list_left">&nbsp;</div>
            <input type="submit" value="下一步" class="password_list_bth uesr_submit" onclick="forgetpw();"/>
          </div>
        </div>
        <!--step2--完成-------------------------------------->
        <div class="password_cont none" id="step2">
          <div class="password_list fl mt20">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s"> 您正在找回密码的账号为：<span id="username_halt"></span>，请选择重置密码方式： </div>
          </div>
          <div class="password_list fl mt10" id="checkemail">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s">
              <input type="radio" value="email" name="sendtype" id="email" class="password_list_radio"/>
            <label for="email">  选择密保邮箱 <span id="email_halt"></span></label></div>
          </div>
          <div class="password_list fl mt10" id="checkmoblie">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s">
              <input type="radio" value="moblie" name="sendtype" id="moblie" class="password_list_radio"/>
               <label for="moblie"> 选择绑定手机号 <span id="moblie_halt"></span></label></div>
          </div>
          <div class="password_list fl mt10" id="checkmoblie">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s">
              <input type="radio" value="shensu" name="sendtype"id="shensu" class="password_list_radio"/>
            <label for="shensu">    账号申诉（填写账号信息提交后，客服人员会电话回访，确认身份！）</label>
            </div>
          </div>
		  <div class="password_list fl mt10">
          
           <?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"前台登录")!==false) {?>
            <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']==3) {?> 
            <div class="password_list_left">&nbsp;</div>
            
             <div class="reg_verification" style="padding:10px 0;">
			<div id="popup-captcha" data-id='subreg' data-type='click'></div>
			<input type='hidden' id="popup-submit">
            </div>
		    <?php } else { ?>
			 
				<div class="password_list_left">&nbsp;</div>
                <span style="float:left; line-height:37px; display:inline-block">验证码：</span>
				<input type="text" id="checkcode"  class="password_list_text password_list_textw110" maxlength="4"  placeholder="请输入验证码"/>
				<img id="vcode_imgs"  src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php"/>
				<div class="password_list_r">看不清？<a href="javascript:void(0);" onclick="checkCode('vcode_imgs');" class="registe_a">换一张</a></div>
			
			  <?php }?>
             <?php }?>
          </div>
          
          <div class="password_list fl mt10">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s"> 若您无法使用上述方法找回，请联系客服<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</div>
          </div>
          <div class="password_list fl mt20">
            <div class="password_list_left">&nbsp;</div>
            <input name="uid" type="hidden" value="" />
            <input type="submit" value="下一步" class="password_list_bth uesr_submit" onclick="send_str('vcode_imgs');"/>
          </div>
        </div>
        <!--step2--申诉-------------------------------------->
        <div class="password_cont none" id="step2_shensu">
          <div class="password_list fl m10">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s"> 请填写您的账户信息</div>
          </div>
          <div class="password_list fl m10">
            <div class="password_list_left">联系人：</div>
            <input type="text" value="" placeholder="请输入联系人" class="password_list_text" id="linkman" onblur="fg_check('linkman')"/>
			 <div class="tips_class"> <span class="reg_tips reg_tips_red none" id="fg_linkman"></span></div>
          </div>
           <div class="password_list fl m10">
            <div class="password_list_left">联系电话：</div>
            <input type="text" value="" placeholder="请输入联系电话" class="password_list_text" id="linkphone" onblur="fg_check('linkphone')"/>
			<div class="tips_class"> <span class="reg_tips reg_tips_red none" id="fg_linkphone"></span></div>
          </div>
          <div class="password_list fl m10">
            <div class="password_list_left">联系邮箱：</div>
            <input type="text" value="" placeholder="请输入联系邮箱" class="password_list_text" id="linkemail" onblur="fg_check('linkemail')"/>
			 <div class="tips_class">  <span class="reg_tips reg_tips_red none" id="fg_linkemail"></span></div>
          </div>
           <div class="password_list fl m10">
            <div class="password_list_left">&nbsp;</div>
            <input type="submit" value="提交" class="password_list_bth uesr_submit" onclick="checklink('vcode_imgs');"/>
          </div>
        </div>
        <!--step2--发送邮件-------------------------------------->
        
        <div class="password_cont none" id="step3_email">
          <div class="password_list fl m10">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s"> 我们已经向您的注册邮箱<span id="step3_email_halt"></span>发送验证码邮件</div>
          </div>
          <div class="password_list fl m10">
            <div class="password_list_left">&nbsp;</div>
          <span style="float:left; line-height:37px; display:inline-block">验证码：</span>
            <input type="text" value="" placeholder="请输入邮箱验证码" class="password_list_text password_list_textw110" name="code_email"/>
            <div class="password_list_r step3_email_timer"><a href="javascript:;" class="input_btn ">点击免费获取</a></div>
          </div>
          <div class="password_list fl m15">
            <div class="password_list_left">&nbsp;</div>
            <input type="submit" value="下一步" class="password_list_bth uesr_submit " onclick="checksendcode();"/>
          </div>
        </div>
        <div class="password_cont none" id="step3_moblie">
          <div class="password_list fl m10">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s"> 我们已经向您的绑定手机<span id="step3_moblie_halt"></span>发送验证码短信</div>
          </div>
          <div class="password_list fl m10">
            <div class="password_list_left">验证码：</div>
            <input type="text" value="" placeholder="请输入手机验证码" class="password_list_text password_list_textw110" name="code_moblie"/>
            <div class="password_list_r step3_moblie_timer"><a href="javascript:;" class="input_btn ">点击免费获取</a></div>
          </div>
          <div class="password_list fl m15">
            <div class="password_list_left">&nbsp;</div>
            <input type="submit" value="下一步" class="password_list_bth uesr_submit" onclick="checksendcode();"/>
          </div>
        </div>
        
        <!--step3--重置密码------------------------------------>
        <div class="password_cont none" id="step4">
          <div class="password_list fl m15">
            <div class="password_list_left">输入新的密码：</div>
            <input type="password" value="" class="password_list_text" name="password" id="password"/>
          </div>
          <div class="password_list fl m15">
            <div class="password_list_left">确认新的密码：</div>
            <input type="password" value="" class="password_list_text" name="passwordconfirm" id="passwordconfirm"/>
          </div>
          <div class="password_list fl m15">
            <div class="password_list_left">&nbsp;</div>
            <input type="submit" value="提交修改" class="password_list_bth uesr_submit" onclick="editpw();"/>
          </div>
        </div>
        <div class="clear"></div>
        <!--step4--完成------------------------------------>
        <div class="password_cont none" id="step5">
          <div class="password_cgd_w">恭喜您！密码重置成功！</div>
           <div class="password_cgd_w_bth"><a href="<?php echo smarty_function_url(array('m'=>'login'),$_smarty_tpl);?>
" class="uesr_submit">立即登录</a> </div>
     
        </div>
        <!--step5--申诉完成------------------------------------>
        <div class="password_cont none" id="finish">
        <div class="password_cgd">请耐心等待，稍后客服人员会联系您！</div>
        <div class="password_cgd_bth"><a href="<?php echo smarty_function_url(array(),$_smarty_tpl);?>
" class="uesr_submit">返回首页</a></div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/lazyload.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/forgetpw.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/geetest/gt.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/geetest/pc.js" type="text/javascript"><?php echo '</script'; ?>
>
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
DD_belatedPNG.fix('.png');
<?php echo '</script'; ?>
>
<![endif]-->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
