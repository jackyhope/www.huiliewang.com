<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 09:41:56
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:19901271545bbab5e43931d8-11003971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e02c8bb7b5e1c0304720a9ea4fcf9c0134118508' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/index.htm',
      1 => 1519270974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19901271545bbab5e43931d8-11003971',
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
    'day' => 0,
    'service_com_count' => 0,
    'service_job_count' => 0,
    'service_resume_count' => 0,
    'down_resume_odds' => 0,
    'recommend' => 0,
    'list' => 0,
    'jobs' => 0,
    'time' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbab5e45597f5_61614822',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbab5e45597f5_61614822')) {function content_5bbab5e45597f5_61614822($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_sign')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.sign.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
<style>
    .signdiv{display: block}
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
		layer.confirm('每个正常职位将扣除<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_jobefresh'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
，确定要刷新？',function(){
			layer.load('执行中，请稍候...',0);
			$.post("<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?m=ajax&c=Refresh_job",{},function(data){
				layer.closeAll();
				if(data==1){
					layer.msg("职位刷新成功！",2,9,function(){location.reload();});
				}else{
					layer.msg(data,2,8);
				}
			})
		});
	}else{
		layer.load('执行中，请稍候...',0);
		$.post("<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?m=ajax&c=Refresh_job",{},function(data){
			layer.closeAll();
			if(data==1){
				layer.msg("职位刷新成功！",2,9,function(){location.reload();});
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
}?>，您已成功注册猎头账号！
   </p>
   <p><span class="tip_wt">有问题可拨打客服电话：<em><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</em> </span><a class="tip_fk" href="<?php echo smarty_function_url(array('m'=>'advice'),$_smarty_tpl);?>
" target="_blank">点击这里在线反馈</a>
   </p>

        </div>
        <div class="Tip_Information_bot"><a class="tip_ws" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/?c=info" >完善猎头资料</a> </div>
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
          <div class="Tip_Information_p">明确招聘需求，细化招聘条件，精准锁定人才！</div>
          <div class="Tip_Information_bot"><a href="javascript:Close('two_tip');" class="Tip-next">知道了</a> </div>
        </div>
      </div>
    </div>
  </div>    </div>

<!--  首页-->
<div class="com_m_index_left">
<div class="com_m_index_info">
<div class="com_m_index_logo">  <a href="/lietou"><img src="<?php if ($_smarty_tpl->tpl_vars['lietou']->value['logo']) {?>.<?php echo $_smarty_tpl->tpl_vars['lietou']->value['logo'];
} else { ?> <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/member/lietou/images/lienopic.png <?php }?>" width="100" height="100" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_lt_icon'];?>
','2')"/>
<i class="com_m_index_logo_xg"></i></a></div>
<div class="com_m_index_comname"><?php if ($_smarty_tpl->tpl_vars['lietou']->value['name']) {?>
       <?php echo $_smarty_tpl->tpl_vars['lietou']->value['name'];
} else { ?>
        <a href="index.php?c=info" style="color:#f60; text-decoration:underline">您还未完善猎头信息，点击完善！</a>
        <?php }?></div>
    <div style="margin-left: 25px;">我的<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
：<label><?php echo $_smarty_tpl->tpl_vars['statis']->value['integral'];?>
</label><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
  <a href="index.php?c=pay&type=integral" style="color:#f60;margin-left: 20px; ">去充值</a><br>  <a href="index.php?c=paylog&consume=ok" class="com_m_index_vip_a" style="color:#f60;margin-left: 20px; ">积分明细</a>  <a href="/member/index.php?c=paylog" class="com_m_index_vip_a" style="color:#f60;margin-left: 20px; ">充值记录</a></div>
        <div class="clear"></div>

<div class="clear"></div>
  <div class="com_m_index_logintime">上次登录时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['member']->value['login_date'],'%Y-%m-%d %H:%M');?>
 </div>
       <div class="clear"></div>
    <div class="com_index_bj_box">
  <div class="com_index_bj"><a href="/member/index.php?c=info"><i class="com_index_bjicon com_index_bjiconbj"></i>账号设置</a></div>
  <div class="com_index_bj"><a href="/member/index.php?c=yj"> <i class="com_index_bjicon com_index_bjiconyl"></i>业绩统计</a></div>
  <div class="com_index_bj com_index_bjend"><a href="index.php?c=resume&act=input" target="_blank"><i class="com_index_bjicon com_index_bjiconsz"></i>上传简历</a></div>

    </div>
</div>
<div class="com_index_sign" style="display: none;"><?php echo smarty_function_sign(array(),$_smarty_tpl);?>
</div>
    <div class="today_state">
        <div class="sta_top">今日可用权限</div>
        <div class="tonjinuu">
            <div class="ttjnum" style="border-right: 1px solid #eee;">
                <p>下载简历</p>
                <p class="colo999">
                    <span class="ccss2">20</span>/20</p>
            </div>
            <div class="ttjnum">
                <p>修改简历</p>
                <p class="colo999"><span class="ccss2">4</span>/5</p>
            </div>
        </div>
    </div>



<?php if ($_smarty_tpl->tpl_vars['guweninfo']->value['id']) {?>
<div class="com_index_kf">
<div class="com_m_index_h1"><span class="com_m_index_h1_s">招聘顾问</span></div>
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
:12" alt="点击这里给我发消息"></a>
<?php }?></div>
</div>
<div class="com_index_kf_p">电话：<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['mobile'];?>
</div>
<div class="com_index_kf_p">微信：<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['weixin'];?>
</div>
<div class="com_index_kf_p">Q Q：<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['qq'];?>
</div>
<div class="com_index_kf_p">
	<?php if ($_smarty_tpl->tpl_vars['atn']->value['uid']) {?>
	<a href="javascript:void(0)" class="com_index_kf_dz">已点赞</a>
	<?php } else { ?>
	<a href="javascript:void(0)" onclick="zan('<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
');" class="com_index_kf_dz">点赞</a>
	<?php }?>
    <?php if (is_array($_smarty_tpl->tpl_vars['report']->value)&&!$_smarty_tpl->tpl_vars['report']->value['result']) {?>
    <a href="index.php?c=report&act=show"  class="com_index_kf_ts">已投诉</a>
    <?php } else { ?>
	<a href="javascript:void(0)" onclick="reportgw('<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
','投诉顾问');"  class="com_index_kf_ts">投诉</a>
    <?php }?></div>
</div>
</div>

<?php } else { ?>
<div class="com_index_kf" style="display: none;">
<div class="com_m_index_h1"><span class="com_m_index_h1_s">我的等级</span></div>
    <div class="com_index_kf_box">
        <div class="com_index_kf_p">业绩积分：<label class="result_color">125分</label></div>
        <div class="com_index_kf_p">客户评分：<label class="result_color">125分</label></div>
        <div class="com_index_kf_p">综合业绩：<label class="result_color">125分</label></div>
    </div>
    <div class="com_index_kf_box fontcolor" style="border-bottom: none;">
        <div class="com_index_kf_p">业绩积分：</div>
        <div class="com_index_kf_p">HR下载数量*5</div>
        <div class="com_index_kf_p">客户积分：</div>
        <div class="com_index_kf_p">HR评分总数</div>
        <div class="com_index_kf_p">综合业绩：</div>
        <div class="com_index_kf_p">业绩积分*70%+客户评分*30%</div>
    </div>
</div>

<?php }?>


</div>
<div class="com_m_index_right">
    <?php if ($_smarty_tpl->tpl_vars['member']->value['status']!=1) {?>
   	<!--<div class="com_index_wsh fltL">-->

   		<!--<div class="com_index_wsh_box">-->
        <!--<div class="com_index_wsh_box_p">您的帐号尚未通过审核。</div>-->
   		<!--未审核的猎头用户无法查看人才简历的联系方式。<br/>-->
   		<!--您可联系客服电话（<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
）让我们尽快审核。-->
 	<!--</div>-->

   	<!--</div>-->
    <?php }?>









<?php echo '<script'; ?>
 type="text/javascript">
function jobshuaxin(id){
	<?php if ($_smarty_tpl->tpl_vars['shuaxuanjobs']->value) {?>
	var i=<?php echo $_smarty_tpl->tpl_vars['des_shuaxuanjobs']->value;?>
;
			var num="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_jobefresh'];?>
";
			var breakmsg = '本次共刷新'+i+'个职位,需扣除'+i+'个刷新数量,或消耗'+(num*i)+'<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
！';
			layer.confirm(breakmsg,function(){
				$.post("<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?m=ajax&c=Position_job",{idk:i,ids:id},function(data){
					if(data==1){
						layer.msg("刷新成功！",2,9,function(){window.location.reload();});
					}else{
						layer.msg(data,2,8);
					}
				})
	});
	<?php } else { ?>
		layer.msg('您暂无发布的职位！', 2, 8);
	<?php }?>
}

<?php echo '</script'; ?>
>

    <div class="com_m_index_resume" style="margin-top: 20px;">
        <div class="com_m_index_h1">
            <a class="com_m_index_h1_s hovers bg_current" href="/member/index.php?c=index">工作统计</a>
            <a class="com_m_index_h1_s hovers" href="/member/index.php?c=index&act=newjobs">最新职位</a>
            <a class="com_m_index_h1_s hovers" href="/member/index.php?c=index&act=ranking">猎头排行榜</a>
            <a href="index.php?c=attention_me" class="com_m_index_h1_s_a" target="_blank" style="display: none;">查看关注我公司的人才>></a>
        </div>
        <div class="tj_content show_content">
            <form action="/member/index.php?c=index" method="post">
            <div class="kuang_sou">
                <input type="text" name="keyword" class="inputk" placeholder="请输入您近期服务公司或职位" value="<?php echo $_POST['keyword'];?>
">
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

            <input type="submit" value="搜索" class="tongji_info_text_sub"/>
            </form>
            <div class="tongj_box">
                <div class="tongj_list"><div class="tongj_list_name">日期</div><div class="tongj_list_b">总计<span class="tongj_list_b_n"><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</span>天</div></div>
                <div class="tongj_list"><div class="tongj_list_name"> 服务企业数</div><div class="tongj_list_b">总计<span class="tongj_list_b_n"><?php echo $_smarty_tpl->tpl_vars['service_com_count']->value;?>
</span>家</div></div>
                <div class="tongj_list"><div class="tongj_list_name"> 推荐职位数</div><div class="tongj_list_b">总计<span class="tongj_list_b_n"><?php echo $_smarty_tpl->tpl_vars['service_job_count']->value;?>
</span>个</div></div>
                <div class="tongj_list"><div class="tongj_list_name"> 推荐简历数</div><div class="tongj_list_b">总计<span class="tongj_list_b_n"><?php echo $_smarty_tpl->tpl_vars['service_resume_count']->value;?>
</span>份</div></div>
                <div class="tongj_list tongj_list_last"><div class="tongj_list_name"> 简历下载率</div><div class="tongj_list_b"><span class="tongj_list_b_n"><?php echo $_smarty_tpl->tpl_vars['down_resume_odds']->value;?>
</span></div></div>
            </div>

            <div class="job_news_list listtop">
                <span class="job_news_list_span job_w90" style="padding-left: 10px;">职位编号</span>
                <span class="job_news_list_span job_w440 p_l10" style="text-align:left">职位信息</span>
                <!--<span class="job_news_list_span job_w150">推荐时间</span>-->
                <span class="job_news_list_span job_w110 text_cen">推荐简历数</span>
                <span class="job_news_list_span job_w110 text_cen">简历下载量</span>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['recommend']->value['rows']) {?>
            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recommend']->value['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
            <div class="job_news_list line_heigh35">
                <span class="job_news_list_span job_w90" style="padding-left: 10px;"><?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
</span>
                <span class="job_news_list_span  job_w440 p_l10 line_heigh18 posirel">
                    <!--判断职位发布者-->
                    <?php if ($_smarty_tpl->tpl_vars['list']->value['identity']==3) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_lie.png" class="ico_flag"/>
                    <?php } else { ?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_qi.png" class="ico_flag"/>
                    <?php }?>
                    <div>
                        <a class="job_namer nowrap" href="/job/index.php?c=comapply&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" target="_blank" style="font-size:18px;vertical-align: bottom;"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</a>
                        <label class="lastupdate"><?php echo _format_date($_smarty_tpl->tpl_vars['list']->value['lastupdate']);?>
更新</label>
                    </div>
                    <div class="mat_10">
                        <label class="salery_s" href="#"><?php echo $_smarty_tpl->tpl_vars['list']->value['salary'];?>
</label><span class="xianshu">|</span>
                        <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['list']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['list']->value['job_city_two'];?>

                            <?php if ($_smarty_tpl->tpl_vars['list']->value['job_city_three']) {?>
                            -<?php echo $_smarty_tpl->tpl_vars['list']->value['job_city_three'];?>

                            <?php }?>
                        </label>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value['job_edu']) {?>
                        <span class="xianshu">|</span>
                        <label class="tj_time">学历:<?php echo $_smarty_tpl->tpl_vars['list']->value['job_edu'];?>
</label>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['list']->value['exp']) {?>
                        <span class="xianshu">|</span>
                        <label class="tj_time">工作经验:<?php echo $_smarty_tpl->tpl_vars['list']->value['job_exp'];?>
</label>
                        <?php }?>
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
                <span class="job_news_list_span job_w110 text_cen linh72">
                    <a class="tj_nums" href="/member/index.php?c=progress&job_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['recommend_count'];?>
份简历</a></span>
                <span class="job_news_list_span job_w110 text_cen linh72">
                    <a class="tj_nums" href="/member/index.php?c=progress&w=2&job_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['resume_count'];?>
份简历</a>
                </span>
            </div>
            <?php } ?>

            <div class="pages pages_btns"> <?php echo $_smarty_tpl->tpl_vars['recommend']->value['pagenav'];?>
</div>
            <?php } else { ?>
                <div class="seachno" style="width: 660px;">
                <div class="seachno_left"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" width="144" height="102"></div>
                <div class="listno-content" style="width: 400px;line-height: 24px;"> <strong>暂无相关工作内容</strong><br><br>
                    <span style="margin-top: 10px;">立即前往<a href="/member/index.php?c=job" class="linkds">平台职位库</a>浏览职位，推荐候选人
                        </span>
                    <span>
                </div>
            </div>
            <?php }?>
        </div>
    </div>



</div></div>
</div>
 <!----end--->
  <!--刷新职位提示弹出框-->

<div id="shuaxin" style="display:none;">
<div class="sx_pd">
<div class="sx_top">
<dl>
   <dt></dt>
   <dd>
       <div>今天还没刷新，刷新职位将<em class="sx_bot_or">职位排名提前</em><br/>让人才更容易看到你，<em class="sx_bot_or">提高职位申请率！</em></div>
       <div class="sx_top_t">
            <em class="sx_top_t_tt">刷新前请确认以下信息准确完整：</em>
            <p>联系电话：<?php echo $_smarty_tpl->tpl_vars['lietou']->value['linktel'];?>
</p>
            <p>上次刷新时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['jobs']->value['lastupdate'],"%Y-%m-%d %H:%M:%S");?>
</p>
            <p>招聘职位：<?php echo $_smarty_tpl->tpl_vars['jobs']->value['name'];?>
 </p>
       </div>
    </dd>
</dl>
</div>
</div>
<div class="sx_bot">
     <a class="sx_bot_sx" href="javascript:void(0)" onclick="jobrefresh(<?php echo $_smarty_tpl->tpl_vars['jobs']->value['id'];?>
);">刷新</a>
     <a class="sx_bot_qx" href="javascript:layer.closeAll();">取消</a>
</div>

</div>
<!--提示弹出框 end-->
<!--投诉顾问弹出框-->
<div id="<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
" style="display:none;">
  <div class="Binding_pop_box" style="padding:10px;width:330px;height:200px; background:#fff;">
    <div class="Binding_pop_box_msg">您要投诉的顾问是：<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['username'];?>
</div>
    <div class="popjb_tip">为了能够给您提供高质量的服务，反馈具体情况，我们会第一时间给您答复！</div>

      <div class="">
     	 <textarea id="reason" name="reason" class="popjb_text"></textarea>
      </div>
      <div class="Binding_pop_sub" style="margin-top:15px;"> <span class="Binding_pop_box_list_left">&nbsp;</span>
        <input class="com_pop_bth_qd" onclick="reportSub('index.php?c=report')" type="button" value="确定">
		<input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
" id='eid' name='eid'>
        <input class="com_pop_bth_qx" type="button" value="取消" onclick="layer.closeAll();">
      </div>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">

<?php if ($_smarty_tpl->tpl_vars['lietou']->value['hy']!=''&&$_smarty_tpl->tpl_vars['jobs']->value['name']!=''&&$_smarty_tpl->tpl_vars['jobs']->value['lastupdate']<$_smarty_tpl->tpl_vars['time']->value&&$_COOKIE['jobrefresh']!='1') {?>
	$.layer({
		type : 1,
		title : '刷新职位',
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
		layer.msg('请填写投诉内容！', 2, 8);return false;
	}
	$.post(url,{reason:reason,eid:eid},function(data){
		layer.closeAll();
		if(data=='0'){
			layer.msg('投诉失败！', 2, 8);
		}else if(data=='1'){
			layer.msg('投诉成功！', 2, 9,function(){window.location.reload();});
		}else if(data=='2'){
			layer.msg('已投诉成功，等待管理员回复！', 2, 8);
		}
	});
}
function zan(id){
	$.post("index.php?m=ajax&c=guwenZan",{id:id},function(data){
		if(data=='2'){
			layer.msg('请不要重复点赞！', 2, 8);
		}else if(data=='1'){
			layer.msg('点赞成功！',2,9,function(){window.location.reload();});
			//layer.msg("刷新成功！",2,9,function(){window.location.reload();});
		}
	});
}

$(function () {
    $(".inputk").on("focus",function () {
       $(this).parent(".kuang_sou").css("border","1px solid rgb(117, 146, 193)");
    });
    $(".inputk").on("blur",function () {
        $(this).parent(".kuang_sou").css("border","1px solid #dddddd");
    })
})

<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
