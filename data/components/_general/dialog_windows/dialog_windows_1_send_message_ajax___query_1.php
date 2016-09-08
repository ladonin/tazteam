<?php
$query="
	SELECT id_message
	FROM ".$database." 
	WHERE 1";
	if ($condition1) {$query.=" AND ".$condition1;}
	if ($condition2) {$query.=" AND ".$condition2;}
	if ($condition3) {$query.=" AND ".$condition3;}
	if ($condition4) {$query.=" AND ".$condition4;}
	if ($condition5) {$query.=" AND ".$condition5;}	
	$query.=" ORDER BY id_message DESC
	LIMIT 1";//echo($query);
$res=GeneralMYSQL::query($MSQLc,$query);
?>