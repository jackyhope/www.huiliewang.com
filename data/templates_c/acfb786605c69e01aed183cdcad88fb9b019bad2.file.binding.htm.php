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
      <div class="com_tit"><span class="com_tit_span">�˻���֤��</span> </div>
      <div class="com_body">
        <div class=admin_tit_right>
          <div class="job_re_ts"> ���ֻ����롢���������֤������������ְ�����ļ�ʱ�Ժ�׼ȷ�ԣ��Ӷ������ְ�ɹ��� </div>
          <div class="Binding_h1 mt10">��¼�û�����<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
<span class="Binding_h1_time">�ϴε�¼ʱ�䣺<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['member']->value['login_date'],"%Y-%m-%d %H:%M:%S");?>
 <a href="index.php?c=vs" class="Binding_a">�޸�����</a></span></div>
          <div class="Binding_h1"></div>
          <?php if ($_smarty_tpl->tpl_vars['setname']->value==1) {?>
           <div class="Binding_hint"><span class="Binding_hint_left">����һ���޸��˻���������һ���������<b>������һ�Σ�</b></span><a href="index.php?c=setname">�����޸�</a></div>
           <?php }?>
          <div class="Binding_list">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['company']->value['email_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_yx_icon"></i></div><span class="bingding_yx_wr">����</span></div>
            <?php if ($_smarty_tpl->tpl_vars['company']->value['email_status']==1) {?>
            <div class="Binding_list_text" style="margin-top:10px;">��ǰ��������֤��<b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['company']->value['linkmail'];?>
</b> </div>
            <div class="Binding_oper"><a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫȡ���󶨣�','index.php?c=binding&act=del&type=email');" class="Binding_submit_qx">ȡ����</a></div>
            <?php } else { ?>
            <div class="Binding_list_text">��ǰ����δ��֤��<b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['company']->value['linkmail'];?>
</b> ������֤��<br>����ͨ��������ʱȡ���˻����롣</div>
            <div class="Binding_oper"><a  href="javascript:getshow('email','������');" class="Binding_submit">������</a></div>
            <?php }?> </div>
          <div class="Binding_list">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['company']->value['moblie_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_sj_icon"></i></div><span class="bingding_yx_wr">���ֻ�</span></div>
            <?php if ($_smarty_tpl->tpl_vars['company']->value['moblie_status']==1) {?>
            <div class="Binding_list_text" style="margin-top:10px;">��ǰ�ֻ��Ѱ󶨣� <b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['company']->value['linktel'];?>
</b> </div>
            <div class="Binding_oper"><a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫȡ���󶨣�','index.php?c=binding&act=del&type=moblie');" class="Binding_submit_qx">ȡ����</a></div>
            <?php } else { ?>
            <div class="Binding_list_text">��ǰ�ֻ�δ�󶨣� <b class="Binding_list_b"><?php echo $_smarty_tpl->tpl_vars['company']->value['linktel'];?>
</b> �󶨺��ʹ�ø��ֻ���¼�˺�<br>���һ�����</div>
            <div class="Binding_oper"><a  href="javascript:getshow('moblie','���ֻ�����');" class="Binding_submit">������</a></div>
            <?php }?> </div>
          <div class="Binding_list" style="display: none;">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['qqid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_qq_icon"></i></div><span class="bingding_yx_wr">��QQ</span></div>
            <?php if ($_smarty_tpl->tpl_vars['member']->value['qqid']!='') {?>
            <div class="Binding_list_text  Binding_mt">�Ѱ�QQ��</div>
            <div class="Binding_oper "><a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫȡ���󶨣�','index.php?c=binding&act=del&type=qqid');" class="Binding_submit_qx">ȡ����</a></div>
            <?php } else { ?>
            <div class="Binding_list_text  Binding_mt">δ��QQ��</div>
            <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']!='1') {?>
            <div class="Binding_oper"><a href="javascript:void(0)" onclick="layer.msg('�Բ���QQ���ѹرգ�',2,8);return false;" class="Binding_submit">������</a></div>
            <?php } else { ?>
            <div class="Binding_oper"><a href="<?php echo smarty_function_url(array('m'=>'qqconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">������</a></div>
            <?php }?>
            <?php }?> </div>
          <div class="Binding_list" style="display: none;">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['sinaid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_xl_icon"></i></div><span class="bingding_yx_wr">������΢��</span></div>
            <?php if ($_smarty_tpl->tpl_vars['member']->value['sinaid']!='') {?>
            <div class="Binding_list_text  Binding_mt" style=" margin-top:20px;">�Ѱ󶨣���ʹ������΢�����ٵ�¼</div>
            <div class="Binding_oper"><a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫȡ���󶨣�','index.php?c=binding&act=del&type=sinaid');" class="Binding_submit_qx">ȡ����</a></div>
            <?php } else { ?>
            <div class="Binding_list_text  Binding_mt" style=" margin-top:10px;">��Ȩ�󶨺󣬿�ʹ������΢�����ٵ�¼</div>
            <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']!='1') {?>
            <div class="Binding_oper"><a href="javascript:void(0)" onclick="layer.msg('�Բ������˰��ѹرգ�',2,8);return false;" class="Binding_submit">������</a></div>
            <?php } else { ?>
            <div class="Binding_oper"><a href="<?php echo smarty_function_url(array('m'=>'sinaconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">������</a></div>
            <?php }?>
            <?php }?> </div>
			<div class="Binding_list"  style="display: none;">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['member']->value['wxopenid']!=''||$_smarty_tpl->tpl_vars['member']->value['wxid']!='') {?>bingding_yx_cur<?php }?>"><i class="binding_wx_icon"></i></div><span class="bingding_yx_wr">��΢��</span></div>
            <?php if ($_smarty_tpl->tpl_vars['member']->value['wxopenid']!=''||$_smarty_tpl->tpl_vars['member']->value['wxid']!='') {?>
            <div class="Binding_list_text  Binding_mt">�Ѱ󶨣���ʹ��΢��ɨ���¼</div>
            <div class="Binding_oper"><a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫȡ���󶨣�','index.php?c=binding&act=del&type=wxid');" class="Binding_submit_qx">ȡ����</a></div>
            <?php } else { ?>
            <div class="Binding_list_text  Binding_mt" style=" margin-top:10px;">��Ȩ�󶨺󣬿�ʹ��΢��ɨ���¼</div>
            <?php if ($_smarty_tpl->tpl_vars['config']->value['wx_author']!='1') {?>
            <div class="Binding_oper"><a href="javascript:void(0)" onclick="layer.msg('�Բ���΢�Ű��ѹرգ�',2,8); return false;" class="Binding_submit">������</a></div>
            <?php } else { ?>
            <div class="Binding_oper"><a href="<?php echo smarty_function_url(array('m'=>'wxconnect','login'=>1),$_smarty_tpl);?>
" class="Binding_submit">������</a></div>
            <?php }?>
            <?php }?> 
		  </div>
          <div class="Binding_list">
            <div class="Binding_list_left"><div class="bingding_yx <?php if ($_smarty_tpl->tpl_vars['company']->value['yyzz_status']==1) {?>bingding_yx_cur<?php }?>"><i class="binding_sf_icon"></i></div><span class="bingding_yx_wr">Ӫҵִ��</span></div>
            <?php if ($_smarty_tpl->tpl_vars['company']->value['yyzz_status']==1) {?>
            <div class="Binding_list_text  Binding_mt " style="width:300px;"><b class="Binding_list_b">����֤</b></div>
            <div class="Binding_oper"> <a  href="javascript:getyyzz('�ϴ�Ӫҵִ��','550','310');" class="Binding_submit_rz">������֤</a></div>
            <?php } else { ?>
             <?php if (!empty($_smarty_tpl->tpl_vars['cert']->value)) {?>
              <?php if ($_smarty_tpl->tpl_vars['cert']->value['status']==2) {?>
              <div class="Binding_list_text  Binding_mt">���δͨ��  <?php if ($_smarty_tpl->tpl_vars['cert']->value['statusbody']) {?>ԭ��<?php echo $_smarty_tpl->tpl_vars['cert']->value['statusbody'];
}?></div> 
            <div class="Binding_oper"><a  href="javascript:getyyzz('�ϴ�Ӫҵִ��','550','310');" class="Binding_submit_rz">�����ϴ�</a></div>
              <?php } else { ?>
            <div class="Binding_list_text  Binding_mt" style="width:300px; margin-top:20px;">Ӫҵִ�����ϴ�����ȴ�����Ա���</div>
            <div class="Binding_oper"><a  href="javascript:getyyzz('�ϴ�Ӫҵִ��','550','310');" class="Binding_submit_rz">�����ϴ�</a>
			</div>
              <?php }?>
             <?php } else { ?>
            <div class="Binding_list_text  Binding_mt" style="width:300px;">��ǰδ�ϴ�Ӫҵִ��</div>
            <div class="Binding_oper"><a  href="javascript:getyyzz('�ϴ�Ӫҵִ��','550','310');" class="Binding_submit_rz">δ��֤</a></div>
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
    <div class="Binding_pop_box_msg">�޸ĺ�����佫��Ϊ�µĵ�¼�˺�</div>
    <div >
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>�µ����䣺</span>
        <input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['linkmail'];?>
" class="Binding_pop_box_list_text Binding_pop_box_list_textw200">
      </div>
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>��֤�룺</span>
        <input type="text" name="email_code" maxlength="4"class="Binding_pop_box_list_text">
        <img id="vcode_img" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" style=" margin:0 5px 5px 5px; vertical-align:middle;">
        <a href="javascript:void(0);" onclick="checkCode('vcode_img');">������</a></div>
      <div class="Binding_pop_sub"> <span class="Binding_pop_box_list_left">&nbsp;</span>
        <input class=" com_pop_bth" type="button" onclick="sendbemail('vcode_img');" value="������֤����">
        <input class=" com_pop_bth_qx" type="button" value="ȡ��" onclick="layer.closeAll();">
      </div>
    </div>
  </div>
</div> 

<div id="moblie" style=" display:none;">
  <div class="Binding_pop_box" style="padding:10px;width:480px;height:200px; background:#fff;">
    <div class="Binding_pop_box_msg">����ɺ�������ʹ�ø��ֻ������һ�����</div>
    <div>
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>�ֻ����룺</span>
        <input type="text" name="moblie" class="Binding_pop_box_list_text Binding_pop_box_list_textw200" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['linktel'];?>
">
      </div>
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>������֤�룺</span>
        <input type="text" id="moblie_code" class="Binding_pop_box_list_text" style="width:90px;">
        <a href="javascript:;" onclick="sendmoblie();" class="Binding_pop_bth" id="time">��ѷ�����֤��</a></div>
      <div class="Binding_pop_sub" style="margin-top:20px;"> <span class="Binding_pop_box_list_left">&nbsp;</span>
        <input class="com_pop_bth_qd" onclick="check_moblie();" type="button" value="����">
        <input class="com_pop_bth_qx" type="button" value="ȡ��" onclick="layer.closeAll();">
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
    <div class="Binding_pop_box_msg">Ӫҵִ����֤�������ڸ��õ���Ƹ�˲�!<br>Ӫҵִ���е���ҵȫ�ơ�����µ��������ɱ�𣬷�����ͨ����֤��</div>
    <div class="Binding_pop_box_msg_cont">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form name="MyForm" target="supportiframe" method="post" action="index.php?c=binding&act=save" enctype="multipart/form-data" onsubmit="return check_company_cert();">
        <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>��ҵȫ�ƣ�</span>
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
" name="company_name" id="company_name" class="Binding_pop_box_list_text Binding_pop_box_list_textw200" />
        </div>
        <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>Ӫҵִ�գ�</span>
          <input type="file" name="pic" onchange="ajaxfile()" id="pic" class="Binding_pop_box_list_text Binding_pop_box_list_textw200">
        </div>
        <div class="Binding_pop_box_msg_cont_pic" <?php if (!$_smarty_tpl->tpl_vars['cert']->value['check']) {?>style="display:none"<?php }?> id="preview">
        	<img src="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
" id="imghead" width="140" height="160"/>        	
        	<a target="_blank" id="imga" href="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
" class="Binding_pop_box_msg_cont_pic_p">�鿴ԭͼ</a>
        </div>
        <div class="clear"></div>
        <div class="Binding_pop_box_list_P"></div>
        <div class="Binding_pop_sub" style="margin-top:10px;"> <span class="Binding_pop_box_list_left">&nbsp;</span>
		  <input id="com_cert" name="com_cert" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
">
          <input class="com_pop_bth_qd" name="upfile" type="submit" value="����">
          <input class="com_pop_bth_qx" type="button" value="ȡ��" onclick="layer.closeAll();">
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
