<?php   
class GeneralFiles{

static public function delete($url){//удаление файла
	if (is_file($url)){
		unlink($url);}}
		
static function deletedir($url){			
	if ($objs = glob($url."/*")) {	
		foreach($objs as $obj) {
			is_dir($obj) ? removeDirRec($obj) : unlink($obj);}}
		rmdir($url);}
	
	
	
	
	
}











?>