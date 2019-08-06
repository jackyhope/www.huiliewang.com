<?php

//error_reporting(E_ALL);
class order_api_controller extends company
{

    /**
     * @desc 参数检测
     */
    private function publicCheck() {
        $uId = $this->uid;
        if (!$uId) {
            $this->ajax_return(500, false, '请登录');
        }
    }

    /**
     * @desc  数据返回
     * @param int $code
     * @param bool $success
     * @param $dada
     */
    function ajax_return($code = 200, $success = true, $dada = []) {
        exit(json_encode(['code' => $code, 'success' => $success, 'info' => $dada]));
    }

    /**
     * @desc  服务类型
     * @return array
     */
    private function getAllService() {
        $allService = $this->obj->DB_select_all("company_service");
        $rating = [];
        foreach ($allService as $service) {
            $rating[$service['id']] = yun_iconv('gbk', 'utf-8', $service['name']);
        }
        return $rating;
    }

    /**
     * @desc 充值订单 company_order
     */
    public function orderList_action() {
        $this->publicCheck();
        $page = baseUtils::getStr($_POST['page'], 'int', 1);
        $orderType = baseUtils::getStr($_POST['order_type'], 'int', 0);
        $payStatus = baseUtils::getStr($_POST['pay_status'], 'int', 0);
        $page < 1 && $page = 1;
        $pageSize = 15;
        $pageStart = ($page - 1) * $pageSize;
        $where = 'uid = ' . $this->uid . ' and type = 2';
        if ($orderType == 1) {
            //线上充值
            $where .= " and (order_type is NULL)";
        }
        if ($orderType == 2) {
            //线下
            $where .= " and (order_type is not NULL)";
        }
        $payStatus > 0 && $where .= " and order_state=" . $payStatus;
        $countWhere = $where;
        $where .= " order by order_time desc limit {$pageStart},{$pageSize}";
        $rows = $this->obj->DB_select_all_assoc('company_order', $where);
        if (is_array($rows)) {
            foreach ($rows as &$v) {
                foreach ($v as &$value) {
                    $value = yun_iconv('gbk', 'utf-8', $value);
                }
                $v['order_time'] = date("Y-m-d H:i:s", $v['order_time']);
                $v['order_price'] = str_replace(".00", "", $v['order_price']);
                $v['order_type'] = ($v['order_type'] == 'adminpay' || $v['order_type'] == 'admincut') ? '线下充值' : '线上充值';
            }
        }
        $counts = $this->obj->DB_select_num('company_order', $countWhere);
        $list = ['list' => $rows, 'current_page' => $page, 'page_size' => $pageSize, 'counts' => $counts];
        $this->ajax_return(200, true, $list);
    }

    /**
     * @desc 消费记录
     */
    public function serviceList_action() {
        $this->publicCheck();
        $page = baseUtils::getStr($_POST['page'], 'int', 1);
        $pageSize = baseUtils::getStr($_POST['page_size'], 'int', 15);
        $orderType = baseUtils::getStr($_POST['order_type'], 'int', 0);
        $payStatus = baseUtils::getStr($_POST['pay_status'], 'int', 0);
        $allService = $this->getAllService();
        $page < 1 && $page = 1;
        $pageStart = ($page - 1) * $pageSize;
        $where = 'uid = ' . $this->uid . ' and type = 5';
        $orderType > 0 && $where .= " and order_type=" . $orderType;
        $payStatus > 0 && $where .= " and order_state=" . $payStatus;
        $countWhere = $where;
        $where .= " order by order_time desc limit {$pageStart},{$pageSize}";
        $rows = $this->obj->DB_select_all_assoc('company_order', $where);
        if (is_array($rows)) {
            foreach ($rows as &$v) {
                foreach ($v as &$value) {
                    $value = yun_iconv('gbk', 'utf-8', $value);
                }
                $v['order_time'] = date("Y-m-d H:i:s", $v['order_time']);
                $v['order_price'] = str_replace(".00", "", $v['order_price']);
                $v['rating'] = $allService[$v['rating']];
                $v['rating2'] = $v['order_info'];
            }
        }
        $counts = $this->obj->DB_select_num('company_order', $countWhere);
        $list = ['list' => $rows, 'current_page' => $page, 'page_size' => $pageSize, 'counts' => $counts];
        $this->ajax_return(200, true, $list);
    }

    /**
     * @desc 服务购买记录
     */
    public function useList_action() {
        $this->publicCheck();
        $page = baseUtils::getStr($_POST['page'], 'int', 1);
        $serviceType = baseUtils::getStr($_POST['service_type'], 'int', 0);
        $pageSize = baseUtils::getStr($_POST['page_size'], 'int', 15);
        $payStatus = baseUtils::getStr($_POST['pay_status'], 'int', 0);
        $page < 1 && $page = 1;
        $pageStart = ($page - 1) * $pageSize;
        $where = 'com_id = ' . $this->uid . ' and type in (1,0) and resume_id > 0';
        (isset($_POST['service_type']) && $serviceType != '-1') && $where .= " and type=" . $serviceType;
        $payStatus > 0 && $where .= " and pay_type=" . $payStatus;
        $countWhere = $where;
        $where .= " order by id desc limit {$pageStart},{$pageSize}";
        $rows = $this->obj->DB_select_all_assoc('company_pay', $where);
        if (is_array($rows)) {
            foreach ($rows as &$v) {
                foreach ($v as &$value) {
                    $value = yun_iconv('gbk', 'utf-8', $value);
                }
                $v['pay_time'] = date("Y-m-d H:i:s", $v['pay_time']);
                $v['order_price'] = str_replace(".00", "", $v['order_price']);
                $v['pay_status_name'] = '未扣除';
                $v['pay_state'] == 2 && $v['pay_status_name'] = '已扣除'; //2:扣款  3：预扣
                $v['pay_state'] == 3 && $v['pay_status_name'] = '预扣'; //2:扣款  3：预扣
                $v['type_name'] = $v['type'] == 1 ? '慧面试' : '慧沟通';
            }
        }
        $counts = $this->obj->DB_select_num('company_pay', $countWhere);
        $list = ['list' => $rows, 'current_page' => $page, 'page_size' => $pageSize, 'counts' => $counts];
        $this->ajax_return(200, true, $list);
    }

    /**
     * @desc  服务列表
     */
    public function services_action() {
        $types = $this->getAllService();
        $filed = "id,service_price,resume,resume_unit,interview,interview_unit,type";
        $list = $this->obj->DB_select_all_assoc('company_service_detail', '1', $filed);
        foreach ($list as $k => &$info) {
            $type = $info['type'];
            if (!isset($types[$type])) {
                unset($list[$k]);
                continue;
            }
            foreach ($info as &$value) {
                $value = yun_iconv('gbk', 'utf-8', $value);
            }
            $info['type_name'] = $types[$type];
            $title = '';
            if ($type == 1) {
                $title = $info['resume'] . $info['resume_unit'];
                $info['interview'] > 0 && $title .= " +赠送{$types[3]}" . $info['interview'] . $info['interview_unit'];
            }
            if ($type == 3) {
                $title = $info['interview'] . $info['interview_unit'];
                $info['resume'] > 0 && $title .= " +赠送{$types[1]}" . $info['resume'] . $info['resume_unit'];
            }
            $info['title'] = $title;
        }
        $list = ['list' => $list];
        $this->ajax_return(200, true, $list);
    }

    /**
     * @desc 订单购买
     */
    public function buy_action() {
//        error_reporting(E_ALL);
//        error_reporting(E_ALL ^ E_NOTICE);
        $serviceId = BaseUtils::getStr($_POST['id'], 'int');
        $smsCode = BaseUtils::getStr($_POST['code'], 'int');
        if ($serviceId <= 0 || !$smsCode) {
            $this->ajax_return(500, false, '参数错误');
        }
        //@todo  短信验证码验证 07-29 暂时跳过验证
        if ($smsCode !== $_SESSION['code'] || (time() - $_SESSION['code_time']) > 300) {
            ;
            $this->ajax_return(500, false, '短信验证码错误');
        }

        //余额验证
        $serviceInfo = $this->obj->DB_select_once('company_service_detail', 'id = ' . $serviceId);
        if (!$serviceInfo) {
            $this->ajax_return(500, false, '服务信息查询错误');
        }
        $price = $serviceInfo['type'];
        $resume = $serviceInfo['resume'];
        $interview = $serviceInfo['interview'];
        $serviceType = $serviceInfo['type'];

        $title = '';
        $types = $this->getAllService();
        $sent = $this->characet('+赠送' . $types[3]);
        if ($serviceType == 1) {
            $title = $resume . $serviceInfo['resume_unit'];
            $serviceInfo['interview'] > 0 && $title .= $sent . $serviceInfo['interview'] . $serviceInfo['interview_unit'];
        }
        if ($serviceType == 3) {
            $title = $serviceInfo['interview'] . $serviceInfo['interview_unit'];
            $serviceInfo['resume'] > 0 && $title .= $sent . $serviceInfo['resume'] . $serviceInfo['resume_unit'];
        }
        //查询余额
        $companyStatis = $this->obj->DB_select_once('company', 'uid = ' . $this->uid);
        $integral = intval($companyStatis['c_money']);
        if ($integral < $price) {
            //余额不足
            $this->ajax_return(500, false, '余额不足');
        }
        $supl = intval($companyStatis['c_money'] - $price);
        try {
            //扣除积分
            $value = "`c_money` = " . $supl;
            $this->obj->DB_update_all('company', $value, 'uid = ' . $this->uid);
            //增加点数
            $companyValue = "`resume_payd` = `resume_payd` +" . $resume . ",`interview_payd` = `interview_payd` +" . $interview;
            $this->obj->DB_update_all('company', $companyValue, 'uid = ' . $this->uid);
            //订单记录
            $this->orderAdd($price, $serviceType, $title);
//            $this->obj->commit();
        } catch (Exception $e) {
//            $this->obj->rollback();
            $this->ajax_return(500, false, '购买失败');
        }
        $this->ajax_return(200, true, '购买成功');
    }

    /**
     * @desc  新增订单数据
     * @param int $price
     * @param int $rating
     * @param int $title
     * @return mixed
     */
    private function orderAdd($price, $rating, $title) {
        $types = $this->getAllService();
        $remark = "购买{$types[$rating]}";
        $sn = mktime() . rand(10000, 99999);
        $data = [
            'type' => 5,
            'order_id' => $sn,
            'uid' => $this->uid,
            'order_type' => 'balance',
            'order_price' => $price,
            'order_time' => time(),
            'order_state' => 2,
            'order_remark' => $remark,
            'rating' => $rating,
            'integral' => 1,
            'order_info' => $title,
        ];

        $vales = '';
        foreach ($data as $k => $v) {
            $v = $this->characet($v);
            $vales .= " {$k} = '$v',";
        }
        $vales = trim($vales, ',');
        return $this->obj->DB_insert_once('company_order', $vales);
    }

    /**
     * 编码转换
     * @param $data
     * @param string $charSet
     * @return string
     */
    function characet($data, $charSet = 'GBK') {
        if (!empty($data)) {
            $fileType = mb_detect_encoding($data, array('UTF-8', 'GBK', 'LATIN1', 'BIG5'));
            if ($fileType != $charSet) {
                $data = mb_convert_encoding($data, $charSet, $fileType);
            }
        }
        return $data;
    }
}