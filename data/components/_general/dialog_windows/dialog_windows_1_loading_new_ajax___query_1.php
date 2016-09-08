<?php
$query="
SELECT 
	id_message 
FROM 
	".$database." 
WHERE 
	id_message>='".$newmess."'";
if ($condition1) {$query.=" AND ".$database.".".$condition1;}	
if ($condition2) {$query.=" AND ".$database.".".$condition2;}
if ($condition3) {$query.=" AND ".$database.".".$condition3;}
if ($condition4) {$query.=" AND ".$database.".".$condition4;}
if ($condition5) {$query.=" AND ".$database.".".$condition5;}
$query.=" LIMIT 1";
$res=GeneralMYSQL::query($MSQLc,$query);
?>