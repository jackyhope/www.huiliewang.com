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

class sysnews_controller extends company
{
    /**
     * @desc t通知消息列表
     */
    function msg_list_action() {
        $where = "fa_uid= {$this->uid} and remind_status = 0";
        $notReadCount = $this->obj->DB_select_num('sysmsg', $where);
        $where .= " order by id desc limit 3";
        $list = $this->obj->DB_select_all_assoc('sysmsg', $where);
        if ($list) {
            foreach ($list as &$info) {
                $info['ctime'] = date('m-d H:i', $info['ctime']);
            }
        }

        $list = array_iconv($list);
        $data = ['count' => $notReadCount, 'list' => $list ? $list : []];
        $return = ['success' => true, 'code' => 200, 'info' => $data];
        exit(json_encode($return));
    }

    /**
     * @desc 消息阅读
     */
    public function reed_action() {
        $id = $_POST['message_id'];
        $isAll = $_POST['is_all'];
        if (!$id && !$isAll) {
            $messg = yun_iconv('gbk', 'utf-8', 'id is_all至少传递一个');
            $return = ['success' => false, 'code' => 500, 'info' => $messg];
            exit(json_encode($return));
        }
        if ($id) {
            if (!$this->obj->DB_select_once('sysmsg', "id = {$id}")) {
                $messg = yun_iconv('gbk', 'utf-8', '数据不存在');
                $return = ['success' => false, 'code' => 500, 'info' => $messg];
                exit(json_encode($return));
            }
            $this->obj->DB_update_all("sysmsg", "`remind_status`='1'", "`fa_uid`='" . $this->uid . "' and `id`={$id}");
        }
        if ($isAll) {
            $this->obj->DB_update_all("sysmsg", "`remind_status`='1'", "`fa_uid`='" . $this->uid . "' and `remind_status`='0'");
        }
        $messg = yun_iconv('gbk', 'utf-8', '操作成功');
        $return = ['success' => true, 'code' => 200, 'info' => $messg];
        exit(json_encode($return));
    }

    function index_action() {

        $urlarr = array("c" => "sysnews", "page" => "{{page}}");
        $pageurl = Url('member', $urlarr);
        $this->get_page("sysmsg", "`fa_uid`='" . $this->uid . "' order by id desc", $pageurl, "15");
        $this->obj->DB_update_all("sysmsg", "`remind_status`='1'", "`fa_uid`='" . $this->uid . "' and `remind_status`='0'");
        $this->public_action();
        $this->yunset("js_def", 7);
        $this->com_tpl('sysnews');
    }

    function del_action() {
        if ($_POST['del'] || $_GET['id']) {
            if (is_array($_POST['del'])) {
                $ids = pylode(',', $_POST['del']);
                $layer_type = '1';
            } else if ($_GET['id']) {
                $ids = (int)$_GET['id'];
                $layer_type = '0';
            }
            $nid = $this->obj->DB_delete_all("sysmsg", "`id` in(" . $ids . ") AND `fa_uid`='" . $this->uid . "'", " ");
            if ($nid) {
                $this->obj->member_log("删除系统消息");
                $this->layer_msg('删除成功！', 9, $layer_type, "index.php?c=sysnews");
            } else {
                $this->layer_msg('删除失败！', 8, $layer_type, "index.php?c=sysnews");
            }
        }
    }
}

?>