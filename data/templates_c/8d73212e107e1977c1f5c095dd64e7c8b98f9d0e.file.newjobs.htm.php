<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-11 10:34:44
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/newjobs.htm" */ ?>
<?php /*%%SmartyHeaderCode:3944347905b9729c49f8a56-35759174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d73212e107e1977c1f5c095dd64e7c8b98f9d0e' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/newjobs.htm',
      1 => 1518227008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3944347905b9729c49f8a56-35759174',
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
    'des_resume' => 0,
    'de_resume' => 0,
    'down_resume' => 0,
    'normal_job_num' => 0,
    'addjobnum' => 0,
    'shuaxuanjobs' => 0,
    'des_shuaxuanjobs' => 0,
    'new_jobs' => 0,
    'list' => 0,
    'pagenav' => 0,
    'klist' => 0,
    'jobs' => 0,
    'time' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b9729c4b32901_16619415',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b9729c4b32901_16619415')) {function content_5b9729c4b32901_16619415($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_sign')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.sign.php';
if (!is_callable('smarty_function_listurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.listurl.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
<style>
    .ico_flag{
        right: 20px;
    }
</style>
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
<div class="com_m_index_logo">  <a href="/member/index.php?c=info"><img src="<?php if ($_smarty_tpl->tpl_vars['lietou']->value['logo']) {?>.<?php echo $_smarty_tpl->tpl_vars['lietou']->value['logo'];
} else { ?> <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/member/lietou/images/lienopic.png <?php }?>" width="100" height="100" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_lt_icon'];?>
','2')"/>
<i class="com_m_index_logo_xg"></i></a></div>
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

<!--<li>-->
<!--<a href="index.php?c=hr" class="com_m_index_data_box">-->
<!--<div class="com_m_index_data_iconbg com_m_index_data_iconbg1"><i class="com_m_index_data_icon"></i></div>-->
<!--<div class="com_m_index_data_name">�յ�����</div>-->
<!--<div class="com_m_index_data_n"><?php echo $_smarty_tpl->tpl_vars['des_resume']->value;?>
</div>-->
<!--<div class="com_m_index_data_bth">δ�鿴 <span class="f60"><?php echo $_smarty_tpl->tpl_vars['de_resume']->value;?>
</span></div>-->
<!--</a></li>-->
<!--<li><a href="index.php?c=down"  class="com_m_index_data_box"><div class="com_m_index_data_iconbg com_m_index_data_iconbg2"><i class="com_m_index_data_icon"></i></div>-->
<!--<div class="com_m_index_data_name">���ؼ���</div>-->
<!--<div class="com_m_index_data_n"><?php echo $_smarty_tpl->tpl_vars['down_resume']->value;?>
</div>-->
<!--<div class="com_m_index_data_bth">��������  <span class="f60"><?php if ($_smarty_tpl->tpl_vars['statis']->value['vip_etime']>time()||$_smarty_tpl->tpl_vars['statis']->value['vip_etime']=="0") {
if ($_smarty_tpl->tpl_vars['statis']->value['rating_type']==1) {
echo $_smarty_tpl->tpl_vars['statis']->value['down_resume'];
} else { ?>����<?php }
} else { ?>0<?php }?></span></div>-->
<!--</a></li>-->
<!--<li class="com_m_index_data_end">-->
<!--<div class="com_m_index_data_end_job">-->
<!--<a href="index.php?c=job&w=1">-->
<!--<div class="com_m_index_data_iconbg com_m_index_data_iconbg3"><i class="com_m_index_data_icon"></i></div>-->
<!--<div class="com_m_index_data_name">ְλ����</div>-->
<!--<div class="com_m_index_data_n"><?php echo $_smarty_tpl->tpl_vars['normal_job_num']->value;?>
</div>-->
<!--</a>-->
<!--<div class="com_m_index_data_fbbth">-->
<!--<a href="javascript:void(0);" onclick="jobadd_url('<?php echo $_smarty_tpl->tpl_vars['addjobnum']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_job'];?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
');return false;">����ְλ</a></div>-->
<!--</div>-->
<!--</li>-->
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

    <div class="com_m_index_resume" style="margin-top: 0;">
        <div class="com_m_index_h1">
            <a class="com_m_index_h1_s hovers" href="/member/index.php?c=index">����ͳ��</a>
            <a class="com_m_index_h1_s hovers bg_current" href="/member/index.php?c=index&act=newjobs">����ְλ</a>
            <a class="com_m_index_h1_s hovers" href="/member/index.php?c=index&act=ranking">��ͷ���а�</a>
            <a href="index.php?c=attention_me" class="com_m_index_h1_s_a" target="_blank" style="display: none;">�鿴��ע�ҹ�˾���˲�>></a>
        </div>
        <div class="tj_content">
            <div class="job_news_list listtop">
                <span class="job_news_list_span job_w90" style="padding-left: 10px;">ְλ���</span>
                <span class="job_news_list_span job_w470" style="text-align:left">ְλ</span>
                <!--<span class="job_news_list_span job_w150">н��</span>-->
                <!--<span class="job_news_list_span job_w150">�����ص�</span>-->
                <span class="job_news_list_span job_w200" style="text-align: center">����</span>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['new_jobs']->value) {?>
            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['new_jobs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
            <div class="job_news_list">
                <span class="job_news_list_span job_w90" style="padding-left: 10px;"><?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
</span>
                <span class="job_news_list_span job_w470 line_heigh18 posirel">
                         <!--�ж�ְλ������-->
                        <?php if ($_smarty_tpl->tpl_vars['list']->value['identity']==3) {?>
                         <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_lie.png" class="ico_flag"/>
                        <?php } else { ?>
                         <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_qi.png" class="ico_flag"/>
                        <?php }?>
                    <div>
                        <a class="job_namer nowrap" href="/job/index.php?c=comapply&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" target="_blank" style="font-size:18px;"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</a>
                        <label class="lastupdate"><?php echo $_smarty_tpl->tpl_vars['list']->value['lastupdate'];?>
</label>
                    </div>
                    <div class="mat_10">
                        <label class="salery_s tj_xz"><?php echo $_smarty_tpl->tpl_vars['list']->value['salary'];?>
</label><span class="xianshu">|</span>
                        <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['list']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['list']->value['job_city_two'];?>

                            <?php if ($_smarty_tpl->tpl_vars['list']->value['job_city_three']) {?>
                            -<?php echo $_smarty_tpl->tpl_vars['list']->value['job_city_three'];?>

                            <?php }?></label>
                        <span class="xianshu">|</span>
                        <label class="tj_time">ѧ��:<?php echo $_smarty_tpl->tpl_vars['list']->value['job_edu'];?>
</label>
                        <span class="xianshu">|</span>
                        <label class="tj_time">��������:<?php echo $_smarty_tpl->tpl_vars['list']->value['job_exp'];?>
</label>
                    </div>
                    <div class="mat_10">
                        <?php if ($_smarty_tpl->tpl_vars['list']->value['identity']==3) {?>
                        <label class="com_style"><?php echo $_smarty_tpl->tpl_vars['list']->value['com_name'];?>
</label>
                        <?php } else { ?>
                        <a class="com_style" href="/company/index.php?c=show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['uid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['list']->value['com_name'];?>
</a>
                        <?php }?>
                    </div>
                </span>

                <span class="job_news_list_span job_w200">
                    <a href="index.php?c=recommend&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" target="_blank" class="btn_hxr w90b tuijan">�Ƽ���ѡ��</a>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value['fav_job']) {?>
                        <label class="btn_hxr w65b yiguanzhu" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">ȡ����ע</label>
                        <?php } else { ?>
                        <label class="btn_hxr w65b guanzhu" data-id="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">+��ע</label>
                        <?php }?>
                     </span>
            </div>
            <?php } ?>
            <div class="pages pages_btns"> <?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
            <?php } else { ?>
            <div class="seachno" style="width: 660px;">
                <div class="seachno_left"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" width="144" height="102"></div>
                <div class="listno-content" style="width: 400px;"> <strong>�������ְλ��Ϣ</strong><br>
                    <span> ��������<br>
                        1���ʵ�������ѡ�������<br>
                        2���ʵ�ɾ������������ؼ���<br>
                        </span>
                    <span> ���Źؼ��֣�<br>
                        <?php  $_smarty_tpl->tpl_vars['klist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['klist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"7","recom"=>"1","type"=>"3","item"=>"\'klist\'","nocache"=>"")
;');$list=array();
		if($paramer[recom]){
			$tuijian = 1;
		}
		if($paramer[type]){
			$type = $paramer[type];
		}
		if($paramer[limit]){
			$limit=$paramer[limit];
		}else{
			$limit=5;
		}
		include PLUS_PATH."/keyword.cache.php";
		if($paramer[iswap]){
			$wap = "/wap";
		}else{
			$index =1;
		}
		if(is_array($keyword)){
			if($paramer[iswap]){
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v[tuijian]!=1){
						continue;
					}
					if($type && $v[type]!=$type){
						continue;
					}

					$i++;
					if($v[type]=="1"){
						$v[url] = Url("wap",array("c"=>"once","keyword"=>$v['key_name']));
						$v[type_name]='������Ƹ';
					}elseif($v['type']=="13"){
						$v['url'] = Url("wap",array("c"=>"tiny","keyword"=>$v['key_name']));
						$v['type_name']='�չ�����';
					}elseif($v[type]=="3"){
						$v[url] = Url("wap",array("c"=>"job","keyword"=>$v['key_name']));
						$v[type_name]='ְλ';
					}elseif($v['type']=="4"){
						$v['url'] = Url("wap",array("c"=>"company","keyword"=>$v['key_name']));
						$v['type_name']='��˾';
					}elseif($v['type']=="5"){
						$v['url'] = Url("wap",array("c"=>"resume","keyword"=>$v['key_name']));
						$v['type_name']='�˲�';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}
					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}else{
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v['tuijian']!=1){
						continue;
					}
					if($type && $v['type']!=$type){
						continue;
					}
					$i++;
					if($v['type']=="1"){
						$v['url'] = Url("once",array("keyword"=>$v['key_name']));
						$v['type_name']='������Ƹ';
					}elseif($v['type']=="2"){
						$v['url'] = Url("part",array("keyword"=>$v['key_name']));
						$v['type_name']='��ְ';
					}elseif($v['type']=="13"){
						$v['url'] = Url("tiny",array("keyword"=>$v['key_name']));
						$v['type_name']='�չ�����';
					}elseif($v['type']=="3"){
						$v['url'] = Url("job",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='ְλ';
					}elseif($v['type']=="4"){
						$v['url'] = Url("company",array("keyword"=>$v['key_name']));
						$v['type_name']='��˾';
					}elseif($v['type']=="5"){
						$v['url'] = Url("resume",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='�˲�';
					}else if($v['type']=="12"){
						$v['url'] = Url("ask",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='�ʴ�';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}

					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}
		}$list = $list; if (!is_array($list) && !is_object($list)) { settype($list, 'array');}
foreach ($list as $_smarty_tpl->tpl_vars['klist']->key => $_smarty_tpl->tpl_vars['klist']->value) {
$_smarty_tpl->tpl_vars['klist']->_loop = true;
?> <a href="<?php echo smarty_function_listurl(array('type'=>'keyword','v'=>$_smarty_tpl->tpl_vars['klist']->value['key_title']),$_smarty_tpl);?>
" class="jos_tag_a" title="<?php echo $_smarty_tpl->tpl_vars['klist']->value['key_title'];?>
"><?php echo $_smarty_tpl->tpl_vars['klist']->value['key_name'];?>
</a> <?php } ?></span>
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

$("body").on("click",".guanzhu",function () {
    var _this = $(this);
    var job_id = $(this).attr("data-id");
    $.post("/index.php?m=ajax&c=favjobuser",{id:job_id},function(data){

        if(data==1){
            parent.layer.msg('��ע�ɹ���', 2, 9);
            _this.html("ȡ����ע");
            _this.removeClass("guanzhu").addClass("yiguanzhu");
        }
    })
})
$("body").on("click",".yiguanzhu",function () {
    var _this = $(this);
    var job_id = $(this).attr("data-id");
    layer.confirm("��ȷ��Ҫȡ����ע��ְλ��",function() {
        $.post("/member/index.php?c=job&act=del_fav",{id:job_id},function(data){
            if(data==1){
                layer.msg('ȡ����ע�ɹ���', 2, 9);
                _this.html("+��ע");
                _this.removeClass("yiguanzhu").addClass("guanzhu");
            }
        })
    });


})
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
