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


class ApiPay extends common{
	function payAll($dingdan,$total_fee,$paytype=''){

	
		if(!preg_match('/^[0-9]+$/', $dingdan)){

			die;
		}

	
		$order=$this->obj->DB_select_once("company_order","`order_id`='$dingdan'");

	
		if($order['order_state']!='2' && $order['id']){

			$member=$this->obj->DB_select_once("member","`uid`='".$order['uid']."'","`usertype`,`username`,`wxid`");

			if($member['usertype']=='1'){
				$table='member_statis';
				$marr=$this->obj->DB_select_once("resume","`uid`='".$order['uid']."'","`name`,`email`,`telphone`as `moblie`");
			}else if($member['usertype']=='2'){
                //07-29-
				//$table='company_statis';
				//$tvalue=",`all_pay`=`all_pay`+'".$order["order_price"]."'";
				//$marr=$this->obj->DB_select_once("company","`uid`='".$order['uid']."'","`name`,`linkmail` as `email`,`linktel` as `moblie`");
				$table='company';
				$tvalue=",`all_pay`=`all_pay`+'".$order["order_price"]."'";
				$marr=$this->obj->DB_select_once("company","`uid`='".$order['uid']."'","`name`,`linkmail` as `email`,`linktel` as `moblie`");

			}else if($member['usertype']=='3'){
                $table='lietou_statis';
                $tvalue=",`all_pay`=`all_pay`+'".$order["order_price"]."'";
                $marr=$this->obj->DB_select_once("lietou","`uid`='".$order['uid']."'","`name`,`linkmail` as `email`,`linktel` as `moblie`");
            }

			$emaildata['type']="recharge";
			$emaildata['username']=$member['username'];
			$emaildata['name']=$marr['name'];
			$emaildata['price']=$order['order_price'];
			$emaildata['time']=date("Y-m-d H:i:s");
			$emaildata['email']=$marr['email'];
			$emaildata['moblie']=$marr['moblie'];

			$sendInfo['wxid'] = $member['wxid'];
			$sendInfo['first'] = '����һ�ʶ���֧���ɹ���';
			$sendInfo['username'] = $member['username'];
			$sendInfo['order'] = $order['order_id'];
			$sendInfo['price'] = $order['order_price'];
			$sendInfo['time'] = date('Y-m-d H:i:s');
			switch($paytype){
					
				case 'alipay':$sendInfo['paytype']='֧����';
				break;
				case 'wxpay':$sendInfo['paytype']='΢��֧��';
				break;
				case 'wapalipay':$sendInfo['paytype']='֧�����ֻ�֧��';
				break;
				case 'tenpay':$sendInfo['paytype']='�Ƹ�ͨ';
				break;
				default :$sendInfo['paytype']='����֧����ʽ';

				break;

			}


            if($order['type']=='233' && $order['job_type']>0){
                switch (intval($order['job_type'])){
                    case 1:
                        $field = 'resume_payd';
                        break;
                    case 2:
                        $field = 'resume_payd_high';
                        break;
                }
                //���߹���۹�ͨ
                $nid=$this->obj->DB_update_all('company',$field."=".$field."+".$order[$field],"`uid`='".$order['uid']."'");

                if($nid){
                    $this->obj->DB_insert_once("company_pay","`order_id`='".$order['order_id']."',`order_price`='".$order['order_price']."',`pay_time`='".time()."',`pay_state`='2',`com_id`='".$order["uid"]."',`pay_remark`='".$order["order_remark"]."',`type`='1',`pay_type`='2',`did`='".$this->config['did']."'");
                    $sendMail = 1;
                }

                $sendInfo['info'] = $order["order_remark"].':'.$order[$field].'��';
            }elseif($order['type']=='1' && $order['rating'] && $member['usertype']!='1'){


				$row=$this->obj->DB_select_once("company_rating","`id`='".$order['rating']."'");
			
				$sendInfo['info'] = '����'.$row['name'];

				$ratingM = $this->MODEL('rating');
				$value=$ratingM->rating_info($order['rating'],$order['uid']);
				$nid=$this->obj->DB_update_all($table,$value,"`uid`='".$order['uid']."'");

				$sendMail = 1;
			}else if($order['type']=='2' && $order['integral']){
				//$nid=$this->obj->DB_update_all($table,"`integral`=`integral`+'".$order['integral']."'".$tvalue,"`uid`='".$order['uid']."'");
				$nid=$this->obj->DB_update_all($table,"`c_money`=`c_money`+'".$order['integral']."'".$tvalue,"`uid`='".$order['uid']."'");

				if($nid){
					$this->obj->DB_insert_once("company_pay","`order_id`='".$order['order_id']."',`order_price`='".$order['integral']."',`pay_time`='".time()."',`pay_state`='2',`com_id`='".$order["uid"]."',`pay_remark`='"."����".$this->config['integral_pricename']."',`type`='1',`pay_type`='2',`did`='".$this->config['did']."'");
					$sendMail = 1;
				}
				
				$sendInfo['info'] = '��ֵ'.$this->config['integral_pricename'].'��'.$order['integral'];

			}else if($order['type']=='5'){
				$value='';
				if($member['usertype']=='2'){
					$row=$this->obj->DB_select_once("company_service_detail","`id`='".$order['rating']."'");
					$value.="`job_num`=`job_num`+'".$row['job_num']."',";
					$value.="`down_resume`=`down_resume`+'".$row['resume']."',";
					$value.="`invite_resume`=`invite_resume`+'".$row['interview']."',";
					$value.="`breakjob_num`=`breakjob_num`+'".$row['breakjob_num']."',";
					$value.="`part_num`=`part_num`+'".$row['part_num']."',";
					$value.="`breakpart_num`=`breakpart_num`+'".$row['breakpart_num']."',";
					$value.="`all_pay`=`all_pay`+'".$order["order_price"]."'";
				}elseif ($member['usertype']=='3'){
                    $row=$this->obj->DB_select_once("lietou_service_detail","`id`='".$order['rating']."'");
                    $value.="`job_num`=`job_num`+'".$row['job_num']."',";
                    $value.="`down_resume`=`down_resume`+'".$row['resume']."',";
                    $value.="`invite_resume`=`invite_resume`+'".$row['interview']."',";
                    $value.="`breakjob_num`=`breakjob_num`+'".$row['breakjob_num']."',";
                    $value.="`part_num`=`part_num`+'".$row['part_num']."',";
                    $value.="`breakpart_num`=`breakpart_num`+'".$row['breakpart_num']."',";
                    $value.="`all_pay`=`all_pay`+'".$order["order_price"]."'";
                }

				$nid=$this->obj->DB_update_all($table,$value,"`uid`='".$order['uid']."'");
				$sendMail = 1;
				
				$sendInfo['info'] = '������ֵ����'.$row['name'];
			}else if($order['type']=='10'){
				
				$order_info = unserialize($order['order_info']);

				if($order_info['jobid']){
					
					$xsJob = $this->obj->DB_select_once("company_job","`uid`='".$order['uid']."' AND `id` = '".$order_info['jobid']."'","`xsdate`,`id`");
					if(!empty($xsJob)){
						if ($xsjob['xsdate'] > time()){
							$xsdate = $xsjob['xsdate']+$order_info['days']*86400;
						}else {
							$xsdate = strtotime("+".$order_info['days']." day");
						}
						$nid=$this->obj->update_once("company_job",array('xsdate'=>$xsdate),"`uid`='".$order['uid']."' and `id`='".$order_info['jobid']."'");
	 					$this->obj->member_log("����ְλ�ö�");
					}
 				}

				$sendInfo['info'] = 'ְλ�ö�';
			}
			else if($order['type']=='11'){
			
				$order_info = unserialize($order['order_info']);

				if($order_info['jobid']){
					
					$uJob = $this->obj->DB_select_once("company_job","`uid`='".$order['uid']."' AND `id` = '".$order_info['jobid']."'","`urgent_time`,`id`");
					if(!empty($uJob)){
						if ($uJob ['urgent_time'] > time()){
							$urgent_time = $uJob['urgent_time']+$order_info['days']*86400;
						}else {
							$urgent_time = time() + $order_info['days'] * 86400;
						}
						$nid=$this->obj->update_once("company_job",array('urgent_time'=>$urgent_time,'urgent'=>'1'),"`uid`='".$order['uid']."' and `id`='".$order_info['jobid']."'");
	 					$this->obj->member_log("���������Ƹ");
					}
 				}
				
 				$sendInfo['info'] = 'ְλ����';
				
			}else if($order['type']=='12'){
				
				
				$order_info = unserialize($order['order_info']);

				if($order_info['jobid']){
					
					$recJob = $this->obj->DB_select_once("company_job","`uid`='".$order['uid']."' AND `id` = '".$order_info['jobid']."'","`rec_time`,`id`");
					if(!empty($recJob)){
						if ($recJob ['rec_time'] > time()){
							$rec_time = $recJob['rec_time']+$order_info['days']*86400;
						}else {
							$rec_time = time() + $order_info['days'] * 86400;
						}
						$nid=$this->obj->update_once("company_job",array('rec_time'=>$rec_time,'rec'=>'1'),"`uid`='".$order['uid']."' and `id`='".$order_info['jobid']."'");
	 					$this->obj->member_log("����ְλ�Ƽ�");
					}
 				}
 				
				$sendInfo['info'] = 'ְλ�Ƽ�';
			}else if($order['type']=='13'){
				
				$order_info = unserialize($order['order_info']);

				if($order_info['jobid']){
					
					$autoJob = $this->obj->DB_select_all("company_job","`uid`='".$order['uid']."' AND `id`in (".$order_info['jobid'].")","`autotime`,`id`");
						
					if(!empty($autoJob)){
						
						$lastautotime=0;
						
						foreach ($autoJob as $v){
	
							if ($v['autotime'] >= time()) {
								$autotime = $v['autotime'] + $order_info['days']*86400;
							} else {
								$autotime = time() + $order_info['days']*86400;
							}
							
							if ($autotime > $lastautotime) {
								$lastautotime = $autotime;
							}
							
							$nid=$this->obj->update_once('company_job',array('autotime'=>$autotime,'autotype'=>'1'),"`uid`='".$order['uid']."' and `id`='".$v['id']."'");
						
						}
						
						$this->obj->update_once('company_statis',array('autotime'=>$lastautotime),array('uid'=>$order['uid']));
						$this->obj->member_log("����ְλ�Զ�ˢ�¹���");
					}
					
 				}

				$sendInfo['info'] = 'ְλˢ��';
			}else if($order['type']=='14'){
				
			
				$order_info = unserialize($order['order_info']);

				if($order_info['resumeid']){
				
					$zdResume = $this->obj->DB_select_once("resume_expect","`uid`='".$order['uid']."' AND `id` = '".$order_info['resumeid']."'","`topdate`,`id`");
					if(!empty($zdResume)){
						if ($zdResume ['topdate'] > time()){
							$topdate = $zdResume['topdate']+$order_info['days']*86400;
						}else {
							$topdate = time() + $order_info['days'] * 86400;
						}
						$nid=$this->obj->update_once("resume_expect",array('topdate'=>$topdate,'top'=>'1'),"`uid`='".$order['uid']."' and `id`='".$order_info['resumeid']."'");
	 					$this->obj->member_log("��������ö�");
					}
					
 				}
 				
				$sendInfo['info'] = '�����ö�';
			}
			if($nid){
				
				$this->obj->DB_update_all("company_order","`order_state`='2',`order_type`='".$paytype."'","`id`='".$order['id']."'");

				$Weixin=$this->MODEL('weixin');
				$Weixin->sendWxPay($sendInfo);


				if($sendMail==1){
					$this->send_msg_email($emaildata);
				}
			}
		}
	}
}

?>