<?php
	include("data/components/index/index___photo_2_query_1.php");
	while ($row=GeneralMYSQL::fetch_array($res)){
		GeneralPagesCounter::$rowspage_name="rowspagephoto3";//копия такой страницы - по присваиванию номеров страниц
		PhotoBase::detect_current_num_page_photo($MSQLc,$row['page_photo'],$row['id_photo'],$row['id_topic'],$row['id_section']);	
		?><a href="http://instorage.org/portfolio/tazteam/photo/<?php echo($row['id_section']."/".$row['id_topic']."=".PhotoBase::$current_num_page_photo);?>" style="white-space:nowrap;"><img src="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo($row['id_section']."/".$row['id_topic']."/".$row['id_photo']."_5.".$row['format_photo']);?>" width="159" height="159" class="img-rounded" style="margin-right:0px; border-right:1px solid #ffffff;" alt="" title=""></a><?php }
?>