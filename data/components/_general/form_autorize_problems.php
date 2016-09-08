<?php if ((UsersMydata::$enter_status==3)||(UsersMydata::$send_mail_for_repassword_status==2)){
    UsersMyData::$problems_status=1;
    ?>
    <p class="text-error">Пользователь с такими данными не найден.</p>
	<?php if (UsersMydata::$enter_status==3){	?>
    <p class="text-info"> Если вы при входе используете логин, то попробуйте ввести вместо него свой E-mail.</p>
    <?php } ?>
    
    <p>Забыли пароль?</p>

    <form method="POST" class="form-horizontal" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___revision_repassword_mail();">
    <div class="control-group">
    <label class="control-label" for="textarea_repassword_mail">Ваш email</label>
    <div class="controls">
    <input type="text" name="unreg_repassword_mail" id="textarea_repassword_mail" placeholder="email">
    <br />
    <span class="label label-info">на эту почту придет ссылка на смену пароля</span>
    </div>
    </div>
  
    <div class="control-group">
    <label class="control-label" for="textarea_repassword_mail_antibot"><?php echo(GeneralAntibot::show());?></label>
    <div class="controls">
    <input type="text" maxlength="5" name="unreg_repassword_mail_antibot" id="textarea_repassword_mail_antibot" placeholder="введите символы на картинке">
    <br />
    <span class="label label-info">антибот</span></div>
    </div>
        
    <div class="control-group">
    <div class="controls">
    <button type="submit" class="btn btn-success">Отправить</button>
    </div>
    </div>
		
    <input name="submit" value="user_unreg_repassword_mail" type="hidden">
    <input value="<?php echo(GeneralAntibot::$code);?>" type="hidden" name="unreg_repassword_mail_oves" id="textarea_repassword_mail_antibot_real">		
    </form>
	<?php	}


		
	if (UsersMydata::$enter_status==2){
        UsersMyData::$problems_status=1;	?>
        <p class="text-error">На сайте instorage.org/portfolio/tazteam не найдено вашей страницы из VK.com.</p>
        <p class="text-info">Если у вас на instorage.org/portfolio/tazteam есть старый аккаунт, войдите на него через почту (или логин) и пароль. Там вы сможете привязать страницу из VK.com.</p>
        <p class="text-info">Вы можете <a class="btn btn-primary" href="<?php echo(GeneralGlobalVars::url_enter_across_vk."&response_type=code&v=5.0");?>">перенести свою страницу из VK.com</a>, или зарегистроваться, используя вашу почту и пароль.</p>
	<?php }	
    
    
    
	if (UsersMyData::$reg_status==2){
        UsersMyData::$problems_status=1;		
		?><p class="text-error">Пользователь с таким E-mail уже существует.</p><?php
	}
    
    
    
	/*if (UsersMyData::$reg_status==1){?>
		<div class="attention_2" style="padding:5px; margin:0 20px 0 10px;">Регистрация почти закончена! На вашу почту отправлено письмо с подтверждением. Откройте письмо, чтобы активировать свою персональную страницу.</div> 
		<div class="v_i_b"></div><?php
	} */
    ?>