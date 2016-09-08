<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3" 
>
   <?php include("data/components/_general/breadcrumbs.php"); ?>



    <div class="btn-group" style="margin-right:5px; margin-bottom:7px;">
    
    <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Еще <span class="caret"></span></button>
    <ul class="dropdown-menu pull-left">

    <li>
<a href="<?php echo(GeneralGlobalVars::url);?>/calculator/1">Расчет мощности двигателя</a>
    </li>

    <li>
<a href="<?php echo(GeneralGlobalVars::url);?>/calculator/2">Расчет времени прохождения дистанции 402 м</a>
    </li>  
    
    <li>
<a href="<?php echo(GeneralGlobalVars::url);?>/calculator/3">Расчет rs и степени сжатия мотора</a>
    </li> 	    
    <li>
<a href="<?php echo(GeneralGlobalVars::url);?>/calculator/4">Расчет степени сжатия для турбо мотора</a>
    </li>
    </ul>
    </div>

    
<?php if (GeneralgetVars::$var2==1) { ?>

<span class="lead">
Расчет мощности двигателя
</span>
<table width="100%">
<tr>
<td align="center">








<table border="0" cellpadding="0" cellspacing="0" width="591">
    <tr>
        <td valign="top" width="501">
            <table cellpadding="10" cellspacing="0" width="100%">

                <tr>
                    <td bgcolor="#ffffff">
                        <script language="javascript">

                            function main() {
                                var a = document.equation.a.value;
                                var b = document.equation.b.value;
                                var c = document.equation.c.value;
                                var d = document.equation.d.value;
                                var g = document.equation.g.value;
                                var p = Math.PI;
                                var vd = (a * b * (1 + c / 1) * (g / 2000) * 60);
                                var presult = (vd * 100 / 275);
                                var aresult = (vd);
                                var bresult = (vd * 1 / 42) / d;
                                var fresult = (vd * 1000 / 42) / d / 4;
                                document.result.presult.value = presult;
                                document.result.aresult.value = aresult;
                                document.result.bresult.value = bresult;
                                document.result.fresult.value = fresult;
                            }
                            function cl_all() {
                                document.result.presult.value = "";
                                document.result.aresult.value = "";
                                document.result.bresult.value = "";
                                document.result.fresult.value = "";
                            }
                        </script>
                        <form name="equation">
                            <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="80%">
                                <tr>
                                    <td colspan="3" bgcolor="#ffffff">
                                        <div align="center"><strong>Исходные данные </strong></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="45%">
                                        <div align="right"></div>
                                    </td>
                                    <td width="10%">
                                        <div align="center"></div>
                                    </td>
                                    <td width="45%">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div align="right">Объем двигателя </div>
                                    </td>
                                    <td valign="top">
                                        <div align="center">- </div>
                                    </td>
                                    <td valign="top">
                                        <label><input id="a" maxlength="4" size="3" name="a" value="1.5">литр</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div align="right">Рабочие обороты </div>
                                    </td>
                                    <td valign="top">
                                        <div align="center">- </div>
                                    </td>
                                    <td valign="top">
                                        <label><input id="g" size="3" name="g" value="5600">об/мин</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div align="right">Коеф. наполнения </div>
                                    </td>
                                    <td valign="top">
                                        <div align="center">- </div>
                                    </td>
                                    <td valign="top">
                                        <label><input id="b" maxlength="4" size="3" name="b" value="1.0"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div align="right">Давление наддува </div>
                                    </td>
                                    <td valign="top">
                                        <div align="center">- </div>
                                    </td>
                                    <td valign="top">
                                        <label><input id="c" maxlength="4" size="3" name="c" value="0.0">атм</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <div align="right">Состав смеси </div>
                                    </td>
                                    <td valign="top">
                                        <div align="center">- </div>
                                    </td>
                                    <td valign="top">
                                        <label><input id="d" maxlength="4" size="3" name="d" value="12">кг/кг</label>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <form name="actions">
                            <div align="center" style="padding:10px;">
                                <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="80%">

                                    <tr>
                                        <td width="45%">
                                            <div align="right"><input onclick="cl_all()" name="clear_all" value="Очистить" type="button" class="btn btn-small btn-warning"></div>
                                        </td>
                                        <td width="10%">&nbsp;</td>
                                        <td width="45%"><input onclick="main()" name="calculate" value="Расчитать" type="button" class="btn btn-small btn-success"></td>
                                    </tr>

                                </table>
                            </div>
                        </form>
                        <form name="result">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">

                                <tr>
                                    <td colspan="3" bgcolor="#ffffff">
                                        <div align="center"><strong>Результаты </strong></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff" width="45%">&nbsp;</td>
                                    <td bgcolor="#ffffff" width="10%">&nbsp;</td>
                                    <td bgcolor="#ffffff" width="45%">&nbsp;</td></tr>
                                <tr>
                                    <td bgcolor="#ffffff" valign="top">
                                        <div align="right">Макс. мощность </div>
                                    </td>
                                    <td bgcolor="#ffffff" valign="top">
                                        <div align="center">- </div>
                                    </td>
                                    <td bgcolor="#ffffff" valign="top"><label><input name="presult" size="3" value="92">л.с.</label></td></tr>
                                <tr>
                                    <td bgcolor="#ffffff" valign="top">
                                        <div align="right">Потребление воздуха </div>
                                    </td>
                                    <td bgcolor="#ffffff" valign="top">
                                        <div align="center">- </div>
                                    </td>
                                    <td bgcolor="#ffffff" valign="top"><label><input name="aresult" size="3" value="250">кг/час</label></td></tr>
                                <tr>
                                    <td bgcolor="#ffffff" valign="top">
                                        <div align="right">Произв-сть бензонасоса </div>
                                    </td>
                                    <td bgcolor="#ffffff" valign="top">
                                        <div align="center">- </div>
                                    </td>
                                    <td bgcolor="#ffffff" valign="top"><label><input name="bresult" size="3" value="0.5">литр/мин</label></td></tr>
                                <tr>
                                    <td bgcolor="#ffffff" valign="top">
                                        <div align="right">Произ-cть форсунок </div>
                                    </td>
                                    <td bgcolor="#ffffff" valign="top">
                                        <div align="center">- </div>
                                    </td>
                                    <td bgcolor="#ffffff" valign="top"><input name="fresult" size="3" value="125">мл/мин</td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>








</td>
</tr>
</table>
<?php } 

else if (GeneralgetVars::$var2==2) { ?>

<span class="lead">
Расчет времени прохождения дистанции 402 м
</span>
<table width="100%">
<tr>
<td align="center">






<table border="0" cellpadding="0" cellspacing="0" width="591">

    <tr>
        <td valign="top" width="501">
            <table cellpadding="10" cellspacing="0" width="100%">

                <tr>
                    <td bgcolor="#ffffff">
                        <script language="javascript">

                            function main() {
                                var a = document.equation.a.value;
                                var b = document.equation.b.value;
                                var c = document.equation.c.value;
                                var d = document.equation.d.value;
                                var g = document.equation.g.value;
                                var p = Math.PI;
                                var vd = d / (a / 1 + g / 1 + b * 73 / 100 + c * 73 / 15);
                                var presult = 101 / 100 / vd;
                                var aresult = 246 / 100 / vd;
                                var bresult = Math.pow(518 / vd, 1 / 3);
                                var fresult = 2322 / Math.pow(518 / vd, 1 / 3);
                                document.result.presult.value = presult;
                                document.result.aresult.value = aresult;
                                document.result.bresult.value = bresult;
                                document.result.fresult.value = fresult;
                            }
                            function cl_all() {
                                document.result.presult.value = "";
                                document.result.aresult.value = "";
                                document.result.bresult.value = "";
                                document.result.fresult.value = "";
                            }
                        </script>
                        <form name="equation">
                            <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="80%">
                                <tr>
                                    <td colspan="3" bgcolor="#ffffff">

                                        <div align="center"><strong>Исходные данные </strong></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="45%" valign="top">
                                        <div align="right"></div>
                                    </td>
                                    <td width="10%" valign="top">
                                        <div align="center"></div>
                                    </td>
                                    <td width="45%" valign="top">&nbsp;</td></tr>
                                <tr>
                                    <td valign="top">
                                        <div align="right">Масса авто </div>
                                    </td>
                                    <td valign="top">
                                        <div align="center">- </div>
                                    </td>
                                    <td valign="top"><label><input id="a" maxlength="4" size="3" name="a" value="950">кг</label></td></tr>
                                <tr valign="top">
                                    <td>
                                        <div align="right">Масса пилота </div>
                                    </td>
                                    <td>
                                        <div align="center">- </div>
                                    </td>
                                    <td><label><input id="g" size="3" name="g" value="80">кг</label></td></tr>
                                <tr valign="top">
                                    <td>
                                        <div align="right">Объем топлива </div>
                                    </td>
                                    <td>
                                        <div align="center">- </div>
                                    </td>
                                    <td><label><input id="b" maxlength="4" size="3" name="b" value="14">литр</label></td></tr>
                                <tr valign="top">
                                    <td>
                                        <div align="right">Масса маховика </div>
                                    </td>
                                    <td>
                                        <div align="center">- </div>
                                    </td>
                                    <td><label><input id="c" maxlength="4" size="3" name="c" value="7.9">кг</label></td></tr>
                                <tr valign="top">
                                    <td>
                                        <div align="right">Мощность мотора </div>
                                    </td>
                                    <td>
                                        <div align="center">- </div>
                                    </td>
                                    <td><label><input id="d" maxlength="4" size="3" name="d" value="79">л.с.</label></td></tr>


                            </table>
                        </form>
                        <form name="actions">
                            <div align="center" style="padding:10px;">
                                <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="80%">

                                    <tr>
                                        <td width="45%">
                                            <div align="right"><input onclick="cl_all()" name="clear_all" value="Очистить" type="button" class="btn btn-small btn-warning"></div>
                                        </td>
                                        <td width="10%">&nbsp;</td>
                                        <td width="45%"><input onclick="main()" name="calculate" value="Расчитать" type="button" class="btn btn-small btn-success"></td>
                                    </tr>

                                </table>
                            </div>
                        </form>
                        <form name="result">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">

                                <tr>
                                    <td colspan="3" bgcolor="#ffffff">
                                        <div class="style4" align="center">
                                            <div align="center"><strong>Результаты </strong></div><strong>
                                            </strong></div><strong>
                                            <div align="center"></div>
                                        </strong></td></tr>
                                <tr valign="top">
                                    <td bgcolor="#ffffff" width="45%">&nbsp;</td>
                                    <td bgcolor="#ffffff" width="10%">&nbsp;</td>
                                    <td bgcolor="#ffffff" width="45%">&nbsp;</td></tr>
                                <tr valign="top">
                                    <td bgcolor="#ffffff">
                                        <div align="right">Разгон до 100км/ч. </div>
                                    </td>
                                    <td bgcolor="#ffffff">
                                        <div align="center">- </div>
                                    </td>
                                    <td bgcolor="#ffffff"><label><input name="presult" size="3" value="13,8">сек</label></td></tr>
                                <tr valign="top">
                                    <td bgcolor="#ffffff">
                                        <div align="right">Разгон до 160км/ч. </div>
                                    </td>
                                    <td bgcolor="#ffffff">
                                        <div align="center">- </div>
                                    </td>
                                    <td bgcolor="#ffffff"><label><input name="aresult" size="3" value="33,6">сек</label></td></tr>
                                <tr valign="top">
                                    <td bgcolor="#ffffff">
                                        <div align="right">Время на 402м </div>
                                    </td>
                                    <td bgcolor="#ffffff">
                                        <div align="center">- </div>
                                    </td>
                                    <td bgcolor="#ffffff"><label><input name="bresult" size="3" value="19,2">сек</label></td></tr>
                                <tr valign="top">
                                    <td bgcolor="#ffffff">
                                        <div align="right">Скорость на 402м </div>
                                    </td>
                                    <td bgcolor="#ffffff">
                                        <div align="center">- </div>
                                    </td>
                                    <td bgcolor="#ffffff"><input name="fresult" size="3" value="121">км/ч</td>
                                </tr>

                            </table>
                        </form>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>









</td>
</tr>
</table>
<?php } 



else if (GeneralgetVars::$var2==3) { ?>

<span class="lead">
Расчет rs и степени сжатия мотора
</span>
<table width="100%">
<tr>
<td align="center">








<table border="0" cellpadding="0" cellspacing="0" width="591">

        <tr>
            <td valign="top" width="501">
            <table cellpadding="10" cellspacing="0" width="100%">
                <tbody>
                    <tr>
                        <td bgcolor="#ffffff">
                        <script language="javascript">

function main()  {
	var a = document.equation.a.value;
	var b = document.equation.b.value;
	var c = document.equation.c.value;
	var d = document.equation.d.value;
	var e = document.equation.e.value;
	var f = document.equation.f.value;
	var g = document.equation.g.value;
	var h = document.equation.h.value;
	var p = Math.PI;
	var vd = (p*(b/20)*(b/20))*((d/10)+(f/10));
	var vr = vd+c/1+e/1;
	var vresult = ((p*(b/20)*(b/20))*(a/10))*h;
	var dresult = (vresult/h+vr)/vr;
	var rsresult = g/a;
	document.result.vresult.value = vresult;
	document.result.dresult.value = dresult;
	document.result.rsresult.value = rsresult;
	}
	function cl_all()  {
	document.result.vresult.value = "";
	document.result.dresult.value = "";
	document.result.rsresult.value = "";
	}
	</script>
                        <form name="equation">
                            <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="80%">
                                <tr>
                                        <td colspan="3" bgcolor="#ffffff">
                                        
                                        <div align="center"><strong>Исходные данные </strong></div>
										
                                       </td>
									   </tr>
                                     <tr valign="top">
                                        <td width="45%">
                                        <div align="right"></div>
                                        </td>
                                        <td width="10%">
                                        <div align="center"></div>
                                        </td>
                                        <td width="45%">&nbsp;</td></tr>
                                    <tr valign="top">
                                        <td>
                                        <div align="right">Ход поршня </div>
                                        </td>
                                        <td>
                                        <div align="center">- </div>
                                        </td>
                                        <td><label><input id="a" maxlength="4" size="3" name="a" value="71.0">мм</label></td></tr>
                                    <tr valign="top">
                                        <td>
                                        <div align="right">Длина шатуна </div>
                                        </td>
                                        <td>
                                        <div align="center">- </div>
                                        </td>
                                        <td><input id="g" size="3" name="g" value="121">мм</td></tr>
                                    <tr valign="top">
                                        <td>
                                        <div align="right">Диаметр цилиндра </div>
                                        </td>
                                        <td>
                                        <div align="center">- </div>
                                        </td>
                                        <td><label><input id="b" maxlength="4" size="3" name="b" value="82.0">мм</label></td></tr>
                                    <tr valign="top">
                                        <td>
                                        <div align="right">Объем камеры в поршне </div>
                                        </td>
                                        <td>
                                        <div align="center">- </div>
                                        </td>
                                        <td><label><input id="c" maxlength="4" size="3" name="c" value="12.5">см*3</label></td></tr>
                                    <tr valign="top">
                                        <td>
                                        <div align="right">Недоход поршня </div>
                                        </td>
                                        <td>
                                        <div align="center">- </div>
                                        </td>
                                        <td><label><input id="d" maxlength="4" size="3" name="d" value="0.2">мм</label>
										</td>
									</tr>
                                    <tr valign="top">
                                        <td>
                                        <div align="right">Объем камеры в ГБЦ </div>
                                        </td>
                                        <td>
                                        <div align="center">- </div>
                                        </td>
                                        <td><label><input id="e" maxlength="4" size="3" name="e" value="23.0">см*3</label></td></tr>
                                    <tr valign="top">
                                        <td>
                                        <div align="right">Толщина прокладки </div>
                                        </td>
                                        <td>
                                        <div align="center">- </div>
                                        </td>
                                        <td><label><input id="f" maxlength="3" size="3" name="f" value="1.2">мм</label></td></tr>
                                    <tr valign="top">
                                        <td>
                                        <div align="right">Количество цилиндров </div>
                                        </td>
                                        <td>
                                        <div align="center">- </div>
                                        </td>
                                        <td><span class="style5"><label><input id="h" size="3" name="h" value="4">шт</label></span></td>
                                    </tr>
                             
                            </table>
                        </form>
                        <form name="actions">
                            <div align="center" style="padding:10px;">
                            <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="80%">
                              
                                    <tr>
                                        <td width="45%">
                                        <div align="right"><input onclick="cl_all()" name="clear_all" value="Очистить" type="button" class="btn btn-small btn-warning"></div>
                                        </td>
                                        <td width="10%">&nbsp;</td>
                                        <td width="45%"><input onclick="main()" name="calculate" value="Расчитать" type="button" class="btn btn-small btn-success"></td>
                                    </tr>
                               
                            </table>
                            </div>
                        </form>
                        <form name="result">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                           
                                    <tr>
                                        <td colspan="3" bgcolor="#ffffff">
                                            <div align="center"><strong>Результаты </strong></div>
										</td>
									</tr>
                                    <tr valign="top">
                                        <td bgcolor="#ffffff" width="45%">&nbsp;</td>
                                        <td bgcolor="#ffffff" width="10%">&nbsp;</td>
                                        <td bgcolor="#ffffff" width="45%">&nbsp;</td></tr>
                                    <tr valign="top">
                                        <td bgcolor="#ffffff">
                                        <div align="right">Объем двигателя </div>
                                        </td>
                                        <td bgcolor="#ffffff">
                                        <div align="center">- </div>
                                        </td>
                                        <td bgcolor="#ffffff"><label><input name="vresult" size="3" value="1499">см*3</label></td></tr>
                                    <tr valign="top">
                                        <td bgcolor="#ffffff">
                                        <div align="right">Степень сжатия </div>
                                        </td>
                                        <td bgcolor="#ffffff">
                                        <div align="center">- </div>
                                        </td>
                                        <td bgcolor="#ffffff"><label><input name="dresult" size="3" value="9.80">/1</label></td></tr>
                                    <tr valign="top">
                                        <td bgcolor="#ffffff">
                                        <div align="right">Rod/Stroke </div>
                                        </td>
                                        <td bgcolor="#ffffff">
                                        <div align="center">- </div>
                                        </td>
                                        <td bgcolor="#ffffff"><input name="rsresult" size="3" value="1.71"></td>
                                    </tr>
                             
                            </table>
                        </form>
                        </td>
                    </tr>
 
            </table>
            </td>
        </tr>

</table>








</td>
</tr>
</table>
<?php } 

else if (GeneralgetVars::$var2==4) { ?>

<span class="lead">
Расчет степени сжатия для турбо мотора
</span>
<table width="100%">
<tr>
<td align="center">








<table border="0" cellpadding="0" cellspacing="0" width="591">

        <tr>
            <td valign="top" width="501">
            <table cellpadding="10" cellspacing="0" width="100%">
        
                    <tr>
                        <td bgcolor="#ffffff">
                        <script language="javascript">

function main()  {
	var a = document.equation.a.value;
	var b = document.equation.b.value;
	var c = document.equation.c.value;
	var d = document.equation.d.value;
	var e = document.equation.e.value;
	var f = document.equation.f.value;
	var p = Math.PI;
	var vd = (p*(b/20)*(b/20))*(d/10);
	var vr = vd+c/1+e/1;
	var vresult = (p*(b/20)*(b/20))*(a/10)*4;
	var i = (1+f/1);
	var sresult = ((vresult/4+vr)/vr);
	var stresult = ((vresult/4+vr)/vr)*Math.sqrt(1+f/1);
	document.result.vresult.value = vresult;
	document.result.sresult.value = sresult;
	document.result.stresult.value = stresult;
	}
	function cl_all()  {
	document.result.vresult.value = "";
	document.result.sresult.value = "";
	document.result.stresult.value = "";
	}
	</script>

            <form name="equation">
            <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="80%">
          
              <tr>
                <td colspan="3" bgcolor="#ffffff">
                  
                  <div align="center"><strong>Исходные данные </strong></div>
				  
				  </td></tr>
              <tr valign="top">
                <td width="45%">
                  <div align="right"></div></td>
                <td width="10%">
                  <div align="center"></div></td>
                <td width="45%">&nbsp;</td>
				</tr>
              <tr valign="top">
                <td>
                  <div align="right">Ход поршня </div></td>
                <td>
                  <div align="center">- </div></td>
                <td><label><input id="a" maxlength="4" size="3" value="71.0" name="a">мм</label></td></tr>
              <tr valign="top">
                <td>
                  <div align="right">Диаметр цилиндра </div></td>
                <td>
                  <div align="center">- </div></td>
                <td><label><input id="b" maxlength="4" size="3" value="82.0" name="b">мм</label></td></tr>
              <tr valign="top">
                <td>
                  <div align="right">Объем камеры в поршне </div></td>
                <td>
                  <div align="center">- </div></td>
                <td><label><input id="c" maxlength="4" size="3" value="12.5" name="c">см*3</label></td></tr>
              <tr valign="top">
                <td>
                  <div align="right">Прокладка + недоход </div></td>
                <td>
                  <div align="center">- </div></td>
                <td><label><input id="d" maxlength="4" size="3" value="1.4" name="d">мм</label></td></tr>
              <tr valign="top">
                <td>
                  <div align="right">Объем камеры в ГБЦ </div></td>
                <td>
                  <div align="center">- </div></td>
                <td><label><input id="e" maxlength="4" size="3" value="23.0" name="e">см*3</label></td></tr>
              <tr valign="top">
                <td>
                  <div align="right">Давление надува </div></td>
                <td>
                  <div align="center">- </div></td>
                <td><label><input id="f" maxlength="3" size="3" value="0.0" name="f">атм</label></td>
				</tr>              
	    </table></form>
            <form name="actions">
            <div align="center" style="padding:10px;">
            <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="80%">
           
              <tr>
                <td width="45%">
                  <div align="right"><input onclick="cl_all()" value="Очистить" name="clear_all" type="button" class="btn btn-small btn-warning"></div></td>
                <td width="10%">&nbsp;</td>
                <td width="45%"><input onclick="main()" value="Расчитать" name="calculate" type="button" class="btn btn-small btn-success"></td></tr></table></div></form>
            <form name="result">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
          
              <tr>
                <td colspan="3" bgcolor="#ffffff">                  
                  <div align="center"><strong>Результаты </strong></div>
				  </td>
				  </tr>
              <tr valign="top">
                <td bgcolor="#ffffff" width="45%">&nbsp;</td>
                <td bgcolor="#ffffff" width="10%">&nbsp;</td>
                <td bgcolor="#ffffff" width="45%">&nbsp;</td></tr>
              <tr valign="top">
                <td bgcolor="#ffffff">
                  <div align="right">Объем двигателя </div></td>
                <td bgcolor="#ffffff">
                  <div align="center">- </div></td>
                <td bgcolor="#ffffff"><label><input size="3" value="1499" name="vresult">см*3</label></td></tr>
              <tr valign="top">
                <td bgcolor="#ffffff">
                  <div align="right">Степень сжатия </div></td>
                <td bgcolor="#ffffff">
                  <div align="center">- </div></td>
                <td bgcolor="#ffffff"><label><input size="3" value="9.80" name="sresult">/1</label></td></tr>
              <tr valign="top">
                <td bgcolor="#ffffff">
                  <div align="right">Степень Турбо </div></td>
                <td bgcolor="#ffffff">
                  <div align="center">- </div></td>
                 
               <td bgcolor="#ffffff"><input name="stresult" size="3" value="">/1</td>
                                    </tr>
                             
                            </table>
                        </form>
                        </td>
                    </tr>
        
            </table>
            </td>
        </tr>
    </tbody>
</table>





</td>
</tr>
</table>
<?php } 

?>








    
    

















</div>