<?php
class GeneralGetVars{
static public $enable_to_save_page=1;
static public $var1=0;
static public $var2=0;
static public $var3=0;
static public $var4=0;
static public $max_get_vars=4;
static public $num_page=0;
static public $redact_message=0;
static public $anchor=0;//якорь для скролла 
static public $urltosubmit;
static public $urlfromsubmit;
static public $urlview;



static public $currenturlpage="";//url текущей страницы

static public function revision($MSQLc){
	self::$currenturlpage=GeneralGlobalVars::url;
	if (!empty($_GET['get_var1'])) {self::$var1=GeneralSecurity::real_escape($MSQLc,$_GET['get_var1']); self::$currenturlpage.="/".self::$var1;} //проверяется в .htaccess
	if (!empty($_GET['get_var2'])) {self::$var2=GeneralSecurity::real_escape($MSQLc,$_GET['get_var2']); self::$currenturlpage.="/".self::$var2;}
	if (!empty($_GET['get_var3'])) {self::$var3=GeneralSecurity::real_escape($MSQLc,$_GET['get_var3']); self::$currenturlpage.="/".self::$var3;}
	if (!empty($_GET['get_var4'])) {self::$var4=GeneralSecurity::real_escape($MSQLc,$_GET['get_var4']); self::$currenturlpage.="/".self::$var4;}
	if (!empty($_GET['num_page'])) {self::$num_page=GeneralSecurity::real_escape($MSQLc,$_GET['num_page']); self::$currenturlpage.="=".self::$num_page;}//номер страницы в листинге (темы форума и т.д.)
	if (!empty($_GET['redact_message'])) {self::$redact_message=GeneralSecurity::real_escape($MSQLc,$_GET['redact_message']); self::$currenturlpage.="#".self::$redact_message;}//номер редактируемого сообщения (темы форума и т.д.)
	self::set_submit_vars();
	self::set_urlview();}




static public function save_page_url_in_cookies(){
	if (self::$enable_to_save_page==1){
		if(isset($_COOKIE['url_current_page'])){GeneralCookies::setglobal("url_last_page",$_COOKIE['url_current_page']);}
		else {GeneralCookies::setglobal("url_last_page","no");}
		GeneralCookies::setglobal("url_current_page",self::$currenturlpage);}}


		
static public function set_urlview(){		
	self::$urlview=GeneralGlobalVars::url;
	if (self::$var1){
		self::$urlview.="/".self::$var1;
		if (self::$var2){
			self::$urlview.="/".self::$var2;
			if (self::$var3){
				self::$urlview.="/".self::$var3;}
				if (self::$var4){
					self::$urlview.="/".self::$var4;}}}
	if (self::$num_page>0){self::$urlview.="=".self::$num_page;}}	
		
		
		
		
static public function set_submit_vars(){
	if (GeneralPageBasic::$pagestatus=="view"){//из страницы просмотра - обычная страница
		self::$urltosubmit=GeneralGlobalVars::url."/submit.php?".$_SERVER['QUERY_STRING'];
		self::$urltosubmit=str_replace('&','&amp;',self::$urltosubmit);}
	else if (GeneralPageBasic::$pagestatus=="submit"){
		if ((self::$var1=="video")||(self::$var1=="forum")||(self::$var1=="photo")||(self::$var1=="automarket")||(self::$var1=="garage")||(self::$var1=="news")||(self::$var1=="articles")||(self::$var1=="video")||(self::$var1=="users")||(self::$var1=="vote")||(self::$var1=="tests")||(self::$var1==0)){//из страницы обработки submit запроса
		
			self::$urlfromsubmit=GeneralGlobalVars::url;
			if (self::$var1){
				self::$urlfromsubmit.="/".self::$var1;
				if (self::$var2){
					self::$urlfromsubmit.="/".self::$var2;
					if (self::$var3){
						self::$urlfromsubmit.="/".self::$var3;}
						if (self::$var4){
							self::$urlfromsubmit.="/".self::$var4;}}}
			if (self::$num_page>0){self::$urlfromsubmit.="=".self::$num_page;}			
			if (self::$anchor){self::$urlfromsubmit.="#".self::$anchor;}}}}

}
//GeneralGetVars::revision($MSQLc);