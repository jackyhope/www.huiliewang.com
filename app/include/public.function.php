<?php
/*
 * $Author ：PHPYUN开发团队
 *
 * 官网: http://www.phpyun.com
 *
 * 版权所有 2009-2016 宿迁鑫潮信息技术有限公司，并保留所有权利。
 *
 * 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
 *
 ***功能性通用函数库
 */
 
 

function ArrayToString($obj,$withKey=true,$two=false){
	if(empty($obj))	return array();
	$objType=gettype($obj);
	if ($objType=='array') {
		$objstring = "array(";
	    foreach ($obj as $objkey=>$objv) {
			if($withKey)$objstring .="\"$objkey\"=>";
			$vtype =gettype($objv) ;
			if ($vtype=='integer') {
                $objstring .="$objv,";
			}else if ($vtype=='double'){
                $objstring .="$objv,";
			}else if ($vtype=='string'){
                $objv= str_replace('"',"\\\"",$objv);
                $objstring .="\"".$objv."\",";
			}else if ($vtype=='array'){
                $objstring .="".ArrayToString($objv,$withKey,$two).",";
			}else if ($vtype=='object'){
                $objstring .="".ArrayToString($objv,$withKey,$two).",";
			}else {
                $objstring .="\"".$objv."\",";
			}
	    }
		$objstring = substr($objstring,0,-1)."";
		return $objstring.")\n";
	}
}
function fun_ip_get() { 
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		} else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
				$ip = getenv("REMOTE_ADDR");
			} else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
					$ip = $_SERVER['REMOTE_ADDR'];
				} else {
					$ip = "unknown";
				}
    $preg="/\A((([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){3}(([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\Z/";
    if(preg_match($preg,$ip)){        
		return ($ip);
    }
}
function get_ip_city($ip){
	$url='http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
	if(function_exists('file_get_contents')){
		$file_contents = file_get_contents($url);
	}else{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);
	}
	$file=json_decode($file_contents);
	
	$city['threecity']=iconv("utf-8","gbk",$file->data->county);//县区
	$city['city']=iconv("utf-8","gbk",$file->data->city);//市
	$city['province']=iconv("utf-8","gbk",$file->data->region);//省
	return $city;
}
function go_to_city($site_domain){
	$ip=fun_ip_get();
	$city=get_ip_city($ip);
	if(!empty($city)){
		foreach($city as $key =>$value){
			$city[$key] = str_replace(array("省","市","县","区"),array(""),$value);
		}
	}
	if($city['threecity']){
		foreach($site_domain as $value){
			$cityname=str_replace(array("省","市","县","区"),array(""),$value['cityname']);
			similar_text($city['threecity'],$cityname,$percent);
			if($percent>=65){
				$gotourl=$value['host'];
				break;
			}
		}
	}
	if(!$gotourl && $city['city']){
		foreach($site_domain as $value){
			$cityname=str_replace(array("省","市","县","区"),array(""),$value['cityname']);
			similar_text($city['city'],$cityname,$percent);
			if($percent>=65){
				$gotourl=$value['host'];
				break;
			}
		}
	}
	if(!$gotourl && $city['province']){
		foreach($site_domain as $value){
			$cityname=str_replace(array("省","市","县","区"),array(""),$value['cityname']);
			similar_text($city['province'],$cityname,$percent);
			if($percent>=65){				
				$gotourl=$value['host'];
				break;
			}
		}
	}
	SetCookie("gotocity",'1',time() + 3600, "/");
	if($gotourl){
		
		header('Location: http://'.$gotourl);	
		exit();
	}
}
function getUploadPic($content,$count=0){
	$content=str_replace('"','',$content);
	$content=str_replace('\'','',$content);
	$content=str_replace('>',' width="">',$content);
	$pattern=preg_match_all('/<img[^>]+src=(.*?)\s[^>]+>/im' ,$content,$match);
	if($match[1]){
		if($count>0){
			$i=0;
			foreach($match[1] as $v){
				if(!empty($v)){
					$pic[]=$v;
					$i++;
					if($i>=$count){
						break;
					}
				}
			}
			return $pic;
		}
		return $match[1];
	}
	return array();
}
function dreferer($default = '') {
    $referer=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
    if(strpos('a'.$referer,Url('user','login'))) {
        $referer = $default;
    }else{
        $referer = substr($referer, -1) == '?' ? substr($referer, 0, -1) : $referer;
    }
    return $referer;
}
function _format_date($time){
    $t=time()-$time;
    $f=array(
        '31536000'=>'年',
        '2592000'=>'个月',
        '604800'=>'星期',
        '86400'=>'天',
        '3600'=>'小时',
        '60'=>'分钟',
        '1'=>'秒'
    );
    foreach ($f as $k=>$v)    {
        if (0 !=$c=floor($t/(int)$k)) {
            return $c.$v.'前';
        }
    }
}
function file_mode_info($file_path){
    if (!file_exists($file_path)){
        return false;
    }
    $mark = 0;
    if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN'){
        $test_file = $file_path . '/cf_test.txt';
        if (is_dir($file_path)){
            $dir = @opendir($file_path);
            if ($dir === false){
                return $mark;
            }
            if (@readdir($dir) !== false){
                $mark ^= 1;
            }
            @closedir($dir);
        }
    }
    return $mark;
}
function getAround($lat,$lon,$raidus){
    $PI = 3.14159265;
    $latitude = $lat;
    $longitude = $lon;
    $degree = (24901*1609)/360.0;
    $raidusMile = $raidus;
    $dpmLat = 1/$degree;
    $radiusLat = $dpmLat*$raidusMile;
    $minLat = $latitude - $radiusLat;
    $maxLat = $latitude + $radiusLat;
    $mpdLng = $degree*cos($latitude*($PI/180));
    $dpmLng = 1/$mpdLng;
    $radiusLng = $dpmLng*$raidusMile;
    $minLng = $longitude - $radiusLng;
    $maxLng = $longitude + $radiusLng;
    return array($minLat,$maxLat,$minLng,$maxLng);
}

function UserAgent(){    
    $user_agent = ( !isset($_SERVER['HTTP_USER_AGENT'])) ? FALSE : $_SERVER['HTTP_USER_AGENT'];    
	if ((preg_match("/(iphone|ipod|android)/i", strtolower($user_agent))) AND strstr(strtolower($user_agent), 'webkit')){    
    	return true;    
	}else if(trim($user_agent) == '' OR preg_match("/(nokia|sony|ericsson|mot|htc|samsung|sgh|lg|philips|lenovo|ucweb|opera mobi|windows mobile|blackberry)/i", strtolower($user_agent))){   
		return true;   
	}else{ 
		return true;  
	}    
}
function get_domain($host) {
    $host=strtolower($host);
    if(strpos($host,'/')!==false){
        $parse = @parse_url($host);
        $host = $parse['host'];
    }
    $topleveldomaindb=array('com','edu','gov','int','mil','net','org','biz','info','pro','name','museum','coop','aero','xxx','idv','mobi','cc','me'); $str='';
    foreach($topleveldomaindb as $v){
        $str.=($str ? '|' : '').$v;
    }
    $matchstr="[^\.]+\.(?:(".$str.")|\w{2}|((".$str.")\.\w{2}))$";
    if(preg_match("/".$matchstr."/ies",$host,$matchs)){
        $domain=$matchs['0'];
    } else{
        $domain=$host;
    }
    return $domain;
}
function yun_iconv($in_charset,$out_charset,$str){
    if(is_array($str)){
        foreach($str as $k=>$v){
            
              $str[$k]=iconv($in_charset,$out_charset,$v);
            
        }
        return $str;
    }else{
       
        return iconv($in_charset,$out_charset,$str);
       
    }    
}


function array_iconv($arr, $in_charset="gbk", $out_charset="utf-8")
{
    $ret = eval('return '.iconv($in_charset,$out_charset,var_export($arr,true).';'));
    return $ret;
}

function made_web($dir,$array,$config){
    $content="<?php \n";
    $content.="\$$config=".$array.";";
    $content.=" \n";
    $content.="?>";
    $fpindex=@fopen($dir,"w+");
    @fwrite($fpindex,$content);
    @fclose($fpindex);
}
function made_web_array($dir,$array){
    $content="<?php \n";
    if(is_array($array)){
        foreach($array as $key=>$v){
            if(is_array($v))
            {
                $content.="\$$key=array(";
                $content.=made_string($v);
                $content.=");";
            }else{
                $v = str_replace("'","\\'",$v);
                $v = str_replace("\"","'",$v);
                $v = str_replace("\$","",$v);
                $content.="\$$key=".$v.";";
            }
            $content.=" \n";
        }
    }
    $content.="?>";
    $fpindex=@fopen($dir,"w+");
    $fw=@fwrite($fpindex,$content);
    @fclose($fpindex);
    return $fw;
}
function made_string($array,$string=''){
	if(is_array($array) && !empty($array)){
	 	$i = 0;
		foreach($array as $key=>$value)
		{
			if($i>0){$string.=',';}
			if(is_array($value))
			{
				$string.="'".$key."'=>array(".made_string($value).")";
			}else{
				$string.="'".$key."'=>'".str_replace('\$','',iconv("UTF-8","gbk",$value))."'";
			}
			$i++;
		}
	}
  return $string;
}
function delfiledir($delfiles){
    $delfiles = stripslashes($delfiles);
    $delfiles = str_replace("../","",$delfiles);
    $delfiles = str_replace("./","",$delfiles);
    $delfiles = "../".$delfiles;
    $p_delfiles = path_tidy($delfiles);
    if($p_delfiles!=$delfiles){die;}
    if(is_file($delfiles)){
        @unlink($delfiles);
    }else{
        $dh=@opendir($delfiles);
        while($file=@readdir($dh)){
            if($file!="."&&$file!=".."){
                $fullpath=$delfiles."/".$file;
                if(@is_dir($fullpath)){
                    delfiledir($fullpath);
                }else{
                    @unlink($fullpath);
                }
            }
        }
        @closedir($dh);
        if(@rmdir($delfiles)){
            return  true;
        }else{
            return false;
        }
    }
}
function path_tidy($path) {
    $tidy = array();
    $path = strtr($path, '\\', '/');
    foreach(explode('/', $path) as $i => $item) {
        if($item == '' || $item == '.' ) {
            continue;
        }
        if($item == '..' && end($tidy) != '..' && $i > 0) {
            array_pop($tidy);
            continue;
        }
        $tidy[] = $item;
    }
    return ($path[0]=='/'?'/':'').implode('/', $tidy);
}

function unlink_pic($pic){
    $pictype=getimagesize($pic);
    if($pictype[2]=='1' || $pictype[2]=='2' || $pictype[2]=='3'){
        @unlink($pic);
    }
}
function pylode($string,$array){
		if(is_array($array)){
			$str = @implode($string,$array);
		}else{
			$str = $array;
		}
		if(!preg_match("/^[0-9a-zA-Z".$string."]+$/",$str)){
			$str = 0;
		}
		return $str;
}
function getToken($config=array()){
		$config = '';
		include(PLUS_PATH.'config.php');
		$Token = $config['token'];
		$TokenTime = $config['token_time'];
		$NowTime = time();
		if(($NowTime-$TokenTime)>7000 || !$Token){
			$Appid       = $config['wx_appid'];
			$Appsecert   = $config['wx_appsecret'];
			$Url         = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$Appid.'&secret='.$Appsecert;
			$CurlReturn  = CurlPost($Url);
			$Token       = json_decode($CurlReturn);
			$config['token']      = $Token->access_token;
			$config['token_time'] = time();
			made_web(PLUS_PATH."config.php",ArrayToString($config),"config");
			return $config['token'];
		}else{
			return $Token;
		}
}
function getWxTicket($config=array()){
	$config = '';
	include(PLUS_PATH.'config.php');
	$Ticket = $config['ticket'];
	$TicketTime = $config['ticket_time'];
	$NowTime = time();
	if(($NowTime-$TicketTime)>7000 || !$Ticket){
		$Url         = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.getToken().'&type=jsapi';
		$CurlReturn  = CurlPost($Url);
		$Ticket       = json_decode($CurlReturn);
		$config['ticket']      = $Ticket->ticket;
		$config['ticket_time'] = time();
		made_web(PLUS_PATH."config.php",ArrayToString($config),"config");
		return $config['ticket'];
	}else{
		return $Ticket;
	}
}
function getWxJsSdk($url='') {
	include(PLUS_PATH.'config.php');
	$Ticket = getWxTicket();
	if(empty($url)){
		 $protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
		$url = $protocol.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
	}
	$timestamp = time();
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$nonceStr = "";
	for ($i = 0; $i < 16; $i++) {
	  $nonceStr .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
	
	$string = "jsapi_ticket=".$Ticket."&noncestr=".$nonceStr."&timestamp=".$timestamp."&url=".$url;
	$signature = sha1($string);
	$signPackage = array(
	  "appId"     => $config['wx_appid'],
	  "nonceStr"  => $nonceStr,
	  "timestamp" => $timestamp,
	  "url"       => $url,
	  "signature" => $signature,
	  "rawString" => $string
	);
	return $signPackage; 
 }
function CurlPost($url,$data=''){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
	if($data!=''){
		curl_setopt($ch, CURLOPT_POST, 1);
 			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	$Return=curl_exec ($ch);
	if (curl_errno($url)) {
	   echo 'Errno'.curl_error($url);
	}
	curl_close($ch);
	return $Return;
}
function wapJump($config){
	global $ModuleName;
	$mArray = array('qqconnect','sinaconnect','call');
	$cArray = array('clickhits','wjump');
	if($config['sy_wap_jump']=='1' && !in_array($ModuleName,$mArray) && !in_array($_GET['c'],$cArray)){
		if(isMobileUser($config)){

			include(PLUS_PATH."jump.cache.php");
			if($_GET['c']){
				$_GET['a'] = $_GET['c'];
			}
			if($ModuleName && $ModuleName!='index'){
				$_GET['c'] = $ModuleName;
				if($wapA[$ModuleName][$_GET['a']]){
					$_GET['a'] = $wapA[$ModuleName][$_GET['a']];
				}
			}

			$Loaction =  Url('wap',$_GET);
		}

	}
	return $Loaction;
}
function isMobileUser($config=array()){
	$uachar = '/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile)/i';
	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	if((preg_match($uachar, $ua))&& !strpos(strtolower($_SERVER['REQUEST_URI']),'wap') && $_SERVER['HTTP_HOST']!=$config['sy_wapdomain']){
		
		return true;
	
	}else{
		return false;
	}
}
function gt_Generate_code($length = 6) {
  return rand(pow(10,($length-1)), pow(10,$length)-1);
}
function gtauthcode($config=array(),$type='pc',$code_kind=3){
	return $code_kind==3 ? gtGeetest($config=array(),$type='pc') : gtverify();
}
function gtGeetest(){
	if($_POST['geetest_challenge'] && $_POST['geetest_validate'] && $_POST['geetest_seccode']){
		if(!isset($_SESSION)){
			session_start();
		}
		require_once LIB_PATH . '/class.geetestlib.php';
		if(!$config){
			include(PLUS_PATH.'config.php');
		}
		$GtSdk = new GeetestLib($config['sy_geetestid'], $config['sy_geetestkey']);
		if($type=='mobile'){
			$data = array(
				"user_id" => $user_id, # 网站用户id
				"client_type" => "h5", #web:电脑上的浏览器；h5:手机上的浏览器
				"ip_address" => "127.0.0.1" # 请在此处传输用户请求验证时所携带的IP
			);
		}else{
			$data = array(
				"user_id" => $user_id, # 网站用户id
				"client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器
				"ip_address" => "127.0.0.1" # 请在此处传输用户请求验证时所携带的IP
			);
		}
		$user_id = $_SESSION['user_id'];
		if ($_SESSION['gtserver'] == 1) {   //服务器正常
			$result = $GtSdk->success_validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode'], $data);
			if ($result) {
				return true;
			} else{
				return false;
			}
		}else{  //服务器宕机,走failback模式
			if ($GtSdk->fail_validate($_POST['geetest_challenge'],$_POST['geetest_validate'],$_POST['geetest_seccode'])) {
				return true;
			}else{
				return false;
			}
		}
	}else{
		return false;
	}
}
function gtverify(){
	if(md5(strtolower($_POST['authcode']))!=$_SESSION['authcode'] || empty($_SESSION['authcode'])){
      unset($_SESSION['authcode']);
      return false;
  }
  return true;
}

/* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */
/**
 * date  2019-07-13
 * author hellocrab
 * @param string $msg
 * @param int $code
 * 返回一个error  success 状态类型的json数据
 */
function return_json($msg='操作成功',$code=200,$data=[]){
	if(count($data)>0){
		if(!isset($data['message']) || empty($data['message'])){
			$data['message']=$msg;
		}
		if(!isset($data['code']) || empty($data['code'])){
			$data['code']=$code;
		}
		$data = serialize($data);
		$encode = mb_detect_encoding($data, array("ASCII", 'UTF-8', 'GB2312', "GBK", 'BIG5', 'EUC-CN'));//判断编码
		$string = iconv($encode, 'UTF-8', $data); //全部转utf-8
		$string = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $string);
		$data = unserialize($string);
		echo json_encode($data);die;
	}else{
		echo '{"message":"'.$msg.'","code":'.$code.'}';die;
	}
}


/**
 * date  2019-07-13
 * author hellocrab
 * 把对象转换为数组
 * @param $obj
 * @return bool|mixed
 */
function return_toArray($obj){
		if(gettype($obj)=='object'){
			/*$data = serialize($obj);
			$encode = mb_detect_encoding($data, array("ASCII", 'UTF-8', 'GB2312', "GBK", 'BIG5', 'EUC-CN'));//判断编码
			$string = iconv($encode, 'UTF-8', $data); //全部转utf-8
			$string = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $string);
			$obj = unserialize($string);*/
			return json_decode(json_encode($obj),true);
		}else{
			return true;
		}
}

/**
 * 判断数据编码， 支持  传入数组，对象，字符串，数字
 * @param $str
 * @return false|string
 */
function get_cur_code($str){
	$_str = strval($str);
	if(is_array($str) || is_object($str)){
		$_str = serialize($str);
	}
	return mb_detect_encoding($_str, array("ASCII", 'UTF-8', 'GB2312', "GBK", 'BIG5', 'EUC-CN','Unicode','Base64','UTF-16'));
}
/**
 * 把字符串类型的数值进行编码转换，返回目标编码类型的变量值
 * @param $_str
 * @param string $get_coding
 * @return false|string
 */
function change_encoding($_str,$get_coding='UTF-8'){
	$encode = mb_detect_encoding(strval($_str), array("ASCII", 'UTF-8', 'GB2312', "GBK", 'BIG5', 'EUC-CN'));//判断编码
	if($encode != $get_coding){
		$_str = iconv($encode, $get_coding, $_str);
	}
	return $_str;
}

/**
 * CURL请求
 * @param $url string 请求url地址
 * @param $method string 请求方法 get post
 * @param mixed $postfields post数据数组
 * @param array $headers 请求header信息
 * @param bool|false $debug  调试开启 默认false
 * @return mixed
 */
function httpRequest($url, $method="GET", $postfields = null, $headers = array(), $debug = false)
{
	$method = strtoupper($method);
	$ci = curl_init();
	/* Curl settings */
	curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
	curl_setopt($ci, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0");
	curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 60); /* 在发起连接前等待的时间，如果设置为0，则无限等待 */
	curl_setopt($ci, CURLOPT_TIMEOUT, 7); /* 设置cURL允许执行的最长秒数 */
	curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
	switch ($method) {
		case "POST":
			curl_setopt($ci, CURLOPT_POST, true);
			if (!empty($postfields)) {
				$tmpdatastr = is_array($postfields) ? http_build_query($postfields) : $postfields;
				curl_setopt($ci, CURLOPT_POSTFIELDS, $tmpdatastr);
			}
			break;
		default:
			curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method); /* //设置请求方式 */
			break;
	}
	$ssl = preg_match('/^https:\/\//i', $url) ? TRUE : FALSE;
	curl_setopt($ci, CURLOPT_URL, $url);
	if ($ssl) {
		curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
		curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, FALSE); // 不从证书中检查SSL加密算法是否存在
	}
	//curl_setopt($ci, CURLOPT_HEADER, true); /*启用时会将头文件的信息作为数据流输出*/
	if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off')) {
		curl_setopt($ci, CURLOPT_FOLLOWLOCATION, 1);
	}
	curl_setopt($ci, CURLOPT_MAXREDIRS, 2);/*指定最多的HTTP重定向的数量，这个选项是和CURLOPT_FOLLOWLOCATION一起使用的*/
	curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ci, CURLINFO_HEADER_OUT, true);
	/*curl_setopt($ci, CURLOPT_COOKIE, $Cookiestr); * *COOKIE带过去** */
	$response = curl_exec($ci);
	$requestinfo = curl_getinfo($ci);
	$http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
	if ($debug) {
		echo "=====post data======\r\n";
		var_dump($postfields);
		echo "=====info===== \r\n";
		print_r($requestinfo);
		echo "=====response=====\r\n";
		print_r($response);
	}
	curl_close($ci);
	return $response;
	//return array($http_code, $response,$requestinfo);
}
/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */

?>
