<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left" width="270">	
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td width="1%" class="padding_right_10">
	<?php echo(GeneralPagesCounter::$htmlarrows); ?>
	</td>
	<td align="left" width="1%" class="padding_right_10">
		<?php if (UsersMyData::$identified==1) {//для зарегистрированных пользователей ?>	


<form method="post"	action="<?php echo(GeneralGetVars::$var1);?>/1">		
<input type="hidden" name="themepage" value="1">
<input value="Добавить автомобиль" class="btn btn-success btn-small" type="submit">
</form>


		<?php GeneralImagesPreload::input("images/_general/general___new_garage_submit_hover.png"); }
		else{?>
		<input value="Добавить автомобиль" class="btn btn-success btn-small disabled" type="button">
		<?php } ?>		
	</td>
    
    
    
    
<td align="left" width="98%">	
	<?php include("data/components/garage/panels/find_buttons.php");?>
</td>
    
    
    
    
    
	</tr>
	</table>	

</td>
<td align="right" valign="bottom"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>








	
<div class="v_i_b"></div>
<?php include("data/components/garage/panels/panel_find_auto.php");?>



	








