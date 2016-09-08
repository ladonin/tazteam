<?php
$start=microtime(1);//для проверки скорости//////////////////////////////////////
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require(__DIR__."/../data/models/_general/GetVars.php");//проверка входящих GET-переменных
require(__DIR__."/../data/models/_general/GlobalVars.php");//библиотека глобальных переменных сервера
require(__DIR__."/../data/models/_general/MySQL.php");//функции и глобальные переменные MySQL
//require("data/models/_general/PageBasic.php");//базовая библиотека для работы внешне со страницей
require(__DIR__."/../data/models/_general/Security.php");//базовая библиотека работы с введенными данными
//require("data/models/_general/Cookies.php");//базовая библиотека работы с куками
//require("data/models/_general/UserName.php");//показывает имена пользоватетелей (работает быстрее sql-функции в 4 раза)
require(__DIR__."/../data/models/users/MyData.php");//базовая библиотека работы с Вами
//include("data/models/users/Signaturing.php");//базовая библиотека работы с оповещениями
require(__DIR__."/../data/models/_general/HeaderHTTP.php");//базовая библиотека работы с заголовками http
require(__DIR__."/../data/models/_general/PageTree.php");//проверка на существование страницы и в случае существования - определение "дерева" нахождения страницы
require(__DIR__."/../data/models/_general/UploadBasic.php");//базовая библиотека работы с загружаемыми файлами
//require("data/models/_general/PagesCounter.php");





include(__DIR__."/../data/models/automarket/Base.php");
include(__DIR__."/../data/models/automarket/Forreg.php");
include(__DIR__."/../data/models/automarket/SendTopic.php");
//include("data/models/_general/ImagesUpload.php");
include(__DIR__."/../data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
//include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
include(__DIR__."/../data/models/_general/Files.php");//базовая библиотека работы с файлами		




if (GeneralSecurity::is_cron()){

	
$MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root





$time=time()-3600*24*30*2;
	
	
$query="SELECT id,themepage,id_user FROM automarket WHERE date_create<='".$time."'";
	$res=GeneralMYSQL::query($MSQLc,$query);
    
    
	while ($row=GeneralMYSQL::fetch_array($res)){print_r($row);
		GeneralGetVars::$var1="automarket";
		GeneralGetVars::$var2=$row['themepage'];
		GeneralGetVars::$var3=$row['id'];
		UsersMyData::$id=$row['id_user'];	
		AutomarketSendTopic::delete_announcement($MSQLc);
        
        }
}
?>

	






