<?php
$start = microtime(1); //��� �������� ��������//////////////////////////////////////
ini_set('display_errors', 1); /////////////////////////////
error_reporting(E_ALL); ///////////////////////////////////
require("data/models/_general/GetVars.php"); //�������� �������� GET-����������
require("data/models/_general/GlobalVars.php"); //���������� ���������� ���������� �������
require("data/models/_general/MySQL.php"); //������� � ���������� ���������� MySQL
//require("data/models/_general/PageBasic.php");//������� ���������� ��� ������ ������ �� ���������
require("data/models/_general/Security.php"); //������� ���������� ������ � ���������� �������
//require("data/models/_general/Cookies.php");//������� ���������� ������ � ������
//require("data/models/_general/UserName.php");//���������� ����� ��������������� (�������� ������� sql-������� � 4 ����)
require("data/models/users/MyData.php"); //������� ���������� ������ � ����
//include("data/models/users/Signaturing.php");//������� ���������� ������ � ������������
require("data/models/_general/HeaderHTTP.php"); //������� ���������� ������ � ����������� http
require("data/models/_general/PageTree.php"); //�������� �� ������������� �������� � � ������ ������������� - ����������� "������" ���������� ��������
require("data/models/_general/UploadBasic.php"); //������� ���������� ������ � ������������ �������
//require("data/models/_general/PagesCounter.php");





include("data/models/automarket/Base.php");
include("data/models/automarket/Forreg.php");
include("data/models/automarket/SendTopic.php");
//include("data/models/_general/ImagesUpload.php");
include("data/models/_general/ImagesWork.php"); //������� ���������� ������ � �������������
//include("data/models/_general/ImagesCalculate.php");//������� ���������� ���������� ���������� �����������
include("data/models/_general/Files.php"); //������� ���������� ������ � �������







$MSQLc = GeneralMYSQL::connect(1); //������������ �  �������� �� ��� root
//mysqli_query($MSQLc,'SET NAMES UTF8');//�� �����


function resize_and_save($source, $path_to, $width_source, $height_source, $format, $x_source, $y_source, $width, $height, $x, $y, $quality, $bgcolor)
{
    $picfunc = 'imagecreatefrom' . $format; //����� ������� ������������ ��� �� ��������

    $picsource = $picfunc($source); //������� ���������� ��������� �����������
    $picout = imagecreatetruecolor($width, $height); // �������� ��������� ����������� � ����������
    imagefill($picout, 0, 0, $bgcolor); // ���������� � ������
    imagecopyresampled($picout, $picsource, $x, $y, $x_source, $y_source, $width, $height, $width_source, $height_source); //������ � ���� ���������� ������������ ����������� ���������
    if ($format == "jpeg") {
        if (imagejpeg($picout, $path_to, $quality) == true) {// �������� ����� ��������� �����������
            imagedestroy($picsource); // ������� ������
            imagedestroy($picout); // ������� ������
            return true;
        }
    } else if ($format == "png") {
        if (imagepng($picout, $path_to, 0) == true) {// �������� ����� ��������� �����������
            imagedestroy($picsource); // ������� ������
            imagedestroy($picout); // ������� ������
            return true;
        }
    } else if ($format == "gif") {
        if (imagepng($picout, $path_to) == true) {// �������� ����� ��������� �����������
            imagedestroy($picsource); // ������� ������
            imagedestroy($picout); // ������� ������
            return true;
        }
    }
    return false;
}
$query = "SELECT id,themepage,id_user,img FROM automarket";
$res = GeneralMYSQL::query($MSQLc, $query);
while ($row = GeneralMYSQL::fetch_array($res)) {
    GeneralGetVars::$var1 = "automarket";
    GeneralGetVars::$var2 = $row['themepage'];
    GeneralGetVars::$var3 = $row['id'];
    UsersMyData::$id = $row['id_user'];









    $textphotosarray = explode(" ", $row['img']);

    foreach ($textphotosarray as $key => $value) {
        if ($value) {


            $imgurl1 = str_replace("_3.", "_1.", $value);
            $imgurl2 = str_replace("_3.", "_5.", $value);


            $source = "_files/images/automarket/" . $row['id'] . "/" . $imgurl1; //echo($source);

            $imageinfo = getimagesize($source);





            $width_source = $imageinfo[0]; //������ ���������
            $height_source = $imageinfo[1]; //������ ���������








            $delimiter = round(210 / 160, 4);

            if ($width_source > ($height_source * $delimiter)) {//������ ����� ���� ������� ������ ������, ����� ��������� �, ��� �������� � ����������� �� ���������� ���������
                $cur_width_source = floor($height_source * $delimiter);
                $cur_height_source = $height_source;
                $cur_x_source = floor(($width_source - $cur_width_source) / 2);
                $cur_y_source = 0;
            } else if ($width_source < ($height_source * $delimiter)) {
                $cur_width_source = $width_source;
                $cur_height_source = floor($cur_width_source / $delimiter);
                $cur_x_source = 0;
                $cur_y_source = floor(($height_source - $cur_height_source) / 2);
            } else if ($width_source == ($height_source * $delimiter)) {
                $cur_width_source = $width_source;
                $cur_height_source = floor($height_source * $delimiter);
                $cur_x_source = 0;
                $cur_y_source = 0;
            }
            $cur_width = 210;
            $cur_height = 160;
            $cur_x = 0;
            $cur_y = 0;





            resize_and_save(
                    "_files/images/automarket/" . $row['id'] . "/" . $imgurl1, "_files/images/automarket/" . $row['id'] . "/" . $imgurl2, $cur_width_source, $cur_height_source, "jpeg", $cur_x_source, $cur_y_source, $cur_width, $cur_height, $cur_x, $cur_y, "100", '0xffffff');
        }
    }
}
?>








