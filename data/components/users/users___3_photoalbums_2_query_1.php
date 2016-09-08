<?php
$query="
SELECT
	topics.id_album AS id_album,
	topics.id_user AS id_user,
	topics.name_album AS name_album,

	photos.last_id_photo AS id_photo,
	pf.format_photo AS format_photo,
	pf.dir_album AS dir_album,	
	pf.page_photo AS page_photo,
	photos.count_photo AS count_photo,	

	topic_autor.gen_login_user AS t_login_user,
	topic_autor.site_mail_user AS t_mail_user,
	topic_autor.gen_name_user AS t_name_user,
	topic_autor.gen_surname_user AS t_surname_user,
	topic_autor.site_login_status AS t_login_status

	FROM
		(SELECT pa.id_album, pa.id_user, pa.name_album
		FROM 
		registrated_users___photoalbums AS pa 
		";
	if (UsersPhotoalbumsBase::$condition_main){
		$query.=UsersPhotoalbumsBase::$condition_main;}

	if (UsersPhotoalbumsBase::$find_query_order){
		$query.=UsersPhotoalbumsBase::$find_query_order;}
	else {	
		$query.=" ORDER BY pa.id_album DESC";}
		
	$query.="
		LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage.") 
		AS topics
	LEFT JOIN 
			(SELECT MAX(pp.id_photo) last_id_photo, COUNT(pp.id_photo) count_photo,pp.id_user,pp.id_album FROM registrated_users___photoalbums_photos as pp ";

	if (UsersPhotoalbumsBase::$condition_main){
		$query.=UsersPhotoalbumsBase::$condition_main;}
			
	$query.=" GROUP BY pp.id_user,pp.id_album) as photos
		ON  
			photos.id_album=topics.id_album AND photos.id_user=topics.id_user
	LEFT JOIN
			registrated_users___photoalbums_photos AS pf
		ON  
			pf.id_photo=photos.last_id_photo AND pf.id_album=photos.id_album AND pf.id_user=photos.id_user
	LEFT JOIN
			registrated_users___main_data AS topic_autor
		ON  
			topic_autor.id_user=topics.id_user";
			


	$res=GeneralMYSQL::query($MSQLc,$query);		
?>



