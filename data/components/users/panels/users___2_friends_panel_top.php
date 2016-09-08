<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td><div class="padding_right_10">	
	<?php echo(GeneralPagesCounter::$htmlarrows); ?></div>
	</td>
	<td><div class="padding_right_10">
    
<a href="http://mapstore.org/my_portfolio/tazteam.net/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2);?>" class="btn btn-primary btn-small" title="наверх">▲</a>
</div>
	</td>	
	<td align="left">
		<?php include("data/components/users/panels/find_buttons.php");?>
	</td>
	</tr>
	</table>
</td>
<td align="right" valign="middle"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>
<div class="v_i_b"></div>
<?php include("data/components/users/panels/users___1_panel_find.php");?>
<?php //include("data/components/automarket/panels/panel_find_auto.php");?>
<?php //include("data/components/automarket/panels/panel_find_else.php");?>
<?php //include("data/components/automarket/panels/panel_find_else_buy.php");?>

<div class="lead">Друзья</div>	







<?php
 if ((UsersBase::$find_status==0)&&(UsersBase::$its_mypage==1)) {?>


	
	
<div style="float:left; padding-right:10px;">
	<?php if (UsersFriends::$sort_by==1){ ?><span class="btn btn-inverse disabled">Мои друзья</span><?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="users_friends_sort_by_friends">
		<input type="submit" value="Мои друзья" class="btn btn-info">
		</form>
	<?php } ?>
</div>	
	

	
	
	
	
	
	
<div style="float:left; padding-right:10px;">
	<?php if (UsersFriends::$sort_by==2){ ?><span class="btn btn-inverse disabled">Друзья online</span><?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="users_friends_sort_by_friendsonline">
		<input type="submit" value="Друзья online" class="btn btn-info">
		</form>
	<?php } ?>
</div>		
	
	
	
<div style="float:left; padding-right:10px;">
	<?php if (UsersFriends::$sort_by==3){ ?><span class="btn btn-inverse disabled">Входящие заявки</span><span class="panel_text_dark" id="users_friends_tohim"></span><?php }
	else { ?>
	
<table cellpadding="0" cellspacing="0">
<tr>
<td>
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
	<input type="hidden" name="submit" value="users_friends_sort_by_friendsin">
	<input type="submit" value="Входящие заявки" class="btn btn-info">
	</form>
</td>
<td><span class="panel_text_dark" id="users_friends_tohim"></span></td>
</tr>
</table>	
	
	
		
	<?php } ?>
</div>	


<div style="float:left; padding-right:10px;">
	<?php if (UsersFriends::$sort_by==4){ ?><span class="btn btn-inverse disabled">Заявки от меня</span><?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="users_friends_sort_by_friendsout">
		<input type="submit" value="Заявки от меня" class="btn btn-info">
		</form>
	<?php } ?>
</div>	
<div style="clear:both;"></div>

<?php } ?>
<div class="v_i_b"></div>






