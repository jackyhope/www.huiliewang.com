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


class lietou extends common{

    function array_iconv($in_charset,$out_charset,$arr){
        return eval('return '.iconv($in_charset,$out_charset,var_export($arr,true).';'));
    }

    function check_lietou(){
        $lietou=$this->obj->DB_select_once("lietou","`uid`='".$this->uid."'");

        if(empty($lietou['department']) || empty($lietou['hy']) || empty($lietou['name'])){
//            $this->ACT_msg("index.php?c=info","����������ͷ���ϣ�");
        }
    }

    function public_action(){
		$now_url=@explode("/",$_SERVER['REQUEST_URI']);
		$now_url=$now_url[count($now_url)-1];
		$this->yunset("now_url",$now_url);

		$lietou=$this->obj->DB_select_once("lietou","`uid`='".$this->uid."'");
		$atn=$this->obj->DB_select_once("atn","`uid`='".$this->uid."'");
		$guweninfo=$this->obj->DB_select_once("company_consultant","`id` ='".$lietou['conid']."'");
		if($guweninfo['logo']){
		    $guweninfo['logo']=str_replace("./",$this->config['sy_weburl']."/",$guweninfo['logo']);
		}else{
		    $guweninfo['logo']=$this->config['sy_weburl'].'/'.$this->config['sy_guwen'];
		}


		$qq=explode(',', $this->config['sy_qq']);
		$this->yunset('kfqq',$qq[0]);
		include(PLUS_PATH."menu.cache.php");
		$report=$this->obj->DB_select_once("report","p_uid='".$this->uid."' order by inputtime desc");
		$this->yunset("current_url",$this->curPageURL());
		$this->yunset("report",$report);

//var_dump($lietou);
		//die("asdfasdf");
		$this->yunset("lietou",$lietou);
		$this->yunset("lietou",$lietou);
		$this->yunset("atn",$atn);
		$this->yunset("guweninfo",$guweninfo);	
		
	}


	/*
	 * �Ƽ�����ͳ��
	 */
	function recommend_total(){
        $all_total = $this->obj->DB_select_num("userid_job","uid=".$this->uid);
        $in_total = $this->obj->DB_select_num("userid_job","uid=".$this->uid." and is_browse not in(4,6)");
        $suc_total = $this->obj->DB_select_num("userid_job","uid=".$this->uid." and is_browse=6");
        $fal_total = $this->obj->DB_select_num("userid_job","uid=".$this->uid." and is_browse=4");
        $this->yunset("all_total",$all_total);
        $this->yunset("in_total",$in_total);
        $this->yunset("suc_total",$suc_total);
        $this->yunset("fal_total",$fal_total);

    }


    /*
     * ������������ͳ��
     */
    function resume_total(){
        $this->public_action();
        $all_num = $this->obr->DB_select_num("resume","resume_id<>0");
        $fav_num = $this->obj->DB_select_num("fav_resume","uid=".$this->uid);
        $recommend_num = $this->obj->DB_select_all("userid_job","uid=".$this->uid." group by resume_id");
        $recommend_num = count($recommend_num);
        $apply_num = $this->obj->DB_select_all("userid_job","com_id=".$this->uid." group by resume_id");
        $apply_num = count($apply_num);
        $input_num = $this->obr->DB_select_num("resume","uid=".$this->uid);
        $down_num = $this->obj->DB_select_num("down_resume","comid=".$this->uid);
        $this->yunset("all_num",$all_num);
        $this->yunset("down_num",$down_num);
        $this->yunset("fav_num",$fav_num);
        $this->yunset("apply_num",$apply_num);
        $this->yunset("recommend_num",$recommend_num);
        $this->yunset("input_num",$input_num);
    }


    /*
     * ��Ŀ��������ͳ��
     */
    function project_total(){
        $total_num=$this->obj->DB_select_num("company_job","r_status<>2 and status<>1 and state=1 and edate>".time());
        $recommend_num=$this->obj->DB_select_all("userid_job","identity=3 and uid=".$this->uid." group by job_id");
        $recommend_num = count($recommend_num);
        $fav_num=$this->obj->DB_select_num("fav_job","uid=".$this->uid);
        $this->yunset("total_num",$total_num);
        $this->yunset("recommend_num",$recommend_num);
        $this->yunset("fav_num",$fav_num);
    }

    function curPageURL()
    {
        $pageURL = 'http';

        if ($_SERVER["HTTPS"] == "on")
        {
            $pageURL .= "s";
        }
        $pageURL .= "://";

        if ($_SERVER["SERVER_PORT"] != "80")
        {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        }
        else
        {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }


    function lietou_satic(){

		
        $statis=$this->obj->DB_select_once("lietou_statis","`uid`='".$this->uid."'");
        if($statis['rating']){
            $rating=$this->obj->DB_select_once("lietou_rating","`id`='".$statis['rating']."'");
        }
        $statis['rating_type'] = $rating['type'];
        if($statis['vip_etime']<time()){
            if($statis['vip_etime']>'1'){
                $nums=0;
            }else if($statis['rating_type']=='1'  &&  $statis['vip_etime']<'1'){
                $nums=1;
            }
            if($nums<1){

                if($this->config['com_vip_done']=='0'){
                    $data['job_num']=$data['down_resume']=$data['invite_resume']=$data['editjob_num']=$data['breakjob_num']=$data['part_num']=$data['editpart_num']=$data['breakpart_num']='0';

                    $statis['rating_name']=$data['rating_name']="�ǻ�Ա";

                    $statis['rating_type']=$statis['rating']=$data['rating_type']=$data['rating']="";

                    $statis['vip_etime']=$data['vip_etime']="";

                    $where['uid']=$this->uid;

                    $this->obj->update_once("lietou_statis",$data,$where);

                }elseif ($this->config['com_vip_done']=='1'){

                    $ratingM = $this->MODEL('rating');

                    $rat_value=$ratingM->rating_info();

                    $this->obj->DB_update_all("lietou_statis",$rat_value,"`uid`='".$this->uid."'");
                }

            }
        }
        if($statis['autotime']>=time()){
            $statis['auto'] = 1;
        }
        if($statis['vip_etime']>time() || $statis['vip_etime']==0){
            if($statis['rating_type']=="2"){
                $addltjobnum=$addjobnum=$addpartjobnum='1';
            }else{
                if($statis['job_num']>0){
                    $addjobnum='1';
                }else{
                    if($this->config['com_integral_online']=='1'){
                        $addjobnum='2';
                    }else{
                        $addjobnum='0';
                    }
                }

                if($statis['part_num']>0){
                    $addpartjobnum='1';
                }else{
                    if($this->config['com_integral_online']=='1'){
                        $addpartjobnum='2';
                    }else{
                        $addpartjobnum='0';
                    }
                }
            }
        }else {
            if($this->config['com_integral_online']=='1'){
                $addjobnum=$addpartjobnum=$addltjobnum='2';
            }else{
                $addjobnum=$addpartjobnum=$addltjobnum='0';
            }
        }
        $statis['addjobnum']=$addjobnum;
        $statis['addltjobnum']=$addltjobnum;
        $statis['addpartjobnum']=$addpartjobnum;
        $statis['pay_format']=number_format($statis['pay'],2);
        $statis['integral_format']=number_format($statis['integral']);
        $this->yunset("addltjobnum",$addltjobnum);
        $this->yunset("addjobnum",$addjobnum);
        $this->yunset("addpartjobnum",$addpartjobnum);
        $this->yunset("statis",$statis);
        $this->yunset("rating",$rating);

        return $statis;
    }

	function get_com($type,$statis=array()){
		if($statis['uid']==''){
			$statis=$this->lietou_satic();
		}
		if($statis['rating_type']==""&&$statis['rating']){
			
			$rating=$this->obj->DB_select_once("company_rating","`id`='".$statis['rating']."'");
			$this->obj->DB_update_all("lietou_statis","`rating_type`='".$rating['type']."'","`uid`='".$this->uid."'");
			$statis['rating_type']=$rating['type'];
			
		}
		if($statis['rating_type'] && $statis['rating']){
			if($type==1){
				if($statis['rating_type']=='1' && $statis['job_num']>0 && ($statis['vip_etime']<1 || $statis['vip_etime']>=time())){
					$value="`job_num`=`job_num`-1";
				}elseif($statis['rating_type']=='2' && $statis['vip_etime']>time()){
					$value="";
				}else{
					$this->intergal($type,$statis);
				}
			}elseif($type==3){
				if($statis['rating_type']=='1' && $statis['breakjob_num']>0 && ($statis['vip_etime']<1 || $statis['vip_etime']>=time())){
					$value="`breakjob_num`='".($statis['breakjob_num']-1)."'";
				}else if($statis['rating_type']=='2' && $statis['vip_etime']>time()){
					$value="";
				}else{
					$this->intergal($type,$statis);
				}
			}elseif($type==7){
				if($statis['rating_type']=='1' && $statis['part_num']>0 && ($statis['vip_etime']<1 || $statis['vip_etime']>=time())){
					$value="`part_num`='".($statis['part_num']-1)."'";
				}else if($statis['rating_type']=='2' && $statis['vip_etime']>time()){
					$value="";
				}else{
					$this->intergal($type,$statis);
				}
			}elseif($type==9){
				if($statis['rating_type']=='1' && $statis['breakpart_num']>0 && ($statis['vip_etime']<1 || $statis['vip_etime']>=time())){
					$value="`breakpart_num`='".($statis['breakpart_num']-1)."'";
				}else if($statis['rating_type']=='2' && $statis['vip_etime']>time()){
					$value="";
				}else{
					$this->intergal($type,$statis);
				}
			}
			if($value){
				$this->obj->DB_update_all("lietou_statis",$value,"`uid`='".$this->uid."'");
			}
		}else{
			$this->intergal($type,$statis);
		}
	}
	



	function intergal($type,$statis){
		
		$data=array("1"=>array('msg'=>'��Ա����ְλ����,�����Ա�������ݣ�','url'=>'index.php?c=job&w=1'),"3"=>array('msg'=>'��Աˢ��ְλ���꣡','url'=>'index.php?c=pay'),"4"=>array('msg'=>'��Ա������ͷְλ���꣬�����Ա�������ݣ�','url'=>'index.php?c=job&w=1'),"6"=>array('msg'=>'��Աˢ����ͷְλ���꣡','url'=>'index.php?c=job&w=1'),"7"=>array('msg'=>'��Ա������ְְλ���꣬�����Ա�������ݣ�','url'=>'index.php?c=part'),"9"=>array('msg'=>'��Աˢ�¼�ְְλ���꣡','url'=>'index.php?c=part'));
		if($this->config['com_integral_online']=="1"){
			if($type==1 && $this->config['integral_job']){
				if($this->config['integral_job_type']=="1"){
					$auto=true;
				}else if($statis['integral']<$this->config['integral_job']){
					$this->ACT_layer_msg("���".$this->config['integral_pricename']."��������ְλ��",8,"index.php?c=pay");
				}else if($statis['integral']>=$this->config['integral_job']){
					$auto=false;
				}
				
				$nid=$this->company_invtal($this->uid,$this->config['integral_job'],$auto,"����ְλ",true,2,'integral',6);
			
			}elseif($type==3 && $this->config['integral_jobefresh']){
				if($this->config['integral_jobefresh_type']=="1"){
					$auto=true;
				}else if($statis['integral']<$this->config['integral_jobefresh']){
					if($_GET){
						$this->layer_msg("���".$this->config['integral_pricename']."����ˢ��ְλ��",8,0,"index.php?c=pay");
					}else{
						$this->ACT_layer_msg("���".$this->config['integral_pricename']."����ˢ��ְλ��",8,"index.php?c=pay");
					}
				}else{
					$auto=false;
				}
				
				$nid=$this->company_invtal($this->uid,$this->config['integral_jobefresh'],$auto,"ˢ��ְλ",true,2,'integral',8);
				
			}elseif($type==7 && $this->config['integral_partjob']){
				if($this->config['integral_partjob_type']=="1"){
					$auto=true;
				}if($statis['integral']<$this->config['integral_partjob']){
					$this->ACT_layer_msg("���".$this->config['integral_pricename']."����������ְְλ��",8,"index.php?c=pay");
				}else{
					$auto=false;
				}
				$nid=$this->company_invtal($this->uid,$this->config['integral_partjob'],$auto,"������ְְλ",true,2,'integral',18);
			}elseif($type==9 && $this->config['integral_partjobefresh']){
				if($this->config['integral_partjobefresh_type']=="1"){
					$auto=true;
				}else if($statis['integral']<$this->config['integral_partjobefresh']){
					$this->ACT_layer_msg("���".$this->config['integral_pricename']."����ˢ�¼�ְְλ��",8,"index.php?c=pay");
				}else{
					$auto=false;
				}
				$nid=$this->company_invtal($this->uid,$this->config['integral_partjobefresh'],$auto,"ˢ�¼�ְְλ",true,2,'integral',20);
			}
		}else{
			$this->ACT_layer_msg($data[$type]['msg'],8,$data[$type]['url']);
		}
	}
		
	
	function lt_tpl($tpl){
		$this->yuntpl(array('member/lietou/'.$tpl));
	}
	
	function get_user(){
		$rows=$this->obj->DB_select_once("lietou","`uid`='".$this->uid."'");
		if(!$rows['name'] || !$rows['linktel']){
//			$this->ACT_msg("index.php?c=info","����������ͷ���ϣ�");
		}
		return $rows;
	}



	/*
	 * ְλ����
	 */
    function job(){
        if($_GET['r_uid']){
            if($_GET['r_reason']==""){
                $this->ACT_layer_msg("�ٱ����ݲ���Ϊ�գ�",8,"index.php?c=down");
            }
            $data['p_uid']=(int)$_GET['r_uid'];
            $data['inputtime']=time();
            $data['c_uid']=$this->uid;
            $data['did']=$this->userid;
            $data['eid']=(int)$_GET['eid'];
            $data['r_name']=$_GET['r_name'];
            $data['usertype']=(int)$this->usertype;
            $data['username']=$this->username;
            $data['r_reason']=$_GET['r_reason'];
            $haves=$this->obj->DB_select_once("report","`p_uid`=".$data['p_uid']." and `c_uid`=".$data['c_uid']." and `usertype`=".$data['usertype']."","id");
            if(is_array($haves)){
                $this->ACT_layer_msg("���Ѿ��ٱ������û���",8,"index.php?c=down");
            }else{
                $nid=$this->obj->insert_into("report",$data);
                if($nid){
                    $this->obj->member_log("�ٱ��˲š�".$_GET['r_name']."��");
                    $this->ACT_layer_msg("�����ɹ���",9,"index.php?c=down");
                }else{
                    $this->ACT_layer_msg("����ʧ�ܣ�",8,"index.php?c=down");
                }
            }
        }

        if($_GET['up']){
            $this->get_com(3);
            $nid=$this->obj->DB_update_all("company_job","`lastupdate`='".time()."'","`uid`='".$this->uid."' and `id`='".(int)$_GET['up']."'");
            if($nid){
                $this->obj->DB_update_all("lietou","`lastupdate`='".time()."'","`uid`='".$this->uid."'");
                $job=$this->obj->DB_select_once("company_job","`id`='".(int)$_GET['up']."'","name");
                $this->obj->member_log("ˢ��ְλ��".$job['name']."��",1,4);
                $this->layer_msg('ˢ��ְλ�ɹ���',9,0,$_SERVER['HTTP_REFERER']);
            }else{
                $this->layer_msg('ˢ��ʧ�ܣ�',8,0,$_SERVER['HTTP_REFERER']);
            }
        }
        if($_POST['gotimeid']){
            $_POST['day']=intval($_POST['day']);
            if($_POST['day']<1){
                $this->ACT_layer_msg("����ȷ��д����������",8);
            }else{
                $posttime=(int)$_POST['day']*86400;
                $ids=@explode(",",$_POST['gotimeid']);
                if(is_array($ids)){
                    foreach($ids as $value){
                        $where=array();$data=array();
                        $row=$this->obj->DB_select_once("company_job","`id`='".(int)$value."' and `uid`='".$this->uid."'","`state`,`edate`");
                        $where['id']=(int)$value;
                        $where['uid']=$this->uid;
                        if($row['state']==2 || $row['edate']<time()){
                            $time=time()+$posttime;
                            $data['edate']=$time;
                            $data['state']=1;
                            $id=$this->obj->update_once("company_job",$data,$where);
                        }else{
                            $time=$row['edate']+$posttime;
                            $id=$this->obj->update_once("company_job",array("edate"=>$time),$where);
                        }
                    }
                }
                if($id){
                    $this->obj->member_log("ְλ����");
                    $this->ACT_layer_msg("���ڳɹ���",9,$_SERVER['HTTP_REFERER']);
                }else{
                    $this->ACT_layer_msg("����ʧ�ܣ�",8,$_SERVER['HTTP_REFERER']);
                }
            }
        }
        if($_POST['status'] && ($_POST['id']|| is_array($_POST['id']))){
            if(is_array($_POST['id'])){
                $id=pylode(",",$_POST['id']);
            }else if($_POST['id']){
                $id=(int)$_POST['id'];
            }
            $where="`uid`='".$this->uid."' and `id` in (".$id.")";
            if($_POST['status']==2){
                $_POST['status']=0;
            }
            $nid=$this->obj->update_once("company_job",array("status"=>(int)$_POST['status']),$where);
            if($nid){
                $this->obj->member_log("�޸�ְλ����״̬");
                echo 1;die;
            }else{
                echo 2;die;
            }
        }
        if($_GET['del'] || is_array($_POST['checkboxid'])){
            if(is_array($_POST['checkboxid'])){
                $layer_type=1;
                $delid=pylode(",",$_POST['checkboxid']);
            }else if($_GET['del']){
                $layer_type=0;
                $delid=(int)$_GET['del'];
            }
            $nid=$this->obj->DB_delete_all("company_job","`uid`='".$this->uid."' and `id` in (".$delid.")"," ");
            $this->obj->DB_delete_all("company_job_link","`uid`='".$this->uid."' and `jobid` in (".$delid.")"," ");
            if($nid){
                $newest=$this->obj->DB_select_once("company_job","`uid`='".$this->uid."' order by lastupdate DESC","`lastupdate`");

                $this->obj->DB_delete_all("userid_job","`com_id`='".$this->uid."' and `job_id` in (".$delid.")"," ");
                $this->obj->DB_delete_all("look_job","`com_id`='".$this->uid."' and `jobid` in (".$delid.")"," ");
                $this->obj->DB_delete_all("fav_job","`job_id` in (".$delid.")"," ");
                $this->obj->DB_delete_all("user_entrust_record","`jobid` in (".$delid.") and `comid`='".$this->uid."'","");
                $this->obj->DB_delete_all("report","`usertype`=1 and `type`=0 and `eid` in (".$delid.")","");
                $this->obj->update_once("lietou",array("jobtime"=>$newest['lastupdate']),array("uid"=>$this->uid));
                $this->obj->member_log("ɾ��ְλ",1,3);
                $this->layer_msg('ɾ���ɹ���',9,$layer_type,$_SERVER['HTTP_REFERER']);
            }else{
                $this->layer_msg('ɾ��ʧ�ܣ�',8,$layer_type,$_SERVER['HTTP_REFERER']);
            }
        }
    }

	
	function add_invoice_record($post,$order_id,$oid){
		if($post['linkway']=='1'){
			$company=$this->obj->DB_select_once("company","`uid`='".$this->uid."'","`linkman`,`linktel`,`address`");
			$link=",`link_man`='".$company['linkman']."',`link_moblie`='".$company['linktel']."',`address`='".$company['address']."'";
		}else{
			$post=$this->post_trim($post);
			if($post['link_man']==''||$post['link_moblie']==''||$post['address']==''){
				$this->ACT_layer_msg("��ϵ�ˡ���ϵ�绰�����͵�ַ������Ϊ�գ�",8,$_SERVER['HTTP_REFERER']);
			}else{
				$link=",`link_man`='".$post['link_man']."',`link_moblie`='".$post['link_moblie']."',`address`='".$post['address']."'";
			}
		}
		$record=$this->obj->DB_select_once("invoice_record","`order_id`='".$order_id."' and `uid`='".$this->uid."'","id");
		if($record['id']){
			$this->obj->DB_update_all("invoice_record","`title`='".trim($post['invoice_title'])."',`status`='0',`addtime`='".time()."'".$link,"`id`='".$record['id']."'");
		}else{
			$iid=$this->obj->DB_insert_once("invoice_record","`oid`='".$oid."',`order_id`='".$order_id."',`uid`='".$this->uid."',`did`='".$this->userdid."',`title`='".trim($post['invoice_title'])."',`status`='0',`addtime`='".time()."'".$link);
			if($iid==false||$iid==''){$this->ACT_layer_msg("��Ʊ��Ϣ���ʧ�ܣ�",8,$_SERVER['HTTP_REFERER']);}
		}
	}
	
	function wnameup($namekey,$wname,$type){
		$wanmeinfo = $this->obj->DB_select_all("lietou_statis","`$namekey`='$wname' AND `uid`<>'".$this->uid."'");
		if(is_array($wanmeinfo)&&!empty($wanmeinfo))
		{
			$this->ACT_layer_msg("���ʺ��Ѿ����󶨣������˶�����������Ա���ߣ�",8,"index.php?c=Web&type=".$type);
		}else{
			$this->obj->update_once("lietou_statis",array($namekey=>$wname),array("uid"=>$this->uid));
		}
	}
	
	function logout_action(){
		$this->logout();
	}
	
	function HandleError($message){
		echo $message;
	}
	
	function CreateFirstName($file_extension ){
		$num=date('mdHis').rand(1,100);
		$fileName=$num.".".$file_extension;
		return $fileName;
	}
	
	function CreateNextName($file_extension,$file_dir){
		$fileName_arr = scandir($file_dir,1);
		$fileName=$fileName_arr[0];
		$aa=floatval($fileName);
		$num=0;
		$num=(1+$aa);
		if(empty($aa)){
			$num = date('mdHis').rand(1,100);
		}
		return $num.".".$file_extension;
	}
	
	function createdatefilename($file_extension){
		date_default_timezone_set('PRC');
		return date('mdHis').rand(1,100).".".$file_extension;
	}
	
	function create_folders($dir){
    return is_dir($dir) or ($this->create_folders(dirname($dir)) and mkdir($dir, 0777));
  }
  
	function part(){
		if($_POST['gotimeid']){
			$_POST['day']=intval($_POST['day']);
			if($_POST['day']<1){
 				$this->ACT_layer_msg("����ȷ��д����������",8);
			}else{
				$posttime=(int)$_POST['day']*86400;
				$ids=@explode(",",$_POST['gotimeid']);
				if(is_array($ids)){
					foreach($ids as $value){
						$where=array();$data=array();
						$row=$this->obj->DB_select_once("partjob","`id`='".(int)$value."' and `uid`='".$this->uid."'","`state`,`deadline`,`edate`");
						if ($row['deadline']){
							$time=$row['deadline']+$posttime;
						}else{
							$time='';							
						}
						if ($row['edate']){
						    $edate=$row['edate']+$posttime;
						}else{
						    $edate='';
						}
						$where['id']=(int)$value;
						$where['uid']=$this->uid;
						if($row['state']==2 && $time>time()){
							$data['deadline']=$time;
							$data['state']=1;
							$data['edate']=$edate;
							$id=$this->obj->update_once("partjob",$data,$where);
						}else{
							$id=$this->obj->update_once("partjob",array("deadline"=>$time,'edate'=>$edate),$where);
						}
					}
				}
				if($id)
				{
					$this->obj->member_log("��ְְλ����");
					$this->ACT_layer_msg("��ְ���ڳɹ���",9,$_SERVER['HTTP_REFERER']);
				}else{
					$this->ACT_layer_msg("��ְ����ʧ�ܣ�",8,$_SERVER['HTTP_REFERER']);
				}
			}
		}
		if($_GET['up']){
			$this->get_com(9);
			$nid=$this->obj->DB_update_all("partjob","`lastupdate`='".time()."'","`uid`='".$this->uid."' and `id`='".(int)$_GET['up']."'");
			if($nid){
				$part=$this->obj->DB_select_once("partjob","`id`='".(int)$_GET['up']."'","name");
				$this->obj->member_log("ˢ�¼�ְ��".$part['name']."��",1,4);
				$this->layer_msg('ˢ�¼�ְְλ�ɹ���',9,0,$_SERVER['HTTP_REFERER']);
			}else{
				$this->layer_msg('ˢ��ʧ�ܣ�',8,0,$_SERVER['HTTP_REFERER']);
			}
		}
		if($_POST['recid']){
			$id=(int)$_POST['recid'];
			$_POST['day']=intval($_POST['day']);
			if($_POST['day']<1){
				$this->ACT_layer_msg("����ȷ��д�Ƽ�������",8,$_SERVER['HTTP_REFERER']);
			}
			$reow=$this->obj->DB_select_once("lietou_statis","`uid`='".$this->uid."'","integral");
			$part=$this->obj->DB_select_once("partjob","`id`='".$id."' and `uid`='".$this->uid."'","name,rec_time");
			if($part['rec_time']<time())
			{
				$time=time()+$_POST['day']*86400;
			}else{
				$time=$part['rec_time']+$_POST['day']*86400;
			}
			$integral=$this->config['com_recpartjob']*$_POST['day'];
			if($reow['integral']<$integral && $this->config['com_recpartjob_type']=="2")
			{
				$this->ACT_layer_msg("����".$this->config['integral_pricename']."���㣬���ֵ��",8,"index.php?c=pay");
			}else{
				if($this->config['com_recpartjob_type']=="1")
				{
					$auto=true;
				}else{
					$auto=false;
				}
				$this->company_invtal($this->uid,$integral,$auto,"�Ƽ���ְְλ",true,2,'integral',12);
			}
			$data['rec']=1;
			$data['rec_time']=$time;
			$where['id']=$id;
			$where['uid']=$this->uid;
			$this->obj->update_once("partjob",$data,$where);
			$this->obj->member_log("�����Ƽ���ְְλ��".$part['name']."��",1,1);
 			$this->ACT_layer_msg("�Ƽ���ְ�ɹ���",9,$_SERVER['HTTP_REFERER']);
		}
	}

	/*
	 * ְλ����
	 */
	function jobs_parse($jobs){
        include  PLUS_PATH."/city.cache.php";
        $cache_array = $this->obj->cacheget();
        $arr_rows = "";
        $cache_array = $this->db->cacheget();
        foreach ($jobs as $key=>$list){
            $list = $this->db->array_action($list,$cache_array);
            $list['name_n'] = "<font color='red'>".mb_substr($list['name'],0,80,"GBK")."</font>";
            $list['com_n'] = $list['com_name'];
            $list['hy_n'] = $cache_array['industry_name'][$list['hy']];
            $list['pr_n'] = $cache_array['comclass_name'][$list[pr]];
            $list['mun_n'] = $cache_array['comclass_name'][$list[mun]];

            if($list['minsalary'] && $list['maxsalary']){
                $list['salary'] = "��".intval($list['minsalary']*$list['ejob_salary_month']/10000)."-".intval($list['maxsalary']*$list['ejob_salary_month']/10000)."��";
            }else if($list['minsalary']){
                $list['salary'] = "��".intval($list['minsalary']*$list['ejob_salary_month']/10000)."����";
            }else{
                $list['salary'] = "����";
            }
//            if($list[minsalary]&&$list[maxsalary]){
//                $list[job_salary] =intval($list[minsalary]*12/10000)."��-".intval($list[maxsalary]*12/10000)."��";
//            }elseif($list[minsalary]){
//                $list[job_salary] =intval($list[minsalary]*12/10000)."������";
//            }else{
//                $list[job_salary] ="����";
//            }
            $list['lastupdate'] = $this->_format_date($list['lastupdate']);
            $list['job_city_one'] = $city_name[$list[provinceid]];
            $list['job_city_two'] = $city_name[$list[cityid]];
            $list['job_url'] = Url("job",array("c"=>"comapply","id"=>$list[id]),"1");
            $list['com_url'] = Url("company",array("c"=>"show","id"=>$list[uid]));

            $list['lietou_num'] = $this->obj->DB_select_num("userid_job","identity=3 and job_id=".$list['id']." group by uid");
            $list['resume_num'] = $this->obj->DB_select_num("userid_job","identity=3 and job_id=".$list['id']." group by resume_id");
            $list['view_num'] = $this->obj->DB_select_num("userid_job","identity=3 and is_browse=2 and job_id=".$list['id']);
            $list['download_num'] = $this->obj->DB_select_num("userid_job","identity=3 and is_browse=6 and job_id=".$list['id']);
            $list['refuse_num'] = $this->obj->DB_select_num("userid_job","identity=3 and is_browse=4 and job_id=".$list['id']);


            $list['mylietou_num'] = $this->obj->DB_select_num("userid_job","identity=3 and job_id=".$list['id']." and uid=".$this->uid." group by uid");
            $list['myresume_num'] = $this->obj->DB_select_num("userid_job","identity=3 and job_id=".$list['id']." and uid=".$this->uid." group by resume_id");
            $list['myview_num'] = $this->obj->DB_select_num("userid_job","identity=3 and is_browse=2 and job_id=".$list['id']." and uid=".$this->uid);
            $list['mydownload_num'] = $this->obj->DB_select_num("userid_job","identity=3 and is_browse=6 and job_id=".$list['id']." and uid=".$this->uid);
            $list['myrefuse_num'] = $this->obj->DB_select_num("userid_job","identity=3 and is_browse=4 and job_id=".$list['id']." and uid=".$this->uid);

            $list['fav_job'] = $this->obj->DB_select_num("fav_job","uid=".$this->uid." and job_id=".$list['id'],"id");

//            str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]])
            $arr_rows[] = $list;
        }

        $total_num=$this->obj->DB_select_num("company_job");
        $recommend_num=$this->obj->DB_select_all("userid_job","identity=3 and uid=".$this->uid." group by job_id");
        $recommend_num = count($recommend_num);
        $fav_num=$this->obj->DB_select_num("fav_job","uid=".$this->uid);
        $this->yunset("total_num",$total_num);
        $this->yunset("recommend_num",$recommend_num);
        $this->yunset("fav_num",$fav_num);
        return $arr_rows;
    }

    /*
     * ��Ŀ�Ƽ�����
     */
    function obj_parse($obj){
        $arr_obj = "";
        foreach ($obj as $list){
            $this->obj->DB_select_num("userid_job","job_id=".$list['job_id']." and identity=3","");
        }
    }

    /*
     * ������ҳ�б�
     */
    function resume_page($where='',$pageurl='',$limit=20,$field='*',$rowsname='rows'){
        $rows=array();
        $page=$_GET['page']<1?1:$_GET['page'];

        $ststrsql=($page-1)*$limit;
        $num=$this->obj->DB_select_num("pt_resume",$where);
        if($num>$limit){
            $pages=ceil($num/$limit);
            $pagenav=Page($page,$num,$limit,$pageurl,$notpl=false,null);
        }
        $rows=$this->obj->DB_select_all("pt_resume",$where.' limit '.$ststrsql.','.$limit,$field);
        return array('total'=>$num,'pagenav'=>$pagenav,$rowsname=>$rows);
    }


    /*
     * �Ƽ���Ϣ��ҳ�б� Ŀǰֻ�����ͷ����
     */
    function recommend_page($where='',$pageurl='',$limit=10,$field='*',$rowsname='rows'){
        $rows=array();
        $page=$_GET['page']<1?1:$_GET['page'];

        $ststrsql=($page-1)*$limit;

        $num=$this->obj->DB_select_all("userid_job",$where." group by job_id");
        $num = count($num);
//       echo $num;exit();
        if($num>$limit){
            $pages=ceil($num/$limit);
            $pagenav=Page($page,$num,$limit,$pageurl,$notpl=false,null);
        }

        $rows=$this->obj->DB_select_all("userid_job",$where.' group by job_id limit '.$ststrsql.','.$limit,$field);
        $arr_row = "";
        $cache_array = $this->db->cacheget();
        foreach ($rows as $list){
            $job_id = $list['job_id'];
            $job = $this->obj->DB_select_once("company_job","id=".$list['job_id'],"*");
            $job = $this->db->array_action($job,$cache_array);
            $list = $job;
            $list['job_id'] = $job_id;
            $list['resume_name'] = $this->obj->DB_select_once("pt_resume","id=".$list['resume_id'],"name");

            if($job['minsalary'] && $job['maxsalary']){
                $list['salary'] = "��".intval($job['minsalary']*$job['ejob_salary_month']/10000)."-".intval($job['maxsalary']*$job['ejob_salary_month']/10000)."��";
            }else if($job['minsalary']){
                $list['salary'] = "��".intval($job['minsalary']*$job['ejob_salary_month']/10000)."����";
            }else{
                $list['salary'] = "����";
            }
            include(PLUS_PATH."city.cache.php");
                $list['edu'] = $job['edu'];
                $list['exp'] = $job['exp'];

            $list['resume_name'] = $list['resume_name']['name'];
            
            $list['recommend_count'] = $this->obj->DB_select_num("userid_job",$where." and job_id=".$list['job_id']);
            $list['resume_count'] = $this->obj->DB_select_num("userid_job","is_browse=6 and ".$where." and job_id=".$list['job_id']);
            $arr_row[] = $list;
        }

        return array('total'=>$num,'pagenav'=>$pagenav,$rowsname=>$arr_row);
    }


    function error_msg($content){
        echo $content;exit();
    }

    function success_msg($content){
        echo $content;exit();
    }

    /*
     * ����ְλid��ȡ�����Ϣ
     */
    function job_more($job_id){
        $job = $this->obj->DB_select_once("company_job"," id=".$job_id,"uid,name,com_name");
        return $job;

    }

    /*
     * ��н��нת��
     */
    function salary_change(){

    }

    function _format_date($time){
        $t=time()-$time;
        $f=array(
            '31536000'=>'��',
            '2592000'=>'����',
            '604800'=>'����',
            '86400'=>'��',
            '3600'=>'Сʱ',
            '60'=>'����',
            '1'=>'��'
        );
        foreach ($f as $k=>$v)    {
            if (0 !=$c=floor($t/(int)$k)) {
                return $c.$v.'ǰ';
            }
        }
    }


    /*
     * ��ͷ����
     * datekind ʱ������ month��ʾ�£�week��ʾ�ܣ�day��ʾ��
     */
    function lietou_rank($datekind="month"){
        if($datekind=="month"){
            $begintime=mktime(0,0,0,date('m'),1,date('Y'));
            $endtime=mktime(23,59,59,date('m'),date('t'),date('Y'));
        }elseif ($datekind=="week"){
            $begintime=mktime(0,0,0,date('m'),date('d')-date('w')+1-7,date('Y'));
            $endtime=mktime(23,59,59,date('m'),date('d')-date('w')+7-7,date('Y'));
        }elseif ($datekind=="day"){
            $begintime=mktime(0,0,0,date('m'),date('d'),date('Y'));
            $endtime=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
        }

        $where = " datetime>".$begintime." and datetime<".$endtime." and identity=3  group by uid having recommend_result=1";
        $this->obj->DB_select_all("userid_job",$where);
        $lietou  = $this->obj->DB_select_all("lietou","1 order by download_num desc limit 0,10");
        foreach ($lietou as $list){

        }
    }
}
?>