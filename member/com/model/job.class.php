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
class job_controller extends company{
	function index_action(){
		$this->public_action();
		$urlarr=array("c"=>"job","page"=>"{{page}}");
		$where="`uid`='".$this->uid."' ";
		if($_GET['keyword']){
			$where .= " and `name` like '%".trim($_GET['keyword'])."%'";
			$urlarr['keyword']=$_GET['keyword'];
		}
		if($_GET['w']==4){
			$where .= " and `status`='1'";
			$urlarr['w']=$_GET['w'];
		}elseif($_GET["w"]==2){
			$where .= " and `edate`<'".time()."'";
			$urlarr['w']=2;
		}elseif($_GET["w"]==1){
			$where .= "  and `status`='0' and `state`='1'";
			$urlarr['w']=1;
		}elseif($_GET["w"]==5){
			$where .= "  and 1";
			$urlarr['w']=5;
		}else{
			$where .= " and `state`='".$_GET['w']."'";
			$urlarr['w']=$_GET['w'];
		}
		$pageurl=Url('member',$urlarr);
		$rows=$this->get_page("company_job",$where,$pageurl,'10');
		if(is_array($rows) && !empty($rows)){
			$jobids=array();
			foreach($rows as $v){
				$jobids[]=$v['id'];
			}
			$jobnum=$this->obj->DB_select_all("userid_job","`job_id` in(".pylode(',',$jobids).") and `com_id`='".$this->uid."' and display=1 GROUP BY `job_id`","`job_id`,count(`id`) as `num`");
			foreach($rows as $k=>$v){
				if($v['autotime']>time()){
					$rows[$k]['autodate']=date("Y-m-d",$v['autotime']);
				}
				if($v['xsdate']>time()){
					$rows[$k]['xs']=1;
				}
				$rows[$k]['jobnum']=0;
				foreach($jobnum as $val){
					if($v['id']==$val['job_id']){
						$rows[$k]['jobnum']=$val['num'];
					}
				}
				$rows[$k]['type']=1;
			}
		}
		
		$maxfen=$this->obj->DB_select_once("company_job","`state`='1' and `sdate`<'".mktime()."' and `r_status`<>'2' and `edate`>'".mktime()."' order by `xuanshang` desc",'xuanshang');
		$urgent=$this->config['com_urgent'];
			
		$audit=$this->obj->DB_select_num("company_job","`uid`='".$this->uid."' and `state`=0");
		$this->yunset("audit",$audit);
		$this->yunset("rows",$rows);
		$this->yunset("urgent",$urgent);
		$this->yunset("maxfen",$maxfen);
		$this->company_satic();
		$this->yunset("js_def",3);
		if(intval($_GET['w'])==1){
			$this->com_tpl('joblist');
		}else{
			$this->com_tpl('job');
		}
	}
	
	function opera_action(){
		$this->job();
	}

	function buyJob_action(){
		if($_POST){
			$M=$this->MODEL('compay');
			if ($_POST['jobautoids']){
				$return = $M->buyAutoJob($_POST);
			}elseif ($_POST['zdjobid']){
				$return = $M->buyZdJob($_POST);
			}elseif ($_POST['recjobid']){
				$return = $M->buyRecJob($_POST);
			}elseif ($_POST['ujobid']){
				$return = $M->buyUrgentJob($_POST);
			}

			if($return['order']['order_id'] && $return['order']['id']){
				echo json_encode(array('error'=>0,'orderid'=>$return['order']['order_id'],'id'=>$return['order']['id']));
			}else{
				echo json_encode(array('error'=>1,'msg'=>iconv('gbk','utf-8',$return['error'])));
			}
		}else{
			echo json_encode(array('error'=>1,'msg'=>iconv('gbk','utf-8','�������������ԣ�')));
		}
	}

	function bidding_action(){

		$where="`uid`='".$this->uid."' and `xsdate`>'".time()."'";
		$urlarr=array("c"=>"job",'act'=>'bidding',"page"=>"{{page}}");
		if(trim($_GET['keyword'])){
			$where.=" and `name` like '%".trim($_GET['keyword'])."%'";
			$urlarr['keyword']=trim($_GET['keyword']);
		}
		$pageurl=Url('member',$urlarr);
		$rows=$this->get_page("company_job",$where,$pageurl,"10");
		$this->yunset("rows",$rows);
		$this->yunset("js_def",3);
		$this->company_satic();
		$this->com_tpl('bidding');
	}
	function refresh_action(){
		$nid=$this->obj->DB_update_all("company_job","`lastupdate`='".time()."'","`uid`='".$this->uid."' and `id`='".(int)$_POST['id']."'");
		if($nid){
			$this->obj->DB_update_all("company","`lastupdate`='".time()."'","`uid`='".$this->uid."'");
			echo 1;
		}
	}


	function ajax_refresh_job_action()
	{
		if(!isset($_POST['jobid'])){
			exit;
		}

		$jobid = $_POST['jobid'];
		
		$statis = $this->company_satic();

		$msg = '';
        $msg = 'ȷ��ˢ�£�';
        $data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;
        $data['status'] = 1;
        $data['msg'] = iconv("gbk", "utf-8", $msg);
        echo json_encode($data);
        exit;
		if( $statis['vip_etime'] >time() || $statis['vip_etime'] ==0 ){
        	if( $statis['rating_type'] == 1 ){
            	if( $statis['breakjob_num'] > 0 ){
//            		$msg = 'ˢ��ְλ����ʣ��' . $statis['breakjob_num'] . '����ȷ��ˢ�£�';
            		$msg = 'ȷ��ˢ�£�';
            		$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

            		$data['status'] = 1;
        		}           	
				else{
              		if( $this->config['com_integral_online'] ==1 ){
						if( $this->config['integral_jobefresh'] > 0 ){
							if( $this->config['integral_jobedit'] > $statis['integral'] ){
								$msg = $this->config['integral_pricename'] . '���㣬�޷�ˢ�£�';

								$data['status'] = 2;
							}
							else{
								$msg = '����ˢ����۳�' . $this->config['integral_jobefresh'] 
									. $this->config['integral_priceunit'] . $this->config['integral_pricename']
									. '��ȷ��ˢ�£�';
								$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

								$data['status'] = 1;
							}
						}
						else{
							$msg = 'ȷ��Ҫˢ�£�';
							$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

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
				$msg = 'ȷ��ˢ�¸�ְλô��';
				$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

				$data['status'] = 1;
		    }
	    }
        else{
            if( $this->config['com_integral_online'] ==1 ){
				if( $this->config['integral_jobefresh'] >0) {
					$msg = '����ˢ����۳�' . $this->config['integral_jobefresh'] 
						. $this->config['integral_priceunit'] . $this->config['integral_pricename']
						. '��ȷ��ˢ�£�';
					$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

					$data['status'] = 1;
				}
				else{
					$msg = 'ȷ��ˢ�¸�ְλô��';
					$data['url'] = 'index.php?c=job&act=opera&up=' . $jobid;

					$data['status'] = 1;
				}
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