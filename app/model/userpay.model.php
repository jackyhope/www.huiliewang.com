<?php
/*
 * $Author ��PHPYUN�����Ŷ�
 *
 * ����: http://www.phpyun.com
 *
 * ��Ȩ���� 2009-2017 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
 *
 * ���������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
 */
class userpay_model extends model{

	function buyZdresume($data){
		
		if($data['resumeid'] && $data['days']){
			
			$resumeid = $data['resumeid'];
 			$days=intval($data['days']);
 			
 			if($days>0 && $resumeid){
 				
				$resume= $this->DB_select_once("resume_expect","`uid`='".$this->uid."' and `id` ='".$resumeid."'");
				if(empty($resume)){
					$return['error'] = '��ѡ����ȷ�ļ����ö���';
				}else {
					$price = ceil($days * $this->config['integral_resume_top']); 
					$price = sprintf("%.2f", $price);
						
 					if ($price < 1){
						$return['error'] = '�����ܽ���С��1Ԫ��';
					} else {

						$dingdan=time().rand(10000,99999);
						$orderData['type']='14';
						$orderData['order_id']=$dingdan;
						$orderData['order_price']=$price;
						$orderData['order_time']=time();
						$orderData['order_state']="1";
						$orderData['order_remark']='�����ö�';
						$orderData['uid']=$this->uid;
						$orderData['did']=$this->userdid;
						$orderData['order_info']=serialize(array('resumeid'=>$data['resumeid'],'days'=>$data['days'],'price'=>$price));
						$id=$this->insert_into("company_order",$orderData);
						 
 						if($id){
 							$orderData['id']=$id;
 							$return['order']=$orderData;
						}else{
							$return['error'] = '��������ʧ�ܣ�';
						}
					}
				}
 			}else{
				$return['error'] = '����ȷѡ������ö��Լ��ö���������';
			}
			 
		} else {
			$return['error'] = '������д�������������ã�';
		}

		return $return;
	}
	
	
	
	 
}
?>