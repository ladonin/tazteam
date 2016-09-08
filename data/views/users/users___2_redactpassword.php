<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?><?php 
if (UsersBase::detect_its_mypage(2)==true){//определяем - наша страница или нет
	?>
	<a href="http://instorage.org/portfolio/tazteam/users/<?php echo(GeneralGetVars::$var2);?>" class="btn btn-primary btn-small">к&nbsp;странице&nbsp;пользователя</a>
	<div class="v_i_b"></div>
	<div class="lead">Новый пароль:</div>

	<div class="v_i_b"></div>
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___revision_redactpassword();">	
	<input type="text" placeholder="новый пароль" style="width:170px;"
		id="textarea_reg_password"  

		maxlength="25" 
		name="redacting_password" 
		value=""/>
	<input type="hidden" name="submit" value="sendusersnewpassword">
	<div class="v_i_b"></div>
	<input type="submit" value="Изменить" class="btn btn-success btn-small">
	</form>
	<div class="v_i_b"></div>


<script type="text/javascript">
//$(window).load(function(){
//general___regtextarea('textarea_reg_password','blur');});
</script>	
	<?php
	GeneralImagesPreload::input("images/_general/general___send_submit_hover.png"); 
	
	
	
	
	
	if(UsersMyData::$changepassword_status==1){	?>
	<span class="grey">Ваш пароль успешно изменен, на вашу почту пришло письмо с новым паролем.</span>
	<?php	}
	
	
	
	
	
	
	
	
	
	
}
?></div>