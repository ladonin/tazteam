<?php
ini_set("max_execution_time", "60000");			
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
     mysql_pconnect("localhost","quitecorg_taz","d5nj8n3umfvguj");
mysql_select_db("tazteamDB");	



$url="../";

require($url."data/models/_general/ImagesWork.php");
require($url."data/models/_general/ImagesCalculate.php");


$query = "SELECT * FROM photo___photos_2";
$res = mysql_query($query) or die(mysql_error());
while ($row=mysql_fetch_array($res))
{
	
	$source=$url.'_files/images/photo/2/'.$row['id_topic']."/".$row['id_photo']."_1.".$row['format_photo'];

		$imageinfo = getimagesize($source);
		if (($imageinfo[0]>0)&&(filesize($source)>0)){
			$width_source=$imageinfo[0];//ширина исходника
			$height_source=$imageinfo[1];//высота исходника
			$i=$row['id_photo'];
			foreach (GeneralImagesCalculate::$imagessizes_photo as $key => $value){
				$square=$value['square'];
				$limit=$value['limit'];		
				$path_to=$url."_files/images/photo/2/".$row['id_topic']."/".$i."_".$key.".".$row['format_photo'];
				
				if(((filesize($path_to)==0)||(!file_exists($path_to)))&&
				(($key==11)||($key==12)||($key==13)))
				
				
				{
				echo($path_to."<br>");
				
				
					GeneralImagesCalculate::detect_xywh($i,$key,$square,$width_source,$height_source,$limit,1);//определение ширины, высоты и координат текущей копии
					GeneralImagesWork::resize_and_save(
						$source,
						$path_to,
						GeneralImagesWork::$imagesdestination['width_source'][$i][$key],
						GeneralImagesWork::$imagesdestination['height_source'][$i][$key],
						$row['format_photo'],
						GeneralImagesWork::$imagesdestination['x_source'][$i][$key],
						GeneralImagesWork::$imagesdestination['y_source'][$i][$key],
						GeneralImagesWork::$imagesdestination['width'][$i][$key],
						GeneralImagesWork::$imagesdestination['height'][$i][$key],
						GeneralImagesWork::$imagesdestination['x'][$i][$key],
						GeneralImagesWork::$imagesdestination['y'][$i][$key],
						100,
						'0xffffff');
						
						
						}}}}
















//можно удалить отдельные виды фоток
/*
$url="D:\\my\\openserver\\OpenServer\\domains\\instorage.org/portfolio/tazteam\\";
$photo_number=11;
$query = "SELECT * FROM photo___photos_2";
$res = mysql_query($query) or die(mysql_error());
while ($row=mysql_fetch_array($res))
{
	echo $foto."<br>";	
	$foto=$url.'_files/images/photo/2/'.$row['id_topic']."/".$row['id_photo']."_".$photo_number.".".$row['format_photo'];
	unlink($foto);
}
*/


