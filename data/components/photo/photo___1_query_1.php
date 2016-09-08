<?php
$query="
SELECT
	photo___sections.id_section AS id_section,
	photo___sections.name_section AS name_section,
	photo___sections.explanation_section AS explanation_section,
	photo___sections.number_topics AS number_topics

	FROM 
		photo___sections
	WHERE 
		id_section!='1'
	ORDER BY photo___sections.id_section
	";	
	$res=GeneralMYSQL::query($MSQLc,$query);
?>