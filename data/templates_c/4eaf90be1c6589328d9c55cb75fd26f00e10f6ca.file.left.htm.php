<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 09:42:08
         compiled from "/home/wwwroot/www.huiliewang.com//app/template/member/lietou/left.htm" */ ?>
<?php /*%%SmartyHeaderCode:826015345bbab5f0c6fbf0-39877093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4eaf90be1c6589328d9c55cb75fd26f00e10f6ca' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com//app/template/member/lietou/left.htm',
      1 => 1518053510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '826015345bbab5f0c6fbf0-39877093',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'js_def' => 0,
    'config' => 0,
    'input_num' => 0,
    'all_num' => 0,
    'fav_num' => 0,
    'recommend_num' => 0,
    'down_num' => 0,
    'apply_num' => 0,
    'total_num' => 0,
    'job_num' => 0,
    'joboff_num' => 0,
    'all_total' => 0,
    'in_total' => 0,
    'suc_total' => 0,
    'fal_total' => 0,
    'guweninfo' => 0,
    'style' => 0,
    'atn' => 0,
    'report' => 0,
    'kfqq' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbab5f0db5384_06311293',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbab5f0db5384_06311293')) {function content_5bbab5f0db5384_06311293($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['js_def']->value==5||$_smarty_tpl->tpl_vars['js_def']->value==3||$_smarty_tpl->tpl_vars['js_def']->value==2) {?>
<div class="top_box">

    <?php if ($_smarty_tpl->tpl_vars['js_def']->value==5) {?>
    <ul class="right_nav_ul">
        <?php if ($_smarty_tpl->tpl_vars['config']->value['com_search']==1) {?>
        <li <?php if ($_GET['act']=="myself") {?> class="style01 left_nav_hover"<?php } else { ?>class="style06"<?php }?>><span><a href="index.php?c=resume&act=myself" title="���ϴ��ļ���">���ϴ��ļ���<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['input_num']->value;?>
</span></a></span> </li>
        <!--<li <?php if (($_GET['act']=="index"||$_GET['act']=='')&&$_GET['c']=="resume") {?> class="style01 left_nav_hover"<?php } else { ?>class="style06"<?php }?>><span><a href="index.php?c=resume&act=index" title="ƽ̨������">ƽ̨������<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['all_num']->value;?>
</span></a></span></li><?php }?>-->
        <li <?php if ($_GET['act']=="resumefav") {?> class="style01 left_nav_hover"<?php } else { ?>class="style01"<?php }?>><span><a href="index.php?c=resume&act=resumefav" title="�ղصļ���">�ղصļ���<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['fav_num']->value;?>
</span></a></span> </li>
        <li <?php if ($_GET['act']=="recommend") {?> class="style01 left_nav_hover"<?php } else { ?>class="style06"<?php }?>><span><a href="index.php?c=resume&act=recommend" title="���Ƽ��ļ���">���Ƽ��ļ���<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['recommend_num']->value;?>
</span></a></span> </li>
        <li <?php if ($_GET['act']=="down") {?> class="style01 left_nav_hover"<?php } else { ?>class="style06"<?php }?>><span><a href="index.php?c=resume&act=down" title="�����صļ���">�����صļ���<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['down_num']->value;?>
</span></a></span> </li>
        <li <?php if ($_GET['c']=="apply") {?> class="style01 left_nav_hover"<?php } else { ?>class="style06"<?php }?>><span><a href="index.php?c=apply" title="ӦƸ���ļ���">ӦƸ���ļ���<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['apply_num']->value;?>
</span></a></span> </li>
    </ul>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['js_def']->value==3) {?>
    <ul class="right_nav_ul">
        <!--<li <?php if ($_GET['act']==null) {?> class="style01 left_nav_hover"<?php }?>><span><a href="index.php?c=job&w=1" title="�����е�ְλ">ƽְ̨λ��<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['total_num']->value;?>
</span></a></span></li>-->
        <!--<li <?php if ($_GET['act']=="fav_job") {?> class="left_nav_hover"<?php }?>><span><a href="index.php?c=job&act=fav_job" title="�ղص�ְλ">��ע��ְλ<span class="num_style guanzhunum"><?php echo $_smarty_tpl->tpl_vars['fav_num']->value;?>
</span></a></span></li>-->
        <!--<li <?php if ($_GET['act']=="serving_job") {?> class="left_nav_hover"<?php }?>><span><a href="index.php?c=job&act=serving_job" title="�ղص�ְλ">���Ƽ���ְλ<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['recommend_num']->value;?>
</span></a></span></li>-->
        <li <?php if ($_GET['act']=="mylist"&&$_GET['w']!=4) {?> class="left_nav_hover"<?php }?>><span><a href="index.php?c=job&act=mylist" title="�ҷ�����ְλ">�ҷ�����ְλ<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['job_num']->value;?>
</span></a></span></li>
        <li <?php if ($_GET['act']=="mylist"&&$_GET['w']==4) {?> class="left_nav_hover"<?php }?>><span><a href="index.php?c=job&act=mylist&w=4" title="�¼ܵ�ְλ">�¼ܵ�ְλ<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['joboff_num']->value;?>
</span></a></span></li>
        <li <?php if ($_GET['act']==null) {?> class="left_nav_hover"<?php }?>><span><a href="index.php?c=jobadd" title="������ְλ">������ְλ</a></span></li>
    </ul>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['js_def']->value==2) {?>
    <ul class="right_nav_ul">
        <li <?php if (empty($_GET['w'])) {?> class="style01 left_nav_hover"<?php }?>><span><a href="index.php?c=job" title="ƽְ̨λ��">ƽְ̨λ��<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['total_num']->value;?>
</span></a></span></li>
        <li <?php if ($_GET['w']==1) {?> class="left_nav_hover"<?php }?>><span><a href="index.php?c=job&w=1" title="��ע��ְλ">��ע��ְλ<span class="num_style guanzhunum"><?php echo $_smarty_tpl->tpl_vars['fav_num']->value;?>
</span></a></span></li>
        <li <?php if ($_GET['w']==2) {?> class="left_nav_hover"<?php }?>><span><a href="index.php?c=job&w=2" title="���Ƽ���ְλ">���Ƽ���ְλ<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['recommend_num']->value;?>
</span></a></span></li>
        <!--<li <?php if ($_GET['act']==null) {?> class="style01 left_nav_hover"<?php }?>><span><a href="index.php?c=progress&w=1" title="ȫ��">ȫ��<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['all_total']->value;?>
</span></a></span></li>-->
        <!--<li <?php if ($_GET['act']=="progress_ing") {?> class="left_nav_hover"<?php }?>><span><a href="index.php?c=progress&act=progress_ing" title="�Ƽ���">�Ƽ���<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['in_total']->value;?>
</span></a></span></li>-->
        <!--<li <?php if ($_GET['act']=="progress_suc") {?> class="left_nav_hover"<?php }?>><span><a href="index.php?c=progress&act=progress_suc" title="�Ƽ��ɹ�">�Ƽ��ɹ�<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['suc_total']->value;?>
</span></a></span></li>-->
        <!--<li <?php if ($_GET['act']=="progress_fal") {?> class="left_nav_hover"<?php }?>><span><a href="index.php?c=progress&act=progress_fal" title="�Ƽ�ʧ��">�Ƽ�ʧ��<span class="num_style"><?php echo $_smarty_tpl->tpl_vars['fal_total']->value;?>
</span></a></span></li>-->
    </ul>
    <?php }?>
</div>

<?php } else { ?>
<div class="left_box">
    <?php if ($_smarty_tpl->tpl_vars['js_def']->value==4) {?>
    <div class="subnav_h1"><span>ҵ������</span>  </div>
    <ul class="left_nav_ul">
        <li <?php if ($_GET['c']=="pay") {?> class="style01 left_nav_hover"<?php } else { ?>class="style05"<?php }?>><span><a href="index.php?c=pay" title="������ֵ"><font color="#FF0000"><i class="com_left_icon com_left_icon_cz"></i>������ֵ</font></a></span></li>
        <!--<li <?php if ($_GET['c']=="paylogtc") {?> class="style01 left_nav_hover"<?php } else { ?>class="style08"<?php }?>><span><a href="index.php?c=paylogtc" title="�ҵĻ�Ա"><i class="com_left_icon com_left_icon_myhy"></i>�ҵĻ�Ա</a></span></li>-->
        <li <?php if ($_GET['c']=="yj") {?> class="style01 left_nav_hover"<?php } else { ?>class="style09"<?php }?>><span><a href="index.php?c=yj" title="ҵ����ϸ"><i class="com_left_icon com_left_icon_mx"></i>ҵ����ϸ</a></span></li>

        <li <?php if ($_GET['c']=="com"||$_GET['c']=="paylog") {?> class="style01 left_nav_hover"<?php } else { ?>class="style09"<?php }?>><span><a href="index.php?c=paylog&consume=ok" title="������ϸ"><i class="com_left_icon com_left_icon_mx"></i>������ϸ</a></span></li>


        <li <?php if ($_GET['c']=="integral"||$_GET['c']=="reward_list"||$_GET['c']=="integral_reduce") {?> class="style01 left_nav_hover"<?php } else { ?>class="style12"<?php }?>><span><a href="index.php?c=integral_reduce"><i class="com_left_icon com_left_icon_gl"></i><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
����</a></span></li>
        <!--<li <?php if ($_GET['c']=="com"||$_GET['c']=="paylog") {?> class="style01 left_nav_hover"<?php } else { ?>class="style09"<?php }?>><span><a href="/member/index.php?c=paylog&consume=ok" title="������ϸ"><i class="com_left_icon com_left_icon_mx"></i>������ϸ</a></span></li>-->
        <!--<li <?php if ($_GET['c']=="integral"||$_GET['c']=="reward_list"||$_GET['c']=="integral_reduce") {?> class="style01 left_nav_hover"<?php } else { ?>class="style12"<?php }?>><span><a href="index.php?c=integral"><i class="com_left_icon com_left_icon_gl"></i><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
����</a></span></li>-->

    </ul>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['js_def']->value==7) {?>
    <div class="subnav_h1"><span>�˺�����</span>  </div>
    <ul class="left_nav_ul">
        <li <?php if ($_GET['c']=="info") {?> class="style01 left_nav_hover"<?php } else { ?>class="style01"<?php }?>><span><a href="index.php?c=info" title="������Ϣ"><i class="com_left_icon com_left_icon_info"></i>������Ϣ</a></span> </li>
        <li <?php if ($_GET['c']=="vs") {?> class="style01 left_nav_hover"<?php } else { ?>class="style03"<?php }?>><span><a href="index.php?c=vs" title="�޸�����"><i class="com_left_icon com_left_icon_m"></i>�޸�����</a></span> </li>
        <li <?php if ($_GET['c']=="sysnews") {?> class="style01 left_nav_hover"<?php } else { ?>class="style11"<?php }?>><span><a href="index.php?c=sysnews" title="ϵͳ��Ϣ"><i class="com_left_icon com_left_icon_xin"></i>ϵͳ��Ϣ</a></span> </li>
    </ul>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['guweninfo']->value['id']) {?>
    <div class="com_index_kf">
        <div class="com_m_index_h1"><span class="com_m_index_h1_s">��Ƹ����</span></div>
        <div class="com_index_kf_box">
            <div class="com_index_kf_box_user">
                <div class="com_index_kf_box_user_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/kefu.png" style="width:54px;height:64px;border-radius: inherit"></div>
                <div class="com_index_kf_box_username"><?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['username'];?>
</div>
                <div class="">
                    <?php if ($_smarty_tpl->tpl_vars['guweninfo']->value) {?>
                    <a target="_blank" href="tencent://message/?uin=<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['qq'];?>
&Site=<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
&Menu=yes"><img border="0" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/qqkefu.png" alt="���������ҷ���Ϣ"></a>
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
                <a href="javascript:void(0)" class="com_index_kf_dz_left">�ѵ���</a>
                <?php } else { ?>
                <a href="javascript:void(0)" onclick="zan('<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
');" class="com_index_kf_dz_left">����</a>
                <?php }?>

                <?php if (is_array($_smarty_tpl->tpl_vars['report']->value)&&!$_smarty_tpl->tpl_vars['report']->value['result']) {?>
                <a href="index.php?c=report&act=show"  class="com_index_kf_ts_left">��Ͷ��</a>
                <?php } else { ?>
                <a href="javascript:void(0)" onclick="reportgw('<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
','Ͷ�߹���');"  class="com_index_kf_ts_left">Ͷ��</a>
                <?php }?></div>
        </div>
    </div>

    <?php } else { ?>
    <div class="com_index_kf">
    <div class="com_m_index_h1"><span class="com_m_index_h1_s">��Ƹ����</span></div>
    <div class="com_index_kf_box">
    <div class="com_index_kf_box_user">
    <div class="com_index_kf_box_user_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/kefu.png" style="width:54px;height:64px;border-radius: inherit"></div>
    <div class="com_index_kf_box_username">��վ�ͷ�</div>
    <div class="">
    <?php if ($_smarty_tpl->tpl_vars['kfqq']->value) {?>
    <a target="_blank" href="tencent://message/?uin=<?php echo $_smarty_tpl->tpl_vars['kfqq']->value;?>
&Site=<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
&Menu=yes"><img border="0" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/qqkefu.png" alt="���������ҷ���Ϣ"></a>
    <?php }?>
    </div>
    </div>
    <div class="com_index_kf_p">�绰��<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</div>
    <div class="com_index_kf_p">�ֻ���<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webmoblie'];?>
</div>
    <div class="com_index_kf_p">Q  Q��<?php echo $_smarty_tpl->tpl_vars['kfqq']->value;?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['config']->value['wx_name']) {?><div class="com_index_kf_p">΢�Ź��ںţ�<?php echo $_smarty_tpl->tpl_vars['config']->value['wx_name'];?>
</div><?php }?>
    </div>
    </div>

    <?php }?>
</div>
<?php }?>
<!--Ͷ�߹��ʵ�����-->
<div id="<?php echo $_smarty_tpl->tpl_vars['guweninfo']->value['id'];?>
" style="display:none;">
    <div class="Binding_pop_box" style="padding:10px;width:330px;height:200px ;background:#fff;">
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
                //layer.msg('���޳ɹ���', 2, 9);
            }
        });
    }
<?php echo '</script'; ?>
><?php }} ?>
