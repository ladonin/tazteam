	<div class="v_i_b"></div>	
	<div class="panel_1 panel_1_grey white">Дополнительная информация:</div>

	<?php if ($row['electro_glass_up']) { ?>
	<div class="v_i_b"></div>
		<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
		<td width="180" style="padding-left:10px;" align="left"><span class="explanation">- Электростеклоподъемники</span></td><td style="padding-right:10px;" class="big_text" align="left"><?php echo(AutomarketBase::return_parameters("electro_glass_up", $row['electro_glass_up']));?></td>
		</tr></table>
	<?php } ?>
	<?php if ($row['disks']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td width="180" style="padding-left:10px;" align="left"><span class="explanation">- Колесные диски</span></td><td style="padding-right:10px;" class="big_text" align="left"><?php echo(AutomarketBase::return_parameters("disks", $row['disks']));?></td>
			</tr></table>
		<?php } ?>	
		<?php if ($row['disk_size']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td width="180" style="padding-left:10px;" align="left"><span class="explanation">- Размер колесных дисков</span></td><td style="padding-right:10px;" class="big_text" align="left"><?php echo(AutomarketBase::return_parameters("disk_size", $row['disk_size']));?></td>
			</tr></table>
		<?php } ?>
		<?php if ($row['abs']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td style="padding-left:10px;" align="left"><span class="big_text"><?php echo(AutomarketBase::return_parameters("abs", 0));?></span></td>
			</tr></table>
		<?php } ?>	
		<?php if ($row['gbo']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td style="padding-left:10px;" align="left"><span class="big_text"><?php echo(AutomarketBase::return_parameters("gbo", 0));?></span></td>
			</tr></table>
		<?php } ?>	
		<?php if ($row['computer']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td style="padding-left:10px;" align="left"><span class="big_text"><?php echo(AutomarketBase::return_parameters("computer", 0));?></span></td>
			</tr></table>
		<?php } ?>	
		<?php if ($row['conditioner']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td style="padding-left:10px;" align="left"><span class="big_text"><?php echo(AutomarketBase::return_parameters("conditioner", 0));?></span></td>
			</tr></table>
		<?php } ?>	
		<?php if ($row['warm_chair']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td style="padding-left:10px;" align="left"><span class="big_text"><?php echo(AutomarketBase::return_parameters("warm_chair", 0));?></span></td>
			</tr></table>
		<?php } ?>		
		<?php if ($row['guard']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td style="padding-left:10px;" align="left"><span class="big_text"><?php echo(AutomarketBase::return_parameters("guard", 0));?></span></td>
			</tr></table>
		<?php } ?>	
		<?php if ($row['parktronik']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td style="padding-left:10px;" align="left"><span class="big_text"><?php echo(AutomarketBase::return_parameters("parktronik", 0));?></span></td>
			</tr></table>
		<?php } ?>	
		<?php if ($row['security_pillows']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td style="padding-left:10px;" align="left"><span class="big_text"><?php echo(AutomarketBase::return_parameters("security_pillows", 0));?></span></td>
			</tr></table>
		<?php } ?>
		<?php if ($row['toned']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td style="padding-left:10px;" align="left"><span class="big_text"><?php echo(AutomarketBase::return_parameters("toned", 0));?></span></td>
			</tr></table>
		<?php } ?>
		<?php if ($row['amplifier_rudder']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td style="padding-left:10px;" align="left"><span class="big_text"><?php echo(AutomarketBase::return_parameters("amplifier_rudder", 0));?></span></td>
			</tr></table>
		<?php } ?>
		<?php if ($row['electro_gas']) { ?><div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="100%"><tr valign="top">
			<td style="padding-left:10px;" align="left"><span class="big_text"><?php echo(AutomarketBase::return_parameters("electro_gas", 0));?></span></td>
			</tr></table>
		<?php }