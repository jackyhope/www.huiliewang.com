<?php

class baseUtils {

    public static $error = '';
    protected static $clientIP;

    //����XSS����
    public static function reMoveXss($val) {
        $val = preg_replace('/([\x00-\x08])/', '', $val);
        $val = preg_replace('/([\x0b-\x0c])/', '', $val);
        $val = preg_replace('/([\x0e-\x19])/', '', $val);
        $search = 'abcdefghijklmnopqrstuvwxyz';
        $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $search .= '1234567890!@#$%^&*()';
        $search .= '~`";:?+/={}[]-_|\'\\';
        for ($i = 0; $i < strlen($search); $i++) {
            $val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val);
            $val = preg_replace('/(&#0{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val);
        }

        $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'base');
        $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
        $ra = array_merge($ra1, $ra2);
        $found = true;
        while ($found == true) {
            $val_before = $val;
            for ($i = 0; $i < sizeof($ra); $i++) {
                $pattern = '/';
                for ($j = 0; $j < strlen($ra[$i]); $j++) {
                    if ($j > 0) {
                        $pattern .= '(';
                        $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                        $pattern .= '|';
                        $pattern .= '|(&#0{0,8}([9|10|13]);)';
                        $pattern .= ')*';
                    }
                    $pattern .= $ra[$i][$j];
                }
                $pattern .= '/i';
                $replacement = substr($ra[$i], 0, 2) . '<x>' . substr($ra[$i], 2); // add in <> to nerf the tag
                $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
                if ($val_before == $val) {
                    $found = false;
                }
            }
        }
        return $val;
    }

    /**
     * ��ȫ��������
     * @param string	$str		��Ҫ������ַ�������
     * @param string	$type		���ص��ַ����ͣ�֧�֣�string,int,float,html
     * @param mixed		$default	�����ִ����������ʱĬ�Ϸ���ֵ
     * @return 		mixed		�����ִ����������ʱĬ�Ϸ���ֵ
     */
    public static function getStr($str, $type = 'string', $default = '') {
        //���Ϊ����ΪĬ��ֵ
        if ($str === '')
            return $default;
        if (is_array($str)) {
            $_str = array();
            foreach ($str as $key => $val) {
                $_str[$key] = self::getStr($val, $type, $default);
            }
            return $_str;
        }
        //ת��
        if (!get_magic_quotes_gpc())
            $str = addslashes($str);
        switch ($type) {
            case 'string': //�ַ�����
                $_str = strip_tags($str);
                $_str = str_replace("'", '&#39;', $_str);
                $_str = str_replace("\"", '&quot;', $_str);
                $_str = str_replace("\\", '', $_str);
                $_str = str_replace("\/", '', $_str);
                $_str = str_replace("+/v", '', $_str);
                break;
            case 'int': //��ȡ��������
                $_str = intval($str);
                break;
            case 'float': //�񸡵�������
                $_str = floatval($str);
                break;
            case 'html': //��ȡHTML����ֹXSS����
                $_str = self::reMoveXss($str);
                break;
            default: //Ĭ�ϵ����ַ�����
                $_str = strip_tags($str);
        }

        return $_str;
    }

    /**
     * ��������Ƿ����0000-00-00
     *
     * @param string $sDate
     * @return bool
     */
    public static function isDate($sDate) {
        if (preg_match('/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/', $sDate)) {
            return strtotime($sDate) !== false;
        } else {
            return false;
        }
    }

    /**
     * ��������Ƿ����0000-00-00 00:00:00
     *
     * @param string $sTime
     * @return bool
     */
    public static function isTime($sTime) {
        if (preg_match('/^[0-9]{4}\-[][0-9]{2}\-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$/', $sTime)) {
            return strtotime($sTime) !== false;
        } else {
            return false;
        }
    }

    /**
     * IsMobile����:��������ֵ�Ƿ�Ϊ��ȷ���й��ֻ������ʽ
     * ����ֵ:����ȷ���ֻ����뷵���ֻ�����,���Ƿ���false
     */
    public static function IsMobile($Argv) {
        if (!ctype_digit((string) $Argv))
            return false;
        $RegExp = '/^(?:13|15|17|18|14)[0-9]\d{8}$/';
        //return preg_match($RegExp,$Argv)?$Argv:false;
        if (preg_match($RegExp, $Argv))
            return true;
        return false;
    }

    /**
     * ����Ƿ���EMAIL
     * @param type $email
     * @return bool
     */
    public static function IsEmail($email) {
        return strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email);
    }

    public static function IsMd5($password) {
        return preg_match("/^[a-f0-9]{32}$/", $password);
    }

    /**
     * ��ע�봦��(Ϊ��������б��)����
     * @param $string ����Ϊ�ַ���������
     * @return $string ����Ϊ�ַ���������
     */
    public static function saddslashes($string) {
        if (is_array($string)) {
            foreach ($string as $key => $val) {
                $string[$key] = self::saddslashes($val);
            }
        } else {
            $string = self::straddslashes($string);
        }
        return $string;
    }

    public static function straddslashes($string) {
        if (!get_magic_quotes_gpc()) {
            return addslashes($string);
        } else {
            return $string;
        }
    }

    /**
     * ȥ������б�ܺ���
     * @param $string ����Ϊ�ַ���������
     * @return $string ����Ϊ�ַ���������
     */
    public static function sstripslashes($string) {
        if (is_array($string)) {
            foreach ($string as $key => $val) {
                $string[$key] = self::sstripslashes($val);
            }
        } else {
            $string = stripslashes($string);
        }
        return $string;
    }

    /**
     * ȡ��HTML�����ַ� ��ֹXSS
     * @param $string ����Ϊ�ַ���������
     * @return $string ����Ϊ�ַ���������
     */
    public static function shtmlspecialchars($string) {
        if (is_array($string)) {
            foreach ($string as $key => $val) {
                $string[$key] = self::shtmlspecialchars($val);
            }
        } else {
            $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1', str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
        }
        return $string;
    }

    /**
     * ȡ��HTML�����ַ� ��ֹXSS
     * @param $array ����Ϊ�ַ���������
     * @return $array ����Ϊ�ַ���������
     */
    public static function specialhtml($array) {
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (!is_array($value)) {
                    $array[$key] = htmlspecialchars($value);
                } else {
                    self::specialhtml($array[$key]);
                }
            }
        } else {
            $array = htmlspecialchars($array);
        }
    }

    /**
     * ��׼���
     * @param array $data
     * @param int $state
     * @param string $nonce �����ʶ
     * @param string $code_str
     */
    public static function json($data, $state = 0, $nonce, $code_str = '') {
        $return = array('code' => $state, 'code_str' => $code_str, 'nonce' => $nonce, 'data' => $data);
        echo json_encode($return);
        exit;
    }

    public static function run404() {
        echo self::json(array(), 404, '', 'http error');
        exit;
    }

    /**
     * �Ƿ���ajax�ύ
     * @return bool
     */
    public static function isAjax() {
        if ($_REQUEST['isAjax']) {
            return true;
        }
        if (isset($_SERVER ['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER ['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { //�Ƿ�ajax����
            return true;
        } else {
            return false;
        }
    }

    /**
     * �Ƿ���POST����
     * @param bool $reqpostdata
     *        	�Ƿ���post�ֶ�Ĭ��true
     * @return boolean
     */
    public static function isPost($reqpostdata = true) {
        if (isset($_SERVER ['REQUEST_METHOD']) && strtolower($_SERVER ['REQUEST_METHOD']) == 'post') {
            if ($reqpostdata) {
                if (count($_POST)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
    }

    /**
     * ��curl��дfile_get_contents,���file_get_contents�Ķ�������
     * @param string $url �����url
     * @param array $data ����Ĳ���
     * @param string $method ����ķ���
     * @param int $timeout ����ʱ��ʱ��
     * 
     */
    public static function file_get_contents_safe($url, $data = array(), $method = 'GET', $timeout = 5, $sync = True) {
        $ch = curl_init();
        $data = is_array($data) ? http_build_query($data) : $data;

        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        if (strtoupper($method) == 'POST') {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, True);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        } else if (strtoupper($method) == 'GET') {
            curl_setopt($ch, CURLOPT_URL, empty($data) ? $url : $url . '?' . $data);
        } else { //PUT����֧��
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, $sync);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOBODY, !$sync);
        $return = curl_exec($ch);
        curl_close($ch);

        return $return;
    }

    /**
     * ����ֵ������ת��Ϊָ���Ķ���
     * @param	array	$array	��ֵ������
     * @param	object	$object	��ת����
     * @return false | $object
     * */
    public static function arrayToObject($array, $object) {
        if (!is_array($array) || empty($array) || !is_object($object) || empty($object)) {
            return false;
        }

        foreach ($array as $k => $v) {
            if (property_exists($object, $k)) {
                $object->{$k} = $v;
            }
        }

        return $object;
    }

    /**
     * ʱ���תΪX��XСʱX��X�����ʽ
     * @param $int $intervalTime
     * @param $accuracy  day��ȷ���� hour��ȷ��Сʱ minute��ȷ���� second��ȷ����,max��ȷ�����һ�������ݵ�ֵ
     */
    public static function intervalTime2str($intervalTime, $accuracy = "hour") {
        $intervalTime = $intervalTime > 0 ? $intervalTime : 0;

        $day = floor($intervalTime / 86400);
        $hour = floor(($intervalTime - 86400 * $day) / 3600);
        $minute = floor((($intervalTime - 86400 * $day) - 3600 * $hour) / 60);
        $second = floor((($intervalTime - 86400 * $day) - 3600 * $hour) - 60 * $minute);
        $str = "";
        $s_day = ($day > 0) ? $day . "��" : "";
        $s_hour = ($hour > 0) ? $hour . "Сʱ" : "";
        $s_minute = ($minute > 0) ? $minute . "����" : "";
        $s_second = ($second > 0) ? $second . "��" : "";
        if ($accuracy == "day") {
            return $s_day;
        }
        if ($accuracy == "hour") {
            return $s_day . $s_hour;
        }
        if ($accuracy == "minute") {
            return $s_day . $s_hour . $s_minute;
        }
        if ($accuracy == "second") {
            return $s_day . $s_hour . $s_minute . $s_second;
        }
        if ($accuracy == "max") {
            if ($s_day != "")
                return $s_day;
            if ($s_hour != "")
                return $s_hour;
            if ($s_minute != "")
                return $s_minute;
            if ($s_second != "")
                return $s_second;
        }
    }

    /**
     * ˫�����
     */
    public static function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
        // ��̬�ܳ׳��ȣ���ͬ�����Ļ����ɲ�ͬ���ľ���������̬�ܳ�
        $ckey_length = 4;

        // �ܳ�
        $key = md5($key ? $key : 'zhubajie');

        // �ܳ�a�����ӽ���
        $keya = md5(substr($key, 0, 16));
        // �ܳ�b��������������������֤
        $keyb = md5(substr($key, 16, 16));
        // �ܳ�c���ڱ仯���ɵ�����
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';
        // ����������ܳ�
        $cryptkey = $keya . md5($keya . $keyc);
        $key_length = strlen($cryptkey);
        // ���ģ�ǰ10λ��������ʱ���������ʱ��֤������Ч�ԣ�10��26λ��������$keyb(�ܳ�b)������ʱ��ͨ������ܳ���֤����������
        // ����ǽ���Ļ�����ӵ�$ckey_lengthλ��ʼ����Ϊ����ǰ$ckey_lengthλ���� ��̬�ܳף��Ա�֤������ȷ
        $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
        $string_length = strlen($string);
        $result = '';
        $box = range(0, 255);
        $rndkey = array();
        // �����ܳײ�
        for ($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
        }
        // �ù̶����㷨�������ܳײ�����������ԣ�����ܸ��ӣ�ʵ���϶Բ������������ĵ�ǿ��
        for ($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }
        // ���ļӽ��ܲ���
        for ($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            // ���ܳײ��ó��ܳ׽��������ת���ַ�
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }
        if ($operation == 'DECODE') {
            // substr($result, 0, 10) == 0 ��֤������Ч��
            // substr($result, 0, 10) - time() > 0 ��֤������Ч��
            // substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16) ��֤����������
            // ��֤������Ч�ԣ��뿴δ�������ĵĸ�ʽ
            if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
                return substr($result, 26);
            } else {
                return '';
            }
        } else {
            // �Ѷ�̬�ܳױ������������Ҳ��Ϊʲôͬ�������ģ�������ͬ���ĺ��ܽ��ܵ�ԭ��
            // ��Ϊ���ܺ�����Ŀ�����һЩ�����ַ������ƹ��̿��ܻᶪʧ��������base64����
            return $keyc . str_replace('=', '', base64_encode($result));
        }
    }

    /**
     * ��ȡ�ַ����ı���
     */
    public static function getStrEncoding($str) {
        $encodings = array('UTF-8', 'ASCII', 'GB2312', 'GBK', 'CP936', 'HZ', 'EUC-CN', 'BIG-5', 'EUC-TW');
        foreach ($encodings as $enc) {
            if (mb_check_encoding($str, $enc))
                return $enc;
        }
        return false;
    }

    /**
     * ����ת��
     * @param $str ��Ҫת�����ַ�
     * @param $out_charset ת���ı����ʽ
     * @param $in_charset Ĭ�ϵı����ʽ
     * @return �ַ���
     */
    public static function siconv($str, $out_charset, $in_charset = '') {
        global $_SC;

        $in_charset = empty($in_charset) ? strtoupper($_SC['charset']) : strtoupper($in_charset);
        $out_charset = strtoupper($out_charset);
        if ($in_charset != $out_charset) {
            if (function_exists('iconv') && (@$outstr = iconv("$in_charset//IGNORE", "$out_charset//IGNORE", $str))) {
                return $outstr;
            } elseif (function_exists('mb_convert_encoding') && (@$outstr = mb_convert_encoding($str, $out_charset, $in_charset))) {
                return $outstr;
            }
        }
        return $str; // ת��ʧ��
    }

    /**
     * ���������
     * @param $length �������������
     * @param $type �����ַ�������
     * @param $hash  �Ƿ���ǰ׺��Ĭ��Ϊ��. ��:$hash = 'zz-'  ���zz-823klis
     * @return ����ַ��� $type = 0������+��ĸ
      $type = 1������
      $type = 2���ַ�
     */
    public static function random($length, $type = 0, $hash = '') {
        if ($type == 0) {
            $chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        } else if ($type == 1) {
            $chars = '0123456789';
        } else if ($type == 2) {
            $chars = 'abcdefghijklmnopqrstuvwxyz';
        }
        $max = strlen($chars) - 1;
        mt_srand((double) microtime() * 1000000);
        for ($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
        return $hash;
    }

    //������������������ʹ�ô˷������м򵥼��ܣ���ֹ���ݱ�����
    //��д��base64_encode ���ڶԳƼ���
    public static function base64_encode($str) {
        $str_arr = str_split($str); //�ֳɵ����ַ�
        $mod = count($str_arr) % 3; //����3��
        if ($mod > 0)
            $bmod = 3 - $mod; //������Ҫ�����ٲ��ܹ�3��
        for ($i = 0; $i < $bmod; $i++) {//����3����\0
            $str_arr[] = "\0";
        }
        //�ַ���ת��Ϊ������
        foreach ($str_arr as $v) {
            $bit .= str_pad(decbin(ord($v)), 8, '0', STR_PAD_LEFT);
        }
        $len = ceil(strlen($bit) / 6);
        $base64_config = self::getBase64Config();
        //�Ѷ����ư�����λ����ת��Ϊbase64����
        for ($i = 0; $i < $len - $bmod; $i++) {
            $enstr .= $base64_config[bindec(str_pad(substr($bit, $i * 6, 6), 8, 0, STR_PAD_LEFT))];
        }
        //��=��
        for ($buf = 1; $buf <= $bmod; $buf++) {
            $enstr .= "=";
        }
        return $enstr;
    }

    //��д��base64_decode ���ڶԳƼ���
    public static function base64_decode($str) {
        $buf = substr_count($str, '='); //ͳ��=����
        $str_arr = str_split($str); //�ֳɵ����ַ�
        $base64_config = self::getBase64Config();
        //ת��Ϊ�������ַ���
        foreach ($str_arr as $v) {
            $index = array_search($v, $base64_config);
            $index = $index ? $index : "\0";
            $bit .= str_pad(decbin($index), 6, 0, STR_PAD_LEFT);
        }
        $len = ceil(strlen($bit) / 8);
        //������ת��ΪASCII����ת��Ϊ�ַ���
        for ($i = 0; $i < $len - $buf; $i++) {
            $destr .= chr(bindec(str_pad(substr($bit, $i * 8, 8), 8, 0, STR_PAD_LEFT)));
        }
        return $destr;
    }

    //������base64����
    public static function getBase64Config() {
        return array(
            'x', 'T', 'E', 'Z', 'O', 'F', 'm', 'S', 'Q', 'r', 'X', 'N', 'L', 's', 'p', 'H', '9', 't', 'l', 'y', 'P', 'J', 'C', 'c', 'U', '3', 'u', 'a', 'A', 'd', 'D', 'f',
            'I', 'k', '5', 'w', 'B', 'g', 'h', 'z', 'V', 'R', 'e', '2', '1', 'Y', 'j', '4', 'b', 'o', '8', '6', 'i', 'W', '0', 'M', 'n', '7', 'K', 'G', 'q', 'v', '+', '/'
        );
    }

    /**
     * ��֤���֤
     * @param string $id_card
     * @return bool
     */
    public static function validation_filter_id_card($id_card) {
        if (strlen($id_card) == 18) {
            return self::idcard_checksum18($id_card);
        } elseif ((strlen($id_card) == 15)) {
            $id_card = self::idcard_15to18($id_card);

            return self::idcard_checksum18($id_card);
            /**
             * �û�����Դ�ļ����֤��
             */
        } elseif ($id_card == 'S7935588G') {//̨��
            return true;
        } elseif ((strlen($id_card)) == 10) {
            return self::hkidcard($id_card);
        } elseif ($id_card == '0442268402(B)') {
            return true;
        } else {
            return false;
        }
    }

    // 18λ���֤У������Ч�Լ��
    public static function idcard_checksum18($idcard) {
        if (strlen($idcard) != 18) {
            return false;
        }
        $idcard_base = substr($idcard, 0, 17);
        if (self::idcard_verify_number($idcard_base) != strtoupper(substr($idcard, 17, 1))) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * ��15λ���֤������18λ
     * @param string $idcard
     * @return bool|string
     */
    public static function idcard_15to18($idcard) {
        if (strlen($idcard) != 15) {
            return false;
        } else {
            // ������֤˳������996 997 998 999����Щ��Ϊ�����������˵��������
            if (array_search(substr($idcard, 12, 3), array('996', '997', '998', '999')) !== false) {
                $idcard = substr($idcard, 0, 6) . '18' . substr($idcard, 6, 9);
            } else {
                $idcard = substr($idcard, 0, 6) . '19' . substr($idcard, 6, 9);
            }
        }
        $idcard = $idcard . self::idcard_verify_number($idcard);

        return $idcard;
    }

    // �������֤У���룬���ݹ��ұ�׼GB 11643-1999
    public static function idcard_verify_number($idcard_base) {
        if (strlen($idcard_base) != 17) {
            return false;
        }
        //��Ȩ����
        $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
        //У�����Ӧֵ
        $verify_number_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
        $checksum = 0;
        for ($i = 0; $i < strlen($idcard_base); $i++) {
            $checksum += substr($idcard_base, $i, 1) * $factor[$i];
        }
        $mod = $checksum % 11;
        $verify_number = $verify_number_list[$mod];
        return $verify_number;
    }

    /**
     * ���ʱ�����ȷ��
     * @param $date ʱ���ʽ��:2010-04-05
     * @return true or false
     */
    public static function chkdate($date) {
        if ((strpos($date, '-'))) {
            $d = explode("-", $date);
            if (checkdate($d[1], $d[2], $d[0])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * �ж��Ƿ�������ֵ������ ��array(1,'234',5) ���Ƿ���false �Ƿ�������ֵ����
     * @param array $array
     * @param bool $is_unsigned �Ƿ����Ϊ�Ǹ���
     * @param bool $preserve_type �Ƿ���ԭ������
     * @param bool $is_strict �Ƿ����ϸ�ģʽ �ϸ�ģʽʱ���в��ϸ�����ʱ����false �����ϸ�ģʽʱ����
     * @return false|array
     */
    public static function getIntArray($array, $is_unsigned = true, $preserve_type = false, $is_strict = false) {
        $array = (array) $array;
        $rtn = array();
        if ($array) {
            foreach ($array as $v) {
                if (!ctype_digit((string) $v)) {
                    if ($is_unsigned === false) {
                        $v_new = preg_replace('/^-/', '', (string) $v, 1);
                        if (ctype_digit($v_new)) {
                            $rtn[] = $preserve_type ? $v : intval($v);
                            continue;
                        }
                    }
                    if ($is_strict) {
                        return false;
                    } else {
                        continue;
                    }
                } else {
                    $rtn[] = $preserve_type ? $v : intval($v);
                }
            }

            return $rtn ?: false;
        } else {
            return false;
        }
    }

    /**
     * ��ǰ�����Ƿ���https����
     * @return bool
     */
    public static function isHttpsConnection() {
        return ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] !== 'off' && $_SERVER['SERVER_PORT'] == 443) || ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on');
    }

    public static function getIp($format = '000.000.000.000') {
        if (self::$clientIP === null) {
            if ($_SERVER['HTTP_REMOTE_HOST'] && $_SERVER['HTTP_X_REAL_IP'] && $_SERVER['HTTP_REMOTE_HOST'] == $_SERVER['HTTP_X_REAL_IP']) {
                $client_ip = $_SERVER['HTTP_X_REAL_IP'];
            } elseif (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
                $client_ip = getenv('HTTP_CLIENT_IP');
            } elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
                $client_ip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
                $client_ip = getenv('REMOTE_ADDR');
            } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')
            ) {
                $client_ip = $_SERVER['REMOTE_ADDR'];
            } else {
                $client_ip = '';
            }
            preg_match("/[\d\.]{7,15}/", $client_ip, $ip_matches);
            self::$clientIP = $ip_matches[0] ? $ip_matches[0] : 'unknown';
        }
        if (!$format) {
            return self::$clientIP;
        } else {
            return sprintf('%u', ip2long(self::$clientIP));
        }
    }

    /**
     * д����־�ļ� ����ļ�������ھͽ�����־
     * @param string $msg
     * @param string $file
     * @return bool
     */
    public static function addLog($msg, $file = 'db_error.log', $dir = '/var/log/gandianli/dberror/') {
        $file = $dir . $file . '.' . date('Y-m-d');
        if ((is_dir($dir) || @mkdir($dir, 0755, true)) && is_writable($dir)) {
            $data = 'Date:' . date('Y-m-d H:i:s') . ' ' . $msg . "\n";
            $f = fopen($file, 'a+');
            fwrite($f, $data, strlen($data));
            fclose($f);
            return true;
        }
        return false;
    }

    /**
     * sso Token ���� 
     * @param type $prefix
     * @return type
     */
    public static function generate($prefix = 'hlw_') {
        return sprintf("{$prefix}-%04x%04x-%04x-%04x-%04x-%04x%04x%04x", mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }

}
