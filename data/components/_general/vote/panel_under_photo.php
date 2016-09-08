<?php
GeneralVote::detect_vote();
//если я зарегистррован
if (UsersMyData::$identified==1){
?>
<script type="text/javascript">
vote_polar=<?php echo(GeneralVote::$vote_polar);?>;
vote_rank=<?php echo(GeneralVote::$rank);?>;
</script>


<table cellpadding="0" cellspacing="0">
<tr>
<td align="left">
<div id="vote_finger_div" <?php
	if (GeneralVote::$me_already_voted==0){//если я еще не голосовал
		?>class="vote_plus"<?php
		GeneralImagesPreload::input("images/_general/vote_plus.png");}
	else{
	?>class="vote_minus"<?php
	GeneralImagesPreload::input("images/_general/vote_minus.png");} ?>
	onclick="general___vote_ajax('<?php echo(GeneralVote::$abrev_page);?>','<?php echo(GeneralVote::$getvar1);?>','<?php echo(GeneralVote::$getvar2);?>','<?php echo(GeneralVote::$getvar3);?>','<?php echo(GeneralVote::$getvar4);?>','<?php echo(GeneralVote::$num_page);?>','<?php echo(GeneralVote::$id_photo);?>');"></div>
</td>
<td align="right" valign="middle" class="padding_left_10">
	<?php GeneralPageBasic::set_code_page(GeneralVote::$abrev_page,GeneralVote::$getvar1,GeneralVote::$getvar2,GeneralVote::$getvar3,GeneralVote::$getvar4,GeneralVote::$num_page,GeneralVote::$id_photo); ?>
	<a href="<?php echo(GeneralGlobalVars::url);?>/vote/<?php echo(GeneralPageBasic::$text_code_page);?>=1" class="link_lead_small " id="vote_rank"><?php echo(GeneralVote::$rank); ?></a>
</td>
</tr>
</table>
<?php }

//если пользователь не зарегистрирован
else if (UsersMyData::$identified==0){ ?>
<table cellpadding="0" cellspacing="0">
<tr>
<td align="left">
	<div class="vote_finger"></div>
</td>
<td align="right" valign="middle" class="padding_left_10">
	<?php GeneralPageBasic::set_code_page(GeneralVote::$abrev_page,GeneralVote::$getvar1,GeneralVote::$getvar2,GeneralVote::$getvar3,GeneralVote::$getvar4,GeneralVote::$num_page,GeneralVote::$id_photo); ?>
	<a href="<?php echo(GeneralGlobalVars::url);?>/vote/<?php echo(GeneralPageBasic::$text_code_page);?>=1" class="link_topic"><?php echo(GeneralVote::$rank); ?></a>
</td>
</tr>
</table>
<?php }






?>