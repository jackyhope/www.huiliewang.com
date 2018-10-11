<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-27 10:44:40
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/com.htm" */ ?>
<?php /*%%SmartyHeaderCode:7295577605bac44187599b4-67957667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44cd7ca8024cc11a41afa2db35ab04f3f049282a' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/com.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7295577605bac44187599b4-67957667',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'statis' => 0,
    'integral' => 0,
    'rows' => 0,
    'log' => 0,
    'state' => 0,
    'arr_data' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bac4418802834_42528324',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bac4418802834_42528324')) {function content_5bac4418802834_42528324($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
>

$(document).ready(function(){ 
	$(".status").click(function(){
		$("#paylog_id").val($(this).attr("id"));
		$("#alertcontent").val($(this).attr("remark"));
		$.layer({
			type : 1,
			title :'备注', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['320px','200px'],
			page : {dom :"#infobox"}
		});
	});
});
<?php echo '</script'; ?>
>
<div id="use_card"  style="display:none; width: 400px;">
  <div class="job_box_div" style="width:340px;">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php?c=com&act=card" target="supportiframe" method="post" id='myform'>
      <div class="job_box_inp" style="padding:10px 5px 5px 20px">
       <span class="fltL"> 卡号：</span>
        <input name="card" class="com_info_text placeholder" type="text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/>
         </div>
      <div class="job_box_inp" style="padding:10px 5px 5px 20px">
       <span class="fltL"> 密码：</span>
        <input name="password" class="com_info_text placeholder" type="password" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/>
         </div>
      <span class="job_box_botton" style="width:100%;"> 
      <a class="job_box_yes job_box_botton2" href="javascript:void(0);" onclick="setTimeout(function(){$('#myform').submit()},0);">确定</a> </span>
    </form>
  </div>
</div>
<div class="w1000">
  <div class="admin_mainbody"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class=right_box>
      <div class=admincont_box>
       <div class="job_list_tit">
         <ul class="">
     <li <?php if ($_GET['c']=="com") {?>class="job_list_tit_cur"<?php }?>><a href="index.php?c=com">订单管理</a></li>
         <li <?php if ($_GET['c']=="paylog"&&$_GET['consume']=="ok") {?>class="job_list_tit_cur"<?php }?>><a href="index.php?c=paylog&consume=ok">财务明细</a></li>
       <li <?php if ($_GET['c']=="paylog"&&$_GET['consume']!="ok") {?>  class="job_list_tit_cur"<?php }?> ><a href="index.php?c=paylog">充值记录</a></li> 
         </ul>
         </div>
        <div class="clear"></div>
          <div class="com_body">
        <div class="Available_Balance">
        <div class="Available_h1">可用<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</div>
        <div class="Available_bal"><span class="Available_blod"><?php echo $_smarty_tpl->tpl_vars['statis']->value['integral'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];?>
 
        <a class="Available_bth"  href="index.php?c=pay&type=integral" title="账户充值">充值</a>
        <!--<a href="index.php?c=right" title="查看特权"  class="Available_bth Available_bth_c"> 查看特权</a> -->
        </div>
        <div class="Available_Balance_bot"> 
         消费<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
：<span class="Available_je"><?php echo $_smarty_tpl->tpl_vars['integral']->value;?>
</span> <?php echo $_smarty_tpl->tpl_vars['config']->value['integral_priceunit'];?>
 　　  
		 </div>  
        </div>
        <div class="clear"></div>
        <div class="com_job_box">
        <div class="index_Management_box_h1"><span class="index_Management_box_h1_span">最新订单记录</span></div>
      <div class="com_job_box_p">
      <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
          <div class="job_news_list job_news_list_h1">
                <span class="job_news_list_span job_w160" style="width:230px;padding-left:10px;">充值单号</span>
                 <span class="job_news_list_span job_w150" style="text-align:center">充值时间</span>
                  <span class="job_news_list_span job_w100">充值金额</span>
                  <span class="job_news_list_span job_w120">支付类型</span>
                  <span class="job_news_list_span job_w100">状态</span>
                  <span class="job_news_list_span job_w120">操作</span>
              </div>
          <?php  $_smarty_tpl->tpl_vars['log'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['log']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['log']->key => $_smarty_tpl->tpl_vars['log']->value) {
$_smarty_tpl->tpl_vars['log']->_loop = true;
?>    
          <?php $_smarty_tpl->tpl_vars["state"] = new Smarty_variable($_smarty_tpl->tpl_vars['log']->value['order_state'], null, 0);?>      
          <div class="job_news_list">
            <span class="job_news_list_span job_w160" style="width:230px;padding-left:10px;"><?php echo $_smarty_tpl->tpl_vars['log']->value['order_id'];?>
</span>
            <span class="job_news_list_span job_w150" style="text-align:center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['log']->value['order_time'],'%Y-%m-%d %H:%M:%S');?>
</span>
            <span class="job_news_list_span job_w100"><?php echo $_smarty_tpl->tpl_vars['log']->value['order_price'];?>
</span>
            <span class="job_news_list_span job_w120"><?php if ($_smarty_tpl->tpl_vars['log']->value['type']==1) {?>购买会员<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='2') {
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
充值<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='3') {?>银行转帐<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='4') {?>金额充值<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='5') {?>购买增值包<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='10') {?>置顶服务<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='11') {?>紧急招聘<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='12') {?>职位推荐<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='13') {?>自动刷新<?php }?>&nbsp;</span>
            <span class="job_news_list_span job_w100"><?php echo $_smarty_tpl->tpl_vars['arr_data']->value['paystate'][$_smarty_tpl->tpl_vars['state']->value];?>
</span>
            <span class="job_news_list_span job_w120"><?php if ($_smarty_tpl->tpl_vars['log']->value['order_type']=='bank'&&$_smarty_tpl->tpl_vars['log']->value['order_state']!='2') {?> 
            <a href="javascript:;" id="<?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
" class="status" remark="<?php echo $_smarty_tpl->tpl_vars['log']->value['order_remark'];?>
">备注修改</a>
            <?php }?> 
              <?php if ($_smarty_tpl->tpl_vars['log']->value['order_state']=='1'&&$_smarty_tpl->tpl_vars['log']->value['order_type']!='bank') {?> <a href="index.php?c=payment&id=<?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
" >去付款</a> |
              <a href="javascript:void(0)" onclick="del_pay(<?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
)">取消充值</a> <?php } else { ?>
              <?php echo $_smarty_tpl->tpl_vars['arr_data']->value['paystate'][$_smarty_tpl->tpl_vars['state']->value];?>

              <?php }?>
				<?php if ($_smarty_tpl->tpl_vars['log']->value['invoice']=='1'&&$_smarty_tpl->tpl_vars['log']->value['order_state']=='2') {?><br/><a href="javascript:;" id="<?php echo $_smarty_tpl->tpl_vars['log']->value['order_id'];?>
" class="invoice"><?php if ($_smarty_tpl->tpl_vars['log']->value['is_invoice']=='1') {?>修改发票<?php } else { ?>申请发票<?php }?></a><?php }?>
			  </span>
           <?php if ($_smarty_tpl->tpl_vars['log']->value['order_remark']) {?> <div class="job_news_list_bot">备注：<?php echo $_smarty_tpl->tpl_vars['log']->value['order_remark'];?>
</div><?php }?>
          </div>
          <?php } ?>
          <?php } else { ?>
          <div class="msg_no">
          您还没有订单记录。
          </div>
          <?php }?>
        </div>
        </div>
      </div>
      <div class="clear"></div>
          <div class="diggg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
    </div>
  </div> 
</div>
</div>
	<div class="infoboxp22" id="infobox" style="display:none; ">
      <div>
        <form action="index.php?c=paylog" method="post" id="formstatus" target="supportiframe" onsubmit="return paylog_remark();">
          <div class="jb_infobox" style="width: 100%;">
            <input name="id" id='paylog_id' type="hidden"> 
			 <textarea id="alertcontent" style="width:310px;margin:5px;height:100px" name="order_remark" cols="30" rows="9" class="hr_textarea"></textarea>
          </div>
          <div class="jb_infobox" style="width: 100%;">
            <button type="submit" name='submit' value='1' class="submit_btn" style="margin-left:80px;">确认</button>
            &nbsp;&nbsp;
            <button type="button" class="cancel_btn" onclick="layer.closeAll();">取消</button>
          </div>
        </form>
      </div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
