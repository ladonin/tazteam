<?php   
class UsersSendPhotoalbumsTopic{
static public $inputtopicnameenable=0;//подтвеждение, что название темы содержит текст
static public $inputphotoenable=0;//подтвеждение, что к создаваемомой теме приложено фото

static public $last_id_album=0;//последний id альбома
	

	

	
	
	
static public function detect_last_id_album($MSQLc){//выводим последний идентификатор созданного нашим пользователем ТЕМЫ
	$query="SELECT id_album FROM registrated_users___photoalbums WHERE id_user='".GeneralGetVars::$var2."' ORDER by id_album DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	if ($row['id_album']<0) {$row['id_album']=0;}
	self::$last_id_album=$row['id_album']+1;}
	

	
	

static public function plus_topic_to_section($MSQLc){//начисляем разделу +1 к темам
	$query="UPDATE photo___sections SET number_topics=number_topics+1 WHERE id_section='".GeneralGetVars::$var2."' LIMIT 1";//начисляем разделу +1 к темам
	GeneralMYSQL::query_update($MSQLc,$query);}		

static public function minus_topic_from_section($MSQLc){//вычитаем из раздела 1 тему
	$query="UPDATE photo___sections SET number_topics=number_topics-1 WHERE id_section='".GeneralGetVars::$var2."' LIMIT 1";//вычитаем из раздела 1 тему
	GeneralMYSQL::query_update($MSQLc,$query);}	
	
	
	
static public function set_get_id_album(){//задаем глобальную переменную идентификатора страницы темы, на которую мы, якобы, перешли, чтобы на ней создать сообщение
	GeneralGetVars::$var4=self::$last_id_album;}

static protected function insert_intophotos($MSQLc){//вставляем фото в БД
	//PhotoBase::detectsqltable();//вычисляем имя таблиц
	//создаем запись в базе сообщений
	$query="INSERT 
		INTO registrated_users___photoalbums_photos
		(
		`idkey`,
		`id_user`,
		`dir_album`,
		`id_album`,
		`id_photo`,
		`format_photo`,
		`size_photo`,
		`name_photo`,
		`dateloading`,
		`number_views`
		)
		SELECT
		(CASE  
		WHEN  MAX(idkey)>=1 THEN MAX(idkey)+1
		ELSE 1
		END) AS maxidkeyreal,
		'".GeneralGetVars::$var2."',
		'".UsersBase::return_dir_catalog(UsersMyData::$id)."',
		'".self::$last_id_album."',
		'1',
		'".GeneralImagesWork::$imagessource['format'][1]."',		
		'".GeneralImagesWork::$imagesdestination['width_source'][1][1]."x".GeneralImagesWork::$imagesdestination['height_source'][1][1]."',
		'".$_POST['inputtexttextarea_1']."',
		'".GeneralGlobalVars::$timeunix."',
		'0'
		FROM registrated_users___photoalbums_photos";
	return GeneralMYSQL::query_insert($MSQLc,$query);}
	
	
	
	
static protected function insert_intotopics($MSQLc){//вставляем тему в БД
	//создаем запись в базе сообщений
	$query="INSERT 
		INTO registrated_users___photoalbums
		(
		`id_user`,
		`id_album`,
		`name_album`,
		`datenewing`
		)
		VALUES( 
		'".GeneralGetVars::$var2."',
		'".self::$last_id_album."',
		'".$_POST['inputnametopictextarea']."',
		'".GeneralGlobalVars::$timeunix."'
		)
		";
	return GeneralMYSQL::query_insert($MSQLc,$query);}

static public function makelistattachedsizesimage($type){//формируем список размеров приложенного изображения
	if (GeneralImagesUpload::$statusimageattached==1){//если изображения приложены
		for ($i=1; $i<=ForumForreg::maxrattachedimages; $i++){//для каждого возможно приложенного изображения
			if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть		
				self::$imagesattachedsizeslist.=" ".GeneralImagesWork::$imagesdestination['width'][$i][$type]."x".GeneralImagesWork::$imagesdestination['height'][$i][$type]." ";}}}}

static public function setnameforimages($MSQLc){//задаем имя подгруженнЫМ картинкАМ
	for ($i=1; $i<=UsersForreg::maxrattachedimages; $i++){
		if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть
			foreach (GeneralImagesCalculate::$imagessizes_photo as $key=>$value){//для каждого элемента массива экземпляров
				GeneralImagesWork::$imagesdestination['name'][$i][$key]=$i."_".$key.".".GeneralImagesWork::$imagessource['format'][$i];}}}}


static public function new_topic($MSQLc){//отправляем новую тему
	UsersBase::detect_its_mypage(1);//только, если это наша страница
	if (UsersBase::$its_mypage==1){
		if (GeneralSecurity::revisioninputtext('inputnametopictextarea')==true){//если имя темы есть
			GeneralImagesUpload::loadimagestoreception($MSQLc,UsersForreg::maxrattachedimages);//проверяем наличие приложенного изображения перед загрузкой и, если оно есть, загружаем его во временную папку, проверяем его и если оно не соответствует требованиям безопасности, то удаляем его	
			if (GeneralImagesUpload::$statusimageattached==1){//если изображение приложено и проверено
				GeneralImagesCalculate::$imagessizesarray_name="imagessizes_users_album";//задаем имя массива размеров, т.к. имя сервиса и массива не совпадают
				self::detect_last_id_album($MSQLc);//вычисляем последний id альбома
				if (self::insert_intotopics($MSQLc)==true){//вставили тему в topics (номер автоматически дается)? получилось?
					self::set_get_id_album();//задаем глобальную переменную идентификатора страницы фотоальбома				
					GeneralGetVars::$num_page=1;//только что создали тему и идем на первую и единственную страницу				
					UsersSendPhotoalbumsPhoto::setnameforoneimage(1,1);//задаем имя первой картинке картинке в массив
					if (GeneralImagesUpload::movingeachimagefromreception($MSQLc)==true){//загружаем изображение по имени из массива в конечную папку и если изображение загрузилось в конечную папку под номером темы, выше опеределенным
					$_POST['inputtexttextarea_1']=GeneralSecurity::return_text($_POST['inputtexttextarea_1']);//проверяем комментарий
					if (self::insert_intophotos($MSQLc)==true){//вставили фотографию по id_topic в photos БД? получилось?
							//self::plus_topic_to_section($MSQLc);//начисляем разделу +1 к темам
							//GeneralGetVars::set_submit_vars();//перестраиваем заново переменные
							return true;}						
						else {/*если не получилось загрузить фото*/
							GeneralImagesWork::delete_imagesbynumber(UsersForreg::maxrattachedimages,"all");}}}}}}//удаляем все и вся о её изображениях
	return false;}

static public function delete_topic_from_db($MSQLc){//удалить тему из БД
	$query="
	DELETE
	FROM
		registrated_users___photoalbums
	WHERE 	
	 	id_user='".UsersPhotoalbumsBase::$id_autor_topic."'
		AND
	 	id_album='".GeneralGetVars::$var4."'
		LIMIT 1";
	GeneralMYSQL::query_delete($MSQLc,$query);}	

	
	
	
	
	
static public function delete_topic($MSQLc){//удаляем тему
	UsersPhotoalbumsBase::detect_autor_topic($MSQLc);//определяем автора темы
	if (UsersPhotoalbumsBase::detect_belong_topic_to_user()==true){//если тема принадлежит нам
	
		//вычисляем имя таблиц
		//UsersPhotoalbumsBase::detectsqltable();
		
		//удаляем все фото
		GeneralFiles::deletedir(GeneralGlobalVars::pathtofiles."/images/users/photoalbums/".UsersBase::return_dir_catalog(UsersPhotoalbumsBase::$id_autor_topic)."/".UsersPhotoalbumsBase::$id_autor_topic."/".GeneralGetVars::$var4);

		//удаляем тему, за ней автоматически все коментарии и фото в БД
		self::delete_topic_from_db($MSQLc);		
		
		//меняем место положения на начало раздела
		GeneralGetVars::$var3="photoalbums";
		GeneralGetVars::$var4="";
		GeneralGetVars::$num_page=1;
		return true;}
	return false;}
	
	
	
	

	
	
	
}
?>