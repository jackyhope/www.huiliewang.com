<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:56
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_appeal.htm" */ ?>
<?php /*%%SmartyHeaderCode:3901037025afd457ce39122-84893923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '336790ba4a5435ffa7642cb523eba5342b38a5c4' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_appeal.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3901037025afd457ce39122-84893923',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'rows' => 0,
    'key' => 0,
    'v' => 0,
    'moblie_promiss' => 0,
    'email_promiss' => 0,
    'pagenav' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5afd457cecf067_96072659',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd457cecf067_96072659')) {function content_5afd457cecf067_96072659($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.searchurl.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
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
<title>��̨����</title>
</head>
<body class="body_ifm">
<div class="infoboxp"> 
<div class="infoboxp_top_bg"></div>
  <div class="admin_Filter"> 
	<span class="complay_top_span fl">���߼�¼</span>	
      <form action="index.php" name="myform" method="get" style="float:left">
        <span class="company_m6" style="float:left;">
        <input name="m" value="admin_appeal" type="hidden"/>
        <span class="admin_Filter_span"> �����˺ţ�</span> 
        <input class="admin_Filter_search" type="text" name="keyword"  size="25" style="float:left">
        <input class="admin_Filter_bth" type="submit" name="news_search" value="����"/>
		<span class='admin_search_div'>
		  <div class="admin_adv_search"><div class="admin_adv_search_bth">�߼�ѡ��</div></div>   
		</span>
		</span>  
      </form> 
  </div>
 <?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
  <div class="table-list">
    <div class="admin_table_border">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php?m=admin_appeal&c=del" target="supportiframe" name="myform" method="post" id='myform'>
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th><label for="chkall">
                <input type="checkbox" id='chkAll' onclick='CheckAll(this.form)'/>
                </label></th>
              <th align="left"> <?php if ($_GET['t']=="uid"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'uid','m'=>'admin_appeal','untype'=>'order,t'),$_smarty_tpl);?>
">���<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'uid','m'=>'admin_appeal','untype'=>'order,t'),$_smarty_tpl);?>
">���<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th align="left">�����˺�</th>
              <th align="left">������Ϣ</th>
               <th align="left">��ϵ�绰/�û�����</th>
              <th> <?php if ($_GET['t']=="appealtime"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'appealtime','m'=>'admin_appeal','untype'=>'order,t'),$_smarty_tpl);?>
">ʱ��<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'appealtime','m'=>'admin_appeal','untype'=>'order,t'),$_smarty_tpl);?>
">ʱ��<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th>״̬</th>
              <th>��������</th>
              <th class="admin_table_th_bg">����</th>
            </tr>
          </thead>
          <tbody>
          
          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
          <tr align="center"<?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
">
            <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
            <td align="left" class="td1" style="text-align:center;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
</span></td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['appeal'];?>
</td>
			 <td align="left"><div style="width:170px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['moblie'];
if ($_smarty_tpl->tpl_vars['v']->value['moblie']&&$_smarty_tpl->tpl_vars['moblie_promiss']->value) {?><a href="javascript:void(0);" class="admin_com_send" onClick="send_moblie('<?php echo $_smarty_tpl->tpl_vars['v']->value['moblie'];?>
');">����Ϣ</a><?php }?></div>
            
            <div style="width:170px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['email'];
if ($_smarty_tpl->tpl_vars['v']->value['email']&&$_smarty_tpl->tpl_vars['email_promiss']->value) {?><a href="javascript:void(0);" class="admin_com_send" onClick="send_email('<?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
');">���ʼ�</a><?php }?></div>
            </td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['appealtime'],"%Y-%m-%d");?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['v']->value['appealstate']==1) {?><font color="red">δ���</font><?php } else { ?><font color="green">�����</font><?php }?></td>
			<td><a href="javascript:void(0)" class="admin_com_cz" onClick="resetpw('<?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');">��������</a></td>
            <td>
				<a href="index.php?m=admin_appeal&c=info&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" class="admin_cz_sc">�û���Ϣ</a>
	| <?php if ($_smarty_tpl->tpl_vars['v']->value['appealstate']==1) {?><a href="javascript:void(0)" onClick="layer_del('ȷ����������ɣ�', 'index.php?m=admin_appeal&c=success&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');"class="admin_cz_sc">ȷ��</a> | <?php }?><a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫɾ����', 'index.php?m=admin_appeal&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');"class="admin_cz_sc">ɾ��</a> 
			</td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
          <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
          <td colspan="2" >
          <label for="chkAll2">ȫѡ</label>&nbsp;
            <input class="admin_submit4"  type="button" name="delsub" value="ɾ����ѡ" onClick="return really('del[]')" /></td>
            <td colspan="6" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
          </tr>
          </tbody>
          
        </table>
        <input type="hidden" name="pytoken"  id='pytoken'  value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      </form>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['adminstyle']->value)."/member_send_email.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>
