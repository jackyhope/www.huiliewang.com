<?php
/* *
 * $Author ：PHPYUN开发团队
 *
 * 官网: http://www.phpyun.com
 *
 * 版权所有 2009-2016 宿迁鑫潮信息技术有限公司，并保留所有权利。
 *
 * 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
 */
class jobadd_controller extends lietou{
	function index_action(){
		include(CONFIG_PATH."db.data.php");
		$this->yunset("arr_data",$arr_data);
        $this->public_action();
        $lietou=$this->obj->DB_select_once("lietou","`uid`='".$this->uid."'");
        if(empty($lietou['name'])){
//            $this->ACT_msg($this->config['sy_weburl'].'/member/index.php?c=info',"请完善基本信息！");
        }
		//$company=$this->get_user();
		$msg=array();
		$isallow_addjob="1";
		$url="index.php?c=binding";

		$save=$this->obj->DB_select_once("lssave","`uid`='".$this->uid."'and `savetype`='4'");
		$save=unserialize($save['save']);
		if($save['lastupdate']){
			$save['time']=date('H:i',ceil(($save['lastupdate'])));
		}

		$fake_company=$this->obj->DB_select_all("fake_company","uid=".$this->uid);

		$this->yunset("fake_company",$fake_company);
		$this->yunset("save",$save);
		//$this->public_action();
		$CacheArr=$this->MODEL('cache')->GetCache(array('hy','job','city','com','circle'));
		$this->yunset($CacheArr);
		$row['hy']=$company['hy'];
		$row['sdate']=mktime();
		$row['edate']=strtotime("+1 month");
		$row['number']=$CacheArr['comdata']['job_number'][0];
		$row['type']=$CacheArr['comdata']['job_type'][0];
		$row['exp']=$CacheArr['comdata']['job_exp'][0];
		$row['report']=$CacheArr['comdata']['job_report'][0];
		$row['age']=$CacheArr['comdata']['job_age'][0];
		$row['edu']=$CacheArr['comdata']['job_edu'][0];
		$row['marriage']=$CacheArr['comdata']['job_marriage'][0];
		$this->yunset("company",$company);
		$jobnum=$this->obj->DB_select_num("company_job","`uid`='".$this->uid."'");
		$this->yunset("jobnum",$jobnum);
		$this->yunset("row",$row);
		$this->yunset("today",date('Y-m-d',time()));
		$this->yunset("js_def",3);
		$this->lt_tpl('jobadd');
	}

	function show_fake_action(){
	    if($_POST['fake_id']){
	        $fake_com = $this->obj->DB_select_once("fake_company","id=".$_POST['fake_id']." and uid=".$this->uid);
            $fake_com=yun_iconv('gbk','utf-8',$fake_com);
//            $fake_com = $this->array_iconv("gbk","utf-8",$fake_com);
            echo json_encode($fake_com);
        }
    }
	function edit_action(){

		include(CONFIG_PATH."db.data.php");
		$this->yunset("arr_data",$arr_data);
		$statics = $this->lietou_satic();
        $fake_company=$this->obj->DB_select_all("fake_company","uid=".$this->uid);
        $this->yunset("fake_company",$fake_company);
		if($_GET['id']){
			$id=(int)$_GET['id'];
		}else{
//			if($_GET['jobcopy']){
//				if( $statics['addjobnum'] == 2){
//					if(intval($statics['integral']) < intval($this->config['integral_job'])){
//						$this->ACT_msg($_SERVER['HTTP_REFERER'],"你的".$this->config['integral_pricename']."不够发布职位！",8);
//					}
//				}
//			}
			$id=(int)$_GET['jobcopy'];
		}
		$row=$this->obj->DB_select_once("company_job","`id`='".$id."' and `uid`='".$this->uid."'");
		$lang[] = @explode(',',$row['lang']);
		if($lang){
			foreach($lang as $key=>$val){
				$row['lang']=$val;
			}
		}
		$welfare[] = @explode(',',$row['welfare']);
		if($welfare){
			foreach($welfare as $key=>$val){
				$row['welfare']=$val;
			}
		}

		$company=$this->get_user();
		if($company['linktel']==''&&$company['linkphone']){
			$company['linktel']=$company['linkphone'];
		}
		if($row['edate']<time()){
			$row['days']= 30;
			$row['edate']=time()+30*86400;
		}else{
			$row['days']= ceil(($row['edate']-$row['sdate'])/86400);
 		}
		
		$this->yunset($this->MODEL('cache')->GetCache(array('hy','job','city','com','user')));
		if($row['three_cityid']){
			$row['circlecity']=$row['three_cityid'];
		}else if($row['cityid']){
			$row['circlecity']=$row['cityid'];
		}else if($row['provinceid']){
			$row['circlecity']=$row['provinceid'];
		}
		if($row['autotime']>time()){
			$row['autodate']=date("Y-m-d",$row['autotime']);
		}
		$job_link=$this->obj->DB_select_once("company_job_link","`jobid`='".$id."' and `uid`='".$this->uid."'");
		$this->yunset("job_link",$job_link);
		$row['islink']=$job_link['link_type'];
 		$row['isemail']=$job_link['email_type'];
		$this->public_action();
		$this->yunset("statis",$statics);
		$this->yunset("company",$company);
		$this->yunset("row",$row);
		$this->yunset("js_def",3);
		$this->lt_tpl('jobadd');
	}
	function save_action(){

		if($_POST['submitBtn']){
			$id=intval($_POST['id']);
			if($id){
				$row=$this->obj->DB_select_once("company_job","`id`='".$id."' and `uid`='".$this->uid."'","`state`,`sdate`,`edate`,`id`");
			}
			$state= intval($_POST['state']);
			unset($_POST['submitBtn']);
			unset($_POST['id']);
			unset($_POST['state']);
			
			$_POST['sdate']=time();
			$_POST['description'] = str_replace(array("&amp;","background-color:#ffffff","background-color:#fff","white-space:nowrap;"),array("&",'background-color:','background-color:','white-space:'),html_entity_decode($_POST['description'],ENT_QUOTES,"GB2312"));

			$comjob=$this->obj->DB_select_all("company_job","`uid`='".$this->uid."' and `name`='".$_POST['name']."'","`id`");
			if($comjob['id']!=$id&&$id&&$$comjob['id']){
				$this->ACT_layer_msg("职位名称已存在！",8);
			}
            $_POST['state']=1;

//			$companycert=$this->obj->DB_select_once("company_cert","`uid`='".$this->uid."'and type=3","uid,type,status");
//
//			if($this->config['com_free_status']=="1"&&$companycert['status']=="1"){
//				$_POST['state']=1;
//			}else{
//				if($this->config['com_job_status']=="0"){
//				$msg="等待审核！";
//			    }
//				$member=$this->obj->DB_select_once("member","`uid`='".$this->uid."'","status");
//				if($member['status']!="1"){
//					$_POST['state']=0;
//				}else{
//					$_POST['state']=$this->config['com_job_status'];
//				}
//			}
			
			if($_POST['job_post']){
				$row1=$this->obj->DB_select_once("job_class","`id`='".intval($_POST['job_post'])."'","`keyid`");
				$row2=$this->obj->DB_select_once("job_class","`id`='".$row1['keyid']."'","`keyid`");
				if($row2['keyid']=='0'){
					$_POST['job1_son']=$_POST['job_post'];
					$_POST['job1']=$row1['keyid'];
					unset($_POST['job_post']);
				}else{
					$_POST['job1_son']=$row1['keyid'];
					$_POST['job1']=$row2['keyid'];
				}
			}

			$CacheList=$this->MODEL('cache')->GetCache(array('com'));

			$lang=array();
			foreach($CacheList['comdata']['job_lang'] as $k=>$v){
				if(intval($_POST['lang'.$v])==$v){
					$lang[]=$v;
				}
			}
			if(!empty($lang)){
				$_POST['lang'] = pyLode(',',$lang);
			}else{
				$_POST['lang'] = '';
			}
			$welfare=array();
			foreach($CacheList['comdata']['job_welfare'] as $k=>$v){
				if(intval($_POST['welfare'.$v])!=''){
					$welfare[]=$v;
				}
			}
			if(!empty($welfare)){
				$_POST['welfare'] =pyLode(',',$welfare);
			}else{
				$_POST['welfare'] = '';
			}
			if(intval($_POST['days'])&&$_POST['days_type']==''){
				if(intval($_POST['days'])>999){
					$_POST['days']=999;
				}
				$_POST['edate']=time()+(int)trim($_POST['days'])*86400;
				unset($_POST['days']);
			}else if($_POST['days_type']){
				unset($_POST['days_type']);unset($_POST['days']);
				$_POST['edate']=strtotime($_POST['edate']." 23:59:59");
				if($_POST['edate']<time()){
					$this->ACT_layer_msg("结束时间小于当前日期！",8,$_SERVER['HTTP_REFERER']);
				}
			}

			if((int)$_POST['islink']=='2'&&($_POST['link_man']==''||$_POST['link_moblie']=='')){
				$this->ACT_layer_msg("联系人、联系电话均不能为空！",8);
			}

			if((int)$_POST['isemail']=='2'){
				if($_POST['email']==''){
					$this->ACT_layer_msg("请输入新联系邮箱！",8);
				}else if($this->CheckRegEmail($_POST['email'])==false){
					$this->ACT_layer_msg("新联系邮箱格式错误！",8);
				}
			}
			$_POST['xuanshang']=intval($_POST['xuanshang']);
			$_POST['identity']=3;
			if(!$_POST['xuanshang']){
				$_POST['xuanshang']='0';
			}

//			$satic=$this->company_satic();
//			$company=$this->get_user();
//			$_POST['com_name']=$company['name'];
//			$_POST['com_logo']=$company['logo'];
//			$_POST['com_provinceid']=$company['provinceid'];
//			$_POST['pr']=$company['pr'];
//			$_POST['mun']=$company['mun'];
//			$_POST['rating']=$satic['rating'];
			$islink=(int)$_POST['islink'];
			$link_type=$islink;
			if($islink<3){
				$linktype=$islink;
				$islink=1;
			}else{
				$islink=0;
			}
			$isemail=(int)$_POST['isemail'];
			$emailtype=$isemail;
			if($isemail<3){
				$isemail=1;
			}else{
				$isemail=0;
			}
			if($_POST['salary_type']){
				$_POST['minsalary']=$_POST['maxsalary']=0;
			}
			$_POST['is_link']=$islink;
			$_POST['link_type']=$linktype;
			$_POST['is_email']=$isemail;
			$link_moblie=$_POST['link_moblie'];
			$email=$_POST['email'];
			$link_man=$_POST['link_man'];
			$tblink=$_POST['tblink'];
			unset($_POST['link_moblie']);
			unset($_POST['islink']);
			unset($_POST['isemail']);
			unset($_POST['link_man']);
			unset($_POST['email']);

			if(!$id||intval($_POST['jobcopy'])==$id){

				$_POST['sdate']=time();
				$_POST['lastupdate']=time();
				$_POST['uid']=$this->uid;
				$_POST['did']=$this->userdid;
				$detail_dept_id = $_POST['department'];
				unset($_POST['department']);
				$_POST['detail_dept_id']=$detail_dept_id;
//				$this->get_com(1,$satic);
				$nid=$this->obj->insert_into("company_job",$_POST);
				$name="添加职位";
				$type='1';
				if($nid){
//					$this->obj->DB_delete_all("lssave","`uid`='".$this->uid."'and `savetype`='4'");
//					$this->obj->DB_update_all("company","`jobtime`='".$_POST['lastupdate']."'","`uid`='".$this->uid."'");
					$state_content = "发布了新职位 <a href=\"".$this->config['sy_weburl']."/index.php?m=job&c=comapply&id=$nid\" target=\"_blank\">".$_POST['name']."</a>。";
					$this->addstate($state_content,2);
				}
			}else{

				$where['id']=$id;
				$where['uid']=$this->uid;
				
				$nid=$this->obj->update_once("company_job",$_POST,$where);
				$name="更新职位";
				$type='2';
				if($nid){
					$this->obj->DB_update_all("company","`lastupdate`='".$_POST['lastupdate']."'","`uid`='".$this->uid."'");
				}
			}
			$joblink=array();
			$joblink[]="`email`='".trim($email)."',`is_email`='".$isemail."',`email_type`='".$emailtype."'";
			if($linktype==2){
				$joblink[]="`link_man`='".$link_man."',`link_moblie`='".$link_moblie."'";
			}
			if ($link_type){
				$joblink[]="`link_type`='".$link_type."'";
			}
			if($id){
				delfiledir("../data/upload/tel/".$this->uid);
				$linkid=$this->obj->DB_select_once("company_job_link","`uid`='".$this->uid."' and `jobid`='".$id."'","id");
				if($linkid['id']){
					if($tblink==1){
						$this->obj->DB_update_all("company_job_link",@implode(',',$joblink),"`uid`='".$this->uid."'");
						$this->obj->DB_update_all("company_job","`link_type`='2'","`uid`='".$this->uid."'");
					}else{
						$this->obj->DB_update_all("company_job_link",@implode(',',$joblink),"`id`='".$linkid['id']."'");
					}
				}else{
					$joblink[]="`uid`='".$this->uid."'";
					$sid=$this->obj->DB_insert_once("company_job_link",@implode(',',$joblink).",`jobid`='".(int)$nid."'");
					if($sid && $tblink==1){
						$this->obj->DB_update_all("company_job_link",@implode(',',$joblink),"`uid`='".$this->uid."'");
						$this->obj->DB_update_all("company_job","`link_type`='2'","`uid`='".$this->uid."'");
					}
				}
			}else if($nid>0){
				$joblink[]="`uid`='".$this->uid."'";
				$sid=$this->obj->DB_insert_once("company_job_link",@implode(',',$joblink).",`jobid`='".(int)$nid."'");
				if($sid && $tblink==1){
					$this->obj->DB_update_all("company_job_link",@implode(',',$joblink),"`uid`='".$this->uid."'");
					$this->obj->DB_update_all("company_job","`link_type`='2'","`uid`='".$this->uid."'");
				}
			}
			if($nid && $_POST['xuanshang']){
				$nid=$this->company_invtal($this->uid,$_POST['xuanshang'],false,"发布竟价职位",true,2,'integral',11);
			}
			if($nid){
				$this->obj->member_log($name."《".$_POST['name']."》",1,$type);
				if($id==''){
					$this->ACT_layer_msg($name."成功！",9,$nid);
				}else{
					$this->ACT_layer_msg($name."成功！",9,$id);
				}
			}else{
				$this->ACT_layer_msg($name."失败！",8,$_SERVER['HTTP_REFERER']);
			}
		}
	}

	function add_fake_action(){

        $_POST = $this->array_iconv("utf-8","gbk",$_POST);

	    $data['truename'] = $_POST['truename']?$_POST['truename']:$this->error_msg("参数错误");
	    $data['companyname']= $_POST['companyname']?$_POST['companyname']:$this->error_msg("参数错误");
	    $data['hy'] = $_POST['hy']?$_POST['hy']:$this->error_msg("参数错误");
//	    $data['provinceid'] = $_POST['province']?$_POST['province']:$this->error_msg("参数错误");
//	    $data['cityid'] = $_POST['city'];
        $data['nature'] = $_POST['nature']?$_POST['nature']:$this->error_msg("参数错误");
	    $data['scale'] = $_POST['scale']?$_POST['scale']:$this->error_msg("参数错误");
	    $data['introduce'] = $_POST['introduce']?$_POST['introduce']:$this->error_msg("参数错误");
        $data['addtime'] = time();
        $data['uid'] = $this->uid;

        if($_POST['fake_id']){
            $r = $this->obj->update_once("fake_company",$data,"id=".$_POST['fake_id']." and uid=".$this->uid);
        }else{
            $r = $this->obj->insert_into("fake_company",$data);
        }

        if($r){
            echo 1;exit();
        }
    }
}
?>