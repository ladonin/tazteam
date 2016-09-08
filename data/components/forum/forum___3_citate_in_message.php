<?php
if ($row['id_message_to_citate']>0){ ?>
<div class="for3_30">
Цитирование: <a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($row['c_a_id_user']);?>" class="small_link_h1"><?php echo(UsersMyData::return_name($row['c_a_login_user'],$row['c_a_mail_user'],$row['c_a_name_user'],$row['c_a_surname_user'],$row['c_a_login_status']));?></a>
 написал:
</div>
<div class="for3_2">
<p class="p_small_text_h1">
<?php echo($row['text_citate']); ?>
 
 
 
 
 
 
 
</p>
	<?php  include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_photo_in_message.php"); ?>	

</div>







<?php } ?>