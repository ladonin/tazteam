<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;
"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?><?php
VoteBase::set_sort($MSQLc);
VoteBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос ДОзапишется в этой функции
GeneralPagesCounter::$find_query=VoteBase::$find_query;
GeneralPagesCounter::$rowspage_name="rowspageusers1";//копия такой страницы - по присваиванию номеров страниц
GeneralPagesCounter::calculate($MSQLc, "registrated_users___main_data",0,0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2);
$cv1="_vote";

if (GeneralPageBasic::$code_sign=="ga"){
	PhotoBase::detect_current_num_page_photo($MSQLc,VoteBase::$page_photo,VoteBase::$id_photo,VoteBase::$id_topic,VoteBase::$id_section);?>	
	<table cellpadding="0" cellspacing="0" style="width:100%; padding-bottom:10px;">
	<tr>
	<td valign="top" align="left" width="200">
<a href="<?php echo(GeneralGlobalVars::url);?>/photo/<?php echo(VoteBase::$id_section."/".VoteBase::$id_topic."=".PhotoBase::$current_num_page_photo);?>" alt="<?php echo(VoteBase::$name_photo);?>"><img src="http://140706.selcdn.ru/tazteam/images/photo/<?php echo(VoteBase::$id_section."/".VoteBase::$id_topic."/".VoteBase::$id_photo."_5.".VoteBase::$format_photo);?>" width="200" height="200" class="refimage" title="<?php echo(VoteBase::$name_photo);?>"></a>
	</td>
	<td align="left" valign="top" class="padding_left_10">
		<span class="lead"><?php echo(VoteBase::$name_album);?></span><div></div>
		<?php if (!VoteBase::$name_photo) { echo("без названия");} else {echo(VoteBase::$name_photo);}?>
		<div class="v_i_b"></div>
		Дата размещения: <span id="photo_3_date_photo"></span>
		<script type="text/javascript">general___date_DMYvHM_show(<?php echo(VoteBase::$dateloading);?>,'photo_3_date_photo');</script>
		<div></div>			
		Автор: <a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(VoteBase::$id_autor);?>" class="link_lead"><?php echo(VoteBase::$name_autor);?></a>
	</td>	
	</tr>
	</table>
<div class="v_i_b"></div>
<?php	
	
	
	}
else if (GeneralPageBasic::$code_sign=="sf"){
	UsersPhotoalbumsBase::detect_current_num_page_photo($MSQLc,VoteBase::$page_photo,VoteBase::$id_photo,VoteBase::$id_topic,VoteBase::$id_section);
	?>
	<table cellpadding="0" cellspacing="0" style="width:100%; padding-bottom:10px;">
	<tr><td valign="top" width="200"><a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(VoteBase::$id_section."/photoalbums/".VoteBase::$id_topic."=".UsersPhotoalbumsBase::$current_num_page_photo);?>" alt="<?php echo(VoteBase::$name_photo);?>"><img src="http://140706.selcdn.ru/tazteam/images/users/photoalbums/<?php echo(VoteBase::$dir_album."/".VoteBase::$id_section."/".VoteBase::$id_topic."/".VoteBase::$id_photo."_5.".VoteBase::$format_photo);?>" width="200" height="200" class="refimage" title="<?php echo(VoteBase::$name_photo);?>"></a></td>
	<td align="left" valign="top" class="padding_left_10">
	<span class="lead"><?php echo(VoteBase::$name_album);?></span><div></div>	
	<?php if (!VoteBase::$name_photo) { echo("без названия");} else {echo(VoteBase::$name_photo);}?>
	<div class="v_i_b"></div>	
	Дата размещения: <span id="photo_3_date_photo"></span>
	<script type="text/javascript">general___date_DMYvHM_show(<?php echo(VoteBase::$dateloading);?>,'photo_3_date_photo');</script>
	<div></div>			
	Автор: <a href="<?php echo(GeneralGlobalVars::url);?>/users/<?php echo(VoteBase::$id_autor);?>" class="link_lead "><?php echo(VoteBase::$name_autor);?></a>
</td>	
</tr>
</table>
<div class="v_i_b"></div>	
<?php	}
include("data/components/users/panels/users___1_panel_top.php");
include("data/components/vote/vote___1_query_1.php");	
include("data/components/_general/users/users_list.php");
?></div>