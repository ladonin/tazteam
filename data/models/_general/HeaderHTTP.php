<?php
class GeneralHeaderHTTP{

static function location($url)//переходим на другую страницу
{
	header("Location:".$url);
}
static function downloadcontent($url)//отдаем файл с нашего сервера
{
	1;
}
}
?>