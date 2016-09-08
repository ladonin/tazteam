<?php   
class NewsSendTopic{



//преобразовать значения пробега и цены в удобное число
static public $id_news=0;//id своей темы






static public $imagesattachedlist="";
static public $imagesattachedsizeslist="";
static public $photo=0;




//данные при редактировании


static public $array_data=array(//массив данных объявления
"id"=>'',
"id_user"=>'',
"date_create"=>'',
"number_views"=>'',
"name"=>'',
"keywords"=>'',
"secretword"=>'',
"themepage"=>'',
"photo"=>'',
"img"=>'',
"img_sizes"=>'',
"contenthtml"=>'',
"contentnacked"=>'',
"contenttag"=>'');




static public function detect_parameters_for_redact($MSQLc){//устанавливаем параметры для библиотеки исходя из данных в БД
$query="
SELECT
	news.id as id,
	news.id_user as id_user,
	news.date_create as date_create,
	news.number_views as number_views,		
	news.name as name,
	news.keywords as keywords,    
	news.secretword as secretword,    
	news.themepage as themepage,
	news.photo as photo,
	news.img as img,
	news.img_sizes as img_sizes,
	news.contenthtml as contenthtml,
	news.contentnacked as contentnacked,
	news.contenttag as contenttag	
	FROM
		news WHERE id='".GeneralGetVars::$num_page."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);

	foreach(self::$array_data as $key=>$value){
		self::$array_data[$key]=$row[$key];}}
	

static public function detect_last_id($MSQLc){//поиск id своей последней темы
	$query="SELECT id FROM news WHERE id_user='".UsersMyData::$id."' ORDER by id DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	self::$id_news=$row['id'];
	return self::$id_news;}



static protected function insert_intonews($MSQLc){//вставляем объявление в БД

	$query="INSERT 
		INTO news
		(
		  `id`,
		  `id_user`,
		  `date_create`,
		  `number_views`,
		  `name`,
		  `themepage`,
		  `photo`,
		  `img`,
		  `img_sizes`,
		  `contenthtml`,
		  `contentnacked`,
		  `contenttag`,
		  `keywords`,
		  `secretword`
		)
		VALUES( 
		'',
		'".UsersMyData::$id."',
		'".GeneralGlobalVars::$timeunix."',
		'0',
		'".$_POST['name']."',
		'".NewsBase::$themepage."',
		'',
		'',
		'',
		'".$_POST['inputtexthtml']."',
		'".$_POST['inputtextnacked']."',
		'".$_POST['inputtexttextarea']."',
		'".$_POST['keywords']."',
		'".$_POST['secretword']."'
		)
		";
	return GeneralMYSQL::query_insert($MSQLc,$query);}
	
	


	

static public function setnameforimages($MSQLc){//задаем имена всем подгруженным картинкам
	for ($i=1; $i<=NewsForreg::maxrattachedimages; $i++){
		if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть
			foreach (GeneralImagesCalculate::$imagessizes_news as $key=>$value){//для каждого элемента массива экземпляров
				GeneralImagesWork::$imagesdestination['name'][$i][$key]=$i."_".$key.".".GeneralImagesWork::$imagessource['format'][$i];}}}}	

	
static public function makelistattachedimages($type){//формируем список приложенных изображений, по типу копии (вид размера)
	if (GeneralImagesUpload::$statusimageattached==1){//если изображения приложены
		for ($i=1; $i<=NewsForreg::maxrattachedimages; $i++){//для каждого возможно приложенного изображения
			if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть
				self::$imagesattachedlist.=" ".GeneralImagesWork::$imagesdestination['name'][$i][$type]." ";}}}}
				
			
static public function makelistattachedsizesimages($type){//формируем список размеров приложенных изображений, по типу копии (вид размера)
	if (GeneralImagesUpload::$statusimageattached==1){//если изображения приложены
		for ($i=1; $i<=NewsForreg::maxrattachedimages; $i++){//для каждого возможно приложенного изображения
			if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть		
				self::$imagesattachedsizeslist.=" ".GeneralImagesWork::$imagesdestination['width'][$i][$type]."x".GeneralImagesWork::$imagesdestination['height'][$i][$type]." ";}}}}
				
	
static public function put_data_of_images_to_DB($MSQLc){//записываем данные приложенных изображений в БД
	if ((self::$imagesattachedlist)&&(self::$imagesattachedsizeslist)){//если обе записи не пусты
		$query="UPDATE news SET img='".self::$imagesattachedlist."',img_sizes='".self::$imagesattachedsizeslist."', photo='".self::$photo."' WHERE id='".self::$id_news."' LIMIT 1";
		GeneralMYSQL::query_update($MSQLc,$query);}}	
	

	
	
	
static public function setnameforoneimage($MSQLc,$i){//задаем имЯ подгруженнОЙ картинкЕ ПО НОМЕРУ
	if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если приложенное изображение с текущим индексом присутствует	
		foreach (GeneralImagesCalculate::$imagessizes_news as $key=>$value){//для каждого элемента массива размеров
			GeneralImagesWork::$imagesdestination['name'][$i][$key]=$i."_".$key.".".GeneralImagesWork::$imagessource['format'][$i];}}}
	
	
	
	

static public function detect_photo_in_news($list){//проверяем - есть ли приложенное фото
	if ($list!="") {self::$photo=1;}}
	
static public function new_news($MSQLc){//отправляем новую тему
	if (GeneralSecurity::detect_administrator()==true) {
		NewsBase::detect_themepage();
		NewsForreg::$status_news=1; //статус объявления (0-просмотр, 1-новое, 2-редактирование)	
		self::insert_intonews($MSQLc);//запись текстовых данных в БД
			self::detect_last_id($MSQLc);//поиск id своей последней темы		
			GeneralGetVars::$var2=self::$id_news;
			GeneralImagesUpload::loadimagestoreception($MSQLc,NewsForreg::maxrattachedimages);//проверяем наличие приложенных изображений перед загрузкой и, если они есть, загружаем их во временную папку, проверяем их и если не соответствует требованиям безопасности хотя бы одно, то удаляем все	
			if (GeneralImagesUpload::$statusimageattached==1){//если изображение приложено и проверено
				self::setnameforimages($MSQLc);//присвоение в массив имени для каждой картинки
				if (GeneralImagesUpload::movingeachimagefromreception($MSQLc)==true){//перемещение картинок из временного хранилища в папку _files с автоматическим удалением из временной папки,если удачно (иначе автоматически удаление картинок из временной папки и папки _files)
					self::makelistattachedimages(3);//формируем список приложенных изображений, по типу копии (вид размера)
					self::makelistattachedsizesimages(1);//формируем список размеров приложенных изображений, по типу копии (вид размера)
					self::detect_photo_in_news(self::$imagesattachedsizeslist);//проверяем - есть ли приложенное фото
					self::put_data_of_images_to_DB($MSQLc);}}}}//записываем данные приложенных изображений в БД

		
		


static protected function update_news($MSQLc){//обновляем запись в ДБ
	//создаем запись в базе сообщений
	$query="UPDATE 
		news 
		SET
		  `name`='".$_POST['name']."',
		  `photo`='".self::$photo."',
		  `img`='".GeneralImagesWork::$imagesnameslist."',
		  `img_sizes`='".GeneralImagesWork::$imagessizeslist."',
		  `contenthtml`='".$_POST['inputtexthtml']."',
		  `contentnacked`='".$_POST['inputtextnacked']."',
		  `contenttag`='".$_POST['inputtexttextarea']."',
		  `keywords`='".$_POST['keywords']."'
		WHERE
			id='".GeneralGetVars::$num_page."'";
			
	return GeneralMYSQL::query_update($MSQLc,$query);}

		
		
		
static public function return_status__all_maindata_ok(){//проверка, что все нужные данные введены
	if ($_POST['name']&&$_POST['inputtextnacked']) {return true;}
	return false;}
		
static public function redact_news($MSQLc){//редактируем тему 
	if (GeneralSecurity::detect_administrator()==true) {	
		NewsBase::detect_themepage();
		NewsForreg::$status_news=2; //статус объявления (0-просмотр, 1-новое, 2-редактирование)	
		if (self::return_status__all_maindata_ok()==true){//проверка, что все нужные данные введены

			GeneralImagesUpload::loadredactingimagesFull_News($MSQLc,3);//проверяем и загружаем картинки во временное хранилище и сразу в файлы при редактировании, 3 - размер изображения, который будет находиться в тексте изображений в БД

			GeneralImagesWork::set_lists_from_array_of_attached_images_for_redact();//формируем список для изображений редактируемого сообщения (имена, и размеры) для редактируемого сообщения	
			self::detect_photo_in_news(GeneralImagesWork::$imagesnameslist);//проверяем - есть ли приложенное фото

			self::update_news($MSQLc);//обновляем запись в БД
			
			GeneralGetVars::$var2=GeneralGetVars::$num_page;//задаем страницу для перехода
			GeneralGetVars::$num_page="";
			
            
            

            
            
            
			}}}//обновляем запись в ДБ


static public function delete_topic_from_db($MSQLc){//удалить тему из БД
	$query="
	DELETE
	FROM
		news
	WHERE 	
		id='".GeneralGetVars::$var2."'		
		";
	GeneralMYSQL::query_delete($MSQLc,$query);}
	
static public function delete_news($MSQLc){//удаляем тему
	if (GeneralSecurity::detect_administrator()==true) {	
		NewsBase::detect_themepage();
		//удаляем все фото
		GeneralFiles::deletedir(GeneralGlobalVars::pathtofiles."/images/".GeneralGetVars::$var1."/".GeneralGetVars::$var2);

		//удаляем тему, за ней автоматически все коментарии и фото в БД
		self::delete_topic_from_db($MSQLc);		


		
		//меняем место положения на начало раздела
		GeneralGetVars::$var2="";
		GeneralGetVars::$num_page="";}}





















/*
static public $inputtopicnameenable=0;//подтвеждение, что название темы содержит текст



	
	
	
	
	
	
static protected function insert_intotopics($MSQLc){//вставляем тему в БД
	ForumBase::detectsqltable();//вычисляем имя таблиц
	//создаем запись в базе сообщений
	$query="INSERT 
		INTO ".ForumBase::$sqltopicstablename." 
		(
		`id_topic`,
		`id_user`,
		`name_topic`
		)
		VALUES( 
		'',
		'".UsersMyData::$id."',
		'".$_POST['inputnametopictextarea']."'
		)
		";
	return GeneralMYSQL::query_insert($MSQLc,$query);}	
	
	
static public function return_last_id_message($MSQLc){//выводим последний идентификатор созданного нашим пользователем сообщения
	$query="SELECT id_topic FROM ".ForumBase::$sqltopicstablename." WHERE id_user='".UsersMyData::$id."' ORDER by id_topic DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);		
	return $row['id_topic'];}	
	
	
	
static public function set_get_id_topic($MSQLc){//задаем глобальную переменную идентификатора страницы темы, на которую мы, якобы, перешли, чтобы на ней создать сообщение
	GeneralGetVars::$var3=self::return_last_id_message($MSQLc);
}	
	
	
static public function plus_topic_to_section($MSQLc){//начисляем разделу +1 к темам
	$query="UPDATE forum_sections SET number_topics=number_topics+1 WHERE id_section='".GeneralGetVars::$var2."' LIMIT 1";//начисляем разделу +1 к темам
	GeneralMYSQL::query_update($MSQLc,$query);}		
	
	

static public function new_topic($MSQLc){//отправляем новую тему
	if ((GeneralSecurity::revisioninputtext('inputnametopictextarea')==true)&&(ForumSendMessage::revisioninputntext()==true)){//если имя темы и текст сообщения есть
		if (self::insert_intotopics($MSQLc)==true){//вставляем тему в БД
			self::plus_topic_to_section($MSQLc);//начисляем разделу +1 к темам	
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
	$query="UPDATE forum___sections SET number_topics=number_topics-1 WHERE id_section='".GeneralGetVars::$var2."' LIMIT 1";//вычитаем из раздела 1 тему
	GeneralMYSQL::query_update($MSQLc,$query);}	
	
	
	
	
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

			return true;}}}*/
}
?>