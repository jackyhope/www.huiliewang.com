<?php 
$phpyun_ad=array('id'=>'int(20)','ad_name'=>'varchar(100)','did'=>'varchar(100)','time_start'=>'varchar(100)','time_end'=>'varchar(100)','ad_type'=>'varchar(10)','word_info'=>'text','word_url'=>'varchar(100)','pic_url'=>'varchar(100)','pic_src'=>'varchar(100)','pic_content'=>'varchar(200)','pic_width'=>'varchar(100)','pic_height'=>'varchar(100)','flash_url'=>'varchar(100)','flash_src'=>'varchar(100)','flash_width'=>'varchar(100)','flash_height'=>'varchar(100)','class_id'=>'int(20)','is_check'=>'int(2)','is_open'=>'int(1)','target'=>'int(2)','hits'=>'int(11)','remark'=>'varchar(255)','sort'=>'int(11)','lianmeng_url'=>'varchar(100)')
; 
$phpyun_ad_class=array('id'=>'int(20)','class_name'=>'varchar(100)','orders'=>'int(20)','href'=>'varchar(100)','integral_buy'=>'varchar(100)','type'=>'int(11)')
; 
$phpyun_adclick=array('id'=>'int(11)','aid'=>'int(11)','uid'=>'int(11)','ip'=>'varchar(20)','addtime'=>'int(11)')
; 
$phpyun_admin_announcement=array('id'=>'int(11)','title'=>'varchar(255)','keyword'=>'varchar(255)','description'=>'varchar(255)','content'=>'text','datetime'=>'int(11)','did'=>'varchar(100)')
; 
$phpyun_admin_config=array('name'=>'varchar(255)','config'=>'text')
; 
$phpyun_admin_email=array('id'=>'int(11)','smtpserver'=>'varchar(100)','smtpuser'=>'varchar(100)','smtppass'=>'varchar(100)','smtpport'=>'varchar(100)','smtpnick'=>'varchar(100)','default'=>'int(11)')
; 
$phpyun_admin_link=array('id'=>'int(8)','link_name'=>'varchar(50)','link_url'=>'varchar(50)','img_type'=>'int(30)','pic'=>'varchar(255)','link_type'=>'varchar(1)','link_state'=>'int(1)','link_sorting'=>'int(8)','link_time'=>'varchar(20)','did'=>'int(11)','tem_type'=>'int(11)')
; 
$phpyun_admin_log=array('id'=>'int(11)','uid'=>'int(11)','username'=>'varchar(200)','content'=>'text','ctime'=>'int(11)','did'=>'int(11)')
; 
$phpyun_admin_navigation=array('id'=>'int(11)','name'=>'varchar(60)','keyid'=>'int(11)','url'=>'varchar(70)','menu'=>'int(1)','classname'=>'varchar(100)','sort'=>'int(5)','display'=>'int(1)','dids'=>'int(1)')
; 
$phpyun_admin_template=array('id'=>'int(20)','name'=>'varchar(50)','tp_name'=>'varchar(50)','update_time'=>'int(32)','dir'=>'varchar(50)')
; 
$phpyun_admin_user=array('uid'=>'int(3)','m_id'=>'int(2)','username'=>'varchar(25)','password'=>'varchar(50)','name'=>'varchar(50)','isdid'=>'int(11)','did'=>'int(11)','lasttime'=>'int(11)')
; 
$phpyun_admin_user_group=array('id'=>'int(3)','group_name'=>'varchar(100)','group_power'=>'text','group_type'=>'int(1)','did'=>'int(11)')
; 
$phpyun_advice_question=array('id'=>'int(10)','username'=>'varchar(20)','infotype'=>'int(11)','content'=>'varchar(250)','mobile'=>'varchar(11)','ctime'=>'int(11)','email'=>'varchar(150)')
; 
$phpyun_answer=array('id'=>'int(11)','qid'=>'int(11)','uid'=>'int(11)','nickname'=>'varchar(25)','comment'=>'int(11)','support'=>'int(11)','oppose'=>'int(11)','content'=>'text','add_time'=>'int(11)','pic'=>'varchar(100)')
; 
$phpyun_answer_review=array('id'=>'int(11)','aid'=>'int(11)','qid'=>'int(11)','uid'=>'int(11)','support'=>'int(11)','content'=>'text','add_time'=>'int(11)')
; 
$phpyun_atn=array('id'=>'int(11)','uid'=>'int(11)','sc_uid'=>'int(11)','time'=>'int(11)','usertype'=>'int(11)','sc_usertype'=>'int(11)','tid'=>'int(11)','conid'=>'int(11)')
; 
$phpyun_attention=array('id'=>'int(11)','ids'=>'text','type'=>'int(11)','uid'=>'int(11)')
; 
$phpyun_bank=array('id'=>'int(11)','name'=>'varchar(200)','bank_name'=>'varchar(200)','bank_number'=>'varchar(200)','bank_address'=>'varchar(200)')
; 
$phpyun_banner=array('id'=>'int(11)','uid'=>'int(11)','pic'=>'varchar(100)')
; 
$phpyun_blacklist=array('id'=>'int(11)','p_uid'=>'int(11)','c_uid'=>'int(11)','inputtime'=>'int(11)','usertype'=>'int(1)','com_name'=>'varchar(100)')
; 
$phpyun_change=array('id'=>'int(11)','uid'=>'int(11)','username'=>'varchar(50)','usertype'=>'int(11)','name'=>'varchar(50)','gid'=>'int(11)','integral'=>'int(11)','ctime'=>'int(11)','num'=>'int(11)','linktel'=>'varchar(100)','linkman'=>'varchar(200)','body'=>'varchar(255)','status'=>'int(11)','statusbody'=>'text','express'=>'varchar(100)','expnum'=>'varchar(15)')
; 
$phpyun_city_class=array('id'=>'int(11)','keyid'=>'int(11)','name'=>'varchar(100)','letter'=>'varchar(1)','display'=>'int(1)','sitetype'=>'int(2)','sort'=>'int(11)')
; 
$phpyun_comclass=array('id'=>'int(11)','keyid'=>'int(11)','name'=>'varchar(50)','variable'=>'varchar(50)','sort'=>'int(11)')
; 
$phpyun_company=array('uid'=>'int(11)','name'=>'varchar(25)','hy'=>'int(5)','pr'=>'int(5)','provinceid'=>'int(5)','cityid'=>'int(5)','three_cityid'=>'int(5)','mun'=>'int(3)','sdate'=>'varchar(20)','money'=>'int(11)','moneytype'=>'int(11)','content'=>'text','address'=>'varchar(100)','zip'=>'varchar(10)','linkman'=>'varchar(50)','linkjob'=>'varchar(50)','linkqq'=>'varchar(20)','linkphone'=>'varchar(100)','linktel'=>'varchar(50)','linkmail'=>'varchar(150)','website'=>'varchar(100)','x'=>'varchar(100)','y'=>'varchar(100)','logo'=>'varchar(100)','payd'=>'int(8)','integral'=>'int(10)','lastupdate'=>'varchar(10)','cloudtype'=>'int(2)','jobtime'=>'int(11)','r_status'=>'int(2)','firmpic'=>'varchar(100)','rec'=>'int(11)','hits'=>'int(11)','ant_num'=>'int(11)','pl_time'=>'int(11)','pl_status'=>'int(11)','order'=>'int(11) unsigned','admin_remark'=>'varchar(255)','email_dy'=>'int(11)','msg_dy'=>'int(11)','sync'=>'int(11) unsigned','hy_dy'=>'varchar(100)','moblie_status'=>'int(1)','email_status'=>'int(1)','yyzz_status'=>'int(1)','hottime'=>'int(11)','did'=>'int(11)','busstops'=>'text','infostatus'=>'int(11)','conid'=>'int(11)','addtime'=>'int(11)','telphone'=>'varchar(80)','comqcode'=>'varchar(200)')
; 
$phpyun_company_cert=array('id'=>'int(11)','uid'=>'int(11)','type'=>'varchar(200)','status'=>'int(11)','step'=>'int(11)','check'=>'varchar(200)','check2'=>'varchar(200)','ctime'=>'int(11)','statusbody'=>'varchar(100)','did'=>'int(11)')
; 
$phpyun_company_consultant=array('id'=>'int(25)','username'=>'varchar(25)','mobile'=>'varchar(25)','qq'=>'varchar(25)','adtime'=>'int(20)','status'=>'varchar(100)','weixin'=>'varchar(100)','logo'=>'varchar(100)','zan'=>'int(11)','assign'=>'int(2)')
; 
$phpyun_company_job=array('id'=>'int(11)','identity'=>'int(11)','uid'=>'int(11)','name'=>'varchar(50)','com_name'=>'varchar(50)','fake_id'=>'int(11)','hy'=>'int(5)','job1'=>'int(5)','job1_son'=>'int(5)','job_post'=>'int(5)','provinceid'=>'int(5)','cityid'=>'int(5)','three_cityid'=>'int(5)','cert'=>'varchar(50)','salary'=>'int(5)','type'=>'int(5)','number'=>'int(2)','exp'=>'int(5)','report'=>'int(5)','sex'=>'int(5)','edu'=>'int(5)','marriage'=>'int(5)','description'=>'text','xuanshang'=>'int(11)','xsdate'=>'int(11)','sdate'=>'int(11)','edate'=>'int(11)','jobhits'=>'int(10)','lastupdate'=>'varchar(10)','rec'=>'int(2)','cloudtype'=>'int(2)','state'=>'int(2)','statusbody'=>'varchar(200)','age'=>'int(11)','lang'=>'text','welfare'=>'text','pr'=>'int(5)','mun'=>'int(5)','com_provinceid'=>'int(5)','rating'=>'int(5)','status'=>'int(1)','urgent'=>'int(1)','r_status'=>'int(1)','end_email'=>'int(1)','urgent_time'=>'int(11)','com_logo'=>'varchar(100)','autotype'=>'int(11)','autotime'=>'int(11)','is_link'=>'int(1)','link_type'=>'int(1)','source'=>'int(1)','rec_time'=>'int(11)','snum'=>'int(11)','operatime'=>'int(11)','circle'=>'int(11)','did'=>'int(11)','is_email'=>'int(1)','minsalary'=>'int(11)','maxsalary'=>'int(11)','ejob_salary_month'=>'int(11)','detail_report'=>'varchar(100)','detail_subordinate'=>'int(11)','detail_dept_id'=>'varchar(100)')
; 
$phpyun_company_msg=array('id'=>'int(11)','uid'=>'int(11)','cuid'=>'int(11)','content'=>'text','ctime'=>'varchar(100)','status'=>'int(2)','reply'=>'text','reply_time'=>'int(11)','did'=>'int(11)','jobid'=>'int(11)','tag'=>'varchar(255)','desscore'=>'int(11)','hrscore'=>'int(11)','comscore'=>'int(11)','score'=>'double(10,1)','othercontent'=>'text','msgid'=>'int(11)','isnm'=>'int(11)')
; 
$phpyun_company_news=array('id'=>'int(11)','uid'=>'int(11)','title'=>'varchar(200)','ctime'=>'int(11)','body'=>'text','status'=>'int(2)','statusbody'=>'text','did'=>'int(11)')
; 
$phpyun_company_order=array('id'=>'int(11)','uid'=>'int(11)','order_id'=>'varchar(18)','order_type'=>'varchar(25)','order_price'=>'double(18,2)','order_time'=>'int(10)','order_state'=>'int(2)','order_remark'=>'text','order_bank'=>'varchar(150)','type'=>'int(1)','rating'=>'int(10)','integral'=>'int(11)','is_invoice'=>'int(1)','coupon'=>'int(11)','did'=>'int(11)','sid'=>'int(11)','order_pic'=>'varchar(100)','bank_time'=>'int(10)','order_info'=>'text')
; 
$phpyun_company_pay=array('id'=>'int(11)','order_id'=>'varchar(18)','order_price'=>'decimal(10,2)','pay_time'=>'int(11)','pay_state'=>'int(2)','com_id'=>'int(10)','pay_remark'=>'varchar(255)','type'=>'int(1)','pay_type'=>'int(4)','did'=>'int(11)')
; 
$phpyun_company_product=array('id'=>'int(11)','uid'=>'int(11)','title'=>'varchar(200)','pic'=>'varchar(200)','body'=>'text','ctime'=>'int(11)','status'=>'int(2)','statusbody'=>'text','did'=>'int(11)')
; 
$phpyun_company_rating=array('id'=>'int(6)','name'=>'varchar(200)','service_price'=>'varchar(100)','integral_buy'=>'varchar(100)','yh_price'=>'varchar(100)','yh_integral'=>'varchar(100)','time_start'=>'int(11)','time_end'=>'int(11)','resume'=>'int(5)','job_num'=>'int(11)','interview'=>'int(11)','editjob_num'=>'int(11)','breakjob_num'=>'int(11)','sort'=>'int(10)','display'=>'int(1)','explains'=>'varchar(255)','com_pic'=>'varchar(100)','com_color'=>'varchar(100)','type'=>'int(2)','lt_resume'=>'int(11)','lt_job_num'=>'int(11)','lt_editjob_num'=>'int(11)','lt_breakjob_num'=>'int(11)','category'=>'int(2)','msg_num'=>'int(11)','service_time'=>'int(11)','coupon'=>'int(11)','part_num'=>'int(11)','editpart_num'=>'int(11)','breakpart_num'=>'int(11)','zph_num'=>'int(11)','service_discount'=>'int(2)','jobrec'=>'int(11)')
; 
$phpyun_company_service=array('id'=>'int(4)','name'=>'varchar(255)','display'=>'int(1)')
; 
$phpyun_company_service_detail=array('id'=>'int(4)','service_price'=>'varchar(100)','resume'=>'int(5)','interview'=>'int(11)','job_num'=>'int(11)','breakjob_num'=>'int(11)','part_num'=>'int(11)','breakpart_num'=>'int(11)','lt_job_num'=>'int(11)','lt_breakjob_num'=>'int(11)','lt_resume'=>'int(11)','type'=>'int(6)')
; 
$phpyun_company_show=array('id'=>'int(11)','title'=>'varchar(200)','picurl'=>'varchar(200)','body'=>'varchar(200)','ctime'=>'int(11)','uid'=>'int(11)','sort'=>'int(4)')
; 
$phpyun_company_statis=array('uid'=>'int(11)','pay'=>'double(10,2)','integral'=>'varchar(10)','sq_job'=>'int(6) unsigned','fav_job'=>'int(6) unsigned','rating'=>'int(5) unsigned','rating_name'=>'varchar(100)','all_pay'=>'double(10,2)','consum_pay'=>'double(10,2)','rating_type'=>'int(11)','invite_resume'=>'int(10)','comtpl'=>'varchar(100)','comtpl_all'=>'varchar(100)','job_num'=>'int(11)','editjob_num'=>'int(11)','breakjob_num'=>'int(11)','down_resume'=>'int(10)','qqshow'=>'int(11)','qqcomment'=>'int(11)','sinashare'=>'int(11)','sinashow'=>'int(11)','sinacomment'=>'int(11)','qqwname'=>'varchar(100)','sinawname'=>'varchar(100)','lt_job_num'=>'int(11)','lt_editjob_num'=>'int(11)','lt_breakjob_num'=>'int(11)','lt_down_resume'=>'int(11)','qqshare'=>'int(11)','msg_num'=>'int(11)','autotime'=>'int(11)','vip_stime'=>'int(11)','vip_etime'=>'int(11)','did'=>'int(11)','part_num'=>'int(11)','editpart_num'=>'int(11)','breakpart_num'=>'int(11)','zph_num'=>'int(11)','login_ip'=>'varchar(20)')
; 
$phpyun_company_tpl=array('id'=>'int(11)','name'=>'varchar(100)','url'=>'varchar(100)','pic'=>'varchar(200)','type'=>'int(10)','price'=>'varchar(100)','status'=>'int(10)','service_uid'=>'varchar(225)')
; 
$phpyun_coupon=array('id'=>'int(11)','name'=>'varchar(20)','time'=>'int(11)','amount'=>'int(11)','scope'=>'int(11)')
; 
$phpyun_coupon_list=array('id'=>'int(11)','uid'=>'int(11)','number'=>'varchar(100)','ctime'=>'int(11)','status'=>'int(1)','coupon_id'=>'int(11)','coupon_name'=>'varchar(20)','validity'=>'int(11)','coupon_amount'=>'int(11)','coupon_scope'=>'int(11)','xf_time'=>'int(11)','source'=>'int(11)')
; 
$phpyun_cron=array('id'=>'int(10)','name'=>'varchar(200)','dir'=>'varchar(200)','type'=>'int(11)','week'=>'int(11)','month'=>'int(10)','hour'=>'int(10)','minute'=>'int(10)','display'=>'int(1)','ctime'=>'int(11)','nowtime'=>'int(11)','nexttime'=>'int(11)')
; 
$phpyun_desc_class=array('id'=>'int(11)','name'=>'varchar(50)','sort'=>'int(11)')
; 
$phpyun_description=array('id'=>'int(11)','nid'=>'int(11)','name'=>'varchar(255)','url'=>'varchar(255)','title'=>'varchar(255)','keyword'=>'varchar(255)','descs'=>'text','top_tpl'=>'int(2)','top_tpl_dir'=>'varchar(255)','footer_tpl'=>'int(2)','footer_tpl_dir'=>'varchar(255)','content'=>'mediumtext','sort'=>'int(11)','is_nav'=>'int(1)','ctime'=>'int(11)','is_menu'=>'int(11)','is_type'=>'int(1)')
; 
$phpyun_description_copy=array('id'=>'int(11)','nid'=>'int(11)','name'=>'varchar(255)','url'=>'varchar(255)','title'=>'varchar(255)','keyword'=>'varchar(255)','descs'=>'text','top_tpl'=>'int(2)','top_tpl_dir'=>'varchar(255)','footer_tpl'=>'int(2)','footer_tpl_dir'=>'varchar(255)','content'=>'mediumtext','sort'=>'int(11)','is_nav'=>'int(1)','ctime'=>'int(11)','is_menu'=>'int(11)','is_type'=>'int(1)')
; 
$phpyun_domain=array('id'=>'int(11)','title'=>'varchar(200)','domain'=>'varchar(200)','province'=>'int(11)','cityid'=>'int(11)','three_cityid'=>'int(11)','type'=>'int(2)','style'=>'varchar(100)','tpl'=>'varchar(20)','hy'=>'int(11)','fz_type'=>'int(11)','webtitle'=>'text','webkeyword'=>'text','webmeta'=>'text','weblogo'=>'varchar(255)')
; 
$phpyun_down_resume=array('id'=>'int(11)','uid'=>'int(11)','eid'=>'int(11)','comid'=>'int(11)','downtime'=>'int(11)','did'=>'int(11)','integral'=>'int(11)','type'=>'int(11)','resume_id'=>'int(11)','job_id'=>'int(11)')
; 
$phpyun_email_msg=array('id'=>'int(11)','uid'=>'int(11)','name'=>'varchar(100)','cuid'=>'int(11)','cname'=>'varchar(255)','email'=>'varchar(200)','title'=>'varchar(200)','content'=>'text','ctime'=>'int(11)','state'=>'int(1)','smtpserver'=>'varchar(100)')
; 
$phpyun_entrust=array('id'=>'int(11)','uid'=>'int(11)','lt_uid'=>'int(11)','datetime'=>'int(11)','remind_status'=>'int(1)')
; 
$phpyun_evaluate=array('id'=>'int(4)','gid'=>'int(4)','question'=>'text','option'=>'text','score'=>'text','sort'=>'int(4)')
; 
$phpyun_evaluate_group=array('id'=>'int(4)','keyid'=>'int(4)','name'=>'varchar(32)','sort'=>'int(4)','description'=>'text','ctime'=>'int(11)','fromscore'=>'text','toscore'=>'text','comment'=>'text','visits'=>'int(4)','comnum'=>'int(11)','pic'=>'varchar(64)','num'=>'int(10)','recommend'=>'tinyint(1)','score'=>'int(11)','top'=>'int(1)','hot'=>'int(1)')
; 
$phpyun_evaluate_leave_message=array('id'=>'int(10) unsigned','examid'=>'int(4) unsigned','uid'=>'varchar(36)','usertype'=>'int(1)','message'=>'varchar(512)','ctime'=>'int(11)')
; 
$phpyun_evaluate_log=array('id'=>'int(4)','uid'=>'int(4)','nuid'=>'varchar(36)','examid'=>'int(4)','grade'=>'int(4)','ctime'=>'int(11)','usedsecond'=>'int(11)')
; 
$phpyun_excel=array('id'=>'int(11)','name'=>'varchar(255)','count'=>'int(11)','time'=>'int(11)')
; 
$phpyun_fake_company=array('id'=>'int(11)','uid'=>'int(11)','truename'=>'varchar(100)','companyname'=>'varchar(100)','hy'=>'varchar(100)','provinceid'=>'int(11)','cityid'=>'int(11)','three_cityid'=>'int(11)','nature'=>'varchar(100)','scale'=>'varchar(200)','introduce'=>'varchar(255)','addtime'=>'int(11)')
; 
$phpyun_fav_job=array('id'=>'int(11)','uid'=>'int(11)','com_id'=>'int(11)','com_name'=>'varchar(150)','datetime'=>'int(10)','type'=>'int(11)','job_name'=>'varchar(150)','job_id'=>'int(11)')
; 
$phpyun_fav_resume=array('id'=>'int(11)','uid'=>'int(11)','eid'=>'int(11)','com_name'=>'varchar(150)','datetime'=>'int(10)','type'=>'int(11)','job_name'=>'varchar(150)','resume_id'=>'int(11)')
; 
$phpyun_finder=array('id'=>'int(11)','uid'=>'int(11)','usertype'=>'int(1)','name'=>'varchar(100)','para'=>'varchar(255)','addtime'=>'int(11)')
; 
$phpyun_friend=array('id'=>'int(11)','uid'=>'int(11)','nid'=>'int(11)','status'=>'int(11)','uidtype'=>'int(2)','nidtype'=>'int(2)')
; 
$phpyun_friend_foot=array('id'=>'int(11)','uid'=>'int(11)','fid'=>'int(11)','num'=>'int(11)','ctime'=>'int(11)')
; 
$phpyun_friend_info=array('uid'=>'int(11)','nickname'=>'varchar(100)','sex'=>'int(1)','pic'=>'varchar(100)','pic_big'=>'varchar(100)','description'=>'varchar(100)','fans'=>'int(11)','atnnum'=>'int(11)','ask'=>'int(11)','answer'=>'int(11)','birthday'=>'varchar(100)','usertype'=>'int(2)','iscert'=>'int(2)','did'=>'int(11)')
; 
$phpyun_friend_message=array('id'=>'int(11)','pid'=>'int(11)','uid'=>'int(11)','u_name'=>'varchar(100)','fid'=>'int(11)','f_name'=>'varchar(100)','nid'=>'int(11)','content'=>'varchar(225)','ctime'=>'int(11)','status'=>'int(11)','remind_status'=>'int(1)')
; 
$phpyun_friend_reply=array('id'=>'int(11)','nid'=>'int(11)','fid'=>'int(11)','uid'=>'int(11)','reply'=>'varchar(225)','ctime'=>'int(11)')
; 
$phpyun_friend_state=array('id'=>'int(11)','uid'=>'int(11)','content'=>'varchar(225)','ctime'=>'int(11)','type'=>'int(11)','msg_pic'=>'varchar(100)')
; 
$phpyun_hot_key=array('id'=>'int(20)','key_name'=>'varchar(100)','num'=>'int(20)','type'=>'int(2)','size'=>'varchar(10)','check'=>'int(1)','color'=>'varchar(10)','bold'=>'int(11)','tuijian'=>'int(11)','wxtime'=>'int(11)','wxuser'=>'varchar(100)','wxid'=>'varchar(100)')
; 
$phpyun_hotjob=array('id'=>'int(11)','uid'=>'int(11)','username'=>'varchar(200)','rating'=>'varchar(20)','hot_pic'=>'varchar(100)','service_price'=>'int(11)','time_start'=>'int(11)','time_end'=>'int(11)','sort'=>'int(11)','beizhu'=>'varchar(200)','rating_id'=>'int(11)','did'=>'int(11)')
; 
$phpyun_industry=array('id'=>'int(11)','name'=>'varchar(50)','sort'=>'int(11)')
; 
$phpyun_invoice_record=array('id'=>'int(11)','oid'=>'int(11)','order_id'=>'varchar(18)','uid'=>'int(11)','title'=>'varchar(100)','link_man'=>'varchar(20)','link_moblie'=>'varchar(20)','address'=>'varchar(255)','status'=>'int(11)','statusbody'=>'text','lasttime'=>'int(11)','addtime'=>'int(11)','did'=>'int(11)')
; 
$phpyun_job_class=array('id'=>'int(11)','keyid'=>'int(11)','name'=>'varchar(50)','sort'=>'int(11)','content'=>'text')
; 
$phpyun_lieclass=array('id'=>'int(11)','keyid'=>'int(11)','name'=>'varchar(50)','variable'=>'varchar(50)','sort'=>'int(11)')
; 
$phpyun_lietou=array('uid'=>'int(11)','com_name'=>'varchar(200)','name'=>'varchar(25)','download_num'=>'int(11)','hy'=>'int(5)','pr'=>'int(5)','provinceid'=>'int(5)','cityid'=>'int(5)','three_cityid'=>'int(5)','mun'=>'int(3)','sdate'=>'varchar(20)','money'=>'int(11)','moneytype'=>'int(11)','content'=>'text','address'=>'varchar(100)','zip'=>'varchar(10)','linkman'=>'varchar(50)','linkjob'=>'varchar(50)','linkqq'=>'varchar(20)','linkphone'=>'varchar(100)','linktel'=>'varchar(50)','linkmail'=>'varchar(150)','website'=>'varchar(100)','x'=>'varchar(100)','y'=>'varchar(100)','logo'=>'varchar(100)','payd'=>'int(8)','integral'=>'int(10)','lastupdate'=>'varchar(10)','cloudtype'=>'int(2)','jobtime'=>'int(11)','r_status'=>'int(2)','firmpic'=>'varchar(100)','rec'=>'int(11)','hits'=>'int(11)','ant_num'=>'int(11)','pl_time'=>'int(11)','pl_status'=>'int(11)','order'=>'int(11) unsigned','admin_remark'=>'varchar(255)','email_dy'=>'int(11)','msg_dy'=>'int(11)','sync'=>'int(11) unsigned','hy_dy'=>'varchar(100)','moblie_status'=>'int(1)','email_status'=>'int(1)','yyzz_status'=>'int(1)','hottime'=>'int(11)','did'=>'int(11)','busstops'=>'text','infostatus'=>'int(11)','conid'=>'int(11)','addtime'=>'int(11)','telphone'=>'varchar(80)','comqcode'=>'varchar(200)','depart'=>'int(11)','department'=>'varchar(200)')
; 
$phpyun_lietou_cert=array('id'=>'int(11)','uid'=>'int(11)','type'=>'varchar(200)','status'=>'int(11)','step'=>'int(11)','check'=>'varchar(200)','check2'=>'varchar(200)','ctime'=>'int(11)','statusbody'=>'varchar(100)','did'=>'int(11)')
; 
$phpyun_lietou_consultant=array('id'=>'int(25)','username'=>'varchar(25)','mobile'=>'varchar(25)','qq'=>'varchar(25)','adtime'=>'int(20)','status'=>'varchar(100)','weixin'=>'varchar(100)','logo'=>'varchar(100)','zan'=>'int(11)','assign'=>'int(2)')
; 
$phpyun_lietou_job=array('id'=>'int(11)','uid'=>'int(11)','name'=>'varchar(50)','com_name'=>'varchar(50)','hy'=>'int(5)','job1'=>'int(5)','job1_son'=>'int(5)','job_post'=>'int(5)','provinceid'=>'int(5)','cityid'=>'int(5)','three_cityid'=>'int(5)','cert'=>'varchar(50)','salary'=>'int(5)','type'=>'int(5)','number'=>'int(2)','exp'=>'int(5)','report'=>'int(5)','sex'=>'int(5)','edu'=>'int(5)','marriage'=>'int(5)','description'=>'text','xuanshang'=>'int(11)','xsdate'=>'int(11)','sdate'=>'int(11)','edate'=>'int(11)','jobhits'=>'int(10)','lastupdate'=>'varchar(10)','rec'=>'int(2)','cloudtype'=>'int(2)','state'=>'int(2)','statusbody'=>'varchar(200)','age'=>'int(11)','lang'=>'text','welfare'=>'text','pr'=>'int(5)','mun'=>'int(5)','com_provinceid'=>'int(5)','rating'=>'int(5)','status'=>'int(1)','urgent'=>'int(1)','r_status'=>'int(1)','end_email'=>'int(1)','urgent_time'=>'int(11)','com_logo'=>'varchar(100)','autotype'=>'int(11)','autotime'=>'int(11)','is_link'=>'int(1)','link_type'=>'int(1)','source'=>'int(1)','rec_time'=>'int(11)','snum'=>'int(11)','operatime'=>'int(11)','circle'=>'int(11)','did'=>'int(11)','is_email'=>'int(1)','minsalary'=>'int(11)','maxsalary'=>'int(11)')
; 
$phpyun_lietou_job_link=array('id'=>'int(11)','uid'=>'int(11)','jobid'=>'int(11)','link_man'=>'varchar(100)','link_moblie'=>'varchar(20)','email_type'=>'int(2)','is_email'=>'int(2)','email'=>'varchar(100)','link_type'=>'int(2)')
; 
$phpyun_lietou_msg=array('id'=>'int(11)','uid'=>'int(11)','cuid'=>'int(11)','content'=>'text','ctime'=>'varchar(100)','status'=>'int(2)','reply'=>'text','reply_time'=>'int(11)','did'=>'int(11)','jobid'=>'int(11)','tag'=>'varchar(255)','desscore'=>'int(11)','hrscore'=>'int(11)','comscore'=>'int(11)','score'=>'double(10,1)','othercontent'=>'text','msgid'=>'int(11)','isnm'=>'int(11)')
; 
$phpyun_lietou_news=array('id'=>'int(11)','uid'=>'int(11)','title'=>'varchar(200)','ctime'=>'int(11)','body'=>'text','status'=>'int(2)','statusbody'=>'text','did'=>'int(11)')
; 
$phpyun_lietou_order=array('id'=>'int(11)','uid'=>'int(11)','order_id'=>'varchar(18)','order_type'=>'varchar(25)','order_price'=>'double(18,2)','order_time'=>'int(10)','order_state'=>'int(2)','order_remark'=>'text','order_bank'=>'varchar(150)','type'=>'int(1)','rating'=>'int(10)','integral'=>'int(11)','is_invoice'=>'int(1)','coupon'=>'int(11)','did'=>'int(11)','sid'=>'int(11)','order_pic'=>'varchar(100)','bank_time'=>'int(10)','order_info'=>'text')
; 
$phpyun_lietou_pay=array('id'=>'int(11)','order_id'=>'varchar(18)','order_price'=>'decimal(10,2)','pay_time'=>'int(11)','pay_state'=>'int(2)','com_id'=>'int(10)','pay_remark'=>'varchar(255)','type'=>'int(1)','pay_type'=>'int(4)','did'=>'int(11)')
; 
$phpyun_lietou_product=array('id'=>'int(11)','uid'=>'int(11)','title'=>'varchar(200)','pic'=>'varchar(200)','body'=>'text','ctime'=>'int(11)','status'=>'int(2)','statusbody'=>'text','did'=>'int(11)')
; 
$phpyun_lietou_rating=array('id'=>'int(6)','name'=>'varchar(200)','service_price'=>'varchar(100)','integral_buy'=>'varchar(100)','yh_price'=>'varchar(100)','yh_integral'=>'varchar(100)','time_start'=>'int(11)','time_end'=>'int(11)','resume'=>'int(5)','job_num'=>'int(11)','interview'=>'int(11)','editjob_num'=>'int(11)','breakjob_num'=>'int(11)','sort'=>'int(10)','display'=>'int(1)','explains'=>'varchar(255)','com_pic'=>'varchar(100)','com_color'=>'varchar(100)','type'=>'int(2)','lt_resume'=>'int(11)','lt_job_num'=>'int(11)','lt_editjob_num'=>'int(11)','lt_breakjob_num'=>'int(11)','category'=>'int(2)','msg_num'=>'int(11)','service_time'=>'int(11)','coupon'=>'int(11)','part_num'=>'int(11)','editpart_num'=>'int(11)','breakpart_num'=>'int(11)','zph_num'=>'int(11)','service_discount'=>'int(2)','jobrec'=>'int(11)')
; 
$phpyun_lietou_service=array('id'=>'int(4)','name'=>'varchar(255)','display'=>'int(1)')
; 
$phpyun_lietou_service_detail=array('id'=>'int(4)','service_price'=>'varchar(100)','resume'=>'int(5)','interview'=>'int(11)','job_num'=>'int(11)','breakjob_num'=>'int(11)','part_num'=>'int(11)','breakpart_num'=>'int(11)','lt_job_num'=>'int(11)','lt_breakjob_num'=>'int(11)','lt_resume'=>'int(11)','type'=>'int(6)')
; 
$phpyun_lietou_show=array('id'=>'int(11)','title'=>'varchar(200)','picurl'=>'varchar(200)','body'=>'varchar(200)','ctime'=>'int(11)','uid'=>'int(11)','sort'=>'int(4)')
; 
$phpyun_lietou_statis=array('uid'=>'int(11)','pay'=>'double(10,2)','integral'=>'varchar(10)','sq_job'=>'int(6) unsigned','fav_job'=>'int(6) unsigned','rating'=>'int(5) unsigned','rating_name'=>'varchar(100)','all_pay'=>'double(10,2)','consum_pay'=>'double(10,2)','rating_type'=>'int(11)','invite_resume'=>'int(10)','comtpl'=>'varchar(100)','comtpl_all'=>'varchar(100)','job_num'=>'int(11)','editjob_num'=>'int(11)','breakjob_num'=>'int(11)','down_resume'=>'int(10)','qqshow'=>'int(11)','qqcomment'=>'int(11)','sinashare'=>'int(11)','sinashow'=>'int(11)','sinacomment'=>'int(11)','qqwname'=>'varchar(100)','sinawname'=>'varchar(100)','lt_job_num'=>'int(11)','lt_editjob_num'=>'int(11)','lt_breakjob_num'=>'int(11)','lt_down_resume'=>'int(11)','qqshare'=>'int(11)','msg_num'=>'int(11)','autotime'=>'int(11)','vip_stime'=>'int(11)','vip_etime'=>'int(11)','did'=>'int(11)','part_num'=>'int(11)','editpart_num'=>'int(11)','breakpart_num'=>'int(11)','zph_num'=>'int(11)','login_ip'=>'varchar(20)')
; 
$phpyun_login_log=array('id'=>'int(11)','uid'=>'int(11)','usertype'=>'int(11)','content'=>'text','ip'=>'varchar(20)','ctime'=>'int(11)')
; 
$phpyun_look_job=array('id'=>'int(11)','uid'=>'int(11)','jobid'=>'int(11)','com_id'=>'int(11)','datetime'=>'int(11)','status'=>'int(1)','com_status'=>'int(1)','did'=>'int(11)')
; 
$phpyun_look_resume=array('id'=>'int(11)','uid'=>'int(11)','com_id'=>'int(11)','resume_id'=>'int(11)','datetime'=>'int(11)','status'=>'int(1)','com_status'=>'int(1)','did'=>'int(11)')
; 
$phpyun_lssave=array('id'=>'int(11)','uid'=>'int(11)','save'=>'text','savetype'=>'int(2)')
; 
$phpyun_member=array('uid'=>'int(11)','username'=>'varchar(100)','password'=>'varchar(32)','email'=>'varchar(100)','moblie'=>'varchar(20)','reg_ip'=>'varchar(20)','reg_date'=>'int(11)','login_ip'=>'varchar(20)','login_date'=>'int(11)','usertype'=>'int(1)','login_hits'=>'int(11)','salt'=>'varchar(6)','address'=>'varchar(100)','name_repeat'=>'int(2)','qqid'=>'varchar(200)','status'=>'int(4)','pwuid'=>'int(11)','pw_repeat'=>'int(1)','lock_info'=>'varchar(200)','email_status'=>'int(1)','signature'=>'varchar(100)','sinaid'=>'varchar(100)','wxid'=>'varchar(100)','wxopenid'=>'varchar(100)','unionid'=>'varchar(100)','wxname'=>'varchar(100)','wxbindtime'=>'int(11)','passtext'=>'varchar(100)','source'=>'int(1)','regcode'=>'int(10)','did'=>'int(11)','claim'=>'int(1)','restname'=>'int(1)','appeal'=>'varchar(100)','appealtime'=>'int(11)','appealstate'=>'int(1)','signday'=>'int(11)','signdays'=>'int(11)')
; 
$phpyun_member_log=array('id'=>'int(11)','uid'=>'int(11)','opera'=>'int(11)','type'=>'int(11)','usertype'=>'int(11)','content'=>'text','ip'=>'varchar(20)','ctime'=>'int(11)')
; 
$phpyun_member_reg=array('id'=>'int(11)','uid'=>'int(11)','date'=>'int(11)','usertype'=>'int(11)','ip'=>'varchar(20)','ctime'=>'int(11)')
; 
$phpyun_member_statis=array('uid'=>'int(11)','integral'=>'varchar(10)','pay'=>'double(10,2)','resume_num'=>'int(10)','fav_jobnum'=>'int(10)','sq_jobnum'=>'int(10)','message_num'=>'int(10)','down_num'=>'int(10)','tpl'=>'int(11)','paytpls'=>'varchar(255)')
; 
$phpyun_message=array('id'=>'int(11)','content'=>'varchar(255)','username'=>'varchar(20)','uid'=>'int(11)','status'=>'int(1)','ctime'=>'int(11)','reply'=>'varchar(200)','reply_time'=>'int(11)','code'=>'int(11)','mobile'=>'varchar(11)')
; 
$phpyun_moblie_msg=array('id'=>'int(11)','uid'=>'int(11)','name'=>'varchar(100)','cuid'=>'int(11)','cname'=>'varchar(255)','moblie'=>'varchar(200)','content'=>'varchar(200)','ctime'=>'int(11)','state'=>'int(11)','ip'=>'varchar(20)')
; 
$phpyun_msg=array('id'=>'int(11)','uid'=>'int(11)','username'=>'varchar(100)','jobid'=>'int(11)','job_uid'=>'int(11)','datetime'=>'int(11)','reply'=>'text','content'=>'text','reply_time'=>'int(11)','com_name'=>'varchar(100)','job_name'=>'varchar(100)','del_status'=>'int(11)','type'=>'int(11)','user_remind_status'=>'int(1)','com_remind_status'=>'int(1)')
; 
$phpyun_navigation=array('id'=>'int(11)','nid'=>'int(11)','name'=>'varchar(100)','url'=>'varchar(100)','sort'=>'int(11)','display'=>'int(1)','eject'=>'int(1)','type'=>'int(1)','furl'=>'varchar(100)','color'=>'varchar(20)','model'=>'varchar(20)','bold'=>'int(1)','desc'=>'int(11)','news'=>'int(11)','config'=>'varchar(100)')
; 
$phpyun_navigation_type=array('id'=>'int(11)','typename'=>'varchar(100)')
; 
$phpyun_navmap=array('id'=>'int(11)','nid'=>'int(11)','name'=>'varchar(100)','url'=>'varchar(100)','sort'=>'int(11)','display'=>'int(1)','eject'=>'int(1)','type'=>'int(1)','furl'=>'varchar(100)')
; 
$phpyun_news_base=array('id'=>'int(11)','nid'=>'int(11)','did'=>'int(11)','title'=>'varchar(200)','color'=>'varchar(255)','keyword'=>'varchar(200)','author'=>'varchar(200)','datetime'=>'int(11)','hits'=>'int(11)','describe'=>'varchar(255)','description'=>'varchar(255)','newsphoto'=>'varchar(100)','s_thumb'=>'varchar(100)','source'=>'varchar(255)','sort'=>'int(11)','lastupdate'=>'int(11)')
; 
$phpyun_news_content=array('nbid'=>'int(11)','content'=>'text','did'=>'int(11)')
; 
$phpyun_news_group=array('id'=>'int(11)','keyid'=>'int(11)','name'=>'varchar(100)','sort'=>'int(11)','rec'=>'int(1)','is_menu'=>'int(1)','rec_news'=>'int(1)')
; 
$phpyun_once_job=array('id'=>'int(11)','title'=>'varchar(200)','mans'=>'varchar(100)','require'=>'varchar(255)','companyname'=>'varchar(255)','phone'=>'varchar(100)','hits'=>'int(11)','linkman'=>'varchar(50)','provinceid'=>'int(11)','cityid'=>'int(11)','three_cityid'=>'int(11)','address'=>'varchar(200)','ctime'=>'int(11)','status'=>'int(2)','password'=>'varchar(100)','qq'=>'varchar(20)','email'=>'varchar(150)','edate'=>'int(11)','login_ip'=>'varchar(20)','did'=>'int(11)','sxtime'=>'int(11)','sxnumber'=>'int(11)','pic'=>'varchar(255)','salary'=>'varchar(255)')
; 
$phpyun_outside=array('id'=>'int(11)','name'=>'varchar(100)','type'=>'varchar(100)','titlelen'=>'int(10)','infolen'=>'int(10)','byorder'=>'varchar(200)','num'=>'int(11)','code'=>'text','edittime'=>'int(10)','lasttime'=>'int(11)','urltype'=>'varchar(200)','timetype'=>'varchar(200)','where'=>'varchar(200)')
; 
$phpyun_part_apply=array('id'=>'int(11)','uid'=>'int(11)','jobid'=>'int(11)','comid'=>'int(11)','ctime'=>'int(11)','status'=>'int(1)')
; 
$phpyun_part_collect=array('id'=>'int(11)','uid'=>'int(11)','jobid'=>'int(11)','comid'=>'int(11)','ctime'=>'int(11)')
; 
$phpyun_partclass=array('id'=>'int(11)','keyid'=>'int(11)','name'=>'varchar(50)','variable'=>'varchar(50)','sort'=>'int(11)')
; 
$phpyun_partjob=array('id'=>'int(11)','uid'=>'int(11)','name'=>'varchar(30)','type'=>'int(11)','sdate'=>'int(11)','edate'=>'int(11)','worktime'=>'varchar(255)','number'=>'int(11)','sex'=>'int(11)','salary'=>'int(11)','salary_type'=>'int(11)','billing_cycle'=>'int(11)','provinceid'=>'int(11)','cityid'=>'int(11)','three_cityid'=>'int(11)','address'=>'varchar(100)','x'=>'varchar(10)','y'=>'varchar(10)','content'=>'text','deadline'=>'int(11)','linkman'=>'varchar(10)','linktel'=>'varchar(15)','addtime'=>'int(11)','r_status'=>'int(2)','state'=>'int(2)','lastupdate'=>'int(11)','statusbody'=>'varchar(200)','hits'=>'int(11)','com_name'=>'varchar(30)','rec_time'=>'int(11)','did'=>'int(11)')
; 
$phpyun_prepaid_card=array('id'=>'int(11)','card'=>'varchar(30)','password'=>'varchar(20)','quota'=>'double(10,2)','username'=>'varchar(100)','uid'=>'int(11)','type'=>'int(11)','stime'=>'int(11)','etime'=>'int(11)','utime'=>'int(11)','atime'=>'int(11)')
; 
$phpyun_property=array('id'=>'int(11)','name'=>'varchar(20)','value'=>'varchar(20)')
; 
$phpyun_pt_resume=array('id'=>'int(11)','name'=>'varchar(15)','sex'=>'tinyint(3) unsigned','trade'=>'varchar(60)','birthday'=>'smallint(4) unsigned','experience'=>'smallint(5) unsigned','location'=>'varchar(60)','wage_hope'=>'int(10) unsigned','wage_current'=>'int(10) unsigned','moneyMonthes'=>'int(11)','intention_city'=>'varchar(80)','degree'=>'smallint(5) unsigned','current'=>'tinyint(5) unsigned','tag'=>'varchar(160)','mobile'=>'varchar(50)','email'=>'varchar(60)','intention_jobs'=>'varchar(60)','work_experience'=>'text','edu_experience'=>'text','project_experience'=>'text','additions'=>'varchar(200)','introduce'=>'varchar(255)','addtime'=>'int(11) unsigned','refreshtime'=>'int(11) unsigned','key'=>'text','click'=>'int(10) unsigned','hunterId'=>'int(11)')
; 
$phpyun_q_class=array('id'=>'int(11)','name'=>'varchar(100)','pid'=>'int(11)','pic'=>'varchar(100)','sort'=>'int(11)','intro'=>'text','add_time'=>'int(11)')
; 
$phpyun_question=array('id'=>'int(11)','title'=>'text','content'=>'text','cid'=>'int(11)','uid'=>'int(11)','nickname'=>'varchar(255)','answer_num'=>'int(11)','atnnum'=>'int(11)','visit'=>'int(11)','is_recom'=>'int(1)','lastupdate'=>'int(11)','add_time'=>'int(11)','pic'=>'varchar(100)','state'=>'int(11)')
; 
$phpyun_reason=array('id'=>'int(11)','name'=>'varchar(100)')
; 
$phpyun_rebates=array('id'=>'int(11)','uid'=>'int(11)','job_uid'=>'int(11)','job_id'=>'int(11)','name'=>'varchar(10)','phone'=>'varchar(15)','content'=>'text','datetime'=>'int(11)','status'=>'int(1)','reply'=>'text','reply_time'=>'int(11)')
; 
$phpyun_recycle=array('id'=>'int(11)','username'=>'varchar(255)','tablename'=>'varchar(100)','body'=>'longtext','ctime'=>'int(11)')
; 
$phpyun_redeem_class=array('id'=>'int(11)','keyid'=>'int(11)','name'=>'varchar(50)','sort'=>'int(11)')
; 
$phpyun_report=array('id'=>'int(11)','p_uid'=>'int(11)','c_uid'=>'int(11)','eid'=>'int(11)','usertype'=>'int(1)','inputtime'=>'int(11)','username'=>'varchar(100)','r_name'=>'varchar(100)','status'=>'int(1)','r_reason'=>'varchar(200)','type'=>'int(11)','r_type'=>'int(11)','did'=>'int(11)','result'=>'varchar(255)','rtime'=>'int(11)','admin'=>'int(11)')
; 
$phpyun_report_resume=array('id'=>'int(11)','name'=>'varchar(15)','sex'=>'tinyint(3) unsigned','trade'=>'varchar(60)','birthday'=>'smallint(4) unsigned','experience'=>'smallint(5) unsigned','location'=>'varchar(60)','wage_hope'=>'int(10) unsigned','wage_current'=>'int(10) unsigned','moneyMonthes'=>'int(11)','intention_city'=>'varchar(80)','degree'=>'smallint(5) unsigned','current'=>'tinyint(5) unsigned','tag'=>'varchar(160)','mobile'=>'varchar(50)','email'=>'varchar(60)','intention_jobs'=>'varchar(60)','work_experience'=>'text','edu_experience'=>'text','project_experience'=>'text','additions'=>'varchar(200)','introduce'=>'varchar(255)','addtime'=>'int(11) unsigned','refreshtime'=>'int(11) unsigned','key'=>'text','click'=>'int(10) unsigned','hunterId'=>'int(11)')
; 
$phpyun_resume_show=array('id'=>'int(11)','title'=>'varchar(200)','picurl'=>'varchar(200)','ctime'=>'varchar(200)','uid'=>'varchar(200)','sort'=>'int(4)','eid'=>'int(11)')
; 
$phpyun_resume_skill=array('id'=>'int(11)','uid'=>'int(11)','eid'=>'int(11)','name'=>'varchar(25)','skill'=>'int(5)','ing'=>'int(5)','longtime'=>'int(5)','pic'=>'varchar(100)')
; 
$phpyun_resume_tiny=array('id'=>'int(25)','username'=>'varchar(25)','password'=>'varchar(50)','sex'=>'int(11)','exp'=>'int(11)','hits'=>'int(11)','job'=>'varchar(25)','mobile'=>'varchar(25)','qq'=>'varchar(25)','evalute'=>'text','production'=>'text','time'=>'int(11)','status'=>'int(2)','login_ip'=>'varchar(20)','did'=>'int(11)','lastupdate'=>'int(11)')
; 
$phpyun_resume_training=array('id'=>'int(11)','resume_id'=>'int(11)','uid'=>'int(11)','eid'=>'int(11)','name'=>'varchar(25)','sdate'=>'int(10)','edate'=>'int(10)','title'=>'varchar(50)','content'=>'text')
; 
$phpyun_resumeout=array('id'=>'int(11)','uid'=>'int(11)','comname'=>'varchar(100)','jobname'=>'varchar(100)','recipient'=>'varchar(100)','email'=>'varchar(100)','resume'=>'varchar(100)','datetime'=>'int(11)')
; 
$phpyun_resumetpl=array('id'=>'int(11)','name'=>'varchar(100)','url'=>'varchar(100)','pic'=>'varchar(200)','type'=>'int(10)','price'=>'varchar(100)','status'=>'int(10)','service_uid'=>'varchar(225)')
; 
$phpyun_userclass=array('id'=>'int(11)','keyid'=>'int(11)','name'=>'varchar(100)','variable'=>'varchar(100)','sort'=>'int(11)')
; 
$phpyun_userid_job=array('id'=>'int(11)','uid'=>'int(11)','job_id'=>'int(11)','job_name'=>'varchar(150)','com_id'=>'int(11)','com_name'=>'varchar(150)','eid'=>'int(10) unsigned','display'=>'int(11)','datetime'=>'int(10)','type'=>'int(1)','is_browse'=>'int(1)','body'=>'varchar(255)','did'=>'int(11)','quxiao'=>'int(2)','identity'=>'int(11)','resume_id'=>'int(11)','recommend_result'=>'int(11)')
; 
?>