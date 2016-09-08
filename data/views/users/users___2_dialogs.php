<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?><?php
UsersBase::detect_its_mypage(1);
UsersDialogs::set_sort();
GeneralPagesCounter::$find_query=UsersBase::$find_query;
GeneralPagesCounter::$rowspage_name="rowspageusersdialogs";//копия такой страницы - по присваиванию номеров страниц
GeneralPagesCounter::calculate($MSQLc,"registrated_users___correspondence_table",0,0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2."/dialogs");//условия выборки аздаются сортировкой или поиском
GeneralPagesCounter::imagespreload();

include("data/components/users/panels/users___2_dialogs_panel_top.php");

UsersDialogs::detect_array_dialogs($MSQLc,1);

//include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_dialogs_query_1.php");


include("data/components/users/users___2_dialogs_list.php");










?></div>