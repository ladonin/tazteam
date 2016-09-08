
<?php   
//print_r(UsersDialogs::$array_my_dialogs_lastmessage);
foreach (UsersDialogs::$array_my_dialogs_lastmessage as $time=>$array){
	foreach (UsersDialogs::$array_my_dialogs_lastmessage[$time] as $key=>$value){
	UsersBase::$cur_user_online=UsersBase::return_online(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['who_timecoming']);

	if (UsersBase::$cur_user_online==true){
		$cv1="f09007";}
	else {
		$cv1="191c20";}

		if (UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['absolutewho']>0){
		$cv2="ffffff";
		$cv3=1;}
		else{
		$cv1="38474e";
		$cv2="ffffff";
		$cv3=0;}		
		

		
	
?>






<table cellpadding="0" cellspacing="0" style="width:50%; float:left; margin-bottom:10px;">
<tr>
<td valign="top" width="115" rowspan="2" align="left">	
	<a href="http://instorage.org/portfolio/tazteam/users/<?php echo(UsersMyData::$id);?>/dialogs/<?php echo(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['id_correspondence']);?>"><img src="<?php echo(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['who_photo']);?>" width="100" height="100" class="refimage" <?php if ((UsersBase::$cur_user_online==true)&&($cv3==1)){?>style="border-right:5px solid #f09007;"<?php } ?>></a>
</td>
<td valign="top" align="left">
	<div style="padding: 5px 10px 5px 0px;">
	<div style="width:305px; height:70px; margin:0px; overflow:hidden;">
		<div style="margin:0px; max-height:50px; overflow:hidden;"><a href="http://instorage.org/portfolio/tazteam/users/<?php echo(UsersMyData::$id);?>/dialogs/<?php echo(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['id_correspondence']);?>" class="link_lead"><?php echo(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['who_name']);?></a></div>
		<div class="v_i_s"></div>
<a href="http://instorage.org/portfolio/tazteam/users/<?php echo(UsersMyData::$id);?>/dialogs/<?php echo(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['id_correspondence']);?>" style="text-decoration:none;" class="grey">		
		<?php if ($cv3==1){?>
		<div style="float:left; margin:0 5px 25px 0;"><img src="<?php echo(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['photo_autor_last_message']);?>" width="30" height="30" class="refimage"></div>

		<?php echo(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['text_last_message']);?>
		<?php }
		else {?>
		<div class="v_i_s"></div>
		<span class="grey">Участник удалил переписку с вами</span>
		<?php } ?></a>

	</div>
	</div>
</td>
<td valign="top" rowspan="2" style="width:5px; overflow:hidden; padding-right:5px;">
</td>
</tr>
<tr>
<td valign="bottom">
<div style="padding:0px 10px 10px 0px;">
	<?php include("data/components/users/panels/users___2_dialogs_panel_in_list.php"); ?>
</div>
</td>
</tr>
</table>

<?php

	
	}}





 ?>

