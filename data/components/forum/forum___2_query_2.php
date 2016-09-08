<?php
$query="
SELECT
	topics.id_topic AS id_topic,
	topics.number_views AS number_views,
	topics.id_user AS id_autor_topic,
	topics.number_messages AS number_messages,
	topics.name_topic AS name_topic,
	topics.id_section AS id_section    


	FROM
		(

        ";
        
        $array=array(1,2,3,4,9999);
        $count=count($array);
        foreach ($array as $key => $value){
            $query.=" 
(SELECT 
        
    forum___topics_".$value.".id_topic,
    
    
    
	forum___topics_".$value.".number_views,
	forum___topics_".$value.".id_user,
	forum___topics_".$value.".number_messages,
	forum___topics_".$value.".name_topic,
	forum___topics_".$value.".timecreate,   
	".$value." as id_section
    
        
        FROM forum___topics_".$value." LEFT JOIN forum___messages_".$value." on forum___topics_".$value.".id_topic=forum___messages_".$value.".id_topic and  forum___messages_".$value.".id_message=1
        
        where    
        
        forum___topics_".$value.".name_topic like '%".ForumBase::$find_query."%' or 
        	forum___messages_".$value.".text_message_nacked like '%".ForumBase::$find_query."%'

        ) ";
        if (($key+1)<$count){$query.=" union all ";}
        
        }

        
        $query.=")
        

		AS topics


	ORDER BY topics.timecreate ASC limit 100
	";
    
    
    
	$res=GeneralMYSQL::query($MSQLc,$query);
?>