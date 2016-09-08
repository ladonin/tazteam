<?php

$str = "wsfsf567dsfgsdn";


var_dump(preg_match("#567#xi", $str));

/*





				ini_set("max_execution_time", "6000");			
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
		mysql_connect("localhost","giftboard","lExe4urIpuSE");
		mysql_select_db("tazteamDB");	








//улучшить качество загруженных изображений scroll
	function load_image($src, $out, $width, $height, $color = 0xffffff, $quality = 100)//$color = 0x23232a, $quality = 100 со временем убрать из заголовка
	{   
		$color = 0xffffff;
		$quality = 100;
		if (!file_exists($src)) 	{        return false;      }    // Если файл не существует 
		$size = getimagesize($src);// Получаем массив с информацией о размере и формате картинки (mime)
		$format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));// Исходя из формата (mime) картинки, узнаем с каким форматом имеем дело	
		$picfunc = 'imagecreatefrom'.$format; //и какую функцию использовать для ее создания
		$picsrc  = $picfunc($src);
		$picout = imagecreatetruecolor($width, $height);// Создание изображения в памяти
		imagefill($picout, 0, 0, $color); // Заполнение цветом
		imagecopyresampled($picout, $picsrc, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);  // Нанесение старого на новое
		imagejpeg($picout, $out, $quality);// Создание файла изображения
		imagedestroy($picsrc);// Очистка памяти
		imagedestroy($picout);// Очистка памяти
		return true;
	}

$query = "SELECT * FROM photo___photos_2 limit 1,100";
$res = mysql_query($query) or die(mysql_error());
while ($row=mysql_fetch_array($res))
{echo($row['img']."<br>");
	$fotobig='_files/images/photo/2/'.$row['id_topic']."/".$row['id_photo']."_1".$row['format_photo'];

	$foto='_files/images/photo/2/'.$row['id_topic']."/".$row['id_photo']."_11".$row['format_photo'];	

	load_image($fotobig, $foto, 320, 240, $color = 0xffffff, $quality = 100);//меняем 



}

*/