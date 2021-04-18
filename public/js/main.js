//年月表示関数
function viewMonth(year, month) {
	//yyyy-MMを取得（月は0埋め）
	var yM = year + "-" + ("0" + month).slice(-2);
	$(".month-view")[0].innerHTML = '<input type="month" id="select-month" value=' + yM + ' onchange="monthCange()">';
}

//年月変更関数
function monthCange() {
	var yM = $("#select-month").value;
	//変更された年月でカレンダー表示
	viewTable(yM.slice(0,4), yM.slice(-2));
}

//スケジュール表示関数
function showSchedule(date) {
	var yearPart = date.substr(5, 4);
	var monthPart = date.substr(10, 2);
	var datePart = date.substr(13, 2);
	//日付を表示用に整形
	var showDate = yearPart + "/" + monthPart + "/" + datePart;
	//日付をデータ操作用に整形
	var dbDate = yearPart + "-" + monthPart + "-" + datePart;
	
	//日付表示
	$(".schedule-view-main").append('<div id="schedule-date">' + showDate + '</div>');
	
	$(".schedule-view-main").append('<div class="schedule-space"></div>');
	
	//スケジュール一覧を表示
	for(var i = 0; i < schedules.length; i++) {
		if(schedules[i]["date"] == dbDate){
			$(".schedule-space").append(
				'<div class="accordion-trigger">'+
					'<div class="accordion-mark">▶ </div>'+
					'<div class="schedule-time">' + schedules[i]["start"] + '　-　'+ schedules[i]["end"] + '</div>'+
				'</div>'+
				'<div class="accordion-content">'+
					'<div class="schedule-content">' + schedules[i]["schedule"] + '</div>'+
					'<div class="schedule-button">'+
						//変更/削除ボタンを設置
						'<a href=\'./update/' + schedules[i]["No"] + '\'>変更</a>'+
						'<a href=\'./delete/' + schedules[i]["No"] + '\'>削除</a>'+
					'</div>'+
				'</div>'+
				'<br>'
			);
		}
	}
	
	//▶マーク回転フラグ
	var rotateFlag = 0;
	//accordion-triggerクラスの要素すべてに対して処理を実行
	$('.accordion-trigger').each(function(){
		$(this).on('click',function(){
			//隣接する要素を表示
			$(this).next().slideToggle(150);
			$(this).next().toggleClass('open');
			//フラグが立っていなければ▶マークを90°回転させる
			if(rotateFlag==0){
				$('.accordion-mark',this).css('transform', 'rotate(90deg)');
				rotateFlag=1;
			//フラグが立っていれば▶マークをもとに戻す
			} else {
				$('.accordion-mark',this).css('transform', 'rotate(0deg)');
				rotateFlag=0;
			}
		});
	});
}

//カレンダー表示関数
function viewTable(year, month) {
	//月初
	var begginingMonth = new Date(year, month-1, 1);
	//月初曜日
	var begginingWeekDay = begginingMonth.getDay();
	//月末
	var endMonth = new Date(year, month, 0);
	var endMonthDate = endMonth.getDate();
	
	//既にカレンダーに日付が表示されている場合は一度消去
	var rowsCount = $(".calendar-table")[0].rows.length;
	if(rowsCount > 1) {
		for(var i = 0; i < rowsCount-1; i++) {
			$(".calendar-table")[0].deleteRow(1);
		}
	}
	
	//月初の曜日まで日付を非表示にするフラグ
	var monthStartFlug = 0;
	//日付カウント
	var dateCount = 1;
	
	//カレンダー表示
	var j = 0;
	while(j == 0){
		var weekRow = $(".calendar-table")[0].insertRow(-1);
		for(var k = 0; k < 7; k++) {
			var dayCell = weekRow.insertCell(-1);
			//月初の曜日から月末まで日付を表示する
			if(begginingWeekDay > monthStartFlug) {
				//カレンダーセルにdateのIDを設定
				dayCell.setAttribute("id","date");
				monthStartFlug++;
			} else if(dateCount != (endMonthDate + 1)) {
				//カレンダーセルにactive-dateクラスとdate_yyyymmddのIDを設定
				dayCell.setAttribute("class","active-date");
				dayCell.setAttribute("id","date-" + year + "-" + ("0" + month).slice(-2) + "-" + ("0" + dateCount).slice(-2));
				
				//背景色を白に設定
				dayCell.style.backgroundColor = "white";
				//日付を表示
				dayCell.innerHTML = '<span>' + dateCount + '</span>';
				
				
				dayCell.onclick = function(){
					//セルが白くなかったらフラグを立てる
					var colorFlg = 0;
					if($('#'+this.id).css("background-color") != "rgb(255, 255, 255)"){
						colorFlg = 1;
					}
					
					//active-dateクラスのセルをすべて白くする
					for (var l = 0; l < $(".active-date").length; l++){
						$(".active-date").eq(l).css("background-color" , "white");
					}
					
					//schedule-view-main要素をシンプルな変数に代入
					var elemScheView = document.getElementsByClassName("schedule-view-main")[0];
					//フラグが立っていない場合（セルが白い場合）
					if(colorFlg == 0){
						//セルの背景色を#c7c8fcに変更
						$('#'+this.id).css("backgroundColor" , "#c7c8fc");
						//schedule-view-mainを白く
						$(".schedule-view-main").css("backgroundColor" , "white");
						
						//schedule-view-main内の表示をすべて削除
						$(".schedule-view-main").empty();
						
						//スケジュール表示
						showSchedule(this.id);
					} else {
						//schedule-view-mainをグレーアウト
						$(".schedule-view-main").css("backgroundColor" , "#b8b8b8");
						
						//schedule-view-main内の表示をすべて削除
						$(".schedule-view-main").empty();
					}
				}
				
				dateCount++;
			} else {
				//カレンダーセルにdateクラスを設定
				dayCell.setAttribute("id","date");
			}
		}
		if(dateCount == (endMonthDate + 1)) {
			j = 1;
		}
	}
}

var today = new Date();
//デフォルト年月表示（今月）
var year = today.getFullYear();
var month = today.getMonth()+1;
viewMonth(year, month);

//カレンダー表示
viewTable(year, month);