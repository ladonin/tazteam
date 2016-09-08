<?php
class ForumForreg{






static public $statussend=1;//статус отправки сообщения (1=новое,2=редактируемое)
static public $array_messages_number_id=array();//массив с данными id - number
static public $id_mesage_to_redact=0;//какое сообщение редактируем
const maxrattachedimages=3;//максимальное количество приложенных изображений
static public $array_redact_message_attached_photos=array();//массив с приложенными фото в редактируемом сообщении
static public $array_redact_message_empty_photos=array();//массив с отсутствующими фото в редактируемом сообщении (которые можно дописать)


static public $last_id_message=0;//какой id последний, если 0, то не на этой странице
static public $status_redactmessagepanel=0;//показывать или нет панель редактирования сообщения


static public function detect_to_redact_basic($MSQLc){//обще определяем редактирование сообщения
	self::detect_id_mesage_to_redact();
	if (self::detect_autority_to_work_width_message(self::$id_mesage_to_redact,$MSQLc)==true){//если мы зарегистрированы, подали заявку на редактирование и это наше сообщение, то мы его редактируем
			self::$statussend=2;}}

static public function set_array_messages_number_id($number,$id){//заполняем массив с данными id - number
	self::$array_messages_number_id[$number]=$id;}

static public function returnlastidmessage($MSQLc){//возвращаем id последнего сообщения
	$query="SELECT id_message FROM ".ForumBase::$sqlmessagestablename." WHERE id_topic='".GeneralGetVars::$var3."' ORDER BY id_message DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['id_message'];}



static public function detect_status_for_redactmessage_panel($MSQLc){//возвращаем статус для возможности редактирования сообщения
	if ((GeneralPagesCounter::$N_max==GeneralPagesCounter::$N_cur)||(GeneralSecurity::detect_administrator()==true)){
		self::$last_id_message=self::returnlastidmessage($MSQLc);
		self::$status_redactmessagepanel=1;}}



static public function detect_available_to_redact_or_delete_message($id_message,$id_autor_message){//можно ли удалять или редактировать сообщение
	if (GeneralSecurity::detect_administrator()==true) {return true;}//если мы - администратор
	//если сообщение прнадлежит ему
	if ($id_autor_message==UsersMyData::$id){
		//если это сообщение последнее
		if ($id_message==self::$last_id_message){
			return true;}}
	return false;}

static public function detect_id_mesage_to_redact(){//какое сообщение редактируем
	self::$id_mesage_to_redact=self::$array_messages_number_id[GeneralGetVars::$redact_message];}

static public function return_autor_message($id_message,$MSQLc){//выводим автора сообщения
	$query="SELECT id_user FROM ".ForumBase::$sqlmessagestablename." WHERE id_topic='".GeneralGetVars::$var3."' AND id_message='".$id_message."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['id_user'];}

static public function detect_autority_to_work_width_message($id_message,$MSQLc){//проверяем реальность автора для рабты с сообщением
	if (GeneralSecurity::detect_administrator()==true) {return true;}//если мы - администратор
	if($id_message>0){
		if (UsersMyData::$id==self::return_autor_message($id_message,$MSQLc)) {return true;}}//если мы - автор

	return false;}





static public function detect_availability_to_delete_topic($id_topic,$MSQLc){//проверяем реальность автора для рабты с темой
	if (GeneralSecurity::detect_administrator()==true) {return true;}//если мы - администратор
	//если нет чужих сообщений
	$query="SELECT id_user FROM ".ForumBase::$sqlmessagestablename." WHERE id_topic='".$id_topic."' AND id_user!='".UsersMyData::$id."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);

	if ($row['id_user']>0) {return false;}
	return true;}

static public function return_autor_topic($id_topic,$MSQLc){//узнаем автора темы
	//если нет чужих сообщений
	$query="SELECT id_user FROM ".ForumBase::$sqlmessagestablename." WHERE id_topic='".$id_topic."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	if ($row['id_user']>0) {return $row['id_user'];}
	return false;}




static public function minus_message_to_user($MSQLc,$id_user){//вычитаем из сообщений пользователя 1 сообщение
	$query="UPDATE registrated_users___main_data SET forums_messages=forums_messages-1 WHERE id_user='".$id_user."' LIMIT 1";
	GeneralMYSQL::query_update($MSQLc,$query);}


static public function return_text_images_from_message($id_message,$MSQLc){//выводим список приложенных изображений
	$query="SELECT imagesattached FROM ".ForumBase::$sqlmessagestablename." WHERE id_topic='".GeneralGetVars::$var3."' AND id_message='".$id_message."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	return $row['imagesattached'];}

static public function set_arrays_for_message_photos_in_redact($MSQLc){//устанавливаем массивы для приложенных фоток в редактируемом сообщении
	$array_message_attached_photos_text=explode(" ",self::return_text_images_from_message(self::$id_mesage_to_redact,$MSQLc));//массив с текстами приложенных фоток
	for ($i=1; $i<=self::maxrattachedimages; $i++){//для каждого возможно приложенного изображения
		self::$array_redact_message_empty_photos[$i]=1;}// делаем массив, в котором потом будет только список пустых номеров для вставки фото
	foreach($array_message_attached_photos_text as $key=>$value){//перебираем приложенные фотки
		if ($value){
			$words = preg_split("/\_/",$value);//берем номер изображения (пример 1_2_3.jpeg - номер 2)
			$image = trim($value);//название изображения
			self::$array_redact_message_attached_photos[$words[1]]=$image;//прикладываем к массиву приложеное фото
			unset(self::$array_redact_message_empty_photos[$words[1]]);}}}//убираем из массива элемент, т.к. он не пустой

static public function return_text_message_source($id,$MSQLc){//выводим исходник сообщения
	$query="SELECT text_message_source FROM ".ForumBase::$sqlmessagestablename." WHERE id_topic='".GeneralGetVars::$var3."' AND id_message='".$id."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['text_message_source'];}












static public function display_images_in_redact_message(){//определяем фотографии в редактируемом сообщении
	foreach(self::$array_redact_message_attached_photos as $key=>$value){//перебираем приложенные фотки
		echo("

<img src=\"".GeneralGlobalVars::url."/".GeneralGlobalVars::pathtofiles."/images/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3."/".$value."\" width=\"225\">
<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
<tr id=\"imgupdate".$key."\">
<td align=\"left\" valign=\"middle\" class=\"content_dark\" width=\"70\"><div class=\"v_i_s\"></div>Обновить:</td>
<td align=\"left\" class=\"padding_left_10\"><div class=\"v_i_s\"></div><input type=\"file\" name=\"img".$key."\" id=\"img".$key."\"></td>
</tr>
<tr>
<td align=\"left\" valign=\"middle\" class=\"content_dark\" width=\"70\"><div class=\"v_i_s\"></div>Удалить:</td>
<td align=\"left\" class=\"padding_left_10\"><div class=\"v_i_s\"></div><input type=\"checkbox\" name=\"imgdelete".$key."\" id=\"imgdelete".$key."\" onclick=\"general___swim_show_hide('imgupdate".$key."')\" value=\"1\"></td>
</tr>
</table>
<input type=\"hidden\" name=\"imgredact".$key."\" value=\"1\">
<input type=\"hidden\" name=\"imgname".$key."\" value=\"".$value."\">
<div class=\"v_i_b\"></div>
<div class=\"v_i_b\"></div>
		");}}

static public function display_forms_images_in_redact_message(){//определяем формы отправки для фотографий в редактируемом сообщении
	foreach(self::$array_redact_message_empty_photos as $key=>$value){//перебираем пустые фотки
		echo("

<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
<tr>
<td align=\"left\" valign=\"middle\" class=\"content_dark\" width=\"70\"><div class=\"v_i_s\"></div>Загрузить:</td>
<td align=\"left\" class=\"padding_left_10\"><div class=\"v_i_s\"></div><input type=\"file\" name=\"img".$key."\" id=\"img".$key."\"></td>
</tr>
</table>

		");}}





}






?>