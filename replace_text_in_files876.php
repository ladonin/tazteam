<link rel="stylesheet" type="text/css" href="http://mapstore.org/my_portfolio/tazteam.net/css/_general/carcas.css">
<link rel="stylesheet" type="text/css" href="http://mapstore.org/my_portfolio/tazteam.net/css/_general/text.css">
<STYLE>
BODY{PADDING:10PX;}
</STYLE>
<form method="post" action="">
	<input value="сброс" style="border:1px solid #333333;" type="submit">
</form>
<?php

ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require("data/models/_general/MySQL.php");//функции и глобальные переменные MySQL
$MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root
//mysqli_query($MSQLc,'SET NAMES UTF8');//на время
require("data/models/_general/Security.php");//базовая библиотека работы с введенными данными
//////////////////////////////////////////////////////////
// Рекурсивная функция - спускаемся вниз по каталогу
//////////////////////////////////////////////////////////
function scan_dir($dirname,$flag){
	// Объявляем переменные замены глобальными
	global $text, $retext;
	// Открываем текущую директорию
	$dir = opendir($dirname);
	// Читаем в цикле директорию
	while (($file = readdir($dir)) !== false){
		// Если файл обрабатываем его содержимое
		if($file != "." && $file != ".."){
			// Если имеем дело с файлом - производим в нём замену
			if(is_file($dirname."/".$file)){
				// Читаем содержимое файла
				$content = file_get_contents($dirname."/".$file);
				if ($flag==1){
				//echo($text." "); echo($retext." <br>");
					if ($count=preg_match_all ("#".$text."#is",$content,$matches)){//если совпадение найдено
						// Осуществляем замену
						
						$content = preg_replace("#".$text."#is", $retext, $content);
						// Перезаписываем файл
						file_put_contents($dirname."/".$file,$content);
						echo($dirname."/".$file." -><b>".$count."</b><br>");}}
				else if ($flag==2){
					$coding=mb_detect_encoding($content, "auto");
					if ($coding!="UTF-8"){
						echo($dirname."/".$file." -><b>".$coding."</b><br>");}}
				elseif ($flag==3){
					if ($count=preg_match_all ("#".$text."#is",$content,$matches)){//если совпадение найдено
					echo($dirname."/".$file." -><b>".$count."</b><br>");}}}
				// Если перед нами директория, вызываем рекурсивно
				// функцию scan_dir
				if(is_dir($dirname."/".$file)){
					//echo $dirname."/".$file."<br>";
					scan_dir($dirname."/".$file,$flag);}}}
		// Закрываем директорию
		closedir($dir);}


 




?>




<div style="background-color:#aaaaff; padding:10px;"> 
<form method="post" action="">
	Проверить кодировки:<br><br>
	<input value="2" name="submit" type="hidden">
	<input value=" " class="submit_send" type="submit">
</form>
</div>
<BR><BR>
<div style="background-color:#aaffaa; padding:10px;"> 
<form method="post" action="">
	Что ищем:<br>
	<textarea maxlength="1000" class="inputtexttextarea" name="WHAT"></textarea>
	<br><br>
	<input value="3" name="submit" type="hidden">
	<input value=" " class="submit_send" type="submit">
</form>
</div>
<BR><BR>
<div style="background-color:#ffaaaa; padding:10px;"> 
<form method="post" action="" onsubmit="return confirm('менять?');">
	Что меняем:<br>
	<textarea maxlength="1000" class="inputtexttextarea" name="WHAT"><?php echo(@$_POST['WHAT']);?></textarea>
	<br><br>На что:<br>
	<textarea maxlength="1000" class="inputtexttextarea" name="TOWHAT"><?php echo(@$_POST['TOWHAT']);?></textarea>
	<br><br>
	<input value="1" name="submit" type="hidden">
	<input value=" " class="submit_send" type="submit">
</form>
</div>
<BR>

<?php
//Воспользоваться результатами можно при помощи следующего кода
//Код вызова функции scan_dir()
if (isset($_POST['submit'])){

if (($_POST['submit']==1)&&($_POST['WHAT']!="")){
$text=preg_quote($_POST['WHAT']);
$retext = $_POST['TOWHAT']; // Строка замены
ECHO("<span style='color:aa0000;'><B>ЗАМЕНА:</B> <br>".htmlspecialchars($_POST['WHAT'])." <br> на <br>".htmlspecialchars($_POST['TOWHAT'])."<BR><BR>");
scan_dir("data",1);

scan_dir("css",1);

scan_dir("js",1);


scan_dir("performing",1);








ECHO("<BR><BR></span>");}



else if ($_POST['submit']==2){
ECHO("<span style='color:0000aa;'><b>Кодировки:</b><BR><BR>");
scan_dir($dirname,2);
ECHO("</span><BR>");}

else if ($_POST['submit']==3){
ECHO("<span style='color:00aa00;'><b>Результат поиска:</b> ".htmlspecialchars($_POST['WHAT'])."<BR><BR>");
$text=preg_quote($_POST['WHAT']);
//scan_dir($dirname,3);
scan_dir("js",3);scan_dir("data",3);scan_dir("performing",3);
ECHO("</span><BR>");}

} // Вызов рекурсивной функции
?>
