<?php


$query="
SELECT
	1 as id_section, 
	ft1.name_topic as name_topic, 
	ft1.id_topic as id_topic 
FROM 
	forum___topics_1 as ft1
WHERE
	id_user='".UsersMyData::$id."'
";


$query2="SELECT id_section FROM forum___sections WHERE id_section>1";
$res2=GeneralMYSQL::query($MSQLc,$query2);
while($row2=GeneralMYSQL::fetch_array($res2)) {
	$query.="
	UNION ALL
	SELECT
		".$row2['id_section']." as id_section, 
		ft".$row2['id_section'].".name_topic as name_topic, 
		ft".$row2['id_section'].".id_topic as id_topic 
	FROM 
		forum___topics_".$row2['id_section']." as ft".$row2['id_section']."
	WHERE
		id_user='".UsersMyData::$id."'
	";}
//echo($query);
$res=GeneralMYSQL::query($MSQLc,$query);
?>