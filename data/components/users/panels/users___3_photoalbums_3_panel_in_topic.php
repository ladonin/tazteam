<?php //как в photo
GeneralPagesCounter::calculate_to_outer($MSQLc, "registrated_users___photoalbums_photos","id_user='".GeneralGetVars::$var2."'","id_album='".GeneralGetVars::$var4."'",0,0,0);
?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td width="1%">
		<div class="padding_right_10"><?php echo(GeneralPagesCounter::$htmlarrows); ?></div>
	</td>
	<td align="left" width="99%">

<table cellpadding="0" cellspacing="0">
<tr>
<td align="left">
	<div class="padding_right_10"><a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(GeneralGetVars::$var2."/photoalbums=".GeneralPagesCounter::$N_cur_to_outer);?>" class="btn btn-primary btn-small">&#9650;</a></div>
</td>
<td align="left">
<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(GeneralGetVars::$var2."/allphotosinalbum/".GeneralGetVars::$var4."=1");?>" class="btn btn-primary btn-small">все&nbsp;фото</a>	
</td>
</tr>
</table>	
	</td>
	</tr>
	</table>	

	
	
</td>
<td align="right"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>
