<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-09 14:49:40
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/user/sysnews.htm" */ ?>
<?php /*%%SmartyHeaderCode:10533663705b430584839fc8-47142162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c362eb67315a0e2f192495cd3ae62c8c41fe153' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/user/sysnews.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10533663705b430584839fc8-47142162',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
    'item' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b43058488c340_45909610',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b43058488c340_45909610')) {function content_5b43058488c340_45909610($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="yun_user_member_w1100">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="mian_right fltR mt20">
      <div class="member_right_index_h1 fltL"> <span class="member_right_h1_span fltL">系统消息</span> <i class="member_right_h1_icon user_bg"></i></div>

        <div>
            <div id="gms_showclew"></div>
            <div class="resume_box_list">
            <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
                <div class="List_Ope List_Title ">
                    <span class="List_Title_span List_Title_w550"><em class="List_Title_span_name">内容</em></span>
                    <span class="List_Title_span List_Title_w170 List_Title_w170_new">时间</span>
                    <span class="List_Title_span List_Title_w150">操作</span>
                </div>
                <?php }?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <div class="List_Ope List_Ope_bor">
                    <span class="List_Title_span List_Title_w550"><?php echo mb_substr($_smarty_tpl->tpl_vars['item']->value['content'],0,50,'gbk');?>
</span>
                    <span class="List_Title_span List_Title_w170 List_Title_w170_new"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['ctime'],"%Y-%m-%d %H:%M");?>
</span>
                    <span class="List_Title_span List_Title_w150">
					   <a href="javascript:void(0)" onclick="showsys('<?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
','<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['ctime'],"%Y-%m-%d %H:%M");?>
'); "> 查看</a> | 
                        <a href="javascript:void(0)" onclick="layer_del('确定要删除？','index.php?c=sysnews&act=del&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');" class="List_dete  cblue">删除</a>
                    </span>
                </div>
                <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
                <div class="msg_no"> 暂无系统消息！ </div>
                <?php } ?>
                <div class="diggg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
            </div>
        </div>
    </div>
</div>
<div id="show" style="display:none;width:100%;">
	<div class="sys_tm">
	    <p><i>时间：</i><span id="systime"></span></p>
	    <p><i>内容：</i><span id="sysshow"></span></p>
	</div>
	<div class="sys_bot">
	<a class="sys_bot_del" href="javascript:void(0)" id="delsys"> 删除</a><a class="sys_bot_qx" href="javascript:void(0)" onclick="layer.closeAll();" class="cblue">返回</a>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
