<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-30 21:05:46
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/evaluate/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:21190867125bb0ca2a4c1a37-37776334%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f51e42be120c8dab31cc1378567cb8a2bbb85ae' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/evaluate/index.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21190867125bb0ca2a4c1a37-37776334',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'config' => 0,
    'evaluateTop' => 0,
    'key' => 0,
    'item' => 0,
    'rows' => 0,
    'evaluateRecommend' => 0,
    'examinee' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb0ca2a58db26_47319762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb0ca2a58db26_47319762')) {function content_5bb0ca2a58db26_47319762($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"/>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/evaluate.css"/>
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="clear"></div>

<div class="cp_content">
<div class="wrap">
    <div class="current_Location  png">您当前的位置：<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
">首页</a>  >  <span>测评</span>
</div>
<div class="clear"></div>
<div class="cp_content_left fl">
	<div class="cp_left_inner">
		<div class="cp_zhic_text">
			<div id="cp_top_div" class="cp_left_inner_hd_box">
			
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['evaluateTop']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<div class="cp_text_top"  <?php if ($_smarty_tpl->tpl_vars['key']->value!=0) {?>style="display:none;height:211px;"<?php } else { ?>style="height:211px;"<?php }?> >
				<div class="cp_top_pic fl"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" width="378" height="210" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_logo'];?>
',2);"/><span class="cp_top_arr"></span></div>
				<div class="cp_top_secret fl">
					<div class="cp_secret_tit"><a href="<?php echo smarty_function_url(array('m'=>'evaluate','c'=>'exampaper','titleid'=>'`$item.id`','gid'=>'`$item.keyid`'),$_smarty_tpl);?>
"  target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></div>
					<div class="cp_secret_star">
					<div class="cp_star_lt fl c9">测评人数：<em><?php echo $_smarty_tpl->tpl_vars['item']->value['visits'];?>
人</em><br>评论：<em><?php echo $_smarty_tpl->tpl_vars['item']->value['comnum'];?>
条</em></div>
					<div class="cp_star_tt fl"><a href="<?php echo smarty_function_url(array('m'=>'evaluate','c'=>'exampaper','titleid'=>'`$item.id`','gid'=>'`$item.keyid`'),$_smarty_tpl);?>
"  target="_blank">开始测试</a></div>
					</div>
					<div class="clear"></div>
					<div class="cp_secret_with c6" style="height:70px;"><?php echo mb_substr($_smarty_tpl->tpl_vars['item']->value['description'],0,60,'gbk');?>
<a href="<?php echo smarty_function_url(array('m'=>'evaluate','c'=>'exampaper','titleid'=>'`$item.id`','gid'=>'`$item.keyid`'),$_smarty_tpl);?>
" target="_blank">[详细]</a></div>
				</div>
			</div>
			<?php } ?>
			  
			</div>               
			
			<div class="clear"></div>
			
            <div class="cp_text_main">
			<div class="cp_text_di" id="top_small">
			<ul>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['evaluateTop']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<li <?php if ($_smarty_tpl->tpl_vars['key']->value=='4') {?>style="margin-right:auto;"<?php }?>>
				<a href="javascript:void(0)">
				<img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" width="180" height="100" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_logo'];?>
',2);"/>
				</a></li>
			<?php } ?>
			</ul>
            
			</div>
            </div>  
		</div>
		<div class="clear"></div> 
		<div class="cp_left_hot">
			<div class="cp_hot_biaoti f14">热门测评</div>
			<?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
			<div class="cp_hot_fit01">
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<div class="cp_hot_fit">
					<div class="cp_fit_tp fl">
					<a href="<?php echo smarty_function_url(array('m'=>'evaluate','c'=>'exampaper','titleid'=>'`$item.id`','gid'=>'`$item.keyid`'),$_smarty_tpl);?>
" target="_blank"> 
					  <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" width="245" height="136" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_logo'];?>
',2);"/></a></div>
					<div class="cp_fit_youb fl">
					<div class="cp_youb_tit"><a href="<?php echo smarty_function_url(array('m'=>'evaluate','c'=>'exampaper','titleid'=>'`$item.id`','gid'=>'`$item.keyid`'),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></div>
					<div class="cp_youb_nr c5"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</div>
					<div class="cp_youb_sl"><em class="fl c9"><?php echo $_smarty_tpl->tpl_vars['item']->value['visits'];?>
人测试过</em> <a href="<?php echo smarty_function_url(array('m'=>'evaluate','c'=>'exampaper','titleid'=>'`$item.id`','gid'=>'`$item.keyid`'),$_smarty_tpl);?>
" class="fr" target="_blank">[点击进入测评]</a></div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="cp_jz_more">
				<a class="cp_jz_more_g" href="<?php echo smarty_function_url(array('m'=>'evaluate','c'=>'morelist'),$_smarty_tpl);?>
">更多</a>
			</div>
			<?php }?>
			<div class="clear"></div> 
		</div>  
	</div>
</div> 
<div class="cp_content_right fr">
<div class="cp_right_bao">
	<div class="cp_bao_recom">
        <div class="cp_recom_tit">测评推荐</div>
        <div class="cp_recom_list">
            <ul>
              <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['evaluateRecommend']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
              <li><a href="<?php echo smarty_function_url(array('m'=>'evaluate','c'=>'exampaper','titleid'=>'`$item.id`','gid'=>'`$item.keyid`'),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a> <span class="cp_recom_list_s"><?php echo $_smarty_tpl->tpl_vars['item']->value['visits'];?>
</span></li>
              <?php } ?>
            </ul>
        </div>
    </div>
    
    <div class="cp_bao_join">
        <div class="cp_recom_tit">他们也参加了测评</div>
        <div class="cp_join_list">
            <ul>
            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['examinee']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
            <li><a href="<?php echo smarty_function_url(array('m'=>'ask','c'=>'friend','a'=>'myquestion','uid'=>$_smarty_tpl->tpl_vars['list']->value['uid']),$_smarty_tpl);?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['pic'];?>
" width="48"  height="48" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_friend_icon'];?>
',2);"/></a><div style="width:42px; height:20px; text-align:center; margin-top:5px; overflow:hidden; text-overflow:clip; white-space:nowrap;"><?php echo $_smarty_tpl->tpl_vars['list']->value['nickname'];?>
</div></li>
            <?php } ?>
            </ul>
        </div>
    </div>


</div>
</div> 
</div>
<div class="clear"></div>


<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/lazyload.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/evaluate.js"><?php echo '</script'; ?>
>
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
DD_belatedPNG.fix('.png,.cp_top_arr');
<?php echo '</script'; ?>
>
<![endif]--> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
