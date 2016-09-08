






<?php
if ($loginf == "[1]{0,}") {
    $loginf = "";
}
if ($namef == "[1]{0,}") {
    $namef = "";
}
if ($surnamef == "[1]{0,}") {
    $surnamef = "";
}
if ($mailf == "[1]{0,}") {
    $mailf = "";
}
if ($phonef == "[1]{0,}") {
    $phonef = "";
}
if ($yearbornf == "[1]{0,}") {
    $yearbornf = "";
}
if ($cityf == "[1]{0,}") {
    $cityf = "";
}
if ($oblastschoolf == "[1]{0,}") {
    $oblastschoolf = "";
}
if ($cityschoolf == "[1]{0,}") {
    $cityschoolf = "";
}
if ($schoolf == "[1]{0,}") {
    $schoolf = "";
}
if ($vuzf == "[1]{0,}") {
    $vuzf = "";
}
if ($sexf == "[1]{0,}") {
    $sexf = "";
}
if ($sempolf == "[1]{0,}") {
    $sempolf = "";
}
if ($widthphotof == "[1]{0,}") {
    $widthphotof = "";
}
?>







<table cellpadding="0" cellspacing="0" width="220">	
    <tr>			
        <td align="center">
            <div style="width:218px;" class="div_border_horiz">	</div>		
        </td>		
    </tr>
    <tr>			
        <td class="headblock_fortext_top_twice" align="center">			
            <b style="color:#ffffff;">Расширенный поиск</b>
        </td>

    </tr>
    <tr>
        <td align="center">		
            <div style="width:220px;" class="div_border_horiz">	</div>
        </td>		
    </tr>
</table>

<table cellpadding="0" cellspacing="0" width="220">	
    <tr>
        <td class="border_side">

        </td>			
        <td style="background-color:#ffffff;" align="center">			
            <div style="height:10px; overflow:hidden;"> </div>		

            <form method="post" action="">
                <table cellpadding="0" cellspacing="0" class="text11dark">
                    <tr>
                        <td align="left">	
                            <table cellpadding="0" cellspacing="0">
                                <tr>		
                                    <td align="left">
                                        <input type="checkbox" name="onlinef" value="1" id="onlinef" style="cursor:pointer;" <?php if ($onlinef) {
    echo("checked");
} ?>>				
                                    </td>
                                    <td width="70" align="left" style="padding-left:10px;">На сайте </td>
                                </tr>
                            </table>
                        </td>
                    </tr>		
                    <tr>
                        <td height="10">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">	
                            <table cellpadding="0" cellspacing="0">
                                <tr>		
                                    <td align="left">
                                        <input type="checkbox" name="widthphotof" value="1" id="widthphotof" style="cursor:pointer;" <?php if ($widthphotof) {
    echo("checked");
} ?>>				
                                    </td>
                                    <td width="70" align="left" style="padding-left:10px;">С фото </td>
                                </tr>
                            </table>
                        </td>
                    </tr>		
                    <tr>
                        <td height="10">
                        </td>
                    </tr>	
                    <tr>
                        <td align="left">
                            Логин<br><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                <input type="textarea"  name="loginf" value="<?php echo($loginf); ?>" class="cabinetinput1">
                </td>
                </tr>	
                <tr>
                    <td height="10">
                    </td>
                </tr>		
                <tr>
                    <td align="left">
                        Имя<br><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                <input type="textarea"  name="namef" value="<?php echo($namef); ?>" class="cabinetinput1">
                </td>
                </tr>
                <tr>
                    <td height="10">
                    </td>
                </tr>		
                <tr>
                    <td align="left">
                        Фамилия<br><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                <input type="textarea"  name="surnamef" value="<?php echo($surnamef); ?>" class="cabinetinput1">
                </td>
                </tr>		
                <tr>
                    <td height="10">
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        Пол<table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                    </td>
                </tr>		
                <tr>
                    <td align="left">	
                        <select name = "sexf" style="width:200px;">
                            <option value = "" <?php if ($sexf == "") {
    echo("selected='selected'");
} ?>>
                            <option value = "Мужской" <?php if ($sexf == "Мужской") {
    echo("selected='selected'");
} ?>>Мужской
                            <option value = "Женский" <?php if ($sexf == "Женский") {
    echo("selected='selected'");
} ?>>Женский
                        </select>
                    </td>
                </tr>
                <tr>
                    <td height="10">
                    </td>
                </tr>		
                <tr>
                    <td align="left">
                        Семейное положение<table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                    </td>
                </tr>		
                <tr>
                    <td align="left">	
                        <select name = "sempolf" style="width:200px;">
                            <option value = "" <?php if ($sempolf == "") {
    echo("selected='selected'");
} ?>>	
                            <option value = "женат/замужем" <?php if ($sempolf == "женат/замужем") {
    echo("selected='selected'");
} ?>>женат/замужем
                            <option value = "не женат/не замужем" <?php if ($sempolf == "не женат/не замужем") {
    echo("selected='selected'");
} ?>>не женат/не замужем
                            <option value = "ищу" <?php if ($sempolf == "ищу") {
    echo("selected='selected'");
} ?>>ищу
                        </select>
                    </td>
                </tr>		
                <tr>
                    <td height="10">
                    </td>
                </tr>	
                <tr>
                    <td align="left">
                        Эл. почта<br><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                <input type="textarea"  name="mailf" value="<?php echo($mailf); ?>" class="cabinetinput1">
                </td>
                </tr>	
                <tr>
                    <td height="10">
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        Телефон<br><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                <input type="textarea"  name="phonef" value="<?php echo($phonef); ?>" class="cabinetinput1">
                </td>
                </tr>	
                <tr>
                    <td height="10">
                    </td>
                </tr>		
                <tr>
                    <td align="left">
                        Год рождения<br><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                <input type="textarea"  name="yearbornf" value="<?php echo($yearbornf); ?>" class="cabinetinput1">
                </td>
                </tr>	
                <tr>
                    <td height="10">
                    </td>
                </tr>	
                <tr>
                    <td align="left">
                        Город<br><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                <input type="textarea"  name="cityf" value="<?php echo($cityf); ?>" class="cabinetinput1">
                </td>
                </tr>			
                <tr>
                    <td height="10">
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        ВУЗ<br><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                <input type="textarea"  name="vuzf" value="<?php echo($vuzf); ?>" class="cabinetinput1">
                </td>
                </tr>	
                <tr>
                    <td height="10">
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        Школа
                    </td>
                </tr>
                <tr>
                    <td height="5">
                    </td>
                </tr>	
                <tr>
                    <td align="left">
                        <font class="text11grey">область</font><br><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                <input type="textarea"  name="oblastschoolf" value="<?php echo($oblastschoolf); ?>" class="cabinetinput1">
                </td>
                </tr>	
                <tr>
                    <td align="left">
                        <font class="text11grey">город</font><br><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                <input type="textarea"  name="cityschoolf" value="<?php echo($cityschoolf); ?>" class="cabinetinput1">
                </td>
                </tr>				
                <tr>
                    <td align="left">
                        <font class="text11grey">номер</font><br><table cellpadding="0" cellspacing="0" width="100%"><tr><td height="2"> </tr></td></table>
                <input type="textarea"  name="schoolf" value="<?php echo($schoolf); ?>" class="cabinetinput1">
                </td>
                </tr>		
                <tr>
                    <td height="10" style="border-bottom: solid 0px #cccccc;">
                    </td>
                </tr>		
                <tr>
                    <td align="center">
                        <input type="hidden" name="detailfind" value="1">
                        <input type="submit" name="submit" value="" id="genfind_but" class="genfind_but" >
                    </td>
                </tr>
</table>
</form>

<div style="height:9px; overflow:hidden;"> </div>	


</td>	
<td class="border_side">

</td>
</tr>			
</table>


<table cellpadding="0" cellspacing="0" width="220">	
    <tr>			
        <td align="center">
            <div style="width:218px; height:0px; border-top:1px solid #333333; overflow:hidden;">	</div>			
        </td>
    </tr>
</table>	


<div style="height:10px; overflow:hidden;"> </div>		

