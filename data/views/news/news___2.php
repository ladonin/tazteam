<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>
   <?php include("data/components/_general/breadcrumbs.php"); ?>
<a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1);?><?php if (GeneralGetVars::$num_page) {echo("/".GeneralGetVars::$num_page);}?>" class="link_normal">отменить</a>

<div class="v_i_b"></div>
<div class="grey_line_1"></div>
<div class="v_i_b"></div>
<?php  
if (GeneralSecurity::detect_administrator()==true){
    
    
    

    
    
    
    
    
	NewsBase::detect_themepage();
	NewsForreg::detect_status_news();
	GeneralInputText::$id="submit_1";?>
	<form method="post" 
		action="<?php echo(GeneralGetVars::$urltosubmit);?>" 
		enctype="multipart/form-data" 
		onsubmit="return general___new_news('inputtexttextarea<?php echo(GeneralInputText::$id);?>','inputtexthtml<?php echo(GeneralInputText::$id);?>','inputtextnacked<?php echo(GeneralInputText::$id);?>');">
		<?php	
		if (NewsForreg::$status_news==2){
			NewsSendTopic::detect_parameters_for_redact($MSQLc);
			?><input name="submit" value="redactnews" type="hidden"><?php }
		else {
			?><input name="submit" value="sendnewnews" type="hidden"><?php } ?>	
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td align="left" valign="top" width="600">

			<?php
				include("data/components/news/news___2_redact.php");?>

		<div class="v_i_b"></div>
		<input value="сохранить" class="btn btn-success" type="submit">
		<?php GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>
		<div class="v_i_b"></div>
	</td>
	<td align="left" width="200" valign="top" class="padding_left_10">
	<?php include("data/components/news/news___2_redact_photo.php"); ?>
	</td>
	</tr>
	</table>
	</form>
<?php } ?>

</div>


