(function($){
$.extend({
ms_DatePicker: function (options) {
            var defaults = {
                YearSelector: "#sel_year",
                MonthSelector: "#sel_month",
                DaySelector: "#sel_day",
                FirstText: "--",
                FirstValue: 0
            };
            var opts = $.extend({}, defaults, options);
            var $YearSelector = $(opts.YearSelector);
            var $MonthSelector = $(opts.MonthSelector);
            var $DaySelector = $(opts.DaySelector);
            var FirstText = opts.FirstText;
            var FirstValue = opts.FirstValue;

            // 初始化
            var str = "<option value=\"" + FirstValue + "\">" + FirstText + "</option>";
            $YearSelector.html(str);
            $MonthSelector.html(str);
            $DaySelector.html(str);

            // 年份列表
            var yearNow = new Date().getFullYear();
			var yearSel = $YearSelector.attr("rel");
            for (var i = yearNow; i >= 1900; i--) {
				var sed = yearSel==i?"selected":"";
				var yearStr = "<option value=\"" + i + "\" " + sed+">" + i + "</option>";
                $YearSelector.append(yearStr);
            }

            // 月份列表
			var monthSel = $MonthSelector.attr("rel");
            for (var i = 1; i <= 12; i++) {
				var sed = monthSel==i?"selected":"";
                var monthStr = "<option value=\"" + i + "\" "+sed+">" + i + "</option>";
                $MonthSelector.append(monthStr);
            }

            // 日列表(仅当选择了年月)
            function BuildDay() {
                if ($YearSelector.val() == 0 || $MonthSelector.val() == 0) {
                    // 未选择年份或者月份
                    $DaySelector.html(str);
                } else {
                    $DaySelector.html(str);
                    var year = parseInt($YearSelector.val());
                    var month = parseInt($MonthSelector.val());
                    var dayCount = 0;
                    switch (month) {
                        case 1:
                        case 3:
                        case 5:
                        case 7:
                        case 8:
                        case 10:
                        case 12:
                            dayCount = 31;
                            break;
                        case 4:
                        case 6:
                        case 9:
                        case 11:
                            dayCount = 30;
                            break;
                        case 2:
                            dayCount = 28;
                            if ((year % 4 == 0) && (year % 100 != 0) || (year % 400 == 0)) {
                                dayCount = 29;
                            }
                            break;
                        default:
                            break;
                    }

					var daySel = $DaySelector.attr("rel");
                    for (var i = 1; i <= dayCount; i++) {
						var sed = daySel==i?"selected":"";
						var dayStr = "<option value=\"" + i + "\" "+sed+">" + i + "</option>";
                        $DaySelector.append(dayStr);
                    }
                }
            }
            $MonthSelector.change(function () {
                BuildDay();
            });
            $YearSelector.change(function () {
                BuildDay();
            });
			if($DaySelector.attr("rel")!=""){
				BuildDay();
			}
        } // End ms_DatePicker
});
})(jQuery);

//生日选择框,动态效果
var birSelect = document.getElementById('getbirthday_box')
var subBir = document.getElementById("subBir")
document.body.addEventListener('click',function(event){
	if(event.target==document.getElementById('getbirthday')||event.target==birSelect
	||birSelect.contains(event.target)==true)
	{
		birSelect.style.zIndex='99'
		subBir.style.zIndex='99'
	}
	else{
		birSelect.style.zIndex='-99'
		subBir.style.zIndex='-99'
	}
})

//create Eelement Select
$(function () {
	$.ms_DatePicker({
            YearSelector: ".sel_year",
            MonthSelector: ".sel_month",
            DaySelector: ".sel_day"
    });
	$.ms_DatePicker();
	autoAge()

});

//get select value
function autoAge(){
	subBir.addEventListener('click',function(){
		var options=$("#sel_year option:selected")
		var year = options.val()
		var options=$("#sel_month option:selected")
		var month = options.val()
		var options=$("#sel_day option:selected")
		var day = options.val()
		showAge(year,month,day)
	})
}
//确定按钮,提交生日,change the birthday and age
function showAge(year,month,day){
    let str = `${year}-${month}-${day}`
	inputObj.birthday.value= str

    let event = new Event('input');
    inputObj.birthday.dispatchEvent(event);

	let s = new Date()
    let age = 0
	if((s.getMonth()+1)>month){
        age=s.getFullYear()-year
    }
	else if(s.getDate()>day){
        age=s.getFullYear()-year
	}
	else{
        age=s.getFullYear()-year-1
	}
	inputObj.age.value=age

    let event1 = new Event('input');
    inputObj.age.dispatchEvent(event1);
}
