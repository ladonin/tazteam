<?php 
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require("../../../../data/models/_general/GetVars.php");//проверка входящих GET-переменных
require("../../../../data/models/_general/MySQL.php");
require("../../../../data/models/_general/Cookies.php");//базовая библиотека работы с куками
require("../../../../data/models/users/MyData.php");//базовая библиотека работы с Вами
include("../../../../data/models/users/Signaturing.php");//базовая библиотека работы с оповещениями
require("../../../../data/models/_general/Security.php");
require("../../../../data/models/_general/GlobalVars.php");//библиотека глобальных переменных сервера
//require("../../../../data/models/_general/DialogWindows.php");
//require("../../../../data/models/_general/Directories.php");//функции для определения директории и работы с директориями, а также определение номера таблицы в базе данных

GeneralGlobalVars::set();//устанавливаем глобальные переменные
$MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root
mysqli_query($MSQLc,'SET NAMES UTF8');//на время
GeneralGetVars::revision($MSQLc);
UsersMyData::identification($MSQLc);//определяем нас

if (UsersMyData::$identified==1){//только для идентифицированных
	include("../../../../data/components/users/signatures/signatures_detect_ajax___query_1.php");
	$row=GeneralMYSQL::fetch_array($res);
	echo($row['asks_forum'].";".$row['other_news']);}
?>