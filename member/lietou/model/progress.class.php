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
class progress_controller extends lietou{
	function index_action(){
	    $this->recommend_total();
		$this->public_action();
        $this->user_cache();
        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));

        $w = $_GET['w'];
        if($w==1){//���Ƽ�
            $where="`uid`='".$this->uid."' and is_browse not in(4,6)";
        }elseif ($w==2){//�Ƽ��ɹ�
            $where="`uid`='".$this->uid."' and is_browse=6";
        }elseif ($w==3){//�Ƽ�ʧ��
            $where="`uid`='".$this->uid."' and is_browse=4";
        }else{//����
            $where="`uid`='".$this->uid."' ";
        }
		$urlarr=array("c"=>"progress","w"=>$w,"page"=>"{{page}}");
        
        $arr_com = $this->obj->DB_select_all("userid_job",$where."group by com_id","com_name");
        $this->yunset("arr_com",$arr_com);
		if($_GET['keyword']){
			$where .= " and `name` like '%".trim($_GET['keyword'])."%'";
			$urlarr['keyword']=$_GET['keyword'];
		}

		if($_POST['job_id'] || $_GET['job_id']){
		    $job_id = $_POST['job_id']?$_POST['job_id']:$_GET['job_id'];
            $where .= " and `job_id`=".$job_id;
        }else{
            $this->ACT_msg("index.php","�������ҳ�治���ڣ�");
        }

        if($_POST['job_name']){
            $where .= " and `name` like '%".trim($_POST['job_name'])."%'";
        }

        if($_POST['resume_name']){
            $resume = $this->obj->DB_select_once("resume_expect","uname='".$_POST['resume_name']."'","id");
            if($resume){
                $where .= " and `eid`=".$resume['id'];
            }
        }

		$pageurl=Url('member',$urlarr);
		$rows=$this->get_page("userid_job",$where,$pageurl,'10');

		if(is_array($rows) && !empty($rows)){
            $cache_array = $this->db->cacheget();
            $userclass_name = $cache_array["user_classname"];
			foreach($rows as $k=>$v){
				$resume = $this->obr->DB_select_once("resume","id=".$v['resume_id'],"name,sex,telphone,edu,exp");

				$job = $this->obj->DB_select_once("company_job","id=".$v['job_id']);
				$rows[$k]['uname'] = iconv("utf-8","gbk",$resume['name']);
				$rows[$k]['logo'] = $job['logo'];
                $rows[$k]['edu_n'] = $userclass_name[$resume['edu']];
                $rows[$k]['exp_n'] = $userclass_name[$resume['exp']];
                $year = date("Y",strtotime($resume['birthday']));
                $rows[$k]['age'] =date("Y")-$year;
//				$rows[$k]['uname'] = $resume['name'];
                if ($job['minsalary'] && empty($job['maxsalary'])){
                    $rows[$k]['salary'] = intval($job['minsalary']*12/10000)."������";

                }elseif($job['minsalary'] && $job['maxsalary']){
                    $rows[$k]['salary'] = intval($job['minsalary']*12/10000)."-".intval($job['maxsalary']*12/10000)."��";
                }else{
                    $rows[$k]['salary'] = "н������";
                }
                $rows[$k]['sex'] = $resume['sex'];
                $rows[$k]['telphone'] = $resume['telphone'];
			}
		}

		$this->industry_cache();

		$this->yunset("rows",$rows);

		$this->yunset("js_def",2);
		$this->lt_tpl('progress_all');
	}


}
?>