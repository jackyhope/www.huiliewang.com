<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-07 00:19:41
         compiled from "/home/wwwroot/www.huiliewang.com//app/template/member/user/footer.htm" */ ?>
<?php /*%%SmartyHeaderCode:7280851415bb8e09d2581b8-19780511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b06436fed7d013bc8746947441f2e9252e97e3a1' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com//app/template/member/user/footer.htm',
      1 => 1517800854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7280851415bb8e09d2581b8-19780511',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'com_style' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb8e09d2b7b02_47171492',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb8e09d2b7b02_47171492')) {function content_5bb8e09d2b7b02_47171492($_smarty_tpl) {?>
<!--�����ö�-->
<style>
    .hp_foot {
        width: 100%;
        text-align: center;
        background: #fafafa;
        margin-top: 20px;
        border-top: 1px solid #e6e6e6;
    }
    .hp_foot_wt {
        padding: 30px 0px;
    }
    .hp_foot_wh {
        border-right: 1px solid #eeeded;
        padding-right: 60px;
    }
    .hp_foot_wx {
        margin-top: 30px;
        width: 119px;
        text-align: center;
    }
    .fr {
        float: right;
    }
    .linkitem{
        margin-right: 10px;
    }
    .shuxian{
        color: #ddd;
        margin-left: 10px;
        margin-right: 10px;
    }
    .hp_foot_bt P {
        color: #816e74;
    }
    .hp_foot_bt {
        padding-bottom: 15px;
        line-height: 30px;
    }
</style>
<?php echo '<script'; ?>
>
function cktopspan(day,price){
	var disval=$('input[name="dis"]:checked ').val();
	if(disval&&day!=disval){
		$("input[name=dis][value="+disval+"]").attr("checked",false);
	}
	$("input[name=dis][value="+day+"]").attr("checked",true);
	var needs=day*price;
	$("#price").html(needs);
}
function buyResumeTop(pay_type){
	
	$('#pay_type').val(pay_type);
 	var resumeid = $('#eid').val();
 	var days = $("input[name='dis']:checked").val();
  	var index = layer.load('ִ���У����Ժ�...',0);
  	
  	$.ajax({
  		async: false, //����ajaxͬ��  
        type: 'POST',  
        global:false,
        url: "index.php?c=resume&act=resumeOrder",  
        data: {resumeid:resumeid,days:days},  
        success: function(data){  
        	var data=eval('('+data+')'); 
        	if(data.error==1){
     			layer.msg(data.msg, 2,8);
     		}else if(data.error==0){
     			$('#order_zd_id').val(data.orderid);
    			$('#orderid').val(data.id);
    			//�ύ��
    			layer.close(index);
    			$('#payform_zd').submit();
    		}
        }  
  	});
}

function wtResume(pay_type){
	
	$('#pay_type').val(pay_type);
 	var resumeid = $('#wteid').val();
   	var index = layer.load('ִ���У����Ժ�...',0);
  	
  	$.ajax({
  		async: false, //����ajaxͬ��  
        type: 'POST',  
        global:false,
        url: "index.php?c=resume&act=resumeOrder",  
        data: {wteid:resumeid},  
        success: function(data){  
        	var data=eval('('+data+')'); 
        	if(data.error==1){
     			layer.msg(data.msg, 2,8);
     		}else if(data.error==0){
     			$('#order_wt_id').val(data.orderid);
    			$('#orderid').val(data.id);
    			//�ύ��
    			layer.close(index);
    			$('#payform_wt').submit();
    		}
        }  
  	});
}

function wxorderstatus(orderid) { 
	$.post('index.php?c=payment&act=wxpaystatus',{orderid:orderid},function(data){
		if(data==1){
			window.location.href='';
		}
	});
}

function pay_forms(){
	var pay_type=$("#pay_type").val();
	if(pay_type==''){
		layer.msg('��ѡ��֧����ʽ��', 2,8);
	}else if(pay_type == 'wxpay'){ 
		var orderId = $("#orderid").val();
		$.post('index.php?c=payment&act=wxurl',{orderId:orderId},function(data){
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

function rePay(){
	var orderId = $("#orderid").val();
	location.href="index.php?c=payment&id="+orderId;
}
<?php echo '</script'; ?>
>
<div id="resumetop" style="display:none;">
    <div class="admin_Operating_sh" style="padding:10px; ">
   		<div class="stick_msg">�ö�������<i id="resumename"></i></div>
      	<div class="stick_msg">�ö�����ʱ�䣺<span id='topdate'></span></div>
       	<div class="stick_tm">
              <div class="stick_tm_ft">�ö�ʱ����</div>
              <ul class="stick_tm_box">
                   <lable for="dis1">
                          <li>
                              <input type="radio" class="stick_tm_box_radio" value="1" name="dis" checked="checked" onclick="cktop('1','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')"/>
                              <span class="stick_tm_box_time" onclick="cktopspan('1','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')">1��</span>
                          </li>
                   </lable>
                   <lable for="dis3">
                          <li>
                              <input type="radio" class="stick_tm_box_radio" value="3" name="dis" onclick="cktop('3','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')"/>
                              <span class="stick_tm_box_time" onclick="cktopspan('3','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')">3��</span>
                          </li>
                   </lable>
                   <lable for="dis7">
                          <li>
                              <input type="radio" class="stick_tm_box_radio" value="7" name="dis" onclick="cktop('7','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')"/>
                              <span class="stick_tm_box_time" onclick="cktopspan('7','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')">7��</span>
                          </li>
                   </lable>
                   <lable for="dis15">
                          <li>
                              <input type="radio" class="stick_tm_box_radio" value="15" name="dis" onclick="cktop('15','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')"/>
                              <span class="stick_tm_box_time" onclick="cktopspan('15','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')">15��</span>
                          </li>
                   </lable>
                   <lable for="dis30">
                          <li >
                              <input type="radio" class="stick_tm_box_radio" value="30" name="dis" onclick="cktop('30','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')"/>
                              <span class="stick_tm_box_time" onclick="cktopspan('30','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')">30��</span>
                          </li>
                   </lable>
              </ul>
              <input type="hidden" id="eid" name="eid" value="">
              <input type="hidden" name="myxs" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
">
         </div>

         <div class="stick_rage">
              <span>Ӧ����<em id="price"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
</em>Ԫ</span> <br/>

          </div>
      	<form name="alipayment"  id="payform_zd" action="../api/alipay/alipayto.php" method="post" target="_blank" onsubmit="return pay_forms();">
		
        
        <div class="job_recom_listbth">
		
			<?php if ($_smarty_tpl->tpl_vars['config']->value['alipay']=='1') {?>
			<div class="job_redpack_list_name">֧����ʽ��</div>
		 	<div class="job_redpack_pay">
				<a href="javascript:;" onclick="buyResumeTop('alipay');"><div class="job_redpack_pay_bor job_redpack_pay_bor_pd"><img src="<?php echo $_smarty_tpl->tpl_vars['com_style']->value;?>
/images/ap_pay.png"></div>֧����֧��</a>
			</div>
			<?php } else { ?>
			<div class="con_banner_no" style="width:300px;margin-top:10px;"><span></span><em>��վ�ѹر�֧���ӿڣ�����ϵ����Ա</em></div>
			<?php }?>
			
			<input type="hidden" value="" id="pay_type" name="pay_type"/>
			<input type="hidden" name="dingdan" id="order_zd_id" value=""/>
			<input type="hidden" value="�����ö����"  name="subject"/>
			<input type="hidden" name="pay_bank" value="directPay">
		</div>
		<div class="job_recom_listtel">�ͷ��绰��<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</div>
	</form>
      </div>
</div>
<input type="hidden" name="orderid" id="orderid" value=""/>
<!--  ΢��tck-->
<div id="wxpayTx"  style="display:none;">
  <div class="wx_payment">
  <div class="wx_payment_cont"><div class="wx_payment_ewm">���ڼ���΢�Ŷ�ά��,���Ժ�....</div> </div><div class="wx_payment_h2">��ά����Чʱ��2Сʱ���뾡��֧��</div>
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
<div class="payment_bottom"><a href="index.php?c=paylog" class="payment_bottombutt">����ɸ���</a><a href="javascript:;" onclick="rePay();" class="payment_bottom_bth2">����֧��</a></div>
</div>
<!--�����ö�end-->
<div class="clear"></div>
<div class="hp_foot fl" style="width: 100%;">
    <div class="w1000" style="width: 1200px;margin: 0 auto;">
        <div class="hp_foot_wt fl" style="padding:30px 0;">
            <!--<div class="hp_foot_pho fl">-->
            <!--<dl>-->
            <!--<dt></dt>-->
            <!--<dd>�ͷ���������</dd>-->
            <!--<dd class="hp_foot_pho_nmb"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</dd>-->
            <!--<dd>������ 9:00-19:00</dd>-->
            <!--</dl>-->
            <!--</div>-->
            <div class="hp_foot_wh fl" style="border-left: none;width: 880px;padding-left: 0;text-align: left">

                <div>�������ӣ�
                    <a href="http://www.nfxhlt.com" target="_blank" class="linkitem">�Ϸ��»�</a>
                    <a href="http://www.nfxhlt.com" target="_blank" class="linkitem">�Ϸ��»�</a>
                    <a href="http://www.nfxhlt.com" target="_blank" class="linkitem">�Ϸ��»�</a>
                    <a href="http://www.nfxhlt.com" target="_blank" class="linkitem">�Ϸ��»�</a>
                    <a href="http://www.nfxhlt.com" target="_blank" class="linkitem">�Ϸ��»�</a>
                    <a href="http://www.nfxhlt.com" target="_blank" class="linkitem">�Ϸ��»�</a>
                    <label style="float: right;">
                        <a href="/index.php?c=aboutus">��������</a>
                        <span class="shuxian">|</span>
                        <a href="/index.php?c=linkus">��ϵ����</a>
                        <span class="shuxian">|</span>
                        <a href="/article/">������Ѷ</a>
                    </label>
                </div>
                <div style="margin-top: 30px;">
                    <label>�������ߣ�<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</label>
                    <i class="hp_foot_bt_cr" style="margin-left: 50px;"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webrecord'];?>
</i></div>

                <!--<dl>-->
                <!--<dt>��������</dt>-->
                <!--<dd>-->
                <!--<ul>-->
                <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/index.php?c=aboutus">��������</a></li>-->
                <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/index.php?c=linkus">��ϵ����</a></li>-->
                <!--</ul>-->
                <!--</dd>-->
                <!--</dl>-->
                <!--<dl>-->
                <!--<dt>��������</dt>-->
                <!--<dd>-->
                <!--<ul>-->
                <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/job/">��нְλ</a></li>-->
                <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/resume/">�߶��˲�</a></li>-->
                <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/company/">������Ƹ</a></li>-->
                <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/article/">������Ѷ</a></li>-->
                <!--</ul>-->
                <!--</dd>-->
                <!--</dl>-->
                <!--<dl>-->
                <!--<dt>��ѯ����</dt>-->
                <!--<dd>-->
                <!--<ul>-->
                <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/index.php?m=announcement">��վ����</a></li>-->
                <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/index.php?m=advice">�������</a></li>-->
                <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/index.php?m=link">��������</a></li>-->
                <!--</ul>-->
                <!--</dd>-->
                <!--</dl>-->

                <div class="hp_foot_bt" style="background: none;padding-top: 0;">
                    <p><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webcopyright'];?>
</p>
                    <!--<p>��ַ:<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webadd'];?>
 �绰(Tel):<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
 EMAIL:<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webemail'];
echo $_smarty_tpl->tpl_vars['config']->value['sy_webtongji'];?>
</p>-->
                    <!--<p>Powered By <a target="_blank" href="http://www.phpyun.com">PHPYun.</a></p>-->

                </div>

            </div>
        </div>

        <div class="hp_foot_wx fr">
            <dl>
                <dt style="width: 99px;height: 99px;"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wx_qcode'];?>
"  width="90" height="90"></dt>
                <dd style="width: 99px;">�ٷ�΢��</dd>
            </dl>
        </div>
    </div>
    <div class="clear"></div>
    <div class="hp_foot_bt" style="display: none;">
        <p><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webcopyright'];?>
 <i class="hp_foot_bt_cr"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webrecord'];?>
</i></p>
        <p>��ַ:<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webadd'];?>
 �绰(Tel):<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
 EMAIL:<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webemail'];
echo $_smarty_tpl->tpl_vars['config']->value['sy_webtongji'];?>
</p>
        <!--<p>Powered By <a target="_blank" href="http://www.phpyun.com">PHPYun.</a></p>-->

    </div>
</div>
<div id="uclogin" style="display:none"></div>
<iframe id="supportiframe" name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
 <?php }} ?>
