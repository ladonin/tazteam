<div class="photo1_5"><?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___1_query_1.php");
while ($row=GeneralMYSQL::fetch_array($res))
{/*привязка 1 от галереи*/
?>
	<table cellpadding="0" cellspacing="0" style="width:25%; float:left; padding-right:10px; padding-bottom:10px;">
	<tr>
	<td valign="top" align="left">
<div style="padding:10px 0px 0px 10px; float:left;">
<a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo($row['id_section']);?>=1" class="big_link"><img src="http://mapstore.org/my_portfolio/tazteam.net/images/photo/photo___section_<?php echo($row['id_section']);?>.png" width="200" height="200" style="border:1px solid #191c20;"></a>
</div></td>
</tr>
</table>
<?php
/*
<div class="photo1_1">
<table cellpadding="0" cellspacing="0" class="photo1_2">
<tr>
<td class="photo1_3">
<a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo($row['id_section']);?>=1" class="big_link"><?php echo($row['name_section']);?></a>
<div class="v_i_s"></div>
<span class="explanation">Последние темы</span>
</td>
</tr>
<tr>
<td>
<?php
$current_var2=$row['id_section'];
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___1_query_2.php");
while ($row2=GeneralMYSQL::fetch_array($res2)){
	PhotoBase::detect_current_num_page_photo($MSQLc,$row2['page_photo'],$row2['id_photo'],$row2['id_topic'],$row['id_section']);
	?><a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo($row['id_section']."/".$row2['id_topic']."=".PhotoBase::$current_num_page_photo);?>"><img src="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo($row['id_section']."/".$row2['id_topic']."/".$row2['id_photo']."_5.".$row2['format_photo']);?>" width="200" height="200" class="refimage"></a><?php
}
?>
</td>
</tr>
</table>	
</div>
*/


}
GeneralMYSQL::free($res);
?>


</div>













