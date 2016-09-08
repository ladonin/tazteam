<?php //как в users
GeneralPagesCounter::calculate_to_outer($MSQLc, GeneralGetVars::$var1."___topics_".GeneralGetVars::$var2,"id_topic>='".GeneralGetVars::$var3."'",0,0,0,0);
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
	<div class="padding_right_10">
    	<a href="http://mapstore.org/my_portfolio/tazteam.net/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2);?>=<?php echo(GeneralPagesCounter::$N_cur_to_outer);?>" class="btn btn-primary btn-small">&#9650;</a>

    </div>
</td>
<td align="left">
<a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".GeneralGetVars::$var3."/allphotos=1");?>" class="btn btn-primary btn-small">все&nbsp;фото</a>
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


