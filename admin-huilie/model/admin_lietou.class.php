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
class admin_lietou_controller extends common
{
        function set_search()
        {
            $rating = $this->obj->DB_select_all("lietou_rating", "`category`='1' order by `sort` asc", "`id`,`name`");
            if (!empty($rating)) {
                foreach ($rating as $k => $v) {
                    $ratingarr[$v['id']] = $v['name'];
                }
            }
            include(CONFIG_PATH . "db.data.php");
            $source = $arr_data['source'];
            $adtime = array('1' => '今天', '3' => '最近三天', '7' => '最近七天', '15' => '最近半月', '30' => '最近一个月');
            $lotime = array('1' => '今天', '3' => '最近三天', '7' => '最近七天', '15' => '最近半月', '30' => '最近一个月');
            $status = array('1' => '已审核', '2' => '已锁定', '3' => '未通过', '4' => '未审核');
            $edtime = array('1' => '7天内', '2' => '一个月内', '3' => '半年内', '4' => '一年内');
//            $search_list[] = array("param" => "rating", "name" => '会员等级', "value" => $ratingarr);
//            $search_list[] = array("param" => "time", "name" => '到期时间', "value" => $edtime);
            $search_list[] = array("param" => "status", "name" => '审核状态', "value" => $status);
//            $search_list[] = array('param' => 'source', 'name' => '数据来源', 'value' => $source);
//            $search_list[] = array("param" => "rec", "name" => '知名猎头', "value" => array("1" => "是", "2" => "否"));
//            $search_list[] = array("param" => "gw", "name" => '猎头顾问', "value" => array("1" => "已分配", "2" => "未分配"));
            $search_list[] = array("param" => "lotime", "name" => '最近登录', "value" => $lotime);
            $search_list[] = array("param" => "adtime", "name" => '最近注册', "value" => $adtime);
            $this->yunset("source", $source);
            $this->yunset("ratingarr", $ratingarr);
            $this->yunset("search_list", $search_list);
        }

        function arr_tostr($data){
            if(is_array($data)){
                foreach($data as $key=>$v){
                    $v = stripslashes($v);
                    $value[]="`".$key."`='".$v."'";
                }
            }
            $value=@implode(",",$value);
            return $value;
        }


    function try_action(){
        global $db;
        set_time_limit(0);
        for($i=1678;$i<78496;$i++){
            $li = $this->obj->DB_select_once("resume_index","id=".$i);

            $data['uid'] = "'".$li['uid']."'";
            $data['birthdate'] = "'".$li['birthdate']."'";
            $data['hy'] = "'".$li['hy']."'";
            $data['location'] = "'".$li['location']."'";
            $data['jobs_id'] = "'".$li['jobs_id']."'";
            $data['jobs_id1'] = "'".$li['jobs_id1']."'";
            $data['jobs_id2'] = "'".$li['jobs_id2']."'";
            $data['edu'] = "'".$li['edu']."'";
            $data['exp'] = "'".$li['exp']."'";
            $data['sex'] = "'".$li['sex']."'";
            $data['minsalary'] = "'".$li['minsalary']."'";
            $data['maxsalary'] = "'".$li['maxsalary']."'";
            $data['salary_month'] = "'".$li['salary_month']."'";
            $data['city'] = "'".$li['city']."'";
            $data['city1'] = "'".$li['city1']."'";
            $data['city2'] = "'".$li['city2']."'";
            $data['addtime'] = "'".$li['addtime']."'";
            $data['lastupdate'] = "'".$li['lastupdate']."'";
            $data['status'] = "'".$li['status']."'";
//            $sql .="(".implode(",",$data)."),";

//                $sql= $where.",";
                $id = $this->obj->insert_into("resume_index",$data);


            if($id) {
                $resume = $this->obj->DB_select_once("resume", "id=" . $li['id']);
                $data1['id'] = $id;
                $data1['uid'] = "'" . $resume['uid'] . "'";
                $data1['index_id'] = $id;
                $data1['name'] = "'" . $resume['name'] . "'";
                $data1['nametype'] = "'" . $resume['nametype'] . "'";
                $data1['sex'] = "'" . $resume['sex'] . "'";
                $data1['birthday'] = "'" . $resume['birthday'] . "'";
                $data1['marriage'] = "'" . $resume['marriage'] . "'";
                $data1['height'] = "'" . $resume['height'] . "'";
                $data1['nationality'] = "'" . $resume['nationality'] . "'";
                $data1['weight'] = "'" . $resume['weight'] . "'";
                $data1['idcard'] = "'" . $resume['idcard'] . "'";
                $data1['telphone'] = "'" . $resume['telphone'] . "'";
                $data1['telhome'] = "'" . $resume['telhome'] . "'";
                $data1['email'] = "'" . $resume['email'] . "'";
                $data1['edu'] = "'" . $resume['edu'] . "'";
                $data1['homepage'] = "'" . $resume['homepage'] . "'";
                $data1['address'] = "'" . $resume['address'] . "'";
                $data1['description'] = "'" . $resume['description'] . "'";
                $data1['resume_photo'] = "'" . $resume['resume_photo'] . "'";
                $data1['photo'] = "'" . $resume['photo'] . "'";
                $data1['phototype'] = "'" . $resume['phototype'] . "'";
                $data1['expect'] = "'" . $resume['expect'] . "'";
                $data1['def_job'] = "'" . $resume['def_job'] . "'";
                $data1['exp'] = "'" . $resume['exp'] . "'";
                $data1['status'] = "'" . $resume['status'] . "'";
                $data1['lastupdate'] = "'" . $resume['lastupdate'] . "'";
                $data1['resumetime'] = "'" . $resume['resumetime'] . "'";
                $data1['idcard_pic'] = "'" . $resume['idcard_pic'] . "'";
                $data1['email_status'] = "'" . $resume['email_status'] . "'";
                $data1['moblie_status'] = "'" . $resume['moblie_status'] . "'";
                $data1['idcard_status'] = "'" . $resume['idcard_status'] . "'";
                $data1['statusbody'] = "'" . $resume['statusbody'] . "'";
                $data1['cert_time'] = "'" . $resume['cert_time'] . "'";
                $data1['r_status'] = "'" . $resume['r_status'] . "'";
                $data1['ant_num'] = "'" . $resume['ant_num'] . "'";
                $data1['email_dy'] = "'" . $resume['email_dy'] . "'";
                $data1['msg_dy'] = "'" . $resume['msg_dy'] . "'";
                $data1['living'] = "'" . $resume['living'] . "'";
                $data1['domicile'] = "'" . $resume['domicile'] . "'";
                $data1['basic_info'] = "'" . $resume['basic_info'] . "'";
                $data1['hy_dy'] = "'" . $resume['hy_dy'] . "'";
                $data1['info_status'] = "'" . $resume['info_status'] . "'";
                $data1['did'] = "'" . $resume['did'] . "'";
                $data1['qq'] = "'" . $resume['qq'] . "'";
                $data1['wxewm'] = "'" . $resume['wxewm'] . "'";
                $data1['tag'] = "'" . $resume['tag'] . "'";
                $data1['attach_info'] = "'" . $resume['attach_info'] . "'";
                $data1['project_content'] = "'" . $resume['project_content'] . "'";
                $data1['edu_content'] = "'" . $resume['edu_content'] . "'";
                $data1['file_path'] = "'" . $resume['file_path'] . "'";
                $data1['work_content'] = "'" . $resume['work_content'] . "'";
//            $table_name = $this->get_hash_table("resume",$data1['id']);
//            $num = str_replace("resume_","",$table_name);
//            $resume_sql[$num] .="(".implode(",",$data1)."),";
                $this->obj->insert_into($this->get_hash_table("resume", $data1['id']), $data1);


                $resume_expect = $this->obj->DB_select_once("resume_expect", "id=" . $li['id']);
                $data2['id'] = $id;
                $data2['resume_id'] = $id;
                $data2['uid'] = "'" . $resume_expect['uid'] . "'";
                $data2['name'] = "'" . $resume_expect['name'] . "'";
                $data2['hy'] = "'" . $resume_expect['hy'] . "'";
                $data2['job_classid'] = "'" . $resume_expect['job_classid'] . "'";
                $data2['hy_name'] = "'" . $resume_expect['hy_name'] . "'";
                $data2['job_name'] = "'" . $resume_expect['job_name'] . "'";
                $data2['provinceid'] = "'" . $resume_expect['provinceid'] . "'";
                $data2['cityid'] = "'" . $resume_expect['cityid'] . "'";
                $data2['three_cityid'] = "'" . $resume_expect['three_cityid'] . "'";
                $data2['hope_city'] = "'" . $resume_expect['hope_city'] . "'";
                $data2['salary'] = "'" . $resume_expect['salary'] . "'";
                $data2['jobstatus'] = "'" . $resume_expect['jobstatus'] . "'";
                $data2['type'] = "'" . $resume_expect['type'] . "'";
                $data2['report'] = "'" . $resume_expect['report'] . "'";
                $data2['defaults'] = "'" . $resume_expect['defaults'] . "'";
                $data2['open'] = "'" . $resume_expect['open'] . "'";
                $data2['is_entrust'] = "'" . $resume_expect['is_entrust'] . "'";
                $data2['full'] = "'" . $resume_expect['full'] . "'";
                $data2['doc'] = "'" . $resume_expect['doc'] . "'";
                $data2['hits'] = "'" . $resume_expect['hits'] . "'";
                $data2['lastupdate'] = "'" . $resume_expect['lastupdate'] . "'";
                $data2['def_job'] = "'" . $resume_expect['def_job'] . "'";
                $data2['cloudtype'] = "'" . $resume_expect['cloudtype'] . "'";
                $data2['olduid'] = "'" . $resume_expect['olduid'] . "'";
                $data2['integrity'] = "'" . $resume_expect['integrity'] . "'";
                $data2['height_status'] = "'" . $resume_expect['height_status'] . "'";
                $data2['statusbody'] = "'" . $resume_expect['statusbody'] . "'";
                $data2['status_time'] = "'" . $resume_expect['status_time'] . "'";
                $data2['rec'] = "'" . $resume_expect['rec'] . "'";
                $data2['top'] = "'" . $resume_expect['top'] . "'";
                $data2['topdate'] = "'" . $resume_expect['topdate'] . "'";
                $data2['rec_resume'] = "'" . $resume_expect['rec_resume'] . "'";
                $data2['dom_sort'] = "'" . $resume_expect['dom_sort'] . "'";
                $data2['resume_diy'] = "'" . $resume_expect['resume_diy'] . "'";
                $data2['source'] = "'" . $resume_expect['source'] . "'";
                $data2['tmpid'] = "'" . $resume_expect['tmpid'] . "'";
                $data2['ctime'] = "'" . $resume_expect['ctime'] . "'";
                $data2['dnum'] = "'" . $resume_expect['dnum'] . "'";
                $data2['did'] = "'" . $resume_expect['did'] . "'";
                $data2['uname'] = "'" . $resume_expect['uname'] . "'";
                $data2['idcard_status'] = "'" . $resume_expect['idcard_status'] . "'";
                $data2['status'] = "'" . $resume_expect['status'] . "'";
                $data2['r_status'] = "'" . $resume_expect['r_status'] . "'";
                $data2['edu'] = "'" . $resume_expect['edu'] . "'";
                $data2['exp'] = "'" . $resume_expect['exp'] . "'";
                $data2['sex'] = "'" . $resume_expect['sex'] . "'";
                $data2['photo'] = "'" . $resume_expect['photo'] . "'";
                $data2['phototype'] = "'" . $resume_expect['phototype'] . "'";
                $data2['birthday'] = "'" . $resume_expect['birthday'] . "'";
                $data2['annex'] = "'" . $resume_expect['annex'] . "'";
                $data2['annexname'] = "'" . $resume_expect['annexname'] . "'";
                $data2['minsalary'] = "'" . $resume_expect['minsalary'] . "'";
                $data2['maxsalary'] = "'" . $resume_expect['maxsalary'] . "'";
                $data2['whour'] = "'" . $resume_expect['whour'] . "'";
                $data2['avghour'] = "'" . $resume_expect['avghour'] . "'";
                $data2['wage_hope'] = "'" . $resume_expect['wage_hope'] . "'";
                $data2['wage_current'] = "'" . $resume_expect['wage_current'] . "'";
                $data2['moneyMonthes'] = "'" . $resume_expect['moneyMonthes'] . "'";

                //            $table_name = $this->get_hash_table("resume_expect",$data2['id']);
                //            $num = str_replace("resume_expect_","",$table_name);
                //            $expect_sql[$num] .="(".implode(",",$data2)."),";
                $this->obj->insert_into($this->get_hash_table("resume_expect", $data2['id']), $data2);
            }
        }
//            echo $sql;exit();
//            $db->query("insert into phpyun_resume_index VALUES(0,35,837,27,127,0,0,15,0,2,4000,0,12,27,0,0,1517303565,0,0),(0,36,41,27,127,0,0,14,0,1,4000,0,12,0,0,0,1517303565,0,0)");exit();
//        $db->query(substr($sql,0,strlen($sql)-1));
//        foreach ($resume_sql as $li){
//            if(strlen($li)>38){
//                $li = substr($li,0,strlen($li)-1);
//                $li = str_replace(",,",",'',",$li);
//                $li = str_replace(",,",",'',",$li);
//                $db->query($li);
//            }
//        }
//        foreach ($expect_sql as $li){
//            if(strlen($li)>42) {
//                $li = substr($li, 0, strlen($li) - 1);
//                $li = str_replace(",,", ",'',", $li);
//                $li = str_replace(",,", ",'',", $li);
//
//                $db->query($li);
//            }
//        }
//            $db->query('COMMIT');
//            echo date("H:i:s");
//           $indexs = $this->obj->DB_select_all("resume_index");
//           foreach ($indexs as $li){
//               $resume = $this->obj->DB_select_once("resume","id=".$li['id']);
//               $resume_expect = $this->obj->DB_select_once("resume_expect","id=".$li['id']);
//               var_dump($resume_expect);exit();


//           }
    }

        function test_action(){
//            78495 78708 79132 79922 80680
            global $db;
//            echo date("H:i:s");
//            $a[1]="1";
//            $a[2]="";
//            $a[3]="2";
//            $a[4]="3";
//            echo implode(",",$a);exit();
//echo 22;exit();

            set_time_limit(0);
            $sql= "insert into phpyun_resume_index(uid,birthdate,hy,location,jobs_id,jobs_id1,jobs_id2,edu,exp,sex,	minsalary,maxsalary,salary_month,city,city1,city2,addtime,lastupdate,status) VALUES";
            $expect_sql[1]='insert into phpyun_resume_expect_1 VALUES';
            $expect_sql[2]='insert into phpyun_resume_expect_2 VALUES';
            $expect_sql[3]='insert into phpyun_resume_expect_3 VALUES';
            $expect_sql[4]='insert into phpyun_resume_expect_4 VALUES';
            $expect_sql[5]='insert into phpyun_resume_expect_5 VALUES';
            $expect_sql[6]='insert into phpyun_resume_expect_6 VALUES';
            $expect_sql[7]='insert into phpyun_resume_expect_7 VALUES';
            $expect_sql[8]='insert into phpyun_resume_expect_8 VALUES';
            $expect_sql[9]='insert into phpyun_resume_expect_9 VALUES';
            $expect_sql[10]='insert into phpyun_resume_expect_10 VALUES';
            $expect_sql[11]='insert into phpyun_resume_expect_11 VALUES';
            $expect_sql[12]='insert into phpyun_resume_expect_12 VALUES';
            $expect_sql[13]='insert into phpyun_resume_expect_13 VALUES';
            $expect_sql[14]='insert into phpyun_resume_expect_14 VALUES';
            $expect_sql[15]='insert into phpyun_resume_expect_15 VALUES';
            $expect_sql[16]='insert into phpyun_resume_expect_16 VALUES';
            $expect_sql[17]='insert into phpyun_resume_expect_17 VALUES';
            $expect_sql[18]='insert into phpyun_resume_expect_18 VALUES';
            $expect_sql[19]='insert into phpyun_resume_expect_19 VALUES';
            $expect_sql[20]='insert into phpyun_resume_expect_20 VALUES';
            $expect_sql[21]='insert into phpyun_resume_expect_21 VALUES';
            $expect_sql[22]='insert into phpyun_resume_expect_22 VALUES';
            $expect_sql[23]='insert into phpyun_resume_expect_23 VALUES';
            $expect_sql[24]='insert into phpyun_resume_expect_24 VALUES';
            $expect_sql[25]='insert into phpyun_resume_expect_25 VALUES';
            $expect_sql[26]='insert into phpyun_resume_expect_26 VALUES';
            $expect_sql[27]='insert into phpyun_resume_expect_27 VALUES';
            $expect_sql[28]='insert into phpyun_resume_expect_28 VALUES';
            $expect_sql[29]='insert into phpyun_resume_expect_29 VALUES';
            $expect_sql[30]='insert into phpyun_resume_expect_30 VALUES';
            $expect_sql[31]='insert into phpyun_resume_expect_31 VALUES';
            $expect_sql[32]='insert into phpyun_resume_expect_32 VALUES';
            $expect_sql[33]='insert into phpyun_resume_expect_33 VALUES';
            $expect_sql[34]='insert into phpyun_resume_expect_34 VALUES';
            $expect_sql[35]='insert into phpyun_resume_expect_35 VALUES';
            $expect_sql[36]='insert into phpyun_resume_expect_36 VALUES';
            $expect_sql[37]='insert into phpyun_resume_expect_37 VALUES';
            $expect_sql[38]='insert into phpyun_resume_expect_38 VALUES';
            $expect_sql[39]='insert into phpyun_resume_expect_39 VALUES';
            $expect_sql[40]='insert into phpyun_resume_expect_40 VALUES';
            $expect_sql[41]='insert into phpyun_resume_expect_41 VALUES';
            $expect_sql[42]='insert into phpyun_resume_expect_42 VALUES';
            $expect_sql[43]='insert into phpyun_resume_expect_43 VALUES';
            $expect_sql[44]='insert into phpyun_resume_expect_44 VALUES';
            $expect_sql[45]='insert into phpyun_resume_expect_45 VALUES';
            $expect_sql[46]='insert into phpyun_resume_expect_46 VALUES';
            $expect_sql[47]='insert into phpyun_resume_expect_47 VALUES';
            $expect_sql[48]='insert into phpyun_resume_expect_48 VALUES';
            $expect_sql[49]='insert into phpyun_resume_expect_49 VALUES';
            $expect_sql[50]='insert into phpyun_resume_expect_50 VALUES';
            $expect_sql[51]='insert into phpyun_resume_expect_51 VALUES';
            $expect_sql[52]='insert into phpyun_resume_expect_52 VALUES';
            $expect_sql[53]='insert into phpyun_resume_expect_53 VALUES';
            $expect_sql[54]='insert into phpyun_resume_expect_54 VALUES';
            $expect_sql[55]='insert into phpyun_resume_expect_55 VALUES';
            $expect_sql[56]='insert into phpyun_resume_expect_56 VALUES';
            $expect_sql[57]='insert into phpyun_resume_expect_57 VALUES';
            $expect_sql[58]='insert into phpyun_resume_expect_58 VALUES';
            $expect_sql[59]='insert into phpyun_resume_expect_59 VALUES';
            $expect_sql[60]='insert into phpyun_resume_expect_60 VALUES';
            $expect_sql[61]='insert into phpyun_resume_expect_61 VALUES';
            $expect_sql[62]='insert into phpyun_resume_expect_62 VALUES';
            $expect_sql[63]='insert into phpyun_resume_expect_63 VALUES';
            $expect_sql[64]='insert into phpyun_resume_expect_64 VALUES';
            $expect_sql[65]='insert into phpyun_resume_expect_65 VALUES';
            $expect_sql[66]='insert into phpyun_resume_expect_66 VALUES';
            $expect_sql[67]='insert into phpyun_resume_expect_67 VALUES';
            $expect_sql[68]='insert into phpyun_resume_expect_68 VALUES';
            $expect_sql[69]='insert into phpyun_resume_expect_69 VALUES';
            $expect_sql[70]='insert into phpyun_resume_expect_70 VALUES';
            $expect_sql[71]='insert into phpyun_resume_expect_71 VALUES';
            $expect_sql[72]='insert into phpyun_resume_expect_72 VALUES';
            $expect_sql[73]='insert into phpyun_resume_expect_73 VALUES';
            $expect_sql[74]='insert into phpyun_resume_expect_74 VALUES';
            $expect_sql[75]='insert into phpyun_resume_expect_75 VALUES';
            $expect_sql[76]='insert into phpyun_resume_expect_76 VALUES';
            $expect_sql[77]='insert into phpyun_resume_expect_77 VALUES';
            $expect_sql[78]='insert into phpyun_resume_expect_78 VALUES';
            $expect_sql[79]='insert into phpyun_resume_expect_79 VALUES';
            $expect_sql[80]='insert into phpyun_resume_expect_80 VALUES';
            $expect_sql[81]='insert into phpyun_resume_expect_81 VALUES';
            $expect_sql[82]='insert into phpyun_resume_expect_82 VALUES';
            $expect_sql[83]='insert into phpyun_resume_expect_83 VALUES';
            $expect_sql[84]='insert into phpyun_resume_expect_84 VALUES';
            $expect_sql[85]='insert into phpyun_resume_expect_85 VALUES';
            $expect_sql[86]='insert into phpyun_resume_expect_86 VALUES';
            $expect_sql[87]='insert into phpyun_resume_expect_87 VALUES';
            $expect_sql[88]='insert into phpyun_resume_expect_88 VALUES';
            $expect_sql[89]='insert into phpyun_resume_expect_89 VALUES';
            $expect_sql[90]='insert into phpyun_resume_expect_90 VALUES';
            $expect_sql[91]='insert into phpyun_resume_expect_91 VALUES';
            $expect_sql[92]='insert into phpyun_resume_expect_92 VALUES';
            $expect_sql[93]='insert into phpyun_resume_expect_93 VALUES';
            $expect_sql[94]='insert into phpyun_resume_expect_94 VALUES';
            $expect_sql[95]='insert into phpyun_resume_expect_95 VALUES';
            $expect_sql[96]='insert into phpyun_resume_expect_96 VALUES';
            $expect_sql[97]='insert into phpyun_resume_expect_97 VALUES';
            $expect_sql[98]='insert into phpyun_resume_expect_98 VALUES';
            $expect_sql[99]='insert into phpyun_resume_expect_99 VALUES';
            $expect_sql[100]='insert into phpyun_resume_expect_100 VALUES';
            $expect_sql[101]='insert into phpyun_resume_expect_101 VALUES';
            $expect_sql[102]='insert into phpyun_resume_expect_102 VALUES';
            $expect_sql[103]='insert into phpyun_resume_expect_103 VALUES';
            $expect_sql[104]='insert into phpyun_resume_expect_104 VALUES';
            $expect_sql[105]='insert into phpyun_resume_expect_105 VALUES';
            $expect_sql[106]='insert into phpyun_resume_expect_106 VALUES';
            $expect_sql[107]='insert into phpyun_resume_expect_107 VALUES';
            $expect_sql[108]='insert into phpyun_resume_expect_108 VALUES';
            $expect_sql[109]='insert into phpyun_resume_expect_109 VALUES';
            $expect_sql[110]='insert into phpyun_resume_expect_110 VALUES';
            $expect_sql[111]='insert into phpyun_resume_expect_111 VALUES';
            $expect_sql[112]='insert into phpyun_resume_expect_112 VALUES';
            $expect_sql[113]='insert into phpyun_resume_expect_113 VALUES';
            $expect_sql[114]='insert into phpyun_resume_expect_114 VALUES';
            $expect_sql[115]='insert into phpyun_resume_expect_115 VALUES';
            $expect_sql[116]='insert into phpyun_resume_expect_116 VALUES';
            $expect_sql[117]='insert into phpyun_resume_expect_117 VALUES';
            $expect_sql[118]='insert into phpyun_resume_expect_118 VALUES';
            $expect_sql[119]='insert into phpyun_resume_expect_119 VALUES';
            $expect_sql[120]='insert into phpyun_resume_expect_120 VALUES';
            $expect_sql[121]='insert into phpyun_resume_expect_121 VALUES';
            $expect_sql[122]='insert into phpyun_resume_expect_122 VALUES';
            $expect_sql[123]='insert into phpyun_resume_expect_123 VALUES';
            $expect_sql[124]='insert into phpyun_resume_expect_124 VALUES';
            $expect_sql[125]='insert into phpyun_resume_expect_125 VALUES';
            $expect_sql[126]='insert into phpyun_resume_expect_126 VALUES';
            $expect_sql[127]='insert into phpyun_resume_expect_127 VALUES';
            $expect_sql[128]='insert into phpyun_resume_expect_128 VALUES';
            $expect_sql[129]='insert into phpyun_resume_expect_129 VALUES';
            $expect_sql[130]='insert into phpyun_resume_expect_130 VALUES';
            $expect_sql[131]='insert into phpyun_resume_expect_131 VALUES';
            $expect_sql[132]='insert into phpyun_resume_expect_132 VALUES';
            $expect_sql[133]='insert into phpyun_resume_expect_133 VALUES';
            $expect_sql[134]='insert into phpyun_resume_expect_134 VALUES';
            $expect_sql[135]='insert into phpyun_resume_expect_135 VALUES';
            $expect_sql[136]='insert into phpyun_resume_expect_136 VALUES';
            $expect_sql[137]='insert into phpyun_resume_expect_137 VALUES';
            $expect_sql[138]='insert into phpyun_resume_expect_138 VALUES';
            $expect_sql[139]='insert into phpyun_resume_expect_139 VALUES';
            $expect_sql[140]='insert into phpyun_resume_expect_140 VALUES';
            $expect_sql[141]='insert into phpyun_resume_expect_141 VALUES';
            $expect_sql[142]='insert into phpyun_resume_expect_142 VALUES';
            $expect_sql[143]='insert into phpyun_resume_expect_143 VALUES';
            $expect_sql[144]='insert into phpyun_resume_expect_144 VALUES';
            $expect_sql[145]='insert into phpyun_resume_expect_145 VALUES';
            $expect_sql[146]='insert into phpyun_resume_expect_146 VALUES';
            $expect_sql[147]='insert into phpyun_resume_expect_147 VALUES';
            $expect_sql[148]='insert into phpyun_resume_expect_148 VALUES';
            $expect_sql[149]='insert into phpyun_resume_expect_149 VALUES';
            $expect_sql[150]='insert into phpyun_resume_expect_150 VALUES';
            $expect_sql[151]='insert into phpyun_resume_expect_151 VALUES';
            $expect_sql[152]='insert into phpyun_resume_expect_152 VALUES';
            $expect_sql[153]='insert into phpyun_resume_expect_153 VALUES';
            $expect_sql[154]='insert into phpyun_resume_expect_154 VALUES';
            $expect_sql[155]='insert into phpyun_resume_expect_155 VALUES';
            $expect_sql[156]='insert into phpyun_resume_expect_156 VALUES';
            $expect_sql[157]='insert into phpyun_resume_expect_157 VALUES';
            $expect_sql[158]='insert into phpyun_resume_expect_158 VALUES';
            $expect_sql[159]='insert into phpyun_resume_expect_159 VALUES';
            $expect_sql[160]='insert into phpyun_resume_expect_160 VALUES';
            $expect_sql[161]='insert into phpyun_resume_expect_161 VALUES';
            $expect_sql[162]='insert into phpyun_resume_expect_162 VALUES';
            $expect_sql[163]='insert into phpyun_resume_expect_163 VALUES';
            $expect_sql[164]='insert into phpyun_resume_expect_164 VALUES';
            $expect_sql[165]='insert into phpyun_resume_expect_165 VALUES';
            $expect_sql[166]='insert into phpyun_resume_expect_166 VALUES';
            $expect_sql[167]='insert into phpyun_resume_expect_167 VALUES';
            $expect_sql[168]='insert into phpyun_resume_expect_168 VALUES';
            $expect_sql[169]='insert into phpyun_resume_expect_169 VALUES';
            $expect_sql[170]='insert into phpyun_resume_expect_170 VALUES';
            $expect_sql[171]='insert into phpyun_resume_expect_171 VALUES';
            $expect_sql[172]='insert into phpyun_resume_expect_172 VALUES';
            $expect_sql[173]='insert into phpyun_resume_expect_173 VALUES';
            $expect_sql[174]='insert into phpyun_resume_expect_174 VALUES';
            $expect_sql[175]='insert into phpyun_resume_expect_175 VALUES';
            $expect_sql[176]='insert into phpyun_resume_expect_176 VALUES';
            $expect_sql[177]='insert into phpyun_resume_expect_177 VALUES';
            $expect_sql[178]='insert into phpyun_resume_expect_178 VALUES';
            $expect_sql[179]='insert into phpyun_resume_expect_179 VALUES';
            $expect_sql[180]='insert into phpyun_resume_expect_180 VALUES';
            $expect_sql[181]='insert into phpyun_resume_expect_181 VALUES';
            $expect_sql[182]='insert into phpyun_resume_expect_182 VALUES';
            $expect_sql[183]='insert into phpyun_resume_expect_183 VALUES';
            $expect_sql[184]='insert into phpyun_resume_expect_184 VALUES';
            $expect_sql[185]='insert into phpyun_resume_expect_185 VALUES';
            $expect_sql[186]='insert into phpyun_resume_expect_186 VALUES';
            $expect_sql[187]='insert into phpyun_resume_expect_187 VALUES';
            $expect_sql[188]='insert into phpyun_resume_expect_188 VALUES';
            $expect_sql[189]='insert into phpyun_resume_expect_189 VALUES';
            $expect_sql[190]='insert into phpyun_resume_expect_190 VALUES';
            $expect_sql[191]='insert into phpyun_resume_expect_191 VALUES';
            $expect_sql[192]='insert into phpyun_resume_expect_192 VALUES';
            $expect_sql[193]='insert into phpyun_resume_expect_193 VALUES';
            $expect_sql[194]='insert into phpyun_resume_expect_194 VALUES';
            $expect_sql[195]='insert into phpyun_resume_expect_195 VALUES';
            $expect_sql[196]='insert into phpyun_resume_expect_196 VALUES';
            $expect_sql[197]='insert into phpyun_resume_expect_197 VALUES';
            $expect_sql[198]='insert into phpyun_resume_expect_198 VALUES';
            $expect_sql[199]='insert into phpyun_resume_expect_199 VALUES';
            $expect_sql[200]='insert into phpyun_resume_expect_200 VALUES';
            $expect_sql[201]='insert into phpyun_resume_expect_201 VALUES';
            $expect_sql[202]='insert into phpyun_resume_expect_202 VALUES';
            $expect_sql[203]='insert into phpyun_resume_expect_203 VALUES';
            $expect_sql[204]='insert into phpyun_resume_expect_204 VALUES';
            $expect_sql[205]='insert into phpyun_resume_expect_205 VALUES';
            $expect_sql[206]='insert into phpyun_resume_expect_206 VALUES';
            $expect_sql[207]='insert into phpyun_resume_expect_207 VALUES';
            $expect_sql[208]='insert into phpyun_resume_expect_208 VALUES';
            $expect_sql[209]='insert into phpyun_resume_expect_209 VALUES';
            $expect_sql[210]='insert into phpyun_resume_expect_210 VALUES';
            $expect_sql[211]='insert into phpyun_resume_expect_211 VALUES';
            $expect_sql[212]='insert into phpyun_resume_expect_212 VALUES';
            $expect_sql[213]='insert into phpyun_resume_expect_213 VALUES';
            $expect_sql[214]='insert into phpyun_resume_expect_214 VALUES';
            $expect_sql[215]='insert into phpyun_resume_expect_215 VALUES';
            $expect_sql[216]='insert into phpyun_resume_expect_216 VALUES';
            $expect_sql[217]='insert into phpyun_resume_expect_217 VALUES';
            $expect_sql[218]='insert into phpyun_resume_expect_218 VALUES';
            $expect_sql[219]='insert into phpyun_resume_expect_219 VALUES';
            $expect_sql[220]='insert into phpyun_resume_expect_220 VALUES';
            $expect_sql[221]='insert into phpyun_resume_expect_221 VALUES';
            $expect_sql[222]='insert into phpyun_resume_expect_222 VALUES';
            $expect_sql[223]='insert into phpyun_resume_expect_223 VALUES';
            $expect_sql[224]='insert into phpyun_resume_expect_224 VALUES';
            $expect_sql[225]='insert into phpyun_resume_expect_225 VALUES';
            $expect_sql[226]='insert into phpyun_resume_expect_226 VALUES';
            $expect_sql[227]='insert into phpyun_resume_expect_227 VALUES';
            $expect_sql[228]='insert into phpyun_resume_expect_228 VALUES';
            $expect_sql[229]='insert into phpyun_resume_expect_229 VALUES';
            $expect_sql[230]='insert into phpyun_resume_expect_230 VALUES';
            $expect_sql[231]='insert into phpyun_resume_expect_231 VALUES';
            $expect_sql[232]='insert into phpyun_resume_expect_232 VALUES';
            $expect_sql[233]='insert into phpyun_resume_expect_233 VALUES';
            $expect_sql[234]='insert into phpyun_resume_expect_234 VALUES';
            $expect_sql[235]='insert into phpyun_resume_expect_235 VALUES';
            $expect_sql[236]='insert into phpyun_resume_expect_236 VALUES';
            $expect_sql[237]='insert into phpyun_resume_expect_237 VALUES';
            $expect_sql[238]='insert into phpyun_resume_expect_238 VALUES';
            $expect_sql[239]='insert into phpyun_resume_expect_239 VALUES';
            $expect_sql[240]='insert into phpyun_resume_expect_240 VALUES';
            $expect_sql[241]='insert into phpyun_resume_expect_241 VALUES';
            $expect_sql[242]='insert into phpyun_resume_expect_242 VALUES';
            $expect_sql[243]='insert into phpyun_resume_expect_243 VALUES';
            $expect_sql[244]='insert into phpyun_resume_expect_244 VALUES';
            $expect_sql[245]='insert into phpyun_resume_expect_245 VALUES';
            $expect_sql[246]='insert into phpyun_resume_expect_246 VALUES';
            $expect_sql[247]='insert into phpyun_resume_expect_247 VALUES';
            $expect_sql[248]='insert into phpyun_resume_expect_248 VALUES';
            $expect_sql[249]='insert into phpyun_resume_expect_249 VALUES';
            $expect_sql[250]='insert into phpyun_resume_expect_250 VALUES';

            $resume_sql[1]='insert into phpyun_resume_1 VALUES';
            $resume_sql[2]='insert into phpyun_resume_2 VALUES';
            $resume_sql[3]='insert into phpyun_resume_3 VALUES';
            $resume_sql[4]='insert into phpyun_resume_4 VALUES';
            $resume_sql[5]='insert into phpyun_resume_5 VALUES';
            $resume_sql[6]='insert into phpyun_resume_6 VALUES';
            $resume_sql[7]='insert into phpyun_resume_7 VALUES';
            $resume_sql[8]='insert into phpyun_resume_8 VALUES';
            $resume_sql[9]='insert into phpyun_resume_9 VALUES';
            $resume_sql[10]='insert into phpyun_resume_10 VALUES';
            $resume_sql[11]='insert into phpyun_resume_11 VALUES';
            $resume_sql[12]='insert into phpyun_resume_12 VALUES';
            $resume_sql[13]='insert into phpyun_resume_13 VALUES';
            $resume_sql[14]='insert into phpyun_resume_14 VALUES';
            $resume_sql[15]='insert into phpyun_resume_15 VALUES';
            $resume_sql[16]='insert into phpyun_resume_16 VALUES';
            $resume_sql[17]='insert into phpyun_resume_17 VALUES';
            $resume_sql[18]='insert into phpyun_resume_18 VALUES';
            $resume_sql[19]='insert into phpyun_resume_19 VALUES';
            $resume_sql[20]='insert into phpyun_resume_20 VALUES';
            $resume_sql[21]='insert into phpyun_resume_21 VALUES';
            $resume_sql[22]='insert into phpyun_resume_22 VALUES';
            $resume_sql[23]='insert into phpyun_resume_23 VALUES';
            $resume_sql[24]='insert into phpyun_resume_24 VALUES';
            $resume_sql[25]='insert into phpyun_resume_25 VALUES';
            $resume_sql[26]='insert into phpyun_resume_26 VALUES';
            $resume_sql[27]='insert into phpyun_resume_27 VALUES';
            $resume_sql[28]='insert into phpyun_resume_28 VALUES';
            $resume_sql[29]='insert into phpyun_resume_29 VALUES';
            $resume_sql[30]='insert into phpyun_resume_30 VALUES';
            $resume_sql[31]='insert into phpyun_resume_31 VALUES';
            $resume_sql[32]='insert into phpyun_resume_32 VALUES';
            $resume_sql[33]='insert into phpyun_resume_33 VALUES';
            $resume_sql[34]='insert into phpyun_resume_34 VALUES';
            $resume_sql[35]='insert into phpyun_resume_35 VALUES';
            $resume_sql[36]='insert into phpyun_resume_36 VALUES';
            $resume_sql[37]='insert into phpyun_resume_37 VALUES';
            $resume_sql[38]='insert into phpyun_resume_38 VALUES';
            $resume_sql[39]='insert into phpyun_resume_39 VALUES';
            $resume_sql[40]='insert into phpyun_resume_40 VALUES';
            $resume_sql[41]='insert into phpyun_resume_41 VALUES';
            $resume_sql[42]='insert into phpyun_resume_42 VALUES';
            $resume_sql[43]='insert into phpyun_resume_43 VALUES';
            $resume_sql[44]='insert into phpyun_resume_44 VALUES';
            $resume_sql[45]='insert into phpyun_resume_45 VALUES';
            $resume_sql[46]='insert into phpyun_resume_46 VALUES';
            $resume_sql[47]='insert into phpyun_resume_47 VALUES';
            $resume_sql[48]='insert into phpyun_resume_48 VALUES';
            $resume_sql[49]='insert into phpyun_resume_49 VALUES';
            $resume_sql[50]='insert into phpyun_resume_50 VALUES';
            $resume_sql[51]='insert into phpyun_resume_51 VALUES';
            $resume_sql[52]='insert into phpyun_resume_52 VALUES';
            $resume_sql[53]='insert into phpyun_resume_53 VALUES';
            $resume_sql[54]='insert into phpyun_resume_54 VALUES';
            $resume_sql[55]='insert into phpyun_resume_55 VALUES';
            $resume_sql[56]='insert into phpyun_resume_56 VALUES';
            $resume_sql[57]='insert into phpyun_resume_57 VALUES';
            $resume_sql[58]='insert into phpyun_resume_58 VALUES';
            $resume_sql[59]='insert into phpyun_resume_59 VALUES';
            $resume_sql[60]='insert into phpyun_resume_60 VALUES';
            $resume_sql[61]='insert into phpyun_resume_61 VALUES';
            $resume_sql[62]='insert into phpyun_resume_62 VALUES';
            $resume_sql[63]='insert into phpyun_resume_63 VALUES';
            $resume_sql[64]='insert into phpyun_resume_64 VALUES';
            $resume_sql[65]='insert into phpyun_resume_65 VALUES';
            $resume_sql[66]='insert into phpyun_resume_66 VALUES';
            $resume_sql[67]='insert into phpyun_resume_67 VALUES';
            $resume_sql[68]='insert into phpyun_resume_68 VALUES';
            $resume_sql[69]='insert into phpyun_resume_69 VALUES';
            $resume_sql[70]='insert into phpyun_resume_70 VALUES';
            $resume_sql[71]='insert into phpyun_resume_71 VALUES';
            $resume_sql[72]='insert into phpyun_resume_72 VALUES';
            $resume_sql[73]='insert into phpyun_resume_73 VALUES';
            $resume_sql[74]='insert into phpyun_resume_74 VALUES';
            $resume_sql[75]='insert into phpyun_resume_75 VALUES';
            $resume_sql[76]='insert into phpyun_resume_76 VALUES';
            $resume_sql[77]='insert into phpyun_resume_77 VALUES';
            $resume_sql[78]='insert into phpyun_resume_78 VALUES';
            $resume_sql[79]='insert into phpyun_resume_79 VALUES';
            $resume_sql[80]='insert into phpyun_resume_80 VALUES';
            $resume_sql[81]='insert into phpyun_resume_81 VALUES';
            $resume_sql[82]='insert into phpyun_resume_82 VALUES';
            $resume_sql[83]='insert into phpyun_resume_83 VALUES';
            $resume_sql[84]='insert into phpyun_resume_84 VALUES';
            $resume_sql[85]='insert into phpyun_resume_85 VALUES';
            $resume_sql[86]='insert into phpyun_resume_86 VALUES';
            $resume_sql[87]='insert into phpyun_resume_87 VALUES';
            $resume_sql[88]='insert into phpyun_resume_88 VALUES';
            $resume_sql[89]='insert into phpyun_resume_89 VALUES';
            $resume_sql[90]='insert into phpyun_resume_90 VALUES';
            $resume_sql[91]='insert into phpyun_resume_91 VALUES';
            $resume_sql[92]='insert into phpyun_resume_92 VALUES';
            $resume_sql[93]='insert into phpyun_resume_93 VALUES';
            $resume_sql[94]='insert into phpyun_resume_94 VALUES';
            $resume_sql[95]='insert into phpyun_resume_95 VALUES';
            $resume_sql[96]='insert into phpyun_resume_96 VALUES';
            $resume_sql[97]='insert into phpyun_resume_97 VALUES';
            $resume_sql[98]='insert into phpyun_resume_98 VALUES';
            $resume_sql[99]='insert into phpyun_resume_99 VALUES';
            $resume_sql[100]='insert into phpyun_resume_100 VALUES';
            $resume_sql[101]='insert into phpyun_resume_101 VALUES';
            $resume_sql[102]='insert into phpyun_resume_102 VALUES';
            $resume_sql[103]='insert into phpyun_resume_103 VALUES';
            $resume_sql[104]='insert into phpyun_resume_104 VALUES';
            $resume_sql[105]='insert into phpyun_resume_105 VALUES';
            $resume_sql[106]='insert into phpyun_resume_106 VALUES';
            $resume_sql[107]='insert into phpyun_resume_107 VALUES';
            $resume_sql[108]='insert into phpyun_resume_108 VALUES';
            $resume_sql[109]='insert into phpyun_resume_109 VALUES';
            $resume_sql[110]='insert into phpyun_resume_110 VALUES';
            $resume_sql[111]='insert into phpyun_resume_111 VALUES';
            $resume_sql[112]='insert into phpyun_resume_112 VALUES';
            $resume_sql[113]='insert into phpyun_resume_113 VALUES';
            $resume_sql[114]='insert into phpyun_resume_114 VALUES';
            $resume_sql[115]='insert into phpyun_resume_115 VALUES';
            $resume_sql[116]='insert into phpyun_resume_116 VALUES';
            $resume_sql[117]='insert into phpyun_resume_117 VALUES';
            $resume_sql[118]='insert into phpyun_resume_118 VALUES';
            $resume_sql[119]='insert into phpyun_resume_119 VALUES';
            $resume_sql[120]='insert into phpyun_resume_120 VALUES';
            $resume_sql[121]='insert into phpyun_resume_121 VALUES';
            $resume_sql[122]='insert into phpyun_resume_122 VALUES';
            $resume_sql[123]='insert into phpyun_resume_123 VALUES';
            $resume_sql[124]='insert into phpyun_resume_124 VALUES';
            $resume_sql[125]='insert into phpyun_resume_125 VALUES';
            $resume_sql[126]='insert into phpyun_resume_126 VALUES';
            $resume_sql[127]='insert into phpyun_resume_127 VALUES';
            $resume_sql[128]='insert into phpyun_resume_128 VALUES';
            $resume_sql[129]='insert into phpyun_resume_129 VALUES';
            $resume_sql[130]='insert into phpyun_resume_130 VALUES';
            $resume_sql[131]='insert into phpyun_resume_131 VALUES';
            $resume_sql[132]='insert into phpyun_resume_132 VALUES';
            $resume_sql[133]='insert into phpyun_resume_133 VALUES';
            $resume_sql[134]='insert into phpyun_resume_134 VALUES';
            $resume_sql[135]='insert into phpyun_resume_135 VALUES';
            $resume_sql[136]='insert into phpyun_resume_136 VALUES';
            $resume_sql[137]='insert into phpyun_resume_137 VALUES';
            $resume_sql[138]='insert into phpyun_resume_138 VALUES';
            $resume_sql[139]='insert into phpyun_resume_139 VALUES';
            $resume_sql[140]='insert into phpyun_resume_140 VALUES';
            $resume_sql[141]='insert into phpyun_resume_141 VALUES';
            $resume_sql[142]='insert into phpyun_resume_142 VALUES';
            $resume_sql[143]='insert into phpyun_resume_143 VALUES';
            $resume_sql[144]='insert into phpyun_resume_144 VALUES';
            $resume_sql[145]='insert into phpyun_resume_145 VALUES';
            $resume_sql[146]='insert into phpyun_resume_146 VALUES';
            $resume_sql[147]='insert into phpyun_resume_147 VALUES';
            $resume_sql[148]='insert into phpyun_resume_148 VALUES';
            $resume_sql[149]='insert into phpyun_resume_149 VALUES';
            $resume_sql[150]='insert into phpyun_resume_150 VALUES';
            $resume_sql[151]='insert into phpyun_resume_151 VALUES';
            $resume_sql[152]='insert into phpyun_resume_152 VALUES';
            $resume_sql[153]='insert into phpyun_resume_153 VALUES';
            $resume_sql[154]='insert into phpyun_resume_154 VALUES';
            $resume_sql[155]='insert into phpyun_resume_155 VALUES';
            $resume_sql[156]='insert into phpyun_resume_156 VALUES';
            $resume_sql[157]='insert into phpyun_resume_157 VALUES';
            $resume_sql[158]='insert into phpyun_resume_158 VALUES';
            $resume_sql[159]='insert into phpyun_resume_159 VALUES';
            $resume_sql[160]='insert into phpyun_resume_160 VALUES';
            $resume_sql[161]='insert into phpyun_resume_161 VALUES';
            $resume_sql[162]='insert into phpyun_resume_162 VALUES';
            $resume_sql[163]='insert into phpyun_resume_163 VALUES';
            $resume_sql[164]='insert into phpyun_resume_164 VALUES';
            $resume_sql[165]='insert into phpyun_resume_165 VALUES';
            $resume_sql[166]='insert into phpyun_resume_166 VALUES';
            $resume_sql[167]='insert into phpyun_resume_167 VALUES';
            $resume_sql[168]='insert into phpyun_resume_168 VALUES';
            $resume_sql[169]='insert into phpyun_resume_169 VALUES';
            $resume_sql[170]='insert into phpyun_resume_170 VALUES';
            $resume_sql[171]='insert into phpyun_resume_171 VALUES';
            $resume_sql[172]='insert into phpyun_resume_172 VALUES';
            $resume_sql[173]='insert into phpyun_resume_173 VALUES';
            $resume_sql[174]='insert into phpyun_resume_174 VALUES';
            $resume_sql[175]='insert into phpyun_resume_175 VALUES';
            $resume_sql[176]='insert into phpyun_resume_176 VALUES';
            $resume_sql[177]='insert into phpyun_resume_177 VALUES';
            $resume_sql[178]='insert into phpyun_resume_178 VALUES';
            $resume_sql[179]='insert into phpyun_resume_179 VALUES';
            $resume_sql[180]='insert into phpyun_resume_180 VALUES';
            $resume_sql[181]='insert into phpyun_resume_181 VALUES';
            $resume_sql[182]='insert into phpyun_resume_182 VALUES';
            $resume_sql[183]='insert into phpyun_resume_183 VALUES';
            $resume_sql[184]='insert into phpyun_resume_184 VALUES';
            $resume_sql[185]='insert into phpyun_resume_185 VALUES';
            $resume_sql[186]='insert into phpyun_resume_186 VALUES';
            $resume_sql[187]='insert into phpyun_resume_187 VALUES';
            $resume_sql[188]='insert into phpyun_resume_188 VALUES';
            $resume_sql[189]='insert into phpyun_resume_189 VALUES';
            $resume_sql[190]='insert into phpyun_resume_190 VALUES';
            $resume_sql[191]='insert into phpyun_resume_191 VALUES';
            $resume_sql[192]='insert into phpyun_resume_192 VALUES';
            $resume_sql[193]='insert into phpyun_resume_193 VALUES';
            $resume_sql[194]='insert into phpyun_resume_194 VALUES';
            $resume_sql[195]='insert into phpyun_resume_195 VALUES';
            $resume_sql[196]='insert into phpyun_resume_196 VALUES';
            $resume_sql[197]='insert into phpyun_resume_197 VALUES';
            $resume_sql[198]='insert into phpyun_resume_198 VALUES';
            $resume_sql[199]='insert into phpyun_resume_199 VALUES';
            $resume_sql[200]='insert into phpyun_resume_200 VALUES';
            $resume_sql[201]='insert into phpyun_resume_201 VALUES';
            $resume_sql[202]='insert into phpyun_resume_202 VALUES';
            $resume_sql[203]='insert into phpyun_resume_203 VALUES';
            $resume_sql[204]='insert into phpyun_resume_204 VALUES';
            $resume_sql[205]='insert into phpyun_resume_205 VALUES';
            $resume_sql[206]='insert into phpyun_resume_206 VALUES';
            $resume_sql[207]='insert into phpyun_resume_207 VALUES';
            $resume_sql[208]='insert into phpyun_resume_208 VALUES';
            $resume_sql[209]='insert into phpyun_resume_209 VALUES';
            $resume_sql[210]='insert into phpyun_resume_210 VALUES';
            $resume_sql[211]='insert into phpyun_resume_211 VALUES';
            $resume_sql[212]='insert into phpyun_resume_212 VALUES';
            $resume_sql[213]='insert into phpyun_resume_213 VALUES';
            $resume_sql[214]='insert into phpyun_resume_214 VALUES';
            $resume_sql[215]='insert into phpyun_resume_215 VALUES';
            $resume_sql[216]='insert into phpyun_resume_216 VALUES';
            $resume_sql[217]='insert into phpyun_resume_217 VALUES';
            $resume_sql[218]='insert into phpyun_resume_218 VALUES';
            $resume_sql[219]='insert into phpyun_resume_219 VALUES';
            $resume_sql[220]='insert into phpyun_resume_220 VALUES';
            $resume_sql[221]='insert into phpyun_resume_221 VALUES';
            $resume_sql[222]='insert into phpyun_resume_222 VALUES';
            $resume_sql[223]='insert into phpyun_resume_223 VALUES';
            $resume_sql[224]='insert into phpyun_resume_224 VALUES';
            $resume_sql[225]='insert into phpyun_resume_225 VALUES';
            $resume_sql[226]='insert into phpyun_resume_226 VALUES';
            $resume_sql[227]='insert into phpyun_resume_227 VALUES';
            $resume_sql[228]='insert into phpyun_resume_228 VALUES';
            $resume_sql[229]='insert into phpyun_resume_229 VALUES';
            $resume_sql[230]='insert into phpyun_resume_230 VALUES';
            $resume_sql[231]='insert into phpyun_resume_231 VALUES';
            $resume_sql[232]='insert into phpyun_resume_232 VALUES';
            $resume_sql[233]='insert into phpyun_resume_233 VALUES';
            $resume_sql[234]='insert into phpyun_resume_234 VALUES';
            $resume_sql[235]='insert into phpyun_resume_235 VALUES';
            $resume_sql[236]='insert into phpyun_resume_236 VALUES';
            $resume_sql[237]='insert into phpyun_resume_237 VALUES';
            $resume_sql[238]='insert into phpyun_resume_238 VALUES';
            $resume_sql[239]='insert into phpyun_resume_239 VALUES';
            $resume_sql[240]='insert into phpyun_resume_240 VALUES';
            $resume_sql[241]='insert into phpyun_resume_241 VALUES';
            $resume_sql[242]='insert into phpyun_resume_242 VALUES';
            $resume_sql[243]='insert into phpyun_resume_243 VALUES';
            $resume_sql[244]='insert into phpyun_resume_244 VALUES';
            $resume_sql[245]='insert into phpyun_resume_245 VALUES';
            $resume_sql[246]='insert into phpyun_resume_246 VALUES';
            $resume_sql[247]='insert into phpyun_resume_247 VALUES';
            $resume_sql[248]='insert into phpyun_resume_248 VALUES';
            $resume_sql[249]='insert into phpyun_resume_249 VALUES';
            $resume_sql[250]='insert into phpyun_resume_250 VALUES';

            $indexs = $this->obj->DB_select_all("resume_index","1 limit 0,10000");
            $resume = $this->obj->DB_select_once("resume","id=".$li['id']);
//            echo 1;exit();
            $end = $this->obj->DB_select_num("resume_index");
            $end = $end+1;
//echo $end;exit();
//            for($i=1678;$i<78496;$i++){
            foreach ($indexs as $li){
//                $li = $this->obj->DB_select_once("resume_index","id=".$i);

                $data['uid'] = "'".$li['uid']."'";
                $data['birthdate'] = "'".$li['birthdate']."'";
                $data['hy'] = "'".$li['hy']."'";
                $data['location'] = "'".$li['location']."'";
                $data['jobs_id'] = "'".$li['jobs_id']."'";
                $data['jobs_id1'] = "'".$li['jobs_id1']."'";
                $data['jobs_id2'] = "'".$li['jobs_id2']."'";
                $data['edu'] = "'".$li['edu']."'";
                $data['exp'] = "'".$li['exp']."'";
                $data['sex'] = "'".$li['sex']."'";
                $data['minsalary'] = "'".$li['minsalary']."'";
                $data['maxsalary'] = "'".$li['maxsalary']."'";
                $data['salary_month'] = "'".$li['salary_month']."'";
                $data['city'] = "'".$li['city']."'";
                $data['city1'] = "'".$li['city1']."'";
                $data['city2'] = "'".$li['city2']."'";
                $data['addtime'] = "'".$li['addtime']."'";
                $data['lastupdate'] = "'".$li['lastupdate']."'";
                $data['status'] = "'".$li['status']."'";
                $sql .="(".implode(",",$data)."),";

//                $sql= $where.",";
//                $id = $this->obj->insert_into("resume_index",$data);



//                    $resume = $this->obj->DB_select_once("resume","id=".$li['id']);
                    $data1['id'] = $i+$end;
                    $data1['uid'] = "'".$resume['uid']."'";
                    $data1['index_id'] = $i+$end;
                    $data1['name'] = "'".$resume['name']."'";
                    $data1['nametype'] = "'".$resume['nametype']."'";
                    $data1['sex'] = "'".$resume['sex']."'";
                    $data1['birthday'] = "'".$resume['birthday']."'";
                    $data1['marriage'] = "'".$resume['marriage']."'";
                    $data1['height'] = "'".$resume['height']."'";
                    $data1['nationality'] = "'".$resume['nationality']."'";
                    $data1['weight'] = "'".$resume['weight']."'";
                    $data1['idcard'] = "'".$resume['idcard']."'";
                    $data1['telphone'] = "'".$resume['telphone']."'";
                    $data1['telhome'] = "'".$resume['telhome']."'";
                    $data1['email'] = "'".$resume['email']."'";
                    $data1['edu'] = "'".$resume['edu']."'";
                    $data1['homepage'] = "'".$resume['homepage']."'";
                    $data1['address'] = "'".$resume['address']."'";
                    $data1['description'] = "'".$resume['description']."'";
                    $data1['resume_photo'] = "'".$resume['resume_photo']."'";
                    $data1['photo'] = "'".$resume['photo']."'";
                    $data1['phototype'] = "'".$resume['phototype']."'";
                    $data1['expect'] = "'".$resume['expect']."'";
                    $data1['def_job'] = "'".$resume['def_job']."'";
                    $data1['exp'] = "'".$resume['exp']."'";
                    $data1['status'] = "'".$resume['status']."'";
                    $data1['lastupdate'] = "'".$resume['lastupdate']."'";
                    $data1['resumetime'] = "'".$resume['resumetime']."'";
                    $data1['idcard_pic'] = "'".$resume['idcard_pic']."'";
                    $data1['email_status'] = "'".$resume['email_status']."'";
                    $data1['moblie_status'] = "'".$resume['moblie_status']."'";
                    $data1['idcard_status'] = "'".$resume['idcard_status']."'";
                    $data1['statusbody'] = "'".$resume['statusbody']."'";
                    $data1['cert_time'] = "'".$resume['cert_time']."'";
                    $data1['r_status'] = "'".$resume['r_status']."'";
                    $data1['ant_num'] = "'".$resume['ant_num']."'";
                    $data1['email_dy'] = "'".$resume['email_dy']."'";
                    $data1['msg_dy'] = "'".$resume['msg_dy']."'";
                    $data1['living'] = "'".$resume['living']."'";
                    $data1['domicile'] = "'".$resume['domicile']."'";
                    $data1['basic_info'] = "'".$resume['basic_info']."'";
                    $data1['hy_dy'] = "'".$resume['hy_dy']."'";
                    $data1['info_status'] = "'".$resume['info_status']."'";
                    $data1['did'] = "'".$resume['did']."'";
                    $data1['qq'] = "'".$resume['qq']."'";
                    $data1['wxewm'] = "'".$resume['wxewm']."'";
                    $data1['tag'] = "'".$resume['tag']."'";
                    $data1['attach_info'] = "'".$resume['attach_info']."'";
                    $data1['project_content'] = "'".$resume['project_content']."'";
                    $data1['edu_content'] = "'".$resume['edu_content']."'";
                    $data1['file_path'] = "'".$resume['file_path']."'";
                    $data1['work_content'] = "'".$resume['work_content']."'";

                    $table_name = $this->get_hash_table("resume",$data1['id']);
                    $num = str_replace("resume_","",$table_name);
                    $resume_sql[$num] .="(".implode(",",$data1)."),";
//                    $this->obj->insert_into($this->get_hash_table("resume",$data1['id']),$data1);


                    $resume_expect = $this->obj->DB_select_once("resume_expect","id=".$li['id']);
                    $data2['id'] = $i+$end;
                    $data2['resume_id'] = $i+$end;
                    $data2['uid'] = "'".$resume_expect['uid']."'";
                    $data2['name'] = "'".$resume_expect['name']."'";
                    $data2['hy'] = "'".$resume_expect['hy']."'";
                    $data2['job_classid'] = "'".$resume_expect['job_classid']."'";
                    $data2['hy_name'] = "'".$resume_expect['hy_name']."'";
                    $data2['job_name'] = "'".$resume_expect['job_name']."'";
                    $data2['provinceid'] = "'".$resume_expect['provinceid']."'";
                    $data2['cityid'] = "'".$resume_expect['cityid']."'";
                    $data2['three_cityid'] = "'".$resume_expect['three_cityid']."'";
                    $data2['hope_city'] = "'".$resume_expect['hope_city']."'";
                    $data2['salary'] = "'".$resume_expect['salary']."'";
                    $data2['jobstatus'] = "'".$resume_expect['jobstatus']."'";
                    $data2['type'] = "'".$resume_expect['type']."'";
                    $data2['report'] = "'".$resume_expect['report']."'";
                    $data2['defaults'] = "'".$resume_expect['defaults']."'";
                    $data2['open'] = "'".$resume_expect['open']."'";
                    $data2['is_entrust'] = "'".$resume_expect['is_entrust']."'";
                    $data2['full'] = "'".$resume_expect['full']."'";
                    $data2['doc'] = "'".$resume_expect['doc']."'";
                    $data2['hits'] = "'".$resume_expect['hits']."'";
                    $data2['lastupdate'] = "'".$resume_expect['lastupdate']."'";
                    $data2['def_job'] = "'".$resume_expect['def_job']."'";
                    $data2['cloudtype'] = "'".$resume_expect['cloudtype']."'";
                    $data2['olduid'] = "'".$resume_expect['olduid']."'";
                    $data2['integrity'] = "'".$resume_expect['integrity']."'";
                    $data2['height_status'] = "'".$resume_expect['height_status']."'";
                    $data2['statusbody'] = "'".$resume_expect['statusbody']."'";
                    $data2['status_time'] = "'".$resume_expect['status_time']."'";
                    $data2['rec'] = "'".$resume_expect['rec']."'";
                    $data2['top'] = "'".$resume_expect['top']."'";
                    $data2['topdate'] = "'".$resume_expect['topdate']."'";
                    $data2['rec_resume'] = "'".$resume_expect['rec_resume']."'";
                    $data2['dom_sort'] = "'".$resume_expect['dom_sort']."'";
                    $data2['resume_diy'] = "'".$resume_expect['resume_diy']."'";
                    $data2['source'] = "'".$resume_expect['source']."'";
                    $data2['tmpid'] = "'".$resume_expect['tmpid']."'";
                    $data2['ctime'] = "'".$resume_expect['ctime']."'";
                    $data2['dnum'] = "'".$resume_expect['dnum']."'";
                    $data2['did'] = "'".$resume_expect['did']."'";
                    $data2['uname'] = "'".$resume_expect['uname']."'";
                    $data2['idcard_status'] = "'".$resume_expect['idcard_status']."'";
                    $data2['status'] = "'".$resume_expect['status']."'";
                    $data2['r_status'] = "'".$resume_expect['r_status']."'";
                    $data2['edu'] = "'".$resume_expect['edu']."'";
                    $data2['exp'] = "'".$resume_expect['exp']."'";
                    $data2['sex'] = "'".$resume_expect['sex']."'";
                    $data2['photo'] = "'".$resume_expect['photo']."'";
                    $data2['phototype'] = "'".$resume_expect['phototype']."'";
                    $data2['birthday'] = "'".$resume_expect['birthday']."'";
                    $data2['annex'] = "'".$resume_expect['annex']."'";
                    $data2['annexname'] = "'".$resume_expect['annexname']."'";
                    $data2['minsalary'] = "'".$resume_expect['minsalary']."'";
                    $data2['maxsalary'] = "'".$resume_expect['maxsalary']."'";
                    $data2['whour'] = "'".$resume_expect['whour']."'";
                    $data2['avghour'] = "'".$resume_expect['avghour']."'";
                    $data2['wage_hope'] = "'".$resume_expect['wage_hope']."'";
                    $data2['wage_current'] = "'".$resume_expect['wage_current']."'";
                    $data2['moneyMonthes'] = "'".$resume_expect['moneyMonthes']."'";

                    $table_name = $this->get_hash_table("resume_expect",$data2['id']);
                    $num = str_replace("resume_expect_","",$table_name);
                    $expect_sql[$num] .="(".implode(",",$data2)."),";
//                    $this->obj->insert_into($this->get_hash_table("resume_expect",$data2['id']),$data2);
            }
            echo $sql;exit();
//            $db->query("insert into phpyun_resume_index VALUES(0,35,837,27,127,0,0,15,0,2,4000,0,12,27,0,0,1517303565,0,0),(0,36,41,27,127,0,0,14,0,1,4000,0,12,0,0,0,1517303565,0,0)");exit();
           $db->query(substr($sql,0,strlen($sql)-1));
            foreach ($resume_sql as $li){
                if(strlen($li)>38){
                    $li = substr($li,0,strlen($li)-1);
                    $li = str_replace(",,",",'',",$li);
                    $li = str_replace(",,",",'',",$li);
                    $db->query($li);
                }
            }
            foreach ($expect_sql as $li){
                if(strlen($li)>42) {
                    $li = substr($li, 0, strlen($li) - 1);
                    $li = str_replace(",,", ",'',", $li);
                    $li = str_replace(",,", ",'',", $li);

                    $db->query($li);
                }
            }
//            $db->query('COMMIT');
//            echo date("H:i:s");
//           $indexs = $this->obj->DB_select_all("resume_index");
//           foreach ($indexs as $li){
//               $resume = $this->obj->DB_select_once("resume","id=".$li['id']);
//               $resume_expect = $this->obj->DB_select_once("resume_expect","id=".$li['id']);
//               var_dump($resume_expect);exit();


//           }
        }

        function index_action()
        {
            $this->set_search();
            $where = $swhere = $mwhere = "2";
            $uids = array();
            if ($_GET['status']) {
                if ($_GET['status'] == '4') {
                    $mwhere .= " and `status`='0'";
                } else if ($_GET['status']) {
                    $mwhere .= " and `status`='" . intval($_GET['status']) . "'";
                }
                $urlarr['status'] = intval($_GET['status']);
            }
            if ($_GET['rating']) {
                $swhere = "`rating`='" . $_GET['rating'] . "'";
                $urlarr['rating'] = $_GET['rating'];
            }
            if ($_GET['time']) {
                if ($_GET['time'] == '1') {
                    $num = "+7 day";
                } elseif ($_GET['time'] == '2') {
                    $num = "+1 month";
                } elseif ($_GET['time'] == '3') {
                    $num = "+6 month";
                } elseif ($_GET['time'] == '4') {
                    $num = "+1 year";
                }
                if ($swhere) {
                    $swhere .= " and `vip_etime`>'" . time() . "' and `vip_etime`<'" . strtotime($num) . "'";
                } else {
                    $swhere = " `vip_etime`>'" . time() . "' and `vip_etime`<'" . strtotime($num) . "'";
                }
                $urlarr['time'] = $_GET['time'];
            }
    //		if($swhere!='1'){
    //			$list=$this->obj->DB_select_all("lietou_statis",$swhere,"`uid`,`pay`,`rating`,`rating_name`,`vip_etime`");
    //			foreach($list as $val){
    //				$uids[]=$val['uid'];
    //			}
    //			$where.=" and `uid` in (".@implode(',',$uids).")";
    //		}
            if ($_GET['rec']) {
                if ($_GET['rec'] == '1') {
                    $where .= "  and `rec`=1 ";
                } else {
                    $where .= "  and `rec`=0 ";
                }
                $urlarr['rec'] = $_GET['rec'];
            }
            if ($_GET['gw']) {
                if ($_GET['gw'] == '1') {
                    $where .= "  and `conid`!=0 ";
                } else {
                    $where .= "  and `conid`=0 ";
                }
                $urlarr['gw'] = $_GET['gw'];
            }

            if ($_GET['hy']) {
                $where .= " and `hy` = '" . $_GET['hy'] . "' ";
                $urlarr['hy'] = $_GET['hy'];
            }
            if ($_GET['provinceid']) {
                $where .= " and `provinceid` = '" . $_GET['provinceid'] . "' ";
                $urlarr['provinceid'] = $_GET['provinceid'];
            }
            if ($_GET['cityid']) {
                $where .= " and `cityid` = '" . $_GET['cityid'] . "' ";
                $urlarr['cityid'] = $_GET['cityid'];
            }
            if ($_GET['pr']) {
                $where .= " and `pr` = '" . $_GET['pr'] . "' ";
                $urlarr['pr'] = $_GET['pr'];
            }
            if ($_GET['mun']) {
                $where .= " and `mun` = '" . $_GET['mun'] . "' ";
                $urlarr['mun'] = $_GET['mun'];
            }
            if (trim($_GET['keywords'])) {
                $where .= " and `name` like '%" . trim($_GET['keywords']) . "%' ";
                $urlarr['keywords'] = $_GET['keywords'];
            }
            if (trim($_GET['keyword'])) {
                if ($_GET['type'] == '1') {
                    $where .= "  AND `name` like '%" . trim($_GET['keyword']) . "%' ";
                } elseif ($_GET['type'] == '2') {
                    $mwhere .= " and `username` like '%" . trim($_GET['keyword']) . "%'";
                } elseif ($_GET['type'] == '3') {
                    $where .= "  AND `linkman` like '%" . trim($_GET['keyword']) . "%' ";
                } elseif ($_GET['type'] == '4') {
                    $where .= "  AND `linktel` like '%" . trim($_GET['keyword']) . "%' ";
                } elseif ($_GET['type'] == '5') {
                    $where .= "  AND `linkmail` like '%" . trim($_GET['keyword']) . "%' ";
                } elseif ($_GET['type'] == '6') {
                    $where .= " AND `uid` like '%" . trim($_GET['keyword']) . "%' ";
                }
                $urlarr['type'] = $_GET['type'];
                $urlarr['keyword'] = $_GET['keyword'];
            }

            if ($_GET['adtime']) {
                if ($_GET['adtime'] == '1') {
                    $mwhere .= " and `reg_date`>'" . strtotime(date("Y-m-d 00:00:00")) . "'";
                } else {
                    $mwhere .= " and `reg_date`>'" . strtotime('-' . intval($_GET['adtime']) . ' day') . "'";
                }
                $urlarr['adtime'] = $_GET['adtime'];
            }
            if ($_GET['lotime']) {
                if ($_GET['lotime'] == '1') {
                    $mwhere .= " and `login_date`>'" . strtotime(date("Y-m-d 00:00:00")) . "'";
                } else {
                    $mwhere .= " and `login_date`>'" . strtotime('-' . intval($_GET['lotime']) . ' day') . "'";
                }
                $urlarr['lotime'] = $_GET['lotime'];
            }
            if ($_GET['source']) {
                $mwhere .= " and `source` = '" . $_GET['source'] . "'";
                $urlarr['source'] = $_GET['source'];
            }

            if ($mwhere != '1') {
                $username = $this->obj->DB_select_all("member", $mwhere . " and `usertype`='3'", "`username`,`uid`,`reg_date`,`login_date`,`status`,`source`");
                $uids = array();
                foreach ($username as $val) {
                    $uids[] = $val['uid'];
                }
                $where .= " and `uid` in (" . @implode(',', $uids) . ")";
            }
            if ($_GET['order']) {
                if ($_GET['t'] == "time") {
                    $where .= " order by `lastupdate` " . $_GET['order'];
                } else {
                    $where .= " order by " . $_GET['t'] . " " . $_GET['order'];
                }
                $urlarr['order'] = $_GET['order'];
                $urlarr['t'] = $_GET['t'];
            } else {
                $where .= " order by uid desc";
            }
            $urlarr['page'] = "{{page}}";
            $pageurl = Url($_GET['m'], $urlarr, 'admin');

            $rows = $this->get_page("lietou", $where, $pageurl, $this->config['sy_listnum']);

            $this->department_cache();
            if (is_array($rows) && $rows) {
                if ($mwhere == '1' && empty($username)) {
                    foreach ($rows as $v) {
                        $uids[] = $v['uid'];
                    }
                    $username = $this->obj->DB_select_all("member", "`uid` in (" . @implode(",", $uids) . ")", "`username`,`uid`,`reg_date`,`login_date`,`reg_ip`,`status`,`source`,`login_ip`");
                }
                if ($swhere == '1' && empty($list)) {
                    $list = $this->obj->DB_select_all("lietou_statis", "`uid` in (" . @implode(",", $uids) . ")", "`uid`,`pay`,`integral`,`rating`,`rating_name`,`vip_etime`,`msg_num`");
                }


                $con = $this->obj->DB_select_all("lietou_consultant");
                foreach ($rows as $k => $v) {
                    if (strlen($v['name']) > 24) {
                        $rows[$k]['name'] = mb_substr($v['name'], "0", "12", "gbk") . "...";
                    }
                    if ($v['did'] < 1) {
                        $rows[$k]['did'] = 0;
                    }
                    $num = $this->obj->DB_select_num("userid_job", "uid=" . $v['uid'] . " and is_browse=6");
                    $rows[$k]['achievement'] = $num * 50;
                    foreach ($username as $val) {
                        if ($v['uid'] == $val['uid']) {
                            $rows[$k]['username'] = $val['username'];
                            $rows[$k]['reg_date'] = $val['reg_date'];
                            $rows[$k]['reg_ip'] = $val['reg_ip'];
                            $rows[$k]['login_date'] = $val['login_date'];
                            $rows[$k]['status'] = $val['status'];
                            $rows[$k]['source'] = $val['source'];
                            $rows[$k]['login_ip'] = $val['login_ip'];
                        }
                    }
                    foreach ($list as $val) {
                        if ($v['uid'] == $val['uid']) {
                            $rows[$k]['rating'] = $val['rating'];
                            $rows[$k]['pay'] = $val['pay'];
                            $rows[$k]['rating_name'] = $val['rating_name'];
                            $rows[$k]['vip_etime'] = $val['vip_etime'];
                            $rows[$k]['integral'] = $val['integral'];
                            $rows[$k]['vip_done'] = $this->config['com_vip_done'];
                        }
                    }
                    foreach ($con as $val) {
                        if ($v['conid'] == $val['id']) {
                            $rows[$k]['con'] = $val['username'];
                        }
                    }
                }
            }
            $guweninfo = $this->obj->DB_select_all("lietou_consultant", "`id`>'0'");
            $this->yunset("guweninfo", $guweninfo);
            $nav_user = $this->obj->DB_select_alls("admin_user", "admin_user_group", "a.`m_id`=b.`id` and a.`uid`='" . $_SESSION["auid"] . "'");
            $power = unserialize($nav_user[0]["group_power"]);
            if (in_array('141', $power)) {
                $this->yunset("email_promiss", '1');
                $this->yunset("moblie_promiss", '1');
            }

            $where = str_replace(array("(", ")"), array("[", "]"), $where);
            /****分站********/
            include PLUS_PATH . "/domain_cache.php";
            $Dname[0] = '总站';
            if (is_array($site_domain)) {
                foreach ($site_domain as $key => $value) {
                    $Dname[$value['id']] = $value['webname'];
                }
            }
            $this->yunset("Dname", $Dname);
            /***分站******/
            $this->yunset("where", $where);
            $this->yunset("rows", $rows);

            $this->yuntpl(array('admin/admin_lietou'));
        }

        function edit_action()
        {

            if ((int)$_GET['id']) {
                $com_info = $this->obj->DB_select_once("member", "`uid`='" . $_GET['id'] . "'");
                $row = $this->obj->DB_select_once("lietou", "`uid`='" . $_GET['id'] . "'");
                $statis = $this->obj->DB_select_once("lietou_statis", "`uid`='" . $_GET['id'] . "'");
                $rating_list = $this->obj->DB_select_all("lietou_rating", "`category`=1");
                if ($row['linkphone']) {
                    $linkphone = @explode('-', $row['linkphone']);
                    $row['phoneone'] = $linkphone[0];
                    $row['phonetwo'] = $linkphone[1];
                    $row['phonethree'] = $linkphone[2];
                }
                if ($row['comqcode'] && file_exists(str_replace('..', APP_PATH, '.' . $row['comqcode']))) {
                    $row['comqcode'] = str_replace('./', $this->config['sy_weburl'] . '/', $row['comqcode']);
                } else {
                    $row['comqcode'] = '';
                }
                $this->yunset("statis", $statis);
                $this->yunset("row", $row);
                $this->yunset("rating_list", $rating_list);
                $this->yunset("rating", $_GET['rating']);
                $this->yunset("lasturl", $_SERVER['HTTP_REFERER']);
                $this->yunset("com_info", $com_info);
                $this->yunset($this->MODEL('cache')->GetCache(array('city', 'hy', 'com')));

            }
            if ($_POST['com_update']) {

                $mem = $this->obj->DB_select_once("member", "`uid`='" . $_POST['uid'] . "'");
                if ($mem['username'] != $_POST['username'] && $_POST['username'] != "") {
                    $num = $this->obj->DB_select_num("member", "`username`='" . $_POST['username'] . "'");
                    if ($num > 0) {
                        $this->ACT_layer_msg("用户名已存在！", 8);
                    } else {
                        $this->obj->DB_update_all("member", "`username`='" . $_POST['username'] . "'", "`uid`='" . $_POST['uid'] . "'");
                    }
                }
                $email = $_POST['email'];
                $uid = $_POST['uid'];
                $user = $this->obj->DB_select_once("member", "`email`='$email' AND  `email`<>'' and `uid`<>'$uid'", 'uid');
                $moblienum = $this->obj->DB_select_once("member", "`moblie`='" . $_POST['moblie'] . "' AND  `moblie`<>'' and `uid`<>'" . $uid . "'", 'uid');
                $lietou = $this->obj->DB_select_once("lietou", "`uid`='" . $_POST['uid'] . "'", "name,comqcode");
                if (is_array($user)) {
                    $this->ACT_layer_msg("邮箱已存在！", 8);
                } elseif (is_array($moblienum)) {
                    $this->ACT_layer_msg("手机号已存在！", 8);
                } else {
                    $value = "`r_status`='" . $_POST['status'] . "',";
                    if ($_POST['status'] == '2') {
                        $smtp = $this->email_set();
                        if ($mem['status'] != '2') {
                            $data = $this->forsend($mem);
                            $this->send_msg_email(array("email" => $mem['email'], "lock_info" => $_POST['lock_info'], "uid" => $data['uid'], "name" => $data['name'], "type" => "lock"));
                        }
                    }
                    $this->obj->DB_update_all("member", "`lock_info`='" . $_POST['lock_info'] . "',`status`='" . $_POST['status'] . "'", "`uid`='" . $_POST['uid'] . "'");
                    unset($_POST['com_update']);
                    $ratingid = (int)$_POST['ratingid'];
                    unset($_POST['ratingid']);
                    $post['uid'] = $_POST['uid'];
                    $post['password'] = $_POST['password'];
                    $post['email'] = $_POST['email'];
                    $post['moblie'] = $_POST['moblie'];
                    $post['status'] = $_POST['status'];
                    $post['address'] = $_POST['address'];
                    if (trim($post['password'])) {
                        $nid = $this->uc_edit_pw($post, 1, "index.php?m=com_member");
                    }
                    $linkphone = array();
                    if ($_POST['phoneone']) {
                        $linkphone[] = $_POST['phoneone'];
                    }
                    if ($_POST['phonetwo']) {
                        $linkphone[] = $_POST['phonetwo'];
                    }
                    if ($_POST['phonethree']) {
                        $linkphone[] = $_POST['phonethree'];
                    }
                    $_POST['linkphone'] = pylode('-', $linkphone);
                    if ($_FILES['comqcode']['tmp_name']) {
                        $upload = $this->upload_pic("../data/upload/lietou/", false);
                        $comqcode = $upload->picture($_FILES['comqcode']);
                        $this->picmsg($comqcode, $_SERVER['HTTP_REFERER']);
                        $comqcode = str_replace("../data/", "./data/", $comqcode);
                        if ($lietou['comqcode']) {
                            unlink_pic("." . $lietou['comqcode']);
                        }
                    }
                    $value .= "`address`='" . $_POST['address'] . "',";
                    $value .= "`name`='" . $_POST['name'] . "',";
                    $value .= "`com_name`='" . $_POST['com_name'] . "',";
                    $value .= "`department`='" . $_POST['department'] . "',";
                    $value .= "`hy`='" . $_POST['hy'] . "',";
                    $value .= "`pr`='" . $_POST['pr'] . "',";
                    $value .= "`provinceid`='" . $_POST['provinceid'] . "',";
                    $value .= "`cityid`='" . $_POST['cityid'] . "',";
                    $value .= "`three_cityid`='" . $_POST['three_cityid'] . "',";
                    $value .= "`mun`='" . $_POST['mun'] . "',";
                    $value .= "`linkphone`='" . $_POST['linkphone'] . "',";
                    $value .= "`linktel`='" . $_POST['moblie'] . "',";
                    $value .= "`money`='" . $_POST['money'] . "',";
                    $value .= "`moneytype`='" . intval($_POST['moneytype']) . "',";
                    $value .= "`zip`='" . $_POST['zip'] . "',";
                    $value .= "`linkman`='" . $_POST['linkman'] . "',";
                    $value .= "`linkjob`='" . $_POST['linkjob'] . "',";
                    $value .= "`linkqq`='" . $_POST['linkqq'] . "',";
                    $value .= "`website`='" . $_POST['website'] . "',";
                    $content = str_replace(array("&amp;", "background-color:#ffffff", "background-color:#fff", "white-space:nowrap;"), array("&", '', '', ''), html_entity_decode($_POST['content'], ENT_QUOTES, "GB2312"));
                    $value .= "`content`='" . $content . "',";
                    $value .= "`busstops`='" . $_POST['busstops'] . "',";
                    $value .= "`admin_remark`='" . $_POST['admin_remark'] . "',";
                    $value .= "`linkmail`='" . $_POST['email'] . "',";
                    $value .= "`infostatus`='" . intval($_POST['infostatus']) . "',";
                    $value .= "`comqcode`='" . $comqcode . "'";

                    $this->obj->DB_update_all("lietou", $value, "`uid`='" . $_POST['uid'] . "'");
                    $this->obj->DB_update_all("member", "`email`='" . $_POST['email'] . "',`moblie`='" . $_POST['moblie'] . "'", "`uid`='" . $_POST['uid'] . "'");
                    $rat_arr = @explode("+", $rating_name);
                    $statis = $this->obj->DB_select_once("lietou_statis", "`uid`='" . $_POST['uid'] . "'");
                    if ($ratingid != $statis['rating']) {
                        $newrating = $this->obj->DB_select_once("lietou_rating", "`id`='" . $ratingid . "'", "`name`");
                        $ratingM = $this->MODEL('rating');
                        $rat_value = $ratingM->rating_info($ratingid);

                        $this->obj->DB_update_all("lietou_statis", $rat_value, "`uid`='" . $_POST['uid'] . "'");
                        $this->admin_log("猎头会员(ID" . $_POST['uid'] . ")更新为【" . $newrating['name'] . "】");
                    } else {
                        if ($_POST['vip_etime']) {
                            $value3 .= "`vip_etime`='" . strtotime($_POST['vip_etime']) . "',";
                        } else {
                            $value3 .= "`vip_etime`='0',";
                        }
                        $value3 .= "`job_num`='" . $_POST['job_num'] . "',";
                        $value3 .= "`down_resume`='" . $_POST['down_resume'] . "',";
                        $value3 .= "`editjob_num`='" . $_POST['editjob_num'] . "',";
                        $value3 .= "`invite_resume`='" . $_POST['invite_resume'] . "',";
                        $value3 .= "`breakjob_num`='" . $_POST['breakjob_num'] . "',";
                        $value3 .= "`part_num`='" . $_POST['part_num'] . "',";
                        $value3 .= "`editpart_num`='" . $_POST['editpart_num'] . "',";
                        $value3 .= "`breakpart_num`='" . $_POST['breakpart_num'] . "'";
                        $this->obj->DB_update_all("lietou_statis", $value3, "`uid`='" . $_POST['uid'] . "'");
                    }
                    $value2 .= "`com_name`='" . $_POST['name'] . "',";
                    $value2 .= "`pr`='" . $_POST['pr'] . "',";
                    $value2 .= "`mun`='" . $_POST['mun'] . "',";
                    $value2 .= "`com_provinceid`='" . $_POST['provinceid'] . "',";
                    $value2 .= "`rating`='" . $rat_arr[0] . "',";
                    if ($_POST['status'] == '1') {
                        $rstatus = '1';
                    } else {
                        $rstatus = '2';
                    }
                    $value2 .= "`r_status`='" . $rstatus . "'";
                    $this->obj->DB_update_all("lietou_job", $value2, "`uid`='" . $_POST['uid'] . "'");
                    $this->obj->DB_update_all("partjob", "`r_status`='" . $rstatus . "'", "`uid`='" . $_POST['uid'] . "'");

                    if ($_POST['name'] != $lietou['name']) {
                        $this->obj->update_once("partjob", array("com_name" => $_POST['name']), array("uid" => $_POST['uid']));
                        $this->obj->update_once("userid_job", array("com_name" => $_POST['name']), array("com_id" => $_POST['uid']));
                        $this->obj->update_once("fav_job", array("com_name" => $_POST['name']), array("com_id" => $_POST['uid']));
                        $this->obj->update_once("report", array("r_name" => $_POST['name']), array("c_uid" => $_POST['uid']));
                        $this->obj->update_once("blacklist", array("com_name" => $_POST['name']), array("c_uid" => $_POST['uid']));
                        $this->obj->update_once("msg", array("com_name" => $_POST['name']), array("job_uid" => $_POST['uid']));
                        $this->obj->update_once("hotjob", array("username" => $_POST['name']), array("uid" => $_POST['uid']));
                    }
                    delfiledir("../data/upload/tel/" . $_POST['uid']);
                    $lasturl = str_replace("&amp;", "&", $_POST['lasturl']);
                    $this->ACT_layer_msg("猎头会员(ID:" . $_POST['uid'] . ")修改成功！", 9, $lasturl, 2, 1);
                }
            }
            $this->yuntpl(array('admin/admin_member_lieedit'));
        }


        function edit_liecom_action()
        {

            if ((int)$_GET['id']) {
                $rows = $this->obj->DB_select_once("fake_company", "id=" . $_GET['id']);
                $lietou = $this->obj->DB_select_once("lietou", "uid=" . $rows['uid'], "uid,name");
                $rows['lie_name'] = $lietou['name'];

                $this->yunset("rows", $rows);
            }

            if ($_POST['submit'] && $_POST['id']) {
                $id = $_POST['id'];
                unset($_POST['submit']);
                unset($_POST['type']);
                $r = $this->obj->update_once("fake_company", $_POST, "id=" . $id);
                if ($r) {
                    $this->ACT_layer_msg("修改成功！", 9, "/admin-huilie/index.php?m=admin_lietou_company", 2, 1);
                }
            }
            $this->yuntpl(array('admin/admin_member_liecomedit'));
        }

        function rating_action()
        {
            $ratingid = (int)$_POST['ratingid'];
            $statis = $this->obj->DB_select_once("lietou_statis", "`uid`='" . $_POST['uid'] . "'");
            if ($ratingid != $statis['rating']) {
                $ratingM = $this->MODEL('rating');
                if (is_array($statis) && !empty($statis)) {
                    $value = $ratingM->rating_info($ratingid);
                    $this->obj->DB_update_all("lietou_statis", $value, "`uid`='" . $_POST['uid'] . "'");
                    $newrating = $this->obj->DB_select_once("lietou_rating", "`id`='" . $ratingid . "'", "`name`");
                    $this->admin_log("猎头会员(ID" . $_POST['uid'] . ")更新为【" . $newrating['name'] . "】");
                } else {
                    $value = "`uid`='" . $_POST['uid'] . "',";
                    $value .= $ratingM->rating_info($ratingid);
                    $this->obj->DB_insert_once("lietou_statis", $value);
                    $this->admin_log("猎头会员(ID" . $_POST['uid'] . ")添加会员等级");
                }
                echo "1";
                die;
            } else {
                echo 0;
                die;
            }
        }

        function add_action()
        {
            $this->department_cache();
            $rating_list = $this->obj->DB_select_all("lietou_rating", "`category`=1");
            if ($_POST['submit']) {
                extract($_POST);

                if ($username == "" || strlen($username) < 2 || strlen($username) > 15) {
                    $data['msg'] = "会员名不能为空或不符合要求！";
                    $data['type'] = '8';
                } elseif ($password == "" || strlen($username) < 2 || strlen($username) > 15) {
                    $data['msg'] = "密码不能为空或不符合要求！";
                    $data['type'] = '8';
                } else {
                    if ($this->config['sy_uc_type'] == "uc_center") {
                        $this->uc_open();
                        $user = uc_get_user($username);
                    } else {
                        if ($username != "") {
                            $user = $this->obj->DB_select_once("member", "`username`='$username'");
                        }
                        if ($email != "") {
                            $comemail = $this->obj->DB_select_once("member", "`email`='$email'");
                        }
                        if ($moblie != "") {
                            $commoblie = $this->obj->DB_select_once("lietou", "`linktel`='$moblie'");
                        }
                        if ($name != "") {
                            $comname = $this->obj->DB_select_once("lietou", "`name`='$name'");
                        }
                    }
                    if (is_array($user)) {
                        $data['msg'] = "用户名已存在！";
                        $data['type'] = '8';
                    } elseif (is_array($comemail)) {
                        $data['msg'] = "邮箱已存在！";
                        $data['type'] = '8';
                    } elseif (is_array($commoblie)) {
                        $data['msg'] = "联系手机已存在！";
                        $data['type'] = '8';
                    } elseif (is_array($comname)) {
                        $data['msg'] = "公司全称已存在！";
                        $data['type'] = '8';
                    } else {
                        $ip = fun_ip_get();
                        $time = time();
                        if ($this->config['sy_uc_type'] == "uc_center") {
                            $uid = uc_user_register($_POST['username'], $_POST['password'], $_POST['email']);
                            if ($uid < 0) {
                                $this->obj->get_admin_msg("index.php?m=com_member&c=add", "该邮箱已存在！");
                            } else {
                                list($uid, $username, $email, $password, $salt) = uc_get_user($username);
                                $value = "`username`='$username',`password`='$password',`email`='$email',`usertype`='2',`address`='$address',`status`='$status',`salt`='$salt',`moblie`='$moblie',`reg_date`='$time',`reg_ip`='$ip'";
                            }
                        } else {
                            $salt = substr(uniqid(rand()), -6);
                            $pass = md5(md5($password) . $salt);
                            $value = "`username`='$username',`password`='$pass',`email`='$email',`usertype`='3',`address`='$address',`status`='$status',`salt`='$salt',`moblie`='$moblie',`reg_date`='$time',`reg_ip`='$ip'";
                        }
                        $nid = $this->obj->DB_insert_once("member", $value);
                        $uid = $nid;
                        $depart = $_POST['departid'];
                        $department = $_POST['departmentid'];
                        if ($uid > 0) {
                            $this->obj->DB_insert_once("lietou", "`uid`='$uid',`name`='$name',`linkphone`='$areacode-$telphone-$exten',`linktel`='$moblie',`linkmail`='$email',`address`='$address',`depart`='$depart',`department`='$department'");
                            $rat_arr = @explode("+", $rating_name);
                            $value = "`uid`='$uid',";

                            $ratingM = $this->MODEL('rating');
                            $value .= $ratingM->rating_info($rat_arr[0]);

                            $this->obj->DB_insert_once("lietou_statis", $value);
                            $data['msg'] = "会员(ID:" . $uid . ")添加成功";
                            $data['type'] = '9';
                        }
                    }
                }
                if ($_POST['type']) {
                    echo "<script type='text/javascript'>window.location.href='index.php?m=admin_lietou_job&c=show&uid=" . $nid . "'</script>";
                    die;
                } else {
                    if ($data['type'] == '9') {
                        $this->ACT_layer_msg($data['msg'], $data['type'], "index.php?m=admin_lietou", 2, 1);
                    } else {
                        $this->ACT_layer_msg($data['msg'], $data['type']);
                    }
                }

            }
            $this->yunset("get_info", $_GET);
            $this->yunset("rating_list", $rating_list);
            $this->yuntpl(array('admin/admin_member_lieadd'));
        }

        function getstatis_action()
        {
            if ($_POST['uid']) {
                $rating = $this->obj->DB_select_once("lietou_statis", "`uid`='" . intval($_POST['uid']) . "'");
                if ($rating['vip_etime'] > 0) {
                    $rating['vipetime'] = date("Y-m-d", $rating['vip_etime']);
                } else {
                    $rating['vipetime'] = '不限';
                }
                echo json_encode(yun_iconv('gbk', 'utf-8', $rating));
            }
        }

        function getrating_action()
        {
            if ($_POST['id']) {
                $rating = $this->obj->DB_select_once("lietou_rating", "`id`='" . intval($_POST['id']) . "' and `category`='1'");
                if ($rating['service_time'] > 0) {
                    $rating['oldetime'] = time() + $rating['service_time'] * 86400;
                    $rating['vipetime'] = date("Y-m-d", (time() + $rating['service_time'] * 86400));
                } else {
                    $rating['oldetime'] = 0;
                    $rating['vipetime'] = '不限';
                }
                echo json_encode(yun_iconv('gbk', 'utf-8', $rating));
            }
        }

        function uprating_action()
        {

            if ($_POST['ratuid']) {

                $uid = intval($_POST['ratuid']);
                $statis = $this->obj->DB_select_once("lietou_statis", "`uid`='" . $uid . "'");

                unset($_POST['ratuid']);
                unset($_POST['pytoken']);
                if ((int)$_POST['addday'] > 0) {
                    if ((int)$_POST['oldetime'] > 0) {
                        $_POST['vip_etime'] = intval($_POST['oldetime']) + intval($_POST['addday']) * 86400;
                    } else {
                        $_POST['vip_etime'] = time() + intval($_POST['addday']) * 86400;
                    }
                } else {
                    $_POST['vip_etime'] = intval($_POST['oldetime']);
                }
                unset($_POST['addday']);
                unset($_POST['oldetime']);

                foreach ($_POST as $key => $value) {

                    $statisValue[] = "`$key`='$value'";
                }
                $statisSqlValue = @implode(',', $statisValue);
                $ratinginfo = $this->obj->DB_select_once("lietou_rating", "`id`='" . $_POST['rating'] . "'", "`type`");
                $statisSqlValue .= ",`rating_type`='" . $ratinginfo['type'] . "'";
                if ($statis['rating'] != $_POST['rating']) {
                    $statisSqlValue .= ",`vip_stime`='" . time() . "'";
                    $this->obj->DB_update_all("lietou_job", "`rating`='" . $_POST['rating'] . "'", "`uid`='" . $uid . "'");
                }
                if (!empty($statis)) {
                    $id = $this->obj->DB_update_all("lietou_statis", $statisSqlValue, "`uid`='" . $uid . "'");
                } else {
                    $this->obj->DB_insert_once("lietou_statis", $statisSqlValue . ",`uid`='" . $uid . "'");
                    $id = true;
                }
                $id ? $this->ACT_layer_msg("猎头会员等级(ID:" . $uid . ")修改成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1) : $this->ACT_layer_msg("修改失败！", 8, $_SERVER['HTTP_REFERER']);
            } else {
                $this->ACT_layer_msg("非法操作！", 8, $_SERVER['HTTP_REFERER']);
            }

        }

        function recommend_action()
        {
            $nid = $this->obj->DB_update_all("lietou", "`" . $_GET['type'] . "`='" . $_GET['rec'] . "'", "`uid`='" . $_GET['id'] . "'");
            $this->admin_log("知名猎头(ID:" . $_GET['id'] . ")设置成功");
            echo $nid ? 1 : 0;
            die;
        }

        function del_action(){
        $this->check_token();
        if($_GET['del']){
            $del=$_GET['del'];
            if($del){
                $del_array=array("member","lietou","lietou_job","lietou_cert","lietou_news","lietou_order","lietou_product","lietou_show","banner","lietou_statis","question","attention","hotjob","special_com","zhaopinhui_com","partjob","answer","answer_review","evaluate_log","subscribe","subscriberecord","friend_state");

                if(is_array($del)){
                    $layer_type=1;
                    $uids = @implode(",",$del);
                    foreach($del as $k=>$v){
                        delfiledir("../data/upload/tel/".intval($v));
                    }
                    $lietou=$this->obj->DB_select_all("lietou","`uid` in (".$uids.") and `logo`!=''","logo,firmpic");
                    if(is_array($lietou)){
                        foreach($lietou as $v){
                            unlink_pic(".".$v['logo']);
                            unlink_pic(".".$v['firmpic']);
                        }
                    }
                    $cert=$this->obj->DB_select_all("lietou_cert","`uid` in (".$uids.") and `type`='3'","check");
                    if(is_array($cert)){
                        foreach($cert as $v){
                            unlink_pic("../".$v['check']);
                        }
                    }
                    $product=$this->obj->DB_select_all("lietou_product","`uid` in (".$uids.")","pic");
                    if(is_array($product)){
                        foreach($product as $val){
                            unlink_pic("../".$val['pic']);
                        }
                    }
                    $show=$this->obj->DB_select_all("lietou_show","`uid` in (".$uids.")","picurl");
                    if(is_array($show)){
                        foreach($show as $val){
                            unlink_pic("../".$val['picurl']);
                        }
                    }
                    $uhotjob=$this->obj->DB_select_all("hotjob","`uid` in (".$uids.")","hot_pic");
                    if(is_array($uhotjob)){
                        foreach($uhotjob as $val){
                            unlink_pic("../".$val['hot_pic']);
                        }
                    }
                    $banner=$this->obj->DB_select_all("banner","`uid` in (".$uids.")","pic");
                    if(is_array($banner)){
                        foreach($banner as $val)
                        {
                            unlink_pic($val['pic']);
                        }
                    }


                    foreach($del_array as $value){
                        $this->obj->DB_delete_all($value,"`uid` in (".$uids.")","");
                    }
                    $this->obj->DB_delete_all("email_msg","`uid` in (".$uids.") or `cuid` in (".$uids.")"," ");
                    $this->obj->DB_delete_all("lietou_msg","`cuid` in (".$uids.")"," ");
                    $this->obj->DB_delete_all("talent_pool","`cuid` in (".$uids.")"," ");
                    $this->obj->DB_delete_all("user_entrust_record","`comid` in (".$uids.")"," ");
                    $this->obj->DB_delete_all("ad_order","`comid` in (".$uids.")"," ");
                    $this->obj->DB_delete_all("lietou_pay","`com_id` in (".$uids.")"," ");
                    $this->obj->DB_delete_all("atn","`uid` in (".$uids.") or `sc_uid` in (".$uids.")","");
                    $this->obj->DB_delete_all("look_resume","`com_id` in (".$uids.")","");
                    $this->obj->DB_delete_all("fav_job","`com_id` in (".$uids.")","");
                    $this->obj->DB_delete_all("userid_msg","`fid` in (".$uids.")","");
                    $this->obj->DB_delete_all("userid_job","`com_id` in (".$uids.")","");
                    $this->obj->DB_delete_all("look_job","`com_id` in (".$uids.")","");
                    $this->obj->DB_delete_all("message","`fa_uid` in (".$uids.")","");
                    $this->obj->DB_delete_all("msg","`job_uid` in (".$uids.")","");
                    $this->obj->DB_delete_all("blacklist","`c_uid` in (".$uids.")","");
                    $this->obj->DB_delete_all("rebates","`job_uid` in (".$uids.") or `uid` in (".$uids.")"," ");
                    $this->obj->DB_delete_all("report","`p_uid` in ($uids) or `c_uid` in ($uids)","");
                    $this->obj->DB_delete_all("part_apply","`comid` in (".$uids.")","");
                    $this->obj->DB_delete_all("part_collect","`comid` in (".$uids.")","");
                    $this->obj->DB_delete_all("member_log","`uid` in (".$uids.")","");
                    $this->obj->DB_delete_all("down_resume","`comid` in (".$uids.")","");
                }else{
                    $layer_type=0;
                    $uids=$del = intval($del);

                    delfiledir("../data/upload/tel/".$del);
                    $lietou=$this->obj->DB_select_once("lietou","`uid`='".$del."' and `logo`!=''","logo,firmpic");
                    unlink_pic(".".$lietou['logo']);
                    unlink_pic(".".$lietou['firmpic']);
                    $cert=$this->obj->DB_select_once("lietou_cert","`uid`='".$del."' and `type`='3'","check");
                    unlink_pic("../".$cert['check']);
                    $product=$this->obj->DB_select_all("lietou_product","`uid`='".$del."'","pic");
                    if(is_array($product)){
                        foreach($product as $v){
                            unlink_pic("../".$v['pic']);
                        }
                    }
                    $show=$this->obj->DB_select_all("lietou_show","`uid`='".$del."'","picurl");
                    if(is_array($show)){
                        foreach($show as $v){
                            unlink_pic("../".$v['picurl']);
                        }
                    }
                    $uhotjob=$this->obj->DB_select_all("hotjob","`uid`='".$del."'","hot_pic");
                    if(is_array($uhotjob)){
                        foreach($uhotjob as $val){
                            unlink_pic("../".$val['hot_pic']);
                        }
                    }
                    $banner=$this->obj->DB_select_once("banner","`uid`='".$del."'","pic");
                    unlink_pic($banner['pic']);
                    foreach($del_array as $value){
                        $this->obj->DB_delete_all($value,"`uid`='".$del."'","");
                    }
                    $this->obj->DB_delete_all("email_msg","`uid`='".$del."' or `cuid`='".$del."'"," ");
                    $this->obj->DB_delete_all("lietou_msg","`cuid`='".$del."'"," ");
                    $this->obj->DB_delete_all("talent_pool","`cuid`='".$del."'"," ");
                    $this->obj->DB_delete_all("user_entrust_record","`comid`='".$del."'"," ");
                    $this->obj->DB_delete_all("ad_order","`comid`='".$del."'"," ");
                    $this->obj->DB_delete_all("lietou_pay","`com_id`='".$del."'"," ");
                    $this->obj->DB_delete_all("atn","`uid`='".$del."' or `sc_uid`='".$del."'","");
                    $this->obj->DB_delete_all("look_resume","`com_id`='".$del."'","");
                    $this->obj->DB_delete_all("look_job","`com_id`='".$del."'","");
                    $this->obj->DB_delete_all("fav_job","`com_id`='".$del."'","");
                    $this->obj->DB_delete_all("userid_msg","`fid`='".$del."'","");
                    $this->obj->DB_delete_all("userid_job","`com_id`='".$del."'","");
                    $this->obj->DB_delete_all("message","`fa_uid`='".$del."'","");
                    $this->obj->DB_delete_all("msg","`job_uid`='".$del."'","");
                    $this->obj->DB_delete_all("blacklist","`c_uid`='".$del."'","");
                    $this->obj->DB_delete_all("rebates","`job_uid`='".$del."' or `uid` ='".$del."'"," ");
                    $this->obj->DB_delete_all("report","`p_uid`='".$del."' or `c_uid`='".$del."'","");
                    $this->obj->DB_delete_all("part_apply","`comid` ='".$del."'","");
                    $this->obj->DB_delete_all("part_collect","`comid` ='".$del."'","");
                    $this->obj->DB_delete_all("member_log","`uid` ='".$del."'","");
                    $this->obj->DB_delete_all("down_resume","`comid` ='".$del."'","");
                }
                $this->layer_msg( "猎头(ID:".$uids.")删除成功！",9,$layer_type,$_SERVER['HTTP_REFERER']);
            }else{
                $this->layer_msg( "请选择您要删除的公司！",8,1);
            }
        }
    }

        function del_liecom_action()
        {
            $this->check_token();
            if ($_GET['del']) {
                $del = $_GET['del'];
                $r = $this->obj->DB_delete_all("fake_company","id=".$del);
                if($r){
                    $this->layer_msg("公司(ID:" . $del . ")删除成功！", 9, 2, $_SERVER['HTTP_REFERER']);

                }

            }
        }

        function lockinfo_action()
        {
            $userinfo = $this->obj->DB_select_once("member", "`uid`=" . $_POST['uid'], "`lock_info`");
            echo $userinfo['lock_info'];
            die;
        }

        function lock_action()
        {
            $_POST['uid'] = intval($_POST['uid']);
            if (($_POST['status'] == 2 || $_POST['status'] == 3) && $_POST['lock_info'] == '') {
                $this->ACT_layer_msg("请填写锁定说明！", 8);
            }
            if ($_POST['status'] == 3 && $_POST['statusip']) {
                $ip = $this->config['sy_bannedip'] ? $this->config['sy_bannedip'] . "|" . $_POST['statusip'] : $_POST['statusip'];
                $this->obj->DB_update_all("admin_config", "`config`='" . $ip . "'", "`name`='sy_bannedip'");
                $this->web_config();
                $_POST['status'] == 2;
            }

            $email = $this->obj->DB_select_once("lietou", "`uid`='" . $_POST['uid'] . "'", "`linkmail`,`name`");
            $this->obj->DB_update_all("partjob", "`r_status`='" . $_POST['status'] . "'", "`uid`='" . $_POST['uid'] . "'");
            $this->obj->DB_update_all("lietou_job", "`r_status`='" . $_POST['status'] . "'", "`uid`='" . $_POST['uid'] . "'");
            $this->obj->DB_update_all("lietou", "`r_status`='" . $_POST['status'] . "'", "`uid`='" . $_POST['uid'] . "'");
            $id = $this->obj->DB_update_all("member", "`status`='" . $_POST['status'] . "',`lock_info`='" . $_POST['lock_info'] . "'", "`uid`='" . $_POST['uid'] . "'");
            if ($_POST['status'] == '2') {
                $this->send_msg_email(array("email" => $email['linkmail'], "uid" => $_POST['uid'], "name" => $email['name'], "lock_info" => $_POST['lock_info'], "type" => "lock"));
            }

            $id ? $this->ACT_layer_msg("猎头会员(ID:" . $_POST['uid'] . ")锁定设置成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1) : $this->ACT_layer_msg("设置失败！", 8, $_SERVER['HTTP_REFERER']);
        }

        function addgw_action()
        {
            $value = "`conid`='" . $_POST['conid'] . "',";
            $value .= "`addtime`='" . time() . "'";
            $where = "`uid` in (" . $_POST['uid'] . ")";
            $nid = $this->obj->DB_update_all("lietou", $value, $where);
            $member = $this->obj->DB_select_all("member", "`uid` in (" . $_POST['uid'] . ")");
            if (is_array($member) && !empty($member)) {
                if ($nid) {
                    $this->ACT_layer_msg("顾问分配成功！", 9, $_SERVER['HTTP_REFERER']);
                } else {
                    $this->ACT_layer_msg("顾问分配失败！", 8, $_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->ACT_layer_msg("非法操作！", 8, $_SERVER['HTTP_REFERER']);
            }
        }

        function status_action()
        {
            extract($_POST);
            $member = $this->obj->DB_select_all("member", "`uid` in (" . $uid . ")", "`email`,`moblie`,`uid`");
            if (is_array($member) && $member) {
                $lietou = $this->obj->DB_select_all("lietou", "`uid` in (" . $uid . ")", "`name`,`uid`");
                $info = array();

                foreach ($lietou as $val) {
                    $info[$val['uid']] = $val['name'];
                }
                $smtp = $this->email_set();
                foreach ($member as $v) {
                    $idlist[] = $v['uid'];
                    if ($status > 0) {
                        if ($status == 1) {
                            $_POST['states'] = '审核通过！';
                        } else {
                            $_POST['states'] = '审核未通过！';
                        }
                    }
                    $this->send_msg_email(array("uid" => $v['uid'], "name" => $info[$v['uid']], "email" => $v['email'], "moblie" => $v['moblie'], "auto_statis" => $_POST['states'], "status_info" => $statusbody, "date" => date("Y-m-d H:i:s"), "type" => "userstatus"), $smtp);
                }
                if (trim($statusbody)) {
                    $lock_info = $statusbody;
                }

                $aid = @implode(",", $idlist);
                $id = $this->obj->DB_update_all("member", "`status`='" . $status . "',`lock_info`='" . $lock_info . "'", "`uid` IN (" . $aid . ")");
                if ($id) {
                    if ($status == "1") {
                        $rstatus = '1';
                    } else {
                        $rstatus = '2';
                    }
                    $this->obj->DB_update_all("partjob", "`r_status`='" . $rstatus . "'", "`uid` IN (" . $aid . ")");
                    $this->obj->DB_update_all("lietou", "`r_status`='" . $rstatus . "'", "`uid` IN (" . $aid . ")");
                    $this->obj->DB_update_all("lietou_job", "`r_status`='" . $rstatus . "'", "`uid` IN (" . $aid . ")");
                    $this->ACT_layer_msg("猎头会员审核(ID:" . $aid . ")设置成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
                } else {
                    $this->ACT_layer_msg("审核设置失败！", 8, $_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->ACT_layer_msg("非法操作！", 8, $_SERVER['HTTP_REFERER']);
            }
        }

        function hotjobinfo_action()
        {
            if ($_GET['id']) {
                $hotjob = $this->obj->DB_select_once("hotjob", "`uid`='" . (int)$_GET['id'] . "'");
            } else if ($_GET['uid']) {
                $row = $this->obj->DB_select_alls("lietou", "lietou_statis", "a.`uid`='" . (int)$_GET['uid'] . "' and b.`uid`='" . (int)$_GET['uid'] . "'", "a.`content`,a.`name` as username,b.`rating` as rating_id,b.`rating_name` as rating,a.`uid`,a.`logo` as hot_pic");
                $row = $row[0];
                $row['content'] = @explode(' ', trim(strip_tags($row['content'])));
                if (is_array($row['content']) && $row['content']) {
                    foreach ($row['content'] as $val) {
                        $row['beizhu'] .= trim($val);
                    }
                } else {
                    $row['beizhu'] = $row['content'];
                }
                $hotjob = $row;
                $hotjob['time_start'] = time();
            }
            $this->yunset("hotjob", $hotjob);
            $this->yuntpl(array('admin/admin_hotjob_info'));
        }

        function save_action()
        {
            extract($_POST);
            if (is_uploaded_file($_FILES['hot_pic']['tmp_name'])) {
                $upload = $this->upload_pic("../data/upload/hotpic/");
                $pictures = $upload->picture($_FILES['hot_pic']);
                $pic = str_replace("../data/upload", "./data/upload", $pictures);
            } else {
                if ($_POST['hotad']) {
                    $defpic = "." . $defpic;
                    $url = @explode("/", $defpic);
                    $url2 = str_replace($url[4], date("Ymd"), $defpic);
                    $name = @explode(".", $url[5]);
                    $url2 = str_replace($name[0], time(), $url2);
                    if (!file_exists('../data/upload/lietou/' . date("Ymd"))) {
                        mkdir('../data/upload/lietou/' . date("Ymd"));
                    }
                    copy($defpic, $url2);
                    $pic = str_replace("../data/upload", "./data/upload", $url2);
                }
            }
            $com = $this->obj->DB_select_once("lietou", "`uid`='" . $uid . "'", "`did`");
            if ($_POST['hotad']) {
                $start = strtotime($time_start);
                $end = strtotime($time_end);
                $nid = $this->obj->DB_insert_once("hotjob", "`uid`='$uid',`username`='$username',`sort`='$sort',`rating_id`='$rating_id',`rating`='$rating',`hot_pic`='$pic',`service_price`='$service_price',`beizhu`='$beizhu',`time_start`='$start',`time_end`='$end',`did`='" . $com['did'] . "'");
                $this->obj->DB_update_all("lietou", "`hottime`='" . $end . "',`logo`='" . $pic . "',`rec`='1'", "`uid`='" . $uid . "'");
                $this->ACT_layer_msg("名企招聘(ID:" . $nid . ")设定成功！", 9, "index.php?m=admin_lietou", 2, 1);
            } elseif ($_POST['hotup']) {
                $start = strtotime($time_start);
                $end = strtotime($time_end);
                $value = "`service_price`='$service_price',`time_start`='$start',`time_end`='$end',`beizhu`='$beizhu',`sort`='$sort',`did`='" . $com['did'] . "'";
                if ($pic != "") {
                    $hot = $this->obj->DB_select_once("hotjob", "`id`='$id'");
                    unlink_pic("../" . $hot['hot_pic']);
                    $value .= ",`hot_pic`='$pic'";
                }
                $this->obj->DB_update_all("hotjob", $value, "`id`='$id'");
                $this->obj->DB_update_all("lietou", "`hottime`='" . $end . "',`logo`='" . $pic . "'", "`uid`='" . $uid . "'");
                $this->ACT_layer_msg("名企招聘(ID:" . $id . ")修改成功！", 9, "index.php?m=admin_lietou", 2, 1);
            }
            $this->yuntpl(array('admin/admin_hotjob_add'));
        }

        function delhot_action()
        {
            $this->check_token();
            if (isset($_GET['id'])) {
                $hot = $this->obj->DB_select_once("hotjob", "`uid`='" . $_GET['id'] . "'");
                unlink_pic("../" . $hot['hot_pic']);
                $result = $this->obj->DB_delete_all("hotjob", "`uid`='" . $_GET['id'] . "'");
                if ($result) {
                    $this->obj->DB_update_all("lietou", "`hottime`='',`rec`='0'", "`uid`='" . $hot['uid'] . "'");
                    $this->layer_msg('名企招聘(ID:' . $_GET['id'] . ')删除成功！', 9, 0, $_SERVER['HTTP_REFERER']);
                } else {
                    $this->layer_msg('删除失败！', 8, 0, $_SERVER['HTTP_REFERER']);
                }
            }
        }

        function changeorder_action()
        {
            if ($_POST['uid']) {
                if (!$_POST['order']) {
                    $_POST['order'] = '0';
                }
                $this->obj->DB_update_all("lietou", "`order`='" . $_POST['order'] . "'", "`uid`='" . $_POST['uid'] . "'");
                $this->admin_log("公司(ID:" . $_POST['uid'] . ")排序设置成功");
            }
            die;
        }

        function Imitate_action()
        {
            extract($_GET);
            $user_info = $this->obj->DB_select_once("member", "`uid`='" . $uid . "'");
            $this->add_cookie($user_info['uid'], $user_info['username'], $user_info['salt'], $user_info['email'], $user_info['password'], $user_info['usertype'], 1, $user_info['did']);
            if ($_GET['type']) {
                $url = '/?c=tongji';
            }
            header('Location: ' . $this->config['sy_weburl'] . '/member' . $url);
        }

        function xls_action()
        {
            if ($_POST['where']) {
                $gettype = $_POST['type'];
                $_POST['where'] = str_replace(array("[", "]", "an d", "\&acute;", "\\"), array("(", ")", "and", "'", ""), $_POST['where']);
                if (in_array("lastdate", $_POST['type']) || in_array("rating", $_POST['type']) || in_array("vip_stime", $_POST['type'])) {
                    foreach ($_POST['type'] as $v) {
                        if ($v == "lastdate") {
                            $type[] = "lastupdate";
                        } elseif ($v != "rating" && $v != "vip_stime") {
                            $type[] = $v;
                        }
                    }
                    $_POST['type'] = $type;
                }
                $select = @implode(",", $_POST['type']);
                if (strstr($select, "rating") && strstr($select, "uid") == false) {
                    $select = $select . ",uid";
                }
                $list = $this->obj->DB_select_all("lietou", "uid in (" . $_POST['uid'] . ") and " . $_POST['where'], $select);
                if (!empty($list)) {
                    if (in_array("rating", $gettype)) {
                        foreach ($list as $v) {
                            $uid[] = $v['uid'];
                        }
                        $rating = $this->obj->DB_select_all("lietou_statis", "uid in (" . @implode(",", $uid) . ")", "uid,rating_name,vip_stime");
                        foreach ($list as $k => $v) {
                            foreach ($rating as $val) {
                                if ($v['uid'] == $val['uid']) {
                                    $list[$k]['rating'] = $val['rating_name'];
                                    $list[$k]['vip_stime'] = $val['vip_stime'];
                                }
                            }
                        }
                    }
                    $this->yunset("list", $list);
                    $this->yunset($this->MODEL('cache')->GetCache(array('city', 'hy', 'com')));
                    $this->yunset("type", $gettype);
                    $this->yuntpl(array('admin/admin_lietou_xls'));
                    $this->admin_log("导出公司信息");
                    header("Content-Type: application/vnd.ms-excel");
                    header("Content-Disposition: attachment; filename=lietou.xls");
                }
            }
        }

        function check_username_action()
        {
            $username = iconv("utf-8", "gbk", $_POST['username']);
            $member = $this->obj->DB_select_once("member", "`username`='" . $username . "'", "`uid`");
            echo $member['uid'];
            die;
        }

        function checksitedid_action()
        {
            if ($_POST['uid']) {
                $uids = @explode(',', $_POST['uid']);
                $uid = pylode(',', $uids);
                if ($uid) {
                    $siteDomain = $this->MODEL('site');
                    $Table = array('member', 'lietou', 'lietou_statis', 'lietou_job', 'lietou_cert', 'lietou_news', 'lietou_order', 'lietou_product', 'invoice_record', 'partjob', 'hotjob');
                    $siteDomain->UpDid(array('report'), $_POST['did'], "`p_uid` IN (" . $uid . ")");
                    $siteDomain->UpDid(array('userid_msg'), $_POST['did'], "`fid` IN (" . $uid . ")");
                    $siteDomain->UpDid(array('down_resume', 'lietou_pay'), $_POST['did'], "`com_id` IN (" . $uid . ")");
                    $siteDomain->UpDid(array('look_resume', 'ad_order'), $_POST['did'], "`comid` IN (" . $uid . ")");
                    $siteDomain->UpDid($Table, $_POST['did'], "`uid` IN (" . $uid . ")");
                    $this->ACT_layer_msg("会员(ID:" . $_POST['uid'] . ")分配站点成功！", 9, $_SERVER['HTTP_REFERER']);
                } else {
                    $this->ACT_layer_msg("请正确选择需分配用户！", 8, $_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->ACT_layer_msg("参数不全请重试！", 8, $_SERVER['HTTP_REFERER']);
            }
        }

        function saveusername_action()
        {
            if ($_POST['username']) {
                $username = yun_iconv("utf-8", "gbk", $_POST['username']);
                $M = $this->MODEL("userinfo");
                $num = $M->GetMemberNum(array("username" => $username));
                if ($num > 0) {
                    echo 1;
                    die;
                } else {
                    $M->UpdateMember(array("username" => $username), array("uid" => $_POST['uid']));

                    echo 0;
                    die;
                }
            }
        }

        function getinfo_action()
        {
            if ($_POST['comid']) {
                $info = $this->obj->DB_select_once("lietou", "`uid`='" . intval($_POST['comid']) . "'");
                $member = $this->obj->DB_select_once("member", "`uid`='" . $info['uid'] . "'", "`username`,`reg_ip`,`status`");
                $statis = $this->obj->DB_select_once("lietou_statis", "`uid`='" . $info['uid'] . "'", "`rating`");
                $yyzz = $this->obj->DB_select_once("lietou_cert", "`uid`='" . $info['uid'] . "' and `type`=3 ", "`check`");
                $conid = $info['conid'];
                if ($conid) {
                    $adviser = $this->obj->DB_select_once("lietou_consultant", "`id`=$conid");
                    $info['adviser'] = $adviser['username'];
                } else {
                    $info['adviser'] = null;
                }
                $info['username'] = $member['username'];
                $info['reg_ip'] = $member['reg_ip'];
                $info['status'] = $member['status'];
                $info['rating'] = $statis['rating'];
                $info['yyzzurl'] = str_replace("./", $this->config['sy_weburl'] . "/", $yyzz['check']);
                if ($info['linktel']) {
                    $info['phone'] = $info['linktel'];
                } else {
                    $info['phone'] = $info['linkphone'];
                }
                echo json_encode(yun_iconv('gbk', 'utf-8', $info));
            }
        }

        function mdown_action()
        {
            $where = '`comid`=' . intval($_GET['comid']) . '';
            $urlarr['c'] = 'mdown';
            $urlarr['comid'] = intval($_GET['comid']);
            if (trim($_GET['keyword'])) {
                if ($_GET['type'] == "1") {
                    $info = $this->obj->DB_select_all("member", "`username` like '%" . trim($_GET['keyword']) . "%'", "`uid`");
                    if (is_array($info)) {
                        foreach ($info as $v) {
                            $uid[] = $v['uid'];
                        }
                    }
                    $where .= " and `uid` in (" . @implode(",", $uid) . ")";
                } elseif ($_GET['type'] == "2") {
                    $info = $this->obj->DB_select_all("resume_expect", "`name` like '%" . trim($_GET['keyword']) . "%'", "`id`");
                    if (is_array($info)) {
                        foreach ($info as $v) {
                            $eid[] = $v['id'];
                        }
                    }
                    $where .= " and `eid` in (" . @implode(",", $eid) . ")";
                }
                $urlarr['type'] = $_GET['type'];
                $urlarr['keyword'] = $_GET['keyword'];
            }
            if ($_GET['order']) {
                $where .= " order by " . $_GET['t'] . " " . $_GET['order'];
                $urlarr['order'] = $_GET['order'];
                $urlarr['t'] = $_GET['t'];
            } else {
                $where .= " order by id desc";
            }
            $urlarr["page"] = "{{page}}";
            $pageurl = Url($_GET['m'], $urlarr, 'admin');
            $list = $this->get_page("down_resume", $where, $pageurl, $this->config['sy_listnum']);
            if (is_array($list)) {
                foreach ($list as $v) {
                    $eid[] = $v['eid'];
                    $uid[] = $v['uid'];
                    $uid[] = $v['comid'];
                    $comid[] = $v['comid'];
                }
                $resume = $this->obj->DB_select_all("resume_expect", "`id` in (" . @implode(",", $eid) . ")", "name,id");
                $member = $this->obj->DB_select_all("member", "`uid` in (" . @implode(",", $uid) . ")", "username,uid,usertype");
                $lietou = $this->obj->DB_select_all("lietou", "`uid` in (" . @implode(",", $comid) . ")", "name,uid");
                foreach ($list as $k => $v) {
                    foreach ($lietou as $val) {
                        if ($v['comid'] == $val['uid']) {
                            $list[$k]['com_name'] = $val['name'];
                        }
                    }
                    foreach ($resume as $val) {
                        if ($v['eid'] == $val['id']) {
                            $list[$k]['resume'] = $val['name'];
                        }
                    }
                    foreach ($member as $val) {
                        if ($v['uid'] == $val['uid']) {
                            $list[$k]['username'] = $val['username'];
                        }
                        if ($v['comid'] == $val['uid']) {
                            $list[$k]['com_username'] = $val['username'];
                            $list[$k]['usertype'] = $val['usertype'];
                        }
                    }
                }
            }
            $this->yunset("list", $list);
            $this->yuntpl(array('admin/admin_lietou_mdown'));
        }

        function mdowndel_action()
        {
            $this->check_token();
            if ($_GET['del']) {
                if (is_array($_GET['del'])) {
                    $del = @implode(",", $_GET['del']);
                    $layer_status = 1;
                } else {
                    $del = $_GET['del'];
                    $layer_status = 0;
                }
                $this->obj->DB_delete_all("down_resume", "`id` in (" . $del . ")", "");
                $this->layer_msg("下载记录(ID:" . $del . ")删除成功！", 9, $layer_status, $_SERVER['HTTP_REFERER']);
            } else {
                $this->layer_msg("请选择您要删除的信息！", 8, 1, $_SERVER['HTTP_REFERER']);
            }
        }

        function mapply_action()
        {
            $where = '`com_id`=' . intval($_GET['comid']) . '';
            $urlarr['c'] = 'mapply';
            $urlarr['comid'] = intval($_GET['comid']);
            if (trim($_GET['keyword'])) {
                if ($_GET['type'] == "1") {
                    $info = $this->obj->DB_select_all("member", "`username` like '%" . trim($_GET['keyword']) . "%'", "`uid`");
                    if (is_array($info)) {
                        foreach ($info as $v) {
                            $uid[] = $v['uid'];
                        }
                    }
                    $where .= " and `uid` in (" . @implode(",", $uid) . ")";
                } elseif ($_GET['type'] == "2") {
                    $info = $this->obj->DB_select_all("resume_expect", "`name` like '%" . trim($_GET['keyword']) . "%'", "`id`");
                    if (is_array($info)) {
                        foreach ($info as $v) {
                            $eid[] = $v['id'];
                        }
                    }
                    $where .= " and `eid` in (" . @implode(",", $eid) . ")";
                }
                $urlarr['type'] = $_GET['type'];
                $urlarr['keyword'] = $_GET['keyword'];
            }
            if ($_GET['order']) {
                $where .= " order by " . $_GET['t'] . " " . $_GET['order'];
                $urlarr['order'] = $_GET['order'];
                $urlarr['t'] = $_GET['t'];
            } else {
                $where .= " order by id desc";
            }
            $urlarr["page"] = "{{page}}";
            $pageurl = Url($_GET['m'], $urlarr, 'admin');
            $list = $this->get_page("userid_job", $where, $pageurl, $this->config['sy_listnum']);
            if (is_array($list)) {
                foreach ($list as $v) {
                    $eid[] = $v['eid'];
                    $uid[] = $v['uid'];
                    $comid[] = $v['com_id'];
                }
                $resume = $this->obj->DB_select_all("resume_expect", "`id` in (" . @implode(",", $eid) . ")", "name,id");
                $member = $this->obj->DB_select_all("member", "`uid` in (" . @implode(",", $uid) . ")", "username,uid");
                $lietou = $this->obj->DB_select_all("lietou", "`uid` in (" . @implode(",", $comid) . ")", "name,uid");
                foreach ($list as $k => $v) {
                    foreach ($lietou as $val) {
                        if ($v['comid'] == $val['uid']) {
                            $list[$k]['com_name'] = $val['name'];
                        }
                    }
                    foreach ($resume as $val) {
                        if ($v['eid'] == $val['id']) {
                            $list[$k]['resume'] = $val['name'];
                        }
                    }
                    foreach ($member as $val) {
                        if ($v['uid'] == $val['uid']) {
                            $list[$k]['username'] = $val['username'];
                        }
                    }
                }
            }
            $this->yunset("list", $list);
            $this->yuntpl(array('admin/admin_lie_mapply'));
        }

        function mapplydel_action()
        {
            $this->check_token();
            if ($_GET['del']) {
                if (is_array($_GET['del'])) {
                    $id = @implode(",", $_GET['del']);
                    $layer_status = 1;
                } else {
                    $id = $_GET['del'];
                    $layer_status = 0;
                }
                $sq_num = $this->obj->DB_select_all("userid_job", "`id` in (" . $id . ") and `com_id`='" . intval($_GET['comid']) . "'", "`uid`,`job_id`");
                if (is_array($sq_num)) {
                    $jobid = array();
                    $uid = array();
                    foreach ($sq_num as $v) {
                        $jobid[] = $v['job_id'];
                        $uid[] = $v['uid'];
                    }
                    if (intval($_POST['type']) != 2) {
                        $this->obj->DB_update_all("lietou_job", "`operatime`='" . time() . "'", "`id` in (" . pylode(",", $jobid) . ") and `uid`='" . intval($_GET['comid']) . "'");
                    }
                    $this->obj->DB_update_all("member_statis", "`sq_jobnum`=`sq_jobnum`-1", "`uid`  in(" . pylode(",", $uid) . ")");
                }
                $num = count($sq_num);
                $this->obj->DB_update_all("lietou_statis", "`sq_job`=`sq_job`-$num", "`uid`='" . intval($_GET['comid']) . "'");
                $nid = $this->obj->DB_delete_all("userid_job", "`id` in (" . $id . ") and `com_id`='" . intval($_GET['comid']) . "'", " ");
                if ($nid) {
                    $this->layer_msg('删除成功！', 9, $layer_status, $_SERVER['HTTP_REFERER']);
                } else {
                    $this->layer_msg('删除失败！', 8, $layer_status, $_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->layer_msg("请选择您要删除的信息！", 8, 1, $_SERVER['HTTP_REFERER']);
            }
        }

        function minvite_action()
        {
            $where = '`fid`=' . intval($_GET['comid']) . '';
            $urlarr['c'] = 'minvite';
            $urlarr['fid'] = intval($_GET['comid']);
            if (trim($_GET['keyword'])) {
                if ($_GET['type'] == "1") {
                    $info = $this->obj->DB_select_all("member", "`username` like '%" . trim($_GET['keyword']) . "%'", "`uid`");
                    if (is_array($info)) {
                        foreach ($info as $v) {
                            $uid[] = $v['uid'];
                        }
                    }
                    $where .= " and `uid` in (" . @implode(",", $uid) . ")";
                } elseif ($_GET['type'] == "2") {
                    $info = $this->obj->DB_select_all("resume_expect", "`name` like '%" . trim($_GET['keyword']) . "%'", "`id`");
                    if (is_array($info)) {
                        foreach ($info as $v) {
                            $eid[] = $v['id'];
                        }
                    }
                    $where .= " and `eid` in (" . @implode(",", $eid) . ")";
                }
                $urlarr['type'] = $_GET['type'];
                $urlarr['keyword'] = $_GET['keyword'];
            }
            if ($_GET['order']) {
                $where .= " order by " . $_GET['t'] . " " . $_GET['order'];
                $urlarr['order'] = $_GET['order'];
                $urlarr['t'] = $_GET['t'];
            } else {
                $where .= " order by id desc";
            }
            $urlarr["page"] = "{{page}}";
            $pageurl = Url($_GET['m'], $urlarr, 'admin');
            $list = $this->get_page("userid_msg", $where, $pageurl, $this->config['sy_listnum']);
            if (is_array($list)) {
                foreach ($list as $v) {
                    $uid[] = $v['uid'];
                }
                $resume = $this->obj->DB_select_all("resume", "`uid` in (" . @implode(",", $uid) . ")", "name,uid");
                foreach ($list as $k => $v) {
                    foreach ($resume as $val) {
                        if ($v['uid'] == $val['uid']) {
                            $list[$k]['resume'] = $val['name'];
                        }
                    }
                }
            }
            $this->yunset("list", $list);
            $this->yuntpl(array('admin/admin_lietou_minvite'));
        }

        function minvitedel_action()
        {
            $this->check_token();
            if ($_GET['del']) {
                if (is_array($_GET['del'])) {
                    $del = @implode(",", $_GET['del']);
                    $layer_status = 1;
                } else {
                    $del = $_GET['del'];
                    $layer_status = 0;
                }
                $this->obj->DB_delete_all("userid_msg", "`id` in (" . $del . ")", "");
                $this->layer_msg("邀请面试记录(ID:" . $del . ")删除成功！", 9, $layer_status, $_SERVER['HTTP_REFERER']);
            } else {
                $this->layer_msg("请选择您要删除的信息！", 8, 1, $_SERVER['HTTP_REFERER']);
            }
        }

        function sendsysmsg_action()
        {
            if ($_POST['content'] == "") {
                $this->ACT_layer_msg("请填写内容！", 8);
            }
            $data['content'] = $_POST['content'];
            $data['ctime'] = time();
            $data['fa_uid'] = $_POST['sysmsg_user'];
            $data['username'] = $_POST['sys_username'];
            $nid = $this->obj->insert_into("sysmsg", $data);
            if ($nid) {
                $this->ACT_layer_msg("系统消息发送成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
            } else {
                $this->ACT_layer_msg("用户不存在！", 8, $_SERVER['HTTP_REFERER']);
            }
        }

        function member_log_action()
        {
            $opera = array('1' => '职位操作', '3' => '下载简历', '4' => '邀请面试', '7' => '修改基本信息', '8' => '修改密码');
            $search_list[] = array("param" => "operas", "name" => '操作类型', "value" => $opera);
            if ($_GET['operas'] == '1' || $_GET['operas'] == '2') {
                $parr = array('1' => '增加', '2' => '修改', '3' => '删除', '4' => '刷新');
                $search_list[] = array("param" => "parrs", "name" => '操作内容', "value" => $parr);
            }
            $ad_time = array('1' => '今天', '3' => '最近三天', '7' => '最近七天', '15' => '最近半月', '30' => '最近一个月');
            $search_list[] = array("param" => "end", "name" => '发布时间', "value" => $ad_time);
            $this->yunset("search_list", $search_list);

            $where = '`uid`=' . intval($_GET['comid']) . '';
            $urlarr['c'] = 'member_log';
            $urlarr['comid'] = intval($_GET['comid']);
            if ($_GET['operas']) {
                $where .= " and `opera`='" . $_GET['operas'] . "'";
                $urlarr['operas'] = $_GET['operas'];
            }
            if ($_GET['parr']) {
                $where .= " and `type`='" . $_GET['parrs'] . "'";
                $urlarr['parrs'] = $_GET['parrs'];
            }
            if ($_GET['end']) {
                if ($_GET['end'] == '1') {
                    $where .= " and `ctime` >= '" . strtotime(date("Y-m-d 00:00:00")) . "'";
                } else {
                    $where .= " and `ctime` >= '" . strtotime('-' . (int)$_GET['end'] . 'day') . "'";
                }
                $urlarr['end'] = $_GET['end'];
            }
            if ($_GET['stime']) {
                $where .= " and `ctime` >='" . strtotime($_GET['stime'] . "00:00:00") . "'";
                $urlarr['stime'] = $_GET['stime'];
            }
            if ($_GET['etime']) {
                $where .= " and `ctime` <='" . strtotime($_GET['etime'] . "23:59:59") . "'";
                $urlarr['etime'] = $_GET['etime'];
            }
            if ($_GET['order']) {
                $where .= " order by " . $_GET['t'] . " " . $_GET['order'];
                $urlarr['order'] = $_GET['order'];
                $urlarr['t'] = $_GET['t'];
            } else {
                $where .= " order by `id` desc";
            }
            $urlarr['page'] = "{{page}}";
            $pageurl = Url($_GET['m'], $urlarr, 'admin');
            $rows = $this->get_page("member_log", $where, $pageurl, $this->config['sy_listnum']);
            if (is_array($rows)) {
                foreach ($rows as $v) {
                    $uid[] = $v['uid'];
                    $member = $this->obj->DB_select_all("member", "`uid` in (" . @implode(",", $uid) . ")", "`uid`,`username`");
                }
                foreach ($rows as $k => $v) {
                    foreach ($member as $val) {
                        if ($v['uid'] == $val['uid']) {
                            $rows[$k]['username'] = $val['username'];
                        }
                    }
                }
            }
            $this->yunset("rows", $rows);
            $this->yuntpl(array('admin/admin_lietou_member_log'));
        }

        function mmeberlogdel_action()
        {
            $this->check_token();
            if ($_GET['del']) {
                $del = $_GET['del'];
                if ($del) {
                    if (is_array($del)) {
                        $layer_type = 1;
                        $this->obj->DB_delete_all("member_log", "`id` in (" . @implode(',', $del) . ")", "");
                        $del = @implode(',', $del);
                    } else {
                        $this->obj->DB_delete_all("member_log", "`id`='" . $del . "'");
                        $layer_type = 0;
                    }
                    $this->layer_msg('会员日志(ID:' . $del . ')删除成功！', 9, $layer_type, $_SERVER['HTTP_REFERER']);
                } else {
                    $this->layer_msg('请选择您要删除的信息！', 8, 0, $_SERVER['HTTP_REFERER']);
                }
            }
        }

        function mjob_action()
        {
            $urlarr['c'] = 'mjob';
            $urlarr['comid'] = intval($_GET['comid']);
            $urlarr['page'] = "{{page}}";
            $pageurl = Url($_GET['m'], $urlarr, 'admin');
            $M = $this->MODEL();
            $PageInfo = $M->get_page("company_job", '`uid`=' . intval($_GET['comid']) . '', $pageurl, $this->config['sy_listnum']);
            $this->yunset($PageInfo);
            $rows = $PageInfo['rows'];
            include PLUS_PATH . "job.cache.php";
            include PLUS_PATH . "industry.cache.php";
            include PLUS_PATH . "com.cache.php";
            if (is_array($rows)) {
                $jobids = array();
                foreach ($rows as $v) {
                    $jobids[] = $v['id'];
                }
                $useridjob = $this->MODEL('job')->GetUseridJob(array("`job_id` in(" . pylode(',', $jobids) . ")", 'is_browse' => 1), array('field' => "count(id) as num,`job_id`", 'groupby' => 'job_id'));

                $msgnum = $this->MODEL('resume')->GetUserMsgNums(array("`jobid` in(" . pylode(',', $jobids) . ")"), array('field' => "count(id) as num,`jobid`", 'groupby' => 'jobid'));
                foreach ($rows as $k => $v) {
                    if ($v['rec_time'] > 1000) {
                        $rows[$k]['recdate'] = date("Y-m-d", $v['rec_time']);
                    }
                    if ($v['urgent_time'] > 1000) {
                        $rows[$k]['eurgent'] = date("Y-m-d", $v['urgent_time']);
                    }

                    $rows[$k]['browseNum'] = $rows[$k]['inviteNum'] = 0;
                    $rows[$k]['edu'] = $comclass_name[$v['edu']];
                    $rows[$k]['exp'] = $comclass_name[$v['exp']];
                    if ($v['job_post']) {
                        $rows[$k]['job'] = $job_name[$v['job_post']];
                    } else {
                        $rows[$k]['job'] = $job_name[$v['job1_son']];
                    }

                    $rows[$k]['salary'] = $comclass_name[$v['salary']];
                    $rows[$k]['type'] = $comclass_name[$v['type']];
                    if ($v['edate'] < time()) {
                        $rows[$k]['edatetxt'] = "<font color='red'>已到期</font>";
                    } elseif ($v['edate'] < (time() + 3 * 86400)) {

                        $rows[$k]['edatetxt'] = "<font color='blue'>3天内到期</font>";

                    } elseif ($v['edate'] < (time() + 7 * 86400)) {

                        $rows[$k]['edatetxt'] = "<font color='blue'>7天内到期</font>";
                    } else {
                        $rows[$k]['edatetxt'] = date("Y-m-d", $v['edate']);
                    }
                    if ($v['urgent_time'] > time()) {
                        $rows[$k]['urgent_day'] = ceil(($v['urgent_time'] - time()) / 86400);
                    } else {
                        $rows[$k]['urgent_day'] = "0";
                    }
                    if ($v['rec_time'] > time()) {
                        $rows[$k]['rec_day'] = ceil(($v['rec_time'] - time()) / 86400);
                    } else {
                        $rows[$k]['rec_day'] = "0";
                    }
                    foreach ($useridjob as $val) {
                        if ($val['job_id'] == $v['id']) {
                            $rows[$k]['browseNum'] = $val['num'];
                        }
                    }
                    foreach ($msgnum as $val) {
                        if ($val['jobid'] == $v['id']) {
                            $rows[$k]['inviteNum'] = $val['num'];
                        }
                    }

                }
            }
            $where = str_replace(array("(", ")"), array("[", "]"), $where);
            $this->yunset("where", $where);
            $this->job_cache();
            $this->com_cache();
            $this->industry_cache();
            include(CONFIG_PATH . "db.data.php");
            $source = $arr_data['source'];
            $this->yunset('source', $source);
            $this->yunset("rows", $rows);
            $this->yunset("time", time());
            $this->yuntpl(array('admin/admin_lietou_mjob'));
        }

        function mjobshow_action()
        {
            $this->yunset($this->MODEL('cache')->GetCache(array('city', 'hy', 'com', 'job')));
            if ($_GET['id']) {
                $show = $this->obj->DB_select_once("lietou_job", "id='" . $_GET['id'] . "'");
                $show['lang'] = @explode(',', $show['lang']);
                $show['welfare'] = @explode(',', $show['welfare']);
                if ($show['three_cityid']) {
                    $show['circlecity'] = $show['three_cityid'];
                } else if ($show['cityid']) {
                    $show['circlecity'] = $show['cityid'];
                } else if ($show['provinceid']) {
                    $show['circlecity'] = $show['provinceid'];
                }
                $this->yunset("show", $show);
                $this->yunset("lasturl", $_SERVER['HTTP_REFERER']);
            }

            if ($_POST['update']) {
                $_POST['lang'] = @implode(',', $_POST['lang']);
                $_POST['welfare'] = @implode(',', $_POST['welfare']);

                $_POST['edate'] = strtotime($_POST['edate']);
                $_POST['description'] = str_replace("&amp;", "&", html_entity_decode($_POST['content'], ENT_QUOTES, "GB2312"));
                $_POST['lastupdate'] = time();
                $lasturl = $_POST['lasturl'];
                unset($_POST['update']);
                unset($_POST['content']);
                unset($_POST['lasturl']);
                if ($_POST['edate'] > time()) {
                    $_POST['state'] = "1";
                } else {
                    $this->ACT_layer_msg("结束时间不能小于当前时间", 8, $_SERVER['HTTP_REFERER'], 2, 1);
                }

                if ($_POST['id'] && $_POST['uid'] == '') {
                    $job = $this->obj->DB_select_once("lietou_job", "`id`='" . $_POST['id'] . "'", "`uid`");
                    $where['id'] = $_POST['id'];
                    unset($_POST['id']);
                    $this->obj->update_once("lietou_job", $_POST, $where);
                    $this->obj->DB_update_all("lietou", "`lastupdate`='" . time() . "'", "`uid`='" . $job['uid'] . "'");
                    $this->ACT_layer_msg("职位(ID:" . $where['id'] . ")修改成功！", 9, $lasturl, 2, 1);
                } else if ($_POST['uid']) {
                    $lietou = $this->obj->DB_select_once("lietou", "`uid`='" . $_POST['uid'] . "'", "name");
                    $statis = $this->obj->DB_select_once("lietou_statis", "`uid`='" . $_POST['uid'] . "'", "`vip_etime`,`job_num`,`integral`");

                    if ($statis['vip_etime'] > time() || $statis['vip_etime'] == "0") {
                        if ($statis['rating_type'] == 1) {
                            if ($statis['job_num'] < 1) {
                                if ($this->config['com_integral_online'] == "1") {
                                    if ($statis['integral'] < $this->config['integral_job']) {
                                        $this->ACT_layer_msg($this->config['integral_pricename'] . "不够发布职位！", 8, "index.php?m=admin_lietou_job");
                                    }
                                } else {
                                    $this->ACT_layer_msg("该会员发布职位用完！", 8, "index.php?m=admin_lietou_job");
                                }
                            } else {
                                $this->obj->DB_update_all("lietou_statis", "`job_num`=`job_num`-1", "`uid`='" . $_POST['uid'] . "'");
                            }
                        }
                    } else {
                        if ($this->config['com_integral_online'] == "1") {
                            if ($statis['integral'] < $this->config['integral_job']) {
                                $this->ACT_layer_msg($this->config['integral_pricename'] . "不够发布职位！", 8, "index.php?m=admin_lietou_job");
                            }
                        } else {
                            $this->ACT_layer_msg("该会员发布职位用完！", 8, "index.php?m=admin_lietou_job");
                        }
                    }
                    $_POST['com_name'] = $lietou['name'];
                    $_POST['sdate'] = time();
                    $id = $this->obj->insert_into("lietou_job", $_POST);
                    if ($id) {
                        $this->obj->DB_update_all("lietou", "`jobtime`='" . time() . "'", "`uid`='" . $_POST['uid'] . "'");
                        $this->ACT_layer_msg("职位(ID:" . $id . ")发布成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
                    } else {
                        $this->ACT_layer_msg("职位发布失败！", 8, $_SERVER['HTTP_REFERER'], 2, 1);
                    }
                }
            }
            $this->yunset("uid", $_GET['uid']);
            $this->yuntpl(array('admin/admin_lietou_job_show'));
        }

        function mlockinfo_action()
        {
            $userinfo = $this->obj->DB_select_once("lietou_job", "`id`=" . $_POST['id'], "`statusbody`");
            echo $userinfo['statusbody'];
            die;
        }

        function mstatus_action()
        {
            extract($_POST);
            $id = @explode(",", $pid);
            if (is_array($id)) {
                foreach ($id as $value) {
                    if ($value) {
                        $idlist[] = $value;
                        $data[] = $this->shjobmsg($value, $status, $statusbody);
                    }
                }
                if ($data != "") {
                    $smtp = $this->email_set();
                    foreach ($data as $key => $val) {
                        $this->send_msg_email($val, $smtp);
                    }
                }
                $aid = @implode(",", $idlist);
                $id = $this->obj->DB_update_all("lietou_job", "`state`='$status',`statusbody`='" . $statusbody . "',`lastupdate`='" . time() . "'", "`id` IN ($aid)");
                if ($id) {
                    $Weixin = $this->MODEL('weixin');
                    $sendInfo['jobid'] = $idlist;
                    $sendInfo['state'] = $status;
                    $sendInfo['statusbody'] = $statusbody;
                    $Weixin->sendWxJobStatus($sendInfo);
                }
                $id ? $this->ACT_layer_msg("职位审核(ID:" . $aid . ")设置成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1) : $this->ACT_layer_msg("设置失败！", 8, $_SERVER['HTTP_REFERER']);
            } else {
                $this->ACT_layer_msg("非法操作！", 3, $_SERVER['HTTP_REFERER']);
            }
        }

        function msaveclass_action()
        {
            extract($_POST);
            if ($hy == "") {
                $this->ACT_layer_msg("请选择行业类别！", 8, $_SERVER['HTTP_REFERER']);
            }
            if ($job1 == "") {
                $this->ACT_layer_msg("请选择职位类别！", 8, $_SERVER['HTTP_REFERER']);
            }
            $id = $this->obj->DB_update_all("lietou_job", "`hy`='$hy',`job1`='$job1',`job1_son`='$job1_son',`job_post`='$job_post'", "`id` IN ($jobid)");
            $id ? $this->ACT_layer_msg("职位类别(ID:" . $jobid . ")修改成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1) : $this->ACT_layer_msg("修改失败！", 8, $_SERVER['HTTP_REFERER']);
        }

        function mjobclass_action()
        {
            include(PLUS_PATH . "industry.cache.php");
            include(PLUS_PATH . "job.cache.php");
            if (is_array($job_type[$_POST['val']]) && $job_type[$_POST['val']]) {
                foreach ($job_type[$_POST['val']] as $val) {
                    $html .= "<option value='" . $val . "'>" . $job_name[$val] . "</option>";
                }
            } else {
                $html .= "<option value=''>暂无分类</option>";
            }
            echo $html;
        }

        function shjobmsg($jobid, $yesid, $statusbody)
        {
            $data = array();
            $comarr = $this->obj->DB_select_once("lietou_job", "`id`='" . $jobid . "'", "uid,name");
            if ($yesid == 1) {
                $data['type'] = "zzshtg";
                $this->send_dingyue($jobid, 2);
            } elseif ($yesid == 3) {
                $data['type'] = "zzshwtg";
            }
            if ($data['type'] != "") {
                $uid = $this->obj->DB_select_alls("member", "lietou", "a.`uid`='" . $comarr['uid'] . "' and a.`uid`=b.`uid`", "a.email,a.moblie,a.uid,b.name");
                $data['uid'] = $uid[0]['uid'];
                $data['name'] = $uid[0]['name'];
                $data['email'] = $uid[0]['email'];
                $data['moblie'] = $uid[0]['moblie'];
                $data['jobname'] = $comarr['name'];
                $data['date'] = date("Y-m-d H:i:s");
                $data['status_info'] = $statusbody;
                return $data;
            }
        }

        function mctime_action()
        {
            extract($_POST);
            $id = @explode(",", $jobid);
            if (is_array($id)) {
                $posttime = $endtime * 86400;
                foreach ($id as $value) {
                    $row = $this->obj->DB_select_once("lietou_job", "`id`='" . $value . "'");
                    if ($row['state'] == 2 || $row['edate'] < time()) {
                        $time = time() + $posttime;
                        $id = $this->obj->DB_update_all("lietou_job", "`edate`='" . $time . "',`state`='1'", "`id`='" . $value . "'");
                    } else {
                        $time = $row['edate'] + $posttime;
                        $id = $this->obj->DB_update_all("lietou_job", "`edate`='" . $time . "'", "`id`='" . $value . "'");
                    }
                }
                $id ? $this->ACT_layer_msg("职位延期(ID:" . $jobid . ")设置成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1) : $this->ACT_layer_msg("设置失败！", 8, $_SERVER['HTTP_REFERER']);
            } else {
                $this->ACT_layer_msg("非法操作！", 8, $_SERVER['HTTP_REFERER']);
            }
        }

        function mxuanshang_action()
        {
            if ($_POST['s'] == 1) {
                $id = $this->obj->DB_update_all("lietou_job", "`xsdate`='0'", "`id`='" . intval($_POST['pid']) . "'");
            } else {
                $info = $this->obj->DB_select_once("lietou_job", "`id`='" . intval($_POST['pid']) . "'", "`xsdate`");
                $xsdays = intval($_POST['xsdays']);
                $time = $xsdays * 86400;
                if ($info['xsdate'] > time()) {
                    $id = $this->obj->DB_update_all("lietou_job", "`xsdate`=`xsdate`+'" . $time . "'", "`id`='" . intval($_POST['pid']) . "'");
                } else {
                    $xsdate = time() + $time;
                    $id = $this->obj->DB_update_all("lietou_job", "`xsdate`='" . $xsdate . "'", "`id`='" . intval($_POST['pid']) . "'");
                }
            }
            $id ? $this->ACT_layer_msg("职位置顶(ID:" . $_POST['pid'] . ")设置成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1) : $this->ACT_layer_msg("设置失败！", 8, $_SERVER['HTTP_REFERER']);
        }

        function mrecommend_action()
        {
            extract($_POST);
            if ($addday < 1 && $s == '') {
                $this->ACT_layer_msg("推荐天数不能为空！", 8);
            }
            $addtime = 86400 * $addday;
            if ($pid) {
                if ($s == 1) {
                    $this->obj->DB_update_all("lietou_job", "`rec_time`='0',`rec`='0'", "`id`='$pid'");
                } elseif ($eid > time()) {
                    $this->obj->DB_update_all("lietou_job", "`rec_time`=`rec_time`+$addtime,`rec`='1'", "`id`='$pid'");
                } else {
                    $time = time() + $addtime;
                    $this->obj->DB_update_all("lietou_job", "`rec_time`='" . $time . "',`rec`='1'", "`id`='$pid'");
                }
                $this->ACT_layer_msg("职位推荐(ID:" . $pid . ")设置成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
            }
            if (!empty($codearr)) {
                if ($s == 1) {
                    $this->obj->DB_update_all("lietou_job", "`rec_time`='0',`rec`='0'", "`id` in (" . $codearr . ")");
                    $this->ACT_layer_msg("取消职位推荐设置成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
                } else {
                    $list = $this->obj->DB_select_all("lietou_job", "`id` in (" . $codearr . ")", "`id`,`rec_time`");
                    if (is_array($list)) {
                        foreach ($list as $v) {
                            if ($v['rec_time'] < time()) {
                                $gid[] = $v['id'];
                            } else {
                                $mid[] = $v['id'];
                            }
                        }
                        $guoqi = @implode(",", $gid);
                        $meiguo = @implode(",", $mid);
                        if ($guoqi != "") {
                            $time = time() + $addtime;
                            $this->obj->DB_update_all("lietou_job", "`rec_time`=" . $time . ",`rec`='1'", "`id` in (" . $guoqi . ")");
                        } elseif ($meiguo != "") {
                            $this->obj->DB_update_all("lietou_job", "`rec_time`=`rec_time`+$addtime,`rec`='1'", "`id` in (" . $meiguo . ")");
                        }
                        $this->ACT_layer_msg("职位推荐设置成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
                    }
                }
            }
        }

        function murgent_action()
        {
            extract($_POST);
            if ($addday < 1 && $s == '') {
                $this->ACT_layer_msg("紧急天数不能为空！", 8);
            }
            $addtime = 86400 * $addday;
            if ($pid) {
                if ($s == 1) {
                    $this->obj->DB_update_all("lietou_job", "`urgent_time`='0',`urgent`='0'", "`id`='$pid'");
                } elseif ($eid > time()) {
                    $this->obj->DB_update_all("lietou_job", "`urgent_time`=`urgent_time`+$addtime,`urgent`='1'", "`id`='$pid'");
                } else {
                    $this->obj->DB_update_all("lietou_job", "`urgent_time`=" . time() . "+$addtime,`urgent`='1'", "`id`='$pid'");
                }
                $this->ACT_layer_msg("紧急招聘(ID:" . $pid . ")设置成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
            }
            if (!empty($codeugent)) {
                if ($s == 1) {
                    $this->obj->DB_update_all("lietou_job", "`urgent_time`='0',`urgent`='0'", "`id` in (" . $codeugent . ")");
                    $this->ACT_layer_msg("取消职位紧急设置成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
                } else {
                    $code_ugent = @explode(",", $codeugent);
                    if (is_array($code_ugent)) {
                        foreach ($code_ugent as $k => $v) {
                            $r_time[$v] = $this->obj->DB_select_once("lietou_job", "`id`='" . $v . "'", "`urgent_time`");
                        }
                    }
                    if (is_array($r_time)) {
                        $ti = time();
                        foreach ($r_time as $ke => $va) {
                            if ($va['urgent_time'] < $ti) {
                                $g_id[] = $ke;
                            } else {
                                $m_id[] = $ke;
                            }
                        }
                        $guoqi = @implode(",", $g_id);
                        $meiguo = @implode(",", $m_id);
                        if ($g_id) {
                            $this->obj->DB_update_all("lietou_job", "`urgent_time`=" . time() . "+$addtime,`urgent`='1'", "`id` in (" . $guoqi . ")");
                        } elseif ($m_id) {
                            $this->obj->DB_update_all("lietou_job", "`urgent_time`=`urgent_time`+$addtime,`urgent`='1'", "`id` in (" . $meiguo . ")");
                        }
                        $this->ACT_layer_msg("职位紧急设置成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
                    }
                }
            }
        }

        function mjobdel_action()
        {
            $this->check_token();
            if ($_GET['del'] || $_GET['id']) {
                if (is_array($_GET['del'])) {
                    $layer_type = 1;
                    $del = @implode(',', $_GET['del']);
                } else {
                    $layer_type = 0;
                    $del = $_GET['id'];
                }
                $this->obj->DB_delete_all("user_entrust_record", "`jobid` in (" . $del . ")", "");
                $this->obj->DB_delete_all("lietou_job", "`id` in (" . $del . ")", "");
                $this->obj->DB_delete_all("lietou_job_link", "`jobid` in (" . $del . ")", "");
                $this->obj->DB_delete_all("userid_msg", "`jobid` in (" . $del . ")", "");
                $this->obj->DB_delete_all("userid_job", "`job_id` in (" . $del . ")", "");
                $this->obj->DB_delete_all("fav_job", "`job_id` in (" . $del . ")", "");
                $this->obj->DB_delete_all("look_job", "`jobid` in (" . $del . ")", "");
                $this->obj->DB_delete_all("report", "`usertype`=1 and `type`=0 and `eid` in (" . $del . ")", "");
                $this->layer_msg("职位(ID:" . $del . ")删除成功！", 9, $layer_type, $_SERVER['HTTP_REFERER']);
            } else {
                $this->layer_msg("请选择您要删除的信息！", 8, 1);
            }
        }

        function mrefresh_action()
        {
            $list = $this->obj->DB_select_all("lietou_job", "`id` in (" . $_POST['ids'] . ")", "`uid`");
            if (is_array($list)) {
                foreach ($list as $v) {
                    $uid[] = $v['uid'];
                }
                $this->obj->DB_update_all("lietou", "`lastupdate`='" . time() . "'", "`uid` in (" . @implode(",", $uid) . ")");
            }
            $this->obj->DB_update_all("lietou_job", "`lastupdate`='" . time() . "'", "`id` in (" . $_POST['ids'] . ")");
            $this->admin_log("职位(ID" . $_POST['ids'] . "刷新成功");
        }

        function mxls_action()
        {
            if ($_POST['where']) {
                $_POST['where'] = str_replace(array("[", "]", "an d", "\&acute;", "\\"), array("(", ")", "and", "'", ""), $_POST['where']);
                if (in_array("lastdate", $_POST['type'])) {
                    foreach ($_POST['type'] as $v) {
                        if ($v == "lastdate") {
                            $type[] = "lastupdate";
                        } else {
                            $type[] = $v;
                        }
                    }
                    $_POST['type'] = $type;
                }
                $select = @implode(",", $_POST['type']);
                $list = $this->obj->DB_select_all("lietou_job", "`id` in (" . $_POST["pid"] . ") and " . $_POST['where'], $select);
                if (!empty($list)) {
                    foreach ($list as $k => $v) {
                        $welfares = $langs = array();
                        if ($v['lang'] != "") {
                            include PLUS_PATH . "/com.cache.php";
                            $lang = @explode(",", $v['lang']);
                            foreach ($lang as $val) {
                                $langs[] = $comclass_name[$val];
                            }
                            $list[$k]['lang'] = @implode(",", $langs);
                        }
                        if ($v['welfare'] != "") {
                            include PLUS_PATH . "/com.cache.php";
                            $lang = @explode(",", $v['welfare']);
                            foreach ($lang as $val) {
                                $welfares[] = $comclass_name[$val];
                            }
                            $list[$k]['welfare'] = @implode(",", $welfares);
                        }
                    }
                    $this->yunset("list", $list);
                    $this->yunset($this->MODEL('cache')->GetCache(array('city', 'hy', 'com', 'job')));
                    $this->yunset("type", $_POST['type']);
                    $this->yuntpl(array('admin/admin_job_xls'));
                    $this->admin_log("导出职位信息");
                    header("Content-Type: application/vnd.ms-excel");
                    header("Content-Disposition: attachment; filename=job.xls");
                }
            }
        }

        function mcheckstate_action()
        {
            if ($_POST['id'] && $_POST['state']) {
                if ($_POST['state'] == 2) {
                    $_POST['state'] = 0;
                }
                $this->obj->DB_update_all("lietou_job", "`status`='" . $_POST['state'] . "'", "`id`='" . $_POST['id'] . "'");
            }
            echo 1;
        }

        function mmatching_action()
        {
            if ($_GET['id']) {
                $id = intval($_GET['id']);
                $this->yunset($this->MODEL('cache')->GetCache(array('city')));
                $where = "status<>'2' and `r_status`<>'2' and `job_classid`<>'' and `open`='1' and `defaults`='1'";
                $JobM = $this->MODEL('job');
                $jobinfo = $JobM->GetComjobOne(array('id' => $id), array('field' => 'uid,job1,cityid'));
                $this->yunset('comid', $jobinfo['uid']);
                if ($jobinfo) {
                    $where .= "and `cityid`='" . $jobinfo['cityid'] . "'";
                }
                include PLUS_PATH . "job.cache.php";
                if ($jobinfo['job1']) {
                    $joball = $job_type[$jobinfo['job1']];
                    foreach ($job_type[$jobinfo['job1']] as $v) {
                        $joball[] = @implode(",", $job_type[$v]);
                    }
                    $job_classid = @implode(",", $joball);
                }
                if (!empty($job_classid)) {
                    $classid = @explode(",", $job_classid);
                    foreach ($classid as $value) {
                        $jobclass[] = "FIND_IN_SET('" . $value . "',job_classid)";
                    }
                    $classid = @implode(" or ", $jobclass);
                    $where .= " AND ($classid)";
                }
                $record = $this->obj->DB_select_all("user_entrust_record", "`jobid`='" . $id . "'");
                foreach ($record as $k => $v) {
                    $eids[] = $v['eid'];
                }
                $where .= " and `id` not in(" . pylode(',', $eids) . ")";
                $where .= "order by `lastupdate` desc";
                $urlarr["page"] = "{{page}}";
                $pageurl = Url('admin_lietou_job&c=matching&id=' . $id . '', $urlarr, 'admin');
                $rows = $this->get_page("resume_expect", $where, $pageurl, $this->config['sy_listnum'], '`id`,`uid`,`uname`,`job_classid`,`provinceid`,`cityid`');
                foreach ($rows as $key => $val) {
                    $job_classid = explode(",", $val['job_classid']);
                    $jobname = array();
                    if (is_array($job_classid)) {
                        foreach ($job_classid as $val) {
                            $jobname[] = $job_name[$val];
                        }
                    }
                    $rows[$key]['job_name'] = implode(",", $jobname);
                }
                $this->yunset('resumes', $rows);
                $this->yuntpl(array('admin/admin_matching'));
            }
        }

        function directrecom_action()
        {
            if ($_GET['eid'] && $_GET['uid'] && $_GET['id'] && $_GET['comid']) {
                $eid = intval($_GET['eid']);
                $uid = intval($_GET['uid']);
                $id = intval($_GET['id']);
                $comid = intval($_GET['comid']);
                $row = $this->obj->DB_select_once("user_entrust_record", "`jobid`='" . $id . "' and `eid`='" . $eid . "'");
                if (!empty($row)) {
                    $arr['msg'] = iconv('gbk', 'utf-8', '请勿重复推送！');
                    $arr['type'] = '8';
                } else {
                    $linkmail = $this->obj->DB_select_once("lietou", "`uid`='" . $comid . "'", "`linkmail`,`uid`,`did`");
                    $id = $this->obj->DB_insert_once("user_entrust_record", "`jobid`='" . $id . "',`eid`='" . $eid . "',`uid`='" . $uid . "',`comid`='" . $comid . "',`ctime`='" . time() . "',`did`='" . $linkmail['did'] . "'");
                    if ($id) {


                        $contents = file_get_contents($this->config['sy_weburl'] . "/index.php?m=resume&c=sendresume&id=" . $eid . "&type=charge");

                        $emailData['to'] = $linkmail['linkmail'];
                        $emailData['subject'] = $this->config['sy_webname'] . "向您推荐了简历！";
                        $emailData['content'] = $contents;
                        $sendid = $this->sendemail($emailData);


                        $arr['msg'] = iconv('gbk', 'utf-8', '推送成功！');
                        $arr['type'] = '9';
                    } else {
                        $arr['msg'] = iconv('gbk', 'utf-8', '推送失败');
                        $arr['type'] = '8';
                    }
                }
                echo json_encode($arr);
                die;
            }
        }

        function mintegral_action()
        {
            include(CONFIG_PATH . "db.data.php");
            $this->yunset("arr_data", $arr_data);
            $where = '`com_id`=' . intval($_GET['comid']) . ' and `type`=1';
            $urlarr['c'] = 'mintegral';
            $urlarr['comid'] = intval($_GET['comid']);
            if ($_GET['order']) {
                $where .= " order by " . $_GET['t'] . " " . $_GET['order'];
                $urlarr['order'] = $_GET['order'];
                $urlarr['t'] = $_GET['t'];
            } else {
                $where .= " order by id desc";
            }
            $urlarr["page"] = "{{page}}";
            $pageurl = Url($_GET['m'], $urlarr, 'admin');
            $list = $this->get_page("lietou_pay", $where, $pageurl, $this->config['sy_listnum']);
            $this->yunset("list", $list);
            $this->yuntpl(array('admin/admin_lie_mintegral'));
        }

        function morder_action()
        {
            $search_list[] = array("param" => "typezf", "name" => '支付类型', "value" => array("alipay" => "支付宝", "tenpay" => "财富通", "bank" => "银行转帐"));
            $search_list[] = array("param" => "typedd", "name" => '订单类型', "value" => array("1" => "会员充值", "2" => "" . $this->config['integral_pricename'] . "充值", "3" => "银行转帐", "4" => "金额充值", "5" => "购买增值包"));
            $search_list[] = array("param" => "order_state", "name" => '订单状态', "value" => array("0" => "支付失败", "1" => "等待付款", "2" => "支付成功", "3" => "等待确认"));
            $lo_time = array('1' => '今天', '3' => '最近三天', '7' => '最近七天', '15' => '最近半月', '30' => '最近一个月');
            $search_list[] = array("param" => "time", "name" => '充值时间', "value" => $lo_time);
            $this->yunset("search_list", $search_list);
            $where = '`uid`=' . intval($_GET['comid']) . '';
            $urlarr['c'] = 'morder';
            $urlarr['comid'] = intval($_GET['comid']);
            if ($_GET['typezf']) {
                $where .= " and `order_type`='" . $_GET['typezf'] . "'";
                $urlarr['typezf'] = $_GET['typezf'];
            }
            if ($_GET['typedd']) {
                $where .= " and `type`='" . $_GET['typedd'] . "'";
                $urlarr['typedd'] = $_GET['typedd'];
            }
            if (trim($_GET['keyword']) != "") {
                $where .= " and `order_id` like '%" . trim($_GET['keyword']) . "%'";
                $urlarr['keyword'] = $_GET['keyword'];
            }
            if ($_GET['time']) {
                if ($_GET['time'] == '1') {
                    $where .= " and `order_time` >='" . strtotime(date("Y-m-d 00:00:00")) . "'";
                } else {
                    $where .= " and `order_time`>'" . strtotime('-' . intval($_GET['time']) . ' day') . "'";
                }
                $urlarr['time'] = $_GET['time'];
            }
            if ($_GET['order_state'] != "") {
                $where .= " and `order_state`='" . $_GET['order_state'] . "'";
                $urlarr['order_state'] = $_GET['order_state'];
            }
            if ($_GET['fb'] != "") {
                $where .= " and `is_invoice`='" . $_GET['fb'] . "'";
                $urlarr['fb'] = $_GET['fb'];
            }
            if ($_GET['order']) {
                $where .= " order by " . $_GET['t'] . " " . $_GET['order'];
                $urlarr['order'] = $_GET['order'];
                $urlarr['t'] = $_GET['t'];
            } else {
                $where .= " order by id desc";
            }
            $urlarr['page'] = "{{page}}";
            $pageurl = Url($_GET['m'], $urlarr, 'admin');
            $rows = $this->get_page("lietou_order", $where, $pageurl, $this->config['sy_listnum']);
            include(APP_PATH . "/config/db.data.php");
            if (is_array($rows)) {
                foreach ($rows as $k => $v) {
                    $rows[$k]['order_state_n'] = $arr_data['paystate'][$v['order_state']];
                    $rows[$k]['order_type_n'] = $arr_data['pay'][$v['order_type']];
                    $classid[] = $v['uid'];
                }
                $group = $this->obj->DB_select_all("member", "uid in (" . @implode(",", $classid) . ")", "`uid`,`username`");
                $lietou = $this->obj->DB_select_all("lietou", "`uid` in (" . @implode(",", $classid) . ")", "`uid`,`name`");
                $resume = $this->obj->DB_select_all("resume", "`uid` in (" . @implode(",", $classid) . ")", "`uid`,`name`");
                foreach ($rows as $k => $v) {
                    foreach ($lietou as $val) {
                        if ($v['uid'] == $val['uid']) {
                            $rows[$k]['comname'] = $val['name'];
                        }
                    }
                    foreach ($group as $val) {
                        if ($v['uid'] == $val['uid']) {
                            $rows[$k]['username'] = $val['username'];
                        }
                    }

                    foreach ($lt as $val) {
                        if ($v['uid'] == $val['uid']) {
                            $rows[$k]['comname'] = $val['realname'];
                        }
                    }
                    foreach ($resume as $val) {
                        if ($v['uid'] == $val['uid']) {
                            $rows[$k]['comname'] = $val['name'];
                        }
                    }
                }
            }
            $this->yunset("get_type", $_GET);
            $this->yunset("rows", $rows);
            $this->yuntpl(array('admin/admin_lie_morder'));
        }

        function morderdel_action()
        {
            $this->check_token();
            if ($_GET['del']) {
                $del = $_GET['del'];
                if (is_array($del)) {
                    $lietou_order = $this->obj->DB_select_all("lietou_order", "`id` in(" . @implode(',', $del) . ")", "`order_id`");
                    if ($lietou_order && is_array($lietou_order)) {
                        foreach ($lietou_order as $val) {
                            $order_ids[] = $val['order_id'];
                        }
                        $this->obj->DB_delete_all("invoice_record", "`order_id` in(" . @implode(',', $order_ids) . ")", "");
                        $this->obj->DB_delete_all("lietou_order", "`id` in(" . @implode(',', $del) . ")", "");
                    }
                    $this->layer_msg("充值记录(ID:" . @implode(',', $del) . ")删除成功！", 9, 1, $_SERVER['HTTP_REFERER']);
                } else {
                    $this->layer_msg("请选择您要删除的信息！", 8, 1, $_SERVER['HTTP_REFERER']);
                }
            }
            if (isset($_GET['id'])) {
                $lietou_order = $this->obj->DB_select_once("lietou_order", "`id`='" . $_GET['id'] . "'", "`order_id`");
                $this->obj->DB_delete_all("invoice_record", "`order_id`='" . $lietou_order['order_id'] . "'");
                $result = $this->obj->DB_delete_all("lietou_order", "`id`='" . $_GET['id'] . "'");
                isset($result) ? $this->layer_msg('充值记录(ID:' . $_GET['id'] . ')删除成功！', 9, 0, $_SERVER['HTTP_REFERER']) : $this->layer_msg('删除失败！', 8, 0, $_SERVER['HTTP_REFERER']);
            } else {
                $this->ACT_layer_msg("非法操作！", 8, $_SERVER['HTTP_REFERER']);
            }
        }

        function msetpay_action()
        {
            $del = (int)$_GET['id'];
            $this->check_token();
            $row = $this->obj->DB_select_once("lietou_order", "`id`='$del'");
            if ($row['order_state'] == '1' || $row['order_state'] == '3') {
                $nid = $this->upuser_statis($row);
                isset($nid) ? $this->layer_msg("充值记录(ID:" . $del . ")确认成功！", 9) : $this->layer_msg("确认失败,请销后再试！", 8);
            } else {
                $this->layer_msg("订单已确认，请勿重复操作！", 8);
            }
        }

        function morderedit_action()
        {
            $id = (int)$_GET['id'];
            $row = $this->obj->DB_select_once("lietou_order", "`id`='" . $id . "'");
            if (is_array($row)) {
                $member = $this->obj->DB_select_once('member', "`uid`='" . $row['uid'] . "'", "uid,username,usertype");
                $row['username'] = $member['username'];

                if ($member['usertype'] == '1') {
                    $resume = $this->obj->DB_select_once("resume", "`uid`='" . $member['uid'] . "'", "`uid`,`name`");
                    $row['comname'] = $resume['name'];
                } else if ($member['usertype'] == '2') {
                    $lietou = $this->obj->DB_select_once("lietou", "`uid`='" . $member['uid'] . "'", "`uid`,`name`");
                    $row['comname'] = $lietou['name'];
                }
                $orderbank = @explode("@%", $row['order_bank']);
                if (is_array($orderbank)) {
                    foreach ($orderbank as $key) {
                        $orderbank[] = $key;
                    }
                    $row['bankname'] = $orderbank[0];
                    $row['bankid'] = $orderbank[1];
                }
            }
            if ($row['coupon']) {
                $coupon = $this->obj->DB_select_once("coupon_list", "`uid`='" . $row[0]['uid'] . "' and `validity`>'" . time() . "' and `status`='1'");
                $row['price'] = number_format($row['order_price'], 2);
                $row['order_price'] = number_format($row['order_price'] - $coupon['coupon_amount'], 2);
                $coupon['coupon_amount'] = number_format($coupon['coupon_amount'], 2);
                $this->yunset("coupon", $coupon);
            }
            $this->yunset("row", $row);
            $this->yuntpl(array('admin/admin_lietou_morder_edit'));
        }

        function mordersave_action()
        {
            if ($_POST['coupon_amount']) {
                $_POST['order_price'] = $_POST['order_price'] + $_POST['coupon_amount'];
            }
            if (is_uploaded_file($_FILES['order_pic']['tmp_name'])) {
                $upload = $this->upload_pic("../data/upload/order/");
                $pictures = $upload->picture($_FILES['order_pic']);
                $this->picmsg($pictures, $_SERVER['HTTP_REFERER']);
                $pictures = str_replace("../data/upload/order", "./data/upload/order", $pictures);
            } else {
                $order = $this->obj->DB_select_once("lietou_order", "`id`='" . (int)$_POST['id'] . "'");
                $pictures = $order['order_pic'];
            }
            $r_id = $this->obj->DB_update_all("lietou_order", "`order_price`='" . $_POST['order_price'] . "',`order_remark`='" . $_POST['order_remark'] . "',`is_invoice`='" . $_POST['is_invoice'] . "',`order_pic`='" . $pictures . "'", "id='" . $_POST['id'] . "'");
            isset($r_id) ? $this->ACT_layer_msg("充值记录(ID:" . $_POST['id'] . ")修改成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1) : $this->ACT_layer_msg("修改失败,请销后再试！", 8, $_SERVER['HTTP_REFERER']);
        }

        function morderadd_action()
        {
            $comid = intval($_GET['comid']);
            $member = $this->obj->DB_select_once("member", "`uid`='" . $comid . "'", 'username');
            $this->yunset('user', array('uid' => $comid, 'username' => $member['username']));
            if (isset($_POST['insert'])) {
                $fsmsg = $_POST['fs'] == 1 ? "充值" : "扣除";
                $dingdan = mktime() . rand(10000, 99999);
                $num = $_POST['price_int'];
                $msg = $_POST['price_int'] . $this->config['integral_pricename'];
                $comid = intval($_POST['uid']);
                if ($_POST['fs'] == 1) {
                    $type = true;
                    $integral_v = "`integral`=`integral`+" . $num . "";
                    $_POST['order_type'] = "adminpay";
                    $data['type'] = 2;
                } else {//扣除
                    $statis = $this->obj->DB_select_once('comstatis', "`uid`='" . $comid . "'", "pay,integral");
                    if ($statis['integral'] < $num) {
                        $num = $statis['integral'];
                    }
                    $type = false;
                    $integral_v = "`integral`=`integral`-" . $num . "";
                    $data['order_type'] = "admincut";
                    $data['type'] = 5;
                }
                $data['order_id'] = $dingdan;
                $data['order_price'] = $num / $this->config['integral_proportion'];
                $data['order_time'] = mktime();
                $data['order_state'] = "2";
                $data['order_remark'] = $_POST['remark'];
                $data['uid'] = $comid;
                $data['integral'] = $num;
                $nid = $this->obj->DB_update_all('lietou_statis', $integral_v, "`uid`='" . $comid . "'");
                if ($nid) {
                    $this->insert_lietou_pay($num, 2, $comid, $_POST['remark'], 1, '', $type);
                    $nid = $this->obj->insert_into("lietou_order", $data);
                    $this->ACT_layer_msg("会员(ID:" . $comid . ")" . $fsmsg . $msg . "成功！", 9, $_SERVER['HTTP_REFERER'], 2, 1);
                } else {
                    $this->ACT_layer_msg($fsmsg . "失败！", 8, $_SERVER['HTTP_REFERER']);
                }
            }
            $this->yuntpl(array('admin/admin_lie_morder_add'));
        }

        function mshow_action()
        {
            $comid = intval($_GET['comid']);
            $urlarr['c'] = "mshow";
            $urlarr['comid'] = $comid;
            $urlarr["page"] = "{{page}}";
            $pageurl = Url($_GET['m'], $urlarr, 'admin');
            $this->get_page("lietou_show", "`uid`='" . $comid . "' order by sort desc", $pageurl, "12", "`title`,`id`,`picurl`,`uid`");
            $this->yuntpl(array('admin/admin_lietou_mshow'));
        }

        function mshowdel_action()
        {
            if ($_GET['id']) {
                $row = $this->obj->DB_select_once("lietou_show", "`id`='" . (int)$_GET['id'] . "'", "`picurl`");
                if (is_array($row)) {
                    unlink_pic("." . $row['picurl']);
                    $oid = $this->obj->DB_delete_all("lietou_show", "`id`='" . (int)$_GET['id'] . "'");
                }
                if ($oid) {
                    $this->layer_msg('删除成功！', 9);
                } else {
                    $this->layer_msg('删除失败！', 8);
                }
            }
        }

        function mshowadd_action()
        {
            $this->yuntpl(array('admin/admin_lietou_mshowadd'));
        }

        function mshowsave_action()
        {
            if ($_POST['submitbtn']) {
                $pid = pylode(',', $_POST['id']);
                $comid = intval($_POST['comid']);
                $lietou_show = $this->obj->DB_select_all("lietou_show", "`id` in (" . $pid . ") and `uid`='" . $comid . "'", "`id`");
                if ($lietou_show && is_array($lietou_show)) {
                    foreach ($lietou_show as $val) {
                        $title = $_POST['title_' . $val['id']];
                        $this->obj->update_once("lietou_show", array("title" => trim($title)), array("id" => (int)$val['id']));
                    }
                    $this->ACT_layer_msg("保存成功！", 9, 'index.php?m=admin_lietou&c=mshow&comid=' . $comid);
                } else {
                    $this->ACT_layer_msg("非法操作！", 8, 'index.php?m=admin_lietou&c=mshow&comid=' . $comid);
                }
            } else {
                $this->ACT_layer_msg("非法操作！", 8, 'index.php?m=admin_lietou&c=mshow&comid=' . $comid);
            }
        }

        function mshowedit_action()
        {
            $picurl = $this->obj->DB_select_once("lietou_show", "`id`='" . (int)$_GET['id'] . "' and `uid`='" . (int)$_GET['comid'] . "'", "`picurl`,`title`,`sort`");
            $this->yunset("picurl", $picurl);
            $this->yuntpl(array('admin/admin_lietou_mshowedit'));
        }

        function mshowup_action()
        {
            if ($_POST['submitbtn']) {
                $time = time();
                unset($_POST['submitbtn']);
                if (!empty($_FILES['uplocadpic']['tmp_name'])) {
                    $upload = $this->upload_pic("../data/upload/show/", false);
                    $uplocadpic = $upload->picture($_FILES['uplocadpic']);
                    $this->picmsg($uplocadpic, $_SERVER['HTTP_REFERER']);
                    $uplocadpic = str_replace("../data/upload/show", "./data/upload/show", $uplocadpic);
                    $row = $this->obj->DB_select_once("lietou_show", "`uid`='" . (int)$_POST['uid'] . "' and `id`='" . intval($_POST['id']) . "'", "`picurl`");
                    if (is_array($row)) {
                        unlink_pic("." . $row['picurl']);
                    }
                } else {
                    $uplocadpic = $_POST['picurl'];
                }
                $nid = $this->obj->DB_update_all("lietou_show", "`picurl`='" . $uplocadpic . "',`title`='" . $_POST['title'] . "',`sort`='" . $_POST['showsort'] . "',`ctime`='" . $time . "'", "`uid`='" . (int)$_POST['uid'] . "'and `id`='" . $_POST['id'] . "'");
                if ($nid) {
                    $this->ACT_layer_msg("更新成功！", 9, 'index.php?m=admin_lietou&c=mshow&comid=' . (int)$_POST['uid']);
                } else {
                    $this->ACT_layer_msg("更新失败！", 8, 'index.php?m=admin_lietou&c=mshow&comid=' . (int)$_POST['uid']);
                }
            }
        }

        function mcomtpl_action()
        {
            $comid = intval($_GET['comid']);
            $list = $this->obj->DB_select_all("lietou_tpl", "`status`='1' and (`service_uid`='0' or FIND_IN_SET('" . $comid . "',service_uid)) order by id desc");
            $this->yunset("list", $list);
            $this->yunset("comid", $comid);
            $statis = $this->obj->DB_select_once("lietou_statis", "`uid`='" . $comid . "'", "`comtpl`");
            $this->yunset('statis', $statis);
            $this->yuntpl(array('admin/admin_lietou_mcomtpl'));
        }

        function msettpl_action()
        {
            $this->check_token();
            $tpl = $this->obj->DB_select_once("lietou_tpl", "`id`='" . intval($_GET['id']) . "'", "`url`");
            $oid = $this->obj->update_once("lietou_statis", array("comtpl" => $tpl['url']), array("uid" => intval($_GET['comid'])));
            if ($oid) {
                $this->layer_msg('设置成功！', 9);
            } else {
                $this->layer_msg('设置失败！', 9);
            }
        }

        function guwen_action()
        {
            $lietou = $this->obj->DB_select_once("lietou", "`uid`='" . $this->uid . "'");

            $guweninfo = $this->obj->DB_select_all("lietou_consultant", "`id`");
            $this->yunset($lietou);
            $this->yunset($guweninfo);

        }

        function reset_lietoupassword_action()
        {
            $this->check_token();
            $data['password'] = "123456";
            $data['uid'] = $_GET['uid'];
            $this->uc_edit_pw($data, 1, $_SERVER['HTTP_REFERER']);
            $this->admin_log("猎头会员（ID:" . $_GET['uid'] . "）重置密码成功");
            echo "1";
        }

}
?>