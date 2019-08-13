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
class paylog_controller extends company{
	function index_action(){
		include(CONFIG_PATH."db.data.php");
		$this->yunset("arr_data",$arr_data);
		$this->public_action();
        $order_type = $_GET['ctu'];
        $urlarr=array("c"=>"paylog","page"=>"{{page}}");
        $pageurl=Url('member',$urlarr);
        $where="`uid`=".$this->uid;
        if(!empty($order_type)){
            if($order_type==2){
                $where.=" and `order_type`='adminpay' ";
            }
            if($order_type==1){
                $where.=" and `order_type`='alipay' ";
            }
        }else{
            $order_type = 0;
            $where.=" and `order_type` in('alipay','adminpay') ";
        }
        $where.="  order by order_time desc";
        $rows=$this->get_page("company_order",$where,$pageurl,"10");
        $this->yunset("rows",$rows);
        $this->yunset("order_type_name",['充值方式','支付宝充值','线下充值']);
        $this->yunset("order_type",$order_type);
		/*if($_GET['consume']=="ok"){
			$urlarr=array("c"=>"paylog","consume"=>"ok","page"=>"{{page}}");
			$pageurl=Url('member',$urlarr);
			$where="`com_id`='".$this->uid."'";

			$where.="  order by pay_time desc";
			$rows = $this->get_page("company_pay",$where,$pageurl,"10");
			if(is_array($rows)){
				foreach($rows as $k=>$v){
					$rows[$k]['pay_time']=date("Y-m-d H:i:s",$v['pay_time']);
					$rows[$k]['order_price']=str_replace(".00","",$rows[$k]['order_price']);
				}
			} 
			$this->yunset("rows",$rows);
			$this->yunset("ordertype","ok");
		}else{
			$urlarr=array("c"=>"paylog","page"=>"{{page}}");
			$pageurl=Url('member',$urlarr);
			$where="`uid`='".$this->uid."'  order by order_time desc";
			$rows=$this->get_page("company_order",$where,$pageurl,"10");
			$this->yunset("rows",$rows);
		} */
		/*if($_POST['submit']){
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
		}*/

		$this->yunset("js_def",4);
        /********获取列表07-29**/

        /********获取列表07-29**/
		if(!empty($_GET['c_tpu']) && in_array($_GET['c_tpu'],[1,2,3,4,5])){
		    switch ($_GET['c_tpu']){
                case 1:
                    $temp = 'paylog';
                    //套餐数组，静态返回
                    $tc_arr = [
                        [
                            'name' => '慧沟通-初级',
                            'price' => $arr_data['new_price']['communicate']['base']['price'],
                            'numric' => 50,
                            'unit_price' => '元',
                            'unit_num' => '次',
                            'order_price' => 50 * $arr_data['new_price']['communicate']['base']['price'],
                            'giving' => 50 * $arr_data['new_price']['communicate']['base']['giving'],
                        ],
                        [
                            'name' => '慧沟通-高级',
                            'price' => $arr_data['new_price']['communicate']['expert']['price'],
                            'numric' => 20,
                            'unit_price' => '元',
                            'unit_num' => '次',
                            'order_price' => 20 * $arr_data['new_price']['communicate']['expert']['price'],
                            'giving' => 20 * $arr_data['new_price']['communicate']['expert']['giving'],
                        ]
                    ];
                    $this->yunset("tc_arr",$tc_arr);
                    break;
                case 2:
                    $temp = 'uselog';
                    break;
                case 3:
                    $temp = 'spendlog';
                    break;
                case 4:
                    $temp = 'chargelog';
                    break;
                case 5:
                    $temp = 'paylog_old';
                    break;
            }
        }else{
            $temp = 'paylog';
        }
        $this->yunset("c_tpu",$_GET['c_tpu']?$_GET['c_tpu']:1);
		//输出登录人手机号
        $user_msg = $this->obj->DB_select_once('member',"`uid`=".$this->uid,'moblie');
        $company_msg = $this->obj->DB_select_once('company',"`uid`=".$this->uid,'*');
        $this->yunset("user_phone",$user_msg['moblie']);
        $this->yunset("company_msg",$company_msg);
		$this->com_tpl($temp);
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

	function do_data_action(){
	    $post = $_POST;

    }
}
?>