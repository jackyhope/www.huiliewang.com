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
class parse_controller extends lietou
{
    //电话
    public  $template_tel = array(  "手机号", "手机号码","电话号码", "手机","固话","座机", "tel", "phone", "mobile", "telephone", "电话", "宿舍电话");
    //邮箱
    public $template_mail =  array("邮件", "邮箱", "邮箱号", "邮箱号码", "邮箱地址", "电子邮件", "电子邮箱", "e-mail", "email", "mail", "mailbox");
    //公司
    public $template_companyname = array("公司", "公司名称", "企业名称", "单位名称");
    //性别
    public $sex = array("男", "女");
    //学历
    public $template_education = array("最高学历", "教育程度", "学历", "学历层次", "学历等级");
    //学校
    public $template_school = array("毕业院校", "毕业学校", "学校", "学院", "教育经历");

    //具体学校
    public $template_college = array("大学", "学校", "院校", "技校", "学院");

    //出生日期
    public $template_birthday = array("生日", "年龄", "出生年月", "出生日期");
    //所在地
    public $template_location = array("现居住地", "现居住城市", "所在地", "居住地", "地址", "目前所在地","所在城市");
    //期望行业
    public $template_trade  =   array("行业", "职业发展意向", "期望从事行业","期望行业","希望行业");
    //学历
    public $template_xueli = array("初中", "高中", "中技", "中专", "大专", "本科", "硕士", "博士", "博后");
    //期望工作地
    public $template_workadress = array("工作地点", "期望工作地区", "工作地区", "目标地点", "期望地点");
    //求职状态
    public $template_current  = array("目前状态", "目前状况", "目前职业概况", "求职状态", "目前求职状态");
    //当前职位
    public $template_work = array("职位", "目前职业", "当前职位", "所任职位");
    //期望职位
    public $template_work_cn = array("期望职业", "期望职位", "目标职能", "期望从事职业","期望从事职位");



    public $template_salary = array("期望薪资", "期望年资");
    public $arr_edu = array("14"=>"大专", "15"=>"本科","16"=>"硕士","205"=>"MBA","206"=>"EMBA","17"=>"博士","204"=>"博士后");

    public $template_company = array("有限责任公司", "股份有限公司","公司");
    public $template_position = array("专员", "总监","经理","主管","分析师","经纪人","行长","柜员","厂长","工程师","医生","主任","助理","顾问","教授","教师","校长","部长","教练","公务员","干部","设计师","分析师","司机","业务员","管理员","销售代表","交易员");

    //项目所在公司
    public $object_company = array("所在公司","所在单位","所在企业");

    //项目业绩
    public $object_yj = array("项目业绩");
    //项目职责
    public $object_duty = array("项目职责");
    //项目描述
    public $object_des = array("项目描述","责任描述");


    public $work_exp = array('startDateStr'=>'','endDateStr'=>'','edate'=>'','companyName'=>'','posName'=>'','content'=>'','companyDes'=>'','workDes'=>'');
    public $object_exp = array('subCompany'=>'','edate'=>'','startDateStr'=>'','endDateStr'=>'','proName'=>'','projectOffice'=>'','subCompany'=>'','projectPerfromnance'=>'','projectRole'=>'','content'=>'','proDes'=>'','proPerTip'=>'');

    public $edu_exp = array('content'=>'','edate'=>'','startDateStr'=>'','endDateStr'=>'','schoolName'=>'','majorName'=>'','degree'=>'');


//    public $object_duty = array("项目职责");

    public $base_content = array("name"=>"","sex"=>"","birthday"=>"","email"=>"","telphone"=>"","edu"=>"","exp"=>"","living"=>"","hy"=>"","job_classid"=>"","provinceid"=>"","wage_current"=>"","wage_hope"=>"","workExp"=>"","object_content"=>"","eduExps"=>"","content"=>"","introduce"=>"","extraInfo"=>"");
    function index_action()
    {



//        echo json_encode($data);exit();

        if($_FILES){
            $file = $_FILES['file'];
            $type =  end(explode('.', $file['name']));
            $path = "/resume_file/".time().".".$type;
            $upload_path_name =  $_SERVER['DOCUMENT_ROOT']."/resume_file/".time().".".$type;
            $complete_path = time().".".$type;
            if(move_uploaded_file($file['tmp_name'],$upload_path_name)){
                if($type=="doc"||$type=="docx"){
                    $url = "http://www.chuntianlaile.com/wordMht.php";
                    $path = "@".$_SERVER['DOCUMENT_ROOT'].$path;
                    $post_data = array("file"=>$path);
                    $ch = curl_init();
                    curl_setopt($ch , CURLOPT_URL , $url);
                    curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch , CURLOPT_POST, 1);
                    curl_setopt($ch , CURLOPT_POSTFIELDS, $post_data);
                    $output = curl_exec($ch);
                    curl_close($ch);
                    $encode = mb_convert_encoding($output,"gbk","UTF-8");
                    $content = mb_convert_encoding($output, "gbk", $encode);
                    $content = str_replace("?"," ",$content);
                    $content = str_replace("<br />","\n",$content);
                    $content = str_replace("\r","\n",$content);

//                    $content = shell_exec('/usr/local/bin/antiword -m UTF-8 '.$_SERVER['DOCUMENT_ROOT']."/resume_file/".$complete_path);
//                    $content = mb_convert_encoding($content, "gbk", "utf-8");
                }elseif ($type=="html" || $type=="htm" || $type=="txt"){
                    $handle = fopen($_SERVER['DOCUMENT_ROOT']."/resume_file/".$complete_path, "rb");
                    $content = stream_get_contents($handle);
                    $content = str_replace("</tr>","\n</tr>",$content);
                    $content = str_replace("&nbsp;","",strip_tags($this->remove_html($content)));
                    $encode = mb_detect_encoding($content, array('ASCII','UTF-8','GB2312','GBK','BIG5'));
                    $content = mb_convert_encoding($content, "gbk", $encode);

                }
//                elseif ($type=="docx"){
//                    require_once "docx.class.php";
//                    // 实例化
//                    $text = new Docx2Text();
//                    // 加载docx文件
//                    $text->setDocx($_SERVER['DOCUMENT_ROOT']."/resume_file/".$complete_path);
//                    // 将内容存入$docx变量中
//                    $docx = $text->extract();
//                    $content = mb_convert_encoding($docx, "gbk", "utf-8");
//                    // 调试输出
//                }

                $this->parse_action($content);exit();
            }else{
                echo 2;
            }
            exit();
        }
    }



    function closest_word($input, $words) {
        $shortest = -1;
        foreach ($words as $word) {
            $lev = levenshtein($input, $word);
            if ($lev == 0) {
                $closest = $word;
                $shortest = 0;
                break;
            }
            if ($lev <= $shortest || $shortest < 0) {
                $closest = $word;
                $shortest = $lev;
            }
        }
        return $closest;
    }

    function parse_action($str=""){
        include PLUS_PATH."/job.cache.php";
        include PLUS_PATH."/city.cache.php";
        include PLUS_PATH."/industry.cache.php";
        $recity_name = array_flip($city_name);
        $rejob_name = array_flip($job_name);
        if(empty($str)){
            $str = $_POST['resumeContent']?$_POST['resumeContent']:$this->error_msg("参数错误");
            $str = mb_convert_encoding($str, "gbk", "utf-8");
        }

//        $str = str_replace("（","(",$str);
        $str = str_replace("\n\n","\n",$str);
        $str = str_replace("\n\n","\n",$str);
        $str = str_replace("\n\n","\n",$str);
        $str = str_replace("\n\n","\n",$str);
//        echo $str;exit();
        $char1 = substr_count($str,"|");
        $char2 = substr_count($str,"?");
//	    if($char1>10){
//	        $str = str_replace("|","",$str);
//        }

//        if($char2>10){
//            $str = str_replace("?","",$str);
//        }
        preg_match("/([a-z0-9\-_\.]+@[a-z0-9]+\.[a-z0-9\-_\.]+)+/i",$str,$email);
        if($email){
            $this->base_content['email'] =   $email[0];//***
        }
//        $str = str_replace("    ","",$str);
        $arr = array_values(array_filter(explode("\n",$str)));
        $str_n = str_replace("年",".",$str);
        $str_n = str_replace("月","",$str_n);
        $preg = "/19\d{2}(\/|.)\d{1,2}/";
        preg_match_all($preg,$str_n,$result);
        if($result){
            $birthday = $this->replaceAll($result[0][0]);
            $birthday = str_replace("|","-",$birthday);
            $birth_arr = explode("-",$birthday);
            if($birth_arr[1]<13){
                $this->base_content['birthday'] = $birthday;
            }

        }

        if(strpos($str,"\n自我评价")){
            $intro_offest = strpos($str,"自我评价");
        }

        if(strpos($str,"\n附加信息")){
            $ext_offest = strpos($str,"附加信息");
        }

        if($ext_offest && $intro_offest){
            $length = $ext_offest-$intro_offest;
        }

        if($intro_offest){
            if($length){
                $intro_content = substr($str,$intro_offest,$length);
            }else{
                $intro_content = substr($str,$intro_offest);
            }
            $intro_content = str_replace("自我评价","",$intro_content);
            $this->base_content['introduce'] =$intro_content;
        }

        if($ext_offest){
            if($length){
                $ext_content = substr($str,$ext_offest,$length);
            }else{
                $ext_content = substr($str,$ext_offest);
            }

            $ext_content = str_replace("附加信息","",$ext_content);

            $this->base_content['extraInfo'] =$ext_content;
        }



        foreach ($arr as $key=>$list){
            if($this->myTrim($list)){

                if(strpos($this->myTrim($list),"姓名") !== false && empty($this->base_content['name'])){

                    $li = $this->split_line($this->myTrim($list),"姓名");
                    if(count($li)>1){
                        $this->base_content['name'] = str_replace("性别","",$li[1]);
                    }else{
                        $this->base_content['name'] =$arr[$key+1];
                    }

                }

                if(strpos($this->myTrim($list),"姓名") !== false && empty($this->base_content['name'])){
                    $list_n = str_replace("姓","",$list);
                    $list_n = str_replace("名","",$list_n);
                    $li = $this->split_line($list_n,"姓名");
                    if(count($li)>1){
                        $this->base_content['name'] = $li[0];
                    }else{
                        $this->base_content['name'] =$arr[$key+1];
                    }

//                    echo $li[0];exit();
                }



                if(strpos($this->myTrim($list),"年龄") !== false && empty($this->base_content['birthday'])){

                    $li = $this->split_line($list,"年龄");

                    foreach ($li as $l){
                        if($this->findNum($l) && empty($this->base_content['birthday'])){
                            $this->base_content['birthday'] = (date("Y")-$this->findNum($l))."-01";
                        }
                    }
                }

                if(strpos($this->myTrim($list),"性别") !== false && empty($this->base_content['sex'])){
                    $li = $this->split_line($this->myTrim($list),"性别");
                    $this->base_content['sex'] = $li[1];
                }


                if($this->strpos_line($this->sex,$this->myTrim($list)) && empty($this->base_content['sex'])){
//                    $li = $this->split_line($list,$this->sex);
                    $this->base_content['sex'] = $this->strpos_line($this->sex,$this->myTrim($list));

                }



                if(strpos($this->myTrim($list),"岁") !== false && empty($this->base_content['birthday'])){
                    $li = explode("岁",$this->myTrim($list));
                    if($li[0]){
                        $birthday = substr($li[0],-3);
                        $birthday = $this->findNum($birthday);
                        $this->base_content['birthday'] = (date("Y")-$birthday)."-01";
                    }
                }


                if($this->strpos_line($this->template_tel,$this->myTrim($list)) && empty($this->base_content['telphone'])){
                    $li = $this->split_line($list,$this->template_tel);

                    if($this->isTel($li[1])){
                        $this->base_content['telphone'] = $li[1];
                    }
                }


                if($this->strpos_line($this->template_education,$this->myTrim($list)) && empty($this->base_content['edu'])){

                    $li = $this->split_line($list,$this->template_education);

                    if(count($li)>1){
                        $this->base_content['edu'] = $li[1];
                        $this->base_content['edu_n'] = $this->key_line($li[1],$this->arr_edu);
                    }else{

                        $this->base_content['edu'] = $arr[$key+1];
                        $this->base_content['edu_n'] = $this->key_line($arr[$key+1],$this->arr_edu);
                    }


                }

                if($this->strpos_line($this->arr_edu,$this->myTrim($list)) && empty($this->base_content['edu'])){
                    $li = $this->split_line($list,$this->arr_edu);
                    $this->base_content['edu'] = $li[0];

                }

                if(strpos($this->myTrim($list),"工作年限") !== false && empty($this->base_content['exp'])){
                    $li = $this->split_line($list,"工作年限");
                    $this->base_content['exp'] = $this->findNum($li[1])?$this->findNum($li[1]):$this->chrtonum($li[1]);
//                    $this->base_content['exp'] = $this->chrtonum($li[1]);
                }


                if(strpos($this->myTrim($list),"工作经验") !== false && empty($this->base_content['exp'])){
                    $li = $this->split_line($list,"工作经验");
                    $this->base_content['exp'] = $li[0];
                }


                if($this->strpos_line($this->template_location,$this->myTrim($list)) && empty($this->base_content['living'])){

                    $li = $this->split_line($this->myTrim($list),$this->template_location);
                    if(count($li)>1){
                        $li[1] = str_replace("市","",$li[1]);
                        $this->base_content['living_name'] = str_replace("省","",$li[1]);
                    }else{
                        $obj_arr = explode("|",$this->replaceAll($arr[$key+1]));
                        $obj_arr[0] = str_replace("市","",$obj_arr[0]);
                        $this->base_content['living_name'] = str_replace("省","",$obj_arr[0]);
                    }

                    $this->base_content['living'] = $recity_name[$this->base_content['living_name']];
                }

                if($this->strpos_line($this->template_trade,$this->myTrim($list)) && empty($this->base_content['hy'])){
                    $li = $this->split_line($list,$this->template_trade);
                    if(count($li)>1){
                        $this->base_content['hy'] =$this->closest_word($li[1],$industry_name);
                    }else{
                        $this->base_content['hy'] =$this->closest_word($li[1],$arr[$key+1]);
                    }

//                    $this->base_content['hy'] = $li[1];
                }

                if($this->strpos_line($this->template_work_cn,$this->myTrim($list)) && empty($this->base_content['job_classid'])){
                    $work_cn = str_replace("，",",",$list);
                    $work_cn = str_replace(";",",",$work_cn);

                    $li = trim($this->remove_line($work_cn,$this->template_work_cn));
                    $work_arr = explode(",",$li);
                    $job_class = "";
                    $job_classid = "";
                    foreach ($work_arr as $l){
                        $job_class[] = $this->closest_word($l,$job_name);
                        $job_classid[] = $rejob_name[$this->closest_word($l,$job_name)];
                    }
                    $this->base_content['job_class'] =implode(",",$job_class);

                    $this->base_content['job_classid'] =implode(",",$job_classid);
//                    $this->base_content['job_classid'] = $li[1];
                }

                if($this->strpos_line($this->template_workadress,$this->myTrim($list)) && empty($this->base_content['provinceid'])){
                    $city_cn = str_replace("，",",",$list);
                    $li = trim($this->remove_line($city_cn,$this->template_workadress));

                    $city_arr = explode(",",$li);
                    $city_class = "";
                    $city_classid = "";
                    foreach ($city_arr as $l){
                        $city_class[] = $this->closest_word($l,$city_name);
                        $city_classid[] = $recity_name[$this->closest_word($l,$city_name)];
                    }

                    $this->base_content['provinceid_name'] = implode(",",$city_class);
                    $this->base_content['provinceid'] = implode(",",$city_classid);
                }

                if($this->strpos_line($this->template_salary,$this->myTrim($list)) && empty($this->base_content['wage_hope'])){
                    $li = $this->split_line($list,$this->template_salary);
                    if(count($li)>1){
                        preg_match_all('/\d+/',$li[1],$arrs);
                    }else{
                        preg_match_all('/\d+/',$arr[$key+1],$arrs);
                    }

                    $this->base_content['wage_hope'] = $arrs[0][0];
                }

                if(strpos($this->myTrim($list),"目前年薪") !== false && empty($this->base_content['wage_current'])){
                    $li = $this->split_line($list,"目前年薪");
                    if(count($li)>1){
                        preg_match_all('/\d+/',$li[1],$arrs);
                    }else{
                        preg_match_all('/\d+/',$arr[$key+1],$arrs);
                    }
                    $this->base_content['wage_current'] = $arrs[0][0];
                }
//                $base_content[] = $list;
            }
        }

        if(empty($this->base_content['telphone'])){
            preg_match_all("/1[34578]\d{9}/",$str,$mobiles);
            $this->base_content['telphone'] = $mobiles[0];
        }

        $str = str_replace("年工作经验","年工作年限",$str);
        $str = str_replace("工 作 经 验","工作经验",$str);
        $str = str_replace("教 育 经 历","教育经验",$str);
        $str = str_replace("项 目 经 历","项目经验",$str);
        $str = str_replace("培 训 经 历","培训经验",$str);
        if(strpos($str,"\n工作经验")){
            $work_offest = strpos($str,"工作经验");
        }elseif(strpos($str,"\n工作经历")){
            $work_offest = strpos($str,"工作经历");
        }elseif(strpos($str,"工作经验")){
            $work_offest = strpos($str,"工作经验");
        }else{
            $work_offest = strlen($str);
        }

        if(strpos($str,"项目经验")){
            $object_offest = strpos($str,"项目经验");
        }elseif(strpos($str,"项目经历")){
            $object_offest = strpos($str,"项目经历");
        }else{
            $object_offest = strlen($str);
        }

        if(strpos($str,"教育经验")){
            $edu_offest = strpos($str,"教育经验");
        }elseif(strpos($str,"教育经历")){
            $edu_offest = strpos($str,"教育经历");
        }elseif(strpos($str,"教育背景")){
            $edu_offest = strpos($str,"教育背景");
        }else{
            $edu_offest = strlen($str);
        }




        $txt_content['object'] = $object_offest;
        $txt_content['edu'] = $edu_offest;
        $txt_content['work'] = $work_offest;

        sort($txt_content);


        $work_content = $this->work_parse($work_offest,$txt_content,$str);
        $edu_content = $this->edu_parse($edu_offest,$txt_content,$str);
        $object_content = $this->object_parse($object_offest,$txt_content,$str);



        $this->base_content['workExp'] = $work_content;
        $this->base_content['eduExps'] = $edu_content;
        $this->base_content['proExp'] = $object_content;
        $this->base_content['content'] = $str;
//        var_dump($this->base_content);exit();
        $base_content = $this->m_iconv("gbk",'UTF-8',$this->base_content);

        echo json_encode($base_content,true);exit();
        $this->base_content;
//        var_dump($object_content);exit();

    }

    //公司解析
    function work_parse($work_offest,$txt_content,$str){
        if($work_offest==$txt_content[0]){
            $length = $txt_content[1]-$txt_content[0];
        }elseif ($work_offest==$txt_content[1]){
            $length = $txt_content[2]-$txt_content[1];
        }elseif ($work_offest==$txt_content[2]){
            $length = "";
        }

        if($length){
            $work_str = substr($str,$work_offest,$length);
        }else{
            $work_str = substr($str,$work_offest);
        }
//        echo $work_str;exit();
        $work_str = str_replace("- -","-",$work_str);
        $work_str = str_replace("--","-",$work_str);
        $work_str = str_replace("–","-",$work_str);
        $work_str = str_replace("－","-",$work_str);
        $work_str = str_replace(" - ","-",$work_str);
        $work_str = str_replace("工作经历","",$work_str);
        $work_str = str_replace("工作经验","",$work_str);


        $work_str = str_replace("年",".",$work_str);
        $work_str = str_replace("月","",$work_str);
        $work_arr = $work_str;

        $work_arrs = "";
        $preg = "/\d{4}(\/|.)\d{1,2}-/";
        $preg1 = "/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/";
        preg_match_all($preg,$work_str,$work_var);

        if($work_var[0]){
            foreach ($work_var[0] as $key=>$li){

                $arr = explode($li,$work_arr);

                $work_arr = $li.$arr[1];
                $work_arrs[] = $arr[0];
                if(($key+1)==count($work_var[0])){
                    $work_arrs[] =$work_arr;
                }
            }
        }

        $work_content = "";
        foreach ($work_arrs as $key=>$list){
//            var_dump($list);exit();
            $work_content[$key] = $this->work_exp;

            if(strpos($this->myTrim($list),"工作描述")){
                $li = explode("工作描述",$this->myTrim($list));
                $work_content[$key]['workDes'] = $li[1];
            }else{
                $work_content[$key]['workDes'] = str_replace("|","",$list);
            }

            if(preg_match("/\d{4}(\/|.)\d{1,2}-/",$list)){

                if(preg_match("/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/",$list)){
                    preg_match_all($preg1,$list,$time_stage);
                    $work_content[$key]['edate'] = $time_stage[0][0];
                    $edate = explode("-",$work_content[$key]['edate']);
                    $work_content[$key]['startDateStr'] =$edate[0];
                    $work_content[$key]['endDateStr'] =$edate[1];

                }else{
                    preg_match_all($preg,$list,$time_stage);
                    $work_content[$key]['edate'] = $time_stage[0][0].date("Y.m");
                    $edate = explode("-",$work_content[$key]['edate']);
                    $work_content[$key]['startDateStr'] =$edate[0];
                    $work_content[$key]['endDateStr'] =$edate[1];

                }

            }


            if((strpos($this->myTrim($list),"有限责任公司") || strpos($this->myTrim($list),"股份有限公司")|| strpos($this->myTrim($list),"有限公司"))){
//                echo $list;exit();
                $lists = array_filter(explode("|",$this->replaceAll($list)));

                foreach ($lists as $li){
                    if((strpos($this->myTrim($li),"有限责任公司") || strpos($this->myTrim($li),"股份有限公司") || strpos($this->myTrim($li),"有限公司")) && empty($work_content[$key]['companyName'])){
                        $work_content[$key]['companyName'] = $li;
                    }
                }

            }

            if(empty($work_content[$key]['companyName']) && $work_content[$key]['endDateStr']){
                $datetime = $work_content[$key]['endDateStr'];
                if($datetime==date("Y.m")){
                    $datetime = "至今";
                }
                $comname = explode($datetime,$list);
//                $comname = explode($work_content[$key]['endDateStr'],$list);
                $proName = $this->trim_arr(str_replace("：","",$comname[1]));
                $work_content[$key]['companyName'] =$proName[0];
            }



            if($this->strpos_line($this->template_position,$this->myTrim($list))){
                $lists = array_filter(explode("|",$this->replaceAll($list)));
                $posName = "";
                foreach ($lists as $li){
                    if($this->strpos_line($this->template_position,$this->myTrim($li)) && empty($posName)){

                        $jobname =$this->trim_arr($li);
                        $work_content[$key]['posName'] = $jobname[0];
//                        $work_content[$key]['posName'] = $li;
                        $posName = $li;
                        $position = strpos($list,$posName);
                        $surplus = substr($list,$position);
//                        echo $surplus;exit();
                    }
                }
            }


            if($work_content[$key]['posName'] && empty($work_content[$key]['describe'])){
                $describe = explode($work_content[$key]['posName'],$list);
                $work_content[$key]['workDes'] = $describe[1];
//                str_replace("\t","",$describe[1]);
            }

            if(empty($work_content[$key]['edate'])){
                $work_content[$key] = "";
            }else{

                $startDateStr = $this->replaceAll($work_content[$key]['startDateStr']);
                $work_content[$key]['startDateStr'] = str_replace("|","-",$startDateStr);
                $endDateStr = $this->replaceAll($work_content[$key]['endDateStr']);
                $work_content[$key]['endDateStr'] = str_replace("|","-",$endDateStr);
            }

            if(strlen($list)<100){
                $work_content[$key] = "";
            }

        }
//        var_dump(array_filter($work_content));exit();
        return array_filter($work_content);
    }


    function branch_str($li,$arr){
        foreach ($arr as $list){
            if(strpos($list,$li)!==false){
                return $list;
            }
        }
    }


    //教育解析
    function edu_parse($edu_offest,$txt_content,$str){
        if($edu_offest==$txt_content[0]){
            $length = $txt_content[1]-$txt_content[0];
        }elseif ($edu_offest==$txt_content[1]){
            $length = $txt_content[2]-$txt_content[1];
        }elseif ($edu_offest==$txt_content[2]){
            $length = "";
        }

        if($length){
            $edu_str = substr($str,$edu_offest,$length);
        }else{
            $edu_str = substr($str,$edu_offest);
        }

        if(strpos($edu_str,"培训经验")){
            $edu_str = explode("培训经验",$edu_str);
            $edu_str = $edu_str[0];
        }elseif(strpos($edu_str,"培训经历")){
            $edu_str = explode("培训经历",$edu_str);
            $edu_str = $edu_str[0];
        }

        $edu_str = str_replace("- -","-",$edu_str);
        $edu_str = str_replace("—","-",$edu_str);
        $edu_str = str_replace("–","-",$edu_str);
        $edu_str = str_replace(" - ","-",$edu_str);
        $edu_str = str_replace("--","-",$edu_str);
        $edu_str = str_replace("教育经历","",$edu_str);
        $edu_str = str_replace("教育经验","",$edu_str);
        $edu_str = str_replace("教育背景","",$edu_str);

        $edu_str = str_replace("年",".",$edu_str);
        $edu_str = str_replace("月","",$edu_str);
        $edu_arr = $edu_str;
        $edu_arrs = "";
        $preg = "/\d{4}(\/|.)\d{1,2}-/";
        $preg1 = "/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/";
        preg_match_all($preg,$edu_str,$edu_var);

        if($edu_var[0]){

            foreach ($edu_var[0] as $key=>$li){
                $edu_arr_n = explode("\n",$edu_arr);
//                $branch = "";
//                foreach ($edu_arr_n as $list){
//                    if(strpos($li,$list)!==false){
//                        $branch = $list;
//                    }
//                }
//                echo $branch;exit();
                $branch = $this->branch_str($li,$edu_arr_n);
                $arr = explode($branch,$edu_arr);
                $edu_arr = $branch.$arr[1];
                $edu_arrs[] = $arr[0];
                if(($key+1)==count($edu_var[0])){
                    $edu_arrs[] =$edu_arr;
                }
            }
        }

        $edu_content = "";
        foreach ($edu_arrs as $key=>$list){
            $edu_content[$key] = $this->edu_exp;
            $edu_content[$key]['content'] = str_replace("|","",$list);
            if(preg_match("/\d{4}(\/|.)\d{1,2}-/",$list)){
                if(preg_match("/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/",$list)){
                    preg_match_all($preg1,$list,$time_stage);
                    $edu_content[$key]['edate'] = $time_stage[0][0];
                    $edate = explode("-",$edu_content[$key]['edate']);
                    $edu_content[$key]['startDateStr'] =$edate[0];
                    $edu_content[$key]['endDateStr'] =$edate[1];
                }else{
                    preg_match_all($preg,$list,$time_stage);
                    $edu_content[$key]['edate'] = $time_stage[0][0].date("Y.m");
                    $edate = explode("-",$edu_content[$key]['edate']);
                    $edu_content[$key]['startDateStr'] =$edate[0];
                    $edu_content[$key]['endDateStr'] =$edate[1];
                }
//                echo  $edu_content[$key]['endDateStr'];exit();
            }

            if($this->strpos_line($this->template_college,$this->myTrim($list))){

                $li = $this->split_line($list,$this->template_college);
                if(count($li)>1){
                    $edu_content[$key]['schoolName'] = $li[0];
                }else{
                    $edu_content[$key]['schoolName'] = $edu_arrs[$key+1];
                }

//                echo $edu_content[$key]['schoolName']."---".$key;exit();
            }

            if(strpos($this->myTrim($list),"专业") !== false){
                $li = $this->split_line($list,"专业");
                if(count($li)>1){
                    $edu_content[$key]['majorName'] = $li[1];
                }else{
                    $edu_content[$key]['majorName'] = $edu_arrs[$key+1];
                }

            }

            if($edu_content[$key]['schoolName'] && empty($edu_content[$key]['majorName'])){
                $arr = explode($edu_content[$key]['schoolName'],str_replace("|","",$list));
                $arr1 = $this->trim_arr($arr[1]);
                $edu_content[$key]['majorName'] =$arr1[0];

            }

            if(strpos($this->myTrim($list),"学历") !== false){
                $li = $this->split_line($list,"学历");
                if(count($li)>1){
                    $edu_content[$key]['degree'] = $li[1];
                }else{
                    $edu_content[$key]['degree'] = $edu_arrs[$key+1];
                }
            }



            if(empty($edu_content[$key]['degree'])){
                if($this->strpos_line($this->template_xueli,$this->myTrim($list))){

                    $li = $this->split_line($list,$this->template_xueli);
                    $edu_content[$key]['degree'] = $li[0];
                }
            }


            if(empty($edu_content[$key]['edate']) || empty($edu_content[$key]['schoolName'])){
                $edu_content[$key] = "";
            }else{
                $startDateStr = $this->replaceAll($edu_content[$key]['startDateStr']);
                $edu_content[$key]['startDateStr'] = str_replace("|","-",$startDateStr);
                $endDateStr = $this->replaceAll($edu_content[$key]['endDateStr']);
                $edu_content[$key]['endDateStr'] = str_replace("|","-",$endDateStr);
            }
        }

        return array_filter($edu_content);
    }


    //项目解析
    function object_parse($object_offest,$txt_content,$str){
        if($object_offest==$txt_content[0]){
            $length = $txt_content[1]-$txt_content[0];
        }elseif ($object_offest==$txt_content[1]){
            $length = $txt_content[2]-$txt_content[1];
        }elseif ($object_offest==$txt_content[2]){
            $length = "";
        }

        if($length){
            $object_str = substr($str,$object_offest,$length);
        }else{
            $object_str = substr($str,$object_offest);
        }


        $object_str = str_replace("- -","-",$object_str);
        $object_str = str_replace("—","-",$object_str);
        $object_str = str_replace("－","-",$object_str);
        $object_str = str_replace("--","-",$object_str);
        $object_str = str_replace("–","-",$object_str);
        $object_str = str_replace(" - ","-",$object_str);
        $object_str = str_replace("项目经历","",$object_str);
        $object_str = str_replace("项目经验","",$object_str);

        $object_str = str_replace("年",".",$object_str);
        $object_str = str_replace("月","",$object_str);


        $object_arr = $object_str;
        $object_arrs = "";
        $preg = "/\d{4}(\/|.)\d{1,2}-/";
        $preg1 = "/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/";
        preg_match_all($preg,$object_str,$object_var);

        if($object_var[0]){
            foreach ($object_var[0] as $key=>$li){
                $arr = explode($li,$object_arr);
                $object_arr = $li.$arr[1];
                $object_arrs[] = $arr[0];
                if(($key+1)==count($object_var[0])){
                    $object_arrs[] =$object_arr;
                }
            }
        }

        $object_content = "";
        foreach ($object_arrs as $key=>$list){
            $list = str_replace("至今",date("Y.m"),$list);
            $object_content[$key] = $this->object_exp;

            if($this->strpos_line($this->object_des,$this->myTrim($list))){
                $li = $this->arr_line($this->object_des,$this->myTrim($list));
                $object_content[$key]['proDes'] = $li[1];
            }else{
                $object_content[$key]['proDes'] = str_replace("|","",$list);
            }
            

//            $object_content[$key]['proDes'] = str_replace("|","",$list);
            if(preg_match("/\d{4}(\/|.)\d{1,2}-/",$list)){
                if(preg_match("/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/",$list)){
                    preg_match_all($preg1,$list,$time_stage);
                    $object_content[$key]['edate'] = $time_stage[0][0];
                    $edate = explode("-",$object_content[$key]['edate']);
                    $object_content[$key]['startDateStr'] =$edate[0];
                    $object_content[$key]['endDateStr'] =$edate[1];
                }else{
                    preg_match_all($preg,$list,$time_stage);
                    $object_content[$key]['edate'] = $time_stage[0][0].date("Y.m");
                    $edate = explode("-",$object_content[$key]['edate']);
                    $object_content[$key]['startDateStr'] =$edate[0];
                    $object_content[$key]['endDateStr'] =$edate[1];

                }
            }



            if(strpos($list,"项目业绩")!==false){
                $yj_offest = strpos($list,"项目业绩");
            }

            if(strpos($list,"项目职责")!==false){
                $duty_offest = strpos($list,"项目职责");
            }

            if(strpos($list,"项目描述")!==false){
                $describe_offest = strpos($list,"项目描述");
            }

            if($this->strpos_line($this->template_position,$this->myTrim($list))){

                $lists = array_filter(explode("|",$this->replaceAll($list)));
                $posName = "";
                foreach ($lists as $li){
                    if($this->strpos_line($this->template_position,$this->myTrim($li)) && empty($posName)){

                        $object_content[$key]['projectOffice'] = $li;
                        $posName = $li;
                    }
                }
            }




            if($this->strpos_line($this->object_company,$this->myTrim($list))){
                $lists = array_filter(explode("|",$this->replaceAll($list)));
                $posName = "";
                foreach ($lists as $li){
                    if($this->strpos_line($this->object_company,$this->myTrim($li)) && empty($posName)){
                        $li = $this->split_line($list,$this->object_company);
                        if(count($li)>1){
                            $object_content[$key]['subCompany'] = $li[1];
                        }else{
                            $object_content[$key]['subCompany'] = $object_arrs[$key+1];
                        }
                    }

                }
            }

            if($this->strpos_line($this->object_company,$this->myTrim($list))){
                $lists = array_filter(explode("|",$this->replaceAll($list)));
                $posName = "";
                foreach ($lists as $li){
                    if($this->strpos_line($this->object_company,$this->myTrim($li)) && empty($posName)){
                        $li = $this->split_line($list,$this->object_company);
                        if(count($li)>1){
                            $object_content[$key]['subCompany'] = $li[1];
                        }else{
                            $object_content[$key]['subCompany'] = $object_arrs[$key+1];
                        }
                    }

                }
            }

            if(strpos($this->myTrim($list),"项目职务")!==false){
                $lists = array_filter(explode("|",$this->replaceAll($list)));
                $posName = "";
                foreach ($lists as $li){
                    if(strpos("项目职务",$this->myTrim($li))!==false && empty($posName)){
                        $li = $this->split_line($list,"项目职务");

                        if(count($li)>1){
                            $object_content[$key]['projectOffice'] = $li[1];
                        }else{
                            $object_content[$key]['projectOffice'] = $object_arrs[$key+1];
                        }
                    }

                }
            }

            if(strpos($this->myTrim($list),"项目职责")!==false){
                $lists = array_filter(explode("|",$this->replaceAll($list)));
                $posName = "";
                foreach ($lists as $li){
                    if(strpos("项目职责",$this->myTrim($li))!==false && empty($posName)){
                        $li = $this->split_line($list,"项目职责");

                        if(count($li)>1){
                            $object_content[$key]['projectRole'] = $li[1];
                        }else{
                            $object_content[$key]['projectRole'] = $object_arrs[$key+1];
                        }
                    }

                }
            }


            if(strpos($this->myTrim($list),"项目业绩")!==false){
                $lists = array_filter(explode("|",$this->replaceAll($list)));
                $posName = "";
                foreach ($lists as $li){
                    if(strpos("项目业绩",$this->myTrim($li))!==false && empty($posName)){
                        $li = $this->split_line($list,"项目业绩");

                        if(count($li)>1){
                            $object_content[$key]['projectPerfromnance'] = $li[1];
                        }else{
                            $object_content[$key]['projectPerfromnance'] = $object_arrs[$key+1];
                        }
                    }

                }
            }



            if($this->strpos_line($this->object_yj,$this->myTrim($list))){
                if(strpos($list,"项目描述")!==false){
                    $remove = substr($list,$describe_offest);
                    $list = str_replace($remove,"",$list);
                }
                if(strpos($list,"项目职责")!==false){
                    $remove = substr($list,$duty_offest);
                    $list = str_replace($remove,"",$list);
                }
                $object_content[$key]['projectPerfromnance'] = $this->myTrim($list);
            }




            if($this->strpos_line($this->object_duty,$this->myTrim($list))){
                if(strpos($list,"项目描述")!==false){
                    $length = $duty_offest-$describe_offest;
                    if($length>0){
                        $object_content[$key]['projectRole'] = substr($str,$duty_offest,$length);
                    }else{
                        $object_content[$key]['projectRole'] = substr($str,$duty_offest);
                    }

                }elseif(strpos($list,"项目业绩")!==false){
                    $length = $duty_offest-$yj_offest;
                    if($length>0){
                        $object_content[$key]['projectRole'] = substr($str,$duty_offest,$length);
                    }else{
                        $object_content[$key]['projectRole'] = substr($str,$duty_offest);
                    }

                }

                if(strpos($list,"项目职责")!==false){
                    $remove = substr($list,$duty_offest);
                    $list = str_replace($remove,"",$list);
                }
                $object_content[$key]['projectRole'] = $this->myTrim($list);


                if(strlen($list)<100){
                    $object_content[$key] = "";
                }
//                $lists = array_filter(explode("|",$this->replaceAll($list)));
//                $posName = "";
//                foreach ($lists as $li){
//                    if($this->strpos_line($this->object_duty,$this->myTrim($li)) && empty($posName)){
//                        $li = $this->split_line($list,$this->object_duty);
//                        $object_content[$key]['projectRole'] = $li[1];
//                    }
//
//                }
            }

//            if($this->strpos_line($this->object_yj,$this->myTrim($list))){
//                $lists = array_filter(explode("|",$this->replaceAll($list)));
//                $posName = "";
//                foreach ($lists as $li){
//                    if($this->strpos_line($this->object_yj,$this->myTrim($li)) && empty($posName)){
//
//                        $object_content[$key]['projectPerfromnance'] = $li;
//                        $posName = $li;
//                    }
//                }
//            }


            if(empty($object_content[$key]['edate'])){
                $object_content[$key] = "";
            }else{
                $startDateStr = $this->replaceAll($object_content[$key]['startDateStr']);
                $object_content[$key]['startDateStr'] = str_replace("|","-",$startDateStr);
                $endDateStr = $this->replaceAll($object_content[$key]['endDateStr']);

                $proName = explode($object_content[$key]['endDateStr'],$list);
                $proName = $this->trim_arr(str_replace("：","",$proName[1]));
                $object_content[$key]['proName'] =$proName[0];
                $object_content[$key]['endDateStr'] = str_replace("|","-",$endDateStr);


//                $object_content[$key]['proName'] =
            }
        }

        return array_filter($object_content);
    }


    function filter_str($li,$list){
        $arr = explode($li,$list);
        $arr1 = array_filter(explode(" ",$arr[1]));
        $arr2 = array_values(array_filter(explode("\n",$arr1[0])));
        return $li.$arr2[0];
    }

    //值对应键转换
    function key_line($content,$arr){
        foreach ($arr as $key=>$list){
            if($list==$content){
                return $key;
            }
        }
    }

    //判断字段是否存在该行
    function strpos_line($arr_field,$content){
        foreach ($arr_field as $li){
            if(strpos($this->myTrim($content),$li) !== false){
                return $li;
            }
        }
    }

    //根据关键字数组拆分字符
    function arr_line($arr_field,$content){
        foreach ($arr_field as $li){
            if(strpos($this->myTrim($content),$li) !== false){
                $li_n = explode($li,$this->myTrim($content));
                return $li_n;
            }
        }
    }

    //拆分该行，判断值具体位置
    function split_line($list,$content){
        $list = $this->replaceAll($list);

        $list = array_values(array_filter(explode("|",$list)));

        $start = "";

        foreach ($list as $k=>$li){
            if(is_array($content)){
                if($this->strpos_line($content,$li) && empty($start)){
                    $start = $k;
                }
            }else{
                if(strpos($this->myTrim($li),$content) !== false && empty($start)){
                    $start = $k;
                }
            }
        }

        if($start){
            $list = array_slice($list,$start);
        }

        return $list;
    }

    //去除特殊行，判断值具体位置
    function remove_line($list,$content){
        $str = $list;
        $list = $this->replaceAll($list);

        $list = array_values(array_filter(explode("|",$list)));

        $remove = "";

        foreach ($list as $k=>$li){
            if(is_array($content)){
                if($this->strpos_line($content,$li)){
                    $remove = $li;
                }
            }
        }

        if($remove){
            $list = str_replace("：","",str_replace($remove,"",$str));
        }
        return $list;
    }

    function split_lines($list,$content){
        $list = $this->replaceAll($list);

        $list = array_values(array_filter(explode("|",$list)));

        $start = "";

        foreach ($list as $k=>$li){
            if(is_array($content)){
                if($this->strpos_line($content,$li)){
                    $start = $k;
                }
            }else{
                if(strpos($this->myTrim($li),$content) !== false){
                    $start = $k;
                }
            }
        }

        if($start){
            $list = array_slice($list,$start);
        }

        return $list;
    }


    //所有特殊字符转换
    function replaceAll($str,$tostr="")
    {
        // $str = "!@#$%^&*（中'文：；﹑?中'文中'文().,<>|[]'\"";
        if (!$tostr )
        {
            $tostr = "|";
        }
//中文标点
//    $char = "。、！？：；﹑?＂…‘’“”〝〞∕?‖—　〈〉﹞﹝「」??〖〗】【??』『〕〔》《﹐?﹕︰﹔！?？?﹖﹌﹏﹋＇?ˊˋ―﹫︳︴?＿￣﹢﹦﹤‐??﹟﹩﹠﹪﹡﹨﹍﹉﹎﹊ˇ︵︶︷︸︹︿﹀︺︽︾ˉ﹁﹂﹃﹄︻︼（）";

        $pattern = array(
            "/[[:punct:]]/i", //英文标点符号
//        '/[：]/u', //中文标点符号
            '/[ ]{2,}/'
        );
        $str = str_replace("：","|",$str);
        $str = str_replace("\n","|",$str);
        $str = str_replace("	","|",$str);
        $str = str_replace(" ","|",$str);
        $str = str_replace("\n","|",$str);
        $str = str_replace("\r","|",$str);
        $str = preg_replace($pattern, '|', $str);
        return $str;


    }


    function sort_with_keyName($arr,$orderby='asc'){
        $new_array = array();
        $new_sort = array();
        foreach($arr as $key => $value){
            $new_array[] = $value;
        }
        if($orderby=='asc'){
            asort($new_array);
        }else{
            arsort($new_array);
        }
        foreach($new_array as $k => $v){
            foreach($arr as $key => $value){
                if($v==$value){
                    $new_sort[$key] = $value;
                    unset($arr[$key]);
                    break;
                }
            }
        }
        return $new_sort;
    }


    /**
     * php转码函数
     * $in_charset 此刻编码
     * $out_charset 转码后，输出的编码
     * $datas 要转码的数据
     */
    function m_iconv($in_charset,$out_charset,$datas){
        if(is_array($datas)){                            //如果数据为数组
            foreach($datas as $k=>$v){
                if(is_array($v)){                        //如果数据为多维数组，进行下面的递归调用m_iconv()函数自身
                    $k = iconv($in_charset,$out_charset,$k);            //多维数组的键进行转码，这里可以把键设置为汉字测试看看
                    $ml[$k] = $this->m_iconv($in_charset,$out_charset,$v);
                }elseif(is_string($k) || is_string($v)){        //如果是一维数组判断键和值是否为字符串
                    if(is_string($k)){
                        $k = iconv($in_charset,$out_charset,$k);
                    }
                    if(is_string($v)){
                        $v = iconv($in_charset,$out_charset,$v);
                    }
                    $ml[$k] = $v;
                }else{
                    $ml[$k] = $v;                    //一维数组键和值都为数组
                }
            }
        }elseif(is_string($datas)){                        //如果数据为字符串
            $ml = iconv($in_charset,$out_charset,$datas);
        }else{
            $ml = $datas;                                //如果数据为数值
        }
        return $ml;
    }


    //去掉空格
    function myTrim($str)
    {

        $search = array(" ","?","????","\n","\r","\t", "\s", "&gt; ","　　");
        $replace = array("","","","","","", "", "", "");
        return trim(str_replace($search, $replace, $str));
    }

    //空格换数组
    function trim_arr($str){
        $param = array(" ","?","????","\n","\r","\t", "\s", "&gt; ","　　");
        $replace = array("***","***","***","***","***","***", "***", "***", "***");
        $str1 = trim(str_replace($param, $replace, $str));

        $arr = array_values(array_filter(explode("***",$str1)));
        return $arr;
    }

    function isChineseName($name){
        if (preg_match('/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/', $name)) {
            return true;
        } else {
            return false;
        }
    }

    function isTel($tel){
        if(strlen($tel) == "11" && preg_match("/^1[34578]\d{9}$/",$tel))
        {
            return true;
        }else{
            return false;
        }
    }

    function isEmail($email){
        if(preg_match("/([a-z0-9\-_\.]+@[a-z0-9]+\.[a-z0-9\-_\.]+)+/i",$email))
        {
            return true;
        }else{
            return false;
        }
    }
    //检索关键字
    function strpos_key($arrs,$str){
        foreach ($arrs as $value){
//        if(strpos($value,$str) !==false){
//            return true;
//        }
//
            if($value=$str){
                return true;
            }
        }
    }


    function search_key($arr,$str){
        foreach ($arr as $hr){
            if($hr = $str){
                return true;
            }
        }
    }


    function findNum($str=''){
        $str=trim($str);
        if(empty($str)){return '';}
        $result='';
        for($i=0;$i<strlen($str);$i++){
            if(is_numeric($str[$i])){
                $result.=$str[$i];
            }
        }
        return $result;
    }


    function chrtonum($str){
        $bins=array("零","一","二","三","四","五","六","七","八","九");
        if(strpos($str,"十")!==false){
            return "10年以上";
        }else{
            foreach ($bins as $k=>$list){
                if(strpos($str,$list)!==false){
                    return $k."年以上";
                }
            }
        }
    }


    function remove_html($document){
        $search = array ("'<script[^>]*?>.*?</script>'si", // 去掉 javascript
            "'<style[^>]*?>.*?</style>'si",  // 去掉 css
            "'<[/!]*?[^<>]*?>'si",      // 去掉 HTML 标记
            "'<!--[/!]*?[^<>]*?>'si",      // 去掉 注释 标记
            "'([rn])[s]+'",  // 去掉空白字符
            "'&(quot|#34);'i",  // 替换 HTML 实体

            "'&(amp|#38);'i",
            "'&(lt|#60);'i",
            "'&(gt|#62);'i",
            "'&(nbsp|#160);'i",
            "'&(iexcl|#161);'i",
            "'&(cent|#162);'i",
            "'&(pound|#163);'i",
            "'&(copy|#169);'i",
            "'&#(d+);'e");   // 作为 PHP 代码运行

        $replace = array ("",
            "",
            "",
            "",
            "\1",
            "\"",
            "&",
            "<",
            ">",
            " ",
            chr(161),
            chr(162),
            chr(163),
            chr(169),
            "chr(\1)");
//$document为需要处理字符串，如果来源为文件可以$document = file_get_contents($filename);
        $out = preg_replace($search, $replace, $document);
        return $out;
    }
}
?>