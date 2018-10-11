<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-11 16:47:54
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/pay.htm" */ ?>
<?php /*%%SmartyHeaderCode:11208050305b1e373a8bd527-01766294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f605423c18e2aa4d2c84dd62683db3dafb7a9f36' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/pay.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11208050305b1e373a8bd527-01766294',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b1e373a914963_75064508',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1e373a914963_75064508')) {function content_5b1e373a914963_75064508($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="w1000">
<div class="admin_mainbody"> 
<style>.my_table_msg th{ text-align:right}</style>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class=right_box>
    <div class=admincont_box>
      <div class="job_list_tit">
      	<ul class="">
      		<li <?php if ($_GET['c']=="pay"&&$_GET['act']=='') {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=pay">购买<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</a></li>
       	</ul>
       </div>
      <div class="com_body">
        <div class='admin_note_pay2'>  
          <div class="admin_note2">
            <iframe id="fdingdan"  name="fdingdan" onload="returnmessage('fdingdan');" style="display:none"></iframe>
            <form name="alipayment" target="fdingdan" action="index.php?c=pay&act=dingdan" method="post" onsubmit="return pay_form('请输入充值数量！');">
			  <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="com_pay_table">
                <tr>
                  <th height="30" width="170">填写您要充值的<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
<span class="com_pay_table_pay_s">*</span></th>
                  <td><input type="hidden" name="pay_type" value="<?php echo $_POST['usertype'];?>
" />
                    <input type="text" name="price_int" id="price_int" size="20" value="0" int="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_proportion'];?>
" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='6' class="com_pay_table_pay_text">
                    当前比例：1元=<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_proportion'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 <?php if ($_smarty_tpl->tpl_vars['config']->value['integral_min_recharge']>0) {?>，单次最低充值<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_min_recharge'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
。<?php }?></td>
                </tr>
                <tr>
                  <th height="30">所需金额<span class="com_pay_table_pay_s">*</span></th>
                  <td><span id="span_com_vip_price">0</span>元
                    <input type="hidden" name="price" size="10"  id="com_vip_price"></td>
                </tr>
                <tr>
                  <th height="30">备注信息<span class="com_pay_table_pay_s"></span></th>
                  <td><textarea name="remark" id='remark' wrap="physical"  class="bank_textarea"></textarea>
                    <p style="line-height:23px;">(请备注你的姓名及其联系方式)</p></td>
                </tr>
             
                <tr>
                  <th>&nbsp;</th>
                  <td height="40"><div style="padding:10px;"><input  type="submit" value="下一步" name=nextstep class="btn_01"></div></td>
                </tr> 
				</table>
			</form>
			</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php echo '<script'; ?>
>
var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
";
<?php if ($_GET['id']&&$_GET['type']=='vip') {?>
$(document).ready(function(){
	check_rating_coupon('<?php echo $_GET['id'];?>
');
});
<?php }?>
<?php echo '</script'; ?>
> 
<input name='integral_min_recharge' value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_min_recharge'];?>
" type="hidden"/>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
