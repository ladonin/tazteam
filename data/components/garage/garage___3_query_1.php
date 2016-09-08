<?php
$query="
SELECT
	garage.id as id,
	garage.id_user as id_user,
	garage.date_create as date_create,
	garage.number_views as number_views,

	garage.themepage as themepage,
	garage.photo as photo,
	garage.img as img,
	garage.img_sizes as img_sizes,
	garage.content as content,
	garage.mark as mark,
	garage.model as model,
	garage.year_production as year_production,

	garage.run as run,
	garage.run_int as run_int,
	garage.motor_vol as motor_vol,
	garage.motor_type as motor_type,
	garage.power as power,

	garage.color as color,
	garage.color_hex as color_hex,
	garage.basket_type as basket_type,
	garage.drive_type as drive_type,
	garage.KPP as KPP,

	garage.country_producer as country_producer,

	garage.abs as abs,
	garage.gbo as gbo,
	garage.computer as computer,
	garage.conditioner as conditioner,
	garage.disks as disks,
	garage.disk_size as disk_size,
	garage.warm_chair as warm_chair,
	garage.guard as guard,
	garage.parktronik as parktronik,
	garage.security_pillows as security_pillows,
	garage.salon as salon,
	garage.toned as toned,
	garage.amplifier_rudder as amplifier_rudder,
	garage.electro_gas as electro_gas,
	garage.electro_glass_up as electro_glass_up,
	
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
		(SELECT * FROM garage WHERE id='".GeneralGetVars::$var3."' LIMIT 1)
		AS garage
	LEFT JOIN
			registrated_users___main_data AS topic_autor
		ON  
			topic_autor.id_user=garage.id_user
	";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>