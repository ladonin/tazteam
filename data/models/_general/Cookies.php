<?php
class GeneralCookies{


static public $status_global_set=0; //статус, что куки обновились и нужно перезагрузить страницу


static function setglobal($var,$value)
{		
		//$backtrace = debug_backtrace();	/*отладка*/
		//echo ("Класс: <b>".$backtrace[1]['class']."</b><br>Вызывающая функция: <b>".$backtrace[1]['function']."</b><br>Номер строки:<b>".$backtrace[0]['line']."</b>");

	SetCookie($var,$value, GeneralGlobalVars::$timeunix+360000,"/portfolio/tazteam","instorage.org");
	$_COOKIE[$var]=$value;
}

/*
static function revision_int($var){//проверка куки и, если её нет, создание с 'none' значением - есть, но не имеет значения
	if (!isset($_COOKIE[$var])){
		self::setglobal($var,'none');}}
	
static function set_all_generalcookies(){
	foreach(GeneralGlobalVars::$automarket_array_data as $key=>$value){//параметры авторынка		
		self::revision($key);}
			
	self::setglobal('cookiesgenertal_status','ok');//статус проверки куков - ок
	GeneralCookies::$status_global_set=1;
}		
			
static function set_all_cookies(){//проверка куков доступных всем пользователям - если куков нет, то создание и перезагрузка

	//общие куки
	if (!isset($_COOKIE['cookiesgenertal_status'])){
		self::set_all_generalcookies();}
	else if ($_COOKIE['cookiesgenertal_status']!="ok"){
		self::set_all_generalcookies();}	
	
		
	if (UsersMyData::$identified==1){//для зарегистристрированных пользователей - дополнительные куки
	}

	if (GeneralCookies::$status_global_set==1){//echo(111);
		GeneralHeaderHTTP::location(GeneralGlobalVars::$urlself);
	}}
*/
}
?>