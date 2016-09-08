<?php
$query="
SELECT
	market.id as id,
	market.id_user as id_user,
	market.date_create as date_create,
	market.number_views as number_views,
	market.name as name,
	market.themepage as themepage,
	market.photo as photo,
	market.img as img,
	market.img_sizes as img_sizes,
	market.content as content,
	market.mark as mark,
	market.model as model,
	market.year_production as year_production,
	market.price as price,
	market.price_int as price_int,
	market.run as run,
	market.run_int as run_int,
	market.motor_vol as motor_vol,
	market.motor_type as motor_type,
	market.power as power,
	market.state as state,
	market.customs as customs,
	market.changing as changing,
	market.color as color,
	market.color_hex as color_hex,
	market.basket_type as basket_type,
	market.drive_type as drive_type,
	market.KPP as KPP,
	market.presense as presense,
	market.country_producer as country_producer,
	market.city as city,
	market.region as region,
	market.phone as phone,
	market.seller as seller,
	market.abs as abs,
	market.gbo as gbo,
	market.computer as computer,
	market.conditioner as conditioner,
	market.disks as disks,
	market.disk_size as disk_size,
	market.warm_chair as warm_chair,
	market.guard as guard,
	market.parktronik as parktronik,
	market.security_pillows as security_pillows,
	market.salon as salon,
	market.toned as toned,
	market.amplifier_rudder as amplifier_rudder,
	market.electro_gas as electro_gas,
	market.electro_glass_up as electro_glass_up,
	
	topic_autor.gen_login_user AS t_login_user,
	topic_autor.site_mail_user AS t_mail_user,
	topic_autor.gen_name_user AS t_name_user,
	topic_autor.gen_surname_user AS t_surname_user,
	topic_autor.site_login_status AS t_login_status,
	topic_autor.gen_timecoming AS t_timecoming,
	
	topic_autor.dir_user AS t_dir_user,	
	topic_autor.gen_photo AS t_gen_photo,	
	topic_autor.site_photo_format AS t_site_photo_format,
	topic_autor.sn_photo_url_from_small AS t_sn_photo_url_from_small,
	topic_autor.sn_photo_url_from_huge AS t_sn_photo_url_from_huge

	FROM
		(SELECT * FROM automarket WHERE id='".GeneralGetVars::$var3."' LIMIT 1)
		AS market
	LEFT JOIN
			registrated_users___main_data AS topic_autor
		ON  
			topic_autor.id_user=market.id_user
	";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>