<?php
$query2="
	SELECT
		id_message
	FROM			
		".$database."
	WHERE id_message<'".$start."'";
	if ($condition1) {$query2.=" AND ".$database.".".$condition1;}	
	if ($condition2) {$query2.=" AND ".$database.".".$condition2;}
	if ($condition3) {$query2.=" AND ".$database.".".$condition3;}
	if ($condition4) {$query2.=" AND ".$database.".".$condition4;}
	if ($condition5) {$query2.=" AND ".$database.".".$condition5;}
	$query2.="
	ORDER BY 
		id_message DESC LIMIT 1";
$res2=GeneralMYSQL::query($MSQLc,$query2);
?>