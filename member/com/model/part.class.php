<?php
/* *
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2016 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ���������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
*/
class part_controller extends company{
	function index_action(){
		include PLUS_PATH."part.cache.php";
		if(trim($_GET['keyword'])){
			$where.=" and name like '%".trim($_GET['keyword'])."%'";
			$urlarr['keyword']=trim($_GET['keyword']);
		}
		$urlarr['c']=$_GET['c'];
		$urlarr["page"]="{{page}}";
		$pageurl=Url('member',$urlarr);
		$rows=$this->get_page("partjob","`uid`='".$this->uid."'".$where,$pageurl,"10");
		if(is_array($rows)){
			foreach($rows as $k=>$v){
				$rows[$k]['salary_type']=$partclass_name[$v['salary_type']];
				$rows[$k]['type']=$partclass_name[$v['type']];
			}
		}
		$this->public_action();
		$this->yunset("rows",$rows);
		$this->company_satic();
		$this->yunset("js_def",3);
		$this->com_tpl('partlist');
	}
	function del_action(){
		if($_GET['del']||$_GET['id']){
			if(is_array($_GET['del'])){
				$del=@implode(",",$_GET['del']);
				$layer_type=1;
			}else{
				$del=(int)$_GET['id'];
				$layer_type=0;
			}
		}
		$oid=$this->obj->DB_delete_all("partjob","`id` in (".$del.") and `uid`='".$this->uid."'","");
		if($oid){
			$this->obj->DB_delete_all("part_collect","`jobid` in (".$del.") and `comid`='".$this->uid."'","");
			$this->obj->DB_delete_all("part_apply","`jobid` in (".$del.") and `comid`='".$this->uid."'","");
			$this->obj->member_log("ɾ����ְְλ");
			$this->layer_msg('ɾ���ɹ���',9,$layer_type,$_SERVER['HTTP_REFERER']);
		}else{
			$this->layer_msg('ɾ��ʧ�ܣ�',8,$layer_type,$_SERVER['HTTP_REFERER']);
		}
	}
	function opera_action(){
		$this->part();
	}

	function ajax_refresh_part_action()
	{
		if(!isset($_POST['partid'])){
			exit;
		}

		$partid = $_POST['partid'];
		
		$statis = $this->company_satic();

		$msg = '';

		if( $statis['vip_etime'] >time() || $statis['vip_etime'] ==0 ){
        	if( $statis['rating_type'] == 1 ){
            	if( $statis['breakpart_num'] > 0 ){
            		$msg = 'ˢ�¼�ְ����ʣ��' . $statis['breakpart_num'] . '����ȷ��ˢ�£�';
            		$data['url'] = 'index.php?c=partok&act=opera&up=' . $partid;

            		$data['status'] = 1;
        		}           	
				else{
              		if( $this->config['com_integral_online'] ==1 ){
						if( $this->config['integral_partjobefresh'] > 0 ){
							$msg = '����ˢ����۳�' . $this->config['integral_partjobefresh'] 
								. $this->config['integral_priceunit'] . $this->config['integral_pricename']
								. '��ȷ��ˢ�£�';
							$data['url'] = 'index.php?c=partok&act=opera&up=' . $partid;

							$data['status'] = 1;
						}
						else{
							$msg = 'ȷ��Ҫˢ�£�';
							$data['url'] = 'index.php?c=partok&act=opera&up=' . $partid;

							$data['status'] = 1;
						}
					}
			  		else{
			   			$msg = 'ˢ�´��������꣬�Ƿ��ȹ�����Ȩ��';
			   			$data['url'] = 'index.php?c=right';

			   			$data['status'] = 3;
			 	 	}
			 	}
			}
			else{
				$msg = 'ȷ��ˢ�¸ü�ְô��';
				$data['url'] = 'index.php?c=partok&act=opera&up=' . $partid;

				$data['status'] = 1;
		    }
	    }
        else{
            if( $this->config['com_integral_online'] ==1 ){
				$msg = '����ˢ����۳�' . $this->config['integral_partjobefresh'] 
					. $this->config['integral_priceunit'] . $this->config['integral_pricename']
					. '��ȷ��ˢ�£�';
				$data['url'] = 'index.php?c=partok&act=opera&up=' . $partid;

				$data['status'] = 1;
		    }
		    else{
	   			$msg = 'ˢ�´��������꣬�Ƿ��ȹ�����Ȩ��';
	   			$data['url'] = 'index.php?c=right';

	   			$data['status'] = 3;
		    }
	    }

		
		$data['msg'] = iconv("gbk", "utf-8", $msg);
		echo json_encode($data);
		exit;
	}
}
?>