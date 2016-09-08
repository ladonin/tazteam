function general___detect_kind_file(id){
	var textfile=$("#"+id).val();
	var kindfile = textfile.match(/.*?\.([a-z0-9]+)/i);//извлекаем расширение приложенного файла
	if (kindfile){return kindfile[1];}
	else {return false};}
	
function general___send_topic_forum(textfrom,texttohtml,texttonack,inputnumbertocitate,inputnametopic){
	var textnametopic=document.getElementById(inputnametopic).value;
	if (!(/[a-zа-я]/mi).test(textnametopic)){
		general___swim_alert("введите название темы");
		return false;}
	else {
		textnametopic=general___inputtext_basic(textnametopic);
		document.getElementById(inputnametopic).value=textnametopic;}
	if (general___send_message(textfrom,texttohtml,texttonack,inputnumbertocitate,1)==false){
		return false;}
	return true;}	

	
function general___send_topic_photo(inputnametopic,id){
	var textnametopic=document.getElementById(inputnametopic).value;
	if (!(/[a-zа-я]/mi).test(textnametopic)){
		general___swim_alert("введите название темы");
		return false;}
	else {
		textnametopic=general___inputtext_basic(textnametopic);
		document.getElementById(inputnametopic).value=textnametopic;}

	var img1_url=document.getElementById('load_photo_img1'+id).value;		
	if (general___control_format_photo('load_photo_img1'+id)==true){
		var textnamephoto=document.getElementById('inputtexttextarea_1'+id).value;
		textnamephoto=general___inputtext_basic(textnamephoto);
		document.getElementById('inputtexttextarea_1'+id).value=textnamephoto;}
	else if (img1_url==""){
		general___swim_alert("Пожалуйста, приложите первую фотографию");
		return false;}		
	else{
		general___swim_alert("Фотография должна быть формата jpeg, png или gif");
		return false;}
	return true;}
	













function general___send_photos_in_message(){


	var img1_url=document.getElementById('img1').value;		
	if (general___control_format_photo('img1')==true){}
	else if (img1_url==""){}		
	else{
	

	
		if (document.getElementById('imgdelete1')){		
			if($("#imgdelete1").attr("checked") != true) {
				general___swim_alert("Фотография должна быть формата jpeg, png или gif");
				return false;}}
			else {general___swim_alert("Фотография должна быть формата jpeg, png или gif");
				return false;}}
		
		
	var img1_ur2=document.getElementById('img2').value;		
	if (general___control_format_photo('img2')==true){}
	else if (img1_ur2==""){}		
	else{
		if (document.getElementById('imgdelete2')){
			if($("#imgdelete2").attr("checked") != true) {
				general___swim_alert("Фотография должна быть формата jpeg, png или gif");
				return false;}}
		else {general___swim_alert("Фотография должна быть формата jpeg, png или gif");
			return false;}}
		
		
	var img1_ur3=document.getElementById('img3').value;		
	if (general___control_format_photo('img3')==true){}
	else if (img1_ur3==""){}		
	else{
		if (document.getElementById('imgdelete3')){
			if($("#imgdelete3").attr("checked") != true) {
				general___swim_alert("Фотография должна быть формата jpeg, png или gif");
				return false;}}
		else {general___swim_alert("Фотография должна быть формата jpeg, png или gif");
			return false;}}
			
	return true;}











	
	
	
function general___send_message(textfrom,texttohtml,texttonack,inputnumbertocitate,photo_enable){	


	
	textnacked=general___inputtextsubmit(textfrom,texttohtml,texttonack,inputnumbertocitate);
	if 	((/[\d\D]/m).test(textnacked)){}
	else {
		general___swim_alert("введите сообщение");
		return false;}
	if (photo_enable==1){	
	if (general___send_photos_in_message()==false){return false;}//проверка фоток	
	}
		
	return true;
		
		
		
	}

function general___dialog_windows_1_send_message(id_dialog,textfrom,texttohtml,database,autor,time,textvalue,idmessage,valuesnumber,value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,condition1,condition2,condition3,condition4,condition5,signaturing,pagetype,getvar1,getvar2,getvar3,getvar4,getnumpage,idphoto){
	if (general___send_message(textfrom,texttohtml,'none','none',0)==true){
		content=document.getElementById(texttohtml).value;
		document.getElementById(textfrom).value='';//очищаем поле ввода
		general___dialog_windows_1_send_message_ajax(id_dialog,content,database,autor,time,textvalue,idmessage,valuesnumber,value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,condition1,condition2,condition3,condition4,condition5,signaturing,pagetype,getvar1,getvar2,getvar3,getvar4,getnumpage,idphoto);}}	


	
function general___control_format_photo(id){
	var kindfile=general___detect_kind_file(id);//извлекаем расширение приложенного файла
	if ((kindfile=="jpg")||(kindfile=="jpeg")||(kindfile=="gif")||(kindfile=="png")||(kindfile=="JPG")||(kindfile=="JPEG")||(kindfile=="GIV")||(kindfile=="PNG")){return true;}
	else{
		return false;}}
	
function general___redact_photo(id){//редактирование одной фотографии с пояснением (универсальная)
	var img1_url=document.getElementById('load_photo_img1'+id).value;
	if ((general___control_format_photo('load_photo_img1'+id)==true)||(img1_url=="")){
		var textnamephoto=document.getElementById('inputtexttextarea_1'+id).value;
		textnamephoto=general___inputtext_basic(textnamephoto);
		document.getElementById('inputtexttextarea_1'+id).value=textnamephoto;
		return true;}
	else{
		general___swim_alert("Фотография должна быть формата jpeg, png или gif");
		return false;}}
	
	
function general___new_photo(id){//загрузка новой фотографии с пояснением (универсальная)
	var img1_url=document.getElementById('load_photo_img1'+id).value;
	if (general___control_format_photo('load_photo_img1'+id)==true){
		var textnamephoto=document.getElementById('inputtexttextarea_1'+id).value;
		textnamephoto=general___inputtext_basic(textnamephoto);
		document.getElementById('inputtexttextarea_1'+id).value=textnamephoto;
		return true;}
	else if (img1_url==""){
		general___swim_alert("Пожалуйста, приложите фотографию");
		return false;}
	else{
		general___swim_alert("Фотография должна быть формата jpeg, png или gif");
		return false;}}	
	
	
function general___new_photo(id){//загрузка новой фотографии с пояснением (универсальная)
	var img1_url=document.getElementById(id).value;
	if (general___control_format_photo(id)==true){
		return true;}
	else if (img1_url==""){
		general___swim_alert("Пожалуйста, приложите фотографию");
		return false;}
	else{
		general___swim_alert("Фотография должна быть формата jpeg, png или gif");
		return false;}}	
	
	
	
function general___basic_replace_text_in_id_object(id){//перезапись текста в объекте по базовым стандартам	
	textvar=document.getElementById(id).value;//извлекаем
	textvar=general___inputtext_basic(textvar);//изменяем
	
	textvar=general___inputtextconverttags_ending(textvar);//изменяем

	document.getElementById(id).value=textvar;}//снова заносим
	
function general___convert_to_int(id){//преобразование в число
	textvar=document.getElementById(id).value;
	textvar = textvar.replace(/[^0-9]*/gmi,"");	
	if (textvar>1) {document.getElementById(id).value=textvar;}
	else {document.getElementById(id).value="";}}	
	
function general___new_automarket_announcement(themepage){//загрузка нового объявления
	if (themepage==1){
		if (document.getElementById('automarket_form_mark').value==0) {alert("Укажите марку автомобиля"); return false;}

		var automarket_form_model=document.getElementById('automarket_form_model').value;
		if 	((/[\d\D]/im).test(automarket_form_model)){}	else {alert("Укажите модель автомобиля"); return false;}
		
		
		general___convert_to_int('automarket_form_price_int');
		if (document.getElementById('automarket_form_price_int').value<1) {alert("Не указана цена"); return false;}
		automarket_form_price_int=document.getElementById('automarket_form_price_int').value;
		general___comfortability_number(automarket_form_price_int,'automarket_form_price');


		general___convert_to_int('automarket_form_run_int');
		automarket_form_run_int=document.getElementById('automarket_form_run_int').value;
		general___comfortability_number(automarket_form_run_int,'automarket_form_run');


		document.getElementById('automarket_form_contentnacked').value=document.getElementById('automarket_form_content').value;//пишем голый текст перед его обработкой
		
		general___convert_to_int('automarket_form_phone');		
		general___convert_to_int('automarket_form_year_production');	
		general___convert_to_int('automarket_form_motor_vol');
		general___convert_to_int('automarket_form_power');		
		general___basic_replace_text_in_id_object('automarket_form_model');
		general___basic_replace_text_in_id_object('automarket_form_country_producer');		
		//general___basic_replace_text_in_id_object('automarket_form_year_production');		
		//general___basic_replace_text_in_id_object('automarket_form_motor_vol');		
		//general___basic_replace_text_in_id_object('automarket_form_power');			
		general___basic_replace_text_in_id_object('automarket_form_color');			
		//general___basic_replace_text_in_id_object('automarket_form_price');			
		general___basic_replace_text_in_id_object('automarket_form_content');
		general___basic_replace_text_in_id_object('automarket_form_region');			
		general___basic_replace_text_in_id_object('automarket_form_city');			
		//general___basic_replace_text_in_id_object('automarket_form_phone');

		}		
	else if (themepage==2){
		var automarket_form_name=document.getElementById('automarket_form_name').value;
		if 	((/[\d\D]/m).test(automarket_form_name)){}	else {alert("Введите название объявления"); return false;}

		general___convert_to_int('automarket_form_price_int');
		if (document.getElementById('automarket_form_price_int').value<1) {alert("Не указана цена"); return false;}
		automarket_form_price_int=document.getElementById('automarket_form_price_int').value;
		general___comfortability_number(automarket_form_price_int,'automarket_form_price');
		
		
		
		document.getElementById('automarket_form_contentnacked').value=document.getElementById('automarket_form_content').value;//пишем голый текст перед его обработкой
		
		
		general___convert_to_int('automarket_form_phone');		
		general___basic_replace_text_in_id_object('automarket_form_name');			
		//general___basic_replace_text_in_id_object('automarket_form_price');			
		general___basic_replace_text_in_id_object('automarket_form_content');
		general___basic_replace_text_in_id_object('automarket_form_region');			
		general___basic_replace_text_in_id_object('automarket_form_city');			
		//general___basic_replace_text_in_id_object('automarket_form_phone');
		

		}
	else{
		var automarket_form_name=document.getElementById('automarket_form_name').value;
		if 	((/[\d\D]/m).test(automarket_form_name)){}	else {alert("Введите название объявления"); return false;}


		//var automarket_form_content=document.getElementById('automarket_form_content').value;
		//if 	((/[\d\D]/im).test(automarket_form_content)){}	else {alert("Введите краткое описание товара"); return false;}


		//general___convert_to_int('automarket_form_price_int');
		//if (document.getElementById('automarket_form_price_int').value<1) {alert("Не указана цена"); return false;}
		//automarket_form_price_int=document.getElementById('automarket_form_price_int').value;
		//general___comfortability_number(automarket_form_price_int,'automarket_form_price');	

		
		
		
		document.getElementById('automarket_form_contentnacked').value=document.getElementById('automarket_form_content').value;//пишем голый текст перед его обработкой
		
		general___convert_to_int('automarket_form_price_int');		
		general___convert_to_int('automarket_form_phone');
        
		general___basic_replace_text_in_id_object('automarket_form_content');        
        		
		general___basic_replace_text_in_id_object('automarket_form_name');			
		//general___basic_replace_text_in_id_object('automarket_form_price');			
		general___basic_replace_text_in_id_object('automarket_form_content');
		general___basic_replace_text_in_id_object('automarket_form_region');			
		general___basic_replace_text_in_id_object('automarket_form_city');			
		//general___basic_replace_text_in_id_object('automarket_form_phone');
			

	}
}





















function general___new_garage_announcement(themepage){//загрузка нового автомобиля в гараж

		if (document.getElementById('garage_form_mark').value==0) {alert("Укажите марку автомобиля"); return false;}

		var garage_form_model=document.getElementById('garage_form_model').value;
		if 	((/[\d\D]/im).test(garage_form_model)){}	else {alert("Укажите модель автомобиля"); return false;}





		general___convert_to_int('garage_form_run_int');
		garage_form_run_int=document.getElementById('garage_form_run_int').value;
		general___comfortability_number(garage_form_run_int,'garage_form_run');


		document.getElementById('garage_form_contentnacked').value=document.getElementById('garage_form_content').value;//пишем голый текст перед его обработкой
				
		general___convert_to_int('garage_form_year_production');	
		general___convert_to_int('garage_form_motor_vol');
		general___convert_to_int('garage_form_power');		
		general___basic_replace_text_in_id_object('garage_form_model');
		general___basic_replace_text_in_id_object('garage_form_country_producer');		
		//general___basic_replace_text_in_id_object('automarket_form_year_production');		
		//general___basic_replace_text_in_id_object('automarket_form_motor_vol');		
		//general___basic_replace_text_in_id_object('automarket_form_power');			
		general___basic_replace_text_in_id_object('garage_form_color');			
			
		general___basic_replace_text_in_id_object('garage_form_content');


}











	
	
function general___automarket_find_announcements_auto(){
		general___convert_to_int('automarket_form_price_int');
		general___convert_to_int('automarket_form_run_int');}
	

function general___garage_find_announcements_auto(){
		general___convert_to_int('garage_form_run_int');}


function general___revision_users_find(){
		}

function general___new_news(textfrom,texttohtml,texttonack){
	var news_form_name=document.getElementById('news_form_name').value;
	if 	((/[\d\D]/im).test(news_form_name)){}	else {alert("Не введено название"); return false;}

	var inputtexttextarea=document.getElementById(textfrom).value;
	if 	((/[\d\D]/im).test(inputtexttextarea)){}	else {alert("Не введен текст"); return false;}
	
	general___inputtextsubmit(textfrom,texttohtml,texttonack,'');}



function general___revision_mail(id){
	var mail=document.getElementById(id).value;
	if 	(mail==""){alert("Введите E-mail"); return false;}
	if 	((/^[\.\-_A-Za-z0-9]+?@[\-A-Za-z0-9]+?\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9]{2,}){0,2}$/im).test(mail)){}	else {alert("Неверно введен E-mail"); return false;}
	return true;}

	
	
	
	
	
function general___revision_inputpassword(password){
	if 	(password==""){alert("Введите пароль"); return false;}
	if 	((/[^0-9a-zA-Z]/im).test(password)){alert("Пароль может содержать только латинские символы и цифры"); return false;}
	if 	(!(/[0-9a-zA-Z]{5,}/im).test(password)){alert("Слишком простой пароль"); return false;}
	return true;}	
	
	
	
function general___revision_redactpassword(){
	var password=document.getElementById('textarea_reg_password').value;
	if (general___revision_inputpassword(password)==false) {return false;}
	return true;}	
	
	
	
	
function general___revision_regdata(){
	if (general___revision_mail('textarea_reg_mail')==false) {return false;}

	var password=document.getElementById('textarea_reg_password').value;
	if (general___revision_inputpassword(password)==false) {return false;}


	var antibot=document.getElementById('textarea_reg_antibot').value;
	var antibot_real=document.getElementById('antibot_real').value;
	if 	(antibot==""){alert("Введите антибот"); return false;}
	if 	(antibot!=antibot_real){alert("Антибот введен неправильно"); return false;}
	return true;}


	
	
	
	
	
	
	
	
	
	
	
	
function general___revision_repassword_mail(){
	if (general___revision_mail('textarea_repassword_mail')==false) {return false;}

	var antibot=document.getElementById('textarea_repassword_mail_antibot').value;
	var antibot_real=document.getElementById('textarea_repassword_mail_antibot_real').value;
	if 	(antibot==""){alert("Введите антибот"); return false;}
	if 	(antibot!=antibot_real){alert("Антибот введен неправильно"); return false;}
	return true;}	
	
	
	
	
	
	
	
	
	
	
	
	
	
function general___revision_enterdata(){
	var textarea_input_login=document.getElementById('textarea_input_login').value;
	if 	((/[\d\D]/im).test(textarea_input_login)){}	else {alert("Введите ваш логин или майл"); return false;}

	var password=document.getElementById('textarea_input_password').value;
	if 	(password==""){alert("Введите пароль"); return false;}
	if 	((/[^0-9a-zA-Z]/im).test(password)){alert("Пароль может содержать только латинские символы и цифры"); return false;}
	if 	(!(/[0-9a-zA-Z]{5,}/im).test(password)){alert("Слишком короткий пароль"); return false;}

	return true;}	
	
function general___revision_autoarket_find_else_buy_data(){
	var autoarket_find_else_buy_data_name=document.getElementById('autoarket_find_else_buy_data_name').value;
	if 	(!(/[0-9a-zA-Zа-еж-яА-ЕЖ-Я]/im).test(autoarket_find_else_buy_data_name)){alert("Введите ключевое слово"); return false;}
	return true;}		
	
	
	
function general___revision_autoarket_find_else_data(){
	var autoarket_find_else_data_name=document.getElementById('autoarket_find_else_data_name').value;
	if 	(!(/[0-9a-zA-Zа-еж-яА-ЕЖ-Я]/im).test(autoarket_find_else_data_name)){alert("Введите ключевое слово"); return false;}
	return true;}	
	
	
	
	
	
	
/*	
function general___send_photo(){//загрузка одной фотографии с пояснением (универсальная)
	var kindfile=general___detect_kind_file('load_photo_img1');//извлекаем расширение приложенного файла
	if (general___control_format_photo('load_photo_img1')==true){
		var textnamephoto=document.getElementById('inputtexttextarea_1').value;
		textnamephoto=general___inputtext_basic(textnamephoto);
		document.getElementById('inputtexttextarea_1').value=textnamephoto;}
	else{
		general___swim_alert("Пожалуйста, приложите фотографию");
		return false;}
	return true;}*/