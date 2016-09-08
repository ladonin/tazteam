<?php
//ini_set("memory_limit","1024M");//ООП НОВЫЙ КОД задаем параметр сервера для зашрузки файлов большого размера
$start=microtime(1);//для проверки скорости//////////////////////////////////////

require("data/models/_general/GlobalVars.php");//библиотека глобальных переменных сервера
require("data/models/_general/MySQL.php");//функции и глобальные переменные MySQL
require("data/models/_general/PageBasic.php");//базовая библиотека для работы внешне со страницей
require("data/models/_general/Cookies.php");//базовая библиотека работы с куками
require("data/models/_general/Security.php");//базовая библиотека работы с введенными данными
require("data/models/_general/GetVars.php");//проверка входящих GET-переменных
require("data/models/_general/Date.php");//работа с датами
require("data/models/_general/Robot.php");//автоработы
require("data/models/_general/PageTree.php");//проверка на существование страницы и в случае существования - определение "дерева" нахождения страницы
require("data/models/_general/ImagesPreload.php");//предварительная подгрузка скрытых картинок
require("data/models/_general/UserName.php");//показывает имена пользоватетелей (работает быстрее sql-функции в 4 раза)
require("data/models/_general/Directories.php");//функции для определения директории и работы с директориями, а также определение номера таблицы в базе данных
require("data/models/users/MyData.php");//базовая библиотека работы с Вами
require("data/models/users/Base.php");
require("data/models/users/Mail.php");//базовая библиотека работы с почтой

GeneralPageBasic::$pagestatus="view";//просмотр
$current_var1="";//вспомогательная переменная
$current_var2="";//вспомогательная переменная
$current_var3="";//вспомогательная переменная
$current_var4="";//вспомогательная переменная
$current_var5="";//вспомогательная переменная
$current_var6="";//вспомогательная переменная
$current_var7="";//вспомогательная переменная
$cv1="";//вспомогательная переменная (маленькая)
$cv2="";//вспомогательная переменная (маленькая)
$cv3="";//вспомогательная переменная (маленькая)
$cv4="";//вспомогательная переменная (маленькая)
$cv5="";//вспомогательная переменная (маленькая)
$cv6="";//вспомогательная переменная (маленькая)
$cv7="";//вспомогательная переменная (маленькая)

$MSQLc=GeneralMYSQL::connect(1);//подключаемся к  основной ДБ как root
mysqli_query($MSQLc,'SET NAMES UTF8');//на время
GeneralGlobalVars::set();//устанавливаем глобальные переменные
GeneralGetVars::revision($MSQLc);
GeneralGetVars::save_page_url_in_cookies();//потому что куки рядом с гет переменными видны только на одну перезагрузку, поэтому отдельно

if (GeneralGetVars::$var1){
	include_once("data/models/".GeneralGetVars::$var1."/Base.php");}//базовая библиотека для конкретной страницы
if ((GeneralGetVars::$var3==="photoalbums")||(GeneralGetVars::$var3==="allphotosinalbum")){
	include_once("data/models/".GeneralGetVars::$var1."/PhotoalbumsBase.php");}//базовая библиотека для конкретной страницы	

GeneralSecurity::cookiescontrol($MSQLc);
UsersMyData::identification($MSQLc);	
GeneralPageTree::setvars($MSQLc);//глобальные переменные дерева сайта (наличие страницы, адрес страницы по названиям)

//подгружаем индивидуальные библиотеки
if (UsersMyData::$identified==1) 	{include("data/lists/".GeneralPageTree::$url."_php_library_reg.php");}
else								{include("data/lists/".GeneralPageTree::$url."_php_library_noreg.php");}
//GeneralPagebasic::detect_scroll();//определеяем прокрутку на странице

if (UsersMyData::$id==1){
	//UsersMyData::$id=11615;
	ini_set('display_errors', 1); /////////////////////////////
	error_reporting(E_ALL);}///////////////////////////////////

	
    global $sape;
    if (!defined('_SAPE_USER')){
        define('_SAPE_USER', '63be95b0a8be9cc6a40e391fbaa23491');
    }
    require_once(realpath($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'));
	
	
   $o['charset'] = 'UTF-8';
   $sape = new SAPE_client($o);
   unset($o);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo(GeneralPageTree::$title);?></title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="google-site-verification" content="rr8h6e4jsB36N_h5CoBupN3LUXna2DhtOYHg_9nzEKw">
<meta name='yandex-verification' content='7c2a3a7e1b6dfd6b' />
<meta name="verify-admitad" content="22fe08fc94" />
<meta name="4d88a69ce36aad5b651e142429b1f5f9" content="">
<link rel="icon" href="http://mapstore.org/my_portfolio/tazteam.net/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://mapstore.org/my_portfolio/tazteam.net/favicon.ico" type="image/x-icon">
<link rel="icon" href="" type="image/x-icon">
<link rel="shortcut icon" href="" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="http://mapstore.org/my_portfolio/tazteam.net/css/_general/carcas.css">
<link rel="stylesheet" type="text/css" href="http://mapstore.org/my_portfolio/tazteam.net/css/_general/text.css">
<link rel="stylesheet" type="text/css" href="http://mapstore.org/my_portfolio/tazteam.net/css/index/carcas.css">
<link rel="stylesheet" type="text/css" href="http://mapstore.org/my_portfolio/tazteam.net/css/index/text.css">
<?php if (GeneralGetVars::$var1) {?>
<link rel="stylesheet" type="text/css" href="http://mapstore.org/my_portfolio/tazteam.net/css/<?php echo(GeneralGetVars::$var1);?>/carcas.css">
<link rel="stylesheet" type="text/css" href="http://mapstore.org/my_portfolio/tazteam.net/css/<?php echo(GeneralGetVars::$var1);?>/text.css">
<?php } ?>
<script type='text/javascript' src='http://mapstore.org/my_portfolio/tazteam.net/js/functions/_general/jquery/jquery.min.js'></script>
<script type='text/javascript' src='http://mapstore.org/my_portfolio/tazteam.net/js/functions/_general/general___images_preload.js'></script>
<script type='text/javascript' src='http://mapstore.org/my_portfolio/tazteam.net/js/functions/_general/general___swim.js'></script>
<script type='text/javascript' src='http://mapstore.org/my_portfolio/tazteam.net/js/functions/_general/general___scroll.js'></script>
<script type='text/javascript' src='http://mapstore.org/my_portfolio/tazteam.net/js/functions/_general/general___ajax.js'></script>
<script type='text/javascript' src='http://mapstore.org/my_portfolio/tazteam.net/js/functions/_general/general___textarea.js'></script>
<script type='text/javascript' src='http://mapstore.org/my_portfolio/tazteam.net/js/functions/_general/general___send_to_server.js'></script>
<script type='text/javascript' src='http://mapstore.org/my_portfolio/tazteam.net/js/functions/_general/general___brousers.js'></script>
<script type='text/javascript' src='http://mapstore.org/my_portfolio/tazteam.net/js/functions/_general/jquery/jquery.cookie.js'></script>
<?php if (UsersMyData::$identified==1){ ?>
<script type='text/javascript' src='http://mapstore.org/my_portfolio/tazteam.net/js/functions/_general/general___signature.js'></script>
<?php } 
include("data/lists/".GeneralPageTree::$url."_js.txt"); //подгрузка списка подключаемых  js файлов ?>
<link type="text/css" rel="stylesheet" href="http://is.mixmarket.biz/css/uni/partner.css">
</head>

<body onLoad="" style="background-image: url(http://mapstore.org/my_portfolio/tazteam.net/images/index/background.png);
background-repeat:repeat;">
<?php
GeneralPageBasic::$general_width_blocks_in_list="50%";
GeneralPageBasic::$general_width_div_in_block_in_list="250px";
GeneralPageBasic::$general_width_table_for_gallery="25%";
?>
<script type="text/javascript">
window_width=918;
width_left_panel=0;
window_site_body_width=window_width;
</script>
<?php include("js/scripts/_general/sizes/detect_sizes.php"); //определяем ширину окна пользователя ?>
<script type="text/javascript">
timeserver=<?php echo(GeneralGlobalVars::$timeunix);?>;
<?php if (UsersMyData::$identified==1){ ?>
	$(document).ready(function(){
		general___signature_ajax('<?php echo(GeneralGetVars::$var1);?>','<?php echo(GeneralGetVars::$var2);?>','<?php echo(GeneralGetVars::$var3);?>','<?php echo(GeneralGetVars::$var4);?>','<?php echo(GeneralGetVars::$num_page);?>');
		general___signature('<?php echo(GeneralGetVars::$var1);?>','<?php echo(GeneralGetVars::$var2);?>','<?php echo(GeneralGetVars::$var3);?>','<?php echo(GeneralGetVars::$var4);?>','<?php echo(GeneralGetVars::$num_page);?>');});
<?php } ?>
</script>



	<table cellpadding="0" cellspacing="0" width="100%" border="0" style="background-image: url(http://mapstore.org/my_portfolio/tazteam.net/images/index/background.png); background-repeat:repeat;">
	<tr>
	<td width="40%" height="0"> 
	</td>
	<td align="center" width="928">	
	</td>
	<td width="40%" height="0"> 
	</td>	
	</tr>	
	
	
	<tr>
	<td width="40%" title="перемотка вверх" style="cursor:pointer;" onclick="jQuery('html,body').animate({'scrollTop': 0}, 1);"> 
	</td>







<td align="center" width="928">

		<table cellpadding="0" cellspacing="0" width="100%" style="background-image:url(http://mapstore.org/my_portfolio/tazteam.net/images/index/index___top_fon.png); background-repeat:repeat;">
		<tr>
		<td align="left" valign="top" width="190">
			<a href="<?php echo(GeneralGlobalVars::url);?>" class="logotext"><img src="<?php echo(GeneralGlobalVars::url);?>/images/index/index___logotype.png" width="190" height="33"></a>
		</td>
		<td valign="middle" align="right">
		<div class="padding_right_20">

			<div class="padding_left_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/calculator" class="link_normal_white">Калькулятор</a>
			</div>
			<div class="padding_left_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/users" class="link_normal_white">Участники</a>
			</div>				
			<div class="padding_left_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/forum" class="link_normal_white">Форум</a>
			</div>			
			<div class="padding_left_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/photo" class="link_normal_white">Галерея</a>
			</div>				
			<div class="padding_left_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/photo/1=1" class="link_normal_white">ТОП</a>
			</div>
			<div class="padding_left_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/articles" class="link_normal_white">Статьи</a>
			</div>
			<div class="padding_left_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/news" class="link_normal_white">Новости</a>
			</div>
			<div class="padding_left_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/automarket" class="link_normal_white">Авторынок</a>
			</div>
			<div class="padding_left_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/video" class="link_normal_white">Видео</a>
			</div>
			<div class="padding_left_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/shop" class="link_normal_white">Автозвук</a>
			</div>
			<div class="padding_left_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>" class="link_normal_white">Главная</a>	
			</div>
			<div style="clear:both;"> </div>	
		</div>
		<div style="clear:both;"> </div>
		</td>
		</tr>
		</table>		

		<table cellpadding="0" cellspacing="0" width="100%">		
		<tr>
		<td valign="top" align="left" bgcolor="#ffffff">
			<div class="padding_left_10">
			<?php include("data/components/_general/top_panel.php");	?>
			</div>
		</td>
		</tr>
		</table>		
		
		<table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
		<tr>
		<td valign="middle" align="left" class="padding_left_20"><div class="v_i_b"></div>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- квадрат 160х90 -->
			<ins class="adsbygoogle"
				 style="display:inline-block;width:160px;height:90px"
				 data-ad-client="ca-pub-2975914903311715"
				 data-ad-slot="9956949077"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script><div class="v_i_b"></div>
		</td>
		<td valign="middle" align="right"  class="padding_right_20">
			<div class="v_i_b"></div>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- 728х90 автомобили -->
			<ins class="adsbygoogle"
				 style="display:inline-block;width:728px;height:90px"
				 data-ad-client="ca-pub-2975914903311715"
				 data-ad-slot="6278139074"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script><div class="v_i_b"></div>
		</td>
		</tr>
		</table>
		
	

		<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
		<td valign="top" align="left" bgcolor="#ffffff"><div class="v_i_b"></div>	
			<div class="padding_left_10">
			<?php 
			if (GeneralPageTree::$enable==1) {include("data/views/".GeneralPageTree::$url.".php");}
			?><div class="v_i_b"></div>	
			</div>
		</td>
		</tr>
		</table>			

		<table cellpadding="0" cellspacing="0" width="100%">		
		<tr>
		<td valign="top" align="left" bgcolor="#ffffff">
			<div class="v_i_b"></div>
			<div class="v_i_b"></div>




			<div class="padding_left_20" style="float:left;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/users/155" class="link_normal">Администрация</a>
			</div>
			<div class="padding_left_10" style="float:left;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/users/1" class="link_normal">Разработка сайта</a>
			</div>
			<div class="padding_left_10" style="float:left;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/users/1" class="link_normal">Рекламодателям</a>
			</div>
			
			
			
			<div class="padding_right_20" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/map" class="link_normal">Карта сайта</a>
			</div>			
			<div class="padding_right_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/mapnews" class="link_normal">Новости</a>
			</div>			
			<div class="padding_right_10" style="float:right;">
				<a href="<?php echo(GeneralGlobalVars::url);?>/maparticles" class="link_normal">Статьи</a>
			</div>
			
			<div class="padding_right_10" style="float:right;">
				<a href="http://instorage.org" class="link_normal">instorage.org</a>
			</div>			
			
			
			
			<div style="clear:both;"> </div>				
		

		
		
		
		
		
			<div class="v_i_b"></div>	







			
			<div class="padding_left_10">
<script type="text/javascript" src="//yandex.st/share/share.js"
charset="utf-8"></script>
<div class="yashare-auto-init" data-yashareL10n="ru"
 data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,gplus"

></div> 
</div>	
		
			
			
	<div class="padding_left_20"><div class="v_i_b"></div>			
				<?php
				if (UsersMyData::$id==1){
				?>
				<!--LiveInternet counter--><script type="text/javascript"><!--
				document.write("<a href='http://www.liveinternet.ru/click' "+
				"target=_blank><img src='//counter.yadro.ru/hit?t29.1;r"+
				escape(document.referrer)+((typeof(screen)=="undefined")?"":
				";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
				screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
				";"+Math.random()+
				"' alt='' title='LiveInternet: показано количество просмотров и"+
				" посетителей' "+
				"border='0' width='88' height='120'><\/a>")
				//--></script><!--/LiveInternet-->
				<?php
				}
				else {
				?>
				<!--LiveInternet counter--><script type="text/javascript"><!--
				document.write("<a href='http://www.liveinternet.ru/click' "+
				"target=_blank><img src='//counter.yadro.ru/hit?t45.1;r"+
				escape(document.referrer)+((typeof(screen)=="undefined")?"":
				";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
				screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
				";"+Math.random()+
				"' alt='' title='LiveInternet' "+
				"border='0' width='31' height='31'><\/a>")
				//--></script><!--/LiveInternet-->
				<?php
				}?>			
			</div>	
<div class="v_i_b"></div>	
















			
			
			
			<?php





			if (GeneralGetvars::$var1!=="shop"){		?>
			
			<div class="padding_left_20 padding_right_20"><div class="panel">Барахло</div></div>
			<div class="v_i_b"></div>			
			
			<div class="padding_left_10">
			<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td align="left" valign="top"  width="50%">
				<div id="mixkt_4294911575"></div>
				<div class="v_i_b"></div>	
				<div id="mixkt_4294917820"></div>
			</td>
			<td align="left" valign="top"  width="50%">
			<div class="padding_right_10">
				<div id="mixkt_4294910437"></div>
				<div class="v_i_b"></div>	
				<div id="mixkt_4294910435"></div>
				</div>
			</td>
			</tr>
			</table>
			</div>
			<div class="v_i_b"></div>
<script>
document.write('<scr' + 'ipt language="javascript" type="text/javascript" src="http://4294911575.kt.mixmarket.biz/show/4294911575/?div=mixkt_4294911575&r=' + escape(document.referrer) + '&rnd=' + Math.round(Math.random() * 100000) + '" charset="UTF-8"><' + '/scr' + 'ipt>');
document.write('<scr' + 'ipt language="javascript" type="text/javascript" src="http://4294917820.kt.mixmarket.biz/show/4294917820/?div=mixkt_4294917820&r=' + escape(document.referrer) + '&rnd=' + Math.round(Math.random() * 100000) + '" charset="UTF-8"><' + '/scr' + 'ipt>');
document.write('<scr' + 'ipt language="javascript" type="text/javascript" src="http://4294910435.kt.mixmarket.biz/show/4294910435/?div=mixkt_4294910435&r=' + escape(document.referrer) + '&rnd=' + Math.round(Math.random() * 100000) + '" charset="UTF-8"><' + '/scr' + 'ipt>');
document.write('<scr' + 'ipt language="javascript" type="text/javascript" src="http://4294910437.kt.mixmarket.biz/show/4294910437/?div=mixkt_4294910437&r=' + escape(document.referrer) + '&rnd=' + Math.round(Math.random() * 100000) + '" charset="UTF-8"><' + '/scr' + 'ipt>');
</script>			
			
			
			
			
			
			
			
			
			
			<?php } ?>
			
			
			
			
		
				
				
				
				<script type="text/javascript">
<!--
if (uni_tracker_shown===undefined || mix_tracker_shown===undefined){document.write('<img src="http://mixmarket.biz/t.php?uid=1294945932&id=3560756&r=' + escape(document.referrer) + '&t=' + (new Date()).getTime() + '" width="1" height="1"/>');var uni_tracker_shown=true;var mix_tracker_shown=true;}
//-->
</script>
<noscript><img src="http://mixmarket.biz/t.php?uid=1294945932&amp;id=3560756" width="1" height="1" alt=""/></noscript>
				
	
			<div class="v_i_b"></div>
			<?php
			global $sape;
			echo $sape->return_links(3);
			?>
			<div class="v_i_b"></div>		
		</td>
		</tr>
		</table>
	

</td>
	<td width="40%" style="cursor:pointer;" title="перемотка вниз" onclick="jQuery('html,body').animate({'scrollTop': 1000000}, 1);"> 
	</td>
</tr>
</table>

<script type="text/javascript">
jQuery(document).ready(function(){
	general___preload_images([<?php echo(GeneralImagesPreload::output()); ?>]);});
</script>

</body>
</html>
<?php
GeneralMYSQL::close($MSQLc);
 ?><B><?PHP echo (round((microtime(1)-$start), 5)); ?></B> <?php  ?>