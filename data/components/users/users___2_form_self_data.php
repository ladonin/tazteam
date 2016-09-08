

		<table cellpadding="0" cellspacing="0" width="508">
		<tr>
		<td align="left" class="lead">
			Личные данные
		</td>
		<td align="right">
			<?php /*
			if (UsersBase::$its_mypage==1){	?>
				<div style="cursor:pointer;" onclick="general___swim_show_hide('swim_self_data'); general___swim_show_hide('swim_form_self_data');">отмена</div>
				<?php }*/ ?>
		</td>
		</tr>
		</table>











	<div class="v_i_s"></div>

	

	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input name="submit" value="sendusersselfdata" type="hidden">
	
	
	

	
	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Имя:
	</td>
	<td align="left" valign="top">	
		<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="name" value="<?php echo($row['gen_name_user']); ?>">
	</td>
	</tr>
	</table>
		
	
	
	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Фамилия:
	</td>
	<td align="left" valign="top">	
		<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="surname" value="<?php echo($row['gen_surname_user']); ?>">
	</td>
	</tr>
	</table>
	
	
	


	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		День рождения:
	</td>
	<td align="left" valign="top">	
		<?php
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_form_self_data_borndate.php");
		?>
	</td>
	</tr>
	</table>
	
	

	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Пол:
	</td>
	<td align="left" valign="top">
		<select name="sex" style="width:100%; border:1px solid #bbbbbb;">
			<option value="0" <?php if (UsersBase::$array_self_data_main_relations['gen_sex']<1) {echo("selected");} ?>></option>
			<option value="1" <?php if (UsersBase::$array_self_data_main_relations['gen_sex']==1) {echo("selected");} ?>>женский</option>
			<option value="2" <?php if (UsersBase::$array_self_data_main_relations['gen_sex']==2) {echo("selected");} ?>>мужской</option>
		</select>
	</td>
	</tr>
	</table>
	


	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Семейное положение:
	</td>
	<td align="left" valign="top">
		<select name="relations" style="width:100%; border:1px solid #bbbbbb;">
			<option value="0" <?php if (UsersBase::$array_self_data_main_relations['gen_relations']<1) {echo("selected");} ?>></option>
			<option value="1" <?php if (UsersBase::$array_self_data_main_relations['gen_relations']==1) {echo("selected");} ?>>не женат/не замужем</option>
			<option value="2" <?php if (UsersBase::$array_self_data_main_relations['gen_relations']==2) {echo("selected");} ?>>есть друг/есть подруга</option>
			<option value="3" <?php if (UsersBase::$array_self_data_main_relations['gen_relations']==3) {echo("selected");} ?>>помолвлен/помолвлена</option>				
			<option value="4" <?php if (UsersBase::$array_self_data_main_relations['gen_relations']==4) {echo("selected");} ?>>женат/замужем </option>				
			<option value="5" <?php if (UsersBase::$array_self_data_main_relations['gen_relations']==5) {echo("selected");} ?>>всё сложно</option>				
			<option value="6" <?php if (UsersBase::$array_self_data_main_relations['gen_relations']==6) {echo("selected");} ?>>в активном поиске</option>				
			<option value="7" <?php if (UsersBase::$array_self_data_main_relations['gen_relations']==7) {echo("selected");} ?>>влюблён/влюблена</option>				
		</select>
	</td>
	</tr>
	</table>
	



	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Логин:
	</td>
	<td align="left" valign="top">
		<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="login" value="<?php echo(UsersBase::$array_self_data_main['gen_login_user']); ?>">
	</td>
	</tr>
	</table>
	
	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		
	</td>
	<td align="left" valign="top">
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td>
			<input type="checkbox" name="loginstatus" value="1" style="cursor:pointer;" <?php if ($row['site_login_status']==1) {echo("checked");}?>> 
		</td>
		<td style="padding-left:5px;" valign="middle"> 
			<font class="grey">отображать логин вместо имени</font>
		</td>
		</tr>
		</table>
	</td>
	</tr>
	</table>
	<div class="v_i_b"></div>
		



<div class="v_i_s"></div>
	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
	
	</td>
	<td align="left" valign="top">
		<input value="сохранить" class="btn btn-success" type="submit">	
	</td>
	</tr>
	</table>	
		
		
		
		
		
	<div class="v_i_b"></div>	
		
		
		
		
		
		
		
		
		



	


	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="370" align="left" valign="top" class="lead">
		Контактная информация:
	</td>
	<td align="left" valign="top">
		
	</td>
	</tr>
	</table>	
	<div class="v_i_b"></div>

	
	
<?php if (UsersBase::$array_self_data_contacts_mail['site_mail_user']) { ?>	
     
	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Ваш Mail:
	</td>
	<td align="left" valign="top">
		<?php echo(UsersBase::$array_self_data_contacts_mail['site_mail_user']); ?>
	</td>
	</tr>
	</table>
	<div class="v_i_s"></div>
	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		
	</td>
	<td align="left" valign="top">
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td>
			<input type="checkbox" name="mailstatus" value="1" style="cursor:pointer;" <?php if ($row['site_mail_status']==1) {echo("checked");}?>> 
		</td>
		<td style="padding-left:5px;" valign="middle"> 
			<font class="grey">отображать mail</font>
		</td>
		</tr>
		</table>
	</td>
	</tr>
	</table>
	<input name="mail" value="<?php echo(UsersBase::$array_self_data_contacts_mail['site_mail_user']); ?>" type="hidden">

	<div class="v_i_s"></div>	
	<?php } ?>
	
	
	
	
	
	
	
	
	
	

	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Страница в VK.com:
	</td>
	<td align="left" valign="top">
		<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="url_vk" value="<?php echo(UsersBase::$array_self_data_contacts['sn_url_vk']); ?>">
	</td>
	</tr>
	</table>


	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Моб. телефон:
	</td>
	<td align="left" valign="top">
		<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="mobile_phone" value="<?php echo(UsersBase::$array_self_data_contacts['mobile_phone']); ?>">
	</td>
	</tr>
	</table>


	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Доп. телефон:
	</td>
	<td align="left" valign="top">
		<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="add_phone" value="<?php echo(UsersBase::$array_self_data_contacts['add_phone']); ?>">
	</td>
	</tr>
	</table>

	
	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Город:
	</td>
	<td align="left" valign="top">
		<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="city_name" value="<?php echo(UsersBase::$array_self_data_contacts['gen_city_name']); ?>">
	</td>
	</tr>
	</table>


	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Район:
	</td>
	<td align="left" valign="top">
		<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="state_name" value="<?php echo(UsersBase::$array_self_data_contacts['gen_state_name']); ?>">
	</td>
	</tr>
	</table>
	




	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Регион:
	</td>
	<td align="left" valign="top">
		<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="region_name" value="<?php echo(UsersBase::$array_self_data_contacts['gen_region_name']); ?>">
	</td>
	</tr>
	</table>



	

	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Страна:
	</td>
	<td align="left" valign="top">
		<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="country_name" value="<?php echo(UsersBase::$array_self_data_contacts['gen_country_name']); ?>">
	</td>
	</tr>
	</table>
	<div class="v_i_b"></div>
	

	






	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="lead">
		Образование:
	</td>
	<td align="left" valign="top">
		
	</td>
	</tr>
	</table>	
	<div class="v_i_b"></div>
	
	<?php 
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_form_self_data_universities.php");
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_form_self_data_schools.php");
	?>
	
	
	
	
	
	
	
	<div class="v_i_s"></div>
	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
	
	</td>
	<td align="left" valign="top">
		<input value="сохранить" class="btn btn-success" type="submit">
	</td>
	</tr>
	</table>		
	<div class="v_i_b"></div>	
	

	
	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="lead">
		Работа:
	</td>
	<td align="left" valign="top">
		
	</td>
	</tr>
	</table>	
	
	<div class="v_i_b"></div>

	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Деятельность:
	</td>
	<td align="left" valign="top">
		<textarea maxlength="1000" style="border:1px solid #bbbbbb;  height:100px; width:100%;" name="activity"><?php echo(UsersBase::$array_self_data_activity['activity']); ?></textarea>
	</td>
	</tr>
	</table>	

	
	
	
	<div class="v_i_b"></div>
	
	
	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="lead">
		Личное:
	</td>
	<td align="left" valign="top">
		
	</td>
	</tr>
	</table>	
	<div class="v_i_b"></div>
	

	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Интересы:
	</td>
	<td align="left" valign="top">
		<textarea maxlength="1000" style="border:1px solid #bbbbbb;  height:100px; width:100%;" name="interests"><?php echo(UsersBase::$array_self_data_lichnoe['interests']); ?></textarea>
	</td>
	</tr>
	</table>


	

	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Любимые книги:
	</td>
	<td align="left" valign="top">
		<textarea maxlength="1000" style="border:1px solid #bbbbbb;  height:100px; width:100%;" name="books"><?php echo(UsersBase::$array_self_data_lichnoe['books']); ?></textarea>
	</td>
	</tr>
	</table>
	



	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Любимые игры:
	</td>
	<td align="left" valign="top">
		<textarea maxlength="1000" style="border:1px solid #bbbbbb;  height:100px; width:100%;" name="games"><?php echo(UsersBase::$array_self_data_lichnoe['games']); ?></textarea>
	</td>
	</tr>
	</table>
	

	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Любимые фильмы:
	</td>
	<td align="left" valign="top">
		<textarea maxlength="1000" style="border:1px solid #bbbbbb;  height:100px; width:100%;" name="movies"><?php echo(UsersBase::$array_self_data_lichnoe['movies']); ?></textarea>
	</td>
	</tr>
	</table>
	

	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Любимые телепередачи:
	</td>
	<td align="left" valign="top">
		<textarea maxlength="1000" style="border:1px solid #bbbbbb;  height:100px; width:100%;" name="tv"><?php echo(UsersBase::$array_self_data_lichnoe['tv']); ?></textarea>
	</td>
	</tr>
	</table>
	

	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		О себе:
	</td>
	<td align="left" valign="top">
		<textarea maxlength="1000" style="border:1px solid #bbbbbb;  height:100px; width:100%;" name="about"><?php echo(UsersBase::$array_self_data_lichnoe['about']); ?></textarea>
	</td>
	</tr>
	</table>
	

	

	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
		Ещё:
	</td>
	<td align="left" valign="top">
		<textarea maxlength="1000" style="border:1px solid #bbbbbb;  height:100px; width:100%;" name="adddata"><?php echo(UsersBase::$array_self_data_lichnoe['adddata']); ?></textarea>
	</td>
	</tr>
	</table>
	<div class="v_i_s"></div>

	<div class="v_i_s"></div>	
	
	<div class="v_i_s"></div>
	<table width="508" cellpadding="0"cellspacing="0">
	<tr>
	<td width="170" align="left" valign="top" class="grey">
	
	</td>
	<td align="left" valign="top">
		<input value="сохранить" class="btn btn-success" type="submit">	
	</td>
	</tr>
	</table>	
			
	
	
	
	
	
	
</form>
<?php
//GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");
?>
