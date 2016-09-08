<?php
$start=microtime(1);//для проверки скорости//////////////////////////////////////
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require("data/models/_general/GetVars.php");//проверка входящих GET-переменных
require("data/models/_general/GlobalVars.php");//библиотека глобальных переменных сервера
require("data/models/_general/MySQL.php");//функции и глобальные переменные MySQL
//require("data/models/_general/PageBasic.php");//базовая библиотека для работы внешне со страницей
require("data/models/_general/Security.php");//базовая библиотека работы с введенными данными
//require("data/models/_general/Cookies.php");//базовая библиотека работы с куками
//require("data/models/_general/UserName.php");//показывает имена пользоватетелей (работает быстрее sql-функции в 4 раза)
require("data/models/users/MyData.php");//базовая библиотека работы с Вами
//include("data/models/users/Signaturing.php");//базовая библиотека работы с оповещениями
require("data/models/_general/HeaderHTTP.php");//базовая библиотека работы с заголовками http
require("data/models/_general/PageTree.php");//проверка на существование страницы и в случае существования - определение "дерева" нахождения страницы
require("data/models/_general/UploadBasic.php");//базовая библиотека работы с загружаемыми файлами
//require("data/models/_general/PagesCounter.php");





include("data/models/automarket/Base.php");
include("data/models/automarket/Forreg.php");
include("data/models/automarket/SendTopic.php");
//include("data/models/_general/ImagesUpload.php");
include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
//include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
include("data/models/_general/Files.php");//базовая библиотека работы с файлами		






	
$MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root
//mysqli_query($MSQLc,'SET NAMES UTF8');//на время



$time=time()-2678400;//1 месяц


	
$query="SELECT id,themepage,id_user FROM automarket WHERE date_create<='$time'";
	$res=GeneralMYSQL::query($MSQLc,$query);
	while ($row=GeneralMYSQL::fetch_array($res)){
		GeneralGetVars::$var1="automarket";
		GeneralGetVars::$var2=$row['themepage'];
		GeneralGetVars::$var3=$row['id'];
		UsersMyData::$id=$row['id_user'];	
		AutomarketSendTopic::delete_announcement($MSQLc);}
?>

	






