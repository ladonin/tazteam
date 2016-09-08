<?php
class GeneralPagesCounter{

static public $whole_rows=0;//всего строк
static protected $whole_rows_left=0;//всего строк перед текущим id страницы
static protected $whole_rows_current=0;//всего строк в текущей теме внешней фотографии


static public $find_query="";//запрос whereв поиск
static public $find_query_order="";//при поиске или сортировке как сортируем - прямо, обратно

static public $rowspage_name="";//какую переменную берем

static public $N_max=0;//максимальное число страниц
static public $N_cur=0;//текущая страница
static public $N_cur_to_outer=0;//текущая внешняя страница (обратно)
static public $N_cur_current=0;//текущая очередная (может быть несколько) внутренняя страница
static protected $N_left=0;//число слева в счетчике
static protected $N_right=0;//число справа в счетчике
static protected $page="";//на каком типе страниц находимся (форум фото и т.д.)
static public $rowsonpage=0;//число строк на текущей странице
static public $htmlcode="";//html код счетчик страниц
static public $htmlarrows="";//стрелки вправо и влево

static public $rowspageusersdialogs=16;//число строк на странице диалогов пользователя

static public $rowspageforum1=20;//число строк на странице форума
static public $rowspageforum2=20;//число строк на странице форума
static public $rowspageforum3=20;//число строк на странице форума
static public $rowspagephoto1=16;//число тем на странице галереи

static public $rowspagetests3=1;//число тем на странице галереи

static public $rowspagevideo1=30;//число тем на странице видео




static public $rowspagephoto2=16;//число тем на странице галереи = одинаковы с rowspagephotoallphotos2
static public $rowspagephotoallphotos2=16;//число тем на странице галереи

static public $rowspagephoto3=1;//число фото на странице галереи

//static public $rowspagephotoallphotos2=20;//число фоток на странице темы
static public $rowspagephotoallphotos3=16;//число фоток на странице темы

static public $rowspageautomarket1=20;//число тем на странице авторынка

static public $rowspagenews1=16;//число тем на странице
static public $rowspagearticles1=16;//число тем на странице

static public $rowspageusers1=26;//число пользователей на странице пользователей

static public $rowspageusersphotoalbums1=16;//число фотоальбомов на странице всех друзей
static public $rowspageusersphotoalbums2=16;//число фотоальбомов на странице одного участника
static public $rowspageusersphotoalbums3=1;//число фотографий на странице просмотра фотоальбома



//static public $rowspageusersallphotosinalbum1=20;//число фотоальбомов на странице всех друзей
//static public $rowspageusersallphotosinalbum2=20;//число фотоальбомов на странице одного участника
static public $rowspageusersallphotosinalbum3=16;//число фотографий на странице просмотра фотоальбома


static public $rowspagegarage1=20;//число машин участников в списке






const maxlist=9;//максимальное число видимых цифр в списке (3,5,7,9,11 и т.д.)
static protected $listVar1;//служебные переменные
static protected $listVar2;//служебные переменные
static protected $listVar3;//служебные переменные



const oneleftcssclass="PagesCounterOneLeft";
const onerightcssclass="PagesCounterOneRight";
const allleftcssclass="PagesCounterAllLeft";
const allrightcssclass="PagesCounterAllRight";
const curpagecssclass="PagesCounterCurPage";
const pageslistcssclass="PagesCounterPagesList";
const finishpagecssclass="PagesCounterFinishPage";
const pageslisturlcssclass="PagesCounterPagesListURL";
const finishpageurlcssclass="PagesCounterFinishPageURL";
const oneleftarrowcssclass="PagesCounterOneLeftArrow";
const onerightarrowcssclass="PagesCounterOneRightArrow";

static public function imagespreload(){
	GeneralImagesPreload::input("images/_general/general___pages_counter_one_right_hover.png");
	//GeneralImagesPreload::input("images/_general/general___pages_counter_one_right.png");
	GeneralImagesPreload::input("images/_general/general___pages_counter_one_left_hover.png");
	//GeneralImagesPreload::input("images/_general/general___pages_counter_one_left.png");
	GeneralImagesPreload::input("images/_general/general___pages_counter_all_left_hover.png");
	//GeneralImagesPreload::input("images/_general/general___pages_counter_all_left.png");
	GeneralImagesPreload::input("images/_general/general___pages_counter_all_right_hover.png");
	//GeneralImagesPreload::input("images/_general/general___pages_counter_all_right.png");
	GeneralImagesPreload::input("images/_general/general___pages_counter_one_left_big_hover.png");
	GeneralImagesPreload::input("images/_general/general___pages_counter_one_right_big_hover.png");
	GeneralImagesPreload::input("images/_general/general___pages_counter_one_right_big_hover.png");
	GeneralImagesPreload::input("images/_general/general___pages_counter_one_left_big_hover.png");
	}

static public function clearvars(){
	self::$htmlcode="";}

static protected function setlistVars(){
	//например, maxlist=9  (123456789)
	self::$listVar1=floor(self::maxlist/2);//4 - от края видимого списка до центра
	self::$listVar2=self::$listVar1+1;// 5 - среднее число в видимом списке
	self::$listVar3=self::maxlist-1;}//8 - переместит указатель на самую левую цифру в видимом списке


static protected function setN_cur(){
	if (GeneralGetVars::$num_page) {
		self::$N_cur=GeneralGetVars::$num_page;	}
	else {
		self::$N_cur=1;	}}


static protected function setN_cur_to_outer(){
	self::$N_cur_to_outer=ceil(self::$whole_rows_left/self::$rowsonpage);
	if (self::$N_cur_to_outer==0){self::$N_cur_to_outer=1;}}

static protected function setN_cur_current(){
	self::$N_cur_current=ceil(self::$whole_rows_current/self::$rowsonpage);
	if (self::$N_cur_current==0){self::$N_cur_current=1;}}

static public function return_whole_rows($MSQLc,$db,$condition1,$condition2,$condition3,$condition4,$condition5){
	$query="SELECT COUNT(1) count FROM ".$db;
	$status_where=0;
	if ($condition1) {$query.=" WHERE ".$condition1; $status_where=1;}
	if ($condition2) {$query.=" AND ".$condition2; $status_where=1;}
	if ($condition3) {$query.=" AND ".$condition3; $status_where=1;}
	if ($condition4) {$query.=" AND ".$condition4; $status_where=1;}
	if ($condition5) {$query.=" AND ".$condition5; $status_where=1;}

	if (self::$find_query) {
		if ($status_where==0){$query.=" WHERE 1 ";}
		else {$query.=" ";}
		$query.=self::$find_query;}













	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);
	return $row['count'];}








static protected function setpage(){
	self::$page=GeneralGetVars::$var1;
	if ((GeneralSecurity::tonumber(GeneralGetVars::$var3)>0)||(!GeneralGetVars::$var3)){}
	else{//если это слово
		self::$page.=GeneralGetVars::$var3;}
	if ((GeneralSecurity::tonumber(GeneralGetVars::$var4)>0)||(!GeneralGetVars::$var4)){}
	else{//если это слово
		self::$page.=GeneralGetVars::$var4;}}

static protected function setrowsonpage(){
	if (self::$rowspage_name==""){//если не задали принудетиельно имя
		self::$rowspage_name="rowspage".self::$page.GeneralPageTree::$nesting;}
	self::$rowsonpage=self::${self::$rowspage_name};}






static protected function setrowsonpage_to_outer(){
	if (self::$rowspage_name==""){//если не задали принудительно имя
		self::$rowspage_name="rowspage".self::$page.(GeneralPageTree::$nesting-1);}
	self::$rowsonpage=self::${self::$rowspage_name};}



static protected function setN_max(){
	self::$N_max=ceil(self::$whole_rows/self::$rowsonpage);}

static protected function setN_left_N_right(){
	if (self::$N_max>self::maxlist){
		if (((self::$N_cur-self::$listVar1)>=1)&&((self::$N_cur+self::$listVar1)<=self::$N_max)) {self::$N_left=self::$N_cur-self::$listVar1; self::$N_right=self::$N_cur+self::$listVar1;}//45x78|->, 12x45->,67x910|->
		else if (((self::$N_cur-self::$listVar1)>=1)&&((self::$N_cur+self::$listVar1)>self::$N_max)) {self::$N_left=self::$N_max-self::$listVar3; self::$N_right=self::$N_max;}//<-678x10|
		else {self::$N_left=1; self::$N_right=self::maxlist;}}//1x345->
	else {
		self::$N_left=1; self::$N_right=self::$N_max;}}//1x345|





static public function calculate_to_outer($MSQLc,$db,$condition1,$condition2,$condition3,$condition4,$condition5){//чтобы выйти на вложение выше
	self::setpage();
	self::setrowsonpage_to_outer();
	self::$whole_rows_left=self::return_whole_rows($MSQLc,$db,$condition1,$condition2,$condition3,$condition4,$condition5);
	self::setN_cur_to_outer();
	self::$rowspage_name="";}//очищаем наименование массива

static public function calculate_current($MSQLc,$db,$condition1,$condition2,$condition3,$condition4,$condition5){//параллельный основному расчет, без затрагивания основных чисел
	self::setpage();
	self::setrowsonpage();
	self::$whole_rows_current=self::return_whole_rows($MSQLc,$db,$condition1,$condition2,$condition3,$condition4,$condition5);
	self::setN_cur_current();
	self::$rowspage_name="";}//очищаем наименование массива





static public function calculate($MSQLc,$db,$condition1,$condition2,$condition3,$condition4,$condition5,$url){
	self::setlistVars();
	self::setpage();
	self::setrowsonpage();
	self::setN_cur();
	self::$whole_rows=self::return_whole_rows($MSQLc,$db,$condition1,$condition2,$condition3,$condition4,$condition5);
	self::setN_max();
	self::setN_left_N_right();
	self::$rowspage_name="";//очищаем наименование массива
	//echo("<br>N_cur=".self::$N_cur."<br>");
	//echo("whole_rows=".self::$whole_rows."<br>");
	//echo("page=".self::$page."<br>");
	//echo("rowsonpage=".self::$rowsonpage."<br>");
	//echo("N_max=".self::$N_max."<br>");
	//echo("N_left=".self::$N_left."<br>");
	//echo("N_right=".self::$N_right."<br>");
	//echo("start_id_topic=".self::$start_id_topic."<br>");

	self::$htmlcode="<table cellpadding=\"0\" cellspacing=\"0\" border='0'><tr>";
	if ((self::$N_cur>self::$listVar2)&&(self::$N_max>self::maxlist)) {self::$htmlcode.="

    <td class=\"".self::pageslistcssclass."\" valign=\"middle\">

    <div class=\"btn btn btn-primary btn-small\" onclick=\"javascript:location.href='".GeneralGlobalVars::url."/".$url."=1'\" style=\"cursor:pointer;\">1</div>





    </td>";}
	if (self::$N_cur>1) {self::$htmlcode.="<td class=\"".self::pageslistcssclass."\" valign=\"middle\">

    <div class=\"btn btn btn-primary btn-small\" onclick=\"javascript:location.href='".GeneralGlobalVars::url."/".$url."=".(self::$N_cur-1)."'\" style=\"cursor:pointer;\">&#9664</div>



    </td>";}
	for ($i=self::$N_left; $i<=self::$N_right; $i++){
		if (self::$N_cur==$i) {self::$htmlcode.="<td class=\"".self::pageslistcssclass."\" valign=\"middle\">






        <span class=\"badge badge-warning\" style=\"margin:0 0 0px 0;\">".$i."</span></td>";}
		else {self::$htmlcode.="
        <td class=\"".self::pageslistcssclass."\" valign=\"middle\">



        <div  style=\"margin-top:3px;\">
        <a href=\"".GeneralGlobalVars::url."/".$url."=".$i."\" class=\"link_pagecounter_light\"> ".$i."</a>
        </div>



        </td>";}	}
	if (self::$N_cur<self::$N_max) {self::$htmlcode.="

    <td class=\"".self::pageslistcssclass."\" valign=\"middle\">


    <div  class=\"btn btn btn-primary btn-small\" onclick=\"javascript:location.href='".GeneralGlobalVars::url."/".$url."=".(self::$N_cur+1)."'\" style=\"cursor:pointer;\">&#9654;</div>


    </td>";}
	if ((self::$N_cur<(self::$N_max-self::$listVar1)&&(self::$N_max>self::maxlist))) {self::$htmlcode.="
    <td class=\"".self::pageslistcssclass."\" valign=\"middle\">
    <div  class=\"btn btn btn-primary btn-small\" onclick=\"javascript:location.href='".GeneralGlobalVars::url."/".$url."=".self::$N_max."'\" style=\"cursor:pointer;\">".self::$N_max."</div>


    </td>";}







	if (self::$N_max>1) {
        self::$htmlcode.="<td  class=\"".self::finishpagecssclass."\" width=\"1\" valign=\"middle\"><select style=\"height:26px; width:62px; margin:0px;\">";
        for ($i=1; $i<=self::$N_max; $i++){
            self::$htmlcode.="<option onclick=\"javascript:location.href='".GeneralGlobalVars::url."/".$url."=".$i."'\"";
            if ($i==self::$N_cur){self::$htmlcode.=" selected ";}
            self::$htmlcode.=">".$i."</option>";
        }
        self::$htmlcode.="</select></td>";
    }
    else {
	self::$htmlcode.="<td class=\"".self::finishpagecssclass."\" valign=\"middle\" width=\"1\">".self::$N_cur."</td>";

    }

	self::$htmlcode.="<td valign=\"middle\">&nbsp;из&nbsp;<a href=\"".GeneralGlobalVars::url."/".$url."=".self::$N_max."\" class=\"".self::finishpageurlcssclass."\">".self::$N_max."</a></td>";

    self::$htmlcode.="</tr></table>";



	self::$htmlarrows="<table cellpadding=\"0\" cellspacing=\"0\"><tr>";
	if (self::$N_cur>1) {self::$htmlarrows.="

    <td style=\"padding-right:10px;\">


    <div class=\"btn btn btn-primary btn-small\" onclick=\"javascript:location.href='".GeneralGlobalVars::url."/".$url."=".(self::$N_cur-1)."'\" style=\"cursor:pointer;\">&#9664;</div>










    </td>";}
	else {self::$htmlarrows.="<td style=\"padding-right:10px;\">


    <div class=\"btn btn btn-primary btn-small disabled\">&#9664;</div>








    </td>";}
	if (self::$N_cur<self::$N_max) {self::$htmlarrows.="<td>


    <div class=\"btn btn btn-primary btn-small\" onclick=\"javascript:location.href='".GeneralGlobalVars::url."/".$url."=".(self::$N_cur+1)."'\" style=\"cursor:pointer;\">&#9654;</div>






    </td>";}
	else {self::$htmlarrows.="<td><div class=\"btn btn btn-primary btn-small disabled\">&#9654;</div></td>";}
	self::$htmlarrows.="</tr></table>";



	}
}
?>