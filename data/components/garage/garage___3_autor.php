

	<?php
UsersBase::$cur_user_online=UsersBase::return_online($row['t_timecoming']);
?>



<table cellpadding="5" cellspacing="0" width="100%">
<tr>
<td align="left" bgcolor="#35526a" style="color: #ffffff; padding-left:10px;">
Владелец:
</td>
</tr>	
<tr>
<td align="left" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;">



<table cellpadding="0" cellspacing="0" style="width:100%;">
<tr>
<td valign="top" width="53" align="left" style="padding:5px 5px 0 5px;">	
	<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($row['id_user']);?>"><img src="<?php echo(UsersBase::return_url_photo($row['t_gen_photo'],$row['t_dir_user']."/".$row['id_user']."_2.".$row['t_site_photo_format'],$row['t_sn_photo_url_from_small'],$row['t_sn_photo_url_from_huge'],0));?>" width="50" height="50" class="refimage" style="border-right:3px solid <?php if (UsersBase::$cur_user_online){?>#f09007<?php } else { ?>#eeeeee<?php } ?>"></a>
<div class="v_i_s"></div></td>
<td valign="top" align="left" style="padding:5px 5px 0 0px;">
		<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($row['id_user']);?>" class="link_lead"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
		<?php if (UsersBase::$cur_user_online==true){?>	
		<div class="v_i_s"></div>		
		<b style="text-decoration:underline;">Online</b>
		<?php } ?>



		<?php /*if ((UsersMyData::$identified==1)&&(UsersMyData::$id!=$row['id_user'])) { ?>
			<div class="v_i_s"></div>
			<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($row['id_user']);?>/dialogs" class="btn btn-success btn-mini"><?php echo(UsersBase::$array_buttons_to_userslists[1]);?></a>
		<?php }*/?>

<div class="v_i_s"></div>




<span class="grey">Просмотров: </span><?php echo($row['number_views']);?>


</td>
</tr>
</table>




</td>
</tr>
</table>

















