<?php


echo(implode(",",UsersDialogs::$array_my_dialogs[1]['id_correspondence'])."<br>");










	/*id_user,
	dir_user,
	sn_id_user_vk,
	sn_id_user_ok,
	sn_id_user_mr,
	sn_id_user_ya,
	sn_id_user_go,
	sn_id_user_fb,
	gen_photo,
	site_photo_format,
	sn_photo_url_from_small,
	sn_photo_url_from_big,
	sn_photo_url_from_huge,
	gen_login_user,
	site_mail_user,
	gen_name_user,
	gen_surname_user,
	site_login_status*/
                
$query="";
foreach (UsersDialogs::$array_my_dialogs as $db=>$array){

//$db - ����� �������
//$array - ������


	
	
	/*
	UsersDialogs::$array_my_dialogs[$db]['id_correspondence']
	UsersDialogs::$array_my_dialogs[$db]['db']	
	UsersDialogs::$array_my_dialogs[$db]['who']	
	*/


$query.="(
SELECT * MAX(cm1.id_message) last_message
	FROM registrated_users___correspondence_messages_".$db." AS cm1
	GROUP by cm1.id_correspondence
	HAVING cm1.id_correspondence IN (".implode(",",UsersDialogs::$array_my_dialogs[$db]['id_correspondence']."

LEFT JOIN  registrated_users___correspondence_messages_".$db." cm2
	ON cm1.last_message=cm2.id_message
	
LEFT JOIN  registrated_users___main_data md
	ON cm2.last_message=cm2.id_message	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	FROM
		(SELECT ct.id_correspondence, ct.id_user1, ct.id_user2 
		FROM 
		registrated_users___correspondence_table AS ct
		ORDER BY ct.id_topic DESC 
		LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage.") 
		AS topics
	LEFT JOIN 
			(SELECT MAX(pp.id_photo) last_id_photo, COUNT(pp.id_photo) count_photo,pp.id_topic FROM photo___photos_".GeneralGetVars::$var2." as pp GROUP BY pp.id_topic) as photos
		ON  
			photos.id_topic=topics.id_topic
	LEFT JOIN
			photo___photos_".GeneralGetVars::$var2." AS pf
		ON  
			pf.id_photo=photos.last_id_photo AND pf.id_topic=photos.id_topic
	LEFT JOIN
			registrated_users___main_data AS topic_autor
		ON  
			topic_autor.id_user=topics.id_user
	ORDER BY topics.id_topic DESC
	";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>