<?php 
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require("../../../../data/models/_general/MySQL.php");
require("../../../../data/models/_general/Security.php");
#require("../../../../data/models/_general/UserName.php");
require("../../../../data/models/_general/GlobalVars.php");//библиотека глобальных переменных сервера
require("../../../../data/models/_general/Cookies.php");//базовая библиотека работы с куками - тут нужна, только, чтобы не было ошибки - она используется в GetVars
//require("../../../../data/models/_general/Date.php");
require("../../../../data/models/users/MyData.php");//базовая библиотека работы с Вами
require("../../../../data/models/users/Base.php");
require("../../../../data/models/_general/Vote.php");
#require("../../../../data/models/_general/Directories.php");//функции для определения директории и работы с директориями, а также определение номера таблицы в базе данных
#require("../../../../data/models/_general/PageBasic.php");
require("../../../../data/models/_general/GetVars.php");//тут нужна, только, чтобы не было ошибки - она используется в GlobalVars


$MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root
//mysqli_query($MSQLc,'SET NAMES UTF8');//на время
//GeneralGetVars::revision($MSQLc);
GeneralGlobalVars::set();//устанавливаем глобальные переменные
UsersMyData::identification($MSQLc);//определяем нас

if (UsersMyData::$identified==1){//только для идентифицированных
	$rank=GeneralSecurity::tonumber($_POST['rank']);
	$polar=GeneralSecurity::tonumber($_POST['polar']);
	$getvar1=GeneralSecurity::real_escape($MSQLc,$_POST['getvar1']);
	$getvar2=GeneralSecurity::real_escape($MSQLc,$_POST['getvar2']);
	$getvar3=GeneralSecurity::real_escape($MSQLc,$_POST['getvar3']);
	$getvar4=GeneralSecurity::real_escape($MSQLc,$_POST['getvar4']);
	$getnumpage=GeneralSecurity::tonumber($_POST['getnumpage']);
	$idphoto=GeneralSecurity::tonumber($_POST['idphoto']);
	$abrev_page=GeneralSecurity::real_escape($MSQLc,$_POST['abrev_page']);		
	

	
	
	
	
	
//	новости ne 10000 1000000
//	объявления am 10000 1000000
//	форум3 fm 10000 1000000
//	галерея ga 10000 1000000 10000
//	видео vi  10000 1000000
//	личные сообщения sm 10000000000 10000000000
//	форум2 ft 10000
//	сообщения под личными фотоальбомами sf 10000000000 10000 1000000
	
	if ($abrev_page=="ga"){//галерея
		if ($polar>0){
			include("vote_ga_plus_ajax___query_1.php");}
		else if (($polar<0)&&($rank>0)){
			include("vote_ga_minus_ajax___query_1.php");}}
			
			
	else if ($abrev_page=="sf"){//сообщения под личными фотоальбомами
		if ($polar>0){
			include("vote_sf_plus_ajax___query_1.php");}
		else if (($polar<0)&&($rank>0)){
			include("vote_sf_minus_ajax___query_1.php");}}			
			
}
?>