<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:55
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_keyword.htm" */ ?>
<?php /*%%SmartyHeaderCode:13734501775afd457b04b722-60063133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e8be3801bb706b0f46c4e327cb57176b439ab7b' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_keyword.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13734501775afd457b04b722-60063133',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'keywordarr' => 0,
    'k' => 0,
    'v' => 0,
    'rows' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd457b121662_78628387',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd457b121662_78628387')) {function content_5afd457b121662_78628387($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.searchurl.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jscolor/jscolor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/admin_public.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/show_pub.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
function keywords(key_name,type,color,size,bold,tuijian,num,id){
	$("#id").val(id);
	$("#key_name").val(key_name);
	$("#onesize").val(size);
	var val=$(".hiddentype"+type).val();
	$("#addclass2_val").val(type);
	if(key_name!=""){
	$("#addclass2_name").val(val);
	}	
	if(color!=""){
		$("#onecolor").val(color);
		$("#onecolor").attr("style","background-color:#"+color);
	}else{
		$("#onecolor").attr("style","");
		$("#onecolor").val('');
	}
	$("#num").val(num);
	$("#onebold_"+bold).attr("checked",true);
	$("#onetuijian_"+tuijian).attr("checked",true);
	add_class('�ؼ��ֹ���','480','440','#status_div','');
}
function audall(name){
	var chk_value =[];
	$('input[name="'+name+'"]:checked').each(function(){
		chk_value.push($(this).val());
	});
	if(chk_value.length==0){
		parent.layer.msg("��ѡ��Ҫ��˵����ݣ�",2,8);return false;
	}else{
		$("input[name=pid]").val(chk_value);
		$.layer({
			type : 1,
			title :'�ؼ��ֹ���', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			offset: ['20px', ''],
			area : ['400px','320px'],
			page : {dom :"#infobox2"}
		});
	}
}
function recommend(name){
	var chk_value =[];
	$('input[name="'+name+'"]:checked').each(function(){
		chk_value.push($(this).val());
	});
	if(chk_value.length==0){
		parent.layer.msg("��ѡ��Ҫ�Ƽ������ݣ�",2,8);return false;
	}else{
		$("input[name=pid]").val(chk_value);
		$.layer({
			type : 1,
			title :'�ؼ��ֹ���', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['400px','320px'],
			offset: ['20px', ''],
			page : {dom :"#infobox2"}
		});
	}
}
function addbold(name){
	var chk_value =[];
	$('input[name="'+name+'"]:checked').each(function(){
		chk_value.push($(this).val());
	});
	if(chk_value.length==0){
		parent.layer.msg("��ѡ��Ҫ�Ӵֵ����ݣ�",2,8);return false;
	}else{
		$("input[name=pid]").val(chk_value);
		$.layer({
			type : 1,
			title :'�ؼ��ֹ���', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['400px','320px'],
			offset: ['20px', ''],
			page : {dom :"#infobox2"}
		});
	}
}
function edittype(name){
	var chk_value =[];
	$('input[name="'+name+'"]:checked').each(function(){
		chk_value.push($(this).val());
	});
	if(chk_value.length==0){
		parent.layer.msg("��ѡ��Ҫ�޸Ĺؼ������͵����ݣ�",2,8);return false;
	}else{
		$("input[name=pid]").val(chk_value);
		$.layer({
			type : 1,
			title :'�ؼ��ֹ���', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['400px','320px'],
			offset: ['20px', ''],
			page : {dom :"#infobox2"}
		});
	}
}
<?php echo '</script'; ?>
>
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />
<link href="images/table_form.css" rel="stylesheet" type="text/css" />

<title>��̨����</title> 
</head>
<body class="body_ifm">
<div id="infobox2" style="display:none; width: 400px; "> 
  <form action="index.php?m=admin_keyword&c=status" target="supportiframe" method="post" id="formstatus">
  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
	<table cellspacing='2' cellpadding='3'>
			<tr class="keywords_sum">
            <th class="key_wid" style="padding:10px">�ؼ������ͣ�</th>
            <td>
              <div class="yun_admin_select_box">
                        <input type="button" value="��ѡ��" class="yun_admin_select_box_text" id="addclass_name" onClick="select_click('addclass');">
                        <input name="type" type="hidden" id="addclass_val" value="">
                        <div class="yun_admin_select_box_list_box dn" id="addclass_select">
                         <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['keywordarr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                         <div class="yun_admin_select_box_list">
                         <a href="javascript:;" onClick="select_new('addclass','<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a>
                         </div> 
                         <?php } ?>
                    </div>
                </div>
              </td>
              </tr>
			<tr class="keywords_sum">
            <th class="key_wid" >�����С��</th>
            <td><input class="admin_wx_text" type="text" id="size" name="size" value="" /><span class="admin_web_tip">����12px</span></td>
            </tr>
			<tr class="keywords_sum">
            <th class="key_wid" >������ɫ��</th>
            <td>
            <input class="admin_wx_text color" readonly type="text" id="color" name="color" size="20" value="" style="margin-top:5px;"/></td>
            </tr>
			<tr class="keywords_sum">
            <th class="key_wid">�Ƿ�Ӵ֣�</th>
            <td>
             <div class="admin_examine_right">
            <label><span class="admin_examine_table_s"><input type="radio" name="bold" value="0" id="bold_0">��</span></label>
            <label><span class="admin_examine_table_s"><input type="radio" name="bold" value="1" id="bold_1">��</span></label>
            </div>
            </td>
            </tr>
			<tr class="keywords_sum">
            <th class="key_wid">�Ƿ��Ƽ���</th>
            <td>
               <div class="admin_examine_right">
            <label><span class="admin_examine_table_s"><input type="radio" name="tuijian" value="0" id="tuijian_0">��</span></label>
            <label><span class="admin_examine_table_s"><input type="radio" name="tuijian" value="1" id="tuijian_1">��</span></label>
            </div></td>
            </tr>
			<tr class="keywords_sum">
            <th class="key_wid">�Ƿ���ˣ�</th>
            <td>
               <div class="admin_examine_right">
            <label><span class="admin_examine_table_s"><input type="radio" name="status" value="0" id="status0">��</span></label>
              <label><span class="admin_examine_table_s"><input type="radio" name="status" value="1" id="status1" >��</span></label>
              </div>
            </td>
            </tr>
			<tr>
            <td colspan='2' align="center">
   <div class="admin_Operating_sub"> <input type="submit"  value='ȷ��' class="admin_examine_bth"> <input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='ȡ��'></td>
   
 </tr>
		</table>
	<input name="pid" value="0" type="hidden">
  </form> 
</div> 
<div id="status_div" style="display:none;">
    <div  style="width:455px" >
      <form action="index.php?m=admin_keyword&c=save" target="supportiframe" method="post" id="formstatus">
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
		<table cellspacing='2' cellpadding='3' class="key_table">
			<tr class="keywords_sum">
            <th  class="key_wid"  align="right"><div class="key_wid" style="width:120px;">�ؼ������ƣ�</div></th>
            <td><input id="key_name" class="key_input_text" type="text" value=""   name="key_name"><span class="admin_web_tip">����phpyun</span></td></tr>
			<tr class="keywords_sum">
            <th class="key_wid" align="right">�ؼ������ͣ�</th>
            <td>
              <div class="yun_admin_select_box">
                        <input type="button" value="��ѡ��" class="yun_admin_select_box_text" id="addclass2_name" onClick="select_click('addclass2');">
                        <input name="type" type="hidden" id="addclass2_val" value="">
                    <div class="yun_admin_select_box_list_box dn" id="addclass2_select">
                      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['keywordarr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                         <div class="yun_admin_select_box_list">
                         <a href="javascript:;" onClick="select_new('addclass2','<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a>
                         </div> 
                    <?php } ?>
                    </div>
                </div>
              </td>
              </tr>
			<tr class="keywords_sum">
            <th class="key_wid" align="right">�����С��</th>
            <td><input class="key_input_text" type="text" id="onesize" name="size" size="20" value="" /><span class="admin_web_tip">����12px</span></td>
            </tr>
			<tr class="keywords_sum">
            <th class="key_wid" align="right">������ɫ��</th>
            <td>
            <input class="input-text color" readonly type="text" id="onecolor" name="color" size="20" value="" /></td>
            </tr>
			<tr class="keywords_sum">
            <th class="key_wid" align="right">�Ƿ�Ӵ֣�</th>
            <td>   <div class="admin_examine_right">
            <label><span class="admin_examine_table_s"><input type="radio" name="bold" value="0" id="onebold_0">��</span></label>
            <label><span class="admin_examine_table_s"><input type="radio" name="bold" value="1" id="onebold_1">�� </span></label>
            </div>
            
            </td></tr>
			<tr class="keywords_sum">
            <th class="key_wid" align="right">�Ƿ��Ƽ���</th>
            <td> <div class="admin_examine_right">
            <label><span class="admin_examine_table_s"><input type="radio" name="tuijian" value="0" id="onetuijian_0">��</span></label>
            <label><span class="admin_examine_table_s"><input type="radio" name="tuijian" value="1" id="onetuijian_1">��</span></label>
            </div>
             </td>
            </tr>
			<tr class="keywords_sum">
            <th class="key_wid" align="right">����������</th>
            <td><input class="key_input_text" type="text" id="num" name="num" size="10" value="" /><span class="admin_web_tip">������ǰС��</span></td>
            </tr>
			<tr style="text-align:center;margin-top:10px"><td colspan='2' > <input type="submit"  value='ȷ��' class="admin_examine_bth">
          &nbsp;&nbsp;<input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='ȡ��'></td></tr>
		</table>
        <input type="hidden" name="id" id="id" value="" />
      </form>
    </div>
</div>



<div class="infoboxp"> 
<div class="infoboxp_top_bg"></div>
<div class="admin_Filter">
	<span class="complay_top_span fl">�ؼ��ֹ���</span>	
    <form action="index.php" name="myform" method="get">
      <input name="m" value="admin_keyword" type="hidden"/>
	  <input type="hidden" name="check" value="<?php echo $_GET['check'];?>
"/>
	  <div class="admin_Filter_span">�������ͣ�</div>
	  	  <div class="admin_Filter_text formselect"  did='dtype'>
		  <input type="button" value="<?php if ($_GET['type']) {
echo $_smarty_tpl->tpl_vars['keywordarr']->value[$_GET['type']];
} else { ?>��ѡ��<?php }?>" class="admin_Filter_but"  id="btype"> 
		  <input type="hidden" id='type' value="<?php echo $_GET['type'];?>
" name='type'>
		  <div class="admin_Filter_text_box" style="display:none" id='dtype'>
			  <ul>
			  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['keywordarr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			  <li><a href="javascript:void(0)" onClick="formselect('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
','type','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a></li>
			  <?php } ?>
			  </ul>  
		  </div>
		  </div>
		  <input class="admin_Filter_search"  type="text" name="keyword"  size="25" style="float:left">
		  <input class="admin_Filter_bth" type="submit" name="news_search" style="cursor:pointer;" value="����"/>
		  <span class='admin_search_div'>
			  <div class="admin_adv_search"><div class="admin_adv_search_bth">�߼�����</div></div>   
		  </span>
    </form>  
	<a href="javascript:void(0)" onClick="keywords('','','','','','','','')" class="admin_infoboxp_tj">��ӹؼ���</a>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 
<div class="table-list">
  <div class="admin_table_border">
    <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
    <form action="index.php?m=admin_keyword&c=del" name="myform" method="post"  target="supportiframe" id='myform'>
    <input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      <table width="100%">
        <thead>
          <tr class="admin_table_top">
            <th width="50"><label for="chkall"><input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/></label></th>
            <th align="left">
			<?php if ($_GET['t']=="id"&&$_GET['order']=="asc") {?>
			<a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'id','m'=>'admin_keyword','untype'=>'order,t'),$_smarty_tpl);?>
">���<img src="images/sanj.jpg"/></a>
            <?php } else { ?>
            <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'id','m'=>'admin_keyword','untype'=>'order,t'),$_smarty_tpl);?>
">���<img src="images/sanj2.jpg"/></a>
            <?php }?>
			</th>
            <th align="left" width="20%">���Źؼ���</th>
            <th align="left">�ؼ�������</th>
            <th align="left">
			<?php if ($_GET['t']=="num"&&$_GET['order']=="asc") {?>
			<a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'num','m'=>'admin_keyword','untype'=>'order,t'),$_smarty_tpl);?>
">��������<img src="images/sanj.jpg"/></a>
            <?php } else { ?>
            <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'num','m'=>'admin_keyword','untype'=>'order,t'),$_smarty_tpl);?>
">��������<img src="images/sanj2.jpg"/></a>
            <?php }?>
			</th>
            <th align="left">�Ӵ�</th>
            <th align="left">�Ƽ�</th>
            <th align="left">���</th>
            <th align="left" class="admin_table_th_bg" width="80">����</th>
          </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars["type"] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['type'], null, 0);?>
        <tr id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
          <td align="center"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
          <td><span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span></td>
          <td align="left" class="td1"><font color="#<?php echo $_smarty_tpl->tpl_vars['v']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['key_name'];?>
</font></td>
          <td  align="left"><?php echo $_smarty_tpl->tpl_vars['keywordarr']->value[$_smarty_tpl->tpl_vars['v']->value['type']];?>
</td>
          <td  align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['num'];?>
</td>
          <td id="bold<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['bold']=="1") {?><a href="javascript:void(0);" onClick="rec_up('index.php?m=admin_keyword&c=recup','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','0','bold');"><img src="../config/ajax_img/doneico.gif"></a><?php } else { ?><a href="javascript:void(0);" onClick="rec_up('index.php?m=admin_keyword&c=recup','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','1','bold');"><img src="../config/ajax_img/errorico.gif"></a><?php }?></td>
          <td id="tuijian<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['tuijian']=="1") {?><a href="javascript:void(0);" onClick="rec_up('index.php?m=admin_keyword&c=recup','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','0','tuijian');"><img src="../config/ajax_img/doneico.gif"></a><?php } else { ?><a href="javascript:void(0);" onClick="rec_up('index.php?m=admin_keyword&c=recup','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','1','tuijian');"><img src="../config/ajax_img/errorico.gif"></a><?php }?></td>
          <td id="check<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['check']=="1") {?><a href="javascript:void(0);" onClick="rec_up('index.php?m=admin_keyword&c=recup','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','0','check');"><img src="../config/ajax_img/doneico.gif"></a><?php } else { ?><a href="javascript:void(0);" onClick="rec_up('index.php?m=admin_keyword&c=recup','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','1','check');"><img src="../config/ajax_img/errorico.gif"></a><?php }?></td>
          <td><span style="cursor:pointer;" onClick="keywords('<?php echo $_smarty_tpl->tpl_vars['v']->value['key_name'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['color'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['size'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['bold'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['tuijian'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['num'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="admin_cz_bj">�޸�</span> | 
           <a href="javascript:void(0)"  class="admin_cz_sc" onClick="layer_del('ȷ��Ҫɾ����', 'index.php?m=admin_keyword&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');">ɾ��</a></td>
        </tr>
        <?php } ?>
        <tr style="background:#f1f1f1;">
          <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
          <td colspan="3" >
          <label for="chkAll2">ȫѡ</label>&nbsp;
          <input class="admin_submit4"  type="button" name="delsub" value="ɾ����ѡ"  onclick="return really('del[]')"/>
          <input class="admin_submit4" type="button" name="delsub" value="�������" onClick="audall('del[]');" />
          <input class="admin_submit4" type="button" name="delsub" value="�Ӵ�" onClick="addbold('del[]');" />
          <input class="admin_submit4" type="button" name="delsub" value="�Ƽ�" onClick="recommend('del[]');" />
          <input class="admin_submit4" type="button" name="delsub" value="�޸�����" onClick="edittype('del[]');" /></td>
          <td colspan="5" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
        </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
</div>
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['keywordarr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<input class="hiddentype<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" type="hidden" name="delsub" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" />
<?php } ?>
</body>
</html><?php }} ?>
