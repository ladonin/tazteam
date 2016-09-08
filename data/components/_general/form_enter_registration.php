<div id="swim_enter_panel" class="swim_panel">
<div class="v_i_b"></div>
<div class="padding_left_10 padding_right_20">
<table cellpadding="0" cellspacing="0">
<tr>
<td valign="top" align="left" width="160">	
	<div class="v_i_b"></div>
	<div class="content_dark">Войти через</div>
	<div class="v_i_b"></div>	
	<a href="<?php echo(GeneralGlobalVars::url_enter_across_vk."&response_type=code&v=5.0");?>"><img src="http://instorage.org/portfolio/tazteam/images/_general/logos/general___logo_vk.png" width="46" height="46" style="border:0px;"></a>
	<div class="v_i_b"></div>
</td>
<td valign="top" align="left" width="160">	
	<div class="v_i_b"></div>	
	<div class="content_dark">или</div>
	<div class="v_i_b"></div>
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___revision_enterdata();">
	<input name="submit" value="user_enter" type="hidden">
	
	<input class="input_login" type="text"
	id="textarea_input_login"  
	onkeyup="general___inputtextarea('textarea_input_login','keyup');"  
	onFocus="general___inputtextarea('textarea_input_login','focus'); general___inputtextarea('textarea_input_password','focus');"  
	onBlur="general___inputtextarea('textarea_input_login','blur'); general___inputtextarea('textarea_input_password','blur');"	
	maxlength="40" 
	name="UsersMyDataEnter_login" 
	value="">
	<div class="v_i_b"></div>

	<input class="input_password" 
	maxlength="25" 
	name="UsersMyDataEnter_password" 
	value=""
	type="password"
	id="textarea_input_password"  
	onkeyup="general___inputtextarea('textarea_input_password','keyup');"  
	onFocus="general___inputtextarea('textarea_input_password','focus');"   
	onBlur="general___inputtextarea('textarea_input_password','blur');">

	<div class="v_i_b"></div>
	<input value="1" type="hidden" name="UsersMyDataEnter">
	<input value="" class="submit_enter" type="submit">
	</form>
	<div class="v_i_b"></div>

	<?php
	if ((UsersMydata::$enter_status==3)||(UsersMydata::$send_mail_for_repassword_status==2)){
	?>
	<div class="attention_1" style="padding:5px;">Пользователь с такими данными не найден. Если вы при входе используете логин, то попробуйте ввести вместо него свой E-mail.</div>
	<div class="v_i_b"></div>

	<div class="attention_2" style="padding:5px;">Забыли пароль?
	
	<div class="v_i_s"></div>

		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___revision_repassword_mail();">
		<input name="submit" value="user_unreg_repassword_mail" type="hidden">

		<input class="input_mail" type="text"
		id="textarea_repassword_mail"  
		onkeyup="general___repasswordtextarea('textarea_repassword_mail','keyup');"  
		onFocus="general___repasswordtextarea('textarea_repassword_mail','focus');"   
		onBlur="general___repasswordtextarea('textarea_repassword_mail','blur');" 
		maxlength="40" 
		name="unreg_repassword_mail" 
		value="">
		<div class="v_i_b"></div>

		<div class="ind_25" style="width:55px;">

		<input class="reg_antibot" type="text" 
		maxlength="5" 
		name="unreg_repassword_mail_antibot" 
		value=""
		id="textarea_repassword_mail_antibot"  
		onmouseout="general___repasswordtextarea('textarea_repassword_mail_antibot','out');" 
		onClick="general___repasswordtextarea('textarea_repassword_mail_antibot','click');" 
		onkeyup="general___repasswordtextarea('textarea_repassword_mail_antibot','keyup');" 
		onFocus="general___repasswordtextarea('textarea_repassword_mail_antibot','focus');" 
		onBlur="general___repasswordtextarea('textarea_repassword_mail_antibot','blur');">
		</div>
		<div class="ind_26">
			<?php echo(GeneralAntibot::show());?>		
		</div>
		<div style="clear:both"></div>
		<div class="v_i_b"></div>
		<input value="<?php echo(GeneralAntibot::$code);?>" type="hidden" name="unreg_repassword_mail_oves" id="textarea_repassword_mail_antibot_real">		

		<input value="" class="submit_send" type="submit">
		</form>
</div>
<div class="v_i_b"></div>	
	<?php	}


	if (UsersMydata::$send_mail_for_repassword_status==2){	?>
	<div class="attention_1" style="padding:5px;">Уважаемый пользователь, на сайте instorage.org/portfolio/tazteam не найдено такой почты, попробуйте ввести еще раз.</div>
	<div class="v_i_b"></div>	<?php	}
	if (UsersMydata::$send_mail_for_repassword_status==1){	?>
	<div class="attention_1" style="padding:5px;">Уважаемый пользователь, на вашу почту отправлено письмо со ссылкой перехода на вашу страницу.</div>
	<div class="v_i_b"></div>	<?php	}		
	if (UsersMydata::$enter_status==2){	?>
	<div class="attention_1" style="padding:5px;">Уважаемый пользователь, на сайте instorage.org/portfolio/tazteam не найдено вашей страницы из VK.com.</div>
	<div class="v_i_s"></div>
	<div class="attention_2" style="padding:5px;">Если у вас на instorage.org/portfolio/tazteam есть старый аккаунт, войдите на него через почту (или логин) и пароль. Там вы сможете привязать страницу из VK.com.</div>
	<div class="v_i_s"></div>
	<div class="attention_2" style="padding:5px;">Вы можете <a href="<?php echo(GeneralGlobalVars::url_registration_across_vk."&response_type=code&v=5.0");?>" class="big_link">перенести свою страницу из VK.com</a>, или зарегистроваться с помощью почты и пароля.</div> 
	<div class="v_i_b"></div>	
	<?php	}	?>
</td>
<td valign="bottom" align="left" width="160">	
	<div class="padding_left_10" style="padding-bottom:3px;">
    <a class="link_normal" onclick="general___swim_hide('swim_registration_panel'); general___swim_hide('swim_enter_panel');">убрать</a></div>
	<div class="v_i_b"></div> 
</td>
</tr>
</table>
</div>




</div>


<div id="swim_registration_panel" class="swim_panel">
<div class="v_i_b"></div>
<div class="padding_left_10 padding_right_20">
<table cellpadding="0" cellspacing="0">
<tr>
<td valign="top" align="left" width="160">
	
		<div class="v_i_b"></div>
		<div class="content_dark">Новый аккаунт за 1 сек</div>
		<div class="v_i_b"></div>	
		<a href="<?php echo(GeneralGlobalVars::url_registration_across_vk."&response_type=code&v=5.0");?>"><img src="http://instorage.org/portfolio/tazteam/images/_general/logos/general___logo_vk.png" width="46" height="46" style="border:0px;"></a>
		<div class="v_i_b"></div>
</td>
<td valign="top" align="left" width="160">	

		<div class="v_i_b"></div>			
		<div class="content_dark">или</div>
		<div class="v_i_b"></div>	
	
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___revision_regdata();">
		<input name="submit" value="user_registration" type="hidden">

		<input class="input_mail" type="text"
		id="textarea_reg_mail"  
		onkeyup="general___regtextarea('textarea_reg_mail','keyup');"  
		onFocus="general___regtextarea('textarea_reg_mail','focus');"   
		onBlur="general___regtextarea('textarea_reg_mail','blur');" 
		maxlength="40" 
		name="UsersMyDataRegistration_mail" 
		value="">

		<div class="v_i_b"></div>
		
		<input class="input_password" type="password" 
		id="textarea_reg_password"  
		onkeyup="general___regtextarea('textarea_reg_password','keyup');"  
		onFocus="general___regtextarea('textarea_reg_password','focus');"   
		onBlur="general___regtextarea('textarea_reg_password','blur');" 		
		maxlength="25" 
		name="UsersMyDataRegistration_password" 
		value="">

		<div class="v_i_b"></div>
		<div class="ind_25">

		<input class="reg_antibot" type="text" 
		maxlength="5" 
		name="UsersMyDataRegistration_antibot" 
		value=""
		id="textarea_reg_antibot"  
		onmouseout="general___regtextarea('textarea_reg_antibot','out');" 
		onClick="general___regtextarea('textarea_reg_antibot','click');" 
		onkeyup="general___regtextarea('textarea_reg_antibot','keyup');" 
		onFocus="general___regtextarea('textarea_reg_antibot','focus');" 
		onBlur="general___regtextarea('textarea_reg_antibot','blur');">
		</div>
		<div class="ind_26">
			<?php echo(GeneralAntibot::show());?>		
		</div>
		<div style="clear:both"></div>
		<div class="v_i_b"></div>
		<input value="<?php echo(GeneralAntibot::$code);?>" type="hidden" name="oves" id="antibot_real">
		<input value="1" type="hidden" name="UsersMyDataRegistration">
		<input value="" class="submit_registration" type="submit">
		</form>
		<div class="v_i_b"></div>
		<?php
		if (UsersMyData::$reg_status==2){		
			?>
			<div class="attention_1" style="padding:5px;">Пользователь с таким E-mail уже существует</div>
			<div class="v_i_b"></div> 
			<?php
		} ?>	

	</td>
	<td valign="bottom" align="left" width="160">	
	<div class="link_normal padding_left_10" onclick="general___swim_hide('swim_registration_panel'); general___swim_hide('swim_enter_panel');">Убрать</div>
	<div class="v_i_b"></div> 
	</td>
	</tr>
	</table>
	</div>


	</div>
	<?php
	if (UsersMyData::$reg_status==1){?>
		<div class="attention_2" style="padding:5px; margin:0 20px 0 10px;">Регистрация почти закончена! На вашу почту отправлено письмо с подтверждением. Откройте письмо, чтобы активировать свою персональную страницу.</div> 
		<div class="v_i_b"></div><?php
	} ?>

    <script type="text/javascript">
    <?php 
    if (UsersMyData::$reg_status==2){ ?>general___swim_show('swim_registration_panel');	<?php }
    if (UsersMydata::$enter_status==2){	?>	general___swim_show('swim_registration_panel');general___swim_show('swim_enter_panel');	<?php }
    if ((UsersMydata::$enter_status==3)||(UsersMydata::$send_mail_for_repassword_status==2)||(UsersMydata::$send_mail_for_repassword_status==1)){	?>general___swim_show('swim_enter_panel');<?php } 
    ?>
    $(window).load(function(){
    general___regtextarea('textarea_reg_mail','blur');
    general___regtextarea('textarea_reg_password','blur'); 
    general___regtextarea('textarea_reg_antibot','blur');
    general___inputtextarea('textarea_input_password','blur');
    general___inputtextarea('textarea_input_login','blur');});
    </script>	
<?php 
GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");
GeneralImagesPreload::input("images/_general/general___registration_submit_hover.png");
GeneralImagesPreload::input("images/_general/general___enter_submit_hover.png");
GeneralImagesPreload::input("images/_general/textarea/reg_mail2.png");
GeneralImagesPreload::input("images/_general/textarea/input_password2.png");
GeneralImagesPreload::input("images/_general/textarea/reg_antibot2.png");
GeneralImagesPreload::input("images/_general/textarea/input_login2.png");
?>