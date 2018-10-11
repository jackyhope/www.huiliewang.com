<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-27 11:37:42
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/info.htm" */ ?>
<?php /*%%SmartyHeaderCode:13021110625bac508654f6d0-96303555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '586abf6890d2f4ebaeeb5b284bbcba1be4bf9150' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/info.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13021110625bac508654f6d0-96303555',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'config' => 0,
    'user_style' => 0,
    'row' => 0,
    'save' => 0,
    'cert' => 0,
    'industry_name' => 0,
    'industry_index' => 0,
    'v' => 0,
    'comclass_name' => 0,
    'comdata' => 0,
    'city_name' => 0,
    'city_index' => 0,
    'city_type' => 0,
    'company' => 0,
    'tel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bac5086701ca8_15810601',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bac5086701ca8_15810601')) {function content_5bac5086701ca8_15810601($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<?php echo '<script'; ?>
 charset="utf-8" src="../js/kindeditor/kindeditor-min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 charset="utf-8" src="../js/kindeditor/lang/zh_CN.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/index.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/lssave.js" type="text/javascript"><?php echo '</script'; ?>
> 
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/css/font-awesome.min.css" type="text/css">  
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/foundation-datepicker.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/binding.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/imgareaselect/imgareaselect.css" type="text/css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/imgareaselect/jquery.imgareaselect.js"><?php echo '</script'; ?>
>  
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/imgareaselect/ajaxfileupload.js"><?php echo '</script'; ?>
>  
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['mapurl'];?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/map.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript">
var userstyle='<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
';
var editor;
KindEditor.ready(function(K){
	editor = K.create('#content',{
		resizeType : 1,
		allowPreviewEmoticons : false,
		allowImageUpload : false,
		items : ['source',
		'bold', 'italic', 'underline',
		'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
		'insertunorderedlist','emoticons'] 
	});
}); 
	var id= $("#id").val();
	var content= $("#content").val();
	var start = 30;
	var step = -1;
	if(!id && !content){
		function count(){
		$("#atime").click(function(){ start=30});
		$("#totalSecond").html(start);
		start += step;
		if(start < 0 ){
			savecomform();
			start = 30;
		}
	setTimeout("count()",1000);
	}
	window.onload = count;	
	}
function checkpostcom(){    
	<?php if ($_smarty_tpl->tpl_vars['row']->value['email_status']==1) {?>
	ifemail = true; 
	<?php } else { ?>
		var mail=document.myform.linkmail.value;
		if(mail==""){
			ifemail = true;
		}else{
			ifemail = check_email(mail);
		}
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['row']->value['moblie_status']==1) {?>
	ifmoblie = true;
	<?php } else { ?>
	ifmoblie = isjsMobile(document.myform.linktel.value);
	<?php }?>
	
	if(document.myform.phonetwo.value){
		if(document.myform.phoneone.value==''){
			layer.msg('请填写区号！', 20, 8);return false;
		}else if(document.myform.phoneone.value.length>4){
			layer.msg('请正确填写区号！', 2, 8);return false;
		}else if(document.myform.phonethree.value){
			var linkphone = document.myform.phoneone.value+'-'+document.myform.phonetwo.value+'-'+document.myform.phonethree.value;
		}else{
			var linkphone = document.myform.phoneone.value+'-'+document.myform.phonetwo.value;
		}
	}
	
	
	
	var html = editor.text();
	var mun = $('#munid').val();
	var ifcheck=check_form(ifemail==false,'by_linkmail')&check_form(myform.linkman.value=="",'by_linkman')&check_form(myform.address.value=="",'by_address')&check_form(mun=="",'by_mun')&check_form(myform.citysid.value=="",'by_cityid')&check_form(myform.pr.value=="",'by_pr')&check_form(myform.hy.value=="",'by_hy')&check_form(myform.name.value=="",'by_name')

	if(ifcheck==0){return false;} 
	if(!document.myform.linktel.value && !linkphone){
		layer.msg('联系手机和固定电话必填一项！', 2, 8);return false; 
	}else if(ifmoblie==false && document.myform.linktel.value!=''){ 
		layer.msg('联系手机格式不正确！', 2, 8);return false;
	}
	var ifcheck=check_form(html=="",'by_content')
	
	var website=$.trim($("#website").val());
	if(website!=''){
		if(check_url(website)==false){
			layer.msg('企业网址格式不正确！', 2, 8);return false;
		}
	}
	var qq=$.trim($("#linkqq").val());
	if(qq!=''&&isQQ(qq)==false){
		layer.msg('QQ格式不正确！', 2, 8);return false; 
	}
	layer.load('执行中，请稍候...',0);
} 	
<?php echo '</script'; ?>
> 
<div class="w1000">
  <div class="admin_mainbody"> 
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
    <div class=right_box>
      <div class=admincont_box>
        <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
        <form name="myform" method="post" target="supportiframe" action="index.php?c=info&act=save" onsubmit="return checkpostcom();" enctype="multipart/form-data">
          <div class="com_tit"><span class="com_tit_span">企业基本信息</span><span class="com_tit_right"><span class="ff0">*</span>为必填项</span></div>
          <?php if ($_smarty_tpl->tpl_vars['save']->value) {?>
          <div id="forms" class="text_tips">您有上次未提交成功的数据 <!--<a href="index.php?c=info&act=saveform" class="text_tips_a">--><a href="javascript:;" onclick="savecom();" class="text_tips_a">恢复数据</a> <i id="close" class="text_tips_close"></i></div>
          <?php }?>
          <div class="admin_textbox_02">
           <div class="info_logo"><img src=".<?php echo $_smarty_tpl->tpl_vars['row']->value['logo'];?>
" width="185" height="75" id="logo" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_icon'];?>
','2')"/>
           <div class="info_logo_p">		
		   <div class="logo_submit"><input id="image" class="logo_submit_f" type="file" name="image" onchange="ajaxfile();">
           </div></div></div>
            <ul>
              <li>
                <div class=tit><font color="#FF0000">*</font> 企业全称：</div>
                <div class=textbox> 
				<?php if ($_smarty_tpl->tpl_vars['row']->value['yyzz_status']==1) {?>
                  <label style="font-size:13px;font-family: microsoft yahei,宋体;"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</label>
                  &nbsp;<font color="red">公司名已认证</font>
                  <input type="hidden"  name="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
">
                <?php } else { ?>
                  <input type="text" size="45" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" class="com_info_text" style="width:280px;" maxlength="20"/>
				  <div id="cdiv">
				   <?php if (!empty($_smarty_tpl->tpl_vars['cert']->value)) {?>
					  <?php if ($_smarty_tpl->tpl_vars['cert']->value['status']==2) {?>
					    <div id="dcert">
					    <?php if ($_smarty_tpl->tpl_vars['cert']->value['statusbody']) {?> 
					    <div id="showcomstatusbody" style="display:none;"><div class="info_z_y"><?php echo $_smarty_tpl->tpl_vars['cert']->value['statusbody'];?>
</div> </div>
					    <?php }?>
					    <a href="javascript:void(0)"  onclick="getyyzz('营业执照认证',550,310);" class="com_set_a fl" >重新认证</a>
                       <div class="infor_check_no">审核未通过 <a class="infor_check" href="javascript:void(0)" onclick="showcomstatusbody();">查看原因</a></div>
					   </div>
					  <?php } else { ?>
					   <div id="dcert" class="Binding_list_text  Binding_mt" style="width:300px;">营业执照已上传，请等待审核</div>
					  <?php }?>
					 <?php } else { ?>
					   <div id="dcert">
				       <a href="javascript:void(0)"  onclick="getyyzz('营业执照认证',550,310);" class="com_set_a" >企业认证</a>
					   </div>
					 <?php }?>
				  </div>
                <?php }?> 
				  <span id="by_name" class="errordisplay">企业全称不能为空</span></div>
              </li>
              <li>
                <div class=tit><font color="#FF0000">*</font> 从事行业：</div>
                <div class=textbox>
                  <div class="text_seclet text_seclet_cur" style="z-index:400">
                    <input id="qyhy" class="SpFormLBut text_seclet_w250 " type="button" onclick="search_show('job_qyhy');" <?php if ($_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['row']->value['hy']]=='') {?> value="请选择从事行业"  <?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['row']->value['hy']];?>
" <?php }?> >
                    <input id="qyhyid" type="hidden" name="hy" <?php if ($_smarty_tpl->tpl_vars['row']->value['hy']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['hy'];?>
" <?php }?>  >
                    <div id="job_qyhy" class="cus-sel-opt-panel" style="display:none; z-index:301">
                      <div style="width:100%;  overflow:auto; overflow-x:hidden">
                        <ul>
                          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                          <li> <a onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','qyhy','<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" href="javascript:;"> <?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <span id="by_hy" class="errordisplay">请选择从事行业</span> </div>
              </li>
              <li>
                <div class=tit><font color="#FF0000">*</font> 企业性质：</div>
                <div class=textbox>
                  <div class="text_seclet text_seclet_cur2 re">
                    <input id="qypr" class="SpFormLBut text_seclet_w158" type="button" onclick="search_show('job_qypr');" <?php if ($_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['pr']]=='') {?> value="请选择企业性质" <?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['pr']];?>
" <?php }?>  >
                    <input id="qyprid" type="hidden" name="pr" <?php if ($_smarty_tpl->tpl_vars['row']->value['pr']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['pr'];?>
" <?php }?> >
                    <div id="job_qypr" class="cus-sel-opt-panel cus-sel-opt-panel-w156 cus_h70" style="display: none;">
                      <ul class="Search_Condition_box_list">
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_pr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <li> <a onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','qypr','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                  <span id="by_pr" class="errordisplay">企业性质不能为空！</span> </div>
              </li>
              <li>
                <div class=tit><font color="#FF0000">*</font> 企业规模：</div>
                <div class=textbox>
                  <div class="text_seclet text_seclet_cur3">
                    <input id="mun" class="SpFormLBut text_seclet_w158" type="button" onclick="search_show('job_mun');" <?php if ($_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['mun']]=='') {?> value="请选择企业规模" <?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['mun']];?>
" <?php }?> >
                    <input id="munid" name="mun" type="hidden" <?php if ($_smarty_tpl->tpl_vars['row']->value['mun']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mun'];?>
" <?php }?> >
                    <div id="job_mun" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display:none">
                      <ul class="Search_Condition_box_list">
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_mun']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <li><a onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','mun','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" href="javascript:;"> <?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                  <span id="by_mun" class="errordisplay">请选择企业规模</span> </div>
              </li>
              <li>
                <div class=tit><font color="#FF0000">*</font> 所在地：</div>
                <div class=textbox>
                  <div class="text_seclet text_seclet_cur4 fltL">
                    <input class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']]) {?> value="<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']];?>
" <?php } else { ?>value="请选择"<?php }?> id="province" onclick="search_show('job_province');">
                    <input type="hidden" id="provinceid" name="provinceid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['provinceid'];?>
" />
                    <div id="job_province" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display:none">
                      <div style="width:100%;  overflow:auto; overflow-x:hidden">
                        <ul class="Search_Condition_box_list">
                          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                          <li><a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','province','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','citys','city');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="text_seclet text_seclet_cur3 fltL">
                    <input class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']]) {?> value="<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']];?>
" <?php } else { ?>value="请选择"<?php }?> id="citys" onclick="search_show('job_citys');">
                    <input type="hidden" id="citysid" name="cityid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cityid'];?>
" />
                    <div id="job_citys" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display:none">
                      <div style="width:100%;  overflow:auto; overflow-x:hidden">
                        <ul class="Search_Condition_box_list">
                          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                          <li><a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','citys','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','three_city','city');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="text_seclet text_seclet_cur3 fltL <?php if ($_smarty_tpl->tpl_vars['row']->value['three_cityid']<1) {?>none<?php }?>" id="cityshowth">
                    <input class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['three_cityid']]) {?> value="<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['three_cityid']];?>
" <?php } else { ?>value="请选择"<?php }?> id="three_city" onclick="three_city_show('job_three_city');">
                    <input type="hidden" id="three_cityid" name="three_cityid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['three_cityid'];?>
" />
                    <div id="job_three_city" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display:none">
                      <ul class="Search_Condition_box_list">
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','three_city','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                  <span id="by_cityid" class="errordisplay">请选择所在地</span> </div>
              </li>
              <li>
                <div class=tit><font color="#FF0000">*</font> 公司地址：</div>
                <div class=textbox>
                  <input type="text" style="width:320px;" id="address" name="address" size="45" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
" class="com_info_text"/>
				  <a href="javascript:void(0)"  onclick="setmap('<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
')" class="com_set_a" id="set_map">设置地图</a>
                  <span id="by_address" class="errordisplay">请填写正确的公司地址</span> </div>
              </li>
              <li>
                <div class=tit><font color="#FF0000">*</font> 联  系  人：</div>
                <div class=textbox>
                  <input type="text" id="linkman" name="linkman" size="15" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['linkman'];?>
" class="com_info_text"/>
                  <span id="by_linkman" class="errordisplay">请填写招聘联系人</span> </div>
              </li>
              <li>
                <div class=tit> 联系手机：</div>
                <div class=textbox id="bdphone"> 
				<?php if ($_smarty_tpl->tpl_vars['row']->value['moblie_status']==1) {?>
				<input type="text" size="35" id="linktel" name="linktel" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['linktel'];?>
" class="com_info_text" style="width:250px;background:#D3D3D3;" readonly="readonly"/>
                  <a href="javascript:void(0)"  onclick="getshow('moblie','绑定手机号码');" class="com_set_a" >重新绑定</a>
                  <?php } else { ?>
                  <input type="text" id="linktel" name="linktel" size="25" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['linktel'];?>
" onkeyup="this.value=this.value.replace(/[^0-9-]/g,'')" class="com_info_text"/><a href="javascript:void(0)"  onclick="getshow('moblie','绑定手机号码');" class="com_set_a" >手机绑定</a>
                   <span id="by_linktel" class="errordisplay">手机格式不正确</span>
				  <?php }?> 
				 </div>
              </li>
              <li>
                <div class=tit>固定电话：</div>
                <div class=textbox>
                  <input type="text" id="phoneone" name="phoneone" style="width:60px" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['phoneone'];?>
" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="com_info_text" placeholder="区号" maxlength="4"/>
				  <span class="fltL com_info_text_r">-</span>
                  <input type="text" id="phonetwo" placeholder="座机号" name="phonetwo"  value="<?php echo $_smarty_tpl->tpl_vars['row']->value['phonetwo'];?>
" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" maxlength="8" class="com_info_text com_info_text_120"/>
				  <span class="fltL com_info_text_r">-</span>
                  <input type="text" id="phonethree" placeholder="分机号" name="phonethree"  value="<?php echo $_smarty_tpl->tpl_vars['row']->value['phonethree'];?>
" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="com_info_text com_info_text_60"/>
                  <span><font color="#FF0000">*</font> 手机或电话必填一项</span> </div>
              </li>
              <li>
                <div class=tit><font color="#FF0000">*</font> 企业简介：</div>
                <div class=textbox>
                  <textarea name="content" id="content" class="com_info_textarea" style="width:100%" rows="10"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea>
                  <span id="by_content" class="errordisplay">请填写相关企业简介</span> </div>
              </li>
              
              <div class="admin_tit" id='for_logo' style="margin-top:10px;">
              <span class="admin_tit_bg">补充信息(选填项)</span>
              <!--<span class=remind style="float:right; margin-right:20px;">填写补充信息，求职者更青睐，招工更快捷！</span>-->
              </div>
              <li>
                <div class=tit>创办时间：</div>
                <div class=textbox>
					<input type="text" id="sdate" name="sdate" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sdate'];?>
" class="com_info_text" /> 
					<?php echo '<script'; ?>
>
					$('#sdate').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
					<?php echo '</script'; ?>
>
				</div>
              </li>
              <li>
                <div class=tit>注册资金：</div>
                <div class=textbox>
					<div class="text_seclet text_seclet_cur" style="z-index:400">
					<input id="moneytype" class="SpFormLBut text_seclet_w100 " style="display: none;" type="button" onclick="search_show('job_moneytype');" <?php if ($_smarty_tpl->tpl_vars['row']->value['moneytype']=='1') {?> value="人民币"  <?php } else { ?> value="美元" <?php }?>>
					<input id="moneytypeid" type="hidden" name="moneytype" value='<?php echo $_smarty_tpl->tpl_vars['row']->value['moneytype'];?>
'>
					<div id="job_moneytype" class="cus-sel-opt-panel" style="display:none; z-index:301;width:100px;display: none">
                      <div style="width:100%;  overflow:auto; overflow-x:hidden">
                        <ul> 
                          <li> <a onclick="selectsmoney('1','万元','人民币');" href="javascript:void(0);">人民币</a> </li> 
                          <li> <a onclick="selectsmoney('2','万美元','美元');" href="javascript:void(0);">美元</a> </li> 
                        </ul>
                      </div>
                    </div>
                  <input type="text" id="money" name="money" size="10" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['money'];?>
" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="com_info_text com_info_text_120" />
                  <span class='moneyname'><?php if ($_smarty_tpl->tpl_vars['row']->value['moneytype']=='1') {?>万元<?php } else { ?>万美元<?php }?> </span></div>
                 </div>
              </li>
              <li>
                <div class=tit>邮政编码：</div>
                <div class=textbox>
                  <input type="text" name="zip" size="10" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['zip'];?>
" id='zip' onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="com_info_text"/>
                </div>
              </li>
              <li>
                <div class=tit>联系人职位：</div>
                <div class=textbox>
                  <input type="text" id="linkjob" name="linkjob" size="15" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['linkjob'];?>
" class="com_info_text"/>
                </div>
              </li>
              <li>
                <div class=tit>联 系 QQ：</div>
                <div class=textbox>
                  <input type="text" id="linkqq" name="linkqq" size="15" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['linkqq'];?>
" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='12' class="com_info_text"/>
                </div>
              </li>
              <li>
                <div class=tit>招聘邮箱：</div>
                <div class=textbox id="bdmail"> 
				<?php if ($_smarty_tpl->tpl_vars['row']->value['email_status']==1) {?>
                  <input type="text" id="linkmail" name="linkmail" size="35" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['linkmail'];?>
" class="com_info_text" style="width:250px;background:#D3D3D3;" readonly="readonly"/>
				  <a href="javascript:void(0)"  onclick="getshow('email','绑定邮箱');" class="com_set_a" >重新绑定</a>
                <?php } else { ?>
                  <input type="text" id="linkmail" name="linkmail" size="35" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['linkmail'];?>
" class="com_info_text" /><a href="javascript:void(0)"  onclick="getshow('email','绑定邮箱');" class="com_set_a" >邮箱绑定</a> <span id="by_linkmail" class="errordisplay">招聘邮箱格式不正确</span> 
				<?php }?> 
				  </div>
              </li>
              <li>
                <div class="tit">企业网址：</div>
                <div class="textbox">
                  <input type="text" id="website" name="website" size="35" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['website'];?>
" class="com_info_text"/>
                  如：http://www.baidu.com </div>
              </li>
              <li>
                <div class="tit">公交站点：</div>
                <div class="textbox">
                  <textarea name="busstops" id="busstops" class="com_info_textarea" rows="3"><?php echo $_smarty_tpl->tpl_vars['row']->value['busstops'];?>
</textarea>
                </div>
              </li>
			   <li>
                <div class=tit>联系方式：</div>
                <div class=textbox>
                  <div class="text_seclet text_seclet_cur" style="z-index:400">
                    <input id="infostatus" class="SpFormLBut text_seclet_w250 " type="button" onclick="search_show('job_infostatus');" <?php if ($_smarty_tpl->tpl_vars['row']->value['infostatus']=='1') {?> value="公开"  <?php } else { ?> value="不公开" <?php }?> >
                    <input id="infostatusid" type="hidden" name="infostatus" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['infostatus'];?>
" >
                    <div id="job_infostatus" class="cus-sel-opt-panel" style="display:none; z-index:301">
                      <div style="width:100%;  overflow:auto; overflow-x:hidden">
                        <ul> 
                          <li> <a onclick="selects('1','infostatus','公开');" href="javascript:void(0);">公开</a> </li> 
                          <li> <a onclick="selects('2','infostatus','不公开');" href="javascript:void(0);">不公开</a> </li> 
                        </ul>
                      </div>
                    </div>
                  </div> 
				  </div>
              </li>
              <li>
                <div class="tit">公司二维码：</div>
                <div class="textbox">
                
                <div class="ewm_submit"> <input type="file" id="comqcode" name="comqcode" onchange="ajaxewm()" size="35" class="ewm_submit_f"/>   </div>
                 <div class="ewm_img" id="ewm_div" <?php if (!$_smarty_tpl->tpl_vars['row']->value['comqcode']) {?>style="display:none"<?php }?>> <img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['comqcode'];?>
" id="ewm" width="100" height="100"></div>
				  </div>
              </li>
              <li>
                <div class="admin_submit">
                  <div class="condition">&nbsp;</div>
                  <div class="sub_btn">
                    <input class="btn_01" style="_margin-left:-3px" type="submit" name="submitbtn" value="保存信息">
                  </div>
                  <input id="save" name="save" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['linkman'];?>
" type="hidden"/>
                </div>
              </li>
            </ul>
            <div class="clear"></div>
          </div>
          <?php if (!$_smarty_tpl->tpl_vars['row']->value['linkman']&&!$_smarty_tpl->tpl_vars['row']->value['content']) {?>
          <div class="text_tips_bc">
            <div class="text_tips_bc_h1"> 信息保存</div>
            <div class="text_tips_bc_cont"> <?php if ($_smarty_tpl->tpl_vars['save']->value['time']) {?>
              <div class="text_tips_bc_l">信息已于<?php echo $_smarty_tpl->tpl_vars['save']->value['time'];?>
保存</div>
              <?php }?>
              <div class="text_tips_bc_r">
                <div class="text_tips_bc_time"> <span id="totalSecond"></span>s后将自动保存<br>
                  已填信息</div>
                <a  id="atime" href="javascript:;" onclick="savecomform();" class="text_tips_bc_bth">临时保存信息</a> </div>
            </div>
          </div>
          <?php }?>
		  <div class="clear"></div>
        </form>
		<div class="clear"></div>
      </div>
    </div>
  </div>
</div>  
<div class="clear"></div>
<div id="yyzz" style=" display:none;">
  <div class="Binding_pop_box" style="padding:10px;width:530px;height:250px; overflow:auto; overflow-x:hidden; background:#fff;">
    <div class="Binding_pop_box_msg">营业执照验证，有利于更好的招聘人才!<br>营业执照中的企业名称、年检章等需清晰可辨别，否则不能通过验证。</div>
    <div class="Binding_pop_box_msg_cont">
      <form name="MyForm" id="certform">
        <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>企业全称：</span>
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
" name="company_name" id="company_name" class="Binding_pop_box_list_text Binding_pop_box_list_textw200" maxlength="50"/>
        </div>
        <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>营业执照：</span>
          <input type="file" name="pic" onchange="ajaxcert()" id="pic" class="Binding_pop_box_list_text Binding_pop_box_list_textw200"  accept="image/*">
        
        </div>
       <div class="Binding_pop_box_msg_cont_pic" <?php if (!$_smarty_tpl->tpl_vars['cert']->value['check']) {?>style="display:none"<?php }?> id="preview">
	   <img src="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
" id="imghead" width="140" height="160"/>
	   <a target="_blank" id="imga" href="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
" class="Binding_pop_box_msg_cont_pic_p">查看原图</a>
        </div>
         <div class="clear"></div>
       
        <div class="Binding_pop_sub" style="margin-top:20px;"> <span class="Binding_pop_box_list_left">&nbsp;</span>
		  <input id="com_cert" name="com_cert" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
">
          <input class="com_pop_bth_qd" name="upfile" type="submit" value="保存">
          <input class="com_pop_bth_qx" type="button" value="取消" onclick="layer.closeAll();">
        </div>
      </form>
    </div>
  </div>
</div>
<!--绑定手机弹出框-->
<div id="moblie" style=" display:none;">
  <div class="Binding_pop_box" style="padding:10px;width:480px;height:200px; background:#fff;">
    <div class="Binding_pop_box_msg">绑定完成后，您可以使用该手机号码找回密码</div>
    <div>
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>手机号码：</span>
        <input type="text" name="moblie" class="Binding_pop_box_list_text Binding_pop_box_list_textw200">
        <input type="hidden" name="mobile" value="<?php echo $_smarty_tpl->tpl_vars['tel']->value['check'];?>
">
      </div>
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>短信验证码：</span>
        <input type="text" id="moblie_code" class="Binding_pop_box_list_text" style="width:90px;">
        <a href="javascript:;" class="Binding_pop_bth duanxibtn" id="time">免费发送验证码</a></div>
      <div class="Binding_pop_sub" style="margin-top:20px;"> <span class="Binding_pop_box_list_left">&nbsp;</span>
        <input class="com_pop_bth_qd" onclick="check_moblie();" type="button" value="保存">
        <input class="com_pop_bth_qx" type="button" value="取消" onclick="layer.closeAll();">
		<input type="hidden" value="1" id="info">
      </div>
    </div>
  </div>
</div>

<!--绑定邮箱弹出框-->
<div id="email" style="display:none;">
  <div class="Binding_pop_box" style="padding:10px;width:480px;height:205px; background:#fff">
    <div class="Binding_pop_box_msg">修改后的邮箱将作为新的登录账号</div>
    <div >
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>新的邮箱：</span>
        <input type="text" name="email" class="Binding_pop_box_list_text Binding_pop_box_list_textw200">
      </div>
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>验证码：</span>
        <input type="text" name="email_code" class="Binding_pop_box_list_text">
        <img id="vcode_img" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" style=" margin:0 5px 5px 5px; vertical-align:middle;">
        <a href="javascript:void(0);" onclick="checkCode('vcode_img');">看不清</a></div>
      <div class="Binding_pop_sub"> <span class="Binding_pop_box_list_left">&nbsp;</span>
        <input class=" com_pop_bth" type="button" onclick="sendbemail('vcode_img');" value="发送验证邮箱">
        <input class=" com_pop_bth_qx" type="button" value="取消" onclick="layer.closeAll();">
		<input type="hidden" value="1" id="info">
      </div>
    </div>
  </div>
</div>


<!--设置企业地图弹出框-->
<div id="setmap" style="display:none;">
 <div style="position:relative" style="width:740px;">
          <table border="0" cellspacing="0" cellpadding="0" style="font-size:12px;">
              <tr>
                <th height="30"></th>
                <td><div id="map_container" style="width:739px;height:300px;"></div><br>
                </td>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td height="40"> X轴:
                  <input name="xvalue" id="map_x" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['x'];?>
"  class="com_info_text" style='float:none'>
                  &nbsp;&nbsp;
                  Y轴:
                  <input name="yvalue" id="map_y" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['y'];?>
"  class="com_info_text" style='float:none'>
                  &nbsp;&nbsp;
                  <input type="button" name="savemap" class="btn_01" value="保存地图" onclick="checkpost();" style="">
                  <span id="by_map" class="errordisplay">请先设置地图位置</span></td>
              </tr>
              <tr>
                <th height="30"></th>
                <td>
				  <div class="wxts_box wxts_box_mt20">
					<div class="wxts">操作说明：</div>
				   在地图区域点击公司所在的位置，点击保存地图。</div>
				</td>
				</tr>
          </table>
		  <input type="hidden" name="type" value="info">
          <div class="map_seach"><input id="map_keyword" type="text" value="<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']];
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']];
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['three_cityid']];
echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
" class="map_seach_text" placeholder="请输入地址" onclick="if(this.value=='请输入地址'){this.value='';}" onblur="if(this.value==''){this.value='请输入地址';}"/><input type="button" value="搜索" onclick="localsearch('全国');" class="map_seach_sub"/></div>
          
   </div>
</div>
<!--弹出框 end--> 
<?php echo '<script'; ?>
>
function showcomstatusbody(){
	$.layer({
		type : 1,
		title : '审核说明',
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['300px','auto'],
		page : {dom :"#showcomstatusbody"}
	});
}
function ajaxfile() {
	if($("#image").val() != '') {
		var i=layer.load('Logo上传中，请稍候....', 0);
		$.ajaxFileUpload({
			url: 'index.php?c=uppic&act=ajaxfileupload',
			secureuri: false, //是否需要安全协议，一般设置为false
			fileElementId: 'image', //文件上传域的ID
			dataType: 'json', //返回值类型 一般设置为json
			data:{'type':'info'},
			success: function (data, status){  //服务器成功响应处理函数
				layer.close(i);
				if (data.s_thumb) {
					layer.msg(data.s_thumb, 2, 8);
				} else {
					$('#logo').attr('src',data.url);
				}
		   }
		})
	}
}
function ajaxewm() {
	if($("#comqcode").val() != '') {
		var i=layer.load('二维码上传中，请稍候....', 0);
		$.ajaxFileUpload({
			url: 'index.php?c=info&act=upewm',
			secureuri: false, //是否需要安全协议，一般设置为false
			fileElementId: 'comqcode', //文件上传域的ID
			dataType: 'json', //返回值类型 一般设置为json
			data:{'uppic':'1'},
			success: function (data, status){  //服务器成功响应处理函数
				layer.close(i);
				if (data.msg) {
					layer.msg(data.msg, 2, 8);
				} else {
				    $(".ewm_img").show();
					$('#ewm').attr('src',data.url);
				}
		   }
		})
	}
}
function ajaxcert() {
	if($("#pic").val() != '') {      
		var i=layer.load('图片上传中，请稍候....', 0);
		$.ajaxFileUpload({
			url: 'index.php?c=binding&act=save',
			secureuri: false, //是否需要安全协议，一般设置为false
			fileElementId: 'pic', //文件上传域的ID
			dataType: 'json', //返回值类型 一般设置为json
			data:{'uppic':'1'},
			success: function (data, status){  //服务器成功响应处理函数
				layer.close(i);	
				if (data.msg) {
					layer.msg(data.msg, 2, 8);
				} else {
				    $('#preview').show();
					$('#imghead').attr('src',data.url);
					$('#imga').attr('href',data.url);
					$('#com_cert').attr('value',data.url);
				}
		   }
		})
	}
}
//ajax提交表单
$(function () {
	$('#certform').submit(function (e) {
	    e.preventDefault();
		e.stopPropagation();
        var company_name=$.trim($("#company_name").val());
		var com_cert=$('#com_cert').val();
		if(company_name==''){
			layer.msg('企业全称不能为空！',2,8);
			return false;
		}
		if(com_cert==''){
			layer.msg('请上传营业执照！',2,8);
			return false;
		}
		var i=layer.load('执行中，请稍候...',0);
		$.post("index.php?c=binding&act=save", {
		    company_name: company_name,
			com_cert: com_cert,
			upfile: 'info'
		}, function (res) {
		    layer.close(i);
			if (res) {
			    $("#dcert").remove();
				$("#cdiv").append(" <div id=\'dcert\' class=\'Binding_list_text  Binding_mt\' style=\'width:300px;\'>营业执照已上传，请等待审核</div>");
				layer.msg('营业执照已上传成功！', 2, 9); 
			}
		});
		setTimeout(layer.closeAll(),2000);
	});
});

function getmap(){
   var map=new BMap.Map("map_container");
   var x = '<?php echo $_smarty_tpl->tpl_vars['config']->value['map_x'];?>
';
   var y = '<?php echo $_smarty_tpl->tpl_vars['config']->value['map_y'];?>
';
   if(!x || !y){
	map.centerAndZoom(new BMap.Point(116.404, 39.915), 12);
   }else{
	map.centerAndZoom(new BMap.Point(x, y), 12);
	}
   
   return map;
}

function setmap(address){

	var x = $("#map_x").val();
	var y = $("#map_y").val();
	$.layer({
		type : 1,
		title : '设置企业地图',
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['750px','480px'],
		page : {dom :"#setmap"}
	});
	var map=getmap();
	
	setLocation('map_container',116.404,39.915,"map_x","map_y",map);

	if(x && y){
		
	    setLocation('map_container',x,y,"map_x","map_y",map);
        $("#set_map").html("已设置地图");
	}else if(address){
		

	    $("#map_keyword").val("<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']];
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']];
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['three_cityid']];
echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
");
		address = "<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']];
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']];
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['three_cityid']];
echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
";
		localsearch(address.replace(/\s+/g,""),map);

	}else{
	    //根据IP到城市开始
		function myFun(result){
			var cityName = result.name;
			map.setCenter(cityName);
		}
		var myCity = new BMap.LocalCity();
		myCity.get(myFun);
		//根据IP到城市结结束
	}
}

function getLocalResult(local){
	var map_keyword=$.trim($("#map_keyword").val());
	var points=local.getResults();
		var lngLat=points.getPoi(0).point;
		setLocation('map_container',lngLat.lng,lngLat.lat,"map_x","map_y");
		document.getElementById("map_x").value=lngLat.lng;
		document.getElementById("map_y").value=lngLat.lat;
	
}
function localsearch(city){
	var map=getmap();
	setLocation('map_container',116.404,39.915,"map_x","map_y",map);
	
	if($("#map_keyword").val()==""){
		layer.msg('请输入地址！', 2, 8);return false;
	}
	
	// 创建地址解析器实例
	var myGeo = new BMap.Geocoder();
	// 将地址解析结果显示在地图上,并调整地图视野
	myGeo.getPoint($("#map_keyword").val().replace(/\s+/g,""), function(point){
		
		map.centerAndZoom(point, 16);
		map.addOverlay(new BMap.Marker(point));
		
	}, "北京市");
	
}
function checkpost(){
	if($.trim($("#map_x").val())==''||$.trim($("#map_y").val())==''){
		layer.msg('请先设置地图位置！', 2, 8);return false;
	}
	var xvalue = $("#map_x").val();
	var yvalue = $("#map_y").val();
	$.post('index.php?c=map&act=save',{xvalue:xvalue,yvalue:yvalue,type:'info',savemap:'1'},function(data){
		
		if(data=='1'){
			layer.closeAll();
			layer.msg('地图设置成功！', 2, 9);return false;
		}else{
			layer.msg('地图设置失败，请重试！', 2, 8);return false;
		}
	
	})
}
function setLocation(id,x,y,xid,yid,map){
	var data=get_map_config();
	var config=eval('('+data+')');
	var rating,map_control_type,map_control_anchor;
	if(!x && !y){x=config.map_x;y=config.map_y;}
	var point = new BMap.Point(x,y);
	var marker = new BMap.Marker(point);
	var opts = {type:BMAP_NAVIGATION_CONTROL_LARGE}
	map.enableScrollWheelZoom(true);
	map.addControl(new BMap.NavigationControl(opts));
	map.centerAndZoom(point, 15);
	map.addOverlay(marker);
	map.addEventListener("click",function(e){
	   var info = new BMap.InfoWindow('', {width: 260});
		var projection = this.getMapType().getProjection();
		var lngLat = e.point;
		document.getElementById(xid).value=lngLat.lng;
		document.getElementById(yid).value=lngLat.lat;
		map.clearOverlays();
		var point = new BMap.Point(lngLat.lng,lngLat.lat);
		var marker = new BMap.Marker(point);
		map.addOverlay(marker);
	});
}
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
