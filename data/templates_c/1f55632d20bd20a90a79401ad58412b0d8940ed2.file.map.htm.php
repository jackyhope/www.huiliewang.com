<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-08-03 18:15:30
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/member/com/map.htm" */ ?>
<?php /*%%SmartyHeaderCode:5769890035b642b424fb8c6-37591188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f55632d20bd20a90a79401ad58412b0d8940ed2' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/member/com/map.htm',
      1 => 1517878664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5769890035b642b424fb8c6-37591188',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'row' => 0,
    'city_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b642b42562cf3_89468552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b642b42562cf3_89468552')) {function content_5b642b42562cf3_89468552($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="w1000">
  <div class="admin_mainbody">
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['comstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['mapurl'];?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/map.js"><?php echo '</script'; ?>
>
    <div class=right_box>
      <div class=admincont_box>
          <div class="com_tit"><span class="com_tit_span">设置公司所在位置</span></div>
     <div class="com_body">
        <div class=admin_note_map style="position:relative">
		<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
        <form name="myform" onSubmit="return checkpost();" target="supportiframe" action="index.php?c=map&act=save" method="post">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px;">
              <tr>
                <th height="30"></th>
                <td><div id="map_container" style="width:100%;height:350px;"></div><br>
                </td>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td height="40">
                <span class="com_info_text_s"> X轴：</span>
                  <input name="xvalue" id="map_x" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['x'];?>
"  class="com_info_text">
                 <span class="com_info_text_s"> Y轴：</span>
                  <input name="yvalue" id="map_y" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['y'];?>
"  class="com_info_text">
                
                  <input type="submit" name="savemap" class="com_info_mapbth" value="保存地图" style="">
                  <span id="by_map" class="errordisplay">请先设置地图位置</span></td>
              </tr>
              <tr>
                <th height="30"></th>
                <td>
          <div class="wxts_box wxts_box_mt20">
            <div class="wxts">操作说明：</div>
           在地图区域点击公司所在的位置，点击保存地图。</div>
        </td>
        </tr>
          </table>
		</form>
          <div class="map_seach"><input id="map_keyword" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
" class="map_seach_text" placeholder="请输入地址" onclick="if(this.value=='请输入地址'){this.value='';}" onblur="if(this.value==''){this.value='请输入地址';}"/><input type="button" value="搜索" onclick="localsearch('全国');" class="map_seach_sub"/></div>
          
        </div>
      </div>
    </div>
    <?php echo '<script'; ?>
>
		var map=new BMap.Map("map_container");
		setLocation('map_container',116.404,39.915,"map_x","map_y");
		$(document).ready(function() {
			$(".com_admin_ask").hover(function(){
				layer.tips("精确定位，更直观展示企业位置！", this, {
					guide: 1,
					style: ['background-color:#5EA7DC; color:#fff;top:-7px', '#5EA7DC']
				});
				$(".xubox_layer").addClass("xubox_tips_border");
			},function(){layer.closeTips();});
			<?php if (($_smarty_tpl->tpl_vars['row']->value['x']==''||$_smarty_tpl->tpl_vars['row']->value['y']=='')&&$_smarty_tpl->tpl_vars['row']->value['address']!='') {?>
				$("#map_keyword").val("<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']];
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']];
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['three_cityid']];
echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
");
				var address = "<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
";
				localsearch('<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']];
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']];
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['three_cityid']];?>
'+address.replace(/\s+/g,""));
			<?php } elseif ($_smarty_tpl->tpl_vars['row']->value['x']!=''&&$_smarty_tpl->tpl_vars['row']->value['y']!='') {?>
				setLocation('map_container',<?php echo $_smarty_tpl->tpl_vars['row']->value['x'];?>
,<?php echo $_smarty_tpl->tpl_vars['row']->value['y'];?>
,"map_x","map_y");
			<?php } else { ?>
				//根据IP到城市开始
				function myFun(result){
					var cityName = result.name;
					map.setCenter(cityName);
				}
				var myCity = new BMap.LocalCity();
				myCity.get(myFun);
				//根据IP到城市结结束
			<?php }?>
		});
		var local ;
		function getLocalResult(){
			var map_keyword=$.trim($("#map_keyword").val());
			var points=local.getResults();
				var lngLat=points.getPoi(0).point;
				setLocation('map_container',lngLat.lng,lngLat.lat,"map_x","map_y");
				document.getElementById("map_x").value=lngLat.lng;
				document.getElementById("map_y").value=lngLat.lat;
			
		}
		function localsearch(city){
			if($("#map_keyword").val()==""){
				layer.msg('请输入地址！', 2, 8);return false;
			}
			// 创建地址解析器实例
			var myGeo = new BMap.Geocoder();
			// 将地址解析结果显示在地图上,并调整地图视野
			myGeo.getPoint($("#map_keyword").val().replace(/\s+/g,""), function(point){
				
				map.centerAndZoom(point, 16);
				map.addOverlay(new BMap.Marker(point));
				
			}, "北京市");
		}
		function checkpost(){
			if($.trim($("#map_x").val())==''||$.trim($("#map_y").val())==''){
				layer.msg('请先设置地图位置！', 2, 8);return false;
			}
		}
		function setLocation(id,x,y,xid,yid){
			var data=get_map_config();
			var config=eval('('+data+')');
			var rating,map_control_type,map_control_anchor;
			if(!x && !y){x=config.map_x;y=config.map_y;}
			var point = new BMap.Point(x,y);
			var marker = new BMap.Marker(point);
			var opts = {type:BMAP_NAVIGATION_CONTROL_LARGE}
			map.enableScrollWheelZoom(true);
			map.addControl(new BMap.NavigationControl(opts));
			map.centerAndZoom(point, 15);
			map.addOverlay(marker);
			map.addEventListener("click",function(e){
			   var info = new BMap.InfoWindow('', {width: 260});
				var projection = this.getMapType().getProjection();
				var lngLat = e.point;
				document.getElementById(xid).value=lngLat.lng;
				document.getElementById(yid).value=lngLat.lat;
				map.clearOverlays();
				var point = new BMap.Point(lngLat.lng,lngLat.lat);
				var marker = new BMap.Marker(point);
				map.addOverlay(marker);
			});
		}
	<?php echo '</script'; ?>
>
  </div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
