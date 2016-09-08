 	<?php
	if (UsersMyData::$identified==1) {//для зарегистрированных пользователей
    ?>
               <!-- new_topic_forum automarket -->
            <div id="new_topic_forum" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="new_topic_forumLabel" aria-hidden="true" style="width:689px; max-height: 700px; margin-left:-345px; top: 5%;">
            
    <?php    
    
		GeneralInputText::$id="submit_1";
		?><form method="post" 
		action="http://instorage.org/portfolio/tazteam/submit.php?get_var1=forum" 
		enctype="multipart/form-data" 
		onsubmit="return general___send_topic_forum('inputtexttextarea<?php echo(GeneralInputText::$id);?>','inputtexthtml<?php echo(GeneralInputText::$id);?>','inputtextnacked<?php echo(GeneralInputText::$id);?>','ForumCitateId<?php echo(GeneralInputText::$id);?>','inputnametopictextarea<?php echo(GeneralInputText::$id);?>');">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="new_topic_forumLabel">Новая тема</h3>
                </div>
                <div class="modal-body" style="max-height: 700px;">







		<div class="link_lead">	Выберите рубрику:</div>
	    <div class="v_i_b"></div>

        
        

		<select name="forum_section_id" style="width:300px; border:1px solid #bbbbbb;">
			<option value="1">Тюнинг ДВС</option>
			<option value="2">Диагностика и Чип-Тюнинг</option>
			<option value="3">Внешний тюнинг</option>
			<option value="4">Автополомки</option>
			<option value="5" selected="">Прочие вопросы</option>
		</select>

        <div class="v_i_b"></div>








		<input name="submit" value="sendforumtopic" type="hidden"><?php
		include("data/components/forum/new_topic.php");?>
		<div class="v_i_b"></div>
		<?php
		$current_var4="Приложить сообщение";
        $chat_var="forum";
		include("data/components/forum/new_message.php");
		?>







	
                </div>
 
                
               </form>
            </div> 






      
        <?php	}
	?>












  


        
        

    
    
    