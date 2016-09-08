<?php   
class GeneralImagesCalculate{


static public $imagessizesarray_name="";//имя массива изображений - если нужно - устанавливается там, где имя массива и имя сервиса не совпадают

static public $imagessizes="";//имя массива требуемых размеров изображений

//0 0 - реальные размеры исходника
//0 - фиксировать по любому размеру, но не больше заданного в limit	
//1 - обрезанный квадрат
//2 - фиксировать по ширине
//3 - фиксировать по высоте
//4 - обрезать с пропорциями указанного формата
static public $imagessizes_forum=array(//массив данных о размерах изображений форума
							1 =>array ("limit"=>0,"square"=>0),//0 - реальные размеры исходника
							2 =>array ("limit"=>350,"square"=>0));// - фиксировать по любому размеру, но не больше заданного в limit			
							/*,2 =>array ("limit"=>150,"square"=>1)*/
							
static public $imagessizes_photo=array(//массив данных о размерах изображений фотогалереи # похоже на $imagessizes_users_albums
							1 =>array ("limit"=>0,"square"=>0),//0 - реальные размеры исходника
							2 =>array ("limit"=>50,"square"=>1),
							3 =>array ("limit"=>75,"square"=>1),
							4 =>array ("limit"=>100,"square"=>1),
							5 =>array ("limit"=>210,"square"=>1),
							6 =>array ("limit"=>600,"square"=>2),//2 - фиксировать по ширине
							//7 =>array ("limit"=>1000,"square"=>2),
							//8 =>array ("limit"=>1500,"square"=>2),
							//9 =>array ("limit"=>2000,"square"=>2),
							10 =>array ("limit"=>248,"square"=>2),//в топе
                            11 =>array ("limit"=>array(320,240),"square"=>4),
                            12 =>array ("limit"=>array(192,120),"square"=>4),
                            13 =>array ("limit"=>array(128,80),"square"=>4));
							
							
static public $imagessizes_automarket=array(//массив данных о размерах изображений авторынка
							1 =>array ("limit"=>0,"square"=>0),//0 - реальные размеры исходника
							2 =>array ("limit"=>100,"square"=>1),
							3 =>array ("limit"=>600,"square"=>0),//был 900
							4 =>array ("limit"=>200,"square"=>1),
                            5 =>array ("limit"=>array(210,160),"square"=>4));
	
    
    
    
    
static public $imagessizes_garage=array(//массив данных о размерах изображений собственного авто
							1 =>array ("limit"=>0,"square"=>0),//0 - реальные размеры исходника
							2 =>array ("limit"=>100,"square"=>1),
							3 =>array ("limit"=>900,"square"=>0),
							4 =>array ("limit"=>200,"square"=>1),
                            5 =>array ("limit"=>array(300,200),"square"=>4));    
    
    
    
    
    
    						
static public $imagessizes_news=array(//массив данных о размерах изображений новостей
							1 =>array ("limit"=>0,"square"=>0),//0 - реальные размеры исходника
							2 =>array ("limit"=>100,"square"=>1),
							3 =>array ("limit"=>900,"square"=>0));

static public $imagessizes_articles=array(//массив данных о размерах изображений советов от тазтима
							1 =>array ("limit"=>0,"square"=>0),//0 - реальные размеры исходника
							2 =>array ("limit"=>100,"square"=>1),
							3 =>array ("limit"=>900,"square"=>0));							
							
							
							
static public $imagessizes_users_ava=array(//массив данных о размерах личных фото пользователей
							1 =>array ("limit"=>0,"square"=>0),//0 - реальные размеры исходника
							2 =>array ("limit"=>100,"square"=>1),
							3 =>array ("limit"=>400,"square"=>2),
							//4 =>array ("limit"=>900,"square"=>0),
							5 =>array ("limit"=>160,"square"=>1));
							
							
static public $imagessizes_users_album=array(//массив данных о размерах фото в фотоальбомах пользователей # похоже на $imagessizes_photo
							1 =>array ("limit"=>0,"square"=>0),//0 - реальные размеры исходника
							2 =>array ("limit"=>50,"square"=>1),
							3 =>array ("limit"=>75,"square"=>1),
							4 =>array ("limit"=>100,"square"=>1),
							5 =>array ("limit"=>210,"square"=>1),
							6 =>array ("limit"=>600,"square"=>2),//2 - фиксировать по ширине
							//7 =>array ("limit"=>1000,"square"=>2),
							//8 =>array ("limit"=>1500,"square"=>2),
							//9 =>array ("limit"=>2000,"square"=>2),
							10 =>array ("limit"=>248,"square"=>2));//в топе
													
							
							
							
							
static public $imagessizes_tests=array(//массив данных о размерах фото в фотоальбомах пользователей # похоже на $imagessizes_photo
							1 =>array ("limit"=>500,"square"=>2));//2 - фиксировать по ширине
							
							
							
							
							
static public $cur_width="";//вспомогательная временная ширина результирующая
static public $cur_height="";//вспомогательная временная высота результирующая

static public $cur_width_source="";//вспомогательная временная ширина исходника		
static public $cur_height_source="";//вспомогательная временная ширина исходника

static public $cur_x="";//вспомогательная временная позиция x результирующая		
static public $cur_y="";//вспомогательная временная позиция y результирующая	

static public $cur_x_source="";//вспомогательная временная позиция x исходника		
static public $cur_y_source="";//вспомогательная временная позиция y исходника					
							
							
static public $view_width="";//текущая ширина при отображении изображения на странице типа VIEW
static public $view_height="";//текущая высота  при отображении изображения на странице типа VIEW								
							
						
							
							
							
							
static public function set_size_for_image_in_view($textsize,$type){//задаем размеры для изображения (с нужным типом из массива размеров) на странице типа VIEW
		$textimagessizesarray=explode("x",$textsize);
		self::$view_width=$textimagessizesarray[0];
		self::$view_height=$textimagessizesarray[1];
		if ($type!=0){//если нужно пересчитывать размер для изображения		
		$imagessizesarray=self::${"imagessizes_".GeneralGetVars::$var1};//определяем массив видов изображения
		$limit=$imagessizesarray[$type]['limit'];
		$square=$imagessizesarray[$type]['square'];
		self::detect_xywh(0,0,$square,self::$view_width,self::$view_height,$limit,0);		
		self::$view_width=self::$cur_width;
		self::$view_height=self::$cur_height;}}
	
	
	
	
	
static public function return_size_to_photo($img, $size1, $size2) {//возвращаем размер фотографии
	return str_replace("_".$size1.".","_".$size2.".",$img);}		


static public function return_imagessizesarray_name() {//возвращаем имя массива размеров
	if (self::$imagessizesarray_name!="") {//если задан ранее, т.к. имя сервиса и имя массива не совпадают
		return self::${self::$imagessizesarray_name};}//определяем массив требуемых размеров изображений
	else {
		return self::${"imagessizes_".GeneralGetVars::$var1};}}//определяем массив требуемых размеров изображений
		




static public function detect_xywh($i,$key,$square,$width_source,$height_source,$limit,$to_array){//определение ширины, высоты и координат ($to_array - нужно ли нам перемещать потом все значения в массив или просто определить размеры)
	if ($limit==0) {//если берем реальные размеры исходника
		if ($width_source>$height_source) {
			$limit=$width_source;}
		else{
			$limit=$height_source;}}
	if ($square==0){//если фото прямоугольное (не обязательно квадратное)
		if ($width_source>$limit){
			if ($height_source>$limit){
				if ($width_source>$height_source){//определяем кто больше, чтобы от него плясать
					self::$cur_width=$limit;//устанавливаем ширине предельную допустимую
					self::$cur_height=floor(($limit/$width_source)*$height_source);}//уменьшаем высоту пропорционально
				else if ($width_source==$height_source){
					self::$cur_width=$limit;
					self::$cur_height=$limit;}
				else {
					self::$cur_height=$limit;
					self::$cur_width=floor(($limit/$height_source)*$width_source);}}
			else if ($height_source<=$limit){
				self::$cur_width=$limit;
				self::$cur_height=floor(($limit/$width_source)*$height_source);}}
		else if ($width_source<$limit){
			if ($height_source>$limit){
				self::$cur_height=$limit;
				self::$cur_width=floor(($limit/$height_source)*$width_source);}
			else if ($height_source<=$limit){
				self::$cur_width=$width_source;
				self::$cur_height=$height_source;}}
		else if ($width_source==$limit){
			if ($height_source>$limit){
				self::$cur_height=$limit;
				self::$cur_width=floor(($limit/$height_source)*$width_source);}
			else if ($height_source<=$limit){
				self::$cur_width=$width_source;
				self::$cur_height=$height_source;}}
		self::$cur_width_source=$width_source;
		self::$cur_height_source=$height_source;
		self::$cur_x_source=0;
		self::$cur_y_source=0;
		self::$cur_x=0;
		self::$cur_y=0;}
	else if ($square==1){//если фото квадратное
		if ($width_source>$height_source){
			self::$cur_width_source=$height_source;
			self::$cur_height_source=$height_source;
			self::$cur_x_source=floor(($width_source-$height_source)/2);
			self::$cur_y_source=0;}
		else if ($width_source<$height_source){
			self::$cur_width_source=$width_source;
			self::$cur_height_source=$width_source;
			self::$cur_x_source=0;
			self::$cur_y_source=floor(($height_source-$width_source)/2);}
		else if ($width_source==$height_source){
			self::$cur_width=$width_source;
			self::$cur_height=$height_source;
			self::$cur_x_source=0;
			self::$cur_y_source=0;}
		self::$cur_width=$limit;
		self::$cur_height=$limit;
		self::$cur_x=0;
		self::$cur_y=0;}
		
	else if ($square==2){//если фиксация по ширине
		self::$cur_width=$limit;
		self::$cur_height=floor(($limit/$width_source)*$height_source);

		self::$cur_width_source=$width_source;
		self::$cur_height_source=$height_source;
		self::$cur_x_source=0;
		self::$cur_y_source=0;
		self::$cur_x=0;
		self::$cur_y=0;}

	else if ($square==3){//если фиксация по высоте
		self::$cur_height=$limit;
		self::$cur_width=floor(($limit/$height_source)*$width_source);

		self::$cur_width_source=$width_source;
		self::$cur_height_source=$height_source;
		self::$cur_x_source=0;
		self::$cur_y_source=0;
		self::$cur_x=0;
		self::$cur_y=0;}
		
		








	else if ($square==4){//если фото обрезанное прямоугольное

        $delimiter=round($limit[0]/$limit[1],4);
    
		if ($width_source>($height_source*$delimiter)){//ширине нужно быть намного больше высоты, чтобы превысить её, или наоборот в зависимости от результата отношения

			self::$cur_width_source=floor($height_source*$delimiter);
			self::$cur_height_source=$height_source;
			self::$cur_x_source=floor(($width_source-self::$cur_width_source)/2);
			self::$cur_y_source=0;}
		else if ($width_source<($height_source*$delimiter)){
			self::$cur_width_source=$width_source;
			self::$cur_height_source=floor(self::$cur_width_source/$delimiter);
			self::$cur_x_source=0;
			self::$cur_y_source=floor(($height_source-self::$cur_height_source)/2);}
		else if ($width_source==($height_source*$delimiter)){
			self::$cur_width_source=$width_source;
			self::$cur_height_source=$height_source;
			self::$cur_x_source=0;
			self::$cur_y_source=0;}
		self::$cur_width=$limit[0];
		self::$cur_height=$limit[1];
		self::$cur_x=0;
		self::$cur_y=0;}











		
		
		if ($to_array==1){//если нужно - перемещаем все значения в массив GeneralImagesWork::$imagesdestination
			GeneralImagesWork::set_cur_calculated_values_to_array_imagesdestination($i,$key);}}
}

?>