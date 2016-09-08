<?php   
class PhotoSendTopic{
static public $inputtopicnameenable=0;//подтвеждение, что название темы содержит текст
static public $inputphotoenable=0;//подтвеждение, что к создаваемомой теме приложено фото

	
	

	
	
	
	
	
static public function return_last_id_topic($MSQLc){//выводим последний идентификатор созданного нашим пользователем ТЕМЫ
	$query="SELECT id_topic FROM ".PhotoBase::$sqltopicstablename." WHERE id_user='".UsersMyData::$id."' ORDER by id_topic DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);		
	return $row['id_topic'];}	

static public function plus_topic_to_section($MSQLc){//начисляем разделу +1 к темам
	$query="UPDATE photo___sections SET number_topics=number_topics+1 WHERE id_section='".GeneralGetVars::$var2."' LIMIT 1";//начисляем разделу +1 к темам
	GeneralMYSQL::query_update($MSQLc,$query);}		

static public function minus_topic_from_section($MSQLc){//вычитаем из раздела 1 тему
	$query="UPDATE photo___sections SET number_topics=number_topics-1 WHERE id_section='".GeneralGetVars::$var2."' LIMIT 1";//вычитаем из раздела 1 тему
	GeneralMYSQL::query_update($MSQLc,$query);}	
	
	
	
static public function set_get_id_topic($MSQLc){//задаем глобальную переменную идентификатора страницы темы, на которую мы, якобы, перешли, чтобы на ней создать сообщение
	GeneralGetVars::$var3=self::return_last_id_topic($MSQLc);}

static protected function insert_intophotos($MSQLc){//вставляем фото в БД
	PhotoBase::detectsqltable();//вычисляем имя таблиц
	//создаем запись в базе сообщений
	$query="INSERT 
		INTO ".PhotoBase::$sqlphotostablename." 
		(
		`idkey`,
		`id_topic`,
		`id_photo`,
		`page_photo`,
		`date_photo`,
		`name_photo`,
		`format_photo`,
		`size_photo`,
		`number_views`
		)
		SELECT 
		(CASE  
		WHEN  MAX(idkey)>=1 THEN MAX(idkey)+1
		ELSE 1
		END) AS maxidkeyreal,
		".GeneralGetVars::$var3.",
		'1',
		'1',
		'".GeneralGlobalVars::$timeunix."',
		'".$_POST['inputtexttextarea_1']."',
		'".GeneralImagesWork::$imagessource['format'][1]."',
		'".GeneralImagesWork::$imagesdestination['width_source'][1][1]."x".GeneralImagesWork::$imagesdestination['height_source'][1][1]."',
		'0'
		FROM ".PhotoBase::$sqlphotostablename;
	return GeneralMYSQL::query_insert($MSQLc,$query);}
	
static protected function insert_intotopics($MSQLc){//вставляем тему в БД
	//создаем запись в базе сообщений
	$query="INSERT 
		INTO ".PhotoBase::$sqltopicstablename." 
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

static public function makelistattachedsizesimage($type){//формируем список размеров приложенного изображения
	if (GeneralImagesUpload::$statusimageattached==1){//если изображения приложены
		for ($i=1; $i<=ForumForreg::maxrattachedimages; $i++){//для каждого возможно приложенного изображения
			if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть		
				self::$imagesattachedsizeslist.=" ".GeneralImagesWork::$imagesdestination['width'][$i][$type]."x".GeneralImagesWork::$imagesdestination['height'][$i][$type]." ";}}}}

static public function setnameforimages($MSQLc){//задаем имя подгруженнЫМ картинкАМ
	for ($i=1; $i<=PhotoForreg::maxrattachedimages; $i++){
		if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть
			foreach (GeneralImagesCalculate::$imagessizes_photo as $key=>$value){//для каждого элемента массива экземпляров
				GeneralImagesWork::$imagesdestination['name'][$i][$key]=$i."_".$key.".".GeneralImagesWork::$imagessource['format'][$i];}}}}


static public function new_topic($MSQLc){//отправляем новую тему
	if (GeneralSecurity::revisioninputtext('inputnametopictextarea')==true){//если имя темы есть
		GeneralImagesUpload::loadimagestoreception($MSQLc,PhotoForreg::maxrattachedimages);//проверяем наличие приложенного изображения перед загрузкой и, если оно есть, загружаем его во временную папку, проверяем его и если оно не соответствует требованиям безопасности, то удаляем его	
		if (GeneralImagesUpload::$statusimageattached==1){//если изображение приложено и проверено
			PhotoBase::detectsqltable();//вычисляем имя таблиц
			if (self::insert_intotopics($MSQLc)==true){//вставили тему в topics (номер автоматически дается)? получилось?
				self::set_get_id_topic($MSQLc);//определяем номер созданной темы id_topic и задаем глобальную переменную идентификатора страницы темы				
				GeneralGetVars::$num_page=1;//только что создали тему и идем на первую и единственную страницу				
				self::setnameforimages($MSQLc);//задаем имя подгруженной картинке в массив
				if (GeneralImagesUpload::movingeachimagefromreception($MSQLc)==true){//загружаем изображение по имени из массива в конечную папку и если изображение загрузилось в конечную папку под номером темы, выше опеределенным
				$_POST['inputtexttextarea_1']=GeneralSecurity::return_text($_POST['inputtexttextarea_1']);//проверяем комментарий
				if (self::insert_intophotos($MSQLc)==true){//вставили фотографию по id_topic в photos БД? получилось?
						self::plus_topic_to_section($MSQLc);//начисляем разделу +1 к темам
						//GeneralGetVars::set_submit_vars();//перестраиваем заново переменные
						return true;}						
					else {/*если не получилось загрузить фото*/
						GeneralImagesWork::delete_imagesbynumber(PhotoForreg::maxrattachedimages,"all");}}}}}//удаляем все и вся о её изображениях
	return false;}

static public function delete_topic_from_db($MSQLc){//удалить тему из БД
	$query="
	DELETE
	FROM
		".PhotoBase::$sqltopicstablename."
	WHERE 	
		id_topic='".GeneralGetVars::$var3."'";
	GeneralMYSQL::query_delete($MSQLc,$query);}	

static public function delete_topic($MSQLc){//удаляем тему
	PhotoBase::detect_autor_topic($MSQLc);//определяем автора темы
	if (PhotoBase::detect_belong_topic_to_user()==true){//если тема принадлежит нам
	
		//вычисляем имя таблиц
		PhotoBase::detectsqltable();
		
		//удаляем все фото
		GeneralFiles::deletedir(GeneralGlobalVars::pathtofiles."/images/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3);

		//удаляем тему, за ней автоматически все коментарии и фото в БД
		self::delete_topic_from_db($MSQLc);		
		
		//обновляем количество тем в разделе
		self::minus_topic_from_section($MSQLc);
		
		//меняем место положения на начало раздела
		GeneralGetVars::$var3="";
		GeneralGetVars::$var4="";		
		
		GeneralGetVars::$num_page="";
		return true;}
	return false;}
	
	
	
	

	
	
	
}
?>