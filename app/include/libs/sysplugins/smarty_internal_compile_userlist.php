<?php
class Smarty_Internal_Compile_Userlist extends Smarty_Internal_CompileBase{
    public $required_attributes = array('item');
    public $optional_attributes = array('name', 'key', 'post_len', 'limit', 'salary', 'minsalary', 'maxsalary', 'idcard', 'edu', 'order', 'work', 'exp', 'sex','birthday', 'keyword', 'hy', 'provinceid', 'report', 'cityid', 'three_cityid', 'adtime', 'jobids', 'pic', 'typeids', 'type', 'job1_son', 'job_post', 'uptime', 'ispage', 'rec_resume','where_uid', 'height_status', 'rec', 't_len' ,'top','job_classid','islt','job1','isshow','cityin','jobin','where','topdate','noid','tag','jobs_id1','jobs_id2','jobs_id','minage','maxage');
    public $shorttag_order = array('from', 'item', 'key', 'name');
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);

        $from = $_attr['from'];
        $item = $_attr['item'];
        $name = $_attr['item'];
        $name=str_replace('\'','',$name);
        $name=$name?$name:'list';$name='$'.$name;
        if (!strncmp("\$_smarty_tpl->tpl_vars[$item]", $from, strlen($item) + 24)) {
            $compiler->trigger_template_error("item variable {$item} may not be the same variable as at 'from'", $compiler->lex->taglineno);
        }


        $OutputStr=''.$name.'=array();global $db,$db_config,$config;
		if(is_array($_GET)){
			foreach($_GET as $key=>$value){
				if($value==\'0\'){
					unset($_GET[$key]);
				}
			}
		}
		eval(\'$paramer='.str_replace('\'','\\\'',ArrayToString($_attr,true)).';\');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }

		$cache_array = $db->cacheget();
		$userclass_name = $cache_array["user_classname"];
		$city_name      = $cache_array["city_name"];
		$job_name		= $cache_array["job_name"];
		$job_type		= $cache_array["job_type"];
		$industry_name	= $cache_array["industry_name"];
		$where = "1";
		
		if($config[\'sy_web_site\']=="1"){
			if($config[province]>0 && $config[province]!=""){
				$paramer[provinceid] = $config[province];
			}
			if($config[\'cityid\']>0 && $config[\'cityid\']!=""){
				$paramer[\'cityid\']=$config[\'cityid\'];
			}
			if($config[\'three_cityid\']>0 && $config[\'three_cityid\']!=""){
				$paramer[\'three_cityid\']=$config[\'three_cityid\'];
			}
			if($config[\'hyclass\']>0 && $config[\'hyclass\']!=""){
				$paramer[\'hy\']=$config[\'hyclass\'];
			}
		}
	
		if($paramer[where_uid]){
			$where .=" AND `uid` in (".$paramer[\'where_uid\'].")";
		}
		
		if($_COOKIE[\'uid\']&&$_COOKIE[\'usertype\']=="2"){
			$blacklist=$db->select_all("blacklist","`p_uid`=\'".$_COOKIE[\'uid\']."\'","c_uid");
			if(is_array($blacklist)&&$blacklist){
				foreach($blacklist as $v){
					$buid[]=$v[\'c_uid\'];
				}
			$where .=" AND `uid` NOT IN (".@implode(",",$buid).")";
			}
		}
		

		
		if($paramer[noid]==1 && !empty($noids)){
			$where.=" AND `id` NOT IN (".@implode(\',\',$noids).")";
		}
		
//		if($paramer[idcard]){
//			$where .=" AND `idcard_status`=\'1\'";
//		}
	

		

		
		if($paramer[work]){
			$show=$db->select_all("resume_show","1 group by eid","`eid`");
			if(is_array($show)){
				foreach($show as $v){
					$eid[]=$v[\'eid\'];
				}
			}
			$where .=" AND id in (".@implode(",",$eid).")";
		}
		
		
//		if($paramer[cid]){
//			$where .= " AND (cityid=$paramer[cid] or three_cityid=$paramer[cid])";
//		}
		
//		if($paramer[keyword]){
//
//			$jobid = array();
//
//			$where1[]="`uname` LIKE \'%$paramer[keyword]%\'";
//			foreach($job_name as $k=>$v){
//				if(strpos($v,$paramer[keyword])!==false){
//					$jobid[]=$k;
//				}
//			}
//			if(is_array($jobid)){
//				foreach($jobid as $value){
//					$class[]="FIND_IN_SET(\'".$value."\',job_classid)";
//				}
//				$where1[]=@implode(" or ",$class);
//			}
//			include_once  PLUS_PATH."/city.cache.php";
//		    $cityid=array();
//			foreach($city_name as $k=>$v){
//				if(strpos($v,$paramer[keyword])!==false){
//					$cityid[]=$k;
//				}
//			}
//			if(is_array($cityid)){
//				foreach($cityid as $value){
//					$class[]= "(provinceid = \'".$value."\' or cityid = \'".$value."\')";
//				}
//				$where1[]=@implode(" or ",$class);
//			}
//			$where.=" AND (".@implode(" or ",$where1).")";
//		}
		
		
		
		
		if($paramer[hy]=="0"){
			$where .=" AND hy<>\'\'";
		}elseif($paramer[hy]!=""){
			$where .= " AND (`hy` IN (".$paramer[\'hy\']."))";
		}
	
//		$job_classid="";
//		$joball=array();
//		if($paramer[jobids]){
//			$joball=explode(",",$paramer[jobids]);
//			foreach(explode(",",$paramer[jobids]) as $v){
//				if($job_type[$v]){
//					$joball[]=@implode(",",$job_type[$v]);
//				}
//			}
//			$job_classid=implode(",",$joball);
//		}
//		if($paramer[jobin]){
//			$joball=explode(",",$paramer[jobin]);
//			foreach(explode(",",$paramer[jobin]) as $v){
//				if($job_type[$v]){
//					$joball[]=@implode(",",$job_type[$v]);
//				}
//			}
//			$job_classid=implode(",",$joball);
//		}
		
	
//		if($paramer[provinceid]){
//			$where .= " AND provinceid = $paramer[provinceid]";
//		}
//		
//		if($paramer[cityid]){
//			$where .= " AND (`cityid` IN ($paramer[cityid]))";
//		}
//	
//		if($paramer[three_cityid]){
//			$where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
//		}
//		
//		if($paramer[cityin]){
//			$where .= " AND(provinceid IN ($paramer[cityin]) OR cityid IN ($paramer[cityin]) OR three_cityid IN ($paramer[cityin]))";
//		}
		
		if($paramer[exp]){
			$where .=" AND exp=$paramer[exp]";
		}else{
			$where .=" AND exp>0";
		}
	
		if($paramer[edu]){
			$where .=" AND edu=$paramer[edu]";
		}else{
			$where .=" AND edu>0";
		}
	
		if($paramer[sex]){
			$where .=" AND sex=$paramer[sex]";
		}
		
		if($paramer[provinceid]){
			$where .=" AND (city=$paramer[provinceid] or city1=$paramer[provinceid] or city2=$paramer[provinceid])";
		}
		
        if($paramer[jobs_id]){
			$where .=" AND (jobs_id=$paramer[jobs_id] or jobs_id1=$paramer[jobs_id] or jobs_id2=$paramer[jobs_id])";
		}
		
		if($paramer[jobs_id1]){
			$where .=" AND (jobs_id=$paramer[jobs_id1] or jobs_id1=$paramer[jobs_id1] or jobs_id2=$paramer[jobs_id1])";
		}
		
		if($paramer[jobs_id2]){
			$where .=" AND (jobs_id=$paramer[jobs_id2] or jobs_id1=$paramer[jobs_id2] or jobs_id2=$paramer[jobs_id2])";
		}
		
		if($paramer[minsalary]&&$paramer[maxsalary]){
			$where .=" and minsalary*salary_month>=".$paramer[minsalary]." and  minsalary*salary_month<=".$paramer[maxsalary];
		}elseif($paramer[minsalary]&&!$paramer[maxsalary]){
			$where .=" and minsalary*salary_month>=".$paramer[minsalary];
		}elseif(!$paramer[minsalary]&&$paramer[maxsalary]){
			$where .=" and minsalary*salary_month<=".$paramer[maxsalary];
		}
		
		if($paramer[minage]&&$paramer[maxage]){
			$where .=" and birthdate >=".$paramer[minage]." and  birthdate <=".$paramer[maxage];
		}elseif($paramer[minage]&&!$paramer[maxage]){
			$where .=" and birthdate >=".$paramer[minage];
		}elseif(!$paramer[minage]&&$paramer[maxage]){
			$where .=" and birthdate <=".$paramer[maxage];
		}
		
	
//		if($paramer[type]){
//			$where .= " AND type=$paramer[type]";
//		}
		
		
		
        
		
//		if($paramer[order] && $paramer[order]!="lastdate"){
//			if($paramer[order]==\'ant_num\'){
//				$order = " ORDER BY `ant_num`";
//			}elseif($paramer[order]==\'topdate\'){
//				$nowtime=time();
//				$order = " ORDER BY if(topdate>$nowtime,topdate,lastupdate)";
//			}else{
//				$order = " ORDER BY `".str_replace("\'","",$paramer[order])."`";
//			}
//		}else{
			$order = " ORDER BY lastupdate ";
//		}
		
		
		$sort = $paramer[sort]?$paramer[sort]:\'DESC\';
	
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}
        
		if($paramer[where]){
			$where = $paramer[where];
		}
		if($paramer[ispage]){
			if($paramer["height_status"]){
				$limit = PageNav($paramer,$_GET,"resume_index",$where,$Purl,"",$paramer[islt]?$paramer[islt]:"3",$_smarty_tpl);
			}else{
				
				$limit = PageNav($paramer,$_GET,"resume_index",$where,$Purl,"",\'0\',$_smarty_tpl);
			}
		}
		$where.=$order.$sort;
//        echo $where;exit();
		'.$name.'=$db->select_all("resume_index",$where.$limit,"*");
		
        include(CONFIG_PATH."db.data.php");		
		if('.$name.' && is_array('.$name.')){
			if($paramer[\'top\']){
				$uids=$m_name=array();
				foreach('.$name.' as $k=>$v){
					$uids[]=$v[uid];
				}
				$member=$db->select_all($db_config[def]."member","`uid` in(".@implode(\',\',$uids).")","uid,username");
				foreach($member as $val){
					$m_name[$val[uid]]=$val[\'username\'];
				}
			}
			foreach('.$name.' as $key=>$value){
				$uid[] = $value[\'uid\'];
				$eid[] = $value[\'id\'];
			}
			$eids = @implode(\',\',$eid);
			$uids = @implode(\',\',$uid);
            $resume=$db->select_all("resume","`id` in(".$eids.")","id,name,nametype,tag,sex,edu,exp,photo,phototype,birthday");
           
             $resume_expect=$db->select_all("resume_expect","`id` in(".$eids.")","*");
             
			foreach('.$name.' as $k=>$v){
			   
			    foreach($resume_expect as $val){
			        if($v[\'id\']==$val[\'id\']){
			           '.$name.'[$k][\'uname\'] =  $val[uname];
			          
			            $hope_city[0] = $city_name[$v[city]];
                        $hope_city[1] = $city_name[$v[city1]];
                        $hope_city[2] = $city_name[$v[city2]];
                        $hope_city = array_filter($hope_city);
                       '.$name.'[$k][\'hope_city\'] = implode(",",$hope_city);
                       
                       $salary = $v[minsalary]*$v[salary_month];
                       '.$name.'[$k][\'salary_n\'] = "￥".$salary."以上";
                       
                        $hope_job[0] = $job_name[$v[jobs_id]];
                        $hope_job[1] = $job_name[$v[jobs_id1]];
                        $hope_job[2] = $job_name[$v[jobs_id2]];
                        $hope_job = array_filter($hope_job);
                       '.$name.'[$k][\'hope_job\'] = $hope_job;
			        }
                }
			    foreach($resume as $val){
			        if($v[\'id\']==$val[\'id\']){
			    		'.$name.'[$k][\'edu_n\']=$userclass_name[$val[\'edu\']];
				        '.$name.'[$k][\'exp_n\']=$userclass_name[$val[\'exp\']];
			            if($val[\'birthday\']){
							$year = date("Y",strtotime($val[\'birthday\']));
							'.$name.'[$k][\'age\'] =date("Y")-$year;
							
						}
		                
		                '.$name.'[$k][\'sex\'] =$val[\'sex\'];  
		                '.$name.'[$k][\'phototype\']=$val[phototype];
		                if($val[\'photo\'] && $val[\'phototype\']!=1&&(file_exists(str_replace($config[\'sy_weburl\'],APP_PATH,\'.\'.$val[\'photo\']))||file_exists(str_replace($config[\'sy_weburl\'],APP_PATH,$val[\'photo\'])))){
            				'.$name.'[$k][\'photo\']=str_replace("./",$config[\'sy_weburl\']."/",$val[\'photo\']);
            			}else{
            				if($val[\'sex\']==1||$val[\'sex\']==153){
            					'.$name.'[$k][\'photo\']=$config[\'sy_weburl\']."/".$config[\'sy_member_icon\'];
            				}else{
            					'.$name.'[$k][\'photo\']=$config[\'sy_weburl\']."/".$config[\'sy_member_iconv\'];
            				}
            			}
						if($val[\'tag\']){
                            '.$name.'[$k][\'tag\']=explode(\',\',$val[\'tag\']);
	                    }
                        '.$name.'[$k][\'nametype\']=$val[nametype];
                        //名称显示处理
						if($config[\'user_name\']==1 || !$config[\'user_name\']){
						if($val[\'nametype\']==3){
						    if($val[\'sex\']==1){
						        '.$name.'[$k][\'username_n\'] = mb_substr($val[\'name\'],0,1,\'gbk\')."先生";
						    }else{
						        '.$name.'[$k][\'username_n\'] = mb_substr($val[\'name\'],0,1,\'gbk\')."女士";
						    }
						}elseif($val[\'nametype\']==2){
						    '.$name.'[$k][\'username_n\'] = "NO.".$v[\'id\'];
						}else{
							'.$name.'[$k][\'username_n\'] = $val[\'name\'];
						}
						}elseif($config[\'user_name\']==3){
							if($val[\'sex\']==1){
								'.$name.'[$k][\'username_n\'] = mb_substr($val[\'name\'],0,1,\'gbk\')."先生";
							}else{
								'.$name.'[$k][\'username_n\'] = mb_substr($val[\'name\'],0,1,\'gbk\')."女士";
							}
						}elseif($config[\'user_name\']==2){
							'.$name.'[$k][\'username_n\'] = "NO.".$v[\'id\'];
						}elseif($config[\'user_name\']==4){
							'.$name.'[$k][\'username_n\'] = $val[\'name\'];
						}
                    }
                }
				if($paramer[topdate]){
					$noids[] = $v[id];
				}
				
				$time=$v[\'lastupdate\'];
				
				$beginToday=mktime(0,0,0,date(\'m\'),date(\'d\'),date(\'Y\'));
				
				$beginYesterday=mktime(0,0,0,date(\'m\'),date(\'d\')-1,date(\'Y\'));
				
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					'.$name.'[$k][\'time\'] = "一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					'.$name.'[$k][\'time\'] = "昨天";
				}elseif($time>$beginToday){
					'.$name.'[$k][\'time\'] = date("H:i",$v[\'lastupdate\']);
					'.$name.'[$k][\'redtime\'] =1;
				}else{
					'.$name.'[$k][\'time\'] = date("Y-m-d",$v[\'lastupdate\']);
				} 
				
				
				'.$name.'[$k][\'user_jobstatus_n\']=$userclass_name[$v[\'jobstatus\']];
				'.$name.'[$k][\'job_city_one\']=$city_name[$v[\'provinceid\']];
				'.$name.'[$k][\'job_city_two\']=$city_name[$v[\'cityid\']];
				'.$name.'[$k][\'job_city_three\']=$city_name[$v[\'three_cityid\']];
				
				'.$name.'[$k][\'report_n\']=$userclass_name[$v[\'report\']];
				'.$name.'[$k][\'type_n\']=$userclass_name[$v[\'type\']];
				'.$name.'[$k][\'lastupdate\']=date("Y-m-d",$v[\'lastupdate\']);
					
				'.$name.'[$k][\'user_url\']=Url("resume",array("c"=>"show","id"=>$v[\'id\']),"1");
				'.$name.'[$k]["hy_info"]=$industry_name[$v[\'hy\']];
				if($paramer[\'top\']){
					'.$name.'[$k][\'m_name\']=$m_name[$v[\'uid\']];
					'.$name.'[$k][\'user_url\']=Url("ask",array("c"=>"friend","a"=>"myquestion","uid"=>$v[\'uid\']));
				}
				$kjob_classid=@explode(",",$v[\'job_classid\']);
				$kjob_classid=array_unique($kjob_classid);	
				$jobname=array();
				if(is_array($kjob_classid)){
					foreach($kjob_classid as $val){
					    if($val!=\'\'){
					        if($paramer[\'keyword\']){
                               $jobname[]=str_replace($paramer[\'keyword\'],"<font color=#FF6600 >".$paramer[\'keyword\']."</font>",$job_name[$val]);
                            }else{
                               $jobname[]=$job_name[$val];
                            }
                        }
					}
				}
				'.$name.'[$k][\'job_post\']=@implode(",",$jobname);
				'.$name.'[$k][\'expectjob\']=$jobname;
				
				if($paramer[\'post_len\']){
					$postname[$k]=@implode(",",$jobname);
					'.$name.'[$k][\'job_post_n\']=mb_substr($postname[$k],0,$paramer[post_len],"GBK");
				}
			}
			foreach('.$name.' as $k=>$v){
               if($paramer[\'keyword\']){
					'.$name.'[$k][\'username_n\']=str_replace($paramer[\'keyword\'],"<font color=#FF6600 >".$paramer[\'keyword\']."</font>",$v[\'username_n\']);
					'.$name.'[$k][\'job_post\']=str_replace($paramer[\'keyword\'],"<font color=#FF6600 >".$paramer[\'keyword\']."</font>",'.$name.'[$k][\'job_post\']);
					'.$name.'[$k][\'job_post_n\']=str_replace($paramer[\'keyword\'],"<font color=#FF6600 >".$paramer[\'keyword\']."</font>",'.$name.'[$k][\'job_post_n\']);
					'.$name.'[$k][\'job_city_one\']=str_replace($paramer[\'keyword\'],"<font color=#FF6600 >".$paramer[\'keyword\']."</font>",$city_name[$v[\'provinceid\']]);
					'.$name.'[$k][\'job_city_two\']=str_replace($paramer[\'keyword\'],"<font color=#FF6600 >".$paramer[\'keyword\']."</font>",$city_name[$v[\'cityid\']]);
				}
            }
			if($paramer[\'keyword\']!=""&&!empty('.$name.')){
				addkeywords(\'5\',$paramer[\'keyword\']);
			}
		}';

        global $DiyTagOutputStr;
        $DiyTagOutputStr[]=$OutputStr;
        return SmartyOutputStr($this,$compiler,$_attr,'userlist',$name,'',$name);
    }
}
class Smarty_Internal_Compile_Userlistelse extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);

        list($openTag, $nocache, $item, $key) = $this->closeTag($compiler, array('userlist'));
        $this->openTag($compiler, 'userlistelse', array('userlistelse', $nocache, $item, $key));

        return "<?php }\nif (!\$_smarty_tpl->tpl_vars[$item]->_loop) {\n?>";
    }
}
class Smarty_Internal_Compile_Userlistclose extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);
        if ($compiler->nocache) {
            $compiler->tag_nocache = true;
        }

        list($openTag, $compiler->nocache, $item, $key) = $this->closeTag($compiler, array('userlist', 'userlistelse'));

        return "<?php } ?>";
    }
}
