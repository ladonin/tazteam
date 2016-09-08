
<div class="v_i_b"></div>
	<?php
UsersBase::$cur_user_online=UsersBase::return_online($row['t_timecoming']);
?>








<table cellpadding="5" cellspacing="0" width="100%">
<tr>
<td align="left" bgcolor="#35526a" style="color: #ffffff;">
Объявление разместил:
</td>
</tr>
<tr>
<td align="left" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding:10px;">





<table cellpadding="0" cellspacing="0" style="width:100%;">
<tr>
<td valign="top" width="103" align="left">
	<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($row['id_user']);?>"><img src="<?php echo(UsersBase::return_url_photo($row['t_gen_photo'],$row['t_dir_user']."/".$row['id_user']."_2.".$row['t_site_photo_format'],$row['t_sn_photo_url_from_small'],$row['t_sn_photo_url_from_huge'],0));?>" width="100" height="100" class="refimage" style="border-right:3px solid <?php if (UsersBase::$cur_user_online){?>#f09007<?php } else { ?>#eeeeee<?php } ?>"></a>
</td>
<td valign="top" align="left" class="padding_left_10 padding_right_10">
		<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($row['id_user']);?>" class="link_lead "><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
		<?php if (UsersBase::$cur_user_online==true){?>
		<div class="v_i_s"></div>
		<b style="text-decoration:underline;">Online</b>
		<?php } ?>

		<?php if ($row['city']) { ?><div class="v_i_s"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td width="70" align="left"><span class="grey">Город: </span></td><td style="padding-right:10px;" align="left"><?php echo($row['city']);?> <?php echo($row['region']);?></td>
			</tr></table>
		<?php } ?>
		<?php if ($row['phone']) { ?><div class="v_i_s"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td width="70" align="left"><span class="grey">Телефон: </span></td><td style="padding-right:10px;" align="left"><?php echo($row['phone']);?></td>
			</tr></table>
		<?php } ?>
		<?php if ((UsersMyData::$identified==1)&&(UsersMyData::$id!=$row['id_user'])) { ?>
			<div class="v_i_s"></div>
			<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($row['id_user']);?>/dialogs" class="btn btn-success btn-small "><?php echo(UsersBase::$array_buttons_to_userslists[1]);?></a>
		<?php } ?>


</td>
</tr>
</table>




</td>
</tr>
</table>


















<div class="v_i_b"></div>




<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left" width="30%"><span class="grey">Просмотров: </span><?php echo($row['number_views']);?></td>
<td align="right" width="70%"><script type="text/javascript" src="//yandex.st/share/share.js"
charset="utf-8"></script>
<div class="yashare-auto-init" data-yashareL10n="ru"
 data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,gplus"

></div>
</td>
</tr>
</table>







