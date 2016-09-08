
	<div class="big_text_bold padding_left_10">Другие новости:</div>
	<div class="v_i_b"></div><table cellpadding="0" cellspacing="0" style="width:100%; padding-left:10px;padding-right:0px;">
<tr>
<td valign="top" align="left">
	<?php
	include("data/components/news/news___3_query_2.php");
	if (GeneralMYSQL::num_rows($res2)<NewsBase::min_additional_news){
		NewsBase::$condition_added1=NewsBase::$condition_added2;//альтернативный поиск, если недостаточно дополнительных олбъявлений записано в БД
		include("data/components/news/news___3_query_2.php");}
	while($row2=GeneralMYSQL::fetch_array($res2)) {
	NewsBase::detect_first_photo($row2['img']);//вычисляем первое фото
	?>
<a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row2['id']);?>">
	<table cellpadding="0" cellspacing="0" style="width:<?php echo(GeneralPageBasic::$general_width_blocks_in_list);?>; float:left; padding-right:10px; padding-bottom:10px;">
	<tr>
	<td valign="top" width="100" align="left"  style="

border-top:1px solid #e0e0e0; 
border-left:1px solid #e0e0e0; 
border-bottom:1px solid #e0e0e0; 
"	><div style="
 padding:10px;
">	<!-- было 110-->
			<a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row2['id']);?>"><?php		
			if ($row2['img']==""){?><img src="http://instorage.org/portfolio/tazteam/images/_general/general___photo_none_100x100.jpg" width="100" height="100" class="refimage"><?php }
			else {?><img src="http://140706.selcdn.com/tazteam/_files/images/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row2['id']);?>/<?php echo(NewsBase::return_size_to_photo(NewsBase::$img1_cur,2));?>" width="100" height="100" class="refimage"><?php } 		
			?></a></div>
	</td>
	<td valign="top" align="left" style="

border-top:1px solid #e0e0e0; 
border-right:1px solid #e0e0e0; 
border-bottom:1px solid #e0e0e0; 
"	><!-- было 120-->
		<div  style="width:<?php echo(GeneralPageBasic::$general_width_div_in_block_in_list);?>; overflow:hidden;  padding:10px 10px 10px 0px;"><!-- было 120-->
			<a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row2['id']);?>" class="huge_link"><?php echo($row2['name']);?></a>
	<div class="v_i_s"></div>
	<noindex><div class="explanation_dark"><?php echo($row2['contentnacked']);?>...</div></noindex>			
			
			
			
			
			
			
			</div>
		</td>
		</tr>
		</table></a>

<?php } ?>
<?php GeneralMYSQL::free($res2); ?>	</td>
	</tr>
	</table>