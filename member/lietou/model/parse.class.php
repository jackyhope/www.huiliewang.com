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
class parse_controller extends lietou
{
    //�绰
    public  $template_tel = array(  "�ֻ���", "�ֻ�����","�绰����", "�ֻ�","�̻�","����", "tel", "phone", "mobile", "telephone", "�绰", "����绰");
    //����
    public $template_mail =  array("�ʼ�", "����", "�����", "�������", "�����ַ", "�����ʼ�", "��������", "e-mail", "email", "mail", "mailbox");
    //��˾
    public $template_companyname = array("��˾", "��˾����", "��ҵ����", "��λ����");
    //�Ա�
    public $sex = array("��", "Ů");
    //ѧ��
    public $template_education = array("���ѧ��", "�����̶�", "ѧ��", "ѧ�����", "ѧ���ȼ�");
    //ѧУ
    public $template_school = array("��ҵԺУ", "��ҵѧУ", "ѧУ", "ѧԺ", "��������");

    //����ѧУ
    public $template_college = array("��ѧ", "ѧУ", "ԺУ", "��У", "ѧԺ");

    //��������
    public $template_birthday = array("����", "����", "��������", "��������");
    //���ڵ�
    public $template_location = array("�־�ס��", "�־�ס����", "���ڵ�", "��ס��", "��ַ", "Ŀǰ���ڵ�","���ڳ���");
    //������ҵ
    public $template_trade  =   array("��ҵ", "ְҵ��չ����", "����������ҵ","������ҵ","ϣ����ҵ");
    //ѧ��
    public $template_xueli = array("����", "����", "�м�", "��ר", "��ר", "����", "˶ʿ", "��ʿ", "����");
    //����������
    public $template_workadress = array("�����ص�", "������������", "��������", "Ŀ��ص�", "�����ص�");
    //��ְ״̬
    public $template_current  = array("Ŀǰ״̬", "Ŀǰ״��", "Ŀǰְҵ�ſ�", "��ְ״̬", "Ŀǰ��ְ״̬");
    //��ǰְλ
    public $template_work = array("ְλ", "Ŀǰְҵ", "��ǰְλ", "����ְλ");
    //����ְλ
    public $template_work_cn = array("����ְҵ", "����ְλ", "Ŀ��ְ��", "��������ְҵ","��������ְλ");



    public $template_salary = array("����н��", "��������");
    public $arr_edu = array("14"=>"��ר", "15"=>"����","16"=>"˶ʿ","205"=>"MBA","206"=>"EMBA","17"=>"��ʿ","204"=>"��ʿ��");

    public $template_company = array("�������ι�˾", "�ɷ����޹�˾","��˾");
    public $template_position = array("רԱ", "�ܼ�","����","����","����ʦ","������","�г�","��Ա","����","����ʦ","ҽ��","����","����","����","����","��ʦ","У��","����","����","����Ա","�ɲ�","���ʦ","����ʦ","˾��","ҵ��Ա","����Ա","���۴���","����Ա");

    //��Ŀ���ڹ�˾
    public $object_company = array("���ڹ�˾","���ڵ�λ","������ҵ");

    //��Ŀҵ��
    public $object_yj = array("��Ŀҵ��");
    //��Ŀְ��
    public $object_duty = array("��Ŀְ��");
    //��Ŀ����
    public $object_des = array("��Ŀ����","��������");


    public $work_exp = array('startDateStr'=>'','endDateStr'=>'','edate'=>'','companyName'=>'','posName'=>'','content'=>'','companyDes'=>'','workDes'=>'');
    public $object_exp = array('subCompany'=>'','edate'=>'','startDateStr'=>'','endDateStr'=>'','proName'=>'','projectOffice'=>'','subCompany'=>'','projectPerfromnance'=>'','projectRole'=>'','content'=>'','proDes'=>'','proPerTip'=>'');

    public $edu_exp = array('content'=>'','edate'=>'','startDateStr'=>'','endDateStr'=>'','schoolName'=>'','majorName'=>'','degree'=>'');


//    public $object_duty = array("��Ŀְ��");

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
//                    // ʵ����
//                    $text = new Docx2Text();
//                    // ����docx�ļ�
//                    $text->setDocx($_SERVER['DOCUMENT_ROOT']."/resume_file/".$complete_path);
//                    // �����ݴ���$docx������
//                    $docx = $text->extract();
//                    $content = mb_convert_encoding($docx, "gbk", "utf-8");
//                    // �������
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
            $str = $_POST['resumeContent']?$_POST['resumeContent']:$this->error_msg("��������");
            $str = mb_convert_encoding($str, "gbk", "utf-8");
        }

//        $str = str_replace("��","(",$str);
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
        $str_n = str_replace("��",".",$str);
        $str_n = str_replace("��","",$str_n);
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

        if(strpos($str,"\n��������")){
            $intro_offest = strpos($str,"��������");
        }

        if(strpos($str,"\n������Ϣ")){
            $ext_offest = strpos($str,"������Ϣ");
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
            $intro_content = str_replace("��������","",$intro_content);
            $this->base_content['introduce'] =$intro_content;
        }

        if($ext_offest){
            if($length){
                $ext_content = substr($str,$ext_offest,$length);
            }else{
                $ext_content = substr($str,$ext_offest);
            }

            $ext_content = str_replace("������Ϣ","",$ext_content);

            $this->base_content['extraInfo'] =$ext_content;
        }



        foreach ($arr as $key=>$list){
            if($this->myTrim($list)){

                if(strpos($this->myTrim($list),"����") !== false && empty($this->base_content['name'])){

                    $li = $this->split_line($this->myTrim($list),"����");
                    if(count($li)>1){
                        $this->base_content['name'] = str_replace("�Ա�","",$li[1]);
                    }else{
                        $this->base_content['name'] =$arr[$key+1];
                    }

                }

                if(strpos($this->myTrim($list),"����") !== false && empty($this->base_content['name'])){
                    $list_n = str_replace("��","",$list);
                    $list_n = str_replace("��","",$list_n);
                    $li = $this->split_line($list_n,"����");
                    if(count($li)>1){
                        $this->base_content['name'] = $li[0];
                    }else{
                        $this->base_content['name'] =$arr[$key+1];
                    }

//                    echo $li[0];exit();
                }



                if(strpos($this->myTrim($list),"����") !== false && empty($this->base_content['birthday'])){

                    $li = $this->split_line($list,"����");

                    foreach ($li as $l){
                        if($this->findNum($l) && empty($this->base_content['birthday'])){
                            $this->base_content['birthday'] = (date("Y")-$this->findNum($l))."-01";
                        }
                    }
                }

                if(strpos($this->myTrim($list),"�Ա�") !== false && empty($this->base_content['sex'])){
                    $li = $this->split_line($this->myTrim($list),"�Ա�");
                    $this->base_content['sex'] = $li[1];
                }


                if($this->strpos_line($this->sex,$this->myTrim($list)) && empty($this->base_content['sex'])){
//                    $li = $this->split_line($list,$this->sex);
                    $this->base_content['sex'] = $this->strpos_line($this->sex,$this->myTrim($list));

                }



                if(strpos($this->myTrim($list),"��") !== false && empty($this->base_content['birthday'])){
                    $li = explode("��",$this->myTrim($list));
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

                if(strpos($this->myTrim($list),"��������") !== false && empty($this->base_content['exp'])){
                    $li = $this->split_line($list,"��������");
                    $this->base_content['exp'] = $this->findNum($li[1])?$this->findNum($li[1]):$this->chrtonum($li[1]);
//                    $this->base_content['exp'] = $this->chrtonum($li[1]);
                }


                if(strpos($this->myTrim($list),"��������") !== false && empty($this->base_content['exp'])){
                    $li = $this->split_line($list,"��������");
                    $this->base_content['exp'] = $li[0];
                }


                if($this->strpos_line($this->template_location,$this->myTrim($list)) && empty($this->base_content['living'])){

                    $li = $this->split_line($this->myTrim($list),$this->template_location);
                    if(count($li)>1){
                        $li[1] = str_replace("��","",$li[1]);
                        $this->base_content['living_name'] = str_replace("ʡ","",$li[1]);
                    }else{
                        $obj_arr = explode("|",$this->replaceAll($arr[$key+1]));
                        $obj_arr[0] = str_replace("��","",$obj_arr[0]);
                        $this->base_content['living_name'] = str_replace("ʡ","",$obj_arr[0]);
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
                    $work_cn = str_replace("��",",",$list);
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
                    $city_cn = str_replace("��",",",$list);
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

                if(strpos($this->myTrim($list),"Ŀǰ��н") !== false && empty($this->base_content['wage_current'])){
                    $li = $this->split_line($list,"Ŀǰ��н");
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

        $str = str_replace("�깤������","�깤������",$str);
        $str = str_replace("�� �� �� ��","��������",$str);
        $str = str_replace("�� �� �� ��","��������",$str);
        $str = str_replace("�� Ŀ �� ��","��Ŀ����",$str);
        $str = str_replace("�� ѵ �� ��","��ѵ����",$str);
        if(strpos($str,"\n��������")){
            $work_offest = strpos($str,"��������");
        }elseif(strpos($str,"\n��������")){
            $work_offest = strpos($str,"��������");
        }elseif(strpos($str,"��������")){
            $work_offest = strpos($str,"��������");
        }else{
            $work_offest = strlen($str);
        }

        if(strpos($str,"��Ŀ����")){
            $object_offest = strpos($str,"��Ŀ����");
        }elseif(strpos($str,"��Ŀ����")){
            $object_offest = strpos($str,"��Ŀ����");
        }else{
            $object_offest = strlen($str);
        }

        if(strpos($str,"��������")){
            $edu_offest = strpos($str,"��������");
        }elseif(strpos($str,"��������")){
            $edu_offest = strpos($str,"��������");
        }elseif(strpos($str,"��������")){
            $edu_offest = strpos($str,"��������");
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

    //��˾����
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
        $work_str = str_replace("�C","-",$work_str);
        $work_str = str_replace("��","-",$work_str);
        $work_str = str_replace(" - ","-",$work_str);
        $work_str = str_replace("��������","",$work_str);
        $work_str = str_replace("��������","",$work_str);


        $work_str = str_replace("��",".",$work_str);
        $work_str = str_replace("��","",$work_str);
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

            if(strpos($this->myTrim($list),"��������")){
                $li = explode("��������",$this->myTrim($list));
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


            if((strpos($this->myTrim($list),"�������ι�˾") || strpos($this->myTrim($list),"�ɷ����޹�˾")|| strpos($this->myTrim($list),"���޹�˾"))){
//                echo $list;exit();
                $lists = array_filter(explode("|",$this->replaceAll($list)));

                foreach ($lists as $li){
                    if((strpos($this->myTrim($li),"�������ι�˾") || strpos($this->myTrim($li),"�ɷ����޹�˾") || strpos($this->myTrim($li),"���޹�˾")) && empty($work_content[$key]['companyName'])){
                        $work_content[$key]['companyName'] = $li;
                    }
                }

            }

            if(empty($work_content[$key]['companyName']) && $work_content[$key]['endDateStr']){
                $datetime = $work_content[$key]['endDateStr'];
                if($datetime==date("Y.m")){
                    $datetime = "����";
                }
                $comname = explode($datetime,$list);
//                $comname = explode($work_content[$key]['endDateStr'],$list);
                $proName = $this->trim_arr(str_replace("��","",$comname[1]));
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


    //��������
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

        if(strpos($edu_str,"��ѵ����")){
            $edu_str = explode("��ѵ����",$edu_str);
            $edu_str = $edu_str[0];
        }elseif(strpos($edu_str,"��ѵ����")){
            $edu_str = explode("��ѵ����",$edu_str);
            $edu_str = $edu_str[0];
        }

        $edu_str = str_replace("- -","-",$edu_str);
        $edu_str = str_replace("��","-",$edu_str);
        $edu_str = str_replace("�C","-",$edu_str);
        $edu_str = str_replace(" - ","-",$edu_str);
        $edu_str = str_replace("--","-",$edu_str);
        $edu_str = str_replace("��������","",$edu_str);
        $edu_str = str_replace("��������","",$edu_str);
        $edu_str = str_replace("��������","",$edu_str);

        $edu_str = str_replace("��",".",$edu_str);
        $edu_str = str_replace("��","",$edu_str);
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

            if(strpos($this->myTrim($list),"רҵ") !== false){
                $li = $this->split_line($list,"רҵ");
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

            if(strpos($this->myTrim($list),"ѧ��") !== false){
                $li = $this->split_line($list,"ѧ��");
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


    //��Ŀ����
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
        $object_str = str_replace("��","-",$object_str);
        $object_str = str_replace("��","-",$object_str);
        $object_str = str_replace("--","-",$object_str);
        $object_str = str_replace("�C","-",$object_str);
        $object_str = str_replace(" - ","-",$object_str);
        $object_str = str_replace("��Ŀ����","",$object_str);
        $object_str = str_replace("��Ŀ����","",$object_str);

        $object_str = str_replace("��",".",$object_str);
        $object_str = str_replace("��","",$object_str);


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
            $list = str_replace("����",date("Y.m"),$list);
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



            if(strpos($list,"��Ŀҵ��")!==false){
                $yj_offest = strpos($list,"��Ŀҵ��");
            }

            if(strpos($list,"��Ŀְ��")!==false){
                $duty_offest = strpos($list,"��Ŀְ��");
            }

            if(strpos($list,"��Ŀ����")!==false){
                $describe_offest = strpos($list,"��Ŀ����");
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

            if(strpos($this->myTrim($list),"��Ŀְ��")!==false){
                $lists = array_filter(explode("|",$this->replaceAll($list)));
                $posName = "";
                foreach ($lists as $li){
                    if(strpos("��Ŀְ��",$this->myTrim($li))!==false && empty($posName)){
                        $li = $this->split_line($list,"��Ŀְ��");

                        if(count($li)>1){
                            $object_content[$key]['projectOffice'] = $li[1];
                        }else{
                            $object_content[$key]['projectOffice'] = $object_arrs[$key+1];
                        }
                    }

                }
            }

            if(strpos($this->myTrim($list),"��Ŀְ��")!==false){
                $lists = array_filter(explode("|",$this->replaceAll($list)));
                $posName = "";
                foreach ($lists as $li){
                    if(strpos("��Ŀְ��",$this->myTrim($li))!==false && empty($posName)){
                        $li = $this->split_line($list,"��Ŀְ��");

                        if(count($li)>1){
                            $object_content[$key]['projectRole'] = $li[1];
                        }else{
                            $object_content[$key]['projectRole'] = $object_arrs[$key+1];
                        }
                    }

                }
            }


            if(strpos($this->myTrim($list),"��Ŀҵ��")!==false){
                $lists = array_filter(explode("|",$this->replaceAll($list)));
                $posName = "";
                foreach ($lists as $li){
                    if(strpos("��Ŀҵ��",$this->myTrim($li))!==false && empty($posName)){
                        $li = $this->split_line($list,"��Ŀҵ��");

                        if(count($li)>1){
                            $object_content[$key]['projectPerfromnance'] = $li[1];
                        }else{
                            $object_content[$key]['projectPerfromnance'] = $object_arrs[$key+1];
                        }
                    }

                }
            }



            if($this->strpos_line($this->object_yj,$this->myTrim($list))){
                if(strpos($list,"��Ŀ����")!==false){
                    $remove = substr($list,$describe_offest);
                    $list = str_replace($remove,"",$list);
                }
                if(strpos($list,"��Ŀְ��")!==false){
                    $remove = substr($list,$duty_offest);
                    $list = str_replace($remove,"",$list);
                }
                $object_content[$key]['projectPerfromnance'] = $this->myTrim($list);
            }




            if($this->strpos_line($this->object_duty,$this->myTrim($list))){
                if(strpos($list,"��Ŀ����")!==false){
                    $length = $duty_offest-$describe_offest;
                    if($length>0){
                        $object_content[$key]['projectRole'] = substr($str,$duty_offest,$length);
                    }else{
                        $object_content[$key]['projectRole'] = substr($str,$duty_offest);
                    }

                }elseif(strpos($list,"��Ŀҵ��")!==false){
                    $length = $duty_offest-$yj_offest;
                    if($length>0){
                        $object_content[$key]['projectRole'] = substr($str,$duty_offest,$length);
                    }else{
                        $object_content[$key]['projectRole'] = substr($str,$duty_offest);
                    }

                }

                if(strpos($list,"��Ŀְ��")!==false){
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
                $proName = $this->trim_arr(str_replace("��","",$proName[1]));
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

    //ֵ��Ӧ��ת��
    function key_line($content,$arr){
        foreach ($arr as $key=>$list){
            if($list==$content){
                return $key;
            }
        }
    }

    //�ж��ֶ��Ƿ���ڸ���
    function strpos_line($arr_field,$content){
        foreach ($arr_field as $li){
            if(strpos($this->myTrim($content),$li) !== false){
                return $li;
            }
        }
    }

    //���ݹؼ����������ַ�
    function arr_line($arr_field,$content){
        foreach ($arr_field as $li){
            if(strpos($this->myTrim($content),$li) !== false){
                $li_n = explode($li,$this->myTrim($content));
                return $li_n;
            }
        }
    }

    //��ָ��У��ж�ֵ����λ��
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

    //ȥ�������У��ж�ֵ����λ��
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
            $list = str_replace("��","",str_replace($remove,"",$str));
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


    //���������ַ�ת��
    function replaceAll($str,$tostr="")
    {
        // $str = "!@#$%^&*����'�ģ����p?��'����'��().,<>|[]'\"";
        if (!$tostr )
        {
            $tostr = "|";
        }
//���ı��
//    $char = "�������������p?�����������������M?�����������{�z����??��������??�������������o?�s�U�r��?��?�t�k�n�j��?�@�A�D������?�ߣ��������\??�|���}���~���l�h�m�i������������硥��������";

        $pattern = array(
            "/[[:punct:]]/i", //Ӣ�ı�����
//        '/[��]/u', //���ı�����
            '/[ ]{2,}/'
        );
        $str = str_replace("��","|",$str);
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
     * phpת�뺯��
     * $in_charset �˿̱���
     * $out_charset ת�������ı���
     * $datas Ҫת�������
     */
    function m_iconv($in_charset,$out_charset,$datas){
        if(is_array($datas)){                            //�������Ϊ����
            foreach($datas as $k=>$v){
                if(is_array($v)){                        //�������Ϊ��ά���飬��������ĵݹ����m_iconv()��������
                    $k = iconv($in_charset,$out_charset,$k);            //��ά����ļ�����ת�룬������԰Ѽ�����Ϊ���ֲ��Կ���
                    $ml[$k] = $this->m_iconv($in_charset,$out_charset,$v);
                }elseif(is_string($k) || is_string($v)){        //�����һά�����жϼ���ֵ�Ƿ�Ϊ�ַ���
                    if(is_string($k)){
                        $k = iconv($in_charset,$out_charset,$k);
                    }
                    if(is_string($v)){
                        $v = iconv($in_charset,$out_charset,$v);
                    }
                    $ml[$k] = $v;
                }else{
                    $ml[$k] = $v;                    //һά�������ֵ��Ϊ����
                }
            }
        }elseif(is_string($datas)){                        //�������Ϊ�ַ���
            $ml = iconv($in_charset,$out_charset,$datas);
        }else{
            $ml = $datas;                                //�������Ϊ��ֵ
        }
        return $ml;
    }


    //ȥ���ո�
    function myTrim($str)
    {

        $search = array(" ","?","????","\n","\r","\t", "\s", "&gt; ","����");
        $replace = array("","","","","","", "", "", "");
        return trim(str_replace($search, $replace, $str));
    }

    //�ո�����
    function trim_arr($str){
        $param = array(" ","?","????","\n","\r","\t", "\s", "&gt; ","����");
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
    //�����ؼ���
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
        $bins=array("��","һ","��","��","��","��","��","��","��","��");
        if(strpos($str,"ʮ")!==false){
            return "10������";
        }else{
            foreach ($bins as $k=>$list){
                if(strpos($str,$list)!==false){
                    return $k."������";
                }
            }
        }
    }


    function remove_html($document){
        $search = array ("'<script[^>]*?>.*?</script>'si", // ȥ�� javascript
            "'<style[^>]*?>.*?</style>'si",  // ȥ�� css
            "'<[/!]*?[^<>]*?>'si",      // ȥ�� HTML ���
            "'<!--[/!]*?[^<>]*?>'si",      // ȥ�� ע�� ���
            "'([rn])[s]+'",  // ȥ���հ��ַ�
            "'&(quot|#34);'i",  // �滻 HTML ʵ��

            "'&(amp|#38);'i",
            "'&(lt|#60);'i",
            "'&(gt|#62);'i",
            "'&(nbsp|#160);'i",
            "'&(iexcl|#161);'i",
            "'&(cent|#162);'i",
            "'&(pound|#163);'i",
            "'&(copy|#169);'i",
            "'&#(d+);'e");   // ��Ϊ PHP ��������

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
//$documentΪ��Ҫ�����ַ����������ԴΪ�ļ�����$document = file_get_contents($filename);
        $out = preg_replace($search, $replace, $document);
        return $out;
    }
}
?>