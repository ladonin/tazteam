<?php
class GeneralImagesPreload{

	static $images=array();
	static $listimages="";
	
	static public function input($image){
		array_push(self::$images,$image);}

	static public function output(){
		foreach(self::$images as $value){
			self::$listimages.="'http://instorage.org/portfolio/tazteam/".$value."',";}	
		self::$listimages.="'http://instorage.org/portfolio/tazteam/images/index/index___top_menu_fon_hover.png'";
		return self::$listimages;}
		
		
		
	static public function update_photos($service,$url,$format){
		if ($service=="users_ava"){
			foreach(GeneralImagesCalculate::$imagessizes_users_ava as $key=>$value){
				if ($key!=1){//большие картинки не будем
					self::input($url."_".$key.".".$format."?id=".GeneralGlobalVars::$timeunix); }}
		}
	}	
		
		
}
?>