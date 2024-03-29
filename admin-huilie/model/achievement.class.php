<?php
/*
* $Author ：PHPYUN开发团队
*
* 官网: http://www.phpyun.com
*
* 版权所有 2009-2016 宿迁鑫潮信息技术有限公司，并保留所有权利。
*
* 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
 */
class achievement_controller extends common
{
	function set_search(){
		$search_list[]=array("param"=>"typezf","name"=>'支付类型',"value"=>array("alipay"=>"支付宝","tenpay"=>"财富通","bank"=>"银行转帐"));
		$search_list[]=array("param"=>"typedd","name"=>'订单类型',"value"=>array("1"=>"购买会员","2"=>"".$this->config['integral_pricename']."充值","3"=>"银行转帐","4"=>"金额充值","5"=>"购买增值包","10"=>"购买职位置顶","11"=>"购买紧急招聘","12"=>"购买职位推荐","13"=>"购买职位自动刷新","14"=>"简历置顶"));
		$search_list[]=array("param"=>"order_state","name"=>'订单状态',"value"=>array("0"=>"支付失败","1"=>"等待付款","2"=>"支付成功","3"=>"等待确认"));
		$lo_time=array('1'=>'今天','3'=>'最近三天','7'=>'最近七天','15'=>'最近半月','30'=>'最近一个月');
		$search_list[]=array("param"=>"time","name"=>'充值时间',"value"=>$lo_time);
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
		isset($r_id)?$this->ACT_layer_msg("充值记录(ID:".$_POST['id'].")修改成功！",9,"index.php?m=company_order",2,1):$this->ACT_layer_msg("修改失败,请销后再试！",8,"index.php?m=company_order");
	}
	function setpay_action(){
		$del=(int)$_GET['id'];
		$this->check_token();
		$row=$this->obj->DB_select_once("company_order","`id`='$del'");
		if($row['order_state']=='1'||$row['order_state']=='3'){
			$nid=$this->upuser_statis($row);
			isset($nid)?$this->layer_msg("充值记录(ID:".$del.")确认成功！",9,0,$_SERVER['HTTP_REFERER']):$this->layer_msg("确认失败,请稍后再试！",8,0,$_SERVER['HTTP_REFERER']);
		}else{
			$this->layer_msg("订单已确认，请勿重复操作！",8,0,$_SERVER['HTTP_REFERER']);
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
				$this->layer_msg( "充值记录(ID:".@implode(',',$del).")删除成功！",9,1,$_SERVER['HTTP_REFERER']);
	    	}else{
				$this->layer_msg( "请选择您要删除的信息！",8,1,$_SERVER['HTTP_REFERER']);
	    	}
	    }
	    if(isset($_GET['id'])){
			$company_order=$this->obj->DB_select_once("company_order","`id`='".$_GET['id']."'" ,"`order_id`");
			$this->obj->DB_delete_all("invoice_record","`order_id`='".$company_order['order_id']."'" );
			$result=$this->obj->DB_delete_all("company_order","`id`='".$_GET['id']."'" );
			isset($result)?$this->layer_msg('充值记录(ID:'.$_GET['id'].')删除成功！',9,0,$_SERVER['HTTP_REFERER']):$this->layer_msg('删除失败！',8,0,$_SERVER['HTTP_REFERER']);
		}else{
			$this->ACT_layer_msg("非法操作！",8,$_SERVER['HTTP_REFERER']);
		}
	}
}
?>