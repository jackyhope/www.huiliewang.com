<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-07 00:19:34
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/user/passwd.htm" */ ?>
<?php /*%%SmartyHeaderCode:20450744955bb8e09626f177-56687411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbefb52ad5d02b0f9fd74597feb6fc8fdc62e1bc' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/user/passwd.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20450744955bb8e09626f177-56687411',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb8e0962a31d1_41601422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb8e0962a31d1_41601422')) {function content_5bb8e0962a31d1_41601422($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="yun_user_member_w1100"> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


          <div class="mian_right fltR mt20">
            <div class="member_right_index_h1 fltL"> <span class="member_right_h1_span fltL">�޸�����</span> <i class="member_right_h1_icon user_bg"></i></div>
    

  <div class="clear"></div>
  <div id="">
    
    <FORM name='MyForm'  action='' target="supportiframe" method="post"  onsubmit="return Showsub1();">
      <div class="passwd_list mt10">
       <div class="yj_tw_list"><span class="yj_tw_list_name">ԭʼ���룺</span><input type="password" id="oldpassword" name="oldpassword" class="yj_tw_list_text"/><em id="msg_oldpassword">��д����ԭʼ���룡</em></div>
       
              <div class="yj_tw_list"><span class="yj_tw_list_name">�����룺</span>   <input type="password" id="password" name="password" class="yj_tw_list_text"/><em id="msg_password">�������ʽΪ 6-20���ַ���</em></div>
        <ul>
               
              <div class="yj_tw_list"><span class="yj_tw_list_name">ȷ�����룺</span>   <input type="password" id="repassword" name="repassword" class="yj_tw_list_text"/><em id="msg_repassword">���ٴ�ȷ�����������룡</em></div>
               <div class="yj_tw_list"><span class="yj_tw_list_name">&nbsp;</span>  <input type="hidden" value="1" name="usertype" />
            <input type="submit" name="submit" class="yj_tw_list_bth" value="����" ></div>
        
   
        
      </div>
    </form>
  </div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
