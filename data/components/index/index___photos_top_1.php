<?php
include("data/components/index/index___photos_top_1_query_1.php");
$current_var4 = 0;
while ($row = GeneralMYSQL::fetch_array($res)) {
    $current_var4++;
    GeneralPagesCounter::$rowspage_name = "rowspagephoto3"; //����� ����� �������� - �� ������������ ������� �������
    PhotoBase::detect_current_num_page_photo($MSQLc, $row['page_photo'], $row['id_photo'], $row['id_topic'], $current_var1);

    if ($current_var4 == 1) {
        ?>
        <div class="photo_item1" style="margin-right:1px; float: left; width:320px;">
            <a href="http://instorage.org/portfolio/tazteam/photo/<?php echo($row['id_section'] . "/" . $row['id_topic'] . "=" . PhotoBase::$current_num_page_photo); ?>"><?php
        ?><img src="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo($row['id_section'] . "/" . $row['id_topic'] . "/" . $row['id_photo'] . "_11." . $row['format_photo']); ?>" 
                     width="320"
                     height="240"
                     alt="<?php echo(UsersMyData::return_name($row['gen_login_user'], $row['site_mail_user'], $row['gen_name_user'], $row['gen_surname_user'], $row['site_login_status'])); ?>" title="<?php echo(UsersMyData::return_name($row['gen_login_user'], $row['site_mail_user'], $row['gen_name_user'], $row['gen_surname_user'], $row['site_login_status'])); ?>"></a>
            <div class="photo_item2" style="width:300px;">
                <a href="http://instorage.org/portfolio/tazteam/users/<?php echo($row['id_user']); ?>"><?php echo(UsersMyData::return_name($row['gen_login_user'], $row['site_mail_user'], $row['gen_name_user'], $row['gen_surname_user'], $row['site_login_status'])); ?></a>
            </div>
        </div>
        <?php
    }


    if ($current_var4 == 2) {
        ?><div  style="float: left; width:192px; margin-right:1px;"><?php
    }

    if (($current_var4 == 2) || ($current_var4 == 3)) {
        ?>
            <div class="photo_item1" style="<?php if ($current_var4 != 3) { ?>margin-bottom:1px;<?php } ?>">
                <a href="http://instorage.org/portfolio/tazteam/photo/<?php echo($row['id_section'] . "/" . $row['id_topic'] . "=" . PhotoBase::$current_num_page_photo); ?>"><?php ?><img src="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo($row['id_section'] . "/" . $row['id_topic'] . "/" . $row['id_photo'] . "_12." . $row['format_photo']); ?>"
                         style="height:<?php if ($current_var4 == 3) { ?>119<?php } else { ?>120<?php } ?>px;
                         width:192px;"
                         alt="<?php echo(UsersMyData::return_name($row['gen_login_user'], $row['site_mail_user'], $row['gen_name_user'], $row['gen_surname_user'], $row['site_login_status'])); ?>" title="<?php echo(UsersMyData::return_name($row['gen_login_user'], $row['site_mail_user'], $row['gen_name_user'], $row['gen_surname_user'], $row['site_login_status'])); ?>"></a>
                    <?php /* <div class="photo_item2" style="width:172px;">
                      <?php echo(UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']));?>
                      </div> */ ?>
            </div>
            <?php
        }
        if ($current_var4 == 3) {
            ?></div><?php }




    if ($current_var4 == 4) {
            ?><div  style="float: left; width:128px;"><?php
    }

    if (($current_var4 == 4) || ($current_var4 == 5) || ($current_var4 == 6)) {
        ?>
            <div class="photo_item1" style="<?php if ($current_var4 != 6) { ?>margin-bottom:1px;<?php } ?>">
                <a href="http://instorage.org/portfolio/tazteam/photo/<?php echo($row['id_section'] . "/" . $row['id_topic'] . "=" . PhotoBase::$current_num_page_photo); ?>"><?php ?><img src="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo($row['id_section'] . "/" . $row['id_topic'] . "/" . $row['id_photo'] . "_13." . $row['format_photo']); ?>"

                         style="height:<?php if ($current_var4 == 6) { ?>78<?php } else { ?>80<?php } ?>px; 
                         width:128px"
                         accesskey=""
                         alt="<?php echo(UsersMyData::return_name($row['gen_login_user'], $row['site_mail_user'], $row['gen_name_user'], $row['gen_surname_user'], $row['site_login_status'])); ?>" title="<?php echo(UsersMyData::return_name($row['gen_login_user'], $row['site_mail_user'], $row['gen_name_user'], $row['gen_surname_user'], $row['site_login_status'])); ?>"></a>
            <?php /* <div class="photo_item2" style="width:108px;">
              <?php echo(UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],$row['site_login_status']));?>
              </div> */ ?>
            </div>
        <?php
    }
    if ($current_var4 == 6) {
        ?></div><?php
    }
}
?>