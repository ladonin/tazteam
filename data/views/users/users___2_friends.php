<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?><?php
UsersBase::set_points($MSQLc,GeneralGetVars::$var2);//начисляем ему баллы

UsersBase::detect_its_mypage(1);
UsersFriends::set_sort($MSQLc);
UsersFriends::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос ДОзапишется в этой функции, т.к. друзья конкретного пользователя выбираются из сортировки
GeneralPagesCounter::$find_query=UsersBase::$find_query;

GeneralPagesCounter::$rowspage_name="rowspageusers1";//копия такой страницы - по присваиванию номеров страниц
GeneralPagesCounter::calculate($MSQLc,"registrated_users___main_data",0,0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3);//условия выборки аздаются сортировкой или поиском
GeneralPagesCounter::imagespreload();
$cv1="_friends"; include("data/components/users/panels/users___2_friends_panel_top.php");
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___1_query_1.php");
include("data/components/_general/users/users_list.php");
?></div>