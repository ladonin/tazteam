<div class="padding_left_10"><?php
//include("data/components/".GeneralGetVars::$var1."/panels/users___3_photoalbums_3_new_photo.php");
?>
























<?php
include("data/components/".GeneralGetVars::$var1."/users___3_photoalbums_3_query_2.php");
while ($row2=GeneralMYSQL::fetch_array($res2)){
UsersPhotoalbumsBase::detect_current_num_page_photo($MSQLc,$row2['page_photo'],$row2['id_photo'],$row2['id_album'],$row2['id_user']);?>
<a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($row2['id_user']."/photoalbums/".$row2['id_album']."=".UsersPhotoalbumsBase::$current_num_page_photo);?>" class="refimage"><img src="<?php echo("http://140706.selcdn.ru/tazteam/images/users/photoalbums/".$row2['dir_album']."/".$row2['id_user']."/".$row2['id_album']."/".$row2['id_photo']."_3.".$row2['format_photo']);?>" width="69" height="69" style="border-bottom:1px solid #ffffff; border-right:1px solid #ffffff;"></a><?php }
GeneralMYSQL::free($res2);?>
<div class="v_i_b"></div>

<div>Альбом: <a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(GeneralGetVars::$var2."/allphotosinalbum/".GeneralGetVars::$var4."=1");?>" class="link_lead_small"><?php echo(GeneralPagetree::$name4);?></a></div>
<div class="v_i_s"></div>
<?php if (!$row['name_photo']) { echo("без названия");} else {echo($row['name_photo']);}?>
<div class="v_i_b"></div>
<?php
GeneralVote::$db_rank=$row['rank'];
GeneralVote::$db_textvoters=$row['vote'];
GeneralVote::$abrev_page="sf";
GeneralVote::$getvar1=GeneralGetVars::$var1;
GeneralVote::$getvar2=GeneralGetVars::$var2;
GeneralVote::$getvar3=GeneralGetVars::$var3;
GeneralVote::$getvar4=GeneralGetVars::$var4;
GeneralVote::$num_page=GeneralGetVars::$num_page;
GeneralVote::$id_photo=$row['id_photo'];
include("data/components/_general/vote/panel_under_photo.php");
?>
<div class="v_i_b"></div>
Дата размещения: <span id="photo_3_date_photo"></span>
<script type="text/javascript">general___date_DMYvHM_show(<?php echo($row['dateloading']);?>,'photo_3_date_photo');</script>
<div></div>
	Автор: <a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo($row['t_id_user']);?>" class="link_lead_small black"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
<div></div>
Просмотров: <?php echo($row['number_views']);?>
<div></div>

<?php
if (UsersBase::$count_photoalbums>1){//то есть тут есть не только текущий альбом
$cv1=1;
?><div class="v_i_b"></div>
<span class="panel_text_dark_small">Другие альбомы:</span> (всего: <?php echo(UsersBase::$count_photoalbums); ?>)<div class="v_i_s"></div><?php
shuffle(UsersBase::$array_photoalbums_list);
	foreach(UsersBase::$array_photoalbums_list as $key=>$value){
	?><a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(GeneralGetVars::$var2."/allphotosinalbum/".UsersBase::$array_photoalbums_list[$key]['id_album']);?>=1" title="<?php echo(UsersBase::$array_photoalbums_list[$key]['name_album']);?>" class="link_lead_small "><?php echo(UsersBase::$array_photoalbums_list[$key]['name_album']);?></a><div></div>	<?php
	if ($cv1==10) {break;}
	$cv1++;	}	?>
<div class="v_i_s"></div><?php }
	if (UsersPhotoalbumsBase::detect_belong_topic_to_user()==true){
	   ?><div class="v_i_b"></div>






		<a class="btn btn-success btn-small" onclick="general___swim_show_hide('new_photo_in_album_1'); general___swim_hide('redact_photo_in_album_1');">Загрузить новое фото в альбом</a>
		<?php
		$current_var4="_2";
		$current_var1="
			action=\"".GeneralGetVars::$urltosubmit."\"
			enctype=\"multipart/form-data\"
			onsubmit=\"return general___new_photo('".$current_var4."');\">
			<input name=\"submit\" value=\"sendnewphotoinusersphotoalbum\" type=\"hidden\"";//текст формы редактирования фото
		$current_var2="new";
		$current_var3="Загрузить новое фото";
		$current_var5="";
		$current_var6=1;
		$current_var7="new_photo_in_album_1";
		?><div class="v_i_b"></div>
		<div id="new_photo_in_album_1" class="swim_panel well">

			<form method="post" <?php echo($current_var1);?>>
			<?php

        if($current_var2) { ?>
            <div class="lead"><?php echo($current_var3);?>:</div>
        <?php } ?>
        <input type="file" name="img1" style="width:170px;" id="load_photo_img1<?php echo($current_var4);?>">
        <div class="v_i_b"></div>
        <div class="link_lead ">Описание к фото:</div>
        <textarea maxlength="1000" style="height:100px; width:224px" id="inputtexttextarea_1<?php echo($current_var4);?>"  name="inputtexttextarea_1" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'><?php echo($current_var5);?></textarea>
        <div class="v_i_b"></div>

        <?php if ($current_var6==1) {//если разрешено ?>
            <div style="float:left;" class="btn btn-warning btn-small" onclick="general___swim_hide('<?php echo($current_var7);?>');">убрать</div><?php
        } ?>

        <div style="float:left;" class="padding_left_10"><input value="отправить" class="btn btn-success btn-small " type="submit"></div>


        <?php //GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>
        <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td align="right" width="50%"> </td>
        <td align="left" width="50%"> </td>
        </tr>
        </table>

        <?php
            //include("data/components/_general/panels/work_width_photo_1.php");
        ?>
			</form>
		</div>
		<?php

















		include("data/components/users/panels/users___3_photoalbums_3_rule_photo_1.php"); } ?>
</div>




<div class="padding_left_5">
<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharetype="button" data-yasharequickservices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,gplus"><span class="b-share"><a class="b-share__handle" id="ya-share-0.7018069031448934-1400853324946" data-hdirection="" data-vdirection=""><span class="b-share-form-button b-share-form-button_share"><i class="b-share-form-button__before"></i><i class="b-share-form-button__icon"></i>Поделиться…<i class="b-share-form-button__after"></i></span></a><a rel="nofollow" target="_blank" title="Я.ру" class="b-share__handle b-share__link b-share-btn__yaru" href="http://share.yandex.ru/go.xml?service=yaru&amp;url=http%3A%2F%2Fmapstore.org/my_portfolio/tazteam.net%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="yaru"><span class="b-share-icon b-share-icon_yaru"></span></a><a rel="nofollow" target="_blank" title="ВКонтакте" class="b-share__handle b-share__link b-share-btn__vkontakte" href="http://share.yandex.ru/go.xml?service=vkontakte&amp;url=http%3A%2F%2Fmapstore.org/my_portfolio/tazteam.net%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="vkontakte"><span class="b-share-icon b-share-icon_vkontakte"></span></a><a rel="nofollow" target="_blank" title="Facebook" class="b-share__handle b-share__link b-share-btn__facebook" href="http://share.yandex.ru/go.xml?service=facebook&amp;url=http%3A%2F%2Fmapstore.org/my_portfolio/tazteam.net%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="facebook"><span class="b-share-icon b-share-icon_facebook"></span></a><a rel="nofollow" target="_blank" title="Twitter" class="b-share__handle b-share__link b-share-btn__twitter" href="http://share.yandex.ru/go.xml?service=twitter&amp;url=http%3A%2F%2Fmapstore.org/my_portfolio/tazteam.net%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="twitter"><span class="b-share-icon b-share-icon_twitter"></span></a><a rel="nofollow" target="_blank" title="Одноклассники" class="b-share__handle b-share__link b-share-btn__odnoklassniki" href="http://share.yandex.ru/go.xml?service=odnoklassniki&amp;url=http%3A%2F%2Fmapstore.org/my_portfolio/tazteam.net%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="odnoklassniki"><span class="b-share-icon b-share-icon_odnoklassniki"></span></a><a rel="nofollow" target="_blank" title="Мой Мир" class="b-share__handle b-share__link b-share-btn__moimir" href="http://share.yandex.ru/go.xml?service=moimir&amp;url=http%3A%2F%2Fmapstore.org/my_portfolio/tazteam.net%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="moimir"><span class="b-share-icon b-share-icon_moimir"></span></a><a rel="nofollow" target="_blank" title="LiveJournal" class="b-share__handle b-share__link b-share-btn__lj" href="http://share.yandex.ru/go.xml?service=lj&amp;url=http%3A%2F%2Fmapstore.org/my_portfolio/tazteam.net%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="lj"><span class="b-share-icon b-share-icon_lj"></span></a><a rel="nofollow" target="_blank" title="Google Plus" class="b-share__handle b-share__link b-share-btn__gplus" href="http://share.yandex.ru/go.xml?service=gplus&amp;url=http%3A%2F%2Fmapstore.org/my_portfolio/tazteam.net%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="gplus"><span class="b-share-icon b-share-icon_gplus"></span></a></span></div>









