<?php

class PageRules
{
    public function getUrl()
    {
        $url = $_SERVER['REQUEST_URI'];//получаем текущий адрес
        $url = trim($url, '/');
        switch($url)
        {
            case "":
                require_once "views/site/index.php";
                break;
            case "registration":
                require_once "views/site/registrationview.php";
                break;
            default:
                require_once "views/site/404.php";
                break;
        }
    }
}