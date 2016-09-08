
<div class="lead"><a href="<?php echo(GeneralGlobalVars::url);?>/<?php echo(GeneralGetVars::$var1."=".GeneralPagesCounter::$N_cur_current);?>" class="btn btn-primary btn-mini" style="margin-bottom:5px; margin-right:5px;" title="наверх">&#9650;</a> <?php echo($row['name']);?></div>

	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left" width="5%" valign="top" style="padding-right:10px;">
		<span class="grey">Дата&nbsp;размещения:</span>
	</td>
	<td align="left">
		<div class="big_text" id="automarket_date_announcement"></div>
		<script type="text/javascript">general___date_DMY_show(<?php echo($row['date_create']);?>,'automarket_date_announcement');</script>
	</td>
	</tr>
	</table>
<div class="v_i_b"></div>



