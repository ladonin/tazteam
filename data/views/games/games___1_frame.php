


<script>

function bonesplaybut(what) {
if (what=='down')
{
document.getElementById('bonesplay').style.backgroundImage="url('<?php echo(GeneralGlobalVars::url);?>/images/games/bones/button3.png')";
}
else if (what=='up') {
document.getElementById('bonesplay').style.backgroundImage="url('<?php echo(GeneralGlobalVars::url);?>/images/games/bones/button2.png')";
}
else if (what=='out') {
document.getElementById('bonesplay').style.backgroundImage="url('<?php echo(GeneralGlobalVars::url);?>/images/games/bones/button.png')";
}
else if (what=='over') {
document.getElementById('bonesplay').style.backgroundImage="url('<?php echo(GeneralGlobalVars::url);?>/images/games/bones/button2.png')";
}
}


general___preload_one_image('<?php echo(GeneralGlobalVars::url);?>/images/games/bones/button3.png');
general___preload_one_image('<?php echo(GeneralGlobalVars::url);?>/images/games/bones/button2.png');



function rate(pointsatuser){
var bonesrate=document.forms['form_bones'].bonesrate.value;
	if (bonesrate>pointsatuser)
	{
	document.forms['form_bones'].bonesrate.value=pointsatuser;
	bonesrate=pointsatuser;
	}




var val;
val = parseInt(bonesrate);
if ((bonesrate == '')||(isNaN(val))||(val != bonesrate)||(val <= 0))
{bonesrate=1; document.forms['form_bones'].bonesrate.value=1;}

var numimg=new String();
if ((bonesrate>=1)&&(bonesrate<=30))
{numimg=Number(bonesrate);}
else if ((bonesrate>=31)&&(bonesrate<=50))
{numimg="31-50";}
else if ((bonesrate>=51)&&(bonesrate<=99))
{numimg="51-99";}
else if ((bonesrate==100))
{numimg="100";}
else if ((bonesrate>=101)&&(bonesrate<=499))
{numimg="101-499";}
else if ((bonesrate==500))
{numimg="500";}
else if ((bonesrate>=501)&&(bonesrate<=999))
{numimg="501-999";}
else if ((bonesrate==1000))
{numimg="1000";}
else if ((bonesrate>=1001)&&(bonesrate<=4999))
{numimg="1001-4999";}
else if ((bonesrate==5000))
{numimg="5000";}
else if ((bonesrate>=5001)&&(bonesrate<=9999))
{numimg="5001-9999";}
else if ((bonesrate>9999))
{numimg="10000-";}
else
{numimg="none";}
	document.getElementById('chips').src = 'images/games/chips'+numimg+'.png';

	rezervnum=pointsatuser-bonesrate;
	if (rezervnum<0) {rezervnum=0;}
	else if (!rezervnum) {rezervnum=0;}
	document.getElementById('rezervchips').innerHTML="������ � �������: <b>"+rezervnum+"</b><br>";




	if ((pointsatuser>5000)&&((pointsatuser/bonesrate)<2))
	{alert("���� - ���� �����������!");}

}






function chipsuser(pointsatuser){

var bonesrate2=document.forms['form_bones'].bonesrate.value;
var numimg2=new String();
bonesrate2=pointsatuser-bonesrate2;
if ((bonesrate2>=1)&&(bonesrate2<=30))
{numimg2=Number(bonesrate2);}
else if ((bonesrate2>=31)&&(bonesrate2<=50))
{numimg2="31-50";}
else if ((bonesrate2>=51)&&(bonesrate2<=99))
{numimg2="51-99";}
else if ((bonesrate2==100))
{numimg2="100";}
else if ((bonesrate2>=101)&&(bonesrate2<=499))
{numimg2="101-499";}
else if ((bonesrate2==500))
{numimg2="500";}
else if ((bonesrate2>=501)&&(bonesrate2<=999))
{numimg2="501-999";}
else if ((bonesrate2==1000))
{numimg2="1000";}
else if ((bonesrate2>=1001)&&(bonesrate2<=4999))
{numimg2="1001-4999";}
else if ((bonesrate2==5000))
{numimg2="5000";}
else if ((bonesrate2>=5001)&&(bonesrate2<=9999))
{numimg2="5001-9999";}
else if ((bonesrate2>9999))
{numimg2="10000-";}
else
{numimg2="none";}

if (numimg2!="none")
{
	document.getElementById('chipsatuser').src = 'images/games/chips'+numimg2+'.png';
}
else
{
	document.getElementById('chipsatuser').src = 'images/games/chipsatusernone.png';
}
}



</script>








<table cellpadding="0" cellspacing="0" width="100%"><tr><td style="padding:10px;">
					<?php




					if ($_POST['bonessubmit']=="play"){

                       $bonesrate=$_POST['bonesrate'];


$rowuser=mysql_fetch_array(mysql_query("SELECT site_points FROM registrated_users___main_data WHERE id_user='".UsersMyData::$id."'"));
$pointsatuserbefore=$rowuser['site_points'];

				if (!is_numeric($bonesrate)) { $bonesrate=0; }

				if (UsersMyData::$id)
				{
					if (($bonesrate>$pointsatuserbefore)&&($pointsatuserbefore>=0)) { $bonesrate=$pointsatuserbefore-1; }
					if ($pointsatuserbefore<1) { $bonesrate=1; }
				}


					if ($bonesrate>0)
					{
					$regantibot1_1=rand(1, 6);
					$regantibot1_2=rand(1, 6);
					$regantibot2_1=rand(1, 6);
					$regantibot2_2=rand(1, 6);
					}
					else
					{
					$regantibot1_1=0;
					$regantibot1_2=0;
					$regantibot2_1=0;
					$regantibot2_2=0;
					}
					$user=$regantibot1_1+$regantibot1_2;
					$comp=$regantibot2_1+$regantibot2_2;
					if ($comp>$user) {$win="comp";}
					else if ($comp<$user) {$win="user";}
					else if ($regantibot1_1==0) {$win="start";}
					else if ($comp==$user) {$win="noone";}


if ($win=="user")
{
mysql_query("UPDATE registrated_users___main_data SET site_points=site_points+$bonesrate WHERE id_user='".UsersMyData::$id."'") or die(mysql_error());
}
else if ($win=="comp")
{
mysql_query("UPDATE registrated_users___main_data SET site_points=site_points-$bonesrate WHERE id_user='".UsersMyData::$id."'") or die(mysql_error());
}
else if ($win=="noone")
{
mysql_query("UPDATE registrated_users___main_data SET site_points=site_points WHERE id_user='".UsersMyData::$id."'") or die(mysql_error());
}
		}
		else
		{
					$regantibot1_1=0;
					$regantibot1_2=0;
					$regantibot2_1=0;
					$regantibot2_2=0;
		}



$rowuser=mysql_fetch_array(mysql_query("SELECT site_points FROM registrated_users___main_data WHERE id_user='".UsersMyData::$id."'"));
$pointsatuser=$rowuser['site_points'];



		if (!UsersMyData::$id) {$pointsatuser=10000;}
					?>
	<table width="100%" cellpadding="0" cellspacing="0" border="0">

	<tr>
	<td colspan="2" width="30%" align="center">
		<b class="lead white">��</b>
	</td>

	<td width="40%" colspan="3">

	</td>


	<td colspan="2" width="30%" align="center">
		<b class="lead white">���������</b>
	</td>
	</tr>

	<tr>
	<td width="15%" align="right" style="padding-right:10px;">
		<img src="<?php echo(GeneralGlobalVars::url);?>/images/games/bones/bones<?php echo($regantibot1_1); if ($win=="comp") {echo("loose");} ?>.png" width="130" height="130">
	</td>
	<td width="15%" align="left" style="padding-left:10px;">
		<img src="<?php echo(GeneralGlobalVars::url);?>/images/games/bones/bones<?php echo($regantibot1_2); if ($win=="comp") {echo("loose");}  ?>.png" width="130" height="130">
	</td>

	<td width="15%" align="center" valign="middle">

		<?php






		$rowusers=mysql_fetch_array(mysql_query("SELECT * FROM registrated_users___main_data WHERE id_user='".UsersMyData::$id."' LIMIT 1"));
		?>
		<a href="<?php echo(GeneralGlobalVars::url);?>/cabinet/<?php if (UsersMyData::$id) {echo(UsersMyData::$id);} else {echo("index");} ?>"><?php



		if (UsersMyData::$id) {?><img src="<?php echo(UsersBase::return_url_photo($rowusers['gen_photo'],$rowusers['dir_user']."/".$rowusers['id_user']."_5.".$rowusers['site_photo_format'],$rowusers['sn_photo_url_from_small'],$rowusers['sn_photo_url_from_huge'],0));?>" width="75" height="75" style="border:1px solid #ffffff;"><?php
		}
		else
		{?><img src="http://140706.selcdn.com/tazteam/_files/images/users/avas/nophoto_2.png" width="75" height="75" style="border:1px solid #ffffff;"><?php
		}  ?></a>

	</td>
	<td width="10%" align="center" valign="middle">
		<big><b style="color:#ffffff;">vs</b></big>
	</td>
	<td width="15%" align="center" valign="middle">
		<img src="<?php echo(GeneralGlobalVars::url);?>/images/comp.png" width="75" height="75" style="border:0px solid #ffffff;">
	</td>



	<td width="15%" align="right" style="padding-right:10px;">
		<img src="<?php echo(GeneralGlobalVars::url);?>/images/games/bones/bones<?php echo($regantibot2_1); if ($win=="user") {echo("loose");} ?>.png" width="130" height="130">
	</td>

	<td width="15%" align="left" style="padding-left:10px;">
		<img src="<?php echo(GeneralGlobalVars::url);?>/images/games/bones/bones<?php echo($regantibot2_2); if ($win=="user") {echo("loose");}?>.png" width="130" height="130">
	</td>
	</tr>




	<tr>
	<td colspan="2" width="30%" align="center" valign="top" height="30">
		<b style="font-size:17px; color:#ffffff;"><?php if ($win=="user") { echo("�� ��������!"); } else if ($win=="noone") { echo("�����!"); } ?></b>
	</td>

	<td width="40%" colspan="3">

	</td>


	<td colspan="2" width="30%" align="center" valign="top" height="30">
		<b style="font-size:17px; color:#ffffff;"><?php if ($win=="comp") { echo("��������� �������!"); } else if ($win=="noone") { echo("�����!"); }?></b>
	</td>
	</tr>

























	<tr>
	<td colspan="2" width="30%" align="center" valign="top" height="270" style="font-size:16px;">

    <div class="v_i_b"></div>

<img id="chipsatuser" src="<?php echo(GeneralGlobalVars::url);?>/images/games/chipsnone.png" width="260" height="130"><!--171-->
	<br>
	������ �� �����: <b><?php	if ($pointsatuser) {echo($pointsatuser);} else {echo("0");}?></b>
	<br>
	<span id="rezervchips"> </span><?php if (!UsersMyData::$id) { echo("<b>������ ������?<br> ��������������� � ����� ��-����������!</b>"); }?>
	</td>

	<td width="40%" align="center" colspan="3" valign="top" height="270">
    <div class="v_i_b"></div>
<img id="chips" src="<?php echo(GeneralGlobalVars::url);?>/images/games/chipsnone.png" width="260" height="130">
	</td>


	<td  colspan="2" width="30%" align="center" valign="top" height="270">
    <div class="v_i_b"></div>
<img src="<?php echo(GeneralGlobalVars::url);?>/images/games/chipscomp.png" width="260" height="130">
	</td>
	</tr>






	<tr>
	<td colspan="2" width="30%" align="center">

	</td>

	<td width="40%" align="center" colspan="3" valign="top">




		<b style="font-size:16px;">�������</b>
		<form method="post" action="" name="form_bones">
		<input type="submit" value="" id="bonesplay" class="bonesplay" onMousedown="bonesplaybut('down');" onMouseup="bonesplaybut('up');" onMouseout="bonesplaybut('out');" onMouseover="bonesplaybut('over');"


 style="
cursor:pointer;
width:140px;
height:140px;
border:0px;
background-image: url(../images/games/bones/button.png);
background-repeat: no-repeat;
        "


         >
		<br>
		<input
		type="textarea"
		id="bonesrate"
        placeholder="���� ������"
		style="width:108px; text-indent: 1px;"
		maxlength="70"
		name="bonesrate"
		value=""
		onKeyUp="
		rate(<?php	echo($pointsatuser);?>);
		chipsuser(<?php	echo($pointsatuser);?>);">
		<input type="hidden" name="bonessubmit" value="play">
		</form>





<?php
GeneralImagesPreload::input("/images/games/bones/button2.png");
GeneralImagesPreload::input("/images/games/bones/button3.png");
?>







	</td>


	<td  colspan="2" width="30%" align="center">
	</td>
	</tr>

	</table>

</td></tr></table>

<script>
chipsuser(<?php	echo($pointsatuser);?>);
</script>







