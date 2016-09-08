<?php   
class GeneralImagesWork{
static public $imagesattached_for_redact=array();//массив с данными загруженных изображений для редактирования
static public $imagessource=array("source","name","size","width","height","type","format","error","nameinrecept","nameforloading");//массив с данными загруженных изображений
static public $imagesdestination=array("url","name","width_source","height_source","width","height","x","y","x_source","y_source");//массив с данными обрабатываемых итоговых изображений (width_source и height_source - габариты изымаемого участка с источника) 



static public $imagesnameslist="";//список имен изображений
static public $imagessizeslist="";//список размеров изображений


	
							
						

	



			

static public function resize_and_save($source,$path_to,$width_source,$height_source,$format,$x_source,$y_source,$width,$height,$x,$y,$quality,$bgcolor){
	$picfunc = 'imagecreatefrom'.$format; //какую функцию использовать для ее создания
	
	$picsource  = $picfunc($source);//создаем переменную исходного изображения
	$picout = imagecreatetruecolor($width, $height);// Создание итогового изображения в переменной
	imagefill($picout, 0, 0, $bgcolor); // Заполнение её цветом
	imagecopyresampled($picout,$picsource,$x,$y,$x_source,$y_source,$width,$height,$width_source,$height_source);//вносим в нашу переменную обработанное изображение исходника
	if ($format=="jpeg"){
		if (imagejpeg($picout, $path_to, $quality)==true) {// Создание файла итогового изображения
			imagedestroy($picsource);// Очистка памяти
			imagedestroy($picout);// Очистка памяти
			return true;}}
	else if ($format=="png"){
		if (imagepng($picout, $path_to, 0)==true) {// Создание файла итогового изображения
			imagedestroy($picsource);// Очистка памяти
			imagedestroy($picout);// Очистка памяти
			return true;}}
	else if ($format=="gif"){
		if (imagepng($picout, $path_to)==true) {// Создание файла итогового изображения
			imagedestroy($picsource);// Очистка памяти
			imagedestroy($picout);// Очистка памяти
			return true;}}
	return false;}

	
	
static public function delete_imagesbynumberfromarrayreception($i){//удаляем главную данную (по которой определяем её наличие) изображения из массива исходника
	if (isset(self::$imagessource["source"][$i])){self::$imagessource["source"][$i]=0;}}
	
	
	
static public function delete_imagesbynumber($i,$what){//удаляем картинку с 1 по $i включительно
	$imagessizesarray=GeneralImagesCalculate::return_imagessizesarray_name();//определяем массив требуемых размеров изображений
	for ($j=1; $j<=$i; $j++){//для каждого изображения		
		if ($imagessource['source'][$j]){//если изображение есть				
			if (($what=="files")||($what=="all")){//из файлов
				foreach ($imagessizesarray as $key=>$value){//для каждого вида текущего изображения в папке files
				$path_to=GeneralUploadBasic::detectpathfile("images",$key."_".GeneralImagesWork::$imagessource['nameforloading'][$j],0);//полный адрес назначения вида текущего изображения
				GeneralFiles::delete($path_to);}}
			if (($what=="reception")||($what=="all")){//из времянки
				GeneralFiles::delete(GeneralGlobalVars::pathtoreception."/".GeneralImagesWork::$imagessource['nameinrecept'][$j]);}
			self::delete_imagesbynumberfromarrayreception($j);}}}//удаляем главную данную изображения из массива исходника
			
			
			
static public function delete_oneimagebynumber($i,$what){//удаляем картинку по номеру
	if ($imagessource['source'][$i]){//если изображение есть
		$imagessizesarray=GeneralImagesCalculate::return_imagessizesarray_name();//определяем массив требуемых размеров изображений
		if (($what=="files")||($what=="all")){//из файлов
			foreach ($imagessizesarray as $key=>$value){//для каждого вида текущего изображения в папке files
			$path_to=GeneralUploadBasic::detectpathfile("images",$key."_".GeneralImagesWork::$imagessource['nameforloading'][$i],0);//полный адрес назначения вида текущего изображения
			GeneralFiles::delete($path_to);}}
		if (($what=="reception")||($what=="all")){//из времянки
			GeneralFiles::delete(GeneralGlobalVars::pathtoreception."/".GeneralImagesWork::$imagessource['nameinrecept'][$i]);}
		self::delete_imagesbynumberfromarrayreception($i);}}//удаляем главную данную изображения из массива исходника					
			
			


static public function set_lists_from_array_of_attached_images_for_redact(){//формируем список изображений редактируемого сообщения (имена, и размеры) для редактируемого сообщения
	foreach(self::$imagesattached_for_redact as $key=>$value){
		if ($value['width']){
			self::$imagesnameslist.=" ".$key." ";
			self::$imagessizeslist.=" ".$value['width']."x".$value['height']." ";}}}





static public function hard_delete_oneimagebynumber($name){//жестко удаляем картинку по имени из файлов
	$imagessizesarray=GeneralImagesCalculate::return_imagessizesarray_name();//определяем массив требуемых размеров изображений
	foreach ($imagessizesarray as $key=>$value){//для каждого вида текущего изображения в папке files
		$namecur=str_replace(".","_".$key.".",$name);//имя изображения для каждого вида размеров
		$path_to=GeneralUploadBasic::detectpathfile("images",$namecur,0);//полный адрес назначения вида текущего изображения
		GeneralFiles::delete($path_to);}}






static public function set_cur_calculated_values_to_array_imagesdestination($i,$key){//перемещаем временные переменные в массив
self::$imagesdestination['width'][$i][$key]=GeneralImagesCalculate::$cur_width;
self::$imagesdestination['height'][$i][$key]=GeneralImagesCalculate::$cur_height;
self::$imagesdestination['width_source'][$i][$key]=GeneralImagesCalculate::$cur_width_source;
self::$imagesdestination['height_source'][$i][$key]=GeneralImagesCalculate::$cur_height_source;
self::$imagesdestination['x'][$i][$key]=GeneralImagesCalculate::$cur_x;
self::$imagesdestination['y'][$i][$key]=GeneralImagesCalculate::$cur_y;
self::$imagesdestination['x_source'][$i][$key]=GeneralImagesCalculate::$cur_x_source;
self::$imagesdestination['y_source'][$i][$key]=GeneralImagesCalculate::$cur_y_source;}

}

?>