<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-12 17:39:16
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_hotjob.htm" */ ?>
<?php /*%%SmartyHeaderCode:10332375975b1f94c47702a1-64382283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c48216521fcd7f40d3e7e81b79a10c9d3c8e021' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_hotjob.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10332375975b1f94c47702a1-64382283',
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
  'unifunc' => 'content_5b1f94c48a2750_17933067',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1f94c48a2750_17933067')) {function content_5b1f94c48a2750_17933067($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.searchurl.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="./js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  DD_belatedPNG.fix('.png,.admin_infoboxp_tj,');
<?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/admin_public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/show_pub.js"><?php echo '</script'; ?>
>  
<title>��̨����</title>
<?php echo '<script'; ?>
>
$(document).ready(function() {
	$(".preview").hover(function(){  
		var pic_url=$(this).attr('url');
		layer.tips("<img src="+pic_url+" style='max-width:380px'>", this, {
			guide:3,
			style: ['background-color:#5EA7DC; color:#fff;top:-7px;left:-20px', '#5EA7DC']
		});
		$(".xubox_layer").addClass("xubox_tips_border");
	},function(){layer.closeTips();});  
});
<?php echo '</script'; ?>
>
</head>

<body class="body_ifm">
<div class="infoboxp"> 
<div class="infoboxp_top_bg"></div>
 <form action="index.php" name="myform" method="get" >
<div class="admin_Filter"> 
<input type="hidden" name="m" value="admin_hotjob"/>
<input type="hidden" name="status" value="<?php echo $_GET['status'];?>
"/>
<input type="hidden" name="rec" value="<?php echo $_GET['rec'];?>
"/>
<input type="hidden" name="time" value="<?php echo $_GET['time'];?>
"/>
<input type="hidden" name="rating" value="<?php echo $_GET['rating'];?>
"/>
<span class="complay_top_span fl">�������</span>	
<div class="admin_Filter_span">�������ͣ�</div>
      <div class="admin_Filter_text formselect" did="dctype">
        <input type="button" <?php if ($_GET['ctype']=='2') {?> value="��ע" <?php } else { ?> value="��ҵ����" <?php }?> class="admin_Filter_but" id="bctype">
        <input type="hidden" name="ctype" id="ctype"/>
        <div class="admin_Filter_text_box" style="display:none" id="dctype">
          <ul>
            <li><a href="javascript:void(0)" onClick="formselect('1','ctype','��ҵ����')">��ҵ����</a></li>
            <li><a href="javascript:void(0)" onClick="formselect('2','ctype','��ע')">��ע</a></li>
          </ul>
        </div>
      </div>
    <input type="text" placeholder="������Ҫ�����Ĺؼ���" name="keyword" class="admin_Filter_search">
	<input type="submit" value="����" class="admin_Filter_bth"/>
	  <div class="admin_search_div" ><div class="admin_adv_search"><div class="admin_adv_search_bth">�߼�����</div></div></div>
  </div> 
  </form> 
 <?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="table-list" style="color:#898989">
    <div class="admin_table_border">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php" name="myform" method="get" id='myform' target="supportiframe">
      <input type="hidden" name="pytoken"  id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input name="m" value="admin_hotjob" type="hidden"/>
        <input name="c" value="del" type="hidden"/>
        <table width="100%">
          <thead>
            <tr class="admin_table_top" >
              <th style="width:20px;"><label for="chkall"><input type="checkbox" id='chkAll' onclick='CheckAll(this.form)'/> </label></th>
              <th> <?php if ($_GET['t']=="uid"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'uid','m'=>'admin_hotjob','untype'=>'order,t'),$_smarty_tpl);?>
">�û�ID<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'uid','m'=>'admin_hotjob','untype'=>'order,t'),$_smarty_tpl);?>
">�û�ID<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th align="left">��ҵ����</th>
              <th align="center">��Ա�ȼ�</th>
              <th>��˾ͼ��</th>
              <th>����۸�</th>
              <th>��ʼʱ��</th>
              <th>����ʱ��</th>
              <th>��ע</th>
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
          <tr align="center" <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
">
            <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"  name='del[]' email='<?php echo $_smarty_tpl->tpl_vars['v']->value['linkmail'];?>
' moblie='<?php echo $_smarty_tpl->tpl_vars['v']->value['moblie'];?>
' onclick='unselectall()' class="check_all" rel="del_chk" /></td>
            <td align="left" class="td1" style="text-align:center;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
</span></td>
            <td  style="width:180px" align="left">
			<div style="width:180px;"><a href="index.php?m=admin_company&c=Imitate&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" target="_blank" class="admin_cz_sc"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a></div></td>            
			<td align="center"><div class="admin_table_w84"><?php echo $_smarty_tpl->tpl_vars['v']->value['rating'];?>
</div></td>
            <td><div class="admin_table_w84"><a href="javascript:void(0)" class="preview" url="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['hot_pic'];?>
">ͼƬԤ��</a></div></td>
             <td><div class="admin_table_w84"><?php echo $_smarty_tpl->tpl_vars['v']->value['service_price'];?>
Ԫ</div></td>
              <td><div class="admin_table_w84"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['time_start'],"%Y-%m-%d");?>
</div></td>
           <td><div class="admin_table_w84"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['time_end'],"%Y-%m-%d");?>
</div></td>
             <td><div  class="admin_table_w84"><?php if ($_smarty_tpl->tpl_vars['v']->value['beizhu']) {
echo $_smarty_tpl->tpl_vars['v']->value['beizhu'];
} else { ?>δ��ע<?php }?></div></td>
            <td>
            <div class="">
           <a href="javascript:void(0);" onClick="showdiv8('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">�޸�</a> | <a href="javascript:void(0);" onClick="layer_del('ȷ��Ҫȡ��������','index.php?m=admin_hotjob&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">ɾ��</a>
            </div>
            </td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
          <td align="center"><label for="chkall2"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></label></td>
         <td colspan="4" >
         <input class="admin_submit4" type="button" name="delsub" value="ɾ����ѡ" onClick="return really('del[]')" />
         </td>
            <td colspan="5" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
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
