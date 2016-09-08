<?php
$query="
SELECT
	automarket.id as id,
	automarket.id_user as id_user,
	automarket.date_create as date_create,
	automarket.number_views as number_views,
	automarket.name as name,
	automarket.themepage as themepage,
	automarket.photo as photo,
	automarket.img as img,
	automarket.img_sizes as img_sizes,
	automarket.content as content,
	automarket.mark as mark,
	automarket.model as model,
	automarket.year_production as year_production,
	automarket.price as price,
	automarket.price_int as price_int,
	automarket.run as run,
	automarket.run_int as run_int,
	automarket.motor_vol as motor_vol,
	automarket.motor_type as motor_type,
	automarket.power as power,
	automarket.state as state,
	automarket.customs as customs,
	automarket.changing as changing,
	automarket.color as color,
	automarket.color_hex as color_hex,
	automarket.basket_type as basket_type,
	automarket.drive_type as drive_type,
	automarket.KPP as KPP,
	automarket.presense as presense,
	automarket.country_producer as country_producer,
	automarket.city as city,
	automarket.region as region,
	automarket.phone as phone,
	automarket.seller as seller,
	automarket.abs as abs,
	automarket.gbo as gbo,
	automarket.computer as computer,
	automarket.conditioner as conditioner,
	automarket.disks as disks,
	automarket.disk_size as disk_size,
	automarket.warm_chair as warm_chair,
	automarket.guard as guard,
	automarket.parktronik as parktronik,
	automarket.security_pillows as security_pillows,
	automarket.salon as salon,
	automarket.toned as toned,
	automarket.amplifier_rudder as amplifier_rudder,
	automarket.electro_gas as electro_gas,
	automarket.electro_glass_up as electro_glass_up,
	automarket_source.content_nacked as content_nacked
	FROM
		automarket
	LEFT JOIN automarket_source
		ON automarket_source.id=automarket.id	
 WHERE id='".GeneralGetVars::$num_page."'		
	LIMIT 1

	";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>