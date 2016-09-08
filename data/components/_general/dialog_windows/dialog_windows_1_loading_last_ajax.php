<?php 
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require("../../../../data/models/_general/MySQL.php");
require("../../../../data/models/_general/Security.php");
require("../../../../data/models/_general/UserName.php");
require("../../../../data/models/_general/GlobalVars.php");//библиотека глобальных переменных сервера
require("../../../../data/models/_general/Cookies.php");//базовая библиотека работы с куками - тут нужна, только, чтобы не было ошибки - она используется в GetVars
//require("../../../../data/models/_general/Date.php");
require("../../../../data/models/_general/DialogWindows.php");
require("../../../../data/models/_general/Directories.php");//функции для определения директории и работы с директориями, а также определение номера таблицы в базе данных
require("../../../../data/models/users/Base.php");



require("../../../../data/models/_general/InputText.php");





require("../../../../data/models/_general/GetVars.php");//тут нужна, только, чтобы не было ошибки - она используется в GlobalVars
require("../../../../data/models/users/MyData.php");//базовая библиотека работы с Вами

require("../../../../data/models/_general/PageBasic.php");
$MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root
//mysqli_query($MSQLc,'SET NAMES UTF8');//на время
GeneralGetVars::revision($MSQLc);
GeneralGlobalVars::set();//устанавливаем глобальные переменные
$condition1=GeneralSecurity::real_escape($MSQLc,$_POST['condition1']);//условия выборки
$condition2=GeneralSecurity::real_escape($MSQLc,$_POST['condition2']);//условия выборки
$condition3=GeneralSecurity::real_escape($MSQLc,$_POST['condition3']);//условия выборки
$condition4=GeneralSecurity::real_escape($MSQLc,$_POST['condition4']);//условия выборки
$condition5=GeneralSecurity::real_escape($MSQLc,$_POST['condition5']);//условия выборки
$time_on_user_comp=GeneralSecurity::real_escape($MSQLc,$_POST['time_on_user_comp']);//время у пользователя на компьютере
GeneralInputText::$id=GeneralSecurity::real_escape($MSQLc,$_POST['id_dialog']);
$timeserver=GeneralGlobalVars::$timeunix;


//$width=GeneralSecurity::real_escape($MSQLc,$_POST['width']);//ширина сообщений

$N_start=GeneralSecurity::real_escape($MSQLc,$_POST['N_start']);//начало
$limit=GeneralSecurity::real_escape($MSQLc,$_POST['limit']);//конец
$database=GeneralSecurity::real_escape($MSQLc,$_POST['database']);
$start=$N_start-$limit+1; //перескакиваем назад на стартовое число и до N_start	
UsersMyData::tiny_identification();


function chat($start,$N_start){




	global $limit;	
	global $database;
	global $indexloading;
	global $MSQLc;	
	global $condition1;
	global $condition2;
	global $condition3;
	global $condition4;
	global $condition5;
	global $time_on_user_comp;
	global $timeserver;
	//global $width;
	//GeneralDialogWindows::$width=$width;
	$indexloading=0;
	//устанавливаем пределы, чтобы последние подгружаемые письма не выходили за границы нужного диапазона по idkey, 
	//если мы в этом диапазоне удаляли сообщения, 
	//то без второго условия с $N_start в конце подгрузятся сообщения, которые уже подгружались в предыдущем запросе
	include("dialog_windows_1_loaing_last_ajax___query_1.php");		
	while ($dialog_windows_1_row=GeneralMYSQL::fetch_array($res)){
		$indexloading=1;//загрузилось что-то с этого запроса
		/*<b><?php echo($dialog_windows_1_row['id_message']);?></b>*/
		include("dialog_windows_1___message.php");}
	GeneralMYSQL::free($res);	
	if ($indexloading==0){//если ничего не загрузилось
		include("dialog_windows_1_loaing_last_ajax___query_2.php");	
		$row2=GeneralMYSQL::fetch_array($res2);	
		if ($row2['id_message']<1){// проверка, есть ли там дальше чего по убыванию, если нет, то "none"			
			echo("none");}
		else{ //если есть, то пробуем снова			
			$start2=$row2['id_message']-$limit+1; //перескакиваем назад на стартовое число и до N_start	
			chat($start2,$row2['id_message']);}
			GeneralMYSQL::free($res2);}
	else {echo("<!--".($start-1)."-->");}}// если загрузилось
chat($start,$N_start);?>