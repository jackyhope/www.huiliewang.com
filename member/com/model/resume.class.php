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

class resume_controller extends company
{
    function index_action() {
        include(CONFIG_PATH . "db.data.php");
        unset($arr_data['sex'][3]);
        $this->yunset("arr_data", $arr_data);
        $uptime = array(1 => '����', 3 => '���3��', 7 => '���7��', 30 => '���һ����', 90 => '���������');
        $this->yunset('uptime', $uptime);
        $CacheM = $this->MODEL('cache');
        $CacheList = $CacheM->GetCache(array('city', 'user', 'job', 'hy'));
        $date = date("Y", 0);
        $time = date("Y", time());
        $this->yunset("date", $date);
        $this->yunset("time", $time);
        $this->yunset($CacheList);
        $this->yunset("type", $_GET['type']);
        $this->public_action();
        $this->yunset("js_def", 8);
        if(!empty($_GET['c_type']) && in_array($_GET['c_type'],[1,4,8,99])){
            switch ($_GET['c_type']){
                case 1:
                    $temp = 'resume';
                    break;
                case 4:
                    $temp = 'resume4';
                    break;
                case 8:
                    $temp = 'resume8';
                    break;
                case 99:
                    $temp = 'resume99';
                    break;

            }
        }else{
            $temp = 'resume';
        }
        $this->com_tpl($temp);
    }

    function detail_action() {
//        error_reporting(E_ALL);
        $resumeId = BaseUtils::getStr($_GET['resume_id'], 'int');
        $projectId = BaseUtils::getStr($_GET['project_id'], 'int');
        $resumeDo = '';
        $resumeService = '';
        if(!$resumeId || !$projectId){
            $this->ACT_msg($this->config['sy_weburl'],"��ȡʧ�ܣ�");
        }
        //��������
        $list = [];
        try {
            apiClient::init('', '');
            $resumeService = new com\hlw\huilie\interfaces\resume\ResumeServiceClient(null);
            apiClient::build($resumeService);
            $resumeDo = new com\hlw\huilie\dataobject\resume\resumeRequestDTO();
            $resumeDo->resume_id = $resumeId;
            $resumeDo->project_id = $projectId;
            $info = $resumeService->info($resumeDo);

            if ($info->code != 200) {
                $info->message = yun_iconv('utf-8', 'gbk', $info->message);
                $this->ACT_msg("index.php?c=resume",  $info->message);
            }
            $list = json_decode($info->message, true);
        } catch (Exception $e) {
            $this->ACT_msg("index.php?c=resume",  $e->getMessage());
        }

        //������Ŀ������¼
        $logs = [];
        try {
            $resumeDo->resume_id = $resumeId;
            $resumeDo->project_id = $projectId;
            $info = $resumeService->projectLog($resumeDo);
            if ($info->code != 200) {
                $info->message = yun_iconv('utf-8', 'gbk', $info->message);
                $this->ACT_msg("index.php?c=resume",  $info->message);
            }
            $logs = json_decode($info->message, true);

        } catch (Exception $e) {
            $this->ACT_msg("index.php?c=resume",$e->getMessage());
        }
        $list = array_iconv($list, 'utf-8', 'gbk');
        $logs = array_iconv($logs, 'utf-8', 'gbk');
        $logs && $logs == array_values($logs);

        $this->yunset("projectId", $projectId);
        $this->yunset("resumeId", $resumeId);
        $this->yunset("info", $list);
        $this->yunset("logs", $logs);
        $this->yunset("status", $list['work_info']['huilie_status']);
        $this->yunset("pro_type", $list['work_info']['pro_type']);
        $this->com_tpl('resume_detail');
    }
}