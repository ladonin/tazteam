<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>   <?php include("data/components/_general/breadcrumbs.php"); ?>
<a href="http://instorage.org/portfolio/tazteam/garage<?php if (GeneralGetVars::$num_page) {echo("/".GeneralGetVars::$var2."/".GeneralGetVars::$num_page);}?>" class="brn btn-warning btn-small">отменить</a>
<div class="v_i_b"></div>

<?php  
if (UsersMyData::$identified==1){
GarageForreg::detect_status_announcement();
?>

<form method="post" 
	action="<?php echo(GeneralGetVars::$urltosubmit);?>" 
	enctype="multipart/form-data" 
	onsubmit="return general___new_garage_announcement('<?php echo(GeneralGetVars::$var2);?>');">
<?php	
if (GarageForreg::$status_announcement==2){
	GarageSendTopic::detect_parameters_for_redact($MSQLc);
	?><input name="submit" value="redactgarageannouncement" type="hidden"/><?php }
else {
	?><input name="submit" value="sendnewgarageannouncement" type="hidden"/><?php } ?>	


<table cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" width="500">
	<div class="padding_right_10">
		<?php 
		if (GeneralGetVars::$var2==1){
			include("data/components/garage/garage___2_redact_auto.php");}
		?>
	</div>
	<div class="v_i_b"></div>
	<div class="v_i_b"></div>
	<input value="Сохранить" class="btn btn-success btn-small" type="submit">
	<?php GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>
	<div class="v_i_b"></div>
</td>

<?php if (GeneralGetVars::$var2!=3){?>
<td align="left" width="300" valign="top">
<?php include("data/components/garage/garage___2_redact_photo.php"); ?>
</td>
<?php } ?>

</tr>
</table>
</form>


<?php

}
else{

echo("<div class=\"v_i_b\"></div>Уважаемый пользователь, вам необходимо зарегистрироваться");}
?>

<div class="v_i_b"></div>	

</div>
