<?php
$cv1=0;//написать сообщение
$cv2=0;//добавить в друзья
$cv3=0;//убрать из друзей
$cv4=0;//отписаться от него
$cv5=0;//отклонить заявку
$cv6=0;//принять заявку

if (UsersMyData::$identified==1){
    $cv1=1;
	if (GeneralGetvars::$var2==""){//страница списка пользоватеелй
		//если нет такого в моих друзьях и заявках от меня
		if ((!isset(UsersForreg::$array_my_friends[$rowusers['id_user']]))&&(!isset(UsersForreg::$array_my_friends_heto[$rowusers['id_user']])&&($rowusers['id_user']!=UsersMydata::$id))){
			$cv2=2;}}
	else if ((GeneralGetvars::$var4=="friends")&&(UsersBase::$its_mypage==1)){
		if (UsersFriends::$sort_by==1){
			
			$cv3=3;}
		else if (UsersFriends::$sort_by==2){
			
			$cv3=3;}
		else if (UsersFriends::$sort_by==3){
			$cv5=5;
			$cv6=6;}
		else if (UsersFriends::$sort_by==4){
			$cv4=4;}}
            
            ?>
            
            
            
            
            
            
            

<div style="float:left; padding-left:0px;">
    <div class="btn-group">
    
    <button class="btn btn-mini dropdown-toggle" data-toggle="dropdown">Действия <span class="caret"></span></button>
    <ul class="dropdown-menu pull-left">







<?php







	if ($cv1){?>

    
    
    
    <li style="text-align:left; padding:0 20px;">

    
		<form method="post" action="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($rowusers['id_user']);?>/dialogs">		
		<input type="submit" value="<?php echo(UsersBase::$array_buttons_to_userslists[$cv1]);?>" class="btn btn-link btn-small">
		</form>
    
    </li>
    
    
                                
    <?php }
	if ($cv2){?>
    
    <li style="text-align:left; padding:0 20px;">
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="userstofriends">
		<input type="hidden" name="who" value="<?php echo($rowusers['id_user']);?>">		
		<input type="submit" value="Добавить в друзья" class="btn btn-link btn-small">
		</form>
    </li>
    

		<?php }		
	if ($cv3){?>




    <li style="text-align:left; padding:0 20px;">
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return confirm('Убрать из друзей?');">
		<input type="hidden" name="submit" value="usersdelfromfriends">
		<input type="hidden" name="who" value="<?php echo($rowusers['id_user']);?>">
		<input type="submit" value="Убрать из друзей" class="btn btn-link btn-small">
		</form>
    </li>






	<?php }		
	if ($cv4){?>






    <li style="text-align:left; padding:0 20px;">
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return confirm('Отклонить заявку?');">
		<input type="hidden" name="submit" value="usersdelhetofriends">
		<input type="hidden" name="who" value="<?php echo($rowusers['id_user']);?>">
		<input type="submit" value="Отклонить заявку в друзья" class="btn btn-link btn-small">
		</form>
    </li>








		<?php }			
	if ($cv5){?>






    <li style="text-align:left; padding:0 20px;">
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return confirm('Убрать заявку?');">
		<input type="hidden" name="submit" value="usersdeltohimfriends">
		<input type="hidden" name="who" value="<?php echo($rowusers['id_user']);?>">
		<input type="submit" value="Отменить заявку в друзья" class="btn btn-link btn-small">
		</form>
    </li>








	<?php }		
	if ($cv6){?>
    <li style="text-align:left; padding:0 20px;">
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="usersaddhetofriends">
		<input type="hidden" name="who" value="<?php echo($rowusers['id_user']);?>">
		<input type="submit" value="Принять заявку в друзья" class="btn btn-link btn-small">
		</form>
    </li>
    
    
    
    
    
                            


	<?php }








?>



   	    
    
    </ul>
    </div>
</div>     
            
            
            <div style="clear: both;"></div>
            
            
            
            
            
            
            
            
            <?php
           







































    
    
    
    
    
    
    
    
    
     }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    	
		
?>