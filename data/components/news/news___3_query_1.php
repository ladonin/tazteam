<?php
/*
	news.id_user as id_user,

	topic_autor.login_user AS t_login_user,
	topic_autor.mail_user AS t_mail_user,
	topic_autor.name_user AS t_name_user,
	topic_autor.surname_user AS t_surname_user,
	topic_autor.login_status AS t_login_status
*/
$query="
SELECT
	news.id as id,

	news.date_create as date_create,
	news.number_views as number_views,
	news.name as name,
	news.themepage as themepage,
	news.photo as photo,
	news.img as img,
	news.img_sizes as img_sizes,
	news.contenthtml as contenthtml


	FROM
		news WHERE id='".GeneralGetVars::$var2."' AND themepage='".NewsBase::$themepage."' LIMIT 1
	";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>