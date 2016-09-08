    <form method="POST" class="form-horizontal" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___revision_regdata();">

    <div class="control-group">
    <div class="controls">
    <a class="btn btn-primary" href="<?php echo(GeneralGlobalVars::url_registration_across_vk."&response_type=code&v=5.0");?>">Регистрация через VK.com</a>
    </div>
    </div> 
    
    
    <div class="control-group">
    <div class="controls">
    или
    </div>
    </div>
        
   
    

    
    













    <div class="control-group">
    <label class="control-label" for="textarea_reg_mail">Ваш email</label>
    <div class="controls">
    <input type="text" name="UsersMyDataRegistration_mail" id="textarea_reg_mail" placeholder="email">
    </div>
    </div>
  
  
    <div class="control-group">
    <label class="control-label" for="textarea_reg_password">Придумайте пароль</label>
    <div class="controls">
    <input type="password" name="UsersMyDataRegistration_password" id="textarea_reg_password" placeholder="пароль">
    <span class="label label-info">пароль сохранится на вашем e-mail</span></div>
    </div>
    

    <div class="control-group">
    <label class="control-label" for="textarea_reg_antibot"><?php echo(GeneralAntibot::show());?></label>
    <div class="controls">
    <input type="text" maxlength="5" name="UsersMyDataRegistration_antibot" id="textarea_reg_antibot" placeholder="введите символы на картинке">
    <br />
    <span class="label label-info">антибот</span></div>
    </div>
    
    
    <div class="control-group">
    <div class="controls">
    <button type="submit" class="btn btn-success">Зарегистрироваться</button>
    </div>
    </div>












    
    
    
		<input value="<?php echo(GeneralAntibot::$code);?>" type="hidden" name="oves" id="antibot_real">
		<input value="1" type="hidden" name="UsersMyDataRegistration">
    <input name="submit" value="user_registration" type="hidden">

    </form>    
    

 

    
    












	