<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-25 13:41:15
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_company_pay.htm" */ ?>
<?php /*%%SmartyHeaderCode:8577003365b07a1fb3519d3-64782430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f172f31996ef95b3f98af930b06613a6b8acf2cb' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_company_pay.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8577003365b07a1fb3519d3-64782430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'rows' => 0,
    'key' => 0,
    'v' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b07a1fb3f0206_94265824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b07a1fb3f0206_94265824')) {function content_5b07a1fb3f0206_94265824($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.searchurl.php';
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
		 <span class="complay_top_span fl">���Ѽ�¼</span>
      <form action="index.php" name="myform" method="get"> 
        <input name="m" value="company_pay" type="hidden"/>
		<span class="admin_Filter_span">�������ͣ�</span>  
		<div class="admin_Filter_text formselect"  did='dtype'>
		  <input type="button" value="<?php if ($_GET['type']=='1'||$_GET['type']=='') {?>���ѵ���<?php } elseif ($_GET['type']=='2') {?>�û�����<?php } elseif ($_GET['type']=='3') {?>��ע˵��<?php }?>" class="admin_Filter_but"  id="btype">
		  <input type="hidden" id='type' value="<?php if ($_GET['type']) {
echo $_GET['type'];
} else { ?>1<?php }?>" name='type'>
		  <div class="admin_Filter_text_box" style="display:none" id='dtype'>
			  <ul>
			  <li><a href="javascript:void(0)" onClick="formselect('1','type','���ѵ���')">���ѵ���</a></li>
			  <li><a href="javascript:void(0)" onClick="formselect('2','type','�û�����')">�û�����</a></li> 
			  <li><a href="javascript:void(0)" onClick="formselect('3','type','��ע˵��')">��ע˵��</a></li> 
			  </ul>  
		  </div>
		</div>
        <input class="admin_Filter_search"  placeholder="������Ҫ�����Ĺؼ���" type="text" name="keyword"  size="25"/>
        <input class="admin_Filter_bth"  type="submit" name="news_search" value="����"/>
			  <span class='admin_search_div'>
		  <div class="admin_adv_search"><div class="admin_adv_search_bth">�߼�����</div></div>   
	  </span>		
      </form>
    </div> 
<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="table-list">
    <div class="admin_table_border">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php" name="myform" method="get" target="supportiframe" id='myform'>
      <input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input name="m" value="company_pay" type="hidden"/>
        <input name="c" value="del" type="hidden"/>
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th style="width:20px;"><label for="chkall">
                <input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/>
                </label></th>
              <th> <?php if ($_GET['t']=="id"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'id','m'=>'company_pay','untype'=>'order,t'),$_smarty_tpl);?>
">���<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'id','m'=>'company_pay','untype'=>'order,t'),$_smarty_tpl);?>
">���<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th>���ѵ���</th>
              <th align="left">�û�����</th>
			  <th align="left">����/��˾��</th>
              <th align="left">���</th>
              <th align="left">��ע˵��</th>
              <th> <?php if ($_GET['t']=="pay_time"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'pay_time','m'=>'company_pay','untype'=>'order,t'),$_smarty_tpl);?>
">ʱ��<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'pay_time','m'=>'company_pay','untype'=>'order,t'),$_smarty_tpl);?>
">ʱ��<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th>״̬</th>
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
          <tr align="center"<?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
            <td align="left" class="td1" style="text-align:center;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span></td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['order_id'];?>
</td>
            <td class="gd" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</td>
			 <td class="gd"align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['comname'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['order_price'];
if ($_smarty_tpl->tpl_vars['v']->value['type']==1) {
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];
} else { ?>Ԫ<?php }?> </td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['pay_remark'];?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['pay_time'],"%Y-%m-%d");?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['pay_state_n'];?>
</td>
            <td><a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫɾ����', 'index.php?m=company_pay&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_cz_sc">ɾ��</a></td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
          <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
          <td colspan="3" >
          <label for="chkAll2">ȫѡ</label>&nbsp;
            <input class="admin_submit4"  type="button" name="delsub" value="ɾ����ѡ" onClick="return really('del[]')" /></td>
            <td colspan="6" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
          </tr>
          </tbody>
          
        </table>
      </form>
    </div>
  </div>
</div>
</body>
</html>
<?php }} ?>
