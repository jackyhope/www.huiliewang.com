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
class achievement_controller extends common
{
	function set_search(){
		$search_list[]=array("param"=>"typezf","name"=>'֧������',"value"=>array("alipay"=>"֧����","tenpay"=>"�Ƹ�ͨ","bank"=>"����ת��"));
		$search_list[]=array("param"=>"typedd","name"=>'��������',"value"=>array("1"=>"�����Ա","2"=>"".$this->config['integral_pricename']."��ֵ","3"=>"����ת��","4"=>"����ֵ","5"=>"������ֵ��","10"=>"����ְλ�ö�","11"=>"���������Ƹ","12"=>"����ְλ�Ƽ�","13"=>"����ְλ�Զ�ˢ��","14"=>"�����ö�"));
		$search_list[]=array("param"=>"order_state","name"=>'����״̬',"value"=>array("0"=>"֧��ʧ��","1"=>"�ȴ�����","2"=>"֧���ɹ�","3"=>"�ȴ�ȷ��"));
		$lo_time=array('1'=>'����','3'=>'�������','7'=>'�������','15'=>'�������','30'=>'���һ����');
		$search_list[]=array("param"=>"time","name"=>'��ֵʱ��',"value"=>$lo_time);
		$this->yunset("search_list",$search_list);
	}
	function index_action(){
		$this->set_search();
		$where="identity=3";

		$urlarr['page']="{{page}}";
		$pageurl=Url($_GET['m'],$urlarr,'admin');
		$rows=$this->get_page("userid_job",$where,$pageurl,$this->config['sy_listnum']);
		include (APP_PATH."/config/db.data.php");
		if(is_array($rows)){
			foreach($rows as $k=>$v){
				$uids[]=$v['uid'];
				$eids[]=$v['eid'];
			}
			$lietou=$this->obj->DB_select_all("lietou","uid in (".@implode(",",$uids).")","`uid`,`name`");
            $resume=$this->obj->DB_select_all("resume_expect","id in (".@implode(",",$eids).")","`id`,`uname`");
			foreach($rows as $k=>$v){
				foreach($lietou as $val){

						if($v['uid']==$val['uid']){
							$rows[$k]['name']=$val['name'];
						}
				}


				foreach($resume as $val){
					if($v['eid']==$val['id']){
						$rows[$k]['uname']=$val['uname'];
					}
				}
			}
		}

        $this->yunset("get_type", $_GET);
		$this->yunset("rows",$rows);
		$this->yuntpl(array('admin/achievement'));
	}
	function edit_action(){
		$id=(int)$_GET['id'];
		$row=$this->obj->DB_select_once("company_order","`id`='".$id."'");	
		if(is_array($row)){	
			$member=$this->obj->DB_select_once('member',"`uid`='".$row['uid']."'","uid,username,usertype");	
			$row['username']=$member['username']; 
			
			if($member['usertype']=='1'){
				$resume=$this->obj->DB_select_once("resume","`uid`='".$member['uid']."'","`uid`,`name`");
				$row['comname']=$resume['name'];
			}else if($member['usertype']=='2'){
				$company=$this->obj->DB_select_once("company","`uid`='".$member['uid']."'","`uid`,`name`");
				$row['comname']=$company['name'];
			}
			$orderbank=@explode("@%",$row['order_bank']);
			if(is_array($orderbank)){
				foreach($orderbank as $key){
					$orderbank[]=$key;
				}
				$row['bankname']=$orderbank[0];
				$row['bankid']=$orderbank[1];
			} 
		}
		if($row['coupon']){
			$coupon=$this->obj->DB_select_once("coupon_list","`uid`='".$row[0]['uid']."' and `validity`>'".time()."' and `status`='1'");
			$row['price']=number_format($row['order_price'],2);
			$row['order_price']=number_format($row['order_price']-$coupon['coupon_amount'],2);
			$coupon['coupon_amount']=number_format($coupon['coupon_amount'],2);
			$this->yunset("coupon",$coupon);
		}
		$this->yunset("row",$row);
		$this->yuntpl(array('admin/admin_company_order_edit'));
	}
	function save_action(){
		if($_POST['coupon_amount']){
			$_POST['order_price']=$_POST['order_price']+$_POST['coupon_amount'];
		}
		if(is_uploaded_file($_FILES['order_pic']['tmp_name'])){
			$upload=$this->upload_pic("../data/upload/order/");
			$pictures=$upload->picture($_FILES['order_pic']);
			$this->picmsg($pictures,$_SERVER['HTTP_REFERER']);
			$pictures = str_replace("../data/upload/order","./data/upload/order",$pictures);
		}else{
			$order=$this->obj->DB_select_once("company_order","`id`='".(int)$_POST['id']."'");		
			$pictures=$order['order_pic'];
		}
		$r_id=$this->obj->DB_update_all("company_order","`order_price`='".$_POST['order_price']."',`order_remark`='".$_POST['order_remark']."',`is_invoice`='".$_POST['is_invoice']."',`order_pic`='".$pictures."'","id='".$_POST['id']."'");
		isset($r_id)?$this->ACT_layer_msg("��ֵ��¼(ID:".$_POST['id'].")�޸ĳɹ���",9,"index.php?m=company_order",2,1):$this->ACT_layer_msg("�޸�ʧ��,���������ԣ�",8,"index.php?m=company_order");
	}
	function setpay_action(){
		$del=(int)$_GET['id'];
		$this->check_token();
		$row=$this->obj->DB_select_once("company_order","`id`='$del'");
		if($row['order_state']=='1'||$row['order_state']=='3'){
			$nid=$this->upuser_statis($row);
			isset($nid)?$this->layer_msg("��ֵ��¼(ID:".$del.")ȷ�ϳɹ���",9,0,$_SERVER['HTTP_REFERER']):$this->layer_msg("ȷ��ʧ��,���Ժ����ԣ�",8,0,$_SERVER['HTTP_REFERER']);
		}else{
			$this->layer_msg("������ȷ�ϣ������ظ�������",8,0,$_SERVER['HTTP_REFERER']);
		}
	}
	function del_action(){
		$this->check_token();
	    if($_GET['del']){
	    	$del=$_GET['del'];
	    	if(is_array($del)){
				$company_order=$this->obj->DB_select_all("company_order","`id` in(".@implode(',',$del).")","`order_id`");
				if($company_order&&is_array($company_order)){
					foreach($company_order as $val){
						$order_ids[]=$val['order_id'];
					}
					$this->obj->DB_delete_all("invoice_record","`order_id` in(".@implode(',',$order_ids).")","");
					$this->obj->DB_delete_all("company_order","`id` in(".@implode(',',$del).")","");
				}
				$this->layer_msg( "��ֵ��¼(ID:".@implode(',',$del).")ɾ���ɹ���",9,1,$_SERVER['HTTP_REFERER']);
	    	}else{
				$this->layer_msg( "��ѡ����Ҫɾ������Ϣ��",8,1,$_SERVER['HTTP_REFERER']);
	    	}
	    }
	    if(isset($_GET['id'])){
			$company_order=$this->obj->DB_select_once("company_order","`id`='".$_GET['id']."'" ,"`order_id`");
			$this->obj->DB_delete_all("invoice_record","`order_id`='".$company_order['order_id']."'" );
			$result=$this->obj->DB_delete_all("company_order","`id`='".$_GET['id']."'" );
			isset($result)?$this->layer_msg('��ֵ��¼(ID:'.$_GET['id'].')ɾ���ɹ���',9,0,$_SERVER['HTTP_REFERER']):$this->layer_msg('ɾ��ʧ�ܣ�',8,0,$_SERVER['HTTP_REFERER']);
		}else{
			$this->ACT_layer_msg("�Ƿ�������",8,$_SERVER['HTTP_REFERER']);
		}
	}
}
?>