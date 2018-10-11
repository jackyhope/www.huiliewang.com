<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-14 14:24:45
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/input_resume.htm" */ ?>
<?php /*%%SmartyHeaderCode:307407765b9b542dbdaaf2-19384735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b70ea2d3b2d02cad8a949ab658b9f94c3fdab1a0' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/input_resume.htm',
      1 => 1521168744,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307407765b9b542dbdaaf2-19384735',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lt_style' => 0,
    'style' => 0,
    'config' => 0,
    'resume' => 0,
    'userdata' => 0,
    'list' => 0,
    'userclass_name' => 0,
    'resume_expect' => 0,
    'industry_index' => 0,
    'industry_name' => 0,
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b9b542dca9544_02909583',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b9b542dca9544_02909583')) {function content_5b9b542dca9544_02909583($_smarty_tpl) {?><!DOCTYPE html>
<!-- saved from url=(0039)/center/hunter/inputRes -->
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html;" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<title>慧猎网猎头平台-创建标准化简历</title>
	<link rel="icon" href="/favicon.ico" />
	<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen" />
	<!-- Bootstrap -->
	<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/bootstrap-theme.min.css" data-href="/css/bootstrap-theme.min.css" rel="stylesheet" />
	<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/messenger.css" data-href="/css/messenger.css" rel="stylesheet" />
	<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/messenger-theme-air.css" data-href="/css/messenger-theme-air.css" rel="stylesheet" />
	<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/resume.css" rel="stylesheet" />
	<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/hunter.css" rel="stylesheet" />
	<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/validate.css" rel="stylesheet" />
	<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/selector.css" rel="stylesheet" />
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/layer/layer.min.1.8.5.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		var weburl = "/";
	<?php echo '</script'; ?>
>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/class.public.css" type="text/css">
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/class.public.js" type="text/javascript"><?php echo '</script'; ?>
>

	<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/style.css" rel="stylesheet" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<?php echo '<script'; ?>
 src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
	<![endif]-->
	<style type="text/css">
		.hideup{
			display: none;
		}
		.form th:not(.empty):after {content: "：";}
		.resume_pop_bq ul li{
			background: #CAE2F0;
			margin-top: 5px;
			padding: 0px 12px;
			height: 30px;
			float: left;
			margin-right: 5px;
			display: inline-block;
			line-height: 30px;
			cursor: pointer;
		}

		.resume_pop_bq ul li.resume_pop_bq_cur {
			background: #FFC url(/app/template/member/user/images/yxz.png) no-repeat right bottom;
			padding: 0px 11px;
			cursor: default;
			height: 28px;
			line-height: 28px;
			border: 1px solid #FC9;
		}

		.resume_pj_my_left {
			width: 100px;
			float: left;
			text-align: right;
			margin-top: 20px;
		}

		.yun_resume_bc {
			width: 185px;
			float: left;
			text-align: left;
			height: 30px;
			line-height: 30px;
			border: 1px solid #c3c3c3;
		}

		.checkboxAddBton {
			width: 85px;
			cursor: pointer;
			height: 30px;
			float: left;
			background: #f2f2f2;
			text-align: center;
			line-height: 30px;
			border: 1px solid #c3c3c3;
			border-left: none;
			display: inline-block;
		}


		.yun_resume_popup_chose_box_text {
			float: left;
			width: 234px;
			height: 28px;
			line-height: 28px;
			border: 1px solid #ddd;
			text-align: left;
			text-indent: 10px;
			background: #fff url(/app/template/member/user/images/yun_select.jpg) no-repeat 210px center;
		}

		.news_expect_bth_big{
			float: left;
			width: 667px;
			height: 28px;
			line-height: 28px;
			border: 1px solid #ddd;
			text-align: left;
			text-indent: 10px;
			background: #fff url(/app/template/member/user/images/yun_select.jpg) no-repeat 640px center;
		}
	</style>
</head>
<body class="vh100">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/index_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="resume">
	<div class="center">
		<div class="cddInfo">
			<div class="form form2">
				<form action="/center/hunter/saveLtCand" method="post" id="data-form">
					<div class="info info_box">
						<h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-user"></span>&nbsp;基本信息</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> <font color="red" size="4" style="margin-left: 200px"><span id="tips"></span></font> </h3>
						<div class="infoContext baseInfo">
							<table width="100" border="0" cellspacing="0" cellpadding="0">
								<tbody>
								<tr>
									<th>姓名</th>
									<td class="input-group-sm form-inline"> <input type="text" id="resName" name="name" class="form-control adr" placeholder="中文名必填" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
" />&nbsp; </td>
								</tr>
								<tr>
									<th>性别</th>
									<td class=" form-inline">
										<div class="input-group maleDiv">
											<input type="radio" aria-label="..." value="1" name="sex" <?php if ($_smarty_tpl->tpl_vars['resume']->value['sex']) {?>checked<?php }?> />
											<span class="wbm">男</span>
										</div>
										<div class="input-group maleDiv">
											<input type="radio" aria-label="..." value="2" name="sex" <?php if (empty($_smarty_tpl->tpl_vars['resume']->value['sex'])) {?>checked<?php }?> />
											<span class="wbm">女</span>
										</div> </td>
									<th class="optional">学历</th>
									<td>
										<select class="form-control adr" name="degree" id="degree">
											<option value="">请选择</option>
											<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['resume']->value['edu']==$_smarty_tpl->tpl_vars['list']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<th>所在地</th>
									<td>
										<div class="yun_resume_popup_chose_box">
											<input type="button"   onclick="index_city(1,'#living','#living_class','left:100px;top:100px; position:absolute;');" id="living" value="请选择" class="yun_resume_popup_chose_box_text">
											<input name='living' id='living_class' value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['living'];?>
"  type='hidden' />
										</div>
									</td>
									<th>手机</th>
									<td class="input-group-sm"> <input type="text" name="mobile" id="mobile" class="form-control adr" placeholder="请输入手机号" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" /> </td>
								</tr>
								<tr>
									<th class="optional">邮箱</th>
									<td class="input-group-sm"> <input type="text" name="email" id="email" class="form-control adr" placeholder="请输入邮箱" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
" /> </td>

									<th class="optional">工作年限</th>
									<td>
										<select class="form-control adr" name="workYear" id="workYear">
											<option value="">请选择</option>
											<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_word']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"  <?php if ($_smarty_tpl->tpl_vars['resume']->value['exp']==$_smarty_tpl->tpl_vars['list']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<th class="optional">出生日期</th>
									<td>
										<div class="input-group input-group-sm date form_date adr ym" data-date-format="yyyy-mm">
											<input class="form-control" size="16" type="text" id="birthDay" name="birthDayStr" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['birthday'];?>
" placeholder="格式：1988-12" />
											<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										</div> </td>
									<th class="optional">求职状态</th>
									<td colspan="3">
										<div class="input-group-sm adr">
											<select class="form-control" id="jobState" name="jobState">
												<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_jobstatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"  <?php if ($_smarty_tpl->tpl_vars['resume_expect']->value['jobstatus']==$_smarty_tpl->tpl_vars['list']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</option>
												<?php } ?>
											</select>
										</div> </td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="info info_box">
						<h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;求职意向</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
						<div class="infoContext workExpect">
							<table border="0" cellspacing="0" cellpadding="0">
								<tbody>
								<tr>
									<th class="optional">期望行业</th>
									<td colspan="3">
										<select class="form-control adr indst" name="hopeIndustry" id="hopeIndustry">
											<option value="">请选择</option>
											<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['resume_expect']->value['hy']==$_smarty_tpl->tpl_vars['list']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<th class="optional">期望职位</th>
									<td colspan="3">
										<input type="button" <?php if ($_smarty_tpl->tpl_vars['resume']->value['job_classid']) {?> value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['job_classname'];?>
"<?php } else { ?> value="请选择" <?php }?>style=" float:left;" class="news_expect_bth_big" onclick="index_job(5,'#workadds_job','#job_class','left:100px;top:100px; position:absolute;');" id="workadds_job" >
										<input name='job_class' id='job_class'  value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['job_classid'];?>
"type='hidden' />
									</td>
								</tr>
								<tr>
									<th class="optional">期望城市</th>
									<td colspan="3">
										<input type="button"   onclick="index_city(3,'#city','#city_class','left:100px;top:100px; position:absolute;');" id="city" value="请选择" class="yun_resume_popup_chose_box_text">
										<input name='city' id='city_class' value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['citys_id'];?>
"  type='hidden' />
									</td>
								</tr>
								<tr>
									<th class="optional">目前年薪</th>
									<td class="input-group-sm form-inline">
										<input type="text" id="curMoney" name="curMoney" class="sala form-control small" placeholder="0" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" /> <span class="salary2">万元/年&nbsp;&nbsp;</span>
									</td>
									<!--<th class="optional">其他收入</th>-->
									<!--<td class="input-group-sm"><input type="text" id="otherMoney" name="otherMoney" class="form-control adr" placeholder="奖金、补贴、提成、期权等" /></td>-->
								</tr>
								<tr>
									<th class="optional">期望年薪</th>
									<td class="input-group-sm form-inline"> <input type="text" id="hopeMoney" name="hopeMoney" class="sala form-control small" placeholder="0" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onBlur="checkonblur('hopeMoney');" /> <span class="salary2">万元/年&nbsp;&nbsp;</span> </td>

								</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="info info_box">
						<h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-hdd"></span>&nbsp;工作经历</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
						<div class="infoContext workExperience">
							<table class="workexp" width="100%" border="0" cellspacing="0" cellpadding="0">
								<tbody>
								<tr>
									<th class="optional">任职时间</th>
									<td colspan="3">
										<div class="form-inline">
											<div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">
												<input class="form-control" size="16" type="text" value="" name="startDate" />
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div> -
											<div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">
												<input class="form-control" size="16" type="text" value="" name="endDate" />
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
											<span class="tip"> <input type="checkbox" name="now" /><span class="black">至今</span> <span class="gray">后面日期不选，表示至今</span> </span>
										</div> </td>
								</tr>
								<tr>
									<th class="optional">公司名称</th>
									<td class="input-group-sm"><input type="text" class="form-control adr" placeholder="公司名称" name="companyName" /></td>
									<th class="optional">职位名称</th>
									<td class="input-group-sm"><input type="text" class="form-control adr" placeholder="职位名称" name="posName" /></td>
								</tr>
								<tr>
									<th class="optional">公司介绍</th>
									<td colspan="3">
										<div class="indst">
											<textarea class="form-control" rows="3" name="companyDes" onkeyup="wordsDeal(this,500,'companyDesTip');"></textarea>
											<p class="remainWordTip"><span id="companyDesTip">0</span> / 500</p>
										</div> </td>
								</tr>
								<tr>
									<th class="optional">工作描述</th>
									<td colspan="3">
										<div class="indst">
											<textarea class="form-control" rows="3" name="workDes" onkeyup="wordsDeal(this,5000,'workDesTip');" style="height: 150px;"></textarea>
											<p class="remainWordTip"><span id="workDesTip">0</span> / 5000</p>
										</div> </td>
								</tr>
								</tbody>
							</table>
							<table>
								<tbody>
								<tr>
									<td colspan="4">
										<div class="addExp addWorkExp">
											+添加工作经历
										</div></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="info info_box">
						<h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-inbox"></span>&nbsp;项目经历</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
						<div class="infoContext workExperience">
							<table class="proexp" width="100%" border="0" cellspacing="0" cellpadding="0">
								<tbody>
								<tr>
									<th class="optional">任职时间</th>
									<td colspan="3">
										<div class="form-inline">
											<div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">
												<input class="form-control" size="16" type="text" value="" name="startDate" />
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div> -
											<div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">
												<input class="form-control" size="16" type="text" value="" name="endDate" />
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
											<span class="tip"> <input type="checkbox" name="now" /><span class="black">至今</span> <span class="gray">后面日期不选，表示至今</span> </span>
										</div> </td>
								</tr>
								<tr>
									<th class="optional">项目名称</th>
									<td colspan="3" class="input-group-sm"><input type="text" class="form-control indst" name="proName" placeholder="项目名称" /></td>
								</tr>
								<tr>
									<th class="optional">项目职务</th>
									<td colspan="3" class="input-group-sm"><input type="text" class="form-control indst" name="projectOffice" placeholder="项目职务" /></td>
								</tr>
								<tr>
									<th class="optional">所在公司</th>
									<td colspan="3" class="input-group-sm"><input type="text" class="form-control indst" name="subCompany" placeholder="所在公司" /></td>
								</tr>
								<tr>
									<th class="optional">项目描述</th>
									<td colspan="3">
										<div class="indst">
											<textarea class="form-control" rows="3" name="proDes" onkeyup="wordsDeal(this,1000,'proDesTip');"></textarea>
											<p class="remainWordTip"><span id="proDesTip">0</span> / 1000</p>
										</div> </td>
								</tr>
								<tr>
									<th class="optional">项目职责</th>
									<td colspan="3">
										<div class="indst">
											<textarea class="form-control" rows="3" name="projectRole" onkeyup="wordsDeal(this,500,'proRoleTip');"></textarea>
											<p class="remainWordTip"><span id="proRoleTip">0</span> / 500</p>
										</div> </td>
								</tr>
								<tr>
									<th class="optional">项目业绩</th>
									<td colspan="3">
										<div class="indst">
											<textarea class="form-control" rows="3" name="projectPerfromnance" onkeyup="wordsDeal(this,500,'proPerTip');"></textarea>
											<p class="remainWordTip"><span id="proPerTip">0</span> / 500</p>
										</div> </td>
								</tr>
								</tbody>
							</table>
							<table>
								<tbody>
								<tr>
									<td colspan="4">
										<div class="addExp addProExp">
											+添加项目经历
										</div></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="info info_box">
						<h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp;教育经历</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
						<div class="infoContext workExperience">
							<table class="eduexp" width="100%" border="0" cellspacing="0" cellpadding="0">
								<tbody>
								<tr>
									<th class="optional">学习时间</th>
									<td colspan="3">
										<div class="form-inline">
											<div class="input-group input-group-sm date form_date  ym" data-date-format="yyyy-mm">
												<input class="form-control" size="16" type="text" value="" name="startDate" />
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div> -
											<div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">
												<input class="form-control" size="16" type="text" value="" name="endDate" />
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
											<span class="tip"> <input type="checkbox" name="now" /><span class="black">目前在读</span> <span class="gray">后面日期不选，表示至今</span> </span>
										</div> </td>
								</tr>
								<tr>
									<th class="optional">学校</th>
									<td colspan="3" class="input-group-sm"><input type="text" name="schoolName" class="form-control indst" placeholder="学校名称" /></td>
								</tr>
								<tr>
									<th class="optional">专业</th>
									<td class="input-group-sm"><input type="text" name="majorName" class="form-control adr" placeholder="专业" /></td>
									<th class="optional">学历</th>
									<td class="input-group-sm">
										<select class="form-control adr" name="edu_degree" id="edu_degree">
											<option value="">请选择</option>
											<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<th class="empty"></th>
									<td clospan="4" "=""> </td>
								</tr>
								</tbody>
							</table>
							<table>
								<tbody>
								<tr>
									<td colspan="4">
										<div class="addExp addEduExp">
											+添加教育经历
										</div></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="info info_box">
						<h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;附加信息</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
						<div class="infoContext workExperience">
							<textarea class="form-control" rows="3" id="extraInfo" name="extraInfo" onkeyup="wordsDeal(this,1000,'extraInfoTip');" placeholder=" 如：获奖项、技能资格证书等，填写文字1000字以内"></textarea>
							<p class="remainWordTip"><span id="extraInfoTip">0</span> / 1000</p>
						</div>
					</div>
					<div class="info info_box">
						<h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;候选人自评</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
						<div class="infoContext workExperience">
							<textarea class="form-control" rows="3" id="selfEvaluation" name="selfEvaluation" onkeyup="wordsDeal(this,1000,'selfEvaluationTip');" placeholder=" 请输入候选人自我评价"></textarea>
							<p class="remainWordTip"><span id="selfEvaluationTip">0</span> / 1000</p>
						</div>
					</div>

					<div class="info info_box">
						<h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;候选人标签</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
						<div class="infoContext tag">
							<div class="fl" style="margin-top:10px;">

								<input class="yun_resume_bc" type="inputText" tabindex="1000" id="addfuli"><a class="checkboxAddBton" style="color: #555;">添加标签</a>
								<input type="hidden" name="tag" id="tag" value="">
							</div>
							<div style="clear: both;"></div>
							<div class="resume_pop_bq fl" style="width: 100%;margin-top: 10px;">
								<ul id="newtag" style="float: left;margin-bottom:0;">
								</ul>
								<ul>
									<li class="changetag " data-tag="经验足" tag-class="1"><em>经验足</em></li>

									<li class="changetag " data-tag="高级工程师" tag-class="1"><em>高级工程师</em></li>

									<li class="changetag " data-tag="世界500强高管" tag-class="1"><em>世界500强高管</em></li>

									<li class="changetag " data-tag="海归" tag-class="1"><em>海归</em></li>

									<li class="changetag " data-tag="技术好" tag-class="1"><em>技术好</em></li>

									<li class="changetag " data-tag="高级管理" tag-class="1"><em>高级管理</em></li>

									<li class="changetag " data-tag="销售精英" tag-class="1"><em>销售精英</em></li>

									<li class="changetag " data-tag="网络达人" tag-class="1"><em>网络达人</em></li>

								</ul>
							</div>


						</div>
					</div>
				</form>
			</div>
		</div>
		<form id="fileupload" action="/uploadResume" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="hunterId" name="hunterId" value="<?php echo $_smarty_tpl->tpl_vars['member']->value['uid'];?>
" />
			<input type="file" id="file" name="file" style="visibility:hidden" onchange="ajaxFileupload(this)" />
			<div class="apply-buttons">
				<button type="button" id="saveLtCandBtn" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;保存简历</button>
				<button type="button" class="btn btn-success" onclick="file.click()"><span class="glyphicon glyphicon-log-in"></span>&nbsp;导入简历</button>
			</div>
		</form>
	</div>
	<div class="resumeContent">
		<a class="analyse-btn">解析简历<span class="glyphicon glyphicon-chevron-left"></span></a>
		<textarea id="htmlContent" placeholder="---------------------------------请粘贴本地简历内容到此处---------------------------------" class="innerText"></textarea>
	</div>
	<div class="clr"></div>
</div>
<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/selector.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/bootstrap-datetimepicker.js" ><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/bootstrap-datetimepicker.zh-CN.js" ><?php echo '</script'; ?>
>
<!--<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/Validform_v5.3.2.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/ajaxfileupload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/tools.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/data/plus/job.cache.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/data/plus/city.cache.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/data/plus/industry.cache.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 src="/js/dic/dic.js"><?php echo '</script'; ?>
> -->
<!--<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/swfupload.js"><?php echo '</script'; ?>
>-->
<!--<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/swfupload.queue.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/fileprogress.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/handlers_mu.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/selector.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 type="text/javascript" src="/js/dic/citySingleSelector.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="/css/citySelect.css"> -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/createResume.js"><?php echo '</script'; ?>
>
<!--<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/uploadInit6.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/messenger.min.js" ><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">

    function ajaxFileupload(fileObj) {
        var allowExtention = ".htm,.html,.docx,.doc,.txt,.log"; //允许上传文件的后缀名document.getElementById("hfAllowPicSuffix").value;
        var extention = fileObj.value.substring(fileObj.value.lastIndexOf(".") + 1).toLowerCase();
        var browserVersion = window.navigator.userAgent.toUpperCase();
        if (allowExtention.indexOf(extention) > -1) {
            $("#data-form")[0].reset();
            $("#hopeCallings").val("");
            layer.msg('解析中，请等待', {icon: 6});
            $.ajaxFileUpload( {
                url : '/member/index.php?c=parse', //用于文件上传的服务器端请求地址
//                url : 'http://www.chuntianlaile.com/wordMht.php', //用于文件上传的服务器端请求地址
                secureuri : false, //是否需要安全协议，一般设置为false
                fileElementId : 'file', //文件上传域的ID
                data : {
                    hunterId : $("#hunterId").val()
                },
//                dataType : 'json', //返回值类型 一般设置为json
                success : function(data, status) //服务器成功响应处理函数
                {
                    layer.msg('简历导入成功！', 2, 9);
                    var data = $(data).find("body").html();
                    var data = JSON.parse(data);

                    $.globalMessenger().post({
                        message: "简历导入成功！",
                        hideAfter: 2,
                        type: 'success',//error,success
                        showCloseButton: false,
                        singleton:false
                    });
                    $("#htmlContent").val(data.content);
                    cleanLeftData();

                    $("#mobile").val(data.telphone);
                    $("#email").val(data.email);
                    $("#resName").val(data.name);
                    $("#birthDay").val(data.birthday);
                    $("#living").val(data.living_name);
                    $("#living_class").val(data.living);
                    $("#city").val(data.provinceid_name);
                    $("#city_class").val(data.provinceid);
                    $("#workadds_job").val(data.job_class);
                    $("#job_class").val(data.job_classid);
					if(data.sex=="男"){
						$("input[name=sex][value='1']").attr("checked",true)
					}else{
						$("input[name=sex][value='2']").attr("checked",true)
					}

                    var worksdata = data.workExp;
                    var edudata = data.eduExps;
                    var prodata = data.proExp;
                    console.log(data.workExp);
                    if(worksdata){
                        $.each(worksdata,function(i,v){
                            addWork(v);
                        });
                    }

                    if(edudata){
                        $.each(edudata,function(i,v){
                            addEdu(v);
                        });
                    }

                    if(prodata){
                        $.each(prodata,function(i,v){
                            addPro(v);
                        });
                    }
                    $("#workYear option").each(function(){
                        var _exp=$(this).html();
                        if(_exp.replace(/[^0-9]/ig,"")==data.exp.replace(/[^0-9]/ig,"")){
                            $(this).attr("selected",true);
                        }
                    });
					$("body").click();

                },
                error : function(data, status, e)//服务器响应失败处理函数
                {
                    console.log(233);
                    layer.msg('简历导入失败！', 2, 8);
					$.globalMessenger().post({
						message: "简历导入失败！",
						hideAfter: 2,
						type: 'error',//error,success
						showCloseButton: false,
						singleton:false
					});

                }
            });
            return false;

        } else {
            alert("仅支持" + allowExtention + "为后缀名的文件!");
            fileObj.value = ""; //清空选中文件
            if (browserVersion.indexOf("MSIE") > -1) {
                fileObj.select();
                document.selection.clear();
            }
            fileObj.outerHTML = fileObj.outerHTML;
        }
    }


//    var hopeIndustry=hi;//期望行业数据
//    var hopeIndustrybox="";//期望行业
//    for(var i =0 ; i< hopeIndustry.length ; i++){
//        hopeIndustrybox+="<option value='"+hopeIndustry[i]+"'>"+hn[hopeIndustry[i]]+"</option>";
//    }
//    $("#hopeIndustry").append(hopeIndustrybox);

    function hopejob(jid,jtd,obj){
        var jid=jid;//第一级选择的职位
        var jtd=jtd;//第二级选择的职位
        var job1="";//第一级内容
        var job2="";//第二级内容
        var job3="";//第三级内容

        for(var i = 0 ; i<ji.length ; i++){
            if(jid == ji[i]){
                job1+='<li ><a href="javascript:void(0)" jicode="'+ji[i]+'" class="jCallingSelectorHadItem2 jCallingSelectorHadItem3">'+jn[ji[i]]+'</a></li>'
            }else{
                job1+='<li ><a href="javascript:void(0)" jicode="'+ji[i]+'" class="jCallingSelectorHadItem2">'+jn[ji[i]]+'</a></li>'
            }
        }
        $("#jb1").html(job1);

		if(jt[jid]){
			for(var i = 0 ; i<jt[jid].length ; i++){
				if(jtd == jt[jid][i]){
					if(jt[jt[jid][i]]){
						job2+='<li ><a href="javascript:void(0)" jobid="nrjob'+jt[jid][i]+'" class="jCallingSelectorHadItem2 jCallingSelectorHadItem3">'+jn[jt[jid][i]]+'</a></li>'
					}else{
						job2+='<li ><a href="javascript:void(0)" onclick="queryJob('+jt[jid][i]+',this)" jobid="nrjob'+jt[jid][i]+'" class="jCallingSelectorHadItem2 jCallingSelectorHadItem3">'+jn[jt[jid][i]]+'</a></li>'
					}

				}else{

					if(jt[jt[jid][i]]){
						job2+='<li ><a href="javascript:void(0)" jobid="nrjob'+jt[jid][i]+'" class="jCallingSelectorHadItem2">'+jn[jt[jid][i]]+'</a></li>'
					}else{
						job2+='<li ><a href="javascript:void(0)" onclick="queryJob('+jt[jid][i]+',this)" jobid="nrjob'+jt[jid][i]+'" class="jCallingSelectorHadItem2">'+jn[jt[jid][i]]+'</a></li>'
					}
				}
			}
			$("#jb2").html(job2);
		}


        var checkjbs=$("#selectItems li");
        var checkjbsid=[];
        checkjbs.each(function () {
            var _this=$(this);
            var jid=_this.attr("jobsid").substring(5,9);
            checkjbsid.push(jid);
        });

		if(jt[jtd]){
			for(var i = 0 ; i<jt[jtd].length ; i++){
				var actlength=checkjbsid.length;
				for(var j = 0 ;j < checkjbsid.length ; j++){
					if(checkjbsid[j]==jt[jtd][i]){
						job3+='<li ><a href="javascript:void(0)" jobid="nrjob'+jt[jtd][i]+'" class="act" onclick="queryJob('+jt[jtd][i]+',this)">'+jn[jt[jtd][i]]+'</a></li>'

					}else{
						actlength-=1;
					}
				}
				if(actlength==0){
					job3+='<li ><a href="javascript:void(0)" jobid="nrjob'+jt[jtd][i]+'" onclick="queryJob('+jt[jtd][i]+',this)">'+jn[jt[jtd][i]]+'</a></li>'
				}
//			job3+='<li ><a href="javascript:void(0)" jobid="nrjob'+jt[jtd][i]+'" onclick="queryJob('+jt[jtd][i]+',this)">'+jn[jt[jtd][i]]+'</a></li>'
			}
			$("#jb3").html(job3);
		}


    }
    var jid=45;
    var jtd=103;
    hopejob(jid,jtd);

    $("#jb1").on("click","a",function(){
        jid=$(this).attr("jicode");
        hopejob(jid,jt[jid][0]);
    });

    $("#jb2").on("click","a",function(){
		if($(this).attr("onclick")){
			return false;
		}
        jtd=$(this).attr("jobid").substring(5,9);
        hopejob(jid,jtd);
    });

    $(document).ready(
        function() {

            $('.form_date.ym').datetimepicker( {
                language : 'zh-CN',
                weekStart : 1,
                todayBtn : 0,
                autoclose : 1,
                todayHighlight : 1,
                startView : 3,
                minView : 3,
                forceParse : 0,
                format : 'yyyy-mm',
                pickerPosition : "bottom-left"
            }).on('show', function(ev) {
                $('.form_date').datetimepicker('update')
            });

            $(document).on("blur",".form_date.ym > input",function(){
                var dstr = $(this).val();
                var dreg = /^\d{4}-((0[1-9]{1})|(1[0-2]{1}))$/;
                if(!dreg.test(dstr)){
                    $(this).val("");
                }

            });

            $('.form_date.ymd').datetimepicker( {
                language : 'zh-CN',
                weekStart : 1,
                todayBtn : 1,
                autoclose : 1,
                todayHighlight : 1,
                startView : 2,
                minView : 2,
                forceParse : 0,
                format : 'yyyy-mm-dd',
                pickerPosition : "bottom-left"
            }).on('show', function(ev) {
                $('.form_date').datetimepicker('update')
            });

            $(".glyphicon-menu-down,.glyphicon-menu-up")
                .click(function() {
                    var curcss = $(this).attr("class");
                    //显示
                    if (curcss.indexOf("down") != -1) {
                        $(this).removeClass(
                            "glyphicon-menu-down");
                        $(this).addClass(
                            "glyphicon-menu-up");
                        $(this).parents("div.info").find(
                            "div.infoContext").show();
                    }
                    //隐藏
                    if (curcss.indexOf("up") != -1) {
                        $(this).removeClass(
                            "glyphicon-menu-up");
                        $(this).addClass(
                            "glyphicon-menu-down");
                        $(this).parents("div.info").find(
                            "div.infoContext").hide();
                    }
                });

            $._messengerDefaults = {
                extraClasses : 'messenger-fixed messenger-theme-air messenger-on-top messenger-on-right'
            };





        });
<?php echo '</script'; ?>
>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->

</body>
<?php echo '<script'; ?>
>
    function checkonblur(id) {
        var obj = $.trim($("#"+id).val());
        var salary_month=parseInt($('#salary_month').val());
        $("#moneyspans").html(obj*salary_month);return;
    }

    $("body").on("click",".resume_pop_bq li",function () {
        if($(this).hasClass("resume_pop_bq_cur")){
            $(this).removeClass("resume_pop_bq_cur");
        }else{
            $(this).addClass("resume_pop_bq_cur");
        }
        var tags = [];
        $(".resume_pop_bq_cur em").each(function (i) {
            tags[i] = $(this).html();
        })

        tags = tags.join(',');

        $("#tag").val(tags);
    })

	$(".checkboxAddBton").click(function () {
		var new_tag = $("#addfuli").val();
		if(new_tag){
            var html = "<li class=\"changetag  resume_pop_bq_cur\" data-tag='"+new_tag+"' tag-class=\"2\"><em>"+new_tag+"</em></li>";
            $("#newtag").prepend(html);
            var tags = $("#tag").val();
            if(tags){
                tags = tags.split(',');
                tags.push(new_tag);
                tags = tags.join(',');
			}else{
                tags = new_tag;
			}

            $("#tag").val(tags);
            $("#addfuli").val("");
		}

    })
<?php echo '</script'; ?>
>
</html><?php }} ?>
