<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-08-29 15:32:05
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/ranking.htm" */ ?>
<?php /*%%SmartyHeaderCode:10993852935b864bf55f8138-96465951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0d3e1c5e41979be26a477388611eba610b2d704' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/ranking.htm',
      1 => 1519270974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10993852935b864bf55f8138-96465951',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'config' => 0,
    'lietou' => 0,
    'username' => 0,
    'statis' => 0,
    'member' => 0,
    'guweninfo' => 0,
    'atn' => 0,
    'report' => 0,
    'shuaxuanjobs' => 0,
    'des_shuaxuanjobs' => 0,
    'sdate' => 0,
    'edate' => 0,
    'service_com_count' => 0,
    'service_job_count' => 0,
    'service_resume_count' => 0,
    'down_resume_odds' => 0,
    'recommend' => 0,
    'list' => 0,
    'rows' => 0,
    'key' => 0,
    'lt_style' => 0,
    'jobs' => 0,
    'time' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b864bf570c744_99573499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b864bf570c744_99573499')) {function content_5b864bf570c744_99573499($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_sign')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.sign.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
<?php echo '<script'; ?>
>
function Close(id){
	$("#"+id).hide();
	$("#bg").hide();
}
function Next(){
	$("#one_tip").hide();
	$("#two_tip").show();
}
function Close_yds() {
	 $("#shuaxin").hide();
	 $("#bg").hide();
}

function break_job(num){
	if(num=='0'){
		layer.confirm('ÿ������ְλ���۳�<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_jobefresh'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
��ȷ��Ҫˢ�£�',function(){
			layer.load('ִ���У����Ժ�...',0);
			$.post("<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?m=ajax&c=Refresh_job",{},function(data){
				layer.closeAll();
				if(data==1){
					layer.msg("ְλˢ�³ɹ���",2,9,function(){location.reload();});
				}else{
					layer.msg(data,2,8);
				}
			})
		});
	}else{
		layer.load('ִ���У����Ժ�...',0);
		$.post("<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?m=ajax&c=Refresh_job",{},function(data){
			layer.closeAll();
			if(data==1){
				layer.msg("ְλˢ�³ɹ���",2,9,function(){location.reload();});
			}else{
				layer.msg(data,2,8);
			}
		})
	}
}
<?php echo '</script'; ?>
>
<style>
    .job_namer{
        vertical-align: bottom;
        width: 150px;
        display: inline-block;
        height: 20px;
    }
</style>
<div class="w1000">
<div style="position:relative; z-index:1005">
  <div class="Description_Layer">
    <div class="Tip_Information" id="one_tip" <?php if ($_smarty_tpl->tpl_vars['lietou']->value['name']!='') {?>style="display:none"<?php }?>>
      <div class="Tip_Information_cont">
        <div class="re">
          <div class="Tip_Information_close" onclick="Close('one_tip');"></div>
        </div>
        <div class="Tip_Information_p">
          <p><?php if ($_smarty_tpl->tpl_vars['lietou']->value['name']) {?>
       <?php echo $_smarty_tpl->tpl_vars['lietou']->value['name'];
} else {
echo $_smarty_tpl->tpl_vars['username']->value;
}?>�����ѳɹ�ע����ͷ�˺ţ�
   </p>
   <p><span class="tip_wt">������ɲ���ͷ��绰��<em><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</em> </span><a class="tip_fk" href="<?php echo smarty_function_url(array('m'=>'advice'),$_smarty_tpl);?>
" target="_blank">����������߷���</a>
   </p>

        </div>
        <div class="Tip_Information_bot"><a class="tip_ws" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/?c=info" >������ͷ����</a> </div>
      </div>
    </div>
    <div class="Recruitment_Layer" id="two_tip"  style="display:none">
      <div class="Tip_Information">
        <div>
          <div class="Tip_Information_gl"></div>
          <div class="Tip_Information_jt2"></div>
          <div class="Recruitment_fb"></div>
        </div>
        <div class="Tip_Information_cont">
          <div class="re">
            <div class="Tip_Information_close" onclick="Close('two_tip');"></div>
          </div>
          <div class="Tip_Information_p">��ȷ��Ƹ����ϸ����Ƹ��������׼�����˲ţ� </div>
          <div class="Tip_Information_bot"><a href="javascript:Close('two_tip');" class="Tip-next">֪����</a> </div>
        </div>
      </div>
    </div>
  </div>    </div>

<!--  ��ҳ-->
<div class="com_m_index_left">
<div class="com_m_index_info">
<div class="com_m_index_logo">
    <a href="/member/index.php?c=info">
        <img src="<?php if ($_smarty_tpl->tpl_vars['lietou']->value['logo']) {?>.<?php echo $_smarty_tpl->tpl_vars['lietou']->value['logo'];
} else { ?> <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/member/lietou/images/lienopic.png <?php }?>" width="100" height="100" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_lt_icon'];?>
','2')"/>
        <i class="com_m_index_logo_xg"></i>
    </a>
</div>
<div class="com_m_index_comname"><?php if ($_smarty_tpl->tpl_vars['lietou']->value['name']) {?>
       <?php echo $_smarty_tpl->tpl_vars['lietou']->value['name'];
} else { ?>
        <a href="index.php?c=info" style="color:#f60; text-decoration:underline">����δ������ͷ��Ϣ��������ƣ�</a>
        <?php }?></div>
    <div style="margin-left: 25px;">�ҵ�<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
��<label><?php echo $_smarty_tpl->tpl_vars['statis']->value['integral'];?>
</label><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
  <a href="index.php?c=pay&type=integral" style="color:#f60;margin-left: 20px; ">ȥ��ֵ</a><br>  <a href="index.php?c=paylog&consume=ok" class="com_m_index_vip_a" style="color:#f60;margin-left: 20px; ">������ϸ</a>  <a href="/member/index.php?c=paylog" class="com_m_index_vip_a" style="color:#f60;margin-left: 20px; ">��ֵ��¼</a></div>
    <div class="clear"></div>

<div class="clear"></div>
  <div class="com_m_index_logintime">�ϴε�¼ʱ�䣺<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['member']->value['login_date'],'%Y-%m-%d %H:%M');?>
 </div>
       <div class="clear"></div>
    <div class="com_index_bj_box">
  <div class="com_index_bj"><a href="/member/index.php?c=info"><i class="com_index_bjicon com_index_bjiconbj"></i>�˺�����</a></div>
  <div class="com_index_bj"><a href="/member/index.php?c=yj"> <i class="com_index_bjicon com_index_bjiconyl"></i>ҵ��ͳ��</a></div>
  <div class="com_index_bj com_index_bjend"><a href="index.php?c=resume&act=input" target="_blank"><i class="com_index_bjicon com_index_bjiconsz"></i>�������</a></div>

    </div>
</div>
<div class="com_index_sign" style="display: none;"><?php echo smarty_function_sign(array(),$_smarty_tpl);?>
</div>
    <div class="today_state">
        <div class="sta_top">���տ���Ȩ��</div>
        <div class="tonjinuu">
            <div class="ttjnum" style="border-right: 1px solid #eee;">
                <p>���ؼ���</p>
                <p class="colo999">
                    <span class="ccss2">20</span>/20</p>
            </div>
            <div class="ttjnum">
                <p>�޸ļ���</p>
                <p class="colo999"><span class="ccss2">4</span>/5</p>
            </div>
        </div>
    </div>



<?php if ($_smarty_tpl->tpl_vars['guweninfo']->value['id']) {?>
<div class="com_index_kf">
<div class="com_m_index_h1"><span class="com_m_index_h1_s">��Ƹ����</span></div>
<div class="com_index_kf_box">
<div class="com_index_kf_box_user">
<div class="com_index_kf_box_user_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['logo'];?>
" style="width:64px;height:64px"></div>
<div class="com_index_kf_box_username"><?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['username'];?>
</div>
<div class="">
<?php if ($_smarty_tpl->tpl_vars['guweninfo']->value['qq']) {?>
<a target="_blank" href="tencent://message/?uin=<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['qq'];?>
&Site=<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['qq'];?>
:12" alt="���������ҷ���Ϣ"></a>
<?php }?></div>
</div>
<div class="com_index_kf_p">�绰��<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['mobile'];?>
</div>
<div class="com_index_kf_p">΢�ţ�<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['weixin'];?>
</div>
<div class="com_index_kf_p">Q Q��<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['qq'];?>
</div>
<div class="com_index_kf_p">
	<?php if ($_smarty_tpl->tpl_vars['atn']->value['uid']) {?>
	<a href="javascript:void(0)" class="com_index_kf_dz">�ѵ���</a>
	<?php } else { ?>
	<a href="javascript:void(0)" onclick="zan('<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
');" class="com_index_kf_dz">����</a>
	<?php }?>
    <?php if (is_array($_smarty_tpl->tpl_vars['report']->value)&&!$_smarty_tpl->tpl_vars['report']->value['result']) {?>
    <a href="index.php?c=report&act=show"  class="com_index_kf_ts">��Ͷ��</a>
    <?php } else { ?>
	<a href="javascript:void(0)" onclick="reportgw('<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
','Ͷ�߹���');"  class="com_index_kf_ts">Ͷ��</a>
    <?php }?></div>
</div>
</div>

<?php } else { ?>
<div class="com_index_kf" style="display: none;">
<div class="com_m_index_h1"><span class="com_m_index_h1_s">�ҵĵȼ�</span></div>
    <div class="com_index_kf_box">
        <div class="com_index_kf_p">ҵ�����֣�<label class="result_color">125��</label></div>
        <div class="com_index_kf_p">�ͻ����֣�<label class="result_color">125��</label></div>
        <div class="com_index_kf_p">�ۺ�ҵ����<label class="result_color">125��</label></div>
    </div>
    <div class="com_index_kf_box fontcolor" style="border-bottom: none;">
        <div class="com_index_kf_p">ҵ�����֣�</div>
        <div class="com_index_kf_p">HR��������*5</div>
        <div class="com_index_kf_p">�ͻ����֣�</div>
        <div class="com_index_kf_p">HR��������</div>
        <div class="com_index_kf_p">�ۺ�ҵ����</div>
        <div class="com_index_kf_p">ҵ������*70%+�ͻ�����*30%</div>
    </div>
</div>

<?php }?>


</div>
<div class="com_m_index_right">
    <?php if ($_smarty_tpl->tpl_vars['member']->value['status']!=1) {?>
   	<!--<div class="com_index_wsh fltL">-->

   		<!--<div class="com_index_wsh_box">-->
        <!--<div class="com_index_wsh_box_p">�����ʺ���δͨ����ˡ�</div>-->
   		<!--δ��˵���ͷ�û��޷��鿴�˲ż�������ϵ��ʽ��<br/>-->
   		<!--������ϵ�ͷ��绰��<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
�������Ǿ�����ˡ�-->
 	<!--</div>-->

   	<!--</div>-->
    <?php }?>




<div class="com_m_index_data">
<ul>

</ul>
</div>




<?php echo '<script'; ?>
 type="text/javascript">
function jobshuaxin(id){
	<?php if ($_smarty_tpl->tpl_vars['shuaxuanjobs']->value) {?>
	var i=<?php echo $_smarty_tpl->tpl_vars['des_shuaxuanjobs']->value;?>
;
			var num="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_jobefresh'];?>
";
			var breakmsg = '���ι�ˢ��'+i+'��ְλ,��۳�'+i+'��ˢ������,������'+(num*i)+'<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
��';
			layer.confirm(breakmsg,function(){
				$.post("<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?m=ajax&c=Position_job",{idk:i,ids:id},function(data){
					if(data==1){
						layer.msg("ˢ�³ɹ���",2,9,function(){window.location.reload();});
					}else{
						layer.msg(data,2,8);
					}
				})
	});
	<?php } else { ?>
		layer.msg('�����޷�����ְλ��', 2, 8);
	<?php }?>
}


<?php echo '</script'; ?>
>

    <div class="com_m_index_resume" style="display: none;margin-top: 0;padding-bottom: 0">
        <div class="com_m_index_h1">
            <a class="com_m_index_h1_s hovers" href="/member/index.php?c=index">����ͳ��</a>
            <a class="com_m_index_h1_s hovers" href="/member/index.php?c=index&act=newjobs">����ְλ</a>
            <a class="com_m_index_h1_s hovers bg_current" href="/member/index.php?c=index&act=ranking">��ͷ���а�</a>
            <a href="index.php?c=attention_me" class="com_m_index_h1_s_a" target="_blank" style="display: none;">�鿴��ע�ҹ�˾���˲�>></a>
        </div>
        <div class="tj_content" style="display: none;">
            <div class="kuang_sou">
                <input type="text" class="inputk" placeholder="����������Ҫ�����Ĺ�˾��ְλ">
            </div>

            <input id="sdate" class="tongji_info_text" type="text" readonly="" size="15" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['sdate']->value,'%Y-%m-%d');?>
" name="sdate">
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/css/font-awesome.min.css" type="text/css">
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/foundation-datepicker.min.js"><?php echo '</script'; ?>
>
            <input id="edate" class="tongji_info_text" type="text" readonly="" size="15" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['edate']->value,'%Y-%m-%d');?>
" name="edate">
            <?php echo '<script'; ?>
 type="text/javascript">
                var checkin = $('#sdate').fdatepicker({
                    format: 'yyyy-mm-dd',startView:4,minView:2
                }).on('changeDate', function (ev) {
                    if (ev.date.valueOf() > checkout.date.valueOf()) {
                        var newDate = new Date(ev.date)
                        newDate.setDate(newDate.getDate() + 1);
                        checkout.update(newDate);
                    }
                    checkin.hide();
                    $('#edate')[0].focus();
                }).data('datepicker');
                var checkout = $('#edate').fdatepicker({
                    format: 'yyyy-mm-dd',startView:4,minView:2,
                    onRender: function (date) {
                        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                    }
                }).on('changeDate', function (ev) {
                    checkout.hide();
                }).data('datepicker');
            <?php echo '</script'; ?>
>

            <input type="submit" value="����" class="tongji_info_text_sub"/>
            <div class="tongj_box">
                <div class="tongj_list"><div class="tongj_list_name">����</div><div class="tongj_list_b">�ܼ�<span class="tongj_list_b_n">30</span>��</div></div>
                <div class="tongj_list"><div class="tongj_list_name"> ������ҵ��</div><div class="tongj_list_b">�ܼ�<span class="tongj_list_b_n"><?php echo $_smarty_tpl->tpl_vars['service_com_count']->value;?>
</span>��</div></div>
                <div class="tongj_list"><div class="tongj_list_name"> �Ƽ�ְλ��</div><div class="tongj_list_b">�ܼ�<span class="tongj_list_b_n"><?php echo $_smarty_tpl->tpl_vars['service_job_count']->value;?>
</span>��</div></div>
                <div class="tongj_list"><div class="tongj_list_name"> �Ƽ�������</div><div class="tongj_list_b">�ܼ�<span class="tongj_list_b_n"><?php echo $_smarty_tpl->tpl_vars['service_resume_count']->value;?>
</span>��</div></div>
                <div class="tongj_list tongj_list_last"><div class="tongj_list_name"> ����������</div><div class="tongj_list_b"><span class="tongj_list_b_n"><?php echo $_smarty_tpl->tpl_vars['down_resume_odds']->value;?>
</span></div></div>
            </div>

            <div class="job_news_list">
                <span class="job_news_list_span job_w190" style="text-align:left">��ѡ��</span>
                <span class="job_news_list_span job_w370">ְλ</span>
                <span class="job_news_list_span job_w150">���¶�̬</span>
            </div>
            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recommend']->value['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
            <div class="job_news_list line_heigh35">
                <span class="job_news_list_span job_w190  line_heigh18">
                        <a class="job_namer" href="#"><?php echo $_smarty_tpl->tpl_vars['list']->value['resume_name'];?>
</a><br>
                        <label class="com_namer" href="#"><?php echo $_smarty_tpl->tpl_vars['list']->value['datetime'];?>
</label>
                </span>
                <span class="job_news_list_span job_w370  line_heigh18">
                    <a class="job_namer" href="#"><?php echo $_smarty_tpl->tpl_vars['list']->value['job_name'];?>
</a><label class="job_status">����ͣ�У�</label><br>
                        <a class="com_namer" href="#"><?php echo $_smarty_tpl->tpl_vars['list']->value['com_name'];?>
</a>
                </span>
                <span class="job_news_list_span job_w150">
                    <label class="tj_nums" href="#">���Ƽ�</label></span>
            </div>
            <?php } ?>
            <div class="pages pages_btns"> <?php echo $_smarty_tpl->tpl_vars['recommend']->value['pagenav'];?>
</div>
        </div>


    </div>

    <div class="com_m_index_resume" style="margin-top: 0;">
        <div class="com_m_index_h1">
            <a class="com_m_index_h1_s hovers" href="/member/index.php?c=index">����ͳ��</a>
            <a class="com_m_index_h1_s hovers" href="/member/index.php?c=index&act=newjobs">����ְλ</a>
            <a class="com_m_index_h1_s hovers bg_current" href="/member/index.php?c=index&act=ranking">��ͷ���а�</a>
            <a href="index.php?c=attention_me" class="com_m_index_h1_s_a" target="_blank" style="display: none;">�鿴��ע�ҹ�˾���˲�>></a>
        </div>
        <div class="com_m_index_h1" style="background: none;margin-top: 10px;">
            <span class="bangbtn">
                <a class="bagn_item  <?php if ($_GET['date']=='month'||empty($_GET['date'])) {?>cur_select<?php }?>" href="/member/index.php?c=index&act=ranking&date=month">�°�</a>
                <a class="bagn_item <?php if ($_GET['date']=='week') {?>cur_select<?php }?>" href="/member/index.php?c=index&act=ranking&date=week">�ܰ�</a>
                <a class="bagn_item <?php if ($_GET['date']=='day') {?>cur_select<?php }?>" href="/member/index.php?c=index&act=ranking&date=day">�հ�</a>
            </span>
        </div>
        <div class="tj_content" style="margin-top: 10px;">

            <div class="job_news_list listtop">
                <span class="job_news_list_span job_w150 p_l10" style="text-align:left;">��ͷ����</span>
                <span class="job_news_list_span job_w150">�Ƽ�ְλ��</span>
                <span class="job_news_list_span job_w150">�Ƽ�������</span>
                <span class="job_news_list_span job_w100">����������</span>
                <span class="job_news_list_span job_w100">����������</span>
                <span class="job_news_list_span job_w100">���а�</span>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
            <div class="job_news_list">

                <span class="job_news_list_span job_w150 p_l10">
                        <a class="job_namer" href="/lietou"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</a>
                </span>
                <span class="job_news_list_span job_w150">
                    <span class="font_cc">�ܼ�<label class="tj_numjl"><?php echo $_smarty_tpl->tpl_vars['list']->value['job_count'];?>
</label>��</span>
                </span>
                <span class="job_news_list_span job_w150">
                    <span class="font_cc">�ܼ�<label class="tj_numjl"><?php echo $_smarty_tpl->tpl_vars['list']->value['num'];?>
</label>��</span>
                </span>
                <span class="job_news_list_span job_w100">
                    <span class="font_cc"><label class="tj_numjl"><?php echo $_smarty_tpl->tpl_vars['list']->value['odd'];?>
</label></span>
                </span>
                <span class="job_news_list_span job_w100">
                    <span class="font_cc">�ܼ�<label class="tj_numjl"><?php echo $_smarty_tpl->tpl_vars['list']->value['count'];?>
</label>��</span>
                </span>
                <?php if ($_smarty_tpl->tpl_vars['key']->value<3) {?>
                <span class="job_news_list_span job_w100">
                    <?php if ($_smarty_tpl->tpl_vars['key']->value==0) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/first.png">
                    <?php } elseif ($_smarty_tpl->tpl_vars['key']->value==1) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/second.png">
                    <?php } elseif ($_smarty_tpl->tpl_vars['key']->value==2) {?>
                     <img src="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/third.png">
                    <?php }?>
                </span>
                <?php } else { ?>
                <span class="job_news_list_span job_w100">
                    <span class="font_cc">��<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
��</span>
                </span>
                <?php }?>
            </div>
            <?php } ?>
            <?php } else { ?>
            <div class="seachno" style="width: 660px;">
                <div class="seachno_left"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" width="144" height="102"></div>
                <div class="listno-content" style="width: 400px;margin-top: 30px;"> <strong>������ͷ������Ϣ</strong><br>
                </div>
            </div>
            <?php }?>
        </div>

    </div>

</div></div>
</div>
 <!----end--->
  <!--ˢ��ְλ��ʾ������-->

<div id="shuaxin" style="display:none;">
<div class="sx_pd">
<div class="sx_top">
<dl>
   <dt></dt>
   <dd>
       <div>���컹ûˢ�£�ˢ��ְλ��<em class="sx_bot_or">ְλ������ǰ</em><br/>���˲Ÿ����׿����㣬<em class="sx_bot_or">���ְλ�����ʣ�</em></div>
       <div class="sx_top_t">
            <em class="sx_top_t_tt">ˢ��ǰ��ȷ��������Ϣ׼ȷ������</em>
            <p>��ϵ�绰��<?php echo $_smarty_tpl->tpl_vars['lietou']->value['linktel'];?>
</p>
            <p>�ϴ�ˢ��ʱ�䣺<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['jobs']->value['lastupdate'],"%Y-%m-%d %H:%M:%S");?>
</p>
            <p>��Ƹְλ��<?php echo $_smarty_tpl->tpl_vars['jobs']->value['name'];?>
 </p>
       </div>
    </dd>
</dl>
</div>
</div>
<div class="sx_bot">
     <a class="sx_bot_sx" href="javascript:void(0)" onclick="jobrefresh(<?php echo $_smarty_tpl->tpl_vars['jobs']->value['id'];?>
);">ˢ��</a>
     <a class="sx_bot_qx" href="javascript:layer.closeAll();">ȡ��</a>
</div>

</div>
<!--��ʾ������ end-->
<!--Ͷ�߹��ʵ�����-->
<div id="<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
" style="display:none;">
  <div class="Binding_pop_box" style="padding:10px;width:330px;height:200px; background:#fff;">
    <div class="Binding_pop_box_msg">��ҪͶ�ߵĹ����ǣ�<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['username'];?>
</div>
    <div class="popjb_tip">Ϊ���ܹ������ṩ�������ķ��񣬷���������������ǻ��һʱ������𸴣�</div>

      <div class="">
     	 <textarea id="reason" name="reason" class="popjb_text"></textarea>
      </div>
      <div class="Binding_pop_sub" style="margin-top:15px;"> <span class="Binding_pop_box_list_left">&nbsp;</span>
        <input class="com_pop_bth_qd" onclick="reportSub('index.php?c=report')" type="button" value="ȷ��">
		<input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
" id='eid' name='eid'>
        <input class="com_pop_bth_qx" type="button" value="ȡ��" onclick="layer.closeAll();">
      </div>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">

<?php if ($_smarty_tpl->tpl_vars['lietou']->value['hy']!=''&&$_smarty_tpl->tpl_vars['jobs']->value['name']!=''&&$_smarty_tpl->tpl_vars['jobs']->value['lastupdate']<$_smarty_tpl->tpl_vars['time']->value&&$_COOKIE['jobrefresh']!='1') {?>
	$.layer({
		type : 1,
		title : 'ˢ��ְλ',
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['500px','320px'],
		page : {dom :"#shuaxin"}
	});

<?php }?>

function reportgw(eid,title){
	$.layer({
		type : 1,
		title :title,
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['350px','auto'],
		page : {dom :"#"+eid}
	});
}
function reportSub(url){
	var reason=$("#reason").val();
	var eid=$("#eid").val();
	if(reason==''){
		layer.msg('����дͶ�����ݣ�', 2, 8);return false;
	}
	$.post(url,{reason:reason,eid:eid},function(data){
		layer.closeAll();
		if(data=='0'){
			layer.msg('Ͷ��ʧ�ܣ�', 2, 8);
		}else if(data=='1'){
			layer.msg('Ͷ�߳ɹ���', 2, 9,function(){window.location.reload();});
		}else if(data=='2'){
			layer.msg('��Ͷ�߳ɹ����ȴ�����Ա�ظ���', 2, 8);
		}
	});
}
function zan(id){
	$.post("index.php?m=ajax&c=guwenZan",{id:id},function(data){
		if(data=='2'){
			layer.msg('�벻Ҫ�ظ����ޣ�', 2, 8);
		}else if(data=='1'){
			layer.msg('���޳ɹ���',2,9,function(){window.location.reload();});
			//layer.msg("ˢ�³ɹ���",2,9,function(){window.location.reload();});
		}
	});
}
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
