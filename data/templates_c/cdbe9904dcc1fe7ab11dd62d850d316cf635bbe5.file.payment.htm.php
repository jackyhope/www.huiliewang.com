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
		layer.msg('�˽ӿ���δ���ţ�', 2, 8);
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
		layer.msg('�����뷢Ʊ̧ͷ��', 2, 8);return false;
	} 
	if(linkway=='2'&&is_invoice=='1'){
		var link_man=$.trim($("input[name='link_man']").val());
		var link_moblie=$.trim($("input[name='link_moblie']").val());
		var address=$.trim($("input[name='address']").val());
		if(link_man==''||link_man=='��ϵ��'||link_moblie==''||link_moblie=='��ϵ�绰'||address==''||address=='���͵�ַ'){
			layer.msg('��ϵ�ˡ���ϵ�绰�����͵�ַ������Ϊ�գ�', 2, 8);return false;
		}
		var reg_phone= (/^[1][34578]\d{9}$|^([0-9]{3,4})[-]?[0-9]{7,8}$/);
		if(link_moblie){
		    if(!reg_phone.test(link_moblie)){
			    layer.msg('����ȷ��д��ϵ�绰', 2, 8);return false; 
			} 
		}
	}
	<?php }?> 
	
	if(pay_bank==''){
		layer.msg('��ѡ��֧����ʽ��', 2, 8);return false; 
	}else if(pay_bank == 'wxpay'){ 
		var orderId = '<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
';
		var coupon = $("input[name='coupon']:checked").val();
		layer.load('ִ���У����Ժ�...',0);
		$.post('index.php?c=payment&act=wxurl',{orderId:orderId,coupon:coupon},function(data){
			layer.closeAll();
			$('.wx_payment_ewm').html(data);
			$.layer({
				type : 1,
				title :'΢��ɨ��֧��', 
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
			layer.msg('����д������У�', 2,8);return false;
		}
		if($("#bank_number").val()==""){
			layer.msg('����д�����˺ţ�', 2,8);return false;
		}
		if($("#bank_price").val()==""){
			layer.msg('����д����', 2,8);return false;
		}
		if($("#bank_time").val()==""){
			layer.msg('����д���ʱ�䣡', 2,8);return false;
		}
	} else{
		$.layer({
			type : 1,
			title :'��ʾ',
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
      <div class="com_tit"><span class="com_tit_span">����ȷ��</span></div>  
	  <div class="com_body">
			 <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
          <form name="alipayment"  id="payform" action="<?php if ($_smarty_tpl->tpl_vars['config']->value['alipaytype']=='1'&&$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>../api/alipay/alipayto.php<?php } elseif ($_smarty_tpl->tpl_vars['config']->value['alipaytype']=='2'&&$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>../api/alipaydual/alipayto.php<?php } elseif ($_smarty_tpl->tpl_vars['config']->value['alipaytype']=='3'&&$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>../api/alipayescow/alipayto.php<?php } elseif ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1'&&$_smarty_tpl->tpl_vars['config']->value['alipay']=='0') {?>../api/tenpay/index.php<?php }?>" method="post" <?php if ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1'||$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>target="_blank"<?php }?> onsubmit="return payforms();" enctype="multipart/form-data">

            <div class="clear"></div>
            <div class="pay_ment_box">
           <div class="pay_ment_box_left">
          <div class="pay_ment_box_n"> �����ţ�<?php echo $_smarty_tpl->tpl_vars['order']->value['order_id'];?>

             <INPUT type="hidden" name="dingdan" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_id'];?>
"/>
             </div>
           <div class="pay_ment_jiner">֧�����</div>
           <div class="pay_ment_jiner_n"><strong>��<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
</strong> Ԫ (��������<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
)</div>
              <INPUT type="hidden" name="aliorder" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_id'];?>
" />
                <INPUT type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" name='oid' id='oid'/>
                <INPUT type="hidden" name="alimoney" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
"/>
                <INPUT type="hidden" name="pay_type" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['pay_type'];?>
"/> 
                <INPUT type="hidden" name="subject" value="<?php if ($_smarty_tpl->tpl_vars['order']->value['type']=='1') {?>�����Ա<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['type']=='10') {?>�ö�������<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['type']=='11') {?>������Ƹ���<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['type']=='12') {?>ְλ�Ƽ����<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['type']=='13') {?>�Զ�ˢ�½��<?php } else { ?>��ֵ<?php }?>"/> 
           </div>
           <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_com_invoice']=='1'&&$_smarty_tpl->tpl_vars['order']->value['invoice']=='1'&&$_smarty_tpl->tpl_vars['order']->value['order_type']=='') {?>
              <div class="pay_ment_box_right">
             �Ƿ���Ҫ��Ʊ��<input type="radio" value="1" name='is_invoice' onclick="invoice('1');" <?php if ($_smarty_tpl->tpl_vars['order']->value['is_invoice']=='1') {?>checked="checked"<?php }?> id='is_invoice_1' style=" vertical-align:middle; margin-right:5px;" ><label for="is_invoice_1">��</label> 
				<input type="radio" value="0" name='is_invoice'  id='is_invoice_0' onclick="invoice('2');" <?php if ($_smarty_tpl->tpl_vars['order']->value['is_invoice']!='1') {?>checked="checked"<?php }?> style=" vertical-align:middle; margin-right:5px;" ><label for="is_invoice_0">��</label> 
              </div> 
			  <div class="payment_fp" style="float:left">
            
                <div class="invoice_title" style="display:none">
                <div class="payment_fp_touch">
              <div class="payment_fp_tt" >��Ʊ̧ͷ�� <input type="text" class='com_info_text' name='invoice_title' id="invoice_title" style="float:none" value="<?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
"></div>    
              <?php if ($_smarty_tpl->tpl_vars['company']->value['link_null']=='') {?>
              <div class="payment_fp_tt" ><input name='linkway' type='radio' value='1' id="linkway_1" checked="checked" onclick="invoice_link('1')">ʹ����ҵ��ϵ��ʽ&nbsp;&nbsp;��<?php echo $_smarty_tpl->tpl_vars['company']->value['linkman'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['company']->value['linktel'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['company']->value['address'];?>
��</div> 
				<?php }?>
              <div class="payment_fp_tt" ><input name='linkway' type='radio' <?php if ($_smarty_tpl->tpl_vars['company']->value['link_null']) {?>checked="checked"<?php }?> value='2' id="linkway_2" onclick="invoice_link('2')"/>ʹ������ϵ��ʽ</div>  
				<div class="payment_fp_touch_in" <?php if ($_smarty_tpl->tpl_vars['company']->value['link_null']=='') {?>style="display:none"<?php }?>>
					<input type="text" placeholder="��ϵ��" name="link_man" onblur="if(this.value==''){this.value='��ϵ��'}" onclick="if(this.value=='��ϵ��'){this.value=''}" value="��ϵ��" class="payment_fp_touch_text payment_fp_touch_text_p">
					<input type="text" onblur="if(this.value==''){this.value='��ϵ�绰'}" name="link_moblie" onclick="if(this.value=='��ϵ�绰'){this.value=''}" placeholder="��ϵ�绰"  value="��ϵ�绰" style='width:100px;' class="payment_fp_touch_text" onkeyup="this.value=this.value.replace(/[^0-9-]/g,'')">
					<input type="text" onblur="if(this.value==''){this.value='���͵�ַ'}" name="address" onclick="if(this.value=='���͵�ַ'){this.value=''}" placeholder="���͵�ַ"  value="���͵�ַ" class="payment_fp_touch_text">
				</div>  
              </div>
            </div>   </div>
			
			<?php }?>
			 </div> 
            <div class="clear"></div>
             <div class="choose-pay_new"> <div class="choose-pay-type_e">ѡ��֧����ʽ</div></div>
            <div class="payment_choose"> 
				<div class="payway"> 
					
					
					<?php if ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1'||$_smarty_tpl->tpl_vars['config']->value['bank']=='1'||$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>
					<div class="payment_zfb">����֧��</div>
				  <ul class="paytype-list bank-list">
					<?php if ($_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>
					<li class="item">
					  <input id="check-alipay" class="radio" type="radio" checked="checked" name="pay_bank" value="directPay" onclick="paycheck('alipay');">
					  <label class="bank bank--alipay" for="check-alipay">֧����</label>
					</li>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1') {?>
					<li class="item">
					  <input id="check-tenpay" class="radio" type="radio"  name="pay_bank" <?php if ($_smarty_tpl->tpl_vars['config']->value['alipay']=='0') {?>checked="checked"<?php }?> value="tenpay" onclick="paycheck('tenpay');">
					  <label class="bank bank--tenpay " for="check-tenpay">�Ƹ�ͨ<?php echo $_smarty_tpl->tpl_vars['config']->value['alipay'];?>
</label>
					</li>
					<?php }?>
					 
					<?php if ($_smarty_tpl->tpl_vars['config']->value['bank']=='1'&&is_array($_smarty_tpl->tpl_vars['rows']->value)&&$_smarty_tpl->tpl_vars['rows']->value) {?>
					<li class="item">
					  <input id="check-bank" class="radio" type="radio"  name="pay_bank" value="bank" onclick="paycheck('bank');">
					  <label class="bank bank--yinlian" for="check-bank"><span class='pay_Money' style="float:left;padding-top:5px;width:100%;text-align:center;">���л��</span></label>
					</li>
					<?php }?>
				  </ul>
				<?php } else { ?>
				<div class="con_banner_no" style="width:300px;"><span></span><em>��վ�ѹر�֧���ӿڣ�����ϵ����Ա</em></div>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['config']->value['bank']=='1'&&is_array($_smarty_tpl->tpl_vars['rows']->value)&&$_smarty_tpl->tpl_vars['rows']->value) {?>
				<div class="paybank item" <?php if ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1'||$_smarty_tpl->tpl_vars['config']->value['alipay']=='1'||$_smarty_tpl->tpl_vars['config']->value['wxpay']=='1') {?>style="display:none"<?php }?>>                
    <div class=admin_tit><span>����������</span><span class="com_remind">����ϸ�˶������ʺ�</span></div>
    <div class=admin_note2 >
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="my_table_msg">
        <tr>
          <th width="8%"  height="26" align="center" bgcolor="#F7FAFF">��������</th>
          <th width="5%"  height="26" align="center" bgcolor="#F7FAFF">������</th>
          <th width="12%" align="center" bgcolor="#F7FAFF">�����ʻ�</th>
          <th width="14%" align="center" bgcolor="#F7FAFF">������</th>
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
          <td colspan="4"  height="26" align="center" bgcolor="#FFFFFF">��δ��������</td>
        </tr>
        <?php }?>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="my_table_msg">
        <tr>
        	<td height="26" align="center" bgcolor="#FFFFFF">�������:</td>
            <td colspan="3" height="26" bgcolor="#FFFFFF"><input type="text" id="bank_name" name="bank_name" class="com_info_text" value="<?php if ($_smarty_tpl->tpl_vars['order']->value['bank_name']) {
echo $_smarty_tpl->tpl_vars['order']->value['bank_name'];
}?>" placeholder="���磺�й�����+����������֧��" /></td>
		</tr> 
		<tr>
            <td height="26" align="center" bgcolor="#FFFFFF">�����˺�:</td>
			<td colspan="3" height="26"  bgcolor="#FFFFFF"><input type="text" id="bank_number" name="bank_number" class="com_info_text" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['bank_number'];?>
" /></td>
		</tr> 
		<tr>
            <td height="26" align="center" bgcolor="#FFFFFF">�����:</td>
			<td width="8%" height="26"  bgcolor="#FFFFFF"><input type="text" id="bank_price" name="bank_price" class="com_info_text" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
" /></td>
            <td  align="center" bgcolor="#FFFFFF">���ʱ��:</td>
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
						<td height="26" align="center" bgcolor="#FFFFFF">�ϴ���:</td>
						<td colspan="3" height="26"  bgcolor="#FFFFFF"><input type="file" name="order_pic" class="com_info_text" /></td>
					</tr>
					<tr>
						<td height="26" align="center" bgcolor="#FFFFFF">��ע:</td>
						<td colspan="3" bgcolor="#FFFFFF"><textarea name='order_remark' class="com_info_text" style="width:auto;height:auto;" cols="50" rows="3"></textarea></td>
					</tr>
				  </table>
				</div> 
				</div>
				<?php }?>
              <?php if ($_smarty_tpl->tpl_vars['config']->value['alipaytype']=='1'&&$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?> 
				<div class="alipaytype">
					<div class="payment_zfb">��������֧��</div>
					<ul class="paytype-list bank-list">
						<li class="item">
							<input type="radio" class="radio" value="ICBCB2C" id="bank-type-ICBCB2C" name="pay_bank" onclick="paycheck('alipay');">
							<label title="�й���������" for="bank-type-ICBCB2C" class="bank bank--icbc">�й���������</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CMB" id="bank-type-CMB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="��������" for="bank-type-CMB" class="bank bank--cmb">��������</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CCB" id="bank-type-CCB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="�й���������" for="bank-type-CCB" class="bank bank--ccb">�й���������</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="ABC" id="bank-type-ABC" name="pay_bank" onclick="paycheck('alipay');">
							<label title="�й�ũҵ����" for="bank-type-ABC" class="bank bank--abc">�й�ũҵ����</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="COMM" id="bank-type-1020" name="pay_bank" onclick="paycheck('alipay');">
							<label title="��ͨ����" for="bank-type-1020" class="bank bank--boc">��ͨ����</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="BOCB2C" id="bank-type-BOCB2C" name="pay_bank" onclick="paycheck('alipay');">
							<label title="�й�����" for="bank-type-BOCB2C" class="bank bank--bofc">�й�����</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CIB" id="bank-type-CIB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="��ҵ����" for="bank-type-CIB" class="bank bank--cib">��ҵ����</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CEBBANK" id="bank-type-CEBBANK" name="pay_bank" onclick="paycheck('alipay');">
							<label title="�������" for="bank-type-CEBBANK" class="bank bank--cebb">�������</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="SPDB" id="bank-type-SPDB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="�Ϻ��ֶ���չ����" for="bank-type-SPDB" class="bank bank--spdb">�Ϻ��ֶ���չ����</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="GDB" id="bank-type-GDB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="�㶫��չ����" for="bank-type-GDB" class="bank bank--gdb">�㶫��չ����</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CITIC" id="bank-type-CITIC" name="pay_bank" onclick="paycheck('alipay');">
							<label title="��������" for="bank-type-CITIC" class="bank bank--zxyh">��������</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="CMBC" id="bank-type-CMBC" name="pay_bank" onclick="paycheck('alipay');">
							<label title="�й���������" for="bank-type-CMBC" class="bank bank--cmbc">�й���������</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="SPABANK" id="bank-type-SPABANK" name="pay_bank" onclick="paycheck('alipay');">
							<label title="ƽ������" for="bank-type-SPABANK" class="bank bank--pingan">ƽ������</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="BJBANK" id="bank-type-BJBANK" name="pay_bank" onclick="paycheck('alipay');">
							<label title="��������" for="bank-type-BJBANK" class="bank bank--bob">��������</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="BJRCB" id="bank-type-BJRCB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="����ũ������" for="bank-type-BJRCB" class="bank bank--bjrcb">����ũ������</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="PSBC-DEBIT" id="bank-type-PSBC-DEBIT" name="pay_bank" onclick="paycheck('alipay');">
							<label title="�й�������������" for="bank-type-PSBC-DEBIT" class="bank bank--pspc">�й�������������</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="SHRCB" id="bank-type-SHRCB" name="pay_bank" onclick="paycheck('alipay');">
							<label title="�Ϻ�ũ������" for="bank-type-SHRCB" class="bank bank--shrcb">�Ϻ�ũ������</label>
						</li>
						<li class="item">
							<input type="radio" class="radio" value="HZCBB2C" id="bank-type-HZCBB2C" name="pay_bank" onclick="paycheck('alipay');">
							<label title="��������" for="bank-type-HZCBB2C" class="bank bank--hzcb">��������</label>
						</li>
					</ul>
				</div> 
				<?php }?>
				</div>
            </div> 
			<?php if ($_smarty_tpl->tpl_vars['config']->value['tenpay']=='1'||$_smarty_tpl->tpl_vars['config']->value['bank']=='1'||$_smarty_tpl->tpl_vars['config']->value['alipay']=='1'||$_smarty_tpl->tpl_vars['config']->value['wxpay']=='1') {?><div class="payment_fk"><input id="dingdan_submit" class="pay_ment_fk_q" type="submit" value="ȥ����" name="nextstep" /></div><?php }?>
            <div style=" float:left"> </div> 
          </form>
        </div> 
        </div> 
     
      </div>
    </div>
  </div> 
  <!--  ΢��tck-->
    <div id="wxpayTx"  style="display:none;">
  <div class="wx_payment">
  <div class="wx_payment_cont"><div class="wx_payment_ewm">���ڼ���΢�Ŷ�ά��,���Ժ�....</div> </div><div class="wx_payment_h2">��ά����Чʱ��Ϊ2Сʱ���뾡��֧��</div>
  <div class="wx_payment_tip">
  <div class="wx_payment_tip_left"><i class="wx_payment_tip_line1"></i><i class="wx_payment_tip_line2"></i><i class="wx_payment_tip_line3"></i></div> 
  <div class="wx_payment_tip_right">��ʹ��΢��ɨһɨ<br>ɨ���ά��֧��</div>
  </div>
  </div>
  </div>  
  <!--֧��������-->
<div id="payshow" style="width:450px; position:absolute;left:0px;top:0px; background:#fff; display:none;">
<div class="payment_tip">�����´򿪵�֧��ҳ������ɸ���������ǰ�벻Ҫ�رմ˴��ڡ�<br>������֧���������������⣬����ϵ�ͷ���<span class="payment_tip_s"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</span></div>
<div class="payment_bottom"><a href="index.php?c=paylog" class="payment_bottombutt">����ɸ���</a><a href="index.php?c=payment&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" class="payment_bottom_bth2">����֧��</a></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>