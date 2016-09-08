<?php
class GeneralPageBasic{
static public $scroll=0;


static public $pagestatus="";//view или submit
static public $code_page;
static public $text_code_page;

static public $general_width_blocks_in_list="33%";//по умолчанию ширина блоков списка
static public $general_width_div_in_block_in_list="210px";//по умолчанию ширина блока в блоке списка

static public $general_width_table_for_gallery="200px";//по умолчанию ширина блока в блоке списка
static public $general_width_table_for_gallery2="220px";//по умолчанию ширина блока в блоке списка

static public $page_size_reclamatype=1;//1 - без правого столбика, 2 - с правым столбиком (для широких мониторов)



//возвращает раскодированные значения страницы
static public $code_sign;
static public $code_section;
static public $code_topic;
static public $code_idphoto;
static public $current_name_topic;





static public function return_url_current_page(){
	if (isset($_COOKIE['url_current_page'])){
		if ($_COOKIE['url_current_page']){
			return $_COOKIE['url_current_page'];}}
	return GeneralGlobalVars::url;}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
static public function return_name_forum3($MSQLc,$section,$topic){
	$query="SELECT name_topic FROM forum___topics_".$section." WHERE id_topic='".$topic."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['name_topic'];}
	
static public function return_name_forum2($MSQLc,$section){
	$query="SELECT name_section FROM forum___sections WHERE id_section='".$section."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['name_section'];}

static public function return_name_photo3($MSQLc,$section,$topic){
	$query="SELECT name_topic FROM photo___topics_".$section." WHERE id_topic='".$topic."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['name_topic'];}
	
static public function return_name_photoalbums_self($MSQLc,$section,$topic){
	$query="SELECT name_album FROM registrated_users___photoalbums WHERE id_user='".$section."' AND id_album='".$topic."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['name_album'];}
		
static public function return_name_news3($MSQLc,$topic){
	$query="SELECT name FROM news WHERE id='".$topic."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['name'];}

static public function return_name_articles3($MSQLc,$topic){
	$query="SELECT name FROM news WHERE id='".$topic."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['name'];}	
	

	
static public function return_name_automarket3($MSQLc,$topic){
	$query="SELECT name,themepage,mark,model FROM automarket WHERE id='".$topic."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);	
	if ($row['themepage']==1){ 
		return "продам ".AutomarketBase::return_parameters("mark", $row['mark'])." ".$row['model'];} 
	else if ($row['themepage']==2){ 
		return "продам ".$row['name'];} 	
	else if ($row['themepage']==3){ 
		return "куплю ".$row['name'];}}
		
static public function return_name_video3($MSQLc,$topic){
	$query="SELECT video_name FROM video WHERE id='".$topic."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['video_name'];}	
		
static public function return_name_walls($MSQLc,$section){
	$query="
		SELECT 
			gen_login_user,
			site_mail_user,
			gen_name_user,
			gen_surname_user,
			site_login_status,
			id_user 
			FROM registrated_users___main_data WHERE id_user='".$section."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	if ($row['id_user']>0)	{//если пользователь есть
		return UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);}
	return false;}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
static public function uncode_page($code){//формируем код страницы
	//узнаем первые 2 буквы
	self::$code_sign=$code[0].$code[1];
	if (self::$code_sign=="fm"){//
		self::$code_section=(int)($code[3].$code[4].$code[5].$code[6]);
		self::$code_topic=(int)($code[8].$code[9].$code[10].$code[11].$code[12].$code[13]);
		self::$code_idphoto="";}
	else if (self::$code_sign=="ga"){//
		self::$code_section=(int)($code[3].$code[4].$code[5].$code[6]);
		self::$code_topic=(int)($code[8].$code[9].$code[10].$code[11].$code[12].$code[13]);
		self::$code_idphoto=(int)($code[15].$code[16].$code[17].$code[18]);}
	else if (self::$code_sign=="sf"){//
		self::$code_section=(int)($code[3].$code[4].$code[5].$code[6].$code[7].$code[8].$code[9].$code[10].$code[11].$code[12]);
		self::$code_topic=(int)($code[14].$code[15].$code[16].$code[17]);
		self::$code_idphoto=(int)($code[19].$code[20].$code[21].$code[22].$code[23].$code[24]);}
	else if (self::$code_sign=="ne"){//
		self::$code_topic=(int)($code[3].$code[4].$code[5].$code[6].$code[7].$code[8]);
		self::$code_idphoto="";}		
	else if (self::$code_sign=="ar"){//
		self::$code_topic=(int)($code[3].$code[4].$code[5].$code[6].$code[7].$code[8]);
		self::$code_idphoto="";}
	else if (self::$code_sign=="am"){//
		self::$code_section=(int)($code[3].$code[4].$code[5].$code[6]);
		self::$code_topic=(int)($code[8].$code[9].$code[10].$code[11].$code[12].$code[13]);
		self::$code_idphoto="";}
	else if (self::$code_sign=="vi"){//
		self::$code_section=(int)($code[3].$code[4].$code[5].$code[6]);
		self::$code_topic=(int)($code[8].$code[9].$code[10].$code[11].$code[12].$code[13]);
		self::$code_idphoto="";}
	else if (self::$code_sign=="sm"){
		self::$code_section=(int)($code[3].$code[4].$code[5].$code[6].$code[7].$code[8].$code[9].$code[10].$code[11].$code[12].$code[13]);//id переписки
		self::$code_topic="";
		self::$code_idphoto="";}
	else if (self::$code_sign=="ft"){//
		self::$code_section=(int)($code[3].$code[4].$code[5].$code[6]);
		self::$code_topic="";
		self::$code_idphoto="";}
	else if (self::$code_sign=="sw"){//чья стена
		self::$code_section=(int)($code[3].$code[4].$code[5].$code[6].$code[7].$code[8].$code[9].$code[10].$code[11].$code[12]);
		self::$code_topic="";
		self::$code_idphoto="";}
	else if (self::$code_sign=="mc"){//просто главный чат, он один
		self::$code_section="";
		self::$code_topic="";
		self::$code_idphoto="";}
		
	else if (self::$code_sign=="sh"){//просто магазин, он один
		self::$code_section="";
		self::$code_topic="";
		self::$code_idphoto="";}}


	
	
static public function set_code_page($sign,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//формируем код страницы
	if ($sign=="fm"){
		$section=10000+$getvar2;	
		$topic=1000000+$getvar3;
		self::$text_code_page="fm".$section.$topic;
		self::$code_page=$section.$topic;}
	else if ($sign=="sw"){
		$section=10000000000+$getvar2;
		self::$text_code_page="sw".$section;
		self::$code_page=$section;}		
	else if ($sign=="ft"){
		$section=10000+$getvar2;
		self::$text_code_page="ft".$section;
		self::$code_page=$section;}			
	else if ($sign=="vi"){
		$section=10000+$getvar2;	
		$topic=1000000+$getvar3;
		self::$text_code_page="vi".$section.$topic;
		self::$code_page=$section.$topic;}		
	else if ($sign=="sf"){
		$section=10000000000+$getvar2;	
		$topic=10000+$getvar4;
		$photo=1000000+$idphoto;
		self::$text_code_page="sf".$section.$topic.$photo;
		self::$code_page=$section.$topic.$photo;}			
	else if ($sign=="ga"){
		$section=10000+$getvar2;	
		$topic=1000000+$getvar3;
		$photo=10000+$idphoto;
		self::$text_code_page="ga".$section.$topic.$photo;
		self::$code_page=$section.$topic.$photo;}
	else if ($sign=="ne"){
		$topic=1000000+$getvar2;
		self::$text_code_page="ne".$topic;
		self::$code_page=$topic;}
	else if ($sign=="ar"){
		$topic=1000000+$getvar2;
		self::$text_code_page="ar".$topic;
		self::$code_page=$topic;}
	else if ($sign=="am"){
		$section=10000+$getvar2;	
		$topic=1000000+$getvar3;
		self::$text_code_page="am".$section.$topic;		
		self::$code_page=$section.$topic;}
	else if ($sign=="sm"){
		$section=100000000000+$getvar4;	//переписка
		//$topic=10000000000+$getvar2;//на случай конференции
		self::$text_code_page="sm".$section;	
		self::$code_page=$section;}
	else if ($sign=="mc"){//чат на главной странице
		$section="";
		$topic="";
		self::$text_code_page="mc";	
		self::$code_page="mc";}	//нужно чтото написать, все равно эта тема одна	
	else if ($sign=="sh"){//чат на главной странице
		$section="";
		$topic="";
		self::$text_code_page="sh";	
		self::$code_page="sh";}	//нужно чтото написать, все равно эта тема одна			
		
		}
	
	

	
	


static public function increment_view($MSQLc,$db,$condition1,$condition2,$condition3,$condition4,$condition5){
	if ($_COOKIE['url_last_page']!==$_COOKIE['url_current_page']){//если прошлая страница не та же
		$query="UPDATE ".$db." SET number_views=number_views+1";
		if ($condition1) {$query.=" WHERE ".$condition1;}	
		if ($condition2) {$query.=" AND ".$condition2;}
		if ($condition3) {$query.=" AND ".$condition3;}
		if ($condition4) {$query.=" AND ".$condition4;}
		if ($condition5) {$query.=" AND ".$condition5;}
		$res=GeneralMYSQL::query_update($MSQLc,$query);}}








	
	
	
	

	
	
	
	
	
	
	




















/*
function set_scrolling($var){//прокручивать яваскрипту вниз документа или нет (передаем через header)
	GeneralCookies::setglobal("PageBasicScroll",$var);}
	
function detect_scroll(){//прокручивать яваскрипту вниз документа или нет (передаем через header)
	if (!empty($_COOKIE['PageBasicScroll'])) {
		self::$scroll=$_COOKIE['PageBasicScroll'];
		if (self::$scroll>0){
			GeneralCookies::setglobal("PageBasicScroll",0);
			}}
	else {
		self::$scroll=0;}}*/
}
?>