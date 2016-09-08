<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">
	<a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2);?>" class="btn btn-primary btn-small">к&nbsp;странице&nbsp;пользователя</a>
</td>	
</tr>
</table>

	<div class="v_i_b"></div>
<div class="lead">Оповещения</div>	

	
	
	
	
	

	
	
	
	
	
	
<?php 
if (UsersBase::detect_its_mypage(2)==true){//определяем - наша страница или нет
	//UsersMyData::$id=1;
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_signatures_query_1.php");
	$row=GeneralMYSQL::fetch_array($res);
	
	?>

	

	
	

	
	<?php 
	
	$row['signatures']=trim($row['signatures']);
	
	
	
	
	if ($row['signatures']){
	?>
	
	

<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
	<input type="submit" value="очистить" class="btn btn-warning btn-small">
	<input type="hidden" name="submit" value="users_signatures_clear">
</form>
<?php	GeneralImagesPreload::input("images/_general/submit_clear_hover.png");	?>

<div class="v_i_b"></div>
<div class="v_i_b"></div>	
	
	
	<?php
	UsersForreg::$array_my_signatures=explode("  ",$row['signatures']);
	asort(UsersForreg::$array_my_signatures);//сортируем по первым буквам
	
	
	
	
	
	
	
	
	
	$cv1=0;//для заголовка для форума
	$cv2=0;//для заголовка для остальных сервисов	
	foreach(UsersForreg::$array_my_signatures as $value){//только для форума
		GeneralPageBasic::uncode_page($value);
		

//	новости ne 1000000
//	советы от тазтим ar 1000000
//	объявления am 10000 1000000
//	форум3 fm 10000 1000000
//	галерея ga 10000 1000000 10000
//	видео vi  10000 1000000
//	личные сообщения sm 10000000000 10000000000
//	форум2 ft 10000
//	сообщения под личными фотоальбомами sf 10000000000 10000 1000000
//	моя стена sw 10000000000 - у кого на стене
//  чат на главной станице mc - без кода
//  магазин sh - без кода		
		if (GeneralPageBasic::$code_sign=="fm") {
		GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_forum3($MSQLc,GeneralPageBasic::$code_section,GeneralPageBasic::$code_topic);
		
		if(GeneralPageBasic::$current_name_topic) {
		
		if ($cv1==0){//если только первый раз покуазываем форум, то отобразим заголовок сервиса
		?><b class="link_lead">Форум:</b><div class="v_i_b"></div><?php
		}
		?>		
		<a href="http://instorage.org/portfolio/tazteam/forum/<?php echo(GeneralPageBasic::$code_section);?>/<?php echo(GeneralPageBasic::$code_topic);?>=1" class="link_lead_topic"><?php echo(GeneralPageBasic::$current_name_topic);?></a>
		<div class="v_i_b"></div>	
		<?php $cv1=1; //только для форума, потом для всех - главное, чтобы показывала, что оповещения есть
		}}
		else {
			$cv2=1;}//другие оповещения, кроме форума, тоже есть
		
		
		
		}
	

	
	
	if ($cv1==1){//если в форуме есть оповещения
	?>
	<div class="v_i_b"></div>
	<?php
	}
	
	
	if ($cv2==1){//если другие оповещения есть
	?>
	<b class="link_lead">Обсуждения:</b><div class="v_i_b"></div>
	<?php
	}
		
	
	
	
	
	
	foreach(UsersForreg::$array_my_signatures as $value){//для остальных
	
		GeneralPageBasic::uncode_page($value);
		

//	новости ne 1000000
//	советы от тазтим ar 1000000
//	объявления am 10000 1000000
//	форум3 fm 10000 1000000
//	галерея ga 10000 1000000 10000
//	видео vi  10000 1000000
//	личные сообщения sm 10000000000 10000000000
//	форум2 ft 10000
//	сообщения под личными фотоальбомами sf 10000000000 10000 1000000
//	моя стена sw 10000000000 - у кого на стене
//  чат на главной станице mc- без кода



		if (GeneralPageBasic::$code_sign=="ne") {
			GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_articles3($MSQLc,GeneralPageBasic::$code_topic);
			if(GeneralPageBasic::$current_name_topic) {
				?>
				<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
				<td align="left" width="200"><span class="link_lead">Новости:</span></td>
				<td align="left"><a href="http://instorage.org/portfolio/tazteam/news/<?php echo(GeneralPageBasic::$code_topic);?>" class="link_lead_topic "><?php echo(GeneralPageBasic::$current_name_topic);?></a></td>
				</tr>
				</table>		
				<div class="v_i_b"></div>
				<?php }}
		
		
		else if (GeneralPageBasic::$code_sign=="ar") {
		GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_articles3($MSQLc,GeneralPageBasic::$code_topic);		
		if(GeneralPageBasic::$current_name_topic) {
		?>
		<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
		<td align="left" width="200"><span class="link_lead">Статьи от TAZTEAM:</span></td>
		<td align="left"><a href="http://instorage.org/portfolio/tazteam/articles/<?php echo(GeneralPageBasic::$code_topic);?>" class="link_lead_topic"><?php echo(GeneralPageBasic::$current_name_topic);?></a></td>
		</tr>
		</table>		
		<div class="v_i_b"></div>
		<?php }}		
		
		
		else if (GeneralPageBasic::$code_sign=="am") {
			GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_automarket3($MSQLc,GeneralPageBasic::$code_topic);
			if(GeneralPageBasic::$current_name_topic) {	?>		
				<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
				<td align="left" width="200"><span class="link_lead">Объявления:</span></td>
				<td align="left"><a href="http://instorage.org/portfolio/tazteam/automarket/<?php echo(GeneralPageBasic::$code_section);?>/<?php echo(GeneralPageBasic::$code_topic);?>" class="link_lead_topic"><?php echo(GeneralPageBasic::$current_name_topic);?></a></td>
				</tr>
				</table>		
				<div class="v_i_b"></div>
				<?php }}		
		
		
		//форум в начале
		
		
		else if (GeneralPageBasic::$code_sign=="ga") {		
			GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_photo3($MSQLc,GeneralPageBasic::$code_section,GeneralPageBasic::$code_topic);
			GeneralPageBasic::uncode_page($value);
			GeneralPagesCounter::$rowspage_name="rowspagephoto3";//копия такой страницы - по присваиванию номеров страниц
			GeneralPagesCounter::calculate_current($MSQLc, "photo___photos_".GeneralPageBasic::$code_section,"id_topic='".GeneralPageBasic::$code_topic."'","id_photo<='".GeneralPageBasic::$code_idphoto."'",0,0,0);
			if((GeneralPageBasic::$current_name_topic)&&(GeneralPagesCounter::$N_cur_current)) { ?>		
				<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
				<td align="left" width="200"><span class="link_lead">Галерея:</span></td>
				<td align="left"><a href="http://instorage.org/portfolio/tazteam/photo/<?php echo(GeneralPageBasic::$code_section);?>/<?php echo(GeneralPageBasic::$code_topic);?>=<?php echo(GeneralPagesCounter::$N_cur_current);?>" class="link_lead_topic"><?php echo(GeneralPageBasic::$current_name_topic);?> (фото №<?php echo(GeneralPagesCounter::$N_cur_current);?>)</a></td>
				</tr>
				</table>
				<div class="v_i_b"></div>			
				<?php }}
				
		else if (GeneralPageBasic::$code_sign=="vi") {
			GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_video3($MSQLc,GeneralPageBasic::$code_topic);		
			if(GeneralPageBasic::$current_name_topic) {	?>
				<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
				<td align="left" width="200"><span class="link_lead">Видео:</span></td>
				<td align="left"><a href="http://instorage.org/portfolio/tazteam/video/<?php echo(GeneralPageBasic::$code_section);?>/<?php echo(GeneralPageBasic::$code_topic);?>" class="link_lead_topic"><?php echo(GeneralPageBasic::$current_name_topic);?></a></td>
				</tr>
				</table>
				<div class="v_i_b"></div>
				<?php }}
				
		else if (GeneralPageBasic::$code_sign=="ft") {
			GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_forum2($MSQLc,GeneralPageBasic::$code_section);
			if(GeneralPageBasic::$current_name_topic) {	?>
				<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
				<td align="left" width="200"><span class="link_lead">Форум - чат:</span></td>
				<td align="left"><a href="http://instorage.org/portfolio/tazteam/forum/<?php echo(GeneralPageBasic::$code_section);?>" class="link_lead_topic"><?php echo(GeneralPageBasic::$current_name_topic);?></a></td>
				</tr>
				</table>
				<div class="v_i_b"></div>
				<?php }}
				
		else if (GeneralPageBasic::$code_sign=="sf") {
			GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_photoalbums_self($MSQLc,GeneralPageBasic::$code_section,GeneralPageBasic::$code_topic);
			GeneralPageBasic::uncode_page($value);
			GeneralPagesCounter::$rowspage_name="rowspagephoto3";//копия такой страницы - по присваиванию номеров страниц
			GeneralPagesCounter::calculate_current($MSQLc, "registrated_users___photoalbums_photos","id_user='".GeneralPageBasic::$code_section."'","id_album='".GeneralPageBasic::$code_topic."'","id_photo<='".GeneralPageBasic::$code_idphoto."'",0,0);
			if((GeneralPageBasic::$current_name_topic)&&(GeneralPagesCounter::$N_cur_current)) { ?>
				<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
				<td align="left" width="200"><span class="link_lead">Фотоальбомы:</span></td>
				<td align="left"><a href="http://instorage.org/portfolio/tazteam/users/<?php echo(GeneralPageBasic::$code_section);?>/photoalbums/<?php echo(GeneralPageBasic::$code_topic);?>=<?php echo(GeneralPagesCounter::$N_cur_current);?>" class="link_lead_topic"><?php echo(GeneralPageBasic::$current_name_topic);?> (фото №<?php echo(GeneralPagesCounter::$N_cur_current);?>)</a></td>
				</tr>
				</table>
				<div class="v_i_b"></div><?php }}
				
		else if (GeneralPageBasic::$code_sign=="sw") {
			GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_walls($MSQLc,GeneralPageBasic::$code_section);
			if(GeneralPageBasic::$current_name_topic) {	?>
				<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
				<td align="left" width="200"><span class="link_lead">Стена участников:</span></td>
				<td align="left"><a href="http://instorage.org/portfolio/tazteam/users/<?php echo(GeneralPageBasic::$code_section);?>#dw1sw" class="link_lead_topic"><?php 
				if (GeneralPageBasic::$code_section==UsersMyData::$id){ echo("Моя страница"); }
				else {	echo(GeneralPageBasic::$current_name_topic);} ?></a></td>
				</tr>
				</table>
				<div class="v_i_b"></div>
				<?php }}
		
		
		
		else if (GeneralPageBasic::$code_sign=="mc") { ?>
			<a href="http://instorage.org/portfolio/tazteam" class="link_lead">Главная страница - чат</a>
			<div class="v_i_b"></div>
			<?php }		
			
			
		else if (GeneralPageBasic::$code_sign=="sh") { ?>
			<a href="http://instorage.org/portfolio/tazteam/shop" class="link_lead">Автозвук</a>
			<div class="v_i_b"></div>
			<?php }			
			
			
			
			
			
			
			
			
			
		
		$cv2=1; $cv1=1;}}

	else {	?>
		<span class="grey">не найдено</span>
		<?php }
	
	
}
?><div class="v_i_b"></div></div>