<?php
$start=microtime(1);//для проверки скорости//////////////////////////////////////
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require("data/models/_general/GetVars.php");//проверка входящих GET-переменных
require("data/models/_general/GlobalVars.php");//библиотека глобальных переменных сервера
require("data/models/_general/MySQL.php");//функции и глобальные переменные MySQL
require("data/models/_general/PageBasic.php");//базовая библиотека для работы внешне со страницей
require("data/models/_general/Security.php");//базовая библиотека работы с введенными данными
require("data/models/_general/Cookies.php");//базовая библиотека работы с куками
require("data/models/_general/UserName.php");//показывает имена пользоватетелей (работает быстрее sql-функции в 4 раза)
require("data/models/users/MyData.php");//базовая библиотека работы с Вами
include("data/models/users/Signaturing.php");//базовая библиотека работы с оповещениями
require("data/models/_general/HeaderHTTP.php");//базовая библиотека работы с заголовками http
require("data/models/_general/PageTree.php");//проверка на существование страницы и в случае существования - определение "дерева" нахождения страницы
require("data/models/_general/UploadBasic.php");//базовая библиотека работы с загружаемыми файлами
require("data/models/_general/PagesCounter.php");
//require("data/models/_general/Cache.php");//базовая библиотека кеширования

GeneralPageBasic::$pagestatus="submit";//вспомогательная переменная (статус - отправка или нет)




if ($_POST['submit']=="user_registration"){
	include("data/models/users/Mail.php");}//базовая библиотека работы с почтой
else if ($_POST['submit']=="user_enter"){}
else if ($_POST['submit']=="sendforummess"){
	include("data/models/users/Forreg.php");	
	include("data/models/forum/SendMessage.php");
	include("data/models/forum/Forreg.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами
else if ($_POST['submit']=="redactforummess"){
	include("data/models/forum/SendMessage.php");
	include("data/models/forum/Forreg.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами
else if ($_POST['submit']=="deleteforummess"){	
	include("data/models/forum/SendMessage.php");
	include("data/models/forum/Forreg.php");
	//include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами	

else if ($_POST['submit']=="deleteforumtopic"){	
	include("data/models/forum/SendTopic.php");
	//include("data/models/forum/SendMessage.php");
	include("data/models/forum/Forreg.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	//include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами
    
else if ($_POST['submit']=="find_forum"){}

else if ($_POST['submit']=="clearfindforum"){}






    	
else if ($_POST['submit']=="sendforumtopic"){
	include("data/models/users/Forreg.php");
	include("data/models/forum/SendTopic.php");
	include("data/models/forum/SendMessage.php");
	include("data/models/forum/Forreg.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами
else if ($_POST['submit']=="sendphototopic"){	
	include("data/models/photo/SendTopic.php");
	include("data/models/photo/Forreg.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами
else if ($_POST['submit']=="redactphotoinphoto"){	
	include("data/models/photo/Forreg.php");
	include("data/models/photo/SendPhoto.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами	
else if ($_POST['submit']=="deletephotophoto"){	
	include("data/models/photo/Forreg.php");
	include("data/models/photo/SendPhoto.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами	
else if ($_POST['submit']=="sendnewphotoinphoto"){	
	include("data/models/photo/Forreg.php");
	include("data/models/photo/SendPhoto.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами	
else if ($_POST['submit']=="deletephototopic"){	
	//include("data/models/photo/Forreg.php");
	include("data/models/photo/SendTopic.php");
	//include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	//include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами		
else if ($_POST['submit']=="detectthemepagefornewautomarket"){
	include("data/models/automarket/Forreg.php");}
else if ($_POST['submit']=="sendnewautomarketannouncement"){
	include("data/models/automarket/Forreg.php");
	include("data/models/automarket/SendTopic.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами		
else if ($_POST['submit']=="redactautomarketannouncement"){
	include("data/models/automarket/Forreg.php");
	include("data/models/automarket/SendTopic.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами	
else if ($_POST['submit']=="deleteautomarketannouncement"){
	include("data/models/automarket/Forreg.php");
	include("data/models/automarket/SendTopic.php");
	//include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	//include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами		
else if ($_POST['submit']=="find_automarket_auto"){}
else if ($_POST['submit']=="find_automarket_else"){}
else if ($_POST['submit']=="find_automarket_else_buy"){}
else if ($_POST['submit']=="clearfindautomarket"){}



else if ($_POST['submit']=="automarket_sort_by_taz"){}

else if ($_POST['submit']=="automarket_sort_by_auto"){}
else if ($_POST['submit']=="automarket_sort_by_else"){}
else if ($_POST['submit']=="automarket_sort_by_buy"){}



else if ($_POST['submit']=="automarket_order_by_price"){}
else if ($_POST['submit']=="automarket_order_by_year"){}
else if ($_POST['submit']=="automarket_order_by_run"){}
else if ($_POST['submit']=="automarket_order_by_power"){}
else if ($_POST['submit']=="automarket_order_by_date"){}











			

else if ($_POST['submit']=="sendnewgarageannouncement"){
	include("data/models/garage/Forreg.php");
	include("data/models/garage/SendTopic.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами		
else if ($_POST['submit']=="redactgarageannouncement"){
	include("data/models/garage/Forreg.php");
	include("data/models/garage/SendTopic.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами	
else if ($_POST['submit']=="deletegarageannouncement"){
	include("data/models/garage/Forreg.php");
	include("data/models/garage/SendTopic.php");
	//include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	//include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами		
else if ($_POST['submit']=="find_garage_auto"){}

else if ($_POST['submit']=="clearfindgarage"){}








else if ($_POST['submit']=="find_news"){}
else if ($_POST['submit']=="clearfindnews"){}
else if ($_POST['submit']=="redactnews"){
	include("data/models/news/Forreg.php");
	include("data/models/news/SendTopic.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами	
else if ($_POST['submit']=="deletenews"){	
	include("data/models/news/Forreg.php");
	include("data/models/news/SendTopic.php");
	//include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	//include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами	

else if ($_POST['submit']=="detectthemepagefornewnews"){
	include("data/models/news/Forreg.php");}
else if ($_POST['submit']=="sendnewnews"){
	include("data/models/news/Forreg.php");
	include("data/models/news/SendTopic.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами	

else if ($_POST['submit']=="find_users"){}
else if ($_POST['submit']=="clearfindusers"){}	
	
	
else if ($_POST['submit']=="sendnewphotoinusersphotoalbum"){	
	include("data/models/users/Forreg.php");
	include("data/models/users/SendPhotoalbumsPhoto.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами		
	
else if ($_POST['submit']=="redactphotoinusersphotoalbum"){	
	include("data/models/users/Forreg.php");
	include("data/models/users/SendPhotoalbumsPhoto.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами		
	
else if ($_POST['submit']=="deletephotousersphotoalbum"){	
	include("data/models/users/Forreg.php");
	include("data/models/users/SendPhotoalbumsPhoto.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами		
	
	
else if ($_POST['submit']=="deleteusersphotoalbum"){
	//include("data/models/photo/Forreg.php");
	include("data/models/users/SendPhotoalbumsTopic.php");
	//include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	//include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений	
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами		
	
else if ($_POST['submit']=="sendusersphotoalbum"){	
	include("data/models/users/SendPhotoalbumsTopic.php");
	include("data/models/users/SendPhotoalbumsPhoto.php");	
	include("data/models/users/Forreg.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами	

else if ($_POST['submit']=="users_photoalbums_sort_by_my"){}		
else if ($_POST['submit']=="users_photoalbums_sort_by_friends"){}		
else if ($_POST['submit']=="users_photoalbums_sort_by_another"){}		

else if ($_POST['submit']=="usersupdatefromsnnothanks"){
	include("data/models/users/Forreg.php");}	
	
else if ($_POST['submit']=="sendusersselfdata"){
	include("data/models/users/Forreg.php");}	
	
else if ($_POST['submit']=="sendusersavatar"){
	include("data/models/users/Forreg.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами		
else if ($_POST['submit']=="cropusersavatar"){
	include("data/models/users/Forreg.php");
	include("data/models/_general/ImagesUpload.php");
	include("data/models/_general/ImagesWork.php");//базовая библиотека работы с изображениями
	include("data/models/_general/ImagesCalculate.php");//базовая библиотека вычислений параметров изображений
	include("data/models/_general/Files.php");}//базовая библиотека работы с файлами		
else if ($_POST['submit']=="users_friends_sort_by_friends"){
	include("data/models/users/Friends.php");}	
else if ($_POST['submit']=="users_friends_sort_by_friendsonline"){
	include("data/models/users/Friends.php");}		
else if ($_POST['submit']=="users_friends_sort_by_friendsin"){
	include("data/models/users/Friends.php");}		
else if ($_POST['submit']=="users_friends_sort_by_friendsout"){
	include("data/models/users/Friends.php");}		
	
else if ($_POST['submit']=="find_users_friends"){
	include("data/models/users/Friends.php");}			
else if ($_POST['submit']=="clearfindusers_friends"){
	include("data/models/users/Friends.php");}
	
	
	
else if ($_POST['submit']=="userstofriends"){
	include("data/models/users/Friends.php");}	
else if ($_POST['submit']=="usersdelfromfriends"){
	include("data/models/users/Friends.php");}	
else if ($_POST['submit']=="usersdelhetofriends"){
	include("data/models/users/Friends.php");}	
else if ($_POST['submit']=="usersdeltohimfriends"){
	include("data/models/users/Friends.php");}
else if ($_POST['submit']=="usersaddhetofriends"){
	include("data/models/users/Friends.php");}	
	
	
	
else if ($_POST['submit']=="users_dialogs_sort_by_nodeleted"){
	include("data/models/users/Dialogs.php");}		
else if ($_POST['submit']=="users_dialogs_sort_by_deleted"){
	include("data/models/users/Dialogs.php");}		
	
	
	
else if ($_POST['submit']=="usersdeletedialog"){
	include("data/models/users/Dialogs.php");}		
else if ($_POST['submit']=="usersrestoredialog"){
	include("data/models/users/Dialogs.php");}	
	
else if ($_POST['submit']=="sendusersnewpassword"){
	include("data/models/users/Forreg.php");
	include("data/models/users/Mail.php");}	

	
	
else if ($_POST['submit']=="user_unreg_repassword_mail"){
	include("data/models/users/Mail.php");
	include("data/models/users/Base.php");}

else if ($_POST['submit']=="find_users_vote"){}

else if ($_POST['submit']=="clearfindusers_vote"){}		
	

	
	
else if ($_POST['submit']=="users_signatures_clear"){
	include("data/models/users/Forreg.php");}	
else if ($_POST['submit']=="users_mytalks_clear"){
	include("data/models/users/Forreg.php");}	
else if ($_POST['submit']=="users_wall_clear"){
	include("data/models/users/Forreg.php");}	
	
	
	
	
	
	
	
	
$MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root
//mysqli_query($MSQLc,'SET NAMES UTF8');//на время
GeneralGetVars::revision($MSQLc);
GeneralGetVars::save_page_url_in_cookies();//потому что куки рядом с гет переменными видны только на одну перезагрузку, поэтому отдельно
GeneralGlobalVars::set();//устанавливаем глобальные переменные
if (GeneralGetVars::$var1){
	include_once("data/models/".GeneralGetVars::$var1."/Base.php");}//базовая библиотека для конкретной страницы
if ((GeneralGetVars::$var3==="photoalbums")||(GeneralGetVars::$var3==="allphotosinalbum")){
	include_once("data/models/".GeneralGetVars::$var1."/PhotoalbumsBase.php");}//базовая библиотека для конкретной страницы	
	
	
	
	
GeneralSecurity::cookiescontrol($MSQLc);//приверяем куки основных данных пользователя - имя, пароль и т.д.
GeneralSecurity::submitcontrol($MSQLc);
UsersMyData::identification($MSQLc);//предварительно проверяем - кто отправил запрос зарегистр пользователь или нет	
GeneralPageTree::setvars($MSQLc);//глобальные переменные дерева сайта (наличие страницы, адрес страницы по названиям)


if (GeneralPageTree::$enable==1){
	//GeneralMYSQL::starttransaction($MSQLc);//начинаем транзакцию
	//if (GeneralSecurity::$submitname=="find")				{1;}//ДЕЛАЕМ НА АЯКСЕ
	if (UsersMyData::$identified==0){//только для НЕидентифицированных	
		if (GeneralSecurity::$submitname=="user_registration")	{
			UsersMyData::registration($MSQLc);}
		else if (GeneralSecurity::$submitname=="user_enter"){
			UsersMyData::enter($MSQLc);}}
			
	else if (UsersMyData::$identified==1){//только для идентифицированных
		if (GeneralSecurity::$submitname=="quit"){
			UsersMyData::quit($MSQLc,$_COOKIE['UsersMyDataId']);}		
		else if (GeneralSecurity::$submitname=="sendforummess"){
			ForumSendMessage::send_message($MSQLc);}
		else if (GeneralSecurity::$submitname=="redactforummess"){
			ForumSendMessage::redact_message($MSQLc);}
		else if (GeneralSecurity::$submitname=="deleteforummess"){
			ForumSendMessage::delete_message($MSQLc);}
		else if (GeneralSecurity::$submitname=="sendforumtopic"){
			ForumSendTopic::new_topic($MSQLc);}
		else if (GeneralSecurity::$submitname=="deleteforumtopic"){
			ForumSendTopic::delete_topic($MSQLc);}
    	else if (GeneralSecurity::$submitname=="find_forum"){
    		ForumBase::set_cookies_find();}
            
    	else if (GeneralSecurity::$submitname=="clearfindforum"){
            ForumBase::clear_find();}   
            
		else if (GeneralSecurity::$submitname=="sendphototopic"){
			PhotoSendTopic::new_topic($MSQLc);}			
		else if (GeneralSecurity::$submitname=="redactphotoinphoto"){
			PhotoSendPhoto::redact_photo($MSQLc);}			
		else if (GeneralSecurity::$submitname=="deletephotophoto"){
			PhotoSendPhoto::delete_photo($MSQLc);}			
		else if (GeneralSecurity::$submitname=="sendnewphotoinphoto"){
			PhotoSendPhoto::new_photo($MSQLc);}				
		else if (GeneralSecurity::$submitname=="deletephototopic"){
			PhotoSendTopic::delete_topic($MSQLc);}				
		else if (GeneralSecurity::$submitname=="detectthemepagefornewautomarket"){
			AutomarketForreg::go_to_page_new_announcement();}			
		else if (GeneralSecurity::$submitname=="sendnewautomarketannouncement"){
			AutomarketSendTopic::new_announcement($MSQLc);}			
		else if (GeneralSecurity::$submitname=="redactautomarketannouncement"){
			AutomarketSendTopic::redact_announcement($MSQLc);}				
		else if (GeneralSecurity::$submitname=="deleteautomarketannouncement"){
			AutomarketSendTopic::delete_announcement($MSQLc);}
            
            
            
            
            
		else if (GeneralSecurity::$submitname=="sendnewgarageannouncement"){
			GarageSendTopic::new_announcement($MSQLc);}			
		else if (GeneralSecurity::$submitname=="redactgarageannouncement"){
			GarageSendTopic::redact_announcement($MSQLc);}				
		else if (GeneralSecurity::$submitname=="deletegarageannouncement"){
			GarageSendTopic::delete_announcement($MSQLc);}            
            
            
            
            
            
		else if (GeneralSecurity::$submitname=="detectthemepagefornewnews"){
			NewsForreg::go_to_page_new_news();}
		else if (GeneralSecurity::$submitname=="sendnewnews"){
			NewsSendTopic::new_news($MSQLc);}
		else if (GeneralSecurity::$submitname=="redactnews"){
			NewsSendTopic::redact_news($MSQLc);}
		else if (GeneralSecurity::$submitname=="deletenews"){
			NewsSendTopic::delete_news($MSQLc);}

		else if (GeneralSecurity::$submitname=="sendnewphotoinusersphotoalbum"){
			UsersSendPhotoalbumsPhoto::new_photo($MSQLc);}				
			
		else if (GeneralSecurity::$submitname=="redactphotoinusersphotoalbum"){
			UsersSendPhotoalbumsPhoto::redact_photo($MSQLc);}					
		else if (GeneralSecurity::$submitname=="deletephotousersphotoalbum"){
			UsersSendPhotoalbumsPhoto::delete_photo($MSQLc);}				
			
		else if (GeneralSecurity::$submitname=="deleteusersphotoalbum"){
			UsersSendPhotoalbumsTopic::delete_topic($MSQLc);}				
			
		else if (GeneralSecurity::$submitname=="sendusersphotoalbum"){
			UsersSendPhotoalbumsTopic::new_topic($MSQLc);}				
			
		else if (GeneralSecurity::$submitname=="usersupdatefromsnnothanks"){
			UsersForreg::updatefromsnnothanks($MSQLc);}			

		else if (GeneralSecurity::$submitname=="sendusersselfdata"){
			UsersForreg::sendselfdata($MSQLc);}
			
		else if (GeneralSecurity::$submitname=="sendusersavatar"){
			UsersForreg::sendavatar($MSQLc);}			
		else if (GeneralSecurity::$submitname=="cropusersavatar"){
			UsersForreg::cropavatar($MSQLc);}				

		else if (GeneralSecurity::$submitname=="users_friends_sort_by_friends"){
			UsersFriends::set_cookies_sort_by_friends();}
		else if (GeneralSecurity::$submitname=="users_friends_sort_by_friendsonline"){
			UsersFriends::set_cookies_sort_by_friends_online();}
		else if (GeneralSecurity::$submitname=="users_friends_sort_by_friendsin"){
			UsersFriends::set_cookies_sort_by_friends_in();}			
		else if (GeneralSecurity::$submitname=="users_friends_sort_by_friendsout"){
			UsersFriends::set_cookies_sort_by_friends_out();}			

			
			
			
			
			
			
		else if (GeneralSecurity::$submitname=="userstofriends"){
			UsersFriends::addtofriends($MSQLc);}			
		else if (GeneralSecurity::$submitname=="usersdelfromfriends"){
			UsersFriends::deletefromfriends($MSQLc);}			
		else if (GeneralSecurity::$submitname=="usersdelhetofriends"){//убрать заявку
			UsersFriends::cancelheto($MSQLc);}			
		else if (GeneralSecurity::$submitname=="usersdeltohimfriends"){//отклонить заявку
			UsersFriends::canceltohim($MSQLc);}			
		else if (GeneralSecurity::$submitname=="usersaddhetofriends"){
			UsersFriends::confirmheto($MSQLc);}			
			}
			
			
			
			
			
			

	if (GeneralSecurity::$submitname=="find_automarket_auto"){//для любых пользователей
		AutomarketBase::set_cookies_find_auto($MSQLc);}					
	else if (GeneralSecurity::$submitname=="find_automarket_else"){
		AutomarketBase::set_cookies_find_else($MSQLc);}
	else if (GeneralSecurity::$submitname=="find_automarket_else_buy"){
		AutomarketBase::set_cookies_find_else_buy($MSQLc);}
	else if (GeneralSecurity::$submitname=="clearfindautomarket"){
		AutomarketBase::clear_find();}
	else if (GeneralSecurity::$submitname=="automarket_sort_by_taz"){
		AutomarketBase::set_cookies_sort_taz();}
	else if (GeneralSecurity::$submitname=="automarket_sort_by_auto"){
		AutomarketBase::set_cookies_sort_auto();}
	else if (GeneralSecurity::$submitname=="automarket_sort_by_else"){
		AutomarketBase::set_cookies_sort_else();}
	else if (GeneralSecurity::$submitname=="automarket_sort_by_buy"){
		AutomarketBase::set_cookies_sort_buy();}		
	
    
    
    
    
	if (GeneralSecurity::$submitname=="find_garage_auto"){//для любых пользователей
		GarageBase::set_cookies_find_auto($MSQLc);}					
	else if (GeneralSecurity::$submitname=="clearfindgarage"){
		GarageBase::clear_find();}    
    
    
    
    
    
    
    
    	
		
		
	else if (GeneralSecurity::$submitname=="find_news"){
		NewsBase::set_cookies_find();}			
	else if (GeneralSecurity::$submitname=="clearfindnews"){
		NewsBase::clear_find();}			
			
	else if (GeneralSecurity::$submitname=="find_users"){
		UsersBase::set_cookies_find();}			
	else if (GeneralSecurity::$submitname=="clearfindusers"){
		UsersBase::clear_find();}
		
			
			
	else if (GeneralSecurity::$submitname=="users_photoalbums_sort_by_my"){
		UsersPhotoalbumsBase::set_cookies_sort_photoalbums_by_my();}
	else if (GeneralSecurity::$submitname=="users_photoalbums_sort_by_friends"){
		UsersPhotoalbumsBase::set_cookies_sort_photoalbums_by_friends();}
	else if (GeneralSecurity::$submitname=="users_photoalbums_sort_by_another"){
		UsersPhotoalbumsBase::set_cookies_sort_photoalbums_by_another();}
			
	else if (GeneralSecurity::$submitname=="find_users_friends"){
		UsersFriends::set_cookies_find();}			
	else if (GeneralSecurity::$submitname=="clearfindusers_friends"){
		UsersFriends::clear_find();}			
			
			
	else if (GeneralSecurity::$submitname=="users_dialogs_sort_by_nodeleted"){
		UsersDialogs::set_cookies_sort_nodeleted();}
	else if (GeneralSecurity::$submitname=="users_dialogs_sort_by_deleted"){
		UsersDialogs::set_cookies_sort_deleted();}

		
		
	else if (GeneralSecurity::$submitname=="usersdeletedialog"){
		UsersDialogs::deletedialog($MSQLc);}		
	else if (GeneralSecurity::$submitname=="usersrestoredialog"){
		UsersDialogs::restoredialog($MSQLc);}			

	else if (GeneralSecurity::$submitname=="sendusersnewpassword"){
		UsersForreg::redactpassword($MSQLc);}			
	else if (GeneralSecurity::$submitname=="user_unreg_repassword_mail"){
		UsersBase::send_mail_for_redactpassword($MSQLc);}			

	else if (GeneralSecurity::$submitname=="find_users_vote"){
		VoteBase::set_cookies_find();}				
			
	else if (GeneralSecurity::$submitname=="clearfindusers_vote"){
		VoteBase::clear_find();}
		
		
	else if (GeneralSecurity::$submitname=="users_signatures_clear"){
		UsersForreg::signatures_clear($MSQLc);}		
	else if (GeneralSecurity::$submitname=="users_mytalks_clear"){
		UsersForreg::mytalks_clear($MSQLc);}		
	else if (GeneralSecurity::$submitname=="users_wall_clear"){
		UsersForreg::wall_clear($MSQLc);}
		
		
		
		
	else if (GeneralSecurity::$submitname=="video_sort_by_extrime"){
		VideoBase::set_cookies_sort_by_extrime();}		
	else if (GeneralSecurity::$submitname=="video_sort_by_drive"){
		VideoBase::set_cookies_sort_by_drive();}		
	else if (GeneralSecurity::$submitname=="video_sort_by_tuning"){
		VideoBase::set_cookies_sort_by_tuning();}
	else if (GeneralSecurity::$submitname=="video_sort_by_else"){
		VideoBase::set_cookies_sort_by_else();}

	
	else if (GeneralSecurity::$submitname=="automarket_order_by_price"){
		AutomarketBase::set_cookies_order_by_price();}
	else if (GeneralSecurity::$submitname=="automarket_order_by_year"){
		AutomarketBase::set_cookies_order_by_year();}
	else if (GeneralSecurity::$submitname=="automarket_order_by_run"){
		AutomarketBase::set_cookies_order_by_run();}
	else if (GeneralSecurity::$submitname=="automarket_order_by_power"){
		AutomarketBase::set_cookies_order_by_power();}
	else if (GeneralSecurity::$submitname=="automarket_order_by_date"){
		AutomarketBase::set_cookies_order_by_date();}
        
        
        
        
        
	}		
	//GeneralMYSQL::committransaction($MSQLc);//"запись" записей
	//GeneralMYSQL::startautocommittransaction($MSQLc);}//возвращаем транзакцию на прежнее место, если нужно будет что нибудь дописать




GeneralMYSQL::close($MSQLc);
//echo (round((microtime(1)-$start), 5)); //////////


GeneralGetVars::set_submit_vars();
//echo(GeneralGetVars::$urlfromsubmit)




if (UsersMyData::$id!=1){


}
GeneralHeaderHTTP::location(GeneralGetVars::$urlfromsubmit);


?>