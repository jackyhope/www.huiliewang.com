<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-25 17:15:25
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/job.htm" */ ?>
<?php /*%%SmartyHeaderCode:4464785725b30b2ad82f403-13263293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd260fb9c1578db4f9ca1c041a0788e04b24d01f' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/job.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4464785725b30b2ad82f403-13263293',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
    'job' => 0,
    'addjobnum' => 0,
    'config' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b30b2ad8cf2f5_15903784',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b30b2ad8cf2f5_15903784')) {function content_5b30b2ad8cf2f5_15903784($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="w1000">
  <div class="admin_mainbody"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class=right_box>
      <div class=admincont_box>

          <div class="job_list_tit">
         <ul class="">
         <li <?php if ($_GET['w']=="1") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=1">��Ƹ�е�ְλ</a></li>
         <!--<li <?php if ($_GET['w']=="0") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=0">�����ְλ</a></li>-->
         <!--<li <?php if ($_GET['w']=="3") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=3">δͨ��ְλ</a></li>-->
         <!--<li <?php if ($_GET['w']=="2") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=2">����ְλ</a></li>-->
         <li <?php if ($_GET['w']=="4") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=4">���¼�ְλ</a></li>
         <li <?php if ($_GET['w']=="5") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=5">����ְλ</a></li>
         </ul>
         </div>
      <div class="clear"></div>
        <div class="com_body">
          <div class="clear"></div>
          <div class="com_Release_job"> <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
            <div class="com_Release_job_h1">
              <span class="com_Release_job_a_c">&nbsp;</span>
              <span class="com_Release_job_a" style="width:200px;">ְλ����</span>
              <span class="com_Release_job_c">�յ�����</span>
              <span class="com_Release_job_e">����� </span>
              <span class="com_Release_job_e">��Ƹ״̬</span>
              <span class="com_Release_job_e">����ʱ��</span>
              <span class="com_Release_job_e">����ʱ��</span>
              <span class="com_Release_job_b">����</span>
            </div>
            <?php }?>
            <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
            <form action="index.php?c=job&act=opera" target="supportiframe" method="post" id='myform'>
              <?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value) {
$_smarty_tpl->tpl_vars['job']->_loop = true;
?>
              <div class="com_Release_job_span  com_Release_job_list">
                <div class="com_Release_job_span  com_Release_job_a_c">
                  <input type="checkbox" name="checkboxid[]" value="<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
" class="com_Release_job_check">
                </div>
                <div class="com_Release_job_span  com_Release_job_a" style="width:200px;"><a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$job.id`'),$_smarty_tpl);?>
" class="com_Release_name"><?php echo $_smarty_tpl->tpl_vars['job']->value['name'];?>
</a></div>
                <div class="com_Release_job_span  com_Release_job_c"><a href="index.php?c=hr&jobid=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['job']->value['jobnum'];?>
��</a></div>
                <div class="com_Release_job_span  com_Release_job_e"><?php echo $_smarty_tpl->tpl_vars['job']->value['jobhits'];?>
 </div>

                <div class="com_Release_job_span  com_Release_job_e">
                  <?php if ($_smarty_tpl->tpl_vars['job']->value['status']=="1") {?>
                  <span style="padding:0px 0px">���¼�</span>
                  <?php } else { ?>
                  <span class="com_m_job_lis_zt" style="padding:0px 0px">��Ƹ��</span>
                  <?php }?>
                </div>

                <div class="com_Release_job_span  com_Release_job_span  com_Release_job_e"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['lastupdate'],'%Y-%m-%d');?>
</div>
                <div class="com_Release_job_span com_Release_job_e"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['edate'],'%Y-%m-%d');?>
 </div>
                <div class="com_Release_job_span  com_Release_job_b" >
                
                <a  href="index.php?c=jobadd&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
" class="cblue" class="cblue">�޸�</a>


                   <?php if ($_smarty_tpl->tpl_vars['job']->value['status']=="1") {?> <a href="javascript:onstatus('<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','2');"  class="cblue">�ϼ�</a><?php } else { ?>
                  <a href="javascript:off_shelf('ȷ��Ҫ�¼ܸ�ְλ��','<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','1');"  class="cblue">�¼�</a><?php }?>

                
                <a href="javascript:void(0)" onclick="layer_del('ȷ��Ҫɾ����ְλ��','index.php?c=job&act=opera&del=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
');" class="cblue">ɾ��</a> <?php if ($_GET['w']=='2') {?> <a href="javascript:void(0);" onclick="gotime('<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['edate'],'%Y-%m-%d');?>
')" class="cblue">����</a> <?php }?> </div>
                	<?php if ($_GET['w']=='3') {?>
                <div class="com_Release_job_span  com_Release_job_bot"> <em class="com_Release_job_span  com_Release_job_em" style="_margin-left:15px;">δͨ��ԭ��<?php echo $_smarty_tpl->tpl_vars['job']->value['statusbody'];?>
 </em> </div>
                <?php }?> </div>
              <?php }
if (!$_smarty_tpl->tpl_vars['job']->_loop) {
?>
              <div class="msg_no"><p>�װ����û���Ŀǰ����û�����ְλ</p><a href="javascript:;" onclick="jobadd_url('<?php echo $_smarty_tpl->tpl_vars['addjobnum']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_job'];?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
');" class="com_msg_no_bth com_submit">������ְλ</a></div>
              <?php } ?> 
              <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
              <div class="com_Release_job_bot"> <span class="com_Release_job_qx">
                <input id='checkAll' type="checkbox" onclick='m_checkAll(this.form)'class="com_Release_job_qx_check">
                ȫѡ</span> <?php if ($_GET['w']=='2') {?>
                <INPUT class="c_btn_02 c_btn_02_w110" type="button" value="�����ӳ���Ч��" onclick="allgotime();">
                <?php }?>
                <?php if ($_GET['w']=='4') {?>
               <INPUT class="c_btn_02 c_btn_02_w110" type="button" value="һ���ϼ���Ƹ" onclick="return allonstatusopen('checkboxid[]');">
                <?php }?>
                <INPUT class="c_btn_02 c_btn_02_w110" type="button" value="����ɾ��ְλ" onclick="return really('checkboxid[]');">
            </div>
              <?php }?>
            </form>
          </div>
          <div  class="clear"></div>
          <div class="diggg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
          <div  class="clear"></div>

          <div  class="clear"></div>
          <div class="wxts_box wxts_box_mt30" style="display: none;">
            <div class="wxts">��ܰ��ʾ��</div>
            1�����˾Ҫ������Ƹ�˲ţ������Ϊ���ǵĻ�Ա����ȡ�����չʾ���ᣬ�԰����������ҵ�������˲š� <br>
            2�����˾��ְ֤λ��Ϣ����ʵ�ԡ��Ϸ��ԣ�����ʱ����ְλ��Ϣ���类�ٱ���Ͷ�ߣ�ȷ�Ϸ�������ϢΥ����ع涨�󣬱�վ����رչ�˾����Ƹ���񣬾����½⣡ </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
>
function gotime(id,edate,i){
	$("#gotimeid").val(id);
	if(i){
		$("#gotime_edate").html("���ι�����<font color='red'>"+i+"</font>��ְλ��");
	}else{
		$("#gotime_edate").html('��ǰְλ����ʱ�䣺<font color="red">'+edate+'</font>');
	}
	$.layer({
		type : 1,
		title : '��������',
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['340px','210px'],
		page : {dom : '#gotime'}
	});
}
function off_shelf(msg,id,status) {
    layer.confirm(msg, function(){
        var i=layer.load('ִ���У����Ժ�...',0);

        $.post("index.php?c=job&act=opera",{id:id,status:status},function(data){
            layer.close(i);
            if(data==1){
                layer.msg('���óɹ���', 2, 9,function(){window.location.reload();});return false;
            }else{
                layer.msg('����ʧ�ܣ�', 2, 8);
            }
        })

    });
}
function allgotime(){//��������
	var allid =[];
	var i=0;
	$('input[name="checkboxid[]"]:checked').each(function(){
		allid.push($(this).val());
		i++;
	});
	if(allid.length==0){
		layer.msg("��ѡ��Ҫ���ڵ�ְλ��",2,8);return false;
	}else{
		gotime(allid,'',i);
	}
} 
function allonstatusopen(){//��������
	var allid =[];
	var i=0;
	$('input[name="checkboxid[]"]:checked').each(function(){
		allid.push($(this).val());
		i++;
	});
	if(allid.length==0){
		layer.msg("��ѡ��Ҫ�ϼܵ�ְλ��",2,8);return false;
	}else{
		onstatus(allid,2);
	}
} 
function onstatus(id,status){//�޸���Ƹ״̬
	$.post("index.php?c=job&act=opera",{id:id,status:status},function(data){
		if(data==1){ 
			layer.msg('���óɹ���', 2, 9,function(){window.location.reload();});return false;
		}else{
			layer.msg('����ʧ�ܣ�', 2, 8);
		}
	})
}
<?php echo '</script'; ?>
> 
<!--��������������-->
<div id="gotime"  style="display:none; width:230px; ">
  <div class="job_box_div"  style="width:300px; ">
    <div class="job_box_msg" style="margin-left:10px;_margin-left:5px;margin-top:10px; padding:5px;">
      <p id="gotime_edate"></p>
    </div>
    <form action='index.php?c=job&act=opera' target="supportiframe" method="post" id='gotimef'>
      <input type="hidden" name="gotimeid" id="gotimeid" value=""/>
      <div class="job_box_inp"  style="padding:10px 5px 5px 20px"> <span style="float:left; margin-right:0px;">����������</span>
        <input name="day" value="" class="com_info_text placeholder" type="text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" style="width:100px;"/>
        <span class="fltL box_infobox_span" style="padding-left:10px;">��</span> </div>
      <span class="job_box_botton" style="width:100%;"> <a class="job_box_yes job_box_botton2" href="javascript:void(0);" onclick="setTimeout(function(){$('#gotimef').submit()},0);">ȷ��</a> </span>
    </form>
  </div>
</div>
<!--��������������end--> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
