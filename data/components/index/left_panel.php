<?php
if (UsersMyData::$identified==1) {	include("data/components/index/user_panel.php");} 
else {								include("data/components/index/form_enter_registration.php");}	
?>