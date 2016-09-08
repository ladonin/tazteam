<?php
class GeneralRobot{

static public $id_user=0;//id_user пользователя, при регистрации может находиться не в UsersMyData::$id, а в какой-нибудь другой переменной

static public $number_thousands=0;//номер тысяч

static public function reaction_on_events($MSQLc,$event){
	if ($event=="new_user"){
	//создается новы пользователь
	//для него нужно создать 
		#новую папку для аватарок - каждый 1000
		#новую папку для фотоальбомов - каждый 1000
		#новую таблицу для диалогов - каждый 5000
		if (self::$id_user>0){
		
			#новую папку для аватарок - каждый 1000
			#новую папку для фотоальбомов - каждый 1000
			//создаются автоматически в GeneralUploadBasic и фотоальбомы и аватарки
			
			#новую таблицу для диалогов - каждый 5000
			if ((self::$id_user%GeneralGlobalVars::maxusersdataindbtable)==0){//если деление по остатку равно нулю, то есть пользователь какой-то пятитысячный
				//создаем таблицы
				self::$number_thousands=self::$id_user/GeneralGlobalVars::maxusersdataindbtable+1;//какой номер
				self::create_db_tables_users_dialogs($MSQLc,self::$number_thousands);//таблица диалогов пользователей
			}
		}
	}
}


static public function create_db_tables_users_dialogs($MSQLc,$number){//таблица диалогов пользователей	
	$query="
	CREATE TABLE IF NOT EXISTS `registrated_users___correspondence_messages_".$number."` (
	`id_correspondence` int(10) NOT NULL,
	`id_message` int(10) NOT NULL,
	`id_user` int(10) NOT NULL,
	`date_message` int(10) NOT NULL,
	`text_message` text NOT NULL,
	 KEY (`id_correspondence`),
	 KEY (`id_message`),
	 CONSTRAINT `fk_registrated_users___cor_messages_".$number."_id_cor` FOREIGN KEY (`id_correspondence`) REFERENCES `registrated_users___correspondence_table` (`id_correspondence`) ON DELETE CASCADE ON UPDATE CASCADE 
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	";
	GeneralMYSQL::query_create($MSQLc,$query);





}



}
?>