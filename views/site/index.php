<?php

    include_once (ROOT.'/models/User.php');
    $user = new User;
    $auth = $user->isAuth();
    $name = $user->getName($_SESSION["login"]);
    if($auth)$loginstr = "Hallo, <b>".$name."</b>. <a href='logout.php'>Выйти</a>";
    if($auth)
    {
        include_once (ROOT.'/views/site/start.php');
    }
    else
    {
        include_once (ROOT.'views/site/loginview.php');
    }
