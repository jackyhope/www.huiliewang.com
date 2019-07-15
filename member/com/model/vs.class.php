<?php
/* *
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2017 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ���������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
*/
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
class vs_controller extends company
{
	function index_action(){
		$this->public_action();
		$this->yunset("js_def",7);
		$this->com_tpl('vs');
	}
	function save_action(){
		if($_POST['submit']){
			$info = $this->obj->DB_select_once("member","`uid`='".$this->uid."'","`salt`,`password`,`name_repeat`,`username`");
			if(is_array($info)){
				$oldpass = md5(md5($_POST['oldpassword']).$info['salt']);
				if($info['password']!=$oldpass){
 					$this->ACT_layer_msg("ԭʼ�������",8,"index.php?c=vs");
				}
				if($this->config['sy_uc_type']=="uc_center" && $info['name_repeat']!="1"){
					$this->uc_open();
					$ucresult= uc_user_edit($info['username'], $_POST['oldpassword'], $_POST['password'], "","1");
					if($ucresult == -1) {
 						$this->ACT_layer_msg("ԭʼ�������",8,"index.php?c=vs");
					}
				}else{
					$salt = substr(uniqid(rand()), -6);
					$pass2 = md5(md5($_POST['password']).$salt);
					$data['password']=$pass2;
					$data['salt']=$salt;
					$this->obj->update_once("member",$data,array("uid"=>$this->uid));
				}
				$this->unset_cookie();
				$this->obj->member_log("�޸�����",8);
 				$this->ACT_layer_msg("�����޸ĳɹ��������µ�¼��",9,$this->config['sy_weburl']."/index.php?m=login&usertype=".$_POST['usertype']);
			}
		}
	}

	//往手机发验证
    function phone_action(){
	    session_start();
	    $oldphone = baseUtils::getStr(trim($_GET['oldphone']));
	    $uid = baseUtils::getStr(trim($_GET['uid']),'int');
	    $username = baseUtils::getStr(trim($_GET['username']));
	    $code = rand(100000,999999);
	    $content= '【慧猎网】您的验证码是 '.$code.',请勿泄漏他人，感谢您的支持!';
	    unset($_SESSION['phone_code']);
	    $_SESSION['phone_code'] = $code;
	    $_SESSION['phone'] = $oldphone;
	    apiClient::init($appid,$secret);
        $sysmsg =  new com\hlw\huiliewang\dataobject\sysmsg\sysmsgRequestDTO();
        $sysmsg->uid = $uid;
        $sysmsg->phone = $oldphone;
        $sysmsg->name = $username;
        $sysmsg->content = $content;
        $msgclient = new com\hlw\huiliewang\interfaces\sysmsg\SysmsgServiceClient(null);
        apiClient::build($msgclient);
        $res = $msgclient->sendMSG($sysmsg);
        $arr['code'] = $res->code;
        $arr['success'] = $res -> success;
        $arr['message'] = $res -> message;
        echo json_encode($arr);die;
    }

    //验证码校验
    function verify_action(){
	    session_start();
	    $phone = baseUtils::getStr(trim($_POST['phone']));
	    $code = baseUtils::getStr(trim($_POST['code']));
	    $session_phone = $_SESSION['phone'];
	    $session_code = $_SESSION['phone_code'];
	    if($phone == $session_phone){
            if($code == $session_code){
                $arr['code'] = 200;
                $arr['success'] = true;
                $arr['message'] = '验证成功';
                echo json_encode($arr);die;
            }else{
                $arr['code'] = 500;
                $arr['success'] = true;
                $arr['message'] = '验证码有误';
                echo json_encode($arr);die;
            }
        }else{
            $arr['code'] = 500;
            $arr['success'] = true;
            $arr['message'] = '手机号有误';
            echo json_encode($arr);die;
        }
    }

    //设置新手机
    function newphone_action(){
        $newphone = baseUtils::getStr(trim($_POST['newphone']));
        $uid = baseUtils::getStr(trim($_POST['uid']),'int');
        apiClient::init($appid,$secret);
        $adminManager = new com\hlw\huiliewang\interfaces\AdminManagerServiceClient(null);
        apiClient::build($adminManager);
        $res = $adminManager->modifyphone($uid,$newphone);
        $arr['code'] = $res->code;
        $arr['message'] = $res->message;
        $arr['success'] = $res -> success;
        echo json_encode($arr);
    }

}
?>