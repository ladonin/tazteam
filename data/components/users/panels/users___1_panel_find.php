<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___revision_users_find();">
<div id="swim_users_find_panel" class="<?php if (UsersBase::$find_status!=1){?>swim_panel<?php } ?> well">
	<div class="lead">Поиск участников:</div>


<table cellpadding="0" cellspacing="0">
<tr>
<td align="left" width="250" valign="top"> 

	<table cellpadding="0" cellspacing="0" width="230"  height="23">
	<tr valign="top" >
	<td width="140">На сайте </td>
	<td align="left">
		<input type="checkbox" name="online" value="1" id="users_find_online" style="cursor:pointer;" 
		<?php if (isset($_COOKIE['users'.$cv1.'_find_query_online'])) {if ($_COOKIE['users'.$cv1.'_find_query_online']==1) {echo("checked");}} ?>>			
	</td>
	</tr>
	</table>
	<div class="v_i_b"></div>

	
	<table cellpadding="0" cellspacing="0" width="230"  height="23">
	<tr valign="top" >
	<td width="140">С фото </td>
	<td align="left">
		<input type="checkbox" name="widthphoto" value="1" id="users_find_widthphoto" style="cursor:pointer;" 
		<?php if (isset($_COOKIE['users'.$cv1.'_find_query_widthphoto'])) {if ($_COOKIE['users'.$cv1.'_find_query_widthphoto']==1) {echo("checked");}} ?>>
	</td>
	</tr>
	</table>
	<div class="v_i_b"></div>
	
	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">Логин</td>
	<td align="right">
		<input id="users_find_login" style="border:1px solid #bbbbbb; width:100%" maxlength="30" name="login" value="<?php if (isset($_COOKIE['users'.$cv1.'_find_query_login'])) {
		  
          
          echo(
          htmlspecialchars($_COOKIE['users'.$cv1.'_find_query_login'], ENT_QUOTES)
          

          );
          
          
          
          
          } ?>">
	</td>
	</tr>
	</table>
	<div class="v_i_b"></div>
	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">Имя</td>
	<td align="right">
		<input id="users_find_name" style="border:1px solid #bbbbbb; width:100%" maxlength="30" name="name" value="<?php if (isset($_COOKIE['users'.$cv1.'_find_query_name'])) {echo(
        
        
        htmlspecialchars($_COOKIE['users'.$cv1.'_find_query_name'], ENT_QUOTES)
        
        );} ?>">
	</td>
	</tr>
	</table>
	<div class="v_i_b"></div>
	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">Фамилия</td>
	<td align="right">
		<input id="users_find_surname" style="border:1px solid #bbbbbb; width:100%" maxlength="30" name="surname" value="<?php if (isset($_COOKIE['users'.$cv1.'_find_query_surname'])) {
		  
          echo(
          htmlspecialchars($_COOKIE['users'.$cv1.'_find_query_surname'], ENT_QUOTES)
          
          
          );} ?>">
	</td>
	</tr>
	</table>



	
	
	
	
	
	
	

	
	
	
</td>
<td align="left" width="250" valign="top">
	
	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">Пол</td>
	<td align="right">
		<select name="sex" style="width:100%; font-size:12px;">
			<option value="0" <?php if (isset($_COOKIE['users'.$cv1.'_find_query_sex'])) {if ($_COOKIE['users'.$cv1.'_find_query_sex']=="") {echo("selected");}} ?>></option>				
			<option value="1" <?php if (isset($_COOKIE['users'.$cv1.'_find_query_sex'])) {if ($_COOKIE['users'.$cv1.'_find_query_sex']==1) {echo("selected");}} ?>>Женский</option>
			<option value="2" <?php if (isset($_COOKIE['users'.$cv1.'_find_query_sex'])) {if ($_COOKIE['users'.$cv1.'_find_query_sex']==2) {echo("selected");}} ?>>Мужской</option>
		</select>
	</td>
	</tr>
	</table>

	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">Семейное положение</td>
	<td align="right">
		<select name="relations" style="width:100%; font-size:12px;">
			<option value="0" <?php if (isset($_COOKIE['users'.$cv1.'_find_query_relations'])) {if ($_COOKIE['users'.$cv1.'_find_query_relations']=="") {echo("selected");}} ?>></option>				
			<option value="1" <?php if (isset($_COOKIE['users'.$cv1.'_find_query_relations'])) {if ($_COOKIE['users'.$cv1.'_find_query_relations']==1) {echo("selected");}} ?>>не женат/не замужем</option>
			<option value="2" <?php if (isset($_COOKIE['users'.$cv1.'_find_query_relations'])) {if ($_COOKIE['users'.$cv1.'_find_query_relations']==2) {echo("selected");}} ?>>есть друг/есть подруга</option>
			<option value="3" <?php if (isset($_COOKIE['users'.$cv1.'_find_query_relations'])) {if ($_COOKIE['users'.$cv1.'_find_query_relations']==3) {echo("selected");}} ?>>помолвлен/помолвлена</option>
			<option value="4" <?php if (isset($_COOKIE['users'.$cv1.'_find_query_relations'])) {if ($_COOKIE['users'.$cv1.'_find_query_relations']==4) {echo("selected");}} ?>>женат/замужем</option>
			<option value="5" <?php if (isset($_COOKIE['users'.$cv1.'_find_query_relations'])) {if ($_COOKIE['users'.$cv1.'_find_query_relations']==5) {echo("selected");}} ?>>всё сложно</option>
			<option value="6" <?php if (isset($_COOKIE['users'.$cv1.'_find_query_relations'])) {if ($_COOKIE['users'.$cv1.'_find_query_relations']==6) {echo("selected");}} ?>>в активном поиске</option>
			<option value="7" <?php if (isset($_COOKIE['users'.$cv1.'_find_query_relations'])) {if ($_COOKIE['users'.$cv1.'_find_query_relations']==7) {echo("selected");}} ?>>влюблён/влюблена</option>
		</select>
	</td>
	</tr>
	</table>


	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">Эл. почта</td>
	<td align="right">
		<input id="users_find_mail" style="border:1px solid #bbbbbb; width:100%" maxlength="50" name="mail" value="<?php if (isset($_COOKIE['users'.$cv1.'_find_query_mail'])) {echo(
        
        
        htmlspecialchars($_COOKIE['users'.$cv1.'_find_query_mail'], ENT_QUOTES)
        );} ?>">
	</td>
	</tr>
	</table>	
	<div class="v_i_b"></div>
	
	
	
	
	
	
	
	
	
	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">Год рождения</td>
	<td align="right">
		<input id="users_find_bdate_year" style="border:1px solid #bbbbbb; width:100%" maxlength="4" name="bdate_year" value="<?php if (isset($_COOKIE['users'.$cv1.'_find_query_bdate_year'])) {if ((int)$_COOKIE['users'.$cv1.'_find_query_bdate_year']>0) {echo(
        
        
        
        htmlspecialchars($_COOKIE['users'.$cv1.'_find_query_bdate_year'], ENT_QUOTES)
        
        );}} ?>">
	</td>
	</tr>
	</table>	
	<div class="v_i_b"></div>
	
	
	
	
	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">Город</td>
	<td align="right">
		<input id="users_find_city" style="border:1px solid #bbbbbb; width:100%" maxlength="50" name="city" value="<?php if (isset($_COOKIE['users'.$cv1.'_find_query_city'])) {echo(
        
        
        
        htmlspecialchars($_COOKIE['users'.$cv1.'_find_query_city'], ENT_QUOTES)
        
        
        );} ?>">
	</td>
	</tr>
	</table>	
	

	
	

	

 </td>
 
 
 
 
 
 
 
 
 
 
 
 <td align="left" width="250" valign="top">

	
	
	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">ВУЗ</td>
	<td align="right">
		<input id="users_find_university" style="border:1px solid #bbbbbb; width:100%" maxlength="100" name="university" value="<?php if (isset($_COOKIE['users'.$cv1.'_find_query_university'])) {
		  
          echo(
          
          
          
          htmlspecialchars($_COOKIE['users'.$cv1.'_find_query_university'], ENT_QUOTES)
          
          
          );} ?>">
	</td>
	</tr>
	</table>
  	<div class="v_i_b"></div>
 	<table cellpadding="0" cellspacing="0" width="230"  height="23">
	<tr valign="bottom" >
	<td width="140"></td>
	<td align="left" class="link_lead_small">Школа:
	</td>
	</tr>
	</table>	
<div class="v_i_b"></div>	
	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">Регион</td>
	<td align="right">
		<input id="users_find_school_region" style="border:1px solid #bbbbbb; width:100%" maxlength="100" name="school_region" value="<?php if (isset($_COOKIE['users'.$cv1.'_find_query_school_region'])) {echo(
        
        
        
        htmlspecialchars($_COOKIE['users'.$cv1.'_find_query_school_region'], ENT_QUOTES)
        
        
        );} ?>">
	</td>
	</tr>
	</table>	
<div class="v_i_b"></div>	
	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">Город</td>
	<td align="right">
		<input id="users_find_school_city" style="border:1px solid #bbbbbb; width:100%" maxlength="100" name="school_city" value="<?php if (isset($_COOKIE['users'.$cv1.'_find_query_school_city'])) {
		  
          echo(
          
htmlspecialchars($_COOKIE['users'.$cv1.'_find_query_school_city'], ENT_QUOTES)
          
          
          
          
          
          );} ?>">
	</td>
	</tr>
	</table>		
<div class="v_i_b"></div>
	<table cellpadding="0" cellspacing="0" width="230"    height="23">
	<tr valign="top" >
	<td width="140">Номер, название</td>
	<td align="right">
		<input id="users_find_school_name" style="border:1px solid #bbbbbb; width:100%" maxlength="100" name="school_name" value="<?php if (isset($_COOKIE['users'.$cv1.'_find_query_school_name'])) {
		  
          
          echo(
          
          htmlspecialchars($_COOKIE['users'.$cv1.'_find_query_school_name'], ENT_QUOTES)
          
          
          
          );} ?>">
	</td>
	</tr>
	</table>	
 
 
 
  </td>
 
 
 
</tr>
</table>	
<div class="v_i_b"></div>



		
	
	
	
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left" valign="bottom" width="1%">
    <a class="btn btn-warning btn-small" onclick="general___swim_hide('swim_users_find_panel');">убрать</a>
		
	</td>
	<td align="left" valign="bottom" class="padding_left_10">	
		<input value="Найти" class="btn btn-success btn-small" type="submit">
	 </td>
	</tr>
	</table>	
	
	
		<input name="submit" value="find_users<?php echo($cv1);?>" type="hidden">
		
		
	
</div>
</form><?php //GeneralImagesPreload::input("images/_general/general___find_submit_hover.png"); 	?>

	
	
	
<div class="v_i_b"></div>
	
	
	
	
	
	
	
	
	
	