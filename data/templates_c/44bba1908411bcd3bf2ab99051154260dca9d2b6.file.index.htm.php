<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 03:09:17
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/advice/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:13391605815bba59dde1f947-88425644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44bba1908411bcd3bf2ab99051154260dca9d2b6' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/advice/index.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13391605815bba59dde1f947-88425644',
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
  'unifunc' => 'content_5bba59dde7b149_58632704',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bba59dde7b149_58632704')) {function content_5bba59dde7b149_58632704($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
/style/yun_seach.css" type="text/css"/>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="clear"></div>
<div class="all_body">

<form action="index.php?m=advice&c=savequestion" method="post" onsubmit="return addconsultant();" target="supportiframe">
    <div class="suggest_main">
        <div class="suggest_head">���Ľ���������ÿ���ĸ���</div>
        <div class="top_tips">�û����ã��뽫����������뷨�������Ͷ�����ݸ������ǣ��԰�������Ϊȫ���û��ṩ�������ʵķ������ǽ��ڵ�һʱ�估ʱ�ظ����ķ���������������ȽϽ��������µ�������� ��<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
 </div>
        <div class="suggest_list_group">
            <div class="suggest_list_cell">
                <div class="list_cell_left">�������</div>
                <div class="list_cell_right">
                    <div class="suggest_type_cell"><div class="suggest_type" data-code="1"><input type="hidden" name="infotype" id="ctime" value="" class="suggest_type" data-code="1"/>����</div></div>
                    <div class="suggest_type_cell"><div class="suggest_type" id="suggest_type" data-code="2">���</div></div>
                    <div class="suggest_type_cell"><div class="suggest_type" data-code="3">����</div></div>
                    <div class="suggest_type_cell"><div class="suggest_type" data-code="4">Ͷ��</div></div>
                    <div class="clear"></div>
                    <input type="hidden" name="infotype" value=""  />
                </div>
                <div class="clear"></div>
            </div>
			<div class="suggest_list_cell">
                <div class="list_cell_left">��ϵ��</div>
                <div class="list_cell_right"><input type="text" class="suggest_input" name="username" id="username" placeholder="����������������"/></div>
                <div class="clear"></div>
            </div>
			<input type="hidden" name="ctime" id="ctime" value=""/>
            <div class="suggest_list_cell">
                <div class="list_cell_left">��ϵ�ֻ�</div>
                <div class="list_cell_right"><input type="text" class="suggest_input" name="telphone" id="telphone" placeholder="�����������ֻ������Ա������ͨ��������Ϣ��������Ա�ɼ���"></div>
                <div class="clear"></div>
            </div>
            <div class="suggest_list_cell">
                <div class="list_cell_left">��������</div>
                <div class="list_cell_right">
                    <textarea class="suggest_area" id="content" name="content" placeholder="����ϸ���������������⣬���������ǿ��ٶ�λ���������"></textarea>
                </div>
				<div class="clear"></div>
				</div>
        <div class="list_cell_left">��֤��</div>
		<div class="" style="float:left">
		<input class="list_yzm_bx" type="text" name="authcode" maxlength="4" id="txt_CheckCode" value="��֤��"/>
		</div>
		<div class="list_yzm" style="float:left;left:70%;margin-left:10px;">
		<img id="vcode_imgs" style="width:80px;height:40px;" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" onclick="checkCode('vcode_imgs');" />
		<input id="code_kind" type="hidden" value="1"/>
		</div>
		<div class="clear"></div>
            <div class="suggest_list_cell" style="margin-top:20px;">
                <div class="list_cell_left">&nbsp;</div>
                <div class="list_cell_right">
                    <input type="submit" class="btn_yellow suggest_btn" id="J_suggest_submit" value="�� ��" />
                </div>
                </div>
                </div>
                </div>
				</form>
                <div class="clear"></div>
            
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
/js/public.js" type="text/javascript"><?php echo '</script'; ?>
>
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" class="dn"></iframe>
<?php echo '<script'; ?>
 language="javascript">  
function addconsultant(){
	var infotype=$.trim($('input[name="infotype"]').val());
	var username=$.trim($("#username").val());
	var telphone=$.trim($("#telphone").val());
	var content=$.trim($("#content").val());
	var kind=$("#code_kind").val();
	var authcode="";
	var unlock="";
	var reg= /^[1][034578]\d{9}$/;
	if(infotype==''){layer.msg("��ѡ���������",2,8);return false;}
	if(username==''){layer.msg("��ϵ�˲���Ϊ�գ�",2,8);return false;}
	if(telphone==''){
		layer.msg("�ֻ����벻��Ϊ�գ�",2,8);return false;
	}else if(!reg.test(telphone)){
		layer.msg("�ֻ������ʽ����",2,8);return false;
	}
	if(content==''){layer.msg("�������ݲ���Ϊ�գ�",2,8);return false;}
	if(kind==1){
		authcode=$("#txt_CheckCode").val();
		if(authcode==""||authcode=="��֤��"){
			layer.msg("��֤�벻��Ϊ�գ�",2,8);return false;
		}
	}
} 
$(document).ready(function(){
	$("#username,#telphone,#content,#txt_CheckCode").focus(function(){
		var txValue = $(this).val();
		if( txValue == this.defaultValue){$(this).val("");}
	
	});
	// ��������л�
    $('.suggest_type').click(function(event) {
        $('.suggest_type').each(function(index, el) {
            $(this).removeClass('selected');
        });
        $(this).addClass('selected');
        $('input[name="infotype"]').val($(this).data('code'));
		

    });
});
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php }} ?>
