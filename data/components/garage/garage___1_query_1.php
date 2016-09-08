<?php
$query="
SELECT
	garage.id as id,
	garage.id_user as id_user,
	garage.themepage as themepage,
	garage.img as img,
	garage.mark as mark,
	garage.model as model,
	garage.year_production as year_production,
	garage.power as power,
	garage.number_views as number_views,    
	garage.run as run,    
	garage.motor_type as motor_type,

    
    
	topic_autor.gen_login_user AS t_login_user,
	topic_autor.site_mail_user AS t_mail_user,
	topic_autor.gen_name_user AS t_name_user,
	topic_autor.gen_surname_user AS t_surname_user,
	topic_autor.site_login_status AS t_login_status    
  
	FROM
		garage 
        LEFT JOIN
			registrated_users___main_data AS topic_autor
		ON  
			topic_autor.id_user=garage.id_user ";
	if (GarageBase::$condition_main) {
	$query.=GarageBase::$condition_main." ";}
	$query.="	

	ORDER by garage.id DESC
	LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage;
	$res=GeneralMYSQL::query($MSQLc,$query);
?>