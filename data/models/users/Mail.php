<?php
class UsersMail{

static public $to;
static public $subject;
static public $header;
static public $text;

const from="-f administration@mapstore.org/my_portfolio/tazteam.net";


static public function send(){
	mail(self::$to, self::$subject, self::$text, self::$header, self::from);}












	}








