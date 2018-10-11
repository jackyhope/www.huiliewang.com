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
class compay_model extends model{

	
	function buyAutoJob($data){
		if($data['jobautoids'] && ($data['rdays'] || $data['crdays'])){

			$jobautoids=@explode(',',$data['jobautoids']);
			$jobautoids = pylode(',',$jobautoids);

			
			$autodays= intval($data['crdays']);
			if($autodays < 1){
				$autodays= intval($_POST['rdays']);
			}
			$autotype = 1; 

			if($autodays > 0 && $jobautoids){

				
				$jobs = $this->DB_select_all("company_job","`uid`='".$this->uid."' and `id` in(".$jobautoids.")","`autotime`,`id`");

				if(empty($jobs)){
					$return['error'] = '��ѡ����ȷ��ˢ��ְλ��';
				}else {
					$jobnum = $this->DB_select_num("company_job","`uid`='".$this->uid."' and `id` in(".$jobautoids.")");
						
					
					$price = ceil($autodays * $this->config['job_auto'] * $jobnum);
					$price = sprintf("%.2f", $price);
						
					if ($price < 1){
						$return['error'] = '�����ܽ���С��1Ԫ��';
					} else {

						
						$dingdan=time().rand(10000,99999);
						$orderData['type']='13';
						$orderData['order_id']=$dingdan;
						$orderData['order_price']=$price;
						$orderData['order_time']=time();
						$orderData['order_state']="1";
						$orderData['order_remark']='�Զ�ˢ��';
						$orderData['uid']=$this->uid;
						$orderData['did']=$this->userdid;
						$orderData['order_info']=serialize(array('jobid'=>$data['jobautoids'],'days'=>$data['crdays']?$data['crdays']:$data['rdays'],'price'=>$price));
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
				$return['error'] = '����ȷѡ���Զ�ˢ��ְλ�Լ�ˢ��������';
			}

		} else {
			
			$return['error'] = '������д�������������ã�';
			
		}

		return $return;
	}
	
	
	function buyZdJob($data){
		if($data['zdjobid'] && ($data['xsdays'] || $data['cxsdays'])){
			
			$jobid = $data['zdjobid'];
		
 			$xsdays=intval($data['xsdays']);
 			if($xsdays==''&&$data['cxsdays']){
			    $xsdays=intval($data['cxsdays']);
			}
			if($xsdays<1){
				$xsdays=1;
			}
  			if($xsdays > 0 && $jobid){

				
				$job = $this->DB_select_once("company_job","`uid`='".$this->uid."' and `id` ='".$jobid."'");

				if(empty($job)){
					
					$return['error'] = '��ѡ����ȷ��ְλ�ö���';
					
				}else {
					
					$price = ceil($xsdays * $this->config['integral_job_top']);
					$price = sprintf("%.2f", $price);
						
 					if ($price < 1){
 						
						$return['error'] = '�����ܽ���С��1Ԫ��';
						
					} else {

						
						$dingdan=time().rand(10000,99999);
						$orderData['type']='10';
						$orderData['order_id']=$dingdan;
						$orderData['order_price']=$price;
						$orderData['order_time']=time();
						$orderData['order_state']="1";
						$orderData['order_remark']='�ö�����';
						$orderData['uid']=$this->uid;
						$orderData['did']=$this->userdid;
						$orderData['order_info']=serialize(array('jobid'=>$data['zdjobid'],'days'=>$data['cxsdays']?$data['cxsdays']:$data['xsdays'],'price'=>$price));
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
				
				$return['error'] = '����ȷѡ��ְλ�ö��Լ��ö���������';
				
			}

		} else {
			
			$return['error'] = '������д�������������ã�';
			
		}
		return $return;
	}
	
	
	function buyRecJob($data){
		if($data['recjobid'] && ($data['recdays'] || $data['crecdays'])){
			
 			$jobid = $data['recjobid'];
		
 			$recdays=intval($data['recdays']);
 			if($recdays==''&&$data['crecdays']){
			    $recdays=intval($data['crecdays']);
			}
			if($recdays<1){
				$recdays=1;
			}
  			if($recdays > 0 && $jobid){

				
				$job = $this->DB_select_once("company_job","`uid`='".$this->uid."' and `id` ='".$jobid."'");

				if(empty($job)){
					$return['error'] = '��ѡ����ȷ��ְλ�Ƽ���';
				}else {
				
					$price = ceil($recdays * $this->config['com_recjob']);
					$price = sprintf("%.2f", $price);
						
 					if ($price < 1){
						$return['error'] = '�����ܽ���С��1Ԫ��';
					} else {
						
					
						$dingdan=time().rand(10000,99999);
						$orderData['type']='12';
						$orderData['order_id']=$dingdan;
						$orderData['order_price']=$price;
						$orderData['order_time']=time();
						$orderData['order_state']="1";
						$orderData['order_remark']='ְλ�Ƽ�';
						$orderData['uid']=$this->uid;
						$orderData['did']=$this->userdid;
						$orderData['order_info']=serialize(array('jobid'=>$data['recjobid'],'days'=>$data['crecdays']?$data['crecdays']:$data['recdays'],'price'=>$price));
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
				$return['error'] = '����ȷѡ��ְλ�Ƽ��Լ��Ƽ���ʱ����';
			}

		} else {
			$return['error'] = '������д�������������ã�';
		}

		return $return;
	}
	

	function buyUrgentJob($data){
		if($data['ujobid'] && ($data['udays'] || $data['cudays'])){
			
			$jobid = $data['ujobid'];
			
 			$udays=intval($data['udays']);
 			if($udays==''&&$data['cudays']){
			    $udays=intval($data['cudays']);
			}
			if($udays<1){
				$udays=1;
			}
  			if($udays > 0 && $jobid){

				
				$job = $this->DB_select_once("company_job","`uid`='".$this->uid."' and `id` ='".$jobid."'");

				if(empty($job)){
					$return['error'] = '��ѡ����ȷ��ְλ��';
				}else {
				
					$price = ceil($udays * $this->config['com_urgent']);
					$price = sprintf("%.2f", $price);
						
 					if ($price < 1){
						$return['error'] = '�����ܽ���С��1Ԫ��';
					} else {

					
						$dingdan=time().rand(10000,99999);
						$orderData['type']='11';
						$orderData['order_id']=$dingdan;
						$orderData['order_price']=$price;
						$orderData['order_time']=time();
						$orderData['order_state']="1";
						$orderData['order_remark']='������Ƹ';
						$orderData['uid']=$this->uid;
						$orderData['did']=$this->userdid;
						$orderData['order_info']=serialize(array('jobid'=>$data['ujobid'],'days'=>$data['cudays']?$data['cudays']:$data['udays'],'price'=>$price));
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
				$return['error'] = '����ȷѡ��ְλ�Լ�������Ƹ������';
			}

		} else {
			$return['error'] = '������д�������������ã�';
		}

		return $return;
	}
	
	
	
	function buyPackOrder($data){
		if($data['id'] && $data['price']){

			$price = sprintf("%.2f", $data['price']);
			$rating = (int)$data['id'];
			if($price > 0){

				
				$packinfo = $this->DB_select_once("company_service_detail","`id`='".$data['id']."'");
				if(empty($packinfo)){
					$return['error'] = '��ѡ����ȷ����ֵ�ײͣ�';
				}else {
				
					$dingdan=time().rand(10000,99999);
					$orderData['type']='5';
					$orderData['order_id']=$dingdan;
					$orderData['order_price']=$price;
					$orderData['order_time']=time();
					$orderData['order_state']="1";
					$orderData['rating']=$rating;
					$orderData['order_remark']='������ֵ����';
					$orderData['uid']=$this->uid;
					$orderData['did']=$this->userdid;
					$id=$this->insert_into("company_order",$orderData);

					if($id){
						$orderData['id']=$id;
						$return['order']=$orderData;
					}else{
						$return['error'] = '��������ʧ�ܣ�';
					}
				}
			}else{
				$return['error'] = '�ײͽ�����';
			}
		}else{

			$return['error'] = '��������������ѡ��';
		}
		return $return;
	}
}
?>