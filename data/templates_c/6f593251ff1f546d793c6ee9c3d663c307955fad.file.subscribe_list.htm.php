<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:55
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/subscribe_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:20088837965afd457bbd03b4-11547795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f593251ff1f546d793c6ee9c3d663c307955fad' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/subscribe_list.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20088837965afd457bbd03b4-11547795',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'type' => 0,
    'rows' => 0,
    'v' => 0,
    'pagenav' => 0,
    'pytoken' => 0,
    'q_report' => 0,
    'r' => 0,
    'back_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd457bd115e9_74008543',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd457bd115e9_74008543')) {function content_5afd457bd115e9_74008543($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_searchurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.searchurl.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/admin_public.js" language="javascript"><?php echo '</script'; ?>
>
<title>后台管理</title>
</head>
<body class="body_ifm">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['adminstyle']->value)."/member_send_email.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
   <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
<?php if ($_smarty_tpl->tpl_vars['type']->value!='1') {?>
  <div class="admin_Filter"> 
  <span class="complay_top_span fl">订阅管理</span>
      <form action="index.php" name="myform" method="get">
        <input name="m" value="subscribe" type="hidden"/>	
		<span class="admin_Filter_span"> 检索邮箱：</span>	
        <input class="admin_Filter_search" type="text" name="keyword"  size="25" style="float:left">
        <input  class="admin_Filter_bth"  type="submit" name="qysearch" value="检索"/>
			  <span class='admin_search_div'>
		  <div class="admin_adv_search"><div class="admin_adv_search_bth">高级搜索</div></div>   
	  </span>
      </form>
    </div> 
<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="table-list">
    <div class="admin_table_border">

      <form action="index.php" name="myform" method="get" target="supportiframe" id='myform'>
        <input name="m" value="subscribe" type="hidden"/>
        <input name="c" value="del" type="hidden"/>
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th style="width:20px;"><label for="chkall"><input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/></label></th> 
              <th>ID</th>                                           
              <th align="left">订阅邮箱</th>
              <th>发送周期</th>
              <th>订阅类型</th>              
              <th align="left">工作地点</th>              
              <th align="left">职位类别</th>             
              <th align="left">月薪范围</th>
              <th>订阅时间</th>
              <th>状态</th>
              <th class="admin_table_th_bg">操作</th>
            </tr>
          </thead>
          <tbody>
          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
          <tr align="center" id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['v']->value['time'];?>
天</td>
            <td><?php if ($_smarty_tpl->tpl_vars['v']->value['type']=="1") {?>订阅职位<?php } else { ?>订阅简历<?php }?></td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['provinceid'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['cityid'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['three_cityid'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['job1'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['job1_son'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['job_post'];?>
</td>
            <td align="left"><?php if ($_smarty_tpl->tpl_vars['v']->value['minsalary']&&$_smarty_tpl->tpl_vars['v']->value['maxsalary']) {?>￥<?php echo $_smarty_tpl->tpl_vars['v']->value['minsalary'];?>
-<?php echo $_smarty_tpl->tpl_vars['v']->value['maxsalary'];
} elseif ($_smarty_tpl->tpl_vars['v']->value['minsalary']) {?>￥<?php echo $_smarty_tpl->tpl_vars['v']->value['minsalary'];?>
以上<?php } else { ?>面议<?php }?></td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['ctime'],"%Y-%m-%d");?>
</td> 
            <td><?php if ($_smarty_tpl->tpl_vars['v']->value['status']!="1") {?><span class="admin_com_Lock">未认证</span><?php } else { ?><span class="admin_com_Audited">已认证</span><?php }?></td>           
            <td><a href="javascript:void(0)" onClick="layer_del('确定要删除？', 'index.php?m=subscribe&c=del&del=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');"class="admin_cz_sc">删除</a></td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
          <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
          <td colspan="3" >
          <label for="chkAll2">全选</label>
            <input class="admin_submit4" type="button" name="delsub" value="删除所选"  onclick="return really('del[]')"/></td>
            <td colspan="7" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
          </tr>
            </tbody>
        </table>
		<input type="hidden" name="pytoken"  id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      </form>
    </div>
  </div>
<?php } else { ?>
  <div class="admin_Filter">  
      <form action="index.php" name="myform" method="get"  id='myform'> 
        <input name="m" value="report" type="hidden"/>
        <input name="type" value="1" type="hidden"/>
		  <span class="admin_Filter_span"> 检索类型：</span>  
		  <div class="admin_Filter_text formselect"  did='dr_type'>
		  <input type="button" value="<?php if ($_GET['r_type']=='1'||$_GET['r_type']=='') {?>问题<?php } elseif ($_GET['r_type']=='2') {?>回答<?php } else { ?>举报者<?php }?>" class="admin_Filter_but"  id="br_type">
		  <input type="hidden" id='r_type' value="<?php if ($_GET['r_type']) {
echo $_GET['r_type'];
} else { ?>1<?php }?>" name='r_type'>
		  <div class="admin_Filter_text_box" style="display:none" id='dr_type'>
			  <ul>
			  <li><a href="javascript:void(0)" onClick="formselect('1','r_type','问题')">问题</a></li>
			  <li><a href="javascript:void(0)" onClick="formselect('2','r_type','回答')">回答</a></li> 
			  <li><a href="javascript:void(0)" onClick="formselect('3','r_type','评价')">评价</a></li> 
			  </ul>  
		  </div>
		</div>  
		<div class="admin_Filter_text formselect"  did='dp_type' style="margin-left:10px;">
		  <input type="button" value="<?php if ($_GET['p_type']=='1'||$_GET['p_type']=='') {?>被举报者<?php } else { ?>举报者<?php }?>" class="admin_Filter_but"  id="bp_type">
		  <input type="hidden" id='p_type' value="<?php if ($_GET['p_type']) {
echo $_GET['p_type'];
} else { ?>1<?php }?>" name='p_type'>
		  <div class="admin_Filter_text_box" style="display:none" id='dp_type'>
			  <ul>
			  <li><a href="javascript:void(0)" onClick="formselect('1','p_type','被举报者')">被举报者</a></li>
			  <li><a href="javascript:void(0)" onClick="formselect('2','p_type','举报者')">举报者</a></li> 
			  </ul>  
		  </div>
		</div> 
        <input class="admin_Filter_search" type="text" name="question"  size="25" style="float:left">
        <input  class="admin_Filter_bth"  type="submit" name="comquestion" value="检索"/>
		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
     
	  <span class='admin_search_div'>
		  <div class="admin_adv_search"><div class="admin_adv_search_bth">高级搜索</div></div>  
		</span> 
	 </form>
    </div> 
  <div class="search_select">
	<?php if ($_GET['status']!='') {?><a class="Search_jobs_c_a" href="<?php echo smarty_function_searchurl(array('m'=>'report','type'=>1,'untype'=>'status'),$_smarty_tpl);?>
">审核状态：<?php if ($_GET['status']=='0') {?>未处理<?php } elseif ($_GET['status']=='1') {?>已处理<?php }?></a><?php }?>  
</div>
<div class="admin_adv_search_box">
  <div class="admin_adv_search_list admin_adv_search_list_bg">
	<div class="admin_adv_search_left">审核状态</div>
  <div class="admin_adv_search_right">
	<a href="<?php echo smarty_function_searchurl(array('m'=>'report','type'=>1,'untype'=>'status'),$_smarty_tpl);?>
" <?php if ($_GET['status']=='') {?>class="admin_adv_search_cur"<?php }?>>不限</a>
	<a href="<?php echo smarty_function_searchurl(array('m'=>'report','status'=>0,'type'=>1,'untype'=>'status'),$_smarty_tpl);?>
" <?php if ($_GET['status']=='0') {?>class="admin_adv_search_cur"<?php }?>>未处理</a> 
	<a href="<?php echo smarty_function_searchurl(array('m'=>'report','status'=>1,'type'=>1,'untype'=>'status'),$_smarty_tpl);?>
" <?php if ($_GET['status']=='1') {?>class="admin_adv_search_cur"<?php }?>>已处理</a>  </div></div> 
  <div class="admin_adv_search_icon"><i class="admin_adv_search_icon_i">&nbsp;</i></div>
</div>
<div class="clear"></div>
  <div class="table-list">
    <div class="admin_table_border">
		<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php" name="myform" method="get" id='myform'  target="supportiframe" >
        <input name="m" value="report" type="hidden"/>
        <input name="c" value="del" type="hidden"/>
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th><label for="chkall"><input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/></label></th>
              <th>
			  <?php if ($_GET['t']=="id"&&$_GET['order']=="asc") {?>
			  <a href="<?php echo smarty_function_searchurl(array('type'=>1,'order'=>'desc','t'=>'id','m'=>'report','untype'=>'order,t,type'),$_smarty_tpl);?>
">编号<img src="images/sanj.jpg"/></a>
              <?php } else { ?>
              <a href="<?php echo smarty_function_searchurl(array('type'=>1,'order'=>'asc','t'=>'id','m'=>'report','untype'=>'order,t,type'),$_smarty_tpl);?>
">编号<img src="images/sanj2.jpg"/></a>
              <?php }?>
			  </th>
              <th >被举报者</th>
              <th >举报者</th>
              <th >举报类型</th>
              <th >举报来源</th>
              <th >是否处理</th>
              <th >举报原因</th>
              <th>
			  <?php if ($_GET['t']=="inputtime"&&$_GET['order']=="asc") {?>
			  <a href="<?php echo smarty_function_searchurl(array('type'=>1,'order'=>'desc','t'=>'inputtime','m'=>'report','untype'=>'order,t,type'),$_smarty_tpl);?>
">举报时间<img src="images/sanj.jpg"/></a>
              <?php } else { ?>
              <a href="<?php echo smarty_function_searchurl(array('type'=>1,'order'=>'asc','t'=>'inputtime','m'=>'report','untype'=>'order,t,type'),$_smarty_tpl);?>
">举报时间<img src="images/sanj2.jpg"/></a>
              <?php }?>
			  </th>
              <th class="admin_table_th_bg">操作</th>
            </tr>
          </thead>
          <tbody>
          <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['q_report']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
          <tr align="center" id="list<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
">
            <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
            <td align="left" class="td1"><span><?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
</span></td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['r']->value['r_name'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['r']->value['username'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['r']->value['r_type']=='1') {?>问题<?php } elseif ($_smarty_tpl->tpl_vars['r']->value['r_type']=='2') {?>回答<?php } elseif ($_smarty_tpl->tpl_vars['r']->value['r_type']=='3') {?>评论<?php }?></td>
            <td align="left"><?php if ($_smarty_tpl->tpl_vars['r']->value['is_del']) {?><font color="red"><?php echo $_smarty_tpl->tpl_vars['r']->value['is_del'];?>
</font><?php } elseif ($_smarty_tpl->tpl_vars['r']->value['status']!="1") {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['r']->value['url'];?>
" target="_blank"><?php echo mb_substr($_smarty_tpl->tpl_vars['r']->value['title'],0,20,'gbk');?>
</a>
            <?php } else { ?>
            <?php echo mb_substr($_smarty_tpl->tpl_vars['r']->value['title'],0,20,'gbk');?>

            <?php }?></td>
            <td id="status<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['r']->value['is_del']) {?><font color="red"><?php echo $_smarty_tpl->tpl_vars['r']->value['is_del'];?>
</font><?php } elseif ($_smarty_tpl->tpl_vars['r']->value['status']=="1") {?><a href="javascript:void(0);" onClick="rec_up('index.php?m=report&c=recommend','<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
','0','status');"><img src="../config/ajax_img/doneico.gif"></a><?php } else { ?><a href="javascript:void(0);" onClick="rec_up('index.php?m=report&c=recommend','<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
','1','status');"><img src="../config/ajax_img/errorico.gif"></a><?php }?></td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['r']->value['reason'];?>
</td>
            <td class="td"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value['inputtime'],"%Y-%m-%d %H:%M");?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['r']->value['is_del']=='') {?><a href="index.php?m=admin_question&c=<?php echo $_smarty_tpl->tpl_vars['r']->value['c'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['r']->value['eid'];?>
&back_url=<?php echo $_smarty_tpl->tpl_vars['back_url']->value;?>
">
            <img src="images/iconv/button_edit.png" alt="修改" title="修改"/></a><?php }?><a href="javascript:void(0)" onClick="layer_del('确定要删除？', 'index.php?m=report&c=del&del=<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
');"><img src="images/iconv/del_icon2.gif" alt="删除" title="删除"/></a></td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
          <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
          <td colspan="2" >
          <label for="chkAll2">全选</label>&nbsp;
            <input class="admin_submit4"   type="button" name="delsub" value="删除所选" onClick="return really('del[]')" /></td>
            <td colspan="7" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
          </tr>
            </tbody>
        </table>
		<input type="hidden" name="pytoken"  id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      </form>
    </div>
  </div>
<?php }?>
  </div>
</body>
</html><?php }} ?>
