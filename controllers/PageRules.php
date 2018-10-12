<?php

class PageRules
{
    public function getUrl()
    {
        $url = $_SERVER['REQUEST_URI'];//получаем текущий адрес
        $url = trim($request->pathInfo, '/'); // удаляем слеши из начала и конца url
        preg_match_all('/\d+/', $url, $mas);
        switch($url)
        {
            case NULL:
                require_once "views/site/index.php";
            default:
                require_once "views/site/404.php";
        }
    }
}