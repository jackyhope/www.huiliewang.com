<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-11 13:55:20
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/user/resume.htm" */ ?>
<?php /*%%SmartyHeaderCode:4391126015b9758c88d6219-03477965%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de79e7cbb2c3df02b3338015e97c90017eb21bf0' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/user/resume.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4391126015b9758c88d6219-03477965',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
    'resume' => 0,
    'def_job' => 0,
    'now_url' => 0,
    'confignum' => 0,
    'maxnum' => 0,
    'uid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b9758c898b885_68148182',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b9758c898b885_68148182')) {function content_5b9758c898b885_68148182($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 type="text/javascript">
    function gourl() {
        layer.confirm('ȷ��Ҫ�����µļ�����', function () { window.location.href = 'index.php?c=expect'; window.event.returnValue = false; return false; });
    }

    function showmsg(msg) {
        $("#msgs").html(msg);
        $.layer({
            type: 1,
            title: '�鿴ԭ��',
            closeBtn: [0, true],
            border: [10, 0.3, '#000', true],
            area: ['400px', '200px'],
            page: { dom: "#showmsg" }
        });
    }
<?php echo '</script'; ?>
>
<style>
    .u_new_resume_left_r_p{
        float: initial;
    }
</style>
<div class="yun_user_member_w1100">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="mian_right fltR mt20 re">
          <div class="member_right_index_h1 fltL"> <span class="member_right_h1_span fltL">�ҵļ���</span> <i class="member_right_h1_icon user_bg"></i></div>
        <div class="resume_box_list">
       		<?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
            <div class="resume_Prompt">��ʾ�����м�����������Ͷ��ְλ������˽����Ϊ"����"ʱ����Ĭ�ϼ������Ա���ҵ������ </div>
            <?php }?>
            <div class="clear"></div>
            <?php  $_smarty_tpl->tpl_vars['resume'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['resume']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['resume']->key => $_smarty_tpl->tpl_vars['resume']->value) {
$_smarty_tpl->tpl_vars['resume']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['resume']->value['id']==$_smarty_tpl->tpl_vars['def_job']->value) {?>
            <!--  Ĭ�ϼ���-->
            <div class="u_new_resume u_new_resume_bg">
            <div class="u_new_resume_left user_bg">Ĭ�ϼ���</div>
            <div class="u_new_resume_right">
            <div class="u_new_resume_left_l">
            <div class="u_new_resume_left_name">
            <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['resume']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
</a>
         
            </div>
               <div class="u_new_resume_left_bot2">
           <div class="resume_list_mr_wz_left">
                        <span class="resume_list_mr_wzdleft">�����ȣ�</span><span class="shell fltL shell_mt">
                            <i style="width:<?php echo $_smarty_tpl->tpl_vars['resume']->value['integrity'];?>
%"></i>
                        </span>
                        <span class="resume_list_mr_wzdleft_n"><?php echo $_smarty_tpl->tpl_vars['resume']->value['integrity'];?>
%</span>
                    </div>
                <div class="u_new_resume_left_liul u_new_resume_left_liul_mt5">�������<?php echo $_smarty_tpl->tpl_vars['resume']->value['hits'];?>
 ��</div>  
                   </div>  
                <div class="u_new_resume_bot"> 
           <span class="u_new_resume_bot_s">���ͣ���׼����   </span>       
            <span class="u_new_resume_bot_s">����ְλ��
            <a href="index.php?c=likejob&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
" class="u_new_resume_bot_r_a">�鿴����</a>
            </span>       
            <span class="u_new_resume_bot_s">����ʱ�䣺<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['resume']->value['lastupdate'],'%Y-%m-%d');?>
 </span>     
            </div>
                <div class="u_new_resume_zt_box"> 
                ״̬��<?php if ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='1') {?>
             <span class="u_new_resume_zt">�����</span><?php } elseif ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='0') {?>
             <span class="u_new_resume_zt_no">�����</span><?php } elseif ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='3') {?>
             <span class="u_new_resume_zt_wtg">��˲�ͨ��</span>
               <?php if ($_smarty_tpl->tpl_vars['resume']->value['statusbody']) {?>ԭ��<?php echo $_smarty_tpl->tpl_vars['resume']->value['statusbody'];
}
}?>
                </div>
            </div>
           <div class="u_new_resume_left_r" style="width: 150px;">
           <div class="u_new_resume_left_r_p">
          <!--<a href="javascript:void(0)" onclick="resumetop('<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
','<?php if ($_smarty_tpl->tpl_vars['resume']->value['topdatetime']>0) {
echo $_smarty_tpl->tpl_vars['resume']->value['topdate'];
}?>','<?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
')" class="u_new_resume_left_a <?php if ($_smarty_tpl->tpl_vars['resume']->value['top']==1&&$_smarty_tpl->tpl_vars['resume']->value['topdatetime']>0) {?> u_new_resume_left_a_zd <?php }?>">�ö�</a> -->
         
          <a href="javascript:void(0)" onclick="layer_del('ȷ��Ҫˢ�£�', '<?php echo $_smarty_tpl->tpl_vars['now_url']->value;?>
&act=refresh&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
');" class="u_new_resume_left_a"> ˢ��</a> 
          </div>
            <div class="u_new_resume_left_r_p">
          <a href="index.php?c=expect<?php if ($_smarty_tpl->tpl_vars['resume']->value['doc']) {?>q<?php }?>&e=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
" class="u_new_resume_left_a">�޸�</a> 
          <a target="_blank" href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['resume']->value['id']),$_smarty_tpl);?>
" class="u_new_resume_left_a"> Ԥ��</a> 
          <a href="javascript:void(0)" onclick="layer_del('ȷ��Ҫɾ����', '<?php echo $_smarty_tpl->tpl_vars['now_url']->value;?>
&act=del&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
');" class="u_new_resume_left_a"> ɾ��</a>
          </div>
           <div class="u_new_resume_left_r_gj">
			
           
            <a class="u_new_resume_bot_r_a" href="index.php?c=privacy">������˽����</a>
             </div>   
             </div>
           </div>
         </div>
         <?php } else { ?>
          <!--  ���ü���-->
           <div class="u_new_resume">
            <div class="u_new_resume_left" style="padding:38px 10px">����</div>
            <div class="u_new_resume_right">
            <div class="u_new_resume_left_l ">
            <div class="u_new_resume_left_name">
            <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['resume']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
</a>
           
            </div>
       
            
            <div class="clear"></div>
            <div class="resume_list_mr_wz_left"><span class="resume_list_mr_wzdleft">�����ȣ�</span><span class="shell fltL shell_mt">
                            <i style="width:<?php echo $_smarty_tpl->tpl_vars['resume']->value['integrity'];?>
%"></i>
                        </span>
                        <span class="resume_list_mr_wzdleft_n"><?php echo $_smarty_tpl->tpl_vars['resume']->value['integrity'];?>
%</span></div>    
                        <div class="u_new_resume_left_liul">�������<?php echo $_smarty_tpl->tpl_vars['resume']->value['hits'];?>
 ��</div>   
               <div class="u_new_resume_bot"> 
           <span class="u_new_resume_bot_s">���ͣ�<?php if ($_smarty_tpl->tpl_vars['resume']->value['doc']=='1') {?>���ټ���<?php } else { ?>��׼����<?php }?></span>       
            <span class="u_new_resume_bot_s">����ְλ��<a href="index.php?c=likejob&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
"class="u_new_resume_bot_r_a">�鿴����</a> </span>       
            <span class="u_new_resume_bot_s">����ʱ�䣺<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['resume']->value['lastupdate'],'%Y-%m-%d');?>
 </span>     
           
            </div>
            <div class="u_new_resume_zt_box"> 
                ״̬��<?php if ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='1') {?>
             <span class="u_new_resume_zt">�����</span><?php } elseif ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='0') {?>
             <span class="u_new_resume_zt_no">�����</span><?php } elseif ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='3') {?>
             <span class="u_new_resume_zt_wtg">��˲�ͨ��</span>
               <?php if ($_smarty_tpl->tpl_vars['resume']->value['statusbody']) {?>ԭ��<?php echo $_smarty_tpl->tpl_vars['resume']->value['statusbody'];
}
}?>
              </div>
            </div>
           <div class="u_new_resume_left_r u_new_resume_left_rw215">
         <a href="javascript:void(0);" class="u_new_resume_bot_r_a" onclick="layer_del('ȷ��Ҫִ�У�', 'index.php?c=resume&act=defaultresume&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
');">��ΪĬ��</a><span class="u_new_resume_bot_line">|</span><a href="index.php?c=expect<?php if ($_smarty_tpl->tpl_vars['resume']->value['doc']) {?>q<?php }?>&e=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
"class="u_new_resume_bot_r_a">�޸�</a><span class="u_new_resume_bot_line">|</span><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['resume']->value['id']),$_smarty_tpl);?>
"class="u_new_resume_bot_r_a">Ԥ��</a><span class="u_new_resume_bot_line">|</span><a href="javascript:void(0)" onclick="layer_del('ȷ��Ҫɾ����', 'index.php?c=resume&act=del&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
');" class="u_new_resume_bot_r_a">ɾ��</a>
           </div>
          </div>
         </div>  
               <!--  ���ü���-->
         <?php }?>
         <?php }
if (!$_smarty_tpl->tpl_vars['resume']->_loop) {
?>
         <div class="msg_no">����û�м�����</div>
         <?php } ?>
         <div class="clear"></div>
            <div class="resume_cj" style="display: none;">
                <?php if ($_smarty_tpl->tpl_vars['confignum']->value!='') {?>�������Դ��� <span class="resume_cj_sz">(<?php echo $_smarty_tpl->tpl_vars['maxnum']->value;?>
)</span> �ݱ��ü���<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['maxnum']->value>0) {?>
                <a class=" resume_cj_bth uesr_submit" title="�����¼���" href="javascript:void(0)" onclick="gourl();return false;">�����¼���</a>
                <a href="index.php?c=expectq&add=<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" title="ֱ��ճ�����еĸ��˼���" class=" resume_cj_bth uesr_submit">����ճ������</a>
                <?php } else { ?>
                <a class="resume_cj_bth  uesr_submit" title="�����¼���" href="javascript:void(0)" onclick="layer.msg('��ļ������Ѿ��ﵽϵͳ���õļ�������',2,8);return false;">�����¼���</a> 
                <a href="javascript:void(0)" onclick="layer.msg('��ļ������Ѿ��ﵽϵͳ���õļ�������',2,8);return false;" title="ֱ��ճ�����еĸ��˼���" class=" resume_cj_bth uesr_submit">
                ����ճ������
                </a>
                <?php }?>
            </div>
            <div class="clear"></div>
           
        </div>
    </div>
</div>

<div id="showmsg" style="display:none; width: 400px;">
    <div id="infobox">
        <div class="admin_Operating_sh" style="padding:10px; ">
            <div class="admin_Operating_sh_h1" style="padding:5px;">���˵����<div class="user_Audit_box" id="msgs"></div></div>
            <div class="admin_Operating_sub" style="margin-top:10px;">
                &nbsp;&nbsp;<input type="button" onclick="layer.closeAll();" class="com_pop_bth" value='ȷ��'>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>