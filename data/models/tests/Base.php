<?php   
class TestsBase{

static public $id=0;//id ����������

//���������� ����������
static public $img1=0;

//������� ����������
static public $width1=0;

static public $height1=0;

static public $img1_cur;//��������� �������� src ����������� (��� �������������� ����������)


static public $themepage=1;


static public function detect_themepage(){
	if (GeneralGetVars::$var2===1) {self::$themepage=1;}
	else if (GeneralGetVars::$var2===2) {self::$themepage=2;}}
		
			
			
			
}

?>