<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-27 10:44:26
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/joblist.htm" */ ?>
<?php /*%%SmartyHeaderCode:10211027125bac440aed3e99-31885081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1dc92c6e657fedf4ac326b73cda76842b945950' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/joblist.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10211027125bac440aed3e99-31885081',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'audit' => 0,
    'config' => 0,
    'rows' => 0,
    'job' => 0,
    'addjobnum' => 0,
    'pagenav' => 0,
    'statis' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bac440b08e697_24556191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bac440b08e697_24556191')) {function content_5bac440b08e697_24556191($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="w1000">
<div class="admin_mainbody"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class=right_box>
    <div class=admincont_box>

        <div class="job_list_tit">
         <ul class="">
         <li <?php if ($_GET['w']=="1") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=1">招聘中的职位</a></li>
         <!--<li <?php if ($_GET['w']=="0") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=0">待审核职位</a></li>-->
         <!--<li <?php if ($_GET['w']=="3") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=3">未通过职位</a></li>-->
         <!--<li <?php if ($_GET['w']=="2") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=2">过期职位</a></li>-->
         <li <?php if ($_GET['w']=="4") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=4">已下架职位</a></li>
         <li <?php if ($_GET['w']=="5") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=5">所有职位</a></li>
         </ul>
         </div>
   <div class="com_body">

        <div class="clear"></div>
        
        <div class="com_Release_job">
        <?php if ($_smarty_tpl->tpl_vars['audit']->value>0) {?>
         <div class="job_list_tip" >提示：你有 <?php echo $_smarty_tpl->tpl_vars['audit']->value;?>
个待审核职位，我们将在24小时内审核，如需马上审核，请联系客服：<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webtel'];?>
 </div>
         <?php }?>
         <div class="clear"></div>
         <div class="joblist_search"><form action="index.php" method="get">
    <div class="joblist_search_box">
        <input name="c" type="hidden" value="job"><input name="w" type="hidden" value="1">
          <input name="keyword" type="text" class="hr_resumesearch_text" placeholder="请输入职位关键字">
          <input name="" type="submit" class="hr_resumesearch_bth" value="搜索"></div>
      </form>
      </div>
          <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
          <form action="index.php?c=job&act=opera" target="supportiframe" method="post" id='myform'>
         
            <?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value) {
$_smarty_tpl->tpl_vars['job']->_loop = true;
?>
             <div class="com_m_job_list">
              <div class="job_list_box">
               <div class="job_list_checkboxbox">
                  <input type="checkbox" name="checkboxid[]" value="<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
" class="com_job_list_check">
                </div>
                <div class="job_list_box_left">
                 <div class="com_m_job_list_t">
               
                <div class="com_m_job_list_jobname">
                <div class="fl"><a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$job.id`'),$_smarty_tpl);?>
" class="com_m_job_list_jobname_a cblue" target="_blank"><?php echo $_smarty_tpl->tpl_vars['job']->value['name'];?>
</a>
                <?php if ($_smarty_tpl->tpl_vars['job']->value['urgent_time']>time()&&$_smarty_tpl->tpl_vars['job']->value['urgent']==1) {?>
                <span class="com_m_job_list_jobfw">紧急</span>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['job']->value['rec_time']>time()&&$_smarty_tpl->tpl_vars['job']->value['rec']==1) {?>
                <span class="com_m_job_list_jobfw">推荐</span>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['job']->value['xsdate']>time()&&$_smarty_tpl->tpl_vars['job']->value['xsdate']) {?>
                <span class="com_m_job_list_jobfw">置顶</span>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['job']->value['autotime']>time()) {?>
                <span class="com_m_job_list_jobfw">自动刷新</span>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['job']->value['rewardpack']==1) {?>
                  <span class="com_m_job_list_jobfw">悬赏</span>
                  <?php }?>
                 </div>
                 <div class="job_share">
					<span>分享到朋友圈</span>
					<div class="job_share_img" style="display:none"><img src="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','a'=>'qrcode','id'=>$_smarty_tpl->tpl_vars['job']->value['id']),$_smarty_tpl);?>
" width="130" height="130"/></div>
				</div>
             </div>
                </div> 
                   <div class="com_m_job_lis_j"><a href="index.php?c=hr&jobid=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['job']->value['type'];?>
"><span class="job_list_list_left_name">应聘简历：</span><strong class="job_list_list_left_u"><?php echo $_smarty_tpl->tpl_vars['job']->value['jobnum'];?>
</strong></a> <span class="job_list_list_left_name" style="margin-left:30px;">浏览量：</span><strong class="job_list_list_left_u"><?php echo $_smarty_tpl->tpl_vars['job']->value['jobhits'];?>
</strong>
                    <span class="job_list_list_left_name" style="margin-left:30px;">招聘状态：</span>
                    <?php if ($_smarty_tpl->tpl_vars['job']->value['status']=="1") {?> 
					<span class="com_m_job_lis_zt">已下架</span>
				    <?php } else { ?>
					<span class="com_m_job_lis_fb">招聘中</span>
				    <?php }?>
                   </div>
                    <div class="com_m_job_list_jobdate">截止日期：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['edate'],'%Y-%m-%d');?>
 <a href="javascript:void(0);" onclick="gotime('<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['edate'],'%Y-%m-%d');?>
')" class="com_m_job_lis_hf" title="延期">延期</a>  <span style="margin-left:20px;">更新时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['lastupdate'],'%Y-%m-%d');?>
</span> <a href="index.php?c=hr&jobid=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['job']->value['type'];?>
" class="com_m_job_lis_hf" >查看应聘简历</a>   </div>
             <div class="job_tg">
             <!--推广服务：-->
              <!--<a href="javascript:void(0);" onclick="autojobs('','<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','<?php if ($_smarty_tpl->tpl_vars['job']->value['autotime']>time()) {
echo $_smarty_tpl->tpl_vars['job']->value['autodate'];
}?>');" class="job_tg_a job_tg_sx">自动刷新</a>-->
                <!--<a href="javascript:void(0);" onclick="jingjia('<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','<?php if ($_smarty_tpl->tpl_vars['job']->value['xs']=='1'&&$_smarty_tpl->tpl_vars['job']->value['xsdate']>time()) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['xsdate'],'%Y-%m-%d');
} else { ?>0<?php }?>');" class="job_tg_a job_tg_zd"> 置顶服务</a>-->
                <!--<a href="javascript:void(0);" onclick="rec('<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','<?php if ($_smarty_tpl->tpl_vars['job']->value['rec']=='1'&&$_smarty_tpl->tpl_vars['job']->value['rec_time']>time()) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['rec_time'],'%Y-%m-%d');
} else { ?>0<?php }?>')" class="job_tg_a job_tg_tj">职位推荐</a>-->
               <!--<a href="javascript:void(0);" onclick="urgent('<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','<?php if ($_smarty_tpl->tpl_vars['job']->value['urgent']=='1') {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['urgent_time'],'%Y-%m-%d');
} else { ?>0<?php }?>')" class="job_tg_a job_tg_jp">紧急招聘</a>-->
				 
             </div>
                </div>
             
                 <div class="jobxlist_oper">
                                       
					<a href="index.php?c=jobadd&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
">修改</a>
                       
					<a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$job.id`'),$_smarty_tpl);?>
" target="_blank" title="预览">预览</a> 
                    
                    <a  href="javascript:void(0)" onclick="refreshJob('<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
');"  title="刷新">刷新</a>
                    <!--<a  href="index.php?c=job&act=opera&up=7" title="刷新">刷新</a>-->
                    <?php if ($_smarty_tpl->tpl_vars['job']->value['status']) {?>
                     <a href="javascript:void(0)" onclick="layer_del('确定要删除该职位？', 'index.php?c=job&act=opera&del=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
'); " title="删除">删除</a>
                     <?php } else { ?>
                    <a href="javascript:off_shelf('确定要下架该职位？','<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','1');"  title="下架">下架</a>

                     <?php }?>
                  </div>  
              </div>
           </div>
            <?php }
if (!$_smarty_tpl->tpl_vars['job']->_loop) {
?>
            <div class="com_msg_no">
                 <p>亲爱的用户，目前您还没有招聘中的职位信息</p>
              <a href="javascript:;" onclick="jobadd_url('<?php echo $_smarty_tpl->tpl_vars['addjobnum']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_job'];?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
');"  class="com_msg_no_bth com_submit">发布职位</a>
            </div>   
            <?php } ?> 
            <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
            <div class="com_Release_job_bot mt10"> <span class="com_Release_job_qx">
              <input id='checkAll' type="checkbox" onclick='m_checkAll(this.form)' class="com_Release_job_qx_check"> 全选</span>
              <input class="c_btn_02 c_btn_02_w110" type="button" value="批量延长有效期" onclick="allgotime();" style="margin-left: 20px;">
              <!--<input class="c_btn_02 c_btn_02_w110" type="button" value="批量自动刷新" onclick="return autojobs('checkboxid[]');">-->
              <input class="c_btn_02 c_btn_02_w110" type="button" value="批量刷新职位" onclick="return Refresh('checkboxid[]');">
              <input class="c_btn_02 c_btn_02_w110" type="button" value="一键下架招聘" onclick="return allonstatus('checkboxid[]');"> 
              <!--<input class="c_btn_02 c_btn_02_w110" type="button" value="批量删除职位" onclick="return really('checkboxid[]');">      -->
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
          <div class="wxts">温馨提示：</div>
         1、 贵公司还可以发布（<span class="f60"><?php if ($_smarty_tpl->tpl_vars['statis']->value['vip_etime']>time()||$_smarty_tpl->tpl_vars['statis']->value['vip_etime']=="0") {
if ($_smarty_tpl->tpl_vars['statis']->value['rating_type']==1) {
echo $_smarty_tpl->tpl_vars['statis']->value['job_num'];
} else { ?>不限<?php }
} else { ?>0<?php }?></span>）条职位信息<br>
          2、如贵公司要快速招聘人才，建议成为我们的会员，获取更多的展示机会，以帮助您快速找到满意的人才。     <a href="index.php?c=right" class="wxts_sj">立即升级</a> <br>
         3、请贵公司保证职位信息的真实性、合法性，并及时更新职位信息，如被举报或投诉，确认发布的信息违反相关规定后，本站将会关闭贵公司的招聘服务，敬请谅解！ <br>
          4、参加紧急的招聘职位;我们将在首页紧急招聘 模块显示，并有紧急图标显示。<br>
           5、参加自动刷新的招聘职位;使招聘职位信息置于列表前端，更有利于吸引客户的注意<br>
          6、参加置顶服务的招聘职位；我们将在首页列表模块显示 ！
        </div>
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
		$("#gotime_edate").html("本次共延期<font color='red'>"+i+"</font>个职位！"); 
	}else{
		$("#gotime_edate").html('当前职位到期时间：<font color="red">'+edate+'</font>');
	}
	$.layer({
		type : 1,
		title : '延期天数',
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['340px','210px'],
		page : {dom : '#gotime'}
	});
}
function allgotime(){//批量延期
	var allid =[];
	var i=0;
	$('input[name="checkboxid[]"]:checked').each(function(){
		allid.push($(this).val());
		i++;
	});
	if(allid.length==0){
		layer.msg("请选择要延期的职位！",2,8);return false;
	}else{
		gotime(allid,'',i);	
	}
}
function allonstatus(){//批量延期
	var allid =[];
	var i=0;
	$('input[name="checkboxid[]"]:checked').each(function(){
		allid.push($(this).val());
		i++;
	});
	if(allid.length==0){
		layer.msg("请选择要下架的职位！",2,8);return false;
	}else{
		onstatus(allid,1);
	}
}
function onstatus(id,status){//修改招聘状态
	$.post("index.php?c=job&act=opera",{id:id,status:status},function(data){
		if(data==1){ 
			layer.msg('设置成功！', 2, 9,function(){window.location.reload();});return false;
		}else{
			layer.msg('设置失败！', 2, 8);
		}
	})
}


function off_shelf(msg,id,status) {
    layer.confirm(msg, function(){
        var i=layer.load('执行中，请稍候...',0);

        $.post("index.php?c=job&act=opera",{id:id,status:status},function(data){
            layer.close(i);
            if(data==1){
                layer.msg('设置成功！', 2, 9,function(){window.location.reload();});return false;
            }else{
                layer.msg('设置失败！', 2, 8);
            }
        })

    });
}
function Refresh(name){
	var chk_value =[];
	var i=0;
	$('input[name="'+name+'"]:checked').each(function(){
		chk_value.push($(this).val());
		i++;
	});
	if(chk_value.length==0){
		layer.msg("请选择要刷新的职位！",2,8);return false;
	}else{

			var num="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_jobefresh'];?>
";
			var breakmsg = '本次共刷新'+i+'个职位,需扣除'+i+'个刷新数量,或消耗'+(num*i)+'<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
！';

        var breakmsg = '本次共刷新'+i+'个职位,确认刷新吗?';
            layer.confirm(breakmsg,function(){
				$.post("<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?m=ajax&c=Refresh_job",{ids:chk_value},function(data){
					if(data==1){
						layer.msg("刷新成功！",2,9,function(){window.location.reload();});
					}else{
						layer.msg(data,2,8);
					}
				})
			});
 
		
	}
} 
$(document).ready(function(){
	$(".job_share").hover(function(){
		
		var html=$(this).find('.job_share_img').html();
		layer.tips(html, this, {
			guide: 1,
			style: ['background-color:#5EA7DC;', '#5EA7DC']
		});
		$(".xubox_layer").addClass("xubox_tips_border");
	},function(){layer.closeTips();}); 
		
	$(".job_list_extension_box").hover(function(){
		$(this).find('.job_list_extension_box_list').show();
	},function(){
		$(this).find('.job_list_extension_box_list').hide();
	}) 
	$(".job_tck_list").click(function(){
		var cron = $(this).attr('data-cron');
		var name = $(this).attr('data-name');
		$("#autotype").val(cron);
		$(".job_box_in").html(name);
		$(".job_tck_box_pot").hide();
	});
	$(".job_box_in").click(function(e){
		$(".job_tck_box_pot").toggle();
	});
	$(document).bind("click",function(e){
		if(e.target.className != 'job_box_in'){
			$(".job_tck_box_pot").hide();
		}
	}); 
});
<?php echo '</script'; ?>
> 
<!--延期天数弹出框-->
<div id="gotime"  style="display:none; width:230px; ">
  <div class="job_box_div"   style="width:300px; ">
    <div class="job_box_msg" style="margin-left:10px;_margin-left:5px;padding:5px;">
      <p id="gotime_edate"></p>
    </div>
    <form action='index.php?c=job&act=opera' target="supportiframe" method="post" id='gotimef'>
      <input type="hidden" name="gotimeid" id="gotimeid" value=""/>
      <div class="job_box_inp"  style="padding:10px 5px 5px 20px"> <span style="float:left; margin-right:0px;">延期天数：</span>
        <input name="day" value="" class="com_info_text placeholder" type="text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" style="width:100px;"/>
        <span class="fltL box_infobox_span" style="padding-left:10px;">天</span> </div>
      <span class="job_box_botton" style="width:100%;"> <a class="job_box_yes job_box_botton2" href="javascript:void(0);" onclick="setTimeout(function(){$('#gotimef').submit()},0);">确定</a> </span>
    </form>
  </div>
</div>
<!--延期天数弹出框end--> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/jobserver.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
