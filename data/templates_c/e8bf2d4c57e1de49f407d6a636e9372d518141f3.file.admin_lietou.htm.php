<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-05 18:04:21
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_lietou.htm" */ ?>
<?php /*%%SmartyHeaderCode:5122002405b3ded25a27a81-20291333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8bf2d4c57e1de49f407d6a636e9372d518141f3' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_lietou.htm',
      1 => 1519262062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5122002405b3ded25a27a81-20291333',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'where' => 0,
    'ratingarr' => 0,
    'key' => 0,
    'ratlist' => 0,
    'rows' => 0,
    'v' => 0,
    'source' => 0,
    'dpclass_name' => 0,
    'email_promiss' => 0,
    'moblie_promiss' => 0,
    'pagenav' => 0,
    'guweninfo' => 0,
    'gwlist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b3ded25b32610_11527884',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3ded25b32610_11527884')) {function content_5b3ded25b32610_11527884($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.searchurl.php';
if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="./js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  DD_belatedPNG.fix('.png,.admin_infoboxp_tj,');
<?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/admin_public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/show_pub.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$(document).ready(function () {
    $('body').click(function (evt) {
		if($(evt.target).parents("#gw_name").length==0 && evt.target.id != "gw_name") {
		   $('#gw_select').hide();
		}
   });
})
function changeinput(uid,order){
	$("#"+uid).html("<input type='text'  align=\"middle\" size=\"3\" value='"+order+"' id='input"+uid+"' onBlur=\"changeorder('"+uid+"','"+order+"');\">");
	$("#input"+uid).focus();
}
function audall(){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //���ڸ�ѡ��һ��ѡ�е��Ƕ��,���Կ���ѭ�����
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg('����δѡ����Ҫ��˵��û���', 2, 8);	return false;
	}else{
		$("input[name=uid]").val(codewebarr);
 		$("#statusbody").val('');
		$("input[name='status']").attr('checked',false);
		$.layer({
			type : 1,
			title :'��ͷ�û����', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['350px','220px'],
			page : {dom :"#infobox2"}
		});
	}
}
function changeorder(uid,order){
	var norder = $("#input"+uid).val();
	var pytoken = $("#pytoken").val();
	if(order!=norder){
		$.post("index.php?m=admin_lietou&c=changeorder",{uid:uid,order:norder,pytoken:pytoken},function(data){});

	}
	$("#"+uid).html("<p onClick=\"changeinput('"+uid+"','"+norder+"');\">"+norder+"</p>");
}
$(function(){
	$("#m_lock").click(function(){
  		var uid=$("#m_uid").val();
		var ip=$("#m_regip").val();
		var pytoken=$("#pytoken").val();
		var status=$("#m_status").val();
		$("#status_"+status).attr("checked",true);
		$("input[name=statusip]").val(ip);
		$.post("index.php?m=admin_lietou&c=lockinfo",{uid:uid,pytoken:pytoken},function(msg){
			$("input[name=uid]").val(uid);
			$("#lock_info").val(msg);
			status_div('�����û�','420','220');
		});
	});
	$("#m_check").click(function(){
		var uid=$("#m_uid").val();
		var status=$("#m_status").val();
		$("#status"+status).attr("checked",true);
		var pytoken=$("#pytoken").val();
		$("input[name=uid]").val(uid);
 		$.post("index.php?m=admin_lietou&c=lockinfo",{uid:uid,pytoken:pytoken},function(msg){
			$("#statusbody").val(msg);
			$.layer({
				type : 1,
				title :'��ͷ�û����', 
				closeBtn : [0 , true],
				border : [10 , 0.3 , '#000', true],
				area : ['350px','220px'],
				page : {dom :"#infobox2"}
			});
		});
	});
	$("#m_yyzz").click(function(){				
		var url = $('#m_yyzzurl').val();				
		if(url==""){
			parent.layer.msg('����ͷδ�ϴ�Ӫҵִ�գ�', 2, 8);
		}else{			
			$(".job_box_div").html("<img src='"+url+"' style='width:250px;height:100px' />");
			$("#preview_url").attr("href",url);
			$.layer({
				type : 1,
				title : '�鿴ͼƬ',
				closeBtn : [0 , true],  
				offset: ['80px', ''],
				border : [10 , 0.3 , '#000', true],
				area : ['350px','auto'],
				page : {dom : '#preview'}
			}); 						
		}		
	});
	//������
	$("#m_sendmsg").click(function(){
		
		var linktel = $('#m_linktel').val();
		if(!linktel){
			parent.layer.msg('����ͷδ��д��ϵ�ֻ���', 2, 8);
		}else{
			send_moblie(linktel);
		}
		
	});
	//���ʼ�
	$("#m_sendemail").click(function(){
		
		var linkmail = $('#m_linkmail').val();
		if(!linkmail){
			parent.layer.msg('����ͷδ��д��ϵ���䣡', 2, 8);
		}else{
			send_email(linkmail);
		}
		
	});
	//ϵͳ��Ϣ
	$("#m_sendsysmsg").click(function(){
		
		var user = $('#m_user').val();
		send_sysmsg(user);
	});

	$(".comrating").click(function(){
  		var uid=$(this).attr("data-uid");
		var pytoken=$("#pytoken").val();
		$.post("index.php?m=admin_lietou&c=getstatis",{uid:uid,pytoken:pytoken},function(data){
			if(data){
				var dataJson = eval("(" + data + ")"); 
			
				$('#job_num').val(dataJson.job_num);
				$('#down_resume').val(dataJson.down_resume);
				$('#invite_resume').val(dataJson.invite_resume);
				$('#breakjob_num').val(dataJson.breakjob_num);
				$('#part_num').val(dataJson.part_num);
				$('#breakpart_num').val(dataJson.breakpart_num);
				$('#zph_num').val(dataJson.zph_num);
				//$('#xcx_num').val(dataJson.xcx_num);
				$('#oldetime').val(dataJson.vip_etime);
				$('#vipetime').text(dataJson.vipetime);
				$('#pay').val(dataJson.pay);
				$('#integral').val(dataJson.integral);
				$('#ratuid').val(uid);
				$("#com_rating_name").val(dataJson.rating_name);
				$("#com_rating_val").val(dataJson.rating);
				//var ratingname = $("#com_rating_name").val(dataJson.rating_name);
				$('#rating_name').val(dataJson.rating_name);
				$.layer({
					type : 1,
					title :'��ͷ��Ա�ȼ��޸�', 
					closeBtn : [0 , true],
					border : [10 , 0.3 , '#000', true],
					area : ['710px','390px'],
					offset: ['20px', ''],
					page : {dom :"#comrating"}
				});
			}else{
				parent.layer.msg('�û���Ϣ��ȡʧ�ܣ�', 2, 8);	return false;
			}
		});
	});
});
function Export(){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //���ڸ�ѡ��һ��ѡ�е��Ƕ��,���Կ���ѭ�����
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg('����δѡ����Ҫ�����û���', 2, 8);	return false;
	}else{
		$("input[name=uid]").val(codewebarr);
		add_class('ѡ�񵼳��ֶ�','650','300','#export','');
	}
}
function check_xls(){
	var type="";
	$(".type:checked").each(function(){ //���ڸ�ѡ��һ��ѡ�е��Ƕ��,���Կ���ѭ�����
		if(type==""){type=$(this).val();}else{type=type+","+$(this).val();}
	});
	if(type==""){
		layer.msg("��ѡ�񵼳��ֶΣ�",2,8);return false;
	}
	setTimeout(function(){$('.myform').submit()},0);
	layer.closeAll();
}
function checkguwenall(url){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //���ڸ�ѡ��һ��ѡ�е��Ƕ��,���Կ���ѭ�����
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg('����δѡ���κ���Ϣ��', 2, 8);	return false;
	}else{
		checkguwen(codewebarr,url);
	}
}

function guwencheck(){
   var gw=$("#gw_val").val();
   if(!gw){
       layer.msg('��ѡ�����Ĺ���',2,8);return false;
   }
}
function searchs(id){
	var pytoken = $('#pytoken').val();
	var keyword = $.trim($('#gwkeyword').val());
	if(!keyword){
		parent.layer.msg('�����������ؼ��ʣ�', 2, 8);return false;
	}
	var i=layer.load('ִ���У����Ժ�...',0);
	$.post("/index.php?m=ajax&c=guwen",{pytoken:pytoken,keyword:keyword},function(data){
	    layer.close(i);
		if(data==0){
			parent.layer.msg('�����������ؼ��ʣ�', 2, 8);return false;
		}else if(data==1){
			parent.layer.msg('δ��ѯ��������ݣ�', 2, 8);return false;
		}else{
			$('#gw_select').html(data);
			$('#gw_select').show();
		}
	});
}
function checkguwen(id){ 
    $('#gwuid').val(id);
	$.layer({
		type : 1,
		title :'�������', 
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['350px','260px'],
		offset: ['20px', ''],
		page : {dom :"#infoguwen"}
	});
}
//�ڹ�������������
function resetpassword(){
	var pytoken = $('#pytoken').val();
	var resetpassword=$("#m_resetpassword").val();//ͨ�������ȡ�û����Ƶ�ֵ
	var uid=$("#m_uid").val();//ͨ�������ȡ�û����Ƶ�IDֵ
	parent.layer.confirm("ȷ��Ҫ����������",function(){//���ó���
		$.get("index.php?m=admin_lietou&c=reset_lietoupassword&uid="+uid+"&pytoken="+pytoken,function(data){
			parent.layer.closeAll();
			parent.layer.alert("��ͷ��Ա��"+resetpassword+"�����Ѿ�����Ϊ123456��",9);return false
		});
			
	});
}

 
function manage(comid,url){
	var pytoken=$("#pytoken").val();
	$('#m_comid').html(comid);
    $('#m_uid').val(comid);
    $('#m_home').attr('href',url);
    $('#m_taocan').attr('data-uid',comid);
    $('#m_zengzhi').attr('data-uid',comid);
	$('#m_center').attr('href','index.php?m=admin_lietou&c=Imitate&uid='+comid);
	$('#m_integral').attr('href','index.php?m=admin_lietou&c=mintegral&comid='+comid);
	$('#m_order').attr('href','index.php?m=admin_lietou&c=morder&comid='+comid);
	$('#m_down').attr('href','index.php?m=admin_lietou&c=mdown&comid='+comid);
	$('#m_apply').attr('href','index.php?m=admin_lietou&c=mapply&comid='+comid);
	$('#m_invite').attr('href','index.php?m=admin_lietou&c=minvite&comid='+comid);
	$('#m_job').attr('href','index.php?m=admin_lietou&c=mjob&comid='+comid);
	$('#m_show').attr('href','index.php?m=admin_lietou&c=mshow&comid='+comid);
	$('#m_comtpl').attr('href','index.php?m=admin_lietou&c=mcomtpl&comid='+comid);
	$('#m_memberlog').attr('href','index.php?m=admin_lietou&c=member_log&comid='+comid);
	$('#m_tongji').attr('href','index.php?m=admin_lietou&c=Imitate&uid='+comid+'&type=tongji');
	$('#m_tongji').attr('target','_blank');
	$('#m_addjob').attr('href','index.php?m=admin_lietou_job&c=show&uid='+comid);
	$('#m_guwen').attr('href',"javascript:checkguwen('"+comid+"');");
	
	var i=layer.load('���Ժ�...',0);
	$.post("index.php?m=admin_lietou&c=getinfo",{comid:comid,pytoken:pytoken},function(data){
		layer.close(i);
		if(data){
			var comdata = eval("(" + data + ")"); 
			if(comdata.name!=""){
				$('#m_name').html(comdata.name);
			}else{
				$('#m_name').html("��δ��������");
			}
			$('#m_username').html(comdata.username);
//			if(comdata.linkman!=""){
//				$('#m_linkman').html("����ϵ�ˡ���"+comdata.linkman+"&nbsp;&nbsp;");
//			}else{
//				$('#m_linkman').html("����ϵ�ˡ���"+"������ϵ��");
//			}
			if(comdata.phone!=""){
				$('#m_phone').html("���ֻ�����"+comdata.phone+"&nbsp;&nbsp;");
			}else{
				$('#m_phone').html("���ֻ�����"+"������ϵ�ֻ�");
			}
			if(comdata.linkmail!=""){
				$('#m_email').html("�����䡿��"+comdata.linkmail);
			}else{
				$('#m_email').html("�����䡿��"+"������ϵ����");
			}
			if(comdata.adviser!=""){
				$('#m_adviser').html(comdata.adviser);
			}else{
				$('#m_adviser').html("����ͷ��δ�������");
			}
			$('#m_status').val(comdata.status);
			$('#m_regip').val(comdata.reg_ip);
			$('#m_rating').val(comdata.rating);
			$('#m_info').attr('href','index.php?m=admin_lietou&c=edit&id='+comid+'&rating='+comdata.rating);
			$('#m_password').attr('href','index.php?m=admin_lietou&c=edit&id='+comid+'&rating='+comdata.rating);
			$('#m_yyzzurl').val(comdata.yyzzurl);
			$('#m_linktel').val(comdata.linktel);
			$('#m_linkmail').val(comdata.linkmail);
			$('#m_user').val(comdata.username);
			$('#m_resetpassword').val(comdata.username);
			
		    $.layer({
				type : 1,
				title :'��ͷ����', 
				closeBtn : [0 , true],
				border : [10 , 0.3 , '#000', true],
				area : ['650px','414px'],
				offset: ['20px', ''],
				page : {dom :"#manage"}
			});
		}
	});
}
<?php echo '</script'; ?>
>
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<title>��̨����</title>
</head>
<body class="body_ifm">
<!--��������-->
<div id="manage" class="" style="width:650px; display:none;">
<div class="admin_usertck_box">
<div class="admin_userinfo_box">
<div class="admin_userinfo_box_username">���û�������<em id="m_username"></em> <span class="admin_userinfo_box_useruid">���û�id����<em id="m_comid"></em></span><a href="###" class="admin_userinfo_box_zx" id="m_center" target="_blank">�����û�����>></a><a href="" class="admin_userinfo_box_zx" id="m_home" target="_blank">Ԥ����ͷ��ҳ>></a></div>
<!--<div class="admin_userinfo_box_qyname">���������󡿣�<span class="admin_userinfo_box_qyname_s" id="m_name"></span><span class="admin_userinfo_box_useruid">��������������<em id="m_adviser"></em></span></div>-->
</div>
<div class="admin_operation_box">
<div class="admin_operation_list">
<span class="admin_operation_list_name">ҵ�����</span>
<a href="###" class="admin_operation_list_a" id="m_integral">���ֹ���</a>
<a href="javascript:void(0);" class="admin_operation_list_a comrating" id="m_taocan">�ײ͹���</a>
<a href="###" class="admin_operation_list_a" id="m_order">��ֵ/����</a>
<!--<a href="javascript:void(0);" class="admin_operation_list_a comrating" id="m_zengzhi">��ֵ����</a>-->
<a href="###" class="admin_operation_list_a" id="m_down">���ؼ���</a>
<a href="###" class="admin_operation_list_a" id="m_apply">�յ��ļ���</a>
<!--<a href="###" class="admin_operation_list_a" id="m_invite">��������</a>-->
</div>
<div class="admin_operation_list">
<span class="admin_operation_list_name">���Ϲ���</span>
<a href="###" class="admin_operation_list_a" id="m_job">ְλ����</a>
<a href="###" class="admin_operation_list_a" id="m_info">��ͷ����</a>
<!--<a href="javascript:void(0);" class="admin_operation_list_a" id="m_yyzz">Ӫҵִ��</a>-->
<!--<a href="###" class="admin_operation_list_a" id="m_show">��ͷ����</a>-->
<!--<a href="###" class="admin_operation_list_a" id="m_comtpl">��ͷģ��</a>-->
<a href="###" class="admin_operation_list_a" id="m_password">�޸�����</a>
</div>
<div class="admin_operation_list" style="display: none;">
<span class="admin_operation_list_name">����ͳ�ƣ�</span>
<a href="###" class="admin_operation_list_a" id="m_tongji">��ƸЧ��</a>
<a href="###" class="admin_operation_list_a" id="m_memberlog">��Ա��Ϊ��־</a>
</div>
<div class="admin_operation_list" style="display: none">
<span class="admin_operation_list_name">��ϵ��Ա��</span>
<a href="javascript:void(0);" class="admin_operation_list_a" id="m_sendmsg">���Ͷ���</a>
<a href="javascript:void(0);" class="admin_operation_list_a" id="m_sendemail">�����ʼ�</a>
</div>
<div class="admin_operation_list" style="height:25px;line-height:25px;"><span class="admin_operation_list_name">��ϵ��ʽ��</span><em id="m_linkman"></em><em id="m_phone"></em><em id="m_email"></em></div>

<div class="admin_operation_but">
 
<a href="javascript:void(0)"  class="admin_operation_but_a" id="m_resetpassworde" onClick="resetpassword();">��������</a>


<a href="###" class="admin_operation_but_a" id="m_addjob">���ְλ</a>
<a href="javascript:void(0);" class="admin_operation_but_a" id="m_lock">������ͷ</a>
<!--a href="javascript:void(0);" class="admin_operation_but_a" id="m_delcom">ɾ����ͷ</a-->
<a href="javascript:void(0);" class="admin_operation_but_a" id="m_check">�����ͷ</a>
<!--<a href="javascript:void(0);" class="admin_operation_but_a" id="m_guwen">�������</a>-->
</div>

<input type="hidden" id="m_yyzzurl" value=""/>
<input type="hidden" id="m_linktel" value=""/>
<input type="hidden" id="m_linkmail" value=""/>
<input type="hidden" id="m_resetpassword" value=""/>

<input type="hidden" id="m_user" value=""/>
<input type="hidden" id="m_uid" value=""/>
<input type="hidden" id="m_status" value=""/>
<input type="hidden" id="m_regip" value=""/>
<input type="hidden" id="m_rating" value=""/>
</div>
</div>
</div>
<!--�������� end-->
<div id="preview"  style="display:none;width:350px ">
  <div style="height:170px; overflow:auto;width:350px;" >
	<table cellspacing='1' cellpadding='1' class="admin_examine_table">
     <tr>
     <td><div style="width:90px; text-align:center">Ӫҵִ�գ�</div></td>
   <td align="center"><div class="job_box_div" ></div>  </td></tr>
  <tr> <td colspan="2"><div style="width:100%;text-align:center; padding-top:10px;"><a target="_blank" href="" id='preview_url' style="padding:5px 15px; background:#f60;color:#fff">�鿴ԭͼ</a></div></td>
   </tr>
    </table>
  </div>
</div>
<div id="export" style="display:none;">
	<div style=" margin-top:10px;">
    <div>
      <form action="index.php?m=admin_lietou&c=xls" target="supportiframe" method="post" id="formstatus" class="myform">
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      <input type="hidden" name="where" value="<?php echo $_smarty_tpl->tpl_vars['where']->value;?>
"><input name="uid" value="0" type="hidden">
			<div class="admin_resume_dc">
           <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="uid"> ��ͷUID</span></label>
            <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="name"> ��ͷ����</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="hy"> ������ҵ</span></label>
             <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="pr"> ��ͷ����</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="rating"> ��Ա�ȼ�</span></label>
             <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="provinceid"> ʡ</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="cityid"> ��</span></label>
            <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="mun"> ��ģ</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="sdate"> ����ʱ��</span></label>
              <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="money"> ע���ʽ�</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="address"> ��ͷ��ַ</span></label>
             <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="zip"> �ʱ�</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkman"> ��ϵ��</span></label>
    		<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkjob"> ����ְλ</span></label>
			<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkqq"> ��ϵQQ</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkphone"> �̶��绰</span></label>
		<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linktel"> ��ϵ�ֻ�</span></label>
         <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkmail"> �ʼ�</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="website"> ��ַ</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="rec"> ֪����ͷ</span></label>
			<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="lastdate"> ����ʱ��</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="vip_stime">��Ա��ʼʱ��</span></label>
          </div>
        <div class="admin_resume_dc_sub" style="margin-top:10px;">  
          <input type="button" onClick="check_xls();"  value='ȷ��' class="admin_resume_dc_bth1">
      <input type="button" onClick="layer.closeAll();" class="admin_resume_dc_bth2" value='ȡ��'></div>
	
      </form>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['adminstyle']->value)."/member_send_email.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="status_div"  style="display:none; width: 420px;text-align:center; ">
  <div class="" > 
      <form action="index.php?m=admin_lietou&c=lock" target="supportiframe" method="post" id="formstatus">
        <table cellspacing='1' cellpadding='1' class="admin_examine_table">
          <tr>
             <th width="80">����������</th>
            <td align="left">
        <div class="admin_examine_right" style="width:330px;">
         <label for="status_1"><span class="admin_examine_table_s"><input type="radio" name="status" value="1" id="status_1" >����</span></label>
         <label for="status_2"><span class="admin_examine_table_s"><input type="radio" name="status" value="2" id="status_2">����</span></label>
         <label for="status_3"><span class="admin_examine_table_s" style="width:130px"><input type="radio" name="status" value="3" id="status_3">����������IP����</span></label>
              </div>
              </td>
          </tr>
          <tr>
            <th>����˵����</th>
            <td align="left"><textarea id="lock_info"  name="lock_info" class="admin_explain_textarea" style="width:285px"></textarea></td>
          </tr>
          <tr>
           <td colspan='2' align="center">
            <input type="submit"  value='ȷ��' class="admin_examine_bth">
             <input type="button"class="admin_examine_bth_qx closebutton" value='ȡ��'>
            </td>
          </tr>
        </table>
        <input type="hidden" name="statusip" value="">
		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input name="uid" value="0" type="hidden">
      </form> 
  </div>
</div>
<div id="comrating"  style="display:none; "> 
<div style="width:710px;"> 
	<form action="index.php?m=admin_lietou&c=uprating" target="supportiframe" method="post" id="formstatus">
    	<table cellspacing='1' cellpadding='1' class="table_form contentWrap" width="100%">



        	<tr>
            	<th align="right">��Ա�ȼ���</th>
            	<td align="left">
             	<div class="yun_admin_select_box zindex100"> 
                	<input type="button" value="��ѡ��" class="yun_admin_select_box_text" id="com_rating_name" onClick="select_click('com_rating');">
                  	<input name="rating" type="hidden" id="com_rating_val" value="">
                  <!--�����--> 
                  	<div class="yun_admin_select_box_list_box dn" id="com_rating_select"> 
                  		<?php  $_smarty_tpl->tpl_vars['ratlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ratlist']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ratingarr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ratlist']->key => $_smarty_tpl->tpl_vars['ratlist']->value) {
$_smarty_tpl->tpl_vars['ratlist']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ratlist']->key;
?>
                    	<div class="yun_admin_select_box_list"> 
                    		<a href="javascript:;" onClick="select_rating('com_rating','<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['ratlist']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['ratlist']->value;?>
</a> 
                    	</div>
                    	<?php } ?> 
                    </div>
                </div>
				</td>
				<th align="right" class="comp_hotjob_line" >�˻�<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
��</th>
				<td> 
					<div class="admin_lietou_width220">
						<input type="text" name="integral"  id="integral" size="15" class="admin_lietou_jobtext" value="" />
					</div>
				</td>
			</tr>
			<tr class="admin_table_trbg" >
				<th align="right">��Ա����ʱ�䣺</th>
				<td><p id="vipetime"></p></td>
				<th align="right" class="comp_hotjob_line">�ӳ���Ա��Ч�ڣ�</th>
				<td><input type="text" name="addday"  style="width:40px;" class="admin_lietou_jobtext"> ��</td>
			</tr> 
			
			<tr>
				<th align="right">����ְλ����</th>
				<td><input type="text" name="job_num"  id="job_num" size="15" class="admin_lietou_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
				<th align="right" class="comp_hotjob_line">ˢ��ְλ����</th>
				<td><input type="text" name="breakjob_num"  id="breakjob_num" size="15" class="admin_lietou_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
			</tr>
			<tr class="admin_table_trbg" >
				<th align="right">������ְ����</th>
				<td><input type="text" name="part_num"  id="part_num" size="15"class="admin_lietou_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
				<th align="right"class="comp_hotjob_line">ˢ�¼�ְ����</th>
				<td><input type="text" name="breakpart_num"  id="breakpart_num" size="15" class="admin_lietou_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
			</tr>
			<tr class="admin_table_trbg" >
				<th align="right">ʣ����������</th>
				<td><input type="text" name="down_resume"  id="down_resume" size="15" class="admin_lietou_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
				<th align="right"class="comp_hotjob_line">�������ԣ�</th>
				<td><input type="text" name="invite_resume"  id="invite_resume" size="15"class="admin_lietou_jobtext"onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
			</tr>
			
          
			<tr>
		        <th align="center" colspan="4" style="text-align:center;border-right:0px;">
		        	<input type="submit"  value='ȷ��' class="admin_examine_bth"/>
		        	<input type="button" class="admin_examine_bth_qx closebutton" value='ȡ��' />
		        </th>
		    </tr>
		</table>
		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
		<input type="hidden" name="rating_name" id="rating_name" value="">
		<input type="hidden" name="oldetime" id="oldetime" value="">
        <input name="ratuid" id="ratuid" value="0" type="hidden">
	</form> 
</div>
</div>
<div id="infobox2"  style="display:none; width: 350px; ">  
      <form action="index.php?m=admin_lietou&c=status" target="supportiframe" method="post" id="formstatus" >
       <table cellspacing='1' cellpadding='1' class="admin_examine_table">
          <tr>
            <th  width="80">��˲�����</th>
            <td align="left">
            <div class="admin_examine_right">
            <label for="status0"><span class="admin_examine_table_s"><input type="radio" name="status" value="0" id="status0" >δ���</span></label>
        <label for="status1"><span class="admin_examine_table_s"><input type="radio" name="status" value="1" id="status1" >��ͨ��</span></label>
        <label for="status3"><span class="admin_examine_table_s"><input type="radio" name="status" value="3" id="status3">δͨ��</span></label>
        </div>
        </td>
          </tr>
          <tr>
            <th>���˵����</th>
            <td align="left"><textarea id="statusbody"  name="statusbody" class="admin_explain_textarea"></textarea></td>
          </tr>
          <tr>
            <td colspan='2' align="center">
			
            <input type="submit"  value='ȷ��' class="admin_examine_bth">
             <input type="button" class="admin_examine_bth_qx closebutton" value='ȡ��'>
            </td>
          </tr>
        </table>
		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input name="uid" value="0" type="hidden">
      </form> 
</div>

<div class="infoboxp"> 
<div class="infoboxp_top_bg"></div>
 <form action="index.php" name="myform" method="get" >
<div class="admin_Filter"> 
<input type="hidden" name="m" value="admin_lietou"/>
<input type="hidden" name="status" value="<?php echo $_GET['status'];?>
"/>
<input type="hidden" name="rec" value="<?php echo $_GET['rec'];?>
"/>
<input type="hidden" name="time" value="<?php echo $_GET['time'];?>
"/>
<input type="hidden" name="rating" value="<?php echo $_GET['rating'];?>
"/>
<span class="complay_top_span fl">��ͷ����</span>	
  <div class="admin_Filter_span">�������ͣ�</div>
  <div class="admin_Filter_text formselect" did="dcom_type"> 
  <input type="button" <?php if ($_GET['type']=='1'||$_GET['type']=='') {?> value="��ͷ����" <?php } elseif ($_GET['type']=='2') {?> value="�û�����" <?php } elseif ($_GET['type']=='3') {?> value="��ϵ��" <?php } elseif ($_GET['type']=='4') {?> value="��ϵ�绰" <?php } elseif ($_GET['type']=='5') {?> value="�û�����" <?php } elseif ($_GET['type']=='6') {?> value="�û�ID" <?php }?> class="admin_Filter_but" id="bcom_type">
  		   <input type="hidden" name="type" id="com_type" value="<?php if ($_GET['type']) {
echo $_GET['type'];
} else { ?>1<?php }?>"/><div class="admin_Filter_text_box" style="display:none" id="dcom_type">
			  <!--<ul>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('1','com_type','��ͷ����')">��ͷ����</a></li>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('2','com_type','�û�����')">�û�����</a></li>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('3','com_type','��ϵ��')">��ϵ��</a></li>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('4','com_type','��ϵ�绰')">��ϵ�绰</a></li>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('5','com_type','�û�����')">�û�����</a></li>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('6','com_type','�û�ID')">�û�ID</a></li>-->
			  <!--</ul>  -->
		  </div>
    </div>	
    <input type="text" placeholder="������Ҫ�����Ĺؼ���" name="keyword" class="admin_Filter_search">
	<input type="submit" value="����" class="admin_Filter_bth"/>
	  <div class="admin_search_div" ><div class="admin_adv_search"><div class="admin_adv_search_bth">�߼�����</div></div></div>
       <div class="admin_search_div_tianj" > <a href="index.php?m=admin_lietou&c=add" class="admin_infoboxp_tj">�����ͷ</a> </div>
  </div> 
  </form> 
 <?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="table-list" style="color:#898989">
    <div class="admin_table_border">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php" name="myform" method="get" id='myform' target="supportiframe">
      <input type="hidden" name="pytoken"  id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input name="m" value="admin_lietou" type="hidden"/>
        <input name="c" value="del" type="hidden"/>
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th style="width:20px;"><label for="chkall"><input type="checkbox" id='chkAll' onclick='CheckAll(this.form)'/> </label></th>
              <th> <?php if ($_GET['t']=="uid"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'uid','m'=>'admin_lietou','untype'=>'order,t'),$_smarty_tpl);?>
">�û�ID<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'uid','m'=>'admin_lietou','untype'=>'order,t'),$_smarty_tpl);?>
">�û�ID<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th align="left">��ͷ��/�û���</th>
              <!--<th align="left">�ȼ�/����ʱ��</th>-->
              <!--<th align="left">��ͷ����</th> -->
              <th>��ͷ��֤</th>
              <th>��¼/ע��</th>
              <th>��Դ</th>
              <th>״̬</th>
              <th>���ڲ���/���ŷ���</th>
              <th>��ҵ��</th>
             <th class="admin_table_th_bg">����</th>
            </tr>
          </thead>
          <tbody>
       <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
          <tr align="center" <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
">
            <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"  name='del[]' email='<?php echo $_smarty_tpl->tpl_vars['v']->value['linkmail'];?>
' moblie='<?php echo $_smarty_tpl->tpl_vars['v']->value['linktel'];?>
' onclick='unselectall()' class="check_all" rel="del_chk" /></td>
            <td align="left" class="td1" style="text-align:center;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
</span></td>
            <td  align="left">
            <div class=""><a href="<?php echo smarty_function_url(array('m'=>'lietou','c'=>'show','id'=>$_smarty_tpl->tpl_vars['v']->value['uid']),$_smarty_tpl);?>
" target="_blank" class="admin_com_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a></div>
			<div class=""><a href="index.php?m=admin_lietou&c=Imitate&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a></div></td>
            <td>
			   <?php if ($_smarty_tpl->tpl_vars['v']->value['email_status']==1) {?>
			   <img src="../config/ajax_img/1-1.png" alt="��������֤" class="png">
			   <?php } else { ?>
			   <img src="../config/ajax_img/1-2.png" alt="����δ��֤"class="png"> 
			   <?php }?>

               <?php if ($_smarty_tpl->tpl_vars['v']->value['moblie_status']==1) {?>
			   <img src="../config/ajax_img/2-1.png" alt="�ֻ�����֤"class="png">
			   <?php } else { ?>
			   <img src="../config/ajax_img/2-2.png" title="�ֻ�δ��֤"class="png">
			   <?php }?>
			 </td>
             <td>
			 <?php if ($_smarty_tpl->tpl_vars['v']->value['login_date']) {?>
				<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['login_date'],"%Y-%m-%d");?>

			 <?php } else { ?>
				δ��¼
			 <?php }?>
			 <div class=""><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['reg_date'],"%Y-%m-%d");?>
</div>
			 </td>
             <td>
			 <?php echo $_smarty_tpl->tpl_vars['source']->value[$_smarty_tpl->tpl_vars['v']->value['source']];?>

				
			</td>
             <td>
				<?php if ($_smarty_tpl->tpl_vars['v']->value['status']=='1') {?>
					<span class="admin_com_Audited">�����</span>
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['status']=='2') {?>
					<span class="admin_com_Lock">������</span>
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['status']=='3') {?>
					<span class="admin_com_tg">δͨ��</span>
				<?php } else { ?>
					<span class="admin_com_noAudited">δ���</span>
				<?php }?>
			</td> 
			 
             <td>
                 <?php if ($_smarty_tpl->tpl_vars['v']->value['department']&&$_smarty_tpl->tpl_vars['v']->value['depart']) {?>
                <?php echo $_smarty_tpl->tpl_vars['dpclass_name']->value[$_smarty_tpl->tpl_vars['v']->value['depart']];?>
/<?php echo $_smarty_tpl->tpl_vars['dpclass_name']->value[$_smarty_tpl->tpl_vars['v']->value['department']];?>

                 <?php }?>
			 </td>
            <td>

			<div><a href="javascript:;" onclick="checksite('<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
','index.php?m=admin_lietou&c=checksitedid');" class="admin_lietou_xg_icon"><?php echo $_smarty_tpl->tpl_vars['v']->value['achievement'];?>
</a></div>
			</td>
            <td>
            <a href="javascript:;" onclick="manage('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
','<?php echo smarty_function_url(array('m'=>'lietou','c'=>'show','id'=>$_smarty_tpl->tpl_vars['v']->value['uid']),$_smarty_tpl);?>
')" class="admin_cz_sc">����</a> | 
            <a href="javascript:void(0)"  onclick="layer_del('ȷ��Ҫɾ����', 'index.php?m=admin_lietou&c=del&del=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">ɾ��</a>
            </td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
          <td align="center"><label for="chkall2"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></label></td>
         <td colspan="5" >
         <label for="chkAll2">ȫѡ</label>
          <input class="admin_submit4" type="button" name="delsub" value="�������" onClick="audall();" />
          <?php if ($_smarty_tpl->tpl_vars['email_promiss']->value) {?> <input class="admin_submit4" type="button" value="���ʼ�"  onclick="return confirm_email('ȷ�����ʼ���','email_div')"/><?php }?>
		   <?php if ($_smarty_tpl->tpl_vars['moblie_promiss']->value) {?><input class="admin_submit4" type="button" value="����Ϣ"  onclick="return confirm_email('ȷ������Ϣ��','moblie_div')"/><?php }?>
         <input class="admin_submit4" type="button" name="delsub" value="ɾ����ѡ" onClick="return really('del[]')" />
         <input class="admin_submit2" type="button" name="delsub" value="����" onClick="Export();" />
		 <input class="admin_submit4" type="button" name="delsub" value="����ѡ���վ" onClick="checksiteall('index.php?m=admin_lietou&c=checksitedid');" />
		  <!--<input class="admin_submit6" type="button" name="delsub" value="�������" onClick="checkguwenall();" />-->
         </td>
            <td colspan="11" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
          </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<div id="infoguwen"  style="display:none; width: 350px; ">
	<form action="index.php?m=admin_lietou&c=addgw" target="supportiframe" method="post" onsubmit="return guwencheck()"> 
	<input type="hidden" name="m" value="admin_lietou"/>
		<div class="admin_compay_fp">
			<span class="admin_compay_fp_s" id="com_name"></span> 
			<em  id="siteusername"></em>
		</div>
		
		<div class="admin_compay_fp">
			<span class="admin_compay_fp_s">����������</span>
			<input type="text" value="" id="gwkeyword" class="admin_compay_fp_sub">
			<input type='button' onclick="searchs('1')"value="����" class="admin_compay_fp_sub1">
		</div>
		<div class="admin_compay_fp" style="height:34px;">
			<span class="admin_compay_fp_s" style="float:left; line-height:34px; display:inline-block; margin-right:5px;">ѡ����ʣ�</span>
			<div class="yun_admin_select_box zindex100" id="gw_option"> 
            	<input type="button" value="��ѡ��" class="yun_admin_select_box_text" id="gw_name" onClick="select_click('gw');">
                <input name="conid" type="hidden" id="gw_val" value="">
				<input name="addtime" type="hidden" value="">
                <!--�����--> 
                
                <div class="yun_admin_select_box_list_box dn" id="gw_select"> 
				<?php  $_smarty_tpl->tpl_vars['gwlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gwlist']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['guweninfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['gwlist']->key => $_smarty_tpl->tpl_vars['gwlist']->value) {
$_smarty_tpl->tpl_vars['gwlist']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['gwlist']->key;
?>
                <div class="yun_admin_select_box_list"> <a href="javascript:;" onClick="select_new('gw','<?php echo $_smarty_tpl->tpl_vars['gwlist']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['gwlist']->value['username'];?>
')"><?php echo $_smarty_tpl->tpl_vars['gwlist']->value['username'];?>
</a> </div>
                <?php } ?> </div>
           </div>
		</div>
		<div class="admin_compay_fp">
			<span class="admin_compay_fp_s">&nbsp;</span>
			<input type="submit"  value='ȷ��' class="admin_examine_bth"><input type="button" class="admin_examine_bth_qx closebutton" value='ȡ��' style="margin-left:10px;">
		</div> 
		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
		<input name="uid" value="0" id="gwuid" type="hidden">
	</form> 
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['adminstyle']->value)."/checkdomain.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>
