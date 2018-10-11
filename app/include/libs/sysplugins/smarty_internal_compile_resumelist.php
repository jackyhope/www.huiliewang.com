<?php

class Smarty_Internal_Compile_Resumelist extends Smarty_Internal_CompileBase{
    public $required_attributes = array('item');
    public $optional_attributes = array('id','eid','name', 'post_len','order','ispage', 'limit','minsalary', 'maxsalary', 'edu', 'exp', 'sex','birthdate', 'keyword', 'hy','resume_kind','minage','maxage','jobs_id','ids','status','hope_city','location','job_name','com_name','uname');
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
//        $content = ArrayToString($_attr,true);
//	    var_dump($content);exit();

        $OutputStr=''.$name.'=array();global $db,$db_config,$db_config1,$config;
        
        $db1 = new mysql($db_config1[\'dbhost\'], $db_config1[\'dbuser\'], $db_config1[\'dbpass\'], $db_config1[\'dbname\'], ALL_PS, $db_config1[\'charset\'],$db_config1[\'def\']);

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

		$cache_array = $db1->cacheget();
		$userclass_name = $cache_array["user_classname"];
		$city_name      = $cache_array["city_name"];
		$job_name		= $cache_array["job_name"];
		$job_type		= $cache_array["job_type"];
		$industry_name	= $cache_array["industry_name"];
		$where = "1 ";
		
		if($paramer[edu]){
		    $where .=" and edu=".$paramer[edu];
		}
		if($paramer[exp]){
		    $where .=" and exp=".$paramer[exp];
		}
		if($paramer[hy]){
		    $where .=" and hy=".$paramer[hy];
		}
		if($paramer[location]){
		    $where .=" and living=".$paramer[location];
		}
		if($paramer[sex]){
		    $where .=" and sex=".$paramer[sex];
		}
		if($paramer[status]){
		    $where .=" and jobstatus=".$paramer[status];
		}
		if($paramer[jobs_id]){
		    $where .=" and (jobs_id=".$paramer[jobs_id]." or jobs_id1=".$paramer[jobs_id]." or jobs_id2=".$paramer[jobs_id].")";
		}
		
		if($paramer[hope_city]){
		    $where .=" and (city=".$paramer[hope_city]." or city1=".$paramer[hope_city]." or city2=".$paramer[hope_city].")";
		}
		
		if($paramer[minsalary] && $paramer[maxsalary]){
		    $where .=" and (salary*salary_month>".$paramer[minsalary]." and salary*salary_month<".$paramer[maxsalary].")";
		}elseif($paramer[minsalary] && empty($paramer[maxsalary])){
		    $where .=" and salary*salary_month>".$paramer[minsalary];
		}elseif(empty($paramer[minsalary]) && $paramer[maxsalary]){
		    $where .=" and salary*salary_month<".$paramer[maxsalary];
		}

        if($paramer[minage] && $paramer[maxage]){
            $minage = strtotime($paramer[minage].".1.1");
            $maxage = strtotime($paramer[maxage].".1.1");
            $where .=" and (birthday>".$minage." and birthday<".$maxage.")";
        }elseif($paramer[minage] && empty($paramer[maxage])){
            $minage = strtotime($paramer[minage].".1.1");
            $where .=" and birthday>".$minage;
        }elseif(empty($paramer[minage]) && $paramer[maxage]){
            $maxage = strtotime($paramer[maxage].".1.1");
            $where .=" and birthday<".$maxage;
        }
		
		
		
		if($paramer[resume_kind]=="collect"){
			$collect = $db->select_all("fav_resume","uid=".$_COOKIE[\'uid\'],"eid");
			$ids = array();
			foreach($collect as $key=>$li){
			    $ids[$key] = $li[eid];
			}
			$ids = implode(",",$ids);
			if($ids){
			    $where .= " and id in(".$ids.")";
			}else{
			    $where .= " and id in(0)";
			}
			
		}elseif($paramer[resume_kind]=="myself"){
			$where .= " and uid=".$_COOKIE[\'uid\'];
			
		}elseif($paramer[resume_kind]=="recommend"){
		    $recommend = $db->select_all("userid_job","identity=3 and uid=".$_COOKIE[\'uid\'],"eid");
		   
			$ids = array();
			foreach($recommend as $key=>$li){
			    $ids[$key] = $li[eid];
			}
			$ids = implode(",",$ids);
			if($ids){
			    $where .= " and id in(".$ids.")";
			}else{
			    $where .= " and id in(0)";
			}
		}
		
		$where .=" order by lastupdate desc";
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}
		
		if($paramer[ispage]){
		    $limit = PageNavResume($paramer,$_GET,"resume_index",$where,$Purl,"",\'0\',$_smarty_tpl);
		}


		'.$name.'=$db1->select_all("resume_index",$where.$limit,"*");
		
        include(CONFIG_PATH."db.data.php");		
		if('.$name.' && is_array('.$name.')){
			foreach('.$name.' as $k=>$v){
			    $v=$db1->DB_select_once($db1->get_hash_table("resume",$v[id]),"id=".$v[\'id\']);
			    $edu = unserialize($v[\'edu_content\']);
			   
			    '.$name.'[$k] = $v;
			    '.$name.'[$k][name] = iconv("UTF-8","gbk",$v[name]);
			    '.$name.'[$k][current_company] = iconv("UTF-8","gbk",$v[current_company]);
			    '.$name.'[$k][current_job] = iconv("UTF-8","gbk",$v[current_job]);
			    '.$name.'[$k][\'eid\'] = $v[id];
			    '.$name.'[$k][\'age\'] = date("Y")-date("Y",$v[\'birthday\']);
			    '.$name.'[$k][\'edu_n\']=$userclass_name[$v[\'edu\']];
                '.$name.'[$k][\'exp_n\']=$userclass_name[$v[\'exp\']];
                '.$name.'[$k][\'living\']=$city_name[$v[\'living\']];
                if($v[\'hope_salary\']){
                  '.$name.'[$k][\'salary_n\']=$v[\'hope_salary\']."万以上";
                }else{
                    '.$name.'[$k][\'salary_n\']="薪资面议";
                }
               
               
                if($v[\'citys_id\']){
                    $v[\'citys_id\'] = explode(",",$v[\'citys_id\']);
                    $citys_id = "";
                    foreach($v[\'citys_id\'] as $li){
                        $citys_id[] = $city_name[$li];                    
                    }
                    '.$name.'[$k][\'hope_city\'] = implode(",",$citys_id);
                }
                
                if($v[\'jobs_classid\']){
                    $v[\'jobs_classid\'] = explode(",",$v[\'jobs_classid\']);
                    $job_classname = "";
                    foreach($v[\'jobs_classid\'] as $li){
                        $job_classname[] = $job_name[$li];                    
                    }
                    '.$name.'[$k][\'job_classname\'] = $job_classname;
                }
                
			    '.$name.'[$k][\'project_content\'] = array_iconv(array_slice(unserialize($v[\'project_content\']),0,3),"UTF-8","gbk");
                '.$name.'[$k][\'resume_work\'] = array_iconv(array_slice(unserialize($v[\'work_content\']),0,3),"UTF-8","gbk");
              
                 $resume_edu= array_iconv(array_slice(unserialize($v[\'edu_content\']),0,1),"UTF-8","gbk");
                
			    '.$name.'[$k][\'resume_edu\'] = $resume_edu[0];
			    
			      if($v){
			     '.$name.'[$k][\'apply_jobs\'] = $db->select_all("userid_job","eid=".$v[\'id\']." order by datetime desc limit 0,3","job_name,datetime,job_id");
			    '.$name.'[$k][\'lietou_num\']=$db->select_num("userid_job","eid=".$v[\'id\']." and identity=3 group by uid");
			     '.$name.'[$k][\'fav_resume\']=$db->select_num("fav_resume","eid=".$v[\'id\']." and uid=".$_COOKIE[\'uid\']);
			    '.$name.'[$k][\'job_num\']=$db->select_num("userid_job","eid=".$v[\'id\']." and identity=3 group by job_id");
			    '.$name.'[$k][\'download_num\']=$db->select_num("userid_job","eid=".$v[\'id\']." and identity=3 and is_browse=6");
                
        
                
                
                $recommend=$db->DB_select_once("userid_job","eid=".$v[\'id\']." order by datetime desc","datetime");
                if($recommend[\'datetime\']){
                    '.$name.'[$k][\'datetime\']=_format_date($recommend[\'datetime\']);
                }else{
                    '.$name.'[$k][\'datetime\']="暂无推荐";
                }
				'.$name.'[$k][\'user_jobstatus_n\']=$userclass_name[$v[\'jobstatus\']];
								
				$job_classid = explode(",",$v[\'job_classid\']);
				'.$name.'[$k][\'lastupdate\']=date("Y-m-d",$v[\'lastupdate\']);
					
				'.$name.'[$k][\'user_url\']=Url("resume",array("c"=>"show","id"=>$v[\'id\']),"1");

				
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
			    }
			}  
			 '.$name.' = array_filter('.$name.');
		}
        ';
        global $DiyTagOutputStr;
        $DiyTagOutputStr[]=$OutputStr;
        return SmartyOutputStr($this,$compiler,$_attr,'resumelist',$name,'',$name);
    }
}
class Smarty_Internal_Compile_Resumelistelse extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);

        list($openTag, $nocache, $item, $key) = $this->closeTag($compiler, array('resumelist'));
        $this->openTag($compiler, 'resumelistelse', array('resumelistelse', $nocache, $item, $key));

        return "<?php }\nif (!\$_smarty_tpl->tpl_vars[$item]->_loop) {\n?>";
    }
}
class Smarty_Internal_Compile_Resumelistclose extends Smarty_Internal_CompileBase{
    public function compile($args, $compiler, $parameter){
        $_attr = $this->getAttributes($compiler, $args);
        if ($compiler->nocache) {
            $compiler->tag_nocache = true;
        }

        list($openTag, $compiler->nocache, $item, $key) = $this->closeTag($compiler, array('resumelist', 'resumelistelse'));

        return "<?php } ?>";
    }
}
