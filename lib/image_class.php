<?php

class Image
{
    public static function saveImage($file)
    {
        if(!self::isSecurity($file))
        {
            return false;
        }
        $name = self::getName($file["name"]);
        $uploadfile = "images/$name";
        if(move_uploaded_file($file[tmp_name], $uploadfile))
        {
            return $name;
        }
        else
        {
            $_SESSION["error"]["image"] = "*".$dict["error"];
            return false;
        }
        exit;
    }
    private static function isSecurity($file)           
    {
        $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
        foreach ($blacklist as $item)
        {
            if(preg_match("/$item\$/i", $file["name"]))
            {
                $_SESSION["error"]["image"] = "*".$dict["error format"];
                return false;
            }
        }
        $type = $file["type"];
        $size = $file["size"];
        if(($type != "image/jpeg") && ($type != "image/jpg") && ($type != "image/png"))
        {
            $_SESSION["error"]["image"] = "*".$dict["error format"];
            return false;
        }
        if($size > 102048000)
        {
            $_SESSION["error"]["image"] = "*".$dict["error size"];
            return false;
        }
        return true;
    }
    private static function getName ($filename)
    {
        $name = substr(md5(microtime()), 0, 6);
        $name .= strrchr($filename, ".");
        if(!file_exists("images/$name")) return $name;
        else return self::getName();
    }
}