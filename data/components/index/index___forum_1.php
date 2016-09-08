<?php
$query = "
	SELECT	id_section,name_section
	FROM	forum___sections";
$res = GeneralMYSQL::query($MSQLc, $query);
$cv1 = 0;


$query = "
	SELECT * FROM (";

while ($row = GeneralMYSQL::fetch_array($res)) {
    $cv1++;
    if ($cv1 > 1) {
        $query.=" UNION ALL ";
    }
    $query.="
		(
		SELECT '" . $row['name_section'] . "' as name_section, id_topic, name_topic, " . $row['id_section'] . " as id_section,timecreate
		FROM 
		forum___topics_" . $row['id_section'] . "
		ORDER BY timecreate DESC 
		LIMIT " . $current_var1 . "
		) ";
}


$query.=") as forums ORDER by timecreate DESC LIMIT " . $current_var1;
//echo($query);//echo($query);
$res = GeneralMYSQL::query($MSQLc, $query);


while ($row = GeneralMYSQL::fetch_array($res)) {
    ?>


    <a href="http://instorage.org/portfolio/tazteam/forum/<?php echo($row['id_section'] . "/" . $row['id_topic'] . "=1"); ?>" class="link_lead_topic"><?php echo($row['name_topic']); ?></a>

    <div>
        <span class="link_lead_topic">&nbsp;</span>
    </div>   







<?php } ?>
