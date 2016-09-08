<?php   
class UsersDialogs{

static public $sort_by=1;//по умолчанию показываем неудаленные диалоги

static public $dialog_enable=0;//есть лди диалог в БД


static public $type_of_correspondence=0;//на какой мы странице 1 - написать ему сообщение, 2 - на нашей с ним переписке
static public $number_table_messages=0;//в какой таблице переписок хранятся наши сообщения с текущим пользователем
static public $id_correspondence=0;//номер нашей переписки
static public $who=0;//с кем переписываемся
static public $is_deleted_by_me=0;//переписка удалена нами
static public $is_deleted_by_him=0;//переписка удалена им
static public $our_num_column=0;//кто мы id_user1 или id_user2 в таблице
static public $his_num_column=0;//кто он id_user1 или id_user2 в таблице
static public $who_name="";//имя того, с кем переписываемся

static public $date_lastupdate=0;//время последнего обновления
static public $id_user1=0;//кто в колонке id_user1
static public $id_user2=0;//кто в колонке id_user2




static public $max_id=0;//id переписчиков с максимальным id



static public $array_my_dialogs_db=array();//массив с ключем по id таблиц
static public $array_my_dialogs_enable=0;//есть или нет текст в массиве
//array_my_dialogs_db[db]['id_correspondence']			=array()
//array_my_dialogs_db[db]['db']							=array()
//array_my_dialogs_db[db]['who']						=array()
//array_my_dialogs_db[db]['who_name']					=array()
//array_my_dialogs_db[db]['absolutewho']				=array()
//array_my_dialogs_db[db]['who_photo']					=array()
//array_my_dialogs_db[db]['text_last_message']			=array()
//array_my_dialogs_db[db]['date_last_message']			=array()
//array_my_dialogs_db[db]['autor_last_message']			=array()
//array_my_dialogs_db[db]['name_autor_last_message']	=array()
//array_my_dialogs_db[db]['photo_autor_last_message']	=array()
//array_my_dialogs_db[db]['who_timecoming']			=array()

static public $array_my_dialogs_lastmessage=array();//массив с ключем по последним собщениям

static public $myiduserrowname="";//название столбца, на котором написаны мы, а не наш собеседник


static public function set_sort(){//что выбираем на странице друзей при переходе на неё
	//1 - неудаленные диалоги
	//2 - удаленные диалоги
	if (isset($_COOKIE['users_dialogs_sort_by'])){
		if ($_COOKIE['users_dialogs_sort_by']==2) {self::$sort_by=2;}}			
	if (self::$sort_by==1){
		UsersBase::$find_query=" AND (id_user1='".UsersMyData::$id."' OR id_user2='".UsersMyData::$id."') AND empty='0'";}
	else if (self::$sort_by==2){
		UsersBase::$find_query=" AND (id_user1='-".UsersMyData::$id."' OR id_user2='-".UsersMyData::$id."') AND empty='0'";}
	UsersBase::$condition_main="WHERE 1 ".UsersBase::$find_query;}
	
static public function set_cookies_sort_by_dialogs(){
	GeneralCookies::setglobal("users_dialogs_sort_by",1);
	GeneralGetVars::$num_page=1;}		
static public function set_cookies_sort_by_deleted_dialogs(){
	GeneralCookies::setglobal("users_dialogs_sort_by",2);
	GeneralGetVars::$num_page=1;}		


static public function detect_array_dialogs($MSQLc,$limitflag){
	$query="
	SELECT
	rumd.id_user,
	rumd.dir_user,
	rumd.gen_photo,
	rumd.site_photo_format,
	rumd.sn_photo_url_from_small,
	rumd.sn_photo_url_from_big,
	rumd.sn_photo_url_from_huge,
	rumd.gen_login_user,
	rumd.site_mail_user,
	rumd.gen_name_user,
	rumd.gen_surname_user,
	rumd.site_login_status,
	rumd.gen_timecoming,	
	ruct2.db,
	ruct2.date_lastupdate,
	ruct2.who,	
	ruct2.whopositive,	
	ruct2.id_correspondence	
	FROM	
	(SELECT 
		*,
		(CASE ruct.id_user1
		WHEN '".UsersMyData::$id."' THEN ruct.id_user2
		WHEN '-".UsersMyData::$id."' THEN ruct.id_user2
		ELSE ruct.id_user1
		END) AS who,		
		ABS(
			(CASE ruct.id_user1
			WHEN '".UsersMyData::$id."' THEN ruct.id_user2
			WHEN '-".UsersMyData::$id."' THEN ruct.id_user2
			ELSE ruct.id_user1
			END)
		) AS whopositive
	FROM registrated_users___correspondence_table as ruct
	".UsersBase::$condition_main;
	
	$query.=" ORDER by ruct.date_lastupdate DESC,ruct.id_correspondence DESC";
	

	if ($limitflag==1){
		$query.=" LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage;}
	$query.=") as ruct2
		LEFT JOIN registrated_users___main_data as rumd
		ON rumd.id_user=ruct2.whopositive";
//echo($query);
	$res=GeneralMYSQL::query($MSQLc,$query);
	while ($row=GeneralMYSQL::fetch_array($res)){
		self::$array_my_dialogs_db[$row['db']]['id_correspondence'][]=$row['id_correspondence'];
		self::$array_my_dialogs_db[$row['db']]['db'][]=$row['db'];		
		self::$array_my_dialogs_db[$row['db']]['absolutewho'][]=$row['who'];//может быть отрицательным, если  участник удалил этот диалог
		self::$array_my_dialogs_db[$row['db']]['who'][]=$row['whopositive'];//id_user пользователя
		self::$array_my_dialogs_db[$row['db']]['who_photo'][]=UsersBase::return_url_photo($row['gen_photo'],$row['dir_user']."/".$row['id_user']."_2.".$row['site_photo_format'],$row['sn_photo_url_from_small'],$row['sn_photo_url_from_huge']);
		self::$array_my_dialogs_db[$row['db']]['who_name'][]=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
		self::$array_my_dialogs_db[$row['db']]['who_timecoming'][]=$row['gen_timecoming'];	
		self::$array_my_dialogs_enable=1;}
	GeneralMYSQL::free($res);
	


	$query="";
	$i=0;
	foreach (UsersDialogs::$array_my_dialogs_db as $db=>$array){
		$i++;
		if($i>1) {$query.=" UNION ALL ";}	
		$query.="
		(SELECT
		".$db." as db,
		rucm3".$db.".text_message as text_message,
		rucm3".$db.".date_message as date_message,
		rucm2".$db.".id_correspondence as id_correspondence,
		rucm3".$db.".id_user as who,
		rumd.id_user as id_user,
		rumd.dir_user as dir_user,
		rumd.gen_photo as gen_photo,
		rumd.site_photo_format as site_photo_format,
		rumd.sn_photo_url_from_small as sn_photo_url_from_small,
		rumd.sn_photo_url_from_big as sn_photo_url_from_big,
		rumd.sn_photo_url_from_huge as sn_photo_url_from_huge,
		rumd.gen_login_user as gen_login_user,
		rumd.site_mail_user as site_mail_user,
		rumd.gen_name_user as gen_name_user,
		rumd.gen_surname_user as gen_surname_user,
		rumd.site_login_status	as site_login_status	
		FROM
		(
		SELECT
			MAX(rucm".$db.".id_message) as last_idmessage, rucm".$db.".id_correspondence
			FROM registrated_users___correspondence_messages_".$db." as rucm".$db."
			GROUP by rucm".$db.".id_correspondence
			HAVING rucm".$db.".id_correspondence IN (".implode(",",UsersDialogs::$array_my_dialogs_db[$db]['id_correspondence']).")
			) as rucm2".$db."
		LEFT JOIN registrated_users___correspondence_messages_".$db." as rucm3".$db."
			ON rucm2".$db.".last_idmessage=rucm3".$db.".id_message	AND rucm2".$db.".id_correspondence=rucm3".$db.".id_correspondence
		LEFT JOIN registrated_users___main_data as rumd
			ON rumd.id_user=rucm3".$db.".id_user) ";}
			
			
		$query.="ORDER by date_message DESC,id_correspondence DESC";
			
			
			
			//echo("<br>".$query);
			
			
			

	$res=GeneralMYSQL::query($MSQLc,$query);
	while ($row=GeneralMYSQL::fetch_array($res)){
		self::$array_my_dialogs_db[$row['db']]['text_last_message'][]=$row['text_message'];
		self::$array_my_dialogs_db[$row['db']]['date_last_message'][]=$row['date_message'];
		self::$array_my_dialogs_db[$row['db']]['autor_last_message'][]=$row['who'];		
		self::$array_my_dialogs_db[$row['db']]['name_autor_last_message'][]=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
		self::$array_my_dialogs_db[$row['db']]['photo_autor_last_message'][]=UsersBase::return_url_photo($row['gen_photo'],$row['dir_user']."/".$row['id_user']."_2.".$row['site_photo_format'],$row['sn_photo_url_from_small'],$row['sn_photo_url_from_huge']);}
		
		//print_r(self::$array_my_dialogs_db);
		
		//echo("<textarea>".print_r(self::$array_my_dialogs_db[$db]['date_last_message'])."</textarea>");
		
		//print_r(self::$array_my_dialogs_db);
		
	//создаем массив по времени обновления, если время обновления в разных диалогах совпадают, то они создают внутренний многомерный массив
	//потом сортируем этот массив по убыванию времени, чтобы отобразить вначале свежие диалоги
	$i=0;
	foreach(self::$array_my_dialogs_db as $db=>$value){
	$i++;//делаем ключ уникальный для всех, чтобы при одинаковом времени $value2, ячейка массива не переписывалась, а создавала вторую подъячейку в себе
	//в итоге получается, что ячейка времени $value2 может содержать массив значений для каждого диалога с тем же временем $value2
		foreach(self::$array_my_dialogs_db[$db]['date_last_message'] as $key=>$value2){
			$i++;
			self::$array_my_dialogs_lastmessage[$value2][$i]['id_correspondence']=self::$array_my_dialogs_db[$db]['id_correspondence'][$key];
			self::$array_my_dialogs_lastmessage[$value2][$i]['db']=self::$array_my_dialogs_db[$db]['db'][$key];		
			self::$array_my_dialogs_lastmessage[$value2][$i]['who']=self::$array_my_dialogs_db[$db]['who'][$key];
			self::$array_my_dialogs_lastmessage[$value2][$i]['who_name']=self::$array_my_dialogs_db[$db]['who_name'][$key];
			self::$array_my_dialogs_lastmessage[$value2][$i]['absolutewho']=self::$array_my_dialogs_db[$db]['absolutewho'][$key];
			self::$array_my_dialogs_lastmessage[$value2][$i]['who_photo']=self::$array_my_dialogs_db[$db]['who_photo'][$key];
			self::$array_my_dialogs_lastmessage[$value2][$i]['text_last_message']=self::$array_my_dialogs_db[$db]['text_last_message'][$key];
			self::$array_my_dialogs_lastmessage[$value2][$i]['date_last_message']=self::$array_my_dialogs_db[$db]['date_last_message'][$key];
			self::$array_my_dialogs_lastmessage[$value2][$i]['autor_last_message']=self::$array_my_dialogs_db[$db]['autor_last_message'][$key];
			self::$array_my_dialogs_lastmessage[$value2][$i]['name_autor_last_message']=self::$array_my_dialogs_db[$db]['name_autor_last_message'][$key];
			self::$array_my_dialogs_lastmessage[$value2][$i]['photo_autor_last_message']=self::$array_my_dialogs_db[$db]['photo_autor_last_message'][$key];
			self::$array_my_dialogs_lastmessage[$value2][$i]['who_timecoming']=self::$array_my_dialogs_db[$db]['who_timecoming'][$key];			
			
			}}
	self::$array_my_dialogs_db=array();//обнуляем прошлый массив, очищаем память, у нас уже есть нужный массив
	
	krsort(self::$array_my_dialogs_lastmessage);//сортируем по возрастанию времени обновления
//	print_r(self::$array_my_dialogs_lastmessage);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
static public function set_cookies_sort_nodeleted(){
	GeneralCookies::setglobal("users_dialogs_sort_by",1);
	GeneralGetVars::$num_page=1;}		
	
	
static public function set_cookies_sort_deleted(){
	GeneralCookies::setglobal("users_dialogs_sort_by",2);
	GeneralGetVars::$num_page=1;}		
	
	
	
static public function set_new_number_page($MSQLc){//устанавливаем новый номер страницы форума	
	UsersDialogs::set_sort();
	GeneralPagesCounter::$find_query=UsersBase::$find_query;
	GeneralPagesCounter::$rowspage_name="rowspageusersdialogs";//копия такой страницы - по присваиванию номеров страниц
	GeneralPagesCounter::calculate($MSQLc,"registrated_users___correspondence_table",0,0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2."/dialogs");
	if(GeneralGetVars::$num_page>GeneralPagesCounter::$N_max){
		GeneralGetVars::$num_page=GeneralPagesCounter::$N_max;
		if (GeneralGetVars::$num_page==0){GeneralGetVars::$num_page=1;}}}
	
	
static public function invert_user_in_dialog($MSQLc,$mineid,$hisid,$id_correspondence){
	if ($mineid>$hisid) {self::$myiduserrowname="id_user1";}
	else {self::$myiduserrowname="id_user2";}
	
	$query="
	UPDATE	registrated_users___correspondence_table
	SET		".self::$myiduserrowname."=-".self::$myiduserrowname."
	WHERE 	id_correspondence='".$id_correspondence."'
	";
	GeneralMYSQL::query_update($MSQLc,$query);
	self::set_new_number_page($MSQLc);}
	
static public function deletedialog($MSQLc){
	if (UsersBase::detect_its_mypage(1)==true){
	
		self::invert_user_in_dialog($MSQLc,UsersMyData::$id,$_POST['who'],$_POST['id_correspondence']);
		$query="
		SELECT	id_user1,id_user2
		FROM 	registrated_users___correspondence_table
		WHERE 	id_correspondence='".$_POST['id_correspondence']."'
		LIMIT 	1";
		$res=GeneralMYSQL::query($MSQLc,$query);		
		$row=GeneralMYSQL::fetch_array($res);
		GeneralMYSQL::free($res);
		
		if (($row['id_user1']<0)&&($row['id_user2']<0)){
			$query="
			DELETE
			FROM	registrated_users___correspondence_table
			WHERE 	id_correspondence='".$_POST['id_correspondence']."'
			LIMIT 1";
			GeneralMYSQL::query_delete($MSQLc,$query);}}//все сообщения диалога автоматически сотрутся по внешнему ключу	
		self::set_new_number_page($MSQLc);}

		
static public function restoredialog($MSQLc){
	if (UsersBase::detect_its_mypage(1)==true){	
		self::invert_user_in_dialog($MSQLc,UsersMyData::$id,$_POST['who'],$_POST['id_correspondence']);
		self::set_new_number_page($MSQLc);}}

	

	

	
	
static public function return_who($MSQLc){
	$query="
	SELECT	id_user1,id_user2
	FROM 	registrated_users___correspondence_table
	WHERE 	id_correspondence='".GeneralGetVars::$var4."'
	LIMIT 	1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
		
	if ($row['id_user1']!=UsersMyData::$id){
		return $row['id_user1'];}
	return $row['id_user2'];}
	
	
	
	
static public function set_number_table_messages(){
	if (self::$who>UsersMyData::$id){
		self::$number_table_messages=floor(self::$who/GeneralGlobalVars::maxusersdataindbtable)+1;}
	else{
		self::$number_table_messages=floor(UsersMyData::$id/GeneralGlobalVars::maxusersdataindbtable)+1;}}

		
		
		
static public function detect_our_correspondence_by_us($MSQLc,$iduser1,$iduser2){//определяем по нам ,но не по номеру
	//узнаем имя переписки, которую я и он не удаляли
	$query="
	SELECT	id_correspondence,id_user1,id_user2,date_lastupdate
	FROM 	registrated_users___correspondence_table
	WHERE ";
	if ($iduser1>$iduser2)	{$query.=" (id_user1='".$iduser1."' OR id_user1='-".$iduser1."') AND (id_user2='".$iduser2."' OR id_user2='-".$iduser2."') "; self::$our_num_column=1;  self::$his_num_column=2;  self::$max_id=$iduser1; self::$id_user1=$iduser1;self::$id_user2=$iduser2;}
	else 					{$query.=" (id_user2='".$iduser1."' OR id_user2='-".$iduser1."') AND (id_user1='".$iduser2."' OR id_user1='-".$iduser2."') "; self::$our_num_column=2; self::$his_num_column=1; self::$max_id=$iduser2; self::$id_user1=$iduser2;self::$id_user2=$iduser1;}
	$query.="
	LIMIT 	1";//echo($query);
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);	
	if ($row['id_correspondence']>0){
		if ($row['id_user'.self::$our_num_column]<0) {self::$is_deleted_by_me=1;}//вдруг переписка удалена одним из нас
		else if ($row['id_user'.self::$his_num_column]<0) {self::$is_deleted_by_him=1;}
		self::$id_correspondence=$row['id_correspondence'];
		self::$date_lastupdate=$row['date_lastupdate'];
		return true;}
	return false;}




static public function detect_our_correspondence_by_id($MSQLc,$id_correspondence){//определяем по номеру
	//узнаем имя переписки, которую я и он не удаляли
	$query="
	SELECT	id_user1,id_user2,id_correspondence,db,date_lastupdate
	FROM 	registrated_users___correspondence_table
	WHERE id_correspondence='".$id_correspondence."'
	LIMIT 	1";
	$res=GeneralMYSQL::query($MSQLc,$query);		
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);	
	if ($row['id_correspondence']>0){	
	
		self::$id_user1=abs($row['id_user1']);
		self::$id_user2=abs($row['id_user2']);		
	
		if (UsersMyData::$id==self::$id_user1){self::$who=self::$id_user2; self::$our_num_column=1; self::$his_num_column=2;}
		else {self::$who=self::$id_user1;self::$our_num_column=2; self::$his_num_column=1;}

		if (self::$id_user1>self::$id_user2)	{self::$max_id=self::$id_user1;}
		else 					{self::$max_id=self::$id_user2;}
			
		self::$number_table_messages=$row['db'];

		if ($row['id_user'.self::$our_num_column]<0) {self::$is_deleted_by_me=1;}//вдруг переписка удалена одним из нас
		else if ($row['id_user'.self::$his_num_column]<0) {self::$is_deleted_by_him=1;}
		self::$id_correspondence=$row['id_correspondence'];
		self::$date_lastupdate=$row['date_lastupdate'];
		$query="SELECT 
					gen_login_user,
					site_mail_user,
					gen_name_user,
					gen_surname_user,
					site_login_status
					FROM registrated_users___main_data WHERE id_user='".self::$who."' LIMIT 1";
		$res=GeneralMYSQL::query($MSQLc,$query);
		$row=GeneralMYSQL::fetch_array($res);		
	
		self::$who_name=UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']);
		
		return true;}
	return false;}










	
static public function set_main_data_of_our_dialog($MSQLc){//узнаем, задаем и устанавливаем все данные по переписке
	//есть 2 варианта
	#1
	if (self::$type_of_correspondence==1){//написать ему сообщение (на его странице находимся)
	//узнаем номер таблицы
	self::$who=GeneralGetVars::$var2;
		self::set_number_table_messages();		
//нужно узнать есть ли у нас с ним общая переписка и в противном случае создать её####
if (self::detect_our_correspondence_by_us($MSQLc,UsersMyData::$id,GeneralGetVars::$var2)==false){//если переписки нет####
	//создаем её
	$query="INSERT INTO registrated_users___correspondence_table VALUES('','1','".self::$number_table_messages."','".self::$id_user1."','".self::$id_user2."','0')";
	GeneralMYSQL::query_insert($MSQLc,$query);
	//снова
	self::detect_our_correspondence_by_us($MSQLc,UsersMyData::$id,GeneralGetVars::$var2);}//узнаем в итоге номер переписки ,номер таблицы, с кем переписываемся уже знаем
	//если переписка есть, то знаем номер таблицы, с кем переписываемся, и номер переписки
	if (self::$is_deleted_by_me==1){//если мы удалили переписку и решили ему написать, то автоматически восстанавливаем её
		self::invert_user_in_dialog($MSQLc,UsersMyData::$id,GeneralGetVars::$var2,self::$id_correspondence);}
	self::$who_name=GeneralPageTree::$name2;
	self::$dialog_enable=1;
	}
else if (self::$type_of_correspondence==2){//на нашей с ним переписке
//номер переписки знаем
if (self::detect_our_correspondence_by_id($MSQLc,GeneralGetVars::$var4)==true){//если переписка есть
//все данные есть
	if (self::$is_deleted_by_me==1){//если мы удалили переписку и решили ему написать, то автоматически восстанавливаем её
		self::invert_user_in_dialog($MSQLc,UsersMyData::$id,self::$who,self::$id_correspondence);}



self::$dialog_enable=1;
}
//иначе ничего не показываем
}
}
	
	
	
	
	
}