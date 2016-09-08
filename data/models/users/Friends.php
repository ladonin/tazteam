<?php   
class UsersFriends{

static public $sort_by=1;//по умолчанию показываем друзей действующих





static public function set_sort($MSQLc){//что выбираем на странице друзей при переходе на неё
	//1 - мои друзья
	//2 - друзья онлайн
	//3 - входящие заявки
	//4 - исходящие заявки	
	if(UsersBase::$its_mypage==1){
		if (isset($_COOKIE['users_friends_sort_by'])){
			if ($_COOKIE['users_friends_sort_by']==2) {self::$sort_by=2;}
			else if ($_COOKIE['users_friends_sort_by']==3) {self::$sort_by=3;}
			else if ($_COOKIE['users_friends_sort_by']==4) {self::$sort_by=4;}}}
			
	if (self::$sort_by==1){
		UsersBase::detect_friendslist_from_text($MSQLc,GeneralGetVars::$var2);	
		UsersBase::$find_query=" AND id_user IN (".UsersBase::$friends_list.")";}
	else if (self::$sort_by==2){
		UsersBase::detect_friendslist_from_text($MSQLc,GeneralGetVars::$var2);	
		UsersBase::$find_query=" AND id_user IN (".UsersBase::$friends_list.")".UsersBase::return_online_query_text("gen_timecoming");}
	else if (self::$sort_by==3){		
		UsersBase::detect_friendsinlist_from_text($MSQLc);		
		UsersBase::$find_query=" AND id_user IN (".UsersBase::$friendsin_list.")";}
	else if (self::$sort_by==4){		
		UsersBase::detect_friendsoutlist_from_text($MSQLc);		
		UsersBase::$find_query=" AND id_user IN (".UsersBase::$friendsout_list.")";}		
	UsersBase::$condition_main="WHERE 1 ".UsersBase::$find_query;}
	

	

	
	
	
static public function set_cookies_sort_by_friends(){
	GeneralCookies::setglobal("users_friends_sort_by",1);
	GeneralGetVars::$num_page=1;}		
static public function set_cookies_sort_by_friends_online(){
	GeneralCookies::setglobal("users_friends_sort_by",2);
	GeneralGetVars::$num_page=1;}		
static public function set_cookies_sort_by_friends_in(){
	GeneralCookies::setglobal("users_friends_sort_by",3);
	GeneralGetVars::$num_page=1;}		
static public function set_cookies_sort_by_friends_out(){
	GeneralCookies::setglobal("users_friends_sort_by",4);
	GeneralGetVars::$num_page=1;}		
	
	
	
	

				
	
	
	
	






static public function detect_array_key_friends_from_text($text){//создаем из текста массик с ключами по id_user
	$friendsarray = explode(" ",$text);
	foreach($friendsarray as $key=>$value){
		if ($value)	{
			UsersBase::$friends_array[$value]=1;}}}




static public function delete_from_heto($MSQLc,$who,$id_user){
	$query="
		UPDATE	registrated_users___friendship
		SET 	heto = REPLACE(heto, ' ".$who." ', '')
		WHERE 	id_user='".$id_user."'
		LIMIT 	1
		";
	return GeneralMYSQL::query_update($MSQLc,$query);}
	
static public function delete_from_tohim($MSQLc,$who,$id_user){
	$query="
		UPDATE	registrated_users___friendship
		SET 	tohim = REPLACE(tohim, ' ".$who." ', '')
		WHERE 	id_user='".$id_user."'
		LIMIT 	1
		";
	return GeneralMYSQL::query_update($MSQLc,$query);}

static public function delete_from_friendship($MSQLc,$who,$id_user){
	$query="
		UPDATE	registrated_users___friendship
		SET 	friendship = REPLACE(friendship, ' ".$who." ', '')
		WHERE 	id_user='".$id_user."'
		LIMIT 	1
		";
	return GeneralMYSQL::query_update($MSQLc,$query);}	
	
static public function add_to_friendship($MSQLc,$who,$id_user){
	$query="
		UPDATE	registrated_users___friendship
		SET 	friendship = CONCAT(friendship, ' ".$who." ')
		WHERE 	id_user='".$id_user."'
		LIMIT 	1
		";
	return GeneralMYSQL::query_update($MSQLc,$query);}	
	
static public function add_to_tohim($MSQLc,$who,$id_user){
	$query="
		UPDATE	registrated_users___friendship
		SET 	tohim = CONCAT(tohim, ' ".$who." ')
		WHERE 	id_user='".$id_user."'
		LIMIT 	1
		";
	return GeneralMYSQL::query_update($MSQLc,$query);}	
	
static public function add_to_heto($MSQLc,$who,$id_user){
	$query="
		UPDATE	registrated_users___friendship
		SET 	heto = CONCAT(heto, ' ".$who." ')
		WHERE 	id_user='".$id_user."'
		LIMIT 	1
		";
	return GeneralMYSQL::query_update($MSQLc,$query);}		

	
	
	
	
	
	
	
	
	
	
	
	
	
static public function set_new_number_page($MSQLc){//устанавливаем новый номер страницы форума	
	UsersFriends::set_sort($MSQLc);
	UsersFriends::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос ДОзапишется в этой функции, т.к. друзья конкретного пользователя выбираются из сортировки
	GeneralPagesCounter::$find_query=UsersBase::$find_query;
	GeneralPagesCounter::$rowspage_name="rowspageusers1";//копия такой страницы - по присваиванию номеров страниц
	GeneralPagesCounter::calculate($MSQLc,"registrated_users___main_data",0,0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3);//условия 
	if(GeneralGetVars::$num_page>GeneralPagesCounter::$N_max){
		GeneralGetVars::$num_page=GeneralPagesCounter::$N_max;		
		if (GeneralGetVars::$num_page==0){GeneralGetVars::$num_page=1;}}}	
	
	
	
	
	
	
	
static public function addtofriends($MSQLc){//подать заявку в друзья
	//проверяем - подавал ли он заявку к нам раньше	
	self::detect_array_key_friends_from_text(UsersBase::return_row_friendship_heto($MSQLc,$_POST['who']));
	if (isset(UsersBase::$friends_array[UsersMyData::$id])){//если подавал
		//удаляем себя из его heto
		self::delete_from_heto($MSQLc,UsersMyData::$id,$_POST['who']);
		//удаляем его у себя из tohim
		self::delete_from_tohim($MSQLc,$_POST['who'],UsersMyData::$id);	
		//добавляем себя к его friendship
		self::add_to_friendship($MSQLc,UsersMyData::$id,$_POST['who']);
		//добавляем его к себе во friendship
		self::add_to_friendship($MSQLc,$_POST['who'],UsersMyData::$id);}
	else{//если он не подавал и мы хотим с ним подружиться
		//добавляем себя к его tohim
		self::add_to_tohim($MSQLc,UsersMyData::$id,$_POST['who']);
		//добавляем его к себе в heto
		self::add_to_heto($MSQLc,$_POST['who'],UsersMyData::$id);}}	

	
static public function deletefromfriends($MSQLc){//удалить друга
	//удаляем его из нашего friendship
	self::delete_from_friendship($MSQLc,$_POST['who'],UsersMyData::$id);
	//удаляем себя из его friendship
	self::delete_from_friendship($MSQLc,UsersMyData::$id,$_POST['who']);	
	self::set_new_number_page($MSQLc);}
	
	
static public function cancelheto($MSQLc){//убрать заявку
	//удаляем его из нашего heto
	self::delete_from_heto($MSQLc,$_POST['who'],UsersMyData::$id);
	//удаляем себя из его tohim
	self::delete_from_tohim($MSQLc,UsersMyData::$id,$_POST['who']);
	self::set_new_number_page($MSQLc);}
	
	
	
static public function canceltohim($MSQLc){//отклонить заявку
	//удаляем его из нашего tohim
	self::delete_from_tohim($MSQLc,$_POST['who'],UsersMyData::$id);
	//удаляем себя из его heto
	self::delete_from_heto($MSQLc,UsersMyData::$id,$_POST['who']);
	self::set_new_number_page($MSQLc);}	
	
	
	
static public function confirmheto($MSQLc){//принять заявку
	//удаляем себя из его heto
	self::delete_from_heto($MSQLc,UsersMyData::$id,$_POST['who']);
	//удаляем его у себя из tohim
	self::delete_from_tohim($MSQLc,$_POST['who'],UsersMyData::$id);	
	//добавляем себя к его friendship
	self::add_to_friendship($MSQLc,UsersMyData::$id,$_POST['who']);
	//добавляем его к себе во friendship
	self::add_to_friendship($MSQLc,$_POST['who'],UsersMyData::$id);
	self::set_new_number_page($MSQLc);}
	
	
	
	
	
	
	
	
static public function convert_cookie_find_query($MSQLc){//составляем из всех куков, которые есть
	if (isset($_COOKIE['users_friends_find_status'])){
		UsersBase::$find_status=$_COOKIE['users_friends_find_status'];
		if(UsersBase::$find_status==1){
			//UsersBase::$find_query="";//предварительно очищаем текст запроса			
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_online","gen_timecoming",4);
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_widthphoto","gen_photo",3);
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_sex","gen_sex",3);
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_relations","gen_relations",3);
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_bdate_year","gen_borndate_year",3);
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_login","gen_login_user",2);			
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_name","gen_name_user",2);			
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_surname","gen_surname_user",2);			
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_mail","site_mail_user",2);			
			//self::write_sql_query_where($MSQLc,"users_find_query_phone","gen_relations",2);			
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_city","gen_city_name",2);			
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_university","gen_universities_name",2);				
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_school_region","site_oblastschool",2);			
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_school_city","site_cityschool",2);
			UsersBase::write_sql_query_where($MSQLc,"users_friends_find_query_school_name","gen_schools_name",2);			
				
			UsersBase::$find_query.=" ".GeneralSecurity::return_safe_outside_sql_query(UsersBase::$find_query);//запрос общий, т.к. на этой странице он только один
			UsersBase::$condition_main="WHERE 1".UsersBase::$find_query;}}}	
	
	
	
	
	
	
	static public function set_cookies_find(){	
		GeneralCookies::setglobal("users_friends_find_query_online",$_POST['online']);
		GeneralCookies::setglobal("users_friends_find_query_widthphoto",$_POST['widthphoto']);		
		GeneralCookies::setglobal("users_friends_find_query_sex",$_POST['sex']);		
		GeneralCookies::setglobal("users_friends_find_query_relations",$_POST['relations']);		
		GeneralCookies::setglobal("users_friends_find_query_bdate_year",$_POST['bdate_year']);		
		GeneralCookies::setglobal("users_friends_find_query_login",$_POST['login']);		
		GeneralCookies::setglobal("users_friends_find_query_name",$_POST['name']);		
		GeneralCookies::setglobal("users_friends_find_query_surname",$_POST['surname']);		
		GeneralCookies::setglobal("users_friends_find_query_mail",$_POST['mail']);
		//GeneralCookies::setglobal("users_find_query_phone",$_POST['phone']);		
		GeneralCookies::setglobal("users_friends_find_query_city",$_POST['city']);		
		GeneralCookies::setglobal("users_friends_find_query_university",$_POST['university']);	
		GeneralCookies::setglobal("users_friends_find_query_school_region",$_POST['school_region']);		
		GeneralCookies::setglobal("users_friends_find_query_school_city",$_POST['school_city']);		
		GeneralCookies::setglobal("users_friends_find_query_school_name",$_POST['school_name']);

		GeneralCookies::setglobal("users_friends_find_status",1);

		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var3="friends";
		GeneralGetVars::$var2=GeneralGetVars::$var2;}	
	
	
	
static public function 	clear_find(){//очищаем поиск		
		GeneralCookies::setglobal("users_friends_find_query_online",'');
		GeneralCookies::setglobal("users_friends_find_query_widthphoto",'');		
		GeneralCookies::setglobal("users_friends_find_query_sex",'');		
		GeneralCookies::setglobal("users_friends_find_query_relations",'');		
		GeneralCookies::setglobal("users_friends_find_query_bdate_year",'');		
		GeneralCookies::setglobal("users_friends_find_query_login",'');		
		GeneralCookies::setglobal("users_friends_find_query_name",'');		
		GeneralCookies::setglobal("users_friends_find_query_surname",'');		
		GeneralCookies::setglobal("users_friends_find_query_mail",'');
		GeneralCookies::setglobal("users_friends_find_query_city",'');		
		GeneralCookies::setglobal("users_friends_find_query_university",'');		
		GeneralCookies::setglobal("users_friends_find_query_school_region",'');	
		GeneralCookies::setglobal("users_friends_find_query_school_city",'');
		GeneralCookies::setglobal("users_friends_find_query_school_city",'');		
		GeneralCookies::setglobal("users_friends_find_status",'');
		GeneralGetVars::$num_page=1;}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}


	
	
	
	
	
	
