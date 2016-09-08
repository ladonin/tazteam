<?php   
class GeneralDirectories{



static public function detect_dir_user($id)//определение директории для пользователя (установлено 1 к 1000)
{
	return (floor($id/1000)+1);		
}

}

?>