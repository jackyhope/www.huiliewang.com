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
class expect_controller extends user{
	function index_action(){
		include(CONFIG_PATH."db.data.php");
		unset($arr_data['sex'][3]);
		$this->yunset("arr_data",$arr_data);
		$info = $this->obj->DB_select_once("resume_index","`uid`='".$this->uid."'");
		$resume=$this->obj->DB_select_once("resume","`uid`='".$this->uid."'");
        $resume = array_merge($info,$resume);

        $resume_work = unserialize($resume['work_content']);
        $resume_edu = unserialize($resume['edu_content']);
        $resume_project = unserialize($resume['project_content']);

		$this->yunset($this->MODEL('cache')->GetCache(array('job','city','hy','user','industry')));
		include PLUS_PATH."/job.cache.php";
		include PLUS_PATH."/city.cache.php";
		$this->user_cache();
		$save=$this->obj->DB_select_once("lssave","`uid`='".$this->uid."'and `savetype`='2'");
		$save=unserialize($save['save']);
		if($save['lastupdate']){
			$save['time']=date('H:i',ceil(($save['lastupdate'])));
		}
		$this->yunset("save",$save);
		if($resume['birthday']){
			$a=date('Y',strtotime($resume['birthday']));
			$resume['age']=date("Y")-$a;
		}
		if ($resume['tag']){
		    $resume['arrayTag']=explode(',', $resume['tag']);
		}

		$job_classid[0] = $resume['jobs_id']?$resume['jobs_id']:"";
		$job_classid[1] = $resume['jobs_id1']?$resume['jobs_id1']:"";
		$job_classid[2] = $resume['jobs_id2']?$resume['jobs_id2']:"";
		$job_classid = array_filter($job_classid);

        $job_classname = "";
		foreach ($job_classid as $list){
            $job_classname[] = $job_name[$list];
        }


        $city[0] = $resume['city']?$resume['city']:"";
        $city[1] = $resume['city1']?$resume['city1']:"";
        $city[2] = $resume['jobs_id2']?$resume['jobs_id2']:"";
        $city = array_filter($city);
        $hope_cityname = "";
        foreach ($city as $list){
            $hope_cityname[] = $city_name[$list];
        }

        $resume['job_classname'] = implode(",",$job_classname);
        $resume['job_classid'] = implode(",",$job_classid);
        $resume['hope_cityname'] = implode(",",$hope_cityname);
        $resume['hope_city'] = implode(",",$city);
        $resume['salary_n'] = $resume['salary']*$resume['salary_month'];
        $this->yunset('resume',$resume);

		$this->public_action();
		$this->user_left();
		$this->yunset("layerv",5);
		$this->yunset("js_def",2);
	    if($_GET['e']){
			$rows=$this->obj->DB_select_all("resumetpl","`status`='1' order by `id` asc");
			$statis=$this->obj->DB_select_once("member_statis","`uid`='".$this->uid."'",'`tpl`,`paytpls`');
			if($statis['paytpls']){
				$paytpls=@explode(',',$statis['paytpls']);
				$this->yunset("paytpls",$paytpls);
			}  
			$this->yunset("statis",$statis);
			$this->yunset("rows",$rows);
			$this->yunset("work",$resume_work);
			$this->yunset("edu",$resume_edu);
			$this->yunset("project",$resume_project);
	        $this->user_tpl('expect/expect');

	    }else{
	        $this->user_tpl('expect/expect_add');
	    }
	}
	function saveexpect_action(){
		if($_POST['submit']){
			$eid=(int)$_POST['eid'];
			unset($_POST['submit']);
			unset($_POST['eid']);
			unset($_POST['urlid']);
			unset($_POST['annex']);
			unset($_POST['dom_sort']);
			$where['id']=$eid;
			$where['uid']=$this->uid;
			$_POST['lastupdate']=time();

			$resumearr=array('lastupdate'=>time());
			if($eid==""){
				$_POST['did']=$this->userdid;
				$_POST['uid']=$this->uid;
				$_POST['ctime']=time();
                $_POST['defaults']=$num<=0?1:0;
                $index_id = $this->obj->DB_select_once("resume_index","uid=".$this->uid,"id");
                $index_id = $index_id['id'];
                $_POST['resume_id'] = $index_id;
				$nid=$this->obj->insert_into($this->get_hash_table('resume',$index_id),$_POST);
				if ($nid){
					$data['uid'] = $this->uid;
					$data['eid'] = $nid;
					$this->obj->insert_into("user_resume",$data);
					$resume_num=1;
					$this->obj->DB_update_all('member_statis',"`resume_num`='".$resume_num."'","`uid`='".$this->uid."'");
					$state_content = "发布了 <a href=\"".Url('resume',array("c"=>'show',"id"=>$nid))."\" target=\"_blank\">新简历</a>。";

					$fdata['uid']	  = $this->uid;
					$fdata['content'] = $state_content;
					$fdata['ctime']   = time();
					$fdata['type']   = 2;
					$this->obj->insert_into("friend_state",$fdata);
					$this->obj->member_log("创建一份简历",2,1);
					$num=$this->obj->DB_select_num("company_pay","`com_id`='".$this->uid."' AND `pay_remark`='发布简历'");
					if($num<1){
						$this->get_integral_action($this->uid,"integral_add_resume","发布简历");
					}
					$this->warning("3");
				}
				$eid=$nid;
			}else{
				$nid=$this->obj->update_once("resume",$_POST,$where);
				$job_classid = explode(",",$_POST['job_classid']);
				$_POST['jobs_id'] = $job_classid[0]?$job_classid[0]:"";
				$_POST['jobs_id1'] = $job_classid[1]?$job_classid[1]:"";
				$_POST['jobs_id2'] = $job_classid[2]?$job_classid[2]:"";

                $citys_id = explode(",",$_POST['citys_id']);
                $_POST['city'] = $citys_id[0]?$citys_id[0]:"";
                $_POST['city1'] = $citys_id[1]?$citys_id[1]:"";
                $_POST['city2'] = $citys_id[2]?$citys_id[2]:"";
                unset($_POST['job_classid']);
                unset($_POST['citys_id']);
                $this->obj->update_once("resume_index",$_POST,$where);

				$this->obj->member_log("修改简历",2,2);
			}
//			$this->obj->update_once('user_resume',array('expect'=>1),array('eid'=>$eid,'uid'=>$this->uid));
			if($nid){
				$resume=$this->obj->DB_select_once("resume","`id`='".$eid."'");
				include PLUS_PATH."/user.cache.php";
				include PLUS_PATH."/job.cache.php";
				include PLUS_PATH."/city.cache.php";
				include PLUS_PATH."/industry.cache.php";
				$resume['report']=$userclass_name[$resume['report']];
				$resume['hy']=$industry_name[$resume['hy']];
				$resume['city']=$city_name[$resume['provinceid']]." ".$city_name[$resume['cityid']]." ".$city_name[$resume['three_cityid']];
				$resume['jobstatus']=$userclass_name[$resume['jobstatus']];
				if($resume['jobs_classid']!=""){
					$job_classid=@explode(",",$resume['jobs_classid']);
					foreach($job_classid as $v){
						$job_classname[]=$job_name[$v];
					}
					$resume['job_classname']=implode(" ",$job_classname);
				}

                if($resume['citys_id']!=""){
                    $citys_id=@explode(",",$resume['citys_id']);
                    foreach($citys_id as $v){
                        $city_classname[]=$city_name[$v];
                    }
                    $resume['city']=implode(" ",$city_classname);
                }

				if(is_array($resume)){
					foreach($resume as $k=>$v){
						$arr[$k]=iconv("gbk","utf-8",$v);
					}
				}

				echo json_encode($arr);die;
			}else{
				echo 0;die;
			}
		}
	}

	function add_action(){

		if($_POST['submit']){
//		    var_dump($_POST);exit();
			$_POST=$this->post_trim($_POST);
			if($_POST['uname']==""){$this->ACT_layer_msg("请填写真实姓名！",8);}
			if($_POST['sex']==""){$this->ACT_layer_msg("请选择性别！",8);}
			if($_POST['birthday']==""){$this->ACT_layer_msg("请选择出生日期！",8);}
			if($_POST['living']==""){$this->ACT_layer_msg("请填写现居住地！",8);}
			if($_POST['edu']==""){$this->ACT_layer_msg("请选择最高学历！",8);}
			if($_POST['exp']==""){$this->ACT_layer_msg("请选择工作经验！",8);}
			if($_POST['telphone']==""){$this->ACT_layer_msg("请填写手机号码！",8);}

//			if($_POST['name']==""){$this->ACT_layer_msg("请填写简历名称！",8);}
			if($_POST['hy']==""){$this->ACT_layer_msg("请选择从事行业！",8);}
			if($_POST['job_class']==""){$this->ACT_layer_msg("请选择期望职位！",8);}
//			if($_POST['minsalary']==""){$this->ACT_layer_msg("请填写期望薪资！",8);}
//			elseif($_POST['maxsalary']&&(int)$_POST['minsalary'] > (int)$_POST['maxsalary']){$this->ACT_layer_msg("最高薪资必须大于最低薪资！",8);}

//			if($_POST['citysid']==""){$this->ACT_layer_msg("请选择工作地区！",8);}

//			if($_POST['type']==""){$this->ACT_layer_msg("请选择工作性质！",8);}
			if($_POST['report']==""){$this->ACT_layer_msg("请选择到岗时间！",8);}
			if($_POST['jobstatus']==""){$this->ACT_layer_msg("请选择求职状态！",8);}


            $is_exist_mobile=$this->obj->DB_select_num("member","`uid`<>'".$this->uid."' and `mobile`='".$_POST['telphone']."'","`uid`");
            $is_exist_mobile1=$this->obj->DB_select_num("resume","`uid`<>'".$this->uid."' and `telphone`='".$_POST['telphone']."'","`uid`");
            if($is_exist_mobile || $is_exist_mobile1){
                $this->ACT_layer_msg("手机已存在！",8);
            }

            $is_exist_email=$this->obj->DB_select_num("resume","`uid`<>'".$this->uid."' and `email`='".$_POST['email']."'","`uid`");
            if($is_exist_email){
                $this->ACT_layer_msg("邮箱已存在！",8);
            }

			unset($_POST['submit']);
			delfiledir("../data/upload/tel/".$this->uid);
//			$where['uid']=$this->uid;

			if($_POST['job_class']){
			    $job_class = explode(",",$_POST['job_class']);
			    $jobs_id  = $job_class[0]?$job_class[0]:"";
			    $jobs_id1 = $job_class[1]?$job_class[1]:"";
			    $jobs_id2 = $job_class[2]?$job_class[2]:"";
            }

            if($_POST['city_class']){
                $city_class = explode(",",$_POST['city_class']);
                $city  = $city_class[0]?$city_class[0]:"";
                $city1 = $city_class[1]?$city_class[1]:"";
                $city2 = $city_class[2]?$city_class[2]:"";
            }


			$infoDate = array(
				"sex"		    =>	$_POST['sex'],
				"birthday"	    =>	strtotime($_POST['birthday']),
                "hy"		    =>	$_POST['hy'],
				"edu"		    =>	$_POST['edu'],
				"exp"		    =>	$_POST['exp'],
				"jobs_id"      =>  $jobs_id,
				"jobs_id1"     =>  $jobs_id1,
				"jobs_id2"     =>  $jobs_id2,
				"city"         =>   $city,
				"city1"        =>   $city1,
				"city2"        =>   $city2,
				"living"	    =>	$_POST['living'],
                "salary_month"	=>	$_POST['salary_month'],
                "salary"	    =>	$_POST['salary'],
                "report"		=>	$_POST['report'],
                "jobstatus"	=>	$_POST['jobstatus'],
				"lastupdate"   =>  time()
			);

            $expectDate = array(
                "sex"		    =>	$_POST['sex'],
                "birthday"	    =>	strtotime($_POST['birthday']),
                "hy"		    =>	$_POST['hy'],
                "edu"		    =>	$_POST['edu'],
                "exp"		    =>	$_POST['exp'],
                "living"	    =>	$_POST['living'],
                "salary_month"	=>	$_POST['salary_month'],
                "salary"	    =>	$_POST['salary'],
                "report"		=>	$_POST['report'],
                "jobstatus"	=>	$_POST['jobstatus'],
                "jobs_classid"=>$_POST['job_class'],
                "citys_id"     =>$_POST['city_class'],
                "name"		    =>	$_POST['uname'],
                "telphone"		=>	$_POST['telphone'],
                "email"		    =>	$_POST['email'],
                "lastupdate"	=>	time(),
                "uid"			=>	$this->uid,
                "r_status"     =>1,
                "integrity"	=>	55,
                "resume_name"  =>$_POST['uname']."的简历"
            );

            $where = "uid=".$this->uid;
			$this->obj->update_once('resume_index',$infoDate,$where);
			$this->obj->update_once('resume',$expectDate,$where);
            $row = $this->obj->DB_select_once("resume_index",$where,"id,birthday");
            $nid = $row['id'];

			unset($where);
			if (1==1){
				$this->obj->DB_delete_all("lssave","`uid`='".$this->uid."'and `savetype`='2'");

				$resume_num=1;
				$data['uid'] = $this->uid;
				$data['eid'] = $nid;
				$data['expect'] ='1';
				$this->obj->insert_into("user_resume",$data);
				$this->obj->DB_update_all('member_statis',"`resume_num`='".$resume_num."'","`uid`='".$this->uid."'");
				$state_content = "发布了 <a href=\"".Url("resume",array("c"=>"show","id"=>$nid))."\" target=\"_blank\">新简历</a>。";
				$fdata['uid']	  = $this->uid;
				$fdata['content'] = $state_content;
				$fdata['ctime']   = time();
				$fdata['type']   = 2;
				$this->obj->insert_into("friend_state",$fdata);
				$this->obj->member_log("创建一份简历",2,1);
                $this->company_invtal($this->uid,$this->config['integral_userinfo'],true,"首次填写基本资料",true,2,'integral',25);
				$num=$this->obj->DB_select_num("company_pay","`com_id`='".$this->uid."' AND `pay_remark`='发布简历'");
				if($num<1){
					$this->get_integral_action($this->uid,"integral_add_resume","发布简历");
				}
				$this->warning("3");
			}
			if($this->config['resume_status']){
				$this->ACT_layer_msg("简历创建成功，继续完善！",9,'index.php?c=expect&act=success&e='.$nid);
			}else{
				$this->ACT_layer_msg("简历创建成功，等待审核，您可以继续完善！",9,'index.php?c=expect&act=success&e='.$nid);
			}
		}
	}
		
	function success_action(){
		if($_GET['e']){
			$this->yunset('id',$_GET['e']);
			$info=$this->obj->DB_select_once("resume","`uid`='".$this->uid."'");
			$this->yunset("info",$info);
			$this->user_tpl('expect/expect_success');
		}else{
			header("Location:index.php?c=expect");
		}
	}
    function save_resume_name_action(){
        if(!is_numeric($_POST['eid'])){
			 $this->ACT_layer_msg("简历编号格式不正确！",8,$_SERVER['HTTP_REFERER'],2,0);die;
        }
        if(!$this->CheckRegUser($_POST['name'])){
            $this->ACT_layer_msg("简历名称包含特殊字符！",8,$_SERVER['HTTP_REFERER'],2,0);die;
        }
        $IsSuccess=$this->obj->update_once('resume',array('resume_name'=>$_POST['name']),array('uid'=>$this->uid,'id'=>$_POST['eid']));
        $this->obj->update_once('resume',array('lastupdate'=>time()),array('uid'=>$this->uid));
        if($IsSuccess){
            $this->ACT_layer_msg("修改成功！",9,$_SERVER['HTTP_REFERER'],2,0);die;
        }else{
            $this->ACT_layer_msg("修改失败！",8,$_SERVER['HTTP_REFERER'],2,0);die;
        }
    }
	function savedescription_action(){
		if(!is_numeric($_POST['eid'])){
             $this->ACT_layer_msg("简历编号格式不正确！",8,$_SERVER['HTTP_REFERER'],2,0);die;
        }
        $IsSuccess=$this->obj->update_once('resume',array('description'=>yun_iconv('utf-8','gbk',$_POST['description'])),array('uid'=>$this->uid));
        if($IsSuccess){
            echo 1;die;
        }else{
            echo 0;die;
        }
    }
	function work_action(){
		$this->resume("resume_work","work","expect","填写工作经验");
		$this->public_action();
	}
	function edu_action(){
		$this->resume("resume_edu","edu","training","填写教育经历");
		$this->public_action();
		$this->user_tpl('edu');
	}
	function training_action(){
		$this->resume("resume_training","training","cert","填写培训经历");
		$this->public_action();
		$this->user_tpl('training');
	}
	function project_action(){
		$this->resume("resume_project","project","edu","填写项目经历");
		$this->public_action();
		$this->user_tpl('project');
	}
	function skill_action(){
		$this->resume("resume_skill","skill","expect","填写专业技能");
		$this->public_action();
	}
	function cert_action(){
		$this->resume("resume_cert","cert","other","填写证书信息");
		$this->public_action();
		$this->user_tpl('cert');
	}
	function other_action(){
		$this->resume("resume_other","other","resume","返回简历管理");
		$this->public_action();
		$this->user_tpl('other');
	}
	function saveall_action(){

	    $_POST=$this->post_trim($_POST);
	    $files=$this->buildInfo();
	    if($_POST['submit']){
	        unset($_POST['submit']);
	        $eid=intval($_POST['eid']);
	        if(!is_numeric($eid)){
	            $this->ACT_layer_msg("简历编号格式不正确！",8,$_SERVER['HTTP_REFERER'],2,0);die;
	        }
            $index_id = $this->obj->DB_select_once("resume_index","uid=".$this->uid,"id");
            $resume = $this->obj->DB_select_once("resume","uid=".$this->uid);
            $index_id = $index_id['id'];
            $table=$this->get_hash_table("resume",$index_id);
            $where = "id=".$eid;

            for($i=0;$i<count($_POST['startDateStr']);$i++){
                if($_POST['table']=="work"){
                    $data[$i]['startDateStr'] = strtotime($_POST['startDateStr'][$i]);
                    $data[$i]['endDateStr'] = strtotime($_POST['endDateStr'][$i]);
                    $data[$i]['companyName'] = $_POST['companyName'][$i];
                    $data[$i]['posName'] = $_POST['posName'][$i];
                    $data[$i]['companyDes'] = $_POST['companyDes'][$i];
                    $data[$i]['workDes'] = $_POST['workDes'][$i];
                }

                if($_POST['table']=="edu"){
                    $data[$i]['startDateStr'] = strtotime($_POST['startDateStr'][$i]);
                    $data[$i]['endDateStr'] = strtotime($_POST['endDateStr'][$i]);
                    $data[$i]['schoolName'] = $_POST['schoolName'][$i];
                    $data[$i]['majorName'] = $_POST['majorName'][$i];
                    $data[$i]['degree'] = $_POST['degree'][$i];
                }

                if($_POST['table']=="project"){
                    $data[$i]['startDateStr'] = strtotime($_POST['startDateStr'][$i]);
                    $data[$i]['endDateStr'] = strtotime($_POST['endDateStr'][$i]);
                    $data[$i]['proName'] = $_POST['proName'][$i];
                    $data[$i]['proDes'] = $_POST['proDes'][$i];
                    $data[$i]['projectOffice'] = $_POST['projectOffice'][$i];
                    $data[$i]['subCompany'] = $_POST['subCompany'][$i];
                    $data[$i]['projectRole'] = $_POST['projectRole'][$i];
                    $data[$i]['projectPerfromnance'] = $_POST['projectPerfromnance'][$i];
                }
            }
            $data = array_filter($data);
            if($_POST['table']=="work"){
                $data = serialize($data);
                $nid = $this->obj->update_once("resume",array("work_content"=>$data),$where);
                $num = 3;
            }
            if($_POST['table']=="edu"){

                $data = serialize($data);
                $nid = $this->obj->update_once("resume",array("edu_content"=>$data),$where);
                $num = 4;
            }

            if($_POST['table']=="project"){
                $data = serialize($data);
                $nid = $this->obj->update_once("resume",array("project_content"=>$data),$where);
                $num = 7;
            }


	        if($nid){
	            $resume_row=$this->obj->DB_select_once("user_resume","`eid`='".$eid."'");
	            $numresume=$this->complete($resume_row);
	            echo '<input id="resumeAll" type="hidden" value='.$num.'><input id="integrity" type="hidden" value="'.$numresume.'"><input id="upnum" type="hidden" value="'.$resume_row[$_POST['table']].'">';
	        }else{
	            echo '<input id="resumeAll" type="hidden" value="2">';
	        }
	    }
	}
	function saveannex_action(){ 
		if($_FILES[annex][name]==''){
			$this->ACT_layer_msg("请选择文件！",8);
		}else {
			$nametype=@explode('.',$_FILES[annex][name]);
			$ntype=array('doc', 'docx');
			if(!in_array(strtolower(end($nametype)),$ntype)){
				$this->ACT_layer_msg("请上传doc、docx格式文件！",8);
			}
			if($_FILES[annex][size]>2100000){
				$this->ACT_layer_msg("最大可上传2M文件！",8);
			} 
			$upload="upload/annex/".time().$this->uid.'.'.strtolower(end($nametype));
			$urlname="./data/".$upload;
			$pathname=DATA_PATH.$upload;
			$result=move_uploaded_file($_FILES[annex][tmp_name],$pathname);
			if($result==true){
				$info=$this->obj->DB_select_once("resume_expect","`uid`='".$this->uid."' and `id`='".intval($_POST['eid'])."'",'annex');
				if($info['annex']!=''){
					@unlink('.'.$info['annex']);
				}
				$this->obj->update_once('resume_expect',array('annex'=>$urlname,'annexname'=>$_FILES[annex]['name']),array('id'=>intval($_POST['eid']),'uid'=>$this->uid));
				$this->ACT_layer_msg("上传成功！",9,'index.php?c=expect&e='.intval($_POST['eid'].'#annex_upbox'));
			}else{
				$this->ACT_layer_msg("上传失败！",8,'index.php?c=expect&e='.intval($_POST['eid'].'#annex_upbox'));
			}
		}
	}
	function delannex_action(){
		$info=$this->obj->DB_select_once("resume_expect","`uid`='".$this->uid."' and `id`='".intval($_GET['id'])."'",'annex');
		if($info['annex']!=''){
			@unlink('.'.$info['annex']);
		}
		$this->obj->update_once('resume_expect',array('annex'=>'','annexname'=>''),array('id'=>intval($_GET['id']),'uid'=>$this->uid));
		$this->layer_msg('附件删除成功！',9,0,$_SERVER['HTTP_REFERER']);
	}
	function showresume_action(){
	    $_POST=$this->post_trim($_POST);

	    if($_POST['resume']=='description'){
	        $info=$this->obj->DB_select_once('resume',"`uid`='".$this->uid."'","`tag`,`description`");
	        $html='<li class=" yun_resume_exp_list"><i class="resume_skill_icon"></i><div class="yun_resume_exp_p"><em id="description">'.$info['description'].'</em></div></li>';

			if($info['tag']){
				$tags = explode(',',$info['tag']);
				$taghtml='';
				foreach($tags as $v){
					$taghtml .= '<span>'.$v.'</span>';
				}
				$html.='<li class=" yun_resume_exp_list"><i class="resume_skill_icon"></i><div class="yun_resume_p_bbq">'.$taghtml.'</div></li>';
			}
	        echo $html;die();
	    }
	    $table='resume_'.$_POST['resume'];
	    if($_POST['eid']){
	        $eid=intval($_POST['eid']);
	        include(PLUS_PATH."user.cache.php");


	        $tables=array("resume_expect","resume_skill","resume_work","resume_project","resume_edu","resume_training","resume_cert","resume_other");
	        if(!in_array($table,$tables)){
	            echo $table;
	            exit();
	        }
	        if($table=='resume_work'){

                $info=$this->obj->DB_select_once("resume","id=".$eid,"work_content");
	            $info = unserialize($info['work_content']);
	            if(is_array($info)){
	                foreach ($info as $v){
	                    $v['startDateStr']=date("Y.m",$v['startDateStr']);
	                    if($v['endDateStr']>0){
	                        $v['endDateStr']=date("Y.m",$v['endDateStr']);
	                    }else{
	                        $v['endDateStr']='至今';
	                        $v['totoday']='1';
	                    }
	                    $html.="<li class='yun_resume_exp_list' id='work".$v['id']."'><div class='yun_resume_exp_timt'>".$v['startDateStr']."-".$v['endDateStr']."</div><div class='yun_resume_exp_r'><div class='yun_resume_exp_name'>".$v['companyName']."<span class='yun_resume_exp_name_job'>".$v['posName']."</span></div><div class='yun_resume_exp_p'>".$v['workDes']."</div></div></li>";
	                }
	                echo $html;die;
	            }
	        }
	        if($table=='resume_edu'){
                $info=$this->obj->DB_select_once("resume","id=".$eid,"edu_content");
                $info = unserialize($info['edu_content']);
	            if(is_array($info)){
	                foreach ($info as $v){
	                    $v['startDateStr']=date("Y.m",$v['startDateStr']);
	                    if($v['endDateStr']>0){
	                        $v['endDateStr']=date("Y.m",$v['endDateStr']);
	                    }else{
	                        $v['endDateStr']='';
	                    }
	                    $html.="<li class='yun_resume_exp_list' id='edu".$v['id']."'><div class='yun_resume_exp_timt'>".$v['startDateStr']."-".$v['endDateStr']."</div><div class='yun_resume_exp_r'><div class='yun_resume_exp_name'>".$v['schoolName']."<span class='yun_resume_exp_name_job'>".$userclass_name[$v['degree']]."</span></div><div class='yun_resume_exp_p'>".$v['majorName']."<span class='yun_resume_exp_name_job'>".$v['title']."</span></div></div></li>";
	                }
	                echo $html;die;
	            }
	        }
	        if($table=='resume_training'){
	            $info=$this->obj->DB_select_all($table,"`eid`='".$eid."' and `uid`='".$this->uid."' order by `sdate` desc","`id`,`name`,`title`,`content`,`sdate`,`edate`");
	            if(is_array($info)){
	                foreach ($info as $v){
	                    $v['sdate']=date("Y.m",$v['sdate']);
	                    if($v['edate']>0){
	                        $v['edate']=date("Y.m",$v['edate']);
	                    }else{
	                        $v['edate']='';
	                    }
	                    $html.="<li class='yun_resume_exp_list' id='training".$v['id']."'><div class='yun_resume_exp_timt'>".$v['sdate']."-".$v['edate']."</div><div class='yun_resume_exp_r'><div class='yun_resume_exp_name'>".$v['name']."<span class='yun_resume_exp_name_job'>".$v['title']."</span></div><div class='yun_resume_exp_p'>".$v['content']."</div></div></li>";
	                }
	                echo $html;die;
	            }
	        }
	        if($table=='resume_skill'){
	            $info=$this->obj->DB_select_all($table,"`eid`='".$eid."' and `uid`='".$this->uid."'","`id`,`name`,`longtime`,`pic`");
	            if(is_array($info)){
	                foreach ($info as $v){
	                    $html.="<li class='yun_resume_exp_list' id='skill".$v['id']."'><i class='resume_skill_icon'></i>技能名称：<span class='resume_table_blod'>".$v['name']."</span> <span class='yun_resume_exp_name_job'>掌握时间：".$v['longtime']."年</span><div class=''>";
	                          if($v['pic']){
	                              $html.="技能证书： <img src='.".$v['pic']."' width='95' height='70' style='vertical-align:middle'> </div></li>";
	                          }else{
	                              $html.="</div></li>";
	                          }
	                                                       
	                                                             
	                }
	                echo $html;die;
	            }
	        }
	        if($table=='resume_project'){
                $info=$this->obj->DB_select_once("resume","id=".$eid,"project_content");
                $info = unserialize($info['project_content']);
	            if(is_array($info)){
	                foreach ($info as $v){
	                    $v['startDateStr']=date("Y.m",$v['startDateStr']);
	                    if($v['endDateStr']>0){
	                        $v['endDateStr']=date("Y.m",$v['endDateStr']);
	                    }else{
	                        $v['endDateStr']='';
	                    }
	                    $html.="<li class='yun_resume_exp_list' id='project".$v['id']."'><div class='yun_resume_exp_timt'>".$v['startDateStr']."-".$v['endDateStr']."</div><div class='yun_resume_exp_r'><div class='yun_resume_exp_name'>".$v['proName']."<span class='yun_resume_exp_name_job'>".$v['projectOffice']."</span></div><div class='yun_resume_exp_p'>".$v['proDes']."</div></div></li>";
	                }
	                echo $html;die;
	            }
	        }
	        if($table=='resume_other'){
	            $info=$this->obj->DB_select_all($table,"`eid`='".$eid."' and `uid`='".$this->uid."'","`id`,`name`,`content`");
	            if(is_array($info)){
	                foreach ($info as $v){
	                    $html.="<li class='yun_resume_exp_list' id='other".$v['id']."'><i class='resume_skill_icon'></i>标题：<span class='resume_table_blod'>".$v['name']."</span><div class='yun_resume_exp_p'>内容：".$v['content']."</div></li>";
	                }
	                echo $html;die;
	            }
	        }
	    }
	}
	function buildInfo(){
	    if($_FILES){
	        $i=0;
	        foreach($_FILES as $v){
	            if(is_string($v['name'])){
	                $files[$i]=$v;
	                $i++;
	            }else{
	                foreach($v['name'] as $key=>$val){
	                    $files[$i]['name']=$val;
	                    $files[$i]['size']=$v['size'][$key];
	                    $files[$i]['tmp_name']=$v['tmp_name'][$key];
	                    $files[$i]['error']=$v['error'][$key];
	                    $files[$i]['type']=$v['type'][$key];
	                    $i++;
	                }
	            }
	        }
	        return $files;
	    }else{
	        return ;
	    }

	}
	function regmoblie_action(){
		if($_POST['telphone']){
			$Member=$this->MODEL("userinfo");
			$num = $Member->GetMemberNum(array("`uid`<>'".$this->uid."' and (moblie='".$_POST['telphone']."' or `username`='".$_POST['telphone']."')"));
			$num1 = $this->obj->DB_select_num("resume","uid<>".$this->uid." and telphone=".$_POST['telphone'],"id");
			if ($num || $num1){
			    echo 1;die;
			}else{	
			    echo 0;die;
			}
		}
	}
	
	function ajaxreg_action(){
		if($_POST['email']){
			$Member=$this->MODEL("userinfo");
			$num = $Member->GetMemberNum(array("`uid`<>'".$this->uid."' and (email='".$_POST['email']."' or `username`='".$_POST['email']."')"));
			if ($num){
			    echo 1;die;
			}else{	
			    echo 0;die;
			}
		}
	}
}
?>