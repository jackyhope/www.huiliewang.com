
var _table;

$(function(){

	//添加工作经历
	$(".addWorkExp").click(function(){
		addWork();
	});
	
	//添加教育经历
	$(".addEduExp").click(function(){
		addEdu();
	});
	
	
	//添加项目经验
	$(".addProExp").click(function(){
		addPro();
	});


    function showMore(type,width,height,name){
        $("#"+type).show();

        $.layer({
            type : 1,
            title : name,
            shift : 'top',
            offset : [($(window).height() - height)/2 + 'px', ''],
            closeBtn : [0 , true],
            border : [10 , 0.3 , '#000', true],
            area : [width+'px',height+'px'],
            page : {dom :"#"+type},
            close: function(index){
                $(".newresumebox").remove();
                $("#"+type).hide();
            }
        });
    }

	$(document).on("click", ".removeExp", function () {
		_table = $(this).parents("table");
        layer.confirm('确定删除该条数据？',function () {
			$(_table).remove();
			layer.closeAll();
            layer.msg("删除成功！",1,9);
        },function () {

        });
	});
	
	$(document).on("click", "#comfirmDelBtn", function () {
		var tbcss = $(_table).attr("class");
		tbcss =  $.trim(tbcss.replace("dash ",""));
		var i = $("table."+tbcss).size();
		$(_table).remove();
		$("#ensureModal").modal("hide");
		$($("table."+tbcss)[0]).removeClass("dash");
		if(i==2){
//			$("table."+tbcss).removeClass("dash").find(".removeExp").remove();
			$("table."+tbcss).removeClass("dash");
		}
	});
	
	$(document).on("click", ".tip", function () {
		$(this).parent("div").find("input[name=endDate]").val("");
	});
	
	$("#resName,#cityId,#mobile,#email,#curMoney,#moneyMonthes,#hopeMoney,#workYear").blur(function(){
		var thisval = $(this).val()
		
		if($(this).attr("id")=="resName"){
			if(thisval!=""){
				$("#tips").text("");
			}else{
				$("#tips").text("请填写姓名！");
			}
			return;
		}
		if($(this).attr("id")=="cityId"){
			if(thisval!=""){
				$("#tips").text("");
			}else{
				$("#tips").text("请选择所在地！");
			}
			return;
		}

		if($(this).attr("id")=="email"){
			if(validEmail(thisval)){
				$("#tips").text("");
			}else{
				$("#tips").text("邮箱格式不正确！");
			}
			return;
		}

		
		if($(this).attr("id")=="workYear"){
			if(validNum(thisval)){
				$("#tips").text("");
			}else{
				$("#tips").text("工作年限请填写数字！");
			}
			return;
		}

		if($(this).attr("id")=="hopeMoney"){
			if(validNum1(thisval)){
				$("#tips").text("");
			}else{
				$("#tips").text("期望薪资请填写数字！");
			}
			return;
		}
        if($(this).attr("id")=="curMoney"){
            if(validNum1(thisval)){
                $("#tips").text("");
            }else{
                $("#tips").text("期望薪资请填写数字！");
            }
            return;
        }
	});
	$("#saveLtCandBtn").click(function(){
		var flag = false;
		var ff = valideResumeForm();
		if(!ff){
			return false;
		}
		var cand = {};
		var workList= new Array();
		var proList= new Array();
		var eduList= new Array();
		
		var works = $(".workexp");
		var pros = $(".proexp");
		var edus = $(".eduexp");
		
		//基本信息
		cand.name=$("#resName").val();
		cand.engName=$("#engName").val();
		cand.sex=$("input[name=sex]:checked").val();
		cand.cityId=$("#living_class").val();
		cand.birthDayStr=$("#birthDay").val();
		cand.mobile=$("#mobile").val();
		cand.email=$("#email").val();
		cand.product=$("#product").val();
		cand.jobState=$("#jobState").val();
		cand.workYear=$("#workYear").val();
		cand.degree=$("#degree").val();
		cand.tag=$("#tag").val();

		//工作经历
		$.each(works,function(i,v){
			
			var _startDate = $(v).find("input[name=startDate]").val();
			var _endDate = $(v).find("input[name=endDate]").val();
			var _now = $(v).find("input[name=now]").prop("checked");
			var _companyName = $(v).find("input[name=companyName]").val();
			var _posName = $(v).find("input[name=posName]").val();
			var _workDes = $(v).find("[name=workDes]").val();
			var _companyDes = $(v).find("[name=companyDes]").val();
			var _id = $(v).attr("data-id");
			if(_startDate!=''){
				if(!_now&&(_endDate==''||new Date(_startDate)>new Date(_endDate))){
					alert("请选择工作经历结束时间或者勾选至今选项！"); flag =true; return false;
				}
			}
			
			if(_now){
				_endDate='';
			}




			// if(_companyDes==''){
			// 	alert("请填写公司介绍！");flag =true; return false;
			// }
			if((_startDate!=null&&_startDate!='')||(_endDate!=null&&_endDate!='')||(_companyName!=null&&_companyName!='')
					||(_posName!=null&&_posName!='')||(_workDes!=null&&_workDes!='')||(_companyDes!=null&&_companyDes!='')){
				workList.push({
					'startDateStr':_startDate,
					'endDateStr':_endDate,
					'companyName':_companyName,
					'posName':_posName,
					'workDes':_workDes,
					'companyDes':_companyDes,
					'id':_id

				});
			}
		});
		if(flag){
			return false;
		}
		cand.workExp=workList;
		
		//项目经验
		$.each(pros,function(i,v){
			
			var _startDate = $(v).find("input[name=startDate]").val();
			var _endDate = $(v).find("input[name=endDate]").val();
			var _now = $(v).find("input[name=now]").prop("checked");
			var _proName = $(v).find("input[name=proName]").val();
			var _proDes = $(v).find("[name=proDes]").val();
			var _projectOffice = $(v).find("[name=projectOffice]").val();
			var _subCompany = $(v).find("[name=subCompany]").val();
			var _projectRole = $(v).find("[name=projectRole]").val();
			var _id = $(v).attr("data-id");
			var _projectPerfromnance = $(v).find("[name=projectPerfromnance]").val();
			if(_startDate!=''){
				if(!_now&&(_endDate==''||new Date(_startDate)>new Date(_endDate))){
					alert("请选择项目经历结束时间或者勾选至今选项！"); flag =true;return false;
				}
			}
			
			if(_now){
				_endDate='';
			}
			
			if((_startDate!=null&&_startDate!='')||(_endDate!=null&&_endDate!='')||(_proName!=null&&_proName!='')
					||(_proDes!=null)){
				proList.push({
					'startDateStr':_startDate,
					'endDateStr':_endDate,
					'proName':_proName,
					'proDes':_proDes,
					'projectOffice':_projectOffice,
					'subCompany':_subCompany,
					'projectRole':_projectRole,
					'projectPerfromnance':_projectPerfromnance,
					'id':_id
					
				});
			}
		});
		if(flag){
			return false;
		}
		cand.proExp=proList;
		
		
		//教育经历
		$.each(edus,function(i,v){
			
			var _startDate = $(v).find("input[name=startDate]").val();
			var _endDate = $(v).find("input[name=endDate]").val();
			var _now = $(v).find("input[name=now]").prop("checked");
			var _schoolName = $(v).find("input[name=schoolName]").val();
			var _majorName = $(v).find("input[name=majorName]").val();
			var _degree = $(v).find("select[name=degree]").val();
			var _id = $(v).attr("data-id");
			if(_startDate!=''){
				if(!_now&&(_endDate==''||new Date(_startDate)>new Date(_endDate))){
					alert("请选择教育经历结束时间或者勾选目前在读选项！"); flag =true;return false;
				}
			}
			
			if(_now){
				_endDate='';
			}
			
			if((_startDate!=null&&_startDate!='')||(_endDate!=null&&_endDate!='')||(_schoolName!=null&&_schoolName!='')||(_majorName!=null&&_majorName!='')||(_degree!=null&&_degree!='')){
				eduList.push({
					'startDateStr':_startDate,
					'endDateStr':_endDate,
					'schoolName':_schoolName,
					'majorName':_majorName,
					'degree':_degree,
					'id':_id
				});
			}
		});
		
		if(flag){
			return false;
		}
		cand.eduExps=eduList;
		
		
		//求职意向
		var tends = {};
		tends.jobs_classid=$("#job_class").val();
		tends.hopeIndustry=$("#hopeIndustry").val();
		tends.citys_id=$("#city_class").val();
		tends.curMoney=$("#curMoney").val();
		tends.moneyMonthes=$("#moneyMonthes").val();
		tends.hopeMoney=$("#hopeMoney").val();
		tends.salary_month=$("#salary_month").val();
		tends.otherMoney=$("#otherMoney").val();
		
		cand.intent=tends;
		//附加信息
		var ext = {};
		ext.selfEvaluation=$("#selfEvaluation").val();
		ext.extraInfo=$("#extraInfo").val();
		ext.attachmentsPaths=$("#attachmentsPaths").val();
		ext.fileNames=$("#fileNames").val();


		cand.extra=ext;
		cand.resume_id=$(".resume_id").val();
		cand.hunterId = $("#hunterId").val();
		cand.synType = $("input[name=synType]:checked").val();
		$('#saveLtCandBtn').attr('disabled',"true");
		$.ajax({
		  url:"/member/index.php?c=resume&act=add",
		  type:"post",
		  data:cand,
		  contentType:"application/x-www-form-urlencoded",
		  dataType:"json",
		  success:function(data){

			if(data==1){
                // $("#ensureModal2").modal("show");
				if(cand.resume_id){
                    layer.msg('编辑成功！', 2, 9);
				}else{
                    layer.msg('上传成功！', 2, 9);
				}

                setInterval(function () {
					location = location;
                }, 2000);
			}else if(data==2){
                layer.msg("手机号已存在",2,8);
			}
			$('#saveLtCandBtn').removeAttr("disabled");
		   },error:function(data){
               layer.msg("简历上传失败",2,8);
			   $('#saveLtCandBtn').removeAttr("disabled");
		  }
		});
	});
	
	$(".analyse-btn").click(function(){
		var c = $("#htmlContent").val();
		if($.trim(c)==""){
            layer.msg('请输入简历内容！', 2, 8);
			return false;
		}
		$("#data-form")[0].reset();
		$("#hopeCallings").val("");
        // layer.msg('解析中，请等待', {icon: 6});
		$.post("/member/index.php?c=parse&act=parse",{resumeContent:c},function(data){
			//$("#htmlContent").val(data.htmlContent);
            console.log(data);
            layer.msg('解析成功！', 2, 9);
            $.globalMessenger().post({
                message: "解析成功！",
                hideAfter: 2,
                type: 'success',//error,success
                showCloseButton: false,
                singleton:false
            });

            cleanLeftData();
            $("#mobile").val(data.telphone);
            $("#email").val(data.email);
            $("#resName").val(data.name);
            //$("#workYear").val(data.exp);
			if(data.sex=="男"){
				$("input[name=sex][value='1']").attr("checked",true)
			}else{
				$("input[name=sex][value='2']").attr("checked",true)
			}
			$("#workYear option").each(function(){
				var _exp=$(this).html();
				if(_exp.replace(/[^0-9]/ig,"")==data.exp.replace(/[^0-9]/ig,"")){
					$(this).attr("selected",true);
				}
			});
            // $('select  option:selected').val();
            $("#degree option").each(function(){
				var _edu=$(this).html();
				if(_edu.indexOf(data.edu)>=0){
					$(this).attr("selected",true);
				}
			});

			$("#workadds_job").val(data.job_class);
			$("#job_class").val(data.job_classid);
			$("#birthDay").val(data.birthday);
			$("#living").val(data.living_name);
			$("#living_class").val(data.living);
			$("#city").val(data.provinceid_name);
			$("#city_class").val(data.provinceid);

			var codecityId="";


			$("#cityId").val(codecityId);



			$("#hopeIndustry option").each(function(){
				var _hopeIndustry=$(this).html();
				if(_hopeIndustry.indexOf(data.hy)>=0){
					$(this).attr("selected",true);
				}
			});




			// $("#locations").val(codelocations);

			$(".jCitySelectorBtn").click();
            $("#extraInfo").val(data.extraInfo);
            $("#selfEvaluation").val(data.introduce);
            $("#curMoney").val(data.wage_current);
            $("#hopeMoney").val(data.wage_hope);

            var worksdata = data.workExp;
            var edudata = data.eduExps;
            var prodata = data.proExp;
            if(worksdata){
                $.each(worksdata,function(i,v){
                    addWork(v);
                });
            }

            if(edudata){
                $.each(edudata,function(i,v){
                    addEdu(v);
                });
            }

            if(prodata){
                $.each(prodata,function(i,v){
                    addPro(v);
                });
            }
			$("body").click();
		},"json")
		
	});
	
	$("#conAdd").click(function(){
		$("#ensureModal2").modal("hide");
		window.location.reload();
	});
	
	$("#toreumebase").click(function(){
		$("#ensureModal2").modal("hide");
		window.location="/member/index.php?c=resume&act=myself";
	});
	
});


//正则验证
function valideResumeForm(){
	var tip = $("#tips");
	var name = $("#resName").val();
	var sex = $("input[name=sex]:checked").val();
	var mobile = $("#mobile").val();
	var email = $("#email").val();
	var curMoney = $("#curMoney").val();
	var moneyMonthes = $("#moneyMonthes").val();
	var workYear = $("#workYear").val();
	var hopeMoney = $("#hopeMoney").val();
	var hopeMoney = $("#companyName").val();
	var hopeMoney = $("#posName").val();
	
	msg="";
	var cityId = $("#cityName").val();

	if(name==""){
		msg="请填写姓名！";
        layer.msg(msg, 2, 8);
		tip.text(msg);
		return false;
	}
	
	if(sex==""){
		msg="请选择性别！";
		tip.text(msg);
        layer.msg(msg, 2, 8);
		return false;
	}

    if(mobile==""){
        msg="请输入手机号码！";
        layer.msg(msg, 2, 8);
        tip.text(msg);
        return false;
    }

	
	if(!validMobile(mobile)){
		msg="手机号码格式不正确！";
        layer.msg(msg, 2, 8);
		tip.text(msg);
		return false;
	}

	
	if(!validEmail(email)){
		msg="邮箱格式不正确！";
        layer.msg(msg, 2, 8);
		tip.text(msg);
		return false;
	}

    if(cityId==""){
        msg="请选择所在地！";
        layer.msg(msg, 2, 8);
        tip.text(msg);
        return false;
    }

	if(!validNum(curMoney)){
		msg="薪资请填写数字！";
        layer.msg(msg, 2, 8);
		tip.text(msg);
		return false;
	}


	if(!validNum(moneyMonthes)){
		msg="薪资请填写数字！";
        layer.msg(msg, 2, 8);
		tip.text(msg);
		return false;
	}
	
	if(!validNum(workYear)){
		msg="工作年限请填写数字！";
        layer.msg(msg, 2, 8);
		tip.text(msg);
		return false;
	}
	if(!validNum(hopeMoney)){
		msg="期望请填写数字！";
        layer.msg(msg, 2, 8);
		tip.text(msg);
		return false;
	}
	
	tip.text(msg);
	return true;
	
}

function validMobile(val){
	val = $.trim(val);
	if(!val||val==""){
		return true;
	}
	
	if(/^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$|17[0-9]{9}$/.test(val)){
		return true;		
	}else{
		return false;
	}
	
}


function validNum1(val) {

    val = $.trim(val);
    if(!val||val==""){
        return true;
    }

    if(/^[1-9]\d*\,\d*|[1-9]\d*$/.test(val)){
        return true;
    }else{
        return false;
    }
}

function validNum(val){
	val = $.trim(val);
	if(!val||val==""){
		return true;
	}
	
	if(/^\d+$/.test(val)){
		return true;		
	}else{
		return false;
	}
	
}

function validEmail(val){
	val = $.trim(val);
	if(!val||val==""){
		return true;
	}
	
	if(/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(val)){
		return true;		
	}else{
		return false;
	}
	
}

function wordsDeal(obj,maxLen,tipId) {
	var baseText = $(obj).val();
	
	var AllLength = $(obj).val().length;
	var actLength = $(obj).val().replace(/(^\s*)|(\s*$)/g,"").length;
	var spacLenth = AllLength - actLength;
	
	if (actLength >= maxLen) {
		var num = $(obj).val().substr(0, maxLen);
		$(obj).val(num);
		$("#"+tipId).text(num.replace(/(^\s*)|(\s*$)/g,"").length);
		return false;
		//alert("超过字数限制，多出的字将被截断！");
	} else{
		$("#"+tipId).text(actLength);
	}
}



//项目，工作，教育经验新增
function addEdu(d){
	var thisobj = $(".addEduExp").parents("table");
	var sz = $("table.eduexp").size();
	
//	if(sz==1){
//		$("table.eduexp").find("div.form-inline").append('<a class="removeExp"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>');
//	}
	
	var table = 
		'<table class="'+(sz==0?"":"dash")+' eduexp" width="100%" border="0" cellspacing="0" cellpadding="0">'
		+'<tr>'
		+'<th class="optional">学习时间</th>'
		+'<td colspan="3">'
		+'<div class="form-inline">'
		+'<div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">'
   
		+'<input class="form-control" size="16" type="text"  value="'+(d?d.startDateStr:"")+'" name="startDate"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
		+'</div> - <div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">'
   
		+'<input class="form-control" size="16" type="text"  value="'+(d?d.endDateStr:"")+'" name="endDate"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
		+'</div>'

		+'<span class="tip">'
		+' <input type="checkbox" name="now" '+(d?(d.endDateStr==""?"checked":""):"")+'><span class="black">目前在读</span> <span class="gray">后面日期不选，表示至今</span>'
		+'</span>'
		+'<a class="removeExp"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'
		+'</div>'
		+'</td>'
		+'</tr>'
		+'<tr>'
		+'<th class="optional">学校</th>'
		+'<td colspan="3" class="input-group-sm"><input type="text" value="'+(d?d.schoolName:"")+'" name="schoolName" class="form-control indst" placeholder="学校名称"></td>'
   
		+'</tr>'
		+'<tr>'
		+'<th class="optional">专业</th>'
		+'<td class="input-group-sm"><input type="text" value="'+(d?d.majorName:"")+'" name="majorName" class="form-control adr" placeholder="专业"></td>'
		+'<th class="optional">学历</th>'
		+'<td class="input-group-sm">'
    	
		+'<select class="form-control adr" name="degree">'
		+'<option value="">请选择</option>'
		+'<option value="14" '+(d?(d.degree=="大专"?"selected":""):"")+'>大专</option>'
		+'<option value="15" '+(d?(d.degree=="本科"?"selected":""):"")+'>本科</option>'
		+'<option value="16" '+(d?(d.degree=="硕士"?"selected":""):"")+'>硕士</option>'
		+'<option value="205" '+(d?(d.degree=="MBA"?"selected":""):"")+'>MBA</option>'
		+'<option value="206" '+(d?(d.degree=="EMBA"?"selected":""):"")+'>EMBA</option>'
		+'<option value="17" '+(d?(d.degree=="博士"?"selected":""):"")+'>博士</option>'
		+'<option value="204" '+(d?(d.degree=="博士以上"?"selected":""):"")+'>博士以上</option>'
		+'</select>'
    
		+'</td>'
		+'</tr>'
		
		+'<tr>'
		+'<th class="empty"></th><td clospan="4"">  </td>'
		+'</tr>'
		+'</table>' ;
	thisobj.before(table);
	
	$('.form_date.ym').datetimepicker( {
		language : 'zh-CN',
		weekStart : 1,
		todayBtn : 1,
		autoclose : 1,
		todayHighlight : 1,
		startView : 3,
		minView : 3,
		forceParse : 0,
		format : 'yyyy-mm',
		pickerPosition : "bottom-left"
	}).on('show', function(ev) {
		$('.form_date').datetimepicker('update')
	});
}

function addPro(d){
	var thisobj = $(".addProExp").parents("table");
	var sz = $("table.proexp").size();
	
//	if(sz==1){
//		$("table.proexp").find("div.form-inline").append('<a class="removeExp"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>');
//	}
	
	var table = 
		'<table  class="'+(sz==0?"":"dash")+' proexp" width="100%" border="0" cellspacing="0" cellpadding="0">'
		+'<tr>'
		+'<th class="optional">任职时间</th>'
		+'<td colspan="3">'
		+'<div class="form-inline">'
		+'<div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">'
   
		+'<input class="form-control" size="16" type="text"  value="'+(d?d.startDateStr:"")+'" name="startDate"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
		+'</div> - <div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">'
   
		+'<input class="form-control" size="16" type="text"  value="'+(d?d.endDateStr:"")+'" name="endDate"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
		+'</div>'

		+'<span class="tip">'
		+' <input type="checkbox" name="now" '+(d?(d.endDateStr==""?"checked":""):"")+'><span class="black">至今</span> <span class="gray">后面日期不选，表示至今</span>'
		+'</span>'
		+'<a class="removeExp"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'
		+'</div>'
		+'</td>'
		+'</tr>'
		+'<tr>'
		+'<th class="optional">项目名称</th>'
		+'<td colspan="3" class="input-group-sm"><input type="text" class="form-control indst" value="'+(d?d.proName:"")+'" name="proName" placeholder="项目名称"></td>'
		+'</tr>'
		+'<tr>'
		+'<th class="optional">项目职务</th>'
		+'<td colspan="3" class="input-group-sm"><input type="text" class="form-control indst" value="'+(d?d.projectOffice:"")+'" name="projectOffice" placeholder="项目职位"></td>'
		+'</tr>'
		+'<tr>'
		+'<th class="optional">所在公司</th>'
		+'<td colspan="3" class="input-group-sm"><input type="text" class="form-control indst" value="'+(d?d.subCompany:"")+'" name="subCompany" placeholder="所在公司"></td>'
		+'</tr>'
		+'<tr>'
		+'<th class="optional">项目描述</th>'
		+'<td colspan="3">'
		+'<div class="indst">'
		+'<textarea class="form-control" rows="3" name="proDes" >'+(d?d.proDes:"")+'</textarea>'
		+'<p class="remainWordTip">0 / 1000</p>'
		+'</div>'
		+'</td>'
		+'</tr>'
		+'<tr>'
		+'<th class="optional">项目职责</th>'
		+'<td colspan="3">'
		+'<div class="indst">'
		+'<textarea class="form-control" rows="3" name="projectRole" >'+(d?d.projectRole:"")+'</textarea>'
		+'<p class="remainWordTip">0 / 500</p>'
		+'</div>'
		+'</td>'
		+'</tr>'
		+'<tr>'
		+'<th class="optional">项目业绩</th>'
		+'<td colspan="3">'
		+'<div class="indst">'
		+'<textarea class="form-control" rows="3" name="projectPerfromnance" >'+(d?d.projectPerfromnance:"")+'</textarea>'
		+'<p class="remainWordTip">0 / 500</p>'
		+'</div>'
		+'</td>'
		+'</tr>'
		+'</table>' ;
	thisobj.before(table);
	
	$('.form_date.ym').datetimepicker( {
		language : 'zh-CN',
		weekStart : 1,
		todayBtn : 1,
		autoclose : 1,
		todayHighlight : 1,
		startView : 3,
		minView : 3,
		forceParse : 0,
		format : 'yyyy-mm',
		pickerPosition : "bottom-left"
	}).on('show', function(ev) {
		$('.form_date').datetimepicker('update')
	});
}

function addWork(d){
	var thisobj = $(".addWorkExp").parents("table");
	var sz = $("table.workexp").size();
	
//	if(sz==1){
//		$("table.workexp").find("div.form-inline").append('<a class="removeExp"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>');
//	}
	
	var table = 
		'<table class="'+(sz==0?"":"dash")+' workexp" width="100%" border="0" cellspacing="0" cellpadding="0">'
		+'<tr>'
		+'<th class="optional">任职时间</th>'
		+'<td colspan="3">'
		+'<div class="form-inline">'
		+'<div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">'
		+'<input class="form-control" size="16" type="text"  value="'+(d?d.startDateStr:"")+'" name="startDate"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
		+'</div> - '
		+'<div class="input-group input-group-sm date form_date ym" data-date-format="yyyy-mm">'
		+'<input class="form-control" size="16" type="text"  value="'+(d?d.endDateStr:"")+'" name="endDate"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
		+'</div>'

		+'<span class="tip">'
		+' <input type="checkbox" name="now" '+(d?(d.endDateStr==""?"checked":""):"")+'><span class="black">至今</span> <span class="gray">后面日期不选，表示至今</span>'
		+'</span>'
		+'<a class="removeExp"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'
		+'</div>'
		+'</td>'
		+'</tr>'
		+'<tr>'
		+'<th class="optional">公司名称</th>'
		+'<td class="input-group-sm"><input type="text" value="'+(d?d.companyName:"")+'" class="form-control adr" placeholder="公司名称" name="companyName"></td>'
		+'<th class="optional">职位名称</th>'
		+'<td class="input-group-sm"><input type="text" value="'+(d?d.posName:"")+'" class="form-control adr" placeholder="职位名称" name="posName"></td>'
		+'</tr>'
		+'<tr>'
		+'<th class="optional">公司介绍</th>'
		+'<td colspan="3">'
		+'<div class="indst">'
		+'<textarea class="form-control" rows="3" name="companyDes">'+(d?d.companyDes:"")+'</textarea>'
		+'<p class="remainWordTip">0 / 500</p>'
		+'</div>'
		+'</td>'
		+'</tr>'
		+'<tr>'
		+'<th class="optional">工作描述</th>'
		+'<td colspan="3">'
		+'<div class="indst">'
		+'<textarea class="form-control" rows="3" name="workDes" style="height: 200px;">'+(d?d.workDes:"")+'</textarea>'
		+'<p class="remainWordTip">0 / 5000</p>'
		+'</div>'
		+'</td>'
		+'</tr>'
		+'</table>' ;
	
	thisobj.before(table);
	$('.form_date.ym').datetimepicker( {
		language : 'zh-CN',
		weekStart : 1,
		todayBtn : 0,
		autoclose : 1,
		todayHighlight : 1,
		startView : 3,
		minView : 3,
		forceParse : 0,
		format : 'yyyy-mm',
		pickerPosition : "bottom-left"
	}).on('show', function(ev) {
		$('.form_date').datetimepicker('update')
	});

}


$('.form_date.ym').datetimepicker( {
	language : 'zh-CN',
	weekStart : 1,
	todayBtn : 0,
	autoclose : 1,
	todayHighlight : 1,
	startView : 3,
	minView : 3,
	forceParse : 0,
	format : 'yyyy-mm',
	pickerPosition : "bottom-left"
}).on('show', function(ev) {
	$('.form_date').datetimepicker('update')
});


//清除所有内容
function cleanLeftData(){
	$("#mobile").val("");
	$("#email").val("");
	$("#resName").val("");
	$("#workYear").val("");
	$("#degree").val("");
	$("#birthDay").val("");
	$("#selfEvaluation").val("");
	
	$(".workexp,.eduexp,.proexp").remove();
}

