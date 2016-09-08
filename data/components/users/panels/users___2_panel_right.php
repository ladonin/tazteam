<a href="http://mapstore.org/my_portfolio/tazteam.net/users" class="lead">Другие участники:</a>
<div class="v_i_b"></div>	
<?php
	UsersBase::set_condition_added($MSQLc);// устанавливаем по возможности дополнительный параметр поиска  UsersBase::$condition_added1
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_query_3.php");
	if (GeneralMYSQL::num_rows($res3)<UsersBase::min_additional_announcements){
		UsersBase::$condition_added1="";//альтернативный поиск, если недостаточно дополнительных объявлений записано в БД
		UsersBase::$find_query="";
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_query_3.php");}

	while($row3=GeneralMYSQL::fetch_array($res3)) {

	?>
<table cellpadding="0" cellspacing="0" style="width:50%; float:left; margin-bottom:20px;">
<tr>
<td valign="top" width="150" align="left">	
	<a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row3['id_user']);?>"><img src="<?php echo(UsersBase::return_url_photo($row3['gen_photo'],$row3['dir_user']."/".$row3['id_user']."_2.".$row3['site_photo_format'],$row3['sn_photo_url_from_small'],$row3['sn_photo_url_from_huge']));?>" width="140" height="140" class="img-var"></a>
</td>
<td valign="top" align="left" class="grey">
<div style="padding:5px 10px 5px 0px;">
	<div style="width:280px; margin:0px; overflow:hidden; ">
		<a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row3['id_user']);?>" class="lead"><?php echo(UsersMyData::return_name($row3['gen_login_user'],$row3['site_mail_user'],$row3['gen_name_user'],$row3['gen_surname_user'],$row3['site_login_status']));?></a></div>
		<?php if ($row3['gen_borndate_year']){?>
		<div class="v_i_l"></div>
		<?php echo(UsersBase::return_age($row3['gen_borndate_day'],$row3['gen_borndate_month'],$row3['gen_borndate_year']));?>
		<?php } ?>		
		<?php if ($row3['gen_city_name']){?>
		<div class="v_i_l"></div>
		город: <?php echo($row3['gen_city_name']);?>
		<?php } ?>
	
		<?php if ($row3['gen_universities_name']){?>
		<div class="v_i_l"></div>
		ВУЗ: <?php echo(str_replace("  ",", ",$row3['gen_universities_name']));?>
		<?php } ?>		
		
		<?php if (UsersBase::return_online($row3['gen_timecoming'])==true){?>	
		<div class="v_i_l"></div>		
		<b style="text-decoration:underline; color:#f09007;">Online</b>
		<?php } ?>
	</div>
</td>
</tr>
</table>

<?php }
GeneralMYSQL::free($res3); ?>