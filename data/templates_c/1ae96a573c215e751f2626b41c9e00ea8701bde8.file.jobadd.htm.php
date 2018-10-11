<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-09 11:44:18
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/jobadd.htm" */ ?>
<?php /*%%SmartyHeaderCode:20677042265b42da124b0206-87900860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ae96a573c215e751f2626b41c9e00ea8701bde8' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/jobadd.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20677042265b42da124b0206-87900860',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'config' => 0,
    'row' => 0,
    'today' => 0,
    'company' => 0,
    'save' => 0,
    'statis' => 0,
    'rating' => 0,
    'jobnum' => 0,
    'job_name' => 0,
    'city_name' => 0,
    'city_index' => 0,
    'v' => 0,
    'city_type' => 0,
    'industry_name' => 0,
    'industry_index' => 0,
    'comdata' => 0,
    'comclass_name' => 0,
    'arr_data' => 0,
    'j' => 0,
    'job_link' => 0,
    'addjobnum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b42da1276f595_01119618',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b42da1276f595_01119618')) {function content_5b42da1276f595_01119618($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/index_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="w1000">
    <div class="admin_mainbody">
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/class.public.css" type="text/css">
        <?php echo '<script'; ?>
 charset="utf-8" src="../js/kindeditor/kindeditor-min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 charset="utf-8" src="../js/kindeditor/lang/zh_CN.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/data/plus/job.cache.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/class.public.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/lssave.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 language="javascript">
            var saveid=$("#id").val();
            var start = 30;
            var step = -1;
            if(!saveid){
                function count(){
                    $("#atime").click(function(){ start=30});
                    document.getElementById("totalSecond").innerHTML = start;
                    start += step;
                    if(start < 0 ){
                        savejobform();
                        start = 30;
                    }
                    setTimeout("count()",1000);
                }
                window.onload = count;
            }
            var editor;
            KindEditor.ready(function(K){
                editor = K.create('#description',{
                    resizeType : 1, width:'513px',
                    allowPreviewEmoticons : false,
                    allowImageUpload : false,
                    items : [
                        'bold','italic','underline',
                        'removeformat','|','justifyleft','justifycenter','justifyright','insertorderedlist',
                        'insertunorderedlist']
                });
            });

            function change_days_type(){
                $(".days").toggle();
                $(".edate").toggle();
            }
            function change_salary_type(){
                if($("#salary_type").attr('checked')=='checked'){
                    $("#minsalary").attr("disabled","disabled");
                    $("#maxsalary").attr("disabled","disabled");
                    $("#minsalary").val(0);$("#maxsalary").val(0);
                }else{
                    $("#minsalary").removeAttr("disabled","disabled");
                    $("#maxsalary").removeAttr("disabled","disabled");
                    $("#minsalary").val('<?php echo $_smarty_tpl->tpl_vars['row']->value['minsalary'];?>
');
                    $("#maxsalary").val('<?php echo $_smarty_tpl->tpl_vars['row']->value['maxsalary'];?>
');
                }
            }
            function toDate(str){
                var sd=str.split("-");
                return new Date(sd[0],sd[1],sd[2]);
            }
            function CheckPost(){
                var days = $.trim($("#days").val());
                var end = $("#edate").val();
                var name = $.trim($("#name").val());
                var islink=$("input[name='islink']").val();
                var isemail=$("input[name='isemail']").val();
                var days_type=$("input[name='days_type']:checked").val();
                if(name==''){layer.msg('职位名称不能为空！',2,8);return false;}
                if($("#job_post").val()==''){layer.msg('职位类别不能为空！', 2, 8);return false;}
                if($("#citysid").val()==''){layer.msg('工作地点不能为空！', 2, 8);return false;}
                var description = editor.text();
                var minsalary=$.trim($("#minsalary").val());
                var maxsalary=$.trim($("#maxsalary").val());
                if($("#salary_type").attr("checked")!='checked'){
                    if(minsalary==''||minsalary=='0'){
                        layer.msg('请填写薪资待遇！', 2, 8);return false;
                    }
                    if(maxsalary){
                        if(parseInt(maxsalary)<=parseInt(minsalary)){
                            layer.msg('最高工资必须大于最低工资！', 2, 8);return false;
                        }
                    }
                }
                if(end==''&&!days){layer.msg('招聘天数、结束时间必须填一项！', 2, 8);return false;}
                if($("#days_type").attr("checked")!='checked'&& days>'999'){
                    layer.msg('最多只能输入999！', 2, 8);return false;
                }
                if(end && days_type){
                    var st=toDate('<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
').getTime()/1000;
                    var ed=toDate(end).getTime()/1000;
                    if(ed<=st){
                        layer.msg('结束日期必须大于今天日期！',2,8);return false
                    }
                }
                if($.trim(description)==''){layer.msg('职位描述不能为空！', 2, 8);return false;}
                if(!islink){
                    layer.msg('请选择联系方式！', 2, 8);return false;
                }else if(islink==2){
                    var link_man=$.trim($("input[name='link_man']").val());
                    var link_moblie=$.trim($("input[name='link_moblie']").val());
                    if(link_man==''||link_moblie==''){
                        layer.msg('联系人及联系电话均不能为空！', 2, 8);return false;
                    }
                    if(link_moblie&& (isjsMobile(link_moblie)==false && !isjsTell(link_moblie))){
                        layer.msg('联系电话格式错误！', 2, 8);return false;
                    }
                }
                if(isemail=='2'){
                    var email=$.trim($("input[name='email']").val());
                    if(email==''){
                        layer.msg('请输入邮箱！', 2, 8);return false;
                    }else if(check_email(email)==false){
                        layer.msg('新邮箱格式错误！', 2, 8);return false;
                    }
                }
                var index = layer.load('执行中，请稍候...',0);
            }
            function choice(id,type){
                if(type=='lang' || type=='welfare'){
                    if($("#"+type+id).val()==id){
                        $("#job"+type+id).removeClass("job_add_list_li_cur");
                        $("#"+type+id).val("");
                    }else{
                        $("#job"+type+id).addClass("job_add_list_li_cur");
                        $("#"+type+id).val(id);
                    }
                }else if(type=='link'||type=='email'){
                    if(id==1){
                        $("#is"+type+"3").removeClass('admin_job_style_n');
                        $("#is"+type+"2").removeClass('admin_job_style_n');
                        $("#is"+type+id).addClass('admin_job_style_n');
                        $("input[name='is"+type+"']").val(id);
                        $("#new"+type).hide();
                        $("#tblink").val(2)
                    }else if(id==2){
                        $("#is"+type+"3").removeClass('admin_job_style_n');
                        $("#is"+type+"1").removeClass('admin_job_style_n');
                        $("#is"+type+id).addClass('admin_job_style_n');
                        $("input[name='is"+type+"']").val(id);
                        $("#new"+type).show();
                    }else if(id==3){
                        $("#is"+type+"1").removeClass('admin_job_style_n');
                        $("#is"+type+"2").removeClass('admin_job_style_n');
                        $("#is"+type+id).addClass('admin_job_style_n');
                        $("input[name='is"+type+"']").val(id);
                        $("#new"+type).hide();
                    }
                }
            }
            $(document).ready(function(){
                $("#days_type").attr("checked",false);
                $(".com_admin_ask").hover(function(){
                    layer.tips("填写详细信息，有助于您招聘精准人才！", this, {
                        guide: 1,
                        style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC']
                    });
                    $(".xubox_layer").addClass("xubox_tips_border");
                },function(){layer.closeTips();});
                $(".job_sex_box_li").hover(function(){
                    var aid=$(this).attr("aid");
                    $(this).addClass("selected");
                    $("#jobtype"+aid).show();
                },function(){
                    var aid=$(this).attr("aid");
                    $(this).removeClass("selected");
                    $("#jobtype"+aid).hide();
                })
                $("#job_button").click(function(){
                    $("#joblist").show();
                    $("#bg").show();
                })
                $(".Description_icon").hover(function(){
                    $(".Description_box").show();
                },function(){
                    $(".Description_box").hide();
                })
                $("#name").blur(function(){
                    var name=$("#name").val();
                    get_jobclass(name);
                })
                $("#tbval").click(function(){
                    if($(this).hasClass("jobadd_tel_iconno")){
                        $(this).removeClass("jobadd_tel_iconno");
                        $(this).addClass("jobadd_tel_iconyes");
                        $("#tblink").val(1)
                    }else if($(this).hasClass("jobadd_tel_iconyes")){
                        $(this).removeClass("jobadd_tel_iconyes");
                        $(this).addClass("jobadd_tel_iconno");
                        $("#tblink").val(2)
                    }
                })
            })
            function check_job(id,name){
                $("#job_post").val(id);
                $("#job_button").val(name);
                $("#joblist").hide();
                $("#bg").hide();
                if($.trim($("#name").val())==""){
                    $("#name").val(name);
                }
                get_jobclass(name);
            }
            function get_jobclass(name){
                $.post(weburl+"/member/index.php?m=ajax&c=get_jobclass",{name:name},function(data){
                    if(data){
                        data=data.split("##");
                        $("#JobRequInfoTemplate").html(data[0]);
                        $("#job_button").val(data[1]);
                        $(".Description").show();
                    }else{
                        $(".Description").hide();
                    }
                })
            }
            function select_job(id){
                $.post(weburl+"/member/index.php?m=ajax&c=job_content",{id:id},function(data){
                    editor.html(data);
                })
            }
            function returnmessagejob(frame_id){
                if(frame_id==''||frame_id==undefined){
                    frame_id='supportiframe';
                }
                var message = $(window.frames[frame_id].document).find("#layer_msg").val();
                if(message != null){
                    var url=$(window.frames[frame_id].document).find("#layer_url").val();
                    var layer_time=$(window.frames[frame_id].document).find("#layer_time").val();
                    var layer_st=$(window.frames[frame_id].document).find("#layer_st").val();
                    var layer_url = $(window.frames[frame_id].document).find("#layer_url").val();
                    layer.closeAll('loading');
                    if(layer_st=='9'){

                        $('#jobid').val(layer_url);


                        $.layer({
                            type : 1,
                            move:false,
                            fix: true,
                            zIndex:666,
                            title : '系统提示',
                            border : [10 , 0.3 , '#000', true],
                            area : ['480px','220px'],
                            page : {dom : '#addjob'},
                            close: function(){
                                <?php if ($_smarty_tpl->tpl_vars['config']->value['com_job_status']=='1') {?>
                                    window.location.href = "index.php?c=job&w=1";
                                    <?php } else { ?>
                                        window.location.href = "index.php?c=job&w=0";
                                        <?php }?>
                                }
                            });


                    }else{
                        if(url=='1'){
                            layer.msg(message, layer_time, Number(layer_st),function(){window.location.reload();window.event.returnValue = false;return false;});
                        }else if(url==''){

                            layer.msg(message, layer_time, Number(layer_st));
                        }else{
                            layer.msg(message, layer_time, Number(layer_st),function(){window.location.href = url;window.event.returnValue = false;return false;});
                        }
                    }
                }
            }
        <?php echo '</script'; ?>
>
        <style>
            * {margin: 0 ;padding: 0;}
            body,div{margin: 0 ;padding: 0;}
        </style>
        <input type="hidden"id="comname" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
">
        <div class=right_box>
            <div class=admincont_box>
                <div class="com_tit"><span class="com_tit_span">新增职位</span><span class="com_tit_right"><span class="ff0">*</span>为必填项</span></div>   <div class="com_body">
                <?php if ($_smarty_tpl->tpl_vars['save']->value) {?>
                <div id="forms"class="text_tips">您有上次未提交成功的数据 <a href="javascript:;" onclick="savejob();" class="text_tips_a">恢复数据</a> <i id="close" class="text_tips_close"></i></div>
                <?php }?>
                <iframe id="supportiframejob"  name="supportiframejob" onload="returnmessagejob('supportiframejob');" style="display:none"></iframe>
                <form name="MyForm" target="supportiframejob" method="post" action="index.php?c=jobadd&act=save" onsubmit="return CheckPost();">
                    <div class="com_msg" style="display: none;">温馨提示：
                        <?php if ($_smarty_tpl->tpl_vars['statis']->value['vip_etime']>time()||$_smarty_tpl->tpl_vars['statis']->value['vip_etime']=="0") {?>
                        <?php if ($_smarty_tpl->tpl_vars['statis']->value['rating_type']==1) {?>
                        您的账号可同时发布<?php echo $_smarty_tpl->tpl_vars['rating']->value['job_num'];?>
个职位
                        <?php } else { ?>
                        您当前是<?php echo $_smarty_tpl->tpl_vars['statis']->value['rating_name'];?>
，到期时间是<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['statis']->value['vip_etime'],'%Y-%m-%d');?>
，在此之前您可以任意发布职位
                        <?php }?>
                        <?php } else { ?>
                        您的账号会员套餐已用完，发布一个职位将扣除<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_job'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
职位
                        <?php }
if ($_smarty_tpl->tpl_vars['jobnum']->value) {?> ，现已发布 <?php echo $_smarty_tpl->tpl_vars['jobnum']->value;?>
个职位<?php }?></div>
                    <div class=admin_textbox_02>
                        <ul>
                            <li>
                                <div class=tit><font color="#FF0000">*</font> 职位名称：</div>
                                <div class=textbox>
                                    <INPUT type="text" size="45" name="name" id='name'value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" style="float:left" class="com_info_text" maxlength="18">
                                    <span id="by_name" class="errordisplay">职位名不能为空</span> </div>
                            </li>

                            <li>
                                <div class=tit><font color="#FF0000">*</font> 职位类别：</div>
                                <div class="textbox" >
                                    <div class="text_seclet text_seclet_cur" style="z-index:100">
                                        <input type="hidden" name="job_post" id="job_post" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['job_post'];?>
"/>
                                        <input class="SpFormLBut text_seclet_w250 " type="button"  value="<?php if ($_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['row']->value['job_post']]) {
echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['row']->value['job_post']];
} else { ?>请选择职位类别<?php }?>" onclick="index_job(3,'#workadds_job','#job_post','left:100px;top:100px; position:absolute;','<?php echo $_smarty_tpl->tpl_vars['row']->value['job_post'];?>
');" id="workadds_job"  >

                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class=tit><font color="#FF0000">*</font> 工作地点：</div>
                                <div class=textbox>
                                    <div class="text_seclet text_seclet_cur2 fltL">
                                        <input class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['provinceid']) {?> value="<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']];?>
" <?php } else { ?>value="请选择"<?php }?> id="province" onclick="search_show('job_province');">
                                        <input type="hidden" id="provinceid" name="provinceid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['provinceid'];?>
" />
                                        <div id="job_province" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display:none">
                                            <div style="width:100%;  overflow:auto; overflow-x:hidden">
                                                <ul class="Search_Condition_box_list">
                                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                                    <li><a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','province','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','citys','city');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>    </div>
                                    </div>
                                    <div class="text_seclet text_seclet_cur2 fltL">
                                        <input class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['cityid']) {?> value="<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']];?>
" <?php } else { ?>value="请选择"<?php }?> id="citys" onclick="search_show('job_citys');">
                                        <input type="hidden" id="citysid" name="cityid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cityid'];?>
" />
                                        <div id="job_citys" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display:none">
                                            <div style="width:100%;  overflow:auto; overflow-x:hidden">
                                                <ul class="Search_Condition_box_list">
                                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                                    <li><a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','citys','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','three_city','city');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>  </div>
                                    </div>
                                    <div class="text_seclet text_seclet_cur2 fltL" <?php if ($_smarty_tpl->tpl_vars['row']->value['three_cityid']<1) {?>style="display:none"<?php }?> id="cityshowth">
                                    <input class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['three_cityid']) {?> value="<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['three_cityid']];?>
" <?php } else { ?>value="请选择"<?php }?> id="three_city" onclick="three_city_show('job_three_city');">
                                    <input type="hidden" id="three_cityid" name="three_cityid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['three_cityid'];?>
" />
                                    <div id="job_three_city" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display:none">
                                        <ul class="Search_Condition_box_list">
                                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                            <li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','three_city','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                    </div>
                    </li>

                    <li>
                        <div class="tit days"><font color="#FF0000">*</font> 职位有效期：</div>
                        <div class="tit edate" style="display:none"><font color="#FF0000">*</font> 结束日期：</div>
                        <div class="textbox">
                            <input type="text" name="days" id='days' <?php if ($_smarty_tpl->tpl_vars['row']->value['days']) {?>value="<?php echo $_smarty_tpl->tpl_vars['row']->value['days'];?>
"<?php } else { ?>value='30'<?php }?> style="float:left" class="com_info_text days" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="3">
                            <input id="edate" class="input-text com_info_text edate" type="text" readonly="" size="15" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['edate'],'%Y-%m-%d');?>
" name="edate" style="display:none"><span id="by_days" style="color:#666"><input value='1' type='checkbox' id='days_type' name='days_type' onclick="change_days_type()">自定义结束日期。</span>
                            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/css/font-awesome.min.css" type="text/css">
                            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/foundation-datepicker.min.js"><?php echo '</script'; ?>
>
                            <?php echo '<script'; ?>
 type="text/javascript">
                                $('#edate').fdatepicker({format: 'yyyy-mm-dd',startView:4,minView:2});
                            <?php echo '</script'; ?>
>
                        </div>
                    </li>
                    <li>
                        <div class=tit><font color="#FF0000">*</font> 薪资待遇：</div>
                        <div class="textbox">
                            <div class="job_xz_text_box">
                                <input type="text" size="5" id="minsalary" name="minsalary" <?php if ($_smarty_tpl->tpl_vars['row']->value['minsalary']) {?>value="<?php echo $_smarty_tpl->tpl_vars['row']->value['minsalary'];?>
"<?php }?>  onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="job_xz_text" placeholder="最低薪资"<?php if (!$_smarty_tpl->tpl_vars['row']->value['minsalary']&&!$_smarty_tpl->tpl_vars['row']->value['maxsalary']&&$_smarty_tpl->tpl_vars['row']->value['id']) {?> disabled="disabled"<?php }?>>
                                <span class="job_xz_dw">元/月</span>
                            </div>
                            <span class="job_xz_text_line">- </span>
                            <div class="job_xz_text_box">
                                <input type="text" size="5" id="maxsalary" name="maxsalary" <?php if ($_smarty_tpl->tpl_vars['row']->value['maxsalary']) {?>value="<?php echo $_smarty_tpl->tpl_vars['row']->value['maxsalary'];?>
"<?php }?> onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"  class="job_xz_text" placeholder="最高薪资"<?php if (!$_smarty_tpl->tpl_vars['row']->value['minsalary']&&!$_smarty_tpl->tpl_vars['row']->value['maxsalary']&&$_smarty_tpl->tpl_vars['row']->value['id']) {?> disabled="disabled"<?php }?>>
                                <span class="job_xz_dw">元/月</span>
                            </div>
                            <span class="job_xz_text_line" style="margin-left:10px;color:#666;line-height:40px;"><label><input style="margin-right:5px;" type="checkbox" id="salary_type" name="salary_type" value="1" onclick="change_salary_type()"<?php if (!$_smarty_tpl->tpl_vars['row']->value['minsalary']&&!$_smarty_tpl->tpl_vars['row']->value['maxsalary']&&$_smarty_tpl->tpl_vars['row']->value['id']) {?> checked="checked"<?php }?> />面议</label></span>
                    </li>
                    <li>
                        <div class=tit> <font color="#FF0000">*</font>发放月数：</div>
                        <div class=textbox>
                            <INPUT type="text" size="45" name="ejob_salary_month" id='ejob_salary_month' <?php if ($_smarty_tpl->tpl_vars['row']->value['ejob_salary_month']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ejob_salary_month'];?>
"<?php } else { ?> value="12"<?php }?> style="float:left" class="com_info_text">
                            <span id="by_name" class="errordisplay">月数不能为空</span> </div>
                    </li>
                    <li>
                        <div class=tit><font color="#FF0000">*</font> 职位描述：</div>
                        <div class=textbox style="width:513px;">

                            <div class="Description" style="display:none;">
                                <div class="Description_icon">
                                    <i class="Description_icon_i"></i>
                                    <div class="Description_box" style="display:none;">
                                        <i class="Description_icon_i_j"></i>
                                        点击职位链接，为你推荐的职位要求模板复制到编辑区域内！<br>您也可以编辑，直至完美！
                                    </div>
                                </div>
                                <div class="Description_box_mb">模板：<span id="JobRequInfoTemplate"></span></div>
                            </div>
                            <div class="clear"></div>
                            <textarea name="description" id="description" style="height:180px; width:200px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</textarea>
                            <span id="by_description" class="errordisplay">不能为空</span></div>
                    </li>
                    <li>
                        <div class=tit> 汇报对象：</div>
                        <div class=textbox>
                            <INPUT type="text" size="45" name="detail_report" id='detail_report'value="<?php echo $_smarty_tpl->tpl_vars['row']->value['detail_report'];?>
" style="float:left" class="com_info_text">
                            <span id="by_name" class="errordisplay"></span> </div>
                    </li>
                    <li>
                        <div class=tit> 下属人数：</div>
                        <div class=textbox>
                            <INPUT type="text" size="45" name="detail_subordinate" id='detail_subordinate'value="<?php echo $_smarty_tpl->tpl_vars['row']->value['detail_subordinate'];?>
" style="float:left" class="com_info_text">
                            <span id="by_name" class="errordisplay"></span> </div>
                    </li>
                    <div class="admin_tit"> <span class="admin_tit_bg">对候选人有什么需求</span><i class="com_admin_ask"></i><span class="remind" style="float:right">以下为选填项</span> </div>
                    <li>
                        <div class=tit>  从事行业：</div>
                        <div class=textbox>
                            <div class="text_seclet text_seclet_cur" style="z-index:400">

                                <input class="SpFormLBut text_seclet_w250 " type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['hy']) {?> value="<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['row']->value['hy']];?>
"<?php } else { ?> value="请选择行业" <?php }?> id="hy" onclick="search_show('job_hy');">
                                <input type="hidden" id="hyid" name="hy"  <?php if ($_smarty_tpl->tpl_vars['row']->value['hy']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['hy'];?>
"<?php }?>/>
                                <div id="job_hy" class="cus-sel-opt-panel" style="display:none; z-index:301">
                                    <div style="width:100%;  overflow:auto; overflow-x:hidden">
                                        <ul>
                                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                            <li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','hy','<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="job_add_bc">
                        <div class=tit>招聘人数：</div>
                        <div class="textbox textbox2">
                            <div class="text_seclet text_seclet_cur0">
                                <input id="number" name="number" class="SpFormLBut text_seclet_w158" type="text"  style="background: none;cursor: auto;"   value="<?php echo $_smarty_tpl->tpl_vars['row']->value['number'];?>
" />
                                <!--<input id="numberid" type="hidden" name="number" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['number'];?>
">-->
                                <div id="job_number" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display: none;">
                                    <ul class="Search_Condition_box_list">
                                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                        <li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','number','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="job_add_bc">
                        <div class=tit>工作经验：</div>
                        <div class="textbox textbox2">
                            <div class="text_seclet text_seclet_cur">
                                <input id="exp" class="SpFormLBut text_seclet_w158" type="button" onclick="search_show('job_exp');" <?php if ($_smarty_tpl->tpl_vars['row']->value['exp']) {?> value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['exp']];?>
" <?php } else { ?> value="请选择工作经验" <?php }?>>
                                <input id="expid" type="hidden" name="exp" <?php if ($_smarty_tpl->tpl_vars['row']->value['exp']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['exp'];?>
"<?php }?>>
                                <div id="job_exp" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display: none;">
                                    <ul class="Search_Condition_box_list">
                                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_exp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                        <li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','exp','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="job_add_bc">
                        <div class=tit>到岗时间：</div>
                        <div class="textbox textbox2">
                            <div class="text_seclet text_seclet_cur2">
                                <input  class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['report']) {?> value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['report']];?>
"<?php } else { ?> value="请选择到岗时间" <?php }?>  id="report" onclick="search_show('job_report');">
                                <input type="hidden" id="reportid" name="report" <?php if ($_smarty_tpl->tpl_vars['row']->value['report']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['report'];?>
"<?php }?> />
                                <div id="job_report" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display: none;">
                                    <ul class="Search_Condition_box_list">
                                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                        <li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','report','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="job_add_bc">
                        <div class=tit>年龄要求：</div>
                        <div class="textbox textbox2">
                            <div class="text_seclet text_seclet_cur2">
                                <input class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['age']) {?> value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['age']];?>
"<?php } else { ?> value="请选择年龄要求" <?php }?>  id="age" onclick="search_show('job_age');">
                                <input type="hidden" id="ageid" name="age" <?php if ($_smarty_tpl->tpl_vars['row']->value['age']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['age'];?>
"<?php }?> />
                                <div id="job_age" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display: none;">
                                    <ul class="Search_Condition_box_list">
                                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_age']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                        <li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','age','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="job_add_bc">
                        <div class=tit>性别要求：</div>
                        <div class="textbox textbox2">
                            <div class="text_seclet text_seclet_cur3">
                                <input type="button" value="<?php if ($_smarty_tpl->tpl_vars['arr_data']->value['sex'][$_smarty_tpl->tpl_vars['row']->value['sex']]) {
echo $_smarty_tpl->tpl_vars['arr_data']->value['sex'][$_smarty_tpl->tpl_vars['row']->value['sex']];
} else { ?>不限<?php }?>" class="SpFormLBut text_seclet_w158" id="sex" onClick="search_show('job_sex');">
                                <input name="sex" type="hidden" id="sexid" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['sex']) {
echo $_smarty_tpl->tpl_vars['row']->value['sex'];
} else { ?>3<?php }?>">
                                <div id="job_sex" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display: none;">
                                    <ul class="Search_Condition_box_list">
                                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr_data']->value['sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                        <li><a href="javascript:;" onClick="selects('<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
','sex','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="job_add_bc">
                        <div class=tit>教育程度：</div>
                        <div class="textbox textbox2">
                            <div class="text_seclet text_seclet_cur3">
                                <input class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['edu']) {?> value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['edu']];?>
"<?php } else { ?> value="请选择教育程度" <?php }?>  id="edu" onclick="search_show('job_edu');">
                                <input type="hidden" id="eduid" name="edu" <?php if ($_smarty_tpl->tpl_vars['row']->value['edu']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['edu'];?>
"<?php }?> />
                                <div id="job_edu" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display: none;">
                                    <ul class="Search_Condition_box_list">
                                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                        <li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','edu','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="job_add_bc">
                        <div class=tit>婚姻状况：</div>
                        <div class="textbox textbox2">
                            <div class="text_seclet text_seclet_cur4">
                                <input class="SpFormLBut text_seclet_w158" type="button" <?php if ($_smarty_tpl->tpl_vars['row']->value['marriage']) {?> value="<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['marriage']];?>
" <?php } else { ?> value="请选择婚姻状况" <?php }?>  id="marriage" onclick="search_show('job_marriage');">
                                <input type="hidden" id="marriageid" name="marriage" <?php if ($_smarty_tpl->tpl_vars['row']->value['marriage']) {?> value="<?php echo $_smarty_tpl->tpl_vars['row']->value['marriage'];?>
"<?php }?> />
                                <div id="job_marriage" class="cus-sel-opt-panel cus-sel-opt-panel-w156" style="display: none;">
                                    <ul class="Search_Condition_box_list">
                                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_marriage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                        <li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','marriage','<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="tit">语言要求：</div>
                        <div class="textbox_ag" >
                            <div class="toggle" onclick="zhankaiShouqi(this);"><?php if (count($_smarty_tpl->tpl_vars['comdata']->value['job_lang'])>5) {
if (!$_smarty_tpl->tpl_vars['row']->value['id']) {?>更多<?php } else { ?>收起<?php }
}?></div>
                            <div class="textbox_wd">
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_lang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                <div id="input" class="job_add_y_list" style="margin-top:0px; <?php if ($_smarty_tpl->tpl_vars['j']->value>4&&!$_smarty_tpl->tpl_vars['row']->value['id']) {?>display:none<?php }?>">
                                    <span class="job_add_list_li  <?php if ($_smarty_tpl->tpl_vars['row']->value['lang']&&in_array($_smarty_tpl->tpl_vars['v']->value,$_smarty_tpl->tpl_vars['row']->value['lang'])) {?> job_add_list_li_cur<?php }?>" onclick="choice(<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
,'lang');" id="joblang<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><a><label for="welfare<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><label for="lang<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</label></a></span>
                                    <input type="hidden" name="lang<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" id="lang<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['lang']&&in_array($_smarty_tpl->tpl_vars['v']->value,$_smarty_tpl->tpl_vars['row']->value['lang'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"<?php }?>>
                                </div>
                                <?php } ?>
                                <!--<input type="text" class="com_info_text" placeholder="自定义语言要求">-->
                            </div>
                        </div>
                    </li>
                    <li class="jobadd_list_fl">
                        <div class="tit">福利待遇：</div>
                        <div class=" textbox_ag"><div class="toggle" onclick="zhankaiShouqi(this);"><?php if (count($_smarty_tpl->tpl_vars['comdata']->value['job_welfare'])>5) {
if (!$_smarty_tpl->tpl_vars['row']->value['id']) {?>更多<?php } else { ?>收起<?php }
}?></div>
                            <div class="textbox_wd">
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_welfare']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                <div class="job_add_y_list" style="margin-top:0px; <?php if ($_smarty_tpl->tpl_vars['j']->value>4&&!$_smarty_tpl->tpl_vars['row']->value['id']) {?>display:none<?php }?>">
                                    <span class="job_add_list_li <?php if ($_smarty_tpl->tpl_vars['row']->value['welfare']&&in_array($_smarty_tpl->tpl_vars['v']->value,$_smarty_tpl->tpl_vars['row']->value['welfare'])) {?> job_add_list_li_cur<?php }?>" onclick="choice(<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
,'welfare');" id="jobwelfare<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><a><label for="welfare<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</label></a></span>
                                    <input type="hidden" name="welfare<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" id="welfare<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['welfare']&&in_array($_smarty_tpl->tpl_vars['v']->value,$_smarty_tpl->tpl_vars['row']->value['welfare'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"<?php }?>>
                                </div>
                                <?php } ?> </div></div>
                    </li>
                    </ul>
            </div>

                <div class="admin_tit "><span class="admin_tit_bg">联系方式</span></div>
                <div class="job_touch">
                    <input type="hidden" name="islink" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['islink']) {
echo $_smarty_tpl->tpl_vars['row']->value['islink'];
} else { ?>1<?php }?>" />
                    <div class="admin_job_js_w_list fl" style="margin-top:20px;">
                        <div class="admin_job_js_list_ft mt10 fl"><span style="width:100%;">联系方式：</span></div>
                        <div class="admin_job_js_list_rt fl">
                            <span class="admin_job_style <?php if ($_smarty_tpl->tpl_vars['row']->value['islink']==1||$_smarty_tpl->tpl_vars['row']->value['islink']=='') {?>admin_job_style_n<?php }?> fl" onclick="choice('1','link')" id="islink1">使用企业联系方式（<?php echo $_smarty_tpl->tpl_vars['company']->value['linkman'];?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['company']->value['linktel']) {
echo $_smarty_tpl->tpl_vars['company']->value['linktel'];
} else {
echo $_smarty_tpl->tpl_vars['company']->value['linkphone'];
}?>）</span>
                            <span class="admin_job_style <?php if ($_smarty_tpl->tpl_vars['row']->value['islink']==2) {?>admin_job_style_n<?php }?> fl" onclick="choice('2','link')" id="islink2">使用新联系方式</span>
                            <div id="newlink" <?php if ($_smarty_tpl->tpl_vars['row']->value['islink']!=2) {?> style="display:none;" <?php }?> >
                            <div class="job_touch_other mt10 fl">
                                <div class="job_touch_other_tit fl">使用新联系方式</div>
                                <input type="text" <?php if ($_smarty_tpl->tpl_vars['job_link']->value['link_man']&&$_smarty_tpl->tpl_vars['row']->value['islink']=='2') {?>value="<?php echo $_smarty_tpl->tpl_vars['job_link']->value['link_man'];?>
"<?php }?> placeholder="请输入联系人" id="link_man" name="link_man" class="payment_fp_touch_text payment_fp_touch_text_p">
                                <input type="text" <?php if ($_smarty_tpl->tpl_vars['job_link']->value['link_moblie']&&$_smarty_tpl->tpl_vars['row']->value['islink']=='2') {?>value="<?php echo $_smarty_tpl->tpl_vars['job_link']->value['link_moblie'];?>
"<?php }?>id="link_moblie" name="link_moblie" placeholder="请输入联系电话"onkeyup="this.value=this.value.replace(/[^0-9-]/g,'')" class="payment_fp_touch_text">
                                <input type="hidden" id="tblink" name="tblink" value="2">
                                <span class="jobadd_tel_tb"><i id="tbval" class="jobadd_tel_iconno"></i>同步到所有职位</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="admin_job_js_w_list fl">
                <div class="admin_job_js_list_ft fl"><span style="width:100%;">&nbsp;</span></div>
                <span class="admin_job_style <?php if ($_smarty_tpl->tpl_vars['row']->value['islink']==3) {?>admin_job_style_n<?php }?> fl" onclick="choice('3','link')" id="islink3">不向求职者展示联系方式（不想受到骚扰）</span>
            </div>

            <div class="admin_job_js_w_list fl" style="margin-top:20px;">
                <input type="hidden" name="isemail" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['isemail']) {
echo $_smarty_tpl->tpl_vars['row']->value['isemail'];
} else {
if ($_smarty_tpl->tpl_vars['company']->value['linkmail']) {?>1<?php } else { ?>0<?php }
}?>" />
                <div class="admin_job_js_list_ft mt10 fl"><span style="width:100%;">接收简历的邮箱：</span></div>
                <div class="admin_job_js_list_rt fl">
                    <?php if ($_smarty_tpl->tpl_vars['company']->value['linkmail']) {?><span class="admin_job_style <?php if ($_smarty_tpl->tpl_vars['row']->value['isemail']==1||!$_smarty_tpl->tpl_vars['row']->value['isemail']) {?>admin_job_style_n<?php }?> fl" onclick="choice('1','email')" id="isemail1">使用企业邮箱（<?php echo $_smarty_tpl->tpl_vars['company']->value['linkmail'];?>
）</span><?php }?>
                    <span class="admin_job_style <?php if ($_smarty_tpl->tpl_vars['row']->value['isemail']==2) {?>admin_job_style_n<?php }?> fl" onclick="choice('2','email')" id="isemail2">使用新邮箱</span>

                    <div class="" id="newemail" style="padding:10px 10px 10px 0px;<?php if ($_smarty_tpl->tpl_vars['row']->value['isemail']!=2) {?>display:none;<?php }?>">
                        <div class="admin_job_js_list_ft fl"><span style="width:100%;">&nbsp;</span></div>
                        <span class="admin_job_style admin_job_style_n fl" style="height:90px;">
                               <div class="admin_job_js_wr fl">使用新邮箱</div>
                               <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['job_link']->value['email'];?>
" placeholder="请填写新邮箱" class="payment_fp_touch_text" id="email" name="email">
                         </span>

                    </div></div>

                <div class="admin_job_js_w_list fl">
                    <div class="admin_job_js_list_ft fl"><span style="width:100%;">&nbsp;</span></div>
                    <span class="admin_job_style <?php if ($_smarty_tpl->tpl_vars['row']->value['isemail']==3) {?>admin_job_style_n<?php }?> fl" onclick="choice('3','email')" id="isemail3">不需要将收到的简历发送到邮箱</span>

                </div>
            </div>


            <div class="clear"></div>
            <div class=admin_submit>
                <div class="admin_job_js_list_ft fl"><span style="width:100%;">&nbsp;</span></div>
                <div class=sub_btn>
                    <input class="btn_01"  id="submitBtn"type="submit" name="submitBtn" value=" 提 交 操 作 ">
                    <input name="jobcopy" value="<?php echo $_GET['jobcopy'];?>
" type="hidden"/>
                    <?php if ($_GET['id']) {?>
                    <input id="id"name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" type="hidden"/>
                    <?php }?>
                    <input name="state" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['state'];?>
" type="hidden"/>
                    <input id="save"name="save" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" type="hidden"/>
                </div> <div class="clear"></div>
            </div>
            </form>

        </div>  </div>

</div>

</div>
</div>  <?php if (!$_smarty_tpl->tpl_vars['row']->value['linkmak']&&!$_smarty_tpl->tpl_vars['row']->value['content']) {?>
<div class="text_tips_bc">
    <div class="text_tips_bc_h1"> 保存临时信息</div>
    <div class="text_tips_bc_cont">
        <?php if ($_smarty_tpl->tpl_vars['save']->value['time']) {?>
        <div class="text_tips_bc_l">信息已于<?php echo $_smarty_tpl->tpl_vars['save']->value['time'];?>
保存</div>
        <?php }?>
        <div>
            <div class="text_tips_bc_r">
                <div class="text_tips_bc_time">   <span id="totalSecond"></span>s后将自动保存</br>已填信息</div>
                <a id="atime"href="javascript:;" onclick="savejobform();" class="text_tips_bc_bth">保存数据</a>
            </div>
        </div>
    </div>
</div>
<?php }?>

<input type='hidden' id='jobid' value=''>
<div class="job_tck_box" id="addjob" style="display:none;">
    <div class="job_box_div" style="width:440px;">
        <div class="jonadd_prompt_icon"></div>
        <div class="jonadd_prompt">
            <div class="jonadd_prompt_p"><span id="returnmsg" class="job_add_success">职位发布成功！</span></div>

            <a href="javascript:void(0)"  onclick="jobadd_url('<?php echo $_smarty_tpl->tpl_vars['addjobnum']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_job'];?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
');return false;" class="job_add_continue">继续发布职位</a>
        </div>

        <div class="jonadd_prompt_img" id="qrcodeimg">
            <img src='<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wx_qcode'];?>
'  width='80' height='80'>
            <div class="jonadd_prompt_img_p">微信公众号</div>
        </div>
    </div>

</div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/jobserver.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
