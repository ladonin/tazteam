<?php
$query="
SELECT
	automarket.id as id,
	automarket.power as power,
	automarket.id_user as id_user,
	automarket.name as name,
	automarket.themepage as themepage,
	automarket.img as img,
	automarket.mark as mark,
	automarket.model as model,
	automarket.year_production as year_production,
	automarket.price as price,
	automarket.city as city
FROM
	automarket ".$current_var2." 
ORDER BY id DESC LIMIT ".$current_var3;
$res=GeneralMYSQL::query($MSQLc,$query);
?>