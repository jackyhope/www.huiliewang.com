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
class job_controller extends user{
	function index_action(){
        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
		$this->public_action();
		$this->member_satic();
		if($_GET['browse']){
			$where.="is_browse='".$_GET['browse']."' and ";
			$urlarr['browse']=$_GET['browse'];
		}
		if($_GET['datetime']){
			if($_GET['datetime']=='1'){
				$where.="`datetime`>'".strtotime(date("Y-m-d 00:00:00"))."' and ";
			}else{
				$where.="`datetime`>'".strtotime('-'.intval($_GET['datetime']).' day')."' and ";
			}
			$urlarr['datetime']=$_GET['datetime'];
		}
		$urlarr=array("c"=>"job","page"=>"{{page}}");
		$pageurl=Url('member',$urlarr);
		$rows=$this->get_page("userid_job",$where."`uid`='".$this->uid."' order by id desc",$pageurl,"10");
		$rList=$this->obj->DB_select_all("resume_expect","`uid`=".$this->uid."","`id`");
		if($rows&&is_array($rows)){
			foreach($rows as $val){
				$jobids[]=$val['job_id'];
				foreach ($rList as $v){
				    if($v['id']==$val['eid']){
				        $EidList[]=$val['eid'];
				    }
				}
			}
			
			$company_job=$this->obj->DB_select_all("company_job","`id` in(".pylode(',',$jobids).")","`id`,`minsalary`,`maxsalary`,`provinceid`,`cityid`,`status`,`identity`");
            $ResumeList=$this->obj->DB_select_all("resume_expect","`id` in(".pylode(',',$EidList).")","`id`,`name`");
			foreach($rows as $key=>$val){
				foreach($company_job as $v){
					if($val['job_id']==$v['id']){
						$rows[$key]['minsalary']=$v['minsalary'];
						$rows[$key]['maxsalary']=$v['maxsalary'];
						$rows[$key]['provinceid']=$v['provinceid'];
						$rows[$key]['cityid']=$v['cityid'];
						$rows[$key]['identity']=$v['identity'];
						$rows[$key]['status']=$v['status'];
					}
				}
                foreach($ResumeList as $v){
					if($val['eid']==$v['id']){
						$rows[$key]['resume_name']=$v['name'];
						
					}
				}
			}
		}	
		
        $StateList=array('1'=>'δ�鿴','2'=>'�Ѳ鿴','3'=>'�ȴ�֪ͨ','4'=>'��������','5'=>'�޷���ϵ');
		$this->yunset("StateList",$StateList);
		$search_list=array('1'=>'����','3'=>'�������','7'=>'�������','15'=>'�������','30'=>'���һ����');
		$this->yunset("search_list",$search_list);
		$num=$this->obj->DB_select_num("userid_job","`uid`='".$this->uid."'");
		$this->obj->DB_update_all("member_statis","sq_jobnum='".$num."'","`uid`='".$this->uid."'");
		$this->yunset("rows",$rows);
		$this->yunset("js_def",3);
		$this->user_tpl('job/job');
	}
	function del_action(){		
		if($_GET['del']||$_GET['id']){
			if(is_array($_GET['del'])){				
				$del=pylode(",",$_GET['del']);
				$layer_type=1;
			}else{
				$del=(int)$_GET['id'];
				$layer_type=0;
			}
			$userid=$this->obj->DB_select_once("userid_job","`id`='".$del."' and `uid`='".$this->uid."'","com_id");
			$nid=$this->obj->DB_delete_all("userid_job","`id` in (".$del.") and `uid`='".$this->uid."'","");
			
			if($nid){
				$fnum=$this->obj->DB_select_num("userid_job","`uid`='".$this->uid."'");

				$cnum=$this->obj->DB_select_num("userid_job","`com_id`='".$userid['com_id']."'");

				$this->obj->DB_update_all("member_statis","sq_jobnum='".$fnum."'","`uid`='".$this->uid."'");
				$this->obj->DB_update_all("company_statis","`sq_job`='".$cnum."'","`uid`='".$userid['com_id']."'");
				$this->obj->member_log("ɾ�������ְλ��Ϣ",6,3);
				$this->layer_msg('ɾ���ɹ���',9,$layer_type,"index.php?c=job");
			}			
		}
		
		
	}
    function is_browse_action(){
        if($_POST['ajax']==1 && $_POST['ids']){
            $this->obj->DB_update_all("userid_job","`quxiao`='1'","`id` in (".pylode(",",$_POST['ids']).")");
            $this->layer_msg('����ȡ���ɹ���',9,0,"index.php?c=job");
        }
    }
    function qs_action(){
        if($_POST['id']){
            $del=(int)$_POST['id'];
            $nid=$this->obj->DB_update_all("userid_job","`body`='".$_POST['body']."'","`id`='".$del."'");
            if($nid){
                $this->obj->member_log("ȡ�������ְλ��Ϣ",6,3);
                $this->ACT_layer_msg('ȡ���ɹ���',9,$_SERVER['HTTP_REFERER']);
            }else{
                $this->ACT_layer_msg('ȡ��ʧ�ܣ�',8,$_SERVER['HTTP_REFERER']);
            }
        }
    }

    function favorite_action(){
        $this->yunset($this->MODEL('cache')->GetCache(array('city','com')));
        $this->public_action();
        $this->member_satic();
        $urlarr=array("c"=>"favorite","page"=>"{{page}}");
        $StateNameList=array('0'=>'�ȴ����','1'=>'��Ƹ��','2'=>'�ѽ���','3'=>'δͨ��');
        $StatusNameList = array('1' => '���¼�', '2' => '��Ƹ��');//�¸��汾���Ǻϲ� company_job ��state��status�����ֶ�

        $pageurl=Url('member',$urlarr);
        $rows=$this->get_page("fav_job","`uid`='".$this->uid."' order by id desc",$pageurl,"20");
        if($rows&&is_array($rows)){
            include PLUS_PATH."/lt.cache.php";
            include PLUS_PATH."/com.cache.php";
            foreach($rows as $val){
                if($val['type']==1){
                    $com_jobid[]=$val['job_id'];
                }else{
                    $lt_jobid[]=$val['job_id'];
                }
            }
            $lt_job=$this->obj->DB_select_all("lt_job","`id` in(".pylode(',',$lt_jobid).")","`id`,`minsalary`,`maxsalary`,`provinceid`,`cityid`,`status`");
            $company_job=$this->obj->DB_select_all("company_job","`id` in(".pylode(',',$com_jobid).")","`id`,`minsalary`,`maxsalary`,`provinceid`,`cityid`,`state`,`status`,`identity`");
            foreach($rows as $key=>$val){

                $rows[$key]['statename']='�ѹر�';
                foreach($company_job as $v){
                    if($val['job_id']==$v['id']){
                        $rows[$key]['minsalary']=$v['minsalary'];
                        $rows[$key]['maxsalary']=$v['maxsalary'];
                        $rows[$key]['provinceid']=$v['provinceid'];
                        $rows[$key]['identity']=$v['identity'];
                        $rows[$key]['cityid']=$v['cityid'];
                        $rows[$key]['statename']=$StateNameList[$v['state']];
                        if($v['status'] == 1){
                            $rows[$key]['statename']= '���¼�';
                        }

                    }
                }
                foreach($lt_job as $v){
                    if($val['job_id']==$v['id']){
                        $rows[$key]['minsalary']=$v['minsalary'];
                        $rows[$key]['maxsalary']=$v['maxsalary'];
                        $rows[$key]['provinceid']=$v['provinceid'];
                        $rows[$key]['cityid']=$v['cityid'];
                        $rows[$key]['statename']=$StateNameList[$v['status']];
                    }
                }
            }
        }
        $num=$this->obj->DB_select_num("fav_job","`uid`='".$this->uid."'");
        $this->obj->DB_update_all("member_statis","fav_jobnum='".$num."'","`uid`='".$this->uid."'");
        $this->yunset("rows",$rows);
        $this->user_tpl('favorite');
    }
    function favoriteDel_action(){
        if($_GET['del']||$_GET['id']){
            if(is_array($_GET['del'])){
                $del=pylode(",",$_GET['del']);
                $layer_type=1;
            }else{
                $del=(int)$_GET['id'];
                $layer_type=0;
            }
            $nid=$this->obj->DB_delete_all("fav_job","`id` in (".$del.") and `uid`='".$this->uid."'","");

            if($nid){
                $fnum=$this->obj->DB_select_num("fav_job","`uid`='".$this->uid."'","`id`");
                $this->obj->update_once('member_statis',array('fav_jobnum'=>$fnum),array('uid'=>$this->uid));
                $this->obj->member_log("ɾ���ղص�ְλ��Ϣ",5,3);//��Ա��־
                $this->layer_msg('ɾ���ɹ���',9,$layer_type,"index.php?c=favorite");
            }
        }
    }

    function lookJob_action(){
        $urlarr=array("c"=>"look_job","page"=>"{{page}}");
        $pageurl=Url('member',$urlarr);
        $look=$this->get_page("look_job","`uid`='".$this->uid."' and `status`='0' order by `datetime` desc",$pageurl,"10");
        if(is_array($look)){
            include PLUS_PATH."/city.cache.php";
            include PLUS_PATH."/com.cache.php";
            foreach($look as $v){
                $jobid[]=$v['jobid'];
            }
            $job=$this->obj->DB_select_all("company_job","`id` in (".pylode(",",$jobid).")","`id`,`name`,`com_name`,`minsalary`,`maxsalary`,`provinceid`,`cityid`,`status`,`edate`,`identity`");
            foreach($look as $k=>$v){
                foreach($job as $val){
                    if($v['jobid']==$val['id']){
                        if($val['status']=="1"){
                            $look[$k]['status']="���¼���Ƹ";
                        }elseif($val['edate']<time()){
                            $look[$k]['status']="�ѹ���";
                        }else{
                            $look[$k]['status']="������Ƹ";
                        }
                        $look[$k]['jobname']=$val['name'];
                        $look[$k]['comname']=$val['com_name'];
                        $look[$k]['minsalary']=$val['minsalary'];
                        $look[$k]['minsalary']=$val['minsalary'];
                        $look[$k]['identity']=$val['identity'];
                        $look[$k]['provinceid']=$city_name[$val['provinceid']];
                        $look[$k]['cityid']=$city_name[$val['cityid']];
                    }
                }
            }
        }
        $this->yunset("js_def",2);
        $this->yunset("look",$look);
        $this->public_action();
        $this->user_tpl('look_job');
    }
    function lookJobDel_action(){
        if($_GET['del']||$_GET['id']){
            if(is_array($_GET['del'])){
                $del=pylode(",",$_GET['del']);
                $layer_type=1;
            }else{
                $del=(int)$_GET['id'];
                $layer_type=0;
            }
            $this->obj->DB_update_all("look_job","`status`='1'","`id` in (".$del.") and `uid`='".$this->uid."'");
            $this->obj->member_log("ɾ��ְλ�����¼��ID:".$del."��");
            $this->layer_msg('ɾ���ɹ���',9,$layer_type,"index.php?c=look_job");
        }
    }


    function atn_action(){
        $this->public_action();
        $urlarr=array("c"=>"atn","page"=>"{{page}}");
        $pageurl=Url('member',$urlarr);
        $rows=$this->get_page("atn","`uid`='".$this->uid."' and `sc_usertype`='2' order by `id` desc",$pageurl,"10");
        if($rows&&is_array($rows)){
            foreach($rows as $val){
                $uids[]=$val['sc_uid'];
            }
            $job=$this->obj->DB_select_all("company_job","`uid` in(".pylode(',',$uids).")and `status`<>1","`uid`,`name`,`id`");
            $company=$this->obj->DB_select_all("company","`uid` in(".pylode(',',$uids).")","`uid`,`name`");
            foreach($job as $v){
                $url=Url('job',array("c"=>"comapply","id"=>$v['id']));
                $jobname[$v['uid']][]="<a href='".$url."' target='_bank'>".$v['name']."</a>";

            }
            foreach($rows as $key=>$val){
                foreach($company as $v){
                    if($val['sc_uid']==$v['uid']){
                        $rows[$key]['com_name']=$v['name'];
                    }
                }
                foreach($jobname as $k=>$v){
                    if($val['sc_uid']==$k){
                        $rows[$key]['jobnum']=count($v);
                        $i=0;
                        foreach($v as $value){
                            if($i<2){
                                $joblist[$key][]=$value;
                            }
                            $i++;
                        }
                        $rows[$key]['jobname']=@implode(",",$joblist[$key]);
                    }
                }
            }
        }
        $this->yunset("rows", $rows);
        $this->user_tpl('atn');
    }
    function atnDel_action(){
        if($_GET['id']){
            $this->obj->DB_delete_all("atn","`id`='".intval($_GET['id'])."' AND `uid`='".$this->uid."'");
            $this->obj->DB_update_all("company","`ant_num`=`ant_num`-1","`uid`='".intval($_GET['uid'])."'");
            $this->obj->member_log("ȡ����ע��ҵ");
            $this->layer_msg('ȡ����ע�ɹ���ҵ��',9,0,"index.php?c=atn");
        }
    }


    function finder_action(){
        $this->public_action();
        $finder=$this->finder();
        $syfinder=$this->config['user_finder']-count($finder);
        $syfinder<0?0:$syfinder;
        $this->yunset("js_def",3);
        $this->yunset("syfinder",$syfinder);
        $this->yunset("finder",$finder);
        $this->user_tpl('finder');
    }
    function finderSave_action(){
        $para=array();
        if($_POST['submitBtn']){
            if($_POST['id']==""){
                $num=$this->obj->DB_select_num('finder',"`uid`='".$this->uid."'");
                if($num>=$this->config['user_finder']){
                    $this->ACT_layer_msg("�Ѵﵽ���������������",8,"index.php?c=finder");
                }
            }
            $post=$this->post_trim($_POST);
            $id=(int)$post['id'];
            $name=$post['name'];
            unset($post['id']);
            unset($post['submitBtn']);
            unset($post['cycle']);
            unset($post['job_num']);
            unset($post['email']);
            unset($post['name']);
            foreach($post as $key=>$val){
                if(trim($val)){
                    $para[]=$key."=".$val;
                }
            }
            $paras=@implode('##',$para);
            if($paras=="")
            {
                $this->ACT_layer_msg("��������������Ϊ��!",8,$_SERVER['HTTP_REFERER']);
            }
            $result=$this->insertfinder($paras,$id,$name,1);
            $result?$this->ACT_layer_msg("��Ϣ����ɹ���",9,"index.php?c=finder"):$this->ACT_layer_msg("��Ϣ����ʧ�ܣ�",8,"index.php?c=finder");
        }
    }
    function finderDel_action(){
        if($_GET['id']){
            $this->obj->member_log("ɾ��������");
            $res=$this->obj->DB_delete_all("finder","`id`='".(int)$_GET['id']."' and `uid`='".$this->uid."'");
            $res?$this->layer_msg("ɾ���ɹ���",9,0):$this->layer_msg("ɾ��ʧ�ܣ�",8,0);
        }
    }
    function finderEdit_action(){
        include(CONFIG_PATH."db.data.php");
        $this->yunset("arr_data",$arr_data);
        $this->public_action();
        $result=$this->MODEL('cache')->GetCache(array('city','com','hy','user','job'));
        $this->yunset($result);
        if($_GET['id']){
            $info=$this->obj->DB_select_once("finder","`uid`='".$this->uid."' and `id`='".(int)$_GET['id']."'");
            if($info['para']){
                $para=@explode('##',$info['para']);
                foreach($para as $val){
                    $arr=@explode('=',$val);
                    $parav[$arr['0']]=$arr['1'];
                }
                if($parav['jobids']){
                    $jobids=@explode(',',$parav['jobids']);
                    foreach($jobids as $val){
                        $jobname[]=$result['job_name'][$val];
                    }
                    $parav['jobname']=@implode(',',$jobname);
                }
                $this->yunset("parav",$parav);
            }
            $this->yunset("info",$info);
        }
        $sdate=array('1'=>'һ����',"3"=>'������','7'=>'������',"15"=>'ʮ������','30'=>'һ������',"60"=>'��������');
        $this->yunset("sdate",$sdate);
        $uptime=array('1'=>'����','3'=>'���3��','7'=>'���7��','30'=>'���һ����','90'=>'���������');
        $this->yunset("uptime",$uptime);
        $this->user_tpl('finderinfo');
    }


}
?>