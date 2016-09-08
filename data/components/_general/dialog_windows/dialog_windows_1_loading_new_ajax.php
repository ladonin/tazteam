<?php 
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require("../../../../data/models/_general/MySQL.php");
require("../../../../data/models/_general/Security.php");
require("../../../../data/models/_general/UserName.php");
require("../../../../data/models/_general/GlobalVars.php");//библиотека глобальных переменных сервера
require("../../../../data/models/_general/Cookies.php");//базовая библиотека работы с куками - тут нужна, только, чтобы не было ошибки - она используется в GetVars
//require("../../../../data/models/_general/Date.php");
require("../../../../data/models/users/MyData.php");//базовая библиотека работы с Вами
require("../../../../data/models/users/Base.php");
require("../../../../data/models/_general/DialogWindows.php");
require("../../../../data/models/_general/Directories.php");//функции для определения директории и работы с директориями, а также определение номера таблицы в базе данных
require("../../../../data/models/_general/PageBasic.php");
require("../../../../data/models/_general/GetVars.php");//тут нужна, только, чтобы не было ошибки - она используется в GlobalVars
require("../../../../data/models/_general/InputText.php");

$MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root
//mysql_query('SET NAMES UTF8');//на время
GeneralGetVars::revision($MSQLc);
GeneralGlobalVars::set();//устанавливаем глобальные переменные
$condition1=GeneralSecurity::real_escape($MSQLc,$_POST['condition1']);//условия выборки
$condition2=GeneralSecurity::real_escape($MSQLc,$_POST['condition2']);//условия выборки
$condition3=GeneralSecurity::real_escape($MSQLc,$_POST['condition3']);//условия выборки
$condition4=GeneralSecurity::real_escape($MSQLc,$_POST['condition4']);//условия выборки
$condition5=GeneralSecurity::real_escape($MSQLc,$_POST['condition5']);//условия выборки
$time_on_user_comp=GeneralSecurity::real_escape($MSQLc,$_POST['time_on_user_comp']);//время у пользователя на компьютере
$timeserver=GeneralGlobalVars::$timeunix;
//$width=GeneralSecurity::real_escape($MSQLc,$_POST['width']);//ширина сообщений
$newmess=GeneralSecurity::real_escape($MSQLc,$_POST['newmess']);//начало
$database=GeneralSecurity::real_escape($MSQLc,$_POST['database']);
GeneralInputText::$id=GeneralSecurity::real_escape($MSQLc,$_POST['id_dialog']);





//GeneralDialogWindows::$width=$width;

UsersMyData::tiny_identification();

include("dialog_windows_1_loading_new_ajax___query_1.php");
$dialog_windows_1_num_rows=GeneralMYSQL::num_rows($res);
if($dialog_windows_1_num_rows>=1){
	GeneralMYSQL::free($res);	
	include("dialog_windows_1_loading_new_ajax___query_2.php");		
	while ($dialog_windows_1_row=GeneralMYSQL::fetch_array($res2)){
		$newmess=$dialog_windows_1_row['id_message'];
		/*<b><?php echo($dialog_windows_1_row['id_message']);?></b>*/
		include("dialog_windows_1___message.php");}
	GeneralMYSQL::free($res2);		
	echo("<!--".($newmess+1)."-->");}
?>