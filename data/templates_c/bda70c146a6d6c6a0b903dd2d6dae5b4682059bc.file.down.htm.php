<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-27 11:38:42
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/down.htm" */ ?>
<?php /*%%SmartyHeaderCode:6059665945bac50c25e7855-94390107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bda70c146a6d6c6a0b903dd2d6dae5b4682059bc' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/down.htm',
      1 => 1518054204,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6059665945bac50c25e7855-94390107',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comstyle' => 0,
    'style' => 0,
    'now_url' => 0,
    'rows' => 0,
    'v' => 0,
    'com_style' => 0,
    'report' => 0,
    'pagenav' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bac50c26a4310_66287542',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bac50c26a4310_66287542')) {function content_5bac50c26a4310_66287542($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<style type="text/css">
    .icon {
        width: 1em; height: 1em;
        vertical-align: -0.15em;
        fill: currentColor;
        overflow: hidden;
    }
</style>
<div class="w1000">
<div class="admin_mainbody"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <link href="<?php echo $_smarty_tpl->tpl_vars['comstyle']->value;?>
/images/index_style.css" type=text/css rel=stylesheet>
    <link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/pinfen.css" type=text/css rel=stylesheet>
  <div class=right_box>
    <div class=admincont_box>
    <div class="job_list_tit">
         <ul class="">
         <li <?php if ($_GET['c']=="hr") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=hr">收到简历</a></li>
         <li <?php if ($_GET['c']=="down") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=down">已下载简历</a></li>
         <li <?php if ($_GET['c']=="talent_pool") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=talent_pool">收藏简历</a></li>
         <li <?php if ($_GET['c']=="look_resume") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=look_resume">看过的简历</a></li>
             <!--<li <?php if ($_GET['c']=="refuse") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=refuse"  title="不合适简历">不合适简历</a></li>-->
             <!--<li <?php if ($_GET['c']=="record") {?> class="job_list_tit_cur"<?php }?>><a href="index.php?c=record" title="网站为您推荐的简历">网站推荐简历</a></li>-->
         </ul>
         </div>
    <div class="clear"></div>
            <form action="index.php" method="get">
        <div class="news_search">
          <input name="c" type="hidden" value="down">
          <input name="keyword" type="text" class="news_text" placeholder="请输入简历关键字" value="<?php echo $_GET['keyword'];?>
">
          <input name="" type="submit" class="news_bth" value="搜索">
        </div>
        </form>
    
      <div class="com_body">
        <div class=admin_textbox_04>
          <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
          <form action="<?php echo $_smarty_tpl->tpl_vars['now_url']->value;?>
&act=del" target="supportiframe" method="post" id='myform'>
            <div class="" style="margin-top:10px;">
              <div id="job_checkbokid">
              <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
                <div class="job_news_list job_news_list_h1"> 
                <span class="job_news_list_span job_w30">&nbsp;</span> 
                 <span class="job_news_list_span job_w80" style="text-align:left">姓名</span> 
                 <span class="job_news_list_span job_w150">求职意向</span>
                 <span class="job_news_list_span job_w100">工作经验</span> 
                <span class="job_news_list_span job_w100">期望薪资</span> 
                <span class="job_news_list_span job_w120">下载时间</span>
                    <span class="job_news_list_span job_w100">推荐猎头</span>
                    <span class="job_news_list_span job_w150" style="text-align:center;">操作</span>
                </div>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <div class="job_news_list"> <span class="job_news_list_span job_w30" style="padding-right:6px;">
                  <input type="checkbox" name="delid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"  class="com_Release_job_qx_check" style="margin-top:2px;">
                  </span>
                  <span class="job_news_list_span job_w80" style="text-align:left"><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>'`$v.eid`'),$_smarty_tpl);?>
"  target=_blank class="com_Release_name" ><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
&nbsp;</a>
				  <?php if ($_smarty_tpl->tpl_vars['v']->value['height_status']==2) {?><img src="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
/images/yun_gj.png" title="高级简历"><?php }?></span>
                  <span class="job_news_list_span job_w150"><span class="yxjob_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['jobname'];?>
</span>&nbsp;</span>
                   <span class="job_news_list_span job_w100"><?php echo $_smarty_tpl->tpl_vars['v']->value['exp'];?>
&nbsp;</span> 
                   <span class="job_news_list_span job_w100"><?php if ($_smarty_tpl->tpl_vars['v']->value['minsalary']&&$_smarty_tpl->tpl_vars['v']->value['maxsalary']) {?>￥<?php echo $_smarty_tpl->tpl_vars['v']->value['minsalary'];?>
-<?php echo $_smarty_tpl->tpl_vars['v']->value['maxsalary'];
} elseif ($_smarty_tpl->tpl_vars['v']->value['minsalary']) {?>￥<?php echo $_smarty_tpl->tpl_vars['v']->value['minsalary'];?>
以上<?php } else { ?>面议<?php }?>&nbsp;</span>
                   <span class="job_news_list_span job_w120"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['downtime'],'%Y-%m-%d');?>
&nbsp;</span>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['type']==3) {?>
                    <span class="job_news_list_span job_w100 liename">李先生
                        <div class="ltxx" style="left: -155px;">
                                     <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/lttuijian.png" class="lttx">
                                      <div class="jslt">
                                          <div class="namell" style="text-align: left;">邱在云
                                              <label style="margin-left: 20px;color:#666666;font-size: 12px; ">电话：18785852585</label></div>
                                          <p class="namehy">擅长行业：计算机/互联网</p>
                                          <p class="namegs">所在公司：重庆南方新华咨询管理公司</p>
                                      </div>
                                  </div>
                        <!--<a  href="javascript:;" style="cursor: pointer;color: #456dab;padding-left: 5px; "  onclick="pingfen('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['remark'];?>
');">评分</a>-->
                    </span>
                    <?php }?>
                   <span class="job_news_list_span job_w150" style="text-align:center"> <?php if ($_smarty_tpl->tpl_vars['v']->value['userid_msg']==1) {?> <font color="#aaa">已经邀请</font> <?php } else { ?> <a href="javascript:;" uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" username="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" id="b" class="sq_resume uesr_name_a" style="position:relative; "> 邀请面试</a> <?php }?>
                    <span class="job_news_list_span job_w120" style="width:200px;"> <a href="/resume/index.php?c=show&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['eid'];?>
"  id="b"  style="position:relative; "> 查看简历</a>
                  <?php if ($_smarty_tpl->tpl_vars['report']->value==1) {?>
                  <span class="com_m_line">|</span> <a href="javascript:;" r_uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" eid="<?php echo $_smarty_tpl->tpl_vars['v']->value['eid'];?>
" r_name="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" id="r"  class="status uesr_name_a" >举报</a><?php }?> <span class="com_m_line">|</span> <a href="javascript:void(0)" onclick="layer_del('确定要删除？','<?php echo $_smarty_tpl->tpl_vars['now_url']->value;?>
&act=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="uesr_name_a">删除</a> </a>
                </span>
                </div>
                <?php } ?>
                <div>
                  <div class="com_Release_job_bot"> <span class="com_Release_job_qx">
                    <input id='checkAll'  type="checkbox" onclick='m_checkAll(this.form)' class="com_Release_job_qx_check">
                    全选</span>
                    <INPUT class="c_btn_02"  type="button" name="subdel" value="批量删除" onclick="return Delete('delid[]');">
                    <!--<INPUT class="c_btn_02"  type="button" name="subdel" value="批量导出" onclick="check_xls('delid[]');">-->
                  </div>
                  <div class="diggg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
                </div>
                <?php } elseif ($_GET['keyword']!='') {?>
                 <div class="msg_no"><p>没有搜索到下载简历！</p>
                 <a href="<?php echo smarty_function_url(array('m'=>'resume'),$_smarty_tpl);?>
" class="com_msg_no_bth com_submit">我要主动找人才</a></div>
                <?php } else { ?>
                 <div class="msg_no"><p>亲爱的用户，目前您还没有下载简历。</p>
                 <a href="<?php echo smarty_function_url(array('m'=>'resume'),$_smarty_tpl);?>
" class="com_msg_no_bth com_submit">我要主动找人才</a></div>
                <?php }?> </div>
              <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
              <div class="wxts_box wxts_box_mt30" style="display: none;">
			  <div class="wxts">温馨提示：</div>
			 您已下载（<span class="f60"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>）份简历,  <a href="<?php echo smarty_function_url(array('m'=>'resume'),$_smarty_tpl);?>
" class="fb_Com_xz"  target="_blank" style="text-align:center; line-height:25px;">找人才</a><br>       
			</div>
              <?php }?>
			  </div>
              <div  class="clear"></div>
    
          </form>
          <div class="clear"></div>
          <div class="infoboxp22" id="infobox" style="display:none; ">
            <div>
              <form action="index.php?c=down&act=report" method="post" id="formstatus" target="supportiframe">
                <input name="r_uid" value="0" type="hidden">
                <input name="eid" value="0" type="hidden">
                <input name="r_name" value="0" type="hidden">
                <div class="jb_infobox" style="width: 100%;">
                  <textarea id="alertcontent" style="width:310px;margin:5px" name="r_reason" cols="30" rows="9" class="hr_textarea"></textarea>
                </div>
                <div class="jb_infobox" style="width: 100%;">
                  <button type="submit"   name='submit' value='1' class="submit_btn" style="margin-left:80px;">确认</button>&nbsp;&nbsp;
                  <button type="button" id=''  class="cancel_btn">取消</button>
                </div>
              </form>
            </div>
          </div>
          <div  class="infoboxp22"  id="infobox2" style="display:none; ">
              <div>
                  <form action="" method="post" id="formstatus" target="supportiframe">
                      <input name="r_uid" value="0" type="hidden">
                      <input name="eid" value="0" type="hidden">
                      <input name="pingfen" class="pingfen" value="0" type="hidden">
                      <button type="button" id='zxxCancelBtn' class="close cancel_btn" style="display: block;">
                          <svg class="icon" aria-hidden="true">
                              <use xlink:href="#icon-shan"></use>
                          </svg>
                      </button>
                      <div class="com_pf">猎头评分：
                          <label class="iconsxx">
                              <svg class="icon" aria-hidden="true">
                                  <use xlink:href="#icon-pingfenbanfen"></use>
                              </svg>
                              <svg class="icon" aria-hidden="true">
                                  <use xlink:href="#icon-pingfenbanfen"></use>
                              </svg>
                              <svg class="icon" aria-hidden="true">
                                  <use xlink:href="#icon-pingfenbanfen"></use>
                              </svg>
                              <svg class="icon" aria-hidden="true">
                                  <use xlink:href="#icon-pingfenbanfen"></use>
                              </svg>
                              <svg class="icon" aria-hidden="true">
                                  <use xlink:href="#icon-pingfenbanfen"></use>
                              </svg>
                          </label>
                          <label class="fenshu"><label class="number">5</label>分</label>
                      </div>
                      <div class="pjnr">评价内容：</div>
                      <div class="jb_infobox" style="width: 100%;">
                          <textarea id="pjcontent" placeholder="请输入服务评价内容" name="r_reason" cols="30" rows="9" class="hr_textarea" maxlength="100"></textarea>
                          <div class="numts">还可输入<label class="xznum">100</label>字</div>
                      </div>
                      <div class="jb_infobox" style="width: 100%;">
                          <button type="submit"   name='submit' value='1' class="submit_btn">提交评价</button>
                      </div>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php echo '<script'; ?>
 type="" src="http://localhost/app/template/default/js/iconfont.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function pingfen(id,remark){
        $("input[name=id]").val(id);
        $("#remark").val(remark);
        $.layer({
            type : 1,
            title :'评价猎头服务',
            closeBtn : [0 , true],
            border : [10 , 0.3 , '#000', true],
            area : ['500px','360px'],
            page : {dom :"#infobox2"}
        });
        $(".xubox_setwin").css("display","none");
        $(".xubox_setwin .xubox_close").css("display","none");
    }

    $("#pjcontent").on("input propertychange",function () {
        var pjcontent=$("#pjcontent").val();
        var num=100-pjcontent.length;
        if(num<0){
            num=0;
        }
        $(".xznum").html(num);
    })


    //评论星星

    var num  = finalnum = 0;
    var tempnum =5;
    var lis = $(".iconsxx .icon");
    lis.click(function () {
        var lists=$(this).closest(".one_xing");
        finalnum=$(this).index();
        for(var i=0;i<lis.length;i++){
            lis.eq(i).find("use").attr("xlink:href",i <= finalnum ? "#icon-pingfen" : "#icon-pingfenbanfen");
            $(".pingfen").val(finalnum+1);
        }
    });

    function Delete(name){
	var chk_value =[];    
	$('input[name="'+name+'"]:checked').each(function(){    
		chk_value.push($(this).val());   
	});   
	if(chk_value.length==0){
		layer.msg("请选择要删除的数据！",2,8);return false;
	}else{
		layer.confirm("确定删除吗？",function(){
			$("#myform").attr("action","index.php?c=down&act=del");
			setTimeout(function(){$('#myform').submit()},0); 
		});
	} 
} 
function check_xls(name){
	var chk_value =[];    
	$('input[name="'+name+'"]:checked').each(function(){    
		chk_value.push($(this).val());   
	});
	if(chk_value.length==0){
		layer.msg("请选择您要导出的数据！",2,8);return false;
	}else{
		layer.confirm("确定导出吗？",function(){
			$("#myform").attr("action","index.php?c=down&act=xls");
			setTimeout(function(){$('#myform').submit()},0); 
			layer.closeAll();
		});
	} 
}	
$(document).ready(function(){ 
	$('#zxxCancelBtn,.cancel_btn').click(function(){
		layer.closeAll();
	});
	$(".status").click(function(){
		$("input[name=eid]").val($(this).attr("eid"));
		$("input[name=r_uid]").val($(this).attr("r_uid"));
		$("input[name=r_name]").val($(this).attr("r_name")); 
		$.layer({
			type : 1,
			title :'举报', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['320px','160px'],
			page : {dom :"#infobox"}
		});
	}); 
}); 
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/yqms.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
