<?php   
class NewsBase{
const min_additional_news=5;//минимальный набор дополнительных объявлений
const limit_added=14;//сколько объявлений выбирать
static public $id=0;//id объявления
static public $id_autor;//id автора объявления
static public $find_query="";//текст запроса
static public $find_status=0;//1 - есть поисковый запрос


//фотографии объявления
static public $img1=0;
static public $img2=0;
static public $img3=0;
static public $img4=0;
static public $img5=0;
static public $img6=0;
static public $img7=0;
static public $img8=0;
static public $img9=0;
static public $img10=0;
static public $img11=0;
static public $img12=0;
static public $img13=0;
static public $img14=0;
static public $img15=0;
static public $img16=0;
static public $img17=0;
static public $img18=0;
static public $img19=0;
static public $img20=0;



//размеры фотографий
static public $width1=0;
static public $width2=0;
static public $width3=0;
static public $width4=0;
static public $width5=0;
static public $width6=0;
static public $width7=0;
static public $width8=0;
static public $width9=0;
static public $width10=0;
static public $width11=0;
static public $width12=0;
static public $width13=0;
static public $width14=0;
static public $width15=0;
static public $width16=0;
static public $width17=0;
static public $width18=0;
static public $width19=0;
static public $width20=0;

static public $height1=0;
static public $height2=0;
static public $height3=0;
static public $height4=0;
static public $height5=0;
static public $height6=0;
static public $height7=0;
static public $height8=0;
static public $height9=0;
static public $height10=0;
static public $height11=0;
static public $height12=0;
static public $height13=0;
static public $height14=0;
static public $height15=0;
static public $height16=0;
static public $height17=0;
static public $height18=0;
static public $height19=0;
static public $height20=0;


static public $condition_main;//условия выборки объявлений


static public $mark="";
static public $model="";

static public $img1_cur;//временное значение src изображения (для дополнительных объявлений)

static public $condition_added1;//условия выборки дополительных объявлений
static public $condition_added2;//условия выборки дополительных объявлений
static public $condition_added3;//условия выборки дополительных объявлений


static public $themepage=1;



/*
//данные объявления
static public $name;
static public $themepage;
static public $photo;
static public $img;
static public $content;
static public $mark;
static public $model;
static public $year_production;
static public $price;
static public $price_int;
static public $run;
static public $run_int;
static public $motor_vol;
static public $motor_type;
static public $power;
static public $state;
static public $customs;
static public $changing;
static public $color;
static public $color_hex;
static public $basket_type;
static public $drive_type;
static public $KPP;
static public $presense;
static public $country_producer;
static public $city;
static public $region;
static public $phone;
static public $seller;
static public $abs;
static public $gbo;
static public $computer;
static public $conditioner;
static public $disks;
static public $disk_size;
static public $warm_chair;
static public $guard;
static public $parktronik;
static public $security_pillows;
static public $salon;
static public $toned;
static public $amplifier_rudder;
static public $electro_gas;
static public $electro_glass_up;
*/

static public function detect_photos_main($textphotos,$textsizes) {//вычисляем из списка фотографии главного объявления
	$textphotosarray=explode(" ",$textphotos);
	$textsizesarray=explode(" ",$textsizes);
	$i=1;
	foreach($textphotosarray as $key=>$value){
		if ($value){	
			$varimg="img".$i;			
			self::$$varimg=$value;

			$varwidth="width".$i;
			$varheight="height".$i;
			$sizes=trim($textsizesarray[$key]);
			$textimagessizesarray=explode("x",$sizes);
			self::$$varwidth=$textimagessizesarray[0];
			self::$$varheight=$textimagessizesarray[1];			
			$i++;}}}

static public function detect_themepage(){
	if (GeneralGetVars::$var1==="news") {self::$themepage=1;}
	else if (GeneralGetVars::$var1==="articles") {self::$themepage=2;}}
	
	
static public function preload_photos() {//подгрузка других фотографий объявления
	for($i=2; $i<=20; $i++){
		$varimg="img".$i;
		if (newsBase::$$varimg!=0){		
			$curvar=newsBase::$$varimg;		
			
			//$curvar=preg_replace("/([0-9]+)(\.[a-z]+)/i","$1_3$2",$curvar);
			$curvar=str_replace(".","_3.",$curvar);		
			GeneralImagesPreload::input("_files/images/news/".GeneralGetVars::$var3."/".$curvar);}}}


			
static public function detect_photos_by_number($textphotos) {//вычисляем из списка фотографии главного объявления по номерам, "img".номер изображени (для submit.php)
	$textphotosarray=explode(" ",$textphotos);
	foreach($textphotosarray as $value){
		if ($value){
			$i=preg_replace("/([0-9]+)_[0-9]+\.[a-z]+/i","$1",$value);
			$var="img".$i;
			self::$$var=$value;}}}
			
			
static public function detect_first_photo($textphotos) {//вычисляем первое фото из списка фотографий
	$textphotosarray=explode(" ",$textphotos);
	foreach($textphotosarray as $value){
		if ($value){
			self::$img1_cur=$value;
			break;}}}


			
static public function return_size_to_photo($img, $size) {//возвращаем размер фотографии
	return str_replace("_3.","_".$size.".",$img);}



	
	static public function write_sql_query_where($MSQLc,$var,$varquery,$type){//$type - 1 точно, 2 - приблизительно
		if (isset($_COOKIE[$var])) {
			if ($_COOKIE[$var]) {
			
			if ($type==1){
				self::$find_query.=" AND ".$varquery."='".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."' OR secretword='".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."' ";}
			else {
				self::$find_query.=" AND ".$varquery." LIKE'%".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."%' OR secretword='".GeneralSecurity::real_escape($MSQLc,$_COOKIE[$var])."' ";}}}}
		

static public function set_cookies_find(){		
	if ($_POST['name']){
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_query_name",$_POST['name']);
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_status",1);}
	else {
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_query_name",'');
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_status",0);}
	GeneralGetVars::$num_page=1;
	GeneralGetVars::$var2="";
	GeneralGetVars::$var3="";}


static public function convert_cookie_find_query($MSQLc){//составляем из всех куков, которые есть
	if (isset($_COOKIE[GeneralGetVars::$var1.'_find_status'])){
		self::$find_status=$_COOKIE[GeneralGetVars::$var1.'_find_status'];
		if(self::$find_status==1){
			self::write_sql_query_where($MSQLc,GeneralGetVars::$var1."_find_query_name","name",2);		
				
			self::$find_query=GeneralSecurity::return_safe_outside_sql_query(self::$find_query);
			self::$condition_main=self::$find_query;
			self::$condition_added3=str_replace("AND","",self::$condition_main);}}}
			
			
static public function 	clear_find(){//очищаем поиск		
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_query_name",'');			
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_status",'');}
			
			
			
			
}

?>