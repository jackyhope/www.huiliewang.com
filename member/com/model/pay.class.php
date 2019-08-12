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
class pay_controller extends company
{
	function index_action()
	{

		$this->public_action();
		$statis=$this->company_satic();
		if($_GET['type']=='vip'){
			$rows=$this->obj->DB_select_all("company_rating","`service_price`<>'' and `display`='1' and `category`=1 order by sort desc","name,service_price,id");
			$this->yunset("rows",$rows);
		}
		$this->yunset("statis",$statis);
		$this->yunset("js_def",4);
        $temp = 'pay';
        if($_GET['cpu']==1){
            $temp = 'pay-old';
        }
        $this->com_tpl($temp);
	}
	function dingdan_action(){
		if($_POST['price'] || $_POST['money_int'] || $_POST['comvip'] || $_POST['comservice']){
			$company=$this->obj->DB_select_once("company","`uid`='".$this->uid."'","`name`,`hy`");
            //07-30-暂时屏蔽该项目
            /*if($company['name']==''||$company['hy']==''){
                return_json('请完善资料',200,['url'=>$_SERVER['HTTP_REFERER']]);
            }*/

			/*if($_POST['comvip']){
				$comvip=(int)$_POST['comvip'];
				$ratinginfo =  $this->obj->DB_select_once("company_rating","`id`='".$comvip."'");
				if($ratinginfo['time_start']<time() && $ratinginfo['time_end']>time()){
					$price = $ratinginfo['yh_price'];
				}else{
					$price = $ratinginfo['service_price'];
				}
				if($ratinginfo['category']==1 || $ratinginfo['category']==2){
					$data['type']='1';
				}else{
					$data['type']='5';
				}
			}elseif($_POST['comservice']){
				$id=(int)$_POST['comservice'];
				$detailinfo =  $this->obj->DB_select_once("company_service_detail","`id`='".$id."'");
				$statis=$this->obj->DB_select_once("company_statis","`uid`='".$this->uid."'");
				if ($statis){
					$rating=$statis['rating'];
					$discount=$this->obj->DB_select_once("company_rating"," `id`='".$rating."' ");
					if($discount){
						$dis=$discount['service_discount'];
						if ($dis !=0 && $dis !=100){
							$price = $detailinfo['service_price'] * $dis *0.01;
						}else {
							$price = $detailinfo['service_price'];
						}
					}
				}
				$data['type']='5';
			}elseif($_POST['price_int']){
				$integral=intval($_POST['price_int']);
				if($this->config['integral_min_recharge']&&$integral<$this->config['integral_min_recharge']){
					$integral=$this->config['integral_min_recharge'];
				}
				$price = $integral/$this->config['integral_proportion'];
				$data['type']='2';
			}elseif($_POST['money_int']){
				$pay=intval($_POST['money_int']);
				if($this->config['money_min_recharge'] && $pay <$this->config['money_min_recharge']){
					$pay=$this->config['money_min_recharge'];
				}
				$price = $pay;
				$data['type']='4';
			}else {
				$this->ACT_layer_msg("参数不正确，请正确填写！",8,$_SERVER['HTTP_REFERER']);
			}*/

			//0729- 直接跳过老的判断，只判断输入的金额
            $integral=intval($_POST['price_int']);
            if($integral<1){
                //$this->ACT_layer_msg("参数不正确，请正确填写！",8,$_SERVER['HTTP_REFERER']);
                return_json('参数不正确，请正确填写！',500,['url'=>$_SERVER['HTTP_REFERER']]);
            }
            $data['type']='2';//0729-直接设置该值
            $price=$integral;//0729-直接设置该值
			if($data['type']=='2'&&$integral<1){
				//$this->ACT_layer_msg("请正确填写购买数量！",8,$_SERVER['HTTP_REFERER']);
                return_json('请正确填写购买数量！',500,['url'=>$_SERVER['HTTP_REFERER']]);
			}
			$dingdan=mktime().rand(10000,99999);
			$data['order_id']=$dingdan;
			$data['order_price']=$price;
			$data['order_time']=mktime();
			$data['order_state']="1";
			$data['order_remark']=trim($_POST['remark']);
			$data['uid']=$this->uid;
			$data['did']=$this->userdid;
			$data['rating']=0;//$_POST['comvip']?$_POST['comvip']:$_POST['comservice']    //0729改
			$data['integral']=$integral;
			$id=$this->obj->insert_into("company_order",$data);
			if($id){
				$this->obj->member_log("下单成功,订单ID".$dingdan);
                return_json('下单成功，请付款！',200,['url'=>$this->config['sy_weburl']."/member/index.php?c=payment&id=".$id]);
//				$this->ACT_layer_msg("下单成功，请付款！",9,$this->config['sy_weburl']."/member/index.php?c=payment&id=".$id);
			}else{
                return_json('提交失败，请重新提交订单！',500,['url'=>$_SERVER['HTTP_REFERER']]);
//				$this->ACT_layer_msg("提交失败，请重新提交订单！",8,$_SERVER['HTTP_REFERER']);
			}
		}else{
            return_json('提交失败，请正确提交订单！',500,['url'=>$_SERVER['HTTP_REFERER']]);
//			$this->ACT_layer_msg("提交失败，请正确提交订单！",8,$_SERVER['HTTP_REFERER']);
		}
	}

    /**
     * 支付宝付款，在线购买套餐【慧沟通初级，慧沟通高级】
     * @param numric 所购次数，
     * @param job_type 购买的慧沟通类型： 初级 1   or  高级 2
     */
    function buy_now_action(){
        $config = $this->config;
        if(!$this->uid){
            return_json('您还未登录或登录已失效，请重新登录！',500,['url'=>$config['sy_weburl'].'/login']);
        }
        if(isset($_POST['numric']) && intval($_POST['numric'])>0 && isset($_POST['c_type']) && intval($_POST['c_type'])>0 && in_array(intval($_POST['c_type']),[1,2])){
            //取配置
            include(CONFIG_PATH."db.data.php");
            $communicate= $arr_data['new_price']['communicate'];//慧沟通配置
            //校验购买的次数，获取登录人，购买的慧沟通类型： 初级 or  高级

            $dingdan=mktime().rand(10000,99999);//订单号
            $data['order_id']=$dingdan;
            $data['type']=233;//客户huilie端支付宝付款购买慧沟通份数状态类型
            $data['job_type'] = intval($_POST['c_type']);//强制整型--购买的订单类型 1 慧沟通初级  2 慧沟通高级
            switch (intval($_POST['c_type'])){
                case 1:
                    $field = 'resume_payd';
                    $price = intval($communicate['base']['price']);//暂不考虑单价有小数点，此处强制转换为整型
                    $giving = floatval($communicate['base']['giving']);//赠送的倍数,实际配置为小数
                    $remark = '购买慧沟通初级职位套餐';
                    $info = '初级';
                    break;
                case 2:
                    $field = 'resume_payd_high';
                    $price = intval($communicate['expert']['price']);//暂不考虑单价有小数点，此处强制转换为整型
                    $giving = floatval($communicate['expert']['giving']);//赠送的倍数,实际配置为小数
                    $remark = '购买慧沟通高级职位套餐';
                    $info = '高级';
                    break;
            }
            $data['info'] = $info = '购买慧沟通'.$info.intval($_POST['numric']).'次，赠送慧沟通'.$info.(intval($_POST['numric']) * $giving).'次';
            //计算订单价格
            $data['order_price']=$price * $data['resume_payd_high']; //单价 * 数量
            //计算实际客户所得额度【包括赠送的】
            $data[$field] = intval($_POST['numric']) + intval($_POST['numric']) * $giving;
            $data['uid']=$this->uid;
            $data['did']=$this->userdid;
            $data['order_remark']=$remark;
            $data['order_time']=mktime();
            $id=$this->obj->insert_into("company_order",$data);
            if($id){
                $this->obj->member_log("下单成功,订单ID".$dingdan);
                return_json('下单成功，请付款！',200,['url'=>$this->config['sy_weburl']."/member/index.php?c=payment&id=".$id]);
            }else{
                return_json('提交失败，请重新提交订单！',500,['url'=>$_SERVER['HTTP_REFERER']]);
            }
        }else{
            return_json('提交失败，请正确提交订单！',500,['url'=>$_SERVER['HTTP_REFERER']]);
        }
    }
}
?>