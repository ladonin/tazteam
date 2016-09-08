<?php
	ini_set('display_errors', 1); /////////////////////////////
	error_reporting(E_ALL);
$hostname = "localhost";
$username = "root";
$passwordSQL = "d5nj8n3umfvguj";
$dbName = "tazteamDB";
mysql_connect($hostname,$username,$passwordSQL) OR DIE("Не могу создать соединение ");
mysql_select_db($dbName) or die(mysql_error());







include("Sitemap.php");


// Создаём класс.
$sitemap = new Sitemap();

// Добавим страничку
$sitemap->addItem(new SitemapItem(
  'http://instorage.org/portfolio/tazteam', // URL.
  time(), // Время в формате timestamp.
  SitemapItem::weekly, //Частота обновления (константы класса SitemapItem).
  0.9 // Приоритет страницы.
));

// Добавим все остальные страницы сайта.



$sitemap->addItem(new SitemapItem(
'http://instorage.org/portfolio/tazteam/map',
'updated_on',
SitemapItem::daily,
0.3 // Приоритет страницы.
));


$sitemap->addItem(new SitemapItem(
'http://instorage.org/portfolio/tazteam/maparticles',
'updated_on',
SitemapItem::daily,
0.8 // Приоритет страницы.
));

$sitemap->addItem(new SitemapItem(
'http://instorage.org/portfolio/tazteam/mapnews',
'updated_on',
SitemapItem::daily,
0.8 // Приоритет страницы.
));

$sitemap->addItem(new SitemapItem(
'http://instorage.org/portfolio/tazteam/articles',
'updated_on',
SitemapItem::daily,
0.8 // Приоритет страницы.
));

$res=mysql_query("SELECT id FROM news where themepage='2' order by id DESC"); 	
while ($row=mysql_fetch_array($res)) 
{
	$sitemap->addItem(new SitemapItem(
    'http://instorage.org/portfolio/tazteam/articles/'.$row['id'],
   'updated_on',
    SitemapItem::daily
	));
}




$sitemap->addItem(new SitemapItem(
'http://instorage.org/portfolio/tazteam/news',
'updated_on',
SitemapItem::daily,
0.8 // Приоритет страницы.
));

$res=mysql_query("SELECT id FROM news where themepage='1' order by id DESC"); 	
while ($row=mysql_fetch_array($res)) 
{
	$sitemap->addItem(new SitemapItem(
    'http://instorage.org/portfolio/tazteam/news/'.$row['id'],
   'updated_on',
    SitemapItem::daily
	));
}








$sitemap->addItem(new SitemapItem(
'http://instorage.org/portfolio/tazteam/forum',
'updated_on',
SitemapItem::daily,
0.7 // Приоритет страницы.
));

$res=mysql_query("SELECT id_section FROM forum___sections"); 	
while ($row=mysql_fetch_array($res)) 
{
	$id_section=$row['id_section'];
	

	$sitemap->addItem(new SitemapItem(
    'http://instorage.org/portfolio/tazteam/forum/'.$id_section.'=1',
   'updated_on',
    SitemapItem::daily
	));

	$query2="SELECT id_topic FROM forum___topics_".$id_section." ORDER BY id_topic";
	$res2=mysql_query($query2); 	
	while ($row2=mysql_fetch_array($res2)) 
	{		

	$sitemap->addItem(new SitemapItem(
    'http://instorage.org/portfolio/tazteam/forum/'.$id_section.'/'.$row2['id_topic'].'=1',
    'updated_on',
    SitemapItem::daily
	));

	}

}











$sitemap->addItem(new SitemapItem(
'http://instorage.org/portfolio/tazteam/photo',
'updated_on',
SitemapItem::daily,
0.7 // Приоритет страницы.
));

$res=mysql_query("SELECT id_section FROM photo___sections"); 	
while ($row=mysql_fetch_array($res)) 
{
	$id_section=$row['id_section'];
	

	$sitemap->addItem(new SitemapItem(
    'http://instorage.org/portfolio/tazteam/photo/'.$id_section.'=1',
   'updated_on',
    SitemapItem::daily
	));

	$query2="SELECT id_topic FROM photo___topics_".$id_section." ORDER BY id_topic";
	$res2=mysql_query($query2); 	
	while ($row2=mysql_fetch_array($res2)) 
	{		

	$sitemap->addItem(new SitemapItem(
    'http://instorage.org/portfolio/tazteam/photo/'.$id_section.'/'.$row2['id_topic'].'/allphotos=1',
    'updated_on',
    SitemapItem::daily
	));
	$sitemap->addItem(new SitemapItem(
    'http://instorage.org/portfolio/tazteam/photo/'.$id_section.'/'.$row2['id_topic'].'=1',
    'updated_on',
    SitemapItem::daily
	));
	}
	
	
	
	
	$query2="SELECT id_topic,page_photo FROM photo___photos_".$id_section;
	$res2=mysql_query($query2); 	
	while ($row2=mysql_fetch_array($res2)) 
	{		
	if ($row2['page_photo']>0){
	$sitemap->addItem(new SitemapItem(
    'http://instorage.org/portfolio/tazteam/photo/'.$id_section.'/'.$row2['id_topic'].'='.$row2['page_photo'],
    'updated_on',
    SitemapItem::daily
	));}}	
	
	
	
	
	
	
	
	
	

}










$sitemap->addItem(new SitemapItem(
'http://instorage.org/portfolio/tazteam/video',
'updated_on',
SitemapItem::daily,
0.7 // Приоритет страницы.
));

$res=mysql_query("SELECT id,themepage FROM video"); 	
while ($row=mysql_fetch_array($res)) 
{	
	$sitemap->addItem(new SitemapItem(
    'http://instorage.org/portfolio/tazteam/video/'.$row['themepage'].'/'.$row['id'],
   'updated_on',
    SitemapItem::daily
	));
}















$sitemap->addItem(new SitemapItem(
'http://instorage.org/portfolio/tazteam/automarket',
'updated_on',
SitemapItem::daily,
0.7 // Приоритет страницы.
));

$res=mysql_query("SELECT id,themepage FROM automarket"); 	
while ($row=mysql_fetch_array($res)) 
{
	$sitemap->addItem(new SitemapItem(
    'http://instorage.org/portfolio/tazteam/automarket/'.$row['themepage'].'/'.$row['id'],
   'updated_on',
    SitemapItem::daily
	));
}
















$sitemap->addItem(new SitemapItem(
'http://instorage.org/portfolio/tazteam/users',
'updated_on',
SitemapItem::daily,
0.7 // Приоритет страницы.
));
/*
$res=mysql_query("SELECT id_user FROM registrated_users___main_data order by id_user"); 	
while ($row=mysql_fetch_array($res)) 
{
	$sitemap->addItem(new SitemapItem(
    'http://instorage.org/portfolio/tazteam/users/'.$row['id_user'],
   'updated_on',
    SitemapItem::daily
	));
}









$res=mysql_query("SELECT id_user,id_album,page_photo FROM registrated_users___photoalbums_photos"); 	
while ($row=mysql_fetch_array($res)) {
	if ($row['page_photo']>0){
		$sitemap->addItem(new SitemapItem(
		'http://instorage.org/portfolio/tazteam/users/'.$row['id_user'].'/photoalbums/'.$row['id_album'].'='.$row['page_photo'],
	   'updated_on',
		SitemapItem::daily
		));
	}}



*/









// Сгенерим sitemap в файл sitemap.xml.
// Если файл не указать - generate вернёт строку.
$sitemap->generate('sitemap.xml');  




echo("+++");
?>