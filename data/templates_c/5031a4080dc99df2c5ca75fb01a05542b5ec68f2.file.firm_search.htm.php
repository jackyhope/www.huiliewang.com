<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-09 10:36:40
         compiled from "/home/wwwroot/www.huiliewang.com//app/template/default/public_search/firm_search.htm" */ ?>
<?php /*%%SmartyHeaderCode:3498021605bbc14389267d8-92894291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5031a4080dc99df2c5ca75fb01a05542b5ec68f2' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com//app/template/default/public_search/firm_search.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3498021605bbc14389267d8-92894291',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'city_name' => 0,
    'getinfo' => 0,
    'industry_index' => 0,
    'v' => 0,
    'industry_name' => 0,
    'comdata' => 0,
    'comclass_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbc1438a5e365_10706795',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbc1438a5e365_10706795')) {function content_5bbc1438a5e365_10706795($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_function_listurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.listurl.php';
if (!is_callable('smarty_function_searchurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.searchurl.php';
?><div class="fiem_seach_chlose">
<div class="firm_search_box">
	<form method="get" name="myform" onsubmit="return search_keyword(this,'请输入关键字');" action="<?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_companydir']) {?>index.php<?php } else {
echo smarty_function_url(array('m'=>'company'),$_smarty_tpl);
}?>"> 
		<span class="firm_search_text_city">  
		<input class="firm_search_text_city_but" type="button" id="city" placeholder='请选择城市' value="<?php if ($_GET['cityid']) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];
} else { ?>请选择城市<?php }?>" onclick="index_city(1, '#city', '#cityid', null, null, null, 3);" /></span>
		<?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_companydir']) {?>
       		<input type="hidden" value="company" name="m" />
		<?php }?>
		<?php if ($_GET['rec']=='1') {?>
			<input type="hidden" value="1" name="rec" />
		<?php }?>
		<input class="firm_search_text" id="ipt" type="text" placeholder='请输入关键字' value="<?php if ($_smarty_tpl->tpl_vars['getinfo']->value['keyword']!=" =") {
echo $_smarty_tpl->tpl_vars['getinfo']->value['keyword'];
} else { ?>请输入关键字<?php }?>" name="keyword" onclick="if(this.value=='请输入关键字'){this.value=''}" onblur="if(this.value==''){this.value='请输入关键字'}" />
		<input type="hidden" name="cityid" id="cityid" />
		<input class="firm_search_submit yun_bg_color" type="submit" value="搜索 " />
	</form>
</div>
<div class="fiem_seach_chlose_list"><div class="fiem_seach_chlosename">行业：</div>
	<div class="fiem_seach_chlose_list_r">
		<a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'hy','v'=>0),$_smarty_tpl);?>
" class="fiem_seach_chlose_list_a <?php if ($_GET['hy']=='') {?>fiem_seach_chlose_list_cur<?php }?>">全部</a>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'hy','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="fiem_seach_chlose_list_a <?php if ($_GET['hy']==$_smarty_tpl->tpl_vars['v']->value) {?>fiem_seach_chlose_list_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
		<?php } ?>
	</div>
</div>
<div class="fiem_seach_chlose_list"><div class="fiem_seach_chlosename">性质：</div>
	<div class="fiem_seach_chlose_list_r">
		<a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'pr','v'=>0),$_smarty_tpl);?>
" class="fiem_seach_chlose_list_a <?php if ($_GET['pr']=='') {?>fiem_seach_chlose_list_cur<?php }?>">全部</a>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_pr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
		<a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'pr','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="fiem_seach_chlose_list_a <?php if ($_GET['pr']==$_smarty_tpl->tpl_vars['v']->value) {?>fiem_seach_chlose_list_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
		<?php } ?>
	</div>
</div>
<div class="fiem_seach_chlose_list"><div class="fiem_seach_chlosename">规模：</div>
	<div class="fiem_seach_chlose_list_r">
		<a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'mun','v'=>0),$_smarty_tpl);?>
" class="fiem_seach_chlose_list_a <?php if ($_GET['mun']=='') {?>fiem_seach_chlose_list_cur<?php }?>">全部</a>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_mun']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
		<a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'mun','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="fiem_seach_chlose_list_a <?php if ($_GET['mun']==$_smarty_tpl->tpl_vars['v']->value) {?>fiem_seach_chlose_list_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
		<?php } ?>
	</div>
</div>
<?php if ($_GET['provinceid']||$_GET['cityid']||$_GET['three_cityid']||$_GET['hy']||$_GET['pr']||$_GET['mun']||$_GET['keyword']) {?>
<div class="Search_close_box">
	<div>
		<div class="Search_clear"> <a href="<?php echo smarty_function_url(array('m'=>'company'),$_smarty_tpl);?>
"> 清除所选</a></div>
		<span class="Search_close_box_s">已选条件：</span>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['config']->value['cityid']==''&&$_smarty_tpl->tpl_vars['config']->value['three_cityid']=='') {?> 
	<?php if ($_GET['provinceid']) {?><a href="<?php echo smarty_function_listurl(array('m'=>'company','untype'=>'provinceid'),$_smarty_tpl);?>
'{/yun}" class="Search_jobs_c_a disc_fac">工作地点：<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']];?>
</a> <?php }?> 
	<?php if ($_GET['cityid']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'company','untype'=>'cityid'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];?>
</a> <?php }?> 
	<?php }?>
	<?php if ($_GET['three_cityid']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'company','untype'=>'three_cityid'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['three_cityid']];?>
</a> <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']]) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'company','untype'=>'hy'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">行业：<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];?>
</a> <?php }?>
	<?php if ($_GET['pr']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'company','untype'=>'pr'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">性质：<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['pr']];?>
</a> <?php }?>
	<?php if ($_GET['mun']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'company','untype'=>'mun'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">规模：<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['mun']];?>
</a> <?php }?>
	<?php if ($_GET['keyword']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'company','untype'=>'keyword'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_GET['keyword'];?>
</a> <?php }?>
	
</div>
<?php }?>
</div>









<!--职位类别start-->
<!--<div class="sPopupDiv none" id="jobdiv" style="float:left;"></div>-->
<!--职位类别end-->
<!--工作地点start-->
<!--<div class="sPopupDiv none" id="citydiv"></div>
--><!--工作地点end-->
<!--行业类别start-->
<!--<div class="sPopupDiv none" id="industrydiv"></div>-->
<!--行业类别end--> 
<!--<div class="content_firm">
    <div class="firm_left">
        <div class="firm_left_close">            
            <?php if ($_GET['hy']||$_GET['pr']||$_GET['mun']||$_GET['keyword']||$_GET['cityid']) {?>
            <div class="firm_left_close_con">
                <div class="firm_left_h1"><span>已选择</span> <a href="<?php echo smarty_function_url(array('m'=>'company'),$_smarty_tpl);?>
">清空条件</a></div>
                <div class="clear"></div>
				<?php if ($_GET['cityid']) {?>
                <span class="firm_left_close_span yun_bg_color"><i>所在城市：<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];?>
</i><a href="<?php echo smarty_function_searchurl(array('m'=>'company','untype'=>'cityid'),$_smarty_tpl);?>
"><em></em></a></span>
                <?php }?>
                <?php if ($_GET['hy']) {?>
                <span class="firm_left_close_span yun_bg_color"><i>从事行业：<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];?>
</i><a href="<?php echo smarty_function_searchurl(array('m'=>'company','untype'=>'hy,page'),$_smarty_tpl);?>
"><em></em></a></span>
                <?php }?>
                <?php if ($_GET['pr']) {?>
                <span class="firm_left_close_span yun_bg_color"><i>企业性质：<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['pr']];?>
</i><a href="<?php echo smarty_function_searchurl(array('m'=>'company','untype'=>'pr,page'),$_smarty_tpl);?>
"><em></em></a></span>
                <?php }?>
                <?php if ($_GET['mun']) {?>
                <span class="firm_left_close_span yun_bg_color"><i>企业规模：<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['mun']];?>
</i><a href="<?php echo smarty_function_searchurl(array('m'=>'company','untype'=>'mun,page'),$_smarty_tpl);?>
"><em></em></a></span>
                <?php }?>
                <?php if ($_GET['keyword']) {?>
                <span class="firm_left_close_span yun_bg_color"><i>关键字：<?php echo $_GET['keyword'];?>
</i><a href="<?php echo smarty_function_searchurl(array('m'=>'company','untype'=>'keyword,page'),$_smarty_tpl);?>
"><em></em></a></span>
                <?php }?>
            </div>
            <?php }?>
        </div>
        <div class="firm_left_cont">
            <div class="firm_seach_top_list">
                <div class="<?php if ($_GET['hy']) {?>firm_seach_top_s<?php } else { ?>firm_seach_top_l<?php }?>" id="job_hys_click" onclick="check_type('job_hys');">从事行业</div>
                <div class="firm_seach_top_r <?php if ($_GET['hy']) {?>none<?php }?>" id="job_hys">
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'hy','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" <?php if ($_GET['hy']==$_smarty_tpl->tpl_vars['v']->value) {?> class="firm_a_atc" <?php }?>><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
                <?php } ?>
            </div>
        </div>
        <div class="firm_seach_top_list">
            <div class="<?php if ($_GET['pr']) {?>firm_seach_top_s<?php } else { ?>firm_seach_top_l<?php }?>" id="job_prs_click" onclick="check_type('job_prs');">企业性质</div>
            <div class="firm_seach_top_r <?php if ($_GET['pr']) {?>none<?php }?>" id="job_prs">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_pr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'pr','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" <?php if ($_GET['pr']==$_smarty_tpl->tpl_vars['v']->value) {?> class="firm_a_atc" <?php }?>><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
            <?php } ?>
        </div>
    </div>
    <div class="firm_seach_top_list">
        <div class="<?php if ($_GET['mun']) {?>firm_seach_top_s<?php } else { ?>firm_seach_top_l<?php }?>" id="job_muns_click" onclick="check_type('job_muns');">企业规模</div>
        <div class="firm_seach_top_r <?php if ($_GET['mun']) {?>none<?php }?>" id="job_muns">
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_mun']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'mun','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" <?php if ($_GET['mun']==$_smarty_tpl->tpl_vars['v']->value) {?> class="firm_a_atc" <?php }?>><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
        <?php } ?>
    </div>
</div>
  </div>
</div>-->
<?php echo '<script'; ?>
>
function check_type(id){
	var display =$("#"+id).css('display');
	if(display=='none'){
		$("#"+id).show();
		$("#"+id+"_click").attr("class","firm_seach_top_l");
	}else{
		$("#"+id).hide();
		$("#"+id+"_click").attr("class","firm_seach_top_s");
	}
	
	/*
	$("#"+id).toggle();  
	var style=$("#"+id+"_click").attr("class");
	if(style=="firm_seach_top_l"){
		$("#"+id+"_click").attr("class","firm_seach_top_s");
	}else{
		$("#"+id+"_click").attr("class","firm_seach_top_l");
	}*/
}
<?php echo '</script'; ?>
><?php }} ?>
