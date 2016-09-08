<?php   


//если мы удаляем фото в теме, то мы обнуляем page_photo предыдущих фоток в этой теме





class UsersPhotoalbumsBase{
static public $flagonephoto=1;//идентификатор того, что фото в теме единственное

static public $id_next_photo="";//следующее фото (для подгрузки)
static public $format_next_photo="";//следующее фото (для подгрузки)

		
//как в галерее
static public $array_users=array();//массив в который помещаются темы, для "рандома", чтобы можно было посчитать сколько их всего и оценить количество, и считать потом
static public $list_users;//список в который помещаются темы, для "рандома", чтобы можно было посчитать сколько их всего и оценить количество, и считать потом
		
		
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
const count_photos_other_random_in_list=16;//сколько максимально показываем фото с других своих альбомов (разрешение экрана всегда должно быть не меньше чем (ширина фото*количество фотографий), если фотографий больше нет, то их заменят фото случайные)
const count_photos_random_in_list=16;//сколько максимально показываем фото с чужих тем (разрешение экрана всегда должно быть не меньше чем (ширина фото*количество фотографий), если фотографий больше нет, то их заменят фото случайные)



static public $find_query="";//запрос поиска/сортировки


static public $find_query_order="";//при поиске или сортировке как сортируем - прямо, обратно




static public $find_status="";//есть поиск или нет - пока не подключен

static public $sort_by=1;//по умолчанию показываем фотоальбомы только хозяина страницы, но не его друзей


static public $condition_main="";//все как в авторынке










































	/*

	static public function write_sql_query_where($MSQLc,$var,$varquery,$type){//$type - 1 точно, 2 - приблизительно
		if (isset($_COOKIE[$var])) {
			if ($_COOKIE[$var]) {
			
			if ($type==1){
				self::$find_query.=" AND ".$varquery."='".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."' ";}
			if ($type==2){
				self::$find_query.=" AND ".$varquery."='".GeneralSecurity::tonumber($_COOKIE[$var])."' ";}
			else {
				self::$find_query.=" AND ".$varquery." LIKE'%".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."%' ";}}}}

		
	static public function set_cookies_find_auto(){	
		GeneralCookies::setglobal("automarket_find_query_themepage",1);	
	

		GeneralCookies::setglobal("automarket_find_query_name",'');	
	
		GeneralCookies::setglobal("automarket_find_query_mark",$_POST['mark']);
		GeneralCookies::setglobal("automarket_find_query_year_production",$_POST['year_production']);		
		GeneralCookies::setglobal("automarket_find_query_motor_type",$_POST['motor_type']);		
		GeneralCookies::setglobal("automarket_find_query_state",$_POST['state']);		
		GeneralCookies::setglobal("automarket_find_query_basket_type",$_POST['basket_type']);		
		GeneralCookies::setglobal("automarket_find_query_drive_type",$_POST['drive_type']);		
		GeneralCookies::setglobal("automarket_find_query_KPP",$_POST['KPP']);		
		GeneralCookies::setglobal("automarket_find_query_price_int",$_POST['price_int']);		
		GeneralCookies::setglobal("automarket_find_query_run_int",$_POST['run_int']);
		GeneralCookies::setglobal("automarket_find_query_model",$_POST['model']);		
		GeneralCookies::setglobal("automarket_find_query_city",$_POST['city']);		
		GeneralCookies::setglobal("automarket_find_query_region",$_POST['region']);	
		
		GeneralCookies::setglobal("automarket_find_status",1);
		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";		
		}
			
	static public function set_cookies_find_else(){		
		GeneralCookies::setglobal("automarket_find_query_themepage",2);			
	
		GeneralCookies::setglobal("automarket_find_query_mark",'');
		GeneralCookies::setglobal("automarket_find_query_year_production",'');		
		GeneralCookies::setglobal("automarket_find_query_motor_type",'');		
		GeneralCookies::setglobal("automarket_find_query_state",'');		
		GeneralCookies::setglobal("automarket_find_query_basket_type",'');		
		GeneralCookies::setglobal("automarket_find_query_drive_type",'');		
		GeneralCookies::setglobal("automarket_find_query_KPP",'');		
		GeneralCookies::setglobal("automarket_find_query_price_int",'');		
		GeneralCookies::setglobal("automarket_find_query_run_int",'');
		GeneralCookies::setglobal("automarket_find_query_model",'');		
		GeneralCookies::setglobal("automarket_find_query_city",'');		
		GeneralCookies::setglobal("automarket_find_query_region",'');	
	
		GeneralCookies::setglobal("automarket_find_query_name",$_POST['name']);
		
		GeneralCookies::setglobal("automarket_find_status",1);
		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";
		}



		
		
	static public function set_cookies_find_else_buy(){
		GeneralCookies::setglobal("automarket_find_query_themepage",3);	

		GeneralCookies::setglobal("automarket_find_query_mark",'');
		GeneralCookies::setglobal("automarket_find_query_year_production",'');		
		GeneralCookies::setglobal("automarket_find_query_motor_type",'');		
		GeneralCookies::setglobal("automarket_find_query_state",'');		
		GeneralCookies::setglobal("automarket_find_query_basket_type",'');		
		GeneralCookies::setglobal("automarket_find_query_drive_type",'');		
		GeneralCookies::setglobal("automarket_find_query_KPP",'');		
		GeneralCookies::setglobal("automarket_find_query_price_int",'');		
		GeneralCookies::setglobal("automarket_find_query_run_int",'');
		GeneralCookies::setglobal("automarket_find_query_model",'');		
		GeneralCookies::setglobal("automarket_find_query_city",'');		
		GeneralCookies::setglobal("automarket_find_query_region",'');	
	
		GeneralCookies::setglobal("automarket_find_query_name",$_POST['name']);
		
		GeneralCookies::setglobal("automarket_find_status",1);
		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";		
		
		}		
		
		
	static public function set_cookies_sort_taz(){
		GeneralCookies::setglobal("automarket_sort_by",1);
		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";}		
	static public function set_cookies_sort_auto(){
		GeneralCookies::setglobal("automarket_sort_by",2);
		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";}		
	static public function set_cookies_sort_else(){
		GeneralCookies::setglobal("automarket_sort_by",3);
		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";}		
	static public function set_cookies_sort_buy(){
		GeneralCookies::setglobal("automarket_sort_by",4);
		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";}		
		
		
		
		
		
	
static public function convert_cookie_find_query($MSQLc){//составляем из всех куков, которые есть
	if (isset($_COOKIE['users_photoalbums_find_status'])){
		if ($_COOKIE['users_photoalbums_find_status']>0){
		self::$find_status=$_COOKIE['users_photoalbums_find_status'];
		if(self::$find_status==1){
			self::$find_query="";//предварительно очищаем текст запроса
			self::write_sql_query_where($MSQLc,"automarket_find_query_themepage","themepage",2);			
			self::write_sql_query_where($MSQLc,"automarket_find_query_mark","mark",2);
			self::write_sql_query_where($MSQLc,"automarket_find_query_year_production","year_production",2);
			self::write_sql_query_where($MSQLc,"automarket_find_query_motor_type","motor_type",2);
			self::write_sql_query_where($MSQLc,"automarket_find_query_state","state",2);
			self::write_sql_query_where($MSQLc,"automarket_find_query_basket_type","basket_type",2);
			self::write_sql_query_where($MSQLc,"automarket_find_query_drive_type","drive_type",2);
			self::write_sql_query_where($MSQLc,"automarket_find_query_KPP","KPP",2);
			self::write_sql_query_where($MSQLc,"automarket_find_query_price_int","price_int",2);
			self::write_sql_query_where($MSQLc,"automarket_find_query_run_int","run_int",2);
			self::write_sql_query_where($MSQLc,"automarket_find_query_model","model",3);
			self::write_sql_query_where($MSQLc,"automarket_find_query_city","city",3);		
			self::write_sql_query_where($MSQLc,"automarket_find_query_region","region",3);	
			self::write_sql_query_where($MSQLc,"automarket_find_query_name","name",3);		
				
			self::$find_query=GeneralSecurity::return_safe_outside_sql_query(self::$find_query);
			self::$condition_main="WHERE 1".self::$find_query;}}}}
		
			
static public function 	clear_find(){//очищаем поиск		
		GeneralCookies::setglobal("automarket_find_query_themepage",'');	
		GeneralCookies::setglobal("automarket_find_query_mark",'');
		GeneralCookies::setglobal("automarket_find_query_year_production",'');		
		GeneralCookies::setglobal("automarket_find_query_motor_type",'');		
		GeneralCookies::setglobal("automarket_find_query_state",'');		
		GeneralCookies::setglobal("automarket_find_query_basket_type",'');		
		GeneralCookies::setglobal("automarket_find_query_drive_type",'');		
		GeneralCookies::setglobal("automarket_find_query_KPP",'');		
		GeneralCookies::setglobal("automarket_find_query_price_int",'');		
		GeneralCookies::setglobal("automarket_find_query_run_int",'');
		GeneralCookies::setglobal("automarket_find_query_model",'');		
		GeneralCookies::setglobal("automarket_find_query_city",'');		
		GeneralCookies::setglobal("automarket_find_query_region",'');	
		GeneralCookies::setglobal("automarket_find_query_name",'');			
		GeneralCookies::setglobal("automarket_find_status",'');		
			}

			
			
			*/
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			











































static public function set_sort($MSQLc){//что выбираем на главной странице при переходе на неё
	//1 - мои альбомы
	//2 - моих друзей
	//3 - другие альбомы
	if(UsersBase::$its_mypage==1){}

		if (isset($_COOKIE['users_photoalbums_sort_by'])){
			if ($_COOKIE['users_photoalbums_sort_by']==2) {self::$sort_by=2;}
			else if ($_COOKIE['users_photoalbums_sort_by']==3) {self::$sort_by=3;}}
			
	if (self::$sort_by==1){
		self::$find_query=" AND id_user='".GeneralGetVars::$var2."'";}
	else if (self::$sort_by==2){
		UsersBase::detect_friendslist_from_text($MSQLc,GeneralGetVars::$var2);
		self::$find_query=" AND id_user IN (".UsersBase::$friends_list.")";
		self::$find_query_order=" ORDER by pa.id_user DESC, pa.id_album DESC";}
	else if (self::$sort_by==3){
		self::$find_query=" ";
		self::$find_query_order=" ORDER by pa.id_user DESC, pa.id_album DESC";}
		
	self::$condition_main="WHERE 1 ".self::$find_query;}


	

		
	static public function set_cookies_sort_photoalbums_by_my(){
		GeneralCookies::setglobal("users_photoalbums_sort_by",1);
		GeneralGetVars::$num_page=1;}		
	static public function set_cookies_sort_photoalbums_by_friends(){
		GeneralCookies::setglobal("users_photoalbums_sort_by",2);
		GeneralGetVars::$num_page=1;}		
	static public function set_cookies_sort_photoalbums_by_another(){
		GeneralCookies::setglobal("users_photoalbums_sort_by",3);
		GeneralGetVars::$num_page=1;}		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
static public function return_line_of_friends(){
	return implode(",",UsersBase::$friends_array);}



static public function detect_autor_topic($MSQLc){//определяем автора темы
	$query="SELECT id_user FROM registrated_users___photoalbums WHERE id_user='".GeneralGetVars::$var2."' AND id_album='".GeneralGetVars::$var4."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);	
	self::set_autor_topic($row['id_user']);}

	
static public function detect_current_num_page_photo($MSQLc,$page_photo,$id_photo,$id_album,$id_user){//определяем временное значение номера страницы фотографии (много раз меняется на странице)
	if ($page_photo<1){//если не задан номер страницы у текущей фотографии, то мы определяем его и записываем в БД
		GeneralPagesCounter::calculate_current($MSQLc, "registrated_users___photoalbums_photos","id_user='".$id_user."'","id_album='".$id_album."'","id_photo<='".$id_photo."'",0,0,0);
		self::update_page_photo($MSQLc,GeneralPagesCounter::$N_cur_current,"id_user='".$id_user."'","id_album='".$id_album."'","id_photo='".$id_photo."'",0,0);
		self::$current_num_page_photo=GeneralPagesCounter::$N_cur_current;}
		else {
			self::$current_num_page_photo=$page_photo;}


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
	self::$sqltopicstablename=GeneralGetVars::$var1."___topics_".GeneralGetVars::$var2;//темы текущего раздела
	self::$sqlphotostablename=GeneralGetVars::$var1."___photos_".GeneralGetVars::$var2;//фото текущего раздела
	self::$sqlmessagestablename=GeneralGetVars::$var1."___messages_".GeneralGetVars::$var2;}//комментарии текущего раздела	
	
	

static public function detect_id_photo_page_by_num_page($MSQLc,$page_photo){//определяем идентификатор фото при соответствующем номере страницы
	if ($page_photo<1) {
		$query="
		SELECT id_photo 
		FROM registrated_users___photoalbums_photos 
		WHERE id_user='".GeneralGetVars::$var2."'
			AND id_album='".GeneralGetVars::$var4."'  
		ORDER BY id_photo ASC 
		LIMIT ".(GeneralGetVars::$num_page-1).",1";
		$res=GeneralMYSQL::query($MSQLc,$query);		
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);	
		self::$id_photo_page=$row['id_photo'];}
	else{
		self::$id_photo_page=$page_photo;}}
	
static public function update_page_photo($MSQLc,$value,$condition1,$condition2,$condition3,$condition4,$condition5){//обновляем номер страницы у фотографии
	$query="UPDATE registrated_users___photoalbums_photos SET page_photo='".$value."'";
	if ($condition1) {$query.=" WHERE ".$condition1;}	
	if ($condition2) {$query.=" AND ".$condition2;}
	if ($condition3) {$query.=" AND ".$condition3;}
	if ($condition4) {$query.=" AND ".$condition4;}
	if ($condition5) {$query.=" AND ".$condition5;}	
	GeneralMYSQL::query_update($MSQLc,$query);}
		
		
		
static public function detect_next_num_page_photo($MSQLc,$cur_id){//определяем на какую страницу идем дальше и опделедяем её url, чтобы её подгрузить
	$query="
	SELECT id_photo,page_photo,format_photo 
	FROM registrated_users___photoalbums_photos 
	WHERE id_user='".GeneralGetVars::$var2."'
		AND id_album='".GeneralGetVars::$var4."'
		AND id_photo>'".$cur_id."' 
	ORDER by id_photo ASC
	LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);	
	if ($row['id_photo']<1){
		self::$next_num_page_photo=1;
		$query="
		SELECT id_photo,page_photo,format_photo 
		FROM registrated_users___photoalbums_photos 
		WHERE id_user='".GeneralGetVars::$var2."'
			AND id_album='".GeneralGetVars::$var4."' 
		ORDER by id_photo ASC 
		LIMIT 1";
		$res=GeneralMYSQL::query($MSQLc,$query);		
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);	
		self::$id_next_photo=$row['id_photo'];
		self::$format_next_photo=$row['format_photo'];}
	else{
		self::$id_next_photo=$row['id_photo'];
		self::$format_next_photo=$row['format_photo'];
		if ($row['page_photo']<1){//если не установлен номер страницы, то определяем его по id фотографии
			self::detect_num_page_photo_from_id($MSQLc,$row['id_photo']);}
		else {
			self::$next_num_page_photo=$row['page_photo'];}}}


static public function detect_num_page_photo_from_id($MSQLc,$id){//определяем номер страницы по идентификатору фото
	GeneralPagesCounter::calculate_current($MSQLc, "registrated_users___photoalbums_photos","id_user='".GeneralGetVars::$var2."'","id_album='".GeneralGetVars::$var4."'","id_photo<='".$id."'",0,0);
	self::$next_num_page_photo=GeneralPagesCounter::$N_cur_current;}// часто применяется именно эта переменная
}
?>