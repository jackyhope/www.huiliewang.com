<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-07 20:14:58
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/user/uppic.htm" */ ?>
<?php /*%%SmartyHeaderCode:16585617585b1921c2d9c5d3-32325152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03c695b7ffde99cac2bad195788381310de54906' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/user/uppic.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16585617585b1921c2d9c5d3-32325152',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'file_max_size' => 0,
    'user_style' => 0,
    'row' => 0,
    'resume_photo' => 0,
    'user_photo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b1921c2e4c6d6_23149414',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1921c2e4c6d6_23149414')) {function content_5b1921c2e4c6d6_23149414($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/imgareaselect/imgareaselect.css" type="text/css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/imgareaselect/jquery.imgareaselect.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/imgareaselect/ajaxfileupload.js"><?php echo '</script'; ?>
>
<div class="header_main">
    <div class="yun_user_member_w1100 ">
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="mian_right fltR mt12">
             <div class="member_right_index_h1 fltL"> <span class="member_right_h1_span fltL">�ϴ���Ƭ</span> <i class="member_right_h1_icon user_bg"></i></div>
            <div class="resume_box_list">
                <div class="search_con fl" style="width:100%;">
                    <div class="resume_Prompt" style="margin-top:0px;">��ʾ����ʱ��ҳ�滺�����⣬�ϴ�����Ƭ���ܼ�ʱ�������ˢ��ҳ�漴�� </div>
                    <div class="clear"></div>
                    <div class="oppic_img_cont">
                        <div class="uppic_sc_box">
                            <div class="uploader_sc_gs">  ֧�֣�jpg,jpeg,png,�ļ���ʽ�����Ҫ����
                             <?php echo $_smarty_tpl->tpl_vars['file_max_size']->value;?>
 M</div>
                            <div class="uploader_sc">
                                <a class="link-upload" href="javascript:;"><img src="<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
/images/upload.gif" width="85" height="28"></a>
                                <input id="image" class="input-file" type="file" name="image" onchange="ajaxfile();" >
                            </div>
                        </div>
                        <div class="oppic_img_big">
                            <div class="oppic_img_big_img">
                            
                            
                            
                            <?php if ($_smarty_tpl->tpl_vars['row']->value['sex']==1) {?>
   <img src=".<?php echo $_smarty_tpl->tpl_vars['resume_photo']->value;?>
" width='80' height='100' onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);" />
    <?php } else { ?>
    <img src=".<?php echo $_smarty_tpl->tpl_vars['resume_photo']->value;?>
" width='80' height='100' onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_iconv'];?>
',2);" />
     <?php }?>     
                            
                            
                            </div>
                            <div class="oppic_img_big_p">��׼ͷ��80��100</div>
                        </div>
                        <div class="oppic_img_sim">
                            <div class="oppic_img_sim_img">
                            
                            
                            
                             <?php if ($_smarty_tpl->tpl_vars['row']->value['sex']==1) {?>
  <img src=".<?php echo $_smarty_tpl->tpl_vars['user_photo']->value;?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);" width='40' height='50' />
    <?php } else { ?>
   <img src=".<?php echo $_smarty_tpl->tpl_vars['user_photo']->value;?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_iconv'];?>
',2);" width='40' height='50' />
     <?php }?>     
                            </div>
                            <div class="oppic_img_sim_img_p">
                                Сͷ��<br />
                                40��50
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="uppic_flash" style="display:none;" id='uppic_flash'>
                        <div class="uppic_big_zx">
                            <img src="" style="float: left; margin-right: 10px;" id="thumbnail" />
                        </div>
                        <div style="width:200px; float:left">
                            <div id="preview2" class="uppic_previ2">
                                <img id="preview2_img" src="" style="position: relative;" />
                            </div>
                            <div id="preview1" class="uppic_previ1">
                                <img id="preview1_img" src="" style="position: relative;" />
                            </div>
                        </div>       
                        <div class="uppic_pb">
                            <form name="form1" id="form1">
                                <input name="sizeit" id="sizeit" type="submit" value="����ͷ��" class="uppic_pb_bth" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php echo '<script'; ?>
>
function ajaxfile() {
	if($("#image").val() != '') {
		layer.load('ͼƬ�ϴ��У����Ժ�....', 0);
		$.ajaxFileUpload({
			url: 'index.php?c=uppic&act=ajaxfileupload',
			secureuri: false, //�Ƿ���Ҫ��ȫЭ�飬һ������Ϊfalse
			fileElementId: 'image', //�ļ��ϴ����ID
			dataType: 'json', //����ֵ���� һ������Ϊjson
			success: function (data, status){  //�������ɹ���Ӧ��������
				layer.closeAll();
				if (data.s_thumb) {
					layer.msg(data.s_thumb, 2, 8);
				} else {
					hideLoading(data.url);
				}
		   }
		})
	}
}
var size1 = {
	width: 120,
	height: 150
}
$('#preview1').width(size1.width);
$('#preview1').height(size1.height);
var size2 = {
	width: 80,
	height: 100
}
$('#preview2').width(size2.width);
$('#preview2').height(size2.height);
function hideLoading(pic) {
	$("#thumbnail").attr({ 'src': pic });
	$("#preview1_img").attr({ 'src': pic });
	$("#thumbnai2").attr({ 'src': pic });
	$("#preview2_img").attr({ 'src': pic });
	$('#uppic_flash').show();
	var ias = $('#thumbnail')
	.imgAreaSelect({
		aspectRatio: '4:5', 
		onSelectChange: lis, 
		onInit: function () {
			var _opt = ias.getOptions();
			render($('#preview1_img'), $("#thumbnail")[0], {
				height: _opt.y2 - _opt.y1,
				width: _opt.x2 - _opt.x1,
				x1: _opt.x1,
				x2: _opt.x2,
				y1: _opt.y1,
				y2: _opt.y2
			}, size1);
			render($('#preview2_img'), $("#thumbnail")[0], {
				height: _opt.y2 - _opt.y1,
				width: _opt.x2 - _opt.x1,
				x1: _opt.x1,
				x2: _opt.x2,
				y1: _opt.y1,
				y2: _opt.y2
			}, size2);
		},
		instance: true,
		keys: true,
		x1: 40, 
		y1: 50,
		x2: size1.width,
		y2: size1.height
	});
}
function lis(img, sel) {
	render($('#preview1 img'), img, sel, size1);
	render($('#preview2 img'), img, sel, size2);
}
function render(target, img, sel, size) {
	var scale = size.width / sel.width;
	target.css({
		width: Math.round(scale * $(img).width()),
		height: Math.round(scale * $(img).height())
	});
	target.css({
		marginLeft: '-' + Math.round(scale * sel.x1) + 'px',
		marginTop: '-' + Math.round(scale * sel.y1) + 'px'
	});
	target.data('scale', scale);
	target.data('width', sel.width);
	target.data('height', sel.height);
	target.data('x', sel.x1);
	target.data('y', sel.y1);
}

$(function () {
	$('#form1').submit(function (e) {
		e.preventDefault();
		e.stopPropagation();
		var preview1 = $('#preview1 img');
		var preview2 = $('#preview2 img');

		$.post("index.php?c=uppic&act=savethumb", {
			sizeit: true,
			count: 2,
			
			width1: preview1.data('width'),
			height1: preview1.data('height'),
			x1: preview1.data('x'),
			y1: preview1.data('y'),
			img1: $('#preview1_img').attr('src'),
			scale1: preview1.data('scale'),
			
			width2: preview2.data('width'),
			height2: preview2.data('height'),
			x2: preview2.data('x'),
			y2: preview2.data('y'),
			img2: $('#preview2_img').attr('src'),
			scale2: preview2.data('scale')
		}, function (res) {
			if (res == 1) {
				layer.msg('ͷ�����óɹ���', 2, 9,function(){location.reload();}); 
			} else {
				layer.msg('ͷ������ʧ�ܣ�', 2, 8,function(){location.reload();}); 
			}
		});
	});
});
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>