<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-08-06 16:31:35
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/user/info.htm" */ ?>
<?php /*%%SmartyHeaderCode:12246157155b680767d30a04-40626238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e13c9387d89fb3c31c900b3cde001390b334d11' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/user/info.htm',
      1 => 1517989940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12246157155b680767d30a04-40626238',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'style' => 0,
    'save' => 0,
    'row' => 0,
    'user_photo' => 0,
    'nametype' => 0,
    'key' => 0,
    'v' => 0,
    'arr_data' => 0,
    'j' => 0,
    'userclass_name' => 0,
    'userdata' => 0,
    'user_style' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b680767e3b7f0_23558824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b680767e3b7f0_23558824')) {function content_5b680767e3b7f0_23558824($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
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
<div class="yun_user_member_w1100">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/index.js"><?php echo '</script'; ?>
>
<form name="MyForm" method="post" action="index.php?c=info&act=save" target="supportiframe" onsubmit="return CheckPost();" enctype="multipart/form-data">
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
  <div class="mian_right fltR mt20">
    <div class="member_right_index_h1 fltL"> <span class="member_right_h1_span fltL">������Ϣ</span> <i class="member_right_h1_icon user_bg"></i></div>
    <div class="clear"></div>
    <?php if ($_smarty_tpl->tpl_vars['save']->value) {?>
    <div id="forms"class="text_tips">�����ϴ�δ�ύ�ɹ������� <a href="javascript:;" onclick="saveuser();" class="text_tips_a">�ָ�����</a> <i id="close"class="text_tips_close"></i></div>
    <?php }?>
      <div class="resume_box_list" style="margin-top:0px;">
          <div class="yun_uer_info_photo">
            <div class="yun_uer_info_photo_pt">
				
                <?php if ($_smarty_tpl->tpl_vars['row']->value['sex']==1) {?>
                <img src=".<?php echo $_smarty_tpl->tpl_vars['user_photo']->value;?>
" id="user_photo" border="0" height="100" width="80" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);" />
                <?php } else { ?>
                <img src=".<?php echo $_smarty_tpl->tpl_vars['user_photo']->value;?>
" id="user_photo" border="0" height="100" width="80" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_iconv'];?>
',2);" />
                <?php }?>                
               
				<div class="photo_submit">
                <input id="image" class="photo_submit_p" type="file" name="image" onchange="ajaxfile();">
                </div>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['row']->value['photo']) {?>
              <span onclick="phototype()"><input type="checkbox" id='phototype' value='1' <?php if ($_smarty_tpl->tpl_vars['row']->value['phototype']==1) {?>checked="checked"<?php }?>/><span class="yun_uer_info_photo_pt_no">ͷ�񲻹���</span></span><?php }?>
          </div>
       </div>
      <div class="formbox02">
        <ul>
          <li class="short">
            <div class="name"><b>*</b> �� ����</div>
            <div class="text">
              <input name="name" id="name"  type="text" maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" class="info_text text_if" />
              <span id="by_name" class="errordisplay">��������Ϊ��</span> 
			  
			  </div>
			  <div class="text  text_seclet_cur4">
              <div class="yun_uesr_textw94">
                <input class="SpFormLBut text_seclet_w94 " type="button" value="<?php echo $_smarty_tpl->tpl_vars['nametype']->value[$_smarty_tpl->tpl_vars['row']->value['nametype']];?>
"   id="nametypec" onclick="search_show('job_nametypec');">
              </div>
              <input type="hidden" id="nametypecid" name="nametype" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['nametype'];?>
"  />
              <div class="cus_sel_opt_panel cu_sel_opt_panel_w94" style="display:none" id="job_nametypec">
                <ul class="Search_Condition_box_list">
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['nametype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <li><a href="javascript:void(0);" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
','nametypec','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
');"> <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a></li>
                  <?php } ?>
                </ul>
              </div>
              <span id="by_educid" class="errordisplay">��ѡ������̶�</span> </div>
          </li>
          <li class="short">
            <div class="name"><b>*</b> �� ��</div>
            <div class="text text_seclet_cur4"> 
            
              <input type="hidden" id="sex" name="sex" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sex'];?>
" />                        
              <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_data']->value['sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <span class="yun_info_sex <?php if ($_smarty_tpl->tpl_vars['j']->value==$_smarty_tpl->tpl_vars['row']->value['sex']) {?>yun_info_sex_cur<?php }?>" id="sex<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
" onclick="checksex('<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
')"><i class="usericon_sex usericon_sex<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
"></i><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</span>                     
              <?php } ?>              
              
              </div>
            <span id="by_sex" class="errordisplay">��ѡ���Ա�</span> </li>
          <li class="short">
            <div class="name"> <b>*</b> �������£�</div>
            <div class="text"> 
				<input name="birthday" id="birthday"  type="text" maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['birthday'];?>
" class="info_text text_if" />
            </div>
			<?php echo '<script'; ?>
 type="text/javascript">
				$('#birthday').fdatepicker({format: 'yyyy-mm-dd',initialDate: '1989-02-12',startView:4,minView:2});   
				<?php echo '</script'; ?>
>
            <span id="by_birthday" class="errordisplay">����ȷ��д��������</span>
			</li>
          <li class="short">
            <div class="name"><b>*</b> ���ѧ����</div>
            <div class="text text_seclet_cur3">
              <div class="yun_uesr_text">
                <input class="SpFormLBut text_seclet_w200" type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['edu']=='') {?>  value="��ѡ������̶�" <?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['edu']];?>
" <?php }?>  id="educ" onclick="search_show('job_educ');">
              </div>
              <input type="hidden" id="educid" name="edu" <?php if ($_smarty_tpl->tpl_vars['row']->value['edu']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['edu'];?>
" <?php }?> />
              <div class="cus_sel_opt_panel cu_sel_opt_panel_w200" style="display:none" id="job_educ">
                <ul class="Search_Condition_box_list">
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','educ','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                  <?php } ?>
                </ul>
              </div>
              <span id="by_educid" class="errordisplay">��ѡ������̶�</span> </div>
          </li>
          <li class="short">
            <div class="name"> <b>*</b> �������飺</div>
            <div class="text text_seclet_cur4">
              <div class="yun_uesr_text">
                <input class="SpFormLBut text_seclet_w200" type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['exp']=='') {?>  value="��ѡ��������" <?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['exp']];?>
" <?php }?>  id="exp" onclick="search_show('job_exp');">
              </div>
              <input type="hidden" id="expid" name="exp" <?php if ($_smarty_tpl->tpl_vars['row']->value['exp']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['exp'];?>
" <?php }?> />
              <div class="cus_sel_opt_panel cu_sel_opt_panel_w200" style="display:none" id="job_exp">
                <ul class="Search_Condition_box_list">
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_word']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','exp','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                  <?php } ?>
                </ul>
              </div>
              <span id="by_expid" class="errordisplay">��ѡ��������</span> </div>
          </li>
          <li class="short">
            <div class="name"><b>*</b> �ֻ���</div>
            <div class="text"> 
              <?php if ($_smarty_tpl->tpl_vars['row']->value['moblie_status']==1) {?>
              <span class="info_phe_ok">
              <?php echo $_smarty_tpl->tpl_vars['row']->value['telphone'];?>

              </span>
               <a href="index.php?c=binding" style="color:#1178c3;padding-left:10px;">������֤</a>
              <input type="text" id="telphone" name="telphone" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['telphone'];?>
" style="display:none;">
              <?php } else { ?>
              <input id="telphone" name="telphone" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['telphone'];?>
" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" class="info_text text_if" />
              <span id="by_telphone" class="errordisplay">����ȷ��д�ֻ���</span> <?php }?> </div>
          </li>
          <li class="short">
            <div class="name">�����ʼ���</div>
            <div class="text"> 
            <?php if ($_smarty_tpl->tpl_vars['row']->value['email_status']==1) {?>  <span class="info_email_ok"><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</span>
              <a href="index.php?c=binding" style="color:#1178c3;padding-left:10px;">������֤</a>
              <input type="text" id="email" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" style="display:none;">
              <?php } else { ?>
              <input name="email" id="email"  type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" class="info_text text_yj" />
              <span id="by_email" class="errordisplay">�ʼ���ʽ����</span> <?php }?> </div>
          </li>
          <li class="short">
            <div class="name"> <b>*</b> �־�ס�أ�</div>
            <div class="text">
              <input class="info_text text_yj" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['living'];?>
" size="30" id="living" name="living">
              <span id="by_living" class="errordisplay">����д�־�ס��</span> </div>
          </li>
          <li class="short">
            <div class="name"> ��ϸ��ַ��</div>
            <div class="text">
              <input name="address" id="address" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
" size="40" class="info_text text_dz">
            </div>
          </li>
          <li class="short">
            <!--<div class="name"> ��ߣ�</div>-->
            <!--<div class="text textw140">-->
              <!--<input type="text" id="height" name="height" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['height'];?>
" size="10" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" class="info_text text_sg" />-->
              <!--<em>CM</em> </div>-->
            <div class="name"> ���壺</div>
            <div class="text">
              <input type="text" id="nationality" name="nationality" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['nationality'];?>
" size="10" class="info_text text_sg" />
            </div>
            <div class="name_60"> ������</div>
            <div class="text text_seclet_cur4">
              <input type="hidden" id="marriageid" name="marriage" <?php if ($_smarty_tpl->tpl_vars['row']->value['marriage']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['marriage'];?>
" <?php }?> />
              <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_marriage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <span class="m_info_tag marriage <?php if ($_smarty_tpl->tpl_vars['row']->value['marriage']==$_smarty_tpl->tpl_vars['v']->value) {?>m_info_tag_cur<?php }?>" id="marriage<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" onclick="ck_box('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','marriage');"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</span>
              <?php } ?>
            </div>
          </li>
          <!--<li class="short">-->
            <!--<div class="name">���أ�</div>-->
            <!--<div class="text textw140">-->
              <!--<input type="text" id="weight" name="weight" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['weight'];?>
" size="10" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" class="info_text text_sg" />-->
              <!--<em> KG</em> </div>-->

          <!--</li>-->
          <li class="short">
            <div class="name"> �������ڵأ�</div>
            <div class="text">
              <input class="info_text text_yj" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['domicile'];?>
" size="30" id="domicile" name="domicile">
            </div>
          </li>
          <li class="short">
            <div class="name"> ������</div>
            <div class="text">
              <input id="telhome" name="telhome" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['telhome'];?>
" onkeyup="this.value=this.value.replace(/[^0-9-.]/g,'')" class="info_text text_yj" />
            </div>
          </li>
          <li class="short">
            <div class="name"> QQ��</div>
            <div class="text">
              <input id="qq" name="qq" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['qq'];?>
" onkeyup="this.value=this.value.replace(/[^0-9-.]/g,'')" class="info_text text_yj" />
            </div>
          </li>
          <li class="short">
            <div class="name"> �ϴ����˶�ά�룺</div>
            <div class="text" style="position:relative">
             <div class="ewm_submit">   <input id="wxewm" name="wxewm" type="file" size="30" onchange="ajaxewm()""  class="ewm_submit_f"/>   </div>
              <div style="width:100px;position:absolute;left:260px;bottom:0px;<?php if (!$_smarty_tpl->tpl_vars['row']->value['wxewm']) {?>display:none;<?php }?>" class="ewm_img"><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['wxewm'];?>
"  width="100" height="100" id="ewm"/></div>
            </div>
          </li>
          <li class="short">
            <div class="name"> ������ҳ/���ͣ�</div>
            <div class="text">
              <input id="homepage" name="homepage" type="text" maxlength="255" size="40" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['homepage'];?>
" class="info_text text_dz" />
            </div>
          </li>
          <li class="short">
            <div class="name"><em style="float:left; padding-right:0px;"> �Ǳ�����Ϣ�Ƿ���ʾ��</em><i class="com_admin_ask" style="margin-top:5px;"></i></div>
            <div class="text text_seclet_cur4">
              <div class="yun_uesr_text">
                <input id="basic_info" class="SpFormLBut text_seclet_w200 " type="button" onclick="search_show('job_basic_info');" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['basic_info']=='0') {?>����ʾ<?php } elseif ($_smarty_tpl->tpl_vars['row']->value['basic_info']=='1') {?>��ʾ<?php }?>"/>
              </div>
              <input id="basic_infoid" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['basic_info'];?>
" name="basic_info">
              <div id="job_basic_info" class="cus_sel_opt_panel cu_sel_opt_panel_w200 cus_sel_opt_panel_H132" style="display:none">
                <ul class="Search_Condition_box_list">
                  <li><a onclick="selects('0','basic_info','����ʾ');" href="javascript:;"> ����ʾ</a></li>
                  <li><a onclick="selects('1','basic_info','��ʾ');" href="javascript:;"> ��ʾ</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="short">
            <div class="name">&nbsp;</div>
            <div class="text">
              <input type="submit" name="submitBtn" value="������Ϣ" class="Verification_sc_bth2 uesr_submit" />
              <input id="save" name="save" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" type="hidden"/>
            </div>
          </li>
        </ul>
        <div class="operatebox03 mt10"><span> </span> </div>
      </div>
      <?php if (!$_smarty_tpl->tpl_vars['row']->value['name']) {?>
      <div class="text_tips_bc" style="right:10px">
        <div class="text_tips_bc_h1"> ��Ϣ����</div>
        <div class="text_tips_bc_cont"> 
		  <?php if ($_smarty_tpl->tpl_vars['save']->value['time']) {?>
          <div class="text_tips_bc_l">��Ϣ����<?php echo $_smarty_tpl->tpl_vars['save']->value['time'];?>
����</div>
          <?php }?>
          <div class="text_tips_bc_time"> <span id="totalSecond"></span>s���Զ�����<br>
            ������Ϣ</div>
          <a  id="atime" href="javascript:;" onclick="saveuserform();" class="text_tips_bc_bth">��ʱ������Ϣ</a>
		  </div>
      </div>
    <?php }?> 
	</div>
</form>
</div>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/imgareaselect/ajaxfileupload.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
function ajaxfile() {
	if($("#image").val() != '') {
	          
		var i=layer.load('ͼƬ�ϴ��У����Ժ�....', 0);
		$.ajaxFileUpload({
			url: 'index.php?c=uppic&act=ajaxfileupload',
			secureuri: false, 
			fileElementId: 'image', 
			dataType: 'json', 
			data:{type:'info'},
			success: function (data, status){ 
				layer.close(i);	
				  
				if (data.s_thumb) {
					layer.msg(data.s_thumb, 2, 8);
				} else {
					$('#user_photo').attr('src',data.url);
				}
		   }
		})
	}
}
function ajaxewm() {
	if($("#wxewm").val() != '') {
		var i=layer.load('��ά���ϴ��У����Ժ�....', 0);
		$.ajaxFileUpload({
			url: 'index.php?c=info&act=upewm',
			secureuri: false, 
			fileElementId: 'wxewm',
			dataType: 'json', 
			data:{'uppic':'1'},
			success: function (data, status){  
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

var userstyle='<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
';
	function CheckPost(){
		var name=$.trim($("input[name='name']").val());
		var living=$.trim($("input[name='living']").val());		
		var idcard=$.trim($("input[name='idcard']").val());		
		var sex=$.trim($("#sex").val());
		var educid=$.trim($("#educid").val());
		var expid=$.trim($("#expid").val());
		var description=$.trim($("#description").val()); 
		var birthday = $.trim($('#birthday').val());
		'<?php if ($_smarty_tpl->tpl_vars['row']->value['email_status']==1) {?>'
			var ifemail = true; 
		'<?php } else { ?>'
			var email=$.trim($("input[name='email']").val());
			if (email==""){
				var ifemail = true;
			}else{
				var ifemail = check_email(email);
			}
		'<?php }?>'
		'<?php if ($_smarty_tpl->tpl_vars['row']->value['moblie_status']==1) {?>'
			var telphone = true;
		'<?php } else { ?>'
			var telphone=$.trim($("input[name='telphone']").val());
			telphone = isjsMobile(telphone);
		'<?php }?>'
		
		if(name==""){layer.msg($("#by_name").html(), 2, 8);return false;}
		if($("#sex").val()==''){layer.msg('��ѡ���Ա�',2,8);return false;}
		if(birthday==''){layer.msg('��ѡ���������', 2, 8);return false; }
		if(educid==""){layer.msg($("#by_educid").html(), 2, 8);return false;}
		if(expid==""){layer.msg($("#by_expid").html(), 2, 8);return false;}
		if(telphone==false){layer.msg($("#by_telphone").html(), 2, 8);return false;}
		if(ifemail==false){layer.msg($("#by_email").html(), 2, 8);return false;}
		if(living==""){layer.msg($("#by_living").html(), 2, 8);return false;}
		var telhome=$.trim($("#telhome").val());
		if(telhome&&isjsTell(telhome)==false){
			layer.msg('����д��ȷ��������', 2, 8);return false;
		}
		layer.load('ִ���У����Ժ�...',0);
	}
	$(document).ready(function() {
		$(".com_admin_ask").hover(function(){
			layer.tips("�Ƿ��ڼ�������ʾ�Ǳ�����Ϣ��", this, {
				guide: 1,
				style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC']
			});
			$(".xubox_layer").addClass("xubox_tips_border");
		},function(){layer.closeTips();});
	});
'<?php if (!$_smarty_tpl->tpl_vars['row']->value['name']) {?>'	
var start = 30;
var step = -1;
var save=$("#save").val();
if(!save){
	function count(){
		$("#atime").click(function(){ start=30});
		document.getElementById("totalSecond").innerHTML = start;
		start += step;
		if(start < 0 ){
			saveuserform();
			start = 30;
		}
		setTimeout("count()",1000);
	}
	window.onload = count;	
}
'<?php }?>' 
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
