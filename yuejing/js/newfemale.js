String.prototype.toNumber = function(){
	return Number(this.replace(/px/gi,""));
}
var nowday=0;
var helper = {
	$ : function(tagId){return document.getElementById(tagId);},
	$c : function(tagName){return document.createElement(tagName);},
	bind : function(eventObj,eventType,eventMethod){
		if(window.attachEvent){
			eventObj.attachEvent("on" + eventType,eventMethod);
		}else{
			eventObj.addEventListener(eventType,eventMethod,false);
		}
	},
	delbind : function(eventObj,eventType,eventMethod){
		//匿名函数好像无用
		if(window.detachEvent){
			eventObj.detachEvent("on" + eventType,eventMethod);
		}else{
			eventObj.removeEventListener(eventType,eventMethod,false);
		}
	},
	position : function(parentObj){
		var parentTop = parentObj.offsetTop;
		var parentLeft = parentObj.offsetLeft;
		while(parentObj = parentObj.offsetParent){
			parentTop += parentObj.offsetTop;
			parentLeft += parentObj.offsetLeft;
		}
		return {
			top : parentTop,
			left : parentLeft
		}
	}
}
var calendar = {
	args : {
		year : 0,
		month : 0,
		day : 0,
		dayArray : [31,28,31,30,31,30,31,31,30,31,30,31],
		target : null
	},
	initYear : function(year){
		var leftYear = helper.$("leftYear");
		var yearLayer = helper.$c("DIV");
		yearLayer.id = "yearLayer";
		yearLayer.className = "yearLayer";
		yearLayer.style.display = 'none';
		var yearList = helper.$c("UL");
		var yearItems = [helper.$c("LI"),helper.$c("LI"),helper.$c("LI")];
//		yearItems[0].innerHTML = year - 1 + "&#24180;";
//		yearItems[1].innerHTML = year + "&#24180;";
//		yearItems[2].innerHTML = year + 1 + "&#24180;";
		//yearItems[0].innerHTML = "<a name='cLL' href='javascript:void(0);' >" +(year-1)+"</a>";
		//yearItems[1].innerHTML = "<a name='cLL' href='javascript:void(0);' >" +(year)  +"</a>";
		//yearItems[2].innerHTML = "<a name='cLL' href='javascript:void(0);' >" +(year+1)  +"</a>";			
//		yearItems[0].innerHTML = year - 1 ;
//		yearItems[1].innerHTML = year ;
//		yearItems[2].innerHTML = year + 1;
		for(var i=0;i<3;i++){
			helper.bind(yearItems[i],"mouseover",function(evt){
				var evnt = evt || window.event;
				var target = evnt.srcElement || evnt.target;
				target.style.backgroundColor = "#fff";
				helper.bind(target,"mouseout",function(evt0){
					var evnt0 = evt0 || window.event;
					var target0 = evnt0.srcElement || evnt0.target;
					target0.style.backgroundColor = "#FFF";
				});
			});
			helper.bind(yearItems[i],"click",function(evt){
				var evnt = evt || window.event;
				var target = evnt.srcElement || evnt.target;
				target.style.backgroundColor = "#EEE";
				var str=target.innerHTML;
				var ss = str.match(/\d{4}/);
				target.innerHTML=ss[0];
				//这里第2个参数月 是左边的月份-1
				//calendar.show(parseInt(target.innerHTML.replace(/&#24180;/,"")),parseInt(helper.$("leftMonth").innerHTML)-1);
				calendar.show(parseInt(target.innerHTML.replace(/&#24180;/,"")),parseInt(helper.$("leftMonth").innerHTML)-1);
				helper.$("leftYear").innerHTML = target.innerHTML.replace(/&#24180;/,"");
				helper.$("rightYear").innerHTML = target.innerHTML.replace(/&#24180;/,"");
				calendar.clear();
			});
		}
		//yearList.appendChild(yearItems[0]);
		//yearList.appendChild(yearItems[1]);
		//yearList.appendChild(yearItems[2]);
		//yearLayer.appendChild(yearList);
		document.body.appendChild(yearLayer);
		$("#yearLink").bind("click", function(){
			//document.getElementById("nowElement").value = "yearLink";
			try{
				document.body.removeChild(helper.$("monthLayer"));
			}catch(e){}
			calendar.showLayer(helper.$("yearLayer"),helper.$("yearLink"));
			helper.bind(helper.$("yearLayer"),"mouseover",function(){helper.$("yearLink").className='current';});
			helper.bind(helper.$("yearLayer"),"mouseout",function(){helper.$("yearLink").className='';});
			calendar.args.target = helper.$("yearLink");
		});
		$("#rYearLink").bind("click", function(){
			//document.getElementById("nowElement").value = "rYearLink";
			try{
				document.body.removeChild(helper.$("monthLayer"));
			}catch(e){}
			calendar.showLayer(helper.$("yearLayer"),helper.$("rYearLink"));
			helper.bind(helper.$("yearLayer"),"mouseover",function(){helper.$("rYearLink").className='current';});
			helper.bind(helper.$("yearLayer"),"mouseout",function(){helper.$("rYearLink").className='';});
			calendar.args.target = helper.$("rYearLink");
		});
		helper.bind(document,"click",function(evt){
			var evnt = evt || window.event;
			var target = evnt.srcElement || evnt.target;
			if(target.tagName.toLowerCase() == "a"  || ( typeof(target.name) != 'undefined' && target.name == 'cLL' ) ){
				helper.$("yearLayer").style.display = "none";
				try{
					document.body.removeChild(helper.$("monthLayer"));
				}catch(e){}
			}
		});
	},
	initMonth : function(month){
		var year = new Date().getFullYear();
		var selYear = helper.$("leftYear").innerHTML;
		var maxMonthCount = new Date().getMonth();

		var monthLayer = helper.$c("DIV");
		monthLayer.id = "monthLayer";
		monthLayer.className = "monthLayer";
		var monthList = helper.$c("UL");
		for(var i=maxMonthCount-1;i<maxMonthCount+1;i++){
			var monthItem = helper.$c("LI");
			//monthItem.innerHTML = "<a href='#'>" +i+1 + "&#26376;" +"</a>";
			//console.log("<a href='#'>" +i+1 + "&#26376;" +"</a>");
			monthItem.innerHTML ="<a name='cLL' href='javascript:void(0);' >" +(i+1) + "&#26376;" +"</a>"
			//monthItem.innerHTML = i+ 1 + "&#26376;" ;
			helper.bind(monthItem,"mouseover",function(evt){
				var evnt = evt || window.event;
				var target = evnt.srcElement || evnt.target;
				target.style.backgroundColor = "#a2cdea";
				helper.bind(target,"mouseout",function(evt0){
					var evnt0 = evt0 || window.event;
					var target0 = evnt0.srcElement || evnt0.target;
					target0.style.backgroundColor = "#FFF";
				});
			});
			helper.bind(monthItem,"click",function(evt){
				var evnt = evt || window.event;
				var target = evnt.srcElement || evnt.target;
				target.style.backgroundColor = "#EEE";
				var str=target.innerHTML;
				var ss = str.match(/\d+(月|年)/);
				target.innerHTML=ss[0];
				calendar.show(parseInt(helper.$("leftYear").innerHTML),parseInt(target.innerHTML)-1);
				var selMonth = parseInt(target.innerHTML.replace(/&#26376;/,""));
				var nowElement = document.getElementById("nowElement").value;
				if(nowElement.toLowerCase() == "rmonthlink"){
					helper.$("rightMonth").innerHTML = selMonth;
					if((selMonth - 1) - 1 < 0){
						helper.$("leftYear").innerHTML = parseInt(helper.$("rightYear").innerHTML) - 1;
						helper.$("leftMonth").innerHTML = 12;
					}else{
						helper.$("leftMonth").innerHTML = selMonth - 1;
					}
				}else{
					if((selMonth - 1) + 1 > 11){
						helper.$("rightYear").innerHTML = parseInt(helper.$("leftYear").innerHTML) + 1;
						helper.$("rightMonth").innerHTML = 1;
					}else{
						helper.$("rightMonth").innerHTML = selMonth + 1;
					}
				}
				calendar.clear();
			});
			monthList.appendChild(monthItem);
		}
		monthLayer.appendChild(monthList);
		document.body.appendChild(monthLayer);
		//helper.$("monthLayer").style.height = 25 * maxMonthCount - 7 + "px";
	},
	init : function(year,month){
		calendar.initYear(year);
		$("#monthLink").bind("click", function(){
			
			if(document.getElementById("monthLayer") != null ){
				try{
					document.body.removeChild(helper.$("monthLayer"));
				}catch(e){}
			} else{document.getElementById("nowElement").value = "monthLink";
			helper.$("yearLayer").style.display = "none";
			calendar.initMonth();
			calendar.showLayer(helper.$("monthLayer"),helper.$("monthLink"));
			helper.bind(helper.$("monthLayer"),"mouseover",function(){helper.$("monthLink").className='current';});
			helper.bind(helper.$("monthLayer"),"mouseout",function(){helper.$("monthLink").className='';});
			calendar.args.target = helper.$("monthLink");
			}
			return false;
}); 
//		helper.bind(helper.$("monthLink"),"click",function(){
//			document.getElementById("nowElement").value = "monthLink";
//			helper.$("yearLayer").style.display = "none";
//			calendar.initMonth();
//			calendar.showLayer(helper.$("monthLayer"),helper.$("monthLink"));
//			helper.bind(helper.$("monthLayer"),"mouseover",function(){helper.$("monthLink").className='current';});
//			helper.bind(helper.$("monthLayer"),"mouseout",function(){helper.$("monthLink").className='';});
//			calendar.args.target = helper.$("monthLink");
//			//helper.$("monthLayer").style.left = helper.$("monthLayer").style.left.toNumber() - 100 + "px";
//		});
$("#rMonthLink").bind("click", function(){
			document.getElementById("nowElement").value = "rMonthLink";
			helper.$("yearLayer").style.display = "none";
			calendar.initMonth();
			calendar.showLayer(helper.$("monthLayer"),helper.$("rMonthLink"));
			helper.bind(helper.$("monthLayer"),"mouseover",function(){helper.$("rMonthLink").className='current';});
			helper.bind(helper.$("monthLayer"),"mouseout",function(){helper.$("rMonthLink").className='';});
			
			calendar.args.target = helper.$("rMonthLink");
			//helper.$("monthLayer").style.left = helper.$("monthLayer").style.left.toNumber() - 155 + "px";
		});

	},
	showLayer : function(layer,target){
		target = target || calendar.args.target;
		layer.style.display = "block";
		var pos = helper.position(target);
		layer.style.left = pos.left - layer.clientWidth + 25 + "px";
		layer.style.top = pos.top + 22 + "px";
	},
	show : function(year,month,day){
		calendar.args.dayArray[1] = (calendar.isLeapYear(year) ? 29 : 28);
		var firstDayOfLeftMonth = new Date(year,month,1).getDay();
		var maxDayOfLeftMonth = calendar.args.dayArray[month];
		helper.$("leftYear").innerHTML = year;
		helper.$("leftMonth").innerHTML = month + 1;
		
		var nextMonth = ((month + 1 > 11) ? 0 : (month + 1));
		var nextYear = ((month + 1 > 11) ? year+1 : year );
		calendar.args.dayArray[1] = (calendar.isLeapYear(nextYear) ? 29 : 28);
		var firstDayOfRightMonth = new Date(nextYear,nextMonth,1).getDay();
		var maxDayOfRightMonth = calendar.args.dayArray[nextMonth];
		
		helper.$("rightYear").innerHTML = nextYear;
		helper.$("rightMonth").innerHTML = nextMonth + 1;
		calendar.fill(helper.$("leftTable"),firstDayOfLeftMonth,maxDayOfLeftMonth);
		calendar.fill(helper.$("rightTable"),firstDayOfRightMonth,maxDayOfRightMonth);
	},
	fill : function(calendarTable,dayCount,maxDay){
		var now = new Date().getTime();
		var minDay = 1;
		var list =calendarTable.getElementsByTagName("li");
		var starti=7;
		for(var i=1;i<7;i++){
			for(var j=0;j<7;j++){
				if(dayCount > 0 || minDay > maxDay){
					list[starti].innerHTML = "<a href='javascript:void(0);'>&nbsp;</a>";
					dayCount--;
				}else{
					list[starti].innerHTML = "<a href='javascript:void(0);'>"+minDay+"</a>";
					list[starti].onclick = function(){
						female.args.day = parseInt(this.getElementsByTagName('a')[0].innerHTML);
						var ret = female.check(this);
						if(ret){
							
							
							var txt=this.getElementsByTagName('a')[0].innerHTML;
							//this.getElementsByTagName('a')[0].removeChild(this.getElementsByTagName('a')[0].children[0]);
							
							if( nowday == 0)//去掉就可以重新填充
							{
								female.calculate();
								this.getElementsByTagName('a')[0].className = 'aBlue';
							  this.getElementsByTagName('a')[0].innerHTML = txt+ "<em class='emTipBlue'>所选日期</em>";
							  helper.$("aBlue").innerHTML = "<em class='aBlue'></em>所选日期:" + txt;
							}
							nowday = txt;
							
							//this.style.color = "#3fc0ee";
							//this.style.background = "url(images/mapBg.png) no-repeat center center";
							calendar.trans();
						}
					};
					minDay++;
				}
				starti++;
			}
		}
	},
	trans : function(){
		if($("#rightCal").css('display') == "none")
		{
			$("#womensafeDateCon .safe_calendar").eq(0).attr('style','margin-left:0;');
			$("#womensafeDateCon .safe_calendar").eq(1).attr('style','margin-left:0;');
			$("#womensafeDateCon .safe_calendar").eq(0).hide();
			$("#womensafeDateCon .safe_calendar").eq(0).animate({
			   left: 38, opacity: 'show'
			 }, 1000); 
			$("#womensafeDateCon .safe_calendar").eq(1).animate({
			   left: 388, opacity: 'show'
			 }, 1000);
			$("#popCss").hide();
			$("#monthLink").unbind();
			$("#yearLink").unbind();
			$("#rYearLink").unbind();
			$("#rMonthLink").unbind();
			if(nowday != 0)
			{
				$('#acrest').show();
			}
			$('#chosecal').addClass('safe_calendar_left');
		}
		
	},
	clear : function(){
		var leftTable = helper.$("leftTable");
		var rightTable = helper.$("rightTable");
		var listLT =leftTable.getElementsByTagName("li");
		var listLR =rightTable.getElementsByTagName("li");
		var starti=7;
		for(var i=1;i<7;i++){
			for(var j=0;j<7;j++){
				listLT[starti].getElementsByTagName("a")[0].className='';
				listLR[starti].getElementsByTagName("a")[0].className=''; 
				listLT[starti].getElementsByTagName("a")[0].removeAttribute("className"); 
				listLR[starti].getElementsByTagName("a")[0].removeAttribute("className"); 
				if(typeof(listLR[starti].getElementsByTagName("a")[0].getElementsByTagName("em")[0]) !="undefined")
				{	
					$("#rightTable li:eq("+starti+") a:eq(0) em").remove();
				}
				$("#rightTable li:eq("+starti+") a em").remove();
				$("#leftTable li:eq("+starti+") a em").remove();
				
				if(typeof(listLT[starti].getElementsByTagName("a")[0].getElementsByTagName("em")[0]) !="undefined")
				{
					$("#leftTable li:eq("+starti+") a:eq(0) em").remove();
				}
				
				starti++;
			}
		}
	},
	isLeapYear : function(year){
		if((year % 4 == 0 && year % 100 != 0) || year % 400 == 0){
			return true;
		}
		return false;
	}
}
var female = {
	args : {
		day : 0
	},
	check : function(){
			var minMensesPriod = helper.$("minMensesPriod").value;
			//var minMensesing = helper.$("minMensesing").value;
			// check priod
			if(isNaN(minMensesPriod) || (Number(minMensesPriod) > 40 || Number(minMensesPriod) < 24)){
				alert("&#35831;&#36755;&#20837;&#25968;&#23383;&#24182;&#20171;&#20110;24&#19982;40&#20043;&#38388;");
				return false;
			}
			helper.$("aZlue").innerHTML = "<em class='aBlue'></em>间隔:  :" + minMensesPriod;
//			if(isNaN(minMensesing) || (Number(minMensesing) > 7 || Number(minMensesing) < 3)){
//				alert("&#35831;&#36755;&#20837;&#34892;&#32463;&#26399;&#24182;&#20171;&#20110;3&#19982;7&#20043;&#38388;");
//				return false;
//			}
			return true;
	},
	calculate : function(){
		calendar.clear();
		var minMensesPriod = helper.$("minMensesPriod").value;
		var minMensesing = helper.$("minMensesing").value;
		var year = Number(helper.$("leftYear").innerHTML);
		var month = Number(helper.$("leftMonth").innerHTML);
		var day = female.args.day;
		
		var lastTime = new Date(Date.UTC(year,month-1,day)).getTime();
		female.show(helper.$("leftTable"),year,month,lastTime);
		var rightYear = Number(helper.$("rightYear").innerHTML);
		
		var rightMonth = Number(helper.$("rightMonth").innerHTML);
		female.show(helper.$("rightTable"),rightYear,rightMonth,lastTime);
	},
	show : function(table,year,month,lastTime){
		var minMensesPriod = helper.$("minMensesPriod").value;
		var minMensesing = helper.$("minMensesing").value;
		
		// check priod end
		minMensesPriod = Number(minMensesPriod);
		minMensesing = Number(minMensesing);
		var secondUnit = 24 * 60 * 60 * 1000;
		var k = 0;
		var list = table.getElementsByTagName("li");
		var starti=7;
		for(var i=1;i<7;i++){
			for(var j=0;j<7;j++){
				//var calDayItem = table.rows[i].cells[j];
				var calDayItem = list[starti].getElementsByTagName("a")[0];
				if(calDayItem.innerHTML == ""){
					continue;
				}else{
					var calDay = Number(parseInt(calDayItem.innerHTML));
					var calTime = new Date(Date.UTC(year,month-1,calDay)).getTime();
					var dayDiff = Math.floor((calTime - lastTime) / secondUnit);
					var result = (dayDiff % minMensesPriod + minMensesPriod) % minMensesPriod;	
					if(result >= 0 && result <= 4){
						var txt=calDayItem.innerHTML;
						calDayItem.innerHTML = txt+ "<em class='emTipYellow'>月经期</em>";
						calDayItem.className='aYellow';

						
					}else if(result >= 5 && result <= (minMensesPriod - 20)){//20
						var txt=calDayItem.innerHTML;
						calDayItem.innerHTML = txt+ "<em class='emTipGreen'>安全期</em>";
						calDayItem.className='aGreen';
					}else if(result >= (minMensesPriod - 19) && result <= (minMensesPriod - 10)){//19 10
						var txt=calDayItem.innerHTML;
						calDayItem.innerHTML = txt+ "<em class='emTipRed'>危险期</em>";
						calDayItem.className='aRed';
					}else if(result >= (minMensesPriod - 9) && result <= (minMensesPriod - 1)){//9 1
						var txt=calDayItem.innerHTML;
						calDayItem.innerHTML = txt+ "<em class='emTipGreen'>安全期</em>";
						calDayItem.className='aGreen';
						
					}
					
					
				}
				starti++;
			}
			
		}
	},
	increase : function(){
		var minMensesPriod = helper.$("minMensesPriod").value;
		if(parseInt(minMensesPriod) >= 40){
			return false;
		}else{
			helper.$("minMensesPriod").value = parseInt(minMensesPriod) + 1;
		}
	},
	fallOff : function(){
		var minMensesPriod = helper.$("minMensesPriod").value;
		if(parseInt(minMensesPriod) <= 24){
			return false;
		}else{
			helper.$("minMensesPriod").value = parseInt(minMensesPriod) - 1;
		}
	},
	creset : function(){
		calendar.clear();
		nowday=0;
		if($("#rightCal").css('display') != "none")
		{
			$("#womensafeDateCon .safe_calendar").eq(0).attr('style','');
			$("#womensafeDateCon .safe_calendar").eq(1).attr('style','');
			$("#womensafeDateCon .safe_calendar").eq(1).hide();
			$("#popCss").show();
			$('#acrest').hide();
		}
		$('#chosecal').removeClass('safe_calendar_left');
		var nowDate = new Date();
		calendar.init(nowDate.getFullYear(),nowDate.getMonth());
	},
	increase2 : function(){
		var minMensesing = helper.$("minMensesing").value;
		if(parseInt(minMensesing) >= 7){
			return false;
		}else{
			helper.$("minMensesing").value = parseInt(minMensesing) + 1;
		}
	},
	fallOff2 : function(){
		var minMensesing = helper.$("minMensesing").value;
		if(parseInt(minMensesing) <= 3){
			return false;
		}else{
			helper.$("minMensesing").value = parseInt(minMensesing) - 1;
		}
	}
}
helper.bind(window,"load",function(){
	var nowDate = new Date();
	calendar.show(nowDate.getFullYear(),nowDate.getMonth(),nowDate.getDate());
	calendar.init(nowDate.getFullYear(),nowDate.getMonth());
});
helper.bind(window,"resize",function(){
	var yl = helper.$("yearLayer");
	var ml = helper.$("monthLayer");
	if(yl){
		if(yl.style.display == "block"){
			calendar.showLayer(yl);
		}
	}
	if(ml){
		if(ml.style.display == "block"){
			calendar.showLayer(ml);
			ml.style.left = ml.style.left.toNumber() - 155 + "px"
		}
	}
});