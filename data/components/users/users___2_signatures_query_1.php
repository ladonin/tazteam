<?php
$query="
	SELECT
		signatures
	FROM 
		registrated_users___signaturing
	WHERE
		id_user='".UsersMyData::$id."'
	";
//echo($query);
$res=GeneralMYSQL::query($MSQLc,$query);
?>