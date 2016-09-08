<?php

$start=microtime(1);//для проверки скорости//////////////////////////////////////




// Подключаем класс вывода PEAR::Cache_Lite
//require_once 'Cache/Lite/Output.php'; 

// Определяем настройки для Cache_Lite 
$options = array( 
 'cacheDir'        => 'cache/', 
 'writeControl'    => 'true', 
 'readControl'     => 'true', 
 'readControlType' => 'md5' 
); 

// Создаем объект класса Cache_Lite_Output 
$cache = new Cache_Lite_Output($options);







// Устанавливаем время жизни кэша для данной части 
$cache->setLifeTime(604800); 

// Начинаем буферизацию для участка с именем header
// и помещаем его в группу Static
if (!$cache->start('header', 'Static')) {
 ?> 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
 <html xmlns="http://www.w3.org/1999/xhtml"> 
 <head> 
 <title> PEAR::Cache_Lite пример</title> 
 <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /> 
 </head> 
 <body> 
 <h2>PEAR::Cache_Lite пример</h2> 
 Время создания заголовка: <?php echo date('H:i:s'); ?><br /> 
 <?php 
 // Останавливаем буферизацию и пишем буфер в файл
 $cache->end(); 
}
else {echo(111);}


$cache->setLifeTime(5); 
if (!$cache->start('body', 'Dynamic')) { 
 echo 'Время создания тела: ' . date('H:i:s') . '
'; 
 $cache->end(); 
} 

$cache->setLifeTime(604800); 
if (!$cache->start('footer', 'Static')) { 
 ?> 

 Время создания нижней части: <?php echo date('H:i:s'); ?>
 
  
  
 <?php 
 $cache->end(); 
} 
?>














?> <B><?PHP echo (round((microtime(1)-$start), 5)); ?></B> <?php 





  ?>