<?php

class resume_api_controller extends company
{
    //'1' => '未查看'//  2-已查看// 3-不合适//  4-已购买//  5-邀约面试//  6-顾问面试确认//  7-候选人拒绝//  8-待面试  9-未到场确认中 10-未到场  11-已到场  0-移除
    protected $resumeId;
    protected $projectId;

    public function __construct() {
        $resumeId = baseUtils::getStr($_POST['resume_id'], 'int');
        $projectId = baseUtils::getStr($_POST['project_id'], 'int');
        if (!$resumeId || !$projectId) {
            $this->ajax_return(500, false, '请求参数失败');
        }
        $this->resumeId = $resumeId;
        $this->projectId = $projectId;
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
     * @desc 简历查看/详情
     */
    function info_action() {
        try {
            apiClient::init('', '');
            $resumeService = new com\hlw\huilie\interfaces\resume\ResumeServiceClient(null);
            apiClient::build($resumeService);

            $resumeDo = new com\hlw\huilie\dataobject\resume\resumeRequestDTO();
            $resumeDo->resume_id = $this->resumeId;
            $resumeDo->project_id = $this->projectId;
            $info = $resumeService->info($resumeDo);

            if ($info->code != 200) {
                $this->ajax_return(500, false, $info->message);
            }
            $info->message = json_decode($info->message, true);
            $this->ajax_return(200, true, $info->message);
        } catch (Exception $e) {
            $this->ajax_return(500, false, $e->getMessage());
        }
    }

    /**
     * @desc 简历项目操作日志 1
     */
    function log_action() {
        try {
            apiClient::init('', '');
            $resumeService = new com\hlw\huilie\interfaces\resume\ResumeServiceClient(null);
            apiClient::build($resumeService);

            $resumeDo = new com\hlw\huilie\dataobject\resume\resumeRequestDTO();
            $resumeDo->resume_id = $this->resumeId;
            $resumeDo->project_id = $this->projectId;
            $info = $resumeService->projectLog($resumeDo);

            if ($info->code != 200) {
                $this->ajax_return(500, false, $info->message);
            }
            $info->message = json_decode($info->message, true);
            $this->ajax_return(200, true, $info->message);

        } catch (Exception $e) {
            $this->ajax_return(500, false, $e->getMessage());
        }
    }

    /**
     *  1、 简历不合适、 1
     * @desc 简历状态变化操作
     */
    function reject_action() {
        try {
            apiClient::init('', '');
            $resumeService = new com\hlw\huilie\interfaces\resume\ResumeServiceClient(null);
            apiClient::build($resumeService);
            $resumeDo = new com\hlw\huilie\dataobject\resume\resumeRequestDTO();
            $resumeDo->resume_id = $this->resumeId;
            $resumeDo->project_id = $this->projectId;
            $resumeDo->status = 3;
            $info = $resumeService->statusUp($resumeDo);
            if ($info->code != 200) {
                $this->ajax_return(500, false, $info->message);
            }
            $this->ajax_return(200, true, $info->message);

        } catch (Exception $e) {
            $this->ajax_return(500, false, $e->getMessage());
        }
    }

    /**
     * @desc 面试预约 1
     */
    function interview_action() {
        $interview_time = baseUtils::getStr($_POST['interview_time']);
        $interview_address = baseUtils::getStr($_POST['interview_address']);
        $interviewer = baseUtils::getStr($_POST['interviewer']);
        $note = baseUtils::getStr($_POST['note']);
        try {
            apiClient::init('', '');
            $resumeService = new com\hlw\huilie\interfaces\resume\ResumeServiceClient(null);
            apiClient::build($resumeService);
            $resumeDo = new com\hlw\huilie\dataobject\resume\resumeRequestDTO();
            $resumeDo->resume_id = $this->resumeId;
            $resumeDo->project_id = $this->projectId;
            $resumeDo->interview_address = $interview_address;
            $resumeDo->interview_note = $note;
            $resumeDo->interview_time = $interview_time ? strtotime($interview_time) : 0;
            $resumeDo->interviewer = $interviewer;
            $resumeDo->uid = $this->uid;
            $info = $resumeService->orderInterview($resumeDo);
            if ($info->code != 200) {
                $this->ajax_return(500, false, $info->message);
            }
            $this->ajax_return(200, true, $info->message);
        } catch (Exception $e) {
            $this->ajax_return(500, false, $e->getMessage());
        }
    }

    /**
     * @desc 购买清单
     *   列表数据传递过去
     */
    public function buy_detail_action() {
        //1、候选人、年薪、应扣点数、当前可用点数
    }

    /**
     * @todo 记录购买记录
     * @desc 建立购买
     * 慧沟通  购买后下载简历/查看电话号码
     */
    function pay_action() {
        //1、@todo 判断账户余额
        $companyInfo = $this->obj->DB_select_once("company", "`uid`='" . $this->uid, "resume_payd,interview_payd,interview_payd_expect");
        $paydCount = $companyInfo['resume_payd'];
        if ($paydCount < 1) {
            $this->ajax_return(500, false, "套餐余额不足");
        }
        //2、更改状态
        try {
            apiClient::init('', '');
            $resumeService = new com\hlw\huilie\interfaces\resume\ResumeServiceClient(null);
            apiClient::build($resumeService);
            $resumeDo = new com\hlw\huilie\dataobject\resume\resumeRequestDTO();
            $resumeDo->resume_id = $this->resumeId;
            $resumeDo->project_id = $this->projectId;
            $resumeDo->status = 4;
            $resumeDo->uid = $this->uid;
            $info = $resumeService->statusUp($resumeDo);
            if ($info->code != 200) {
                $this->ajax_return(500, false, $info->message);
            }
        } catch (Exception $e) {
            $this->ajax_return(500, false, $e->getMessage());
        }
        //@todo 3、购买扣除点数
        //记录消费记录
        $this->buyLog(-1);
        $this->ajax_return(200, true, $info->message);
    }

    /**
     * @desc @todo 简历下载
     */
    function down_action() {
        //1、获取简历详情
        //2、更新状态
        $resumeInfo = [];
        try {
            apiClient::init('', '');
            $resumeService = new com\hlw\huilie\interfaces\resume\ResumeServiceClient(null);
            apiClient::build($resumeService);
            $resumeDo = new com\hlw\huilie\dataobject\resume\resumeRequestDTO();
            $resumeDo->resume_id = $this->resumeId;
            $resumeDo->project_id = $this->projectId;
            $resumeDo->uid = $this->uid;
            $info = $resumeService->download($resumeDo);
            if ($info->code != 200) {
                $this->ajax_return(500, false, $info->message);
            }
            $resumeInfo = json_decode($info->message, true);
//            $this->ajax_return(200, true, $resumeInfo);
        } catch (Exception $e) {
            $this->ajax_return(500, false, $e->getMessage());
        }
        //3、下载到文档
        $this->download($resumeInfo);
    }

    /**
     * @desc 候选人是否到场【慧简历】 扣除点数 1\
     */
    function present_action() {
        if (!isset($_POST['is_present'])) {
            $this->ajax_return(500, false, '请求错误');
        }
        $isPresent = baseUtils::getStr($_POST['is_present'], 'int');
        $status = $isPresent ? 11 : 10;
        try {
            apiClient::init('', '');
            $resumeService = new com\hlw\huilie\interfaces\resume\ResumeServiceClient(null);
            apiClient::build($resumeService);
            $resumeDo = new com\hlw\huilie\dataobject\resume\resumeRequestDTO();
            $resumeDo->resume_id = $this->resumeId;
            $resumeDo->project_id = $this->projectId;
            $resumeDo->status = $status;
            $resumeDo->uid = $this->uid;
            $info = $resumeService->statusUp($resumeDo);
            if ($info->code != 200) {
                $this->ajax_return(500, false, $info->message);
            }

        } catch (Exception $e) {
            $this->ajax_return(500, false, $e->getMessage());
        }
        if ($isPresent) {
            $this->buyLog(-1, '会面时到场扣除');
        }
        $this->ajax_return(200, true, '操作成功');
    }

    /**
     * @desc 移除简历 1
     */
    function remove_action() {
        $status = 0;
        try {
            apiClient::init('', '');
            $resumeService = new com\hlw\huilie\interfaces\resume\ResumeServiceClient(null);
            apiClient::build($resumeService);
            $resumeDo = new com\hlw\huilie\dataobject\resume\resumeRequestDTO();
            $resumeDo->resume_id = $this->resumeId;
            $resumeDo->project_id = $this->projectId;
            $resumeDo->status = $status;
            $info = $resumeService->statusUp($resumeDo);
            if ($info->code != 200) {
                $this->ajax_return(500, false, $info->message);
            }
            $this->ajax_return(200, true, $info->message);
        } catch (Exception $e) {
            $this->ajax_return(500, false, $e->getMessage());
        }
    }

    /**
     * @desc 下载简历至word模板
     * @param array $list
     * @throws Exception
     */
    private function download($list = []) {
        error_reporting(E_ALL);
        $tempNameList = [
            'name', 'sex', 'location', 'email', 'telephone',
            'industry', 'job_class', 'marital_status', 'curCompany',
            'age', 'school_name', 'curSalary', 'wantsalary', 'work_year', 'edu',
            'project_time', 'work_time', 'edu_time'
        ];
        require_once(APP_PATH . "/include/phpword/vendor/autoload.php");
        $phpWord = new  \PhpOffice\PhpWord\PhpWord();
        $tempDir = APP_PATH . '/resume/resume.docx';
        $templateProcessor = $phpWord->loadTemplate($tempDir);
        //填充基础信息
        $info = $list['info'];
        $name = "简历报告.docx";
        //简历基础信息
        foreach ($info as $filed => $baseValue) {
            //过滤不需要的字段变量
            if (in_array($filed, $tempNameList) === false) {
                continue;
            }
            if ($filed == 'name') {
                $name = $baseValue . $name;
            }
            $baseValue = trim($baseValue);
            $templateProcessor->setValue($filed, $baseValue);
        }
        //工作经验
        $works = $list['work'];
        $lines = count($works);
        $lines > 1 && $templateProcessor->cloneBlock('WORKLOCK', $lines, true, true);
        foreach ($works as $index => $workInfo) {
            $currentLine = $index + 1;
            foreach ($workInfo as $filed => $workValue) {
                $lines > 1 && $templateProcessor->setValue($filed . '#' . $currentLine, $workValue);
                $lines <= 1 && $templateProcessor->setValue($filed, $workValue);
            }
        }

        //教育经验
        $edus = $list['edu'];
        $lines = count($edus);
        $lines > 1 && $templateProcessor->cloneRow('edu_time', $lines); //clone行
        foreach ($edus as $index => $eduInfo) {
            $currentLine = $index + 1;
            foreach ($eduInfo as $filed => $eduValue) {
                $lines > 1 && $templateProcessor->setValue($filed . '#' . $currentLine, $eduValue);
                $lines <= 1 && $templateProcessor->setValue($filed, $eduValue);
            }
        }

        //${PROBLOCK}  项目经历
        $proList = $list['project'];
        $lines = count($proList);
        $lines > 1 && $templateProcessor->cloneBlock('PROBLOCK', $lines, true, true); //clone行
        foreach ($proList as $index => $proInfo) {
            $currentLine = $index + 1;
            foreach ($proInfo as $filed => $proValue) {
                $lines > 1 && $templateProcessor->setValue($filed . '#' . $currentLine, $proValue);
                $lines <= 1 && $templateProcessor->setValue($filed, $proValue);
            }
        }
        $name = yun_iconv('utf-8', 'gbk', $name);
        $templateProcessor->saveAs($name);
    }

    /**
     * @desc 消费记录
     * @param $price
     * @param string $remark
     * @return mixed
     */
    private function buyLog($price, $remark = '慧沟通购买') {
        //记录消费记录
        $data = [
            'order_id' => date("YmdHis"),
            'order_price' => $price,
            'pay_time' => time(),
            'pay_type' => 13,
            'pay_state' => 2,
            'com_id' => $this->uid,
            'pay_remark' => $remark,
        ];
        //company_pay
        return $this->obj->insert_into('company_pay', $data);
    }
}