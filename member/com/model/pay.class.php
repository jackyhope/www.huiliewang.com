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
            //07-30-��ʱ���θ���Ŀ
            /*if($company['name']==''||$company['hy']==''){
                return_json('����������',200,['url'=>$_SERVER['HTTP_REFERER']]);
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
				$this->ACT_layer_msg("��������ȷ������ȷ��д��",8,$_SERVER['HTTP_REFERER']);
			}*/

			//0729- ֱ�������ϵ��жϣ�ֻ�ж�����Ľ��
            $integral=intval($_POST['price_int']);
            if($integral<1){
                //$this->ACT_layer_msg("��������ȷ������ȷ��д��",8,$_SERVER['HTTP_REFERER']);
                return_json('��������ȷ������ȷ��д��',500,['url'=>$_SERVER['HTTP_REFERER']]);
            }
            $data['type']='2';//0729-ֱ�����ø�ֵ
            $price=$integral;//0729-ֱ�����ø�ֵ
			if($data['type']=='2'&&$integral<1){
				//$this->ACT_layer_msg("����ȷ��д����������",8,$_SERVER['HTTP_REFERER']);
                return_json('����ȷ��д����������',500,['url'=>$_SERVER['HTTP_REFERER']]);
			}
			$dingdan=mktime().rand(10000,99999);
			$data['order_id']=$dingdan;
			$data['order_price']=$price;
			$data['order_time']=mktime();
			$data['order_state']="1";
			$data['order_remark']=trim($_POST['remark']);
			$data['uid']=$this->uid;
			$data['did']=$this->userdid;
			$data['rating']=0;//$_POST['comvip']?$_POST['comvip']:$_POST['comservice']    //0729��
			$data['integral']=$integral;
			$id=$this->obj->insert_into("company_order",$data);
			if($id){
				$this->obj->member_log("�µ��ɹ�,����ID".$dingdan);
                return_json('�µ��ɹ����븶�',200,['url'=>$this->config['sy_weburl']."/member/index.php?c=payment&id=".$id]);
//				$this->ACT_layer_msg("�µ��ɹ����븶�",9,$this->config['sy_weburl']."/member/index.php?c=payment&id=".$id);
			}else{
                return_json('�ύʧ�ܣ��������ύ������',500,['url'=>$_SERVER['HTTP_REFERER']]);
//				$this->ACT_layer_msg("�ύʧ�ܣ��������ύ������",8,$_SERVER['HTTP_REFERER']);
			}
		}else{
            return_json('�ύʧ�ܣ�����ȷ�ύ������',500,['url'=>$_SERVER['HTTP_REFERER']]);
//			$this->ACT_layer_msg("�ύʧ�ܣ�����ȷ�ύ������",8,$_SERVER['HTTP_REFERER']);
		}
	}

    /**
     * ֧����������߹����ײ͡��۹�ͨ�������۹�ͨ�߼���
     * @param numric ����������
     * @param job_type ����Ļ۹�ͨ���ͣ� ���� 1   or  �߼� 2
     */
    function buy_now_action(){
        $config = $this->config;
        if(!$this->uid){
            return_json('����δ��¼���¼��ʧЧ�������µ�¼��',500,['url'=>$config['sy_weburl'].'/login']);
        }
        if(isset($_POST['numric']) && intval($_POST['numric'])>0 && isset($_POST['c_type']) && intval($_POST['c_type'])>0 && in_array(intval($_POST['c_type']),[1,2])){
            //ȡ����
            include(CONFIG_PATH."db.data.php");
            $communicate= $arr_data['new_price']['communicate'];//�۹�ͨ����
            //У�鹺��Ĵ�������ȡ��¼�ˣ�����Ļ۹�ͨ���ͣ� ���� or  �߼�

            $dingdan=mktime().rand(10000,99999);//������
            $data['order_id']=$dingdan;
            $data['type']=233;//�ͻ�huilie��֧���������۹�ͨ����״̬����
            $data['job_type'] = intval($_POST['c_type']);//ǿ������--����Ķ������� 1 �۹�ͨ����  2 �۹�ͨ�߼�
            switch (intval($_POST['c_type'])){
                case 1:
                    $field = 'resume_payd';
                    $price = intval($communicate['base']['price']);//�ݲ����ǵ�����С���㣬�˴�ǿ��ת��Ϊ����
                    $giving = floatval($communicate['base']['giving']);//���͵ı���,ʵ������ΪС��
                    $remark = '����۹�ͨ����ְλ�ײ�';
                    $info = '����';
                    break;
                case 2:
                    $field = 'resume_payd_high';
                    $price = intval($communicate['expert']['price']);//�ݲ����ǵ�����С���㣬�˴�ǿ��ת��Ϊ����
                    $giving = floatval($communicate['expert']['giving']);//���͵ı���,ʵ������ΪС��
                    $remark = '����۹�ͨ�߼�ְλ�ײ�';
                    $info = '�߼�';
                    break;
            }
            $data['info'] = $info = '����۹�ͨ'.$info.intval($_POST['numric']).'�Σ����ͻ۹�ͨ'.$info.(intval($_POST['numric']) * $giving).'��';
            //���㶩���۸�
            $data['order_price']=$price * $data['resume_payd_high']; //���� * ����
            //����ʵ�ʿͻ����ö�ȡ��������͵ġ�
            $data[$field] = intval($_POST['numric']) + intval($_POST['numric']) * $giving;
            $data['uid']=$this->uid;
            $data['did']=$this->userdid;
            $data['order_remark']=$remark;
            $data['order_time']=mktime();
            $id=$this->obj->insert_into("company_order",$data);
            if($id){
                $this->obj->member_log("�µ��ɹ�,����ID".$dingdan);
                return_json('�µ��ɹ����븶�',200,['url'=>$this->config['sy_weburl']."/member/index.php?c=payment&id=".$id]);
            }else{
                return_json('�ύʧ�ܣ��������ύ������',500,['url'=>$_SERVER['HTTP_REFERER']]);
            }
        }else{
            return_json('�ύʧ�ܣ�����ȷ�ύ������',500,['url'=>$_SERVER['HTTP_REFERER']]);
        }
    }
}
?>