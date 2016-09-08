<?php

class GeneralImagesPreload
{

    static $images = array();
    static $listimages = "";


    static public function input($image)
    {
        array_push(self::$images, $image);
    }


    static public function output()
    {
        foreach (self::$images as $value) {
            self::$listimages.="'".GeneralGlobalVars::url."/" . $value . "',";
        }
        self::$listimages.="'".GeneralGlobalVars::url."/images/index/index___top_menu_fon_hover.png'";
        return self::$listimages;
    }


    static public function update_photos($service, $url, $format)
    {
        if ($service == "users_ava") {
            foreach (GeneralImagesCalculate::$imagessizes_users_ava as $key => $value) {
                if ($key != 1) {//������� �������� �� �����
                    self::input($url . "_" . $key . "." . $format . "?id=" . GeneralGlobalVars::$timeunix);
                }
            }
        }
    }
}

?>