<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-25 13:32:12
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/hr/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:7121996135b307e5cea88a4-26570937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71351243b04ae46902333c4f818e9133a37b1bfd' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/hr/index.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7121996135b307e5cea88a4-26570937',
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
    'list' => 0,
    'pagenav' => 0,
    'key' => 0,
    'down' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b307e5d093e55_89789735',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b307e5d093e55_89789735')) {function content_5b307e5d093e55_89789735($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
?><?php global $db,$db_config,$config;eval('$paramer=array("item"=>"\'list\'","limit"=>"20","ispage"=>"1","nocache"=>"")
;');$list=array();
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where = "1";
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}else{
			$limit=" LIMIT 10";
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"toolbox_class",$where,$Purl,'','0',$_smarty_tpl);
		}
		$list=$db->select_all("toolbox_class",$where.$limit); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/news.css" type="text/css"/>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="yun_body">
<div class="yun_content">
<div class="current_Location" style="padding:15px 0px 5px 0;"><div class="fl">您当前的位置：<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
">首页</a> > <a href="<?php echo smarty_function_url(array('m'=>'hr'),$_smarty_tpl);?>
">工具箱</a></div></div>
<div class="clear"></div>
<div class="Toolbox_left">
<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
$list = $list; if (!is_array($list) && !is_object($list)) { settype($list, 'array');}
foreach ($list as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
<div class="Toolbox_list">
<div class="Toolbox_list_img"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['list']->value['pic'];?>
" width="72" height="72"></div>
<div class="Toolbox_list_cont">
<div class="Toolbox_list_h1"><a href="<?php echo smarty_function_url(array('m'=>'hr','c'=>'list','id'=>'`$list.id`'),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</a></div>
<div class="Toolbox_list_p"><?php echo $_smarty_tpl->tpl_vars['list']->value['content'];?>
<a href="<?php echo smarty_function_url(array('m'=>'hr','c'=>'list','id'=>'`$list.id`'),$_smarty_tpl);?>
" class="Toolbox_list_more">更多>></a></div>
</div>

</div>
<?php } ?>
<div class="clear"></div>
<div class="pages"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
</div>
<div class="Toolbox_right">
<div class="Toolbox_right_box">
<div class="Toolbox_search">
<form action="<?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_hrdir']) {?>index.php<?php } else {
echo smarty_function_url(array('m'=>'hr'),$_smarty_tpl);
}?>" method="get" onsubmit="return checkkey();"> 
<?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_hrdir']) {?><input type="hidden" value="hr" name="m" /><?php }?>
<input type="hidden" name="c" value="list" />
<input type="text" name="keyword" value="请输入资料名称" class="Toolbox_search_text" onblur="if(this.value==''){this.value='请输入关键字'}" onclick="if(this.value=='请输入关键字'){this.value=''}" />
<input type="submit" value="搜索" class="Toolbox_search_sub"/>
</form>
</div>
<div class="Toolbox_Ranking_box">
<div class="Toolbox_Ranking_h1">下载排行</div>
<ul class="Toolbox_Ranking_list">
<?php  $_smarty_tpl->tpl_vars['down'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['down']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
global $db,$db_config,$config;eval('$paramer=array("item"=>"\'down\'","order"=>"\'downnum\'","key"=>"\'key\'","limit"=>"10","nocache"=>"")
;');$List=array();
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
		$where = "`is_show`='1'";
		global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		if($paramer['id']){
			$where.=" and `cid`='".$paramer['id']."'";
		}
		if($paramer['keyword']){
			$where.=" AND `name` LIKE '%".$paramer['keyword']."%'";
		}
		
		if($paramer['limit']){
			$limit=" LIMIT ".$paramer['limit'];
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"toolbox_doc",$where,$Purl,'','0',$_smarty_tpl);
		}
		if($paramer[order]){
			$where.="  ORDER BY `".$paramer['order']."`";
		}else{
			$where.="  ORDER BY `id`";
		}
		if($paramer['sort']){
			$where.=" ".$paramer['sort'];
		}else{
			$where.=" DESC";
		}
		$List=$db->select_all("toolbox_doc",$where.$limit);$List = $List; if (!is_array($List) && !is_object($List)) { settype($List, 'array');}
foreach ($List as $_smarty_tpl->tpl_vars['down']->key => $_smarty_tpl->tpl_vars['down']->value) {
$_smarty_tpl->tpl_vars['down']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['down']->key;
?>
<li><span class="Ranking_no <?php if ($_smarty_tpl->tpl_vars['key']->value<3) {?>Ranking_no_mc<?php }?>"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span>
<em class="Ranking_name"><a href="javascript:downhr('<?php echo $_smarty_tpl->tpl_vars['down']->value['id'];?>
');" class=""><?php echo $_smarty_tpl->tpl_vars['down']->value['name'];?>
</a></em><em class="Ranking_cs"><?php echo $_smarty_tpl->tpl_vars['down']->value['downnum'];?>
</em></li>
<?php } ?>
       <?php if (!$_smarty_tpl->tpl_vars['down']->value) {?>
	   暂无下载
	   <?php }?>
</ul>
</div></div>

<div class="Toolbox_Ranking_box">
<div class="Toolbox_Ranking_h1">最新上传</div>
<ul class="Toolbox_Ranking_list Toolbox_Ranking_list_new">
<?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news']->_loop = false;
global $db,$db_config,$config;eval('$paramer=array("item"=>"\'news\'","limit"=>"10","nocache"=>"")
;');$List=array();
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
		$where = "`is_show`='1'";
		global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		if($paramer['id']){
			$where.=" and `cid`='".$paramer['id']."'";
		}
		if($paramer['keyword']){
			$where.=" AND `name` LIKE '%".$paramer['keyword']."%'";
		}
		
		if($paramer['limit']){
			$limit=" LIMIT ".$paramer['limit'];
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"toolbox_doc",$where,$Purl,'','0',$_smarty_tpl);
		}
		if($paramer[order]){
			$where.="  ORDER BY `".$paramer['order']."`";
		}else{
			$where.="  ORDER BY `id`";
		}
		if($paramer['sort']){
			$where.=" ".$paramer['sort'];
		}else{
			$where.=" DESC";
		}
		$List=$db->select_all("toolbox_doc",$where.$limit);$List = $List; if (!is_array($List) && !is_object($List)) { settype($List, 'array');}
foreach ($List as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
?>
<li><span class="Toolbox_down_span" ><a href="javascript:downhr('<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
');"><?php echo $_smarty_tpl->tpl_vars['news']->value['name'];?>
</a></span></li>
<?php } ?>
       <?php if (!$_smarty_tpl->tpl_vars['news']->value) {?>
	   暂无上传文件
	   <?php }?>
</ul>
</div>
</div>
</div>
</div>
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
/js/public.js" language="javascript"><?php echo '</script'; ?>
>
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
DD_belatedPNG.fix('.png');
<?php echo '</script'; ?>
>
<![endif]--> 
<?php echo '<script'; ?>
>
function downhr(id){
	$.post("<?php echo smarty_function_url(array('m'=>'hr','c'=>'ajax'),$_smarty_tpl);?>
",{id:id},function(data){
		window.location.href=data;
	})
}
function checkkey(){
	var keyword=$("input[name=key]").val();
	if(keyword=="" || keyword=="请输入关键字"){
		layer.msg('请输入关键字！', 2, 8);return false;
	}
}
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
