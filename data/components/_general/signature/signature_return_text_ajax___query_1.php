<?php 
$query="
SELECT registrated_users___signaturing.signatures as sign, registrated_users___friendship.tohim as tohim
FROM
(	SELECT	signatures,id_user
	FROM 	registrated_users___signaturing
	WHERE	id_user='".UsersMyData::$id."'
	LIMIT 	1) as registrated_users___signaturing
LEFT JOIN
	registrated_users___friendship
ON 	registrated_users___friendship.id_user=registrated_users___signaturing.id_user";
$res=GeneralMYSQL::query($MSQLc, $query);
?>