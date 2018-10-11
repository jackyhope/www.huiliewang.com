<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-14 22:36:53
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/integral_reduce.htm" */ ?>
<?php /*%%SmartyHeaderCode:1875118305b4a0a8598fa26-82215563%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a034e30fe7c8ca01feb7ce1c55b65d860f583fa2' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/integral_reduce.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1875118305b4a0a8598fa26-82215563',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b4a0a85a1c093_55911987',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b4a0a85a1c093_55911987')) {function content_5b4a0a85a1c093_55911987($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="w1000">
  <div class="admin_mainbody">
    <style>
.my_table_msg th{ text-align:right}
</style>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class=right_box>
      <div class=admincont_box>
       <div class="job_list_tit" style="display: none;">
         <ul class="">
         <!--<li <?php if ($_GET['c']=="integral") {?>class="job_list_tit_cur"<?php }?>><a href="index.php?c=integral"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
任务</a></li>-->
       <!--<li <?php if ($_GET['c']=="integral_reduce") {?>  class="job_list_tit_cur"<?php }?> ><a href="index.php?c=integral_reduce"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
规则</a></li>-->
       <!--<li <?php if ($_GET['c']=="reward_list") {?>  class="job_list_tit_cur"<?php }?> ><a href="index.php?c=reward_list"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
兑换</a></li>-->
         </ul>
         </div>
        <div class="com_body">
          <div class="integral_cont">
            <ul class="integral_cont_list">
              <!--<li> <span class="integral_cont_list_span">发布职位</span> <span class="integral_cont_list_span_c" style="border:none"> 消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_job'];?>
</b> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </span> </li>-->
              <!--<li> <span class="integral_cont_list_span">刷新职位</span> <span class="integral_cont_list_span_c" style="border:none"> 消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_jobefresh'];?>
</b> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </span> </li>-->
              <!--<li> <span class="integral_cont_list_span">发布兼职</span> <span class="integral_cont_list_span_c" style="border:none"> 消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_partjob'];?>
</b> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </span> </li>-->
              <!--<li> <span class="integral_cont_list_span">刷新兼职</span> <span class="integral_cont_list_span_c" style="border:none"> 消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_partjobefresh'];?>
</b> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </span> </li>-->
              <li> <span class="integral_cont_list_span">下载人才简历</span> <span class="integral_cont_list_span_c" style="border:none"> 消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_down_resume'];?>
</b> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </span> </li>
              <!--<li> <span class="integral_cont_list_span">发送面试人才</span> <span class="integral_cont_list_span_c" style="border:none"> 消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_interview'];?>
</b> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
 </span> </li>-->
              <!--<li> <span class="integral_cont_list_span">发布紧急招聘</span> <span class="integral_cont_list_span_c" style="border:none"> 消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['com_urgent'];?>
</b> 元  / 天 </span> </li>-->
              <!--<li> <span class="integral_cont_list_span">发布推荐招聘</span> <span class="integral_cont_list_span_c" style="border:none"> 消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['com_recjob'];?>
</b> 元  / 天 </span> </li>-->
              <!--<li> <span class="integral_cont_list_span">企业评论管理</span> <span class="integral_cont_list_span_c" style="border:none"> 消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_com_comments'];?>
</b> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
  / 月 </span> <span class="integral_cont_list_span_r"></span> </li>-->
              <!--<li> <span class="integral_cont_list_span">职位自动刷新</span> <span class="integral_cont_list_span_c" style="border:none"> 消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['job_auto'];?>
</b> 元  / 天 </span> </li>-->

              <!--<?php if ($_smarty_tpl->tpl_vars['config']->value['integral_question_type']==2) {?>-->
              <!--<li> <span class="integral_cont_list_span">发布问题</span> <span class="integral_cont_list_span_c" style="border:none">消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_question'];?>
</b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</span></li>-->
              <!--<?php }?>-->
              <!--<?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answer_type']==2) {?>-->
              <!--<li> <span class="integral_cont_list_span">回答问题</span> <span class="integral_cont_list_span_c" style="border:none">消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_answer'];?>
</b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</span></li>-->
              <!--<?php }?>-->
              <!--<?php if ($_smarty_tpl->tpl_vars['config']->value['integral_answerpl_type']==2) {?>-->
              <!--<li> <span class="integral_cont_list_span">评论回答</span> <span class="integral_cont_list_span_c" style="border:none">消费 <b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_answerpl'];?>
</b><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</span></li>-->
              <!--<?php }?>-->
             
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
