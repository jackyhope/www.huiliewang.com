/*
	Author: CaiHao
	Function: ���е�(��)ѡ����
*/
document.write('<script src="/js/dic/citydata.js"><\/script>')
jQuery.fn.extend({
  loadCitySelector:function(){
    this.each(function(index){
      
		var oBox = $(this), nMax = $(oBox).attr("maxSelect"), sLang = $(oBox).attr("lang"), sJoinSign=", ", sShowHot = $(oBox).attr("showhot"), enClass="", getCityID, delCityID, getCityUpID, getCityName, aChked=[], sChkedShow, aChkedShow=[], aChkedVal=[];
		var sHideTip="", aInitValLen, sNoShowHot="", sTempInitVal, sTempInitName, aInitName, aInitVal, fnShowSubDelay, fnShowSub, oCurActiveSubLeave, oCurActiveSubEnter;
		if(typeof(sLang)=="undefined" || sLang!="en") {
			var loadingTxt="������..", plsSelTxt=pl_parse?pl_parse:"��ѡ��", maxSelTxt="����ѡ�� ", maxUnitTxt=" ��", okTxt="ȷ��", hadSelTxt="��ѡ��", hotCityTxt="���ų���", allCityTxt="ȫ������", maxSelNumTxt="����ѡ��"+nMax+"��", errTxt="�ǳ���Ǹ����������ʧ�ܣ���ˢ�»��Ժ��ٳ��ԣ�";
			}
		else {
			var loadingTxt="Loading..", plsSelTxt="Please Choose", maxSelTxt="Select up to ", maxUnitTxt="", okTxt="Confirm", hadSelTxt="City Chosen", hotCityTxt="Hot Cities", allCityTxt="All Cities", maxSelNumTxt="Select up to"+nMax;
			var enClass=" jCitySelectorPopEn";
		}
		if ( typeof(nMax)=="undefined" ) nMax=1;
		if ( nMax==1 ) { sHideTip=" style=\"display:none\"" }
		if ( sShowHot=="0" ) { var sNoShowHot="style=\"display:none\"" } //�Ƿ���ʾ���ų���
		var html="<div class=\"jCitySelectorPop"+enClass+"\" style=\"position:absolute; top:0;\"><div class=\"jCitySelectorPopIn\" style=\"background:#fff; position:absolute; top:0;\"><div class=\"jCitySelectorHD layout\"><span class=\"jCitySelectorMaxTip\""+sHideTip+">"+maxSelTxt+"<em class=\"jCitySelectorMaxNum\">"+nMax+"</em>"+maxUnitTxt+"</span><a "+sHideTip+" class=\"jCitySelectorClose\" href=\"javascript:;\">"+okTxt+"</a></div><div class=\"jCitySelectorItem jCitySelectorHad\"><div class=\"jCitySelectorTit\">"+hadSelTxt+"</div><div class=\"jCitySelectorHadList layout\"></div></div><div class=\"jCitySelectorItem jCitySelectorHot\" "+ sNoShowHot +"><div class=\"jCitySelectorTit\">"+hotCityTxt+"</div><div class=\"jCitySelectorHotList layout\"></div></div><div class=\"jCitySelectorItem jCitySelectorAll\"><div class=\"jCitySelectorTit\">"+allCityTxt+"</div><ul class=\"jCitySelectorAllList layout\"></ul></div></div></div><a class=\"jCitySelectorBtn\" style=\"height:30px;padding:3px 12px;font-size:12px;\" hidefocus=\"true\" href=\"javascript:;\"><span>"+plsSelTxt+"</span></a>"; 
		$(oBox).append(html);
		var oBtn = $(oBox).find(".jCitySelectorBtn:first"), //��ѡ��ť
			oBtnTxt = $(oBtn).children("span"),
			oPop = $(oBox).find(".jCitySelectorPop:first"), //����
			oItem = $(oBox).find(".jCitySelectorListItem"),
			oAll = $(oBox).find(".jCitySelectorAllList:first"),
			oHot = $(oBox).find(".jCitySelectorHotList:first"),
			chktype=(nMax==1?"radio":"checkbox"),
			oClose = $(oBox).find(".jCitySelectorClose:first"), //ȷ�ϰ�ť
			oHad = $(oBox).find(".jCitySelectorHadList:first"),
			sVal = $(oBox).find(".jCitySelectorVal:first").val(), //��ʼID
			oVal = $(oBox).find(".jCitySelectorVal:first"),
			sName = $(oBox).find(".jCitySelectorName:first").val(), //��ʼ����
			oName = $(oBox).find(".jCitySelectorName:first");
		
		if (sVal!="") { //����г�ʼֵ
			aInitName = sName.split(","); aInitVal = sVal.split(",");
			aInitValLen = aInitVal.length;
			for( var m=aInitValLen-1;m>=0;m-- ){
				sTempInitVal = aInitVal[m];
	      			sTempInitName = aInitName[m];
	      			if( sTempInitVal=="" || sTempInitVal=="0" || sTempInitVal==" " ) { aInitVal.splice(m,1) }
	      			if( sTempInitName=="" || sTempInitName=="0" || sTempInitName==" " ) { aInitName.splice(m,1) }
			}
			if( aInitVal.length<=0 ){ oVal.val(""); oName.val(""); }
			else { sInitName = sName.split(","); sInitName = aInitName.join(sJoinSign); $(oBtnTxt).text(sInitName); } //��ť����ʾ��ʼ����
		}
      
		function fnInitChked(){ //�����ID�ı�����ֵ
	      	if ($(oHad).children("a").length>0 ) { $(oHad).children("a").trigger("click"); }
	      	if (oVal.val()!="") {
	      		aInitName = oName.val().split(","); aInitVal = oVal.val().split(",");
	      		for( var m=aInitVal.length-1;m>=0;m-- ){
	      			sTempInitVal = aInitVal[m];
	      			sTempInitName = aInitName[m];
	      			if( sTempInitVal=="" || sTempInitVal=="0" || sTempInitVal==" " ) { aInitVal.splice(m,1) }
	      			if( sTempInitName=="" || sTempInitName=="0" || sTempInitName==" " ) { aInitName.splice(m,1) }
	      		}
			    sInitName = sName.split(","); sInitName = aInitName.join(sJoinSign);
			  	$(oBtnTxt).text(sInitName); //��ť����ʾ��ʼ����
	      	  	for (var j=0;j<aInitVal.length;j++){
	      	  		getCityID=aInitVal[j]; getCityName=aInitName[j];
	      	  		//��ӳ���
	      	  		$(oPop).find(":input[value="+getCityID+"]").prop("checked",true).data("chked",1); //����ѡ�е�ID����ѡ
		      		aChked.push([getCityID,getCityName]); 
		      	  	$(oHad).append("<a href=\"javascript:;\" cityID=\""+getCityID+"\">"+getCityName+"</a>");
		      	  	$(oHad).children("[cityID="+getCityID+"]").click(function(){ //��ѡ�еĳ��а��¼�
			      	    delCityID=$(this).attr("cityID");
			      	    $(oPop).find(":input[value="+delCityID+"]").prop("checked",false).data("chked",0);
			      	    for (var i=0;i<aChked.length;i++){
			      	  	  if (aChked[i][0]==delCityID) {aChked.splice(i,1)};
			      	    }
			      	    //���ֵ
			      	    oVal.val("");oName.val("");oBtnTxt.text("��ѡ��");
			      	    $(this)[0].style.background = "";
			      	    $(this).remove();
			      	})
		      	}
			}
		}
      
      
      var winScrollTop, winScrollLeft, winWidth, winHeight;
      var getWinSize = function () { //��ȡ�ɼ������Ⱥ͸߶�
      	winWidth = $(window).width(); winHeight = $(window).height() ;
      };
      getWinSize();
      $(window).resize(function(){ getWinSize();})
      
      var rePopPos = function(btn, pop, btnOnClass){ //���õ�����Դ�����ť��λ��
      	var btnTop = $(btn).offset().top, //�������ĵ������ľ���
       		btnLeft = $(btn).offset().left,
       		btnHeight = $(btn).outerHeight(),
      		btnWidth = $(btn).outerWidth(),
      		popHeight = $(pop).outerHeight(),
      		popWidth = $(pop).outerWidth(),
      		winScrollTop = $(window).scrollTop(),
      		winScrollLeft = $(window).scrollLeft();
      	//alert( winHeight - btnTop - winScrollTop +" " + popHeight + "******" + ( btnTop - winScrollTop ) + " " + popHeight )
       	//alert("�ɼ�����߶�:"+ winHeight +"\n��ť���ĵ������߶�:" + btnTop + "\n�ѹ����߶�:"+ winScrollTop +"\n����߶�:" + popHeight)
       	if ( winHeight - ( btnTop - winScrollTop ) < popHeight && btnTop - winScrollTop > popHeight ) { //����ɼ����ֵ����治�������ɵ��㣬������߶�Ҫ���ڵ���߶ȣ����õ�����ʾ���Ϸ�
       		$(pop).css( "top",-(popHeight-1) + "px");
       		if(btnOnClass) $(btn).addClass( btnOnClass );
       	} else {
       		$(pop).css( "top", (btnHeight-1)+"px"); //������top��ʽ��ԭ
       		if(btnOnClass) $(btn).removeClass( btnOnClass );
       	}
       	
       	if ( winWidth - ( btnLeft - winScrollLeft ) < popWidth && btnLeft - winScrollLeft > popWidth ) { //����ɼ����ֵ��ұ߲��������ɵ��㣬����߿��Ҫ���ڵ����ȣ����õ�����ʾ�����
       		$(pop).css( "left",-( popWidth - btnWidth ) + "px");
       	} else {
       		$(pop).css( "left", "0"); //������left��ʽ��ԭ
		}
      }
      
      //���س���
//      $.ajax({
//          url: "/js/selector/citydata.json",
//		  contentType:"application/json;charset=utf-8;",
//		  dataType:"json",
//		  //error:function(){alert(errTxt)},
//		  success:function(data){
      	 var data = _allcitydata;
		  var directhtml = data.directcity, all = data.allcity, direct = data.directcity, directhtml = "", 
		      allhtml = "", subhtml = "", zindexMax = "9999999", isHasSub = "", oCurHasSub;
			var fnLoadEvent = function(){
				var oHasSub = $(oBox).find(".jCitySelectorHasSub"),
					//oHasSubOn = $(oBox).find(".jCitySelectorOn"),
					oNoSub = $(oBox).find(".jCitySelectorNoSub"),
					oChkInps = $(oBox).find(":input");
		        $(oHasSub).click(function(){ //һ���б�������ʾ�¼����������ʽ
		        	oCurHasSubBtn = $(this);
		        	oCurHasSub = $(this).next();
					$(this).toggleClass("jCitySelectorOn");
					rePopPos(oCurHasSubBtn, oCurHasSub, "");
					$(oCurHasSub).toggle();
					if ( $(oCurHasSub).is(":visible") ) {
							$(oCurHasSub).parent().css("zIndex",zindexMax).mouseleave(function(){ //�ƿ��¼��б�ʱ����
							$(oCurHasSub).hide().prev().removeClass("jCitySelectorOn").parent().css("zIndex","");
						})
					}
					})
		      	
		      	if ( nMax>1 ) { //�����ѡ
		      	$(oNoSub).click(function(){
		      	  var oChkInp= $(":input",this);
		      	  getCityID = $(this).attr("cityID");
		      	  getCityName = $(this).text();
		      	  
		      	  if ( $(oChkInp).data("chked")!=1  ) { //���δѡ�У������...
			      	  if (aChked.length >= nMax) {$(oChkInp).prop("checked",false);alert(maxSelNumTxt);return false;}
			      	  
			      	  $(oPop).find(":input[value="+getCityID+"]").prop("checked",true).data("chked",1); //����ѡ�е�ID����ѡ
			      	  
			      	  //��ӳ���
			      	  aChked.push([getCityID,getCityName]); 
			      	  $(oHad).append("<a href=\"javascript:;\" cityID=\""+getCityID+"\">"+getCityName+"</a>");
			      	  $(oHad).children("[cityID="+getCityID+"]").click(function(){ //��ѡ�еĳ��а��¼�
			      	    //ɾ������
			      	    delCityID=$(this).attr("cityID");
			      	    $(oPop).find(":input[value="+delCityID+"]").prop("checked",false).data("chked",0);
			      	    for (var i=0;i<aChked.length;i++){
			      	  	  if (aChked[i][0]==delCityID) {aChked.splice(i,1)};
			      	    }
			      	    $(this)[0].style.background = "";
			      	    $(this).remove();
			      	  })
			      	  	
			      	  if($(this).hasClass("jCitySelectorItemTop")) {
			      	     $(this).nextAll().children(":checked").parent().each(function(){ $(this).trigger("click") });
			      	  } 
			      	  else if($(this).parent().hasClass("jCitySelectorListSub")) {
			      	    var citytop=$(this).siblings(":first").children(":input");
			      	    if ( citytop.prop("checked")=="checked" ) {
			      	       citytop.parent().trigger("click")
			      	     }
			      	   }
		      	    
		      	  } else { //���������ѡ��
		      	  	$(oPop).find(":input[value="+getCityID+"]").prop("checked",false).data("chked",0);
		      	  	for (var i=0;i<aChked.length;i++){
		      	  	  if (aChked[i][0]==getCityID) {aChked.splice(i,1)};
		      	  	}
		      	  	$(oHad).find("a[cityID="+getCityID+"]").remove();
		      	  }
		      	})
		      	
		      	} else { //����ǵ�ѡ
		      		$(oNoSub).click(function(){
			      	  var oChkInp= $(":input",this);
			      	  getCityID = $(this).attr("cityID");
			      	  getCityName = $(this).text();
			      	  
			      	  if ( $(oChkInp).data("chked")!=1  ) { //���δѡ�У������...
				      	  //��ɾ����ѡ�еĳ���
				      	  if ($(oHad).children().length>0){
				      	  	aChked.pop();
				      	  	$(oHad).children().trigger("click");
				      	  }
				      	  
				      	  //��ӳ���
				      	  aChked.push([getCityID,getCityName]);
				      	  $(oPop).find(":input[value="+getCityID+"]").prop("checked",true).data("chked",1); //����ѡ�е�ID����ѡ
				      	  $(oHad).append("<a href=\"javascript:;\" cityID=\""+getCityID+"\">"+getCityName+"</a>");
				      	  
				      	  $(oHad).children("[cityID="+getCityID+"]").click(function(){ //��ѡ�еĳ��а��¼�
				      	    //ɾ������
				      	    delCityID=$(this).attr("cityID");
				      	    $(oPop).find(":input[value="+delCityID+"]").prop("checked",false).data("chked",0);
				      	    aChked.shift();
				      	    $(this)[0].style.background = "";
				      	    $(this).remove();
				      	  })
			      	  	}
			      	  
			      	  $(oClose).trigger('click');
		      	    })
		      	    //��ѡʱ�İ��¼�����
		      	}
		      	
			}
			
			if(typeof(sLang)=="undefined" || sLang!="en") {
				//�������ĳ�������
				(function loadCityAll(){
					for(var i=0;i<all.length;i++){
						var sub = all[i].subcity, subhtmlItem="";						
						if (sub.length>0) {isHasSub = " jCitySelectorHasSub";} else {isHasSub=" jCitySelectorNoSub"}
						for(var j=0;j<sub.length;j++){
							subhtmlItem=subhtmlItem+"<a class=\"jCitySelectorListSubItem jCitySelectorNoSub\" cityID=\""+sub[j].cityCode+"\" href=\"javascript:;\" title=\""+sub[j].cityName+"\"><input type=\""+ chktype +"\" value=\""+sub[j].cityCode+"\"><span>"+sub[j].cityName+"</span></a>";
						}
						subhtml="<div class=\"jCitySelectorListSub\"><a class=\"jCitySelectorListSubItem jCitySelectorNoSub jCitySelectorItemTop\" cityID=\""+all[i].value+"\" href=\"javascript:;\" title=\""+all[i].name+"\"><input type=\""+ chktype +"\" value=\""+all[i].value+"\"><span>"+all[i].name+"</span></a>"+subhtmlItem+"</div>";
						allhtml=allhtml+"<li><a href=\"javascript:;\" class=\"jCitySelectorListItem jCitySelectorHasSub\" value=\""+all[i].value+"\" title=\""+all[i].name+"\" >"+all[i].name+"</a>"+subhtml+"</li>";
					}
					$(oAll).html(allhtml);
				})();
				
				//�������ų�������
				(function loadCityDirect(){
					for(var i=0;i<direct.length;i++){
						directhtml=directhtml+"<a class=\"jCitySelectorListItem jCitySelectorNoSub\" cityID=\""+direct[i].value+"\" href=\"javascript:;\" title=\""+direct[i].name+"\"><input type=\""+chktype+"\" value=\""+direct[i].value+"\"><span>"+direct[i].name+"</span></a>";
					}
					oHot.html(directhtml);
					fnLoadEvent();
				})();
			}
			else {
				//����Ӣ������
				(function loadCityAll(){
					for(var i=0;i<all.length;i++){
						var sub = all[i].subcity, subhtmlItem="";						
						if (sub.length>0) {isHasSub = " jCitySelectorHasSub";} else {isHasSub=" jCitySelectorNoSub"}
						for(var j=0;j<sub.length;j++){
							subhtmlItem=subhtmlItem+"<a class=\"jCitySelectorListSubItem jCitySelectorNoSub\" cityID=\""+sub[j].cityCode+"\" href=\"javascript:;\" title=\""+sub[j].cityEnName+"\"><input type=\""+ chktype +"\" value=\""+sub[j].cityCode+"\"><span>"+sub[j].cityEnName+"</span></a>";
						}
							subhtml="<div class=\"jCitySelectorListSub\"><a class=\"jCitySelectorListSubItem jCitySelectorNoSub jCitySelectorItemTop\" cityID=\""+all[i].value+"\" href=\"javascript:;\" title=\""+all[i].enName+"\"><input type=\""+ chktype +"\" value=\""+all[i].value+"\"><span>"+all[i].enName+"</span></a>"+subhtmlItem+"</div>";
						allhtml=allhtml+"<li><a href=\"javascript:;\" class=\"jCitySelectorListItem jCitySelectorHasSub\" value=\""+all[i].value+"\" title=\""+all[i].enName+"\">"+all[i].enName+"</a>"+subhtml+"</li>";
					}
					$(oAll).html(allhtml);
				})();
				
				//�������ų�������
				(function loadCityDirect(){
					for(var i=0;i<direct.length;i++){
						directhtml=directhtml+"<a class=\"jCitySelectorListItem jCitySelectorNoSub\" cityID=\""+direct[i].value+"\" href=\"javascript:;\" title=\""+direct[i].enName+"\"><input type=\""+chktype+"\" value=\""+direct[i].value+"\"><span>"+direct[i].enName+"</span></a>";
					}
					oHot.html(directhtml);
					fnLoadEvent();
				})();
			}
//		}
//      })
      
      $(oBtn).click(function(){ //���'��ѡ��'��ťʱ
        if ($(oPop).is(":hidden")) {
        	//upMeTop(oBox);
        	$(document).trigger("click");
        	$(this).addClass("jCitySelectorBtnOn");
        	$(oPop).show();
			rePopPos(oBtn, oPop, "jCitySelectorBtnOnTop")
        	fnInitChked();
        } else {
            $(this).removeClass("jCitySelectorBtnOn");
        	$(document).trigger("click");
        }
      })
      
      $(oClose).click(function(){ //���ȷ��ʱ�رղ㲢��ȡֵ����ʾ��Ӧ����
      	aChkedVal=[]; aChkedShow=[];
        for (var i=0;i<aChked.length;i++) {
          aChkedVal.push(aChked[i][0]);
          aChkedShow.push(aChked[i][1]);
        }
        oVal.val(aChkedVal.join());
        oName.val(aChkedShow.join());
        sChkedShow=aChkedShow.join(sJoinSign);
        if (sChkedShow!="" ) { $(oBtnTxt).text(sChkedShow).parent("a").attr("title",sChkedShow); }
        else {$(oBtnTxt).text(plsSelTxt).parent("a").attr("title","")} //���û��ѡ����У�����ʾ����ѡ������
        $(oPop).hide();
        $(oBtn).removeClass("jCitySelectorBtnOn jCitySelectorBtnOnTop");
      })
      
	  $(oBox).click(function(event){ event.stopPropagation(); }) //�������ʱֹͣð��
      $(document).click(function(){
      	$(oPop).hide();
      	$(oBtn).removeClass("jCitySelectorBtnOn jCitySelectorBtnOnTop"); 
      })
    })
  }
})


$(function(){
	$(".jCitySelector").loadCitySelector();
	//$(".jCitySelectorPop").bgiframe();
})




/*----------old version-----------------------------------------


function getCitySelector(obtn){
	var chooseLang,chkPopMain, chkPopChkedVal, chkPopChkedBtn, chkPopChkedMax, chkPopChkedHadChked, curval, curtxt, curtxtTmp=new Array();
	 if(!window.lang) {lang="cn"};
	 
	chkPopMain=obtn.parents("[citychkpop='_main']"); //���ڲ����ĸ�Ԫ��
	chkPopChkedVal=chkPopMain.find("[citychkpop='_val']"); //��ѡ��ı���ֵ
	chkPopChkedBd=chkPopMain.find("[citychkpop='_bd']");
	chkPopChkedHadChked=chkPopMain.find("[citychkpop='_chked']"); //��ѡ��ĸ�Ԫ��
	chkPopChkedBtn=chkPopMain.find("[citychkpop='_btn']"); //������ť
	chkPopChkedItem=chkPopMain.find("[citychkpop='_item']");
	chkPopChkedItemList=chkPopMain.find("[citychkpop='_itemList']");
	chkPopChkedDirectList=chkPopMain.find("[citydirectchkpop='_directList']");
	chkPopChkedClose=chkPopMain.find("[citychkpop='_close']");
	chkPopChkedMax=chkPopChkedBtn.attr("chkpopmax");
	chkPopMain.find("[citychkpop='_max']").text(chkPopChkedMax); //��ʾ���ֵ
	$("[citychkpop='_btn']").not(obtn).next().hide();
	chkPopChkedBd.toggle();
	var docW=$(window).width();
	var chkPopChkedBdMagin=(chkPopChkedBd.offset().left+chkPopChkedBd.width())-docW;
	if (chkPopChkedBdMagin>0) chkPopChkedBd.css("marginLeft",-(chkPopChkedBdMagin+10));
	chkPopMain.click(function(evt){evt.stopPropagation();})
	$(document).click(function(){chkPopChkedBd.hide();})
	$(chkPopChkedClose).click(function(){chkPopChkedBd.hide();})
	
	if(lang=="cn") {
	 	chooseLang="��ѡ��";
	 	overMaxTipLang="���ֻ��ѡ"+chkPopChkedMax+"��";
	 } else if(lang=="en") {
	 	chooseLang="Please Choose";
	 	overMaxTipLang="Select up to "+chkPopChkedMax;
	 }
	
	//ѡ������
	function notSelectedMax(checkboxObj){
		//alert(chkPopChkedHadChked.children().length +" + "+ chkPopChkedMax)
		if ( chkPopChkedHadChked.children().length >= chkPopChkedMax){
			if(chkPopChkedMax>1){
				checkboxObj.attr("checked",false);
				alert(overMaxTipLang);
				return false;
			}
			else if(chkPopChkedMax==1) {
				delChked(chkPopChkedHadChked.find("input:checked").not(checkboxObj));
				return true;
			}
		}
		else {
			return true;
		}
	}
	var chktype=chkPopChkedMax==1?"radio":"checkbox";
	//��ʾ��ѡ����
	function addChked(o){ //oΪcheckbox����
		curval=o.attr("value");
		curtxt=o.siblings("label").text();
		chkPopChkedVal.val(curval+","+chkPopChkedVal.val()); //���ѡ��ֵ
		if (chkPopChkedBtn.text()==chooseLang){chkPopChkedBtn.text("");curtxtTmp=[];}
		else {curtxtTmp=chkPopChkedBtn.text().split(",");}
		curtxtTmp.push(curtxt);
		chkPopChkedBtn.text(curtxtTmp.join()); //��ʾѡ������
		chkPopMain.find("[value='"+curval+"']").attr("checked",true);
		chkPopChkedHadChked.html(chkPopChkedHadChked.html()+'<li><input type="checkbox" value="'+curval+'" checked><label>'+o.next().text()+'</label></li>');
		chkPopChkedHadChked.find("input").click(function(){delChked($(this));})
		chkPopChkedHadChked.find("li").click(function(){$(this).children("input").trigger("click")})
		
	}
	//ɾ����ѡ��
	function delChked(o){
		curval=o.attr("value");
		curtxt=o.siblings("label").text();
		chkPopChkedVal.val(chkPopChkedVal.val().replace(curval+",",""));
		curtxtTmp=(chkPopChkedBtn.text()).split(",");
		for (var jj=0;jj<=curtxtTmp.length;jj++) {if (curtxtTmp[jj]==curtxt) {curtxtTmp.splice(jj,1);}}
		chkPopChkedBtn.text(curtxtTmp.join());
		if (chkPopChkedBtn.text()=="") chkPopChkedBtn.text(chooseLang);
		chkPopMain.find("[value='"+o.attr("value")+"']").attr("checked",false);
		chkPopChkedHadChked.find("[value='"+o.attr("value")+"']").parent().remove();
	}
	//var lang="en";

	if(chkPopChkedItemList.children().length==0){
	$.ajax({
			url: "scripts/citydata.json",
			contentType:"application/json", 
			dataType:"json",
			success:function(data){
			var directhtml=data.directcity, all = data.allcity, direct = data.directcity, directhtml="", allhtml="", subhtml="", zindexMax="9999999", isHasSub="";
			
			if(lang!="en") {
				//�������ĳ�������
				(function loadCityAll(){
					for(var i=0;i<all.length;i++){
						var sub = all[i].subcity, subhtmlItem="";
						if (sub.length>0) {isHasSub = " chkPopHasSub";} else {isHasSub=""}
						for(var j=0;j<sub.length;j++){
							subhtmlItem=subhtmlItem+"<li><input name=\"\" type=\""+chktype+"\" value=\""+sub[j].cityCode+"\"><label for=\""+sub[j].cityCode+"\">"+sub[j].cityName+"</label></li>";
						}
							subhtml="<ul class=\"city_chkpop_item_list_sub_item\" citychkpop=\"_sub\" style=\"display:none;\">"+subhtmlItem+"</ul>";
						allhtml=allhtml+"<li class=\"city_chkpop_item_list_sub"+isHasSub+"\" style=\"z-index:"+(zindexMax-i)+"\" ><input name=\"\" type=\""+chktype+"\" value=\""+all[i].value+"\"><label for=\"\">"+all[i].name+"</label>"+subhtml+"</li>";
					}
					chkPopChkedItemList.html(allhtml);
				})();
				
				
				//�������ų�������
				(function loadCityDirect(){
					for(var i=0;i<direct.length;i++){
						directhtml=directhtml+"<li class=\"city_chkpop_item_list_sub\" ><input name=\"\" type=\""+chktype+"\" value=\""+direct[i].value+"\"><label for=\"\">"+direct[i].name+"</label></li>";
					}
					chkPopChkedDirectList.html(directhtml);
				})();
			}
				
			else {
				//����Ӣ������
				(function loadCityAll(){
					for(var i=0;i<all.length;i++){
						var sub = all[i].subcity, subhtmlItem="";
						if (sub.length>0) isHasSub = " chkPopHasSub";
						for(var j=0;j<sub.length;j++){
							subhtmlItem=subhtmlItem+"<li><input name=\"\" type=\""+chktype+"\" value=\""+sub[j].cityCode+"\"><label for=\""+sub[j].cityCode+"\">"+sub[j].cityEnName+"</label></li>";
						}
							subhtml="<ul class=\"city_chkpop_item_list_sub_item\" citychkpop=\"_sub\" style=\"display:none;\">"+subhtmlItem+"</ul>";
						allhtml=allhtml+"<li class=\"city_chkpop_item_list_sub"+isHasSub+"\" style=\"z-index:"+(zindexMax-i)+"\" ><input name=\"\" type=\""+chktype+"\" value=\""+all[i].value+"\"><label for=\"\">"+all[i].enName+"</label>"+subhtml+"</li>";
					}
					chkPopChkedItemList.html(allhtml);
				})();
				
				(function loadCityDirect(){
					for(var i=0;i<direct.length;i++){
						directhtml=directhtml+"<li class=\"city_chkpop_item_list_sub\" ><input name=\"\" type=\""+chktype+"\" value=\""+direct[i].value+"\"><label for=\"\">"+direct[i].enName+"</label></li>";
					}
					chkPopChkedDirectList.html(directhtml);
				})();
			}
			
			
			//Ĭ����ʾ��ѡ�����
			var chkPopChkedValArr=chkPopChkedVal.attr("initval").split(",");
			if (chkPopChkedVal.attr("initval")!=0) {
				chkPopChkedBtn.text(chooseLang);
				for (i=0; i<chkPopChkedValArr.length; i++){
					addChked(chkPopChkedItem.find("input[value='"+chkPopChkedValArr[i]+"']"));
				}
			}
			
			//һ������ĵ�����ƿ��¼�
			chkPopChkedItemList.find("li").click(function(event){
				if($(this).hasClass("chkPopHasSub")) { //������¼�����
					$(this).toggleClass("on");
					$(this).children("[citychkpop='_sub']").toggle();
				}
				else{ //���û���¼�����
					event.stopPropagation();
					if($(this).children("input").attr("checked")=="checked"){
						$(this).children("input").attr("checked",false).triggerHandler("click");
					}
					else{
						$(this).children("input").attr("checked",true).triggerHandler("click");
					}
				}
			})
			.mouseleave(function(){
				$(this).removeClass("on").children("[citychkpop='_sub']").hide();	
			})
			
			//checkbox�ĵ���¼�
			chkPopChkedItemList.find("input").unbind("click").click(function(event){
				event.stopPropagation();
				
				//event.preventDefault();
				if(chkPopChkedMax==1) {$(this).attr("checked")==true?$(this).attr("checked",false):$(this).attr("checked",true);chkPopChkedBd.hide();}
				if (this.checked && notSelectedMax($(this))) { //�����ѡ���Ҳ��������ֵ
					if ($(this).parent().hasClass("chkPopHasSub")) { //������ӽڵ�
						$(this).siblings("[citychkpop='_sub']").find("input:checked").each(function(){
							delChked($(this));
						})
					}
					else{
						if ($(this).parent().parent().attr("citychkpop")=="_sub") {$(this).parent().parent().hide();delChked($(this).parents("[citychkpop='_sub']").siblings("input:checked"));}	//������ڸ��ڵ�
					}
					addChked($(this));
				} 
				else {
					delChked($(this));
				}
			})
		}
	})
	}
	
}

*/