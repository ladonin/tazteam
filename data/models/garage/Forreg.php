<?php

include("data/models/automarket/Forreg.php"); 



class GarageForreg extends AutomarketForreg{




























static public function return_imagesnames_from_DB($MSQLc){//выводим имена загруженных в БД изображений
	if (GeneralGetVars::$var3) {$id=GeneralGetVars::$var3;}
	else if (GeneralGetVars::$num_page) {$id=GeneralGetVars::$num_page;}
	$query="SELECT img FROM garage WHERE id='".$id."' AND themepage='".GeneralGetVars::$var2."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);		
	return $row['img'];}

static public function return_imagessizes_from_DB($MSQLc){//выводим размеры загруженных в БД изображений
	if (GeneralGetVars::$var3) {$id=GeneralGetVars::$var3;}
	else if (GeneralGetVars::$num_page) {$id=GeneralGetVars::$num_page;}
	$query="SELECT img_sizes FROM garage WHERE id='".$id."' AND themepage='".GeneralGetVars::$var2."' LIMIT 1";	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);		
	return $row['img_sizes'];}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


static public function detect_autor($MSQLc){//определяем автора темы
	if (GeneralGetVars::$var3) {$id=GeneralGetVars::$var3;}
	else if (GeneralGetVars::$num_page) {$id=GeneralGetVars::$num_page;}
	$query="SELECT id_user FROM garage WHERE id='".$id."' AND themepage='".GeneralGetVars::$var2."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	GarageBase::$id_autor=$row['id_user'];}


static public function detect_belong_announcement_to_user(){//проверяем принадлежность темы к пользователю
	if (UsersMyData::$id==GarageBase::$id_autor){return true;}//если мы - автор
	if (GeneralSecurity::detect_administrator()==true) {return true;}//если мы - администратор
	return false;}





























}
?>
