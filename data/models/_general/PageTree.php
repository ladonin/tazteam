<?php


class GeneralPageTree{




static $keywords='';//ключевые слова для поисковиков

static $title='';//заголовок сайта








static $name1="";//название сервиса
static $name2="";//название раздела (id пользователя)
static $name3="";//название темы
static $name4="";//дополнительно
static $enable=0;//первоначальное значение статуса существования страницы
static $url="";//адрес файла (например (*/forum/forum___3.*)
static $nesting=0;//уровень вложенности по адресной строке


static $autor=0;//автор страницы, если нужно





static $othervar1=0;//переменная ,которой мы в будущем сообщим что-либо позже созданным библиотекам







const classlink="link_normal";
const classdelimiter="content_dark";
const classtext="content_dark";


static function setvars($MSQLc){
	if (!GeneralGetVars::$var1)	{
		self::$url="index/index";
		self::$enable=1;
		self::$name1="Главная";
		self::$title="mapstore.org/my_portfolio/tazteam.net - официальный сайт группы TAZTEAM вконтакте";
		self::$nesting=0;}
	else if (GeneralGetVars::$var1=="forum") {
		if (GeneralGetVars::$var3) {
			$query="
				SELECT
					forum___sections.name_section,
					(SELECT name_topic FROM forum___topics_".GeneralGetVars::$var2." WHERE forum___topics_".GeneralGetVars::$var2.".id_topic='".GeneralGetVars::$var3."' LIMIT 1) name_topic
				FROM
					forum___sections
				WHERE
					forum___sections.id_section='".GeneralGetVars::$var2."'
				LIMIT 1
				";
			$res=GeneralMYSQL::query($MSQLc,$query);
			if ($row=GeneralMYSQL::fetch_array($res)){
				self::$name1="Форум";
				self::$title="Форум mapstore.org/my_portfolio/tazteam.net. ".$row['name_topic'];
				self::$name2=$row['name_section'];
				self::$name3=$row['name_topic'];
				if ((self::$name2)&&(self::$name3)){self::$enable=1;}}
			GeneralMYSQL::free($res);
			self::$url="forum/forum___3";
			self::$nesting=3;}
		else if (GeneralGetVars::$var2) {
			$query="
				SELECT
					forum___sections.name_section
				FROM
					forum___sections
				WHERE
					forum___sections.id_section='".GeneralGetVars::$var2."'
				LIMIT 1
				";
			$res=GeneralMYSQL::query($MSQLc,$query);
			if ($row=GeneralMYSQL::fetch_array($res)){
				self::$name1="Форум";
				self::$title="Форум mapstore.org/my_portfolio/tazteam.net. ".$row['name_section'];
				self::$name2=$row['name_section'];
				if (self::$name2){self::$enable=1;}}
			GeneralMYSQL::free($res);
			self::$url="forum/forum___2";
			self::$nesting=2;}
		else {
			self::$enable=1;
			self::$name1="Форум";
			self::$title="Форум mapstore.org/my_portfolio/tazteam.net.";
			self::$url="forum/forum___1";
			self::$nesting=1;}}




	else if (GeneralGetVars::$var1=="photo") {

		if ((GeneralGetVars::$var4==="allphotos")&&(GeneralGetVars::$num_page>0)) {//все фотки темы
				$query="
				SELECT 		name_section,name_topic,id_user
				FROM 		photo___topics_".GeneralGetVars::$var2."
				LEFT JOIN photo___sections ON photo___sections.id_section='".GeneralGetVars::$var2."'
				WHERE 		photo___topics_".GeneralGetVars::$var2.".id_topic='".GeneralGetVars::$var3."' LIMIT 1";
			$res=GeneralMYSQL::query($MSQLc,$query);
			$row=GeneralMYSQL::fetch_array($res);

				//PhotoBase::detect_id_photo_page_by_num_page($MSQLc,0);
				if ($row['name_topic'])	{//если тема есть
					self::$name1="Авто участников";
					self::$title="Авто участников TAZTEAM. ".$row['name_topic']." - Все фото.";
					self::$name2=$row['name_section'];
					self::$name3=$row['name_topic'];
					self::$autor=$row['id_user'];
					if ((self::$name2)&&(self::$name3)){self::$enable=1;}
					self::$url="photo/photo___3_allphotos";




					}
			GeneralMYSQL::free($res);
			self::$nesting=3;}

		else if (GeneralGetVars::$var3) {
			$query="
				SELECT
					photo___sections.name_section,
					(SELECT name_topic FROM photo___topics_".GeneralGetVars::$var2." WHERE photo___topics_".GeneralGetVars::$var2.".id_topic='".GeneralGetVars::$var3."' LIMIT 1) name_topic
				FROM
					photo___sections
				WHERE
					photo___sections.id_section='".GeneralGetVars::$var2."'
				LIMIT 1
				";
			$res=GeneralMYSQL::query($MSQLc,$query);
			$row=GeneralMYSQL::fetch_array($res);
			if (GeneralGetVars::$num_page>0){//если на какой-нибудь фотографии
				PhotoBase::detect_id_photo_page_by_num_page($MSQLc,0);
				if (($row['name_topic'])&&(PhotoBase::$id_photo_page>0))	{//если тема есть и фото есть
					self::$name1="Авто участников";
					self::$title="Авто участников TAZTEAM. ".$row['name_topic']." - фото ".GeneralGetVars::$num_page;
					self::$name2=$row['name_section'];
					self::$name3=$row['name_topic'];
					if ((self::$name2)&&(self::$name3)){self::$enable=1;}
					self::$url="photo/photo___3";}}
			GeneralMYSQL::free($res);
			self::$nesting=3;}
		else if (GeneralGetVars::$var2) {
			$query="
				SELECT
					photo___sections.name_section
				FROM
					photo___sections
				WHERE
					photo___sections.id_section='".GeneralGetVars::$var2."'
				LIMIT 1
				";
			$res=GeneralMYSQL::query($MSQLc,$query);
			if ($row=GeneralMYSQL::fetch_array($res)){
				self::$title="Авто участников TAZTEAM ".$row['name_section'];
				self::$name1="Авто участников";
				self::$name2=$row['name_section'];
				if (self::$name2){self::$enable=1;}	}
			GeneralMYSQL::free($res);
			self::$url="photo/photo___2";
			self::$nesting=2;}
		else {
			self::$enable=1;
			self::$name1="Авто участников";
			self::$title="Авто участников TAZTEAM";
			self::$url="photo/photo___1";
			self::$nesting=1;}}
	else if (GeneralGetVars::$var1=="automarket") {
		if (GeneralGetVars::$var3>0) {
			$query="SELECT id,name,themepage,mark,model,year_production,price,state,basket_type,motor_type,power FROM automarket WHERE id='".GeneralGetVars::$var3."' AND themepage='".GeneralGetVars::$var2."' LIMIT 1";
			$res=GeneralMYSQL::query($MSQLc,$query);
			$row=GeneralMYSQL::fetch_array($res);
			if ($row['id']>0)	{//если тема есть
				self::$name1="Авторынок";
				if ($row['themepage']==1){
					self::$name2="Продам автомобиль";
					self::$name3=AutomarketBase::return_parameters("mark", $row['mark'])." ".$row['model'];


					if ($row['power']) {
						self::$name3.=", мощность: ".$row['power']." л.с.";	}


					//if ($row['year_production']) {
					//	self::$name3.=", год выпуска:".$row['year_production']." г.";}

					if ($row['price']) {
						self::$name3.=", цена: ".$row['price']." руб.";}

					//if ($row['state']) {
					//	self::$name3.=", состояние: ".AutomarketBase::return_parameters("state", $row['state']);}

					//if ($row['basket_type']) {
					//	self::$name3.=", тип кузова: ".AutomarketBase::return_parameters("basket_type", $row['basket_type']);}


					if ($row['motor_type']) {
						self::$name3.=", тип двигателя: ".AutomarketBase::return_parameters("motor_type", $row['motor_type']);}


                    self::$keywords=AutomarketBase::return_parameters("mark", $row['mark'])." ".$row['model'];
					self::$title=self::$name3;
					}
				else if ($row['themepage']==2){
					self::$name2="Запчасти и аксессуары";
					self::$name3=$row['name'];
					self::$title=self::$name3;
                    self::$keywords="";
					}
				else if ($row['themepage']==3){
					self::$name2="Куплю";
					self::$name3=$row['name'];
					self::$title=self::$name3;
                    self::$keywords="";
					}
				self::$enable=1;}
			GeneralMYSQL::free($res);
			self::$url="automarket/automarket___3";
			self::$nesting=3;}
		else if (GeneralGetVars::$var2) {
			$query="SELECT id FROM automarket "; if (GeneralGetVars::$num_page){$query.="WHERE id='".GeneralGetVars::$num_page."'";} $query.=" LIMIT 1";
			$res=GeneralMYSQL::query($MSQLc,$query);
			$row=GeneralMYSQL::fetch_array($res);

				self::$enable=1;
                self::$keywords="";
				self::$name1="Авторынок";
				if ((GeneralGetVars::$num_page)&&($row['id']>0)){//если тема есть
					self::$name2="Редактировать объявление";
					self::$title=self::$name2;
					}
				else{
					if (GeneralGetVars::$var2==1){
						self::$name2="Новое объявление / Продам автомобиль";
						self::$title=self::$name2;
						}
					elseif (GeneralGetVars::$var2==2){
						self::$name2="Новое объявление / Продам автозапчасти, аксессуары";
						self::$title=self::$name2;
						}
					elseif (GeneralGetVars::$var2==3){
						self::$name2="Новое объявление / Куплю";
						self::$title=self::$name2;
						}}



			GeneralMYSQL::free($res);
			self::$url="automarket/automarket___2";
			self::$nesting=2;}
		else {
			self::$enable=1;
			self::$name1="Авторынок";
			self::$title="Авторынок";
			self::$url="automarket/automarket___1";
            self::$keywords="";
			self::$nesting=1;}}

































	else if (GeneralGetVars::$var1=="garage") {
		if (GeneralGetVars::$var3>0) {
			$query="SELECT id,id_user,themepage,mark,model,motor_type,power FROM garage WHERE id='".GeneralGetVars::$var3."' AND themepage='".GeneralGetVars::$var2."' LIMIT 1";
			$res=GeneralMYSQL::query($MSQLc,$query);
			$row=GeneralMYSQL::fetch_array($res);




			$query2="SELECT
				gen_login_user,
				site_mail_user,
				gen_name_user,
				gen_surname_user,
				site_login_status,
				id_user
				FROM registrated_users___main_data WHERE id_user='".$row['id_user']."' LIMIT 1";
			$res2=GeneralMYSQL::query($MSQLc,$query2);
			$row2=GeneralMYSQL::fetch_array($res2);


			if (($row['id']>0)&&($row2['id_user']>0))	{//если тема и пользователь есть
				self::$name1="Гараж";
				if ($row['themepage']==1){

					self::$name2=UsersMyData::return_name($row2['gen_login_user'],$row2['site_mail_user'],$row2['gen_name_user'],$row2['gen_surname_user'],$row2['site_login_status']);

    				self::$name3="Гараж mapstore.org/my_portfolio/tazteam.net. ".UsersMyData::return_name($row2['gen_login_user'],$row2['site_mail_user'],$row2['gen_name_user'],$row2['gen_surname_user'],$row2['site_login_status'])."->".GarageBase::return_parameters("mark", $row['mark'])." ".$row['model'];

                    self::$keywords="гараж";
					self::$title=self::$name3;
					}
				else if ($row['themepage']==2){
					self::$name2="";
					self::$name3="";
					self::$title="";
                    self::$keywords="";
					}
				else if ($row['themepage']==3){
					self::$name2="";
					self::$name3="";
					self::$title="";
                    self::$keywords="";
                    }
				self::$enable=1;}
			GeneralMYSQL::free($res);
			self::$url="garage/garage___3";
			self::$nesting=3;}
		else if (GeneralGetVars::$var2) {
	       	$query="SELECT id FROM garage "; if (GeneralGetVars::$num_page){$query.="WHERE id='".GeneralGetVars::$num_page."' AND id_user='".UsersMyData::$id."'";} $query.=" LIMIT 1";
			$res=GeneralMYSQL::query($MSQLc,$query);
			$row=GeneralMYSQL::fetch_array($res);

                self::$enable=1;
                self::$keywords="";
				self::$name1="Гараж";
				if ((GeneralGetVars::$num_page)&&($row['id']>0))	{//если тема есть
					self::$name2="Редактировать описание";
					self::$title=self::$name2;
					}
				else{
					if (GeneralGetVars::$var2==1){
						self::$name2="Добавить автомобиль";
						self::$title=self::$name2;
						}
					elseif (GeneralGetVars::$var2==2){
						self::$name2="";
						self::$title=self::$name2;
						}
					elseif (GeneralGetVars::$var2==3){
						self::$name2="";
						self::$title=self::$name2;
						}}
			GeneralMYSQL::free($res);
			self::$url="garage/garage___2";
			self::$nesting=2;}
		else {
			self::$enable=1;
			self::$name1="Гараж";
			self::$title="Гараж mapstore.org/my_portfolio/tazteam.net.";
			self::$url="garage/garage___1";
            //self::$keywords="гараж";
			self::$nesting=1;}}







































	else if (GeneralGetVars::$var1=="tests") {
		/*if (GeneralGetVars::$var2==="redact") {
			if 	(GeneralSecurity::detect_administrator()==true) {
				self::$enable=1;
				self::$name1="Новости";
				if (GeneralGetVars::$num_page){
					self::$name2="Редактировать новость";
					self::$title=self::$name2;
					}
				else{
					self::$name2="Новая тема";
					self::$title=self::$name2;
					}
				self::$url="news/news___2";
				self::$nesting=2;}}
		else */if (GeneralGetVars::$var2>0) {
			$query="SELECT id,themepage FROM tests WHERE id='".GeneralGetVars::$num_page."' AND themepage='".GeneralGetVars::$var2."' LIMIT 1";
			$res=GeneralMYSQL::query($MSQLc,$query);
			$row=GeneralMYSQL::fetch_array($res);
			if ($row['id']>0)	{//если тема есть

                self::$name1="Тесты";
                if(GeneralGetVars::$var2==1){
    				self::$name2="Тесты ПДД";
                }
                else{
                    self::$name2="";
                }

				self::$name3="Вопрос №".$row['id'];

				self::$title=self::$name2.". ".self::$name3;
                //self::$keywords="тесты билеты билет пдд правила дорожного движения полиция гибдд гаи милиция штраф";
				self::$enable=1;}
			GeneralMYSQL::free($res);
			self::$url="tests/tests___3";
			self::$nesting=3;}
		else if (!GeneralGetVars::$var2) {
			self::$enable=1;
			self::$name1="Тесты";
			self::$title="Тесты от mapstore.org/my_portfolio/tazteam.net.";
			self::$url="tests/tests___1";
			self::$nesting=1;}}


















	else if (GeneralGetVars::$var1=="news") {
		if (GeneralGetVars::$var2==="redact") {
			if 	(GeneralSecurity::detect_administrator()==true) {
				self::$enable=1;
				self::$name1="Новости";
				if (GeneralGetVars::$num_page){
					self::$name2="Редактировать новость";
					self::$title=self::$name2;
					}
				else{
					self::$name2="Новая тема";
					self::$title=self::$name2;
					}
				self::$url="news/news___2";
				self::$nesting=2;}}
		else if (GeneralGetVars::$var2>0) {
			$query="SELECT id,name,themepage,keywords FROM news WHERE id='".GeneralGetVars::$var2."' AND themepage='1' LIMIT 1";
			$res=GeneralMYSQL::query($MSQLc,$query);
			$row=GeneralMYSQL::fetch_array($res);
			if ($row['id']>0)	{//если тема есть
				self::$name1="Новости";
				self::$name2="Автотема";
				self::$name3=$row['name'];
				self::$keywords=$row['keywords'];
				self::$title="Новости от mapstore.org/my_portfolio/tazteam.net. ".self::$name3;
				self::$enable=1;}
			GeneralMYSQL::free($res);
			self::$url="news/news___3";
			self::$nesting=3;}
		else if (!GeneralGetVars::$var2) {
			self::$enable=1;
			self::$name1="Новости";
			self::$title="Новости от mapstore.org/my_portfolio/tazteam.net.";
			self::$url="news/news___1";
			self::$nesting=1;}}

	else if (GeneralGetVars::$var1=="articles") {
		if (GeneralGetVars::$var2==="redact") {
			if 	(GeneralSecurity::detect_administrator()==true) {
				self::$enable=1;
				self::$name1="Статьи от TAZTEAM";
				if (GeneralGetVars::$num_page){
					self::$name2="Редактировать статью";
					self::$title=self::$name2;
					}
				else{
					self::$name2="Новая тема";
					self::$title=self::$name2;
					}
				self::$url="news/news___2";
				self::$nesting=2;}}
		else if (GeneralGetVars::$var2>0) {
			$query="SELECT id,name,themepage,keywords FROM news WHERE id='".GeneralGetVars::$var2."' AND themepage='2' LIMIT 1";
			$res=GeneralMYSQL::query($MSQLc,$query);
			$row=GeneralMYSQL::fetch_array($res);
			if ($row['id']>0)	{//если тема есть
				self::$name1="Статьи от TAZTEAM";
				self::$name2="Автотема";
				self::$name3=$row['name'];
				self::$keywords=$row['keywords'];
				self::$title=self::$name3;
				self::$enable=1;}
			GeneralMYSQL::free($res);
			self::$url="news/news___3";
			self::$nesting=3;}
		else if (!GeneralGetVars::$var2){
			self::$enable=1;
			self::$name1="Статьи от TAZTEAM";
			self::$title="Статьи от mapstore.org/my_portfolio/tazteam.net.";
			self::$url="news/news___1";
			self::$nesting=1;}}














	else if (GeneralGetVars::$var1=="video") {
		if ((GeneralGetVars::$var2)&&(GeneralGetVars::$var3)) {

			$query="SELECT id,video_name FROM video WHERE id='".GeneralGetVars::$var3."' AND themepage='".GeneralGetVars::$var2."' LIMIT 1";
			$res=GeneralMYSQL::query($MSQLc,$query);
			$row=GeneralMYSQL::fetch_array($res);
			if ($row['id']>0)	{//если тема есть
				self::$enable=1;
				self::$name1="Видео";
				if (GeneralGetVars::$var2==1) {
					self::$name2="Обзор и тест-драйв";
					self::$title=self::$name2;
					}
				else if (GeneralGetVars::$var2==2) {
					self::$name2="Экстремальное вождение";
					self::$title=self::$name2;
					}
				else if (GeneralGetVars::$var2==3) {
					self::$name2="Тюнинг";
					self::$title=self::$name2;
					}
				else if (GeneralGetVars::$var2==999) {
					self::$name2="Прочее";
					self::$title=self::$name2;
					}
				}
			GeneralMYSQL::free($res);
			self::$url="video/video___3";
			self::$nesting=2;}
		else if ((!GeneralGetVars::$var2)&&(!GeneralGetVars::$var3)){
			self::$enable=1;
			self::$name1="Видео";
			self::$title="Видео на mapstore.org/my_portfolio/tazteam.net.";
			self::$url="video/video___1";
			self::$nesting=1;}}


	else if (GeneralGetVars::$var1=="vote") {
		if ((GeneralGetVars::$var2)&&(GeneralGetVars::$num_page>0)) {
			GeneralPageBasic::uncode_page(GeneralGetVars::$var2);
			if (GeneralPageBasic::$code_sign=="ga"){//галерея
				$query="SELECT id_photo FROM photo___photos_".GeneralPageBasic::$code_section." WHERE id_topic='".GeneralPageBasic::$code_topic."' AND id_photo='".GeneralPageBasic::$code_idphoto."' LIMIT 1";
				$res=GeneralMYSQL::query($MSQLc,$query);
				$row=GeneralMYSQL::fetch_array($res);
				GeneralMYSQL::free($res);
				if ($row['id_photo']>0)	{//если фото есть
					self::$name1="Оценили фото";
					self::$name2="Авто участников";
					self::$title="Оценили фото. ".self::$name2.".";
					self::$enable=1;
					self::$nesting=1;
					self::$url="vote/vote___1";}}
			else if (GeneralPageBasic::$code_sign=="sf"){//фотоальбомы
				$query="
				SELECT id_photo
				FROM registrated_users___photoalbums_photos
				WHERE id_user='".GeneralPageBasic::$code_section."'
				AND id_album='".GeneralPageBasic::$code_topic."'
				AND id_photo='".GeneralPageBasic::$code_idphoto."'
				LIMIT 1";

				$res=GeneralMYSQL::query($MSQLc,$query);
				$row=GeneralMYSQL::fetch_array($res);
				GeneralMYSQL::free($res);

				if ($row['id_photo']>0)	{//если фото есть
					self::$name1="Оценили фото";
					self::$name2="Фотоальбомы";
					self::$title="Оценили фото. ".self::$name2.".";
					self::$enable=1;
					self::$nesting=1;
					self::$url="vote/vote___1";}}}}


	else if (GeneralGetVars::$var1=="users") {
		if (GeneralGetVars::$var3) {
			if (GeneralGetVars::$var3=="photoalbums"){
				 if ((GeneralGetVars::$var4>0)&&(GeneralGetVars::$num_page>0)){//если конкретное фото
					$query="
					SELECT
						ru.gen_login_user as gen_login_user,
						ru.site_mail_user as site_mail_user,
						ru.gen_name_user as gen_name_user,
						ru.gen_surname_user as gen_surname_user,
						ru.site_login_status as site_login_status,
						pa.id_album as id_album,
						pa.name_album as name_album
					FROM registrated_users___photoalbums pa

					LEFT JOIN
						registrated_users___main_data ru
					ON
						pa.id_user=ru.id_user

					WHERE pa.id_user='".GeneralGetVars::$var2."' AND pa.id_album='".GeneralGetVars::$var4."'
					LIMIT 1";//ищем - есть ли в списке фоток такой альбом
					$res=GeneralMYSQL::query($MSQLc,$query);
					$row=GeneralMYSQL::fetch_array($res);
					UsersPhotoalbumsBase::detect_id_photo_page_by_num_page($MSQLc,0);//ищем - есть ли фотка с таким номером страницы num_page
					if (($row['id_album']>0)&&(UsersPhotoalbumsBase::$id_photo_page>0))	{//если тема есть и фото есть
						self::$name1="Участники";
						self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
						self::$name3="Фотоальбом";
						self::$name4=$row['name_album'];
						self::$title=self::$name2.". ".self::$name3.". ".self::$name4." - фото ".GeneralGetVars::$num_page;
						self::$enable=1;}
					GeneralMYSQL::free($res);
					self::$url="users/users___3_photoalbums_3";
					self::$nesting=3;}
				else if (GeneralGetVars::$num_page>0){//если список фотоальбомов - покажем - есть они или нет - все равно
					$query="SELECT
						gen_login_user,
						site_mail_user,
						gen_name_user,
						gen_surname_user,
                        site_login_status,
						id_user
						FROM registrated_users___main_data WHERE id_user='".GeneralGetVars::$var2."' LIMIT 1";
					$res=GeneralMYSQL::query($MSQLc,$query);
					$row=GeneralMYSQL::fetch_array($res);
					if ($row['id_user']>0)	{//если пользователь есть
						self::$name1="Участники";
						self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
						self::$name3="Фотоальбомы";
						self::$title=self::$name2.". ".self::$name3.".";
						self::$enable=1;}
						GeneralMYSQL::free($res);
						self::$url="users/users___3_photoalbums_2";
						self::$nesting=2;}

					}
			else if (GeneralGetVars::$var3=="allphotosinalbum"){
				if ((GeneralGetVars::$var4>0)&&(GeneralGetVars::$num_page>0)){//если на странице всех фото
					$query="
					SELECT
						ru.gen_login_user as gen_login_user,
						ru.site_mail_user as site_mail_user,
						ru.gen_name_user as gen_name_user,
						ru.gen_surname_user as gen_surname_user,
						ru.site_login_status as site_login_status,



						pa.id_user as id_user,
						pa.id_album as id_album,
						pa.name_album as name_album
					FROM registrated_users___photoalbums pa

					LEFT JOIN
						registrated_users___main_data ru
					ON
						pa.id_user=ru.id_user
					WHERE pa.id_user='".GeneralGetVars::$var2."' AND pa.id_album='".GeneralGetVars::$var4."'
					LIMIT 1";//ищем - есть ли в списке фоток такой альбом
					$res=GeneralMYSQL::query($MSQLc,$query);
					$row=GeneralMYSQL::fetch_array($res);
					//UsersPhotoalbumsBase::detect_id_photo_page_by_num_page($MSQLc,0);//ищем - есть ли фотка с таким номером страницы num_page
					if ($row['name_album'])	{//если тема есть
						self::$name1="Участники";
						self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
						self::$name3="Фотоальбом";
						self::$name4=$row['name_album'];


						self::$title=self::$name2.". ".self::$name3.". ".self::$name4;

						self::$autor=$row['id_user'];
						self::$enable=1;}
					GeneralMYSQL::free($res);
					self::$url="users/users___3_photoalbums_3_allphotos";
					self::$nesting=3;}}

			else if (GeneralGetVars::$var3=="redactavatar"){
				$query="SELECT
							gen_login_user,
							site_mail_user,
							gen_name_user,
							gen_surname_user,
							site_login_status,
							id_user
							FROM registrated_users___main_data WHERE id_user='".GeneralGetVars::$var2."' LIMIT 1";
				$res=GeneralMYSQL::query($MSQLc,$query);
				$row=GeneralMYSQL::fetch_array($res);
				if ($row['id_user']>0)	{//если пользователь есть
					self::$enable=1;
					self::$name1="Участники";
					self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
					self::$title=self::$name2.". Редактирование фотографии.";
					}
				GeneralMYSQL::free($res);
				self::$url="users/users___2_redactavatar";
				self::$nesting=2;}


			else if (GeneralGetVars::$var3=="friends"){
				$query="SELECT
							gen_login_user,
							site_mail_user,
							gen_name_user,
							gen_surname_user,
							site_login_status,
							id_user
							FROM registrated_users___main_data WHERE id_user='".GeneralGetVars::$var2."' LIMIT 1";
				$res=GeneralMYSQL::query($MSQLc,$query);
				$row=GeneralMYSQL::fetch_array($res);
				if ($row['id_user']>0)	{//если пользователь есть
					self::$enable=1;
					self::$name1="Участники";
					self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
					self::$title=self::$name2.". Друзья.";
					}
				GeneralMYSQL::free($res);
				self::$url="users/users___2_friends";
				self::$nesting=2;}



			else if (GeneralGetVars::$var3=="dialogs"){
				if(GeneralGetVars::$var2==UsersMyData::$id){//если мы на своей странице
					if (GeneralGetVars::$var4){//если мы на своей странице переписки
						$query="SELECT
									gen_login_user,
									site_mail_user,
									gen_name_user,
									gen_surname_user,
									site_login_status,
									id_user,
									(SELECT db FROM registrated_users___correspondence_table WHERE id_correspondence='".GeneralGetVars::$var4."' AND ((id_user1='".UsersMyData::$id."' OR id_user1='-".UsersMyData::$id."' OR id_user2='".UsersMyData::$id."' OR id_user2='-".UsersMyData::$id."')) LIMIT 1) as corenable
									FROM registrated_users___main_data WHERE id_user='".GeneralGetVars::$var2."' LIMIT 1";
						$res=GeneralMYSQL::query($MSQLc,$query);
						$row=GeneralMYSQL::fetch_array($res);
						if (($row['id_user']>0)&&($row['corenable']>0))	{//если пользователь есть и мы есть в этой переписке
							self::$enable=1;
							self::$name1="Участники";
							self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
							self::$title="Диалоги.";
							}
						GeneralMYSQL::free($res);
						self::$url="users/users___3_dialogs";
						self::$othervar1=2;
						self::$nesting=2;}
					else if (GeneralGetVars::$num_page>0){//если мы на странице своих диалогов
						$query="SELECT
									gen_login_user,
									site_mail_user,
									gen_name_user,
									gen_surname_user,
									site_login_status,
									id_user
									FROM registrated_users___main_data WHERE id_user='".GeneralGetVars::$var2."' LIMIT 1";
						$res=GeneralMYSQL::query($MSQLc,$query);
						$row=GeneralMYSQL::fetch_array($res);
						if ($row['id_user']>0)	{//если пользователь есть
							self::$enable=1;
							self::$name1="Участники";
							self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
							self::$title="Диалоги.";
						}
						GeneralMYSQL::free($res);
						self::$url="users/users___2_dialogs";
						self::$nesting=2;}}
				else{//если мы на странице другого пользователя
					if ((!GeneralGetVars::$var4)&&(!GeneralGetVars::$num_page)){//на странице "написать сообщение" у пользователя
					//не наша страница, нет номера диалога и нет номера страницы
						$query="SELECT
									gen_login_user,
									site_mail_user,
									gen_name_user,
									gen_surname_user,
									site_login_status,
									id_user
									FROM registrated_users___main_data WHERE id_user='".GeneralGetVars::$var2."' LIMIT 1";
						$res=GeneralMYSQL::query($MSQLc,$query);
						$row=GeneralMYSQL::fetch_array($res);
						if ($row['id_user']>0)	{//если пользователь есть
							self::$enable=1;
							self::$name1="Участники";
							self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
							self::$title="Диалоги.";
						}
						GeneralMYSQL::free($res);
						self::$url="users/users___3_dialogs";
						self::$othervar1=1;
						self::$nesting=2;}}
				}





			else if (GeneralGetVars::$var3=="redactpassword"){
				$query="SELECT
					gen_login_user,
					site_mail_user,
					gen_name_user,
					gen_surname_user,
					site_login_status,
					id_user
					FROM registrated_users___main_data WHERE id_user='".GeneralGetVars::$var2."' LIMIT 1";
				$res=GeneralMYSQL::query($MSQLc,$query);
				$row=GeneralMYSQL::fetch_array($res);
				if ($row['id_user']>0)	{//если пользователь есть
					self::$enable=1;
					self::$name1="Участники";
					self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
					self::$title="Сменить пароль.";
				}
				GeneralMYSQL::free($res);
				self::$url="users/users___2_redactpassword";
				self::$nesting=2;
				}


			else if (GeneralGetVars::$var3=="mythemes"){
				$query="SELECT
					gen_login_user,
					site_mail_user,
					gen_name_user,
					gen_surname_user,
					site_login_status,
					id_user
					FROM registrated_users___main_data WHERE id_user='".GeneralGetVars::$var2."' LIMIT 1";
				$res=GeneralMYSQL::query($MSQLc,$query);
				$row=GeneralMYSQL::fetch_array($res);
				if ($row['id_user']>0)	{//если пользователь есть
					self::$enable=1;
					self::$name1="Участники";
					self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
					self::$title="Создано мной.";
				}
				GeneralMYSQL::free($res);
				self::$url="users/users___2_mythemes";
				self::$nesting=2;
				}




			else if (GeneralGetVars::$var3=="signatures"){
				$query="SELECT
					gen_login_user,
					site_mail_user,
					gen_name_user,
					gen_surname_user,
					site_login_status,
					id_user
					FROM registrated_users___main_data WHERE id_user='".GeneralGetVars::$var2."' LIMIT 1";
				$res=GeneralMYSQL::query($MSQLc,$query);
				$row=GeneralMYSQL::fetch_array($res);
				if ($row['id_user']>0)	{//если пользователь есть
					self::$enable=1;
					self::$name1="Участники";
					self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
					self::$title="Оповещения.";
				}
				GeneralMYSQL::free($res);
				self::$url="users/users___2_signatures";
				self::$nesting=2;
				}











			else if (GeneralGetVars::$var3=="mytalks"){
				$query="SELECT
					gen_login_user,
					site_mail_user,
					gen_name_user,
					gen_surname_user,
					site_login_status,
					id_user
					FROM registrated_users___main_data WHERE id_user='".GeneralGetVars::$var2."' LIMIT 1";
				$res=GeneralMYSQL::query($MSQLc,$query);
				$row=GeneralMYSQL::fetch_array($res);
				if ($row['id_user']>0)	{//если пользователь есть
					self::$enable=1;
					self::$name1="Участники";
					self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
					self::$title="Обсуждения.";
				}
				GeneralMYSQL::free($res);
				self::$url="users/users___2_mytalks";
				self::$nesting=2;
				}





				}
		else if (GeneralGetVars::$var2) {
			$query="SELECT
						gen_login_user,
						site_mail_user,
						gen_name_user,
						gen_surname_user,
						site_login_status,
						id_user
						FROM registrated_users___main_data WHERE id_user='".GeneralGetVars::$var2."' LIMIT 1";
			$res=GeneralMYSQL::query($MSQLc,$query);
			$row=GeneralMYSQL::fetch_array($res);
			if ($row['id_user']>0)	{//если пользователь есть
				self::$enable=1;
				self::$name1="Участники";
				self::$name2=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
				self::$title=self::$name2;
			}
			GeneralMYSQL::free($res);
			self::$url="users/users___2";
			self::$nesting=2;}

		else {
			self::$enable=1;
			self::$name1="Участники";
			self::$title="Участники mapstore.org/my_portfolio/tazteam.net.";
			self::$url="users/users___1";
			self::$nesting=1;}}







	else if (GeneralGetVars::$var1=="calculator") {
		self::$name1="Калькулятор";
		self::$name2="";
		self::$title=self::$name1;
		self::$enable=1;
		self::$nesting=1;
		self::$url="calculator/calculator___1";}



	else if (GeneralGetVars::$var1=="games") {
		self::$name1="Игры";
		self::$name2="";
		self::$title=self::$name1;
		self::$enable=1;
		self::$nesting=1;
		self::$url="games/games___1";}


	else if (GeneralGetVars::$var1=="shop") {
		self::$name1="TAZTEAM SHOP";
		self::$name2="";
		self::$title=self::$name1;
		self::$enable=1;
		self::$nesting=1;
		self::$url="shop/shop___1";}


	else if (GeneralGetVars::$var1=="chat") {
		self::$name1="Чат";
		self::$name2="";
		self::$title=self::$name1;
		self::$enable=1;
		self::$nesting=1;
		self::$url="chat/chat___1";}






self::$keywords.='ваз турбина компрессор двигатель тюнинг винил чип-тюнинг турбо автозвук магнитола гонки обзор';//ключевые слова для поисковиков
}















static function show_additional(){
if (self::$enable==1){
/*привязка 1 от галереи*/
if ((GeneralGetVars::$var1=="photo")&&(GeneralGetVars::$var2==1)&&(!GeneralGetVars::$var3)){
	$text="<li>".self::$name2."</li>"; return($text);}
else if ((GeneralGetVars::$var1=="photo")&&(GeneralGetVars::$var2==1)&&(GeneralGetVars::$var3)){
	$text="<li><a href=\"".GeneralGlobalVars::url."/photo/1=1\">".self::$name2."</a></li>"; return($text);}



else if ((GeneralGetVars::$var1=="vote")&&(GeneralGetVars::$var2)){
	$text="<li>".self::$name1."</li><span class=\"divider\">/</span><li>".self::$name2."</li>"; return($text);}







	if (GeneralGetVars::$var1){//для всех страниц, кроме главной
		if ((GeneralGetVars::$var2)&&(GeneralGetVars::$var3)&&(GeneralGetVars::$var1!="news")&&(GeneralGetVars::$var1!="articles")) {//если три переменные
			$text="<li><a href=\"".GeneralGlobalVars::url."/".GeneralGetVars::$var1."\">".self::$name1."</a></li>";

			if ((GeneralGetVars::$var1=="video")||(GeneralGetVars::$var1=="automarket")||(GeneralGetVars::$var1=="garage")){
				$text.="<span class=\"divider\">/</span><li><a href=\"".GeneralGlobalVars::url."/".GeneralGetVars::$var1."\">".self::$name2."</a></li>";}
			else {
				$text.="<span class=\"divider\">/</span><li><a href=\"".GeneralGlobalVars::url."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."\">".self::$name2."</a></li>";}

		}
		else if ((GeneralGetVars::$var2)&&((!GeneralGetVars::$var3)||(GeneralGetVars::$var1=="automarket")||(GeneralGetVars::$var1=="garage")||(GeneralGetVars::$var1=="news")||(GeneralGetVars::$var1=="articles"))) {//если только две переменные
			$text="<li><a href=\"".GeneralGlobalVars::url."/".GeneralGetVars::$var1."\">".self::$name1."</a></li>";
			$text.="<span class=\"divider\">/</span><li>".self::$name2."</li>";
		}
		else if ((!GeneralGetVars::$var2)&&(!GeneralGetVars::$var3)){//если только одна переменная
			$text="<li>".self::$name1."</li>";
		}
	}
	else	{//для главной страницы
		$text="<li>".self::$name1."</li>";
	}
	return($text);
}}












static function show(){
if (self::$enable==1){
/*привязка 1 от галереи*/
if ((GeneralGetVars::$var1==="photo")&&(!GeneralGetVars::$var3)){
	$text=self::$name2; return($text);}

else if ((GeneralGetVars::$var1==="photo")&&(GeneralGetVars::$var3)){
	$text="<a href=\"".GeneralGlobalVars::url."/photo/".GeneralGetVars::$var2."=1\">".self::$name2."</a>"; return($text);}













else if ((GeneralGetVars::$var1==="vote")&&(GeneralGetVars::$var2)){
	$text=self::$name1." / ".self::$name2.""; return($text);}



else if (GeneralGetVars::$var1==="calculator"){
	$text=self::$name1; return($text);}

else if (GeneralGetVars::$var1==="tests"){
	$text=self::$name1." / ПДД"; return($text);}

else if (GeneralGetVars::$var1==="games"){
	$text=self::$name1; return($text);}
else if (GeneralGetVars::$var1==="shop"){
	$text=self::$name1; return($text);}
else if (GeneralGetVars::$var1==="chat"){
	$text=self::$name1; return($text);}






	if (GeneralGetVars::$var1){//для всех страниц, кроме главной
		if ((GeneralGetVars::$var2)&&(GeneralGetVars::$var3)&&(GeneralGetVars::$var1!=="news")&&(GeneralGetVars::$var1!=="articles")) {//если три переменные
			$text="<a href=\"".GeneralGlobalVars::url."/".GeneralGetVars::$var1."\">".self::$name1."</a>";


			if ((GeneralGetVars::$var1==="video")||(GeneralGetVars::$var1==="automarket")||(GeneralGetVars::$var1==="garage")){
				$text.="<span class=\"divider\"> / </span><a href=\"".GeneralGlobalVars::url."/".GeneralGetVars::$var1."\">".self::$name2."</a>";}
			else {
				$text.="<span class=\"divider\"> / </span><a href=\"".GeneralGlobalVars::url."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."\">".self::$name2."</a>";}







		}
		else if ((GeneralGetVars::$var2)&&((!GeneralGetVars::$var3)||(GeneralGetVars::$var1==="automarket")||(GeneralGetVars::$var1==="garage")||(GeneralGetVars::$var1==="news")||(GeneralGetVars::$var1==="articles"))) {//если только две переменные
			$text="<a href=\"".GeneralGlobalVars::url."/".GeneralGetVars::$var1."\">".self::$name1."</a><span class=\"divider\"> / </span>";
			$text.=self::$name2;
		}
		else if ((!GeneralGetVars::$var2)&&(!GeneralGetVars::$var3)){//если только одна переменная
			$text=self::$name1;
		}
	}
	else	{//для главной страницы
		$text=self::$name1;
	}
	return($text);
}}



}
//GeneralPageTree::setvars($MSQLc);//глобальные переменные дерева сайта (наличие страницы, адрес страницы по названиям)
?>
