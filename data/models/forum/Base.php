<?php   
class ForumBase{
    
static public $startnumbermessage=0;//стартовый номер сообщения в списке
static public $sqlmessagestablename="";//имя таблицы сообщений
static public $sqltopicstablename="";//имя таблицы тем
static public $id_autor_topic=0;//автор темы
static public $find_status=0;
static public $find_query="";

static public $array_sections=array();//массив разделов



//static public $array_messages_citates_images=array();//массив с данными всех сообщений на странице (цитата и приложенные фото)


/*static public function update_array_messages_citates_images($number,$valuecitate,$valuephoto){//обновляем массив с данными всех сообщений на странице (цитата и приложенные фото)
	if ($valuephoto) {$valuephoto=1;} else {$valuephoto=0;}
	if (!$valuecitate) {$valuecitate=0;}
	self::$array_messages_citates_images[$number]['citate']=$valuecitate;
	self::$array_messages_citates_images[$number]['citate']=$valuecitate;}*/


static public function detect_startnumbermessage(){//определяем начальный отсчет номера сообщения
self::$startnumbermessage=(GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage;}

static public function detect_autor_topic_3($curr_num_message,$id_autor_message){//определяем автора темы  по первому сообщению в forum___3.php
	//если пользователь зарегистрирован, то имеет смысл проверить его на авторство темы
	if (UsersMyData::$identified==1) {
		//если сообщение первое 
		if (ForumBase::$startnumbermessage==($curr_num_message-1)){ 
			ForumBase::$id_autor_topic=$id_autor_message;}}

}





static public function detectsqltable(){//вычисляем имя таблиц
	self::$sqlmessagestablename="forum___messages_".GeneralGetVars::$var2;	//сообщения текущего раздела
	self::$sqltopicstablename="forum___topics_".GeneralGetVars::$var2;}//темы текущего раздела

	


static public function display_images_in_message($textimages,$textimagessizes){//определяем фотографии в сообщении
	$textimagesarray=explode(" ",$textimages);	
	$textimagessizesarray=explode(" ",$textimagessizes);
	foreach($textimagesarray as $key=>$value){
		if ($value){
			$value=GeneralImagesCalculate::return_size_to_photo($value, 1, 2);//меняем размер фотки
			GeneralImagesCalculate::set_size_for_image_in_view($textimagessizesarray[$key],2);
			echo("<img src=\"http://mapstore.org/my_portfolio/tazteam.net/".GeneralGlobalVars::pathtofiles."/images/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3."/".$value."\" class=\"image_in_forum_message\" width=\"".GeneralImagesCalculate::$view_width."\" height=\"".GeneralImagesCalculate::$view_height."\">");}}}

			
			
			

			
			
			
			




static public function set_cookies_find(){		
	if ($_POST['name']){
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_query_name",$_POST['name']);
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_status",1);}
	else {
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_query_name",'');
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_status",0);}
	//GeneralGetVars::$num_page="";
	//GeneralGetVars::$var2=1;
	GeneralGetVars::$var3="";}


		

static public function 	clear_find(){//очищаем поиск		
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_query_name",'');			
		GeneralCookies::setglobal(GeneralGetVars::$var1."_find_status",'');}



static public function convert_cookie_find_query($MSQLc){//составляем из всех куков, которые есть
	if (isset($_COOKIE[GeneralGetVars::$var1.'_find_status'])){
		self::$find_status=$_COOKIE[GeneralGetVars::$var1.'_find_status'];
		if(self::$find_status==1){
			self::$find_query=GeneralSecurity::real_escape($MSQLc,$_COOKIE[GeneralGetVars::$var1."_find_query_name"]);				
			self::$find_query=GeneralSecurity::return_safe_outside_sql_query(self::$find_query);
		}}}







			
			
			
			

static public function detect_status_user_by_messages($messages,$id_user){//определяем статус пользователя на форуме по количеству его осообщений
	if ($id_user==1){
		return "он же";}
	if ($id_user==155){
		return "главный по \"тазам\"";}
	if ($messages<10){
		return "новичок";}
	if (($messages>=10)&&($messages<100)){
		return "бывалый";}	
	if (($messages>=100)&&($messages<500)){
		return "опытный тазовод";}
	if (($messages>=500)&&($messages<1000)){
		return "знаток";}
	if (($messages>=1000)&&($messages<2000)){
		return "профессионал";}		
	if (($messages>=2000)&&($messages<5000)){
		return "гуру форума";}
	if ($messages>=5000){
		return "VIP-пользователь";}}



}
?>