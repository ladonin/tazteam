<div class="lead">


<a href="<?php echo(GeneralGlobalVars::url);?>/<?php echo(GeneralGetVars::$var1."=".GeneralPagesCounter::$N_cur_current);?>" class="btn btn-primary btn-mini" style="margin-bottom:5px; margin-right:5px;" title="наверх">▲</a>










<?php echo(GarageBase::return_parameters("mark", $row['mark'])." "); echo($row['model']);?></div>




			<?php
            
            
            
            
            
            include("data/components/garage/garage___3_autor.php");	?>			
			
		

	<div class="v_i_b"></div>	
			
<table cellpadding="5" cellspacing="0" width="100%">
<tr>
<td align="left" colspan="2" bgcolor="#35526a" style="color: #ffffff; padding-left:10px;">
Основные данные:
</td>
</tr>







<?php if ($row['year_production']) { ?>	
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Год выпуска
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;  ">
<b class="big_text"><?php echo($row['year_production']);?> г.</b>
</td>
</tr>
<?php } ?>

<?php if ($row['country_producer']) { ?>	
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Страна-производитель
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px; ">
<?php echo($row['country_producer']);?>
</td>
</tr>
<?php } ?>

<?php if ($row['run']) { ?>	
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Пробег
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<b class="big_text"><?php echo($row['run']);?> км</b>
</td>
</tr>
<?php } ?>










<?php if ($row['power']) { ?>	
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Мощность двигателя
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px; ">
<?php echo($row['power']);?> л.с.
</td>
</tr>
<?php } ?>

		
<?php if ($row['motor_type']) { ?>
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Тип двигателя
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px; ">
<strong class="big_text"><?php echo(GarageBase::return_parameters("motor_type", $row['motor_type']));?></strong>
</td>
</tr>
<?php } ?>

<?php if ($row['motor_vol']) { ?>
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Объем двигателя
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  padding-left:10px; ">
<?php echo($row['motor_vol']);?> куб. см.
</td>
</tr>
<?php } ?>

<?php if ($row['KPP']) { ?>
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
КПП
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  padding-left:10px; ">
<?php echo(GarageBase::return_parameters("KPP", $row['KPP']));?>
</td>
</tr>
<?php } ?>


<?php if ($row['drive_type']) { ?>
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Тип привода
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("drive_type", $row['drive_type']));?>
</td>
</tr>
<?php } ?>

<?php if ($row['basket_type']) { ?>
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Тип кузова
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("basket_type", $row['basket_type']));?>
</td>
</tr>
<?php } ?>

<?php if ($row['salon']) { ?>
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Обивка салона
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo(GarageBase::return_parameters("salon", $row['salon']));?>
</td>
</tr>
<?php } ?>


<?php if ($row['color']) { ?>
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Цвет
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
 <?php echo($row['color']);?>
</td>
</tr>
<?php } ?>

<?php if ($row['color_hex']) { ?>
<tr>
<td align="left" width="50%" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1; padding-left:10px;">
Цвет HEX
</td>
<td align="left" width="50%" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px;">
<?php echo($row['color_hex']);?>
</td>
</tr>
<?php } ?>







</table>
			
			
		
		


	
		
<div class="v_i_b"></div>
