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
class admin_lierating_controller extends common{	 
	function index_action(){
		$where="`category`='1'";
		if($_GET['rating']){
			$where.=" and `id`='".$_GET['rating']."'";
			$urlarr['rating']=$_GET['rating'];
		}
		$urlarr['page']="{{page}}";
		$pageurl=Url($_GET['m'],$urlarr,'admin');
		$list=$this->get_page("lietou_rating",$where,$pageurl,$this->config['sy_listnum']);
		$this->yunset("list",$list);
		$this->yuntpl(array('admin/admin_lie_rating'));
	}
	function rating_action(){
		if($_GET['id']){
			$row=$this->obj->DB_select_once("lietou_rating","`id`='".$_GET['id']."'"); 
			$this->yunset("row",$row);
		}    
		$coupon=$this->obj->DB_select_all("coupon","1 order by amount asc");
		$this->yunset("coupon",$coupon);
		$this->yuntpl(array('admin/admin_lieclass_add'));
	}
	function saveclass_action(){
		if($_POST['useradd']){
			$id=$_POST['id'];
			unset($_POST['useradd']);
			unset($_POST['id']);
			if(is_uploaded_file($_FILES['com_pic']['tmp_name'])){
				$upload=$this->upload_pic("../data/upload/compic/");
				$pictures=$upload->picture($_FILES['com_pic']);
				$pic = str_replace("../data/upload","/data/upload",$pictures);
			}
			if($_POST['youhui']){
				if($_POST['time_start']==''||$_POST['time_end']==''){
					$this->ACT_layer_msg("请选择优惠开始、结束日期",8,$_SERVER['HTTP_REFERER']);
				}
				if($_POST['yh_price']==''||$_POST['yh_price']>$_POST['service_price']){
					$this->ACT_layer_msg("优惠价格不得大于初始售价",8,$_SERVER['HTTP_REFERER']);
				}

				$_POST['time_start']=strtotime($_POST['time_start']." 00:00:00");
				$_POST['time_end']=strtotime($_POST['time_end']." 23:59:59");
			}else{
				$_POST['yh_price'] = 0;
				$_POST['time_start'] = 0;
				$_POST['time_end']=0;
			}
			foreach($_POST as $key=>$value){
				if($value==''){
					$_POST[$key] = 0;
				}
			}
			if(!$id){
				$_POST['com_pic']=$pic;
				$nid=$this->obj->insert_into("lietou_rating",$_POST);
				$name="企业会员等级（ID：".$nid."）添加";
			}else{
				if($pic!=""){$_POST['com_pic']=$pic;};
				$where['id']=$id;
				$nid=$this->obj->update_once("lietou_rating",$_POST,$where);
				$name="企业会员等级（ID：".$id."）更新";
			}
		}
		$this->cache_rating();
		$nid?$this->ACT_layer_msg($name."成功！",9,"index.php?m=admin_lierating",2,1):$this->ACT_layer_msg($name."失败！",8,"index.php?m=admin_lierating");
	}
	function delrating_action(){
		if($_POST['del']){
			$layer_type='1';
			$id=pylode(',',$_POST['del']);
		}else if($_GET['id']){
			$this->check_token();
			$id=$_GET['id'];
			$layer_type='0';
		}
		$nid=$this->obj->DB_delete_all("lietou_rating","`id` in(".$id.")","");
		$this->cache_rating();
		$nid?$this->layer_msg('删除企业会员等级（ID：(ID:'.$id.')成功！',9,$layer_type,$_SERVER['HTTP_REFERER']):$this->layer_msg('删除失败！',8,$layer_type,$_SERVER['HTTP_REFERER']);
	}
	function delpic_action(){
		if($_GET['id']){
			$this->check_token();
			$row=$this->obj->DB_select_once("lietou_rating","`id`='".$_GET['id']."'","`com_pic`");
			@unlink("..".$row['com_pic']);
			$this->obj->DB_update_all("lietou_rating","`com_pic`=''","`id`='".$_GET['id']."'");
			$this->cache_rating();
			$this->layer_msg('企业会员等级（ID：(ID:'.$_GET['id'].')图标删除成功！',9,0,$_SERVER['HTTP_REFERER']);
		}
	}
	function cache_rating(){
		include(LIB_PATH."cache.class.php");
		$cacheclass= new cache(PLUS_PATH,$this->obj);
		$makecache=$cacheclass->comrating_cache("comrating.cache.php");
	}
	function server_action(){
		$list=$this->obj->DB_select_all("lietou_service");
		$this->yunset("list",$list);
		$this->yuntpl(array('admin/admin_com_rating'));
	}
	function srating_action(){
		$this->yuntpl(array('admin/admin_comrating_add'));
	}
	function save_action(){
		if($_POST['useradd']){
			unset($_POST['useradd']);
			$name=$_POST['name'];
			$row=$this->obj->DB_select_all("lietou_service","`name`='".$name."'");
			if (!empty($row)){
				$this->ACT_layer_msg("增值类型已存在！",8);
			}else{
				$nid=$this->obj->insert_into("lietou_service",$_POST);
				$name="企业增值服务类型（ID：".$nid."）添加";
			}
		}
		$nid?$this->ACT_layer_msg($name."成功，请添加增值包！",9,"index.php?m=admin_comrating&c=edit&id=".$nid,2,1):$this->ACT_layer_msg($name."失败！",8);
	}
	function edit_action(){
		$zzlist=$this->obj->DB_select_all("lietou_service");
		$this->yunset("zzlist",$zzlist);
		if($_GET['id']){
			$row=$this->obj->DB_select_once("lietou_service","`id`='".$_GET['id']."'");
			$this->yunset("row",$row);
			$list=$this->obj->DB_select_all("lietou_service_detail","`type`='".$_GET['id']."' order by `id` asc");
			$this->yunset("list",$list);
		}
		$this->yuntpl(array('admin/admin_comservice_add'));
	}
	
	function list_action(){
		$zzlist=$this->obj->DB_select_all("lietou_service");
		$this->yunset("zzlist",$zzlist);
		
		if($_GET['id']){
			$row=$this->obj->DB_select_once("lietou_service","`id`='".$_GET['id']."'");
			$this->yunset("row",$row);
			$list=$this->obj->DB_select_all("lietou_service_detail","`type`='".$_GET['id']."' order by `id` asc");
			$this->yunset("list",$list);
		}
		$this->yuntpl(array('admin/admin_comservice_list'));
	}
	
	function opera_action(){
		if ($_POST['display'] && $_POST['id']){
			$nid=$this->obj->update_once("lietou_service",array("display"=>$_POST['display']),array("id"=>$_POST['id']));
			if ($nid){
				echo 1;die;
			}else{
				echo 2;die;
			}
		}
	}
	function delserver_action(){
		if($_POST['del']){
			$layer_type='1';
			$id=pylode(',',$_POST['del']);
		}else if($_GET['id']){
			$this->check_token();
			$id=$_GET['id'];
			$layer_type='0';
		}
		$nid=$this->obj->DB_delete_all("lietou_service","`id` in(".$id.")","");
		$nid?$this->layer_msg('增值服务包删除(ID:'.$id.')成功！',9,$layer_type,$_SERVER['HTTP_REFERER']):$this->layer_msg('删除失败！',8,$layer_type,$_SERVER['HTTP_REFERER']);
	}
	function saves_action(){
		if($_POST['useradd']){
			$id=$_POST['id'];
			$_POST['type']=$id;
			unset($_POST['useradd']);
			unset($_POST['id']);
			$nid=$this->obj->insert_into("lietou_service_detail",$_POST);
			$name="套餐（ID：".$id."）添加";
		}elseif ($_POST['userupdate']){
			$id=$_POST['id'];
			$tid=$_POST['tid'];
			$_POST['id']=$tid;
			unset($_POST['userupdate']);
			unset($_POST['tid']);
			$nid=$this->obj->update_once("lietou_service_detail",$_POST,"`id`='".$tid."'");
			$name="套餐（ID：".$tid."）更新";
		}
		$nid?$this->ACT_layer_msg($name."成功！",9,"index.php?m=admin_comrating&c=list&id=".$id,2,1):$this->ACT_layer_msg($name."失败！",8,$_SERVER['HTTP_REFERER']);
	}
	function del_action(){
		if($_GET['id']){
			$this->check_token();
			$id=$_GET['id'];
			$layer_type='0';
		}
		$nid=$this->obj->DB_delete_all("lietou_service_detail","`id` in(".$id.")","");
		$nid?$this->layer_msg('套餐删除(ID:'.$id.')成功！',9,$layer_type,$_SERVER['HTTP_REFERER']):$this->layer_msg('删除失败！',8,$layer_type,$_SERVER['HTTP_REFERER']);
	}
	function edittc_action(){
		$zzlist=$this->obj->DB_select_all("lietou_service");
		$this->yunset("zzlist",$zzlist);
		if($_GET['id']){
			$row=$this->obj->DB_select_once("lietou_service","`id`='".$_GET['id']."'");
			$this->yunset("row",$row);
			$list=$this->obj->DB_select_all("lietou_service_detail","`type`='".$_GET['id']."' order by `id` asc");
			$this->yunset("list",$list);
		}
		if($_GET['tid']){
			$listinfo=$this->obj->DB_select_once("lietou_service_detail","`id`='".$_GET['tid']."'");
			$this->yunset("listinfo",$listinfo);
		}
		$this->yuntpl(array('admin/admin_comservice_add'));
 	}
	function ajax_action(){
	    if($_POST['name']){
	        $_POST['name']=iconv("UTF-8","gbk",$_POST['name']);
	        $name=$this->obj->DB_select_num('lietou_service',"`name`='".$_POST['name']."' and  `id` <>'".$_POST['id']."'");
	        if($name){
	        	echo 2;die;
	        }
	        $this->obj->DB_update_all("lietou_service","`name`='".$_POST['name']."'","`id`='".$_POST['id']."'");
	        $this->admin_log("企业增值包(ID:".$_POST['id'].")名称修改成功");
	    }
	    echo '1';die;
	}
}
?>