<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-26 00:40:23
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/ajax/login.htm" */ ?>
<?php /*%%SmartyHeaderCode:9133442615b083c778e86f8-54258882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36dc57afc45546593cff42c3b12a91671497ccb5' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/ajax/login.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9133442615b083c778e86f8-54258882',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usertype' => 0,
    'member' => 0,
    'config' => 0,
    'username' => 0,
    'uid' => 0,
    'company' => 0,
    'addjobnum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b083c779b3b91_11766825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b083c779b3b91_11766825')) {function content_5b083c779b3b91_11766825($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
?><?php if ($_smarty_tpl->tpl_vars['usertype']->value=="1") {?>
	<div class="login_after_user_box">
	  <div class="login_after_user_photo"> <img width="40" height="50" src="<?php echo $_smarty_tpl->tpl_vars['member']->value['photo'];?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);"> </div>
	  <div class="login_after_user_name">
	    <div class="login_after_user_uname">��ã�<span class="login_after_username_id"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span></div>
	    <div class="login_after_user_webname">��ӭ��¼<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
</div>
	  </div>
	</div>
	<div class="login_after_ztbox">
	  <div class="login_after_zt_list"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=resume"><span class="login_after_zt_list_n"><?php echo $_smarty_tpl->tpl_vars['member']->value['resume_num'];?>
</span>�ҵļ���</a></div>
	  <div class="login_after_zt_list"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=job"> <span class="login_after_zt_list_n"><?php echo $_smarty_tpl->tpl_vars['member']->value['sq_jobnum'];?>
</span>����ְλ</a></div>
	  <div class="login_after_zt_list login_after_zt_list_end"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=favorite"><span class="login_after_zt_list_n"><?php echo $_smarty_tpl->tpl_vars['member']->value['fav_jobnum'];?>
</span>�ղ�ְλ</a></div>
	
	<div class="login_after_bthbox"> <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=expect&add=<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" class="login_after_userbth">��������</a> 
		<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=resume" class="login_after_usergz">��������</a> 
		<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=atn" class="login_after_userbth">��ע����ҵ</a>
		<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php" class=" login_after_userbthend">�����������</a> 
		<a href="javascript:void(0);" onclick="logout('<?php echo smarty_function_url(array('c'=>'logout'),$_smarty_tpl);?>
');" class="login_after_bttc"> ��ȫ�˳�</a>
	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['usertype']->value=="2") {?>
<div class="login_after_userlogo">
<div class="login_after_comlogo"><img width="135" height="55"src="<?php echo $_smarty_tpl->tpl_vars['company']->value['logo'];?>
"  onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_icon'];?>
',2);">
</div>
<div class="login_after_combg"></div>
</div>
<div class="login_after_username">��ã�<span class="login_after_username_id"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span></div>
<div class="login_after_webrname">��ӭ��¼<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
</div>
<div class="login_after_ztbox">
  <div class="login_after_zt_list"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=hr"><span class="login_after_zt_list_n"><?php echo $_smarty_tpl->tpl_vars['company']->value['sq_job'];?>
</span>�յ�����</a></div>
  <div class="login_after_zt_list"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=job&w=1"><span class="login_after_zt_list_n"><?php echo $_smarty_tpl->tpl_vars['company']->value['job'];?>
</span>��Ƹְλ</a></div>
  
  <div class="login_after_zt_list login_after_zt_list_end"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=job&w=2"><span class="login_after_zt_list_n"><?php echo $_smarty_tpl->tpl_vars['company']->value['status2'];?>
</span>�ѹ���ְλ</a>
  </div>

<div class="login_after_bthbox"> <?php if ($_smarty_tpl->tpl_vars['addjobnum']->value=='1') {?> <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=jobadd" class="login_after_bth">����ְλ</a> <?php } else { ?> <a href="javascript:void(0)" onclick="jobaddurl('<?php echo $_smarty_tpl->tpl_vars['addjobnum']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_job'];?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
')" class="login_after_bth">����ְλ</a> <?php }?> <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php" class=" login_after_bthend">�����������</a> <a href="javascript:void(0);" onclick="logout('<?php echo smarty_function_url(array('c'=>'logout'),$_smarty_tpl);?>
');" class="login_after_bttc"> ��ȫ�˳�</a> </div>

<?php } else { ?>
<div class="hp_login_tit">
	<i class="hp_login_tit_icon"></i>
	<input type="hidden" name="act" id="act_login" value="0"/>
	<ul class="login_box_h_list">
		<li id="acount_login" class="login_box_h_list_cur">��Ա��¼<i class="login_box_h_icon"></i></li>
		<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_msg_isopen']==1&&$_smarty_tpl->tpl_vars['config']->value['sy_msg_login']==1) {?>
		<li id="mobile_login" class="">�ֻ��ŵ�¼<i class="login_box_h_icon"></i></li>
		<?php }?>
	</ul>
	<?php if ($_smarty_tpl->tpl_vars['config']->value['wx_author']=='1') {?>
	<div class="wxcode_login" title="΢��ɨһɨ��¼" style="display:block;"></div>
	<div class="normal_login" title="��ͨ��¼" style="display:none;"></div>
	<?php }?>
</div>

<div class="wx_login_show" style="display:none;">
 <div id="wx_login_qrcode" class="wxlogintext">���ڻ�ȡ��ά��...</div>
 <div class="wxlogintxt">��ʹ��΢��ɨһɨ��¼</div>
</div>

<div id="login_normal">
	<div class="login_normal_box" id="login_normal_box">
	<div class="hp_login_hy"> <i class="hp_login_hy_icon fl"></i>
	  <input class="hp_login_hy_but fl" type="text" id="username" name="username" value="����/�ֻ���/�û���" placeholder="����/�ֻ���/�û���"/>
	  <div class="index_logoin_msg none" id="show_name">
	    <div class="index_logoin_msg_tx">����д�û���</div>
	    <div class="index_logoin_msg_icon"></div>
	  </div>
	</div>
	<div class="hp_login_hy"> <i class="hp_login_mm_icon fl"></i>
	<input type="text" id="password2" value="����������" class="hp_login_mm_but fl">
	<input type="password" id="password" name="password" class="hp_login_mm_but fl none" value="" placeholder="����������">
	  <div class="index_logoin_msg none" id="show_pass">
	    <div class="index_logoin_msg_tx">����д����</div>
	    <div class="index_logoin_msg_icon"></div>
	  </div>
	</div>
	</div>
	<div class="clear"></div>
	<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_msg_isopen']==1&&$_smarty_tpl->tpl_vars['config']->value['sy_msg_login']==1) {?>
	<div class="login_sj_box" id="login_sj_box" style="display:none;">
	  <div class="hp_login_hy">
        <i class="hp_login_sj_icon fl"></i>
	  	<input name="username" id="usermoblie" type="text" class="hp_login_hy_but hp_login_mm_but" value="�������ֻ�����">
	  	<div class="index_logoin_msg none" id="show_mobile">
		  <div class="index_logoin_msg_tx" >����д��ȷ�ֻ���</div>
		  <div class="index_logoin_msg_icon"></div>
		  </div>
	  </div>
	</div>
	<div class="clear"></div>
	<?php }?>
	<?php if (stripos($_smarty_tpl->tpl_vars['config']->value['code_web'],"ǰ̨��¼")!==false) {?>
	<?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']==3) {?>	
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
	var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
",integral_pricename='<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
',pricename='<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
',code_web='<?php echo $_smarty_tpl->tpl_vars['config']->value['code_web'];?>
',code_kind='<?php echo $_smarty_tpl->tpl_vars['config']->value['code_kind'];?>
';
	<?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/geetest/gt.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/geetest/pc.js" type="text/javascript"><?php echo '</script'; ?>
>
	<div class="index_verification">
  <div id="popup-captcha" data-id='sublogin' data-type='click'></div>
	<input type='hidden' id="popup-submit">
	</div>
  <style>.index_verification .geetest_holder.geetest_wind{min-width:247px;}</style>
	<?php } else { ?>
	<div class="index_login_tp">
		<input type="text" id="txt_CheckCode" name="authcode" value="��֤��"class="yun_Indexlogin_yzm" maxlength="4">
		<a href="javascript:void(0);" onclick="checkCode('vcode_imgs');"><img id="vcode_imgs" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" class="yun_Indexlogin_yzm_img"></a>
		<div class="index_logoin_msg none" id="show_code">
        
			<div class="index_logoin_msg_tx">����д��֤��</div>
			<div class="index_logoin_msg_icon"></div>
	  </div>
	</div>
	<?php }?>
	<?php } else { ?>
	<div class="hp_login_box">
	  <div class="hp_login_box_ft fl">
	    <input type="checkbox" value=""/>
	    <span class="hp_login_box_r">�´��Զ���¼</span> </div>
	  <div class="hp_login_box_rt fr"><a href="<?php echo smarty_function_url(array('m'=>'forgetpw'),$_smarty_tpl);?>
">�������룿</a></div>
	</div>
	<?php }?>
	<div class="clear"></div>
	<div class="login_sj_box" id="login_sjyz_box" style="display:none;">
		<div class="hp_login_hy">
         <i class="hp_login_mm_icon fl"></i>
	  	<input name="password" type="text" class="login_m_text" id="dynamiccode" value="���Ŷ�̬��">
	  	<div class="index_logoin_msg none" id="show_dynamiccode">
		  <div class="index_logoin_msg_tx" >����д���Ŷ�̬��</div>
		  <div class="index_logoin_msg_icon"></div>
		  </div>
		  <a href="javascript:void(0);" class="hp_login_hy_but login_m_send" id="send_msg_tip" onclick="send_msg2('<?php echo smarty_function_url(array('m'=>'login','c'=>'sendmsg'),$_smarty_tpl);?>
');">���Ͷ�̬��</span></span></a>
	  </div>
	</div>
	<div class="hp_login_lg">
	  <input class="hp_login_lg_but" type="button" value="��¼" onclick="check_login('<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
','vcode_imgs');"/>
	</div>
	<div class="clear"></div>
	<div class="hp_login_rg fl"> <a href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>2,'type'=>1),$_smarty_tpl);?>
" class="fl" style="text-decoration:none;">��ҵע��</a> <a class="fr" href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>1,'type'=>1),$_smarty_tpl);?>
" style="text-decoration:none;">����ע��</a> </div>
	<?php }?>
</div>
<style>#label{height:34px; line-height:34px;border:1px solid #e6e6e6}</style>
<?php echo '<script'; ?>
>

$(document).ready(function(){
	$('#acount_login').click(function(data){
		$('#acount_login').removeClass().addClass('login_box_h_list_cur');
		$('#mobile_login').removeClass();
		$('#login_normal_box').show();
		$('#login_sj_box').hide();
		$('#login_sjyz_box').hide();
		$('#act_login').val('0');
	});
	$('#mobile_login').click(function(data){
		$('#mobile_login').removeClass().addClass('login_box_h_list_cur');
		$('#acount_login').removeClass();
		$('#login_sj_box').show();
		$('#login_sjyz_box').show();
		$('#login_normal_box').hide();
		$('#act_login').val('1');
	});
	$("#username,#txt_CheckCode,#usermoblie,#dynamiccode").focus(function(){
		var txAreaVal = $(this).val();
		if( txAreaVal == this.defaultValue){$(this).val("");}
	}).blur(function(){
		var txAreaVal = $(this).val();
		if( txAreaVal == this.defaultValue||$(this).val()==""){$(this).val(this.defaultValue);}
	}).keydown(function (e) {
	    var ev = document.all ? window.event : e;
	    if (ev.keyCode == 13) {
	        check_login('<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
','vcode_imgs');
	    } else { return;}
	});
	$("#password2").focus(function(){
		$("#password").show();
		$("#password").focus();
		$("#password2").hide();
	})
	$("#password").blur(function(){
		if($("#password").val()==""){
			$("#password2").show();
			$("#password").hide();
		}
	}).keydown(function (e) {
	    var ev = document.all ? window.event : e;
	    if (ev.keyCode == 13) {
	        check_login('<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
','vcode_imgs');
	    } else { return; }
	});
	var setval;
	$('.wxcode_login').click(function(data){
		$('.wxcode_login').hide();
		$('.normal_login').show();
		$('#login_normal').hide();
		$('.login_box_h_list').hide();
		$('.wx_login_show').show();
		$.post('<?php echo smarty_function_url(array('m'=>'login','c'=>'wxlogin'),$_smarty_tpl);?>
',{t:1},function(data){
			if(data==0){
				$('#wx_login_qrcode').html('��ά���ȡʧ��..');
			}else{
				$('#wx_login_qrcode').html('<img src="'+data+'" width="100" height="100">');
				setval = setInterval("wxorderstatus()", 2000); 
			}
		});

	});
	$('.normal_login').click(function(data){
		$('.wxcode_login').show();
		$('.normal_login').hide();
		$('#login_normal').show();
		$('.login_box_h_list').show();
		$('.wx_login_show').hide();
		clearInterval(setval);
	});
});

function wxorderstatus() { 
	$.post('<?php echo smarty_function_url(array('m'=>'login','c'=>'getwxloginstatus'),$_smarty_tpl);?>
',{t:1},function(data){
		
		var data=eval('('+data+')');
		if(data.url!='' && data.msg!=''){
			layer.msg(data.msg, 2, 9,function(){window.location.href=data.url;});
		}else if(data.url){
			
			window.location.href=data.url;
		}
	});
}
function jobaddurl(num,integral_job,integral_pricename){ 
	if(num==0){
		var msg='�ײ������꣬���ȹ����Ա��<br>��������<a href="'+weburl+'/member/index.php?c=right&act=added" style="color:red;">������ֵ��</a>��';
		layer.confirm(msg, function(){ 
			window.location = weburl+'/index.php?c=right';
		});
	}else if(num==2){
		var msg='�ײ������꣬������������۳�'+integral_job+' '+integral_pricename+'����������<a href="'+weburl+'/member/index.php?c=right&act=added" style="color:red">������ֵ��</a>���Ƿ������';
		layer.confirm(msg, function(){
			window.location = weburl+'/member/index.php?c=jobadd';
		});
	}
}
<?php echo '</script'; ?>
><?php }} ?>
