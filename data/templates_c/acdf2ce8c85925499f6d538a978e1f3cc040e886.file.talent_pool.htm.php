<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-27 11:38:44
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/talent_pool.htm" */ ?>
<?php /*%%SmartyHeaderCode:15754079265bac50c43ee7b8-42056685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acdf2ce8c85925499f6d538a978e1f3cc040e886' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/talent_pool.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15754079265bac50c43ee7b8-42056685',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comstyle' => 0,
    'now_url' => 0,
    'rows' => 0,
    'v' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bac50c45f43e2_81293688',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bac50c45f43e2_81293688')) {function content_5bac50c45f43e2_81293688($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="w1000">
<div class="admin_mainbody"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <link href="<?php echo $_smarty_tpl->tpl_vars['comstyle']->value;?>
/images/index_style.css" type=text/css rel=stylesheet>
  <div class=right_box>
    <div class=admincont_box>
     <div class="job_list_tit">
         <ul class="">
         <li <?php if ($_GET['c']=="hr") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=hr">�յ�����</a></li>
         <li <?php if ($_GET['c']=="down") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=down">�����ؼ���</a></li>
         <li <?php if ($_GET['c']=="talent_pool") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=talent_pool">�ղؼ���</a></li>
         <li <?php if ($_GET['c']=="look_resume") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=look_resume">�����ļ���</a></li>
             <!--<li <?php if ($_GET['c']=="refuse") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=refuse"  title="�����ʼ���">�����ʼ���</a></li>-->
             <!--<li <?php if ($_GET['c']=="record") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=record" title="��վΪ���Ƽ��ļ���">��վ�Ƽ�����</a></li>-->
         </ul>
         </div>
     <div class="clear"></div>
        <form action="index.php" method="get">
        <div class="news_search">
          <input name="c" type="hidden" value="talent_pool">
          <input name="keyword" type="text" class="news_text" placeholder="����������ؼ���" value="<?php echo $_GET['keyword'];?>
">
          <input name="" type="submit" class="news_bth" value="����">
        </div>
        </form>
      <div class="com_body">
        <div class=admin_textbox_04>
          <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
          <form action="<?php echo $_smarty_tpl->tpl_vars['now_url']->value;?>
&act=del" target="supportiframe" method="post" id='myform'>
            <div class=table>
              <div id="job_checkbokid" >
               <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
                <div class="job_news_list job_news_list_h1"> 
                <span class="job_news_list_span job_w30" style="padding-right:5px;">&nbsp;</span> 
                <span class="job_news_list_span job_w120" style="text-align:left">����</span>
                 <span class="job_news_list_span job_w160">��ְ����</span>  
                <span class="job_news_list_span job_w120">��������</span> 
                <span class="job_news_list_span job_w140">����н��</span> 
                <span class="job_news_list_span job_w100">�ղ�ʱ��</span> 
                <span class="job_news_list_span job_w150" style="text-align:center">����</span>
                </div>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <div class="job_news_list"> <span class="job_news_list_span job_w30" style="padding-right:5px;">
                  <input type=checkbox name="delid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"   class="com_Release_job_qx_check" style="margin-top:2px;">
                  </span> 
                   <span class="job_news_list_span job_w120" style="text-align:left">  
                   <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>'`$v.eid`'),$_smarty_tpl);?>
" class="com_Release_name" target=_blank><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a>&nbsp;</span> 
                  <span class="job_news_list_span job_w160"><span class="yxjob_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['jobname'];?>
&nbsp;</span></span> 
                 <span class="job_news_list_span job_w120"><?php echo $_smarty_tpl->tpl_vars['v']->value['exp'];?>
&nbsp;</span> 
                   <span class="job_news_list_span job_w140"><?php if ($_smarty_tpl->tpl_vars['v']->value['minsalary']&&$_smarty_tpl->tpl_vars['v']->value['maxsalary']) {?>��<?php echo $_smarty_tpl->tpl_vars['v']->value['minsalary'];?>
-<?php echo $_smarty_tpl->tpl_vars['v']->value['maxsalary'];
} elseif ($_smarty_tpl->tpl_vars['v']->value['minsalary']) {?>��<?php echo $_smarty_tpl->tpl_vars['v']->value['minsalary'];?>
����<?php } else { ?>����<?php }?>&nbsp;</span> 
                  <span class="job_news_list_span job_w100"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['ctime'],'%Y-%m-%d');?>
&nbsp;</span> 
                   <span class="job_news_list_span job_w150" style="text-align:center"> <?php if ($_smarty_tpl->tpl_vars['v']->value['userid_msg']==1) {?> <font color="red">������</font> <?php } else { ?> <a href="/resume/index.php?c=show&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['eid'];?>
"  style="position:relative; "> �鿴����</a> <?php }?> <span class="com_m_line">|</span> <a href="javascript:;" class="uesr_name_a" onclick="remark('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['remark'];?>
');">��ע</a><span class="com_m_line">|</span> <a href="javascript:void(0)" onclick="layer_del('ȷ��Ҫɾ����','<?php echo $_smarty_tpl->tpl_vars['now_url']->value;?>
&act=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="uesr_name_a">ɾ��</a></span> </div>
                <?php } ?>
                <div>
                  <div class="com_Release_job_bot"> <span class="com_Release_job_qx">
                    <input id='checkAll'  type="checkbox" onclick='m_checkAll(this.form)' class="com_Release_job_qx_check">
                    ȫѡ</span>
                    <INPUT  class="c_btn_02" type="button" name="subdel" value="����ɾ��" onclick="return really('delid[]');">
                  </div>
                  <div class="diggg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
                </div>
                <?php } elseif ($_GET['keyword']!='') {?>
                 <div class="msg_no">
                   <p>û��������������¼��</p>
                   <a href="<?php echo smarty_function_url(array('m'=>'resume'),$_smarty_tpl);?>
" class="com_msg_no_bth com_submit"  target="_blank">��Ҫ�������˲�</a></div>
                <?php } else { ?>
                <div class="msg_no">
                   <p>�װ����û���Ŀǰ��û���ղؼ�����¼��</p>
                   <a href="<?php echo smarty_function_url(array('m'=>'resume'),$_smarty_tpl);?>
" class="com_msg_no_bth com_submit"  target="_blank">��Ҫ�������˲�</a></div>
                <?php }?> </div>
            </div>
            <div> </div>
          </form>
          <div class="clear"></div>
          <div class="infoboxp22" id="infobox" style="display:none; ">
            <div>
              <form action="index.php?c=talent_pool&act=remark" method="post" id="formstatus" target="supportiframe">
                <input name="id" value="0" type="hidden">
                <div class="jb_infobox" style="width: 100%;">
                  <textarea id="remark" style="width:310px;margin:5px" name="remark" class="hr_textarea"></textarea>
                </div>
                <div class="jb_infobox" style="width: 100%;">
                  <button type="submit" name='submit' value='1' class="submit_btn" style="margin-left:80px;">ȷ��</button>
                  &nbsp;&nbsp;
                  <button type="button" id='zxxCancelBtn'  class="cancel_btn">ȡ��</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php echo '<script'; ?>
> 
function remark(id,remark){
	$("input[name=id]").val(id);
	$("#remark").val(remark);
	$.layer({
		type : 1,
		title :'��ע', 
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['320px','160px'],
		page : {dom :"#infobox"}
	});
}
$(document).ready(function(){ 
	$('#zxxCancelBtn').click(function(){
		layer.closeAll();
	}); 
}); 
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/yqms.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
