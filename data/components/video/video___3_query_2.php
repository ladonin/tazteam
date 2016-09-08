<?php
$query="
SELECT
	video.id as id,
	video.themepage as themepage,
	video.video_name as video_name
	FROM
		video
	WHERE id!='".GeneralGetVars::$var3."' AND themepage='".GeneralGetVars::$var2."'
	ORDER by id DESC";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>