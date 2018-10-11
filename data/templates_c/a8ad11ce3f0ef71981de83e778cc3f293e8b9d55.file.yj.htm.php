<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 09:42:08
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/lietou/yj.htm" */ ?>
<?php /*%%SmartyHeaderCode:10786383275bbab5f0afc902-82451893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8ad11ce3f0ef71981de83e778cc3f293e8b9d55' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/lietou/yj.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10786383275bbab5f0afc902-82451893',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'now_url' => 0,
    'ordertype' => 0,
    'rows' => 0,
    'log' => 0,
    'config' => 0,
    'type' => 0,
    'arr_data' => 0,
    'state' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbab5f0bd56d9_16373613',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbab5f0bd56d9_16373613')) {function content_5bbab5f0bd56d9_16373613($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="w1000">
  <div class="admin_mainbody"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

   
    <div class=right_box>
    <div class=admincont_box>
    <div class="job_list_tit">
         <ul class="">
         <li <?php if ($_GET['c']=="paylog"&&$_GET['consume']=="ok") {?>class="job_list_tit_cur"<?php }?>><a href="index.php?c=paylog&consume=ok">财务明细</a></li>
         </ul>
         </div> 
 <div class="com_body">
    <div class=admin_textbox_04>
    <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
    <form action="<?php echo $_smarty_tpl->tpl_vars['now_url']->value;?>
" target="supportiframe" method="post" id='myform'>
      <div class=table> 
	  <?php if ($_smarty_tpl->tpl_vars['ordertype']->value) {?>
        <div id="job_checkbokid">
        <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
        <div class="job_news_list job_news_list_h1">
                <span class="job_news_list_span job_w150" style="padding-left:10px;">流水单号</span>
                 <span class="job_news_list_span job_w150">职位名称</span>
                  <span class="job_news_list_span job_w150">企业名称</span>
                  <span class="job_news_list_span job_w100">候选人</span>
                     <span class="job_news_list_span job_w100"> 业绩</span>
                  <span class="job_news_list_span job_w150" style=" text-align:center">时间</span>
              </div>
              <?php }?>
          <?php  $_smarty_tpl->tpl_vars['log'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['log']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['log']->key => $_smarty_tpl->tpl_vars['log']->value) {
$_smarty_tpl->tpl_vars['log']->_loop = true;
?>
          <?php $_smarty_tpl->tpl_vars["state"] = new Smarty_variable($_smarty_tpl->tpl_vars['log']->value['pay_state'], null, 0);?>
          <div class="job_news_list">
           <span class="job_news_list_span job_w100" style="padding-left:10px;"><?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
</span>
            <span class="job_news_list_span job_w150" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['log']->value['jobname'];?>
</span>
             <span class="job_news_list_span job_w150" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['log']->value['companyname'];?>
</span>
             <span class="job_news_list_span job_w150" style="text-align:right"><?php echo $_smarty_tpl->tpl_vars['log']->value['uname'];?>
&nbsp;</span>
             <span class="job_news_list_span job_w100" style="text-align:center">50</span>
             <span class="job_news_list_span job_w100" style="text-align:right"><?php echo date("Y-m-d",$_smarty_tpl->tpl_vars['log']->value['datetime']);?>
</span>
          </div>
          <?php }
if (!$_smarty_tpl->tpl_vars['log']->_loop) {
?> 
		   <div class="msg_no">您还没有记录。</div>
          <?php } ?> 
       
        </div>
        <?php } else { ?>
        
        <div id="job_checkbokid">
        <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
               <div class="job_news_list job_news_list_h1">
                <span class="job_news_list_span job_w150" style="padding-left:10px;" >充值单号</span>
                 <span class="job_news_list_span job_w100">支付类型</span>
                 <span class="job_news_list_span job_w100">支付形式</span>
                  <span class="job_news_list_span job_w100">充值金额</span>
                  <span class="job_news_list_span job_w100">支付状态</span>
                     <span class="job_news_list_span job_w150" style=" text-align:center"> 时间</span>
                  <span class="job_news_list_span job_w140">操作</span>
              </div>
              <?php }?>
          <?php  $_smarty_tpl->tpl_vars['log'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['log']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['log']->key => $_smarty_tpl->tpl_vars['log']->value) {
$_smarty_tpl->tpl_vars['log']->_loop = true;
?>
          <?php $_smarty_tpl->tpl_vars["state"] = new Smarty_variable($_smarty_tpl->tpl_vars['log']->value['order_state'], null, 0);?>
          <?php $_smarty_tpl->tpl_vars["type"] = new Smarty_variable($_smarty_tpl->tpl_vars['log']->value['order_type'], null, 0);?>
          <div class="job_news_list">
            <span class="job_news_list_span  job_w150" style="padding-left:10px;"><?php echo $_smarty_tpl->tpl_vars['log']->value['order_id'];?>
</span>
              <span class="job_news_list_span job_w100">
              	<?php if ($_smarty_tpl->tpl_vars['log']->value['type']==1) {?>购买会员
              	<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='2') {
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
充值
              	<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='3') {?>银行转帐
              	<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='4') {?>金额充值
              	<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='5') {?>购买增值包
              	<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='10') {?>购买职位置顶
            	<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='11') {?>购买紧急招聘
            	<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='12') {?>购买职位推荐
            	<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['type']=='13') {?>购买职位自动刷新
              	<?php }?>&nbsp;</span>
            <span class="job_news_list_span job_w100"><?php if ($_smarty_tpl->tpl_vars['type']->value) {
echo $_smarty_tpl->tpl_vars['arr_data']->value['pay'][$_smarty_tpl->tpl_vars['type']->value];
} else { ?>手动<?php }?></span>
            <span class="job_news_list_span job_w100"><?php echo $_smarty_tpl->tpl_vars['log']->value['order_price'];?>
</span>
          <span class="job_news_list_span job_w100"><?php echo $_smarty_tpl->tpl_vars['arr_data']->value['paystate'][$_smarty_tpl->tpl_vars['state']->value];?>
</span>
           <span class="job_news_list_span job_w150" style="text-align:center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['log']->value['order_time'],'%Y-%m-%d %H:%M:%S');?>
</span>
          <span class="job_news_list_span job_w140" style="text-align:center">
			<?php if ($_smarty_tpl->tpl_vars['log']->value['order_type']=='bank'&&$_smarty_tpl->tpl_vars['log']->value['order_state']!='2') {?> 
            <a href="javascript:;" id="<?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
" class="status" remark="<?php echo $_smarty_tpl->tpl_vars['log']->value['order_remark'];?>
">备注修改</a>| 
            <?php }?> 
              <?php if ($_smarty_tpl->tpl_vars['log']->value['order_state']=='1'&&$_smarty_tpl->tpl_vars['log']->value['order_type']!='bank') {?> <a href="index.php?c=payment&id=<?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
"  class="cblue">去付款</a> |
              <a href="javascript:void(0)" onclick="del_pay(<?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
)" class="cblue">取消充值</a> <?php } else { ?>
              <?php echo $_smarty_tpl->tpl_vars['arr_data']->value['paystate'][$_smarty_tpl->tpl_vars['state']->value];?>

              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['log']->value['invoice']=='1'&&$_smarty_tpl->tpl_vars['log']->value['order_state']=='2') {?> |
				 
				<?php if ($_smarty_tpl->tpl_vars['log']->value['status']=='') {?>
				<a href="javascript:;" order_id="<?php echo $_smarty_tpl->tpl_vars['log']->value['order_id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
" class="invoice">申请发票</a>
				<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['status']=='0'||$_smarty_tpl->tpl_vars['log']->value['status']=='') {?>
					<a href="javascript:;" order_id="<?php echo $_smarty_tpl->tpl_vars['log']->value['order_id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
" class="invoice">修改发票</a>
				<?php } elseif ($_smarty_tpl->tpl_vars['log']->value['status']>='1') {?>
				已审核
				<?php }?>
			<?php }?>
			 </span>
            <?php if ($_smarty_tpl->tpl_vars['log']->value['order_remark']) {?> <div class="job_news_list_bot"><?php echo $_smarty_tpl->tpl_vars['log']->value['order_remark'];?>
</div><?php }?>
          </div>
          <?php }
if (!$_smarty_tpl->tpl_vars['log']->_loop) {
?> 
		  <div class="msg_no">您还没有充值记录。</div>
          <?php } ?>

        </div>
        <?php }?> </div>
 
      <div>
        <div style="clear:both"></div>
        <div class="diggg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
      </div>  
    </form>
    <div class="clear"></div>
    
	
    
  </div>
</div>
</div>
</div>
</div>  
</div>  
<div class="infoboxp22" id="invoice_div" style="display:none; ">
      <div>
        <form action="index.php?c=paylog&act=saveinvoice" method="post"  target="supportiframe" onsubmit="return paylog_invoice();">
          <div class="jb_infobox" style="width: 100%;"> 
			<table class="pay_log_qx">
				<tr>
					<td align="right" style="width:80px;">发票抬头：</td>
					<td><input name="title" id="title" type='text' class="pay_log_text"></td>
				</tr>
				<tr>
					<td align="right">联系人：</td>
					<td><input name="link_man" id="link_man" type='text' class="pay_log_text"></td>
				</tr>
				<tr>
					<td align="right">联系电话：</td>
					<td><input name="link_moblie" id="link_moblie" type='text' class="pay_log_text"></td>
				</tr>
				<tr>
					<td align="right">邮寄地址：</td>
					<td><input name="address" id="address" type='text' class="pay_log_text"></td>
				</tr>
                <tr>
					<td align="right">&nbsp;</td>
					<td><input name='rid' type='hidden' id='rid'/>
			<input name='oid' type='hidden' id='oid'/>
            <input name='order_id' type='hidden' id='order_id'/>
            <button type="submit" name='submit' value='1' class="submit_btn">确认</button>
            &nbsp;&nbsp;
            <button type="button" class="cancel_btn">取消</button></td>
				</tr>
			</table>
          </div>
      
        </form>
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
            <button type="button"   class="cancel_btn">取消</button>
          </div>
        </form>
      </div>
    </div>
 <?php echo '<script'; ?>
> 
$(document).ready(function(){ 
	$('.cancel_btn').click(function(){
		layer.closeAll();
	});
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
	$(".invoice").click(function(){
		var order_id=$(this).attr("order_id");
		var oid=$(this).attr("id");
		if(order_id){
			$("#order_id").val(order_id);
			$("#oid").val(oid);
			$.post("index.php?c=paylog&act=invoice",{order_id:order_id},function(data){
				var data=eval('('+data+')'); 
				$("#rid").val(data.id);
				$("#title").val(data.title);
				$("#link_man").val(data.link_man);
				$("#link_moblie").val(data.link_moblie);
				$("#address").val(data.address); 
				$.layer({
					type : 1,
					title :'申请发票', 
					closeBtn : [0 , true],
					border : [10 , 0.3 , '#000', true],
					area : ['330px','230px'],
					page : {dom :"#invoice_div"}
				});	
			});
		} 
	});
});

<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
