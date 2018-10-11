<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-09 11:45:23
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/payment.htm" */ ?>
<?php /*%%SmartyHeaderCode:12360723855b42da53cba284-76105043%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdbe9904dcc1fe7ab11dd62d850d316cf635bbe5' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/payment.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12360723855b42da53cba284-76105043',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company' => 0,
    'config' => 0,
    'order' => 0,
    'rows' => 0,
    'blist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b42da53daacf7_60544788',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b42da53daacf7_60544788')) {function content_5b42da53daacf7_60544788($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<div class="w1000">
  <div class="admin_mainbody"> <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
    <?php echo '<script'; ?>
>
function paycheck(type){
	var type; 
	if(type=="bank"){
		document.getElementById('payform').action="index.php?c=payment&act=paybank";
		$(".alipaytype").hide();
		$(".paybank").show();
		$("#payform").attr("target","supportiframe");
	}else{
		if(type=="alipay"){
			$(".alipaytype").show();
			document.getElementById('payform').action="../api/alipay/alipayto.php";
		}else{
			$(".alipaytype").hide();
		}
		if(type=="alipaydual"){
			document.getElementById('payform').action="../api/alipaydual/alipayto.php";
		}
		if(type=="alipayescow"){
			document.getElementById('payform').action="../api/alipayescow/alipayto.php";
		}
		if(type=="tenpay"){
			document.getElementById('payform').action="../api/tenpay/index.php";
		}
		if(type=="wxpay"){
		
			document.getElementById('payform').action="";
			
		}
		$(".paybank").hide(); 
		$("#payform").attr("target","_blank");
	} 
	if(type=="99bill" || type=="paypal" || type=="cncard"){ 
		layer.msg('此接口暂未开放！', 2, 8);
		document.getElementById('py1').checked="checked";
	}
}
$(function(){ 
	$("input[name='is_invoice']").attr("checked",false);
	$("#is_invoice_0").attr("checked",true);   
	$("input[name='pay_bank']").eq(0).attr("checked",true);
	<?php if ($_smarty_tpl->tpl_vars['company']->value['link_null']=='') {?>
	$("input[name='linkway']").attr("checked",false); 
	$("#linkway_1").attr("checked",true);
	<?php }?>	
	
});
function invoice(type){
	if(type=='1'){$(".invoice_title").show();}else{$(".invoice_title").hide();}	
}
function payforms(){

	var pay_bank=$("input[name='pay_bank']:checked").val();
	
	var linkway=$("input[name='linkway']:checked").val();
	<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_com_invoice']=='1'&&$_smarty_tpl->tpl_vars['order']->value['invoice']=='1'&&$_smarty_tpl->tpl_vars['order']->value['order_type']=='') {?>0
	var invoice_title=$.trim($("#invoice_title").val()); 
	var is_invoice=$("input[name='is_invoice']:checked").val();
	if(is_invoice=='1'&&invoice_title==''){
		layer.msg('请输入发票抬头！', 2, 8);return false;
	} 
	if(linkway=='2'&&is_invoice=='1'){
		var link_man=$.trim($("input[name='link_man']").val());
		var link_moblie=$.trim($("input[name='link_moblie']").val());
		var address=$.trim($("input[name='address']").val());
		if(link_man==''||link_man=='联系人'||link_moblie==''||link_moblie=='联系电话'||address==''||address=='寄送地址'){
			layer.msg('联系人、联系电话、寄送地址均不能为空！', 2, 8);return false;
		}
		var reg_phone= (/^[1][34578]\d{9}$|^([0-9]{3,4})[-]?[0-9]{7,8}$/);
		if(link_moblie){
		    if(!reg_phone.test(link_moblie)){
			    layer.msg('请正确填写联系电话', 2, 8);return false; 
			} 
		}
	}
	<?php }?> 
	
	if(pay_bank==''){
		layer.msg('请选择支付方式！', 2, 8);return false; 
	}else if(pay_bank == 'wxpay'){ 
		var orderId = '<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
';
		var coupon = $("input[name='coupon']:checked").val();
		layer.load('执行中，请稍候...',0);
		$.post('index.php?c=payment&act=wxurl',{orderId:orderId,coupon:coupon},function(data){
			layer.closeAll();
			$('.wx_payment_ewm').html(data);
			$.layer({
				type : 1,
				title :'微信扫码支付', 
				closeBtn : [0 , true],
				border : [10 , 0.3 , '#000', true],
				area : ['290px','380px'],
				page : {dom :"#wxpayTx"}
			});
			setInterval("wxorderstatus("+orderId+")", 3000); 
		})
		return false;  
	}else if(pay_bank=='bank'){
		
		if($("#bank_name").val()==""){
			layer.msg('请填写汇款银行！', 2,8);return false;
		}
		if($("#bank_number").val()==""){
			layer.msg('请填写汇入账号！', 2,8);return false;
		}
		if($("#bank_price").val()==""){
			layer.msg('请填写汇款金额！', 2,8);return false;
		}
		if($("#bank_time").val()==""){
			layer.msg('请填写汇款时间！', 2,8);return false;
		}
	} else{
		$.layer({
			type : 1,
			title :'提示',
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['450px','280px'],
			page : {dom :"#payshow"}
		});
	}
}
function wxorderstatus(orderid) { 
	$.post('index.php?c=payment&act=wxpaystatus',{orderid:orderid},function(data){
		if(data==1){
			window.location.href='';
		}
	});
}
<?php echo '</script'; ?>
>
    <div class=right_box>
      <div class=admincont_box>
      <div class="com_tit"><span class="com_tit_span">订单确认</span></div>  
	  <div class="com_body">
			 <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
          <form name="alipayment"  id="payform" action="<?php if ($_smarty_tpl->tpl_vars['config']->value['alipaytype']=='1'&&$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>../api/alipay/alipayto.php<?php } elseif ($_smarty_tpl->tpl_vars['config']->value['alipaytype']=='2'&&$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>../api/alipaydual/alipayto.php<?php } elseif ($_smarty_tpl->tpl_vars['config']->value['alipaytype']=='3'&&$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>../api/alipayescow/alipayto.php<?php } elseif ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1'&&$_smarty_tpl->tpl_vars['config']->value['alipay']=='0') {?>../api/tenpay/index.php<?php }?>" method="post" <?php if ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1'||$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>target="_blank"<?php }?> onsubmit="return payforms();" enctype="multipart/form-data">

            <div class="clear"></div>
            <div class="pay_ment_box">
           <div class="pay_ment_box_left">
          <div class="pay_ment_box_n"> 订单号：<?php echo $_smarty_tpl->tpl_vars['order']->value['order_id'];?>

             <INPUT type="hidden" name="dingdan" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_id'];?>
"/>
             </div>
           <div class="pay_ment_jiner">支付金额</div>
           <div class="pay_ment_jiner_n"><strong>￥<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
</strong> 元 (订单金额：￥<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
)</div>
              <INPUT type="hidden" name="aliorder" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_id'];?>
" />
                <INPUT type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" name='oid' id='oid'/>
                <INPUT type="hidden" name="alimoney" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
"/>
                <INPUT type="hidden" name="pay_type" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['pay_type'];?>
"/> 
                <INPUT type="hidden" name="subject" value="<?php if ($_smarty_tpl->tpl_vars['order']->value['type']=='1') {?>购买会员<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['type']=='10') {?>置顶服务金额<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['type']=='11') {?>紧急招聘金额<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['type']=='12') {?>职位推荐金额<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['type']=='13') {?>自动刷新金额<?php } else { ?>充值<?php }?>"/> 
           </div>
           <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_com_invoice']=='1'&&$_smarty_tpl->tpl_vars['order']->value['invoice']=='1'&&$_smarty_tpl->tpl_vars['order']->value['order_type']=='') {?>
              <div class="pay_ment_box_right">
             是否需要发票：<input type="radio" value="1" name='is_invoice' onclick="invoice('1');" <?php if ($_smarty_tpl->tpl_vars['order']->value['is_invoice']=='1') {?>checked="checked"<?php }?> id='is_invoice_1' style=" vertical-align:middle; margin-right:5px;" ><label for="is_invoice_1">是</label> 
				<input type="radio" value="0" name='is_invoice'  id='is_invoice_0' onclick="invoice('2');" <?php if ($_smarty_tpl->tpl_vars['order']->value['is_invoice']!='1') {?>checked="checked"<?php }?> style=" vertical-align:middle; margin-right:5px;" ><label for="is_invoice_0">否</label> 
              </div> 
			  <div class="payment_fp" style="float:left">
            
                <div class="invoice_title" style="display:none">
                <div class="payment_fp_touch">
              <div class="payment_fp_tt" >发票抬头： <input type="text" class='com_info_text' name='invoice_title' id="invoice_title" style="float:none" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
"></div>    
              <?php if ($_smarty_tpl->tpl_vars['company']->value['link_null']=='') {?>
              <div class="payment_fp_tt" ><input name='linkway' type='radio' value='1' id="linkway_1" checked="checked" onclick="invoice_link('1')">使用企业联系方式&nbsp;&nbsp;（<?php echo $_smarty_tpl->tpl_vars['company']->value['linkman'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['company']->value['linktel'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['company']->value['address'];?>
）</div> 
				<?php }?>
              <div class="payment_fp_tt" ><input name='linkway' type='radio' <?php if ($_smarty_tpl->tpl_vars['company']->value['link_null']) {?>checked="checked"<?php }?> value='2' id="linkway_2" onclick="invoice_link('2')"/>使用新联系方式</div>  
				<div class="payment_fp_touch_in" <?php if ($_smarty_tpl->tpl_vars['company']->value['link_null']=='') {?>style="display:none"<?php }?>>
					<input type="text" placeholder="联系人" name="link_man" onblur="if(this.value==''){this.value='联系人'}" onclick="if(this.value=='联系人'){this.value=''}" value="联系人" class="payment_fp_touch_text payment_fp_touch_text_p">
					<input type="text" onblur="if(this.value==''){this.value='联系电话'}" name="link_moblie" onclick="if(this.value=='联系电话'){this.value=''}" placeholder="联系电话"  value="联系电话" style='width:100px;' class="payment_fp_touch_text" onkeyup="this.value=this.value.replace(/[^0-9-]/g,'')">
					<input type="text" onblur="if(this.value==''){this.value='寄送地址'}" name="address" onclick="if(this.value=='寄送地址'){this.value=''}" placeholder="寄送地址"  value="寄送地址" class="payment_fp_touch_text">
				</div>  
              </div>
            </div>   </div>
			
			<?php }?>
			 </div> 
            <div class="clear"></div>
             <div class="choose-pay_new"> <div class="choose-pay-type_e">选择支付方式</div></div>
            <div class="payment_choose"> 
				<div class="payway"> 
					
					
					<?php if ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1'||$_smarty_tpl->tpl_vars['config']->value['bank']=='1'||$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>
					<div class="payment_zfb">在线支付</div>
				  <ul class="paytype-list bank-list">
					<?php if ($_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>
					<li class="item">
					  <input id="check-alipay" class="radio" type="radio" checked="checked" name="pay_bank" value="directPay" onclick="paycheck('alipay');">
					  <label class="bank bank--alipay" for="check-alipay">支付宝</label>
					</li>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1') {?>
					<li class="item">
					  <input id="check-tenpay" class="radio" type="radio"  name="pay_bank" <?php if ($_smarty_tpl->tpl_vars['config']->value['alipay']=='0') {?>checked="checked"<?php }?> value="tenpay" onclick="paycheck('tenpay');">
					  <label class="bank bank--tenpay " for="check-tenpay">财付通<?php echo $_smarty_tpl->tpl_vars['config']->value['alipay'];?>
</label>
					</li>
					<?php }?>
					 
					<?php if ($_smarty_tpl->tpl_vars['config']->value['bank']=='1'&&is_array($_smarty_tpl->tpl_vars['rows']->value)&&$_smarty_tpl->tpl_vars['rows']->value) {?>
					<li class="item">
					  <input id="check-bank" class="radio" type="radio"  name="pay_bank" value="bank" onclick="paycheck('bank');">
					  <label class="bank bank--yinlian" for="check-bank"><span class='pay_Money' style="float:left;padding-top:5px;width:100%;text-align:center;">银行汇款</span></label>
					</li>
					<?php }?>
				  </ul>
				<?php } else { ?>
				<div class="con_banner_no" style="width:300px;"><span></span><em>网站已关闭支付接口，请联系管理员</em></div>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['config']->value['bank']=='1'&&is_array($_smarty_tpl->tpl_vars['rows']->value)&&$_smarty_tpl->tpl_vars['rows']->value) {?>
				<div class="paybank item" <?php if ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1'||$_smarty_tpl->tpl_vars['config']->value['alipay']=='1'||$_smarty_tpl->tpl_vars['config']->value['wxpay']=='1') {?>style="display:none"<?php }?>>                
    <div class=admin_tit><span>已添加银行</span><span class="com_remind">请仔细核对银行帐号</span></div>
    <div class=admin_note2 >
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="my_table_msg">
        <tr>
          <th width="8%"  height="26" align="center" bgcolor="#F7FAFF">银行名称</th>
          <th width="5%"  height="26" align="center" bgcolor="#F7FAFF">开户人</th>
          <th width="12%" align="center" bgcolor="#F7FAFF">银行帐户</th>
          <th width="14%" align="center" bgcolor="#F7FAFF">开户行</th>
        </tr>
        <?php if (is_array($_smarty_tpl->tpl_vars['rows']->value)) {?>
        <?php  $_smarty_tpl->tpl_vars['blist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['blist']->key => $_smarty_tpl->tpl_vars['blist']->value) {
$_smarty_tpl->tpl_vars['blist']->_loop = true;
?>
        <tr>
          <td  height="26" align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['blist']->value['bank_name'];?>
</td>
          <td  height="26" align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['blist']->value['name'];?>
</td>
          <td align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['blist']->value['bank_number'];?>
</td>
          <td align="center" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['blist']->value['bank_address'];?>
</td>
        </tr>
        <?php } ?>
        <?php } else { ?>
        <tr>
          <td colspan="4"  height="26" align="center" bgcolor="#FFFFFF">暂未添加银行</td>
        </tr>
        <?php }?>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="my_table_msg">
        <tr>
        	<td height="26" align="center" bgcolor="#FFFFFF">汇款银行:</td>
            <td colspan="3" height="26" bgcolor="#FFFFFF"><input type="text" id="bank_name" name="bank_name" class="com_info_text" value="<?php if ($_smarty_tpl->tpl_vars['order']->value['bank_name']) {
echo $_smarty_tpl->tpl_vars['order']->value['bank_name'];
}?>" placeholder="例如：中国银行+沭阳开发区支行" /></td>
		</tr> 
		<tr>
            <td height="26" align="center" bgcolor="#FFFFFF">汇入账号:</td>
			<td colspan="3" height="26"  bgcolor="#FFFFFF"><input type="text" id="bank_number" name="bank_number" class="com_info_text" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['bank_number'];?>
" /></td>
		</tr> 
		<tr>
            <td height="26" align="center" bgcolor="#FFFFFF">汇款金额:</td>
			<td width="8%" height="26"  bgcolor="#FFFFFF"><input type="text" id="bank_price" name="bank_price" class="com_info_text" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
" /></td>
            <td  align="center" bgcolor="#FFFFFF">汇款时间:</td>
			<td  align="center" bgcolor="#FFFFFF"><input type="text" id="bank_time" name="bank_time" style="width:120px" class="com_info_text" />
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/css/font-awesome.min.css" type="text/css">  
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/foundation-datepicker.min.js"><?php echo '</script'; ?>
>
					  <?php echo '<script'; ?>
 type="text/javascript">
					  $('#bank_time').fdatepicker({format: 'yyyy-mm-dd',startView:4,minView:2});   
					<?php echo '</script'; ?>
></td>
					</tr>
					<tr>
						<td height="26" align="center" bgcolor="#FFFFFF">上传汇款单:</td>
						<td colspan="3" height="26"  bgcolor="#FFFFFF"><input type="file" name="order_pic" class="com_info_text" /></td>
					</tr>
					<tr>
						<td height="26" align="center" bgcolor="#FFFFFF">备注:</td>
						<td colspan="3" bgcolor="#FFFFFF"><textarea name='order_remark' class="com_info_text" style="width:auto;height:auto;" cols="50" rows="3"></textarea></td>
					</tr>
				  </table>
				</div> 
				</div>
				<?php }?>
              <?php if ($_smarty_tpl->tpl_vars['config']->value['alipaytype']=='1'&&$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?> 
				<div class="alipaytype">
					<div class="payment_zfb">网上银行支付</div>
					<ul class="paytype-list bank-list">
						<li class="item">
							<input type="radio" class="radio" value="ICBCB2C" id="bank-type-ICBCB2C" name="pay_bank" onclick="paycheck('alipay');">
							<label title="中国工商银行" for="bank-type-ICBCB2C" class="bank bank--icbc">中国工商银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CMB" id="bank-type-CMB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="招商银行" for="bank-type-CMB" class="bank bank--cmb">招商银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CCB" id="bank-type-CCB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="中国建设银行" for="bank-type-CCB" class="bank bank--ccb">中国建设银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="ABC" id="bank-type-ABC" name="pay_bank" onclick="paycheck('alipay');">
							<label title="中国农业银行" for="bank-type-ABC" class="bank bank--abc">中国农业银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="COMM" id="bank-type-1020" name="pay_bank" onclick="paycheck('alipay');">
							<label title="交通银行" for="bank-type-1020" class="bank bank--boc">交通银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="BOCB2C" id="bank-type-BOCB2C" name="pay_bank" onclick="paycheck('alipay');">
							<label title="中国银行" for="bank-type-BOCB2C" class="bank bank--bofc">中国银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CIB" id="bank-type-CIB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="兴业银行" for="bank-type-CIB" class="bank bank--cib">兴业银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CEBBANK" id="bank-type-CEBBANK" name="pay_bank" onclick="paycheck('alipay');">
							<label title="光大银行" for="bank-type-CEBBANK" class="bank bank--cebb">光大银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="SPDB" id="bank-type-SPDB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="上海浦东发展银行" for="bank-type-SPDB" class="bank bank--spdb">上海浦东发展银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="GDB" id="bank-type-GDB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="广东发展银行" for="bank-type-GDB" class="bank bank--gdb">广东发展银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CITIC" id="bank-type-CITIC" name="pay_bank" onclick="paycheck('alipay');">
							<label title="中信银行" for="bank-type-CITIC" class="bank bank--zxyh">中信银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CMBC" id="bank-type-CMBC" name="pay_bank" onclick="paycheck('alipay');">
							<label title="中国民生银行" for="bank-type-CMBC" class="bank bank--cmbc">中国民生银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="SPABANK" id="bank-type-SPABANK" name="pay_bank" onclick="paycheck('alipay');">
							<label title="平安银行" for="bank-type-SPABANK" class="bank bank--pingan">平安银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="BJBANK" id="bank-type-BJBANK" name="pay_bank" onclick="paycheck('alipay');">
							<label title="北京银行" for="bank-type-BJBANK" class="bank bank--bob">北京银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="BJRCB" id="bank-type-BJRCB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="北京农商银行" for="bank-type-BJRCB" class="bank bank--bjrcb">北京农商银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="PSBC-DEBIT" id="bank-type-PSBC-DEBIT" name="pay_bank" onclick="paycheck('alipay');">
							<label title="中国邮政储蓄银行" for="bank-type-PSBC-DEBIT" class="bank bank--pspc">中国邮政储蓄银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="SHRCB" id="bank-type-SHRCB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="上海农商银行" for="bank-type-SHRCB" class="bank bank--shrcb">上海农商银行</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="HZCBB2C" id="bank-type-HZCBB2C" name="pay_bank" onclick="paycheck('alipay');">
							<label title="杭州银行" for="bank-type-HZCBB2C" class="bank bank--hzcb">杭州银行</label>
						</li>
					</ul>
				</div> 
				<?php }?>
				</div>
            </div> 
			<?php if ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1'||$_smarty_tpl->tpl_vars['config']->value['bank']=='1'||$_smarty_tpl->tpl_vars['config']->value['alipay']=='1'||$_smarty_tpl->tpl_vars['config']->value['wxpay']=='1') {?><div class="payment_fk"><input id="dingdan_submit" class="pay_ment_fk_q" type="submit" value="去付款" name="nextstep" /></div><?php }?>
            <div style=" float:left"> </div> 
          </form>
        </div> 
        </div> 
     
      </div>
    </div>
  </div> 
  <!--  微信tck-->
    <div id="wxpayTx"  style="display:none;">
  <div class="wx_payment">
  <div class="wx_payment_cont"><div class="wx_payment_ewm">正在加载微信二维码,请稍候....</div> </div><div class="wx_payment_h2">二维码有效时长为2小时，请尽快支付</div>
  <div class="wx_payment_tip">
  <div class="wx_payment_tip_left"><i class="wx_payment_tip_line1"></i><i class="wx_payment_tip_line2"></i><i class="wx_payment_tip_line3"></i></div> 
  <div class="wx_payment_tip_right">请使用微信扫一扫<br>扫描二维码支付</div>
  </div>
  </div>
  </div>  
  <!--支付弹出框-->
<div id="payshow" style="width:450px; position:absolute;left:0px;top:0px; background:#fff; display:none;">
<div class="payment_tip">请在新打开的支付页面上完成付款，付款完成前请不要关闭此窗口。<br>如您在支付过程中遇到问题，请联系客服：<span class="payment_tip_s"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</span></div>
<div class="payment_bottom"><a href="index.php?c=paylog" class="payment_bottombutt">已完成付款</a><a href="index.php?c=payment&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" class="payment_bottom_bth2">重新支付</a></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
