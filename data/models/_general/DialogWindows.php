<?php   
class GeneralDialogWindows{
static public $type=1;//1 - сразу показывающийся, 2 -  открывающийся чат


static public $padding_right=20;//сколько отступаем справа, ширина фиксирована или 100%


static public $border=0;//граница well вокруг чата

//static public $button_clear="";//скопка очистки, стена и т.д.





static public $signaturing="";//оповещаем ли мы пользователей о новых сообщениях, если да, то что именно по названию (например "ne")
static public $pagetype=0;//тип страницы - 0 - чат, 1 - диалоги пользователей и т.д

static public $messages_presence=0;//флаг наличия комментариев в диалоге
static public $period=8000;//период обновления диалога
static public $namedialog="";//имя диалога - комменатрии, ответы и др.
static public $textforpanel="";//оставить сообщение, комментарий или другое слово
static public $id_dialog="";//идентификатор диалога (если их на странице несколько, чтобы можно было отличать)
static public $database="";//база данных диалога
static public $condition1="";//условие 1 для базы данных
static public $condition2="";//условие 2 для базы данных
static public $condition3="";//условие 3 для базы данных
static public $condition4="";//условие 4 для базы данных
static public $condition5="";//условие 5 для базы данных

static public $value1="";//значение для вставки
static public $value2="";//значение для вставки
static public $value3="";//значение для вставки
static public $value4="";//значение для вставки
static public $value5="";//значение для вставки
static public $value6="";//значение для вставки
static public $value7="";//значение для вставки
static public $value8="";//значение для вставки
static public $value9="";//значение для вставки
static public $value10="";//значение для вставки
static public $idmessage="";//где будет номер сообщения
static public $autor="";//какую value делаем автором при вставке
static public $time="";//какую value делаем временем создания сообщения	при вставке
static public $textvalue="";//где будет текст
static public $valuesnumber="";//сколько value делаем	

//static public $width="500px";//ширина диалогового окна по умолчанию
static public $height="500px";//высота диалогового окна по умолчанию
static public $id_message_start="";//стартовый id для начала отображения диалога
static public $id_message_current="";//текущий id сообщения
static public $idphoto=0;//id фотографии, если мы обсуждаем фото
const max_count_loading_messages=17;//по сколько подгружаем сообщений за раз

static public $getvar1="";
static public $getvar2="";
static public $getvar3="";
static public $getvar4="";
static public $num_page="";

static public function detect_id_message_start($MSQLc){//определение стартового id для начала отображения диалога
	$query="
	SELECT
		id_message
	FROM
		".self::$database;
		if (self::$condition1) {$query.=" WHERE ".self::$condition1;}	
		if (self::$condition2) {$query.=" AND ".self::$condition2;}
		if (self::$condition3) {$query.=" AND ".self::$condition3;}
		if (self::$condition4) {$query.=" AND ".self::$condition4;}
		if (self::$condition5) {$query.=" AND ".self::$condition5;}	
	$query.=" 
	ORDER BY id_message DESC
	LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);	
	self::$id_message_start=$row['id_message']-self::max_count_loading_messages;}



static public function delete_messages_from_topic($MSQLc){//удалить все сообщения из темы, пока не используется
	$query="
	DELETE
	FROM
		".self::$database;
		if (self::$condition1) {$query.=" WHERE ".self::$condition1;}	
		if (self::$condition2) {$query.=" AND ".self::$condition2;}
		if (self::$condition3) {$query.=" AND ".self::$condition3;}
		if (self::$condition4) {$query.=" AND ".self::$condition4;}
		if (self::$condition5) {$query.=" AND ".self::$condition5;}
	GeneralMYSQL::query_delete($MSQLc,$query);}




//1 - закрытый, 2 -  для всех
static public function return_privacy($getvar){//где можно писать незарегистрированным пользователям, а где нет
    if ($getvar==="games") {return 2;}
    return 1;
}

}

?>