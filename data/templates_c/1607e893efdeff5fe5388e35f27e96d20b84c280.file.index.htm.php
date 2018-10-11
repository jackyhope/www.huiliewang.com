<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-07 09:47:37
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/article/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:20135713135bb965b9c4ae40-76560869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1607e893efdeff5fe5388e35f27e96d20b84c280' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/article/index.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20135713135bb965b9c4ae40-76560869',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'config' => 0,
    'news_flash' => 0,
    'thumb' => 0,
    'key' => 0,
    'news' => 0,
    'arcgroupright' => 0,
    'acrpicsright' => 0,
    'arclistright' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb965b9d05722_08665152',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb965b9d05722_08665152')) {function content_5bb965b9d05722_08665152($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_function_formatpicurl')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.formatpicurl.php';
?><?php global $db,$db_config,$config;include PLUS_PATH.'/group.cache.php';$news_flash=array();$rs=null;$nids=null;eval('$paramer=array("limit"=>"4","pic"=>"1","urlstatic"=>"1","key"=>"\'key\'","t_len"=>"20","item"=>"\'news_flash\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr['arr'];
		$Purl =  $ParamerArr['purl'];
        if($paramer[cache]){
			$Purl="{{page}}.html";
		}
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where=1;
		if($config['did']){
			$where.=" and `did`='".$config['did']."'";
		}
		include PLUS_PATH."/group.cache.php"; 
		if(is_array($paramer)){
			if($paramer['nid']){
				$nid_s = @explode(',',$paramer[nid]);				
				foreach($nid_s as $v){
					if($group_type[$v]){
						$paramer[nid] = $paramer[nid].",".@implode(',',$group_type[$v]);
					}
				}
			}
			
			if($paramer['nid']!=""){
				$where .=" AND `nid` in ($paramer[nid])";
				$nids = @explode(',',$paramer['nid']);$paramer['nid']=$paramer['nid'];
			}else if($paramer['rec']!=""){
				$nids=array();if(is_array($group_rec)){
					foreach($group_rec as $key=>$value){
						if($key<=2){
							$nids[]=$value;
						}
					}
					$paramer[nid]=@implode(',',$nids);
				}
			}
			
			if($paramer['type']){
				$type = str_replace("\"","",$paramer[type]);
				$type_arr =	@explode(",",$type);
				if(is_array($type_arr) && !empty($type_arr)){
					foreach($type_arr as $key=>$value){
						$where .=" AND FIND_IN_SET('".$value."',`describe`)";
						if(count($nids)>0){
							$picwhere .=" AND FIND_IN_SET('".$value."',`describe`)";
						}
					}
				}
			}
			if($paramer['pic']!=""){
				$where .=" AND `newsphoto`<>''";
			}
			if($paramer['keyword']!=""){
				$where .=" AND `title` LIKE '%".$paramer[keyword]."%'";
			}
			
			if(intval($paramer['limit'])>0){
				$limit = intval($paramer['limit']);
				$limit = " limit ".$limit;
			}
			if($paramer['ispage']){
				if($Purl["m"]=="wap"){
					$limit = PageNav($paramer,$_GET,"news_base",$where,$Purl,"","6",$_smarty_tpl);
				}else{
					$limit = PageNav($paramer,$_GET,"news_base",$where,$Purl,"","5",$_smarty_tpl);
				}
			}
			if($paramer['order']!=""){
				$order = str_replace("'","",$paramer['order']);
				$where .=" ORDER BY $order";
			}else{
				$where .=" ORDER BY `datetime`";
			}
			if($paramer['sort']){
				$where.=" ".$paramer[sort];
			}else{
				$where.=" DESC";
			}
		}

		if(!intval($paramer['ispage']) && count($nids)>0){
			$nidArr = @explode(',',$paramer[nid]);
			$rsnids = '';
			if(is_array($group_type)){
				foreach($group_type as $key=>$value){
					if(in_array($key,$nidArr)){						
						if(is_array($value)){
							foreach($value as $v){
								$rsnids[$v] = $key;
								$nidArr[] = $v;
							}
						}
					}
				}							
			}
			$where = " `nid` IN (".@implode(',',$nidArr).")";
			if($config['did']){
				$where.=" and `did`='".$config['did']."'";
			}
			if($paramer['pic']){
				if(!$paramer['piclimit']){
					$piclimit = 1;
				}else{
					$piclimit = $paramer['piclimit'];
				}
				$db->query("set @f=0,@n=0");
				$query = $db->query("select * from (select id,title,color,datetime,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]news_base  WHERE ".$where." AND `newsphoto` <>''  order by nid asc,datetime desc) a where aid <=".$piclimit);
				while($rs = $db->fetch_array($query)){
					if($rsnids[$rs['nid']]){
						$rs['nid'] = $rsnids[$rs['nid']];
					}
					if(intval($paramer[t_len])>0){

						$len = intval($paramer[t_len]);
						$rs[title] = mb_substr($rs[title],0,$len,"GBK");
					}
					if($rs[color]){
						$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
					}
					if(intval($paramer[d_len])>0){
						$len = intval($paramer[d_len]);
						$rs[description] = mb_substr($rs[description],0,$len,"GBK");
					}
					$rs['name'] = $group_name[$rs['nid']];

					if($config[sy_news_rewrite]=="2"){
						$rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
					}else{
						$rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
					}
					if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
					$rs[time]=date("Y-m-d",$rs[datetime]);
					$rs['datetime']=date("m-d",$rs[datetime]);
					if(count($news_flash[$rs['nid']]['pic'])<$piclimit){
					    $news_flash[$rs['nid']]['pic'][] = $rs;
					}
				
				}
			}
			
            $db->query("set @f=0,@n=0");
            $query = $db->query("select * from (select id,title,datetime,color,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]news_base  WHERE ".$where." order by nid asc,datetime desc) a where aid <=$paramer[limit]");

            while($rs = $db->fetch_array($query)){
				if($rsnids[$rs['nid']]){
						$rs['nid'] = $rsnids[$rs['nid']];
					}
                if(intval($paramer[t_len])>0){

					$len = intval($paramer[t_len]);
					$rs[title] = mb_substr($rs[title],0,$len,"GBK");
				}
				if($rs[color]){
					$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
				}
                if(intval($paramer[d_len])>0){
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                $rs['name'] = $group_name[$rs['nid']];
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
                }
				if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
				if(count($news_flash[$rs['nid']]['arclist'])<$paramer[limit]){
					$news_flash[$rs['nid']]['arclist'][] = $rs;
				}
                
            }
		}else{
			$query = $db->query("SELECT * FROM `$db_config[def]news_base` WHERE ".$where.$limit);
			while($rs = $db->fetch_array($query)){
				if(intval($paramer[t_len])>0){
					$len = intval($paramer[t_len]);
					$rs[title] = mb_substr($rs[title],0,$len,"GBK");
				}
				if($rs[color]){
					$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
				}
                if(intval($paramer[d_len])>0){
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                $rs['name'] = $group_name[$rs['nid']];
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
                }
				if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
                $news_flash[] = $rs;
            }
		} ?>
<?php global $db,$db_config,$config;include PLUS_PATH.'/group.cache.php';$thumb=array();$rs=null;$nids=null;eval('$paramer=array("limit"=>"4","pic"=>"1","urlstatic"=>"1","key"=>"\'key\'","t_len"=>"20","item"=>"\'thumb\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr['arr'];
		$Purl =  $ParamerArr['purl'];
        if($paramer[cache]){
			$Purl="{{page}}.html";
		}
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where=1;
		if($config['did']){
			$where.=" and `did`='".$config['did']."'";
		}
		include PLUS_PATH."/group.cache.php"; 
		if(is_array($paramer)){
			if($paramer['nid']){
				$nid_s = @explode(',',$paramer[nid]);				
				foreach($nid_s as $v){
					if($group_type[$v]){
						$paramer[nid] = $paramer[nid].",".@implode(',',$group_type[$v]);
					}
				}
			}
			
			if($paramer['nid']!=""){
				$where .=" AND `nid` in ($paramer[nid])";
				$nids = @explode(',',$paramer['nid']);$paramer['nid']=$paramer['nid'];
			}else if($paramer['rec']!=""){
				$nids=array();if(is_array($group_rec)){
					foreach($group_rec as $key=>$value){
						if($key<=2){
							$nids[]=$value;
						}
					}
					$paramer[nid]=@implode(',',$nids);
				}
			}
			
			if($paramer['type']){
				$type = str_replace("\"","",$paramer[type]);
				$type_arr =	@explode(",",$type);
				if(is_array($type_arr) && !empty($type_arr)){
					foreach($type_arr as $key=>$value){
						$where .=" AND FIND_IN_SET('".$value."',`describe`)";
						if(count($nids)>0){
							$picwhere .=" AND FIND_IN_SET('".$value."',`describe`)";
						}
					}
				}
			}
			if($paramer['pic']!=""){
				$where .=" AND `newsphoto`<>''";
			}
			if($paramer['keyword']!=""){
				$where .=" AND `title` LIKE '%".$paramer[keyword]."%'";
			}
			
			if(intval($paramer['limit'])>0){
				$limit = intval($paramer['limit']);
				$limit = " limit ".$limit;
			}
			if($paramer['ispage']){
				if($Purl["m"]=="wap"){
					$limit = PageNav($paramer,$_GET,"news_base",$where,$Purl,"","6",$_smarty_tpl);
				}else{
					$limit = PageNav($paramer,$_GET,"news_base",$where,$Purl,"","5",$_smarty_tpl);
				}
			}
			if($paramer['order']!=""){
				$order = str_replace("'","",$paramer['order']);
				$where .=" ORDER BY $order";
			}else{
				$where .=" ORDER BY `datetime`";
			}
			if($paramer['sort']){
				$where.=" ".$paramer[sort];
			}else{
				$where.=" DESC";
			}
		}

		if(!intval($paramer['ispage']) && count($nids)>0){
			$nidArr = @explode(',',$paramer[nid]);
			$rsnids = '';
			if(is_array($group_type)){
				foreach($group_type as $key=>$value){
					if(in_array($key,$nidArr)){						
						if(is_array($value)){
							foreach($value as $v){
								$rsnids[$v] = $key;
								$nidArr[] = $v;
							}
						}
					}
				}							
			}
			$where = " `nid` IN (".@implode(',',$nidArr).")";
			if($config['did']){
				$where.=" and `did`='".$config['did']."'";
			}
			if($paramer['pic']){
				if(!$paramer['piclimit']){
					$piclimit = 1;
				}else{
					$piclimit = $paramer['piclimit'];
				}
				$db->query("set @f=0,@n=0");
				$query = $db->query("select * from (select id,title,color,datetime,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]news_base  WHERE ".$where." AND `newsphoto` <>''  order by nid asc,datetime desc) a where aid <=".$piclimit);
				while($rs = $db->fetch_array($query)){
					if($rsnids[$rs['nid']]){
						$rs['nid'] = $rsnids[$rs['nid']];
					}
					if(intval($paramer[t_len])>0){

						$len = intval($paramer[t_len]);
						$rs[title] = mb_substr($rs[title],0,$len,"GBK");
					}
					if($rs[color]){
						$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
					}
					if(intval($paramer[d_len])>0){
						$len = intval($paramer[d_len]);
						$rs[description] = mb_substr($rs[description],0,$len,"GBK");
					}
					$rs['name'] = $group_name[$rs['nid']];

					if($config[sy_news_rewrite]=="2"){
						$rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
					}else{
						$rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
					}
					if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
					$rs[time]=date("Y-m-d",$rs[datetime]);
					$rs['datetime']=date("m-d",$rs[datetime]);
					if(count($thumb[$rs['nid']]['pic'])<$piclimit){
					    $thumb[$rs['nid']]['pic'][] = $rs;
					}
				
				}
			}
			
            $db->query("set @f=0,@n=0");
            $query = $db->query("select * from (select id,title,datetime,color,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]news_base  WHERE ".$where." order by nid asc,datetime desc) a where aid <=$paramer[limit]");

            while($rs = $db->fetch_array($query)){
				if($rsnids[$rs['nid']]){
						$rs['nid'] = $rsnids[$rs['nid']];
					}
                if(intval($paramer[t_len])>0){

					$len = intval($paramer[t_len]);
					$rs[title] = mb_substr($rs[title],0,$len,"GBK");
				}
				if($rs[color]){
					$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
				}
                if(intval($paramer[d_len])>0){
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                $rs['name'] = $group_name[$rs['nid']];
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
                }
				if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
				if(count($thumb[$rs['nid']]['arclist'])<$paramer[limit]){
					$thumb[$rs['nid']]['arclist'][] = $rs;
				}
                
            }
		}else{
			$query = $db->query("SELECT * FROM `$db_config[def]news_base` WHERE ".$where.$limit);
			while($rs = $db->fetch_array($query)){
				if(intval($paramer[t_len])>0){
					$len = intval($paramer[t_len]);
					$rs[title] = mb_substr($rs[title],0,$len,"GBK");
				}
				if($rs[color]){
					$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
				}
                if(intval($paramer[d_len])>0){
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                $rs['name'] = $group_name[$rs['nid']];
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
                }
				if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
                $thumb[] = $rs;
            }
		} ?>
<?php global $db,$db_config,$config;include PLUS_PATH.'/group.cache.php';$news_flash=array();$rs=null;$nids=null;eval('$paramer=array("limit"=>"4","pic"=>"1","urlstatic"=>"1","key"=>"\'key\'","t_len"=>"20","item"=>"\'news_flash\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr['arr'];
		$Purl =  $ParamerArr['purl'];
        if($paramer[cache]){
			$Purl="{{page}}.html";
		}
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where=1;
		if($config['did']){
			$where.=" and `did`='".$config['did']."'";
		}
		include PLUS_PATH."/group.cache.php"; 
		if(is_array($paramer)){
			if($paramer['nid']){
				$nid_s = @explode(',',$paramer[nid]);				
				foreach($nid_s as $v){
					if($group_type[$v]){
						$paramer[nid] = $paramer[nid].",".@implode(',',$group_type[$v]);
					}
				}
			}
			
			if($paramer['nid']!=""){
				$where .=" AND `nid` in ($paramer[nid])";
				$nids = @explode(',',$paramer['nid']);$paramer['nid']=$paramer['nid'];
			}else if($paramer['rec']!=""){
				$nids=array();if(is_array($group_rec)){
					foreach($group_rec as $key=>$value){
						if($key<=2){
							$nids[]=$value;
						}
					}
					$paramer[nid]=@implode(',',$nids);
				}
			}
			
			if($paramer['type']){
				$type = str_replace("\"","",$paramer[type]);
				$type_arr =	@explode(",",$type);
				if(is_array($type_arr) && !empty($type_arr)){
					foreach($type_arr as $key=>$value){
						$where .=" AND FIND_IN_SET('".$value."',`describe`)";
						if(count($nids)>0){
							$picwhere .=" AND FIND_IN_SET('".$value."',`describe`)";
						}
					}
				}
			}
			if($paramer['pic']!=""){
				$where .=" AND `newsphoto`<>''";
			}
			if($paramer['keyword']!=""){
				$where .=" AND `title` LIKE '%".$paramer[keyword]."%'";
			}
			
			if(intval($paramer['limit'])>0){
				$limit = intval($paramer['limit']);
				$limit = " limit ".$limit;
			}
			if($paramer['ispage']){
				if($Purl["m"]=="wap"){
					$limit = PageNav($paramer,$_GET,"news_base",$where,$Purl,"","6",$_smarty_tpl);
				}else{
					$limit = PageNav($paramer,$_GET,"news_base",$where,$Purl,"","5",$_smarty_tpl);
				}
			}
			if($paramer['order']!=""){
				$order = str_replace("'","",$paramer['order']);
				$where .=" ORDER BY $order";
			}else{
				$where .=" ORDER BY `datetime`";
			}
			if($paramer['sort']){
				$where.=" ".$paramer[sort];
			}else{
				$where.=" DESC";
			}
		}

		if(!intval($paramer['ispage']) && count($nids)>0){
			$nidArr = @explode(',',$paramer[nid]);
			$rsnids = '';
			if(is_array($group_type)){
				foreach($group_type as $key=>$value){
					if(in_array($key,$nidArr)){						
						if(is_array($value)){
							foreach($value as $v){
								$rsnids[$v] = $key;
								$nidArr[] = $v;
							}
						}
					}
				}							
			}
			$where = " `nid` IN (".@implode(',',$nidArr).")";
			if($config['did']){
				$where.=" and `did`='".$config['did']."'";
			}
			if($paramer['pic']){
				if(!$paramer['piclimit']){
					$piclimit = 1;
				}else{
					$piclimit = $paramer['piclimit'];
				}
				$db->query("set @f=0,@n=0");
				$query = $db->query("select * from (select id,title,color,datetime,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]news_base  WHERE ".$where." AND `newsphoto` <>''  order by nid asc,datetime desc) a where aid <=".$piclimit);
				while($rs = $db->fetch_array($query)){
					if($rsnids[$rs['nid']]){
						$rs['nid'] = $rsnids[$rs['nid']];
					}
					if(intval($paramer[t_len])>0){

						$len = intval($paramer[t_len]);
						$rs[title] = mb_substr($rs[title],0,$len,"GBK");
					}
					if($rs[color]){
						$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
					}
					if(intval($paramer[d_len])>0){
						$len = intval($paramer[d_len]);
						$rs[description] = mb_substr($rs[description],0,$len,"GBK");
					}
					$rs['name'] = $group_name[$rs['nid']];

					if($config[sy_news_rewrite]=="2"){
						$rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
					}else{
						$rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
					}
					if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
					$rs[time]=date("Y-m-d",$rs[datetime]);
					$rs['datetime']=date("m-d",$rs[datetime]);
					if(count($news_flash[$rs['nid']]['pic'])<$piclimit){
					    $news_flash[$rs['nid']]['pic'][] = $rs;
					}
				
				}
			}
			
            $db->query("set @f=0,@n=0");
            $query = $db->query("select * from (select id,title,datetime,color,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]news_base  WHERE ".$where." order by nid asc,datetime desc) a where aid <=$paramer[limit]");

            while($rs = $db->fetch_array($query)){
				if($rsnids[$rs['nid']]){
						$rs['nid'] = $rsnids[$rs['nid']];
					}
                if(intval($paramer[t_len])>0){

					$len = intval($paramer[t_len]);
					$rs[title] = mb_substr($rs[title],0,$len,"GBK");
				}
				if($rs[color]){
					$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
				}
                if(intval($paramer[d_len])>0){
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                $rs['name'] = $group_name[$rs['nid']];
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
                }
				if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
				if(count($news_flash[$rs['nid']]['arclist'])<$paramer[limit]){
					$news_flash[$rs['nid']]['arclist'][] = $rs;
				}
                
            }
		}else{
			$query = $db->query("SELECT * FROM `$db_config[def]news_base` WHERE ".$where.$limit);
			while($rs = $db->fetch_array($query)){
				if(intval($paramer[t_len])>0){
					$len = intval($paramer[t_len]);
					$rs[title] = mb_substr($rs[title],0,$len,"GBK");
				}
				if($rs[color]){
					$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
				}
                if(intval($paramer[d_len])>0){
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                $rs['name'] = $group_name[$rs['nid']];
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
                }
				if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
                $news_flash[] = $rs;
            }
		} ?>
<?php global $db,$db_config,$config;include PLUS_PATH.'/group.cache.php';$news=array();$rs=null;$nids=null;eval('$paramer=array("limit"=>"8","urlstatic"=>"1","item"=>"\'news\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr['arr'];
		$Purl =  $ParamerArr['purl'];
        if($paramer[cache]){
			$Purl="{{page}}.html";
		}
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where=1;
		if($config['did']){
			$where.=" and `did`='".$config['did']."'";
		}
		include PLUS_PATH."/group.cache.php"; 
		if(is_array($paramer)){
			if($paramer['nid']){
				$nid_s = @explode(',',$paramer[nid]);				
				foreach($nid_s as $v){
					if($group_type[$v]){
						$paramer[nid] = $paramer[nid].",".@implode(',',$group_type[$v]);
					}
				}
			}
			
			if($paramer['nid']!=""){
				$where .=" AND `nid` in ($paramer[nid])";
				$nids = @explode(',',$paramer['nid']);$paramer['nid']=$paramer['nid'];
			}else if($paramer['rec']!=""){
				$nids=array();if(is_array($group_rec)){
					foreach($group_rec as $key=>$value){
						if($key<=2){
							$nids[]=$value;
						}
					}
					$paramer[nid]=@implode(',',$nids);
				}
			}
			
			if($paramer['type']){
				$type = str_replace("\"","",$paramer[type]);
				$type_arr =	@explode(",",$type);
				if(is_array($type_arr) && !empty($type_arr)){
					foreach($type_arr as $key=>$value){
						$where .=" AND FIND_IN_SET('".$value."',`describe`)";
						if(count($nids)>0){
							$picwhere .=" AND FIND_IN_SET('".$value."',`describe`)";
						}
					}
				}
			}
			if($paramer['pic']!=""){
				$where .=" AND `newsphoto`<>''";
			}
			if($paramer['keyword']!=""){
				$where .=" AND `title` LIKE '%".$paramer[keyword]."%'";
			}
			
			if(intval($paramer['limit'])>0){
				$limit = intval($paramer['limit']);
				$limit = " limit ".$limit;
			}
			if($paramer['ispage']){
				if($Purl["m"]=="wap"){
					$limit = PageNav($paramer,$_GET,"news_base",$where,$Purl,"","6",$_smarty_tpl);
				}else{
					$limit = PageNav($paramer,$_GET,"news_base",$where,$Purl,"","5",$_smarty_tpl);
				}
			}
			if($paramer['order']!=""){
				$order = str_replace("'","",$paramer['order']);
				$where .=" ORDER BY $order";
			}else{
				$where .=" ORDER BY `datetime`";
			}
			if($paramer['sort']){
				$where.=" ".$paramer[sort];
			}else{
				$where.=" DESC";
			}
		}

		if(!intval($paramer['ispage']) && count($nids)>0){
			$nidArr = @explode(',',$paramer[nid]);
			$rsnids = '';
			if(is_array($group_type)){
				foreach($group_type as $key=>$value){
					if(in_array($key,$nidArr)){						
						if(is_array($value)){
							foreach($value as $v){
								$rsnids[$v] = $key;
								$nidArr[] = $v;
							}
						}
					}
				}							
			}
			$where = " `nid` IN (".@implode(',',$nidArr).")";
			if($config['did']){
				$where.=" and `did`='".$config['did']."'";
			}
			if($paramer['pic']){
				if(!$paramer['piclimit']){
					$piclimit = 1;
				}else{
					$piclimit = $paramer['piclimit'];
				}
				$db->query("set @f=0,@n=0");
				$query = $db->query("select * from (select id,title,color,datetime,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]news_base  WHERE ".$where." AND `newsphoto` <>''  order by nid asc,datetime desc) a where aid <=".$piclimit);
				while($rs = $db->fetch_array($query)){
					if($rsnids[$rs['nid']]){
						$rs['nid'] = $rsnids[$rs['nid']];
					}
					if(intval($paramer[t_len])>0){

						$len = intval($paramer[t_len]);
						$rs[title] = mb_substr($rs[title],0,$len,"GBK");
					}
					if($rs[color]){
						$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
					}
					if(intval($paramer[d_len])>0){
						$len = intval($paramer[d_len]);
						$rs[description] = mb_substr($rs[description],0,$len,"GBK");
					}
					$rs['name'] = $group_name[$rs['nid']];

					if($config[sy_news_rewrite]=="2"){
						$rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
					}else{
						$rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
					}
					if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
					$rs[time]=date("Y-m-d",$rs[datetime]);
					$rs['datetime']=date("m-d",$rs[datetime]);
					if(count($news[$rs['nid']]['pic'])<$piclimit){
					    $news[$rs['nid']]['pic'][] = $rs;
					}
				
				}
			}
			
            $db->query("set @f=0,@n=0");
            $query = $db->query("select * from (select id,title,datetime,color,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]news_base  WHERE ".$where." order by nid asc,datetime desc) a where aid <=$paramer[limit]");

            while($rs = $db->fetch_array($query)){
				if($rsnids[$rs['nid']]){
						$rs['nid'] = $rsnids[$rs['nid']];
					}
                if(intval($paramer[t_len])>0){

					$len = intval($paramer[t_len]);
					$rs[title] = mb_substr($rs[title],0,$len,"GBK");
				}
				if($rs[color]){
					$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
				}
                if(intval($paramer[d_len])>0){
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                $rs['name'] = $group_name[$rs['nid']];
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
                }
				if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
				if(count($news[$rs['nid']]['arclist'])<$paramer[limit]){
					$news[$rs['nid']]['arclist'][] = $rs;
				}
                
            }
		}else{
			$query = $db->query("SELECT * FROM `$db_config[def]news_base` WHERE ".$where.$limit);
			while($rs = $db->fetch_array($query)){
				if(intval($paramer[t_len])>0){
					$len = intval($paramer[t_len]);
					$rs[title] = mb_substr($rs[title],0,$len,"GBK");
				}
				if($rs[color]){
					$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
				}
                if(intval($paramer[d_len])>0){
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                $rs['name'] = $group_name[$rs['nid']];
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
                }
				if(mb_substr($rs[newsphoto],0,4)=="http"){
						$rs["picurl"]=$rs[newsphoto];
					}else{
						$rs["picurl"] = $config['sy_weburl']."/".$rs[newsphoto];
					}
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
                $news[] = $rs;
            }
		} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
/style/news.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/article/css/style.css" type="text/css">
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="yun_content">
    <!--<div class="current_Location  com_current_Location png"><div class="fl">您当前的位置：<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
">首页</a> > <a href="<?php echo smarty_function_url(array('m'=>'article'),$_smarty_tpl);?>
">职场资讯</a></div></div>-->
  <div class="news_Slideshow fl" style="margin-top: 20px;">
  <div id="focusImage" class="slide">
	<ul class="contents">
	  <?php  $_smarty_tpl->tpl_vars['news_flash'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news_flash']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$news_flash = $news_flash; if (!is_array($news_flash) && !is_object($news_flash)) { settype($news_flash, 'array');}
foreach ($news_flash as $_smarty_tpl->tpl_vars['news_flash']->key => $_smarty_tpl->tpl_vars['news_flash']->value) {
$_smarty_tpl->tpl_vars['news_flash']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['news_flash']->key;
?>
	  <li class="current">
			<div class="image"><a href="<?php echo $_smarty_tpl->tpl_vars['news_flash']->value['url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['news_flash']->value['newsphoto'];?>
" width="390px" height="245px"></a></div>
			<div class="text">
				<span class="title" style="display:inline-block;width:100%;height:45px; overflow:hidden"><a href="<?php echo $_smarty_tpl->tpl_vars['news_flash']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['news_flash']->value['title'];?>
</a></span>
				<div style="width:100%;height:185px; overflow:hidden"><p><?php echo $_smarty_tpl->tpl_vars['news_flash']->value['description'];?>
</p></div>
			</div>
		</li>
    <?php } ?>
	</ul>
	
	<div class="triggers">
	    <?php  $_smarty_tpl->tpl_vars['thumb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['thumb']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$thumb = $thumb; if (!is_array($thumb) && !is_object($thumb)) { settype($thumb, 'array');}
foreach ($thumb as $_smarty_tpl->tpl_vars['thumb']->key => $_smarty_tpl->tpl_vars['thumb']->value) {
$_smarty_tpl->tpl_vars['thumb']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['thumb']->key;
?>
		<a href="javascript:;" class="cur current"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['thumb']->value['s_thumb'];?>
" width="58" height="38"></a>
		<?php } ?>
	</div>

	<div class="icon-dot">
		<a href="javascript:;" class="cur current"></a>
		<a href="javascript:;"></a>
		<a href="javascript:;"></a>
		<a href="javascript:;"></a>
	</div>
	
	<span class="link-watch pre down"></span>
	<span class="link-watch next down"></span>
	
</div>
  <?php  $_smarty_tpl->tpl_vars['news_flash'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news_flash']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$news_flash = $news_flash; if (!is_array($news_flash) && !is_object($news_flash)) { settype($news_flash, 'array');}
foreach ($news_flash as $_smarty_tpl->tpl_vars['news_flash']->key => $_smarty_tpl->tpl_vars['news_flash']->value) {
$_smarty_tpl->tpl_vars['news_flash']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['news_flash']->key;
?>
    <input name="picurl" id="<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
" type="hidden" value="<?php echo smarty_function_formatpicurl(array('path'=>$_smarty_tpl->tpl_vars['news_flash']->value['newsphoto']),$_smarty_tpl);?>
+<?php echo $_smarty_tpl->tpl_vars['news_flash']->value['url'];?>
+<?php echo $_smarty_tpl->tpl_vars['news_flash']->value['title'];?>
" />
    <?php } ?>
    
  </div>
  <div class="yun_news_top" style="margin-top: 20px;">
  <div class="yun_news_top_tit_t"></div>
  <div class="yun_news_top_tit"><span class="yun_news_top_tit_p">今日推荐</span></div>
  <ul class="yun_news_top_list">
  <?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news']->_loop = false;
$news = $news; if (!is_array($news) && !is_object($news)) { settype($news, 'array');}
foreach ($news as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
?>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['news']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</a><em><?php echo $_smarty_tpl->tpl_vars['news']->value['time'];?>
</em></li>
  <?php } ?>
  </ul>
  </div>
 
  <div class="news_cont fl" id="renew"> 
    
   
    <?php  $_smarty_tpl->tpl_vars['arcgroupright'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arcgroupright']->_loop = false;
global $db,$db_config,$config;eval('$paramer=array("arclist"=>"7","arcpic"=>"1","r_news"=>"1","item"=>"\'arcgroupright\'","urlstatic"=>"1","len"=>"4","pt_len"=>"25","pd_len"=>"32","t_len"=>"25","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
		include PLUS_PATH."/group.cache.php";

		$group = array();
		if($paramer['classid']){
			$classid = @explode(',',$paramer['classid']);
			if(is_array($classid)){
				foreach($classid as $key=>$value){
					$Info['id']   = $value;
					$Info['name'] = $group_name[$value];
					$group[] = $Info;
				}
			}
		}else if($paramer['rec']){
			if(is_array($group_rec)){
				foreach($group_rec as $key=>$value){
					$Info['id']   = $value;
					$Info['name'] = $group_name[$value];
					$group[] = $Info;
				}
			}
		}else if($paramer['r_news']){
			if(is_array($group_recnews)){
				foreach($group_recnews as $key=>$value){
					$Info['id']   = $value;
					$Info['name'] = $group_name[$value];        
					$group[] = $Info;
				}
			}
		}else{
			if(is_array($group_index)){
				foreach($group_index as $key=>$value){
					$Info['id']   = $value;
					$Info['name'] = $group_name[$value];
					$group[] = $Info;
				}
			}
		}
		if(is_array($group)){
			foreach($group as $key=>$value){
              if($paramer[r_list]){
				  if(is_array($group_type)){
					  foreach($group_type as $k=>$v){           
						 if($value['id']==strval($k)){
							foreach($v as $ke=>$va){
							  $rs['id']=$va;
							  $rs['name']=$group_name[$va];
							  if($config[sy_news_rewrite]=="2"){
								$rs[url] = $config['sy_weburl']."/news/".$va."/";
								}else{
								  $rs[url]= Url('article',array('c'=>'list',"nid"=>$va),"1");
								}
							  $r_list[] = $rs;
							}
						  }
					  }
				  }
				 
					$group[$key][r_list] = $r_list;
					unset($r_list);
				}
				if(intval($paramer[len])>0){
					$len = intval($paramer[len]);
					$group[$key][name] = mb_substr($value[name],0,$len,"GBK");
				}
				if($group_type[$value['id']]){
					$nids = $value['id'].",".@implode(',',$group_type[$value['id']]);
				}else{
					$nids = $value['id'];
				}
				if($config[sy_news_rewrite]=="2"){
					$group[$key][url] = $config['sy_weburl']."/news/".$value[id]."/";
				}else{
					 $group[$key][url] = Url('article',array('c'=>'list',"nid"=>$value[id]),"1");


				}
				if($config[did]){
					$newswhere=" and `did`=$config[did]";
				}
				if($paramer[arcpic]){
					$query = $db->query("SELECT * FROM `$db_config[def]news_base` WHERE `nid` IN ($nids) AND `newsphoto`<>'' $newswhere  ORDER BY `datetime` DESC limit $paramer[arcpic]");
					while($rs = $db->fetch_array($query)){
						if(intval($paramer[pt_len])>0){
							$len = intval($paramer[pt_len]);
							$rs[title] = mb_substr($rs[title],0,$len,"GBK");
						}

						if($rs[color]){

							$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";

						}
						if(intval($paramer[pd_len])>0){
							$len = intval($paramer[pd_len]);
							$rs[description] = mb_substr($rs[description],0,$len,"GBK");
						}
						foreach($group as $k=>$v){
							if($v[id]==$rs[nid]){
								$rs[name] = $v[name];
							}
						}
						if($config[sy_news_rewrite]=="2"){
							$rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
						}else{
							$rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
						}
                        $picid[]=$rs['id'];
						$arcpic[] = $rs;
					}
					$group[$key][arcpic] = $arcpic;
					unset($arcpic);
				}
				if($paramer[arclist]){
					$query = $db->query("SELECT * FROM `$db_config[def]news_base` WHERE `nid` IN ($nids) $newswhere  ORDER BY `datetime` DESC limit $paramer[arclist]");
					while($rs = $db->fetch_array($query)){
						if(intval($paramer[t_len])>0){
							$len = intval($paramer[t_len]);
							$rs[title] = mb_substr($rs[title],0,$len,"GBK");
						}

						if($rs[color]){

							$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";

						}
						if(intval($paramer[d_len])>0){
							$len = intval($paramer[d_len]);
							$rs[description] = mb_substr($rs[description],0,$len,"GBK");
						}
						foreach($group as $k=>$v){
							if($v[id]==$rs[nid]){
								$rs[name] = $v[name];
							}
						}
						if($config[sy_news_rewrite]=="2"){
							$rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
						}else{
							$rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
						}
                        //鍘绘帀鍜屽浘鐗囪祫璁浉鍚岀殑涓�鏉★紝鎬绘潯鏁版槸鏂囧瓧璧勮鏉℃暟鍔犱笂鍥剧墖璧勮鏉℃暟
                        if($paramer[arcpic]){
                            if(!in_array($rs['id'],$picid)){
                               if(count($arclist)<($paramer[arclist]-1)){
            					    $arclist[] = $rs;
            					}
                            } 
                        }else{
                            if(count($arclist)<($paramer[arclist]-1)){
        					    $arclist[] = $rs;
        					}
                        }
					}
					$group[$key][arclist] = $arclist;
					unset($arclist);
				}
			}
		}$group = $group; if (!is_array($group) && !is_object($group)) { settype($group, 'array');}
foreach ($group as $_smarty_tpl->tpl_vars['arcgroupright']->key => $_smarty_tpl->tpl_vars['arcgroupright']->value) {
$_smarty_tpl->tpl_vars['arcgroupright']->_loop = true;
?>
    <?php if (is_array($_smarty_tpl->tpl_vars['arcgroupright']->value['arclist'])||is_array($_smarty_tpl->tpl_vars['arcgroupright']->value['arcpic'])&&count($_smarty_tpl->tpl_vars['arcgroupright']->value['arclist'])>0) {?>
    <div class="news_sort_list fl">
      <div class="news_ind_tit"> <span><?php echo $_smarty_tpl->tpl_vars['arcgroupright']->value['name'];?>
</span><i class="act_tit_bg yun_bg_color"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['arcgroupright']->value['url'];?>
">更多>></a> </div>
      <?php  $_smarty_tpl->tpl_vars['acrpicsright'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['acrpicsright']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arcgroupright']->value['arcpic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['acrpicsright']->key => $_smarty_tpl->tpl_vars['acrpicsright']->value) {
$_smarty_tpl->tpl_vars['acrpicsright']->_loop = true;
?>
      <dl>
        <dt> <a href="<?php echo $_smarty_tpl->tpl_vars['acrpicsright']->value['url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['acrpicsright']->value['s_thumb'];?>
"  width="113" height="77" alt="<?php echo $_smarty_tpl->tpl_vars['acrpicsright']->value['title'];?>
"></a> </dt>
        <dd>
          <p style="width:100%;"><a  target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['acrpicsright']->value['url'];?>
" class="yun_text_color"><?php echo $_smarty_tpl->tpl_vars['acrpicsright']->value['title'];?>
</a></p>
          <span style="width:100%;"><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['acrpicsright']->value['description']);?>
...</span> </dd>
      </dl>
      <?php } ?>
      <ul>
        <?php  $_smarty_tpl->tpl_vars['arclistright'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arclistright']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arcgroupright']->value['arclist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arclistright']->key => $_smarty_tpl->tpl_vars['arclistright']->value) {
$_smarty_tpl->tpl_vars['arclistright']->_loop = true;
?>
        <li class="png"> <a href="<?php echo $_smarty_tpl->tpl_vars['arclistright']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['arclistright']->value['title'];?>
</a> </li>
        <?php } ?>
      </ul>
    </div>
    <?php }?>
    <?php } ?> </div>
</div>
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
DD_belatedPNG.fix('.png');
<?php echo '</script'; ?>
>
<![endif]-->

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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/article/imageslide.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/article/prototype.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
new ImageSlide({
	project:"#focusImage",
	content:".contents li",
	tigger:".triggers a",
	dot:".icon-dot a",
	watch:".link-watch",
	auto:!0,
	hide:!0
})
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
