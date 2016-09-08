<?php
class GeneralGlobalVars{
static public $timeunix;

static public $day;
static public $month;
static public $year;

const maxusersincatalog=1000;//сколько всего может быть пользователей в одной папке
const maxusersdataindbtable=5000;//от скольких пользователей информация хранится в одной таблице


const url="http://mapstore.org/my_portfolio/tazteam.net";
const pathtoreception="_reception";
const pathtofiles="http://140706.selcdn.ru/tazteam/images";

const count_tests=60;//сколько у нас тестов (тесты - раздел сайта))


const url_enter_across_vk="https://oauth.vk.com/authorize?client_id=4062434&redirect_uri=http://mapstore.org/my_portfolio/tazteam.net/performing/enter_across_vk.php";
const url_registration_across_vk="https://oauth.vk.com/authorize?client_id=4062434&redirect_uri=http://mapstore.org/my_portfolio/tazteam.net/performing/registration_across_vk.php";
const url_import_main_data_across_vk="https://oauth.vk.com/authorize?client_id=4062434&redirect_uri=http://mapstore.org/my_portfolio/tazteam.net/performing/import_main_data_across_vk.php";
const url_fasten_account_to_vk="https://oauth.vk.com/authorize?client_id=4062434&redirect_uri=http://mapstore.org/my_portfolio/tazteam.net/performing/fasten_account_to_vk.php";

static public $minheightuploadimage=100;//минимальная высота загружаемого изображения
static public $minwidthuploadimage=100;//минимальная ширина загружаемого изображения

static public $onlineusertimegate=300;//ворота времени в которых пользователь онлайн в секундах


static public $critical_proportions_uploadimage=10;//разрешаемые пропорции для размеров изображения (по любой стороне) = 10/1 - применяется в security (images)





static public $urlself;









static public function set(){
	self::$timeunix=time();

	self::$day=date("j");
	self::$month=date("n");
	self::$year=date("Y");






	self::$urlself=$_SERVER['PHP_SELF'];

	if (GeneralGetVars::$var1=="users"){self::$critical_proportions_uploadimage=3;}//переопределяем разрешаемые пропорции




		}




}

//GeneralGlobalVars::set();//устанавливаем глобальные переменные
?>