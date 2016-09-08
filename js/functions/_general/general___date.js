var timeserver;//время timeunix на сервере
function general___date_month_text_show(month)
{
	if (month==0) {return "января";}
	else if (month==1) {return "февраля";}
	else if (month==2) {return "марта";}
	else if (month==3) {return "апреля";}
	else if (month==4) {return "мая";}
	else if (month==5) {return "июня";}
	else if (month==6) {return "июля";}
	else if (month==7) {return "августа";}
	else if (month==8) {return "сентября";}
	else if (month==9) {return "октября";}
	else if (month==10) {return "ноября";}
	else if (month==11) {return "декабря";}
}
function general___date_year_show(year_real,year_comp)
{
	if (year_comp!=year_real) {return " "+year_real+" г.";}
	else {return "";}
}
function general___date_convert_minute(minute)
{
	if (minute<10) {return "0"+minute;}
	else {return minute;}
}
function general___date_revision_for_today(day_real,month_real,year_real,day_comp,month_comp,year_comp)
{
	if ((day_comp==day_real)&&(month_comp==month_real)&&(year_comp==year_real)) {return "сегодня";}
	else {return day_real+" "+general___date_month_text_show(month_real);}	
}
function general___date_DMYvHM_show(time_to_convert,id)//показывем время в формате D.M.Y в H:Mс поправкой по часовому поясу
{
	var date_on_user_comp = new Date();
	var time_difference=Math.round((date_on_user_comp.getTime()/1000))-timeserver;
	var time_real=time_to_convert+time_difference;
	var date_real = new Date(time_real*1000);
	var date_to_show=general___date_revision_for_today(date_real.getDate(),date_real.getMonth(),date_real.getFullYear(),date_on_user_comp.getDate(),date_on_user_comp.getMonth(),date_on_user_comp.getFullYear())+general___date_year_show(date_real.getFullYear(),date_on_user_comp.getFullYear())+" в "+date_real.getHours()+":"+general___date_convert_minute(date_real.getMinutes());
	document.getElementById(id).innerHTML=date_to_show;
}


function general___date_DMY_show(time_to_convert,id)//показывем время в формате D.M.Y в H:Mс поправкой по часовому поясу
{
	var date_on_user_comp = new Date();
	var time_difference=Math.round((date_on_user_comp.getTime()/1000))-timeserver;
	var time_real=time_to_convert+time_difference;
	var date_real = new Date(time_real*1000);
	var date_to_show=general___date_revision_for_today(date_real.getDate(),date_real.getMonth(),date_real.getFullYear(),date_on_user_comp.getDate(),date_on_user_comp.getMonth(),date_on_user_comp.getFullYear())+general___date_year_show(date_real.getFullYear(),date_on_user_comp.getFullYear());
	document.getElementById(id).innerHTML=date_to_show;
}