<?php   
class VoteBase{//скопировано из пользователей
static public $cur_dir_catalog="";//директория текущего пользователя в каталоге
static public $dir_catalog="";//директория нашего пользователя в каталоге
static public $find_query="";

static public $users_enable=false;//пользователи отображены в поиске



static public $condition_main=0;
static public $condition_added1="";


static public $voters_list="";//список друзей через запятую






//данные для показа фотографии, за которую голосуют
static public $page_photo=0;
static public $id_photo=0;
static public $id_topic=0;
static public $id_section=0;
static public $dir_album=0;
static public $id_autor=0;

static public $name_autor=0;

static public $name_album=0;
static public $name_photo=0;

static public $format_photo=0;

static public $dateloading=0;







	
static public function return_row_voters($MSQLc){	//а также устанавливаем данные фотографии
	if (GeneralPageBasic::$code_sign=="ga"){
		$query="		
		SELECT
			rumd.gen_login_user as gen_login_user,
			rumd.site_mail_user as site_mail_user,
			rumd.gen_name_user as gen_name_user,
			rumd.gen_surname_user as gen_surname_user,
			rumd.site_login_status as site_login_status,
			pp.page_photo as page_photo,
			pp.id_photo as id_photo,
			pp.id_topic as id_topic,
			pt.id_user as id_user,
			pp.name_photo as name_photo,
			pp.format_photo as format_photo,
			pp.vote as vote,
			pp.date_photo as dateloading,
			pt.name_topic as name_album
		FROM 		
			(SELECT * FROM photo___photos_".GeneralPageBasic::$code_section." WHERE id_topic='".GeneralPageBasic::$code_topic."' AND id_photo='".GeneralPageBasic::$code_idphoto."' LIMIT 1) as pp
		LEFT JOIN photo___topics_".GeneralPageBasic::$code_section." as pt ON pt.id_topic=pp.id_topic
		LEFT JOIN registrated_users___main_data as rumd ON rumd.id_user=pt.id_user		
		";
		$res=GeneralMYSQL::query($MSQLc,$query);		
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);
		
		self::$page_photo=$row['page_photo'];
		self::$id_photo=$row['id_photo'];
		self::$id_topic=$row['id_topic'];
		self::$id_section=GeneralPageBasic::$code_section;
		self::$id_autor=$row['id_user'];
		self::$name_album=$row['name_album'];
		self::$name_photo=$row['name_photo'];
		self::$format_photo=$row['format_photo'];		
		self::$dateloading=$row['dateloading'];	
		self::$name_autor=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);			
		
		
		
		return $row['vote'];}
	else if (GeneralPageBasic::$code_sign=="sf"){
		$query="
		SELECT 
			rumd.gen_login_user as gen_login_user,
			rumd.site_mail_user as site_mail_user,
			rumd.gen_name_user as gen_name_user,
			rumd.gen_surname_user as gen_surname_user,
			rumd.site_login_status as site_login_status,		
			pp.page_photo as page_photo,
			pp.id_photo as id_photo,
			pp.id_album as id_album,
			pp.id_user as id_user,
			pp.name_photo as name_photo,
			pp.dir_album as dir_album,
			pp.format_photo as format_photo,			
			pp.vote as vote,
			pp.dateloading as dateloading,
			pt.name_album as name_album		
		FROM 
			(SELECT * FROM registrated_users___photoalbums_photos WHERE id_user='".GeneralPageBasic::$code_section."' AND id_album='".GeneralPageBasic::$code_topic."' AND id_photo='".GeneralPageBasic::$code_idphoto."'	LIMIT 1) as pp
		LEFT JOIN  registrated_users___photoalbums as pt ON pt.id_user=pp.id_user AND pt.id_album=pp.id_album
		
		
		LEFT JOIN registrated_users___main_data as rumd ON rumd.id_user=pp.id_user				
		
		
		
		
		
		
		
		";			
		$res=GeneralMYSQL::query($MSQLc,$query);		
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);
		
		self::$page_photo=$row['page_photo'];
		self::$id_photo=$row['id_photo'];
		self::$id_topic=$row['id_album'];
		self::$id_section=$row['id_user'];
		self::$id_autor=$row['id_user'];
		self::$name_album=$row['name_album'];
		self::$name_photo=$row['name_photo'];
		self::$format_photo=$row['format_photo'];
		self::$dateloading=$row['dateloading'];			
		self::$dir_album=$row['dir_album'];		
		self::$name_autor=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);	
		return $row['vote'];}}
	
	

static public function set_sort($MSQLc){//что выбираем на странице друзей при переходе на неё
	$textrvoters=trim(self::return_row_voters($MSQLc));
	self::$voters_list = str_replace("  ",",",$textrvoters);
	self::$find_query=" AND id_user IN (".self::$voters_list.")";
	self::$condition_main="WHERE 1 ".self::$find_query;}

	
	
	
	
	
	static public function write_sql_query_where($MSQLc,$var,$varquery,$type){//$type - 1 точно, 2 - приблизительно, 3 - по номерам, 4 - кто онлайн
		if (isset($_COOKIE[$var])) {
			if ($_COOKIE[$var]) {
				if ($type==1){
					self::$find_query.=" AND ".$varquery."='".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."' ";}
				else if ($type==2){
					self::$find_query.=" AND ".$varquery." LIKE'%".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."%' ";}
				else if ($type==3){
					self::$find_query.=" AND ".$varquery."='".GeneralSecurity::tonumber($_COOKIE[$var])."' ";}
				else if ($type==4){
					self::$find_query.=UsersBase::return_online_query_text($varquery);}}}}
		

	static public function set_cookies_find(){	
		GeneralCookies::setglobal("users_vote_find_query_online",$_POST['online']);
		GeneralCookies::setglobal("users_vote_find_query_widthphoto",$_POST['widthphoto']);		
		GeneralCookies::setglobal("users_vote_find_query_sex",$_POST['sex']);		
		GeneralCookies::setglobal("users_vote_find_query_relations",$_POST['relations']);		
		GeneralCookies::setglobal("users_vote_find_query_bdate_year",$_POST['bdate_year']);		
		GeneralCookies::setglobal("users_vote_find_query_login",$_POST['login']);		
		GeneralCookies::setglobal("users_vote_find_query_name",$_POST['name']);		
		GeneralCookies::setglobal("users_vote_find_query_surname",$_POST['surname']);		
		GeneralCookies::setglobal("users_vote_find_query_mail",$_POST['mail']);
		//GeneralCookies::setglobal("users_vote_find_query_phone",$_POST['phone']);		
		GeneralCookies::setglobal("users_vote_find_query_city",$_POST['city']);		
		GeneralCookies::setglobal("users_vote_find_query_university",$_POST['university']);	
		GeneralCookies::setglobal("users_vote_find_query_school_region",$_POST['school_region']);		
		GeneralCookies::setglobal("users_vote_find_query_school_city",$_POST['school_city']);		
		GeneralCookies::setglobal("users_vote_find_query_school_name",$_POST['school_name']);

		GeneralCookies::setglobal("users_vote_find_status",1);

		GeneralGetVars::$num_page=1;}
		
	
static public function convert_cookie_find_query($MSQLc){//составляем из всех куков, которые есть
	if (isset($_COOKIE['users_vote_find_status'])){
		UsersBase::$find_status=$_COOKIE['users_vote_find_status'];
		if(UsersBase::$find_status==1){
			//self::$find_query="";//предварительно очищаем текст запроса			
			self::write_sql_query_where($MSQLc,"users_vote_find_query_online","gen_timecoming",4);
			self::write_sql_query_where($MSQLc,"users_vote_find_query_widthphoto","gen_photo",3);
			self::write_sql_query_where($MSQLc,"users_vote_find_query_sex","gen_sex",3);
			self::write_sql_query_where($MSQLc,"users_vote_find_query_relations","gen_relations",3);
			self::write_sql_query_where($MSQLc,"users_vote_find_query_bdate_year","gen_borndate_year",3);
			self::write_sql_query_where($MSQLc,"users_vote_find_query_login","gen_login_user",2);			
			self::write_sql_query_where($MSQLc,"users_vote_find_query_name","gen_name_user",2);			
			self::write_sql_query_where($MSQLc,"users_vote_find_query_surname","gen_surname_user",2);				
			self::write_sql_query_where($MSQLc,"users_vote_find_query_mail","site_mail_user",2);			
			//self::write_sql_query_where($MSQLc,"users_vote_find_query_phone","gen_relations",2);			
			self::write_sql_query_where($MSQLc,"users_vote_find_query_city","gen_city_name",2);			
			self::write_sql_query_where($MSQLc,"users_vote_find_query_university","gen_universities_name",2);				
			self::write_sql_query_where($MSQLc,"users_vote_find_query_school_region","site_oblastschool",2);			
			self::write_sql_query_where($MSQLc,"users_vote_find_query_school_city","site_cityschool",2);
			self::write_sql_query_where($MSQLc,"users_vote_find_query_school_name","gen_schools_name",2);			
				
			self::$find_query.=" ".GeneralSecurity::return_safe_outside_sql_query(self::$find_query);
			self::$condition_main="WHERE 1".self::$find_query;}}}


			
			
static public function 	clear_find(){//очищаем поиск		
		GeneralCookies::setglobal("users_vote_find_query_online",'');
		GeneralCookies::setglobal("users_vote_find_query_widthphoto",'');		
		GeneralCookies::setglobal("users_vote_find_query_sex",'');		
		GeneralCookies::setglobal("users_vote_find_query_relations",'');		
		GeneralCookies::setglobal("users_vote_find_query_bdate_year",'');		
		GeneralCookies::setglobal("users_vote_find_query_login",'');		
		GeneralCookies::setglobal("users_vote_find_query_name",'');		
		GeneralCookies::setglobal("users_vote_find_query_surname",'');		
		GeneralCookies::setglobal("users_vote_find_query_mail",'');
		GeneralCookies::setglobal("users_vote_find_query_city",'');		
		GeneralCookies::setglobal("users_vote_find_query_university",'');		
		GeneralCookies::setglobal("users_vote_find_query_school_region",'');	
		GeneralCookies::setglobal("users_vote_find_query_school_city",'');
		GeneralCookies::setglobal("users_vote_find_query_school_city",'');		
		GeneralCookies::setglobal("users_vote_find_status",'');
		GeneralGetVars::$num_page=1;}
	

	}
	
	
	
	
