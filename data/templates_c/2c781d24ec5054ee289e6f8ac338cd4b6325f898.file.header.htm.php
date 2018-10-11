<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-27 13:38:28
         compiled from "/home/wwwroot/www.huiliewang.com//app/template/member/com/header.htm" */ ?>
<?php /*%%SmartyHeaderCode:1862276335bac6cd4a9adf4-80736908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c781d24ec5054ee289e6f8ac338cd4b6325f898' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com//app/template/member/com/header.htm',
      1 => 1526542159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1862276335bac6cd4a9adf4-80736908',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'style' => 0,
    'com_style' => 0,
    'msgNum' => 0,
    'jobApplyNum' => 0,
    'sysmsgNum' => 0,
    'jobAskNum' => 0,
    'username' => 0,
    'js_def' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bac6cd4ae6ff1_16383949',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bac6cd4ae6ff1_16383949')) {function content_5bac6cd4ae6ff1_16383949($_smarty_tpl) {?><!DOCTYPE span PUBLIC "-//W3C//DTD span 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>企业用户后台管理系统 - <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
</title>
<meta http-equiv=Content-Type content="text/span; charset=gb2312"/> 
<meta http-equiv=X-UA-Compatible content="IE=edge"/>
<?php echo '<script'; ?>
>var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
";<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js"><?php echo '</script'; ?>
>  
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/member_public.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js"><?php echo '</script'; ?>
> 
<link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
/images/m_style.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
/images/user-n2012.css" type="text/css" rel="stylesheet"/>
<meta content="MSHTML 6.00.6000.16939" name=GENERATOR/> 
<?php echo '<script'; ?>
>
/*屏蔽所有的js错误*/
function killerrors() {return true;}
window.onerror = killerrors;
var integral_pricename='<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
';  
<?php echo '</script'; ?>
>
    <!--[if IE 6]>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
      DD_belatedPNG.fix('.png,.#bg');
    <?php echo '</script'; ?>
>
    <![endif]-->
</head>
<body>
<header>
<div class="header_top_main">
<div class="w1000">
<div class="header_top_main_left">欢迎来到<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
！ </div>



  <!--<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
" class="header_m_tc_home">网站首页</a>-->

<?php if ($_smarty_tpl->tpl_vars['msgNum']->value>0) {?>
    <div class="header_Remind fr header_Remind_hover"> 
      <em class="header_Remind_em "><i class="header_Remind_msg"></i></em>
      <div class="header_Remind_list" style="display:none;">
        <?php if ($_smarty_tpl->tpl_vars['jobApplyNum']->value) {?>
        <div class="header_Remind_list_a">
          <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=hr" class="fl">职位申请</a>  
          <span class="header_Remind_list_r fr">(<?php echo $_smarty_tpl->tpl_vars['jobApplyNum']->value;?>
)</span>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['sysmsgNum']->value) {?>
        <div class="header_Remind_list_a">
          <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=sysnews"class="fl"> 系统消息</a>
          <span class="header_Remind_list_r fr">(<?php echo $_smarty_tpl->tpl_vars['sysmsgNum']->value;?>
)</span>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['jobAskNum']->value) {?>
        <div class="header_Remind_list_a">
          <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=msg"class="fl">求职咨询</a>
          <span class="header_Remind_list_r fr">(<?php echo $_smarty_tpl->tpl_vars['jobAskNum']->value;?>
)</span> 
        </div>
        <?php }?>
      </div>
    </div> 
 <?php }?>


 <a  href="javascript:void(0)"  onclick="logout('index.php?act=logout')" class="header_m_tc">退出</a>
    <a class="header_m_username1" href="index.php?c=vs">系统设置</a>
  <span class="header_m_username"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span>

</div>
</div>
<div class="header">
  <div class="w1000">
    <div class="header-logo fltL"><a href="index.php?c=index"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_logo'];?>
" class="png" ></a></div>
   <nav>
    <div class="header_mune">
         <ul>
        <li	<?php if ($_smarty_tpl->tpl_vars['js_def']->value==1) {?> class=cur<?php }?>><a href="/member/index.php?c=index">管理首页</a> </li>
        <li	<?php if ($_smarty_tpl->tpl_vars['js_def']->value==2) {?> class=cur<?php }?>><a href="/member/index.php?c=info">企业资料</a> </li>
        <li	<?php if ($_smarty_tpl->tpl_vars['js_def']->value==3) {?> class=cur<?php }?>><a href="/member/index.php?c=job&w=1">职位管理</a> </li>
        <li	<?php if ($_smarty_tpl->tpl_vars['js_def']->value==5) {?> class=cur<?php }?>><a href="/member/index.php?c=hr">简历管理</a> </li>
        <li	<?php if ($_smarty_tpl->tpl_vars['js_def']->value==8) {?> class=cur<?php }?>><a href="/resume/index.php">人才搜索</a> </li>
        <li	<?php if ($_smarty_tpl->tpl_vars['js_def']->value==4) {?> class=cur<?php }?>><a href="/member/index.php?c=com">财务管理</a> </li>
        <!--<li	<?php if ($_smarty_tpl->tpl_vars['js_def']->value==7) {?> class=cur<?php }?>><a href="index.php?c=vs">系统设置</a> </li>-->
      </ul>
      </div>
      </nav>
  </div>
</div>
<div class="clear"></div> 
</header><?php }} ?>
