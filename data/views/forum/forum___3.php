<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>   <?php include("data/components/_general/breadcrumbs.php"); ?>
<?php 
GeneralPageBasic::increment_view($MSQLc,"forum___topics_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'",0,0,0,0);//плюс просмотр
//include("data/components/_general/panels/panel_in_topic.php");
GeneralPagesCounter::calculate_to_outer($MSQLc, GeneralGetVars::$var1."___topics_".GeneralGetVars::$var2,"id_topic>='".GeneralGetVars::$var3."'",0,0,0,0);
GeneralPagesCounter::calculate($MSQLc, "forum___messages_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'",0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3);//вычисляем данные о страницах темы и создаем навигацию по всем её страницам
GeneralPagesCounter::imagespreload();
GeneralInputText::$id="submit_1";
?>

<script type="text/javascript">
	signaturing_page="fm";//для очистки оповещений с этого диалога
</script>




<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left" width="1%" class="padding_right_10">
<a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2);?>=<?php echo(GeneralPagesCounter::$N_cur_to_outer);?>" class="btn btn-primary btn-small" title="наверх">▲</a>
</td>
<td align="left" width="1%" class="padding_right_10">
	<?php
	if (UsersMyData::$identified==1) {//для зарегистрированных пользователей ?>
	<input value="Ответить" class="btn btn-success btn-small" type="button" onclick="javascript:location.href='#message<?php echo(GeneralInputText::$id);?>'; general___inputtextfocus('inputtexttextarea<?php echo(GeneralInputText::$id);?>');">
	<?php GeneralImagesPreload::input("images/_general/general___ask_submit_hover.png"); 
	}
	else { ?>
	<input value="Ответить" class="btn btn-success btn-small disabled" type="button">
	<?php }
	?>
</td>
<td align="right" width="98%"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>

<div class="v_i_b"></div>


<span class="lead"><?php echo(GeneralPagetree::$name3);?></span>
<div class="v_i_b"></div>







<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_1.php");
ForumBase::detect_startnumbermessage();//определяем начальный отсчет номера сообщения
if (UsersMyData::$identified==1) {//для зарегистрированных пользователей
	ForumForreg::detect_status_for_redactmessage_panel($MSQLc);}//возвращаем статус для панели редактирования сообщения - нужно показывать или нет
$current_var1=ForumBase::$startnumbermessage;
while ($row=GeneralMYSQL::fetch_array($res)) {
$current_var1++;
ForumBase::$id_autor_topic=$row['autor_topic'];//автор темы
$current_var2=UsersMyData::return_name($row['m_a_login_user'],$row['m_a_mail_user'],$row['m_a_name_user'],$row['m_a_surname_user'],$row['m_a_login_status']);
//ForumBase::update_array_messages_citates_images($current_var1,$row['id_message_to_citate'],$row['images_message']);//кладем в массив о сообщениях для текущего сообщения параметры "цитата" и "фото"
UsersBase::$cur_user_online=UsersBase::return_online($row['m_a_timecoming']);
?>

<div class="well">

<table cellpadding="0" cellspacing="0" width="100%" style="border-bottom:1px solid #bbbbbb;">
<tr>
<td align="left" width="200" valign="top" style="padding-bottom:5px;" class="grey link-carcas">
	<div id="forum_3_<?php echo($row['id_message']);?>"></div>
	<script type="text/javascript">general___date_DMYvHM_show(<?php echo($row['date_message']);?>,'forum_3_<?php echo($row['id_message']);?>');</script>


</td>
<td align="right" valign="middle" style="padding-bottom:5px;">
	<?php 
	if (UsersMyData::$identified==1) {
	ForumForreg::set_array_messages_number_id($current_var1,$row['id_message']); //заполняем массив с данными id - number
	include("data/components/forum/forum___3_redact_citate_panel.php"); } ?>
</td>




<td align="right" valign="middle" width="1" class="warp_normal" style="padding-bottom:5px;">


<span class="badge badge-info"><a name="message<?php echo($row['id_message']);?>" style="color:#ffffff; text-decoration:none;"><?php echo($current_var1);?></a></span>

</td>
</tr>
</table>

<div class="v_i_b"></div>

<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left" valign="top" width="250">
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left" width="85" valign="top">
		<div class="padding_right_10">
		<a href="http://instorage.org/portfolio/tazteam/users/<?php echo($row['id_autor_message']);?>" class="refimage"><img src="<?php echo(UsersBase::return_url_photo($row['m_a_photo'],$row['m_a_dir_user']."/".$row['id_autor_message']."_2.".$row['m_a_photo_format'],$row['m_a_photo_url_from_small'],$row['m_a_photo_url_from_huge']));?>" width="75" height="75" class="refimage" style="border-right:3px solid <?php if (UsersBase::$cur_user_online){?>#f09007<?php } else { ?>#e0e0e0<?php } ?>"></a>
		</div>
	</td>
	<td align="left" valign="top">
		<div style="width:165px;">
		<a href="http://instorage.org/portfolio/tazteam/users/<?php echo($row['id_autor_message']);?>" class="link_lead_small black"><?php echo($current_var2);?></a>
		</div>
		
		<div class="link-carcas"><?php echo(ForumBase::detect_status_user_by_messages($row['m_a_count_messages'],$row['id_autor_message']));?></div>
		<?php if (UsersBase::$cur_user_online){?>
			
		<div class="link-carcas">Online</div>
		<?php } ?>
	
		<div class="grey">сообщений: <?php echo($row['m_a_count_messages']);?></div>
	</td>
	</tr>
	</table>	
	
</td>
<td align="left" valign="top">

<div class="padding_right_10">
	<?php $current_var3=$row['images_citate']; $current_var4=$row['imagessizes_citate']; include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_citate_in_message.php"); ?>
	<div class="content_dark"><?php echo($row['text_message']);?></div>
	<?php $current_var3=$row['images_message']; $current_var4=$row['imagessizes_message']; include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_photo_in_message.php"); ?>
</div>
</td>
</tr>
</table>
</div>
<div class="v_i_b"></div>

<?php 
} GeneralMYSQL::free($res);
UsersBase::set_points($MSQLc,ForumBase::$id_autor_topic);//начисляем автору баллы



if (GeneralPagesCounter::$N_max>1){ ?>

	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left">
		<?php echo(GeneralPagesCounter::$htmlarrows); ?>
	</td>
	<td align="right" valign="middle">
		<?php echo(GeneralPagesCounter::$htmlcode); ?>
	</td>
	</tr>
	</table>

<div class="v_i_b"></div>
<div class="v_i_b"></div>
<?php }
GeneralPagesCounter::clearvars(); 



if (UsersMyData::$identified==1) {//для зарегистрированных пользователей






	if (GeneralGetVars::$redact_message>0){//если редактируем сообщение
		ForumForreg::detect_to_redact_basic($MSQLc);}		
       ?>
<div class="well">
<?php	if (ForumForreg::$statussend==2){
	   

       
       
		include("data/components/forum/redact_message.php");//если мы зарегистррованы, подали заявку на редактирование и это наше сообщение
        
 }
        
                                        
	else {
		$current_var4="Написать сообщение";//т.к. компонент универсальный, то выводим сюда его уникальные части
		?><form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" enctype="multipart/form-data" onsubmit="return general___send_message('inputtexttextarea<?php echo(GeneralInputText::$id);?>','inputtexthtml<?php echo(GeneralInputText::$id);?>','inputtextnacked<?php echo(GeneralInputText::$id);?>','ForumCitateId<?php echo(GeneralInputText::$id);?>',1);">
		<input name="submit" value="sendforummess" type="hidden"><?php
		include("data/components/forum/new_message.php");
		?></form><?php }

?>
            </div>
            <?php






	if (GeneralSecurity::detect_autority(ForumBase::$id_autor_topic)==true){
		if (ForumForreg::detect_availability_to_delete_topic(GeneralGetVars::$var3,$MSQLc)==true){
			?><div class="v_i_b"></div>
			<form method="post" 
			action="<?php echo(GeneralGetVars::$urltosubmit);?>" 
			enctype="multipart/form-data"
			onsubmit="return general___swim_prompt('Чтобы удалить тему, введите слово: delete','delete');">
			<input name="id_topic" value="<?php echo(GeneralGetVars::$var3);?>" type="hidden">
			<input name="submit" value="deleteforumtopic" type="hidden">
			<input value="удалить тему" class="btn btn-inverse btn-small" type="submit">	
			<?php // GeneralImagesPreload::input("images/_general/general___delete_topic_submit_text_grey_9_hover.png"); ?>
			</form><div class="v_i_b"></div><?php }}
            }
?>
</div>