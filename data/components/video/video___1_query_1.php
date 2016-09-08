<?php
$query="
SELECT
	video.id as id,
	video.themepage as themepage,
	video.video_name as video_name
	FROM
		video ";
	if (VideoBase::$condition_main) {
	$query.=VideoBase::$condition_main." ";}
	$query.="	
	ORDER by id DESC
	LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage;
	$res=GeneralMYSQL::query($MSQLc,$query);
?>