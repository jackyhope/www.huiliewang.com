function refreshPosSelectState(inputId){
	//var jobIds = $("#"+inputId).val();
	//var txt="";
    //
	////清理
	//$("#selectItems").children().remove();
	//$("div.selectdiv").find("a").removeClass("act");
	////没有选择职位
	//if(jobIds&&jobIds!=""){
	//	var jobs = jobIds.split(",");
	//	$.each(jobs,function(i,v){
	//		txt += ((i==0?"":",")+ $("a[jobId='"+v+"']").text());
	//		$("a[jobId='"+v+"']").addClass("act");
	//		if($("a[jobId='"+v+"']").text() && $("a[jobId='"+v+"']").text()!=""){
	//			$("#selectItems").append('<li jobsId="'+v+'"><a href="#" class="label alert label-success selectlabel" '
	//				+'role="alert"><span class="innertext">'+$("a[jobId='"+v+"']").text()+'&nbsp;</span>'
	//				+'<span class="glyphicon glyphicon-remove"></span></a></li>');
	//		}
	//	});
	//}
		
	
}

//获取详细职位类别信息
var alljobclassid2=new Array();
var alljobclassid3=new Array();
for(var i in ji){
	//console.log(ji[i]);
	for(var j in jt[ji[i]]){
		alljobclassid2.push(jt[ji[i]][j]);
	}
}
for(var i in alljobclassid2){
	if(jt[alljobclassid2[i]]&&jt[alljobclassid2[i]].length>0){
		for(var j in jt[alljobclassid2[i]]){
			var alljobclassid2i=[jn[jt[alljobclassid2[i]][j]],jt[alljobclassid2[i]][j]];
			alljobclassid3.push(alljobclassid2i);
		}
	}else{
		alljobclassid3.push([jn[alljobclassid2[i]],alljobclassid2[i]]);
	}

}

console.log(alljobclassid3);
$("#findhopejob").on("input",function(){
	var jobclassification=$(this).val();
	if(!jobclassification){
		$(".jobclassificationtips").html("");
		return false;
	}
	$('.jobclassificationtips').show();
	var jobclassifications=new Array();
	var jobclassificationcontents="";
	for (var i in alljobclassid3){
		if(alljobclassid3[i][0].indexOf(jobclassification)>=0){
			if(jobclassifications.length<5){
				jobclassifications.push(alljobclassid3[i])
			}else{
				break;
			}
		}
	}
	for(var i in jobclassifications){
		jobclassificationcontents+='<span jobid="nrjob'+jobclassifications[i][1]+'"   onclick="queryJob('+jobclassifications[i][1]+',this)" >'+jobclassifications[i][0]+'</span>';
	}
	$(".jobclassificationtips").html(jobclassificationcontents)
})

function queryIndustry(mark,obj){
	//当前选中的二级菜单的行业
	var curMark = $("ul.jCallingSelectorItem").find("a.jCallingSelectorHadItem3").parent("li").attr("item");
	if(curMark!=mark){
		$("ul.secondmenu").hide();
		
		$("ul.jPosSelectorItem").hide();
		$("ul.jPosSelectorItem[callingmark="+mark+"]").show();	
		$(obj).parents("ul.jCallingSelectorItem").find("a").removeClass("jCallingSelectorHadItem3");
		$(obj).addClass("jCallingSelectorHadItem3");
		$("ul.jPosSelectorItem[callingmark="+mark+"]").children("li:first").find("a").trigger("click");
	}
	
}


function querySubJob(jobId,obj){
	var jobMark = $(obj).parent().attr("jobId");
	//$("div.selectdiv").hide();
	$("ul.secondmenu").hide();
	$("ul.secondmenu[supJobId='"+jobMark+"']").show();
	
	//加边框
	$(obj).parents("ul.jPosSelectorItem").find("a").removeClass("jCallingSelectorHadItem3");
	$(obj).addClass("jCallingSelectorHadItem3");
}

function queryJob(jobId,obj){
	var jobIdstr = $(obj).attr("jobId");
	var curcss = $(obj).attr("class");
	//if($("#selectItems").find("li[jobsId='"+jobIdstr+"']").length>0){
	//	return false;
	//}
	//是否已经选择
	if($(obj).hasClass("act")){
		//已经选择了,取消选择(取消样式,取消选择标签,修改已选择的值)
		$(obj).removeClass("act");
		$("#selectItems").find("li[jobsId='"+jobIdstr+"']").remove();
		
	}else{
		//未选择状态,判断是否超过上限
		var cursize = $("#selectItems").find("li").size();
		
		if(cursize>=3){
			alert("期望职位最多选择3个项！");return false;
		}else{
			$("#selectItems").append('<li jobsid="'+jobIdstr+'"><a href="#" class="label alert label-success selectlabel" role="alert"><span class="innertext">'+$(obj).html()+'&nbsp;</span><span aria-hidden="true">&times;</span></a></li>');
			$("a[jobId='"+jobIdstr+"']").addClass("act");
		}		
	}
	
}

$("body").on("click",function(){
	$('.jobclassificationtips').hide();
})
$(function(){
	refreshPosSelectState("hopeCallings");
	$("ul.jCallingSelectorItem").children("li[item=carjob]").children("a").trigger("click");	
	$("ul.jPosSelectorItem[callingmark=carjob]").children("li:first").find("a").trigger("click");
	
	$('#popPosDiv').on('shown.bs.modal', function () {
	  	refreshPosSelectState("hopeCallings");
	})
	
	$(document).on("click","a.selectlabel",function(){				
		var jobMark = $(this).parent().attr("jobsid");
		$(this).parent().remove();
		$("div.selectdiv").find("a[jobId="+jobMark+"]").trigger("click");
	});
	
	$("#comfirmSelBtn").click(function(){
		var selects = $("#selectItems").find("li");
		var txt="";
		var vals="";
		if(selects&&selects.size()>0){
			$.each(selects,function(i,v){
				txt += ((i==0?"":",")+ $(v).find(".innertext").text());
				vals += ((i==0?"":",")+ $(v).attr("jobsid").substring(5,9));
			});
		}
		$("#hopeCallings").val(vals);	
		$("#hopeCallingsText").val(txt);
	});
	
});