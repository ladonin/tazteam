<?php   
class TestsBase{

static public $id=0;//id объ€влени€

//фотографии объ€влени€
static public $img1=0;

//размеры фотографий
static public $width1=0;

static public $height1=0;

static public $img1_cur;//временное значение src изображени€ (дл€ дополнительных объ€влений)


static public $themepage=1;


static public function detect_themepage(){
	if (GeneralGetVars::$var2===1) {self::$themepage=1;}
	else if (GeneralGetVars::$var2===2) {self::$themepage=2;}}
		
			
			
			
}

?>