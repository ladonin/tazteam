<?php
$query="
SELECT
	video.id as id,
	video.themepage as themepage,
	video.video_name as video_name,
	video.video_code as video_code
	FROM
		video
	WHERE id='".GeneralGetVars::$var3."'		
	ORDER by id DESC";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>