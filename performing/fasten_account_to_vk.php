<?php
$start=microtime(1);//для проверки скорости//////////////////////////////////////
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require("../data/models/_general/MySQL.php");//функции и глобальные переменные MySQL
require("../data/models/users/Authorization.php");//базовая библиотека работы с незарегистрированными пользователями
require("../data/models/users/MyData.php");//базовая библиотека работы с Вами
require("../data/models/_general/UserName.php");//показывает имена пользоватетелей (работает быстрее sql-функции в 4 раза)
require("../data/models/_general/HeaderHTTP.php");//базовая библиотека работы с заголовками http
require("../data/models/_general/Cookies.php");//базовая библиотека работы с куками
require("../data/models/_general/GetVars.php");//библиотека глобальных переменных сервера
require("../data/models/_general/GlobalVars.php");//библиотека глобальных переменных сервера
require("../data/models/_general/Security.php");
require("../data/models/_general/PageBasic.php");
require("../data/models/users/Base.php");
require("../data/models/_general/Robot.php");//автоработы




GeneralGlobalVars::set();//устанавливаем глобальные переменные
$MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root
//mysqli_query($MSQLc,'SET NAMES UTF8');//на время




UsersMyData::identification($MSQLc);//предварительно проверяем - кто отправил запрос зарегистр пользователь или нет
if (UsersMyData::$identified==1){//только для идентифицированных	
	UsersAuthorization::fasten_account_to_vk($MSQLc);
	GeneralMYSQL::close($MSQLc);}
else{
GeneralHeaderHTTP::location(GeneralPageBasic::return_url_current_page());}

?>
