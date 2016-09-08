<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">

	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td class="padding_right_10">
		<?php echo(GeneralPagesCounter::$htmlarrows); ?>
	</td>

	<td class="padding_right_10">
    
    <a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(GeneralGetVars::$var2);?>" class="btn btn-primary btn-small" style="margin-right:5px;" title="наверх">▲</a>

	</td>
	<?php if (UsersBase::$its_mypage==1) {//для зарегистрированных пользователей ?>	
	<td align="left" width="99%">		
		<input value="Создать фотоальбом" class="btn btn-success btn-small" type="button" onclick="general___swim_hide('swim_automarket_find_panel_autos');  general___swim_hide('swim_automarket_find_panel_else'); general___swim_hide('swim_automarket_find_panel_else_buy'); general___swim_show_hide('swim_new_topic');">
		<?php GeneralImagesPreload::input("images/_general/general___new_users_photoalbum_submit_hover.png"); ?>		
	</td><?php } ?>
	</tr>
	</table>	
</td>
<td align="right" valign="middle"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>
<div class="v_i_b"></div>

<?php if(UsersBase::$its_mypage==1){
	include("data/components/users/panels/users___3_photoalbums_3_new_album.php");}?>
<?php /*<div class="v_i_b"></div>
<div class="panel_1 panel_1_grey">Фотоальбомы</div>	*/?>

	






<?php

 if (UsersPhotoalbumsBase::$find_status==0) {?>
<div class="v_i_b"></div>

	
		
<div style="float:left; padding-right:10px;">
	<?php if (UsersPhotoalbumsBase::$sort_by==1){ ?><span class="btn btn-inverse disabled">Личное</span><?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="users_photoalbums_sort_by_my">
		<input type="submit" value="Личное" class="btn btn-info">
		</form>
	<?php } ?>
</div>		
		
		
		
		
		
		
<div style="float:left; padding-right:10px;">
	<?php if (UsersPhotoalbumsBase::$sort_by==2){ ?><span class="btn btn-inverse disabled">Друзей</span><?php }
	else { ?>
			<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
			<input type="hidden" name="submit" value="users_photoalbums_sort_by_friends">
			<input type="submit" value="Друзей" class="btn btn-info">
			</form>	
	<?php } ?>
</div>		
			
		
		
		
<div style="float:left; padding-right:10px;">
	<?php if (UsersPhotoalbumsBase::$sort_by==3){ ?><span class="btn btn-inverse disabled">Всех участников</span><?php }
	else { ?>
			<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
			<input type="hidden" name="submit" value="users_photoalbums_sort_by_another">
		<input type="submit" value="Всех участников" class="btn btn-info">
		</form>
	<?php } ?>
</div>	







<div style="clear:both;"></div>

<?php } ?>	
<div class="v_i_b"></div>
