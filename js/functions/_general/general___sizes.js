var window_width=0;
window_width=$(window).width();
var window_height=0;
window_height=$(window).height();
var width_left_panel=195;//ширина левой панели сайта

var height_body=0;//высота окна, для каждой страницы расчитывается далее по своему
//height_body=window_height-20;//-20 - поправка по высоте рекламы
height_body=window_height-95;//-95 - поправка по высоте рекламы
//height_body=window_height;
var window_site_body_width=0;
window_site_body_width=window_width-width_left_panel-10-20;//включая отступы слева и справа -  ширина тела сайта справа

//window_site_body_width и window_width могут обновиться, если появляется справа рекламная панель





var photo_width_right_panel=0;
var photo_width=0;//расчитываемая ширина для фотографии
var photo_height=0;//расчитываемая высота для фотографии
var photo_width_img=0;
var photo_height_img=0;
var photo_img_url="";
var photo_img_full_url="";
var photo_img_format="";
var photo_img_size=1;



var automarket_description_width=0;//x1 ширина описания авто
var automarket_block_photo_width=0;//x2 ширина блока большого фото авто
var automarket_block_photo_height=0;//высота блока большого фото авто
var automarket_photo_width=0;//ширина большого фото авто
var automarket_photo_height=0;//высота большого фото авто
var automarket_under_photo_photos_width=0;//x3 ширина маленьких фото под большим фото авто
var automarket_added_announcement_width=0;//x4 ширина блока одного дополнительного объявления
var automarket_added_announcements_photo_width=0;//x5 ширина фото дополнительного объявления
var automarket_added_announcements_description_width=130+10-32;//включая отступ 10 пиксел слева от фото - ширина описания дополнительного объявления 32 - отступы и граница
var automarket_added_announcements_height=22;//высота дополнительного объявления


if (general___browser()=="IE") {// тут пишем обработчик для IE браузера
automarket_added_announcements_description_width-=5;//корректируем размер
automarket_added_announcements_height-=5;//корректируем размер
}
var automarket_added_announcements_div_width=0;//x6 ширина общего окна дополнительных объявлений
var automarket_added_announcements_div_height=0;//x7 высота общего окна дополнительных объявлений
var automarket_img_url="";	//не нужный вариант
var automarket_img_photo="";
var automarket_full_url="";
var automarket_added_announcements_right_flag;//дополнительные объявления справа или снизу





var users_description_width=0;//x1 ширина описания авто
var users_block_photo_width=0;//x2 ширина блока большого фото авто
var users_photo_width=0;//ширина большого фото авто
var users_photo_height=0;//высота большого фото авто
var users_added_announcement_width=200;// ширина блока одного дополнительного объявления
var users_added_announcements_photo_width=50;//ширина фото дополнительного объявления
var users_added_announcements_photo_height=50;//высота фото дополнительного объявления
var users_added_announcements_description_width=170+10-32-10-5;//включая отступ 10 пиксел слева от фото - ширина описания дополнительного объявления 32 - отступы и граница 10 - отступ слева от соседа 5 - онлайн полоска
//чтобы изменить ширину users_added_announcements_description_width, нужно и там изменить и в users_added_announcements_div_width_min, т.к. они связаны


var users_added_announcements_height=22;//высота дополнительного объявления
if (general___browser()=="IE") {// тут пишем обработчик для IE браузера
	users_added_announcements_description_width-=5;//корректируем размер
	users_added_announcements_height-=5;}//корректируем размер
var users_added_announcements_div_width=0;//x3 ширина общего окна дополнительных объявлений
var users_added_announcements_div_height=0;//x5 высота общего окна дополнительных объявлений

var users_block_photo_width_min=200;
var users_block_photo_width_max=300;
var users_added_announcements_div_width_min=230;

var users_added_announcements_right_flag=1;




//для главной страницы
var	photo_top_users_width=100; //какая ширина у фоток топ пользователей (по умолчанию перед переопределением для подгонки по размерам)
var	photo_best_tazes_width=170; //какая ширина у фоток лучших тазов (по умолчанию перед переопределением для подгонки по размерам)
var	photo_best_mems_width=170; //какая ширина у фоток лучших мемов (по умолчанию перед переопределением для подгонки по размерам)

var	photo_tazes_day_width=170;//топ твоё авто
var	table_automarket_vaz_width=250;//авторынок ширина общей таблицы








var number_photos=0; //текущая переменная - сколько всего фотографий в строке







function general___set_sizes(directory,what){//what   с кем работаетм в отдельности
	if (directory=="photo"){
	
	

	
		height_body-=75;//поправка по высоте верхней панели (у каждой страницы своя)
	
	
		//photo_width_img=$('#'+id).width();	//photo_height_img=$('#'+id).height();	////знаем ширину окна, подстраиваем ширину картинки под ширину окна		//if (window_width<1400) {photo_width_right_panel=390;}		//else {photo_width_right_panel=650;}		//photo_width=window_width-width_left_panel-photo_width_right_panel;		//photo_height=Math.floor((photo_width*photo_height_img)/photo_width_img);		//определяем реальные размеры фото
		photo_height=height_body-35-38;
		photo_width=Math.floor((photo_height*photo_width_img)/photo_height_img);

		//проверяем какая ширина получится у правой панели
		photo_width_right_panel=window_width-width_left_panel-photo_width;
		if (photo_width_right_panel<290) {//если очень узко
			photo_width=window_width-290-width_left_panel;//сужаем фото, чтобы правая ранель была с минимальной шириной 290 пиксел
			photo_height=Math.floor((photo_width*photo_height_img)/photo_width_img);}//на этом основании вычисляем новую высоту

		//по ширине будущего фото определяем файл с каким размером будет загружен
		if (photo_width>1500) {photo_img_size=9;}
		else if (photo_width>1000) {photo_img_size=8;}
		else if (photo_width>500) {photo_img_size=7;}		
		else {photo_img_size=6;}}






	if (directory=="users"){
		height_body-=68;//поправка по высоте верхней панели (у каждой страницы своя)
		/*
		var users_description_width=0;//x1 ширина описания авто
		var users_block_photo_width=0;//x2 ширина блока большого фото авто
		var users_added_announcements_div_width=0;//x3 ширина общего окна дополнительных объявлений
		var users_block_photo_width_min=200;
		var users_block_photo_width_max=400;
		var users_added_announcements_div_width_min=200;
		*/
		





		//x1 users_description_width определен на странице
		Y=window_site_body_width-users_description_width-15;//включая отступ от скролла



		
			if (window_width<(1152-20)) { //[0-1152) - список участников внизу
				users_block_photo_width=Y+10-5;//+10 потому что у нас не отступа слева, описание не имеет отступа, а список участников внизу +5 - клин
				users_added_announcements_height+=users_added_announcements_photo_width;
				users_added_announcements_div_width=window_site_body_width;	
				users_added_announcements_div_height=users_added_announcements_height+users_added_announcements_height_toptext;
				users_added_announcements_right_flag=0;	

			if (users_block_photo_width<users_block_photo_width_min){//alert(3);//если все же в итоге не получилось, фото меньше максимального размера
				users_block_photo_width=users_block_photo_width_min;}
				
				return true;}				
			else if (window_width<(1280-20)){//[1152-1280)
				users_block_photo_width_max=300;}//ставим таким, так лучше				
			else if (window_width<(1366-20)){//[1280-1366)			
				if (window_height<(950-20)){users_block_photo_width_max=350;}//[0-850)=высота окна в браузере
				else {users_block_photo_width_max=400;}}//ставим таким, так лучше			
			else if (window_width<(1440-20)){//[1366-1440)
				users_block_photo_width_max=300;}//ставим таким, так лучше	
			else if (window_width<(1600-20)){//[1440-1600)
				users_block_photo_width_max=300;}//ставим таким, так лучше	
			else if (window_width<(1680-20)){//[1600-1680)
				users_block_photo_width_max=300;}//ставим таким, так лучше	
			else if (window_width<(1920-20)){//[1680-1920)
				users_block_photo_width_max=350;}//ставим таким, так лучше	
			else {//[1920-
				users_block_photo_width_max=400;}//ставим таким, так лучше		
		
		if (Y<users_block_photo_width_max){
			users_added_announcements_div_width=users_added_announcements_div_width_min;
			users_block_photo_width=users_block_photo_width_min;}
		else if ((Y-users_block_photo_width_max)<=users_added_announcements_div_width_min){
			users_block_photo_width=Y-users_added_announcements_div_width_min;
			users_added_announcements_div_width=users_added_announcements_div_width_min;}
		else {//if ((Y-users_block_photo_width_max)>users_added_announcements_div_width_min){
			N=Math.floor((Y-users_block_photo_width_max)/users_added_announcements_div_width_min);
			Z=users_added_announcements_div_width_min*N;
			users_block_photo_width=Y-Z;
			
			if (users_block_photo_width>users_block_photo_width_max){//alert(1);
				N++;
				Z=users_added_announcements_div_width_min*N;//пересчитываем ширину x3 и x2 
				users_block_photo_width=Y-Z;}

			//клин, когда много доп пользователей и маленькое фото основного пользователя
			if ((users_block_photo_width<(users_block_photo_width_min+100))&&(N>1)){
				N--;//alert(2);
				Z=users_added_announcements_div_width_min*N;//пересчитываем ширину x3 и x2 
				users_block_photo_width=Y-Z;}				
				
			users_added_announcements_div_width=Z;	/*Z=Y-users_block_photo_width*/		
			
			if (users_block_photo_width>users_block_photo_width_max){//alert(3);//если все же в итоге не получилось, фото больше максимального размера
				R=users_block_photo_width-users_block_photo_width_max;//всего сколько получилось разницы				
				users_block_photo_width=users_block_photo_width_max;//уменьшили фотку
				//увеличиваем все блоки на одной строке
				T=Math.ceil(R/N);//каждому прибавляем по T				
				users_added_announcements_description_width+=T;
				users_added_announcements_div_width+=R;}
				
			if (users_block_photo_width<users_block_photo_width_min){//alert(3);//если все же в итоге не получилось, фото меньше максимального размера
				users_block_photo_width=users_block_photo_width_min;}}
			

			users_added_announcements_div_height=height_body+users_added_announcements_height_toptext;//x7 высота общего окна дополнительных объявлений - сколько их поместится по вертикали + поправка по верху
			users_added_announcements_height+=users_added_announcements_photo_width;
			
			//alert(N+" N");			
			//alert(window_site_body_width+" window_site_body_width");
			//alert(users_description_width+" users_description_width");
			//alert(users_block_photo_width+" users_block_photo_width");
			//alert(users_added_announcements_div_width+" users_added_announcements_div_width");

			users_added_announcements_div_width-=2;//подклиниваем
			users_added_announcements_description_width-=2;}

	if (directory=="automarket"){
		height_body-=102;//поправка по высоте верхней панели (у каждой страницы своя)
		//дополнительные объявления внизу
		if (window_width<(1280-20)) { //[0-1280)
			automarket_description_width=Math.floor((window_site_body_width/2)-5);//x1, учитывая что между x1 и x2 расстояние 10 пиксел
			automarket_block_photo_width=automarket_description_width;//x2=x1	
			automarket_block_photo_height=automarket_block_photo_width;
			automarket_photo_width=automarket_block_photo_width-2;//учитывая границу 1 пиксел			
			automarket_photo_height=automarket_photo_width;	
			automarket_under_photo_photos_width=Math.floor((automarket_block_photo_width/5)-5);//x3, включая отступы между фотками = 4 по 5 пиксел, всего фоток 5
			automarket_added_announcements_photo_width=85;//ставим таким, так лучше	
			automarket_added_announcement_width=automarket_under_photo_photos_width+automarket_added_announcements_description_width+10;//x4, включая отступ слева от соседнего блока 10 пиксел;
			//automarket_added_announcements_photo_width=automarket_under_photo_photos_width;//x5
			automarket_added_announcements_height+=automarket_added_announcements_photo_width;
			automarket_added_announcements_div_width=window_site_body_width;//x6 ширина общего окна дополнительных объявлений
			automarket_added_announcements_div_height=automarket_added_announcements_height+automarket_added_announcements_height_toptext;//выравниваем по картинке
			automarket_added_announcements_right_flag=0;
			return true;}

			//дополнительные объявления справа
			else if (window_width<(1366-20)){//[1280-1366)
				automarket_description_width=390;//x1 // 550
				automarket_added_announcements_photo_width=100;}//ставим таким, так лучше			
			else if (window_width<(1440-20)){//[1366-1440)
				automarket_description_width=435;//x1 // 550
				automarket_added_announcements_photo_width=100;}//ставим таким, так лучше
			else if (window_width<(1600-20)){//[1440-1600)
				automarket_description_width=460;//x1 // 550
				automarket_added_announcements_photo_width=100;}//ставим таким, так лучше
			else if (window_width<(1680-20)){//[1600-1680)
				automarket_description_width=415;//x1 // 550
				automarket_added_announcements_photo_width=100;}//ставим таким, так лучше
			else if (window_width<(1920-20)){//[1680-1920)
				automarket_description_width=470;//x1 // 550
				automarket_added_announcements_photo_width=100;}//ставим таким, так лучше
			else {//[1920-
				automarket_description_width=435;//x1 // 550
				automarket_added_announcements_photo_width=100;}//ставим таким, так лучше
//alert(window_width);

				
			automarket_block_photo_width=automarket_description_width;//x2=x1	
			automarket_block_photo_height=automarket_block_photo_width;
			automarket_photo_width=automarket_block_photo_width-2;//учитывая границу 1 пиксел			
			automarket_photo_height=automarket_photo_width;	
			automarket_under_photo_photos_width=Math.floor((automarket_block_photo_width/5)-5);//x3, включая отступы между фотками = 5 по 5 пиксел, всего фоток 5			
			
			automarket_added_announcements_div_width=window_site_body_width-automarket_description_width-automarket_block_photo_width-10-10;//x6 ширина общего окна дополнительных объявлений, учитывая расстояние между x1 и x2, x2 и x6
			automarket_added_announcement_width=automarket_added_announcements_photo_width+automarket_added_announcements_description_width+10;//x4, включая отступ слева от соседнего блока 10 пиксел;			

			//растягиваем на всю ширину дополнительные объявления
			//########################
			count_inline=Math.floor(automarket_added_announcements_div_width/automarket_added_announcement_width);//сколько объявлений на строке
			automarket_added_announcements_description_width=Math.floor((automarket_added_announcements_div_width/count_inline)-automarket_added_announcements_photo_width-10-10-22);//задаем новый размер ширины описания x4 каждого дополнительного объявления
			automarket_added_announcements_div_width+=2;//подклиниваем
			automarket_added_announcements_description_width-=2;					
			//########################
			
			automarket_added_announcements_height+=automarket_added_announcements_photo_width;
			automarket_added_announcements_div_height=height_body/*+automarket_added_announcements_height_toptext*/;//x7 высота общего окна дополнительных объявлений - сколько их поместится по вертикали + поправка по верху
			automarket_added_announcements_right_flag=1;}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
	if (directory=="index"){//задаем размеры (ширину) фотография на главной странице сайта, чтобы они подгонялись полностью по ширине экрана пользователя, не создавая справа пробелов
		//что есть
			//window_site_body_width
			//photo_top_users_width - ширна фоток пользоватлеей
			//photo_gallery1_width - ширина фоток галереи (...1.. - потому что фотки из разныъх разделов могут быть заданы администратором в будущем с другими ширинами)
		//что нужно получить
			//new_photo_width - новая ширина фото - для каждого сервиса (может и раздела в будущем) определяется отдельно (текущая переменная, задается в ширину фотки)

		
		//для сервиса "топ пользователей"
		//текущие переменные переопределяем
		
		//(window_site_body_width-20) - убираем из ширины ширину скролла
		if (what=="top_users"){
			number_photos=Math.ceil((window_site_body_width-17)/photo_top_users_width);//сколько фото будет
			new_photo_width=Math.round((window_site_body_width-17)/number_photos)+1;//новая ширина фото
			//задать в идентификатор каждого фото из "топ пользователей" =  сделать уникальные идентификаторы для каждого фото и потом задать каждому идентификатору эту ширину
			for(var i=1; i<=17; i++){
			$('#top_user'+i).width(new_photo_width);
			$('#top_user'+i).height(new_photo_width);
			$('#top_users_div').width(window_site_body_width-17);
			$('#top_users_div').height(new_photo_width);}}
			


		/*if (what=="best_tazes"){
			number_photos=Math.ceil((window_site_body_width-20)/photo_best_tazes_width);//сколько фото будет
			new_photo_width=Math.floor((window_site_body_width-20)/number_photos);//новая ширина фото
			for(var i=1; i<=12; i++){
			$('#best_tazes'+i).width(new_photo_width);
			$('#best_tazes'+i).height(new_photo_width);
			$('#best_tazes_div').height(new_photo_width);}}*/



			
		if (what=="best_tazes"){
			number_photos=Math.ceil((window_site_body_width-17)/photo_best_tazes_width);//сколько фото будет
			new_photo_width=Math.round((window_site_body_width-17)/number_photos)+1;//новая ширина фото
			for(var i=1; i<=12; i++){
			$('#best_tazes'+i).width(new_photo_width);
			$('#best_tazes'+i).height(new_photo_width);
			$('#best_tazes_div').width(window_site_body_width-17);
			$('#best_tazes_div').height(new_photo_width);}}
			
			
			
			
		if (what=="best_mems"){
			number_photos=Math.ceil((window_site_body_width-17)/photo_best_mems_width);//сколько фото будет
			new_photo_width=Math.round((window_site_body_width-17)/number_photos)+1;//новая ширина фото
			for(var i=1; i<=12; i++){
			$('#best_mems'+i).width(new_photo_width);
			$('#best_mems'+i).height(new_photo_width);
			$('#best_mems_div').width(window_site_body_width-17);
			$('#best_mems_div').height(new_photo_width);}}			
			
			
			
			
		if (what=="tazes_day"){
			number_photos=Math.ceil((window_site_body_width-17)/photo_tazes_day_width);//сколько фото будет
			new_photo_width=Math.round((window_site_body_width-17)/number_photos)+1;//новая ширина фото
			for(var i=1; i<=12; i++){
			$('#tazes_day'+i).width(new_photo_width);
			$('#tazes_day'+i).height(new_photo_width);
			$('#tazes_day_div').width(window_site_body_width-17);
			$('#tazes_day_div').height(new_photo_width);}}			
			
			
		if (what=="automarket_vaz"){
			number_photos=Math.ceil((window_site_body_width-17+10)/table_automarket_vaz_width);//сколько будет, +10 - отступа слева не делаем
			new_photo_width=Math.round((window_site_body_width-17+10)/number_photos)+1;//новая ширина
			for(var i=1; i<=7; i++){
			$('#automarket_table_vaz'+i).width(new_photo_width-120);//учитывая остальные расстояния
			$('#automarket_div_vaz'+i).width(new_photo_width-120);}}//для обрезания текста, если будет вылезать за границы объявления
			
			

	}
			
			
			
			
			
			

}



