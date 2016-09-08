<?php
$query="
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
	automarket.power as power,
	automarket.number_views as number_views,    
	automarket.run as run,    
	automarket.motor_type as motor_type,
	automarket.region as region
    
	FROM
		automarket ";
	if (AutomarketBase::$condition_main) {
	$query.=AutomarketBase::$condition_main." ";}
    

    
    
    
    
	$query.=" ORDER by ".AutomarketBase::$order_main." ";
    
    
    $query.=" 
	LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage;
	$res=GeneralMYSQL::query($MSQLc,$query);
?>