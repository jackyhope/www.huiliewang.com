<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-09-24 13:34:01
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/link/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:8309972305ba87749056c82-33341729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5284d0a71209bd9f8a0448cf8d20f4c13ceadeb' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/link/index.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8309972305ba87749056c82-33341729',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'linklist' => 0,
    'linklist2' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ba877490b09f6_09011076',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ba877490b09f6_09011076')) {function content_5ba877490b09f6_09011076($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" rel="stylesheet" type="text/css" />
</head>
<body style="background:#f8f8f8">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<div class="yun_content">
  <div class="clear"></div>
  <div class="yun_link_content">
  <div class="yun_link_content_tit">  <i class="yun_link_content_tit_icon"></i>��������</div>
  <ul class="yun_link_content_list">
  
  <?php  $_smarty_tpl->tpl_vars['linklist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['linklist']->_loop = false;
global $config;
		$domain='';
		if($config["cityid"]!="" || $config["hyclass"]!=""){
			include(PLUS_PATH."/domain_cache.php");
			$host_url=$_SERVER['HTTP_HOST'];
			foreach($site_domain as $v){
				if($v['host']==$host_url){
					$domain=$v['id'];
				}
			}
		}$tem_type = 2;
        include PLUS_PATH."/link.cache.php";
		if(is_array($link)){$linkList=array();
			$i=0;
			foreach($link as $key=>$value)
			{
				if($config["did"]!=0 && $value["did"]!=$config["did"])
				{
					continue;
				}elseif(is_numeric('2') && $value['tem_type']!='2' && $value['tem_type']!='1'){
					continue;

				}elseif((!is_numeric('2') || '2'=='1') && $value['tem_type']!='1'){

					continue;
				}elseif(!$config["did"] && $value["did"]>0){
					continue;
				}
				if(is_numeric('2') && $value['link_type']!='2')
				{
					continue;
				}
				if(is_numeric('') && intval('')<=$i)
				{
					break;
				}
				$value[picurl] = $config[sy_weburl]."/".$value[pic];
				$linkList[] = $value;
				$i++;
			}
		}$linkList = $linkList; if (!is_array($linkList) && !is_object($linkList)) { settype($linkList, 'array');}
foreach ($linkList as $_smarty_tpl->tpl_vars['linklist']->key => $_smarty_tpl->tpl_vars['linklist']->value) {
$_smarty_tpl->tpl_vars['linklist']->_loop = true;
?>
         <li><a href="<?php echo $_smarty_tpl->tpl_vars['linklist']->value['link_url'];?>
" target="_blank"><img style="width:120px;height:38px;" src="<?php echo $_smarty_tpl->tpl_vars['linklist']->value['pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['linklist']->value['link_name'];?>
" /></a></li>
         <?php } ?>
  
  </ul>
  <div class="yun_link_content_linkp">  <?php  $_smarty_tpl->tpl_vars['linklist2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['linklist2']->_loop = false;
global $config;
		$domain='';
		if($config["cityid"]!="" || $config["hyclass"]!=""){
			include(PLUS_PATH."/domain_cache.php");
			$host_url=$_SERVER['HTTP_HOST'];
			foreach($site_domain as $v){
				if($v['host']==$host_url){
					$domain=$v['id'];
				}
			}
		}$tem_type = 2;
        include PLUS_PATH."/link.cache.php";
		if(is_array($link)){$linkList=array();
			$i=0;
			foreach($link as $key=>$value)
			{
				if($config["did"]!=0 && $value["did"]!=$config["did"])
				{
					continue;
				}elseif(is_numeric('2') && $value['tem_type']!='2' && $value['tem_type']!='1'){
					continue;

				}elseif((!is_numeric('2') || '2'=='1') && $value['tem_type']!='1'){

					continue;
				}elseif(!$config["did"] && $value["did"]>0){
					continue;
				}
				if(is_numeric('1') && $value['link_type']!='1')
				{
					continue;
				}
				if(is_numeric('') && intval('')<=$i)
				{
					break;
				}
				$value[picurl] = $config[sy_weburl]."/".$value[pic];
				$linkList[] = $value;
				$i++;
			}
		}$linkList = $linkList; if (!is_array($linkList) && !is_object($linkList)) { settype($linkList, 'array');}
foreach ($linkList as $_smarty_tpl->tpl_vars['linklist2']->key => $_smarty_tpl->tpl_vars['linklist2']->value) {
$_smarty_tpl->tpl_vars['linklist2']->_loop = true;
?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['linklist2']->value['link_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['linklist2']->value['link_name'];?>
</a>
         <?php } ?></div>
  </div>
    <div class="yun_link_content">
  <div class="yun_link_content_tit"> <i class="yun_link_content_tit_icon"></i>������������</div>
  <div class="clear"></div>
 <div class="fri_left">
    <p> <strong>˵��:</strong> <br/>
      1������վΪ�˲������վ�� <br/>
      2������վҪ�ڰٶ�google���м�¼��¼������վ�����ٶȲ���̫���� <br/>
      3������֮ǰ����ȷ�Ϲ�վ�Ѿ��������ǵ����ӣ����ǻ���1-2��������ˡ� <br/>
      ��ַ��<span style="color:#006697;display: inline-block; *display:inline; zoom:1;font-family: Tahoma, Geneva, sans-serif;height: 25px;line-height: 25px;"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
</a></span> <br/>
      ���ƣ�<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
 <br/>
      ȫ��ҵ����ѯ�绰�� <br/>
      <span style="color:#ff5003;display: block;font-family: Tahoma, Geneva, sans-serif;font-size: 18px;font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</span> վ�����棺 <span style="color:#006697;display: inline-block; *display:inline; zoom:1;font-family: Tahoma, Geneva, sans-serif;height: 25px;line-height: 25px;"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webtel'];?>
</span> <br/>
      ���䣺 <span style="color:#006697;display: inline-block; *display:inline; zoom:1;font-family: Tahoma, Geneva, sans-serif;height: 25px;line-height: 25px;"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webemail'];?>
</span> </p>
  </div>
  <div class="fri_right">
    <form onsubmit="return checkform(this);"  target="supportiframe" enctype="multipart/form-data" method="post" action="" name="myform">
      <ul>
        <li> <strong>�������ͣ�</strong> 
        <div class="yun_link_select ">
        <input type="button" value="��ѡ��" id="linktype" class="yun_link_select_text" onclick="search_show('job_linktype')">
		<input type="hidden" value="" id="linktypeid" name="type">
        <div class="yun_link_select_list none" id="job_linktype">
		<a href="javascript:void(0);" onclick="check_link('1','��������')">��������</a>
		<a href="javascript:void(0);" onclick="check_link('2','ͼƬ����')">ͼƬ����</a>
		</div>
        </div>
    
           </li>
        <li> <strong>���ӱ��⣺</strong>
          <input class="bot" type="text" name="title" size="40" value=""/>
          ���������� </li>
        <li> <strong>���ӵ�ַ��</strong>
          <input class="bot" type="text" name="url" size="30" value=""/>
          ����http://www.huiliewang.com </li>
        <li class='photo none'> <strong>�� �� ͼ��</strong>
          <input type="radio" onclick="photo_change(this.value)" value="1" name="phototype" checked='checked'/>
          �ϴ�ͼƬ &nbsp;
          <input type="radio" onclick="photo_change(this.value)" value="2" name="phototype"/>
          Զ��ͼƬ </li>
        <li class='photo none'> <strong>&nbsp;</strong>
          <div id="image1">
            <input class="lin_filetext" type="file" size="40" name="uplocadpic" id="uplocadpic1"/>
          </div>
          <div id="image2" class="none">
            <input class="bot" type="text" size="40" name="uplocadpic" id="uplocadpic2"/>
            ����http://www.phpyun.com/yun.jpg </div>
        </li>
        <li> <strong>�� ֤ �룺</strong>
          <input id="txt_CheckCode" type="text" style="width:110px;" class="bot"  maxlength="4" name="authcode"/>
          <img id="vcode_img" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" style=" margin:0 5px 5px 5px; vertical-align:middle;"/>
          <a href="javascript:void(0);" onclick="checkCode('vcode_img');">������</a> 
          </li>
        <li> <strong>&nbsp;</strong>
          <input class="login_button2" type="submit" name="submit" value="�ύ"/>
        </li>
      </ul>
    </form>
    <div class="clear"></div>
  
  </div>
</div></div>
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
/js/lazyload.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
>
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
DD_belatedPNG.fix('.png,.index_logoin,.index_logoin_current,.nav_list,.fairs_Status,.fairs_Status,.logoin_qybj,.logoin_grbj,.logoin_Shadow_right,.logoin_Shadow_left,.whitebg,.micro_resume_fast,.nav_list_hover a,#bg,.left_comapply_cont li,.icon2,.nav_list .nav_list_hover em,.Fast_right_icon_l,.Fast_right_icon_r,.index_logoin_after,.logoin_after em,.logoin_after_su2,.logoin_after_su1,.hbg,.pagination li a,.firm_post_list,.Auction_tit,.yun_title,.Recommended_tit,.Com_Search_Results_r ul .All_post_h1_act,.sButtonBlock a.closeButton,.Comment_list_top,.icon,.yun_wap_m_bg,.micro_box');
<?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
>
function check_link(id,name){
    $("#linktype").val(name);
	$("#linktypeid").val(id);
	$("#job_linktype").hide();
    if (id == 2) {
        $(".photo").show();
    } else {
        $(".photo").hide();
    }
}
function photo_change(id){
	$(".photo div").hide();
	$("#image"+id).show();
}
function search_show(id){
	$("#"+id).show();
}
function selects(id,type,name){
	$("#job_"+type).hide();
	$("#"+type).val(name);
	$("#"+type+"id").val(id);
}
function checkform(myform){
  if($.trim(myform.type.value)==""){		
	layer.msg('��ѡ���������ͣ�', 2, 8);return false; 
      myform.type.focus();
      return (false);
  }	
  if($.trim(myform.title.value)==""){		
	layer.msg('����д���ӱ��⣡', 2, 8);return false; 
      myform.title.focus();
      return (false);
  }	
  if($.trim(myform.url.value)=="") {
      layer.msg('����д���ӵ�ַ��', 2, 8);return false; 
      myform.url.focus();
      return (false);
  }	
  if($.trim(myform.type.value)=="2"){ 
     if ($("#uplocadpic1").val()==""&&$("#uplocadpic2").val()=="") {
		layer.msg('ͼƬ����Ϊ�գ���', 2, 8);return false; 
	}	
  }
  if (myform.authcode.value==""){ 
	  layer.msg('����д��֤�룡', 2, 8);return false; 
      myform.authcode.focus();
      return (false);
  }	
  return true;
}	
<?php echo '</script'; ?>
>
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" class="none"></iframe>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
