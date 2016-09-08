<?php   
class UsersForreg{

const maxrattachedimages=1;//максимальное количество приложенных изображений

const maxrattachedimages_ava=1;//максимальное количество приложенных изображений

static public $array_my_talks=array();//массив моих обсуждений, перезаписывается для каждого сервиса

static public $array_my_friends=array();//массив моих друзей
static public $array_my_friends_heto=array();//массив заявок от меня
	
	
	
static public $array_my_signatures=array();//массив моих оповещений
	
	
	
	
	
	
	
	
static public function updatefromsnnothanks($MSQLc){	
	$query="
	UPDATE	registrated_users___main_data
	SET		site_update_from_sn_nothanks='1'
	WHERE 	id_user='".UsersMyData::$id."'
	";
	GeneralMYSQL::query_update($MSQLc,$query);}




static public function sendselfdata($MSQLc){	
	//проверяем на то,  что это наша страница или мы - администратор, нужно для того, чтобы менять страницы других пользователей по GeneralGetVars::$var2, другими словами проверяем, что GeneralGetVars::$var2 - id того самого редактируемого пользователя
	if (UsersBase::detect_its_mypage(1)==true){
	
	
	
	
	
	
	
	
	
	//проверка логина не требуется

	//обрабатываем адрес вконтакте
	$_POST['url_vk']=str_replace("http:://vk.com/","",$_POST['url_vk']);
	$_POST['url_vk']=str_replace("vk.com/","",$_POST['url_vk']);
	$_POST['url_vk']=str_replace("/","",$_POST['url_vk']);


	if ($_POST['date_delete']==1){
		$_POST['born_day']="";
		$_POST['born_month']="";
		$_POST['born_year']="";}

		
		$schools_nametypeschool="";
		$schools_name="";
		$schools_city="";
		$schools_region="";
		$schools_year_from="";
		$schools_year_to="";
		$schools_class="";
		$schools_speciality="";
	for ($i=1; $i<=$_POST['number_schools']; $i++){
		if ($_POST['delete_schools_'.$i]!=1){	
			$schools_nametypeschool.="  ".$_POST['schools_nametypeschool_'.$i];
			$schools_name.="  ".$_POST['schools_name_'.$i];
			$schools_city.="  ".$_POST['schools_city_'.$i];
			$schools_region.="  ".$_POST['schools_region_'.$i];
			$schools_year_from.="  ".$_POST['schools_year_from_'.$i];
			$schools_year_to.="  ".$_POST['schools_year_to_'.$i];
			$schools_class.="  ".$_POST['schools_class_'.$i];
			$schools_speciality.="  ".$_POST['schools_speciality_'.$i];}}
		$schools_nametypeschool=preg_replace("/^  /","",$schools_nametypeschool);//убираем вначале строки двойной пробел
		$schools_name=preg_replace("/^  /","",$schools_name);
		$schools_city=preg_replace("/^  /","",$schools_city);
		$schools_region=preg_replace("/^  /","",$schools_region);
		$schools_year_from=preg_replace("/^  /","",$schools_year_from);
		$schools_year_to=preg_replace("/^  /","",$schools_year_to);		
		$schools_class=preg_replace("/^  /","",$schools_class);
		$schools_speciality=preg_replace("/^  /","",$schools_speciality);



		
		


//echo("<textarea>".$schools_nametypeschool."</textarea>");
//echo("<textarea>".$schools_name."</textarea>");		
//echo("<textarea>".$schools_city."</textarea>");		
//echo("<textarea>".$schools_region."</textarea>");		
//echo("<textarea>".$schools_year_from."</textarea>");
//echo("<textarea>".$schools_year_to."</textarea>");
		
//echo("<textarea>".$schools_class."</textarea>");		
//echo("<textarea>".$schools_speciality."</textarea>");		
		
		
		
		
		
		
		
		
		
		
	
			
		
		$universities_name="";
		$universities_faculty_name="";
		$universities_chair_name="";
		$universities_graduation="";
		$universities_education_form="";
		$universities_education_status="";
		
		
		//echo($_POST['number_universities']);
		
		
		
	for ($i=1; $i<=$_POST['number_universities']; $i++){
		if ($_POST['delete_university_'.$i]!=1){	
			$universities_name.="  ".$_POST['universities_name_'.$i];
			$universities_faculty_name.="  ".$_POST['universities_faculty_name_'.$i];
			$universities_chair_name.="  ".$_POST['universities_chair_name_'.$i];
			$universities_graduation.="  ".$_POST['universities_graduation_'.$i];
			$universities_education_form.="  ".$_POST['universities_education_form_'.$i];
			$universities_education_status.="  ".$_POST['universities_education_status_'.$i];}}
		$universities_name=preg_replace("/^  /","",$universities_name);
		$universities_faculty_name=preg_replace("/^  /","",$universities_faculty_name);
		$universities_chair_name=preg_replace("/^  /","",$universities_chair_name);
		$universities_graduation=preg_replace("/^  /","",$universities_graduation);
		$universities_education_form=preg_replace("/^  /","",$universities_education_form);
		$universities_education_status=preg_replace("/^  /","",$universities_education_status);

//echo("<br><br>");

	$query="
	UPDATE	registrated_users___main_data
	SET
	sn_url_vk='".$_POST['url_vk']."',	
	gen_country_name='".$_POST['country_name']."',	
	gen_region_name='".$_POST['region_name']."',	
	gen_state_name='".$_POST['state_name']."',	
	gen_city_name='".$_POST['city_name']."',	
	gen_login_user='".$_POST['login']."',	
	gen_name_user='".$_POST['name']."',		
	gen_surname_user='".$_POST['surname']."',	
	gen_sex='".$_POST['sex']."',	
	gen_relations='".$_POST['relations']."',	
	site_mail_status='".$_POST['mailstatus']."',	
	site_login_status='".$_POST['loginstatus']."',
	gen_borndate_year='".$_POST['born_year']."',	
	gen_borndate_month='".$_POST['born_month']."',	
	gen_borndate_day='".$_POST['born_day']."',
	gen_schools_name='".$schools_name."',
	gen_schools_year_from='".$schools_year_from."',
	gen_schools_year_to='".$schools_year_to."',
	gen_schools_class='".$schools_class."',
	gen_schools_speciality='".$schools_speciality."',
 	site_oblastschool='".$schools_region."',
	site_cityschool='".$schools_city."',	
	site_nametypeschool='".$schools_nametypeschool."',
	gen_universities_name='".$universities_name."',		
	gen_universities_faculty_name='".$universities_faculty_name."',		
	gen_universities_chair_name='".$universities_chair_name."',	
	gen_universities_graduation='".$universities_graduation."',	
	gen_universities_education_form='".$universities_education_form."',	
	gen_universities_education_status='".$universities_education_status."'
	WHERE id_user='".GeneralGetVars::$var2."'
	";		//echo($query."<br><br>");
	GeneralMYSQL::query_update($MSQLc,$query);

	$query="
	UPDATE registrated_users___added_data
	SET
	mobile_phone='".$_POST['mobile_phone']."',
	add_phone='".$_POST['add_phone']."',
	interests='".$_POST['interests']."',
	books='".$_POST['books']."',
	games='".$_POST['games']."',
	about='".$_POST['about']."',
	movies='".$_POST['movies']."',
	tv='".$_POST['tv']."',
	activity='".$_POST['activity']."',
	adddata='".$_POST['adddata']."'	
	WHERE id_user='".GeneralGetVars::$var2."'
	";				//echo($query."<br><br>");
	GeneralMYSQL::query_update($MSQLc,$query);
	
	
	
	

	if (UsersMyData::$id==GeneralGetVars::$var2){//просто мы можем редактировать чужую страницу и нам может присвоиться чужое имя
		UsersMyData::setcookies_name($_POST['name'],$_POST['surname'],$_POST['login'],$_POST['mail'],$_POST['loginstatus']);}

}
}






static public function setnameforoneimage_avatar($i,$id){//задаем имя подгруженной картинке ($i - какой номер из всех картинок массива темы редактируется сейчас), если есть id - значит номер в файловой системе будет id (массив у всех по умолчанию)
	if (isset(GeneralImagesWork::$imagessource['source'][$i])){//если картинка с таким индексом есть
		foreach (GeneralImagesCalculate::$imagessizes_users_ava as $key=>$value){//для каждого элемента массива экземпляров
			GeneralImagesWork::$imagesdestination['name'][$i][$key]=$id."_".$key.".".GeneralImagesWork::$imagessource['format'][$i];}}}
			
	
static public function update_avatar_in_BD($MSQLc){//записываем фото в БД
	$query="UPDATE 
		registrated_users___main_data
		SET  	
			`gen_photo`='1',
			`site_photo_format`='".GeneralImagesWork::$imagessource['format'][1]."'
		WHERE
		 	id_user='".GeneralGetVars::$var2."'
		LIMIT 1
		";
	return GeneralMYSQL::query_update($MSQLc,$query);}


static public function sendavatar($MSQLc){
	if (UsersBase::detect_its_mypage(1)==true){//определяем - наша страница или нет
		//GeneralGetVars::$var2 - наш пользователь, вдруг нам потребуется изменить чужую фотку
		GeneralImagesCalculate::$imagessizesarray_name="imagessizes_users_ava";//задаем имя массива размеров, т.к. имя сервиса и массива не совпадают
		GeneralImagesUpload::loadimagestoreception($MSQLc,UsersForreg::maxrattachedimages_ava);//проверяем наличие приложенного изображения перед загрузкой и, если оно есть, загружаем его во временную папку, проверяем его и если оно не соответствует требованиям безопасности, то удаляем его	
		if (GeneralImagesUpload::$statusimageattached==1){//если изображение приложено и проверено		
			self::setnameforoneimage_avatar(1,GeneralGetVars::$var2);//определяем имя файла подгруженной картинки по установленному id_photo и заносим в массив imagesdestination
			if (GeneralImagesUpload::movingeachimagefromreception($MSQLc)==true){//загружаем изображение по имени из массива в конечную папку и если изображение загрузилось в конечную папку под номером темы из $get_var3
				self::update_avatar_in_BD($MSQLc);//записываем фото в БД				
				return true;}}}
	return false;}


static public function cropavatar($MSQLc){
	if (UsersBase::detect_its_mypage(1)==true){//определяем - наша страница или нет
		//GeneralGetVars::$var2 - наш пользователь, вдруг нам потребуется изменить чужую фотку
		GeneralImagesCalculate::$imagessizesarray_name="imagessizes_users_ava";//задаем имя массива размеров, т.к. имя сервиса и массива не совпадают
		//у нас уже есть ширина, высота, x и y изображения
		//есть имя исходника и итогового изображения
		//остается пройти по массиву размеров и перезаписать файлы квадратов
		$source=GeneralUploadBasic::detectpathfile("images",GeneralGetVars::$var2."_3.".$_POST['format'],0);//откуда берем катинку
		foreach (GeneralImagesCalculate::$imagessizes_users_ava as $key=>$value){//для каждого вида текущего изображения в папке files
			if (GeneralImagesCalculate::$imagessizes_users_ava[$key]['square']==1){//только для квадратных		
			$path_to=GeneralUploadBasic::detectpathfile("images",GeneralGetVars::$var2."_".$key.".".$_POST['format'],1);//куда записываем
			//echo($source." | ".$path_to." | ".$_POST['w']." | ".$_POST['h']." | ".$_POST['format']." | ".$_POST['x1']." | ".$_POST['y1']." | ".GeneralImagesCalculate::$imagessizes_users_ava[$key]['limit']." | ".GeneralImagesCalculate::$imagessizes_users_ava[$key]['limit']);
			GeneralImagesWork::resize_and_save(
				$source,
				$path_to,				
				$_POST['w'],
				$_POST['h'],				
				$_POST['format'],
				$_POST['x1'],
				$_POST['y1'],
				GeneralImagesCalculate::$imagessizes_users_ava[$key]['limit'],
				GeneralImagesCalculate::$imagessizes_users_ava[$key]['limit'],
				0,
				0,
				100,
				'0xffffff');}}}				
	//переходим на страницу личных данных		
	GeneralGetVars::$var3="";}


	
	
	
	
	
	
	
	
	
	
	
/*
  //`forum3` text NOT NULL,
  //`forum2` text NOT NULL,
  //`photo3` text NOT NULL,
  //`automarket3` text NOT NULL,
  //`video3` text NOT NULL,
  //`news3` text NOT NULL,
//articles3 text NOT NULL,
  //`photoalbums_self` text NOT NULL,		
  //`walls`
*/



static public function write_to_mymessages_sm($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	return true;}
	
static public function write_to_mymessages_ch($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	return true;}	
	
	
static public function write_to_mymessages_sw($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	if (UsersMyData::$id!=$getvar2){//если мы не на своей странице пишем на стене
	GeneralPageBasic::set_code_page("sw",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";
	$query="
		UPDATE 		registrated_users___my_messages 
		SET 		walls=CONCAT(walls,'".$text."')
		WHERE		id_user='".UsersMyData::$id."' AND walls NOT LIKE '%".$text."%' LIMIT 1";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}}
	
	
static public function write_to_mymessages_mc($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	GeneralPageBasic::set_code_page("mc",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";
	$query="
		UPDATE 		registrated_users___my_messages 
		SET 		indexchat1=CONCAT(indexchat1,'".$text."')
		WHERE		id_user='".UsersMyData::$id."' AND indexchat1 NOT LIKE '%".$text."%' LIMIT 1";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}

	
	
	
static public function write_to_mymessages_sh($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	GeneralPageBasic::set_code_page("sh",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";
	$query="
		UPDATE 		registrated_users___my_messages 
		SET 		shopchat1=CONCAT(shopchat1,'".$text."')
		WHERE		id_user='".UsersMyData::$id."' AND shopchat1 NOT LIKE '%".$text."%' LIMIT 1";
	echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}	
	
	
	
	
	
	
	
	

static public function write_to_mymessages_fm($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	GeneralPageBasic::set_code_page("fm",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";
	$query="
		UPDATE 		registrated_users___my_messages 
		SET 		forum3=CONCAT(forum3,'".$text."')
		WHERE		id_user='".UsersMyData::$id."' AND forum3 NOT LIKE '%".$text."%' LIMIT 1";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}


static public function signatures_clear($MSQLc){
	$query="
		UPDATE 		registrated_users___signaturing 
		SET 		signatures=''
		WHERE		id_user='".UsersMyData::$id."' LIMIT 1";
	GeneralMYSQL::query_update($MSQLc,$query);}

	
	
	
	
	
static public function wall_clear($MSQLc){
	if (UsersBase::detect_its_mypage(1)==true){//определяем - наша страница или нет
	$query="
		DELETE FROM		registrated_users___wall
		WHERE			user='".GeneralGetVars::$var2."'";
	GeneralMYSQL::query_delete($MSQLc,$query);
	GeneralGetVars::$anchor="dw1sw";
	}
	
	}	
	
	
	
	
	
	
	
	
static public function mytalks_clear($MSQLc){
	$query="
		UPDATE 
			registrated_users___my_messages 
		SET
			indexchat1='',		
			forum3='',
			forum2='',
			photo3='',
			walls='',
			automarket3='',
			automarket2='',
			video3='',
			news3='',
			photoalbums_self=''
		WHERE
			id_user='".UsersMyData::$id."' LIMIT 1";
	GeneralMYSQL::query_update($MSQLc,$query);}
	
	
	
	
	
	
	
	
	
	
	
	
	

static public function write_to_mymessages_ft($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	GeneralPageBasic::set_code_page("ft",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";
	$query="
		UPDATE 		registrated_users___my_messages 
		SET 		forum2=CONCAT(forum2,'".$text."')
		WHERE		id_user='".UsersMyData::$id."' AND forum2 NOT LIKE '%".$text."%' LIMIT 1";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}


static public function write_to_mymessages_vi($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	GeneralPageBasic::set_code_page("vi",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";
	$query="
		UPDATE 		registrated_users___my_messages 
		SET 		video3=CONCAT(video3,'".$text."')
		WHERE		id_user='".UsersMyData::$id."' AND video3 NOT LIKE '%".$text."%' LIMIT 1";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}


static public function write_to_mymessages_sf($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	GeneralPageBasic::set_code_page("sf",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";
	$query="
		UPDATE 		registrated_users___my_messages 
		SET 		photoalbums_self=CONCAT(photoalbums_self,'".$text."')
		WHERE		id_user='".UsersMyData::$id."' AND photoalbums_self NOT LIKE '%".$text."%' LIMIT 1";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}

static public function write_to_mymessages_ga($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	GeneralPageBasic::set_code_page("ga",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";
	$query="
		UPDATE 		registrated_users___my_messages 
		SET 		photo3=CONCAT(photo3,'".$text."')
		WHERE		id_user='".UsersMyData::$id."' AND photo3 NOT LIKE '%".$text."%' LIMIT 1";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}


static public function write_to_mymessages_ne($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	GeneralPageBasic::set_code_page("ne",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";
	$query="
		UPDATE 		registrated_users___my_messages 
		SET 		news3=CONCAT(news3,'".$text."')
		WHERE		id_user='".UsersMyData::$id."' AND news3 NOT LIKE '%".$text."%' LIMIT 1";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}
	
	
	
	
	
static public function write_to_mymessages_ar($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	GeneralPageBasic::set_code_page("ar",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";
	$query="
		UPDATE 		registrated_users___my_messages 
		SET 		articles3=CONCAT(articles3,'".$text."')
		WHERE		id_user='".UsersMyData::$id."' AND articles3 NOT LIKE '%".$text."%' LIMIT 1";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}	
	
	
	
	
	
	
	
	
	
	
	
	
static public function write_to_mymessages_am($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){	//записываем в свои сообщения собщение в новостях
	GeneralPageBasic::set_code_page("am",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";
	$query="
		UPDATE 		registrated_users___my_messages 
		SET 		automarket3=CONCAT(automarket3,'".$text."')
		WHERE		id_user='".UsersMyData::$id."' AND automarket3 NOT LIKE '%".$text."%' LIMIT 1";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}
	
	
	
	
	
	
	
	
	
static public function redactpassword($MSQLc){	//записываем в свои сообщения собщение в новостях
	if (UsersBase::detect_its_mypage(2)==true){
		$salt=UsersMyData::return_composed_salt();//придумываем соль
		$saltedpassword=UsersMyData::return_salting_password($salt,$_POST['redacting_password']);//солим пароль
		
		$query="
			UPDATE 		registrated_users___secure_passwords 
			SET 		password='".$saltedpassword."'
			WHERE		id_user='".UsersMyData::$id."' LIMIT 1";
		GeneralMYSQL::query_update($MSQLc,$query);		
			
		$query="
			UPDATE 		registrated_users___secure_salt 
			SET 		salt='".$salt."'
			WHERE		id_user='".UsersMyData::$id."' LIMIT 1";
		GeneralMYSQL::query_update($MSQLc,$query);

		$query="SELECT 
				gen_login_user,
				site_mail_user,
				gen_name_user,
				gen_surname_user,
				site_login_status,
				id_user 
				FROM registrated_users___main_data WHERE id_user='".UsersMyData::$id."' LIMIT 1";
		$res=GeneralMYSQL::query($MSQLc,$query);
		$row=GeneralMYSQL::fetch_array($res);
		
		UsersMail::$to=$row['site_mail_user'];	
		UsersMail::$subject="Смена пароля на сайте instorage.org/portfolio/tazteam";
		UsersMail::$header.="From: instorage.org/portfolio/tazteam <ladonin85@mail.ru>";
		UsersMail::$header.="\nContent-type: text/html; charset=\"UTF-8\""; 
		UsersMail::$text="<HTML>\r\n
		<HEAD>\r\n
		<META http-equiv=Content-Type content='text/html; charset=UTF-8'>\r\n
		</HEAD>\r\n
		<BODY>\r\n
		<b style='font-size:17px; color:#333333;'>Уважаемый, ".UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status'])."!</b>\r\n
		<table cellpadding='0' cellspacing='0' width='400'><tr><td height='5' align='left'></td></tr></table>
		<table cellpadding='0' cellspacing='0' width='400'>
		<tr>
		<td height='25' align='left' style='background-color:#006bbc; padding-left:5px; border-left:1px solid #8194b2; border-top:1px solid #8194b2; border-bottom:1px solid #385194;'>
			<b style='font-size:13px; color:#ffffff;'>Вы изменили свой старый пароль.</b>
		</td>
		<td height='25' align='left' width='110' valign='middle' style='background-color:#006bbc; padding-right:5px; border-right:1px solid #8194b2; border-top:1px solid #8194b2; border-bottom:1px solid #385194;'><a href='http://instorage.org/portfolio/tazteam' title='instorage.org/portfolio/tazteam - главная страница'><img src='http://instorage.org/portfolio/tazteam/images/MAILlogoTAZ.png' width='115' height='16'></a></td>
		</tr>
		</table>
		<table cellpadding='5' cellspacing='0' width='400' style='border:1px solid #b6c3e5; background-color:#dce1ed; text-align: justify; word-spacing: 0.2ex;'>
		<tr>
		<td align='left'>
			<font style='font-size:12px;'>Ваш новый пароль:&nbsp;<b>".$_POST['redacting_password']."</b></font>
		</td>
		</tr>
		</table>
		<table cellpadding='0' cellspacing='0' width='100%'><tr><td height='10' align='left'></td></tr></table>
		<font style='font-size:12px;'>С уважением, администрация <a href='http://instorage.org/portfolio/tazteam/cabinet/155'>instorage.org/portfolio/tazteam</a></font>
		<table cellpadding='0' cellspacing='0' width='100%'><tr><td height='10' align='left'></td></tr></table>
		<font style='font-size:12px;'><a href='http://instorage.org/portfolio/tazteam/cabinet/1'>Разработка сайта</a></font>
		</BODY>\r\n
		</HTML>";
		UsersMail::send();		
		GeneralCookies::setglobal("UsersChangePasswordStatus",1);//статус
		
		
		GeneralCookies::setglobal("UsersMyDataPassword",$saltedpassword);}}//меняем пароль в куках на новый
		

























}	
	
	
	
	
	
	
	
	




?>