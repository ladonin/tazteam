<?php
$query="
	INSERT 
	INTO ".$database." 
	VALUES(".$value1;
	for ($i=2;$i<=$valuesnumber;$i++){
		$valuevar="value".$i;
		$query.=",".$$valuevar;}
	$query.=")";//echo($query);
GeneralMYSQL::query_insert($MSQLc,$query);
?>