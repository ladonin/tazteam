<?php   
class ForumSendTopic{
static public $inputtopicnameenable=0;//������������, ��� �������� ���� �������� �����


static public $id_topic=0;//id ��������� ����
	
	
static public $previus_id_topic=0;//��������� id ���� (��� �������� ����)
static public $previus_autor_topic=0;//����� ��������� id ���� (��� �������� ����)	
static public $previus_name_topic=0;//�������� ��������� id ���� (��� �������� ����)	


	
static protected function insert_intotopics($MSQLc){//��������� ���� � ��
    //������ ������ �����, ������ ��� ����� ������� ���� �� ����� �������� ����� ������ �� top_menu
    GeneralGetVars::$var1="forum";
    GeneralGetVars::$var2=$_POST['forum_section_id'];

	ForumBase::detectsqltable();//��������� ��� ������
	//������� ������ � ���� ���������
	$query="INSERT 
		INTO ".ForumBase::$sqltopicstablename." 
		(
		`id_topic`,
		`id_user`,
		`name_topic`,
		`timecreate`
		)
		VALUES( 
		'',
		'".UsersMyData::$id."',
		'".$_POST['inputnametopictextarea']."',
		'".GeneralGlobalVars::$timeunix."'
		)
		";
	return GeneralMYSQL::query_insert($MSQLc,$query);}	
	
	
static public function detect_last_id_topic($MSQLc){//������� ��������� ������������� ���������� ����� ������������� ���������
	$query="SELECT id_topic FROM ".ForumBase::$sqltopicstablename." WHERE id_user='".UsersMyData::$id."' ORDER by id_topic DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	self::$id_topic=$row['id_topic'];}	
	
	
	
static public function set_get_id_topic($MSQLc){//������ ���������� ���������� �������������� �������� ����, �� ������� ��, �����, �������, ����� �� ��� ������� ���������
	GeneralGetVars::$var3=self::$id_topic;
}	
	
	
static public function update_topic_in_section($MSQLc){//��������� ������� +1 � �����
	$query="
	UPDATE 	forum___sections 
	SET 	number_topics=number_topics+1, id_last_topic='".self::$id_topic."', id_autor_last_topic='".UsersMyData::$id."', name_last_topic='".$_POST['inputnametopictextarea']."'	
	WHERE 	id_section='".GeneralGetVars::$var2."' LIMIT 1";//��������� ������� +1 � �����
	GeneralMYSQL::query_update($MSQLc,$query);}		
	
	

static public function new_topic($MSQLc){//���������� ����� ����
	
//echo("ForumCitateId=".$_POST['ForumCitateId']." ");
//echo("inputtexttextarea=".$_POST['inputtexttextarea']." ");
//echo("inputtexthtml=".$_POST['inputtexthtml']." ");
//echo("inputtextnacked=".$_POST['inputtextnacked']." ");
//echo("inputnametopictextarea=".$_POST['inputnametopictextarea']." ");

	if ((GeneralSecurity::revisioninputtext('inputnametopictextarea')==true)&&(ForumSendMessage::revisioninputntext()==true)){//���� ��� ���� � ����� ��������� ����
		if (self::insert_intotopics($MSQLc)==true){//��������� ���� � ��
			self::detect_last_id_topic($MSQLc);
			self::update_topic_in_section($MSQLc);//��������� ������� +1 � �����	
			self::set_get_id_topic($MSQLc);
			GeneralGetVars::set_submit_vars();//������������� ������ ����������		
			if (ForumSendMessage::send_message($MSQLc)==true){//���������� ����������� ���������
				return true;}}}
	return false;}
	
	





static public function decrement_messages_at_users($id_topic,$MSQLc){//��� �������� ���� - ������ �� ���������� ���� � � ������� ������ - ����� ���������
	$query="SELECT id_user FROM ".ForumBase::$sqlmessagestablename." WHERE id_topic='".$id_topic."'";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	while($row=GeneralMYSQL::fetch_array($res)){
		ForumForreg::minus_message_to_user($MSQLc,$row['id_user']);}
	GeneralMYSQL::free($res);}

static public function delete_topic_from_db($MSQLc){//������� ���� �� ���� ������
	$query="
	DELETE
	FROM
		".ForumBase::$sqltopicstablename."
	WHERE 	
		id_topic='".GeneralGetVars::$var3."'
	LIMIT 1";
	GeneralMYSQL::query_delete($MSQLc,$query);}	

	
	
static public function minus_topic_from_section($MSQLc){//�������� �� ������� 1 ����
	self::detect_data_of_previus_topic($MSQLc);
	$query="
	UPDATE 
	forum___sections
	SET 
	number_topics=number_topics-1, id_last_topic='".self::$previus_id_topic."', id_autor_last_topic='".self::$previus_autor_topic."', name_last_topic='".self::$previus_name_topic."'
	WHERE id_section='".GeneralGetVars::$var2."' LIMIT 1";//�������� �� ������� 1 ����
	GeneralMYSQL::query_update($MSQLc,$query);}


static public function detect_data_of_previus_topic($MSQLc){//��� �������� ����
	$query="SELECT id_topic,id_user,name_topic FROM ".ForumBase::$sqltopicstablename." ORDER by id_topic DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);	
	GeneralMYSQL::free($res);
	self::$previus_id_topic=$row['id_topic'];//��������� id ���� (��� �������� ����)
	self::$previus_autor_topic=$row['id_user'];//����� ��������� id ���� (��� �������� ����)	
	self::$previus_name_topic=$row['name_topic'];}//�������� ��������� id ���� (��� �������� ����)


static public function delete_topic($MSQLc){//������� ����
	ForumBase::detectsqltable();

	//���� �� - ����� ����
	if (GeneralSecurity::detect_autority(ForumForreg::return_autor_topic($_POST['id_topic'],$MSQLc))==true){
		//���� ��� ����� ���������
		if (ForumForreg::detect_availability_to_delete_topic($_POST['id_topic'],$MSQLc)==true){

			//������ �� ���������� ���� � � ������� ������ - ����� ���������
			self::decrement_messages_at_users($_POST['id_topic'],$MSQLc);

			//������� ���������� � ����������
			GeneralFiles::deletedir(GeneralUploadBasic::detectpathfile("images",0,0));
			
			//������� ����
			self::delete_topic_from_db($MSQLc);
			
			//����� ���� � �������
			self::minus_topic_from_section($MSQLc);
			
			//������ ����� ��������� �� ������ �������
			GeneralGetVars::$var3="";
			GeneralGetVars::$num_page="";

			return true;}}}
}
?>