<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-14 14:24:10
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/releasejobs.htm" */ ?>
<?php /*%%SmartyHeaderCode:15594682385b9b540a6175b3-20989237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd391f84cdd47b61e235f32dc02d6f2d3c7eee573' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/releasejobs.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15594682385b9b540a6175b3-20989237',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'companyname' => 0,
    'fake_company' => 0,
    'list' => 0,
    'truename' => 0,
    'industry_name' => 0,
    'industry_index' => 0,
    'v' => 0,
    'job_name' => 0,
    'city_name' => 0,
    'city_index' => 0,
    'rows' => 0,
    'job_list' => 0,
    'job' => 0,
    'total' => 0,
    'zd_list' => 0,
    'pagenav' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b9b540a73e563_75076515',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b9b540a73e563_75076515')) {function content_5b9b540a73e563_75076515($_smarty_tpl) {?><?php if (!is_callable('smarty_function_parse_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.parse_url.php';
if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
<div class="top_nav_list">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<div class="w1000">
<div class="admin_mainbody" style="margin-top: 20px;">
  <div class=down_box style="margin-top: 0px;">
    <div class=admincont_box>

        <div class="search_content">
        <div class="Search_jobs_form_list" style="margin-top: 20px;padding-bottom: 20px;">

            <div class="shaixuan" style="font-weight: inherit;height: 32px;line-height: 32px;float: left;">职位编号：</div>
            <div class="Search_jobs_sub" style="float: left;width: 180px;">
                <input type="text" class="Search_jobs_more_chlose job_id" value="<?php echo $_GET['job_id'];?>
" style="padding-left: 10px;cursor: inherit;width: 180px;">
            </div>
            <div class="shaixuan" style="font-weight: inherit;height: 32px;line-height: 32px;float: left;margin-left: 30px;">职位名称：</div>
            <div class="Search_jobs_sub" style="float: left;width: 180px;">
                <input type="text" class="Search_jobs_more_chlose job_name" value="<?php echo $_GET['job_name'];?>
" style="padding-left: 10px;cursor: inherit;width: 180px;">
            </div>
            <input type="submit" class="sousuo_btns" style="height: 30px;margin-left: 20px;line-height: 30px;" value="搜索"/>

        </div>

        <div class="Search_jobs_form_list search_more" style="padding-bottom: 20px;">

            <div class="Search_jobs_sub" style="margin-left: 20px;margin-top: 14px;">
                <div class="Search_jobs_more_chlose" style="width: 150px;">
                    <span class="Search_jobs_more_chlose_s"><?php if ($_GET['companyname']) {
echo $_smarty_tpl->tpl_vars['companyname']->value;
} else { ?>选择招聘企业<?php }?></span><i class=""></i>
                    <input type="hidden" name="qiyename" class="input_select">
                    <div class="Search_jobs_more_chlose_list none" style="width: 150px;">
                        <ul class="select_hyitem">
                            <li><a class="Search_jobs_cxz width180" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'companyname'=>''),$_smarty_tpl);?>
">全部</a></li>
                            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fake_company']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                            <li><a class="Search_jobs_cxz width150" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'companyname'=>$_smarty_tpl->tpl_vars['list']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['companyname'];?>
</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="Search_jobs_more_chlose" style="width: 180px;">
                    <span class="Search_jobs_more_chlose_s"><?php if ($_GET['truename']) {
echo $_smarty_tpl->tpl_vars['truename']->value;
} else { ?>选择招聘企业备注名<?php }?></span><i class=""></i>
                    <input type="hidden" name="bqiyename" class="input_select">
                    <div class="Search_jobs_more_chlose_list none" style="width: 180px;">
                        <ul class="select_hyitem">
                            <li><a class="Search_jobs_cxz width180" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'truename'=>''),$_smarty_tpl);?>
">全部</a></li>
                            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fake_company']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                            <li><a class="Search_jobs_cxz width180" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'truename'=>$_smarty_tpl->tpl_vars['list']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['truename'];?>
</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="Search_jobs_more_chlose">
                    <span class="Search_jobs_more_chlose_s"><?php if ($_GET['hy']) {
echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];
} else { ?>选择所在行业<?php }?></span><i class=""></i>
                    <input type="hidden" name="hy" class="input_select">
                    <div class="Search_jobs_more_chlose_hylist none">
                        <ul>
                            <li><a  class="Search_jobs_cxz" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'hy'=>''),$_smarty_tpl);?>
">不限</a> </li>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <li><a  class="Search_jobs_cxz" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'hy'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="Search_jobs_more_chlose">
                    <span class="Search_jobs_more_chlose_s"><?php if ($_GET['jobname']) {
echo $_GET['jobname'];
} else { ?>选择职位分类<?php }?></span><i class=""></i>
                    <input type="hidden" name="zwfenlei" class="input_select">
                    <div class="Search_jobs_more_chlose_hylist none">
                        <ul>
                            <li><a  class="Search_jobs_cxz" href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'jobname'=>''),$_smarty_tpl);?>
">不限</a> </li>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_name']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <li><a  class="Search_jobs_cxz"  href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'jobname'=>$_smarty_tpl->tpl_vars['v']->value['name']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="Search_jobs_more_chlose">
                    <span class="Search_jobs_more_chlose_s"><?php if ($_GET['city']) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['city']];
} else { ?>选择所在城市<?php }?></span><i class=""></i>
                    <input type="hidden" name="city" class="input_select">
                    <div class="Search_jobs_more_chlose_list none" style="width: 415px;">
                        <ul>
                            <li style="width: inherit;"><a href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'city'=>''),$_smarty_tpl);?>
"  class="Search_jobs_cxz">全部</a> </li>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <li style="width: inherit;"><a href="<?php echo smarty_function_parse_url(array('m'=>'member','c'=>'job','act'=>$_GET['act'],'city'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_cxz"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="left_job_all fl">
            <div class="job_left_sidebar" style="width: 1040px;margin-left: 30px;">
                <div class="job_news_list" style="background: #f1f8ff">
                    <span class="job_news_list_span job_w110" style="padding-left: 10px;">职位编号</span>
                    <span class="job_news_list_span job_w450">职位信息</span>
                    <!--<span class="job_news_list_span job_w110">招聘状态</span>-->
                    <!--<span class="job_news_list_span job_w110">更新时间</span>-->
                    <span class="job_news_list_span job_w110">截止招聘</span>
                    <span class="job_news_list_span job_w110">应聘简历</span>
                    <span class="job_news_list_span job_w110">已下载简历</span>
                    <span class="job_news_list_span job_w110" style="text-align: center;">操作</span>
                </div>

                <?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value) {
$_smarty_tpl->tpl_vars['job']->_loop = true;
?>
                <div class="job_news_list line_heigh45" pid="<?php echo $_smarty_tpl->tpl_vars['job_list']->value['id'];?>
">
                    <span class="job_news_list_span job_w110" style="padding-left: 10px;">
                        <label class="tj_time"><?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
</label>
                    </span>
                    <span class="job_news_list_span  job_w450 line_heigh23" style="text-align:left;">
                        <div>
                            <a class="job_namer" href="/job/index.php?c=comapply&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
" target="_blank" style="font-size: 18px;"><?php echo $_smarty_tpl->tpl_vars['job']->value['name'];?>
</a>
                             <label class="lastupdate"><?php echo date("Y-m-d",$_smarty_tpl->tpl_vars['job']->value['lastupdate']);?>
更新</label>
                        </div>
                        <div class="mat_10">
                             <label class="salery_s" href="#">
                                 <?php if ($_smarty_tpl->tpl_vars['job']->value['minsalary']&&$_smarty_tpl->tpl_vars['job']->value['maxsalary']) {?>
                                  ￥<?php echo $_smarty_tpl->tpl_vars['job']->value['minsalary'];?>
-<?php echo $_smarty_tpl->tpl_vars['job']->value['maxsalary'];?>

                                  <?php } elseif ($_smarty_tpl->tpl_vars['job']->value['minsalary']) {?>
                                         <?php echo $_smarty_tpl->tpl_vars['job']->value['minsalary'];?>
以上
                                  <?php } else { ?>
                                         面议
                                  <?php }?>
                             </label><span class="xianshu">|</span>
                            <label class="tj_time">
                                <?php echo $_smarty_tpl->tpl_vars['job']->value['job_city_one'];?>

                                <?php if ($_smarty_tpl->tpl_vars['job']->value['job_city_two']) {?>
                                -<?php echo $_smarty_tpl->tpl_vars['job']->value['job_city_two'];?>

                                <?php }?>
                            </label><span class="xianshu">|</span>
                            <label class="tj_time">学历:<?php echo $_smarty_tpl->tpl_vars['job']->value['job_edu'];?>
</label><span class="xianshu">|</span>
                            <label class="tj_time">工作经验:<?php echo $_smarty_tpl->tpl_vars['job']->value['job_exp'];?>
</label>
                        </div>
                        <div class="mat_10">
                             <label class="com_style"><?php echo $_smarty_tpl->tpl_vars['job']->value['com_name'];?>
</label>
                        </div>

                    </span>
                    <span class="job_news_list_span job_w110 linh72">
                        <label class="tj_time" style="color: #666;"><?php echo $_smarty_tpl->tpl_vars['job']->value['edate'];?>
</label>
                    </span>
                    <span class="job_news_list_span job_w110 linh72">
                        <a class="job_namer" href="index.php?c=apply&w=1&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['job']->value['jobnum'];?>
份简历</a>
                    </span>
                    <span class="job_news_list_span job_w110 linh72">
                        <a class="job_namer" href="index.php?c=apply&w=1&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['job']->value['jobnum1'];?>
份简历</a>
                    </span>
                    <span class="job_news_list_span job_w110" style="line-height: 30px;">
                        <a href="index.php?c=jobadd&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
" target="_blank" class="btn_hxr w40b tuijan">修改</a>

                        <a  href="javascript:void(0)" onclick="refreshJob('<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
');"  title="刷新" class="btn_hxr w40b tuijan mat_5">  刷新</a>
                        <?php if ($_smarty_tpl->tpl_vars['job']->value['status']) {?>
                        <a  href="javascript:onstatus('<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','2');" title="上架"  class="btn_hxr w40b tuijan">上架</a>
                         <a href="javascript:void(0)" onclick="layer_del('确定要删除该职位？', 'index.php?c=job&act=opera&del=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
'); " title="删除"  class="btn_hxr w40b tuijan">删除</a>
                        <?php } else { ?>
                        <a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$job.id`'),$_smarty_tpl);?>
" target="_blank" title="预览"  class="btn_hxr w40b tuijan">预览</a>
                        <a href="javascript:off_shelf('确定要下架该职位？','<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
','1');"  title="下架"  class="btn_hxr w40b tuijan">下架</a>
                        <?php }?>

                    </span>
                </div>

                <?php } ?>
                <?php if ($_smarty_tpl->tpl_vars['total']->value!=0||is_array($_smarty_tpl->tpl_vars['zd_list']->value)) {?>

                <div class="clear"></div>
                <div class="search_pages">
                    <div class="pages"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
                </div>
                <input value='<?php echo $_GET['ltype'];?>
' type='hidden' id='ltype'/>
                <?php } else { ?>
                <!--没搜索到-->
                <div class="seachno">
                    <div class="seachno_left"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" width="144" height="102"></div>
                    <div class="listno-content" style="line-height: 24px;"> <strong>很抱歉，您暂时还没有发布任何职位</strong><br><br>
                        <span>立即前往<a href="index.php?c=jobadd" class="linkds">发布新职位</a>
                        </span>
                    </div>
                </div>
                <?php }?> </div>
        </div>
      </div>

      </div>
    </div>
  </div>
<?php echo '<script'; ?>
>

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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/com_index.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/search.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(function () {
        $(".select_click .Search_jobs_cxz").click(function () {
            var content=$(this).html();
            $(this).closest(".Search_jobs_more_chlose").find(".Search_jobs_more_chlose_s").html(content);
            $(this).closest(".Search_jobs_more_chlose_list,.Search_jobs_more_chlose_hylist").hide();
        })
    })


    function changeUrlArg(url, arg, val){
        var pattern = arg+'=([^&]*)';
        var replaceText = arg+'='+val;
        return url.match(pattern) ? url.replace(eval('/('+ arg+'=)([^&]*)/gi'), replaceText) : (url.match('[\?]') ? url+'&'+replaceText : url+'?'+replaceText);
    }


    $(".sousuo_btns").click(function () {
        var job_id = $(".job_id").val();
        var job_name = $(".job_name").val();

        var url=changeUrlArg(window.location.href,"job_id",job_id);
        var url=changeUrlArg(url,"job_name",job_name);
        location = url;
    })
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/jobserver.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
