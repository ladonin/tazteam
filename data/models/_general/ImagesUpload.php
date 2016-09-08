<?php   
class GeneralImagesUpload{
static public $statusimageattached=0;//статус - приложены изображения или нет
static public $maxcountofuploadingimages=0;//сколько всего может загружаться изображений
static public $source;
static public $name;
static public $size;
static public $type;
static public $format;
static public $error;
static public $nameinrecept;









static public function recept($MSQLc,$i,$img){//принимаем загруженный файл во временную папку "/reception" и задаем данные о файле
	//записываем данные загружаемого изображения
	self::$source = $_FILES[$img]["tmp_name"];
	if (self::$source){//если изображение приложено
		self::$name = $_FILES[$img]["name"]; 
		self::$size = $_FILES[$img]["size"]; 
		self::$error = $_FILES[$img]["error"];
		$typeformatarray=explode("/", $_FILES[$img]["type"]);
		self::$type = $typeformatarray[0];//image
		self::$format = $typeformatarray[1];//например, jpeg
		if (GeneralSecurity::uploadimagecontrolprimary(self::$format,self::$type,self::$size,self::$error)==true){//если тип и вид картинки соответствует требованиям
			GeneralUploadBasic::setreceptname();//создаем временное имя во временной папке
			self::$nameinrecept=GeneralUploadBasic::$receptname."_".$img.".".self::$format;//добавляем его в адрес нашей картинки	
			if (GeneralUploadBasic::loadto_reception(self::$source,self::$nameinrecept)==true){//если изображение загрузилось во временную папку по этому адресу
				if (GeneralSecurity::uploadimagecontroldeeply($MSQLc,GeneralGlobalVars::pathtoreception."/".self::$nameinrecept,self::$format,self::$type,$i)==false){//глубоко проверяем его
					return false;/*удаляем и не записываем информацию о нем*/}
					//если все в порядке - присваиваем ему параметры
					GeneralImagesWork::$imagessource['source'][$i]=self::$source;
					GeneralImagesWork::$imagessource['name'][$i]=self::$name;
					GeneralImagesWork::$imagessource['size'][$i]=self::$size;
					GeneralImagesWork::$imagessource['type'][$i]=self::$type;
					GeneralImagesWork::$imagessource['format'][$i]=self::$format;
					GeneralImagesWork::$imagessource['error'][$i]=self::$error;
					GeneralImagesWork::$imagessource['nameinrecept'][$i]=self::$nameinrecept;
					return true;}}}
	return false;}

	
	
	
static public function setmaxcountofuploadingimages($maxcountofuploadingimages){//сколько всего можно принять изображений
	self::$maxcountofuploadingimages=$maxcountofuploadingimages;}



	
static public function setarrayofattachedimages_for_redact($textnames,$textsizes){//формируем массив для изображений редактируемого сообщения, которые уже есть
	$textimagesarray=explode(" ",$textnames);
	$textsizesarray=explode(" ",$textsizes);
	foreach($textimagesarray as $key=>$value){
		if ($value){//echo($key."-key<br>");//echo($value."-value<br>");
			$textsizesarrayarray=explode("x",$textsizesarray[$key]);
			GeneralImagesWork::$imagesattached_for_redact[$value]['width']=$textsizesarrayarray[0];
			GeneralImagesWork::$imagesattached_for_redact[$value]['height']=$textsizesarrayarray[1];//echo(GeneralImagesWork::$imagesattached_for_redact[$value]['width']."-w<br>");echo(GeneralImagesWork::$imagesattached_for_redact[$value]['height']."-h<br>");
			}}}

	

static public function loadredactingimagesFull_Forum($MSQLc,$type){//проверяем и загружаем картинки во временное хранилище и сразу в файлы при редактировании для форума
	self::setarrayofattachedimages_for_redact(ForumSendMessage::return_imagesnames_from_DB($_POST['idmessagetoredact'],$MSQLc),ForumSendMessage::return_imagessizes_from_DB($_POST['idmessagetoredact'],$MSQLc));//формируем массив для изображений редактируемого сообщения, которые уже есть
	for($i=1;$i<=ForumForreg::maxrattachedimages;$i++){
		if (isset($_POST['imgredact'.$i])){//если редактируется изображение
			$name=preg_replace('/_[0-9]+\./','.',$_POST['imgname'.$i]);//имя изображения независимо от вида размеров
			if (@$_POST['imgdelete'.$i]==1){//если удаляется				
				GeneralImagesWork::hard_delete_oneimagebynumber($name);//удаляем все виды текущего изображения из файлов
				unset(GeneralImagesWork::$imagesattached_for_redact[$_POST['imgname'.$i]]);}//удаляем член массива для изображений редактируемого сообщения, которые уже есть
			else if ($_FILES['img'.$i]['tmp_name']){//если обновляем изображение
				if (self::loadoneimagetoreception($MSQLc,$i)==true){//проверяем и загружаем картинкУ во временное хранилище, в противном случае оставляем старую
					GeneralImagesWork::hard_delete_oneimagebynumber($name);//удаляем старое изображение со всеми его видами из файлов
					ForumSendMessage::setnameforoneimage($MSQLc,$i,$_POST['idmessagetoredact']);//задаем имЯ подгруженнОЙ картинкЕ ПО НОМЕРУ
					self::movingoneimagefromreception($MSQLc,$i);//загружаем изображениЕ по НОМЕРУ в конечную папку (т.к. оно уже занесено в массив)
					//нужно удалить старый элемент массива и создать новый с новым ключем и обновить размеры				
					unset(GeneralImagesWork::$imagesattached_for_redact[$_POST['imgname'.$i]]);
					GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['width']=GeneralImagesWork::$imagesdestination['width'][$i][$type];
					GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['height']=GeneralImagesWork::$imagesdestination['height'][$i][$type];}}
			else {//если не трогаем существующее
				}}//ну и хорошо			
		else if ($_FILES['img'.$i]["tmp_name"]){//если подгружается новое
			if (self::loadoneimagetoreception($MSQLc,$i)==true){//проверяем и загружаем картинкУ во временное хранилище
				ForumSendMessage::setnameforoneimage($MSQLc,$i,$_POST['idmessagetoredact']);//задаем имЯ подгруженнОЙ картинкЕ ПО НОМЕРУ и по идентификатору сообщения			
				self::movingoneimagefromreception($MSQLc,$i);//загружаем изображениЕ по НОМЕРУ в конечную папку (т.к. оно уже занесено в массив)			
				//подобно добавляем новое изображение в массив
				GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['width']=GeneralImagesWork::$imagesdestination['width'][$i][$type];
				GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['height']=GeneralImagesWork::$imagesdestination['height'][$i][$type];}}}}
			



















static public function loadredactingimagesFull_Automarket($MSQLc,$type){//проверяем и загружаем картинки во временное хранилище и сразу в файлы при редактировании для авторынка
	self::setarrayofattachedimages_for_redact(AutomarketForreg::return_imagesnames_from_DB($MSQLc),AutomarketForreg::return_imagessizes_from_DB($MSQLc));//формируем массив для изображений редактируемого сообщения, которые уже есть
	for($i=1;$i<=AutomarketForreg::maxrattachedimages;$i++){
		if (isset($_POST['imgredact'.$i])){//если редактируется изображение
			$name=preg_replace('/_[0-9]+\./','.',$_POST['imgname'.$i]);//имя изображения независимо от вида размеров
			if (@$_POST['imgdelete'.$i]==1){//если удаляется				
				GeneralImagesWork::hard_delete_oneimagebynumber($name);//удаляем все виды текущего изображения из файлов
				unset(GeneralImagesWork::$imagesattached_for_redact[$_POST['imgname'.$i]]);}//удаляем член массива для изображений редактируемого сообщения, которые уже есть
			else if ($_FILES['img'.$i]['tmp_name']){//если обновляем изображение
				if (self::loadoneimagetoreception($MSQLc,$i)==true){//проверяем и загружаем картинкУ во временное хранилище, в противном случае оставляем старую
					GeneralImagesWork::hard_delete_oneimagebynumber($name);//удаляем старое изображение со всеми его видами из файлов
					AutomarketSendTopic::setnameforoneimage($MSQLc,$i);//задаем имЯ подгруженнОЙ картинкЕ ПО НОМЕРУ
					self::movingoneimagefromreception($MSQLc,$i);//загружаем изображениЕ по НОМЕРУ в конечную папку (т.к. оно уже занесено в массив)
					//нужно удалить старый элемент массива и создать новый с новым ключем и обновить размеры				
					unset(GeneralImagesWork::$imagesattached_for_redact[$_POST['imgname'.$i]]);
					GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['width']=GeneralImagesWork::$imagesdestination['width'][$i][$type];
					GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['height']=GeneralImagesWork::$imagesdestination['height'][$i][$type];}}
			else {//если не трогаем существующее
				}}//ну и хорошо			
		else if ($_FILES['img'.$i]["tmp_name"]){//если подгружается новое
			if (self::loadoneimagetoreception($MSQLc,$i)==true){//проверяем и загружаем картинкУ во временное хранилище
				AutomarketSendTopic::setnameforoneimage($MSQLc,$i);//задаем имЯ подгруженнОЙ картинкЕ ПО НОМЕРУ			
				self::movingoneimagefromreception($MSQLc,$i);//загружаем изображениЕ по НОМЕРУ в конечную папку (т.к. оно уже занесено в массив)			
				//подобно добавляем новое изображение в массив
				GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['width']=GeneralImagesWork::$imagesdestination['width'][$i][$type];
				GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['height']=GeneralImagesWork::$imagesdestination['height'][$i][$type];}}}}



















static public function loadredactingimagesFull_Garage($MSQLc,$type){//проверяем и загружаем картинки во временное хранилище и сразу в файлы при редактировании для авторынка
	self::setarrayofattachedimages_for_redact(GarageForreg::return_imagesnames_from_DB($MSQLc),GarageForreg::return_imagessizes_from_DB($MSQLc));//формируем массив для изображений редактируемого сообщения, которые уже есть
	for($i=1;$i<=GarageForreg::maxrattachedimages;$i++){
		if (isset($_POST['imgredact'.$i])){//если редактируется изображение
			$name=preg_replace('/_[0-9]+\./','.',$_POST['imgname'.$i]);//имя изображения независимо от вида размеров
			if (@$_POST['imgdelete'.$i]==1){//если удаляется				
				GeneralImagesWork::hard_delete_oneimagebynumber($name);//удаляем все виды текущего изображения из файлов
				unset(GeneralImagesWork::$imagesattached_for_redact[$_POST['imgname'.$i]]);}//удаляем член массива для изображений редактируемого сообщения, которые уже есть
			else if ($_FILES['img'.$i]['tmp_name']){//если обновляем изображение
				if (self::loadoneimagetoreception($MSQLc,$i)==true){//проверяем и загружаем картинкУ во временное хранилище, в противном случае оставляем старую
					GeneralImagesWork::hard_delete_oneimagebynumber($name);//удаляем старое изображение со всеми его видами из файлов
					GarageSendTopic::setnameforoneimage($MSQLc,$i);//задаем имЯ подгруженнОЙ картинкЕ ПО НОМЕРУ
					self::movingoneimagefromreception($MSQLc,$i);//загружаем изображениЕ по НОМЕРУ в конечную папку (т.к. оно уже занесено в массив)
					//нужно удалить старый элемент массива и создать новый с новым ключем и обновить размеры				
					unset(GeneralImagesWork::$imagesattached_for_redact[$_POST['imgname'.$i]]);
					GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['width']=GeneralImagesWork::$imagesdestination['width'][$i][$type];
					GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['height']=GeneralImagesWork::$imagesdestination['height'][$i][$type];}}
			else {//если не трогаем существующее
				}}//ну и хорошо			
		else if ($_FILES['img'.$i]["tmp_name"]){//если подгружается новое
			if (self::loadoneimagetoreception($MSQLc,$i)==true){//проверяем и загружаем картинкУ во временное хранилище
				GarageSendTopic::setnameforoneimage($MSQLc,$i);//задаем имЯ подгруженнОЙ картинкЕ ПО НОМЕРУ			
				self::movingoneimagefromreception($MSQLc,$i);//загружаем изображениЕ по НОМЕРУ в конечную папку (т.к. оно уже занесено в массив)			
				//подобно добавляем новое изображение в массив
				GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['width']=GeneralImagesWork::$imagesdestination['width'][$i][$type];
				GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['height']=GeneralImagesWork::$imagesdestination['height'][$i][$type];}}}}

















static public function loadredactingimagesFull_News($MSQLc,$type){//проверяем и загружаем картинки во временное хранилище и сразу в файлы при редактировании для новостей
	self::setarrayofattachedimages_for_redact(NewsForreg::return_imagesnames_from_DB($MSQLc),NewsForreg::return_imagessizes_from_DB($MSQLc));//формируем массив для изображений редактируемого сообщения, которые уже есть
	for($i=1;$i<=NewsForreg::maxrattachedimages;$i++){
		if (isset($_POST['imgredact'.$i])){//если редактируется изображение
			$name=preg_replace('/_[0-9]+\./','.',$_POST['imgname'.$i]);//имя изображения независимо от вида размеров
			if (@$_POST['imgdelete'.$i]==1){//если удаляется				
				GeneralImagesWork::hard_delete_oneimagebynumber($name);//удаляем все виды текущего изображения из файлов
				unset(GeneralImagesWork::$imagesattached_for_redact[$_POST['imgname'.$i]]);}//удаляем член массива для изображений редактируемого сообщения, которые уже есть
			else if ($_FILES['img'.$i]['tmp_name']){//если обновляем изображение
				if (self::loadoneimagetoreception($MSQLc,$i)==true){//проверяем и загружаем картинкУ во временное хранилище, в противном случае оставляем старую
					GeneralImagesWork::hard_delete_oneimagebynumber($name);//удаляем старое изображение со всеми его видами из файлов
					NewsSendTopic::setnameforoneimage($MSQLc,$i);//задаем имЯ подгруженнОЙ картинкЕ ПО НОМЕРУ
					self::movingoneimagefromreception($MSQLc,$i);//загружаем изображениЕ по НОМЕРУ в конечную папку (т.к. оно уже занесено в массив)
					//нужно удалить старый элемент массива и создать новый с новым ключем и обновить размеры				
					unset(GeneralImagesWork::$imagesattached_for_redact[$_POST['imgname'.$i]]);
					GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['width']=GeneralImagesWork::$imagesdestination['width'][$i][$type];
					GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['height']=GeneralImagesWork::$imagesdestination['height'][$i][$type];}}
			else {//если не трогаем существующее
				}}//ну и хорошо			
		else if ($_FILES['img'.$i]["tmp_name"]){//если подгружается новое
			if (self::loadoneimagetoreception($MSQLc,$i)==true){//проверяем и загружаем картинкУ во временное хранилище
				NewsSendTopic::setnameforoneimage($MSQLc,$i);//задаем имЯ подгруженнОЙ картинкЕ ПО НОМЕРУ			
				self::movingoneimagefromreception($MSQLc,$i);//загружаем изображениЕ по НОМЕРУ в конечную папку (т.к. оно уже занесено в массив)			
				//подобно добавляем новое изображение в массив
				GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['width']=GeneralImagesWork::$imagesdestination['width'][$i][$type];
				GeneralImagesWork::$imagesattached_for_redact[GeneralImagesWork::$imagesdestination['name'][$i][$type]]['height']=GeneralImagesWork::$imagesdestination['height'][$i][$type];}}}}






















			
static public function loadoneimagetoreception($MSQLc,$i){//проверяем и загружаем картинкУ во временное хранилище
	if (self::recept($MSQLc,$i,"img".$i)==true){//если изображение загружено во временную папку
		self::$statusimageattached=1;
		return true;}//изображениЯ приложенЫ
	return false;}
			
	
static public function loadimagestoreception($MSQLc,$maxcountofuploadingimages){//проверяем и загружаем картинки во временное хранилище
	self::setmaxcountofuploadingimages($maxcountofuploadingimages);//определяем сколько всего можно принять изображений
	for ($i=1; $i<=self::$maxcountofuploadingimages; $i++){//для каждого изображения проверяем наличие загрузки	
		if (self::recept($MSQLc,$i,"img".$i)==true){//если изображение загружено во временную папку
			self::$statusimageattached=1;}}}//изображениЯ приложенЫ


	
static public function movingeachimagefromreception($MSQLc){//загружаем изображения в конечную папку
	for ($i=1; $i<=self::$maxcountofuploadingimages; $i++){//для каждого приложенного изображения
		if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если приложенное изображение с текущим индексом присутствует				
			//записываем экземпляры приложенного изображения по его номеру в папку _files и если не удалось загрузить хотя бы один из них, то удаляем его
			if (self::moveimageto_files($i)==false){
				GeneralImagesWork::delete_imagesbynumber($i,"all");
				return false;}}}//удаляем все фотки от первой до текущей из папки времянки, из files и из массива элементы "source"
	return true;} 
				

static public function movingoneimagefromreception($MSQLc,$i){//загружаем изображениЕ по НОМЕРУ в конечную папку (т.к. оно уже занесено в массив)
	//записываем экземпляры приложенного изображения по его номеру в папку _files и если не удалось загрузить хотя бы один из них, то удаляем его
	if (self::moveimageto_files($i)==false){
		GeneralImagesWork::delete_oneimagebynumber($i,"all");
		return false;}//удаляем его из папки времянки и его экземпляры из files и из массива элемент "source"
	return true;} 
	

static public function moveimageto_files($i){//записываем изображение в требуемых экземплярах в папку назначения
	$imagessizesarray=GeneralImagesCalculate::return_imagessizesarray_name();//определяем массив требуемых размеров изображений
	$source=GeneralGlobalVars::pathtoreception."/".GeneralImagesWork::$imagessource['nameinrecept'][$i];//адрес исходника
	//echo($source."<br>");
	$width_source=GeneralImagesWork::$imagessource['width'][$i];//ширина исходника
	$height_source=GeneralImagesWork::$imagessource['height'][$i];//высота исходника
	foreach (GeneralImagesWork::$imagesdestination['name'][$i] as $key => $value){//для каждого элемента массива экземпляров  (ключи заданы уже заранее, исходя из массива размеров)
		//для каждого элемента массива создаем свою копию изображения с требуемыми размерами и загружаем его в папку назначения
		$path_to=GeneralUploadBasic::detectpathfile("images",$value,1);//полный адрес назначения копии изображения
		//echo($path_to."<br>");
		$limit=$imagessizesarray[$key]['limit'];//предел по рамерам
		$square=$imagessizesarray[$key]['square'];//квадратность да/нет
		GeneralImagesCalculate::detect_xywh($i,$key,$square,$width_source,$height_source,$limit,1);//определение ширины, высоты и координат текущей копии
		if (GeneralImagesWork::resize_and_save(
			$source,
			$path_to,
			GeneralImagesWork::$imagesdestination['width_source'][$i][$key],
			GeneralImagesWork::$imagesdestination['height_source'][$i][$key],
			GeneralImagesWork::$imagessource['format'][$i],
			GeneralImagesWork::$imagesdestination['x_source'][$i][$key],
			GeneralImagesWork::$imagesdestination['y_source'][$i][$key],
			GeneralImagesWork::$imagesdestination['width'][$i][$key],
			GeneralImagesWork::$imagesdestination['height'][$i][$key],
			GeneralImagesWork::$imagesdestination['x'][$i][$key],
			GeneralImagesWork::$imagesdestination['y'][$i][$key],
			100,
			'0xffffff')==false){
			return false;}}
	GeneralFiles::delete($source);//удаляем файл из времянки
	return true;}
}
?>