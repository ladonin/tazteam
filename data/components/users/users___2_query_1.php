<?php
$query="
SELECT
	* 
FROM
	registrated_users___main_data 
LEFT JOIN
	registrated_users___making_by 
ON  
	registrated_users___making_by.id_user=registrated_users___main_data.id_user 
LEFT JOIN
	registrated_users___added_data
ON  
	registrated_users___added_data.id_user=registrated_users___main_data.id_user
	
	
	
LEFT JOIN
	registrated_users___friendship
ON  
	registrated_users___friendship.id_user=registrated_users___main_data.id_user 	
	
	
	
	
	
	
	
WHERE 
	registrated_users___main_data.id_user='".GeneralGetVars::$var2."' 
LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>




