<?php
class GeneralMYSQL{

	static public $random_list_for_in;


	static public function return_max_idkey($MSQLc,$db,$column){
		$query="SELECT MAX(".$column.") as maxidkey FROM ".$db;//echo($query);
		$res=self::query($MSQLc,$query);		
		$row=self::fetch_array($res);
		self::free($res);
		return $row['maxidkey'];}		


	static public function set_random_array_for_in($MSQLc,$db,$column,$count){
		$maxidkey=self::return_max_idkey($MSQLc,$db,$column);
		for ($i=1; $i<=$count;$i++){
			$limitcount=0;
			while(1){
				$limitcount++;
				$keyrand=rand(1, $maxidkey); 
				if (!isset($random_array_for_in[$keyrand])){
					$random_array_for_in[$keyrand]=1;
					break;}
				if ($limitcount>10){break;}}}
		self::$random_list_for_in=implode(",",array_keys($random_array_for_in));}
	
	
		
	


















	static public function connect($var){

    /*

		if ($var==1){                    		  		  		  
			$link=mysqli_connect("localhost","root","d5nj8numfvguj","tazteamDB");}
		return $link;
     */   
        
       

        @mysql_pconnect("localhost","quitecorg_taz","d5nj8n3umfvguj");
                      
          
     
		@mysql_select_db("quitecorg_taz");	   
        
        @mysql_query("SET NAMES utf8");

        
        return 1;
        }
	static public function close($MSQLc){	
	//	return 	mysqli_close($MSQLc);
        }
		
	static public function real_escape($MSQLc,$var){	
	   
       	return @mysql_real_escape_string($var);
	//	return mysqli_real_escape_string($MSQLc,$var);
        }		
		
	static public function query($MSQLc, &$query){	
		$curquery=$query;//помещаем во временную переменную
		
		if (UsersMyData::$id==1){
		//echo($query."<br><br>");
		}
		
		
		
		$query="";//очищаем память от огромного содержимого внешней переменной
        
        
        
        
        
        	//return 	mysqli_query($MSQLc,$curquery);}
        
                                                                        
		return 	@mysql_query($curquery);}
		
	static public function query_insert($MSQLc, &$query){
		return 	self::query($MSQLc, $query);}	
		
	static public function query_create($MSQLc, &$query){
		return 	self::query($MSQLc, $query);}		
		
	static public function query_update($MSQLc, &$query){	
		return 	self::query($MSQLc, $query);}	
	static public function query_delete($MSQLc, &$query){	
		return 	self::query($MSQLc, $query);}	
	static public function fetch_array($res){	
	   	//$var=mysqli_fetch_array($res,MYSQLI_ASSOC);//отладка 	   	   
		$var=@mysql_fetch_array($res);//отладка 
		//if (!$var) {
		//$backtrace = debug_backtrace();	/*отладка*/
		//echo ("Класс: <b>".$backtrace[1]['class']."</b><br>Вызывающая функция: <b>".$backtrace[1]['function']."</b><br>Номер строки:<b>".$backtrace[0]['line']."</b>");}
		return $var;}
		
		
	static public function num_rows($res){	
		$var=@mysql_num_rows($res);
		return $var;}		
		
		
		
		
		
	static public function free(&$res){
		@mysql_free_result($res);}

	static public function starttransaction($MSQLc){
		$query="SET AUTOCOMMIT=0;";
		return 	self::query($MSQLc, $query);}
	static public function rollbacktransaction($MSQLc){	
		$query="ROLLBACK;";
		return 	self::query($MSQLc, $query);}
	static public function committransaction($MSQLc){	
		$query="COMMIT;";
		return 	self::query($MSQLc, $query);}
	static public function startautocommittransaction($MSQLc){	
		$query="SET AUTOCOMMIT=1;";
		return 	self::query($MSQLc, $query);}		
}
?>