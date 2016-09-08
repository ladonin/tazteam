<?php 
$query="
	UPDATE 		registrated_users___photoalbums_photos
	SET 		vote=REPLACE(vote,' ".UsersMyData::$id." ',''), rank=rank-1
	WHERE id_user='".$getvar2."' AND id_album='".$getvar4."'  AND id_photo='".$idphoto."' AND vote LIKE '% ".UsersMyData::$id." %' LIMIT 1";
$res=GeneralMYSQL::query_update($MSQLc, $query);
?>