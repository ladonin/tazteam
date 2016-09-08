    <form method="POST" class="form-horizontal" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___revision_enterdata();">



    <div class="control-group">
    <div class="controls">
    <a class="btn btn-primary" href="<?php echo(GeneralGlobalVars::url_registration_across_vk."&response_type=code&v=5.0");?>">Войти через VK.com</a>
    </div>
    </div>

    <div class="control-group">
    <div class="controls">
    или
    </div>
    </div>
        
   
    <div class="control-group">
    <label class="control-label" for="textarea_input_login">Логин или email</label>
    <div class="controls">
    <input type="text" name="UsersMyDataEnter_login" id="textarea_input_login" placeholder="Логин или email">
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="textarea_input_password">Пароль</label>
    <div class="controls">
    <input type="password" name="UsersMyDataEnter_password" id="textarea_input_password" placeholder="пароль">
    </div>
    </div>

    <div class="control-group">
    <div class="controls">
    <button type="submit" class="btn btn-success">Войти</button>
    </div>
    </div>
 

    <input name="submit" value="user_enter" type="hidden">
    <input value="1" type="hidden" name="UsersMyDataEnter">
    </form>





