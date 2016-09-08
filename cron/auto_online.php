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
     	

    if ((date('G')<=2))
    {
        $limit=rand(5,50);
    }
    else if ((date('G')>2)&&(date('G')<8))
    {
        $limit=rand(1,10);
    }
    else if ((date('G')>=8)&&(date('G')<10))
    {
        $limit=rand(10,40);
    }
    else if ((date('G')>=10)&&(date('G')<17))
    {
        $limit=rand(10,70);
    }  
    else if ((date('G')>=17)&&(date('G')<=23))
    {
        $limit=rand(30,100);
    }      
    else{
        $limit=rand(5,100);  
    }
    
    
    
    
    

    $query="update registrated_users___main_data set gen_timecoming='".time()."' where gen_photo=1 ORDER BY RAND() LIMIT ".$limit;
    GeneralMYSQL::query($MSQLc,$query);
}

?>