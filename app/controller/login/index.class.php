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
class index_controller extends common{
	function index_action(){
		if($this->uid!=""&&$this->username!=""){
			if($_GET['type']=="out"){
				if($this->config['sy_uc_type']=="uc_center"){
					$M=$this->MODEL();
					$M->uc_open();
					$logout = uc_user_synlogout();
				}elseif($this->config['sy_pw_type']){
					include(APP_PATH."/api/pw_api/pw_client_class_phpapp.php");
					$username=$_SESSION['username'];
					$pw=new PwClientAPI($username,"","");
					$logout=$pw->logout();
					$this->unset_cookie();
				}else{
					$this->unset_cookie();
				}
			}else{
				$this->ACT_msg($this->config['sy_weburl']."/member", "���Ѿ���¼�ˣ�");
			}
		}
		if($_GET['backurl']=='1'){
			setCookie("backurl",$_SERVER['HTTP_REFERER'],time()+60);
		}
		if(!$_GET['usertype']){
			$_GET['usertype']=1;
		}
    $cookie=$_COOKIE['checkurl'];
    $this->yunset("cookie",$cookie);
		$this->yunset("usertype",(int)$_GET['usertype']);
		$this->yunset("loginname",$_COOKIE['loginname']);
		$this->seo("login");
		$this->yun_tpl(array('index'));
	}

	function loginsave_action(){

		$username=yun_iconv("utf-8","gbk",$_POST['username']);

		if($this->uid > 0 && $this->username!=""){
			if($this->usertype=='1'){
				$this->layer_msg('�������Ǹ��˻�Ա��¼״̬!');
			}elseif($this->usertype=='2'){
				$this->layer_msg('����������ҵ��Ա��¼״̬!');
			}
		}

		if($_POST['path']!="index" && !$_POST['act_login']){
			if(strstr($this->config['code_web'],'ǰ̨��¼')){
		    session_start();
		    if(!gtauthcode($this->config,'',$this->config['code_kind'])){
			    if ($this->config['code_kind']=='3'){
						$this->layer_msg('������ť������֤!');
			    }else{
			      $this->layer_msg('��֤�����!');
			    }
			  }
			}
		}

		if($this->config['sy_msg_isopen'] && $this->config['sy_msg_login'] && $_POST['act_login']){
			if(!$this->CheckMoblie($username)){
				$this->layer_msg('�ֻ����벻��ȷ!');
			}
			if(!is_array($this->FetchMoblie($username))){
				$this->layer_msg('�ֻ����벻����!');
			}
			$where=array("moblie"=> $username);
		}else {
		 	if(!$this->CheckRegUser($username) && !$this->CheckRegEmail($username) && ($username!="")){
				$this->layer_msg('�û������������ַ���Ϊ��!');
			}
			$where=array("username"=> $username);
		}

		$Member=$this->MODEL("userinfo");

		if($this->config['sy_uc_type']=="uc_center"  && !$_POST['act_login']){

			$ucinfo = $this->uc_open();
			if(strtolower($ucinfo['UC_CHARSET']) =='utf8' || strtolower($ucinfo['UC_DBCHARSET'])=='utf8'){
				$uname = iconv('gbk','utf-8',$username);
			}else{
				$uname = $username;
			}
			list($uid, $uname, $password, $email) = uc_user_login($uname, $_POST['password']);
			if($uid=='-1'){
				$user = $Member->GetMemberOne(array("username"=>$username),array("field"=>"username,email,uid,password,salt"));
				$pass = md5(md5($_POST['password']).$user['salt']);
				if($pass==$user['password']){
					$uid = $user['uid'];
					$uid = uc_user_register($user['username'],$_POST['password'],$user['email']);
					$uc_user_register_msg_arr = array( 
								 '-1' => '��ǰ�û������Ϸ�',
					       '-2' => '��ǰ�û���������̳��ֹ�Ĵ���',
					       '-4' => '��ǰ�û� Email ��ʽ��������̳����',
					       '-5' => '��ǰ�û� Email ��̳������ע�ᣡ',
					       '-6' => '��ǰ�û� Email ����̳�����û��ظ���'
					      );
					if(array_key_exists($uid,$uc_user_register_msg_arr)){
						$this->layer_msg($uc_user_register_msg_arr[$uid],9,0,'',2);
					}
					list($uid, $username, $password, $email) = uc_user_login($uname, $_POST['password']);
				}else{
					$this->layer_msg('�˻����������!');
				}
			}else if($uid > 0) {
				$ucsynlogin=uc_user_synlogin($uid);
				$msg =  '��¼�ɹ���';
				$user = $Member->GetMemberOne(array("username"=>$username),array("field"=>"`uid`,`usertype`,`email_status`,`status`"));
				
				if(!empty($user)){
					
					if (session_id() == ""){session_start();}
					if($_SESSION['qq']['openid']){
						$Member->UpdateMember(array("qqid"=>$_SESSION['qq']['openid']),array("username"=>$username));
						unset($_SESSION['qq']);
					}
					if($_SESSION['wx']['openid']){
						$udate = array('wxopenid'=>$_SESSION['wx']['openid']);
						if($_SESSION['wx']['unionid']){
							$udate['unionid']  = $_SESSION['wx']['unionid'];
						}
						$Member->UpdateMember($udate,array("username"=>$username));
						unset($_SESSION['wx']);
					}
					if($_SESSION['sina']['openid']){
						$Member->UpdateMember(array("sinaid"=>$_SESSION['sina']['openid']),array("username"=>$username));
						unset($_SESSION['sina']);
					}
					if(!$user['usertype']){
						$this->unset_cookie();
						$this->addcookie("username",$username,time()+3600);
						$this->addcookie("password",$_POST['password'],time()+3600);
						$this->layer_msg($ucsynlogin,9,0,Url("login",array("c"=>"utype"),"1"),2,3);
					}
					
					if($user['status']=="2"){
						$this->layer_msg("�����˺��ѱ�����!",9,0,Url("register",array("c"=>"ok","type"=>2),"1"),2);
					}
					
					if($user['usertype']=="1" && $this->config['user_state']!="1" && $user['status']!="1"){
						$this->layer_msg("����û��ͨ�����!",9,0,Url("register",array("c"=>"ok","type"=>3),"1"),2,0);
					}
					if($user['usertype']=="2" && $this->config['com_status']!="1" && $user['status']!="1"){
						$this->layer_msg("����û��ͨ�����!",9,0,Url("register",array("c"=>"ok","type"=>3),"1"),2,1);
					}
					if($user['usertype']=="3" && $this->config['lt_status']!="1" && $user['status']!="1"){
						$this->layer_msg("����û��ͨ�����!",9,0,Url("register",array("c"=>"ok","type"=>3),"1"),2,1);
					}
					if($user['usertype']=="4" && $this->config['px_status']!="1" && $user['status']!="1"){
						$this->layer_msg("����û��ͨ�����!",9,0,Url("register",array("c"=>"ok","type"=>3),"1"),2,1);
					}
					
					if($this->config['user_status']=="1"){
						if($user['usertype']=='1'){
							$Resume=$this->MODEL("resume");
							$info=$Resume->SelectResumeOne(array("uid"=>$user['uid']),"`name`,`email_status`,`birthday`");
							if($info['email_status']=="1"){
							    $this->layer_msg('�����˻���δ������ȼ���!',9,0,Url("activate",'',"1"),2);
							}
						}
					}
					
					if($_POST['loginname']){
						setcookie("loginname",$username,time()+8640000);
					}
					
					if($user['usertype']=="2"){$this->autoupjob($user['uid'],$user['usertype']);}
					
				}else{
					$this->unset_cookie();
					$this->addcookie("username",$username,time()+3600);
					$this->addcookie("password",$_POST['password'],time()+3600);
					$this->layer_msg($ucsynlogin,9,0,Url("login",array("c"=>"utype"),"1"),2,3);
				}
				$this->layer_msg($ucsynlogin,9,0,$this->config['sy_weburl']."/member",2,2);

			} elseif($uid == -2) {
				$msg =  '�������';
			} elseif($uid == -3)  {
				$msg = '��̳��ȫ���ʴ���!';
			}else{
				$msg = '��¼ʧ��!';
			}
			$this->layer_msg($ucsynlogin,9,0,Url("login",array("c"=>"utype"),"1"),2,3);
		}else{

			$user = $Member->GetMemberOne($where,array("field"=>"`pw_repeat`,`pwuid`,`uid`,`username`,`salt`,`email`,`password`,`usertype`,`status`,`email_status`,`did`,`login_date`"));

			if(is_array($user)){
				if($this->config['sy_pw_type']=="pw_center"){
					if($user['pw_repeat']!="1"){
						include(APP_PATH."/api/pw_api/pw_client_class_phpapp.php");
						$pw=new PwClientAPI($username,$_POST['password'],"");
						$pwuser =$pw->user_login();
						if($pwuser['uid']>0){
							if(empty($user)){
								
								$user = $this->newuser($Member,$pwuser['username'],$pwuser['password'],$pwuser['email'],$user['usertype'],$pwuser['uid'],$qqid);
							}else if($pwuser['uid']==$user['pwuid']){
								$pwrows=$pw->login($pwuser['uid']);
								$this->add_cookie($user['uid'],$user['username'],$user['salt'],$user['email'],$user['password'],$user['usertype'],$_POST['loginname'],$user['did']);
								$logtime=date("Ymd",$user['login_date']);
								$nowtime=date("Ymd",time());

								if($logtime!=$nowtime){
									$this->get_integral_action($user['uid'],"integral_login","��Ա��¼");
								} 
								$this->layer_msg('��¼�ɹ�!',9,0,Url("login",array("c"=>"utype"),"1"),2,2);
							}else{
								$Member->UpdateMember(array("pw_repeat"=>"1"),array("uid"=>$user['uid']));
							}
						}
					}
				} elseif ($this->config['sy_msg_isopen'] && $this->config['sy_msg_login'] && $_POST['act_login']) {
					$cert_validity = 1800;
					$cert_arr = $this->obj->DB_select_once("company_cert","`uid`='".$user['uid']."' and type='2' order by id desc");
					if (is_array($cert_arr)) {
						if((time()-$cert_arr['ctime']) <= $cert_validity){
						 	$res = $_POST['password'] == $cert_arr['check2'] ? true : false;
						 	if($res == false){
						 		$this->layer_msg('������֤�����'); 
						 	}
						}else {
						 	$this->layer_msg('��֤����֤��ʱ�������µ��������֤�룡'); 
						}
					}else {
					 	$this->layer_msg('��֤�뷢�Ͳ��ɹ��������µ�����Ͷ�����֤�룡'); 
					}
				}else{
					$res = md5(md5($_POST['password']).$user['salt']) == $user['password'] ? true : false;
				}
				
				if($res){
					if($user['status']=="2"){
						$this->layer_msg('�����˺��ѱ�����!',9,0,Url("register",array("c"=>"ok","type"=>2),"1"),2);
					}
					
					if($user['usertype']=='1'){
						$Resume=$this->MODEL("resume");
						$info=$Resume->SelectResumeOne(array("uid"=>$user['uid']),"`name`,`email_status`,`birthday`");
						if($this->config['user_status']=="1" && $info['email_status']!="1"){
							$this->layer_msg('�����˻���δ������ȼ���!',9,0,Url("activate",'',"1"),2);
						}

						if($this->config['user_state']!="1" && $user['status']!="1"){
							$this->layer_msg("����û��ͨ�����!",9,0,Url("register",array("c"=>"ok","type"=>3),"1"),2,0);
						}
					}elseif($user['usertype']=='2'){
						if($this->config['com_status']!="1" && $user['status']!="1"){
							 $this->layer_msg('����û��ͨ�����!',9,0,Url("register",array("c"=>"ok","type"=>3),"1"),2,1);
						}
						$Company=$this->MODEL("company");
						$info=$Company->GetCompanyInfo(array("uid"=>$user['uid']),array("field"=>'name'));
						$this->autoupjob($user['uid'],$user['usertype']);
					}elseif($user['usertype']=='4'){//TrainInfo
						if($this->config['px_status']!="1" && $user['status']!="1"){
							$this->layer_msg('����û��ͨ�����!',9,0,Url("register",array("c"=>"ok","type"=>3),"1"),2,1);
						}
						$Train=$this->MODEL("train");
						$info=$Train->GetTrainInfo(array("uid"=>$user['uid']),array("field"=>"`name`"));
					}
					

					if($qqid){
						$Member->UpdateMember(array("qqid"=>$qqid,"username"=>$username),array("uid"=>$user['uid']));
					}
					if (session_id() == ""){session_start();}
					if($_SESSION['qq']['openid']){
						$Member->UpdateMember(array("qqid"=>$_SESSION['qq']['openid']),array("username"=>$username));
						unset($_SESSION['qq']);
					}
				
					if($_SESSION['wx']['openid']){
						$udate = array('wxopenid'=>$_SESSION['wx']['openid']);
						if($_SESSION['wx']['unionid']){
							$udate['unionid']  = $_SESSION['wx']['unionid'];
						}
						$Member->UpdateMember($udate,array("username"=>$username));
						unset($_SESSION['wx']);
					}
					
					if($_SESSION['sina']['openid']){
						$Member->UpdateMember(array("sinaid"=>$_SESSION['sina']['openid']),array("username"=>$username));
						unset($_SESSION['sina']);
					}
				
					$ip = fun_ip_get();
					$Member->UpdateMember(array("login_ip"=>$ip,"login_date"=> time(),"`login_hits`=`login_hits`+1"),array("uid"=>$user['uid']));
					
					$state_content = "��¼�ɹ�";
					$this->obj->DB_insert_once("login_log","`uid`='".$user['uid']."',`content`='".$state_content."',`ip`='".$ip."',`usertype`='".$user['usertype']."',`ctime`='".time()."'");
				
					$this->unset_cookie();
					$this->add_cookie($user['uid'],$user['username'],$user['salt'],$user['email'],$user['password'],$user['usertype'],$_POST['loginname'],$user['did']);
					$logtime=date("Ymd",$user['login_date']);
					$nowtime=date("Ymd",time());
					if($logtime!=$nowtime){
						$this->get_integral_action($user['uid'],"integral_login","��Ա��¼");
					}

					if($info['name']){
						$this->layer_msg('��¼�ɹ�',9,0,$this->config['sy_weburl']."/member/index.php",2,1);
					}else if($info['name']==''){
						
						$this->layer_msg('��¼�ɹ�',9,0,$this->config['sy_weburl']."/member/index.php",2,1);
					}
					
				}else{
					$this->layer_msg('���벻��ȷ!');
				}
			}else{
				$this->layer_msg('���û�������!');
			}
		}
			
	}

	function sendmsg_action(){
		if(!$this->config['sy_msg_isopen'] || !$this->config['sy_msg_login']){
			$this->layer_msg('��վδ����������֤��¼����!');
		}else{
			$moblie=$_POST['moblie'];

			if(strpos($this->config['code_web'],'ǰ̨��¼')!==false){
			    session_start();
			    if ($this->config['code_kind']==3){
					
					if(!gtauthcode($this->config)){
						 $this->layer_msg('����֤δͨ��');
					}
			    }else{
        	    if(md5(trim($_POST['code']))!=$_SESSION['authcode'] || trim($_POST['code'])==''){
	        			$this->layer_msg('��֤�����');
	        		}
			    }
			}

			$res = $this->send_autocode($moblie);
			if($res == 5){
				$this->layer_msg('�ֻ�������!');
			}elseif ($res == 1) {
				$this->layer_msg('���ֻ��ų�����������!');
			}elseif ($res == 2) {
				$this->layer_msg('��IP����һ�췢������!');
			}elseif ($res == 3) {
				$this->layer_msg('�ֻ��û�������!');
			}elseif ($res == 4) {
				$this->layer_msg('δ�������ŷ��͹���!');
			}elseif ($res == 6) {
				$this->layer_msg('��֤���ظ����ͣ����Ժ�!');
			}elseif($res == '���ͳɹ�!'){
				$this->layer_msg('���ͳɹ�!',9,0,'',2,1);
			}else{
				$this->layer_msg($res);
			}
		}
	}
	
	function newuser($Member,$username,$password,$email,$usertype,$pwuid,$qqid=''){
		$salt = substr(uniqid(rand()), -6);
		$pass = md5($password.$salt);
		$mdata['username']=$username;
		$mdata['password']=$pass;
		$mdata['email']=$email;
		$mdata['usertype']=$usertype;
		$mdata['status']=$this->config['user_status'];
		$mdata['salt']=$salt;
		$mdata['reg_date']=time();
		$mdata['reg_ip']=fun_ip_get();
		$mdata['pwuid']=$pwuid;
		$Member->AddMember($mdata);
		$this->unset_cookie();
		$new_info = $Member->GetMemberOne(array("username"=>$username));
		$userid = $new_info['uid'];
		if($this->config['sy_pw_type']=="pw_center"){
			$Member->UpdateMember(array("pwuid"=>$pwuid),array("uid"=>$userid));
		}
		$this->add_cookie($userid,$username,$salt,$email,$pass,$usertype,1,$this->config['did']);
		if($usertype=="1"){
			$table = "member_statis";
			$table2 = "resume";
			$data['uid']=$userid;
			$data2['uid']=$userid;
			$data2['email']=$email;
		}elseif($usertype=="2"){
			$table = "company_statis";
			$table2 = "company";
			$data=$Member->FetchRatingInfo(array("uid"=>$userid));
			$data2['uid']=$userid;
			$data2['linkmail']=$email;
		}
		if($qqid){
			$Member->UpdateMember(array("qqid"=>$qqid),array("uid"=>$userid));
		}
		$Member->InsertReg($table,$data);
		$Member->InsertReg($table2,$data2);
		return $new_info;
	}
	
	function rest_action(){
		$this->unset_cookie();
		$url = Url("login",array("usertype"=>"1"),"1");
		header("Location: ".$url);
	}
	
	function autoupjob($uid,$usertype){
		if($usertype=='2'){
			$Job=$this->Model("job");
			$Job->UpdateComjob(array("lastupdate"=>time()),array("`uid`='".$uid."' AND `autotype`='2' AND `autotime`>'".time()."'"));
		}
	}
	
	function utype_action(){
		if($this->uid)
		{
			header("Location:".$this->config['sy_weburl']."/member");
		}
		$this->seo("login");
		$this->yun_tpl(array('utype'));
	}

	function setutype_action(){

		

		if($_COOKIE['username'] && $_COOKIE['password'] && ($this->CheckRegUser($_COOKIE['username']) OR $this->CheckRegEmail($_COOKIE['username'])))
		{
		
			$Member=$this->MODEL("userinfo");
			$user = $Member->GetMemberOne(array("username"=>$_COOKIE['username']),array("field"=>"uid,username,password,salt,usertype,did"));
		
			$pass = md5(md5($_COOKIE['password']).$user['salt']);
			$userid = $user['uid'];

			if(!$user['usertype'])
			{
				if($pass==$user['password'] && $user['password']!='')
				{
					$usertype = (int)$_GET['usertype'];
					if($usertype=='1')
					{
						$table = "member_statis";
						$table2 = "resume";
						$data1=array("uid"=>$userid);
						$data2['uid']=$userid;

					}elseif($usertype=='2')
					{

						$table = "company_statis";
						$table2 = "company";
						$data1=$Member->FetchRatingInfo(array("uid"=>$userid));
						$data2['uid']=$userid;
						$data1['did']=$user['did'];

					}
					$Member->UpdateMember(array("usertype"=>$usertype),array("uid"=>$userid));
					$Member->InsertReg($table,$data1);
					$Member->InsertReg($table2,$data2);
					$this->add_cookie($userid,$user['username'],$user['salt'],$user['email'],$user['password'],$usertype,1,$user['did']);
					header("Location:".$this->config['sy_weburl'].'/member');
				}else{
					$this->unset_cookie();
					echo "����ʧ��";
				}
			}else{
				$this->unset_cookie();
				echo "����ʧ��";
			}


		}else{
			header("Location:".Url('index'));
		}
	}
	
	function wxlogin_action(){
		$WxM=$this->MODEL('weixin');
		$qrcode = $WxM->applyWxQrcode($_COOKIE['wxloginid']);
		if(!$qrcode){
			echo 0;
		}else{
			echo $qrcode;
		}
	}
	
	function getwxloginstatus_action(){
	
		if($_COOKIE['wxloginid']){
			
			$WxM=$this->MODEL('weixin');
			$user = $WxM->getWxLoginStatus($_COOKIE['wxloginid']);
			if(!empty($user)){
				if($user['status']=="2"){
					$this->layer_msg('�����˺��ѱ�����',9,0,Url("register",array("c"=>"ok","type"=>2),"1"),2);
				}
				if($user['usertype']=="2" && $this->config['com_status']!="1" && $user['status']!="1"){
					$this->layer_msg('����û��ͨ�����',9,0,Url("register",array("c"=>"ok","type"=>3),"1"),2,1);
				}
				if($user['usertype']=="3" && $this->config['lt_status']!="1" && $user['status']!="1"){
					$this->layer_msg('����û��ͨ�����!',9,0,Url("register",array("c"=>"ok","type"=>3),"1"),2,1);
				}
				if($user['usertype']=="4" && $this->config['px_status']!="1" && $user['status']!="1"){
					$this->layer_msg('����û��ͨ�����!',9,0,Url("register",array("c"=>"ok","type"=>3),"1"),2,1);
				}
				if($this->config['user_status']=="1" && $user['usertype']=="1"&&$info['email_status']!="1"){
					$this->layer_msg('�����˻���δ������ȼ��',9,0,Url("activate",'',"1"),2);
				}

				$this->add_cookie($user['uid'],$user['username'],$user['salt'],$user['email'],$user['password'],$user['usertype'],1,$user['did']);

				$this->layer_msg('',9,0,Url("member"));
			}else{
				$this->layer_msg('');
			}
		}else{
			$this->layer_msg('');
		}
	}
}
