<?php
$start=microtime(1);//��� �������� ��������//////////////////////////////////////
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL);///////////////////////////////////
require(__DIR__."/../data/models/_general/MySQL.php");//������� � ���������� ���������� MySQL
//require("data/models/_general/PageBasic.php");//������� ���������� ��� ������ ������ �� ���������
require(__DIR__."/../data/models/_general/Security.php");//������� ���������� ������ � ���������� �������
require(__DIR__."/../data/models/users/MyData.php");//������� ���������� ������ � ����


if (GeneralSecurity::is_cron()){
    $MSQLc=GeneralMYSQL::connect(1);//������������ �  �������� �� ��� root
     	
    	
    $query="update  photo___photos_2 set rank='0',vote=''";
    GeneralMYSQL::query($MSQLc,$query);
}

?>