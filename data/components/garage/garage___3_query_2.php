<?php




$query2="
SELECT
	garage.id as id,
	garage.id_user as id_user,
	garage.themepage as themepage,
	garage.img as img,
	garage.mark as mark,
	garage.model as model,
	garage.year_production as year_production,
	garage.power as power
	
FROM
	garage WHERE id!='".GeneralGetVars::$var3."' ";
	if (GarageBase::$find_query) {
		$query2.=" ".GarageBase::$find_query." ";}		
	if (GarageBase::$condition_added1) {
		$query2.="AND ".GarageBase::$condition_added1." ";}		

	
$query2.="ORDER BY id DESC LIMIT ".GarageBase::limit_added;	
	

	
	
	

	$res2=GeneralMYSQL::query($MSQLc,$query2);
?>