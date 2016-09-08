<div class="v_i_b"></div><div class="v_i_b"></div>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">
	<a href="http://mapstore.org/my_portfolio/tazteam.net/forum/<?php echo($row['id_section']);?>=1" class="lead"><?php echo($row['name_section']);?></a>
	<div></div>
	<span class="grey"><?php echo($row['explanation_section']);?></span>
</td>
<td align="center" width="70">
	<span class="content_dark"><?php echo($row['number_topics']);?></span>

</td>
<td align="right" width="380">
<?php
if ($row['name_topic']){?>
	<a href="http://mapstore.org/my_portfolio/tazteam.net/forum/<?php echo($row['id_section']."/".$row['id_topic']);?>=1" class="link_lead"><?php echo($row['name_topic']);?></a>
		<div class="v_i_b_h1"></div>
		<span class="content_dark">Автор: </span> 
		<a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['id_autor_topic']);?>" class="link_normal"><?php echo(UsersMyData::return_name($row['login_user'],$row['mail_user'],$row['name_user'],$row['surname_user'],$row['login_status']));?></a>
        <?php } ?>
</td>
</tr>
</table>
<div class="v_i_b"></div>
