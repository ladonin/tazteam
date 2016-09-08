<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?><?php
UsersBase::convert_cookie_find_query($MSQLc);//если есть поиск
GeneralPagesCounter::$find_query=UsersBase::$find_query;
GeneralPagesCounter::calculate($MSQLc, "registrated_users___main_data",0,0,0,0,0,GeneralGetVars::$var1);
GeneralPagesCounter::imagespreload();

if (UsersMyData::$identified==1){
	UsersBase::set_keyedarray_my_friendship_and_heto($MSQLc);}//теперь я знаю всех своих друзей и тех, к кому я уже подавал заявку
$cv1="";
include("data/components/users/panels/users___1_panel_top.php");
include("data/components/users/users___1_query_1.php");
include("data/components/_general/users/users_list.php");
?></div>