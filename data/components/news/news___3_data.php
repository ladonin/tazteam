<div class="huge_text_blue"><?php echo($row['name']);?></div>
<div class="v_i_b"></div>
<span class="explanation">Дата размещения: </span><span class="big_text" id="news_date_new"></span>
<script type="text/javascript">general___date_DMY_show(<?php echo($row['date_create']);?>,'news_date_new');</script>
<div class="v_i_b"></div>
<?php if (NewsBase::$img1){	?>
	<div style="float:left; margin:0px 20px 10px 0px"><img src="http://140706.selcdn.com/tazteam/_files/images/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row['id']);?>/<?php echo(NewsBase::$img1);?>" width="500" class="refimage news3_3" <?php /*onclick="swimwin('gallery','news'); news_img_to_gallery(); "*/?>></div>
<?php } ?>
<span class="p_big_text_h1"><?php
echo($row['contenthtml']);
?></span>


