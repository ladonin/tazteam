	
<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="left">
            <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(GeneralGetVars::$var2 . "/photoalbums=1"); ?>" class="lead">Фотоальбомы <?php /* (<?php  echo(UsersBase::$count_photoalbums);?>) */ ?></a>
        </td>
        <td align="right">

        </td>
    </tr>

</table>

<div class="v_i_b"></div>	
<?php
//shuffle(UsersBase::$array_photoalbums_list);
$cv1 = 0;
foreach (UsersBase::$array_photoalbums_list as $key => $value) {
    $cv1++;
    ?><a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(GeneralGetVars::$var2 . "/allphotosinalbum/" . UsersBase::$array_photoalbums_list[$key]['id_album']); ?>=1" title="<?php echo(UsersBase::$array_photoalbums_list[$key]['name_album']); ?>"><img src="http://140706.selcdn.ru/tazteam/images/users/photoalbums/<?php echo(UsersBase::$array_photoalbums_list[$key]['dir_album'] . "/" . GeneralGetVars::$var2 . "/" . UsersBase::$array_photoalbums_list[$key]['id_album'] . "/" . UsersBase::$array_photoalbums_list[$key]['id_photo'] . "_5." . UsersBase::$array_photoalbums_list[$key]['format_photo']); ?>" width="107" height="107" class="refimage" style="margin-right:<?php if ($cv1 == 5) {
        echo('0');
    } else {
        echo('5');
    } ?>px; margin-bottom:5px;" title="<?php echo(UsersBase::$array_photoalbums_list[$key]['name_album']); ?>"></a><?php
    if ($cv1 == 5) {
        break;
    }
}
?>