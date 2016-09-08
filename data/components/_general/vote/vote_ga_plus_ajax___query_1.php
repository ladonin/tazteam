<?php 
$query="
	UPDATE 		photo___photos_".$getvar2."
	SET 		vote=CONCAT(vote,' ".UsersMyData::$id." '), rank=rank+1
	 WHERE id_topic='".$getvar3."' AND id_photo='".$idphoto."' AND vote NOT LIKE '% ".UsersMyData::$id." %' LIMIT 1";
$res=GeneralMYSQL::query_update($MSQLc, $query);
?>