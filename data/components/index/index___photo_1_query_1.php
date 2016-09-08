<?php
$query="SELECT 
			pp.id_topic as id_topic,
			pp.id_photo as id_photo,
			pp.page_photo as page_photo,
			pp.format_photo as format_photo,
			pp.size_photo as size_photo,
            pt.name_topic as name_topic
		FROM photo___photos_".$current_var1." pp
        
        left join photo___topics_".$current_var1." pt
        on (pp.id_topic=pt.id_topic)
        
        
		WHERE pp.id_topic='".$current_var2."'
		ORDER by RAND() LIMIT ".$current_var4;//date_photo DESC
		$res=GeneralMYSQL::query($MSQLc,$query);
?>



