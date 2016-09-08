



<table cellpadding="5" cellspacing="0" width="100%">
<tr>
<td align="left" colspan="2" bgcolor="#35526a" style="color: #ffffff; padding-left:10px;">
Дополнительная информация:
</td>
</tr>






<?php if ($row['electro_glass_up']) { ?>	
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Электростеклоподъемники
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("electro_glass_up", $row['electro_glass_up']));?>
</td>
</tr>
<?php } ?>


<?php if ($row['disks']) { ?>	
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Колесные диски
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("disks", $row['disks']));?>
</td>
</tr>
<?php } ?>



<?php if ($row['disk_size']) { ?>	
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Размер колесных дисков
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("disk_size", $row['disk_size']));?>
</td>
</tr>
<?php } ?>






<?php if ($row['abs']) { ?>	
<tr>
<td align="left" colspan="2" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("abs", 0));?>
</td>
</tr>
<?php } ?>

<?php if ($row['gbo']) { ?>	
<tr>
<td align="left" colspan="2" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("gbo", 0));?>
</td>
</tr>
<?php } ?>


<?php if ($row['computer']) { ?>	
<tr>
<td align="left" colspan="2" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("computer", 0));?>
</td>
</tr>
<?php } ?>

<?php if ($row['conditioner']) { ?>	
<tr>
<td align="left" colspan="2" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("conditioner", 0));?>
</td>
</tr>
<?php } ?>

<?php if ($row['warm_chair']) { ?>	
<tr>
<td align="left" colspan="2" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("warm_chair", 0));?>
</td>
</tr>
<?php } ?>

<?php if ($row['guard']) { ?>	
<tr>
<td align="left" colspan="2" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("guard", 0));?>
</td>
</tr>
<?php } ?>

<?php if ($row['parktronik']) { ?>	
<tr>
<td align="left" colspan="2" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("parktronik", 0));?>
</td>
</tr>
<?php } ?>


<?php if ($row['security_pillows']) { ?>	
<tr>
<td align="left" colspan="2" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("security_pillows", 0));?>
</td>
</tr>
<?php } ?>

<?php if ($row['toned']) { ?>	
<tr>
<td align="left" colspan="2" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("toned", 0));?>
</td>
</tr>
<?php } ?>

<?php if ($row['amplifier_rudder']) { ?>	
<tr>
<td align="left" colspan="2" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("amplifier_rudder", 0));?>
</td>
</tr>
<?php } ?>

<?php if ($row['electro_gas']) { ?>	
<tr>
<td align="left" colspan="2" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("electro_gas", 0));?>
</td>
</tr>
<?php } ?>
	
</table>


		