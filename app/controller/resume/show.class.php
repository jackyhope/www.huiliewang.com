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
class show_controller extends resume_controller{

    function test_action(){
        echo 333;exit();
    }

	function index_action(){
	    include(CONFIG_PATH."db.data.php");
		unset($arr_data['sex'][3]);
		$this->yunset("arr_data",$arr_data);

		if(($this->uid==''||$this->username=='')&&$this->config['sy_resume_visitors']>0){ 
			if($_COOKIE['resumevisitors']>=$this->config['sy_resume_visitors']){
				$this->ACT_msg(Url('login'),"游客用户，每天只能访问".$this->config['sy_resume_visitors']."份简历，请登录后继续访问！");
			}else{
				if ($_COOKIE['resumevisitors']==''){
					$resumevisitors=1;
				}else{
					$resumevisitors=$_COOKIE['resumevisitors']+1;
				}
				if($this->config['sy_web_site']=="1"){
					if($this->config['sy_onedomain']!=""){
						$weburl=get_domain($this->config['sy_onedomain']);
					}else{
						$weburl=get_domain($this->config['sy_weburl']);
					}
					SetCookie("resumevisitors",$resumevisitors,time()+86400, "/",$weburl);
				}else{
					SetCookie("resumevisitors",$resumevisitors,time()+86400,"/");
				}
			}
		}

//		if($this->usertype==2){
//            $statis=$this->obj->DB_select_once("company_statis","`uid`='".$this->uid."'");
//        }elseif ($this->usertype==3){
//            $statis=$this->obj->DB_select_once("lietou_statis","`uid`='".$this->uid."'");
//        }
//		if ($statis){
//			$rating=$statis['rating'];
//			$discount=$this->obj->DB_select_once("company_rating","`id`=$rating");
//			$this->yunset("discount",$discount);
//		}
		$packs=$this->obj->DB_select_all("company_service","`display`='1'");
		$pid=intval($_POST['pid']);
		if($pid){
			$packinfo=$this->obj->DB_select_all("company_service_detail","`type` = '$pid' order by `service_price` asc");
			$this->yunset("pid",$pid);
		}else{
			$pack=$this->obj->DB_select_once("company_service","`display`='1'","id");
			$packinfo=$this->obj->DB_select_all("company_service_detail","`type` = '".$pack['id']."' order by `service_price` asc");
		}
		$this->yunset("packs",$packs);
		$this->yunset("packinfo",$packinfo);


		$M=$this->MODEL('resume');

        if((int)$_GET['uid']){
            $resume = $this->obr->DB_select_once("resume","uid=".(int)$_GET['uid']);
        }else if((int)$_GET['id']){
            $resume = $this->obr->DB_select_once("resume","id=".(int)$_GET['id']);
        }else if((int)$_GET['reid']){
            $resume_id = $this->obj->DB_select_once("userid_job"," id=".$_GET['reid'],"eid");
            $id= $resume_id['eid'];
            $resume = $this->obr->DB_select_once("resume","id=".$id);
        }
        $this->obr->DB_update_all("resume","hits=hits+1","id=".$resume['id']);
        if($resume['r_status']<'1'){
            $this->ACT_msg($this->config['sy_weburl'].'/member',"简历正在审核中！");
        }elseif($resume['r_status']=='2'){
            $this->ACT_msg($this->config['sy_weburl'].'/member',"简历暂被锁定，请稍后查看！");
        }elseif($resume['r_status']=='3'){
            $this->ACT_msg($this->config['sy_weburl'].'/member',"简历审核暂未通过！");
        }

		if($resume['id']){
            if($this->usertype==2){
                $down_resume = $this->obj->DB_select_once("down_resume","comid=".$this->uid." and eid=".$resume['id']);
            }else{
                $down_resume = 1;
            }

			$UserinfoM=$this->MODEL('userinfo');
			$UserMember=$UserinfoM->GetMemberOne(array("uid"=>$resume['uid']),array("field"=>"`source`,`email`,`claim`"));
			$this->yunset("UserMember",$UserMember);
			$time=strtotime("-14 day");
			$allnum=$M->SelectUserIdMsgNum(array("uid"=>$resume['uid'],"`datetime`>'".$time."'"));
			$replynum=$M->SelectUserIdMsgNum(array("uid"=>$resume['uid'],"`datetime`>'".$time."' and `is_browse`>'2'"));
			$pre=round(($replynum/$allnum)*100);
			$this->yunset("pre",$pre);
			if($this->usertype==2){
				$JobM=$this->MODEL('job');
				$jobnum=$JobM->GetComjobNum(array("uid"=>$this->uid));
				$this->yunset("jobnum",$jobnum);
			}


            $user = $M->resume_select($resume,$_GET['reid']);

			if(empty($down_resume)){
                $user['email'] = "******";
                $user['telphone'] = "******";
            }

			$user['sex']=$arr_data['sex'][$user['sex']];
			if($_GET['reid']){
                $data['resume_username']=$user['username_n'];
            }

            if(empty($down_resume)){
                $user['name']=substr($user['name'],0,2)."***";
            }
            $data['resume_username']=$user['name'];
			$this->data=$data;
			$this->seo("resume");
            if($user['uid'] && empty($user['username'])){
                $uploader = $this->obj->DB_select_once("lietou","uid=".$user['uid'],"name");
                $user['uploader'] = "猎头/".$uploader['name'];
            }elseif ($user['username']){
                $user['uploader'] = "求职者/".$user['username_n'];
            }else{
                $user['uploader'] = "慧猎网";
            }


			$this->yunset("Info",$user);



            if($_GET['type']=="word"){
                if($user['uid']==$this->uid || $this->usertype==3){
                    $this->yuntpl(array('resume/wordresume'));
                    die;
                }else{
                    $resume=$M->SelectDownResumeOne(array("eid"=>(int)$_GET['id'],"downtime"=>$_GET['downtime']));
                    if(is_array($resume) && !empty($resume)){
                        $this->yuntpl(array('resume/wordresume'));
                    }
                    die;
                }
            }

            if(is_array($user)&&$user&&$this->uid){
                $usermsgnum=$M->SelectUserIdMsgNum(array('fid'=>$this->uid,'uid'=>$user['uid']));
                $this->yunset("usermsgnum",$usermsgnum);
            }
			if($this->usertype=="2" || $this->usertype=="3"){
				$this->yunset("uid",$this->uid);
				$M->RemindDeal("userid_job",array("is_browse"=>"2"),array("com_id"=>$this->uid,"eid"=>(int)$_GET['id']));

				if($this->usertype=="2"){
					$talent_pool=$M->SelectTalentPool(array("eid"=>$id,"cuid"=>$this->uid));
				}else{
                    $talent_pool = $this->obj->DB_select_once("fav_resume","uid=".$this->uid." and eid=".$id,"id");
                }
                $this->yunset("talent_pool",$talent_pool);

				$look_resume=$M->SelectLookResumeOne(array("com_id"=>$this->uid,"resume_id"=>$id));

				if(!empty($look_resume)){
					$M->SaveLookResume(array("datetime"=>time()),array("resume_id"=>$id,"com_id"=>$this->uid));
				}else{
					$data['uid']=$resume['uid'];
					$data['resume_id']=$id;
					$data['com_id']=$this->uid;
					$data['did']=$this->userdid;
					$data['datetime']=time();
					$M->SaveLookResume($data);
					$historyM = $this->MODEL('history');
					$historyM->addHistory('lookresume',$id);
				}
			}

            $this->yunset(array("resumestyle"=>$this->config['sy_weburl']."/app/template/resume"));

            $statis=$this->MODEL('userinfo')->GetUserstatisOne(array('uid'=>$user['uid']),array('field'=>'`tpl`,`paytpls`','usertype'=>1));
            if($statis['paytpls']){
                $paytpls=@explode(',',$statis['paytpls']);
                $this->yunset("paytpls",$paytpls);
            }

            if($_GET['reid']){
                $this->yuntpl(array('resume/resume'));
            }else{
                if($this->usertype==3){
                    $lie_work = $M->lie_work((int)$_GET['id']);
                    $this->yunset("lietou_num",$lie_work['lietou_num']);
                    $this->yunset("job_num",$lie_work['job_num']);
                    $this->yunset("download_num",$lie_work['download_num']);
                    $this->yunset("last_recommend",$lie_work['last_recommend']);
                    $this->yuntpl(array('resume/resume'));
                }else{
                    $this->yuntpl(array('resume/resume'));
                }
            }

		}else{
			$this->ACT_msg($this->config['sy_weburl'],"没有找到该人才！");
		}
    } 
    function GetHits_action() {
        if((int)$_GET['id']){
            $ResumeM=$this->MODEL('resume');
            $ResumeM->AddExpectHits((int)$_GET['id']);
            $hits=$ResumeM->SelectResume(array('id'=>(int)$_GET['id']),'hits');
            echo 'document.write('.$hits['hits'].')';
        }
    }
    
	
	function getPrice_action(){
		if($_POST['comservinceid']){
			$packinfo=$this->obj->DB_select_once("company_service_detail","`id` = '".$_POST['comservinceid']."'","`service_price`");
			
			$statis=$this->obj->DB_select_once("company_statis","`uid`='".$this->uid."'");
			if ($statis){
				$rating=$statis['rating'];
				$discount=$this->obj->DB_select_once("company_rating","`id`=$rating");
			}
			if ($discount['service_discount']){
				$price=$packinfo['service_price']*$discount['service_discount']*0.01;
			}else{
				$price=$packinfo['service_price'];
			}
		}
		echo $price;
	}
    function pay_action(){
	
		if($_POST){
			
			 $M=$this->MODEL('compay');
			 $return  =  $M->buyPackOrder($_POST);
			
			 if($return['order']['order_id'] && $return['order']['id']){
			
				
				echo json_encode(array('error'=>0,'orderid'=>$return['order']['order_id'],'id'=>$return['order']['id']));
					
			 }else{
			
				 
				 echo json_encode(array('error'=>1,'msg'=>iconv('gbk','utf-8',$return['error'])));
			 }
		}else{
			echo json_encode(array('error'=>1,'msg'=>iconv('gbk','utf-8','参数错误，请重试！')));
		
		}
	
	}
    
}
?>