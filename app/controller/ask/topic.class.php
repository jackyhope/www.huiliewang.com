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
class topic_controller extends ask_controller{  
	function index_action(){
		$M=$this->MODEL('ask');
		$recom=$M->GetQuestionList(array('is_recom'=>'1'),array('field'=>'uid,nickname,pic','limit'=>'8','orderby'=>'add_time'));
		foreach($recom as $v){
			$uids[]=$v['uid'];
		}
		$userinfo=$this->obj->DB_select_all('member','`uid` in('.implode(',',$uids).')','`uid`,`username`');
		$resume=$this->obj->DB_select_all('resume','`uid` in('.implode(',',$uids).')','`uid`,`photo`');
		$company=$this->obj->DB_select_all('company','`uid` in('.implode(',',$uids).')','`uid`,`logo`');
		foreach($recom as $k=>$v){
			if(!$v['nickname']){
				foreach($userinfo as $va){
					if($va['uid']==$v['uid']){
						$recom[$k]['nickname']=$va['username'];
					}
				}
			}
			if($v['pic']&&file_exists(str_replace("./",APP_PATH,$v['pic']))){
				$pic=str_replace("./",$this->config['sy_weburl']."/",$v['pic']);
			}else{
				foreach($resume as $va){
					if($va['uid']==$v['uid']){
						if($va['photo']&&file_exists(str_replace("./",APP_PATH,$va['photo']))){
							$pic=str_replace("./",$this->config['sy_weburl']."/",$va['photo']);
						}
					}
				}
				foreach($company as $va){
					if($va['uid']==$v['uid']){
						if($va['logo']&&file_exists(str_replace("./",APP_PATH,$va['logo']))){
							$pic=str_replace("./",$this->config['sy_weburl']."/",$va['logo']);
						}
					}
				}
			}
			if($pic){
				$recom[$k]['pic']=$pic;
			}else{
				$recom[$k]['pic']=$this->config['sy_weburl'].'/'.$this->config['sy_friend_icon'];
			}
		}
		if($_GET['pid']){
			$CacheM=$this->MODEL('cache');
			$CacheList=$CacheM->GetCache(array('ask'));
			$data['ask_class_name']=$CacheList['ask_name'][$_GET['pid']];
			$data['ask_class_name']=strip_tags($CacheList['ask_intro'][$_GET['pid']]);
		
		}else{
			$data['ask_class_name']='';
		}
		$this->data=$data;
		$this->yunset('recom',$recom);
		$this->yunset("navtype","topic");
		$this->seo("ask_topic");
		$this->ask_tpl('topic');
	}
}
?>