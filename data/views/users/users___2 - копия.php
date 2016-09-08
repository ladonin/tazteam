<div class="padding_left_10 padding_right_20 content_dark"><?php 
UsersBase::set_points($MSQLc,GeneralGetVars::$var2);//начисляем ему баллы	
if (UsersMyData::$identified==1){
	UsersBase::set_keyedarray_my_friendship_and_heto($MSQLc);}//теперь я знаю всех своих друзей и тех, к кому я уже подавал заявку
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_query_1.php");
$row=GeneralMYSQL::fetch_array($res);
GeneralMYSQL::free($res);
UsersBase::set_array_self_data($row);
UsersBase::detect_friends_from_text($row['friendship']);
UsersBase::detect_photoalbums($MSQLc,0,0);//0 - берем все альбомы
UsersBase::detect_garage($MSQLc);//определяем автомобили в своем гараже
?>
	
<table cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" width="303">
	<img src="<?php echo(UsersBase::return_url_photo($row['gen_photo'],$row['dir_user']."/".$row['id_user']."_3.".$row['site_photo_format'],$row['sn_photo_url_from_big'],$row['sn_photo_url_from_huge']));?>" width="303" id="users_img_photo_big" class="refimage users3_3" <?php /*onclick="swimwin('gallery','users'); users_img_to_gallery(); "*/?>>

	<div class="v_i_b"></div>
	<?php
	if (UsersMyData::$identified==1){
	
		if (GeneralGetVars::$var2==UsersMyData::$id){//если мы на своей странице
		if($row['site_mail_user']){
		?>
	<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(GeneralGetVars::$var2."/redactpassword");?>" class="link_normal" alt="Изменить пароль">Изменить пароль</a>
	<div class="v_i_b"></div>
	<?php } ?>
		<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(UsersMyData::$id."/redactavatar");?>" class="link_normal" alt="Изменить фотографию">Изменить фотографию</a>
		<div class="v_i_b"></div>


		<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(UsersMyData::$id."/mythemes");?>" class="link_normal" alt="Мои темы">Мои темы</a>
		<div class="v_i_b"></div>


		<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(UsersMyData::$id."/mytalks");?>" class="link_normal" alt="Мои обсуждения">Мои обсуждения</a>
		<div class="v_i_b"></div>

		<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(UsersMyData::$id."/signatures");?>" class="link_normal" alt="Мои обсуждения">Оповещения</a>
		<div class="v_i_b"></div>
		
		
		<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(UsersMyData::$id."/dialogs=1");?>" class="link_normal" alt="Мои диалоги">Диалоги</a>
		<div class="v_i_b"></div>		
		
		
		
		
	<div class="grey_line_1"></div>	
	
	<div class="v_i_b"></div>	

		
	
		<?php }
		else {//если мы просто - зарегистрированный пользователь	
		?>

		<?php } ?>
		
	
		
		<?php } ?>
        
        
        
        
    <?php
    	if (UsersBase::detect_its_mypage(2)==false){//если мы не на своей странице 
		if (UsersMyData::$identified==1){
		?>

				<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(GeneralGetVars::$var2);?>/dialogs" class="small_link_noline">
					<?php echo(UsersBase::$array_buttons_to_userslists[1]);?>
				</a>

		<?php
		if ((!isset(UsersForreg::$array_my_friends[GeneralGetVars::$var2]))&&(!isset(UsersForreg::$array_my_friends_heto[GeneralGetVars::$var2]))){?>
		<div class="v_i_b"></div>
			<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
			<input type="hidden" name="submit" value="userstofriends">
			<input type="hidden" name="who" value="<?php echo($row['id_user']);?>">		
			<input type="submit" value="добавить в друзья">
			</form><?php //GeneralImagesPreload::input("images/users/lists/images/users/lists/users___submit_to_friends_text_11_hover.png");?>
				
		<?php }	?>

		<div class="v_i_b"></div>		<div class="grey_line_1"></div>	<div class="v_i_b"></div>
		<?php }}
    
    
    ?>        
        
        
        
        
        
        
        
        
        
        
        
        		
	<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(GeneralGetVars::$var2."/photoalbums=1");?>" class="link_normal" alt="Фотоальбомы">Фотоальбомы</a>
	<div class="v_i_b"></div>	
	<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(GeneralGetVars::$var2."/friends=1");?>" class="link_normal" alt="друзья">Друзья</a>
	<div class="v_i_b"></div>
    
    
    
    

    
    
    	<div class="v_i_b"></div>

    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
</td>
<td align="left" valign="top" width="585">
<div class="padding_left_20">
	<?php
	UsersBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос перезапишется в этой функции
	GeneralPagesCounter::$find_query=UsersBase::$find_query;	
	GeneralPagesCounter::$rowspage_name="rowspageusers1";//копия такой страницы - по присваиванию номеров страниц
	GeneralPagesCounter::calculate_to_outer($MSQLc, "registrated_users___main_data","id_user>='".GeneralGetVars::$var2."'",0,0,0,0);
	?>
	<a href="<?php echo(GeneralGlobalVars::url);?>/users=<?php echo(GeneralPagesCounter::$N_cur_to_outer);?>" class="link_normal">наверх</a>
	<div class="v_i_b"></div>	
	<div class="panel_text_dark blue"><?php echo(UsersMyData::return_name($row['gen_login_user'],$row['site_mail_user'],$row['gen_name_user'],$row['gen_surname_user'],0));?></div>
	<div class="v_i_s"></div>
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left" width="32%">
		<b style="color:#f07007;"><?php echo($row['site_points']);?></b>
	</td>
	<td align="right" width="68%">
		<?php
		UsersBase::$cur_user_online=UsersBase::return_online($row['gen_timecoming']);
		if (UsersBase::$cur_user_online){ ?><b style="text-decoration:underline; color:#f07007;">Online</b><?php }
		else if ((1)||(UsersMyData::$id==1)){ ?>Последнее посещение <span id="timecomming"></span>
			<script type="text/javascript">general___date_DMYvHM_show(<?php echo($row['gen_timecoming']);?>,'timecomming');</script>
			<?php } //$row['gen_timecoming']>(time()-(3600*24*10))?>		
		
	</td>
	</tr>
	</table>
	<div class="v_i_b"></div>
    
    
    
    <?php if (UsersBase::$garage_enable==1) { ?>
    
    Ездит на:
    	<div class="v_i_b"></div>
        
        
        
<?php foreach(UsersBase::$garage_array as $value){ ?>
    
      
        
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left" width="130" valign="top">
    
<a href="<?php echo(GeneralGlobalVars::url);?>/garage/<?php echo($value['themepage']);?>/<?php echo($value['id']);?>" 
class="link_normal" alt="<?php 
echo(GarageBase::return_parameters("mark", $value['mark'])." ".$value['model']);
?>"><img src="http://140706.selcdn.ru/tazteam/images/garage/<?php echo($value['id']);?>/<?php echo($value['img']);?>" width="130">
</a>

	</td>
	<td align="left" class="padding_left_10" valign="top">







    
    
<a href="<?php echo(GeneralGlobalVars::url);?>/garage/<?php echo($value['themepage']);?>/<?php echo($value['id']);?>" 
class="link_normal" alt="<?php 
echo(GarageBase::return_parameters("mark", $value['mark'])." ".$value['model']);
?>"><?php 
echo(GarageBase::return_parameters("mark", $value['mark'])." ".$value['model']);
?>
</a>    
    
  
    	<div class="v_i_b"></div>
<?php 
if ($value['motor_type']){
echo(GarageBase::return_parameters("motor_type", $value['motor_type']));
?>
<div class="v_i_b"></div>
<?php
}
?>

    	
<?php 

if ($value['power']){


echo($value['power']." л.с.");
?>
<div class="v_i_b"></div>
<?php

}
?>
    
    
    
    




	</td>
    
    
    
    
    
    
    
    
	</tr>
	</table>
    	<div class="v_i_b"></div>
<?php } ?>     
    
    
    
	<div class="v_i_b"></div>    
    <?php } ?>
    
    
    
    
    
    
    
    			

	<?php

		if (UsersBase::detect_its_mypage(2)==true){//если мы на своей странице
			include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_top_buttons_to_accounts_sn.php"); }
				
				
		if (UsersBase::detect_its_mypage(1)==true){//если мы имеем полный доступ к этой странице независимо от того, кто мы
			if (UsersBase::$flag_self_data_enable==1){//есть данные
			?>
			<div id="swim_self_data"><?php include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_self_data.php"); ?></div>
			<div id="swim_form_self_data" class="swim_panel"><?php include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_form_self_data.php");  ?></div>
			<?php	}
			else {//нет данных
				?>
				<div id="swim_form_self_data" class="swim_panel"></div><div id="swim_self_data"></div>
				<?php include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_form_self_data.php");  ?>			
				<?php	}}
		else {
			if (UsersBase::$flag_self_data_enable==1){//есть данные
				include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_self_data.php");}}
		
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_friends.php");
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_photoalbums.php");
		?>
		
 	<div class="v_i_b"></div>		
	<?php
	GeneralDialogWindows::$getvar1=GeneralGetVars::$var1;	
	GeneralDialogWindows::$getvar2=GeneralGetVars::$var2;	
	GeneralDialogWindows::$getvar3=GeneralGetVars::$var3;	
	GeneralDialogWindows::$getvar4=GeneralGetVars::$var4;	
	GeneralDialogWindows::$num_page=GeneralGetVars::$num_page;
	GeneralDialogWindows::$signaturing="sw";
	GeneralDialogWindows::$idphoto=0;
	GeneralDialogWindows::$type=1;//2 -  открывающийся чат
	GeneralDialogWindows::$padding_right=0;
	GeneralDialogWindows::$id_dialog="users_wall_1";//3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
	GeneralDialogWindows::$database="registrated_users___wall";//база данных диалога
	GeneralDialogWindows::$textforpanel="Оставить запись";
	GeneralDialogWindows::$namedialog="Стена";
	GeneralDialogWindows::$condition1="user=".GeneralGetVars::$var2;//условие 1 для базы данных
	GeneralDialogWindows::$valuesnumber=5;//сколько value делаем	
	
	
	GeneralDialogWindows::$idmessage=2;//где будет номер сообщения
	GeneralDialogWindows::$autor=3;//какую value делаем автором при вставке
	GeneralDialogWindows::$textvalue=5;//где будет текст
	GeneralDialogWindows::$time=4;//какую value делаем временем создания сообщения	при вставке
	GeneralDialogWindows::$value1=GeneralGetVars::$var2;//значение для вставки
	GeneralDialogWindows::$value2="";//значение для вставки
	GeneralDialogWindows::$value3="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value4="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value5="";//значение для вставки - потом вставим
	include("data/components/_general/dialog_windows/dialog_windows_1.php");//сам диалог
	?>
	<script type="text/javascript">
		$('#div_dialog_1_var_width').width('100%');
		$('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
		$('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
	</script>   
    
   </div> 			

</td>
</tr>
</table>







<div class="v_i_b"></div>
<div class="v_i_b"></div>










<?php
include("data/components/".GeneralGetVars::$var1."/panels/".GeneralGetVars::$var1."___2_panel_right.php");
?>










	
		
		


