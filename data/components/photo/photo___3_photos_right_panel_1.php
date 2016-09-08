<div class="padding_left_10">













<?php 
//include("data/components/".GeneralGetVars::$var1."/panels/".GeneralGetVars::$var1."___3_new_photo.php");
?>












<?php // такое же как и в data\components\users\panels\users___3_photoalbums_3_new_photo.php ?>




























<?php

//if (!$cache3->start(GeneralGetVars::$urlview."right1", 'Static')) {



include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_2.php");
while ($row2=GeneralMYSQL::fetch_array($res2))
{
PhotoBase::detect_current_num_page_photo($MSQLc,$row2['page_photo'],$row2['id_photo'],$row2['id_topic'],GeneralGetVars::$var2);?><a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".$row2['id_topic']."=".PhotoBase::$current_num_page_photo);?>" class="refimage"><img src="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo(GeneralGetVars::$var2."/".$row2['id_topic']."/".$row2['id_photo']."_3.".$row2['format_photo']);?>" width="69" height="69" style="border-right:1px solid #ffffff; border-bottom:1px solid #ffffff;"></a><?php 
}
GeneralMYSQL::free($res2);

 // Останавливаем буферизацию и пишем буфер в файл
 //$cache3->end(); 
//} ?>







<div class="v_i_b"></div>		

<div>Альбом: <a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".GeneralGetVars::$var3."/allphotos=1");?>" class="link_lead_small"><?php echo(GeneralPagetree::$name3);?></a></div>
<div class="v_i_s"></div>
<?php if (!$row['name_photo']) { echo("без названия");} else {echo($row['name_photo']);}?>
<div class="v_i_b"></div>







<?php		
GeneralVote::$db_rank=$row['rank'];
GeneralVote::$db_textvoters=$row['vote'];
GeneralVote::$abrev_page="ga";
GeneralVote::$getvar1=GeneralGetVars::$var1;
GeneralVote::$getvar2=GeneralGetVars::$var2;
GeneralVote::$getvar3=GeneralGetVars::$var3;
GeneralVote::$getvar4=GeneralGetVars::$var4;
GeneralVote::$num_page=GeneralGetVars::$num_page;
GeneralVote::$id_photo=$row['id_photo'];
include("data/components/_general/vote/panel_under_photo.php");	?>








<div class="v_i_b"></div>
Дата размещения: <span id="photo_3_date_photo"></span>
<script type="text/javascript">general___date_DMYvHM_show(<?php echo($row['date_photo']);?>,'photo_3_date_photo');</script>
<?php if (GeneralGetVars::$var2!=1){/*привязка 1 от галереи*/?>
	<div></div>			
	Автор: <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['t_id_user']);?>" class="link_lead_small black"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
	<?php } ?>
<div></div>









Просмотров: <?php echo($row['number_views']);?>
<div class="v_i_s"></div>
<?php if (PhotoBase::detect_belong_topic_to_user()==true){
    ?><div class="v_i_s"></div><?php
	include("data/components/photo/panels/photo___3_rule_photo_1.php"); } ?>		
<div class="v_i_b"></div>




</div>


<div class="padding_left_5">
<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharetype="button" data-yasharequickservices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,gplus"><span class="b-share"><a class="b-share__handle" id="ya-share-0.7018069031448934-1400853324946" data-hdirection="" data-vdirection=""><span class="b-share-form-button b-share-form-button_share"><i class="b-share-form-button__before"></i><i class="b-share-form-button__icon"></i>Поделиться…<i class="b-share-form-button__after"></i></span></a><a rel="nofollow" target="_blank" title="Я.ру" class="b-share__handle b-share__link b-share-btn__yaru" href="http://share.yandex.ru/go.xml?service=yaru&amp;url=http%3A%2F%2Finstorage.org/portfolio/tazteam%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="yaru"><span class="b-share-icon b-share-icon_yaru"></span></a><a rel="nofollow" target="_blank" title="ВКонтакте" class="b-share__handle b-share__link b-share-btn__vkontakte" href="http://share.yandex.ru/go.xml?service=vkontakte&amp;url=http%3A%2F%2Finstorage.org/portfolio/tazteam%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="vkontakte"><span class="b-share-icon b-share-icon_vkontakte"></span></a><a rel="nofollow" target="_blank" title="Facebook" class="b-share__handle b-share__link b-share-btn__facebook" href="http://share.yandex.ru/go.xml?service=facebook&amp;url=http%3A%2F%2Finstorage.org/portfolio/tazteam%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="facebook"><span class="b-share-icon b-share-icon_facebook"></span></a><a rel="nofollow" target="_blank" title="Twitter" class="b-share__handle b-share__link b-share-btn__twitter" href="http://share.yandex.ru/go.xml?service=twitter&amp;url=http%3A%2F%2Finstorage.org/portfolio/tazteam%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="twitter"><span class="b-share-icon b-share-icon_twitter"></span></a><a rel="nofollow" target="_blank" title="Одноклассники" class="b-share__handle b-share__link b-share-btn__odnoklassniki" href="http://share.yandex.ru/go.xml?service=odnoklassniki&amp;url=http%3A%2F%2Finstorage.org/portfolio/tazteam%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="odnoklassniki"><span class="b-share-icon b-share-icon_odnoklassniki"></span></a><a rel="nofollow" target="_blank" title="Мой Мир" class="b-share__handle b-share__link b-share-btn__moimir" href="http://share.yandex.ru/go.xml?service=moimir&amp;url=http%3A%2F%2Finstorage.org/portfolio/tazteam%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="moimir"><span class="b-share-icon b-share-icon_moimir"></span></a><a rel="nofollow" target="_blank" title="LiveJournal" class="b-share__handle b-share__link b-share-btn__lj" href="http://share.yandex.ru/go.xml?service=lj&amp;url=http%3A%2F%2Finstorage.org/portfolio/tazteam%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="lj"><span class="b-share-icon b-share-icon_lj"></span></a><a rel="nofollow" target="_blank" title="Google Plus" class="b-share__handle b-share__link b-share-btn__gplus" href="http://share.yandex.ru/go.xml?service=gplus&amp;url=http%3A%2F%2Finstorage.org/portfolio/tazteam%2Fautomarket%2F1%2F3957&amp;title=%D0%92%D0%90%D0%97%202114%2C%20%D0%B3%D0%BE%D0%B4%20%D0%B2%D1%8B%D0%BF%D1%83%D1%81%D0%BA%D0%B0%3A2008%20%D0%B3.%2C%20%D1%86%D0%B5%D0%BD%D0%B0%3A140%20000%20%D1%80%D1%83%D0%B1.%2C%20%D1%81%D0%BE%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%B8%D0%B5%3A%D1%85%D0%BE%D1%80%D0%BE%D1%88%D0%B5%D0%B5%2C%20%D1%82%D0%B8%D0%BF%20%D0%BA%D1%83%D0%B7%D0%BE%D0%B2%D0%B0%3A%D1%85%D1%8D%D1%82%D1%87%D0%B1%D0%B5%D0%BA%205%D0%B4%2C%20%D1%82%D0%B8%D0%BF%20%D0%B4%D0%B2%D0%B8%D0%B3%D0%B0%D1%82%D0%B5%D0%BB%D1%8F%3A%D0%B1%D0%B5%D0%BD%D0%B7%D0%B8%D0%BD%20%D0%B8%D0%BD%D0%B6%D0%B5%D0%BA%D1%82%D0%BE%D1%80" data-service="gplus"><span class="b-share-icon b-share-icon_gplus"></span></a></span></div> 



</div>
