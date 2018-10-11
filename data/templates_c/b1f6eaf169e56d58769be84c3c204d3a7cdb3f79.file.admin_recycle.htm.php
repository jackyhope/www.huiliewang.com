<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-05-17 17:03:44
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/admin/admin_recycle.htm" */ ?>
<?php /*%%SmartyHeaderCode:2114183575afd4570c9f777-92540759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1f6eaf169e56d58769be84c3c204d3a7cdb3f79' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/admin/admin_recycle.htm',
      1 => 1517800850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2114183575afd4570c9f777-92540759',
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
  'unifunc' => 'content_5afd4570d15845_39183968',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afd4570d15845_39183968')) {function content_5afd4570d15845_39183968($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
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
<title>后台管理</title>
</head>
<?php echo '<script'; ?>
> 
function delall(){
	var time=$("#ad_start").val(); 
	if(time==""){ 
		parent.layer.msg('请选择时间！', 2, 8);return false;
	}
	layer_del("确定删除"+time+"以前的数据吗？","index.php?m=recycle&c=del&time="+time);  
}
function cktimesave(){
	var stime=$("#stime").val();
	var etime=$("#etime").val();
	if(stime&&etime&&toDate(stime)>toDate(etime)){
		layer.msg("结束时间必须大于开始时间！",2,8);return false;
	}
}
<?php echo '</script'; ?>
>
<body class="body_ifm">
<div class="infoboxp">
  <div class="infoboxp_top_bg"></div>
  <form action="index.php" name="myform" method="get" onSubmit="return cktimesave()">
    <input name="m" value="recycle" type="hidden"/>
    <div class="admin_Filter"> <span class="complay_top_span fl">回收站列表</span>
      <div class="admin_Filter_span">搜索类型：</div>
      <div class="admin_Filter_text formselect" did='dtype'>
        <input type="button" <?php if ($_GET['type']=='1'||$_GET['type']=='') {?> value="操作人" <?php } elseif ($_GET['type']=='3') {?> value="数据表名" <?php }?> class="admin_Filter_but" id="btype">
        <input type="hidden" name="type" id="type" value="<?php if ($_GET['type']) {
echo $_GET['type'];
} else { ?>1<?php }?>"/>
        <div class="admin_Filter_text_box" style="display:none" id="dtype">
          <ul>
            <li><a href="javascript:void(0)" onClick="formselect('1','type','操作人')">操作人</a></li>
            <li><a href="javascript:void(0)" onClick="formselect('3','type','数据表名')">数据表名</a></li>
          </ul>
        </div>
      </div>
      <input type="text" placeholder="输入你要搜索的关键字" value="<?php echo $_GET['keyword'];?>
" name='keyword' class="admin_Filter_search">
      <span class="admin_Filter_span">时间段：</span>
        		
		<input class="admin_Filter_search" type="text" id="stime" value="<?php echo $_GET['stime'];?>
" name="stime" style="width:110px"/>
		
		<input class="admin_Filter_search" type="text" id="etime" value="<?php echo $_GET['etime'];?>
" name="etime" style="width:110px" value=""/>
       <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/css/font-awesome.min.css" type="text/css">  
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/foundation-datepicker.min.js"><?php echo '</script'; ?>
>
		 <?php echo '<script'; ?>
 type="text/javascript">
		$('#stime').fdatepicker({format: 'yyyy-mm-dd',startView:4,minView:2})
		$('#etime').fdatepicker({format: 'yyyy-mm-dd',startView:4,minView:2})
        <?php echo '</script'; ?>
>
      <input type="submit" name='search' value="搜索" class="admin_Filter_bth">
      <span class='admin_search_div'>
      <div class="admin_adv_search">
        <div class="admin_adv_search_bth">高级搜索</div>
      </div>
      </span> 
	  
      </div>
  </form>
  <?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="table-list">
    <div class="admin_table_border">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php" target="supportiframe" name="myform" method="get" id='myform'>
        <input name="m" value="recycle" type="hidden"/>
        <input name="c" value="del" type="hidden"/>
        <input type="hidden" name="pytoken" id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th width="20"><label for="chkall">
                <input type="checkbox" id='chkAll' onclick='CheckAll(this.form)'/>
                </label></th>
              <th width="80"> <?php if ($_GET['t']=="id"&&$_GET['order']=="asc") {?> <a href="index.php?m=recycle&order=desc&t=id">编号<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="index.php?m=recycle&order=asc&t=id">编号<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th align="left">操作人</th>
              <th align="left">数据表名</th>
              <th align="left">时间</th>
              <th class="admin_table_th_bg">操作</th>
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
          <tr align="center" <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <td><input type="checkbox" class="check_all" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name='del[]' onclick='unselectall()' rel="del_chk"/></td>
            <td align="center" class="td1" width="80"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span></td>
            <td class="od" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</td>
            <td class="gd" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['tablename'];?>
</td>
            <td class="od" align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['ctime'],"%Y-%m-%d %H:%M:%S");?>
</td>
            <td>
            <a href="index.php?m=recycle&c=show&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="admin_cz_sc">查看数据</a> |  
            <a href="javascript:void(0)" onClick="layer_del('确定要恢复数据？','index.php?m=recycle&c=recover&isdel=all&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_cz_sc">恢复</a> | 
            <a href="javascript:void(0)" onClick="layer_del('确定要删除？','index.php?m=recycle&c=del&isdel=all&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_cz_sc">永久删除</a></td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
            <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
            <td colspan="2" ><label for="chkAll2">全选</label>
              &nbsp;
              <input class="admin_submit4" type="button" name="delsub" value="删除所选" onClick="return really('del[]')" /> <input class="admin_submit4" type="button"  value="清空回收站" onClick="layer_del('确定要清空回收站？','index.php?m=recycle&c=del&id=alldel');" />
            
             </td>
            <td colspan="3" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
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
