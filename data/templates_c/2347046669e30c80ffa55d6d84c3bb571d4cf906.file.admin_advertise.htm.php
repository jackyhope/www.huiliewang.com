<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-25 17:53:43
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_advertise.htm" */ ?>
<?php /*%%SmartyHeaderCode:13492772235b07dd27a7a0c2-52062618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2347046669e30c80ffa55d6d84c3bb571d4cf906' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_advertise.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13492772235b07dd27a7a0c2-52062618',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'nclass' => 0,
    'class' => 0,
    'adv' => 0,
    'pytoken' => 0,
    'linkrows' => 0,
    'key' => 0,
    'v' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b07dd27b0fa52_03530097',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b07dd27b0fa52_03530097')) {function content_5b07dd27b0fa52_03530097($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
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
> 
function check_type(id,value){
	if(value=="1"){
		var val = "0";
	}else{
		var val="1";
	}
	$.post("index.php?m=advertise&c=ajax_check",{id:id,val:val,pytoken:$('#pytoken').val()},function(data){
		html = "<a href=\"javascript:void(0);\" onClick=\"check_type("+id+","+val+");\" >"+data+"</a>";
		$("#"+id).html(html);
	});
} 
function audall2(status)
{
	var codewebarr="";
	$(".check_all:checked").each(function(){ 
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg("����δѡ���κ���Ϣ��",2,8);	return false;
	}else{
		$("input[name=jobid]").val(codewebarr);
 		$.layer({
			type : 1,
			title :'��������', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['270px','180px'],
			page : {dom :"#infobox2"}
		}); 		
	}
}
$(document).ready(function() {
	$(".preview").hover(function(){  
		var pic_url=$(this).attr('url');
		layer.tips("<img src="+pic_url+" style='max-width:380px'>", this, {
			guide:3,
			style: ['background-color:#5EA7DC; color:#fff;top:-7px;left:-20px', '#5EA7DC']
		});
		$(".xubox_layer").addClass("xubox_tips_border");
	},function(){layer.closeTips();});  
});
$(document).ready(function(){
	$(".job_name").hover(function(){
		var job_name=$(this).attr('v'); 
		if($.trim(job_name)!=''){
			layer.tips(job_name, this, {guide: 1, style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC']}); 
			$(".xubox_layer").addClass("xubox_tips_border");
		} 
	},function(){
		var job_name=$(this).attr('v'); 
		if($.trim(job_name)!=''){
			layer.closeTips();
		} 
	}); 
})
<?php echo '</script'; ?>
>
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" /> 
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<title>��̨����</title>
</head>
<body class="body_ifm">
<div id="wname"  style="display:none; width:350px; "> 
	<div style="height: 160px;" class="job_box_div">  
	   <div class="job_box_inp">
		<table class="table_form "style="width:100%">
			<tr ><td  class='ui_content_wrap' style="width:300px;">����(CTRL+C)�������ݲ���ӵ�ģ����</td></tr> 
			<tr><td><input type="text" name="position" id='copy_url' class="input-text" size='45' style="width:310px;"/></td></tr> 
		</table> 
	   </div>
	</div>
</div> 
<div class="infoboxp"> 
<div class="infoboxp_top_bg"></div>
    <div class="admin_Filter">
		<span class="complay_top_span fl">������</span> 
		<form action="index.php" name="myform" method="get">
		<input name="m" value="advertise" type="hidden"/> 
		  <span class="admin_Filter_span"> ������</span> 
		  <div class="admin_Filter_text_big formselect" style="width:260px;"  did='dclass_id'>
		  <input type="button" value="<?php if ($_GET['class_id']=='1'||$_GET['class_id']=='') {?>����<?php } else {
echo $_smarty_tpl->tpl_vars['nclass']->value[$_GET['class_id']];
}?>" class="admin_Filter_but_big admin_Filter_but_big_260" style="width:260px;"  id="bclass_id">
		  <input type="hidden" id='class_id' value="<?php echo $_GET['class_id'];?>
" name='class_id'>
		  <div class="admin_Filter_text_box" style="display:none;width:258px;height:230px;top:31px; overflow:auto; overflow-x:hidden" id='dclass_id'>
			  <ul>
			  <?php  $_smarty_tpl->tpl_vars['adv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['adv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['class']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['adv']->key => $_smarty_tpl->tpl_vars['adv']->value) {
$_smarty_tpl->tpl_vars['adv']->_loop = true;
?>
			  <li><a href="javascript:void(0)" onClick="formselect('<?php echo $_smarty_tpl->tpl_vars['adv']->value['id'];?>
','class_id','<?php echo $_smarty_tpl->tpl_vars['adv']->value['class_name'];?>
')"><?php echo $_smarty_tpl->tpl_vars['adv']->value['class_name'];?>
</a></li>
			  <?php } ?> 
			  </ul>  
		  </div>
		</div> 
		<input class="admin_Filter_search" placeholder="������Ҫ�����Ĺؼ���" type="text" name="name"  size="25" style="float:left">
		<input  class="admin_Filter_bth"  type="submit" name="comquestion" value="����"/>
		</form> 
		<span class='admin_search_div'>
		  <div class="admin_adv_search"><div class="admin_adv_search_bth">�߼�����</div></div>  
		   
		</span> 
  		<a href="index.php?m=advertise&c=ad_add" class="admin_infoboxp_tj"> ��ӹ��</a>        
		<a href="javascript:void(0)" onClick="layer_del('','index.php?m=advertise&c=cache_ad')" class="admin_infoboxp_nav admin_infoboxp_gxhc">���¹�滺��</a>
   </div>
     <?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
  
 
<div class="table-list">
<div class="admin_table_border">
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
<form action="" name="myform" method="get" id='myform' target="supportiframe">
    <input type="hidden" value="advertise" name="m">
    <input type="hidden" value="del" name="c">
 <input type="hidden" id="pytoken" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
<table width="100%">
	<thead>
			<tr class="admin_table_top">
             <th><label for="chkall"><input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/></label></th>
			<th align="center">���</th>
			<th align="left" width="150">���λ����</th>
             <th align="left" width="80">ʹ�÷�Χ</th>
             <th align="left" width="200">������</th>
              <th align="center">�����</th>
              
            <th align="center">����</th>
            <th align="center">����ʱ��</th>
            <th align="center">����</th>
			<th align="center" width="100">���ô���</th>
            <th align="center">״̬</th>
			<th class="admin_table_th_bg" align="center">����</th>
		</tr>
	</thead>
	<tbody>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['linkrows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <tr align="left"<?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
     <td align="center"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="check_all"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
	 <td align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
    	<td align="left" class="td1"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['ad_name'];?>
</span></td>
		<td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['d_title'];?>
</td>
        <td align="left" class="ud"><?php echo $_smarty_tpl->tpl_vars['v']->value['class_name'];?>
</td>
        <td align="center" class="ud"><?php echo $_smarty_tpl->tpl_vars['v']->value['hits'];?>
</td>
        
        <td  align="center" class="ud"><?php echo $_smarty_tpl->tpl_vars['v']->value['ad_typename'];?>
</td>
        <td class="ud" align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['time_end'];?>
</td>
        <td class="ud" align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
</td>
    	<td class="ud" align="center"> 
			<?php if ($_smarty_tpl->tpl_vars['v']->value['is_end']=='1') {?>
				����ѹ���
			<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['is_open']=='0') {?>
				�����ͣ��
			<?php } else { ?> 
        	
            <a href="index.php?m=advertise&c=ad_preview&ad_class=<?php echo $_smarty_tpl->tpl_vars['v']->value['class_id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"class="admin_cz_yl">����</a>
		<?php }?>			
        </td>
        <td align="center" class="ud" id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><a href="javascript:void(0);" onClick="check_type(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['v']->value['is_check'];?>
);" ><?php if ($_smarty_tpl->tpl_vars['v']->value['is_end']=='1') {?><font color="red">�ѹ���</font><?php } elseif ($_smarty_tpl->tpl_vars['v']->value['is_check']=="1") {?><font color="green">�����</font><?php } else { ?><font color="EE6723">δ���</font><?php }?></a></td>
        <td align="center"> <a href="index.php?m=advertise&c=ad_preview&ad_class=<?php echo $_smarty_tpl->tpl_vars['v']->value['class_id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"class="admin_cz_yl">Ԥ��</a> | 
        <a href="index.php?m=advertise&c=ad_add&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="admin_cz_bj">�޸�</a> | 
        <a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫɾ����', 'index.php?m=advertise&c=del_ad&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_cz_sc">ɾ��</a>
        </td>
  </tr>
  <?php } ?>
  <tr>
    <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
    <td colspan="3" >
    <label for="chkAll2">ȫѡ</label>&nbsp;
        <input type="button" onclick="return really('del[]')" value="ɾ����ѡ" name="delsub" class="admin_submit4">
<input class="admin_submit4" type="button" name="delsub" value="��������" onClick="audall2('0');" /></td>
  <td colspan="8" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td></tr>
  </tbody>
  </table>
</form>
</div>
</div>
</div>
<div id="infobox2" style="display:none;">
	<div class="" >
	<div class="admin_com_t_box"> 
      <form action="index.php?m=advertise&c=ctime" target="supportiframe" method="post" id="formstatus"> 
			<div class="admin_com_smbox_list"><span class="admin_com_smbox_span">�ӳ�ʱ�䣺</span>
            <input class="admin_com_smbox_text" value="" name="endtime" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"> <span class="admin_com_smbox_list_s">��</span>
                </div>
             <div class="admin_com_smbox_opt"><input type="submit"  value='ȷ��' class="admin_examine_bth"><input type="button"  onClick="layer.closeAll();" class="admin_examine_bth_qx" value='ȡ��'></div>
		 <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input name="jobid" value="0" type="hidden"> 
      </form>
    </div>
  </div> 
</div>
</body>
</html><?php }} ?>
