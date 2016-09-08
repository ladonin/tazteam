<?php   
class PhotoSendPhoto{
static public $idsendphoto=0;//id нашего фото для новой загрузки
static public $idnextphoto_afterdelete=0;//id следующего фото, чтобы на него перейти после удаления текущего

static public function returnnameforoneimage($id,$key,$format){//задаем имя картинке
	return $id."_".$key.".".$format;}

static public function setnameforoneimage($i,$id){//задаем имя подгруженной картинке ($i - какой номер из всех картинок массива темы редактируется сейчас), если есть id - значит номер в файловой системе будет id
	if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть
		foreach (GeneralImagesCalculate::$imagessizes_photo as $key=>$value){//для каждого элемента массива экземпляров
		if ($id>0) {
			GeneralImagesWork::$imagesdestination['name'][$i][$key]=self::returnnameforoneimage($id,$key,GeneralImagesWork::$imagessource['format'][$i]);}
		else{
			GeneralImagesWork::$imagesdestination['name'][$i][$key]=self::returnnameforoneimage($i,$key,GeneralImagesWork::$imagessource['format'][$i]);}}}}
			
static protected function update_photos_full_db($MSQLc){//обновляем фото (полностью и фото и описание) в БД
	//создаем запись в базе сообщений
	$query="UPDATE 
		".PhotoBase::$sqlphotostablename."
		SET  		
			`date_photo`='".GeneralGlobalVars::$timeunix."',
			`name_photo`='".$_POST['inputtexttextarea_1']."',
			`format_photo`='".GeneralImagesWork::$imagessource['format'][1]."',
			`size_photo`='".GeneralImagesWork::$imagesdestination['width_source'][1][1]."x".GeneralImagesWork::$imagesdestination['height_source'][1][1]."'
		WHERE
		 	id_topic='".GeneralGetVars::$var3."'
			AND
		 	id_photo='".$_POST['id_photo']."'
		LIMIT 1
		";
	return GeneralMYSQL::query_update($MSQLc,$query);}		

static protected function update_photos_small_db($MSQLc){//обновляем фото (только описание) в БД
	//создаем запись в базе сообщений
	$query="UPDATE 
		".PhotoBase::$sqlphotostablename."
		SET  		
			`name_photo`='".$_POST['inputtexttextarea_1']."'
		WHERE
		 	id_topic='".GeneralGetVars::$var3."'
			AND
		 	id_photo='".$_POST['id_photo']."'
		LIMIT 1
		";
	return GeneralMYSQL::query_update($MSQLc,$query);}		
	
static public function delete_messages_from_topic($MSQLc){//удалить все сообщения из темы
	$query="
	DELETE
	FROM
		".PhotoBase::$sqlmessagestablename."
	WHERE 	
		id_topic='".GeneralGetVars::$var3."'
		AND
	 	id_photo='".$_POST['id_photo']."'";
	GeneralMYSQL::query_delete($MSQLc,$query);}	

static public function delete_photo_from_topic($MSQLc){//удалить фото из фотографий темы
	$query="
	DELETE
	FROM
		".PhotoBase::$sqlphotostablename."
	WHERE 	
		id_topic='".GeneralGetVars::$var3."'
		AND
	 	id_photo='".$_POST['id_photo']."'
	LIMIT 1";
	GeneralMYSQL::query_delete($MSQLc,$query);}	

static public function nulling_page_photo_from_photos($MSQLc){//обнуляем номер страницы предыдущих фото темы (потом автоматически востановятся по новой схеме при просмотре листинга справа вверху)
	$query="UPDATE 
		".PhotoBase::$sqlphotostablename."
		SET  		
			`page_photo`=''
		WHERE
		 	id_topic='".GeneralGetVars::$var3."'
			AND
		 	id_photo>'".$_POST['id_photo']."'
		";
	return GeneralMYSQL::query_update($MSQLc,$query);
	}		
	
static public function detect_flagonephoto($MSQLc){//проверяем - единственная ли фотография в теме или еще есть
	$query="SELECT count(1) count FROM ".PhotoBase::$sqlphotostablename." WHERE id_topic='".GeneralGetVars::$var3."'";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	if ($row['count']>1) {PhotoBase::$flagonephoto=0;}
	else {PhotoBase::$flagonephoto=1;}
	return $row['count'];}

	
	



	
	
static public function redact_photo($MSQLc){//редактируем фото
	PhotoBase::detect_autor_topic($MSQLc);//определяем автора темы
	if (PhotoBase::detect_belong_topic_to_user()==true){//если тема принадлежит нам
		PhotoBase::detectsqltable();//вычисляем имя таблиц
		GeneralImagesUpload::loadimagestoreception($MSQLc,PhotoForreg::maxrattachedimages);//проверяем наличие приложенного изображения перед загрузкой и, если оно есть, загружаем его во временную папку, проверяем его и если оно не соответствует требованиям безопасности, то удаляем его	
		$_POST['inputtexttextarea_1']=GeneralSecurity::return_text($_POST['inputtexttextarea_1']);//проверяем комментарий
		if (GeneralImagesUpload::$statusimageattached==1){//если изображение приложено и проверено
			self::setnameforoneimage(1,$_POST['id_photo']);//определяем имя файла подгруженной картинки по отправленному id_photo и заносим в массив
			if (GeneralImagesUpload::movingeachimagefromreception($MSQLc)==true){//загружаем изображение по имени из массива в конечную папку и если изображение загрузилось в конечную папку под номером темы из $get_var3
				if (self::update_photos_full_db($MSQLc)==true){//обновили фото с описанием в теме ? получилось?
					self::delete_messages_from_topic($MSQLc);//удаляем комментарии к прошлому фото
					return true;}}}
		else {//если изображение не было приложено
			if (self::update_photos_small_db($MSQLc)==true){//обновили описание фото в теме ? получилось?
				return true;}}
		return false;}}

static public function set_get_num_page($MSQLc){//обновляем глобальную переменную идентификатора номера фото
	GeneralGetVars::$num_page=PhotoBase::$next_num_page_photo;}

	
	
	
	
	
static public function detect_next_id_photo_afterdelete($MSQLc){//узнаем id следующей фотографии, чтобы на неё перейти после удаления текущей
	$query="SELECT id_photo FROM ".PhotoBase::$sqlphotostablename." WHERE id_topic='".GeneralGetVars::$var3."' AND id_photo>'".$_POST['id_photo']."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	if ($row['id_photo']>1) {self::$idnextphoto_afterdelete=$row['id_photo'];}
	else {
		$query="SELECT id_photo FROM ".PhotoBase::$sqlphotostablename." WHERE id_topic='".GeneralGetVars::$var3."' ORDER BY id_photo ASC LIMIT 1";
		$res=GeneralMYSQL::query($MSQLc,$query);		
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);
		self::$idnextphoto_afterdelete=$row['id_photo'];}
		
		
		
		
		}
	
	
	
	
	
static public function delete_photo($MSQLc){//удаляем фото
	PhotoBase::detect_autor_topic($MSQLc);//определяем автора темы
	if (PhotoBase::detect_belong_topic_to_user()==true){//если тема принадлежит нам
		PhotoBase::detectsqltable();//вычисляем имя таблиц
		self::detect_flagonephoto($MSQLc);//проверяем - единственная ли фотография в теме или еще есть
		if (PhotoBase::$flagonephoto==0) {//если не последняя фотография в теме
			GeneralImagesWork::hard_delete_oneimagebynumber($_POST['nameimg']);//удаляем фото со всеми его копиями из файлов
			self::detect_next_id_photo_afterdelete($MSQLc);//узнаем id следующей фотографии, чтобы на неё перейти после удаления текущей
			self::delete_photo_from_topic($MSQLc);//удаляем фото из фотографий темы
			PhotoBase::detect_num_page_photo_from_id($MSQLc,self::$idnextphoto_afterdelete);//определяем по id на какую страницу идем дальше
			//self::delete_messages_from_topic($MSQLc);//удаляем коментарии из базы сообщений   ---  удаляется автоматически по внешнему ключу
			self::nulling_page_photo_from_photos($MSQLc);//обнуляем pagephoto (номер страницы) предыдущих фоток
			self::set_get_num_page($MSQLc);//обновляем глобальную переменную идентификатора номера фото
			//GeneralGetVars::set_submit_vars();//перестраиваем заново переменные
			return true;}}
	return false;}

		

static protected function insert_intophotos_main($MSQLc){//вставляем фото в БД частично
	$query="INSERT 
		INTO ".PhotoBase::$sqlphotostablename." 
		(
		`idkey`,
		`id_topic`,
		`id_photo`
		)
		SELECT 
		(CASE  
		WHEN  MAX(idkey)>=1 THEN MAX(idkey)+1
		ELSE 1
		END) AS maxidkeyreal,
		".GeneralGetVars::$var3.",
		".self::$idsendphoto."
		FROM ".PhotoBase::$sqlphotostablename;		

	return GeneralMYSQL::query_insert($MSQLc,$query);}
	
	
static public function finish_update_photos_main($MSQLc){//дописываем фото в БД окончательно
	$query="UPDATE 
		".PhotoBase::$sqlphotostablename."
		SET  		
			`date_photo`='".GeneralGlobalVars::$timeunix."',
			`name_photo`='".$_POST['inputtexttextarea_1']."',
			`format_photo`='".GeneralImagesWork::$imagessource['format'][1]."',
			`size_photo`='".GeneralImagesWork::$imagesdestination['width_source'][1][1]."x".GeneralImagesWork::$imagesdestination['height_source'][1][1]."'
		WHERE
		 	id_topic='".GeneralGetVars::$var3."'
			AND
		 	id_photo='".self::$idsendphoto."'
		LIMIT 1
		";
	return GeneralMYSQL::query_update($MSQLc,$query);}	
	
	
	
static public function detectidforsendphoto($MSQLc){//вычисляем id записанного фото
	$query="SELECT id_photo FROM ".PhotoBase::$sqlphotostablename." WHERE id_topic='".GeneralGetVars::$var3."' ORDER BY id_photo DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	self::$idsendphoto=$row['id_photo']+1;}//id следующего фото (нашего)	
	
	
static public function new_photo($MSQLc){//загружаем новое фото
	PhotoBase::detect_autor_topic($MSQLc);//определяем автора темы
	if (PhotoBase::detect_belong_topic_to_user()==true){//если тема принадлежит нам
		PhotoBase::detectsqltable();//вычисляем имя таблиц
		GeneralImagesUpload::loadimagestoreception($MSQLc,PhotoForreg::maxrattachedimages);//проверяем наличие приложенного изображения перед загрузкой и, если оно есть, загружаем его во временную папку, проверяем его и если оно не соответствует требованиям безопасности, то удаляем его	
		if (GeneralImagesUpload::$statusimageattached==1){//если изображение приложено и проверено		
			self::detectidforsendphoto($MSQLc);//определяем его id			
			self::insert_intophotos_main($MSQLc);//вставляем фото в БД частично
			self::setnameforoneimage(1,self::$idsendphoto);//определяем имя файла подгруженной картинки по установленному id_photo и заносим в массив imagesdestination
			if (GeneralImagesUpload::movingeachimagefromreception($MSQLc)==true){//загружаем изображение по имени из массива в конечную папку и если изображение загрузилось в конечную папку под номером темы из $get_var3
			$_POST['inputtexttextarea_1']=GeneralSecurity::return_text($_POST['inputtexttextarea_1']);//проверяем комментарий
			self::finish_update_photos_main($MSQLc);//дописываем фото в БД окончательно	
				PhotoBase::detect_num_page_photo_from_id($MSQLc,self::$idsendphoto);//определяем номер страницы, на которую перейдем, по идентификатору фото
				self::set_get_num_page($MSQLc);//обновляем глобальную переменную идентификатора номера фото
				//GeneralGetVars::set_submit_vars();//перестраиваем заново переменные
				return true;}}}
	return false;}

		
		
	
}
?>