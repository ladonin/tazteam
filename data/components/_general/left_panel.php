<?php
if (UsersMyData::$identified==1) {	include("data/components/_general/user_panel.php");} 
else {								include("data/components/_general/form_enter_registration.php");}	
?>