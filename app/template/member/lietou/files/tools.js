//��ȡʱ��εĻ�ӭ���
var getWelcomeTime = function(){
	var hour = new Date().getHours() ;
	if(hour < 6){return"�賿�ã�";} 
	else if (hour < 9){return"���Ϻã�";} 
	else if (hour < 11){return"����ã�";} 
	else if (hour < 13){return"����ã�";} 
	else if (hour < 18){return"����ã�";} 
	//else if (hour < 19){return"����ã�";} 
	else if (hour < 22){return "���Ϻã�";} 
	else {return"ҹ���ˣ�";} 
};

/** 
 * ��ʽ����Ǯ����1,234,567
 * @param str
 * @returns
 */
function formatCurrencyTenThou(str) {
	if(str==null||str==undefined){
		return 0;
	}
	if(isNaN(str)){
		return 0;
	}else{
		str = str+'';
		str = str.indexOf(".") == -1 ? str : str.substr(0,  str.indexOf("."));
		var str=str.split('').reverse().join('').replace(/(\d{3})/g,'$1,').replace(/\,$/,'').split('').reverse().join('');
		return str;
	}
}


//��չdate��ʽ��
Date.prototype.Format = function (fmt) { //author: meizz 
    var o = {
        "M+": this.getMonth() + 1, //�·� 
        "d+": this.getDate(), //�� 
        "h+": this.getHours(), //Сʱ 
        "m+": this.getMinutes(), //�� 
        "s+": this.getSeconds(), //�� 
        "q+": Math.floor((this.getMonth() + 3) / 3), //���� 
        "S": this.getMilliseconds() //���� 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}


/*//���ڸ�ʽ��Ϊ2015-04-04 09:18:20
function formateDate(time) {
	if(time !=null){
		var date = new Date();
		date.setTime(time);
		var str = date.Format("yyyy-MM-dd hh:mm:ss");
		return str;
	}
	else{
		return "";
	}
}*/
//���ڸ�ʽ��Ϊ2015-04-04
function formateDate1(time) {
	var date = new Date();
	date.setTime(time);
	var str = "";
	str = date.getFullYear() + "-" + (date.getDate() < 10 ? "0"+date.getDate():date.getDate())+"-"+
	(date.getDay() < 10 ? "0"+date.getDay():date.getDay());
	return str;
}

//���ڸ�ʽ��Ϊ2015-04-04 09:18:20
function formateDate(time,format) {
	if(time != null){
		var date = new Date();
		date.setTime(time);
		var str = date.Format(format);
		return str;
	}
	else{
		return "";
	}
}

function getDateStr(time,format) {
	if(time == "" || time == null) {
		return "";
	}
	
	var date = new Date();
	var todayStr = date.Format("yyyy-MM-dd");
	date.setDate(date.getDate()-1);//����
	var yesStr = date.Format("yyyy-MM-dd");
	date.setDate(date.getDate()+2);//����
	var tomStr = date.Format("yyyy-MM-dd");
	
	var temp = new Date();
	temp.setTime(time);
	var tempStr = temp.Format("yyyy-MM-dd");
	if(tempStr == todayStr) {
		return "����&nbsp;"+temp.Format("hh:mm");
	}if(tempStr == yesStr) {
		return "����&nbsp;"+temp.Format("hh:mm");
	}if(tempStr == tomStr) {
		return "����&nbsp;"+temp.Format("hh:mm");
	}else {
		return temp.Format(format);
	}
}


/**����ת��Ϊ���Ĵ�д*/
function numberToChinese(num) {	
	if(!/^\d*(\.\d*)?$/.test(num)) 
	{ 
	alert("������Ĳ������֣�����������!"); 
	return false; 
	} 
	var AA = new Array("��","Ҽ","��","��","��","��","½","��","��","��"); 
	var BB = new Array("","ʰ","��","Ǫ","��","��","��",""); 
	var a = (""+ num).replace(/(^0*)/g, "").split("."), k = 0, re = ""; 
	for(var i=a[0].length-1; i>=0; i--) 
	{ 
	switch(k) 
	{ 
	case 0 : 
	re = BB[7] + re; 
	break; 
	case 4 : 
	if(!new RegExp("0{4}\\d{"+ (a[0].length-i-1) +"}$").test(a[0])) 
	re = BB[4] + re; 
	break; 
	case 8 : 
	re = BB[5] + re; 
	BB[7] = BB[5]; 
	k = 0; 
	break; 
	} 
	if(k%4 == 2 && a[0].charAt(i)=="0" && a[0].charAt(i+2) != "0") re = AA[0] + re; 
	if(a[0].charAt(i) != 0) re = AA[a[0].charAt(i)] + BB[k%4] + re; 
	k++; 
	} 
	if(a.length>1) { 
	re += BB[6]; 
	for(var i=0; i<a[1].length; i++) re += AA[a[1].charAt(i)]; 
	} 
	return re;
}

/**������֤��������䶺�ŷָ�**/
function isEmail(email) {
	if(email != "") {
		 var emailReg = /^((([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6}\,))*(([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})))$/;
		 if(!emailReg.test(email)){
			 return false;
		 }
		 return true;
	}
}

var now = new Date(); //��ǰ���� 
var nowDayOfWeek = now.getDay(); //���챾�ܵĵڼ��� 
var nowDay = now.getDate(); //��ǰ�� 
var nowMonth = now.getMonth(); //��ǰ�� 
var nowYear = now.getYear(); //��ǰ�� 
nowYear += (nowYear < 2000) ? 1900 : 0; //

var lastMonthDate = new Date(); //�������� 
lastMonthDate.setDate(1); 
lastMonthDate.setMonth(lastMonthDate.getMonth()-1); 
var lastYear = lastMonthDate.getYear(); 
var lastMonth = lastMonthDate.getMonth();


// ��ñ��ܵĿ�������
function getWeekStartDate() { 
	var weekStartDate = new Date(nowYear, nowMonth, nowDay - nowDayOfWeek); 
	return weekStartDate.Format("yyyy-MM-dd"); 
}

// ��ñ��ܵ�ֹͣ����
function getWeekEndDate() { 
	var weekEndDate = new Date(nowYear, nowMonth, nowDay + (6 - nowDayOfWeek)); 
	return weekEndDate.Format("yyyy-MM-dd"); 
}

// ��ñ��µĿ�������
function getMonthStartDate(){ 
	var monthStartDate = new Date(nowYear, nowMonth, 1); 
	return monthStartDate.Format("yyyy-MM-dd"); 
}

// ��ñ��µ�ֹͣ����
function getMonthEndDate(){ 
	var monthEndDate = new Date(nowYear, nowMonth, getMonthDays(nowMonth)); 
	return monthEndDate.Format("yyyy-MM-dd"); 
}

// ������¿���ʱ��
function getLastMonthStartDate(){ 
	var lastMonthStartDate = new Date(nowYear, lastMonth, 1); 
	return lastMonthStartDate.Format("yyyy-MM-dd"); 
}

// �������ֹͣʱ��
function getLastMonthEndDate(){ 
	var lastMonthEndDate = new Date(nowYear, lastMonth, getMonthDays(lastMonth)); 
	return lastMonthEndDate.Format("yyyy-MM-dd"); 
}

//���ĳ�µ����� 
function getMonthDays(myMonth){ 
	var monthStartDate = new Date(nowYear, myMonth, 1); 
	var monthEndDate = new Date(nowYear, myMonth + 1, 1); 
	var days = (monthEndDate - monthStartDate)/(1000 * 60 * 60 * 24); 
	return days; 
}


//�޸�С����
function tofixedNum(v,n){
	if(isNaN(v)){
		return 0;
	}
	n=n?n:2;
	return parseFloat(v.toFixed(n));
	
}

function isEmpty(str) {
	if(str == "" || str == null) {
		return true;
	}else {
		return false;
	}
}

function getStr(str,defaultStr) {
	if(str == "" || str == null) {
		return defaultStr;
	}else {
		return str;
	}
}

/**
 * ������������
 * @param obj
 * @param maxLen
 * @param tipId
 * @returns {Boolean}
 */
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
		//alert("�����������ƣ�������ֽ����ضϣ�");
	} else{
		$("#"+tipId).text(actLength);
	}
	
}

function toString(str){
	if(str==null)
		return '';
	return str;
}