<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>   <?php include("data/components/_general/breadcrumbs.php"); ?>
<?php
//GarageBase::set_sort();//вычисляем - кого будем выбирать, тазы, запчасти, другие машины, покупателей
GarageBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос перезапишется в этой функции
GeneralPagesCounter::$find_query=GarageBase::$find_query;
GeneralPagesCounter::calculate($MSQLc, "garage",0,0,0,0,0,GeneralGetVars::$var1);
GeneralPagesCounter::imagespreload();
include("data/components/garage/panels/garage___1_panel_top.php");
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___1_query_1.php");
?>


<div class="v_i_b"></div>


<?php
while($row=GeneralMYSQL::fetch_array($res)) {
	GarageBase::$announcements_enable=1;
	GarageBase::detect_first_photo($row['img']);//вычисляем первое фото
	?>




	<table cellpadding="0" cellspacing="0" style="width:50%; float:left; padding-bottom:10px;">
	<tr>
	<td valign="top" align="center">
    		<div style="width:420px; max-height:190px; overflow:hidden;">	
			<a href="http://mapstore.org/my_portfolio/tazteam.net/garage/<?php echo($row['themepage']."/".$row['id']);?>" class="lead"><?php echo(GarageBase::return_parameters("mark", $row['mark'])." "); echo($row['model']);?></a>
			</div><div class="v_i_s"></div>
            
            
            
            
            
            
            
		<a href="http://mapstore.org/my_portfolio/tazteam.net/garage/<?php echo($row['themepage']."/".$row['id']);?>"><?php
        if ($row['img']==""){?><img src="http://mapstore.org/my_portfolio/tazteam.net/images/_general/general___photo_none_300x200.png" width="300" height="200" class="refimage"/><?php }
		else {?><img src="http://140706.selcdn.ru/tazteam/images/garage/<?php echo($row['id']);?>/<?php echo(GarageBase::return_size_to_photo(GarageBase::$img1_cur,5));/*width="434" height="300"*/?>" width="300" height="200" class="refimage"><?php } 		
        ?></a>
<div class="v_i_s"></div>

	<span class="grey">Владелец: </span> <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['id_user']);?>" class="link_lead "><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>

				<?php if (GeneralSecurity::detect_administrator()==true) { ?>				
				<div class="v_i_s"></div>
				просмотров: <b><?php echo($row['number_views']);?></b><?php } ?>
									
				
				
				
				
				
<div class="v_i_b"></div><div class="v_i_b"></div>		
	</td>
	</tr>
	</table> 

<?php
} ?>
<div style="clear:both;"></div>
<div class="padding_left_10 padding_right_20 content_dark">
    
    
    
    
  <?php
if (GarageBase::$announcements_enable==0) { ?>

Машин не найдено
<?php }
GeneralMYSQL::free($res);
?>
<?php 
if (GeneralPagesCounter::$N_max>1){ ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left" width="270">	
	<?php echo(GeneralPagesCounter::$htmlarrows); ?>
</td>
<td align="right" valign="bottom"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>
<?php }
GeneralPagesCounter::clearvars(); ?>
</div>  
    
    
    
    <div class="v_i_b"></div>	

</div>