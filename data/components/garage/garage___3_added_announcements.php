
<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_2.php");
if (GeneralMYSQL::num_rows($res2)<GarageBase::min_additional_announcements){
	GarageBase::$condition_added1=GarageBase::$condition_added2;//альтернативный поиск, если недостаточно дополнительных олбъявлений записано в БД
	GarageBase::$find_query="";
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_2.php");}
	while($row2=GeneralMYSQL::fetch_array($res2)) {
		GarageBase::detect_first_photo($row2['img']);//вычисляем первое фото
		?>
		<table cellpadding="0" cellspacing="0" style="float:left; margin-bottom:40px;" width="33%">
		<tr>
		<td valign="top" align="center" width="210">
			<a href="http://mapstore.org/my_portfolio/tazteam.net/garage/<?php echo(GeneralGetVars::$var2."/".$row2['id']);?>"><?php		
		if ($row2['img']==""){?><img src="http://mapstore.org/my_portfolio/tazteam.net/images/_general/general___photo_none_210x160.png" width="210" height="160" class="refimage"><?php }
		else {?><img src="http://140706.selcdn.com/tazteam/_files/images/garage/<?php echo($row2['id']);?>/<?php echo(GarageBase::return_size_to_photo(GarageBase::$img1_cur,5));?>" width="210" height="160" class="refimage"><?php } ?></a>
			</td>
		</tr>
		</table>
<?php } 
GeneralMYSQL::free($res2); ?>