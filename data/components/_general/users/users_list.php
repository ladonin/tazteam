<?php
while($rowusers=GeneralMYSQL::fetch_array($res)) {
	UsersBase::$users_enable=1;
	UsersBase::$cur_user_online=UsersBase::return_online($rowusers['gen_timecoming']);
	UsersBase::$cur_user_online==true;
	?>
<table cellpadding="0" cellspacing="0" style="width:50%; float:left; margin-bottom:10px;">
<tr>
<td valign="top" width="150" align="left">
	<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($rowusers['id_user']);?>"><img src="<?php echo(UsersBase::return_url_photo($rowusers['gen_photo'],$rowusers['dir_user']."/".$rowusers['id_user']."_5.".$rowusers['site_photo_format'],$rowusers['sn_photo_url_from_small'],$rowusers['sn_photo_url_from_huge'],0));?>" width="140" height="140" class="refimage"></a>
</td>
<td valign="top" align="left">
<div style="padding:5px 10px 0px 0px;">
	<div style="width:280px; margin:0px; background-color:#ffffff; overflow:hidden; ">
		<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($rowusers['id_user']);?>" class="lead"><?php echo(UsersMyData::return_name($rowusers['gen_login_user'],$rowusers['site_mail_user'],$rowusers['gen_name_user'],$rowusers['gen_surname_user'],$rowusers['site_login_status']));?></a></div>

<div class="v_i_s"></div>

	<?php include("data/components/_general/users/users_panel_in_list.php"); ?>

<div class="v_i_s"></div>




		<div></div>

		<?php if ($rowusers['gen_borndate_year']){?>
		<?php echo(UsersBase::return_age($rowusers['gen_borndate_day'],$rowusers['gen_borndate_month'],$rowusers['gen_borndate_year']));?>
		<div></div><?php } ?>

		<?php if ($rowusers['gen_city_name']){?>
		город: <?php echo($rowusers['gen_city_name']);?>
		<div></div>
		<?php } ?>

		<?php if ($rowusers['gen_universities_name']){?>
		ВУЗ: <?php echo(str_replace("  ",", ",$rowusers['gen_universities_name']));?>
		<div></div><?php } ?>

		<?php if (UsersBase::$cur_user_online==true){?>
		<b style="text-decoration:underline; color:#f09007;">Online</b>
		<div></div>
		<?php } ?>
















</div>
</td>
</tr>
</table>
<?php }
if (UsersBase::$users_enable==0) { ?>
	<div class="v_i_b"></div>
	Не найдено
	<div class="v_i_b"></div>
	<?php }
GeneralMYSQL::free($res); ?>


<?php
if (GeneralPagesCounter::$N_max>1){ ?>

	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left">
		<?php echo(GeneralPagesCounter::$htmlarrows); ?>
	</td>
	<td align="right" valign="middle">
		<?php echo(GeneralPagesCounter::$htmlcode); ?>
	</td>
	</tr>
	</table>
	<div class="v_i_b"></div>

<?php }
GeneralPagesCounter::clearvars(); ?>



