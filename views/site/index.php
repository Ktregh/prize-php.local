<?php

    include_once (ROOT.'/models/User.php');
    $user = new User;
    $auth = $user->isAuth();
    //var_dump($auth);
    if($auth)
    {
        include_once (ROOT.'/views/site/start.php');
    }
    else
    {
        include_once (ROOT.'/views/site/loginview.php');
    }
