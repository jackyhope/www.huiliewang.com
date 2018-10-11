<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:45
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_collection_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:16589784505afd45719b87b8-58696736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a12dd89376890e5d8a65511072acc8dd1f7b7cd7' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_collection_list.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16589784505afd45719b87b8-58696736',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'locoyinfo' => 0,
    'industry_index' => 0,
    'v' => 0,
    'industry_name' => 0,
    'job_name' => 0,
    'job_index' => 0,
    'job_type' => 0,
    'va' => 0,
    'val' => 0,
    'city_name' => 0,
    'city_index' => 0,
    'city_type' => 0,
    'comdata' => 0,
    'comclass_name' => 0,
    'arr_data' => 0,
    'j' => 0,
    'userdata' => 0,
    'userclass_name' => 0,
    'qy_rows' => 0,
    'row' => 0,
    'partdata' => 0,
    'partclass_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd4571e0a237_52867283',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd4571e0a237_52867283')) {function content_5afd4571e0a237_52867283($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/member_public.js"></SCRIPT>
<?php echo '<script'; ?>
 src="js/admin_public.js" language="javascript"><?php echo '</script'; ?>
>
<link href="images/blue.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="js/icheck.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
	$(document).ready(function(){
	  $('input').iCheck({
		checkboxClass: 'icheckbox_flat-blue',
		radioClass: 'iradio_flat-blue'
	  });
	});
<?php echo '</script'; ?>
>
<title>后台管理</title>
<style>
* {
	margin: 0;
	padding: 0;
}
body, div {
	margin: 0;
	padding: 0;
}
</style>
</head>
<?php echo '<script'; ?>
>var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"; <?php echo '</script'; ?>
>
<body class="body_ifm">
<div class="infoboxp" style="position:relative;">
  <div class="admin_Prompt" style="margin-top:5px;">
    <div class="admin_Prompt_span"> <b>提示：</b>采集前务必设置自己的接口密码，以免被其他人利用。<br>
      <b>注意：</b>这里所设置的参数，只作为没有值的情况下使用，若采集软件有值传输，会优先使用传输值。 </div>
    <div class="admin_Prompt_close" style="top:18px; right:18px;"></div>
  </div>
  <div id="subboxdiv" style="width:100%;height:100%;display:none;position:absolute; z-index:10000"></div>
  <div class="main_tag" >
    <div class="admin_h1_bg"> <span class="infoboxp_top_span infoboxp_top_wz">采集设置</span>
      <ul>
        <li class="on">采集设置</li>
        <li>新闻设置</li>
        <li>职位设置</li>
        <li>公司设置</li>
        <li>个人设置</li>
        <li>简历设置</li>
        <li>帐号设置</li>
        <li>兼职设置</li>
      </ul>
    </div>
    <div class="clear"></div>
    <div class="tag_box">
      <div>
        <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
        <form action="index.php?m=collection&c=save" method="post" enctype= "multipart/form-data" target="supportiframe">
          <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
          <table width="99%" class="table_form">
            <tr class="admin_table_trbg">
              <th width="160" bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
              <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
            </tr>
            <tr>
              <th width="160">采集状态：</th>
              <td>
              <div class="iradio_flat_height">
              <input type="radio" name="locoy_online" value="1" id="online_1" <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_online']=="1") {?>checked<?php }?>>
                <span class="iradio_flat_left"><label for="online_1">开启</label>&nbsp;&nbsp;</span>
                <input type="radio" name="locoy_online" value="2" id="online_2" <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_online']=="2") {?>checked<?php }?>>
                <span class="iradio_flat_left"><label for="online_2">关闭</label>&nbsp;&nbsp;</span>
                </div>
                </td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">接口密码：</th>
              <td><input type="text" class="input-text" name="locoy_key" id='locoy_key' value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_key'];?>
">
                <span class="admin_web_tip">如：123qwe123</span></td>
            </tr>
            <tr>
              <th width="160">匹配精准度：</th>
              <td><input type="text" class="input-text" name="locoy_rate" id='locoy_rate' value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_rate'];?>
">
                <span class="admin_web_tip">如：60</span></td>
            </tr>
            <tr class="admin_table_trbg">
              <td colspan="2" align="center"><input class="admin_submit4" id="config" type="submit" name="config" value="提交">
                &nbsp;&nbsp;
                <input class="admin_submit4" type="reset" value="重置"/></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="hiddendiv">
        <form action="index.php?m=collection&c=save" method="post" target="supportiframe">
          <table width="100%" class="table_form">
            <tr class="admin_table_trbg">
              <th width="160" bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
              <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
            </tr>
            <tr>
              <th width="160">自动提动关键字：</th>
              <td>
                <div class="iradio_flat_height">
                <input type="radio" name="locoy_keyword" value="1" id="key_1" <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_keyword']=="1") {?>checked<?php }?>>
                <span class="iradio_flat_left"><label for="key_1">是</label>&nbsp;&nbsp;</span>
                <input type="radio" name="locoy_keyword" value="2" id="key_2" <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_keyword']=="2") {?>checked<?php }?>>
                <span class="iradio_flat_left"><label for="key_2">否</label>&nbsp;&nbsp;</span>
                <span class="admin_web_tip" style="line-height:21px;">注：只有在没有参数传输的才起作用</span>
                </div>
                </td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">浏览数随机范围：</th>
              <td><input type="text" class="input-text tips_class" id='locoy_rand' name="locoy_rand"  value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_rand'];?>
">
                <span class="admin_web_tip">如：0-100，默认为0</span></td>
            </tr>
            <tr>
              <th width="160">排序随机范围：</th>
              <td><input type="text" class="input-text tips_class" name="locoy_sort" id='locoy_sort' value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_sort'];?>
">
                <span class="admin_web_tip">如：0-100，默认为0</span></td>
            </tr>
            <tr class="admin_table_trbg">
              <td colspan="2" align="center"><input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
                <input class="admin_submit4" id="otherconfig" type="submit" name="otherconfig" value="提交" />
                &nbsp;&nbsp;
                <input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="hiddendiv">
        <form action="index.php?m=collection&c=save" method="post" target="supportiframe">
          <table width="100%" class="table_form">
            <tr class="admin_table_trbg">
              <th width="160" bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
              <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
            </tr>
            <tr>
              <th width="160">职位状态：</th>
              <td>
                <div class="iradio_flat_height">
                <input type="radio" name="locoy_job_status" value="1" id="key_1" <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_status']=="1") {?>checked<?php }?>>
                <span class="iradio_flat_left"><label for="key_1">已通过</label>&nbsp;&nbsp;</span>
                <input type="radio" name="locoy_job_status" value="0" id="key_2" <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_status']!="1") {?>checked<?php }?>>
                <span class="iradio_flat_left"><label for="key_2">未审核</label>&nbsp;&nbsp;</span>
                </div>
                </td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">职位有效期：</th>
              <td>开始：
                <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/css/font-awesome.min.css" type="text/css">
                <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/foundation-datepicker.min.js"><?php echo '</script'; ?>
>
                <input id="ad_start" class="input-text" type="text" readonly size="20" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_sdate'];?>
" name="locoy_job_sdate">
                结束：
                <input id="ad_end" class="input-text" type="text" readonly size="20" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_edate'];?>
" name="locoy_job_edate">
                <?php echo '<script'; ?>
 type="text/javascript"> 
		var checkin = $('#ad_start').fdatepicker({
			format: 'yyyy-mm-dd',startView:4,minView:2 
		}).on('changeDate', function (ev) {
			if (ev.date.valueOf() > checkout.date.valueOf()) {
				var newDate = new Date(ev.date)
				newDate.setDate(newDate.getDate() + 1);
				checkout.update(newDate);
			}
			checkin.hide();
			$('#ad_end')[0].focus();
		}).data('datepicker');
		var checkout = $('#ad_end').fdatepicker({
			format: 'yyyy-mm-dd',startView:4,minView:2,
			onRender: function (date) {
				return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function (ev) {
			checkout.hide();
		}).data('datepicker');    
        <?php echo '</script'; ?>
></td>
            </tr>
            <tr>
              <th width="160">从事行业无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index17"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_hy']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_hy']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="job_hy_name" onClick="select_click('job_hy');">
                  <input name="locoy_job_hy" type="hidden" id="job_hy_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">
               
                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="job_hy_name" onClick="select_click('job_hy');">
                  <input name="locoy_job_hy" type="hidden" id="job_hy_val" value="">
                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="job_hy_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('job_hy','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">职位类别无法匹配为：</th>
              <td>
                <div class="yun_admin_select_box yun_admin_select_boxw250 z_index16">
            <input type="button" id="locoy_job_job1" onclick="search_show('job_locoy_job_job1');" value="<?php if ($_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_job1']]) {
echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_job1']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="locoy_job_job1id" name="locoy_job_job1" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_job1'];?>
" />
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw250 dn" style="display:none" id="job_locoy_job_job1"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','locoy_job_job1','<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','locoy_job1_son','job');"> <?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></div>
              <?php } ?> </div>
          </div>
          <div class="yun_admin_select_box yun_admin_select_boxw250 z_index16">
            <input type="button" id="locoy_job1_son" onclick="search_show('job_locoy_job1_son');" value="<?php if ($_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job1_son']]) {
echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job1_son']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="locoy_job1_sonid" name="locoy_job1_son" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job1_son'];?>
" />
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw250 dn" style="display:none" id="job_locoy_job1_son"> <?php  $_smarty_tpl->tpl_vars['va'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['va']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_job1']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['va']->key => $_smarty_tpl->tpl_vars['va']->value) {
$_smarty_tpl->tpl_vars['va']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['va']->key;
?>
              <div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['va']->value;?>
','locoy_job1_son','<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['va']->value];?>
','job_post','job');"> <?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['va']->value];?>
</a></div>
              <?php } ?> </div>
          </div>
          <div class="yun_admin_select_box yun_admin_select_boxw250 z_index16">
            <input type="button" id="job_post" onclick="three_city_show('job_job_post');" value="<?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_post']) {
echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_post']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="job_postid" name="locoy_job_post" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_post'];?>
" />
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw250 dn" style="display:none" id="job_job_post"> <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job1_son']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
              <div class="yun_admin_select_box_list"><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
','job_post','<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['val']->value];?>
');"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['val']->value];?>
</a></div>
              <?php } ?> </div>
          </div>
                </td>
            </tr>
            <tr>
              <th width="160">地区无法匹配为：</th>
              <td>
              <div class="yun_admin_select_box yun_admin_select_boxw130 z_index15">
            <input type="button" id="locoy_job_province" onclick="search_show('job_locoy_job_province');" value="<?php if ($_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_province']]) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_province']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="locoy_job_provinceid" name="locoy_job_province" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_province'];?>
" />
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw130 dn" style="display:none" id="job_locoy_job_province"> 
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','locoy_job_province','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','locoy_job_city','city');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></div>
              <?php } ?> </div>
          </div>
          <div class="yun_admin_select_box yun_admin_select_boxw130 z_index15">
            <input type="button" id="locoy_job_city" onclick="search_show('job_locoy_job_city');" value="<?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_city']) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_city']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="locoy_job_cityid" name="locoy_job_city" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_city'];?>
"/>
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw130 dn" style="display:none" id="job_locoy_job_city">
              <div class="yun_admin_select_box_list">
			  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_province']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','locoy_job_city','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','locoy_job_three','city');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> 
			  <?php } ?></div>
            </div>
          </div>
          <div class="yun_admin_select_box yun_admin_select_boxw130 z_index15 <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_three']<1) {?>dn<?php }?>" id="cityshowth">
            <input type="button" id="three_city" onclick="three_city_show('job_three_city');" value="<?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_three']) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_three']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="three_cityid" name="locoy_job_three" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_three'];?>
" />
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw130 dn" style="display:none" id="job_three_city">
              <div class="yun_admin_select_box_list"> 
			  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_city']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','three_city','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> 
			  <?php } ?> </div>
            </div>
          </div>
              
             
                </td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">招聘人数无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index14"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_number']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_number']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="job_number_name" onClick="select_click('job_number');">
                  <input name="locoy_com_number" type="hidden" id="job_number_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">

                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="job_number_name" onClick="select_click('job_number');">
                  <input name="locoy_com_number" type="hidden" id="job_number_val" value="">

                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="job_number_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('job_number','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr>
              <th width="160">薪水待遇无法匹配为：</th>
              <td>
              	<input type="text" class="input-text tips_class" id='locoy_minsalary' name="locoy_minsalary"  value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_minsalary'];?>
">
              	<span> - </span>
              	<input type="text" class="input-text tips_class" id='locoy_maxsalary' name="locoy_maxsalary"  value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_maxsalary'];?>
">
              </td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">工作经验无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index12"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_exp']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_exp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_exp']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="job_exp_name" onClick="select_click('job_exp');">
                  <input name="locoy_job_exp" type="hidden" id="job_exp_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">

                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="job_exp_name" onClick="select_click('job_exp');">
                  <input name="locoy_job_exp" type="hidden" id="job_exp_val" value="">

                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="job_exp_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_exp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('job_exp','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr>
              <th width="160">到岗时间无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index11"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_report']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_report']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="job_report_name" onClick="select_click('job_report');">
                  <input name="locoy_job_report" type="hidden" id="job_report_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">

                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="job_report_name" onClick="select_click('job_report');">
                  <input name="locoy_job_report" type="hidden" id="job_report_val" value="">

                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="job_report_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('job_report','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">年龄要求无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index10"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_age']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_age']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_age']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="job_age_name" onClick="select_click('job_age');">
                  <input name="locoy_job_age" type="hidden" id="job_age_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">

                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="job_age_name" onClick="select_click('job_age');">
                  <input name="locoy_job_age" type="hidden" id="job_age_val" value="">

                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="job_age_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_age']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('job_age','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
           
            <tr class="admin_table_trbg">
              <th width="160">性别无法匹配为：</th>
              <td>
                <div class="yun_admin_select_box z_index8">   
              <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_sexs']) {?>
    			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_data']->value['sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['j']->value==$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_sexs']) {?>
                    <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" class="yun_admin_select_box_text" id="job_sex_name" onClick="select_click('job_sex');">
                    <input name="locoy_job_sexs" type="hidden" id="job_sex_val" value="<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
">
                    <?php }?>
                <?php } ?>
            <?php } else { ?>
                <input type="button" value="请选择" class="yun_admin_select_box_text" id="job_sex_name" onClick="select_click('job_sex');">
                <input name="locoy_job_sexs" type="hidden" id="job_sex_val" value="">
          
            <?php }?>            
            <div class="yun_admin_select_box_list_box dn" id="job_sex_select"> 
              <div class="yun_admin_select_box_list"> 
              <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_data']->value['sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <a href="javascript:;" onClick="select_new('job_sex','<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a>              
              <?php } ?>              
               </div>
               </div>
          </div> 
                </td>
            </tr>
            <tr>
              <th width="160">教育程度无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index7"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_edu']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_edu']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="job_edu_name" onClick="select_click('job_edu');">
                  <input name="locoy_job_edu" type="hidden" id="job_edu_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">

                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="job_edu_name" onClick="select_click('job_edu');">
                  <input name="locoy_job_edu" type="hidden" id="job_edu_val" value="">

                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="job_edu_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('job_edu','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">婚姻状况无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index6"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_marriage']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_marriage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_marriage']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="job_marriage_name" onClick="select_click('job_marriage');">
                  <input name="locoy_job_marriage" type="hidden" id="job_marriage_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">

                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="job_marriage_name" onClick="select_click('job_marriage');">
                  <input name="locoy_job_marriage" type="hidden" id="job_marriage_val" value="">

                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="job_marriage_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_marriage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('job_marriage','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
                <input class="admin_submit4" id="codeconfig" type="submit" name="codeconfig" value="提交" />
                &nbsp;&nbsp;
                <input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="hiddendiv">
        <form action="index.php?m=collection&c=save" method="post" enctype= "multipart/form-data" target="supportiframe">
          <table width="100%" class="table_form">
            <tr class="admin_table_trbg">
              <th width="160" bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
              <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
            </tr>
            <tr>
              <th width="160">从事行业无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index17"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_hy']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_hy']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="com_hy_name" onClick="select_click('com_hy');">
                  <input name="locoy_com_hy" type="hidden" id="com_hy_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">

                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="com_hy_name" onClick="select_click('com_hy');">
                  <input name="locoy_com_hy" type="hidden" id="com_hy_val" value="">

                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="com_hy_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('com_hy','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">企业性质无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index16"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_pr']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_pr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_pr']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="job_pr_name" onClick="select_click('job_pr');">
                  <input name="locoy_job_pr" type="hidden" id="job_pr_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">

                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="job_pr_name" onClick="select_click('job_pr');">
                  <input name="locoy_job_pr" type="hidden" id="job_pr_val" value="">

                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="job_pr_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_pr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('job_pr','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr>
              <th width="160">企业地址无法匹配为：</th>
              <td>
                 <div class="yun_admin_select_box yun_admin_select_boxw130 z_index11">
				<input type="button" id="locoy_com_province" onclick="search_show('job_locoy_com_province');" value="<?php if ($_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_province']]) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_province']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
				<input type="hidden" id="locoy_com_provinceid" name="locoy_com_province" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_province'];?>
" />
				<div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw130 dn" style="display:none" id="job_locoy_com_province"> 
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				  <div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','locoy_com_province','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','locoy_com_city','city');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></div>
				  <?php } ?> </div>
			  </div>
			  <div class="yun_admin_select_box yun_admin_select_boxw130 z_index11">
				<input type="button" id="locoy_com_city" onclick="search_show('job_locoy_com_city');" value="<?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_city']) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_city']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
				<input type="hidden" id="locoy_com_cityid" name="locoy_com_city" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_city'];?>
"/>
				<div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw130 dn" style="display:none" id="job_locoy_com_city">
				  <div class="yun_admin_select_box_list">
				  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_province']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?> 
				  <a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','locoy_com_city','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','three_city','city');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> 
				  <?php } ?></div>
				</div>
			  </div>
                </td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">企业规模无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index10"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_mun']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_mun']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_mun']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="job_mun_name" onClick="select_click('job_mun');">
                  <input name="locoy_job_mun" type="hidden" id="job_mun_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">
                   
                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="job_mun_name" onClick="select_click('job_mun');">
                  <input name="locoy_job_mun" type="hidden" id="job_mun_val" value="">
                   
                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="job_mun_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_mun']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('job_mun','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr>
              <th width="160">注册资金无值为：</th>
              <td><input type="text" class="input-text" name="locoy_com_money"  value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_com_money'];?>
">
                万元 <span class="admin_web_tip">如：0-10000，默认为0</span></td>
            </tr>
            <tr class="admin_table_trbg">
              <td colspan="2" align="center"><input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
                <input class="admin_submit4"  type="submit" name="waterconfig" value="提交" />
                &nbsp;&nbsp;
                <input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="hiddendiv">
        <form action="index.php?m=collection&c=save" method="post" target="supportiframe">
          <table width="100%" class="table_form">
            <tr class="admin_table_trbg">
              <th width="160" bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
              <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
            </tr>
            <tr>
              <th width="160">性别无法匹配为：</th>
              <td>
              <div class="yun_admin_select_box z_index17">   
              <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_sexs']) {?>
    			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_data']->value['sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['j']->value==$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_sexs']) {?>
                    <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" class="yun_admin_select_box_text" id="user_sex_name" onClick="select_click('user_sex');">
                    <input name="locoy_user_sexs" type="hidden" id="user_sex_val" value="<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
">
                    <?php }?>
                <?php } ?>
            <?php } else { ?>
                <input type="button" value="请选择" class="yun_admin_select_box_text" id="user_sex_name" onClick="select_click('user_sex');">
                <input name="locoy_user_sexs" type="hidden" id="user_sex_val" value="">
                        
            <?php }?>            
            <div class="yun_admin_select_box_list_box dn" id="user_sex_select"> 
              <div class="yun_admin_select_box_list"> 
              <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_data']->value['sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <a href="javascript:;" onClick="select_new('user_sex','<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a>              
              <?php } ?>              
               </div>
               </div>
          </div> 
              </td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">婚姻无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index16"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_marriage']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_marriage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_marriage']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="user_marriage_name" onClick="select_click('user_marriage');">
                  <input name="locoy_user_marriage" type="hidden" id="user_marriage_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">
                   
                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="user_marriage_name" onClick="select_click('user_marriage');">
                  <input name="locoy_user_marriage" type="hidden" id="user_marriage_val" value="0">
                   
                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="user_marriage_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_marriage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('user_marriage','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr>
              <th width="160">教育程度无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index15"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_edu']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_edu']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="user_edu_name" onClick="select_click('user_edu');">
                  <input name="locoy_user_edu" type="hidden" id="user_edu_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">
                   
                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="user_edu_name" onClick="select_click('user_edu');">
                  <input name="locoy_user_edu" type="hidden" id="user_edu_val" value="0">
                   
                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="user_edu_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('user_edu','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">工作经验无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index14"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_exp']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_word']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_exp']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="user_exp_name" onClick="select_click('user_exp');">
                  <input name="locoy_user_exp" type="hidden" id="user_exp_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">
                   
                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="user_exp_name" onClick="select_click('user_exp');">
                  <input name="locoy_user_exp" type="hidden" id="user_exp_val" value="0">
                   
                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="user_exp_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_word']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('user_exp','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr>
              <th width="160">民族无法匹配为：</th>
              <td><input type="text" class="input-text" name="locoy_user_nationality" id='locoy_user_nationality' value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_nationality'];?>
">
                <span class="admin_web_tip">如：汉族</span></td>
            </tr>
            <tr class="admin_table_trbg">
              <td colspan="2" align="center"><input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
                <input class="admin_submit4" id="mapconfig" type="submit" name="userconfig" value="提交" />
                &nbsp;&nbsp;
                <input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="hiddendiv">
        <form action="index.php?m=collection&c=save" method="post" target="supportiframe">
          <table width="100%" class="table_form">
            <tr class="admin_table_trbg">
              <th width="160" bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
              <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
            </tr>
            <tr>
              <th>期望从事行业无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index17"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_hy']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_hy']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="resume_hy_name" onClick="select_click('resume_hy');">
                  <input name="locoy_resume_hy" type="hidden" id="resume_hy_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">
                   
                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="resume_hy_name" onClick="select_click('resume_hy');">
                  <input name="locoy_resume_hy" type="hidden" id="resume_hy_val" value="">
                   
                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="resume_hy_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('resume_hy','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="180">期望从事职位无法匹配为：</th>
              <td>
              
             
                
                <div class="yun_admin_select_box yun_admin_select_boxw250 z_index12">
            <input type="button" id="locoy_resume_job1" onclick="search_show('job_locoy_resume_job1');" value="<?php if ($_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_job1']]) {
echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_job1']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="locoy_resume_job1id" name="locoy_resume_job1" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_job1'];?>
" />
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw250 dn" style="display:none" id="job_locoy_resume_job1"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_citys('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','locoy_resume_job1','<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','locoy_resume_son','job');"> <?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></div>
              <?php } ?> </div>
          </div>
          <div class="yun_admin_select_box yun_admin_select_boxw250 z_index12">
            <input type="button" id="locoy_resume_son" onclick="search_show('job_locoy_resume_son');" value="<?php if ($_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_son']]) {
echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_son']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="locoy_resume_sonid" name="locoy_resume_son" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_son'];?>
" />
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw250 dn" style="display:none" id="job_locoy_resume_son"> <?php  $_smarty_tpl->tpl_vars['va'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['va']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job_job1']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['va']->key => $_smarty_tpl->tpl_vars['va']->value) {
$_smarty_tpl->tpl_vars['va']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['va']->key;
?>
              <div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_citys('<?php echo $_smarty_tpl->tpl_vars['va']->value;?>
','locoy_resume_son','<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['va']->value];?>
','job_posts','job');"> <?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['va']->value];?>
</a></div>
              <?php } ?> </div>
          </div>
          <div class="yun_admin_select_box yun_admin_select_boxw250 z_index12">
            <input type="button" id="job_posts" onclick="three_city_show('job_job_posts');" value="<?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_post']) {
echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_post']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="job_postsid" name="locoy_resume_post" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_post'];?>
" />
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw250 dn" style="display:none" id="job_job_posts"> <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_job1_son']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
              <div class="yun_admin_select_box_list"><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
','job_posts','<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['val']->value];?>
');"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['val']->value];?>
</a></div>
              <?php } ?> </div>
          </div>
                </td>
            </tr>
            <tr>
              <th width="180">期望工作地点无法匹配为：</th>
              <td>              
              
              
                <div class="yun_admin_select_box yun_admin_select_boxw130 z_index11">
            <input type="button" id="locoy_resume_province" onclick="search_show('job_locoy_resume_province');" value="<?php if ($_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_province']]) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_province']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="locoy_resume_provinceid" name="locoy_resume_province" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_province'];?>
" />
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw130 dn" style="display:none" id="job_locoy_resume_province"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <div class="yun_admin_select_box_list"><a href="javascript:;" onclick="select_citys('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','locoy_resume_province','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','locoy_resume_city','city');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></div>
              <?php } ?> </div>
          </div>
          <div class="yun_admin_select_box yun_admin_select_boxw130 z_index11">
            <input type="button" id="locoy_resume_city" onclick="search_show('job_locoy_resume_city');" value="<?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_city']) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_city']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="locoy_resume_cityid" name="locoy_resume_city" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_city'];?>
"/>
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw130 dn" style="display:none" id="job_locoy_resume_city">
              <div class="yun_admin_select_box_list"><?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_province']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="javascript:;" onclick="select_citys('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','locoy_resume_city','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','three_citys','city');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
            </div>
          </div>
          <div class="yun_admin_select_box yun_admin_select_boxw130 z_index11 <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_three']<1) {?>dn<?php }?>" id="rcityshowth">
            <input type="button" id="three_citys" onclick="three_city_show('job_three_citys');" value="<?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_three']) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_three']];
} else { ?>请选择<?php }?>" class="yun_admin_select_box_text">
            <input type="hidden" id="three_citysid" name="locoy_resume_three" value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_three'];?>
" />
            <div class="yun_admin_select_box_list_box yun_admin_select_box_list_boxw130 dn" style="display:none" id="job_three_citys">
              <div class="yun_admin_select_box_list"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_city']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','three_citys','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?> </div>
            </div>
          </div>
                
                </td>
            </tr>
            <tr class="admin_table_trbg">
              <th>期望月薪无法匹配为：</th>
              <td>
              	<input type="text" class="input-text tips_class" id='locoy_user_minsalary' name="locoy_user_minsalary"  value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_minsalary'];?>
">
              	<span> - </span>
              	<input type="text" class="input-text tips_class" id='locoy_user_maxsalary' name="locoy_user_maxsalary"  value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_maxsalary'];?>
">
              </td>
            </tr>
            <tr>
              <th>到岗时间无法匹配为：</th>
              <td><div class="yun_admin_select_box z_index9"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_report']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_report']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="user_report_name" onClick="select_click('user_report');">
                  <input name="locoy_user_report" type="hidden" id="user_report_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">
                   
                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择" class="yun_admin_select_box_text" id="user_report_name" onClick="select_click('user_report');">
                  <input name="locoy_user_report" type="hidden" id="user_report_val" value="">
                   
                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="user_report_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('user_report','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">浏览数随机范围：</th>
              <td><input type="text" class="input-text tips_class" id='locoy_resume_rand' name="locoy_resume_rand"  value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_resume_rand'];?>
">
                <span class="admin_web_tip">如：0-100，默认为0</span></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
                <input class="admin_submit4" id="mapconfig" type="submit" name="resumeconfig" value="提交" />
                &nbsp;&nbsp;
                <input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="hiddendiv">
        <form action="index.php?m=collection&c=save" method="post" target="supportiframe">
          <table width="100%" class="table_form">
            <tr class="admin_table_trbg">
              <th bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
              <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
            </tr>
            <tr>
              <th>生成用户名长度：</th>
              <td><input type="text" class="input-text" name="locoy_length" id='locoy_length' value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_length'];?>
">
                <span class="admin_web_tip">如：8</span></td>
            </tr>
            <tr class="admin_table_trbg">
              <th>生成用户名前缀：</th>
              <td><input type="text" class="input-text" name="locoy_name" id='locoy_name' value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_name'];?>
">
                <span class="admin_web_tip">如：user  加随机字符</span></td>
            </tr>
            <tr>
              <th>生成指定密码：</th>
              <td><input type="text" class="input-text"  name="locoy_pwd" id='locoy_pwd' value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_pwd'];?>
">
                <span class="admin_web_tip">如：123456</span></td>
            </tr>
            <tr class="admin_table_trbg">
              <th>用户状态：</th>
              <td>
              <div class="iradio_flat_height">
              <input type="radio" name="locoy_user_status" value="1" id="user_1" <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_status']=="1") {?>checked<?php }?>>
                <span class="iradio_flat_left"><label for="user_1">已审核</label>&nbsp;&nbsp;</span>
                <input type="radio" name="locoy_user_status" value="2" id="user_2" <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_user_status']=="2") {?>checked<?php }?>>
                <span class="iradio_flat_left"><label for="user_2">未审核</label>&nbsp;&nbsp;</span>
                </div>
                </td>
            </tr>
            <tr>
              <th>企业会员等级：</th>
              <?php if (is_array($_smarty_tpl->tpl_vars['qy_rows']->value)) {?>
              <td>
              <div class="iradio_flat_height">
                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['qy_rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                <input type="radio" name="locoy_rating" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" id="rating_<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_rating']==$_smarty_tpl->tpl_vars['row']->value['id']) {?>checked<?php }?>>
                <span class="iradio_flat_left"><label for="rating_<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</label>&nbsp;&nbsp;</span>
                <?php } ?> 
                </div>
                </td>
              <?php } else { ?>
              <td> 暂无等级，<a href="index.php?m=userconfig&c=comclass" style="color:red;">添加会员等级</a>
                <input type="hidden" name="locoy_rating" value="0"></td>
              <?php }?> </tr>
            <tr class="admin_table_trbg">
              <td colspan="2" align="center"><input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
                <input class="admin_submit4" id="mapconfig" type="submit" name="mapconfig" value="提交" />
                &nbsp;&nbsp;
                <input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
          </table>
        </form>
      </div>
      <div class="hiddendiv">
        <form action="index.php?m=collection&c=save" method="post" target="supportiframe">
          <table width="100%" class="table_form">
            <tr class="admin_table_trbg">
              <th bgcolor="#f0f6fb"><span class="admin_bold">参数说明</span></th>
              <td bgcolor="#f0f6fb"><span class="admin_bold">参数值</span></td>
            </tr>
            <tr>
              <th width="160">职位状态：</th>
              <td>
              <div class="iradio_flat_height">
                <input type="radio" name="locoy_partjob_status" value="1" id="key_1" <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_partjob_status']=="1") {?>checked<?php }?>>
                <span class="iradio_flat_left"><label for="key_1">已通过</label>&nbsp;&nbsp;</span>
                <input type="radio" name="locoy_partjob_status" value="0" id="key_2" <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_partjob_status']!="1") {?>checked<?php }?>>
                <span class="iradio_flat_left"><label for="key_2">未审核</label>&nbsp;&nbsp;</span>
                </div>
                </td>
            </tr>
            <tr>
              <th>工作类型无法匹配为：</th>
              <td><div class="yun_admin_select_box zindex100"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_part_type']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['partdata']->value['part_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_part_type']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['partclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="part_type_name" onClick="select_click('part_type');">
                  <input name="locoy_part_type" type="hidden" id="part_type_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">
                   
                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择周期" class="yun_admin_select_box_text" id="part_type_name" onClick="select_click('part_type');">
                  <input name="locoy_part_type" type="hidden" id="part_type_val" value="0">
                   
                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="part_type_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['partdata']->value['part_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('part_type','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['partclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['partclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="180">薪水无法匹配为：</th>
              <td><input type="text" class="input-text tips_class" id='locoy_part_salary' name="locoy_part_salary"  value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_part_salary'];?>
">
                元/天 <span class="admin_web_tip">如：15</span></td>
            </tr>
            <tr>
              <th width="180">结算周期无法匹配为：</th>
              <td><div class="yun_admin_select_box"> <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_part_billing']) {?>
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['partdata']->value['part_billing_cycle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_part_billing']==$_smarty_tpl->tpl_vars['v']->value) {?>
                  <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['partclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
" class="yun_admin_select_box_text" id="part_billing_name" onClick="select_click('part_billing');">
                  <input name="locoy_part_billing" type="hidden" id="part_billing_val" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
">
                   
                  <?php }?>
                  <?php } ?>
                  <?php } else { ?>
                  <input type="button" value="请选择周期" class="yun_admin_select_box_text" id="part_billing_name" onClick="select_click('part_billing');">
                  <input name="locoy_part_billing" type="hidden" id="part_billing_val" value="">
                   
                  <?php }?>
                  <div class="yun_admin_select_box_list_box dn" id="part_billing_select"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['partdata']->value['part_billing_cycle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('part_billing','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['partclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
')"><?php echo $_smarty_tpl->tpl_vars['partclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </div>
                    <?php } ?> </div>
                </div></td>
            </tr>
            <tr class="admin_table_trbg">
              <th width="160">浏览数随机范围：</th>
              <td><input type="text" class="input-text tips_class" id='locoy_part_hits' name="locoy_part_hits"  value="<?php echo $_smarty_tpl->tpl_vars['locoyinfo']->value['locoy_part_hits'];?>
">
                <span class="admin_web_tip">如：0-100，默认为0</span></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
                <input class="admin_submit4" id="partconfig" type="submit" name="partconfig" value="提交" />
                &nbsp;&nbsp;
                <input class="admin_submit4" type="reset" value="重置" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
  <?php echo '<script'; ?>
>
        var $switchtag = $("div.main_tag ul li");
        $switchtag.click(function(){
            $(this).addClass("on").siblings().removeClass("on");
            var index = $switchtag.index(this);
            $("div.tag_box > div").eq(index).show().siblings().hide();
        });
    <?php echo '</script'; ?>
> 
</div>
</body>
</html><?php }} ?>
