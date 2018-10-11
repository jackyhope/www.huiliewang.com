<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 02:28:01
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/register/company.htm" */ ?>
<?php /*%%SmartyHeaderCode:10351951005bba50315eb8d3-13422007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6b8fef4fcc8a5d11c5311260833558fe356fdab' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/register/company.htm',
      1 => 1526538576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10351951005bba50315eb8d3-13422007',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'config' => 0,
    'maplist' => 0,
    'navlist_app' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bba5031729115_26559700',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bba5031729115_26559700')) {function content_5bba5031729115_26559700($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"/>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/login.css" type="text/css"/>
<?php echo '<script'; ?>
>
var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
",integral_pricename='<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
',pricename='<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
',code_web='<?php echo $_smarty_tpl->tpl_vars['config']->value['code_web'];?>
',code_kind='<?php echo $_smarty_tpl->tpl_vars['config']->value['code_kind'];?>
';
<?php echo '</script'; ?>
>
</head>
<body>
<div class="top">
  <div class="top_cot">
    <div class="top_cot_content">
      <div class="top_left fl">
        <div class="yun_welcome fl">欢迎来到<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
！</div>
       </div>
      <div class="top_right_re fr">
        <div class="top_right">

          <div class="yun_topNav fr" style="display: none;">
		  <a class="yun_navMore" href="javascript:;">网站导航</a>
            <div class="yun_webMoredown none">
              <div class="yun_top_nav_box">
			  <ul class="yun_top_nav_box_l">
             <?php  $_smarty_tpl->tpl_vars['maplist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['maplist']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
global $db,$db_config,$config;eval('$paramer=array("key"=>"\'key\'","item"=>"\'maplist\'","nocache"=>"")
;');
		include(PLUS_PATH."/navmap.cache.php");$Navlist=array();
		if(is_array($navmap)){
			$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
			$paramer = $ParamerArr[arr];
			$Purl =  $ParamerArr[purl];
		}
		$Navlist =$navmap[0];
		if(is_array($navmap)){
			foreach($navmap as $k=>$v){
				foreach($Navlist as $key=>$val){
					if($k==$val[id]){
						foreach($v as $kk=>$value){
							if($value[type]=='1'){
								if($config[sy_seo_rewrite]=="1" && $value[furl]!=''){
									$v[$kk][url] = $config[sy_weburl]."/".$value[furl];
								}else{
									$v[$kk][url] = $config[sy_weburl]."/".$value[url];
								}
							}
						}
						$Navlist[$key]['list'][]=$v;
					}
				}
			}
			foreach($Navlist as $key=>$value){
				if($value[type]=='1'){
					if($config[sy_seo_rewrite]=="1" && $value[furl]!=''){
						$Navlist[$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$Navlist[$key][url] = $config[sy_weburl]."/".$value[url];
					}
				}
			}
		}$Navlist = $Navlist; if (!is_array($Navlist) && !is_object($Navlist)) { settype($Navlist, 'array');}
foreach ($Navlist as $_smarty_tpl->tpl_vars['maplist']->key => $_smarty_tpl->tpl_vars['maplist']->value) {
$_smarty_tpl->tpl_vars['maplist']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['maplist']->key;
?>

                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['maplist']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['maplist']->value['eject']) {?> target="_blank"<?php }?>><?php echo $_smarty_tpl->tpl_vars['maplist']->value['name'];?>
</a></li>

                <?php } ?>
                 </ul>
                <ul class="yun_top_nav_box_wx">
               <?php  $_smarty_tpl->tpl_vars['navlist_app'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['navlist_app']->_loop = false;
global $db,$db_config,$config;include(PLUS_PATH."/menu.cache.php");$Navlist=array();
		if(is_array($menu_name)){
            eval('$paramer=array("item"=>"\'navlist_app\'","hovclass"=>"\'nav_list_hover\'","nid"=>"11","nocache"=>"")
;');
			$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
			$paramer = $ParamerArr[arr];
			$Purl =  $ParamerArr[purl];

			foreach($menu_name[12] as $key=>$val){
				
				if($val['type']=='2'){
					if($config['sy_seo_rewrite']=="1" && $val[furl]!=''){
						$menu_name[12][$key][url] = $val[furl];
					}else{
						$menu_name[12][$key][url] = $val[url];
					}
					$menu_name[12][$key][navclass] = navcalss($val,$paramer[hovclass]);
				}
			}
			foreach($menu_name[1] as $key=>$value){
				if($value[url]=="/"){
					$value[url]="";
				}
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[1][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
			foreach($menu_name[2] as $key=>$value){
                if($value[url]=="/"){
					$value[url]="";
				}
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[2][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
            $isCurrentFind=false;
			foreach($menu_name[4] as $key=>$value){
                if($value[url]=="/"){
					$value[url]="";
				}
				if($value['type']=='1' && $value[furl]!=''){
					if($config['sy_seo_rewrite']=="1"){
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[url];
					}
				}
                if($isCurrentFind==false){
				    $menu_name[4][$key][navclass] = navcalss($value,$paramer[hovclass]);
                }
                if($menu_name[4][$key][navclass]){
                    $isCurrentFind=true;
                }
			}
			foreach($menu_name[5] as $key=>$value){
                if($value[url]=="/"){
					$value[url]="";
				}
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[5][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
		}
		if($paramer[nid]){
			$Navlist =$menu_name[$paramer[nid]];
		}else{
			$Navlist =$menu_name[1];
		}$Navlist = $Navlist; if (!is_array($Navlist) && !is_object($Navlist)) { settype($Navlist, 'array');}
foreach ($Navlist as $_smarty_tpl->tpl_vars['navlist_app']->key => $_smarty_tpl->tpl_vars['navlist_app']->value) {
$_smarty_tpl->tpl_vars['navlist_app']->_loop = true;
?>
            <li> <a class="move_0<?php echo $_smarty_tpl->tpl_vars['navlist_app']->value['sort'];?>
"<?php if ($_smarty_tpl->tpl_vars['navlist_app']->value['eject']) {?> target="_blank"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['navlist_app']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['navlist_app']->value['name'];?>
</a> </li>
          <?php } ?>
                </ul>

                </div>
            </div>
          </div>
            <!--<span class="fr"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/wap" class="wap_icon" target="_blank">手机版</a><i class="htop_line">|</i><a href="<?php echo smarty_function_url(array('m'=>'subscribe'),$_smarty_tpl);?>
" target="_blank" class="top_dy">订阅</a><i class="htop_line_two">|</i></span>-->
            <?php echo '<script'; ?>
 language='JavaScript' src='<?php echo smarty_function_url(array('m'=>'ajax','c'=>'RedLoginHead'),$_smarty_tpl);?>
'><?php echo '</script'; ?>
>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="register_header">
  <div class="reg_w980">
   <div class="reg_logo"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_logo'];?>
" class="png"/></a></div>
    <div class="reg_msg">企业注册</div>
     <!--<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
" class="reg_fh yun_text_color fr">返回网站首页>></a>-->
  </div>
</div>
<!--content  start-->
<div class="reg_content" >
  <div class="logoin_cont fl">
    <div class="reg_h1_tit">
      <ul class="reg_ul_list">
          <!--<li class="<?php if ($_smarty_tpl->tpl_vars['type']->value==3) {?>reg_cur<?php }?>"><a class="reg_h1_icon" href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>3,'type'=>1),$_smarty_tpl);?>
"><i class="reg_h1_icon_i reg_h1_icon_i5 png"></i>猎头注册</a></li>-->
          <li class="<?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?>reg_cur<?php }?>"><a class="reg_h1_icon" href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>2,'type'=>1),$_smarty_tpl);?>
"><i class="reg_h1_icon_i reg_h1_icon_i4 png"></i>企业注册</a></li>
	    <li class="<?php if ($_smarty_tpl->tpl_vars['type']->value==2) {?>reg_cur<?php }?>"><a class="reg_h1_icon" href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>1,'type'=>1),$_smarty_tpl);?>
"><i class="reg_h1_icon_i reg_h1_icon_i3 png"></i>个人注册</a></li>


		<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_moblie']=='1') {?>
        <li class="<?php if ($_smarty_tpl->tpl_vars['type']->value==2) {?>reg_cur<?php }?>"><a class="reg_h1_icon" href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>2,'type'=>2),$_smarty_tpl);?>
"><i class="reg_h1_icon_i reg_h1_icon_i1 png"></i>手机注册</a></li>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_email']=='1') {?>
        <li class="<?php if ($_smarty_tpl->tpl_vars['type']->value==3) {?>reg_cur<?php }?>"><a class="reg_h1_icon" href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>2,'type'=>3),$_smarty_tpl);?>
"><i class="reg_h1_icon_i reg_h1_icon_i2 png"></i>邮箱注册</a></li>
		<?php }?>
      </ul>
    </div>

    <div class="register_left">
	<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_moblie']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_email']=='1') {?>
	<?php if ($_smarty_tpl->tpl_vars['type']->value=='2') {?>
    <div class="register_Switching_box" id="regtype2">
       <ul class="register_list">
     <li class="mt20"><em><font color="#FF0000">*</font> 手机号码：</em>
     <input type="text" class="logoin_text tips_class" id="moblie" onBlur="reg_checkAjax('moblie');" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')"/>
     <span class="reg_tips reg_tips_red none" id="ajax_moblie"></span>
     </li>
	<?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"注册会员")!==false) {?>
	<li class="mt20">
		<?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']==3) {?>
			<!--geetest-->
             <em><font color="#FF0000">*</font> 安全验证：</em>
             <div class="reg_verification">
			<div id="popup-captcha" data-id='subreg' data-type='click'></div>
			<input type='hidden' id="popup-submit">
            </div>
		<?php } else { ?>

			<em><font color="#FF0000">*</font> 验证码：</em>
		  <input id="CheckCode" type="text" class="logoin_text_yz" onBlur="reg_checkAjax('CheckCode');"  maxlength="4"/>
		  <img id="vcode_img" class="authcode" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php"/><span class="reg_yz_look">看不清？
		  <a href="javascript:void(0);" onclick="checkCode('vcode_img');" class="registe_a">换一张</a></span>
		  <span class="reg_tips reg_tips_red none" id="ajax_CheckCode"></span>

		<?php }?>
	 </li>
	 <?php }?>
     <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_msg_regcode']=="1"||$_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=="1") {?>
     <li class="mt20"><em><font color="#FF0000">*</font> 短信验证：</em>
     <span style="float:left"><input type="text" id="moblie_code" class="logoin_text_yz" onBlur="reg_checkAjax('moblie_code');"/>
     <a class="reg_btn_s02_disable" href="javascript:void(0);" id="subreg" onclick="sendmsg('vcode_img');"><span id="time">获取短信验证</span></a></span>
     <span class="reg_tips reg_tips_red none" id="ajax_moblie_code"></span>
     </li>
     <?php } else { ?>
     <input type="hidden" id="moblie_code" date="1" value="1"/>
     <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=="1") {?>
        <li class="mt20">
            <em><font color="#FF0000">*</font> 联系人真实姓名：</em>
            <input type="text" id="linkman" class="logoin_text tips_class" onBlur="reg_checkAjax('linkman');"/>
            <span class="reg_tips reg_tips_red none" id="ajax_linkman"></span>
        </li>
    <?php }?>

     <li class="mt20"><em><font color="#FF0000">*</font> 密&nbsp;&nbsp;码：</em>
     <span id="pass2"><input type="password" onkeyup="uppassword(2)" id="password2" onBlur="reg_checkAjax('password2');" class="logoin_text tips_class" value=""/></span>
     <span class="reg_tips reg_tips_red none" id="ajax_password2"></span>
     </li>
     <li><em>&nbsp;</em>
       <div class="kg_lgn_psw_strong">
       <div class="kg_lgn_psw_txt">密码强度:</div>
         <div class="kg_lgn_psw_strong_cnt">
         <span id="pass1_2" class="psw_span">危险</span>
         <span id="pass2_2" class="psw_span ">一般</span>
         <span id="pass3_2" class="psw_span ">安全</span>
        </div>
        <div class="psw_xs" onmousemove="showtip(2)" onmouseout="hidetip(2)">
        <a href="javascript:void(0);" onclick="showpw(2)" id="showpw2" class="psw_xs_a">显示密码</a>
        <i class="psw_xs_icon"></i>
        <div class="psw_xs_tips none" id="tip2">你可以点击这里检查已填写的密码</div></div>
          </div>
        </li>
		<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_passconfirm']=='1') {?>
		<li class="mt10"><em><font color="#FF0000">*</font> 确认密码：</em>
			 <span id="pass1"><input type="password" id="passconfirm2" onBlur="reg_checkAjax('passconfirm2');" class="logoin_text tips_class" value=""/></span>
			 <span class="reg_tips reg_tips_red none" id="ajax_passconfirm2"></span>
	    </li>
		<?php }?>

       <li class="m10">
        <em>&nbsp;</em><input type="checkbox" id="xieyi2" class="logoin_check" value="1" checked="checked"/>
        <label for="isReadagreement">我已阅读<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/about/service.html" target="_blank" class="reg_yhxy"> 《<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
用户服务协议》</a> ，并自愿遵守该协议。</label>
        </li>
         <li class="mt20"><em>&nbsp;</em><input type="button" class="register_submit" id='subreg' value="立即注册" onclick="check_user(2,'vcode_img');"/></li>
     </ul>
    </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['type']->value=='3') {?>
    <div class="register_Switching_box" id="regtype3">
      <ul class="register_list">
        <li class="mt20 reg_re"><em><font color="#FF0000">*</font> 邮&nbsp;&nbsp;箱：</em>
        <input type="text" class="logoin_text tips_class" id="email3" onBlur="reg_checkAjax('email3');" onkeyup="get_def_email(this.value,'3');"/>
         <div class="reg_email_box none" id="defemail3"></div>
		 <span class="reg_tips reg_tips_red none" id="ajax_email3"></span>
        </li>
     <li class="mt20"><em><font color="#FF0000">*</font> 密&nbsp;&nbsp;码：</em>
     <span id="pass3"><input type="password" onkeyup="uppassword(3)" id="password3" onBlur="reg_checkAjax('password3');" class="logoin_text tips_class" value=""/></span>
     <span class="reg_tips reg_tips_red none" id="ajax_password3"></span>
     </li>
     <li><em>&nbsp;</em>
       <div class="kg_lgn_psw_strong">
       <div class="kg_lgn_psw_txt">密码强度:</div>
         <div class="kg_lgn_psw_strong_cnt">
         <span id="pass1_3" class="psw_span">危险</span>
         <span id="pass2_3" class="psw_span ">一般</span>
         <span id="pass3_3" class="psw_span ">安全</span>
        </div>
        <div class="psw_xs" onmousemove="showtip(3)" onmouseout="hidetip(3)">
        <a href="javascript:void(0);" onclick="showpw(3);" id="showpw3" class="psw_xs_a">显示密码</a>
        <i class="psw_xs_icon"></i>
        <div class="psw_xs_tips none" id="tip3">你可以点击这里检查已填写的密码</div></div>
          </div>
        </li>

		<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_passconfirm']=='1') {?>
		<li class="mt10"><em><font color="#FF0000">*</font> 确认密码：</em>
			 <span id="pass1"><input type="password" id="passconfirm3" onBlur="reg_checkAjax('passconfirm3');" class="logoin_text tips_class" value=""></span>
			 <span class="reg_tips reg_tips_red none" id="ajax_passconfirm3"></span>
	    </li>
		<?php }?>
		<?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"注册会员")!==false) {?>
        <li class="mt20">
		<?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']==3) {?>
			<!--geetest-->
             <em><font color="#FF0000">*</font> 安全验证：</em>
             <div class="reg_verification">
			<div id="popup-captcha" data-id='subreg' data-type='click'></div>
			<input type='hidden' id="popup-submit">
            </div>
		<?php } else { ?>

			<em><font color="#FF0000">*</font> 验证码：</em>
          <input id="CheckCode" type="text" class="logoin_text_yz" onBlur="reg_checkAjax('CheckCode');" maxlength="4"/>
          <img id="vcodeimg" class="authcode" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php"/><span class="reg_yz_look">看不清？
          <a href="javascript:void(0);" onclick="checkCode('vcodeimg');" class="registe_a">换一张</a></span>
          <span class="reg_tips reg_tips_red none" id="ajax_CheckCode"></span>

			<?php }?>
		 </li>
		 <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=="1") {?>
     <li class="mt20">
            <em><font color="#FF0000">*</font> 联系人真实姓名：</em>
            <input type="text" id="linkman" class="logoin_text tips_class" onBlur="reg_checkAjax('linkman');"/>
            <span class="reg_tips reg_tips_red none" id="ajax_linkman"></span>
     </li>

     <li class="mt20"><em><font color="#FF0000">*</font> 手机号码：</em>
     <input type="text" class="logoin_text tips_class" id="moblie" onBlur="reg_checkAjax('moblie');" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')"/>
     <span class="reg_tips reg_tips_red none" id="ajax_moblie"></span>
     </li>

     <li class="mt20"><em><font color="#FF0000">*</font> 短信验证：</em>
     <span style="float:left"><input type="text" id="moblie_code" class="logoin_text_yz" onBlur="reg_checkAjax('moblie_code');"/>
     <a class="reg_btn_s02_disable" href="javascript:void(0);" id="subreg" onclick="sendmsg('vcode_img');"><span id="time">获取短信验证</span></a></span>
     <span class="reg_tips reg_tips_red none" id="ajax_moblie_code"></span>
     </li>
     <?php } else { ?>
     <input type="hidden" id="moblie_code" date="1" value="1"/>
     <?php }?>

       <li class="m10">
        <em>&nbsp;</em><input type="checkbox" id="xieyi3" class="logoin_check" value="1" checked="checked"/>
        <label for="isReadagreement">我已阅读<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/about/service.html" target="_blank" class="reg_yhxy"> 《<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
用户服务协议》</a> ，并自愿遵守该协议。</label>
        </li>
         <li class="mt20"><em>&nbsp;</em><input type="button" class="register_submit" id="subreg" value="立即注册" onclick="check_user(3,'vcodeimg');"/></li>
     </ul>
     </div>
	   <?php }?>
     <?php }?>

	 <?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?>
     <div class="register_Switching_box" id="regtype1">
     <ul class="register_list">
         <li class="mt20">
             <label style="margin-left: 280px;color: #333;font-size: 18px;">企业账号注册</label>
         </li>
     <li class="mt20"><em><font color="#FF0000">*</font> 用户名：</em>
     <input type="text" id="username1" class="logoin_text tips_class" onBlur="reg_checkAjax('username1');"/>
     <span class="reg_tips reg_tips_red none" id="ajax_username1"></span>
     </li>
     <li class="mt20"><em><font color="#FF0000">*</font> 密&nbsp;&nbsp;码：</em>
     <span id="pass1"><input type="password" onkeyup="uppassword(1)" id="password1" onBlur="reg_checkAjax('password1');" class="logoin_text tips_class" value=""/></span>
     <span class="reg_tips reg_tips_red none" id="ajax_password1"></span>
     </li>
     <li class="reg_re"><em>&nbsp;</em>
       <div class="kg_lgn_psw_strong">
       <div class="kg_lgn_psw_txt">密码强度:</div>
         <div class="kg_lgn_psw_strong_cnt">
        <span id="pass1_1" class="psw_span">危险</span>
         <span id="pass2_1" class="psw_span ">一般</span>
         <span id="pass3_1" class="psw_span ">安全</span>
        </div>
        <div class="psw_xs" onmousemove="showtip(1)" onmouseout="hidetip(1)">
        <a href="javascript:void(0);" onclick="showpw(1);" id="showpw1" class="psw_xs_a">显示密码</a>
        <i class="psw_xs_icon"></i>
        <div class="psw_xs_tips none" id="tip1">你可以点击这里检查已填写的密码</div></div>
          </div>
        </li>
		<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_passconfirm']=='1') {?>
		<li class="mt10"><em><font color="#FF0000">*</font> 确认密码：</em>
			 <span id="pass1"><input type="password" id="passconfirm1" onBlur="reg_checkAjax('passconfirm1');" class="logoin_text tips_class" value=""/></span>
			 <span class="reg_tips reg_tips_red none" id="ajax_passconfirm1"></span>
	    </li>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comemail']=='1') {?>
        <li class="mt20 reg_re2"><em><font color="#FF0000">*</font> 邮&nbsp;&nbsp;箱：</em>
        <input type="text" class="logoin_text tips_class" id="email1" onBlur="reg_checkAjax('email1');" onkeyup="get_def_email(this.value,'1');"/>
         <div class="reg_email_box none" id="defemail1"></div>
		 <span class="reg_tips reg_tips_red none" id="ajax_email1"></span>
        </li>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comlink']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=="1") {?>
            <li class="mt20">
                <em><font color="#FF0000">*</font> 联系人真实姓名：</em>
                <input type="text" id="linkman" class="logoin_text tips_class" onBlur="reg_checkAjax('linkman');"/>
                <span class="reg_tips reg_tips_red none" id="ajax_linkman"></span>
            </li>
	    <?php }?>

	   <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comtel']=='1'||$_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=="1") {?>
     <li class="mt20"><em><font color="#FF0000">*</font> 联系手机：</em>
     <input type="text" id="linkphone" class="logoin_text tips_class" onBlur="reg_checkAjax('linkphone');" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')"/>
     <span class="reg_tips reg_tips_red none" id="ajax_linkphone"></span>
     </li>
	  <?php }?>

	<?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comname']=='1') {?>
     <li class="mt20"><em><font color="#FF0000">*</font> 公司名称：</em>
     <input type="text" id="unit_name" class="logoin_text tips_class" onBlur="reg_checkAjax('unit_name');"/>
     <span class="reg_tips reg_tips_red none" id="ajax_unit_name"></span>
     </li>
	 <?php }?>

	 <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_comaddress']=='1') {?>
     <li class="mt20"><em><font color="#FF0000">*</font> 公司地址：</em>
     <input type="text" id="address" class="logoin_text tips_class" onBlur="reg_checkAjax('address');"/>
     <span class="reg_tips reg_tips_red none" id="ajax_address"></span>
     </li>
	  <?php }?>
	<?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"注册会员")!==false) {?>
	<li class="mt20">
		<?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']==3) {?>
			<!--geetest-->
             <em><font color="#FF0000">*</font> 安全验证：</em>
             <div class="reg_verification">
			<div id="popup-captcha" data-id='subreg' data-type='click'></div>
			<input type='hidden' id="popup-submit">
            </div>
		<?php } else { ?>

		<em><font color="#FF0000">*</font> 验证码：</em>
	  <input id="CheckCode" type="text" class="logoin_text_yz" onBlur="reg_checkAjax('CheckCode');" maxlength="4"/>
	  <img id="vcode_imgs" class="authcode" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php"/><span class="reg_yz_look">看不清？
	  <a href="javascript:void(0);" onclick="checkCode('vcode_imgs');" class="registe_a">换一张</a></span>
	   <span class="reg_tips reg_tips_red none" id="ajax_CheckCode"></span>

		<?php }?>
	 </li>
	 <?php }?>

     <?php if ($_smarty_tpl->tpl_vars['config']->value['reg_real_name_check']=="1") {?>
     <li class="mt20"><em><font color="#FF0000">*</font> 短信验证：</em>
     <span style="float:left"><input type="text" id="moblie_code" class="logoin_text_yz" onBlur="reg_checkAjax('moblie_code');"/>
     <a class="reg_btn_s02_disable" href="javascript:void(0);" id="subreg" onclick="sendmsg('vcode_img');"><span id="time">获取短信验证</span></a></span>
     <span class="reg_tips reg_tips_red none" id="ajax_moblie_code"></span>
     </li>
     <?php } else { ?>
     <input type="hidden" id="moblie_code" date="1" value="1"/>
     <?php }?>

       <li class="m10">
        <em>&nbsp;</em><input type="checkbox" id="xieyi1" class="logoin_check" value="1" checked="checked"/>
        我已阅读<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/about/service.html" target="_blank" class="reg_yhxy"> 《<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
用户服务协议》</a> ，并自愿遵守该协议。
        </li>
         <li class="mt20">
             <em>&nbsp;</em><input type="button" class="register_submit" id='subreg'  value="立即注册" onclick="check_user('1','vcode_imgs');"/>
             <label  class="register_submit lablebeizhu"> 已有账号，<a class="linkbtn" href="<?php echo smarty_function_url(array('m'=>'login'),$_smarty_tpl);?>
">立即登录</a> </label>

         </li>
     </ul>
    </div>
	<?php }?>

      <input type="hidden" id="default" value="-1" />
      <input type="hidden" id="def" value="" />
      <input type="hidden" id="event" value="" />
      <input type="hidden" id="allnum" value="0" />
      <input type="hidden" id="send" value="0" />
      <input type="hidden" id="usertype" value="2" />
        </div>
    <div class="register_right">
             <!--<div class="register_right_reg">我要找工作<a href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>1,'type'=>1),$_smarty_tpl);?>
">注册个人账户</a></div>-->
        <div class="register_right_c">
            <a href="/index.php?m=register&usertype=3&type=1" class="btnsitem" style="background: #4e5c84">我是猎头，注册猎头账号>></a>
        </div>
        <div class="register_right_c">
            <a href="/index.php?m=register&usertype=1&type=1" class="btnsitem" style="background: #f26d49;">我是求职者，注册个人账号>></a>
        </div>
      <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']==1||$_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']==1||$_smarty_tpl->tpl_vars['config']->value['wx_author']==1) {?>
      <div class="register_right_c">使用合作网站账号登录 </div>

      <div class="box_third">

	  <?php if ($_smarty_tpl->tpl_vars['config']->value['wx_author']==1) {?>
                <a href="<?php echo smarty_function_url(array('m'=>'wxconnect'),$_smarty_tpl);?>
"><i class="l-icon weixin-icon"></i></a>
				<?php }?>

               <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']==1) {?> <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/qqlogin.php"><i class="l-icon qq-icon"></i></a> <?php }?> <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']==1&&$_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']==1) {
}?>
                 <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']==1) {?>
          <a href="<?php echo smarty_function_url(array('m'=>'sinaconnect'),$_smarty_tpl);?>
"><i class="l-icon sina-icon"></i></a>  <?php }?>
            </div>
      <?php }?> </div>
  </div>
</div>
<style>
.icon2 {
    background-image:none;
    background-repeat: no-repeat;
}
</style>
<!--content  end-->
<div class="clear"></div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/reg_ajax.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/geetest/gt.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/geetest/pc.js" type="text/javascript"><?php echo '</script'; ?>
>
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  DD_belatedPNG.fix('.png,.#bg');
<?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?>
$(document).ready(function () {
	$(document).keydown(function (e) {
        var ev = document.all ? window.event : e;
        if (ev.keyCode == 13) {
            check_user(1,'vcode_imgs');
        }
    });
    $("#xieyi1").keyup(function (event) {
        var myEvent = event || window.event;
        if (myEvent.keyCode == 13) { check_user(1,'vcode_imgs'); } else { return; };
    });
})
<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==2) {?>
$(document).ready(function () {
	$(document).keydown(function (e) {
        var ev = document.all ? window.event : e;
        if (ev.keyCode == 13) {
            check_user(2,'vcode_img');
        }
    });
    $("#xieyi2").keyup(function (event) {
        var myEvent = event || window.event;
        if (myEvent.keyCode == 13) { check_user(2,'vcode_img'); } else { return; };
    });
})
<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==3) {?>
$(document).ready(function () {
	$(document).keydown(function (e) {
        var ev = document.all ? window.event : e;
        if (ev.keyCode == 13) {
            check_user(3,'vcodeimg');
        }
    });
    $("#xieyi3").keyup(function (event) {
        var myEvent = event || window.event;
        if (myEvent.keyCode == 13) { check_user(3,'vcodeimg'); } else { return; };
    });
})
<?php }?>
$(function(){
	$('#regtype1').delegate('#areacode','focus',function(){
		if($.trim($(this).val())==$(this).attr('placeholder')){
			$(this).val('');
		}
	});
	$('#regtype1').delegate('#telphone','focus',function(){
		if($.trim($(this).val())==$(this).attr('placeholder')){
			$(this).val('');
		}
	});
	$('#regtype1').delegate('#exten','focus',function(){
		if($.trim($(this).val())==$(this).attr('placeholder')){
			$(this).val('');
		}
	});
});
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
