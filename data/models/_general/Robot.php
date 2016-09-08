<?php
class GeneralRobot{

static public $id_user=0;//id_user ������������, ��� ����������� ����� ���������� �� � UsersMyData::$id, � � �����-������ ������ ����������

static public $number_thousands=0;//����� �����

static public function reaction_on_events($MSQLc,$event){
	if ($event=="new_user"){
	//��������� ���� ������������
	//��� ���� ����� ������� 
		#����� ����� ��� �������� - ������ 1000
		#����� ����� ��� ������������ - ������ 1000
		#����� ������� ��� �������� - ������ 5000
		if (self::$id_user>0){
		
			#����� ����� ��� �������� - ������ 1000
			#����� ����� ��� ������������ - ������ 1000
			//��������� ������������� � GeneralUploadBasic � ����������� � ��������
			
			#����� ������� ��� �������� - ������ 5000
			if ((self::$id_user%GeneralGlobalVars::maxusersdataindbtable)==0){//���� ������� �� ������� ����� ����, �� ���� ������������ �����-�� ������������
				//������� �������
				self::$number_thousands=self::$id_user/GeneralGlobalVars::maxusersdataindbtable+1;//����� �����
				self::create_db_tables_users_dialogs($MSQLc,self::$number_thousands);//������� �������� �������������
			}
		}
	}
}


static public function create_db_tables_users_dialogs($MSQLc,$number){//������� �������� �������������	
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