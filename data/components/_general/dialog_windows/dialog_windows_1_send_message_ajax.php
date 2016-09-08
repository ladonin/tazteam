<?php 
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require("../../../../data/models/_general/GetVars.php");//проверка входящих GET-переменных
require("../../../../data/models/_general/MySQL.php");
require("../../../../data/models/_general/Cookies.php");//базовая библиотека работы с куками
require("../../../../data/models/users/MyData.php");//базовая библиотека работы с Вами
include("../../../../data/models/users/Signaturing.php");//базовая библиотека работы с оповещениями
require("../../../../data/models/users/Forreg.php");
require("../../../../data/models/_general/Security.php");
require("../../../../data/models/_general/GlobalVars.php");//библиотека глобальных переменных сервера
require("../../../../data/models/_general/DialogWindows.php");
require("../../../../data/models/_general/Directories.php");//функции для определения директории и работы с директориями, а также определение номера таблицы в базе данных
require("../../../../data/models/_general/PageBasic.php");

if ($_POST['getvar1']=="photo"){
	require("../../../../data/models/photo/Base.php");}

GeneralGlobalVars::set();//устанавливаем глобальные переменные
$MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root
//mysqli_query($MSQLc,'SET NAMES UTF8');//на время
GeneralGetVars::revision($MSQLc);
UsersMyData::identification($MSQLc);//определяем нас

	$getvar1=GeneralSecurity::real_escape($MSQLc,$_POST['getvar1']);	
	$getvar2=GeneralSecurity::real_escape($MSQLc,$_POST['getvar2']);	
	$getvar3=GeneralSecurity::real_escape($MSQLc,$_POST['getvar3']);	
	$getvar4=GeneralSecurity::real_escape($MSQLc,$_POST['getvar4']);
  
if ((UsersMyData::$identified==1)||(GeneralDialogWindows::return_privacy($getvar1)==2)){//только для идентифицированных или особые страницы
	$text=GeneralSecurity::real_escape($MSQLc,$_POST['text']);
	$database=GeneralSecurity::real_escape($MSQLc,$_POST['database']);
	$autor=GeneralSecurity::tonumber($_POST['autor']);//какую value делаем автором
	$time=GeneralSecurity::tonumber($_POST['time']);//какую value делаем временем создания сообщения
	$textvalue=GeneralSecurity::tonumber($_POST['textvalue']);//где будет текст
	$valuesnumber=GeneralSecurity::tonumber($_POST['valuesnumber']);//сколько value делаем
	$idmessage=GeneralSecurity::tonumber($_POST['idmessage']);//где будет номер сообщения
	$condition1=GeneralSecurity::real_escape($MSQLc,$_POST['condition1']);
	$condition2=GeneralSecurity::real_escape($MSQLc,$_POST['condition2']);
	$condition3=GeneralSecurity::real_escape($MSQLc,$_POST['condition3']);
	$condition4=GeneralSecurity::real_escape($MSQLc,$_POST['condition4']);
	$condition5=GeneralSecurity::real_escape($MSQLc,$_POST['condition5']);	
	$signaturing=GeneralSecurity::real_escape($MSQLc,$_POST['signaturing']);	
	$pagetype=GeneralSecurity::tonumber($_POST['pagetype']);
	
	
	$getnumpage=GeneralSecurity::tonumber($_POST['getnumpage']);	
	$idphoto=GeneralSecurity::tonumber($_POST['idphoto']);	
	
	
	
	
	
	
	
	
	

	//экранируем присланные величины в одинарные кавычки (пример id=;union select hacker => id=';union select hacker' - защита
	if ($condition1) {$condition1=preg_replace("/(={1})(.?+)$/i","$1'$2'",$condition1);}
	if ($condition2) {$condition2=preg_replace("/(={1})(.?+)$/i","$1'$2'",$condition2);}	
	if ($condition3) {$condition3=preg_replace("/(={1})(.?+)$/i","$1'$2'",$condition3);}	
	if ($condition4) {$condition4=preg_replace("/(={1})(.?+)$/i","$1'$2'",$condition4);}	
	if ($condition5) {$condition5=preg_replace("/(={1})(.?+)$/i","$1'$2'",$condition5);}
	
	include("../../../../data/components/_general/dialog_windows/dialog_windows_1_send_message_ajax___query_1.php");//узнаем новый id сообщения
	$row=GeneralMYSQL::fetch_array($res);
	for ($i=1;$i<=$valuesnumber;$i++){
		$valuevar="value".$i;
		if ($autor==$i) {$$valuevar=UsersMyData::$id;}
		else if ($time==$i) {$$valuevar=GeneralGlobalVars::$timeunix;}	
		else if ($textvalue==$i) {$$valuevar="'".$text."'";}
		else if ($idmessage==$i) {$$valuevar=$row['id_message']+1;}		
		else {$$valuevar=GeneralSecurity::real_escape($MSQLc,$_POST[$valuevar]);}}	

	include("../../../../data/components/_general/dialog_windows/dialog_windows_1_send_message_ajax___query_2.php");	
	
	
	
	
	
	

	
	
	
	
	if ($signaturing){//может быть, что, в случае диалога, пользователь удалился из переписки
		$cv1="signaturing_".$signaturing;
		UsersSignaturing::$cv1($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);//оповещаем переписчиков
			
		$cv1="write_to_mymessages_".$signaturing;
		UsersForreg::$cv1($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);//записываем в мои сообщения
		//в случае личных сообщений просто возвращается true
	}
	
		
		
		
	
	
	if ($pagetype==1){//если это - диалог между пользователями
	//обновляем время последнего сообщения и empty=0
		$query="
		UPDATE	registrated_users___correspondence_table
		SET		date_lastupdate=".GeneralGlobalVars::$timeunix.", empty='0'
		WHERE 	id_correspondence='".$value1."'
		LIMIT 1
		";//echo($query);
		GeneralMYSQL::query_update($MSQLc,$query);
	
	
	
	
	
	
	
	
	
	}
	
	
	
	}
?>