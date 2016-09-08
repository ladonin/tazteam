<?php   
class GeneralVote{


static public $db_rank;//ранк фотографии из БД
static public $db_textvoters;//список голосовавших из БД


static public $abrev_page;//ne,fm и т.д.
static public $getvar1;
static public $getvar2;
static public $getvar3;
static public $getvar4;
static public $num_page;
static public $id_photo;


static public $rank;//ранк фотографии
static public $array_voters=array();//массив голосовавших



static public $vote_polar=1;//плюс или минус голос при нажатии
static public $me_already_voted=0;//я уже голосовал, по умолчанию - не голосовал еще

		
static public function detect_vote(){	
	if (self::$db_rank>0){
		self::$db_textvoters=trim(self::$db_textvoters);
		if (self::$db_textvoters!==""){
			self::$array_voters=explode("  ",self::$db_textvoters);//массив голосовавших
			self::$rank=count(self::$array_voters);//сколько голосовавших
			foreach(self::$array_voters as $value){//ищем себя
				if (UsersMyData::$id==$value){
					self::$me_already_voted=1;
					self::$vote_polar=-1;}}}//я голосовал уже
		else {
			self::$rank=0;}}
	else{
		self::$rank=0;}}
	//в итоге - знаем сколько голосов, голосовали мы или нет
	
	
	
	
	
}











?>