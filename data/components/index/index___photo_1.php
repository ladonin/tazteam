<?php
include("data/components/index/index___photo_1_query_1.php");
while ($row = GeneralMYSQL::fetch_array($res)) {
    GeneralPagesCounter::$rowspage_name = "rowspagephoto3"; //����� ����� �������� - �� ������������ ������� �������
    PhotoBase::detect_current_num_page_photo($MSQLc, $row['page_photo'], $row['id_photo'], $row['id_topic'], $current_var1);
    ?><div class="photo_item1" style="margin-bottom:10px;">





        <a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo($current_var1 . "/" . $row['id_topic'] . "=" . PhotoBase::$current_num_page_photo); ?>"><img src="http://140706.selcdn.ru/tazteam/images/photo/<?php echo($current_var1 . "/" . $row['id_topic'] . "/" . $row['id_photo'] . "_10." . $row['format_photo']); ?>" width="220" alt="" title="" class="img-polaroid"></a>

        <div class="photo_item2" style="width:200px;"><?php echo($row['name_topic']); ?>
        </div>
    </div>



<?php }
?>



