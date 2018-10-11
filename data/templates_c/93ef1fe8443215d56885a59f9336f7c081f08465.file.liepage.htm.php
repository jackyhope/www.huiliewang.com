<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-08-27 12:26:28
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/lietou/liepage.htm" */ ?>
<?php /*%%SmartyHeaderCode:645674275b837d740a2196-57621095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93ef1fe8443215d56885a59f9336f7c081f08465' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/lietou/liepage.htm',
      1 => 1519270974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '645674275b837d740a2196-57621095',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'usertype' => 0,
    'lietou' => 0,
    'job' => 0,
    'li' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b837d74118a21_17180261',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b837d74118a21_17180261')) {function content_5b837d74118a21_17180261($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
/style/comapply.css" type="text/css"/>
    <link rel="stylesheet" href="/app/template/company/default/images/comapply.css" type="text/css" />
</head>
<body class="body_bg">
    <?php if ($_smarty_tpl->tpl_vars['usertype']->value==3) {?>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ltstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="bg_top"></div>
    <?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="bg_top" style="top: 190px;"></div>
    <?php }?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/ltqy_detail.css" type="text/css"/>


<div class="yun_content" style="width: 1100px;">
  <div class="comappiy_left_box fl" style="width: 760px;">
        <div class="Company_post_box" style="background:#fff;margin-top: 20px;float: left;">
            <div class="fl" style="width: 100%">
                <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_wen.png" class="lielogo"/>
                <div class="jiesll">
                    <div class="liename1"><?php echo $_smarty_tpl->tpl_vars['lietou']->value['name'];?>
</div>
                    <div style="margin-top: 20px">擅长行业：<?php echo $_smarty_tpl->tpl_vars['lietou']->value['hy'];?>
</div>
                    <div style="margin-top: 15px">所在公司：<?php echo $_smarty_tpl->tpl_vars['lietou']->value['com_name'];?>
</div>
                </div>
            </div>
            <div class="contentll">
                <div class="biaodian">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_biao.png"/>
                </div>
                <div class="content22"><?php echo $_smarty_tpl->tpl_vars['lietou']->value['content'];?>
</div>
            </div>
                <div class="zhiweifw">
                <div class="top_zw">TA正在发布的职位</div>
                <ul class="job_lists">
                    <?php  $_smarty_tpl->tpl_vars['li'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['li']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['li']->key => $_smarty_tpl->tpl_vars['li']->value) {
$_smarty_tpl->tpl_vars['li']->_loop = true;
?>
                    <li class="job_listsli">
                        <a class="btnkss" href="#">立即查看</a>
                        <div>
                            <a href="#"><?php echo $_smarty_tpl->tpl_vars['li']->value['name'];?>
</a>
                        </div>
                        <div>
                            <label class="coloess"><svg class="icon wihe16" aria-hidden="true">
                                        <use xlink:href="#icon-xinzi"></use>
                                    </svg>
                                <?php if ($_smarty_tpl->tpl_vars['li']->value['minsalary']&&$_smarty_tpl->tpl_vars['li']->value['maxsalary']) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['li']->value['minsalary'];?>
-<?php echo $_smarty_tpl->tpl_vars['li']->value['maxsalary'];?>

                                <?php } elseif ($_smarty_tpl->tpl_vars['li']->value['minsalary']&&empty($_smarty_tpl->tpl_vars['li']->value['maxsalary'])) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['li']->value['minsalary'];?>
以上
                                <?php } else { ?>
                                    面议
                                <?php }?>

                            </label>
                            <label class="coloe66"><svg class="icon wihe16" aria-hidden="true">
                                <use xlink:href="#icon-didian"></use>
                            </svg>上海
                            </label>
                            <label class="coloe66"><svg class="icon wihe16" aria-hidden="true">
                                <use xlink:href="#icon-hangye"></use>
                            </svg>工作经验不限
                            </label>
                            <label class="coloe66">
                                <span class="comshow_job_xl">高中学历</span>
                            </label>
                        </div>
                        <div class="colo999">发布时间：2018-2-5</div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
  </div>


  <div class="Compply_right_sidebar" style="width: 320px;overflow: inherit;">
      <div class="Compply_right_post" style="margin-bottom: 20px;margin-top: 0;width: 320px;">
          <div class="tj_kuai">
              <div class="ll_kuai">
                  <p class="numddd">1</p>
                  <div class="ccolo">
                      <svg class="icon wihe16" aria-hidden="true">
                          <use xlink:href="#icon-HRgongzuo"></use>
                      </svg>推荐候选人数</div>
              </div>
              <div class="ll_kuai">
                  <p class="numddd">1</p>
                  <div class="ccolo">
                      <svg class="icon wihe16" aria-hidden="true">
                          <use xlink:href="#icon-zhiweiguanli"></use>
                      </svg>服务职位数</div>
              </div>
          </div>
          <div class="top_zw pabttb">TA正在发布的职位</div>
          <div class="tj_lv">
            <div class="hang_lv">
                推荐查看率：<span class="colored">44%</span>
                <span class="eeerigh">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_wen.png"/>
                    <div class="jieshi">
                        <p>推荐查看率：</p>
                        <p>推荐候选人HR查看数/该猎头推荐简历数</p>
                    </div>
                </span>
            </div>
              <div class="hang_lv" style="margin-top: 10px;">
                  推荐下载率：<span class="colored">44%</span>
                  <span class="eeerigh">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_wen.png"/>
                      <div class="jieshi">
                        <p>推荐下载率：</p>
                        <p>推荐候选人HR下载数/该猎头推荐简历数</p>
                    </div>
                </span>
              </div>
          </div>
          <div class="top_zw pabttb">服务过的企业客户</div>
          <div class="tj_lv">
              <a class="items_logo" href="#">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_wen.png" class="logo_img"/>
              </a>
              <a class="items_logo" href="#">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_wen.png" class="logo_img"/>
              </a>
              <a class="items_logo" href="#">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_wen.png" class="logo_img"/>
              </a>
              <a class="items_logo" href="#">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_wen.png" class="logo_img"/>
              </a>
              <a class="items_logo" href="#">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_wen.png" class="logo_img"/>
              </a>
              <a class="items_logo" href="#">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ico_wen.png" class="logo_img"/>
              </a>
          </div>
      </div>
  </div>

</div>

    <?php echo '<script'; ?>
 type="" src="http://localhost/app/template/default/js/iconfont.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
>



<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/login.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
