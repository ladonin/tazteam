<div style="float: left; overflow:hidden; width:928px; margin-top:20px; padding-top:20px;
padding-left:0px;
padding-right:0px;
"
class="boxShadow3"
>
<div style="padding-left:20px; padding-right:20px;"><?php include("data/components/_general/breadcrumbs.php"); ?><?php
UsersBase::set_points($MSQLc,GeneralGetVars::$var2);//начисляем ему баллы

UsersBase::detect_its_mypage(1);//определяем - наша страница или нет
UsersPhotoalbumsBase::set_sort($MSQLc);//вычисляем - кого будем выбирать свои или альбомы друзей
//UsersPhotoalbumsBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос перезапишется в этой функции
GeneralPagesCounter::$find_query=UsersPhotoalbumsBase::$find_query;
GeneralPagesCounter::$find_query_order=UsersPhotoalbumsBase::$find_query_order;

GeneralPagesCounter::calculate($MSQLc, "registrated_users___photoalbums",0,0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2."/photoalbums");
GeneralPagesCounter::imagespreload();
include("data/components/users/panels/users___3_photoalbums_2_panel_top.php");

include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_photoalbums_2_query_1.php");
?>
</div>
<div style="padding-left:14px; padding-right:14px;">
<div class="v_i_b"></div>
<?php
$current_var1=0;
while($row=GeneralMYSQL::fetch_array($res)) {
    $current_var1++;
?>


	<table cellpadding="0" cellspacing="0" style="width:25%; float:left; margin-bottom:20px; margin-right: 0px;">
	<tr>
	<td valign="top" align="center">

            <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['id_user']."/photoalbums/".$row['id_album']);?>=1"><img src="http://140706.selcdn.com/tazteam/_files/images/users/photoalbums/<?php echo($row['dir_album']."/".$row['id_user']."/".$row['id_album']."/".$row['id_photo']."_5.".$row['format_photo']);?>" width="210" height="210"/></a>
        </td>
		</tr> 
		<tr>
		<td align="center">
		<div style="padding:5px 0 0 0;">
		<?php if (UsersPhotoalbumsBase::$sort_by!=1){?>
		
		<span class="link-carcas ">Автор: </span> <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['id_user']);?>" class="link_lead_small black"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
		<div></div><?php } ?>
				<a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['id_user']."/photoalbums/".$row['id_album']);?>=1" class="link_lead_small"><?php echo($row['name_album']);?></a>
<?php /*http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['id_user']."/allphotosinalbum/".$row['id_album']);?>=1*/ ?>
		</div>
		</td>
		</tr>

</table>
<?php
if ($current_var1%4==0){
    ?>
    <div style="clear:both"></div>
    <?php
    
}




}
GeneralMYSQL::free($res);
?>



<div style="clear:both"></div>
</div>
<div style="padding-left:20px; padding-right:20px;">
<?php 
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
<?php }
GeneralPagesCounter::clearvars(); ?>
</div>
</div>