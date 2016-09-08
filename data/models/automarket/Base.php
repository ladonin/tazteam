<?php   
class AutomarketBase{
const min_additional_announcements=5;//минимальный набор дополнительных объявлений
const limit_added=15;//сколько объявлений выбирать
static public $id=0;//id объявления
static public $id_autor;//id автора объявления
static public $find_query="";//текст запроса
static public $find_status=0;//1 - есть поисковый запрос



static public $sort_by=1;//на главной странице = 1 - сортировка по тазам, 2 - сортировка по другим авто, 3- сортировка по запчастям, 4 - сортировка по покупкам

static public $order_id=0;
static public $order_main="";

static public $announcements_enable=0;//1 - объявления найдены
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


static public function preload_photos() {//подгрузка других фотографий объявления
	for($i=2; $i<=20; $i++){
		$varimg="img".$i;
		if (AutomarketBase::$$varimg!=0){		
			$curvar=AutomarketBase::$$varimg;		
			$curvar=preg_replace("/([0-9]+)(\.[a-z]+)/i","$1_3$2",$curvar);		
			GeneralImagesPreload::input("_files/images/automarket/".GeneralGetVars::$var3."/".$curvar);}}}


			
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


		
			
			
			
static public function return_parameters($what, $num)	{
	if ($what=="motor_type")
	{
		switch ($num){
		case 11: return "бензин карбюратор"; break;
		case 12: return "бензин инжектор"; break;		
		case 13: return "бензин ротор"; break;		
		case 14: return "бензин компрессор"; break;		
		case 15: return "бензин турбонаддув"; break;
		case 16: return "дизель"; break;
		case 17: return "дизель турбонаддув"; break;
		case 18: return "гибридный бензиновый"; break;
		case 19: return "гибридный дизельный"; break;
		case 20: return "электрический"; break;}}		
	else if ($what=="mark")
	{
		switch ($num){
		case 101: return "ACURA"; break;
		case 102: return "ALFA ROMEO"; break;
		case 103: return "ASTON MARTIN"; break;
		case 104: return "AUDI"; break;	
		case 105: return "BMW"; break;				
		case 106: return "BYD"; break;				
		case 107: return "CADILLAC"; break;				
		case 108: return "CHERY"; break;	
		case 109: return "CHEVROLET"; break;
		case 110: return "CHRYSLER"; break;	
		case 111: return "CITROEN"; break;
			case 112: return "DAEWOO"; break;
			case 113: return "DAIHATSU"; break;
			case 114: return "DODGE"; break;	
			case 115: return "FAW"; break;				
			case 116: return "FIAT"; break;				
			case 117: return "FORD"; break;				
			case 118: return "GEELY"; break;	
			case 119: return "GMC"; break;
			case 120: return "GREAT WALL"; break;	
			case 121: return "HAFEI"; break;
			case 122: return "HONDA"; break;
			case 123: return "HUMMER"; break;
			case 124: return "HYUNDAI"; break;	
			case 125: return "INFINITI"; break;				
			case 126: return "IRAN KHODRO"; break;				
			case 127: return "ISUZU"; break;				
			case 128: return "JAGUAR"; break;	
			case 129: return "JEEP"; break;
			case 130: return "KIA"; break;	
			case 131: return "LANCIA"; break;
			case 132: return "LAND ROVER"; break;
			case 133: return "LEXUS"; break;
			case 134: return "LIFAN"; break;				
			case 135: return "MAZDA"; break;				
			case 136: return "MERCEDES-BENZ"; break;				
			case 137: return "MERCURY"; break;				
			case 138: return "MINI"; break;	
			case 139: return "MITSUBISHI"; break;
			case 140: return "NISSAN"; break;	
			case 141: return "OPEL"; break;
			case 142: return "PEUGEOT"; break;
			case 143: return "PORSCHE"; break;
			case 144: return "RENAULT"; break;
			case 145: return "ROVER"; break;				
			case 146: return "SAAB"; break;				
			case 147: return "SEAT"; break;				
			case 148: return "SKODA"; break;	
			case 149: return "SMART"; break;
			case 150: return "SSANG YONG"; break;	
			case 151: return "SUBARU"; break;
			case 152: return "SUZUKI"; break;				
			case 153: return "TOYOTA"; break;
			case 154: return "VOLKSWAGEN"; break;	
			case 155: return "VOLVO"; break;
			case 156: return "АЗЛК (Москвич)"; break;						
			case 157: return "ВАЗ"; break;
			case 158: return "ГАЗ"; break;
			case 159: return "ЗАЗ"; break;	
			case 160: return "ЗИЛ"; break;
			case 161: return "ИЖ"; break;					
			case 162: return "КамАЗ"; break;
			case 163: return "ЛУАЗ"; break;
			case 164: return "МАЗ"; break;
			case 165: return "СеАЗ"; break;
			case 166: return "СМЗ"; break;
			case 167: return "ТАГАЗ"; break;					
			case 168: return "УАЗ"; break;
			case 169: return "Эксклюзив"; break;
			case 170: return "FOTON"; break;						
			case 171: return "IVECO"; break;					
			case 172: return "MAN"; break;				
			case 173: return "УРАЛ"; break;					
			case 174: return "TATRA"; break;				
		}}		
		else if ($what=="state")
		{
			switch ($num){
			case 11: return "на запчасти"; break;
			case 12: return "перевертыш"; break;		
			case 13: return "битая"; break;		
			case 14: return "требует ремонта"; break;		
			case 15: return "удовлетворительное"; break;
			case 16: return "хорошее"; break;
			case 17: return "отличное"; break;
			case 18: return "новая"; break;
		}}
		else if ($what=="presense")
		{
			switch ($num){
			case 11: return "в наличии"; break;
			case 12: return "на заказ"; break;		
			case 13: return "в пути"; break;		
		}}
		else if ($what=="changing")
		{
			switch ($num){
			case 11: return "интересует"; break;
			case 12: return "не интересует"; break;		
			case 13: return "на ТС дешевле"; break;		
			case 14: return "на ТС дороже"; break;		
		}}
		else if ($what=="customs")
		{
			switch ($num){
			case 11: return "растаможен"; break;
			case 12: return "не растаможен"; break;		
		}}
		else if ($what=="seller")
		{
			switch ($num){
			case 11: return "юр. лицо"; break;
			case 12: return "физ. лицо"; break;		
		}}
		else if ($what=="basket_type")
		{
			switch ($num){
			case 11: return "седан"; break;
			case 12: return "хэтчбек 3д"; break;		
			case 13: return "хэтчбек 5д"; break;		
			case 14: return "универсал"; break;		
			case 15: return "внедорожник 3д"; break;
			case 16: return "внедорожник 5д"; break;
			case 17: return "пикап"; break;
			case 18: return "минивен"; break;
			case 19: return "компактвен"; break;		
			case 20: return "кабриолет"; break;
			case 21: return "купе"; break;
			case 22: return "родстер"; break;
			case 23: return "лимузин"; break;
		}}
		else if ($what=="drive_type")
		{
			switch ($num){
			case 11: return "задний"; break;
			case 12: return "передний"; break;		
			case 13: return "полный"; break;		
		}}
		else if ($what=="KPP")
		{
			switch ($num){
			case 11: return "механическая"; break;
			case 12: return "автомат"; break;		
			case 13: return "вариатор"; break;		
			case 14: return "робот"; break;		
		}}
		else if ($what=="disks")
		{
			switch ($num){
			case 11: return "штампованные"; break;
			case 12: return "сборные"; break;		
			case 13: return "литые"; break;		
			case 14: return "кованые"; break;		
		}}
		else if ($what=="disk_size")
		{
			switch ($num){
			case 112: return "R12"; break;
			case 113: return "R13"; break;		
			case 114: return "R14"; break;		
			case 115: return "R15"; break;
			case 116: return "R16"; break;		
			case 117: return "R17"; break;
			case 118: return "R18"; break;
			case 119: return "R19"; break;		
			case 120: return "R20"; break;
			case 121: return "R21"; break;
			case 122: return "R22"; break;		
			case 123: return "R23"; break;
			case 124: return "R24"; break;			
			case 125: return "R25"; break;			
			case 126: return "R26"; break;
			case 127: return "R27"; break;			
		}}
		else if ($what=="salon")
		{
			switch ($num){
			case 11: return "кожа"; break;
			case 12: return "ткань"; break;		
			case 13: return "велюр"; break;		
			case 14: return "комбинированный"; break;		
		}}
		else if ($what=="electro_glass_up")
		{
			switch ($num){
			case 11: return "все"; break;
			case 12: return "передние"; break;		
		}}		
		else if ($what=="abs")
		{
			return "анитиблокировочная система (ABS)";				
		}		
		else if ($what=="gbo")
		{
			return "газобалонное оборудование (ГБО)";				
		}		
		else if ($what=="computer")
		{
			return "бортовой компьютер";				
		}		
		else if ($what=="conditioner")
		{
			return "кондиционер";				
		}		
		else if ($what=="warm_chair")
		{
			return "подогрев сидений";				
		}		
		else if ($what=="guard")
		{
			return "сигнализация";				
		}
		else if ($what=="parktronik")
		{
			return "парктроник";				
		}
		else if ($what=="security_pillows")
		{
			return "подушки безопасности";				
		}
		else if ($what=="toned")
		{
			return "тонировка стекол";				
		}
		else if ($what=="amplifier_rudder")
		{
			return "усилитель руля";				
		}
		else if ($what=="electro_gas")
		{
			return "электронная педаль газа";				
		}
	}

	static public function show_razdel($num){
		switch ($num){
		case 1: return "Автомобили"; break;
		case 2: return "Запчасти"; break;}}


	
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


	static public function set_sort(){//что выбираем на главной странице при переходе на неё
	if (isset($_COOKIE['automarket_sort_by'])){
		if ($_COOKIE['automarket_sort_by']==2) {self::$sort_by=2;}
		else if ($_COOKIE['automarket_sort_by']==3) {self::$sort_by=3;}		
		else if ($_COOKIE['automarket_sort_by']==4) {self::$sort_by=4;}}	
	if (self::$sort_by==1){
		self::$find_query=" AND themepage='1' AND mark='157'";}
	else if (self::$sort_by==2){
		self::$find_query=" AND themepage='1' AND mark!='157'";}		
	else if (self::$sort_by==3){
		self::$find_query=" AND themepage='2'";}		
	else if (self::$sort_by==4){
		self::$find_query=" AND themepage='3'";}		
		self::$condition_main="WHERE 1 ".self::$find_query;}
		
		
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
		
        
        
        
    static protected function current_order_by($var){
	   
        if (isset($_COOKIE['automarket_order_by_'.$var])){
            if ($_COOKIE['automarket_order_by_'.$var]=="DESC"){
                GeneralCookies::setglobal("automarket_order_by_".$var,"ASC");
            }
            else{
                GeneralCookies::setglobal("automarket_order_by_".$var,"DESC");
            }
       }
       else{
            GeneralCookies::setglobal("automarket_order_by_".$var,"DESC");
       }
       
       
       if ($_POST['order']>0){//перезаписываем, если есть (конкретно указали сортировку))
           if ($_POST['order']==1){
               GeneralCookies::setglobal("automarket_order_by_".$var,"ASC");                
           }
           else if ($_POST['order']==2){
               GeneralCookies::setglobal("automarket_order_by_".$var,"DESC");                
           }         
       }
       
       GeneralCookies::setglobal("automarket_order_by",$var."_".$_COOKIE['automarket_order_by_'.$var]);	
    }     
        
        
    static public function set_cookies_order_by_price(){
	   self::current_order_by('price');
    }      
        
    static public function set_cookies_order_by_year(){
	   self::current_order_by('year');
    }       
        
    static public function set_cookies_order_by_run(){
	   self::current_order_by('run');
    }       
        
    static public function set_cookies_order_by_power(){
	   self::current_order_by('power');
    } 
        
    static public function set_cookies_order_by_date(){
	   self::current_order_by('date');
    }      
        
    static public function detect_order_by($MSQLc){
        if (isset($_COOKIE['automarket_order_by'])){
            
            if ($_COOKIE['automarket_order_by']=="price_ASC"){
                self::$order_main="price_int ASC";
                self::$order_id=2;
            }
            else if ($_COOKIE['automarket_order_by']=="price_DESC"){
                self::$order_main="price_int DESC";
                self::$order_id=3;
            }
            
            else if ($_COOKIE['automarket_order_by']=="year_ASC"){
                self::$order_main="year_production ASC";
                self::$order_id=4;
            }        
            else if ($_COOKIE['automarket_order_by']=="year_DESC"){
                self::$order_main="year_production DESC";
                self::$order_id=5;
            }
            
            else if ($_COOKIE['automarket_order_by']=="run_ASC"){
                self::$order_main="run_int ASC";
                self::$order_id=6;
            }        
            else if ($_COOKIE['automarket_order_by']=="run_DESC"){
                self::$order_main="run_int DESC";
                self::$order_id=7;
            }
            
            else if ($_COOKIE['automarket_order_by']=="power_ASC"){
                self::$order_main="power ASC";
                self::$order_id=8;
            }        
            else if ($_COOKIE['automarket_order_by']=="power_DESC"){
                self::$order_main="power DESC";
                self::$order_id=9;
            }
            
            else if ($_COOKIE['automarket_order_by']=="date_ASC"){
                self::$order_main="id ASC";
                self::$order_id=10;
            }        
            else if ($_COOKIE['automarket_order_by']=="date_DESC"){
                self::$order_main="id DESC";
                self::$order_id=11;
            }
        }
        else {
            self::$order_main="id DESC";
            self::$order_id=1;
        }
        
        
    }
        
        
        
        
        
        
static public function convert_cookie_find_query($MSQLc){//составляем из всех куков, которые есть
	if (isset($_COOKIE['automarket_find_status'])){
		if ($_COOKIE['automarket_find_status']>0){
		self::$find_status=$_COOKIE['automarket_find_status'];
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
			
			
			
			
}
