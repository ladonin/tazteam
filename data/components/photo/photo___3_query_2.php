<?php
//узнаем следующую тему для "рандома"
$query2="SELECT id_photo,page_photo,id_topic,format_photo,size_photo FROM photo___photos_".GeneralGetVars::$var2." WHERE idkey<='".$row['idkey']."' ORDER by idkey DESC LIMIT 12";
$res2=GeneralMYSQL::query($MSQLc,$query2);
if (GeneralMYSQL::num_rows($res2)<12){
	$query2="
	(SELECT id_photo,page_photo,id_topic,format_photo,size_photo FROM photo___photos_".GeneralGetVars::$var2." WHERE idkey<='".$row['idkey']."' ORDER by idkey DESC LIMIT 12)
	UNION ALL
	(SELECT id_photo,page_photo,id_topic,format_photo,size_photo FROM photo___photos_".GeneralGetVars::$var2." WHERE idkey>'".$row['idkey']."' ORDER by idkey DESC LIMIT ".(12-GeneralMYSQL::num_rows($res2)).")";$res2=GeneralMYSQL::query($MSQLc,$query2);}

?>