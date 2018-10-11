<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-07 00:49:12
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/user/job/job.htm" */ ?>
<?php /*%%SmartyHeaderCode:18895054905bb8e78854a417-21013469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6686822210dbf5d598cf034d8883d1a506b0ef0' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/user/job/job.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18895054905bb8e78854a417-21013469',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msgnum' => 0,
    'total' => 0,
    'StateList' => 0,
    'key' => 0,
    'v' => 0,
    'search_list' => 0,
    'rows' => 0,
    'job' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb8e78861f308_43146285',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb8e78861f308_43146285')) {function content_5bb8e78861f308_43146285($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="yun_user_member_w1100"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="mian_right fltR mt20">
       <div class="member_right_index_h1 fltL"> <span class="member_right_h1_span fltL">我的职位</span> <i class="member_right_h1_icon user_bg"></i></div>
    <div class="resume_box_list">
    <div class="job_list_tit">
        <ul class="">
            <!--<li <?php if ($_GET['c']=='msg') {?>class="job_list_tit_cur"<?php }?>><a href="index.php?c=msg">面试通知</a><?php if ($_smarty_tpl->tpl_vars['msgnum']->value) {?><i class="left_sidebar_leftmune_icon"><?php echo $_smarty_tpl->tpl_vars['msgnum']->value;?>
</i><?php }?></li>-->
      <li <?php if ($_GET['c']=='job') {?>class="job_list_tit_cur"<?php }?>><a href="index.php?c=job">申请的职位</a></li>
      <li <?php if ($_GET['c']=='favorite') {?>class="job_list_tit_cur"<?php }?>><a href="index.php?c=favorite">职位收藏</a></li>
      <li <?php if ($_GET['c']=='look_job') {?>class="job_list_tit_cur"<?php }?>><a href="index.php?c=look_job">浏览的职位 </a></li>
	  </ul>
      </div>
        <div class="clear"></div>
      <div class="resume_Prompt">您已申请 <span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span> 条职位,请耐心等待企业回复！</div>
      <div class="clear"></div>
       <div class="job_td_list_box">
     <div class="job_td_list">
      投递反馈： 
      <a href="index.php?c=job" class="<?php if (!$_GET['browse']) {?>job_td_list_cur<?php } else { ?>job_td_list_a<?php }?>">不限</a>
      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['StateList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
     <a href="index.php?c=job&browse=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="<?php if ($_GET['browse']==$_smarty_tpl->tpl_vars['key']->value) {?>job_td_list_cur<?php } else { ?>job_td_list_a<?php }?>"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a>
        <?php } ?>
        </div>
      <div class="job_td_list job_td_list_mt">
      投递时间：
       <a href="index.php?c=job" class="<?php if (!$_GET['datetime']) {?>job_td_list_cur<?php } else { ?>job_td_list_a<?php }?>">不限</a>
       <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['search_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
      <a href="index.php?c=job&datetime=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"  class="<?php if ($_GET['datetime']==$_smarty_tpl->tpl_vars['key']->value) {?>job_td_list_cur<?php } else { ?>job_td_list_a<?php }?>"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a>
        <?php } ?>
      </div>
        </div>
       <div class="clear"></div>
       
      <div id="gms_showclew"></div>
      <form action="index.php" method="get" target="supportiframe" id='myform'>
      <input type="hidden" name="c" value="job" />
      <input type="hidden" name="act" value="del" />
      <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
      <div class="List_Ope List_Title mt12"> 
      <div class="job_applied_position_name"><em class="List_Title_span_name">申请的职位</em></div> 
      <div class="job_applied_position">职位状态</div>
      <div class="job_applied_position">投递反馈</div>
      <div class="job_applied_position">投递简历名称</div>
      <div class="job_applied_position">投递时间</div>
      <span class="List_Title_span List_Title_w80">操作</span>
  </div>
      <?php }?>
      <?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value) {
$_smarty_tpl->tpl_vars['job']->_loop = true;
?>
      <div class="List_Ope List_Ope_bor">
       <div class="job_applied_position_namec">
      
          <input type=checkbox name="delid[]" value="<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
" class="job_applied_position_nameccheck">
        
        <div class=""> <?php if ($_smarty_tpl->tpl_vars['job']->value['type']==1) {?> 
        <a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$job.job_id`'),$_smarty_tpl);?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['job']->value['job_name'];?>
" class="List_Title_span_com"><?php echo $_smarty_tpl->tpl_vars['job']->value['job_name'];?>
</a> 
        
        <?php }?> 
        </div>    
        <?php if ($_smarty_tpl->tpl_vars['job']->value['type']==3) {?>
        <a href="<?php echo smarty_function_url(array('m'=>'lietou','c'=>'headhunter','uid'=>'`$job.com_id`'),$_smarty_tpl);?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['job']->value['com_name'];?>
" class="List_Ope_a"><?php echo $_smarty_tpl->tpl_vars['job']->value['com_name'];?>
 </a>
        <?php } else { ?>
           <?php if ($_smarty_tpl->tpl_vars['job']->value['identity']==3) {?>
           <label title="<?php echo $_smarty_tpl->tpl_vars['job']->value['com_name'];?>
"class="List_Ope_a"><?php echo $_smarty_tpl->tpl_vars['job']->value['com_name'];?>
</label>
           <?php } else { ?>
           <a href="<?php echo smarty_function_url(array('m'=>'company','c'=>'show','id'=>'`$job.com_id`'),$_smarty_tpl);?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['job']->value['com_name'];?>
"class="List_Ope_a"><?php echo $_smarty_tpl->tpl_vars['job']->value['com_name'];?>
</a>
           <?php }?>
         <?php }?>
       </div>
        
         <?php if ($_smarty_tpl->tpl_vars['job']->value['id']) {?> 
            <?php if ($_smarty_tpl->tpl_vars['job']->value['status']==0) {?> 
            <div class="job_applied_position job_applied_position_mt10 <?php if ($_smarty_tpl->tpl_vars['job']->value['status']>0) {?>statuscolor<?php }?>">招聘中</div>
            <?php } else { ?>
            <div class="job_applied_position job_applied_position_mt10 <?php if ($_smarty_tpl->tpl_vars['job']->value['status']>0) {?>statuscolor<?php }?>">已下架</div>
            <?php }?>
         <?php } else { ?>
        	<div class="job_applied_position job_applied_position_mt10 <?php if ($_smarty_tpl->tpl_vars['job']->value['status']>0) {?>statuscolor<?php }?>">已删除</div>
         <?php }?>
        <div class="job_applied_position job_applied_position_mt10 <?php if ($_smarty_tpl->tpl_vars['job']->value['is_browse']>1) {?>statuscolor<?php }?>"><?php echo $_smarty_tpl->tpl_vars['StateList']->value[$_smarty_tpl->tpl_vars['job']->value['is_browse']];?>
</div>
   <div class="job_applied_position job_applied_position_mt10"><?php echo $_smarty_tpl->tpl_vars['job']->value['resume_name'];?>
</div>
    <div class="job_applied_position job_applied_position_mt10"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['datetime'],'%Y-%m-%d');?>
</div>
      <span class="List_Title_span List_Title_w80 mt10"> 
      <!--批量取消-->
      
      <?php if ($_smarty_tpl->tpl_vars['job']->value['quxiao']=='1') {?>
      <span class="List_dete" style="color:#999;">已取消申请</span><br/>
      <a href="javascript:void(0)" onclick="layer_del('确定要删除？','index.php?c=job&act=del&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
');" class="List_dete cblue" >删除</a>
      <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['job']->value['body']!='') {?> <span class="List_dete" style="color:#999;">已取消申请</span><br/>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['job']->value['is_browse']=='1'&&$_smarty_tpl->tpl_vars['job']->value['body']=='') {?> <a href="javascript:void(0)" onclick="canceljob(<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
);" class="List_dete cblue" >取消申请</a> <?php } else { ?> <a href="javascript:void(0)" onclick="layer_del('确定要删除？','index.php?c=job&act=del&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
');" class="List_dete cblue" >删除</a> <?php }?> 
        <?php }?>  
       
        </span> </div>
      <div class="clear"></div>
      <?php }
if (!$_smarty_tpl->tpl_vars['job']->_loop) {
?>
      <div class="msg_no">
      <p>亲爱的用户，您还没有申请过职位，想要获得更多工作机会</p>
  <p>立即搜索您感兴趣的职位并申请吧！</p>
<a href="<?php echo smarty_function_url(array('m'=>'job'),$_smarty_tpl);?>
" target="_blank"class="msg_no_sq uesr_submit">立即搜索我感兴趣的职位>></a>
</div>
      <?php } ?>
       </div>
      <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
     <div class="resume_box_bottom">
      <div class="List_Ope List_Ope_bg"> 
      <span class="job_bth_inc">
        <input id="checkAll" type="checkbox" onclick="m_checkAll(this.form)" class="List_Title_span_check_n mt5">
        </span>
        <input type="button" name="subdel" value="批量取消" onclick="return really_quxiao('delid[]');" class="job_pl_sub">
      </div>
    
     <div class="diggg" style="margin-top:10px; float:right"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>  
           </div>
      <?php }?>
    </form>
    
  </div>
</div>
<div style="padding:10px;height:180px;display:none;" id='blackdiv'>
  <div class="Blacklist_box">
    <form action="index.php?c=job&act=qs" target="supportiframe" method="post">
      <input type="hidden" value="" name="id" id="qsid">
       <div class="qxsq_box"> 
        <span class="Blacklist_box_qx">选择取消原因：</span>
        <select name="body" style="width:160px;">
          <option value="已经找到工作">已经找到工作</option>
          <option value="想休息一段时间">想休息一段时间</option>
          <option value="生病了">生病了</option>
          <option value="看错信息了">看错信息了</option>
          <option value="很长时间没有查看">很长时间没有查看</option>
          <option value="其它原因">其它原因</option>
        </select>
      </div>
      <div class="qxsq_box_bth">
        <input type="submit" value="确定" class="job_sq_qx_yy">
      </div>
    </form>
  </div>
  <div class="clear"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
