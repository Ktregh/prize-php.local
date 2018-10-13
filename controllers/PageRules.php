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
                include_once (ROOT.'/views/site/index.php');
                break;
            case "registration":
                include_once (ROOT.'/views/site/registrationview.php');
                break;
            case "index.php":
                include_once (ROOT.'/views/site/index.php');
                break;
            default:
                include_once (ROOT.'/views/site/404.php');
                break;
        }
    }
}