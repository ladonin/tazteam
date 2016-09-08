<?php   
class GeneralImagesCrop{

static public $minsizecrop=100;//минимальный размер квадратной фотки (можно переопределить)


static public $image_url="";//исходник
static public $image_width="";
static public $image_height="";

static public $image_selection_first_x1="";
static public $image_selection_first_y1="";
static public $image_selection_first_x2="";
static public $image_selection_first_y2="";
static public $image_selection_first_w="";
static public $image_selection_first_h="";





static public function set_sizes(){
	$size = getimagesize(self::$image_url);	
	self::$image_width=$size[0];
	self::$image_height=$size[1];}
	
	
static public function set_selection_area(){
	if (self::$image_width>self::$image_height) {
		self::$image_selection_first_w=self::$image_height-20; self::$image_selection_first_h=self::$image_height-20; self::$image_selection_first_y1=10; self::$image_selection_first_x1=(self::$image_width-self::$image_height+20)/2; self::$image_selection_first_y2=self::$image_selection_first_y1+self::$image_selection_first_h; self::$image_selection_first_x2=self::$image_selection_first_x1+self::$image_selection_first_w;}

	if (self::$image_width<self::$image_height) {
		self::$image_selection_first_w=self::$image_width-20; self::$image_selection_first_h=self::$image_width-20; self::$image_selection_first_y1=(self::$image_height-self::$image_width+20)/2; self::$image_selection_first_x1=10; self::$image_selection_first_y2=self::$image_selection_first_y1+self::$image_selection_first_h; self::$image_selection_first_x2=self::$image_selection_first_x1+self::$image_selection_first_w;}

	if (self::$image_width==self::$image_height) 	{
		self::$image_selection_first_w=self::$image_width-20; self::$image_selection_first_h=self::$image_height-20; self::$image_selection_first_y1=10; self::$image_selection_first_x1=10; self::$image_selection_first_y2=self::$image_selection_first_y1+self::$image_selection_first_h; self::$image_selection_first_x2=self::$image_selection_first_x1+self::$image_selection_first_w;}}	
	
}

?>