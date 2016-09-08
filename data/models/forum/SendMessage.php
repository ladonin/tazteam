<?php   
class ForumSendMessage{
static public $inputmessageenable=0;//подтвеждение, что письмо содержит текст
static public $imagesattachedlist="";//список приложенных изображений
static public $imagesattachedsizeslist="";//список размеров приложенных изображений
static public $idsendmessage=0;//id нашего сообщения
static public $idcitatedmessage=0;//id цитируемого сообщения
static public $imagesredacting=0;//флаг, что мы редактируем изображения
static public $redactdifferenceenable=0;//флаг, что наше редактирование удачно





static public function revisioninputntext(){//проверяем корректность текста
	if (GeneralSecurity::revisioninputtext('inputtextnacked')==true){//если нашли словестный символ
		self::$inputmessageenable=1;
		return true;}
	return false;}

		
		
		
		
		
static public function revisiondifferenceinredact($MSQLc){//проверяем наличие разницы перед загрузкой
	self::revisioninputntext();//проверяем наличие текста перед загрузкой
	if (self::$inputmessageenable==1) {//если текст есть
		for($i=1;$i<=ForumForreg::maxrattachedimages;$i++){//для каждого изображения проверяем - меняем ли мы тут что-нибудь
			if (@$_POST['imgdelete'.$i]==1) {self::$imagesredacting=1;}			
			if (!empty($_FILES['img'.$i]['tmp_name'])){self::$imagesredacting=1;}}
		if ((ForumForreg::return_text_message_source($_POST['idmessagetoredact'],$MSQLc)!==$_POST['inputtexttextarea'])||(self::$imagesredacting==1)){//если сделали изменение
		self::$redactdifferenceenable=1;}}}		
		
		
		
		
		
		
		
		
static public function makelistattachedimages($type){//формируем список приложенных изображений, по типу копии (вид размера)
	if (GeneralImagesUpload::$statusimageattached==1){//если изображения приложены
		for ($i=1; $i<=ForumForreg::maxrattachedimages; $i++){//для каждого возможно приложенного изображения
			if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть
				self::$imagesattachedlist.=" ".GeneralImagesWork::$imagesdestination['name'][$i][$type]." ";}}}}
				
				

				
				
				
				
				
				
static public function makelistattachedsizesimages($type){//формируем список размеров приложенных изображений, по типу копии (вид размера)
	if (GeneralImagesUpload::$statusimageattached==1){//если изображения приложены
		for ($i=1; $i<=ForumForreg::maxrattachedimages; $i++){//для каждого возможно приложенного изображения
			if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть		
				self::$imagesattachedsizeslist.=" ".GeneralImagesWork::$imagesdestination['width'][$i][$type]."x".GeneralImagesWork::$imagesdestination['height'][$i][$type]." ";}}}}
				

			
			



static public function return_imagesnames_from_DB($id,$MSQLc){//выводим имена загруженных в БД изображений
	$query="SELECT imagesattached FROM ".ForumBase::$sqlmessagestablename." WHERE id_topic='".GeneralGetVars::$var3."' AND id_message='".$id."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);		
	return $row['imagesattached'];}

static public function return_imagessizes_from_DB($id,$MSQLc){//выводим размеры загруженных в БД изображений
	$query="SELECT imagesattached_sizes FROM ".ForumBase::$sqlmessagestablename." WHERE id_topic='".GeneralGetVars::$var3."' AND id_message='".$id."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);		
	return $row['imagesattached_sizes'];}


static public function delete_images_in_message($id,$MSQLc){//удаляем приложенные к сообщению фотографии
	$textimages=self::return_imagessizes_from_DB($id,$MSQLc);
	$textimagesarray=explode(" ",$textimages);
	foreach($textimagesarray as $key=>$value){
		if ($value){
			$value=str_replace("_([0-9]+).",".",$value);//имя изображения для каждого вида размеров
			GeneralImagesWork::hard_delete_oneimagebynumber($value);}}}//удаляем фото со всеми его копиями из файлов
		

	
	
static public function set_new_number_page($MSQLc){//устанавливаем новый номер страницы форума	
	GeneralPagesCounter::calculate($MSQLc, "forum___messages_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'",0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3);//пересчитываем все параметры
	GeneralGetVars::$num_page=GeneralPagesCounter::$N_max;}


static public function put_data_of_images_to_DB($MSQLc){//записываем данные приложенных изображений в БД
	if ((self::$imagesattachedlist)&&(self::$imagesattachedsizeslist)){//если обе записи не пусты
		$query="UPDATE ".ForumBase::$sqlmessagestablename." SET imagesattached='".self::$imagesattachedlist."',imagesattached_sizes='".self::$imagesattachedsizeslist."' WHERE id_topic='".GeneralGetVars::$var3."' AND id_message='".self::$idsendmessage."' LIMIT 1";
		GeneralMYSQL::query_update($MSQLc,$query);}}

			
			
static public function plus_message_to_user($MSQLc){//начисляем пользователю +1 к сообщениям форума
	$query="UPDATE registrated_users___making_by SET forums_messages=forums_messages+1 WHERE id_user='".UsersMyData::$id."' LIMIT 1";
	GeneralMYSQL::query_update($MSQLc,$query);}
static public function plus_message_to_topic($MSQLc){//начисляем теме +1 к сообщениям
	$query="UPDATE ".ForumBase::$sqltopicstablename." SET number_messages=number_messages+1 WHERE id_topic='".GeneralGetVars::$var3."' LIMIT 1";//начисляем теме +1 к сообщениям
	GeneralMYSQL::query_update($MSQLc,$query);}				
			
			
static public function action_after_send_message($MSQLc){//после отправки собщения что делаем
	self::plus_message_to_user($MSQLc);//начисляем пользователю +1 к сообщениям форума
	self::plus_message_to_topic($MSQLc);//начисляем теме +1 к сообщению
	self::setnameforimages($MSQLc);//задаем изображениям конечное имя
	if (self::finishloadimages($MSQLc)==true){//грузим изображения	
		self::makelistattachedimages(1);//формируем список приложенных изображений, для отображения В СООБЩЕНИЯХ
		self::makelistattachedsizesimages(2);//формируем список ИСХОДНЫХ размеров приложенных изображений (реальные размеры вычисляются через GeneralPageBasic::set_size_for_image_in_view($textsize,$type))
		self::put_data_of_images_to_DB($MSQLc);}//записываем данные возможных приложенных изображений в БД
	self::set_new_number_page($MSQLc);//устанавливаем новый номер страницы форума
	GeneralGetVars::$anchor="message".self::$idsendmessage;}//после отправки сообщения куда спускаемся	

	

			
			

	
static public function setidcitatedmessage(){//вычисляем id цитируемого сообщения
	if ($_POST['ForumCitateId']>0){//если он есть и меньше нашего id
		if (isset($_POST['idmessagetoredact'])){//если мы редактируем сообщение
			if ($_POST['ForumCitateId']<$_POST['idmessagetoredact']){self::$idcitatedmessage=$_POST['ForumCitateId'];/*echo(self::$idcitatedmessage."=");*/}}
		else{
			if ($_POST['ForumCitateId']<self::$idsendmessage){self::$idcitatedmessage=$_POST['ForumCitateId'];/*echo(self::$idcitatedmessage."=");*/}}}}	
	

static public function setnameforimages($MSQLc){//задаем имена всем подгруженным картинкам
	for ($i=1; $i<=ForumForreg::maxrattachedimages; $i++){
		if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть
			foreach (GeneralImagesCalculate::$imagessizes_forum as $key=>$value){//для каждого элемента массива экземпляров
				GeneralImagesWork::$imagesdestination['name'][$i][$key]=self::$idsendmessage."_".$i."_".$key.".".GeneralImagesWork::$imagessource['format'][$i];}}}}	
	

static public function setnameforoneimage($MSQLc,$i,$idsendmessage){//задаем имЯ подгруженнОЙ картинкЕ ПО НОМЕРУ и по идентификатору сообщения
	if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если приложенное изображение с текущим индексом присутствует	
		foreach (GeneralImagesCalculate::$imagessizes_forum as $key=>$value){//для каждого элемента массива экземпляров
			GeneralImagesWork::$imagesdestination['name'][$i][$key]=$idsendmessage."_".$i."_".$key.".".GeneralImagesWork::$imagessource['format'][$i];}}}


	
		
static protected function insert_intomessages($MSQLc){//вставляем в ДБ
	self::setidcitatedmessage();//вычисляем id цитируемого сообщения
	//создаем запись в базе сообщений
	$query="INSERT 
		INTO ".ForumBase::$sqlmessagestablename." 
		(
		`id_topic`,
		`id_message`,
		`id_user`,
		`date_message`,
		`number_redactions`,
		`date_last_redaction`,
		`id_message_to_citate`,
		`text_message`,
		`text_message_source`,
		`text_message_nacked`
		)
		VALUES( 
		'".GeneralGetVars::$var3."',
		'".self::$idsendmessage."',
		'".UsersMyData::$id."',
		'".GeneralGlobalVars::$timeunix."',
		'0',
		'0',
		'".self::$idcitatedmessage."',
		'".$_POST['inputtexthtml']."',
		'".$_POST['inputtexttextarea']."',
		'".$_POST['inputtextnacked']."'
		)
		";
	return GeneralMYSQL::query_insert($MSQLc,$query);}
	
	
	
static public function finishloadimages($MSQLc){//общая функция конечной загрузки изображений
	if (GeneralImagesUpload::$statusimageattached==1){//если хотя бы одно изображение приложено			
		return GeneralImagesUpload::movingeachimagefromreception($MSQLc);}//загружаем все исходные изображения со своими копиями в конечную папку
	return false;}

	

static public function send_message($MSQLc){//главная функция отправки сообщения
echo(1);	self::revisioninputntext();//проверяем наличие текста перед загрузкой
	if (self::$inputmessageenable==1){//если в итоге есть смысл
	echo(2);	ForumBase::detectsqltable();//вычисляем имя таблицы для сообщений
		GeneralImagesUpload::loadimagestoreception($MSQLc,ForumForreg::maxrattachedimages);//проверяем наличие приложенных изображений перед загрузкой и, если они есть, загружаем их во временную папку, проверяем их и если не соответствует требованиям безопасности хотя бы одно, то удаляем все	
		self::$idsendmessage=ForumForreg::returnlastidmessage($MSQLc)+1;;//узнаем id для нашего сообщения
		if (self::insert_intomessages($MSQLc)==true) {//если внесли запись в ДБ
			self::action_after_send_message($MSQLc);}//после отправки собщения что делаем
		else {
			/*если не отправлена, то возможно id сменился и порбуем снова загрузить, 
			но с новым id (на всякий случай перескакиваем на 2, случай крайний и редкий, 
			но перескок на 2 не даст ничего плохого, аналогичная ситуация  - удаление старого сообщения, 
			тоже перескок на 2 (разница в id сообщения предыдущего и следующего в этом случае)), если при обределении id вначале, результат будет меньше 1, 
			то все равно id будет равняться 1, т.к. +1)*/
			self::$idsendmessage+=2;//инкрементируем id на 2
			if (self::insert_intomessages($MSQLc)==true) {//если ВСЕ ТАКИ внесли запись в ДБ
				self::action_after_send_message($MSQLc);}//после отправки собщения что делаем			
			else{/*если запись не записывается по непонятным причинам*/
				GeneralImagesWork::delete_imagesbynumber(ForumForreg::maxrattachedimages,"all");//удаляем все и вся о её изображениях
				return false;}}}				
	//UsersSignaturing::signaturing_talkers($MSQLc);//оповещаем всех	


	UsersSignaturing::signaturing_fm($MSQLc,0,GeneralGetVars::$var2,GeneralGetVars::$var3,0,0,0);
	UsersForreg::write_to_mymessages_fm($MSQLc,0,GeneralGetVars::$var2,GeneralGetVars::$var3,0,0,0);
	
	return true;}//если дошли до этого кода, то все в порядке

	
	
	
	






static protected function update_message($MSQLc){//обновляем запись в ДБ
	//создаем запись в базе сообщений
	self::setidcitatedmessage();//вычисляем id цитируемого сообщения
	$query="UPDATE 
		".ForumBase::$sqlmessagestablename." 
		SET		
			`number_redactions`=`number_redactions`+1,
			`date_last_redaction`='".GeneralGlobalVars::$timeunix."',
			`id_message_to_citate`=".self::$idcitatedmessage.",
			`text_message`='".$_POST['inputtexthtml']."',
			`text_message_source`='".$_POST['inputtexttextarea']."',
			`text_message_nacked`='".$_POST['inputtextnacked']."',
			`imagesattached`='".GeneralImagesWork::$imagesnameslist."',
			`imagesattached_sizes`='".GeneralImagesWork::$imagessizeslist."'
		WHERE
			id_topic='".GeneralGetVars::$var3."' 
			AND 
			id_message='".$_POST['idmessagetoredact']."'";
	return GeneralMYSQL::query_update($MSQLc,$query);}



	
static public function redact_message($MSQLc){//главная функция редактирования сообщения
	ForumBase::detectsqltable();//вычисляем имя таблицы для сообщений

	if (ForumForreg::detect_autority_to_work_width_message($_POST['idmessagetoredact'],$MSQLc)==true){	

		self::revisiondifferenceinredact($MSQLc);//проверяем наличие разницы перед загрузкой
		if (self::$redactdifferenceenable==1){//если в итоге есть смысл отправлять все содержимое в базу, то вносим запись в ДБ	
			//ForumBase::detectsqltable();//вычисляем имя таблицы для сообщений
			GeneralImagesUpload::loadredactingimagesFull_Forum($MSQLc,1);//проверяем и загружаем картинки во временное хранилище и сразу в файлы при редактировании
			GeneralImagesWork::set_lists_from_array_of_attached_images_for_redact();//формируем список для изображений редактируемого сообщения (имена, и размеры) для редактируемого сообщения
			self::update_message($MSQLc); //обновляем запись в ДБ	
			GeneralGetVars::$anchor="message".$_POST['idmessagetoredact'];}//после отправки сообщения куда спускаемся
		return true;}//если дошли до этого кода, то все в порядке
	return false;}
	
	
	
static public function delete_message_from_topic($MSQLc){//удалить сообщение из темы
	$query="
	DELETE
	FROM
		".ForumBase::$sqlmessagestablename."
	WHERE 	
		id_topic='".GeneralGetVars::$var3."'
		AND
	 	id_message='".$_POST['id_message']."'
	LIMIT 1";
	GeneralMYSQL::query_delete($MSQLc,$query);}		



static public function minus_message_to_topic($MSQLc){//вычитаем из темы 1 сообщение
	$query="UPDATE ".ForumBase::$sqltopicstablename." SET number_messages=number_messages-1 WHERE id_topic='".GeneralGetVars::$var3."' LIMIT 1";
	GeneralMYSQL::query_update($MSQLc,$query);}	


	
static public function delete_message($MSQLc){//главная функция удаления сообщения
	ForumBase::detectsqltable();

	//поиск автора по id сообщения и проверка - мы ли автор	
	if (ForumForreg::detect_autority_to_work_width_message($_POST['id_message'],$MSQLc)==true){

		//проверка удаляемого сообщения на то ,что оно последнее
		if (($_POST['id_message']==ForumForreg::returnlastidmessage($MSQLc))||(GeneralSecurity::detect_administrator()==true)){

			//проверка удаляемого сообщения на то, что оно не единственное
			if (GeneralPagesCounter::return_whole_rows($MSQLc,ForumBase::$sqlmessagestablename,"id_topic='".GeneralGetVars::$var3."'",0,0,0,0)>1){	

				//удаление картинок
				self::delete_images_in_message($_POST['id_message'],$MSQLc);

				//удаление сообщения
				self::delete_message_from_topic($MSQLc);
			
				//декрементация количества сообщений в темах
				self::minus_message_to_topic($MSQLc);
				
				//декрементация количества сообщений в данных пользователя
				ForumForreg::minus_message_to_user($MSQLc,UsersMyData::$id);
			
			
				//устанавливаем новый номер страницы форума
				self::set_new_number_page($MSQLc);}}}}
	
	
	
	
	
	
	
	




static public function user_status(){


}
static public function like(){


}
static public function detect_type_message(){


}
static protected function citate(){


}
static protected function revision_redact(){


}
static protected function photos_to_mesage(){


}

}
?>