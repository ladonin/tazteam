<?php
$start=microtime(1);//для проверки скорости//////////////////////////////////////
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require(__DIR__."/../data/models/_general/MySQL.php");//функции и глобальные переменные MySQL
//require("data/models/_general/PageBasic.php");//базовая библиотека для работы внешне со страницей
require(__DIR__."/../data/models/_general/Security.php");//базовая библиотека работы с введенными данными
require(__DIR__."/../data/models/users/MyData.php");//базовая библиотека работы с Вами


if (GeneralSecurity::is_cron()){
    $MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root
    
    	
    $query="update registrated_users___main_data set site_points='1000'";
    GeneralMYSQL::query($MSQLc,$query);
}

?>

	











