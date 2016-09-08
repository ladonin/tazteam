<?php
class GeneralSecurity{
static public $submitname="";





static public function is_cron(){    
    if ((isset($_SERVER["REMOTE_ADDR"]))&&($_SERVER["REMOTE_ADDR"])){
        return false;
    }
    return true;
}



static public function clear_js($var){
    //$var=str_replace('<sc','&#60;sc',$var);//удаляем js инъекцию
    //$var=str_replace('</sc','&#60;/sc',$var);//удаляем js  инъекцию   
    //$var=str_replace('pt>','pt&#62;',$var);//удаляем js инъекцию
    return $var;
}




static public function real_escape($MSQLc,$var){  
    $var=self::clear_js($var);
    $var=trim(self::clear_js($var));
    $var=self::return_safe_outside_sql_query($var);
	return GeneralMYSQL::real_escape($MSQLc,$var);
}




	
//static public function post_create($MSQLc,$var){//можно переделать у всех тут
//	if (isset($_POST[$var])){}
//	else {$_POST[$var]="";}}	
	
static public function post_real_escape($MSQLc,$var){//можно переделать у всех тут
	if (isset($_POST[$var])){$_POST[$var]=self::real_escape($MSQLc,$_POST[$var]);}
	else {$_POST[$var]="";}}	
	
static public function post_tonumber($var){//можно переделать у всех тут
	if (isset($_POST[$var])){$_POST[$var]=self::tonumber($_POST[$var]);}
	else {$_POST[$var]="";}}	
	
	
	
static public function tonumber($var){
	return (int)$var;}	
	
static public function emergencyrollback($MSQLc){
	GeneralMYSQL::rollbacktransaction($MSQLc);//откат записей обратно
	GeneralMYSQL::startautocommittransaction($MSQLc);//возвращаем транзакцию на прежнее место, если нужно будет что нибудь дописать об ошибке
	mysqli_close($MSQLc);echo("!!!");
	//GeneralHeaderHTTP::location(GeneralGetVars::$urlfromsubmit); // перенаправление на прежнюю страницу
	exit();}// прерываем работу скрипта

static public function uploadimagecontrolprimary($format,$type,$size,$error){
	if (!$error){
		if ($size>1024){
			if ($type=="image"){
				if (($format=="gif")||($format=="png")||($format=="jpeg")||($format=="jpg")){
					return true;}}}}
	return false;}



static public function return_safe_outside_sql_query($var){
	$var=preg_replace('/union|select/i','',$var);
    
    
    
    
    
	return $var;}




static public function detect_autority($id_autor){//проверяем реальность автора
	if ((UsersMyData::$id==$id_autor)||(self::detect_administrator()===true)) {
		return true;}	
	return false;}

static public function detect_administrator(){//проверяем - может пользователь администратор
	if (UsersMyData::$id==1) {/////////////||(UsersMyData::$id==4175)
		return true;}
	else if ((GeneralGetVars::$var1=="news")||(GeneralGetVars::$var1=="articles")||(GeneralGetVars::$var1=="photo")||(GeneralGetVars::$var1=="forum")||(GeneralGetVars::$var1=="automarket")){
		///////////if (UsersMyData::$id==155){return true;}
		//if (UsersMyData::$id==7059){return true;}
        }
		
		
		
	
		
		
		
		
		
	return false;}


	
static public function uploadimagecontroldeeply($MSQLc,$url,$format,$type,$i){//функция проверки
	$imageinfo = getimagesize($url);
	if ($imageinfo!=false){//если удалось получить информацию об изображении
		$mime=$type."/".$format;//прошлые проверенные даные
		if ($imageinfo["mime"]==$mime){//если типы текущие совпадают с прошлыми проверенными
			if (($imageinfo[0]>=GeneralGlobalVars::$minwidthuploadimage)&&($imageinfo[1]>=GeneralGlobalVars::$minheightuploadimage)){//если размеры не меньше минимальных
				//если пропорции соответствуют нормам
				if ((($imageinfo[0]/$imageinfo[1])<GeneralGlobalVars::$critical_proportions_uploadimage)&&(($imageinfo[1]/$imageinfo[0])<GeneralGlobalVars::$critical_proportions_uploadimage)){
					//дописываем его размеры
					GeneralImagesWork::$imagessource['width'][$i]=$imageinfo[0];
					GeneralImagesWork::$imagessource['height'][$i]=$imageinfo[1];
					return true;}}}}
	//если доберемся до этого кода, то 
	GeneralFiles::delete($url);//удаляем файл
	return false;}

	
static public function return_text($text){//определяем комментарий, и если он пустой, то "без названия"
	if (preg_match("/[a-zа-я0-9]+/six",$text)) {return $text;}
	else {return "";}}		
	
	
static public function revisioninputtext($var){//проверяем что текст введен
	if (preg_match("/[a-zа-я0-9]+/six",$_POST[$var])){//если нашли словестный символ
		return true;}
	return false;}	
	
	
	
	

static public function cookiescontrol($MSQLc){
	if (!empty($_COOKIE['UsersMyDataId']))			{GeneralCookies::setglobal("UsersMyDataId",self::real_escape($MSQLc,$_COOKIE['UsersMyDataId']));}
	if (!empty($_COOKIE['UsersMyDataPassword']))	{GeneralCookies::setglobal("UsersMyDataPassword",self::real_escape($MSQLc,$_COOKIE['UsersMyDataPassword']));}
	if (!empty($_COOKIE['UsersMyDataName']))		{GeneralCookies::setglobal("UsersMyDataName",self::real_escape($MSQLc,$_COOKIE['UsersMyDataName']));}
	if (!empty($_COOKIE['UsersMyDataName2']))		{GeneralCookies::setglobal("UsersMyDataName2",self::real_escape($MSQLc,$_COOKIE['UsersMyDataName2']));}
	if (!empty($_COOKIE['UsersMyDataSurname2']))	{GeneralCookies::setglobal("UsersMyDataSurname2",self::real_escape($MSQLc,$_COOKIE['UsersMyDataSurname2']));}}

static public function submitcontrol($MSQLc){
	if (!empty($_POST['submit'])){
		self::$submitname=self::real_escape($MSQLc,$_POST['submit']);		
		if (self::$submitname=="find"){
			$_POST['IndexTopPanelFindtext']=self::real_escape($MSQLc,$_POST['IndexTopPanelFindtext']);}			
		else if (self::$submitname=="registration"){		
			self::post_real_escape($MSQLc,'UsersMyDataRegistration_mail');		
			self::post_real_escape($MSQLc,'UsersMyDataRegistration_password');			
			self::post_real_escape($MSQLc,'UsersMyDataRegistration_antibot');			
			self::post_real_escape($MSQLc,'oves');
			self::post_real_escape($MSQLc,'UsersMyDataRegistration');}			
		else if (self::$submitname=="user_enter"){
			self::post_real_escape($MSQLc,'UsersMyDataEnter_login');
			self::post_real_escape($MSQLc,'UsersMyDataEnter_password');
			self::post_real_escape($MSQLc,'UsersMyDataEnter');}			
		else if (self::$submitname=="quit"){
			self::post_real_escape($MSQLc,'UsersMyDataQuit');}			
		else if (self::$submitname=="sendforummess"){	
			self::post_real_escape($MSQLc,'ForumCitateId');
			self::post_real_escape($MSQLc,'inputtexttextarea');
			self::post_real_escape($MSQLc,'inputtexthtml');
			self::post_real_escape($MSQLc,'inputtextnacked');}
		else if (self::$submitname=="redactforummess"){
			self::post_real_escape($MSQLc,'ForumCitateId');
			self::post_real_escape($MSQLc,'inputtexttextarea');
			self::post_real_escape($MSQLc,'inputtexthtml');
			self::post_real_escape($MSQLc,'inputtextnacked');
			self::post_real_escape($MSQLc,'idmessagetoredact');
			for($i=1;$i<=ForumForreg::maxrattachedimages;$i++){
				if (isset($_POST['imgdelete'.$i])){$_POST['imgdelete'.$i]=self::tonumber($_POST['imgdelete'.$i]);}
				if (isset($_POST['imgredact'.$i])){$_POST['imgredact'.$i]=self::tonumber($_POST['imgredact'.$i]);}
				if (isset($_POST['imgname'.$i])){$_POST['imgname'.$i]=self::real_escape($MSQLc,$_POST['imgname'.$i]);}}}
		else if (self::$submitname=="deleteforummess"){
			$_POST['id_message']=self::real_escape($MSQLc,$_POST['id_message']);}
		else if (self::$submitname=="sendforumtopic"){
			$_POST['forum_section_id']=self::tonumber($_POST['forum_section_id']);
			$_POST['ForumCitateId']=self::tonumber($_POST['ForumCitateId']);
			$_POST['inputtexttextarea']=self::real_escape($MSQLc,$_POST['inputtexttextarea']);	
			$_POST['inputtexthtml']=self::real_escape($MSQLc,$_POST['inputtexthtml']);
			$_POST['inputtextnacked']=self::real_escape($MSQLc,$_POST['inputtextnacked']);
			$_POST['inputnametopictextarea']=self::real_escape($MSQLc,$_POST['inputnametopictextarea']);}			
		else if (self::$submitname=="deleteforumtopic"){
			$_POST['id_topic']=self::real_escape($MSQLc,$_POST['id_topic']);}
		else if (self::$submitname=="sendphototopic"){
			$_POST['inputnametopictextarea']=self::real_escape($MSQLc,$_POST['inputnametopictextarea']);
			$_POST['inputtexttextarea_1']=self::real_escape($MSQLc,$_POST['inputtexttextarea_1']);}
		else if (self::$submitname=="redactphotoinphoto"){
			$_POST['inputtexttextarea_1']=self::real_escape($MSQLc,$_POST['inputtexttextarea_1']);
			$_POST['id_photo']=self::real_escape($MSQLc,$_POST['id_photo']);}			
		else if (self::$submitname=="deletephotophoto"){			
			$_POST['id_photo']=self::real_escape($MSQLc,$_POST['id_photo']);
			$_POST['nameimg']=self::real_escape($MSQLc,$_POST['nameimg']);}
		else if (self::$submitname=="sendnewphotoinphoto"){			
			$_POST['inputtexttextarea_1']=self::real_escape($MSQLc,$_POST['inputtexttextarea_1']);}
		else if (self::$submitname=="deletephototopic"){}			
		else if (self::$submitname=="detectthemepagefornewautomarket"){			
			$_POST['themepage']=self::tonumber($_POST['themepage']);}			
		else if (self::$submitname=="sendnewautomarketannouncement"){
			self::post_tonumber('mark');
			self::post_tonumber('year_production');
			self::post_tonumber('motor_type');
			self::post_tonumber('power');
			self::post_tonumber('state');
			self::post_tonumber('customs');
			self::post_tonumber('changing');
			self::post_tonumber('basket_type');
			self::post_tonumber('drive_type');
			self::post_tonumber('KPP');
			self::post_tonumber('presense');
			self::post_tonumber('seller');
			self::post_tonumber('abs');
			self::post_tonumber('gbo');
			self::post_tonumber('computer');
			self::post_tonumber('conditioner');
			self::post_tonumber('disks');
			self::post_tonumber('disk_size');
			self::post_tonumber('warm_chair');
			self::post_tonumber('guard');
			self::post_tonumber('parktronik');
			self::post_tonumber('security_pillows');
			self::post_tonumber('salon');
			self::post_tonumber('toned');
			self::post_tonumber('amplifier_rudder');
			self::post_tonumber('electro_gas');
			self::post_tonumber('electro_glass_up');
			self::post_tonumber('price_int');
			self::post_tonumber('run_int');			
			self::post_real_escape($MSQLc,'name');
			self::post_real_escape($MSQLc,'content');
			self::post_real_escape($MSQLc,'contentnacked');	
			self::post_real_escape($MSQLc,'model');
			self::post_real_escape($MSQLc,'price');
			self::post_real_escape($MSQLc,'run');
			self::post_real_escape($MSQLc,'motor_vol');
			self::post_real_escape($MSQLc,'color');
			self::post_real_escape($MSQLc,'country_producer');
			self::post_real_escape($MSQLc,'city');
			self::post_real_escape($MSQLc,'region');
			self::post_real_escape($MSQLc,'phone');}
		else if (self::$submitname=="redactautomarketannouncement"){
			self::post_tonumber('mark');
			self::post_tonumber('year_production');
			self::post_tonumber('motor_type');
			self::post_tonumber('power');
			self::post_tonumber('state');
			self::post_tonumber('customs');
			self::post_tonumber('changing');
			self::post_tonumber('basket_type');
			self::post_tonumber('drive_type');
			self::post_tonumber('KPP');
			self::post_tonumber('presense');
			self::post_tonumber('seller');
			self::post_tonumber('abs');
			self::post_tonumber('gbo');
			self::post_tonumber('computer');
			self::post_tonumber('conditioner');
			self::post_tonumber('disks');
			self::post_tonumber('disk_size');
			self::post_tonumber('warm_chair');
			self::post_tonumber('guard');
			self::post_tonumber('parktronik');
			self::post_tonumber('security_pillows');
			self::post_tonumber('salon');
			self::post_tonumber('toned');
			self::post_tonumber('amplifier_rudder');
			self::post_tonumber('electro_gas');
			self::post_tonumber('electro_glass_up');
			self::post_tonumber('price_int');
			self::post_tonumber('run_int');			
			self::post_real_escape($MSQLc,'name');
			
			
			self::post_real_escape($MSQLc,'contentnacked');			
			self::post_real_escape($MSQLc,'content');
			self::post_real_escape($MSQLc,'model');
			self::post_real_escape($MSQLc,'price');
			self::post_real_escape($MSQLc,'run');
			self::post_real_escape($MSQLc,'motor_vol');
			self::post_real_escape($MSQLc,'color');
			self::post_real_escape($MSQLc,'country_producer');
			self::post_real_escape($MSQLc,'city');
			self::post_real_escape($MSQLc,'region');
			self::post_real_escape($MSQLc,'phone');}
		else if (self::$submitname=="deleteautomarketannouncement"){			
			$_POST['id']=self::real_escape($MSQLc,$_POST['id']);}
		else if (self::$submitname=="find_automarket_auto"){
			self::post_tonumber('mark');			
			self::post_tonumber('year_production');
			self::post_tonumber('motor_type');
			self::post_tonumber('state');
			self::post_tonumber('basket_type');
			self::post_tonumber('drive_type');
			self::post_tonumber('KPP');
			self::post_tonumber('price_int');
			self::post_tonumber('run_int');			
			self::post_real_escape($MSQLc,'model');
			self::post_real_escape($MSQLc,'city');
			self::post_real_escape($MSQLc,'region');}			
		else if (self::$submitname=="find_automarket_else"){
			self::post_real_escape($MSQLc,'name');}			
		else if (self::$submitname=="find_automarket_else_buy"){
			self::post_real_escape($MSQLc,'name');}			
		else if (self::$submitname=="clearfindautomarket"){}			
		else if (self::$submitname=="find_news"){
			self::post_real_escape($MSQLc,'name');}
            
		else if (self::$submitname=="find_forum"){
			self::post_real_escape($MSQLc,'name');}          
		else if (self::$submitname=="clearfindforum"){}	  
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
		else if (self::$submitname=="sendnewgarageannouncement"){
			self::post_tonumber('mark');
			self::post_tonumber('year_production');
			self::post_tonumber('motor_type');
			self::post_tonumber('power');

	

			self::post_tonumber('basket_type');
			self::post_tonumber('drive_type');
			self::post_tonumber('KPP');

			self::post_tonumber('abs');
			self::post_tonumber('gbo');
			self::post_tonumber('computer');
			self::post_tonumber('conditioner');
			self::post_tonumber('disks');
			self::post_tonumber('disk_size');
			self::post_tonumber('warm_chair');
			self::post_tonumber('guard');
			self::post_tonumber('parktronik');
			self::post_tonumber('security_pillows');
			self::post_tonumber('salon');
			self::post_tonumber('toned');
			self::post_tonumber('amplifier_rudder');
			self::post_tonumber('electro_gas');
			self::post_tonumber('electro_glass_up');
			self::post_tonumber('run_int');
			self::post_real_escape($MSQLc,'content');
			self::post_real_escape($MSQLc,'contentnacked');	
			self::post_real_escape($MSQLc,'model');
			self::post_real_escape($MSQLc,'run');
			self::post_real_escape($MSQLc,'motor_vol');
			self::post_real_escape($MSQLc,'color');
			self::post_real_escape($MSQLc,'country_producer');}

		else if (self::$submitname=="redactgarageannouncement"){
			self::post_tonumber('mark');
			self::post_tonumber('year_production');
			self::post_tonumber('motor_type');
			self::post_tonumber('power');
			self::post_tonumber('basket_type');
			self::post_tonumber('drive_type');
			self::post_tonumber('KPP');
			self::post_tonumber('abs');
			self::post_tonumber('gbo');
			self::post_tonumber('computer');
			self::post_tonumber('conditioner');
			self::post_tonumber('disks');
			self::post_tonumber('disk_size');
			self::post_tonumber('warm_chair');
			self::post_tonumber('guard');
			self::post_tonumber('parktronik');
			self::post_tonumber('security_pillows');
			self::post_tonumber('salon');
			self::post_tonumber('toned');
			self::post_tonumber('amplifier_rudder');
			self::post_tonumber('electro_gas');
			self::post_tonumber('electro_glass_up');
			self::post_tonumber('run_int');			
			self::post_real_escape($MSQLc,'contentnacked');			
			self::post_real_escape($MSQLc,'content');
			self::post_real_escape($MSQLc,'model');
			self::post_real_escape($MSQLc,'run');
			self::post_real_escape($MSQLc,'motor_vol');
			self::post_real_escape($MSQLc,'color');
			self::post_real_escape($MSQLc,'country_producer');}
		else if (self::$submitname=="deletegarageannouncement"){			
			$_POST['id']=self::real_escape($MSQLc,$_POST['id']);}
		else if (self::$submitname=="find_garage_auto"){
			self::post_tonumber('mark');			
			self::post_tonumber('year_production');
			self::post_tonumber('motor_type');
			self::post_tonumber('basket_type');
			self::post_tonumber('drive_type');
			self::post_tonumber('KPP');
			self::post_real_escape($MSQLc,'model');}			
	
		else if (self::$submitname=="clearfindgarage"){}			
           
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
		//else if (self::$submitname=="detectthemepagefornewnews"){			
			//$_POST['themepage']=self::tonumber($_POST['themepage']);}			
		else if (self::$submitname=="sendnewnews"){			
			self::post_real_escape($MSQLc,'name');
			self::post_real_escape($MSQLc,'keywords');            
			self::post_real_escape($MSQLc,'secretword');            
			self::post_real_escape($MSQLc,'themepage');			
			self::post_real_escape($MSQLc,'inputtexttextarea');			
			self::post_real_escape($MSQLc,'inputtexthtml');			
			self::post_real_escape($MSQLc,'inputtextnacked');}	
		else if (self::$submitname=="redactnews"){	
			self::post_real_escape($MSQLc,'name');
			self::post_real_escape($MSQLc,'keywords');            
			self::post_real_escape($MSQLc,'inputtexttextarea');			
			self::post_real_escape($MSQLc,'inputtexthtml');			
			self::post_real_escape($MSQLc,'inputtextnacked');}
		else if (self::$submitname=="deletenews"){			
			$_POST['id']=self::real_escape($MSQLc,$_POST['id']);}
		else if (self::$submitname=="automarket_sort_by_taz"){}
		else if (self::$submitname=="automarket_sort_by_auto"){}
		else if (self::$submitname=="automarket_sort_by_else"){}
		else if (self::$submitname=="automarket_sort_by_buy"){}			
			
			
			
			
			
			
		else if (self::$submitname=="find_users"){
			self::post_tonumber('online');			
			self::post_tonumber('widthphoto');   
			self::post_tonumber('sex');
			self::post_tonumber('relations');
			self::post_tonumber('bdate_year');			
			self::post_real_escape($MSQLc,'login');         
			self::post_real_escape($MSQLc,'name');
			self::post_real_escape($MSQLc,'surname');			
			self::post_real_escape($MSQLc,'mail');			
			//self::post_real_escape($MSQLc,'phone');			
			self::post_real_escape($MSQLc,'city');			
			self::post_real_escape($MSQLc,'university');			
			self::post_real_escape($MSQLc,'school_region');				
			self::post_real_escape($MSQLc,'school_city');				
			self::post_real_escape($MSQLc,'school_name');}						
		else if (self::$submitname=="clearfindusers"){}			
			
			
			
			
		else if (self::$submitname=="find_users_friends"){
			self::post_tonumber('online');			
			self::post_tonumber('widthphoto');   
			self::post_tonumber('sex');
			self::post_tonumber('relations');
			self::post_tonumber('bdate_year');			
			self::post_real_escape($MSQLc,'login');         
			self::post_real_escape($MSQLc,'name');
			self::post_real_escape($MSQLc,'surname');			
			self::post_real_escape($MSQLc,'mail');			
			//self::post_real_escape($MSQLc,'phone');			
			self::post_real_escape($MSQLc,'city');			
			self::post_real_escape($MSQLc,'university');			
			self::post_real_escape($MSQLc,'school_region');				
			self::post_real_escape($MSQLc,'school_city');				
			self::post_real_escape($MSQLc,'school_name');}						
		else if (self::$submitname=="clearfindusers_friends"){}			
			
			
			
			
			
			
			
			
		else if (self::$submitname=="sendnewphotoinusersphotoalbum"){			
			$_POST['inputtexttextarea_1']=self::real_escape($MSQLc,$_POST['inputtexttextarea_1']);}			
			
		else if (self::$submitname=="redactphotoinusersphotoalbum"){
			$_POST['inputtexttextarea_1']=self::real_escape($MSQLc,$_POST['inputtexttextarea_1']);
			$_POST['id_photo']=self::real_escape($MSQLc,$_POST['id_photo']);}			
			
			
		else if (self::$submitname=="deletephotousersphotoalbum"){			
			$_POST['id_photo']=self::real_escape($MSQLc,$_POST['id_photo']);
			$_POST['nameimg']=self::real_escape($MSQLc,$_POST['nameimg']);}			
			
		else if (self::$submitname=="deleteusersphotoalbum"){}					
			
		else if (self::$submitname=="sendusersphotoalbum"){
			$_POST['inputnametopictextarea']=self::real_escape($MSQLc,$_POST['inputnametopictextarea']);
			$_POST['inputtexttextarea_1']=self::real_escape($MSQLc,$_POST['inputtexttextarea_1']);}			
			
		else if (self::$submitname=="users_photoalbums_sort_by_my"){}
		else if (self::$submitname=="users_photoalbums_sort_by_friends"){}
		else if (self::$submitname=="users_photoalbums_sort_by_another"){}			
		else if (self::$submitname=="updatefromsnnothanks"){}	










		else if (self::$submitname=="sendusersselfdata"){
			self::post_real_escape($MSQLc,'name');
			self::post_real_escape($MSQLc,'surname');
			self::post_tonumber('sex');
			self::post_tonumber('relations');
			self::post_real_escape($MSQLc,'login');
			self::post_tonumber('loginstatus');
			self::post_tonumber('mailstatus');		
			self::post_real_escape($MSQLc,'mail');//нужен для задания нового имени, если нет других данных		
			self::post_real_escape($MSQLc,'url_vk');
			self::post_real_escape($MSQLc,'mobile_phone');
			self::post_real_escape($MSQLc,'add_phone');
			self::post_real_escape($MSQLc,'city_name');
			self::post_real_escape($MSQLc,'state_name');		
			self::post_real_escape($MSQLc,'region_name');
			self::post_real_escape($MSQLc,'country_name');
			self::post_real_escape($MSQLc,'activity');
			self::post_real_escape($MSQLc,'interests');
			self::post_real_escape($MSQLc,'books');
			self::post_real_escape($MSQLc,'games');		
			self::post_real_escape($MSQLc,'movies');
			self::post_real_escape($MSQLc,'tv');
			self::post_real_escape($MSQLc,'about');
			self::post_real_escape($MSQLc,'adddata');		
			self::post_tonumber('number_schools');
			for ($i=1; $i<=$_POST['number_schools']; $i++){
				self::post_real_escape($MSQLc,'schools_nametypeschool_'.$i);		
				self::post_real_escape($MSQLc,'schools_name_'.$i);		
				self::post_real_escape($MSQLc,'schools_city_'.$i);
				self::post_real_escape($MSQLc,'schools_region_'.$i);
				self::post_real_escape($MSQLc,'schools_year_from_'.$i);			
				self::post_real_escape($MSQLc,'schools_year_to_'.$i);
				self::post_real_escape($MSQLc,'schools_class_'.$i);
				self::post_real_escape($MSQLc,'schools_speciality_'.$i);
				self::post_real_escape($MSQLc,'delete_schools_'.$i);
			}		
			self::post_tonumber('number_universities');
			for ($i=1; $i<=$_POST['number_universities']; $i++){
				self::post_real_escape($MSQLc,'universities_name_'.$i);		
				self::post_real_escape($MSQLc,'universities_faculty_name_'.$i);		
				self::post_real_escape($MSQLc,'universities_chair_name_'.$i);
				self::post_real_escape($MSQLc,'universities_graduation_'.$i);
				self::post_real_escape($MSQLc,'universities_education_form_'.$i);
				self::post_real_escape($MSQLc,'universities_education_status_'.$i);
				self::post_real_escape($MSQLc,'delete_university_'.$i);
			}
			self::post_tonumber('born_day');
			self::post_tonumber('born_month');
			self::post_tonumber('born_year');
			self::post_tonumber('date_delete');		
		}

		else if (self::$submitname=="sendusersavatar"){}	
		else if (self::$submitname=="cropusersavatar"){
			self::post_real_escape($MSQLc,'format');
			self::post_tonumber('x1');	
			self::post_tonumber('y1');			
			self::post_tonumber('x2');
			self::post_tonumber('y2');			
			self::post_tonumber('w');
			self::post_tonumber('h');}
		else if (self::$submitname=="users_friends_sort_by_friends"){}
		else if (self::$submitname=="users_friends_sort_by_friendsonline"){}
		else if (self::$submitname=="users_friends_sort_by_friendsin"){}
		else if (self::$submitname=="users_friends_sort_by_friendsout"){}


		else if (self::$submitname=="userstofriends"){
			self::post_tonumber('who');}
		else if (self::$submitname=="usersdelfromfriends"){
			self::post_tonumber('who');}
		else if (self::$submitname=="usersdelhetofriends"){
			self::post_tonumber('who');}
		else if (self::$submitname=="usersdeltohimfriends"){
			self::post_tonumber('who');}
		else if (self::$submitname=="usersaddhetofriends"){
			self::post_tonumber('who');}
	
		else if (self::$submitname=="users_dialogs_sort_by_nodeleted"){}			
		else if (self::$submitname=="users_dialogs_sort_by_deleted"){}			
			

		else if (self::$submitname=="usersdeletedialog"){
			self::post_tonumber('id_correspondence');		
			self::post_tonumber('who');}
		else if (self::$submitname=="usersrestoredialog"){
			self::post_tonumber('id_correspondence');		
			self::post_tonumber('who');}			
			
		else if (self::$submitname=="sendusersnewpassword"){
			self::post_real_escape($MSQLc,'redacting_password');}			
		else if (self::$submitname=="user_unreg_repassword_mail"){
			self::post_real_escape($MSQLc,'unreg_repassword_mail');
			self::post_real_escape($MSQLc,'unreg_repassword_mail_antibot');
			self::post_real_escape($MSQLc,'unreg_repassword_mail_oves');}			
			
			
			
			
			
			
			
			
			
			
		else if (self::$submitname=="find_users_vote"){
			self::post_tonumber('online');			
			self::post_tonumber('widthphoto');   
			self::post_tonumber('sex');
			self::post_tonumber('relations');
			self::post_tonumber('bdate_year');			
			self::post_real_escape($MSQLc,'login');         
			self::post_real_escape($MSQLc,'name');
			self::post_real_escape($MSQLc,'surname');			
			self::post_real_escape($MSQLc,'mail');			
			//self::post_real_escape($MSQLc,'phone');			
			self::post_real_escape($MSQLc,'city');			
			self::post_real_escape($MSQLc,'university');			
			self::post_real_escape($MSQLc,'school_region');				
			self::post_real_escape($MSQLc,'school_city');				
			self::post_real_escape($MSQLc,'school_name');}
			
			
		else if (self::$submitname=="users_signatures_clear"){}
		else if (self::$submitname=="users_mytalks_clear"){}		
		else if (self::$submitname=="users_wall_clear"){}			
		
			
			
			
		else if (self::$submitname=="video_sort_by_extrime"){}
		else if (self::$submitname=="video_sort_by_tuning"){}
		else if (self::$submitname=="video_sort_by_else"){}
				
                
                
                
		else if (self::$submitname=="automarket_order_by_price"){
		  self::post_tonumber('order');
		}               
		else if (self::$submitname=="automarket_order_by_year"){
		  self::post_tonumber('order');
		}               
		else if (self::$submitname=="automarket_order_by_run"){
		  self::post_tonumber('order');
		}              
		else if (self::$submitname=="automarket_order_by_power"){
		  self::post_tonumber('order');
		}                
		else if (self::$submitname=="automarket_order_by_date"){
		  self::post_tonumber('order');
		}               
			
			
			
			}}}
//GeneralSecurity::cookiescontrol($MSQLc);
//GeneralSecurity::submitcontrol($MSQLc);
?>