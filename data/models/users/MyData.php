<?php
class UsersMyData{

static public $identified=0;//идентифицирован я программой или нет
static public $id=0;//мой id
static protected $saltedpassword=0;//мой "соленый" пароль



static public $my_sn="";//соцсеть, к которой я могу быть привязан


static public $problems_status=0;//ошибка доступа при регистрации и т.д.

static public $name="";//мое имя (ФИО, логин или майл)
static public $name2="";//мое имя (если есть)
static public $surname2="";//моя фамилия (если есть)

static public $score=0;//баллов на счету

static public $id_temporary=0;//id пользователя во временной таблице



static public $reg_status=0;//статус регистрации - 0 - регистрация не проводится, 1- регистрация (отправка на почту), 2 - ошибка, почта совпадает с почтой другого пользователя, 3 - регистрация почта активирована (перешел с почты), 4 - зарегистрировался через соцсеть vk
static public $fasten_sn_status=0;//0 - ничего не происходило, 1 - аккаунт успешно привязался, 2 - кто-то уже привязан к этому id_sn, 3 - мы уже давно привязаны к соцсети (не важно какой)
static public $enter_status=0;//статус входа - 0 - вход не проводился, 1- вход успешный через соцсеть vk, 2 - ошибка входа через соцсеть vk, такого пользователя с id_sn_vk нет, 3 - ошибка входа через пароль

static public $changepassword_status=0;//статус сменя пароля - 0 пароль не менялся, 1- пароль сменен
static public $send_mail_for_repassword_status=0;//0 - не отправляли, 1 - все в порядке (пришло письмо), 2 - почта не найдена





//static public function register_user_by_sn($MSQLc,$id){//поиск соленого пароля
	//$query="UPDATE registrated_users___main_data SET gen_online='".$what."' WHERE id_user='".$id."' LIMIT 1";
	//GeneralMYSQL::query_update($MSQLc,$query);}




static public function return_data_relations($public,$sex){
if ($public==1){
	if ($sex==1){return "не замужем";}
	else if ($sex==2){return "не женат";}}
else if ($public==2){
	if ($sex==1){return "есть друг";}
	else if ($sex==2){return "есть подруга";}}
else if ($public==3){
	if ($sex==1){return "помолвлена";}
	else if ($sex==2){return "помолвлен";}}
else if ($public==4){
	if ($sex==1){return "замужем";}
	else if ($sex==2){return "женат";}}
else if ($public==5){
	if ($sex==1){return "всё сложно";}
	else if ($sex==2){return "всё сложно";}}
else if ($public==6){
	if ($sex==1){return "в активном поиске";}
	else if ($sex==2){return "в активном поиске";}}
else if ($public==7){
	if ($sex==1){return "влюблена";}
	else if ($sex==2){return "влюблён";}}}



static public function return_id_by_sn($MSQLc,$sn,$id){//определяем id_user по идентификатору из соцсети
	$query="SELECT id_user FROM registrated_users___main_data WHERE sn_id_user_".$sn."='".$id."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	if ($row['id_user']>0){return $row['id_user'];}
	return false;}

static public function return_sn_by_id_user($MSQLc,$id){//ИЩЕМ соцсеть, к которой возможно привязан пользователь
	$query="SELECT site_my_sn FROM registrated_users___main_data WHERE id_user='".$id."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	if ($row['site_my_sn']){return $row['site_my_sn'];}
	return false;}

static public function return_sn_by_id($MSQLc,$sn,$id){//ИЩЕМ идентификатор из соцсети по id_user
	$query="SELECT sn_id_user_".$sn." FROM registrated_users___main_data WHERE id_user='".$id."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	if ($row['sn_id_user_'.$sn]>0){return $row['sn_id_user_'.$sn];}
	return false;}


static public function return_name($login,$mail,$name,$surname,$login_status){//показывем имя пользователя
	if (($login)&&($login_status)){//на первое место логин, если есть у него статус
		return $login;}
	else if (($name)&&($surname)){
		return $name." ".$surname;}
	else if ($name)	{
		return $name;}
	else if ($login){
		return $login;}
	else if ($mail){
		return $mail;}
	else {
		return 'без имени';}
    }





static public function preidentify(){//первоначальная простая проверка зарегистрирован пользователь или нет
	if (!empty($_COOKIE['UsersMyDataId'])) {return true;}
	return false;}

static protected function clearvars(){//очищение внутренних переменных библиотеки
	self::$identified=0;
	self::$id=0;
	self::$saltedpassword=0;
	self::$name=0;
	self::$name2=0;
	self::$surname2=0;
	self::$score=0;}

static protected function clearcookies(){//очистить куки
	GeneralCookies::setglobal("UsersMyDataId",0);
	GeneralCookies::setglobal("UsersMyDataPassword",0);
	GeneralCookies::setglobal("UsersMyDataName",0);
	GeneralCookies::setglobal("UsersMyDataName2",0);
	GeneralCookies::setglobal("UsersMyDataSurname2",0);}

static protected function revisioncookies(){//проверка куков пользователя
	if ((!empty($_COOKIE['UsersMyDataId']))&&(!empty($_COOKIE['UsersMyDataPassword']))&&(!empty($_COOKIE['UsersMyDataName']))){
		GeneralCookies::setglobal("UsersMyDataId",GeneralSecurity::tonumber($_COOKIE['UsersMyDataId']));//потому что мы их суем в SQL - запрос
		return true;}
	else {self::clearcookies();}
	return false;}


static protected function revision_reg_data_status(){//работа со статусом регистрации данных
	if(isset($_COOKIE['UsersRegDataStatus'])){
		if ($_COOKIE['UsersRegDataStatus']==4){
			GeneralCookies::setglobal("UsersRegDataStatus",0);
			self::$reg_status=4;}
		if ($_COOKIE['UsersRegDataStatus']==3){
			GeneralCookies::setglobal("UsersRegDataStatus",0);
			self::$reg_status=3;}
		if ($_COOKIE['UsersRegDataStatus']==2){
			GeneralCookies::setglobal("UsersRegDataStatus",0);
			self::$reg_status=2;}
		if ($_COOKIE['UsersRegDataStatus']==1){
			GeneralCookies::setglobal("UsersRegDataStatus",0);
			self::$reg_status=1;}}}


static protected function revision_fasten_sn_status(){//работа со статусом привязки аккаунта к соцсети
	if(isset($_COOKIE['UsersFastenSnStatus'])){
		if ($_COOKIE['UsersFastenSnStatus']==3){
			GeneralCookies::setglobal("UsersFastenSnStatus",0);
			self::$fasten_sn_status=3;}
		if ($_COOKIE['UsersFastenSnStatus']==2){
			GeneralCookies::setglobal("UsersFastenSnStatus",0);
			self::$fasten_sn_status=2;}
		if ($_COOKIE['UsersFastenSnStatus']==1){
			GeneralCookies::setglobal("UsersFastenSnStatus",0);
			self::$fasten_sn_status=1;}}}





static protected function revision_send_mail_for_repassword_status(){//работа со статусом отправки почты для смены пароля
	if(isset($_COOKIE['UsersSendMailForRepasswordStatus'])){
		if ($_COOKIE['UsersSendMailForRepasswordStatus']==2){
			GeneralCookies::setglobal("UsersSendMailForRepasswordStatus",0);
			self::$send_mail_for_repassword_status=2;}
		if ($_COOKIE['UsersSendMailForRepasswordStatus']==1){
			GeneralCookies::setglobal("UsersSendMailForRepasswordStatus",0);
			self::$send_mail_for_repassword_status=1;}}}







static protected function revision_changepassword(){//работа со статусом смены пароля
	if(isset($_COOKIE['UsersChangePasswordStatus'])){
		if ($_COOKIE['UsersChangePasswordStatus']==1){
			GeneralCookies::setglobal("UsersChangePasswordStatus",0);
			self::$changepassword_status=1;}}}









static protected function revision_enter_status(){//работа со статусом входа на сайт
	if(isset($_COOKIE['UsersEnterStatus'])){
		if ($_COOKIE['UsersEnterStatus']==3){
			GeneralCookies::setglobal("UsersEnterStatus",0);
			self::$enter_status=3;}
		if ($_COOKIE['UsersEnterStatus']==2){
			GeneralCookies::setglobal("UsersEnterStatus",0);
			self::$enter_status=2;}
		if ($_COOKIE['UsersEnterStatus']==1){
			GeneralCookies::setglobal("UsersEnterStatus",0);
			self::$enter_status=1;}}}




static public function setcookies_name($name,$surname,$login,$mail,$login_status){//установить в куки имя идентифицированного пльзователя
	GeneralCookies::setglobal("UsersMyDataName",self::return_name($login,$mail,$name,$surname,$login_status));
	//дополнительно имя и фамилия, если они есть, для отображения на разных строчках с левой стороны экрана
	if (!$name) {$name=0;}
	GeneralCookies::setglobal("UsersMyDataName2",$name);
	if (!$surname) {$surname=0;}
	GeneralCookies::setglobal("UsersMyDataSurname2",$surname);}




static public function autonomic___set_name_user_cookies($MSQLc,$id_user,$id,$sn){//автономное (не привязана к другим методам) данных пользователя по id_user, или sn_id
	$query="
	SELECT gen_name_user,gen_surname_user,gen_login_user,site_mail_user,site_login_status
	FROM registrated_users___main_data
	WHERE ";
	if ($sn)	{$query.="sn_id_user_".$sn."='".$id."'";}
	else 		{$query.="id_user='".$id_user."'";}
	$query.=" LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	self::setcookies_name($row['gen_name_user'],$row['gen_surname_user'],$row['gen_login_user'],$row['site_mail_user'],$row['site_login_status']);}






static public function setcookies_id_passwords($id,$password){//установить в куки Id и Password идентифицированного пльзователя
	GeneralCookies::setglobal("UsersMyDataId",$id);
	GeneralCookies::setglobal("UsersMyDataPassword",$password);}



static public function setcookies($id,$password,$name,$surname,$login,$mail,$login_status){//установить в куки Id, Password и имя идентифицированного пльзователя
	self::setcookies_id_passwords($id,$password);
	self::setcookies_name($name,$surname,$login,$mail,$login_status);}

static protected function updatecookiestime(){//обновить время жизни куков
	GeneralCookies::setglobal("UsersMyDataId",$_COOKIE['UsersMyDataId']);
	GeneralCookies::setglobal("UsersMyDataPassword",$_COOKIE['UsersMyDataPassword']);
	GeneralCookies::setglobal("UsersMyDataName",$_COOKIE['UsersMyDataName']);
	GeneralCookies::setglobal("UsersMyDataName2",$_COOKIE['UsersMyDataName2']);
	GeneralCookies::setglobal("UsersMyDataSurname2",$_COOKIE['UsersMyDataSurname2']);}

static protected function recognize($MSQLc){//признание пользователя
	self::$identified=1;
	self::$id=$_COOKIE['UsersMyDataId'];
	self::$name=$_COOKIE['UsersMyDataName'];

	//дополнительно имя и фамилия, если они есть, для отображения на разных строчках с левой стороны экрана
	if (isset($_COOKIE['UsersMyDataName2'])){
		self::$name2=$_COOKIE['UsersMyDataName2'];}
	if (isset($_COOKIE['UsersMyDataSurname2'])){
		self::$surname2=$_COOKIE['UsersMyDataSurname2'];}

	//сделаем принудительно его онлайн не дожидаясь аякс запроса, вдруг мы до первого аякс запроса заново обновим страницу
	self::online($MSQLc,self::$id,1);
	self::updatecookiestime();}//обновим время жизни куков

static protected function online($MSQLc,$id,$what){//установка онлайн/офлайн пользователя
	if ($what==1){
		$query="UPDATE registrated_users___main_data SET gen_timecoming='".GeneralGlobalVars::$timeunix."' WHERE id_user='".self::$id."' LIMIT 1";}
	else{
		$query="UPDATE registrated_users___main_data SET gen_timecoming='0' WHERE id_user='".self::$id."' LIMIT 1";}
	GeneralMYSQL::query_update($MSQLc,$query);}

static protected function find_saltedpassword($MSQLc,$id){//поиск соленого пароля
	$query="SELECT password FROM registrated_users___secure_passwords WHERE id_user='".$id."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['password'];}

static protected function revisioncookiepassword($MSQLc){//проверка правильности пароля из куков
	if (self::find_saltedpassword($MSQLc,$_COOKIE['UsersMyDataId'])==$_COOKIE['UsersMyDataPassword'])	{return true;}	return false;}

static protected function revisioninputpassword($MSQLc,$id,$password){//проверка пароля пользователя
	//поиск "соленого пароля" И "соли" в registrated_users___secure_passwords и registrated_users___secure_salt по полученному id
	$query="
	SELECT registrated_users___secure_passwords.password AS password,registrated_users___secure_salt.salt as salt
	FROM (SELECT * FROM registrated_users___secure_passwords WHERE id_user='".$id."' LIMIT 1) as registrated_users___secure_passwords
	JOIN registrated_users___secure_salt
	USING(id_user)
	LIMIT 1
	";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	$DBpassword=$row['password'];//берем "соленый пароль" из БД
	$salt=$row['salt'];//берем "соль" из БД
	//шифруем "введенный пароль" с "солью"
	$password=md5(md5($password).$salt);
	//сравниваем "засоленый пароль" с "соленым паролем" из registrated_users___secure_passwords" через "=="
	if ($password==$DBpassword){
		self::$saltedpassword=$password;//задаем во внутреннюю переменную библиотеки
		return true;}
	return false;}

static public function quit($MSQLc,$id){//выход пользователя
	//устанавливаем куки, если какая-то пустая, то все в ноль
	self::revisioncookies();
	//если пароль пользователя совпадает с его id
	//if (self::revisioncookiepassword($MSQLc)==true){
		//делаем пользователя офлайн
		//self::online($MSQLc,$id,0); - не нужно делать, просто время не начисляется
		//}
	//переходим на главную страницу
	GeneralGetVars::$var1="";
	GeneralGetVars::$var2="";
	GeneralGetVars::$var3="";
	GeneralGetVars::$var4="";
	GeneralGetVars::$num_page="";
	//стираем его данные из браузера
	self::clearcookies();
	self::clearvars();}









static public function enter($MSQLc){//вход пользователя по логину(или почте) и паролю
	if (($_POST['UsersMyDataEnter_login'])&&($_POST['UsersMyDataEnter_password'])){
		//поиск id в registrated_users___main_data по введенному логину или почте
		$query="SELECT id_user,gen_name_user,gen_surname_user,gen_login_user,site_mail_user,site_login_status FROM registrated_users___main_data WHERE gen_login_user='".$_POST['UsersMyDataEnter_login']."' OR site_mail_user='".$_POST['UsersMyDataEnter_login']."' LIMIT 1";
		$res=GeneralMYSQL::query($MSQLc,$query);
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);
		$id=$row['id_user'];
		//если логин (или почта) введен правильно, то идем дальше
		if ($id>0){
			//заранее берем имя пользователя, т.к. $row скоро поменяется
			$name=$row['gen_name_user'];//echo($row['gen_name_user']);
			$surname=$row['gen_surname_user'];
			$login=$row['gen_login_user'];
			$mail=$row['site_mail_user'];
			$login_status=$row['site_login_status'];
			//проверяем наш пароль
			if (self::revisioninputpassword($MSQLc,$id,$_POST['UsersMyDataEnter_password'])==true){
				//устанавливаем в куки $_COOKIE['UsersMyDataId']="id в registrated_users___main_data", в $_COOKIE['UsersMyDataPassword']="полученный соленый пароль" и возвращаем true
				self::setcookies($id,self::$saltedpassword,$name,$surname,$login,$mail,$login_status);
				self::recognize($MSQLc);
				return true;}}}
	//если не равны, возвращаем false
	GeneralCookies::setglobal("UsersEnterStatus",3);
	return false;}





static public function detectscore($MSQLc){
		$query="SELECT site_points FROM registrated_users___main_data WHERE id_user='".self::$id."' LIMIT 1";
		$res=GeneralMYSQL::query($MSQLc,$query);
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);
		return $row['site_points'];}




static public function identification($MSQLc){//идентификация пользователя
	self::revision_reg_data_status();//проверка статуса регистрации, должна быть перед идентификацией
	self::revision_enter_status();//проверка статуса входа (если был осуществлен)
	self::revision_send_mail_for_repassword_status();//работа со статусом отправки почты для смены пароля (пользователь не может войти, потому что забыл пароль)
		if ((self::revisioncookies()==true)&&((self::$reg_status==0)||(self::$reg_status==3)||(self::$reg_status==4)))	{//если наши куки установлены и регистрации нет или она завершена
		if (self::revisioncookiepassword($MSQLc)==true) {//если пароль в куках эквивалентен паролю в registrated_users___secure_passwords
			self::recognize($MSQLc);


            self::$score=self::detectscore($MSQLc);

			self::revision_fasten_sn_status();//проверка привязки только для авторизированного пользователя
			self::revision_changepassword();//работа со статусом смены пароля
			return true;}}
	//в противном случае
	self::clearcookies();
	self::clearvars();}






static public function return_salting_password($salt,$password){//солим пароль и возвращаем
	return md5(md5($password).$salt);}

static public function return_composed_password(){//придумываем пароль
	return chr(rand(97, 122)).chr(rand(97, 122)).chr(rand(97, 122)).chr(rand(97, 122)).chr(rand(97, 122)).chr(rand(97, 122)).chr(rand(97, 122)).chr(rand(97, 122)).chr(rand(97, 122)).chr(rand(97, 122)).chr(rand(97, 122));}

static public function return_composed_salt(){//придумываем соль
	return chr(rand(97, 122)).chr(rand(97, 122)).chr(rand(97, 122)).chr(rand(97, 122));}








static public function return_password_by_id_user($MSQLc,$id_user){//определяем пароль по идентификатору
	$query="SELECT password FROM registrated_users___secure_passwords WHERE id_user='".$id_user."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['password'];}






static public function tiny_identification(){// кратко идентифицируем пользователя - для чатов (чтобы определить  - может ли он обращаться к чатовцу)
	if ((isset($_COOKIE['UsersMyDataId']))&&(isset($_COOKIE['UsersMyDataPassword']))&&(isset($_COOKIE['UsersMyDataName']))){
	if (($_COOKIE['UsersMyDataId']>0)&&($_COOKIE['UsersMyDataPassword'])&&($_COOKIE['UsersMyDataName'])){
		self::$identified=1;
		self::$id=$_COOKIE['UsersMyDataId'];
		self::$name=$_COOKIE['UsersMyDataName'];}}}








static protected function detect_id_by_temporary_data($MSQLc,$mail){//определяем временный id пользователя
	$query="SELECT id FROM registrated_users___temporary___main_data WHERE mail_user='".$mail."' ORDER by id DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	self::$id_temporary=$row['id'];
	return self::$id_temporary;}



static protected function return_mail_yet_disable($MSQLc,$mail)	{//проверяем есть ли такой mail у других пользователей
	$query="SELECT id_user FROM registrated_users___main_data WHERE site_mail_user='".$mail."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	if ($row['id_user']>0){return false;}
	$query="SELECT id FROM registrated_users___temporary___main_data WHERE mail_user='".$mail."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	if ($row['id']>0){return false;}
	return true;}


static public function registration($MSQLc){//начальная регистрация пользователя по почте и паролю
	if (($_POST['UsersMyDataRegistration_mail'])&&($_POST['UsersMyDataRegistration_password'])&&($_POST['UsersMyDataRegistration_antibot'])&&($_POST['oves'])){

	//придумываем соль
	$salt=self::return_composed_salt();

	//делаем соленый пароль
	$password=self::return_salting_password($salt,$_POST['UsersMyDataRegistration_password']);

	//проверяем есть ли такой mail у других пользователей
	if (self::return_mail_yet_disable($MSQLc,$_POST['UsersMyDataRegistration_mail'])==true){

		//записываем пользователя во временную таблицу
		$query="INSERT INTO registrated_users___temporary___main_data (id,mail_user) VALUES('','".$_POST['UsersMyDataRegistration_mail']."')";
		GeneralMYSQL::query_insert($MSQLc,$query);

		//находим id
		self::detect_id_by_temporary_data($MSQLc,$_POST['UsersMyDataRegistration_mail']);

		//записываем соленый пароль во временную таблицу
		$query="INSERT INTO registrated_users___temporary___secure_passwords (id,password) VALUES('".self::$id_temporary."','".$password."')";
		GeneralMYSQL::query_insert($MSQLc,$query);

		//записываем соль во временную таблицу
		$query="INSERT INTO registrated_users___temporary___secure_salt (id,salt) VALUES('".self::$id_temporary."','".$salt."')";
		GeneralMYSQL::query_insert($MSQLc,$query);

		UsersMail::$to=$_POST['UsersMyDataRegistration_mail'];
		UsersMail::$subject="Регистрация на сайте mapstore.org/my_portfolio/tazteam.net";
		UsersMail::$header.="From: mapstore.org/my_portfolio/tazteam.net <administration@mapstore.org/my_portfolio/tazteam.net>";
		UsersMail::$header.="\nContent-type: text/html; charset=\"UTF-8\"";
		UsersMail::$text="<HTML>\r\n
		<HEAD>\r\n
		<META http-equiv=Content-Type content='text/html; charset=UTF-8'>\r\n
		</HEAD>\r\n
		<BODY>\r\n
		<b style='font-size:17px; color:#333333;'>Уважаемый ".$_POST['UsersMyDataRegistration_mail']."!</b>\r\n
		<table cellpadding='0' cellspacing='0' width='400'><tr><td height='5' align='left'></td></tr></table>
		<table cellpadding='0' cellspacing='0' width='400'>
		<tr>
		<td height='25' align='left' style='background-color:#006bbc; padding-left:5px; border-left:1px solid #8194b2; border-top:1px solid #8194b2; border-bottom:1px solid #385194;'>
			<b style='font-size:13px; color:#ffffff;'>Добро пожаловать на наш сайт!</b>
		</td>
		<td height='25' align='left' width='110' valign='middle' style='background-color:#006bbc; padding-right:5px; border-right:1px solid #8194b2; border-top:1px solid #8194b2; border-bottom:1px solid #385194;'><a href='".GeneralGlobalVars::url."' title='mapstore.org/my_portfolio/tazteam.net - главная страница'><img src='".GeneralGlobalVars::url."/images/MAILlogoTAZ.png' width='115' height='16'></a></td>
		</tr>
		</table>
		<table cellpadding='5' cellspacing='0' width='400' style='border:1px solid #b6c3e5; background-color:#dce1ed; text-align: justify; word-spacing: 0.2ex;'>
		<tr>
		<td align='left'>
			<font style='font-size:12px;'>Ваш пароль:&nbsp;<b>".$_POST['UsersMyDataRegistration_password']."</b></font>
			<br><br>
			<a href='".GeneralGlobalVars::url."/performing/registration_final_from_mail.php/".$_POST['UsersMyDataRegistration_mail']."/".$password."' style='font-size:12px;'>Закончить регистрацию и войти в личный кабинет</a>
		</td>
		</tr>
		</table>
		<table cellpadding='0' cellspacing='0' width='100%'><tr><td height='10' align='left'></td></tr></table>
		<font style='font-size:12px;'>С уважением, администрация <a href='".GeneralGlobalVars::url."/users/155'>mapstore.org/my_portfolio/tazteam.net</a></font>
		<table cellpadding='0' cellspacing='0' width='100%'><tr><td height='10' align='left'></td></tr></table>
		<font style='font-size:12px;'><a href='".GeneralGlobalVars::url."/users/1'>Разработка сайта</a></font>
		</BODY>\r\n
		</HTML>";

		UsersMail::send();

		GeneralCookies::setglobal("UsersRegDataStatus",1);}
	else {
		GeneralCookies::setglobal("UsersRegDataStatus",2);}}}//передадим сообщение на страницу view






static protected function return_mail_password_coincidence_in_db($MSQLc,$mail,$password) {//проверяем совпадают ли эти данные с данными в таблице временных данных
	$query="SELECT id FROM registrated_users___temporary___main_data WHERE mail_user='".$mail."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row1=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);

	$query="SELECT id FROM registrated_users___temporary___secure_passwords WHERE password='".$password."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row2=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);

	if (($row1['id']>0)&&($row2['id']>0)&&($row1['id']==$row2['id'])){return true;}
	return false;}



static protected function return_id_user_by_mail($MSQLc,$mail){//определяем идентификатор по почте
	$query="SELECT id_user FROM registrated_users___main_data WHERE site_mail_user='".$mail."' ORDER by id_user DESC LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['id_user'];}


static protected function return_id_temporary_user_by_mail($MSQLc,$mail){//определяем идентификатор временный по почте
	$query="SELECT id FROM registrated_users___temporary___main_data WHERE mail_user='".$mail."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['id'];}


static protected function return_salt_by_id_user($MSQLc,$id_user){//определяем соль по id_user
	$query="SELECT salt FROM registrated_users___temporary___secure_salt WHERE id='".$id_user."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['salt'];}







static public function action_after_registration($MSQLc,$id_user){
	$query="INSERT INTO registrated_users___added_data (id_user) VALUES('".$id_user."')";
	GeneralMYSQL::query_insert($MSQLc,$query);

	$query="INSERT INTO registrated_users___correspondence (id_user) VALUES('".$id_user."')";
	GeneralMYSQL::query_insert($MSQLc,$query);

	$query="INSERT INTO registrated_users___friendship (id_user) VALUES('".$id_user."')";
	GeneralMYSQL::query_insert($MSQLc,$query);

	$query="INSERT INTO registrated_users___making_by (id_user) VALUES('".$id_user."')";
	GeneralMYSQL::query_insert($MSQLc,$query);

	$query="INSERT INTO registrated_users___my_messages (id_user) VALUES('".$id_user."')";
	GeneralMYSQL::query_insert($MSQLc,$query);

	$query="INSERT INTO registrated_users___signaturing (id_user) VALUES('".$id_user."')";
	GeneralMYSQL::query_insert($MSQLc,$query);

	GeneralRobot::$id_user=$id_user;
	GeneralRobot::reaction_on_events($MSQLc,"new_user");}








static public function registration_final_from_mail($MSQLc,$mail,$password){//регистрация пользователя финальная по паролю С почтЫ
	if (($mail)&&($password)){

		//проверяем совпадают ли эти данные с данными в таблице временных данных
		if (self::return_mail_password_coincidence_in_db($MSQLc,$mail,$password)==true){

			//запись в БД постоянных пользовалелей

			//пишем основные данные
			$query="INSERT INTO registrated_users___main_data (id_user,site_mail_user,site_points) VALUES('','".$mail."',5000)";
			GeneralMYSQL::query_insert($MSQLc,$query);

			//находим id_user
			$id_user=self::return_id_user_by_mail($MSQLc,$mail);


			//вставляем директорию пользователя
			$query="
			UPDATE 	registrated_users___main_data
			SET 	dir_user='".UsersBase::return_dir_catalog($id_user)."'
			WHERE 	id_user='".$id_user."'
			LIMIT 	1";//echo($query);
			GeneralMYSQL::query_update($MSQLc,$query);



			//записываем соленый пароль в БД
			$query="INSERT INTO registrated_users___secure_passwords (id_user,password) VALUES('".$id_user."','".$password."')";
			GeneralMYSQL::query_insert($MSQLc,$query);


			//находим id пользователя из временных данных
			$id_temporary=self::return_id_temporary_user_by_mail($MSQLc,$mail);


			//находим соль
			$salt=self::return_salt_by_id_user($MSQLc,$id_temporary);

			//записываем соль в БД
			$query="INSERT INTO registrated_users___secure_salt (id_user,salt) VALUES('".$id_user."','".$salt."')";
			GeneralMYSQL::query_insert($MSQLc,$query);



			self::action_after_registration($MSQLc,$id_user);

			//удаляем временые данные
			$query="DELETE FROM registrated_users___temporary___main_data WHERE id='".$id_temporary."'";
			GeneralMYSQL::query_delete($MSQLc,$query);

			$query="DELETE FROM registrated_users___temporary___secure_passwords WHERE id='".$id_temporary."'";
			GeneralMYSQL::query_delete($MSQLc,$query);

			$query="DELETE FROM registrated_users___temporary___secure_salt WHERE id='".$id_temporary."'";
			GeneralMYSQL::query_delete($MSQLc,$query);

			GeneralCookies::setglobal("UsersRegDataStatus",3);

			self::setcookies($id_user,$password,0,0,0,$mail,0);//установить в куки Id, Password и имя идентифицированного пльзователя

			GeneralHeaderHTTP::location(GeneralGlobalVars::url."/users/".$id_user);
			}
		else{
		GeneralHeaderHTTP::location(GeneralGlobalVars::url);
		}}}










		}

