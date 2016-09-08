<?php if(GeneralDialogWindows::$border==1) { ?><div class="well"><?php } ?><?php
if (UsersMyData::$identified==1){ ?>
	<script type="text/javascript">
	signaturing_page="<?php echo(GeneralDialogWindows::$signaturing); ?>";//для очистки оповещений с этого диалога
	signaturing_id_photo=<?php echo(GeneralDialogWindows::$idphoto); ?>;//для очистки оповещений с этого диалога
	general___inputtext_max_lenght_word=25;
	</script>
<?php } ?>






<div style="width:100%;" id="div_dialog_1_var_width">
	<?php
	GeneralInputText::$id="dialog";;
	include("data/components/_general/dialog_windows/dialog_windows_1___query_3.php");
	$dialog_windows_1_row=GeneralMYSQL::fetch_array($dialog_windows_1_res);
	?>
	<?php if (GeneralDialogWindows::$id_dialog=="users_dialogs_1"){?>

		<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
		<td align="left">
		<p class="lead"><a href="http://instorage.org/portfolio/tazteam/users/<?php echo(UsersDialogs::$who);?>"><?php echo(GeneralDialogWindows::$namedialog);?></a></p>
		</td>
		<td align="right">
			<p class="lead"><div id="dw1_divchat_count_messages"><?php echo($dialog_windows_1_row['count']);?></div></p>
		</td>
		</tr>
		</table>
	<?php }

	
	
	else if (GeneralDialogWindows::$id_dialog=="main_page_1"){ ?>	

		<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
		<td align="left">
		<p class="lead"><?php echo(GeneralDialogWindows::$namedialog);?></p>
		</td>
		<td align="right">
			<p class="lead"><?php //echo($dialog_windows_1_row['count']);?></p>
		</td>
		</tr>
		</table>
	<?php }		
	

	else { ?>	
	<div style="cursor:pointer" onclick="general___swim_show_hide('dw1_divchat_swim_<?php echo(GeneralDialogWindows::$id_dialog);?>'); general___swim_show_hide('dw1_divchat_swim_button_<?php echo(GeneralDialogWindows::$id_dialog);?>'); general___scroll_object('dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>',1);">
		<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
		<td align="left">
		<p class="lead"><?php echo(GeneralDialogWindows::$namedialog);?></p>
		</td>
		<td align="right">
			<p class="lead"><div id="dw1_divchat_count_messages"><?php echo($dialog_windows_1_row['count']);?></div></p>
		</td>
		</tr>
		</table>
	</div>
	<?php } ?>
	</div>



<table cellpadding="0" cellspacing="0" width="100%"<?php /* class="boxShadow4"*/?>>
	
<tr>
<td align="left">






		

	<div id="dw1_divchat_swim_button_<?php echo(GeneralDialogWindows::$id_dialog);?>"><div class="v_i_s"></div><a class="link_normal" style="cursor:pointer" onclick="general___swim_show_hide('dw1_divchat_swim_<?php echo(GeneralDialogWindows::$id_dialog);?>'); general___swim_show_hide('dw1_divchat_swim_button_<?php echo(GeneralDialogWindows::$id_dialog);?>'); general___scroll_object('dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>',1);">развернуть</a><div class="v_i_s"></div></div>

	
	<?php
	GeneralDialogWindows::detect_id_message_start($MSQLc);
	include("data/components/_general/dialog_windows/dialog_windows_1___query_1.php");
	?>

	<div id="dw1_divchat_swim_<?php echo(GeneralDialogWindows::$id_dialog);?>" class="padding_right_<?php echo(GeneralDialogWindows::$padding_right);?>">
		<div class="dialog_windows1_1" style="max-height:<?php echo(GeneralDialogWindows::$height);?>; width:100%;" id="dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>">
			<div id="dw1_bodychat_<?php echo(GeneralDialogWindows::$id_dialog);?>">
				<?php include("js/scripts/_general/dialog_windows/dialog_windows_1___loading_last.php"); ?>
				<script type="text/javascript">dialog_windows_detect_width_message('dwLL1_ajax_div_<?php echo(GeneralDialogWindows::$id_dialog);?>');</script>
				<?php
				while ($dialog_windows_1_row=GeneralMYSQL::fetch_array($dialog_windows_1_res)){?>
					<?php /*<b><?php echo($dialog_windows_1_row['id_message']);?></b>*/
					include("dialog_windows_1___message.php");
					GeneralDialogWindows::$messages_presence=1;
					GeneralDialogWindows::$id_message_current=$dialog_windows_1_row['id_message'];}
				GeneralMYSQL::free($dialog_windows_1_res);	
				GeneralDialogWindows::$id_message_current++;
				if (GeneralDialogWindows::$id_message_current==1) {?>
				<div class="dialog_windows1_8 content_dark" id="dw1_noonewrite_<?php echo(GeneralDialogWindows::$id_dialog);?>"><div class="v_i_s"></div>никто ничего не писал ...пока<div class="v_i_s"></div></div>
				<?php }
				else{?>
					<script type="text/javascript">$("#dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>").css("overflow-y","scroll");</script>
				<?php }
				include("js/scripts/_general/dialog_windows/dialog_windows_1___loading_new.php"); ?>
			</div>
		</div>
        </div>
        
</td>
</tr>	
        
        
        
        
		<?php if ((UsersMyData::$identified==1)||(GeneralDialogWindows::return_privacy(GeneralGetVars::$var1)==2)){ ?>
<tr>
<td align="left" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; border-top:1px solid #dddddd; border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
<div class="padding_left_5 padding_right_5">

<div class="row-fluid">
			<div class="v_i_b"></div>
			<strong><?php echo(GeneralDialogWindows::$textforpanel);?></strong>
			<div class="v_i_b"></div>



			<textarea 
            maxlength="5000" 
            class="inputtexttextarea span12" 
            id="inputtexttextarea<?php echo(GeneralInputText::$id);?>" 
            name="inputtexttextarea" 
            ></textarea>		
			<input value="" type="hidden" name="inputtexthtml" id="inputtexthtml">
			
<div class="v_i_b"></div>
                <button class="btn btn-success" onclick="general___dialog_windows_1_send_message('<?php echo(GeneralDialogWindows::$id_dialog);?>','inputtexttextarea<?php echo(GeneralInputText::$id);?>','inputtexthtml','<?php echo(GeneralDialogWindows::$database);?>','<?php echo(GeneralDialogWindows::$autor);?>','<?php echo(GeneralDialogWindows::$time);?>','<?php echo(GeneralDialogWindows::$textvalue);?>','<?php echo(GeneralDialogWindows::$idmessage);?>','<?php echo(GeneralDialogWindows::$valuesnumber);?>','<?php echo(GeneralDialogWindows::$value1);?>','<?php echo(GeneralDialogWindows::$value2);?>','<?php echo(GeneralDialogWindows::$value3);?>','<?php echo(GeneralDialogWindows::$value4);?>','<?php echo(GeneralDialogWindows::$value5);?>','<?php echo(GeneralDialogWindows::$value6);?>','<?php echo(GeneralDialogWindows::$value7);?>','<?php echo(GeneralDialogWindows::$value8);?>','<?php echo(GeneralDialogWindows::$value9);?>','<?php echo(GeneralDialogWindows::$value10);?>','<?php echo(GeneralDialogWindows::$condition1);?>','<?php echo(GeneralDialogWindows::$condition2);?>','<?php echo(GeneralDialogWindows::$condition3);?>','<?php echo(GeneralDialogWindows::$condition4);?>','<?php echo(GeneralDialogWindows::$condition5);?>','<?php echo(GeneralDialogWindows::$signaturing);?>','<?php echo(GeneralDialogWindows::$pagetype);?>','<?php echo(GeneralDialogWindows::$getvar1);?>','<?php echo(GeneralDialogWindows::$getvar2);?>','<?php echo(GeneralDialogWindows::$getvar3);?>','<?php echo(GeneralDialogWindows::$getvar4);?>','<?php echo(GeneralDialogWindows::$num_page);?>','<?php echo(GeneralDialogWindows::$idphoto);?>');">Отправить</button> 		

			<?php GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>
<div class="v_i_b"></div>            <?php include("data/components/_general/inputtext/panel_top.php"); ?>

			
			<div class="v_i_b"></div>
     </div>  </div>     
</td>
</tr>            
            
    <tr><td>
    <div class="v_i_b"></div>
    </td></tr>        
            
            
         <?php   }
         else { ?>
         
         
         
         
         
         
         
         
         
         
         
<tr>
<td align="left">

		<small>
Чтобы оставить сообщение нужно 


<a data-toggle="modal" href="#enter">




войти</a> или 
<?php /*
<a class="link_normal" onclick="jQuery('html,body').animate({'scrollTop': 0}, 1); general___swim_show_hide('swim_registration_panel'); general___swim_hide('swim_enter_panel');">зарегистрироваться</a>

*/?>

<a data-toggle="modal" href="#registration">зарегистрироваться</a>

        </small>  
</td>
</tr>          
         
         
         
         
         
         
         
         
         
         <?php } ?>
</table>	
	<script type="text/javascript">
	<?php 
	if (GeneralDialogWindows::$type==4){?>
		general___swim_hide('dw1_divchat_swim_<?php echo(GeneralDialogWindows::$id_dialog);?>');	
		$('#dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>').height($(window).height()-579);
		if (($('#dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>').height()<(270+150))||(($(window).height()-579)<1)) {$('#dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>').height(270+150);}
	<?php } 
	if (GeneralDialogWindows::$type==3){?>
		general___swim_hide('dw1_divchat_swim_button_<?php echo(GeneralDialogWindows::$id_dialog);?>');
		$('#dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>').height($(window).height()-579);
		if (($('#dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>').height()<(270+150))||(($(window).height()-579)<1)) {$('#dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>').height(270+150);}
	<?php } 
	if (GeneralDialogWindows::$type==2){?>
	general___swim_hide('dw1_divchat_swim_<?php echo(GeneralDialogWindows::$id_dialog);?>');
	<?php } 
	if (GeneralDialogWindows::$type==1)	{?>
		general___swim_hide('dw1_divchat_swim_button_<?php echo(GeneralDialogWindows::$id_dialog);?>');
	<?php } ?>
	</script>
	


<?php
		if (GeneralDialogWindows::$id_dialog=="users_wall_1"){
		if (GeneralDialogWindows::$messages_presence==1){
			if (UsersBase::detect_its_mypage(1)==true){//если мы на своей странице 
			?>
			<div class="v_i_b"></div>			
			<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return confirm('Вы уверены?');">
			<input type="submit" value="очистить стену" class="btn btn-link btn-small">
			<input type="hidden" name="submit" value="users_wall_clear">
			</form>
			<?php	GeneralImagesPreload::input("images/users/wall/users___wall_clear_hover.png");	?>

			<?php	
			}}}	?>


<?php if(GeneralDialogWindows::$border==1) { ?></div><?php } ?>
