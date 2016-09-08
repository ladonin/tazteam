<div class="v_i_b"></div>
<div class="padding_left_10"><a href="<?php echo(GeneralGlobalVars::url);?>/automarket<?php if (GeneralGetVars::$num_page) {echo("/".GeneralGetVars::$var2."/".GeneralGetVars::$num_page);}?>" class="small_dark_link">отменить</a></div>
<div class="v_i_b"></div>
<div class="grey_line_1"></div>
<div class="v_i_b"></div>
<?php  
if (UsersMyData::$identified==1){
AutomarketForreg::detect_status_announcement();
?>

<form method="post" 
	action="<?php echo(GeneralGetVars::$urltosubmit);?>" 
	enctype="multipart/form-data" 
	onsubmit="return general___new_automarket_announcement('<?php echo(GeneralGetVars::$var2);?>');">
	
<?php	
if (AutomarketForreg::$status_announcement==2){
	AutomarketSendTopic::detect_parameters_for_redact($MSQLc);
	?><input name="submit" value="redactautomarketannouncement" type="hidden"><?php }
else {
	?><input name="submit" value="sendnewautomarketannouncement" type="hidden"><?php } ?>	
	


<table cellpadding="0" cellspacing="0" class="automarket3_7">
<tr>
<td align="left" valign="top" class="big_text" width="400">
	<div class="padding_right_10">
		<?php 
		if (GeneralGetVars::$var2==1){
			include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_redact_auto.php");}
		else if (GeneralGetVars::$var2==2)	{
			include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_redact_else.php");}
		else if (GeneralGetVars::$var2==3)	{
			include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_redact_else_buy.php");}			
			
			
			
			
			
			
			
			?>

	</div>
	<div class="v_i_b"></div>
	<div class="v_i_b"></div>
	<div class="padding_left_10"><input value=" " class="submit_send" type="submit"></div>
	<?php GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>
	<div class="v_i_b"></div>
</td>
<td align="left" width="200" valign="top" class="padding_left_10">
<?php include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_redact_photo.php"); ?>
</td>
</tr>
</table>



</form>




<?php
/*
AutomarketBase::$condition_added1=" themepage='".GeneralGetVars::$var2."' ";//условия выборки дополительных объявлений
if (GeneralGetVars::$var2==1) {
	AutomarketBase::$condition_added1.=" AND mark='".AutomarketBase::$mark."' ";
	if ((AutomarketBase::$model)&&(AutomarketBase::$mark==157)) {
		if ((AutomarketBase::$model=="2105")||(AutomarketBase::$model=="2105i")) {AutomarketBase::$condition_added1.="and (model='2105' OR model='2105i')";}
		else if ((AutomarketBase::$model=="2107")||(AutomarketBase::$model=="2107i")||(AutomarketBase::$model=="21074")||(AutomarketBase::$model=="21074i")) {AutomarketBase::$condition_added1.="and (model='2107' OR model='2107i' OR model='21074' OR model='21074i')";}
		else if ((AutomarketBase::$model=="2108")||(AutomarketBase::$model=="2108i")||(AutomarketBase::$model=="21083")||(AutomarketBase::$model=="21083i")) {AutomarketBase::$condition_added1.="and (model='2108' OR model='2108i' OR model='21083' OR model='21083i')";}	
		else if ((AutomarketBase::$model=="2109")||(AutomarketBase::$model=="2109i")||(AutomarketBase::$model=="21093")||(AutomarketBase::$model=="21093i")) {AutomarketBase::$condition_added1.="and (model='2109' OR model='2109i' OR model='21093' OR model='21093i')";}
		else if ((AutomarketBase::$model=="21099")||(AutomarketBase::$model=="21099i")) {AutomarketBase::$condition_added1.="and (model='21099' OR model='21099i')";}	
		else if ((AutomarketBase::$model=="21010")||(AutomarketBase::$model=="21010i")) {AutomarketBase::$condition_added1.="and (model='21010' OR model='21010i')";}	
		else if ((AutomarketBase::$model=="2114")||(AutomarketBase::$model=="21140")) {AutomarketBase::$condition_added1.="and (model='2114' OR model='21140')";}	
		else if ((AutomarketBase::$model=="priora")||(AutomarketBase::$model=="PRIORA")||(AutomarketBase::$model=="Priora")||(AutomarketBase::$model=="Приора")||(AutomarketBase::$model=="приора")||(AutomarketBase::$model=="ПРИОРА")) 		{AutomarketBase::$condition_added1.="and (model='priora' OR model='PRIORA' OR model='Priora' OR model='Приора' OR model='приора' OR model='ПРИОРА')";}
		else if ((AutomarketBase::$model=="калина")||(AutomarketBase::$model=="Калина")||(AutomarketBase::$model=="КАЛИНА")||(AutomarketBase::$model=="Kalina")||(AutomarketBase::$model=="kalina")||(AutomarketBase::$model=="KALINA")) 		{AutomarketBase::$condition_added1.="and (model='калина' OR model='Калина' OR model='КАЛИНА' OR model='Kalina' OR model='kalina' OR model='KALINA')";}
		//else {AutomarketBase::$condition_added1.="and model='".AutomarketBase::$model."'";}
		}}
AutomarketBase::$condition_added2=" themepage='".GeneralGetVars::$var2."' ";//условия выборки дополительных объявлений

include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_added_announcements.php");*/
}
else{

echo("<div class=\"v_i_b\"></div><span class=\"padding_left_10 big_text\">Уважаемый пользователь, вам необходимо зарегистрироваться</span>");}
?>




