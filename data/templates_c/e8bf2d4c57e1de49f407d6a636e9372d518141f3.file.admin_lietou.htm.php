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
	$(".check_all:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg('您还未选择需要审核的用户！', 2, 8);	return false;
	}else{
		$("input[name=uid]").val(codewebarr);
 		$("#statusbody").val('');
		$("input[name='status']").attr('checked',false);
		$.layer({
			type : 1,
			title :'猎头用户审核', 
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
			status_div('锁定用户','420','220');
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
				title :'猎头用户审核', 
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
			parent.layer.msg('该猎头未上传营业执照！', 2, 8);
		}else{			
			$(".job_box_div").html("<img src='"+url+"' style='width:250px;height:100px' />");
			$("#preview_url").attr("href",url);
			$.layer({
				type : 1,
				title : '查看图片',
				closeBtn : [0 , true],  
				offset: ['80px', ''],
				border : [10 , 0.3 , '#000', true],
				area : ['350px','auto'],
				page : {dom : '#preview'}
			}); 						
		}		
	});
	//发短信
	$("#m_sendmsg").click(function(){
		
		var linktel = $('#m_linktel').val();
		if(!linktel){
			parent.layer.msg('该猎头未填写联系手机！', 2, 8);
		}else{
			send_moblie(linktel);
		}
		
	});
	//发邮件
	$("#m_sendemail").click(function(){
		
		var linkmail = $('#m_linkmail').val();
		if(!linkmail){
			parent.layer.msg('该猎头未填写联系邮箱！', 2, 8);
		}else{
			send_email(linkmail);
		}
		
	});
	//系统消息
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
					title :'猎头会员等级修改', 
					closeBtn : [0 , true],
					border : [10 , 0.3 , '#000', true],
					area : ['710px','390px'],
					offset: ['20px', ''],
					page : {dom :"#comrating"}
				});
			}else{
				parent.layer.msg('用户信息获取失败！', 2, 8);	return false;
			}
		});
	});
});
function Export(){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg('您还未选择需要导出用户！', 2, 8);	return false;
	}else{
		$("input[name=uid]").val(codewebarr);
		add_class('选择导出字段','650','300','#export','');
	}
}
function check_xls(){
	var type="";
	$(".type:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(type==""){type=$(this).val();}else{type=type+","+$(this).val();}
	});
	if(type==""){
		layer.msg("请选择导出字段！",2,8);return false;
	}
	setTimeout(function(){$('.myform').submit()},0);
	layer.closeAll();
}
function checkguwenall(url){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg('您还未选择任何信息！', 2, 8);	return false;
	}else{
		checkguwen(codewebarr,url);
	}
}

function guwencheck(){
   var gw=$("#gw_val").val();
   if(!gw){
       layer.msg('请选择分配的顾问',2,8);return false;
   }
}
function searchs(id){
	var pytoken = $('#pytoken').val();
	var keyword = $.trim($('#gwkeyword').val());
	if(!keyword){
		parent.layer.msg('请输入搜索关键词！', 2, 8);return false;
	}
	var i=layer.load('执行中，请稍候...',0);
	$.post("/index.php?m=ajax&c=guwen",{pytoken:pytoken,keyword:keyword},function(data){
	    layer.close(i);
		if(data==0){
			parent.layer.msg('请输入搜索关键词！', 2, 8);return false;
		}else if(data==1){
			parent.layer.msg('未查询到相关数据！', 2, 8);return false;
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
		title :'分配顾问', 
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['350px','260px'],
		offset: ['20px', ''],
		page : {dom :"#infoguwen"}
	});
}
//在管理中重置密码
function resetpassword(){
	var pytoken = $('#pytoken').val();
	var resetpassword=$("#m_resetpassword").val();//通过管理获取用户名称的值
	var uid=$("#m_uid").val();//通过管理获取用户名称的ID值
	parent.layer.confirm("确定要重置密码呢",function(){//重置程序
		$.get("index.php?m=admin_lietou&c=reset_lietoupassword&uid="+uid+"&pytoken="+pytoken,function(data){
			parent.layer.closeAll();
			parent.layer.alert("猎头会员："+resetpassword+"密码已经重置为123456！",9);return false
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
	
	var i=layer.load('请稍候...',0);
	$.post("index.php?m=admin_lietou&c=getinfo",{comid:comid,pytoken:pytoken},function(data){
		layer.close(i);
		if(data){
			var comdata = eval("(" + data + ")"); 
			if(comdata.name!=""){
				$('#m_name').html(comdata.name);
			}else{
				$('#m_name').html("尚未完善资料");
			}
			$('#m_username').html(comdata.username);
//			if(comdata.linkman!=""){
//				$('#m_linkman').html("【联系人】："+comdata.linkman+"&nbsp;&nbsp;");
//			}else{
//				$('#m_linkman').html("【联系人】："+"暂无联系人");
//			}
			if(comdata.phone!=""){
				$('#m_phone').html("【手机】："+comdata.phone+"&nbsp;&nbsp;");
			}else{
				$('#m_phone').html("【手机】："+"暂无联系手机");
			}
			if(comdata.linkmail!=""){
				$('#m_email').html("【邮箱】："+comdata.linkmail);
			}else{
				$('#m_email').html("【邮箱】："+"暂无联系邮箱");
			}
			if(comdata.adviser!=""){
				$('#m_adviser').html(comdata.adviser);
			}else{
				$('#m_adviser').html("该猎头尚未分配顾问");
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
				title :'猎头管理', 
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
<title>后台管理</title>
</head>
<body class="body_ifm">
<!--管理弹出框-->
<div id="manage" class="" style="width:650px; display:none;">
<div class="admin_usertck_box">
<div class="admin_userinfo_box">
<div class="admin_userinfo_box_username">【用户名】：<em id="m_username"></em> <span class="admin_userinfo_box_useruid">【用户id】：<em id="m_comid"></em></span><a href="###" class="admin_userinfo_box_zx" id="m_center" target="_blank">进入用户中心>></a><a href="" class="admin_userinfo_box_zx" id="m_home" target="_blank">预览猎头主页>></a></div>
<!--<div class="admin_userinfo_box_qyname">【操作对象】：<span class="admin_userinfo_box_qyname_s" id="m_name"></span><span class="admin_userinfo_box_useruid">【顾问姓名】：<em id="m_adviser"></em></span></div>-->
</div>
<div class="admin_operation_box">
<div class="admin_operation_list">
<span class="admin_operation_list_name">业务管理：</span>
<a href="###" class="admin_operation_list_a" id="m_integral">积分管理</a>
<a href="javascript:void(0);" class="admin_operation_list_a comrating" id="m_taocan">套餐管理</a>
<a href="###" class="admin_operation_list_a" id="m_order">充值/订单</a>
<!--<a href="javascript:void(0);" class="admin_operation_list_a comrating" id="m_zengzhi">增值服务</a>-->
<a href="###" class="admin_operation_list_a" id="m_down">下载简历</a>
<a href="###" class="admin_operation_list_a" id="m_apply">收到的简历</a>
<!--<a href="###" class="admin_operation_list_a" id="m_invite">面试邀请</a>-->
</div>
<div class="admin_operation_list">
<span class="admin_operation_list_name">资料管理：</span>
<a href="###" class="admin_operation_list_a" id="m_job">职位管理</a>
<a href="###" class="admin_operation_list_a" id="m_info">猎头资料</a>
<!--<a href="javascript:void(0);" class="admin_operation_list_a" id="m_yyzz">营业执照</a>-->
<!--<a href="###" class="admin_operation_list_a" id="m_show">猎头环境</a>-->
<!--<a href="###" class="admin_operation_list_a" id="m_comtpl">猎头模板</a>-->
<a href="###" class="admin_operation_list_a" id="m_password">修改密码</a>
</div>
<div class="admin_operation_list" style="display: none;">
<span class="admin_operation_list_name">分析统计：</span>
<a href="###" class="admin_operation_list_a" id="m_tongji">招聘效果</a>
<a href="###" class="admin_operation_list_a" id="m_memberlog">会员行为日志</a>
</div>
<div class="admin_operation_list" style="display: none">
<span class="admin_operation_list_name">联系会员：</span>
<a href="javascript:void(0);" class="admin_operation_list_a" id="m_sendmsg">发送短信</a>
<a href="javascript:void(0);" class="admin_operation_list_a" id="m_sendemail">发送邮件</a>
</div>
<div class="admin_operation_list" style="height:25px;line-height:25px;"><span class="admin_operation_list_name">联系方式：</span><em id="m_linkman"></em><em id="m_phone"></em><em id="m_email"></em></div>

<div class="admin_operation_but">
 
<a href="javascript:void(0)"  class="admin_operation_but_a" id="m_resetpassworde" onClick="resetpassword();">重置密码</a>


<a href="###" class="admin_operation_but_a" id="m_addjob">添加职位</a>
<a href="javascript:void(0);" class="admin_operation_but_a" id="m_lock">锁定猎头</a>
<!--a href="javascript:void(0);" class="admin_operation_but_a" id="m_delcom">删除猎头</a-->
<a href="javascript:void(0);" class="admin_operation_but_a" id="m_check">审核猎头</a>
<!--<a href="javascript:void(0);" class="admin_operation_but_a" id="m_guwen">分配顾问</a>-->
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
<!--管理弹出框 end-->
<div id="preview"  style="display:none;width:350px ">
  <div style="height:170px; overflow:auto;width:350px;" >
	<table cellspacing='1' cellpadding='1' class="admin_examine_table">
     <tr>
     <td><div style="width:90px; text-align:center">营业执照：</div></td>
   <td align="center"><div class="job_box_div" ></div>  </td></tr>
  <tr> <td colspan="2"><div style="width:100%;text-align:center; padding-top:10px;"><a target="_blank" href="" id='preview_url' style="padding:5px 15px; background:#f60;color:#fff">查看原图</a></div></td>
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
           <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="uid"> 猎头UID</span></label>
            <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="name"> 猎头名称</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="hy"> 从事行业</span></label>
             <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="pr"> 猎头性质</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="rating"> 会员等级</span></label>
             <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="provinceid"> 省</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="cityid"> 市</span></label>
            <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="mun"> 规模</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="sdate"> 创办时间</span></label>
              <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="money"> 注册资金</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="address"> 猎头地址</span></label>
             <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="zip"> 邮编</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkman"> 联系人</span></label>
    		<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkjob"> 所属职位</span></label>
			<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkqq"> 联系QQ</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkphone"> 固定电话</span></label>
		<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linktel"> 联系手机</span></label>
         <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkmail"> 邮件</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="website"> 网址</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="rec"> 知名猎头</span></label>
			<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="lastdate"> 更新时间</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="vip_stime">会员开始时间</span></label>
          </div>
        <div class="admin_resume_dc_sub" style="margin-top:10px;">  
          <input type="button" onClick="check_xls();"  value='确认' class="admin_resume_dc_bth1">
      <input type="button" onClick="layer.closeAll();" class="admin_resume_dc_bth2" value='取消'></div>
	
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
             <th width="80">锁定操作：</th>
            <td align="left">
        <div class="admin_examine_right" style="width:330px;">
         <label for="status_1"><span class="admin_examine_table_s"><input type="radio" name="status" value="1" id="status_1" >正常</span></label>
         <label for="status_2"><span class="admin_examine_table_s"><input type="radio" name="status" value="2" id="status_2">锁定</span></label>
         <label for="status_3"><span class="admin_examine_table_s" style="width:130px"><input type="radio" name="status" value="3" id="status_3">锁定并限制IP访问</span></label>
              </div>
              </td>
          </tr>
          <tr>
            <th>锁定说明：</th>
            <td align="left"><textarea id="lock_info"  name="lock_info" class="admin_explain_textarea" style="width:285px"></textarea></td>
          </tr>
          <tr>
           <td colspan='2' align="center">
            <input type="submit"  value='确认' class="admin_examine_bth">
             <input type="button"class="admin_examine_bth_qx closebutton" value='取消'>
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
            	<th align="right">会员等级：</th>
            	<td align="left">
             	<div class="yun_admin_select_box zindex100"> 
                	<input type="button" value="请选择" class="yun_admin_select_box_text" id="com_rating_name" onClick="select_click('com_rating');">
                  	<input name="rating" type="hidden" id="com_rating_val" value="">
                  <!--这块后加--> 
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
				<th align="right" class="comp_hotjob_line" >账户<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
：</th>
				<td> 
					<div class="admin_lietou_width220">
						<input type="text" name="integral"  id="integral" size="15" class="admin_lietou_jobtext" value="" />
					</div>
				</td>
			</tr>
			<tr class="admin_table_trbg" >
				<th align="right">会员到期时间：</th>
				<td><p id="vipetime"></p></td>
				<th align="right" class="comp_hotjob_line">延长会员有效期：</th>
				<td><input type="text" name="addday"  style="width:40px;" class="admin_lietou_jobtext"> 天</td>
			</tr> 
			
			<tr>
				<th align="right">发布职位数：</th>
				<td><input type="text" name="job_num"  id="job_num" size="15" class="admin_lietou_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
				<th align="right" class="comp_hotjob_line">刷新职位数：</th>
				<td><input type="text" name="breakjob_num"  id="breakjob_num" size="15" class="admin_lietou_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
			</tr>
			<tr class="admin_table_trbg" >
				<th align="right">发布兼职数：</th>
				<td><input type="text" name="part_num"  id="part_num" size="15"class="admin_lietou_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
				<th align="right"class="comp_hotjob_line">刷新兼职数：</th>
				<td><input type="text" name="breakpart_num"  id="breakpart_num" size="15" class="admin_lietou_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
			</tr>
			<tr class="admin_table_trbg" >
				<th align="right">剩余下载数：</th>
				<td><input type="text" name="down_resume"  id="down_resume" size="15" class="admin_lietou_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
				<th align="right"class="comp_hotjob_line">邀请面试：</th>
				<td><input type="text" name="invite_resume"  id="invite_resume" size="15"class="admin_lietou_jobtext"onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
			</tr>
			
          
			<tr>
		        <th align="center" colspan="4" style="text-align:center;border-right:0px;">
		        	<input type="submit"  value='确认' class="admin_examine_bth"/>
		        	<input type="button" class="admin_examine_bth_qx closebutton" value='取消' />
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
            <th  width="80">审核操作：</th>
            <td align="left">
            <div class="admin_examine_right">
            <label for="status0"><span class="admin_examine_table_s"><input type="radio" name="status" value="0" id="status0" >未审核</span></label>
        <label for="status1"><span class="admin_examine_table_s"><input type="radio" name="status" value="1" id="status1" >已通过</span></label>
        <label for="status3"><span class="admin_examine_table_s"><input type="radio" name="status" value="3" id="status3">未通过</span></label>
        </div>
        </td>
          </tr>
          <tr>
            <th>审核说明：</th>
            <td align="left"><textarea id="statusbody"  name="statusbody" class="admin_explain_textarea"></textarea></td>
          </tr>
          <tr>
            <td colspan='2' align="center">
			
            <input type="submit"  value='确认' class="admin_examine_bth">
             <input type="button" class="admin_examine_bth_qx closebutton" value='取消'>
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
<span class="complay_top_span fl">猎头管理</span>	
  <div class="admin_Filter_span">搜索类型：</div>
  <div class="admin_Filter_text formselect" did="dcom_type"> 
  <input type="button" <?php if ($_GET['type']=='1'||$_GET['type']=='') {?> value="猎头名称" <?php } elseif ($_GET['type']=='2') {?> value="用户名称" <?php } elseif ($_GET['type']=='3') {?> value="联系人" <?php } elseif ($_GET['type']=='4') {?> value="联系电话" <?php } elseif ($_GET['type']=='5') {?> value="用户邮箱" <?php } elseif ($_GET['type']=='6') {?> value="用户ID" <?php }?> class="admin_Filter_but" id="bcom_type">
  		   <input type="hidden" name="type" id="com_type" value="<?php if ($_GET['type']) {
echo $_GET['type'];
} else { ?>1<?php }?>"/><div class="admin_Filter_text_box" style="display:none" id="dcom_type">
			  <!--<ul>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('1','com_type','猎头名称')">猎头名称</a></li>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('2','com_type','用户名称')">用户名称</a></li>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('3','com_type','联系人')">联系人</a></li>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('4','com_type','联系电话')">联系电话</a></li>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('5','com_type','用户邮箱')">用户邮箱</a></li>-->
				  <!--<li><a href="javascript:void(0)" onClick="formselect('6','com_type','用户ID')">用户ID</a></li>-->
			  <!--</ul>  -->
		  </div>
    </div>	
    <input type="text" placeholder="输入你要搜索的关键字" name="keyword" class="admin_Filter_search">
	<input type="submit" value="搜索" class="admin_Filter_bth"/>
	  <div class="admin_search_div" ><div class="admin_adv_search"><div class="admin_adv_search_bth">高级搜索</div></div></div>
       <div class="admin_search_div_tianj" > <a href="index.php?m=admin_lietou&c=add" class="admin_infoboxp_tj">添加猎头</a> </div>
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
">用户ID<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'uid','m'=>'admin_lietou','untype'=>'order,t'),$_smarty_tpl);?>
">用户ID<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th align="left">猎头名/用户名</th>
              <!--<th align="left">等级/到期时间</th>-->
              <!--<th align="left">猎头顾问</th> -->
              <th>猎头认证</th>
              <th>登录/注册</th>
              <th>来源</th>
              <th>状态</th>
              <th>所在部门/部门分类</th>
              <th>总业绩</th>
             <th class="admin_table_th_bg">操作</th>
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
			   <img src="../config/ajax_img/1-1.png" alt="邮箱已认证" class="png">
			   <?php } else { ?>
			   <img src="../config/ajax_img/1-2.png" alt="邮箱未认证"class="png"> 
			   <?php }?>

               <?php if ($_smarty_tpl->tpl_vars['v']->value['moblie_status']==1) {?>
			   <img src="../config/ajax_img/2-1.png" alt="手机已认证"class="png">
			   <?php } else { ?>
			   <img src="../config/ajax_img/2-2.png" title="手机未认证"class="png">
			   <?php }?>
			 </td>
             <td>
			 <?php if ($_smarty_tpl->tpl_vars['v']->value['login_date']) {?>
				<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['login_date'],"%Y-%m-%d");?>

			 <?php } else { ?>
				未登录
			 <?php }?>
			 <div class=""><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['reg_date'],"%Y-%m-%d");?>
</div>
			 </td>
             <td>
			 <?php echo $_smarty_tpl->tpl_vars['source']->value[$_smarty_tpl->tpl_vars['v']->value['source']];?>

				
			</td>
             <td>
				<?php if ($_smarty_tpl->tpl_vars['v']->value['status']=='1') {?>
					<span class="admin_com_Audited">已审核</span>
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['status']=='2') {?>
					<span class="admin_com_Lock">已锁定</span>
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['status']=='3') {?>
					<span class="admin_com_tg">未通过</span>
				<?php } else { ?>
					<span class="admin_com_noAudited">未审核</span>
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
')" class="admin_cz_sc">管理</a> | 
            <a href="javascript:void(0)"  onclick="layer_del('确定要删除？', 'index.php?m=admin_lietou&c=del&del=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">删除</a>
            </td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
          <td align="center"><label for="chkall2"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></label></td>
         <td colspan="5" >
         <label for="chkAll2">全选</label>
          <input class="admin_submit4" type="button" name="delsub" value="批量审核" onClick="audall();" />
          <?php if ($_smarty_tpl->tpl_vars['email_promiss']->value) {?> <input class="admin_submit4" type="button" value="发邮件"  onclick="return confirm_email('确定发邮件吗？','email_div')"/><?php }?>
		   <?php if ($_smarty_tpl->tpl_vars['moblie_promiss']->value) {?><input class="admin_submit4" type="button" value="发信息"  onclick="return confirm_email('确定发信息吗？','moblie_div')"/><?php }?>
         <input class="admin_submit4" type="button" name="delsub" value="删除所选" onClick="return really('del[]')" />
         <input class="admin_submit2" type="button" name="delsub" value="导出" onClick="Export();" />
		 <input class="admin_submit4" type="button" name="delsub" value="批量选择分站" onClick="checksiteall('index.php?m=admin_lietou&c=checksitedid');" />
		  <!--<input class="admin_submit6" type="button" name="delsub" value="分配顾问" onClick="checkguwenall();" />-->
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
			<span class="admin_compay_fp_s">顾问搜索：</span>
			<input type="text" value="" id="gwkeyword" class="admin_compay_fp_sub">
			<input type='button' onclick="searchs('1')"value="搜索" class="admin_compay_fp_sub1">
		</div>
		<div class="admin_compay_fp" style="height:34px;">
			<span class="admin_compay_fp_s" style="float:left; line-height:34px; display:inline-block; margin-right:5px;">选择顾问：</span>
			<div class="yun_admin_select_box zindex100" id="gw_option"> 
            	<input type="button" value="请选择" class="yun_admin_select_box_text" id="gw_name" onClick="select_click('gw');">
                <input name="conid" type="hidden" id="gw_val" value="">
				<input name="addtime" type="hidden" value="">
                <!--这块后加--> 
                
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
			<input type="submit"  value='确认' class="admin_examine_bth"><input type="button" class="admin_examine_bth_qx closebutton" value='取消' style="margin-left:10px;">
		</div> 
		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
		<input name="uid" value="0" id="gwuid" type="hidden">
	</form> 
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['adminstyle']->value)."/checkdomain.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>
