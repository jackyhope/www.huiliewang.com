<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 09:41:29
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/resume/resume.htm" */ ?>
<?php /*%%SmartyHeaderCode:20617043825bbab5c954ff51-38779623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb554f0a0c68d075a2761e8ad830bd47172418ee' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/resume/resume.htm',
      1 => 1520911420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20617043825bbab5c954ff51-38779623',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'resumestyle' => 0,
    'style' => 0,
    'config' => 0,
    'Info' => 0,
    'UserMember' => 0,
    'key' => 0,
    'v' => 0,
    'one' => 0,
    'uid' => 0,
    'usertype' => 0,
    'talent_pool' => 0,
    'tplurl' => 0,
    'paytpls' => 0,
    'last_recommend' => 0,
    'lietou_num' => 0,
    'job_num' => 0,
    'download_num' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbab5c9836787_70457512',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbab5c9836787_70457512')) {function content_5bbab5c9836787_70457512($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><!DOCtYPE html PUBLIC "-//W3C//DtD XHtML 1.0 transitional//EN" "http://www.w3.org/tR/xhtml1/DtD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name=keywords content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"/>
<meta name=description content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['resumestyle']->value;?>
/css/vita.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/ltqy_detail.css" type="text/css"/>
    <style>
        .vita_Opera_cz_list_icon_tj{background: url("/app/template/resume/images/yun_resume_tj.png") no-repeat}
        .vita_Opera_cz_list_icon_see{background: url("/app/template/resume/images/yun_resume_see.png") no-repeat}
        .btn_2{width: 85px;
            height: 30px;
            line-height: 30px;
            border: none;
            background: #456dab;
            color: #fff;
            cursor: pointer;
            font-family: ΢���ź�;
            margin-right: 10px;
            display: inline-block;}
    </style>
<body>
<div class="yun_resume_content">
<?php if ($_GET['see']!='member'&&$_GET['see']!='used') {?>
<!--header-->
<div class="yun_resume_header">
 <div class="yun_resume_logo">
  <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_logo'];?>
" class="png" style=" border:none;"></a>
  </div>

  <div class="yun_resume_logo_zt">
  ��ţ�<span class="yun_resume_logo_zt_n"><?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
</span>
 <em class="yun_resume_logo_zt_list"> �������£�<span class="yun_resume_logo_zt_n"><?php echo $_smarty_tpl->tpl_vars['Info']->value['lastupdate'];?>
  </span>  </em>
  �����<span class="yun_resume_logo_zt_n"><?php echo $_smarty_tpl->tpl_vars['Info']->value['hits'];?>
�� </span> </div>
   </div>
 <!--header end-->
<?php }?>
<!--/*������ʼ*/-->
<div class="three_vita_content" style="position: relative;">
    <div class="lybq">������Դ��<?php echo $_smarty_tpl->tpl_vars['Info']->value['uploader'];?>
</div>

<div class="three_vita_Basic_top_line three_vita_red"></div>
<div class="three_vita_Basic">

<div class="three_vita_Basic_info">
<div class="three_vita_name">
    <?php echo $_smarty_tpl->tpl_vars['Info']->value['name'];?>

    <span class="three_vita_name_nl"></span>
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['idcard_status']==1&&$_smarty_tpl->tpl_vars['Info']->value['idcard']) {?>
        <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/resume/images/sf.png" title="�������֤"><em class="sf_yz">����֤</em><?php }?>
<?php if ($_smarty_tpl->tpl_vars['UserMember']->value['source']==6&&$_smarty_tpl->tpl_vars['UserMember']->value['claim']==0&&$_smarty_tpl->tpl_vars['UserMember']->value['email']!='') {?>
<a class="resume_rz resume_three_rz" href="javascript:void(0);" onClick="claim('<?php echo smarty_function_url(array('m'=>'ajax','c'=>'claim','uid'=>$_smarty_tpl->tpl_vars['Info']->value['uid']),$_smarty_tpl);?>
')">����</a>
<?php }?>

</div>
<div class="three_vita_line "></div>

<div class="three_vita_Basic_info_t">
    <label class="basic_xx"><?php echo $_smarty_tpl->tpl_vars['Info']->value['sex'];?>
<span class="shuxian">|</span></label>
    <label class="basic_xx"><?php echo $_smarty_tpl->tpl_vars['Info']->value['age'];?>
��<span class="shuxian">|</span></label>
   <?php if ($_smarty_tpl->tpl_vars['Info']->value['useredu']) {?> <label class="basic_xx"><?php echo $_smarty_tpl->tpl_vars['Info']->value['useredu'];?>
 <span class="shuxian">|</span></label><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['user_exp']) {?><label class="basic_xx"> <?php echo $_smarty_tpl->tpl_vars['Info']->value['user_exp'];?>
��������<span class="shuxian">|</span></label> <?php }?>
<?php if ($_smarty_tpl->tpl_vars['Info']->value['basic_info']=='1') {?>
<?php if ($_smarty_tpl->tpl_vars['Info']->value['user_marriage']) {?><label class="basic_xx"><?php echo $_smarty_tpl->tpl_vars['Info']->value['user_marriage'];?>
 <span class="shuxian">|</span></label><?php }?>
<?php }?>
  <?php if ($_smarty_tpl->tpl_vars['Info']->value['living']) {?><label class="basic_xx"><?php echo $_smarty_tpl->tpl_vars['Info']->value['living'];?>
</label> <?php }?>

</div>

<div class="three_vita_Basic_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['Info']->value['resume_photo'];?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);" width="80" height="100"></div>
</div>


<div class="three_vita_list_cont">
<!--��ְ����-->
<div class="three_vita_list">
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['citys_name']) {?>
    <div class="three_vita_Intention  three_vita_Intention_w420">
        ���������أ�
        <span class="three_vita_Intention_em">
            <?php echo $_smarty_tpl->tpl_vars['Info']->value['citys_name'];?>

        </span>
    </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['hy']||$_smarty_tpl->tpl_vars['Info']->value['user_jy']['hy_name']) {?>
    <div class="three_vita_Intention">������ҵ��<span class="three_vita_Intention_em">
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['hy']) {
echo $_smarty_tpl->tpl_vars['Info']->value['hy'];
} else {
echo $_smarty_tpl->tpl_vars['Info']->value['user_jy']['hy_name'];
}?></span>
    </div>
    <?php }?>
    <div class="three_vita_Intention three_vita_Intention_w420">������н<span class="three_vita_Intention_em">��
        <?php if ($_smarty_tpl->tpl_vars['Info']->value['salary_n']) {?>
            ��<?php echo $_smarty_tpl->tpl_vars['Info']->value['salary_n'];?>
������
        <?php } else { ?>
            ����
        <?php }?>
    </span>
    </div>

<?php if ($_smarty_tpl->tpl_vars['Info']->value['report']) {?><div class="three_vita_Intention ">��ְʱ�䣺<span class="three_vita_Intention_em"><?php echo $_smarty_tpl->tpl_vars['Info']->value['report'];?>
</span></div><?php }?>

<?php if ($_smarty_tpl->tpl_vars['Info']->value['jobstatus']) {?><div class="three_vita_Intention">��ְ״̬��<span class="three_vita_Intention_em"><?php echo $_smarty_tpl->tpl_vars['Info']->value['jobstatus'];?>
</span></div><?php }?>

    <?php if ($_smarty_tpl->tpl_vars['Info']->value['expectjob']) {?>
    <div class="three_vita_Intention" style="width:100%">����ְλ��

    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Info']->value['expectjob']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['key']->value<5) {?>
        <span class="resume_job_tag"><i class="resume_job_tag_icon"></i><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</span>
        <?php }?>
    <?php } ?>
    </div>
    <?php }?>

</div>
<!--��ְ���� end-->

<!--��������-->
<?php if (is_array($_smarty_tpl->tpl_vars['Info']->value['user_work'])&&!empty($_smarty_tpl->tpl_vars['Info']->value['user_work'])) {?>
<div class="three_vita_list" id="m3">
<div class="three_vita_list_h1">
    <label class="ico_ico ico_icogz"></label>
    <span class="three_vita_list_h1_span ">��������</span>

<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Info']->value['user_work']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
<div class="three_vita_skill">
<div  class="three_vita_introduction_a three_vita_dw_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['companyName'];?>
</div >
<div class="three_vita_skill_introduction">
<div class="three_vita_introduction_a three_vita_date">
    <label class="title_le">����ʱ�䣺</label>
    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['one']->value['startDateStr'],"%Y��%m��");?>
 - <?php if ($_smarty_tpl->tpl_vars['one']->value['endDateStr']) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['one']->value['endDateStr'],"%Y��%m��");
} else { ?>����<?php }?>
</div >
<?php if ($_smarty_tpl->tpl_vars['one']->value['posName']) {?>
    <div class="three_vita_introduction_a three_vita_date">
        <label class="title_le">��ְְλ��</label>
        <label class="content_ri"><?php echo $_smarty_tpl->tpl_vars['one']->value['posName'];?>
</label>
    </div >
    <?php }?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['one']->value['companyDes']) {?>
    <div class="three_vita_skill_Intention">
        <label class="title_le">��˾���ܣ�</label>
        <label class="content_ri"><?php echo $_smarty_tpl->tpl_vars['one']->value['companyDes'];?>
 </label>
    </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['one']->value['workDes']) {?>
    <div class="three_vita_skill_Intention">
        <label class="title_le">����������</label>
        <label class="content_ri"><?php echo $_smarty_tpl->tpl_vars['one']->value['workDes'];?>
 </label>
    </div>
    <?php }?>
</div>
<?php } ?>

</div>
<?php }?>
<!--�������� end-->

<?php if (is_array($_smarty_tpl->tpl_vars['Info']->value['user_project'])&&!empty($_smarty_tpl->tpl_vars['Info']->value['user_project'])) {?>
<div class="three_vita_list" id="m4">
<div class="three_vita_list_h1">
    <label class="ico_ico ico_icoxm"></label>
    <span class="three_vita_list_h1_span">��Ŀ����</span>
</div>
<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Info']->value['user_project']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
<div class="three_vita_skill">
<div class="three_vita_skill_introduction">

<div  class="three_vita_dw_bm three_vita_dw_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['proName'];?>
</div >
    <div class="three_vita_introduction_a three_vita_date">
        <label class="title_le">��Ŀʱ�䣺</label>
        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['one']->value['startDateStr'],"%Y��%m��");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['one']->value['endDateStr'],"%Y��%m��");?>

    </div >
<?php if ($_smarty_tpl->tpl_vars['one']->value['projectOffice']) {?>
<div  class="three_vita_introduction_a three_vita_date"><label class="title_le">��Ŀְ��</label><?php echo $_smarty_tpl->tpl_vars['one']->value['projectOffice'];?>
</div >
<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['one']->value['subCompany']) {?>
    <div  class="three_vita_introduction_a three_vita_date">
        <label class="title_le">���ڹ�˾��</label><?php echo $_smarty_tpl->tpl_vars['one']->value['subCompany'];?>

    </div >
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['one']->value['proDes']) {?>
    <div class="three_vita_skill_Intention">
        <label class="title_le">��Ŀ��飺</label>
        <label class="content_ri"><?php echo $_smarty_tpl->tpl_vars['one']->value['proDes'];?>
 </label>
    </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['one']->value['projectRole']) {?>
    <div class="three_vita_skill_Intention">
        <label class="title_le">��Ŀ���Σ�</label>
        <label class="content_ri"><?php echo $_smarty_tpl->tpl_vars['one']->value['projectRole'];?>
 </label>
    </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['one']->value['projectPerfromnance']) {?>
    <div class="three_vita_skill_Intention">
        <label class="title_le">��Ŀҵ����</label>
        <label class="content_ri"><?php echo $_smarty_tpl->tpl_vars['one']->value['projectPerfromnance'];?>
 </label>
    </div>
    <?php }?>
</div>
</div>
<?php } ?>
</div>
<?php }?>
    <!--��������-->
    <?php if (is_array($_smarty_tpl->tpl_vars['Info']->value['user_edu'])&&!empty($_smarty_tpl->tpl_vars['Info']->value['user_edu'])) {?>
    <div class="three_vita_list" id="m0">
        <div class="three_vita_list_h1">
            <label class="ico_ico ico_icojy"></label>
            <span class="three_vita_list_h1_span">��������</span></div>

        <?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Info']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
        <div class="three_vita_skill">
            <div class="three_vita_skill_introduction">
                <div class="three_vita_introduction_a three_vita_date">
                    <label style="font-weight: bold;color: #333333;"><?php echo $_smarty_tpl->tpl_vars['one']->value['schoolName'];?>
</label>��<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['one']->value['startDateStr'],"%Y��%m��");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['one']->value['endDateStr'],"%Y��%m��");?>
��
                </div>
                <div class="three_vita_introduction_a three_vita_date" style="margin-top: 10px;">
                    <?php if ($_smarty_tpl->tpl_vars['one']->value['majorName']) {?>
                    <label>רҵ��<?php echo $_smarty_tpl->tpl_vars['one']->value['majorName'];?>
 <label>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['one']->value['degree_n']) {?>
                        <label style="margin-left: 50px;">ѧ����<?php echo $_smarty_tpl->tpl_vars['one']->value['degree_n'];?>
 <label>
                            <?php }?>
                </div>
            </div>
        </div>
        <?php } ?>


    </div>
    <?php }?>
    <!--�������� end-->
    <!--רҵ����-->

    <?php if (is_array($_smarty_tpl->tpl_vars['Info']->value['user_skill'])&&!empty($_smarty_tpl->tpl_vars['Info']->value['user_skill'])) {?>
    <div class="three_vita_list" id="m2">
        <div class="three_vita_list_h1">
            <label class="ico_ico ico_icojn"></label>
            <span class="three_vita_list_h1_span">ְҵ����</span>
        </div>
        <?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Info']->value['user_skill']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
        <div class="three_vita_skill">
            <div class="three_vita_skill_introduction">
                <div  class="three_vita_introduction_a three_vita_date">�������ƣ�<?php echo $_smarty_tpl->tpl_vars['one']->value['name'];?>
</div >
                <div class="three_vita_introduction_a three_vita_date">����ʱ�䣺<?php echo $_smarty_tpl->tpl_vars['one']->value['longtime'];?>
�� </div>
                <?php if ($_smarty_tpl->tpl_vars['one']->value['pic']) {?>
                <div class="three_vita_introduction_a three_vita_date" style="margin-top:10px">
                    <label style="vertical-align: top;">����֤�飺</label><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['one']->value['pic'];?>
"  width="95" height="70" ></div>
                <?php }?>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php }?>


<?php if (is_array($_smarty_tpl->tpl_vars['Info']->value['user_tra'])&&!empty($_smarty_tpl->tpl_vars['Info']->value['user_tra'])) {?>
<div class="three_vita_list" id="m1">
<div class="three_vita_list_h1">
    <label class="ico_ico ico_icopx"></label>
    <span class="three_vita_list_h1_span">��ѵ����</span>
</div>
<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Info']->value['user_tra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
<div class="three_vita_skill">
  <div  class="three_vita_introduction_a three_vita_dw_name"><?php echo $_smarty_tpl->tpl_vars['one']->value['name'];?>
 </div >
<div class="three_vita_skill_introduction">
<div class="three_vita_introduction_a three_vita_date">��ѵʱ�䣺<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['one']->value['sdate'],"%Y��%m��");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['one']->value['edate'],"%Y��%m��");?>
 </div>
<?php if ($_smarty_tpl->tpl_vars['one']->value['title']) {?><div class="three_vita_introduction_a three_vita_date">��ѵ����<?php echo $_smarty_tpl->tpl_vars['one']->value['title'];?>
</div ><?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['one']->value['content']) {?><div class="three_vita_skill_Intention">רҵ������<?php echo $_smarty_tpl->tpl_vars['one']->value['content'];?>
 </div><?php }?>
</div>
<?php } ?>
</div>
<?php }?>

<?php if (is_array($_smarty_tpl->tpl_vars['Info']->value['user_other'])&&!empty($_smarty_tpl->tpl_vars['Info']->value['user_other'])) {?>
<div class="three_vita_list" id="m6">
<div class="three_vita_list_h1">
    <label class="ico_ico ico_icoqt"></label>
    <span class="three_vita_list_h1_span">������Ϣ</span>
</div>
<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Info']->value['user_other']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
<div class="three_vita_skill">
<div class="three_vita_skill_Intention"><i class="three_vita_Intention_i"></i>�������⣺<?php echo $_smarty_tpl->tpl_vars['one']->value['name'];?>
 </div>
</div>
<div class="three_vita_skill">
<?php if ($_smarty_tpl->tpl_vars['one']->value['content']) {?><div class="three_vita_skill_Intention"><i class="three_vita_Intention_i"></i>����������<?php echo $_smarty_tpl->tpl_vars['one']->value['content'];?>
 </div><?php }?>
</div>
<?php } ?>
</div>
<?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['Info']->value['attach_info'])) {?>
    <!--��������-->
    <div class="three_vita_list">
        <div class="three_vita_list_h1">
            <label class="ico_ico ico_icofj"></label>
            <span class="three_vita_list_h1_span">������Ϣ</span>
        </div>
        <div class="three_vita_skill">
            <div class="three_vita_skill_Intention"><?php echo $_smarty_tpl->tpl_vars['Info']->value['attach_info'];?>
 </div>
        </div>
    </div>
    <?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['Info']->value['description'])) {?>
    <!--��������-->
    <div class="three_vita_list">
        <div class="three_vita_list_h1">
            <label class="ico_ico ico_icopj"></label>
            <span class="three_vita_list_h1_span">��ѡ������</span>
        </div>
        <div class="three_vita_skill">
            <div class="three_vita_skill_Intention"><?php echo $_smarty_tpl->tpl_vars['Info']->value['description'];?>
 </div>
            <?php if ($_smarty_tpl->tpl_vars['Info']->value['arrayTag']) {?>
            <div class="three_vita_skill_Intention">���˱�ǩ��
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Info']->value['arrayTag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?><span class="resume_user_bq"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</span><?php } ?>
            </div>
            <?php }?>
        </div>
    </div>
    <?php }?>
    <!--�������� end-->
<?php if (is_array($_smarty_tpl->tpl_vars['Info']->value['user_show'])&&!empty($_smarty_tpl->tpl_vars['Info']->value['user_show'])) {?>
<div class="three_vita_list">
<div class="three_vita_list_h1">
    <label class="ico_ico ico_ico1"></label>
    <span class="three_vita_list_h1_span">�ҵ���Ʒ</span>
</div>

    <div class="fairs_introduction_p" >
        <ul class="fairs_introduction_img" id="rolling_img1">
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Info']->value['user_show']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <li>
                <a class="image_gall" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['picurl'];?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['picurl'];?>
" width="215" height="153" />
                </a>
            </li>
		<?php } ?>
        </ul>
    </div>
</div>
<?php }?>
     <?php if ($_smarty_tpl->tpl_vars['Info']->value['doc']) {?>
        <!--ճ������-->
       <div class="three_vita_list">
<div class="three_vita_list_h1"><span class="three_vita_list_h1_span">��������</span></div>
<div class="three_vita_skill">
<div class="three_vita_skill_Intention">      <?php echo $_smarty_tpl->tpl_vars['Info']->value['user_doc']['doc'];?>
 </div>


</div>
</div>

       <?php }?>

<div class="three_vita_list">
<div class="three_vita_list_h1">
    <label class="ico_ico ico_icolx"></label>
    <span class="three_vita_list_h1_span">��ϵ��ʽ</span>
</div>
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['link_msg']&&$_smarty_tpl->tpl_vars['Info']->value['uid']!=$_smarty_tpl->tpl_vars['uid']->value) {?>
    <div class="re_touch" ><?php echo $_smarty_tpl->tpl_vars['Info']->value['link_msg'];?>
</div>
    <?php } else { ?>
<?php if ($_smarty_tpl->tpl_vars['Info']->value['m_status']=="1"||$_smarty_tpl->tpl_vars['usertype']->value==3) {?>
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['telphone']) {?>
    <div class="three_vita_Intention fonw">��ϵ�ֻ���<?php echo $_smarty_tpl->tpl_vars['Info']->value['telphone'];?>
</div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['telhome']) {?>
    <div class="three_vita_Intention fonw">��ϵ������<?php echo $_smarty_tpl->tpl_vars['Info']->value['telhome'];?>
 </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['email']) {?>
    <div class="three_vita_Intention fonw">�������䣺<?php echo $_smarty_tpl->tpl_vars['Info']->value['email'];?>
 </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['address']) {?>
    <div class="three_vita_Intention fonw">��ϸ��ַ��<?php echo mb_substr($_smarty_tpl->tpl_vars['Info']->value['address'],0,16,'gbk');?>
</div>
    <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['Info']->value['qq']) {?>
        <div class="three_vita_Intention fonw">��ϵQ Q��<?php echo $_smarty_tpl->tpl_vars['Info']->value['qq'];?>
</div>
       <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['homepage']) {?>
    <div class="three_vita_Intention fonw">������ҳ��<?php echo $_smarty_tpl->tpl_vars['Info']->value['homepage'];?>
</div>
    <?php }?>

    <div class="three_vita_Intention fonw">
    <?php if ($_smarty_tpl->tpl_vars['Info']->value['idcard']) {?><span>���֤�ţ�</span>
    <span class="three_vita_Identity">
    <?php echo $_smarty_tpl->tpl_vars['Info']->value['idcard'];?>

    </span>
    <?php }?>
    </div>
	<?php if ($_smarty_tpl->tpl_vars['Info']->value['wxewm']) {?>
    <div class="one_vita_ewm_box"><img src=".<?php echo $_smarty_tpl->tpl_vars['Info']->value['wxewm'];?>
" width="120" height="120"><div class="one_vita_ewm_box_p">���˶�ά��</div></div>
    <?php }?>
   <?php } else { ?>
   <div class="re_touch" ><?php echo $_smarty_tpl->tpl_vars['Info']->value['link_msg'];?>
</div>
  <?php }?>

<?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['Info']->value['user_jy']['annex']) {?>
<div class="three_vita_list">
<div class="three_vita_list_h1"><span class="three_vita_list_h1_span">��������</span></div>
   <div class="re_touch fl" ><?php if ($_smarty_tpl->tpl_vars['Info']->value['m_status']=="1") {?><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];
echo $_smarty_tpl->tpl_vars['Info']->value['user_jy']['annex'];?>
"><?php echo $_smarty_tpl->tpl_vars['Info']->value['user_jy']['annexname'];?>
</a><?php } else { ?><a ><?php echo $_smarty_tpl->tpl_vars['Info']->value['user_jy']['annexname'];?>
</a>(����������ϵ��ʽ��)<?php }?></div>
</div>
 <?php }?>
</div>


</div>
</div>
</div>
<div id='for_link' class="none" style="float:left;width:350px">
	<div class="city_1" style="padding-top:5px;"></div>
	<div class="btn" style="float: left; padding-bottom: 20px; padding-top: 10px; width: 100%; text-align: center;">

        <?php if ($_smarty_tpl->tpl_vars['Info']->value['file_path']) {?>
        <a href="/resumes/index.php?eid=<?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
" class="btn_2 btn">�鿴ԭ��</a>
        <?php }?>
       <a href="<?php echo smarty_function_url(array('m'=>'ajax','c'=>'resume_word','id'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
" class="btn_1">���ؼ���</a>
	</div>
</div>

<!--�Ҳ���� Ԥ��ʱ����-->
<?php if ($_GET['see']!='member'&&$_GET['see']!='used') {?>
<div class="yun_resume_operation" id="operation_box">
  <div class="yun_resume_operation_box">
  <div class="yun_resume_operation_box_h1">������</div>
      <?php if ($_smarty_tpl->tpl_vars['Info']->value['file_path']) {?>
      <?php if (($_smarty_tpl->tpl_vars['Info']->value['downresume']==1||$_smarty_tpl->tpl_vars['usertype']->value==3)&&$_smarty_tpl->tpl_vars['Info']->value['file_path']) {?>
      <div class="vita_Opera_cz_list">
          <i class="vita_Opera_cz_list_icon vita_Opera_cz_list_icon_see"></i>
          <a class="vita_btn_1 yun_resume_cz_sub" type="button" href="/resumes/index.php?eid=<?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
" target="_blank">�鿴ԭ��</a>
      </div>
      <?php } elseif ($_smarty_tpl->tpl_vars['usertype']->value==null) {?>
      <div class="vita_Opera_cz_list">
          <i class="vita_Opera_cz_list_icon vita_Opera_cz_list_icon_see"></i>
          <input class="vita_btn_1 yun_resume_cz_sub"  onClick="add_user_talent('<?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['usertype']->value;?>
')" type="button" name="submit" value="�鿴ԭ�� ">
      </div>
      <?php } else { ?>
      <div class="vita_Opera_cz_list">
          <i class="vita_Opera_cz_list_icon vita_Opera_cz_list_icon_see"></i>
          <input class="vita_btn_1 yun_resume_cz_sub" onClick="for_link('<?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
','<?php echo smarty_function_url(array('m'=>'ajax','c'=>'for_link'),$_smarty_tpl);?>
','<?php echo smarty_function_url(array('m'=>'ajax','c'=>'resume_word','id'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
',1);" type="button" name="submit" value="�鿴ԭ�� ">
      </div>
      <?php }?>
      <?php }?>

      <?php if ($_smarty_tpl->tpl_vars['usertype']->value==3) {?>
      <div class="vita_Opera_cz_list">
          <i class="vita_Opera_cz_list_icon vita_Opera_cz_list_icon_tj"></i>
          <a class="vita_btn_1 yun_resume_cz_sub" type="button" href="/member/index.php?c=resume&act=jobrecommend&eid=<?php echo $_GET['id'];?>
" >�Ƽ�ְλ</a>
      </div>
      <?php }?>

  <?php if (is_array($_smarty_tpl->tpl_vars['talent_pool']->value)) {?>
    <div class="vita_Opera_cz_list">
    <i class="vita_Opera_cz_list_icon vita_Opera_cz_list_icon_sc"></i>
      <input class="vita_btn_1 yun_resume_cz_sub yun_resume_cz_sub_cor"type="button" onClick="layer.msg('�ü����Ѽ��뵽�˲ſ⣡',2,8);" value="���ղؼ���">

    </div>
    <?php } else { ?>
    <div class="vita_Opera_cz_list">
        <i class="vita_Opera_cz_list_icon vita_Opera_cz_list_icon_sc"></i>
      <input class="vita_btn_1 yun_resume_cz_sub" type="button" onClick="add_user_talent('<?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['usertype']->value;?>
')" value="�ղؼ���">
    </div>
    <?php }?>

      <?php if ($_smarty_tpl->tpl_vars['usertype']->value==3) {?>
      <div class="vita_Opera_cz_list">
          <i class="vita_Opera_cz_list_icon vita_Opera_cz_list_icon_sc"></i>
          <a href="<?php echo smarty_function_url(array('m'=>'ajax','c'=>'resume_report','id'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
" class="vita_btn_1 yun_resume_cz_sub">�����Ƽ�����</a>
      </div>
      <?php }?>

      <?php if (1==1) {?>
	<div class="vita_Opera_cz_list">
     <i class="vita_Opera_cz_list_icon vita_Opera_cz_list_icon_xz"></i>
	 <?php if ($_smarty_tpl->tpl_vars['uid']->value==$_smarty_tpl->tpl_vars['Info']->value['uid']) {?>
        <a href="<?php echo smarty_function_url(array('m'=>'ajax','c'=>'resume_word','id'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
" class="vita_btn_1 yun_resume_cz_sub"><?php if ($_smarty_tpl->tpl_vars['usertype']->value!=3) {?>������ϵ��ʽ<?php } else { ?>���ؼ���<?php }?></a>
     <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['usertype']->value==2||$_smarty_tpl->tpl_vars['usertype']->value==3) {?>

  <?php if ($_smarty_tpl->tpl_vars['Info']->value['downresume']==1) {?>
      <a href="<?php echo smarty_function_url(array('m'=>'ajax','c'=>'resume_word','id'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
" class="vita_btn_1 yun_resume_cz_sub"><?php if ($_smarty_tpl->tpl_vars['usertype']->value!=3) {?>������ϵ��ʽ<?php } else { ?>���ؼ���<?php }?></a>
      <?php } else { ?>
        <input class="vita_btn_1 yun_resume_cz_sub" onClick="for_link('<?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
','<?php echo smarty_function_url(array('m'=>'ajax','c'=>'for_link'),$_smarty_tpl);?>
','<?php echo smarty_function_url(array('m'=>'ajax','c'=>'resume_word','id'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
');" type="button" name="submit" value="������ϵ��ʽ ">
        <?php }?>
    <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['usertype']->value==3) {?>
        <a href="<?php echo smarty_function_url(array('m'=>'ajax','c'=>'resume_word','id'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
" class="vita_btn_1 yun_resume_cz_sub">���ؼ���</a>
        <?php } else { ?>
        <input class="vita_btn_1 yun_resume_cz_sub" onClick="for_link('<?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
','<?php echo smarty_function_url(array('m'=>'ajax','c'=>'for_link'),$_smarty_tpl);?>
','<?php echo smarty_function_url(array('m'=>'ajax','c'=>'resume_word','id'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
');" type="button" name="submit" value="������ϵ��ʽ ">
        <?php }?>
       <!--<input class="vita_btn_1 yun_resume_cz_sub" onClick="addjob();" type="button" name="submit" value="������ϵ��ʽ ">-->
    <?php }?>


    </div>
      <?php }?>
    <div class="vita_Opera_cz_list">
        <i class="vita_Opera_cz_list_icon vita_Opera_cz_list_icon_dy"></i>
      <input class="vita_btn_1 vita_red yun_resume_cz_sub" type="button" onClick="dayin()" value="��ӡ���� ">
    </div>
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
" id="eid">

  </div>

</div>

<div id='for_link'  class="none"  style="float:left;width:350px">
	<div class="city_1" style="padding-top:5px;"></div>
	<div class="btn" style="float: left; padding-bottom: 20px; padding-top: 10px; width: 100%; text-align: center;">
        <?php if (($_smarty_tpl->tpl_vars['Info']->value['downresume']==1||$_smarty_tpl->tpl_vars['usertype']->value==3)&&$_smarty_tpl->tpl_vars['Info']->value['file_path']) {?>
       <a href="<?php echo smarty_function_url(array('m'=>'ajax','c'=>'resume_word','id'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
" class="resume_bthxz">������ϵ��ʽ</a>
        <?php } else { ?>
        <a href="/resumes/index.php?eid=<?php echo $_smarty_tpl->tpl_vars['Info']->value['id'];?>
" class="resume_bthxz">�鿴ԭ��</a>
        <?php }?>
	</div>
</div>

<?php }?>
<?php if ($_GET['see']=='member') {?>
<!--ʹ�ø�ģ�� Ԥ��ʱ����  -->
<div class="expext_yl_box_bth"><?php if (in_array($_smarty_tpl->tpl_vars['tplurl']->value['id'],$_smarty_tpl->tpl_vars['paytpls']->value)) {?>
	<a href="javascript:;" onClick="settemplate('ȷ�����ø�ģ�棿', '<?php echo smarty_function_url(array('m'=>'ajax','c'=>'settpl','id'=>$_smarty_tpl->tpl_vars['tplurl']->value['id'],'eid'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
');" class="expext_yl_box_sub">ʹ�ø�ģ��</a>
	<?php } else { ?>
	<a href="javascript:void(0);" onClick="settemplate('����ģ�潫����<?php echo $_smarty_tpl->tpl_vars['tplurl']->value['price'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
���Ƿ������', '<?php echo smarty_function_url(array('m'=>'ajax','c'=>'pay','id'=>$_smarty_tpl->tpl_vars['tplurl']->value['id'],'eid'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
');" class="expext_yl_box_sub">����ʹ�ø�ģ��</a>
	<?php }?></div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['usertype']->value=='2') {?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/packpay.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<!--footer-->
<div class="clear"></div>
<?php if ($_GET['see']!='member'&&$_GET['see']!='used') {?>
<div class="yun_resume_foot"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
</a> &copy; ��Ȩ���� <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
  ������Ƹ��������Ϣ�� ,δ��������Ȩ����ת�� <br />
<div id="uclogin" class="none"></div>
</div>
<?php }?>
</div>
<div id="uclogin" class="none"></div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
var integral_pricename='<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
';
var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
";
var downurl="<?php echo smarty_function_url(array('m'=>'ajax','c'=>'down_resume'),$_smarty_tpl);?>
";
var reid="<?php echo $_GET['reid'];?>
";
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/resume.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/popImage/jquery.popImage.mini.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/ScrollPic.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$(function(){
	$("a.image_gall").popImage();
})

var li_num=$("#rolling_img1 li").length;
if(li_num>3){//���ͼƬ�������㣬�Ͳ�ִ���л�
	var scrollPic_02 = new ScrollPic();
	scrollPic_02.scrollContId   = "rolling_img1"; //��������ID
	scrollPic_02.arrLeftId      = "LeftArr";//���ͷID
	scrollPic_02.arrRightId     = "RightArr"; //�Ҽ�ͷID
	scrollPic_02.frameWidth     = 728;//��ʾ����
	scrollPic_02.pageWidth      = 225; //��ҳ���
	scrollPic_02.speed          = 10; //�ƶ��ٶ�(��λ���룬ԽСԽ��)
	scrollPic_02.space          = 10; //ÿ���ƶ�����(��λpx��Խ��Խ��)
	scrollPic_02.autoPlay       = true; //�Զ�����
	scrollPic_02.autoPlayTime   = 2; //�Զ����ż��ʱ��(��)
	scrollPic_02.initialize(); //��ʼ��
}

$(function () {
    $(".closeico").click(function () {
        $(this).closest(".dibujlxx").hide();
    })
})

<?php echo '</script'; ?>
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
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/login.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/resume_include.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>




<?php if ($_smarty_tpl->tpl_vars['usertype']->value==3) {?>
<div class="dibujlxx">
    <div class="dibujlxx_content">
        <img class="jianltx" src="<?php echo $_smarty_tpl->tpl_vars['Info']->value['resume_photo'];?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);" width="60" height="60">
        <div class="xx_list">
            <label class="namejl"><?php if ($_smarty_tpl->tpl_vars['Info']->value['m_status']=="1") {
echo $_smarty_tpl->tpl_vars['Info']->value['username_n'];
} else {
echo $_smarty_tpl->tpl_vars['Info']->value['name'];
}?></label>
            <label class="ssssjl" style="width: 110px;">
                <span class="time_jl"><?php if ($_smarty_tpl->tpl_vars['last_recommend']->value) {
echo $_smarty_tpl->tpl_vars['last_recommend']->value;
} else { ?>�����Ƽ�<?php }?></span><br>
                <span class="time_js">����Ƽ�ʱ��</span>
            </label>
            <label class="ssssjl">
                <span class="time_jl"><?php echo $_smarty_tpl->tpl_vars['lietou_num']->value;?>
</span><label class="small">λ</label><br>
                <span class="time_js">������ͷ</span>
            </label>
            <label class="ssssjl">
                <span class="time_jl"><?php echo $_smarty_tpl->tpl_vars['job_num']->value;?>
</span><label class="small">��</label><br>
                <span class="time_js">�Ƽ�ְλ</span>
            </label>
            <label class="ssssjl">
                <span class="time_jl"><?php echo $_smarty_tpl->tpl_vars['download_num']->value;?>
</span><label class="small">��</label><br>
                <span class="time_js">HR����</span>
            </label>
            <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/tubiaoqi1.png" class="qyfuss"/>
            <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/closeico.png" class="closeico"/>
        </div>
    </div>
</div>
<?php }?>
</body>
</html><?php }} ?>
