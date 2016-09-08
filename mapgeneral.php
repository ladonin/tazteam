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
<?php

?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/forum"><strong>Форум</strong></a><br>
<?php



$res=mysql_query("SELECT id_section,name_section FROM forum___sections"); 	
while ($row=mysql_fetch_array($res)) 
{
	$id_section=$row['id_section'];
	
?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/forum/<?php echo($id_section);?>=1"><strong><?php echo($row['name_section']);?></strong></a><br>
<?php


	$query2="SELECT id_topic,name_topic FROM forum___topics_".$id_section." ORDER BY id_topic";
	$res2=mysql_query($query2); 	
	while ($row2=mysql_fetch_array($res2)) 
	{		
?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/forum/<?php echo($id_section."=".$row2['id_topic']);?>"><?php echo($row2['name_topic']);?></a><br>
<?php


	}

}









?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/photo"><strong>Галерея</strong></a><br>
<?php



$res=mysql_query("SELECT id_section,name_section FROM photo___sections"); 	
while ($row=mysql_fetch_array($res)) 
{
	$id_section=$row['id_section'];
	
?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo($id_section);?>=1"><strong><?php echo($row['name_section']);?></strong></a><br>
<?php



	$query2="SELECT id_topic,name_topic FROM photo___topics_".$id_section." ORDER BY id_topic";
	$res2=mysql_query($query2); 	
	while ($row2=mysql_fetch_array($res2)) 
	{	

?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo($id_section."/".$row2['id_topic']."/allphotos=1");?>"><?php echo($row2['name_topic']);?></a><br>


<?php
	}
	/*
	$query3="SELECT id_topic,page_photo FROM photo___photos_".$id_section;
	$res3=mysql_query($query3); 	
	while ($row3=mysql_fetch_array($res3)) 
	{		
	if ($row3['page_photo']>0){
		?>
		<a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo($id_section."/".$row3['id_topic']."=".$row3['page_photo']);?>">раздел <?php echo($id_section);?>, тема <?php echo($row3['id_topic'].", фото ".$row3['page_photo']);?> </a><br>
		<?php	
	}}*/	
}









?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/video"><strong>Видео</strong></a><br>
<?php


$res=mysql_query("SELECT id,themepage,video_name FROM video"); 	
while ($row=mysql_fetch_array($res)) 
{	
?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/video/<?php echo($row['themepage']."/".$row['id']);?>"><strong><?php echo($row['video_name']);?></strong></a><br>
<?php
}












?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/automarket"><strong>Авторынок</strong></a><br>
<?php
$res=mysql_query("SELECT id,themepage FROM automarket"); 	
while ($row=mysql_fetch_array($res)) 
{
?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/automarket/<?php echo($row['themepage']."/".$row['id']);?>">объявление <?php echo($row['id']);?></a><br>
<?php
}

















?></body>
</html>