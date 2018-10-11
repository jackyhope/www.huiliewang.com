<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-27 11:36:34
         compiled from "/home/wwwroot/www.huiliewang.com//app/template/default/public_search/packpay.htm" */ ?>
<?php /*%%SmartyHeaderCode:8412171695bac5042d28b20-33740855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e67f118faa9db3725fddc780b1a605a3f96aaf00' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com//app/template/default/public_search/packpay.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8412171695bac5042d28b20-33740855',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'packs' => 0,
    'v' => 0,
    'key' => 0,
    'config' => 0,
    'com_style' => 0,
    'Info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bac5042d510d6_38321059',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bac5042d510d6_38321059')) {function content_5bac5042d510d6_38321059($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
?>  
<!--购买--------------------------------------------------->
<div class="none " id="packlist">
<div class="Value_added">
	<div class="Value_added_mune">  
		<ul class="Value_added_mune_left">
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['packs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<li id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==0) {?> class="Value_added_mune_cur" <?php }?>><a href="javascript:void(0)" onclick="showleft('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a><i class="Value_added_bg"></i></li>
 			<?php } ?>
		</ul>
	</div>
	<div class="Value_added_box"> 
    <div class="Value_added_box_av">
	<div class="clear"></div>
 		<table class="added_de_box_table" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td><div style="width:458px;">套餐内容</div></td>
					<td><div>套餐价</div></td>
					<td><div>会员价格</div></td>
				</tr>
           	</tbody>
        </table>
    	<table class="added_de_box_table" cellpadding="0" cellspacing="0"id="ratinglist"></table>
		<form name="alipayment"  id="payform" action="../api/alipay/alipayto.php" method="post" target="_blank" onsubmit="return payforms();">
			<div class="added_de_box_fk">应付金额：
				<span class="added_de_box_fk_je" id="price">0</span> 元
			</div>
			<input type="hidden" id="comservice" value="">
			<div class="job_redpack_list">
				<?php if ($_smarty_tpl->tpl_vars['config']->value['alipaytype']=='1'&&$_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>
				<div class="job_redpack_list_name">支付方式：</div>
	              
	            <div class="job_redpack_pay">
	            	<a href="javascript:;" onclick="getOrder('alipay');"><img src="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
/images/ap_pay.png"> 支付宝支付</a>
	            </div>
	             <?php } else { ?>
				<div class="con_banner_no" style="width:300px;margin-top:10px;"><span></span><em>网站已关闭支付接口，请联系管理员</em></div>
				<?php }?>
	            <input type="hidden" value="" id="pay_type" name="pay_type" value=''/>
				<input type="hidden" name="dingdan" id="order_id" value=""/>
				<input type="hidden" value="增值包"  name="subject" value=''/>
				<input type="hidden" name="pay_bank" value="directPay"> 
   	  		</div>
		</form>
  		<input type="hidden" name="orderid" id="orderid" value=""/>
	</div>
</div>
</div></div>
  
<!--支付弹出框-->
<div id="payshow" style="width:450px; position:absolute;left:0px;top:0px; background:#fff; display:none;">
	<div class="payment_tip">请在新打开的支付页面上完成付款，付款完成前请不要关闭此窗口。<br>如您在支付过程中遇到问题，请联系客服：<span class="payment_tip_s"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</span></div>
	<div class="payment_bottom">
		<a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['Info']->value['id']),$_smarty_tpl);?>
" class="payment_bottombutt">已完成付款</a>
 	</div>
</div>
 
<?php echo '<script'; ?>
>

function showleft(id){
	$('#price').html(0);
	$('#comservice').val('');
	$("li").removeClass("Value_added_mune_cur");
	$('#'+id).addClass('Value_added_mune_cur');
	$.post('<?php echo smarty_function_url(array('m'=>'ajax','c'=>'getPack'),$_smarty_tpl);?>
',{id:id},function(data){
		$("#ratinglist").html(data);
 	});
}

function payforms(){
	var pay_type=$("#pay_type").val();

	if(pay_type==''){
		layer.msg('请选择支付方式！', 2,8);

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
/* 选择增值包套餐，获取套餐ID 以及所需金额  */
function toChange(){
	var obj  = document.getElementsByName('service_package');
    for(var i=0;i<obj.length;i++){
        if(obj[i].checked==true){
      		$('#comservice').val(obj[i].value);  
      		var comservinceid = obj[i].value; 
      		$.post('<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','a'=>'getPrice'),$_smarty_tpl);?>
',{comservinceid:comservinceid},function(data){
          		if(data>0){
          			$('#price').html(data);
                }
       	 	});         
        }
    }
}

/*生成订单*/
function getOrder(pay_type){
	
	$('#pay_type').val(pay_type);
	
 	var id = $("#comservice").val();//增值包选中套餐ID

 	var price = document.getElementById("price").innerHTML;//选中套餐后所需要的金额

 	if(id==""){
 		layer.msg('请选择增值包套餐！',2,8);return false;
 	}else{
 	 	
 		var index = layer.load('执行中，请稍候...',0);

 		$.ajax({
 	  		async: false, //设置ajax同步  
 	        type: 'POST',  
 	        global:false,
 	        url: "<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','a'=>'pay'),$_smarty_tpl);?>
",  
 	        data: {id:id,price:price},  
 	        success: function(data){  
 	        	var data=eval('('+data+')'); 
 	        	if(data.error==1){
 	     			layer.msg(data.msg, 2,8);
 	     		}else if(data.error==0){
 	     			$('#order_id').val(data.orderid);
 	    			$('#orderid').val(data.id);
 	    			//提交表单
 	    			layer.close(index);
 	    			$('#payform').submit();
 	    		}
 	        }  
 	  	});
 	}
}
<?php echo '</script'; ?>
>
<?php }} ?>
