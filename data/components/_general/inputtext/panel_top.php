        <div class="tabbable"> <!-- Only required for left/right tabs -->
        <ul class="nav nav-tabs">
        <li class="active"><a href="#inputtext_tab3<?php echo($chat_var);?>" data-toggle="tab">Редактор</a></li>
        <li><a href="#inputtext_tab1<?php echo($chat_var);?>" data-toggle="tab">Мемы</a></li>
        <li><a href="#inputtext_tab2<?php echo($chat_var);?>" data-toggle="tab">Смайлы</a></li>
    	<?php if ((GeneralInputText::$type_panels=="maximum")&&(!1)) { ?>
    	<li><a href="#inputtext_tab4<?php echo($chat_var);?>" data-toggle="tab">Таблица</a></li>
    	<?php } ?>

        <li><a href="#inputtext_tab5<?php echo($chat_var);?>" data-toggle="tab">Еще</a></li>

        </ul>


        <div class="tab-content">
        <div class="tab-pane active" id="inputtext_tab3<?php echo($chat_var);?>">
        <div class="q_content_inputtext"><?php require("data/components/_general/inputtext/redactor.php"); ?>
        </div> </div>
        <div class="tab-pane" id="inputtext_tab1<?php echo($chat_var);?>">
        <div class="q_content_inputtext"><?php require("data/components/_general/inputtext/ifaces.php"); ?>
        </div> </div>
        <div class="tab-pane" id="inputtext_tab2<?php echo($chat_var);?>">
        <div class="q_content_inputtext"><?php require("data/components/_general/inputtext/smiles.php"); ?>
        </div> </div>
        <?php if ((GeneralInputText::$type_panels=="maximum")&&(!1)) { ?>
		<div class="tab-pane" id="inputtext_tab4<?php echo($chat_var);?>">
        <div class="q_content_inputtext"><?php include("data/components/_general/inputtext/tables.php"); ?>
        </div> </div>
        <?php } ?>
        <div class="tab-pane" id="inputtext_tab5<?php echo($chat_var);?>">
        <div class="q_content_inputtext">





<img src="<?php echo(GeneralGlobalVars::url);?>/images/_general/general___inputtext_quote_img_main.gif"
  onclick="general___inputtextincludetag('inputtexttextarea<?php echo(GeneralInputText::$id);?>', 'quote','text');" title="цитата"
  width="20" height="20">


<img src="<?php echo(GeneralGlobalVars::url);?>/images/_general/general___inputtext_video_img_main.gif"
  onclick="general___inputtextincludetag('inputtexttextarea<?php echo(GeneralInputText::$id);?>', 'video','text');" title="видео"
  width="20" height="20">



<img src="<?php echo(GeneralGlobalVars::url);?>/images/_general/general___inputtext_url_img_main.gif"
  onclick="general___inputtextincludetag('inputtexttextarea<?php echo(GeneralInputText::$id);?>', 'link','text');" title="ссылка"
  width="20" height="20">








	        <?php
            if ((GeneralGetVars::$var1==="news")||(GeneralGetVars::$var1==="articles")) {?>
<img src="<?php echo(GeneralGlobalVars::url);?>/images/_general/general___inputtext_url_img_main.gif"
  onclick="general___inputtextincludetag('inputtexttextarea<?php echo(GeneralInputText::$id);?>', 'url','text');" title="ссылка"
  width="20" height="20">
  <?php } ?></div>


        </div>
        </div>

</div>


<?php $chat_var=""; ?>
