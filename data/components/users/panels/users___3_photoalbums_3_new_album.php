<div id="swim_new_topic" class="swim_panel well">
	<?php
	if (UsersBase::$its_mypage==1) {//для зарегистрированных пользователей
		?><form method="post" 
		action="<?php echo(GeneralGetVars::$urltosubmit);?>" 
		enctype="multipart/form-data" 
		onsubmit="return general___send_topic_photo('inputnametopictextarea','_1');">
		<input name="submit" value="sendusersphotoalbum" type="hidden"><?php
		$current_var1="Новый альбом:";	?>	
        
        
        <div class="lead"><?php echo($current_var1);?></div>
        <textarea maxlength="1000" style="height:100px; width:834px" id="inputnametopictextarea"  name="inputnametopictextarea" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'></textarea>
<?php
		//include("data/components/photo/panels/photo___2_new_topic.php");
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
		$current_var4="_1";	
		$current_var1="";
		$current_var2="redact";
		$current_var3="Приложить первую фотографию";
		$current_var5="";		
		$current_var6=1;
		$current_var7="swim_new_topic";
        
        
        
        if($current_var2) { ?>
            <div class="v_i_b"></div><div class="lead"><?php echo($current_var3);?>:</div>
        <?php } ?>
        <input type="file" name="img1" style="width:170px;" id="load_photo_img1<?php echo($current_var4);?>">
        <div class="v_i_b"></div>
        <div class="link_lead ">Описание к фото:</div>
        <textarea maxlength="1000" style="height:100px; width:834px" id="inputtexttextarea_1<?php echo($current_var4);?>"  name="inputtexttextarea_1" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'><?php echo($current_var5);?></textarea>
        <div class="v_i_b"></div>
        
        <?php if ($current_var6==1) {//если разрешено ?>
            <div style="float:left;" class="btn btn-warning btn-small" onclick="general___swim_hide('<?php echo($current_var7);?>');">убрать</div><?php 
        } ?>
        
        <div style="float:left;" class="padding_left_10"><input value="отправить" class="btn btn-success btn-small " type="submit"></div>

    	<div style="clear:both"></div>
        <?php //GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>
        <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td align="right" width="50%"> </td>
        <td align="left" width="50%"> </td>
        </tr>
        </table>
        
        <?php
        
        
        
        
		//include("data/components/_general/panels/work_width_photo_1.php");
		?></form><?php }
	?>
	<div class="v_i_b"></div>
</div>