<?php   
class UsersSignaturing{

//static public $condition1="";//условие для выборки
//static public $users_to_signature=array();//массив пользователей, которых нужно оповестить






//	новости ne 10000 1000000
//	советы от тазтим ar 10000 1000000
//	объявления am 10000 1000000
//	форум3 fm 10000 1000000
//	галерея ga 10000 1000000 10000
//	видео vi  10000 1000000
//	личные сообщения sm 100000000000// название переписки
//	форум2 ft 10000
//	сообщения под личными фотоальбомами sf 10000000000 10000 1000000
//	моя стена sw 100000000000 на чьей стене
//  главной страницы чат mc
//  магазина sh





//друзья будут прилагаться через join к основному тексту для ajax








static public function delete_signaturing($MSQLc,$signaturing,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//стираем оповещение
	if ($signaturing=="ne"){
		GeneralPageBasic::set_code_page("ne",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}
		
		
	else if ($signaturing=="ar"){
		GeneralPageBasic::set_code_page("ar",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}		
		
		
		
		
		
	else if ($signaturing=="sw"){
		GeneralPageBasic::set_code_page("sw",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}
	else if ($signaturing=="am"){
		GeneralPageBasic::set_code_page("am",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}
	else if ($signaturing=="fm"){
		GeneralPageBasic::set_code_page("fm",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}
	else if ($signaturing=="ga"){
		GeneralPageBasic::set_code_page("ga",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}
	else if ($signaturing=="vi"){
		GeneralPageBasic::set_code_page("vi",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}
	else if ($signaturing=="sm"){
		GeneralPageBasic::set_code_page("sm",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}		
	else if ($signaturing=="ft"){
		GeneralPageBasic::set_code_page("ft",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}
	else if ($signaturing=="sf"){
		GeneralPageBasic::set_code_page("sf",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}		
	else if ($signaturing=="mc"){
		GeneralPageBasic::set_code_page("mc",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}
		
	else if ($signaturing=="sh"){
		GeneralPageBasic::set_code_page("sh",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
		$text=" ".GeneralPageBasic::$text_code_page." ";}		
		
		
		
		
		
	$query="UPDATE registrated_users___signaturing SET signatures=REPLACE(signatures,'".$text."','') WHERE id_user='".UsersMyData::$id."' LIMIT 1";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}


	
	
	
	
	
	
static public function signaturing_mc($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
	//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы
	//$getvar1 - имя переписки (диалог, конференция в будущем возможно)
	//$getvar2 - пользователь, который написал
	//$getvar3 - база данных - её номер

	GeneralPageBasic::set_code_page("mc",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";		
	
	$query="SELECT DISTINCT(id_user) as id_user FROM index___chat ORDER by id_message DESC LIMIT 10";
	$res=GeneralMYSQL::query($MSQLc,$query);

	$i=0;
	$listusers="";
		
	while($row=GeneralMYSQL::fetch_array($res)){
		if (UsersMyData::$id!=$row['id_user']){
		$i++;
		if ($i!=1) {$listusers.=",";}
		$listusers.=$row['id_user'];}}
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}	
	
	
	
	
static public function signaturing_sh($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
	//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы
	//$getvar1 - имя переписки (диалог, конференция в будущем возможно)
	//$getvar2 - пользователь, который написал
	//$getvar3 - база данных - её номер

	GeneralPageBasic::set_code_page("sh",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";		
	
	$query="SELECT DISTINCT(id_user) as id_user FROM shop___chat ORDER by id_message DESC LIMIT 10";
	$res=GeneralMYSQL::query($MSQLc,$query);

	$i=0;
	$listusers="";
		
	while($row=GeneralMYSQL::fetch_array($res)){
		if (UsersMyData::$id!=$row['id_user']){
		$i++;
		if ($i!=1) {$listusers.=",";}
		$listusers.=$row['id_user'];}}
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}		
	
	
	
	
	
	
	
	
	
	
static public function signaturing_sw($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
	//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы
	//$getvar1 - имя переписки (диалог, конференция в будущем возможно)
	//$getvar2 - пользователь, который написал
	//$getvar3 - база данных - её номер

	GeneralPageBasic::set_code_page("sw",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";		
	
	$query="SELECT DISTINCT(id_user) as id_user FROM registrated_users___wall WHERE user='".$getvar2."' ORDER by id_message DESC LIMIT 10";
	$res=GeneralMYSQL::query($MSQLc,$query);

	$i=0;
	if ($getvar2!=UsersMyData::$id){//если я не на своей странице
		$listusers=$getvar2; $i++;}//оповещаем владельца
	else {
		$listusers="";}
		
	while($row=GeneralMYSQL::fetch_array($res)){
		if (UsersMyData::$id!=$row['id_user']){
		$i++;
		if ($i!=1) {$listusers.=",";}
		$listusers.=$row['id_user'];}}
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}





static public function signaturing_sm($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
	//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы
	//$getvar1 - имя переписки (диалог, конференция в будущем возможно)
	//$getvar2 - пользователь, который написал
	//$getvar3 - база данных - её номер
	
	GeneralPageBasic::set_code_page("sm",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";	
	$query="SELECT id_user1,id_user2 FROM registrated_users___correspondence_table WHERE id_correspondence='".$getvar1."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	$listusers="";
	$i=0;
	if ($row['id_user1']>0){
		if (UsersMyData::$id!=$row['id_user1']){$i++;
			$listusers.=$row['id_user1'];}}
	if ($row['id_user2']>0){
		if (UsersMyData::$id!=$row['id_user2']){if ($i!=0){$listusers.=",";}
			$listusers.=$row['id_user2'];}}
	GeneralMYSQL::free($res);
	
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}




static public function signaturing_fm($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы

	GeneralPageBasic::set_code_page("fm",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";		
	//автора темы так и так оповестим - есго сообщение первое по счету в теме
	$query="SELECT DISTINCT(forum___messages_".$getvar2.".id_user) as id_user FROM forum___messages_".$getvar2." WHERE forum___messages_".$getvar2.".id_topic='".$getvar3."' ORDER by forum___messages_".$getvar2.".id_message DESC LIMIT 10";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$i=0;
	$listusers="";
	while($row=GeneralMYSQL::fetch_array($res)){
		if (UsersMyData::$id!=$row['id_user']){
		$i++;
		if ($i!=1) {$listusers.=",";}
		$listusers.=$row['id_user'];}}
	GeneralMYSQL::free($res);
	
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}




static public function signaturing_ft($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы
	GeneralPageBasic::set_code_page("ft",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";	
	
	$query="SELECT DISTINCT(forum___messages_general2.id_user) as id_user FROM forum___messages_general2 WHERE forum___messages_general2.id_section='".$getvar2."' ORDER by forum___messages_general2.id_message DESC LIMIT 10";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$i=0;
	$listusers="";
	while($row=GeneralMYSQL::fetch_array($res)){
		if (UsersMyData::$id!=$row['id_user']){
		$i++;
		if ($i!=1) {$listusers.=",";}
		$listusers.=$row['id_user'];}}
	GeneralMYSQL::free($res);
	
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}




static public function signaturing_vi($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы

	GeneralPageBasic::set_code_page("vi",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";		
	
	$query="SELECT DISTINCT(video___messages.id_user) as id_user FROM video___messages WHERE video___messages.id_video='".$getvar3."' ORDER by video___messages.id_message DESC LIMIT 10";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$i=0;
	$listusers="";
	while($row=GeneralMYSQL::fetch_array($res)){
		if (UsersMyData::$id!=$row['id_user']){
		$i++;
		if ($i!=1) {$listusers.=",";}
		$listusers.=$row['id_user'];}}
	GeneralMYSQL::free($res);
	
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}

	

static public function signaturing_sf($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы

	GeneralPageBasic::set_code_page("sf",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";		
	
	$query="SELECT DISTINCT(registrated_users___photoalbums_photos_messages.id_user) as id_user FROM registrated_users___photoalbums_photos_messages WHERE registrated_users___photoalbums_photos_messages.user='".$getvar2."' AND registrated_users___photoalbums_photos_messages.id_album='".$getvar4."' AND registrated_users___photoalbums_photos_messages.id_photo='".$idphoto."' ORDER by registrated_users___photoalbums_photos_messages.id_message DESC LIMIT 10";
	$res=GeneralMYSQL::query($MSQLc,$query);
	
	
	$i=0;	
	if ($getvar2!=UsersMyData::$id){//если я не на своей странице
		$listusers=$getvar2; $i++;}//оповещаем владельца
	else {
		$listusers="";}	
	
	
	
	
	

	while($row=GeneralMYSQL::fetch_array($res)){
		if (UsersMyData::$id!=$row['id_user']){
		$i++;
		if ($i!=1) {$listusers.=",";}
		$listusers.=$row['id_user'];}}
	GeneralMYSQL::free($res);
	
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}



static public function signaturing_ga($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы

	GeneralPageBasic::set_code_page("ga",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";		



	$query="SELECT id_user FROM photo___topics_".$getvar2." WHERE id_topic='".$getvar3."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	$autor_topic=$row['id_user'];
	

	
	$query="SELECT DISTINCT(photo___messages_".$getvar2.".id_user) as id_user FROM photo___messages_".$getvar2." WHERE photo___messages_".$getvar2.".id_topic='".$getvar3."' AND photo___messages_".$getvar2.".id_photo='".$idphoto."' ORDER by photo___messages_".$getvar2.".id_message DESC LIMIT 10";
	$res=GeneralMYSQL::query($MSQLc,$query);


	$i=0;	
	if ($autor_topic!=UsersMyData::$id){//если я не на своей странице
		$listusers=$autor_topic; $i++;}//оповещаем владельца
	else {
		$listusers="";}	
	while($row=GeneralMYSQL::fetch_array($res)){
		if (UsersMyData::$id!=$row['id_user']){
		$i++;
		if ($i!=1) {$listusers.=",";}
		$listusers.=$row['id_user'];}}
	GeneralMYSQL::free($res);
	
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}



static public function signaturing_am($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы

	GeneralPageBasic::set_code_page("am",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";		


	$query="SELECT id_user FROM automarket WHERE id='".$getvar3."' LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	$autor_topic=$row['id_user'];


	
	$query="SELECT DISTINCT(automarket___messages.id_user) as id_user FROM automarket___messages WHERE automarket___messages.id_automarket='".$getvar3."' ORDER by automarket___messages.id_message DESC LIMIT 10";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$i=0;	
	if ($autor_topic!=UsersMyData::$id){//если я не на своей странице
		$listusers=$autor_topic; $i++;}//оповещаем владельца
	else {
		$listusers="";}	
	while($row=GeneralMYSQL::fetch_array($res)){
		if (UsersMyData::$id!=$row['id_user']){
		$i++;
		if ($i!=1) {$listusers.=",";}
		$listusers.=$row['id_user'];}}
	GeneralMYSQL::free($res);
	
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}



static public function signaturing_ne($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы

	GeneralPageBasic::set_code_page("ne",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";	
	
	$query="SELECT DISTINCT(news___messages.id_user) as id_user FROM news___messages WHERE news___messages.id_news='".$getvar2."' ORDER by news___messages.id_message DESC LIMIT 10";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$i=0;
	$listusers="";
	while($row=GeneralMYSQL::fetch_array($res)){
		if (UsersMyData::$id!=$row['id_user']){
		$i++;
		if ($i!=1) {$listusers.=",";}
		$listusers.=$row['id_user'];}}
	GeneralMYSQL::free($res);
	
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}


	
	
	
	
static public function signaturing_ar($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы

	GeneralPageBasic::set_code_page("ar",$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto);
	$text=" ".GeneralPageBasic::$text_code_page." ";	
	
	$query="SELECT DISTINCT(news___messages.id_user) as id_user FROM news___messages WHERE news___messages.id_news='".$getvar2."' ORDER by news___messages.id_message DESC LIMIT 10";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$i=0;
	$listusers="";
	while($row=GeneralMYSQL::fetch_array($res)){
		if (UsersMyData::$id!=$row['id_user']){
		$i++;
		if ($i!=1) {$listusers.=",";}
		$listusers.=$row['id_user'];}}
	GeneralMYSQL::free($res);
	
	$query="
	UPDATE 		registrated_users___signaturing 
	SET 		signatures=CONCAT(signatures,'".$text."')
	WHERE		id_user IN (".$listusers.") AND signatures NOT LIKE '%".$text."%'";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}	
	
	
	
	
	
	
static public function signaturing_ch($MSQLc,$getvar1,$getvar2,$getvar3,$getvar4,$getnumpage,$idphoto){//оповещаем переговорщиков в новостях
}	
	
	
	
	
	
	
	
	
/*
static protected function set_to_user_signature($MSQLc,$pole,$content){//записываем пользователю оповещение, $pole - форум, галерея, личное сообщение и т.д.
	$text_users=implode(",",self::$users_to_signature);
	$query="UPDATE registrated_users___main_data SET ".$pole."=CONCAT(".$pole.",',".$content."')  WHERE id_user in (".$text_users.")";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}
	
static protected function detect_talkers_res($MSQLc,$db,$condition){//вычмсляем переписчиков - передаем $res
	$query="SELECT DISTINCT id_user FROM ".$db; if ($condition) { $query.=" WHERE ".$condition;}
	//echo($query);
	$res=GeneralMYSQL::query($MSQLc,$query);
	return $res;}


static public function signaturing_talkers($MSQLc){//оповещаем переговорщиков о новом сообщении
	//выбираем всех переговорщиков из таблицы сообщений с данной темой
	if (GeneralGetVars::$var1=="forum"){
		if (GeneralGetVars::$var3){//для submit переписки
			$res=self::detect_talkers_res($MSQLc,"forum___messages_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'");
			self::$users_to_signature=array();//обнуляем на всякий случай массив
			while($row=GeneralMYSQL::fetch_array($res)){
				self::$users_to_signature[]=$row['id_user'];}
			$content=GeneralGetVars::$var2."/".GeneralGetVars::$var3;
			self::set_to_user_signature($MSQLc,"forum3_signatures",$content);}

		else if (GeneralGetVars::$var2){//для ajax переписки
			$res=self::detect_talkers_res($MSQLc,"forum___messages_general2","id_section='".GeneralGetVars::$var2."'");
			self::$users_to_signature=array();//обнуляем на всякий случай массив
			while($row=GeneralMYSQL::fetch_array($res)){
				self::$users_to_signature[]=$row['id_user'];}
			$content=GeneralGetVars::$var2;
			self::set_to_user_signature($MSQLc,"forum2_signatures",$content);}}
			
			
	else if (GeneralGetVars::$var1=="photo"){//пользователю под фоткой пишут
		if ((GeneralGetVars::$var3)&&(GeneralGetVars::$num_page)){		
			PhotoBase::detect_id_photo_page_by_num_page($MSQLc,0);//определяем id фотки - $id_photo_page
			$res=self::detect_talkers_res($MSQLc,"photo___messages_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."' AND id_photo='".PhotoBase::$id_photo_page."'");
			self::$users_to_signature=array();//обнуляем на всякий случай массив
			while($row=GeneralMYSQL::fetch_array($res)){
				self::$users_to_signature[]=$row['id_user'];}
			$content=GeneralGetVars::$var2."/".GeneralGetVars::$var3;
			self::set_to_user_signature($MSQLc,"photo3_signatures",$content);}}
			
	else if (GeneralGetVars::$var1=="automarket"){//пользователю под фоткой пишут
		if (GeneralGetVars::$var3){
			$res=self::detect_talkers_res($MSQLc,"automarket___messages","id_automarket='".GeneralGetVars::$var3."'");
			self::$users_to_signature=array();//обнуляем на всякий случай массив
			while($row=GeneralMYSQL::fetch_array($res)){
				self::$users_to_signature[]=$row['id_user'];}
			$content=GeneralGetVars::$var2."/".GeneralGetVars::$var3;
			self::set_to_user_signature($MSQLc,"automarket3_signatures",$content);}
		else if (GeneralGetVars::$var1){//для ajax переписки
			$res=self::detect_talkers_res($MSQLc,"automarket___messages_general","");
			self::$users_to_signature=array();//обнуляем на всякий случай массив
			while($row=GeneralMYSQL::fetch_array($res)){
				self::$users_to_signature[]=$row['id_user'];}
			$content="1";
			self::set_to_user_signature($MSQLc,"automarket2_signatures",$content);}}			
			
	else if (GeneralGetVars::$var1=="news"){//под новостью пишут
		if (GeneralGetVars::$var3){
			$res=self::detect_talkers_res($MSQLc,"news___messages","id_news='".GeneralGetVars::$var3."'");
			self::$users_to_signature=array();//обнуляем на всякий случай массив
			while($row=GeneralMYSQL::fetch_array($res)){
				self::$users_to_signature[]=$row['id_user'];}
			$content=GeneralGetVars::$var2."/".GeneralGetVars::$var3;
			self::set_to_user_signature($MSQLc,"news3_signatures",$content);}}			
			
	else if (GeneralGetVars::$var1=="video"){//под видео пишут
		if (GeneralGetVars::$var2){
			$res=self::detect_talkers_res($MSQLc,"video___messages","id_video='".GeneralGetVars::$var2."'");
			self::$users_to_signature=array();//обнуляем на всякий случай массив
			while($row=GeneralMYSQL::fetch_array($res)){
				self::$users_to_signature[]=$row['id_user'];}
			$content=GeneralGetVars::$var2;
			self::set_to_user_signature($MSQLc,"video2_signatures",$content);}}			
			
	GeneralMYSQL::free($res);}
*/
	
	/*	
	REPLACE(column,'WORD_TO_REPLACE','REPLACEMENT')
static protected function delete_from_user_signature($MSQLc,$pole,$content){//записываем пользователю оповещение, $pole - форум, галерея, личное сообщение и т.д.
	$text_users=implode(",",self::$users_to_signature);
	$query="UPDATE registrated_users___main_data SET ".$pole."=REPLACE(".$pole.",',".$content."')  WHERE id_user in (".$text_users.")";
	//echo($query);
	GeneralMYSQL::query_update($MSQLc,$query);}


static public function delete_signature_in_talkers($MSQLc){//убираем оповещениЕ одной темы у переговорщиков - стирается только если перешли по нему
	//выбираем всех переговорщиков из таблицы сообщений с данной темой
	if (GeneralGetVars::$var1=="forum"){
		if (GeneralPageTree::$nesting==3){//для submit переписки
			$res=self::detect_talkers_res($MSQLc,"forum___messages_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'");
			while($row=GeneralMYSQL::fetch_array($res)){
				self::$users_to_signature[]=$row['id_user'];}
			$content=GeneralGetVars::$var2."/".GeneralGetVars::$var3;
			self::delete_from_user_signature($MSQLc,"forum3_signatures",$content);}}
	GeneralMYSQL::free($res);}	
	
	*/
	
	
	
	
	
	}
