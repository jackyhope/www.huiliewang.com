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
 
<!--���ݲ���-->
<div class="yun_content">
  <div class="password_content_cont fl m15">
    <div class="password_content_cpd">
      <div class="password_content_h1"><i class="password_content_h1_i"></i><span class="password_content_h1_span">�һ�����</span></div>
     
     
     
      <div class="password">
      
        <div class="flowsteps">
        <div class="password_tip">
        <div class="password_tip_t">��ܰ��ʾ</div>
        <p>���ֻ������Ѷ�ʧ��δ������</p>
        <p>����ϵ���߿ͷ�</p>
        <p>�򲦴�ȫ��ͳһ��������</p>
       <div class="password_tip_tel"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
 </div>
        </div>
          <ul>
            <li class="flowsfrist"><i class="flowsfrist_icon"></i><span class="flowsfrist_line"></span><em>�����û���</em></li>
            <li class="" id="nav2"><i class="flowsfrist_icon flowsfrist_icon_sf"></i><span class="flowsfrist_line"></span><em>��֤���</em></li>
            <li class="" id="nav3"><i class="flowsfrist_icon flowsfrist_icon_ps"></i><span class="flowsfrist_line"></span><em>��������</em></li>
            <li class="" id="nav4"><i class="flowsfrist_icon flowsfrist_icon_cg"></i><em id="shensu_e">�����޸ĳɹ�</em></li>
          </ul>
        </div>
        <div class="clear"></div>
        
        
        <!--step1-->
        <div class="password_cont" id="step1">
          <div class="password_list m15">
            <div class="password_list_left">�û�����</div>
            <input type="text" id="username" class="password_list_text"/>
            <div class="password_list_r">�������û���������д�ֻ��Ż����䣡</div>
          </div>
          <div class="password_list fl m15">
            <div class="password_list_left">&nbsp;</div>
            <input type="submit" value="��һ��" class="password_list_bth uesr_submit" onclick="forgetpw();"/>
          </div>
        </div>
        <!--step2--���-------------------------------------->
        <div class="password_cont none" id="step2">
          <div class="password_list fl mt20">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s"> �������һ�������˺�Ϊ��<span id="username_halt"></span>����ѡ���������뷽ʽ�� </div>
          </div>
          <div class="password_list fl mt10" id="checkemail">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s">
              <input type="radio" value="email" name="sendtype" id="email" class="password_list_radio"/>
            <label for="email">  ѡ���ܱ����� <span id="email_halt"></span></label></div>
          </div>
          <div class="password_list fl mt10" id="checkmoblie">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s">
              <input type="radio" value="moblie" name="sendtype" id="moblie" class="password_list_radio"/>
               <label for="moblie"> ѡ����ֻ��� <span id="moblie_halt"></span></label></div>
          </div>
          <div class="password_list fl mt10" id="checkmoblie">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s">
              <input type="radio" value="shensu" name="sendtype"id="shensu" class="password_list_radio"/>
            <label for="shensu">    �˺����ߣ���д�˺���Ϣ�ύ�󣬿ͷ���Ա��绰�طã�ȷ����ݣ���</label>
            </div>
          </div>
		  <div class="password_list fl mt10">
          
           <?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"ǰ̨��¼")!==false) {?>
            <?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']==3) {?> 
            <div class="password_list_left">&nbsp;</div>
            
             <div class="reg_verification" style="padding:10px 0;">
			<div id="popup-captcha" data-id='subreg' data-type='click'></div>
			<input type='hidden' id="popup-submit">
            </div>
		    <?php } else { ?>
			 
				<div class="password_list_left">&nbsp;</div>
                <span style="float:left; line-height:37px; display:inline-block">��֤�룺</span>
				<input type="text" id="checkcode"  class="password_list_text password_list_textw110" maxlength="4"  placeholder="��������֤��"/>
				<img id="vcode_imgs"  src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php"/>
				<div class="password_list_r">�����壿<a href="javascript:void(0);" onclick="checkCode('vcode_imgs');" class="registe_a">��һ��</a></div>
			
			  <?php }?>
             <?php }?>
          </div>
          
          <div class="password_list fl mt10">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s"> �����޷�ʹ�����������һأ�����ϵ�ͷ�<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</div>
          </div>
          <div class="password_list fl mt20">
            <div class="password_list_left">&nbsp;</div>
            <input name="uid" type="hidden" value="" />
            <input type="submit" value="��һ��" class="password_list_bth uesr_submit" onclick="send_str('vcode_imgs');"/>
          </div>
        </div>
        <!--step2--����-------------------------------------->
        <div class="password_cont none" id="step2_shensu">
          <div class="password_list fl m10">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s"> ����д�����˻���Ϣ</div>
          </div>
          <div class="password_list fl m10">
            <div class="password_list_left">��ϵ�ˣ�</div>
            <input type="text" value="" placeholder="��������ϵ��" class="password_list_text" id="linkman" onblur="fg_check('linkman')"/>
			 <div class="tips_class"> <span class="reg_tips reg_tips_red none" id="fg_linkman"></span></div>
          </div>
           <div class="password_list fl m10">
            <div class="password_list_left">��ϵ�绰��</div>
            <input type="text" value="" placeholder="��������ϵ�绰" class="password_list_text" id="linkphone" onblur="fg_check('linkphone')"/>
			<div class="tips_class"> <span class="reg_tips reg_tips_red none" id="fg_linkphone"></span></div>
          </div>
          <div class="password_list fl m10">
            <div class="password_list_left">��ϵ���䣺</div>
            <input type="text" value="" placeholder="��������ϵ����" class="password_list_text" id="linkemail" onblur="fg_check('linkemail')"/>
			 <div class="tips_class">  <span class="reg_tips reg_tips_red none" id="fg_linkemail"></span></div>
          </div>
           <div class="password_list fl m10">
            <div class="password_list_left">&nbsp;</div>
            <input type="submit" value="�ύ" class="password_list_bth uesr_submit" onclick="checklink('vcode_imgs');"/>
          </div>
        </div>
        <!--step2--�����ʼ�-------------------------------------->
        
        <div class="password_cont none" id="step3_email">
          <div class="password_list fl m10">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s"> �����Ѿ�������ע������<span id="step3_email_halt"></span>������֤���ʼ�</div>
          </div>
          <div class="password_list fl m10">
            <div class="password_list_left">&nbsp;</div>
          <span style="float:left; line-height:37px; display:inline-block">��֤�룺</span>
            <input type="text" value="" placeholder="������������֤��" class="password_list_text password_list_textw110" name="code_email"/>
            <div class="password_list_r step3_email_timer"><a href="javascript:;" class="input_btn ">�����ѻ�ȡ</a></div>
          </div>
          <div class="password_list fl m15">
            <div class="password_list_left">&nbsp;</div>
            <input type="submit" value="��һ��" class="password_list_bth uesr_submit " onclick="checksendcode();"/>
          </div>
        </div>
        <div class="password_cont none" id="step3_moblie">
          <div class="password_list fl m10">
            <div class="password_list_left">&nbsp;</div>
            <div class="password_list_s"> �����Ѿ������İ��ֻ�<span id="step3_moblie_halt"></span>������֤�����</div>
          </div>
          <div class="password_list fl m10">
            <div class="password_list_left">��֤�룺</div>
            <input type="text" value="" placeholder="�������ֻ���֤��" class="password_list_text password_list_textw110" name="code_moblie"/>
            <div class="password_list_r step3_moblie_timer"><a href="javascript:;" class="input_btn ">�����ѻ�ȡ</a></div>
          </div>
          <div class="password_list fl m15">
            <div class="password_list_left">&nbsp;</div>
            <input type="submit" value="��һ��" class="password_list_bth uesr_submit" onclick="checksendcode();"/>
          </div>
        </div>
        
        <!--step3--��������------------------------------------>
        <div class="password_cont none" id="step4">
          <div class="password_list fl m15">
            <div class="password_list_left">�����µ����룺</div>
            <input type="password" value="" class="password_list_text" name="password" id="password"/>
          </div>
          <div class="password_list fl m15">
            <div class="password_list_left">ȷ���µ����룺</div>
            <input type="password" value="" class="password_list_text" name="passwordconfirm" id="passwordconfirm"/>
          </div>
          <div class="password_list fl m15">
            <div class="password_list_left">&nbsp;</div>
            <input type="submit" value="�ύ�޸�" class="password_list_bth uesr_submit" onclick="editpw();"/>
          </div>
        </div>
        <div class="clear"></div>
        <!--step4--���------------------------------------>
        <div class="password_cont none" id="step5">
          <div class="password_cgd_w">��ϲ�����������óɹ���</div>
           <div class="password_cgd_w_bth"><a href="<?php echo smarty_function_url(array('m'=>'login'),$_smarty_tpl);?>
" class="uesr_submit">������¼</a> </div>
     
        </div>
        <!--step5--�������------------------------------------>
        <div class="password_cont none" id="finish">
        <div class="password_cgd">�����ĵȴ����Ժ�ͷ���Ա����ϵ����</div>
        <div class="password_cgd_bth"><a href="<?php echo smarty_function_url(array(),$_smarty_tpl);?>
" class="uesr_submit">������ҳ</a></div>

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
