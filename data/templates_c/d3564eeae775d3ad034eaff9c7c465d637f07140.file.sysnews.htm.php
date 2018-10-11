<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-09 14:56:24
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/sysnews.htm" */ ?>
<?php /*%%SmartyHeaderCode:7890965825b430718496e46-54540687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3564eeae775d3ad034eaff9c7c465d637f07140' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/sysnews.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7890965825b430718496e46-54540687',
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
  'unifunc' => 'content_5b4307184ec4c1_62407131',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b4307184ec4c1_62407131')) {function content_5b4307184ec4c1_62407131($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="w1000">
<div class="admin_mainbody"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <?php echo '<script'; ?>
 type="text/javascript" language="javascript">
function unselectall(){
	if(document.getElementById('chkAll').checked){
		document.getElementById('chkAll').checked = document.getElementById('chkAll').checked&0;
	}
}
function CheckAll(form){
	for (var i=0;i<form.elements.length;i++){
	var e = form.elements[i];
	if (e.Name != 'chkAll'&&e.disabled==false)
	e.checked = form.chkAll.checked;
	}
}
<?php echo '</script'; ?>
>
  <div class=right_box>
    <div class=admincont_box >
      <div class="com_tit"><span class="com_tit_span">系统消息</span></div>
      <div class="com_body">
        <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
        <form action="index.php?c=sysnews&act=del" name="myform" method="post" target="supportiframe" id='myform'>
          <div class='admin_note2'>
            <div class="resume_box_list">
             <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
              <div class="List_Ope List_Title ">
               <span class="List_Title_span List_Title_w60" style="width:30px; padding-left:10px;">
                <label for="chkall"><input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)' style=" margin-top:9px;"/></label>
                </span>
                <span class="List_Title_span List_Title_w120" style="text-align:left">编号</span>
                 <span class="List_Title_span List_Title_w360">内容</span> 
                 <span class="List_Title_span List_Title_w200">时间</span> 
                 <span class="List_Title_span List_Title_w80"> 操作</span> 
              </div>
              <?php }?>
              <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
              <div class="List_Ope List_Ope_bor"> 
              <span class="List_Title_span List_Title_w60" style="width:30px; padding-left:10px;">
              <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" />
              </span>
              <span class="List_Title_span List_Title_w120" style="text-align:left"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</span> 
              <span class="List_Title_span List_Title_w360"><?php echo mb_substr($_smarty_tpl->tpl_vars['item']->value['content'],0,50,'gbk');?>
</span> 
              <span class="List_Title_span List_Title_w200"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['ctime'],"%Y-%m-%d %H:%M");?>
</span> 
              <span class="List_Title_span List_Title_w80"> 
			   <a href="javascript:void(0)" onclick="showsys('<?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
','<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['ctime'],"%Y-%m-%d %H:%M");?>
'); " class="cblue"> 查看</a> 
              <a href="javascript:void(0)" onclick="layer_del('确定要删除？', 'index.php?c=sysnews&act=del&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); " class="cblue"> 删除</a> </span> </div>
              <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
              <div class="msg_no">暂无信息！</div>
              <?php } ?> </div>
            <div class="clear"></div>
            <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
            <div class="com_Release_job_bot"><span class="com_Release_job_qx">
                    <input id='checkAll'  type="checkbox" onclick='m_checkAll(this.form)' class="com_Release_job_qx_check">
                    全选</span>
              <input type="button" name="delsub" class='c_btn_02' value="删除所选" onclick="return really('del[]');"/>
            </div>
            <div class="clear"></div>
            <div class="diggg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
            <?php }?> </div>
        </form>
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
