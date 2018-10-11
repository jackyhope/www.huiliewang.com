<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-07 00:18:57
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/user/binding.htm" */ ?>
<?php /*%%SmartyHeaderCode:20403518225bb8e0712da413-48180713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c59b115d0011fa04d1d0fb4a38b2bda64072d20' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/user/binding.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20403518225bb8e0712da413-48180713',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'username' => 0,
    'member' => 0,
    'setname' => 0,
    'resume' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb8e0713a7e53_46795654',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb8e0713a7e53_46795654')) {function content_5bb8e0713a7e53_46795654($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/member_public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/binding.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>var weburl = "<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
";<?php echo '</script'; ?>
>
<div class="yun_user_member_w1100">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body, div {
            margin: 0;
            padding: 0;
        }
    </style>
        <div class="mian_right fltR mt20">
            <div class="member_right_index_h1 fltL"> <span class="member_right_h1_span fltL">账户绑定</span> <i class="member_right_h1_icon user_bg"></i></div>
    

        <div class="clear"></div>
        <div class="resume_box_list">
         
            <div class="Binding_h1_box">
            <div class="Binding_h1">登录用户名：<span class="resume_bd_span"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span></div>
            <div class="Binding_h1">上次登录时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['member']->value['login_date'],"%Y-%m-%d %H:%M:%S");?>
  <a href="index.php?c=passwd" class="Binding_a">修改密码</a></div>
            </div>
          <div class="resume_Prompt mt10 fltL"> 绑定手机号码、完成邮箱验证，可以增加求职反馈的及时性和准确性，从而提高求职成功率 </div>
            <?php if ($_smarty_tpl->tpl_vars['setname']->value==1) {?>
            <div class="Binding_hint"><span class="fltL">您有一次修改账户名和重置一次密码机会<b>（仅限一次）</b></span><a href="index.php?c=setname">立即修改</a></div>
            <?php }?>

            <div class="Binding_list">
                <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['resume']->value['email_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_yx_icon"></i></div><span class="bingding_yx_wr">绑定邮箱</span></div>
                <?php if ($_smarty_tpl->tpl_vars['resume']->value['email_status']==1) {?>
                <div class="Binding_list_text">当前邮箱已验证：<b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
</b> </div>
                <div class="Binding_oper">
                    <a href="javascript:void(0)" onclick="layer_del('确定要取消绑定？','index.php?c=binding&act=del&type=email');" class="Binding_submit_qx">取消绑定</a>
                </div>
                <?php } else { ?>
                <div class="Binding_list_text">当前邮箱未验证：<b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
</b> 邮箱验证后，<br>可以通过邮箱随时取回账户密码。</div>
                <div class="Binding_oper"><a href="javascript:getshow('email','绑定邮箱');" class="Binding_submit">立即绑定</a></div>
                <?php }?>
            </div>
            <div class="Binding_list">
                <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['resume']->value['moblie_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_sj_icon"></i></div><span class="bingding_yx_wr">绑定手机</span></div>
                <?php if ($_smarty_tpl->tpl_vars['resume']->value['moblie_status']==1) {?>
                <div class="Binding_list_text">
                    当前手机已绑定：
                    <b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
</b>
                </div>
                <div class="Binding_oper">
                    <a href="javascript:void(0)" onclick="layer_del('确定要取消绑定？','index.php?c=binding&act=del&type=moblie');" class="Binding_submit_qx">取消绑定</a>
                </div>
                <?php } else { ?>
                <div class="Binding_list_text">
                    当前手机未绑定：
                    <b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
</b> 绑定后可使用该手机登录账号<br>或找回密码
                </div>
                <div class="Binding_oper">
                    <a href="javascript:getshow('moblie','绑定手机号码');" class="Binding_submit">立即绑定</a>
                </div>
                <?php }?>
            </div>
            <div class="Binding_list" style="display: none;">
                <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['qqid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_qq_icon"></i></div><span class="bingding_yx_wr">绑定QQ</span></div>
                <?php if ($_smarty_tpl->tpl_vars['member']->value['qqid']!='') {?>
                <div class="Binding_list_text Binding_list_text_mt">已绑定QQ号</div>
                <div class="Binding_oper">
                    <a href="javascript:void(0)" onclick="layer_del('确定要取消绑定？','index.php?c=binding&act=del&type=qqid');" class="Binding_submit_qx">取消绑定</a>
                </div>
                <?php } else { ?>
                <div class="Binding_list_text Binding_list_text_mt">未绑定QQ号</div>
                <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']!='1') {?>
                <div class="Binding_oper">
                    <a href="javascript:void(0)" onclick="layer.msg('对不起，QQ绑定已关闭！',2,8);return false;" class="Binding_submit">立即绑定</a>
                </div>
                <?php } else { ?>
                <div class="Binding_oper">
                    <a href="<?php echo smarty_function_url(array('m'=>'qqconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">立即绑定</a>
                </div>
                <?php }?>
                <?php }?>
            </div>
            <!--<div class="Binding_list">-->
                <!--<div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['sinaid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_xl_icon"></i></div><span class="bingding_yx_wr">绑定新浪微博</span></div>-->
                <!--<?php if ($_smarty_tpl->tpl_vars['member']->value['sinaid']!='') {?>-->
                <!--<div class="Binding_list_text Binding_list_text_mt">已绑定，可使用新浪微博快速登录</div>-->
                <!--<div class="Binding_oper">-->
                    <!--<a href="javascript:void(0)" onclick="layer_del('确定要取消绑定？','index.php?c=binding&act=del&type=sinaid');" class="Binding_submit_qx">取消绑定</a>-->
                <!--</div>-->
                <!--<?php } else { ?>-->
                <!--<div class="Binding_list_text Binding_list_text_mt">授权绑定后，可使用新浪微博快速登录</div>-->
                <!--<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']!='1') {?>-->
                <!--<div class="Binding_oper">-->
                    <!--<a href="javascript:void(0)" onclick="layer.msg('对不起，新浪绑定已关闭！',2,8);return false;" class="Binding_submit">立即绑定</a>-->
                <!--</div>-->
                <!--<?php } else { ?>-->
                <!--<div class="Binding_oper">-->
                    <!--<a href="<?php echo smarty_function_url(array('m'=>'sinaconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">立即绑定</a>-->
                <!--</div>-->
                <!--<?php }?>-->
                <!--<?php }?>-->
            <!--</div>-->
			<!--<div class="Binding_list">-->
            <!--<div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['wxopenid']!=''||$_smarty_tpl->tpl_vars['member']->value['wxid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_wx_icon"></i></div><span class="bingding_yx_wr">绑定微信</span></div>-->
            <!--<?php if ($_smarty_tpl->tpl_vars['member']->value['wxopenid']!=''||$_smarty_tpl->tpl_vars['member']->value['wxid']!='') {?>-->
            <!--<div class="Binding_list_text  Binding_list_text_mt">已绑定，可使用微信扫描登录</div>-->
            <!--<div class="Binding_oper"><a href="javascript:void(0)" onClick="layer_del('确定要取消绑定？','index.php?c=binding&act=del&type=wxid');" class="Binding_submit_qx">取消绑定</a></div>-->
            <!--<?php } else { ?>-->
            <!--<div class="Binding_list_text  Binding_list_text_mt">授权绑定后，可使用微信扫描登录</div>-->
            <!--<?php if ($_smarty_tpl->tpl_vars['config']->value['wx_author']!='1') {?>-->
            <!--<div class="Binding_oper"><a href="javascript:void(0)" onclick="layer.msg('对不起，微信绑定已关闭！',2,8); return false;" class="Binding_submit">立即绑定</a></div>-->
            <!--<?php } else { ?>-->
            <!--<div class="Binding_oper"><a href="<?php echo smarty_function_url(array('m'=>'wxconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">立即绑定</a></div>-->
            <!--<?php }?>-->
            <!--<?php }?>-->
		  <!--</div>-->
            <div class="Binding_listsf">
                <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_sf_icon"></i></div><span class="bingding_yx_wr">身份认证</span></div>
                <div class="Binding_listsf_cont">
				<?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard']) {?>
                <div class="Binding_listsf_zj">证件号：<?php echo $_smarty_tpl->tpl_vars['resume']->value['idcard'];?>
</div>
                <?php }?> 
                <?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_status']==1) {?>
                <div class="Binding_list_text">身份已认证</div>
                <div class="m_rech_lj fr">
                	<a href="javascript:getyyzz('上传身份认证','500','500');" class="Binding_listsf_cont_bth">重新上传</a>
                	</div>
                <?php } else { ?>
					<?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_pic']!='') {?>
						<?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_status']==2) {?>
						<div class="Binding_list_text">
                        <span class="Binding_listsf_wtg">审核未通过</span> 
                       	 原因：<?php echo $_smarty_tpl->tpl_vars['resume']->value['statusbody'];?>
</div>
						<a href="javascript:getyyzz('上传身份认证','500','500');" class="Binding_listsf_cont_bth">重新上传</a>
						<?php } else { ?>
						<div class="Binding_list_text">身份认证已上传，请等待管理员审核</div>
						<a href="javascript:getyyzz('上传身份认证','500','500');" class="Binding_listsf_cont_bth">重新上传</a>
						<?php }?>
					<?php } else { ?>
					<div class="Binding_list_text Binding_list_text_mt">身份认证增加企业对你的信任度</div>
						<a href="javascript:getyyzz('上传身份认证','500','500');" class="Binding_listsf_cont_bth">未验证</a>
					<?php }?>
                <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="email" style="display:none;">
    <div class="Binding_pop_box" style="padding:10px;width:480px;height:200px; background:#fff">
        <div class="Binding_pop_box_msg">修改后的邮箱将作为新的登录账号</div>
        <div>
            <div class="Binding_pop_box_list">
                <span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>新的邮箱：</span>
                <input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
" class="Binding_pop_box_list_text Binding_pop_box_list_textw200">
            </div>
            <div class="Binding_pop_box_list">
                <span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>验证码：</span>
                <input type="text" name="email_code" maxlength="4" class="Binding_pop_box_list_text">
                <img id="vcode_img" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" style=" margin:0 5px 5px 5px; vertical-align:middle;">
                <a href="javascript:void(0);" onclick="checkCode('vcode_img');">看不清</a>
            </div>
            <div class="Binding_pop_sub" style="margin-top:10px;">
                <span class="Binding_pop_box_list_left">&nbsp;</span>
                <input class=" com_pop_bth" type="button" onclick="sendbemail('vcode_img');" value="发送验证邮箱">
                <input class=" com_pop_bth_qx" type="button" value="取消" onclick="layer.closeAll();">
            </div>
        </div>
    </div>
</div>

<div id="moblie" style=" display:none;">
    <div class="Binding_pop_box" style="padding:10px;width:480px;height:200px; background:#fff;">
        <div class="Binding_pop_box_msg">绑定完成后，您可以使用该手机号码登录账号、找回密码</div>
        <div>
            <div class="Binding_pop_box_list">
                <span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>手机号码：</span>
                <input type="text"  name="moblie" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
" class="Binding_pop_box_list_text Binding_pop_box_list_textw200"  >
				
            </div>
            <div class="Binding_pop_box_list">
                <span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>短信验证码：</span>
                <input type="text" id="moblie_code" class="Binding_pop_box_list_text" style="width:90px;">
                <a href="javascript:;" class="Binding_pop_bth duanxibtn" id="time">免费发送验证码</a>
            </div>
            <div class="Binding_pop_sub" style="margin-top:10px;">
                <span class="Binding_pop_box_list_left">&nbsp;</span>
                <input class="com_pop_bth_qd" onclick="check_moblie();" type="button" value="保存">
                <input class="com_pop_bth_qx" type="button" value="取消" onclick="layer.closeAll();">
            </div>
        </div>
    </div>
</div>
<div id="yyzz" style=" display:none;">
    <div class="Binding_pop_box" style="padding:10px;width:480px;height:420px; overflow:auto; background:#fff;">
        <div class="Binding_pop_box_msg">身份认证验证，有利于更好的应聘工作</div>
        <div style="padding:20px 0">
       		<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
            <form name="MyForm" target="supportiframe" method="post" action="index.php?c=binding&act=save" enctype="multipart/form-data" onsubmit="return check_user_cert();">
				<div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>证件号码：</span>
                <input type="text" name="idcard" id="idcard" value='<?php echo $_smarty_tpl->tpl_vars['resume']->value['idcard'];?>
' class="Binding_pop_box_list_text Binding_pop_box_list_textw200">
                </div>
                <div class="Binding_pop_box_list">
                <span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>证件扫描件：</span>
                <input type="file" name="pic" onchange="ajaxfile()" id="pic" class="Binding_pop_box_list_text Binding_pop_box_list_textw200"/></div>
                <div class="Binding_pop_box_list">
	               <img src="<?php echo $_smarty_tpl->tpl_vars['resume']->value['idcard_pic'];?>
" id="imghead" width="380" height="200" <?php if (!$_smarty_tpl->tpl_vars['resume']->value['idcard_pic']) {?>style="display:none"<?php }?>/> <?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_pic']) {?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['resume']->value['idcard_pic'];?>
">查看原图</a><?php }?>
       			</div>
                <div class="Binding_pop_sub" style="margin-top:20px;">
                    <span class="Binding_pop_box_list_left">&nbsp;</span>
					<input id="user_cert" name="user_cert" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['idcard_pic'];?>
">
                    <input class="com_pop_bth_qd" name="upfile" type="submit" value="保存">
                    <input class="com_pop_bth_qx" type="button" value="取消" onclick="layer.closeAll();">
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/imgareaselect/ajaxfileupload.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
function ajaxfile() {
	if($("#pic").val() != '') {      
		var i=layer.load('图片上传中，请稍候....', 0);
		$.ajaxFileUpload({
			url: 'index.php?c=binding&act=save',
			secureuri: false, 
			fileElementId: 'pic', 
			dataType: 'json', 
			data:{'uppic':'1'},
			success: function (data, status){ 
				layer.close(i);	
				if (data.msg) {
					layer.msg(data.msg, 2, 8);
				} else {
				    $('#imghead').show();
					$('#imghead').attr('src',data.url);
					$('#user_cert').attr('value',data.url);
				}
		   }
		})
	}
}
<?php echo '</script'; ?>
>
<input type="hidden" id="linktel" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
" />
<input type="hidden" id="linkmail" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
" />
<input type="hidden" id="send" value="0" />
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
