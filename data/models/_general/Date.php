<?php
//php при преобразовании времени использует мировой стиль и а не наш искаженный, если мы перейдем на мировой нормальный стиль, то нужно будет 3600 убрать
class GeneralDate{


static public function date_month_text_show($month){
	if ($month==1) {return "января";}
	else if ($month==2) {return "февраля";}
	else if ($month==3) {return "марта";}
	else if ($month==4) {return "апреля";}
	else if ($month==5) {return "мая";}
	else if ($month==6) {return "июня";}
	else if ($month==7) {return "июля";}
	else if ($month==8) {return "августа";}
	else if ($month==9) {return "сентября";}
	else if ($month==10) {return "октября";}
	else if ($month==11) {return "ноября";}
	else if ($month==12) {return "декабря";}}
	
function date_year_show($year_real,$year_comp){
	if ($year_comp!=$year_real) {return " ".$year_real." г.";}
	else {return "";}}

function date_revision_for_today($day_real,$month_real,$year_real,$day_comp,$month_comp,$year_comp){
	if (($day_comp==$day_real)&&($month_comp==$month_real)&&($year_comp==$year_real)) {return "сегодня";}
	else {return $day_real." ".self::date_month_text_show($month_real);}}
	
function date_DMYvHM_show($time_to_convert,$time_on_user_comp,$timeserver){//показывем время в формате D.M.Y в H:Mс поправкой по часовому поясу
	$time_difference=$time_on_user_comp-$timeserver-3600; 
	$time_real=$time_to_convert+$time_difference;
	return self::date_revision_for_today(date("j", $time_real),date("n", $time_real),date("Y", $time_real),date("j",$time_on_user_comp),date("n", $time_on_user_comp),date("Y", $time_on_user_comp)).self::date_year_show(date("Y", $time_real),date("Y", $time_on_user_comp))." в ".date("G", $time_real).":".date("i", $time_real);
	}
	

}

?>