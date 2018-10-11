<?php
/*
 * $Author ��PHPYUN�����Ŷ�
 *
 * ����: http://www.phpyun.com
 *
 * ��Ȩ���� 2009-2016 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
 *
 * ���������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
 */
function wxOrder($data=array()){
	
	
	require_once APP_PATH."api/wxpay/lib/WxPay.Api.php";
	require_once APP_PATH."api/wxpay/WxPay.NativePay.php";

	$notify = new NativePay();
	
	$input = new WxPayUnifiedOrder();
	$input->SetBody($data['body']);
	$input->SetOut_trade_no($data['id']);
	$input->SetTotal_fee($data['total_fee']*100);
	$input->SetTime_start(date("YmdHis"));
	$input->SetTime_expire(date("YmdHis", time() + 600));
	$input->SetNotify_url($data['url']."/api/wxpay/notify.php");
	$input->SetTrade_type("NATIVE");
	$input->SetProduct_id($data['id']);
	$result = $notify->GetPayUrl($input);
	$url = $result["code_url"];
	return $url;
}


function wxWapOrder($data=array()){
	
	require_once APP_PATH."api/wxpay/lib/WxPay.Api.php";
	require_once APP_PATH."api/wxpay/WxPay.JsApiPay.php";

	$tools = new JsApiPay();

	$openId = $tools->GetOpenid();
	
	if(!$openId){
		return false;
	}
	$input = new WxPayUnifiedOrder();


	$input = new WxPayUnifiedOrder();
	$input->SetBody($data['body']);
	$input->SetOut_trade_no($data['id']);
	$input->SetTotal_fee($data['total_fee']*100);
	$input->SetTime_start(date("YmdHis"));
	$input->SetTime_expire(date("YmdHis", time() + 600));
	$input->SetNotify_url($data['url']."/api/wxpay/notify.php");
	$input->SetTrade_type("JSAPI");
	$input->SetOpenid($openId);
	$order = WxPayApi::unifiedOrder($input);
	$jsApiParameters = $tools->GetJsApiParameters($order);
	
	return $jsApiParameters;
}
function wxWapOrderMweb($data=array()){
	
	require_once APP_PATH."api/wxpay/lib/WxPay.Api.php";
	require_once APP_PATH."api/wxpay/WxPay.JsApiPay.php";

	$tools = new JsApiPay();

	
	$input = new WxPayUnifiedOrder();


	$input = new WxPayUnifiedOrder();
	$input->SetBody($data['body']);
	$input->SetOut_trade_no($data['id']);
	$input->SetTotal_fee($data['total_fee']*100);
	$input->SetTime_start(date("YmdHis"));
	$input->SetTime_expire(date("YmdHis", time() + 600));
	$input->SetNotify_url($data['url']."/api/wxpay/notify.php");
	$input->SetTrade_type("MWEB");
	
	$order = WxPayApi::unifiedOrder($input);
	
	
	return $order;
}

?>