<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Карта сайта</title>
<link rel="icon" href="http://mapstore.org/my_portfolio/tazteam.net/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://mapstore.org/my_portfolio/tazteam.net/favicon.ico" type="image/x-icon">
<link rel="icon" href="" type="image/x-icon">
<link rel="shortcut icon" href="" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="http://mapstore.org/my_portfolio/tazteam.net/css/_general/carcas.css">
<link rel="stylesheet" type="text/css" href="http://mapstore.org/my_portfolio/tazteam.net/css/_general/text.css">
</head>

<body style="padding:20px;"><?php
	ini_set('display_errors', 1); /////////////////////////////
	error_reporting(E_ALL);
$hostname = "localhost";
$username = "root";
$passwordSQL = "d5nj8n3umfvguj";
$dbName = "tazteamDB";
mysql_connect($hostname,$username,$passwordSQL) OR DIE("Не могу создать соединение ");
mysql_select_db($dbName) or die(mysql_error());

mysql_query('SET NAMES UTF8');//на время

?>
<a href="http://mapstore.org/my_portfolio/tazteam.net"><b>Главная</b></a><br>




<a href="http://mapstore.org/my_portfolio/tazteam.net/news"><strong>Новости</strong></a><br>
<?php


$res=mysql_query("SELECT id,name FROM news where themepage='1' order by id DESC limit 20"); 	
while ($row=mysql_fetch_array($res)) 
{
?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/news/<?php echo($row['id']);?>"><?php echo($row['name']);?></a><br>
<?php

}






?>

</body>
</html>