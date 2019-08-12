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

class jobadd_controller extends company
{

    function index_action() {
//        error_reporting(E_ALL);
        include(CONFIG_PATH . "db.data.php");
        $this->yunset("arr_data", $arr_data);
        $statics = $this->company_satic();
//		if( $statics['addjobnum'] == 2){
//			if(intval($statics['integral']) < intval($this->config['integral_job'])){
//				$this->ACT_msg($_SERVER['HTTP_REFERER'],"你的".$this->config['integral_pricename']."不够发布职位！",8);
//			}
//		}
        if ($_GET['id']) {
            $id = intval(baseUtils::getStr($_GET['id'], 'int'));
            $cmj = $this->obj->DB_select_once("company_job", "`id`='" . $id . "'");
            $this->yunset('id', $id);
        }
        $company = $this->get_user();
        $isCompleate = true;
        if (!$company['name'] || !$company['address'] || !$company['pr']) {
            $isCompleate = false;
        }
        $company['interview_payd'] = $company['interview_payd'] + $company['interview_payd_expect'];
        $msg = array();
        $isallow_addjob = "1";
        $url = "index.php?c=binding";
        if ($this->config['com_enforce_emailcert'] == "1") {
            if ($company['email_status'] != "1") {
                $isallow_addjob = "0";
                $msg[] = "邮箱认证";
            }
        }
        if ($this->config['com_enforce_mobilecert'] == "1") {
            if ($company['moblie_status'] != "1") {
                $isallow_addjob = "0";
                $msg[] = "手机认证";
            }
        }
        if ($this->config['com_enforce_licensecert'] == "1") {
            if ($company['yyzz_status'] != "1") {
                $isallow_addjob = "0";
                $msg[] = "营业执照认证";
            }
        }
        if ($isallow_addjob == "0") {
            $this->ACT_msg($url, "请先完成" . implode("、", $msg) . "！");
        }
        if ($this->config['com_enforce_setposition'] == "1") {
            if (empty($company['x']) || empty($company['y'])) {
//                $this->ACT_msg("index.php?c=map", "请先完成地图设置！");
            }
        }
        $save = $this->obj->DB_select_once("lssave", "`uid`='" . $this->uid . "'and `savetype`='4'");
        $save = unserialize($save['save']);
        if ($save['lastupdate']) {
            $save['time'] = date('H:i', ceil(($save['lastupdate'])));
        }
        $this->yunset("save", $save);
        $this->public_action();
        $CacheArr = $this->MODEL('cache')->GetCache(array('hy', 'job', 'city', 'com', 'circle'));
        $this->yunset($CacheArr);
        $row['hy'] = $company['hy'];
        $row['sdate'] = mktime();
        $row['edate'] = strtotime("+1 month");
        $row['number'] = $CacheArr['comdata']['job_number'][0];
        $row['type'] = $CacheArr['comdata']['job_type'][0];
        $row['exp'] = $CacheArr['comdata']['job_exp'][0];
        $row['report'] = $CacheArr['comdata']['job_report'][0];
        $row['age'] = $CacheArr['comdata']['job_age'][0];
        $row['edu'] = $CacheArr['comdata']['job_edu'][0];
        $row['marriage'] = $CacheArr['comdata']['job_marriage'][0];
        $this->yunset("company", $company);
        $jobnum = $this->obj->DB_select_num("company_job", "`uid`='" . $this->uid . "'");
        $this->yunset("jobnum", $jobnum);
        $this->yunset("row", $row);
        $this->yunset("isComplete", $isCompleate);
        $this->yunset('type', $cmj['service_type']);
        $this->yunset('job_type', $cmj['job_type']);
        $cmj['edate'] = ($cmj['edate'] - time()) / 24 / 3600;
        $cmj['edate'] = ceil($cmj['edate']) < 0 ? 0 : ceil($cmj['edate']);
        $this->yunset('company_job', $cmj);
        $lang = explode(',', $cmj['lang']);
        $welfare = explode(',', $cmj['welfare']);
        if ($lang)
            foreach ($lang as $k => $v) {
                if ($v == '103')
                    $this->yunset('lang103', '103');;
                if ($v == '100')
                    $this->yunset("lang100", '100');
                if ($v == '107')
                    $this->yunset("lang107", '107');
                if ($v == '104')
                    $this->yunset("lang104", '104');
                if ($v == '105')
                    $this->yunset("lang105", '105');
                if ($v == '106')
                    $this->yunset("lang106", '106');
                if ($v == '108')
                    $this->yunset("lang108", '108');
                if ($v == '110')
                    $this->yunset("lang103", '110');
            }
        if ($welfare) {
            foreach ($welfare as $k => $v) {
                if ($v == '95')
                    $this->yunset('welfare95', '95');
                if ($v == '94')
                    $this->yunset('welfare94', '94');
                if ($v == '92')
                    $this->yunset('welfare92', '92');
                if ($v == '91')
                    $this->yunset('welfare91', '91');
                if ($v == '90')
                    $this->yunset('welfare90', '90');
                if ($v == '96')
                    $this->yunset('welfare96', '96');
                if ($v == '97')
                    $this->yunset('welfare97', '97');
                if ($v == '93')
                    $this->yunset('welfare93', '93');
                if ($v == '98')
                    $this->yunset('welfare98', '98');
            }
        }
        $this->yunset("today", date('Y-m-d', time()));
        $this->yunset("js_def", 3);
        $this->com_tpl('jobadd');
    }

    function phone_action() {
        $this->public_action();
        $this->com_tpl('phone');
    }

    function pw_reset_action() {
        $this->public_action();
        $this->com_tpl('pw_reset');
    }

    function base_info_action() {

        /**企业资料数据源   **/
        $row = $this->obj->DB_select_once("company", "`uid`='" . $this->uid . "'");
        if ($row['comqcode']) {
            $row['comqcode'] = str_replace('./', $this->config['sy_weburl'] . '/', $row['comqcode']);
        }
        $save = $this->obj->DB_select_once("lssave", "`uid`='" . $this->uid . "'and `savetype`='3'");
        $save = unserialize($save['save']);
        if ($save['lastupdate']) {
            $save['time'] = date('H:i', ceil(($save['lastupdate'])));
        }
        if ($row['linkphone']) {
            $linkphone = @explode('-', $row['linkphone']);
            $row['phoneone'] = $linkphone[0];
            $row['phonetwo'] = $linkphone[1];
            $row['phonethree'] = $linkphone[2];
        }
        if (($row['x'] == '' || $row['y'] == '') && $row['address'] != '') {
            $row['setmap'] = 1;
        } elseif ($row['x'] != '' && $row['y'] != '') {
            $row['setmap'] = 2;
        } else {
            $row['setmap'] = 3;
        }
        $tel = $this->obj->DB_select_once("company_cert", "`uid`='" . $this->uid . "' and `type`='2'");
        $this->yunset("save", $save);
        $this->yunset("tel", $tel);
        $this->yunset("row", $row);
        $this->public_action();
        $this->city_cache();
        $this->job_cache();
        $this->com_cache();
        $this->industry_cache();
        $cert = $this->obj->DB_select_once("company_cert", "`uid`='" . $this->uid . "' and type='3'");
        $this->yunset("cert", $cert);
        $this->yunset("js_def", 2);
        /**企业资料数据源**/
//        $this->com_tpl('info');

        $CacheArr = $this->MODEL('cache')->GetCache(array('hy', 'job', 'city', 'com', 'circle'));
        $this->yunset($CacheArr);
        $this->public_action();
        $this->com_tpl('base_info');
    }

    function edit_action() {

        include(CONFIG_PATH . "db.data.php");
        $this->yunset("arr_data", $arr_data);
        $statics = $this->company_satic();
        if ($_GET['id']) {
            $id = (int)$_GET['id'];
        } else {
            if ($_GET['jobcopy']) {
                if ($statics['addjobnum'] == 2) {
                    if (intval($statics['integral']) < intval($this->config['integral_job'])) {
                        $this->ACT_msg($_SERVER['HTTP_REFERER'], "你的" . $this->config['integral_pricename'] . "不够发布职位！", 8);
                    }
                }
            }
            $id = (int)$_GET['jobcopy'];
        }
        $row = $this->obj->DB_select_once("company_job", "`id`='" . $id . "' and `uid`='" . $this->uid . "'");
        $lang[] = @explode(',', $row['lang']);
        if ($lang) {
            foreach ($lang as $key => $val) {
                $row['lang'] = $val;
            }
        }
        $welfare[] = @explode(',', $row['welfare']);
        if ($welfare) {
            foreach ($welfare as $key => $val) {
                $row['welfare'] = $val;
            }
        }
        $company = $this->get_user();
        if ($company['linktel'] == '' && $company['linkphone']) {
            $company['linktel'] = $company['linkphone'];
        }
        if ($row['edate'] < time()) {
            $row['days'] = 30;
            $row['edate'] = time() + 30 * 86400;
        } else {
            $row['days'] = ceil(($row['edate'] - $row['sdate']) / 86400);
        }

        $this->yunset($this->MODEL('cache')->GetCache(array('hy', 'job', 'city', 'com', 'user')));
        if ($row['three_cityid']) {
            $row['circlecity'] = $row['three_cityid'];
        } else if ($row['cityid']) {
            $row['circlecity'] = $row['cityid'];
        } else if ($row['provinceid']) {
            $row['circlecity'] = $row['provinceid'];
        }
        if ($row['autotime'] > time()) {
            $row['autodate'] = date("Y-m-d", $row['autotime']);
        }
        $job_link = $this->obj->DB_select_once("company_job_link", "`jobid`='" . $id . "' and `uid`='" . $this->uid . "'");
        $this->yunset("job_link", $job_link);
        $row['islink'] = $job_link['link_type'];
        $row['isemail'] = $job_link['email_type'];
        $this->public_action();
        $this->yunset("statis", $statics);
        $this->yunset("company", $company);
        $this->yunset("row", $row);
        $this->yunset("js_def", 3);
        $this->com_tpl('base_info');
    }

    function save_action() {
        if ($_POST['submitBtn']) {
            $id = intval($_POST['id']);
            if ($id) {
                $row = $this->obj->DB_select_once("company_job", "`id`='" . $id . "' and `uid`='" . $this->uid . "'", "`state`,`sdate`,`edate`,`id`");
            }
            $state = intval($_POST['state']);
            unset($_POST['submitBtn']);
            unset($_POST['id']);
            unset($_POST['state']);

            $_POST['sdate'] = time();
            $_POST['description'] = str_replace(array("&amp;", "background-color:#ffffff", "background-color:#fff", "white-space:nowrap;"), array("&", 'background-color:', 'background-color:', 'white-space:'), html_entity_decode($_POST['description'], ENT_QUOTES, "GB2312"));
            $comjob = $this->obj->DB_select_all("company_job", "`uid`='" . $this->uid . "' and `name`='" . $_POST['name'] . "'", "`id`");
            if ($comjob['id'] != $id && $id && $$comjob['id']) {
                $this->ACT_layer_msg("职位名称已存在！", 8);
            }

            $companycert = $this->obj->DB_select_once("company_cert", "`uid`='" . $this->uid . "'and type=3", "uid,type,status");

            if ($this->config['com_free_status'] == "1" && $companycert['status'] == "1") {
                $_POST['state'] = 1;
            } else {
                if ($this->config['com_job_status'] == "0") {
                    $msg = "等待审核！";
                }
                $member = $this->obj->DB_select_once("member", "`uid`='" . $this->uid . "'", "status");
                if ($member['status'] != "1") {
                    $_POST['state'] = 0;
                } else {
                    $_POST['state'] = $this->config['com_job_status'];
                }
            }

            if ($_POST['job_post']) {
                $row1 = $this->obj->DB_select_once("job_class", "`id`='" . intval($_POST['job_post']) . "'", "`keyid`");
                $row2 = $this->obj->DB_select_once("job_class", "`id`='" . $row1['keyid'] . "'", "`keyid`");
                if ($row2['keyid'] == '0') {
                    $_POST['job1_son'] = $_POST['job_post'];
                    $_POST['job1'] = $row1['keyid'];
                    unset($_POST['job_post']);
                } else {
                    $_POST['job1_son'] = $row1['keyid'];
                    $_POST['job1'] = $row2['keyid'];
                }
            }

            $CacheList = $this->MODEL('cache')->GetCache(array('com'));

            $lang = array();
            foreach ($CacheList['comdata']['job_lang'] as $k => $v) {
                if (intval($_POST['lang' . $v]) == $v) {
                    $lang[] = $v;
                }
            }
            if (!empty($lang)) {
                $_POST['lang'] = pyLode(',', $lang);
            } else {
                $_POST['lang'] = '';
            }
            $welfare = array();
            foreach ($CacheList['comdata']['job_welfare'] as $k => $v) {
                if (intval($_POST['welfare' . $v]) != '') {
                    $welfare[] = $v;
                }
            }
            if (!empty($welfare)) {
                $_POST['welfare'] = pyLode(',', $welfare);
            } else {
                $_POST['welfare'] = '';
            }
            if (intval($_POST['days']) && $_POST['days_type'] == '') {
                if (intval($_POST['days']) > 999) {
                    $_POST['days'] = 999;
                }
                $_POST['edate'] = time() + (int)trim($_POST['days']) * 86400;
                unset($_POST['days']);
            } else if ($_POST['days_type']) {
                unset($_POST['days_type']);
                unset($_POST['days']);
                $_POST['edate'] = strtotime($_POST['edate'] . " 23:59:59");
                if ($_POST['edate'] < time()) {
                    $this->ACT_layer_msg("结束时间小于当前日期！", 8, $_SERVER['HTTP_REFERER']);
                }
            }

            if ((int)$_POST['islink'] == '2' && ($_POST['link_man'] == '' || $_POST['link_moblie'] == '')) {
                $this->ACT_layer_msg("联系人、联系电话均不能为空！", 8);
            }

            if ((int)$_POST['isemail'] == '2') {
                if ($_POST['email'] == '') {
                    $this->ACT_layer_msg("请输入新联系邮箱！", 8);
                } else if ($this->CheckRegEmail($_POST['email']) == false) {
                    $this->ACT_layer_msg("新联系邮箱格式错误！", 8);
                }
            }
            $_POST['xuanshang'] = intval($_POST['xuanshang']);
            if (!$_POST['xuanshang']) {
                $_POST['xuanshang'] = '0';
            }
            $satic = $this->company_satic();
            $company = $this->get_user();
            $_POST['com_name'] = $company['name'];
            $_POST['com_logo'] = $company['logo'];
            $_POST['com_provinceid'] = $company['provinceid'];
            $_POST['pr'] = $company['pr'];
            $_POST['mun'] = $company['mun'];
            $_POST['rating'] = $satic['rating'];
            $islink = (int)$_POST['islink'];
            $link_type = $islink;
            if ($islink < 3) {
                $linktype = $islink;
                $islink = 1;
            } else {
                $islink = 0;
            }
            $isemail = (int)$_POST['isemail'];
            $emailtype = $isemail;
            if ($isemail < 3) {
                $isemail = 1;
            } else {
                $isemail = 0;
            }
            if ($_POST['salary_type']) {
                $_POST['minsalary'] = $_POST['maxsalary'] = 0;
            }
            $_POST['is_link'] = $islink;
            $_POST['link_type'] = $linktype;
            $_POST['is_email'] = $isemail;
            $link_moblie = $_POST['link_moblie'];
            $email = $_POST['email'];
            $link_man = $_POST['link_man'];
            $tblink = $_POST['tblink'];
            unset($_POST['link_moblie']);
            unset($_POST['islink']);
            unset($_POST['isemail']);
            unset($_POST['link_man']);
            unset($_POST['email']);
            if (!$id || intval($_POST['jobcopy']) == $id) {
                $_POST['sdate'] = time();
                $_POST['lastupdate'] = time();
                $_POST['uid'] = $this->uid;
                $_POST['did'] = $this->userdid;
                $this->get_com(1, $satic);
                $nid = $this->obj->insert_into("company_job", $_POST);
                $name = "添加职位";
                $type = '1';
                if ($nid) {
                    $this->obj->DB_delete_all("lssave", "`uid`='" . $this->uid . "'and `savetype`='4'");
                    $this->obj->DB_update_all("company", "`jobtime`='" . $_POST['lastupdate'] . "'", "`uid`='" . $this->uid . "'");
                    $state_content = "发布了新职位 <a href=\"" . $this->config['sy_weburl'] . "/index.php?m=job&c=comapply&id=$nid\" target=\"_blank\">" . $_POST['name'] . "</a>。";
                    $this->addstate($state_content, 2);
                }
            } else {
                $where['id'] = $id;
                $where['uid'] = $this->uid;

                $nid = $this->obj->update_once("company_job", $_POST, $where);
                $name = "更新职位";
                $type = '2';
                if ($nid) {
                    $this->obj->DB_update_all("company", "`lastupdate`='" . $_POST['lastupdate'] . "'", "`uid`='" . $this->uid . "'");
                }
            }
            $joblink = array();
            $joblink[] = "`email`='" . trim($email) . "',`is_email`='" . $isemail . "',`email_type`='" . $emailtype . "'";
            if ($linktype == 2) {
                $joblink[] = "`link_man`='" . $link_man . "',`link_moblie`='" . $link_moblie . "'";
            }
            if ($link_type) {
                $joblink[] = "`link_type`='" . $link_type . "'";
            }
            if ($id) {
                delfiledir("../data/upload/tel/" . $this->uid);
                $linkid = $this->obj->DB_select_once("company_job_link", "`uid`='" . $this->uid . "' and `jobid`='" . $id . "'", "id");
                if ($linkid['id']) {
                    if ($tblink == 1) {
                        $this->obj->DB_update_all("company_job_link", @implode(',', $joblink), "`uid`='" . $this->uid . "'");
                        $this->obj->DB_update_all("company_job", "`link_type`='2'", "`uid`='" . $this->uid . "'");
                    } else {
                        $this->obj->DB_update_all("company_job_link", @implode(',', $joblink), "`id`='" . $linkid['id'] . "'");
                    }
                } else {
                    $joblink[] = "`uid`='" . $this->uid . "'";
                    $sid = $this->obj->DB_insert_once("company_job_link", @implode(',', $joblink) . ",`jobid`='" . (int)$nid . "'");
                    if ($sid && $tblink == 1) {
                        $this->obj->DB_update_all("company_job_link", @implode(',', $joblink), "`uid`='" . $this->uid . "'");
                        $this->obj->DB_update_all("company_job", "`link_type`='2'", "`uid`='" . $this->uid . "'");
                    }
                }
            } else if ($nid > 0) {
                $joblink[] = "`uid`='" . $this->uid . "'";
                $sid = $this->obj->DB_insert_once("company_job_link", @implode(',', $joblink) . ",`jobid`='" . (int)$nid . "'");
                if ($sid && $tblink == 1) {
                    $this->obj->DB_update_all("company_job_link", @implode(',', $joblink), "`uid`='" . $this->uid . "'");
                    $this->obj->DB_update_all("company_job", "`link_type`='2'", "`uid`='" . $this->uid . "'");
                }
            }
            if ($nid && $_POST['xuanshang']) {
                $nid = $this->company_invtal($this->uid, $_POST['xuanshang'], false, "发布竟价职位", true, 2, 'integral', 11);
            }

            //判断新增or更新
            $job_id = 0;
            if (is_numeric($nid)) {
                $mode = 'add';
                $job_id = $nid;
            } elseif (is_numeric($id)) {
                $mode = 'update';
                $job_id = $id;
            }

            //处理语言要求
            $language = [];
            $_POST['lang103'] ? array_push($language, '英语') : '';
            $_POST['lang100'] ? array_push($language, '普通话') : '';
            $_POST['lang107'] ? array_push($language, '日语') : '';
            $_POST['lang104'] ? array_push($language, '韩语') : '';
            $_POST['lang105'] ? array_push($language, '德语') : '';
            $_POST['lang106'] ? array_push($language, '法语') : '';
            $_POST['lang108'] ? array_push($language, '粤语') : '';
            $language = implode(',', $language);
            try {
                apiClient::init($appid, $secret);
                $jobService = new com\hlw\huilie\interfaces\JobServiceClient(null);
                apiClient::build($jobService);
                $saveJobDo = new com\hlw\huilie\dataobject\job\JobRequestDTO();
                $saveJobDo->name = baseUtils::getStr($_POST['name']);
                $saveJobDo->minsalary = baseUtils::getStr($_POST['minsalary'], 'int');
                $saveJobDo->maxsalary = baseUtils::getStr($_POST['maxsalary'], 'int');
                $saveJobDo->ejob_salary_month = baseUtils::getStr($_POST['ejob_salary_month'], 'int');
                $saveJobDo->description = baseUtils::getStr($_POST['description']);
                $saveJobDo->detail_report = baseUtils::getStr($_POST['detail_report']);
                $saveJobDo->detail_subordinate = baseUtils::getStr($_POST['detail_subordinate'], 'int');
                $saveJobDo->number = baseUtils::getStr($_POST['number'], 'int');
                $saveJobDo->hy = baseUtils::getStr($_POST['hy']);
                $saveJobDo->exp = baseUtils::getStr($_POST['exp']);
                $saveJobDo->report = baseUtils::getStr($_POST['report']);
                $saveJobDo->edate = baseUtils::getStr($_POST['edate']);
                $saveJobDo->age = baseUtils::getStr($_POST['age']);
                $saveJobDo->sex = baseUtils::getStr($_POST['sex']);
                $saveJobDo->edu = baseUtils::getStr($_POST['edu']);
                $saveJobDo->language = $language;
                $saveJobDo->marriage = baseUtils::getStr($_POST['marriage']);
                $saveJobDo->uid = baseUtils::getStr($_POST['uid'], 'int');
                $saveJobDo->sdate = baseUtils::getStr($_POST['sdate']);
                $saveJobDo->com_name = baseUtils::getStr($_POST['com_name']);
                $saveJobDo->mode = baseUtils::getStr($mode);
                $saveJobDo->job_id = baseUtils::getStr($job_id, 'int');
                $result = $jobService->saveJob($saveJobDo);
            } catch (Exception $ex) {
                $this->ACT_layer_msg("更新失败！API服务失败", 8, "index.php?c=info");
            }
            if ($nid) {
                $this->obj->member_log($name . "《" . $_POST['name'] . "》", 1, $type);
                if ($id == '') {
                    $this->ACT_layer_msg($name . "成功！", 9, $nid);
                } else {
                    $this->ACT_layer_msg($name . "成功！", 9, $id);
                }
            } else {
                $this->ACT_layer_msg($name . "失败！", 8, $_SERVER['HTTP_REFERER']);
            }
        }
    }


    /**
     * @desc 职位更新
     */
    function saveInfo_action() {
        $uId = $this->uid;
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $_POST['name'] = $this->characet($_POST['name'], 'gbk');
        $_POST['description'] = $this->characet($_POST['description'], 'gbk');
        $_POST['detail_report'] = $this->characet($_POST['detail_report'], 'gbk');


        if (!$_POST['name']) {
            $return = ['success' => false, 'code' => 500, 'info' => "参数错误"];
            $this->jsonReturn($return);
        }
        $comjob = $this->obj->DB_select_all("company_job", "`uid`='" . $uId . "' and `name`='" . $_POST['name'] . "'", "`id`,service_type,uid,name,address,pr");
        if (!$id && $comjob) {
            $return = ['success' => false, 'code' => 500, 'info' => "职位名称已存在"];
            $this->jsonReturn($return);
        }
        if ($id && $comjob) {
            if ($_POST['service_type'] != $comjob[0]['service_type']) {
                $return = ['success' => false, 'code' => 500, 'info' => "服务方式不能修改"];
                $this->jsonReturn($return);
            }
            if ($uId != $comjob[0]['uid']) {
                $return = ['success' => false, 'code' => 500, 'info' => "您没权限更改"];
                $this->jsonReturn($return);
            }
        }
        if ($_POST['service_type'] == 0 && !$_POST['job_type']) {
            $return = ['success' => false, 'code' => 500, 'info' => "当前慧沟通职位级别"];
            $this->jsonReturn($return);
        }
        //套餐余量检查
        $companyInfo = $this->obj->DB_select_once("company", "`uid`=" . $this->uid, "resume_payd,interview_payd,interview_payd_expect,c_money,tb_customer_id,resume_payd_high");
        $serviceType = $_POST['service_type'];
        $jobType = $_POST['job_type'] ? intval($_POST['job_type']) : 1;
        if ($serviceType == 0 && $jobType == 1 && $companyInfo['resume_payd'] <= 0) {
            $return = ['success' => false, 'code' => 500, 'info' => "慧沟通余量不足"];
            $this->jsonReturn($return);
        }
        //检查年薪
        $salary = intval($_POST['maxsalary']) * intval($_POST['ejob_salary_month']);
        $salary = intval($salary / 10000);
        if ($serviceType == 0 && $jobType == 1 && $salary >= 20) {
            $return = ['success' => false, 'code' => 500, 'info' => "低级职位不能发布大于20W年薪职位"];
            $this->jsonReturn($return);
        }
        if ($serviceType == 0 && $jobType == 2 && $companyInfo['resume_payd_high'] <= 0) {
            $return = ['success' => false, 'code' => 500, 'info' => "慧沟通高级职位余量不足"];
            $this->jsonReturn($return);
        }
        //慧面试余量
        $companyInfo['interview_payd'] = $companyInfo['interview_payd'] + $companyInfo['interview_payd_expect'];
        if ($_POST['service_type'] == 1 && $companyInfo['interview_payd'] <= 0) {
            $return = ['success' => false, 'code' => 500, 'info' => "慧面试余量不足"];
            $this->jsonReturn($return);
        }
        $_POST['state'] = 0;
        $companyCert = $this->obj->DB_select_once("company_cert", "`uid`='" . $this->uid . "'and type=3", "uid,type,status");
        if ($this->config['com_free_status'] == "1" && $companyCert['status'] == "1") {
            $_POST['state'] = 1;
        } else {
            $member = $this->obj->DB_select_once("member", "`uid`='" . $this->uid . "'", "status");
            $member['status'] == 1 && $_POST['state'] = $this->config['com_job_status'];
        }

        $CacheList = $this->MODEL('cache')->GetCache(array('com'));
        $lang = [];
        foreach ($CacheList['comdata']['job_lang'] as $k => $v) {
            if (intval($_POST['lang' . $v]) == $v) {
                $lang[] = $v;
            }
        }
        $_POST['lang'] = '';
        !empty($lang) && $_POST['lang'] = pyLode(',', $lang);
        $welfare = [];
        foreach ($CacheList['comdata']['job_welfare'] as $k => $v) {
            if (intval($_POST['welfare' . $v]) != '') {
                $welfare[] = $v;
            }
        }
        $_POST['welfare'] = '';
        !empty($welfare) && $_POST['welfare'] = pyLode(',', $welfare);

        $_POST['days_type'] = 1;
        if (intval($_POST['days']) && $_POST['days_type'] == '') {
            if (intval($_POST['days']) > 999) {
                $_POST['days'] = 999;
            }
            $_POST['edate'] = time() + (int)trim($_POST['days']) * 86400;
        } else if ($_POST['days_type']) {
            $_POST['edate'] = strtotime(date('Y-m-d', $_POST['days']) . " 23:59:59");
            if ($_POST['edate'] < time()) {
                $return = ['success' => false, 'code' => 500, 'info' => "结束时间小于当前日期！"];
                $this->jsonReturn($return);
            }
        }
        $_POST['description'] = str_replace(array("&amp;", "background-color:#ffffff", "background-color:#fff", "white-space:nowrap;"), array("&", 'background-color:', 'background-color:', 'white-space:'), html_entity_decode($_POST['description'], ENT_QUOTES, "GB2312"));

        try {
            apiClient::init();
            $jobAddService = new com\hlw\huiliewang\interfaces\company\JobAddServiceClient(null);
            apiClient::build($jobAddService);
            $saveJobDo = new com\hlw\huiliewang\dataobject\company\jobAddRequestDTO();
            $saveJobDo->name = $_POST['name'];
            $saveJobDo->minsalary = baseUtils::getStr($_POST['minsalary']);
            $saveJobDo->maxsalary = baseUtils::getStr($_POST['maxsalary']);
            $saveJobDo->marriage = baseUtils::getStr($_POST['marriage'], 'int');
            $saveJobDo->ejob_salary_month = baseUtils::getStr($_POST['ejob_salary_month'], 'int');
            $saveJobDo->description = baseUtils::getStr($_POST['description'], 'html');
            $saveJobDo->detail_report = baseUtils::getStr($_POST['detail_report']);
            $saveJobDo->provinceid = baseUtils::getStr($_POST['provinceid'], 'int');
            $saveJobDo->cityid = baseUtils::getStr($_POST['cityid'], 'int');
            $saveJobDo->three_cityid = baseUtils::getStr($_POST['three_cityid'], 'int');
            $saveJobDo->detail_subordinate = baseUtils::getStr($_POST['detail_subordinate'], 'int');
            $saveJobDo->hy = baseUtils::getStr($_POST['hy'], 'int');
            $saveJobDo->number = baseUtils::getStr($_POST['number'], 'int');
            $saveJobDo->exp = baseUtils::getStr($_POST['exp'], 'int');
            $saveJobDo->report = baseUtils::getStr($_POST['report'], 'int');
            $saveJobDo->age = baseUtils::getStr($_POST['age'], 'int');
            $saveJobDo->sex = baseUtils::getStr($_POST['sex'], 'int');
            $saveJobDo->edu = baseUtils::getStr($_POST['edu'], 'int');
            $saveJobDo->tblink = baseUtils::getStr($_POST['tblink'], 'int');
            $saveJobDo->lang = baseUtils::getStr($_POST['lang']);
            $saveJobDo->welfare = baseUtils::getStr($_POST['welfare']);
            $saveJobDo->uId = baseUtils::getStr($uId, 'int');
            $saveJobDo->jobId = baseUtils::getStr($id, 'int');
            $saveJobDo->state = baseUtils::getStr($_POST['state'], 'int');
            $saveJobDo->edate = baseUtils::getStr($_POST['edate'], 'int');
            $saveJobDo->job_post = baseUtils::getStr($_POST['job_post']);
            $saveJobDo->service_type = baseUtils::getStr($_POST['service_type']);
            $saveJobDo->job_type = baseUtils::getStr($_POST['job_type']);
            $res = $jobAddService->saveJob($saveJobDo);
            if ($res->code != 200) {
                $return = ['success' => false, 'code' => 500, 'info' => yun_iconv('utf-8', 'gbk', $res->message)];
                $this->jsonReturn($return, false);
            }
            $jobId = $res->message;
        } catch (Exception $e) {
            $return = ['success' => false, 'code' => 500, 'info' => $e->getMessage()];
            $this->jsonReturn($return);
        }
        //
        !isset($jobId) && $jobId = $id;
        $res = $this->saveAfter($jobId, $id, $companyInfo['tb_customer_id']);
        if ($res) {
            $return = ['success' => true, 'code' => 200, 'info' => "更新成功"];
        } else {
            $return = ['success' => false, 'code' => 500, 'info' => "更新失败"];
        }
        $this->jsonReturn($return);
    }

    function productlist_action() {
        $uid = $this->uid;
        $jobid = baseUtils::getStr(trim($_GET['id']));
        apiClient::init($appid, $secret);
        $companyService = new com\hlw\huiliewang\interfaces\company\CompanyServiceClient(null);
        apiClient::build($companyService);
        $res = $companyService->productList($uid, $jobid);
        $arr_data = [];
        foreach ($res->data as $v) {
            $arr_data[] = yun_iconv("gbk", "utf-8", $v);
        }
        $return = ['success' => $res->success, 'code' => $res->code, 'data' => $arr_data];
        echo json_encode($return);
        die;
    }

    /**
     * @desc  操作后
     * @param $id
     * @param $isUp
     * @return bool
     */
    function saveAfter($id, $isUp = false, $oaCustomerId = 0) {
        $id = intval($id);
        if (!$id) {
            $return = ['success' => false, 'code' => 500, 'info' => '操作失败，请重新发布'];
            $this->jsonReturn($return);
        }
        $satic = $this->company_satic();
        $islink = (int)$_POST['islink'];
        $link_type = $islink;
        if ($islink < 3) {
            $linktype = $islink;
        }
        $isemail = (int)$_POST['isemail'];
        $emailtype = $isemail;
        $isemail = 0;
        if ($isemail < 3) {
            $isemail = 1;
        }
        $link_moblie = $_POST['link_moblie'];
        $email = $_POST['email'];
        $link_man = $_POST['link_man'];
        $tblink = $_POST['tblink'];
        if (!$isUp) {
            $this->get_com(1, $satic);
            $this->obj->DB_delete_all("lssave", "`uid`='" . $this->uid . "'and `savetype`='4'");
            $this->obj->DB_update_all("company", "`jobtime`='" . $_POST['lastupdate'] . "'", "`uid`='" . $this->uid . "'");
            $state_content = "发布了新职位 <a href=\"" . $this->config['sy_weburl'] . "/index.php?m=job&c=comapply&id=$id\" target=\"_blank\">" . $_POST['name'] . "</a>。";
            $this->addstate($state_content, 2);

        } else {
            $where['id'] = $id;
            $where['uid'] = $this->uid;
            $this->obj->DB_update_all("company", "`lastupdate`='" . $_POST['lastupdate'] . "'", "`uid`='" . $this->uid . "'");

        }
        $joblink = array();
        $joblink[] = "`email`='" . trim($email) . "',`is_email`='" . $isemail . "',`email_type`='" . $emailtype . "'";
        if ($linktype == 2) {
            $joblink[] = "`link_man`='" . $link_man . "',`link_moblie`='" . $link_moblie . "'";
        }
        if ($link_type) {
            $joblink[] = "`link_type`='" . $link_type . "'";
        }
        if ($id) {
            delfiledir("../data/upload/tel/" . $this->uid);
            $linkid = $this->obj->DB_select_once("company_job_link", "`uid`='" . $this->uid . "' and `jobid`='" . $id . "'", "id");
            if ($linkid['id']) {
                if ($tblink == 1) {
                    $this->obj->DB_update_all("company_job_link", @implode(',', $joblink), "`uid`='" . $this->uid . "'");
                    $this->obj->DB_update_all("company_job", "`link_type`='2'", "`uid`='" . $this->uid . "'");
                } else {
                    $this->obj->DB_update_all("company_job_link", @implode(',', $joblink), "`id`='" . $linkid['id'] . "'");
                }
            } else {
                $joblink[] = "`uid`='" . $this->uid . "'";
                $sid = $this->obj->DB_insert_once("company_job_link", @implode(',', $joblink) . ",`jobid`='" . (int)$id . "'");
                if ($sid && $tblink == 1) {
                    $this->obj->DB_update_all("company_job_link", @implode(',', $joblink), "`uid`='" . $this->uid . "'");
                    $this->obj->DB_update_all("company_job", "`link_type`='2'", "`uid`='" . $this->uid . "'");
                }
            }
        }
        ($id && $_POST['xuanshang']) && $this->company_invtal($this->uid, $_POST['xuanshang'], false, "发布竟价职位", true, 2, 'integral', 11);

        //同步OA
        $mode = $isUp ? "update" : 'add';
        //处理语言要求
        $language = [];
        $_POST['lang103'] ? array_push($language, '英语') : '';
        $_POST['lang100'] ? array_push($language, '普通话') : '';
        $_POST['lang107'] ? array_push($language, '日语') : '';
        $_POST['lang104'] ? array_push($language, '韩语') : '';
        $_POST['lang105'] ? array_push($language, '德语') : '';
        $_POST['lang106'] ? array_push($language, '法语') : '';
        $_POST['lang108'] ? array_push($language, '粤语') : '';
        $language = implode(',', $language);
        $company = $this->get_user();
        $_POST['sdate'] = time();
        $_POST['lastupdate'] = time();
        $_POST['com_name'] = $company['name'];
        $_POST['com_logo'] = $company['logo'];
        $_POST['com_provinceid'] = $company['provinceid'];
        $_POST['pr'] = $company['pr'];
        $_POST['mun'] = $company['mun'];
        $_POST['rating'] = $satic['rating'];
        $_POST['description'] = str_replace(array("&amp;", "background-color:#ffffff", "background-color:#fff", "white-space:nowrap;"), array("&", 'background-color:', 'background-color:', 'white-space:'), html_entity_decode($_POST['description'], ENT_QUOTES, "GB2312"));
        $_POST['name'] = change_encoding($_POST['name'], 'utf-8');
        $_POST['description'] = change_encoding($_POST['description'], 'utf-8');
        $names = '';
        if ($_POST['job_post']) {
            $jobs = explode(',', $_POST['job_post']);
            $jobclass = $this->MODEL('cache')->GetCache(array('job'));
            $jobNames = $jobclass['job_name'];
            $name = [];
            foreach ($jobs as $jobId) {
                array_push($name, $jobNames[$jobId]);
            }
            $names = implode(',', $name);
        }
        $_POST['service_type'] == 2 && $_POST['service_type'] = 0; //0慧简历初级，2慧简历高级 3：慧面试
        try {
            apiClient::init();
            $jobService = new com\hlw\huilie\interfaces\JobServiceClient(null);
            apiClient::build($jobService);
            $saveJobDo = new com\hlw\huilie\dataobject\job\JobRequestDTO();
            $saveJobDo->name = $_POST['name'];
            $saveJobDo->minsalary = baseUtils::getStr($_POST['minsalary'], 'int');
            $saveJobDo->maxsalary = baseUtils::getStr($_POST['maxsalary'], 'int');
            $saveJobDo->ejob_salary_month = baseUtils::getStr($_POST['ejob_salary_month'], 'int');
            $saveJobDo->description = $_POST['description'];
            $saveJobDo->detail_report = baseUtils::getStr($_POST['detail_report']);
            $saveJobDo->detail_subordinate = baseUtils::getStr($_POST['detail_subordinate'], 'int');
            $saveJobDo->number = baseUtils::getStr($_POST['number'], 'int');
            $saveJobDo->hy = baseUtils::getStr($_POST['hy']);
            $saveJobDo->exp = baseUtils::getStr($_POST['exp']);
            $saveJobDo->report = baseUtils::getStr($_POST['report']);
            $saveJobDo->edate = baseUtils::getStr($_POST['edate']);
            $saveJobDo->age = baseUtils::getStr($_POST['age']);
            $saveJobDo->sex = baseUtils::getStr($_POST['sex']);
            $saveJobDo->edu = baseUtils::getStr($_POST['edu']);
            $saveJobDo->language = $language;
            $saveJobDo->marriage = baseUtils::getStr($_POST['marriage']);
            $saveJobDo->uid = baseUtils::getStr($_POST['uid'], 'int');
            $saveJobDo->sdate = baseUtils::getStr($_POST['sdate']);
            $saveJobDo->com_name = baseUtils::getStr($_POST['com_name']);
            $saveJobDo->mode = baseUtils::getStr($mode);
            $saveJobDo->job_id = baseUtils::getStr($id, 'int');
            $saveJobDo->service_type = baseUtils::getStr($_POST['service_type'], 'int');
            $saveJobDo->customer_id = intval($oaCustomerId);
            $saveJobDo->location = intval($_POST['provinceid']);
            $saveJobDo->job_class = baseUtils::getStr($names);

            $result = $jobService->saveJob($saveJobDo);
            if ($result->code != 200) {
                $return = ['success' => false, 'code' => 500, 'info' => $result->message];
                $this->jsonReturn($return, false);
            }
        } catch (Exception $ex) {
            $return = ['success' => false, 'code' => 500, 'info' => $ex->getMessage()];
            $this->jsonReturn($return);
        }
        return true;
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

?>