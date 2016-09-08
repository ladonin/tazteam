<?php
include("data/components/index/index___articles_1_query_1.php");
while ($row = GeneralMYSQL::fetch_array($res)) {
    ?>
    <a href="http://mapstore.org/my_portfolio/tazteam.net/<?php echo($row['themepage'] == 1 ? 'news' : 'articles'); ?>/<?php echo($row['id']); ?>" class="link_lead_topic"><?php echo($row['name']); ?></a>
    <div>
        <span class="link_lead_topic">&nbsp;</span>
    </div>
<?php } ?>