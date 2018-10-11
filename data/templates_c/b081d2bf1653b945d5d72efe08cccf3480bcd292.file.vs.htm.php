<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-27 10:44:57
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/vs.htm" */ ?>
<?php /*%%SmartyHeaderCode:3873347335bac44299aa8d6-72737267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b081d2bf1653b945d5d72efe08cccf3480bcd292' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/vs.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3873347335bac44299aa8d6-72737267',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bac44299d73b3_12374827',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bac44299d73b3_12374827')) {function content_5bac44299d73b3_12374827($_smarty_tpl) {?> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="w1000">
<div class="admin_mainbody">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 
<div class=right_box>
<div class=admincont_box>
  <div class="com_tit"><span class="com_tit_span"> 安全设置</span></div>
   <div class="com_body">
<div class=admin_note2>

<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
<form name="MyForm"  target="supportiframe" action='index.php?c=vs&act=save' method="post" onkeydown="if(event.keyCode==13){return false;}">
<div class="admin_password"><span class="text_s_left">原始密码：</span><input type="password" id="oldpassword" name="oldpassword" class="com_info_text"/><span id="msg_oldpassword"  class="vs_right_span">填写您的原始密码！</span></div>
<div class="admin_password"><span class="text_s_left">新&nbsp;密&nbsp;码：</span><input type="password" id="password" name="password" class="com_info_text"/><span id="msg_password"  class="vs_right_span">新密码格式为 6-20个字符！</span> </div>
<div class="admin_password"><span class="text_s_left">确认密码：</span><input type="password" id="repassword" name="repassword" class="com_info_text"/><span id="msg_repassword"  class="vs_right_span">请再次确认您的新密码！</span></div>
<div class="admin_password"><span class="text_s_left">&nbsp;</span><input type="hidden" value="2" name="usertype" />
<input type="submit" name="submit" class="btn_01" value="更改密码" onclick="return Showsub1();" ></div>
</form>
</div> 
</div>
</div>  
</div> 
</div> 
</div> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
