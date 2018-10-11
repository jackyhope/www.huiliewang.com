<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-08 09:42:08
         compiled from "/home/wwwroot/www.huiliewang.com//app/template/member/lietou/header.htm" */ ?>
<?php /*%%SmartyHeaderCode:4048884255bbab5f0bdb541-47436997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c034c67ad0ad0612951f757ce6a64369d0fe8da' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com//app/template/member/lietou/header.htm',
      1 => 1518078812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4048884255bbab5f0bdb541-47436997',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'style' => 0,
    'lt_style' => 0,
    'maplist' => 0,
    'navlist_app' => 0,
    'msgNum' => 0,
    'jobApplyNum' => 0,
    'sysmsgNum' => 0,
    'jobAskNum' => 0,
    'username' => 0,
    'js_def' => 0,
    'lietou' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bbab5f0c66809_00006915',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bbab5f0c66809_00006915')) {function content_5bbab5f0c66809_00006915($_smarty_tpl) {?><!DOCTYPE span PUBLIC "-//W3C//DTD span 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>猎头用户后台管理系统 - <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
</title>
<meta http-equiv=Content-Type content="text/span; charset=gb2312"/> 
<meta http-equiv=X-UA-Compatible content="IE=edge"/>
<?php echo '<script'; ?>
>var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
";<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/iconfont.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/member_public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/m_style.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['lt_style']->value;?>
/images/user-n2012.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/lietou.css" rel="stylesheet" type="text/css" />

    <style>
        .header{
            background: #4b5873;
            width: 100% !important;
        }
        .header_mune li a{
            color: #fff;
        }
        .header_mune ul  a{
            border-bottom: none;
        }
        .header_mune ul .cur .links{
            color: #333;
            font-weight: inherit;
        }
        .header_mune ul .cur .xiala{
            color: #333;
        }
        .header_mune ul li .links{
            float: left;
            margin-left: 15px;
        }
        .header_mune ul .cur{
            background: #fff;
        }
        .header_mune ul li{
            width: 100px;
            height: 56px;
            line-height: 56px;
            margin-top: 4px;
            text-align: center;
            float: left;
            font-size: 14px;
             margin-left: 0px;
            color: #fff;
            cursor: pointer;
        }
        .header_mune ul .cur{
            color: #333;
        }
        .header_mune ul .cur:hover .nichengs {
            color: #333;
        }
        .header_mune ul{
            margin-top: 0;
            height: 74px;
        }
        .header_mune ul  a{
            padding: 0;
        }
        .header_mune ul  a:hover{
            text-decoration: none;
        }
        .header_mune ul,.header_mune{
            float: left;
        }
        .xiala{
            width: 12px;
            height: 12px;
        }
        .header_mune ul li:hover{
            background: #3e4b65;
        }
        .header_mune ul .cur:hover{
            background: #fff;
        }
        .header_mune ul li:hover .hoverss1{
            display: block;
        }
        .header_mune ul li a:hover{
            color: #fff;
        }
        .header_mune ul .cur:hover{
            color: #333;
        }
        .header_mune ul .cur:hover .xiala{
            color: #333;
        }
        .header_mune ul li:hover label, .header_mune ul li:hover .xiala{
            color: #fff;
        }
        #zhsz{
            width: 150px !important;
            position: relative;
        }
        .xiaoxi{
            position: absolute;
            width: 6px;
            height: 6px;
            display: inline-block;
            background: red;
            border-radius: 100%;
            left: 90px;
            top: 10px;
        }
        .xialabtn{
            position: absolute;
            width: 150px;
            height:auto;
            z-index: 9999;
            background: #3e4b65;
            top: 56px;
            display: none;
        }
        .w100{
            width: 120px;
            text-align: left;
        }
        .w40{
            margin-left: 40px;
        }
        .xialabtn a{
            line-height: 40px;
            height: 40px;
            color: #fff !important;
        }
        .xialabtn a:hover{
            background: #202a40;
        }
        .header_mune ul li:hover .xialabtn{
            display: block;
        }
        .header .header-logo{
            float: right;
        }
        .touxiangpic{
            width: 30px;
            height: 30px;
            float: left;
            margin-top: 15px;
            margin-left: 6px;
            border-radius: 100%;
        }
        .nichengs{
            margin-left: 6px;
            max-width: 80px;
            overflow: hidden;
            float: left;
            display: inline-block;
        }
        .com_index_sign{
            display: none;
        }
        .signdiv{
            display: none;
        }
        .hoverss1{
            display: none;
            background: #fff;
            position: absolute;
            left: 0;
            z-index: 9999;
        }
        .widcen{
            width: 100%;
            text-align: center;
        }
        .header_mune ul li .widcen{
            margin-left: 0;
        }
        .w20{
            margin-left: 15px;
        }
        .xxtinum{
            height: 18px;
            display: inline-block;
            padding-left: 3px;
            padding-right: 3px;
            line-height: 16px;
            font-size: 12px;
            background: red;
            color: #fff;
            border-radius: 2px;
            margin-left: 10px;
        }
        .xialabtn a{
            text-align: left;
        }
    </style>
<?php echo '<script'; ?>
>
/*屏蔽所有的js错误*/
//function killerrors() {return true;}
//window.onerror = killerrors;
//var integral_pricename='<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
';
<?php echo '</script'; ?>
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
</head>
<body style="position: relative">
<header>
<div class="header_top_main">
<div class="w1000">
<div class="header_top_main_left">欢迎来到<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
！ </div>

<div class="yun_topNav fr">
  <a class="yun_navMore" href="javascript:;">网站导航</a>
  <div class="yun_webMoredown" style="display: none;">
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
</a>
          </li>
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
</a> 
            </li>
          <?php } ?>
      </ul> 
    </div>
  </div>
</div>

  <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
" class="header_m_tc_home">网站首页</a>
  

<?php if ($_smarty_tpl->tpl_vars['msgNum']->value>0) {?>
    <div class="header_Remind fr header_Remind_hover"> 
      <em class="header_Remind_em "><i class="header_Remind_msg"></i></em>
      <div class="header_Remind_list" style="display:none;">
        <?php if ($_smarty_tpl->tpl_vars['jobApplyNum']->value) {?>
        <div class="header_Remind_list_a">
          <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=hr" class="fl">职位申请</a>  
          <span class="header_Remind_list_r fr">(<?php echo $_smarty_tpl->tpl_vars['jobApplyNum']->value;?>
)</span>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['sysmsgNum']->value) {?>
        <div class="header_Remind_list_a">
          <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=sysnews"class="fl"> 系统消息</a>
          <span class="header_Remind_list_r fr">(<?php echo $_smarty_tpl->tpl_vars['sysmsgNum']->value;?>
)</span>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['jobAskNum']->value) {?>
        <div class="header_Remind_list_a">
          <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=msg"class="fl">求职咨询</a>
          <span class="header_Remind_list_r fr">(<?php echo $_smarty_tpl->tpl_vars['jobAskNum']->value;?>
)</span> 
        </div>
        <?php }?>
      </div>
    </div> 
 <?php }?>


 <a  href="javascript:void(0)"  onclick="logout('index.php?act=logout')" class="header_m_tc">退出</a>
  <span class="header_m_username"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span>
</div>
</div>
<div class="header">
  <div class="w1000">

   <nav>
    <div class="header_mune">
         <ul>
             <li <?php if ($_smarty_tpl->tpl_vars['js_def']->value==1) {?> class=cur<?php }?>>
                 <a href="/member/index.php?c=index"  class="links widcen">首页</a>
             </li>
             <li <?php if ($_smarty_tpl->tpl_vars['js_def']->value==8) {?> class=cur<?php }?>>
                 <a href="/member/index.php?c=resume&act=searchbox"  class="links widcen">人才搜索</a>
             </li>
             <li <?php if ($_smarty_tpl->tpl_vars['js_def']->value==2) {?> class=cur<?php }?>>
                 <a href="/member/index.php?c=job" class="links">订单管理</a>
                 <svg class="icon xiala">
                     <use xlink:href="#icon-xiala"></use>
                 </svg>
                 <div class="xialabtn w100">
                     <a href="/member/index.php?c=job" title="平台职位库"><label class="w20"></label>平台职位库</a>
                     <a href="/member/index.php?c=job&w=1" title="关注的职位"><label class="w20"></label>关注的职位</a>
                     <a href="/member/index.php?c=job&w=2" title="已推荐的职位"><label class="w20"></label>已推荐的职位</a>
                 </div>
             </li>
             <li <?php if ($_smarty_tpl->tpl_vars['js_def']->value==3) {?> class=cur<?php }?>>
                 <a href="/member/index.php?c=job&act=mylist"  class="links">职位管理</a>
                 <svg class="icon xiala">
                     <use xlink:href="#icon-xiala"></use>
                 </svg>
                 <div class="xialabtn w100">
                     <a href="/member/index.php?c=job&act=mylist" title="我发布的职位"><label class="w20"></label>我发布的职位</a>
                     <a href="/member/index.php?c=job&act=mylist&w=4" title="下架的职位"><label class="w20"></label>下架的职位</a>
                     <a href="/member/index.php?c=jobadd" title="发布新职位"><label class="w20"></label>发布新职位</a>
                 </div>
             </li>
             <li <?php if ($_smarty_tpl->tpl_vars['js_def']->value==5) {?> class=cur<?php }?>>
                 <a href="/member/index.php?c=resume&act=myself"  class="links">简历管理</a>
                 <svg class="icon xiala">
                     <use xlink:href="#icon-xiala"></use>
                 </svg>
                 <div class="xialabtn w100">
                     <!--<a href="/member/index.php?c=resume&act=index" title="平台简历库"><label class="w20"></label>平台简历库</a>-->
                     <a href="/member/index.php?c=resume&act=myself" title="我上传的简历"><label class="w20"></label>我上传的简历</a>
                     <a href="/member/index.php?c=resume&act=resumefav" title="收藏的简历"><label class="w20"></label>收藏的简历</a>
                     <a href="/member/index.php?c=resume&act=recommend" title="已推荐的简历"><label class="w20"></label>已推荐的简历</a>
                     <a href="/member/index.php?c=resume&act=recommend" title="已的简历"><label class="w20"></label>已下载的简历</a>
                     <a href="/member/index.php?c=apply" title="应聘来的简历"><label class="w20"></label>应聘来的简历</a>
                 </div>
             </li>
             <li <?php if ($_smarty_tpl->tpl_vars['js_def']->value==4) {?> class=cur<?php }?>>
                 <a href="/member/index.php?c=yj"  class="links widcen">业绩管理</a>
             </li>
             <li id="zhsz" <?php if ($_smarty_tpl->tpl_vars['js_def']->value==7) {?> class=cur<?php }?>>
                 <!--<label class="xiaoxi"></label>-->
                 <img src="<?php if ($_smarty_tpl->tpl_vars['lietou']->value['logo']) {?>.<?php echo $_smarty_tpl->tpl_vars['lietou']->value['logo'];
} else { ?> <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/member/lietou/images/lienopic.png <?php }?>" class="touxiangpic"/>
                 <label class="nichengs nowrap"><?php if ($_smarty_tpl->tpl_vars['lietou']->value['name']) {
echo $_smarty_tpl->tpl_vars['lietou']->value['name'];
} else {
echo $_smarty_tpl->tpl_vars['username']->value;
}?></label>
                 <svg class="icon xiala">
                    <use xlink:href="#icon-xiala"></use>
                 </svg>
                 <div class="xialabtn">
                    <a href="/member/index.php?c=info"><label class="w40"></label>基本信息</a>
                    <a href="/member/index.php?c=sysnews"><label class="w40"></label>系统消息
                        <!--<span class="xxtinum">1</span>-->
                    </a>
                    <a href="/member/index.php?c=vs"><label class="w40"></label>修改密码</a>
                    <a href="javascript:void(0)"  onclick="logout('index.php?act=logout')"><label class="w40"></label>安全退出</a>
                 </div>
             </li>
         </ul>
      </div>
      </nav>
      <div class="header-logo fltL"><a href="/member/index.php?c=index"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/member/images/logo_ff.png" class="png" ></a></div>
  </div>
</div>
<div class="clear"></div>
    <?php echo '<script'; ?>
>
        $(document).click(function(e){
            var _con = $('#zhsz');   // 设置目标区域
            if(!_con.is(e.target) && _con.has(e.target).length === 0){
                if($(".xialabtn").css("display")=="block"){
                    $(".xialabtn").hide();
                }
            }
        });


//window.onscroll=function(){
//    var topScroll =document.body.scrollTop;//滚动的距离,距离顶部的距离
//    var bignav  = $(".header");//获取到导航栏id
//    if(topScroll > 200){
//        bignav.css({"position":"fixed","top":"0","z-index":"9998"});
//    }else{
//        bignav.css("position","relative");
//    }
//}
    <?php echo '</script'; ?>
>
</header><?php }} ?>
