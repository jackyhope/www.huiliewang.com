<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 09:41:29
         compiled from "/home/wwwroot/www.huiliewang.com//app/template/default/public_search/resume_include.htm" */ ?>
<?php /*%%SmartyHeaderCode:2018574465bbab5c987cb16-67944366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d473ddbd1157223c4b5ef3420f008040bfb0ada' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com//app/template/default/public_search/resume_include.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2018574465bbab5c987cb16-67944366',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company_job' => 0,
    'v' => 0,
    'Info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbab5c9899302_31759146',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbab5c9899302_31759146')) {function content_5bbab5c9899302_31759146($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
?><div id='job_box' class="none" style="float:left">
	<div class="r_Interview" style="z-index:10">
		<span class="Interview_span">面试职位：</span>
		<div class="Interview_text_box">
			<input type="button" value="请选择" class="Interview_text_box_t"  id="name" onClick="search_show('job_name');"/>
			<input type="hidden" id="nameid" name="name" value=''/>
			<div class="Interview_text_box_list none" id="job_name">
				<ul>
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['company_job']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>    
						<li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
', 'name', '<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
');"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a></li>
					<?php } ?> 
				</ul>
			</div>
		</div>
	</div>
	<div class="r_Interview" style="z-index:9"><span class="Interview_span">联系人：</span><input size='5'  id='linkman' value='' class="Interview_text"/></div>
	<div class="r_Interview"><span class="Interview_span">联系电话：</span><input size='19'  id='linktel' value='' class="Interview_text"/></div>
	<div class="r_Interview"><span class="Interview_span">面试时间：</span><input size='40' id='intertime' value=''  class="Interview_text  "/></div>
	<div class="r_Interview"><span class="Interview_span">面试地址：</span><input size='40' id='address' value=''  class="Interview_text"/></div>
	<div class="r_Interview"><span class="Interview_span">面试备注：</span><textarea id="content" cols="40" rows="5"  class="Interview_textarea_text"></textarea></div>
	<div class="r_Interview " style="padding-bottom:20px;"><span class="Interview_span">&nbsp;</span><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
" id="eid">
		<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['Info']->value['uid'];?>
" id="uid"/>
		<input type="hidden" id="username" value="<?php echo $_smarty_tpl->tpl_vars['Info']->value['name'];?>
"/> 
		<input class="resume_sub_yq" id="click_invite" type="button" value="邀请面试"  />
 	</div>
 </div>
 
<div id="talent_pool_beizhu" class="none">
	<div class="resume_beizu" style="margin-left:18px; margin-top:18px;">
		<textarea id="remark" cols="40" rows="5" class="resume_beizu_text" style="width:340px;height:90px;border:1px solid #ddd"></textarea>
	</div>
	<div style="text-align:center; padding:10px 0;">
		<input type="button" value="保存" onClick="talent_pool('<?php echo $_smarty_tpl->tpl_vars['Info']->value['uid'];?>
','<?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
','<?php echo smarty_function_url(array('m'=>'ajax','c'=>'talent_pool'),$_smarty_tpl);?>
')" class="resume_beizu_bth"/>
	</div>
</div>

<?php echo '<script'; ?>
>
function search_show(id){
	$("#"+id).show();
}
function selects(id,type,name){
	$("#job_"+type).hide();
	$("#"+type).val(name);
	$("#"+type+"id").val(id);
	
}
$(document).ready(function () {
	$('body').click(function (evt) {		
		if($(evt.target).parents("#name").length==0 && evt.target.id != "name") {
			$('#job_name').hide();
		}
  	});
})
<?php echo '</script'; ?>
><?php }} ?>
