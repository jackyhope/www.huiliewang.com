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
class comapply_controller extends job_controller{
	function index_action(){
		include(CONFIG_PATH."db.data.php");
		$this->yunset("arr_data",$arr_data);
		$id=(int)$_GET['id'];
		$M=$this->MODEL('job');//
		$companyM=$this->MODEL('company');
        $UserinfoM=$this->MODEL('userinfo');//
		$ResumeM=$this->MODEL('resume');
        $AskM=$this->MODEL('ask');
        $CacheM=$this->MODEL('cache');
        $CacheList=$CacheM->GetCache(array('job','city','com','user','hy'));
        $this->yunset($CacheList);
		$JobInfo=$M->GetComjobOne(array('id'=>$id));
		session_start();
        $this->industry_cache();
        $this->com_cache();


		if($JobInfo['id']==''){
			$this->ACT_msg($this->config['sy_weburl'],"û�и�ְλ��");
		}
		if($JobInfo['rewardpack']=='1'){
			
			$reward = $this->obj->DB_select_once("company_job_reward","`jobid`='".$JobInfo['id']."'");
			$this->yunset('reward',$reward);
		}
		if($_SESSION['auid']==""){
			if($JobInfo['r_status']=='2'){
				$this->ACT_msg($this->config['sy_weburl'],"��ҵ�ѱ�������");
			}
		}
		if($this->usertype=="1"&&$this->uid){
			$resume=$ResumeM->GetResumeExpectNum(array('uid'=>$this->uid,"`r_status`<>'2' and `job_classid`<>''","open"=>'1'));

			if($resume!='0'){ 
				$look_job=$M->GetLookJobOne(array('uid'=>$this->uid,'jobid'=>$JobInfo['id']));
				if(!empty($look_job)){
					$M->UpdateLookJob(array('datetime'=>time()),array('uid'=>$this->uid,'jobid'=>$JobInfo['id']));
				}else{
					
					$M->AddLookJob(array('uid'=>$this->uid,'jobid'=>$JobInfo['id'],'com_id'=>$JobInfo['uid'],'datetime'=>time(),'did'=>$this->userdid)); 
					$historyM = $this->MODEL('history');
					$historyM->addHistory('lookjob',$JobInfo['id']);
				}
			}
		}

		if($this->uid!=$JobInfo['uid']){
			
			if($this->usertype=='1'){
				$favjob=$M->GetFavJobOne(array("uid"=>$this->uid,"type"=>1,"job_id"=>$JobInfo['id']));
				$userid_job=$M->GetUseridJobOne(array('uid'=>$this->uid,'job_id'=>$JobInfo['id']),array('field'=>'id'));
				$this->yunset(array('userid_job'=>$userid_job['id'],'usertype'=>1,"favjob"=>$favjob));
			}
		}
		$ComInfo=$UserinfoM->GetUserinfoOne(array('uid'=>$JobInfo['uid']),array('field'=>"`ant_num`,`linkqq`,`logo`,`address`,`busstops`,`linktel`,`linkman`,`linkphone`,`email_status`,`moblie_status`,`hy`,`pr`,`num`,`yyzz_status`,`content`,`x`,`y`",'usertype'=>2));

		if(!$ComInfo['logo'] || !file_exists(str_replace($this->config['sy_weburl'],APP_PATH,'.'.$ComInfo['logo']))){
		    $ComInfo['logo']=$this->config['sy_weburl']."/".$this->config['sy_unit_icon'];
		}else{
		    $ComInfo['logo']=str_replace("./",$this->config['sy_weburl']."/",$ComInfo['logo']);
		}
		$JobInfo['jobname']=$JobInfo['name'];unset($JobInfo['name']);
		$JobInfo['jobrec']=$JobInfo['rec'];unset($JobInfo['rec']);

        $Info=array_merge_recursive($JobInfo,$ComInfo);

		if($Info['linkman']){
			$operatime=time()-$Info['operatime'];
			if($Info['operatime']==''){
				$Info['operatime']='0';
			}else if($operatime<3600){
				$Info['operatime']='һСʱ����';
			}else if($operatime>=3600&&$operatime<86400){
				$Info['operatime']=floor($operatime/3600).'Сʱ';
			}else if($operatime>=86400){
				$Info['operatime']=floor($operatime/86400).'��';
			}  
			$allnum=$M->GetUserJobNum(array("com_id"=>$Info['uid'],"job_id"=>$Info['id']));
			$replynum=$M->GetUserJobNum(array("com_id"=>$Info['uid'],"job_id"=>$Info['id'],"`is_browse`>'1'")); 
			$pre=round(($replynum/$allnum)*100); 
			$this->yunset("pre",$pre);
		}
		$this->yunset("look_msg",$look_msg);
		$rows=$this->obj->DB_select_once("resume_expect","`uid`='$this->uid'");
		$this->yunset("rows",$rows);
		if($_SESSION['auid']==""){
			if($Info['state']=="0"){
				$this->ACT_msg($_SERVER['HTTP_REFERER'],"ְλ����У�");
			}elseif($Info['state']=="2"){
				$this->yunset('entype','1');
			
			}elseif($Info['state']=="3"){
				$this->ACT_msg($_SERVER['HTTP_REFERER'],"��ְλδͨ����ˣ�");
			
			}elseif($Info['status']=="1"){
				$this->yunset('stop','1');
			}
		}

		if(is_array($Info)){

            $cache_array = $this->db->cacheget();
			$Job = $this->db->array_action($Info,$cache_array);
			if($Job['is_link']=="1" && $this->config['com_login_link']=="3"){ 
				if($Job['link_type']==1){
					$Job['linkman']=$Info['linkman'];
					if ($Info['linktel']){
					    $Job['linktel']=substr_replace($Info['linktel'],'*****',3,5);
					}elseif ($Info['linkphone']){
					    $Job['linktel']=substr_replace($Info['linkphone'],'*****',3,5);
					}
				}else{
					$link=$M->GetComjoblinkOne(array('jobid'=>$Job['id']),array('field'=>'`link_man`,`link_moblie`'));
					$Job['linkman']=$link['link_man'];
					$Job['linktel']=substr_replace($link['link_moblie'],'*****',3,5);
				}
			}
		}
		if($this->uid&&$this->usertype&&$this->usertype!=1){
			$typename=array('2'=>'��ҵ�˻�');
			$this->yunset("usertypemsg",'����ǰ�ʺ���Ϊ��<span class="job_user_name_s">'.$this->username.'</span>������'.$typename[$this->usertype].'��');
		}
		$com=$UserinfoM->GetMemberOne(array('uid'=>$Job['uid']),array('field'=>'`username`'));
		$description = $this->obj->DB_select_once("company_job","uid=".$Job['uid'],"description");
        $Job['content']=str_replace(array("\r","\n"), array("<br/>","<br/>"), strip_tags($description['description'],"\r,\n"));

//		$Job['content']=str_replace(array("\r","\n"), array("<br/>","<br/>"), strip_tags($Job['content'],"\r,\n"));
		$Job['cert_n'] = @explode(",",$Job['cert']);
		$Job['uid'] = $Job['uid'];
		$Job['com_url'] = Url("company",array("c"=>"show","id"=>$Job[uid]));
		$Job['username'] = $com['username'];
		$Job['sex']=$arr_data['sex'][$Job['sex']];
		$data['job_name']=$Job['jobname'];
		$data['company_name']=$Job['com_name'];
		$data['industry_class']=$Job['job_hy'];
		$data['job_class']=$Job['job_class_one'].",".$Job['job_class_two'].",".$Job['job_class_three'];
		$data['job_desc']=$this->GET_content_desc($Job['description']);
		$this->data=$data;		

		
		if($this->uid && isset($this->config['sy_recommend_day_num']) 
			&& $this->config['sy_recommend_day_num'] > 0){
			$num = $this->obj->DB_select_num('recommend', "`uid`={$this->uid}");
			if($num >= $this->config['sy_recommend_day_num']){
				$this->yunset('sy_recommend_day_num', $this->config['sy_recommend_day_num']);
			}
		}
		
		$recommendInterval = isset($this->config['sy_recommend_interval']) ? $this->config['sy_recommend_interval'] : 0;
		$this->yunset('recommendInterval', $recommendInterval);

	
		$isAuthcodeCheck = ($this->config['sy_msg_isopen']==1 && $this->config['reg_real_name_check']==1);
		$this->yunset('isAuthcodeCheck', $isAuthcodeCheck);
		
		$this->seo("comapply");

        if($Job['identity']==3){
            $name =  $this->obj->DB_select_once("lietou","uid=".$Job['uid'],"name,linktel,logo");
            $Job['linktel'] = $name['linktel'];
            $Job['logo'] = $name['logo'];
            $lietou_name = $name['name'];
            $login_date =  $this->obj->DB_select_once("member","uid=".$Job['uid'],"login_date");
            $login_date = date("Y-m-d",$login_date['login_date']);
            $this->yunset("lietou_name",$lietou_name);
            $this->yunset("login_date",$login_date);
            $fake_company = $this->obj->DB_select_once("fake_company","id=".$Job['fake_id']);
            $this->yunset("fake_company",$fake_company);
        }else{
            $com = $this->obj->DB_select_once("company","uid=".$Job['uid'],"hy,pr,mun");

            $Job['com_hy'] = $com['hy'];
            $Job['com_pr'] = $com['pr'];
            $Job['com_mun'] = $com['mun'];
        }

        if($Job['minsalary'] && $Job['maxsalary']){
            $Job['year_salary'] = ceil($Job['minsalary']*12/10000)."-".ceil($Job['minsalary']*12/10000)."��";
        }elseif ($Job['minsalary'] && empty($Job['maxsalary'])){
            $Job['year_salary'] = ceil($Job['minsalary']*12/10000)."������";
        }else{
            $Job['year_salary'] = "����";
        }
        $com = $this->obj->DB_select_once("company","uid=".$Job['uid'],"linktel,logo");
        $Job['logo'] = $com['logo'];

        $Job['linktel'] = $com['linktel'];
        if($Job['minsalary'] && $Job['maxsalary']){
            $Job['salary_n'] =intval($Job['minsalary']*12/10000)."-".intval($Job['maxsalary']*12/10000)."��";
        }elseif ($Job['minsalary'] && empty($Job['maxsalary'])){
            $Job['salary_n'] =intval($Job['minsalary']*12/10000)."������";
        }else{
            $Job['salary_n'] ="����";
        }
        $this->yunset("Info",$Job);

		if($this->usertype==3){

            $lietou_num = $this->obj->DB_select_num("userid_job","identity=3 and job_id=".$_GET['id']." group by uid");
            $resume_num = $this->obj->DB_select_num("userid_job","identity=3 and job_id=".$_GET['id']);

            $view_num = $this->obj->DB_select_num("userid_job","is_browse=2 and job_id=".$_GET['id']." and identity=3");
            $download_num = $this->obj->DB_select_num("userid_job","is_browse=6 and job_id=".$_GET['id']." and identity=3");
            $refuse_num = $this->obj->DB_select_num("userid_job","is_browse=4 and job_id=".$_GET['id']." and identity=3");

            $myresume_num = $this->obj->DB_select_num("userid_job","identity=3 and job_id=".$_GET['id']." and uid=".$this->uid);
            $myview_num = $this->obj->DB_select_num("userid_job","is_browse=2 and job_id=".$_GET['id']." and identity=3 and uid=".$this->uid);
            $mydownload_num = $this->obj->DB_select_num("userid_job","is_browse=6 and job_id=".$_GET['id']." and identity=3 and uid=".$this->uid);
            $myrefuse_num = $this->obj->DB_select_num("userid_job","is_browse=4 and job_id=".$_GET['id']." and identity=3 and uid=".$this->uid);

            $job_num = $this->obj->DB_select_num("company_job","uid=".$Job['uid']);
            $login_time = $this->obj->DB_select_once("member","uid=".$Job['uid'],"login_date");
            $fav_job = $this->obj->DB_select_num("fav_job","uid=".$this->uid." and job_id=".$_GET['id']);

            $login_time = date("Y-m-d",$login_time['login_date']);
            $this->yunset("login_time",$login_time);
            $this->yunset("job_num",$job_num);
            $this->yunset("myresume_num",$myresume_num);
            $this->yunset("myview_num",$myview_num);
            $this->yunset("mydownload_num",$mydownload_num);
            $this->yunset("myrefuse_num",$myrefuse_num);
            $this->yunset("fav_job",$fav_job);
            $this->yunset("lietou_num",$lietou_num);
            $this->yunset("resume_num",$resume_num);
            $this->yunset("view_num",$view_num);

            $this->yunset("download_num",$download_num);
            $this->yunset("refuse_num",$refuse_num);
//            $this->yun_tpl(array('comapply'));
//            $this->lt_tpl('comapply');
            $this->yun_tpl(array('comapply'));
        }else{
                $arr = array();
                if($Job){
                    $arr['code'] = 200;
                    $arr['data'] = $Job;
                    $arr['success'] = true;
                }else{
                    $arr['code'] = 200;
                    $arr['success'] = false;
                    $arr['data'] = null;
                }
                 $this->yun_tpl(array('comapply'));
        }

	}

	function jobdetail_action(){
	    $id = baseUtils::getStr(trim($_GET['id']),'int');
	    apiClient::init($appid,$secret);
        $companyservice = new com\hlw\huiliewang\interfaces\company\CompanyServiceClient(null);
        apiClient::build($companyservice);
        $result = $companyservice->jobdetail($id);
        $arr['code'] = $result->code;
        $arr['message'] = $result->message;
        $arr['data'] = $result->data;
        echo json_encode($arr);die;
    }
	
	function qrcode_action(){
		$wapUrl = Url('job');
		if( isset($_GET['id']) && $_GET['id'] != '')
			$wapUrl = Url('job',array('c'=>'comapply','id'=>(int)$_GET['id']));
		include_once LIB_PATH."yunqrcode.class.php";
		YunQrcode::generatePng2($wapUrl,4);
	}

	function msg_action(){
		if($_POST['submit']){
			if($this->uid==''||$this->username==''){
				$this->ACT_layer_msg("���ȵ�¼��",8,$_SERVER['HTTP_REFERER']);
			}
			if($this->usertype!="1"){
				$this->ACT_layer_msg("ֻ�и����û��ſ������ԣ�",8,$_SERVER['HTTP_REFERER']);
			}
			$M=$this->MODEL("job");
			$black=$M->GetBlackOne(array('p_uid'=>$this->uid,'c_uid'=>(int)$_POST['job_uid']));
			if(!empty($black)){
				$this->ACT_layer_msg("����ҵ�ݲ����������ѯ��",8,$_SERVER['HTTP_REFERER']);
			}
			if(trim($_POST['content'])==""){
				$this->ACT_layer_msg( "�������ݲ���Ϊ�գ�",8,$_SERVER['HTTP_REFERER']);
			}
			if(trim($_POST['authcode'])==""){
				$this->ACT_layer_msg( "��֤�벻��Ϊ�գ�",8,$_SERVER['HTTP_REFERER']);
			}
			session_start();
			if(md5(strtolower($_POST['authcode']))!=$_SESSION['authcode'] || empty($_SESSION['authcode'])){
				$this->ACT_layer_msg("��֤�����", 8,$_SERVER['HTTP_REFERER']);
			}
			$id=$M->AddMsg(array('uid'=>$this->uid,'username'=>$this->username,'jobid'=>trim($_POST['jobid']),'job_uid'=>trim($_POST['job_uid']),'content'=>trim($_POST['content']),'com_name'=>trim($_POST['com_name']),'job_name'=>trim($_POST['job_name']),'type'=>'1','datetime'=>time()));
			isset($id)?$this->ACT_layer_msg( "���Գɹ���",9,$_SERVER['HTTP_REFERER']):$this->ACT_layer_msg("����ʧ�ܣ�",8,$_SERVER['HTTP_REFERER']);
		}
	}
	function GetHits_action() {
	    if(intval($_GET['id'])){
	        $JobM=$this->MODEL('job');
			if($this->config['sy_job_hits']>100 || !$this->config['sy_job_hits']){
				$this->config['sy_job_hits']=1;
			}
			$hits=rand(1,$this->config['sy_job_hits']);
	        $JobM->UpdateComjob(array("`jobhits`=`jobhits`+".$hits),array("id"=>(int)$_GET['id']));
	        $hits=$JobM->GetComjobOne(array('id'=>intval($_GET['id'])),array('field'=>'jobhits'));
	        echo 'document.write('.$hits['jobhits'].')';
	    }
	}
	function gettel_action(){

		
		if($this->config['com_login_link']!="2"){
			
			
			if($this->usertype=='1' || $this->config['com_login_link']=="1"){
				
				if($this->config['com_resume_link']=="1" && $this->config['com_login_link']=="3"){
					$ResumeM=$this->MODEL('resume');
					$resume=$ResumeM->GetResumeExpectNum(array('uid'=>$this->uid));
					if($resume<1){
						echo 1;
						die;
					}
				}
				
				$id=intval($_POST['id']);
				if($id>=1){
					$JobM=$this->MODEL('job');
					$JobInfo=$JobM->GetComjobOne(array('id'=>$id,'r_status<>2','state'=>1),array('field'=>'`link_type`,`uid`'));

					$companyM=$this->MODEL('company');
					$cominfo=$companyM->GetCompanyInfo(array('uid'=>$JobInfo['uid']),array('field'=>'`linktel`,`linkphone`,`linkqq`,`linkman`,`busstops`,`hy`,`pr`,`num`'));
					var_dump($cominfo);exit();
					$JobInfo['linkqq']=$cominfo['linkqq'];
					$JobInfo['busstops']=$cominfo['busstops'];
					if($JobInfo['link_type']=='1'){
						
						
						if ($cominfo['linktel']){
							$JobInfo['linktel']=$cominfo['linktel'];
						}elseif ($cominfo['linkphone']){
							$JobInfo['linktel']=$cominfo['linkphone'];
						}
						
						$JobInfo['linkman']=$cominfo['linkman'];
					}else{
						$link=$JobM->GetComjoblinkOne(array('jobid'=>$id),array('field'=>'link_moblie,link_man'));
						if(!empty($link)){
							
							$JobInfo['linktel']=$link['link_moblie'];
							$JobInfo['linkman']=$cominfo['linkman'];
						}else{
							if ($cominfo['linktel']){
								$JobInfo['linktel']=$cominfo['linktel'];
							}elseif ($cominfo['linkphone']){
								$JobInfo['linktel']=$cominfo['linkphone'];
							}
						
							$JobInfo['linkman']=$cominfo['linkman'];
							
						}
					}
					echo json_encode(array('linktel'=>iconv('gbk','utf-8',$JobInfo['linktel']),'linkqq'=>iconv('gbk','utf-8',$JobInfo['linkqq']),'linkman'=>iconv('gbk','utf-8',$JobInfo['linkman']),'busstops'=>iconv('gbk','utf-8',$JobInfo['busstops'])));
				}
			}else{
				echo 2;
			}
		}else{
		
			echo 0;
		}
	}
}
?>