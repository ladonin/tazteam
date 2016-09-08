<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td>
		<?php if (!GeneralGetVars::$var4){?>
			<a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2);?>" class="btn btn-primary btn-small">к&nbsp;странице&nbsp;пользователя</a>
		<?php }
		else {
			UsersDialogs::set_sort();
			GeneralPagesCounter::$find_query=UsersBase::$find_query;
			GeneralPagesCounter::$rowspage_name="rowspageusersdialogs";//копия такой страницы - по присваиванию номеров страниц
			GeneralPagesCounter::calculate_current($MSQLc,"registrated_users___correspondence_table","date_lastupdate>='".UsersDialogs::$date_lastupdate."'",0,0,0,0,0);//условия выборки аздаются сортировкой или поиском		
			?>
			<a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2."/dialogs=".GeneralPagesCounter::$N_cur_current);?>" class="btn btn-primary btn-small">к&nbsp;диалогам</a>		
		<?php } ?>
	</td>	
	<td align="left" width="99%">	
		
	</td>
	</tr>
	</table>
</td>
</tr>
</table>
<div class="v_i_b"></div>















