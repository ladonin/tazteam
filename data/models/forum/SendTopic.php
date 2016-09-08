<?php   
class ForumSendTopic{
static public $inputtopicnameenable=0;//подтвеждение, что название темы содержит текст


static public $id_topic=0;//id созданной темы
	
	
static public $previus_id_topic=0;//последняя id темы (для удаления темы)
static public $previus_autor_topic=0;//автор последней id темы (для удаления темы)	
static public $previus_name_topic=0;//название последней id темы (для удаления темы)	


	
static protected function insert_intotopics($MSQLc){//вставляем тему в БД
    //задаем нужный адрес, потому что можем создать тему из любой страницы через кнопку на top_menu
    GeneralGetVars::$var1="forum";
    GeneralGetVars::$var2=$_POST['forum_section_id'];

	ForumBase::detectsqltable();//вычисляем имя таблиц
	//создаем запись в базе сообщений
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
	
	
static public function detect_last_id_topic($MSQLc){//выводим последний идентификатор созданного нашим пользователем сообщения
	$query="SELECT id_topic FROM ".ForumBase::$sqltopicstablename." WHERE id_user='".UsersMyData::$id."' ORDER by id_topic DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	self::$id_topic=$row['id_topic'];}	
	
	
	
static public function set_get_id_topic($MSQLc){//задаем глобальную переменную идентификатора страницы темы, на которую мы, якобы, перешли, чтобы на ней создать сообщение
	GeneralGetVars::$var3=self::$id_topic;
}	
	
	
static public function update_topic_in_section($MSQLc){//начисляем разделу +1 к темам
	$query="
	UPDATE 	forum___sections 
	SET 	number_topics=number_topics+1, id_last_topic='".self::$id_topic."', id_autor_last_topic='".UsersMyData::$id."', name_last_topic='".$_POST['inputnametopictextarea']."'	
	WHERE 	id_section='".GeneralGetVars::$var2."' LIMIT 1";//начисляем разделу +1 к темам
	GeneralMYSQL::query_update($MSQLc,$query);}		
	
	

static public function new_topic($MSQLc){//отправляем новую тему
	
//echo("ForumCitateId=".$_POST['ForumCitateId']." ");
//echo("inputtexttextarea=".$_POST['inputtexttextarea']." ");
//echo("inputtexthtml=".$_POST['inputtexthtml']." ");
//echo("inputtextnacked=".$_POST['inputtextnacked']." ");
//echo("inputnametopictextarea=".$_POST['inputnametopictextarea']." ");

	if ((GeneralSecurity::revisioninputtext('inputnametopictextarea')==true)&&(ForumSendMessage::revisioninputntext()==true)){//если имя темы и текст сообщения есть
		if (self::insert_intotopics($MSQLc)==true){//вставляем тему в БД
			self::detect_last_id_topic($MSQLc);
			self::update_topic_in_section($MSQLc);//начисляем разделу +1 к темам	
			self::set_get_id_topic($MSQLc);
			GeneralGetVars::set_submit_vars();//перестраиваем заново переменные		
			if (ForumSendMessage::send_message($MSQLc)==true){//отправляем приложенное сообщение
				return true;}}}
	return false;}
	
	





static public function decrement_messages_at_users($id_topic,$MSQLc){//при удалении темы - пройти по сообщениям темы и у каждого автора - минус сообщение
	$query="SELECT id_user FROM ".ForumBase::$sqlmessagestablename." WHERE id_topic='".$id_topic."'";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	while($row=GeneralMYSQL::fetch_array($res)){
		ForumForreg::minus_message_to_user($MSQLc,$row['id_user']);}
	GeneralMYSQL::free($res);}

static public function delete_topic_from_db($MSQLc){//удалить тему из базы данных
	$query="
	DELETE
	FROM
		".ForumBase::$sqltopicstablename."
	WHERE 	
		id_topic='".GeneralGetVars::$var3."'
	LIMIT 1";
	GeneralMYSQL::query_delete($MSQLc,$query);}	

	
	
static public function minus_topic_from_section($MSQLc){//вычитаем из раздела 1 тему
	self::detect_data_of_previus_topic($MSQLc);
	$query="
	UPDATE 
	forum___sections
	SET 
	number_topics=number_topics-1, id_last_topic='".self::$previus_id_topic."', id_autor_last_topic='".self::$previus_autor_topic."', name_last_topic='".self::$previus_name_topic."'
	WHERE id_section='".GeneralGetVars::$var2."' LIMIT 1";//вычитаем из раздела 1 тему
	GeneralMYSQL::query_update($MSQLc,$query);}


static public function detect_data_of_previus_topic($MSQLc){//для удаления темы
	$query="SELECT id_topic,id_user,name_topic FROM ".ForumBase::$sqltopicstablename." ORDER by id_topic DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);	
	GeneralMYSQL::free($res);
	self::$previus_id_topic=$row['id_topic'];//последняя id темы (для удаления темы)
	self::$previus_autor_topic=$row['id_user'];//автор последней id темы (для удаления темы)	
	self::$previus_name_topic=$row['name_topic'];}//название последней id темы (для удаления темы)


static public function delete_topic($MSQLc){//удаляем тему
	ForumBase::detectsqltable();

	//если мы - автор темы
	if (GeneralSecurity::detect_autority(ForumForreg::return_autor_topic($_POST['id_topic'],$MSQLc))==true){
		//если нет чужих сообщений
		if (ForumForreg::detect_availability_to_delete_topic($_POST['id_topic'],$MSQLc)==true){

			//пройти по сообщениям темы и у каждого автора - минус сообщение
			self::decrement_messages_at_users($_POST['id_topic'],$MSQLc);

			//удаляем фотографии и директорию
			GeneralFiles::deletedir(GeneralUploadBasic::detectpathfile("images",0,0));
			
			//удаляем тему
			self::delete_topic_from_db($MSQLc);
			
			//минус тема у раздела
			self::minus_topic_from_section($MSQLc);
			
			//меняем место положения на начало раздела
			GeneralGetVars::$var3="";
			GeneralGetVars::$num_page="";

			return true;}}}
}
?>