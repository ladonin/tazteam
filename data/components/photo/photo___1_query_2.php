<?php
	$query2="	
	SELECT
		t1.id_photo_last as id_photo,
		t1.id_topic as id_topic,		
		t2.format_photo as format_photo,
		t2.page_photo as page_photo		
		FROM 
			(SELECT	MAX(id_photo) as id_photo_last, id_topic FROM photo___photos_".$current_var2." GROUP BY id_topic ORDER BY id_topic DESC LIMIT 4) as t1
		LEFT JOIN 
			photo___photos_".$current_var2." as t2
		ON t1.id_photo_last=t2.id_photo AND t1.id_topic=t2.id_topic	
		";
$res2=GeneralMYSQL::query($MSQLc,$query2);
?>