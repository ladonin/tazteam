<div class="redact_photo_in_album_1_1">


<span class="small_link">редактировать</span>
</div>
<?php

/*
редактировать это фото
(текст, который делает втдимым дополнительное поле редактирования)

удалить это фото
(submit в виде текста, со ссылкой текущей + delete в конце, потом после удаления возврат на следующую фотку)

загрузить новое фото
(большая картинка ,при клике на которую делается видимым поле загрузки нового фото)
*/

GeneralPagesCounter::calculate_to_outer($MSQLc, GeneralGetVars::$var1."___topics_".GeneralGetVars::$var2,"id_topic>='".GeneralGetVars::$var3."'",0,0,0,0);
?>
<table cellpadding="0" cellspacing="0" class="panel_topics_1">
<tr>
<td align="left" class="panel_topics_2">
	<a href="<?php echo(GeneralGlobalVars::url);?>/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2);?>=<?php echo(GeneralPagesCounter::$N_cur_to_outer);?>" class="huge_link"><?php echo(GeneralPagetree::$name2);?></a>
</td>
<td align="right" class="panel_topics_3" valign="bottom">
	<?php include("data/components/_general/find/findlight.php"); ?>
</td>
</tr>
</table>