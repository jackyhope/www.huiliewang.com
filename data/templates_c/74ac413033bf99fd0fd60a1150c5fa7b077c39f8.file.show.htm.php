<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-10-04 09:21:58
         compiled from "/home/wwwroot/www.huiliewang.com/app/template/default/announcement/show.htm" */ ?>
<?php /*%%SmartyHeaderCode:19991832565bb56b36c4df07-95264949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74ac413033bf99fd0fd60a1150c5fa7b077c39f8' => 
    array (
      0 => '/home/wwwroot/www.huiliewang.com/app/template/default/announcement/show.htm',
      1 => 1517800852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19991832565bb56b36c4df07-95264949',
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
    'Info' => 0,
    'key' => 0,
    'news_jian' => 0,
    'news_hits' => 0,
    'indexnews1' => 0,
    'indexnews2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5bb56b36d0ee43_27130111',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb56b36d0ee43_27130111')) {function content_5bb56b36d0ee43_27130111($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/wwwroot/www.huiliewang.com/app/include/libs/plugins/modifier.date_format.php';
?><?php global $db,$db_config,$config;include PLUS_PATH.'/group.cache.php';$news_jian=array();$rs=null;$nids=null;eval('$paramer=array("limit"=>"1","type"=>"\'tj\'","pic"=>"1","t_len"=>"7","urlstatic"=>"1","key"=>"\'key\'","item"=>"\'news_jian\'","nocache"=>"")
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
					if(count($news_jian[$rs['nid']]['pic'])<$piclimit){
					    $news_jian[$rs['nid']]['pic'][] = $rs;
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
				if(count($news_jian[$rs['nid']]['arclist'])<$paramer[limit]){
					$news_jian[$rs['nid']]['arclist'][] = $rs;
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
                $news_jian[] = $rs;
            }
		} ?>
<?php global $db,$db_config,$config;include PLUS_PATH.'/group.cache.php';$news_hits=array();$rs=null;$nids=null;eval('$paramer=array("limit"=>"6","order"=>"\'hits\'","t_len"=>"17","urlstatic"=>"1","key"=>"\'key\'","item"=>"\'news_hits\'","nocache"=>"")
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
					if(count($news_hits[$rs['nid']]['pic'])<$piclimit){
					    $news_hits[$rs['nid']]['pic'][] = $rs;
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
				if(count($news_hits[$rs['nid']]['arclist'])<$paramer[limit]){
					$news_hits[$rs['nid']]['arclist'][] = $rs;
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
                $news_hits[] = $rs;
            }
		} ?>
<?php global $db,$db_config,$config;include PLUS_PATH.'/group.cache.php';$indexnews1=array();$rs=null;$nids=null;eval('$paramer=array("rec"=>"1","limit"=>"1","pic"=>"1","t_len"=>"7","d_len"=>"24","urlstatic"=>"1","order"=>"\'hits\'","item"=>"\'indexnews1\'","key"=>"\'key\'","nocache"=>"")
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
					if(count($indexnews1[$rs['nid']]['pic'])<$piclimit){
					    $indexnews1[$rs['nid']]['pic'][] = $rs;
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
				if(count($indexnews1[$rs['nid']]['arclist'])<$paramer[limit]){
					$indexnews1[$rs['nid']]['arclist'][] = $rs;
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
                $indexnews1[] = $rs;
            }
		} ?>
<?php global $db,$db_config,$config;include PLUS_PATH.'/group.cache.php';$indexnews2=array();$rs=null;$nids=null;eval('$paramer=array("limit"=>"10","t_len"=>"16","d_len"=>"24","urlstatic"=>"1","order"=>"\'hits\'","item"=>"\'indexnews2\'","nocache"=>"")
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
					if(count($indexnews2[$rs['nid']]['pic'])<$piclimit){
					    $indexnews2[$rs['nid']]['pic'][] = $rs;
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
				if(count($indexnews2[$rs['nid']]['arclist'])<$paramer[limit]){
					$indexnews2[$rs['nid']]['arclist'][] = $rs;
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
                $indexnews2[] = $rs;
            }
		} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<META name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
<META name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css">
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/yun_job_fairs.css" type="text/css">
<link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/news.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="yun_content">
   <div class="current_Location icon"> 您当前的位置：<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
">首页</a> > <a href="<?php echo smarty_function_url(array('m'=>'announcement'),$_smarty_tpl);?>
">网站公告</a> </div>
     
  <div class="zx_cont_inner">
    <div class="wrap">
    <div class="zx_show_cont fl">
        <div class="zx_cont_main">
          <h1><?php echo $_smarty_tpl->tpl_vars['Info']->value['title'];?>
</h1>
          <div class="zx_main_source">
            <div>
      <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Info']->value['datetime'],"%Y-%m-%d");?>
 
            </div>
          </div>
          <div class="zx_art_content">
<?php echo $_smarty_tpl->tpl_vars['Info']->value['content'];?>

</div>
            <div class="zx_well_flip"> <?php if (!empty($_smarty_tpl->tpl_vars['Info']->value['last'])) {?> <span>上一篇： <a title="<?php echo $_smarty_tpl->tpl_vars['Info']->value['last']['title'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['Info']->value['last']['url'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['Info']->value['last']['title'],0,20,'GBK');?>
</a></span> <?php }?>
              <?php if (!empty($_smarty_tpl->tpl_vars['Info']->value['next'])) {?> <span>下一篇： <a title="<?php echo $_smarty_tpl->tpl_vars['Info']->value['next']['title'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['Info']->value['next']['url'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['Info']->value['next']['title'],0,20,'GBK');?>
</a> </span> <?php }?>
              <div class="clear"></div>
            </div>
     
          </div>
      </div>
      <div class="zx_inner_right fr">
        <div class="zx_rig_rom">
          <div class="zx_article">
            <div class="zx_art_tit"><i class="Company_h1_line"></i>推荐文章</div>
            <div class="zx_art_hot"> <?php  $_smarty_tpl->tpl_vars['news_jian'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news_jian']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$news_jian = $news_jian; if (!is_array($news_jian) && !is_object($news_jian)) { settype($news_jian, 'array');}
foreach ($news_jian as $_smarty_tpl->tpl_vars['news_jian']->key => $_smarty_tpl->tpl_vars['news_jian']->value) {
$_smarty_tpl->tpl_vars['news_jian']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['news_jian']->key;
?> 
              <?php if ($_smarty_tpl->tpl_vars['key']->value=='0'&&empty($_smarty_tpl->tpl_vars['news_jian']->value)) {?>
              <div>暂无推荐</div>
              <?php } else { ?>
              <dl>
                <dt><a href="<?php echo $_smarty_tpl->tpl_vars['news_jian']->value['url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['news_jian']->value['newsphoto'];?>
" style="width:84px; height:63px;" /></a></dt>
                <dd>
                  <div class="art_fanfu"><a href="<?php echo $_smarty_tpl->tpl_vars['news_jian']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['news_jian']->value['title'];?>
</a></div>
                  <div class="art_xq"><?php echo mb_substr($_smarty_tpl->tpl_vars['news_jian']->value['description'],0,22,'gbk');?>
</div>
                </dd>
              </dl>
              <?php }?>
              <?php } ?>
              <div class="clear"></div>
            </div>
            <div class="zx_art_list">
              <ul>
                <?php  $_smarty_tpl->tpl_vars['news_hits'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news_hits']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$news_hits = $news_hits; if (!is_array($news_hits) && !is_object($news_hits)) { settype($news_hits, 'array');}
foreach ($news_hits as $_smarty_tpl->tpl_vars['news_hits']->key => $_smarty_tpl->tpl_vars['news_hits']->value) {
$_smarty_tpl->tpl_vars['news_hits']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['news_hits']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['key']->value=='0'&&empty($_smarty_tpl->tpl_vars['news_hits']->value)) {?>
                <li>暂无文章</li>
                <?php } else { ?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['news_hits']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['news_hits']->value['title'];?>
</a></li>
                <?php }?> 
                <?php } ?>
              </ul>
            </div>
            <div class="clear"></div>
          </div>
          <div class="zx_article">
            <div class="zx_art_tit"><i class="Company_h1_line"></i>最新文章</div>
              <?php  $_smarty_tpl->tpl_vars['indexnews1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['indexnews1']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$indexnews1 = $indexnews1; if (!is_array($indexnews1) && !is_object($indexnews1)) { settype($indexnews1, 'array');}
foreach ($indexnews1 as $_smarty_tpl->tpl_vars['indexnews1']->key => $_smarty_tpl->tpl_vars['indexnews1']->value) {
$_smarty_tpl->tpl_vars['indexnews1']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['indexnews1']->key;
?>
              <?php if ($_smarty_tpl->tpl_vars['key']->value<=1) {?>
              <div class="zx_art_hot">
                  <dl>
                      <dt><a href="<?php echo $_smarty_tpl->tpl_vars['indexnews1']->value['pic'][0]['url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['indexnews1']->value['pic'][0]['newsphoto'];?>
" width="84" height="63" /></a></dt>
                      <dd>
                          <div class="art_fanfu"><a href="<?php echo $_smarty_tpl->tpl_vars['indexnews1']->value['pic'][0]['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['indexnews1']->value['pic'][0]['title'];?>
</a></div>
                          <div class="art_xq"><?php echo $_smarty_tpl->tpl_vars['indexnews1']->value['pic'][0]['description'];?>
..</div>
                      </dd>
                  </dl>
                  <div class="clear"></div>
              </div>
              <?php }?>
              <?php } ?>
            <div class="zx_art_list">
              <ul>
                  <?php  $_smarty_tpl->tpl_vars['indexnews2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['indexnews2']->_loop = false;
$indexnews2 = $indexnews2; if (!is_array($indexnews2) && !is_object($indexnews2)) { settype($indexnews2, 'array');}
foreach ($indexnews2 as $_smarty_tpl->tpl_vars['indexnews2']->key => $_smarty_tpl->tpl_vars['indexnews2']->value) {
$_smarty_tpl->tpl_vars['indexnews2']->_loop = true;
?>
                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['indexnews2']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['indexnews2']->value['title'];?>
</a></li>
                  <?php } ?>
              </ul>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
    
</div>

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
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
