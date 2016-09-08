<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left" width="220">


	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
    <?php if (ForumBase::$find_status!=1) {?>
	<td width="1%" class="padding_right_10">
	<?php echo(GeneralPagesCounter::$htmlarrows); ?>
	</td> 
    <?php } ?>
    
	<td width="1%" class="padding_right_10">
		 <a href="<?php echo(GeneralGlobalVars::url);?>/forum" class="btn btn-primary btn-small" title="наверх">▲</a>
	</td>    
	<td align="left" width="98%"><?php		
		if (UsersMyData::$identified==1) {//для зарегистрированных пользователей ?>	
			<input value="новая тема" class="btn btn-success btn-small" type="button" onclick="general___swim_show_hide('swim_new_topic');"  href="#new_topic_forum" data-toggle="modal">
            
            
            
            
            
            
            
            
            
            
            
            
			<?php GeneralImagesPreload::input("images/_general/general___new_topic_submit_hover.png"); } 
		else {?>
		<input value="новая тема" class="btn btn-success btn-small disabled" type="button">
		<?php } ?>	
	</td>
	</tr>
	</table>	
	
</td>
<td align="right" valign="bottom"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>

<div class="v_i_b"></div>



<?php include("data/components/forum/panels/find_buttons.php");?>