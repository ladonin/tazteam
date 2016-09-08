<?php
$cv1=0;//удалить диалог
$cv2=0;//восстановить диалог


if (UsersDialogs::$sort_by==1){
	$cv1=1;}
else if (UsersDialogs::$sort_by==2){
	$cv2=1;}




?>




<div style="float:left; padding-left:0px;">
    <div class="btn-group">    
    <button class="btn btn-mini dropdown-toggle" data-toggle="dropdown">Действия <span class="caret"></span></button>
    <ul class="dropdown-menu pull-left">






<?php




if ($cv1){?>
    <li style="text-align:left; padding:0 20px;">
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
	<input type="hidden" name="submit" value="usersdeletedialog"/>
	<input type="hidden" name="who" value="<?php echo(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['who']);?>">
	<input type="hidden" name="id_correspondence" value="<?php echo(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['id_correspondence']);?>">	
	<input type="submit" value="Удалить переписку" class="btn btn-link btn-small"/>
	</form><?php GeneralImagesPreload::input("images/users/lists/images/users/lists/users___submit_delete_dialog_text_11_hover.png");?>
    </li>
	<?php }		
if ($cv2){?>
    <li style="text-align:left; padding:0 20px;">
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
	<input type="hidden" name="submit" value="usersrestoredialog"/>
	<input type="hidden" name="who" value="<?php echo(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['who']);?>>">
	<input type="hidden" name="id_correspondence" value="<?php echo(UsersDialogs::$array_my_dialogs_lastmessage[$time][$key]['id_correspondence']);?>">	
	<input type="submit" value="Восстановить переписку" class="btn btn-link btn-small"/>
	</form><?php GeneralImagesPreload::input("images/users/lists/users___submit_restore_dialog_text_11_hover.png");?>
    </li>
<?php }		
?>



   	    
    
    </ul>
    </div>



