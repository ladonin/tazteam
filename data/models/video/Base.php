<?php   
class VideoBase{
static public $find_status="";
static public $find_query="";//текст запроса
static public $sort_by=1;
//1 - Экстрим вождение
//2 - Тюнинг
//999 - Прочее





static public $condition_main;//условия выборки объявлений
static public $announcements_enable;

static public function return_name_section($themepage){
	if ($themepage==1){
		return "Обзоры и тест-драйв";}
		
		
		
	else if ($themepage==2){
		return "Экстремальное вождение";}		
		
		
		
		
		
	else if ($themepage==3){
		return "Тюнинг";}	
		
	else if ($themepage==999){
		return "Прочее";}}


static public function write_sql_query_where($MSQLc,$var,$varquery,$type){//$type - 1 точно, 2 - приблизительно
		if (isset($_COOKIE[$var])) {
			if ($_COOKIE[$var]) {
			
			if ($type==1){
				self::$find_query.=" AND ".$varquery."='".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."' ";}
			if ($type==2){
				self::$find_query.=" AND ".$varquery."='".GeneralSecurity::tonumber($_COOKIE[$var])."' ";}
			else {
				self::$find_query.=" AND ".$varquery." LIKE'%".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."%' ";}}}}
		




static public function set_sort(){//что выбираем на главной странице при переходе на неё
	if (isset($_COOKIE['video_sort_by'])){
		if ($_COOKIE['video_sort_by']==2) {self::$sort_by=2;}
		
		else if ($_COOKIE['video_sort_by']==3) {self::$sort_by=3;}
		
		else if ($_COOKIE['video_sort_by']==999) {self::$sort_by=999;}}	
	if (self::$sort_by==1){	
		self::$find_query=" AND themepage='1' ";}
	else if (self::$sort_by==2){
		self::$find_query=" AND themepage='2' ";}



	else if (self::$sort_by==3){
		self::$find_query=" AND themepage='3' ";}



		
	else if (self::$sort_by==999){
		self::$find_query=" AND themepage='999'";}		
		self::$condition_main="WHERE 1 ".self::$find_query;}




	static public function set_cookies_sort_by_drive(){
		GeneralCookies::setglobal("video_sort_by",1);
		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";}
		
		
		
		
		
	static public function set_cookies_sort_by_extrime(){
		GeneralCookies::setglobal("video_sort_by",2);
		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";}
		
		
		
	static public function set_cookies_sort_by_tuning(){
		GeneralCookies::setglobal("video_sort_by",3);
		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";}		
		
		
		
	static public function set_cookies_sort_by_else(){
		GeneralCookies::setglobal("video_sort_by",999);
		GeneralGetVars::$num_page=1;
		GeneralGetVars::$var2="";
		GeneralGetVars::$var3="";}		












}