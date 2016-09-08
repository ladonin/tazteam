<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>
<?php include("data/components/_general/breadcrumbs.php"); ?>
<a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2);?>" class="btn btn-primary btn-small">к&nbsp;моей странице</a>

<div class="v_i_b"></div>
<div class="lead">Мои обсуждения</div>	

	
<?php 
if (UsersBase::detect_its_mypage(2)==true){//определяем - наша страница или нет
	//UsersMyData::$id=1;
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_mytalks_query_1.php");
	$row=GeneralMYSQL::fetch_array($res);
	$row['forum3']=trim($row['forum3']);
	$row['forum2']=trim($row['forum2']);
	$row['photo3']=trim($row['photo3']);
	$row['photoalbums_self']=trim($row['photoalbums_self']);
	$row['news3']=trim($row['news3']);
	$row['articles3']=trim($row['articles3']);
	$row['automarket3']=trim($row['automarket3']);
	$row['video3']=trim($row['video3']);
	$row['walls']=trim($row['walls']);
	$row['indexchat1']=trim($row['indexchat1']);	
	$row['shopchat1']=trim($row['shopchat1']);	
	
	if (($row['forum3'])||($row['forum2'])||($row['photo3'])||($row['photoalbums_self'])||($row['news3'])||($row['articles3'])||($row['automarket3'])||($row['video3'])||($row['walls'])){ ?>
	
				
		
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="submit" value="Очистить" class="btn btn-warning btn-small">
		<input type="hidden" name="submit" value="users_mytalks_clear">
		</form>
		<?php	GeneralImagesPreload::input("images/_general/submit_clear_hover.png");	?>
		
	
	
	<?php }
	?>
	<div class="v_i_b"></div>
	<b class="link_lead">Форум</b>	
	<div class="v_i_b"></div>
	<?php 
	$cv=0;
	
	if ($row['forum3']){
	UsersForreg::$array_my_talks=explode("  ",$row['forum3']);
	foreach(UsersForreg::$array_my_talks as $value){
		GeneralPageBasic::uncode_page($value);
		GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_forum3($MSQLc,GeneralPageBasic::$code_section,GeneralPageBasic::$code_topic);		
		if (GeneralPageBasic::$current_name_topic) { ?>
		<a href="http://instorage.org/portfolio/tazteam/forum/<?php echo(GeneralPageBasic::$code_section);?>/<?php echo(GeneralPageBasic::$code_topic);?>=1" class="link_normal"><?php echo(GeneralPageBasic::$current_name_topic);?></a>
		<div class="v_i_b"></div>
		<?php
		$cv=1;}}}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }
	
	
//static public $code_sign;
//static public $code_section;
//static public $code_topic;
//static public $code_idphoto;		





	?>
	<div class="v_i_b"></div>
	<b class="link_lead">Форум - чат</b>	
	<div class="v_i_b"></div>
	<?php 
	$cv=0;	
	if ($row['forum2']){
	UsersForreg::$array_my_talks=explode("  ",$row['forum2']);
	foreach(UsersForreg::$array_my_talks as $value){
		GeneralPageBasic::uncode_page($value);
		GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_forum2($MSQLc,GeneralPageBasic::$code_section);
		if (GeneralPageBasic::$current_name_topic) { ?>
		<a href="http://instorage.org/portfolio/tazteam/forum/<?php echo(GeneralPageBasic::$code_section);?>" class="link_lead_topic "><?php echo(GeneralPageBasic::$current_name_topic);?></a>
		<div class="v_i_b"></div>
		<?php
		$cv=1;}}}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }




	?>
	<div class="v_i_b"></div>
	<b class="link_lead">Галерея</b>	
	<div class="v_i_b"></div>
	<?php 
	$cv=0;
	if ($row['photo3']){
	UsersForreg::$array_my_talks=explode("  ",$row['photo3']);
	foreach(UsersForreg::$array_my_talks as $value){
		GeneralPageBasic::uncode_page($value);
		GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_photo3($MSQLc,GeneralPageBasic::$code_section,GeneralPageBasic::$code_topic);
		if (GeneralPageBasic::$current_name_topic) { 
		GeneralPagesCounter::$rowspage_name="rowspagephoto3";//копия такой страницы - по присваиванию номеров страниц
		GeneralPagesCounter::calculate_current($MSQLc, "photo___photos_".GeneralPageBasic::$code_section,"id_topic='".GeneralPageBasic::$code_topic."'","id_photo<='".GeneralPageBasic::$code_idphoto."'",0,0,0);
		?>
		<a href="http://instorage.org/portfolio/tazteam/photo/<?php echo(GeneralPageBasic::$code_section);?>/<?php echo(GeneralPageBasic::$code_topic);?>=<?php echo(GeneralPagesCounter::$N_cur_current);?>" class="link_lead_topic "><?php echo(GeneralPageBasic::$current_name_topic);?> (фото №<?php echo(GeneralPagesCounter::$N_cur_current);?>)</a>
		<div class="v_i_b"></div>
		<?php
		$cv=1;}}}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }






	?>
	<div class="v_i_b"></div>
	<b class="link_lead">Фотоальбомы</b>	
	<div class="v_i_b"></div>
	<?php 
	$cv=0;
	if ($row['photoalbums_self']){
	UsersForreg::$array_my_talks=explode("  ",$row['photoalbums_self']);
	foreach(UsersForreg::$array_my_talks as $value){
		GeneralPageBasic::uncode_page($value);
		GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_photoalbums_self($MSQLc,GeneralPageBasic::$code_section,GeneralPageBasic::$code_topic);
		if (GeneralPageBasic::$current_name_topic) { 
		GeneralPagesCounter::$rowspage_name="rowspagephoto3";//копия такой страницы - по присваиванию номеров страниц
		GeneralPagesCounter::calculate_current($MSQLc, "registrated_users___photoalbums_photos","id_user='".GeneralPageBasic::$code_section."'","id_album='".GeneralPageBasic::$code_topic."'","id_photo<='".GeneralPageBasic::$code_idphoto."'",0,0);
		?>
		<a href="http://instorage.org/portfolio/tazteam/users/<?php echo(GeneralPageBasic::$code_section);?>/photoalbums/<?php echo(GeneralPageBasic::$code_topic);?>=<?php echo(GeneralPagesCounter::$N_cur_current);?>" class="link_lead_topic "><?php echo(GeneralPageBasic::$current_name_topic);?> (фото №<?php echo(GeneralPagesCounter::$N_cur_current);?>)</a>
		<div class="v_i_b"></div>
		<?php
		$cv=1;}}}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }


	?>
	<div class="v_i_b"></div>
	<b class="link_lead">Новости - обсуждения</b>	
	<div class="v_i_b"></div>
	<?php 
	$cv=0;
	if ($row['news3']){
	UsersForreg::$array_my_talks=explode("  ",$row['news3']);
	foreach(UsersForreg::$array_my_talks as $value){
		GeneralPageBasic::uncode_page($value);
		GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_news3($MSQLc,GeneralPageBasic::$code_topic);
		if (GeneralPageBasic::$current_name_topic) { ?>
		<a href="http://instorage.org/portfolio/tazteam/news/<?php echo(GeneralPageBasic::$code_topic);?>" class="link_lead_topic "><?php echo(GeneralPageBasic::$current_name_topic);?></a>
		<div class="v_i_b"></div>
		<?php
		$cv=1;}}}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }	








	?>
	<div class="v_i_b"></div>
	<b class="link_lead">Статьи от TAZTEAM - обсуждения</b>	
	<div class="v_i_b"></div>
	<?php 
	$cv=0;
	if ($row['articles3']){
	UsersForreg::$array_my_talks=explode("  ",$row['articles3']);
	foreach(UsersForreg::$array_my_talks as $value){
		GeneralPageBasic::uncode_page($value);
		GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_articles3($MSQLc,GeneralPageBasic::$code_topic);
		if (GeneralPageBasic::$current_name_topic) { ?>
		<a href="http://instorage.org/portfolio/tazteam/news/<?php echo(GeneralPageBasic::$code_topic);?>" class="link_lead_topic "><?php echo(GeneralPageBasic::$current_name_topic);?></a>
		<div class="v_i_b"></div>
		<?php
		$cv=1;}}}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }






	
	
	?>
	<div class="v_i_b"></div>
	<b class="link_lead">Объявления - комментарии</b>	
	<div class="v_i_b"></div>
	<?php 
	$cv=0;
	if ($row['automarket3']){
	UsersForreg::$array_my_talks=explode("  ",$row['automarket3']);
	foreach(UsersForreg::$array_my_talks as $value){
		GeneralPageBasic::uncode_page($value);
		GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_automarket3($MSQLc,GeneralPageBasic::$code_topic);
		if (GeneralPageBasic::$current_name_topic) { ?>
		<a href="http://instorage.org/portfolio/tazteam/automarket/<?php echo(GeneralPageBasic::$code_section);?>/<?php echo(GeneralPageBasic::$code_topic);?>" class="link_lead_topic "><?php echo(GeneralPageBasic::$current_name_topic);?></a>
		<div class="v_i_b"></div>
		<?php
		$cv=1;}}}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }	
	
	
	

	?>
	<div class="v_i_b"></div>
	<b class="link_lead">Видео - обсуждения</b>	
	<div class="v_i_b"></div>
	<?php 
	$cv=0;
	if ($row['video3']){
	UsersForreg::$array_my_talks=explode("  ",$row['video3']);
	foreach(UsersForreg::$array_my_talks as $value){
		GeneralPageBasic::uncode_page($value);
		GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_video3($MSQLc,GeneralPageBasic::$code_topic);
		if (GeneralPageBasic::$current_name_topic) { ?>
		<a href="http://instorage.org/portfolio/tazteam/video/<?php echo(GeneralPageBasic::$code_section);?>/<?php echo(GeneralPageBasic::$code_topic);?>" class="link_lead_topic "><?php echo(GeneralPageBasic::$current_name_topic);?></a>
		<div class="v_i_b"></div>
		<?php
		$cv=1;}}}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }	                 	
	








	?>
	<div class="v_i_b"></div>
	<b class="link_lead">Стена участников</b>	
	<div class="v_i_b"></div>
	<?php 
	$cv=0;
	if ($row['walls']){
	UsersForreg::$array_my_talks=explode("  ",$row['walls']);
	foreach(UsersForreg::$array_my_talks as $value){
		GeneralPageBasic::uncode_page($value);
		GeneralPageBasic::$current_name_topic=GeneralPageBasic::return_name_walls($MSQLc,GeneralPageBasic::$code_section);
		if (GeneralPageBasic::$current_name_topic) { ?>
		<a href="http://instorage.org/portfolio/tazteam/users/<?php echo(GeneralPageBasic::$code_section);?>" class="link_lead_topic "><?php echo(GeneralPageBasic::$current_name_topic);?></a>
		<div class="v_i_b"></div>
		<?php
		$cv=1;}}}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }





	if ($row['indexchat1']){ ?>
		<div class="v_i_b"></div>
		<a href="http://instorage.org/portfolio/tazteam" class="link_lead black">Главная страница - чат</a>
		<div class="v_i_b"></div>	
	<?php }

	if ($row['shopchat1']){ ?>
		<div class="v_i_b"></div>
		<a href="http://instorage.org/portfolio/tazteam/shop" class="link_lead black">Автозвук - чат</a>
		<div class="v_i_b"></div>	
	<?php }	
	
	/*?>
	<div class="v_i_b"></div>
	<b class="panel_text_dark_small">Галерея</b>	
	<div class="v_i_b"></div>
	<?php
	$cv=0;
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_mythemes_query_photo_1.php");
	while($row=GeneralMYSQL::fetch_array($res)) {
		?><a href="http://instorage.org/portfolio/tazteam/photo/<?php echo($row['id_section']);?>/<?php echo($row['id_topic']);?>/allphotos=1" class="link_normal"><?php echo($row['name_topic']);?></a>
		<div class="v_i_b"></div>
		<?php	
		$cv=1;}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }	
	
	
	
	?>
	<div class="v_i_b"></div>
	<b class="panel_text_dark_small">Объявления</b>	
	<div class="v_i_b"></div>
	<?php
	$cv=0;
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_mythemes_query_automarket_1.php");
	while($row=GeneralMYSQL::fetch_array($res)) { ?>
	<a href="http://instorage.org/portfolio/tazteam/automarket/<?php echo($row['themepage']);?>/<?php echo($row['id']);?>" class="link_normal">
	<?php if ($row['themepage']==1){ ?>
		<span style="color:#38474e;">продам</span> <?php echo(AutomarketBase::return_parameters("mark", $row['mark'])." "); echo($row['model']);?>
	<?php } 
	else if ($row['themepage']==2){ ?>
		<span style="color:#38474e;">продам</span> <?php echo($row['name']);?>
	<?php } 
	
	else if ($row['themepage']==3){ ?>
		<span style="color:#38474e;">куплю</span>  <?php echo($row['name']);?>
	<?php }	
	?>
	</a>
	<div class="v_i_b"></div>
	<?php	
	$cv=1;}	
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }	
	
	
	
	
	*/
	
	
	
	
	
	
}
?></div>