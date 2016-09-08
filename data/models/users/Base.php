<?php   
class UsersBase{
static public $cur_dir_catalog="";//директория текущего пользователя в каталоге
static public $dir_catalog="";//директория нашего пользователя в каталоге
static public $find_query="";

static public $users_enable=false;//пользователи отображены в поиске
static public $find_status=0;//статус - поиск или нет



static public $my_addition_data_array=array();//массив моих данных для показа релевантных пользователей (вы можете их знать)

static public $cur_user_name="";

static public $cur_user_online=0;//онлайн текущего пользователя

static public $condition_main=0;
static public $condition_added1="";
static public $count_friends=0;//сколько друзей у пользователя
static public $friends_array=array();//массив друзей пользователя


static public $friends_list="";//список друзей через запятую
static public $friendsin_list="";//список ко мне заявок друзей через запятую
static public $friendsout_list="";//список от меня заявок в дружбу через запятую




static public $garage_array=array();//массив моих машин
static public $garage_enable=0;




const limit_added=50;//сколько дополнительных пользователей выбирать (для массива, потом отсеим неизвестную часть)
const limit_added2=12;//сколько дополнительных пользователей выбирать (из результата массива)
const min_additional_announcements=6;//минимальный набор дополнительных пользователей



static public $its_mypage=0;// я на своей странице

static public $flag_self_data_enable=0;//личные данные пользователя есть или нет
//static public $flag_self_data_general_enable=0;

//static public $flag_self_data_first_enable=0;//первые основные данные вверху
//static public $flag_self_data_borndate_enable=0;
//static public $flag_self_data_school_enable=0;
//static public $flag_self_data_universities_enable=0;

static public $array_photoalbums_list=array();//список фотоальбомов пользователя
static public $count_photoalbums=0;//сколько фотоальбомов у пользователя




//"sn_country_id_vk"=>array('','Страна',1,0,3),
//"sn_city_id_vk"=>array('','Город',1,0,3),
//"sn_universities_id_vk"=>array('','Вуз',1),
//"sn_universities_country_id_vk"=>array('','',10),
//"sn_universities_city_id_vk"=>array('','',11),
//"sn_universities_faculty_id_vk"=>array('','',12),
//"sn_universities_chair_id_vk"=>array('','',13),
//"sn_schools_id_vk"=>array('','Школа',14),
//"sn_schools_country_id_vk"=>array('','',15),
//"sn_schools_city_id_vk"=>array('','',16),
//"gen_name_user"=>array('','Имя',32),
//"gen_surname_user"=>array('','Фамилия',33),
//"site_mail_status"=>'',
//"site_login_status"=>'',
//"site_date_registration"=>'',
//"sn_schools_id_type_vk"=>'',







static public $array_self_data_main=array(//массив личных данных пользователя
"gen_login_user"=>'');
static public $array_self_data_main_enable=0;//есть или нет текст в массиве

static public $array_self_data_main_relations=array(//относится к array_self_data_main - массив личных данных пользователя - отдельно, потому что комплексный показ
"gen_sex"=>'',
"gen_relations"=>'');
static public $array_self_data_main_relations_enable=0;//есть или нет текст в массиве

static public $array_self_data_main_borndate=array(//относится к array_self_data_main - массив личных данных пользователя - отдельно, потому что комплексный показ
"gen_borndate_year"=>'',
"gen_borndate_month"=>'',
"gen_borndate_day"=>'');
static public $array_self_data_main_borndate_enable=0;//есть или нет текст в массиве





static public $array_buttons_to_userslists=array(//массив кнопок в списку пользователей
1=>'Написать сообщение',
2=>'Добавить в друзья',
3=>'Убрать из друзей',
4=>'Убрать заявку',
5=>'Отклонить заявку',
6=>'Принять заявку');




static public $array_self_data_contacts=array(//массив личных данных пользователя
"sn_url_vk"=>'',
"sn_url_ok"=>'',
"sn_url_mr"=>'',
"sn_url_ya"=>'',
"sn_url_go"=>'',
"sn_url_fb"=>'',
"mobile_phone"=>'',
"add_phone"=>'',
"gen_country_name"=>'',
"gen_city_name"=>'',
"gen_region_name"=>'',
"gen_state_name"=>''
);
static public $array_self_data_contacts_enable=0;



static public $array_self_data_contacts_mail=array(//относится к array_self_data_contacts - массив личных данных пользователя - отдельно, потому что комплексный показ
"site_mail_user"=>'',
"site_mail_status"=>'');
static public $array_self_data_contacts_mail_enable=0;//есть или нет текст в массиве







static public $array_self_data_activity=array(//массив личных данных пользователя
"activity"=>'');
static public $array_self_data_activity_enable=0;

static public $array_self_data_universities=array(//массив личных данных пользователя
"gen_universities_name"=>'',
"gen_universities_faculty_name"=>'',
"gen_universities_chair_name"=>'',
"gen_universities_graduation"=>'',
"gen_universities_education_form"=>'',
"gen_universities_education_status"=>'');
static public $array_self_data_universities_enable=0;

static public $array_self_data_schools=array(//массив личных данных пользователя
"gen_schools_name"=>'',
"site_cityschool"=>'',
"site_oblastschool"=>'',
"site_nametypeschool"=>'',
"gen_schools_year_from"=>'',
"gen_schools_year_to"=>'',
//"gen_schools_year_graduated"=>'',
"gen_schools_class"=>'',
"gen_schools_speciality"=>'');
static public $array_self_data_schools_enable=0;

static public $array_self_data_lichnoe=array(//массив личных данных пользователя
"interests"=>'',
"books"=>'',
"games"=>'',
"about"=>'',
"movies"=>'',
"tv"=>'',
"adddata"=>'');
static public $array_self_data_lichnoe_enable=0;





static public $text_gen_universities_name;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ университетов
static public $text_gen_universities_faculty_name;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ университетов
static public $text_gen_universities_chair_name;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ университетов
static public $text_gen_universities_graduation;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ университетов
static public $text_gen_universities_education_form;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ университетов
static public $text_gen_universities_education_status;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ университетов


static public $text_gen_schools_name;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ школ
static public $text_site_cityschool;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ школ
static public $text_site_oblastschool;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ школ
static public $text_site_nametypeschool;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ школ
static public $text_gen_schools_year_from;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ школ
static public $text_gen_schools_year_to;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ школ
static public $text_gen_schools_year_graduated;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ школ
static public $text_gen_schools_class;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ школ
static public $text_gen_schools_speciality;//текст с двойным разделяющим пробелом для отображения данных ВСЕХ школ




static public function set_array_self_data($row){

	foreach(self::$array_self_data_main as $key=>$value){
		self::$array_self_data_main[$key]=$row[$key];
		if (self::$array_self_data_main[$key]){		
			self::$array_self_data_main_enable=1;
			self::$flag_self_data_enable=1;}}
			
			
	foreach(self::$array_self_data_main_borndate as $key=>$value){
		self::$array_self_data_main_borndate[$key]=$row[$key];}
	if ((self::$array_self_data_main_borndate['gen_borndate_month']>0)&&(self::$array_self_data_main_borndate['gen_borndate_day']>0)){	
		self::$array_self_data_main_enable=1;
		self::$array_self_data_main_borndate_enable=1;
		self::$flag_self_data_enable=1;}
		
		
	foreach(self::$array_self_data_main_relations as $key=>$value){
		self::$array_self_data_main_relations[$key]=$row[$key];}
	if ((self::$array_self_data_main_relations['gen_sex']>0)&&(self::$array_self_data_main_relations['gen_relations']>0)){	
		self::$array_self_data_main_enable=1;
		self::$array_self_data_main_relations_enable=1;
		self::$flag_self_data_enable=1;}
		
		
	foreach(self::$array_self_data_contacts as $key=>$value){
		self::$array_self_data_contacts[$key]=$row[$key];
		if (self::$array_self_data_contacts[$key]){
			self::$array_self_data_contacts_enable=1;
			self::$flag_self_data_enable=1;}}
			
	foreach(self::$array_self_data_contacts_mail as $key=>$value){
		self::$array_self_data_contacts_mail[$key]=$row[$key];}
	if ((self::$array_self_data_contacts_mail['site_mail_user'])&&(self::$array_self_data_contacts_mail['site_mail_status']>0)){	
		self::$array_self_data_contacts_enable=1;
		self::$array_self_data_contacts_mail_enable=1;
		self::$flag_self_data_enable=1;}

			
			
	foreach(self::$array_self_data_schools as $key=>$value){
		self::$array_self_data_schools[$key]=$row[$key];
		if (self::$array_self_data_schools[$key]){
			self::$array_self_data_schools_enable=1;
			self::$flag_self_data_enable=1;}}
	foreach(self::$array_self_data_universities as $key=>$value){
		self::$array_self_data_universities[$key]=$row[$key];
		if (self::$array_self_data_universities[$key]){
			self::$array_self_data_universities_enable=1;
			self::$flag_self_data_enable=1;}}
	foreach(self::$array_self_data_activity as $key=>$value){
		self::$array_self_data_activity[$key]=$row[$key];
		if (self::$array_self_data_activity[$key]){
			self::$array_self_data_activity_enable=1;
			self::$flag_self_data_enable=1;}}			
	foreach(self::$array_self_data_lichnoe as $key=>$value){
		self::$array_self_data_lichnoe[$key]=$row[$key];
		if (self::$array_self_data_lichnoe[$key]){
			self::$array_self_data_lichnoe_enable=1;
			self::$flag_self_data_enable=1;}}}






static public function set_condition_added($MSQLc){//устанавливаем дополнительные данные для поля "вы можете их знать"
if (UsersMyData::$identified==1){
	$query="
	SELECT
		sn_city_id_vk,
		sn_universities_id_vk,
		sn_universities_city_id_vk,
		sn_universities_faculty_id_vk,
		sn_universities_chair_id_vk,
		gen_universities_name,
		sn_schools_id_vk,
		gen_schools_name,
		gen_city_name
	FROM 	registrated_users___main_data
	WHERE 	id_user='".UsersMyData::$id."' 
	LIMIT 	1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);

	//задаем массив моих параметров, которые могут быть установлены мной
	/*self::$my_addition_data_array['sn_city_id_vk']=$row['sn_city_id_vk'];
	self::$my_addition_data_array['sn_universities_id_vk']=$row['sn_universities_id_vk'];
	self::$my_addition_data_array['sn_universities_city_id_vk']=$row['sn_universities_city_id_vk'];
	self::$my_addition_data_array['sn_universities_faculty_id_vk']=$row['sn_universities_faculty_id_vk'];
	self::$my_addition_data_array['sn_universities_chair_id_vk']=$row['sn_universities_chair_id_vk'];
	self::$my_addition_data_array['gen_universities_name']=$row['gen_universities_name'];
	self::$my_addition_data_array['sn_schools_id_vk']=$row['sn_schools_id_vk'];
	self::$my_addition_data_array['gen_schools_name']=$row['gen_schools_name'];
	self::$my_addition_data_array['gen_city_name']=$row['gen_city_name'];*/

	
	if ($row['sn_city_id_vk']){
		$currentsarray = explode(" ",$row['sn_city_id_vk']);
		foreach($currentsarray as $key=>$value){
			if ($value)	{
				self::$condition_added1.=" OR sn_city_id_vk='".$value."'";}}}
		
	if ($row['sn_universities_id_vk']){
		$currentsarray = explode(" ",$row['sn_universities_id_vk']);
		foreach($currentsarray as $key=>$value){
			if ($value)	{
				self::$condition_added1.=" OR sn_universities_id_vk='".$value."'";}}}

	if ($row['sn_universities_city_id_vk']){
		$currentsarray = explode(" ",$row['sn_universities_city_id_vk']);
		foreach($currentsarray as $key=>$value){
			if ($value)	{
				self::$condition_added1.=" OR sn_universities_city_id_vk='".$value."'";}}}

	if ($row['sn_universities_faculty_id_vk']){
		$currentsarray = explode(" ",$row['sn_universities_faculty_id_vk']);
		foreach($currentsarray as $key=>$value){
			if ($value)	{
				self::$condition_added1.=" OR sn_universities_faculty_id_vk='".$value."'";}}}
	
	if ($row['sn_universities_chair_id_vk']){
		$currentsarray = explode(" ",$row['sn_universities_chair_id_vk']);
		foreach($currentsarray as $key=>$value){
			if ($value)	{
				self::$condition_added1.=" OR sn_universities_chair_id_vk='".$value."'";}}}
				
	if ($row['sn_schools_id_vk']){
		$currentsarray = explode(" ",$row['sn_schools_id_vk']);
		foreach($currentsarray as $key=>$value){
			if ($value)	{
				self::$condition_added1.=" OR sn_schools_id_vk='".$value."'";}}}
				
	self::$condition_added1=preg_replace("/^ OR /i","",self::$condition_added1);
	
	}}









static public function detect_garage($MSQLc){//устанавливаем дополнительные данные для поля "вы можете их знать"

    $query="SELECT id,themepage,mark,model,motor_type,power,img FROM garage WHERE id_user='".GeneralGetVars::$var2."'";
    $res=GeneralMYSQL::query($MSQLc,$query);
    $i=0;
    while($row=GeneralMYSQL::fetch_array($res)){
       $i++; 
        
        self::$garage_enable=1;
        
        self::$garage_array[$i]['id']=$row['id'];
        self::$garage_array[$i]['themepage']=$row['themepage'];
        self::$garage_array[$i]['mark']=$row['mark'];
        self::$garage_array[$i]['model']=$row['model'];
        self::$garage_array[$i]['motor_type']=$row['motor_type'];
        self::$garage_array[$i]['power']=$row['power'];
        
    	$textphotosarray=explode(" ",$row['img']);
    	foreach($textphotosarray as $value){
    		if ($value){
              
    			self::$garage_array[$i]['img']=str_replace("_3.","_5.",$value);
    			break;}}}
	}








static public function return_dir_catalog($id_user){	
	return floor($id_user/GeneralGlobalVars::maxusersincatalog)+1;}


	
	
	
	
static public function return_url_photo($photo,$photo_url_from_site,$photo_url_from_sn_big,$photo_url_from_sn_huge){	
	if ($photo==1) {	
		return "http://140706.selcdn.com/tazteam/_files/images/users/avas/".$photo_url_from_site;}
	else if (($photo==2)&&($photo_url_from_sn_big)){	
		return $photo_url_from_sn_big;}
	else if (($photo==2)&&($photo_url_from_sn_huge)){	
		return $photo_url_from_sn_huge;}	
	return "http://140706.selcdn.com/tazteam/_files/images/users/avas/nophoto_2.png";}
	
	
	
static public function return_age($day,$month,$year){	
	if ($year){
		$age=GeneralGlobalVars::$year-$year;
		if ((GeneralGlobalVars::$month-$month)<0) {$age--;}
		else if ((GeneralGlobalVars::$month-$month)==0) {
			if ((GeneralGlobalVars::$day-$day)<0) {$age--;}}		
		if ($age==1) {$text="лет";}
		else if (($age>1)&&($age<5)) {$text="года";}
		else if (($age>4)&&($age<11)) {$text="лет";}	
		else if (($age>10)&&($age<20)) {$text="лет";}	
		else if (($age%10)==0) {$text="лет";}
		else if (($age%10)==1) {$text="год";}
		else if (((($age%10)>1)&&($age%10)<5)) {$text="года";}
		else if (((($age%10)>4)&&($age%10)<=9)) {$text="лет";}
		return $age." ".$text;}}



static public function return_online($time){	
	if ((GeneralGlobalVars::$timeunix-$time)>GeneralGlobalVars::$onlineusertimegate) {self::$cur_user_online=false; return false;}
	else {self::$cur_user_online=true; return true;}}



	
static public function detect_friends_from_text($text){
	$text=trim($text);
	$friendsarray = explode("  ",$text); 
	self::$count_friends=0;	
	foreach($friendsarray as $key=>$value){
		if ($value)	{
		self::$friends_array[]=$value;
		self::$count_friends++;}}}
		
		
		
		
		

		
		
		
		
		
static public function detect_friendslist_from_text($MSQLc,$id_user){	
	$textrfiends=trim(self::return_row_friendship($MSQLc,$id_user));
	self::$friends_list = str_replace("  ",",",$textrfiends);}

	
static public function detect_friendsinlist_from_text($MSQLc){	
	$textrfiends=trim(self::return_row_friendship_tohim($MSQLc));
	self::$friendsin_list = str_replace("  ",",",$textrfiends);}	
	
static public function detect_friendsoutlist_from_text($MSQLc){	
	$textrfiends=trim(self::return_row_friendship_heto($MSQLc,GeneralGetVars::$var2));
	self::$friendsout_list = str_replace("  ",",",$textrfiends);}	
	
	
static public function return_row_friendship($MSQLc,$id_user){
	$query="
	SELECT	friendship
	FROM 	registrated_users___friendship
	WHERE 	id_user='".$id_user."' 
	LIMIT 	1";//UsersMyData::$id
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['friendship'];}
	
	
	
	
	
static public function set_keyedarray_my_friendship_and_heto($MSQLc){
	$query="
	SELECT	friendship,heto
	FROM 	registrated_users___friendship
	WHERE 	id_user='".UsersMyData::$id."' 
	LIMIT 	1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);

	$friendshiparray = explode(" ",$row['friendship']); 
	foreach($friendshiparray as $key=>$value){
		if ($value)	{	
		UsersForreg::$array_my_friends[$value]=1;}}//массив моих друзей
		
	$friendship_hetoarray = explode(" ",$row['heto']); 
	foreach($friendship_hetoarray as $key=>$value){
		if ($value)	{	
		UsersForreg::$array_my_friends_heto[$value]=1;}}}//массив заявок от меня

	
	
	
	
	
	
	
static public function return_row_friendship_tohim($MSQLc){
	$query="
	SELECT	tohim
	FROM 	registrated_users___friendship
	WHERE 	id_user='".GeneralGetVars::$var2."' 
	LIMIT 	1";//UsersMyData::$id
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['tohim'];}	
	
	
	
static public function return_row_friendship_heto($MSQLc,$id_user){
	$query="
	SELECT	heto
	FROM 	registrated_users___friendship
	WHERE 	id_user='".$id_user."' 
	LIMIT 	1";//UsersMyData::$id
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['heto'];}	
	
	
	
	
static public function detect_friends($MSQLc){
	self::detect_friends_from_text(self::return_row_friendship($MSQLc,GeneralGetVars::$var2));
	GeneralMYSQL::free($res);}		
		
		
		
		
		
		
		
static public function detect_its_mypage($flag){// 1 - с учетом администрации, 2 - без учета администрации
	if (UsersMyData::$identified==1){
		if ((GeneralGetVars::$var2==UsersMyData::$id)||(($flag==1)&&(GeneralSecurity::detect_administrator()==true))){
			self::$its_mypage=1;
			return true;}
		else if (GeneralGetVars::$var2==UsersMyData::$id){
			self::$its_mypage=1;
			return true;}}
	return false;}

	
	
	
	
	
	
static public function send_mail_for_redactpassword($MSQLc){
	if ($_POST['unreg_repassword_mail_antibot']==$_POST['unreg_repassword_mail_oves']){//если антибот и овес совпадают

	
		$query="
		SELECT
				gen_login_user,
				site_mail_user,
				gen_name_user,
				gen_surname_user,
				site_login_status,
				id_user 
		FROM 	registrated_users___main_data
		WHERE 	site_mail_user='".$_POST['unreg_repassword_mail']."'
		LIMIT 	1";//UsersMyData::$id
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	if ($row['id_user']>0){
		$key=UsersMyData::return_composed_password();//придумываем пароль - ключ

		//записываем 
		$query="INSERT INTO unregistered_users___identification_mail_key (mail,keypass,timewhen,id_user) VALUES ('".$_POST['unreg_repassword_mail']."','".$key."','".GeneralGlobalVars::$timeunix."','".$row['id_user']."') 
		ON DUPLICATE KEY UPDATE unregistered_users___identification_mail_key.keypass='".$key."', unregistered_users___identification_mail_key.timewhen='".GeneralGlobalVars::$timeunix."'";
		GeneralMYSQL::query_insert($MSQLc,$query);

		UsersMail::$to=$_POST['unreg_repassword_mail'];	
		UsersMail::$subject="Восстановление пароля на сайте instorage.org/portfolio/tazteam";
		UsersMail::$header.="From: instorage.org/portfolio/tazteam <".UsersMail::from.">";
		UsersMail::$header.="\nContent-type: text/html; charset=\"UTF-8\""; 
		UsersMail::$text="<HTML>\r\n
		<HEAD>\r\n
		<META http-equiv=Content-Type content='text/html; charset=UTF-8'>\r\n
		</HEAD>\r\n
		<BODY>\r\n
		<b style='font-size:17px; color:#333333;'>Уважаемый ".UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status'])."!</b>\r\n
		<table cellpadding='0' cellspacing='0' width='400'><tr><td height='5' align='left'></td></tr></table>
		<table cellpadding='0' cellspacing='0' width='400'>
		<tr>
		<td height='25' align='left' style='background-color:#006bbc; padding-left:5px; border-left:1px solid #8194b2; border-top:1px solid #8194b2; border-bottom:1px solid #385194;'>
			<b style='font-size:13px; color:#ffffff;'>Восстановление пароля</b>
		</td>
		<td height='25' align='left' width='110' valign='middle' style='background-color:#006bbc; padding-right:5px; border-right:1px solid #8194b2; border-top:1px solid #8194b2; border-bottom:1px solid #385194;'><a href='http://instorage.org/portfolio/tazteam' title='instorage.org/portfolio/tazteam - главная страница'><img src='http://instorage.org/portfolio/tazteam/images/MAILlogoTAZ.png' width='115' height='16' style='margin-top:3px;'></a></td>
		</tr>
		</table>
		<table cellpadding='5' cellspacing='0' width='400' style='border:1px solid #b6c3e5; background-color:#dce1ed; text-align: justify; word-spacing: 0.2ex;'>
		<tr>
		<td align='left'>
			<font style='font-size:12px;'>Пройдите по <a href='http://instorage.org/portfolio/tazteam/performing/confirm_user_by_mail.php/".$_POST['unreg_repassword_mail']."/".$key."' style='font-size:12px;'>ссылке</a>, чтобы восстановить пароль.</b></font>
		</td>
		</tr>
		</table>
		<table cellpadding='0' cellspacing='0' width='100%'><tr><td height='10' align='left'></td></tr></table>
		<font style='font-size:12px;'>С уважением, администрация <a href='http://instorage.org/portfolio/tazteam/users/155'>instorage.org/portfolio/tazteam</a></font>
		<table cellpadding='0' cellspacing='0' width='100%'><tr><td height='10' align='left'></td></tr></table>
		<font style='font-size:12px;'><a href='http://instorage.org/portfolio/tazteam/users/1'>Разработка сайта</a></font>
		</BODY>\r\n
		</HTML>";	

		UsersMail::send();
		
		GeneralCookies::setglobal("UsersSendMailForRepasswordStatus",1);		

}
else {
GeneralCookies::setglobal("UsersSendMailForRepasswordStatus",2);
}
}	
	}
	
	
	
	

	
static public function confirm_by_mail($MSQLc){
	//проверяем - есть ли мы с такими данными в таблице unregistered_users___identification_mail_key
	$query="
	SELECT	id_user
	FROM 	unregistered_users___identification_mail_key
	WHERE 	mail='".$_GET['get_var1']."' AND keypass='".$_GET['get_var2']."'
	LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);	
	if ($row['id_user']){//если данные mail и keypass присланы в get запросе правильно - если мы есть там
		$query="
		SELECT	
		rumd.gen_login_user as gen_login_user,
		rumd.site_mail_user as site_mail_user,
		rumd.gen_name_user as gen_name_user,
		rumd.gen_surname_user as gen_surname_user,
		rumd.site_login_status as site_login_status,
		rumd.id_user as id_user,
		registrated_users___secure_passwords.password as password
		FROM 
		(SELECT 
		registrated_users___main_data.id_user,
		registrated_users___main_data.gen_login_user,		
		registrated_users___main_data.site_mail_user,		
		registrated_users___main_data.gen_name_user,		
		registrated_users___main_data.gen_surname_user,		
		registrated_users___main_data.site_login_status	
		FROM 	registrated_users___main_data
		WHERE 	id_user='".$row['id_user']."' AND site_mail_user='".$_GET['get_var1']."'
		LIMIT 1) as rumd
		LEFT JOIN registrated_users___secure_passwords
		ON rumd.id_user=registrated_users___secure_passwords.id_user";
		$res=GeneralMYSQL::query($MSQLc,$query);		
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);
		if ($row['id_user']){//если данные найдены, то записываем их в куки, и тем самым делаем, что пользователь вошел
			//записываем необходимые куки
			GeneralCookies::setglobal("UsersMyDataId",$row['id_user']);
			GeneralCookies::setglobal("UsersMyDataPassword",$row['password']);			
			GeneralCookies::setglobal("UsersMyDataName",UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']));
			//теперь стираем запись в unregistered_users___identification_mail_key
			$query="
			DELETE FROM unregistered_users___identification_mail_key 
			WHERE mail='".$_GET['get_var1']."' AND keypass='".$_GET['get_var2']."'";
			GeneralMYSQL::query_delete($MSQLc,$query);
			//и валим
			GeneralHeaderHTTP::location(GeneralGlobalVars::url."/users/".$row['id_user']."/redactpassword");}}//идем на свою страницу сменя пароля
	return false;}
	
	
	
	
	
	
static public function detect_photoalbums($MSQLc,$friends_flag,$limit){
	$query="
	SELECT 
	registrated_users___photoalbums_photos.id_album as id_album,
	registrated_users___photoalbums_photos.dir_album as dir_album,
	registrated_users___photoalbums_photos.id_photo as id_photo,	
	registrated_users___photoalbums_photos_n1.count_photos as count_photos,
	registrated_users___photoalbums_photos.format_photo as format_photo,
	registrated_users___photoalbums.name_album as name_album
	FROM 
	(SELECT 
		id_user,
		id_album,
		MAX(id_photo) as last_id_photo,
		COUNT(id_photo) as count_photos
	FROM 
		registrated_users___photoalbums_photos
	GROUP BY 
		id_user,id_album
	HAVING";
	if (!$friends_flag){$query.="(id_user='".GeneralGetVars::$var2."')";}
	else {
		self::detect_friends($MSQLc);
		$query.="(id_user IN (".UsersPhotoalbumsBase::return_line_of_friends()."))";}
	$query.="
	ORDER by RAND()";
	if ($limit>0){
		$query.=" LIMIT ".$limit;}
	$query.=")
	as registrated_users___photoalbums_photos_n1
	LEFT JOIN
		registrated_users___photoalbums_photos
	ON  
		registrated_users___photoalbums_photos_n1.id_user=registrated_users___photoalbums_photos.id_user 
		AND 
		registrated_users___photoalbums_photos_n1.id_album=registrated_users___photoalbums_photos.id_album
		AND 
		registrated_users___photoalbums_photos_n1.last_id_photo=registrated_users___photoalbums_photos.id_photo
		
	LEFT JOIN
		registrated_users___photoalbums
		ON  
		registrated_users___photoalbums.id_user=registrated_users___photoalbums_photos.id_user	AND registrated_users___photoalbums.id_album=registrated_users___photoalbums_photos.id_album
		";
	$res=GeneralMYSQL::query($MSQLc,$query);		


	self::$count_photoalbums=0;
	while ($row=GeneralMYSQL::fetch_array($res)){
		self::$count_photoalbums++;
		self::$array_photoalbums_list[$row['id_album']]['id_album']=$row['id_album'];
		self::$array_photoalbums_list[$row['id_album']]['dir_album']=$row['dir_album'];
		self::$array_photoalbums_list[$row['id_album']]['id_photo']=$row['id_photo'];
		self::$array_photoalbums_list[$row['id_album']]['count_photos']=$row['count_photos'];
		self::$array_photoalbums_list[$row['id_album']]['format_photo']=$row['format_photo'];
		self::$array_photoalbums_list[$row['id_album']]['name_album']=$row['name_album'];}
		GeneralMYSQL::free($res);}
	
	
	

	
	
	

	
	
	
	
	
	static public function return_online_query_text($varquery){
		return " AND ".$varquery.">'".(GeneralGlobalVars::$timeunix-GeneralGlobalVars::$onlineusertimegate)."'";}	
	
	
	
	
	
	static public function write_sql_query_where($MSQLc,$var,$varquery,$type){//$type - 1 точно, 2 - приблизительно, 3 - по номерам, 4 - кто онлайн, 5 - фото
		if (isset($_COOKIE[$var])) {
			if ($_COOKIE[$var]) {
				if ($type==1){
					self::$find_query.=" AND ".$varquery."='".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."' ";}
				else if ($type==2){
					self::$find_query.=" AND ".$varquery." LIKE'%".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."%' ";}
				else if ($type==3){
					self::$find_query.=" AND ".$varquery."='".GeneralSecurity::tonumber($_COOKIE[$var])."' ";}
				else if ($type==4){
					self::$find_query.=self::return_online_query_text($varquery);}
				else if ($type==5){
					self::$find_query.=" AND (".$varquery."='1' OR ".$varquery."='2')";}
                    }}}
		

	static public function set_cookies_find(){	
		GeneralCookies::setglobal("users_find_query_online",$_POST['online']);
		GeneralCookies::setglobal("users_find_query_widthphoto",$_POST['widthphoto']);		
		GeneralCookies::setglobal("users_find_query_sex",$_POST['sex']);		
		GeneralCookies::setglobal("users_find_query_relations",$_POST['relations']);		
		GeneralCookies::setglobal("users_find_query_bdate_year",$_POST['bdate_year']);		
		GeneralCookies::setglobal("users_find_query_login",$_POST['login']);		
		GeneralCookies::setglobal("users_find_query_name",$_POST['name']);		
		GeneralCookies::setglobal("users_find_query_surname",$_POST['surname']);		
		GeneralCookies::setglobal("users_find_query_mail",$_POST['mail']);
		//GeneralCookies::setglobal("users_find_query_phone",$_POST['phone']);		
		GeneralCookies::setglobal("users_find_query_city",$_POST['city']);		
		GeneralCookies::setglobal("users_find_query_university",$_POST['university']);	
		GeneralCookies::setglobal("users_find_query_school_region",$_POST['school_region']);		
		GeneralCookies::setglobal("users_find_query_school_city",$_POST['school_city']);		
		GeneralCookies::setglobal("users_find_query_school_name",$_POST['school_name']);

		GeneralCookies::setglobal("users_find_status",1);


		GeneralCookies::setglobal("users_find_clear",'');





		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var3="";
		GeneralGetVars::$var2="";}
		
	
static public function convert_cookie_find_query($MSQLc){//составляем из всех куков, которые есть
	if (isset($_COOKIE['users_find_status'])){
		self::$find_status=$_COOKIE['users_find_status'];
		if(self::$find_status==1){
			self::$find_query="";//предварительно очищаем текст запроса			
			self::write_sql_query_where($MSQLc,"users_find_query_online","gen_timecoming",4);
			self::write_sql_query_where($MSQLc,"users_find_query_widthphoto","gen_photo",5);
			self::write_sql_query_where($MSQLc,"users_find_query_sex","gen_sex",3);
			self::write_sql_query_where($MSQLc,"users_find_query_relations","gen_relations",3);
			self::write_sql_query_where($MSQLc,"users_find_query_bdate_year","gen_borndate_year",3);
			self::write_sql_query_where($MSQLc,"users_find_query_login","gen_login_user",2);			
			self::write_sql_query_where($MSQLc,"users_find_query_name","gen_name_user",2);			
			self::write_sql_query_where($MSQLc,"users_find_query_surname","gen_surname_user",2);				
			self::write_sql_query_where($MSQLc,"users_find_query_mail","site_mail_user",2);			
			//self::write_sql_query_where($MSQLc,"users_find_query_phone","gen_relations",2);			
			self::write_sql_query_where($MSQLc,"users_find_query_city","gen_city_name",2);			
			self::write_sql_query_where($MSQLc,"users_find_query_university","gen_universities_name",2);				
			self::write_sql_query_where($MSQLc,"users_find_query_school_region","site_oblastschool",2);			
			self::write_sql_query_where($MSQLc,"users_find_query_school_city","site_cityschool",2);
			self::write_sql_query_where($MSQLc,"users_find_query_school_name","gen_schools_name",2);			
				
			self::$find_query=GeneralSecurity::return_safe_outside_sql_query(self::$find_query);
			self::$condition_main="WHERE 1".self::$find_query;}}}


			
			
static public function 	clear_find(){//очищаем поиск		
		GeneralCookies::setglobal("users_find_query_online",'');
		GeneralCookies::setglobal("users_find_query_widthphoto",'');		
		GeneralCookies::setglobal("users_find_query_sex",'');		
		GeneralCookies::setglobal("users_find_query_relations",'');		
		GeneralCookies::setglobal("users_find_query_bdate_year",'');		
		GeneralCookies::setglobal("users_find_query_login",'');		
		GeneralCookies::setglobal("users_find_query_name",'');		
		GeneralCookies::setglobal("users_find_query_surname",'');		
		GeneralCookies::setglobal("users_find_query_mail",'');
		GeneralCookies::setglobal("users_find_query_city",'');		
		GeneralCookies::setglobal("users_find_query_university",'');		
		GeneralCookies::setglobal("users_find_query_school_region",'');	
		GeneralCookies::setglobal("users_find_query_school_city",'');
		GeneralCookies::setglobal("users_find_query_school_city",'');		
		GeneralCookies::setglobal("users_find_status",'');
        
        
        
		GeneralCookies::setglobal("users_find_clear",1);        
        
        
        }
	

	
	
	
	
	
static public function 	set_points($MSQLc,$id_user){//начисляем баллы
	if (UsersMyData::$id!=$id_user){//если это не мы
		if ($_COOKIE['url_last_page']!==$_COOKIE['url_current_page']){//если прошлая страница не та же
			$query="
			UPDATE 	registrated_users___main_data 
			SET 	site_points=site_points+50
			WHERE 	id_user='".$id_user."' 
			LIMIT 	1";//echo($query);
			GeneralMYSQL::query_update($MSQLc,$query);}}}
	
	
	
	
	
	
	
	
	
	
	}



	
