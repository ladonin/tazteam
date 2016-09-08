<?php
$query="
	SELECT	id_section
	FROM	photo___sections
	WHERE	id_section!=1";
$res=GeneralMYSQL::query($MSQLc,$query);
$cv1=0;


$query="
	SELECT * FROM (";

while ($row=GeneralMYSQL::fetch_array($res)){
	$cv1++;
	if ($cv1>1){$query.=" UNION ALL ";}
	$query.="
		(SELECT 
			".$row['id_section']." as id_section,
			pp.idkey,
			pp.id_topic,
			pp.id_photo,
			pp.page_photo,
			pp.format_photo,
			pp.size_photo,
			pp.date_photo,
			pp.rank,
            pt.name_topic,

            user.gen_login_user,
			user.site_mail_user,
			user.gen_name_user,
			user.gen_surname_user,
			user.site_login_status,
			user.id_user
            
            
            
            
		FROM photo___photos_".$row['id_section']." pp
        
        
        left join photo___topics_".$row['id_section']." pt
        on (pp.id_topic=pt.id_topic)  
        
        
        
        
        
        
        
        
        
        left join registrated_users___main_data user
        on (user.id_user=pt.id_user)  
        
        
 
        
         ORDER by ".$current_var1."
		LIMIT ".$current_var2." ) ";}


$query.=") as photos ORDER by ".$current_var1." LIMIT ".$current_var2;
//echo($query);
$res=GeneralMYSQL::query($MSQLc,$query);
?>
