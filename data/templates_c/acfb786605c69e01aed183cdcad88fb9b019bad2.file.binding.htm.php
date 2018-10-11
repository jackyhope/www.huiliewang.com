<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-08-03 18:15:31
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/binding.htm" */ ?>
<?php /*%%SmartyHeaderCode:7799260475b642b435cacd5-25298434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acfb786605c69e01aed183cdcad88fb9b019bad2' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/binding.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7799260475b642b435cacd5-25298434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
    'member' => 0,
    'setname' => 0,
    'company' => 0,
    'config' => 0,
    'cert' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b642b4367cf69_82891411',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b642b4367cf69_82891411')) {function content_5b642b4367cf69_82891411($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
  
<div class="w1000">
<div class="admin_mainbody"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class=right_box>
    <div class=admincont_box>
      <div class="com_tit"><span class="com_tit_span">账户认证绑定</span> </div>
      <div class="com_body">
        <div class=admin_tit_right>
          <div class="job_re_ts"> 绑定手机号码、完成邮箱验证，可以增加求职反馈的及时性和准确性，从而提高求职成功率 </div>
          <div class="Binding_h1 mt10">登录用户名：<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
<span class="Binding_h1_time">上次登录时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['member']->value['login_date'],"%Y-%m-%d %H:%M:%S");?>
 <a href="index.php?c=vs" class="Binding_a">修改密码</a></span></div>
          <div class="Binding_h1"></div>
          <?php if ($_smarty_tpl->tpl_vars['setname']->value==1) {?>
           <div class="Binding_hint"><span class="Binding_hint_left">您有一次修改账户名和重置一次密码机会<b>（仅限一次）</b></span><a href="index.php?c=setname">立即修改</a></div>
           <?php }?>
          <div class="Binding_list">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['company']->value['email_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_yx_icon"></i></div><span class="bingding_yx_wr">邮箱</span></div>
            <?php if ($_smarty_tpl->tpl_vars['company']->value['email_status']==1) {?>
            <div class="Binding_list_text" style="margin-top:10px;">当前邮箱已验证：<b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['company']->value['linkmail'];?>
</b> </div>
            <div class="Binding_oper"><a href="javascript:void(0)" onClick="layer_del('确定要取消绑定？','index.php?c=binding&act=del&type=email');" class="Binding_submit_qx">取消绑定</a></div>
            <?php } else { ?>
            <div class="Binding_list_text">当前邮箱未验证：<b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['company']->value['linkmail'];?>
</b> 邮箱验证后，<br>可以通过邮箱随时取回账户密码。</div>
            <div class="Binding_oper"><a  href="javascript:getshow('email','绑定邮箱');" class="Binding_submit">立即绑定</a></div>
            <?php }?> </div>
          <div class="Binding_list">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['company']->value['moblie_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_sj_icon"></i></div><span class="bingding_yx_wr">绑定手机</span></div>
            <?php if ($_smarty_tpl->tpl_vars['company']->value['moblie_status']==1) {?>
            <div class="Binding_list_text" style="margin-top:10px;">当前手机已绑定： <b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['company']->value['linktel'];?>
</b> </div>
            <div class="Binding_oper"><a href="javascript:void(0)" onClick="layer_del('确定要取消绑定？','index.php?c=binding&act=del&type=moblie');" class="Binding_submit_qx">取消绑定</a></div>
            <?php } else { ?>
            <div class="Binding_list_text">当前手机未绑定： <b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['company']->value['linktel'];?>
</b> 绑定后可使用该手机登录账号<br>或找回密码</div>
            <div class="Binding_oper"><a  href="javascript:getshow('moblie','绑定手机号码');" class="Binding_submit">立即绑定</a></div>
            <?php }?> </div>
          <div class="Binding_list" style="display: none;">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['qqid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_qq_icon"></i></div><span class="bingding_yx_wr">绑定QQ</span></div>
            <?php if ($_smarty_tpl->tpl_vars['member']->value['qqid']!='') {?>
            <div class="Binding_list_text  Binding_mt">已绑定QQ号</div>
            <div class="Binding_oper "><a href="javascript:void(0)" onClick="layer_del('确定要取消绑定？','index.php?c=binding&act=del&type=qqid');" class="Binding_submit_qx">取消绑定</a></div>
            <?php } else { ?>
            <div class="Binding_list_text  Binding_mt">未绑定QQ号</div>
            <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']!='1') {?>
            <div class="Binding_oper"><a href="javascript:void(0)" onclick="layer.msg('对不起，QQ绑定已关闭！',2,8);return false;" class="Binding_submit">立即绑定</a></div>
            <?php } else { ?>
            <div class="Binding_oper"><a href="<?php echo smarty_function_url(array('m'=>'qqconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">立即绑定</a></div>
            <?php }?>
            <?php }?> </div>
          <div class="Binding_list" style="display: none;">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['sinaid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_xl_icon"></i></div><span class="bingding_yx_wr">绑定新浪微博</span></div>
            <?php if ($_smarty_tpl->tpl_vars['member']->value['sinaid']!='') {?>
            <div class="Binding_list_text  Binding_mt" style=" margin-top:20px;">已绑定，可使用新浪微博快速登录</div>
            <div class="Binding_oper"><a href="javascript:void(0)" onClick="layer_del('确定要取消绑定？','index.php?c=binding&act=del&type=sinaid');" class="Binding_submit_qx">取消绑定</a></div>
            <?php } else { ?>
            <div class="Binding_list_text  Binding_mt" style=" margin-top:10px;">授权绑定后，可使用新浪微博快速登录</div>
            <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']!='1') {?>
            <div class="Binding_oper"><a href="javascript:void(0)" onclick="layer.msg('对不起，新浪绑定已关闭！',2,8);return false;" class="Binding_submit">立即绑定</a></div>
            <?php } else { ?>
            <div class="Binding_oper"><a href="<?php echo smarty_function_url(array('m'=>'sinaconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">立即绑定</a></div>
            <?php }?>
            <?php }?> </div>
			<div class="Binding_list"  style="display: none;">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['wxopenid']!=''||$_smarty_tpl->tpl_vars['member']->value['wxid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_wx_icon"></i></div><span class="bingding_yx_wr">绑定微信</span></div>
            <?php if ($_smarty_tpl->tpl_vars['member']->value['wxopenid']!=''||$_smarty_tpl->tpl_vars['member']->value['wxid']!='') {?>
            <div class="Binding_list_text  Binding_mt">已绑定，可使用微信扫描登录</div>
            <div class="Binding_oper"><a href="javascript:void(0)" onClick="layer_del('确定要取消绑定？','index.php?c=binding&act=del&type=wxid');" class="Binding_submit_qx">取消绑定</a></div>
            <?php } else { ?>
            <div class="Binding_list_text  Binding_mt" style=" margin-top:10px;">授权绑定后，可使用微信扫描登录</div>
            <?php if ($_smarty_tpl->tpl_vars['config']->value['wx_author']!='1') {?>
            <div class="Binding_oper"><a href="javascript:void(0)" onclick="layer.msg('对不起，微信绑定已关闭！',2,8); return false;" class="Binding_submit">立即绑定</a></div>
            <?php } else { ?>
            <div class="Binding_oper"><a href="<?php echo smarty_function_url(array('m'=>'wxconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">立即绑定</a></div>
            <?php }?>
            <?php }?> 
		  </div>
          <div class="Binding_list">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['company']->value['yyzz_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_sf_icon"></i></div><span class="bingding_yx_wr">营业执照</span></div>
            <?php if ($_smarty_tpl->tpl_vars['company']->value['yyzz_status']==1) {?>
            <div class="Binding_list_text  Binding_mt " style="width:300px;"><b class="Binding_list_b">已验证</b></div>
            <div class="Binding_oper"> <a  href="javascript:getyyzz('上传营业执照','550','310');" class="Binding_submit_rz">重新认证</a></div>
            <?php } else { ?>
             <?php if (!empty($_smarty_tpl->tpl_vars['cert']->value)) {?>
              <?php if ($_smarty_tpl->tpl_vars['cert']->value['status']==2) {?>
              <div class="Binding_list_text  Binding_mt">审核未通过  <?php if ($_smarty_tpl->tpl_vars['cert']->value['statusbody']) {?>原因：<?php echo $_smarty_tpl->tpl_vars['cert']->value['statusbody'];
}?></div> 
            <div class="Binding_oper"><a  href="javascript:getyyzz('上传营业执照','550','310');" class="Binding_submit_rz">重新上传</a></div>
              <?php } else { ?>
            <div class="Binding_list_text  Binding_mt" style="width:300px; margin-top:20px;">营业执照已上传，请等待管理员审核</div>
            <div class="Binding_oper"><a  href="javascript:getyyzz('上传营业执照','550','310');" class="Binding_submit_rz">重新上传</a>
			</div>
              <?php }?>
             <?php } else { ?>
            <div class="Binding_list_text  Binding_mt" style="width:300px;">当前未上传营业执照</div>
            <div class="Binding_oper"><a  href="javascript:getyyzz('上传营业执照','550','310');" class="Binding_submit_rz">未验证</a></div>
             <?php }?>
            <?php }?> </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div id="email" style="display:none;">
  <div class="Binding_pop_box" style="padding:10px;width:480px;height:205px; background:#fff">
    <div class="Binding_pop_box_msg">修改后的邮箱将作为新的登录账号</div>
    <div >
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>新的邮箱：</span>
        <input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['linkmail'];?>
" class="Binding_pop_box_list_text Binding_pop_box_list_textw200">
      </div>
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>验证码：</span>
        <input type="text" name="email_code" maxlength="4"class="Binding_pop_box_list_text">
        <img id="vcode_img" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" style=" margin:0 5px 5px 5px; vertical-align:middle;">
        <a href="javascript:void(0);" onclick="checkCode('vcode_img');">看不清</a></div>
      <div class="Binding_pop_sub"> <span class="Binding_pop_box_list_left">&nbsp;</span>
        <input class=" com_pop_bth" type="button" onclick="sendbemail('vcode_img');" value="发送验证邮箱">
        <input class=" com_pop_bth_qx" type="button" value="取消" onclick="layer.closeAll();">
      </div>
    </div>
  </div>
</div> 

<div id="moblie" style=" display:none;">
  <div class="Binding_pop_box" style="padding:10px;width:480px;height:200px; background:#fff;">
    <div class="Binding_pop_box_msg">绑定完成后，您可以使用该手机号码找回密码</div>
    <div>
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>手机号码：</span>
        <input type="text" name="moblie" class="Binding_pop_box_list_text Binding_pop_box_list_textw200" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['linktel'];?>
">
      </div>
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>短信验证码：</span>
        <input type="text" id="moblie_code" class="Binding_pop_box_list_text" style="width:90px;">
        <a href="javascript:;" onclick="sendmoblie();" class="Binding_pop_bth" id="time">免费发送验证码</a></div>
      <div class="Binding_pop_sub" style="margin-top:20px;"> <span class="Binding_pop_box_list_left">&nbsp;</span>
        <input class="com_pop_bth_qd" onclick="check_moblie();" type="button" value="保存">
        <input class="com_pop_bth_qx" type="button" value="取消" onclick="layer.closeAll();">
      </div>
    </div>
  </div>
</div>

> 
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/binding.js"><?php echo '</script'; ?>
>
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
				    $('#preview').show();
					$('#imghead').attr('src',data.url);
                    $('#imga').attr('href',data.url);
					$('#com_cert').attr('value',data.url);
				}
		   }
		})
	}
}
<?php echo '</script'; ?>
>
<div id="yyzz" style=" display:none;">
  <div class="Binding_pop_box">
    <div class="Binding_pop_box_msg">营业执照验证，有利于更好的招聘人才!<br>营业执照中的企业全称、年检章等需清晰可辨别，否则不能通过验证。</div>
    <div class="Binding_pop_box_msg_cont">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form name="MyForm" target="supportiframe" method="post" action="index.php?c=binding&act=save" enctype="multipart/form-data" onsubmit="return check_company_cert();">
        <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>企业全称：</span>
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
" name="company_name" id="company_name" class="Binding_pop_box_list_text Binding_pop_box_list_textw200" />
        </div>
        <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>营业执照：</span>
          <input type="file" name="pic" onchange="ajaxfile()" id="pic" class="Binding_pop_box_list_text Binding_pop_box_list_textw200">
        </div>
        <div class="Binding_pop_box_msg_cont_pic" <?php if (!$_smarty_tpl->tpl_vars['cert']->value['check']) {?>style="display:none"<?php }?> id="preview">
        	<img src="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
" id="imghead" width="140" height="160"/>        	
        	<a target="_blank" id="imga" href="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
" class="Binding_pop_box_msg_cont_pic_p">查看原图</a>
        </div>
        <div class="clear"></div>
        <div class="Binding_pop_box_list_P"></div>
        <div class="Binding_pop_sub" style="margin-top:10px;"> <span class="Binding_pop_box_list_left">&nbsp;</span>
		  <input id="com_cert" name="com_cert" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
">
          <input class="com_pop_bth_qd" name="upfile" type="submit" value="保存">
          <input class="com_pop_bth_qx" type="button" value="取消" onclick="layer.closeAll();">
        </div>
      </form>
    </div>
  </div>
</div>
<input type="hidden" id="linktel" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['linktel'];?>
" />
<input type="hidden" id="linkmail" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['linkmail'];?>
" />
<input type="hidden" id="send" value="0" />
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
