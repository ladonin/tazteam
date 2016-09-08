<?php




$query2="
SELECT
	automarket.id as id,
	automarket.id_user as id_user,
	automarket.name as name,
	automarket.themepage as themepage,
	automarket.img as img,
	automarket.mark as mark,
	automarket.model as model,
	automarket.year_production as year_production,
	automarket.price as price,
	automarket.city as city,
	automarket.power as power
	
FROM
	automarket WHERE id!='".GeneralGetVars::$var3."' ";
	if (AutomarketBase::$find_query) {
		$query2.=" ".AutomarketBase::$find_query." ";}		
	if (AutomarketBase::$condition_added1) {
		$query2.="AND ".AutomarketBase::$condition_added1." ";}		

	
$query2.="ORDER BY id DESC LIMIT ".AutomarketBase::limit_added;	
	

	
	
	

	$res2=GeneralMYSQL::query($MSQLc,$query2);
?>