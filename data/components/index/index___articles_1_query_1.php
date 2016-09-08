<?php
$query="
	SELECT 
		id,
		name,
		themepage
	FROM news
	WHERE ".$current_var1."
	ORDER by ".$current_var2." LIMIT ".$current_var3;
	$res=GeneralMYSQL::query($MSQLc,$query);
?>