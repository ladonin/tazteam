<?php
class GeneralAntibot{


static public $number=0;
static public $code=0;

static public function show()
{
	self::$number=rand(1, 10);  
	switch (self::$number){
	case 1 :self::$code="a7W4f"; break;
	case 2 :self::$code="7pENT"; break;
	case 3 :self::$code="5KCZT"; break;
	case 4 :self::$code="BSVHF"; break;
	case 5 :self::$code="BS9VK"; break;
	case 6 :self::$code="2TMDK"; break;
	case 7 :self::$code="9TABh"; break;
	case 8 :self::$code="h729h"; break;
	case 9 :self::$code="P77CM"; break;
	case 10 :self::$code="CY5H7"; break;
	}
	return "<img src=\"http://instorage.org/portfolio/tazteam/images/_general/antibot/".self::$number.".png\" width=\"80\" height=\"20\">";
}
}
?>