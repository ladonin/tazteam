<?PHP 
ini_set('display_errors', 1); 
error_reporting(E_ALL);

for ($i=1; $i<10000000; $i++){
$v=1;
}



		$subject="Команда TAZTEAM поз33333333дравляет своих участников с Новым Годом!";
		$header="From: instorage.org/portfolio/tazteam <ladonin85@gmail.com>";
		$header.="\nContent-type: text/html; charset=\"UTF-8\""; 
		$text="<HTML>\r\n";
		$text.="<HEAD>\r\n";
		$text.="<META http-equiv=Content-Type content='text/html; charset=UTF-8'>\r\n";
		$text.="</HEAD>\r\n";
		$text.="<BODY>\r\n";
		$text.="<b style='font-size:15px; color:#333333;'>Уважаемый, Ладонин!</b>";			
$text.="
	<table cellpadding='0' cellspacing='0' width='100%'><tr><td height='10' align='left'></td></tr></table>
	<b style='font-size:17px; color:#2360aa;'>Команда TAZTEAM от души поздравляет Вас с наступающим Новым годом!</b>
<table cellpadding='0' cellspacing='0' width='100%'><tr><td height='10' align='left'></td></tr></table>
	<span style='font-size:13px; color:#333333;'>Желаем здоровья Вам и Вашим близким!</span><br>
	<span style='font-size:13px; color:#333333;'>Новых успехов в Ваших делах!</span><br>
	<span style='font-size:13px; color:#333333;'>И, конечно, ровных и безопасных дорог без гаишников!</span>
<table cellpadding='0' cellspacing='0' width='100%'><tr><td height='10' align='left'></td></tr></table>
<img src='http://mapstore.org/my_portfolio/tazteam.net/ng.png' width='460' height='346' style='border:0px;'>	
<table cellpadding='0' cellspacing='0' width='100%'><tr><td height='10' align='left'></td></tr></table>
<b style='font-size:13px; color:#333333;'>Ни гвоздя, ни жезла в Новом году!</b>
<table cellpadding='0' cellspacing='0' width='100%'><tr><td height='10' align='left'></td></tr></table>
<font style='font-size:12px;'>С уважением, команда <a href='http://mapstore.org/my_portfolio/tazteam.net'>tazteam</a></font>
</BODY>
</HTML>";
//mail('ladonin85@mail.ru', $subject, $text, $header, '-f administration@instorage.org/portfolio/tazteam');																									
//mail('alexander.ladonin@yandex.ru', $subject, $text, $header, '-f administration@instorage.org/portfolio/tazteam');																	
mail('ladonin85@mail.ru', $subject, $text, $header, '-f ladonin85@gmail.com');	


	?>



fbgnng

