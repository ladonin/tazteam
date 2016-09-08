<?php   


//если мы удаляем фото в теме, то мы обнуляем page_photo предыдущих фоток в этой теме





class PhotoBase{



static public $array_topics=array();//массив в который помещаются темы, для "рандома", чтобы можно было посчитать сколько их всего и оценить количество, и считать потом
static public $list_topics;//список в который помещаются темы, для "рандома", чтобы можно было посчитать сколько их всего и оценить количество, и считать потом





static public $flagonephoto=1;//идентификатор того, что фото в теме единственное

static public $id_next_photo="";//следующее фото (для подгрузки)
static public $id_next_topic="";//следующая тема
static public $format_next_photo="";//следующее фото (для подгрузки)

		
		
		
static public $id_autor_topic=0;//идентификатор автора темы
static public $id_photo_page=0;//идентификатор фото при соответствующем номере страницы
static public $next_num_page_photo=0;//на какую страницу идем дальше (или переходим из submit)
static public $current_num_page_photo=0;//временное значение номера страницы фотографии (много раз меняется на странице)
static public $left_num_photo_in_list=0;//с какого номера из списка фотографий в БД сместились влево
static public $sqlmessagestablename="";//имя таблицы комментариев
static public $sqltopicstablename="";//имя таблицы тем
static public $sqlphotostablename="";//имя таблицы фотографий
const left_from_cur_image_in_list=3;//на сколько фотографий должны сместиться влево от текущего фото (при списке фотографий)
const count_photos_self_in_list=20;//сколько максимально показываем фото со своей темы (разрешение экрана всегда должно быть не меньше чем (ширина фото*количество фотографий), если фотографий больше нет, то их заменят фото случайные)
const count_photos_random_in_list=16;//сколько максимально показываем фото с чужих тем (разрешение экрана всегда должно быть не меньше чем (ширина фото*количество фотографий), если фотографий больше нет, то их заменят фото случайные)

static public function detect_autor_topic($MSQLc){//определяем автора темы
	$query="SELECT id_user FROM photo___topics_".GeneralGetVars::$var2." WHERE id_topic='".GeneralGetVars::$var3."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);	
	self::set_autor_topic($row['id_user']);}

	
static public function detect_current_num_page_photo($MSQLc,$page_photo,$id_photo,$id_topic,$id_section){//определяем временное значение номера страницы фотографии (много раз меняется на странице)
	if ($page_photo<1){//если не задан номер страницы у текущей фотографии, то мы определяем его и записываем в БД
		GeneralPagesCounter::calculate_current($MSQLc, "photo___photos_".$id_section,"id_topic='".$id_topic."'","id_photo<='".$id_photo."'",0,0,0);
		PhotoBase::update_page_photo($MSQLc,GeneralPagesCounter::$N_cur_current,"id_topic='".$id_topic."'","id_photo='".$id_photo."'",0,0,0);
		PhotoBase::$current_num_page_photo=GeneralPagesCounter::$N_cur_current;}
		else {
			PhotoBase::$current_num_page_photo=$page_photo;}


}	
	
	
	
	

static public function set_autor_topic($autor){//устанавливаем автора темы
	self::$id_autor_topic=$autor;}


static public function detect_belong_topic_to_user(){//проверяем принадлежность темы к пользователю
	if (UsersMyData::$id==self::$id_autor_topic){return true;}//если мы - автор
	if (GeneralSecurity::detect_administrator()==true) {return true;}//если мы - администратор
	return false;}
	
static public function detect_and_return_left_num_photo(){//определяем на сколько фотографий смещаемся влево от текущего фото (при списке фотографий)
	self::$left_num_photo_in_list=GeneralGetVars::$num_page-self::left_from_cur_image_in_list; 
	if (self::$left_num_photo_in_list<0) {
		self::$left_num_photo_in_list=0;}
		return self::$left_num_photo_in_list;}

static public function detectsqltable(){//вычисляем имя таблиц
	self::$sqltopicstablename="photo___topics_".GeneralGetVars::$var2;//темы текущего раздела
	self::$sqlphotostablename="photo___photos_".GeneralGetVars::$var2;//фото текущего раздела
	self::$sqlmessagestablename="photo___messages_".GeneralGetVars::$var2;}//комментарии текущего раздела	
	
	

static public function detect_id_photo_page_by_num_page($MSQLc,$page_photo){//определяем идентификатор фото при соответствующем номере страницы
	if ($page_photo<1) {
		$query="SELECT id_photo FROM photo___photos_".GeneralGetVars::$var2." WHERE id_topic='".GeneralGetVars::$var3."' ORDER BY id_photo ASC LIMIT ".(GeneralGetVars::$num_page-1).",1";
		$res=GeneralMYSQL::query($MSQLc,$query);		
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);	
		self::$id_photo_page=$row['id_photo'];}
	else{
		self::$id_photo_page=$page_photo;}}
	
static public function update_page_photo($MSQLc,$value,$condition1,$condition2,$condition3,$condition4,$condition5){//обновляем номер страницы у фотографии
	$query="UPDATE photo___photos_".GeneralGetVars::$var2." SET page_photo='".$value."'";
	if ($condition1) {$query.=" WHERE ".$condition1;}	
	if ($condition2) {$query.=" AND ".$condition2;}
	if ($condition3) {$query.=" AND ".$condition3;}
	if ($condition4) {$query.=" AND ".$condition4;}
	if ($condition5) {$query.=" AND ".$condition5;}	
	GeneralMYSQL::query_update($MSQLc,$query);}
		
		
		
static public function detect_next_num_page_photo($MSQLc,$cur_id,$idkey,$id_topic){//определяем на какую страницу идем дальше и опделедяем её url, чтобы её подгрузить
//	$query="SELECT id_photo,page_photo,format_photo FROM photo___photos_".GeneralGetVars::$var2." WHERE id_topic='".GeneralGetVars::$var3."' AND id_photo>'".$cur_id."' ORDER by id_photo ASC LIMIT 1";
	$query="
    SELECT id_topic,idkey,id_photo,page_photo,format_photo 
        FROM photo___photos_".GeneralGetVars::$var2." 
        WHERE idkey>".$idkey."       
        ORDER by idkey ASC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
    $row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);	
	if ($row['idkey']<1){
		self::$next_num_page_photo=1;
//		$query="SELECT id_photo,page_photo,format_photo FROM photo___photos_".GeneralGetVars::$var2." WHERE id_topic='".GeneralGetVars::$var3."' ORDER by id_photo ASC LIMIT 1";
		$query="SELECT id_topic,idkey,id_photo,page_photo,format_photo 
            FROM photo___photos_".GeneralGetVars::$var2." 
            ORDER by idkey ASC LIMIT 1";
		$res=GeneralMYSQL::query($MSQLc,$query);		
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);	
		self::$id_next_photo=$row['id_photo'];
        self::$id_next_topic=$row['id_topic'];
		self::$format_next_photo=$row['format_photo'];}
	else{
		self::$id_next_photo=$row['id_photo'];
        self::$id_next_topic=$row['id_topic'];
		self::$format_next_photo=$row['format_photo'];
		if ($row['page_photo']<1){//если не установлен номер страницы, то определяем его по id фотографии
			self::detect_num_page_photo_from_id($MSQLc,$row['id_photo']);}
		else {
			self::$next_num_page_photo=$row['page_photo'];}}}






//static public function detect_next_num_page_photo($MSQLc,$cur_id){//определяем на какую страницу идем дальше и опделедяем её url, чтобы её подгрузить
//	$query="SELECT id_photo,page_photo,format_photo FROM photo___photos_".GeneralGetVars::$var2." WHERE id_topic='".GeneralGetVars::$var3."' AND id_photo>'".$cur_id."' ORDER by id_photo ASC LIMIT 1";
//	$res=GeneralMYSQL::query($MSQLc,$query);		
//	$row=GeneralMYSQL::fetch_array($res);
//	GeneralMYSQL::free($res);	
//	if ($row['id_photo']<1){
//		self::$next_num_page_photo=1;
//		$query="SELECT id_photo,page_photo,format_photo FROM photo___photos_".GeneralGetVars::$var2." WHERE id_topic='".GeneralGetVars::$var3."' ORDER by id_photo ASC LIMIT 1";
//		$res=GeneralMYSQL::query($MSQLc,$query);		
//		$row=GeneralMYSQL::fetch_array($res);
//		GeneralMYSQL::free($res);	
//		self::$id_next_photo=$row['id_photo'];
//		self::$format_next_photo=$row['format_photo'];}
//	else{
//		self::$id_next_photo=$row['id_photo'];
//		self::$format_next_photo=$row['format_photo'];
//		if ($row['page_photo']<1){//если не установлен номер страницы, то определяем его по id фотографии
//			self::detect_num_page_photo_from_id($MSQLc,$row['id_photo']);}
//		else {
//			self::$next_num_page_photo=$row['page_photo'];}}}
















static public function detect_num_page_photo_from_id($MSQLc,$id){//определяем номер страницы по идентификатору фото
	GeneralPagesCounter::calculate_current($MSQLc, "photo___photos_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'","id_photo<='".$id."'",0,0,0);
	self::$next_num_page_photo=GeneralPagesCounter::$N_cur_current;}// часто применяется именно эта переменная
}
?>