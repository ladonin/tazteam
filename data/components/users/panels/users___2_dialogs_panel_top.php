<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td>
		<div class="padding_right_10"><?php echo(GeneralPagesCounter::$htmlarrows); ?></div>
	</td>
	<td>
    	<a href="<?php echo(GeneralGlobalVars::url);?>/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2);?>" class="btn btn-primary btn-small">▲</a>
	</td>	
	</tr>
	</table>
</td>
<td align="right" valign="middle"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>
<div class="v_i_b"></div>
<div class="lead">Диалоги</div>	





	


 
<div style="float:left; padding-right:10px;">
	<?php if (UsersDialogs::$sort_by==1){ ?><span class="btn btn-inverse disabled" 
    >Мои диалоги</span><span class="panel_text_dark" id="users_dialogs_new"></span><?php }
	else { ?>
<table cellpadding="0" cellspacing="0">
<tr>
<td>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="users_dialogs_sort_by_nodeleted">
		<input type="submit" value="Мои диалоги" class="btn btn-info">
		</form>
</td>
<td><span class="panel_text_dark" id="users_dialogs_new"></span></td>
</tr>
</table>
	<?php } ?>
</div>
<div style="float:left; padding-right:10px;">
	<?php if (UsersDialogs::$sort_by==2){ ?>
		<span class="btn btn-inverse disabled">Удалённые</span>
	<?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="users_dialogs_sort_by_deleted">
		<input type="submit" value="Удалённые" class="btn btn-info">
		</form>		
	<?php } ?>
</div>
<div style="clear:both;"></div>





<div class="v_i_b"></div>














