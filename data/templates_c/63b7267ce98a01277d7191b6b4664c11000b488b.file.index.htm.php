<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-04 23:31:27
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/index/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:12297859355bb6324f470028-92124825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63b7267ce98a01277d7191b6b4664c11000b488b' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/index/index.htm',
      1 => 1526546740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12297859355bb6324f470028-92124825',
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
    'loginname' => 0,
    'lunbo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb6324f544e53_08628985',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb6324f544e53_08628985')) {function content_5bb6324f544e53_08628985($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name=keywords content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"/>
<meta name=description content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
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
        <div class="yun_welcome fl">��ӭ����<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
��</div>
       </div>
      <div class="top_right_re fr">
        <div class="top_right">

          <div class="yun_topNav fr" style="display: none;">
		  <a class="yun_navMore" href="javascript:;">��վ����</a>
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
/wap" class="wap_icon" target="_blank">�ֻ���</a><i class="htop_line">|</i><a href="<?php echo smarty_function_url(array('m'=>'subscribe'),$_smarty_tpl);?>
" target="_blank" class="top_dy">����</a><i class="htop_line_two">|</i></span>-->
            <?php echo '<script'; ?>
 language='JavaScript' src='<?php echo smarty_function_url(array('m'=>'ajax','c'=>'RedLoginHead'),$_smarty_tpl);?>
'><?php echo '</script'; ?>
>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="login_cont">
<div class="login_w960">
<div class="login_header ">
  <div class="logo fl" style="position:relative"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_logo'];?>
" class="png"></a></div>
  <!--<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
" class="logo_fh fr">������վ��ҳ>></a>-->
</div>

</div>
<div class="clear"></div>

<div class="logoin_cont_box">
<div class="login_left ">
<div class="login_box_cont">
<!--��¼��ʽѡ��-->
<div class="login_box_h1_d">
	<input type="hidden" name="act" id="act_login" value="0"/>
	<ul class="login_box_h_list" style="border-bottom: none;margin-bottom: 10px;padding-top: 10px;">
		<li id="acount_login" class="login_box_h_list_cur" style="width: 100%;color: #fff;">�˻������¼</li>
		<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_msg_isopen']==1&&$_smarty_tpl->tpl_vars['config']->value['sy_msg_login']==1) {?>
		<li id="mobile_login" style="width: 100%;">�ֻ��ŵ�¼<i class="login_box_h_icon"></i></li>
		<?php }?>
	</ul>
	<?php if ($_smarty_tpl->tpl_vars['config']->value['wx_author']=='1') {?>
	<div class="wxcode_login" title="΢��ɨһɨ��¼" style="display:block;"></div>
	<div class="normal_login" title="��ͨ��¼" style="display:none;"></div>
	<?php }?>
</div>
<!--ɨ���¼ҳ��-->
<div class="wx_login_show" style="display:none;">
	 <div id="wx_login_qrcode" class="wxlogintext">���ڻ�ȡ��ά��...</div>
	 <div class="wxlogintxt">��ʹ��΢��ɨһɨ��¼</div>
</div>
<!--��ͨ��¼-->
<div class="login_box_cot"  id="login_normal" style="">
	<!--�˺ŵ�¼-->
	<div class="login_normal_box" id="login_normal_box" style="">
		<div class="login_box_list logoin_re">
		  <input type="text" class="login_box_bth placeholder loginname" placeholder="�������û���" value="<?php if ($_smarty_tpl->tpl_vars['loginname']->value) {
echo $_smarty_tpl->tpl_vars['loginname']->value;
}?>"  name="username" id="username" autocomplete="off"/>
		  <div class="logoin_msg none" id="show_name">
		  <div class="logoin_msg_tx" >����д�û���</div>
		  <div class="logoin_msg_icon"></div>
		  </div>
		</div>
		<div class="login_box_list logoin_re_m">
			<input type="text" id="password2" class="login_box_bth placeholder loginname loginpwd" placeholder="�������¼����" autocomplete="off"/>
			<input type="password" id="password" name="password" class="login_box_bth placeholder loginname  none loginpwd" value=""/>
		  <div class="logoin_msg none" id="show_pass">
		  <div class="logoin_msg_tx" >����д����</div>
		  <div class="logoin_msg_icon"></div>
		  </div>
		</div>
	</div>
	<div class="clear"></div>
	<!--�ֻ���̬���¼-->
	<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_msg_isopen']==1&&$_smarty_tpl->tpl_vars['config']->value['sy_msg_login']==1) {?>
	<div class="login_sj_box" id="login_sj_box" style="display:none;">
	  <div class="login_box_list logoin_re">
	  	<input name="username" id="usermoblie" type="text" class="login_m_dt_text" value="�������ֻ�����">
	  	<div class="logoin_msg none" id="show_mobile">
		  <div class="logoin_msg_tx" >����д��ȷ���ֻ���</div>
		  <div class="logoin_msg_icon"></div>
		  </div>
	  </div>
	</div>
	<div class="clear"></div>
	<?php }?>

	<!--��֤��ѡ��-->
	<?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"ǰ̨��¼")!==false) {?>
		<?php if ($_smarty_tpl->tpl_vars['config']->value['code_kind']==3) {?>
	  <div class="login_verification">
			<div id="popup-captcha" data-id='sublogin' data-type='click'></div>
			<input type='hidden' id="popup-submit">
	  </div>
		<?php } else { ?>
		<div class="clear"></div>
		<div class="login_box_list logoin_re_m">
		<input style="border-right: none;" id="txt_CheckCode" type="text" class="login_box_bth_yz loginname  loginpyz" value="��������֤��" maxlength="4" name="authcode"  autocomplete="off"/>
			<div class="login_box_list_yzm" style="height: 42px;background: #fff;margin-left: 0;padding-left: 5px;">
				<img id="vcode_imgs" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" style="margin-top: 4px;" onclick="checkCode('vcode_imgs');"/>
		</div>
		<div class="logoin_msg none" id="show_code">
	    <div class="logoin_msg_tx" >��������֤��</div>
	    <div class="logoin_msg_icon"></div>
	    </div>
		</div>
		<?php }?>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_msg_isopen']==1&&$_smarty_tpl->tpl_vars['config']->value['sy_msg_login']==1) {?>
	<!--�ֻ���֤�������-->
	<div class="login_sj_box" id="login_sjyz_box" style="display:none;">
		<div class="login_box_list">
	  	<input name="password" type="text" class="login_m_text" id="dynamiccode" value="���Ŷ�̬��">
	  	<div class="logoin_msg none" id="show_dynamiccode">
		  <div class="logoin_msg_tx" >����д���Ŷ�̬��</div>
		  <div class="logoin_msg_icon"></div>
		  </div>
		  <a href="javascript:void(0);" class="login_m_send" id="send_msg_tip" onclick="send_msg2('<?php echo smarty_function_url(array('m'=>'login','c'=>'sendmsg'),$_smarty_tpl);?>
');">���Ͷ�̬��</span></span></a>
	  </div>
	</div>
	<?php }?>

	<!--��ס��¼״̬-->
	<div class="login_box_cz">
	  <span class="login_box_cz_l" style="color: #fff;">
		<input type="checkbox" name="loginname" value="1" class="index_logoin_check"/>
		<em class="fl">��ס��¼״̬</em></span> <a href="<?php echo smarty_function_url(array('m'=>'forgetpw'),$_smarty_tpl);?>
" class="fr" style="color: #fff;">�������룿</a>
	</div>
	<!--��¼-->
	<div class="clear"></div>
	<div class="login_box_cz">
	<input type="button" value="�� ¼" id='sublogin' class="login_box_bth2" onclick="check_login('<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
','vcode_imgs');"/>
	</div>
	<div class="tishis">��û���˺ţ�<a href="/index.php?m=register&usertype=1&type=1" class="zhucealink">����ע��</a></div>
	<!--������¼��ʽ-->
	<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']==1||$_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']==1||$_smarty_tpl->tpl_vars['config']->value['wx_author']==1) {?>
	  <div class="login_other">
	    <div class="login_other_left">������ʽ��¼��</div>
	    <div class="login_qq">
	    <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']==1) {?>
	    <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/qqlogin.php" class="png">QQ��¼</a>
	    <?php }?>
	    <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']==1) {?>
	    <a href="<?php echo smarty_function_url(array('m'=>'sinaconnect'),$_smarty_tpl);?>
" class="log_sina png">����΢��</a>
	    <?php }?>
	   <?php if ($_smarty_tpl->tpl_vars['config']->value['wx_author']==1) {?>
	    <a href="<?php echo smarty_function_url(array('m'=>'wxconnect'),$_smarty_tpl);?>
" class="log_wx png">΢��</a>
	    <?php }?>
	  </div>
	  </div>
	  <?php }?>
</div>
<div class="clear"></div>
</div>
</div></div>
<div class="clear"></div>
<!--banner-->
<div class="logoin_banner">
  <div class="flexslider">
    <ul class="slides">
      <?php  $_smarty_tpl->tpl_vars["lunbo"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["lunbo"]->_loop = false;
$AdArr=array();$paramer=array();
			include(PLUS_PATH.'/pimg_cache.php');$add_arr = $ad_label[37];if(is_array($add_arr) && !empty($add_arr)){
				$i=0;$limit = 0;$length = 0;
				foreach($add_arr as $key=>$value){
					if(($value['did']==$config['did'] ||$value['did']=='0')&&$value['start']<time()&&$value['end']>time()){
						if($i>0 && $limit==$i){
							break;
						}
						if($length>0){
							$value['name'] = mb_substr($value['name'],0,$length);
						}
						if($paramer['type']!=""){
							if($paramer['type'] == $value['type']){
								$AdArr[] = $value;
							}
						}else{
							$AdArr[] = $value;
						}
						$i++;
					}
				}
			}$AdArr = $AdArr; if (!is_array($AdArr) && !is_object($AdArr)) { settype($AdArr, 'array');}
foreach ($AdArr as $_smarty_tpl->tpl_vars["lunbo"]->key => $_smarty_tpl->tpl_vars["lunbo"]->value) {
$_smarty_tpl->tpl_vars["lunbo"]->_loop = true;
?>
      <li style="background: url(<?php echo $_smarty_tpl->tpl_vars['lunbo']->value['pic'];?>
) 50% 0 no-repeat;"> <a href="<?php echo $_smarty_tpl->tpl_vars['lunbo']->value['src'];?>
" target="_blank" style="display:block;width:100%;height:100%;"></a> </li>
      <?php } ?>
    </ul>
  </div>
</div>
<div class="clear"></div>
<div style="width:1200px; margin:0 auto">
<dl class="login_list">
<dt><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/log_img1.png" class="png"/></dt>
<dd>
<div class="login_list_h1">ǿ����˲ſ�ƽ̨</div>
<div class="login_list_p">5000���������˲����ݿ�</div>
</dd>
</dl>
<dl class="login_list">
<dt><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/log_img2.png" class="png"/></dt>
<dd>
<div class="login_list_h1">�̻���������,���Ϸ�������</div>
<div class="login_list_p">����ÿһ���и���ֻ���н������Ƹ
</div>
</dd>
</dl>
<dl class="login_list">
<dt><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/log_img3.png" class="png"/></dt>
<dd>
<div class="login_list_h1">������Ƹ������������Դ����ר��</div>
<div class="login_list_p">600��λ��Ƹ��ͷ��Ϊ��ҵ����HRϵͳ
</div>
</dd>
</dl>
</div>
</div>
</div>

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
/js/slides.jquery.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/jquery.flexslider.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/jcarousellite.js" type="text/javascript"><?php echo '</script'; ?>
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
DD_belatedPNG.fix('.png,.login_fast,.login_box_tit .login_cur');
<?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
>

$(document).ready(function(){
	$("#slides").slides({
		preload: true,
		preloadImage: '<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/loading.gif',
		play: 5000,
		pause: 2500,
		hoverPause: true
	});

	$("#username,#txt_CheckCode,#usermoblie,#dynamiccode").focus(function(){
		var txAreaVal = $(this).val();
		if( txAreaVal == this.defaultValue){$(this).val("");}
	}).blur(function(){
		var txAreaVal = $(this).val();
		if( txAreaVal == this.defaultValue||$(this).val()==""){$(this).val(this.defaultValue);}
	}).keydown(function (e) {
	    var ev = document.all ? window.event : e;
	    if (ev.keyCode == 13) {
	        check_login('<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
','vcode_imgs');
	    } else { return;}
	});

	$("#password2").focus(function(){
		$("#password").show();
		$("#password").focus();
		$("#password2").hide();
	})
	$("#password").blur(function(){
		if($("#password").val()==""){
			$("#password2").show();
			$("#password").hide();
		}
	}).keydown(function (e) {
	    var ev = document.all ? window.event : e;
	    if (ev.keyCode == 13) {
	        check_login('<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
','vcode_imgs');
	    } else { return; }
	});
	var setval;
	$('.wxcode_login').click(function(data){
		$('.wxcode_login').hide();
		$('.normal_login').show();
		$('#login_normal').hide();
		$('.login_box_h_list').hide();
		$('.wx_login_show').show();
		$.post('<?php echo smarty_function_url(array('m'=>'login','c'=>'wxlogin'),$_smarty_tpl);?>
',{t:1},function(data){
			if(data==0){
				$('#wx_login_qrcode').html('��ά���ȡʧ��..');
			}else{
				$('#wx_login_qrcode').html('<img src="'+data+'" width="100" height="100">');
				setval = setInterval("wxorderstatus()", 2000);
			}
		});
	});
	$('.normal_login').click(function(data){
		$('.wxcode_login').show();
		$('.normal_login').hide();
		$('#login_normal').show();
		$('.login_box_h_list').show();
		$('.wx_login_show').hide();
		clearInterval(setval);
	});
	//�˺ŵ�¼���ֻ���¼tabѡ��
	$('#acount_login').click(function(data){
		$('#acount_login').removeClass().addClass('login_box_h_list_cur');
		$('#mobile_login').removeClass();
		$('#login_normal_box').show();
		$('#login_sj_box').hide();
		$('#login_sjyz_box').hide();
		$('#act_login').val('0');
	});
	$('#mobile_login').click(function(data){
		$('#mobile_login').removeClass().addClass('login_box_h_list_cur');
		$('#acount_login').removeClass();
		$('#login_sj_box').show();
		$('#login_sjyz_box').show();
		$('#login_normal_box').hide();
		$('#act_login').val('1');
	});
});

$(window).load(function() {
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
});
function wxorderstatus() {
	$.post('<?php echo smarty_function_url(array('m'=>'login','c'=>'getwxloginstatus'),$_smarty_tpl);?>
',{t:1},function(data){
		var data=eval('('+data+')');
		if(data.url!='' && data.msg!=''){
			layer.msg(data.msg, 2, 9,function(){window.location.href=data.url;});
		}else if(data.url){
			window.location.href=data.url;
		}
	});
}
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
