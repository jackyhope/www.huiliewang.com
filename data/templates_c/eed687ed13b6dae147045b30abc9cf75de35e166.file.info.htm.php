<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-27 10:04:04
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/info.htm" */ ?>
<?php /*%%SmartyHeaderCode:16265750005bac3a94ef0ca0-17911905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eed687ed13b6dae147045b30abc9cf75de35e166' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/info.htm',
      1 => 1520991372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16265750005bac3a94ef0ca0-17911905',
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
    'lietou' => 0,
    'industry_name' => 0,
    'industry_index' => 0,
    'v' => 0,
    'dpclass_name' => 0,
    'dpdata' => 0,
    'key' => 0,
    'company' => 0,
    'cert' => 0,
    'tel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bac3a950884b0_80157718',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bac3a950884b0_80157718')) {function content_5bac3a950884b0_80157718($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                        layer.msg('����д���ţ�', 2, 8);return false;
                    }else if(document.myform.phoneone.value.length>4){
                        layer.msg('����ȷ��д���ţ�', 2, 8);return false;
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
                    layer.msg('��ϵ�ֻ��͹̶��绰����һ�', 2, 8);return false;
                }else if(ifmoblie==false && document.myform.linktel.value!=''){
                    layer.msg('��ϵ�ֻ���ʽ����ȷ��', 2, 8);return false;
                }
                var ifcheck=check_form(html=="",'by_content')

                var website=$.trim($("#website").val());
                if(website!=''){
                    if(check_url(website)==false){
                        layer.msg('��ͷ��ַ��ʽ����ȷ��', 2, 8);return false;
                    }
                }
                var qq=$.trim($("#linkqq").val());
                if(qq!=''&&isQQ(qq)==false){
                    layer.msg('QQ��ʽ����ȷ��', 2, 8);return false;
                }
                layer.load('ִ���У����Ժ�...',0);
            }
<?php echo '</script'; ?>
>
<div class="w1000">
  <div class="admin_mainbody">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class=right_box>
      <div class=admincont_box>
        <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
        <form name="myform" method="post" target="supportiframe" action="index.php?c=info&act=save" onsubmit="return checkpostcom();" enctype="multipart/form-data">
          <div class="com_tit"><span class="com_tit_span">��ͷ������Ϣ</span><span class="com_tit_right"><span class="ff0">*</span>Ϊ������</span></div>
          <?php if ($_smarty_tpl->tpl_vars['save']->value) {?>
          <div id="forms" class="text_tips">�����ϴ�δ�ύ�ɹ������� <!--<a href="index.php?c=info&act=saveform" class="text_tips_a">--><a href="javascript:;" onclick="savecom();" class="text_tips_a">�ָ�����</a> <i id="close" class="text_tips_close"></i></div>
          <?php }?>
          <div class="admin_textbox_02">
            <div class="info_logo" style="top: 80px;"><img src="<?php if ($_smarty_tpl->tpl_vars['lietou']->value['logo']) {?>.<?php echo $_smarty_tpl->tpl_vars['lietou']->value['logo'];
} else { ?> <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/member/lietou/images/uploadlietou.png <?php }?>" width="90" height="90" id="logo" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_lt_icon'];?>
','2')"/>
              <div class="info_logo_p" style="width: 90px;">
                <div class="logo_submit" style="background: none;position: relative;">�ϴ�ͷ��<input id="image" class="logo_submit_f" type="file" name="image" onchange="ajaxfile();"style="position: absolute;left: 0;top: 0;">
                </div></div></div>
            <ul>
              <li>
                <div class=tit><font color="#FF0000">*</font> ��ʵ������</div>
                <div class=textbox>
                  <input type="text" size="45" id="name" maxlength="5" name="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" class="com_info_text" style="width:280px;"/>
                  <span id="by_name" class="errordisplay">��ͷȫ�Ʋ���Ϊ��</span></div>
              </li>
              <li>
                <div class=tit><font color="#FF0000">*</font> �ó���ҵ��</div>
                <div class=textbox>
                  <div class="text_seclet text_seclet_cur" style="z-index:400">
                    <input id="qyhy" class="SpFormLBut text_seclet_w250 " type="button" onclick="search_show('job_qyhy');" <?php if ($_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['row']->value['hy']]=='') {?> value="��ѡ���ó��������ҵ"  <?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['row']->value['hy']];?>
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
                  <span id="by_hy" class="errordisplay">��ѡ���ó���ҵ</span> </div>
              </li>



              <li>
                <div class=tit> ��ϵ�ֻ���</div>
                <div class=textbox id="bdphone">
                  <?php if ($_smarty_tpl->tpl_vars['row']->value['moblie_status']==1) {?>
                  <input type="text" size="35" id="linktel" name="linktel" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['linktel'];?>
" class="com_info_text" style="width:250px;background:#D3D3D3;" readonly="readonly"/>
                  <a href="javascript:void(0)"  onclick="getshow('moblie','���ֻ�����');" class="com_set_a" >���°�</a>
                  <?php } else { ?>
                  <input type="text" id="linktel" name="linktel" size="25" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['linktel'];?>
" onkeyup="this.value=this.value.replace(/[^0-9-]/g,'')" class="com_info_text"/>
                  <span id="by_linktel" class="errordisplay">�ֻ���ʽ����ȷ</span>
                  <?php }?>
                </div>
              </li>

              <li>
                <div class=tit> ���ڹ�˾��</div>
                <div class=textbox>
                  <div class="text_seclet text_seclet_cur" style="z-index:300">
                    <input id="bcom" class="SpFormLBut text_seclet_w250 " name="com_name" readonly  type="text" onclick="search_show('job_bcom');"  value="<?php if ($_smarty_tpl->tpl_vars['row']->value['com_name']) {
echo $_smarty_tpl->tpl_vars['row']->value['com_name'];
} else { ?>��ѡ�����ڹ�˾<?php }?>" >
                    <input id="bcomid" type="hidden" name="bcom" <?php if ($_smarty_tpl->tpl_vars['row']->value['bcom']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bcom'];?>
" <?php }?>  >
                    <div id="job_bcom" class="cus-sel-opt-panel" style="display:none; z-index:301">
                      <div style="width:100%;  overflow:auto; overflow-x:hidden">
                        <ul>
                          <li> <a onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','bcom','�����Ϸ��»���Ϣ��ѯ���޹�˾');" href="javascript:;">�����Ϸ��»���Ϣ��ѯ���޹�˾</a> </li>
                        </ul>
                      </div>
                    </div>
                  </div>
              </li>

              <li>
                <div class=tit> ���ţ�</div>


                <div class=textbox>
                  <div class="text_seclet text_seclet_cur2 fltL">
                    <input class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['depart']) {?> value="<?php echo $_smarty_tpl->tpl_vars['dpclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['depart']];?>
" <?php } else { ?>value="��ѡ��������"<?php }?> id="depart" onclick="search_show('lie_depart');">
                    <input type="hidden" id="departid" name="departid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['depart'];?>
" />
                    <div id="lie_depart" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display:none">
                      <div style="width:100%;  overflow:auto; overflow-x:hidden">
                        <ul class="Search_Condition_box_list">
                          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['dpdata']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                          <li><a href="javascript:;" onclick="select_department('<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
','depart','<?php echo $_smarty_tpl->tpl_vars['dpclass_name']->value[$_smarty_tpl->tpl_vars['key']->value];?>
','department');"> <?php echo $_smarty_tpl->tpl_vars['dpclass_name']->value[$_smarty_tpl->tpl_vars['key']->value];?>
</a></li>
                          <?php } ?>
                          <!--<li><a href="javascript:;" onclick="select_department('25','depart','רҵ��ͷ','department');">רҵ��ͷ</a></li>-->
                        </ul>
                      </div>    </div>
                  </div>
                  <div class="text_seclet text_seclet_cur2 fltL">
                    <input class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['department']) {?> value="<?php echo $_smarty_tpl->tpl_vars['dpclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['department']];?>
"<?php } else { ?>value="��ѡ����"<?php }?> id="department" onclick="search_show('lie_department');">
                    <input type="hidden" id="departmentid" name="departmentid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['department'];?>
" />
                    <div id="lie_department" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display:none">
                      <div style="width:100%;  overflow:auto; overflow-x:hidden">
                        <ul class="Search_Condition_box_list">
                          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['dpdata']->value[$_smarty_tpl->tpl_vars['row']->value['depart']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                          <li><a href="javascript:;"  onclick="select_department('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','department','<?php echo $_smarty_tpl->tpl_vars['dpclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['dpclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

              </li>

              <li>
                <div class=tit>��ͷ��飺</div>
                <div class=textbox>
                  <textarea name="content" id="content" class="com_info_textarea" style="width:100%" rows="10"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea>
                  <span id="by_content" class="errordisplay">����д�����ͷ���</span> </div>
              </li>


          <li>
            <div class="admin_submit">
              <div class="condition">&nbsp;</div>
              <div class="sub_btn">
                <input class="btn_01" style="_margin-left:-3px" type="submit" name="submitbtn" value="������Ϣ">
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
        <div class="text_tips_bc_h1"> ��Ϣ����</div>
        <div class="text_tips_bc_cont"> <?php if ($_smarty_tpl->tpl_vars['save']->value['time']) {?>
          <div class="text_tips_bc_l">��Ϣ����<?php echo $_smarty_tpl->tpl_vars['save']->value['time'];?>
����</div>
          <?php }?>
          <div class="text_tips_bc_r">
            <div class="text_tips_bc_time"> <span id="totalSecond"></span>s���Զ�����<br>
              ������Ϣ</div>
            <a  id="atime" href="javascript:;" onclick="savecomform();" class="text_tips_bc_bth">��ʱ������Ϣ</a> </div>
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
    <div class="Binding_pop_box_msg">Ӫҵִ����֤�������ڸ��õ���Ƹ�˲�!<br>Ӫҵִ���е���ͷ���ơ�����µ��������ɱ�𣬷�����ͨ����֤��</div>
    <div class="Binding_pop_box_msg_cont">
      <form name="MyForm" id="certform">
        <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>��ͷȫ�ƣ�</span>
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
" name="company_name" id="company_name" class="Binding_pop_box_list_text Binding_pop_box_list_textw200" />
        </div>
        <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>Ӫҵִ�գ�</span>
          <input type="file" name="pic" onchange="ajaxcert()" id="pic" class="Binding_pop_box_list_text Binding_pop_box_list_textw200">

        </div>
        <div class="Binding_pop_box_msg_cont_pic" <?php if (!$_smarty_tpl->tpl_vars['cert']->value['check']) {?>style="display:none"<?php }?> id="preview">
        <img src="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
" id="imghead" width="140" height="160"/>
        <a target="_blank" id="imga" href="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
" class="Binding_pop_box_msg_cont_pic_p">�鿴ԭͼ</a>
    </div>
    <div class="clear"></div>

    <div class="Binding_pop_sub" style="margin-top:20px;"> <span class="Binding_pop_box_list_left">&nbsp;</span>
      <input id="com_cert" name="com_cert" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['cert']->value['check'];?>
">
      <input class="com_pop_bth_qd" name="upfile" type="submit" value="����">
      <input class="com_pop_bth_qx" type="button" value="ȡ��" onclick="layer.closeAll();">
    </div>
    </form>
  </div>
</div>
</div>
<!--���ֻ�������-->
<div id="moblie" style=" display:none;">
  <div class="Binding_pop_box" style="padding:10px;width:480px;height:200px; background:#fff;">
    <div class="Binding_pop_box_msg">����ɺ�������ʹ�ø��ֻ������һ�����</div>
    <div>
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>�ֻ����룺</span>
        <input type="text" name="moblie" class="Binding_pop_box_list_text Binding_pop_box_list_textw200">
        <input type="hidden" name="mobile" value="<?php echo $_smarty_tpl->tpl_vars['tel']->value['check'];?>
">
      </div>
      <div class="Binding_pop_box_list"><span class="Binding_pop_box_list_left"><i class="Binding_pop_box_list_left_i">*</i>������֤�룺</span>
        <input type="text" id="moblie_code" class="Binding_pop_box_list_text" style="width:90px;">
        <a href="javascript:;" class="Binding_pop_bth duanxibtn" id="time">��ѷ�����֤��</a></div>
      <div class="Binding_pop_sub" style="margin-top:20px;"> <span class="Binding_pop_box_list_left">&nbsp;</span>
        <input class="com_pop_bth_qd" onclick="check_moblie();" type="button" value="����">
        <input class="com_pop_bth_qx" type="button" value="ȡ��" onclick="layer.closeAll();">
        <input type="hidden" value="1" id="info">
      </div>
    </div>
  </div>
</div>




<?php echo '<script'; ?>
>
    function showcomstatusbody(){
        $.layer({
            type : 1,
            title : '���˵��',
            closeBtn : [0 , true],
            border : [10 , 0.3 , '#000', true],
            area : ['300px','auto'],
            page : {dom :"#showcomstatusbody"}
        });
    }
    function ajaxfile() {
        if($("#image").val() != '') {
            var i=layer.load('ͷ���ϴ��У����Ժ�....', 0);
            $.ajaxFileUpload({
                url: 'index.php?c=uppic&act=ajaxfileupload',
                secureuri: false, //�Ƿ���Ҫ��ȫЭ�飬һ������Ϊfalse
                fileElementId: 'image', //�ļ��ϴ����ID
                dataType: 'json', //����ֵ���� һ������Ϊjson
                data:{'type':'info'},
                success: function (data, status){  //�������ɹ���Ӧ������
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

    function ajaxcert() {
        if($("#pic").val() != '') {
            var i=layer.load('ͼƬ�ϴ��У����Ժ�....', 0);
            $.ajaxFileUpload({
                url: 'index.php?c=binding&act=save',
                secureuri: false, //�Ƿ���Ҫ��ȫЭ�飬һ������Ϊfalse
                fileElementId: 'pic', //�ļ��ϴ����ID
                dataType: 'json', //����ֵ���� һ������Ϊjson
                data:{'uppic':'1'},
                success: function (data, status){  //�������ɹ���Ӧ������
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
    //ajax�ύ��
    $(function () {
        $('#certform').submit(function (e) {
            e.preventDefault();
            e.stopPropagation();
            var company_name=$.trim($("#company_name").val());
            var com_cert=$('#com_cert').val();
            if(company_name==''){
                layer.msg('��ͷȫ�Ʋ���Ϊ�գ�',2,8);
                return false;
            }
            if(com_cert==''){
                layer.msg('���ϴ�Ӫҵִ�գ�',2,8);
                return false;
            }
            var i=layer.load('ִ���У����Ժ�...',0);
            $.post("index.php?c=binding&act=save", {
                company_name: company_name,
                com_cert: com_cert,
                upfile: 'info'
            }, function (res) {
                layer.close(i);
                if (res) {
                    $("#dcert").remove();
                    $("#cdiv").append(" <div id=\'dcert\' class=\'Binding_list_text  Binding_mt\' style=\'width:300px;\'>Ӫҵִ�����ϴ�����ȴ����</div>");
                    layer.msg('Ӫҵִ�����ϴ��ɹ���', 2, 9);
                }
            });
            setTimeout(layer.closeAll(),2000);
        });
    });



<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
