<?php
	if (UsersBase::$array_self_data_schools_enable==1){

		UsersBase::$text_gen_schools_name=				explode("  ",UsersBase::$array_self_data_schools['gen_schools_name']);
		UsersBase::$text_site_cityschool=				explode("  ",UsersBase::$array_self_data_schools['site_cityschool']);
		UsersBase::$text_site_oblastschool=				explode("  ",UsersBase::$array_self_data_schools['site_oblastschool']);
		UsersBase::$text_gen_schools_year_from=			explode("  ",UsersBase::$array_self_data_schools['gen_schools_year_from']);
		UsersBase::$text_gen_schools_year_to=			explode("  ",UsersBase::$array_self_data_schools['gen_schools_year_to']);
		//UsersBase::$text_gen_schools_year_graduated=	explode("  ",UsersBase::$array_self_data_schools['gen_schools_year_graduated']);
		UsersBase::$text_gen_schools_class=				explode("  ",UsersBase::$array_self_data_schools['gen_schools_class']);
		UsersBase::$text_gen_schools_speciality=		explode("  ",UsersBase::$array_self_data_schools['gen_schools_speciality']);
		UsersBase::$text_site_nametypeschool=			explode("  ",UsersBase::$array_self_data_schools['site_nametypeschool']);	
		$cv5=0;
		foreach(UsersBase::$text_gen_schools_name as $key=>$value){
			$cv5++;
			?>
			<div id="swim_form_self_data_schools_<?php echo($cv5);?>">
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				<?php 
				if (isset(UsersBase::$text_site_nametypeschool[$key])){
					if (UsersBase::$text_site_nametypeschool[$key]){
						echo(UsersBase::$text_site_nametypeschool[$key]); }
					else {echo("Школа:");}}		
				else {echo("Школа:");}?>
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_name_<?php echo($cv5);?>" value="<?php 
				echo(UsersBase::$text_gen_schools_name[$key]); 
				?>">
			</td>
			</tr>
			</table>
			
			
			<input type="hidden" name="schools_nametypeschool_<?php echo($cv5);?>" value="<?php 
				if (isset(UsersBase::$text_site_nametypeschool[$key])){
					if (UsersBase::$text_site_nametypeschool[$key]){
						echo(UsersBase::$text_site_nametypeschool[$key]); }
					else {echo("Школа");}}		
				else {echo("Школа");}?>">
				
			
			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Город:
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_city_<?php echo($cv5);?>" value="<?php 
				if (isset(UsersBase::$text_site_cityschool[$key])){
					if (UsersBase::$text_site_cityschool[$key]){
						echo(UsersBase::$text_site_cityschool[$key]); }}
				?>">
			</td>
			</tr>
			</table>				
			
			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Регион:
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_region_<?php echo($cv5);?>" value="<?php 
				if (isset(UsersBase::$text_site_oblastschool[$key])){
					if (UsersBase::$text_site_oblastschool[$key]){
						echo(UsersBase::$text_site_oblastschool[$key]); }}	
				?>">
			</td>
			</tr>
			</table>			
			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Год поступления:
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_year_from_<?php echo($cv5);?>" value="<?php 
				if (isset(UsersBase::$text_gen_schools_year_from[$key])){
					if (UsersBase::$text_gen_schools_year_from[$key]){
						echo(UsersBase::$text_gen_schools_year_from[$key]); }}	
				?>">
			</td>
			</tr>
			</table>			
			
			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Год окончания:
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_year_to_<?php echo($cv5);?>" value="<?php 
				if (isset(UsersBase::$text_gen_schools_year_to[$key])){
					if (UsersBase::$text_gen_schools_year_to[$key]){
						echo(UsersBase::$text_gen_schools_year_to[$key]); }}	
				?>">
			</td>
			</tr>
			</table>				
			
			
			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Класс (буква):
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_class_<?php echo($cv5);?>" value="<?php 
				if (isset(UsersBase::$text_gen_schools_class[$key])){
					if (UsersBase::$text_gen_schools_class[$key]){
						echo(UsersBase::$text_gen_schools_class[$key]); }}	
				?>">
			</td>
			</tr>
			</table>				
			
			
			
			
			
			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Специализация:
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_speciality_<?php echo($cv5);?>" value="<?php 
				if (isset(UsersBase::$text_gen_schools_speciality[$key])){
					if (UsersBase::$text_gen_schools_speciality[$key]){
						echo(UsersBase::$text_gen_schools_speciality[$key]); }}	
				?>">
			</td>
			</tr>
			</table>			
			


		</div>		
		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			
		</td>
		<td align="left" valign="top">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td>
				<input type="checkbox" name="delete_schools_<?php echo($cv5);?>" value="1" style="cursor:pointer;"  onclick="general___swim_show_hide('swim_form_self_data_schools_<?php echo($cv5);?>');"> 
			</td>
			<td style="padding-left:5px;"> 
				<font style="line-height:20px;" class="explanation">удалить школу</font>
			</td>
			</tr>
			</table>
		</td>
		</tr>
		</table>




			


			
			
			<div class="v_i_b"></div>	
			<?php } ?>
			
			
			<input type="hidden" name="number_schools" value="<?php echo($cv5);?>">
			
			
			
			
			
			<?php }
		else {
			$cv5=1;	?>

		
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Учебное заведение:
			</td>
			<td align="left" valign="top">
		
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_nametypeschool_<?php echo($cv5);?>" value="">
			</td>
			</tr>
			</table>
						
			
		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			
		</td>
		<td align="left" valign="top" class="explanation padding_right_10">
			школа, техникум, музыкальная школа и т.д.
		</td>
		</tr>
		</table>			
			

			<div class="v_i_b"></div>
			
			
			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Название, номер:
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_name_<?php echo($cv5);?>" value="">
			</td>
			</tr>
			</table>				
			
			
			
			
			
			
			
			
			
			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Город:
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_city_<?php echo($cv5);?>" value="">
			</td>
			</tr>
			</table>				
			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Регион:
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_region_<?php echo($cv5);?>" value="">
			</td>
			</tr>
			</table>			









			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Год поступления:
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_year_from_<?php echo($cv5);?>" value="">
			</td>
			</tr>
			</table>			
			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Год окончания:
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_year_to_<?php echo($cv5);?>" value="">
			</td>
			</tr>
			</table>




			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Класс (буква):
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_class_<?php echo($cv5);?>" value="">
			</td>
			</tr>
			</table>				
			
			
			
			
			
			
			
			<table width="508" cellpadding="0"cellspacing="0">
			<tr>
			<td width="170" align="left" valign="top" class="grey">
				Специализация:
			</td>
			<td align="left" valign="top">
			
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="schools_speciality_<?php echo($cv5);?>" value="">
			</td>
			</tr>
			</table>

	
		<div class="v_i_s"></div>
		<div class="v_i_s"></div>
		<div class="v_i_b"></div>
		<?php } ?>
		<input type="hidden" name="number_schools" value="<?php echo($cv5);?>">