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
            <div class="member_right_index_h1 fltL"> <span class="member_right_h1_span fltL">�˻���</span> <i class="member_right_h1_icon user_bg"></i></div>
    

        <div class="clear"></div>
        <div class="resume_box_list">
         
            <div class="Binding_h1_box">
            <div class="Binding_h1">��¼�û�����<span class="resume_bd_span"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span></div>
            <div class="Binding_h1">�ϴε�¼ʱ�䣺<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['member']->value['login_date'],"%Y-%m-%d %H:%M:%S");?>
  <a href="index.php?c=passwd" class="Binding_a">�޸�����</a></div>
            </div>
          <div class="resume_Prompt mt10 fltL"> ���ֻ����롢���������֤������������ְ�����ļ�ʱ�Ժ�׼ȷ�ԣ��Ӷ������ְ�ɹ��� </div>
            <?php if ($_smarty_tpl->tpl_vars['setname']->value==1) {?>
            <div class="Binding_hint"><span class="fltL">����һ���޸��˻���������һ���������<b>������һ�Σ�</b></span><a href="index.php?c=setname">�����޸�</a></div>
            <?php }?>

            <div class="Binding_list">
                <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['resume']->value['email_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_yx_icon"></i></div><span class="bingding_yx_wr">������</span></div>
                <?php if ($_smarty_tpl->tpl_vars['resume']->value['email_status']==1) {?>
                <div class="Binding_list_text">��ǰ��������֤��<b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
</b> </div>
                <div class="Binding_oper">
                    <a href="javascript:void(0)" onclick="layer_del('ȷ��Ҫȡ���󶨣�','index.php?c=binding&act=del&type=email');" class="Binding_submit_qx">ȡ����</a>
                </div>
                <?php } else { ?>
                <div class="Binding_list_text">��ǰ����δ��֤��<b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
</b> ������֤��<br>����ͨ��������ʱȡ���˻����롣</div>
                <div class="Binding_oper"><a href="javascript:getshow('email','������');" class="Binding_submit">������</a></div>
                <?php }?>
            </div>
            <div class="Binding_list">
                <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['resume']->value['moblie_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_sj_icon"></i></div><span class="bingding_yx_wr">���ֻ�</span></div>
                <?php if ($_smarty_tpl->tpl_vars['resume']->value['moblie_status']==1) {?>
                <div class="Binding_list_text">
                    ��ǰ�ֻ��Ѱ󶨣�
                    <b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
</b>
                </div>
                <div class="Binding_oper">
                    <a href="javascript:void(0)" onclick="layer_del('ȷ��Ҫȡ���󶨣�','index.php?c=binding&act=del&type=moblie');" class="Binding_submit_qx">ȡ����</a>
                </div>
                <?php } else { ?>
                <div class="Binding_list_text">
                    ��ǰ�ֻ�δ�󶨣�
                    <b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
</b> �󶨺��ʹ�ø��ֻ���¼�˺�<br>���һ�����
                </div>
                <div class="Binding_oper">
                    <a href="javascript:getshow('moblie','���ֻ�����');" class="Binding_submit">������</a>
                </div>
                <?php }?>
            </div>
            <div class="Binding_list" style="display: none;">
                <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['qqid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_qq_icon"></i></div><span class="bingding_yx_wr">��QQ</span></div>
                <?php if ($_smarty_tpl->tpl_vars['member']->value['qqid']!='') {?>
                <div class="Binding_list_text Binding_list_text_mt">�Ѱ�QQ��</div>
                <div class="Binding_oper">
                    <a href="javascript:void(0)" onclick="layer_del('ȷ��Ҫȡ���󶨣�','index.php?c=binding&act=del&type=qqid');" class="Binding_submit_qx">ȡ����</a>
                </div>
                <?php } else { ?>
                <div class="Binding_list_text Binding_list_text_mt">δ��QQ��</div>
                <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']!='1') {?>
                <div class="Binding_oper">
                    <a href="javascript:void(0)" onclick="layer.msg('�Բ���QQ���ѹرգ�',2,8);return false;" class="Binding_submit">������</a>
                </div>
                <?php } else { ?>
                <div class="Binding_oper">
                    <a href="<?php echo smarty_function_url(array('m'=>'qqconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">������</a>
                </div>
                <?php }?>
                <?php }?>
            </div>
            <!--<div class="Binding_list">-->
                <!--<div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['sinaid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_xl_icon"></i></div><span class="bingding_yx_wr">������΢��</span></div>-->
                <!--<?php if ($_smarty_tpl->tpl_vars['member']->value['sinaid']!='') {?>-->
                <!--<div class="Binding_list_text Binding_list_text_mt">�Ѱ󶨣���ʹ������΢�����ٵ�¼</div>-->
                <!--<div class="Binding_oper">-->
                    <!--<a href="javascript:void(0)" onclick="layer_del('ȷ��Ҫȡ���󶨣�','index.php?c=binding&act=del&type=sinaid');" class="Binding_submit_qx">ȡ����</a>-->
                <!--</div>-->
                <!--<?php } else { ?>-->
                <!--<div class="Binding_list_text Binding_list_text_mt">��Ȩ�󶨺󣬿�ʹ������΢�����ٵ�¼</div>-->
                <!--<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']!='1') {?>-->
                <!--<div class="Binding_oper">-->
                    <!--<a href="javascript:void(0)" onclick="layer.msg('�Բ������˰��ѹرգ�',2,8);return false;" class="Binding_submit">������</a>-->
                <!--</div>-->
                <!--<?php } else { ?>-->
                <!--<div class="Binding_oper">-->
                    <!--<a href="<?php echo smarty_function_url(array('m'=>'sinaconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">������</a>-->
                <!--</div>-->
                <!--<?php }?>-->
                <!--<?php }?>-->
            <!--</div>-->
			<!--<div class="Binding_list">-->
            <!--<div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['wxopenid']!=''||$_smarty_tpl->tpl_vars['member']->value['wxid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_wx_icon"></i></div><span class="bingding_yx_wr">��΢��</span></div>-->
            <!--<?php if ($_smarty_tpl->tpl_vars['member']->value['wxopenid']!=''||$_smarty_tpl->tpl_vars['member']->value['wxid']!='') {?>-->
            <!--<div class="Binding_list_text  Binding_list_text_mt">�Ѱ󶨣���ʹ��΢��ɨ���¼</div>-->
            <!--<div class="Binding_oper"><a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫȡ���󶨣�','index.php?c=binding&act=del&type=wxid');" class="Binding_submit_qx">ȡ����</a></div>-->
            <!--<?php } else { ?>-->
            <!--<div class="Binding_list_text  Binding_list_text_mt">��Ȩ�󶨺󣬿�ʹ��΢��ɨ���¼</div>-->
            <!--<?php if ($_smarty_tpl->tpl_vars['config']->value['wx_author']!='1') {?>-->
            <!--<div class="Binding_oper"><a href="javascript:void(0)" onclick="layer.msg('�Բ���΢�Ű��ѹرգ�',2,8); return false;" class="Binding_submit">������</a></div>-->
            <!--<?php } else { ?>-->
            <!--<div class="Binding_oper"><a href="<?php echo smarty_function_url(array('m'=>'wxconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">������</a></div>-->
            <!--<?php }?>-->
            <!--<?php }?>-->
		  <!--</div>-->
            <div class="Binding_listsf">
                <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_sf_icon"></i></div><span class="bingding_yx_wr">�����֤</span></div>
                <div class="Binding_listsf_cont">
				<?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard']) {?>
                <div class="Binding_listsf_zj">֤���ţ�<?php echo $_smarty_tpl->tpl_vars['resume']->value['idcard'];?>
</div>
                <?php }?> 
                <?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_status']==1) {?>
                <div class="Binding_list_text">�������֤</div>
                <div class="m_rech_lj fr">
                	<a href="javascript:getyyzz('�ϴ������֤','500','500');" class="Binding_listsf_cont_bth">�����ϴ�</a>
                	</div>
                <?php } else { ?>
					<?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_pic']!='') {?>
						<?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_status']==2) {?>
						<div class="Binding_list_text">
                        <span class="Binding_listsf_wtg">���δͨ��</span> 
                       	 ԭ��<?php echo $_smarty_tpl->tpl_vars['resume']->value['statusbody'];?>
</div>
						<a href="javascript:getyyzz('�ϴ������֤','500','500');" class="Binding_listsf_cont_bth">�����ϴ�</a>
						<?php } else { ?>
						<div class="Binding_list_text">�����֤���ϴ�����ȴ�����Ա���</div>
						<a href="javascript:getyyzz('�ϴ������֤','500','500');" class="Binding_listsf_cont_bth">�����ϴ�</a>
						<?php }?>
					<?php } else { ?>
					<div class="Binding_list_text Binding_list_text_mt">�����֤������ҵ��������ζ�</div>
						<a href="javascript:getyyzz('�ϴ������֤','500','500');" class="Binding_listsf_cont_bth">δ��֤</a>
					<?php }?>
                <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="email" style="display:none;">
    <div class="Binding_pop_box" style="padding:10px;width:480px;height:200px; background:#fff">
        <div class="Binding_pop_box_msg">�޸ĺ�����佫��Ϊ�µĵ�¼�˺�</div>
        <div>
            <div class="Binding_pop_box_list">
                <span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>�µ����䣺</span>
                <input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
" class="Binding_pop_box_list_text Binding_pop_box_list_textw200">
            </div>
            <div class="Binding_pop_box_list">
                <span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>��֤�룺</span>
                <input type="text" name="email_code" maxlength="4" class="Binding_pop_box_list_text">
                <img id="vcode_img" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" style=" margin:0 5px 5px 5px; vertical-align:middle;">
                <a href="javascript:void(0);" onclick="checkCode('vcode_img');">������</a>
            </div>
            <div class="Binding_pop_sub" style="margin-top:10px;">
                <span class="Binding_pop_box_list_left">&nbsp;</span>
                <input class=" com_pop_bth" type="button" onclick="sendbemail('vcode_img');" value="������֤����">
                <input class=" com_pop_bth_qx" type="button" value="ȡ��" onclick="layer.closeAll();">
            </div>
        </div>
    </div>
</div>

<div id="moblie" style=" display:none;">
    <div class="Binding_pop_box" style="padding:10px;width:480px;height:200px; background:#fff;">
        <div class="Binding_pop_box_msg">����ɺ�������ʹ�ø��ֻ������¼�˺š��һ�����</div>
        <div>
            <div class="Binding_pop_box_list">
                <span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>�ֻ����룺</span>
                <input type="text"  name="moblie" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
" class="Binding_pop_box_list_text Binding_pop_box_list_textw200"  >
				
            </div>
            <div class="Binding_pop_box_list">
                <span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>������֤�룺</span>
                <input type="text" id="moblie_code" class="Binding_pop_box_list_text" style="width:90px;">
                <a href="javascript:;" class="Binding_pop_bth duanxibtn" id="time">��ѷ�����֤��</a>
            </div>
            <div class="Binding_pop_sub" style="margin-top:10px;">
                <span class="Binding_pop_box_list_left">&nbsp;</span>
                <input class="com_pop_bth_qd" onclick="check_moblie();" type="button" value="����">
                <input class="com_pop_bth_qx" type="button" value="ȡ��" onclick="layer.closeAll();">
            </div>
        </div>
    </div>
</div>
<div id="yyzz" style=" display:none;">
    <div class="Binding_pop_box" style="padding:10px;width:480px;height:420px; overflow:auto; background:#fff;">
        <div class="Binding_pop_box_msg">�����֤��֤�������ڸ��õ�ӦƸ����</div>
        <div style="padding:20px 0">
       		<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
            <form name="MyForm" target="supportiframe" method="post" action="index.php?c=binding&act=save" enctype="multipart/form-data" onsubmit="return check_user_cert();">
				<div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>֤�����룺</span>
                <input type="text" name="idcard" id="idcard" value='<?php echo $_smarty_tpl->tpl_vars['resume']->value['idcard'];?>
' class="Binding_pop_box_list_text Binding_pop_box_list_textw200">
                </div>
                <div class="Binding_pop_box_list">
                <span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>֤��ɨ�����</span>
                <input type="file" name="pic" onchange="ajaxfile()" id="pic" class="Binding_pop_box_list_text Binding_pop_box_list_textw200"/></div>
                <div class="Binding_pop_box_list">
	               <img src="<?php echo $_smarty_tpl->tpl_vars['resume']->value['idcard_pic'];?>
" id="imghead" width="380" height="200" <?php if (!$_smarty_tpl->tpl_vars['resume']->value['idcard_pic']) {?>style="display:none"<?php }?>/> <?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_pic']) {?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['resume']->value['idcard_pic'];?>
">�鿴ԭͼ</a><?php }?>
       			</div>
                <div class="Binding_pop_sub" style="margin-top:20px;">
                    <span class="Binding_pop_box_list_left">&nbsp;</span>
					<input id="user_cert" name="user_cert" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['idcard_pic'];?>
">
                    <input class="com_pop_bth_qd" name="upfile" type="submit" value="����">
                    <input class="com_pop_bth_qx" type="button" value="ȡ��" onclick="layer.closeAll();">
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
		var i=layer.load('ͼƬ�ϴ��У����Ժ�....', 0);
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
