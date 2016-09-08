<?php



class GarageSendTopic{



/*
id
id_user
date_create
number_views
name
themepage
photo
img
img_sizes
content
mark
model
year_production
price
price_int
run
run_int
motor_vol
motor_type
power
state
customs
changing
color
color_hex
basket_type
drive_type
KPP
presense
country_producer
city
region
phone
seller
abs
gbo
computer
conditioner
disks
disk_size
warm_chair
guard
parktronik
security_pillows
salon
toned
amplifier_rudder
electro_gas
electro_glass_up






  `id`,
  `id_user`,
  `date_create`,
  `number_views`,
  `name`,
  `themepage`,
  `photo`,
  `img`,
  `img_sizes`,
  `content`,
  `mark`,
  `model`,
  `year_production`,
  `price`,
  `price_int`,
  `run`,
  `run_int`,
  `motor_vol`,
  `motor_type`,
  `power`,
  `state`,
  `customs`,
  `changing`,
  `color`,
  `color_hex`,
  `basket_type`,
  `drive_type`,
  `KPP`,
  `presense`,
  `country_producer`,
  `city`,
  `region`,
  `phone`,
  `seller`,
  `abs`,
  `gbo`,
  `computer`,
  `conditioner`,
  `disks`,
  `disk_size`,
  `warm_chair`,
  `guard`,
  `parktronik`,
  `security_pillows`,
  `salon`,
  `toned`,
  `amplifier_rudder`,
  `electro_gas`,
  `electro_glass_up`,



*/

//преобразовать значения пробега и цены в удобное число
static public $id_announcement=0;//id своей темы






static public $imagesattachedlist="";
static public $imagesattachedsizeslist="";
static public $photo=0;




//данные при редактировании





static public $array_data=array(//массив данных объявления
"img"=>'',
"mark"=>'',
"model"=>'',
"country_producer"=>'',
"year_production"=>'',
"run"=>'',
"run_int"=>'',
"motor_type"=>'',
"motor_vol"=>'',
"power"=>'',
"KPP"=>'',
"drive_type"=>'',
"basket_type"=>'',
"salon"=>'',
"color"=>'',
"state"=>'',
"presense"=>'',
"customs"=>'',
"changing"=>'',
"seller"=>'',
"city"=>'',
"region"=>'',
"phone"=>'',
"price"=>'',
"price_int"=>'',
"content"=>'',
"electro_glass_up"=>'',
"disks"=>'',
"disk_size"=>'',
"abs"=>'',
"gbo"=>'',
"computer"=>'',
"conditioner"=>'',
"warm_chair"=>'',
"guard"=>'',
"parktronik"=>'',
"security_pillows"=>'',
"toned"=>'',
"amplifier_rudder"=>'',
"electro_gas"=>'',
"name"=>'',
"content_nacked"=>'');



static public function detect_parameters_for_redact($MSQLc){//устанавливаем параметры для библиотеки исходя из данных в БД
$query="
SELECT
	garage.id as id,
	garage.id_user as id_user,
	garage.date_create as date_create,
	garage.number_views as number_views,
	garage.themepage as themepage,
	garage.photo as photo,
	garage.img as img,
	garage.img_sizes as img_sizes,
	garage.content as content,
	garage.mark as mark,
	garage.model as model,
	garage.year_production as year_production,

	garage.run as run,
	garage.run_int as run_int,
	garage.motor_vol as motor_vol,
	garage.motor_type as motor_type,
	garage.power as power,

	garage.color as color,
	garage.color_hex as color_hex,
	garage.basket_type as basket_type,
	garage.drive_type as drive_type,
	garage.KPP as KPP,

	garage.country_producer as country_producer,

	garage.abs as abs,
	garage.gbo as gbo,
	garage.computer as computer,
	garage.conditioner as conditioner,
	garage.disks as disks,
	garage.disk_size as disk_size,
	garage.warm_chair as warm_chair,
	garage.guard as guard,
	garage.parktronik as parktronik,
	garage.security_pillows as security_pillows,
	garage.salon as salon,
	garage.toned as toned,
	garage.amplifier_rudder as amplifier_rudder,
	garage.electro_gas as electro_gas,
	garage.electro_glass_up as electro_glass_up,
	garage_source.content_nacked as content_nacked	
	FROM
		garage
	LEFT JOIN garage_source
		ON garage_source.id=garage.id
	WHERE garage.id='".GeneralGetVars::$num_page."'
	LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);

	foreach(self::$array_data as $key=>$value){
		self::$array_data[$key]=$row[$key];
		
		}}

static public function detect_last_id($MSQLc){//поиск id своей последней темы
	$query="SELECT id FROM garage WHERE id_user='".UsersMyData::$id."' ORDER by id DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	self::$id_announcement=$row['id'];
	return self::$id_announcement;}


static public function return_status__all_maindata_ok(){//проверка, что все нужные данные введены
	if (GeneralGetVars::$var2==1){
		if ($_POST['mark']&&$_POST['model']) {return true;}}

	return false;}


static protected function insert_intogarage($MSQLc){//вставляем объявление в БД
	$query="INSERT 
		INTO garage
		(
		  `id`,
		  `id_user`,
		  `date_create`,
		  `number_views`,
		  `themepage`,
		  `photo`,
		  `img`,
		  `img_sizes`,
		  `content`,
		  `mark`,
		  `model`,
		  `year_production`,
		  `run`,
		  `run_int`,
		  `motor_vol`,
		  `motor_type`,
		  `power`,
		  `color`,
		  `color_hex`,
		  `basket_type`,
		  `drive_type`,
		  `KPP`,
		  `country_producer`,
		  `abs`,
		  `gbo`,
		  `computer`,
		  `conditioner`,
		  `disks`,
		  `disk_size`,
		  `warm_chair`,
		  `guard`,
		  `parktronik`,
		  `security_pillows`,
		  `salon`,
		  `toned`,
		  `amplifier_rudder`,
		  `electro_gas`,
		  `electro_glass_up`
		)
		VALUES( 
		'',
		'".UsersMyData::$id."',
		'".GeneralGlobalVars::$timeunix."',
		'0',
		'".GeneralGetVars::$var2."',
		'',
		'',
		'',
		'".$_POST['content']."',
		'".$_POST['mark']."',
		'".$_POST['model']."',
		'".$_POST['year_production']."',
		'".$_POST['run']."',
		'".$_POST['run_int']."',
		'".$_POST['motor_vol']."',
		'".$_POST['motor_type']."',
		'".$_POST['power']."',
		'".$_POST['color']."',
		'',
		'".$_POST['basket_type']."',
		'".$_POST['drive_type']."',
		'".$_POST['KPP']."',
		'".$_POST['country_producer']."',
		'".$_POST['abs']."',
		'".$_POST['gbo']."',
		'".$_POST['computer']."',
		'".$_POST['conditioner']."',
		'".$_POST['disks']."',
		'".$_POST['disk_size']."',
		'".$_POST['warm_chair']."',
		'".$_POST['guard']."',
		'".$_POST['parktronik']."',
		'".$_POST['security_pillows']."',
		'".$_POST['salon']."',
		'".$_POST['toned']."',
		'".$_POST['amplifier_rudder']."',
		'".$_POST['electro_gas']."',
		'".$_POST['electro_glass_up']."'
		)
		";
	return GeneralMYSQL::query_insert($MSQLc,$query);}
























static protected function insert_intogarage_source($MSQLc){//вставляем объявление в БД
	$query="INSERT 
		INTO garage_source
		(
		  `id`,
		  `content_nacked`
		)
		VALUES( 
		'".self::$id_announcement."',
		'".$_POST['contentnacked']."'
		)
		";
	return GeneralMYSQL::query_insert($MSQLc,$query);}





























	
	/*
static public function plus_automarket_to_user($MSQLc){//запись к себе в reg_users_main_data, что я разместил еще одно объявление
	$query="UPDATE registrated_users___main_data SET my_markets_auto=my_markets_auto+1 WHERE id_user='".UsersMyData::$id."' LIMIT 1";
	GeneralMYSQL::query_update($MSQLc,$query);}	

static public function minus_automarket_from_user($MSQLc){//удаляем у себя одно объявление в reg_users_main_data
	$query="UPDATE registrated_users___main_data SET my_markets_auto=my_markets_auto-1 WHERE id_user='".UsersMyData::$id."' LIMIT 1";
	GeneralMYSQL::query_update($MSQLc,$query);}	*/	

static public function setnameforimages($MSQLc){//задаем имена всем подгруженным картинкам
	for ($i=1; $i<=GarageForreg::maxrattachedimages; $i++){
		if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть
			foreach (GeneralImagesCalculate::$imagessizes_garage as $key=>$value){//для каждого элемента массива экземпляров
				GeneralImagesWork::$imagesdestination['name'][$i][$key]=$i."_".$key.".".GeneralImagesWork::$imagessource['format'][$i];}}}}	

	
static public function makelistattachedimages($type){//формируем список приложенных изображений, по типу копии (вид размера)
	if (GeneralImagesUpload::$statusimageattached==1){//если изображения приложены
		for ($i=1; $i<=GarageForreg::maxrattachedimages; $i++){//для каждого возможно приложенного изображения
			if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть
				self::$imagesattachedlist.=" ".GeneralImagesWork::$imagesdestination['name'][$i][$type]." ";}}}}
				
			
static public function makelistattachedsizesimages($type){//формируем список размеров приложенных изображений, по типу копии (вид размера)
	if (GeneralImagesUpload::$statusimageattached==1){//если изображения приложены
		for ($i=1; $i<=GarageForreg::maxrattachedimages; $i++){//для каждого возможно приложенного изображения
			if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть		
				self::$imagesattachedsizeslist.=" ".GeneralImagesWork::$imagesdestination['width'][$i][$type]."x".GeneralImagesWork::$imagesdestination['height'][$i][$type]." ";}}}}
				
	
static public function put_data_of_images_to_DB($MSQLc){//записываем данные приложенных изображений в БД
	if ((self::$imagesattachedlist)&&(self::$imagesattachedsizeslist)){//если обе записи не пусты
		$query="UPDATE garage SET img='".self::$imagesattachedlist."',img_sizes='".self::$imagesattachedsizeslist."', photo='".self::$photo."' WHERE id='".self::$id_announcement."' LIMIT 1";
		GeneralMYSQL::query_update($MSQLc,$query);}}	
	

	
	
	
static public function setnameforoneimage($MSQLc,$i){//задаем имЯ подгруженнОЙ картинкЕ ПО НОМЕРУ
	if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если приложенное изображение с текущим индексом присутствует	
		foreach (GeneralImagesCalculate::$imagessizes_garage as $key=>$value){//для каждого элемента массива размеров
			GeneralImagesWork::$imagesdestination['name'][$i][$key]=$i."_".$key.".".GeneralImagesWork::$imagessource['format'][$i];}}}
	
	
	
	

static public function detect_photo_in_announcement($list){//проверяем - есть ли приложенное фото
	if ($list!="") {self::$photo=1;}}
	
static public function new_announcement($MSQLc){//отправляем новую тему
	if (self::return_status__all_maindata_ok()==true){//проверка, что все нужные данные введены	
    
		GeneralImagesUpload::loadimagestoreception($MSQLc,GarageForreg::maxrattachedimages);//проверяем наличие приложенных изображений перед загрузкой и, если они есть, загружаем их во временную папку, проверяем их и если не соответствует требованиям безопасности хотя бы одно, то удаляем все	
		if (GeneralImagesUpload::$statusimageattached==1){//если изображение приложено и проверено    
            
		GarageForreg::$status_announcement=1; //статус объявления (0-просмотр, 1-новое, 2-редактирование)	
		self::insert_intogarage($MSQLc);//запись текстовых данных в БД
		self::detect_last_id($MSQLc);//поиск id своей последней темы		
		self::insert_intogarage_source($MSQLc);//запись исходника описания в БД
		GeneralGetVars::$var3=self::$id_announcement;
		//self::plus_automarket_to_user($MSQLc);//запись к себе в reg_users_main_data, что я разместил еще одно объявление

			self::setnameforimages($MSQLc);//присвоение в массив имени для каждой картинки
			if (GeneralImagesUpload::movingeachimagefromreception($MSQLc)==true){//перемещение картинок из временного хранилища в папку _files с автоматическим удалением из временной папки,если удачно (иначе автоматически удаление картинок из временной папки и папки _files)
				self::makelistattachedimages(3);//формируем список приложенных изображений, по типу копии (вид размера)
				self::makelistattachedsizesimages(1);//формируем список размеров приложенных изображений, по типу копии (вид размера)
				self::detect_photo_in_announcement(self::$imagesattachedsizeslist);//проверяем - есть ли приложенное фото
				self::put_data_of_images_to_DB($MSQLc);}}}}//записываем данные приложенных изображений в БД

		
		


static protected function update_announcement($MSQLc){//обновляем запись в ДБ
	//создаем запись в базе сообщений
	$query="UPDATE 
		garage 
		SET
		  `date_create`='".GeneralGlobalVars::$timeunix."',
		  `number_views`=0,
		  `photo`=".self::$photo.",
		  `img`='".GeneralImagesWork::$imagesnameslist."',
		  `img_sizes`='".GeneralImagesWork::$imagessizeslist."',
		  `content`='".$_POST['content']."',
		  `mark`='".$_POST['mark']."',
		  `model`='".$_POST['model']."',
		  `year_production`='".$_POST['year_production']."',
		  `run`='".$_POST['run']."',
		  `run_int`='".$_POST['run_int']."',
		  `motor_vol`='".$_POST['motor_vol']."',
		  `motor_type`='".$_POST['motor_type']."',
		  `power`='".$_POST['power']."',
		  `color`='".$_POST['color']."',
		  `color_hex`='',
		  `basket_type`='".$_POST['basket_type']."',
		  `drive_type`='".$_POST['drive_type']."',
		  `KPP`='".$_POST['KPP']."',
		  `country_producer`='".$_POST['country_producer']."',
		  `abs`='".$_POST['abs']."',
		  `gbo`='".$_POST['gbo']."',
		  `computer`='".$_POST['computer']."',
		  `conditioner`='".$_POST['conditioner']."',
		  `disks`='".$_POST['disks']."',
		  `disk_size`='".$_POST['disk_size']."',
		  `warm_chair`='".$_POST['warm_chair']."',
		  `guard`='".$_POST['guard']."',
		  `parktronik`='".$_POST['parktronik']."',
		  `security_pillows`='".$_POST['security_pillows']."',
		  `salon`='".$_POST['salon']."',
		  `toned`='".$_POST['toned']."',
		  `amplifier_rudder`='".$_POST['amplifier_rudder']."',
		  `electro_gas`='".$_POST['electro_gas']."',
		  `electro_glass_up`='".$_POST['electro_glass_up']."'
		WHERE
			id='".GeneralGetVars::$num_page."'";
	return GeneralMYSQL::query_update($MSQLc,$query);}

		
		
static protected function update_announcement_content_source($MSQLc){//обновляем запись в ДБ
	//создаем запись в базе сообщений
	$query="UPDATE 
		garage_source 
		SET
		  `content_nacked`='".$_POST['contentnacked']."'
		WHERE
			id='".GeneralGetVars::$num_page."'";
	return GeneralMYSQL::query_update($MSQLc,$query);}		
		
		
static public function redact_announcement($MSQLc){//редактируем тему

	GarageForreg::detect_autor($MSQLc);//определение автора
	if (GarageForreg::detect_belong_announcement_to_user()==true){//если можно редактировать
		GarageForreg::$status_announcement=2; //статус объявления (0-просмотр, 1-новое, 2-редактирование)	
		if (self::return_status__all_maindata_ok()==true){//проверка, что все нужные данные введены	
		
			GeneralImagesUpload::loadredactingimagesFull_Garage($MSQLc,3);//проверяем и загружаем картинки во временное хранилище и сразу в файлы при редактировании, 3 - размер изображения, который будет находиться в тексте изображений в БД

			GeneralImagesWork::set_lists_from_array_of_attached_images_for_redact();//формируем список для изображений редактируемого сообщения (имена, и размеры) для редактируемого сообщения	
			self::detect_photo_in_announcement(GeneralImagesWork::$imagesnameslist);//проверяем - есть ли приложенное фото
	
			self::update_announcement($MSQLc);//обновляем запись в БД
			self::update_announcement_content_source($MSQLc);
			GeneralGetVars::$var3=GeneralGetVars::$num_page;//задаем страницу для перехода
			GeneralGetVars::$num_page="";
			
			}}}//обновляем запись в ДБ


static public function delete_topic_from_db($MSQLc){//удалить тему из БД
	$query="
	DELETE
	FROM
		garage
	WHERE 	
		id='".GeneralGetVars::$var3."'		
		";
	GeneralMYSQL::query_delete($MSQLc,$query);}






	
static public function delete_announcement($MSQLc){//удаляем тему

	GarageForreg::detect_autor($MSQLc);//определение автора
	if (GarageForreg::detect_belong_announcement_to_user()==true){//если можно редактировать	

		//удаляем все фото
		GeneralFiles::deletedir(GeneralGlobalVars::pathtofiles."/images/".GeneralGetVars::$var1."/".GeneralGetVars::$var3);

		//удаляем тему, за ней автоматически все коментарии, исходник описания и фото в БД
		self::delete_topic_from_db($MSQLc);		

		//декрементируем у себя число созданных объявлений
		//self::minus_automarket_from_user($MSQLc);
		
		//меняем место положения на начало раздела
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";		
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