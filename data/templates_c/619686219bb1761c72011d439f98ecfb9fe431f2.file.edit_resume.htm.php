<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-09 14:58:30
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/edit_resume.htm" */ ?>
<?php /*%%SmartyHeaderCode:16648522725b430796f14ac6-65142785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '619686219bb1761c72011d439f98ecfb9fe431f2' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/edit_resume.htm',
      1 => 1521790042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16648522725b430796f14ac6-65142785',
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
    'city_name' => 0,
    'industry_index' => 0,
    'industry_name' => 0,
    'li' => 0,
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b43079711f2a5_09931094',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b43079711f2a5_09931094')) {function content_5b43079711f2a5_09931094($_smarty_tpl) {?><!DOCTYPE html>
<!-- saved from url=(0039)/center/hunter/inputRes -->
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- ����3��meta��ǩ*����*������ǰ�棬�κ��������ݶ�*����*������� -->
    <title>��������ͷƽ̨-������׼������</title>
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
        .form th:not(.empty):after {content: "��";}
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
                        <h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-user"></span>&nbsp;������Ϣ</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> <font color="red" size="4" style="margin-left: 200px"><span id="tips"></span></font> </h3>
                        <div class="infoContext baseInfo">
                            <table width="100" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <th>����</th>
                                    <td class="input-group-sm form-inline"> <input type="text" id="resName" name="name" class="form-control adr" placeholder="����������" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
" />&nbsp; </td>
                                </tr>
                                <tr>
                                    <th>�Ա�</th>
                                    <td class=" form-inline">
                                        <div class="input-group maleDiv">
                                            <input type="radio" aria-label="..." value="1" name="sex" <?php if ($_smarty_tpl->tpl_vars['resume']->value['sex']) {?>checked<?php }?> />
                                            <span class="wbm">��</span>
                                        </div>
                                        <div class="input-group maleDiv">
                                            <input type="radio" aria-label="..." value="2" name="sex" <?php if (empty($_smarty_tpl->tpl_vars['resume']->value['sex'])) {?>checked<?php }?> />
                                            <span class="wbm">Ů</span>
                                        </div> </td>
                                    <th class="optional">ѧ��</th>
                                    <td>
                                        <select class="form-control adr" name="degree" id="degree">
                                            <option value="">��ѡ��</option>
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
                                    <th>���ڵ�</th>
                                    <td>
                                        <div class="yun_resume_popup_chose_box">
                                            <input type="button"   onclick="index_city(1,'#living','#living_class','left:100px;top:100px; position:absolute;');" id="living" value="<?php if ($_smarty_tpl->tpl_vars['resume']->value['living']) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['resume']->value['living']];
} else { ?>��ѡ��<?php }?>" class="yun_resume_popup_chose_box_text">
                                            <input name='living' id='living_class' value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['living'];?>
"  type='hidden' />
                                        </div>
                                    </td>
                                    <th>�ֻ�</th>
                                    <td class="input-group-sm"> <input type="text" name="mobile" id="mobile" class="form-control adr" placeholder="�������ֻ���" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" /> </td>
                                </tr>
                                <tr>
                                    <th class="optional">����</th>
                                    <td class="input-group-sm"> <input type="text" name="email" id="email" class="form-control adr" placeholder="����������" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
" /> </td>

                                    <th class="optional">��������</th>
                                    <td>
                                        <select class="form-control adr" name="workYear" id="workYear">
                                            <option value="">��ѡ��</option>
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
                                    <th class="optional">��������</th>
                                    <td>
                                        <div class="input-group input-group-sm date form_date adr ym" data-date-format="yyyy-mm">
                                            <input class="form-control" size="16" type="text" id="birthDay" name="birthDayStr" value="<?php echo date('Y-m',$_smarty_tpl->tpl_vars['resume']->value['birthday']);?>
" placeholder="��ʽ��1988-12" />
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div> </td>
                                    <th class="optional">��ְ״̬</th>
                                    <td colspan="3">
                                        <div class="input-group-sm adr">
                                            <select class="form-control" id="jobState" name="jobState">
                                                <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_jobstatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
"  <?php if ($_smarty_tpl->tpl_vars['resume']->value['jobstatus']==$_smarty_tpl->tpl_vars['list']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
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
                        <h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;��ְ����</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
                        <div class="infoContext workExpect">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <th class="optional">������ҵ</th>
                                    <td colspan="3">
                                        <select class="form-control adr indst" name="hopeIndustry" id="hopeIndustry">
                                            <option value="">��ѡ��</option>
                                            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['resume']->value['hy']==$_smarty_tpl->tpl_vars['list']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['list']->value];?>
</option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="optional">����ְλ</th>
                                    <td colspan="3">
                                        <input type="button" value="<?php if ($_smarty_tpl->tpl_vars['resume']->value['jobs_classid']) {
echo $_smarty_tpl->tpl_vars['resume']->value['job_classids'];
} else { ?>��ѡ��<?php }?>"  onclick="index_job(5,'#workadds_job','#job_class','left:100px;top:100px; position:absolute;');" id="workadds_job" class="news_expect_bth_big">
                                        <input name='job_class' id='job_class'  value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['jobs_classid'];?>
"type='hidden' />
                                    </td>
                                </tr>
                                <tr>
                                    <th class="optional">��������</th>
                                    <td colspan="3">
                                        <input type="button"   onclick="index_city(3,'#city','#city_class','left:100px;top:100px; position:absolute;');" id="city" value="<?php if ($_smarty_tpl->tpl_vars['resume']->value['citys_id']) {
echo $_smarty_tpl->tpl_vars['resume']->value['city_ids'];
} else { ?>��ѡ��<?php }?>" class="yun_resume_popup_chose_box_text">
                                        <input name='city' id='city_class' value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['citys_id'];?>
"  type='hidden' />
                                    </td>
                                </tr>
                                <tr>
                                    <th class="optional">Ŀǰ��н</th>
                                    <td class="input-group-sm form-inline">
                                        <input type="text" id="curMoney" name="curMoney" class="sala form-control small" placeholder="0" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['current_salary'];?>
" /> <span class="salary2">��Ԫ/��&nbsp;&nbsp;</span>
                                    </td>
                                    <!--<th class="optional">��������</th>-->
                                    <!--<td class="input-group-sm"><input type="text" id="otherMoney" name="otherMoney" class="form-control adr" placeholder="���𡢲�������ɡ���Ȩ��" /></td>-->
                                </tr>
                                <tr>
                                    <th class="optional">������н</th>
                                    <td class="input-group-sm form-inline"> <input type="text" id="hopeMoney" name="hopeMoney" class="sala form-control small" placeholder="0" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onBlur="checkonblur('hopeMoney');"  value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['hope_salary'];?>
" /> <span class="salary2">��Ԫ/��&nbsp;&nbsp;</span> </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="info info_box">
                        <h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-hdd"></span>&nbsp;��������</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
                        <div class="infoContext workExperience">
                            <?php if ($_smarty_tpl->tpl_vars['resume']->value['work_n']) {?>
                                <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['resume']->value['work_n']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                <table class="workexp" width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr>
                                        <th class="optional">��ְʱ��</th>
                                        <td colspan="3">
                                            <div class="form-inline">
                                                <div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">
                                                    <input class="form-control" size="16" type="text" value="<?php if ($_smarty_tpl->tpl_vars['list']->value['startDateStr']) {
echo date('Y-m',$_smarty_tpl->tpl_vars['list']->value['startDateStr']);
}?>" name="startDate" />
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div> -
                                                <div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">
                                                    <input class="form-control" size="16" type="text" value="<?php if ($_smarty_tpl->tpl_vars['list']->value['endDateStr']) {
echo date('Y-m',$_smarty_tpl->tpl_vars['list']->value['endDateStr']);
}?>" name="endDate" />
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                                <span class="tip"> <input type="checkbox" name="now" /><span class="black">����</span> <span class="gray">�������ڲ�ѡ����ʾ����</span> </span>
                                                <a class="removeExp"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                            </div> </td>
                                    </tr>
                                    <tr>
                                        <th class="optional">��˾����</th>
                                        <td class="input-group-sm"><input type="text" class="form-control adr" placeholder="��˾����" name="companyName" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['companyName'];?>
" /></td>
                                        <th class="optional">ְλ����</th>
                                        <td class="input-group-sm"><input type="text" class="form-control adr" placeholder="ְλ����" name="posName" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['posName'];?>
" /></td>
                                    </tr>
                                    <tr>
                                        <th class="optional">��˾����</th>
                                        <td colspan="3">
                                            <div class="indst">
                                                <textarea class="form-control" rows="3" name="companyDes" onkeyup="wordsDeal(this,500,'companyDesTip');"><?php echo $_smarty_tpl->tpl_vars['list']->value['companyDes'];?>
</textarea>
                                                <p class="remainWordTip"><span id="companyDesTip">0</span> / 500</p>
                                            </div> </td>
                                    </tr>
                                    <tr>
                                        <th class="optional">��������</th>
                                        <td colspan="3">
                                            <div class="indst">
                                                <textarea class="form-control" rows="3" name="workDes" onkeyup="wordsDeal(this,5000,'workDesTip');"><?php echo $_smarty_tpl->tpl_vars['list']->value['workDes'];?>
</textarea>
                                                <p class="remainWordTip"><span id="workDesTip">0</span> / 5000</p>
                                            </div> </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                            <?php }?>
                            <table>
                                <tbody>
                                <tr>
                                    <td colspan="4">
                                        <div class="addExp addWorkExp">
                                            +���ӹ�������
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="info info_box">
                        <h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-inbox"></span>&nbsp;��Ŀ����</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
                        <div class="infoContext workExperience">
                            <?php if ($_smarty_tpl->tpl_vars['resume']->value['project_n']) {?>
                                <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['resume']->value['project_n']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                <table class="proexp" width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr>
                                        <th class="optional">��ְʱ��</th>
                                        <td colspan="3">
                                            <div class="form-inline">
                                                <div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">
                                                    <input class="form-control" size="16" type="text" value="<?php if ($_smarty_tpl->tpl_vars['list']->value['startDateStr']) {
echo date('Y-m',$_smarty_tpl->tpl_vars['list']->value['startDateStr']);
}?>" name="startDate" />
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div> -
                                                <div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">
                                                    <input class="form-control" size="16" type="text" value="<?php if ($_smarty_tpl->tpl_vars['list']->value['endDateStr']) {
echo date('Y-m',$_smarty_tpl->tpl_vars['list']->value['endDateStr']);
}?>" name="endDate" />
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                                <span class="tip"> <input type="checkbox" name="now" /><span class="black">����</span> <span class="gray">�������ڲ�ѡ����ʾ����</span> </span>
                                                <a class="removeExp"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                            </div> </td>
                                    </tr>
                                    <tr>
                                        <th class="optional">��Ŀ����</th>
                                        <td colspan="3" class="input-group-sm"><input type="text" class="form-control indst" name="proName" placeholder="��Ŀ����" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['proName'];?>
" /></td>
                                    </tr>
                                    <tr>
                                        <th class="optional">��Ŀְ��</th>
                                        <td colspan="3" class="input-group-sm"><input type="text" class="form-control indst" name="projectOffice" placeholder="��Ŀְ��" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['projectOffice'];?>
" /></td>
                                    </tr>
                                    <tr>
                                        <th class="optional">���ڹ�˾</th>
                                        <td colspan="3" class="input-group-sm"><input type="text" class="form-control indst" name="subCompany" placeholder="���ڹ�˾" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['subCompany'];?>
" /></td>
                                    </tr>
                                    <tr>
                                        <th class="optional">��Ŀ����</th>
                                        <td colspan="3">
                                            <div class="indst">
                                                <textarea class="form-control" rows="3" name="proDes" onkeyup="wordsDeal(this,1000,'proDesTip');"><?php echo $_smarty_tpl->tpl_vars['list']->value['proDes'];?>
</textarea>
                                                <p class="remainWordTip"><span id="proDesTip">0</span> / 1000</p>
                                            </div> </td>
                                    </tr>
                                    <tr>
                                        <th class="optional">��Ŀְ��</th>
                                        <td colspan="3">
                                            <div class="indst">
                                                <textarea class="form-control" rows="3" name="projectRole" onkeyup="wordsDeal(this,500,'proRoleTip');"><?php echo $_smarty_tpl->tpl_vars['list']->value['projectRole'];?>
</textarea>
                                                <p class="remainWordTip"><span id="proRoleTip">0</span> / 500</p>
                                            </div> </td>
                                    </tr>
                                    <tr>
                                        <th class="optional">��Ŀҵ��</th>
                                        <td colspan="3">
                                            <div class="indst">
                                                <textarea class="form-control" rows="3" name="projectPerfromnance" onkeyup="wordsDeal(this,500,'proPerTip');"><?php echo $_smarty_tpl->tpl_vars['list']->value['projectPerfromnance'];?>
</textarea>
                                                <p class="remainWordTip"><span id="proPerTip">0</span> / 500</p>
                                            </div> </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                            <?php }?>
                            <table>
                                <tbody>
                                <tr>
                                    <td colspan="4">
                                        <div class="addExp addProExp">
                                            +������Ŀ����
                                        </div></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="info info_box">
                        <h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp;��������</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
                        <div class="infoContext workExperience">
                            <?php if ($_smarty_tpl->tpl_vars['resume']->value['edu_n']) {?>
                                <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['resume']->value['edu_n']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                <table class="eduexp" width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr>
                                        <th class="optional">ѧϰʱ��</th>
                                        <td colspan="3">
                                            <div class="form-inline">
                                                <div class="input-group input-group-sm date form_date  ym" data-date-format="yyyy-mm">
                                                    <input class="form-control" size="16" type="text" value="<?php if ($_smarty_tpl->tpl_vars['list']->value['startDateStr']) {
echo date('Y-m',$_smarty_tpl->tpl_vars['list']->value['startDateStr']);
}?>" name="startDate" />
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div> -
                                                <div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">
                                                    <input class="form-control" size="16" type="text" name="endDate" value="<?php if ($_smarty_tpl->tpl_vars['list']->value['endDateStr']) {
echo date('Y-m',$_smarty_tpl->tpl_vars['list']->value['endDateStr']);
}?>" />
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                                <span class="tip"> <input type="checkbox" name="now" /><span class="black">Ŀǰ�ڶ�</span> <span class="gray">�������ڲ�ѡ����ʾ����</span> </span>
                                                <a class="removeExp"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                            </div> </td>
                                    </tr>
                                    <tr>
                                        <th class="optional">ѧУ</th>
                                        <td colspan="3" class="input-group-sm"><input type="text" name="schoolName" class="form-control indst" placeholder="ѧУ����" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['schoolName'];?>
" /></td>
                                    </tr>
                                    <tr>
                                        <th class="optional">רҵ</th>
                                        <td class="input-group-sm"><input type="text" name="majorName" class="form-control adr" placeholder="רҵ" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['majorName'];?>
" /></td>
                                        <th class="optional">ѧ��</th>
                                        <td class="input-group-sm">
                                            <select class="form-control adr" name="edu_degree" id="edu_degree">
                                                <option value="">��ѡ��</option>
                                                <?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['li']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['li']->key => $_smarty_tpl->tpl_vars['li']->value) {
$_smarty_tpl->tpl_vars['li']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['li']->key;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['li']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['list']->value['degree']==$_smarty_tpl->tpl_vars['li']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['li']->value];?>
</option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="empty"></th>
                                        <td clospan="4"> </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table>
                                <?php } ?>
                            <?php }?>
                                <tbody>
                                <tr>
                                    <td colspan="4">
                                        <div class="addExp addEduExp">
                                            +���ӽ�������
                                        </div></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="info info_box">
                        <h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;������Ϣ</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
                        <div class="infoContext workExperience">
                            <textarea class="form-control" rows="3" id="extraInfo" name="extraInfo" onkeyup="wordsDeal(this,1000,'extraInfoTip');" placeholder=" �磺��������ʸ�֤��ȣ���д����1000������"><?php echo $_smarty_tpl->tpl_vars['resume']->value['attach_info'];?>
</textarea>
                            <p class="remainWordTip"><span id="extraInfoTip">0</span> / 1000</p>
                        </div>
                    </div>
                    <div class="info info_box">
                        <h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;��ѡ������</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
                        <div class="infoContext workExperience">
                            <textarea class="form-control" rows="3" id="selfEvaluation" name="selfEvaluation" onkeyup="wordsDeal(this,1000,'selfEvaluationTip');" placeholder=" �������ѡ����������"><?php echo $_smarty_tpl->tpl_vars['resume']->value['description'];?>
</textarea>
                            <p class="remainWordTip"><span id="selfEvaluationTip">0</span> / 1000</p>
                        </div>
                    </div>

                    <div class="info info_box">
                        <h3 class="hd_h3"> <span class="fl sx"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>&nbsp;��ѡ�˱�ǩ</span> <a href="javascript:void(0)" class="icon fr"><span class="glyphicon glyphicon-menu-up"></span></a> </h3>
                        <div class="infoContext tag">
                            <div class="fl" style="margin-top:10px;">

                                <input class="yun_resume_bc" type="inputText" tabindex="1000" id="addfuli"><a class="checkboxAddBton" style="color: #555;">���ӱ�ǩ</a>
                                <input type="hidden" name="tag" id="tag" value="">
                            </div>
                            <div style="clear: both;"></div>
                            <div class="resume_pop_bq fl" style="width: 100%;margin-top: 10px;">
                                <ul id="newtag" style="float: left;margin-bottom:0;">
                                </ul>
                                <ul>
                                    <li class="changetag " data-tag="������" tag-class="1"><em>������</em></li>

                                    <li class="changetag " data-tag="�߼�����ʦ" tag-class="1"><em>�߼�����ʦ</em></li>

                                    <li class="changetag " data-tag="����500ǿ�߹�" tag-class="1"><em>����500ǿ�߹�</em></li>

                                    <li class="changetag " data-tag="����" tag-class="1"><em>����</em></li>

                                    <li class="changetag " data-tag="������" tag-class="1"><em>������</em></li>

                                    <li class="changetag " data-tag="�߼�����" tag-class="1"><em>�߼�����</em></li>

                                    <li class="changetag " data-tag="���۾�Ӣ" tag-class="1"><em>���۾�Ӣ</em></li>

                                    <li class="changetag " data-tag="�������" tag-class="1"><em>�������</em></li>

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
            <input type="hidden" class="resume_id" name="resume_id" value="<?php echo $_GET['id'];?>
" />
            <input type="file" id="file" name="file" style="visibility:hidden" onchange="ajaxFileupload(this)" />
            <div class="apply-buttons">
                <button type="button" id="saveLtCandBtn" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;�������</button>
            </div>
        </form>
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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/Validform_v5.3.2.js"><?php echo '</script'; ?>
>
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
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/swfupload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/swfupload.queue.js"><?php echo '</script'; ?>
>
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
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/uploadInit6.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/files/messenger.min.js" ><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">


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
                    //��ʾ
                    if (curcss.indexOf("down") != -1) {
                        $(this).removeClass(
                            "glyphicon-menu-down");
                        $(this).addClass(
                            "glyphicon-menu-up");
                        $(this).parents("div.info").find(
                            "div.infoContext").show();
                    }
                    //����
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