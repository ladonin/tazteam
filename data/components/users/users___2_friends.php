


<table cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr>
            <td align="left">
                <a href="http://instorage.org/portfolio/tazteam/users/<?php echo(GeneralGetVars::$var2 . "/friends=1"); ?>" class="lead">Друзья (<?php echo(UsersBase::$count_friends); ?>)</a>

            </td>
            <td align="right">

            </td>
        </tr>
    </tbody>
</table>
<div class="v_i_b"></div>	
<?php
shuffle(UsersBase::$friends_array);
$cv1 = 7;

include("data/components/" . GeneralGetVars::$var1 . "/" . GeneralGetVars::$var1 . "___2_query_2.php");
$cv3 = 0;
while ($rowfriends = GeneralMYSQL::fetch_array($resfriends)) {
    $cv3++;
    UsersBase::$cur_user_name = UsersMyData::return_name($rowfriends['gen_login_user'], $rowfriends['site_mail_user'], $rowfriends['gen_name_user'], $rowfriends['gen_surname_user'], $rowfriends['site_login_status']);
    ?><a href="http://instorage.org/portfolio/tazteam/users/<?php echo($rowfriends['id_user']); ?>"><img src="<?php echo(UsersBase::return_url_photo($rowfriends['gen_photo'], $rowfriends['dir_user'] . "/" . $rowfriends['id_user'] . "_2." . $rowfriends['site_photo_format'], $rowfriends['sn_photo_url_from_small'], $rowfriends['sn_photo_url_from_huge'])); ?>"

                                                                                  width="72" height="72" 

                                                                                  style="margin-right:<? if ($cv3==$cv1){echo('0');}else{echo('5');}?>px; border-right:3px solid <?php if (UsersBase::return_online($rowfriends['gen_timecoming']) == true) { ?>#f09007;<?php } else {
        ?>#e0e0e0<?php } ?>;"  class="img-var" title="<?php echo(UsersBase::$cur_user_name); ?>" title="<?php echo(UsersBase::$cur_user_name); ?>"></a><?php }
?>
	

