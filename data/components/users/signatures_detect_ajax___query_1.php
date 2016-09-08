<?php
$query="
	SELECT 
		forum3_signatures as asks_forum,

		((CASE forum2_signatures
		WHEN '' THEN 0
		ELSE 1
		END)
		+		
		(CASE photo3_signatures
		WHEN '' THEN 0
		ELSE 1
		END)
		+
		(CASE automarket3_signatures
		WHEN '' THEN 0
		ELSE 1
		END)
		+
		(CASE automarket2_signatures
		WHEN '' THEN 0
		ELSE 1
		END)
		+
		(CASE video2_signatures
		WHEN '' THEN 0
		ELSE 1
		END)
		+
		(CASE news3_signatures
		WHEN '' THEN 0
		ELSE 1
		END))
		AS other_news
	FROM 
		registrated_users___main_data 
	WHERE 
		id_user='".UsersMyData::$id."' 
	LIMIT 1";
echo($query);
$res=GeneralMYSQL::query($MSQLc,$query);
?>