<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-05 18:04:23
         compiled from "/home/wwwroot/www.huiliewang.com//app/template/admin/add_class.htm" */ ?>
<?php /*%%SmartyHeaderCode:4092587335b3ded27715e07-80688444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03cf43fbb3e4c91d7c3e1c6d6257c863bc7f555f' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com//app/template/admin/add_class.htm',
      1 => 1517894862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4092587335b3ded27715e07-80688444',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'position' => 0,
    'v' => 0,
    'one' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b3ded2774b4e6_81544150',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3ded2774b4e6_81544150')) {function content_5b3ded2774b4e6_81544150($_smarty_tpl) {?>
<div id="wname"  style="display:none; ">
	<div class="job_box_div">
		<div class="job_box_inp">
			<table cellspacing='1' cellpadding='1' class="admin_examine_table">
				<tr >
					<th  width="100">类别选择：</th>
					<td>
						<div class="admin_examine_right">
							<label><span class="add_class_s"><input name='ctype' type='radio' value='1' checked='checked'> 一级分类</span></label>
							<label><span class="add_class_s"><input name='ctype' type='radio' value='2'> 二级分类</span></label>
						</div>
					</td></tr>
				<tr class='sclass'  style="display:none;">
					<th>父类：</th>
					<td>

						<div class="yun_admin_select_box zindex100"> <?php if ($_smarty_tpl->tpl_vars['row']->value['nid']) {?>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['position']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['v']->value['id']==$_smarty_tpl->tpl_vars['v']->value) {?>
							<input type="button" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" class="yun_admin_select_box_text" id="nid_name" onClick="select_click('nid');">
							<input name="nid" type="hidden" id="nid_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">

							<?php }?>
							<?php } ?>
							<?php } else { ?>
							<input type="button" value="请选择" class="yun_admin_select_box_text" id="nid_name" onClick="select_click('nid');">
							<input name="nid" type="hidden" id="nid_val" value="0">

							<?php }?>
							<div class="yun_admin_select_box_list_box dn" id="nid_select"><?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['position']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
								<div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('nid','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a> </div>
								<?php } ?> </div>
						</div>
					</td></tr>
				<tr><th>类别名称：</th><td><textarea  id='position' class="add_class_textarea" ></textarea>	</td></tr>
				<tr class='variable'><th>调用变量名：</th><td><textarea id='variable' class="add_class_textarea" ></textarea></td></tr>
				<tr><td colspan='2' align="center"><div class="add_class_div"><span class="admin_web_tip">说明：可以添加多条分类（请按回车Enter键换行，一行一个)</span></div></td></tr>
				<tr><td colspan='2'  align="center"><input class="admin_examine_bth" type="button" value="添加 " onclick="save_class()"/></td></tr>
			</table>
		</div>
	</div>
</div>

<div id="bname"  style="display:none;">
	<div  class="job_box_div">
		<div class="job_box_inp">
			<table cellspacing='1' cellpadding='1' class="admin_examine_table">
				<tr >
					<th width="100">类别选择：</th>
					<td >
						<div class="admin_examine_right">
							<label><span class="add_class_s"><input name='btype' type='radio' value='1' checked='checked'>一级类别</span></label>
							<label><span class="add_class_s"><input name='btype' type='radio' value='2'>二级类别</span></label>
						</div>
					</td>
				</tr>
				<tr class='sclass_2 sclass_3  sclass'  style="display:none;">
					<th>一级分类：</th>
					<td>

						<div class="yun_admin_select_box zindex100"> <?php if ($_smarty_tpl->tpl_vars['row']->value['keyid']) {?>
							<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['position']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['one']->value['id']==$_smarty_tpl->tpl_vars['v']->value) {?>
							<input type="button" value="<?php echo $_smarty_tpl->tpl_vars['one']->value['name'];?>
" class="yun_admin_select_box_text" id="keyid_name" onClick="select_click('keyid');">
							<input name="keyid" type="hidden" id="keyid_val" value="<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">

							<?php }?>
							<?php } ?>
							<?php } else { ?>
							<input type="button" value="请选择" class="yun_admin_select_box_text" id="keyid_name" onClick="select_click('keyid');">
							<input name="keyid" type="hidden" id="keyid_val" value="0">

							<?php }?>
							<div class="yun_admin_select_box_list_box dn" id="keyid_select"><?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['position']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
								<div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('keyid','<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['one']->value['name'];?>
')"><?php echo $_smarty_tpl->tpl_vars['one']->value['name'];?>
</a> </div>
								<?php } ?> </div>
						</div>
					</td></tr>
				<tr><th>类别名称：</th><td><textarea  id='classname' class="add_class_textarea"></textarea></td></tr>
				<tr><td colspan='2' align="center"><div class="add_class_div"><span class="admin_web_tip">说明：可以添加多条分类（请按回车键换行，一行一个）</span></div></td></tr>
				<tr><td colspan='2' align="center"class='ui_content_wrap'><input class="admin_examine_bth" type="button" value="添加 " onClick="save_bclass()"/></td></tr>
			</table>
		</div>
	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function(){
        $(".imghide").hover(function(){
            $(this).find('.class_xg').show();
        },function(){
            $(this).find('.class_xg').hide();
        });
        $("input[name='ctype']").click(function(){
            var val=$(this).val();
            if(val=='1'){
                $(".variable").show();
                $(".sclass").hide();
            }else if(val=='2'){
                $(".variable").hide();
                $(".sclass").show();
            }
        });
        $("input[name='btype']").click(function(){
            var val=$(this).val();
            $(".sclass").hide();
            $(".sclass_"+val).show();
        });

    })

    $(document).ready(function () {
        $('body').click(function (evt) {
            if($(evt.target).parents("#keyid_name").length==0 && evt.target.id != "keyid_name") {
                $('#keyid_select').hide();
            }
        });
    })
<?php echo '</script'; ?>
><?php }} ?>
