<table cellpadding="0" cellspacing="0" class="ind_6">
<tr>
<td class="ind_7">
	<div class="ind_18">
		<span class="big_text_h1"><?php echo(UsersMyData::$name);?></span>
	</div>
</td>
<td class="ind_9" valign="top">
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
	<input name="submit" value="quit" type="hidden">		
	<input name="UsersMyDataQuit" value="1" type="hidden">			
	<input value=" " class="submit_quit" type="submit">	
	</form>
	<?php GeneralImagesPreload::input("images/_general/general___quit_submit_hover.png"); ?>
</td>
</tr>
</table>



<div class="ind_10" onclick="javascript:location.href='<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id);?>'">
	<a href="<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id);?>" class="ind_13">Моя страница</a>
</div>
<div style="clear:both"></div>
<div style="clear:both"></div>	
<div class="ind_10" onclick="javascript:location.href='<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id."/dialogs=1");?>'">
	<a href="<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id."/dialogs=1");?>" class="ind_13">Диалоги</a>
	<span id="signaturing_dialogs"></span>
</div>	
<div style="clear:both"></div>		
<div class="ind_10" onclick="javascript:location.href='<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id);?>/friends=1'">
	<a href="<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id);?>/friends=1" class="ind_13">Друзья</a>
	<span id="signaturing_friends"></span>
</div>
<div style="clear:both"></div>


<div class="ind_10" onclick="javascript:location.href='<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id);?>/friends=1'">
	<a href="<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id);?>/friends=1" class="ind_13">Обсуждения</a>
	<span id="signaturing_talking"></span>
</div>
<div style="clear:both"></div>


<div class="ind_10" onclick="<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id);?>/friends=1'">
	<a href="<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id);?>/friends=1" class="ind_13">Форум</a>
	<span id="signaturing_forum"></span>
</div>
<div style="clear:both"></div>





<div class="v_i_b"></div>
<div class="ind_16" onclick="javascript:location.href='<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id);?>/friends=1'">
	<a href="<?php echo(GeneralGlobalVars::url."/users/".UsersMyData::$id);?>/friends=1" class="big_link_head">Друзья online</a>
	<span class="ind_17">1</span>
</div>	
<div style="clear:both"></div>
<div class="v_i_b"></div>
<div class="ind_16" onclick="javascript:location.href='<?php echo(GeneralGlobalVars::url);?>'">
	<a href="<?php echo(GeneralGlobalVars::url);?>" class="big_link_head">Гости</a>
	<span class="ind_17">56765</span>
</div>	
<div style="clear:both"></div>
<div class="v_i_b"></div>







<?php /*
<script type="text/javascript">
	$(document).ready(function(){
		users___signatures_detect_ajax('<?php echo(GeneralGetVars::$var1);?>','<?php echo(GeneralGetVars::$var2);?>','<?php echo(GeneralGetVars::$var3);?>','<?php echo(GeneralGetVars::$var4);?>','<?php echo(GeneralGetVars::$num_page);?>');});
</script>
*/?>




