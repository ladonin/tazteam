<?php
//_________compact_site
include("data/components/index/index___experts_users_1_query_1.php");
while ($row = GeneralMYSQL::fetch_array($res)) {
    UsersBase::$cur_user_name = UsersMyData::return_name($row['gen_login_user'], $row['site_mail_user'], $row['gen_name_user'], $row['gen_surname_user'], $row['site_login_status']);
    ?><div style="margin-bottom: 10px; float:left;">

        <div style="float:left;">
            <a href="http://instorage.org/portfolio/tazteam/users/<?php echo($row['id_user']); ?>"><img src="<?php echo(UsersBase::return_url_photo($row['gen_photo'], $row['dir_user'] . "/" . $row['id_user'] . "_2." . $row['site_photo_format'], $row['sn_photo_url_from_small'], $row['sn_photo_url_from_huge'])); ?>"
                                                                                   width="72" height="72"
                                                                                   alt="<?php echo(UsersBase::$cur_user_name); ?>" title="<?php echo(UsersBase::$cur_user_name); ?>" class="img-var"></a>
        </div>

        <div style="float:right; overflow:hidden; width:103px; margin:5px 0 0px 10px;">
            <a href="http://instorage.org/portfolio/tazteam/users/<?php echo($row['id_user']); ?>" class="link_lead_small"><?php echo(UsersBase::$cur_user_name); ?></a>
            <div></div>
            <small class="grey"><?php echo($row['forums_messages']); ?> сообщений</small>



        </div>

    </div>
<?php } ?>