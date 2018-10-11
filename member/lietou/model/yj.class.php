<?php
/* *
* $Author ：PHPYUN开发团队
*
* 官网: http://www.phpyun.com
*
* 版权所有 2009-2017 宿迁鑫潮信息技术有限公司，并保留所有权利。
*
* 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
*/
class yj_controller extends lietou{
	function index_action(){

		include(CONFIG_PATH."db.data.php");
		$this->yunset("arr_data",$arr_data);
		$this->public_action();
        $urlarr=array("c"=>"paylog","consume"=>"ok","page"=>"{{page}}");
        $pageurl=Url('member',$urlarr);
        $where="`uid`='".$this->uid."' and is_browse=6";

        $where.="  order by datetime asc";
        $rows = $this->get_page("userid_job",$where,$pageurl,"10");

        if(is_array($rows)){
            foreach($rows as $k=>$v){
                $com = $this->obj->DB_select_once("company_job","id=".$v['job_id'],"name,com_name");
                $rows[$k]['jobname'] = $com['name'];
                $rows[$k]['companyname'] = $com['com_name'];
                $resume = $this->obj->DB_select_once("resume_expect","id=".$v['eid'],"uname");
                $rows[$k]['uname'] = $resume['uname'];
            }
        }
        $this->yunset("rows",$rows);
        $this->yunset("ordertype","ok");

		if($_POST['submit']){
			if(trim($_POST['order_remark'])==""){
				$this->ACT_layer_msg("备注不能为空！",8,$_SERVER['HTTP_REFERER']);
			}
			$nid=$this->obj->DB_update_all("company_order","`order_remark`='".trim($_POST['order_remark'])."'","`id`='".(int)$_POST['id']."' and `uid`='".$this->uid."'");
			if($nid)
			{
				$this->obj->member_log("修改订单备注");
				$this->ACT_layer_msg("修改成功！",9,$_SERVER['HTTP_REFERER']);
			}else{
				$this->ACT_layer_msg("修改失败！",8,$_SERVER['HTTP_REFERER']);
			}
		}

		$this->yunset("js_def",4);
		$this->lt_tpl('yj');
	}
	function del_action(){
		if($this->usertype!='2' || $this->uid==''){
			echo '0';die;
		}else{
			$oid=$this->obj->DB_select_once("company_order","`uid`='".$this->uid."' and `id`='".(int)$_GET['id']."' and `order_state`='1'");
			if(empty($oid)){
				echo '0';die;
			}else{
				$this->obj->DB_delete_all("company_order","`id`='".$oid['id']."' and `uid`='".$this->uid."'");
				echo '1';die;
			}
		}
	}
}
?>