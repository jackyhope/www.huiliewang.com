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
         <li <?php if ($_GET['w']=="1") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=1">招聘中的职位</a></li>
         <!--<li <?php if ($_GET['w']=="0") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=0">待审核职位</a></li>-->
         <!--<li <?php if ($_GET['w']=="3") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=3">未通过职位</a></li>-->
         <!--<li <?php if ($_GET['w']=="2") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=2">过期职位</a></li>-->
         <li <?php if ($_GET['w']=="4") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=4">已下架职位</a></li>
         <li <?php if ($_GET['w']=="5") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=job&w=5">所有职位</a></li>
         </ul>
         </div>
      <div class="clear"></div>
        <div class="com_body">
          <div class="clear"></div>
          <div class="com_Release_job"> <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
            <div class="com_Release_job_h1">
              <span class="com_Release_job_a_c">&nbsp;</span>
              <span class="com_Release_job_a" style="width:200px;">职位名称</span>
              <span class="com_Release_job_c">收到简历</span>
              <span class="com_Release_job_e">浏览量 </span>
              <span class="com_Release_job_e">招聘状态</span>
              <span class="com_Release_job_e">更新时间</span>
              <span class="com_Release_job_e">到期时间</span>
              <span class="com_Release_job_b">操作</span>
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
份</a></div>
                <div class="com_Release_job_span  com_Release_job_e"><?php echo $_smarty_tpl->tpl_vars['job']->value['jobhits'];?>
 </div>

                <div class="com_Release_job_span  com_Release_job_e">
                  <?php if ($_smarty_tpl->tpl_vars['job']->value['status']=="1") {?>
                  <span style="padding:0px 0px">已下架</span>
                  <?php } else { ?>
                  <span class="com_m_job_lis_zt" style="padding:0px 0px">招聘中</span>
                  <?php }?>
                </div>

                <div class="com_Release_job_span  com_Release_job_span  com_Release_job_e"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['lastupdate'],'%Y-%m-%d');?>
</div>
                <div class="com_Release_job_span com_Release_job_e"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['edate'],'%Y-%m-%d');?>
 </div>
                <div class="com_Release_job_span  com_Release_job_b" >
                
                <a  href="index.php?c=jobadd&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
" class="cblue" class="cblue">修改</a>


                   <?php if ($_smarty_tpl->tpl_vars['job']->value['status']=="1") {?> <a href="javascript:onstatus('<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','2');"  class="cblue">上架</a><?php } else { ?>
                  <a href="javascript:off_shelf('确定要下架该职位？','<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','1');"  class="cblue">下架</a><?php }?>

                
                <a href="javascript:void(0)" onclick="layer_del('确定要删除该职位？','index.php?c=job&act=opera&del=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
');" class="cblue">删除</a> <?php if ($_GET['w']=='2') {?> <a href="javascript:void(0);" onclick="gotime('<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['job']->value['edate'],'%Y-%m-%d');?>
')" class="cblue">延期</a> <?php }?> </div>
                	<?php if ($_GET['w']=='3') {?>
                <div class="com_Release_job_span  com_Release_job_bot"> <em class="com_Release_job_span  com_Release_job_em" style="_margin-left:15px;">未通过原因：<?php echo $_smarty_tpl->tpl_vars['job']->value['statusbody'];?>
 </em> </div>
                <?php }?> </div>
              <?php }
if (!$_smarty_tpl->tpl_vars['job']->_loop) {
?>
              <div class="msg_no"><p>亲爱的用户，目前您还没有相关职位</p><a href="javascript:;" onclick="jobadd_url('<?php echo $_smarty_tpl->tpl_vars['addjobnum']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_job'];?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
');" class="com_msg_no_bth com_submit">点击添加职位</a></div>
              <?php } ?> 
              <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
              <div class="com_Release_job_bot"> <span class="com_Release_job_qx">
                <input id='checkAll' type="checkbox" onclick='m_checkAll(this.form)'class="com_Release_job_qx_check">
                全选</span> <?php if ($_GET['w']=='2') {?>
                <INPUT class="c_btn_02 c_btn_02_w110" type="button" value="批量延长有效期" onclick="allgotime();">
                <?php }?>
                <?php if ($_GET['w']=='4') {?>
               <INPUT class="c_btn_02 c_btn_02_w110" type="button" value="一键上架招聘" onclick="return allonstatusopen('checkboxid[]');">
                <?php }?>
                <INPUT class="c_btn_02 c_btn_02_w110" type="button" value="批量删除职位" onclick="return really('checkboxid[]');">
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
            1、如贵公司要快速招聘人才，建议成为我们的会员，获取更多的展示机会，以帮助您快速找到满意的人才。 <br>
            2、请贵公司保证职位信息的真实性、合法性，并及时更新职位信息，如被举报或投诉，确认发布的信息违反相关规定后，本站将会关闭贵公司的招聘服务，敬请谅解！ </div>
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
function allonstatusopen(){//批量延期
	var allid =[];
	var i=0;
	$('input[name="checkboxid[]"]:checked').each(function(){
		allid.push($(this).val());
		i++;
	});
	if(allid.length==0){
		layer.msg("请选择要上架的职位！",2,8);return false;
	}else{
		onstatus(allid,2);
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
<?php echo '</script'; ?>
> 
<!--延期天数弹出框-->
<div id="gotime"  style="display:none; width:230px; ">
  <div class="job_box_div"  style="width:300px; ">
    <div class="job_box_msg" style="margin-left:10px;_margin-left:5px;margin-top:10px; padding:5px;">
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
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
