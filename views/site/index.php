<?php

    require_once "models/User.php";
    $user = new User;
    $name = $user->getName($_SESSION["login"]);
    if($auth)$loginstr = "Hallo, <b>".$name."</b>. <a href='logout.php'>Выйти</a>";
    if($auth)
    {
        require_once "/views/site/start.php";
    }
    else
    {
        require_once "views/site/loginview.php";
    }
