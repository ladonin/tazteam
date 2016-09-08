<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>
<div style="padding-left:20px; float: left;">
   <?php include("data/components/_general/breadcrumbs.php"); ?>
</div>

<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___1_query_1.php");
while ($row=GeneralMYSQL::fetch_array($res))
{/*привязка 1 от галереи*/
?>
	<table cellpadding="0" cellspacing="0" style="width:1%; float:left; padding-right:20px; padding-bottom:20px;">
	<tr>
	<td valign="top" align="center"><a href="<?php echo(GeneralGlobalVars::url);?>/photo/<?php echo($row['id_section']);?>=1"><img src="<?php echo(GeneralGlobalVars::url);?>/images/photo/photo___section_<?php echo($row['id_section']);?>.png" width="206" height="206" style="border:0px solid #191c20;"></a></td>
	</tr>
	</table>
<?php } GeneralMYSQL::free($res); ?>
</div>













