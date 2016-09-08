<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Участники сайта</title>
<link rel="icon" href="<?php echo(GeneralGlobalVars::url);?>/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo(GeneralGlobalVars::url);?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="" type="image/x-icon">
<link rel="shortcut icon" href="" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?php echo(GeneralGlobalVars::url);?>/css/_general/carcas.css">
<link rel="stylesheet" type="text/css" href="<?php echo(GeneralGlobalVars::url);?>/css/_general/text.css">
</head>

<body style="padding:20px;">








<?php
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
<a href="<?php echo(GeneralGlobalVars::url);?>"><b>Главная</b></a><br>
<?php
?>
<a href="<?php echo(GeneralGlobalVars::url);?>/users"><strong>Участники</strong></a><br>
<?php
$res=mysql_query("SELECT id_user FROM registrated_users___main_data order by id_user");
while ($row=mysql_fetch_array($res))
{
?>
<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($row['id_user']);?>">участник <?php echo($row['id_user']);?></a><br>
<?php
}


?>
<a href="<?php echo(GeneralGlobalVars::url);?>/users"><strong>Фотоальбомы</strong></a><br>
<?php
$res=mysql_query("SELECT id_user,id_album,page_photo FROM registrated_users___photoalbums_photos");
while ($row=mysql_fetch_array($res)) {
	if ($row['page_photo']>0){
?>
<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($row['id_user']."/photoalbums/".$row['id_album']."=".$row['page_photo']);?>">участник <?php echo($row['id_user']);?>, альбом <?php echo($row['id_album']);?>, фото <?php echo($row['page_photo']);?></a><br>
<?php
}}
?>
</body>
</html>