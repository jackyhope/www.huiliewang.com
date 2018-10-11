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
        layer.confirm('确定要创建新的简历吗？', function () { window.location.href = 'index.php?c=expect'; window.event.returnValue = false; return false; });
    }

    function showmsg(msg) {
        $("#msgs").html(msg);
        $.layer({
            type: 1,
            title: '查看原因',
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
          <div class="member_right_index_h1 fltL"> <span class="member_right_h1_span fltL">我的简历</span> <i class="member_right_h1_icon user_bg"></i></div>
        <div class="resume_box_list">
       		<?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
            <div class="resume_Prompt">提示：所有简历均可用于投递职位；当隐私设置为"公开"时，仅默认简历可以被企业搜索到 </div>
            <?php }?>
            <div class="clear"></div>
            <?php  $_smarty_tpl->tpl_vars['resume'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['resume']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['resume']->key => $_smarty_tpl->tpl_vars['resume']->value) {
$_smarty_tpl->tpl_vars['resume']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['resume']->value['id']==$_smarty_tpl->tpl_vars['def_job']->value) {?>
            <!--  默认简历-->
            <div class="u_new_resume u_new_resume_bg">
            <div class="u_new_resume_left user_bg">默认简历</div>
            <div class="u_new_resume_right">
            <div class="u_new_resume_left_l">
            <div class="u_new_resume_left_name">
            <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['resume']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
</a>
         
            </div>
               <div class="u_new_resume_left_bot2">
           <div class="resume_list_mr_wz_left">
                        <span class="resume_list_mr_wzdleft">完整度：</span><span class="shell fltL shell_mt">
                            <i style="width:<?php echo $_smarty_tpl->tpl_vars['resume']->value['integrity'];?>
%"></i>
                        </span>
                        <span class="resume_list_mr_wzdleft_n"><?php echo $_smarty_tpl->tpl_vars['resume']->value['integrity'];?>
%</span>
                    </div>
                <div class="u_new_resume_left_liul u_new_resume_left_liul_mt5">被浏览：<?php echo $_smarty_tpl->tpl_vars['resume']->value['hits'];?>
 次</div>  
                   </div>  
                <div class="u_new_resume_bot"> 
           <span class="u_new_resume_bot_s">类型：标准简历   </span>       
            <span class="u_new_resume_bot_s">相似职位：
            <a href="index.php?c=likejob&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
" class="u_new_resume_bot_r_a">查看详情</a>
            </span>       
            <span class="u_new_resume_bot_s">更新时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['resume']->value['lastupdate'],'%Y-%m-%d');?>
 </span>     
            </div>
                <div class="u_new_resume_zt_box"> 
                状态：<?php if ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='1') {?>
             <span class="u_new_resume_zt">已审核</span><?php } elseif ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='0') {?>
             <span class="u_new_resume_zt_no">待审核</span><?php } elseif ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='3') {?>
             <span class="u_new_resume_zt_wtg">审核不通过</span>
               <?php if ($_smarty_tpl->tpl_vars['resume']->value['statusbody']) {?>原因：<?php echo $_smarty_tpl->tpl_vars['resume']->value['statusbody'];
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
')" class="u_new_resume_left_a <?php if ($_smarty_tpl->tpl_vars['resume']->value['top']==1&&$_smarty_tpl->tpl_vars['resume']->value['topdatetime']>0) {?> u_new_resume_left_a_zd <?php }?>">置顶</a> -->
         
          <a href="javascript:void(0)" onclick="layer_del('确定要刷新？', '<?php echo $_smarty_tpl->tpl_vars['now_url']->value;?>
&act=refresh&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
');" class="u_new_resume_left_a"> 刷新</a> 
          </div>
            <div class="u_new_resume_left_r_p">
          <a href="index.php?c=expect<?php if ($_smarty_tpl->tpl_vars['resume']->value['doc']) {?>q<?php }?>&e=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
" class="u_new_resume_left_a">修改</a> 
          <a target="_blank" href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['resume']->value['id']),$_smarty_tpl);?>
" class="u_new_resume_left_a"> 预览</a> 
          <a href="javascript:void(0)" onclick="layer_del('确定要删除？', '<?php echo $_smarty_tpl->tpl_vars['now_url']->value;?>
&act=del&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
');" class="u_new_resume_left_a"> 删除</a>
          </div>
           <div class="u_new_resume_left_r_gj">
			
           
            <a class="u_new_resume_bot_r_a" href="index.php?c=privacy">简历隐私设置</a>
             </div>   
             </div>
           </div>
         </div>
         <?php } else { ?>
          <!--  备用简历-->
           <div class="u_new_resume">
            <div class="u_new_resume_left" style="padding:38px 10px">备用</div>
            <div class="u_new_resume_right">
            <div class="u_new_resume_left_l ">
            <div class="u_new_resume_left_name">
            <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['resume']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
</a>
           
            </div>
       
            
            <div class="clear"></div>
            <div class="resume_list_mr_wz_left"><span class="resume_list_mr_wzdleft">完整度：</span><span class="shell fltL shell_mt">
                            <i style="width:<?php echo $_smarty_tpl->tpl_vars['resume']->value['integrity'];?>
%"></i>
                        </span>
                        <span class="resume_list_mr_wzdleft_n"><?php echo $_smarty_tpl->tpl_vars['resume']->value['integrity'];?>
%</span></div>    
                        <div class="u_new_resume_left_liul">被浏览：<?php echo $_smarty_tpl->tpl_vars['resume']->value['hits'];?>
 次</div>   
               <div class="u_new_resume_bot"> 
           <span class="u_new_resume_bot_s">类型：<?php if ($_smarty_tpl->tpl_vars['resume']->value['doc']=='1') {?>快速简历<?php } else { ?>标准简历<?php }?></span>       
            <span class="u_new_resume_bot_s">相似职位：<a href="index.php?c=likejob&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
"class="u_new_resume_bot_r_a">查看详情</a> </span>       
            <span class="u_new_resume_bot_s">更新时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['resume']->value['lastupdate'],'%Y-%m-%d');?>
 </span>     
           
            </div>
            <div class="u_new_resume_zt_box"> 
                状态：<?php if ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='1') {?>
             <span class="u_new_resume_zt">已审核</span><?php } elseif ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='0') {?>
             <span class="u_new_resume_zt_no">待审核</span><?php } elseif ($_smarty_tpl->tpl_vars['resume']->value['r_status']=='3') {?>
             <span class="u_new_resume_zt_wtg">审核不通过</span>
               <?php if ($_smarty_tpl->tpl_vars['resume']->value['statusbody']) {?>原因：<?php echo $_smarty_tpl->tpl_vars['resume']->value['statusbody'];
}
}?>
              </div>
            </div>
           <div class="u_new_resume_left_r u_new_resume_left_rw215">
         <a href="javascript:void(0);" class="u_new_resume_bot_r_a" onclick="layer_del('确定要执行？', 'index.php?c=resume&act=defaultresume&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
');">设为默认</a><span class="u_new_resume_bot_line">|</span><a href="index.php?c=expect<?php if ($_smarty_tpl->tpl_vars['resume']->value['doc']) {?>q<?php }?>&e=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
"class="u_new_resume_bot_r_a">修改</a><span class="u_new_resume_bot_line">|</span><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['resume']->value['id']),$_smarty_tpl);?>
"class="u_new_resume_bot_r_a">预览</a><span class="u_new_resume_bot_line">|</span><a href="javascript:void(0)" onclick="layer_del('确定要删除？', 'index.php?c=resume&act=del&id=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
');" class="u_new_resume_bot_r_a">删除</a>
           </div>
          </div>
         </div>  
               <!--  备用简历-->
         <?php }?>
         <?php }
if (!$_smarty_tpl->tpl_vars['resume']->_loop) {
?>
         <div class="msg_no">您还没有简历。</div>
         <?php } ?>
         <div class="clear"></div>
            <div class="resume_cj" style="display: none;">
                <?php if ($_smarty_tpl->tpl_vars['confignum']->value!='') {?>您还可以创建 <span class="resume_cj_sz">(<?php echo $_smarty_tpl->tpl_vars['maxnum']->value;?>
)</span> 份备用简历<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['maxnum']->value>0) {?>
                <a class=" resume_cj_bth uesr_submit" title="创建新简历" href="javascript:void(0)" onclick="gourl();return false;">创建新简历</a>
                <a href="index.php?c=expectq&add=<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" title="直接粘贴已有的个人简历" class=" resume_cj_bth uesr_submit">在线粘贴简历</a>
                <?php } else { ?>
                <a class="resume_cj_bth  uesr_submit" title="创建新简历" href="javascript:void(0)" onclick="layer.msg('你的简历数已经达到系统设置的简历数了',2,8);return false;">创建新简历</a> 
                <a href="javascript:void(0)" onclick="layer.msg('你的简历数已经达到系统设置的简历数了',2,8);return false;" title="直接粘贴已有的个人简历" class=" resume_cj_bth uesr_submit">
                在线粘贴简历
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
            <div class="admin_Operating_sh_h1" style="padding:5px;">审核说明：<div class="user_Audit_box" id="msgs"></div></div>
            <div class="admin_Operating_sub" style="margin-top:10px;">
                &nbsp;&nbsp;<input type="button" onclick="layer.closeAll();" class="com_pop_bth" value='确认'>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
