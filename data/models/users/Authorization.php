<?php   
class UsersAuthorization{

static public $id_user="";//установленный id пользователя



static public $params_auth_sn = array(
    'vk' => array(
        'client_id'     => '4062434',// ID приложения
        'client_secret' => 'Y6lCDsLdq4k1OtWv3H3l',// Защищённый ключ
        'redirect_uri_enter'  => 'http://mapstore.org/my_portfolio/tazteam.net/performing/enter_across_vk.php',// Адрес сайта
		
        'redirect_uri_registration'  => 'http://mapstore.org/my_portfolio/tazteam.net/performing/registration_across_vk.php',// Адрес сайта		
		
		
		
		
		
		
		
		
        'redirect_uri_import_main_data'  => 'http://mapstore.org/my_portfolio/tazteam.net/performing/import_main_data_across_vk.php',// Адрес сайта
        'redirect_uri_fasten_account'  => 'http://mapstore.org/my_portfolio/tazteam.net/performing/fasten_account_to_vk.php'// Адрес сайта
    ),
    'odnoklassniki' => array(
        'client_id'     => '168635560',/////
        'client_secret' => 'C342554C028C0A76605C7C0F',//////
        'redirect_uri_autorization'  => 'http://localhost/auth?provider=odnoklassniki',//////
        'public_key'    => 'CBADCBMKABABABABA'//////
    ),
    'mailru' => array(
        'client_id'     => '770076',//////
        'client_secret' => '5b8f8906167229feccd2a7320dd6e140',//////
        'redirect_uri_autorization'  => 'http://localhost/auth/?provider=mailru'//////
    ),
    'yandex' => array(
        'client_id'     => 'bfbff04a6cb60395ca05ef38be0a86cf',//////
        'client_secret' => '219ba8388d6e6af7abe4b4b119cbee48',//////
        'redirect_uri_autorization'  => 'http://localhost/auth/?provider=yandex'//////
    ),
    'google' => array(
        'client_id'     => '333193735318.apps.googleusercontent.com',//////
        'client_secret' => 'lZB3aW8gDjIEUG8I6WVcidt5',//////
        'redirect_uri_autorization'  => 'http://localhost/auth?provider=google'//////
    ),
    'facebook' => array(
        'client_id'     => '613418539539988',//////
        'client_secret' => '2deab137cc1d254d167720095ac0b386',//////
        'redirect_uri_autorization'  => 'http://localhost/auth?provider=facebook'//////
    )
);





static public $params_from_sn = array(
  'uid'     		=> '',// Социальный ID пользователя
  'first_name'    	=> '',// Имя пользователя
  'last_name'    	=> '',// Фамилия пользователя
  'screen_name'     => '',// Ссылка на профиль пользователя
  'sex'     		=> '',// Пол пользователя
  'bdate'     		=> '',// День Рождения
  'photo_max'     	=> '',// Аватарка пользователя
  'photo_400_orig'  => '',// Аватарка пользователя
  'photo_max_orig'  => '',// Аватарка пользователя
  'city'     		=> '',// код города = sn_city_id_vk => gen_city_name
  'country'     	=> '',// код страны = sn_country_id_vk => gen_country_name
  'universities'    => array(),// массив университетской информации  
  'schools'     	=> array(),// массив школьной информации
  'relation'     	=> '',//семейное положение
  'interests'     	=> '',//допинформация
  'movies'     		=> '',//допинформация
  'tv'     			=> '',//допинформация
  'books'     		=> '',//допинформация
  'games'     		=> '',//допинформация
  'about'     		=> '',//допинформация
  'home_phone'     	=> '',//допинформация
  'mobile_phone'    => '',//допинформация
  'friends'     	=> array());// друзья
  
 


static public $array_id_user_my_friends_from_site = array();//мои реальные друзья на сайте (без подписок)
static public $array_id_user_my_friends_from_sn = array();//мои друзья в соцсети, которые тут зарегистрированы
static public $array_id_user_my_future_friends = array();//мои новые друзья, которых я загрузил из соцсети





static protected function return_row_data_from_cities_by_id_city($MSQLc,$id){//возвращаем данные о городе по его номеру
	$query="SELECT * FROM cities WHERE id='".$id."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);	
	if ($row['state']==$row['region']){$row['state']="";}
	return $row;}


static protected function return_row_data_from_cities_by_id_country($MSQLc,$id){//возвращаем данные о стране по её номеру
	if ($id==1){$row['country_name']="Россия";}
	else {$row['country_name']="";}
	return $row;}	
	
	
	
static protected function control_sn_data_1($MSQLc,$name){//проверяем присланные данные от соцсети
	if (isset(self::$params_from_sn[$name])) {self::$params_from_sn[$name]=GeneralSecurity::real_escape($MSQLc,self::$params_from_sn[$name]);}
	else{self::$params_from_sn[$name]="";}}
	
	

	

static protected function register_user_by_sn($MSQLc,$sn){//регистрация через соцсеть
	self::control_sn_data_1($MSQLc,'uid');
	self::control_sn_data_1($MSQLc,'first_name');
	self::control_sn_data_1($MSQLc,'last_name');
	//придумываем пароль и соль
	$parol=UsersMyData::return_composed_password();
	$salt=UsersMyData::return_composed_salt();
	//делаем соленый пароль
	$password=UsersMyData::return_salting_password($salt,$parol);	
	//пишем основные данные
	$query="INSERT INTO registrated_users___main_data (id_user,sn_id_user_".$sn.",gen_name_user,gen_surname_user,site_my_sn, site_points) VALUES('','".self::$params_from_sn['uid']."','".self::$params_from_sn['first_name']."','".self::$params_from_sn['last_name']."','vk',5000)";
	GeneralMYSQL::query_insert($MSQLc,$query);
	//находим id	
	self::$id_user=UsersMyData::return_id_by_sn($MSQLc,"vk",self::$params_from_sn['uid']);
	
	
	
	
	
	//вставляем директорию пользователя
	$query="
	UPDATE 	registrated_users___main_data 
	SET 	dir_user='".UsersBase::return_dir_catalog(self::$id_user)."'
	WHERE 	id_user='".self::$id_user."' 
	LIMIT 	1";//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);	


	
	
	//записываем соленый пароль в БД
	$query="INSERT INTO registrated_users___secure_passwords (id_user,password) VALUES('".self::$id_user."','".$password."')";
	GeneralMYSQL::query_insert($MSQLc,$query);
	//записываем соль в БД - пусть будет (пока не знаю зачем она тут нужна)
	$query="INSERT INTO registrated_users___secure_salt (id_user,salt) VALUES('".self::$id_user."','".$salt."')";
	GeneralMYSQL::query_insert($MSQLc,$query);	
	UsersMyData::action_after_registration($MSQLc,self::$id_user);
	GeneralCookies::setglobal("UsersRegDataStatus",4);}
	
static protected function return_to_query_array($MSQLc,$rowname,$name1,$name2,$delimiter){//проверяем присланные данные от соцсети
	$query=$rowname."='";
   	foreach (self::$params_from_sn[$name1] as $key=>$value){		
		if (isset(self::$params_from_sn[$name1][$key][$name2])) {		
			self::$params_from_sn[$name1][$key][$name2]=GeneralSecurity::real_escape($MSQLc,self::$params_from_sn[$name1][$key][$name2]);
			if ($key==0){$query.=self::$params_from_sn[$name1][$key][$name2];}//если первый элемент строки
			else {$query.=$delimiter.self::$params_from_sn[$name1][$key][$name2];}}
		else if ($key!=0) {$query.=$delimiter;}}//чтобы не потерять что за чем стоит		
	$query.="',";
	return $query;}		
		
static protected function return_to_query_array_with_outer_query($MSQLc,$rowname,$name1,$name2,$delimiter){//проверяем присланные данные от соцсети
	$query=$rowname."='";
   	foreach (self::$params_from_sn[$name1] as $key=>$value){		
		if (isset(self::$params_from_sn[$name1][$key][$name2])) {
			self::$params_from_sn[$name1][$key][$name2]=GeneralSecurity::real_escape($MSQLc,self::$params_from_sn[$name1][$key][$name2]);
			$row=self::return_row_data_from_cities_by_id_city($MSQLc,self::$params_from_sn[$name1][$key][$name2]);
			if ($key==0){$query.=$row[$name2];}//если первый элемент строки
			else {$query.=$delimiter.$row[$name2];}}
		else if ($key!=0) {$query.=$delimiter;}}//чтобы не потерять что за чем стоит
	$query.="',";
	return $query;}


	
	

static protected function fasten_account_to_sn($MSQLc,$sn){//привязываем пользователя к соцсети
	//проверено - мы привязаны ни к какой соцсети
	self::control_sn_data_1($MSQLc,'uid');
	$query="
	UPDATE 	registrated_users___main_data 
	SET 	sn_id_user_".$sn."='".self::$params_from_sn['uid']."', site_my_sn='vk'		
	WHERE 	id_user='".UsersMyData::$id."' 
	LIMIT 	1";//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}












	
	
static protected function set_main_data_to_user_by_sn($MSQLc,$sn){//вставляем свои данные из соцсети
	//проверено - мы привязаны к этой соцсети
	self::control_sn_data_1($MSQLc,'bdate');	
	$arraybdate=explode(".",self::$params_from_sn['bdate']);
	if (!isset($arraybdate[2])) {$arraybdate[2]='';}
	if (!isset($arraybdate[1])) {$arraybdate[1]='';}
	if (!isset($arraybdate[0])) {$arraybdate[0]='';}
	

	self::control_sn_data_1($MSQLc,'interests');		
	self::control_sn_data_1($MSQLc,'movies');	
	self::control_sn_data_1($MSQLc,'tv');	
	self::control_sn_data_1($MSQLc,'books');	
	self::control_sn_data_1($MSQLc,'games');	
	self::control_sn_data_1($MSQLc,'about');	
	self::control_sn_data_1($MSQLc,'home_phone');	
	self::control_sn_data_1($MSQLc,'mobile_phone');

	
	self::control_sn_data_1($MSQLc,'city');	
	self::control_sn_data_1($MSQLc,'country');	
	self::control_sn_data_1($MSQLc,'first_name');	
	self::control_sn_data_1($MSQLc,'last_name');	
	self::control_sn_data_1($MSQLc,'screen_name');	
	self::control_sn_data_1($MSQLc,'sex');		
	self::control_sn_data_1($MSQLc,'photo_max');	
	self::control_sn_data_1($MSQLc,'photo_400_orig');	
	self::control_sn_data_1($MSQLc,'photo_max_orig');		
	self::control_sn_data_1($MSQLc,'relation');	
	$row_city=self::return_row_data_from_cities_by_id_city($MSQLc,self::$params_from_sn['city']);
	$row_country=self::return_row_data_from_cities_by_id_country($MSQLc,self::$params_from_sn['country']);	
	$query="
	UPDATE 
		registrated_users___main_data 
	SET 
		gen_name_user='".self::$params_from_sn['first_name']."',
		gen_surname_user='".self::$params_from_sn['last_name']."',	
		sn_url_".$sn."='".self::$params_from_sn['screen_name']."',		
		gen_sex='".self::$params_from_sn['sex']."',
		gen_borndate_year='".$arraybdate[2]."',
		gen_borndate_month='".$arraybdate[1]."',		
		gen_borndate_day='".$arraybdate[0]."',	
		gen_photo='2',
		sn_photo_url_from_small='".self::$params_from_sn['photo_max']."',
		sn_photo_url_from_big='".self::$params_from_sn['photo_400_orig']."',
		sn_photo_url_from_huge='".self::$params_from_sn['photo_max_orig']."',
		sn_city_id_".$sn."='".self::$params_from_sn['city']."',
		gen_city_name='".$row_city['city']."',
		gen_region_name='".$row_city['region']."',
		gen_state_name='".$row_city['state']."',
		sn_country_id_".$sn."='".self::$params_from_sn['country']."',
		gen_country_name='".$row_country['country_name']."',";
		$query.=self::return_to_query_array($MSQLc,'sn_universities_id_vk','universities','id','  ');
		$query.=self::return_to_query_array($MSQLc,'sn_universities_country_id_vk','universities','country','  ');		
		$query.=self::return_to_query_array($MSQLc,'sn_universities_faculty_id_vk','universities','faculty','  ');
		$query.=self::return_to_query_array($MSQLc,'sn_universities_chair_id_vk','universities','chair','  ');
		$query.=self::return_to_query_array($MSQLc,'sn_universities_city_id_vk','universities','city','  ');		
		$query.=self::return_to_query_array($MSQLc,'gen_universities_name','universities','name','  ');
		$query.=self::return_to_query_array($MSQLc,'gen_universities_faculty_name','universities','faculty_name','  ');		
		$query.=self::return_to_query_array($MSQLc,'gen_universities_chair_name','universities','chair_name','  ');		
		$query.=self::return_to_query_array($MSQLc,'gen_universities_graduation','universities','graduation','  ');
		$query.=self::return_to_query_array($MSQLc,'gen_universities_education_form','universities','education_form','  ');		
		$query.=self::return_to_query_array($MSQLc,'gen_universities_education_status','universities','education_status','  ');		
		$query.=self::return_to_query_array($MSQLc,'sn_schools_id_vk','schools','id','  ');
		$query.=self::return_to_query_array($MSQLc,'sn_schools_id_type_vk','schools','type','  ');		
		$query.=self::return_to_query_array($MSQLc,'site_nametypeschool','schools','type_str','  ');		

		$query.=self::return_to_query_array($MSQLc,'sn_schools_country_id_vk','schools','country','  ');		
		$query.=self::return_to_query_array($MSQLc,'sn_schools_city_id_vk','schools','city','  ');		
		$query.=self::return_to_query_array($MSQLc,'gen_schools_name','schools','name','  ');
		$query.=self::return_to_query_array($MSQLc,'gen_schools_year_from','schools','year_from','  ');		
		$query.=self::return_to_query_array($MSQLc,'gen_schools_year_to','schools','year_to','  ');		
		$query.=self::return_to_query_array($MSQLc,'gen_schools_year_graduated','schools','year_graduated','  ');
		$query.=self::return_to_query_array($MSQLc,'gen_schools_class','schools','class','  ');		
		$query.=self::return_to_query_array($MSQLc,'gen_schools_speciality','schools','speciality','  ');		
		$query.=self::return_to_query_array_with_outer_query($MSQLc,'site_cityschool','schools','city','  ');
		$query.=self::return_to_query_array_with_outer_query($MSQLc,'site_stateschool','schools','state','  ');
		$query.=self::return_to_query_array_with_outer_query($MSQLc,'site_oblastschool','schools','region','  ');
		$query.="gen_relations='".self::$params_from_sn['relation']."',";
		$query.="site_my_sn='vk',";		
		$query.="site_update_from_sn_nothanks='1'			
		WHERE sn_id_user_".$sn."='".self::$params_from_sn['uid']."' AND id_user='".self::$id_user."' LIMIT 1";//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);	
	

	$query="
	UPDATE
		registrated_users___added_data
	SET 
		mobile_phone='".self::$params_from_sn['mobile_phone']."',
		add_phone='".self::$params_from_sn['home_phone']."',
		interests='".self::$params_from_sn['interests']."',
		books='".self::$params_from_sn['books']."',
		games='".self::$params_from_sn['games']."',
		about='".self::$params_from_sn['about']."',
		movies='".self::$params_from_sn['movies']."',
		tv='".self::$params_from_sn['tv']."'
	WHERE id_user='".self::$id_user."' LIMIT 1";//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);
	self::friendship_with_sn($MSQLc,self::$id_user,$sn);
	
	
	
	UsersMyData::autonomic___set_name_user_cookies($MSQLc,self::$id_user,0,0);//потому что не знаем из данных сверху статуа логина
	}

	
	
static protected function friendship_with_sn($MSQLc,$id_user,$sn){//подруживаемся с друзьями из соцсети $sn
	if (count(self::$params_from_sn['friends'])>0){//если друзья у нас есть
		$query="SELECT friendship FROM registrated_users___friendship WHERE id_user='".$id_user."' LIMIT 1";
		$res=GeneralMYSQL::query($MSQLc,$query);		
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);
		
		//помещаем моих друзей в массив
		$myfriendsarray = explode(" ",$row['friendship']);
		foreach($myfriendsarray as $key=>$value){
			if ($value)	{	
				self::$array_id_user_my_friends_from_site[$value]=1;}}//ставим id в ключ, чтобы потом по нему убирать уже существующих друзей
		

		//self::$params_from_sn['friends'] - еще имеем массив с друзьями из соцсети
		
		//получаем массив id_user зарегистрированных у нас пользователей по их id_sn (только тех, которые зарегистрированы у нас, конечно)
		$textfriendsfrom_sn=implode(",",self::$params_from_sn['friends']);//перемещаем id_sn пользователей в текст для query - запроса
		$query="SELECT id_user FROM registrated_users___main_data WHERE sn_id_user_".$sn." IN (".$textfriendsfrom_sn.")";
		$res=GeneralMYSQL::query($MSQLc,$query);		
		while($row=GeneralMYSQL::fetch_array($res)){
			self::$array_id_user_my_friends_from_sn[$row['id_user']]=1;}
		GeneralMYSQL::free($res);	
	
	
		//записываем весь массив друзей из соцсети, чтобы начать над ним работать
		self::$array_id_user_my_future_friends=self::$array_id_user_my_friends_from_sn;		
		//убираем тех новых друзей из соцсети, которые уже у нас в друзьях
	   	foreach (self::$array_id_user_my_friends_from_site as $key=>$value){			
			unset(self::$array_id_user_my_future_friends[$key]);}//теперь остались только те, которые новые и есть у нас на сайте


	//записываем все id_user друзей из нового массива к нам во friendship
		//преобразовываем массив новых друзей в текст ПО КЛЮЧУ	
		$text_id_user_my_future_friends="";
	   	foreach (self::$array_id_user_my_future_friends as $key=>$value){			
			$text_id_user_my_future_friends.=" ".$key." ";}	

		$query="
		UPDATE	registrated_users___friendship
		SET		friendship=CONCAT(friendship,'".$text_id_user_my_future_friends."')
		WHERE 	id_user='".$id_user."' 
		LIMIT 	1
		";
		GeneralMYSQL::query_update($MSQLc,$query);
	
	//записываем себя к новым друзьям и делаем у них это новостью
		//по-другому преобразовываем массив новых друзей в текст
		$text_id_user_my_future_friends="";
	   	foreach (self::$array_id_user_my_future_friends as $key=>$value){			
			$text_id_user_my_future_friends.=",".$key;}
		$text_id_user_my_future_friends=preg_replace('/^,/i','',$text_id_user_my_future_friends);//убираем запятую вначале текста	

		$query="
		UPDATE	registrated_users___friendship
		SET		friendship=CONCAT(friendship,' ".$id_user." '),	new_friendship_from_vk=CONCAT(new_friendship_from_vk,' ".$id_user." ')		
		WHERE 	id_user IN (".$text_id_user_my_future_friends.")
		";
		GeneralMYSQL::query_update($MSQLc,$query);}}	
	
	
	
	
	
	
	
static public function enter_across_vk($MSQLc){
//$url = 'http://oauth.vk.com/authorize';
//echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';
if (isset($_GET['code'])) {
	$result = false;
	$params = array(
		'client_id' => self::$params_auth_sn['vk']['client_id'],
		'client_secret' => self::$params_auth_sn['vk']['client_secret'],
		'code' => $_GET['code'],
		'redirect_uri' => self::$params_auth_sn['vk']['redirect_uri_enter']);
	$token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
	if (isset($token['access_token'])) {
		$params_my = array(
			'uids'         => $token['user_id'],
			'fields'       => 'uid',
			'access_token' => $token['access_token']);
		$userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params_my))), true);
		if (isset($userInfo['response'][0]['uid'])) {
			$userInfo = $userInfo['response'][0];
			$result = true;}}	
    if ($result==true) {
		self::$params_from_sn['uid']=$userInfo['uid'];// Социальный ID пользователя
		self::$id_user=UsersMyData::return_id_by_sn($MSQLc,"vk",self::$params_from_sn['uid']);
		if (self::$id_user>0){//вход	
			//self::$id_user - определяется в обоих случаях			
			UsersMyData::autonomic___set_name_user_cookies($MSQLc,self::$id_user,0,0);			
			UsersMyData::setcookies_id_passwords(self::$id_user,UsersMyData::return_password_by_id_user($MSQLc,self::$id_user));
			GeneralCookies::setglobal("UsersEnterStatus",1);
			
			GeneralHeaderHTTP::location(GeneralPageBasic::return_url_current_page());
			//echo($_COOKIE['url_current_page']);			
			}
		else {
			GeneralCookies::setglobal("UsersEnterStatus",2);
			GeneralHeaderHTTP::location(GeneralPageBasic::return_url_current_page());}}}}
			




















static public function registration_across_vk($MSQLc){
//$url = 'http://oauth.vk.com/authorize';
//echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';
if (isset($_GET['code'])) {
	$result = false;
	$params = array(
		'client_id' => self::$params_auth_sn['vk']['client_id'],
		'client_secret' => self::$params_auth_sn['vk']['client_secret'],
		'code' => $_GET['code'],
		'redirect_uri' => self::$params_auth_sn['vk']['redirect_uri_registration']);
	$token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
	if (isset($token['access_token'])) {
		$params_my = array(
			'uids'         => $token['user_id'],
			'fields'       => 'uid,first_name,last_name',
			'access_token' => $token['access_token']);
		$userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params_my))), true);
		if (isset($userInfo['response'][0]['uid'])) {
			$userInfo = $userInfo['response'][0];
			$result = true;}}	
    if ($result==true) {
		self::$params_from_sn['uid']=$userInfo['uid'];// Социальный ID пользователя
		self::$params_from_sn['first_name']=$userInfo['first_name'];// имя пользователя
		self::$params_from_sn['last_name']=$userInfo['last_name'];// фамилия пользователя
		self::$id_user=UsersMyData::return_id_by_sn($MSQLc,"vk",self::$params_from_sn['uid']);
		if (self::$id_user>0){//просто вход, вместо регистрации	
			//self::$id_user - определяется в обоих случаях			
			UsersMyData::autonomic___set_name_user_cookies($MSQLc,self::$id_user,0,0);			
			UsersMyData::setcookies_id_passwords(self::$id_user,UsersMyData::return_password_by_id_user($MSQLc,self::$id_user));			
			GeneralHeaderHTTP::location(GeneralPageBasic::return_url_current_page());
			//echo($_COOKIE['url_current_page']);			
			}
		else {//регистрация
			self::register_user_by_sn($MSQLc,"vk");			
			UsersMyData::autonomic___set_name_user_cookies($MSQLc,self::$id_user,0,0);			
			UsersMyData::setcookies_id_passwords(self::$id_user,UsersMyData::return_password_by_id_user($MSQLc,self::$id_user));			
			GeneralHeaderHTTP::location(GeneralGlobalVars::url."/users/".self::$id_user);
			}}}}





























			


static public function import_main_data_across_vk($MSQLc){
//$url = 'http://oauth.vk.com/authorize';
//echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';
if (isset($_GET['code'])) {
	$result = false;
	$params = array(
		'client_id' => self::$params_auth_sn['vk']['client_id'],
		'client_secret' => self::$params_auth_sn['vk']['client_secret'],
		'code' => $_GET['code'],
		'redirect_uri' => self::$params_auth_sn['vk']['redirect_uri_import_main_data']);
	$token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
	if (isset($token['access_token'])) {
		$params_my = array(
			'uids'         => $token['user_id'],
			'fields'       => 'contacts,interests,movies,tv,books,games,about,relation,schools,universities,country,city,uid,first_name,last_name,screen_name,sex,bdate,photo_max,photo_400_orig,photo_max_orig,friends',
			'access_token' => $token['access_token']);
		$userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params_my))), true);
		if (isset($userInfo['response'][0]['uid'])) {
			$userInfo = $userInfo['response'][0];
			$result = true;}
		$params_fr = array(
			'uids'         => $token['user_id'],
			'fields'       => 'uid',
			'access_token' => $token['access_token']);
		$friendsInfo = json_decode(file_get_contents('https://api.vk.com/method/friends.get' . '?' . urldecode(http_build_query($params_fr))), true);
		if (isset($friendsInfo['response'])) {
			$friendsInfo = $friendsInfo['response'];
			$result = true;}}
	
    if ($result==true) {
		// Социальный ID пользователя = sn_id_user_vk
		if (isset($userInfo['uid'])){self::$params_from_sn['uid']=$userInfo['uid'];}
		
		// Имя пользователя = gen_name_user
		if (isset($userInfo['first_name'])){self::$params_from_sn['first_name']=$userInfo['first_name'];}
		// Фамилия пользователя = gen_surname_user
		if (isset($userInfo['last_name'])){self::$params_from_sn['last_name']=$userInfo['last_name'];}
		// Ссылка на профиль пользователя = sn_url_vk
		if (isset($userInfo['screen_name'])){self::$params_from_sn['screen_name']=$userInfo['screen_name'];}
		// Пол пользователя = gen_sex
		if (isset($userInfo['sex'])){self::$params_from_sn['sex']=$userInfo['sex'];}
		// День Рождения = gen_borndate_year,gen_borndate_month,gen_borndate_day
		if (isset($userInfo['bdate'])){self::$params_from_sn['bdate']=$userInfo['bdate'];}
		// url квадратной фотографии пользователя, имеющей ширину >100 пикселей. = sn_photo_url_from_small
		if (isset($userInfo['photo_max'])){self::$params_from_sn['photo_max']=$userInfo['photo_max'];}
		// Выдаётся url фотографии пользователя, имеющей ширину 400 пикселей. = sn_photo_url_from_big  
		if (isset($userInfo['photo_400_orig'])){self::$params_from_sn['photo_400_orig']=$userInfo['photo_400_orig'];}
		// url фотографии пользователя, максимального размера = sn_photo_url_from_huge
		if (isset($userInfo['photo_max_orig'])){self::$params_from_sn['photo_max_orig']=$userInfo['photo_max_orig'];}
		// код города = sn_city_id_vk => gen_city_name
		if (isset($userInfo['city'])){self::$params_from_sn['city']=$userInfo['city'];}	
		// код страны = sn_country_id_vk => gen_country_name
		if (isset($userInfo['country'])){self::$params_from_sn['country']=$userInfo['country'];}
		/* массив университетской информации = sn_universities_id_vk,sn_universities_country_id_vk,sn_universities_faculty_id_vk,sn_universities_chair_id_vk,sn_universities_city_id_vk,gen_universities_name,gen_universities_faculty_name,gen_universities_chair_name,gen_universities_graduation,gen_universities_education_form,gen_universities_education_status*/
		if (isset($userInfo['universities'])){self::$params_from_sn['universities']=$userInfo['universities'];}
		/* массив школьной информации = sn_schools_id_vk,sn_schools_country_id_vk,sn_schools_city_id_vk,gen_schools_name,gen_schools_year_from,gen_schools_year_to,gen_schools_year_graduated,gen_schools_class,gen_schools_speciality,site_oblastschool,site_cityschool,site_nametypeschool,sn_schools_id_type_vk*/
		if (isset($userInfo['schools'])){self::$params_from_sn['schools']=$userInfo['schools'];}	
		//	= gen_relations
		if (isset($userInfo['relation'])){self::$params_from_sn['relation']=$userInfo['relation'];}
		
		

		//	=> `registrated_users___added_data`   `home_phone`,`mobile_phone`,`interests`,`books`,`games`,`about`,`movies`,`tv`
		if (isset($userInfo['home_phone']))	{self::$params_from_sn['home_phone']=$userInfo['home_phone'];}
		if (isset($userInfo['mobile_phone']))	{self::$params_from_sn['mobile_phone']=$userInfo['mobile_phone'];}		
		if (isset($userInfo['interests']))	{self::$params_from_sn['interests']=$userInfo['interests'];}
		if (isset($userInfo['movies']))		{self::$params_from_sn['movies']=$userInfo['movies'];}
		if (isset($userInfo['tv']))			{self::$params_from_sn['tv']=$userInfo['tv'];}
		if (isset($userInfo['books']))		{self::$params_from_sn['books']=$userInfo['books'];}
		if (isset($userInfo['games']))		{self::$params_from_sn['games']=$userInfo['games'];}
		if (isset($userInfo['about']))		{self::$params_from_sn['about']=$userInfo['about'];}	

		
		
		
		
		
		
		//	=> `registrated_users___friendship`   `friendship`
		foreach($friendsInfo as $key=>$value){
			if (isset($friendsInfo[$key]['uid'])){self::$params_from_sn['friends'][]=$friendsInfo[$key]['uid'];}}
		self::$id_user=UsersMyData::return_id_by_sn($MSQLc,"vk",self::$params_from_sn['uid']);
		if (self::$id_user>0){//если мы привязаны к этой соцсети
			self::set_main_data_to_user_by_sn($MSQLc,"vk");}
		GeneralHeaderHTTP::location(GeneralGlobalVars::url."/users/".self::$id_user);
			}}
			
			
			
			
			
			
			
			}







			
static public function fasten_account_to_vk($MSQLc){
//$url = 'http://oauth.vk.com/authorize';
//echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';
if (isset($_GET['code'])) {
	$result = false;
	$params = array(
		'client_id' => self::$params_auth_sn['vk']['client_id'],
		'client_secret' => self::$params_auth_sn['vk']['client_secret'],
		'code' => $_GET['code'],
		'redirect_uri' => self::$params_auth_sn['vk']['redirect_uri_fasten_account']);
	$token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
	if (isset($token['access_token'])) {

		$params_my = array(
			'uids'         => $token['user_id'],
			'fields'       => 'uid',
			'access_token' => $token['access_token']);
		$userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params_my))), true);
		if (isset($userInfo['response'][0]['uid'])) {
			$userInfo = $userInfo['response'][0];
			$result = true;}}
	
    if ($result==true) {
		// Социальный ID пользователя = sn_id_user_vk
		self::$params_from_sn['uid']=$userInfo['uid'];
		
		//echo(self::$params_from_sn['uid']);
		
		
		if (UsersMyData::return_sn_by_id_user($MSQLc,UsersMyData::$id)==false){		//если еще не привязаны к соцсети
		//echo("a");
			self::$id_user=UsersMyData::return_id_by_sn($MSQLc,"vk",self::$params_from_sn['uid']);//ишем пользователя, который привязан к этому id_sn
			if (self::$id_user==false){													//если к этому id_sn еще НЕ привязан никто
				self::fasten_account_to_sn($MSQLc,"vk");									//все отлично	
				GeneralCookies::setglobal("UsersFastenSnStatus",1);}	
			else {																		//кто-то уже привязан к ней
				GeneralCookies::setglobal("UsersFastenSnStatus",2);}}
		else {																		//если мы уже привязаны
			GeneralCookies::setglobal("UsersFastenSnStatus",3);}}}		
			
			
			
	GeneralHeaderHTTP::location(GeneralGlobalVars::url."/users/".UsersMyData::$id);
	}
			
			
			
			
			
			
			
			
			





			
			
			}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
